<?php
function ConsultarDisponbilidadSerialTipoProducto_ProductoSimple($Detalle_id)
{
    include 'funciones/conn3.php';
    $QueryDetalle = mysqli_query($conn3, "SELECT * FROM  sDetalleOperPendites WHERE id = $Detalle_id");
    while ($RowDetalle = mysqli_fetch_array($QueryDetalle)) {
        $idProducto = $RowDetalle['idProducto'];
        $SinvDep_id = $RowDetalle['SinvDep_id'];
        $cantidad = $RowDetalle['cantidad'];
        $Seriales = $RowDetalle['Seriales'];
    }

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



    if ($tipodepartamento == "1" and $maneja_serial == "1") {
        if ($Seriales == "") {
            return '<a onclick="ModalModuloSeriales(' . $Detalle_id . ',' . $SinvDep_id . ',\'' . $caracter_serial . '\',' . $cantidad . ')" class="btn btn-outline-info rounded-pill shadow m-1 FaltaLlenarSerial"><i class="fa-solid fa-barcode fa-fade"></i>   </a>';
        } else {
            return '<a onclick="ModalModuloHistorialExistencias(' . $Detalle_id . ',\'' . $caracter_serial . '\')" class="btn btn-outline-warning rounded-pill shadow m-1"><i class="fa fa-list"></i></a>';
        }
    } else {
        return "";
    }
    
}
?>