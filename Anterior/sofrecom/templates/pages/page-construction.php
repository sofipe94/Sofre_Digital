<?php $lang = globalLang(); ?>
<div class="page page-404">

	<!-- Content -->
	<section class="content"><div class="container">

		<div class="title wow fadeIn">
			<h1><?= $lang == 'en' ? 'Page in construction' : 'Página en construcción'; ?></h1>

			<div class="desc">
				<p>Disculpe las molestias ocacionadas.<br> Por cualquier consulta enviar un e-mail a <a href="mailto:info@sofrecom.com.ar" class="text-primary">info@sofrecom.com.ar</a>.</p>

				<?php // $lang == 'en' ? 'We are working on Sofrecom.' : 'Estamos trabajando en Sofrecom.'; ?>
			</div>
		</div>

	</div></section>

</div>
<script>
	$('body').removeClass('home');
</script>
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