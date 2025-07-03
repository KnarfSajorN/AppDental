<?php
include 'funciones/funciones.php';
include 'funciones/funcionesUtilidades.php';
date_default_timezone_set('America/Bogota');

$conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));

function removeEmptyElements(&$element)
{
	if (is_array($element)) {
		if ($key = key($element)) {
			$element[$key] = array_filter($element);
		}


		if (is_countable($element)) {
			if (count($element) != count($element, COUNT_RECURSIVE)) {
				$element = array_filter(current($element), __FUNCTION__);
			}

			$element = array_filter($element);
		}

		return $element;
	} else {
		return empty($element) ? false : $element;
	}
}

function calcular_meses($fecha)
{
	$fecha_nac = new DateTime(date('Y/m/d', strtotime($fecha))); // Creo un objeto DateTime de la fecha ingresada
	$fecha_hoy =  new DateTime(date('Y/m/d', time())); // Creo un objeto DateTime de la fecha de hoy
	$edad = date_diff($fecha_hoy, $fecha_nac); // La funcion ayuda a calcular la diferencia, esto seria un objeto
	return ($edad->format('%y') * 12) + $edad->format('%m');
}


//array_filter($_POST['InformacionAcudiente'], 'removeEmptyElements') -> esto se usa para  eliminar campos vacios en un array

if (is_countable($_POST['InformacionAcudiente'])) {
	foreach (array_filter($_POST['InformacionAcudiente'], 'removeEmptyElements') as $key => $value) {
		$InformacionAcudiente .= $key . ": " . $value . '<br>';
	}
}
if (is_countable($_POST['informacionResponsable'])) {
	foreach (array_filter($_POST['informacionResponsable'], 'removeEmptyElements') as $key => $value) {
		$informacionResponsable .= $key . ": " . $value . '<br>';
	}
}


//echo $InformacionAcudiente.'<br>';
if (is_countable($_POST['EnfermedadActual'])) {
	foreach (array_filter($_POST['EnfermedadActual'], 'removeEmptyElements') as $key => $value) {
		$EnfermedadActual .= $key . ": " . $value . '<br>';
	}
}


//echo $EnfermedadActual.'<br>';
if (is_countable($_POST['Checks_Antecedentes'])) {
	foreach (array_filter($_POST['Checks_Antecedentes'], 'removeEmptyElements') as $key => $value) {
		$Checks_Antecedentes .= '<b>' . $key . '</b>:<br>';
		foreach ($value as $key1 => $value1) {
			$Checks_Antecedentes .= $value1 . '<br>';
		}
	}
}

if (is_countable($_POST['AntecentesGinecobstetricos'])) {
	foreach (array_filter($_POST['AntecentesGinecobstetricos'], 'removeEmptyElements') as $key => $value) {
		$AntecentesGinecobstetricos .= $key . ": " . $value . '<br>';
	}
}
if (is_countable($_POST['AntecedentesFamiliares'])) {
	foreach (array_filter($_POST['AntecedentesFamiliares'], 'removeEmptyElements') as $key => $value) {
		$AntecedentesFamiliares .= '<b>Antecedente Familiar #' . $key . '</b>:<br>';
		foreach ($value as $key1 => $value1) {
			if (is_array($_POST['AntecedentesFamiliares'][$key][$key1])) {
				$AntecedentesFamiliares .= '<CIE10>' . $key1 . '<br>';
				foreach ($value1 as $key2 => $value2) {
					$AntecedentesFamiliares .= $value2 . '&nbsp;,&nbsp;';
				}
				$AntecedentesFamiliares .= '</CIE10><br>';
			} else {
				$AntecedentesFamiliares .= $key1 . ": " . $value1 . '<br>';
				echo "entro";
			}
		}
	}
}
if (is_countable($_POST['Checks_Revision'])) {
	foreach (array_filter($_POST['Checks_Revision'], 'removeEmptyElements') as $key => $value) {
		$Checks_Revision .= '<b>' . $key . '</b>:<br>';
		foreach ($value as $key1 => $value1) {
			$Checks_Revision .= $value1 . '<br>';
		}
	}
}
if (is_countable($_POST['SignosVitales'])) {
	foreach (array_filter($_POST['SignosVitales'], 'removeEmptyElements') as $key => $value) {
		$SignosVitales .= $key . ": " . $value . '<br>';
	}
}
if (is_countable($_POST['Imagenologia_Examen'])) {
	foreach ($_POST['Imagenologia_Examen'] as $key => $value) {
		$Imagenologia_Examen .= $value . ',';
	}
}
if (is_countable($_POST['Laboratorio_Examenes'])) {
	foreach ($_POST['Laboratorio_Examenes'] as $key => $value) {
		$Laboratorio_Examenes .= $value . ',';
	}
}

