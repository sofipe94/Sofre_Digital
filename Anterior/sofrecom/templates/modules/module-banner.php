<?php

function module_banner($id = ''){

    if ($id == '') {
        $id = $post->ID;
    }

    $banner = get_field('banner', $id);

?>
<section class="banner"><div class="container">

    <div class="row">
        <div class="col-12 col-md-6 image wow fadeInLeft">
            <div class="img" style="background-image: url('<?= $banner['image']['url']; ?>')"></div>
        </div>
        <div class="col-12 col-md-6 text wow fadeIn">


            <div class="title">
                <img src="<?= get_bloginfo('template_url') ?>/assets/img/logo-new.png" alt="<?= get_bloginfo('name'); ?>" class="logo img-fluid">
  
                <div class="icon mb-4">
                    <img src="<?= $banner['icon']['url']; ?>"  width="<?= $banner['icon']['width'] / 2; ?>" class="img-fluid">
                </div>

                <h1><?= $banner['title']; ?></h1>
                <p><?= $banner['description']; ?></p>

                <a href="#start" class="arrow-down" data-scroll="true"></a>
            </div>
        
        </div>
    </div>

</div></section>

<div id="start"></div>

<?php

}