<?php

/**
 * One Item of eden
 *
 * @author kubiq
 */
class Corporation extends DibiRow
{

	public $corporationID;
	public $size;
	public $extent;
	public $solarSystemID;
	public $investorID1;
	public $investorShares1;
	public $investorID2;
	public $investorShares2;
	public $investorID3;
	public $investorShares3;
	public $investorID4;
	public $investorShares4;
	public $friendID;
	public $enemyID;
	public $publicShares;
	public $initialPrice;
	public $minSecurity;
	public $scattered;
	public $fringe;
	public $corridor;
	public $hub;
	public $border;
	public $factionID;
	public $sizeFactor;
	public $stationCount;
	public $stationSystemCount;
	public $description;
	public $iconID;

	public function __construct($arr = array())
	{
		parent::__construct($arr);
	}
}
