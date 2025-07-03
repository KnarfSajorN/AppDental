<?php
session_start();

try {
    require_once "../funciones/conn3.php";
    require_once "../funciones/funciones.php";

    $Tabla = "OBT_Seguimiento";
    $TablaAuxiliar = "OBT_SeguimientoDetalle";
    $linkkey = $_SESSION["linkkey"];

    $detalle = json_decode($_POST["datos_detalle"], true);
    unset($_POST["datos_detalle"]);
    unset($_POST["detalle"]);

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

    foreach ($detalle as $detalleIndividual) {
        $FieldsTableDetalle = "";
        $ValuesDetalle = "";
        $detalleIndividual["usuario_id"]     = $_POST["usuario_id"];
        $detalleIndividual["ID_principal"]   = $_POST["ID_principal"];
        $detalleIndividual["cliente_id"]     = $_POST["cliente_id"];
        $detalleIndividual["historia_id"]    = $_POST["historia_id"];
        $detalleIndividual["seguimiento_id"] = $id;

        foreach ($detalleIndividual as $key1 => $value1) {
            $FieldsTableDetalle .= $key1 . " TEXT NULL DEFAULT '', ";
            $ValuesDetalle .= "{$key1} = '$value1', ";
        }
        
        $FieldsTableDetalle = rtrim($FieldsTableDetalle, ', ');
        $ValuesDetalle      = rtrim($ValuesDetalle, ', ');

        $QueryCreateTable2 = "CREATE TABLE IF NOT EXISTS {$TablaAuxiliar} (
            id INT(11) PRIMARY KEY AUTO_INCREMENT,
            fecha_registro DATETIME DEFAULT CURRENT_TIMESTAMP,
            fecha_actualizacion DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            {$FieldsTableDetalle}
        )";

        $resultDetalle = mysqli_query($conn3, $QueryCreateTable2);
        if (!$resultDetalle) {
            throw new Exception("Error al crear la tabla: " . mysqli_error($conn3));
        }

        $QueryInsertDetalle = "INSERT INTO {$TablaAuxiliar} SET {$ValuesDetalle}";
        $resultDetalle2 = mysqli_query($conn3, $QueryInsertDetalle);
        if (!$resultDetalle2) {
            throw new Exception("Error al guardar: " . mysqli_error($conn3));
        }

    }


    $cliente_id = $_POST["cliente_id"];
    $QueryCliente = "SELECT nombre_cliente, whatsapp FROM cliente WHERE cliente_id = '$cliente_id' ";
    $ResultCliente = mysqli_query($conn3, $QueryCliente);
    $DatosCliente = mysqli_fetch_assoc($ResultCliente);

    if ($DatosCliente["nombre_cliente"] <> "") {
        $urlSeguimiento = $Base . "OBT_FirmarSeguimiento/".encrypt($id);
        $mensajeW = "👋 Hola *" . $DatosCliente["nombre_cliente"] . "* 

Se te ha solicitado firmar un seguimiento. Puedes acceder a el a traves de la siguiente url 
" . $urlSeguimiento;
        

    Whatsapp_sent_cliente($linkkey, $DatosCliente["whatsapp"], $mensajeW, $cliente_id, $_POST["usuario_id"], $DatosCliente["whatsapp"], 0);


    }




    $rutaGo = $Base . "OBT_FinalizadoSeguimiento?id=" . encrypt($id);
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