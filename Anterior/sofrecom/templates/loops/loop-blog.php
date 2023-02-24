<?php global $lang;

    if (has_post_thumbnail()) {
        $thumbnail = get_the_post_thumbnail_url($post->ID, 'large');
    }

?>
<article><a href="<?php the_permalink(); ?>">

    <div class="thumbnail" style="background-image: url(<?= $thumbnail; ?>);"></div>

    <div class="wrap">
        <div class="data">

            <div class="meta">
                <p class="date"><?= get_the_date('M d, Y'); ?> | </p>
                <p class="time"><?= get_estimate_time($post); ?> <?= $lang == 'en' ? 'of reading' : 'de lectura'; ?></p>
            </div>

            <h2><?php the_title(); ?></h2>

            <div class="description">
                <?php the_excerpt(); ?>
            </div>

            <span class="btn btn-secondary"><?= $lang == 'en' ? 'See more' : 'Ver más'; ?></span>
        </div>
    </div>

</a></article>