<?php
include 'funciones/funciones.php';
$idCitas = $_POST['idCitas'];

mysqli_query($conn3, "UPDATE citas SET estado = 3  WHERE idCitas = $idCitas");
$queryList = mysqli_query($conn3, "SELECT * FROM citas WHERE idCitas = '$idCitas'");
$nrowl = mysqli_num_rows($queryList);

while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $idCitas = $rowMotorizado['idCitas'];
    $nombre_cliente = $rowMotorizado['nombre'];
    $telefono = $rowMotorizado['telefono'];
    $correo_cliente = $rowMotorizado['correo'];
    $idAliado = $rowMotorizado['usuario_id'];
    $Hora = $rowMotorizado['Hora'];
    $doctor = $rowMotorizado['doctor'];
    $doctor_A = funcionMaster($doctor, 'ID', 'NOMBRE_USUARIO', 'usuarios');
    $idCliente = $rowMotorizado['idCliente'];

    if ($idCliente == 0) {
        $query1 = mysqli_query($conn3, "SELECT * FROM cliente WHERE correo_cliente = '$correo_cliente' AND (celular_cliente = '$telefono' or telefono_cliente = '$telefono' or whatsapp = '$telefono' )");
        $nrowl = mysqli_num_rows($query1);

        while ($row_1 = mysqli_fetch_array($query1)) {
            $clienteId = $row_1['cliente_id'];
        }
    }

        $fecha = date("Y-m-d");
        $hora = date("h:m:s");

        $clienteId = base64_encode($idCitas);
        $idCliente = base64_encode($idCliente);

        $mensajeW = "¡Hola! *$nombre_cliente*, has asistido a tu cita médica con el Doctor(a) *$doctor_A*!👩🏻‍💻
Nos gustaría recibir tu opinión para mejorar nuestros servicios. Por favor, completa el siguiente formulario:
    
{$Base}/calificatuservicio/?Ci=$clienteId&Cl=$idCliente

Solo te tomará 2 minutos responder nuestra encuesta y nos será de gran ayuda para mejoras en tu experiencia.
Te envío muchos saludos, espero tengas un excelente día. ¡Un abrazo! 💙🤍🖤💚

Atte, *$doctor_A* 🤖";
        $accion = 0;
        Whatsapp_sent_cliente($linkkey, $telefono, $mensajeW, '1', '1', $telefono, $accion);
    }

// Construir la respuesta JSON
$response = array(
    'success' => true,
    'message' => 'Mensaje enviado por WhatsApp'
);

// Enviar la respuesta JSON al cliente
echo json_encode($response);