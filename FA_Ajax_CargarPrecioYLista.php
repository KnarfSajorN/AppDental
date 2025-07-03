<?php
include("funciones/conn3.php");
date_default_timezone_set('America/Bogota');

function funcionMaster($filtro, $campoFiltrar, $campoImprimir, $tabla)
    {
        include 'funciones/conn3.php';
        $query = mysqli_query($conn3, "SELECT * FROM $tabla where $campoFiltrar = '$filtro'");
        // $nrowl = mysqli_num_rows($query);
        if ($query) {
            while ($row = mysqli_fetch_array($query)) {

            $text = $row[$campoImprimir];
            }
        }
        
        return  $text;
    }





//retroalimentar si se implementa en algun lugar 
//Este aplicara en: POS, sGenerarFactura [factura normal], sGenerarPresupuesto [Presupuesto], Presupuesto Facial, Presupuesto Corporal, OD_GenerarPresupuesto [Odontograma]
if ($_POST["Tipo_Consulta"] == "Cargar Precio") {

    $codigoProd = $_POST['codigoProd'];
    $deposito = $_POST['deposito'];

     // obtener precio
     $queryinv = mysqli_query($conn3, "SELECT * FROM  sinvetrios where ID = $codigoProd");
    //  $nrowl = mysqli_num_rows($queryinv);
    if ($queryinv) {
        while ($rowinv = mysqli_fetch_array($queryinv)) {
         $precio = $rowinv['precio'];
         $tipo = $rowinv['tipo'];
        }
    }
    

     

     //recorre la tabla de los productos y sus departamentos
     $QueryLotes = mysqli_query($conn3, "SELECT * FROM  SinvDep where idSinvetrios = $codigoProd AND idDep = $deposito");
    $NrowSinvDep = mysqli_num_rows($QueryLotes);
    
    if ($QueryLotes) {
        while ($RowProducto = mysqli_fetch_array($QueryLotes)) {
            $id = $RowProducto['id'];
    
            $ArregloLote[$RowProducto['id']]["Existencia"] = $RowProducto['existencia'];
            $TipoInventario_id = $RowProducto['tipo'];
            $TipoInventarioCodigo = funcionMaster($TipoInventario_id,'id','tipo','scategoria');
    
            switch($TipoInventarioCodigo) {
                case '1'://Producto Simple
                    $ArregloLote[$RowProducto['id']]["Nombre"] = $RowProducto['lote'];
                    $ArregloLote[$RowProducto['id']]["id"] = $RowProducto['id'];
                    $Arreglo["Tipo"] = "Simple";
                    $Arreglo["Lista"] = false;
                    break;
                case '5'://Lotes
                    $ArregloLote[$RowProducto['id']]["Nombre"] = $RowProducto['lote'];
                    $ArregloLote[$RowProducto['id']]["id"] = $RowProducto['id'];
                    $ArregloLote[$RowProducto['id']]["Vencimiento"] = $RowProducto['fechaVencimiento'];
                    $Arreglo["Tipo"] = "Lotes";
                    $Arreglo["Lista"] = true;
                    break;
                
            }
            $ArregloLote[$RowProducto['id']]["Existencia"] = $RowProducto['existencia'];
    
        }
    }
     

     //aqui entra si no es un lote o un producto simple
     if($NrowSinvDep==0){
        $Arreglo["Lista"] = false;

        $TipoInventario = funcionMaster($tipo,'id','tipo','scategoria');
        //este es un filtro para que solo ingrese si es un producto compuesto
        if($TipoInventario=="3"){
            $resultCompuestos = mysqli_query($conn3, "SELECT * from SinvComp where idCompuesto = '$codigoProd' and activo = 1");
            if ($resultCompuestos) {
                while ($rowCompuestos = mysqli_fetch_array($resultCompuestos)) {
                    $ArregloProductos[$rowCompuestos['idSinvetrios']]=$rowCompuestos['cantidad'];
                }    
            }
            

            $NombreProductosDentroDelCompuesto = "";
            foreach ($ArregloProductos as $key => $value) {
                
                $QueryProductoLoteTallas = mysqli_query($conn3, "SELECT * FROM  SinvDep where idSinvetrios = $key AND idDep = $deposito");
                // $nrowl = mysqli_num_rows($QueryProductoLoteTallas);
                while ($RowProducto = mysqli_fetch_array($QueryProductoLoteTallas)) {
                    $ArregloExistenciasProducto[$key] = $RowProducto['existencia'];
                }

                $QueryInventario = mysqli_query($conn3, "SELECT * FROM  sinvetrios where ID = $key");
                while ($RowInventario = mysqli_fetch_array($QueryInventario)) {
                    $NombreProductosDentroDelCompuesto .= $RowInventario['descripcion']." [X ".$ArregloProductos[$RowInventario['ID']]."] ,";
                }

            }

            foreach ($ArregloProductos as $key => $value) {
                $Existencias[]=floor($ArregloExistenciasProducto[$key]/$ArregloProductos[$key]);
            }
            
            $ExistenciaMenor = min($Existencias);

            if($ExistenciaMenor == ""){
                $ExistenciaMenor = 0;
            }

            $Arreglo["Tipo"] = "Compuesto";
            $ArregloLote[0]["Existencia"] = $ExistenciaMenor;
            $NombreProductosDentroDelCompuesto = trim($NombreProductosDentroDelCompuesto,",");
            $ArregloLote[0]["Nombre"] = $NombreProductosDentroDelCompuesto;
        }else{
            $Arreglo["Tipo"] = "Error";
        }

     }


     //este es un filtro para verificar si el producto es un servicio si lo es manda el $arreglo del tipo como servicio
     $TipodelTipoProducto = funcionMaster($tipo,'id','tipo','scategoria');
     if($TipodelTipoProducto=="2"){
        $Arreglo["Tipo"] = "Servicio";
        $Arreglo["Lista"] = false;
     }
     
     $Arreglo["Precio"] = $precio;
     $Arreglo["Detalles"] = $ArregloLote;

     echo json_encode($Arreglo);


}

