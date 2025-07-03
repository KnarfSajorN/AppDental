<?php
  
 include '../funciones/funciones.php'; 
 
$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));
 
$dataURL 		= $_POST['tarea'];
$usuario_id 	= $_POST['usuario_id'];
$nombre 	= $_POST['nombre'];
$documento 	= $_POST['documento'];
$id 	= $_POST['idFirma'];
 
//echo "update firmas set firma = '$dataURL', nombre = '$nombre', documento = '$documento' where id = $id ";
mysqli_query($conn3,"update firmas set firma = '$dataURL', nombre = '$nombre', documento = '$documento' where id = $id ") or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));



//mysqli_query($conn3,"INSERT INTO firmas (firma, nombre) VALUES ('$dataURL', '$nombre')");



$queryList=mysqli_query($conn3,"SELECT * FROM  firmas ORDER BY id desc limit 1");
	    $nrowl=mysqli_num_rows($queryList);
	    while($rowMotorizado=mysqli_fetch_array($queryList))
	    {
		  $firma      =$rowMotorizado['firma'];
	    }

	

//echo ' <img src="'.$firma.'" >';
//echo "<font color = 'red'>REGISTRO FIRMADO</font>";

 echo "<script>alert('Su firma ya ha sido Registrada');window.location='https://app.dentalsoftplus.com/firma/FirmaFinalizado.php';</script>";


 
?>