<?php
include 'funciones/funciones.php';

$cantidad = 1;
include 'funciones/conn3.php';


$email = $_GET['email'];
$Fecha = date("Y-m-d");
echo $email;

  	 
       	mysqli_query($conn3,"update usuarios set ACTIVO = 2, fechaDemo = '$Fecha'  where USUARIO = '$email'");
      //  echo "update usuarios sert ACTIVO = 1 where USUARIO = '$email'";







				// título
				$titulo = 'Su cuenta a sido activada por 7 dias continuos ';
				// mensaje
				$mensaje = '
				<html>
				<head>
				  <title>Su cuenta a sido activada por 7 dias continuos</title>
				    <table width="100%" height="466" border="0">
				  <tr>
				    <td><table width="100%" height="75" border="0">
				      
				    </table>
				      <table width="100%" height="143" border="0">
				        <tr>
				          <td height="139" bgcolor="#00A74B"><table width="100%" height="62" border="0">
				            <tr>
				              <td width="5%">&nbsp;</td>
				              <td width="72%" style="color:#FFF;"><h2><strong>Su cuenta a sido activada por 7 dias continuos</strong></h2></td>
				              <td width="23%">&nbsp;</td>
				            </tr>
				          </table></td>
				        </tr>
				      </table>
				      <table width="100%" height="122" border="0">
				        <tr>
				          <td width="10%">&nbsp;</td>
				          <td width="80%"> 
				               <h3 align="center">Su cuenta '.$email.'  a sido activada por 7 días continuos desde la fecha '.$Fecha.'  </h3> 
				              

				               <br></br>
				<p>Atentamente,<br />
				  medicalsoft </p> 
				  
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
				          <td height="60">Este correo electrónico no puede recibir respuestas. Para obtener más información, accede a <a href="https://sievensoft.com/soportemedicalsoft" target="_blank"> sievensoft.com/soportemedicalsoft</a> <br/>
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
				$cabeceras .= 'From: Su cuenta a sido activada por 7 días continuos <noreply@medicalsoftcolombia.com>' . "\r\n";
				$cabeceras .= 'Cc: noreply@medicalsoftcolombia.com' . "\r\n";
				$cabeceras .= 'Bcc: noreply@medicalsoftcolombia.com' . "\r\n";
				// Enviarlo

 




// mail($email, $titulo, $mensaje, $cabeceras);

 // mail('soporte@medicalsoftcolombia.com', $titulo, $mensaje, $cabeceras);

 








 	echo "<script>alert('Su cuenta a sido activada');window.location='index.php?email=$email';</script>";

?>
