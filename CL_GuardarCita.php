<?php
date_default_timezone_set('America/Bogota');
include("funciones/conn3.php");
include("funciones/funciones.php");
include("funciones/funcionesUtilidades.php");
session_start();
$doctor = $_POST['doctor'];

// $linkkey = $_SESSION['linkkey'];

$fecha = $_POST['fecha'];
$Hora = $_POST['Hora'];

$clienteId = $_POST['clienteId'];
$nombre = $_POST['nombre'];
if ($clienteId != "0") {
    $nombre = funcionMaster($clienteId, 'cliente_id', 'nombre_cliente', 'cliente');
}
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];

$duracion = $_POST['duracion'];
$motivoConsulta = $_POST['motivoConsulta'];
$P = $_POST['P'];
$ID_principal = $_SESSION['ID_principal'];
$usuario_id = $_POST['usuario_id'];
$estado = 1;
$registrado = date("Y-m-d H:i:s");

$Usuario_Web = funcionMaster($clienteId, 'cliente_id', 'Usuario_Web', 'cliente');
$Clave_Web = funcionMaster($clienteId, 'cliente_id', 'Clave_Web', 'cliente');

$Nuevahora = date('H:i:s', (strtotime('+ ' . $duracion . ' minute', strtotime($Hora))));
if ($P == 0) {
    $ConsultaTipo = 'Presencial';
} elseif ($P == 1) {
    $ConsultaTipo = 'Virtual';
}

$queryListu = mysqli_query($conn3, "SELECT * FROM  usuarios where ID = $doctor");
$nrowlu = mysqli_num_rows($queryListu);
while ($rowMotorizadou = mysqli_fetch_array($queryListu)) {
  $nombreD = $rowMotorizadou['NOMBRE_USUARIO'];
  $linkGM = $rowMotorizadou['ubicacion'];
  $direccionS = $rowMotorizadou['direccion'];

}

$queryList = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario=$doctor");
while ($rowMotorizado = mysqli_fetch_array($queryList)) {

    $nombreF = $rowMotorizado['nombreF'];
    $telefonoF = $rowMotorizado['telefonoF'];
    $emailF = $rowMotorizado['emailF'];
    $whatsapp = $rowMotorizado['whatsapp'];

    $sul = $rowMotorizado['sul'];
    $sum = $rowMotorizado['sum'];
    $sue = $rowMotorizado['sue'];
    $suj = $rowMotorizado['suj'];
    $suv = $rowMotorizado['suv'];
    $sus = $rowMotorizado['sus'];
    $sud = $rowMotorizado['sud'];

    $CitasGoogleCalendar = $rowMotorizado['CitasGoogleCalendar'];
    
}