//retroalimentar si se implementa en algun lugar 
//Este aplicara en: SgenerarOrdenC[ cargar orden inventarios] ,
if ($_POST["Tipo_Consulta"] == "Cargar Costo") {

    $codigoProd = $_POST['codigoProd'];
    $deposito = $_POST['deposito'];

     // obtener precio
     $queryinv = mysqli_query($conn3, "SELECT * FROM  sinvetrios where ID = $codigoProd");
    //  $nrowl = mysqli_num_rows($queryinv);
    if ($queryinv) {
        while ($rowinv = mysqli_fetch_array($queryinv)) {
            $costo = $rowinv['costo'];
            $tipo = $rowinv['tipo'];
        }   
    }

     //recorre la tabla de los productos y sus departamentos
     $QueryLotes = mysqli_query($conn3, "SELECT * FROM  SinvDep where idSinvetrios = $codigoProd AND idDep = $deposito");
     $NrowSinvDep = mysqli_num_rows($QueryLotes);
    if ($QueryLotes) {
        while ($RowProducto = mysqli_fetch_array($QueryLotes)) {
            $id = $RowProducto['id'];
    
            $ArregloLote[$RowProducto['id']]["Existencia"] = $RowProducto['existencia'];
            $TipoInventario_id = $RowProducto['tipo'];
            $TipoInventarioCodigo = funcionMaster($TipoInventario_id,'id','tipo','scategoria');
    
            switch($TipoInventarioCodigo) {
                case '1'://Producto Simple
                    $ArregloLote[$RowProducto['id']]["Nombre"] = $RowProducto['lote'];
                    $ArregloLote[$RowProducto['id']]["id"] = $RowProducto['id'];
                    $Arreglo["Tipo"] = "Simple";
                    $Arreglo["Lista"] = false;
                    break;
                case '6'://Producto Simple
                    $ArregloLote[$RowProducto['id']]["Nombre"] = $RowProducto['lote'];
                    $ArregloLote[$RowProducto['id']]["id"] = $RowProducto['id'];
                    $Arreglo["Tipo"] = "Simple";
                    $Arreglo["Lista"] = false;
                    break;
                case '5'://Lotes
                    $ArregloLote[$RowProducto['id']]["Nombre"] = $RowProducto['lote'];
                    $ArregloLote[$RowProducto['id']]["id"] = $RowProducto['id'];
                    $ArregloLote[$RowProducto['id']]["Vencimiento"] = $RowProducto['fechaVencimiento'];
                    $Arreglo["Tipo"] = "Lotes";
                    $Arreglo["Lista"] = true;
                    break;
                
            }
            $ArregloLote[$RowProducto['id']]["Existencia"] = $RowProducto['existencia'];
    
        }
    }
    
     
     //este es un filtro para verificar si el producto es un servicio si lo es manda el $arreglo del tipo como servicio
     $TipodelTipoProducto = funcionMaster($tipo,'id','tipo','scategoria');  
     if ($TipodelTipoProducto != "1" && $TipodelTipoProducto != "5" && $TipodelTipoProducto != "6") {
        $Arreglo["Tipo"] = "Error";
        $Arreglo["Lista"] = false;
     }

     $Arreglo["Costo"] = $costo;
     $Arreglo["Detalles"] = $ArregloLote;

     
     echo json_encode($Arreglo);


}


