<?php
date_default_timezone_set('America/Bogota');
include("funciones/funcionesUtilidades.php");
include("funciones/funciones.php");
include("funciones/conn3.php");


if($_POST['Revision_Tipo']=='Editar')
{
  $nombre = $_POST['nombre'];
  $plantilla = reem($_POST['plantilla']);
  $id = $_POST['id'];
  $idusuario = $_POST['usuario_id'];
  $Ruta = $_POST['Ruta'];

  $query = "UPDATE ConfigExamenFisico SET Nombre=$nombre,Plantilla=$plantilla where id = $id";
  $enlace_actual = str_replace('.php', '', $Ruta);

  auditorMaster($idusuario, '1', $enlace_actual, $query);

  mysqli_query($conn3,"UPDATE ConfigExamenFisico SET Nombre='$nombre',Plantilla='$plantilla' where id = '$id'");

}
elseif($_POST['Revision_Tipo']=='Crear')
{

  $nombre = $_POST['nombre'];
  $plantilla = reem($_POST['plantilla']);

  $idusuario = $_POST['usuario_id'];
  $Ruta = $_POST['Ruta'];

  $query = "INSERT INTO ConfigExamenFisico (Nombre, Plantilla) VALUES ($nombre, $plantilla)";
  $enlace_actual = str_replace('.php', '', $Ruta);

  auditorMaster($idusuario, '1', $enlace_actual, $query);


  mysqli_query($conn3,"INSERT INTO ConfigExamenFisico (Nombre, Plantilla) VALUES ('$nombre', '$plantilla')");
}
elseif($_POST['Revision_Tipo']=='Eliminar')
{

  $id = $_POST['id'];

  $idusuario = $_POST['usuario_id'];
  $Ruta = $_POST['Ruta'];

  $query = "UPDATE ConfigExamenFisico set activo = 0 where id = $id";
  $enlace_actual = str_replace('.php', '', $Ruta);

  auditorMaster($idusuario, '1', $enlace_actual, $query);

  //mysqli_query($conn3,"DELETE FROM ConfigExamenFisico WHERE id='$id' LIMIT 1");

  mysqli_query($conn3, "UPDATE ConfigExamenFisico set activo = 0 where id = '$id' limit 1");
  
}

?>