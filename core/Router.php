<?php
	namespace core;

	class Router {
		private $controller = 'index',
				$action = 'index',
				$params = [];


		function __construct() {
			$route = explode('/', $_REQUEST['route']);

			if (!empty($route[0]) && $route != '/') {
				$this->controller = $route[0];
				if (count($route) > 1) {
					foreach ($route as $key => $val) {
						if ($key == 1) {
							$this->action =
								$val ? $val : 'index';
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
			return ucfirst($this->controller);
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