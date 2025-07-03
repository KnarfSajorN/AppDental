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





//retroalimentar si se implementa en algun lugar 
//Este aplicara en: POS, sGenerarFactura [factura normal], sGenerarPresupuesto [Presupuesto], Presupuesto Facial, Presupuesto Corporal, OD_GenerarPresupuesto [Odontograma]
if ($_POST["Tipo_Consulta"] == "Consultar Existencias") {

    $codigoProd = $_POST['id'];

     //recorre la tabla de los productos y sus departamentos
     $QueryLotes = mysqli_query($conn3, "SELECT * FROM  SinvDep where idSinvetrios = $codigoProd");
     $NrowSinvDep = mysqli_num_rows($QueryLotes);
     while ($RowProducto = mysqli_fetch_array($QueryLotes)) {
        $id = $RowProducto['id'];

        $ArregloLote[$RowProducto['id']]["Existencia"] = $RowProducto['existencia'];
        $ArregloLote[$RowProducto['id']]["Nombre"] = funcionMaster($codigoProd,'ID','descripcion','sinvetrios');
        $ArregloLote[$RowProducto['id']]["Deposito"] = funcionMaster($RowProducto['idDep'],'id','descripcion','dep');

        $TipoInventario_id = $RowProducto['tipo'];
        $TipoInventarioCodigo = funcionMaster($TipoInventario_id,'id','tipo','scategoria');

        switch($TipoInventarioCodigo) {
            case '1'://Producto Simple
                $ArregloLote[$RowProducto['id']]["Mas_Informacion"] = "";
                break;
            case '5'://Lotes
                $ArregloLote[$RowProducto['id']]["Mas_Informacion"] = "Lote: ".$RowProducto['lote']. " - Fecha Vencimiento: ".$RowProducto['fechaVencimiento'];
                break;
            
        }

     }
     
     echo json_encode($ArregloLote);
}

?>