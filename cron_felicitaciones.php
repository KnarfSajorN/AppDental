<?php
include 'funciones/funciones.php';
include 'funciones/funcionesUtilidades.php';
include 'whatsappPersonalizadoList.php';

//aqui vamos a buscar los recordatorios que tengan de tipo Cumpleanos para ver cuales existen

//preparamos el query
$queryRecordMaster = "SELECT * FROM MaestroRecordatorio 
where 1=1
and activo = 1
and (arreglo_usuarios is not null and arreglo_usuarios != '')
and (hora is not null and hora != '')
and (Mensaje is not null and Mensaje != '')
and (Zona_Horaria is not null and Zona_Horaria != '')
and tipo = 'Cumpleanos'
-- and ID_principal = 1
order by id
";

//ejecutamos el query y guardamos el resultado en un array
$result = mysqli_query($conn3, $queryRecordMaster);
$rowRecordMaster = [];
while ($row = mysqli_fetch_assoc($result)) {
    $rowRecordMaster[] = $row;
}
// echo '<pre>';
// print_r($rowRecordMaster);
// echo '</pre>';

//recorremos el array para ver los resultados que esta arrojando en este caso
foreach ($rowRecordMaster as $rowMaster) {

    date_default_timezone_set($rowMaster['Zona_Horaria']);
    $fecha_actual = date("Y-m-d H:i:00");
    $fecha_FormateadaActual = new dateTime($fecha_actual);//FORMATEAMOS LA FECHA PARA Q NO SEA UN STRING SINO UN FORMATO DATE
    $fecha_con_intervalo = date("Y-m-d H:i:00", strtotime($fecha_actual . " +{$rowMaster['hora']} hours"));//intervalo de horas para el envio
    $ID_principal = $rowMaster['ID_principal'];
    $mensaje = $rowMaster['Mensaje'];
    $usuarios = $rowMaster['arreglo_usuarios'];
    $usuarios  = explode('|/|', $usuarios);
    $horaprevia = $rowMaster['hora'];
    // var_dump($usuarios);

    //preparamos el query para los cliente que cumplan en el mes y al dia proporcionados
    $queryCliente = "SELECT cliente_id, usuario_id, nombre_cliente, fechaNacimiento,whatsapp from cliente where 1=1 and DATE_FORMAT(fechaNacimiento , '%m-%d') = DATE_FORMAT(CURDATE(), '%m-%d')";
    //  echo $queryCliente;
    //  echo $horaprevia;
    // exit();
    //ejecutamos el query y guardamos el resultado en un array
    $resultCliente = mysqli_query($conn3, $queryCliente);
    if($resultCliente){
        $rowCliente = [];
        while ($row = mysqli_fetch_assoc($resultCliente)) {
            $rowCliente[] = $row;
        }
    } else{
        echo 'no se pudo conectar a la base de datos';
    }
   
    
    // echo '<pre>';
    // print_r($rowCliente);
    // echo '</pre>';
    //recorremos el array para ver los resultados que esta arrojando en este caso
    foreach ($rowCliente as $row) {
        $cliente_id = $row['cliente_id'];
        $fecha_nacimiento = $row['fechaNacimiento'];

         $fecha_envio = date('m-d H:i:00', strtotime($fecha_nacimiento . ' + ' . $horaprevia . ' hours'));

        $fecha_nacimiento_formateada = new dateTime($row['fechaNacimiento']);
        $fecha_actual = $fecha_FormateadaActual->format("m-d H:i:00");
     $fecha_envio = '02-28 11:41:00';
        // echo '<pre>';
        // var_dump($fecha_actual);
        // echo '</pre>';
        // echo '<pre>';
        // var_dump($fecha_envio);
        // echo '</pre>';
      
      
        if ($fecha_actual == $fecha_envio) {
            if (in_array($row['usuario_id'], $usuarios)) { //verificamos si el cliente pertenece a los usuarios que esta en el arreglo
                if ($fecha_FormateadaActual->format("m-d") == $fecha_nacimiento_formateada->format("m-d")) { //si la fecha del hoy coincide con la fecha de nacimiento pasa y le enviamos el mensaje
                    $mensajeW = cambiarVariables($mensaje, $cliente_id, $row['usuario_id']);
                    $numero = $row['whatsapp'];
                    // echo $mensajeW;
                    // $numero = '584121705867';
                    // echo $row['nombre_cliente'];
                    if (!is_null($link[$row['usuario_id']][0])) {
                        $hostW = $link[$row['usuario_id']][1];
                        $portW = $link[$row['usuario_id']][0];
                        $messageW = base64_encode($link[$row['usuario_id']][2]);
                        $linkkey = 'http://' . $hostW . (strpos($hostW, 'loclx') !== false ? '' : ':' . $portW) . '/send-message/' . $messageW;
                    } elseif (!is_null($link[$row['ID_principal']][0])) {
                        $hostW = $link[$row['ID_principal']][1];
                        $portW = $link[$row['ID_principal']][0];
                        $messageW = base64_encode($link[$rowCitas['ID_principal']][2]);

                        $linkkey = 'http://' . $hostW . (strpos($hostW, 'loclx') !== false ? '' : ':' . $portW) . '/send-message/' . $messageW;
                    }

                    // echo '<pre>';
                    // var_dump($linkkey, $numero, $mensaje);
                      Whatsapp_sent_cliente($linkkey, $numero, $mensajeW, 0, 0, $numero, 0);
                    // echo '</pre>';
                    sleep(2);
                } else {
                }
            }
        }
    }
}
