<?php

try {
    require_once "../funciones/conn3.php";
    require_once "../funciones/funciones.php";

    $Tabla                   = "OBO_Historia";
    $TablaAuxiliarPendientes = 'OD_OdontogramaMaster_Pendientes';
    $TablaAuxiliarFin        = 'OD_OdontogramaMaster_Fin';
    
    $cliente_id              = $_POST["cliente_id"];
    $usuario_id              = $_POST["usuario_id"];
    
    unset($_POST["fecha"]);
    // echo "<pre>";
    // var_dump(json_encode($_POST));
    // echo "</pre>";
    // die();

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
        throw new Exception("Error al crear la tabla: " . $QueryCreateTable . mysqli_error($conn3));
    }
    
    
    $QueryInsert = "INSERT INTO {$Tabla} SET {$Values}";
    $result = mysqli_query($conn3, $QueryInsert);
    if (!$result) {
        throw new Exception("Error al guardar: " . $QueryInsert . mysqli_error($conn3));
    }

    $id = mysqli_insert_id($conn3);
    
    $ArrayCamposOdonto = ["d18","d17","d16","d15","d14","d13","d12","d11","d21","d22","d23","d24","d25","d26","d27","d28","d55","d54","d53","d52","d51","d61","d62","d63","d64","d65","d48","d47","d46","d45","d44","d43","d42","d41","d31","d32","d33","d34","d35","d36","d37","d38","d85","d84","d83","d82","d81","d71","d72","d73","d74","d75","r18","r17","r16","r15","r14","r13","r12","r11","r21","r22","r23","r24","r25","r26","r27","r28","r55","r54","r53","r52","r51","r61","r62","r63","r64","r65","r48","r47","r46","r45","r44","r43","r42","r41","r31","r32","r33","r34","r35","r36","r37","r38","r85","r84","r83","r82","r81","r71","r72","r73","r74","r75"];
    $CamposOdonto = "";
    foreach ($ArrayCamposOdonto as $Field) {
        $CamposOdonto .= $Field . " TEXT NULL DEFAULT  '[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]', ";
    }

    // $CamposOdonto = rtrim($CamposOdonto, ', ');

    $QueryCreateTable = "CREATE TABLE IF NOT EXISTS `{$TablaAuxiliarFin}` (
                            `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
                            `Fecha` date DEFAULT NULL,
                            `Hora` time NOT NULL,
                            `cliente_id` int(11) DEFAULT NULL,
                            `usuario_id` int(11) DEFAULT NULL, 
                            `historia_bo_id` int(11) DEFAULT '0' COMMENT 'Id de referencia a la tabla {$Tabla}', 
                            {$CamposOdonto}
                            `Activo` INT(1) DEFAULT '1'
                        )";
    
    mysqli_query($conn3, $QueryCreateTable) or throw new Exception($QueryCreateTable. " Error al guardar => " . mysqli_error($conn3));

    $QueryUpdateTable = "ALTER TABLE {$TablaAuxiliarPendientes} 
                        ADD COLUMN IF NOT EXISTS activo INT(1) DEFAULT '1' COMMENT '1-> Activo | 0-> Inactivo'";
    mysqli_query($conn3, $QueryUpdateTable) or throw new Exception($QueryUpdateTable. " Error al actualizar campos => " . mysqli_error($conn3));

    $QueryOdontograma = "SELECT * FROM {$TablaAuxiliarPendientes} WHERE cliente_id = '{$cliente_id}' AND usuario_id = '$usuario_id' AND activo = '1'";
    $ResultOdontograma = mysqli_query($conn3, $QueryOdontograma) or throw new Exception($QueryOdontograma. " Error al guardar => " . mysqli_error($conn3));
    foreach ($ResultOdontograma as $RowOdontograma) {
        //select * from erpdental_dev_baseDental.OD_OdontogramaMasterDetalle_Pendientes;
        $RowOdontograma["historia_bo_id"] = $id;
        $idPendiente = $RowOdontograma["id"];

        unset($RowOdontograma["activo"]);
        unset($RowOdontograma["id"]);

        $CamposValues =  "";
        foreach ($RowOdontograma as $key => $value) {
            $CamposValues .= $key . " = '" . $value . "', ";
        }

        $CamposValues = rtrim($CamposValues, ', ');

        $QueryInsertDet = "INSERT INTO {$TablaAuxiliarFin} SET {$CamposValues}";
        mysqli_query($conn3, $QueryInsertDet) or throw new Exception($QueryInsertDet. " Error al guardar => " . mysqli_error($conn3));

        $QueryUpdate = "UPDATE {$TablaAuxiliarPendientes} SET activo = '0' WHERE id = '{$idPendiente}'";
        mysqli_query($conn3, $QueryUpdate) or throw new Exception($QueryUpdate. " Error al guardar => " . mysqli_error($conn3));


        
        
    }
    
    $QueryUpdateLastProcedures = "UPDATE OD_OdontogramaMasterDetalle_Pendientes SET Activo = 0 WHERE cliente_id = '{$cliente_id}' AND usuario_id = '{$usuario_id}' AND Activo = 1 ";
    mysqli_query($conn3, $QueryUpdateLastProcedures) or throw new Exception($QueryUpdate. " Error al guardar => " . mysqli_error($conn3));

    $rutaGo = $Base . "OBO_Finalizado?id=" . encrypt($id);
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