<?php
date_default_timezone_set('America/Bogota');
include("funciones/conn3.php");
include("funciones/funciones.php");


$historiaClinica1 = $_GET['historiaClinica'];
$queryList = mysqli_query($conn3, "SELECT * FROM  conceptolaboral where id = $historiaClinica1");
if ($queryList) {
  while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $cliente_id = $rowMotorizado['cliente_id'];
  }
}

if($historiaClinica1=="" || $_GET['historiaClinicaocupacional']!=""){
  $historiaClinicaocupacional = $_GET['historiaClinicaocupacional'];

  $queryList = mysqli_query($conn3, "SELECT * FROM  historiaclinica6_labora where ID = $historiaClinicaocupacional");
  if ($queryList) {
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $cliente_id = $rowMotorizado['cliente_id'];
    }
  }
  

}

$queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id=$cliente_id");
if ($queryList) {
  while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $empresaAfiliada_id = $rowMotorizado['idEmpresa'];
  }
}


$queryList = mysqli_query($conn3, "SELECT * FROM  empresasAfiliadas where id=$empresaAfiliada_id");
if ($queryList) {
  while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $telefonoEmpresa = $rowMotorizado['telefonoEmpresa'];
  }
}



$queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id = $cliente_id");
// echo "SELECT * FROM  cliente where cliente_id=$clienteId";
// $nrowl = mysqli_num_rows($queryList);
if ($queryList) {
  while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $cliente_id = $rowMotorizado['cliente_id'];
    $usuario_id = $rowMotorizado['usuario_id'];
    $nombre_cliente = $rowMotorizado['nombre_cliente'];
    $celular_cliente = $rowMotorizado['celular_cliente'];
    $ciudad_cliente = $rowMotorizado['ciudad_cliente'];
    $correo = $rowMotorizado['correo_cliente'];
    $CODI_CLIENTE = $rowMotorizado['CODI_CLIENTE'];
    $tipo_cliente = $rowMotorizado['tipo_cliente'];
    $fechar = $rowMotorizado['fechar'];
    $fecha_actualizado = $rowMotorizado['fecha_actualizado'];
    $activo = $rowMotorizado['activo'];
    $genero = $rowMotorizado['genero'];
    $direccion_cliente = $rowMotorizado['direccion_cliente'];
    $telefono_cliente = $rowMotorizado['telefono_cliente'];
    $edad_cliente = $rowMotorizado['edad_cliente'];
    $profesion_cliente = $rowMotorizado['profesion_cliente'];
    $acompananteFamiliar = $rowMotorizado['acompananteFamiliar'];
    $telefono_acompanante = $rowMotorizado['telefono_acompanante'];
    $parentesco_acompanante = $rowMotorizado['parentesco_acompanante'];
    $antecedentes = $rowMotorizado['antecedentes'];
    $entidadSalud = $rowMotorizado['entidadSalud'];
    $seguro = $rowMotorizado['seguro'];
    $nota = $rowMotorizado['nota'];
    $alergias = $rowMotorizado['alergias'];
    $tiposSangre = $rowMotorizado['tiposSangre'];
    $esDonante = $rowMotorizado['esDonante'];
    $tomaMedicamento = $rowMotorizado['tomaMedicamento'];
    $enfermedadesPequeno = $rowMotorizado['enfermedadesPequeno'];
    $fotoperfil = $rowMotorizado['fotoperfil'];
    $motivoConsulta = $rowMotorizado['motivoConsulta'];
    $fechaNacimiento = $rowMotorizado['fechaNacimiento'];
    $peso = $rowMotorizado['peso'];
    $altura = $rowMotorizado['altura'];
    $imc = $rowMotorizado['imc'];
    $ComposicionCorporal = $rowMotorizado['ComposicionCorporal'];
    $ap1 = $rowMotorizado['ap1'];
    $ap2 = $rowMotorizado['ap2'];
    $ap3 = $rowMotorizado['ap3'];
    $ap4 = $rowMotorizado['ap4'];
    $ap5 = $rowMotorizado['ap5'];
    $ap6 = $rowMotorizado['ap6'];
    $ap7 = $rowMotorizado['ap7'];
    $ap8 = $rowMotorizado['ap8'];
    $ap9 = $rowMotorizado['ap9'];
    $cirugiasCuales = $rowMotorizado['cirugiasCuales'];
    $cirugiasOtros = $rowMotorizado['cirugiasOtros'];
    $whatsapp = $rowMotorizado['whatsapp'];
    $tipoUsuario = $rowMotorizado['tipoUsuario'];
    $estado = $rowMotorizado['estado'];
    $sucursal = $rowMotorizado['sucursal'];
    $ocupacion = $rowMotorizado['ocupacion'];
    $wts2 = $rowMotorizado['wts2'];
    $wts3 = $rowMotorizado['wts3'];
    echo $correoEmpresa = funcionMaster($rowMotorizado['idEmpresa'], 'id', 'correoContactoEmpresa', 'empresasAfiliadas');
}
}


