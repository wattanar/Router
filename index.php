<?php 

	require './src/Router.php';
	require './src/Validator.php';
	require './bootstrap.php';

	use Gnix\Router as R;
	use Gnix\Validator as V;
	
	R::map('GET', '/', ['Route', 'index']);
	
	R::notFound();
