<?php
include 'funciones/funciones.php';

$cantidad = 1;
include 'funciones/conn3.php'; 


$email = $_GET['email'];
$Fecha = date("Y-m-d");
echo $email;






	
				 

				// título
				$título = 'SOLICITUD DE PAGO CON TDC';

				// mensaje
				$mensaje = '
				<html>
				<head>
				  <title>SOLICITUD DE PAGO CON TDC</title>
				    <table width="100%" height="466" border="0">
				  <tr>
				    <td><table width="100%" height="75" border="0">
				      
				    </table>
				      <table width="100%" height="143" border="0">
				        <tr>
				          <td height="139" bgcolor="#00A74B"><table width="100%" height="62" border="0">
				            <tr>
				              <td width="5%">&nbsp;</td>
				              <td width="72%" style="color:#FFF;"><h2><strong>La información de tu Cuenta : </strong></h2></td>
				              
				              <td width="23%">&nbsp;</td>
				            </tr>
				          </table></td>
				        </tr>
				      </table>
				      <table width="100%" height="122" border="0">
				        <tr>
				          <td width="10%">&nbsp;</td>
				          <td width="80%"><p></p>
				            <p>  <br />
				               <h3 align="center">Usuario:  '.$email.'  </h3> 
				              
				               <br></br>
				<p>Atentamente,<br />
				  MedicalSoft</p> 
				  
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
				          <td height="60">Este correo electrónico no puede recibir respuestas. Para obtener más información, accede a 
				          <a href="https://medicalsoftcolombia.com/soportemedicalsoft" target="_blank"> medicalsoftcolombia.com/soportemedicalsoft</a>
				          <br />
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
				$cabeceras .= 'To: sievensoft <noreply@medicalsoftcolombia.com>' . "\r\n";
				$cabeceras .= 'From: SOLICITUD DE PAGO CON TDC <noreply@medicalsoftcolombia.com>' . "\r\n";
				$cabeceras .= 'Cc: noreply@medicalsoftcolombia.com' . "\r\n";
				$cabeceras .= 'Bcc: noreply@medicalsoftcolombia.com' . "\r\n";

				// Enviarlo
				mail('soporte@medicalsoftcolombia.com', $título, $mensaje, $cabeceras);
  	 
       	mysqli_query($conn3,"update usuarios set ACTIVO = 1, fechaDemo = '$Fecha' where USUARIO = '$email'");
      //  echo "update usuarios sert ACTIVO = 1 where USUARIO = '$email'";.


 echo "<script>alert('Verifica tu correo, en poco minutos te llagara la orden de pago seguro y fácil.(Recuerda verificar en Correo no deseados Spam');window.location='index.php?email=$email';</script>";

 

?>
 