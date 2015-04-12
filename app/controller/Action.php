<?php
namespace actions;
	abstract class Action {
		protected $params;
		protected $viewName;

		public function __construct($page) {
			$this->params['page'] = $page;
			$this->viewName = $this->params['page'].'View';

			$this->execute();
			$View = new $this->viewName($this->params);
		}

		protected function execute() {}
	}
