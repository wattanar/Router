<?php

	namespace Gnix\Core;

	class Router
	{
		public static $routes = array();
		public static $methods = array();

		public function addRoute($method, $pattern, $callback) 
		{
			self::$routes[$pattern] = $callback;
			self::$methods[$pattern] = strtoupper($method);
		}

		public function start($url = null)
		{
			$url = explode("?", str_replace($url, "", $_SERVER["REQUEST_URI"]))[0];
			$url = str_replace("//", "/", $url);

			if (!array_key_exists($url, self::$routes)) {
				exit("<pre>404 not found.</pre>");
			}

			if (!is_callable(self::$routes[$url])) {
				exit("<pre>404 not found.</pre>");
			}

			if (self::$methods[$url] !== $_SERVER["REQUEST_METHOD"]) {
				exit("<pre>Method not allow.</pre>");
			}

			call_user_func(self::$routes[$url]);
		}
	}
