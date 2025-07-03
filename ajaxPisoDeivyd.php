<?php  
	include 'funciones/conn3.php';

	$pisoSelect =  $_POST['pisoSelect'];

	$queryHabs = mysqli_query($conn3, "SELECT * FROM ho_habitaciones where pisoId = $pisoSelect");

	foreach ($queryHabs as $tablaHabs) {
		$idHabitacion =  $tablaHabs['idHabitacion'];


		echo "<div>";
			$queryCams = mysqli_query($conn3, "SELECT * FROM ho_camilla where idHabitacion = $idHabitacion");
			echo "SELECT * FROM ho_camilla where idHabitacion = $idHabitacion";
			foreach ($queryCams as $tablaCams) {
				$idCamilla =  $tablaHabs['idCamilla'];
				echo '<div class="card" style="width: 18rem; heigth: 100px">
					  <img class="card-img-top" src="imagen.jpg" alt="">
					  <div class="card-body" style="heigth: 100px">
					    <h5 class="card-title">Paciente/Disponible</h5>
					    <p class="card-text">Disponible/Nombre</p>
					  </div>
					</div>';

			}
		echo "</div>";

	}




?>