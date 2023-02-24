<?php

	// Remove wp version
	remove_action('wp_head', 'wp_generator');

	function remove_version() {
		return '';
	}
	add_filter('the_generator', 'remove_version');


	// Remove Login Errors
	function remove_login_errors( $error ) {
	    return '<strong>Error:</strong> Incorrect login details. Try again';
	}
	add_filter( 'login_errors', 'remove_login_errors' );