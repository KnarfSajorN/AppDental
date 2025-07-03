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


// //array_filter($_POST['InformacionAcudiente'], 'removeEmptyElements') -> esto se usa para  eliminar campos vacios en un array
// foreach (array_filter($_POST['InformacionAcudiente'], 'removeEmptyElements') as $key => $value) {
//     $InformacionAcudiente .= $key.": ".$value.'<br>';
// }
// //echo $InformacionAcudiente.'<br>';

// foreach (array_filter($_POST['EnfermedadActual'], 'removeEmptyElements') as $key => $value) {
//     $EnfermedadActual .= $key.": ".$value.'<br>';
// }
// //echo $EnfermedadActual.'<br>';

// foreach (array_filter($_POST['Checks_Antecedentes'], 'removeEmptyElements') as $key => $value) {
// 	$Checks_Antecedentes .= '<b>'.$key.'</b>:<br>';
// 	foreach ($value as $key1 => $value1) {
//         $Checks_Antecedentes .= $value1.'<br>';
// 	}
// }
// //echo $Checks_Antecedentes.'<br>';

// foreach (array_filter($_POST['AntecentesGinecobstetricos'], 'removeEmptyElements') as $key => $value) {
//     $AntecentesGinecobstetricos .= $key.": ".$value.'<br>';
// }
// //echo $AntecentesGinecobstetricos.'<br>';

// foreach (array_filter($_POST['AntecedentesFamiliares'], 'removeEmptyElements') as $key => $value) {
// 	$AntecedentesFamiliares .= '<b>Antecedente Familiar #'.$key.'</b>:<br>';
// 	foreach ($value as $key1 => $value1) {
// 		if(is_array($_POST['AntecedentesFamiliares'][$key][$key1]))
// 		{
// 			$AntecedentesFamiliares .= '<CIE10>'.$key1.'<br>';
// 			foreach ($value1 as $key2 => $value2){
// 			$AntecedentesFamiliares .= $value2.'&nbsp;,&nbsp;';
// 			}
// 			$AntecedentesFamiliares.='</CIE10><br>';
// 		}
// 		else
// 		{
// 			$AntecedentesFamiliares .= $key1.": ".$value1.'<br>';
//       echo "entro";	
// 		}

// 	}
// }
// //echo $AntecedentesFamiliares.'<br>';

// foreach (array_filter($_POST['Checks_Revision'], 'removeEmptyElements') as $key => $value) {
// 	$Checks_Revision .= '<b>'.$key.'</b>:<br>';
// 	foreach ($value as $key1 => $value1) {
//         $Checks_Revision .= $value1.'<br>';
// 	}
// }
// //echo $Checks_Revision.'<br>';

foreach (array_filter($_POST['SignosVitales'], 'removeEmptyElements') as $key => $value) {
    $SignosVitales .= $key.": ".$value.'<br>';
}
//echo $SignosVitales.'<br>';


// $paraclinicos_arreglo = json_decode($_POST['Arreglo_Paraclinicos'], true);
// foreach (array_filter($paraclinicos_arreglo, 'removeEmptyElements') as $key => $value) {
// 	$Paraclinicos .= '<b>Paraclinico #'.$key.'</b>:<br>';
// 	foreach ($value as $key1 => $value1) {
//         $Paraclinicos .= $key1." : ".$value1.'<br>';
// 	}
// }
// //echo $Paraclinicos.'<br>';

foreach ($_POST['Imagenologia_Examen'] as $key => $value) {
    $Imagenologia_Examen .= $value.',';
}
//echo $Imagenologia_Examen.'<br>';

foreach ($_POST['Laboratorio_Examenes'] as $key => $value) {
    $Laboratorio_Examenes .= $value.',';
}
//echo $Laboratorio_Examenes.'<br>';



// foreach (array_filter($_POST['ExamenFisico'], 'removeEmptyElements') as $key => $value) {

// 	$contador="0";
// 	$caracteres_examenfisico = strlen($ExamenFisico);
// 	$ExamenFisico .= '<b>'.$key.'</b>:<br>';

// 	foreach ($value as $key1 => $value1) {
// 		if($_POST['ExamenFisico'][$key][0] == "No Evaluado")
// 		{
// 			$ExamenFisicoTemporal .= $value1.'<br>';
// 			$contador++;
// 		}
// 		else
// 		{
// 			$ExamenFisico .= $value1.'<br>';
// 		}

// 	}
// 	if($contador>1)
// 	{
// 		$ExamenFisico.=$ExamenFisicoTemporal;
//     $ExamenFisicoTemporal="";
// 	}
// 	elseif($contador=='1')
// 	{
// 		$ExamenFisicoTemporal="";
// 		$caracteres_restar = strlen($ExamenFisico)-$caracteres_examenfisico;
// 		$ExamenFisico = substr($ExamenFisico,0,-$caracteres_restar); 
// 	}
// }
// //echo $ExamenFisico.'<br>';

