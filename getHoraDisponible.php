<?php
function getHoras($dato) {
    include "./funciones/conn3.php";
    $queryAgenda = mysqli_query($conn3, "SELECT count(idCitas) AS agendado FROM citas WHERE Hora = '{$dato->hora}' AND fecha = '{$dato->fecha}' AND estado <= '3'")->fetch_array();
    if ($queryAgenda['agendado'] == 0) {
        if ($dato->hora <> '00:00:00') {
            if ($dato->fecha == Date("Y-m-d") && $dato->hora >= Date("H:i") || $dato->fecha != Date("Y-m-d")) {
                return true;
            }
        }
    }
    return false;
}
function getHoraSelect($dato)
{
    include "./funciones/conn3.php";
    $arrayDiasSemana = [ // Array que nos facilitara el proceso de ingresar datos para la tabla config
        'Monday' => ["ld", "lh", "ldp", "lhp"], // Lunes ambos turnos
        'Tuesday' => ["md", "mh", "mdp", "mhp"], // Martes ambos turnos
        'Wednesday' => ["ed", "eh", "edp", "ehp"], // Miercoles ambos turnos
        'Thursday' => ["jd", "jh", "jdp", "jhp"], // Jueves ambos turnos
        'Friday' => ["vd", "vh", "vdp", "vhp"], // Viernes ambos turnos
        'Saturday' => ["sd", "sh", "sdp", "shp"], // Sabado ambos turnos
        'Sunday' => ["dd", "dh", "ddp", "dhp"], // Domingo ambos turnos
    ];
    $selectInputs = "";
    $queryConfig = mysqli_query($conn3, "SELECT * FROM config where ID_Usuario = {$dato->usuario_id}");
    while ($row2 = mysqli_fetch_array($queryConfig)) {
        foreach ($row2 as $key => $val) {
            $config[$key] = $val; // Extraemos el calendario del Usuario
        }
    }
    $fecha = $dato->fecha; // obtenemos la fecha ingresada
    $hoy = date("Y-m-d"); // obtenemos fecha actual
    $horaEsteMomento2 = date("H:00:00"); // hora actual
    $r = 0; // controlaremos las opciones con esta variable
    do { // cinclo encargado de recorrer los dos turnos
        $p1 = ($r == 0 ? 0 : 2); // Validamos el turno a recorrer, 0 primer turno desde; caso 2 desde validaremos segundo turno 
        $p2 = ($r == 0 ? 1 : 3); // Validamos el turno a recorrer, 1 primer turno hasta; caso 3 hasta validaremos segundo turno
        $horaM = (($fecha == $hoy && $r == 0) ? $horaEsteMomento2 : $config[$arrayDiasSemana[Date("l", strtotime($fecha))][$p1]]);
        do { // ingresamos nuevamente a un ciclo para recorrer las horas
            $horaNormal  = date("g:i a", strtotime($horaM)); // seteamos la hora, para tener un formato de 12h
            // Realizamos una consulta, validando la disponibilidad de la hora ingresada
            $queryAgenda = mysqli_query($conn3, "SELECT count(idCitas) AS agendado FROM citas WHERE Hora = '$horaM' AND fecha = '$fecha' AND estado <= '3'")->fetch_array();
            if ($queryAgenda['agendado'] == 0) { // Si no existe agendamientos a dicha hora
                if ($horaM <> '00:00:00') { // Y la hora ingresada es diferente a una hora indefinida
                    $selectInputs .= "<option value='$horaM'>$horaNormal</option>"; // Imprimimos un valor para el select de la horas
                }
            }
            $horaM =  strtotime('' . $fecha . ' ' . $horaM . ' + ' . $config['tiempoConsulta'] . ' minute'); // Incrementamos las horas segun el tiempo por consulta
            $horaM = date("H:i:s", $horaM); // Seteamos la hora al formato correcto para evitar errores
            // Por ultimo la condicion de nuestro buche se basa en recorrer la primera hora de la mañana Desde, Hasta y luego se repite ingresando al segfundo turno.
        } while (($horaM >= $config[$arrayDiasSemana[Date("l", strtotime($fecha))][$p1]] && $horaM <= $config[$arrayDiasSemana[Date("l", strtotime($fecha))][$p2]]));
        $r++; // Incrementamos en una, para alternar entre el primer turno al segundo turno
    } while ($r < 2); // Condicion que detendra dicho proceso en cuanto r sea igual a dos
    return $selectInputs; // Retornamos los valores obtenidos.
}
