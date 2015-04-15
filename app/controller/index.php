<?php
	namespace app\controller;
	use core\Controller as Controller;

	class Index extends Controller {
		public function index($params = FALSE) {

		}
		/*protected $params = array();
		protected $page;
		protected $viewName;
		public function __construct($page) {
			$this->page = $page;
			$this->viewName = $this->page.'View';


			if($ajax = Data::getRequest('ajax')) {
				echo 'AJAX! TO '.get_class($this);
				$this->ajaxManager();
			}

			$this->execute();
			$View = new $this->viewName();
		}*/

		protected function execute() {
		}

		protected function ajaxManager() {
		}

	}
