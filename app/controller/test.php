<?php
	namespace app\controller;
	use core\Controller as Controller;
	use app\model\Book as Book;
	use app\model\Author as Author;
	use libs\TestAlphabetMaster as TestAlphabetMaster;

	class Test extends Controller {

		public function index($params = FALSE) {
			echo 'INDEX';
			$book = new Book();

			$alpha = new TestAlphabetMaster($book->Db);
			$alpha->_init([
				'field' => 'title',
				'table' => 'books'
			]);
			var_dump($alpha->_getCountRowsForEveryLetter());
			$author = new Author();
			var_dump($author->getAllAuthors());
		}

		protected function execute() {
			$Book = new Book();

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
