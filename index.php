<?php 

	require './src/Router.php';

	use Gnix\Router as R;
	
	R::map('GET', '/', ['home', 'index']);
	
	R::notFound();
