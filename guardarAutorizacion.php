<?php
date_default_timezone_set('America/Bogota');
$enlace_actual = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
include("funciones/funciones.php");
 
        $autorizaNota = $_POST['autorizaNota'];
        $idCitas = $_POST['idCitas'];
        
        $estado = $_POST['estado'];
        $autorizaIdUsuario = $_POST['autorizaIdUsuario'];

        $autorizaFecha = date("Y-m-d");
        $autorizaHora = date("H:i:s");
            
 
       mysqli_query($conn3,"UPDATE citas SET estado = '$estado', autorizaIdUsuario = '$autorizaIdUsuario', autorizaFecha = '$autorizaFecha', autorizaHora = '$autorizaHora', autorizaIdUsuario= '$autorizaIdUsuario', autorizaNota = '$autorizaNota'  WHERE idCitas = $idCitas");
   

$query = "UPDATE citas SET estado = '$estado', autorizaIdUsuario = '$autorizaIdUsuario', autorizaFecha = '$autorizaFecha', autorizaHora = '$autorizaHora', autorizaIdUsuario= '$autorizaIdUsuario'  WHERE idCitas = $idCitas";
auditorMaster($autorizaIdUsuario, '3', $enlace_actual, $query);

 
			 echo "<script language='Javascript'> window.location='controlCitas_admin?msg=1';</script>";

		     
    
?>