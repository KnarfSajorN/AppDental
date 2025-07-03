<?php

try {
    require_once "../funciones/conn3.php";
    require_once "../funciones/funciones.php";

    $Tabla = "OB_Historia";

    
    // Verifica si la función reem_array existe antes de usarla
    if (function_exists('reem_array')) {
        $_POST = reem_array($_POST);
        $dataCkecks = reem_array(json_decode($_POST["data_checks"], true));
        unset($_POST["data_checks"]);
        foreach ($dataCkecks as $key => $value) {
            $_POST[$key] = $value;
        }
    }

    // Generar campos adicionales para la tabla
    $FieldsTable = "";
    $Values = "";
    foreach ($_POST as $key => $value) {
        $FieldsTable .= $key . " TEXT NULL DEFAULT '', ";
        $Values .= "{$key} = '$value', ";
    }

    $FieldsTable = rtrim($FieldsTable, ', ');
    $Values      = rtrim($Values, ', ');

    // Crear la tabla si no existe
    $QueryCreateTable = "CREATE TABLE IF NOT EXISTS {$Tabla} (
        id INT(11) PRIMARY KEY AUTO_INCREMENT,
        fecha_registro DATETIME DEFAULT CURRENT_TIMESTAMP,
        fecha_actualizacion DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        {$FieldsTable}
    )";

    // echo $QueryCreateTable;

    $result = mysqli_query($conn3, $QueryCreateTable);
    if (!$result) {
        throw new Exception("Error al crear la tabla: " . mysqli_error($conn3));
    }
    
    
    $QueryInsert = "INSERT INTO {$Tabla} SET {$Values}";
    $result = mysqli_query($conn3, $QueryInsert);
    if (!$result) {
        throw new Exception("Error al guardar: " . mysqli_error($conn3));
    }

    $id = mysqli_insert_id($conn3);

    $rutaGo = $Base . "OB_Finalizado?id=" . encrypt($id);
    echo "<script>window.location.href='{$rutaGo}'</script>";

    // Ejecutar la consulta para crear la tabla

} catch (\Throwable $th) {
    echo "<pre>";
    var_dump($_POST);
    echo "</pre>";

    // Registrar el error en lugar de mostrarlo directamente
    error_log("Error en el script: " . $th->getMessage());
    echo "Ocurrió un error. ". $th->getMessage() ."Por favor, inténtalo de nuevo más tarde.";
}