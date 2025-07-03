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

foreach ($_POST['Imagenologia_Examen'] as $key => $value) {
    $Imagenologia_Examen .= $value . ',';
}
//echo $Imagenologia_Examen.'<br>';

foreach ($_POST['Laboratorio_Examenes'] as $key => $value) {
    $Laboratorio_Examenes .= $value . ',';
}
//echo $Laboratorio_Examenes.'<br>';

foreach (array_filter($_POST['SignosVitales'], 'removeEmptyElements') as $key => $value) {
    $SignosVitales .= $key . ": " . $value . '<br>';
}
//echo $SignosVitales.'<br>';

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
$motivoConsulta = $_POST['motivoConsulta'];
$indicaciones = $_POST['indicaciones'];
$medidas = $_POST['medidas'];
$evolucionClinica = $_POST['evolucionClinica'];

//registro de la historia clinica
$queryResulto = mysqli_query($conn3, "INSERT INTO  historiaHospitalizacion (idCliente, idDoctor, motivoConsulta, signosVitales, indicaciones, medidas, Imagenologia_Examen, Laboratorio_Examenes, evolucionClinica, RecetaId) VALUES  ('$clienteId', '$idusuario', '$motivoConsulta', '$SignosVitales', '$indicaciones', '$medidas', '$Imagenologia_Examen', '$Laboratorio_Examenes', '$evolucionClinica', '$RecetaId');");
$id_historia = mysqli_insert_id($conn3);

$RIP_Nombre_Historia = "historiaHospitalizacion";
$RIP_historia_id = $id_historia;
include 'IR_GuardarRips.php';


if ($queryResulto) {
    echo "<script language='Javascript'> window.location='finalizadoHistoriaHospitalizacion.php?historiaClinica1=$id_historia';</script>";
} else {
    var_dump(mysqli_error_list($conn3));
}
