<?php

try {

    require_once __DIR__ . "/../funciones/conn3.php";
    require_once __DIR__ . "/../funciones/funciones.php";

    $Tabla = 'OBT_Seguimiento';

    switch ($_POST["Tipo_Consulta"]) {
        case 'Guardar_Firma':

            $id    = $_POST["id"];
            $firma = $_POST["firma"];

            $QueryUpdate = "UPDATE {$Tabla} SET firma = '$firma' WHERE id = '$id' LIMIT 1";
            if (!mysqli_query($conn3, $QueryUpdate)) {
                throw new Exception("Error al guardar " . mysqli_error($conn3), 1);
            }

            $Response = [
                "error" => null,
                "status" => true,
                "message" => "Firma registrada correctamente",
            ];
        
            echo json_encode($Response);
            exit();

            break;

        default:
            throw new Exception("Tipo de consulta no parametrizado " . mysqli_error($conn3), 1);
            break;
    }
} catch (\Throwable $th) {

    $Response = [
        "error" => "Error: => " . $th->getMessage() . " Linea: => " . $th->getLine(),
        "status" => false,
        "message" => "Ocurrio un error",
    ];

    echo json_encode($Response);
    exit();
}
