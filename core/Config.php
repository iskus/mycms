<?php
namespace core;
	/**
	 * Semesenko Anton. Email: iskus1981@yandex.ru
	 * IDE PhpStorm. 12.04.2015
	 */
	final class Config {
		private static $dbConfigs;

		private function __construct() {
		}

		public static function getDbConfigs() {
			return self::$dbConfigs;
		}

		public static function setDbConfigs(array $collection) {
			self::$dbConfigs = $collection;
		}

		public static function getDbConfig($driver) {
			return self::$dbConfigs[$driver];
		}

		public static function setDbConfig($key, \stdClass $confObject) {
			self::$dbConfigs[$key] = $confObject;
		}
	}