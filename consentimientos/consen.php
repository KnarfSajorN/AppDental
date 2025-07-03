<?php
 
include '../funciones/seguridad.php';
include '../funciones/funciones.php';
include '../funciones/funcionesUtilidades.php';
include '../config.php';


    date_default_timezone_set('America/Bogota');
    include("conexiones/conexion.php");
    $con=conectar();
 
        $registro              = $_POST['registro'];          
        $ID                    = $_POST['ID'];          
        $clienteId             = $_POST['clienteId'];          
       
        $motivoConsulta        = reem($_POST['motivoConsulta']);      
        $motivo                = reem($_POST['motivo']);      
        $diagnostico           = reem($_POST['diagnostico']); 
        $NOMBRE_USUARIO        = reem($_POST['NOMBRE_USUARIO']); 
        $tratamiento           = reem($_POST['tratamiento']);
 
        $fechar                = date("Y-m-d");
        $Afechar               = date("Y-m-d H:i:s");
        $hora                  = date("H:i:s");
        


 
        $queryList=mysqli_query($conn3,"SELECT * FROM  config where ID_Usuario=$ID");
        $nrowl=mysqli_num_rows($queryList);
        while($rowMotorizado=mysqli_fetch_array($queryList))
        {
            $whatsapp = $rowMotorizado['whatsapp'];
        }


        $queryList=mysqli_query($conn3,"SELECT * FROM  cliente where cliente_id=$clienteId");
        $nrowl=mysqli_num_rows($queryList);
        while($rowMotorizado=mysqli_fetch_array($queryList))
        {
            $celular_cliente = $rowMotorizado['celular_cliente'];
        }




$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));



mysqli_query($conn3,"INSERT INTO historiaClinica1 (cliente_id, usuario_id, Fecha, Hora, motivoConsulta, diagnostico, tratamiento, notas, recipe, incapacidades, cie10) VALUES ('$clienteId', '$ID', '$fechar', '$hora', '$motivoConsulta', '$diagnostico', '$tratamiento', '$notas',  '$recipe', '$incapacidades', '$cie10');");
      
              $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as historiaClinica1 from historiaClinica1 where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $historiaClinica1=$rowhc['historiaClinica1'];
              }   



$mensaje = 'Resultado de la consulta  con el Dr(a) *'.$NOMBRE_USUARIO.'*, *Diagnostico* '.$diagnostico.' *Tratamiento* '.$tratamiento.'. ***Si no desea recibir notificaciones puede darle de baja en cualquier momento respondiendo con la palabra NO. Atte ALTE-MedicalSoft';
Whatsapp_sent($celular_cliente, $mensaje);

 
              $para ="$email";

              // título
              $título = 'Resultado de la consulta';

                // mensaje
$mensaje = '
<html>
<head>
  <title>Resultado de la consulta</title>
    <table width="100%" height="466" border="0">
  <tr>
    <td><table width="100%" height="75" border="0">
      
    </table>
      <table width="100%" height="143" border="0">
        <tr>
          <td height="139" bgcolor="#00A74B"><table width="100%" height="62" border="0">
            <tr>
              <td width="5%">&nbsp;</td>
              <td width="72%" style="color:#FFF;"><h1><strong>Resultado de la consulta </strong></h1></td>
              <td width="23%">&nbsp;</td>
            </tr>
          </table></td>
        </tr>
      </table>
      <table width="100%" height="122" border="0">
<tr>
<td width="10%">&nbsp;</td>
<td width="80%"><p>motivo Consulta</p>
<br />

<h3>  '.$motivoConsulta.'  </h3> 

<br> 

</td>
<br />
 
<td width="10%">&nbsp;</td>
</tr>
</table>

<p>Atentamente,<br />
'.$NOMBRE_USUARIO.'</p> 

                      <table width="100%" border="0">
                        <tr>
                          <td height="21" bgcolor="#00A74B">&nbsp;</td>
                        </tr>
                      </table>
                      <table width="100%" height="64" border="0">
                        <tr>
                          <td height="60">Este correo electrónico no puede recibir respuestas. Para obtener más información, Contactart a '.$NOMBRE_USUARIO.'<br />
                         </td>
                        </tr>
                    </table></td>
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
                $cabeceras .= 'To: '.$NOMBRE_USUARIO.' <noreply@medicalsoftcolombia.com>' . "\r\n";
                $cabeceras .= 'From: Resultado de la consulta <noreply@medicalsoftcolombia.com>' . "\r\n";
                $cabeceras .= 'Cc: noreply@medicalsoftcolombia.com' . "\r\n";
                $cabeceras .= 'Bcc: noreply@medicalsoftcolombia.com' . "\r\n";

                // Enviarlo
                mail($para, $título, $mensaje, $cabeceras);
 

   echo "<script language='Javascript'> window.location='finalizado_consentimiento.php?historiaClinica1=$historiaClinica1';</script>"; 

?>