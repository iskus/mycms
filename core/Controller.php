<?php
	namespace core;
	/**
	 * Semesenko Anton. Email: iskus1981@yandex.ru
	 * IDE PhpStorm. 12.04.2015
	 */
	class Controller {
		protected $vars;
		protected $view;

		public function __construct($vars = FALSE) {
			$this->view = new View();
			//$this->$action();
//			$this->params['page'] = $page;
//			$this->viewName = $this->params['page'] . 'View';
//
//			$this->execute();
//			$View = new $this->viewName($this->params);
		}

	}