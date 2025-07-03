<?php
include 'funciones/funciones.php';
include 'funciones/funcionesUtilidades.php';
date_default_timezone_set('America/Bogota');

function removeEmptyElements(&$element)
{
	if (is_array($element)) {
		if ($key = key($element)) {
			$element[$key] = array_filter($element);
		}

		if (count($element) != count($element, COUNT_RECURSIVE)) {
			$element = array_filter(current($element), __FUNCTION__);
		}

		$element = array_filter($element);

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


foreach (array_filter($_POST['InformacionAcudiente'], 'removeEmptyElements') as $key => $value) {
	$InformacionAcudiente .= $key . ": " . $value . '<br>';
}

foreach (array_filter($_POST['EnfermedadActual'], 'removeEmptyElements') as $key => $value) {
	$EnfermedadActual .= $key . ": " . $value . '<br>';
}


foreach (array_filter($_POST['Checks_Antecedentes'], 'removeEmptyElements') as $key => $value) {
	$Checks_Antecedentes .= $key . ": " . $value . '<br>';
}

foreach (array_filter($_POST['Checks_Revision'], 'removeEmptyElements') as $key => $value) {
	$Checks_Revision .= $key . ": " . $value . '<br>';
}


foreach ($_POST['Imagenologia_Examen'] as $key => $value) {
	$Imagenologia_Examen .= $value . ',';
}
//echo $Imagenologia_Examen.'<br>';

foreach ($_POST['Laboratorio_Examenes'] as $key => $value) {
	$Laboratorio_Examenes .= $value . ',';
}


foreach (array_filter($_POST['ExamenFisico'], 'removeEmptyElements') as $key => $value) {
	$ExamenFisico .= $key . ": " . $value . '<br>';
}
//echo $ExamenFisico.'<br>';

foreach (array_filter($_POST['OrganoSentidos'], 'removeEmptyElements') as $key => $value) {
	$OrganoSentidos .= $key . ": " . $value . '<br>';
}
//echo $OrganoSentidos.'<br>';

foreach (array_filter($_POST['SintomasGenerales'], 'removeEmptyElements') as $key => $value) {
	$SintomasGenerales .= $key . ": " . $value . '<br>';
}
//echo $SintomasGenerales.'<br>';

foreach (array_filter($_POST['DiagnosticoAcupuntura'], 'removeEmptyElements') as $key => $value) {
	$DiagnosticoAcupuntura .= $key . ": " . $value . '<br>';
}
//echo $DiagnosticoAcupuntura.'<br>';

foreach (array_filter($_POST['DiagnosticoConsulta'], 'removeEmptyElements') as $key => $value) {
	if (is_array($value)) {
		$DiagnosticoConsulta .= '<CIE10-2>' . $key . '</b><br>';
		foreach ($value as $key1 => $value1) {
			$DiagnosticoConsulta .= $value1 . '&nbsp;,&nbsp;';
		}
		$DiagnosticoConsulta .= '</CIE10-2><br>';
	} else {
		$DiagnosticoConsulta .= $key . ": " . $value . '<br>';
	}
}
//echo $DiagnosticoConsulta.'<br>';

foreach (array_filter($_POST['Impresion'], 'removeEmptyElements') as $key => $value) {
	$Impresion .= $key . " : " . $value . '<br>';
}
//echo $Impresion.'<br>';

foreach (array_filter($_POST['PlanManejo'], 'removeEmptyElements') as $key => $value) {
	$PlanManejo .= $key . " : " . $value . '<br>';
}

date_default_timezone_set('America/Bogota');


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

$img1 = $_POST['img1'];

// $texEscalaTanner = '';
$LM = $_POST['LM'];
$LM1 = $_POST['LM1'];
$LM2 = $_POST['LM2'];
$LM3 = $_POST['LM3'];
$LM4 = $_POST['LM4'];
$LM5 = $_POST['LM5'];
$LM6 = $_POST['LM6'];
$LM7 = $_POST['LM7'];
$sucursal = $_POST['sucursal'];
if ($sucursal == "") {
	$sucursal = "0";
}
//Tabla de Ortodoncia

$AP1 = $_POST['AP1'] == '' ? 0 : $_POST['AP1'] ;
$AP2 = $_POST['AP2'] == '' ? 0 : $_POST['AP2'] ;
$AP3 = $_POST['AP3'] == '' ? 0 : $_POST['AP3'] ;
$AP4 = $_POST['AP4'] == '' ? 0 : $_POST['AP4'] ;
$AP5 = $_POST['AP5'] == '' ? 0 : $_POST['AP5'] ;
$AP6 = $_POST['AP6'] == '' ? 0 : $_POST['AP6'] ;
$AP7 = $_POST['AP7'] == '' ? 0 : $_POST['AP7'] ;
$AP8 = $_POST['AP8'] == '' ? 0 : $_POST['AP8'] ;
$SI1 = $_POST['SI1'] == '' ? 0 : $_POST['SI1'] ;
$SI2 = $_POST['SI2'] == '' ? 0 : $_POST['SI2'] ;
$SI3 = $_POST['SI3'] == '' ? 0 : $_POST['SI3'] ;
$SI4 = $_POST['SI4'] == '' ? 0 : $_POST['SI4'] ;
$SI5 = $_POST['SI5'] == '' ? 0 : $_POST['SI5'] ;
$SI7 = $_POST['SI7'] == '' ? 0 : $_POST['SI7'] ;
$SI8 = $_POST['SI8'] == '' ? 0 : $_POST['SI8'] ;
$BL1 = $_POST['BL1'] == '' ? 0 : $_POST['BL1'] ;
$BL2 = $_POST['BL2'] == '' ? 0 : $_POST['BL2'] ;
$BL3 = $_POST['BL3'] == '' ? 0 : $_POST['BL3'] ;
$BL4 = $_POST['BL4'] == '' ? 0 : $_POST['BL4'] ;
$BL5 = $_POST['BL5'] == '' ? 0 : $_POST['BL5'] ;
$BL7 = $_POST['BL7'] == '' ? 0 : $_POST['BL7'] ;
$BL8 = $_POST['BL8'] == '' ? 0 : $_POST['BL8'] ;
$SP3 = $_POST['SP3'] == '' ? 0 : $_POST['SP3'] ;
$SP4 = $_POST['SP4'] == '' ? 0 : $_POST['SP4'] ;
$SP7 = $_POST['SP7'] == '' ? 0 : $_POST['SP7'] ;
$SP8 = $_POST['SP8'] == '' ? 0 : $_POST['SP8'] ;
$BLM1 = $_POST['BLM1'] == '' ? 0 : $_POST['BLM1'] ;
$BLM2 = $_POST['BLM2'] == '' ? 0 : $_POST['BLM2'] ;
$IDis3 = $_POST['IDis3'] == '' ? 0 : $_POST['IDis3'] ;
$IDis4 = $_POST['IDis4'] == '' ? 0 : $_POST['IDis4'] ;
$IDis7 = $_POST['IDis7'] == '' ? 0 : $_POST['IDis7'] ;
$IDis8 = $_POST['IDis8'] == '' ? 0 : $_POST['IDis8'] ;
$ELO1 = $_POST['ELO1'] == '' ? 0 : $_POST['ELO1'] ;
$ELO2 = $_POST['ELO2'] == '' ? 0 : $_POST['ELO2'] ;
$ELO3 = $_POST['ELO3'] == '' ? 0 : $_POST['ELO3'] ;
$ELO4 = $_POST['ELO4'] == '' ? 0 : $_POST['ELO4'] ;
$ElementoBL = $_POST['ElementoBL'] == '' ? 0 : $_POST['ElementoBL'] ;
$ELBL4 = $_POST['ELBL4'] == '' ? 0 : $_POST['ELBL4'] ;
$ELOS1 = $_POST['ELOS1'] == '' ? 0 : $_POST['ELOS1'] ;
$ELOS2 = $_POST['ELOS2'] == '' ? 0 : $_POST['ELOS2'] ;
$ELOS3 = $_POST['ELOS3'] == '' ? 0 : $_POST['ELOS3'] ;
$ELOS4 = $_POST['ELOS4'] == '' ? 0 : $_POST['ELOS4'] ;
$ELPO1 = $_POST['ELPO1'] == '' ? 0 : $_POST['ELPO1'] ;
$ELPO2 = $_POST['ELPO2'] == '' ? 0 : $_POST['ELPO2'] ;
$Co_GoI = $_POST['Co_GoI'] == '' ? 0 : $_POST['Co_GoI'] ;
$CO_MEI = $_POST['CO_MEI'] == '' ? 0 : $_POST['CO_MEI'] ;
$Co_GoD = $_POST['Co_GoD'] == '' ? 0 : $_POST['Co_GoD'] ;
$CO_MED = $_POST['CO_MED'] == '' ? 0 : $_POST['CO_MED'] ;
$total = $_POST['total'] == '' ? 0 : $_POST['total'] ;
$Total_O = $_POST['Total_O'] == '' ? 0 : $_POST['Total_O'] ;
$Total_R = $_POST['Total_R'] == '' ? 0 : $_POST['Total_R'] ;
$Total_G = $_POST['Total_G'] == '' ? 0 : $_POST['Total_G'] ;
$SubTotalI = $_POST['SubTotalI'] == '' ? 0 : $_POST['SubTotalI'] ;
$SubTotalD = $_POST['SubTotalD'] == '' ? 0 : $_POST['SubTotalD'] ;
$TotalesGO = $_POST['TotalesGO'] == '' ? 0 : $_POST['TotalesGO'] ;
$LM5 = $_POST['LM5'] == '' ? 0 : $_POST['LM5'] ;
$LM7 = $_POST['LM7'] == '' ? 0 : $_POST['LM7'] ;
$LM1 = $_POST['LM1'] == '' ? 0 : $_POST['LM1'] ;
$LM2 = $_POST['LM2'] == '' ? 0 : $_POST['LM2'] ;
$LM3 = $_POST['LM3'] == '' ? 0 : $_POST['LM3'] ;
$LM4 = $_POST['LM4'] == '' ? 0 : $_POST['LM4'] ;
$LM6 = $_POST['LM6'] == '' ? 0 : $_POST['LM6'] ;
$LM8 = $_POST['LM8'] == '' ? 0 : $_POST['LM8'] ;

$id_tablaOrtodoncia = 0;

$Total_T = $_POST['Total_T'] == '' ? 0 : $_POST['Total_T'] ;

if ($total != 0 || $Total_O != 0 || $Total_R != 0 || $Total_G != 0 || $SubTotalI != 0 || $SubTotalD != 0 || $TotalesGO != 0) {

$query = "INSERT INTO tablaOrtodoncia(cliente_id,usuario_id, AP1, AP2, AP3, AP4, AP5, AP6, AP7, AP8, SI1, SI2, SI3, SI4, SI5, SI7, SI8, BL1, BL2, BL3, BL4, BL5, BL7, BL8, SP3, SP4,SP7, SP8, BLM1, BLM2, IDis3, IDis4, IDis7, IDis8,Total_T,Total_O,Total_R,Total_G,Co_GoI,CO_MEI,Co_GoD,CO_MED,SubTotalI,SubTotalD,TotalesGO,ELO1,ELO2,ELO3,ELO4,ElementoBL,ELBL4,ELOS1,ELOS2,ELOS3,ELOS4,ELPO1,ELPO2,LM5,LM7,LM1,LM2,LM3,LM4,LM6,LM8) VALUES ($clienteId, $idusuario, $AP1, $AP2, $AP3, $AP4, $AP5, $AP6, $AP7, $AP8, $SI1, $SI2, $SI3, $SI4, $SI5, $SI7, $SI8, '$BL1', $BL2, $BL3, '$BL4', $BL5, $BL7, $BL8, $SP3, $SP4, $SP7, $SP8, $BLM1, $BLM2, $IDis3, $IDis4, $IDis7, $IDis8,$Total_T,$Total_O,$Total_R,$Total_G,$Co_GoI,$CO_MEI,$Co_GoD,$CO_MED,$SubTotalI,$SubTotalD,$TotalesGO,$ELO1,'$ELO2,$ELO3,$ELO4,$ElementoBL,$ELBL4,$ELOS1,$ELOS2',$ELOS3,$ELOS4,$ELPO1,$ELPO2,$LM5,$LM7,$LM1,$LM2,$LM3,$LM4,$LM6,$LM8);";
$enlace_actual = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$enlace_actual = str_replace('.php', '', $enlace_actual);

auditorMaster($idusuario, '1', $enlace_actual, $query);

	$queryinsert_tablaOrtodoncia = "INSERT INTO tablaOrtodoncia(cliente_id,usuario_id, AP1, AP2, AP3, AP4, AP5, AP6, AP7, AP8, SI1, SI2, SI3, SI4, SI5, SI7, SI8, BL1, BL2, BL3, BL4, BL5, BL7, BL8, SP3, SP4,SP7, SP8, BLM1, BLM2, IDis3, IDis4, IDis7, IDis8,Total_T,Total_O,Total_R,Total_G,Co_GoI,CO_MEI,Co_GoD,CO_MED,SubTotalI,SubTotalD,TotalesGO,ELO1,ELO2,ELO3,ELO4,ElementoBL,ELBL4,ELOS1,ELOS2,ELOS3,ELOS4,ELPO1,ELPO2,LM5,LM7,LM1,LM2,LM3,LM4,LM6,LM8) VALUES ('$clienteId', '$idusuario', '$AP1', '$AP2', '$AP3', '$AP4', '$AP5', '$AP6', '$AP7', '$AP8', '$SI1', '$SI2', '$SI3', '$SI4', '$SI5', '$SI7', '$SI8', '$BL1', '$BL2', '$BL3', '$BL4', '$BL5', '$BL7', '$BL8', '$SP3', '$SP4', '$SP7', '$SP8', '$BLM1', '$BLM2', '$IDis3', '$IDis4', '$IDis7', '$IDis8','$Total_T','$Total_O','$Total_R','$Total_G','$Co_GoI','$CO_MEI','$Co_GoD','$CO_MED','$SubTotalI','$SubTotalD','$TotalesGO','$ELO1','$ELO2','$ELO3','$ELO4','$ElementoBL','$ELBL4','$ELOS1','$ELOS2','$ELOS3','$ELOS4','$ELPO1','$ELPO2','$LM5','$LM7','$LM1','$LM2','$LM3','$LM4','$LM6','$LM8');";
	mysqli_query($conn3,$queryinsert_tablaOrtodoncia); 

	$id_tablaOrtodoncia = mysqli_insert_id($conn3);

}




////////////////////////////// CREACION DE TABLAS ///////////////////////////////////////////////////
$Campo1 = mysqli_query($conn3, "show COLUMNS from Historia_Ortodoncia WHERE Field = 'sucursal';");
$nrowCampo1 = mysqli_num_rows($Campo1);
if ($nrowCampo1 == "0") {
	mysqli_query($conn3, "ALTER TABLE `Historia_Ortodoncia` ADD `sucursal` TEXT NULL DEFAULT '0' COMMENT 'Sucursal en la que fue atendido *Creado desde modulo Historia Ortodoncia*'");
}
$Campo1 = mysqli_query($conn3, "show COLUMNS from Historia_Ortodoncia WHERE Field = 'id_tablaOrtodoncia';");
$nrowCampo1 = mysqli_num_rows($Campo1);
if ($nrowCampo1 == "0") {
	mysqli_query($conn3, "ALTER TABLE `Historia_Ortodoncia` ADD `id_tablaOrtodoncia` INT(11) NULL DEFAULT '0' COMMENT 'id de la tabla tablaOrtodoncia *Creado desde modulo Historia Ortodoncia*'");
}


mysqli_query($conn3, "  ALTER TABLE `Historia_Ortodoncia` 
                        ADD COLUMN IF NOT EXISTS `historia_id_anterior` INT(11) NULL DEFAULT '0' COMMENT 'Referencia a Historia_Ortodoncia id que ha sido reemplazado por la historia actual ',
                        ADD COLUMN IF NOT EXISTS `activo` INT(1) NULL DEFAULT '1' COMMENT 'Visible o no visible'") or die(mysqli_error($conn3));


///////////////////////////////////////////////////////////////////////////////////////////////////////////
$query = "INSERT INTO  Historia_Ortodoncia (fecha, cliente_id, usuario_id, InformacionAcudiente,    EnfermedadActual, Checks_Antecedentes, AntecentesGinecobstetricos , AntecedentesFamiliares, Checks_Revision, SignosVitales, Paraclinicos, Imagenologia_Examen, Laboratorio_Examenes, ExamenFisico, OrganoSentidos, SintomasGenerales, DiagnosticoAcupuntura, DiagnosticoConsulta, Impresion, PlanManejo, Incapacidades, Insumos, RecetaId,AP1,SI1,BL1,SP1,BLM1,IDis1,ICD1,BLM2,SI2,PO1,LM,LM1,img1,AP2,LM2,LM3,LM4,LM5,LM6,LM7,Modal_Presupuesto,sucursal,id_tablaOrtodoncia,historia_id_anterior) VALUES  
($fecha, $clienteId, $idusuario, $InformacionAcudiente, $EnfermedadActual, $Checks_Antecedentes, $AntecentesGinecobstetricos, $AntecedentesFamiliares,  $Checks_Revision, $SignosVitales, $Paraclinicos,$Imagenologia_Examen, $Laboratorio_Examenes,$ExamenFisico,$OrganoSentidos, $SintomasGenerales, $DiagnosticoAcupuntura,$DiagnosticoConsulta, $Impresion, $PlanManejo, $Incapacidades,$Insumos,$RecetaId,$AP1,$SI1,$BL1,$SP1,$BLM1,$IDis1,$ICD1,$BLM2,$SI2,$PO1,$LM,$LM1,$img1,$AP2,$LM2,$LM3,$LM4,$LM5,$LM6,$LM7, $Modal_Presupuesto,$sucursal,$id_tablaOrtodoncia, '{$_POST["id_historia"]}');";
$enlace_actual = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$enlace_actual = str_replace('.php', '', $enlace_actual);

auditorMaster($idusuario, '1', $enlace_actual, $query);
//registro de la historia clinica
mysqli_query($conn3, "INSERT INTO  Historia_Ortodoncia (fecha, cliente_id, usuario_id, InformacionAcudiente,    EnfermedadActual, Checks_Antecedentes, AntecentesGinecobstetricos , AntecedentesFamiliares, Checks_Revision, SignosVitales, Paraclinicos, Imagenologia_Examen, Laboratorio_Examenes, ExamenFisico, OrganoSentidos, SintomasGenerales, DiagnosticoAcupuntura, DiagnosticoConsulta, Impresion, PlanManejo, Incapacidades, Insumos, RecetaId,AP1,SI1,BL1,SP1,BLM1,IDis1,ICD1,BLM2,SI2,PO1,LM,LM1,img1,AP2,LM2,LM3,LM4,LM5,LM6,LM7,Modal_Presupuesto,sucursal,id_tablaOrtodoncia, historia_id_anterior) VALUES  
('$fecha', '$clienteId', '$idusuario', '$InformacionAcudiente',  '$EnfermedadActual', '$Checks_Antecedentes', '$AntecentesGinecobstetricos', '$AntecedentesFamiliares',  '$Checks_Revision', '$SignosVitales', '$Paraclinicos','$Imagenologia_Examen', '$Laboratorio_Examenes','$ExamenFisico','$OrganoSentidos', '$SintomasGenerales', '$DiagnosticoAcupuntura','$DiagnosticoConsulta', '$Impresion', '$PlanManejo', '$Incapacidades','$Insumos','$RecetaId','$AP1','$SI1','$BL1','$SP1','$BLM1','$IDis1','$ICD1','$BLM2','$SI2','$PO1','$LM','$LM1','$img1','$AP2','$LM2','$LM3','$LM4','$LM5','$LM6','$LM7', '$Modal_Presupuesto','$sucursal','$id_tablaOrtodoncia', '{$_POST["id_historia"]}');") or die(mysqli_error($conn3));


mysqli_query($conn3, "UPDATE Historia_Ortodoncia SET activo = '0' WHERE id = '{$_POST["id_historia"]}'") or die(mysqli_error($conn3));


$id_historia = mysqli_insert_id($conn3);
// echo "<pre>";      var_dump(mysqli_error_list($conn3));
// echo "</pre>";


  $Campo_Procedimientos_Realizados = mysqli_real_escape_string($conn3,$_POST['Campo_Procedimientos_Realizados']);
  mysqli_query($conn3,"UPDATE Historia_Ortodoncia SET Modal_Presupuesto = '$Campo_Procedimientos_Realizados' WHERE id ='$id_historia'");

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
	}
	$informacion_grafica = trim($informacion_grafica, ',') . ",'{$id_historia}'";
	mysqli_query($conn3, "INSERT INTO  Grafica_Crecimiento (usuario_id,cliente_id,Peso, Altura, IMC, Perimetro_Cefalico, Edad, id_historia, Tipo_Historia) VALUES  ('$idusuario','$clienteId',{$informacion_grafica},'Historia Clinica');");

	// actualizamos la tabla SignosVitalesYAntropometria para que porfa :v 
	$queryList = mysqli_query($conn3, "SELECT * FROM  SignosVitalesYAntropometria where cliente_id = $clienteId");
	$nrowsignosvitales = mysqli_num_rows($queryList);
	if ($nrowsignosvitales > 0) {
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
		mysqli_query($conn3, "INSERT INTO  SignosVitalesYAntropometria (Peso_Corporal, Altura, IMC, Perimetro_Cefalico, Frecuencia_Respiratoria, Frecuencia_Cardiaca, Presion_Arterial_Diastolica, Presion_Arterial_Sistolica, Temperatura_Corporal, Saturacion_Oxigeno, Porcentaje_Grasa_Corporal, Circunferencia_Cintura, Circunferencia_Abdominal, Tension_Arterial_Media, cliente_id, usuario_id) 
			VALUES ('{$_POST['SignosVitales']["Peso Corporal"]}','{$_POST['SignosVitales']["Altura"]}','{$_POST['SignosVitales']["IMC"]}','{$_POST['SignosVitales']["Perimetro Cefalico"]}','{$_POST['SignosVitales']["Frecuencia Respiratoria"]}','{$_POST['SignosVitales']["Frecuencia Cardiaca"]}','{$_POST['SignosVitales']["Presion Arterial Diastolica"]}','{$_POST['SignosVitales']["Presion Arterial Sistolica"]}','{$_POST['SignosVitales']["Temperatura Corporal"]}','{$_POST['SignosVitales']["Saturacion Oxigeno"]}','{$_POST['SignosVitales']["Porcentaje de Grasa Corporal"]}','{$_POST['SignosVitales']["Circunferencia de Cintura"]}','{$_POST['SignosVitales']["Circunferencia Abdominal"]}','{$_POST['SignosVitales']["Tension Arterial Media"]}','$clienteId','$idusuario')");
	}
}

// Para los RIPS
$RIP_Nombre_Historia = "Historia_Ortodoncia";
$RIP_historia_id = $id_historia;
include 'IR_GuardarRips.php';

// Para el Recetario
$Recetario_Nombre_Historia = "Historia_Ortodoncia";
$Recetario_historia_id = $id_historia;
$Recetario_cliente_id = $clienteId;
$Recetario_usuario_id = $idusuario;
include 'RM_GuardarRecetaHistoria.php';


//registro de cie10
foreach ($_POST['DiagnosticoConsulta']['CIE10'] as $value) {
	$codigocie10 = $value;
	mysqli_query($conn3, "INSERT INTO historiaClinica9_Quirurgico_Cie10 (cliente_id,usuario_id,historiaClinica9_id,Fecha,Hora,codigo) VALUES ('$clienteId', '$idusuario', '$id_historia','$fecha_dias','$fecha_horas','$codigocie10')");
}

// registro de examenes
mysqli_query($conn3, "INSERT INTO examenesaRealizar (usuario_id,cliente_id,historia_id,laboratorio,ecografia,otros,fechaHora) 
    VALUES 
    ('$idusuario','$clienteId','$id_historia', '$Laboratorio_Examenes', '$Imagenologia_Examen', '$otros', '$fecha');");


echo "<script language='Javascript'> window.location='Finalizado_Historia_Ortodoncia?historiaClinica1=$id_historia';</script>";
