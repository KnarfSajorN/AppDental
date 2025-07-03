<?php
date_default_timezone_set('America/Bogota');
include("conexiones/conexion.php");
include("funciones/conexiones.php");
include("funciones/funciones.php");


 


$detalleOdontograma = $_POST['detalleOdontograma'];
$parteDetalleog 	= $_POST['parteDetalleog'];
$idCliente 			= $_POST['idCliente'];
$idUsuario 			= $_POST['idUsuario'];
$servicioAplicado   = $_POST['servicioAplicado'];
$parteAplicada      = $_POST['parteAplicada'];

$parteAplicadaDetalleq = $parteAplicada;
 
    $query_ap=mysqli_query($conn3,"select * from odontogramaMasterHistoria where idCliente = $idCliente");
    $nrowl=mysqli_num_rows($query_ap);
    while($row_alp=mysqli_fetch_array($query_ap))
    {
    	$idPzaQuery = 'o'.$parteDetalleog;
          $parteAplicadaDetalle = explode(",", $row_alp[$idPzaQuery]);
    }

if ($parteAplicadaDetalle[0] == '') { $parteAplicadaDetalle[0] = '0';}
if ($parteAplicadaDetalle[1] == '') { $parteAplicadaDetalle[1] = '0';}
if ($parteAplicadaDetalle[2] == '') { $parteAplicadaDetalle[2] = '0';}
if ($parteAplicadaDetalle[3] == '') { $parteAplicadaDetalle[3] = '0';}
if ($parteAplicadaDetalle[4] == '') { $parteAplicadaDetalle[4] = '0';}
if ($parteAplicadaDetalle[5] == '') { $parteAplicadaDetalle[5] = '0';}
 
if ($parteAplicada == 0) 
{
$parteAplicada = $servicioAplicado.','.$servicioAplicado.','.$servicioAplicado.','.$servicioAplicado.','.$servicioAplicado.','.$servicioAplicado;
 
}

elseif ($parteAplicada == 1) 
{
$parteAplicada = $parteAplicadaDetalle[0].','.$servicioAplicado.','.$parteAplicadaDetalle[2].','.$parteAplicadaDetalle[3].','.$parteAplicadaDetalle[4].','.$parteAplicadaDetalle[5];	
}
elseif ($parteAplicada == 2) 
{
$parteAplicada = $parteAplicadaDetalle[0].','.$parteAplicadaDetalle[1].','.$servicioAplicado.','.$parteAplicadaDetalle[3].','.$parteAplicadaDetalle[4].','.$parteAplicadaDetalle[5];	
}
elseif ($parteAplicada == 3) 
{
$parteAplicada = $parteAplicadaDetalle[0].','.$parteAplicadaDetalle[1].','.$parteAplicadaDetalle[2].','.$servicioAplicado.','.$parteAplicadaDetalle[4].','.$parteAplicadaDetalle[5];	
}
elseif ($parteAplicada == 4) 
{
$parteAplicada = $parteAplicadaDetalle[0].','.$parteAplicadaDetalle[1].','.$parteAplicadaDetalle[2].','.$parteAplicadaDetalle[3].','.$servicioAplicado.','.$parteAplicadaDetalle[5];	
}
elseif ($parteAplicada == 5) 
{
$parteAplicada = $parteAplicadaDetalle[0].','.$parteAplicadaDetalle[1].','.$parteAplicadaDetalle[2].','.$parteAplicadaDetalle[3].','.$parteAplicadaDetalle[4].','.$servicioAplicado;	
}

mysqli_query($conn3,"update odontogramaMasterHistoria set $idPzaQuery = '$parteAplicada' where idCliente = $idCliente");
 
 
  

$fecha = date("Y-m-d");
$hora = date("h:i:s");


mysqli_query($conn3,"INSERT INTO odontogramaMasterDetalle 
	(fecha, hora, idUsuario, idCliente, idPza, detalle, tratamiento, parte, parteAplicadaDetalle) 
	VALUES 
	('$fecha', '$hora', '1', '$idCliente', '$parteDetalleog', '$detalleOdontograma', '$servicioAplicado', '$parteAplicada', $parteAplicadaDetalleq);");

 
echo '<font color ="green" size = "3"><strong>NUEVO detalle Grabado</strong>: '.$detalleOdontograma. ' '.$parteDetalleog.'</font><br>';
echo '<font color ="green" size = "3"><strong>Al finalizar solo debes de actualizar la paguina y ver el resultaod al final de la pantalla</font><br>';

 ?>

 