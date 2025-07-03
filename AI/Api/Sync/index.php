<?php
// 18 09 2023 - JRodriguez
// api para consumo de sistemas offline
// --------------------------------------------
// MODULO PLUS ඞ
// --------------------------------------------
// este archivo funciona como point para realizar tareas como:
// 1. registro 
// 2. consulta 
// según el tipo de operación se realiza una tarea distinta
// --------------------------------------------

// recibimos el json por post
// esto nos devuelve el contenido del archivo de texto pasado como argumento en este caso el json
$data = json_decode(file_get_contents('php://input'), true);
// var_dump($data);

// estructura del json a recibir
// $arreglo = array(
//     "token"             => "XXXXXX", // codigo del sistema en salt
//     "pass"              => "XXXXXXXXXXXXXXXXXXXXXXXX", // base de datos del sistema en base64 + salt
//     "tipo"              => "X", // 1 / 2 / 3 / 4
// );
// según el tipo de operación se realiza una tarea distinta

$token = decrypt($data['token']);
$pass = decrypt(base64_decode($data['pass']));
$tipo = $data['type'];
// var_dump($data['type']);

// con el token y pass se hace la conexion con la base de datos

$hostApiM = 'localhost';
$userdbApiM = 'medicaso_rootBase';
$pass2ApiM = '5qA?o]t6d-h25qA?o]t6d-h2';
$DBApiM = $pass;
// var_dump($hostApiM, $userdbApiM, $pass2ApiM, $DBApiM);
$conn3ApiM = mysqli_connect($hostApiM, $userdbApiM, $pass2ApiM, $DBApiM);
// check connection
if (mysqli_connect_error()) {
    // no hay conexion
    die("Connection failed: " . mysqli_connect_error());
} else {
    // hay conexión
    switch ($tipo) {
        case '1':
            // registro de clientes
            registroCliente($conn3ApiM, $data);
            break;

        case '2':
            // consulta de clientes
            consultaCliente($conn3ApiM, $data);
            break;

        case '3':
            // registro de historias clínicas
            registroGeneral($conn3ApiM, $data);
            break;

        case '4':
            // consulta de historias clínicas
            consultaGeneral($conn3ApiM, $data);
            break;

        default:
            // return false
            $response['mensaje'] = 'Ninguna operación seleccionada';
            break;
    }
}


// variable global para la relación de nuevos pacientes
// pacientes nuevos en el sistema local posiblemente tendrán un id distinto en el sistema online
// para eso se utiliza este arreglo que lleva [idOlocal, idOnline] 
// esto para poder relacionarlo y editar los datos de historias antes de enviarlos al sistema online
$arrayIdPacientes = array();

function registroCliente($conn3ApiM, $data)
{
    // ಠ_ಠ recibir clientes por post y subir al sistema
    global $arrayIdPacientes;
    $count = 0;
    $tabla = 'cliente';
    $arregloPost = $data['data'];
    $arregloApi = [];
    // consulta de la tabla
    $query = "SELECT * from $tabla";
    // var_dump($query);
    $result = mysqli_query($conn3ApiM, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $arregloApi[] = $row;
    }

    // if (count($arregloApi) == count($arregloPost)) {
    //     // no hay diferencias
    //     $response['mensaje'] = 'No hay Pacientes para Subir';
    // } else {
    // hay diferencias
    // se valida uno a uno para actualizar
    $encontrado = false;
    for ($i = 0; $i < count($arregloPost); $i++) {
        // buscar los datos en el arregloApi / osea sistema online
        foreach ($arregloApi as $item) {
            if ($item['cliente_id'] == base64_decode($arregloPost[$i][base64_encode('cliente_id')]) && $item['CODI_CLIENTE'] == base64_decode($arregloPost[$i][base64_encode('CODI_CLIENTE')])) {
                $encontrado = true;
                break;
            }
        }
        if ($encontrado) {
            // Los datos existen en el arregloApi
        } else {
            // Los datos no existen en el arregloApi
            $count++;
            $claves = array_keys($arregloPost[$i]); // array con las claves o nombres de los datos
            $valores = array_values($arregloPost[$i]); // array con los valores de los datos
            $clave = '';
            $dato = '';
            for ($y = 1; $y < count($arregloPost[$i]); $y++) {
                if (base64_decode($valores[$y]) <> '' && base64_decode($valores[$y]) <> null) {
                    // clave
                    $clave .= base64_decode($claves[$y]) . ', ';
                    // valor
                    $dato .= '"' . base64_decode($valores[$y]) . '", ';
                }
            }
            $dato = substr($dato, 0, -2);
            $clave = substr($clave, 0, -2);

            $queryInsert = "INSERT INTO $tabla ($clave) VALUES ($dato)";
            // var_dump($queryInsert);
            $result = mysqli_query($conn3ApiM, $queryInsert);
            if ($result == true) {
                $idPacienteLocal = base64_decode($valores[0]);
                $idPacienteNuevo = mysqli_insert_id($conn3ApiM);
                $arrayIdPacientes[] = [intval($idPacienteLocal), intval($idPacienteNuevo)];
            }
        }
        // Reiniciar la variable $encontrado para la siguiente vuelta 
        $encontrado = false;
    }
    $response['mensaje'] = 'Se registraron ' . $count . ' nuevos pacientes';
    $response['ids'] = $arrayIdPacientes;
    // }
    echo json_encode($response);
}

