<?php
date_default_timezone_set('America/Bogota');
//include("conexiones/conexion.php");
include("funciones/funciones.php");
$usuario_id = base64_decode($_GET['idu']);
$cliente_id = base64_decode($_GET['clienteId']);
$idsNotas = $_GET['idsNotas'];
//$con = conectar();

$queryListu = mysqli_query($conn3, "SELECT * FROM  usuarios where ID= $usuario_id");
$nrowlu = mysqli_num_rows($queryListu);
while ($rowMotorizadou = mysqli_fetch_array($queryListu)) {
  $doctor = $rowMotorizadou['ID'];
  $nombreD = $rowMotorizadou['NOMBRE_USUARIO'];
  $especialidad = $rowMotorizadou['especialidad'];
}

$queryListu = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id= $cliente_id");
$nrowlu = mysqli_num_rows($queryListu);
while ($rowMotorizadou = mysqli_fetch_array($queryListu)) {
  $whatsapp = $rowMotorizadou['whatsapp'];
  $nombreC = $rowMotorizadou['nombre_cliente'];
  $correo = $rowMotorizadou['correo_cliente'];
}
echo $whatsapp;

$queryList = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario='$usuario_id'");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {


  $nombreF = $rowMotorizado['nombreF'];
  $telefonoF = $rowMotorizado['telefonoF'];
  $direccionF = $rowMotorizado['direccionF'];
  $emailF = $rowMotorizado['emailF'];

  // $whatsapp = $rowMotorizado['whatsapp'];

  // echo '$whatsapp' . $whatsapp;
  $LogoF           = $rowMotorizado['logoF'];

  $emailF = $rowMotorizado['emailF'];



  $sul = $rowMotorizado['sul'];
  $sum = $rowMotorizado['sum'];
  $sue = $rowMotorizado['sue'];
  $suj = $rowMotorizado['suj'];
  $suv = $rowMotorizado['suv'];
  $sus = $rowMotorizado['sus'];
  $sud = $rowMotorizado['sud'];

  if (strlen($LogoF) > 0) 
              {
                 $Logo = '<img src="'.$Base.'/logos/'.$LogoF.'" height="100" width="100%">';
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

// insert INTO citas (idCitas, doctor, fecha, Hora, nombre, telefono, correo, motivoConsulta, estado, registrado, usuario_id, tipo, idCliente) VALUES ('936', '1' ,'2020-06-29' ,'10:15:00' ,'PRUEBA' ,'57' ,'3@2.com' ,'PRUEBA' ,'1' ,'2020-06-01 08:51:03', '1', '0', '0')

/*mssql_query("insert INTO citas (idCitas, doctor, fecha, Hora, nombre, telefono, correo, motivoConsulta, origenPaciente, costoConsulta, empresa, comentarios, estado, registrado, usuario_id, tipo, idCliente) 
VALUES ('$idCitas', '$doctor' ,'$fecha' ,'$Hora' ,'$nombre' ,'$telefono' ,'$correo' ,'$motivoConsulta' , '$origenPaciente', '$costoConsulta', '$empresa', '$comentarios', '$estado' ,'$registrado', '$usuario_id', '$P', '$clienteid')");*/




//echo '<script language="Javascript"> window.location="consultaCliente.php?clienteId='.echo $cliente_Id.';</script>';
/*

     $mensajeW = 'Sr(a) *'.$nombre.'* usted a agendado un cita médica con Dr(a) *'.$doctor.'* el dia *'.$fecha.'* a las *'.$Hora.'* en *'.$sucursal.'*. Si no desea recibir notificaciones puede darle de baja en cualquier momento respondiendo con la palabra NO. Atte DR ALBUJA CENTROS MEDICOS';
Whatsapp_sent($telefono, $mensajeW);

 $mensaje2 = 'Dr(a) *'.$doctor.'*  se a agendado  una cita con la paciente *'.$nombre.'*,  *'.$fecha.'* a las *'.$Hora.'* en *'.$sucursal.'*. Motivo: *'.$motivoConsulta.'* Atte ALTE MedicalSoft';
Whatsapp_sent($whatsapp, $mensaje2);

*/

if ($idsNotas) {
  $mensajeW = 'Estimado paciente *' . $nombreC . '*, Se le adjunta el registro de Notas de Enfermeria '.$Base.'/imprimirNotaEnfermeria.php?clienteId=' . base64_encode($cliente_id) . '&idu=' . base64_encode($usuario_id) . '&idsNotas=' . $idsNotas . ' . Por favor no responder este mensaje, si tiene dudas o inquietudes comuniquese al Teléfono ' . $telefonoF . ' Correo ' . $emailF . ', Atte. *' . $nombreF . '*';
  $accion = 0;
  Whatsapp_sent_cliente($linkkey, $whatsapp, $mensajeW, $cliente_id, $usuario_id, $whatsapp, $accion);
  Whatsapp_sent($linkkey, $whatsapp, $mensaje2);
  //////////////////////////////

  $para = "$correo";

  // título
  $titulo = 'Nota de Enfermeria';

  // mensaje
  $mensaje .= '
<html>
<head>
  <title>Nota/s de Enfermeria</title>
    <table width="100%" height="466" border="0">
  <tr>
    <td><table width="100%" height="75" border="0">
    </table>
      <table width="100%" height="143" border="0">
        <tr>
          <td height="139" bgcolor="#00A74B"><table width="100%" height="62" border="0">
            <tr>
              <td width="5%">&nbsp;</td>
              <td width="72%" style="color:#FFF;">
                <h2>
                  <strong>
                    Un cordial saludo de parte de: <br> ' . funcionMaster($doctor, 'ID', 'NOMBRE_USUARIO', 'usuarios') . ' 
                  </strong>
                </h2>
              </td>
              <td width="23%">&nbsp;</td>
            </tr>
          </table></td>
        </tr>
      </table>
      <table width="100%" height="122" border="0">
        <tr>
          <td width="10%">&nbsp;</td>
          <td width="80%"><p>Estimado paciente: ' . $nombreC . '</p><br />';
  $mensaje .=  "<h1 align='center'>Se le adjunta el registro de Notas de Enfermeria</h1>";
  $mensaje .=  "<h1 align='center'>'{$Base}/imprimirNotaEnfermeria.php?clienteId=" . base64_encode($cliente_id) . "&idu=" . base64_encode($usuario_id) . "&idsNotas=" . $idsNotas . "</h1>";
  $mensaje .=  "<h1 align='center'>Si tiene dudas o inquietudes comuniquese por...</h1>";
  $mensaje .=  "<h1 align='center'>Teléfono: $telefonoF, Correo: $emailF</h1>";
  $mensaje .=  "<h1 align='center'>Atte. $nombreF</h1>";

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
  $cabeceras .= 'To: DentalSoft <noreply@dentalsoftcolombia.com>' . "\r\n";
  $cabeceras .= 'From: <noreply@dentalsoftcolombia.com>' . "\r\n";
  $cabeceras .= 'Cc: noreply@dentalsoftcolombia.com' . "\r\n";
  $cabeceras .= 'Bcc: noreply@dentalsoftcolombia.com' . "\r\n";

  // Enviarlo
  mail($para, $titulo, $mensaje, $cabeceras);


  echo "<script type='text/javascript'>window.location.replace('notaEnfermeria.php?clienteId=" . base64_encode($cliente_id) . "');</script>";
}


// if ($idCitas > 0) {

//   $mensajeW = 'Registro de cita Medica.
// Estimado paciente *' . $nombre . '* ,Se registró una cita Medica.
// Fecha y Hora:  *' . $fecha . '* *' . $Hora . '*  Motivo de la consulta:' . $motivoConsulta . '.
// Comentario: *' . $comentarios . '* Por favor no responder este mensaje, si tiene dudas o inquidudes comuniquese al Teléfono ' . $telefonoF . ' Correo ' . $emailF . ', NAP: ' . $wppempresa . ', Atte. *' . $nombreF . '*  su consulta es con ' . funcionMaster($doctor, 'ID', 'NOMBRE_USUARIO', 'usuarios') . '. Por favor revisar el sigpuiente Manual: ' . $correoempresa;
//   $accion = 0;
//   Whatsapp_sent_cliente($linkkey, $telefono, $mensajeW, $cliente_id, $usuario_id, $whatsapp, $accion);

//   $mensaje2 = ' *' . funcionMaster($doctor, 'ID', 'NOMBRE_USUARIO', 'usuarios') . '* la cita ha sido agendada con la paciente *' . $nombre . '*,  *' . $fecha . '* a las *' . $Hora . '* en *' . $sucursal . '*. Motivo: *' . $motivoConsulta . '*. Direccion: *' . $origenPaciente . '*. Empresa del Paciente: *' . $empresa . '*. Numero del paciente: *' . $whatsapp . '*. Costo de la consulta: *' . $costoConsulta . '*, NAP: ' . $wppempresa . ', Atte ALTE MedicalSoft';

//   Whatsapp_sent($linkkey, $whatsapp, $mensaje2);
// } else {

//   $mensajeW = 'Registro de cita Medica.
// Estimado paciente *' . $nombre . '* ,Se registró una cita Medica.
// Fecha y Hora:  *' . $fecha . '* *' . $Hora . '*  Motivo de la consulta:' . $motivoConsulta . '.
// Comentario: *' . $comentarios . '* Por favor no responder este mensaje, si tiene dudas o inquidudes comuniquese al Teléfono ' . $telefonoF . ' Correo ' . $emailF . ', NAP: ' . $wppempresa . ' Atte. *' . $nombreF . '*  su consulta es con ' . $especialidad . '.';

//   $accion = 0;
//   Whatsapp_sent_cliente($linkkey, $telefono, $mensajeW, $cliente_id, $usuario_id, $whatsapp, $accion);






//   $mensaje2 = '*' . $doctor . '*  se ha agendado  una cita con la paciente *' . $nombre . '*,  *' . $fecha . '* a las *' . $Hora . '* en *' . $sucursal . '*. Motivo: *' . $motivoConsulta . '*. Direccion: *' . $origenPaciente . '*. Empresa del Paciente: *' . $empresa . '*. Costo de la consulta: *' . $costoConsulta . '*Numero del paciente: *' . $whatsapp . '*. Atte ALTE MedicalSoft';
//   Whatsapp_sent($linkkey, $whatsapp, $mensaje2);
// }


// if ($idCitas > 0) {

//   $mensajeW = 'Registro de cita Medica.
// Estimada Empresa *' . $empresa . '* ,Se registró una cita Medica de *' . $nombre . '*.
// Fecha y Hora:  *' . $fecha . '* *' . $Hora . '*  Motivo de la consulta:' . $motivoConsulta . '.
// Atte. *' . $nombreF . '* Teléfono ' . $telefonoF . ' Correo ' . $emailF . ', su consulta es con ' . $nombreF . '  Esta notificacion tambien le ha sido entregada al paciente anteriomente mencionando.';
//   $accion = 0;
//   Whatsapp_sent_cliente($linkkey, $wppempresa, $mensajeW, $cliente_id, $usuario_id, $whatsapp, $accion);
// }



// $para2 = "$correoempresa";

// // título
// $titulo2 = 'Cita médica agendada-' . $ConsultaTipo;

// // mensaje
// $mensaje3 .= '
// <html>
// <head>
//   <title>
// Estimada empresa <br> Doctor ' . $empresa . ' .;.</title>
//     <table width="100%" height="466" border="0">
//   <tr>
//     <td><table width="100%" height="75" border="0">

//     </table>
//       <table width="100%" height="143" border="0">
//         <tr>
//           <td height="139" bgcolor="#00A74B"><table width="100%" height="62" border="0">
//             <tr>
//             <td width="5%">&nbsp;</td>
//               <td width="72%" style="color:#FFF;">
//                 <h2>
//                   <strong>
//                       Registro de cita<br> ' . funcionMaster($doctor, 'ID', 'NOMBRE_USUARIO', 'usuarios') . ' 
//                   </strong>
//                 </h2>
//               </td>
//               <td width="23%">&nbsp;</td>
//             </tr>
//           </table></td>
//         </tr>
//       </table>
//       <table width="100%" height="122" border="0">
//         <tr>
//           <td width="10%">&nbsp;</td>
//           <td width="80%"><p>Estimada empresa:' . $empresa . '</p>
//             <p>Se registro una cita Medica ' . $ConsultaTipo . '<br />
//               ';
// $mensaje3 .=  "<h1 align='center'>Fecha y hora: $fecha - $Hora </h1>";
// $mensaje3 .=  "<h1 align='center'>Paciente: $nombre </h1>";
// $mensaje3 .=  "<h1 align='center'>Telefono: $telefono </h1>";
// $mensaje3 .=  "<h1 align='center'>Por favor verificar el siguiente Manual: $correoempresa </h1>";
// $mensaje3 .=  "<h1 align='center'>Motivo consulta: $motivoConsulta </h1>";
// $mensaje3 .=  "<h1 align='center'>Esta notificacion tambien le ha sido entregada al paciente anteriomente mencionando</h1>";
// $mensaje3 .=  "<h5 align='center'>$nombreF <br> Telefono: $telefonoF <br>Dirección:  $direccionF </h5>";
// $mensaje3 .=  "<h5 align='center'> '$Logo' </h5>";



// $mensaje3 .=  '<br></br>

//           <td width="10%">&nbsp;</td>
//         </tr>
//     </table>
//       <table width="100%" border="0">
//         <tr>
//           <td height="21" bgcolor="#00A74B">&nbsp;</td>
//         </tr>
//       </table>
//       <table width="100%" height="64" border="0">
//         <tr>
//           <td height="60">Este correo electronico no puede recibir respuestas.<br />
//           </td>
//         </tr>
//     </table>

//     </td>
//   </tr>
// </table>
// </head>
// <body>

// </body>
// </html>
// ';

// // Para enviar un correo HTML, debe establecerse la cabecera Content-type
// $cabeceras2  = 'MIME-Version: 1.0' . "\r\n";
// $cabeceras2 .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// // Cabeceras adicionales
// $cabeceras2 .= 'To: MedicalSoft <noreply@medicalsoftcolombia.com>' . "\r\n";
// $cabeceras2 .= 'From: Cita médica agendada -' . $ConsultaTipo . ' <noreply@medicalsoftcolombia.com>' . "\r\n";
// $cabeceras2 .= 'Cc: noreply@medicalsoftcolombia.com' . "\r\n";
// $cabeceras2 .= 'Bcc: noreply@medicalsoftcolombia.com' . "\r\n";

// // Enviarlo
// mail($para2, $titulo2, $mensaje3, $cabeceras2);


// if ($P == 1) {

//   echo "<script language='Javascript'> 
//   window.location='consentimiento.php?clienteId=$clienteid';
//   </script>";
// } else {


// }
