<?php
	session_start();

	if ($_SERVER["REQUEST_METHOD"] != "POST" || $_SERVER["HTTP_X_REQUESTED_WITH"] != "XMLHttpRequest") { print("Must be POST"); exit(); }

	$answer = "";

	if ($_SESSION["examine"] == "" || $_SESSION["examine"] != $_POST["captcha"]) {
		$answer = 'wrongCaptcha';
	}

	// регулярное выражение, разрешено 0-9, " ", "-", "(", ")"
	if ($_POST["tel"] == "") {
		$answer = 'empty';
	} elseif (!preg_match('/^[0-9\s\-\(\)]+$/', $_POST["tel"])) {
		$answer = 'incorrect';
	}

	if ($answer != '') {
		// Send admin mail when error
		sendErrorMail($answer);

		// Print answer
		print json_encode($answer);
		exit;
	}

	$tel = $_POST["tel"];
	$fio = $_POST["fio"];
	$comment = $_POST["comment"];

	$mailTemplate = "template/mail_template.php";

	$to[] = "sn-b@yandex.ru";
	$to[] = "lobkovs@yandex.ru";
	$subject = "Запрос обратного звонка с сайта ".$_SERVER["HTTP_HOST"];
	$text_message = "";
	// $headers = "MIME-Version: 1.0\r\n";
	// $headers = "Content-type: text/html; charset=windows-1251\r\n";
	$headers = "Content-type: text/html; charset=utf-8\r\n";
	$headers .= "From: INFO SNB.RU <info@sn-b.ru>\r\n";

	if (file_exists($mailTemplate)) {
		ob_start();
		include_once($mailTemplate);
		$text_message = ob_get_contents();
		ob_end_clean();
	}

	if (is_array($to) && $text_message) {
		foreach ($to as $main_adress) {
			//Send admin info with message
			if ($main_adress == "lobkovs@yandex.ru") {
				$text_message .= getTextErrorMail('Its OK!');
			}
			$send = mail($main_adress, $subject, $text_message, $headers);
		}
	}

	if ($send) {
		$answer = ob_include("template/send_mail_ok.php");
	} else {
		$answer = ob_include("template/send_mail_error.php");
	}
	print json_encode($answer);

	if ($_SESSION["examine"]) {
		unset($_SESSION["examine"]);
	}

	exit();
?>
