<?php $lang = globalLang();

$categories = get_terms(array('taxonomy' => 'category'));

$recents = get_posts(array(
	'post_type' => 'post',
	'posts_per_page' => 3,
));


?>
<aside class="sidebar">

	<!--  -->
	<div class="sidebar-section">

		<h4 class="text-secondary"><?= $lang == 'en' ? 'Recent posts' : 'Entradas Recientes'; ?></h4>

		<ul class="list-unstyled">
			<?php foreach ($recents as $post): ?>
			<li><a href="<?= get_permalink($post->ID); ?>"><?= get_the_title($post->ID); ?></a></li>
			<?php endforeach; wp_reset_query(); ?>
		</ul>

	</div>

	<!--  -->
	<div class="sidebar-section">

		<h4 class="text-secondary"><?= $lang == 'en' ? 'Categories' : 'Categorías'; ?></h4>

		<ul class="list-unstyled">
			<?php foreach ($categories as $v): ?>
			<li><a href="<?= get_term_link($v->term_id); ?>"><?= $v->name; ?></a></li>
			<?php endforeach ?>
		</ul>

	</div>

</aside>