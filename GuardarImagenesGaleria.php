<?php  
session_start();
date_default_timezone_set('America/Bogota');
include("funciones/funciones.php");
include("funciones/funcionesUtilidades.php");

$IdMedico=$_SESSION['ID'];
$IdPaciente=$_POST['clienteid'];
$Descripcion=$_POST['Descripcion'];
$IM_id=$_POST['IM_id'];
$submit=$_POST['submit'];
echo $submit;
echo $IM_id;

$archivo = rand(1, 999).$_FILES['archivo']['name'];
$cd=$_FILES['archivo']['tmp_name'];
$ruta = "archivos/galeria/".$archivo;
$dir = "archivos/galeria/";
$destino = "archivos/galeria/".$IdMedico.'/'.$archivo;
$resultado = @move_uploaded_file($cd,"archivos/galeria/".$archivo); 

$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];

// echo $archivo.' '.$IdMedico.' '.$IdPaciente.' '.$Descripcion.' ';


if ($submit=='E') {
  // ELiminar  
  $Insertar="DELETE from c_galeriaImg where IM_id='$IM_id'";
  $resultado = mysqli_query($conn3,$Insertar);        
}else{
        $Insertar="     INSERT INTO c_galeriaImg ( usuario_id,nombre_img,titulo,descripcion)  VALUES ('$IdMedico','$archivo', '$titulo', '$descripcion' )";
        // echo "INSERT INTO c_galeriaImg ( usuario_id,nombre_img)  VALUES ('$IdMedico','$archivo')";
        $resultado = mysqli_query($conn3,$Insertar);        
}




echo "<script language='Javascript'> window.location='anuncio';</script>"; 

?>
