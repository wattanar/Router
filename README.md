# Install
```
{
	"require" : {
		"wattanar/router" : "dev-master
	}
}
```

# How to use
```php
<?php

require 'vendor/autoload.php';

use Wattanar\Router;

Router::get("/", "App\Http\Controller\HomeController::index");

Router::run("/router");
```
```php
<?php

namespace App\Http\Controller;

class HomeController
{
	public static function index()
	{
		echo "Hello World!";
	}
{
```
