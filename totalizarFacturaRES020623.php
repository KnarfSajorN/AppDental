<?php
date_default_timezone_set('America/Bogota');
include("conexiones/conexion.php");
include("funciones/conexiones.php");
include("funciones/funciones.php");

$con=conectar();

$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));

 


$id_usuario  			= $_POST['id_usuario']; 
$montoPagado  			= $_POST['montoPagado']; 
$nota  			        = $_POST['nota']; 
$fechaVencimiento 		= $_POST['fechaVencimiento']; 
$clienteId   			= $_POST['id_cliente'];

$historia  = $_POST['historia'];
$tipo_historia = $_POST['tipo_historia'];


 $fechaRegistro             = date("Y-m-d H:i:s");
 $sucursal = $_POST['sucursal'];
 if ($sucursal == "") {
	 $sucursal = "0";
 }
 ////////////////////////////// CREACION DE TABLAS ///////////////////////////////////////////////////
 $Campo1 = mysqli_query($conn3, "show COLUMNS from sOperacionInv WHERE Field = 'sucursal';");
 $nrowCampo1 = mysqli_num_rows($Campo1);
 if ($nrowCampo1 == "0") {
	 mysqli_query($conn3, "ALTER TABLE `sOperacionInv` ADD `sucursal` TEXT NULL DEFAULT '0'  ");
 }
 $Campo1 = mysqli_query($conn3, "show COLUMNS from sDetalleOper WHERE Field = 'sucursal';");
 $nrowCampo1 = mysqli_num_rows($Campo1);
 if ($nrowCampo1 == "0") {
	 mysqli_query($conn3, "ALTER TABLE `sDetalleOper` ADD `sucursal` TEXT NULL DEFAULT '0' ");
 }

            $queryList=mysqli_query($conn3,"SELECT * FROM  config where ID_Usuario = $id_usuario");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {
                $moneda=$rowMotorizado['moneda'];
                $impuestoF=$rowMotorizado['impuestoF'];
            }
 
 



					$queryList=mysqli_query($conn3,"SELECT * FROM  usuarios where ID = $id_usuario");

					$nrowl=mysqli_num_rows($queryList);

					while($rowMotorizado=mysqli_fetch_array($queryList))

	                  	{
							$numeroFactura			=$rowMotorizado['numeroFactura'];
					       
	          			}



						$queryList=mysqli_query($conn3,"SELECT SUM(base) as sumBase, SUM(cantidad) as sumCantidad, SUM(subTotal) as sumSubTotal  from   sDetalleOperPendites  where   id_usuario =$id_usuario and  id_cliente = $clienteId order by id");

						$nrowl=mysqli_num_rows($queryList);

						while($rowMotorizado=mysqli_fetch_array($queryList))

						{
							$sumBase		=$rowMotorizado['sumBase'];
							$sumCantidad	=$rowMotorizado['sumCantidad'];
							$sumSubTotal	=$rowMotorizado['sumSubTotal'];
						}

if ($impuestoF >0) {
$impuestoF2 = $impuestoF/100; 
$total1 =  $sumSubTotal*$impuestoF2;
$total =  $total1+$sumSubTotal;
 
}
else
{


$total =  $sumSubTotal;
 
}


$numeroFactura++;	
	          		
echo 'Generando la facrura Nº'.$numeroFactura;

