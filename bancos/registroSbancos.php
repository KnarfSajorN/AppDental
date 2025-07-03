<?php 
date_default_timezone_set('America/Bogota');
include("../funciones/funciones.php");

$date=date("Y-m-d");

$nCuenta=$_POST['nCuenta'];
$descripcion=$_POST['descripcion'];
$tipo=$_POST['tipo'];
$descripcionDetalle=$_POST['descripcionDetalle'];
$sucursal=$_POST['sucursal'];
$contacto=$_POST['contacto'];
$direccion=$_POST['direccion'];
$moneda=$_POST['moneda'];
$telefono=$_POST['telefono'];
$fax=$_POST['fax'];
$email=$_POST['email'];

$saldoIncial=$_POST['saldoIncial'];
$fechaUC=$_POST['fechaUC'];

$usuario_id =$_POST['usuario_id'];
// cuenta contable y centro
if ($_POST['idCentroCosto']<>'') {
	$idCentroCosto =$_POST['idCentroCosto'];
}else{
	$idCentroCosto=0;
}

if ($_POST['idCuentaContable']<>'') {
	$idCuentaContable =$_POST['idCuentaContable'];
}else{
	$idCuentaContable=0;
}

if ($_POST['cuenta_debe']<>'') {
	$cuenta_debe =$_POST['cuenta_debe'];
}else{
	$cuenta_debe=0;
}
// cuenta contable y centro

$Campo1 = mysqli_query($conn3, "show COLUMNS from Sbancos WHERE Field = 'idCuentaContableDebe';");
$nrowCampo1 = mysqli_num_rows($Campo1);
if ($nrowCampo1 == "0") {
	mysqli_query($conn3, "ALTER TABLE `Sbancos` ADD `idCuentaContableDebe` TEXT NULL DEFAULT '0' COMMENT ' Cuenta Contable DEBE *Creado desde Guardar Bancos*'");
}
//////////////////////////////////////////////////////////////////////////////////////////////////
$Campo1 = mysqli_query($conn3, "show COLUMNS from Sbancos WHERE Field = 'usuario_id';");
$nrowCampo1 = mysqli_num_rows($Campo1);
if ($nrowCampo1 == "0") {
	mysqli_query($conn3, "ALTER TABLE `Sbancos` ADD `usuario_id` TEXT NULL DEFAULT '0' COMMENT ' usuario id *Creado desde Guardar Bancos*'");
}
$Campo1 = mysqli_query($conn3, "show COLUMNS from Stransbanco WHERE Field = 'usuario_id';");
$nrowCampo1 = mysqli_num_rows($Campo1);
if ($nrowCampo1 == "0") {
	mysqli_query($conn3, "ALTER TABLE `Stransbanco` ADD `usuario_id` TEXT NULL DEFAULT '0' COMMENT ' usuario id *Creado desde Guardar Bancos*'");
}
///////////////////////////////////////////////////////////////////////////////////////////////////
$Campo1 = mysqli_query($conn3, "show COLUMNS from Stransbanco WHERE Field = 'Movimiento_id';");
$nrowCampo1 = mysqli_num_rows($Campo1);
if ($nrowCampo1 == "0") {
	mysqli_query($conn3, "ALTER TABLE `Stransbanco` ADD `Movimiento_id` TEXT NULL DEFAULT '0' COMMENT ' id de la tabla CCompDiario *Creado desde Guardar Bancos*'");
}


$Campo1 = mysqli_query($conn3, "show COLUMNS from Stransbanco WHERE Field = 'DetalleMovimiento';");
$nrowCampo1 = mysqli_num_rows($Campo1);
if ($nrowCampo1 == "0") {
	mysqli_query($conn3, "ALTER TABLE `Stransbanco` ADD `DetalleMovimiento` TEXT NULL DEFAULT '' COMMENT '   *Creado desde Guardar Bancos*'");
}

$Campo1 = mysqli_query($conn3, "show COLUMNS from Stransbanco WHERE Field = 'Conciliado';");
$nrowCampo1 = mysqli_num_rows($Campo1);
if ($nrowCampo1 == "0") {
	mysqli_query($conn3, "ALTER TABLE `Stransbanco` ADD `Conciliado` TEXT NULL DEFAULT '0' COMMENT '0-> no conciliado, 1-> conciliado*Creado desde Guardar Bancos*'");
}

