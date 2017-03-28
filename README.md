# Install with composer
```
{
	"require" : {
		"wattanar/router" : "dev-master"
	},
	"autoload": {
		"psr-4": {
			"App\\" : "app/"
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
server {
	listen       3100;
	server_name  localhost;

	root   html/myweb;
	index  index.php index.html index.htm;

	location / {
	    try_files $uri $uri/ /index.php$is_args$args;
	}
	
	location ~* \.(js|jpg|png|css)$ {
		expires off;
	}

	location ~ \.php$ {
	    try_files $uri =404;
	    fastcgi_split_path_info ^(.+\.php)(/.+)$;
	    fastcgi_pass   127.0.0.1:9123;
	    fastcgi_index  index.php;
	    fastcgi_param  SCRIPT_FILENAME  $document_root$fastcgi_script_name;
	    include        fastcgi_params;
	}
}
```
