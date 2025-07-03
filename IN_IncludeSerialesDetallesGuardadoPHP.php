<?php
function AdjuntarDetalleId_Serial($Seriales,$Detalle_id,$SinvDep_id){
include 'funciones/conn3.php';
//////////////////////////////////////////////? Segunda parte del apartado de seriales //////////////////////////////////////////////

$Campo1 = mysqli_query($conn3, "show COLUMNS from SinvSerial WHERE Field = 'DetalleVenta_id';");
$nrowCampo1 = mysqli_num_rows($Campo1);if ($nrowCampo1 == "0") { mysqli_query($conn3, "ALTER TABLE `SinvSerial` ADD `DetalleVenta_id` INT(11) NULL DEFAULT '0' COMMENT 'si es diferente de 0 es que se vendio este serial y hace referencia a sDetalleOper *Creado desde modulo de Totalizar totalizarFactura.php*'");}


$ArregloSeriales = json_decode($Seriales,true);
foreach ($ArregloSeriales as $key => $value) {
$Serial_id = $value['id'];

//3-> producto Vendido
$queryList = mysqli_query($conn3, "UPDATE SinvSerial set Activo = 3, DetalleVenta_id = $Detalle_id where id = $Serial_id LIMIT 1");
}

//////////////////////////////////////////////? [FIN] Segunda parte del apartado de seriales //////////////////////////////////////////////
}

?>