$Campo1 = mysqli_query($conn3, "show COLUMNS from Stransbanco WHERE Field = 'conciliacion_id';");
$nrowCampo1 = mysqli_num_rows($Campo1);
if ($nrowCampo1 == "0") {
	mysqli_query($conn3, "ALTER TABLE `Stransbanco` ADD `conciliacion_id` TEXT NULL DEFAULT '0' COMMENT 'id de la tabla Stransbanco_Conciliado *Creado desde Guardar Bancos*'");
}
///////////////////////////////////////////////////////////////////////////////////////////////////
$Campo1 = mysqli_query($conn3, "show COLUMNS from Stransbanco WHERE Field = 'historial_tipopago_id';");
$nrowCampo1 = mysqli_num_rows($Campo1);
if ($nrowCampo1 == "0") {
	mysqli_query($conn3, "ALTER TABLE `Stransbanco` ADD `historial_tipopago_id` TEXT NULL DEFAULT '' COMMENT ' id de la tabla de tipos de pagos, en el campo tabla_tipopago se filtraran por 3 tablas descritas ahi en los comentarios *Creado desde Guardar Bancos*'");
}
$Campo1 = mysqli_query($conn3, "show COLUMNS from Stransbanco WHERE Field = 'tabla_tipopago';");
$nrowCampo1 = mysqli_num_rows($Campo1);
if ($nrowCampo1 == "0") {
	mysqli_query($conn3, "ALTER TABLE `Stransbanco` ADD `tabla_tipopago` TEXT NULL DEFAULT '' COMMENT '1-> Tabla historialTipos | 2-> historialTipos_Compras | 3-> historialTipos_GastosEgresos *Creado desde Guardar Bancos*'");
}
////////////////////////////////////////////////////////////////////////////////////////////////////




	$tabla = mysqli_query($conn3, "SHOW TABLES LIKE 'StransbancoDetalles'");
    $nrowtabla = mysqli_num_rows($tabla);
    if ($nrowtabla == 0) {

        $query = "CREATE TABLE `StransbancoDetalles` (
        `id` int(11) NOT NULL,
		`Stransbanco_id` int(11) NOT NULL,
        `usuario_id` int(11) NOT NULL,
		`cliente_id` text NULL DEFAULT '',
        `idCuentaContable` text NULL DEFAULT '',
		`Debe` text NULL DEFAULT '',
		`Haber` text NULL DEFAULT '',
		`Tipo` text NULL DEFAULT '' COMMENT '0->tipo banco | 1-> demas conceptos',
		`Concepto` text NULL DEFAULT '' COMMENT 'id de la tabla ConceptosBanco',
		`Fecha` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
        `Creacion_Dinamica` text DEFAULT '',
        `Activo` varchar(5) DEFAULT '1'
        ) ENGINE=MyISAM DEFAULT CHARSET=latin1;";

        $creaciontabla = mysqli_query($conn3, $query);
        if (!$creaciontabla) {
            echo "<script language='Javascript'> alert('error en la creacion de la tabla');</script>";
        } else {
            mysqli_query($conn3, "ALTER TABLE `StransbancoDetalles` ADD PRIMARY KEY (`id`);");
            mysqli_query($conn3, "ALTER TABLE `StransbancoDetalles` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;");
        }
    }

///////////////////////////////////////////////////////////////////////////////////////////////////////

echo "Registro Banco<br>";

