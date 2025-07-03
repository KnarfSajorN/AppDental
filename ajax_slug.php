<?php 
session_start();
include 'verificarSesion.php';

include 'funciones/conn3.php';

// utf8
mysqli_set_charset($conn3, "utf8");

// post
$value = $_POST['value'];

$query = "SELECT count(id) as contador from noticias where slug = '{$value}'";
$result = mysqli_query($connGlobal, $query);
$row = mysqli_fetch_array($result);

echo $row['contador'];


?>