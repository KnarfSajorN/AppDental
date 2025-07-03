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

/*
$total1="0";
if ($impuestoF > 0) {
	$impuestoF2 = $impuestoF / 100;
	$total1 =  $sumSubTotal * $impuestoF2;
	$total =  $total1 + $sumSubTotal;
} else {
	$total =  $sumSubTotal;
}
*/





if($_POST['TipoOperacion']=="Venta"){

                //aqui es para cambiar la numeracion de la facturacion si tiene iniciado sesion con algun punto pos
                $PuntoPOS_id = $_POST['PuntoPOS_id'];
                if($PuntoPOS_id==""){$PuntoPOS_id=0;}
                $Serie="";
                if($PuntoPOS_id>0){
                $DevolucionPOS = funcionMaster($PuntoPOS_id,'id','NumeroDevolucion','PuntoPOS');
                $Serie = funcionMaster($PuntoPOS_id,'id','Serie','PuntoPOS');
                $numeroDevolucion = $DevolucionPOS;
                $numeroDevolucion++;
                }


                $cliente_id   			= $_POST['cliente_id'];

                mysqli_query($conn3, "INSERT INTO sOperacionInvDevolucion
				(numeroDoc, idCliente, idEmpresa, fechaOperacion,impuesto, impuestoBase, 
				totalBruto, totalNeto, cantidadProduc, descuentos, tipo,idOperacion_principal,nota,Deposito_id,Serie,Pos,MontoDevolucion) 
				VALUES                     
				('$numeroDevolucion', '$cliente_id', '$usuario_id', '$fechaRegistro','$impuestoF', '$sumImpuesto',
				'$sumTotalbase', '$sumTotal', '$sumCantidad', '$sumDescuento','$tipo','$idOperacion_Principal','$nota','$Deposito_id_T','$Serie','$PuntoPOS_id','$MontoDevolucion');") or die(mysqli_error($conn3));

                $idOperacionDevolucion = mysqli_insert_id($conn3);

                

                if($PuntoPOS_id>0){
					mysqli_query($conn3, "UPDATE PuntoPOS set NumeroDevolucion = $numeroDevolucion where id = $PuntoPOS_id;");
				}else{
					mysqli_query($conn3, "UPDATE usuarios set numeroDevolucion = $numeroDevolucion where ID = $usuario_id;");
				}


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

    
                include 'FA_Include_ValidacionExistenciasProductos.php';

                $ArregloExistencias = CalcularExistencias_Devolucion($cliente_id,$Deposito_id_T,$idOperacionDevolucion);//calcular las existencias a descontar/subir

                //aqui es el arreglo que trae la funcion CalcularExistencias_Devolucion en la cual traera los id de los SinvDep y la cantidad a descontar/subir
                foreach ($ArregloExistencias['Detalles'] as $key => $value) {
                    $SinvDep_id = $key;
                    $Descontar = $value['Descontar'];

                    $Query_SinvDep = mysqli_query($conn3, "SELECT * FROM  SinvDep where id = $SinvDep_id");
                    while ($RowSinvDep = mysqli_fetch_array($Query_SinvDep)) {
                        $existencia = $RowSinvDep['existencia'];
                    }
                    $NewExistencia = $existencia + $Descontar;
                    mysqli_query($conn3, "UPDATE SinvDep set existencia = '$NewExistencia'  WHERE id = '$SinvDep_id'");
                    //echo "UPDATE SinvDep set existencia = '$NewExistencia'  WHERE id = $SinvDep_id <br>";
                }






                $fechar                = date("Y-m-d");

                if($MontoDevolucion!=0){
                    $queryUsuario = "INSERT INTO sDetalleMetodosPagosDevolucion 
                    (idOperacion, fechaRegistro,id_usuario, id_cliente,metodo_pago,nota_pago,id_historia,tipo_historia,tipo,ID_Empresa, nOrden) 
                                        VALUES 
                    ('$idOperacionDevolucion','$fechar','$usuario_id', 
                    '$cliente_id','$MedioPago','$MontoDevolucion','','','1','0', '0');";
                    mysqli_query($conn3,$queryUsuario) or die(mysqli_error($conn3));

                    $ValorTotalDevolucion = funcionMaster($idOperacion_Principal,'idOperacion','MontoDevolucion','sOperacionInv');

                    $ValorTotalDevolucion = round($ValorTotalDevolucion + $MontoDevolucion,2);
                    mysqli_query($conn3, "UPDATE sOperacionInv SET MontoDevolucion='$ValorTotalDevolucion' WHERE idOperacion='$idOperacion_Principal' limit 1");
                }




                $QueryContabilidad = mysqli_query($conn3, "SELECT * FROM  Config_Contabilidad WHERE Activo = 1");
                $NrowContabilidad = mysqli_num_rows($QueryContabilidad);
                if($NrowContabilidad>0 ){
                //////////////////////////Contabilidad
                    $Campo1 = mysqli_query($conn3, "show COLUMNS from sOperacionInvDevolucion WHERE Field = 'idCuentaContableDevolucion';");
                    $nrowCampo1 = mysqli_num_rows($Campo1);if ($nrowCampo1 == "0") { mysqli_query($conn3, "ALTER TABLE `sOperacionInvDevolucion` ADD `idCuentaContableDevolucion` TEXT NULL DEFAULT '0' COMMENT '*Creado desde modulo de totalizarDevolucion*'");}

                    $Campo1 = mysqli_query($conn3, "show COLUMNS from sOperacionInvDevolucion WHERE Field = 'idCentroCosto';");
                    $nrowCampo1 = mysqli_num_rows($Campo1);if ($nrowCampo1 == "0") {mysqli_query($conn3, "ALTER TABLE `sOperacionInvDevolucion` ADD `idCentroCosto` TEXT NULL DEFAULT '0' COMMENT '*Creado desde modulo de totalizarDevolucion*'");}

                    ///////////////////////////////////////////////////////////////////////////////////////////////

                    $idCuentaContableDevolucion = $_POST['idCuentaContableDevolucion'];
                    if($idCuentaContableDevolucion==""){$idCuentaContableDevolucion="0";}

                    $idCentroCosto = $_POST['idCentroCosto'];
                    if($idCentroCosto==""){$idCentroCosto="0";}


                    mysqli_query($conn3, "UPDATE sOperacionInvDevolucion set idCuentaContableDevolucion = '$idCuentaContableDevolucion',idCentroCosto='$idCentroCosto' where idOperacion = $idOperacionDevolucion limit 1;");

                    echo "<script language='Javascript'> window.location='CTB_RegistroMovimientosDevolucionVenta.php?idOperacion=$idOperacionDevolucion';</script>";

                ////////////////////////
                }else{
                    echo "<script language='Javascript'> window.location='DV_PreliminarDevolucion.php?idOperacion=$idOperacionDevolucion';</script>";
                }



    

}



if($_POST['TipoOperacion']=="Compra"){

    $ID_Empresa = $_POST['ID_Empresa'];//proveedor

    mysqli_query($conn3, "INSERT INTO sOperacionInvDevolucion
    (numeroDoc, ID_Empresa, idEmpresa, fechaOperacion,impuesto, impuestoBase, 
    totalBruto, totalNeto, cantidadProduc, descuentos, tipo,idOperacion_principal,nota,Deposito_id,idCliente,MontoDevolucion) 
    VALUES                     
    ('$numeroDevolucion', '$ID_Empresa', '$usuario_id', '$fechaRegistro','$impuestoF', '$sumImpuesto',
    '$sumTotalbase', '$sumTotal', '$sumCantidad', '$sumDescuento','$tipo','$idOperacion_Principal','$nota','$Deposito_id_T','0','$MontoDevolucion');") or die(mysqli_error($conn3));

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
        totalbase, subTotal, id_usuario, ID_Empresa,Descuento_Numerico,Descuento_Textual,SinvDep_id,Deposito_id,Mas_Detalles,detalle_factura_id,id_cliente,Impuesto_Numerico,Impuesto_Textual,Total) 
                            VALUES ('$idOperacionDevolucion','$fechaRegistro', '$idProducto','$cantidad','$descripcion','$base','0', 
                            '$totalbase', '$subTotal', '$usuario_id', '$ID_Empresa','$Descuento_Numerico','$Descuento_Textual','$SinvDep_id','$Deposito_id','$Mas_Detalles','$id','0','$Impuesto_Numerico','$Impuesto_Textual','$Total');");

            mysqli_query($conn3, "UPDATE sDetalleOper set Devolucion = 1 where id = $id");

        //Actualizacion de la existencias e los productos y los lotes
		$QueryExistencias = mysqli_query($conn3, "SELECT * FROM  SinvDep where id = $SinvDep_id");
		while ($RowExistencias = mysqli_fetch_array($QueryExistencias)) {
			$ExistenciaSinvDep = $RowExistencias['existencia'];
		}
		$ExistenciasFinales = $ExistenciaSinvDep-$cantidad;
		mysqli_query($conn3, "UPDATE SinvDep set existencia = $ExistenciasFinales where id = $SinvDep_id");

        }


    }








                $fechar = date("Y-m-d");

                if($MontoDevolucion!=0){
                    $queryUsuario = "INSERT INTO sDetalleMetodosPagosDevolucion 
                    (idOperacion, fechaRegistro,id_usuario, id_cliente,metodo_pago,nota_pago,id_historia,tipo_historia,tipo,ID_Empresa, nOrden) 
                                        VALUES 
                    ('$idOperacionDevolucion','$fechar','$usuario_id', 
                    '0','$MedioPago','$MontoDevolucion','','','3','$ID_Empresa', '0');";
                    mysqli_query($conn3,$queryUsuario) or die(mysqli_error($conn3));

                    $ValorTotalDevolucion = funcionMaster($idOperacion_Principal,'idOperacion','MontoDevolucion','sOperacionInv');

                    $ValorTotalDevolucion = round($ValorTotalDevolucion + $MontoDevolucion,2);
                    mysqli_query($conn3, "UPDATE sOperacionInv SET MontoDevolucion='$ValorTotalDevolucion' WHERE idOperacion='$idOperacion_Principal' limit 1");
                }




                $QueryContabilidad = mysqli_query($conn3, "SELECT * FROM  Config_Contabilidad WHERE Activo = 1");
                $NrowContabilidad = mysqli_num_rows($QueryContabilidad);
                if($NrowContabilidad>0 ){
                //////////////////////////Contabilidad
                    $Campo1 = mysqli_query($conn3, "show COLUMNS from sOperacionInvDevolucion WHERE Field = 'idCuentaContableDevolucion';");
                    $nrowCampo1 = mysqli_num_rows($Campo1);if ($nrowCampo1 == "0") { mysqli_query($conn3, "ALTER TABLE `sOperacionInvDevolucion` ADD `idCuentaContableDevolucion` TEXT NULL DEFAULT '0' COMMENT '*Creado desde modulo de totalizarDevolucion*'");}

                    $Campo1 = mysqli_query($conn3, "show COLUMNS from sOperacionInvDevolucion WHERE Field = 'idCentroCosto';");
                    $nrowCampo1 = mysqli_num_rows($Campo1);if ($nrowCampo1 == "0") {mysqli_query($conn3, "ALTER TABLE `sOperacionInvDevolucion` ADD `idCentroCosto` TEXT NULL DEFAULT '0' COMMENT '*Creado desde modulo de totalizarDevolucion*'");}

                    ///////////////////////////////////////////////////////////////////////////////////////////////

                    $idCuentaContableDevolucion = $_POST['idCuentaContableDevolucion'];
                    if($idCuentaContableDevolucion==""){$idCuentaContableDevolucion="0";}

                    $idCentroCosto = $_POST['idCentroCosto'];
                    if($idCentroCosto==""){$idCentroCosto="0";}


                    mysqli_query($conn3, "UPDATE sOperacionInvDevolucion set idCuentaContableDevolucion = '$idCuentaContableDevolucion',idCentroCosto='$idCentroCosto' where idOperacion = $idOperacionDevolucion limit 1;");

                    echo "<script language='Javascript'> window.location='CTB_RegistroMovimientosDevolucionCompra.php?idOperacion=$idOperacionDevolucion';</script>";

                ////////////////////////
                }else{
                    echo "<script language='Javascript'> window.location='DV_PreliminarDevolucionCompra.php?idOperacion=$idOperacionDevolucion';</script>";
                }



    


}




?>

