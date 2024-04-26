<?php
	require("inc/phpmailer/class.phpmailer.php");
	date_default_timezone_set('America/Bogota');

	$send_name      = "Vanessa Bedoya";	
	$send_title     = "Contacto";
	$send_address   = "email@gmail.com";	
	$smtp_address   = "email@gmail.com";
	$smtp_password	= "password";
	$smtp_server	= "smtp.gmail.com";
		
	$correo_cliente = $_POST["email"];
	$nombre_cliente = $_POST["name"];
	$asunto_cliente = $_POST["subject"];
	$mensaje_cliente = $_POST["message"];
	if (!stristr($correo_cliente,"@") OR !stristr($correo_cliente,".")) {
		echo "CORREO_ERROR";
	} else {
		$mail = new PHPMailer();
		$mail->IsSMTP();
		$mail->SMTPAuth = true;
		$mail->Host = $smtp_server;
		$mail->Username = $smtp_address;
		$mail->Password = $smtp_password;
		$mail->Port = 465;
		$mail->From = $send_address;
		$mail->FromName = $send_name;
		$mail->SMTPSecure = 'ssl'; 
		$mail->Subject = $asunto_cliente;
		$mail->AddAddress($smtp_address);
		$mail->IsHTML(true); 
		$body = "La informaci車n de contacto enviada por el cliente es la siguiente: <br />";
		$body .= "<strong>Nombre:</strong> $nombre_cliente <br> <strong>E-mail: </strong>$correo_cliente <br> <strong>Tel矇fono: </strong> $telefono_cliente <br> <strong>Asunto: </strong> $asunto_cliente <br> <strong>Mensaje: </strong> $mensaje_cliente";
		$mail->Body = $body;
		$exito = $mail->Send();
		if ($exito) {
			header('Location: https://www.vanessabedoya.com?mensaje=success');
		} else {
			header('Location: https://www.vanessabedoya.com?mensaje=error');
		}
	}
		
	
	
?>