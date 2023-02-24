<?php

function module_contact(){

    $id = 2;

    $contact = get_field('contact', $id);

?>
<section class="module-contact" id="contact"><div class="container">

    <div class="row no-gutters">
        <div class="col-12 col-md-4 image wow fadeInLeft">
			<div class="img" style="background-image: url('<?= $contact['image']['url']; ?>')"></div>
        </div>
        <div class="col-12 col-md-8 text wow fadeIn">

            <div class="wrap">

                <div class="data">
                    <div class="icon">
                        <img src="<?= $contact['icon']['url']; ?>" width="<?= $contact['icon']['width'] / 2; ?>" class="img-fluid">
                    </div>

                    <div class="title">
                        <h3><?= $contact['title']; ?></h3>
                    </div>

                    <?php contactForm(); ?>
                </div>

            </div>

        </div>
    </div>

</div></section>
<?php

}