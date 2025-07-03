<?php
date_default_timezone_set('America/Bogota');
include("funciones/conn3.php");
include("funciones/funciones.php");


function CargarDocumentos_DocumentosSistema($usuario_documento, $Documentos, $Carpeta)
{
	include 'funciones/conn3.php';
	if (!empty($Documentos['name'])) {

		$tabla = mysqli_query($conn3, "SHOW TABLES LIKE 'Documentos_Sistema'");
		$nrowtabla = mysqli_num_rows($tabla);
		if ($nrowtabla == 0) {
			$query = "CREATE TABLE `Documentos_Sistema` ( 
				`id` INT(11) NOT NULL AUTO_INCREMENT , 
				`Fecha` DATETIME NULL DEFAULT CURRENT_TIMESTAMP ,
				`usuario_id` INT(11) NULL DEFAULT '0' ,
				`cliente_id` INT(11) NULL DEFAULT '0' ,
				`tabla_id` INT(11) NULL DEFAULT '0' ,
				`Tabla` TEXT NULL DEFAULT '' ,
				`Nombre` TEXT NULL DEFAULT '' ,
				`Nombre_Original` TEXT NULL DEFAULT '' , 
				`Ruta` TEXT NULL DEFAULT '' ,
				`Carpeta` TEXT NULL DEFAULT '',
				`Activo` varchar(5) DEFAULT '1',
				PRIMARY KEY (`id`)) ENGINE = MyISAM;";

			$creaciontabla = mysqli_query($conn3, $query);
			if (!$creaciontabla) {
				echo "<script language='Javascript'> alert('error en la creacion de la tabla');
				window.location='portada';</script>";
				exit();
			}
		}

		// Carpeta de destino para guardar los archivos
		$carpetaDestinoInicial = 'Documentos Sistema/';
		// Verificar si la carpeta de destino existe, de lo contrario, crearla
		if (!is_dir($carpetaDestinoInicial)) {
			mkdir($carpetaDestinoInicial, 0777, true);
		}

		// Carpeta de destino para guardar los archivos
		$carpetaDestino = $carpetaDestinoInicial . $Carpeta . '/';
		// Verificar si la carpeta de destino existe, de lo contrario, crearla
		if (!is_dir($carpetaDestino)) {
			mkdir($carpetaDestino, 0777, true);
		}

		// Iterar sobre cada archivo cargado
		$Contador = 0;
		foreach ($Documentos['tmp_name'] as $key => $tmpName) {

			if ($tmpName != "") {

				$NombreArchivoInicial = $Documentos['name'][$key];
				$NombreArchivoFinal = str_replace("'", "", $NombreArchivoInicial);
				$fechahora = date("Y-m-d_H-i-s");
				$numeroAleatorio = rand(1, 9999);
				$nombreArchivo = "{$usuario_documento}__{$fechahora}__{$numeroAleatorio}_" . $NombreArchivoFinal;

				$archivoDestino = $carpetaDestino . $nombreArchivo;

				// Mover archivo temporal a la carpeta de destino
				if (move_uploaded_file($tmpName, $archivoDestino)) {
					$ArregloDocumentos[$Contador]["Nombre"] = $nombreArchivo;
					$ArregloDocumentos[$Contador]["Nombre_Original"] = $NombreArchivoFinal;
					$ArregloDocumentos[$Contador]["Ruta"] = $carpetaDestino;
					$ArregloDocumentos[$Contador]["Carpeta"] = $Carpeta;
					$ArregloDocumentos[$Contador]["usuario_id"] = $usuario_documento;

					//echo 'El archivo "' . $NombreArchivoFinal . '" se ha subido correctamente.<br>';
				} else {
					//echo '<script>alert("Error al subir el archivo' . $NombreArchivoFinal . ', Volver a Subirlo");</script>';
					//exit();
				}
				$Contador++;
			}
		}

		return $ArregloDocumentos;
	} else {
		return 'No se han seleccionado archivos para subir.<br>';
	}
}


