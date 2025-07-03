<?php
date_default_timezone_set('America/Bogota');
include("funciones/conn3.php");
include("funciones/funciones.php");

$id_usuario  			= $_POST['id_usuario'];
//$montoPagado  			= $_POST['montoPagado'];



function CargarDocumentos_DocumentosSistema($usuario_documento,$Documentos,$Carpeta){
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
		$carpetaDestino = $carpetaDestinoInicial.$Carpeta.'/';
		// Verificar si la carpeta de destino existe, de lo contrario, crearla
		if (!is_dir($carpetaDestino)) {
			mkdir($carpetaDestino, 0777, true);
		}
	
		// Iterar sobre cada archivo cargado
		$Contador = 0;
		foreach ($Documentos['tmp_name'] as $key => $tmpName) {
	
			if($tmpName!=""){
	
				$NombreArchivoInicial = $Documentos['name'][$key];
				$NombreArchivoFinal = str_replace("'", "", $NombreArchivoInicial);
				$fechahora = date("Y-m-d_H-i-s");
				$numeroAleatorio = rand(1, 9999);
				$nombreArchivo = "{$usuario_documento}__{$fechahora}__{$numeroAleatorio}_".$NombreArchivoFinal;
	
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





$montoPagado = "0";
$nota  			        = $_POST['nota'];
$fechaVencimiento 		= $_POST['fechaVencimiento'];
$clienteId   			= $_POST['id_cliente'];
$ID_Empresa   			= $_POST['ID_Empresa'];
$tipo   			= $_POST['tipo'];

$historia  = $_POST['historia'];
$tipo_historia = $_POST['tipo_historia'];
$fechaRegistro             = date("Y-m-d H:i:s");


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

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$Campo1 = mysqli_query($conn3, "show COLUMNS from sOperacionInv WHERE Field = 'Deposito_id';");
$nrowCampo1 = mysqli_num_rows($Campo1);
if ($nrowCampo1 == "0") {
	mysqli_query($conn3, "ALTER TABLE `sOperacionInv` ADD `Deposito_id` INT(11) NULL DEFAULT '0' COMMENT '*Creado desde Totalizar Factura POS*'");
}

$Campo1 = mysqli_query($conn3, "show COLUMNS from sDetalleOper WHERE Field = 'Mas_Detalles';");
$nrowCampo1 = mysqli_num_rows($Campo1);
if ($nrowCampo1 == "0") {
	mysqli_query($conn3, "ALTER TABLE `sDetalleOper` ADD `Mas_Detalles` TEXT NULL  COMMENT '*Creado desde Totalizar Factura POS*'");
}

$Campo1 = mysqli_query($conn3, "show COLUMNS from sOperacionInv WHERE Field = 'Serie';");
$nrowCampo1 = mysqli_num_rows($Campo1);
if ($nrowCampo1 == "0") {
	mysqli_query($conn3, "ALTER TABLE `sOperacionInv` ADD `Serie` TEXT NULL COMMENT 'sale de la serie del pos con el que se registro la factura *Creado desde Totalizar Factura POS*'");
}


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$Deposito_id = $_POST['Deposito_id'];


include 'FA_Include_ValidacionExistenciasProductos.php';

$ArregloExistencias = CalcularExistenciasDescontar($id_usuario,0,$Deposito_id,'1');// aqui enviar 0 ya que los detalles pendientes no tienen cliente asociado aqui en el apartado del pos
//echo "<pre>";
//print_r($ArregloExistencias);
//echo "</pre>";
//exit();

//echo $clienteId;
if($clienteId==""){$clienteId="-1";}//cliente de contado

//aqui es para cambiar la numeracion de la facturacion si tiene iniciado sesion con algun punto pos
$PuntoPOS_id = $_POST['PuntoPOS_id'];
if($PuntoPOS_id==""){$PuntoPOS_id=0;}
$Serie="";
if($PuntoPOS_id>0){
$FacturaPOS = funcionMaster($PuntoPOS_id,'id','NumeroFactura','PuntoPOS');
$Serie = funcionMaster($PuntoPOS_id,'id','Serie','PuntoPOS');
$numeroFactura = $FacturaPOS;
}

if ($clienteId <> 0) {

				$queryList = mysqli_query($conn3, "SELECT SUM(totalbase) as sumTotalbase, SUM(cantidad) as sumCantidad, SUM(subTotal) as sumSubTotal, SUM(Descuento_Numerico)
			as sumDescuento,SUM(Impuesto_Numerico) as sumImpuesto,SUM(Total) as sumTotal  from   sDetalleOperPendites  where estado = 1 and id_usuario =$id_usuario and  id_cliente = 0 AND tipo = '1' order by id");
				while ($rowMotorizado = mysqli_fetch_array($queryList)) {
					$sumTotalbase		= $rowMotorizado['sumTotalbase'];
					$sumCantidad	= $rowMotorizado['sumCantidad'];
					$sumSubTotal	= $rowMotorizado['sumSubTotal'];
					$sumDescuento = $rowMotorizado['sumDescuento'];

					$sumImpuesto = $rowMotorizado['sumImpuesto'];
					$sumTotal = $rowMotorizado['sumTotal'];
				}
				if($sumCantidad==""){
					echo "<script type='text/javascript'>alert('Debe Agregar Minimo 1 Detalle');history.back();</script>";
					exit();
				}
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
				if($sumImpuesto==""){$sumImpuesto=0;}
				$impuestoF=0;

				$numeroFactura++;
				
				// echo 'Generando la Factura Nº' . $numeroFactura;

				mysqli_query($conn3, "INSERT INTO sOperacionInv 
				(numeroDoc, idCliente, idEmpresa, fechaOperacion, fechaVencimiento, docOrigen, seriaOperacion, impuesto, impuestoBase, 
				totalBruto, totalNeto, cantidadProduc, descuentos, montoPagado, nota ,id_historia , tipo_historia,tipo,Deposito_id,Serie,Pos) 
				VALUES                     
				('$numeroFactura', '$clienteId', '$id_usuario', '$fechaRegistro', '$fechaVencimiento', '0', NULL,'$impuestoF', '$sumImpuesto',
				'$sumTotalbase', '$sumTotal', '$sumCantidad', '$sumDescuento', '$montoPagado' , '$nota' ,'$historia', '$tipo_historia','$tipo','$Deposito_id','$Serie','$PuntoPOS_id');") or die(mysqli_error($conn3));

				$idOperacion = mysqli_insert_id($conn3);

				if($PuntoPOS_id>0){
					mysqli_query($conn3, "UPDATE PuntoPOS set NumeroFactura = $numeroFactura where id = $PuntoPOS_id;");
				}else{
					mysqli_query($conn3, "UPDATE usuarios set numeroFactura = $numeroFactura where ID = $id_usuario;");
				}
				
				if($idOperacion!="0"){
					$Documentos = $_FILES['Documentos'];
					//echo "<pre>";
					//print_r($DatosDocumentos);
					//echo "</pre>";
					$DatosDocumentos = CargarDocumentos_DocumentosSistema($id_usuario,$_FILES['Documentos'],"Factura");

					

					foreach($DatosDocumentos as $key => $value){

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

				//Parte 1/2 Adjuntar Seriales /////////////////////////
				include 'IN_IncludeSerialesDetallesGuardadoPHP.php';
				///////////////////////////////////////////////////////

				$queryList = mysqli_query($conn3, "SELECT * FROM  sDetalleOperPendites where estado = 1 and id_usuario =$id_usuario and  id_cliente = 0 AND tipo = 1");
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

					$cantidad_producto = funcionMaster($idProducto, 'ID', 'existencia', 'sinvetrios');
					$cantidad_producto = $cantidad_producto - $cantidad;


					$Descuento_Numerico = $rowMotorizado['Descuento_Numerico'];
					$Descuento_Textual  = $rowMotorizado['Descuento_Textual'];

					$Impuesto_Numerico = $rowMotorizado['Impuesto_Numerico'];
					$Impuesto_Textual  = $rowMotorizado['Impuesto_Textual'];
					$Total = $rowMotorizado['Total'];


					$Deposito_id = $rowMotorizado['Deposito_id'];
					$SinvDep_id = $rowMotorizado['SinvDep_id'];

					//aqui llama a la funcion MasDetalles Para traer informacion adicional del producto ya sea el lote o los productos que contiene el producto compuesto
					$Mas_Detalles = mysqli_real_escape_string($conn3,MasDetalles($idProducto, $SinvDep_id));

					mysqli_query($conn3, "INSERT INTO sDetalleOper (idOperacion, fechaRegistro, idProducto, cantidad, descripcion, base, impuesto,
				totalbase, subTotal, id_usuario, id_cliente,Descuento_Numerico,Descuento_Textual,SinvDep_id,Deposito_id,Mas_Detalles,Impuesto_Numerico,Impuesto_Textual,Total) 
									VALUES ('$idOperacion','$fechaRegistro', '$idProducto','$cantidad','$descripcion','$base','0', 
									'$totalbase', '$subTotal', '$id_usuario', '$clienteId','$Descuento_Numerico','$Descuento_Textual','$SinvDep_id','$Deposito_id','$Mas_Detalles','$Impuesto_Numerico','$Impuesto_Textual','$Total');");


					//Parte 2/2 Adjuntar Seriales ////////////////////////////////////////
					$Detalle_id = mysqli_insert_id($conn3);
					AdjuntarDetalleId_Serial($rowMotorizado['Seriales_Arreglo_id'],$Detalle_id,$SinvDep_id);
					/////////////////////////////////////////////////////////////////////

					//mysqli_query($conn3, "UPDATE sinvetrios SET existencia='$cantidad_producto' WHERE ID='$idProducto'");
					mysqli_query($conn3, "UPDATE sDetalleOperPendites set estado = 2 where id = $id");
				}

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


				$MontoPagadoDetalles = "0";
				$queryList = mysqli_query($conn3, "SELECT * FROM  sDetalleMetodosPagos where id_usuario =$id_usuario and  idOperacion = '0' AND tipo = '1' AND Activo = 1 ");
				$nrowl = mysqli_num_rows($queryList);
				while ($rowMotorizado = mysqli_fetch_array($queryList)) {
					$id		        = $rowMotorizado['id'];
					$tipo 		        = $rowMotorizado['tipo'];
					$ID_Empresa 		        = $rowMotorizado['ID_Empresa'];
					$nota_pago 		        = $rowMotorizado['nota_pago'];

					if ($tipo == 1) {
						mysqli_query($conn3, "UPDATE sDetalleMetodosPagos SET idOperacion = '$idOperacion' WHERE id = $id ");
						$MontoPagadoDetalles = $MontoPagadoDetalles + $nota_pago;
					} else {
						// echo "Hubo un Error";
					}




				}

				$MontoPagadoDetalles = round($MontoPagadoDetalles,2);
				mysqli_query($conn3, "UPDATE sOperacionInv SET montoPagado = '$MontoPagadoDetalles' WHERE idOperacion = '$idOperacion'");
}
//echo $idOperacion;


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


if ($clienteId != 0) {
	echo "<script language='Javascript'> window.location='preliminarFactura.php?idOperacion=$idOperacion';</script>";
} elseif ($clienteId == 0) {
	echo "<script language='Javascript'> window.location='preliminarOrden.php?idOperacion=$idOperacion';</script>";
}
