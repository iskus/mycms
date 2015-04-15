<?php
//	spl_autoload_register(
//		function ($className) {
//			$classFile = $className . '.php';
//			if (is_file($filename = PATH_TO_CORE . $classFile)) {
//				require_once $filename;
//			} elseif (is_file($filename = PATH_TO_LIBS . $classFile)) {
//				require_once $filename;
//			} elseif (is_file($filename = PATH_TO_APP  . 'controller/' . $classFile)) {
//				require_once $filename;
//			} elseif (is_file($filename = PATH_TO_APP  . 'model/' . $classFile)) {
//				require_once $filename;
//			} else {
//				var_dump($filename);
//			}
//		}
//	);
	chdir(PATH_TO_ROOT);
	spl_autoload_register(
		function ($className) {
			require_once str_replace('\\', '/', $className). '.php';
		}
	);