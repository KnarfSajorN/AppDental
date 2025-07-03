<?php
date_default_timezone_set('America/Bogota');
include("funciones/funcionesUtilidades.php");
include("funciones/funciones.php");
include "funciones/conn3.php";

$fecha = date("Y-m-d");
$hora = date("H:i:s");
$nombre = reem($_POST['nombre']);
$nombre_comercial = reem($_POST['nombre_comercial']);

$fecha_vencimiento = $_POST['fecha_vencimiento'];
if ($fecha_vencimiento == "") {
  $fecha_vencimiento = '0000-00-00';
}
$origen = $_POST['origen'];
$laboratorio = $_POST['laboratorio'];
$factura = $_POST['factura'];
$fecha_compra = $_POST['fecha_compra'];
if ($fecha_compra == "") {
  $fecha_compra = '0000-00-00';
}
$id_Usuario = $_POST['id_usuario'];
$id_Vacuna = $_POST['id_vacuna'];
$lote = $_POST['lote'];



if (isset($_POST['Guardar'])) {
  $queryUsuario = "INSERT INTO vacunas (Nombre, Nombre_Comercial  , Lote,   Fecha_Vencimiento, Origen,  Laboratorio, Factura, Fecha_Compra, Id_Usuario) 
  VALUES ('$nombre','$nombre_comercial', '$lote','$fecha_vencimiento', '$origen', '$laboratorio' ,'$factura', '$fecha_compra','$id_Usuario')";
} elseif (isset($_POST['Actualizar'])) {
  $queryUsuario = "UPDATE vacunas SET Nombre='$nombre' ,Nombre_Comercial='$nombre_comercial' ,Lote='$lote' ,Fecha_Vencimiento='$fecha_vencimiento' ,Origen='$origen' ,Laboratorio='$laboratorio' ,Factura='$factura' ,Fecha_Compra='$fecha_compra' ,Id_Usuario='$id_Usuario' where id='$id_Vacuna' limit 1";

  $queryUsuario1 = "UPDATE listado_vacunas SET Nombre_Vacuna='$nombre' where Id_Vacuna='$id_Vacuna'";
  mysqli_query($conn3, $queryUsuario1);
}

mysqli_query($conn3, $queryUsuario);


$queryListhc = mysqli_query($conn3, "SELECT MAX(id) as historiaClinica1 from vacunas");
$nrowl = mysqli_num_rows($queryListhc);
while ($rowhc = mysqli_fetch_array($queryListhc)) {
  $vacuna = $rowhc['historiaClinica1'];
}

$lote = $_POST['lote'];
$cantidad = $_POST['cantidad'];

if ($lote <> '') {
  $queryUsuario2 = "INSERT INTO lotes (descripcion, id_vacuna, cantidad, fechaV) 
  VALUES 
  ('$lote','$vacuna','$cantidad','$fecha_vencimiento')";
  mysqli_query($conn3, $queryUsuario2);
}



echo "<script language='Javascript'> window.location='vacunacionRegistroV?msg=1';</script>";