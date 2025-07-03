<?php  
session_start();
date_default_timezone_set('America/Bogota');
include("funciones/funciones.php");
include("funciones/funcionesUtilidades.php");

$IdMedico = $_SESSION['ID'];
$IdPaciente = $_POST['clienteid'];
$Descripcion = $_POST['Descripcion'];
$IM_id = $_POST['IM_id'];
$submit = $_POST['submit'];
echo $submit;
echo $IM_id;

if ($submit == 'E') {
  // ELiminar  
  $Eliminar = "DELETE FROM c_galeriaVideos WHERE IM_id='$IM_id'";
  $resultado = mysqli_query($conn3, $Eliminar);        
} else {
  $nombreArchivo = $_FILES['archivo']['name'];
  $archivoTemporal = $_FILES['archivo']['tmp_name'];
  $rutaDestino = "archivos/VideosWeb/" . $IdMedico . '/' . $nombreArchivo;
  
  if (!is_dir("archivos/VideosWeb/" . $IdMedico)) {
    mkdir("archivos/VideosWeb/" . $IdMedico);
  }
  
  if (move_uploaded_file($archivoTemporal, $rutaDestino)) {
    $Insertar = "INSERT INTO c_galeriaVideos (usuario_id, nombre_img, descripcion) VALUES ('$IdMedico', '$rutaDestino', '$Descripcion')";
    echo $Insertar;
    $resultado = mysqli_query($conn3, $Insertar);
  } else {
    // Error al subir el video, puedes manejarlo de acuerdo a tus necesidades
    // Aquí simplemente mostraremos un mensaje de error y redirigiremos al usuario
    echo "Error al subir el video.";
    exit;
  }
}

echo "<script language='Javascript'> window.location='anuncio';</script>"; 

?>
