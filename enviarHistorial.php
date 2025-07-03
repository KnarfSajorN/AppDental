<?php
date_default_timezone_set('America/Bogota');
include("funciones/funciones.php");
include("funciones/funcionesUtilidades.php");
include("funciones/conn3.php");
 ?>

 
<?php

 $idcliente = decrypt($_GET['iC']);
 $idcliente_link = encrypt($idcliente);



   ?>




<body onload="window.print();">
    <div class="wrapper">
       
      <div class="row">
        <div class="col-md-12">

          <div class="box box-solid">


            <!-- /.box-header -->
            <div class="box-body">

   
 

<?php




            $queryList=mysqli_query($conn3,"SELECT * FROM  cliente where cliente_id=$idcliente");
           //echo  "SELECT * FROM  cliente where cliente_id=$cliente";
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {
           
            
            $email=$rowMotorizado['correo_cliente']; 
            $whatsapp =$rowMotorizado['whatsapp']; 
            $nombre_cliente =$rowMotorizado['nombre_cliente']; 

          }

          //$email='ltquinteros@ufpso.edu.co'; 
        // $email='letaquisa@hotmail.com'; 
        //  $whatsapp ='573158733816'; 





///////////////////////////////////////////////////////////////////////////////////////777

$cadena_de_texto = $email;
$cadena_buscada   = 'hotmail';
$posicion_coincidencia = strpos($cadena_de_texto, $cadena_buscada);
 


////////////////////////////////////////////////////////////////////////////////////



$mensajeW = 'Sr(a) '.$nombre_cliente.' Se le ha generado su Historial Vacunal;
para ver el documento, Añadir a Contactos este número internacional para recibir posteriores mensajes e ingresar al siguiente enlace:
'.$Base.'/verEsquemaVacunacion/'.$idcliente_link.'

Nota: Este es un mensaje automático enviado desde nuestro sistema informático, por favor no lo responda. Revise su bandeja de correo No Deseado o SPAM. Las respuestas a esta notificación se eliminan automáticamente';
// echo 'DOCUMENTO ENVIADO CON ÉXITO!';

$accion = 0;
Whatsapp_sent_cliente($linkkey, $whatsapp, $mensajeW, $cliente_id, $usuario_id, $whatsapp, $accion);


$texto = "Sr(a) {$nombre_cliente}, Se le ha generado su Historial Vacunal<br>
para ver el documento, Añadir a Contactos este número internacional para recibir posteriores mensajes e ingresar al siguiente enlace:<br>
".$Base."/verEsquemaVacunacion/{$idcliente_link} <br>
Nota: Este es un mensaje automático enviado desde nuestro sistema informático, <br>
por favor no lo responda. Revise su bandeja de correo No Deseado o SPAM. <br>
Las respuestas a esta notificación se eliminan automáticamente.
";

// ------------------------------------------
// enviar correo
// se arma el correo de bienvenida
$_GET['receptor'] = $email;
$_GET['asunto'] = "Historial Vacunal";
$_GET['mensaje'] = $texto;
include 'plantillaCorreo.php';


$para ="$email";
$para1 ="$email1";

                // título
                $titulo = 'Historial Vacunal';

                // mensaje
                $mensaje = '
                <html>
                <head>
                  <title>Historial Vacunal</title>
                    <body> 
                    <div>
                    
Sr(a) '.$nombre_cliente.' Se le ha generado su Historial Vacunal;
para ver el documento, Añadir a Contactos este número internacional para recibir posteriores
mensajes e ingresar al siguiente enlace:
'.$Base.'/verEsquemaVacunacion/'.$idcliente_link.'
 <br></br>

Nota: Este es un mensaje automático enviado desde nuestro sistema informático, por favor no
lo responda. Revise su bandeja de correo No Deseado o SPAM. Las respuestas a esta
notificación se eliminan automáticamente.
              
          </div>
        

 
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
                $cabeceras .= 'To: sievensoft <noreply@medicalsoftplus.com>' . "\r\n";
                $cabeceras .= 'From: Historial Vacunal <noreply@medicalsoftplus.com>' . "\r\n";
                $cabeceras .= 'Cc: noreply@medicalsoftplus.com' . "\r\n";
                $cabeceras .= 'Bcc: noreply@medicalsoftplus.com' . "\r\n";

                // Enviarlo
                mail($para, $titulo, $mensaje, $cabeceras); 
                //mail($para1, $titulo, $mensaje, $cabeceras); 


       echo "<script language='Javascript'> window.location='vacunacionAplicar?cI=".encrypt($idcliente)."';</script>"; 

              ?> 