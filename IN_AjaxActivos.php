<?php
include("funciones/conn3.php");
date_default_timezone_set('America/Bogota');

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



//Este se usuara para la carga de activos
if ($_POST["Tipo_Consulta"] == "Cargar Activos") {

    $codigoProd = $_POST['codigoProd'];
    $deposito = $_POST['deposito'];

     // obtener precio
     $queryinv = mysqli_query($conn3, "SELECT * FROM  sinvetrios where ID = $codigoProd");
     $nrowl = mysqli_num_rows($queryinv);
     while ($rowinv = mysqli_fetch_array($queryinv)) {
         $precio = $rowinv['precio'];
         $tipo = $rowinv['tipo'];
     }

     //recorre la tabla de los productos y sus departamentos
     $QueryLotes = mysqli_query($conn3, "SELECT * FROM  SinvDep where idSinvetrios = $codigoProd AND idDep = $deposito");
     $NrowSinvDep = mysqli_num_rows($QueryLotes);
     while ($RowProducto = mysqli_fetch_array($QueryLotes)) {
        $id = $RowProducto['id'];

        $TipoInventario_id = $RowProducto['tipo'];
        $TipoInventarioCodigo = funcionMaster($TipoInventario_id,'id','tipo','scategoria');

        switch($TipoInventarioCodigo) {
            case '6'://Producto Simple
                $ArregloLote[$RowProducto['id']]["Nombre"] = $RowProducto['lote'];
                $ArregloLote[$RowProducto['id']]["id"] = $RowProducto['id'];
                $Arreglo["Tipo"] = "Activos";
                $Arreglo["Lista"] = false;

                $ArregloLote[$RowProducto['id']]["Existencia"] = $RowProducto['existencia'];
                break;
            
        }
        

     }

     if($ArregloLote == null){
        $Arreglo["Tipo"] = "Error";
     }
     $Arreglo["Precio"] = $precio;
     $Arreglo["Detalles"] = $ArregloLote;

     
     echo json_encode($Arreglo);


}

//Este se usuara para el modulo de la carga de activos
if ($_POST["Tipo_Consulta"] == "Eliminar Detalles Activos") {

    $id = $_POST['Detalle_id'];
    $queryList = mysqli_query($conn3, "UPDATE Activos_Detalles_Temp SET Activo='0' WHERE id ='{$id}' limit 1");


}










