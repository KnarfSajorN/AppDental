<?php

include("funciones/conn3.php");
include("funciones/funciones.php");

    $idAbono = $_GET['idAbono'];

    $queryList = mysqli_query($conn3, "SELECT * FROM  abonoP where  id = '$idAbono' ");
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        $id = $rowMotorizado['id'];
        $idOperacion = $rowMotorizado['numero_operacion'];
        $numeroDoc = $rowMotorizado['numero_documento'];

        $MontoPagado = $rowMotorizado['valor_abonado'];
        $idCentroCosto = $rowMotorizado['idCentroCosto'];
        $usuario_id = $rowMotorizado['usuario_id'];
        $ID_Empresa = $rowMotorizado['ID_Empresa'];

        $idCuentaContableCXP = $rowMotorizado['idCuentaContableCXP'];
        $MetodoPago_id = $rowMotorizado['MetodoPago_id'];
    }



    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $queryList = mysqli_query($conn3, "SELECT max(id) as ultimo FROM CCompDiario where tipo_comprobante = 6");
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
    $numerocomprobante = "CxP-" . str_pad($actual, 6, "0", STR_PAD_LEFT);
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////


    mysqli_query($conn3, "INSERT INTO CCompDiario 
	(numero, fecha, tipo, estado, descripcion, monto_debe, monto_haber, cant_movimientos, detallada, idCuentaContable, idCentroCosto,tipo_comprobante,usuario_id, tercero_id, tipo_tercero)
	values 
	('$numerocomprobante','$fechaComprobante',0,0,'Pago Cuenta x Pagar Factura #{$numeroDoc}','$MontoPagado','$MontoPagado','2','','0','$idCentroCosto','6','$usuario_id', '$ID_Empresa', '2')") or die(mysqli_error($conn3));
    $ultimoCompDiarios = mysqli_insert_id($conn3);



    $resultado = mysqli_query($conn3, "SELECT * FROM sDetalleMetodosPagos WHERE id = $MetodoPago_id limit 1");
    while ($fila = mysqli_fetch_array($resultado)) {

    $Nombre_Pago = funcionMaster($fila['metodo_pago'],'id','Nombre','Medios_Pago');
    $CuentaContable_Pago = funcionMaster($fila['metodo_pago'],'id','idCuentaContable','Medios_Pago');

    }

    $idCuentaContable_debe = $CuentaContable_Pago;
    $NombreCuenta = funcionMaster($idCuentaContable_debe, 'id', 'descripcion', 'CCuentas');
    mysqli_query($conn3, "INSERT INTO CCompDiarioMov 
	(numero, fecha, tipo, estado, asiento, cuenta, id_ccosto, descripcion, monto_debe, monto_haber, referencia, idComprobante)
	values  
	('$numerocomprobante','$fechaComprobante',0,0,0,'$idCuentaContable_debe',0,'$NombreCuenta','0','$MontoPagado','$Nombre_Pago | Pago Cuentas x Pagar Factura #{$numeroDoc}','$ultimoCompDiarios')") or die(mysqli_error($conn3));




    $idCuentaContable_haber = $idCuentaContableCXP;
    $NombreCuenta = funcionMaster($idCuentaContable_haber, 'id', 'descripcion', 'CCuentas');
    mysqli_query($conn3, "INSERT INTO CCompDiarioMov 
	(numero, fecha, tipo, estado, asiento, cuenta, id_ccosto, descripcion, monto_debe, monto_haber, referencia, idComprobante)
	values  
	('$numerocomprobante','$fechaComprobante',0,0,0,'$idCuentaContable_haber',0,'$NombreCuenta','$MontoPagado','0','Cuentas x Pagar Factura #{$numeroDoc}','$ultimoCompDiarios')") or die(mysqli_error($conn3));


$Campo1 = mysqli_query($conn3, "show COLUMNS from abonoP WHERE Field = 'Comprobante_id';");
$nrowCampo1 = mysqli_num_rows($Campo1);
if ($nrowCampo1 == "0") {
	mysqli_query($conn3, "ALTER TABLE `abonoP` ADD `Comprobante_id` TEXT NULL DEFAULT '0' COMMENT 'id de la tabla CCompDiario *Creado desde CTB_RegistroMovimientosCXP*'");
}

mysqli_query($conn3,"UPDATE abonoP set  Comprobante_id='$ultimoCompDiarios' where id = '$idOperacion' limit 1");


echo "<script language='Javascript'> window.location='ImprimirAbonoP.php?idOperacion=$idOperacion&idAbono=$idAbono';</script>"; 

?>