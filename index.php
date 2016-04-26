<?php

	require './src/Router.php';
	require './routes.php';

	use Gnix\Core\Router as R;

	R::addRoute("GET", "/", array("Route", "index"));

	R::start("/gnix");
