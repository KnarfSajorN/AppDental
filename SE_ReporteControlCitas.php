<?php
function funcionMaster($filtro, $campoFiltrar, $campoImprimir, $tabla)
{
    include 'funciones/conn3.php';
    $query = mysqli_query($conn3, "SELECT * FROM $tabla where $campoFiltrar = '$filtro'");
    $nrowl = mysqli_num_rows($query);
    while ($row = mysqli_fetch_array($query)) {

        $text = $row[$campoImprimir];
    }
    return  $text;
}
header('Content-Type: application/vnd.ms-excel; charset=UTF-8');
header('Content-Disposition: attachment; filename=ReporteControlCitas.xls');
include 'funciones/conn3.php';

$desde = $_POST['desde'];
$hasta = $_POST['hasta'];

//desde y hasta con el formato d/m/a

echo '<table border="1" cellpadding="2" cellspacing="0" width="100%">
    <tr>
        <td>Doctor</td>
        <td>Paciente</td>
        <td>Motivo </td>
        <td>Hora en Sala</td>
        <td>Hora Entrada</td>
        <td>Hora Salida</td>
        <td>Tiempo en Sala</td>
        <td>Tiempo en Cita</td>
    </tr>';

$queryListaH = mysqli_query($conn3, "SELECT * FROM citas where fecha BETWEEN '$desde' and '$hasta' AND cita_sala_espera=1");
while ($rowListaH = mysqli_fetch_array($queryListaH)){
    
    $Doctor = $rowListaH['doctor'];
    $NombreDoctor = funcionMaster($Doctor, 'ID', 'NOMBRE_USUARIO', 'usuarios');
    $nombre = $rowListaH['nombre'];
    $motivoConsulta = funcionMaster($rowListaH['motivoConsulta'],'id','descripcion','Motivos_Consulta');
    $horallegada = $rowListaH['horallegada'];
    $horaatencion = $rowListaH['horaatencion'];
    $horafinalizada = $rowListaH['horafinalizada'];

    /*
    // Convierte las horas en timestamps
    $Hora_L = strtotime($horallegada);
    $Hora_A = strtotime($horaatencion);
    $Hora_F = strtotime($horafinalizada);

    if ($Hora_L !== false && $Hora_A !== false) {
        // Calcula la diferencia en segundos
        $diferencia = abs($Hora_A - $Hora_L);
        // Convierte la diferencia en minutos
        $TiempoSala = $diferencia / 60;
    }

    if ($Hora_A !== false && $Hora_F !== false) {
        // Calcula la diferencia en segundos
        $diferencia = abs($Hora_F - $Hora_A);
        // Convierte la diferencia en minutos
        $TiempoCita = $diferencia / 60;
    }
    */
    /*
    // Divide las horas en componentes (horas, minutos y segundos)
    list($horas1, $minutos1, $segundos1) = explode(":", $horallegada);
    list($horas2, $minutos2, $segundos2) = explode(":", $horaatencion);

    // Calcula la diferencia en minutos
    $tiempo1 = $horas1 * 3600 + $minutos1 * 60 + $segundos1;
    $tiempo2 = $horas2 * 3600 + $minutos2 * 60 + $segundos2;

    if ($tiempo1 <= $tiempo2) {
        $diferencia_segundos = $tiempo2 - $tiempo1;
    } else {
        $diferencia_segundos = $tiempo2 + (24 * 3600) - $tiempo1; // Si la hora final es anterior a la inicial, se asume que es al día siguiente.
    }

    $TiempoSala = $diferencia_segundos / 60;

    // Calcula la diferencia en segundos
    $segundos_inicio = $horas1 * 3600 + $minutos1 * 60 + $segundos1;
    $segundos_fin = $horas2 * 3600 + $minutos2 * 60 + $segundos2;
    $diferencia_segundos = abs($segundos_fin - $segundos_inicio);

    // Calcula la diferencia en minutos
    $TiempoCita = $diferencia_segundos / 60;

    */
    $TiempoSalafinal=0;
    if($horallegada!="" AND $horaatencion!=""){
    $to_time = strtotime($horallegada);
    $from_time = strtotime($horaatencion);
    $TiempoSala = round(abs($to_time - $from_time) / 60,2);
    $segundos = abs($to_time - $from_time); // Diferencia en segundos
    
    $minutos = floor($segundos / 60); // Obtén los minutos
    $segundos = $segundos % 60; // Obtén los segundos restantes

    $TiempoSalafinal="Minutos: $minutos - Segundos: $segundos";
    }

    $TiempoCitafinal=0;
    if($horaatencion!="" AND $horafinalizada!=""){
    $to_time = strtotime($horaatencion);
    $from_time = strtotime($horafinalizada);
    $TiempoCita = round(abs($to_time - $from_time) / 60,2);
    $segundos = abs($to_time - $from_time); // Diferencia en segundos
    
    $minutos = floor($segundos / 60); // Obtén los minutos
    $segundos = $segundos % 60; // Obtén los segundos restantes

    $TiempoCitafinal="Minutos: $minutos - Segundos: $segundos";
    }

    echo "  <tr>
        <td>$Doctor </td>
        <td>$nombre </td>
        <td>$motivoConsulta</td>
        <td>$horallegada</td>
        <td>$horaatencion</td>
        <td>$horafinalizada</td>
        <td>$TiempoSalafinal</td>
        <td>$TiempoCitafinal</td>
        </tr>";

    
    }


echo "</table>";

?>