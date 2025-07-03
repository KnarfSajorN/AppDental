<?php
session_start();
include 'funciones/funciones.php';
if ($_POST['key'] == 'VerificarActualizacion') {


    $sql1 = 'SELECT * FROM citas';
    $resultado1 = mysqli_query($conn3, $sql1);
    while ($fila1 = mysqli_fetch_assoc($resultado1)) {
        $Incapacidad = $fila1['Incapacidad'];
        $idCita = $fila1['id'];
    }

    $fechahoy = date('Y-m-d');
    if ($Incapacidad == 1) {
        $sql = 'SELECT * FROM citas WHERE  estadoEspera=1  AND estado = 8 AND estadoAtencion=0 AND fecha = "' . $fechahoy . '" ORDER BY CASE WHEN Incapacidad = ' . $Incapacidad . ' THEN 0 ELSE 1 END ';
    } else {
        $sql = 'SELECT * FROM citas WHERE  estadoEspera=1 AND estado = 8 AND estadoAtencion=0 AND fecha = "' . $fechahoy . '"  ';
    }
    $resultado = mysqli_query($conn3, $sql);
    // $sql = 'SELECT * FROM citas WHERE estado <> 4 and estado <> 3 and estado <> 7 ';




    $citas = array();
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $citas[] = $fila;
    }
    echo json_encode($citas);
    exit();
}
if ($_POST['key'] == 'NombreDoctor') {
    $doctorId = $_POST['doctorId'];
    $sql = "SELECT NOMBRE_USUARIO FROM usuarios WHERE id = $doctorId";
    $result = mysqli_query($conn3, $sql);

    // Return the result
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        echo $row['NOMBRE_USUARIO'];
    } else {
        echo "No results found";
    }
    exit();
}
if ($_POST['key'] == 'NombreMotivo') {
    $motivoId = $_POST['motivoId'];
    $sql1 = "SELECT descripcion FROM Motivos_Consulta WHERE id = $motivoId";
    $result = mysqli_query($conn3, $sql1);

    // Return the result
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        echo $row['descripcion'];
    } else {
        echo "No results found";
    }
    exit();
}
if ($_POST['key'] == 'UpdateCita') {
    $idCitas = $_POST['idCitas'];
    $Incapacidad = $_POST['Incapacidad'];
    $Consultorio = $_POST['Consultorio'];
    $horallegada = date('H:i:s');
    // $sql = 'UPDATE citas SET estado =7,estadoEspera=1,Incapacidad = ' . $Incapacidad . ', Consultorio = ' . $Consultorio . ',horallegada = ' . $horallegada . ' WHERE idCitas = ' . $idCitas.'';
    // $sql = 'UPDATE citas SET estado =7,estadoEspera=1,Incapacidad = ' . $Incapacidad . ', Consultorio = ' . $Consultorio . ' WHERE idCitas = ' . $idCitas;

    $Campo1 = mysqli_query($conn3, "show COLUMNS from citas WHERE Field = 'cita_sala_espera';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `citas` ADD `cita_sala_espera` INT(11) NULL DEFAULT '0' COMMENT 'si fue ingresada a sala de espera *Creado desde modulo de se_ajax_cita*'");
    }

    $sql = "UPDATE citas SET estado = 8, estadoEspera = 1, estadoAtencion=0,Incapacidad = '$Incapacidad', Consultorio = '$Consultorio', horallegada = '$horallegada', cita_sala_espera=1 WHERE idCitas = '$idCitas'";


    $result = mysqli_query($conn3, $sql);

    $QueryCita = mysqli_query($conn3, "SELECT * FROM  citas where idCitas = '$idCitas'");
    while ($RowCitas = mysqli_fetch_array($QueryCita)) {

        $cliente_id = $RowCitas['idCliente'];
        $Consultorio = $RowCitas['Consultorio'];
        $Doctor = $RowCitas['doctor'];
        $whatsapp = $RowCitas['telefono'];
        $Nombre_Cliente = $RowCitas['nombre'];
    }

    //$Nombre_Cliente = trim(funcionMaster($cliente_id,'cliente_id','nombre_cliente','cliente')," ");
    $Nombre_Doctor = trim(funcionMaster($Doctor, 'ID', 'NOMBRE_USUARIO', 'usuarios'), " ");

    $mensajeW = 'Sr(a) *' . $Nombre_Cliente . '* ,  en este momento ha sido registrado en la fila de la sala de espera para que sea atendido.';
    $accion = 0;

    Whatsapp_sent_cliente($linkkey, $whatsapp, $mensajeW, $cliente_id, $usuario_id, $whatsapp, $accion);

    $mensajeW = 'Dr(a) *' . $Nombre_Doctor . '* ,  en este momento el paciente *' . $Nombre_Cliente . '* se encuentra en la sala de espera.';
    $accion = 0;

    $whatsapp = funcionMaster($Doctor, 'ID_Usuario', 'whatsapp', 'config');

    // Whatsapp_sent($linkkey, $whatsapp, $mensajeW, $cliente_id, $usuario_id, $whatsapp, $accion);


    exit();
}


