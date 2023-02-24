<?php

$banner = get_field('banner');
$links = get_field('links');
$global = get_field('global');
$benefits = get_field('benefits');
$rrhh = get_field('rrhh');
$contact = get_field('contact');


$paged = get_query_var('paged') ? get_query_var('paged') : 1;

// Insights
$rrhh_args = array(
    'post_type' => 'rrhh',
    'posts_per_page' => 3,
    'post__in' => $rrhh['items'],
);


?>
<script>
    $('body').addClass('color-rrhh');
    $('.header .navigation .menu-rrhh').addClass('current-menu-item');
</script>
<div class="page rrhh">


    <?php module_banner(); ?>


    <!-- Links -->
    <section class="module-links"><div class="container">

        <div class="items row">
            <?php $i=0; foreach ($links['items'] as $v): $i++; ?>
            <div class="item col-6 col-lg-3 my-3 wow fadeIn" data-wow-delay="0.<?= $i; ?>s">
                <article><a href="<?= $v['url']; ?>" <?= substr( $v['url'], 0, 1 ) === "#" ? 'data-scroll="true"' : ''; ?>>
                    <div class="icon">
                        <img src="<?= $v['icon']['url'] ?>" width="<?= $v['icon']['width'] / 2; ?>"  class="img-fluid">
                    </div>

                    <p><?= $v['title'] ?></p>
                </a></article>
            </div>
            <?php endforeach ?>
        </div>

    </div></section>


    <!-- Global -->
    <section class="global" id="oportunity">

        <div class="section bg-gray"><div class="container">

            <div class="title max-width wow fadeIn">
                <div class="icon mb-4">
                    <img src="<?= $global['icon']['url'] ?>" width="<?= $global['icon']['width'] / 2; ?>"  class="img-fluid">
                </div>

                <h3 class="text-third"><?= $global['title']; ?></h3>
                <p><?= $global['description']; ?></p>
            </div>

        </div></div>

        <!-- Items -->
        <div class="items"><div class="container">

            <div class="row justify-content-center">
                <?php $i=0; foreach ($global['items'] as $v): $i++; ?>
                <div class="item col-12 col-md-6 my-3 wow fadeIn" data-wow-delay="0.<?= $i; ?>s">
                    <article>
                        <div class="icon mb-4">
                            <img src="<?= $v['icon']['url'] ?>" width="<?= $v['icon']['width'] / 2 ?>" class="img-fluid">
                        </div>

                        <p><?= $v['title']; ?></p>
                    </article>
                </div>
                <?php endforeach ?>
            </div>

        </div></div>

    </section>


    <!-- Benefits -->
    <section class="section benefits" id="benefits"><div class="container">

        <div class="title d-md-flex align-items-center wow fadeIn">
            <div class="icon mr-3">
                <img src="<?= $benefits['icon']['url'] ?>" width="<?= $benefits['icon']['width'] / 2; ?>"  class="img-fluid">
            </div>

           <h3><?= $benefits['title']; ?></h3>
        </div>

        <div class="title max-width wow fadeIn">
            <p><?= $benefits['description']; ?></p>
        </div>

        <div class="items row justify-content-center">
        <?php $i=0; foreach ($benefits['items'] as $v): $i++; ?>
            <div class="item col-6 col-md-4 col-xl-5-2 my-3 wow fadeIn" data-wow-delay="0.<?= $i; ?>s">
                <article>
                    <div class="icon">
                        <img src="<?= $v['icon']['url'] ?>" width="<?= $v['icon']['width'] / 2 ?>" class="img-fluid">
                    </div>

                    <p><?= $v['title'] ?></p>
                </article>
            </div>
            <?php endforeach ?>
        </div>

    </div></section>


    <!-- RRHH -->
    <section class="rrhh" id="jobs">

        <!-- Title -->
        <div class="section bg-gray"><div class="container">

            <div class="title d-md-flex align-items-center wow fadeIn">
                <div class="icon mr-3">
                    <img src="<?= $rrhh['icon']['url'] ?>" width="<?= $rrhh['icon']['width'] / 2; ?>"  class="img-fluid">
                </div>

                <h3><?= $rrhh['title']; ?></h3>
            </div>

        </div></div>


        <!-- Feed -->
        <div class="feed"><div class="container">

            <div class="feed-rrhh row">
                <?php query_posts($rrhh_args); $i=0; while(have_posts()): the_post(); $i++; ?>
                <div class="col-12 col-md-4 my-3 wow fadeInUp" data-wow-delay="0.<?= $i; ?>s">
                    <?php get_template_part('templates/loops/loop', 'rrhh') ?>
                </div>
                <?php endwhile; wp_reset_query(); ?>
            </div>

            <div class="buttons text-center mt-4 wow fadeIn">
                <a href="<?= get_permalink(423); ?>" class="btn btn-third">Ver todas las búsquedas</a>
            </div>

        </div></div>
     
    </section>


    <!-- Contact -->
    <?php module_rrhh(); ?>

</div>