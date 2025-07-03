<?php 
    include 'funciones/conn3.php';
    $opciones = "<option value=''> Seleccione </option>";
    $queryCIE10 = mysqli_query($conn3, "SELECT * FROM cie11");
    foreach ($queryCIE10 as $tablaCIE10) {
        $codigo = $tablaCIE10['codigo'];
        $descripcion = $tablaCIE10['descripcion'];

        $opciones .= "<option> {$codigo} - {$descripcion} </option>";

    }
    echo $opciones;


?>