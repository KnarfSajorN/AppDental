<?php
date_default_timezone_set('America/Bogota');
include 'funciones/conn3.php';

if(isset($_GET["idCitas"]) AND $_GET["Tipo"]=="Confirmar"){

    $idCitas = $_GET['idCitas'];
    mysqli_query($conn3, "UPDATE citas SET estado = 2  WHERE idCitas = $idCitas");
    echo "<script language='Javascript'> history.back();</script>";
} 
elseif (isset($_GET["idCitas"]) and $_GET["Tipo"] == "Asistio") {
    $idCitas = $_GET['idCitas'];
    mysqli_query($conn3, "UPDATE citas SET estado = 3  WHERE idCitas = $idCitas");
    echo "<script language='Javascript'> history.back();</script>";
}
?>