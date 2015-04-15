<?php

	/**
	 * Semesenko Anton. Email: iskus1981@yandex.ru
	 * IDE PhpStorm. 12.04.2015
	 *
	 * @property $Db object MysqlDbConnection
	 */
	class Model {
		/**
		 * @var MysqlDbConnection
		 */
		protected $Db;
		public function __construct() {
			$this->Db = Db::getInstance('mysql');
		}

	}