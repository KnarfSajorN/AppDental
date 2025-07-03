<?php
$server = 'localhost';
$user = 'root';//'erpdental_root';
$pass = '123456';//'0GUYR8d[0wF$0GUYR8d[0wF$';
$dbname = 'erpdental_dev_baseDental';
$conn3 = mysqli_connect($server, $user, $pass, $dbname) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));
// $conn3->set_charset("utf8mb4");




// -------------------------------
// conexión sistema bitácora
// -------------------------------
/*$serverSieven = 'localhost';
$userSieven = 'sievenso_sistemaPrincipal';
$passSieven = '5qA?o]t6d-h25qA?o]t6d-h2';
$dbnameSieven = 'sievenso_sistema';
$connSieven = mysqli_connect($serverSieven, $userSieven, $passSieven, $dbnameSieven) or die('Ha fallado estamos solucionando el problema: ' . mysqli_error($connSieven));
mysqli_set_charset($connSieven, "utf8mb4");*/
// -------------------------------
