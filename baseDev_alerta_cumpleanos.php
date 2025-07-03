<?php
include 'funciones/funciones.php';
include 'funciones/funcionesUtilidades.php';

// ***********************************  co902  ***********************************
// ***********************************  co902  ***********************************


$fecha_actual = date("Y-m-d");


$fecha1    = $fecha_actual;

list($anyo, $mes, $dia) = explode("-", $fecha1);
$anyo_dif1  = date("Y") - $anyo;
$mes_dif1 = date("m") - $mes;
$dia_dif1   = date("d") - $dia;

echo '----------' . $fecha1 . '<br>';

$conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));

$queryList = mysqli_query($conn3, "SELECT * FROM  configPuntos");
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
  $puntosPorCumpleannos      = $rowMotorizado['puntosPorCumpleannos'];
}

$queryList = mysqli_query($conn3, "SELECT * FROM cliente");


$nrowl = mysqli_num_rows($queryList);

while ($rowMotorizado = mysqli_fetch_array($queryList)) {

    $nombre            = $rowMotorizado['nombre_cliente'];
    $numero  = $rowMotorizado['whatsapp'];
    $fechaNacimiento            = $rowMotorizado['fechaNacimiento'];
    $cliente_id            = $rowMotorizado['cliente_id'];
    $Puntos            = $rowMotorizado['Puntos'];

    $TotalPuntos = $puntosPorCumpleannos + $Puntos;

    $fecha    = $fechaNacimiento;

    list($anyo, $mes, $dia) = explode("-", $fecha);
    $anyo_dif  = date("Y") - $anyo;
    $mes_dif = date("m") - $mes;
    $dia_dif   = date("d") - $dia;

    echo '----------' . $fecha;

    if (($mes_dif == $mes_dif1) and ($dia == 1)) {

      mysqli_query($conn3,"UPDATE cliente SET 
      Puntos='$TotalPuntos'
      WHERE cliente_id = $cliente_id");

      echo "UPDATE cliente SET 
      Puntos='$TotalPuntos'
      WHERE cliente_id = $cliente_id";

    }
}



mysqli_close($conn3);
