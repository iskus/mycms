<?php

	$pathRoot = realpath(dirname(__FILE__)) . '/';

	define('PATH_ROOT', str_replace('\\', '/', $pathRoot));

	require_once('etc/config.php');
	require_once('etc/autoload.php');

	if (!($route = DATA::getRequest('route'))) $route = 'index';

	$actionName = $route."Action";

	$Action = new $actionName($route);