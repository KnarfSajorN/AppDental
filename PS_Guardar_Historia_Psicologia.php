<?php
   //include 'header.php';
   include 'funciones/funciones.php';
   include 'funciones/funcionesUtilidades.php';
 //  include 'menu.php'; 

    date_default_timezone_set('America/Bogota');
 
         $ID                    = $_POST['ID']; 
         $idusuario                    = $_POST['ID'];          
         $pacienteId            = $_POST['clienteId'];          
        
        // datos de fecha y hora
//        $fechar                = date("Y-m-d");
   

// esto para que no tome la hora de la insert 
   //      $hora                  = date("H:i:s");
         $hora1                  = date("H:i:s");
 

        $fechar                = $_POST['fechar'];  
        


         $Afechar               = date("Y-m-d H:i:s");
         
        
        //tabla de cita
         $P                     = $_POST['P'];  
         $doctor                = $_POST['doctor'];  
         $motivo                = reem($_POST['motivo']);

        //tabla de examen_obstetrico
        
        //select de tipo de consulta
         $tipoConsulta           = $_POST['tipoConsulta'];

        //Datos de Entrevista Inicial
        $val1          = $_POST['motivo_c'];
        $val2          = $_POST['form_ini'];  
        $val3          = $_POST['curso'];  
        $val4          = $_POST['sintoma_pi'];   
        $val5          = $_POST['relato_gen'];
        $val6          = $_POST['funciones_bio'];
        $val7          = $_POST['apetito'];
        $val8          = $_POST['sed'];
        $val9         = $_POST['sueno'];
        $val10         = $_POST['orina'];
        $val11         = $_POST['deposiciones'];
        $val12         = $_POST['variacion_pe'];
 
        //verificamos que existen datos en las variables

  
        if(strlen($val1) > 0){$eexp1= 'Motivo de la Consulta: '.$val1.'<trong> | </trong>';}
        if(strlen($val2) > 0){$eexp2= 'Forma de Inicio: '.$val2.'<trong> | </trong>';}
        if(strlen($val3) > 0){$eexp3= 'Curso: '.$val3.'<trong> | </trong>';}
        if(strlen($val4) > 0){$eexp4= 'Síntomas Principales: '.$val4.'<trong> | </trong>';}
        if(strlen($val5) > 0){$eexp5= 'Relato General: '.$val5.'<trong> | </trong>';}
        if(strlen($val6) > 0){$eexp6= 'Funciones Biológicas: '.$val6.'<trong> | </trong>';}
        if(strlen($val7) > 0){$eexp7= 'Apetito: '.$val7.'<trong> | </trong>';}
        if(strlen($val8) > 0){$eexp8= 'Sed: '.$val8.'<trong> | </trong>';}
        if(strlen($val9) > 0){$eexp9= 'Sue&ntilde;o: '.$val9.'<trong> | </trong>';}
        if(strlen($val10) > 0){$eexp10= 'Orina: '.$val10.'<trong> | </trong>';}
        if(strlen($val11) > 0){$eexp11= 'Deposiciones: '.$val11.'<trong> | </trong>';}
        if(strlen($val12) > 0){$eexp12= 'Variación de Peso: '.$val12.'<trong> | </trong>';}
       
        

         $entrevistaInicial=$eexp1.$eexp2.$eexp3.$eexp4.$eexp5.$eexp6.$eexp7.$eexp8.$eexp9.$eexp10.$eexp11.$eexp12;


        //datos de historia familiares
        
        $fam1             = $_POST['padre'];
        $fam2             = $_POST['madre'];   
        $fam3             = $_POST['hermanos'];  
        $fam4             = $_POST['sobrinos'];
        
        if(strlen($fam1) > 0){$dat1= 'Padre: '.$fam1.'<trong> | </trong>';}
        if(strlen($fam2) > 0){$dat2= 'Madre: '.$fam2.'<trong> | </trong>';}
        if(strlen($fam3) > 0){$dat3= 'Hermanos: '.$fam3.'<trong> | </trong>';}
        if(strlen($fam4) > 0){$dat4= 'Sobrinos: '.$fam4.'<trong> | </trong>';}


         $historiaFamiliar=$dat1.$dat2.$dat3.$dat4;
        

        //datos de historia personal
        
        $pers1          = $_POST['prenatal'];
        $pers2          = $_POST['natales'];
        $pers3          = $_POST['postnatales'];
        $pers4          = $_POST['actividad_sex'];
        $pers5          = $_POST['ant_pers_pat'];
        $pers6          = $_POST['ant_pers_gen'];
        
        if(strlen($pers1) > 0){$valor1= 'Prenatal: '.$pers1.'<trong> | </trong>';}
        if(strlen($pers2) > 0){$valor2= 'Natales: '.$pers2.'<trong> | </trong>';}
        if(strlen($pers3) > 0){$valor3= 'Postnatales: '.$pers3.'<trong> | </trong>';}
        if(strlen($pers4) > 0){$valor4= 'Actividad Sexual: '.$pers4.'<trong> | </trong>';}
        if(strlen($pers5) > 0){$valor5= 'Antecedentes Personales Patológicos: '.$pers5.'<trong> | </trong>';}
        if(strlen($pers6) > 0){$valor6= 'Antecedentes Personales Generales: '.$pers6.'<trong> | </trong>';}


         $historiaPersonal=$valor1.$valor2.$valor3.$valor4.$valor5.$valor6;

        //Datos de Personalidad
        $per1         = $_POST['inteligencia'];
        $per2         = $_POST['satisfacciones'];
        $per3         = $_POST['hab_espec'];
        $per4         = $_POST['hab_emp_tie'];
        $per5         = $_POST['est_ani_hab'];
        $per6         = $_POST['ras_dom'];
        $per7         = $_POST['rel_otras_p'];
        $per8         = $_POST['obj_asp'];
        $per9         = $_POST['ideales'];

        
        if(strlen($per1) > 0){$vr1= 'Inteligencia: '.$per1.'<trong> | </trong>';}
        if(strlen($per2) > 0){$vr2= 'Satisfacciones: '.$per2.'<trong> | </trong>';}
        if(strlen($per3) > 0){$vr3= 'Habilidades Especiales: '.$per3.'<trong> | </trong>';}
        if(strlen($per4) > 0){$vr4= 'Hábitos y Empleo del Tiempo: '.$per4.'<trong> | </trong>';}
        if(strlen($per5) > 0){$vr5= 'Estado de Ánimo Habitual: '.$per5.'<trong> | </trong>';}
        if(strlen($per6) > 0){$vr6= 'Rasgos Dominantes: '.$per6.'<trong> | </trong>';}
        if(strlen($per7) > 0){$vr7= 'Relaciones con Otras Personas: '.$per7.'<trong> | </trong>';}
        if(strlen($per8) > 0){$vr8= 'Objetivos y Aspiraciones: '.$per8.'<trong> | </trong>';}
        if(strlen($per9) > 0){$vr9= 'Ideales: '.$per9.'<trong> | </trong>';}

         $personalidad=$vr1.$vr2.$vr3.$vr4.$vr5.$vr6.$vr7.$vr8.$vr9;
        

        //datos de examen mental
        
        $ment1          = $_POST['porte'];
        $ment2          = $_POST['comportamiento'];
        $ment3          = $_POST['actitud'];
        $ment4          = $_POST['conciencia'];
        $ment5          = $_POST['atencion']; 
        $ment6          = $_POST['orientacion'];
        $ment7          = $_POST['lenguaje'];
       
        if(strlen($ment1) > 0){$m1= 'Porte: '.$ment1.'<trong> | </trong>';}
        if(strlen($ment2) > 0){$m2= 'Comportamiento: '.$ment2.'<trong> | </trong>';}
        if(strlen($ment3) > 0){$m3= 'Actitud: '.$ment3.'<trong> | </trong>';}
        if(strlen($ment4) > 0){$m4= 'Conciencia: '.$ment4.'<trong> | </trong>';}
        if(strlen($ment5) > 0){$m5= 'Atención: '.$ment5.'<trong> | </trong>';}
        if(strlen($ment6) > 0){$m6= 'Orientación: '.$ment6.'<trong> | </trong>';}
        if(strlen($ment7) > 0){$m7= 'Lenguaje: '.$ment7.'<trong> | </trong>';}

         $examenMental=$m1.$m2.$m3.$m4.$m5.$m6.$m7;
        

        $educacion               = $_POST['educacion'];
        $trabajo                 = $_POST['trabajo'];
        $cambio_res              = $_POST['cambio_res'];
        $acc_enf                 = $_POST['acc_enf'];
        $vidaSexual              = $_POST['vidaSexual'];
        $hab_int                 = $_POST['hab_int'];
        $act_fam                 = $_POST['act_fam'];
        $suenos                  = $_POST['suenos'];
        $ant_socio               = $_POST['ant_socio'];
        $evaluacion              = $_POST['evaluacion'];
        $tratamiento             = $_POST['tratamiento'];
        $evolucion               = $_POST['evolucion'];
        $fechaevolucion          = $_POST['fechaevolucion'];

