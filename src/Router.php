<?php  

	namespace Gnix\Core;

	class Router
	{
		public function addRoute($mapMethod, $mapUri, $mapFunc) 
		{
			self::isTrustMethod($mapMethod);

			$currentUri = self::getUri(__RootURL);
			
			if ($currentUri === $mapUri) {
				if (is_callable(array($mapFunc[0], $mapFunc[1]))) {
					call_user_func(array($mapFunc[0], $mapFunc[1]));
					exit;
				}
			}
			return;
		}

		public function isTrustMethod($method)
		{
			if ($method !== $_SERVER["REQUEST_METHOD"]) {
				exit("<pre>404 not found.</pre>");
			}
			return true;
		}

		public function getUri($baseUrl = null)
		{
			$uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
			if ($baseUrl !== null) {
				$uri = str_replace($baseUrl, "", $uri);	
			}
			return $uri;
		}

		public function notFound()
		{
			 exit("<pre>404 not found.</pre>");
		}
	}
