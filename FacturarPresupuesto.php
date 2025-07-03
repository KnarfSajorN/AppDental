<?php
date_default_timezone_set('America/Bogota');

include("funciones/conn3.php");
include("funciones/funciones.php");


$idOperacion = $_GET['idOperacion'];
$queryList = mysqli_query($conn3, "SELECT * FROM  sOperacionInv where idOperacion = $idOperacion");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {

  $idCliente      = $rowMotorizado['idCliente'];
  $idUsuario      = $rowMotorizado['idEmpresa'];
  $Deposito_id = $rowMotorizado['Deposito_id'];
  $tipo_presupuesto = $rowMotorizado['tipo'];
}







function CalcularExistenciasDescontar_Presupuesto($usuario_id, $cliente_id, $deposito,$idOperacion){
	include 'funciones/conn3.php';
	$usuario_id = $usuario_id;
	$cliente_id = $cliente_id;//aqui no aplica
	$deposito = $deposito;

    //aqui se realiza la consulta de todos detalles a facturar
	$queryListT = mysqli_query($conn3, "SELECT * FROM  sDetalleOper WHERE estado = 1 and id_usuario =$usuario_id and  id_cliente = $cliente_id AND idOperacion = $idOperacion ORDER BY id ASC");
	while ($rowMotorizadoT = mysqli_fetch_array($queryListT)) {

		$Producto_id = $rowMotorizadoT['idProducto'];
		$SinvDep_id = $rowMotorizadoT['SinvDep_id'];
		$Cantidad_Producto = $rowMotorizadoT['cantidad'];

		$ArregloProductos=array();
		$ArregloExistenciasProducto=array();

		//si el producto tiene sinvdep_id es que es un producto simple o con lote
        //aqui se va almacenando por id de SinvDep_id las cantidades a descontar
		if($SinvDep_id != "0"){
			$ArregloExistencias_InvDep[$SinvDep_id]["Existencias Descontar"] = $ArregloExistencias_InvDep[$SinvDep_id]["Existencias Descontar"] + $rowMotorizadoT['cantidad'];
			
		}else{

			//aqui realizamos la busqueda de que si el tipo del producto
			$queryinv = mysqli_query($conn3, "SELECT * FROM  sinvetrios where ID = $Producto_id");
			while ($rowinv = mysqli_fetch_array($queryinv)) {
				$tipo = $rowinv['tipo'];
			}
			$queryinv = mysqli_query($conn3, "SELECT * FROM  scategoria where id = $tipo LIMIT 1");
			while ($rowinv = mysqli_fetch_array($queryinv)) {
				$TipoInventario = $rowinv['tipo'];
			}

			//si la busqueda da tipo de producto 3 es por que es un producto compuesto
            //aqui se va almacenanar en los productos simples las cantidades a descontar ya que aqui entrarian solo los productos compuestos los cuales descontaran de los productos simples elegidos 
			if($TipoInventario=="3"){
				
                //aqui recorremos los productos que tiene el id del producto compuesto a facturar y guardamos el id del inventario
				$resultCompuestos = mysqli_query($conn3, "SELECT * from SinvComp where idCompuesto = '$Producto_id' and activo = 1");
				while ($rowCompuestos = mysqli_fetch_array($resultCompuestos)) {
					$ArregloProductos[$rowCompuestos['idSinvetrios']]=$rowCompuestos['cantidad'];
				}

                //aqui recorremos el arreglo generado arriba de los productos que se van a descontar para guardar el id de sinvdep
				foreach ($ArregloProductos as $key => $value) {
					$QueryProductoLoteTallas = mysqli_query($conn3, "SELECT * FROM  SinvDep where idSinvetrios = $key AND idDep = $deposito LIMIT 1");
					$nrowl = mysqli_num_rows($QueryProductoLoteTallas);
					while ($RowProducto = mysqli_fetch_array($QueryProductoLoteTallas)) {
						$ArregloExistenciasProducto[$key]["id"] = $RowProducto['id'];
					}
				}
				
                //aqui recorremos los productos que se van a descontar y se multiplicara por la cantidad que se agrego en el detalle del producto al facturar para tener el total de productos a descontar para ese producto simple dentro de esteproducto compuesto
				foreach ($ArregloProductos as $key => $value) {
					$ArregloExistencias_InvDep[$ArregloExistenciasProducto[$key]["id"]]["Existencias Descontar"] = $ArregloExistencias_InvDep[$ArregloExistenciasProducto[$key]["id"]]["Existencias Descontar"] + $Cantidad_Producto*$ArregloProductos[$key];
				}

			}
			
		}
	}

    //aqui recorremos los productos que generamos arriba  para aqui validar si hay existencias suficientes o no y para agregar mas informacion para visualizar al momento de generar el alerta
	foreach ($ArregloExistencias_InvDep as $key => $value) {
		$ExistenciasDescontar = $value['Existencias Descontar'];

		$QueryProductoLoteTallas = mysqli_query($conn3, "SELECT * FROM  SinvDep where id = $key LIMIT 1");
		while ($RowProducto = mysqli_fetch_array($QueryProductoLoteTallas)) {
			$ExistenciasSistema = $RowProducto['existencia'];
			$sinvetrios = $RowProducto['idSinvetrios'];
			$queryinv = mysqli_query($conn3, "SELECT * FROM  sinvetrios where id = $sinvetrios LIMIT 1");
			while ($rowinv = mysqli_fetch_array($queryinv)) {
				$Nombre = $rowinv['descripcion'];
			}
		}

		if($ExistenciasDescontar<=$ExistenciasSistema){
			$Arreglo["Detalles"][$key]["Nombre"] = $Nombre;
			$Arreglo["Detalles"][$key]["Estado"] = true;
			$Arreglo["Detalles"][$key]["Existencia"] = $ExistenciasSistema;
			$Arreglo["Detalles"][$key]["Descontar"] = $ExistenciasDescontar;
		}else{
			$Arreglo["Detalles"][$key]["Nombre"] = $Nombre;
			$Arreglo["Detalles"][$key]["Estado"] = false;
			$Arreglo["Detalles"][$key]["Existencia"] = $ExistenciasSistema;
			$Arreglo["Detalles"][$key]["Descontar"] = $ExistenciasDescontar;
			$Arreglo["Detalles"][$key]["Motivo"] = "No  se encuentran existencias suficientes para este producto, una posibilidad es que este agregando un producto simple y uno compuesto en la misma factura y generen este inconveniente al sobrepasar las existencias a facturar, eliminar el detalle del producto";
			$Arreglo["Alerta"] = "1";
		}
	}

	return $Arreglo;
}




