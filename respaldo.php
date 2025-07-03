<?php
$USUARIO=$_POST['USUARIO'];
$nombre_cliente=$_POST['nombre_cliente'];
$usuarioId=$_POST['usuarioId'];
 
	 
				$para ="$email";

				// título
				$título = 'Respaldo MedicalSoft';
				// mensaje
				$mensaje = '
				<html>
				<head>
				  <title>Respaldo para '.$USUARIO.' '.$nombre_cliente.' '.$usuarioId.'</title>
				    <table width="100%" height="466" border="0">
				  <tr>
				    <td><table width="100%" height="75" border="0">
				      
				    </table>
				      <table width="100%" height="143" border="0">
				        <tr>
				          <td height="139" bgcolor="#00A74B"><table width="100%" height="62" border="0">
				            <tr>
				              <td width="5%">&nbsp;</td>
				              <td width="72%" style="color:#FFF;"><h2><strong> Solicitud de Respaldo </strong></h2></td>
				              <td width="23%">&nbsp;</td>
				            </tr>
				          </table></td>
				        </tr>
				      </table>
				      <table width="100%" height="122" border="0">
				        <tr>
				          <td width="10%">&nbsp;</td>
				          <td width="80%"><p>Solicitud de Respaldopara '.$USUARIO.' '.$nombre_cliente.' '.$usuarioId.'</p>
				            <p>   
				<p>Atentamente,<br />
				  sievensoft</p> 
				  
				<br />
				 
				  

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
				          <td height="60">Este correo electrónico no puede recibir respuestas. Para obtener más información, accede a medicalsoftcolombia.com<br />
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
				$cabeceras .= 'To: Respaldo MS <noreply@medicalsoftcolombia.com>' . "\r\n";
				$cabeceras .= 'From: Respaldo <noreply@medicalsoftcolombia.com>' . "\r\n";
				$cabeceras .= 'Cc: noreply@medicalsoftcolombia.com' . "\r\n";
				$cabeceras .= 'Bcc: noreply@medicalsoftcolombia.com' . "\r\n";
				// Enviarlo
				mail($para, $título, $mensaje, $cabeceras);
     			mail('soporte@medicalsoftcolombia.com', $título, $mensaje, $cabeceras);

				
				$mensaje_registro_usuario = '
		  		<div class="callout callout-info ">
		        <h4>Enviado!</h4>
					<p>Solicitud de respaldo</p>
		        </div>';
               	
               	echo "<script language='Javascript'> window.location='config';</script>"; 



?>