<?php

	class Db {
		private $connections;
		private static $instance;

		private function __construct() {
			$this->connections = [];
		}

		private function getConnection($driver) {
			if (!is_object($this->connections[$driver])) {
				$this->addConnection($driver);
			}

			return $this->connections[$driver];
		}

		private function addConnection($driver) {
			$this->connections[$driver] = new DbConnection($driver);
		}

		public static function getInstance($driver = false) {
			if (!(self::$instance instanceof self)) {
				self::$instance = new self();
			}

			return self::$instance->getConnection($driver);
		}

		private function __clone() {
		}
	}
