<?php
 
   include 'funciones/funciones.php';
   include 'funciones/funcionesUtilidades.php';
 //  include 'menu.php'; 

       date_default_timezone_set('America/Bogota');
    include("conexiones/conexion.php");
    $con=conectar();
 


$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));


        $motivoConsulta        = reem($_POST['motivoConsulta']);      

        

        $ID                    = $_POST['ID'];          
        $cliente_id            = $_POST['clienteId'];          
        
        // datos de fecha y hora
        $fechar                = date("Y-m-d");
        $Afechar               = date("Y-m-d H:i:s");
        $hora                  = date("H:i:s");


      
    //Historia Ginecologica
   //********Examen Obtetrico*******//
        $motivo_c=reem($_POST['motivo_c']);
        $enfermedad_actual=reem($_POST['enfermedad_actual']);
        $diagnostico_p=reem($_POST['diagnostico_p']);


   //********Antecedentes Hereditario*******//

        $fimico=reem($_POST['fimico']);
        $leuticos=reem($_POST['leuticos']);
        $alcoholicos=reem($_POST['alcoholicos']);
        $neuropaticos=reem($_POST['neuropaticos']);
        $otros_p=reem($_POST['otros_p']);
        $embarazos_m=reem($_POST['embarazos_m']);

        if($fimico <> '')       {$s1= 'Fímico (TB):'.$fimico.'<trong> | </trong>';}
        if($leuticos <> '')     {$s2= 'Leuticos (Sífilis):'.$leuticos.'<trong> | </trong>';}
        if($alcoholicos <> '')  {$s3= 'Alcohólicos:'.$alcoholicos.'<trong> | </trong>';}
        if($neuropaticos <> '') {$s4= 'Neuropáticos:'.$neuropaticos.'<trong> | </trong>';}
        if($otros_p <> '')      {$s4= 'Otros Procesos:'.$otros_p.'<trong> | </trong>';}
        if($embarazos_m <> '')  {$s5= 'Embarazos Multiples:'.$embarazos_m.'<trong> | </trong>';}
            $antecedentes_h=$s1.$s2.$s3.$s4.$s4.$s5;
   //********Antecedentes PErsonales*******//

        $antecedentes__p=$_POST['antecedentes__p'];

   //********Antecedentes Obtetrico*******//

        $embarazo=reem($_POST['embarazo']);
        $anno=reem($_POST['anno']);
        $tipo_parto=reem($_POST['tipo_parto']);
        $hemorragia=reem($_POST['hemorragia']);
        $lesion_p=reem($_POST['lesion_p']);
        $puerperio=reem($_POST['puerperio']);
        $peso_nn=reem($_POST['peso_nn']);
        $vivo_m=reem($_POST['vivo_m']);
        $sexo=reem($_POST['sexo']);

        if($embarazo <> '')     {$ao1= ''.$embarazo.'<trong> | </trong>';}
        if($anno <> '')         {$ao2= ''.$anno.'<trong> | </trong>';}
        if($tipo_parto <> '')   {$ao3= ''.$tipo_parto.'<trong> | </trong>';}
        if($hemorragia <> '')   {$ao4= ''.$hemorragia.'<trong> | </trong>';}
        if($lesion_p <> '')     {$ao5= ''.$lesion_p.'<trong> | </trong>';}
        if($puerperio <> '')    {$ao6= ''.$puerperio.'<trong> | </trong>';}
        if($peso_nn <> '')      {$ao7= ''.$peso_nn.'<trong> | </trong>';}
        if($vivo_m <> '')       {$ao8= ''.$vivo_m.'<trong> | </trong>';}
        if($sexo <> '')         {$ao9= ''.$sexo.'<trong> | </trong>';}
            $antecedentes_obs=$ao1.$ao2.$ao3.$ao4.$ao5.$ao6.$ao7.$ao8.$ao9;
   //********Examen Fisico*******//
        $aspecto_g=reem($_POST['aspecto_g']);
        $piel=reem($_POST['piel']);
        $funciones_n=reem($_POST['funciones_n']);
        $aparato_d=reem($_POST['aparato_d']);
        $aparato_c=reem($_POST['aparato_c']);
        $aparato_r=reem($_POST['aparato_r']);
        $ex_p=reem($_POST['ex_p']);
        $aparato_u=reem($_POST['aparato_u']);
        $aparato_l=reem($_POST['aparato_l']);
        $varices=reem($_POST['varices']);
        $edemas=reem($_POST['edemas']);
        $senos=reem($_POST['senos']);
        $abdomen=reem($_POST['abdomen']);
        $vulva_p=reem($_POST['vulva_p']);
        $vagina=reem($_POST['vagina']);
        $utero_a=reem($_POST['utero_a']);
        $sistema_g=reem($_POST['sistema_g']);
        $otros1=reem($_POST['otros1']);

        if($aspecto_g <> '')          {$efi1= ''.$aspecto_g.'<trong> | </trong>';}
        if($piel <> '')          {$efi2= ''.$piel.'<trong> | </trong>';}
        if($funciones_n <> '')          {$efi3= ''.$funciones_n.'<trong> | </trong>';}
        if($aparato_d <> '')          {$efi4= ''.$aparato_d.'<trong> | </trong>';}
        if($aparato_c <> '')          {$efi5= ''.$aparato_c.'<trong> | </trong>';}
        if($aparato_r <> '')          {$efi6= ''.$aparato_r.'<trong> | </trong>';}
        if($ex_p <> '')          {$efi7= ''.$ex_p.'<trong> | </trong>';}
        if($aparato_u <> '')          {$efi8= ''.$aparato_u.'<trong> | </trong>';}
        if($aparato_l <> '')          {$efi9= ''.$aparato_l.'<trong> | </trong>';}
        if($varices <> '')          {$efi10= ''.$varices.'<trong> | </trong>';}
        if($edemas <> '')          {$efi11= ''.$edemas.'<trong> | </trong>';}
        if($senos <> '')          {$efi12= ''.$senos.'<trong> | </trong>';}
        if($abdomen <> '')          {$efi13= ''.$abdomen.'<trong> | </trong>';}
        if($vulva_p <> '')          {$efi14= ''.$vulva_p.'<trong> | </trong>';}
        if($vagina <> '')          {$efi15= ''.$vagina.'<trong> | </trong>';}
        if($utero_a <> '')          {$efi16= ''.$utero_a.'<trong> | </trong>';}
        if($sistema_g <> '')          {$efi17= ''.$sistema_g.'<trong> | </trong>';}
        if($otros1 <> '')          {$efi18= ''.$otros1.'<trong> | </trong>';}

        $examen_f=$efi1.$efi2.$efi3.$efi4.$efi5.$efi6.$efi7.$efi8.$efi9.$efi10.$efi11.$efi12.$efi13.$efi14.$efi15.$efi16.$efi17.$efi18;

   //********Estado Fisico*******//

        $va1=$_POST['peso_p'];
        $va2=$_POST['peso_a'];
        $va3=$_POST['talla'];
        $va4=$_POST['temperatura'];
        $va5=$_POST['pulso'];
        $va6=$_POST['respiracion'];
        $va7=$_POST['ta'];

        if($va1 <> ''){$top1= ''.$va1.'<trong> | </trong>';}
        if($va2 <> ''){$top2= ''.$va2.'<trong> | </trong>';}
        if($va3 <> ''){$top3= ''.$va3.'<trong> | </trong>';}
        if($va4 <> ''){$top4= ''.$va4.'<trong> | </trong>';}
        if($va5 <> ''){$top5= ''.$va5.'<trong> | </trong>';}
        if($va6 <> ''){$top6= ''.$va6.'<trong> | </trong>';}
        if($va7 <> ''){$top7= ''.$va7.'<trong> | </trong>';}

        $controlPrenatal=$top1.$top2.$top3.$top4.$top5.$top6.$top7;
        

        $hem1=$_POST['globulos_r'];
        $hem2=$_POST['otrosv1'];
        $hem3=$_POST['globulos_b'];
        $hem4=$_POST['glicemia'];
        $hem5=$_POST['hemoglobina'];
        $hem6=$_POST['uroanalisis'];
        $hem7=$_POST['hematocrito'];
        $hem8=$_POST['coproanalisis']; 

        if($hem1 <> ''){$get1= ''.$hem1.'<trong> | </trong>';}
        if($hem2 <> ''){$get2= ''.$hem2.'<trong> | </trong>';}
        if($hem3 <> ''){$get3= ''.$hem3.'<trong> | </trong>';}
        if($hem4 <> ''){$get4= ''.$hem4.'<trong> | </trong>';}
        if($hem5 <> ''){$get5= ''.$hem5.'<trong> | </trong>';}
        if($hem6 <> ''){$get6= ''.$hem6.'<trong> | </trong>';}
        if($hem7 <> ''){$get7= ''.$hem7.'<trong> | </trong>';}
        if($hem8 <> ''){$get8= ''.$hem8.'<trong> | </trong>';}

        $hematologia=$get1.$get2.$get3.$get4.$get5.$get6.$get7.$get8;


   //********Control Prenatal*******//

        $conp1=$_POST['amenorrea'];
        $conp2=$_POST['parto_p'];
        $conp3=$_POST['paridad'];
        $conp4=$_POST['donde_h_p'];
        $conp5=$_POST['numero_c'];
        $conp6=$_POST['resumen_i'];


        if($conp1 <> ''){$co1= ''.$conp1.'<trong> | </trong>';}
        if($conp2 <> ''){$co2= ''.$conp2.'<trong> | </trong>';}
        if($conp3 <> ''){$co3= ''.$conp3.'<trong> | </trong>';}
        if($conp4 <> ''){$co4= ''.$conp4.'<trong> | </trong>';}
        if($conp5 <> ''){$co5= ''.$conp5.'<trong> | </trong>';}
        if($conp6 <> ''){$co6= ''.$conp6.'<trong> | </trong>';}

        $control_p=$co1.$co2.$co3.$co4.$co5.$co6;

   //********Exploración Útero-Abdominal a la Admisión*******//

        $evalu1=$_POST['dia'];
        $evalu2=$_POST['altura_u'];
        $evalu3=$_POST['circunferencia_a'];
        $evalu4=$_POST['presentacionv1'];
        $evalu5=$_POST['encajamiento'];
        $evalu6=$_POST['auscultacion_foco'];
        $evalu7=$_POST['edad'];
        $evalu8=$_POST['particularidades'];
 
        if(strlen($evalu1) > 1){$eexp1= 'dia '.$evalu1.'<trong> | </trong>';}
        if(strlen($evalu2) > 1){$eexp2= 'altura '.$evalu2.'<trong> | </trong>';}
        if(strlen($evalu3) > 1){$eexp3= 'circunferencia  '.$evalu3.'<trong> | </trong>';}
        if(strlen($evalu4) > 1){$eexp4= 'presentacionv1 '.$evalu4.'<trong> | </trong>';}
        if(strlen($evalu5) > 1){$eexp5= 'encajamiento '.$evalu5.'<trong> | </trong>';}
        if(strlen($evalu6) > 1){$eexp6= 'auscultacion_foco '.$evalu6.'<trong> | </trong>';}
        if(strlen($evalu7) > 1){$eexp7= 'edad '.$evalu7.'<trong> | </trong>';}
        if(strlen($evalu8) > 1){$eexp8= 'particularidades '.$evalu8.'<trong> | </trong>';}
        $exploracionUtero =$eexp1.$eexp2.$eexp3.$eexp4.$eexp5.$eexp6.$eexp7.$eexp8;

        $evolucion=$_POST['evolucion'];
   //********Resumen Ingreso******//


        $ult1=$_POST['mc'];
        $ult2=$_POST['hea'];
        $ult3=$_POST['app'];
        $ult4=$_POST['apf'];
        $ult5=$_POST['ago'];
        $ult6=$_POST['exa_fisi'];
        $ult7=$_POST['condiciones'];
        $ult8=$_POST['idx'];

        if($ult1 <> ''){$ingre1= 'mc'.$ult1.'<trong> | </trong>';}
        if($ult2 <> ''){$ingre2= ''.$ult2.'<trong> | </trong>';}
        if($ult3 <> ''){$ingre3= ''.$ult3.'<trong> | </trong>';}
        if($ult4 <> ''){$ingre4= ''.$ult4.'<trong> | </trong>';}
        if($ult5 <> ''){$ingre5= ''.$ult5.'<trong> | </trong>';}
        if($ult6 <> ''){$ingre6= ''.$ult6.'<trong> | </trong>';}
        if($ult7 <> ''){$ingre7= ''.$ult7.'<trong> | </trong>';}
        if($ult8 <> ''){$ingre8= ''.$ult8.'<trong> | </trong>';}


        $resumen_ingreso=$ingre1.$ingre2.$ingre3.$ingre4.$ingre5.$ingre6.$ingre7.$ingre8;


