<?php
 include 'funciones/funciones.php';
include 'funciones/funcionesUtilidades.php';

 
// ***********************************  pe116  ***********************************
// ***********************************  pe116  ***********************************


$fecha_actual = date("y-m-d");
//sumo 1 día
$fechaRe = date("y-m-d",strtotime($fecha_actual."+ 1 days")); 


$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));

        $queryList=mysqli_query($conn3,"SELECT * FROM vacunas_aplicadas where  Fecha_Proxima_Aplicacion = '$fechaRe'");
     
   
        $nrowl=mysqli_num_rows($queryList);

           while($rowMotorizado=mysqli_fetch_array($queryList))

        {
      
        
          $fecha            =$rowMotorizado['Fecha_Proxima_Aplicacion'];
          $cliente             =$rowMotorizado['Id_Cliente'];
          $Id_Lista_Vacuna  =$rowMotorizado['Id_Lista_Vacuna'];
         
          
         


$queryLista=mysqli_query($conn3,"SELECT * FROM  cliente where cliente_id= $cliente");
            $nrowla=mysqli_num_rows($queryLista);
            while($rowMotorizado=mysqli_fetch_array($queryLista))
            {
                $nombreC=$rowMotorizado['nombre_cliente'];
                $telefono =$rowMotorizado['whatsapp'];
                $correo =$rowMotorizado['correo_cliente'];
                
            }
 


$queryListV=mysqli_query($conn3,"SELECT * FROM  listado_vacunas where id= $Id_Lista_Vacuna  ");

            $nrowlV=mysqli_num_rows($queryListV);
            while($rowMotorizado=mysqli_fetch_array($queryListV))
            {
                $nombreV=$rowMotorizado['Nombre_Vacuna'];
                
            }

    
     // $correo='ltquinteros@ufpso.edu.co'; 
   // $correo='letaquisa@hotmail.com'; 
 // $telefono ='573158733816'; 

 
$mensaje = 'Sr(a) '.$nombreC.'; VACUNORTE le recuerda su CITA para la próxima vacunación de '.$nombreV.' para el día  '.$fecha.'. No olvide traer su Carnet/Certificado de Vacunación. Añadir a Contactos este número internacional para recibir posteriores mensajes.

Nota: Este es un mensaje automático enviado desde nuestro sistema informático, por favor no lo responda. Revise su bandeja de correo No Deseado o SPAM. Las respuestas a esta
notificación se eliminan automáticamente. Si tiene cualquier inquietud por favor no dude en contactarse a www.vacunorte.com.

';

echo '$mensaje'.$mensaje;



 //mysqli_query($conn3,"update citas set  enviado = 1 where  idCitas = '$idCitas'");

Whatsapp_sent_cliente($linkkey, $telefono, $mensaje, 0, 0, $telefono , 0); 



$cadena_de_texto = $correo;
$cadena_buscada   = 'hotmail';
$posicion_coincidencia = strpos($cadena_de_texto, $cadena_buscada);


$para ="$correo";



                // título
                $titulo = 'VACUNORTE – Cita para vacunación';

                // mensaje
                $mensaje = '
                <html>
                <head>
                  <title>VACUNORTE – Cita para vacunación</title>
                    <body>' ;
                    
                $mensaje .=  "<h1 align='center'>Sr(a) $nombreC VACUNORTE le recuerda su CITA para la próxima vacunación de $nombreV para el día $fecha. No olvide traer su Carnet/Certificado de Vacunación. Añadir a Contactos este número internacional para recibir posteriores mensajes.
                 <br></br>

Nota: Este es un mensaje automático enviado desde nuestro sistema informático, por favor no lo responda. Revise su bandeja de correo No Deseado o SPAM. Las respuestas a esta
notificación se eliminan automáticamente. Si tiene cualquier inquietud por favor no dude en contactarse a www.vacunorte.com. </h1>";
              
                $mensaje .=  "<h5 align='center'> '$Logo' </h5>";


                $mensaje .=  '<br></br>
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
                $cabeceras .= 'From: Cita para vacunación <noreply@medicalsoftplus.com>' . "\r\n";
                $cabeceras .= 'Cc: noreply@medicalsoftplus.com' . "\r\n";
                $cabeceras .= 'Bcc: noreply@medicalsoftplus.com' . "\r\n";


// Enviarlo
mail($para, $titulo, $mensaje, $cabeceras);













}












      

mysqli_close($conn3);


 

?>