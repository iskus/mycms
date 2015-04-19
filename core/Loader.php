<?php
/**
 * Semesenko Anton. Email: iskus1981@yandex.ru 
 * IDE PhpStorm. 17.04.2015
 */

namespace core;

class Loader {
	/**
	 * @param $className
	 * @param array $params
	 * @return object $className
	 */
	public static function getLibrary($className, $params = []) {
		$pref = 'libs\\';
		//var_dump(new $pref.$className);die;
		$use = $className;
		$path = PATH_TO_LIBS . $className;
		$file = $path . '.php';
		$use = self::recursive($use, $path, $className);
		//gitvar_dump($use);
		return $use;
	}

	private static function recursive($use, $path, $className) {
		//var_dump(is_dir($path), !is_file($file = $path . '.php'), $use, $file, $path);
		if (is_dir($path) && !is_file($file = $path . '.php')) {
			$use .= '\\' . $className;
			$path .= '/' . $className;
			self::recursive($use, $path, $className);
		} elseif (is_file($path . '.php')) {
			return ['use' => $use, 'path' => $path];
		} else {
			return FALSE;
		}
	}


}