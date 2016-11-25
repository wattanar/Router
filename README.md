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

# Web Server Configuration

## Apache
```
Options All -Indexes
Options +FollowSymLinks

<IfModule mod_rewrite.c>
	RewriteEngine On
	RewriteCond %{REQUEST_FILENAME} !-f
	RewriteCond %{REQUEST_FILENAME} !-d
	RewriteRule ^(.*)$ index.php [QSA,L]
</IfModule>
```

## Nginx
```
location /myapp/ {
    try_files $uri $uri/ /myapp/index.php;
}
```
