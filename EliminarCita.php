<?php
include 'funciones/conn3.php';

$idCitas = $_GET['idCitas'];

$queryList = mysqli_query($conn3, "SELECT * FROM  citas WHERE idCitas = $idCitas ");
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $evento_googlecalendar_id = $rowMotorizado['evento_googlecalendar_id'];
    $usuario_id = $rowMotorizado['usuario_id'];
}

$queryList = mysqli_query($conn3, "SELECT * FROM  config WHERE ID_Usuario = $usuario_id ");
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $google_calendar_id = $rowMotorizado['google_calendar_id'];
}

//mysqli_query($conn3, "DELETE FROM citas WHERE idCitas = $idCitas");
mysqli_query($conn3, "UPDATE citas SET estado = '5' WHERE idCitas = $idCitas LIMIT 1");

if($evento_googlecalendar_id!=""){

    include_once '../Api/GoogleCalendarApi/vendor/autoload.php';
    //llamar credenciales
    //include_once '../Api/GoogleCalendarApi/CredencialesApiGoogleCalendar.php';
    putenv('GOOGLE_APPLICATION_CREDENTIALS=../Api/GoogleCalendarApi/credenciales.json');

    $client = new Google_Client();
    $client->useApplicationDefaultCredentials();
    $client->setScopes(['https://www.googleapis.com/auth/calendar']);
    
    try{
        $calendarService = new Google_Service_Calendar($client);

        if ($evento_googlecalendar_id != "") {

            $event1 = $calendarService->events->get($google_calendar_id, $evento_googlecalendar_id);
            $eventoprueba = $event1->getSummary();

            if ($eventoprueba != "") {
                $calendarService->events->delete($google_calendar_id, $evento_googlecalendar_id);
            }
        }
    }catch(Google_Service_Exception $gs){
    
        $m1 = json_decode($gs->getMessage());
        $m1= $m1->error->message;
  
      }catch(Exception $e){
          $m1 = $e->getMessage();
        
      }

}

//echo $m1;
echo "<script language='Javascript'> window.location='agregarCitas';</script>";
?>