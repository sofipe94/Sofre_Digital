<?php

	function create_taxonomies() {

		register_taxonomy('countries', 'rrhh',
			array(
				'label' => 'Paises',
				'hierarchical' => true,
				'query_var' => true,
				'show_in_nav_menus' => true,
 				'rewrite' => array('with_front' => false, 'hierarchical' => true, 'slug' => 'trabajos-paises')
			)
		);

		register_taxonomy('rrhh_categories', 'rrhh',
			array(
				'label' => 'Categorias',
				'hierarchical' => true,
				'query_var' => true,
				'show_in_nav_menus' => true,
 				'rewrite' => array('with_front' => false, 'hierarchical' => true, 'slug' => 'trabajos-categorias')
			)
		);

		register_taxonomy('rrhh_contract', 'rrhh',
			array(
				'label' => 'Contratos',
				'hierarchical' => true,
				'query_var' => true,
				'show_in_nav_menus' => true,
 				'rewrite' => array('with_front' => false, 'hierarchical' => true, 'slug' => 'trabajos-contratos')
			)
		);




		register_taxonomy('success_categories', 'success',
			array(
				'label' => 'Tipo',
				'hierarchical' => true,
				'query_var' => true,
				'show_in_nav_menus' => true,
 				'rewrite' => array('with_front' => false, 'hierarchical' => true, 'slug' => 'casos-de-exito-tipos')
			)
		);

		register_taxonomy('success_categories_two', 'success',
			array(
				'label' => 'Categorias',
				'hierarchical' => true,
				'query_var' => true,
				'show_in_nav_menus' => true,
 				'rewrite' => array('with_front' => false, 'hierarchical' => true, 'slug' => 'casos-de-exito-categorias')
			)
		);

	}

	add_action('init', 'create_taxonomies', 0);