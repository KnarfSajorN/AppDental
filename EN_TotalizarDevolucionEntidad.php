<?php
date_default_timezone_set('America/Bogota');
include("funciones/conn3.php");
include("funciones/funciones.php");

$usuario_id  			= $_POST['usuario_id'];


$idOperacion_Principal = $_POST['idOperacion_Principal'];
$fechaRegistro             = date("Y-m-d H:i:s");
$nota = mysqli_real_escape_string($conn3,$_POST['nota']);

$MedioPago = $_POST['MedioPago'];
$MontoDevolucion = $_POST['MontoDevolucion'];

$numeroDevolucion=0;
$queryList = mysqli_query($conn3, "SELECT * FROM  usuarios where ID = $usuario_id");
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
	$numeroDevolucion			= $rowMotorizado['numeroDevolucion'];
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$Campo1 = mysqli_query($conn3, "show COLUMNS from usuarios WHERE Field = 'numeroDevolucion';");
$nrowCampo1 = mysqli_num_rows($Campo1);
if ($nrowCampo1 == "0") {
	mysqli_query($conn3, "ALTER TABLE `usuarios` ADD `numeroDevolucion` INT(11) NULL DEFAULT '0' COMMENT 'numeracion de las devoluciones*Creado desde Totalizar Devolucion Factura*'");
}

$Campo1 = mysqli_query($conn3, "show COLUMNS from sDetalleOper WHERE Field = 'Devolucion';");
$nrowCampo1 = mysqli_num_rows($Campo1);
if ($nrowCampo1 == "0") {
	mysqli_query($conn3, "ALTER TABLE `sDetalleOper` ADD `Devolucion` INT(11) NULL DEFAULT '0' COMMENT '0->Detalle Normal | 1-> Detalle Devuelto *Creado desde Totalizar Devolucion Factura*'");
}



$Campo1 = mysqli_query($conn3, "show COLUMNS from sDetalleOperDevolucion WHERE Field = 'Impuesto_Numerico';");
$nrowCampo1 = mysqli_num_rows($Campo1);
if ($nrowCampo1 == "0") {
	mysqli_query($conn3, "ALTER TABLE `sDetalleOperDevolucion` ADD `Impuesto_Numerico` TEXT NULL  COMMENT '	valor numerico del impuesto *Creado desde Totalizar Devolucion Factura*'");
}
$Campo1 = mysqli_query($conn3, "show COLUMNS from sDetalleOperDevolucion WHERE Field = 'Impuesto_Textual';");
$nrowCampo1 = mysqli_num_rows($Campo1);
if ($nrowCampo1 == "0") {
	mysqli_query($conn3, "ALTER TABLE `sDetalleOperDevolucion` ADD `Impuesto_Textual` TEXT NULL  COMMENT ' valor Original del impuesto *Creado desde modulo de CompraXML* *Creado desde Totalizar Devolucion Factura*'");
}
$Campo1 = mysqli_query($conn3, "show COLUMNS from sDetalleOperDevolucion WHERE Field = 'Total';");
$nrowCampo1 = mysqli_num_rows($Campo1);
if ($nrowCampo1 == "0") {
	mysqli_query($conn3, "ALTER TABLE `sDetalleOperDevolucion` ADD `Total` TEXT NULL  COMMENT 'total con impuesto *Creado desde Totalizar Devolucion Factura*'");
}


