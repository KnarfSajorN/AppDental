<?php
include 'funciones/funciones.php';
include 'funciones/funcionesUtilidades.php';
date_default_timezone_set('America/Bogota');

$conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));


foreach ($_POST['Imagenologia_Examen'] as $key => $value) {
	$Imagenologia_Examen .= $value . ',';
}
//echo $Imagenologia_Examen.'<br>';

foreach ($_POST['Laboratorio_Examenes'] as $key => $value) {
	$Laboratorio_Examenes .= $value . ',';
}
//echo $Laboratorio_Examenes.'<br>';


$queryList = mysqli_query($conn3, "SELECT * FROM  examenesaRealizar");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $consecutivo = $rowMotorizado['id'];
    $consecutivo =$consecutivo+1;
     }

$historia= 'E'.$consecutivo;



date_default_timezone_set('America/Bogota');


$fecha = date("Y-m-d H:i:s");
$fecha_dias = date("Y-m-d");
$fecha_horas =  date("H:i:s");
$clienteId = $_POST['clienteId'];
$idusuario = $_POST['ID'];



mysqli_query($conn3, "INSERT INTO examenesaRealizar (usuario_id,cliente_id,historia_id,laboratorio,ecografia,otros,fechaHora) 
   VALUES 
  ('$idusuario','$clienteId','$historia', '$Laboratorio_Examenes', '$Imagenologia_Examen', '$otros', '$fecha');");
echo"INSERT INTO examenesaRealizar (usuario_id,cliente_id,historia_id,laboratorio,ecografia,otros,fechaHora) 
   VALUES 
  ('$idusuario','$clienteId','$historia', '$Laboratorio_Examenes', '$Imagenologia_Examen', '$otros', '$fecha');";

$tipo = "examenes";
$tipo_encriptado = encrypt($tipo);

// echo "<script language='Javascript'> window.location='Imprimir_Historia_Clinica.php?historiaClinica1=$historia&tipo=examenes';</script>";
echo "<script language='Javascript'> window.location='HC_ImprimirGeneral?HC=".encrypt($historia)."&tipo=" . $tipo_encriptado . "';</script>";

