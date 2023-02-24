<?php

	// Customize Admin Styles
	function admin_style() {
		wp_enqueue_style('customize', get_template_directory_uri() . '/assets/css/admin.css');
	}

	add_action('admin_enqueue_scripts', 'admin_style');


	// Admin Bar
	show_admin_bar(false);