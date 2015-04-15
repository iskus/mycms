<?php
	namespace app\controller;
	use core\Controller as Controller;

	class Test extends Controller {

		public function index($params = FALSE) {
			echo 'INDEX';
			$book = new MBook();

			$alpha = new TestAlphabetMaster($book->Db);
			$alpha->_init([
				'field' => 'title',
				'table' => 'books'
			]);
			var_dump($alpha->_getCountRowsForEveryLetter());
			$author = new MAuthor();
			var_dump($author->getAllAuthors());
		}

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
