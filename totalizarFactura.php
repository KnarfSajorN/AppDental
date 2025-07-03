<?php
date_default_timezone_set('America/Bogota');
include ("funciones/conn3.php");
include ("funciones/funciones.php");
session_start();
$idsession = $_SESSION['ID'];
$id_principal = $_SESSION['ID_principal'];
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


$id_usuario = $_POST['id_usuario'];
//$montoPagado  			= $_POST['montoPagado'];
$montoPagado = "0";
$nota = $_POST['nota'];
$fechaVencimiento = $_POST['fechaVencimiento'];
$clienteId = $_POST['id_cliente'];
$ID_Empresa = $_POST['ID_Empresa'];
$tipo = $_POST['tipo'];
$metodo_pago = $_POST['metodo_pago'];
$totalpuntos = $_POST['totalpuntos'];

$historia = $_POST['historia'];
$tipo_historia = $_POST['tipo_historia'];
$fechaRegistro = date("Y-m-d H:i:s");


$queryList = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = $id_usuario");
// $nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
	$moneda = $rowMotorizado['moneda'];
	$impuestoF = $rowMotorizado['impuestoF'];
}


$queryList = mysqli_query($conn3, "SELECT * FROM  usuarios where ID = $id_usuario");
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
	$numeroFactura = $rowMotorizado['numeroFactura'];
	$numeroOrden = $rowMotorizado['numeroOrden'];
}

$queryList = mysqli_query($conn3, "SELECT * FROM  configPuntos where ID_Usuario = $id_usuario");
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
	$equivalenPuntos = $rowMotorizado['equivalenPuntos'];
}


$queryList = mysqli_query($conn3, "SELECT * FROM  sDetalleMetodosPagos where id_usuario =$idsession and  id_cliente = $clienteId AND Activo = 1 AND tipo = 1 ");
// $nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
	$metodo_pago = $rowMotorizado['metodo_pago'];
}

//?
$Deposito_id = $_POST['Deposito_id'];
if ($Deposito_id == "") {
	$Deposito_id = "0";
}


