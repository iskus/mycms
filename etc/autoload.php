<?php

	//chdir(dirname(__FILE__));

	spl_autoload_register(function ($className) {var_dump($className);
		$classFile = $className . '.php';var_dump($classFile);
		if (is_file($filename = PATH_TO_CORE . $classFile)) {var_dump($filename);
			require_once $filename;
		} elseif (is_file($filename = PATH_TO_LIBS . $classFile)) {var_dump($filename);
			require_once $filename;
		} elseif (is_file($filename = PATH_TO_APP  . 'controller/' . $classFile)) {var_dump($filename);
			require_once $filename;
		} else {
			var_dump($filename);
		}
	});
