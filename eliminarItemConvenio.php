<?php
date_default_timezone_set('America/Bogota');
 
include("funciones/funciones.php");

$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));

    $idOper 	= $_POST['idOper'];
 
    $usuario_id 	= $_POST['usuario_id'];
    $idExamen	= $_POST['idExamen'];
      $idcliente  = $_POST['idcliente'];
      $empresa  = $_POST['empresa'];
 
 mysqli_query($conn3, "delete from entidadconvenio where  ID = $idOper;");

//echo "delete from operacionRecetario where  id = $idOper;";
 
 echo "<script language='Javascript'> window.location='convenios.php?empresa=$empresa';</script>";



?>