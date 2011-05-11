<?php

/**
 * One Item
 *
 * @author kubiq
 */
class Price extends DibiRow {

	public $typeID;
	public $price;
	public $timestamp;

	public function __construct($arr = array()) {
		parent::__construct($arr);
	}

	public function update() {
		return dibi::query('UPDATE [price] SET', (array) $this, 'WHERE [typeID]=%i', $this->typeID);
	}

	public function delete() {
		return dibi::query('DELETE FROM [price] WHERE [typeID]=%i', $this->typeID);
	}

}
