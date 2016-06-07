# Usage
```php
<?php

$app = new \Wattanar\Gnix();

$app->get("/", "HomeController@index");

$app->run("/gnix");
```
```php
<?php

class HomeController
{
	public function index()
	{
		echo "Hello World!";
	}
{
```
