<?php 

$lang = globalLang();

if ($lang == 'en'){
	$id = 2;
}else{
	$id = 2;
}

$contact = get_field('contact', $id);

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

	<meta charset="<?= get_bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, viewport-fit=cover">
	<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->

	<title><?= wp_title(''); ?></title>
	<meta name="description" content="<?= get_bloginfo('description'); ?>">

	<!-- Favicons -->
	<link rel="icon" type="image/png" sizes="16x16" href="<?= get_bloginfo('template_url'); ?>/assets/favicon/favicon-16x16.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?= get_bloginfo('template_url'); ?>/assets/favicon/favicon-32x32.png">
	<link rel="apple-touch-icon" href="<?= get_bloginfo('template_url'); ?>/assets/favicon/apple-touch-icon.png">


	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@100;300;400;500;600;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="<?= get_bloginfo('template_url'); ?>/assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?= get_bloginfo('template_url'); ?>/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= get_bloginfo('template_url'); ?>/assets/css/fonts.css">
	<link rel="stylesheet" href="<?= get_bloginfo('template_url'); ?>/assets/css/slick.min.css">
	<link rel="stylesheet" href="<?= get_bloginfo('template_url'); ?>/assets/css/animate.css">
	<link rel="stylesheet" href="<?= get_bloginfo('template_url'); ?>/style.css?v=<?= uniqid(); ?>">


	<script src="https://www.google.com/recaptcha/api.js?hl=es"></script>
	<script src="<?= get_bloginfo('template_url'); ?>/assets/js/jquery-3.5.1.min.js"></script>
	<script src="<?= get_bloginfo('template_url'); ?>/assets/js/bootstrap.min.js"></script>
	<script src="<?= get_bloginfo('template_url'); ?>/assets/js/slick.min.js"></script>
	<script src="<?= get_bloginfo('template_url'); ?>/assets/js/wow.min.js"></script>
	<script src="<?= get_bloginfo('template_url'); ?>/assets/js/scripts.js?v=<?= uniqid(); ?>"></script>
	<script>
		new WOW().init();
	</script>

	<script>
		var ajaxurl = '<?= admin_url('admin-ajax.php'); ?>';
		var siteurl = '<?= get_bloginfo('url'); ?>';
		var lang = '<?= $lang; ?>';
	</script>

	<?php wp_head(); ?>

</head>
<body <?= is_front_page() || is_page(array(2)) ? 'class="home"' : ''; ?>>

<!-- Header -->
<header class="header"><div class="container">

	<!-- Logo -->
	<a href="<?= esc_url(home_url('/')); ?>" class="logo">
		<img src="<?= get_bloginfo('template_url') ?>/assets/img/logo-color.png" alt="<?= get_bloginfo('name'); ?>" class="img-fluid">
	</a>

	<!-- Nav -->
	<div class="nav-menu" data-open="menu">
		<span class="menu-line"></span>
		<span class="menu-line"></span>
		<span class="menu-line"></span>
	</div>

	<!-- Navigation -->
	<nav class="navigation">

		<ul class="menu list-unstyled">
			<?php wp_nav_menu( array('theme_location' => 'header', 'container' => '', 'items_wrap' => '%3$s')); ?>
		</ul>

		<ul class="menu menu-info list-unstyled">
			<?php wp_nav_menu( array('theme_location' => 'information', 'container' => '', 'items_wrap' => '%3$s')); ?>

			<?php /* foreach ($contact['socialmedia'] as $v): ?>
				<?php if ($v['url'] != ''): ?>
				<li class="sm <?= $v['type']; ?>"><a href="<?= $v['url']; ?>" target="_blank"
						class="wow fadeIn">
						<i class="fa fa-<?= $v['type']; ?>"></i>
					</a></li>
				<?php endif ?>
			<?php endforeach */ ?>

		</ul>

	</nav>

</div></header>

<main class="main clearfix">
