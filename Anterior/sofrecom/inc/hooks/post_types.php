<?php

// Post Type
function create_post_type(){

	// RRHH
	register_post_type(
		'rrhh',
		array(
			'labels' => array(
				'menu_name'         => __('Bolsa de trabajo'),
				'name' => __('Bolsa de trabajo'),
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('with_front' => false, 'slug' => 'trabajos'),
			'query_var' => true,
			'show_ui' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'supports' => array('title', 'editor', 'thumbnail'),
			'menu_icon' => 'dashicons-businessman',
			'menu_position' => 5,
		)
	);

	register_post_type(
		'success',
		array(
			'labels' => array(
				'menu_name'         => __('Casos de exito'),
				'name' => __('Casos de exito'),
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('with_front' => false, 'slug' => 'casos-de-exito'),
			'query_var' => true,
			'show_ui' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'supports' => array('title', 'editor', 'thumbnail'),
			'menu_icon' => 'dashicons-megaphone',
			'menu_position' => 6,
		)
	);
}

add_action('init', 'create_post_type', 0);