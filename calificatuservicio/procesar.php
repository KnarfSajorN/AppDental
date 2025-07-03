<?php

include '../funciones/funciones.php';


$idBitacora = $_GET ['id_bitacora'];
if ($_POST) {    
    // recibimos el file
    $file = $_FILES['file'];
    // recibimos el nombre del file
    $name = $file['name'];
    $tmp_name = $file['tmp_name'];
    // lo guardamos en una carpeta

    $path = '../baseDev/archivos/calificaciones/' . $name;

    move_uploaded_file($tmp_name, $path);

        

    $referNombre = $_POST['referNombre'];

    $referTelefono = $_POST['referTelefono'];

    $id = $_POST['id'];



    // actualizamos el registro

    $sql = "UPDATE comentarios_demo_sieven SET refnombre = '$referNombre', reftelefono = '$referTelefono', archivo = '$name', cliente_id = $idBitacora WHERE id = '$id'";
echo "UPDATE comentarios_demo_sieven SET refnombre = '$referNombre', reftelefono = '$referTelefono', archivo = '$name', cliente_id = $idBitacora WHERE id = '$id'";
    $result = mysqli_query($conn3, $sql);



}