if ($_POST["Tipo_Consulta"] == "Agregar Seriales Producto") {

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



if ($_POST["Tipo_Consulta"] == "Buscar Serial Registrado Detalles Cargar Activos") {

    $Campo1 = mysqli_query($conn3, "show COLUMNS from Activos_Detalles_Temp WHERE Field = 'Seriales';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `Activos_Detalles_Temp` ADD `Seriales` TEXT NULL  COMMENT 'Arreglo de los seriales de los productos a comprar *Creado desde modulo de IN_AjaxActivos ActivosCargar.php*'");
    }


    $serial = $_POST["serial"];
    $Sinvdep = $_POST["Sinvdep"];
    $Detalle_id = $_POST["Detalle_id"];

    $QuerySinvDep = mysqli_query($conn3, "SELECT * FROM SinvDep WHERE id = '$Sinvdep' limit 1");
    while ($RowSinvDep= mysqli_fetch_array($QuerySinvDep)) {
        $idSinvetrios = $RowSinvDep['idSinvetrios'];
    }

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

if ($_POST["Tipo_Consulta"] == "Agregar Seriales Producto Detalles Cargar Activos") {


    parse_str($_POST['formulario'], $formData);


    $SerialesArreglo = json_encode($formData['ArregloExistencias']);

    $DetalleCompra = $formData["DetalleActivoCargar"];// input modal 
    $Resultado = mysqli_query($conn3, "UPDATE Activos_Detalles_Temp SET Seriales = '$SerialesArreglo' where id = $DetalleCompra;");

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

    $QueryDetalles = mysqli_query($conn3, "SELECT * FROM Activos_Detalles_Temp WHERE id = '$Detalle_id' ");
    while ($RowDetalles= mysqli_fetch_array($QueryDetalles)) {
    
        $ArregloSeriales = json_decode($RowDetalles['Seriales']);

    }
     
    echo json_encode($ArregloSeriales);
}



if ($_POST["Tipo_Consulta"] == "Eliminar Seriales Detalles") {


    $Detalle_id = $_POST["Detalle_id"];
    //este segundo solo aplica para cuando es descargar activos
    $Resultado = mysqli_query($conn3, "UPDATE Activos_Detalles_Temp SET Seriales = '', Seriales_Arreglo_id = '' where id = $Detalle_id;");

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







//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////




if ($_POST["Tipo_Consulta"] == "Consultar Seriales Disponibles") {

    $Campo1 = mysqli_query($conn3, "show COLUMNS from SinvSerial WHERE Field = 'Activo';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `SinvSerial` ADD `Activo` INT(11) NULL DEFAULT '1'  COMMENT '0-> no activo/descargado, 1-> activo/cargado , 2-> asignado *Creado desde modulo de IN_AjaxActivos ActivosDescargar.php*'");
    }
    
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




if ($_POST["Tipo_Consulta"] == "Buscar Serial Registrado Detalles Descargar Activos") {

    $Campo1 = mysqli_query($conn3, "show COLUMNS from Activos_Detalles_Temp WHERE Field = 'Seriales';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `Activos_Detalles_Temp` ADD `Seriales` TEXT NULL  COMMENT 'Arreglo de los seriales de los productos a comprar *Creado desde modulo de IN_AjaxActivos ActivosCargar.php*'");
    }

    $Campo1 = mysqli_query($conn3, "show COLUMNS from Activos_Detalles_Temp WHERE Field = 'Seriales_Arreglo_id';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `Activos_Detalles_Temp` ADD `Seriales_Arreglo_id` TEXT NULL  COMMENT 'Arreglo id de los seriales de los productos a comprar *Creado desde modulo de IN_AjaxActivoss ActivosCargar.php*'");
    }



    $serial = $_POST["serial"];
    $Sinvdep = $_POST["Sinvdep"];
    $Detalle_id = $_POST["Detalle_id"];

    $QuerySinvDep = mysqli_query($conn3, "SELECT * FROM SinvDep WHERE id = '$Sinvdep' limit 1");
    while ($RowSinvDep= mysqli_fetch_array($QuerySinvDep)) {
        $idSinvetrios = $RowSinvDep['idSinvetrios'];
    }

    //////////////////////////////////? Consulta solo los detalles de la carga de activos ///////////////////////////////////////////

    $QueryDetalles = mysqli_query($conn3, "SELECT * FROM Activos_Detalles_Temp WHERE idProducto = '$idSinvetrios' AND Activo = 1 AND Seriales != '' AND Tipo = '2' ");
    while ($RowDetalles= mysqli_fetch_array($QueryDetalles)) {
    
        $ArregloSeriales = json_decode($RowDetalles['Seriales'],true);
        //echo $ArregloSeriales;
        if (in_array($serial, array_values($ArregloSeriales))) {
            $Arreglo["Estado"] = "Existe";
            $Arreglo["Mensaje"] = "¡El serial ya se encuentra Registrado en Otro Detalle del Modulo de <b>Descargar Activos</b>!";
        }
        
    }

    //////////////////////////////////? [FIN] Consulta solo los detalles de la carga de activos ///////////////////////////////////////////


    
    if($Arreglo["Estado"] == ""){

        $Arreglo["Estado"] = "No Existe";
    }

    echo json_encode($Arreglo, true);

}

