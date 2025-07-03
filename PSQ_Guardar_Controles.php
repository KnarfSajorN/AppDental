<?php
date_default_timezone_set('America/Bogota');
include("funciones/conn3.php");
include("funciones/funciones.php");

$ID                    = $_POST['ID'];

$idusuario                    = $_POST['ID'];  

$pacienteId            = $_POST['clienteId']; //Paciente
$usuarioid         	   = $_POST['usuario_Id']; //Usuario

$fechar                = date("Y-m-d");
$Afechar               = date("Y-m-d H:i:s");
$hora                  = date("H:i:s");

//tipo de ecografia
$tipo_trabajo = $_POST['tipo_trabajo'];


echo '<br><br><br><br>--------------------------------------------------------------------' . $tipo_trabajo;
if ($tipo_trabajo == 'Diagnóstico Psquiatría') {

	$eco1	= $_POST['escolaridad'];
	$eco2	= $_POST['etapa'];

	$eco3	= $_POST['nombreA'];
	$eco4	= $_POST['cc'];
	$eco5	= $_POST['edadA'];
	$eco05 	= $_POST['estadoC'];
	$eco6 	= $_POST['telA'];
	$eco7 	= $_POST['ocupacion'];
	$eco8 	= $_POST['escolaridadA'];
	$eco9 	= $_POST['direccion'];
	$eco10	= $_POST['diagnostico'];
	$eco11	= $_POST['reponsable'];



	if (strlen($eco1) >= 0) {
		$eexp1 = '<table class="table table-bordered"><tr> <td>Escolaridad del Paciente: ' . $eco1 . '</td>';
	}
	if (strlen($eco2) >= 0) {
		$eexp2 = '<td>Etapa: ' . $eco2 . '</td></tr><tr><th colspan="2" class="text-center"> Datos del Acompañante</th></tr>';
	} else {
		$eexp2 = '<td>     </td></tr><tr><th colspan="2" class="text-center"> Datos del Acompañante</th></tr>';
	}
	if (strlen($eco3) >= 0) {
		$eexp3 = '<tr><td>Nombre:' . $eco3 . '</td>';
	}
	if (strlen($eco4) >= 0) {
		$eexp4 = '<td>Número de Identificación:' . $eco4 . '</td></tr>';
	}
	if (strlen($eco5) >= 0) {
		$eexp5 = '<tr> <td>
Edad: ' . $eco5 . '</td>';
	}


	if (strlen($eco05) >= 0) {
		$eexp05 = '<td>Estado Civil: ' . $eco05 . '</td></tr>';
	}
	if (strlen($eco6) >= 0) {
		$eexp6 = '<tr><td>Teléfono: ' . $eco6 . '</td>';
	}
	if (strlen($eco7) >= 0) {
		$eexp7 = '<td>
Ocupación:' . $eco7 . '</td></tr>';
	}
	if (strlen($eco8) >= 0) {
		$eexp8 = '<tr><td>Escolaridad:' . $eco8 . '</td>';
	}
	if (strlen($eco9) >= 0) {
		$eexp9 = '<td>Dirección: ' . $eco9 . '</td></tr><tr><th colspan="2" class="text-center"> Diagnóstico </th></tr>';
	} else {
		$eexp9 = '<td>     </td></tr><tr><th colspan="2" class="text-center"> Diagnóstico </th></tr>';
	}
	if (strlen($eco10) >= 0) {
		$eexp10 = '<tr><td colspan="2">Diagnóstico: ' . $eco10 . '</td></tr>';
	}
	if (strlen($eco11) >= 0) {
		$eexp11 = '<tr><td colspan="2">Responsable: ' . $eco11 . '</td></tr>';
	}




	$detalle = $eexp1 . $eexp2 . $eexp3 . $eexp4 . $eexp5 . $eexp05 . $eexp6 . $eexp7 . $eexp8 . $eexp9 . $eexp10 . $eexp11 . '</table>';

$query = "INSERT INTO historiaClinica_controlesPsiquiatria(cliente_id,usuario_id,Fecha,Hora,Detalle,control)
    		VALUES ($pacienteId,$ID,$fechar,$hora,$detalle,$tipo_trabajo);";
$enlace_actual = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$enlace_actual = str_replace('.php', '', $enlace_actual);

auditorMaster($idusuario, '1', $enlace_actual, $query);

	mysqli_query($conn3, "
    		INSERT INTO historiaClinica_controlesPsiquiatria(cliente_id,usuario_id,Fecha,Hora,Detalle,control)
    		VALUES ('$pacienteId','$ID','$fechar','$hora','$detalle','$tipo_trabajo')");

			
	/*
	echo $detalle;

	$con = mysqli_query($conn3, "SELECT MAX(ID) as max FROM historiaClinica_ecografias ");
	$resu = mysqli_fetch_assoc($con);
	$historiaClinica1 = $resu['max'];
	*/
	$historiaClinica1 = mysqli_insert_id($conn3);

	$contador = $_POST['uploader_count'];


	for ($i = 0; $i < $contador; $i++) {
		$nomb = $_POST['uploader_' . $i . '_name'];

		mysqli_query($conn3, "INSERT INTO imgEcografia (idHistoria, imagen) VALUE
    ('$historiaClinica1','$nomb');");
	}
} 








elseif ($tipo_trabajo == 'Ingreso a Tratamiento Internado') {




	$ec1	= $_POST['escolar'];
	$ec2	= $_POST['etapa2'];
	$ec3	= $_POST['anombre'];
	$ec4	= $_POST['ide'];
	$ec5	= $_POST['Aedad'];
	$ec7	= $_POST['ec'];
	$ec8	= $_POST['Atel'];
	$ec9	= $_POST['ocup'];
	$ec10	= $_POST['Aescolar'];
	$ec11	= $_POST['dir'];
	$ec12	= $_POST['enfermedad'];
	$ec13	= $_POST['sustancia1'];
	$ec14	= $_POST['inicio1'];
	$ec15	= $_POST['hasta1'];
	$ec16	= $_POST['observacion1'];

	$ec17	= $_POST['sustancia2'];
	$ec18	= $_POST['inicio2'];
	$ec19	= $_POST['hasta2'];
	$ec20	= $_POST['observacion2'];
	$ec21	= $_POST['sustancia3'];
	$ec22	= $_POST['inicio3'];
	$ec23	= $_POST['hasta3'];
	$ec24	= $_POST['observacion3'];
	$ec25	= $_POST['sustancia4'];
	$ec26	= $_POST['inicio4'];
	$ec27	= $_POST['hasta4'];
	$ec28	= $_POST['observacion4'];
	$ec29	= $_POST['sustancia5'];
	$ec30	= $_POST['inicio5'];
	$ec31	= $_POST['hasta5'];
	$ec32	= $_POST['observacion5'];
	$ec33	= $_POST['alergia'];
	$ec34	= $_POST['patologicos'];
	$ec35	= $_POST['terapeuticos'];
	$ec36	= $_POST['mental'];
	$ec37	= $_POST['diagnostico1'];
	$ec38	= $_POST['tratamiento'];
	$ec39	= $_POST['observ'];
	$ec40	= $_POST['orden'];
	$ec41	= $_POST['anexos'];
	$ec42	= $_POST['prof'];



	//Datos iniciales de la ecografia
	if (strlen($ec1) >= 0) {
		$exp1 = '<tr><td>Escolaridad del Paciente: ' . $ec1 . '</td>';
	}
	if (strlen($ec2) >= 0) {
		$exp2 = '<td colspan="3">Etapa: ' . $ec2 . '</td></tr><tr><th colspan="4" class="text-center"> Datos del Acompañante</th></tr>';
	} else {
		$exp2 = '<td>     </td></tr><tr><th colspan="4" class="text-center"> Datos del Acompañante</th></tr>';
	}
	if (strlen($ec3) >= 0) {
		$exp3 = '<tr><td>Nombre: ' . $ec3 . '</td>';
	}
	if (strlen($ec4) >= 0) {
		$exp4 = '<td>Número de Identificación:' . $ec4 . '</td>';
	}
	if (strlen($ec5) >= 0) {
		$exp5 = '<td>Edad:' . $ec5 . '</td>';
	}
	if (strlen($ec7) >= 0) {
		$exp7 = '<td>Estado Civil: ' . $ec7 . '</td></tr>';
	}
	if (strlen($ec8) >= 0) {
		$exp8 = '<tr><td>Teléfono: ' . $ec8 . '</td>';
	}
	if (strlen($ec9) >= 0) {
		$exp9 = '<td>Ocupación: ' . $ec9 . '</td>';
	}
	if (strlen($ec10) >= 0) {
		$exp10 = '<td>Escolaridad: ' . $ec10 . '</td>';
	}
	if (strlen($ec11) >= 0) {
		$exp11 = '<td>Dirección: ' . $ec11 . '</td></tr><tr><th colspan="4" class="text-center"> Enfermedad Actual</th></tr>';
	} else {
		$exp11 = '<td>     </td></tr><tr><th colspan="4" class="text-center"> Enfermedad Actual</th></tr>';
	}

	if (strlen($ec12) >= 0) {
		$exp12 = '<tr><td colspan="4"> ' . $ec12 . '</td></tr><tr><th colspan="4" class="text-center"> Historia de Consumo </th></tr>';
	} else {
		$exp12 = '<td>     </td></tr><tr><th colspan="4" class="text-center"> Historia de Consumo </th></tr>';
	}

	$exp43 = '<tr><td> Sustancia </td>';
	$exp44 = '<td>Inicio</td>';
	$exp45 = '<td>Hasta</td>';
	$exp46 = '<td> Observaciones </td></tr>';


	if (strlen($ec13) >= 0) {
		$exp13 = '<tr><td> ' . $ec13 . '</td>';
	}
	if (strlen($ec14) >= 0) {
		$exp14 = '<td>' . $ec14 . '</td>';
	}
	if (strlen($ec15) >= 0) {
		$exp15 = '<td>' . $ec15 . '</td>';
	}
	if (strlen($ec16) >= 0) {
		$exp16 = '<td> ' . $ec16 . '</td></tr>';
	}
	if (strlen($ec17) >= 0) {
		$exp17 = '<tr><td> ' . $ec17 . '</td>';
	}
	if (strlen($ec18) >= 0) {
		$exp18 = '<td>' . $ec18 . '</td>';
	}
	if (strlen($ec19) >= 0) {
		$exp19 = '<td>' . $ec19 . '</td>';
	}
	if (strlen($ec20) >= 0) {
		$exp20 = '<td> ' . $ec20 . '</td></tr>';
	}
	if (strlen($ec21) >= 0) {
		$exp21 = '<tr><td> ' . $ec21 . '</td>';
	}
	if (strlen($ec22) >= 0) {
		$exp22 = '<td>' . $ec22 . '</td>';
	}
	if (strlen($ec23) >= 0) {
		$exp23 = '<td>' . $ec23 . '</td>';
	}
	if (strlen($ec24) >= 0) {
		$exp24 = '<td> ' . $ec24 . '</td></tr>';
	}
	if (strlen($ec25) >= 0) {
		$exp25 = '<tr><td> ' . $ec25 . '</td>';
	}
	if (strlen($ec26) >= 0) {
		$exp26 = '<td>' . $ec26 . '</td>';
	}
	if (strlen($ec27) >= 0) {
		$exp27 = '<td> ' . $ec27 . '</td>';
	}
	if (strlen($ec28) >= 0) {
		$exp28 = '<td> ' . $ec28 . '</td></tr>';
	}

	if (strlen($ec29) >= 0) {
		$exp29 = '<tr><td> ' . $ec29 . '</td>';
	}
	if (strlen($ec30) >= 0) {
		$exp30 = '<td>' . $ec30 . '</td>';
	}
	if (strlen($ec31) >= 0) {
		$exp31 = '<td> ' . $ec31 . '</td>';
	}
	if (strlen($ec32) >= 0) {
		$exp32 = '<td> ' . $ec32 . '</td></tr>';
	}

	if (strlen($ec33) >= 0) {
		$exp33 = '<tr><td colspan="4">Alergias a Medicamentos: ' . $ec33 . '</td></tr>';
	}
	if (strlen($ec34) >= 0) {
		$exp34 = '<tr><td colspan="4">Antecedentes Patológicos: ' . $ec34 . '</td></tr>';
	}
	if (strlen($ec35) >= 0) {
		$exp35 = '<tr><td colspan="4">Antecedentes Terapéuticos: ' . $ec35 . '</td></tr>';
	}
	if (strlen($ec36) >= 0) {
		$exp36 = '<tr><td colspan="4">Examen Mental: ' . $ec36 . '</td></tr>';
	}
	if (strlen($ec37) >= 0) {
		$exp37 = '<tr><td colspan="4">Diagnóstico: ' . $ec37 . '</td></tr>';
	}
	if (strlen($ec38) >= 0) {
		$exp38 = '<tr><td colspan="4">Tratamientos Suministrados con Ocasión de una Posible Falla en la Atención: ' . $ec38 . '</td></tr>';
	}
	if (strlen($ec39) >= 0) {
		$exp39 = '<tr><td colspan="4">Observaciones: ' . $ec39 . '</td></tr>';
	}
	if (strlen($ec40) >= 0) {
		$exp40 = '<tr><td colspan="4">Órdenes Médicas ' . $ec40 . '</td></tr>';
	}
	if (strlen($ec41) >= 0) {
		$exp41 = '<tr><td colspan="4">Anexos: ' . $ec41 . '</td></tr>';
	}
	if (strlen($ec42) >= 0) {
		$exp42 = '<tr><td colspan="4">Profesional Responsable: ' . $ec42 . '</td></tr>';
	}







	$valoracion = '<table class="table table-bordered"><tr>' . $exp1 . $exp2 . $exp3 . $exp4 . $exp5 . $exp6 . $exp7 . $exp8 . $exp9 . $exp10 . $exp11 . $exp12 . $exp43 . $exp44 . $exp45 . $exp46 . $exp13 . $exp14 . $exp15 . $exp16 . $exp17 . $exp18 . $exp19 . $exp20 . $exp21 . $exp22 . $exp23 . $exp24 . $exp25 . $exp26 . $exp27 . $exp28 . $exp29 . $exp30 . $exp31 . $exp32 . $exp33 . $exp34 . $exp35 . $exp36 . $exp37 . $exp38 . $exp39 . $exp40 . $exp41 . $exp42 . '</tr></table>';

	$query = "INSERT INTO historiaClinica_controlesPsiquiatria(cliente_id,usuario_id,Fecha,Hora,Detalle,control)
    		VALUES ($pacienteId,$ID,$fechar,$hora,$valoracion,$tipo_trabajo);";
$enlace_actual = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$enlace_actual = str_replace('.php', '', $enlace_actual);

auditorMaster($idusuario, '1', $enlace_actual, $query);

	mysqli_query($conn3, "
    		INSERT INTO historiaClinica_controlesPsiquiatria(cliente_id,usuario_id,Fecha,Hora,Detalle,control)
    		VALUES ('$pacienteId','$ID','$fechar','$hora','$valoracion','$tipo_trabajo')");

	/*
	echo "INSERT INTO historiaClinica_controlesPsiquiatria(cliente_id,usuario_id,Fecha,Hora,Detalle,control)
    		VALUES ('$pacienteId','$ID','$fechar','$hora','$valoracion','$tipo_trabajo')";

	$con = mysqli_query($conn3, "SELECT MAX(ID) as max FROM historiaClinica_TrabajoSocial ");
	$resu = mysqli_fetch_assoc($con);
	$historiaClinica1 = $resu['max'];*/

	$historiaClinica1 = mysqli_insert_id($conn3);

	$contador = $_POST['uploader_count'];


	for ($i = 0; $i < $contador; $i++) {
		$nomb = $_POST['uploader_' . $i . '_name'];

		mysqli_query($conn3, "INSERT INTO imgEcografia (idHistoria, imagen) VALUE
    ('$historiaClinica1','$nomb');");
	}
} 


















elseif ($tipo_trabajo == 'Seguimiento Psiquiatría') {

	$eco42	= $_POST['escuela'];
	$eco43	= $_POST['etapa3'];
	$eco44	= $_POST['desaSesion'];
	$eco45	= $_POST['profRespo'];


	/////////////////////////////////////////





	if (strlen($eco42) > 0) {
		$ex1 = '<tr><td>Escolaridad del Paciente: ' . $eco42 . '</td></tr>';
	}
	if (strlen($eco43) > 0) {
		$ex7 = '<tr><td>Etapa: ' . $eco43 . '</td></tr>';
	}
	if (strlen($eco44) > 0) {
		$ex8 = '<tr><td>Diagnóstico de Seguimiento: ' . $eco44 . '</td></tr>';
	}
	if (strlen($eco45) > 0) {
		$ex9 = '<tr><td>Firma del Profesional Responsable: ' . $eco45 . '</td></tr>';
	}




	$seguimiento = '<table class="table table-bordered"><tr>' . $ex1 . $ex7 . $ex8 . $ex9 . '</tr></table>';

	$query = "INSERT INTO historiaClinica_controlesPsiquiatria(cliente_id,usuario_id,Fecha,Hora,Detalle,control)
    		VALUES ($pacienteId,$ID,$fechar,$hora,$seguimiento,$tipo_trabajo);";
$enlace_actual = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$enlace_actual = str_replace('.php', '', $enlace_actual);

auditorMaster($idusuario, '1', $enlace_actual, $query);

	mysqli_query($conn3, "
    		INSERT INTO historiaClinica_controlesPsiquiatria(cliente_id,usuario_id,Fecha,Hora,Detalle,control)
    		VALUES ('$pacienteId','$ID','$fechar','$hora','$seguimiento','$tipo_trabajo')");


	$historiaClinica1 = mysqli_insert_id($conn3);

	/*
	echo "INSERT INTO historiaClinica_controlesPsiquiatria (cliente_id,usuario_id,Fecha,Hora,Detalle,control)
    		VALUES ('$pacienteId','$ID','$fechar','$hora','$seguimiento','$tipo_trabajo')";

	$con = mysqli_query($conn3, "SELECT MAX(ID) as max FROM historiaClinica_controlesPsiquiatria ");
	$resu = mysqli_fetch_assoc($con);
	$historiaClinica1 = $resu['max'];*/

	
} 








elseif ($tipo_trabajo == 'Fórmula') {

	$form1	= $_POST['fcantidad1'];
	$form2	= $_POST['medicamento1'];
	$form3	= $_POST['fvia1'];
	$form4	= $_POST['dosis1'];
	$form5	= $_POST['hora1'];
	$form6	= $_POST['fcantidad2'];
	$form7	= $_POST['medicamento2'];
	$form8	= $_POST['fvia2'];
	$form9	= $_POST['dosis2'];
	$form10	= $_POST['hora2'];
	$form11	= $_POST['fcantidad3'];
	$form12	= $_POST['medicamento3'];
	$form13	= $_POST['fvia3'];
	$form14	= $_POST['dosis3'];
	$form15	= $_POST['hora3'];
	$form16	= $_POST['fcantidad4'];
	$form17	= $_POST['medicamento4'];
	$form18	= $_POST['fvia4'];
	$form19	= $_POST['dosis4'];
	$form20	= $_POST['hora4'];
	$form21	= $_POST['fcantidad5'];
	$form22	= $_POST['medicamento5'];
	$form23	= $_POST['fvia5'];
	$form24	= $_POST['dosis5'];
	$form25	= $_POST['hora5'];



	/////////////////////////////////////////

	// echo "<pre>";
	// var_dump($_POST);
	// echo "</pre>";



	if (strlen($form1) >= 0) {
		$f1 = '<tr><td> ' . $form1 . '</td>';
	}
	if (strlen($form2) >= 0) {
		$f2 = '<td> ' . $form2 . '</td>';
	}
	if (strlen($form3) >= 0) {
		$f3 = '<td> ' . $form3 . '</td>';
	}
	if (strlen($form4) >= 0) {
		$f4 = '<td> ' . $form4 . '</td>';
	}
	if (strlen($form5) >= 0) {
		$f5 = '<td> ' . $form5 . '</td></tr><br>';
	}
	if (strlen($form6) >= 0) {
		$f6 = '<br><tr><td> ' . $form6 . '</td>';
	}
	if (strlen($form7) >= 0) {
		$f7 = '<td> ' . $form7 . '</td>';
	}
	if (strlen($form8) >= 0) {
		$f8 = '<td> ' . $form8 . '</td>';
	}
	if (strlen($form9) >= 0) {
		$f9 = '<td> ' . $form9 . '</td>';
	}
	if (strlen($form10) >= 0) {
		$f10 = '<td> ' . $form10 . '</td></tr>';
	}
	if (strlen($form11) >= 0) {
		$f11 = '<tr><td> ' . $form11 . '</td>';
	}
	if (strlen($form12) >= 0) {
		$f12 = '<td> ' . $form12 . '</td>';
	}
	if (strlen($form13) >= 0) {
		$f13 = '<td> ' . $form13 . '</td>';
	}
	if (strlen($form14) >= 0) {
		$f14 = '<td> ' . $form14 . '</td>';
	}
	if (strlen($form15) >= 0) {
		$f15 = '<td> ' . $form15 . '</td></tr>';
	}
	if (strlen($form16) >= 0) {
		$f16 = '<tr><td> ' . $form16 . '</td>';
	}
	if (strlen($form17) >= 0) {
		$f17 = '<td> ' . $form17 . '</td>';
	}
	if (strlen($form18) >= 0) {
		$f18 = '<td> ' . $form18 . '</td>';
	}
	if (strlen($form19) >= 0) {
		$f19 = '<td> ' . $form19 . '</td>';
	}
	if (strlen($form20) >= 0) {
		$f20 = '<td> ' . $form20 . '</td></tr>';
	}
	if (strlen($form21) >= 0) {
		$f21 = '<tr><td> ' . $form21 . '</td>';
	}
	if (strlen($form22) >= 0) {
		$f22 = '<td> ' . $form22 . '</td>';
	}
	if (strlen($form23) >= 0) {
		$f23 = '<td> ' . $form23 . '</td>';
	}
	if (strlen($form24) >= 0) {
		$f24 = '<td> ' . $form24 . '</td>';
	}
	if (strlen($form25) >= 0) {
		$f25 = '<td> ' . $form25 . '</td></tr>';
	}

	if (strlen($_POST['profRespo']) >= 0) {
		$profRespo = '<tr><td colspan="5"> Firma Profesional Responsable: ' . $_POST['profRespo'] . '</td></tr>';
	}

	$formula = '<table class="table table-bordered"><tr><td>Cantidad</td><td>Medicamento</td><td>Vía</td><td>Dosis</td><td>Hora</td></tr>' . $f1 . $f2 . $f3 . $f4 . $f5 . $f6 . $f7 . $f8 . $f9 . $f10 . $f11 . $f12 . $f13 . $f14 . $f15 . $f16 . $f17 . $f18 . $f19 . $f20 . $f21 . $f22 . $f23 . $f24 . $f25 .$profRespo . '</tr></table>';


	$query = "INSERT INTO historiaClinica_controlesPsiquiatria(cliente_id,usuario_id,Fecha,Hora,Detalle,control)
    		VALUES ($pacienteId,$ID,$fechar,$hora,$formula,$tipo_trabajo);";
$enlace_actual = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$enlace_actual = str_replace('.php', '', $enlace_actual);

auditorMaster($idusuario, '1', $enlace_actual, $query);

	mysqli_query($conn3, "INSERT INTO historiaClinica_controlesPsiquiatria(cliente_id,usuario_id,Fecha,Hora,Detalle,control) VALUES ('$pacienteId','$ID','$fechar','$hora','{$formula}','$tipo_trabajo')");
	// echo "<pre>";
	// var_dump(mysqli_error_list($conn3));
	// echo "</pre>";

	// echo "INSERT INTO historiaClinica_controlesPsiquiatria (cliente_id,usuario_id,Fecha,Hora,Detalle,control) VALUES ('$pacienteId','$ID','$fechar','$hora','$formula','$tipo_trabajo')";
	// exit();

	/*
	$con = mysqli_query($conn3, "SELECT MAX(ID) as max FROM historiaClinica_controlesPsiquiatria ");
	$resu = mysqli_fetch_assoc($con);
	$historiaClinica1 = $resu['max'];
	*/

	$historiaClinica1 = mysqli_insert_id($conn3);

	// echo "<pre>";
	// var_dump(mysqli_error_list($conn3));
	// echo "</pre>";
	// echo "<pre>";
	// var_dump($_POST);
	// echo "</pre>";
} elseif ($tipo_trabajo == 'Orden de Exámenes') {

	$exam1	= $_POST['descri'];
	$exam2	= $_POST['reponsabl'];


	/////////////////////////////////////////





	if (strlen($exam1) > 0) {
		$e1 = '<tr><td> Descripción: ' . $exam1 . '</td></tr>';
	}
	if (strlen($exam2) > 0) {
		$e2 = '<tr><td> Responsable: ' . $exam2 . '</td></tr>';
	}


$query = "INSERT INTO historiaClinica_controlesPsiquiatria(cliente_id,usuario_id,Fecha,Hora,Detalle,control)
    		VALUES ($pacienteId,$ID,$fechar,$hora,$examen,$tipo_trabajo);";
$enlace_actual = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$enlace_actual = str_replace('.php', '', $enlace_actual);

auditorMaster($idusuario, '1', $enlace_actual, $query);

	$examen = '<table class="table table-bordered"><tr>' . $e1 . $e2 . '</tr></table>';

	mysqli_query($conn3, "
    		INSERT INTO historiaClinica_controlesPsiquiatria(cliente_id,usuario_id,Fecha,Hora,Detalle,control)
    		VALUES ('$pacienteId','$ID','$fechar','$hora',' $examen','$tipo_trabajo')");


	/*
	echo "INSERT INTO historiaClinica_controlesPsiquiatria (cliente_id,usuario_id,Fecha,Hora,Detalle,control)
    		VALUES ('$pacienteId','$ID','$fechar','$hora','$examen','$tipo_trabajo')";

	$con = mysqli_query($conn3, "SELECT MAX(ID) as max FROM historiaClinica_controlesPsiquiatria ");
	$resu = mysqli_fetch_assoc($con);
	$historiaClinica1 = $resu['max'];
	*/

	$historiaClinica1 = mysqli_insert_id($conn3);

} elseif ($tipo_trabajo == 'Epicrisis') {

	$form1	= $_POST['servicio'];
	$form2	= $_POST['ingreso'];
	$form3	= $_POST['fecHAI'];
	$form4	= $_POST['horai'];

	$form6	= $_POST['egreso'];
	$form7	= $_POST['fechaE'];
	$form8	= $_POST['horaE'];
	$form9	= $_POST['peso'];
	$form10	= $_POST['talla'];
	$form11	= $_POST['fc'];
	$form12	= $_POST['fr'];
	$form13	= $_POST['ta'];
	$form14	= $_POST['profe'];
	$form15	= $_POST['consultam'];
	$form16	= $_POST['enferactual'];
	$form17	= $_POST['antec'];
	$form18	= $_POST['psico'];
	$form19	= $_POST['diagno'];
	$form20	= $_POST['conducta'];
	$form21	= $_POST['cambios'];
	$form22	= $_POST['diagEgreso'];
	$form23	= $_POST['otroD'];
	$form24	= $_POST['SALIDAP'];
	$form25	= $_POST['recomenda'];
	$form26 = $_POST['nomP'];
	$form27	= $_POST['FIRMAp'];


	/////////////////////////////////////////





	if (strlen($form1) >= 0) {
		$f1 = '<tr><td colspan="3"> Servicio: ' . $form1 . '</td></tr>';
	}
	if (strlen($form2) >= 0) {
		$f2 = '<tr><td> Servicio de Ingreso: ' . $form2 . '</td>';
	}
	if (strlen($form3) >= 0) {
		$f3 = '<td> Fecha de Ingreso: ' . $form3 . '</td>';
	}
	if (strlen($form4) >= 0) {
		$f4 = '<td> Hora de Ingreso: ' . $form4 . '</td></tr>';
	}
	if (strlen($form6) >= 0) {
		$f6 = '<tr><td> Servicio de Egreso: ' . $form6 . '</td>';
	}
	if (strlen($form7) >= 0) {
		$f7 = '<td> Fecha de Egreso: ' . $form7 . '</td>';
	}
	if (strlen($form8) >= 0) {
		$f8 = '<td> Hora de Egreso: ' . $form8 .  '</td></tr><tr><th colspan="4" class="text-center"> Ingreso</th></tr>';
	} else {
		$form8 = '<td>     </td></tr><tr><th colspan="4" class="text-center"> Ingreso</th></tr>';
	}

	if (strlen($form9) >= 0) {
		$f9 = '<tr><td> Peso: ' . $form9 . '</td>';
	}
	if (strlen($form10) >= 0) {
		$f10 = '<td> Talla: ' . $form10 . '</td>';
	}
	if (strlen($form11) >= 0) {
		$f11 = '<td> FC: ' . $form11 . '</td></tr>';
	}
	if (strlen($form12) >= 0) {
		$f12 = '<tr><td> FR: ' . $form12 . '</td>';
	}
	if (strlen($form13) >= 0) {
		$f13 = '<td> TA: ' . $form13 . '</td>';
	}
	if (strlen($form14) >= 0) {
		$f14 = '<td>Profesional: ' . $form14 . '</td></tr><tr><th colspan="4" class="text-center">Ingreso</th></tr>';
	} else {
		$form14 = '<td>     </td></tr><tr><th colspan="4" class="text-center">Ingreso</th></tr>';
	}

	if (strlen($form15) >= 0) {
		$f15 = '<tr><td colspan="3">Motivo de la Consulta: ' . $form15 . '</td></tr>';
	}
	if (strlen($form16) >= 0) {
		$f16 = '<tr><td colspan="3">Enfermedad Actual: ' . $form16 . '</td></tr>';
	}
	if (strlen($form17) >= 0) {
		$f17 = '<tr><td colspan="3">Antecedentes Personales: ' . $form17 . '</td></tr>';
	}
	if (strlen($form18) >= 0) {
		$f18 = '<tr><td colspan="3">Examen Psicológico: ' . $form18 . '</td></tr>';
	}
	if (strlen($form19) >= 0) {
		$f19 = '<tr><td colspan="3">Diagnóstico: ' . $form19 . '</td><tr>';
	}
	if (strlen($form20) >= 0) {
		$f20 = '<tr><td colspan="3">Conducta: ' . $form20 . '</td></tr><tr><th colspan="3" class="text-center"> Evolución</th></tr>';
	} else {
		$form20 = '<td>     </td></tr><tr><th colspan="4" class="text-center"> Evolución</th></tr>';
	}
	if (strlen($form21) >= 0) {
		$f21 = '<tr><td colspan="3">Cambios en el Estado del Paciente(Complicaciones, Accidentes o Eventos Adversos): ' . $form21 . '</td></td><tr><th colspan="3" class="text-center">Egreso</th></tr>';
	} else {
		$form21 = '<td>     </td></tr><tr><th colspan="4" class="text-center">Egreso</th></tr>';
	}
	if (strlen($form22) >= 0) {
		$f22 = '<tr><td colspan="3">Diagnóstico Principal: ' . $form22 . '</td></tr>';
	}
	if (strlen($form23) >= 0) {
		$f23 = '<tr><td colspan="3">Otros Diagnósticos: ' . $form23 . '</td></tr>';
	}
	if (strlen($form24) >= 0) {
		$f24 = '<tr><td colspan="3">Condiciones de la Salida del Paciente: ' . $form24 . '</td></tr>';
	}
	if (strlen($form25) >= 0) {
		$f25 = '<tr><td colspan="3">Recomendaciones: ' . $form25 . '</td></tr><tr><th colspan="3" class="text-center">Profesional de Salud</th></tr>';
	} else {
		$form21 = '<td>     </td></tr><tr><th colspan="3" class="text-center">Profesional de Salud</th></tr>';
	}

	if (strlen($form26) >= 0) {
		$f26 = '<tr><td colspan="3"> Nombre y Apellido: ' . $form26 . '</td></tr>';
	}
	if (strlen($form27) >= 0) {
		$f27 = '<tr><td colspan="3"> Firma y Número de Registro: ' . $form27 . '</td>';
	}


	$epicrisis = '<table class="table table-bordered"><tr>' . $f1 . $f2 . $f3 . $f4 . $f5 . $f6 . $f7 . $f8 . $f9 . $f10 . $f11 . $f12 . $f13 . $f14 . $f15 . $f16 . $f17 . $f18 . $f19 . $f20 . $f21 . $f22 . $f23 . $f24 . $f25 . $f26 . $f27 . '</tr></table>';

	$query = "INSERT INTO historiaClinica_controlesPsiquiatria(cliente_id,usuario_id,Fecha,Hora,Detalle,control)
    		VALUES ($pacienteId,$ID,$fechar,$hora,$epicrisis,$tipo_trabajo);";
$enlace_actual = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$enlace_actual = str_replace('.php', '', $enlace_actual);

auditorMaster($idusuario, '1', $enlace_actual, $query);

	mysqli_query($conn3, "
    		INSERT INTO historiaClinica_controlesPsiquiatria(cliente_id,usuario_id,Fecha,Hora,Detalle,control)
    		VALUES ('$pacienteId','$ID','$fechar','$hora',' $epicrisis','$tipo_trabajo')");



	echo "INSERT INTO historiaClinica_controlesPsiquiatria (cliente_id,usuario_id,Fecha,Hora,Detalle,control)
    		VALUES ('$pacienteId','$ID','$fechar','$hora','$epicrisis','$tipo_trabajo')";

	$con = mysqli_query($conn3, "SELECT MAX(ID) as max FROM historiaClinica_controlesPsiquiatria ");
	$resu = mysqli_fetch_assoc($con);
	$historiaClinica1 = $resu['max'];
}








$query = mysqli_query($conn3, "SELECT MAX(id) as historiaClinica1 from historiaClinica_controlesPsiquiatria");
$nrowl = mysqli_num_rows($query);

while ($rowhc = mysqli_fetch_array($query)) {
	$historiaClinica_controlesPsiquiatria = $rowhc['historiaClinica1'];
}

//echo "<script language='Javascript'> alert('ecografia=$historiaClinica_ecografias');</script>";


echo "<script language='Javascript'> window.location='PSQ_Finalizado?historiaClinica1=$historiaClinica_controlesPsiquiatria';</script>";
