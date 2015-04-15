<?php
/**
 * Semesenko Anton. Email: iskus1981@yandex.ru 
 * IDE PhpStorm. 15.04.2015
 */

namespace core;
use app\controller;


class App {
	public  $controller,
			$action,
			$params;

	public function __construct($c, $a, $p = []) {
		$this->controller   = $c;
		$this->action       = $a;
		$this->params       = $p;
	}

	public function run() {
		$controller = '\app\controller\\' . $this->controller;

		try {
			$exec = new $controller();
			$exec->{$this->action}($this->params);
		} catch (\Exception $e) {
			echo $e->getMessage();
		}
	}

}