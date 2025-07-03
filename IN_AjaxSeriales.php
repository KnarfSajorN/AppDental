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


if ($_POST["Tipo_Consulta"] == "Consultar Seriales Disponibles") {
    
    $SinvDep = $_POST["SinvDep"];// input modal 
    
    $Contador=0;
    $QueryDetalles = mysqli_query($conn3, "SELECT * FROM SinvSerial WHERE idSinvDep = '$SinvDep' AND Activo = 1 ");
    while ($RowDetalles= mysqli_fetch_array($QueryDetalles)) {
    
        $ArregloSeriales[$Contador]['Serial'] = $RowDetalles['Serial'];
        $ArregloSeriales[$Contador]['id'] = $RowDetalles['id'];

        $Contador++;
    }

     
    echo json_encode($ArregloSeriales);
}


if ($_POST["Tipo_Consulta"] == "Agregar Seriales Producto Simple") {

    $Campo1 = mysqli_query($conn3, "show COLUMNS from sDetalleOperPendites WHERE Field = 'Seriales_Arreglo_id';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `sDetalleOperPendites` ADD `Seriales_Arreglo_id` TEXT NULL  COMMENT 'Arreglo id de los seriales de los productos a comprar *Creado desde modulo de IN_AjaxSeriales sGenerarFactura.php*'");
    }

    parse_str($_POST['formulario'], $formData);


    //$SerialesArreglo = json_encode($formData['ArregloExistencias']);
    $SerialesArreglo = $formData["ArregloExistencias"];

    foreach ($SerialesArreglo as $key => $value) {
        $SerialesArregloFinal[$key]['id'] = $value;
        $SerialesArregloFinal[$key]['Serial'] = funcionMaster($value, 'id', 'Serial', 'SinvSerial');

        $SerialesArregloNormal[$key] = funcionMaster($value, 'id', 'Serial', 'SinvSerial');
    }

    $SerialesArregloFinal = json_encode($SerialesArregloFinal);
    $SerialesArregloNormal = json_encode($SerialesArregloNormal);

    $DetalleCompra = $formData["DetalleSerialCargar"];// input modal 
    $Resultado = mysqli_query($conn3, "UPDATE sDetalleOperPendites SET Seriales_Arreglo_id = '$SerialesArregloFinal', Seriales = '$SerialesArregloNormal' where id = $DetalleCompra;");

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


/*
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
*/


if ($_POST["Tipo_Consulta"] == "Buscar Serial Registrado Detalles Producto Simple") {

    $Campo1 = mysqli_query($conn3, "show COLUMNS from sDetalleOperPendites WHERE Field = 'Seriales';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `sDetalleOperPendites` ADD `Seriales` TEXT NULL  COMMENT 'Arreglo de los seriales de los productos a comprar *Creado desde modulo de IN_AjaxSeriales sGenerarPresupuesto.php*'");
    }


    $serial = $_POST["serial"];
    $Sinvdep = $_POST["Sinvdep"];
    $Detalle_id = $_POST["Detalle_id"];

    $QuerySinvDep = mysqli_query($conn3, "SELECT * FROM SinvDep WHERE id = '$Sinvdep' limit 1");
    while ($RowSinvDep= mysqli_fetch_array($QuerySinvDep)) {
        $idSinvetrios = $RowSinvDep['idSinvetrios'];
    }

    //////////////////////////////////? Consulta solo los detalles de la carga de activos ///////////////////////////////////////////

    $QueryDetalles = mysqli_query($conn3, "SELECT * FROM sDetalleOperPendites WHERE idProducto = '$idSinvetrios' AND estado = 1 AND Seriales != '' ");
    while ($RowDetalles= mysqli_fetch_array($QueryDetalles)) {
    
        $ArregloSeriales = json_decode($RowDetalles['Seriales'],true);
        //echo $ArregloSeriales;
        if (in_array($serial, array_values($ArregloSeriales))) {
            $Arreglo["Estado"] = "Existe";
            $Arreglo["Mensaje"] = "¡El serial ya se encuentra Registrado en Otro Detalle de <b>Factura</b>!";
        }
        
    }

    //////////////////////////////////? [FIN] Consulta solo los detalles de la carga de activos ///////////////////////////////////////////


    
    if($Arreglo["Estado"] == ""){

        $Arreglo["Estado"] = "No Existe";
    }

    echo json_encode($Arreglo, true);

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
    $Resultado = mysqli_query($conn3, "UPDATE sDetalleOperPendites SET Seriales = '', Seriales_Arreglo_id = '' where id = $Detalle_id;");

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




if ($_POST["Tipo_Consulta"] == "Consultar Seriales Operaciones") {


      
    $idOperacion = $_POST["idOperacion"];
    

        $QueryDetalle = mysqli_query($conn3, "SELECT * FROM  sDetalleOper WHERE idOperacion = $idOperacion AND estado = 1");
        while ($RowDetalle = mysqli_fetch_array($QueryDetalle)) {
            $id = $RowDetalle['id'];
            $descripcion = $RowDetalle['descripcion'];

            $idProducto = $RowDetalle['idProducto'];
            $SinvDep_id = $RowDetalle['SinvDep_id'];
            $cantidad = $RowDetalle['cantidad'];

            $QueryInventario = mysqli_query($conn3, "SELECT * FROM  sinvetrios WHERE ID = $idProducto");
            while ($RowInventario = mysqli_fetch_array($QueryInventario)) {
                $tipo = $RowInventario['tipo'];
            }
        
            $QueryDepartamento = mysqli_query($conn3, "SELECT * FROM  scategoria WHERE id = $tipo limit 1");
            while ($RowDepartamento = mysqli_fetch_array($QueryDepartamento)) {
                $tipodepartamento = $RowDepartamento['tipo'];
                $maneja_serial = $RowDepartamento['maneja_serial'];
                $caracter_serial = $RowDepartamento['caracter_serial'];
            }
        
            
            $NecesitaSerial=0;
            if($tipodepartamento=="1" AND $maneja_serial=="1"){
                $NecesitaSerial = "1";

                $SinvDep = $_POST["SinvDep"];// input modal 
        
                $Contador=0;
                $QueryDetalles = mysqli_query($conn3, "SELECT * FROM SinvSerial WHERE idSinvDep = '$SinvDep_id' AND Activo = 1 ");
                while ($RowDetalles= mysqli_fetch_array($QueryDetalles)) {
                
                    $ArregloSeriales[$id]['Datos'][$Contador]['Serial'] = $RowDetalles['Serial'];
                    $ArregloSeriales[$id]['Datos'][$Contador]['id'] = $RowDetalles['id'];
                    

                    $Contador++;
                }

                $ArregloSeriales[$id]['Caracter'] = $caracter_serial;
                $ArregloSeriales[$id]['Cantidad'] = $cantidad;
                $ArregloSeriales[$id]['Descripcion'] = $descripcion;
            }else{
                
            }

        }
      
        

    
    echo json_encode($ArregloSeriales);
}


?>