echo "INSERT INTO historiaClinica5_genicologica  
(cliente_id, usuario_id, Fecha,     Hora,    motivo, enfermedadActual,        diagnostico,      antecedentesH,   antecedentesP,     antecedentesO,      examenFisico, controlPrenatal,   hematologia,    evolucion,    examenFisico2, exploracionUtero  ,        ResumenIngreso) VALUES 
('$clienteId', '$ID',    '$fechar', '$hora',' $motivo_c','$enfermedad_actual','$diagnostico_p','$antecedentes_h','$antecedentes__p','$antecedentes_obs','$examen_f','$controlPrenatal',
    '$hematologia', '$evolucion', '$control_p','$exploracionUtero','$resumen_ingreso' );";
 


            mysqli_query($conn3,"INSERT INTO historiaClinica5_genicologica  
(cliente_id, usuario_id, Fecha,     Hora,    motivo, enfermedadActual,        diagnostico,      antecedentesH,   antecedentesP,     antecedentesO,      examenFisico, controlPrenatal,   hematologia,    evolucion,    examenFisico2, exploracionUtero  ,        ResumenIngreso) VALUES 
('$clienteId', '$ID',    '$fechar', '$hora',' $motivo_c','$enfermedad_actual','$diagnostico_p','$antecedentes_h','$antecedentes__p','$antecedentes_obs','$examen_f','$controlPrenatal',
    '$hematologia', '$evolucion', '$control_p','$exploracionUtero','$resumen_ingreso' );");












              $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as historiaClinica5_genicologica from historiaClinica5_genicologica ");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $historiaClinica1=$rowhc['historiaClinica5_genicologica'];
              }   












        $queryList=mysqli_query($conn3,"SELECT * FROM  config where ID_Usuario=$ID");
        $nrowl=mysqli_num_rows($queryList);
        while($rowMotorizado=mysqli_fetch_array($queryList))
        {
            $whatsapp = $rowMotorizado['whatsapp'];
        }


        $queryList=mysqli_query($conn3,"SELECT * FROM  cliente where cliente_id=$clienteId");
        $nrowl=mysqli_num_rows($queryList);
        while($rowMotorizado=mysqli_fetch_array($queryList))
        {
            $celular_cliente = $rowMotorizado['celular_cliente'];
        }





 







