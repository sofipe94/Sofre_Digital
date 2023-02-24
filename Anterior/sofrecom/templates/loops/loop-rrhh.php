<?php global $lang;

$countries = get_the_terms($post->ID, 'countries');

?>
<article><a href="<?php the_permalink(); ?>">

	<div class="data">

		<h2><?php the_title(); ?></h2>

		<p class="country"><?= $countries[0]->name; ?></p>

		<p class="seemore"><?= $lang == 'en' ? 'See more' : 'Ver más'; ?></p>

		<div class="icon">
			<img src="<?= get_bloginfo('template_url'); ?>/assets/img/icons/icon-lens.png" width="45px">
		</div>

	</div>

</a></article>