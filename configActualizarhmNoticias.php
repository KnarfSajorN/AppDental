<?php
session_start();
include 'verificarSesion.php';

// conexion a base de datos global - datos publicos
include 'funciones/conn3.php';
// utf8
mysqli_set_charset($conn3, "utf8");

// post
$editor = $_POST['editor'];
$titulo = $_POST['titulo'];
$slug = $_POST['slug'];
$descripcion = $_POST['descripcion'];
$blog = $_POST['blog'];
$id = $_POST['idNoticia'];

if ($_FILES['img'] && $_FILES['img']['error'] == 0 && $_FILES['img']['size'] > 0) {
  // recibimos una imagen desde el formulario
  $img = $_FILES['img'];
  // esta imagen se guarda en la base de datos como data:image/jpeg;base64,
  $img64 = base64_encode(file_get_contents($img['tmp_name']));
  $img64 = "data:image/jpeg;base64,".$img64;
}

$queryUpdate = "UPDATE noticias set
editor = '$editor',
titulo = '$titulo',
slug = '$slug',
descripcion = '$descripcion',
blog = '$blog'
".($_FILES['img'] && $_FILES['img']['error'] == 0 && $_FILES['img']['size'] > 0 ? ",img = '$img64'" : "")."
where id = $id
";

var_dump($queryUpdate);

mysqli_query($conn3, $queryUpdate);

echo "<script language='Javascript'> window.location='anuncio';</script>";