// foreach (array_filter($_POST['OrganoSentidos'], 'removeEmptyElements') as $key => $value) {
//     $OrganoSentidos .= $key.": ".$value.'<br>';
// }
// //echo $OrganoSentidos.'<br>';

// foreach (array_filter($_POST['SintomasGenerales'], 'removeEmptyElements') as $key => $value) {
//     $SintomasGenerales .= $key.": ".$value.'<br>';
// }
// //echo $SintomasGenerales.'<br>';

// foreach (array_filter($_POST['DiagnosticoAcupuntura'], 'removeEmptyElements') as $key => $value) {
//     $DiagnosticoAcupuntura .= $key.": ".$value.'<br>';
// }
// //echo $DiagnosticoAcupuntura.'<br>';

// foreach (array_filter($_POST['DiagnosticoConsulta'], 'removeEmptyElements') as $key => $value) {
//     if(is_array($value))
//     {
//     	$DiagnosticoConsulta .= '<CIE10-2>'.$key.'</b><br>';
//     	foreach ($value as $key1 => $value1){
//     	$DiagnosticoConsulta .= $value1.'&nbsp;,&nbsp;';
//     	}
//     	$DiagnosticoConsulta.='</CIE10-2><br>';
//     }
//     else
//     {
//     	$DiagnosticoConsulta .= $key.": ".$value.'<br>';	
//     }
// }
// //echo $DiagnosticoConsulta.'<br>';

// foreach (array_filter($_POST['Impresion'], 'removeEmptyElements') as $key => $value) {
//     $Impresion .= $key." : ".$value.'<br>';
// }
// //echo $Impresion.'<br>';

// foreach (array_filter($_POST['PlanManejo'], 'removeEmptyElements') as $key => $value) {
//     $PlanManejo .= $key." : ".$value.'<br>';
// }
// //echo $PlanManejo.'<br>';

// $incapacidades_arreglo = json_decode($_POST['Arreglo_Incapacidades'], true);
// foreach (array_filter($incapacidades_arreglo, 'removeEmptyElements') as $key => $value) {
// 	$Incapacidades .= '<b>Incapacidades #'.$key.'</b>:<br>';
// 	foreach ($value as $key1 => $value1) {
//         $Incapacidades .= $key1." : ".$value1.'<br>';
// 	}
// }
// //echo $Incapacidades.'<br>';

// $insumos_arreglo = json_decode($_POST['Arreglo_Insumos'], true);
// foreach (array_filter($insumos_arreglo, 'removeEmptyElements') as $key => $value) {
// 	$Insumos .= '<b>Insumos #'.$key.'</b>:<br>';
// 	foreach ($value as $key1 => $value1) {
//         $Insumos .= $key1." : ".$value1.'<br>';
// 	}
// }
//echo $Insumos.'<br>';

// informacion General //

// date_default_timezone_set('America/Bogota');

//si tiene informacion es por que se hizo una receta
$receta_validacion = $_POST['idOper']; // esta variable corresponde a una input que trae el ajax al momento de genera una receta
$receta = $_POST['receta'];
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
$tratamiento = $_POST['tratamiento'];
$interconsulta = $_POST['interconsulta'];
$motivoConsulta = $_POST['motivoConsulta'];

//registro de la historia clinica
$queryResulto = mysqli_query($conn3, "INSERT INTO  historiaEmergencia (idCliente, idDoctor, motivoConsulta, signosVitales, tratamiento, Imagenologia_Examen, Laboratorio_Examenes, interconsulta, RecetaId) VALUES  ('$clienteId', '$idusuario', '$motivoConsulta', '$SignosVitales', '$tratamiento', '$Imagenologia_Examen', '$Laboratorio_Examenes', '$interconsulta', '$RecetaId');");
$id_historia = mysqli_insert_id($conn3);


$RIP_Nombre_Historia = "historiaEmergencia";
$RIP_historia_id = $id_historia;
include 'IR_GuardarRips.php';


if ($queryResulto){
    echo "<script language='Javascript'> window.location='finalizadoHistoriaEmergencia.php?historiaClinica1=$id_historia';</script>";
} else {
    var_dump(mysqli_error_list($conn3));
}

// registro de examenes
// mysqli_query($conn3, "INSERT INTO examenesaRealizar (usuario_id,cliente_id,historia_id,laboratorio,ecografia,otros,fechaHora) 
//     VALUES 
//     ('$idusuario','$clienteId','$id_historia', '$Laboratorio_Examenes', '$Imagenologia_Examen', '$otros', '$fecha');");


