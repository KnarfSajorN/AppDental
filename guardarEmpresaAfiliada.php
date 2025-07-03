<?php
if ($_POST['key']) {
    include './funciones/conn3.php';
    // $conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));
    $idDoctor = $_POST['id'];
    $nombreEmpresa = $_POST['nombreEmpresa'];
    $RUTCC = $_POST['rutcc'];
    $NIT = $_POST['nit'];
    $razonSocial = $_POST['razonSocial'];
    $direccionEmpresa = $_POST['direccionEmpresa'];
    $ciudadEmpresa = $_POST['ciudadEmpresa'];
    $telefonoEmpresa = $_POST['telefonoEmpresa'];
    $nombreContactoEmpresa = $_POST['nombreContactoEmpresa'];
    $telefonoContactoEmpresa = $_POST['telefonoContactoEmpresa'];
    $correoContactoEmpresa = $_POST['correoContactoEmpresa'];
    $conoceProfesiograma = $_POST['conoceProfesiograma'];

    $queryVerificar = mysqli_query($conn3, "SELECT * FROM empresasAfiliadas WHERE RUTCC = '$RUTCC' AND NIT = '$NIT'");
    $rowNum = mysqli_num_rows($queryVerificar);

    if ($_POST['key'] == 'insertEmpresa' && $rowNum == 0) {
        $queryInsert = mysqli_query($conn3, "INSERT INTO empresasAfiliadas SET idDoctor = $idDoctor, nombreEmpresa = '$nombreEmpresa', RUTCC = '$RUTCC', NIT = '$NIT', razonSocial = '$razonSocial', direccionEmpresa = '$direccionEmpresa', ciudadEmpresa = '$ciudadEmpresa', telefonoEmpresa = '$telefonoEmpresa', nombreContactoEmpresa = '$nombreContactoEmpresa', telefonoContactoEmpresa = '$telefonoContactoEmpresa', correoContactoEmpresa = '$correoContactoEmpresa', conoceProfesiograma = '$conoceProfesiograma'");
    }

    if ($_POST['key'] == 'updateEmpresa') {
        $idEmpresa = $_POST['idEmpresa'];
        $queryUpdate = mysqli_query($conn3, "UPDATE empresasAfiliadas SET nombreEmpresa = '$nombreEmpresa', RUTCC = '$RUTCC', NIT = '$NIT', razonSocial = '$razonSocial', direccionEmpresa = '$direccionEmpresa', ciudadEmpresa = '$ciudadEmpresa', telefonoEmpresa = '$telefonoEmpresa', nombreContactoEmpresa = '$nombreContactoEmpresa', telefonoContactoEmpresa = '$telefonoContactoEmpresa', correoContactoEmpresa = '$correoContactoEmpresa', conoceProfesiograma = '$conoceProfesiograma' WHERE id = $idEmpresa ");
        if (!$queryUpdate) {
            echo '<pre>';
            var_dump(mysqli_error_list($conn3));
            echo '</pre>';
        }
    }

    if ($_POST['key'] == 'removeEmpresa') {
        $idEmpresa = $_POST['idEmpresa'];
        $queryUpdateEstado = mysqli_query($conn3, "UPDATE empresasAfiliadas SET estado = 0 WHERE id = $idEmpresa AND idDoctor = $idDoctor");
        if (!$queryUpdateEstado) {
            echo '<pre>';
            var_dump(mysqli_error_list($conn3));
            echo '</pre>';
        }
    }

    if ($rowNum > 0 && $_POST['key'] != 'cargarDatos' && $_POST['key'] != 'updateEmpresa'&& $_POST['key'] != 'removeEmpresa') {
        $newArray = 1;
    } else {
        $queryResult = mysqli_query($conn3, "SELECT * FROM empresasAfiliadas WHERE estado = 1");
        while ($rowObject = mysqli_fetch_object($queryResult)) {
            $newArray[] = [
                'id' => base64_encode($rowObject->id),
                'idDoctor' => base64_encode($rowObject->idDoctor),
                'nombreEmpresa' => base64_encode($rowObject->nombreEmpresa),
                'rutcc' => base64_encode($rowObject->RUTCC),
                'nit' => base64_encode($rowObject->NIT),
                'razonSocial' => base64_encode($rowObject->razonSocial),
                'direccionEmpresa' => base64_encode($rowObject->direccionEmpresa),
                'ciudadEmpresa' => base64_encode($rowObject->ciudadEmpresa),
                'telefonoEmpresa' => base64_encode($rowObject->telefonoEmpresa),
                'nombreContactoEmpresa' => base64_encode($rowObject->nombreContactoEmpresa),
                'telefonoContactoEmpresa' => base64_encode($rowObject->telefonoContactoEmpresa),
                'correoContactoEmpresa' => base64_encode($rowObject->correoContactoEmpresa),
                'conoceProfesiograma' => base64_encode($rowObject->conoceProfesiograma),
                'estado' => base64_encode($rowObject->estado),
                'created_at' => base64_encode($rowObject->created_at),
                'updated_at' => base64_encode($rowObject->updated_at)
            ];
        }
    }

    if (!$queryResult && $rowNum != 1) {
        echo '<pre>';
        var_dump(mysqli_error_list($conn3));
        echo '</pre>';
    }

    header("Content-type: application/json; charset= utf-8");
    echo json_encode($newArray);
    exit();
    
}

