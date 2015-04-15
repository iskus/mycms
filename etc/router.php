<?php
	$router = new Router();
	$controller = ucfirst($router->getController());
	$action = $router->getAction();
	$params = $router->getParams() ? $router->getParams() : FALSE;
	var_dump($controller.'---'.$action);
	try {
		$exec = new $controller();
		echo $controller.'---try---'.$action;
		$exec->$action($params);
	} catch (Exception $e) {
		echo $e->getMessage();
	}
