<?php

$links = get_field('links');
$service = get_field('service');
$success = get_field('success');

$categories = get_terms(array('taxonomy' => 'success_categories_two', 'hide_empty' => false));


// ARGS
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$args = array(
    'post_type' =>  'success',
    'posts_per_page' => -1,
    'paged' => $paged,
);
$loop = new WP_Query($args);
$total_pages = $loop->max_num_pages;
$current_page = max(1, get_query_var('paged'));

?>
<script>
    $('.header .navigation .menu-services').addClass('current-menu-item');
</script>
<div class="page services">


    <?php module_banner(); ?>


    <!-- Links -->
    <section class="module-links"><div class="container">

        <div class="items row">
            <?php $i=0; foreach ($links['items'] as $v): $i++; ?>
            <div class="item col-6 col-lg-4 col-xl-5-2 my-3 wow fadeIn" data-wow-delay="0.<?= $i; ?>s">
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


    <!-- Services -->
    <section class="section services pt-0">

        <?php $i=0; foreach ($service as $service): $i++; ?>
        <section class="module <?= $i % 2 != 0 ? 'odd' : 'even'; ?> wow fadeIn" id="module-<?= $i; ?>"><div class="container-fluid p-0">

            <div class="row">
                <div class="col-12 col-md-6 image wow <?= $i % 2 == 0 ? 'fadeInLeft' : 'fadeInRight'; ?>">
                    <div class="img" style="background-image: url('<?= $service['image']['url']; ?>')"></div>
                </div>
                <div class="col-12 col-md-6 text wow fadeInUp">

                    <div class="data">

                        <div class="title">
                            <div class="icon mb-4">
                                <img src="<?= $service['icon']['url'] ?>" width="<?= $service['icon']['width'] / 2; ?>">
                            </div>

                            <h2 class="text-primary"><?= $service['title']; ?></h2>
                            <p><?= $service['description']; ?></p>
                        </div>

                        <div class="items" id="accordion-<?= $i; ?>">
                        <?php $e=0; foreach ($service['items'] as $v): $e++; ?>
                            <a href="#answer-<?= $i; ?>-<?= $e ?>" data-toggle="collapse" class="question" <?= $e == 1 ? 'aria-expanded="true"' : ''; ?> aria-controls="#answer-<?= $i; ?>-<?= $e; ?>" data-wow-delay="0.<?= $e ?>s">
                                <?= $v['title']; ?>
                            </a>

                            <div class="answer collapse <?= $e == 1 ? 'show' : ''; ?>" id="answer-<?= $i; ?>-<?= $e; ?>" data-parent="#accordion-<?= $i; ?>">
                                <?= $v['description']; ?>
                            </div>
                        <?php endforeach ?>
                        </div>

                    </div>

                </div>
            </div>

        </div></section>
        <?php endforeach ?>

    </section>


    <!-- Feed -->
    <section class="section success pt-0" id="success"><div class="container">

        <div class="title d-md-flex align-items-center wow fadeIn">
            <div class="icon mr-4">
                <img src="<?= $success['icon']['url']; ?>" width="<?= $success['icon']['width'] / 2; ?>" alt="">
            </div>

            <h3 class="text-primary"><?= $success['title']; ?></3>
        </div>

        <div class="feed-success-simple row">
            <?php foreach ($categories as $v): ?>
            <div class="col-12 col-md-4 col-lg-3 my-3 wow fadeInUp">
                <?php $lang = globalLang();

                    $thumbnail = get_field('icon', $v)['url'];

                ?>
                <article><a href="<?= get_term_link($v->term_id); ?>">

                    <div class="thumbnail">
                        <div class="img" style="background-image: url('<?= $thumbnail ?>')"></div>
                    </div>

                    <div class="data">
                        <h2><?= $v->name; ?></h2>
                    </div>

                </a></article>
            </div>
            <?php endforeach; ?>
        </div>

    </div></section>


    <section class="py-5 bg-primary wow fadeIn"><div class="container">
        
        <div class="buttons text-center">
            <a href="<?= get_permalink(416); ?>" class="btn btn-light">Ver todos los casos de éxito</a>
        </div>

    </div></section>


    <?php module_contact(); ?>

</div>