<?php global $lang;

$type = get_the_terms($post->ID, 'success_categories');
$categories = get_the_terms($post->ID, 'success_categories_two');



$icon = get_field('icon', $type[0]);
$subtitle = get_field('subtitle');

?>
<article><a href="<?php the_permalink(); ?>">

    <div class="data">
        <div class="icon">
            <img src="<?= $icon['url'] ?>" width="<?= $icon['width'] / 2; ?>" class="img-fluid">
        </div>

        <p class="category">
            <?php if ($type): ?>
                <?= $type[0]->name; ?>
            <?php endif ?>
        </p>

        <h2 class="text-primary"><?php the_title(); ?></h2>

        <p class="subtitle">
            <?php if ($categories): ?>
                <?= $categories[0]->name; ?>
            <?php endif; ?>
        </p>

        <p class="seemore"><?= $lang == 'en' ? 'See more' : 'Ver más'; ?></p>
    </div>

</a></article>