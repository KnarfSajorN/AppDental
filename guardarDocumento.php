<?php
   include 'header.php';
   include 'menu.php'; 

    date_default_timezone_set('America/Bogota');
    include("conexiones/conexion.php");
    $con=conectar();
 
        $registro              = $_POST['registro'];          
        $ID                    = $_POST['ID'];          
        $clienteId             = $_POST['clienteId'];          
       
        $tipo                = $_POST['tipo'];      
        $fechar                = date("Y-m-d");
        
        $hora                  = date("H:i:s");
        $consentimiento      = $_POST['consentimiento'];

        $queryList=mysqli_query($conn3,"SELECT * FROM  config where ID_Usuario=$ID");
        $nrowl=mysqli_num_rows($queryList);
        while($rowMotorizado=mysqli_fetch_array($queryList))
        {
            $whatsapp = $rowMotorizado['whatsapp'];
        }


        $queryList=mysqli_query($conn3,"SELECT * FROM  cliente where cliente_id = $clienteId");
        $nrowl=mysqli_num_rows($queryList);
        while($rowMotorizado=mysqli_fetch_array($queryList))
        {
            $celular_cliente = $rowMotorizado['whatsapp'];
        }

echo ' >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> '.$celular_cliente;
echo ' >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> '.$tipo;
echo ' >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> '."SELECT * FROM  config where ID_Usuario=$ID";


$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));



mysqli_query($conn3,"INSERT INTO historiaDocumento (cliente_id, usuario_id, Fecha, Hora, consentimiento, firma) VALUES 
                                                         ('$clienteId', '$ID', '$fechar', '$hora', '$consentimiento', '');");



      echo '<br>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>'."INSERT INTO historiaDocumento (cliente_id, usuario_id, Fecha, Hora, consentimiento, firma) VALUES 
                                                         ('$clienteId', '$ID', '$fechar', '$hora', '$consentimiento', '');";
              $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as historiaClinica1 from historiaDocumento");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $historiaClinica1=$rowhc['historiaClinica1'];
              }   



/*

 
$mensaje = $Men.'
Por Favor leer:
https://medicalsoftplus.com/ec390/verConsentimiento/'.$historiaClinica1.', enviado por  Dr(a) *'.$NOMBRE_USUARIO.'*, Para firmar entrar al link  https://medicalsoftplus.com/ec390/firma/documento/'.$historiaClinica1.'  



*Si no desea recibir notificaciones puede darle de baja en cualquier momento respondiendo con la palabra NO. 

Atte '.$nombreF.' ';

Whatsapp_sent($linkkey, $celular_cliente, $mensaje); */

 
 

 
             //   $para ="$email";

                // título
                $título = 'Consentimiento o documentos enviado para su firma';

                // mensaje
$mensaje = '
<html>
<head>
  <title>Consentimiento o documentos enviado para su firma</title>
    <table width="100%" height="466" border="0">
  <tr>
    <td><table width="100%" height="75" border="0">
      
    </table>
      <table width="100%" height="143" border="0">
        <tr>
          <td height="139" bgcolor="#00A74B"><table width="100%" height="62" border="0">
            <tr>
              <td width="5%">&nbsp;</td>
              <td width="72%" style="color:#FFF;"><h1><strong>Consentimiento o documentos enviado para su firma </strong></h1></td>
              <td width="23%">&nbsp;</td>
            </tr>
          </table></td>
        </tr>
      </table>
      <table width="100%" height="122" border="0">
 

<td width="10%">&nbsp;</td>
</tr>

<tr>
<td width="10%">&nbsp;</td>
<td width="80%"><p>Ver documento </p>
<br/>

<h3>Por Favor leer:
https://medicalsoftplus.com/ec390/verConsentimiento/'.$historiaClinica1.', enviado por  Dr(a) *'.$NOMBRE_USUARIO.'*, Para firmar entrar al link  https://medicalsoftplus.com/ec390/firma/documento/'.$historiaClinica1.'  </h3> 

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
                $cabeceras .= 'From: Consentimiento o documentos enviado para su firma <noreply@medicalsoftcolombia.com>' . "\r\n";
                $cabeceras .= 'Cc: noreply@medicalsoftcolombia.com' . "\r\n";
                $cabeceras .= 'Bcc: noreply@medicalsoftcolombia.com' . "\r\n";

                // Enviarlo
                mail($para, $título, $mensaje, $cabeceras);
 


  echo "<script language='Javascript'> window.location='imprimirDocumento.php?historiaClinica1=$historiaClinica1';</script>"; 

?>