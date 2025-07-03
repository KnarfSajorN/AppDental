<?php
   include 'header.php';
   include 'menu.php'; 



    date_default_timezone_set('America/Bogota');

    $ID                    = $_POST['ID'];  

    $idusuario                    = $_POST['ID'];          

    $pacienteId            = $_POST['clienteId']; //Paciente
    $usuarioid         	   = $_POST['usuario_Id']; //Usuario

    $fechar                = date("Y-m-d");
    $Afechar               = date("Y-m-d H:i:s");
    $hora                  = date("H:i:s");

    //tipo de ecografia
    $tipo_trabajo = $_POST['tipo_trabajo'];


echo '<br><br><br><br>--------------------------------------------------------------------'.$tipo_trabajo;
    if ($tipo_trabajo == 'Diagnóstico Psicología') 
    {
$fechad=  $_POST['fechadiagnostico'];
    	$eco1	= $_POST['inicial'];
	    $eco2	= $_POST['motivoC'];
	    $eco3	= $_POST['etapa'];
	    $eco4	= $_POST['agresion'];
	    $eco5	= $_POST['suicida'];
        $eco05	= $_POST['actitud'];
	     $eco6 	= $_POST['autovalor'];
	    $eco7 	= $_POST['expresion'];
	    $eco8 	= $_POST['cambio'];
	    $eco9 	= $_POST['satisfacion'];
	    $eco10 	= $_POST['apoyo'];
	    $eco11	= $_POST['escolar'];
	    $eco12	= $_POST['familiar'];
	   
	    $eco13	= $_POST['consumo'];
	    $eco14	= $_POST['dinero'];
	  	 $eco15	= $_POST['sustancias'];
	    $eco16	= $_POST['deseo'];
	    $eco17	= $_POST['conducta'];
	    $eco18	= $_POST['condicion'];
	    $eco19	= $_POST['tolerancia'];
	    $eco20	= $_POST['abandono'];
	    $eco21	= $_POST['persistencia'];
	    $eco22	= $_POST['lugart'];
	    $eco23	= $_POST['duracion'];
	    $eco24	= $_POST['motivos'];
	    $eco25	= $_POST['recaida'];
	    $eco26	= $_POST['delictivas'];
	    $eco27	= $_POST['ante_jud'];
	    $eco28	= $_POST['conciencia'];
	    $eco29	= $_POST['comportamiento'];
	    $eco30	= $_POST['lenguaje'];
	    $eco31	= $_POST['pensamiento'];
	    $eco32	= $_POST['diagnoI'];
	    $eco33	= $_POST['reponsable'];
        
 $codigo1=$_POST['cie10postquirurgico'];
      $contador=count($codigo1);


	    if(strlen($fechad) > 0){$fechadia= '<table><tr align="justify"> <td>Fecha: '.$fechad.'</td></tr></table>';}

	    if(strlen($eco1) > 0){$eexp1= '<table><tr align="justify"> <td>Diagnóstico inicial: '.$eco1.'</td></tr></table>';}
	    if(strlen($eco2) > 0){$eexp2= '<table><tr align="justify"><td>Motivo de la consulta: '.$eco2.'</td></tr></table>';}
	    if(strlen($eco3) > 0){$eexp3= '<table><tr align="justify"><td>Etapa de cambio actual: '.$eco3.'</td></tr></table>';}
	    if(strlen($eco4) > 0){$eexp4= '<table><tr align="justify"><td>Sufre o ha sufrido algún tipo de agresión: '.$eco4.'</td></tr></table>';}
	    if(strlen($eco5) > 0){$eexp5= '<table><tr align="justify"> <td>Ideación e intento suicida: '.$eco5.'</td></tr></table>';}    
	    

	    if(strlen($eco05) > 0){$eexp05= '<table><tr align="justify"><td>Actitudes ante la vida: '.$eco05.'</td></tr></table>';}
	 if(strlen($eco6) > 0){$eexp6= '<table><tr align="justify"><td>Autovaloración personal: '.$eco6.'</td></tr></table>';}
	    if(strlen($eco7) > 0){$eexp7= '<table><tr align="justify"><td>Expresión de emociones: '.$eco7.'</td></tr></table>';}
	    if(strlen($eco8) > 0){$eexp8= '<table><tr align="justify"><td>Etapa de cambio actual: '.$eco8.'</td></tr></tr></table>';}
        if(strlen($eco9) > 0){$eexp9= '<table><tr align="justify"><td>Satisfacción y problemas sexuales: '.$eco9.'</td></tr></table>';}
        if(strlen($eco10) > 0){$eexp10= '<table><tr align="justify"><td>Red de apoyo: '.$eco10.'</td></tr></table>';}
	     if(strlen($eco11) > 0){$eexp11= '<table><tr align="justify"><td>Área escolar y / laboral: '.$eco11.'</td></tr></table>';} 
	    if(strlen($eco12) > 0){$eexp12= '<table><tr align="justify"><td>Área social/familiar: '.$eco12.'</td></tr></table>';}
	     if(strlen($eco13) > 0){$eexp13= '<table><tr align="justify"><td>Estado actual de consumo: '.$eco13.'</td></tr></table>';}
	     if(strlen($eco14) > 0){$eexp14= '<table><tr align="justify"><td>Dinero para consumir: '.$eco14.'</td></tr></table>';}
	   //	if(strlen($eco15) > 0){$eexp15= '<tr>Sustancias de consumo:<td>'.$eco15.'</td></tr><tr><th colspan="4" class="text-center"> Eventos ligados al consumo</th></tr>';}else{$eexp15= '<td>     </td></tr><tr><th colspan="4" class="text-center"> Eventos ligados al consumo</th></tr><br>  ';}

		if(strlen($eco15) > 0){$eexp15= '<table><tr align="justify"><td>Sustancias de consumo: '.$eco15.'</td></tr></table><br>';} 


		if(strlen($eco16) > 0){$eexp16= '<table><tr align="justify"><th colspan="4"> Eventos ligados al consumo:</th></tr><td><br>(a) Deseo intenso o compulsión de consumir la sustancia : '.$eco16.'</td></tr><br>';} 
	  
	
	     //if(strlen($eco16) > 0){$eexp16= '<table><tr><td> (a) Deseo intenso o compulsión de consumir la sustancia: '.$eco16.'</td></tr></table>';}
	    if(strlen($eco17) > 0){$eexp17= '<table><tr align="justify"><td>(b) Dificultades para controlar la conducta de consumir en términos de su inicio terminación o niveles de consumo: '.$eco17.'</td></tr></table>';}
       if(strlen($eco18) > 0){$eexp18= '<table><tr align="justify"><td>(c) Condición fisiológica de privación/abstinencia: '.$eco18.'</td></tr></table>';}
	    if(strlen($eco19) > 0){$eexp19= '<table><tr align="justify"><td>(d) Evidencia de tolerancia:  '.$eco19.'</td></tr></table>';}
	    if(strlen($eco20) > 0){$eexp20= '<table><tr align="justify"><td>(e) Abandono progresivo de alternativas esparcimiento u otros intereses: '.$eco20.'</td></tr></table>';}

	     if(strlen($eco21) > 0){$eexp21= '<table><tr align="justify"><td>
(f) Persistencia en el consumo a pesar de tener evidencias claras de consecuencias nocivas. claras de consecuencias nocivas: '.$eco21.'</td></tr></table>';}

	  
	  
if(strlen($eco22) > 0){$eexp22= '<table><tr><th colspan="4"> Historial de Tratamiento</th></tr><td><br>Lugar: '.$eco22.'</td></tr><br>';}   
	   
	    
	    if(strlen($eco23) > 0){$eexp23= '<tr align="justify"><td>Duración del proceso: '.$eco23.'</tr></td></table>';}

	    if(strlen($eco24) > 0){$eexp24= '<table><tr align="justify"><td>Motivo de salida: '.$eco24.'</td></tr></table>';}
	    if(strlen($eco25) > 0){$eexp25= '<table><tr align="justify"><td>Factores de recaída: '.$eco25.'</td></tr></table>';}
	    if(strlen($eco26) > 0){$eexp26= '<table><tr align="justify"><td>Conductas delictivas: '.$eco26.'</td></tr></table>';}

	    if(strlen($eco27) > 0){$eexp27=  '<table><tr align="justify"><td>Antecedentes judiciales: '.$eco27.'</td></tr></table>';}
	    	    


if(strlen($eco28) > 0){$eexp28= '<table><tr><th colspan="4"> Examen Mental:</th></tr><td><br>Estado de conciencia: '.$eco28.'</td></tr><br>';} 
		//if(strlen($eco28) > 0){$eexp28= '<table><tr><td>Estado de conciencia: '.$eco28.'</td></tr></table>';}
	    if(strlen($eco29) > 0){$eexp29= '<table><tr align="justify"><td>Comportamiento: '.$eco29.'</td></tr></table>';}
	    if(strlen($eco30) > 0){$eexp30= '<table><tr align="justify"><td>Lenguaje: '.$eco30.'</td></tr></table>';}
	    if(strlen($eco31) > 0){$eexp31= '<table><tr align="justify"><td>Pensamiento: '.$eco31.'</td></tr></table>';}
	    if(strlen($eco32) > 0){$eexp32= '<table><tr align="justify"><td>Diagnóstico inicial: '.$eco32.'</td></tr></table>';}
        if(strlen($eco33) > 0){$eexp33= '<table><tr align="justify"><td>Responsable: '.$eco33.'</td></tr></table>';}
        


	    $detalle=$fechadia.$eexp1.$eexp2.$eexp3.$eexp4.$eexp5.$eexp05.$eexp6.$eexp7.$eexp8.$eexp9.$eexp10.$eexp11.$eexp12.$eexp13.$eexp14.$eexp15.$eexp16.$eexp17.$eexp18.$eexp19.$eexp20.$eexp21.$eexp22.$eexp23.$eexp24.$eexp25.$eexp26.$eexp27.$eexp28.$eexp29.$eexp30.$eexp31.$eexp32.$eexp33.'</td></tr></table>';



$query = "INSERT INTO historiaClinica_controlesPsicologia(cliente_id,usuario_id,Fecha,Hora,Detalle,control)
    		VALUES ($pacienteId,$ID,$fechar,$hora,$detalle,$tipo_trabajo);";
$enlace_actual = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$enlace_actual = str_replace('.php', '', $enlace_actual);

auditorMaster($idusuario, '1', $enlace_actual, $query);

    	mysqli_query($conn3,"
    		INSERT INTO historiaClinica_controlesPsicologia(cliente_id,usuario_id,Fecha,Hora,Detalle,control)
    		VALUES ('$pacienteId','$ID','$fechar','$hora','$detalle','$tipo_trabajo')");

echo "
    		INSERT INTO historiaClinica_controlesPsicologia(cliente_id,usuario_id,Fecha,Hora,Detalle,control)
    		VALUES ('$pacienteId','$ID','$fechar','$hora','$detalle','$tipo_trabajo')";
		
			/*
    	$con=mysqli_query($conn3,"SELECT MAX(id) as max FROM historiaClinica_controlesPsicologia");
    	$resu=mysqli_fetch_assoc($con);
    	$historiaClinica1=$resu['max'];
			*/
			$historiaClinica1 = mysqli_insert_id($conn3);



 for ($i=0; $i<$contador; $i++) 
 { 
        //
     
       
    
        mysqli_query($conn3,"INSERT INTO historiaClinica9_Quirurgico_Cie10 (cliente_id,usuario_id,historiaClinica9_id,Fecha,Hora,codigo,Tipo_Historia) VALUES ('$pacienteId','$ID','$historiaClinica1','$fechar','$hora','$codigo1[$i]','historiaClinica_controlesPsicologia')");   
		echo "INSERT INTO historiaClinica9_Quirurgico_Cie10 (cliente_id,usuario_id,historiaClinica9_id,Fecha,Hora,codigo) VALUES ('$pacienteId','$ID','$historiaClinica1','$fechar','$hora','$codigo1[$i]') <br>";
}

 

    }

    
  elseif ($tipo_trabajo == 'Seguimiento, Asistencia y Psicoterapia') 
    {



        $ec1	= $_POST['fechasegui'];
	    $ec2	= $_POST['obje2'];
	    $ec3	= $_POST['desarrolloS'];
	    $ec4	= $_POST['partic'];
	    $ec5	= $_POST['expresionS'];
	    $ec6	= $_POST['COMPROMISO'];
	    $ec7	= $_POST['conclusion'];
	    $ec8	= $_POST['prof'];
	    
 $codigo2=$_POST['cie10seguimiento'];
      $contador2=count($codigo2);

	   

	    //Datos iniciales de la ecografia
	    if(strlen($ec1) > 0){$exp1= '<tr align="justify"><td>Fecha: '.$ec1.'</td></tr>';}
	    if(strlen($ec2) > 0){$exp2= '<tr align="justify"><td>Objetivo: '.$ec2.'</td></tr>';}
	    if(strlen($ec3) > 0){$exp3= '<tr align="justify"><td>Desarrollo de la sesión: '.$ec3.'</td></tr>';}
	    if(strlen($ec4) > 0){$exp4= '<tr align="justify"><td>Participación: '.$ec4.'</td></tr>';}
	    if(strlen($ec5) > 0){$exp5= '<tr align="justify"><td>Expresión de sentimientos y emociones: '.$ec5.'</td></tr>';}
	   
	    
	    if(strlen($ec6) > 0){$exp6= '<tr align="justify"><td>Reflexiones y Compromisos: '.$ec6.'</td></tr>';}
	  
	    if(strlen($ec7) > 0){$exp7= '<tr align="justify"><td>Conclusion profesional y recomendaciones: '.$ec7.'</td></tr>';}
	    if(strlen($ec8) > 0){$exp8= '<tr align="justify"><td>Profesional Responsable y TP: '.$ec8.'</td></tr>';}
	   



	    $valoracion= '<table class="table table-bordered"><tr>'.$exp1.$exp2.$exp3.$exp4.$exp5.$exp6.$exp7.$exp8.'</tr></table>';

$query = "INSERT INTO historiaClinica_controlesPsicologia(cliente_id,usuario_id,Fecha,Hora,Detalle,control)
    		VALUES ($pacienteId,$ID,$fechar,$hora,$valoracion,$tipo_trabajo);";
$enlace_actual = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$enlace_actual = str_replace('.php', '', $enlace_actual);

auditorMaster($idusuario, '1', $enlace_actual, $query);

    	mysqli_query($conn3,"
    		INSERT INTO historiaClinica_controlesPsicologia(cliente_id,usuario_id,Fecha,Hora,Detalle,control)
    		VALUES ('$pacienteId','$ID','$fechar','$hora','$valoracion','$tipo_trabajo')");


echo "INSERT INTO historiaClinica_controlesPsicologia(cliente_id,usuario_id,Fecha,Hora,Detalle,control)
    		VALUES ('$pacienteId','$ID','$fechar','$hora','$valoracion','$tipo_trabajo')";

/*
    		$con=mysqli_query($conn3,"SELECT MAX(id) as max FROM historiaClinica_controlesPsicologia");
    	$resu=mysqli_fetch_assoc($con);
    	$historiaClinica1=$resu['max'];
*/

		$historiaClinica1 = mysqli_insert_id($conn3);



		for ($i=0; $i<$contador2; $i++) 
		{ 
			   //
			
			  
		   
			   mysqli_query($conn3,"INSERT INTO historiaClinica9_Quirurgico_Cie10 (cliente_id,usuario_id,historiaClinica9_id,Fecha,Hora,codigo,Tipo_Historia) VALUES ('$pacienteId','$ID','$historiaClinica1','$fechar','$hora','$codigo2[$i]','historiaClinica_controlesPsicologia')");   
			   echo "INSERT INTO historiaClinica9_Quirurgico_Cie10 (cliente_id,usuario_id,historiaClinica9_id,Fecha,Hora,codigo) VALUES ('$pacienteId','$ID','$historiaClinica1','$fechar','$hora','$codigo2[$i]') ";
	   }
/*
 for ($i=1; $i<$contador2; $i++) 
 { 
        //
           mysqli_query($conn3,"INSERT INTO historiaClinica9_Quirurgico_Cie10 (cliente_id,usuario_id,historiaClinica9_id,Fecha,Hora,codigo) VALUES ('$pacienteId','$ID','$historiaClinica1','$fechar','$hora','$codigo2[$i]')");   
		}*/

 
    
}

elseif ($tipo_trabajo == 'Psicoterapia de grupo por Psicología') 
    {

$eco42	= $_POST['etapa'];
	    $eco43	= $_POST['objetivo2'];
        $eco44	= $_POST['desaSesion'];
	    $eco45	= $_POST['particip'];
	    $eco46	= $_POST['refCompr'];
        $eco47	= $_POST['conclu'];
	    $eco48	= $_POST['profRespo'];

/////////////////////////////////////////
	   

	 
	   
	   
	    if(strlen($eco42) > 0){$ex1= '<table><tr align="justify"><td>Mes: '.$eco42.'</td></tr>';}
	    if(strlen($eco43) > 0){$ex7= '<tr align="justify"><td>Objetivo: '.$eco43.'</td></tr></table><br>';}
	    if(strlen($eco44) > 0){$ex8= '<table><tr align="justify"><td>Desarrollo de la sesión: '.$eco44.'</td></tr></table><br>';}
	  
	    if(strlen($eco45) > 0){$ex9= '<table><tr align="justify"><td>Participación: '.$eco45.'</td></tr></table><br>';}

	    if(strlen($eco46) > 0){$ex10= '<table><tr align="justify"><td>Reflexiones y compromisos del participante: '.$eco46.'</td></tr></table><br>';}
	    if(strlen($eco47) > 0){$ex11= '<table><tr align="justify"><td>Conclusion profesional y recomendaciones: '.$eco47.'</td></tr><table><br>';}
	    if(strlen($eco48) > 0){$ex12= '<table><tr align="justify"><td>Profesional Responsable y TP: '.$eco48.'</td></tr><table>';}

	   


	  $seguimiento= '<table class="table table-bordered"><tr>'.$ex1.$ex7.$ex8.$ex9.$ex10.$ex11.$ex12.'</tr></table>';

	  $query = "INSERT INTO historiaClinica_controlesPsicologia(cliente_id,usuario_id,Fecha,Hora,Detalle,control)
    		VALUES ($pacienteId,$ID,$fechar,$hora,$seguimiento,$tipo_trabajo);";
$enlace_actual = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$enlace_actual = str_replace('.php', '', $enlace_actual);

auditorMaster($idusuario, '1', $enlace_actual, $query);

    	mysqli_query($conn3,"
    		INSERT INTO historiaClinica_controlesPsicologia(cliente_id,usuario_id,Fecha,Hora,Detalle,control)
    		VALUES ('$pacienteId','$ID','$fechar','$hora','$seguimiento','$tipo_trabajo')");



echo "INSERT INTO historiaClinica_controlesPsicologia (cliente_id,usuario_id,Fecha,Hora,Detalle,control)
    		VALUES ('$pacienteId','$ID','$fechar','$hora','$seguimiento','$tipo_trabajo')";

    $con=mysqli_query($conn3,"SELECT MAX(ID) as max FROM historiaClinica_controlesPsicologia ");
    	$resu=mysqli_fetch_assoc($con);
    	$historiaClinica1=$resu['max'];




    }


  
  
   
    
    $query=mysqli_query($conn3,"SELECT MAX(id) as historiaClinica1 from historiaClinica_controlesPsicologia");
    $nrowl=mysqli_num_rows($query);

    while($rowhc=mysqli_fetch_array($query)){$historiaClinica_controlesPsicologia=$rowhc['historiaClinica1'];} 
    
    //echo "<script language='Javascript'> alert('ecografia=$historiaClinica_ecografias');</script>";


echo "<script language='Javascript'> window.location='PS_Finalizado_Controles_Psicologia?historiaClinica1=$historiaClinica_controlesPsicologia';</script>";  


?>