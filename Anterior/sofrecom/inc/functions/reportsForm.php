<?php

function reportsForm($id = ''){
	global $post;

	if ($id == ''){
		$id = 2;
	}

	$contact = get_field('contact', $id);

	$countries = get_countries();

	$form = array(
		'id' => 'reportsForm',
		'email' => $contact['email'],
		'subject' => 'Nueva descarga',
		'submit' => 'Descargar',
		'thanks' => 'Mensaje enviado con éxito<br>¡Gracias por contactarnos!',
		'fields' => array(
			array(
				'id' => 'contactProject',
				'type' => 'input',
				'label' => 'Proyecto',
				'placeholder' => false,
				'is_empty' => 'No informado',
				'columns' => 'col-12 my-2',
				'required' => true,
				'required_filter' => false,
				'required_message' => 'Debes ingresar un proyecto.',
			),
			array(
				'id' => 'contactName',
				'type' => 'input',
				'label' => 'Nombre y Apellido',
				'placeholder' => false,
				'is_empty' => 'No informado',
				'columns' => 'col-12 my-2',
				'required' => true,
				'required_filter' => false,
				'required_message' => 'Debes ingresar un nombre y apellido.',
			),
			array(
				'id' => 'contactEmail',
				'type' => 'input',
				'label' => 'E-mail',
				'placeholder' => false,
				'is_empty' => 'No informado',
				'columns' => 'col-12 my-2',
				'required' => true,
				'required_filter' => 'email',
				'required_filter_message' => 'Debes ingresar un e-mail válido.',
				'required_message' => 'Debes ingresar un e-mail.',
			),
			array(
				'id' => 'contactPhone',
				'type' => 'input',
				'label' => 'Teléfono',
				'placeholder' => false,
				'is_empty' => 'No informado',
				'columns' => 'col-12 my-2',
				'required' => true,
				'required_filter' => 'phone',
				'required_filter_message' => 'Debes ingresar un teléfono válido.',
				'required_message' => 'Debes ingresar un teléfono.',
			),
			array(
				'id' => 'contactCountry',
				'type' => 'select',
				'label' => 'País',
				'options' => $countries,
				'placeholder' => false,
				'is_empty' => 'No informado',
				'columns' => 'col-12 my-2',
				'required' => true,
				'required_filter' => false,
				'required_message' => 'Debes seleccionar un país.',
			),
			array(
				'id' => 'contactCompany',
				'type' => 'input',
				'label' => 'Empresa',
				'placeholder' => false,
				'is_empty' => 'No informado',
				'columns' => 'col-12 my-2',
				'required' => true,
				'required_filter' => false,
				'required_message' => 'Debes ingresar una empresa.',
			),
			array(
				'id' => 'contactDownload',
				'type' => 'option',
				'label' => '',
				'options' => array(
					'es' => 'Descargar versión Español',
					'en' => 'Descargar versión Ingles',
				),
				'placeholder' => false,
				'is_empty' => 'No informado',
				'columns' => 'col-12 my-2',
				'required' => true,
				'required_filter' => false,
				'required_message' => 'Debes ingresar una opción.',
			),
		),
		'captcha' => array(
			'enabled' => true,
			'public' => '6Lecr9EaAAAAAF4ONW4vOEZZ8XkJZf8qoq8iqAkZ',
			'secret' => '6Lecr9EaAAAAAE1KkQv1ltXjQG2at6fiTXNKLn5C',
			'message' => 'Captcha incorrecto'
		),
	);


	if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['type'] == $form['id']){

		// Form
		$results = [];
		foreach ($form['fields'] as $v) {
			if(!empty($_POST[$v['id']])) {
				$results[$v['id']] = strip_tags(trim($_POST[$v['id']]));
			} else {
				$results[$v['id']] = 'No Informado';
			}			
		}

		// E-mail data
		$email_content = '
			<html>
			<body>
				<div style="padding:50px 0; text-align: center; background: #eeeeee;">

					<a href="'. get_bloginfo('url') .'" target="_Blank" style="display:inline-block; vertical-align: middle; max-width: 300px; height: auto; margin-bottom: 50px;">
						<img src="'. get_bloginfo('template_url') .'/assets/img/logo.png" alt="'. get_bloginfo('name') .'" style="width: 100%;">
					</a>

					<div></div>

					<table cellpadding="12" cellspacing="0" border="0" style="width: 100%; max-width: 600px; padding-top:10px; padding-bottom: 10px; margin: 0 auto; text-align: left; background: #ffffff; font-family: helvetica, arial; font-size: 14px; border: 1px solid #ccc;">
					';
		foreach ($form['fields'] as $v) {
			$email_content .='<tr>
								<td style="text-align: right"><strong>'. $v['label'] .':</strong></td>
								<td>'. $results[$v['id']] .'</td>
							</tr>';
		}

		$email_content .= '</table>
				</div>
			</body>
			</html>
		';


		if ($form['captcha']['enabled']):

			if (isset($_POST["g-recaptcha-response"])):
				$captcha_response = $_POST["g-recaptcha-response"];
			else:
				$captcha_response = '';
			endif;

			$response = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$form['captcha']['secret']."&response=".$captcha_response."&remoteip=".$_SERVER["REMOTE_ADDR"]), true);

			if ($response["success"] != false):
				$success = wp_mail($form['email'], $form['subject'], $email_content);
			endif;

		else:
			$success = wp_mail($form['email'], $form['subject'], $email_content);
		endif;

	}

