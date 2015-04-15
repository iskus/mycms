<?php
	use core\Router as Router;
	use core\App as App;
	$router = new Router();
	$controller = ucfirst($router->getController());
	$action = $router->getAction();
	$params = $router->getParams() ? $router->getParams() : FALSE;
	$app = new App($controller, $action, $params);
	$app->run();