if ($_POST["Tipo_Consulta"] == "Agregar Seriales Producto Detalles Descargar Activos") {


    parse_str($_POST['formulario'], $formData);


    //$SerialesArreglo = json_encode($formData['ArregloExistencias']);
    /*
    $DetalleCompra = $formData["DetalleActivoCargar"];// input modal 
    $Resultado = mysqli_query($conn3, "UPDATE Activos_Detalles_Temp SET Seriales = '$SerialesArreglo' where id = $DetalleCompra;");
    */

    $SerialesArreglo = $formData["ArregloExistencias"];

    foreach ($SerialesArreglo as $key => $value) {
        $SerialesArregloFinal[$key]['id'] = $value;
        $SerialesArregloFinal[$key]['Serial'] = funcionMaster($value, 'id', 'Serial', 'SinvSerial');

        $SerialesArregloNormal[$key] = funcionMaster($value, 'id', 'Serial', 'SinvSerial');
    }

    $SerialesArregloFinal = json_encode($SerialesArregloFinal);
    $SerialesArregloNormal = json_encode($SerialesArregloNormal);

    $DetalleCompra = $formData["DetalleActivoCargar"];// input modal 
    $Resultado = mysqli_query($conn3, "UPDATE Activos_Detalles_Temp SET Seriales_Arreglo_id = '$SerialesArregloFinal', Seriales = '$SerialesArregloNormal' where id = $DetalleCompra;");


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




//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////?Descarga de activos //////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


//esto es para la transferencia de inventario entre depositos, salida de inventarios
if ($_POST["Tipo_Consulta"] == "Verificar Existencia Operaciones Descargar Activo") {

    $usuario_id = $_POST['usuario_id'];
    //$cliente_id = $_POST['cliente_id'];
    $deposito = $_POST['deposito'];
    $tipoInventario = $_POST['tipoInventario'];

    function CalcularExistenciasDescontar_OperacionesInventario($usuario_id,$deposito,$tipoFactura){
        include 'funciones/conn3.php';
    
        $usuario_id = $usuario_id;
        //$cliente_id = $cliente_id;
    
        $deposito = $deposito;
        //aqui se realiza la consulta de todos detalles a facturar
        //$queryListT = mysqli_query($conn3, "SELECT * FROM  operacioninv WHERE estado = 0 AND usuario_id =$usuario_id AND tipo = '$tipoFactura'  ORDER BY id ASC");
        $queryListT = mysqli_query($conn3, "SELECT * FROM  Activos_Detalles_Temp where Activo = 1 and  usuario_id = $usuario_id AND Tipo = '2' order by id");
        while ($rowMotorizadoT = mysqli_fetch_array($queryListT)) {
    
            $Producto_id = $rowMotorizadoT['idProducto'];
            $SinvDep_id = $rowMotorizadoT['SinvDep_id'];
    
            $Cantidad_Producto = $rowMotorizadoT['Cantidad'];
    
            $ArregloProductos=array();
            $ArregloExistenciasProducto=array();
            //aqui se va almacenando por id de SinvDep_id las cantidades a descontar
            if($SinvDep_id != "0"){
                $ArregloExistencias_InvDep[$SinvDep_id]["Existencias Descontar"] = $ArregloExistencias_InvDep[$SinvDep_id]["Existencias Descontar"] + $rowMotorizadoT['Cantidad'];
            }else{
    
                $queryinv = mysqli_query($conn3, "SELECT * FROM  sinvetrios where ID = $Producto_id");
                while ($rowinv = mysqli_fetch_array($queryinv)) {
                    $tipo = $rowinv['tipo'];
                }
    
                $queryinv = mysqli_query($conn3, "SELECT * FROM  scategoria where id = $tipo LIMIT 1");
                while ($rowinv = mysqli_fetch_array($queryinv)) {
                    $TipoInventario = $rowinv['tipo'];
                }
    
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
    
    
    $ArregloExistencias = CalcularExistenciasDescontar_OperacionesInventario($usuario_id,$deposito,$tipoInventario);

    echo json_encode($ArregloExistencias,true);
}



///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////? Asignar Serial Empleado ////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if ($_POST["Tipo_Consulta"] == "Cargar Seriales Modulo AsignarSerialEmpleado") {

    $Deposito_id = $_POST["Deposito_id"];
    $idProducto = $_POST["idProducto"];

    $QuerySinvDep = mysqli_query($conn3, "SELECT * FROM SinvDep WHERE idDep = '$Deposito_id' AND idSinvetrios = '$idProducto'");
    while ($RowSinvDep= mysqli_fetch_array($QuerySinvDep)) {
        $ArregloSinvDep[] = $RowSinvDep['id'];
    }

    $Contador=0;
    foreach ($ArregloSinvDep as $key => $value) {
        
        $QuerySeriales = mysqli_query($conn3, "SELECT * FROM SinvSerial WHERE idSinvDep = '$value' AND idSinvetrios = '$idProducto' AND Activo = 1");
        while ($RowSeriales= mysqli_fetch_array($QuerySeriales)) {
            $Contador++;
            $ArregloOpcionesSeriales[$Contador]['id'] = $RowSeriales['id'];
            $ArregloOpcionesSeriales[$Contador]['Serial'] = $RowSeriales['Serial'];
        }

    }

    echo json_encode($ArregloOpcionesSeriales, true);

}