<?php

	abstract class View {
		protected $data;
		protected static $doc;

		public function __construct($data) {
			$this->data = $data;
			self::$doc =
				phpQuery::newDocument("<!DOCTYPE html>
										<html>
											<head>
												<title>".$data["page"]."</title>
											</head>
											<body>
												<div id='main'></div>
											</body>
										</html>");
			self::$doc['head']->append("
				<script src='/web/js/jquery/jquery.js'></script>
				<script src='/web/js/".$data["page"].".js'></script>
				<link href='/web/css/style.css' rel='stylesheet' type='text/css' />
				<link href='/web/css/".$data["page"].".css' rel='stylesheet' type='text/css' />
			");

			$this->showPage();
		}

		protected function doContent() {

		}

		protected function showPage() {
			$this->doContent();
			print self::$doc->htmlOuter();
		}
	}
