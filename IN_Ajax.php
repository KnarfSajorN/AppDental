<?php
include("funciones/conn3.php");

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


if ($_POST["Tipo_Consulta"] == "Cargar Costo Anterior") {

    $idProducto = $_POST["idProducto"];


    $QueryCompras = mysqli_query($conn3, "SELECT sDetalleOper.* 
    FROM sDetalleOper
    INNER JOIN sOperacionInv ON sDetalleOper.idOperacion = sOperacionInv.idOperacion
    WHERE sDetalleOper.estado = 1
    AND sDetalleOper.idProducto='$idProducto'
    AND sOperacionInv.tipo = 3
    ORDER BY sDetalleOper.id DESC
    ");
    $NrowDetallesCompras = mysqli_num_rows($QueryCompras);
    $Contador=0;
    while ($RowCompras= mysqli_fetch_array($QueryCompras)) {
        $ArregloCosto[$Contador]=$RowCompras['base'];
        $Contador++;
    }

    if($NrowDetallesCompras==1){
        $ArregloFinal['Base']= $ArregloCosto[0];
    }else if($NrowDetallesCompras==0){
        $ArregloFinal['Base']= "NULL";
    }else{
        $ArregloFinal['Base']= $ArregloCosto[1];
    }

    echo json_encode($ArregloFinal, true);
} 


if ($_POST["Tipo_Consulta"] == "Cargar Costo Todas Compras") {

    $idProducto = $_POST["idProducto"];

    function calcularPromedio($arreglo) {
        if (count($arreglo) == 0) {
            return 0; 
        }
        $suma = array_sum($arreglo);
        $promedio = $suma / count($arreglo);
        return number_format($promedio, 2);
    }

    $QueryCompras = mysqli_query($conn3, "SELECT sDetalleOper.* 
    FROM sDetalleOper
    INNER JOIN sOperacionInv ON sDetalleOper.idOperacion = sOperacionInv.idOperacion
    WHERE sDetalleOper.estado = 1
    AND sDetalleOper.idProducto='$idProducto'
    AND sOperacionInv.tipo = 3
    ORDER BY sDetalleOper.id DESC
    ");
    $NrowDetallesCompras = mysqli_num_rows($QueryCompras);
    $Contador=0;
    while ($RowCompras= mysqli_fetch_array($QueryCompras)) {
        $ArregloCosto[$Contador]=$RowCompras['base'];
        $Contador++;
    }

    $ArregloFinal['Promedio'] = calcularPromedio($ArregloCosto);

    echo json_encode($ArregloFinal, true);
} 




if ($_POST["Tipo_Consulta"] == "Agregar Seriales Producto") {

    /////////////////////////////////////////////////////////////////// creacion de la tabla para los Seriales //////////////////////////////////////////////////////////////////////////
    $tabla = mysqli_query($conn3, "SHOW TABLES LIKE 'SinvSerial'");
    $nrowtabla = mysqli_num_rows($tabla);
    if ($nrowtabla == 0) {
        $query = "CREATE TABLE `SinvSerial` ( 
            `id` INT(11) NOT NULL AUTO_INCREMENT , 
            `Fecha` DATETIME NULL DEFAULT CURRENT_TIMESTAMP , 
            `usuario_id` INT(11) NULL DEFAULT '0' , 
            `Serial` TEXT NULL DEFAULT '' , 
            `Caracter` TEXT NULL DEFAULT '' , 
            `idSinvetrios` INT(11) NULL DEFAULT '0' , 
            `idSinvDep` INT(11) NULL DEFAULT '0' , 
            `Tipo_Detalle` INT(11) NULL DEFAULT '0' COMMENT '1=Orden de Compras, 2=Cargar Activos',
            PRIMARY KEY (`id`)) ENGINE = MyISAM;";
            $creaciontabla = mysqli_query($conn3, $query);
    }
    /////////////////////////////////////////////////////////////////// creacion de la tabla para los Seriales //////////////////////////////////////////////////////////////////////////

    parse_str($_POST['formulario'], $formData);

    $fechaRegistro = date("Y-m-d H:i:s");
    $SinvDep = $formData["SinvDep"];
    $usuario_id = $formData["usuario_id"];

    $QuerySinvDep = mysqli_query($conn3, "SELECT * FROM SinvDep WHERE id = '$SinvDep'");
    while ($RowSinvDep= mysqli_fetch_array($QuerySinvDep)) {
        $idSinvetrios = $RowSinvDep['idSinvetrios'];
    }

    $Tipo_Departamento = funcionMaster($idSinvetrios, 'ID', 'tipo', 'sinvetrios');
    $Caracter = funcionMaster($Tipo_Departamento, 'id', 'caracter_serial', 'scategoria');

    foreach ($formData['ArregloExistencias'] as $key => $value) {
        $Serial = $value;

        mysqli_query($conn3, "INSERT INTO SinvSerial (Fecha, usuario_id, Serial, Caracter, idSinvetrios, idSinvDep) VALUES ('$fechaRegistro', '$usuario_id', '$Serial', '$Caracter', '$idSinvetrios', '$SinvDep')");

    }

}

if ($_POST["Tipo_Consulta"] == "Buscar Serial Registrado") {

    $serial = $_POST["serial"];
    $Sinvdep = $_POST["Sinvdep"];

    $QuerySinvDep = mysqli_query($conn3, "SELECT * FROM SinvDep WHERE id = '$Sinvdep' limit 1");
    while ($RowSinvDep= mysqli_fetch_array($QuerySinvDep)) {
        $idSinvetrios = $RowSinvDep['idSinvetrios'];
    }

    $QuerySeriales = mysqli_query($conn3, "SELECT * FROM SinvSerial WHERE idSinvetrios = '$idSinvetrios' AND Serial = '$serial'");
    $nrowSeriales = mysqli_num_rows($QuerySeriales);

    if ($nrowSeriales > 0) {
        $Arreglo["Estado"]="Existe";
    }else{
        $Arreglo["Estado"]="No Existe";
    }

    echo json_encode($Arreglo, true);

}



if ($_POST["Tipo_Consulta"] == "Buscar Serial Registrado Detalles Compra") {

    $Campo1 = mysqli_query($conn3, "show COLUMNS from sDetalleOperPendites WHERE Field = 'Seriales';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `sDetalleOperPendites` ADD `Seriales` TEXT NULL  COMMENT 'Arreglo de los seriales de los productos a comprar *Creado desde modulo de IN_Ajax sGenerarOrden*'");
    }

    $Campo1 = mysqli_query($conn3, "show COLUMNS from SinvSerial WHERE Field = 'Detalle_id';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `SinvSerial` ADD `Detalle_id`  INT(11) NULL DEFAULT '0'   COMMENT 'id del detalle que se guardara en soperacioninv *Creado desde modulo de IN_Ajax sGenerarOrden*'");
    }

    $serial = $_POST["serial"];
    $Sinvdep = $_POST["Sinvdep"];
    $Detalle_id = $_POST["Detalle_id"];

    $QuerySinvDep = mysqli_query($conn3, "SELECT * FROM SinvDep WHERE id = '$Sinvdep' limit 1");
    while ($RowSinvDep= mysqli_fetch_array($QuerySinvDep)) {
        $idSinvetrios = $RowSinvDep['idSinvetrios'];
    }

    /*
    $QueryDetalles = mysqli_query($conn3, "SELECT * FROM sDetalleOperPendites WHERE idProducto = '$idSinvetrios' AND estado = 1 AND Seriales != ''");
    while ($RowDetalles= mysqli_fetch_array($QueryDetalles)) {
    
        $ArregloSeriales = json_decode($RowDetalles['Seriales'],true);
        //echo $ArregloSeriales;
        if (in_array($serial, array_values($ArregloSeriales))) {
            $Arreglo["Estado"] = "Existe";
        }
        
    }
    */

    //////////////////////////////////? Consulta solo los detalles de la carga de activos ///////////////////////////////////////////

    $QueryDetalles = mysqli_query($conn3, "SELECT * FROM Activos_Detalles_Temp WHERE idProducto = '$idSinvetrios' AND Activo = 1 AND Seriales != ''");
    while ($RowDetalles= mysqli_fetch_array($QueryDetalles)) {
    
        $ArregloSeriales = json_decode($RowDetalles['Seriales'],true);
        //echo $ArregloSeriales;
        if (in_array($serial, array_values($ArregloSeriales))) {
            $Arreglo["Estado"] = "Existe";
            $Arreglo["Mensaje"] = "¡El serial ya se encuentra Registrado en Otro Detalle del Modulo de <b>Cargar Activos</b>!";
        }
        
    }

    //////////////////////////////////? [FIN] Consulta solo los detalles de la carga de activos ///////////////////////////////////////////


    //////////////////////////////////? Consulta solo los detalles de los detalles de las ordenes de compras ///////////////////////////////////////////

    $QueryDetalles = mysqli_query($conn3, "SELECT * FROM sDetalleOperPendites WHERE idProducto = '$idSinvetrios' AND estado = 1 AND Seriales != ''");
    while ($RowDetalles= mysqli_fetch_array($QueryDetalles)) {
    
        $ArregloSeriales = json_decode($RowDetalles['Seriales'],true);
        //echo $ArregloSeriales;
        if (in_array($serial, array_values($ArregloSeriales))) {
            $Arreglo["Estado"] = "Existe";
            $Arreglo["Mensaje"] = "¡El serial ya se encuentra Registrado en Otro Detalle del Modulo de <b>Ordenes de Compra</b>!";
        }
        
    }

    //////////////////////////////////? [FIN] Consulta solo los detalles de los detalles de las ordenes de compras ///////////////////////////////////////////



    if($Arreglo["Estado"] == ""){

        $Arreglo["Estado"] = "No Existe";
    }

    echo json_encode($Arreglo, true);

}

