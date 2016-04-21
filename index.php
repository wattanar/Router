<?php

	require './vendor/autoload.php';

	use Gnix\Core\Router as R;
	
	R::map('GET', '/', ['my_class', 'my_function']);
	
	R::notFound();