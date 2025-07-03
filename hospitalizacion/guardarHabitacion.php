<?php 
include '../funciones/conn3.php';
include '../funciones/funciones.php';

$pisoDesc = $_POST['pisoDesc'];
$numeroDeCamillas = $_POST['numeroDeCamillas'];
$tipoCamilla = $_POST['tipoCamilla'];
$idPiso = $_POST['idPiso'];
$fechaActual = date("Y-m-d");


// if ( mysqli_query($conn3, "INSERT INTO ho_habitaciones(descripcion,fechaCreacion,disponible,numeroCamillas,pisoId) VALUES('$pisoDesc', '$fechaActual', 0, '$numeroDeCamillas','$idPiso')") ) {
// 	echo "<script>history.back()</script>";
// }else{
// 	echo "Ocurrió un error";
// }

//var_dump($_POST['ho_habitacion']);

// array(2) 
// { [1]=> array(4) { ["descripcion"]=> string(15) "Habitacion No 1" ["tipo"]=> string(7) "Privada" ["numeroCamillas"]=> string(1) "1" ["caracteristicas"]=> string(11) "Hello world" } 

// { ["descripcion"]=> string(15) "Habitacion No 2" ["tipo"]=> string(7) "Privada" ["numeroCamillas"]=> string(1) "2" ["caracteristicas"]=> string(10) "Hola mundo" } }

foreach ($_POST['ho_habitacion'] as $key => $value) {
	// echo "Este es un vardump <br>";
	// var_dump($value);
	// echo "<br><br>";
	
	$numeroCamillas = $value['numeroCamillas'];
	$descripcion = $value['descripcion'];
	$tipo = $value['tipo'];
	$caracteristicas = $value['caracteristicas'];

	mysqli_query($conn3, "INSERT INTO ho_habitaciones(descripcion,fechaCreacion,numeroCamillas,pisoId,tipo,caracteristicas) VALUES('$descripcion', '$fechaActual','$numeroCamillas','$idPiso','$tipo','$caracteristicas')");
	// echo "INSERT INTO ho_habitaciones(descripcion,fechaCreacion,numeroCamillas,pisoId,tipo,caracteristicas) VALUES('$descripcion', '$fechaActual','$numeroCamillas','$idPiso','$tipo','$caracteristicas')";
	// echo "<br>";
	
	$idHabitacion = funcionMaster(1, 1, "MAX(idHabitacion)", "ho_habitaciones");
	$arrayHabitacion = explode(" ", $descripcion); //LA DESCRIPCION LLEGA COMO Habitacion No ## => SE SEPARA COMO UN ARRAY DE 3 POSICIONES Y SE TOMA LA ULTIMA
	$numeroHabitacion = $arrayHabitacion[2];
	$pisoDescripcion = funcionMaster($idPiso, "id", "despcripcion", "ho_piso");
	$arrayPiso = explode(" ", $pisoDescripcion);
	$numeroPiso = $arrayPiso[2];

	for ($i=1; $i <= $numeroCamillas; $i++) { 
		$consecutivoCamilla = $numeroPiso . "." . $numeroHabitacion . "." . $i;
		mysqli_query($conn3, "INSERT INTO ho_camilla(descripcion,idHabitacion) VALUES('$consecutivoCamilla','$idHabitacion')");
		//echo "INSERT INTO ho_camilla(descripcion,idHabitacion) VALUES('$consecutivoCamilla','$idHabitacion')";
		//echo "<br>";
	}

}




echo "<script>history.back()</script>";

//echo "INSERT INTO ho_habitaciones(descripcion,fechaCreacion,disponible,numeroCamillas,pisoId) VALUES('$pisoDesc', '$fechaActual', '0', '$numeroDeCamillas','$pisoId')";


 ?>