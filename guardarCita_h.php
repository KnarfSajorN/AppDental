<?php

date_default_timezone_set('America/Bogota');
session_start();
//include '../masterFunciones.php';

include("funciones/conn3.php");

include("funciones/funciones.php");
include("funciones/funcionesUtilidades.php");

// $linkkey = $_SESSION['linkkey'];

echo "El linkey es este" . $linkkey . "<br>";

$doctor                 = $_POST['doctor'];

$fecha                  = $_POST['fecha'];

$CODI_CLIENTE           = $_POST['CODI_CLIENTE'];

$Fecha                  = $_POST['Fecha'];

$Hora                   = $_POST['Hora'];

$nombre                 = $_POST['nombre'];

$frecuencia             = $_POST['frecuencia'];

$cantidad               = $_POST['cantidad'];

$telefono               = $_POST['indicativo'] . $_POST['telefono'];

$correo                 = $_POST['correo'];

$motivoConsulta         = $_POST['motivoConsulta'];



$usuario_id             = $_POST['usuario_id'];


$idusuario                = $_POST['doctor'];



$estado                 = 1;

$registrado             = date("Y-m-d H:i:s");



$P                   = $_POST['P'];

$idCitas             = $_POST['idCitas'];

$clienteid             = $_POST['clienteId'];

$Usuario_Web = funcionMaster($clienteid, 'cliente_id', 'Usuario_Web', 'cliente');
$Clave_Web = funcionMaster($clienteid, 'cliente_id', 'Clave_Web', 'cliente');
$ID_principal = $_SESSION['ID_principal'];  // ESTA ES LA ID PRINCIPAL DEL USUARIO
$duracion             = $_POST['duracion'];
$ID_H             = $_POST['ID_H'];
if ($ID_H == '') {
  $ID_H = 0;
}

$Nuevahora = date('H:i:s', (strtotime('+ ' . $duracion . ' minute', strtotime($Hora))));



$queryListu = mysqli_query($conn3, "SELECT * FROM  usuarios where ID = $doctor");
$nrowlu = mysqli_num_rows($queryListu);
while ($rowMotorizadou = mysqli_fetch_array($queryListu)) {
  $nombreD = $rowMotorizadou['NOMBRE_USUARIO'];
  $especialidad = $rowMotorizadou['especialidad'];
  $linkGM = $rowMotorizadou['ubicacion'];
  $direccionS = $rowMotorizadou['direccion'];
}





if ($clienteid == '') {

  $clienteid = 0;
}





if ($P == 0) {

  $ConsultaTipo = 'Presencial';
} elseif ($P == 1) {

  $ConsultaTipo = 'Virtual';
}





$queryList = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = $doctor");

$nrowl = mysqli_num_rows($queryList);

while ($rowMotorizado = mysqli_fetch_array($queryList)) {





  $nombreF = $rowMotorizado['nombreF'];

  $telefonoF = $rowMotorizado['telefonoF'];

  $direccionF = $rowMotorizado['direccionF'];

  $emailF = $rowMotorizado['emailF'];



  $whatsapp = $rowMotorizado['whatsapp'];

  $LogoF           = $rowMotorizado['logoF'];



  $emailF = $rowMotorizado['emailF'];







  $sul = $rowMotorizado['sul'];

  $sum = $rowMotorizado['sum'];

  $sue = $rowMotorizado['sue'];

  $suj = $rowMotorizado['suj'];

  $suv = $rowMotorizado['suv'];

  $sus = $rowMotorizado['sus'];

  $sud = $rowMotorizado['sud'];



  if (strlen($LogoF) > 0) {

    $Logo = '<img src="'.$Base.'logos/' . $LogoF . '" height="60" width="120">';
  }
}





