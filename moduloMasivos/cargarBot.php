<?php
// include '../funciones/conn3.php';
// include '../funciones/funciones.php';
// cargar todos los contactos de la tabla ws_contactos
// saber si tiene WhatsApp personalizado
// aquí hacemos una trampa
include 'buscarWhatsapp.php';
if ($tieneWhatsApp == true) {
    // se consulta 
    $denysPuerto = $link[$miSistema[1]][0]; // puerto de denysbot ej: 8080
    $denysServer = $link[$miSistema[1]][1]; // ip servidor ej: 205.209.96.94

    // conexion a denysbot
    // conexion denys nueva 16 10 2023
    $connDenys = mysqli_connect("205.209.96.94:3306", "denysbot", "BNe4nxQZDwHK8vi", "denysbot_sistema") or die('error conexion denys');

    $queryConsultaDenys = "SELECT * from denysbot_sistema.usuarios where id_denys = '{$denysPuerto}' limit 1";
    // // var_dump($queryConsultaDenys);
    $resultConsultaDenys = mysqli_query($connDenys, $queryConsultaDenys);
    $rowConsultaDenys = mysqli_fetch_assoc($resultConsultaDenys);
    // // var_dump($rowConsultaDenys);
    // si hay resultados armamos la conexión al cliente
    if (mysqli_num_rows($resultConsultaDenys) > 0) {
        // $connDenysCliente = mysqli_connect('localhost', 'denysbot', 'Nuebaklbdni', 'denysbot_' . $rowConsultaDenys['id'], '3306');
        $connDenysCliente = mysqli_connect("205.209.96.94:3306", "denysbot", "BNe4nxQZDwHK8vi", 'denysbot_' . $rowConsultaDenys['id']);
    }
}

// ---------------------------
// datos del bot nuevo
// ---------------------------
$data = $_POST['data'];
$iB = $_POST['iB'];
$json = json_decode($data);
$jsonSave = base64_encode($data);
// ---------------------------

// var_dump($json);


