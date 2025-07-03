<?php
include 'funciones/funciones.php';
include 'funciones/funcionesUtilidades.php';
date_default_timezone_set('America/Bogota');
$_POST = DatosIngresarMysqli($_POST);

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

function TablasHTML($thead, $arreglo, $saltosfinales)
{

	$arreglo = DatosIngresarMysqli($arreglo);
	$contador = "0";
	$TablaDinamica = "<table class=\'tg\' style=\'width:100%\'><thead>{$thead}</thead><tbody>";
	foreach ($arreglo as $key => $value) {
		$TablaDinamica .= "<tr>";
		//$LogoAudiometria .= $key.": ".$value.'<br>';
		$TablaDinamica .= "<td>{$key}</td>";
		foreach ($value as $key1 => $value1) {
			$TablaDinamica .= "<td>{$value1}</td>";
			if ($value1 <> "") {
				$contador++;
			}
		}
		$TablaDinamica .= "</tr>";
	}
	$TablaDinamica .= "</tbody></table>";

	if ($contador == "0") {
		$Tabla = "<div style=\'display:none;\'>{$TablaDinamica}</div>";
	} else {
		$Tabla = $TablaDinamica;
	}

	return $Tabla . $saltosfinales;
}

function TablasHTMLV2($thead, $arreglo, $saltosfinales)
{

	$arreglo = DatosIngresarMysqli($arreglo);
	$contador = "0";
	$TablaDinamica = "<table class=\'tg\' style=\'width:100%\'><thead>{$thead}</thead><tbody>";
	foreach ($arreglo as $key => $value) {
		$TablaDinamica .= "<tr>";

		foreach ($arreglo as $key => $value) {
			$TablaDinamica .= "<td>{$key}</td>";
			foreach ($value as $key1 => $value1) {
				foreach ($value1 as $key2 => $value2) {
					$TablaDinamica .= "<td colspan=\'{$key2}\'>{$value2}</td>";
					if ($value2 <> "") {
						$contador++;
					}
				}
			}
			$TablaDinamica .= "</tr>";
		}
		$TablaDinamica .= "</tbody></table>";

		if ($contador == "0") {
			$Tabla = "<div style=\'display:none;\'>{$TablaDinamica}</div>";
		} else {
			$Tabla = $TablaDinamica;
		}

		return $Tabla . $saltosfinales;
	}
}

function TablasHTMLV3($thead, $arreglo, $saltosfinales)
{

	$arreglo = DatosIngresarMysqli($arreglo);
	$contador = "0";
	$TablaDinamica = "<table class=\'tg\' style=\'width:100%\'><thead>{$thead}</thead><tbody>";
	foreach ($arreglo as $key => $value) {
		$TablaDinamica .= "<tr>";

		foreach ($arreglo as $key => $value) {
			$TablaDinamica .= "<td>{$key}</td>";
			foreach ($value as $key1 => $value1) {
				foreach ($value1 as $key2 => $value2) {
					$TablaDinamica .= "<td colspan=\'{$key2}\'>{$value2}</td>";
					if ($value2 <> "") {
						$contador++;
					}
				}
			}
			$TablaDinamica .= "</tr>";
		}
		$TablaDinamica .= "</tbody></table>";

		if ($contador == "0") {
			$Tabla = "<div style=\'display:none;\'>{$TablaDinamica}</div>";
		} else {
			$Tabla = $TablaDinamica;
		}

		return $Tabla . $saltosfinales;
	}
}


$Antecedentes_Personales_Audiologicos = TablasHTMLV2("<tr><th>Antecedentes Personales</th><th>Si</th><th>No</th><th>Descripción</th></tr>", $_POST["AntecedentesPersonalesAudiologicos"], "<br>");

$Antecedentes_Otologicos = TablasHTMLV2("<tr><th>Antecedentes Otológicos</th><th>Si</th><th>No</th><th>Oído Derecho</th><th>Oído Izquierdo</th><th>Descripción</th></tr>", $_POST["AntecedentesOtologicos"], "<br>");

$Caracteristicas_Subjetivas_Audicion = TablasHTMLV2("<tr><th>Características Subjetivas de la Audición</th><th>Si</th><th>No</th><th>Descripción</th></tr>", $_POST["CaracteristicasSubjetivasAudicion"], "<br>");

$Antecedentes_Laborales_Audiologia = TablasHTMLV2("<tr><th>Antecedentes Laborales</th><th>Si</th><th>No</th><th>Descripción</th></tr>", $_POST["AntecedentesLaboralesAudiologia"], "<br>");

$Habitos_Audiologia = TablasHTMLV2("<tr><th>Hábitos</th><th>Si</th><th>No</th><th>Descripción</th></tr>", $_POST["HabitosAudiologia"], "<br>");

