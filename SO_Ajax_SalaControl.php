<?php

include 'funciones/conn3.php';

if($_POST["Tipo_Consulta"]=="Actualizar Empresa y Tipo Examen"){

    $Campo1 = mysqli_query($conn3, "show COLUMNS from cliente WHERE Field = 'tiposExamen';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `cliente` ADD `tiposExamen` TEXT NULL  COMMENT ' tipos de examen para la historia de salud ocupacional *Creado desde modulo de Sala de Control*'");
    }


    $Campo1 = mysqli_query($conn3, "show COLUMNS from cliente WHERE Field = 'idEmpresa';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `cliente` ADD `idEmpresa` int(11) NULL DEFAULT '0' COMMENT 'id de la empresa afiliada *Creado desde modulo de Sala de Control*'");
    }


    $Empresa_id = $_POST["Empresa_id"];
    $Tipo_Examen = $_POST["Tipo_Examen"];
    $cliente_id = $_POST["cliente_id"];

    if (!empty($Tipo_Examen)) {
        // Convertir el arreglo en un solo texto separado por "||"
        $TiposExamenes = implode(' || ', $Tipo_Examen);

        //echo $TiposExamenes;
        $query = mysqli_query($conn3, "UPDATE cliente SET idEmpresa = '{$Empresa_id}', tiposExamen = '{$TiposExamenes}'  WHERE cliente_id = {$cliente_id}");

        if ($query) {
            if (mysqli_affected_rows($conn3) > 0) {
                $Arreglo["Respuesta"]= 1; // Update exitoso
            } else {
                $Arreglo["Respuesta"]= 2; // No se encontraron filas para actualizar
            }
        } else {
            $Arreglo["Respuesta"]= 3; // Error en la consulta UPDATE
        }

        echo json_encode($Arreglo);

    }


    
}
?>