<?php

	require "./vendor/autoload.php";

	use Gnix\Core\Router as R;

	R::addRoute("GET", "/", ["Page", "index"]);

	R::start("/gnix");