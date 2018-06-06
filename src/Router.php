<?php

namespace Wattanar;

class Router
{
	private static $routes = [];
	private static $methods = [];
	private static $separate = "::";

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

	public static function setSeparate($separateString) {
		self::$separate = $separateString;
	}

	public static function run($url = null)
	{
		$url = explode("?", str_replace($url, "", $_SERVER["REQUEST_URI"]))[0];
		$url = str_replace("//", "/", $url);

		if (array_key_exists($url, self::$routes)) {

			if (self::$methods[$url] !== $_SERVER["REQUEST_METHOD"]) {
				exit("<pre>Method not allow.</pre>");
			}

			$obj = explode(self::$separate, self::$routes[$url]);
			
			$controller = new $obj[0];
			
			$func = $obj[1];

			exit($controller->$func());

		} else {

			foreach (self::$routes as $route => $callback) {

				if (preg_match("#^" . $route . "$#", $url, $matched)) {

					if (self::$methods[$route] !== $_SERVER["REQUEST_METHOD"]) {
						exit("<pre>Method not allow.</pre>");
					}

					array_shift($matched);
					
					$obj = explode(self::$separate, $callback);

					exit(call_user_func_array([new $obj[0](), $obj[1]], $matched));
				}
			}
			
			exit("<pre>404 not found.</pre>");
		}
	}
}
