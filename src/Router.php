<?php  

	namespace Gnix\Core;

	class Router
	{
		public function map($mapMethod, $mapUri, $callback) 
		{
			self::isTrustMethod($mapMethod);

			$currentUri = self::getUri();
			
			if ($currentUri === $mapUri) {
				if (is_callable(array($callback[0], $callback[1]))) {
					call_user_func(array($callback[0], $callback[1]));
					exit;
				} else {
					exit("<pre>404 not found.</pre>");
				}
			}
		}

		public function isTrustMethod($method)
		{
			if ($method !== $_SERVER["REQUEST_METHOD"]) {
				exit("<pre>404 not found.</pre>");
			}
			return true;
		}

		public function getUri()
		{
			$uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
			return $uri;
		}

		public function notFound()
		{
			 exit("<pre>404 not found.</pre>");
		}
	}
