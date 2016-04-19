<?php 

	require './src/Router.php';
	require './src/Validator.php';

	use Gnix\Router as R;
	use Gnix\Validator as V;
	
	R::map('GET', '/', ['home', 'index']);
	
	R::notFound();