function consultaCliente($conn3ApiM, $data)
{
    $response = array();
    // ᕦ(ò_óˇ)ᕤ consultar clientes y retornar los datos
    $queryColumns = mysqli_query($conn3ApiM, "SHOW columns from `cliente`") or array_push($response["Error"], "Columns: " . mysqli_error($conn3ApiM));
    $queryData = mysqli_query($conn3ApiM, "SELECT * from cliente ");

    $count = 0;
    foreach ($queryData as $datData) {
        foreach ($queryColumns as $datcolumns) {
            $response[$count][encrypt($datcolumns['Field'])] = (encrypt(($datData[$datcolumns['Field']])) == "null" || encrypt(($datData[$datcolumns['Field']])) == ""  ? encrypt(('')) : encrypt(($datData[$datcolumns['Field']])));
        }
        $count++;
    }
    echo json_encode($response);
}

function registroGeneral($conn3ApiM, $data)
{
    // ಠ_ಠ recibir datos por post y subir al sistema
    global $arrayIdPacientes;
    $count = 0;
    $tabla = $data['table'];
    $arregloPost = $data['data'];
    $ids = $data['ids'];
    $arregloApi = [];
    $arrayClientes = [
        'idCliente',
        'CLIENTE',
        'clienteId',
        'cliente_id',
        'cliente_odonto_id',
        'idCliente',
        'id_cliente',
        'id_e_paciente',
        'id_paciente',
        'paciente',
    ];




    // consulta de la tabla
    $query = "SELECT * from $tabla";
    // var_dump($query);
    $result = mysqli_query($conn3ApiM, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $arregloApi[] = $row;
    }


    // se valida uno a uno para actualizar
    $encontrado = false;
    for ($i = 0; $i < count($arregloPost); $i++) {
        // buscar los datos en el arregloApi / osea sistema online

        $claves = array_keys($arregloPost[$i]); // array con las claves o nombres de los datos
        $valores = array_values($arregloPost[$i]); // array con los valores de los datos
        // var_dump($claves);
        // var_dump($valores);

        // tomar los primeros 9 datos del arreglo para validarlos en cualquier posición del arregloApi
        for ($y = 0; $y < 4; $y++) {
            // clave
            $clave[$y] = (base64_decode($claves[$y]));
            // valor
            $dato[$y] = (base64_decode($valores[$y]));
        }

        // buscar los datos en el arregloApi / osea sistema online
        foreach ($arregloApi as $item) {
            if ($item[$clave[0]] == $dato[0] && $item[$clave[1]] == $dato[1] && $item[$clave[2]] == $dato[2] && $item[$clave[3]] == $dato[3]) {
                $encontrado = true;
                break;
            }
        }

        if ($encontrado) {
            // Los datos existen en el arregloApi
        } else {
            // Los datos no existen en el arregloApi
            $count++;
            $claves = array_keys($arregloPost[$i]); // array con las claves o nombres de los datos
            $valores = array_values($arregloPost[$i]); // array con los valores de los datos
            $clave = '';
            $dato = '';
            for ($y = 1; $y < count($arregloPost[$i]); $y++) {
                if (base64_decode($valores[$y]) <> '' && base64_decode($valores[$y]) <> null) {
                    // aquí vamos a validar los datos del id del cliente
                    // primero que nada tenemos el arreglo $ids con datos ej ids: [[88, 88],[89,90],[local,nube]]
                    // se valida si base64_decode($claves[$y]) esta en el arregloClientes
                    if (in_array(base64_decode($claves[$y]), $arrayClientes)) {
                        // esta en el arreglo
                        // se valida si base64_decode($valores[$y]) esta en el arreglo $ids en la segunda posición
                        if (count($ids) > 0) {
                            for ($z = 0; $z < count($ids); $z++) {
                                if (base64_decode($valores[$y]) == $ids[$z][0]) {
                                    $valores[$y] = base64_encode($ids[$z][1]);
                                }
                            }
                        }else{
                            $valores[$y] = $valores[$y];
                        }                        
                    }
                    // clave
                    $clave .= base64_decode($claves[$y]) . ', ';
                    // valor
                    // $dato .= '"' . base64_decode($valores[$y]) . '", ';

                    $valor  = base64_decode($valores[$y]);
                    // var_dump($valor);
                    if (mb_detect_encoding($valor) != "UTF-8") {
                        $valor = utf8_encode($valor);
                    }
                    $dato .= ' "' . mysqli_real_escape_string($conn3ApiM, $valor) . '", ';
                }
            }
            $dato = substr($dato, 0, -2);
            $clave = substr($clave, 0, -2);

            $queryInsert = "INSERT INTO $tabla ($clave) VALUES ($dato)";
            // var_dump($queryInsert);
            $result = mysqli_query($conn3ApiM, $queryInsert);
        }
        // Reiniciar la variable $encontrado para la siguiente vuelta 
        $encontrado = false;
    }
    $response['mensaje'] = 'Se subieron ' . $count . ' registros a ' . $tabla;
    // }
    echo json_encode($response);
}

