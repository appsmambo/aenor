<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ini_set('allow_url_fopen', 1);
ini_set('allow_url_include', 1);
error_reporting(E_ALL);
echo '1';
if (count($_POST) == 0) {
	header('location: https://www.facebook.com/AENORPeru/');
	exit;
}
echo '2';
date_default_timezone_set('America/Lima');


/*

require_once 'recaptcha-master/src/autoload.php';
$recaptcha = new \ReCaptcha\ReCaptcha('6Lcmx4QUAAAAAIQ493nUteCVHLtzBFZFfZkra5xy');
$resp = $recaptcha->setExpectedHostname('certificacionperu.com')
                  ->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);
echo '<pre>';
print_r($resp);

if ($resp->isSuccess()) {
    echo 'Verified!';
} else {
    $errors = $resp->getErrorCodes();
}
print_r($errors);echo '</pre>';exit;

// Build POST request:
$recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
$recaptcha_secret = '6Lcmx4QUAAAAAIQ493nUteCVHLtzBFZFfZkra5xy';
$recaptcha_response = $_POST['g-recaptcha-response'];

print_r($_POST); //exit;

// Make and decode POST request:
$recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
$recaptcha = json_decode($recaptcha);

print_r($recaptcha);exit;

// Take action based on the score returned:
if ($recaptcha->score >= 0.5) {
    // Verified - send email
} else {
    // Not verified - show form error
}
*/

$fuente = strip_tags($_POST['fuente']);
$titulo = 'Formulario ' . strip_tags($_POST['titulo']);
$nombre = strip_tags($_POST['nombre']);
$apellido = strip_tags($_POST['apellido']);
$correo = strip_tags($_POST['correo']);
$telefono = strip_tags($_POST['telefono']);
$html = "<strong>$titulo</strong><br><br>Una solicitud de información recibida:<br><br><strong>Fuente: </strong> $fuente<br><strong>Nombre: </strong> $nombre<br><strong>Apellido: </strong> $apellido<br><strong>Correo: </strong> $correo<br><strong>Teléfono: </strong> $telefono";

$respuesta = $_SERVER['HTTP_REFERER'] . '?rpta=ok';

$to = 'quintanilla.peru@gmail.com'; //formacion.peru@aenor.com
$headers = "From: Juan Carlos Quintanilla <quintanilla.peru@gmail.com> \r\n";
$headers .= "Reply-To: $nombre <$correo> \r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
echo '3';
if (mail($to, $titulo, $html, $headers)) 
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