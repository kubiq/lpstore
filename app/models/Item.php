<?php


/**
 * One Item of eden
 *
 * @author kubiq
 */
class Item extends DibiRow{
	
	public $typeID;
	public $groupID;
	public $typeName;
	public $description;
	public $graphicID;
	public $radius;
	public $mass;
	public $volume;
	public $capacity;
	public $portionSize;
	public $raceID;
	public $basePrice;
	public $published;
	public $marketGroupID;
	public $chanceOfDuplicating;
	public $iconID;
	
	public function __construct($arr = array()) {
		parent::__construct($arr);
	}
	
}
