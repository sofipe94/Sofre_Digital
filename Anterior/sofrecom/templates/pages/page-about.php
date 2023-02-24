<?php

$lang = globalLang();


$links = get_field('links');
$history = get_field('history');
$team = get_field('team');
$status = get_field('status');
$network = get_field('network');
$partners = get_field('partners');
$clients = get_field('clients');
$responsability = get_field('responsability');


$video = get_video_detail($history['video']);

$clients_list = array(
	'Todos' => [],
	'Energia' => [],
	'Telecomunicaciones' => [],
	'Bancos' => [],
	'Transporte' => [],
	'Salud' => [],
	'Otros' => [],
);

foreach ($clients['items'] as $v){
	$clients_list['Todos'][] = array(
		'image' => $v['image'],
		'url' => $v['url'],
	);

	$clients_list[$v['category']][] = array(
		'image' => $v['image'],
		'url' => $v['url'],
	);
}

?>
<script>
	$('body').addClass('color-about');
	$('.header .navigation .menu-about').addClass('current-menu-item');
</script>
<div class="page about">

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


	<!-- History -->
	<section class="section history bg-gray" id="about"><div class="container">

		<div class="row">
			<div class="col-12 col-md-6 my-3 order-md-3 wow fadeInUp">

				<div class="video-player <?= ($video['id'] != '') ? 'allowed' : ''; ?>" data-type="<?= $video['type']; ?>" data-id="<?= $video['id']; ?>" style="background-image: url('<?= $history['image']['url'] ?>')">
					<div class="play">
						<i class="fa fa-play"></i>
					</div>
				</div>

			</div>
			<div class="col-1 order-md-2"></div>
			<div class="col-12 col-md-5 my-3 order-md-1">

				<div class="title wow fadeIn">
					<div class="icon mb-4">
						<img src="<?= $history['icon']['url']; ?>" width="<?= $history['icon']['width'] / 2; ?>" class="img-fluid">
					</div>

					<h3><?= $history['title']; ?></h3>
					<p><?= $history['description']; ?></p>
				</div>

			</div>
		</div>

	</div></section>


	<!-- Team -->
	<section class="section team" id="team"><div class="container">

		<div class="title wow fadeIn">
			<div class="icon mb-4">
				<img src="<?= $team['icon']['url']; ?>" width="<?= $team['icon']['width'] / 2; ?>" class="img-fluid">
			</div>

			<h3><?= $team['title']; ?></3>
		</div>


		<div class="row">
			<div class="col-12 col-lg-2 wow fadeIn">

				<nav class="wow fadeInUp">
					<ul class="nav" id="myTab2">
						<?php $i=0; foreach ($team['items'] as $item): $i++; ?>
						<li><a class="<?= $i == 1 ? 'active' : '' ?>" data-toggle="tab" href="#<?= str_replace(array(' ', '.', '--'), '-', $item['title']); ?>" role="tab" aria-selected="<?= $i == 1 ? 'true' : 'false'; ?>">
								<?= $item['title'] ?>
							</a></li>
						<?php endforeach ?>
					</ul>
				</nav>

			</div>
			<div class="col-12 col-lg-10 wow fadeInUp">

				<div class="tab-content wow fadeInUp" id="tab-content2">
					<?php $i=0; foreach ($team['items'] as $item): $i++; ?>
					<div class="tab-pane fade <?= $i == 1 ? 'show active' : '' ?>" role="tabpanel" id="<?= str_replace(array(' ', '.', '--'), '-', $item['title']); ?>">

						<div class="row v-info">
							<div class="col-12 col-md-4 image">
								<div class="img" style="background-image: url('<?= $item['image']['url']; ?>')"></div>
							</div>
							<div class="col-12 col-md-7 text-left">

								<h5><?= $item['title']; ?></h5>
								<p><?= $item['description']; ?></p>

								<ul class="socialmedia list-unstyled">
									<?php foreach ($item['socialmedia'] as $v): ?>
										<?php if ($v['url'] != ''): ?>
										<li class="<?= $v['type']; ?> wow fadeIn"><a href="<?= $v['url']; ?>" target="_blank">
											<i class="fa fa-<?= $v['type']; ?>"></i>
										</a></li>
										<?php endif ?>
									<?php endforeach ?>
								</ul>

							</div>
						</div>

					</div>
					<?php endforeach; ?>
				</div>

			</div>
		</div>

	</div></section>


	<!-- Status -->
	<section class="section status stats" id="status"><div class="container">

		<div class="title d-md-flex align-items-center wow fadeIn">
			<div class="icon mr-3">
				<img src="<?= $status['icon']['url'] ?>" width="<?= $status['icon']['width'] / 2; ?>"  class="img-fluid">
			</div>

			<h3><?= $status['title']; ?></h3>
		</div>

		<div class="items row justify-content-center">
			<?php $i=0; foreach($status['items'] as $v): $i++;?>
			<div class="item col-6 col-md-4 col-xl-5-2 my-3 wow fadeIn" data-wow-delay="0.<?= $i; ?>s">
				<article class="text-center">
					<div class="icon">
						<p><?= $v['number'] ?></p>
					</div>

					<h2><?= $v['description'] ?></h2>
				</article>
			</div>
			<?php endforeach ?>
		</div>

	</div></section>


	<!-- Network -->
	<section class="section network wow fadeIn" id="network" style="background-image: url('<?= str_replace('-scaled', '', $network['image']['url']); ?>')"><div class="container">

		<div class="title wow fadeIn">
			<div class="icon mb-4">
				<img src="<?= $network['icon']['url'] ?>" width="<?= $network['icon']['width'] / 2; ?>"  class="img-fluid">
			</div>

			<h3><?= $network['title']; ?></h1>
			<p><?= $network['description']; ?></p>
		</div>

	</div></section>


	<!-- Partners -->
	<section class="section partners bg-gray" id="partners"><div class="container">

		<div class="title wow fadeIn">
			<div class="icon mb-4">
				<img src="<?= $partners['icon']['url'] ?>" width="<?= $partners['icon']['width'] / 2; ?>"  class="img-fluid">
			</div>

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


	<!-- Clients -->
	<section class="section clients" id="clients"><div class="container">

		<div class="title max-width wow fadeIn">
			<div class="icon mb-4">
				<img src="<?= $clients['icon']['url'] ?>" width="<?= $clients['icon']['width'] / 2; ?>"  class="img-fluid">
			</div>

			<h3><?= $clients['title']; ?></h3>
			<p><?= $clients['description']; ?></p>
		</div>

		<nav class="wow fadeInUp">
			<ul class="nav" id="myTab">
				<?php $i=0; foreach ($clients_list as $k => $v): $i++; ?>
				<li><a class="<?= $i == 1 ? 'active' : '' ?>" data-toggle="tab" href="#<?= str_replace(array(' ', '.', '--'), '-', $k); ?>" role="tab" aria-selected="<?= $i == 1 ? 'true' : 'false'; ?>">
					<?= $k; ?>
				</a></li>
				<?php endforeach ?>
			</ul>
		</nav>

		<div class="tab-content wow fadeInUp" id="tab-content">
			<?php $i=0; foreach ($clients_list as $k => $v): $i++; ?>
			<div class="tab-pane fade <?= $i == 1 ? 'show active' : '' ?>" role="tabpanel" id="<?= str_replace(array(' ', '.', '--'), '-', $k); ?>">
				<div class="items row">
					<?php $e=0; foreach ($v as $p): $e++; ?>
					<div class="item col-6 col-lg-3 col-xl-2 my-2">
						<?= ($p['url'] != '') ? '<a href="'. $p['url'] .'" target="_blank">' : ''; ?>
							<img src="<?= $p['image']['url']; ?>" width="<?= $p['image']['width'] / 2; ?>" class="img-fluid">
						<?= ($p['url'] != '') ? '</a>' : ''; ?>
					</div>
					<?php endforeach ?>
				</div>
			</div>
			<?php endforeach; ?>
		</div>

	</div></section>


    <!-- Responsability -->
    <section class="responsability" id="responsability">

        <section class="module"><div class="container-fluid p-0">

            <div class="row">
                <div class="col-12 col-lg-6 image wow fadeInLeft">
                    <div class="img" style="background-image: url('<?= $responsability['image']['url']; ?>')"></div>
                </div>
                <div class="col-12 col-lg-6 text wow fadeInUp">

                    <div class="data">

                        <div class="title">
                            <div class="icon mb-4">
                                <img src="<?= $responsability['icon']['url'] ?>" width="<?= $responsability['icon']['width'] / 2; ?>">
                            </div>

                            <h3><?= $responsability['title']; ?></h3>
                            <p><?= $responsability['description']; ?></p>
                        </div>

                        <div class="items" id="accordion-<?= $i; ?>">
                        <?php $e=0; foreach ($responsability['items'] as $v): $e++; ?>
                            <a href="#answer<?=$e ?>" data-toggle="collapse" class="question" <?= ($e==1) ? 'aria-expanded="true"' : ''; ?> aria-controls="#answer<?=$e ?>" data-wow-delay="0.<?= $e ?>s">
                                <?= $v['title']; ?>
                            </a>

                            <div class="answer collapse <?= ($e==1) ? 'show' : ''; ?>" id="answer<?=$e ?>" data-parent="#accordion-<?= $i; ?>">
                                <?= $v['description']; ?>
                            </div>
                        <?php endforeach ?>
                        </div>

                    </div>

                </div>
            </div>

        </div></section>

    </section>


	<?php module_contact(); ?>

</div>
<?php get_template_part('templates/modals/modal', 'video'); ?>