<?php

	foreach (glob('./controllers/*.php') as $f) {
		require $f;
	}