<?php  
	namespace Gnix;

	class Router
	{
		public function map($mapMethod, $mapUri, $fn) 
		{
			self::isTrustMethod($mapMethod);

			$currentUri = self::getUri();
			
			if ($currentUri === $mapUri) {
				if (is_callable(array($fn[0], $fn[1]))) {
					call_user_func(array($fn[0], $fn[1]));
					exit;
				} else {
					exit('<pre>404 not found.</pre>');
				}
			} else {
				exit('<pre>404 not found.</pre>');
			}
		}

		public function isTrustMethod($method)
		{
			if ($method !== $_SERVER['REQUEST_METHOD']) {
				exit('<pre>404 not found.</pre>');
			}
			return true;
		}

		public function getUri($subDir = null)
		{
			if ($subDir === null) {
				$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
			} else {
				$uri = str_replace($subDir, "", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
			}
			return $uri;
		}
	}