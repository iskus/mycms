<?php
	namespace core;
	require_once(PATH_TO_LIBS . 'phpQuery/phpQuery/phpQuery.php');
	/**
	 * Semesenko Anton. Email: iskus1981@yandex.ru
	 * IDE PhpStorm. 12.04.2015
	 */
	class View {
		public function __construct() {
			$this->template = PATH_TO_TEMPLATES
			                  . strtolower(App::$controller . '/' . App::$action . '.htm');
			$this->page = \phpQuery::newDocument(PATH_TO_TEMPLATES . 'index.htm');
			$this->addScripts();
			$this->addStyles();

			//var_dump($this->page);

			$this->mongo = new \MongoClient();
			debug_print_backtrace();
		}

		public function addScripts() {
			require_once PATH_TO_TEMPLATES . 'script.php';
			foreach ($scripts as $script) {
				$this->page['head']->append(pq('script')->attr('src', 'web/js/' . $script . '.js'));

			}
		}

		public function addStyles() {
			require_once PATH_TO_TEMPLATES . 'css.php';
			foreach ($styles as $style) {
				$this->page['head']->append(
					pq('link')->attr('href', 'web/css/' . $style . '.css')
						->attr(['rel' => 'stylesheet', 'type' => 'text/css']));

			}
		}
	}