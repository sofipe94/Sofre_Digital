<?php $lang = globalLang(); ?>
<div class="page page-404">

	<!-- Content -->
	<section class="content"><div class="container">

		<div class="title wow fadeIn">
			<h1>Error 404 | <?= $lang == 'en' ? 'Page not found' : 'Página no encontrada'; ?></h1>

			<div class="desc">
				<?= $lang == 'en' ? 'Please check the URL or go back to home.' : 'Por favor revisá la URL o volvé al inicio.'; ?>
			</div>
		</div>

		<div class="text-center wow fadeInUp mt-5">
			<a href="<?= get_bloginfo('url'); ?>" class="btn btn-primary"><?= $lang == 'en' ? 'Back to home' : 'Volver al inicio'; ?></a>
		</div>

	</div></section>

</div>