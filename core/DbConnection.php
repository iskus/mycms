<?php
/**
 * Semesenko Anton. Email: iskus1981@yandex.ru 
 * IDE PhpStorm. 12.04.2015
 */

class DbConnection extends PDO {
	public function __construct() {
		var_dump(ReflectionClass::export('DbConnection'));
	}

}