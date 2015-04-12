<?php
	class Router {
		private $controller = 'index',
			$action = 'index',
			$params = [];


		function __construct() {
			$route = explode('/', $_REQUEST['route']);
			if ($route && $route != '/') {
				$this->controller = $route[0];
				if (count($route) > 1) {
					foreach ($route as $key => $val) {
						if ($key == 1) {
							$this->action = $val;
						} elseif ($key > 1) {
							$this->params[] = $val;
						}
					}
				}
			}
		}

		/**
		 * @return string
		 */
		public function getController() {
			return $this->controller;
		}

		/**
		 * @return string
		 */
		public function getAction() {
			return $this->action;
		}

		/**
		 * @return array
		 */
		public function getParams() {
			return $this->params;
		}

	}