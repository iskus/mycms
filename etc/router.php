<?php
	$router = new Router();
	$controller = ucfirst($router->getController());
	$action = $router->getAction();
	$params = $router->getParams() ? $router->getParams() : FALSE;

	try {
		$exec = new $controller($params);
		$exec->$action();
	} catch (Exception $e) {
		echo $e->getMessage();
	}