if($fechaevolucion == ''){$fechaE= '0000-00-00';}else{$fechaE= $fechaevolucion;}

$query = "INSERT INTO HistoriaClinica12 (cliente_id, usuario_id, Fecha, entrevistaInicial, historiaPersonal, historiaFamiliar, Personalidad, examenMental, educacion, Trabajo, cambioResidencia, accidentesEnfermedades, vidaSexual, habitosIntereses, actitudConFamilia, suenos, AntecedentesSocioeconomicos, evaluacion, tratamiento, evolucion,fechaEvolucion) VALUES ($pacienteId,$ID,$fechar,$entrevistaInicial,$historiaPersonal,$historiaFamiliar,$personalidad,$examenMental,$educacion,$trabajo,$cambio_res,$acc_enf,$vidaSexual,$hab_int,$act_fam,$suenos,$ant_socio,$evaluacion,$tratamiento,$evolucion,$fechaE);";
$enlace_actual = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$enlace_actual = str_replace('.php', '', $enlace_actual);

auditorMaster($idusuario, '1', $enlace_actual, $query);

       
      mysqli_query($conn3,"INSERT INTO HistoriaClinica12 (cliente_id, usuario_id, Fecha, entrevistaInicial, historiaPersonal, historiaFamiliar, Personalidad, examenMental, educacion, Trabajo, cambioResidencia, accidentesEnfermedades, vidaSexual, habitosIntereses, actitudConFamilia, suenos, AntecedentesSocioeconomicos, evaluacion, tratamiento, evolucion,fechaEvolucion) VALUES ('$pacienteId','$ID','$fechar','$entrevistaInicial','$historiaPersonal','$historiaFamiliar','$personalidad','$examenMental','$educacion','$trabajo','$cambio_res','$acc_enf','$vidaSexual','$hab_int','$act_fam','$suenos','$ant_socio','$evaluacion','$tratamiento','$evolucion','$fechaE')");


 