mysqli_query($conn3,"INSERT into Sbancos 
	(fechaReg, nCuenta, descripcion, tipo, descripcionDetalle, sucursal, contacto, direccion, moneda, telefono, fax, email, idCuentaContable, idCentroCosto, idCuentaContableDebe, usuario_id)
	values 
	('$date','$nCuenta','$descripcion','$tipo','$descripcionDetalle','$sucursal','$contacto','$direccion','$moneda','$telefono','$fax','$email', '$idCuentaContable', '$idCentroCosto', '$cuenta_debe', '$usuario_id')") or die(mysqli_error($conn3));

$queryList2=mysqli_query($conn3,"SELECT id from Sbancos order by id desc limit 1;");
$nrowl2=mysqli_num_rows($queryList2);
while($rowMotorizado2=mysqli_fetch_array($queryList2))
{
	$ultimoID=$rowMotorizado2['id'];
}

mysqli_query($conn3,"INSERT into Stransbanco 
	(idBanco, fechaTrans, Documento, tipo, DetalleMovimiento, credito, Balance, fechaUC, usuario_id, idCentroCosto, Conciliado)
	values 
	('$ultimoID','$date','INICIO','AP','MOVIMIENTO DE APERTURA DE CUENTA','$saldoIncial','$saldoIncial','$fechaUC', '$usuario_id', '$idCentroCosto', '1')") or die(mysqli_error($conn3));
//mysqli_insert_id
$Stransbanco_id = mysqli_insert_id($conn3);

////////////////////////////////////////////////? Detalles Transbanco/////////////////////////////////////////////
mysqli_query($conn3,"INSERT INTO StransbancoDetalles 
			(Stransbanco_id,idCuentaContable, Debe, Haber, Concepto, Tipo, usuario_id, cliente_id)
			values 
			('$Stransbanco_id','$idCuentaContable','0','$saldoIncial', '0', '0', '$usuario_id','0')") or die(mysqli_error($conn3));

mysqli_query($conn3,"INSERT INTO StransbancoDetalles 
			(Stransbanco_id,idCuentaContable, Debe, Haber, Concepto, Tipo, usuario_id, cliente_id)
			values 
			('$Stransbanco_id','$cuenta_debe','$saldoIncial','0', '0', '1', '$usuario_id','0')") or die(mysqli_error($conn3));
////////////////////////////////////////////////? [FIN] Detalles Transbanco /////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$queryList = mysqli_query($conn3, "SELECT max(id) as ultimo FROM CCompDiario where tipo_comprobante = 8");
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
$queryList = mysqli_query($conn3, "SELECT * FROM  Codigos_Movimientos where id = 8 ");
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
	$CodigoMovimiento = $rowMotorizado['codigo'];
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$fechaComprobante = date("Y-m-d");
$numerocomprobante = "$CodigoMovimiento-" . str_pad($actual, 6, "0", STR_PAD_LEFT);





//Cuenta General
mysqli_query($conn3,"INSERT INTO CCompDiario 
	(numero, fecha, tipo, estado, descripcion, monto_debe, monto_haber, cant_movimientos, detallada, idCuentaContable, idCentroCosto,tipo_comprobante,usuario_id, tercero_id, tipo_tercero)
	values 
	('$numerocomprobante','$fechaComprobante',0,0,'Movimiento Banco - Apertura #{$ultimoID}','$saldoIncial','$saldoIncial','2','','0','$idCentroCosto','8','$usuario_id','0','0')") or die(mysqli_error($conn3));

$ultimoCompDiarios = mysqli_insert_id($conn3);

//////////////////////////////////?CuentaMovimientos

//Movimiento del Detalle Registrado

$NombreCuenta = funcionMaster($idCuentaContable,'id','descripcion','CCuentas');

mysqli_query($conn3,"INSERT INTO CCompDiarioMov 
	(numero, fecha, tipo, estado, asiento, cuenta, id_ccosto, descripcion, monto_debe, monto_haber, referencia, idComprobante)
	values  
	('$numerocomprobante','$fechaComprobante',0,0,0,'$idCuentaContable',0,'$NombreCuenta','0','$saldoIncial',' Movimiento de apertura de cuenta | Cuenta Banco ','$ultimoCompDiarios')") or die(mysqli_error($conn3));

//Movimiento del Detalle Registrado

$NombreCuenta = funcionMaster($cuenta_debe,'id','descripcion','CCuentas');
mysqli_query($conn3,"INSERT INTO CCompDiarioMov 
	(numero, fecha, tipo, estado, asiento, cuenta, id_ccosto, descripcion, monto_debe, monto_haber, referencia, idComprobante)
	values  
	('$numerocomprobante','$fechaComprobante',0,0,0,'$cuenta_debe',0,'$NombreCuenta','$saldoIncial','0',' Movimiento de apertura de cuenta','$ultimoCompDiarios')") or die(mysqli_error($conn3));

//update Stransbanco set Movimiento_id WHERE id = Stransbanco_id
mysqli_query($conn3,"UPDATE Stransbanco set Movimiento_id = '$ultimoCompDiarios' WHERE id = '$Stransbanco_id'") or die(mysqli_error($conn3));

echo '<script>window.location="../bancosRegistro";alert("Registro Creado")</script>';


?>