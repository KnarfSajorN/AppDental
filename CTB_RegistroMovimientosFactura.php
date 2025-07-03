<?php

include("funciones/conn3.php");
include("funciones/funciones.php");

$idOperacion = $_GET['idOperacion'];

////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$queryList=mysqli_query($conn3,"SELECT max(id) as ultimo FROM CCompDiario where tipo_comprobante = 1");
while($row_recordset32=mysqli_fetch_array($queryList)){$ultimo=$row_recordset32['ultimo'];}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$queryList=mysqli_query($conn3,"SELECT numero FROM CCompDiario where id = $ultimo");
while($row_recordset32=mysqli_fetch_array($queryList)){$ComprobanteNumero=$row_recordset32['numero'];}
$Comprobante_array = explode("-", $ComprobanteNumero);
$valornumerico = (int)$Comprobante_array[1];
$actual=$valornumerico+1;
////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$fechaComprobante=date("Y-m-d");
$numerocomprobante="FV-".str_pad($actual, 6, "0", STR_PAD_LEFT);

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
    $idCliente      = $RowOperacion['idCliente'];
    $idEmpresa      = $RowOperacion['idEmpresa'];

    $numeroFactura = $RowOperacion['numeroDoc'];

    $idCuentaContable_cuentaporcobrar = $RowOperacion['idCuentaContableCXC'];//ajuntar movimiento cuenta x cobrar
    $idCentroCosto = $RowOperacion['idCentroCosto'];


    $sOperacion_TotalNeto = $RowOperacion['totalNeto'];
    $sOperacion_montoPagado = $RowOperacion['montoPagado'];
}





$queryList = mysqli_query($conn3, "SELECT * FROM  sDetalleOper where estado = 1 and id_usuario = $idEmpresa and  id_cliente = $idCliente and idOperacion = $idOperacion ");
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
	$ArregloCosto["$id"]["monto_debe"]=0;
	$ArregloCosto["$id"]["monto_haber"]=$CostoProductoTotal;
	$ArregloCosto["$id"]["referencia"]="Costo: {$descripcion} | Cant: {$cantidad} Factura # {$numeroFactura}";
    $ArregloCosto["$id"]["detalle"]=$id;



    $Iva_id = funcionMaster($idProducto,'ID','Iva_id','sinvetrios');
    if($Iva_id!="0"){

        

        $CuentaIva = funcionMaster($Iva_id,'id','idCuentaContable','Siva');
        $CodigoIvaProducto = funcionMaster($Iva_id,'id','valor','Siva');
        $NombreIvaProducto = funcionMaster($Iva_id,'id','nombre','Siva');

        $ArregloIVA["$Iva_id"]["cuenta"]=$CuentaIva;
        $ArregloIVA["$Iva_id"]["descripcion"]="IVA $CodigoIvaProducto";
        $ArregloIVA["$Iva_id"]["monto_debe"]=0;
        $ArregloIVA["$Iva_id"]["monto_haber"]=round($ArregloIVA["$Iva_id"]["monto_haber"]+$impuesto_monto,2);
        $ArregloIVA["$Iva_id"]["referencia"]="IVA [$CodigoIvaProducto] - {$NombreIvaProducto} | Factura # {$numeroFactura}";
    }

    //////////////////////////////////////////////////////////////////////////////////////////
	$MontoTotalSinImpuesto = $MontoTotalSinImpuesto+$subTotal;
	$MontoTotalSoloImpuesto = $MontoTotalSoloImpuesto+$impuesto_monto;
	$MontoTotalCosto = $MontoTotalCosto+$CostoProductoTotal;
    

}



$SumGeneral = round($MontoTotalSinImpuesto+$MontoTotalSoloImpuesto+$MontoTotalCosto,2);//la suma el precio base + impuesto + costo

$MontoTotalSinImpuesto = round($MontoTotalSinImpuesto,2);
$MontoTotalSoloImpuesto = round($MontoTotalSoloImpuesto,2);
$MontoTotalCosto = round($MontoTotalCosto,2);

/////////////////COMPROBANTES /////////////////////////////////////////////////////////