$Campo1 = mysqli_query($conn3, "show COLUMNS from sOperacionInv WHERE Field = 'MontoDevolucion';");
$nrowCampo1 = mysqli_num_rows($Campo1);
if ($nrowCampo1 == "0") {
	mysqli_query($conn3, "ALTER TABLE `sOperacionInv` ADD `MontoDevolucion` INT(11) NULL DEFAULT '0'  COMMENT 'valor devuelto *Creado desde Totalizar Devolucion Factura*'");
}
$Campo1 = mysqli_query($conn3, "show COLUMNS from sOperacionInvDevolucion WHERE Field = 'MontoDevolucion';");
$nrowCampo1 = mysqli_num_rows($Campo1);
if ($nrowCampo1 == "0") {
	mysqli_query($conn3, "ALTER TABLE `sOperacionInvDevolucion` ADD `MontoDevolucion` INT(11) NULL DEFAULT '0'  COMMENT 'valor devuelto *Creado desde Totalizar Devolucion Factura*'");
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$DetallesDevolver= $_POST['DetallesDevolver'];

$numeroDevolucion++;

$impuestoF = funcionMaster($idOperacion_Principal,'idOperacion','impuesto','sOperacionInv');
$tipo = funcionMaster($idOperacion_Principal,'idOperacion','tipo','sOperacionInv');
$Deposito_id_T = funcionMaster($idOperacion_Principal,'idOperacion','Deposito_id','sOperacionInv');

$sumTotalbase=0;
$sumCantidad=0;
$sumSubTotal=0;
$sumDescuento=0;
foreach ($DetallesDevolver as $key => $value) {
    //echo "$key -> $value <br>";
    
    $queryList = mysqli_query($conn3, "SELECT totalbase, cantidad, subTotal, Descuento_Numerico,Impuesto_Numerico,Total from sDetalleOper where estado = 1 and Devolucion = 0 AND idOperacion =$idOperacion_Principal and id=$key ");
	while ($rowMotorizado = mysqli_fetch_array($queryList)) {
					$sumTotalbase		+= $rowMotorizado['totalbase'];
		$sumCantidad	+= $rowMotorizado['cantidad'];
		$sumSubTotal	+= $rowMotorizado['subTotal'];
		$sumDescuento += $rowMotorizado['Descuento_Numerico'];

        $sumImpuesto += $rowMotorizado['Impuesto_Numerico'];
        $sumTotal += $rowMotorizado['Total'];
	}
				
}

if($sumImpuesto==""){$sumImpuesto=0;}
$impuestoF=0;



$Campo1 = mysqli_query($conn3, "show COLUMNS from sOperacionInvDevolucion WHERE Field = 'convenio_id';");
$nrowCampo1 = mysqli_num_rows($Campo1);
if ($nrowCampo1 == "0") {
	mysqli_query($conn3, "ALTER TABLE `sOperacionInvDevolucion` ADD `convenio_id` INT(11) NULL DEFAULT '0'  COMMENT 'convenio id solo aaplica a facturas de entidad *Creado desde Totalizar Devolucion Factura entidad*'");
}


if($_POST['TipoOperacion']=="DevolucionEntidad"){



                $cliente_id   			= 0;
                $convenio_id = $_POST['convenio_id'];

                mysqli_query($conn3, "INSERT INTO sOperacionInvDevolucion
				(numeroDoc, idCliente, idEmpresa, fechaOperacion,impuesto, impuestoBase, 
				totalBruto, totalNeto, cantidadProduc, descuentos, tipo,idOperacion_principal,nota,Deposito_id,MontoDevolucion,convenio_id) 
				VALUES                     
				('$numeroDevolucion', '$cliente_id', '$usuario_id', '$fechaRegistro','$impuestoF', '$sumImpuesto',
				'$sumTotalbase', '$sumTotal', '$sumCantidad', '$sumDescuento','$tipo','$idOperacion_Principal','$nota','$Deposito_id_T','$MontoDevolucion','$convenio_id');") or die(mysqli_error($conn3));


                $idOperacionDevolucion = mysqli_insert_id($conn3);

                

				mysqli_query($conn3, "UPDATE usuarios set numeroDevolucion = $numeroDevolucion where ID = $usuario_id;");
				


                foreach ($DetallesDevolver as $key => $value) {


                    $queryList = mysqli_query($conn3, "SELECT * FROM  sDetalleOper where estado = 1 and Devolucion = 0 AND idOperacion =$idOperacion_Principal and id=$key");
                    $nrowl = mysqli_num_rows($queryList);
                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                        $id		        = $rowMotorizado['id'];
                        $cantidad		= $rowMotorizado['cantidad'];
                        $descripcion	= $rowMotorizado['descripcion'];
                        $base			= $rowMotorizado['base'];
                        $totalbase		= $rowMotorizado['totalbase'];
                        $subTotal		= $rowMotorizado['subTotal'];
                        $id_usuario		= $rowMotorizado['id_usuario'];
                        $idProducto = $rowMotorizado['idProducto'];


                        $Descuento_Numerico = $rowMotorizado['Descuento_Numerico'];
                        $Descuento_Textual  = $rowMotorizado['Descuento_Textual'];

                        $Deposito_id = $rowMotorizado['Deposito_id'];
                        $SinvDep_id = $rowMotorizado['SinvDep_id'];

                        $Impuesto_Numerico = $rowMotorizado['Impuesto_Numerico'];
					    $Impuesto_Textual  = $rowMotorizado['Impuesto_Textual'];
					    $Total = $rowMotorizado['Total'];


                        //aqui llama a la funcion MasDetalles Para traer informacion adicional del producto ya sea el lote o los productos que contiene el producto compuesto
                        $Mas_Detalles = mysqli_real_escape_string($conn3,$rowMotorizado['Mas_Detalles']);

                        mysqli_query($conn3, "INSERT INTO sDetalleOperDevolucion (idOperacion, fechaRegistro, idProducto, cantidad, descripcion, base, impuesto,
                    totalbase, subTotal, id_usuario, id_cliente,Descuento_Numerico,Descuento_Textual,SinvDep_id,Deposito_id,Mas_Detalles,detalle_factura_id,Impuesto_Numerico,Impuesto_Textual,Total) 
                                        VALUES ('$idOperacionDevolucion','$fechaRegistro', '$idProducto','$cantidad','$descripcion','$base','0', 
                                        '$totalbase', '$subTotal', '$usuario_id', '$cliente_id','$Descuento_Numerico','$Descuento_Textual','$SinvDep_id','$Deposito_id','$Mas_Detalles','$id','$Impuesto_Numerico','$Impuesto_Textual','$Total');");

                        mysqli_query($conn3, "UPDATE sDetalleOper set Devolucion = 1 where id = $id");
                    }


                }




                $fechar                = date("Y-m-d");

                if($MontoDevolucion!=0){
                    $queryUsuario = "INSERT INTO sDetalleMetodosPagosDevolucion 
                    (idOperacion, fechaRegistro,id_usuario, id_cliente,metodo_pago,nota_pago,id_historia,tipo_historia,tipo,ID_Empresa, nOrden) 
                                        VALUES 
                    ('$idOperacionDevolucion','$fechar','$usuario_id', 
                    '$cliente_id','$MedioPago','$MontoDevolucion','','','10','0', '0');";
                    mysqli_query($conn3,$queryUsuario) or die(mysqli_error($conn3));

                    $ValorTotalDevolucion = funcionMaster($idOperacion_Principal,'idOperacion','MontoDevolucion','sOperacionInv');

                    $ValorTotalDevolucion = round($ValorTotalDevolucion + $MontoDevolucion,2);
                    mysqli_query($conn3, "UPDATE sOperacionInv SET MontoDevolucion='$ValorTotalDevolucion' WHERE idOperacion='$idOperacion_Principal' limit 1");
                }


                    echo "<script language='Javascript'> window.location='EN_PreliminarDevolucionEntidad?idOperacion=$idOperacionDevolucion';</script>";
                

}







?>