?>
<form id="<?= $form['id']; ?>" method="POST" class="row">

	<?php foreach ($form['fields'] as $k => $v):

		$label = $v['label'];
		$placeholder = $v['placeholder'];
		$required = $v['required'];
		if ($placeholder && $required){
			$placeholder .= ' *';
		}

	?>
	<div class="<?= $v['columns'] ?>">
		
		<?php if ($label): ?>

			<!-- Label -->
			<label for="<?= $v['id'] ?>">
				<?= $label; ?>
				<?= ($required) ? '<span class="required">*</span>' : '' ?>
			</label>

		<?php endif ?>


		<?php if ($v['type'] == 'textarea'): ?>

			<!-- Textarea -->
			<textarea name="<?= $v['id'] ?>" id="<?= $v['id'] ?>" rows="4" class="form-control" <?= $placeholder ? 'placeholder="'. $placeholder .'"' : '' ?>></textarea>

		<?php elseif($v['type'] == 'select'): ?>

			<!-- Select -->
			<select name="<?= $v['id'] ?>" id="<?= $v['id'] ?>" class="form-control">
				<option value="" selected><?= ($lang == 'en') ? 'Select' : 'Seleccionar' ?></option>
				<?php foreach ($v['options'] as $k => $v): ?>
					<option value="<?= $k ?>"><?= $v ?></option>
				<?php endforeach ?>
			</select>

		<?php elseif($v['type'] == 'option'): ?>

			<br>
			<div class="d-flex justify-content-around">
			<?php foreach ($v['options'] as $k => $l): ?>
			<label>
				<input type="radio" id="<?= $v['id'] ?>" name="<?= $v['id'] ?>" value="<?= $k ?>">
				 <?= $l ?>
			</label>
			<?php endforeach ?>
			</div>

		<?php else: ?>

			<!-- Input -->
			<input type="text" id="<?= $v['id'] ?>" name="<?= $v['id'] ?>" class="form-control" <?= $placeholder ? 'placeholder="'. $placeholder .'"' : '' ?>>
		
		<?php endif ?>

	</div>
	<?php endforeach ?>


	<!-- Submit -->
	<div class="col-12 my-2">
		<input type="hidden" name="type" value="<?= $form['id']; ?>">
		<button type="submit" class="btn btn-primary btn-block">
			<?= $form['submit']; ?>
		</button>
	</div>

	<!-- Captcha -->
	<?php if ($form['captcha']['enabled']): ?>
	<div class="col-12 text-md-right my-2" id="captcha">
		<div class="g-recaptcha d-inline-block" data-sitekey="<?= $form['captcha']['public']; ?>"></div>
	</div>
	<?php endif; ?>

</form>

<script>
	$(document).ready(function(){
		downloadForm(<?= json_encode($form); ?>);
	});
</script>
<?php

}