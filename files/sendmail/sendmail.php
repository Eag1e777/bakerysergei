<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require 'phpmailer/src/Exception.php';
	require 'phpmailer/src/PHPMailer.php';
	require 'phpmailer/src/SMTP.php';

	$mail = new PHPMailer(true);
	$mail->CharSet = 'UTF-8';
	$mail->setLanguage('ru', 'phpmailer/language/');
	$mail->IsHTML(true);

	
	$mail->isSMTP();                                            //Send using SMTP
	$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
	$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
	$mail->Username   = 'plushkavatrushka18@gmail.com';                     //SMTP username
	$mail->Password   = 'lxbokggfniskxajn';                               //SMTP password
	$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
	$mail->Port       = 465;                 
	

	//От кого письмо
	$mail->setFrom('plushkavatrushka18@gmail.com', 'Best message'); // Указать нужный E-mail
	//Кому отправить
	$mail->addAddress('plushkavatrushka18@gmail.com'); // Указать нужный E-mail
	//Тема письма
	$mail->Subject = 'Сообщение от "Плюшки и Ватрушки"';

	//Тело письма
	$body = '<h1>Заказ!</h1>';

	if(trim(!empty($_POST['name']))){
		$body.='<p><strong>Name:</strong> ' . $_POST['name'].'</p>';
	}	
	if(trim(!empty($_POST['e-mail']))){
		$body.='<p><strong>E-mail:</strong> ' . $_POST['e-mail'].'</p>';
	}	
	if(trim(!empty($_POST['message']))){
		$body.='<p><strong>Message:</strong> ' . $_POST['message'].'</p>';
	}	
	if(trim(!empty($_POST['subscription']))){
		$body.='<p><strong>subscription:</strong> ' . $_POST['subscription'].'</p>';
	}	
	


	/*
	//Прикрепить файл
	if (!empty($_FILES['image']['tmp_name'])) {
		//путь загрузки файла
		$filePath = __DIR__ . "/files/sendmail/attachments/" . $_FILES['image']['name']; 
		//грузим файл
		if (copy($_FILES['image']['tmp_name'], $filePath)){
			$fileAttach = $filePath;
			$body.='<p><strong>Фото в приложении</strong>';
			$mail->addAttachment($fileAttach);
		}
	}
	*/

	$mail->Body = $body;

	//Отправляем
	// if (!$mail->send()) {
	// 	$message = 'Ошибка';
	// } else {
	// 	$message = 'Данные отправлены!';
	// }

	// $response = ['message' => $message];

	// header('Content-type: application/json');
	// echo json_encode($response);







	if (!$mail->send()) {
		$message = 'Ошибка';
		echo $message;
  } else {
		header('location: http://localhost');
  }

	// $response = ['message' => $message];
	
	// echo json_encode($response);
?>

