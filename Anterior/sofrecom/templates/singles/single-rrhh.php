<?php $lang = globalLang();

$id = 423;

$banner = get_field('banner', $id);

$ref = get_field('ref');
$limit = get_field('limit');
$address = get_field('address');


$countries = get_the_terms($post->ID, 'countries');
$categories = get_the_terms($post->ID, 'rrhh_categories');

// Related
$relateds = array(
    'post_type' => 'rrhh',
    'posts_per_page' => 3,
    'post__not_in' => array($post->ID),
    'ignore_sticky_posts' => 1,
);

if ($categories){
    $relateds['tax_query'] = array(
        array(
            'taxonomy' => 'rrhh_categories',
            'field'    => 'term_id',
            'terms'    => array($categories[0]->term_id)
        ),
    );
}

?>
<script>
    $('body').addClass('color-rrhh');
    $('.header .navigation .menu-rrhh').addClass('current-menu-item');
</script>
<div class="single internal rrhh">

    <!-- Banner -->
    <section class="py-5 banner bg-third"><div class="container">

        <div class="row">
            <div class="col-12 col-md-6 order-md-2 image wow fadeInRight">
                <div class="icon">
                    <img src="<?= get_bloginfo('template_url'); ?>/assets/img/icons/icon-lens.png" width="90px">
                </div>
            </div>  
            <div class="col-12 col-md-6 order-md-1 text">

                <div class="data wow fadeIn">

                    <ul class="breadcrumbs list-unstyled">
                        <li><a href="<?= get_permalink(423); ?>">Búsquedas abiertas</a></li>
                    </ul>

                    <p class="category"><?= $categories[0]->name; ?></p>

                    <div class="title">
                        <h1 class="text-light"><?php the_title(); ?></h1>
                    </div>

                    <aside class="share">

                        <h4><?= $lang == 'en' ? 'Share' : 'Compartir'; ?></h4>

                        <ul class="list-unstyled">
                            <li class="facebook"><a target="_blank" href="http://www.facebook.com/sharer.php?u=<?= get_permalink(); ?>">
                                <i class="fa fa-facebook"></i>
                            </a></li>
                            <li class="twitter"><a target="_blank" href="http://twitter.com/share?url=<?= get_permalink(); ?>&text=<?= get_the_title(); ?>">
                                <i class="fa fa-twitter"></i>
                            </a></li>
                            <li class="pinterest"><a target="_blank" href="https://pinterest.com/pin/create/button/?url=&media=<?= wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>&description=<?= get_the_title(); ?>%20-%20<?= get_permalink(); ?>">
                                <i class="fa fa-pinterest"></i>
                            </a></li>
                            <li class="linkedin"><a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=<?= get_permalink(); ?>&title=<?= get_the_title(); ?>">
                                <i class="fa fa-linkedin"></i>
                            </a></li>
                        </ul>
                    </aside>

                    <div class="meta mt-4">
                        <p>Ref: <?= $ref; ?> | <?= get_the_date('M d, Y'); ?></p>
                        <p>Aplicar antes del: <?= $limit; ?></p>
                        <p>Lugar:</p>
                        <p><?= $address; ?></p>
                    </div>

                </div>

            </div>
        </div>

        <a href="#start" class="arrow-down" data-scroll="true"></a>

    </div></section>

    <div id="start"></div>


    <!-- Content -->
    <section class="section content pb-5"><div class="container">

        <article class="wow fadeIn">
            <?php while(have_posts()): the_post(); the_content(); endwhile; ?>
        </article>

    </div></section>


    <!-- Relateds -->
    <?php query_posts($relateds); if (have_posts()): ?>
    <section class="relateds"><div class="container">

        <!-- Title -->
        <div class="title d-md-flex align-items-center wow fadeIn">
            <div class="icon mr-4">
                <img src="<?= $banner['icon']['url']; ?>" width="<?= $banner['icon']['width'] / 2; ?>" class="img-fluid">
            </div>

            <h3 class="text-third"><?= $lang == 'en' ? 'Relateds searchs' : 'Búsquedas relacionadas'; ?></h3>
        </div>

        <!-- Feed -->
        <div class="feed-rrhh row">
            <?php while(have_posts()): the_post(); ?>
            <div class="col-12 col-md-4 my-3 wow fadeInUp">
                <?php get_template_part('templates/loops/loop', 'rrhh') ?>
            </div>
            <?php endwhile; wp_reset_query(); ?>
        </div>

    </div></section>
    <?php endif ?>


    <?php module_rrhh(); ?>


</div>