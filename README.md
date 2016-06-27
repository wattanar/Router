# Usage
```php
<?php

$app = new \Wattanar\Gnix();

$app->get("/", "\App\Controller\Home@index");

$app->run("/gnix");
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
