<?php

include 'funciones/conn3.php';



$cliente_id = $_POST['cliente_id'];
$usuario_id = $_POST['usuario_id'];

$ArregloDetalles= $_POST['ProductoPaquete'];

foreach ($ArregloDetalles as $key => $value) {
    
    $queryDetalle = mysqli_query($conn3, "SELECT * FROM  sDetalleOper where id = $key");
    while ($rowDetalle = mysqli_fetch_array($queryDetalle)) {
        $idOperacion = $rowDetalle['idOperacion'];
    }

    /*
    $consulta = mysqli_query($conn3, "INSERT INTO HFC_ProductosPaquetesHistorias 
    (idOperacion, detalle_id, Estado, historia_id, cliente_id, usuario_id) 
    VALUES                     
    ('$idOperacion', '$key', '1', '0', '$cliente_id', '$usuario_id');");
    */

    $consulta = mysqli_query($conn3, "UPDATE HFC_ProductosPaquetesHistorias 
    SET Estado = '1'
    WHERE idOperacion = '$idOperacion' 
    AND detalle_id = '$key' 
    AND cliente_id = '$cliente_id' 
    AND usuario_id = '$usuario_id'");


    if ($consulta) {
        // La actualización fue exitosa, entra al if
        $numero_filas_afectadas = mysqli_affected_rows($conn3);
        if ($numero_filas_afectadas > 0) {
            // Al menos una fila se actualizó, agrega $key al arreglo de respuesta
            $ArregloRespuesta[] = $key;
        }
    } else {

    }

    
}

echo json_encode($ArregloRespuesta,true);
?>