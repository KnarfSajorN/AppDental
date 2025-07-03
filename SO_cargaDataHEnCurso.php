<?php
if (isset($_POST['key'])) {
    include 'config.php';
    include 'funciones/conn3.php';
    $idCliente = $_POST['idCliente'];
    if ($_POST['key'] == "cargaDataHEnCurso") {
        
        $newArray = array(); //array que contendra los datos
        $proceso = $_POST['proceso']; //proceso que se va a ejecutar
        $queryCliente = mysqli_query($conn3, "SELECT * FROM cliente WHERE cliente_id = {$idCliente}") or die("<pre>" . var_dump(mysqli_error_list($conn3)) . "</pre>");
        $nrow = mysqli_num_rows($queryCliente); //numero de filas
        if ($nrow > 0) { //si el numero de filas es mayor a 0

            $queryCliente = $queryCliente->fetch_assoc(); //se asigna el resultado de la consulta a una variable
            $arrayPosicionHistoria = ["Salud Ocupacional", "Visiometría", "Audiometría", "Espirometría", "Optometría", "Electrocardiograma", "Psicofísico", "Psicométrico", "Radiografía"]; //array que contendra los nombres de la historia y sus paraclinicos
            $queryHistoriasSalaControl = mysqli_query($conn3, "SELECT * FROM salaControl WHERE idCliente = {$idCliente} AND proceso = {$proceso} ORDER BY id DESC") or die("<pre>" . var_dump(mysqli_error_list($conn3)) . "</pre>");
            $queryComprobarExistente = mysqli_num_rows($queryHistoriasSalaControl); //numero de filas
            if ($queryComprobarExistente > 0) { //si el numero de filas es mayor a 0

                while ($rowObjectSalaControl = mysqli_fetch_array($queryHistoriasSalaControl)) { //se recorre el array de la consulta sala control

                    $arrayProcesos = []; //array que contendra los nombres de los procesos
                    $unLock = true; //variable que indica si el proceso ya esta bloqueado
                    array_push($arrayProcesos, ['controlProcess' => $rowObjectSalaControl['proceso']]); //se agrega el proceso al array
                    $queryHistorias = mysqli_query($conn3, "SELECT * FROM historicoControl WHERE idControl = {$rowObjectSalaControl['id']} AND estado = 1") or die("<pre>" . var_dump(mysqli_error_list($conn3)) . "</pre>");
                    $newArrayHistorias = []; //array que contendra los datos de las historias
                    while ($rowObject = mysqli_fetch_array($queryHistorias)) { //se recorre el array del historial de control

                        if (is_numeric($rowObject['idHistoria'])) { //si el id de la historia es numerico

                            $queryListDoctor = mysqli_query($conn3, "SELECT * FROM historiaclinica6_labora where ID = {$rowObject['idHistoria']}") or die("<pre>" . var_dump(mysqli_error_list($conn3)) . "</pre>");
                            $nrowlDoctor = mysqli_num_rows($queryListDoctor);
                            if ($nrowlDoctor > 0) {

                                $arrayHistoria = $queryListDoctor->fetch_array(); //se asigna el resultado de la consulta a una variable
                                $idDoctor = $arrayHistoria['usuario_id']; //id del doctor
                                $queryList = mysqli_query($conn3, "SELECT * FROM firmas where historia_id = {$rowObject['idHistoria']} AND historia_nombre = 6 AND cliente_id = {$idDoctor};") or die("<pre>" . var_dump(mysqli_error_list($conn3)) . "</pre>");
                                $nrowlFirma = mysqli_num_rows($queryList); //numero de filas
                                if ($unLock == true) { //si el proceso ya esta bloqueado

                                    $certificado = 0; //variable que contendra el certificado
                                    $proceso = ""; //variable que contendra el nombre del proceso
                                    if ($arrayHistoria['certificado'] != 0) { //si el certificado es diferente de 0
                                        $queryCertificado = mysqli_query($conn3, "SELECT * FROM conceptolaboral where id = {$arrayHistoria['certificado']}") or die("<pre>" . var_dump(mysqli_error_list($conn3)) . "</pre>");
                                        $nrowlCertificado = mysqli_num_rows($queryCertificado); //numero de filas
                                        if ($nrowlCertificado > 0) { //si el numero de filas es mayor a 0
                                            $certificado = $arrayHistoria['certificado']; //se asigna el id del certificado
                                            $proceso = $queryCertificado->fetch_array()['proceso']; //se asigna el numero del proceso
                                        }
                                    }
                                    array_push($arrayProcesos, ['certificado' => base64_encode($certificado), 'procesoCertificado' => base64_encode($proceso)]);
                                    $unLock = false;
                                }
                            } else {
                                $nrowlFirma = 0;
                                array_push($arrayProcesos, ['certificado' => base64_encode(0), 'procesoCertificado' => base64_encode("")]);
                            }
                        } else {
                            array_push($arrayProcesos, ['certificado' => base64_encode(0), 'procesoCertificado' => base64_encode("")]);
                        }
                        array_push($newArrayHistorias, [
                            'idHistoricoControl' => base64_encode($rowObject['id']),
                            'idControl' => base64_encode($rowObject['idControl']),
                            'idHistoria' => base64_encode($rowObject['idHistoria']),
                            'proceso' => base64_encode($rowObject['proceso']),
                            'tipo' => base64_encode($rowObject['tipo']),
                            'estado' => base64_encode($rowObject['estado']),
                            'nombreHistoria' => ($arrayPosicionHistoria[$rowObject['tipo'] - 1]),
                            'firma' => base64_encode($nrowlFirma > 0 ? ($queryList->fetch_array()['firma'] != "" ? 1 : 0) : 0),
                            'idDoctorHistoria' => base64_encode($nrowlDoctor > 0 ? $idDoctor : 0),
                            'created_at' => base64_encode($rowObject['created_at']),
                            'updated_at' => base64_encode($rowObject['updated_at'])
                        ]);
                    }
                    $newArray[] = [$arrayProcesos, $newArrayHistorias];
                }
            }
        } else {
            $newArray = array("error" => "No existe el cliente");
        }
    } else if ($_POST['key'] == "addHEnCurso") {

        $procesarHistoria = $_POST['procesarHistorias'];
        if (empty($procesarHistoria)) { // si los procesos se han enviado vacios
            // anexamos el proceso principal, para que encaso de pasar esto vacio se agregue o valide si existe
            $procesarHistoria = ["1"];
        } else if (!in_array("1", $procesarHistoria)) { // O sin el proceso principal no existe dentro del array
            // anexamos el proceso principal, para que encaso de pasar esto vacio o sin el princeso principal se agregue y valide si existe
            array_push($procesarHistoria, "1");
        }
        $idDoctor = $_POST['idDoctor'];
        $pasa = 0;
        $newArrayValid = array();
        $queryComprobarExistente = mysqli_query($conn3, "SELECT * FROM salaControl WHERE idCliente = {$idCliente} AND proceso = 0");
        $queryData = $queryComprobarExistente->fetch_array();
        $queryComprobarExistente = mysqli_num_rows($queryComprobarExistente);
        // Condicion para verificar si existe o no el control de historias
        // Caso que no exista, se inserta un nuevo registro para ese cliente
        $querySelectClienteUpdate = mysqli_query($conn3, "SELECT * FROM cliente WHERE cliente_id = {$idCliente}")->fetch_array();
        if ($queryComprobarExistente > 0) {
            if ($queryData['idEmpresa'] == "") {
                if ($querySelectClienteUpdate['idEmpresa'] != "") {
                    $queryUpdateControl = mysqli_query($conn3, "UPDATE salaControl SET idEmpresa = {$querySelectClienteUpdate['idEmpresa']} WHERE id = {$queryData['id']}");
                }
            }
            $pasa = 1;
        } else {
            $querySelectClienteUpdate['idEmpresa'] = ($querySelectClienteUpdate['idEmpresa'] == "" ? 0 : $querySelectClienteUpdate['idEmpresa']);
            $queryInsertControl = mysqli_query($conn3, "INSERT INTO salaControl SET idDoctor = {$idDoctor}, idCliente = {$idCliente}, idEmpresa = {$querySelectClienteUpdate['idEmpresa']}");
        }
        
        // Ya sea si existe el registro o se proceso la insersion del mismo pasaremos por esta condicional
        if ($queryInsertControl || $pasa == 1) {
            $queryComprobarID = mysqli_query($conn3, "SELECT MAX(id) as idControl FROM salaControl WHERE idCliente = {$idCliente} AND proceso = 0")->fetch_array();
            $queryResultGlobal = $queryComprobarID;
            // Verificamos el id de la sala de control creada e ingresamos al condicional
            if ($queryComprobarID) {
                $h = 0;
                // Recorremos la cantidad de historias que seran agregadas al control
                while ($h < count($procesarHistoria)) {
                    // Comprobamos que no exista el control, de existir entoces solo procedemos a actualizar el proceso de estado 0 a estado 1 por encontrarse inhabilitado
                    $queryComprobarExistente = mysqli_query($conn3, "SELECT * FROM historicoControl WHERE idControl = {$queryComprobarID['idControl']} AND tipo = {$procesarHistoria[$h]}");
                    $queryComprobarExistentePrincipal = mysqli_query($conn3, "SELECT * FROM historicoControl WHERE idControl = {$queryComprobarID['idControl']} AND tipo = 1");
                    if ($queryComprobarExistentePrincipal->fetch_array()['tipo'] == 1 && $queryComprobarExistentePrincipal->fetch_array()['proceso'] == 2) {
                        $queryUpdateHistoriasPrincipal = mysqli_query($conn3, "UPDATE historicoControl SET proceso = 1 WHERE id = {$queryComprobarExistentePrincipal->fetch_array()['id']}");
                    }
                    $queryComprobarExistente2 = mysqli_num_rows($queryComprobarExistente);
                    if ($queryComprobarExistente2 > 0) {
                        $queryUpdateHistorias = mysqli_query($conn3, "UPDATE historicoControl SET estado = 1 WHERE id = {$queryComprobarExistente->fetch_array()['id']}");
                        if ($queryUpdateHistorias) { // Actualizamos el estado del proceso a estado = 1
                            $newArrayValid = ["status" => 3]; // valga la rebusnancia xd
                        } else {
                            $newArrayValid = ["status" => 3]; // valga la rebusnancia xd
                        }
                    } else {
                        // Caso contrario, insertamos el procedimiento unido a la sala de control
                        $queryInsertHistorias = mysqli_query($conn3, "INSERT INTO historicoControl SET idControl = {$queryComprobarID['idControl']}, tipo = {$procesarHistoria[$h]}");
                        $queryResultGlobal = $queryInsertHistorias;
                        $newArrayValid = ["status" => 0];
                    }
                    $h++;
                }
                // echo $newArrayValid['status'];
                if ($queryInsertHistorias && $newArrayValid['status'] != 3) {
                    // Si el proceso fue insertado correctamente
                    $newArrayValid = ["status" => 1];
                } else if ($newArrayValid['status'] != 3) {
                    // En caso de que la variable contenga algun valor diferente a 3
                    $newArrayValid = ["status" => 0];
                }
            }
        }
        $newArray = $newArrayValid;
    } else if ($_POST['key'] == "removeParaclinicos") {
        $idHistoricoControl = $_POST['idHistoricoControl'];
        $queryInsertHistorias = mysqli_query($conn3, "UPDATE historicoControl SET estado = 0 WHERE id = {$idHistoricoControl}");
        if (!$queryInsertHistorias) {
            $newArray = ["status" => 0];
        } else {
            $newArray = ["status" => 1];
        }
    } else if ($_POST['key'] == "imprimirParaclinicos") {
        $idHistoricoControl = $_POST['idHistoricoControl'];
        $arrayPosicionHistoria = ["Salud Ocupacional", "Visiometría", "Audiometría", "Espirometría", "Optometría", "Electrocardiograma", "Psicofísico", "Psicométrico", "Radiografía"];
        $newArray = [
            "status" => 1,
            "data" => []
        ];
        $querySelect = mysqli_query($conn3, "SELECT * FROM historicoControl WHERE idControl = {$idHistoricoControl} AND tipo != 1");
        $nrow = mysqli_num_rows($querySelect);
        if (!$nrow) {
            $newArray = ["status" => 0];
        } else {
            while ($rowObject = mysqli_fetch_assoc($querySelect)) {
                array_push($newArray['data'], [
                    'idHistoricoControl' => base64_encode($rowObject['id']),
                    'idControl' => base64_encode($rowObject['idControl']),
                    'idHistoria' => base64_encode($rowObject['idHistoria']),
                    'proceso' => base64_encode($rowObject['proceso']),
                    'tipo' => base64_encode($rowObject['tipo']),
                    'estado' => base64_encode($rowObject['estado']),
                    'nombreHistoria' => ($arrayPosicionHistoria[$rowObject['tipo'] - 1]),
                    'created_at' => base64_encode($rowObject['created_at']),
                    'updated_at' => base64_encode($rowObject['updated_at'])
                ]);
            }
        }
    }
    header("Content-type: application/json; charset= utf-8");
    // echo '<pre>';
    // var_dump($newArray);
    // echo '</pre>';
    echo json_encode($newArray);
    exit();
}
