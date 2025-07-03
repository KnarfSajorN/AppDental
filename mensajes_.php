<?php
// server should keep session data for AT LEAST 1 hour
ini_set('session.gc_maxlifetime', 10800);
// each client should remember their session id for EXACTLY 1 hour
session_set_cookie_params(10800);
session_start(); // ready to go!
$_SESSION['idCitas'];
include 'funciones/funciones.php';
 
       $queryCita=mysqli_query($conn3,"SELECT * FROM  citas  where idCitas= $idCitas");
                //  $queryList=mysqli_query($conn3,"SELECT * FROM  citas");
                  $nrowl=mysqli_num_rows($queryCita);
                  while($row_recordset32=mysqli_fetch_array($queryCita))
                  {
                      $idCitas      = $row_recordset32['idCitas'];
                      $Doctor= $row_recordset32['doctor'];
                      $fecha= $row_recordset32['fecha'];
                      $Hora= $row_recordset32['Hora'];
                      $nombre= $row_recordset32['nombre'];
                      $telefono= $row_recordset32['telefono'];
                      $correo= $row_recordset32['correo'];
                      $motivoConsulta= $row_recordset32['motivoConsulta'];
                      $activo= $row_recordset32['activo']; 
                      $estado= $row_recordset32['estado'];
                      $clienteId= $row_recordset32['idCliente'];
                  }






include("clases/conect.php");


$q = "SELECT * FROM mensajes ";
echo $res = mysql_query($q) or die (mysql_error());
while($timi = mysql_fetch_array($res))
{
	
	echo  $timi['nombre'].": ".$timi['mensaje'];
	echo "<br>";
}
?>