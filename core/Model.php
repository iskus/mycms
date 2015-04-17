<?php
	namespace core;
	use core\database\Db as Db;
/**
 * Semesenko Anton. Email: iskus1981@yandex.ru
 * IDE PhpStorm. 12.04.2015
 */
	class Model extends App {
		/**
		 * @var \MysqlDbConnection
		 */
		public $Db;

		public function __construct() {
			$this->Db = Db::getInstance('mysql');
		}

	}