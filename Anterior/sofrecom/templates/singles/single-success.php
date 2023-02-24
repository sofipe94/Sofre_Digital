<?php $lang = globalLang();

$id = 416;

$banner = get_field('banner', $id);


$types = get_the_terms($post->ID, 'success_categories');
$categories = get_the_terms($post->ID, 'success_categories_two');

$icon = get_field('icon', $types[0]);
$subtitle = get_field('subtitle');

// Related
$relateds = array(
    'post_type' => 'success',
    'posts_per_page' => 3,
    'post__not_in' => array($post->ID),
    'ignore_sticky_posts' => 1,
);

if ($categories){
    $relateds['tax_query'] = array(
        array(
            'taxonomy' => 'success_categories',
            'field'    => 'term_id',
            'terms'    => array($categories[0]->term_id)
        ),
    );
}

?>
<script>
    $('.header .navigation .menu-services').addClass('current-menu-item');
</script>
<div class="single internal success">

    <!-- Banner -->
    <section class="py-5 banner bg-primary"><div class="container">

        <div class="row">
            <div class="col-12 col-md-6 order-md-2 image wow fadeInRight">
                <div class="icon">
                    <img src="<?= $icon['url'] ?>" width="<?= $icon['width'] / 1; ?>" class="img-fluid">
                </div>
            </div>  
            <div class="col-12 col-md-6 order-md-1 text">

                <div class="data wow fadeIn">

                    <ul class="breadcrumbs list-unstyled">
                        <li><a href="<?= get_permalink(416); ?>">Casos de éxito</a></li>
                    </ul>

                    <p class="category">
                    <?php if ($types): ?>
                        <a href="<?= get_term_link($types[0]->term_id); ?>"><?= $types[0]->name; ?></a>
                    <?php endif ?> 
                    </p>

                    <div class="title">
                        <h1 class="text-light"><?php the_title(); ?></h1>
                    </div>

                    <p class="description">
                    <?php if ($categories): ?>
                        <a href="<?= get_term_link($categories[0]->term_id); ?>"><?= $categories[0]->name; ?></a>
                    <?php endif ?> 
                    </p>

                    <aside class="share">

                        <p><?= $lang == 'en' ? 'Share' : 'Compartir'; ?></p>

                        <ul class="list-unstyled">
                            <li class="facebook"><a target="_blank" href="http://www.facebook.com/sharer.php?u=<?php the_permalink() ?>">
                                <i class="fa fa-facebook"></i>
                            </a></li>
                            <li class="twitter"><a target="_blank" href="http://twitter.com/share?url=<?php the_permalink() ?>&text=<?php the_title(); ?>">
                                <i class="fa fa-twitter"></i>
                            </a></li>
                            <li class="pinterest"><a target="_blank" href="https://pinterest.com/pin/create/button/?url=&media=<?= wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>&description=<?php the_title(); ?>%20-%20<?php the_permalink(); ?>">
                                <i class="fa fa-pinterest"></i>
                            </a></li>
                            <li class="linkedin"><a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink() ?>&title=<?php the_title(); ?>">
                                <i class="fa fa-linkedin"></i>
                            </a></li>
                        </ul>
                    </aside>

                </div>

            </div>
        </div>

        <a href="#start" class="arrow-down" data-scroll="true"></a>

    </div></section>

    <div id="start"></div>


    <!-- Content -->
    <section class="section content"><div class="container">

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

            <h3 class="text-primary"><?= $banner['title']; ?> <?= $lang == 'en' ? 'relateds' : 'relacionados'; ?></h3>
        </div>


        <!-- Feed -->
        <div class="feed-success row">
            <?php while(have_posts()): the_post(); ?>
            <div class="col-12 col-md-4 my-3 wow fadeInUp">
                <?php get_template_part('templates/loops/loop', 'success') ?>
            </div>
            <?php endwhile; wp_reset_query(); ?>
        </div>

    </div></section>
    <?php endif ?>


    <?php module_contact(); ?>


</div>