<?php
date_default_timezone_set('America/Bogota');
include ("funciones/conn3.php");

$entidad = $_POST['entidad_id'];
$convenio_id = $_POST['convenio_id'];
if ($convenio_id == "") {
    $query = mysqli_query($conn3, "SELECT * FROM Rips_Convenio where entidad_id = '$entidad' AND Activo='1'");
    while ($row = mysqli_fetch_array($query)) {

        echo "<option value='" . $row['id'] . "'>" . $row['Nombre'] . "</option>";
    }
} else {
    $query = mysqli_query($conn3, "SELECT * FROM Rips_Convenio where entidad_id = '$entidad' AND Activo='1'");
    while ($row = mysqli_fetch_array($query)) {
        $convenio_id_r = $row['id'];
        if ($convenio_id == $convenio_id_r) {
            echo "<option value='" . $row['id'] . "' selected>" . $row['Nombre'] . "</option>";
        } else {
            echo "<option value='" . $row['id'] . "'>" . $row['Nombre'] . "</option>";
        }

    }
}