$Antecedentes_Extralaborales_Audiologia = TablasHTMLV2("<tr><th>Antecedentes Extralaborales</th><th>SI</th><th>NO</th><th>Descripción</th></tr>", $_POST["AntecedentesExtralaboralesAudiologia"], "<br>");

$Antecedentes_Extralaborales_Audiologia_2 = TablasHTMLV2("<tr><th>Otoscopia</th><th>Oído Derecho</th><th>Oído Izquierdo</th></tr>", $_POST["AntecedentesExtralaboralesAudiologia_2"], "<br>");

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function array_remove_null($array)
{
	if ($array <> '') {
		foreach ($array as $key => $value) {
		if (is_null($value))
			unset($array[$key]);
		if (is_string($value) && (empty($value) or $value == " " or $value == ""))
			unset($array[$key]);
		if (is_array($value))
			$array[$key] = array_remove_null($value);

		if (isset($array[$key]) && (is_array($array[$key]) || $array[$key] instanceof Countable) && count($array[$key]) == 0)
			unset($array[$key]);
		
		}
	}else{
		$array = [];
	}
	
	return $array;
}

function InformacionArreglo($arreglo)
{
	$Texto = "";
	$contador = 0;
	foreach ($arreglo as $key => $value) {
		if (is_array($value)) {
			$Texto .= "<label>{$key}</label><br>";
			$Texto .= InformacionArreglo($value);
		} else {
			$Texto .= $key . ":" . $value . "<br>";
		}

		if ($value <> "") {
			$contador++;
		}
	}
	if ($contador == "0") {
		$Texto = "<div style=\'display:none;\'>{$Texto}</div>";
	} else {
		$Texto = "<div>{$Texto}</div>";
	}

	return $Texto;
}

$AnamnesisTinnitus = InformacionArreglo(array_remove_null(DatosIngresarMysqli($_POST["AnamnesisTinnitus"])));


/////////////////////////////////////////////////////////////////////////////////////


$AntecedentesPediatricos = InformacionArreglo(array_remove_null(DatosIngresarMysqli($_POST["AntecedentesPediatricos"])));
$AntecedentesOtologicosPediatria = TablasHTMLV2("<tr><th>Antecedentes Otológicos</th><th>Si</th><th>No</th><th>Oído Derecho</th><th>Oído Izquierdo</th><th>Descripción</th></tr>", DatosIngresarMysqli($_POST["AntecedentesOtologicosPediatria"]), "<br>");
$AntecedentesOtologicosPediatria_1 = InformacionArreglo(array_remove_null(DatosIngresarMysqli($_POST["AntecedentesOtologicosPediatria_1"])));
$CaracteristicasSubjetivasAudicionPediatria = TablasHTMLV2("<tr><th>Características Subjetivas de la Audición<th>Si</th><th>No</th><th>Descripción</th></tr>", DatosIngresarMysqli($_POST["CaracteristicasSubjetivasAudicionPediatria"]), "<br>");
$HabitosPediatria = TablasHTMLV2("<tr><th>Hábitos<th>Si</th><th>No</th><th>Descripción</th></tr>", DatosIngresarMysqli($_POST["HabitosPediatria"]), "<br>");
$UsoProtesisPediatria = TablasHTMLV2("<tr><th>Uso de Prótesis Auditiva<th>Si</th><th>No</th><th>Descripción</th></tr>", DatosIngresarMysqli($_POST["UsoProtesisPediatria"]), "<br>");
$OtoscopiaPediatria = TablasHTMLV2("<tr><th>Configuración Pabellón Auricular</th><th>Oído Derecho</th><th>Oído Izquierdo</th></tr>", DatosIngresarMysqli($_POST["OtoscopiaPediatria_1"]), "<br>");

$OtoscopiaPediatria .= TablasHTMLV2("<tr><th>Configuración Conducto Auditivo Externo</th><th>Oído Derecho</th><th>Oído Izquierdo</th></tr>", DatosIngresarMysqli($_POST["OtoscopiaPediatria_2"]), "<br>");
$OtoscopiaPediatria .= TablasHTMLV2("<tr><th>Membrana Timpánica</th><th>Oído Derecho</th><th>Oído Izquierdo</th></tr>", DatosIngresarMysqli($_POST["OtoscopiaPediatria_3"]), "<br>");

echo $OtoscopiaPediatria;

$fecha = date("Y-m-d H:i:s");
$clienteId = $_POST['clienteId'];
$usuario_id = $_POST['ID'];
$idusuario = $_POST['ID'];


