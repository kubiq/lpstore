<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EveCentralModel
 *
 * @author kubiq
 */
class EveCentralModel extends BaseModel {
	const SERVER_URL = 'http://api.eve-central.com';
	const API_URL = 'http://api.eve-central.com/api/marketstat?';

	protected $connection;

	private function closeConnection() {
		curl_close($this->connection);
	}

	/**
	 * vrati novou nejnizsi cenu z jity
	 * @param int $typeID
	 * @return double price
	 */
	private function fetchNewPrice($typeID) {

		if (!(bool) $typeID) {
			throw new InvalidArgumentException("TypeID has to be defined");
		}

		$this->connection = curl_init();

		if (!$this->connection) {
			throw new Exception("Couldnt connect to eve-central server");
		}

		curl_setopt($this->connection, CURLOPT_RETURNTRANSFER, true);

		$vars = 'typeid=' . $typeID . '&';
		$vars .= 'regionlimit=10000002';

		curl_setopt($this->connection, CURLOPT_URL, self::API_URL . $vars);

		$xmlText = curl_exec($this->connection);

		$this->closeConnection();

		$xml = new SimpleXMLElement($xmlText);

		$p = new Price();
		$p->typeID = $xml->marketstat['id'];
		$p->price =  $xml->marketstat->sell->min;

		return (double)$xml->marketstat->type->sell->min;
	}

	/**
	 * podiva se do db jestli cena neni moc stara, pokud je upravi ji cenou novou, nakonec vrati
	 * @param int $typeID
	 * @return Price
	 */
	public function getItemPrice($typeID = 0) {

		$priceDB = dibi::query("SELECT typeID, price, timestamp FROM [price] where typeID = %i", $typeID)
				->setRowClass("Price")
				->fetch();

		if (!$priceDB) {//cena neni v db

			$newPrice = $this->fetchNewPrice($typeID);

			$price = new Price();
			$price->typeID = $typeID;
			$price->price = $newPrice;
			$price->timestamp = time();

			$this->createPrice($price);
			return $price;


		} elseif ((time() - $priceDB->timestamp) > 3600 * 24 * 7) {//cena je stara

			$newPrice = $this->fetchNewPrice($typeID);

			if(($newPrice == 0) & ($priceDB->price != 0)) {//nova cena je 0 a nejaka je nastavena...nic nenastavovat

				$price = new Price();
				$price->typeID = $typeID;
				$price->price = $newPrice;
				$price->timestamp = time();
				$price->update();

				return $price;
			} else {
				return $priceDB;
			}



		} else {//cena je v db a je aktualni

			return $priceDB;

		}
	}

	public function createPrice(Price $price) {

		if (!(bool) $price)
			throw new InvalidArgumentException('spatne zadany price parametr');

		return dibi::query('INSERT INTO [price]', (array) $price);
	}

}