//Este se usuara para la salida de inventario
if ($_POST["Tipo_Consulta"] == "Cargar Informacion Salida") {

    $codigoProd = $_POST['codigoProd'];
    $deposito = $_POST['deposito'];

     // obtener precio
     $queryinv = mysqli_query($conn3, "SELECT * FROM  sinvetrios where ID = $codigoProd");
    //  $nrowl = mysqli_num_rows($queryinv);
    if ($queryinv) {
        while ($rowinv = mysqli_fetch_array($queryinv)) {
            $costo = $rowinv['costo'];
            $tipo = $rowinv['tipo'];
        }
    }
     

     //recorre la tabla de los productos y sus departamentos
     $QueryLotes = mysqli_query($conn3, "SELECT * FROM  SinvDep where idSinvetrios = $codigoProd AND idDep = $deposito");
     $NrowSinvDep = mysqli_num_rows($QueryLotes);
    if ($QueryLotes) {
       while ($RowProducto = mysqli_fetch_array($QueryLotes)) {
            $id = $RowProducto['id'];

            //$ArregloLote[$RowProducto['id']]["Existencia"] = $RowProducto['existencia'];
            $TipoInventario_id = $RowProducto['tipo'];
            $TipoInventarioCodigo = funcionMaster($TipoInventario_id,'id','tipo','scategoria');

            switch($TipoInventarioCodigo) {
                case '1'://Producto Simple
                    $ArregloLote[$RowProducto['id']]["Nombre"] = $RowProducto['lote'];
                    $ArregloLote[$RowProducto['id']]["id"] = $RowProducto['id'];
                    $Arreglo["Tipo"] = "Simple";
                    $Arreglo["Lista"] = false;

                    $ArregloLote[$RowProducto['id']]["Existencia"] = $RowProducto['existencia'];
                    break;
                case '5'://Lotes
                    $ArregloLote[$RowProducto['id']]["Nombre"] = $RowProducto['lote'];
                    $ArregloLote[$RowProducto['id']]["id"] = $RowProducto['id'];
                    $ArregloLote[$RowProducto['id']]["Vencimiento"] = $RowProducto['fechaVencimiento'];
                    $Arreglo["Tipo"] = "Lotes";
                    $Arreglo["Lista"] = true;

                    $ArregloLote[$RowProducto['id']]["Existencia"] = $RowProducto['existencia'];
                    break;
                
            }
        } 
    }
    

     if($ArregloLote == null){
        $Arreglo["Tipo"] = "Error";
     }
     $Arreglo["Detalles"] = $ArregloLote;
     
     
     echo json_encode($Arreglo);


}


//Este se usuara para la entrada de inventario
if ($_POST["Tipo_Consulta"] == "Cargar Informacion Entrada") {

    $codigoProd = $_POST['codigoProd'];
    $deposito = $_POST['deposito'];

     // obtener precio
     $queryinv = mysqli_query($conn3, "SELECT * FROM  sinvetrios where ID = $codigoProd");
    //  $nrowl = mysqli_num_rows($queryinv);
    if ($queryinv) {
        while ($rowinv = mysqli_fetch_array($queryinv)) {
         $precio = $rowinv['precio'];
         $tipo = $rowinv['tipo'];
        }
    }
     

     //recorre la tabla de los productos y sus departamentos
     $QueryLotes = mysqli_query($conn3, "SELECT * FROM  SinvDep where idSinvetrios = $codigoProd AND idDep = $deposito");
     $NrowSinvDep = mysqli_num_rows($QueryLotes);
    if ($QueryLotes) {
        while ($RowProducto = mysqli_fetch_array($QueryLotes)) {
            $id = $RowProducto['id'];
    
            //$ArregloLote[$RowProducto['id']]["Existencia"] = $RowProducto['existencia'];
            $TipoInventario_id = $RowProducto['tipo'];
            $TipoInventarioCodigo = funcionMaster($TipoInventario_id,'id','tipo','scategoria');
    
            switch($TipoInventarioCodigo) {
                case '1'://Producto Simple
                    $ArregloLote[$RowProducto['id']]["Nombre"] = $RowProducto['lote'];
                    $ArregloLote[$RowProducto['id']]["id"] = $RowProducto['id'];
                    $Arreglo["Tipo"] = "Simple";
                    $Arreglo["Lista"] = false;
    
                    $ArregloLote[$RowProducto['id']]["Existencia"] = $RowProducto['existencia'];
                    break;
                case '5'://Lotes
                    $ArregloLote[$RowProducto['id']]["Nombre"] = $RowProducto['lote'];
                    $ArregloLote[$RowProducto['id']]["id"] = $RowProducto['id'];
                    $ArregloLote[$RowProducto['id']]["Vencimiento"] = $RowProducto['fechaVencimiento'];
                    $Arreglo["Tipo"] = "Lotes";
                    $Arreglo["Lista"] = true;
    
                    $ArregloLote[$RowProducto['id']]["Existencia"] = $RowProducto['existencia'];
                    break;
                
            }
            
    
         }
    }
     

     if($ArregloLote == null){
        $Arreglo["Tipo"] = "Error";
     }
     $Arreglo["Precio"] = $precio;
     $Arreglo["Detalles"] = $ArregloLote;

     
     echo json_encode($Arreglo);


}