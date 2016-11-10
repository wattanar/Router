# Install with composer
```
{
	"require" : {
		"wattanar/router" : "dev-master"
	}
}
```

# Usage
```php
<?php

namespace Controllers;

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

$app->get('/', 'Controllers\HomeController::index');

$app->run(); // or Router::run('/path/to/web');

```