mysqli_query($conn3,"INSERT INTO sOperacionInv 
(numeroDoc, idCliente, idEmpresa, fechaOperacion, fechaVencimiento, docOrigen, seriaOperacion, impuesto, impuestoBase, totalBruto, totalNeto, cantidadProduc, descuentos, montoPagado, nota , 	id_historia , tipo_historia,sucursal) 
  VALUES                     
('$numeroFactura', '$clienteId', '$id_usuario', '$fechaRegistro', '$fechaVencimiento', '0', NULL,'$impuestoF', '0','$sumSubTotal', '$total', '$sumCantidad', '0', '$montoPagado' , '$nota' ,'$historia', '$tipo_historia','$sucursal');");
           
              
	               		 

echo '<br>actualizamos numero<br>';


						mysqli_query($conn3,"update usuarios set numeroFactura = $numeroFactura where ID = $id_usuario;");
              			 


echo 'Tomamos el ID y el numerod ef actura<br>';




						$queryList=mysqli_query($conn3,"SELECT * FROM  sOperacionInv where numeroDoc=$numeroFactura and idEmpresa = $id_usuario");
						$nrowl=mysqli_num_rows($queryList);
						while($rowMotorizado=mysqli_fetch_array($queryList))
						{
							$idOperacion			=$rowMotorizado['idOperacion'];
					    }
echo "<br><br><br><br> >>>>> SELECT * FROM  sOperacionInv where numeroDoc=$numeroFactura and idEmpresa = $id_usuario <<<< <br><br><br>";
echo $idOperacion;

echo '<br>agregamos lo pendiente en oper -- '.$clienteId .'<br>';

 
					$queryList=mysqli_query($conn3,"SELECT * FROM  sDetalleOperPendites where   id_usuario =$id_usuario and  id_cliente = $clienteId");
					$nrowl=mysqli_num_rows($queryList); 
					while($rowMotorizado=mysqli_fetch_array($queryList))
					{
						$id		        =$rowMotorizado['id'];
						$cantidad		=$rowMotorizado['cantidad'];
						$descripcion	=$rowMotorizado['descripcion'];
						$base			=$rowMotorizado['base'];
						$totalbase		=$rowMotorizado['totalbase'];
						$subTotal		=$rowMotorizado['subTotal'];

						$descuentos		=$rowMotorizado['descuentos'];
						$id_usuario		=$rowMotorizado['id_usuario'];
 
						$idProducto = $rowMotorizado['idProducto'];
						$cantidad_producto = funcionMaster($idProducto,'ID','existencia','sinvetrios');
						$cantidad_producto = $cantidad_producto - $cantidad;


						mysqli_query($conn3,"INSERT INTO sDetalleOper (idOperacion, fechaRegistro, idProducto, cantidad, descripcion, base, impuesto, totalbase, subTotal, id_usuario, id_cliente,sucursal) 
                        VALUES ('$idOperacion','$fechaRegistro', '0','$cantidad','$descripcion','$base','0', '$totalbase', '$subTotal', '$id_usuario', '$clienteId','$sucursal');");

echo "INSERT INTO sDetalleOper (idOperacion, fechaRegistro, idProducto, cantidad, descripcion, base, impuesto, totalbase, subTotal, id_usuario, id_cliente) 
                        VALUES ('$idOperacion','$fechaRegistro', '0','$cantidad','$descripcion','$base','0', '$totalbase', '$subTotal', '$id_usuario', '$clienteId');";
              			
              		 mysqli_query($conn3,"UPDATE sinvetrios SET existencia='$cantidad_producto' WHERE ID='$idProducto'");
						mysqli_query($conn3,"delete from sDetalleOperPendites where id = $id");

              			
					} 

if ($montoPagado < $sumSubTotal)
	{

		$montoPendiente = $montoPagado - $sumSubTotal;
			mysqli_query($conn3,"INSERT INTO sCuentasCobrar (idDocumento, numeroDocumento, idEmpresa, montoBase, montoPagado, montoPendiente, fechaActualizado, fechaPago, idUsuario) VALUES 
	 								                  ('$idOperacion', '$numeroFactura', '$clienteId', '$sumBase', '$montoPagado', '$montoPendiente' ,'$fechaRegistro', '$fechaRegistro', '$id_usuario');");
echo "INSERT INTO sCuentasCobrar (idDocumento, numeroDocumento, idEmpresa, montoBase, montoPagado, montoPendiente, fechaActualizado, fechaPago, idUsuario) VALUES 
	 								                  ('$idOperacion', '$numeroFactura', '$clienteId', '$sumBase', '$montoPagado', '$montoPendiente' ,'$fechaRegistro', '$fechaRegistro', '$id_usuario');";
	              		

  }


echo $idOperacion;
echo "<script language='Javascript'> window.location='preliminarFactura.php?idOperacion=$idOperacion';</script>"; 

/*

						$queryList=mysqli_query($conn3,"SELECT * FROM  cliente where cliente_id=$clienteId");
						$nrowl=mysqli_num_rows($queryList);
						while($rowMotorizado=mysqli_fetch_array($queryList))
						{

							$usuario_id			=$rowMotorizado['usuario_id'];
					        $nombre_cliente		=$rowMotorizado['nombre_cliente'];
					        $celular_cliente	=$rowMotorizado['celular_cliente'];
					        $ciudad_cliente		=$rowMotorizado['ciudad_cliente'];
					        $correo_cliente		=$rowMotorizado['correo_cliente'];
					        $CODI_CLIENTE		=$rowMotorizado['CODI_CLIENTE'];
					        $id_uso_servicio	=$rowMotorizado['id_uso_servicio'];
					        $tipo_cliente		=$rowMotorizado['tipo_cliente'];
					        $fechar 			=$rowMotorizado['fechar'];
					        $fecha_actualizado	=$rowMotorizado['fecha_actualizado'];
					        $activo				=$rowMotorizado['activo'];
					        $genero				=$rowMotorizado['genero'];
					        $direccion_cliente	=$rowMotorizado['direccion_cliente'];
					        $telefono_cliente	=$rowMotorizado['telefono_cliente'];
					        $edad_cliente		=$rowMotorizado['edad_cliente'];
					        $profesion_cliente	=$rowMotorizado['profesion_cliente'];
					        $acompananteFamiliar=$rowMotorizado['acompananteFamiliar'];
					        $telefono_acompanante=$rowMotorizado['telefono_acompanante'];
					        $antecedentes		=$rowMotorizado['antecedentes'];   

	          			}



*/



 
    


?>