//echo $Checks_Antecedentes.'<br>';


//echo $AntecentesGinecobstetricos.'<br>';


//echo $AntecedentesFamiliares.'<br>';


//echo $Checks_Revision.'<br>';


//echo $SignosVitales.'<br>';

//echo $Paraclinicos.'<br>';


//echo $Imagenologia_Examen.'<br>';


//echo $Laboratorio_Examenes.'<br>';

if (is_countable($_POST['ExamenFisico'])) {
	foreach (array_filter($_POST['ExamenFisico'], 'removeEmptyElements') as $key => $value) {

		$contador = "0";
		$caracteres_examenfisico = strlen($ExamenFisico);
		$ExamenFisico .= '<b>' . $key . '</b>:<br>';

		foreach ($value as $key1 => $value1) {
			if ($_POST['ExamenFisico'][$key][0] == "No Evaluado") {
				$ExamenFisicoTemporal .= $value1 . '<br>';
				$contador++;
			} else {
				$ExamenFisico .= $value1 . '<br>';
			}
		}
		if ($contador > 1) {
			$ExamenFisico .= $ExamenFisicoTemporal;
			$ExamenFisicoTemporal = "";
		} elseif ($contador == '1') {
			$ExamenFisicoTemporal = "";
			$caracteres_restar = strlen($ExamenFisico) - $caracteres_examenfisico;
			$ExamenFisico = substr($ExamenFisico, 0, -$caracteres_restar);
		}
	}
}

if (is_countable($_POST['OrganoSentidos'])) {
	foreach (array_filter($_POST['OrganoSentidos'], 'removeEmptyElements') as $key => $value) {
		$OrganoSentidos .= $key . ": " . $value . '<br>';
	}
}

if (is_countable($_POST['SintomasGenerales'])) {
	foreach (array_filter($_POST['SintomasGenerales'], 'removeEmptyElements') as $key => $value) {
		$SintomasGenerales .= $key . ": " . $value . '<br>';
	}
}

if (is_countable($_POST['Impresion'])) {
	foreach (array_filter($_POST['Impresion'], 'removeEmptyElements') as $key => $value) {
		$Impresion .= $key . " : " . $value . '<br>';
	}
}

if (is_countable($_POST['PlanManejo'])) {
	foreach (array_filter($_POST['PlanManejo'], 'removeEmptyElements') as $key => $value) {
		$PlanManejo .= $key . " : " . $value . '<br>';
	}
}

if (is_countable($_POST['Arreglo_Incapacidades'])) {
	$incapacidades_arreglo = json_decode($_POST['Arreglo_Incapacidades'], true);
	foreach (array_filter($incapacidades_arreglo, 'removeEmptyElements') as $key => $value) {
		$Incapacidades .= '<b>Incapacidades #' . $key . '</b>:<br>';
		foreach ($value as $key1 => $value1) {
			$Incapacidades .= $key1 . " : " . $value1 . '<br>';
		}
	}
}

if (is_countable($_POST['Arreglo_Insumos'])) {
	$insumos_arreglo = json_decode($_POST['Arreglo_Insumos'], true);
	foreach (array_filter($insumos_arreglo, 'removeEmptyElements') as $key => $value) {
		$Insumos .= '<b>Insumos #' . $key . '</b>:<br>';
		foreach ($value as $key1 => $value1) {
			$Insumos .= $key1 . " : " . $value1 . '<br>';
		}
	}
}

