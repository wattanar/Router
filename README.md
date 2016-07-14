# Install
```
{
	"require" : {
		"wattanar/router" : "dev-master"
	}
}
```

# How to use
```php
<?php

require 'vendor/autoload.php';

use Wattanar\Router;

Router::get('/', 'App\Http\Controllers\HomeController::index');

Router::run();

/* 
If you run in sub folder you should put your path in.
Router::run('/path/to/web');
*/
```
```php
<?php

namespace App\Http\Controllers;

class HomeController
{
	public static function index()
	{
		echo 'Hello World!';
	}
{
```
