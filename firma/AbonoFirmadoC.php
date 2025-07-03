<?php  
include '../funciones/funciones.php'; 
 
$dataURL 		= $_POST['tarea'];
$nombre 	= $_POST['nombre'];
$documento 	= $_POST['documento'];
$idAbono 	= $_POST['idAbono'];
$idOperacion 	= $_POST['idOperacion'];
 

mysqli_query($conn3,"update abonoC set firma = '$dataURL', Nombre = '$nombre', Documento = '$documento' where id = '$idAbono' AND numero_operacion='$idOperacion'");


//echo "update abono set firma = '$dataURL', Nombre = '$nombre', Documento = '$documento' where id = '$idAbono' AND numero_operacion='$idOperacion'";


echo "<script>alert('Su firma ya ha sido Registrada');window.location='FirmaFinalizado.php';</script>";


 
?>