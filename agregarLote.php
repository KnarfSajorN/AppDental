<?php
date_default_timezone_set('America/Bogota');
include("funciones/funcionesUtilidades.php");
include("funciones/funciones.php");
include "funciones/conn3.php";




$nombre = $_POST['nombre'];
$vacuna = $_POST['vacuna'];
$cantidad = $_POST['cantidad'];
$fecha_vencimiento = $_POST['fecha_vencimiento'];
$idLote = $_POST['idLote'];





$queryUsuario2 = "INSERT INTO lotes (descripcion, id_vacuna, cantidad) 
                        VALUES ('$nombre','$vacuna','$cantidad')";





if (isset($_POST['Guardar'])) {
  $queryUsuario2 = "INSERT INTO lotes (descripcion, id_vacuna, cantidad, fechaV) 
                        VALUES ('$nombre','$vacuna','$cantidad', '$fecha_vencimiento')";
} elseif (isset($_POST['Actualizar'])) {
  $queryUsuario2 = "UPDATE  lotes SET descripcion='$nombre' ,id_vacuna='$vacuna' ,cantidad='$cantidad' ,fechaV='$fecha_vencimiento' where ID='$idLote' ";
}













mysqli_query($conn3, $queryUsuario2);



// echo 'Guardado!!';


echo "<script language='Javascript'> window.location='vacunacionRegistroV';</script>";
