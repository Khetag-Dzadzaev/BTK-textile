<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {


	require_once('../../../../wp-load.php');

	$_POST = cleanPostArr($_POST);


	if (!wp_verify_nonce($_POST['modal_nonce_field-contact'], 'modal_nonce_action-contact')) {
		http_response_code(422);
		echo 'Что-то пошло не так.';
		die();
	}

	$name = $_POST['contact-name'];
	$tel = $_POST['contact-phone'];
	$city = $_POST['contact-city'];
	$mail = $_POST['contact-mail'];
	$text = $_POST['contact-text'];


	$errors = [];
	if (empty($name)) {
		$errors['contact-name'] = 'Имя обязательное поле!';
	}
	if (empty($tel)) {
		$errors['contact-phone'] = 'Телефон обязательное поле!';
	}
	if (empty($city)) {
		$errors['contact-city'] = 'Телефон обязательное поле!';
	}
	if (empty($mail)) {
		$errors['contact-mail'] = 'Телефон обязательное поле!';
	}
	if (!isset($_POST['contact-checkbox'])) {
		$errors['contact-checkbox'] = 'Поставьте галочку';
	};

	if (!empty($errors)) {
		http_response_code(422);
		echo json_encode($errors, JSON_HEX_QUOT | JSON_UNESCAPED_UNICODE);
		die();
	}

	/*   $captcha = getCaptcha($_POST['g-recaptcha-response-form']); */

	/*   if ($captcha->success == true && $captcha->score >= 0.4) {
 */
	$message = "
		<p><strong>Сообщение</strong> с формы обратной связи</p>
		<p><strong>Имя</strong> - $name</p>
		<p><strong>Город</strong> - $city</p>
		<p><strong>Почта</strong> - $mail</p>
		<p><strong>Телефон</strong> - <a href='tel:+$phone'>$phone</a></p>
		<p><strong>Текст</strong> - $text</p>
		";

	require 'phpmailer/PHPMailer.php';
	require 'phpmailer/SMTP.php';
	require 'phpmailer/Exception.php';



	$mail = new PHPMailer\PHPMailer\PHPMailer();
	$mail->isSMTP();
	$mail->CharSet = "UTF-8";
	$mail->SMTPAuth   = true;
	$mail->SMTPDebug = 0;
	$mail->Host = 'smtp.mail.ru';
	$mail->SMTPSecure = 'ssl';
	$mail->Port = 465;
	$mail->Username = 'dzadzaev.khetag@bk.ru';
	$mail->Password = 'MsBC7CEGrhMqprxnRv6b';
	$mail->setFrom('dzadzaev.khetag@bk.ru', 'BTK-textile');
	$mail->addAddress('dzadzaev.khetag@bk.ru');
	$mail->Subject = 'BTK-textile - Контакты ';
	$mail->isHTML(true);
	$mail->Body = $message;




	if ($mail->send()) {
		$ok = true;
	}
	if ($ok) {
		http_response_code(200);
		echo json_encode(['result' => 'ok']);
		die();
	} else {
		http_response_code(422);
		echo json_encode(['result' => 'false', 'error' => 'Что-то пошло не так!']);
		die();
	}
	/*   } else {
    http_response_code(422);
    echo json_encode(['result' => 'false', 'error' => 'Попробуйте позже!']);
  } */
} else {
	header('Location: /404/');
	die();
}
