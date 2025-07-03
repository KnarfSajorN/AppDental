<?php

try {

    session_start();
    require_once '../../plugins/comprimir/comprimirImagen.php';
    require_once '../../funciones/conn3.php';
    require_once '../../funciones/funciones.php';
    date_default_timezone_set('America/Bogota');


    $linkkey = $_SESSION['linkkey'];


    $TableHeader = "OP_Presupuesto";
    $TableDetalle = "OP_PresupuestoDetalle";


    // var_dump($_POST["detalle"]);
    // die();


    $QueryCreateTableH = "CREATE TABLE IF NOT EXISTS $TableHeader (
        id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        cliente_id INT NOT NULL,
        usuario_id  INT NOT NULL,
        fecha_registro DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
        fecha_actualizacion DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        fecha_vencimiento DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
        cantidad_items INT NOT NULL DEFAULT 0,
        total_bruto DECIMAL(10,2) NOT NULL DEFAULT 0.00,
        total_neto DECIMAL(10,2) NOT NULL DEFAULT 0.00,
        monto_pagado DECIMAL(10,2) NOT NULL DEFAULT 0.00,
        nota TEXT NULL DEFAULT '',
        activo INT NOT NULL DEFAULT 1,
        sucursal_id  INT NOT NULL DEFAULT 0,
        ID_principal INT NOT NULL DEFAULT 0
    )";
    
    mysqli_query($conn3, $QueryCreateTableH) or throw new Exception("Error al crear tabla {$TableHeader}");
    
    $QueryCreateTableD = "CREATE TABLE IF NOT EXISTS $TableDetalle (
        id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        presupuesto_id INT NOT NULL DEFAULT 0,
        usuario_id INT NOT NULL DEFAULT 0,
        cliente_id INT NOT NULL DEFAULT 0,
        fecha_registro DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
        fecha_actualizacion DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        fecha_vencimiento DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
        inventario_id INT NOT NULL DEFAULT 0,
        procedimiento_id INT NOT NULL DEFAULT 0,
        pieza_id INT NOT NULL DEFAULT 0,
        cara varchar(15) NULL DEFAULT '',
        cantidad INT NOT NULL DEFAULT 0,
        descripcion TEXT NULL DEFAULT '',
        precio_base DECIMAL(10,2) NOT NULL DEFAULT 0.00,
        impuesto DECIMAL(10,2) NOT NULL DEFAULT 0.00,
        precio_total_base DECIMAL(10,2) NOT NULL DEFAULT 0.00, 
        subTotal DECIMAL(10,2) NOT NULL DEFAULT 0.00,
        sucursal_id INT NOT NULL DEFAULT 0,
        descuento_numerico DECIMAL(10,2) NOT NULL DEFAULT 0.00,
        descuento_textual varchar(15) NULL DEFAULT '',
        impuesto_numerico DECIMAL(10,2) NOT NULL DEFAULT 0.00,
        impuesto_textual varchar(15) NULL DEFAULT '',
        total DECIMAL(10,2) NOT NULL DEFAULT 0.00,
        ID_principal INT NOT NULL DEFAULT 0
    )";
    
    mysqli_query($conn3, $QueryCreateTableD) or throw new Exception("Error al crear tabla {$TableDetalle}");

    
    
    $QueryAddColumnOP = "ALTER TABLE $TableHeader ADD COLUMN IF NOT EXISTS estado_presupuesto INT(1) NULL DEFAULT 0 COMMENT 'Estado del presupuesto 0=Pendiente, 1=Aprobado, 2=No aprobado'";
    mysqli_query($conn3, $QueryAddColumnOP) or throw new Exception("Error al crear columna od_presupuesto_id => " . ( mysqli_error($conn3) ), 1);
    
    if ($_POST["Tipo_Consulta"] == "Guardar_Procedimientos") {
        unset($_POST["Tipo_Consulta"]);
        // var_dump($_POST);
        $detalle = json_decode($_POST["detalle"], true);
        unset($_POST["detalle"]);

        // die();

        $valores = "";
        foreach ($_POST as $key => $value) {
            $valores .= "$key = '$value', ";            
        }

        $valores = substr($valores, 0, strlen($valores) - 2);


        $QueryInsert = "INSERT INTO {$TableHeader} SET $valores ";
        mysqli_query($conn3, $QueryInsert) or throw new Exception("Error al guardar " . mysqli_error($conn3) , 1);
        $presupuestoId = mysqli_insert_id($conn3);

        $camposActualizar = [
            "cantidad_items" => 0,
            "total_bruto" => 0,
            "total_neto" => 0
        ];

        // var_dump($detalle);
        // die();
        
        foreach ($detalle as $detallePieza) {
            $procedimientosPieza = $detallePieza["procedimientos"];
            $pieza = $detallePieza["pieza"];
            $nombre = $detallePieza["nombre"];
            
            
            foreach ($procedimientosPieza as $procedure) {
                
                $cara          = $procedure["cara"];
                $procedimiento = $procedure["procedimiento"];
                $valor         = $procedure["valor"];
                
                if ($cara == "" || $procedimiento == "" || $valor == '') {
                    continue;
                }
                
                $total         = $valor *1;
                $inventario_id = funcionMaster($procedimiento, 'id', 'inventario_id', 'OD_Procedimiento');


                $QueryInsertDetalle = "INSERT INTO {$TableDetalle} SET 
                                        presupuesto_id = '$presupuestoId',
                                        usuario_id = '{$_POST["usuario_id"]}',
                                        cliente_id = '{$_POST["cliente_id"]}',
                                        fecha_vencimiento = '{$_POST["fecha_vencimiento"]}',
                                        inventario_id = '$inventario_id',
                                        procedimiento_id = '$procedimiento',
                                        pieza_id = '$pieza',
                                        cara = '$cara',
                                        cantidad = '1',
                                        descripcion = '$nombre',
                                        precio_base = '$valor',
                                        impuesto = '0',
                                        precio_total_base = '$total',
                                        subTotal = '$total',
                                        sucursal_id = '{$_POST["sucursal_id"]}',
                                        descuento_numerico = '0',
                                        descuento_textual = '0',
                                        impuesto_numerico = '0',
                                        impuesto_textual = '0',
                                        total = '$total',
                                        ID_principal = '{$_POST["ID_principal"]}'";



                mysqli_query($conn3, $QueryInsertDetalle) or throw new Exception("Error al guardar " . mysqli_error($conn3) . $QueryInsertDetalle . json_encode($procedure) , 1);
                

                $camposActualizar["cantidad_items"] += 1;
                $camposActualizar["total_bruto"] += $valor;
                $camposActualizar["total_neto"] += $valor;
            }


        }

        $valores2 = "";
        foreach ($camposActualizar as $key => $value) {
            $valores2 .= "$key = '$value', ";            
        }

        $valores2 = substr($valores2, 0, strlen($valores2) - 2);

        $QueryUpdate = "UPDATE {$TableHeader} SET $valores2 WHERE id = '$presupuestoId' ";
        mysqli_query($conn3, $QueryUpdate) or throw new Exception("Error al guardar " . mysqli_error($conn3) , 1);

        $Response = [
            "error" => null,
            "status" => true,
            "message" => "Presupuesto guardado correctamente",
        ];

        echo json_encode($Response);
        exit();
        
        
    }else if ($_POST["Tipo_Consulta"] == "Consultar") {

        $Query = "SELECT * FROM {$TableHeader} WHERE id = '{$_POST["id"]}' ";
        $Result = mysqli_query($conn3, $Query);
        if (!$Result) {
            $Response = [
                "error" => null,
                "status" => true,
                "message" => "Success",
                "data" => [],
            ];

            echo json_encode($Response);
            exit();
        }

        $Data = mysqli_fetch_assoc($Result);
        $nombre_usuario = funcionMaster($Data["usuario_id"], "ID", "NOMBRE_USUARIO", "usuarios");
        $nombre_cliente = funcionMaster($Data["cliente_id"], "cliente_id", "nombre_cliente", "cliente");
        
        $Data["nombre_usuario"] = $nombre_usuario;
        $Data["nombre_cliente"] = $nombre_cliente;

        $Query2 = "SELECT * FROM {$TableDetalle} WHERE presupuesto_id = '{$_POST["id"]}' ";
        $Result2 = mysqli_query($conn3, $Query2);
        if (!$Result2) {
            $Response = [
                "error" => null,
                "status" => true,
                "message" => "Success",
                "data" => $Data,
            ];

            echo json_encode($Response);
            exit();
        }

        $Data["detalle"] = [];
        foreach ($Result2 as $Row) {
            $Icono = funcionMaster($Row["procedimiento_id"], "id", "Icono", "OD_Procedimiento");
            $SVG = funcionMaster($Icono, 'id', 'SVG', 'OD_Iconos_SVG');
            // $SVG = str_replace('fill="currentColor"', 'fill="' . $Color . '"', $SVG);
            // $SVG = str_replace('"', "|", $SVG);
            // $SVG = str_replace("\r\n", "■", $SVG);
            // $SVG = str_replace("\n", "°", $SVG);

            $Row["procedimientoIcon"] = $SVG;
            $Row["procedimiento"] = funcionMaster($Row["procedimiento_id"], "id", "Nombre", "OD_Procedimiento");
            $Data["detalle"][]  = $Row;
        }

        $Response = [
            "error" => null,
            "status" => true,
            "message" => "Success",
            "data" => $Data,
        ];

        echo json_encode($Response);
        exit();


    }else if ($_POST["Tipo_Consulta"] == "Enviar_Confirmacion") {
        $id = $_POST["id"];
        $usuario_id = funcionMaster($id, "id", "usuario_id", "OP_Presupuesto");
        $cliente_id = funcionMaster($id, "id", "cliente_id", "OP_Presupuesto");
        $nombre_cliente = funcionMaster($cliente_id, "cliente_id", "nombre_cliente", "cliente");
        $whatsapp_cliente = funcionMaster($cliente_id, "cliente_id", "whatsapp", "cliente");

        $QueryConfig = "SELECT * FROM config WHERE ID_Usuario = '$usuario_id' ";
        $ResultConfig = mysqli_query($conn3, $QueryConfig);

        if (!$ResultConfig) {
            $Response = [
                "error" => "No existe configuracion de usuario",
                "status" => false,
                "message" => "Ocurrio un error",
            ];
        
            echo json_encode($Response);
            exit();
        }
        
        $RowsConfig = mysqli_fetch_assoc($ResultConfig);
        $WhatsApp = $RowsConfig["whatsapp"];
        $ElName = $RowsConfig["nombreF"];

        if (strlen($whatsapp_cliente) <= 7) {
            $Response = [
                "error" => "Numero de telefono no válido => " . $whatsapp_cliente,
                "status" => false,
                "message" => "Ocurrio un error",
            ];
        
            echo json_encode($Response);
            exit();
            
        }
        
$idEncrypt = encrypt($id);

        $mensajeW = "Hola! {$nombre_cliente} 👋

Se le ha solicitado firmar el siguiente presupuesto de odontología

{$Base}OP_Autorizar/{$idEncrypt}";
//         $mensajeW = "Hola! {$ElName} 👋

// Se le ha solicitado firmar el siguiente presupuesto de odontología

// {$Base}OP_Autorizar/{$idEncrypt}";
        
        Whatsapp_sent_cliente($linkkey, "34631942913", $mensajeW, 0, $usuario_id, "34631942913", 0);
        Whatsapp_sent_cliente($linkkey, $whatsapp_cliente, $mensajeW, 0, $usuario_id, $whatsapp_cliente, 0);
        // Whatsapp_sent_cliente($linkkey, $WhatsApp, $mensajeW, 0, $usuario_id, $WhatsApp, 0);
        
        $Response = [
            "error" => [$linkkey, $WhatsApp, $mensajeW, 0, $usuario_id, $WhatsApp, 0],
            "status" => true,
            "message" => "Mensaje enviado correctamente",
        ];
    
        echo json_encode($Response);
        exit();



    }else if ($_POST["Tipo_Consulta"] == "Guardar_Firma") {
        $id = $_POST["id"];
        $firma = $_POST["firma"];

        $QueryValidateColumn = "SHOW COLUMNS FROM {$TableHeader} LIKE 'firma'";
        $ResultValidateColumn = mysqli_query($conn3, $QueryValidateColumn);

        if ($ResultValidateColumn && mysqli_num_rows($ResultValidateColumn) === 0) {
            $QueryAddColumn = "ALTER TABLE {$TableHeader} ADD COLUMN firma TEXT NULL";
            if (!mysqli_query($conn3, $QueryAddColumn)) {
                echo json_encode([
                    "error" => mysqli_error($conn3),
                    "status" => false,
                    "message" => "Error al agregar la columna",
                ]);
                exit();
            }
        }

        $QueryValidateColumn = "SHOW COLUMNS FROM {$TableHeader} LIKE 'fecha_firma'";
        $ResultValidateColumn = mysqli_query($conn3, $QueryValidateColumn);

        if ($ResultValidateColumn && mysqli_num_rows($ResultValidateColumn) === 0) {
            $QueryAddColumn = "ALTER TABLE {$TableHeader} ADD COLUMN fecha_firma DATETIME NULL";
            if (!mysqli_query($conn3, $QueryAddColumn)) {
                echo json_encode([
                    "error" => mysqli_error($conn3),
                    "status" => false,
                    "message" => "Error al agregar la columna",
                ]);
                exit();
            }
        }


        $QueryUpdate = "UPDATE {$TableHeader} SET firma = '$firma',estado_presupuesto = '1' ,fecha_firma = NOW() WHERE id = '$id' LIMIT 1";
        $ResultUpdate = mysqli_query($conn3, $QueryUpdate);
        if (!$ResultUpdate) {
            $Response = [
                "error" => mysqli_error($conn3),
                "status" => false,
                "message" => "Error al guardar",
            ];

            echo json_encode($Response);
            exit();
        }

        $Response = [
            "error" => null,
            "status" => true,
            "message" => "Firma guardada con exito",
        ];
        echo json_encode($Response);
        exit();


    }else if ($_POST["Tipo_Consulta"] == "Descartar") {
        $id = $_POST["id"];
        $QueryUpdate = "UPDATE {$TableHeader} SET estado_presupuesto = '2' WHERE id = '$id' LIMIT 1";
        $ResultUpdate = mysqli_query($conn3, $QueryUpdate);
        if (!$ResultUpdate) {
            $Response = [
                "error" => mysqli_error($conn3),
                "status" => false,
                "message" => "Error al guardar",
            ];

            echo json_encode($Response);
            exit();
        }

        $Response = [
            "error" => null,
            "status" => true,
            "message" => "Presupuesto descartado con exito",    
        ];

        echo json_encode($Response);
        exit();

    }
    
    // else{
    //     throw new Exception("Tipo de consulta desconocida", 1);
    // }
    
    mysqli_close($conn3);
    exit();
} catch (\Throwable $th) {
    
    $Response = [
        "error" => "Error: => " . $th->getMessage() . " Linea: => " . $th->getLine(),
        "status" => false,
        "message" => "Ocurrio un error",
    ];

    echo json_encode($Response);
    exit();
}