echo "INSERT INTO HistoriaClinica12 (cliente_id, usuario_id, Fecha, entrevistaInicial, historiaPersonal, historiaFamiliar, Personalidad, examenMental, educacion, Trabajo, cambioResidencia, accidentesEnfermedades, vidaSexual, habitosIntereses, actitudConFamilia, suenos, AntecedentesSocioeconomicos, evaluacion, tratamiento, evolucion,fechaEvolucion) VALUES ('$pacienteId','$ID','$fechar','$entrevistaInicial','$historiaPersonal','$historiaFamiliar','$personalidad','$examenMental','$educacion','$trabajo','$cambio_res','$acc_enf','$vidaSexual','$hab_int','$act_fam','$suenos','$ant_socio','$evaluacion','$tratamiento','$evolucion','$fechaE')";
 
  
              $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as historiaClinica12 from HistoriaClinica12 ");
              if ($queryListhc) {
                while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $historiaClinica1=$rowhc['historiaClinica12'];
              }  
              }
               




        $queryList=mysqli_query($conn3,"SELECT * FROM  config where ID_Usuario=$ID");
        if ($queryList) {
          while($rowMotorizado=mysqli_fetch_array($queryList))
        {
            $whatsapp = $rowMotorizado['whatsapp'];
        }
        }
        


        $queryList=mysqli_query($conn3,"SELECT * FROM  cliente where cliente_id=$clienteId");
        if ($queryList) {
          while($rowMotorizado=mysqli_fetch_array($queryList))
        {
            $celular_cliente = $rowMotorizado['celular_cliente'];
        }

        }
        
 
