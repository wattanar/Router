<?php

	namespace Wattanar;

	class Router
	{
		public static $routes = [];
		public static $methods = [];

		public static function get($pattern, $callback) 
		{
			self::$routes[$pattern] = $callback;
			self::$methods[$pattern] = strtoupper("GET");
		}

		public static function post($pattern, $callback) 
		{
			self::$routes[$pattern] = $callback;
			self::$methods[$pattern] = strtoupper("POST");
		}

		public static function run($url = null)
		{
			$url = explode("?", str_replace($url, "", $_SERVER["REQUEST_URI"]))[0];
			$url = str_replace("//", "/", $url);
			// route exists
			if (array_key_exists($url, self::$routes)) {
				// match route method
				if (self::$methods[$url] !== $_SERVER["REQUEST_METHOD"]) {
					exit("<pre>Method not allow.</pre>");
				}
				// call function
				call_user_func(self::$routes[$url]);
				exit;
			} else {
				// Loop routes
				foreach (self::$routes as $route => $callback) {
					// Check params
					if (preg_match('#^' . $route . '$#', $url, $matched)) {
						// match route method
						if (self::$methods[$route] === $_SERVER["REQUEST_METHOD"]) {
							// shift out $matched[0]
							array_shift($matched);
							call_user_func_array($callback, $matched);
							exit;
						}
						// Method not match
						exit("<pre>Method not allow.</pre>");
					}
				}
				// route not found
				exit("<pre>404 not found.</pre>");
			}
		}
	}
