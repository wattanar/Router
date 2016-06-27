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

$app = new \Wattanar\Router();

$app->get("/", "\App\Controller\Home@index");

$app->run("/router");
```
```php
<?php

namespace App\Controller;

class Home
{
	public function index()
	{
		echo "Hello World!";
	}
{
```
