<?php
include 'funciones/conn3.php';  

$cita_id = $_GET['cita_id'];
$ruta = $_GET['ruta'];
if($ruta==""){$ruta = "agregarCitas";}
$queryList=mysqli_query($conn3,"SELECT * FROM  citas WHERE idCitas = $cita_id ");
while($rowMotorizado=mysqli_fetch_array($queryList))
{

    $nombre = $rowMotorizado['nombre'];
    $fecha = $rowMotorizado['fecha'];
    $Hora = $rowMotorizado['Hora'];
    $motivoConsulta = $rowMotorizado['motivoConsulta'];
    $horaF = $rowMotorizado['horaF'];
    $usuario_id = $rowMotorizado['usuario_id'];

}

$queryList=mysqli_query($conn3,"SELECT * FROM  config WHERE ID_Usuario = $usuario_id ");
while($rowMotorizado=mysqli_fetch_array($queryList)){
    $google_calendar_id = $rowMotorizado['google_calendar_id'];
    $CitasGoogleCalendar = $rowMotorizado['CitasGoogleCalendar'];
}

if ($CitasGoogleCalendar == "Si") {

    ////////////////////////////////////////////////Para los Api Google Calendar//////////////////////////////////////////////////////////////
    $Descripcion_GoogleCalendar = "Se le ha asignado una cita para el paciente: <b>{$nombre}</b> el dia <b>{$fecha}</b> a las <b>{$Hora}</b> con el motivo: <b>{$motivoConsulta}</b> Atte MedicalSoft";

    //importante hacer este formateo sino no funciona
    $FechaInicio = "{$fecha} {$Hora}";
    $FechaFinal = "{$fecha} {$horaF}";

    date_default_timezone_get('America/Bogota');

    $datetime = date("c", strtotime($FechaInicio));
    $HoraInicio_GoogleCalendar = $datetime;

    $datetime1 = date("c", strtotime($FechaFinal));
    $HoraFinal_GoogleCalendar = $datetime1;

    $Calendario_id_GoogleCalendar = $google_calendar_id;

    $Arreglo_GoogleCalendar_Api = array(
        'summary' => 'Cita con el paciente ' . $nombre,
        'location' => 'Prueba1',
        'description' => $Descripcion_GoogleCalendar,
        'start' => array(
            'dateTime' => $HoraInicio_GoogleCalendar,
            'timeZone' => 'America/Bogota',
        ),
        'end' => array(
            'dateTime' => $HoraFinal_GoogleCalendar,
            'timeZone' => 'America/Bogota',
        )
    );





    if (isset($Arreglo_GoogleCalendar_Api) and $Calendario_id_GoogleCalendar != '') {

        //date_default_timezone_get('America/Bogota');

        include_once '../Api/GoogleCalendarApi/vendor/autoload.php';
        //llamar credenciales
        //include_once '../Api/GoogleCalendarApi/CredencialesApiGoogleCalendar.php';
        putenv('GOOGLE_APPLICATION_CREDENTIALS=../Api/GoogleCalendarApi/credenciales.json');

        $client = new Google_Client();
        $client->useApplicationDefaultCredentials();
        $client->setScopes(['https://www.googleapis.com/auth/calendar']);

        //define id calendario
        $id_calendar = $Calendario_id_GoogleCalendar;

        $time_start = $Arreglo_GoogleCalendar_Api['start']['dateTime'];
        $time_end = $Arreglo_GoogleCalendar_Api['end']['dateTime'];

        //instanciamos el servicio
        $calendarService = new Google_Service_Calendar($client);

        //parámetros para buscar eventos en el rango de las fechas del nuevo evento
        //params to search events in the given dates
        $optParams = array(
            'orderBy' => 'startTime',
            'maxResults' => 20,
            'singleEvents' => TRUE,
            'timeMin' => $time_start,
            'timeMax' => $time_end,
        );

        //obtener eventos 
        $events = $calendarService->events->listEvents($id_calendar, $optParams);

        //obtener número de eventos / get how many events exists in the given dates
        $cont_events = count($events->getItems());

        //crear evento si no hay eventos / create event only if there is no event in the given dates

        //validacion so exoste un evento en ese rango de fechas
        /*
    if ($cont_events == 0) {
        $event = new Google_Service_Calendar_Event($Arreglo_GoogleCalendar_Api);

        $createdEvent = $calendarService->events->insert($id_calendar, $event);
        $id_event = $createdEvent->getId();
        $link_event = $createdEvent->gethtmlLink();
    } else {
        $m = "Hay " . $cont_events . " eventos en ese rango de fechas";
    }
    */

        $event = new Google_Service_Calendar_Event($Arreglo_GoogleCalendar_Api);

        $createdEvent = $calendarService->events->insert($id_calendar, $event);
        $id_event = $createdEvent->getId();
        $link_event = $createdEvent->gethtmlLink();
    }
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

}


if($id_event!=""){

        $Campo1 = mysqli_query($conn3, "show COLUMNS from citas WHERE Field = 'evento_googlecalendar_id';");
        $nrowCampo1 = mysqli_num_rows($Campo1);if ($nrowCampo1 == "0") {mysqli_query($conn3, "ALTER TABLE `citas` ADD `evento_googlecalendar_id` TEXT NULL DEFAULT '' COMMENT 'id que devuelve la api de google calendar *Creado desde modulo de Citas [ApiGoogleCalendar]*'");}

        $Campo1 = mysqli_query($conn3, "show COLUMNS from citas WHERE Field = 'link_googlecalendar';");
        $nrowCampo1 = mysqli_num_rows($Campo1);if ($nrowCampo1 == "0") {mysqli_query($conn3, "ALTER TABLE `citas` ADD `link_googlecalendar` TEXT NULL DEFAULT '' COMMENT 'link acceder google calendar  *Creado desde modulo de Citas [ApiGoogleCalendar]*'");}

        $query = mysqli_query($conn3,"UPDATE citas SET evento_googlecalendar_id = '$id_event', link_googlecalendar = '$link_event'  WHERE idCitas = $cita_id ");
    
        $Mensajes = "Se creo el evento en el calendario de Medical y en el calendario de Google";
    
    //echo "<script language='Javascript'> window.location='{$ruta}.php?msg={$Mensajes}';</script>";

}
else{
    $Mensajes = "Se creo el evento en el calendario de Medical";
    //echo "<script language='Javascript'> window.location='{$ruta}.php?msg={$Mensajes}';</script>";
}





?>