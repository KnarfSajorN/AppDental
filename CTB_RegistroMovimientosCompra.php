<?php

include("funciones/conn3.php");
include("funciones/funciones.php");

$idOperacion = $_GET['idOperacion'];


////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$queryList = mysqli_query($conn3, "SELECT max(id) as ultimo FROM CCompDiario where tipo_comprobante = 2");
while ($row_recordset32 = mysqli_fetch_array($queryList)) {
  $ultimo = $row_recordset32['ultimo'];
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$queryList = mysqli_query($conn3, "SELECT numero FROM CCompDiario where id = $ultimo");
while ($row_recordset32 = mysqli_fetch_array($queryList)) {
  $ComprobanteNumero = $row_recordset32['numero'];
}
$Comprobante_array = explode("-", $ComprobanteNumero);
$valornumerico = (int)$Comprobante_array[1];
$actual = $valornumerico + 1;
////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$fechaComprobante = date("Y-m-d");
$numerocomprobante = "FC-" . str_pad($actual, 6, "0", STR_PAD_LEFT);
////////////////////////////////////////////





$Campo1 = mysqli_query($conn3, "show COLUMNS from CCompDiario WHERE Field = 'tipo_comprobante';");
$nrowCampo1 = mysqli_num_rows($Campo1);
if ($nrowCampo1 == "0") {
	mysqli_query($conn3, "ALTER TABLE `CCompDiario` ADD `tipo_comprobante` TEXT NULL DEFAULT '0' COMMENT '0-> comprobante | 1-> factura | 2-> compras | 3-> gastos y egresos | 4-> devoluciones | 5-> pago cuentas por cobrar | 6-> pagos cuenta por pagar *Creado desde Totalizar Factura*	'");
}
//////////////////
$Campo1 = mysqli_query($conn3, "show COLUMNS from CCompDiarioMov WHERE Field = 'detalle_id_factura';");
$nrowCampo1 = mysqli_num_rows($Campo1);
if ($nrowCampo1 == "0") {
	mysqli_query($conn3, "ALTER TABLE `CCompDiarioMov` ADD `detalle_id_factura` TEXT NULL DEFAULT '0' COMMENT 'solo es para facturas apuntara al id de la tabla con los detalles *Creado desde Totalizar Factura*'");
}


$QueryOperacion = mysqli_query($conn3, "SELECT * FROM  sOperacionInv where idOperacion = $idOperacion ");
while ($RowOperacion = mysqli_fetch_array($QueryOperacion)) {
    $ID_Empresa      = $RowOperacion['ID_Empresa'];//proveedor
    $idEmpresa      = $RowOperacion['idEmpresa'];//usuario

    $numeroFactura = $RowOperacion['numeroDoc'];

    $idCuentaContableCXP = $RowOperacion['idCuentaContableCXP'];//ajuntar movimiento cuenta x cobrar
    $idCentroCosto = $RowOperacion['idCentroCosto'];


    $sOperacion_TotalNeto = $RowOperacion['totalNeto'];
    $sOperacion_montoPagado = $RowOperacion['montoPagado'];
	$sOperacion_Retenciones = $RowOperacion['Retenciones'];
}








$queryList = mysqli_query($conn3, "SELECT * FROM  sDetalleOper where estado = 1 and id_usuario = $idEmpresa and  ID_Empresa = $ID_Empresa and idOperacion = $idOperacion ");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {

    


    //////////////////////////////////////////////

    $id = $rowMotorizado['id'];
    $idProducto = $rowMotorizado['idProducto'];
    $cantidad = $rowMotorizado['cantidad'];
    $subTotal = $rowMotorizado['subTotal'];
    $impuesto_monto = $rowMotorizado['Impuesto_Numerico'];
    $Total = $rowMotorizado['Total'];

    $idCuentaProducto = funcionMaster($idProducto,'ID','idCuentaContable','sinvetrios');
    $descripcion = mysqli_real_escape_string($conn3,$rowMotorizado['descripcion']);

    $CostoProductoUnitario = funcionMaster($idProducto,'ID','costo','sinvetrios');
    $CostoProductoTotal = round($CostoProductoUnitario*$cantidad,2);

    $ArregloCosto["$id"]["cuenta"]=$idCuentaProducto;
	$ArregloCosto["$id"]["descripcion"]=$descripcion;
	$ArregloCosto["$id"]["monto_debe"]=$subTotal;
	$ArregloCosto["$id"]["monto_haber"]=0;
	$ArregloCosto["$id"]["referencia"]="Costo: {$descripcion} | Cant: {$cantidad} Factura # {$numeroFactura}";
    $ArregloCosto["$id"]["detalle"]=$id;



    $Iva_id = funcionMaster($idProducto,'ID','Iva_id','sinvetrios');
    if($Iva_id!="0"){

        

        $CuentaIva = funcionMaster($Iva_id,'id','idCuentaContable','Siva');
        $CodigoIvaProducto = funcionMaster($Iva_id,'id','valor','Siva');
        $NombreIvaProducto = funcionMaster($Iva_id,'id','nombre','Siva');

        $ArregloIVA["$Iva_id"]["cuenta"]=$CuentaIva;
        $ArregloIVA["$Iva_id"]["descripcion"]="IVA $CodigoIvaProducto";
        $ArregloIVA["$Iva_id"]["monto_debe"]=round($ArregloIVA["$Iva_id"]["monto_debe"]+$impuesto_monto,2);
        $ArregloIVA["$Iva_id"]["monto_haber"]=0;
        $ArregloIVA["$Iva_id"]["referencia"]="IVA [$CodigoIvaProducto] - {$NombreIvaProducto} | Factura # {$numeroFactura}";
    }

    //////////////////////////////////////////////////////////////////////////////////////////
	$MontoTotalSinImpuesto = $MontoTotalSinImpuesto+$subTotal;
	$MontoTotalSoloImpuesto = $MontoTotalSoloImpuesto+$impuesto_monto;
	$MontoTotalFinal = $MontoTotalFinal+$Total;
    

}



$SumGeneral = round($MontoTotalFinal,2);//la suma el precio base + impuesto + costo

$MontoTotalSinImpuesto = round($MontoTotalSinImpuesto,2);
$MontoTotalSoloImpuesto = round($MontoTotalSoloImpuesto,2);


//////////////////////////////////////////////////////////////////////////////////////

$resultado = mysqli_query($conn3, "SELECT * FROM sDetalleMetodosPagos WHERE idOperacion = $idOperacion");
while ($fila = mysqli_fetch_array($resultado)) {
$Valor_Pago = $fila['nota_pago'];
$MetodoPago_id = $fila['metodo_pago'];
$Nombre_Pago = funcionMaster($fila['metodo_pago'],'id','Nombre','Medios_Pago');
$CuentaContable_Pago = funcionMaster($fila['metodo_pago'],'id','idCuentaContable','Medios_Pago');

        $ArregloMetodosPago["$MetodoPago_id"]["cuenta"]=$CuentaContable_Pago;
        $ArregloMetodosPago["$MetodoPago_id"]["descripcion"]="$Nombre_Pago";
        $ArregloMetodosPago["$MetodoPago_id"]["monto_debe"]="0";
        $ArregloMetodosPago["$MetodoPago_id"]["monto_haber"]=round($ArregloMetodosPago["$MetodoPago_id"]["monto_haber"]+$Valor_Pago,2);
        $ArregloMetodosPago["$MetodoPago_id"]["referencia"]=" $Nombre_Pago | Monto Pago Factura #{$numeroFactura}";
        $ArregloMetodosPago["$MetodoPago_id"]["detalle"]="0";

}


///////////////////////////////////////////////////////////////////////////////////

$resultado = mysqli_query($conn3, "SELECT * FROM DetalleRetenciones WHERE idOperacion = $idOperacion AND Activo = 2");
while ($fila = mysqli_fetch_array($resultado)) {

$Retencion_id = $fila['id'];	
$TipoRetencion = $fila['TipoRetencion'];
$MontoRetencion = $fila['MontoRetencion'];
$Nombre_Retencion = funcionMaster($TipoRetencion,'id','Nombre','Retenciones');
$CuentaContable_Retencion = funcionMaster($TipoRetencion,'id','idCuentaContable','Retenciones');
$Porcentaje_Retencion = funcionMaster($TipoRetencion,'id','Porcentaje','Retenciones');

        $ArregloRetenciones["$Retencion_id"]["cuenta"]=$CuentaContable_Retencion;
        $ArregloRetenciones["$Retencion_id"]["descripcion"]="$Nombre_Retencion";
        
        $ArregloRetenciones["$Retencion_id"]["monto_debe"]="0";
        $ArregloRetenciones["$Retencion_id"]["monto_haber"]=round($ArregloRetenciones["$Retencion_id"]["monto_haber"]+$MontoRetencion,2);
        $ArregloRetenciones["$Retencion_id"]["referencia"]=" $Nombre_Retencion %{$Porcentaje_Retencion} | Retencion Factura #{$numeroFactura}";
        $ArregloRetenciones["$Retencion_id"]["detalle"]="0";

}



/////////////////////////////////////////////////////////////////////////////////////////


//cuenta el tamaño de cada arreglo
$Movimientos = count($ArregloCosto);
$Movimientos = $Movimientos + count($ArregloIVA);
$Movimientos = $Movimientos + count($ArregloMetodosPago);
$Movimientos = $Movimientos + count($ArregloRetenciones);
///////////////////////////////
if($idCuentaContableCXP!="0"){
	$Movimientos = $Movimientos+1;
}
/*
if($montoPagado!="0"){
	$Movimientos = $Movimientos+1;
}
*/
//////////////////////////////

mysqli_query($conn3,"INSERT INTO CCompDiario 
	(numero, fecha, tipo, estado, descripcion, monto_debe, monto_haber, cant_movimientos, detallada, idCuentaContable, idCentroCosto,tipo_comprobante,usuario_id, tercero_id, tipo_tercero)
	values 
	('$numerocomprobante','$fechaComprobante',0,0,'Factura #{$numeroFactura}','$SumGeneral','$SumGeneral','$Movimientos','','0','$idCentroCosto','2','$idEmpresa', '$ID_Empresa', '2')") or die(mysqli_error($conn3));
$ultimoCompDiarios = mysqli_insert_id($conn3);


//////////////////////////////////////////////////////////////

//Costo Productos
foreach ($ArregloCosto as $key => $value) {

	$cuenta_arreglo = $value["cuenta"];
	$descripcion_arreglo = $value["descripcion"];
	$debe_arreglo = $value["monto_debe"]; // trae 0
	$haber_arreglo = $value["monto_haber"];
	$referencia_arreglo = $value["referencia"];
	$detalle = $value["detalle"];

	mysqli_query($conn3,"INSERT INTO CCompDiarioMov  (numero, fecha, tipo, estado, asiento, cuenta, id_ccosto, descripcion, monto_debe, monto_haber, referencia, idComprobante,detalle_id_compra) values  
	('$numerocomprobante','$fechaComprobante',0,0,0,'$cuenta_arreglo',0,'$descripcion_arreglo','$debe_arreglo','$haber_arreglo','$referencia_arreglo','$ultimoCompDiarios','$detalle')") or die(mysqli_error($conn3));
	
}


// Cuentas Iva [si llegan a aplicar]
foreach ($ArregloIVA as $key => $value) {

	$cuenta_arreglo = $value["cuenta"];
	$descripcion_arreglo = $value["descripcion"];
	$debe_arreglo = $value["monto_debe"]; //trae 0
	$haber_arreglo = $value["monto_haber"];
	$referencia_arreglo = $value["referencia"];

	mysqli_query($conn3,"INSERT INTO CCompDiarioMov  (numero, fecha, tipo, estado, asiento, cuenta, id_ccosto, descripcion, monto_debe, monto_haber, referencia, idComprobante) values  
	('$numerocomprobante','$fechaComprobante',0,0,0,'$cuenta_arreglo',0,'$descripcion_arreglo','$debe_arreglo','$haber_arreglo','$referencia_arreglo','$ultimoCompDiarios')") or die(mysqli_error($conn3));
	
}



//Metodos de Pago 
foreach ($ArregloMetodosPago as $key => $value) {

	$cuenta_arreglo = $value["cuenta"];
	$descripcion_arreglo = $value["descripcion"];
	$debe_arreglo = $value["monto_debe"]; // trae 0
	$haber_arreglo = $value["monto_haber"];
	$referencia_arreglo = $value["referencia"];
	$detalle = $value["detalle"];

	mysqli_query($conn3,"INSERT INTO CCompDiarioMov  (numero, fecha, tipo, estado, asiento, cuenta, id_ccosto, descripcion, monto_debe, monto_haber, referencia, idComprobante,detalle_id_compra) values  
	('$numerocomprobante','$fechaComprobante',0,0,0,'$cuenta_arreglo',0,'$descripcion_arreglo','$debe_arreglo','$haber_arreglo','$referencia_arreglo','$ultimoCompDiarios','$detalle')") or die(mysqli_error($conn3));
	
}



//Retenciones
foreach ($ArregloRetenciones as $key => $value) {

	$cuenta_arreglo = $value["cuenta"];
	$descripcion_arreglo = $value["descripcion"];
	$debe_arreglo = $value["monto_debe"]; // trae 0
	$haber_arreglo = $value["monto_haber"];
	$referencia_arreglo = $value["referencia"];
	$detalle = $value["detalle"];

	mysqli_query($conn3,"INSERT INTO CCompDiarioMov  (numero, fecha, tipo, estado, asiento, cuenta, id_ccosto, descripcion, monto_debe, monto_haber, referencia, idComprobante,detalle_id_compra) values  
	('$numerocomprobante','$fechaComprobante',0,0,0,'$cuenta_arreglo',0,'$descripcion_arreglo','$debe_arreglo','$haber_arreglo','$referencia_arreglo','$ultimoCompDiarios','$detalle')") or die(mysqli_error($conn3));
	
}




if($idCuentaContableCXP!="0"){
	$NombreCuentaXPagar = funcionMaster($idCuentaContableCXP,'id','descripcion','CCuentas');
	$monto_haber_final = round($sOperacion_TotalNeto - $sOperacion_montoPagado - $sOperacion_Retenciones	,2);

	mysqli_query($conn3,"INSERT INTO CCompDiarioMov 
	(numero, fecha, tipo, estado, asiento, cuenta, id_ccosto, descripcion, monto_debe, monto_haber, referencia, idComprobante)
	values  
	('$numerocomprobante','$fechaComprobante',0,0,0,'$idCuentaContableCXP',0,'$NombreCuentaXPagar','0','$monto_haber_final','Cuenta por Cobrar Factura #{$numeroFactura}','$ultimoCompDiarios')") or die(mysqli_error($conn3));
}

$Campo1 = mysqli_query($conn3, "show COLUMNS from sOperacionInv WHERE Field = 'Comprobante_id';");
$nrowCampo1 = mysqli_num_rows($Campo1);
if ($nrowCampo1 == "0") {
	mysqli_query($conn3, "ALTER TABLE `sOperacionInv` ADD `Comprobante_id` TEXT NULL DEFAULT '0' COMMENT 'solo es para facturas apuntara al id de la tabla con los detalles *Creado desde Totalizar Factura*'");
}

mysqli_query($conn3,"UPDATE sOperacionInv set  Comprobante_id='$ultimoCompDiarios' where idOperacion = '$idOperacion' limit 1");


echo "<script language='Javascript'> window.location='preliminarOrden.php?idOperacion=$idOperacion';</script>";
