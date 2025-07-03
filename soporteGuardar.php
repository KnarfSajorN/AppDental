<?php
$host='localhost';
$userdb='sievenso_sistemaPrincipal';
$pass2='5qA?o]t6d-h25qA?o]t6d-h2';
$DB='sievenso_sistema';
 

$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));
 
 
	$nombre 			= (htmlspecialchars(trim($_POST['nombre'])));
	$correo 			= (htmlspecialchars(trim($_POST['correo'])));
	$telefono 			= (htmlspecialchars(trim($_POST['telefono'])));
	$tipo 				= (htmlspecialchars(trim($_POST['tipo'])));
	$mensaje  			= (htmlspecialchars(trim($_POST['mensaje'])));
	$asunto  			= (htmlspecialchars(trim($_POST['asunto'])));
	
	$usuario_id  		= (htmlspecialchars(trim($_POST['usuario_id'])));
	$codi_cliente  		= (htmlspecialchars(trim($_POST['codi_cliente'])));

	
	$fecha = date('y-m-d'); 
	$hora = date('H:i:s'); 




    $nombre1 = $_FILES['imagen1']['name'];
 
    $nombrer1 = strtolower(rand(1, 500).$nombre1);
    $cd=$_FILES['imagen1']['tmp_name'];
    $ruta = "c_foto/".$_FILES['imagen1']['name'];
    $destino = "c_foto/".$nombrer1;
    $resultado = @move_uploaded_file($_FILES["imagen1"]["tmp_name"],"../soportes/".$nombrer1);
     
     $nombre2 = $_FILES['imagen2']['name'];
 
    $nombrer2 = strtolower(rand(2, 500).$nombre2);
    $cd=$_FILES['imagen2']['tmp_name'];
    $ruta = "c_foto/".$_FILES['imagen2']['name'];
    $destino = "c_foto/".$nombrer2;
    $resultado = @move_uploaded_file($_FILES["imagen2"]["tmp_name"],"../soportes/".$nombrer2);
     
    $nombre3 = $_FILES['imagen3']['name'];
 
    $nombrer3 = strtolower(rand(3, 500).$nombre3);
    $cd=$_FILES['imagen3']['tmp_name'];
    $ruta = "c_foto/".$_FILES['imagen3']['name'];
    $destino = "c_foto/".$nombrer3;
    $resultado = @move_uploaded_file($_FILES["imagen3"]["tmp_name"],"../soportes/".$nombrer3);
     
     $nombre4 = $_FILES['imagen4']['name'];
 
    $nombrer4 = strtolower(rand(4, 500).$nombre4);
    $cd=$_FILES['imagen4']['tmp_name'];
    $ruta = "c_foto/".$_FILES['imagen4']['name'];
    $destino = "c_foto/".$nombrer4;
    $resultado = @move_uploaded_file($_FILES["imagen4"]["tmp_name"],"../soportes/".$nombrer4);
     
 


	mysqli_query($conn3,"INSERT INTO support (asunto, mensaje, fecha, tipo, usuario, usuario_id, telefono, hora, codi_cliente, imagen1, imagen2, imagen3, imagen4) VALUES ('$asunto', '$mensaje', '$fecha', '$tipo','$correo', '$usuario_id', '$telefono', '$hora', '$codi_cliente', '$nombrer1', '$nombrer2', '$nombrer3', '$nombrer4');")or die(mysqli_error($conn3));



 echo "INSERT INTO support (asunto, mensaje, fecha, tipo, usuario, usuario_id, telefono) VALUES
		                         ('$asunto', '$mensaje', '$fecha', '$tipo','$correo', '$usuario_id', '$telefono');";
	switch ($tipo) 
	  {
	    case '0':
	      $tipoD = 'Soporte';
	      break;
	     case '1':
	     $tipoD = 'Recomendación';
	      break;
	     
	  }
                      

$destinatario = "soporte@medicalsoftplus.com"; 
$asunto = 'Solicitud de soporte '.$codi_cliente.' '; 
$cuerpo = ' 
<html> 
<head> 
   <title>Solicitud de soporte</title> 
</head> 
<body>  
<p> 
<b>Asunto '.$asunto.'<br>
<br>Mensaje: '.$mensaje.'<br>
<br> Fecha: '.$fecha.'<br>
<br> tipo '.$tipoD.'<br>
<br>correo '.$correo.'<br>
     
<br> teléfono '.$telefono.'<br>
</p> 
<br>
Gracias por su mensaje pronto le daremos respuesta a su solicitud

<br>
Atte.
<br>
Departamento de soporte y operaciones de SievenSoft

</body> 
</html> 
'; 

//para el envío en formato HTML 
$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 

//dirección del remitente 
$headers .= "From: soporte <no-responder@medicalsoftplus.com>\r\n"; 
 
 
mail($destinatario,$asunto,$cuerpo,$headers);
mail($correo,$asunto,$cuerpo,$headers);

/*

				$para ="soporte@medicalsoftplus.com";

				// título
				$título = 'SOPORTE';

				// mensaje
				$mensaje = '
				 
                            User:  '.$correo.'  <br> 
				               telefono : '.$telefono.' <br>
				               mensaje: '.$mensaje.' <br> 
				                asunto: '.$asunto.' <br> 
				              
				 
				';
				 
				 
				// Enviarlo
				mail($para, $título, $mensaje);


*/







        
 echo "<script language='Javascript'> window.location='soporte';</script>"; 


?>