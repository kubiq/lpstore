<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BaseModel
 *
 * @author kubiq
 */
abstract class BaseModel {
	/*	 * ******************* Connection handling ******************** */

	/** @var DibiConnection */
	public static $defaultConnection;

	/**
	 * Establishes the database connection.
	 */
	public static function connect() {
		// use configuration from 
		self::$defaultConnection = dibi::connect(Nette\Environment::getConfig('database'));
	}

	/**
	 * Disconnects from the database.
	 */
	public static function disconnect() {
		// self::$defaultConnection->disconnect();
	}

	/*	 * ******************* Model behaviour ******************** */

	/** @var DibiConnection */
	protected $connection;
	/** @var string object name */
	protected $name;
	/** @var string primary key name */
	protected $primary;
	/** @var bool autoincrement? */
	protected $autoIncrement = TRUE;


	public function __construct(DibiConnection $connection = NULL) {
		$this->connection = ($connection !== NULL ? $connection : self::$defaultConnection);
	}
	

	

}

