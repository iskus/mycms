<?php if (!defined('PATH_TO_ROOT')) {
	exit();
}
	define('PATH_TO_APP', PATH_TO_ROOT . '/app/');
	define('PATH_TO_CORE', PATH_TO_ROOT . '/core/');
	define('PATH_TO_LIBS', PATH_TO_ROOT . '/libs/');
	define('PATH_TO_WEB', PATH_TO_ROOT . '/web/');
	define('PATH_TO_JS', PATH_TO_WEB . '/js/');
	define('PATH_TO_CSS', PATH_TO_WEB . '/css/');
	define('PATH_TO_IMG', PATH_TO_WEB . '/img/');

	require_once('autoload.php');


	$dbConnectionConfigs = new ArrayObject();

	$mysqlConfig =
	$mongoConfig =
		new stdClass();

/** MySQL connection configuration */
	$mysqlConfig->host = 'localhost';
	$mysqlConfig->user = 'root';
	$mysqlConfig->pass = '';
	$mysqlConfig->db = 'localtest';
	$dbConnectionConfigs->offsetSet('mysql', $mysqlConfig);

/** MongoDB connection configuration */
	$mongoConfig->host = '';
	//...
	$dbConnectionConfigs->offsetSet('mongo', $mongoConfig);








	Config::setDbConfigs($dbConnectionConfigs);