$mensaje = ' Resultado de la consulta  con el Dr(a) *'.$NOMBRE_USUARIO.'*, *Diagnostico* '.$diagnostico.' *Tratamiento* '.$tratamiento.'. ***Si no desea recibir notificaciones puede darle de baja en cualquier momento respondiendo con la palabra NO. Atte DR ALBUJA CENTROS MEDICOS-MedicalSoft';
Whatsapp_sent($celular_cliente, $mensaje);


 

 

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
<td width="80%"><p>motivo Consulta</p>
<br />

<h3>  '.$motivoConsulta.'  </h3> 

<br> 

</td>
<br />



<td width="10%">&nbsp;</td>
</tr>

<tr>
<td width="10%">&nbsp;</td>
<td width="80%"><p>diagnostico</p>
<br />

<h3>  '.$diagnostico.'  </h3> 

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

<tr>
<td width="10%">&nbsp;</td>
<td width="80%"><p>Recipe</p>
<br/>

<h3>  '.$recipe.'  </h3> 

<br> 

</td>
<br/>
 


<td width="10%">&nbsp;</td>
</tr>

<tr>
<td width="10%">&nbsp;</td>
<td width="80%"><p>Incapacidad</p>
<br/>

<h3>  '.$incapacidades.'  </h3> 

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
Whatsapp_sent($telefono, $mensaje);


$mensaje2 = ' Dr(a) *'.$doctor.'*  se a agendado  una cita con la paciente *'.$nombre.'*,  *'.$fecha.'* a las *'.$Hora.'* en *'.$sucursal.'*. Motivo: *'.$motivoConsulta.'* Atte DR ALBUJA CENTROS MEDICOS MedicalSoft';
Whatsapp_sent($whatsapp, $mensaje2);









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


  echo "<script language='Javascript'> window.location='finalizadoGinecolgia.php?historiaClinica1=$historiaClinica1';</script>"; 



?>