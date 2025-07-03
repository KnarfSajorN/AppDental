<?php
// ESTRUCTURA PARA PREPARARA DATOS RECIBIDOS POR AJAX
if (isset($_POST['key'])) {
    include './funciones/conn3.php';
    include './funciones/funcionesIndividuales.php';
    header("Content-Type: application/json; charset=UTF-8");
    mysqli_set_charset($conn3, "utf8");

    $array = [
        'status' => true,
        'data' => array(),
        'error' => array()
    ];

    if ($_POST['key'] == 'info_motivoConsulta') { // BUSCAMOS EL TIEMPO DE CONSULTA DEL SERVICIO
        $_POST['Activo'] = 1;
        $prepare = str_replace("', ", "' AND ", preparePost($_POST, ['key', 'mascara']));
        $select = mysqli_query($conn3, "SELECT Tiempo AS {$_POST['mascara']} FROM Motivos_Consulta WHERE {$prepare} LIMIT 1");
        if (!empty(mysqli_num_rows($select))) {
            array_push($array['data'], mysqli_fetch_assoc($select));
        } else {
            $array['status'] = false;
            array_push($array['error'], "Error {$_POST['key']}: " . mysqli_error($conn3));
        }

        echo json_encode($array);
        exit();
    }

    if ($_POST['key'] == 'updateEstadoCita') { // ACTUALIZAMOS EL ESTADO DESDE CONTROL DE CITA
        $prepare = preparePost($_POST, ['key', 'idCitas']);
        $prepareWhere = preparePost($_POST, ['key', 'estado']);
        $update = mysqli_query($conn3, "UPDATE citas SET {$prepare} WHERE {$prepareWhere}");
        if (!$update) {
            $array['status'] = false;
            array_push($array['error'], "Error {$_POST['key']}: " . mysqli_error($conn3));
        }
        echo json_encode($array);
        exit();
    }

    if ($_POST['key'] == 'updateEstadoPresencialCita') { // ACTUALIZAMOS EL ESTADO DESDE CONTROL DE CITA
        $prepare = preparePost($_POST, ['key', 'idCitas']);
        $prepareWhere = preparePost($_POST, ['key', 'estadoPresencia']);
        $update = mysqli_query($conn3, "UPDATE citas SET {$prepare} WHERE {$prepareWhere}");
        if (!$update) {
            $array['status'] = false;
            array_push($array['error'], "Error {$_POST['key']}: " . mysqli_error($conn3));
        }
        echo json_encode($array);
        exit();
    }

    if ($_POST['key'] == 'verificaCliente') { // VERIFICAMOS SI EL CLIENTE EXISTE
        $prepareWhere = preparePost($_POST, ['key']);
        $select = mysqli_query($conn3, "SELECT * FROM cliente WHERE {$prepareWhere}");
        if (empty(mysqli_num_rows($select))) {
            $array['status'] = false;
            array_push($array['error'], "Error {$_POST['key']}: " . mysqli_error($conn3));
        }
        echo json_encode($array);
        exit();
    }

    if ($_POST['key'] == 'addServicios') { // AGREGAR NUEVO SERVICIO
        $prepare = preparePost($_POST, ['key']);
        $insert = mysqli_query($conn3, "INSERT INTO Motivos_Consulta SET {$prepare}");
        if (!$insert) {
            $array['status'] = false;
            array_push($array['error'], "Error {$_POST['key']}: " . mysqli_error($conn3));
        } else {
            $prepareWhere = preparePost(['id' => mysqli_insert_id($conn3)]);
            $select = mysqli_query($conn3, "SELECT id, descripcion, Tiempo FROM Motivos_Consulta WHERE {$prepareWhere}");
            if (!empty(mysqli_num_rows($select))) {
                array_push($array['data'], mysqli_fetch_assoc($select));
            }
        }
        echo json_encode($array);
        exit();
    }

    echo json_encode($array);
    exit();
}
