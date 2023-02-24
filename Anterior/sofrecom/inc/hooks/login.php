<?php

	// Login
	function my_login_logo_url_title() { return get_bloginfo('name'); }
	add_filter('login_headertitle', 'my_login_logo_url_title');

	function my_login_logo_url() { return get_bloginfo('url'); }
	add_filter('login_headerurl', 'my_login_logo_url');  

	function login_css() { echo '<link href="'.get_bloginfo('template_url').'/assets/css/login.css" rel="stylesheet">'; }
	add_action('login_head', 'login_css');


	// Redirection
	function login_redirect($redirect_to, $request, $user) {
		if (isset($user->roles) && is_array($user->roles)) {
			if(in_array('administrator', $user->roles)) {
				return admin_url();
			} else {
				return site_url();
			}
		} else {
			return site_url();
		}
	}

	add_filter('login_redirect', 'login_redirect', 10, 3);

