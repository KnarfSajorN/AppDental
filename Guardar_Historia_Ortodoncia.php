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


//array_filter($_POST['InformacionAcudiente'], 'removeEmptyElements') -> esto se usa para  eliminar campos vacios en un array
foreach (array_filter($_POST['InformacionAcudiente'], 'removeEmptyElements') as $key => $value) {
	$InformacionAcudiente .= $key . ": " . $value . '<br>';
}
//echo $InformacionAcudiente.'<br>';

foreach (array_filter($_POST['EnfermedadActual'], 'removeEmptyElements') as $key => $value) {
	$EnfermedadActual .= $key . ": " . $value . '<br>';
}
//echo $EnfermedadActual.'<br>';


foreach (array_filter($_POST['Checks_Antecedentes'], 'removeEmptyElements') as $key => $value) {
	$Checks_Antecedentes .= $key . ": " . $value . '<br>';
}
//echo $Checks_Antecedentes.'<br>';

// foreach (array_filter($_POST['Checks_Antecedentes'], 'removeEmptyElements') as $key => $value) {
// 	$Checks_Antecedentes .= '<b>' . $key . '</b>:<br>';
// 	foreach ($value as $key1 => $value1) {
// 		$Checks_Antecedentes .= $value1 . '<br>';
// 	}
// }
//echo $Checks_Antecedentes.'<br>';

// foreach (array_filter($_POST['AntecentesGinecobstetricos'], 'removeEmptyElements') as $key => $value) {
// 	$AntecentesGinecobstetricos .= $key . ": " . $value . '<br>';
// }
//echo $AntecentesGinecobstetricos.'<br>';
foreach (array_filter($_POST['Checks_Revision'], 'removeEmptyElements') as $key => $value) {
	$Checks_Revision .= $key . ": " . $value . '<br>';
}
//echo $Checks_Revision.'<br>';

// foreach (array_filter($_POST['AntecedentesFamiliares'], 'removeEmptyElements') as $key => $value) {
// 	$AntecedentesFamiliares .= '<b>Antecedente Familiar #' . $key . '</b>:<br>';
// 	foreach ($value as $key1 => $value1) {
// 		if (is_array($_POST['AntecedentesFamiliares'][$key][$key1])) {
// 			$AntecedentesFamiliares .= '<CIE10>' . $key1 . '<br>';
// 			foreach ($value1 as $key2 => $value2) {
// 				$AntecedentesFamiliares .= $value2 . '&nbsp;,&nbsp;';
// 			}
// 			$AntecedentesFamiliares .= '</CIE10><br>';
// 		} else {
// 			$AntecedentesFamiliares .= $key1 . ": " . $value1 . '<br>';
// 			echo "entro";
// 		}
// 	}
// }
//echo $AntecedentesFamiliares.'<br>';

// foreach (array_filter($_POST['Checks_Revision'], 'removeEmptyElements') as $key => $value) {
// 	$Checks_Revision .= '<b>' . $key . '</b>:<br>';
// 	foreach ($value as $key1 => $value1) {
// 		$Checks_Revision .= $value1 . '<br>';
// 	}
// }
//echo $Checks_Revision.'<br>';

// foreach (array_filter($_POST['SignosVitales'], 'removeEmptyElements') as $key => $value) {
// 	$SignosVitales .= $key . ": " . $value . '<br>';
// }
//echo $SignosVitales.'<br>';
// foreach (array_filter($_POST['AP2'], 'removeEmptyElements') as $key => $value) {
// 	$AP2 .= $key . ": " . $value . '<br>';
// }
//echo $AP2.'<br>';


// $paraclinicos_arreglo = json_decode($_POST['Arreglo_Paraclinicos'], true);
// foreach (array_filter($paraclinicos_arreglo, 'removeEmptyElements') as $key => $value) {
// 	$Paraclinicos .= '<b>Paraclinico #' . $key . '</b>:<br>';
// 	foreach ($value as $key1 => $value1) {
// 		$Paraclinicos .= $key1 . " : " . $value1 . '<br>';
// 	}
// }
//echo $Paraclinicos.'<br>';

foreach ($_POST['Imagenologia_Examen'] as $key => $value) {
	$Imagenologia_Examen .= $value . ',';
}
//echo $Imagenologia_Examen.'<br>';

