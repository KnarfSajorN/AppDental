<?php
include 'funciones/funciones.php';

include 'funciones/conn3.php'; 


$email = $_GET['email'];
$monto = $_GET['monto']; 
$plan = $_GET['plan'];
$pais = $_GET['pais'];
echo $pais;

$Fecha = date("Y-m-d");
echo $email;

if ($pais == 'CO') {

               // título
				$titulo = 'Usted a solicitado información de pago para  Dentalsoft';

				// mensaje
				$mensaje = '
				<html>
				<head>
				  <title>Usted a solicitado información de pago para  Dentalsoft</title>
				    <table width="100%" height="466" border="0">
				  <tr>
				    <td><table width="100%" height="75" border="0">
				      
				    </table>
				      <table width="100%" height="143" border="0">
				        <tr>
				          <td height="139" bgcolor="#00A74B"><table width="100%" height="62" border="0">
				            <tr>
				              <td width="5%">&nbsp;</td>
				              <td width="72%" style="color:#FFF;"><h2><strong>Solicitud de pago por transferencia o consignación bancaria Dentalsoft    
				              </strong></h2></td>
				              
				              <td width="23%">&nbsp;</td>
				            </tr>
				          </table></td>
				        </tr>
				      </table>
				      <br>
				      El numero de cuenta para realizar el pago es : <strong>11343999251</strong><br>
				      Plan : <strong>'.$plan.'</strong><br>
				      Monto : <strong>'.$monto.'</strong><br>
		              Banco  <strong>Bancolombia</strong> <br>
		              Una vez realizado el pago enviá el comprobante a la cuenta de correo electrónica soporte@dentalsoftcolombia.com, asunto: '.$email.'
		         
				<p>Atentamente,<br />
				  Dentalsoft</p>  
				Fijo:   (1)9297900<br>
				Celular: 314 387 47 02<br>
				Fuera de Colombia +1 7863295472<br>
				 
				<br>
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
				          <a href="https://Dentalsoft.com/soportemedicalsoft" target="_blank"> Dentalsoft.com/soportemedicalsoft</a>
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
				$cabeceras .= 'To: Dentalsoft <noreply@dentalsoftcolombia.com>' . "\r\n";
				$cabeceras .= 'From: Usted a solicitado información de pago para MedicalSoft <noreply@dentalsoftcolombia.com>' . "\r\n";
				$cabeceras .= 'Cc: noreply@dentalsoftcolombia.com' . "\r\n";
				$cabeceras .= 'Bcc: noreply@dentalsoftcolombia.com' . "\r\n";

				// Enviarlo
				mail('soporte@dentalsoftcolombia.com', $titulo, $mensaje, $cabeceras);
				mail($email, $titulo, $mensaje, $cabeceras);

	
   
    $conn3 = mysqli_connect($server,$user,$pass,$dbname)or die ('Ha fallado la conexion MySQL:1 '.mysqli_error($conn3));
  	 
       	mysqli_query($conn3,"update usuarios set ACTIVO = 1, fechaDemo = '$Fecha' where USUARIO = '$email'");
      //  echo "update usuarios sert ACTIVO = 1 where USUARIO = '$email'";.


 echo "<script>alert('Verifica tu correo, te hemos enviado las indicaciones.(Recuerda verificar en Correo no deseados Spam');window.location='index.php?email=$email';</script>";

  

}
 


 elseif ($pais == 'VE') {

               // título
				$titulo = 'Usted a solicitado información de pago para  MedicalSoft';

				// mensaje
				$mensaje = '
				<html>
				<head>
				  <title>Usted a solicitado información de pago para  MedicalSoft</title>
				    <table width="100%" height="466" border="0">
				  <tr>
				    <td><table width="100%" height="75" border="0">
				      
				    </table>
				      <table width="100%" height="143" border="0">
				        <tr>
				          <td height="139" bgcolor="#00A74B"><table width="100%" height="62" border="0">
				            <tr>
				              <td width="5%">&nbsp;</td>
				              <td width="72%" style="color:#FFF;"><h2><strong>Solicitud de pago por transferencia o consignación bancaria MedicalSoft    
				              </strong></h2></td>
				              
				              <td width="23%">&nbsp;</td>
				            </tr>
				          </table></td>
				        </tr>
				      </table>
				      <br>
				      <strong>En minutos se le enviara el monto en bolivares y la informacion para depositar al banco mercantil</strong><br>
				      Plan : <strong>'.$plan.'</strong><br>
				      Monto : <strong>'.$monto.'</strong><br>
		              
		              Una vez realizado el pago enviá el comprobante a la cuenta de correo electrónica soporte@dentalsoftcolombia.com, asunto: '.$email.'
		         
				<p>Atentamente,<br />
				MedicalSoft</p>  
				Fijo:   +57 (1)9297900<br>
				Celular:+57 314 387 47 02<br>
				Numero internacional +1 7863295472<br>
				 
				<br>
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
				          <a href="https://dentalsoft.com/soportemedicalsoft" target="_blank"> dentalsoft.com/soportemedicalsoft</a>
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
				$cabeceras .= 'To: Dentalsoft <noreply@dentalsoftcolombia.com>' . "\r\n";
				$cabeceras .= 'From: Usted a solicitado información de pago para MedicalSoft <noreply@dentalsoftcolombia.com>' . "\r\n";
				$cabeceras .= 'Cc: noreply@dentalsoftcolombia.com' . "\r\n";
				$cabeceras .= 'Bcc: noreply@dentalsoftcolombia.com' . "\r\n";

				// Enviarlo
				mail('soporte@dentalsoftcolombia.com', $titulo, $mensaje, $cabeceras);
				mail($email, $titulo, $mensaje, $cabeceras);

   
    $conn3 = mysqli_connect($DBHOST2,$DBUSER2,$DBPASSWORD2,$DBNAME2)or die ('Ha fallado la conexion MySQL:1 '.mysqli_error($conn3));
  	 
       	mysqli_query($conn3,"update usuarios set ACTIVO = 1, fechaDemo = '$Fecha' where USUARIO = '$email'");
      //  echo "update usuarios sert ACTIVO = 1 where USUARIO = '$email'";.


 echo "<script>alert('Verifica tu correo, te hemos enviado las indicaciones.(Recuerda verificar en Correo no deseados Spam');window.location='index.php?email=$email';</script>";

  

	
}



?>
 