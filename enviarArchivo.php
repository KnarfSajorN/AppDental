<?php
date_default_timezone_set('America/Bogota');
//include("conexiones/conexion.php");
include("funciones/funciones.php");
?>

  
<?php

$cliente = decrypt($_GET['cI']);
$archivo = decrypt($_GET['iI']);


$conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));

$queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id=$cliente");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
  $usuario_id = $rowMotorizado['usuario_id'];
  $nombrecliente = $rowMotorizado['nombre_cliente'];
  $celular_cliente = $rowMotorizado['celular_cliente'];
  $CODI_CLIENTE = $rowMotorizado['CODI_CLIENTE'];

  $email = $rowMotorizado['correo_cliente'];
  $whatsapp = $rowMotorizado['whatsapp'];
}


echo '------------' . $whatsapp;
echo '------------' . $email;

$para = "$email";

// título
$titulo = 'Archivos';

// mensaje
$mensaje = '
                <html>
                <head>
                  <title>Documentos de consulta</title>
                    <body> 
                    
                               Hola buen dia ' . $nombrecliente . ', enviamos los siguientes archivos :<br><br>';


$queryImg = mysqli_query($conn3, "SELECT * FROM archivos  where cliente_id = '$cliente' and id='$archivo'");
$nrowlER = mysqli_num_rows($queryImg);
while ($resulImg = mysqli_fetch_array($queryImg)) {
  $Producto              = $resulImg['codigo'];




  $mensaje .=
    'Ver archivo:  '.$Base.'/archivos/' . $resulImg['codigo'] . ' .
  

';
}






$mensaje .= '               <br></br>
                <p>Atentamente,<br />
                  ALTE-MedicalSoft</p> 
                  
                <br/>
                 
                  
 
                <body>

                </body>
                </html>
                ';

// Para enviar un correo HTML, debe establecerse la cabecera Content-type
$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
// Cabeceras adicionales
$cabeceras .= 'To: sievensoft <noreply@medicalsoftcolombia.com>' . "\r\n";
$cabeceras .= 'From:  Resultado de consulta  con el Dr(a). ' . $NOMBRE_USUARIO . '  <noreply@medicalsoftcolombia.com>' . "\r\n";
$cabeceras .= 'Cc: noreply@medicalsoftcolombia.com' . "\r\n";
$cabeceras .= 'Bcc: noreply@medicalsoftcolombia.com' . "\r\n";
// Enviarlo
mail($para, $titulo, $mensaje, $cabeceras);


$mensajeW = ' Documentos de consulta 
Hola buen dia ' . $nombrecliente . ', enviamos los siguientes archivos :

';

$queryImg = mysqli_query($conn3, "SELECT * FROM archivos  where cliente_id = '$cliente' and id='$archivo'");
//echo "SELECT * FROM archivos  where cliente_id = '$clienteId' and id='$archivo'";
$nrowlER = mysqli_num_rows($queryImg);
while ($resulImg = mysqli_fetch_array($queryImg)) {
  $Producto              = $resulImg['codigo'];




  $mensajeW .= 'Ver archivo:  '.$Base.'/archivos/' . rawurlencode($Producto) . ' .';
}



echo $mensajeW;



Whatsapp_sent_cliente($linkkey, $whatsapp, $mensajeW, $cliente, $usuario_id, $whatsapp, $accion);


// echo "<script language='Javascript'> window.location='consultaCliente.php?clienteId=$cliente';</script>";
echo "<script type='text/javascript'>";
echo "window.close();";
echo "</script>";

?> 