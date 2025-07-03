<?php
session_start();
include "funciones/funciones.php";
include "funciones/conn3.php";


$clienteId = $_GET['clienteId'];
$usuarioId = $_GET['usuarioId'];
$historiaClinica1 = $_GET['historiaClinica1'];
$tipo_historia  = $_GET['tipo_historia'];
$ID_Usuario  =  $_SESSION['ID'];


$_POST = DatosIngresarMysqli($_POST);

if (isset($_POST['GuardarDetalleOrden'])) {
    date_default_timezone_set('America/Bogota');

    $Campo1 = mysqli_query($conn3, "show COLUMNS from sDetalleOperPendites WHERE Field = 'Descuento_Numerico';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `sDetalleOperPendites` ADD `Descuento_Numerico` TEXT NULL DEFAULT '0'  COMMENT 'valor numerico del descuento *Creado desde modulo de factura*';");
    }

    $Campo1 = mysqli_query($conn3, "show COLUMNS from sDetalleOperPendites WHERE Field = 'Descuento_Textual';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `sDetalleOperPendites` ADD `Descuento_Textual` TEXT NULL DEFAULT '0'  COMMENT 'valor Original del descuento *Creado desde modulo de factura*';");
    }

    $Campo1 = mysqli_query($conn3, "show COLUMNS from sDetalleOper WHERE Field = 'Descuento_Numerico';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `sDetalleOper` ADD `Descuento_Numerico` TEXT NULL DEFAULT '0'  COMMENT 'valor numerico del descuento *Creado desde modulo de factura*';");
    }

    $Campo1 = mysqli_query($conn3, "show COLUMNS from sDetalleOper WHERE Field = 'Descuento_Textual';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `sDetalleOper` ADD `Descuento_Textual` TEXT NULL DEFAULT '0'  COMMENT 'valor Original del descuento *Creado desde modulo de factura*';");
    }

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    $Campo1 = mysqli_query($conn3, "show COLUMNS from sDetalleOperPendites WHERE Field = 'SinvDep_id';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
            mysqli_query($conn3, "ALTER TABLE `sDetalleOperPendites` ADD `SinvDep_id` INT(11) NULL DEFAULT '0' COMMENT '0-> producto diferente a lote y simple | los demas numeros sera el id de la tabla  SinvDep *Creado desde guardar detalle*'");
    }
    $Campo1 = mysqli_query($conn3, "show COLUMNS from sDetalleOper WHERE Field = 'SinvDep_id';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
            mysqli_query($conn3, "ALTER TABLE `sDetalleOper` ADD `SinvDep_id` INT(11) NULL DEFAULT '0' COMMENT '0-> producto diferente a lote y simple | los demas numeros sera el id de la tabla  SinvDep *Creado desde guardar detalle*'");
    }


    $Campo1 = mysqli_query($conn3, "show COLUMNS from sDetalleOperPendites WHERE Field = 'Deposito_id';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
            mysqli_query($conn3, "ALTER TABLE `sDetalleOperPendites` ADD `Deposito_id` INT(11) NULL DEFAULT '0' COMMENT 'id de la tabla dep *Creado desde guardar detalle*'");
    }

    $Campo1 = mysqli_query($conn3, "show COLUMNS from sDetalleOper WHERE Field = 'Deposito_id';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
            mysqli_query($conn3, "ALTER TABLE `sDetalleOper` ADD `Deposito_id` INT(11) NULL DEFAULT '0' COMMENT 'id de la tabla dep *Creado desde guardar detalle*'");
    }

    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


    $idOperacion = 0;
    $fechaRegistro = date("Y-m-d H:i:s");
    $codigoProd = $_POST["codigoProd"];
    $cantidad = $_POST['cantidad'];

    $descripcion = mysqli_real_escape_string($conn3, funcionMaster($codigoProd, 'ID', 'descripcion', 'sinvetrios'));
    $base = $_POST["base"];
    $impuesto = 0;

    $subTotal = $_POST["subTotal"];
    $usuario_id = $_POST['usuario_id'];
    $cliente_id = $_POST['cliente_id'];
    $tipo_historia = $_POST['tipo_historia'];
    $historia = $_POST['historia'];

    $descuento_base = $_POST['descuento'];

    $totalbase = round($base * $cantidad,2);

    if (strpos($descuento_base, '%') !== false) {

        $descuentos = str_replace("%", "", "$descuento_base");
        $descuentos = ($descuentos / 100);
        $descuento_final = round(($totalbase * $descuentos), 2);
    } else {
        $descuento_final = $descuento_base;
    }

    $valor_calculado = round($totalbase - $descuento_final,2);

    if ("$valor_calculado" != "$subTotal") {
        $subtotal = round($totalbase - $descuento_final,2);
        $Mensaje = "[F]";
    }


     ////////////////////apartado iva
     $iva = funcionMaster($codigoProd, 'ID', 'iva', 'sinvetrios');
     if($iva!="" AND $iva != "0") {
         // Calcular el monto del IVA
         $ivaMonto = round((($subTotal * $iva) / 100),2);

         // Sumar el monto del IVA al subtotal
         $totalConIva = round($subTotal + $ivaMonto,2);
     }else{
           $iva=0;
           $ivaMonto=0;
           $totalConIva = round($subTotal,2);  
     }
     //////////////////////////////////

    $SinvDep_id = $_POST['SinvDep_id'];
    $Deposito_id = $_POST['dep'];

    $queryList = mysqli_query($conn3, "INSERT INTO sDetalleOperPendites (idOperacion, fechaRegistro, idProducto, cantidad, descripcion, base, impuesto, totalbase, 
  subTotal, id_usuario, id_cliente,Descuento_Numerico,Descuento_Textual,SinvDep_id,Deposito_id,tipo,Impuesto_Numerico,Impuesto_Textual,Total) VALUES ('$idOperacion','$fechaRegistro', '$codigoProd','$cantidad','$descripcion','$base',
  '$impuesto', '$totalbase', '$subTotal', '$usuario_id', '$cliente_id','$descuento_final','$descuento_base','$SinvDep_id','$Deposito_id','1','$ivaMonto','$iva','$totalConIva');") or die(mysqli_error($conn3));


echo "<script language='Javascript'> window.history.back(-1)</script>";
}


if (isset($_GET['borrar'])) {
    $id = $_GET['borrar'];
    $historiaClinica1 = $_GET['historiaClinica1'];
    $tipo_historia  = $_GET['tipo_historia'];
  
  
    mysqli_query($conn3, "UPDATE sDetalleOperPendites set estado = 0 WHERE id = '{$id}' limit 1;");
  
    $clienteId = $_GET["clienteId"];
    $ruta = htmlentities($_SERVER['PHP_SELF']);
    
    echo "<script language='Javascript'> window.history.back(-1)</script>";
  }
