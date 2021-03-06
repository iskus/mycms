<?php
	namespace app\controller;
	use core\Controller as Controller;
	use app\model\Book as Book;
	use app\model\Author as Author;
	use core\Loader;
	use core\sources\UsefulData;
	//use core\View;
	//use libs\TestAlphabetMaster as TestAlphabetMaster;

	class Test extends Controller {

		public function index($params = FALSE) {
			echo 'INDEX';
			$book = new Book();

			$alpha = Loader::getLibrary('TestAlphabetMaster', $book->Db);
			$alpha->_init([
				'field' => 'title',
				'table' => 'books'
			]);
			var_dump($alpha->_getCountRowsForEveryLetter(), '1111111111111111111111111111111111111111111111');
		}

		public function test($letter = FALSE) {
			echo "<br/>{$letter[0]}<br/>>>> Test->test():<br/>>"
			     . date('Y-m-d') . "<br/>>" . date('Y-m-d', time() - 60 * 60 * 24);
			echo UsefulData::getRequest('c');
			var_dump($this->view);
		}

		protected function execute() {
			$Book = new Book();

			if ($ajax = Data::getRequest('ajax')) {
				$this->ajaxManager($Book);
			}
			$this->params['books'] = $Book->_getListData();
			$this->params['alphabets'] = $Book->_getCountsData();
		}

		protected function ajaxManager(Book $Book) {
			$letter = Data::getRequest('letter');
			$this->params['books'] = $Book->_getListData(['letter' => $letter]);
			exit(json_encode($this->params['books']));
		}

	}
