<?php
   include 'header.php';
   include 'menu.php'; 



    date_default_timezone_set('America/Bogota');

    $ID                    = $_POST['ID']; 

    $idusuario                    = $_POST['ID'];          

   // $pacienteId            = $_POST['clienteId']; //Paciente
    $usuarioid         	   = $_POST['usuario_Id']; //Usuario

    $fechar                = date("Y-m-d");
    $Afechar               = date("Y-m-d H:i:s");
    $hora                  = date("H:i:s");

    //tipo de ecografia
    $tipo_trabajo = $_POST['tipo_trabajo'];
    $prestaciones1 = $_POST['prestaciones1'];

 
    for ($i=0;$i<count($prestaciones1);$i++) 
        { 
     echo ' <font color="red"> |<br> --------------------------------------------------- >>>>>>>>>>>>>>>> '.$i;     
          
          $pacienteId = $prestaciones1[$i];
     echo '<font color="red"> |<br> ---------------------------------------------------   pacienteId >>>>>>>>>>>>> '.$pacienteId;     
     echo ' |<br> ';     


$eco42	= $_POST['etapa'];
	    $eco43	= $_POST['objetivo2'];
        $eco44	= $_POST['desaSesion'];
	    $eco45	= $_POST['particip'];
	    $eco46	= $_POST['refCompr'];
        $eco47	= $_POST['conclu'];
	    $eco48	= $_POST['profRespo'];
	   
	    if(strlen($eco42) > 0){$ex1= '<td>Etapa: '.$eco42.'</td>';}
	    if(strlen($eco43) > 0){$ex7= '<td>Objetivo: '.$eco43.'</td>';}
	    if(strlen($eco44) > 0){$ex8= '<tr><td>Desarrollo de la Sesión: '.$eco44.'</td></tr>';}
	  
	    if(strlen($eco45) > 0){$ex9= '<tr><td>Participación: '.$eco45.'</td></tr>';}

	    if(strlen($eco46) > 0){$ex10= '<tr><td>Reflexiones y compromisos del participante: '.$eco46.'</td></tr>';}
	    if(strlen($eco47) > 0){$ex11= '<tr><td>Conclusion profesional y recomendaciones: '.$eco47.'</td></tr>';}
	    if(strlen($eco48) > 0){$ex12= '<tr><td>Profesional Responsable y TP: '.$eco48.'</td></tr>';}

	  $seguimiento= '<table class="table table-bordered"><tr>'.$ex1.$ex7.'</tr>'.$ex8.$ex9.$ex10.$ex11.$ex12.'</tr></table>';

    $query = "INSERT INTO historiaClinica_controlesPsicologia(cliente_id,usuario_id,Fecha,Hora,Detalle,control)
        VALUES ($pacienteId,$ID,$fechar,$hora,$seguimiento,$tipo_trabajo);";
$enlace_actual = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$enlace_actual = str_replace('.php', '', $enlace_actual);

auditorMaster($idusuario, '1', $enlace_actual, $query);


    	mysqli_query($conn3,"
    		INSERT INTO historiaClinica_controlesPsicologia(cliente_id,usuario_id,Fecha,Hora,Detalle,control)
    		VALUES ('$pacienteId','$ID','$fechar','$hora','$seguimiento','$tipo_trabajo')");


    $con=mysqli_query($conn3,"SELECT MAX(ID) as max FROM historiaClinica_controlesPsicologia ");
    	$resu=mysqli_fetch_assoc($con);
    	$historiaClinica1=$resu['max'];
        }
 


  echo "<script language='Javascript'> window.location='PS_Pacientes';</script>";  


?>