foreach ($_POST['Laboratorio_Examenes'] as $key => $value) {
	$Laboratorio_Examenes .= $value . ',';
}
//echo $Laboratorio_Examenes.'<br>';



// foreach (array_filter($_POST['ExamenFisico'], 'removeEmptyElements') as $key => $value) {

// 	$contador = "0";
// 	$caracteres_examenfisico = strlen($ExamenFisico);
// 	$ExamenFisico .= '<b>' . $key . '</b>:<br>';

// 	foreach ($value as $key1 => $value1) {
// 		if ($_POST['ExamenFisico'][$key][0] == "No Evaluado") {
// 			$ExamenFisicoTemporal .= $value1 . '<br>';
// 			$contador++;
// 		} else {
// 			$ExamenFisico .= $value1 . '<br>';
// 		}
// 	}
// 	if ($contador > 1) {
// 		$ExamenFisico .= $ExamenFisicoTemporal;
// 		$ExamenFisicoTemporal = "";
// 	} elseif ($contador == '1') {
// 		$ExamenFisicoTemporal = "";
// 		$caracteres_restar = strlen($ExamenFisico) - $caracteres_examenfisico;
// 		$ExamenFisico = substr($ExamenFisico, 0, -$caracteres_restar);
// 	}
// }
//echo $ExamenFisico.'<br>';

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
//echo $PlanManejo.'<br>';

// $incapacidades_arreglo = json_decode($_POST['Arreglo_Incapacidades'], true);
// foreach (array_filter($incapacidades_arreglo, 'removeEmptyElements') as $key => $value) {
// 	$Incapacidades .= '<b>Incapacidades #' . $key . '</b>:<br>';
// 	foreach ($value as $key1 => $value1) {
// 		$Incapacidades .= $key1 . " : " . $value1 . '<br>';
// 	}
// }
//echo $Incapacidades.'<br>';

// $insumos_arreglo = json_decode($_POST['Arreglo_Insumos'], true);
// foreach (array_filter($insumos_arreglo, 'removeEmptyElements') as $key => $value) {
// 	$Insumos .= '<b>Insumos #' . $key . '</b>:<br>';
// 	foreach ($value as $key1 => $value1) {
// 		$Insumos .= $key1 . " : " . $value1 . '<br>';
// 	}
// }
// foreach (array_filter($_POST['AP1'], 'removeEmptyElements') as $key => $value) {
// 	$AP1 .= $key . ": " . $value . '<br>';
// }
//echo $AP1.'<br>';

// foreach (array_filter($_POST['SI1'], 'removeEmptyElements') as $key => $value) {
// 	$SI1 .= $key . ": " . $value . '<br>';
// }
//echo $SI1.'<br>';

// foreach (array_filter($_POST['BL1'], 'removeEmptyElements') as $key => $value) {
// 	$BL1 .= $key . ": " . $value . '<br>';
// }
//echo $BL1.'<br>';

// foreach (array_filter($_POST['SP1'], 'removeEmptyElements') as $key => $value) {
// 	$SP1 .= $key . ": " . $value . '<br>';
// }
//echo $SP1.'<br>';

// foreach (array_filter($_POST['BLM1'], 'removeEmptyElements') as $key => $value) {
// 	$BLM1 .= $key . ": " . $value . '<br>';
// }
//echo $BLM1.'<br>';

// foreach (array_filter($_POST['IDis1'], 'removeEmptyElements') as $key => $value) {
// 	$IDis1 .= $key . ": " . $value . '<br>';
// }
//echo $IDis1.'<br>';

// foreach (array_filter($_POST['ICD1'], 'removeEmptyElements') as $key => $value) {
// 	$ICD1 .= $key . ": " . $value . '<br>';
// }
//echo $ICD1.'<br>';


// foreach (array_filter($_POST['BLM2'], 'removeEmptyElements') as $key => $value) {
// 	$BLM2 .= $key . ": " . $value . '<br>';
// }
//echo $BLM2.'<br>';

// foreach (array_filter($_POST['SI2'], 'removeEmptyElements') as $key => $value) {
// 	$SI2 .= $key . ": " . $value . '<br>';
// }
//echo $SI2.'<br>';

