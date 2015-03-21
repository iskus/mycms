<?php

	class DB {
		private $DB;
		private static $instance;

		private function __construct(){
			$mysqli = new mysqli(HOST, USER, PASS, DBName);
			if (mysqli_connect_errno()){
				throw new Exception('Connection error: '.mysqli_connect_error());
			}
			$this->DB = $mysqli;
			$this->DB->set_charset("utf8");
		}

		public static function getInstance(){
			if (!(self::$instance instanceof self)){
				self::$instance = new self();
			}
			return self::$instance;
		}

		public function query($sql){
			return $this->DB->query($sql);
		}

		public function escape_str($str){
			$str=$this->DB->escape_string($str);
			return $str;
		}

		public function insert_id(){
			return $this->DB->insert_id;
		}

		private function __clone(){}
	}
