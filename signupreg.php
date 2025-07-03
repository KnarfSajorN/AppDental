<?php
date_default_timezone_set('america/bogota');


$Base = 'https://medicalsoftplus.com/baseDev/';
$sistema = 'Medicalsoft';



include 'funciones/conn3.php';



	$name 				= $_POST['name'];
	$email 				= $_POST['email'];
	$password 			= $_POST['password'];
	$confirmPassword	= $_POST['confirmPassword'];
	$ciudad				= $_POST['ciudad'];
	$pais				= $_POST['pais'];
	$especialidad		= $_POST['especialidad'];
	$Nacimiento		= $_POST['Nacimiento'];
	$fec_ingreso     	= date("Y-m-d");
	 
	
	//Verificamos que las claves sean iguales
		if ($password <> $confirmPassword) 
		{
			$mensaje_registro_usuario = '
	  		<div class="callout callout-danger ">
	          <h4>Error!</h4>

	          <p>La contraseña no coincide   </p>
	        </div>'; 
		}

	$q=mysql_query("select * from usuarios where USUARIO='$email'");
	$check=mysql_num_rows($q);

//Verificamos si el correo no esta Registrado
	if ($check!=0) 
		{
			$mensaje_registro_usuario = '
	  		<div class="callout callout-danger ">
	          <h4>Error!</h4>

	          <p>Correo regsitrado por favor acceder  <a href="index.php">  Login </a> </p>
	        </div>'; 
		}
	elseif ($password == $confirmPassword) 
	{


	
	mysql_query("INSERT INTO usuarios (USUARIO, PASS,   NOMBRE_USUARIO,  fec_ingreso, especialidad, pais, direccion, Nacimiento) 
	 			   VALUES ('$email', '$password',   '$name',  '$fec_ingreso', '$especialidad', '$pais', '$direccion', '$Nacimiento')");
 
 
	  $mensaje_registro_usuario = '
  		<div class="callout callout-danger ">
          <h4>Send!</h4>

          <p>Your password was sent to the mail please verify and access. <br>  <a href="index.php"> <strong> Sign In</strong></a> </p>
        </div>';
	 
		//$string="Hey,".$data['NOMBRE_USUARIO'].", Tu clave es ".$data['PASS'];
		//mail($email, "Recuperacion de contraseña", $string);

				$para ="$email";

				// título
				$título = 'Registro MedicalSoft';
				// mensaje
				$mensaje = '
				<html>
				<head>
				  <title>Recover Password</title>
				    <table width="100%" height="466" border="0">
				  <tr>
				    <td><table width="100%" height="75" border="0">
				      
				    </table>
				      <table width="100%" height="143" border="0">
				        <tr>
				          <td height="139" bgcolor="#00A74B"><table width="100%" height="62" border="0">
				            <tr>
				              <td width="5%">&nbsp;</td>
				              <td width="72%" style="color:#FFF;"><h2><strong>Registered account </strong></h2></td>
				              <td width="23%">&nbsp;</td>
				            </tr>
				          </table></td>
				        </tr>
				      </table>
				      <table width="100%" height="122" border="0">
				        <tr>
				          <td width="10%">&nbsp;</td>
				          <td width="80%"><p>Registered account :</p>
				            <p>  <br />
				               <h3 align="center">User:  '.$email.'  </h3> 
				                <h3 align="center">Password : '.$password.' </h3> 
				               <h3 align="center">Name: '.$name.' </h3> 
				               <br></br>
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
				$cabeceras .= 'To: sievensoft <noreply@medicalsoftcolombia.com>' . "\r\n";
				$cabeceras .= 'From: Registered account <noreply@medicalsoftcolombia.com>' . "\r\n";
				$cabeceras .= 'Cc: noreply@medicalsoftcolombia.com' . "\r\n";
				$cabeceras .= 'Bcc: noreply@medicalsoftcolombia.com' . "\r\n";
				// Enviarlo
				mail($para, $título, $mensaje, $cabeceras);
     			mail('soporte@medicalsoftcolombia.com', $título, $mensaje, $cabeceras);

				
				$mensaje_registro_usuario = '
		  		<div class="callout callout-info ">
		        <h4>Send!</h4>
					<p>Registered account. <br>  <a href="index.php"> <strong> Sign In</strong></a></p>
		        </div>';
               

		      echo "<script language='Javascript'> window.location='activarregistro.php?email=$email';</script>"; 

		}
	 