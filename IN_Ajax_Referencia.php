<?php
include 'funciones/conn3.php';
$Referencia = $_POST['Referencia'];
$idProducto = $_POST['idProducto'];
if($Referencia!=""){

    $QueryCliente = mysqli_query($conn3, "SELECT * FROM sinvetrios where referencia = '{$Referencia}'");
    while ($rowCliente = mysqli_fetch_array($QueryCliente)) {
        $descripcion = $rowCliente['descripcion'];
        $ID = $rowCliente['ID'];

        if($idProducto!=$ID){
            $texto.= "<span><label for='CODI_CLIENTE' style='color:red'>La Referencia {$Referencia} Se encuentra registrada con el producto {$descripcion}</label></span><br>";
        }
        
        
    }
    echo $texto;
}
?>
