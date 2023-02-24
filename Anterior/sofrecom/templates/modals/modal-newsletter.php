<div class="modal fade modal-newsletter" id="modalNewsletter" tabindex="1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered" role="document">

		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		        	<span aria-hidden="true"><i class="fa fa-times"></i></span>
		        </button>

				<div class="title">
					<div class="icon mb-3">
						<img src="<?= get_bloginfo('template_url'); ?>/assets/img/icons/icon-newsletter.png" width="56px" class="img-fluid">
					</div>

					<h4>Suscribete a nuestra Newsletter y recibe<br> oportunidades laborales, metodologías y tips.</h4>
				</div>

				<?php newsletterForm(); ?>
			</div>
		</div>

	</div>
</div>
<script>
	$('.menu-newsletter').click(function(e){
		e.preventDefault();

		$('#modalNewsletter').modal('show');
	});
</script>