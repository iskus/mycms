<?php
/**
 * Semesenko Anton. Email: iskus1981@yandex.ru 
 * IDE PhpStorm. 15.04.2015
 */

namespace core;

class App {
	public static   $controller,
					$action,
					$params;

	public function __construct($c, $a, $p = []) {
		self::$controller   = $c;
		self::$action       = $a;
		self::$params       = $p;
	}

	public function run() {
		$controller = APP_FOLDER . '\\controller\\' . self::$controller;
		try {
			$run = new $controller();
			$run->{self::$action}(self::$params);
		} catch (\Exception $e) {
			echo $e->getMessage();
		}
	}

}