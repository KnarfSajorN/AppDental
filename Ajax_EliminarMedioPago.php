<?php

include 'funciones/conn3.php';

if($_POST["Tipo_Consulta"]=="Eliminar Medio Pago"){

    $id = $_POST["id"];
    $query = mysqli_query($conn3, "UPDATE sDetalleMetodosPagos SET Activo = '0'  WHERE id = {$id}");

}

?>