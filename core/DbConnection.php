<?php

	/**
	 * Semesenko Anton. Email: iskus1981@yandex.ru
	 * IDE PhpStorm. 12.04.2015
	 */
	class DbConnection extends PDO {
		public function __construct($driver) {
			$config = Config::getDbConfig($driver);
			$dns = $driver . ':dbname=' . $config->db . ";host=" . $config->host;
			parent::__construct($dns, $config->user, $config->pass);
		}

	}