if ($_POST['key'] == 'TomarCita') {
    $idCitas = $_POST['idCitas'];
    $horaatencion = date('H:i:s');
    // $sql = 'UPDATE citas SET estado =2,estadoEspera=0,alerta = 1,horaatencion = '$horaatencion' WHERE idCitas = ' . $idCitas;
    $sql = "UPDATE citas SET estado = 8, estadoEspera = 1, alerta = 1, horaatencion = '$horaatencion', estadoAtencion=1 WHERE idCitas = '$idCitas'";
    $result = mysqli_query($conn3, $sql);

    $QueryCita = mysqli_query($conn3, "SELECT * FROM  citas where idCitas = '$idCitas'");
    while ($RowCitas = mysqli_fetch_array($QueryCita)) {

        $cliente_id = $RowCitas['idCliente'];
        $Consultorio = $RowCitas['Consultorio'];
        $Doctor = $RowCitas['doctor'];
        $whatsapp = $RowCitas['telefono'];
        $Nombre_Cliente = $RowCitas['nombre'];
    }

    //$Nombre_Cliente = trim(funcionMaster($cliente_id,'cliente_id','nombre_cliente','cliente')," ");
    $Nombre_Doctor = trim(funcionMaster($Doctor, 'ID', 'NOMBRE_USUARIO', 'usuarios'), " ");

    $mensajeW = 'Sr(a) *' . $Nombre_Cliente . '* , el doctor *' . $Nombre_Doctor . '* ya se encuentra disponible para atenderlo en el consultorio: *' . $Consultorio . '*';
    $accion = 0;

    Whatsapp_sent_cliente($linkkey, $whatsapp, $mensajeW, $cliente_id, $usuario_id, $whatsapp, $accion);


    /// ======= SE PONE EL SISTEMA ADAPTADO A ESE CLIENTE ======= 
    if($cliente_id <> 0 && $cliente_id <> ''){

        $idUser = $_POST['idUser'];
        $fechaHoy = date("Y-m-d");
        $hora_actual = date("H:i:s");
        mysqli_query($conn3, "INSERT INTO paciente_atencion SET 
        fecha = '$fechaHoy',
        hora = '$hora_actual',
        usuarioId = '$idUser',
        clienteId = '$cliente_id'
        ");

        $_SESSION['cI'] = $cliente_id;
    }
    /// ======= SE PONE EL SISTEMA ADAPTADO A ESE CLIENTE ======= 


    //echo "Whatsapp_sent_cliente($linkkey, $whatsapp, $mensajeW, $cliente_id, $usuario_id, $whatsapp, $accion)";
    exit();
}
if ($_POST['key'] == 'cerrarCita') {
    $idCitas = $_POST['idCitas'];
    $horaatencion = date('H:i:s');
    // $sql = 'UPDATE citas SET estado =2,estadoEspera=0,alerta = 1,horaatencion = '$horaatencion' WHERE idCitas = ' . $idCitas;
    $sql = "UPDATE citas SET estado = 2, estadoEspera = 0,estadoAtencion=0,horafinalizada = '$horaatencion' WHERE idCitas = '$idCitas'";

    $result = mysqli_query($conn3, $sql);

    //PARA CERRAR LA ATENCIÓN PENDIENTE
    $idCliente = funcionMaster($idCitas, "idCitas", "idCliente", "citas");
    if($idCliente <> 0 && $idCliente <> ''){
        $idUser = $_POST['idUser'];
        $fechaHoy = date("Y-m-d");
        $hora_actual = date("H:i:s");
        $atencionesPendientes = mysqli_query($conn3, "SELECT * FROM paciente_atencion WHERE clienteId='$idCliente' and usuarioId = '$idUser' and activo = 1 ");
        if (mysqli_num_rows($atencionesPendientes) <> 0) {
            mysqli_query($conn3, "UPDATE paciente_atencion SET fechaSalida='$fechaHoy', horaSalida='$hora_actual', activo=0 WHERE clienteId='$idCliente' and usuarioId = '$idUser' and activo = 1" );

            unset($_SESSION['cI']);
        }
    }
    //PARA CERRAR LA ATENCIÓN PENDIENTE
    exit();
}


if ($_POST['key'] == 'AlertaCita') {

    $sql1 = 'SELECT * FROM citas  ';
    $resultado1 = mysqli_query($conn3, $sql1);
    while ($fila1 = mysqli_fetch_assoc($resultado1)) {
        $Incapacidad = $fila1['Incapacidad'];
        $idCita = $fila1['id'];
    }

    $sql = 'SELECT * FROM citas WHERE  estadoEspera=1 AND estado = 8 AND alerta = 1';

    $resultado = mysqli_query($conn3, $sql);
    // $sql = 'SELECT * FROM citas WHERE estado <> 4 and estado <> 3 and estado <> 7 ';




    $citas = array();
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $citas[] = $fila;
    }
    echo json_encode($citas);
    exit();
}