// foreach (array_filter($_POST['PO1'], 'removeEmptyElements') as $key => $value) {
// 	$PO1 .= $key . ": " . $value . '<br>';
// }
//echo $PO1.'<br>';

// foreach (array_filter($_POST['LM'], 'removeEmptyElements') as $key => $value) {
// 	$LM .= $key . ": " . $value . '<br>';
// }
//echo $LM.'<br>';

// foreach (array_filter($_POST['LM1'], 'removeEmptyElements') as $key => $value) {
// 	$LM1 .= $key . ": " . $value . '<br>';
// }
//echo $LM1.'<br>';

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

$img1 = $_POST['img1'];

// if ($_POST['niño2']) {
// 	$imgEscalaTanner = $_POST['niño2'];
// 	if ($_POST['niño2'] == 1) {
// 		$textEscalaTanner = '<b>Estadio 1</b>. Sin vello púbico, Testicúlos y Pene infantil.';
// 	} else if ($_POST['niño2'] == 2) {
// 		$textEscalaTanner = '<b>Estadio 2</b>. Aumento del escroto y testículos, piel del escroto enrojecida y arrugada, pene infantil vello púbico escaso en la base del pene.';
// 	} else if ($_POST['niño2'] == 3) {
// 		$textEscalaTanner = '<b>Estado 3</b>. Alargamiento y engrosamiento del pene. Aumento de testículos y escroto. Vello sobre pubis rizado, grueso y oscuro.';
// 	} else if ($_POST['niño2'] == 4) {
// 		$textEscalaTanner = '<b>Estado 4</b>. Ensanchamiento del pene y del glande, aumento de testículos, aumento y oscurecimiento del escroto. Vello púbico adulto que no cubre los muslos.';
// 	} else if ($_POST['niño2'] == 5) {
// 		$textEscalaTanner = '<b>Estado 5</b>. Genitales Adultos. Vello adulto que se extiende a zona medial de muslos.';
// 	} else {
// 	}
// }
// if ($_POST['niña2']) {
// 	$imgEscalaTanner = $_POST['niña2'];
// 	if ($_POST['niña2'] == 1) {
// 		$textEscalaTanner = '<b>Estadio 1</b>. Pecho infantil, no vello púbico.';
// 	} else if ($_POST['niña2'] == 2) {
// 		$textEscalaTanner = '<b>Estadio 2</b>. Botón mamario, vello púbico no rizado escaso, en labios mayores.';
// 	} else if ($_POST['niña2'] == 3) {
// 		$textEscalaTanner = '<b>Estadio 3</b>. Aumento y elevación de pecho y areola. Vello rizado, basto y oscuro sobre pubis.';
// 	} else if ($_POST['niña2'] == 4) {
// 		$textEscalaTanner = '<b>Estadio 4</b>. Areola y pezón sobreelevado sobre mama. Vello púbico tipo adulto no sobre muslos.';
// 	} else if ($_POST['niña2'] == 5) {
// 		$textEscalaTanner = '<b>Estadio 5</b>. Pecho Adulto, areola no sobreelevada. Vello adulto zona medial muslo.';
// 	} else {
// 	}
// }



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

