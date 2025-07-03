<?php

$fecha 		= $_POST['fechaNacimiento'];
$Mensaje = '';
/*
list($anyo,$mes,$dia) = explode("-",$fecha);
	$anyo_dif  = date("Y") - $anyo;
	$mes_dif = date("m") - $mes;
	$dia_dif   = date("d") - $dia;
	if ($dia_dif < 0 || $mes_dif < 0) $anyo_dif;


if ($mes_dif>=0 ){ echo '<h4>'.( $anyo_dif).'Años </h4>';} else {

	echo  '<h4>'.($anyo_dif-1).'Años </h4>';
}
*/

$fecha = $_POST['fechaNacimiento'];

function Edad_Paciente($fecha_nacimiento)
{
    date_default_timezone_set('America/Bogota');
    $nacimiento = new DateTime($fecha_nacimiento);
    $ahora = new DateTime(date("Y-m-d"));
    $diferencia = $ahora->diff($nacimiento);

    $Respuesta = [];

    if ($nacimiento <= $ahora) {

        $Respuesta = [];
        if (
            $diferencia->format("%y") > 7
        ) {
            $Respuesta["Años"] = $diferencia->format("%y");
        } elseif ($diferencia->format("%y") <= 7 and $diferencia->format("%y") >= 1) {
            $Respuesta["Años"] = $diferencia->format("%y");
            $Respuesta["Meses"] = $diferencia->format("%m");
        } elseif ($diferencia->format("%y") < 1) {
            $Respuesta["Meses"] = $diferencia->format("%m");
            $Respuesta["Dias"] = $diferencia->format("%d");
            if ($Respuesta["Meses"] == "0" and $Respuesta["Dias"] == "0") {
                $Respuesta[""] = "Dia Actual de Nacimiento";
            }
        }

        foreach ($Respuesta as $key => $value) {
            if ($value == "0") {
                unset($Respuesta[$key]);
            }
        }
    } else {
        $Respuesta[""] = "La Fecha de Nacimiento es Mayor a la Actual";
    }


    //$Respuesta["Años"] = $diferencia->format("%y");
    //$Respuesta["Meses"] = $diferencia->format("%m");
    //$Respuesta["Dias"] = $diferencia->format("%d");

    return $Respuesta;
}

$Edad = Edad_Paciente("{$fecha}");

foreach ($Edad as $key => $value) {
    $Mensaje .= "{$value} {$key}, ";
}
$Mensaje = trim($Mensaje, ', ');
echo $Mensaje.".";
?>