$dias = array('', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo');

$DiaSemana = $dias[date('N', strtotime($fecha))];





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







//      echo "2";

/*

        $chekUsuario = "SELECT * from envioEmbarcador where correo = '$correoCliente'";

        $resultChekusuario = mysql_query ($chekUsuario, $con) or die ( mysql_error());

     

        $usuarioExiste = mysql_num_rows($resultChekusuario);

         echo "3  ";  

        if($usuarioExiste>0){

          echo "4  ";

            echo "<script language='Javascript'> window.location='agregarClientes.php?msg=1';

                </script>"; 

        }

        else{

 */

//  echo "4  ";

//insetamos el usuario


$evento_googlecalendar_id_anterior="";
if ($idCitas > 0) {

  ////////////////////////////// CREACION DE TABLAS ///////////////////////////////////////////////////

  $Campo1 = mysqli_query($conn3, "show COLUMNS from citas WHERE Field = 'evento_googlecalendar_id_anterior';");
  $nrowCampo1 = mysqli_num_rows($Campo1);
  if ($nrowCampo1 == "0") {
      mysqli_query($conn3, "ALTER TABLE `citas` ADD `evento_googlecalendar_id_anterior` TEXT NULL DEFAULT '' COMMENT 'Si la cita actual fue creada por la edicion de una antigua, se cargara el evento id de esa cita inicial *Creado desde modulo de agendar cita*'");
  }
  //////////////////////////////////////////////////////////////////////////////////////////////////////
  $queryList = mysqli_query($conn3, "SELECT * FROM  citas WHERE idCitas='$idCitas'");
  while ($rowMotorizado = mysqli_fetch_array($queryList)) {
  
    $evento_googlecalendar_id_anterior = $rowMotorizado['evento_googlecalendar_id'];
  }


  //mysqli_query($conn3, "delete from citas where idCitas = $idCitas");
  mysqli_query($conn3, "UPDATE citas SET estado = '5' WHERE idCitas = $idCitas LIMIT 1");
}

$sucursal = $_POST['sucursal'];
if ($sucursal == "") {
  $sucursal = "0";
}


$Campo1 = mysqli_query($conn3, "show COLUMNS from citas WHERE Field = 'sucursal';");
$nrowCampo1 = mysqli_num_rows($Campo1);
if ($nrowCampo1 == "0") {
  mysqli_query($conn3, "ALTER TABLE `citas` ADD `sucursal` TEXT NULL DEFAULT '0' COMMENT 'Sucursal en la que fue atendido *Creado desde modulo Procedimiento*'");
}


$query = "INSERT INTO citas (doctor, fecha, Hora, nombre, telefono, correo, motivoConsulta, estado, registrado, usuario_id, tipo, idCliente,duracion,HoraF,evento_googlecalendar_id_anterior,sucursal,ID_H,ID_principal) 
VALUES ($doctor ,$fecha ,$Hora ,$nombre ,$telefono ,$correo ,$motivoConsulta ,$estado ,$registrado,$usuario_id, $P, $clienteid,$duracion,$Nuevahora,$evento_googlecalendar_id_anterior,$sucursal,$ID_H,$ID_principal);";
$enlace_actual = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$enlace_actual = str_replace('.php', '', $enlace_actual);

auditorMaster($idusuario, '1', $enlace_actual, $query);


mysqli_query($conn3, "INSERT INTO citas (doctor, fecha, Hora, nombre, telefono, correo, motivoConsulta, estado, registrado, usuario_id, tipo, 
idCliente,duracion,HoraF,evento_googlecalendar_id_anterior,sucursal,ID_H,ID_principal) 

VALUES ('$doctor' ,'$fecha' ,'$Hora' ,'$nombre' ,'$telefono' ,'$correo' ,'$motivoConsulta' ,'$estado' ,'$registrado', '$usuario_id', '$P', 
'$clienteid','$duracion','$Nuevahora','$evento_googlecalendar_id_anterior','$sucursal','$ID_H','$ID_principal')");


//consulta el id de la cita
$cita_id = mysqli_insert_id($conn3);





$queryList = mysqli_query($conn3, "SELECT max(idCitas) as idCitas FROM  citas");

$nrowl = mysqli_num_rows($queryList);

while ($rowMotorizado = mysqli_fetch_array($queryList)) {

  $idCitas = $rowMotorizado['idCitas'];
}



if($sucursal != 0){
  $queryList2 = mysqli_query($conn3, "SELECT * FROM sucursales where id = $sucursal");

  $nrowl = mysqli_num_rows($queryList2);

  while ($rowMotorizado2 = mysqli_fetch_array($queryList2)) {

    $sucursal = $rowMotorizado2['descripcion'];

    $idE = $rowMotorizado2['id'];
  }
}else{
  $queryList2 = mysqli_query($conn3, "SELECT * FROM usuarios where ID = $usuario_id");
  while ($rowMotorizado2 = mysqli_fetch_array($queryList2)) {

    $sucursal = $rowMotorizado2['direccion'];
    

    
  }
}



$queryList3 = mysqli_query($conn3, "SELECT * FROM config where ID_Usuario = $doctor");

$nrowl = mysqli_num_rows($queryList3);

while ($rowMotorizado = mysqli_fetch_array($queryList3)) {



  $CitasGoogleCalendar = $rowMotorizado['CitasGoogleCalendar'];

  $nombreF = $rowMotorizado['nombreF'];

  $telefonoF = $rowMotorizado['telefonoF'];

  $direccionF = $rowMotorizado['direccionF'];

  $emailF = $rowMotorizado['emailF'];



  $whatsapp = $rowMotorizado['whatsapp'];

  $LogoF           = $rowMotorizado['logoF'];



  $emailF = $rowMotorizado['emailF'];







  $sul = $rowMotorizado['sul'];

  $sum = $rowMotorizado['sum'];

  $sue = $rowMotorizado['sue'];

  $suj = $rowMotorizado['suj'];

  $suv = $rowMotorizado['suv'];

  $sus = $rowMotorizado['sus'];

  $sud = $rowMotorizado['sud'];



  if (strlen($LogoF) > 0) {

    $Logo = '<img src="'.$Base.'logos/' . $LogoF . '" height="60" width="120">';
  }

  
}











// insert INTO citas (idCitas, doctor, fecha, Hora, nombre, telefono, correo, motivoConsulta, estado, registrado, usuario_id, tipo, idCliente) VALUES ('936', '1' ,'2020-06-29' ,'10:15:00' ,'PRUEBA' ,'57' ,'3@2.com' ,'PRUEBA' ,'1' ,'2020-06-01 08:51:03', '1', '0', '0')



//mssql_query("insert INTO citas (idCitas, doctor, fecha, Hora, nombre, telefono, correo, motivoConsulta, estado, registrado, usuario_id, tipo, idCliente,frecuencia,cantidad) VALUES ('$idCitas', '$doctor' ,'$fecha' ,'$Hora' ,'$nombre' ,'$telefono' ,'$correo' ,'$motivoConsulta' ,'$estado' ,'$registrado', '$usuario_id', '$P', '$clienteid','$frecuencia','$cantidad')");









//echo '<script language="Javascript"> window.location="consultaCliente.php?clienteId='.echo $cliente_Id.';</script>';

/*



     $mensajeW = 'Sr(a) *'.$nombre.'* usted a agendado un cita médica con Dr(a) *'.$doctor.'* el dia *'.$fecha.'* a las *'.$Hora.'* en *'.$sucursal.'*. Si no desea recibir notificaciones puede darle de baja en cualquier momento respondiendo con la palabra NO. Atte DR ALBUJA CENTROS MEDICOS';

Whatsapp_sent($telefono, $mensajeW);

             

 



 $mensaje2 = 'Dr(a) *'.$doctor.'*  se a agendado  una cita con la paciente *'.$nombre.'*,  *'.$fecha.'* a las *'.$Hora.'* en *'.$sucursal.'*. Motivo: *'.$motivoConsulta.'* Atte ALTE Dentalsoft';

Whatsapp_sent($whatsapp, $mensaje2);



*/



if ($P == 1) {

  $mensajePago = 'por favor realizar el pago por el siguiente link ' . $Base . 'pagarcita/' . $idCitas . ' ';
}




$QueryMotivoC = mysqli_query($conn3, "SELECT * FROM  Motivos_Consulta WHERE id = $motivoConsulta ");
while ($RowMotivoC = mysqli_fetch_array($QueryMotivoC)) {
  $MotivoConsulta_Texto = str_replace(['"', "'"], '',$RowMotivoC['descripcion']);
}

$nombreD = reem_alreves($nombreD);
if ($idCitas > 0) {

  $mensajeW = 'Registro de cita Medica.

Estimado paciente *' . $nombre . '* ,Se registró una cita Medica.
  
Fecha y Hora:  *' . $fecha . '* *' . $Hora . '*  Motivo de la consulta: *' . utf8_encode($MotivoConsulta_Texto) . '*. 
  
Su consulta es con el Doctor: *' . $nombreD . '*.  
  
en *' . $direccionS . '*.

Atte. '.$nombreF.' Teléfono ' . $telefonoF . ' Correo ' . $emailF . '

Link de Registro

'.$Base.'registroPaciente_QR?id=' .encrypt($ID_principal). '

'.($linkGM <> '' ? 'Encuentranos en: '.$linkGM : '').'';


//   $mensajeW = 'Registro de cita Medica.

// Estimado paciente *' . $nombre . '* ,Se registró una cita Medica.

// Fecha y Hora:  *' . $fecha . '* *' . $Hora . '*  Motivo de la consulta:' . $motivoConsulta . '. 

// Su consulta es con el Doctor: *' . $nombreD . '*.  

// en *' . $sucursal . '*.

// Atte. *ALTE Dentalsoft* Teléfono ' . $telefonoF . ' Correo ' . $emailF . '';

  $accion = 0;

  // $linkkey = 'https://sievenwapi-medicaso.herokuapp.com/send-message/bWVkaWNhc28=';

  Whatsapp_sent_cliente($linkkey, $telefono, $mensajeW, $cliente_id, $usuario_id, $whatsapp, $accion);



  $mensaje2 = ' *' . funcionMaster($doctor, 'ID', 'NOMBRE_USUARIO', 'usuarios') . '* la cita Ha sido agendada con la paciente *' . $nombre . '*,  *' . $fecha . '* a las *' . $Hora . '* en *' . $sucursal . '*. Motivo: *' . $motivoConsulta . '* Atte ALTE Dentalsoft';



  //Whatsapp_sent($whatsapp, $mensaje2);
} else {



  $mensajeW = '* Registro de cita Medica.* 



Estimado paciente *' . $nombre . '*, Se registró una cita Medica. 

Fecha y Hora: *' . $fecha . '*  *' . $Hora . '*.

Motivo de la consulta: ' . utf8_decode($motivoConsulta) . ' *.

Su consulta es con el Doctor: *' . $nombreD . '*.  

en *' . $direccionS . '*.

Atte. *' . $nombreF . '* Teléfono ' . $telefonoF . ' Correo ' . $emailF . '

'.($linkGM <> '' ? 'Encuentranos en: '.$linkGM : '').'';

  $accion = 0;

  Whatsapp_sent_cliente($linkkey, $telefono, $mensajeW, $cliente_id, $usuario_id, $whatsapp, $accion);

  $mensaje2 = '*' . $doctor . '*  se ha agendado  una cita con la paciente *' . $nombre . '*,  *' . $fecha . '* a las *' . $Hora . '* en *' . $sucursal . '*. Motivo: *' . $motivoConsulta . '* Atte ALTE Dentalsoft';

  //Whatsapp_sent($whatsapp, $mensaje2);
  
}


$_GET['receptor'] = $correo;
$_GET['asunto'] = "Cita Medica ";
$_GET['mensaje'] = $mensajeW;
include 'plantillaCorreo.php';






$para = "$correo";



// título

$titulo = 'Cita médica agendada-' . $ConsultaTipo;



// mensaje

$mensaje .= '

<html>

<head>

  <title>



Registro de cita VirtualMedic <br> Doctor ' . $doctor . ' .;.</title>

    <table width="100%" height="466" border="0">

  <tr>

    <td><table width="100%" height="75" border="0">

      

    </table>

      <table width="100%" height="143" border="0">

        <tr>

          <td height="139" bgcolor="#00A74B"><table width="100%" height="62" border="0">

            <tr>

              <td width="5%">&nbsp;</td>

              <td width="72%" style="color:#FFF;"><h2><strong>

Registro de cita VirtualMedic <br>

 ' . funcionMaster($doctor, 'ID', 'NOMBRE_USUARIO', 'usuarios') . ' </strong></h2></td>

              <td width="23%">&nbsp;</td>

            </tr>

          </table></td>

        </tr>

      </table>

      <table width="100%" height="122" border="0">

        <tr>

          <td width="10%">&nbsp;</td>

          <td width="80%"><p>Estimado paciente:</p>

            <p>Se registro una cita Medica ' . $ConsultaTipo . '<br />

              ';

$mensaje .=  "<h1 align='center'>Fecha y hora: $fecha - $Hora </h1>";

$mensaje .=  "<h1 align='center'>Paciente: $nombre </h1>";

$mensaje .=  "<h1 align='center'>Telefono: $telefono </h1>";

$mensaje .=  "<h1 align='center'>Correo: $correo </h1>";

$mensaje .=  "<h1 align='center'>Motivo consulta: $motivoConsulta </h1>";

$mensaje .=  "<h1 align='center'>Su consulta es con $nombreD</h1>";

$mensaje .=  "<h1 align='center'>En $direccionS</h1>";

$mensaje .=  "<h5 align='center'>$nombreF <br> Telefono: $telefonoF <br>Dirección:  $direccionF </h5>";

$mensaje .=  "<h5 align='center'> '$Logo' </h5>";





$mensaje .=  '<br></br>

          

          <td width="10%">&nbsp;</td>

        </tr>

    </table>

      <table width="100%" border="0">

        <tr>

          <td height="21" bgcolor="#00A74B">&nbsp;</td>

        </tr>

      </table>

      <table width="100%" height="64" border="0">

        <tr>

          <td height="60">Este correo electronico no puede recibir respuestas.<br />

         </td>

        </tr>

    </table>



    </td>

  </tr>

</table>

</head>

<body>



</body>

</html>

';



// Para enviar un correo HTML, debe establecerse la cabecera Content-type

$cabeceras  = 'MIME-Version: 1.0' . "\r\n";

$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";



// Cabeceras adicionales

$cabeceras .= 'To: Dentalsoft <noreply@dentalsoftcolombia.com>' . "\r\n";

$cabeceras .= 'From: Cita médica agendada -' . $ConsultaTipo . ' <noreply@dentalsoftcolombia.com>' . "\r\n";

$cabeceras .= 'Cc: noreply@dentalsoftcolombia.com' . "\r\n";

$cabeceras .= 'Bcc: noreply@dentalsoftcolombia.com' . "\r\n";


mail($para, $titulo, $mensaje, $cabeceras);
// Enviarlo


// if ($motivoConsulta == "pruebaPlantilla") {
//   $diasEspañol = array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");
//   setlocale(LC_ALL, "es_ES@euro", "es_ES", "esp");
//   $diaTexto = Date("w", strtotime($fecha));
//   $FechaH = strftime("{$diasEspañol[$diaTexto]}, %d de %B de %Y", strtotime($fecha));
//   $HoraM = Date("h:i a", strtotime($Hora));
//   $medico = funcionMaster($doctor, 'ID', 'NOMBRE_USUARIO', 'usuarios');
//   // PRUEBAS
//   $para = "blancojhoendry@gmail.com";
//   // título
//   $titulo = 'Cita médica agendada-' . $ConsultaTipo;
//   $mensaje .=  "<html>";
//   $mensaje .=  "  <head>";
//   $mensaje .=  "    <title>Cita médica agendada</title>";
//   $mensaje .=  "  </head>";
//   $mensaje .=  "  <body style='margin:0;padding:0;'>";
//   $mensaje .=  "  <table role='presentation' style='width:600px;border-collapse:collapse;border:1px solid #cccccc;border-spacing:0;text-align:left; margin: auto;'>";
//   $mensaje .=  "      <tr>";
//   $mensaje .=  "          <td align='center' style='padding:10px 0 10px 0;' colspan='2'>";
//   $mensaje .=  "              <img src=''.$Base.'logos/{$LogoF}' alt='Logo' style='width: auto; max-height: 100px; display:block;'>";
//   $mensaje .=  "          </td>";
//   $mensaje .=  "      </tr>";
//   $mensaje .=  "      <tr style='background-color: #00A74B;'>";
//   $mensaje .=  "          <td style='width: 5%;padding:20px 0;text-align:center;' align='center'>";
//   $mensaje .=  "              <img src=''.$Base.'webPro/assets/img/agenda.png' align='center' alt='Logo' style='width: auto; max-height: 50px; display:block; margin: auto;'>";
//   $mensaje .=  "          </td>";
//   $mensaje .=  "          <td style='width: 95%;padding:20px 0;text-align:left; font-size: 1.2em;'>";
//   $mensaje .=  "              <b>Se registro una cita Medica {$ConsultaTipo}</b";
//   $mensaje .=  "          </td>";
//   $mensaje .=  "      </tr>";
//   $mensaje .=  "      <tr>";
//   $mensaje .=  "          <td style='padding:10px 20px;text-align:left;' colspan='2'>";
//   $mensaje .=  "              Estimad@ <b>{$nombre}</b>,\nTiene una nueva Cita.";
//   $mensaje .=  "          </td>";
//   $mensaje .=  "      </tr>";
//   $mensaje .=  "      <tr>";
//   $mensaje .=  "          <td style='padding:10px 20px;text-align:left; color: #00A74B' colspan='2'>";
//   $mensaje .=  "              <b>Datos de la Cita</b>";
//   $mensaje .=  "          </td>";
//   $mensaje .=  "      </tr>";
//   $mensaje .=  "      <tr>";
//   $mensaje .=  "          <td style='padding:10px 20px;text-align:left;' colspan='2'>";
//   $mensaje .=  "              <b>Telefono:</b> {$telefono}";
//   $mensaje .=  "          </td>";
//   $mensaje .=  "      </tr>";
//   $mensaje .=  "      <tr>";
//   $mensaje .=  "          <td style='padding:10px 20px;text-align:left;' colspan='2'>";
//   $mensaje .=  "              <b>Correo:</b> {$correo}";
//   $mensaje .=  "          </td>";
//   $mensaje .=  "      </tr>";
//   $mensaje .=  "      <tr>";
//   $mensaje .=  "          <td style='padding:10px 20px;text-align:left;' colspan='2'>";
//   $mensaje .=  "              <b>Motivo consulta:</b> {$motivoConsulta}";
//   $mensaje .=  "          </td>";
//   $mensaje .=  "      </tr>";
//   $mensaje .=  "      <tr>";
//   $mensaje .=  "          <td style='padding:10px 20px;text-align:left;' colspan='2'>";
//   $mensaje .=  "              <b>En:</b> {$sucursal}";
//   $mensaje .=  "          </td>";
//   $mensaje .=  "      </tr>";
//   $mensaje .=  "      <tr>";
//   $mensaje .=  "          <td style='padding:10px 20px;text-align:left;' colspan='2'>";
//   $mensaje .=  "              <b>Medico:</b> {$medico}";
//   $mensaje .=  "          </td>";
//   $mensaje .=  "      </tr>";
//   $mensaje .=  "      <tr>";
//   $mensaje .=  "          <td style='padding:10px 20px;text-align:left;' colspan='2'>";
//   $mensaje .=  "              <b>Fecha:</b> {$FechaH}";
//   $mensaje .=  "          </td>";
//   $mensaje .=  "      </tr>";
//   $mensaje .=  "      <tr>";
//   $mensaje .=  "          <td style='padding:10px 20px;text-align:left;' colspan='2'>";
//   $mensaje .=  "              <b>Hora:</b> {$HoraM}";
//   $mensaje .=  "          </td>";
//   $mensaje .=  "      </tr>";
//   // $mensaje .=  "      <tr>";
//   // $mensaje .=  "          <td style='width: 50%; padding:10px 20px; text-align:center;' align='center'>";
//   // $mensaje .=  "              <a href=''.$Base.'webPro/ProgramarCitas/{$queryListhc['idCitas']}/{$catalogo['direccionWeb']}' target='blank_' name='boton_confirmacion' style='display:block; width: 100%; text-align: center; border-radius: 5px; text-decoration: none; color:#fff; padding: 0.5em; border: none;box-shadow: 0px 0px 5px 1px black; background: #00A74B;' align='center' value='Reprogramar'>REPROGRAMAR</a>";
//   // $mensaje .=  "          </td>";
//   // $mensaje .=  "          <td style='width: 50%; padding:10px 20px; text-align:center;' align='center'>";
//   // $mensaje .=  "              <a href=''.$Base.'webPro/ConfirmacionCita/{$queryListhc['idCitas']}/{$catalogo['direccionWeb']}' target='blank_' name='boton_confirmacion' style='display:block; width: 100%; text-align: center; border-radius: 5px; text-decoration: none; color:#fff; padding: 0.5em; border: none;box-shadow: 0px 0px 5px 1px black; background: #9e9e9e;' align='center' value='Cancelar'>CANCELAR</a>";
//   // $mensaje .=  "          </td>";
//   // $mensaje .=  "      </tr>";
//   $mensaje .=  "  </table>";
//   $mensaje .=  "  </body>";
//   $mensaje .=  "</html>";


//   // Para enviar un correo HTML, debe establecerse la cabecera Content-type

//   $cabeceras  = 'MIME-Version: 1.0' . "\r\n";

//   $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";



//   // Cabeceras adicionales

//   $cabeceras .= 'To: Dentalsoft <noreply@dentalsoftcolombia.com>' . "\r\n";

//   $cabeceras .= 'From: Cita médica agendada -' . $ConsultaTipo . ' <noreply@dentalsoftcolombia.com>' . "\r\n";

//   $cabeceras .= 'Cc: noreply@dentalsoftcolombia.com' . "\r\n";

//   $cabeceras .= 'Bcc: noreply@dentalsoftcolombia.com' . "\r\n";

//   // Enviarlo

//   mail($para, $titulo, $mensaje, $cabeceras);
//   exit();
// } else {
// }

// PRUEBAS





/*
if ($P == 1) {
  echo "<script language='Javascript'> window.location='agregarCitas?msg=1';</script>";
}
else {
  echo "<script language='Javascript'> window.location='agregarCitas?msg=1';</script>"; 
}
*/

if ($CitasGoogleCalendar == "Si") {
  echo "<script language='Javascript'> window.location='ApiGoogleCalendar.php?cita_id=$cita_id&ruta=1';</script>";
}elseif ($ID_H == 1) {
  echo "<script language='Javascript'> window.location='Historial_Clinico.php?cI=".encrypt($clienteid)."';</script>";
}
else {
  echo "<script language='Javascript'> window.location='agregarCitas?msg=Se creo la cita';</script>";
}
