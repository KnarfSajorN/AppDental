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
 $fechaRegistro         = date("Y-m-d H:i:s");





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



$queryList=mysqli_query($conn3,"SELECT SUM(base) as sumBase, SUM(cantidad) as sumCantidad, SUM(subTotal) as sumSubTotal  from   v_sDetalleOper where id_usuario =$id_usuario and  id_cliente = $clienteId and idOperacion = 0 order by id");

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

mysqli_query($conn3,"INSERT INTO v_sOperacionInv 
(numeroDoc, idCliente, idEmpresa, fechaOperacion, fechaVencimiento, docOrigen, seriaOperacion, subTotal, impuesto, impuestoBase, totalNeto,    totalBruto, cantidadProduc, descuentos, montoPagado, nota) 
  VALUES                     
('$numeroFactura', '$clienteId', '$id_usuario', '$fechaRegistro', '$fechaVencimiento', '0', NULL,'$sumSubTotal','$impuestoF', '0','$sumBase',       '$total', '$sumCantidad', '0', '$montoPagado' , '$nota');");
   


/*

echo  "<br><br><br> >>>> INSERT INTO v_sOperacionInv 
(numeroDoc, idCliente, idEmpresa, fechaOperacion, fechaVencimiento, docOrigen, seriaOperacion, subTotal, impuesto, impuestoBase, totalNeto,    totalBruto, cantidadProduc, descuentos, montoPagado, nota) 
  VALUES                     
('$numeroFactura', '$clienteId', '$id_usuario', '$fechaRegistro', '$fechaVencimiento', '0', NULL,'$sumSubTotal','$impuestoF', '0','$sumBase',       '$total', '$sumCantidad', '0', '$montoPagado' , '$nota');<br><br><br>";              
              
*/	               		 

echo '<br>actualizamos numero<br>';
 
		mysqli_query($conn3,"update usuarios set numeroFactura = $numeroFactura where ID = $id_usuario;");
              		 
echo 'Tomamos el ID y el numerod ef actura<br>';
 

		$queryList=mysqli_query($conn3,"SELECT * FROM  v_sOperacionInv where numeroDoc=$numeroFactura and idEmpresa = $id_usuario");
		$nrowl=mysqli_num_rows($queryList);
		while($rowMotorizado=mysqli_fetch_array($queryList))
		{
			$idOperacion			=$rowMotorizado['idOperacion'];
	    }


echo "<br><br><br><br> >>>>> SELECT * FROM  v_sOperacionInv where numeroDoc=$numeroFactura and idEmpresa = $id_usuario <<<< <br><br><br>";
echo $idOperacion;

echo '<br>agregamos lo pendiente en oper -- '.$clienteId .'<br>';
 


mysqli_query($conn3,"update v_sDetalleOper set idOperacion = $idOperacion where id_usuario =$id_usuario and  id_cliente = $clienteId and idOperacion = 0");
echo "<br> v_sDetalleOper <br>";
echo "update v_sDetalleOper set idOperacion = $idOperacion where id_usuario =$id_usuario and  id_cliente = $clienteId and idOperacion = 0";


mysqli_query($conn3,"update v_historiaClinica3 set factura_id = $numeroFactura where usuario_id =$id_usuario and  clienteE_id = $clienteId and factura_id = 0 and aplicada  = 1");

echo "<br> v_historiaClinica3 <br>"; 
echo "update v_historiaClinica3 set factura_id = $numeroFactura where usuario_id = $id_usuario and  clienteE_id = $clienteId and factura_id = 0";

if ($montoPagado < $sumBase)
{

$montoPendiente = $montoPagado - $sumBase;
mysqli_query($conn3,"INSERT INTO sCuentasCobrar (idDocumento, numeroDocumento, idEmpresa, montoBase, montoPagado, montoPendiente, fechaActualizado, fechaPago, idUsuario) VALUES ('$idOperacion', '$numeroFactura', '$clienteId', '$sumBase', '$montoPagado', '$montoPendiente' ,'$fechaRegistro', '$fechaRegistro', '$id_usuario');");



}


echo $idOperacion;
  echo "<script language='Javascript'> window.location='v_preliminarFactura.php?idOperacion=$idOperacion';</script>"; 

 
    


?>