<?php
	$router = new Router();
	$controller = $router->getController();
	$action = $router->getAction();
	$params = $router->getParams();

	$exec = new $controller();
	$exec->$action();