$AP1 = $_POST['AP1'];
if ($AP1 == '') {
	$AP1 = 0;
}
$AP2 = $_POST['AP2'];
if ($AP2 == '') {
	$AP2 = 0;
}
$AP3 = $_POST['AP3'];
if ($AP3 == '') {
	$AP3 = 0;
}
$AP4 = $_POST['AP4'];
if ($AP4 == '') {
	$AP4 = 0;
}
$AP5 = $_POST['AP5'];
if ($AP5 == '') {
	$AP5 = 0;
}
$AP6 = $_POST['AP6'];
if ($AP6 == '') {
	$AP6 = 0;
}
$AP7 = $_POST['AP7'];
if ($AP7 == '') {
	$AP7 = 0;
}
$AP8 = $_POST['AP8'];
if ($AP8 == '') {
	$AP8 = 0;
}
$SI1 = $_POST['SI1'];
if ($SI1 == '') {
	$SI1 = 0;
}
$SI2 = $_POST['SI2'];
if ($SI2 == '') {
	$SI2 = 0;
}
$SI3 = $_POST['SI3'];
if ($SI3 == '') {
	$SI3 = 0;
}
$SI4 = $_POST['SI4'];
if ($SI4 == '') {
	$SI4 = 0;
}
$SI5 = $_POST['SI5'];
if ($SI5 == '') {
	$SI5 = 0;
}
$SI7 = $_POST['SI7'];
if ($SI7 == '') {
	$SI7 = 0;
}
$SI8 = $_POST['SI8'];
if ($SI8 == '') {
	$SI8 = 0;
}
$BL1 = $_POST['BL1'];
if ($BL1 == '') {
	$BL1 = 0;
}
$BL2 = $_POST['BL2'];
if ($BL2 == '') {
	$BL2 = 0;
}
$BL3 = $_POST['BL3'];
if ($BL3 == '') {
	$BL3 = 0;
}
$BL4 = $_POST['BL4'];
if ($BL4 == '') {
	$BL4 = 0;
}
$BL5 = $_POST['BL5'];
if ($BL5 == '') {
	$BL5 = 0;
}
$BL7 = $_POST['BL7'];
if ($BL7 == '') {
	$BL7 = 0;
}
$BL8 = $_POST['BL8'];
if ($BL8 == '') {
	$BL8 = 0;
}
$SP3 = $_POST['SP3'];
if ($SP3 == '') {
	$SP3 = 0;
}
$SP4 = $_POST['SP4'];
if ($SP4 == '') {
	$SP4 = 0;
}
$SP7 = $_POST['SP7'];
if ($SP7 == '') {
	$SP7 = 0;
}
$SP8 = $_POST['SP8'];
if ($SP8 == '') {
	$SP8 = 0;
}
$BLM1 = $_POST['BLM1'];
if ($BLM1 == '') {
	$BLM1 = 0;
}
$BLM2 = $_POST['BLM2'];
if ($BLM2 == '') {
	$BLM2 = 0;
}
$IDis3 = $_POST['IDis3'];
if ($IDis3 == '') {
	$IDis3 = 0;
}
$IDis4 = $_POST['IDis4'];
if ($IDis4 == '') {
	$IDis4 = 0;
}
$IDis7 = $_POST['IDis7'];
if ($IDis7 == '') {
	$IDis7 = 0;
}
$IDis8 = $_POST['IDis8'];
if ($IDis8 == '') {
	$IDis8 = 0;
}
$ELO1 = $_POST['ELO1'];
if ($ELO1 == '') {
	$ELO1 = 0;
}
$ELO2 = $_POST['ELO2'];
if ($ELO2 == '') {
	$ELO2 = 0;
}
$ELO3 = $_POST['ELO3'];
if ($ELO3 == '') {
	$ELO3 = 0;
}
$ELO4 = $_POST['ELO4'];
if ($ELO4 == '') {
	$ELO4 = 0;
}
$ElementoBL = $_POST['ElementoBL'];
if ($ElementoBL == '') {
	$ElementoBL = 0;
}
$ELBL4 = $_POST['ELBL4'];
if ($ELBL4 == '') {
	$ELBL4 = 0;
}
$ELOS1 = $_POST['ELOS1'];
if ($ELOS1 == '') {
	$ELOS1 = 0;
}
$ELOS2 = $_POST['ELOS2'];
if ($ELOS2 == '') {
	$ELOS2 = 0;
}
$ELOS3 = $_POST['ELOS3'];
if ($ELOS3 == '') {
	$ELOS3 = 0;
}
$ELOS4 = $_POST['ELOS4'];
if ($ELOS4 == '') {
	$ELOS4 = 0;
}
$ELPO1 = $_POST['ELPO1'];
if ($ELPO1 == '') {
	$ELPO1 = 0;
}
$ELPO2 = $_POST['ELPO2'];
if ($ELPO2 == '') {
	$ELPO2 = 0;
}
$Co_GoI = $_POST['Co_GoI'];
if ($Co_GoI == '') {
	$Co_GoI = 0;
}
$CO_MEI = $_POST['CO_MEI'];
if ($CO_MEI == '') {
	$CO_MEI = 0;
}
$Co_GoD = $_POST['Co_GoD'];
if ($Co_GoD == '') {
	$Co_GoD = 0;
}
$CO_MED = $_POST['CO_MED'];
if ($CO_MED == '') {
	$CO_MED = 0;
}
$total = $_POST['total'];
if ($total == '') {
	$total = 0;
}
$Total_O = $_POST['Total_O'];
if ($Total_O == '') {
	$Total_O = 0;
}
$Total_R = $_POST['Total_R'];
if ($Total_R == '') {
	$Total_R = 0;
}
$Total_G = $_POST['Total_G'];
if ($Total_G == '') {
	$Total_G = 0;
}
$SubTotalI = $_POST['SubTotalI'];
if ($SubTotalI == '') {
	$SubTotalI = 0;
}
$SubTotalD = $_POST['SubTotalD'];
if ($SubTotalD == '') {
	$SubTotalD = 0;
}
$TotalesGO = $_POST['TotalesGO'];
if ($TotalesGO == '') {
	$TotalesGO = 0;
}
$LM5 = $_POST['LM5'];
if ($LM5 == '') {
	$LM5 = 0;
}
$LM7 = $_POST['LM7'];
if ($LM7 == '') {
	$LM7 = 0;
}
$LM1 = $_POST['LM1'];
if ($LM1 == '') {
	$LM1 = 0;
}
$LM2 = $_POST['LM2'];
if ($LM2 == '') {
	$LM2 = 0;
}
$LM3 = $_POST['LM3'];
if ($LM3 == '') {
	$LM3 = 0;
}
$LM4 = $_POST['LM4'];
if ($LM4 == '') {
	$LM4 = 0;
}
$LM6 = $_POST['LM6'];
if ($LM6 == '') {
	$LM6 = 0;
}
$LM8 = $_POST['LM8'];
if ($LM8 == '') {
	$LM8 = 0;
}

