<?php
//////////////////////////? FUNCION CALCULAR EXISTENCIAS A DESCONTAR ///////////////////////////////////////
//////////////////////////? FUNCION CALCULAR EXISTENCIAS A DESCONTAR ///////////////////////////////////////
//////////////////////////? FUNCION CALCULAR EXISTENCIAS A DESCONTAR ///////////////////////////////////////

//Esto se usa en POS,Generar Factura
function CalcularExistenciasDescontar($usuario_id, $cliente_id, $deposito,$tipoFactura){
	include 'funciones/conn3.php';
	$usuario_id = $usuario_id;
	$cliente_id = $cliente_id;
	$deposito = $deposito;

    //aqui se realiza la consulta de todos detalles a facturar
	$queryListT = mysqli_query($conn3, "SELECT * FROM  sDetalleOperPendites WHERE estado = 1 and id_usuario =$usuario_id and  id_cliente = $cliente_id AND tipo = '$tipoFactura' ORDER BY id ASC");
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
			$Arreglo["Enviar"] = false;
		}
	}

	return $Arreglo;
}



//////////////////////////? [FIN] FUNCION CALCULAR EXISTENCIAS A DESCONTAR ///////////////////////////////////////
//////////////////////////? [FIN] FUNCION CALCULAR EXISTENCIAS A DESCONTAR ///////////////////////////////////////
//////////////////////////? [FIN] FUNCION CALCULAR EXISTENCIAS A DESCONTAR ///////////////////////////////////////

//////////////////////////?  FUNCION MAS DETALLES ///////////////////////////////////////
//////////////////////////?  FUNCION MAS DETALLES ///////////////////////////////////////
//////////////////////////?  FUNCION MAS DETALLES ///////////////////////////////////////
// esto se usa en pos,generar factura,generar compra,generar presupuesto,generar salida del inventario,generar entrada del inventario,generar transferencia
function MasDetalles($idProductoT, $SinvDep_id)
{
	include 'funciones/conn3.php';

	$QueryInventario = mysqli_query($conn3, "SELECT * FROM  sinvetrios where ID = $idProductoT");
	while ($RowInventario = mysqli_fetch_array($QueryInventario)) {
		$tipo = $RowInventario['tipo'];
	}
	$TipoInventario = funcionMaster($tipo, 'id', 'tipo', 'scategoria');

	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$TextoInventario = "";
	if ($TipoInventario == "3") {

		$TextoInventarioCompuesto = "";
		$resultCompuestos = mysqli_query($conn3, "SELECT * from SinvComp where idCompuesto = '$idProductoT' and activo = 1");
		while ($rowCompuestos = mysqli_fetch_array($resultCompuestos)) {
			$TextoInventarioCompuesto .= funcionMaster($rowCompuestos['idSinvetrios'], 'id', 'descripcion', 'sinvetrios') . " x" . $rowCompuestos['cantidad'] . " | ";
		}
		$TextoInventario = "[" . $TextoInventarioCompuesto . "]";
	} else if ($TipoInventario == "5") {

		$TextoInventarioLotesTallas = "";
		$resultCompuestos = mysqli_query($conn3, "SELECT * from SinvDep where id = '$SinvDep_id' ");
		while ($rowCompuestos = mysqli_fetch_array($resultCompuestos)) {
            if ($TipoInventario == "5") {
				$TextoInventarioLotesTallas = $rowCompuestos['lote'];
			}
		}
		$TextoInventario = "[" . $TextoInventarioLotesTallas . "]";
	}

	return $TextoInventario;
}

//////////////////////////?  [FIN] FUNCION MAS DETALLES ///////////////////////////////////////
//////////////////////////?  [FIN] FUNCION MAS DETALLES ///////////////////////////////////////
//////////////////////////?  [FIN] FUNCION MAS DETALLES ///////////////////////////////////////




//////////////////////////? FUNCION CALCULAR EXISTENCIAS EN LA DEVOLUCION ///////////////////////////////////////
//////////////////////////? FUNCION CALCULAR EXISTENCIAS EN LA DEVOLUCION ///////////////////////////////////////
//////////////////////////? FUNCION CALCULAR EXISTENCIAS EN LA DEVOLUCION ///////////////////////////////////////


function CalcularExistencias_Devolucion($cliente_id, $deposito,$idOperacion){
	include 'funciones/conn3.php';
	$cliente_id = $cliente_id;
	$deposito = $deposito;

    //aqui se realiza la consulta de todos detalles a facturar
	$queryListT = mysqli_query($conn3, "SELECT * FROM  sDetalleOperDevolucion WHERE estado = 1 and  id_cliente = $cliente_id AND idOperacion = $idOperacion ORDER BY id ASC");
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

//////////////////////////? [FIN] FUNCION CALCULAR EXISTENCIAS EN LA DEVOLUCION ///////////////////////////////////////
//////////////////////////? [FIN] FUNCION CALCULAR EXISTENCIAS EN LA DEVOLUCION ///////////////////////////////////////
//////////////////////////? [FIN] FUNCION CALCULAR EXISTENCIAS EN LA DEVOLUCION ///////////////////////////////////////

?>