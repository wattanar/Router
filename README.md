# Install with composer
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

Router::run(); // or Router::run('/path/to/web');

```
```php
<?php

namespace App\Http\Controllers;

class HomeController
{
	public function index()
	{
		echo 'Hello World!';
	}
}
```
