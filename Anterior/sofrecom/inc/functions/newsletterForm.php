<?php

function newsletterForm($id = ''){
	global $post, $lang;

	if ($id == ''){
		$id = 2;
	}

	$contact = get_field('contact', $id);


	$form = array(
		'id' => 'newsletterForm',
		'email' => $contact['email'],
		'subject' => 'Nuevo contacto',
		'submit' => $lang == 'en' ? 'Send' : 'Enviar',
		'thanks' => $lang == 'en' ? 'Message sent<br>¡Thanks for contact us!' : 'Mensaje enviado con éxito<br>¡Gracias por contactarnos!',
		'fields' => array(
			array(
				'id' => 'contactName',
				'type' => 'input',
				'placeholder' => $lang == 'en' ? 'Name' : 'Nombre',
				'is_empty' => 'No informado',
				'columns' => 'col-12 col-md-6 my-2',
				'required' => true,
				'required_filter' => false,
				'required_message' => $lang == 'en' ? 'You need to enter a name.' : 'Debes ingresar un nombre.',
			
			),
			array(
				'id' => 'contactLastname',
				'type' => 'input',
				'placeholder' => $lang == 'en' ? 'Last name' : 'Apellido',
				'is_empty' => 'No informado',
				'columns' => 'col-12 col-md-6 my-2',
				'required' => true,
				'required_filter' => false,
				'required_message' => $lang == 'en' ? 'You need to enter a lastname.' : 'Debes ingresar un apellido.',
			),
			array(
				'id' => 'contactEmail',
				'type' => 'input',
				'placeholder' => '',
				'label' => 'Email',
				'is_empty' => 'No informado',
				'columns' => 'col-12 col-md-6 my-2',
				'required' => true,
				'required_filter' => 'email',
				'required_filter_message' => $lang == 'en' ? 'Debes ingresar un e-mail válido.' : 'Debes ingresar un e-mail válido.',
				'required_message' => $lang == 'en' ? 'You need to enter an e-mail.' : 'Debes ingresar un e-mail.',
			),
			array(
				'id' => 'contactSolution',
				'type' => 'input',
				'placeholder' => '',
				'label' => 'Servicio de interés',
				'is_empty' => 'No informado',
				'columns' => 'col-12 col-md-6 my-2',
				'required' => true,
				'required_filter' => 'false',
				'required_message' => $lang == 'en' ? 'You need to enter a solution.' : 'Debes ingresar una solución.',
			),
		),
		'captcha' => array(
			'enabled' => false,
			'public' => '6LcatlsdAAAAAFlyTBXIakAJTxlPNFt67KCfsYsC',
			'secret' => '6LcatlsdAAAAAK9Vk0lwTm007B0ilL2YLvGrWDei',
			'message' => $lang == 'en' ? 'Wrong captcha' : 'Captcha incorrecto',
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
				<option value="" selected><?= $lang == 'en' ? 'Select' : 'Seleccionar' ?></option>
				<?php foreach ($v['options'] as $k => $v): ?>
					<option value="<?= $k ?>"><?= $v ?></option>
				<?php endforeach ?>
			</select>

		<?php else: ?>
			<!-- Input -->
			<input type="text" id="<?= $v['id'] ?>" name="<?= $v['id'] ?>" class="form-control" <?= $placeholder ? 'placeholder="'. $placeholder .'"' : '' ?>>
		<?php endif ?>

	</div>
	<?php endforeach ?>


	<!-- Submit -->
	<div class="col-12 my-3 text-md-right">
		<input type="hidden" name="type" value="<?= $form['id']; ?>">
		<button type="submit" class="btn btn-secondary btn-block">
			<?= $form['submit']; ?>
		</button>
	</div>

	<?php if ($form['captcha']['enabled']): ?>
	<!-- Captcha -->
	<div class="col-12 text-md-right my-3" id="captcha">
		<div class="g-recaptcha d-inline-block" data-sitekey="<?= $form['captcha']['public']; ?>"></div>
	</div>
	<?php endif; ?>

</form>

<script>
	$(document).ready(function(){
		contactForm(<?= json_encode($form); ?>);
	});
</script>
<?php

}