$CuentaVenta  = funcionMaster('1', 'id', 'idCuentaContable', 'CuentaPredeterminadaVenta');
$NombreCuentaVenta  = funcionMaster($CuentaVenta, 'id', 'descripcion', 'CCuentas');
$ArregloCuentaVenta["1"]["cuenta"] = $CuentaVenta;
$ArregloCuentaVenta["1"]["descripcion"] = $NombreCuentaVenta;
$ArregloCuentaVenta["1"]["monto_debe"] = 0;
$ArregloCuentaVenta["1"]["monto_haber"] = $MontoTotalSinImpuesto;
$ArregloCuentaVenta["1"]["referencia"] = " Cuenta Ventas Factura # {$numeroFactura}";


$CuentaCosto  = funcionMaster('1', 'id', 'idCuentaContable', 'CuentaPredeterminadaCosto');
$NombreCuentaCosto  = funcionMaster($CuentaCosto, 'id', 'descripcion', 'CCuentas');
$ArregloCuentaCosto["1"]["cuenta"] = $CuentaCosto;
$ArregloCuentaCosto["1"]["descripcion"] = $NombreCuentaCosto;
$ArregloCuentaCosto["1"]["monto_debe"] = $MontoTotalCosto;
$ArregloCuentaCosto["1"]["monto_haber"] = 0;
$ArregloCuentaCosto["1"]["referencia"] = " Cuenta Costo Factura # {$numeroFactura}";


///////////////////////////////////////////////////////////////////////////////////


$resultado = mysqli_query($conn3, "SELECT * FROM sDetalleMetodosPagos WHERE idOperacion = $idOperacion");
$totalMet = 0;
while ($fila = mysqli_fetch_array($resultado)) {
$Numero++;
$Valor_Pago = $fila['nota_pago'];
$MetodoPago_id = $fila['metodo_pago'];
$Nombre_Pago = funcionMaster($fila['metodo_pago'],'id','Nombre','Medios_Pago');
$CuentaContable_Pago = funcionMaster($fila['metodo_pago'],'id','idCuentaContable','Medios_Pago');

        $ArregloMetodosPago["$MetodoPago_id"]["cuenta"]=$CuentaContable_Pago;
        $ArregloMetodosPago["$MetodoPago_id"]["descripcion"]="$Nombre_Pago";
        $ArregloMetodosPago["$MetodoPago_id"]["monto_debe"]=round($ArregloMetodosPago["$MetodoPago_id"]["monto_debe"]+$Valor_Pago,2);
        $ArregloMetodosPago["$MetodoPago_id"]["monto_haber"]="0";
        $ArregloMetodosPago["$MetodoPago_id"]["referencia"]=" $Nombre_Pago | Monto Pago Factura #{$numeroFactura}";
        $ArregloMetodosPago["$MetodoPago_id"]["detalle"]="0";

}


///////////////////////////////////////////////////////////////////////////////////


