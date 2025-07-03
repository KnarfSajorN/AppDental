<?php
   include 'header.php';
   include 'menu.php'; 



    date_default_timezone_set('America/Bogota');
    include("conexiones/conexion.php");
    $con=conectar();

    $ID                    = $_POST['ID'];          

    $pacienteId            = $_POST['clienteId']; //Paciente
    $usuarioid         	   = $_POST['usuario_Id']; //Usuario

    $fechar                = date("Y-m-d");
    $Afechar               = date("Y-m-d H:i:s");
    $hora                  = date("H:i:s");

    //tipo de ecografia
    $tipo_trabajo = $_POST['tipo_trabajo'];


echo '<br><br><br><br>--------------------------------------------------------------------'.$tipo_trabajo;
    if ($tipo_trabajo == 'Diagnostico Trabajo Social') 
    {

    	//datos iniciales de la ecografia obstétrica
	    $eco1	= $_POST['nivel'];
	    $eco2	= $_POST['grados'];
	    $eco3	= $_POST['acudiene'];
	    $eco4	= $_POST['tel'];
	    $eco5	= $_POST['origen'];

	    //Datos de biometria de ecografia obstetrica
	    
	    $eco6 	= $_POST['problema'];
	    $eco7 	= $_POST['embarazo'];
	    $eco8 	= $_POST['lactancia'];
	    $eco9 	= $_POST['aspectos'];
	    $eco10 	= $_POST['aspectos2'];
	    $eco11	= $_POST['eventos'];
	    $eco12	= $_POST['vivecon'];
	   
	    $eco13	= $_POST['familiarcercano'];
	    $eco14	= $_POST['parentesco'];
	    
	    $eco15	= $_POST['ant_drogas'];
	    $eco16	= $_POST['parentesco1'];
	    $eco17	= $_POST['alcohol'];
	    $eco18	= $_POST['parentesco2'];
	    $eco19	= $_POST['psiquiátricos'];
	    $eco20	= $_POST['parentesco3'];
	    $eco21	= $_POST['observ'];
	    $eco22	= $_POST['dinamica'];
	    $eco23	= $_POST['relacion'];
	    $eco24	= $_POST['conyugal'];
	    $eco25	= $_POST['parental'];
	    $eco26	= $_POST['fraterno'];
	    $eco27	= $_POST['afecto'];
	    $eco28	= $_POST['autoridad'];
	    $eco39	= $_POST['normas'];
	    $eco30	= $_POST['familia'];
	    $eco31	= $_POST['castigos'];
	    $eco32	= $_POST['valores'];
	    $eco33	= $_POST['rehabilita'];
        $eco34	= $_POST['obs_espiritual'];
	    $eco35	= $_POST['prob_fami'];
	    $eco36	= $_POST['cuales'];
	    $eco37	= $_POST['ambiente_fam'];
	    $eco38	= $_POST['gusta_fami'];
	    $eco39	= $_POST['disgusta_fam'];
	    $eco40	= $_POST['ips'];
	    $eco41	= $_POST['comprom_fami'];
	    $eco42	= $_POST['preocu_fami'];
	    $eco43	= $_POST['familiograma'];
        $eco44	= $_POST['impresiones_diag'];
	    $eco45	= $_POST['profesionali'];
	    $eco46	= $_POST['registro_prof'];






	    if(strlen($eco1) > 1){$eexp1= '<table class="table table-bordered"><tr> <td>Nivel de estudios: '.$eco1.'</td>';}
	    if(strlen($eco2) > 1){$eexp2= '<td>Grados o semestres cursados: '.$eco2.'</td>';}
	    if(strlen($eco3) > 1){$eexp3= '<td>Nombre del acudiente: '.$eco3.'</td>';}
	    if(strlen($eco4) > 1){$eexp4= '<td>Telefono: '.$eco4.'</td></tr>';}
	    if(strlen($eco5) > 1){$eexp5= '<tr> <td>Origenes del consumo: '.$eco5.'</td>';}
	    //aqui hacemos un salto de linea para el pdf cuando se muestre

	    
	 if(strlen($eco6) > 1){$eexp6= '<td>¿ Cuando consideró que el consumo de drogas era un problema?: '.$eco6.'</td></tr><tr><th colspan="4" class="text-center">Ciclo Vital Individual</th></tr>';}else{$eexp6= '<td>     </td></tr><tr><th colspan="4" class="text-center">Ciclo Vital Individual</th></tr>';}
	    if(strlen($eco7) > 1){$eexp7= '<tr><td>Embarazo: '.$eco7.'</td>';}
	    if(strlen($eco8) > 1){$eexp8= '<td>Lacancia: '.$eco8.'</td></tr>';}
        if(strlen($eco9) > 1){$eexp9= '<tr><td>Aspectos relevantes de la infancia: '.$eco9.'</td></tr>';}
        if(strlen($eco10) > 1){$eexp10= '<tr><td> Aspectos relevantes de la Adolescencia: '.$eco10.'</td></tr>';}
	     if(strlen($eco11) > 1){$eexp11= '<tr><td>Eventos Traumaticos: '.$eco11.'</td></tr><tr><th colspan="4" class="text-center">Composición Familiar</th></tr>';}else{$eexp11= '<td>     </td></tr><tr><th colspan="4" class="text-center">Composición Familiar</th></tr>';} 
	    if(strlen($eco12) > 1){$eexp12= '<tr><td>El usuario vive con:: '.$eco12.'</td>';}
	     if(strlen($eco13) > 1){$eexp13= '<td>Cual es el familiar más cercano?: '.$eco13.'</td>';}
	     if(strlen($eco14) > 1){$eexp14= '<tr><td>Parentesco: '.$eco14.'</td></tr>';}
	   	if(strlen($eco15) > 1){$eexp15= '<tr><td>Antecedentes consumidores de drogas : '.$eco15.'</td>';}
	     if(strlen($eco16) > 1){$eexp16= '<td>Parentesco: '.$eco16.'</td></tr>';}
	    if(strlen($eco17) > 1){$eexp17= '<tr><td>En su familia hay abusadores de alcohol  : '.$eco17.'</td>';}
       if(strlen($eco18) > 1){$eexp18= '<td>Paretesco: '.$eco18.'</td></tr>';}
	    if(strlen($eco19) > 1){$eexp19= '<tr><td> Antecedentes Pilares psiquiátricos : '.$eco19.'</td>';}
	    if(strlen($eco20) > 1){$eexp20= '<td>Parentesco: '.$eco20.'</td></tr>';}
	     if(strlen($eco21) > 1){$eexp21= '<tr><td> Observaciones sobre la composición familiar: '.$eco21.'</td></tr><tr><th colspan="4" class="text-center">Dinámica Familiar</th></tr>';}else{$eexp21= '<td>     </td></tr><tr><th colspan="4" class="text-center">Dinámica Familiar</th></tr>';}

	   
	    
	    
	    if(strlen($eco22) > 1){$eexp22= '<tr><td>Dinámica al interior de la familia: '.$eco22.'</td>';}
	    
	    if(strlen($eco23) > 1){$eexp23= '<td>Relación familia y entorno: '.$eco23.'</td></tr>';}

	    if(strlen($eco24) > 1){$eexp24= '<tr<td>SUBSISTEMA CONYUGAL (Comunicación, Afectividad, límites, alianzas, Relación.):  '.$eco24.'</td></tr>';}
	    if(strlen($eco25) > 1){$eexp25= '<tr><td>SUBSISTEMA PARENTAL (Comunicación, Afectividad, límites, alianzas, Relación.): '.$eco25.'</td></tr>';}
	    if(strlen($eco26) > 1){$eexp26= '<tr><td>SUBSISTEMA FRATERNO (Comunicación, Afectividad, límites, alianzas, Relación.): '.$eco26.'</td></tr><tr><th colspan="4" class="text-center">Dinámica Familiar</th></tr>';}else{$eexp26= '<td>     </td></tr><tr><th colspan="4" class="text-center">Composición Familiar</th></tr>';}

	    if(strlen($eco22) > 1){$eexp22= '<tr><td>¿A través de que formas se ha expresado el afecto en la familia?: '.$eco22.'</td></tr';}
	    if(strlen($eco27) > 1){$eexp27= '<tr><td>Grado: '.$eco27.'</td></tr>';}

	    if(strlen($eco28) > 1){$eexp28= '<tr><td>Quien ejerce la autoridad en la familia y a través de qué mecanismos?: '.$eco28.'</td>';}
	    if(strlen($eco29) > 1){$eexp29= '<tr><td>Que normas existen al interior de su familia: '.$eco29.'</td></tr>';}
	    if(strlen($eco30) > 1){$eexp30= '<tr><td>Consideran ustedes que al interior de su familia ha sido más constante la crítica o el estímulo?'.$eco30.'</td></tr>';}

	    if(strlen($eco31) > 1){$eexp31= '<tr><td>En qué consisten los castigos?'.$eco31.'</td></tr><tr><th colspan="4" class="text-center">Dinámica Familiar</th></tr>';}else{$eexp31= '<td>     </td></tr><tr><th colspan="4" class="text-center">Dinámica Espiritual</th></tr>';}
	    if(strlen($eco32) > 1){$eexp32= '<tr><td>¿Han inculcado Valores Espirituales? Cuales: '.$eco32.'</td></tr>';}
        if(strlen($eco33) > 1){$eexp33= '<tr><td>Como cree usted que la parte espiritual tiene que ver el proceso de rehabilitación?: '.$eco33.'</td></tr>';}
        if(strlen($eco34) > 1){$eexp34= '<tr><td>Observaciones sobre el aspecto esiritual de la familia: '.$eco34.'</td></tr>';}

        if(strlen($eco35) > 1){$eexp35= '<tr><td>¿Hay en familia Otros problemas significativos? '.$eco35.'</td>';}
	    
	    if(strlen($eco36) > 1){$eexp36= '<td>Cuáles: '.$eco36.'</td></tr>';}
        if(strlen($eco37) > 1){$eexp37= '<tr><td>Describa el Ambiente Familiar: '.$eco37.'</td></tr>';}
       if(strlen($eco38) > 1){$eexp38= '<tr><td>Lo que más le gusta de su familia: '.$eco38.'</td></tr>';}
       if(strlen($eco39) > 1){$eexp39= '<tr><td>Lo que más le Disgusta de su familia: '.$eco39.'</td></tr>';}
        if(strlen($eco40) > 1){$eexp40= '<tr><td>Expectativas familiares frente al proceso, ¿Que espera la familia de la IPS?: '.$eco40.'</td></tr>';}
       if(strlen($eco41) > 1){$eexp41= '<tr><td>Compromisos de la Familia frente al proceso: '.$eco41.'</td></tr>';}
       if(strlen($eco42) > 1){$eexp42= '<tr><td>Preocupaciones Familiares: '.$eco42.'</td></tr><tr><th colspan="4" class="text-center">Familiograma</th></tr>';}else{$eexp42= '<td>     </td></tr><tr><th colspan="4" class="text-center">Familiograma</th></tr>';}

       if(strlen($eco43) > 1){$eexp43= '<td>'.$eco43.'</td></tr><tr><th colspan="4" class="text-center">Impresiones diagnósticas y planeación</th></tr>';}else{$eexp43= '<td>     </td></tr><tr><th colspan="4" class="text-center">Impresiones diagnósticas y planeación</th></tr>';}
     
       if(strlen($eco44) > 1){$eexp44= '<td>'.$eco44.'</td></tr>';}
  if(strlen($eco45) > 1){$eexp45= '<tr><td>Nombre del profesional: '.$eco45.'</td>';}
	    
	    if(strlen($eco46) > 1){$eexp46= '<td>egistro profesional Número:: '.$eco46.'</td></tr>';}



	    $diagnostico=$eexp1.$eexp2.$eexp3.$eexp4.$eexp5.$eexp6.$eexp7.$eexp8.$eexp9.$eexp14.$eexp13.$eexp10.$eexp17.$eexp16.$eexp19.$eexp20.$eexp21.$eexp23.$eexp24.$eexp25.$eexp26.$eexp22.$eexp27.$eexp28.$eexp29.$eexp30.$eexp31.$eexp32.$eexp33.$eexp34.$eexp35.$eexp36.$eexp36.$eexp37.$eexp38.$eexp38.$eexp39.$eexp40.$eexp41.$eexp42.$eexp43.$eexp43.$eexp44.$eexp45.$eexp46.'</td></tr></table>';





    	mysqli_query($conn3,"
    		INSERT INTO historiaClinica_TrabajoSocial (cliente_id,usuario_id,Fecha,Hora,Detalle,trabajosocial)
    		VALUES ('$pacienteId','$ID','$fechar','$hora','$diagnostico','$tipo_trabajo')");

echo $diagnostico;

    	$con=mysqli_query($conn3,"SELECT MAX(ID) as max FROM historiaClinica_ecografias ");
    	$resu=mysqli_fetch_assoc($con);
    	$historiaClinica1=$resu['max'];

$contador=$_POST['uploader_count'];


for ($i=0; $i <$contador ; $i++) { 
    $nomb=$_POST['uploader_'.$i.'_name'];

    mysqli_query($conn3,"INSERT INTO imgEcografia (idHistoria, imagen) VALUE
    ('$historiaClinica1','$nomb');");
    
		}



    }

    
  elseif ($tipo_trabajo == 'Valoracion Trabajo Social') 
    {



         $ec1	= $_POST['acudiente'];
	    $ec2	= $_POST['telacudiente'];
	    $ec3	= $_POST['diracudiente'];
	    $ec4	= $_POST['objetivo'];
	    $ec5	= $_POST['motivoc'];  
	    $ec6 	= $_POST['tecnicas'];
	    $ec7 	= $_POST['nombre'];
	    $ec8 	= $_POST['edad'];
	    $ec9	= $_POST['ec'];
	    $ec10 	= $_POST['escola'];
	    $ec11	= $_POST['ocupacio'];
	    $ec12	= $_POST['parentescos'];
	    $ec13	= $_POST['sit_encontrada'];
	    $ec14	= $_POST['vulnerabilidad'];
	    $ec15	= $_POST['generat'];
	    $ec16	= $_POST['apreciacion'];
	    $ec17	= $_POST['nom_profesion'];
	    $ec18	= $_POST['registro_num'];
	    

/////////////////////////////////////////
	   

	    //Datos iniciales de la ecografia
	    if(strlen($ec1) > 1){$exp1= '<td>Nombre del Acudiente: '.$ec1.'</td>';}
	    if(strlen($ec2) > 1){$exp2= '<td>Telefono del acudientea: '.$ec2.'</td>';}
	    if(strlen($ec3) > 1){$exp3= '<td>Dirección del Acudiente: '.$ec3.'</td>';}
	    if(strlen($ec4) > 1){$exp4= '<td>Objetivo:'.$ec4.'</td>';}
	    if(strlen($ec5) > 1){$exp5= '<td>Motivo de la consulta:'.$ec5.'</td></tr>';}
	   
	    
	  
	    if(strlen($ec6) > 1){$exp6= '<tr><td>Tecnicas Utilizadas: '.$ec6.'</td></tr><tr><th colspan="4" class="text-center">Composición Familiar </th></tr>';}else{$exp6= '<td>   </td></tr><tr><th colspan="4" class="text-center">Composición Familiar</th></tr>';}
	    if(strlen($ec7) > 1){$exp7= '<tr><td>Nombres y Apellidos: '.$ec7.'</td>';}
	    if(strlen($ec8) > 1){$exp8= '<td>Edad: '.$ec8.'</td>';}
	    if(strlen($ec9) > 1){$exp9= '<td>Estado Civil: '.$ec9.'</td></tr>';}

	    if(strlen($ec10) > 1){$exp10= '<tr><td>Escolaridad:  '.$ec10.'</td>';}
	    if(strlen($ec11) > 1){$exp11= '<td>Ocupación: '.$ec11.'</td>';}
	    if(strlen($ec12) > 1){$exp12= '<td>Parentesco: '.$ec12.'</td></tr>';}
	    if(strlen($ec13) > 1){$exp13= '<tr><td>Situación Encontrada: '.$ec13.'</td></tr>><tr><th colspan="4" class="text-center">Perfil de Vulnerabilidad y Generatividad</th></tr>';}else{$exp13= '<td>   </td></tr><tr><th colspan="4" class="text-center">Perfil de Vulnerabilidad y Generatividad</th></tr>';}
	    if(strlen($ec14) > 1){$exp14= '<tr><td>Vulnerabilidad: '.$ec14.'</td></tr>';}
	    if(strlen($ec15) > 1){$exp15= '<td>Generatividad: '.$ec15.'</td></tr><tr><th colspan="4" class="text-center">Apreciación Profesional del Caso</th></tr>';}else{$exp15= '<td>   </td></tr><tr><th colspan="4" class="text-center">Apreciación Profesional del Caso</th></tr>';}

        if(strlen($ec16) > 1){$exp16= '<tr><td>:  '.$ec16.'</td><tr>';}
	    if(strlen($ec17) > 1){$exp17= '<td>Nombre del profesional: '.$ec17.'</td>';}
	    if(strlen($ec18) > 1){$exp18= '<td>Registro profesional Número: '.$ec18 .'';}



	    $valoracion= '<table class="table table-bordered"><tr>'.$exp1.$exp2.$exp3.$exp4.$exp5.$exp6.$exp7.$exp8.$exp9.$exp10.$exp11.$exp12.$exp13.$exp14.$exp15.$exp16.$exp17.$exp18.='</td></tr></table>';

    	mysqli_query($conn3,"
    		INSERT INTO historiaClinica_TrabajoSocial (cliente_id,usuario_id,Fecha,Hora,Detalle,trabajosocial)
    		VALUES ('$pacienteId','$ID','$fechar','$hora','$valoracion','$tipo_trabajo')");


echo "INSERT INTO historiaClinica_TrabajoSocial (cliente_id,usuario_id,Fecha,Hora,Detalle,trabajosocial)
    		VALUES ('$pacienteId','$ID','$fechar','$hora','$valoracion','$tipo_trabajo')";

    	$con=mysqli_query($conn3,"SELECT MAX(ID) as max FROM historiaClinica_TrabajoSocial ");
    	$resu=mysqli_fetch_assoc($con);
    	$historiaClinica1=$resu['max'];

$contador=$_POST['uploader_count'];


for ($i=0; $i <$contador ; $i++) { 
    $nomb=$_POST['uploader_'.$i.'_name'];

    mysqli_query($conn3,"INSERT INTO imgEcografia (idHistoria, imagen) VALUE
    ('$historiaClinica1','$nomb');");
    
		}



    }
    


elseif ($tipo_trabajo == 'Seguimiento Trabajo Social') 
    {


	    $ecog1	= $_POST['lugar'];
	    $ecog7 	= $_POST['tema'];
	    $ecog8 	= $_POST['profes'];
	    $ecog9	= $_POST['obj_segui'];
	    $ecog10 = $_POST['desarrollo'];
	    $ecog11	= $_POST['recomen'];
	    



/////////////////////////////////////////
	   

	 
	   
	   
	    if(strlen($ecog1) > 1){$ex1= '<td>Lugar: '.$ecog1.'</td>';}
	    if(strlen($ecog7) > 1){$ex7= '<td>Tema: '.$ecog7.'</td>';}
	    if(strlen($ecog8) > 1){$ex8= '<td>Profesional: '.$ecog8.'</td></tr>';}
	  
	    if(strlen($ecog9) > 1){$ex9= '<tr><td>Objetivo del seguimiento por trabajo Social: '.$ecog9.'</td></tr>';}

	    if(strlen($ecog10) > 1){$ex10= '<tr><td>Desarrollo de la Actividad: '.$ecog10.'</td></tr>';}
	    if(strlen($ecog11) > 1){$ex11= '<tr><td>Recomendaciones: '.$ecog11.'</td></tr>';}
	   

	   


	  $seguimiento= '<table class="table table-bordered"><tr>'.$ex1.$ex7.$ex8.$ex9.$ex10.$ex11.'</tr></table>';

    	mysqli_query($conn3,"
    		INSERT INTO historiaClinica_TrabajoSocial (cliente_id,usuario_id,Fecha,Hora,Detalle,trabajosocial)
    		VALUES ('$pacienteId','$ID','$fechar','$hora','$seguimiento','$tipo_trabajo')");



echo "INSERT INTO historiaClinica_TrabajoSocial (cliente_id,usuario_id,Fecha,Hora,Detalle,trabajosocial)
    		VALUES ('$pacienteId','$ID','$fechar','$hora','$seguimiento','$tipo_trabajo')";

    $con=mysqli_query($conn3,"SELECT MAX(ID) as max FROM historiaClinica_TrabajoSocial ");
    	$resu=mysqli_fetch_assoc($con);
    	$historiaClinica1=$resu['max'];




    }



elseif ($tipo_trabajo == 'Terapia Familiar') 
    {



	    $ec1	= $_POST['temas'];
	    $ec2	= $_POST['obj'];
	    $ec3	= $_POST['participantes'];
	    $ec4	= $_POST['des_teran'];
	    $ec5	= $_POST['comp_fami'];  
	    $ec6 	= $_POST['conclusiones'];
	    $ec7 	= $_POST['tp'];
	  

/////////////////////////////////////////
	   

	    //Datos iniciales de la ecografia
	    if(strlen($ec1) > 1){$exp1= '<td>Tema: '.$ec1.'</td>';}
	    if(strlen($ec2) > 1){$exp2= '<td>Objetivo: '.$ec2.'</td></tr>';}
	    if(strlen($ec3) > 1){$exp3= '<tr><td>Nombres de participantes y parentesco: '.$ec3.'</td></tr>';}
	    if(strlen($ec4) > 1){$exp4= '<tr><td>Desarrollo de la Terapia Familiar:'.$ec4.'</td></tr>';}
	    if(strlen($ec5) > 1){$exp5= '<tr><td>Reflexiones y Compromisos de la famila:'.$ec5.'</td></tr>';}
	   
	   if(strlen($ec6) > 1){$exp6= '<tr><td>Conclusión Profesional y Recomendaciones: '.$ec6.'</td></tr>';}
	    if(strlen($ec7) > 1){$exp7= '<tr><td>Profesional responsable y TP: '.$ec7.'';}
        


	    $Terapia= '<table class="table table-bordered"><tr>'.$exp1.$exp2.$exp3.$exp4.$exp5.$exp6.$exp7.'</td></tr></table>';

    	mysqli_query($conn3,"
    		INSERT INTO historiaClinica_TrabajoSocial (cliente_id,usuario_id,Fecha,Hora,Detalle,trabajosocial)
    		VALUES ('$pacienteId','$ID','$fechar','$hora','$Terapia','$tipo_trabajo')");



echo "INSERT INTO historiaClinica_ecografias (cliente_id,usuario_id,Fecha,Hora,ecografiaDetalle,diagnostico,nombreEcografia)
    		VALUES ('$pacienteId','$ID','$fechar','$hora',' $Terapia','$tipo_trabajo')";

    	$con=mysqli_query($conn3,"SELECT MAX(ID) as max FROM historiaClinica_TrabajoSocial ");
    	$resu=mysqli_fetch_assoc($con);
    	$historiaClinica1=$resu['max'];

$contador=$_POST['uploader_count'];


for ($i=0; $i <$contador ; $i++) { 
    $nomb=$_POST['uploader_'.$i.'_name'];

    mysqli_query($conn3,"INSERT INTO imgEcografia (idHistoria, imagen) VALUE
    ('$historiaClinica1','$nomb');");
    
		}



    }
    



    elseif ($tipo_trabajo == 'Acciones Socieducativas') 
    {
    	 
	    $morf1 		= $_POST['sesion'];
	    $morf2 		= $_POST['tematica'];
	    $morf3 		= $_POST['fech'];

	    $morf4 		= $_POST['objeti'];
	    $morf5 		= $_POST['desarr'];
	    $morf6 		= $_POST['recomen'];
	    $morf7 		= $_POST['firma'];

	    

	    if(strlen($morf1) > 1){$mor1= '<table class="table table-bordered">
	    								<tr><td>Sesion: '.$morf1.'</td>';}
	    if(strlen($morf2) > 1){$mor2= '<td>Tema: '.$morf2.'</td>';}
	    if(strlen($morf3) > 1){$mor3= '<td>Fecha: '.$morf3.'</td></tr>';}

	    if(strlen($morf4) > 1){$mor4= '<tr><td>Objetivo de la actividad SocioEducativa Familiar: '.$morf4.'</td></tr>';}
	    if(strlen($morf5) > 1){$mor5= '<tr><td>Desarrollo de la actividad SocioEducativa Familiar: '.$morf5.'</td></tr>';}
	    if(strlen($morf6) > 1){$mor6= '<tr><td>Recomendaciones: '.$morf6.'</td></tr>';}
	    if(strlen($morf7) > 1){$mor7= '<tr><td>Firma del profesional Tratante: '.$morf7.'';}
	    

	    $Socieducativas=$mor1.$mor2.$mor3.$mor4.$mor5.$mor6.$mor7.'</td></tr></table>';


	    mysqli_query($conn3,"
	    	INSERT INTO historiaClinica_TrabajoSocial (cliente_id,usuario_id,Fecha,Hora,Detalle,trabajosocial)
    		VALUES ('$pacienteId','$ID','$fechar','$hora','$Socieducativas','$tipo_trabajo')");



	    echo '<br><br><br><br><br><br><br><br>----------------------- -----------------------------------------------------------'."
	    	INSERT INTO INSERT INTO historiaClinica_TrabajoSocial (cliente_id,usuario_id,Fecha,Hora,Detalle,trabajosocial)
    		VALUES ('$pacienteId','$ID','$fechar','$hora','$Socieducativas','$tipo_trabajo')";

$con=mysqli_query($conn3,"SELECT MAX(ID) as max FROM historiaClinica_TrabajoSocial ");
    	$resu=mysqli_fetch_assoc($con);
    	$historiaClinica1=$resu['max'];

$contador=$_POST['uploader_count'];


for ($i=0; $i <$contador ; $i++) { 
    $nomb=$_POST['uploader_'.$i.'_name'];

    mysqli_query($conn3,"INSERT INTO imgEcografia (idHistoria, imagen) VALUE
    ('$historiaClinica1','$nomb');");
    

 }

    }
  
   
    
    $query=mysqli_query($conn3,"SELECT MAX(id) as trabajo from historiaClinica_TrabajoSocial");
    $nrowl=mysqli_num_rows($query);

    while($rowhc=mysqli_fetch_array($query)){$historiaClinica_TrabajoSocial=$rowhc['trabajo'];} 
    
    //echo "<script language='Javascript'> alert('ecografia=$historiaClinica_ecografias');</script>";


  echo "<script language='Javascript'> window.location='finalizado_trabajoSocial.php?trabajo=$historiaClinica_TrabajoSocial';</script>";


?>