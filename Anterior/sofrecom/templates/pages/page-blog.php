<?php

$lang = globalLang();

if ($lang == 'en') {
    $id = 16;
} else{
    $id = 16;
}

$categories = get_terms(array('taxonomy' => 'category'));

/* ARGS */

$queried_term = get_queried_object();


$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$args = array(
    'post_type' => 'post',
    'posts_per_page' => 16,
    'paged' => $paged,
);

if (is_category()){
    $args['cat'] = $queried_term->term_id;
}

if (is_tag()){
    $args['tag'] = $queried_term->term_id;
}

if (is_search()){
    $args['s'] = get_search_query();
}

$loop = new WP_Query($args);
$total_pages = $loop->max_num_pages;
$current_page = max(1, get_query_var('paged'));

?>
<script>
    $('body').addClass('color-blog');
    $('.header .navigation .menu-blog').addClass('active');
</script>
<div class="page blog">


    <?php module_banner($id); ?>


    <!-- Tab menu -->
    <section class="filter py-md-5 border-0 wow fadeInUp"><div class="container">

        <ul class="list-unstyled">
            <?php $i=0; foreach ($categories as $v): ?>
            <li class="<?= $v->term_id == $queried_term->term_id ? 'active' : ''; ?> wow fadeIn" data-wow-delay="0.<?= $i; ?>s"><a href="<?= get_term_link($v->term_id); ?>">
                <?= $v->name ?>
            </a></li>
            <?php endforeach ?>
        </ul>

    </div></section>


    <!-- Feed -->
    <section class="feed">

        <?php if ($loop->have_posts()): ?>

        <div class="feed-blog">
            <?php $i=0; while ($loop->have_posts()): $loop->the_post(); $i++; ?>
                <div class="item <?= $i % 2 == 0 ? 'bg-gray' : ''; ?> wow fadeInUp">
                <?php get_template_part('templates/loops/loop', 'blog'); ?>
                </div>
            <?php endwhile; ?>
        </div>

        <?php if ($total_pages > 1): ?>
            <div class="pagination bg-secondary wow fadeIn">
                <?= paginate_links(array(
                    'base' => get_pagenum_link(1) . '%_%',
                    'format' => '/page/%#%',
                    'current' => $current_page,
                    'total' => $total_pages,
                    'prev_text'    => __('Anterior'),
                    'next_text'    => __('Siguiente'),
                )); ?>
            </div>
        <?php endif; ?>

        <?php else: get_template_part('templates/errors/error', 'noresults'); endif ?>

    </section>


    <?= module_contact() ?>

</div>
<style>
    .header .navigation{
        display: none;
    }
    .header .top{
        display: none;
    }

    .footer .menu{
        display: none;
    }
    .footer .legals{
        display: none;
    }
</style>