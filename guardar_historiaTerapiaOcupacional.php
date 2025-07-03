<?php
   //include 'header.php';
   include 'funciones/funciones.php';
   include 'funciones/funcionesUtilidades.php';
 //  include 'menu.php'; 



    date_default_timezone_set('America/Bogota');
    include("conexiones/conexion.php");
    $con=conectar();
 



             

        

        $ID                    = $_POST['ID'];          
        $cliente_id            = $_POST['clienteId'];          
        
        // datos de fecha y hora
        $fechar                = date("Y-m-d");
        $Afechar               = date("Y-m-d H:i:s");
        $hora                  = date("H:i:s");


      
  //CAMPOS HISTORIA VALORACION
    $fechas=reem($_POST['fechaN']);
        $ant_ocupacionales=reem($_POST['ant_ocupacionales']);
        $areas_ocupacionales=reem($_POST['areas_ocupacionales']);
        $educacion=reem($_POST['educacion']);
        $tiempo_libre=reem($_POST['tiempo_libre']);
        $proyectos=reem($_POST['proyectos']);
        $participacion=reem($_POST['participacion']);
        $habilidades=reem($_POST['habilidades']);
        $percepcion=reem($_POST['percepcion']);
        $patrones=reem($_POST['patrones']);
        $entorno=reem($_POST['entorno']);
        $fecha=reem($_POST['fecha']);
        $objetivo=reem($_POST['objetivo']);
        $intervencion=reem($_POST['intervencion']);
        $profesion=reem($_POST['profesion']);
        $registro=reem($_POST['registro']);  

 //CAMPOS HISTORIA SEGUIMIENTO


        $situacion=reem($_POST['situacion']);
        $fechaplan=reem($_POST['fechaplan']);
        $objetivo1=reem($_POST['objetivo1']);
        $intervencion=reem($_POST['intervencion']);
        $profesional=reem($_POST['profesional']);
        $registro1=reem($_POST['registro1']);


       
     if(strlen($fechas) > 1){$eexp21= '<table class="table table-bordered"><tr> <td>Fecha de Registro: '.$fechas.'</td>';}  
     if(strlen($ant_ocupacional) > 1){$eexp1= '<tr> <td>Antecedentes Ocupacionales: '.$ant_ocupacional.'</td>';}
      if(strlen($areas_ocupacionales) > 1){$eexp2= '<td>Areas Ocupacionales: '.$areas_ocupacionales.'</td>';}
      if(strlen($educacion) > 1){$eexp3= '<td>Educación y Trabajo: '.$educacion.'</td></tr>';}
      if(strlen($tiempo_libre) > 1){$eexp4= '<tr><td>Tiempo Libre y Ocio: '.$tiempo_libre.'</td>';}
      if(strlen( $proyectos) > 1){$eexp5= '<tr> <td>Proyectos , Intereses y Objetivos: '.$proyectos.'</td>';}
        if(strlen($participacion) > 1){$eexp6= '<td>Participación Social: '.$participacion.'</td></tr>';}
       if(strlen($habilidades) > 1){$eexp7= '<tr><td>Habilidades de Desempeño: '. $habilidades.'</td>';}
       if(strlen($percepcion) > 1){$eexp8= '<td>PERCEPCIÓN DE HABILIDADES DESTREZAS Y LIMITACIONES: '.$percepcion.'</td></tr>';}
      if(strlen($patrones) > 1){$eexp9= '<tr><td>PATRONES DE DESEMPEÑO:  '.$patrones.'</td>';}
      if(strlen($entorno) > 1){$eexp10= '<td>ENTORNO: '.$entorno.'</td></tr>';}  
      if(strlen($fecha) > 1){$eexp11= '<tr><th colspan="4"> PLAN DE PREVENCIÓN OCUPACIONAL</th></tr> 
                      <tr><td>Fecha: '.$fecha.'</td>';}
      if(strlen($objetivo) > 1){$eexp12= '<td>Objetivo: '.$objetivo.'</td>';}
      if(strlen($intervencion) > 1){$eexp13= '<td>Intervención: '.$intervencion.'</td></tr>';}
      if(strlen($profesion) > 1){$eexp14= '<td>Nombre del Profesional:  '.$profesion.'</td>';}
      if(strlen($registro) > 1){$eexp15= '<tr><td>Registro profesional Número: '.$registro.'</td></tr>';}
     

$valoracion=$eexp21.$eexp1.$eexp2.$eexp3.$eexp4.$eexp5.$eexp6.$eexp7.$eexp8.$eexp9.$eexp10.$eexp11.$eexp12.$eexp13.$eexp14.$eexp15.'</tr></table>';  


if(strlen($situacion) > 1){$eexp16= '<table class="table table-bordered"><tr> <td>SITUACIÓN ENCONTRADA: '.$situacion.'</td>';}  
     if(strlen($fechaplan) > 1){$eexp17= '<tr> <td>Fecha: '.$fechaplan.'</td>';}
      if(strlen($intervencion) > 1){$eexp18= '<td>Intervención: '.$intervencion.'</td></tr>';}
      if(strlen($profesional) > 1){$eexp19= '<tr><td>Nombre del profesional: '.$profesional.'</td>';}
      if(strlen($registro1) > 1){$eexp20= '<td>Registro profesional Número: '.$registro1.'</td>';}

$seguimiento=$eexp16.$eexp17.$eexp18.$eexp19.$eexp20.'</tr></table>';


$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));





            mysqli_query($conn3,"INSERT INTO historiaClinicaTerapia_Ocupacional 
(cliente_id, usuario_id, Fecha,     Hora,    valoracion,seguimiento) VALUES 
('$cliente_id ', '$ID',    '$fechar', '$hora','$valoracion','$seguimiento');");



echo "INSERT INTO historiaClinicaTerapia_Ocupacional 
(cliente_id, usuario_id, Fecha,     Hora,    valoracion,seguimiento) VALUES 
('$cliente_id', '$ID',    '$fechar', '$hora','$valoracion','$seguimiento');";
 





              $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as historiaClinicaTerapia_Ocupacional  from historiaClinicaTerapia_Ocupacional ");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $historiaClinica1=$rowhc['historiaClinicaTerapia_Ocupacional '];
              }   






echo "<script language='Javascript'> window.location='finalizadoTerapiaOcupacional.php?historiaClinica1=$historiaClinica1';</script>"; 



?>