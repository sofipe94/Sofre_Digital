<?php 

$id = 416;

$banner = get_field('banner', $id);

/* ARGS */
$actual_link = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$actual_link = explode('?', $actual_link, 2);
$actual_link = $actual_link[0];

$actual_link = get_permalink(416);

$queried_term = get_queried_object();

$paged = get_query_var('paged') ? get_query_var('paged') : 1;

$args = array(
    'post_type' => 'success',
    'posts_per_page' => 12,
    'paged' => $paged,
);


if (is_search()){
    $args['s'] = get_search_query();
}


$taxs = array(
//    'success_categories' => 'tipos',
    'success_categories_two' => 'categorías',
);

if (is_tax($taxs)):
    $args['tax_query'] = array(
        array(
            'taxonomy' => $queried_term->taxonomy,
            'field'    => 'term_id',
            'terms'    => $queried_term->term_id,
        ),
    );
endif;


// Taxs
$tax_query = [];
foreach ($taxs as $k => $v):
    if(!empty($_POST[$k][0])):

        $gets = $_POST[$k];

        if (!is_array($gets)) {
            $gets = explode(",", $gets);
        }

        $terms = '';
        foreach ($gets as $get) {
            $terms .= $get . ',';
        }

        $terms = explode(",", $terms);

        $tax_query[] = array(
            'taxonomy' => $k,
            'field' => 'term_id',
            'terms' => $terms,
            'operator' => 'IN'
        );

    endif;
endforeach;

if(count($tax_query) > 1){
    $tax_query['relation'] = 'AND';
}
if(count($tax_query) > 0){
    $args['tax_query'] = $tax_query;
}


// Order by
if(isset($_POST['orderby'])){
    $orderby = $_POST['orderby'];

    if ($orderby == 'az') {
        $args['orderby'] = 'title';
        $args['order'] = 'ASC';
    } elseif($orderby == 'date'){
        $args['orderby'] = 'date';
        $args['order'] = 'DESC';
    }
}

$loop = new WP_Query($args);
$total_pages = $loop->max_num_pages;
$current_page = max(1, get_query_var('paged'));
?>
<script>
    $('.header .navigation .menu-services').addClass('current-menu-item');
</script>
<div class="page success">

    <!-- Content -->
    <section class="section content pb-0"><div class="container">        

        <div class="title wow fadeIn">
            <div class="icon mb-4">
                <img src="<?= $banner['icon']['url']; ?>" width="<?= $banner['icon']['width'] / 2; ?>" class="img-fluid">
            </div>

            <h1><?= $banner['title']; ?></h1>
        </div>

    </div></section>


    <!-- Filter -->
    <form class="filter" method="POST" action="<?= $actual_link; ?>" id="filter"><div class="container">
        <input type="hidden" name="paged" value="<?= $paged; ?>">

        <div class="options row">

            <?php foreach ($taxs as $k => $v):
                $items = get_terms(array(
                    'taxonomy' => $k,
                    'hide_empty' => false,
                ));
            ?>
            <div class="col-12 col-lg-3 my-2">
                <select name="<?= $k; ?>[]" class="form-control">
                    <option value="">Todos los <?= $v; ?></option>
                    <?php foreach ($items as $item):
                            $term_id = false === $item->term_id ? null : $item->term_id;
                        ?>
                        <option value="<?= $term_id; ?>" <?php
                            if (in_array($term_id, $_POST[$k])){
                                echo 'selected';
                            } elseif($term_id == $queried_term->term_id){
                                echo 'selected';
                            }
                        ?>><?= $item->name; ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <?php endforeach ?>
            <div class="col-12 col-lg-3 my-2 ml-lg-auto">
                <select name="orderby" class="form-control">
                    <option value="">Ordenar por</option>
                    <option value="date" <?= $_POST['orderby'] == 'date' ? 'selected' : ''; ?>>Más nuevos</option>
                    <option value="az" <?= $_POST['orderby'] == 'az' ? 'selected' : ''; ?>>A-Z</option>
                </select>
            </div>
        </div>

        <a href="#" class="open-filter d-md-none" data-open="filter">Filtrar <i class="icon-arrow-down"></i></a>

    </div></form>


    <!-- Feed -->
    <section class="section feed pb-0"><div class="container">

        <?php if ($loop->have_posts()): ?>

        <div class="feed-success row">
            <?php while ($loop->have_posts()): $loop->the_post();?>
            <div class="col-12 col-md-4 my-3 wow fadeInUp">
                <?php get_template_part('templates/loops/loop', 'success'); ?>
            </div>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>

        </div>

        <?php if ($total_pages > 1): ?>
            <div class="pagination mt-5 bg-primary wow fadeIn"><div class="container">
                <?= paginate_links(array(
                    'base' => get_pagenum_link(1) . '%_%',
                    'format' => '/page/%#%',
                    'current' => $current_page,
                    'total' => $total_pages,
                    'prev_text'    => __('Anterior'),
                    'next_text'    => __('Siguiente'),
                )); ?>
           </div></div>
        <?php endif; ?>


        <?php else: get_template_part('templates/errors/error', 'noresults'); endif ?>

    </section>


    <?php module_contact() ?>

</div>
<script>
    // Filter
    $('.filter input, .filter select').bind('change', function(){
        $('.filter').submit();
    });
</script>