if ($_POST['data'] <> null) {
    // ---------------------------
    // tablas a verificar
    // ---------------------------
    $tablaBotHeader = 'chat_menu_header';
    $tablaBotBody = 'chat_menu';

    // verificar si existen las tablas
    $verificarTablas = mysqli_query($connDenysCliente, "SHOW TABLES LIKE '{$tablaBotHeader}'");
    if (mysqli_num_rows($verificarTablas) == 0) {
        $queryCreateTable = "CREATE TABLE {$tablaBotHeader}(
            id INT(11) NOT NULL AUTO_INCREMENT,
            fecha timestamp NULL DEFAULT current_timestamp(),
            estado int(11) DEFAULT 1,
            json longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
            PRIMARY KEY (id)
        );            
        ";
        $resultCreateTable = mysqli_query($connDenysCliente, $queryCreateTable);
    }
    $verificarTablas = mysqli_query($connDenysCliente, "SHOW TABLES LIKE '{$tablaBotBody}'");
    if (mysqli_num_rows($verificarTablas) == 0) {
        $queryCreateTable = "CREATE TABLE {$tablaBotBody} (
            id int(11) NOT NULL AUTO_INCREMENT,
            fecha timestamp NULL DEFAULT current_timestamp(),
            estado int(11) DEFAULT 1,
            codigoPrincipal int(11) DEFAULT 0,
            codigo text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
            refCodigo int(11) DEFAULT NULL,
            titulo text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
            mensaje longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
            tipo text COLLATE utf8mb4_unicode_ci DEFAULT 0,
            hashtag text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
            nodeId int(11) DEFAULT NULL,
            nodeName text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
            nodeInputs text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
            nodeOutputs text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
            nodePregunta text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
            nodeIdHeader int(11) DEFAULT NULL,
            nodeForm text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
            nodeFormName text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
            PRIMARY KEY (id)
          );";
        $resultCreateTable = mysqli_query($connDenysCliente, $queryCreateTable);
    } else {
        // verificar que la columna nodeId exista
        $verificarColumna = mysqli_query($connDenysCliente, "SHOW COLUMNS FROM {$tablaBotBody} LIKE 'nodeId'");
        if (mysqli_num_rows($verificarColumna) == 0) {
            $queryAddColumna = "ALTER TABLE {$tablaBotBody} ADD nodeId int(11) DEFAULT NULL";
            $resultAddColumna = mysqli_query($connDenysCliente, $queryAddColumna);
        }
        $verificarColumna = mysqli_query($connDenysCliente, "SHOW COLUMNS FROM {$tablaBotBody} LIKE 'nodeName'");
        if (mysqli_num_rows($verificarColumna) == 0) {
            $queryAddColumna = "ALTER TABLE {$tablaBotBody} ADD nodeName text COLLATE utf8mb4_unicode_ci DEFAULT NULL";
            $resultAddColumna = mysqli_query($connDenysCliente, $queryAddColumna);
        }
        $verificarColumna = mysqli_query($connDenysCliente, "SHOW COLUMNS FROM {$tablaBotBody} LIKE 'nodeInputs'");
        if (mysqli_num_rows($verificarColumna) == 0) {
            $queryAddColumna = "ALTER TABLE {$tablaBotBody} ADD nodeInputs text COLLATE utf8mb4_unicode_ci DEFAULT NULL";
            $resultAddColumna = mysqli_query($connDenysCliente, $queryAddColumna);
        }
        $verificarColumna = mysqli_query($connDenysCliente, "SHOW COLUMNS FROM {$tablaBotBody} LIKE 'nodeOutputs'");
        if (mysqli_num_rows($verificarColumna) == 0) {
            $queryAddColumna = "ALTER TABLE {$tablaBotBody} ADD nodeOutputs text COLLATE utf8mb4_unicode_ci DEFAULT NULL";
            $resultAddColumna = mysqli_query($connDenysCliente, $queryAddColumna);
        }
        $verificarColumna = mysqli_query($connDenysCliente, "SHOW COLUMNS FROM {$tablaBotBody} LIKE 'nodePregunta'");
        if (mysqli_num_rows($verificarColumna) == 0) {
            $queryAddColumna = "ALTER TABLE {$tablaBotBody} ADD nodePregunta text COLLATE utf8mb4_unicode_ci DEFAULT NULL";
            $resultAddColumna = mysqli_query($connDenysCliente, $queryAddColumna);
        }
        $verificarColumna = mysqli_query($connDenysCliente, "SHOW COLUMNS FROM {$tablaBotBody} LIKE 'nodeIdHeader'");
        if (mysqli_num_rows($verificarColumna) == 0) {
            $queryAddColumna = "ALTER TABLE {$tablaBotBody} ADD nodeIdHeader int(11) DEFAULT NULL";
            $resultAddColumna = mysqli_query($connDenysCliente, $queryAddColumna);
        }
        $verificarColumna = mysqli_query($connDenysCliente, "SHOW COLUMNS FROM {$tablaBotBody} LIKE 'nodeForm'");
        if (mysqli_num_rows($verificarColumna) == 0) {
            $queryAddColumna = "ALTER TABLE {$tablaBotBody} ADD nodeForm text COLLATE utf8mb4_unicode_ci DEFAULT NULL";
            $resultAddColumna = mysqli_query($connDenysCliente, $queryAddColumna);
        }
        $verificarColumna = mysqli_query($connDenysCliente, "SHOW COLUMNS FROM {$tablaBotBody} LIKE 'nodeFormName'");
        if (mysqli_num_rows($verificarColumna) == 0) {
            $queryAddColumna = "ALTER TABLE {$tablaBotBody} ADD nodeFormName text COLLATE utf8mb4_unicode_ci DEFAULT NULL";
            $resultAddColumna = mysqli_query($connDenysCliente, $queryAddColumna);
        }
    }
    // ---------------------------

    // ---------------------------
    // actualizar todos los bots anteriores a estado 0 y crear uno nuevo
    // ---------------------------
    $queryUpdateBots = "UPDATE {$tablaBotHeader} SET estado = 0";
    $resultUpdateBots = mysqli_query($connDenysCliente, $queryUpdateBots);

    if ($iB == 0) {
        // se inserta uno nuevo
        $queryInsertBot = "INSERT INTO {$tablaBotHeader} (estado, json) VALUES (1, '$jsonSave')";
        $resultInsertBot = mysqli_query($connDenysCliente, $queryInsertBot);
        $nodeIdHeader = mysqli_insert_id($connDenysCliente);
    } else {
        // se actualiza el existente
        // se inserta uno nuevo
        $queryInsertBot = "UPDATE {$tablaBotHeader} SET estado = 1, json = '$jsonSave' WHERE id = {$iB}";
        $resultInsertBot = mysqli_query($connDenysCliente, $queryInsertBot);
        $nodeIdHeader = $iB;

        $queryUpdateBots = "UPDATE {$tablaBotBody} SET estado = 0 where nodeId = {$nodeIdHeader}";
        $resultUpdateBots = mysqli_query($connDenysCliente, $queryUpdateBots);
    }

    // se actualizan todos los bots que no tengan nodeIdHeader con el nuevo
    $queryUpdateBots = "UPDATE {$tablaBotBody} SET estado = 0 where nodeId <> {$nodeIdHeader}";
    $resultUpdateBots = mysqli_query($connDenysCliente, $queryUpdateBots);
    // ---------------------------


    foreach ($json->drawflow->Home->data as $key => $value) {
        // Inicializar variables
        $estado = '';
        $codigoPrincipal = '';
        $codigo = '';
        $refCodigo = '';
        $titulo = '';
        $mensaje = '';
        $tipo = '';
        $hashtag = '';
        $nodeId = '';
        $nodeName = '';
        $nodeInputs = '';
        $nodeOutputs = '';
        $pregunta = '';
        $nodeForm = '';
        $nodeFormName = '';
    
        $nodeId = $value->id;
        $nodeName = $value->name;
    
        foreach ($value->data as $keyData => $valueData) {
            // Procesar los datos del nodo
            if (is_object($valueData)) {
                $valueData = json_decode(json_encode($valueData), true);
                foreach ($valueData as $data) {
                    switch ($keyData) {
                        case 'pregunta':
                            $pregunta .= ($data <> '' ? $data . '|/|' : '');
                            break;
                    }
                }
                $pregunta = substr($pregunta, 0, -3);
            }
            switch ($keyData) {
                case 'estado':
                    $estado = $valueData;
                    break;
                case 'codigoPrincipal':
                    $codigoPrincipal = $valueData;
                    break;
                case 'codigo':
                    $codigo = $valueData;
                    break;
                case 'refCodigo':
                    $refCodigo = $valueData;
                    break;
                case 'titulo':
                    $titulo = $valueData;
                    break;
                case 'mensaje':
                    $mensaje = $valueData;
                    break;
                case 'tipo':
                    $tipo = $valueData;
                    break;
                case 'hashtag':
                    $hashtag = $valueData;
                    break;
                case 'nodeform':
                    $nodeForm = $valueData;
                    break;
                case 'nodeFormName':
                    $nodeFormName = $valueData;
                    break;
            }
        }
    
        foreach ($value->inputs->input_1->connections as $connection) {
            $nodeInputs .= $connection->node . "|" . $connection->input . "|/|";
        }
        $nodeInputs = rtrim($nodeInputs, "|/|");
    
        foreach ($value->outputs->output_1->connections as $connection) {
            $nodeOutputs .= $connection->node . "|" . $connection->output . "|/|";
        }
        $nodeOutputs = rtrim($nodeOutputs, "|/|");
    
        // Query preparada para la inserción
        $queryInsertNode = "INSERT INTO {$tablaBotBody} 
                            (estado, codigoPrincipal, refCodigo, codigo, tipo, hashtag, titulo, mensaje, nodeId, nodeName, nodeInputs, nodeOutputs, nodePregunta, nodeIdHeader, nodeForm, nodeFormName) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";                           
    
        $stmt = mysqli_prepare($connDenysCliente, $queryInsertNode);
        mysqli_stmt_bind_param($stmt, "ssssssssssssssss", $estado, $codigoPrincipal, $refCodigo, $codigo, $tipo, $hashtag, $titulo, $mensaje, $nodeId, $nodeName, $nodeInputs, $nodeOutputs, $pregunta, $nodeIdHeader, $nodeForm, $nodeFormName);
        mysqli_stmt_execute($stmt);
        
                            // var_dump($stmt);
                            
    
        // Verificar y crear la tabla del formulario si es necesario
        if ($pregunta <> '' && $nodeFormName <> '') {
            $verificarTablas = mysqli_query($connDenysCliente, "SHOW TABLES LIKE '{$nodeFormName}'");
            if (mysqli_num_rows($verificarTablas) == 0) {
                $queryCreateTable = "CREATE TABLE {$nodeFormName} (
                                        id INT(11) NOT NULL AUTO_INCREMENT,
                                        fecha TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(),
                                        whatsapp TEXT NULL DEFAULT NULL,
                                        PRIMARY KEY (id)
                                    )";
                $resultCreateTable = mysqli_query($connDenysCliente, $queryCreateTable);
            }
    
            // Verificar y crear campos de tabla si es necesario
            $preguntas = explode('|/|', $pregunta);
            foreach ($preguntas as $index => $preg) {
                $verificarCampos = mysqli_query($connDenysCliente, "SHOW COLUMNS FROM {$nodeFormName} LIKE 'pre_" . ($index + 1) . "'");
                if (mysqli_num_rows($verificarCampos) == 0) {
                    $queryCreateField = "ALTER TABLE {$nodeFormName} ADD pre_" . ($index + 1) . " TEXT COLLATE utf8mb4_unicode_ci DEFAULT NULL";
                    $resultCreateField = mysqli_query($connDenysCliente, $queryCreateField);
                }
            }
        }
    }
    
}

echo '
<script>
    window.location.href="../masivoWAMensajes";
</script>
';
