<?php
	namespace core;
	require_once(PATH_TO_LIBS . 'phpQuery/phpQuery/phpQuery.php');
	/**
	 * Semesenko Anton. Email: iskus1981@yandex.ru
	 * IDE PhpStorm. 12.04.2015
	 */
	class View extends App {
		public function __construct() {
			$this->templateFolder =
				strtolower($this->controller . '/' . $this->action . 'htm');
			$this->doc = \phpQuery::newDocument('<div/>');
			$this->mongo = new \MongoClient();

		}
	}