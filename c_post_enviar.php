<?php
date_default_timezone_set('America/Bogota');
include("conexiones/conexion.php");
include("funciones/funcionesUtilidades.php");

    $con=conectar();

 
        $nombre     = reem($_POST['nombre']);
        $ID        =$_POST['ID'];
       
        $email           =$_POST['email'];
        $titulo           =$_POST['titulo'];
        $contenido           =$_POST['contenido'];
       
        $fecha  = date("Y-m-d");


$para ="$email";

// título
$titulo = 'Artículos para Blog';

// mensaje
           
                $mensaje .=  "<h1 align='center'>Fecha : $fecha </h1>";
                $mensaje .=  "<h1 align='center'>Nombre: $nombre </h1>"; 
                $mensaje .=  "<h1 align='center'>Correo: $email </h1>"; 
                $mensaje .=  "<h1 align='center'>titulo: $titulo </h1>"; 
                $mensaje .=  "Contenido: $contenido"; 

                $mensaje .=  '<br></br>
          
          
';

// Para enviar un correo HTML, debe establecerse la cabecera Content-type
$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Cabeceras adicionales
$cabeceras .= 'To: Artículos para Blog Enviado <noreply@'.$_SERVER["HTTP_HOST"].'>' . "\r\n";
$cabeceras .= 'From: Artículos para Blog Enviado <noreply@'.$_SERVER["HTTP_HOST"].'>' . "\r\n";
$cabeceras .= 'Cc: noreply@'.$_SERVER["HTTP_HOST"].'' . "\r\n";
$cabeceras .= 'Bcc: noreply@'.$_SERVER["HTTP_HOST"].'' . "\r\n";

// Enviarlo
mail($para, $titulo, $mensaje, $cabeceras);
mail('info@hellomedical.net', $titulo, $mensaje, $cabeceras);
 
           
           
      echo "<script language='Javascript'> window.location='articuloBlog?mensaje=1';   </script>";


?>