//cuenta el tamaño de cada arreglo
$Movimientos = count($ArregloCosto);
$Movimientos = $Movimientos + count($ArregloIVA);
$Movimientos = $Movimientos + count($ArregloCuentaVenta);
$Movimientos = $Movimientos + count($ArregloCuentaCosto);
$Movimientos = $Movimientos + count($ArregloMetodosPago);
///////////////////////////////
if($idCuentaContable_cuentaporcobrar!="0"){
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
	('$numerocomprobante','$fechaComprobante',0,0,'Factura #{$numeroFactura}','$SumGeneral','$SumGeneral','$Movimientos','','0','$idCentroCosto','1','$idEmpresa', '$idCliente', '1')") or die(mysqli_error($conn3));
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

	mysqli_query($conn3,"INSERT INTO CCompDiarioMov  (numero, fecha, tipo, estado, asiento, cuenta, id_ccosto, descripcion, monto_debe, monto_haber, referencia, idComprobante,detalle_id_factura) values  
	('$numerocomprobante','$fechaComprobante',0,0,0,'$cuenta_arreglo',0,'$descripcion_arreglo','$debe_arreglo','$haber_arreglo','$referencia_arreglo','$ultimoCompDiarios','$detalle')") or die(mysqli_error($conn3));
	
}

//Cuenta Costo
foreach ($ArregloCuentaCosto as $key => $value) {

	$cuenta_arreglo = $value["cuenta"];
	$descripcion_arreglo = $value["descripcion"];
	$debe_arreglo = $value["monto_debe"]; 
	$haber_arreglo = $value["monto_haber"]; //trae 0
	$referencia_arreglo = $value["referencia"];

	mysqli_query($conn3,"INSERT INTO CCompDiarioMov  (numero, fecha, tipo, estado, asiento, cuenta, id_ccosto, descripcion, monto_debe, monto_haber, referencia, idComprobante) values  
	('$numerocomprobante','$fechaComprobante',0,0,0,'$cuenta_arreglo',0,'$descripcion_arreglo','$debe_arreglo','$haber_arreglo','$referencia_arreglo','$ultimoCompDiarios')") or die(mysqli_error($conn3));
	
	$idCuentaCosto = $value["cuenta"];
}

//////////////////////////////////////////////////////////

// Cuenta Venta
foreach ($ArregloCuentaVenta as $key => $value) {

	$cuenta_arreglo = $value["cuenta"];
	$descripcion_arreglo = $value["descripcion"];
	$debe_arreglo = $value["monto_debe"]; //trae 0
	$haber_arreglo = $value["monto_haber"];
	$referencia_arreglo = $value["referencia"];

	mysqli_query($conn3,"INSERT INTO CCompDiarioMov  (numero, fecha, tipo, estado, asiento, cuenta, id_ccosto, descripcion, monto_debe, monto_haber, referencia, idComprobante) values  
	('$numerocomprobante','$fechaComprobante',0,0,0,'$cuenta_arreglo',0,'$descripcion_arreglo','$debe_arreglo','$haber_arreglo','$referencia_arreglo','$ultimoCompDiarios')") or die(mysqli_error($conn3));
	
	$idCuentaVenta = $value["cuenta"];
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



//Costo Productos
foreach ($ArregloMetodosPago as $key => $value) {

	$cuenta_arreglo = $value["cuenta"];
	$descripcion_arreglo = $value["descripcion"];
	$debe_arreglo = $value["monto_debe"]; // trae 0
	$haber_arreglo = $value["monto_haber"];
	$referencia_arreglo = $value["referencia"];
	$detalle = $value["detalle"];

	mysqli_query($conn3,"INSERT INTO CCompDiarioMov  (numero, fecha, tipo, estado, asiento, cuenta, id_ccosto, descripcion, monto_debe, monto_haber, referencia, idComprobante,detalle_id_factura) values  
	('$numerocomprobante','$fechaComprobante',0,0,0,'$cuenta_arreglo',0,'$descripcion_arreglo','$debe_arreglo','$haber_arreglo','$referencia_arreglo','$ultimoCompDiarios','$detalle')") or die(mysqli_error($conn3));
	
}


if($idCuentaContable_cuentaporcobrar!="0"){
	$NombreCuentaXCobrar = funcionMaster($idCuentaContable_cuentaporcobrar,'id','descripcion','CCuentas');
	$monto_debe_finalxcobrar = round($sOperacion_TotalNeto - $sOperacion_montoPagado,2);

	mysqli_query($conn3,"INSERT INTO CCompDiarioMov 
	(numero, fecha, tipo, estado, asiento, cuenta, id_ccosto, descripcion, monto_debe, monto_haber, referencia, idComprobante)
	values  
	('$numerocomprobante','$fechaComprobante',0,0,0,'$idCuentaContable_cuentaporcobrar',0,'$NombreCuentaXCobrar','$monto_debe_finalxcobrar','0','Cuenta por Cobrar Factura #{$numeroFactura}','$ultimoCompDiarios')") or die(mysqli_error($conn3));
}

$Campo1 = mysqli_query($conn3, "show COLUMNS from sOperacionInv WHERE Field = 'Comprobante_id';");
$nrowCampo1 = mysqli_num_rows($Campo1);
if ($nrowCampo1 == "0") {
	mysqli_query($conn3, "ALTER TABLE `sOperacionInv` ADD `Comprobante_id` TEXT NULL DEFAULT '0' COMMENT 'solo es para facturas apuntara al id de la tabla con los detalles *Creado desde Totalizar Factura*'");
}

mysqli_query($conn3,"UPDATE sOperacionInv set  Comprobante_id='$ultimoCompDiarios' where idOperacion = '$idOperacion' limit 1");


echo "<script language='Javascript'> window.location='preliminarFactura?idOperacion=$idOperacion';</script>";
