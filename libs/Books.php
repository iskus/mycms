<?php

	class Books {
		use ABCManager
		{

		}
		private $id;
		private $title;
		private $description;
		private $lang;

		public function __construct() {
			$this->_DB = DB::getInstance();
		}

		public function getBook() {

		}

		public function getCategory(){

		}

		public function getAuthor() {

		}

		public function addBook($title, $description = '') {

			$this->title = $this->_DB->escape_str($title);
			$this->description = $this->_DB->escape_str($description);

			$query = "INSERT INTO books VALUES (null, '{$this->title}', '{$this->description}') ";

			$this->_DB->query($query);

			$this->id = $this->_DB->insert_id();

			return $this;

		}

		public function setBook() {

		}

		public function delBook() {

		}

		public function getId() {
			return $this->id;
		}



	}
