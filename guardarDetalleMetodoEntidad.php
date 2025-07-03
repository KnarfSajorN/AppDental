<?php
date_default_timezone_set('America/Bogota');

include("funciones/conn3.php");
include("funciones/funciones.php");

$Campo1 = mysqli_query($conn3, "show COLUMNS from sDetalleMetodosPagos WHERE Field = 'convenio_id';");
$nrowCampo1 = mysqli_num_rows($Campo1);
if ($nrowCampo1 == "0") {
  mysqli_query($conn3, "ALTER TABLE `sDetalleMetodosPagos` ADD `convenio_id` INT(11) NULL DEFAULT '0'  COMMENT ' id del convenio solo aplica para facturacion entidad *Creado desde modulo de factura_entidad*';");
}


// datos del cliente y usuario

$fechaRegistro           = date("Y-m-d H:i:s");
$idOperacion             = 0;
$id_usuario              = $_POST['id_usuario'];
$id_cliente              = $_POST['id_cliente'];
$metodo_pago              = $_POST['metodo_pago'];
$nota_pago              = $_POST['nota_pago'];
$historia  = $_POST['historia'];
$tipo_historia = $_POST['tipo_historia'];
$tipo = $_POST['tipo'];
$ID_Empresa = $_POST['ID_Empresa'];

$nOrden = 0 + $_POST['nOrden'];

if($id_cliente==""){
    $id_cliente=0;
}

$convenio_id = $_POST['convenio_id'];





$queryUsuario = "INSERT INTO sDetalleMetodosPagos 
                    (idOperacion, fechaRegistro,id_usuario, id_cliente,metodo_pago,nota_pago,id_historia,tipo_historia,tipo,ID_Empresa, nOrden,convenio_id) 
                                          VALUES 
                    ('$idOperacion','$fechaRegistro','$id_usuario', 
                    '$id_cliente','$metodo_pago','$nota_pago','$historia','$tipo_historia','$tipo','$ID_Empresa', '$nOrden','$convenio_id');";




mysqli_query($conn3,$queryUsuario) or die(mysqli_error($conn3));


    echo "<script language='Javascript'> 
    var rutaPaginaAnterior = document.referrer;
    window.location.href = rutaPaginaAnterior;
    </script>";

