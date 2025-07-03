<?php
$para      = 'pdachg_s816s@tigpe.com';
$titulo    = 'El título';
$mensaje   = 'Hola';
$cabeceras = 'From: noreply@medicalsoftcolombia.com';    

mail($para, $titulo, $mensaje, $cabeceras);
?>