function consultaGeneral($conn3ApiM, $data)
{
    // ᕦ(ò_óˇ)ᕤ consultar historias clínicas y retornar los datos
    $tabla = $data['table'];
    $replace = [];
    $queryprimary = mysqli_query($conn3ApiM, "show columns from `{$tabla}` where `Key` = 'PRI'");
    $fetchprimary = mysqli_fetch_array($queryprimary);
    $replace = ["@primary" => $fetchprimary['Field']];
    $condition = $data['conditions'];
    foreach ($replace as $key => $value) {
        $condition = str_replace($key, $value, $condition);
    }
    $response = [];
    $queryColumns = mysqli_query($conn3ApiM, "SHOW columns from {$tabla}") or array_push($response["Error"], "Columns: " . mysqli_error($conn3ApiM));
    $queryData = mysqli_query($conn3ApiM, "SELECT * from {$tabla} " . (!empty($condition) ? "where {$condition}" : "")) or array_push($response["Error"], "Query: " . mysqli_error($conn3ApiM));
    $count = 0;
    foreach ($queryData as $datData) {
        foreach ($queryColumns as $datcolumns) {
            $response[$count][encrypt($datcolumns['Field'])] = (encrypt(($datData[$datcolumns['Field']])) == "null" || encrypt(($datData[$datcolumns['Field']])) == ""  ? encrypt(('')) : encrypt(($datData[$datcolumns['Field']])));
        }
        $count++;
    }
    echo json_encode($response);
}



// -------------------------------------- ඞ
// funciones para encriptado fácil 
// -------------------------------------- ඞ
function salt()
{
    $caracteres = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $longitud = strlen($caracteres);
    $resultado = '';
    for ($i = 0; $i < 10; $i++) {
        $pos = rand(0, $longitud - 1);
        $resultado .= $caracteres[$pos];
    }
    return $resultado;
}

function decrypt($dato)
{
    // el dato tiene 10 caracteres de basura y luego la clave en base64
    return base64_decode(substr($dato, 10, strlen($dato)));
}

function encrypt($dato)
{
    return salt() . base64_encode($dato);
}
// -------------------------------------- ඞ