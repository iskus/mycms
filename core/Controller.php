<?php
	namespace core;
	/**
	 * Semesenko Anton. Email: iskus1981@yandex.ru
	 * IDE PhpStorm. 12.04.2015
	 */
	class Controller {
		protected $params;
		protected $viewName;

		public function __construct($action = 'index') {
			//$this->$action();
//			$this->params['page'] = $page;
//			$this->viewName = $this->params['page'] . 'View';
//
//			$this->execute();
//			$View = new $this->viewName($this->params);
		}

		public function index($params = FALSE) {
			var_dump($params);
		}

		protected function execute() {
		}
	}