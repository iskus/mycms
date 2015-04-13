<?php
	class Test extends Controller {

		protected function execute() {
			$Book = new Books();

			if ($ajax = Data::getRequest('ajax')) {
				$this->ajaxManager($Book);
			}
			$this->params['books'] = $Book->_getListData();
			$this->params['alphabets'] = $Book->_getCountsData();
		}

		protected function ajaxManager(Books $Book) {
			$letter = Data::getRequest('letter');
			$this->params['books'] = $Book->_getListData(['letter' => $letter]);
			exit(json_encode($this->params['books']));
		}

	}