$queryList = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = $usuarioId");
// $nrowl = mysqli_num_rows($queryList);
if ($queryList) {
  while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $moneda = $rowMotorizado['moneda'];
    $impuestoF = $rowMotorizado['impuestoF'];

    $nombreF      = $rowMotorizado['nombreF'];
    $telefonoF    = $rowMotorizado['telefonoF'];
    $direccionF   = $rowMotorizado['direccionF'];
    $emailF       = $rowMotorizado['emailF'];
    $ciudadPaisF  = $rowMotorizado['ciudadPaisF'];
    $licenciaF    = $rowMotorizado['licenciaF'];
    $pieF         = $rowMotorizado['pieF'];
    $header       = $rowMotorizado['header'];

    $LogoF        = $rowMotorizado['logoF'];
    $firma        = $rowMotorizado['firma'];

    if (strlen($LogoF) > 0) {
        $Logo = '<img src="'.$Base.'logos/' . $LogoF . '" height="150px" width="150px" >';
    }
    // Nuevos campos 
}
}

echo $telefonoEmpresa;
if ($_GET['modo'] == "certificadoOcupacionalPaciente") {
    $mensajeW = 'Sr(a) ' . $nombre_cliente . ' Para visualizar su Certificado Ocupacional haga Click Aqui: '.$Base.'SO_Imprimir_Historia?historiaClinica1=' . $historiaClinica1 ;
    $accion = 0;
    Whatsapp_sent_cliente($linkkey, $whatsapp, $mensajeW, $cliente_id, $usuario_id, $whatsapp, $accion);
    $para = "$correo";
    // título
    $titulo = 'Certificado Ocupacional';
    $mensajeLink = "Para visualizar el certificado generado por favor Haga Click Aqui:<br> '.$Base.'SO_Imprimir_Historia?historiaClinica1=" . $historiaClinica1 ;
} else if ($_GET['modo'] == "certificadoOcupacionalEmpresa") {
    $para = "$correoEmpresa";
    // título
    $titulo = 'Certificado Ocupacional';
    $mensajeLink = "Para visualizar el certificado generado por favor Haga Click Aqui:<br> '.$Base.'SO_Imprimir_Historia?historiaClinica1=" . $historiaClinica1 ;
    $mensajeLink1 = "Se Envia Para visualizar el certificado de {$nombre_cliente}  que ya fue generado. por favor Haga Click Aqui: {$Base}SO_Imprimir_Historia?historiaClinica1=" . $historiaClinica1 ;
    $accion = 0;
    Whatsapp_sent_cliente($linkkey, $telefonoEmpresa, $mensajeLink1, $cliente_id, $usuario_id, $telefonoEmpresa, $accion);
}elseif ($_GET['modo'] == "historiaOcupacional") {
  $mensajeW = 'Sr(a) ' . $nombre_cliente . ' Para visualizar su Historia Ocupacional haga Click Aqui: '.$Base.'certificadolaboral/' . $historiaClinicaocupacional ;
  $accion = 0;
  Whatsapp_sent_cliente($linkkey, $whatsapp, $mensajeW, $cliente_id, $usuario_id, $whatsapp, $accion);
  $para = "$correo";
  // título
  $titulo = 'Historia Ocupacional';
  $mensajeLink = "Para visualizar la historia ocupacional generada por favor Haga Click Aqui:<br> '.$Base.'certificadolaboral/" . $historiaClinica1 ;
}


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
Documento Generado para el Paciente <br>
' . $nombre_cliente . ' </strong></h2></td>
              <td width="23%">&nbsp;</td>
            </tr>
          </table></td>
        </tr>
      </table>
      <table width="100%" height="122" border="0">
        <tr>
          <td width="10%">&nbsp;</td>
          <td width="80%">';
$mensaje .=  "<h3 align='center'>" . $mensajeLink . "</h3>";
$mensaje .=  "<h4 align='center'> '$Logo' </h4>";
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
$cabeceras .= 'To: MedicalSoft <noreply@medicalsoftcolombia.com>' . "\r\n";
$cabeceras .= 'From: Documento Ocupacional Generado por ' . $nombreF . ' <noreply@medicalsoftcolombia.com>' . "\r\n";
$cabeceras .= 'Cc: noreply@medicalsoftcolombia.com' . "\r\n";
$cabeceras .= 'Bcc: noreply@medicalsoftcolombia.com' . "\r\n";

// Enviarlo
mail($para, $titulo, $mensaje, $cabeceras);

echo "<script language='Javascript'>window.history.back();</script>";
