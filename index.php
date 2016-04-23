<?php
	
	require './vendor/autoload.php';
	require './bootstrap.php';

	use Gnix\Core\Router as R;
	
	R::addRoute('GET', '/', ['my_class', 'my_function']);
	
	R::notFound();