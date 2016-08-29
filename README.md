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

require 'vendor/autoload.php';

use Wattanar\Router;

Router::get('/', 'Controllers\HomeController::index');

Router::run(); // or Router::run('/path/to/web');

```
