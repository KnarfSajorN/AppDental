<?php  
session_start();
date_default_timezone_set('America/Bogota');
include("funciones/funciones.php");
include("funciones/funcionesUtilidades.php");

$IdMedico=$_SESSION['ID'];
$IdPaciente=$_POST['clienteid'];
$descripcion=$_POST['descripcion'];
$archivo=$_POST['archivo'];

$IM_id=$_POST['IM_id'];

$submit=$_POST['submit'];
echo $submit;
if ($submit == 'A') {
  // Actualizar
  $descripcionQuery = "";
  if (strpos($archivo, "<iframe") !== false) {
    // Si $archivo contiene un <iframe>, actualizamos solo la descripción
    $descripcionQuery = ", descripcion='$descripcion'";
  } else {
    // Si no contiene un <iframe>, actualizamos tanto el nombre_vid como la descripción
    $descripcionQuery = ", nombre_vid='$archivo', descripcion='$descripcion'";
  }
  
  $Insertar = "UPDATE c_galeriaVid SET $descripcionQuery WHERE IM_id='$IM_id'";
  echo $Insertar;
} else if ($submit == 'E') {
  // Eliminar  
  $Insertar = "DELETE FROM c_galeriaVid WHERE IM_id='$IM_id'";
} else {
  // Insertar  
  if (strpos($archivo, "<iframe") !== false) {
    // Si $archivo contiene un <iframe>, guardamos solo la descripción
    $Insertar = "INSERT INTO c_galeriaVid (usuario_id, nombre_vid, descripcion) VALUES ('$IdMedico', '$archivo', '$descripcion')";
  } else {
    // Si no contiene un <iframe>, guardamos tanto el nombre_vid como la descripción
    $Insertar = "INSERT INTO c_galeriaVid (usuario_id, nombre_vid, descripcion) VALUES ('$IdMedico', '$archivo', '$descripcion')";
  }
  
  echo $Insertar;
}


$resultado = mysqli_query($conn3,$Insertar);

echo "<script language='Javascript'> window.location='anuncio';</script>"; 
