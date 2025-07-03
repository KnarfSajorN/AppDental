<?php  
	include 'funciones/conn3.php';
	//include 'funciones/funciones.php';
	$horaIngreso = $_POST['horaIngreso'];
	$fechaIngreso = date("Y-m-d");
	$motivoHospitalizacion = $_POST['motivoHospitalizacion'];
	$diagnosticoHospitalizacion = $_POST['diagnosticoHospitalizacion'];
	$diagnosticoCIE_10 = $_POST['diagnosticoCIE_10'];
	$tratamiento = $_POST['tratamiento'];
	$procedimientos = $_POST['procedimientos'];
	$pisoSelect = $_POST['pisoSelect'];
	$habitacionSelect = $_POST['habitacionSelect'];
	$camillaSelect = $_POST['camillaSelect'];
	$cliente_id = $_POST['cliente_id'];
	$usuarioId = $_POST['usuarioId'];


	if (mysqli_query($conn3, "INSERT INTO hoIngresoHospitalizacion(cliente_id,usuarioId,fechaIngreso,horaIngreso,motivoHospitalizacion,diagnosticoHospitalizacion,diagnosticoCIE_10,tratamiento,procedimientos,pisoSelect,habitacionSelect,camillaSelect,hospitalizacionActiva)
VALUES ('$cliente_id','$usuarioId','$fechaIngreso','$horaIngreso','$motivoHospitalizacion','$diagnosticoHospitalizacion','$diagnosticoCIE_10','$tratamiento','$procedimientos','$pisoSelect','$habitacionSelect','$camillaSelect',1)") && mysqli_query($conn3, "UPDATE ho_camilla SET  disponible=0 WHERE idCamilla = '$camillaSelect' ")) {
		$idMaximo = mysqli_insert_id($conn3);
		echo "<script>window.location.href='salaHospitalizacion.php?idP={$pisoSelect}'</script>";
	}else{

		echo "Ocurrio un error en el registro <br><br>";
		echo "UPDATE ho_camilla SET  disponible=0 WHERE idCamilla = $camillaSelect";
		echo "<br><br>";
		echo "INSERT INTO hoIngresoHospitalizacion(cliente_id,usuarioId,fechaIngreso,horaIngreso,motivoHospitalizacion,diagnosticoHospitalizacion,diagnosticoCIE_10,tratamiento,procedimientos,pisoSelect,habitacionSelect,camillaSelect,hospitalizacionActiva)
		VALUES ('$cliente_id','$usuarioId','$fechaIngreso','$horaRegistro','$motivoHospitalizacion','$diagnosticoHospitalizacion','$diagnosticoCIE_10','$tratamiento','$procedimientos','$pisoSelect','$habitacionSelect','$camillaSelect',1)";
	}




	
	;
	
	

	

	

?>