$queryAuditor = "INSERT INTO  Historia_Clinica_Audiologica (fecha, cliente_id, usuario_id,
    Antecedentes_Personales_Audiologicos,Antecedentes_Otologicos,Caracteristicas_Subjetivas_Audicion,Antecedentes_Laborales_Audiologia,Habitos_Audiologia,Antecedentes_Extralaborales_Audiologia,Antecedentes_Extralaborales_Audiologia_2,
    AnamnesisTinnitus,
    AntecedentesPediatricos,AntecedentesOtologicosPediatria,AntecedentesOtologicosPediatria_1,CaracteristicasSubjetivasAudicionPediatria,HabitosPediatria,UsoProtesisPediatria,OtoscopiaPediatria) 
    VALUES  ('$fecha', '$clienteId', '$usuario_id',
    '$Antecedentes_Personales_Audiologicos','$Antecedentes_Otologicos','$Caracteristicas_Subjetivas_Audicion','$Antecedentes_Laborales_Audiologia','$Habitos_Audiologia','$Antecedentes_Extralaborales_Audiologia','$Antecedentes_Extralaborales_Audiologia_2',
    '$AnamnesisTinnitus',
    '$AntecedentesPediatricos','$AntecedentesOtologicosPediatria','$AntecedentesOtologicosPediatria_1','$CaracteristicasSubjetivasAudicionPediatria','$HabitosPediatria','$UsoProtesisPediatria','$OtoscopiaPediatria'";
$queryAuditor = str_replace("'", '', $queryAuditor);
$enlace_actual = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$enlace_actual = str_replace('.php', '', $enlace_actual);
//echo $queryAuditor;

auditorMaster($idusuario, '1', $enlace_actual, $queryAuditor);

mysqli_query($conn3, "INSERT INTO  Historia_Clinica_Audiologica (fecha, cliente_id, usuario_id,
    Antecedentes_Personales_Audiologicos,Antecedentes_Otologicos,Caracteristicas_Subjetivas_Audicion,Antecedentes_Laborales_Audiologia,Habitos_Audiologia,Antecedentes_Extralaborales_Audiologia,Antecedentes_Extralaborales_Audiologia_2,
    AnamnesisTinnitus,
    AntecedentesPediatricos,AntecedentesOtologicosPediatria,AntecedentesOtologicosPediatria_1,CaracteristicasSubjetivasAudicionPediatria,HabitosPediatria,UsoProtesisPediatria,OtoscopiaPediatria) 
    VALUES  ('$fecha', '$clienteId', '$usuario_id',
    '$Antecedentes_Personales_Audiologicos','$Antecedentes_Otologicos','$Caracteristicas_Subjetivas_Audicion','$Antecedentes_Laborales_Audiologia','$Habitos_Audiologia','$Antecedentes_Extralaborales_Audiologia','$Antecedentes_Extralaborales_Audiologia_2',
    '$AnamnesisTinnitus',
    '$AntecedentesPediatricos','$AntecedentesOtologicosPediatria','$AntecedentesOtologicosPediatria_1','$CaracteristicasSubjetivasAudicionPediatria','$HabitosPediatria','$UsoProtesisPediatria','$OtoscopiaPediatria');") or die(mysqli_error($conn3));



$id_historia = mysqli_insert_id($conn3);

//mysqli_query($conn3, "UPDATE Historia_Clinica_Audiologica SET Antecedentes_Personales_Audiologicos = '$Antecedentes_Personales_Audiologicos', 	Antecedentes_Otologicos ='$Antecedentes_Otologicos', Caracteristicas_Subjetivas_Audicion='$Caracteristicas_Subjetivas_Audicion', Antecedentes_Laborales_Audiologia='$Antecedentes_Laborales_Audiologia', Habitos_Audiologia='$Habitos_Audiologia', Antecedentes_Extralaborales_Audiologia='$Antecedentes_Extralaborales_Audiologia', Antecedentes_Extralaborales_Audiologia_2='$Antecedentes_Extralaborales_Audiologia_2' WHERE id ='$id_historia'");

//mysqli_query($conn3, "UPDATE Historia_Clinica_Audiologica SET AnamnesisTinnitus = '$AnamnesisTinnitus'  WHERE id ='$id_historia'");

//mysqli_query($conn3, "UPDATE Historia_Clinica_Audiologica SET AntecedentesPediatricos = '$AntecedentesPediatricos', AntecedentesOtologicosPediatria = '$AntecedentesOtologicosPediatria',  AntecedentesOtologicosPediatria_1 ='$AntecedentesOtologicosPediatria_1', CaracteristicasSubjetivasAudicionPediatria='$CaracteristicasSubjetivasAudicionPediatria', HabitosPediatria='$HabitosPediatria', UsoProtesisPediatria='$UsoProtesisPediatria', OtoscopiaPediatria='$OtoscopiaPediatria'  WHERE id ='$id_historia'");


echo "<script language='Javascript'> window.location='HA_Finalizado_HistoriaAudiologica.php?historiaClinica1=$id_historia';</script>";