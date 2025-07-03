<?php
date_default_timezone_set('America/Bogota');
include 'funciones/conn3.php';

function funcionMaster($filtro, $campoFiltrar, $campoImprimir, $tabla)
    {
        include 'funciones/conn3.php';
        $query = mysqli_query($conn3, "SELECT * FROM $tabla where $campoFiltrar = '$filtro'");
        $nrowl = mysqli_num_rows($query);
        while ($row = mysqli_fetch_array($query)) {

            $text = $row[$campoImprimir];
        }
        return  $text;
    }


if($_POST["Tipo_Consulta"] == "Agregar Detalle Presupuesto"){

    $PresupuestoOdontogramaDetalle_id = $_POST["PresupuestoOdontogramaDetalle_id"];
    $tipo_detalle = $_POST["tipo_detalle"];
    
    $Deposito_Modal = $_POST["Deposito_Modal"];
    if($Deposito_id==""){$Deposito_id="0";}

    if($tipo_detalle == "Factura" ){
        $tipo_detalle="7";
    }elseif($tipo_detalle == "Presupuesto"){
        $tipo_detalle="6";
    }

    $QueryPresupuestoTratamiento = mysqli_query($conn3, "SELECT * FROM OD_Procedimientos_Presupuestar WHERE id = '$PresupuestoOdontogramaDetalle_id'");
    while ($RowPrespuestoTratamiento = mysqli_fetch_array($QueryPresupuestoTratamiento)) {
        $inventario_id = $RowPrespuestoTratamiento["inventario_id"];
        $cliente_id = $RowPrespuestoTratamiento["cliente_id"];
        $Detalle_Odontograma_id = $RowPrespuestoTratamiento["detalle_odontograma_id"];
    }
    $idProducto = $inventario_id;

    
    $QueryInventario = mysqli_query($conn3, "SELECT * FROM sinvetrios WHERE ID = '$idProducto'");
    while ($RowInventario = mysqli_fetch_array($QueryInventario)) {
        $descripcion = $RowInventario["descripcion"];
        //$precio = $RowInventario["precio"];
    }
    

    $QueryLotes = mysqli_query($conn3, "SELECT * FROM  SinvDep where idSinvetrios = $idProducto AND idDep = $Deposito_Modal");
    $NrowSinvDep = mysqli_num_rows($QueryLotes);
    while ($RowProducto = mysqli_fetch_array($QueryLotes)) {
        $id_sinvdep = $RowProducto['id'];
    }

    if($id_sinvdep==""){$id_sinvdep="0";}
    $SinvDep_id = $id_sinvdep;
    $Deposito_id = $Deposito_Modal;

    $QueryDetalleOdontograma = mysqli_query($conn3, "SELECT * FROM OD_OdontogramaMasterDetalle WHERE id = '$Detalle_Odontograma_id'");
    while ($RowDetalleOdontograma = mysqli_fetch_array($QueryDetalleOdontograma)) {
        $Numero_Diente = $RowDetalleOdontograma["Numero_Diente"];
        $Procedimiento = str_replace(array("'", '"'), '',funcionMaster($RowDetalleOdontograma["Procedimiento"],'id','Nombre','OD_Procedimiento'));
        $NombreCara = $RowDetalleOdontograma["NombreCara"];
    }
    
    $precio = $_POST["Precio"];


    $idOperacion = 0;
    $fechaRegistro = date("Y-m-d H:i:s");
    $idProducto = $idProducto;
    $cantidad = "1";
    $descripcion = mysqli_real_escape_string($conn3,$descripcion);
    $precio = $precio;
    $impuesto = 0;
    $subTotal = round($precio * $cantidad,2);
    
    $usuario_id = $_POST['usuario_id'];
    $cliente_id = $cliente_id;

    $Descuento_Numerico = 0;
    $Descuento_Textual = 0;

     ////////////////////apartado iva
     $iva = funcionMaster($idProducto, 'ID', 'iva', 'sinvetrios');
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


    $ArregloOdontograma["Diente"]=$Numero_Diente;
    $ArregloOdontograma["Procedimiento"]=$Procedimiento;
    $ArregloOdontograma["Cara"]=$NombreCara;

    $Mas_Detalles_Odontograma = json_encode($ArregloOdontograma);
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $Campo1 = mysqli_query($conn3, "show COLUMNS from sDetalleOperPendites WHERE Field = 'detalle_presupuesto_odontograma';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `sDetalleOperPendites` ADD `detalle_presupuesto_odontograma` TEXT NULL DEFAULT '0' COMMENT ' este campo es el id de la tabla OD_Procedimientos_Presupuestar* Creado desde modulo de Ajax_Presupuesto.php*'");
    }
    $Campo1 = mysqli_query($conn3, "show COLUMNS from sDetalleOper WHERE Field = 'detalle_presupuesto_odontograma';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `sDetalleOper` ADD `detalle_presupuesto_odontograma` TEXT NULL DEFAULT '0' COMMENT ' este campo es el id de la tabla OD_Procedimientos_Presupuestar* Creado desde modulo de Ajax_Presupuesto.php*'");
    }

    $Campo1 = mysqli_query($conn3, "show COLUMNS from sDetalleOperPendites WHERE Field = 'Mas_Detalles_Odontograma';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `sDetalleOperPendites` ADD `Mas_Detalles_Odontograma` TEXT NULL DEFAULT '0' COMMENT ' este campo es el id de la tabla OD_Procedimientos_Presupuestar* Creado desde modulo de Ajax_Presupuesto.php*'");
    }
    $Campo1 = mysqli_query($conn3, "show COLUMNS from sDetalleOper WHERE Field = 'Mas_Detalles_Odontograma';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `sDetalleOper` ADD `Mas_Detalles_Odontograma` TEXT NULL DEFAULT '0' COMMENT ' este campo es el id de la tabla OD_Procedimientos_Presupuestar* Creado desde modulo de Ajax_Presupuesto.php*'");
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    $queryUsuario = "INSERT INTO sDetalleOperPendites (idOperacion, fechaRegistro, idProducto, cantidad, descripcion, base, impuesto, totalbase, subTotal, id_usuario, id_cliente,Descuento_Numerico,Descuento_Textual,detalle_presupuesto_odontograma,Mas_Detalles_Odontograma,tipo,SinvDep_id,Deposito_id,Impuesto_Numerico,Impuesto_Textual,Total) 
                                          VALUES ('$idOperacion','$fechaRegistro', '$idProducto','$cantidad','$descripcion','$precio','$impuesto', '$precio', '$subTotal', '$usuario_id', '$cliente_id','$Descuento_Numerico','$Descuento_Textual','$PresupuestoOdontogramaDetalle_id','$Mas_Detalles_Odontograma','$tipo_detalle','$SinvDep_id','$Deposito_id','$ivaMonto','$iva','$totalConIva');";

    $Respuesta = mysqli_query($conn3, $queryUsuario) or die(mysqli_error($conn3));

    if ($Respuesta == true) {
        $queryList = mysqli_query($conn3, "UPDATE OD_Procedimientos_Presupuestar SET Estado='1' WHERE id = '{$PresupuestoOdontogramaDetalle_id}' limit 1;");
    }

}elseif($_POST["Tipo_Consulta"] == "Eliminar Detalle Presupuesto"){

    $id_detalleoper_temp = $_POST["id"];
    $QueryDetalle = mysqli_query($conn3, "SELECT * FROM sDetalleOperPendites WHERE id = '$id_detalleoper_temp'");
    while ($RowDetalle = mysqli_fetch_array($QueryDetalle)) {
        $detalle_presupuesto_odontograma = $RowDetalle["detalle_presupuesto_odontograma"];
    }
    mysqli_query($conn3, "UPDATE sDetalleOperPendites set estado = 0 where id = '$id_detalleoper_temp' limit 1");

    $queryList = mysqli_query($conn3, "UPDATE OD_Procedimientos_Presupuestar SET Estado='0' WHERE id = '{$detalle_presupuesto_odontograma}' limit 1;");

}

elseif($_POST["Tipo_Consulta"] == "Calcular Precio"){

    $id_detalleoper_temp = $_POST["id"];

    $QueryPresupuestoTratamiento = mysqli_query($conn3, "SELECT * FROM OD_Procedimientos_Presupuestar WHERE id = '$id_detalleoper_temp'");
    while ($RowPrespuestoTratamiento = mysqli_fetch_array($QueryPresupuestoTratamiento)) {
        $inventario_id = $RowPrespuestoTratamiento["inventario_id"];
    }

    $precio = 0;
    $QueryInventario = mysqli_query($conn3, "SELECT * FROM sinvetrios WHERE ID = '$inventario_id'");
    while ($RowInventario = mysqli_fetch_array($QueryInventario)) {
        $precio = $RowInventario["precio"];
    }

    $Arreglo["Precio"] = $precio;
    $Arreglo["Estado"]=true;

    echo json_encode($Arreglo);
}
?>