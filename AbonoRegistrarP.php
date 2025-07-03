<?php

include("conexiones/conn3.php");
include("funciones/funciones.php");

$doctor                 = $_POST['ID'];
$clienteid             = $_POST['clienteId'];
$ID_Empresa             = $_POST['ID_Empresa'];

$fechar                = date("Y-m-d");
$hora                  = date("H:i:s");

$idOperacion = $_POST['idOperacion'];
$pago = $_POST['metodo_pago'];
$banco = $_POST['banco'];

$tarjeta = $_POST['tarjeta'];
$cuenta = $_POST['cuenta'];
$notas = $_POST['nota'];
$fecha_abono = $_POST['fecha_abono'];
$valor_abonar = $_POST['valor_abonar'];
$factura = funcionMaster($idOperacion, 'idOperacion', 'numeroDoc', 'sOperacionInv');
$monto_pagado_factura = funcionMaster($idOperacion, 'idOperacion', 'montoPagado', 'sOperacionInv');
$monto_total = funcionMaster($idOperacion, 'idOperacion', 'totalNeto', 'sOperacionInv');

$monto_faltante = $monto_pagado_factura - $monto_total;
$montoFinal = $monto_pagado_factura + $valor_abonar;
$montoPendienteFinal = $monto_faltante + $valor_abonar;


/////////////////////////// metodos de pago

$Campo1 = mysqli_query($conn3, "show COLUMNS from sDetalleMetodosPagos WHERE Field = 'Abono';");
$nrowCampo1 = mysqli_num_rows($Campo1);
if ($nrowCampo1 == "0") {
    mysqli_query($conn3, "ALTER TABLE `sDetalleMetodosPagos` ADD `Abono` TEXT NULL DEFAULT '0' COMMENT '0-> no es abono | 1-> abono cuenta por cobrar [factura] | 2-> abono cuenta por pagar [compras] *Creado desde modulo de AbonoRegistrarP*'");
}

$queryUsuario = "INSERT INTO sDetalleMetodosPagos 
                (idOperacion, fechaRegistro,id_usuario, id_cliente,metodo_pago,nota_pago,id_historia,tipo_historia,tipo,ID_Empresa, nOrden,Abono) 
                                      VALUES 
                ('$idOperacion','$fechar','$doctor', 
                '0','$pago','$valor_abonar','','','1','$ID_Empresa', '0','1');";


mysqli_query($conn3,$queryUsuario) or die(mysqli_error($conn3));
$MetodoPago_id = mysqli_insert_id($conn3);
////////////////////////////////////////////////////////////

$Campo1 = mysqli_query($conn3, "show COLUMNS from abonoP WHERE Field = 'MetodoPago_id';");
$nrowCampo1 = mysqli_num_rows($Campo1);
if ($nrowCampo1 == "0") {
    mysqli_query($conn3, "ALTER TABLE `abonoP` ADD `MetodoPago_id` INT(11) NULL DEFAULT '0' COMMENT 'id de la tabla sDetalleMetodosPagos *Creado desde modulo de AbonoRegistrarP*'");
}

//////////////////////////////////////////////////












mysqli_query($conn3, "insert INTO abonoP (fecha, hora, numero_operacion, numero_documento, usuario_id, cliente_id, valor_abonado,valor_anterior_factura,
valor_nuevo_factura,monto_faltante, pago, banco, tarjeta, cuenta, notas,fecha_abono,Activo,ID_Empresa,MetodoPago_id) VALUES ('$fechar' ,'$hora' ,'$idOperacion' ,'$factura' ,'$doctor' ,'$clienteid' ,'$valor_abonar','$monto_pagado_factura',
'$montoFinal','$montoPendienteFinal','$pago', '$banco', '$tarjeta','$cuenta', '$notas','$fecha_abono','1','$ID_Empresa','$MetodoPago_id')");

// echo "insert INTO abonoP (fecha, hora, numero_operacion, numero_documento, usuario_id, cliente_id, valor_abonado,valor_anterior_factura,
// valor_nuevo_factura,monto_faltante, pago, banco, tarjeta, cuenta, notas,fecha_abono,Activo,ID_Empresa) VALUES ('$fechar' ,'$hora' ,'$idOperacion' ,'$factura' ,'$doctor' ,
// '$clienteid' ,'$valor_abonar','$monto_pagado_factura','$montoFinal','$montoPendienteFinal','$pago', '$banco', '$tarjeta','$cuenta', '$notas','$fecha_abono','1','$ID_Empresa')";

$idAbono = mysqli_insert_id($conn3);





mysqli_query($conn3, "UPDATE sOperacionInv SET montoPagado='$montoFinal' WHERE idOperacion='$idOperacion' limit 1");

 

$QueryContabilidad = mysqli_query($conn3, "SELECT * FROM  Config_Contabilidad WHERE Activo = 1");
$NrowContabilidad = mysqli_num_rows($QueryContabilidad);
//if($NrowContabilidad>0 && $clienteid=='115'){
if($NrowContabilidad>0){
  //////////////////////////Contabilidad
  $Campo1 = mysqli_query($conn3, "show COLUMNS from abonoP WHERE Field = 'idCuentaContableCXP';");
  $nrowCampo1 = mysqli_num_rows($Campo1);if ($nrowCampo1 == "0") { mysqli_query($conn3, "ALTER TABLE `abonoP` ADD `idCuentaContableCXP` TEXT NULL DEFAULT '0' COMMENT '*Creado desde modulo de AbonoRegistrarP*'");}

  $Campo1 = mysqli_query($conn3, "show COLUMNS from abonoP WHERE Field = 'idCentroCosto';");
  $nrowCampo1 = mysqli_num_rows($Campo1);if ($nrowCampo1 == "0") {mysqli_query($conn3, "ALTER TABLE `abonoP` ADD `idCentroCosto` TEXT NULL DEFAULT '0' COMMENT '*Creado desde modulo de AbonoRegistrarP*'");}

  $idCuentaContableCXP = $_POST['idCuentaContableCXP'];
  if($idCuentaContableCXP==""){$idCuentaContableCXP="0";}

  $idCentroCosto = $_POST['idCentroCosto'];
  if($idCentroCosto==""){$idCentroCosto="0";}

  mysqli_query($conn3, "UPDATE abonoP set idCuentaContableCXP = '$idCuentaContableCXP',idCentroCosto='$idCentroCosto'  where id = $idAbono limit 1;");

  echo "<script language='Javascript'> window.location='CTB_RegistroMovimientosCXP.php?idAbono=$idAbono';</script>";

////////////////////////
}else{
  echo "<script language='Javascript'> window.location='ImprimirAbonoP.php?idOperacion=$idOperacion&idAbono=$idAbono';</script>";
}


  //echo "<script language='Javascript'> window.location='ImprimirAbonoP.php?idOperacion=$idOperacion&idAbono=$idAbono';</script>";
