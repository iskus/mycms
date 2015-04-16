<?php
	chdir(PATH_TO_ROOT);
	spl_autoload_register(
		function ($className) {
			require_once str_replace('\\', '/', $className) . '.php';
		}
	);