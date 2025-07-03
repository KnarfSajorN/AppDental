<?php

// librerías
require 'PHPMailer/PHPMailerAutoload.php';
include 'funciones/funciones.php';

$mail               = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth     = true;
$mail->SMTPSecure   = "ssl";
$mail->Host         = "smtp.gmail.com";
$mail->Port         = 465;
$mail->Username     = 'unicopago@ofertasievensoft.com';
$mail->Password     = 'r16296916';
$mail->From         = 'unicopago@ofertasievensoft.com';
$mail->FromName     = 'unicopago';
$mail->Subject      = 'Asunto';
$mail->AltBody      = 'Asunto';
$mail->MsgHTML('Mensaje');
$mail->AddAddress('eljarf123@gmail.com');
$mail->IsHTML(true);
$mail->CharSet = 'UTF-8';
if (!$mail->Send()) {

    return $mail->ErrorInfo;
} else {
    $mail->ClearAddresses();

    return "Mensaje enviado correctamente";
}
