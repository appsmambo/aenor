<?php
if (count($_POST) == 0) {
	header('location: https://www.facebook.com/AENORPeru/');
	exit;
}

date_default_timezone_set('America/Lima');

$fuente = strip_tags($_POST['fuente']);
$titulo = 'Formulario ' . strip_tags($_POST['titulo']);
$nombre = strip_tags($_POST['nombre']);
$correo = strip_tags($_POST['correo']);
$telefono = strip_tags($_POST['telefono']);
$html = "<strong>$titulo</strong><br><br>Una solicitud de información recibida:<br><br><strong>Fuente: </strong> $fuente<br><strong>Nombre: </strong> $nombre<br><strong>Correo: </strong> $correo<br><strong>Teléfono: </strong> $telefono";

$respuesta = $_SERVER['HTTP_REFERER'] . '?rpta=ok';

$to = 'formacion.peru@aenor.com';
$headers = "From: $nombre <$correo> \r\n";
$headers .= "Reply-To: $nombre <$correo> \r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

mail($to, $titulo, $html, $headers);
header('location: ' . $respuesta);


/*require '../../PHPMailer/class.phpmailer.php';
require '../../PHPMailer/class.smtp.php';

$mail = new PHPMailer;
$mail->isSMTP(); //or $mail->isSendMail();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 2;
$mail->Timeout = 60;
$mail->Helo = 'certificacionperu.com'; //Muy importante para que llegue a hotmail y otros
$mail->Host = 'smtp.1and1.com';
$mail->Port = 587;  //25
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = 'landingpage@certificacionperu.com';
$mail->Password = 'zC77NR9CYdQQkU5qxR';
$mail->setFrom('no-reply@certificacionperu.com', 'AENOR Perú Programas y Cursos');
//$mail->addReplyTo('correo@envia.com', 'Nombre');

$mail->addAddress($to);
$mail->Subject = $titulo;
$mail->Body = $html;
$mail->IsHTML(true);

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}
*/