include 'FA_Include_ValidacionExistenciasProductos.php';
$ArregloExistencias = CalcularExistenciasDescontar_Presupuesto($idUsuario,$idCliente,$Deposito_id,$idOperacion);// aqui enviar el id del cliente para que funcione correctamente la funcion, ya que en pos se envia en 0 para tenerlo encuenta


echo "<pre>";
	print_r($ArregloExistencias);
	echo "</pre>";
	//exit();


if ($ArregloExistencias["Alerta"] == "1") {
  // Mostrar una confirmación de diálogo al usuario
  echo '<script>
      alert("Las existencias son inferiores a la cantidad a descontar.");
      if (window.history && window.history.length > 1) {
        window.history.back();
    } else {
        // Si no es posible volver atrás, redirigir a portada.php
        window.location.href = "portada.php";
    }
      
  </script>';
}else{

	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$Campo1 = mysqli_query($conn3, "show COLUMNS from sOperacionInv WHERE Field = 'tipo_anterior_presupuesto';");
$nrowCampo1 = mysqli_num_rows($Campo1);
if ($nrowCampo1 == "0") {
	mysqli_query($conn3, "ALTER TABLE `sOperacionInv` ADD `tipo_anterior_presupuesto` INT(11) NULL DEFAULT '0' COMMENT 'aqui estara almacenado el tipo del presupuesto que era antes de ser cambiado a 1 para volverlo factura, solo aplica para presupuestos*Creado desde Facturar Presuopuesto*'");
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  //aqui es el arreglo que trae la funcion CalcularExistenciasDescontar en la cual traera los id de los SinvDep y la cantidad a descontar
  foreach ($ArregloExistencias['Detalles'] as $key => $value) {
    $SinvDep_id = $key;
    $Descontar = $value['Descontar'];
  
    $Query_SinvDep = mysqli_query($conn3, "SELECT * FROM  SinvDep where id = $SinvDep_id");
    while ($RowSinvDep = mysqli_fetch_array($Query_SinvDep)) {
      $existencia = $RowSinvDep['existencia'];
    }
    $NewExistencia = $existencia - $Descontar;
    mysqli_query($conn3, "UPDATE SinvDep set existencia = '$NewExistencia'  WHERE id = '$SinvDep_id'");
    //echo "UPDATE SinvDep set existencia = '$NewExistencia'  WHERE id = $SinvDep_id <br>";
  } 

   mysqli_query($conn3,"UPDATE  sOperacionInv set tipo =1, tipo_anterior_presupuesto='$tipo_presupuesto'  where idOperacion = $idOperacion");

   echo "<script language='Javascript'> window.location='preliminarFactura.php?idOperacion=$idOperacion';</script>"; 
}

          




           //echo "<script language='Javascript'> window.location='preliminarFactura.php?idOperacion=$idOperacion';</script>"; 

            

