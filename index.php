<?php 
	// Core
	require './src/Router.php';
	// Controllers
	require './controllers/routes.php';

	use Gnix\Router as R;
	
	R::map('GET', '/', ['\Gnix\Route', 'index']);
	
	R::notFound();
