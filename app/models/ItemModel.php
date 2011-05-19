<?php

/**
 * Model managing Items
 *
 * @author kubiq
 */
class ItemModel extends BaseModel {

	/**
	 * vrati itemy podle zadaneho %name% 
	 * @param int $name of 
	 * @param int $offset
	 * @param int $limit
	 * @return Item
	 */
	public function getItems($name = null, $offset = 0, $limit = 20) {

		if (!(bool) $name) {
			throw new InvalidArgumentException("Item name has to be given");
		}
		if ($offset < 0) {
			throw new InvalidArgumentException("Offset can't be less then 0");
		}

		$name = '%' . $name . '%';
		$ret = dibi::query("
			SELECT I.typeID, I.groupID, I.typeName, I.description, 
				I.graphicID, I.radius, I.mass, I.volume, I.capacity, I.portionSize, 
				I.raceID, P.price, I.published, I.marketGroupID, I.chanceOfDuplicating, I.iconID, C.categoryID
			FROM invTypes I 
			LEFT JOIN price P USING (`typeID`) 
			JOIN invGroups G USING (groupID)
			JOIN invCategories C USING (categoryID)
			WHERE I.typeName like %s", $name, 
			'AND I.published = 1', 
			'ORDER BY I.typeName',
			'LIMIT %i', $limit, 
			'OFFSET %i', $offset)
				->setRowClass("Item")
				->fetchAll();
		
		$em = new EveCentralModel();
		
		foreach ($ret as &$item) {
			if (is_null($item->price)) {
				
				$item->price = $em->getItemPrice($item->typeID)->price;
			}
		}

		return $ret;
	}

	/**
	 * vrati jeden item podle zadaneho typeID, limit 1
	 * @return Item
	 */
	public function getItem($typeID = 0) {

		$em = new EveCentralModel();
		
		$ret = dibi::query("SELECT I.typeID, I.groupID, I.typeName, I.description, 
				I.graphicID, I.radius, I.mass, I.volume, I.capacity, I.portionSize, 
				I.raceID, P.price, I.published, I.marketGroupID, I.chanceOfDuplicating, I.iconID, C.categoryID
			FROM invTypes I 
			LEFT JOIN price P USING (`typeID`)
			JOIN invGroups G USING (groupID)
			JOIN invCategories C USING (categoryID)
			WHERE I.typeID = %i", $typeID, 'AND I.published = 1', 
			'LIMIT 1')
			->setRowClass("Item")
			->fetch();
		
		
		if (is_null($ret->price)) {

			$ret->price = $em->getItemPrice($ret->typeID)->price;
		}
		

		return $ret;
	}

	/**
	 * Returns count of found items in 
	 * @param string $q
	 * @return int search result count 
	 */
	public function countSearch($q = null) {
		if (!(bool) $q) {
			throw new InvalidArgumentException("Item name has to be given");
		}
		$q = '%' . $q . '%';

		return dibi::query('SELECT count(*) ', 'FROM [invTypes]', 'WHERE [typeName] like %s', $q, 'AND [published] = 1')
			->fetchSingle();
	}

	/**
	 * vrati pole itemu pro autocomplete
	 * @param int $name of 
	 * @param int $offset
	 * @param int $limit
	 * @return Item
	 */
	public function getAutoItem($name = null, $limit = 20) {

		if (!(bool) $name) {
			throw new InvalidArgumentException("Item name has to be given");
		}

		$name = $name . '%';
		return dibi::query('SELECT typeName name',
			'FROM [invTypes] ',
			'WHERE [typeName] like %s', $name,
			'AND [published] = 1', 
			'ORDER BY name',
			'LIMIT %i', $limit)
			->setRowClass("Item")
			->fetchAll();
	}

	/**
	 * vraci Item podle zadaneho jmena
	 * @param string $name
	 * @return Item
	 */
	public function getItemByName($name) {

		if (!$name) {
			throw new InvalidArgumentException("Item name has to be given");
		}

		$ret = dibi::query('
			SELECT I.typeID, I.groupID, I.typeName, I.description, 
				I.graphicID, I.radius, I.mass, I.volume, I.capacity, I.portionSize, 
				I.raceID, P.price, I.published, I.marketGroupID, I.chanceOfDuplicating, I.iconID, C.categoryID
			FROM invTypes I 
			LEFT JOIN price P USING (`typeID`)
			JOIN invGroups G USING (groupID)
			JOIN invCategories C USING (categoryID)
			WHERE [typeName] like %s', $name)
				->setRowClass("Item")
				->fetch();
		$em = new EveCentralModel();
		$ret->price = $em->getItemPrice($ret->typeID)->price;
		
		return $ret;
	}
	
	public function changePrice($name = '', $price = 0) {
		
		if (!(bool) $name) {
			throw new InvalidArgumentException("Item name has to be given");
		}
		
		if (!(bool) $price) {
			throw new InvalidArgumentException("Price has to be given");
		}
		if ($price<0) {
			throw new InvalidArgumentException("Price cant be negative");
		}
		
		
		$typeID = dibi::query("SELECT typeID from [invTypes] WHERE typeName like %s",$name);
		
		$p = new Price();
		$p->price = $price;
		$p->typeID = $typeID;
		$p->timestamp = time();
		
		return $p->update();
		
	}
	
	public function getAllForAC($itemName) {

		if (!(bool) $itemName) {
			throw new InvalidArgumentException("Item name has to be given");
		}
		
		
		$ret = dibi::query("
		SELECT DISTINCT S.id, S.label, S.value FROM (
			SELECT 
				typeId id,
				typeName label,
				typeName value,
				'1' razeni
			FROM [invTypes] 
			WHERE [typeName] like %s", $itemName . '%', 
			"AND [published] = 1
			UNION DISTINCT
			SELECT 
				typeId id,
				typeName label,
				typeName value,
				'2' razeni
			FROM [invTypes] 
			WHERE [typeName] like %s", '%' . $itemName . '%', 
			"AND [published] = 1
			ORDER BY razeni, label
			LIMIT 20) 
		AS S
			")
				->fetchAll();

		return $ret;
	}


}

