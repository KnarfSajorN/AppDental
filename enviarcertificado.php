<?php
date_default_timezone_set('America/Bogota');
include("funciones/funciones.php");
include("funciones/funcionesUtilidades.php");
include("funciones/conn3.php");
?>


<?php

$id_vacunacion = decrypt($_GET['iD']);
$id_vacunacion_link = encrypt($id_vacunacion);




$queryList = mysqli_query($conn3, "SELECT * FROM  vacunas_aplicadas where id = $id_vacunacion");

$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {

  $cliente_id      = $rowMotorizado['Id_Cliente'];
  $usuario_id      = $rowMotorizado['Id_Usuario'];
}

$queryList = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = $usuario_id");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
  $moneda = $rowMotorizado['moneda'];
  $impuestoF = $rowMotorizado['impuestoF'];

  // Nuevos campos

  $nombreF      = $rowMotorizado['nombreF'];
  $telefonoF    = $rowMotorizado['telefonoF'];
  $direccionF   = $rowMotorizado['direccionF'];
  $emailF       = $rowMotorizado['emailF'];
  $ciudadPaisF  = $rowMotorizado['ciudadPaisF'];
  $licenciaF    = $rowMotorizado['licenciaF'];
  $pieF         = $rowMotorizado['pieF'];
  $header       = $rowMotorizado['header'];

  $LogoF           = $rowMotorizado['logoF'];
  $firma               = $rowMotorizado['firma'];

  if (strlen($LogoF) > 0) {
    $Logo = '<img src="' . $Base . 'logos/' . $LogoF . '" height="50" width="120">';
  }


  if (strlen($firma) > 0) {
    $firmaImg = '<img src="' . $Base . 'FirmasReg/' . $firma . '" height="50" width="60">';
  }
}


$queryList = mysqli_query($conn3, "SELECT * FROM  usuarios where ID = $usuario_id");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {

  $empresaNombre      = $rowMotorizado['empresaNombre'];
  $Nombre           = $rowMotorizado['NOMBRE_USUARIO'];
  $pais               = $rowMotorizado['pais'];

  $ciudad             = $rowMotorizado['ciudad'];
  $direccion          = $rowMotorizado['direccion'];
  $telefono           = $rowMotorizado['telefono'];

  $nit                = $rowMotorizado['nit'];
}

$queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id = $cliente_id");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {

  $nombre_cliente             = $rowMotorizado['nombre_cliente'];
  $CODI_CLIENTE               = $rowMotorizado['CODI_CLIENTE'];
  $edad               = $rowMotorizado['edad_cliente'];
  $fechaNacimiento               = $rowMotorizado['fechaNacimiento'];
  $telefono                = $rowMotorizado['celular_cliente'];

  $email = $rowMotorizado['correo_cliente'];
  $whatsapp = $rowMotorizado['celular_cliente'];
}



//$Logoe = '<img src="'.$Base.'logos/encabezadoreceta.png" height="100" width="100%">'; 



?>




<body onload="window.print();">
  <div class="wrapper">

    <div class="row">
      <div class="col-md-12">

        <div class="box box-solid">


          <!-- /.box-header -->
          <div class="box-body">




            <?php

            $conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));




            $queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id=$cliente_id");
            //echo  "SELECT * FROM  cliente where cliente_id=$cliente";
            $nrowl = mysqli_num_rows($queryList);
            while ($rowMotorizado = mysqli_fetch_array($queryList)) {


              $email = $rowMotorizado['correo_cliente'];
              $whatsapp = $rowMotorizado['whatsapp'];
            }


            // $email= 'letaquisa@hotmail.com'; 
            // $telefono ='573158733816';

            $cadena_de_texto = $email;
            $cadena_buscada   = 'hotmail';
            $posicion_coincidencia = strpos($cadena_de_texto, $cadena_buscada);






            $mensajeW = 'Sr(a) *' . $nombre_cliente . '* Se le ha generado un Certificado de Vacunación; para ver el documento, Añadir a Contactos este número internacional para recibir posteriores mensajes e ingresar al siguiente enlace:
' . $Base . 'vercertificado/' . $id_vacunacion_link . '

Nota: Este es un mensaje automático enviado desde nuestro sistema informático, por favor no lo responda. Revise su bandeja de correo No Deseado o SPAM. Las respuestas a esta notificación se eliminan automáticamente.
 ';


            $accion = 0;
            Whatsapp_sent_cliente($linkkey, $whatsapp, $mensajeW, $cliente_id, $usuario_id, $whatsapp, $accion);

            $texto = "Sr(a) {$nombre_cliente}, Se le ha generado un Certificado de Vacunación<br>
para ver el documento, Añadir a Contactos este número internacional para recibir posteriores mensajes e ingresar al siguiente enlace:<br>
" . $Base . "vercertificado/{$id_vacunacion_link} <br>
Nota: Este es un mensaje automático enviado desde nuestro sistema informático, <br>
por favor no lo responda. Revise su bandeja de correo No Deseado o SPAM. <br>
Las respuestas a esta notificación se eliminan automáticamente.
";

            // ------------------------------------------
            // enviar correo
            // se arma el correo de bienvenida
            $_GET['receptor'] = $email;
            $_GET['asunto'] = "Certificado de vacunación ";
            $_GET['mensaje'] = $texto;
            include 'plantillaCorreo.php';



            // $para = "arturob0911@gmail.com";

            // título
            $titulo = 'Certificado de vacunación';

            // mensaje
            $mensaje = '
                <html>
                <head>
                  <title>Certificado de vacunación</title>
                    <body> 
                    
Sr(a) *' . $nombre_cliente . '* Se le ha generado un Certificado de Vacunación; para ver el documento, Añadir a Contactos este número internacional para recibir posteriores mensajes e ingresar al siguiente enlace:  ' . $Base . 'vercertificado/' . $id_vacunacion_link . '
 <br></br>

Nota: Este es un mensaje automático enviado desde nuestro sistema informático, por favor no lo responda. Revise su bandeja de correo No Deseado o SPAM. Las respuestas a esta notificación se eliminan automáticamente.

                
           
        

 
                          <br></br>
               
                  
               
 
                <body>

                </body>
                </html>
                ';

            // Para enviar un correo HTML, debe establecerse la cabecera Content-type
            $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
            // $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

            if ($posicion_coincidencia == true) {
              $cabeceras .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
            } else {
              $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            }

            // Cabeceras adicionales
            $cabeceras .= 'To: <noreply@medicalsoftplus.com>' . "\r\n";
            $cabeceras .= 'From: Certificado de Vacunación <noreply@medicalsoftplus.com>' . "\r\n";
            $cabeceras .= 'Cc: noreply@medicalsoftplus.com' . "\r\n";
            $cabeceras .= 'Bcc: noreply@medicalsoftplus.com' . "\r\n";

            // Enviarlo
            mail($para, $titulo, $mensaje, $cabeceras);
            mail($para1, $titulo, $mensaje, $cabeceras);


            echo "<script language='Javascript'> window.location='vacunacionAplicar?cI=".encrypt($cliente_id)."';</script>";

            ?>