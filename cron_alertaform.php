<?php
include 'funciones/funciones.php';
include 'funciones/funcionesUtilidades.php';
include 'whatsappPersonalizadoList.php';

// set charset iso
// mysqli_set_charset($conn3, "latin1");
// print mysql charset
// echo mysqli_character_set_name($conn3);

// mysqli_set_charset($conn3, "utf8mb4");
// <---------------Hacemos el query a nuestra base de datos de recordatorios----------------->
// <---------------y guardamos los resultados en un arreglo---------------------------------->
$queryRecordMaster = "SELECT * FROM MaestroRecordatorio 
where 1=1
and activo = 1
and (arreglo_usuarios is not null and arreglo_usuarios != '')
and (hora is not null and hora != '')
and (Mensaje is not null and Mensaje != '')
and (Zona_Horaria is not null and Zona_Horaria != '')
and tipo = 'Recordatorio'
-- and ID_principal = 1
order by id
";
$ResultQueryRM = mysqli_query($conn3, $queryRecordMaster);
$rowRecordMaster = [];
if ($ResultQueryRM) {
    while ($rowRM = mysqli_fetch_assoc($ResultQueryRM)) {
        // verificar si el usuario principal (master) esta bloqueado o vencido
        $rowRM['fechaVenceLic'] = funcionMaster($rowRM['ID_principal'], 'ID', 'fechaVenceLic', 'usuarios');
        $rowRM['vencido'] = (funcionMaster($rowRM['ID_principal'], 'ID', 'fechaVenceLic', 'usuarios') < date('Y-m-d') ? '1' : '0');
        $rowRecordMaster[] = $rowRM;
        // echo '<br>'.$rowRM['Mensaje'];
        // echo '<br>'.utf8_decode($rowRM['Mensaje']);
        // echo '<br>'.utf8_encode($rowRM['Mensaje']);
    }
}



// <---------------Hacemos un foreach para recorrer el arreglo de recordatorios y ver cuantos recordatorios existen----------------->
// <---------------y asi podremos iterarlos independientemente de la cantidad de resultados----------------------------------------->
// var_dump($rowResultCitas);

foreach ($rowRecordMaster as $rowMaster) {
    // configuracion inicial
    // zona horaria de cuando se creo el mensaje
    date_default_timezone_set($rowMaster['Zona_Horaria']);
    $fecha_actual = date("Y-m-d H:i:00");
    $fecha_con_intervalo = date("Y-m-d H:i:00", strtotime($fecha_actual . " +{$rowMaster['hora']} hours"));
    
    
    echo 'ID_principal: ', $rowMaster['ID_principal'];
    echo '<br>Zona_Horaria: ', $rowMaster['Zona_Horaria'];
    echo '<br>Fecha actual: ', $fecha_actual;
    echo '<br>Fecha nueva: ' , $fecha_con_intervalo;
    echo '<br>Horas: '       , $rowMaster['hora'];
    

    


    // <---------------Hacemos el query a nuestra base de datos de citas------------------------->
    // <---------------y guardamos los resultados en un arreglo---------------------------------->
    $queryCitas = "SELECT * FROM citas 
    where 1=1
    and fecha >= '" . substr($fecha_actual, 0, 10) . "' and fecha <= '" . substr($fecha_con_intervalo, 0, 10) . "' 
    and ID_principal = '{$rowMaster['ID_principal']}' 
    and CONCAT(fecha, ' ', Hora) = '{$fecha_con_intervalo}'
    ";
    $queryCitasList = mysqli_query($conn3, $queryCitas);
    $rowResultCitas = [];
    if ($queryCitasList) {
        while ($rowC = mysqli_fetch_assoc($queryCitasList)) {
            $rowResultCitas[] = $rowC;
        }
    }

    // si el usuario esta vencido se remplaza el mensaje por el mensaje predeterminado y las horas a 24 horas
    if ($rowMaster['vencido'] == 1) {
        $rowMaster['hora'] = 24;
        // $rowMaster['Mensaje'] = "";
    }

    $usuarios = $rowMaster['arreglo_usuarios'];
    $horaprevia = $rowMaster['hora'];
    $mensaje = $rowMaster['Mensaje'];
    $usuarios  = explode('|/|', $usuarios);
    // var_dump($mensaje);
    // <---------------Recorremos el arreglo de citas y ver cuantos existen------------------------------------------------------------->
    // <---------------y poder iterar cada una de las citas y enviarle el recordatorio correspondiente---------------------------------->
    foreach ($rowResultCitas as $rowCita) {
        $idCliente = $rowCita['idCliente'];
        $numero = $rowCita['telefono'];
        $nombre = $rowCita['nombre'];
        $doctorCita = $rowCita['doctor'];
        $fechaCita  = $rowCita['fecha'];
        $horaCita = $rowCita['Hora'];
        $fechaDeEnvio = date('Y-m-d H:i:00', strtotime($fechaCita . ' ' . $horaCita . ' - ' . $horaprevia . ' hours'));
        $mensaje = $rowMaster['Mensaje'];

        if (in_array($doctorCita, $usuarios)) {

            if ($fecha_actual == $fechaDeEnvio) {                
                $mensaje = cambiarVariablesCita($mensaje, $idCliente, $doctorCita, $rowCita['idCitas']);

                if (!is_null($link[$rowCitas['doctor']][0])) {
                    $hostW = $link[$rowCitas['doctor']][1];
                    $portW = $link[$rowCitas['doctor']][0];
                    $messageW = base64_encode($link[$rowCitas['doctor']][2]);
                    $linkkey = 'http://' . $hostW . (strpos($hostW, 'loclx') !== false ? '' : ':' . $portW) . '/send-message/' . $messageW;

                } elseif (!is_null($link[$rowCitas['ID_principal']][0])) {
                    $hostW = $link[$rowCitas['ID_principal']][1];
                    $portW = $link[$rowCitas['ID_principal']][0];
                    $messageW = base64_encode($link[$rowCitas['ID_principal']][2]);

                    $linkkey = 'http://' . $hostW . (strpos($hostW, 'loclx') !== false ? '' : ':' . $portW) . '/send-message/' . $messageW;
                }

                echo '<pre>';
                var_dump($linkkey, $numero, $mensaje);
                Whatsapp_sent_cliente($linkkey, $numero, $mensaje, 0, 0, $numero, 0);
                echo '</pre>';
            }
        }
    }
    echo '<hr>';
}
mysqli_close($conn3);