$id_usuario  			= $_POST['id_usuario'];
//$montoPagado  			= $_POST['montoPagado'];
$montoPagado = "0";
$nota  			        = $_POST['nota'];
$fechaVencimiento 		= $_POST['fechaVencimiento'];
$clienteId   			= 0;
$ID_Empresa   			= $_POST['ID_Empresa'];
$tipo   			= $_POST['tipo'];
$metodo_pago   			= $_POST['metodo_pago'];
$totalpuntos   			= $_POST['totalpuntos'];

$historia  = $_POST['historia'];
$tipo_historia = $_POST['tipo_historia'];
$fechaRegistro             = date("Y-m-d H:i:s");

$convenio_id = $_POST['convenio_id'];

/////////////////////////////////////////////////////////////////Agregar convenio id /////////////////////////////////////////////////////////////////////////////////////////////
$Campo1 = mysqli_query($conn3, "show COLUMNS from sOperacionInv WHERE Field = 'Arreglo_Detalles_Cliente_Entidad';");
$nrowCampo1 = mysqli_num_rows($Campo1);
if ($nrowCampo1 == "0") {
    mysqli_query($conn3, "ALTER TABLE `sOperacionInv` ADD `Arreglo_Detalles_Cliente_Entidad` TEXT NULL COMMENT 'arreglo con los detalles relacionales de detalle cliente a detalle entidad *Creado desde modulo de EN_totalizarfacturaentidad*'");
}

/////////////////////////////////////////////////////////////////Agregar convenio id /////////////////////////////////////////////////////////////////////////////////////////////

$queryList = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = $id_usuario");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
	$moneda = $rowMotorizado['moneda'];
	$impuestoF = $rowMotorizado['impuestoF'];
}


$queryList = mysqli_query($conn3, "SELECT * FROM  usuarios where ID = $id_usuario");
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
	$numeroFactura			= $rowMotorizado['numeroFactura'];
	$numeroOrden			= $rowMotorizado['numeroOrden'];
}

$queryList = mysqli_query($conn3, "SELECT * FROM  configPuntos where ID_Usuario = $id_usuario");
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
	$equivalenPuntos			= $rowMotorizado['equivalenPuntos'];
}

