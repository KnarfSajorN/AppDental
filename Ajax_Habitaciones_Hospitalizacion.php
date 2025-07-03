<?php  

	include 'funciones/conn3.php';


	$pisoSeleccionado = $_POST['pisoSeleccionado'];
	$tipo = $_POST['tipo'];
	$habitacionSeleccionada = $_POST['habitacionSeleccionada'];

	//echo "El piso es " . $pisoSeleccionado . "El tipo es " . $tipo . " La habitacion es " . $habitacionSeleccionada;




	if ($tipo == "mostrarHabitaciones") {
		$opciones = "<option value=''>Seleccione...</option>";
		$queryHabitaciones = mysqli_query($conn3, "SELECT * FROM ho_habitaciones WHERE pisoId = $pisoSeleccionado");
		echo "SELECT * FROM ho_habitaciones WHERE pisoId = $pisoSeleccionado";
		foreach ($queryHabitaciones as $tablaHab) {
			$opciones .= "<option value=".$tablaHab['idHabitacion'].">".$tablaHab['descripcion']."</option>";
		}
		echo $opciones;
	}


	if ($tipo == "mostrarCamillas") {
		$opciones = "<option value=''>Seleccione...</option>";
		$queryCamilla = mysqli_query($conn3, "SELECT * FROM ho_camilla WHERE idHabitacion = $habitacionSeleccionada AND disponible=1");
		echo "SELECT * FROM ho_camilla WHERE idHabitacion = $habitacionSeleccionada AND disponible=1";

		foreach ($queryCamilla as $tablaCamilla) {
			$opciones .= "<option value=".$tablaCamilla['idCamilla'].">".$tablaCamilla['descripcion']."</option>";
		}
		echo $opciones;
	}

	if ($tipo == "Consultar Numero Habitaciones") {
		$queryHabitacionesPiso = mysqli_query($conn3, "SELECT COUNT(*) AS todasHabitaciones FROM ho_habitaciones WHERE pisoId = $pisoSeleccionado");
		//echo "SELECT * FROM ho_camilla WHERE idHabitacion = $habitacionSeleccionada AND disponible=1";

		foreach ($queryHabitacionesPiso as $habitacionesPiso) {
			$todasHabitaciones = $habitacionesPiso['todasHabitaciones'];
		}
		echo $todasHabitaciones;
	}



?>