if ($clienteId > 0) {

	include 'FA_Include_ValidacionExistenciasProductos.php';
	$ArregloExistencias = CalcularExistenciasDescontar($id_usuario, $clienteId, $Deposito_id, '1'); // aqui enviar el id del cliente para que funcione correctamente la funcion, ya que en pos se envia en 0 para tenerlo encuenta
	//echo "<pre>";
	//print_r($ArregloExistencias);
	//echo "</pre>";
	//exit();
	///?

	$queryList = mysqli_query($conn3, "SELECT SUM(totalbase) as sumTotalbase, SUM(cantidad) as sumCantidad, SUM(subTotal) as sumSubTotal, SUM(Descuento_Numerico)
			as sumDescuento,SUM(Impuesto_Numerico) as sumImpuesto,SUM(Total) as sumTotal from   sDetalleOperPendites  where estado = 1 and id_usuario =$idsession and  id_cliente = $clienteId AND tipo='1' order by id");

	if ($queryList) {
		while ($rowMotorizado = mysqli_fetch_array($queryList)) {
			$sumTotalbase = $rowMotorizado['sumTotalbase'];
			$sumCantidad = $rowMotorizado['sumCantidad'];
			$sumSubTotal = $rowMotorizado['sumSubTotal'];
			$sumDescuento = $rowMotorizado['sumDescuento'];

			$sumImpuesto = $rowMotorizado['sumImpuesto'];
			$sumTotal = $rowMotorizado['sumTotal'];
		}
	}


	if ($sumImpuesto == "") {
		$sumImpuesto = 0;
	}
	$impuestoF = 0;

	if ($sumCantidad == "") {
		echo "<script type='text/javascript'>alert('Debe Agregar Minimo 1 Detalle');history.back();</script>";
		exit();
	}

	/*
				   $total1="0";//?
				   if ($impuestoF > 0) {
					   $impuestoF2 = $impuestoF / 100;
					   $total1 =  $sumSubTotal * $impuestoF2;
					   $total =  $total1 + $sumSubTotal;
				   } else {
					   $total =  $sumSubTotal;
				   }
				   */

	$queryList = mysqli_query($conn3, "SELECT puntosCanjeados FROM sOperacionInv WHERE idCliente = '$clienteId' ORDER BY fechaOperacion");

	// $nrowl = mysqli_num_rows($queryList);
	if ($queryList) {
		while ($rowMotorizado = mysqli_fetch_array($queryList)) {
			$contador = $rowMotorizado['puntosCanjeados'];
		}
	}



	if ($metodo_pago <> '5') {
		$operacion = 1;

		if ($equivalenPuntos == 0) {
			$TotalPuntos = 0;
		} else {
			$TotalPuntos = $total / $equivalenPuntos;
		}


		$TotalResultado = intval($contador) + intval($TotalPuntos);
	}


	if ($metodo_pago == '5') {
		$operacion = 0;
		if ($equivalenPuntos) {
			$TotalPuntos = $total / $equivalenPuntos;
		}

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
				totalBruto, totalNeto, cantidadProduc, descuentos, montoPagado, nota ,id_historia , tipo_historia,tipo, puntosCanjeados,Deposito_id, ID_principal) 
				VALUES                     
				('$numeroFactura', '$clienteId', '$id_usuario', '$fechaRegistro', '$fechaVencimiento', '0', NULL,'$impuestoF', '$sumImpuesto',
				'$sumTotalbase', '$sumTotal', '$sumCantidad', '$sumDescuento', '$montoPagado' , '$nota' ,'$historia', '$tipo_historia','$tipo', '$TotalResultado','$Deposito_id','$id_principal');") or die(mysqli_error($conn3));

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

	mysqli_query($conn3, "UPDATE usuarios set numeroFactura = $numeroFactura where ID = $id_usuario;");

	//Parte 1/2 Adjuntar Seriales /////////////////////////
	include 'IN_IncludeSerialesDetallesGuardadoPHP.php';
	///////////////////////////////////////////////////////
	$queryList = mysqli_query($conn3, "SELECT * FROM  sDetalleOperPendites where estado = 1 and id_usuario =$idsession and  id_cliente = $clienteId AND tipo='1'");
	// $nrowl = mysqli_num_rows($queryList);
	if ($queryList) {
		while ($rowMotorizado = mysqli_fetch_array($queryList)) {
			$id = $rowMotorizado['id'];
			$cantidad = $rowMotorizado['cantidad'];
			$descripcion = $rowMotorizado['descripcion'];
			$base = $rowMotorizado['base'];
			$totalbase = $rowMotorizado['totalbase'];
			$subTotal = $rowMotorizado['subTotal'];
			$id_usuario1 = $rowMotorizado['id_usuario'];
			$idProducto = $rowMotorizado['idProducto'];

			$cantidad_producto = funcionMaster($idProducto, 'ID', 'existencia', 'sinvetrios');
			$cantidad_producto = $cantidad_producto - $cantidad;


			$Descuento_Numerico = $rowMotorizado['Descuento_Numerico'];
			$Descuento_Textual = $rowMotorizado['Descuento_Textual'];
			$Tipo_Producto = $rowMotorizado['Tipo_Producto'];

			$Impuesto_Numerico = $rowMotorizado['Impuesto_Numerico'];
			$Impuesto_Textual = $rowMotorizado['Impuesto_Textual'];
			$Total = $rowMotorizado['Total'];


			$PaqueteProcedimiento_id = $rowMotorizado['PaqueteProcedimiento_id'];


			//?
			$Deposito_id = $rowMotorizado['Deposito_id'];
			$SinvDep_id = $rowMotorizado['SinvDep_id'];
			//aqui llama a la funcion MasDetalles Para traer informacion adicional del producto ya sea el lote o los productos que contiene el producto compuesto
			$Mas_Detalles = mysqli_real_escape_string($conn3, MasDetalles($idProducto, $SinvDep_id));
			///?

			mysqli_query($conn3, "INSERT INTO sDetalleOper (idOperacion, fechaRegistro, idProducto, cantidad, descripcion, base, impuesto,
				totalbase, subTotal, id_usuario, id_cliente,Descuento_Numerico,Descuento_Textual,PaqueteProcedimiento_id,Tipo_Producto,SinvDep_id,Deposito_id,Mas_Detalles,Impuesto_Numerico,Impuesto_Textual,Total) 
									VALUES ('$idOperacion','$fechaRegistro', '$idProducto','$cantidad','$descripcion','$base','0', 
				'$totalbase', '$subTotal', '$id_usuario', '$clienteId','$Descuento_Numerico','$Descuento_Textual','$PaqueteProcedimiento_id','$Tipo_Producto','$SinvDep_id','$Deposito_id','$Mas_Detalles','$Impuesto_Numerico','$Impuesto_Textual','$Total');");


			//Parte 2/2 Adjuntar Seriales ////////////////////////////////////////
			$Detalle_id = mysqli_insert_id($conn3);
			AdjuntarDetalleId_Serial($rowMotorizado['Seriales_Arreglo_id'], $Detalle_id, $SinvDep_id);
			/////////////////////////////////////////////////////////////////////

			//mysqli_query($conn3, "UPDATE sinvetrios SET existencia='$cantidad_producto' WHERE ID='$idProducto'");
			mysqli_query($conn3, "UPDATE sDetalleOperPendites set estado = 2 where id = $id");


		}
	}


	//?
	//aqui es el arreglo que trae la funcion CalcularExistenciasDescontar en la cual traera los id de los SinvDep y la cantidad a descontar
	foreach ($ArregloExistencias['Detalles'] as $key => $value) {
		$SinvDep_id = $key;
		$Descontar = $value['Descontar'];

		$Query_SinvDep = mysqli_query($conn3, "SELECT * FROM  SinvDep where id = $SinvDep_id");
		if ($Query_SinvDep) {
			while ($RowSinvDep = mysqli_fetch_array($Query_SinvDep)) {
				$existencia = $RowSinvDep['existencia'];
			}
		}

		$NewExistencia = $existencia - $Descontar;
		mysqli_query($conn3, "UPDATE SinvDep set existencia = '$NewExistencia'  WHERE id = '$SinvDep_id'");
		//echo "UPDATE SinvDep set existencia = '$NewExistencia'  WHERE id = $SinvDep_id <br>";
	}
	///?

	$MontoPagadoDetalles = "0";
	$queryList = mysqli_query($conn3, "SELECT * FROM  sDetalleMetodosPagos where id_usuario =$idsession and  id_cliente = $clienteId AND idOperacion = '0' AND tipo = '1' AND Activo = 1 ");
	// $nrowl = mysqli_num_rows($queryList);
	if ($queryList) {
		while ($rowMotorizado = mysqli_fetch_array($queryList)) {
			$id = $rowMotorizado['id'];
			$tipo = $rowMotorizado['tipo'];
			$ID_Empresa = $rowMotorizado['ID_Empresa'];
			$nota_pago = $rowMotorizado['nota_pago'];

			if ($tipo == 1) {
				mysqli_query($conn3, "UPDATE sDetalleMetodosPagos SET idOperacion = '$idOperacion' WHERE id = '$id'");
				$MontoPagadoDetalles = intval($MontoPagadoDetalles) + intval($nota_pago);
			} else {
				// echo "Hubo un Error";
			}
		}
	}


	$MontoPagadoDetalles = round($MontoPagadoDetalles, 2);
	mysqli_query($conn3, "UPDATE sOperacionInv SET montoPagado = '$MontoPagadoDetalles' WHERE idOperacion = '$idOperacion'");
}
//echo $idOperacion;
elseif ($clienteId == 0) {
	// Si ingresa aqui es una orden de compra

	$nOrden = 0 + intval($_POST['nOrden']);

	if ($nOrden == 0) {
		$queryList = mysqli_query($conn3, "SELECT SUM(totalbase) as sumTotalbase, SUM(cantidad) as sumCantidad, SUM(subTotal) as sumSubTotal, SUM(Descuento_Numerico) as sumDescuento,SUM(Impuesto_Numerico) as sumImpuesto,SUM(Total) as sumTotal from  sDetalleOperPendites  where estado = 1 and id_usuario =$idsession and  ID_Empresa = $ID_Empresa AND tipo = 3 order by id");
	} else {
		// el query aja pa cuando tiene orden de compra
		$queryList = mysqli_query($conn3, "SELECT SUM(totalbase) as sumTotalbase, SUM(cantidad) as sumCantidad, SUM(subTotal) as sumSubTotal, SUM(Descuento_Numerico)as sumDescuento,SUM(Impuesto_Numerico) as sumImpuesto,SUM(Total) as sumTotal 
		from  sDetalleOperPendites  
		where 1=1
		and estado = 1 
		and ID_Empresa = $ID_Empresa 
		and tipo = 3 
		and nOrden = $nOrden
		order by id");
	}

	if ($queryList) {
		while ($rowMotorizado = mysqli_fetch_array($queryList)) {
			$sumTotalbase = $rowMotorizado['sumTotalbase'];
			$sumCantidad = $rowMotorizado['sumCantidad'];
			$sumSubTotal = $rowMotorizado['sumSubTotal'];
			$sumDescuento = $rowMotorizado['sumDescuento'];

			$sumImpuesto = $rowMotorizado['sumImpuesto'];
			$sumTotal = $rowMotorizado['sumTotal'];
		}
	}

	if ($sumImpuesto == "") {
		$sumImpuesto = 0;
	}
	$impuestoF = 0;

	if ($sumCantidad == "") {
		echo "<script type='text/javascript'>alert('Debe Agregar Mínimo 1 Detalle');history.back();</script>";
		exit();
	}

	/*
	   $total1="0";//?
	   if ($impuestoF > 0) {
		   $impuestoF2 = $impuestoF / 100;
		   $total1 =  $sumSubTotal * $impuestoF2;
		   $total =  $total1 + $sumSubTotal;
	   } else {


		   $total =  $sumSubTotal;
	   }
	   */

	$numeroOrden++;

	// echo 'Generando la Factura Nº' . $numeroOrden;

	mysqli_query($conn3, "INSERT INTO sOperacionInv 
	(numeroDoc, idCliente, idEmpresa, fechaOperacion, fechaVencimiento, docOrigen, seriaOperacion, impuesto, impuestoBase, 
	totalBruto, totalNeto, cantidadProduc, descuentos, montoPagado, nota ,id_historia , tipo_historia,ID_Empresa,tipo,Deposito_id,ID_principal) 
	VALUES                     
	('$numeroOrden', '$clienteId', '$id_usuario', '$fechaRegistro', '$fechaVencimiento', '0', NULL,'$impuestoF', '$sumImpuesto',
	'$sumTotalbase', '$sumTotal', '$sumCantidad', '$sumDescuento', '$montoPagado' , '$nota' ,'$historia', '$tipo_historia','$ID_Empresa','$tipo','$Deposito_id','$id_principal');") or die(mysqli_error($conn3));

	$idOperacion = mysqli_insert_id($conn3);

	mysqli_query($conn3, "UPDATE usuarios set numeroOrden = $numeroOrden where ID = $id_usuario;");

	include 'FA_Include_ValidacionExistenciasProductos.php';

	if ($nOrden == 0) {
		$queryList = mysqli_query($conn3, "SELECT * FROM  sDetalleOperPendites where estado = 1 and id_usuario =$idsession and ID_Empresa = $ID_Empresa AND tipo = 3");
	} else {
		$queryList = mysqli_query($conn3, "SELECT * FROM  sDetalleOperPendites 
		where 1=1
		and estado = 1 
		and ID_Empresa = $ID_Empresa 
		and tipo = 3
		and nOrden = $nOrden");
	}


	// $nrowl = mysqli_num_rows($queryList);
	if ($queryList) {
		while ($rowMotorizado = mysqli_fetch_array($queryList)) {
			$id = $rowMotorizado['id'];
			$cantidad = $rowMotorizado['cantidad'];
			$descripcion = $rowMotorizado['descripcion'];
			$base = $rowMotorizado['base'];
			$totalbase = $rowMotorizado['totalbase'];
			$subTotal = $rowMotorizado['subTotal'];
			$id_usuario1 = $rowMotorizado['id_usuario'];
			$idProducto = $rowMotorizado['idProducto'];
			$ID_Empresa = $rowMotorizado['ID_Empresa'];

			$cantidad_producto = funcionMaster($idProducto, 'ID', 'existencia', 'sinvetrios');
			$cantidad_producto = intval($cantidad_producto) + intval($cantidad);


			$Descuento_Numerico = $rowMotorizado['Descuento_Numerico'];
			$Descuento_Textual = $rowMotorizado['Descuento_Textual'];

			$Impuesto_Numerico = $rowMotorizado['Impuesto_Numerico'];
			$Impuesto_Textual = $rowMotorizado['Impuesto_Textual'];
			$Total = $rowMotorizado['Total'];

			//para el apartado de seriales
			$Seriales = $rowMotorizado['Seriales'];

			//?
			$Deposito_id = $rowMotorizado['Deposito_id'];
			$SinvDep_id = $rowMotorizado['SinvDep_id'];
			//aqui llama a la funcion MasDetalles Para traer informacion adicional del producto ya sea el lote o los productos que contiene el producto compuesto
			$Mas_Detalles = mysqli_real_escape_string($conn3, MasDetalles($idProducto, $SinvDep_id));
			///?

			mysqli_query($conn3, "INSERT INTO sDetalleOper (idOperacion, fechaRegistro, idProducto, cantidad, descripcion, base, impuesto,
		totalbase, subTotal, id_usuario, id_cliente,Descuento_Numerico,Descuento_Textual,ID_Empresa,SinvDep_id,Deposito_id,Mas_Detalles,Impuesto_Numerico,Impuesto_Textual,Total) 
							VALUES ('$idOperacion','$fechaRegistro', '$idProducto','$cantidad','$descripcion','$base','0', 
							'$totalbase', '$subTotal', '$id_usuario', '$clienteId','$Descuento_Numerico','$Descuento_Textual','$ID_Empresa','$SinvDep_id','$Deposito_id','$Mas_Detalles','$Impuesto_Numerico','$Impuesto_Textual','$Total');");

			$Detalle_id = mysqli_insert_id($conn3);
			//mysqli_query($conn3, "UPDATE sinvetrios SET existencia='$cantidad_producto' WHERE ID='$idProducto'");

			//Actualizacion de la existencias e los productos y los
			$QueryExistencias = mysqli_query($conn3, "SELECT * FROM  SinvDep where id = $SinvDep_id");
			if ($QueryExistencias) {
				while ($RowExistencias = mysqli_fetch_array($QueryExistencias)) {
					$ExistenciaSinvDep = $RowExistencias['existencia'];
				}
			}

			$ExistenciasFinales = intval($ExistenciaSinvDep) + intval($cantidad);
			mysqli_query($conn3, "UPDATE SinvDep set existencia = $ExistenciasFinales where id = $SinvDep_id");
			mysqli_query($conn3, "UPDATE sDetalleOperPendites set estado = 2 where id = $id");



			//////////////////////////////////////////////? Segunda parte del apartado de seriales //////////////////////////////////////////////
			$Tipo_Departamento = funcionMaster($idProducto, 'ID', 'tipo', 'sinvetrios');
			$Caracter = funcionMaster($Tipo_Departamento, 'id', 'caracter_serial', 'scategoria');

			foreach (json_decode($Seriales, true) as $key => $value) {
				$Serial = $value;

				mysqli_query($conn3, "INSERT INTO SinvSerial (Fecha, usuario_id, Serial, Caracter, idSinvetrios, idSinvDep,Detalle_id,Tipo_Detalle) VALUES ('$fechaRegistro', '$id_usuario', '$Serial', '$Caracter', '$idProducto', '$SinvDep_id','$Detalle_id','1')");

			}
			//////////////////////////////////////////////? [FIN] Segunda parte del apartado de seriales //////////////////////////////////////////////
		}
	}


	$MontoPagadoDetalles = "0";

	$queryList = mysqli_query($conn3, "SELECT * FROM  sDetalleMetodosPagos where idOperacion = 0 AND id_usuario =$idsession and  ID_Empresa = $ID_Empresa AND tipo = '3' and nOrden = $nOrden");
	// $nrowl = mysqli_num_rows($queryList);
	if ($queryList) {
		while ($rowMotorizado = mysqli_fetch_array($queryList)) {
			$id = $rowMotorizado['id'];
			$tipo = $rowMotorizado['tipo'];
			$ID_Empresa = $rowMotorizado['ID_Empresa'];
			$nota_pago = $rowMotorizado['nota_pago'];

			if ($tipo == 3) {
				mysqli_query($conn3, "UPDATE sDetalleMetodosPagos SET idOperacion = '$idOperacion' WHERE id='$id' limit 1");
				$MontoPagadoDetalles = intval($MontoPagadoDetalles) + intval($nota_pago);
			} else {
				// echo "Hubo un Error";
			}
		}
	}


	$MontoPagadoDetalles = round($MontoPagadoDetalles, 2);
	mysqli_query($conn3, "UPDATE sOperacionInv SET montoPagado = '$MontoPagadoDetalles' WHERE idOperacion = '$idOperacion'");
}

// 13 09 2023 - JRodriguez
// este include es para facturar a terceros
// solo comentar el include si no necesitan esta opcion
//include 'facturarTerceroGuardar.php';
















if ($clienteId != 0) {

	$QueryContabilidad = mysqli_query($conn3, "SELECT * FROM  Config_Contabilidad WHERE Activo = 1");
	$NrowContabilidad = mysqli_num_rows($QueryContabilidad);
	//if($NrowContabilidad>0 && $clienteId=='115'){
	if ($NrowContabilidad > 0) {
		//////////////////////////Contabilidad
		$Campo1 = mysqli_query($conn3, "show COLUMNS from sOperacionInv WHERE Field = 'idCuentaContableCXC';");
		$nrowCampo1 = mysqli_num_rows($Campo1);
		if ($nrowCampo1 == "0") {
			mysqli_query($conn3, "ALTER TABLE `sOperacionInv` ADD `idCuentaContableCXC` TEXT NULL DEFAULT '0' COMMENT '*Creado desde modulo de totalizarFactura*'");
		}

		$Campo1 = mysqli_query($conn3, "show COLUMNS from sOperacionInv WHERE Field = 'idCentroCosto';");
		$nrowCampo1 = mysqli_num_rows($Campo1);
		if ($nrowCampo1 == "0") {
			mysqli_query($conn3, "ALTER TABLE `sOperacionInv` ADD `idCentroCosto` TEXT NULL DEFAULT '0' COMMENT '*Creado desde modulo de totalizarFactura*'");
		}
		$idCuentaContableCXC = $_POST['idCuentaContableCXC'];
		if ($idCuentaContableCXC == "") {
			$idCuentaContableCXC = "0";
		}

		$idCentroCosto = $_POST['idCentroCosto'];
		if ($idCentroCosto == "") {
			$idCentroCosto = "0";
		}

		mysqli_query($conn3, "UPDATE sOperacionInv set idCuentaContableCXC = '$idCuentaContableCXC',idCentroCosto='$idCentroCosto'  where idOperacion = $idOperacion limit 1;");

		echo "<script language='Javascript'> window.location='CTB_RegistroMovimientosFactura.php?idOperacion=$idOperacion';</script>";

		////////////////////////
	} else {
		echo "<script language='Javascript'> window.location='preliminarFactura?idOperacion=$idOperacion';</script>";
	}
} elseif ($clienteId == 0) {

	$QueryContabilidad = mysqli_query($conn3, "SELECT * FROM  Config_Contabilidad WHERE Activo = 1");
	$NrowContabilidad = mysqli_num_rows($QueryContabilidad);
	if ($NrowContabilidad > 0) {
		//////////////////////////Contabilidad
		$Campo1 = mysqli_query($conn3, "show COLUMNS from sOperacionInv WHERE Field = 'idCuentaContableCXP';");
		$nrowCampo1 = mysqli_num_rows($Campo1);
		if ($nrowCampo1 == "0") {
			mysqli_query($conn3, "ALTER TABLE `sOperacionInv` ADD `idCuentaContableCXP` TEXT NULL DEFAULT '0' COMMENT '*Creado desde modulo de totalizarFactura*'");
		}

		$Campo1 = mysqli_query($conn3, "show COLUMNS from sOperacionInv WHERE Field = 'idCentroCosto';");
		$nrowCampo1 = mysqli_num_rows($Campo1);
		if ($nrowCampo1 == "0") {
			mysqli_query($conn3, "ALTER TABLE `sOperacionInv` ADD `idCentroCosto` TEXT NULL DEFAULT '0' COMMENT '*Creado desde modulo de totalizarFactura*'");
		}

		$Campo1 = mysqli_query($conn3, "show COLUMNS from sOperacionInv WHERE Field = 'Retenciones';");
		$nrowCampo1 = mysqli_num_rows($Campo1);
		if ($nrowCampo1 == "0") {
			mysqli_query($conn3, "ALTER TABLE `sOperacionInv` ADD `Retenciones` TEXT NULL DEFAULT '0' COMMENT '*Creado desde modulo de totalizarFactura*'");
		}

		///////////////////////////////////////////////////////////////////////////////////////////////
		$Campo1 = mysqli_query($conn3, "show COLUMNS from DetalleRetenciones WHERE Field = 'idOperacion';");
		$nrowCampo1 = mysqli_num_rows($Campo1);
		if ($nrowCampo1 == "0") {
			mysqli_query($conn3, "ALTER TABLE `DetalleRetenciones` ADD `idOperacion` TEXT NULL DEFAULT '0' COMMENT '*Creado desde modulo de totalizarFactura*'");
		}

		$idCuentaContableCXP = $_POST['idCuentaContableCXP'];
		if ($idCuentaContableCXP == "") {
			$idCuentaContableCXP = "0";
		}

		$idCentroCosto = $_POST['idCentroCosto'];
		if ($idCentroCosto == "") {
			$idCentroCosto = "0";
		}

		$ResultadoRetencion = mysqli_query($conn3, "SELECT * FROM  DetalleRetenciones WHERE Activo='1' AND ID_Empresa = '$ID_Empresa' AND usuario_id = '$id_usuario' ");
		$MontoRetencion = 0;
		if ($ResultadoRetencion) {
			while ($RowRetencion = mysqli_fetch_array($ResultadoRetencion)) {
				$MontoRetencion = intval($MontoRetencion) + intval($RowRetencion['MontoRetencion']);

				$Retenciones_id = $RowRetencion['id'];
				mysqli_query($conn3, "UPDATE DetalleRetenciones set idOperacion = '$idOperacion', Activo = '2' where id = '$Retenciones_id' limit 1;");

			}
		}


		mysqli_query($conn3, "UPDATE sOperacionInv set idCuentaContableCXP = '$idCuentaContableCXP',idCentroCosto='$idCentroCosto',Retenciones='$MontoRetencion'  where idOperacion = $idOperacion limit 1;");

		echo "<script language='Javascript'> window.location='CTB_RegistroMovimientosCompra.php?idOperacion=$idOperacion';</script>";

		////////////////////////
	} else {
		echo "<script language='Javascript'> window.location='preliminarOrden.php?idOperacion=$idOperacion';</script>";
	}


}