// Verificar si se recibió el parámetro "key" con el valor "UpdateAlerta"
if (isset($_POST["key"]) && $_POST["key"] === "UpdateAlerta") {
    // Verificar si se recibieron los parámetros necesarios
    if (isset($_POST["cita_id"]) && isset($_POST["nuevo_estado_alerta"])) {
        // Obtener los valores de los parámetros
        $idCitas = $_POST["cita_id"];
        $nuevo_estado_alerta = $_POST["nuevo_estado_alerta"];




        $sql = "UPDATE citas SET alerta = '$nuevo_estado_alerta' WHERE idCitas = $idCitas";

        $result = mysqli_query($conn3, $sql);

        exit();
    }
}


// Verificar si se recibió el parámetro "key" con el valor "UpdateAlerta"
if (isset($_POST["key"]) && $_POST["key"] === "EnviarAlertaDenuevo") {
    // Verificar si se recibieron los parámetros necesarios
    if (isset($_POST["idCitas"])) {
        // Obtener los valores de los parámetros
        $idCitas = $_POST["idCitas"];

        $sql = "UPDATE citas SET alerta = '1' WHERE idCitas = $idCitas";

        $result = mysqli_query($conn3, $sql);

        // enviar mensaje al paciente de nuevo
        $QueryCita = mysqli_query($conn3, "SELECT * FROM  citas where idCitas = '$idCitas'");
        while ($RowCitas = mysqli_fetch_array($QueryCita)) {
            $cliente_id = $RowCitas['idCliente'];
            $Consultorio = $RowCitas['Consultorio'];
            $Doctor = $RowCitas['doctor'];
            $whatsapp = $RowCitas['telefono'];
            $Nombre_Cliente = $RowCitas['nombre'];
        }

        //$Nombre_Cliente = trim(funcionMaster($cliente_id,'cliente_id','nombre_cliente','cliente')," ");
        $Nombre_Doctor = trim(funcionMaster($Doctor, 'ID', 'NOMBRE_USUARIO', 'usuarios'), " ");

        $mensajeW = 'Sr(a) *' . $Nombre_Cliente . '* , el doctor *' . $Nombre_Doctor . '* ya se encuentra disponible para atenderlo en el consultorio: *' . $Consultorio . '*';
        $accion = 0;

        Whatsapp_sent_cliente($linkkey, $whatsapp, $mensajeW, $cliente_id, $usuario_id, $whatsapp, $accion);

        exit();
    }
}


if (isset($_POST["key"]) && $_POST["key"] === "ConsultarCitasConsultorio") {


    $sql1 = 'SELECT * FROM citas  ';
    $resultado1 = mysqli_query($conn3, $sql1);
    while ($fila1 = mysqli_fetch_assoc($resultado1)) {
        $Incapacidad = $fila1['Incapacidad'];
        $idCita = $fila1['id'];
    }

    $fechahoy = date('Y-m-d');

    $sql = 'SELECT * FROM citas WHERE  estadoEspera=1 AND estado = 8 AND estadoAtencion=1 AND fecha = "' . $fechahoy . '" ';
    $resultado = mysqli_query($conn3, $sql);

    $citas = array();
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $citas[] = $fila;
    }
    echo json_encode($citas);
    exit();
}