/*
$queryList = mysqli_query($conn3, "SELECT * FROM  sDetalleMetodosPagos where id_usuario =$id_usuario and  id_cliente = $clienteId AND Activo = 1 AND tipo = 9 ");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
	$metodo_pago		        = $rowMotorizado['metodo_pago'];
}
*/
//?
$Deposito_id = $_POST['Deposito_id'];
if ($Deposito_id == "") {
	$Deposito_id = "0";
}



	///?
    //tipo = 10 es para factura entidad
	$queryList = mysqli_query($conn3, "SELECT SUM(totalbase) as sumTotalbase, SUM(cantidad) as sumCantidad, SUM(subTotal) as sumSubTotal, SUM(Descuento_Numerico)
			as sumDescuento,SUM(Impuesto_Numerico) as sumImpuesto,SUM(Total) as sumTotal from   sDetalleOperPendites  where estado = 1 and id_usuario =$id_usuario and  convenio_id = $convenio_id AND tipo='10' order by id");
	while ($rowMotorizado = mysqli_fetch_array($queryList)) {
		$sumTotalbase		= $rowMotorizado['sumTotalbase'];
		$sumCantidad	= $rowMotorizado['sumCantidad'];
		$sumSubTotal	= $rowMotorizado['sumSubTotal'];
		$sumDescuento = $rowMotorizado['sumDescuento'];

		$sumImpuesto = $rowMotorizado['sumImpuesto'];
		$sumTotal = $rowMotorizado['sumTotal'];
	}

	if ($sumImpuesto == "") {
		$sumImpuesto = 0;
	}
	$impuestoF = 0;

	if ($sumCantidad == "") {
		echo "<script type='text/javascript'>alert('Debe Agregar Minimo 1 Detalle');history.back();</script>";
		exit();
	}


	$queryList = mysqli_query($conn3, "SELECT puntosCanjeados FROM sOperacionInv WHERE idCliente = '$clienteId' ORDER BY fechaOperacion");

	$nrowl = mysqli_num_rows($queryList);
	while ($rowMotorizado = mysqli_fetch_array($queryList)) {
		$contador = $rowMotorizado['puntosCanjeados'];
	}


	if ($metodo_pago <> '5') {
		$operacion = 1;
		$TotalPuntos = $total / $equivalenPuntos;
		$TotalResultado = $contador + $TotalPuntos;
	}


	if ($metodo_pago == '5') {
		$operacion = 0;
		$TotalPuntos = $total / $equivalenPuntos;
		$TotalResultado = $contador - $totalpuntos;
	}

	//Operaciones Puntos
	mysqli_query($conn3, "INSERT INTO operacionesPuntos 
				(idCliente, Fecha, Puntos, Operacion) 
				VALUES                     
				( '$clienteId','$fechaRegistro', '$TotalResultado', '$operacion');") or die(mysqli_error($conn3));

	$numeroFactura++;

	
	
    

	
	mysqli_query($conn3, "INSERT INTO sOperacionInv 
				(numeroDoc, idCliente, idEmpresa, fechaOperacion, fechaVencimiento, docOrigen, seriaOperacion, impuesto, impuestoBase, 
				totalBruto, totalNeto, cantidadProduc, descuentos, montoPagado, nota ,id_historia , tipo_historia,tipo, puntosCanjeados,Deposito_id,convenio_id) 
				VALUES                     
				('$numeroFactura', '$clienteId', '$id_usuario', '$fechaRegistro', '$fechaVencimiento', '0', NULL,'$impuestoF', '$sumImpuesto',
				'$sumTotalbase', '$sumTotal', '$sumCantidad', '$sumDescuento', '$montoPagado' , '$nota' ,'$historia', '$tipo_historia','$tipo', '$TotalResultado','$Deposito_id','$convenio_id');") or die(mysqli_error($conn3));

	$idOperacion = mysqli_insert_id($conn3);

	

	if ($idOperacion != "0") {
		$Documentos = $_FILES['Documentos'];
		$DatosDocumentos = CargarDocumentos_DocumentosSistema($id_usuario, $_FILES['Documentos'], "Factura");

		foreach ($DatosDocumentos as $key => $value) {

			$Doc_Nombre = $value["Nombre"];
			$Doc_Nombre_Original = $value["Nombre_Original"];
			$Doc_Ruta = $value["Ruta"];
			$Doc_Carpeta = $value["Carpeta"];
			$Tabla = "sOperacionInv";
			$tabla_id = $idOperacion;
			$Doc_usuario_id = $value["usuario_id"];

			//insert en la tabla de arriba
			$Respuesta = mysqli_query($conn3, "INSERT INTO Documentos_Sistema (usuario_id,cliente_id, tabla_id, Tabla, Nombre, Nombre_Original, Ruta, Carpeta) VALUES ('$Doc_usuario_id','$clienteId','$tabla_id', '$Tabla','$Doc_Nombre', '$Doc_Nombre_Original', '$Doc_Ruta', '$Doc_Carpeta')") or die(mysqli_error($conn3));
			if ($Respuesta != true) {
				echo "<script> alert('Error al insertar un documento $Doc_Nombre_Original')</script>";
			}
		}
	}

    include 'FA_Include_ValidacionExistenciasProductos.php';

	mysqli_query($conn3, "UPDATE usuarios set numeroFactura = $numeroFactura where ID = $id_usuario;");

    //tipo = 10 es para factura entidad
    $Contador=0;
	$queryList = mysqli_query($conn3, "SELECT * FROM  sDetalleOperPendites where estado = 1 and id_usuario =$id_usuario and  convenio_id = $convenio_id AND tipo='10'");
	$nrowl = mysqli_num_rows($queryList);
	while ($rowMotorizado = mysqli_fetch_array($queryList)) {
		$id		        = $rowMotorizado['id'];
		$cantidad		= $rowMotorizado['cantidad'];
		$descripcion	= $rowMotorizado['descripcion'];
		$base			= $rowMotorizado['base'];
		$totalbase		= $rowMotorizado['totalbase'];
		$subTotal		= $rowMotorizado['subTotal'];
		$id_usuario1		= $rowMotorizado['id_usuario'];
		$idProducto = $rowMotorizado['idProducto'];

		$cantidad_producto = funcionMaster($idProducto, 'ID', 'existencia', 'sinvetrios');
		$cantidad_producto = $cantidad_producto - $cantidad;


		$Descuento_Numerico = $rowMotorizado['Descuento_Numerico'];
		$Descuento_Textual  = $rowMotorizado['Descuento_Textual'];
		$Tipo_Producto  = $rowMotorizado['Tipo_Producto'];

		$Impuesto_Numerico = $rowMotorizado['Impuesto_Numerico'];
		$Impuesto_Textual  = $rowMotorizado['Impuesto_Textual'];
		$Total = $rowMotorizado['Total'];


		$PaqueteProcedimiento_id = $rowMotorizado['PaqueteProcedimiento_id'];


		//?
		$Deposito_id = $rowMotorizado['Deposito_id'];
		$SinvDep_id = $rowMotorizado['SinvDep_id'];
		//aqui llama a la funcion MasDetalles Para traer informacion adicional del producto ya sea el lote o los productos que contiene el producto compuesto
		$Mas_Detalles = mysqli_real_escape_string($conn3, MasDetalles($idProducto, $SinvDep_id));
		///?

        ////////////////factura clientes entidad //////////////////////////
        $Copago = $rowMotorizado['Copago'];
        $Tarifa_Convenio = $rowMotorizado['Tarifa_Convenio'];
        $Paquete_id = $rowMotorizado['Paquete_id'];
        $Valor_Tarifa_Completa = $rowMotorizado['Valor_Tarifa_Completa'];
		$convenio_id_detalle = $rowMotorizado['convenio_id'];

		mysqli_query($conn3, "INSERT INTO sDetalleOper (idOperacion, fechaRegistro, idProducto, cantidad, descripcion, base, impuesto,
				totalbase, subTotal, id_usuario, id_cliente,Descuento_Numerico,Descuento_Textual,PaqueteProcedimiento_id,Tipo_Producto,SinvDep_id,Deposito_id,Mas_Detalles,Impuesto_Numerico,Impuesto_Textual,Total
                ,Copago,Tarifa_Convenio,Paquete_id,Estado_Detalle_Convenio,Valor_Tarifa_Completa,convenio_id) 
									VALUES ('$idOperacion','$fechaRegistro', '$idProducto','$cantidad','$descripcion','$base','0', 
				'$totalbase', '$subTotal', '$id_usuario1', '$clienteId','$Descuento_Numerico','$Descuento_Textual','$PaqueteProcedimiento_id','$Tipo_Producto','$SinvDep_id','$Deposito_id','$Mas_Detalles','$Impuesto_Numerico','$Impuesto_Textual','$Total'
                ,'$Copago','$Tarifa_Convenio','$Paquete_id','','$Valor_Tarifa_Completa','$convenio_id_detalle');");
        $Detalle_id_Entidad = mysqli_insert_id($conn3);

		//mysqli_query($conn3, "UPDATE sinvetrios SET existencia='$cantidad_producto' WHERE ID='$idProducto'");
		mysqli_query($conn3, "UPDATE sDetalleOperPendites set estado = 2 where id = $id");

        $id_detalle_original = $rowMotorizado['detalle_id_entidad_producto'];
		if($id_detalle_original!="0"){
			mysqli_query($conn3, "UPDATE sDetalleOper set Estado_Detalle_Convenio= 2 WHERE id = '{$id_detalle_original}' limit 1;");
		}
        

        $ArregloDetalles[$Contador]["Detalle_Cliente"]= $id_detalle_original;
        $ArregloDetalles[$Contador]["Detalle_Entidad"]= $Detalle_id_Entidad;

        $Contador++;
		
	}



	$MontoPagadoDetalles = "0";
    //tipo = 10 es para factura entidad
	$queryList = mysqli_query($conn3, "SELECT * FROM  sDetalleMetodosPagos where id_usuario =$id_usuario and  convenio_id = $convenio_id AND idOperacion = '0' AND tipo = '10' AND Activo = 1 ");
	$nrowl = mysqli_num_rows($queryList);
	while ($rowMotorizado = mysqli_fetch_array($queryList)) {
		$id		        = $rowMotorizado['id'];
		$tipo 		        = $rowMotorizado['tipo'];
		$ID_Empresa 		        = $rowMotorizado['ID_Empresa'];
		$nota_pago 		        = $rowMotorizado['nota_pago'];
        //tipo = 10 es para factura entidad
		if ($tipo == 10) {
			mysqli_query($conn3, "UPDATE sDetalleMetodosPagos SET idOperacion = '$idOperacion' WHERE id = '$id'");
			$MontoPagadoDetalles = $MontoPagadoDetalles + $nota_pago;
		} else {
			// echo "Hubo un Error";
		}
	}

    $ArregloJSON= json_encode($ArregloDetalles,true);
	$MontoPagadoDetalles = round($MontoPagadoDetalles, 2);
	mysqli_query($conn3, "UPDATE sOperacionInv SET montoPagado = '$MontoPagadoDetalles', Arreglo_Detalles_Cliente_Entidad='$ArregloJSON' WHERE idOperacion = '$idOperacion'");

//echo $idOperacion;

//////////////////////////////////? solo aplica para capitacion ////////////////////////////////////////////////////////////////////////////////
$Detalle_id_Entidad = $Detalle_id_Entidad;
$Contador = 0;
$TipoConvenio = funcionMaster($convenio_id, 'id', 'Tipo_Contrato', 'Rips_Convenio');
if($TipoConvenio=="1"){
	$QueryOperacion = mysqli_query($conn3, "SELECT * FROM sOperacionInv where tipo = 9 AND convenio_id = $convenio_id");
	while ($rowMotorizado = mysqli_fetch_array($QueryOperacion)) {
	$idOperacion1 = $rowMotorizado['idOperacion'];

		$QueryDetalle = mysqli_query($conn3, "SELECT * FROM sDetalleOper where idOperacion = '$idOperacion1' AND
		Estado_Detalle_Convenio ='0' AND Devolucion = 0");
		while ($RowDetalle = mysqli_fetch_array($QueryDetalle)) {

			$ArregloDetallesCapitacion[$Contador]["Detalle_Cliente"]= $RowDetalle['id'];
        	$ArregloDetallesCapitacion[$Contador]["Detalle_Entidad"]= $Detalle_id_Entidad;
			$Contador++;

			$id_Detalle = $RowDetalle['id'];
			mysqli_query($conn3, "UPDATE sDetalleOper set Estado_Detalle_Convenio= 2 WHERE id = '{$id_Detalle}' limit 1;");
		}

	}

	$ArregloJSON= json_encode($ArregloDetallesCapitacion,true);
	mysqli_query($conn3, "UPDATE sOperacionInv SET Arreglo_Detalles_Cliente_Entidad='$ArregloJSON' WHERE idOperacion = '$idOperacion'");

}

echo "<script language='Javascript'> window.location='EN_PreliminarEntidadFactura?idOperacion=$idOperacion';</script>"
?>