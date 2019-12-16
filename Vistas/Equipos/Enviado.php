<?php
require "../../PHPMailer/Exception.php";
require "../../PHPMailer/PHPMailer.php";
require "../../PHPMailer/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer;
$mail ->charSet = "UTF-8";
$mail->isSMTP();
$mail->Host = "smtp.gmail.com";
$mail->Port = 587;
$mail->SMTPSecure = "tls";
$mail->SMTPAuth = true;
$mail->Username = "gamerdan2098@gmail.com";
$mail->Password = "BUFFETcramponB12";
$mail->setFrom($_POST['correo']);
$mail->addAddress($_POST['email'], "Daniel");
$mail->Subject = "Solicitud del Equipo: {$_POST['id']} - {$_POST['nombre']}";
$mail->msgHTML("Buenas, el usuario: {$_POST['completo']} , con documento de identidad {$_POST['cedula']} cuya ocupacion es {$_POST['ocupacion']}, ha realizado una solicitud de un equipo que se encuentra a su disposicion. <br><br>

Equipo: <br>
Codigo: {$_POST['id']}  <br>
Nombre: {$_POST['nombre']} <br>
Cantidad Solicitada: {$_POST['pedido']} <br><br>

Cuerpo del Mensaje enviado: <br>

{$_POST['motivo']}<br><br>

Contacto del solicitante: {$_POST['telefono']}<br><br>

Saludos"
);

if(!$mail->send()){
    echo $mail->ErrorInfo;
}
else{?>
    <h1>Mensaje Enviado</h1>
    <a href='../../Vistas/Equipos/location.php'><button type='button'>Volver al Inventario</button></a><?php
}
?>