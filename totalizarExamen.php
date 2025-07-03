<?php
date_default_timezone_set('America/Bogota');
include("conexiones/conexion.php");
include("funciones/conexiones.php");
include("funciones/funciones.php");
//print_r($_POST);
$con=conectar();

$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));

//print_r($_POST);


$tipo_cliente  			= $_POST['tipo_cliente']; 
$id_usuario  			= $_POST['id_usuario']; 
$montoPagado  			= $_POST['montoPagado']; 
$nota  			        = $_POST['nota']; 
$fechaVencimiento 		= $_POST['fechaVencimiento']; 
$clienteId   			= $_POST['id_cliente'];
$fechaRegistro             = date("Y-m-d H:i:s");



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





						$queryList=mysqli_query($conn3,"SELECT SUM(base) as sumBase, SUM(cantidad) as sumCantidad, SUM(subTotal) as sumSubTotal  from   sdetalleoperpenditesexamen  where   id_usuario =$id_usuario and  id_cliente = $clienteId order by id");

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
	
$consulta= mysqli_query($conn3,"INSERT INTO soperacioninvexamen 
(numeroDoc, idCliente, idEmpresa, fechaOperacion, fechaVencimiento, docOrigen,   subTotal, impuesto, impuestoBase, totalNeto,    totalBruto, cantidadProduc, descuentos, montoPagado, nota ) 
  VALUES                     
('$numeroFactura', '$clienteId', '$id_usuario', '$fechaRegistro', '$fechaVencimiento', '0' , '$sumSubTotal','$impuestoF', '0','$sumBase',       '$total', '$sumCantidad', '0', '$montoPagado' , '$nota');");



						mysqli_query($conn3,"update usuarios set numeroFactura = $numeroFactura where ID = $id_usuario;");



						$queryList=mysqli_query($conn3,"SELECT * FROM  soperacioninvexamen where numeroDoc=$numeroFactura and idEmpresa = $id_usuario");
						$nrowl=mysqli_num_rows($queryList);
						while($rowMotorizado=mysqli_fetch_array($queryList))
						{
							$idOperacion			=$rowMotorizado['idOperacion'];
					    }


//echo '<br> idOperacion:'.$idOperacion;



 
					$queryList=mysqli_query($conn3,"SELECT * FROM  sdetalleoperpenditesexamen where   id_usuario =$id_usuario and  id_cliente = $clienteId");
					$nrowl=mysqli_num_rows($queryList); 
					while($rowMotorizado=mysqli_fetch_array($queryList))
					{
						echo $idProducto		    =$rowMotorizado['idProducto'];
						echo $id		    =$rowMotorizado['id'];
						echo $cantidad		=$rowMotorizado['cantidad'];
						echo $descripcion	=$rowMotorizado['descripcion'];
						echo $base			=$rowMotorizado['base'];
						echo $totalbase		=$rowMotorizado['totalbase'];
						echo $subTotal		=$rowMotorizado['subTotal'];

					


						mysqli_query($conn3,"INSERT INTO sdetalleoperexamen (idOperacion, fechaRegistro, idProducto, cantidad, descripcion, base, impuesto, totalbase, subTotal, id_usuario, id_cliente) 

                        VALUES ('$idOperacion','$fechaRegistro', '$idProducto' ,'$cantidad','$descripcion','$base','0', '$totalbase', '$subTotal', '$id_usuario', '$clienteId');");


              			
              		 
					mysqli_query($conn3,"delete from sdetalleoperpenditesexamen where id = $id");
}
              			





if ($montoPagado < $sumBase)
	{

		$montoPendiente = $montoPagado - $sumBase;
			mysqli_query($conn3,"INSERT INTO scuentascobrarexamen (idDocumento, numeroDocumento, idEmpresa, montoBase, montoPagado, montoPendiente, fechaActualizado, fechaPago, idUsuario) VALUES 
	 								                  ('$idOperacion', '$numeroFactura', '$clienteId', '$sumBase', '$montoPagado', '$montoPendiente' ,'$fechaRegistro', '$fechaRegistro', '$id_usuario');");

	              		

  }


//echo $idOperacion;
echo "<script language='Javascript'> window.location='preliminarExamen.php?idOperacion=$idOperacion';</script>"; 



 



?>