$mensaje = ' Resultado de la consulta  con el Dr(a) *'.$NOMBRE_USUARIO.'*, *Diagnostico* '.$evaluacion.' *Tratamiento* '.$tratamiento.'. ***Si no desea recibir notificaciones puede darle de baja en cualquier momento respondiendo con la palabra NO. Atte DR ALBUJA CENTROS MEDICOS-MedicalSoft';
//Whatsapp_sent($celular_cliente, $mensaje);


 

 

                $para ="$email";

                // título
                $título = ' Resultado de la consulta';

                // mensaje
$mensaje = ' 
<html>
<head>
  <title>Resultado de la consulta</title>
    <table width="100%" height="466" border="0">
  <tr>
    <td><table width="100%" height="75" border="0">
      
    </table>
      <table width="100%" height="143" border="0">
        <tr>
          <td height="139" bgcolor="#00A74B"><table width="100%" height="62" border="0">
            <tr>
              <td width="5%">&nbsp;</td>
              <td width="72%" style="color:#FFF;"><h1><strong>Resultado de la consulta </strong></h1></td>
              <td width="23%">&nbsp;</td>
            </tr>
          </table></td>
        </tr>
      </table>
      <table width="100%" height="122" border="0">
<tr>
<td width="10%">&nbsp;</td>
<td width="80%"><p>evaluacion</p>
<br />

<h3>  '.$evaluacion.'  </h3> 

<br> 

</td>
<br />



<td width="10%">&nbsp;</td>
</tr>

<tr>
<td width="10%">&nbsp;</td>
<td width="80%"><p>tratamiento</p>
<br />

<h3>  '.$tratamiento.'  </h3> 

<br> 

</td>
<br />


 




<td width="10%">&nbsp;</td>
</tr>
</table>

<p>Atentamente,<br />
'.$NOMBRE_USUARIO.'</p> 

                      <table width="100%" border="0">
                        <tr>
                          <td height="21" bgcolor="#00A74B">&nbsp;</td>
                        </tr>
                      </table>
                      <table width="100%" height="64" border="0">
                        <tr>
                          <td height="60">Este correo electrónico no puede recibir respuestas. Para obtener más información, Contactart a '.$NOMBRE_USUARIO.'<br />
                         </td>
                        </tr>
                    </table></td>
                  </tr>
                </table>
                </head>
                <body>

                </body>
                </html>
                ';

                // Para enviar un correo HTML, debe establecerse la cabecera Content-type
                $cabeceras  = ' MIME-Version: 1.0' . "\r\n";
                $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

                // Cabeceras adicionales
                $cabeceras .= 'To: '.$NOMBRE_USUARIO.' <noreply@medicalsoftcolombia.com>' . "\r\n";
                $cabeceras .= 'From: Resultado de la consulta <noreply@medicalsoftcolombia.com>' . "\r\n";
                $cabeceras .= 'Cc: noreply@medicalsoftcolombia.com' . "\r\n";
                $cabeceras .= 'Bcc: noreply@medicalsoftcolombia.com' . "\r\n";

                // Enviarlo
                mail($para, $título, $mensaje, $cabeceras);
 

$verficar = date("Y-m-d");
 

