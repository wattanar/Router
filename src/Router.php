<?php

namespace Wattanar;

class Router
{
	private static $routes = [];
	private static $methods = [];

	public static function get($pattern, $callback) 
	{
		self::$routes[$pattern] = $callback;
		self::$methods[$pattern] = "GET";
	}

	public static function post($pattern, $callback) 
	{
		self::$routes[$pattern] = $callback;
		self::$methods[$pattern] = "POST";
	}
	
	public static function put($pattern, $callback) 
	{
		self::$routes[$pattern] = $callback;
		self::$methods[$pattern] = "PUT";
	}
	
	public static function delete($pattern, $callback) 
	{
		self::$routes[$pattern] = $callback;
		self::$methods[$pattern] = "DELETE";
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
			// Instanitate controller
			$obj = explode("::", self::$routes[$url]);
			// call function
			$controller = new $obj[0];
			$func = $obj[1];
			exit($controller->$func());
		} else {
			// Loop routes
			foreach (self::$routes as $route => $callback) {
				// Check params
				if (preg_match("#^" . $route . "$#", $url, $matched)) {
					// match route method
					if (self::$methods[$route] !== $_SERVER["REQUEST_METHOD"]) {
						// Method not match
						exit("<pre>Method not allow.</pre>");
					}
					// shift out $matched[0]
					array_shift($matched);
					// Instanitate controller
					$obj = explode("::", $callback);
					exit(call_user_func_array([new $obj[0](), $obj[1]], $matched));
				}
			}
			// route not found
			exit("<pre>404 not found.</pre>");
		}
	}
}
