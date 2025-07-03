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

    //factura general,pos,factura odontograma
if ($_POST["Tipo_Consulta"] == "Verificar Existencia") {

    $usuario_id = $_POST['usuario_id'];
    $cliente_id = $_POST['cliente_id'];

    $deposito = $_POST['deposito'];
    $tipo = $_POST['tipo'];

    function CalcularExistenciasDescontar($usuario_id, $cliente_id, $deposito,$tipoFactura){
        include 'funciones/conn3.php';
    
        $usuario_id = $usuario_id;
        $cliente_id = $cliente_id;
    
        $deposito = $deposito;

        $TipoServicios="0";

        //aqui se realiza la consulta de todos detalles a facturar
        $queryListT = mysqli_query($conn3, "SELECT * FROM  sDetalleOperPendites WHERE estado = 1 and id_usuario =$usuario_id and  id_cliente = $cliente_id AND tipo = '$tipoFactura'  ORDER BY id ASC");
        while ($rowMotorizadoT = mysqli_fetch_array($queryListT)) {
    
            $Producto_id = $rowMotorizadoT['idProducto'];
            $SinvDep_id = $rowMotorizadoT['SinvDep_id'];
    
            $Cantidad_Producto = $rowMotorizadoT['cantidad'];
    
            $ArregloProductos=array();
            $ArregloExistenciasProducto=array();
            //aqui se va almacenando por id de SinvDep_id las cantidades a descontar
            if($SinvDep_id != "0"){
                $ArregloExistencias_InvDep[$SinvDep_id]["Existencias Descontar"] = $ArregloExistencias_InvDep[$SinvDep_id]["Existencias Descontar"] + $rowMotorizadoT['cantidad'];
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

                if($TipoInventario=="2"){
                    $TipoServicios="1";
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

        if($TipoServicios=="1" AND $Arreglo==NULL){
            $Arreglo["Enviar"] = true;
        }
    
        return $Arreglo;
    }
    
    
    $FacturarExistenciasNegativas=0;
    $QueryConfig = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = '$usuario_id' LIMIT 1");
    while ($RowConfig = mysqli_fetch_array($QueryConfig)) {
        $FacturarExistenciasNegativas = $RowConfig['FacturarExistenciasNegativas'];
    }

    $ArregloExistencias = CalcularExistenciasDescontar($usuario_id,$cliente_id,$deposito,$tipo);
    
    if($FacturarExistenciasNegativas=="0"){
        $ArregloExistencias["FiltroExistenciasNegativas"]="No Facturar";
    }else if($FacturarExistenciasNegativas=="1"){
        $ArregloExistencias["FiltroExistenciasNegativas"]="Facturar";
    }else if($FacturarExistenciasNegativas=="2"){
        $ArregloExistencias["FiltroExistenciasNegativas"]="Token";
    }

    echo json_encode($ArregloExistencias,true);
}




//esto es para la transferencia de inventario entre depositos, salida de inventarios
if ($_POST["Tipo_Consulta"] == "Verificar Existencia Operaciones Inventario Transferencia") {

    $usuario_id = $_POST['usuario_id'];
    //$cliente_id = $_POST['cliente_id'];
    $deposito = $_POST['deposito'];
    $tipoInventario = $_POST['tipoInventario'];

    function CalcularExistenciasDescontar_OperacionesInventario($usuario_id,$deposito,$tipoFactura){
        include 'funciones/conn3.php';
    
        $usuario_id = $usuario_id;
        $cliente_id = $cliente_id;
    
        $deposito = $deposito;
        //aqui se realiza la consulta de todos detalles a facturar
        $queryListT = mysqli_query($conn3, "SELECT * FROM  operacioninv WHERE estado = 0 AND usuario_id =$usuario_id AND tipo = '$tipoFactura'  ORDER BY id ASC");
        while ($rowMotorizadoT = mysqli_fetch_array($queryListT)) {
    
            $Producto_id = $rowMotorizadoT['codigoProd'];
            $SinvDep_id = $rowMotorizadoT['SinvDep_id'];
    
            $Cantidad_Producto = $rowMotorizadoT['cantidad'];
    
            $ArregloProductos=array();
            $ArregloExistenciasProducto=array();
            //aqui se va almacenando por id de SinvDep_id las cantidades a descontar
            if($SinvDep_id != "0"){
                $ArregloExistencias_InvDep[$SinvDep_id]["Existencias Descontar"] = $ArregloExistencias_InvDep[$SinvDep_id]["Existencias Descontar"] + $rowMotorizadoT['cantidad'];
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