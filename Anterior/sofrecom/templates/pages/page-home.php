<?php

$lang = globalLang();

if ($lang == 'en') {
    $id = 2;
} else {
    $id = 2;
}

$presentation = get_field('presentation', $id);
$links = get_field('links', $id);
$services = get_field('services', $id);
$benefits = get_field('benefits', $id);
$partners = get_field('partners', $id);
$work = get_field('work', $id);
$insights = get_field('insights', $id);

// Insights
$insights_args = array(
    'post_type' => 'post',
    'posts_per_page' => 3,
    'post__in' => $insights['items'],
);

?>
<div class="page home">


    <!-- Presentation -->
    <section class="section presentation" style="background-image: url('<?= $presentation['image']['url']; ?>')"><div class="container">

        <div class="title wow fadeIn">
            <h1><?= $presentation['title']; ?></h1>
            <p><?= $presentation['description']; ?></p>
        </div>

        <a href="#start" class="arrow-down" home-data-scroll="true"></a>

    </div></section>


    <div id="start"></div>


    <!-- Links -->
    <section class="module-links mb-0"><div class="container">

        <div class="items row">
            <?php $i=0; foreach ($links['items'] as $v): $i++; ?>
            <div class="item col-6 col-md-3 my-3 wow fadeIn" data-wow-delay="0.<?= $i; ?>s">
                <article><a href="<?= $v['url']; ?>" <?= substr( $v['url'], 0, 1 ) === "#" ? 'home-data-scroll="true"' : ''; ?>>
                    <div class="icon">
                        <img src="<?= $v['icon']['url'] ?>" width="<?= $v['icon']['width'] / 2; ?>"  class="img-fluid">
                    </div>

                    <p><?= $v['title'] ?></p>
                </a></article>
            </div>
            <?php endforeach ?>
        </div>

    </div></section>


    <!-- Services -->
    <section class="section services" id="services">

        <div class="shape wow fadeInRight">
            <img src="<?= get_bloginfo('template_url') ?>/assets/img/shapes/home-services.png" width="275px" class="img-fluid">
        </div>

        <div class="container">

        <div class="title d-md-flex align-items-center wow fadeIn">
            <div class="icon mr-md-4">
                <img src="<?= $services['icon']['url']; ?>" width="<?= $services['icon']['width'] / 2; ?>" class="img-fluid">
            </div>

            <h3><?= $services['title']; ?></h3>
        </div>

        <div class="items row justify-content-between">
            <?php $i=0; foreach ($services['items'] as $v): $i++; ?>
                <div class="col-6 col-md-3 my-3 wow fadeIn" data-wow-delay="0.<?= $i; ?>s">
                    <article>
                        <div class="icon">
                            <img src="<?= $v['icon']['url'] ?>" width="<?= $v['icon']['width'] / 2 ?>" class="img-fluid">
                        </div>

                        <h2><?= $v['title']; ?></h2>

                        <a href="<?= $v['url']; ?>" class="seemore"><?= $v['button']; ?></a>
                    </article>
                </div>
            <?php endforeach ?>
        </div>

    </div></section>


    <!-- Benefits -->
    <section class="section benefits"><div class="container">

        <div class="title d-md-flex align-items-center wow fadeIn">
            <div class="icon mr-md-4">
                <img src="<?= $benefits['icon']['url'] ?>" width="<?= $benefits['icon']['width'] / 2 ?>" class="img-fluid">
            </div>

             <h3><?= $benefits['title']; ?></h3>
        </div>

        <div class="items row justify-content-between">
            <?php $i=0; foreach ($benefits['items'] as $v): $i++; ?>
                <div class="col-6 col-md-4 col-xl-2 my-3 wow fadeIn" data-wow-delay="0.<?= $i; ?>s">
                    <article>
                        <div class="icon">
                            <img src="<?= $v['icon']['url'] ?>" width="<?= $v['icon']['width'] / 2 ?>" class="img-fluid">
                        </div>

                        <h2><?= $v['title']; ?></h2>
                    </article>
                </div>
            <?php endforeach ?>
        </div>

    </div></section>


    <section class="section work pb-0"><div class="container">

        <div class="row no-gutters">
            <div class="col-12 col-md-4 image wow fadeInLeft">
                <div class="img" style="background-image: url('<?= $work['image']['url']; ?>')"></div>
            </div>
            <div class="col-12 col-md-8 text wow fadeInRight">

                <div class="wrap">

                    <div class="data">
                        <div class="icon">
                            <img src="<?= $work['icon']['url']; ?>" width="<?= $work['icon']['width'] / 2; ?>" class="img-fluid">
                        </div>

                        <div class="title">
                            <h3><?= $work['title']; ?></h3>
                            <p><?= $work['description'] ?></p>
                        </div>

                        <div class="buttons">
                            <a href="<?= $work['url']; ?>" class="btn btn-outline-third"><?= $work['button']; ?></a>
                        </div>
                        
                    </div>

                </div>

            </div>
        </div>

    </div></section>


    <!-- Partners -->
    <section class="section partners"><div class="container">

        <div class="title wow fadeIn">
            <h3><?= $partners['title']; ?></h3>
        </div>

        <div class="slider wow fadeIn">
            <div class="slides">
                <?php foreach ($partners['items'] as $v): ?>
                <div class="slide"><?= $v['url'] ? '<a href="'+ $v['url'] +'" target="_blank">' : ''; ?>
                    <img src="<?= $v['image']['url'] ?>" width="<?= $v['image']['width'] / 2 ?>" class="img-fluid">
                <?= $v['url'] ? '</a>' : ''; ?></div>
                <?php endforeach ?>
                 <?php foreach ($partners['items'] as $v): ?>
                <div class="slide"><?= $v['url'] ? '<a href="'+ $v['url'] +'" target="_blank">' : ''; ?>
                    <img src="<?= $v['image']['url'] ?>" width="<?= $v['image']['width'] / 2 ?>" class="img-fluid">
                <?= $v['url'] ? '</a>' : ''; ?></div>
                <?php endforeach ?>
            </div>

            <div class="arrows"></div>
        </div>

    </div></section>


    <!-- Insights -->
    <section class="insights">

        <div class="section bg-gray"><div class="container">

            <div class="shape wow fadeInRight">
                <img src="<?= get_bloginfo('template_url') ?>/assets/img/shapes/home-insights.png" width="188" class="img-fluid">
            </div>

            <div class="title d-md-flex align-items-center wow fadeIn">
                <div class="icon mr-md-4">
                    <img src="<?= $insights['icon']['url'] ?>" width="<?= $insights['icon']['width'] / 2 ?>" class="img-fluid">
                </div>

                <h3 class="text-secondary"><?= $insights['title']; ?></h3>
            </div>

        </div></div>

        <div class="feed"><div class="container">

            <div class="feed-simple row">
                <?php query_posts($insights_args); $i=0; while(have_posts()): the_post(); $i++; ?>
                <div class="col-12 col-md-4 my-3 wow fadeInUp" data-wow-delay="0.<?= $i; ?>s">
                    <?php get_template_part('templates/loops/loop', 'simple') ?>
                </div>
                <?php endwhile; wp_reset_query(); ?>
            </div>

        </div></div>

    </section>


    <?php module_contact(); ?>
