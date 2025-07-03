<?php 
session_start();
include 'funciones/conn3.php';

$menu = $_POST['menu'];
$grupo = $_POST['grupo'];
$nombre = $_POST['nombre'];
$accion = 0 + $_POST['accion'];
if ($accion == 1){
    // creamos
    $sql = "INSERT INTO grupos (nombre,menu) values ('$nombre','$menu');";
}else{
    // actualizamos el menu del usuario
    $sql = "UPDATE grupos SET menu = '$menu', nombre = '$nombre' WHERE id = '$grupo'";
}
$result = $conn3->query($sql);



// si se actualizo correctamente, alerta de exito
// if ($result) {
//     // actualizamos el session del menu del usuario
//     echo 'Procesado';
// } else {
//     echo 'Error al actualizar el menu';
// }
