<?php $lang = globalLang();

if (has_post_thumbnail()) {
    $thumbnail = get_the_post_thumbnail_url($post->ID, 'large');
}

$categories = get_the_terms($post->ID, 'category');
$tags = get_the_tags($post->ID);

$subtitle = get_field('subtitle');

// Related
$relateds = array(
    'post_type' => 'post',
    'posts_per_page' => 3,
    'post__not_in' => array($post->ID),
    'ignore_sticky_posts' => 1,
);

if ($categories){
    $relateds['category__in'] = array($categories[0]->term_id);
}

?>
<script type="text/javascript">
    $('body').addClass('color-blog');
    $('.header .navigation .menu-blog').addClass('current-menu-item');
</script>
<div class="single blog">

    <!-- Banner -->
    <section class="banner bg-gray"><div class="container">

        <div class="row align-items-center">
            <div class="col-12 col-md-6 order-md-2 image wow fadeInRight">
                <div class="img" style="background-image: url('<?= $thumbnail ?>"></div>
            </div>  
            <div class="col-12 col-md-6 order-md-1 text">

                <div class="data wow fadeIn">

                    <ul class="breadcrumbs list-unstyled">
                        <li><a href="<?= get_term_link($categories[0]->term_id); ?>"><?= $categories[0]->name; ?></a></li>
                    </ul>

                    <div class="meta">
                        <p class="date"><?= get_the_date('M d, Y'); ?> | </p>
                        <p class="time"><?= get_estimate_time($post); ?> <?= $lang == 'en' ? 'of reading' : 'de lectura'; ?></p>
                    </div>

                    <div class="title">
                        <h1 class="text-secondary"><?php the_title(); ?></h1>
                    </div>

                    <p class="description"><?= $subtitle; ?></p>
                    
                    <aside class="share">

                        <h4><?= $lang == 'en' ? 'Share' : 'Compartir'; ?></h4>

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
    <section class="section content pb-5"><div class="container">

        <div class="row">           
            <div class="col-12 col-lg-7 my-3 wow fadeIn">

                <article>
                    <?php while(have_posts()): the_post(); the_content(); endwhile; ?>
                </article>

                <aside class="share">
                    <h4><?= $lang == 'en' ? 'Share' : 'Compartir'; ?></h4>

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
            <div class="col-12 col-lg-1 my-3"></div>
            <div class="col-12 col-lg-4 my-3 wow fadeIn">
                <?php get_template_part('templates/sidebars/sidebar'); ?>
            </div>
        </div>

    </div></section>


    <!-- Relateds -->
    <?php query_posts($relateds); if (have_posts()): ?>
    <section class="relateds">

        <!-- Title -->
        <div class="py-5 bg-gray wow fadeIn"><div class="container">

            <div class="title">
                <p class="subtitle">BLOG</p>
                <h3 class="text-secondary"><?= $lang == 'en' ? 'Relateds' : 'Relacionados'; ?></h3>
            </div>

        </div></div>


        <!-- Feed -->
        <div class="feed"><div class="container">

            <div class="feed-simple row">
                <?php while(have_posts()): the_post(); ?>
                <div class="col-12 col-md-4 my-3 wow fadeInUp">
                    <?php get_template_part('templates/loops/loop', 'simple') ?>
                </div>
                <?php endwhile; wp_reset_query(); ?>
            </div>

        </div></div>


    </section>
    <?php endif ?>


    <?php module_contact(); ?>


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