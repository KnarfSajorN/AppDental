<?php

include '../funciones/conn3.php';

$usuario = '24';

$usuario_id = $usuario.'pro';
 
mysqli_query($conn3,"CREATE TABLE $usuario_id(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
nombres VARCHAR(50) NOT NULL,
apellidos VARCHAR(60) NOT NULL,
email VARCHAR(50),
fecha TIMESTAMP
)");

echo "CREATE TABLE $usuario_id(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
nombres VARCHAR(50) NOT NULL,
apellidos VARCHAR(60) NOT NULL,
email VARCHAR(50),
fecha TIMESTAMP
)";


?>