if ($Afecha>$verficar) 
{

echo '<br> CALENDARIO  1 1'.$verficar.' <br>';

$mensaje = ' Sr(a) *'.$nombre.'* usted a agendado un cita médica con Dr(a) *'.$doctor.'* el dia *'.$fecha.'* a las *'.$Hora.'* en *'.$sucursal.'*. Si no desea recibir notificaciones puede darle de baja en cualquier momento respondiendo con la palabra NO. Atte DR ALBUJA CENTROS MEDICOS-MedicalSoft';
// Whatsapp_sent($telefono, $mensaje);

$mensaje2 = ' Dr(a) *'.$doctor.'*  se a agendado  una cita con la paciente *'.$nombre.'*,  *'.$fecha.'* a las *'.$Hora.'* en *'.$sucursal.'*. Motivo: *'.$motivoConsulta.'* Atte DR ALBUJA CENTROS MEDICOS MedicalSoft';
// Whatsapp_sent($whatsapp, $mensaje2);









     mysqli_query($conn3,"INSERT INTO citas (doctor, fecha, Hora, nombre, telefono, correo, motivoConsulta, estado, registrado, usuario_id , tipo) 
                VALUES ('$doctor', '$Afecha', '$Ahora', '$nombre', '$telefono', '$email', '$motivo', '1', '$Afechar', '$ID', '0')");
                 

                $para ="$email";

                // título
                $título = ' Cita Agendada';

                // mensaje
                $mensaje = ' 
                <html>
                <head>
                  <title>Cita Agendada</title>
                    <table width="100%" height="466" border="0">
                  <tr>
                    <td><table width="100%" height="75" border="0">
                      
                    </table>
                      <table width="100%" height="143" border="0">
                        <tr>
                          <td height="139" bgcolor="#00A74B"><table width="100%" height="62" border="0">
                            <tr>
                              <td width="5%">&nbsp;</td>
                              <td width="72%" style="color:#FFF;"><h1><strong>Cita Agendada</strong></h1></td>
                              <td width="23%">&nbsp;</td>
                            </tr>
                          </table></td>
                        </tr>
                      </table>
                      <table width="100%" height="122" border="0">
<tr>
<td width="10%">&nbsp;</td>
<td width="80%"><p>Cita Agendada por el doctor(a) '.$NOMBRE_USUARIO.'</p>
<br />

<h3>  Se a  agendado un cita para ustes el dia <strong>  '.$Afecha.' </strong> a las  <strong>   '.$Ahora.'  </strong>  , Motivo:  <strong>  '.$motivo.' </strong>   </h3> 

<br> 

</td>
<br />



<td width="10%">&nbsp;</td>
</tr>

</table>

<p>Atentamente,<br />
'.$NOMBRE_USUARIO.'</p> 

                      <table width="100%" border="0">
                        <tr>
                          <td height="21" bgcolor="#00A74B">&nbsp;</td>
                        </tr>
                      </table>
                      <table width="100%" height="64" border="0">
                        <tr>
                          <td height="60">Este correo electrónico no puede recibir respuestas. Para obtener más información, Contactart a '.$NOMBRE_USUARIO.'<br />
                         </td>
                        </tr>
                    </table></td>
                  </tr>
                </table>
                </head>
                <body>

                </body>
                </html>
                ';

                // Para enviar un correo HTML, debe establecerse la cabecera Content-type
                $cabeceras  = ' MIME-Version: 1.0' . "\r\n";
                $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

                // Cabeceras adicionales
                $cabeceras .= 'To: '.$NOMBRE_USUARIO.' <noreply@medicalsoftcolombia.com>' . "\r\n";
                $cabeceras .= 'From: Resultado de su Cita <noreply@medicalsoftcolombia.com>' . "\r\n";
                $cabeceras .= 'Cc: noreply@medicalsoftcolombia.com' . "\r\n";
                $cabeceras .= 'Bcc: noreply@medicalsoftcolombia.com' . "\r\n";

                // Enviarlo
                mail($para, $título, $mensaje, $cabeceras);

}


echo "<script language='Javascript'> window.location='PS_Finalizado_Psicologia?historiaClinica1=$historiaClinica1';</script>"; 




?>