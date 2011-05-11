<?php

/**
 * Transaction
 * this class represents one transaction between player and npc corporation
 * 
 * @author kubiq
 */
class Transaction extends DibiRow {
	
	/**
	 * id, auto generated
	 * @var int 
	 */
	public $id;
	/**
	 * item for sale(typeID)
	 * @var int
	 */
	public $itemID;
	/**
	 * loaliaty points needed
	 * @var int
	 */
	public $lp;
	/**
	 * isk needed
	 * @var int
	 */
	public $isk;
	/**
	 * amount of items you get
	 * @var int
	 */
	public $bulk;
	
	public function __construct($arr = array()) {
		parent::__construct($arr);
	}
}