if ($_POST["Tipo_Consulta"] == "Agregar Seriales Producto Detalles Compra") {


    parse_str($_POST['formulario'], $formData);


    $SerialesArreglo = json_encode($formData['ArregloExistencias']);

    $DetalleCompra = $formData["DetalleCompra"];
    $Resultado = mysqli_query($conn3, "UPDATE sDetalleOperPendites SET Seriales = '$SerialesArreglo' where id = $DetalleCompra;");

    $AfectadasUp = mysqli_affected_rows($conn3);
    //si hubo filas afectadas agregar en u narreglo estado true y hacerle un echo con json_encode
    if ($AfectadasUp > 0) {
        $Arreglo["Estado"] = true;
    } else {
        $Arreglo["Estado"] = false;
        $Arreglo["Mensaje"] = mysqli_error($conn3);
    }
     
    echo json_encode($Arreglo);
}


if ($_POST["Tipo_Consulta"] == "Obtener Seriales Registrados Detalles") {


    $Detalle_id = $_POST["Detalle_id"];

    $QueryDetalles = mysqli_query($conn3, "SELECT * FROM sDetalleOperPendites WHERE id = '$Detalle_id' ");
    while ($RowDetalles= mysqli_fetch_array($QueryDetalles)) {
    
        $ArregloSeriales = json_decode($RowDetalles['Seriales']);

    }
     
    echo json_encode($ArregloSeriales);
}



if ($_POST["Tipo_Consulta"] == "Eliminar Seriales Detalles") {


    $Detalle_id = $_POST["Detalle_id"];
    $Resultado = mysqli_query($conn3, "UPDATE sDetalleOperPendites SET Seriales = '' where id = $Detalle_id;");

    $AfectadasUp = mysqli_affected_rows($conn3);
    //si hubo filas afectadas agregar en u narreglo estado true y hacerle un echo con json_encode
    if ($AfectadasUp > 0) {
        $Arreglo["Estado"] = true;
    } else {
        $Arreglo["Estado"] = false;
        $Arreglo["Mensaje"] = mysqli_error($conn3);
    }
     
    echo json_encode($Arreglo);
}




?>
