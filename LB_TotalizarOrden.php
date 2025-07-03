<?php
date_default_timezone_set('America/Bogota');
include("funciones/conn3.php");
include("funciones/funciones.php");
include("funciones/funcionesUtilidades.php");

$usuario_id = $_POST['usuario_id'];
$cliente_id = $_POST['cliente_id'];
$montoPagado = $_POST['montoPagado'];
$nota = $_POST['nota'];
$fechaVencimiento = $_POST['fechaVencimiento'];
$fechaEntrega = $_POST['fechaEntrega'];
$MedicoAsociado = $_POST['MedicoAsociado'];

$Check_Descuento = $_POST['Check_Descuento'];
$Descuento = $_POST['Descuento'];
$Medio_Pago = $_POST['Medio_Pago'];

$fechaRegistro = date("Y-m-d H:i:s");

$queryList = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = $usuario_id");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $moneda = $rowMotorizado['moneda'];
    $impuestoF = $rowMotorizado['impuestoF'];
}

$queryList = mysqli_query($conn3, "SELECT * FROM  usuarios where ID = $usuario_id");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $numeroFactura            = $rowMotorizado['numeroFactura'];
}

$queryList = mysqli_query($conn3, "SELECT SUM(base) as sumBase, SUM(cantidad) as sumCantidad, SUM(subTotal) as sumSubTotal  from   sDetalleOperPendites  where   id_usuario =$usuario_id and  id_cliente = $cliente_id AND tipo ='8' AND Tipo_Producto='Laboratorio' AND estado='1' order by id");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $sumBase        = $rowMotorizado['sumBase'];
    $sumCantidad    = $rowMotorizado['sumCantidad'];
    $sumSubTotal    = $rowMotorizado['sumSubTotal'];
}

if ($impuestoF > 0) {
    $impuestoF2 = $impuestoF / 100;
    $total1 =  $sumSubTotal * $impuestoF2;
    $total =  $total1 + $sumSubTotal;
} else {
$total =  $sumSubTotal;
}

$numeroFactura++;

switch ($Check_Descuento) {
    case "Numerico":
        $total = $total-$Descuento;
        break;
    case "Porcentaje":
        $DescuentoNumerico = $total*($Descuento/100);
        $total = $total - $DescuentoNumerico;
        break;
}
/////////////////////////////////////////////////////////////////// creacion de la tabla para los examemenes //////////////////////////////////////////////////////////////////////////
$tabla = mysqli_query($conn3, "SHOW TABLES LIKE 'LB_ExamenCargado'");
$nrowtabla = mysqli_num_rows($tabla);
if ($nrowtabla == 0) {
    $query = "CREATE TABLE `LB_ExamenCargado` ( 
        `id` INT(11) NOT NULL AUTO_INCREMENT , 
        `Fecha` DATETIME NULL DEFAULT CURRENT_TIMESTAMP , 
        `idOperacion` INT(11) NULL DEFAULT '0' , 
        `Nombre` TEXT NULL DEFAULT '' , 
        `Metodo` TEXT NULL DEFAULT '' ,
        `En_Dos_Tablas` TEXT NULL DEFAULT 'No',
        `Unidades_Referencia` TEXT NULL DEFAULT '' , 
        `Valores_Referencia` TEXT NULL DEFAULT '' , 
        `Resultado` TEXT NULL DEFAULT '' ,
        `Valores_Referencia_Filtrado` TEXT NULL DEFAULT '' ,
        `Interpretacion` TEXT NULL DEFAULT '' ,

        `Arreglo_Mas_Informacion` TEXT NULL DEFAULT '' ,
        `Formulas` TEXT NULL DEFAULT '' ,
        `cliente_id` INT(11) NULL DEFAULT '0' , 
        `usuario_id` INT(11) NULL DEFAULT '0' , 
        `examen_id` INT(11) NULL DEFAULT '0' ,
        `CaracteristicaExamen` VARCHAR(11) NULL DEFAULT 'No' COMMENT '*No* el elemento cargado no es una caracteristica de un examen. *Si* el elemento cargado si es una caracteristica de un examen *Creado desde modulo de Laboratorio*' , 
        PRIMARY KEY (`id`)) ENGINE = MyISAM;";

    $creaciontabla = mysqli_query($conn3, $query);
    if (!$creaciontabla) {
        echo "<script language='Javascript'> alert('error en la creacion de la tabla');
        window.location='portada';</script>";

        exit();
    }
}