$dias = array('', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo');
$DiaSemana = $dias[date('N', strtotime($fecha))];

/*
if ($DiaSemana == 'Lunes') {
    $sucursal = $sul;
} elseif ($DiaSemana == 'Martes') {
    $sucursal = $sum;
} elseif ($DiaSemana == 'Miercoles') {
    $sucursal = $sue;
} elseif ($DiaSemana == 'Jueves') {
    $sucursal = $suj;
} elseif ($DiaSemana == 'Viernes') {
    $sucursal = $suv;
} elseif ($DiaSemana == 'Sabado') {
    $sucursal = $sus;
} elseif ($DiaSemana == 'Domingo') {
    $sucursal = $sud;
}
*/
$sucursal = $_POST['sucursal'];
if ($sucursal == "") {
    $sucursal = "0";
}

$queryUsuario =  "insert INTO citas (doctor, fecha, Hora, nombre, telefono, correo, motivoConsulta, estado, registrado, usuario_id, tipo,idCliente,duracion,HoraF,sucursal,ID_principal) 
                           VALUES ('$doctor' ,'$fecha' ,'$Hora' ,'$nombre' ,'$telefono' ,'$correo' ,'$motivoConsulta' ,'$estado' ,'$registrado', '$usuario_id', '$P','$clienteId','$duracion','$Nuevahora','$sucursal','$ID_principal')";
mysqli_query($conn3, $queryUsuario);

$cita_id = mysqli_insert_id($conn3);

$SucursalNombre = funcionMaster($sucursal, "id", "descripcion", "sucursales");

$QueryMotivoC = mysqli_query($conn3, "SELECT * FROM  Motivos_Consulta WHERE id = $motivoConsulta ");
while ($RowMotivoC = mysqli_fetch_array($QueryMotivoC)) {
  $MotivoConsulta_Texto = str_replace(['"', "'"], '',$RowMotivoC['descripcion']);
}

$nombreD = reem_alreves($nombreD);
//query para verificar si hay mensajes en el modulo de recordatorios

$queryRecordMaster = "SELECT * FROM MaestroRecordatorio 
where 1=1
and activo = 1
and (arreglo_usuarios is not null and arreglo_usuarios != '')
and (hora is not null and hora != '')
and (Mensaje is not null and Mensaje != '')
and (Zona_Horaria is not null and Zona_Horaria != '')
and tipo = 'Citas'
and ID_principal = $ID_principal
order by id
";
// echo $queryRecordMaster;

$result = mysqli_query($conn3, $queryRecordMaster);
if($result){
    if (mysqli_num_rows($result) > 0) {
      
        while ($row = mysqli_fetch_assoc($result)) {
            $mensajeW = cambiarVariablesCita($row['Mensaje'],$clienteId,$usuario_id,$cita_id);

            
        }
    }else{
        $mensajeW = 'Registro de cita Medica.
    
        Estimado paciente *' . $nombre . '* ,Se registró una cita Medica.
          
        Fecha y Hora:  *' . $fecha . '* *' . $Hora . '*  Motivo de la consulta:' . utf8_encode($MotivoConsulta_Texto) . '. 
          
        Su consulta es con el Doctor: *' . $nombreD . '*.  
          
        en *' . $direccionS . '*.
        Recuerde que esta serian sus credenciales para entrar al Portal de Pacientes:
        Usuario *'.$Usuario_Web.'* y Contraseña: *'.$Clave_Web.'*
        Atte. *ALTE Dentalsoft* Teléfono ' . $telefonoF . ' Correo ' . $emailF . '
        
        '.($linkGM <> '' ? 'Encuentranos en: '.$linkGM : '').'
        ';
    }
}
//verificamos si hay registro o no 


// $mensajeW = 'Sr(a) *' . $nombre . '* usted ha agendado un cita con *' . $nombreD . '* el día *' . $fecha . '
// * a las *' . $Hora . '* en' . $sucursal . ' Teléfono: ' . $telefonoF . ' Correo: ' . $emailF . ', 
// para confirmar esta cita solo debe de responder *SI*. Si no desea recibir notificaciones puede darle de baja en 
// cualquier momento respondiendo con la palabra NO. Atte ' . $nombreD . '. ';
$accion = 0;
Whatsapp_sent_cliente($linkkey, $telefono, $mensajeW, $cliente_id, $usuario_id, $whatsapp, $accion);

$mensaje2 = '*' . $nombreD . '*  se ha agendado una cita con el paciente *' . $nombre . '*, el dia  *' . $fecha . '* a las *' . $Hora . '* en *' . $sucursal . '*. Motivo: *' . $MotivoConsulta_Texto . '* Atte ' . $nombreD . '.';
//Whatsapp_sent($whatsapp, $mensaje2);


/////////////////////////////////Correo electronico [Llenar]/////////////////////////////////
include 'PlantillaCorreo/funcionesPlantillas.php';

$usuario_id = $usuario_id;
$titulo = "Agendamiento de Cita";
$subtitulo = "Fecha de Cita del Paciente " . $nombre;
$texto = 'Sr(a) *' . $nombre . '* usted ha agendado un cita con *' . $doctor . '* el día *' . $fecha . '* a las *' . $Hora . '* en' . $sucursal . ' Teléfono: ' . $telefonoF . ' Correo: ' . $emailF . '. <br> Este correo electrónico no puede recibir respuestas. Para obtener más información ' . $nombreD . ' Teléfono ' . $telefonoF . ' Correo ' . $emailF . '.';
$url = "";
$botonurl = "";

$mensaje = PlantillaBasicaMedica($usuario_id, $titulo, $subtitulo, $texto, $url, $botonurl);
////////////////////////////////////Correo electronico [Datos Adicionales]/////////////////////////////////
$para = "{$correo}"; //Correo

// Para enviar un correo HTML, debe establecerse la cabecera Content-type
$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Cabeceras adicionales
$cabeceras .= 'To: ' . $nombreD . ' <noreply@medicalsoftcolombia.com>' . "\r\n";
$cabeceras .= 'From: ' . $titulo . ' <noreply@medicalsoftcolombia.com>' . "\r\n";
$cabeceras .= 'Cc: noreply@medicalsoftcolombia.com' . "\r\n";
$cabeceras .= 'Bcc: noreply@medicalsoftcolombia.com' . "\r\n";

// Enviarlo
mail($para, $subtitulo, $mensaje, $cabeceras);


if ($CitasGoogleCalendar == "Si") {
    echo "<script language='Javascript'> window.location='ApiGoogleCalendar.php?cita_id=$cita_id&ruta=2';</script>";
    echo "<script language='Javascript'> history.back();location.reload();</script>";
} else {
    echo "<script language='Javascript'> history.back();location.reload();</script>";
}
