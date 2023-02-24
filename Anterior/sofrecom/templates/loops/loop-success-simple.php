<?php $lang = globalLang();

	if (has_post_thumbnail()) {
		$thumbnail = get_the_post_thumbnail_url($post->ID);
	}

?>
<article><a href="<?php the_permalink(); ?>">

    <div class="thumbnail">
        <div class="img" style="background-image: url('<?= $thumbnail ?>')"></div>
    </div>

    <div class="data">

        <h2><?php the_title(); ?></h2>

    </div>

</a></article>