if (is_countable($_POST[''])) {
}

if (is_countable($_POST[''])) {
}


//echo $ExamenFisico.'<br>';





//echo $OrganoSentidos.'<br>';


//echo $SintomasGenerales.'<br>';


// foreach (array_filter($_POST['DiagnosticoAcupuntura'], 'removeEmptyElements') as $key => $value) {
// 	$DiagnosticoAcupuntura .= $key . ": " . $value . '<br>';
// }
//echo $DiagnosticoAcupuntura.'<br>';

// foreach (array_filter($_POST['DiagnosticoConsulta'], 'removeEmptyElements') as $key => $value) {
// 	if (is_array($value)) {
// 		$DiagnosticoConsulta .= '<CIE10-2>' . $key . '</b><br>';
// 		foreach ($value as $key1 => $value1) {
// 			$DiagnosticoConsulta .= $value1 . '&nbsp;,&nbsp;';
// 		}
// 		$DiagnosticoConsulta .= '</CIE10-2><br>';
// 	} else {
// 		$DiagnosticoConsulta .= $key . ": " . $value . '<br>';
// 	}
// }
//echo $DiagnosticoConsulta.'<br>';


//echo $Impresion.'<br>';

//echo $PlanManejo.'<br>';


//echo $Incapacidades.'<br>';

//echo $Insumos.'<br>';

// informacion General //

date_default_timezone_set('America/Bogota');

//si tiene informacion es por que se hizo una receta
/*
    $receta_validacion = $_POST['idOper'];// esta variable corresponde a una input que trae el ajax al momento de genera una receta
    $receta = $_POST['receta'];
    if($receta_validacion!=""){$RecetaId = $receta;}
    else{$RecetaId="0";}
	*/

$receta_id = $_POST['receta_id'];
if ($receta_validacion != "") {
	$RecetaId = $receta;
} else {
	$RecetaId = "0";
}

$fecha = date("Y-m-d H:i:s");
$fecha_dias = date("Y-m-d");
$fecha_horas =  date("H:i:s");
$clienteId = $_POST['clienteId'];
$idusuario = $_POST['ID'];

$imgEscalaTanner = $_POST['imgEscalaTanner'];
$textEscalaTanner = $_POST['textEscalaTanner'];

if ($_POST['niño2']) {
	$imgEscalaTanner = $_POST['niño2'];
	if ($_POST['niño2'] == 1) {
		$textEscalaTanner = '<b>Estadio 1</b>. Sin vello púbico, Testicúlos y Pene infantil.';
	} else if ($_POST['niño2'] == 2) {
		$textEscalaTanner = '<b>Estadio 2</b>. Aumento del escroto y testículos, piel del escroto enrojecida y arrugada, pene infantil vello púbico escaso en la base del pene.';
	} else if ($_POST['niño2'] == 3) {
		$textEscalaTanner = '<b>Estado 3</b>. Alargamiento y engrosamiento del pene. Aumento de testículos y escroto. Vello sobre pubis rizado, grueso y oscuro.';
	} else if ($_POST['niño2'] == 4) {
		$textEscalaTanner = '<b>Estado 4</b>. Ensanchamiento del pene y del glande, aumento de testículos, aumento y oscurecimiento del escroto. Vello púbico adulto que no cubre los muslos.';
	} else if ($_POST['niño2'] == 5) {
		$textEscalaTanner = '<b>Estado 5</b>. Genitales Adultos. Vello adulto que se extiende a zona medial de muslos.';
	} else {
	}
}
if ($_POST['niña2']) {
	$imgEscalaTanner = $_POST['niña2'];
	if ($_POST['niña2'] == 1) {
		$textEscalaTanner = '<b>Estadio 1</b>. Pecho infantil, no vello púbico.';
	} else if ($_POST['niña2'] == 2) {
		$textEscalaTanner = '<b>Estadio 2</b>. Botón mamario, vello púbico no rizado escaso, en labios mayores.';
	} else if ($_POST['niña2'] == 3) {
		$textEscalaTanner = '<b>Estadio 3</b>. Aumento y elevación de pecho y areola. Vello rizado, basto y oscuro sobre pubis.';
	} else if ($_POST['niña2'] == 4) {
		$textEscalaTanner = '<b>Estadio 4</b>. Areola y pezón sobreelevado sobre mama. Vello púbico tipo adulto no sobre muslos.';
	} else if ($_POST['niña2'] == 5) {
		$textEscalaTanner = '<b>Estadio 5</b>. Pecho Adulto, areola no sobreelevada. Vello adulto zona medial muslo.';
	} else {
	}
}



