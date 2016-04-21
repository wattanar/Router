<?php 

	require "./src/Router.php";
	require "./controllers/routes.php";

	define("ROOT", "/gnix");

	use Gnix\Core\Router as R;
	
	R::map("GET", "/", ["\Gnix\App\Route", "index"]);
	
	R::notFound();
