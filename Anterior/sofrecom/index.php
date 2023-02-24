<?php get_header();

//if (!is_user_logged_in()) {

/*
	if (is_front_page()):
		get_template_part('templates/pages/page', 'construction');

	elseif(is_page(array(2, 2))):
		get_template_part('templates/pages/page', 'construction');

	// Blog
	elseif (is_page(array(16, 16)) || is_archive() || is_search()):
		get_template_part('templates/pages/page', 'blog');

	elseif (is_single()):
		get_template_part('templates/singles/single', 'blog');

	else:
		wp_safe_redirect(get_bloginfo('url'));
	endif;
*/

//} else{

	// Home
	if (is_front_page()):
		get_template_part('templates/pages/page', 'home');

	elseif(is_page(array(2, 2))):
		get_template_part('templates/pages/page', 'home');


	// Archive rrhh
	elseif (is_page(array(423, 423)) || is_post_type_archive('rrhh') || is_tax(array('rrhh_categories'))):
		get_template_part('templates/pages/page', 'rrhh-archive');

	// Single rrhh
	elseif (is_singular('rrhh')):
		get_template_part('templates/singles/single', 'rrhh');

	// Archive Success
	elseif (is_page(array(416, 416)) || is_post_type_archive('success') || is_tax(array('success_categories', 'success_categories_two'))):
		get_template_part('templates/pages/page', 'success-archive');

	// Single Success
	elseif (is_singular('success')):
		get_template_part('templates/singles/single', 'success');



	// Blog
	elseif (is_page(array(16, 16)) || is_archive() || is_search()):
		get_template_part('templates/pages/page', 'blog');

	elseif (is_single()):
		get_template_part('templates/singles/single', 'blog');


	// Page Services
	elseif (is_page(array(10, 10))):
		get_template_part('templates/pages/page', 'services');

	// Page About
	elseif(is_page(array(12, 12))):
		get_template_part('templates/pages/page', 'about');

	// Page Work
	elseif(is_page(array(14, 14))):
		get_template_part('templates/pages/page', 'rrhh');


	elseif (is_page()):
		get_template_part('templates/pages/page');



	// 404
	elseif (is_404()):
		get_template_part('templates/pages/page', '404');

	endif;

//}

get_footer(); ?>