$texEscalaTanner = '';

$sucursal = $_POST['sucursal'];
if ($sucursal == "") {
	$sucursal = "0";
}
////////////////////////////// CREACION DE TABLAS ///////////////////////////////////////////////////
$Campo1 = mysqli_query($conn3, "show COLUMNS from Historia_Clinica WHERE Field = 'sucursal';");
$nrowCampo1 = mysqli_num_rows($Campo1);
if ($nrowCampo1 == "0") {
	mysqli_query($conn3, "ALTER TABLE `Historia_Clinica` ADD `sucursal` TEXT NULL DEFAULT '0' COMMENT 'Sucursal en la que fue atendido *Creado Dinamicamente*'");
}


$query = "INSERT INTO  Historia_Clinica (fecha, cliente_id, usuario_id, InformacionAcudiente,    EnfermedadActual, Checks_Antecedentes, AntecentesGinecobstetricos , AntecedentesFamiliares, Checks_Revision, SignosVitales, Paraclinicos, Imagenologia_Examen, Laboratorio_Examenes, ExamenFisico, OrganoSentidos, SintomasGenerales, DiagnosticoAcupuntura, DiagnosticoConsulta, Impresion, PlanManejo, Incapacidades, Insumos, RecetaId,imgEscalaTanner,textEscalaTanner,sucursal) VALUES  
($fecha, $clienteId, $idusuario, $InformacionAcudiente,  $EnfermedadActual, $Checks_Antecedentes, $AntecentesGinecobstetricos, $AntecedentesFamiliares,  $Checks_Revision, $SignosVitales, $Paraclinicos,$Imagenologia_Examen, $Laboratorio_Examenes,$ExamenFisico,$OrganoSentidos, $SintomasGenerales, $DiagnosticoAcupuntura,$DiagnosticoConsulta, $Impresion, $PlanManejo, $Incapacidades,$Insumos,$RecetaId, $imgEscalaTanner, $textEscalaTanner,$sucursal);";
$enlace_actual = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$enlace_actual = str_replace('.php', '', $enlace_actual);

auditorMaster($idusuario, '1', $enlace_actual, $query);

