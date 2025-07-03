<?php
date_default_timezone_set('America/Bogota');
include("conexiones/conexion.php");
include("funciones/funciones.php");
?>

 
<?php

$idOperacion = $_GET['idOperacion'];
$usuario_id = $_SESSION['ID'];

$tipo_envio = $_GET['tipo'];



$queryList = mysqli_query($conn3, "SELECT * FROM  sOperacionInv where idOperacion = $idOperacion");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
  $idOperacion      = $rowMotorizado['idOperacion'];
  $numeroDoc      = $rowMotorizado['numeroDoc'];
  $idCliente      = $rowMotorizado['idCliente'];
  $idEmpresa      = $rowMotorizado['idEmpresa'];
  $fechaOperacion      = $rowMotorizado['fechaOperacion'];
  $fechaVencimiento      = $rowMotorizado['fechaVencimiento'];
  $subTotal      = $rowMotorizado['subTotal'];
  $impuesto      = $rowMotorizado['impuesto'];
  $totalNeto      = $rowMotorizado['totalNeto'];
  $totalBruto      = $rowMotorizado['totalBruto'];
  $cantidadProduc      = $rowMotorizado['cantidadProduc'];
  $descuentos      = $rowMotorizado['descuentos'];
  $montoPagado      = $rowMotorizado['montoPagado'];
  $nota      = $rowMotorizado['nota'];
}

$queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id = $idCliente");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {

  $nombre_cliente             = rtrim($rowMotorizado['nombre_cliente']);
  $ciudad_cliente             = $rowMotorizado['ciudad_cliente'];

  $email            = $rowMotorizado['correo_cliente'];
  $direccion_cliente          = $rowMotorizado['direccion_cliente'];
  $telefono_cliente           = $rowMotorizado['telefono_cliente'];
  $whatsapp           = $rowMotorizado['whatsapp'];
}

$queryList = mysqli_query($conn3, "SELECT * FROM  abono where  numero_operacion = '$idOperacion' AND id='$idAbono' ");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
  $id = $rowMotorizado['id'];
  $numero_operacion = $rowMotorizado['numero_operacion'];
  $fecha = $rowMotorizado['fecha'];
  $hora = $rowMotorizado['hora'];
  $valor_abonado = $rowMotorizado['valor_abonado'];
}

$Moneda = funcionMaster($_SESSION['ID_principal'], 'ID_Usuario', 'moneda', 'config');

?>

<?php

$conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));

// echo '........' . $whatsapp;

$mensajeW = ' Sr(a) *' . $nombre_cliente . '* Se le ha generado una factura por el valor de : *' . number_format($totalNeto,2) . '* *' . $Moneda . '* por favor ver factura  en el siguiente link:  '.$Base.'imprimirFactura?idOperacion=' . $idOperacion . ' ';

if($tipo_envio=="odontograma"){
  $mensajeW = ' Sr(a) *' . $nombre_cliente . '* Se le ha generado una factura por el valor de : *' . number_format($totalNeto,2) . '* *' . $Moneda . '* por favor ver factura  en el siguiente link:  '.$Base.'OD_ImprimirFactura?idOperacion=' . $idOperacion . ' ';
}

$accion = 0;
Whatsapp_sent_cliente($linkkey, $whatsapp, $mensajeW, $idCliente, $usuario_id, $whatsapp, $accion);

/*
$mensajeW_Doctor = "Este es el mensaje enviado al paciente : ".$mensajeW;

$whatsapp="51990385933";

Whatsapp_sent_cliente($linkkey, $whatsapp, $mensajeW_Doctor, $idCliente, $usuario_id, $whatsapp, $accion);
*/
$_GET['receptor'] = $email;
$_GET['asunto'] = "Documento - {$tipo} ";
$_GET['mensaje'] = $mensajeW;
include 'plantillaCorreo.php';


$para = "$email";

// título
$titulo = 'Factura ';

// mensaje
$mensaje = ' Factura
                <html>
                <head>
                  <title> </title>
                    <body> 
                    
                               Hola buen dia señor(a) ' . $nombre_cliente . ', se le ha generado una factura por el valor de : *' . $totalNeto . '* *' . $Moneda . '* por favor ver factura  en el siguiente link:  '.$Base.'imprimirFactura.php?idOperacion=' . $idOperacion . '
              
          </div>
        

 
                           </p> 
                  
                <br/>
                 
                  
 
                <body>

                </body>
                </html>
                ';

// Para enviar un correo HTML, debe establecerse la cabecera Content-type
$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
// Cabeceras adicionales
$cabeceras .= 'To: sievensoft <noreply@medicalsoftplus.com>' . "\r\n";
$cabeceras .= 'From:  Receta Medica <noreply@medicalsoftplus.com>' . "\r\n";
$cabeceras .= 'Cc: noreply@medicalsoftplus.com' . "\r\n";
$cabeceras .= 'Bcc: noreply@medicalsoftplus.com' . "\r\n";

// Enviarlo
mail($para, $titulo, $mensaje, $cabeceras);


echo "<script language='Javascript'> window.location='SclienteAdministracion_Controlfacturas.php';</script>";


?> 