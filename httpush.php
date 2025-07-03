<?php
// server should keep session data for AT LEAST 1 hour
ini_set('session.gc_maxlifetime', 10800);
// each client should remember their session id for EXACTLY 1 hour
session_set_cookie_params(10800);
session_start(); // ready to go!
$idChat = $_SESSION['idCitas'];

include 'funciones/conn3.php';

set_time_limit(0); //Establece el número de segundos que se permite la ejecución de un script.
echo $fecha_ac = isset($_POST['timestamp']) ? $_POST['timestamp'] : 0;

echo $fecha_bd = $row['timestamp'];

while ($fecha_bd <= $fecha_ac) {


	$query_3 = mysqli_query($conn3, "SELECT timestamp FROM mensajes ORDER BY timestamp DESC LIMIT 1");
	//  $queryList=mysqli_query($conn3,"SELECT * FROM  citas");
	$nrowl = mysqli_num_rows($query_3);
	while ($ro = mysqli_fetch_array($query_3)) {
		usleep(3000); //anteriormente 10000
		clearstatcache();
		$fecha_bd  = strtotime($ro['timestamp']);
	}


	/*
		$query3    = "SELECT timestamp FROM mensajes ORDER BY timestamp DESC LIMIT 1";
		$con       = mysql_query($query3 );
		$ro        = mysql_fetch_array($con);
		
		usleep(3000);//anteriormente 10000
		clearstatcache();
		$fecha_bd  = strtotime($ro['timestamp']);
		*/
}



$query2 = mysqli_query($conn3, "SELECT * FROM mensajes  WHERE idChat = $idChat ORDER BY timestamp DESC LIMIT 1");
//  $queryList=mysqli_query($conn3,"SELECT * FROM  citas");
$nrowl = mysqli_num_rows($query2);
while ($row_2 = mysqli_fetch_array($query2)) {
	$ar["timestamp"]          =   $row_2['timestamp'];
	$ar["mensaje"] 	 		  =   $row_2['mensaje'];
	$ar["id"] 		          =    $row_2['id'];
	$ar["status"]           =    $row_2['status'];
	$ar["tipo"]           =   $row_2['tipo'];
	$ar["idUsuario"]           =    $row_2['idUsuario'];
	$ar["idChat"]           =    $row_2['idChat'];
	$ar["nombre"]           =   $row_2['nombre'];
}

$dato_json   = json_encode($ar);
echo $dato_json;


/*

//$query       = "SELECT * FROM mensajes where idChat = $_SESSION['idCitas'] ORDER BY timestamp DESC LIMIT 1";
$query       = "SELECT * FROM mensajes  ORDER BY timestamp DESC LIMIT 1";
$datos_query = mysql_query($query);
while($row = mysql_fetch_array($datos_query))
{
	$ar["timestamp"]          = strtotime($row['timestamp']);	
	$ar["mensaje"] 	 		  = $row['mensaje'];	
	$ar["id"] 		          = $row['id'];	
	$ar["status"]           = $row['status'];	
	$ar["tipo"]           = $row['tipo'];	
	$ar["idUsuario"]           = $row['idUsuario'];	
	$ar["idChat"]           = $row['idChat'];	
	$ar["nombre"]           = $row['nombre'];	
}
$dato_json   = json_encode($ar);
echo $dato_json;

*/
