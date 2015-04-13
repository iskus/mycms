<?php

	/**
	 * Semesenko Anton. Email: iskus1981@yandex.ru
	 * IDE PhpStorm. 12.04.2015
	 */
	final class Config {
		private static $dbConfigs;

		private function __construct() {
		}

		public static function getDbConfig($driver) {
			self::$dbConfigs->offsetGet($driver);
		}

		public static function setDbConfigs(ArrayObject $collection) {
			self::$dbConfigs = $collection;
		}

		public static function setDbConfig() {

		}
	}