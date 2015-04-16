<?php
	define('PATH_TO_ROOT', str_replace('\\', '/', realpath(dirname(__FILE__))));
	define('APP_FOLDER', 'app');
	define('PATH_TO_APP', PATH_TO_ROOT . '/' . APP_FOLDER . '/');

	require_once('etc/autoload.php');

	$configCollection = new ArrayObject;
	$appConfig = [];
	require_once('etc/config.php');
	require_once(PATH_TO_APP . 'config/config.php');
	foreach ($appConfig as $index => $value)
		$configCollection->offsetSet($index, $value);

	use core\Config as Config;
	Config::setDbConfigs($configCollection);
	var_dump(Config::getDbConfigs());

	use core\Router as Router;
	$router = new Router();
	$controller = ucfirst($router->getController());
	$action = $router->getAction();
	$params = $router->getParams() ? $router->getParams() : FALSE;

	use core\App as App;
	$app = new App($controller, $action, $params);
	$app->run();