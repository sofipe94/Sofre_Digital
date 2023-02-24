<?php

$lang = globalLang();

if ($lang == 'en'){
	$id = 2;
}else{
	$id = 2;
}

$contact = get_field('contact', $id);

?>
</main>

<script type="text/javascript">
/*	setTimeout(function() {

		window.scrollTo(0, 0);
	}, 1);

	$target = window.location.hash();

	if ($target != ''){
		$(document).ready(function(e){
			target = $target;
		    $target = $(target);

		    $('html, body').stop().animate({
		        'scrollTop': $target.offset().top - 60
		    }, 900, 'swing', function () {
		        
		    });
		});
	}
*/
</script>

<footer class="footer text-center text-md-left wow fadeIn">

	<!-- Widgets -->
	<section class="widgets"><div class="container">
		<div class="row">
			<div class="col-12 col-md-6 my-3">

				<a href="<?= esc_url(home_url('/')); ?>" class="logo">
					<img src="<?= get_bloginfo('template_url') ?>/assets/img/logo-color.png" alt="<?= get_bloginfo('name'); ?>" class="img-fluid">
				</a>

			</div>
			<div class="col-12 col-md-3 my-3">
				<ul class="menu list-unstyled">
					<?php wp_nav_menu( array('theme_location' => 'footer', 'container' => '', 'items_wrap' => '%3$s')); ?>
				</ul>
			</div>
			<div class="col-12 col-md-3 text-md-right my-3">

				<div class="country d-inline-block text-left">
					<div class="flag">
						<img src="<?= get_bloginfo('template_url') ?>/assets/img/flags/ar.png" alt="<?= get_bloginfo('name'); ?>" class="img-fluid">
					</div>

					<p><?= $contact['address']; ?></p>
				</div>

				<div class="d-inline-block">

				<ul class="socialmedia list-unstyled">
					<?php foreach ($contact['socialmedia'] as $v): ?>
						<?php if ($v['url'] != ''): ?>
						<li class="<?= $v['type']; ?> wow fadeIn"><a href="<?= $v['url']; ?>" target="_blank">
							<i class="fa fa-<?= $v['type']; ?>"></i>
						</a></li>
						<?php endif ?>
					<?php endforeach ?>
				</ul>
				</div>
			</div>

<?php /*
			<div class="col-12 col-md-2 my-3">
				<a href="https://www.sofrecom.com/" href="_blank" class="country">
					<div class="flag">
						<img src="<?= get_bloginfo('template_url') ?>/assets/img/flags/fr.png" alt="<?= get_bloginfo('name'); ?>" class="img-fluid">
					</div>

					<p><b>Sofrecom Francia</b></p>
				</a>
			</div>
*/ ?>

		</div>
	</div></section>


	<!-- Copyright -->
	<section class="copyright"><div class="container">

		<div class="row">
			<div class="col-12 col-md-7 my-3">
				<p>
					© Copyright <?= date('Y'); ?> <?= get_bloginfo('name'); ?>.
					<?= $lang == 'en' ? 'All rights reserverd' : 'Todos los derechos reservados'; ?>.
				</p>
			</div>
			<div class="col-12 col-md-5 my-3 text-md-right legals">
				<p><a href="<?= get_permalink(3); ?>">Legales</a></p>
			</div>
		</div>

	</div></section>

</footer>

<?php get_template_part('templates/modals/modal', 'newsletter'); ?>

<?php wp_footer(); ?>

</body>
</html>