//registro de la historia clinica
mysqli_query($conn3, "INSERT INTO  Historia_Clinica (fecha, cliente_id, usuario_id, InformacionAcudiente,    EnfermedadActual, Checks_Antecedentes, AntecentesGinecobstetricos , AntecedentesFamiliares, Checks_Revision, SignosVitales, Paraclinicos, Imagenologia_Examen, Laboratorio_Examenes, ExamenFisico, OrganoSentidos, SintomasGenerales, DiagnosticoAcupuntura, DiagnosticoConsulta, Impresion, PlanManejo, Incapacidades, Insumos, RecetaId,imgEscalaTanner,textEscalaTanner,sucursal, informacionResponsable) VALUES  
('$fecha', '$clienteId', '$idusuario', '$InformacionAcudiente',  '$EnfermedadActual', '$Checks_Antecedentes', '$AntecentesGinecobstetricos', '$AntecedentesFamiliares',  '$Checks_Revision', '$SignosVitales', '$Paraclinicos','$Imagenologia_Examen', '$Laboratorio_Examenes','$ExamenFisico','$OrganoSentidos', '$SintomasGenerales', '$DiagnosticoAcupuntura','$DiagnosticoConsulta', '$Impresion', '$PlanManejo', '$Incapacidades','$Insumos','$RecetaId', '$imgEscalaTanner', '$textEscalaTanner','$sucursal', '$informacionResponsable');");
$id_historia = mysqli_insert_id($conn3);


// Registrar info para graficos pediatria
$fecha_nac = new DateTime(date('Y/m/d', strtotime(funcionMaster($clienteId, 'cliente_id', 'fechaNacimiento', 'cliente')))); // Creo un objeto DateTime de la fecha ingresada
$fecha_hoy =  new DateTime(date('Y/m/d', time())); // Creo un objeto DateTime de la fecha de hoy
$edad = date_diff($fecha_hoy, $fecha_nac); // La funcion ayuda a calcular la diferencia, esto seria un objeto
$MesesTotal = ($edad->format('%y') * 12) + $edad->format('%m');
if ($_POST['SignosVitales']["Peso Corporal"] <> "" or $_POST['SignosVitales']["Altura"] <> "" or $_POST['SignosVitales']["IMC"] <> "" or $_POST['SignosVitales']["Perimetro_Cefalico"] <> "") {
	$Grafico_Pediatria["Peso_Corporal"] = $_POST['SignosVitales']["Peso Corporal"];
	$Grafico_Pediatria["Altura"] = $_POST['SignosVitales']["Altura"];
	$Grafico_Pediatria["IMC"] = $_POST['SignosVitales']["IMC"];
	$Grafico_Pediatria["Perimetro_Cefalico"] = $_POST['SignosVitales']["Perimetro Cefalico"];
	$Grafico_Pediatria["Edad"] = $MesesTotal;

	foreach ($Grafico_Pediatria as $value) {
		$informacion_grafica .= "'{$value}',";
		$informacion_graficaQuery .= "{$value},";
	}
	$informacion_grafica = trim($informacion_grafica, ',') . ",'{$id_historia}'";

	$informacion_graficaQuery = trim($informacion_graficaQuery) . ",{$id_historia}";

	$query = "INSERT INTO  Grafica_Crecimiento (usuario_id,cliente_id,Peso, Altura, IMC, Perimetro_Cefalico, Edad, id_historia, Tipo_Historia) VALUES  ($idusuario,$clienteId,{$informacion_graficaQuery},Historia Clinica);";
	$enlace_actual = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	$enlace_actual = str_replace('.php', '', $enlace_actual);

	auditorMaster($idusuario, '1', $enlace_actual, $query);

	mysqli_query($conn3, "INSERT INTO  Grafica_Crecimiento (usuario_id,cliente_id,Peso, Altura, IMC, Perimetro_Cefalico, Edad, id_historia, Tipo_Historia) VALUES  ('$idusuario','$clienteId',{$informacion_grafica},'Historia Clinica');");

	// actualizamos la tabla SignosVitalesYAntropometria para que porfa :v 
	$queryList = mysqli_query($conn3, "SELECT * FROM  SignosVitalesYAntropometria where cliente_id = $clienteId");
	$nrowsignosvitales = mysqli_num_rows($queryList);
	if ($nrowsignosvitales > 0) {

		$query = "UPDATE SignosVitalesYAntropometria
			SET Peso_Corporal = {$_POST["SignosVitales"]["Peso Corporal"]},
			Altura = {$_POST["SignosVitales"]["Altura"]},
			IMC = {$_POST["SignosVitales"]["IMC"]},
			Perimetro_Cefalico = {$_POST["SignosVitales"]["Perimetro Cefalico"]},
			Frecuencia_Respiratoria = {$_POST["SignosVitales"]["Frecuencia Respiratoria"]},
			Frecuencia_Cardiaca = {$_POST["SignosVitales"]["Frecuencia Cardiaca"]},
			Presion_Arterial_Diastolica = {$_POST["SignosVitales"]["Presion Arterial Diastolica"]},
			Presion_Arterial_Sistolica = {$_POST["SignosVitales"]["Presion Arterial Sistolica"]},
			Temperatura_Corporal = {$_POST["SignosVitales"]["Temperatura Corporal"]},
			Saturacion_Oxigeno = {$_POST["SignosVitales"]["Saturacion Oxigeno"]},
			Porcentaje_Grasa_Corporal = {$_POST["SignosVitales"]["Porcentaje de Grasa Corporal"]},
			Circunferencia_Cintura = {$_POST["SignosVitales"]["Circunferencia de Cintura"]},
			Circunferencia_Abdominal = {$_POST["SignosVitales"]["Circunferencia Abdominal"]},
			Tension_Arterial_Media = {$_POST["SignosVitales"]["Tension Arterial Media"]}
			WHERE cliente_id = $clienteId";
		$enlace_actual = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		$enlace_actual = str_replace('.php', '', $enlace_actual);

		auditorMaster($idusuario, '1', $enlace_actual, $query);

		mysqli_query($conn3, "
			UPDATE SignosVitalesYAntropometria
			SET Peso_Corporal = '{$_POST['SignosVitales']["Peso Corporal"]}',
			Altura = '{$_POST['SignosVitales']["Altura"]}',
			IMC = '{$_POST['SignosVitales']["IMC"]}',
			Perimetro_Cefalico = '{$_POST['SignosVitales']["Perimetro Cefalico"]}',
			Frecuencia_Respiratoria = '{$_POST['SignosVitales']["Frecuencia Respiratoria"]}',
			Frecuencia_Cardiaca = '{$_POST['SignosVitales']["Frecuencia Cardiaca"]}',
			Presion_Arterial_Diastolica = '{$_POST['SignosVitales']["Presion Arterial Diastolica"]}',
			Presion_Arterial_Sistolica = '{$_POST['SignosVitales']["Presion Arterial Sistolica"]}',
			Temperatura_Corporal = '{$_POST['SignosVitales']["Temperatura Corporal"]}',
			Saturacion_Oxigeno = '{$_POST['SignosVitales']["Saturacion Oxigeno"]}',
			Porcentaje_Grasa_Corporal = '{$_POST['SignosVitales']["Porcentaje de Grasa Corporal"]}',
			Circunferencia_Cintura = '{$_POST['SignosVitales']["Circunferencia de Cintura"]}',
			Circunferencia_Abdominal = '{$_POST['SignosVitales']["Circunferencia Abdominal"]}',
			Tension_Arterial_Media = '{$_POST['SignosVitales']["Tension Arterial Media"]}'
			WHERE cliente_id = '$clienteId'
			");
	} else {


		$query = "INSERT INTO  SignosVitalesYAntropometria (Peso_Corporal, Altura, IMC, Perimetro_Cefalico, Frecuencia_Respiratoria, Frecuencia_Cardiaca, Presion_Arterial_Diastolica, Presion_Arterial_Sistolica, Temperatura_Corporal, Saturacion_Oxigeno, Porcentaje_Grasa_Corporal, Circunferencia_Cintura, Circunferencia_Abdominal, Tension_Arterial_Media, cliente_id, usuario_id) 
			VALUES ({$_POST["SignosVitales"]["Peso Corporal"]},{$_POST["SignosVitales"]["Altura"]},{$_POST["SignosVitales"]["IMC"]},{$_POST["SignosVitales"]["Perimetro Cefalico"]},{$_POST["SignosVitales"]["Frecuencia Respiratoria"]},{$_POST["SignosVitales"]["Frecuencia Cardiaca"]},{$_POST["SignosVitales"]["Presion Arterial Diastolica"]},{$_POST["SignosVitales"]["Presion Arterial Sistolica"]},{$_POST["SignosVitales"]["Temperatura Corporal"]},{$_POST["SignosVitales"]["Saturacion Oxigeno"]},{$_POST["SignosVitales"]["Porcentaje de Grasa Corporal"]},{$_POST["SignosVitales"]["Circunferencia de Cintura"]},{$_POST["SignosVitales"]["Circunferencia Abdominal"]},{$_POST["SignosVitales"]["Tension Arterial Media"]},$clienteId,$idusuario)";

		$enlace_actual = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		$enlace_actual = str_replace('.php', '', $enlace_actual);

		auditorMaster($idusuario, '1', $enlace_actual, $query);

		mysqli_query($conn3, "INSERT INTO  SignosVitalesYAntropometria (Peso_Corporal, Altura, IMC, Perimetro_Cefalico, Frecuencia_Respiratoria, Frecuencia_Cardiaca, Presion_Arterial_Diastolica, Presion_Arterial_Sistolica, Temperatura_Corporal, Saturacion_Oxigeno, Porcentaje_Grasa_Corporal, Circunferencia_Cintura, Circunferencia_Abdominal, Tension_Arterial_Media, cliente_id, usuario_id) 
			VALUES ('{$_POST['SignosVitales']["Peso Corporal"]}','{$_POST['SignosVitales']["Altura"]}','{$_POST['SignosVitales']["IMC"]}','{$_POST['SignosVitales']["Perimetro Cefalico"]}','{$_POST['SignosVitales']["Frecuencia Respiratoria"]}','{$_POST['SignosVitales']["Frecuencia Cardiaca"]}','{$_POST['SignosVitales']["Presion Arterial Diastolica"]}','{$_POST['SignosVitales']["Presion Arterial Sistolica"]}','{$_POST['SignosVitales']["Temperatura Corporal"]}','{$_POST['SignosVitales']["Saturacion Oxigeno"]}','{$_POST['SignosVitales']["Porcentaje de Grasa Corporal"]}','{$_POST['SignosVitales']["Circunferencia de Cintura"]}','{$_POST['SignosVitales']["Circunferencia Abdominal"]}','{$_POST['SignosVitales']["Tension Arterial Media"]}','$clienteId','$idusuario')");
	}
}

// Para los RIPS
$RIP_cliente_id = $clienteId; // por si esta codificado el cliente_id -- importante poner
$RIP_Nombre_Historia = "Historia_Clinica";
$RIP_historia_id = $id_historia;
include 'IR_GuardarRips.php';

// Para el Recetario
$Recetario_Nombre_Historia = "Historia_Clinica";
$Recetario_historia_id = $id_historia;
$Recetario_cliente_id = $clienteId;
$Recetario_usuario_id = $idusuario;
include 'RM_GuardarRecetaHistoria.php';


//registro de cie10
foreach ($_POST['DiagnosticoConsulta']['CIE10'] as $value) {
	$codigocie10 = $value;
	mysqli_query($conn3, "INSERT INTO historiaClinica9_Quirurgico_Cie10 (cliente_id,usuario_id,historiaClinica9_id,Fecha,Hora,codigo) VALUES ('$clienteId', '$idusuario', '$id_historia','$fecha_dias','$fecha_horas','$codigocie10')");
}


$query = "INSERT INTO examenesaRealizar (usuario_id,cliente_id,historia_id,laboratorio,ecografia,otros,fechaHora) 
    VALUES($idusuario,$clienteId,$id_historia, $Laboratorio_Examenes, $Imagenologia_Examen, $otros, $fecha);";
$enlace_actual = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$enlace_actual = str_replace('.php', '', $enlace_actual);

auditorMaster($idusuario, '1', $enlace_actual, $query);

// registro de examenes
mysqli_query($conn3, "INSERT INTO examenesaRealizar (usuario_id,cliente_id,historia_id,laboratorio,ecografia,otros,fechaHora) 
    VALUES 
    ('$idusuario','$clienteId','$id_historia', '$Laboratorio_Examenes', '$Imagenologia_Examen', '$otros', '$fecha');");


//////////////////AUTOGUARDADO///////////////////////////////////////////////////////////////
if ($_POST['Ruta_Historia_AutoGuardado'] != "") {
	$Ruta_Historia_AutoGuardado = $_POST['Ruta_Historia_AutoGuardado'];

	$query = "UPDATE AutoGuardado SET Estado='0' WHERE cliente_id = '$clienteId' and usuario_id = '$idusuario' and Ruta = '$Ruta_Historia_AutoGuardado' AND Estado = '1' ";
	mysqli_query($conn3, $query);
}

echo "<script language='Javascript'> window.location='HC_FinalizadoGeneral?HC=" . encrypt($id_historia) . "';</script>";
