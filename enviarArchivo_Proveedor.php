<?php
date_default_timezone_set('America/Bogota');
//include("conexiones/conexion.php");
include("funciones/funciones.php");
?>

  
<?php

$proveedor_id = decrypt($_GET['cI']);
$archivo = decrypt($_GET['iI']);

$usuario_id = $_GET['usuario_id'];
$NOMBRE_USUARIO = funcionMaster($usuario_id,'ID','NOMBRE_USUARIO','usuarios');
$conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));

$queryList = mysqli_query($conn3, "SELECT * FROM  sproveedores where id=$proveedor_id");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
  //$usuario_id = $rowMotorizado['usuario_id'];
  $nombreproveedor = $rowMotorizado['nombre'];

  $email = $rowMotorizado['correo'];
  $whatsapp = $rowMotorizado['whatsapp'];
}

$para = "$email";

// título
$titulo = 'Archivos';

// mensaje
$mensaje = '
                <html>
                <head>
                  <title>Documentos de Proveedor</title>
                    <body> 
                    
                               Hola buen dia ' . $nombreproveedor . ', enviamos los siguientes archivos :<br><br>';


$queryImg = mysqli_query($conn3, "SELECT * FROM archivos_proveedor  where proveedor_id = '$proveedor_id' and id='$archivo' AND estado = 1");
$nrowlER = mysqli_num_rows($queryImg);
while ($resulImg = mysqli_fetch_array($queryImg)) {
  $Producto              = $resulImg['codigo'];

  $mensaje .=
    'Ver archivo:  '.$Base.'/archivos_proveedor/' . $resulImg['codigo'] . ' .
  

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
$cabeceras .= 'From:  Usuario: ' . $NOMBRE_USUARIO . '  <noreply@medicalsoftcolombia.com>' . "\r\n";
$cabeceras .= 'Cc: noreply@medicalsoftcolombia.com' . "\r\n";
$cabeceras .= 'Bcc: noreply@medicalsoftcolombia.com' . "\r\n";
// Enviarlo
mail($para, $titulo, $mensaje, $cabeceras);


$mensajeW = ' Documentos de Proveedor 
Hola buen dia ' . $nombreproveedor . ', enviamos los siguientes archivos :

';

$queryImg = mysqli_query($conn3, "SELECT * FROM archivos_proveedor  where proveedor_id = '$proveedor_id' and id='$archivo' AND estado = 1");
//echo "SELECT * FROM archivos  where cliente_id = '$clienteId' and id='$archivo'";
$nrowlER = mysqli_num_rows($queryImg);
while ($resulImg = mysqli_fetch_array($queryImg)) {
  $Producto              = $resulImg['codigo'];




  $mensajeW .= 'Ver archivo:  '.$Base.'/archivos_proveedor/' . rawurlencode($Producto) . ' .';
}



echo $mensajeW;



Whatsapp_sent_cliente($linkkey, $whatsapp, $mensajeW, $cliente, $usuario_id, $whatsapp, $accion);


// echo "<script language='Javascript'> window.location='consultaCliente.php?clienteId=$cliente';</script>";
echo "<script type='text/javascript'>";
echo "window.close();";
echo "</script>";

?> 