# Install with composer
```
{
	"require" : {
		"wattanar/router" : "dev-master"
	},
	"autoload": {
		"psr-4": {
			"App\\" : "app"
		}
	}
}
```

# Usage
```php
<?php

namespace App\Controllers;

class HomeController
{
	public function index()
	{
		echo 'Hello World!';
	}
}
```

```php
<?php

require_once 'vendor/autoload.php';

$app = new \Wattanar\Router;

$app->get('/', 'App\Controllers\HomeController::index');

$app->run();

```
