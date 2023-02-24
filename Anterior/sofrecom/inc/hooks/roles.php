<?php

	//
	function add_cartografo_role() {
		add_role('rrhh', 'RRHH', array(
			'read' => true,
			'edit_posts' => true,
			'delete_posts' => true,
			'publish_posts' => true,
			'upload_files' => true,
		));
	}
	add_action('admin_init', 'add_cartografo_role' );


	//

	function add_maps_role_caps() {
	    // Add the roles you'd like to administer the custom post types
	    $roles = array('rrhh');

	    // Loop through each role and assign capabilities
	    foreach($roles as $the_role) { 

	        $role = get_role($the_role);

	        $role->add_cap( 'read' );
	        $role->add_cap( 'read_posts');
	        $role->add_cap( 'read_private_posts' );
	        $role->add_cap( 'edit_posts' );
	        $role->add_cap( 'edit_others_posts' );
	        $role->add_cap( 'edit_published_posts' );
	        $role->add_cap( 'publish_posts' );
	        $role->add_cap( 'delete_others_posts' );
	        $role->add_cap( 'delete_private_posts' );
	        $role->add_cap( 'delete_published_posts' );
	 	}
	}
	add_action('admin_init','add_maps_role_caps',999);


	//
	$user = wp_get_current_user();

	if(in_array('rrhh', $user->roles)){

		function role_rrhh_style(){
			wp_enqueue_style('role-rrhh-styles', get_template_directory_uri() . '/assets/css/roles/role_rrhh.css', false, uniqid());
		}

		add_action('admin_enqueue_scripts', 'role_rrhh_style');

	}