<?php

/**
 * Model managing Items
 *
 * @author kubiq
 */
class CorporationModel extends BaseModel {

	/**
	 * returns array of corporations prepared for autocomplete
	 * @param string $corporationName
	 * @return array 
	 */	
	public function getAllForAC($corporationName) {

		if (!(bool) $corporationName) {
			throw new InvalidArgumentException("Corporation name has to be given");
		}
		
		$name = $corporationName . '%';
		$ret = dibi::query("
			SELECT 
				C.corporationID id,
				N.itemName label,
				N.itemName value
			FROM crpNPCCorporations C
			JOIN eveNames N ON (C.corporationID = N.itemID)
			WHERE N.itemName like %s", $name, 
			'ORDER BY N.itemName
			LIMIT 10
			OFFSET 0')
				->fetchAll();

		return $ret;
	}

	/**
	 * returns Corporation by name
	 * @param string $name
	 * @return Corporation
	 */
	public function getCorpByName($name = null) {

		if (!(bool) $name) {
			throw new InvalidArgumentException("Item name has to be given");
		}

		$ret = dibi::query('SELECT C.*
				FROM crpNPCCorporations C
				JOIN eveNames N ON (N.itemID = C.corporationID)
				WHERE N.itemName like %s', $name)
				->setRowClass("Corporation")
				->fetch();
		
		return $ret;
	}

}

