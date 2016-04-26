<?php

	require './src/Router.php';

	use Gnix\Core\Router as R;

	R::addRoute("GET", "/", array("my_class", "my_function"));

	R::start("/if_your_app_in_sub_folder");