$Campo1 = mysqli_query($conn3, "show COLUMNS from LB_ExamenCargado WHERE Field = 'examenrelacion_id';");
$nrowCampo1 = mysqli_num_rows($Campo1);
if ($nrowCampo1 == "0") {
    mysqli_query($conn3, "ALTER TABLE `LB_ExamenCargado` ADD `examenrelacion_id` TEXT NULL DEFAULT '0' COMMENT 'Se refiere si esta examen tiene relacion ejemplo si es un examen unico este campo tendra el id del registro actual y es una examen con caracteristica este campo tendra el id del registro principal *Creado desde modulo de Laboratorio*'");
}

$Campo1 = mysqli_query($conn3, "show COLUMNS from LB_ExamenCargado WHERE Field = 'detalle_id';");
$nrowCampo1 = mysqli_num_rows($Campo1);
if ($nrowCampo1 == "0") {
    mysqli_query($conn3, "ALTER TABLE `LB_ExamenCargado` ADD `detalle_id` TEXT NULL DEFAULT '0' COMMENT 'Se refiere al campo id de la tabla de detalles de facturacion *Creado desde modulo de Laboratorio*'");
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

echo 'Generando la factura Nº' . $numeroFactura;

////////////////////////////// CREACION DE TABLAS ///////////////////////////////////////////////////

$Campo1 = mysqli_query($conn3, "show COLUMNS from sOperacionInv WHERE Field = 'Facturado_Desde';");
$nrowCampo1 = mysqli_num_rows($Campo1);
if ($nrowCampo1 == "0") {
    mysqli_query($conn3, "ALTER TABLE `sOperacionInv` ADD `Facturado_Desde` VARCHAR(100) NULL DEFAULT 'Inventario' COMMENT 'Se refiere si fue facturado desde el modulo inventario o de laboratorio *Creado desde modulo de Laboratorio*'");
}
$Campo1 = mysqli_query($conn3, "show COLUMNS from sOperacionInv WHERE Field = 'Estado_Orden';");
$nrowCampo1 = mysqli_num_rows($Campo1);
if ($nrowCampo1 == "0") {
    mysqli_query($conn3, "ALTER TABLE `sOperacionInv` ADD `Estado_Orden` VARCHAR(100) NULL DEFAULT 'Abierto' COMMENT 'Se refiere si la orden de laboratorio esta abierta o cerrada *Creado desde modulo de Laboratorio*'");
}
$Campo1 = mysqli_query($conn3, "show COLUMNS from sOperacionInv WHERE Field = 'fechaEntrega';");
$nrowCampo1 = mysqli_num_rows($Campo1);
if ($nrowCampo1 == "0") {
    mysqli_query($conn3, "ALTER TABLE `sOperacionInv` ADD `fechaEntrega` DATE NULL DEFAULT NULL COMMENT '*Creado desde modulo de Laboratorio*' AFTER `Facturado_Desde`;");
}
$Campo1 = mysqli_query($conn3, "show COLUMNS from sOperacionInv WHERE Field = 'medico_asociado_id';");
$nrowCampo1 = mysqli_num_rows($Campo1);
if ($nrowCampo1 == "0") {
    mysqli_query($conn3, "ALTER TABLE `sOperacionInv` ADD `medico_asociado_id`  INT(11) NULL DEFAULT '0' COMMENT '*Creado desde modulo de Laboratorio*';");
}

$Campo1 = mysqli_query($conn3, "show COLUMNS from sOperacionInv WHERE Field = 'Tipo_Descuento';");
$nrowCampo1 = mysqli_num_rows($Campo1);
if ($nrowCampo1 == "0") {
    $queryList = mysqli_query($conn3, "ALTER TABLE `sOperacionInv` ADD `Tipo_Descuento`  TEXT NULL DEFAULT '' COMMENT '*Creado desde modulo de Laboratorio*';");
}

$Campo1 = mysqli_query($conn3, "show COLUMNS from sDetalleOper WHERE Field = 'Tipo_Producto';");
$nrowCampo1 = mysqli_num_rows($Campo1);
if ($nrowCampo1 == "0") {
    mysqli_query($conn3, "ALTER TABLE `sDetalleOper` ADD `Tipo_Producto` VARCHAR(100) NULL DEFAULT 'Inventario' COMMENT 'Se refiere si es un producto del modulo inventario o de laboratorio *Creado desde modulo de Laboratorio*'");
}

$Campo1 = mysqli_query($conn3, "show COLUMNS from LB_ExamenCargado WHERE Field = 'Activo';");
$nrowCampo1 = mysqli_num_rows($Campo1);
if ($nrowCampo1 == "0") {
    mysqli_query($conn3, "ALTER TABLE `LB_ExamenCargado` ADD `Activo` INT(11) NULL DEFAULT '1' COMMENT '*Creado desde modulo de Laboratorio*'");
}
////////////////////////////// CREACION DE TABLAS ///////////////////////////////////////////////////

//Tipo 8-> Laboratorio

$consulta = mysqli_query($conn3, "INSERT INTO sOperacionInv 
(numeroDoc, idCliente, idEmpresa, fechaOperacion, fechaVencimiento, docOrigen, impuesto, impuestoBase, totalBruto, totalNeto, cantidadProduc, descuentos, montoPagado, nota, Facturado_Desde, fechaEntrega, medico_asociado_id, Tipo_Descuento, tipo_pago, tipo) 
  VALUES                     
('$numeroFactura', '$cliente_id', '$usuario_id', '$fechaRegistro', '$fechaVencimiento', '0' ,'$impuestoF', '0','$sumSubTotal','$total', '$sumCantidad', '$Descuento', '$montoPagado' , '$nota','Laboratorio','$fechaEntrega','$MedicoAsociado','$Check_Descuento','$Medio_Pago','8');") or die(mysqli_error($conn3));

$idOperacion = mysqli_insert_id($conn3);

/*
$queryList = mysqli_query($conn3, "SELECT * FROM  sOperacionInv where numeroDoc=$numeroFactura and idEmpresa = $usuario_id");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $idOperacion            = $rowMotorizado['idOperacion'];
}
*/

mysqli_query($conn3, "update usuarios set numeroFactura = $numeroFactura where ID = $usuario_id;");



$queryList = mysqli_query($conn3, "SELECT * FROM  sDetalleOperPendites where   id_usuario =$usuario_id and  id_cliente = $cliente_id AND tipo ='8' AND Tipo_Producto='Laboratorio' AND estado='1' ORDER BY id ASC");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $idProducto            = $rowMotorizado['idProducto'];
    $id            = $rowMotorizado['id'];
    $cantidad        = $rowMotorizado['cantidad'];
    $descripcion    = mysqli_real_escape_string($conn3, $rowMotorizado['descripcion']);
    $base            = $rowMotorizado['base'];
    $totalbase        = $rowMotorizado['totalbase'];
    $subTotal        = $rowMotorizado['subTotal'];
    $Tipo_Producto = $rowMotorizado['Tipo_Producto'];

    mysqli_query($conn3, "INSERT INTO sDetalleOper (idOperacion, fechaRegistro, idProducto, cantidad, descripcion, base, impuesto, totalbase, subTotal, id_usuario, id_cliente,Tipo_Producto) 
                        VALUES ('$idOperacion','$fechaRegistro', '$idProducto' ,'$cantidad','$descripcion','$base','0', '$totalbase', '$subTotal', '$usuario_id', '$cliente_id', '$Tipo_Producto');") or die(mysqli_error($conn3));
    $id_detallefactura  = mysqli_insert_id($conn3);

    for ($crearExamenes = 1; $crearExamenes <= $cantidad; $crearExamenes++) {

        if($Tipo_Producto=="Laboratorio")
        {
            //limpiar arreglo $Datos
            $Datos = array();
            //$Datos="";
            $QueryExamen = mysqli_query($conn3, "SELECT * FROM  LB_Examen where id=$idProducto");
            $nrowl = mysqli_num_rows($QueryExamen);
            while ($rowExamen = mysqli_fetch_array($QueryExamen)) {

                $Caracteristicas = $rowExamen['Caracteristicas'];
                $rowExamen = DatosIngresarMysqli($rowExamen);
                $id_examen = $rowExamen['id'];
                $Nombre = $rowExamen['Nombre'];
                $Metodo = $rowExamen['Metodo'];
                $En_Dos_Tablas = $rowExamen['En_Dos_Tablas'];
                $Unidades_Referencia = $rowExamen['Unidades_Referencia'];
                $Valores_Referencia = $rowExamen['Valores_Referencia'];
                $Valores_Referencia_Filtrado = $rowExamen['Valores_Referencia_Filtrado'];
                $Formulas = $rowExamen['Formulas'];
                $Interpretacion = $rowExamen['Interpretacion'];

                $ArregloValoresArray["categoria_id"] = $rowExamen['categoria_id'];
                $ArregloValoresArray["Campo_Resultado"] = $rowExamen['Campo_Resultado'];
                $ArregloValoresArray["Valores_Campo_Resultado"] = str_replace('"', '&quot;',$rowExamen['Valor_Campo_Resultado']);

            }

            foreach ($ArregloValoresArray as $key => $value) {
                $Datos["{$key}"]="{$value}";
            }
            $Datos = json_encode($Datos, JSON_UNESCAPED_UNICODE);

            if ($Caracteristicas != "[]") {
                mysqli_query($conn3, "INSERT INTO LB_ExamenCargado (idOperacion, cliente_id, usuario_id,            examen_id, Nombre, Metodo, Unidades_Referencia, Valores_Referencia, En_Dos_Tablas, Resultado, Valores_Referencia_Filtrado,Interpretacion,               Arreglo_Mas_Informacion) 
                            VALUES ('$idOperacion', '$cliente_id', '$usuario_id',            '$id_examen', '$Nombre', '$Metodo' ,'$Unidades_Referencia','$Valores_Referencia','$En_Dos_Tablas','No Aplica Resultado','$Valores_Referencia_Filtrado','$Interpretacion',    '$Datos');")  or die(mysqli_error($conn3));
                
                $idExamenCargado  = mysqli_insert_id($conn3);
                //update
                mysqli_query($conn3, "UPDATE LB_ExamenCargado SET examenrelacion_id = '$idExamenCargado', detalle_id = '$id_detallefactura' where id = '$idExamenCargado';");            
                $listado = json_decode($Caracteristicas, true);
                foreach ($listado as $key => $value) {
                    $Datos=array();
                    $Nombre = $value["Nombre_Caracteristica"];
                    $Valores_Referencia_Caracteristica = $value["Valores_Referencia_Caracteristica"];
                    $Unidades_Referencia = $value["Unidades_Referencia"];

                    $Datos["Campo_Resultado"] = $value["Campo_Resultado"];
                    $Datos["Valores_Campo_Resultado"] = $value["Valores_Campo_Resultado"];

                    $Datos = json_encode($Datos, JSON_UNESCAPED_UNICODE);
                    $Valores_Referencia_Filtrado = PonerComillasyOtrosCaracteres($value["Filtro_Personalizado"]);
                    $Formulas = PonerComillasyOtrosCaracteres($value["Formula"]);
                    mysqli_query($conn3, "INSERT INTO LB_ExamenCargado (idOperacion, cliente_id, usuario_id,            examen_id, Nombre, Unidades_Referencia, Valores_Referencia, En_Dos_Tablas,CaracteristicaExamen, Valores_Referencia_Filtrado,       Arreglo_Mas_Informacion,Formulas, examenrelacion_id, detalle_id) 
                            VALUES ('$idOperacion', '$cliente_id', '$usuario_id',            '$id_examen', '$Nombre','$Unidades_Referencia','$Valores_Referencia_Caracteristica','$En_Dos_Tablas','Si', '$Valores_Referencia_Filtrado',     '$Datos','$Formulas', '$idExamenCargado', '$id_detallefactura');")  or die(mysqli_error($conn3));
                }
            }
            else {
                mysqli_query($conn3, "INSERT INTO LB_ExamenCargado (idOperacion, cliente_id, usuario_id,            examen_id, Nombre, Metodo, Unidades_Referencia, Valores_Referencia,  En_Dos_Tablas, Valores_Referencia_Filtrado,Interpretacion,      Arreglo_Mas_Informacion,Formulas) 
                            VALUES ('$idOperacion', '$cliente_id', '$usuario_id',            '$id_examen', '$Nombre', '$Metodo' ,'$Unidades_Referencia','$Valores_Referencia','$En_Dos_Tablas', '$Valores_Referencia_Filtrado','$Interpretacion',     '$Datos','$Formulas');")  or die(mysqli_error($conn3));
                $idExamenCargado  = mysqli_insert_id($conn3);
                //update
                mysqli_query($conn3, "UPDATE LB_ExamenCargado SET examenrelacion_id = '$idExamenCargado', detalle_id = '$id_detallefactura' where id = '$idExamenCargado';");    
        }
        }
        elseif($Tipo_Producto == "Inventario")
        {
            $idProducto = $rowMotorizado['idProducto'];
            $cantidad_producto = funcionMaster($idProducto, 'ID', 'existencia', 'sinvetrios');
            $cantidad_producto = $cantidad_producto - $cantidad;

            mysqli_query($conn3, "UPDATE sinvetrios SET existencia='$cantidad_producto' WHERE ID='$idProducto'");
        }

    }
    //mysqli_query($conn3, "delete from sDetalleOperPendites where id = $id");
    mysqli_query($conn3, "UPDATE sDetalleOperPendites set estado = 2 where id = $id");
}

/*
if ($montoPagado < $total) {

    $montoPendiente = $montoPagado - $total;
    mysqli_query($conn3, "INSERT INTO sCuentasCobrar (idDocumento, numeroDocumento, idEmpresa, montoBase, montoPagado, montoPendiente, fechaActualizado, fechaPago, idUsuario) VALUES 
	 								                  ('$idOperacion', '$numeroFactura', '$cliente_id', '$total', '$montoPagado', '$montoPendiente' ,'$fechaRegistro', '$fechaRegistro', '$usuario_id');");
}
*/
// Envio de Mensaje al Cliente Sobre Sus Credenciales de Accesso Laboratorio//

$queryList = mysqli_query($conn3, "SELECT * FROM  sOperacionInv WHERE idOperacion='$idOperacion'");
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $cliente_id = $rowMotorizado["idCliente"];
    $usuario_id = $rowMotorizado["idEmpresa"];
}

$queryList = mysqli_query($conn3, "SELECT * FROM  cliente WHERE cliente_id='$cliente_id'");
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $Nombre = $rowMotorizado["nombre_cliente"];
    $Nombre = trim($Nombre, ' ');
    $Whatsapp = $rowMotorizado["whatsapp"];

    $Usuario_Web = $rowMotorizado["Usuario_Web"];
    $Clave_Web = $rowMotorizado["Clave_Web"];
}

$mensajeW = " Sr(a) *" . $Nombre . "* Se le ha generado una orden de laboratorio de la Empresa " . funcionMaster($usuario_id, 'ID', 'NOMBRE_USUARIO', 'usuarios') . ", Puedes visualizarla desde la plataforma del sistema accediendo al siguiente link {$Base}Plataforma Usuario: {$Usuario_Web} Clave: {$Clave_Web} , Para solo visualizar la orden entrar en el siguiente Link: {$Base}LB_ImpresionResultadoOrden?idOperacion={$idOperacion}";
$action = 0;
Whatsapp_sent_cliente($linkkey, $Whatsapp, $mensajeW, $cliente_id, $usuario_id, $Whatsapp, $action);

// Envio de Mensaje al Cliente Sobre Sus Credenciales de Accesso Laboratorio [CIERRE]//
echo "<script language='Javascript'> window.location='LB_PreliminarOrden?idOperacion=$idOperacion';</script>"; 

?>