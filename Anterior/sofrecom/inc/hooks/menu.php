<?php

	// Menu
	add_theme_support('menus');

	if (function_exists('register_nav_menus')) { 

		register_nav_menus(array(
			'header' => 'Cabecera',
			'information' => 'Información',
			'footer' => 'Pie',
		));

	}