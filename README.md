# GNIX Router
## How to use
```php
<?php

	require './src/Router.php';
	require './routes.php';

	use Gnix\Core\Router as R;

	R::addRoute("GET", "/", array("Route", "index"));
	R::addRoute("GET", "/hello/([a-z]+)", array("Route", "name"));

	R::start("/gnix");
```
