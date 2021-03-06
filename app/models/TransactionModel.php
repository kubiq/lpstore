<?php

/**
 * Model managing Transactions
 *
 * @author kubiq
 */
class TransactionModel extends BaseModel {

	/**
	 * creates new Transaction
	 * @param Transaction $transaction
	 * @return int inserted id
	 */
	public function createTransaction(Transaction $transaction) {

		if (!dibi::query('INSERT INTO [transaction]', (array) $transaction)) {
			throw new InvalidStateException("couldnt add trans to db");
		}

		return dibi::insertId();
	}

	/**
	 * vraci pole transakci s cenama
	 * @param int $typeID
	 * @return Transaction
	 */
	public function getTransactions($typeID = 0) {

		$itemModel = new ItemModel();

		$trans = dibi::query('SELECT T.id, T.itemID,  T.lp, T.isk, P.price * T.bulk marketPrice, T.bulk, N.itemName corp, NF.itemName faction
				FROM transaction T
				JOIN price P ON (T.itemID = P.typeID)
				JOIN crpNPCCorporations C ON (T.corp = C.corporationID)
				JOIN eveNames N ON (T.corp = N.itemID)
				JOIN eveNames NF ON (C.factionID = NF.itemID)
				WHERE T.itemID = %s;' , $typeID)
				->setRowClass('Transaction')
				->fetchAll();
		
		foreach ($trans as $t) {
			$itemsPrice = 0;
			if ($t) {//pokud jsou nejaky veci potreba
				$req = dibi::query("SELECT id,transactionID, typeID, quantity
					FROM requirement r 
					WHERE transactionID = %i", $t->id)
						->setRowClass('Item')
						->fetchAll();
				foreach ($req as $r) {
					$item = $itemModel->getItem($r->typeID);
					$item->quantity = $r->quantity;
					$item->price = $r->quantity * $item->price;
					$t->items[] = $item;
					
					$itemsPrice += $item->price;
				}
				
			}
			$t->itemsPrice = $itemsPrice + $t->isk;
			if($t->marketPrice != 0) {
				$t->earnings = ($t->marketPrice - $t->itemsPrice) ;
				
				if (($t->earnings != 0) || ($t->lp != 0)) {
					$t->lpPrice = ($t->earnings / $t->lp);
				} else {
					$t->lpPrice = 0;
				}
				
			} else {
				$t->earnings = 0;
				$t->lpPrice = 0;
			}
			
		}


		return $trans;
	}
	
	public function deleteTransaction($id) {
		if(! $id) {
			throw new \InvalidArgumentException;
		}
		$check = dibi::query('SELECT * FROM `transaction`
					WHERE (`id` = %s)
					LIMIT 1;' , $id)
				->fetchSingle();
		
		if (! $check) {
			throw new \InvalidStateException('transaction wasn\'t found');
		}
		
		//delete all requirements thru cascade...
		$trans = dibi::query('DELETE FROM `transaction`
					WHERE (`id` = %s)
					LIMIT 1;' , $id);
		return $trans;
	}

}

