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

		$trans = dibi::query('SELECT id, itemID,  lp, isk, price * bulk marketPrice, bulk
			FROM [transaction] 
			JOIN [price] ON (itemID = typeID)
			WHERE [itemID] = ' . $typeID)
				->setRowClass('Transaction')
				->fetchAll();
		
		foreach ($trans as $t) {
			$itemsPrice = 0;
			if ((bool) $t) {//pokud jsou nejaky veci potreba
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
			} else {
				$t->earnings = 0;
			}
		}


		return $trans;
	}

}

