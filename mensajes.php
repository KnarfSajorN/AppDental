<?php
// server should keep session data for AT LEAST 1 hour
ini_set('session.gc_maxlifetime', 10800);
// each client should remember their session id for EXACTLY 1 hour
session_set_cookie_params(10800);
session_start(); // ready to go!
$idChat = $_SESSION['idCitas'];

include 'funciones/conn3.php';
$queryCita = mysqli_query($conn3, "SELECT * FROM mensajes WHERE idChat = $idChat");
//  $queryList=mysqli_query($conn3,"SELECT * FROM  citas");
$nrowl = mysqli_num_rows($queryCita);
while ($row_recordset32 = mysqli_fetch_array($queryCita)) {
   echo   $row_recordset32['nombre'] . ": " . $row_recordset32['mensaje'];
   echo '<br>';
}
 
/*
$q = "SELECT * FROM mensajes ";
echo $res = mysql_query($q) or die (mysql_error());
while($timi = mysql_fetch_array($res))
{
	
	echo  $timi['nombre'].": ".$timi['mensaje'];
	echo "<br>";
}
*/
