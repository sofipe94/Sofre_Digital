<?php

	// Enable HTML e-mails
	function set_html_emails(){
	    return "text/html";
	}
	add_filter('wp_mail_content_type','set_html_emails');


	// Email name
	function email_from_name($original){
		return get_bloginfo('name');
	}
	add_filter( 'wp_mail_from_name', 'email_from_name');


	//
	function email_from_email($email){
	    return get_bloginfo('admin_email');
	}
	add_filter( 'wp_mail_from', 'email_from_email' );
