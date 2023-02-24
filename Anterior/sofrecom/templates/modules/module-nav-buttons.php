<?php

function module_nav_buttons(){

    $links = get_field('links');

?>
<section class="section links"><div class="container">

    <ul class="list-unstyled">
        <?php foreach ($links['items'] as $v) : ?>
            <li class="link d-flex align-items-center"><a href="#<?= str_replace(array(' ', '.', '--'), '-', $v['title']); ?>">
                <div class="icon">
                    <img src="<?= $v['icon']['url'] ?>" class="img-fluid">
                </div>

                <p><?= $v['title'] ?></p>
            </a></li>
        <?php endforeach ?>
    </ul>

</div></section>
<?php

}