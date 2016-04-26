<?php

	class Route
	{		
		public function index()
		{
			echo "Hello Gnix :)";
		}

		public function name($name)
		{
			echo "Hello " . $name;
		}
	}