$id_tablaOrtodoncia = 0;

$Total_T = $_POST['Total_T'];
if ($Total_T == '') {
	$Total_T = 0;
}

if ($total != 0 || $Total_O != 0 || $Total_R != 0 || $Total_G != 0 || $SubTotalI != 0 || $SubTotalD != 0 || $TotalesGO != 0) {

$query = "INSERT INTO tablaOrtodoncia(cliente_id,usuario_id, AP1, AP2, AP3, AP4, AP5, AP6, AP7, AP8, SI1, SI2, SI3, SI4, SI5, SI7, SI8, BL1, BL2, BL3, BL4, BL5, BL7, BL8, SP3, SP4,SP7, SP8, BLM1, BLM2, IDis3, IDis4, IDis7, IDis8,Total_T,Total_O,Total_R,Total_G,Co_GoI,CO_MEI,Co_GoD,CO_MED,SubTotalI,SubTotalD,TotalesGO,ELO1,ELO2,ELO3,ELO4,ElementoBL,ELBL4,ELOS1,ELOS2,ELOS3,ELOS4,ELPO1,ELPO2,LM5,LM7,LM1,LM2,LM3,LM4,LM6,LM8) VALUES ($clienteId, $idusuario, $AP1, $AP2, $AP3, $AP4, $AP5, $AP6, $AP7, $AP8, $SI1, $SI2, $SI3, $SI4, $SI5, $SI7, $SI8, '$BL1', $BL2, $BL3, '$BL4', $BL5, $BL7, $BL8, $SP3, $SP4, $SP7, $SP8, $BLM1, $BLM2, $IDis3, $IDis4, $IDis7, $IDis8,$Total_T,$Total_O,$Total_R,$Total_G,$Co_GoI,$CO_MEI,$Co_GoD,$CO_MED,$SubTotalI,$SubTotalD,$TotalesGO,$ELO1,'$ELO2,$ELO3,$ELO4,$ElementoBL,$ELBL4,$ELOS1,$ELOS2',$ELOS3,$ELOS4,$ELPO1,$ELPO2,$LM5,$LM7,$LM1,$LM2,$LM3,$LM4,$LM6,$LM8);";
$enlace_actual = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$enlace_actual = str_replace('.php', '', $enlace_actual);

auditorMaster($idusuario, '1', $enlace_actual, $query);



	$queryinsert_tablaOrtodoncia = "INSERT INTO tablaOrtodoncia(cliente_id,usuario_id, AP1, AP2, AP3, AP4, AP5, AP6, AP7, AP8, SI1, SI2, SI3, SI4, SI5, SI7, SI8, BL1, BL2, BL3, BL4, BL5, BL7, BL8, SP3, SP4,SP7, SP8, BLM1, BLM2, IDis3, IDis4, IDis7, IDis8,Total_T,Total_O,Total_R,Total_G,Co_GoI,CO_MEI,Co_GoD,CO_MED,SubTotalI,SubTotalD,TotalesGO,ELO1,ELO2,ELO3,ELO4,ElementoBL,ELBL4,ELOS1,ELOS2,ELOS3,ELOS4,ELPO1,ELPO2,LM5,LM7,LM1,LM2,LM3,LM4,LM6,LM8) VALUES ('$clienteId', '$idusuario', '$AP1', '$AP2', '$AP3', '$AP4', '$AP5', '$AP6', '$AP7', '$AP8', '$SI1', '$SI2', '$SI3', '$SI4', '$SI5', '$SI7', '$SI8', '$BL1', '$BL2', '$BL3', '$BL4', '$BL5', '$BL7', '$BL8', '$SP3', '$SP4', '$SP7', '$SP8', '$BLM1', '$BLM2', '$IDis3', '$IDis4', '$IDis7', '$IDis8','$Total_T','$Total_O','$Total_R','$Total_G','$Co_GoI','$CO_MEI','$Co_GoD','$CO_MED','$SubTotalI','$SubTotalD','$TotalesGO','$ELO1','$ELO2','$ELO3','$ELO4','$ElementoBL','$ELBL4','$ELOS1','$ELOS2','$ELOS3','$ELOS4','$ELPO1','$ELPO2','$LM5','$LM7','$LM1','$LM2','$LM3','$LM4','$LM6','$LM8');";
	// echo "INSERT INTO tablaOrtodoncia(cliente_id,usuario_id, AP1, AP2, AP3, AP4, AP5, AP6, AP7, AP8, SI1, SI2, SI3, SI4, SI5, SI7, SI8, BL1, BL2, BL3, BL4, BL5, BL7, BL8, SP3, SP4,SP7, SP8, BLM1, BLM2, IDis3, IDis4, IDis7, IDis8,Total_T,Total_O,Total_R,Total_G,Co_GoI,CO_MEI,Co_GoD,CO_MED,SubTotalI,SubTotalD,TotalesGO,ELO1,ELO2,ELO3,ELO4,ElementoBL,ELBL4,ELOS1,ELOS2,ELOS3,ELOS4,ELPO1,ELPO2,LM5,LM7,LM1,LM2,LM3,LM4,LM6,LM8) VALUES ('$clienteId', '$idusuario', '$AP1', '$AP2', '$AP3', '$AP4', '$AP5', '$AP6', '$AP7', '$AP8', '$SI1', '$SI2', '$SI3', '$SI4', '$SI5', '$SI7', '$SI8', '$BL1', '$BL2', '$BL3', '$BL4', '$BL5', '$BL7', '$BL8', '$SP3', '$SP4', '$SP7', '$SP8', '$BLM1', '$BLM2', '$IDis3', '$IDis4', '$IDis7', '$IDis8','$Total_T','$Total_O','$Total_R','$Total_G','$Co_GoI','$CO_MEI','$Co_GoD','$CO_MED','$SubTotalI','$SubTotalD','$TotalesGO','$ELO1','$ELO2','$ELO3','$ELO4','$ElementoBL','$ELBL4','$ELOS1','$ELOS2','$ELOS3','$ELOS4','$ELPO1','$ELPO2','$LM5','$LM7','$LM1','$LM2','$LM3','$LM4','$LM6','$LM8')";


	mysqli_query($conn3,$queryinsert_tablaOrtodoncia); 

	$id_tablaOrtodoncia = mysqli_insert_id($conn3);

	/*
	$queryListhc=mysqli_query($conn3,"SELECT MAX(id) as id_tablaOrtodoncia from tablaOrtodoncia where cliente_id= $clienteId");
//  echo "SELECT MAX(id) as id_tablaOrtodoncia from Historia_Ortodoncia where cliente_id= $clienteId";
	$nrowl=mysqli_num_rows($queryListhc);
	while($rowhc=mysqli_fetch_array($queryListhc))
	{
	  $id_tablaOrtodoncia=$rowhc['id_tablaOrtodoncia'];
	}

	if($id_tablaOrtodoncia == '')
	{
		$id_tablaOrtodoncia = 0;

	}
	*/

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
///////////////////////////////////////////////////////////////////////////////////////////////////////////
$query = "INSERT INTO  Historia_Ortodoncia (fecha, cliente_id, usuario_id, InformacionAcudiente,    EnfermedadActual, Checks_Antecedentes, AntecentesGinecobstetricos , AntecedentesFamiliares, Checks_Revision, SignosVitales, Paraclinicos, Imagenologia_Examen, Laboratorio_Examenes, ExamenFisico, OrganoSentidos, SintomasGenerales, DiagnosticoAcupuntura, DiagnosticoConsulta, Impresion, PlanManejo, Incapacidades, Insumos, RecetaId,AP1,SI1,BL1,SP1,BLM1,IDis1,ICD1,BLM2,SI2,PO1,LM,LM1,img1,AP2,LM2,LM3,LM4,LM5,LM6,LM7,Modal_Presupuesto,sucursal,id_tablaOrtodoncia) VALUES  
($fecha, $clienteId, $idusuario, $InformacionAcudiente, $EnfermedadActual, $Checks_Antecedentes, $AntecentesGinecobstetricos, $AntecedentesFamiliares,  $Checks_Revision, $SignosVitales, $Paraclinicos,$Imagenologia_Examen, $Laboratorio_Examenes,$ExamenFisico,$OrganoSentidos, $SintomasGenerales, $DiagnosticoAcupuntura,$DiagnosticoConsulta, $Impresion, $PlanManejo, $Incapacidades,$Insumos,$RecetaId,$AP1,$SI1,$BL1,$SP1,$BLM1,$IDis1,$ICD1,$BLM2,$SI2,$PO1,$LM,$LM1,$img1,$AP2,$LM2,$LM3,$LM4,$LM5,$LM6,$LM7, $Modal_Presupuesto,$sucursal,$id_tablaOrtodoncia);";
$enlace_actual = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$enlace_actual = str_replace('.php', '', $enlace_actual);

auditorMaster($idusuario, '1', $enlace_actual, $query);
//registro de la historia clinica
mysqli_query($conn3, "INSERT INTO  Historia_Ortodoncia (fecha, cliente_id, usuario_id, InformacionAcudiente,    EnfermedadActual, Checks_Antecedentes, AntecentesGinecobstetricos , AntecedentesFamiliares, Checks_Revision, SignosVitales, Paraclinicos, Imagenologia_Examen, Laboratorio_Examenes, ExamenFisico, OrganoSentidos, SintomasGenerales, DiagnosticoAcupuntura, DiagnosticoConsulta, Impresion, PlanManejo, Incapacidades, Insumos, RecetaId,AP1,SI1,BL1,SP1,BLM1,IDis1,ICD1,BLM2,SI2,PO1,LM,LM1,img1,AP2,LM2,LM3,LM4,LM5,LM6,LM7,Modal_Presupuesto,sucursal,id_tablaOrtodoncia) VALUES  
('$fecha', '$clienteId', '$idusuario', '$InformacionAcudiente',  '$EnfermedadActual', '$Checks_Antecedentes', '$AntecentesGinecobstetricos', '$AntecedentesFamiliares',  '$Checks_Revision', '$SignosVitales', '$Paraclinicos','$Imagenologia_Examen', '$Laboratorio_Examenes','$ExamenFisico','$OrganoSentidos', '$SintomasGenerales', '$DiagnosticoAcupuntura','$DiagnosticoConsulta', '$Impresion', '$PlanManejo', '$Incapacidades','$Insumos','$RecetaId','$AP1','$SI1','$BL1','$SP1','$BLM1','$IDis1','$ICD1','$BLM2','$SI2','$PO1','$LM','$LM1','$img1','$AP2','$LM2','$LM3','$LM4','$LM5','$LM6','$LM7', '$Modal_Presupuesto','$sucursal','$id_tablaOrtodoncia');");

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
