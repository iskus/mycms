<?php
use core\App as App;
	define('PATH_TO_ROOT', str_replace('\\', '/', realpath(dirname(__FILE__))));

	require_once('etc/config.php');
	require_once('etc/router.php');