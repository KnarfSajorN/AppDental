<?php

try {
  include 'funciones/conn3.php';

  
  $cita_id = $_GET['cita_id'];
  $rutanumero = $_GET['ruta'];
  if ($rutanumero == "") {
    $rutanumero = "1";
  }
  
  switch ($rutanumero) {
    case "1":
      $ruta = "agregarCitas";
      break;
    case "2":
      $ruta = "CL_Calendario.php";
      break;
    case "3":
      $user = $_GET['user'];
      $ruta = "{$Base}/webPro/calendario/agenda?idUsuario=$user";
      break;
  }
  
  $queryC = "SELECT * FROM  citas WHERE idCitas = $cita_id ";
  echo $queryC . "<br>";
  // var_dump($_GET);
  // die();
  $queryList = mysqli_query($conn3, $queryC);
  while ($rowMotorizado = mysqli_fetch_array($queryList)) {
  
    $nombre = str_replace(['"', "'"], '',$rowMotorizado['nombre']);
    $fecha = $rowMotorizado['fecha'];
    $Hora = $rowMotorizado['Hora'];
    $motivoConsulta = $rowMotorizado['motivoConsulta'];
   
    $horaF = $rowMotorizado['horaF'];
    $usuario_id = $rowMotorizado['usuario_id'];
  
    $evento_googlecalendar_id = $rowMotorizado['evento_googlecalendar_id'];
    $evento_googlecalendar_id_anterior = $rowMotorizado['evento_googlecalendar_id_anterior'];
  }
  
  $QueryMotivoC = mysqli_query($conn3, "SELECT * FROM  Motivos_Consulta WHERE id = $motivoConsulta ");
  while ($RowMotivoC = mysqli_fetch_array($QueryMotivoC)) {
    $MotivoConsulta_Texto = str_replace(['"', "'"], '',$RowMotivoC['descripcion']);
  }
  
  $queryList = mysqli_query($conn3, "SELECT * FROM  config WHERE ID_Usuario = $usuario_id ");
  while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $google_calendar_id = $rowMotorizado['google_calendar_id'];
    $CitasGoogleCalendar = $rowMotorizado['CitasGoogleCalendar'];
    $Zona_Horaria = $rowMotorizado['Zona_Horaria'];
  }
  
  
  date_default_timezone_set($Zona_Horaria);
  
  if ($CitasGoogleCalendar == "Si") {
  
    ////////////////////////////////////////////////Para los Api Google Calendar//////////////////////////////////////////////////////////////
    $Descripcion_GoogleCalendar = "Se le ha asignado una cita para el paciente: <b>{$nombre}</b> el dia <b>{$fecha}</b> a las <b>{$Hora}</b> con el motivo: <b>{$MotivoConsulta_Texto}</b> Atte DentalSoft";
  
    //importante hacer este formateo sino no funciona
    $FechaInicio = "{$fecha} {$Hora}";
    $FechaFinal = "{$fecha} {$horaF}";
  
    $datetime = date("c", strtotime($FechaInicio));
    $HoraInicio_GoogleCalendar = $datetime;
  
    $datetime1 = date("c", strtotime($FechaFinal));
    $HoraFinal_GoogleCalendar = $datetime1;
  
    $Calendario_id_GoogleCalendar = $google_calendar_id;
  
    $Arreglo_GoogleCalendar_Api = array(
      'summary' => 'Cita con el paciente ' . $nombre,
      'location' => $Zona_Horaria,
      'description' => $Descripcion_GoogleCalendar,
      'start' => array(
        'dateTime' => $HoraInicio_GoogleCalendar,
        'timeZone' => $Zona_Horaria
      ),
      'end' => array(
        'dateTime' => $HoraFinal_GoogleCalendar,
        'timeZone' => $Zona_Horaria
      )
    );
  
    if (isset($Arreglo_GoogleCalendar_Api) and $Calendario_id_GoogleCalendar != '') {
      include_once 'Api/GoogleCalendarApi/vendor/autoload.php';
      //llamar credenciales
      //include_once 'Api/GoogleCalendarApi/CredencialesApiGoogleCalendar.php';
      putenv('GOOGLE_APPLICATION_CREDENTIALS=Api/GoogleCalendarApi/credenciales.json');
  
      $client = new Google_Client();
      $client->useApplicationDefaultCredentials();
      $client->setScopes(['https://www.googleapis.com/auth/calendar']);
  
      //define id calendario
      $id_calendar = $google_calendar_id;
  
      $time_start = $Arreglo_GoogleCalendar_Api['start']['dateTime'];
      $time_end = $Arreglo_GoogleCalendar_Api['end']['dateTime'];
  
      // if para eliminar la cita en google calendar si fue la cita editada
      if($evento_googlecalendar_id_anterior!=""){
  
        try{
          $calendarService = new Google_Service_Calendar($client);
  
          if ($evento_googlecalendar_id_anterior != "") {
  
              $event1 = $calendarService->events->get($google_calendar_id, $evento_googlecalendar_id_anterior);
              $eventoprueba = $event1->getSummary();
  
              if ($eventoprueba != "") {
                  $calendarService->events->delete($google_calendar_id, $evento_googlecalendar_id_anterior);
              }
          }
        }catch(Google_Service_Exception $gs){
        
            $m1 = json_decode($gs->getMessage());
            $m1= $m1->error->message;
      
          }catch(Exception $e){
              $m1 = $e->getMessage();
            
          }
  
      }
      
      //try para saber si existe el evento en el calendario toco separarlo de abajo debido a que generaba un error en otro sistema pero en estetica si funciona, por lo que se dejo en un try aparte lo que da el problema es el obtener eventos y el numero de eventos
  
      /*
          try{
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
            $events1 = $calendarService->events->listEvents($id_calendar, $optParams);
            //obtener número de eventos / get how many events exists in the given dates
            $cont_events = count($events1->getItems());
  
            }catch(Google_Service_Exception $gs){
         
              $m = json_decode($gs->getMessage());
              $m= $m->error->message;
        
            }catch(Exception $e){
                $m = $e->getMessage();
              
            }
          */
  
  
      try {
  
        $calendarService = new Google_Service_Calendar($client);
  
        //si el evento existe en google lo elimina para no repetirlo
        if ($evento_googlecalendar_id != "") {
  
          $event1 = $calendarService->events->get($id_calendar, $evento_googlecalendar_id);
          $eventoprueba = $event1->getSummary();
  
          if ($eventoprueba != "") {
            $calendarService->events->delete($id_calendar, $evento_googlecalendar_id);
          }
        }
      } catch (Google_Service_Exception $gs) {
  
        $m1 = json_decode($gs->getMessage());
        $m1 = $m1->error->message;
      } catch (Exception $e) {
        $m1 = $e->getMessage();
      }
  
      try {
  
        $calendarService = new Google_Service_Calendar($client);
        $event = new Google_Service_Calendar_Event($Arreglo_GoogleCalendar_Api);
  
        $createdEvent = $calendarService->events->insert($id_calendar, $event);
        $id_event = $createdEvent->getId();
        $link_event = $createdEvent->gethtmlLink();
      } catch (Google_Service_Exception $gs) {
  
        $m = json_decode($gs->getMessage());
        $m = $m->error->message;
      } catch (Exception $e) {
        $m = $e->getMessage();
      }
    }
  }
  
  
  
  if ($id_event != "") {
  
    $Campo1 = mysqli_query($conn3, "show COLUMNS from citas WHERE Field = 'evento_googlecalendar_id';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
      mysqli_query($conn3, "ALTER TABLE `citas` ADD `evento_googlecalendar_id` TEXT NULL DEFAULT '' COMMENT 'id que devuelve la api de google calendar *Creado desde modulo de Citas [ApiGoogleCalendar]*'");
    }
  
    $Campo1 = mysqli_query($conn3, "show COLUMNS from citas WHERE Field = 'link_googlecalendar';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
      mysqli_query($conn3, "ALTER TABLE `citas` ADD `link_googlecalendar` TEXT NULL DEFAULT '' COMMENT 'link acceder google calendar  *Creado desde modulo de Citas [ApiGoogleCalendar]*'");
    }
  
    $query = mysqli_query($conn3, "UPDATE citas SET evento_googlecalendar_id = '$id_event', link_googlecalendar = '$link_event'  WHERE idCitas = $cita_id ");
  
    $Mensajes = "Se creo el evento en el calendario de Dentalsoft y en el calendario de Google";
  
    if ($rutanumero == 3) {
      echo "<script language='Javascript'> window.location='{$ruta}';</script>";
    } else {
      echo "<script language='Javascript'> window.location='{$ruta}?msg={$Mensajes}';</script>";
    }
  } else {
    $Mensajes = "Se creo el evento en el calendario de Dentalsoft , Pero el Google Calendar no se pudo crear";
    if ($m != "") {
      $error = "&error=Error en la clave de google calendar $m $m1";
    }
    if ($rutanumero == 3) {
      echo "<script language='Javascript'> window.location='{$ruta}';</script>";
    } else {
      echo "<script language='Javascript'> window.location='{$ruta}?msg={$Mensajes}{$error}';</script>";
    }
  }
  
} catch (\Throwable $th) {
  echo "Ocurrio un error<br>";
  echo $th->getMessage() . "<br>";
  echo "L=> " . $th->getLine() . "<br>";
}


