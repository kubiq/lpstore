<?php

/**
 * Requirement
 * this class represents one item which is needed for transaction in lp store
 *
 * @author kubiq
 */
class Requirement extends DibiRow{

	/**
	 * id
	 * @var int
	 */
	public $id;
	/**
	 * item needed
	 * @var int
	 */
	public $typeID;
	/**
	 * quantity if item needed
	 * @var int
	 */
	public $quantity;
	/**
	 * transactionID where this belongs to
	 * @var int
	 */
	public $transactionID;

	public function __construct($arr = array()) {
		parent::__construct($arr);
	}

}

