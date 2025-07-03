<?php
   //include 'header.php';
   include 'funciones/funciones.php';
   include 'funciones/funcionesUtilidades.php';
 //  include 'menu.php'; 



    date_default_timezone_set('America/Bogota');
    include("conexiones/conexion.php");
    $con=conectar();
 
        $registro              = $_POST['registro'];          
        $ID                    = $_POST['ID'];          
        $clienteId             = $_POST['clienteId'];          
       
        $motivoConsulta        = reem($_POST['motivoConsulta']);      
        $motivo                = reem($_POST['motivo']);      
        $diagnostico           = reem($_POST['diagnostico']); 
        $NOMBRE_USUARIO        = reem($_POST['NOMBRE_USUARIO']); 
        
        $tratamientoResumen    = reem($_POST['tratamientoResumen']);
 
        $Afecha                = $_POST['fecha'];        
        $Ahora                 = $_POST['hora'];        
        $email                 = $_POST['email'];        
        $nombre                = reem($_POST['nombre']);        
        $telefono              = $_POST['telefono'];        
        $motivoConsulta              = $_POST['motivoConsulta'];        
        $CIE10             = $_POST['cie10D1'];        
        


        $envejecimiento              = $_POST['envejecimiento'];        
        $cirugia              = $_POST['cirugia'];        
               
        

         $rs1                 = $_POST['rs1'];        
        $rs2                 = $_POST['rs2'];        
        $rs3                 = $_POST['rs3'];        
        $rs4                 = $_POST['rs4'];        
        $rs5                 = $_POST['rs5'];        
        $rs6                 = $_POST['rs6'];        
        $rs7                 = $_POST['rs7'];        
        $rs8                 = $_POST['rs8'];        
        $rs9                 = $_POST['rs9'];        
        $rs10                 = $_POST['rs10'];        
        $rs11                 = $_POST['rs11'];        
        $rs12                 = $_POST['rs12'];        
        $rs13                 = $_POST['rs13'];        
        $rs14                 = $_POST['rs14'];        
        $rs15                 = $_POST['rs15'];        
        $rs16                 = $_POST['rs16'];        
        $rs17                 = $_POST['rs17'];        
        $rs18                 = $_POST['rs18'];
        
        $enfermedadActual                 = $_POST['enfermedadActual'];



        

        if ($rs1 <> '') {$s1 = ' Fiebre : '.sino($rs1).'<trong> | </trong>';}
        if ($rs2 <> '') {$s2 = ' Tos: '.sino($rs2).'<trong> | </trong>';}
        if ($rs3 <> '') {$s3 = ' Rinorrea: '.sino($rs3).'<trong> | </trong>';}
        if ($rs4 <> '') {$s4 = ' Cefalea: '.sino($rs4).'<trong> | </trong>';}
        if ($rs5 <> '') {$s5 = ' Mareo: '.sino($rs5).'<trong> | </trong>';}
        if ($rs6 <> '') {$s6 = ' Vomito: '.sino($rs6).'<trong> | </trong>';}
        if ($rs7 <> '') {$s7 = ' Diarrea: '.sino($rs7).'<trong> | </trong>';}
        if ($rs8 <> '') {$s8 = ' Disuria: '.sino($rs8).'<trong> | </trong>';}
        if ($rs9 <> '') {$s9 = ' Dolor de Garganta: '.sino($rs9).'<trong> | </trong>';}
        if ($rs10 <> '') {$s10 = ' Dolor Adominal: '.sino($rs10).'<trong> | </trong>';}
        if ($rs11 <> '') {$s11 = ' Disnea: '.sino($rs11).'<trong> | </trong>';}
        if ($rs12 <> '') {$s12 = ' Otalgia: '.sino($rs12).'<trong> | </trong>';}
        if ($rs13 <> '') {$s13 = ' Perdida de Peso: '.sino($rs13).'<trong> | </trong>';}
        if ($rs14 <> '') {$s14 = ' Sangre en las heces o al defecar: '.sino($rs14).'<trong> | </trong>';}
        if ($rs15 <> '') {$s15 = ' Hematuria: '.sino($rs15).'<trong> | </trong>';}
        if ($rs16 <> '') {$s16 = ' Dolor en las extremidades: '.sino($rs16).'<trong> | </trong>';}
        if ($rs17 <> '') {$s17 = ' Parestesias: '.sino($rs17).'<trong> | </trong>';}
        if ($rs18 <> '') {$s18 = ' Hipoestesias: '.sino($rs18).'<trong> | <br> </trong>';}
        if (strlen($enfermedadActual)> 0) {$senfermedadActual = 'Enfermedad Actual: '.$enfermedadActual.'<trong> | </trong>';}



        $rSistema = $s1.$s2.$s3.$s4.$s5.$s6.$s7.$s8.$s9.$s10.$s11.$s12.$s13.$s14.$s15.$s16.$s17.$s18.$senfermedadActual;  

echo '>> '.$rSistema;





  



        $prestaciones1         = reem($_POST['prestaciones1']);   
        $prestaciones2         = reem($_POST['prestaciones2']);   



        $activo                = 1;
        $fechar                = date("Y-m-d");
        $Afechar               = date("Y-m-d H:i:s");
        $hora                  = date("H:i:s");
       


        $P                     = $_POST['P'];  
        $doctor                     = $_POST['doctor'];  
        $motivo                = reem($_POST['motivo']);   



        






        $t11                 = $_POST['t11'];        
        $t12                 = $_POST['t12'];        
        $t13                 = $_POST['t13'];        
        $t14                 = $_POST['t14'];        
        $t15                 = $_POST['t15'];        
        $t16                 = $_POST['t16'];        
        $t17                 = $_POST['t17'];        
        $t18                 = $_POST['t18'];        
        $t19                 = $_POST['t19'];        
        $t20                 = $_POST['t20'];        
        $t21                 = $_POST['t21'];        
        $t22                 = $_POST['t22'];        
        $t23                 = $_POST['t23'];        
        $t24                 = $_POST['t24'];        
        $t25                 = $_POST['t25'];        
        $t26                 = $_POST['t26'];        
        $t27                 = $_POST['t27'];        
        $t28                 = $_POST['t28'];        
        $t29                 = $_POST['t29'];        
        $t30                 = $_POST['t30'];        
        $t31                 = $_POST['t31'];        
        $t32                 = $_POST['t32'];        
        $t33                 = $_POST['t33'];        
        $diagnostico1        = $_POST['diagnostico1'];        
        



if (strlen($t11)> 0) {$rt11 = $e11.'<trong> | </trong>';}
if (strlen($t12)> 0) {$rt12 = $e12.'<trong> | </trong>';}
if (strlen($t13)> 0) {$rt13 = $e13.'<trong> | </trong>';}
if (strlen($t14)> 0) {$rt14 = $e14.'<trong> | </trong>';}
if (strlen($t15)> 0) {$rt15 = $e15.'<trong> | </trong>';}
if (strlen($t16)> 0) {$rt16 = $e16.'<trong> | </trong>';}
if (strlen($t17)> 0) {$rt17 = $e17.'<trong> | </trong>';}
if (strlen($t18)> 0) {$rt18 = $e18.'<trong> | </trong>';}
if (strlen($t19)> 0) {$rt19 = $e19.'<trong> | </trong>';}
if (strlen($t20)> 0) {$rt20 = $e20.'<trong> | </trong>';}
if (strlen($t21)> 0) {$rt21 = $e21.'<trong> | </trong>';}
if (strlen($t22)> 0) {$rt22 = $e22.'<trong> | </trong>';}
if (strlen($t23)> 0) {$rt23 = $e23.'<trong> | </trong>';}
if (strlen($t24)> 0) {$rt24 = $e24.'<trong> | </trong>';}
if (strlen($t25)> 0) {$rt25 = $e25.'<trong> | </trong>';}
if (strlen($t26)> 0) {$rt26 = $e11.'<trong> | </trong>';}
if (strlen($t27)> 0) {$rt27 = $e11.'<trong> | </trong>';}
if (strlen($t28)> 0) {$rt28 = $e11.'<trong> | </trong>';}
if (strlen($t29)> 0) {$rt29 = $e11.'<trong> | </trong>';}
if (strlen($t30)> 0) {$rt30 = $e11.'<trong> | </trong>';}
if (strlen($t31)> 0) {$rt31 = $e11.'<trong> | </trong>';}
if (strlen($t32)> 0) {$rt32 = $e11.'<trong> | </trong>';}
if (strlen($t33)> 0) {$rt33 = $e11.'<trong> | </trong>';} 
if (strlen($diagnostico1)> 0) {$rdiagnostico1 = $diagnostico1.'<trong> | </trong>';} 
 
$tratamiento1 = $rt11.$rt12.$rt13.$rt14.$rt15.$rt16.$rt17.$rt18.$rt19.$rt20.$rt21.$rt22.$rt23.$rt24.$rt25.$rt26.$rt27.$rt28.$rt29.$rt30.$rt31.$rt32.$rt33.$rdiagnostico1;







        $cutaneo              = $_POST['cutaneo'];        
        $acne                 = $_POST['acne'];        
        $fototico             = $_POST['fototico'];        
        $pele                 = $_POST['pele'];        
        $lesoes               = $_POST['lesoes'];        
        $est_cutaneos         = $_POST['est_cutaneos'];        
        $diagnostico2        = $_POST['diagnostico2'];        
        

if (strlen($cutaneo)> 0) {$rcutaneo = $cutaneo.'<trong> | </trong>';} 
if (strlen($acne)> 0) {$racne = $acne.'<trong> | </trong>';} 
if (strlen($fototico)> 0) {$rfototico = $fototico.'<trong> | </trong>';} 
if (strlen($pele)> 0) {$rpele = $pele.'<trong> | </trong>';} 
if (strlen($lesoes)> 0) {$rlesoes = $lesoes.'<trong> | </trong>';} 
if (strlen($est_cutaneos)> 0) {$rest_cutaneos = $est_cutaneos.'<trong> | </trong>';} 
if (strlen($diagnostico2)> 0) {$rdiagnostico2 = $diagnostico2.'<trong> | </trong>';} 

 
$tratamiento2 = $rcutaneo.$racne.$rfototico.$rpele.$rlesoes.$rest_cutaneos.$rdiagnostico2;








        $evolucion            = $_POST['evolucion'];        
        $t311                 = $_POST['t311'];        
        $t312                 = $_POST['t312'];        
        $t313                 = $_POST['t313'];        
        $t314                 = $_POST['t314'];        
        $t315                 = $_POST['t315'];        
        $t316                 = $_POST['t316'];        
        $t317                 = $_POST['t317'];        
        $t318                 = $_POST['t318'];        
        $t319                 = $_POST['t319'];        
        $t320                 = $_POST['t320'];        
        $t321                 = $_POST['t321'];        
        $t322                 = $_POST['t322'];        
        $t323                 = $_POST['t323'];        
        $diagnostico3        = $_POST['diagnostico3'];        
        


if (strlen($t311)> 0) {$rt311 = $e311.'<trong> | </trong>';}
if (strlen($t312)> 0) {$rt312 = $e312.'<trong> | </trong>';}
if (strlen($t313)> 0) {$rt313 = $e313.'<trong> | </trong>';}
if (strlen($t314)> 0) {$rt314 = $e314.'<trong> | </trong>';}
if (strlen($t315)> 0) {$rt315 = $e315.'<trong> | </trong>';}
if (strlen($t316)> 0) {$rt316 = $e316.'<trong> | </trong>';}
if (strlen($t317)> 0) {$rt317 = $e317.'<trong> | </trong>';}
if (strlen($t318)> 0) {$rt318 = $e318.'<trong> | </trong>';}
if (strlen($t319)> 0) {$rt319 = $e319.'<trong> | </trong>';}
if (strlen($t320)> 0) {$rt320 = $e320.'<trong> | </trong>';}
if (strlen($t321)> 0) {$rt321 = $e321.'<trong> | </trong>';}
if (strlen($t322)> 0) {$rt322 = $e322.'<trong> | </trong>';}
if (strlen($t323)> 0) {$rt323 = $e323.'<trong> | </trong>';}
if (strlen($diagnostico3)> 0) {$rdiagnostico3 = $diagnostico3.'<trong> | </trong>';} 



$tratamiento3 = $rt311.$rt312.$rt313.$rt314.$rt315.$rt316.$rt317.$rt318.$rt319.$rt320.$rt321.$rt322.$rt323.$rdiagnostico3;





        $t411                 = $_POST['t411'];
        $t412                 = $_POST['t412'];
        $t413                 = $_POST['t413'];
        $t414                 = $_POST['t414'];
        $t415                 = $_POST['t415'];
        $t416                 = $_POST['t416'];
        $t417                 = $_POST['t417'];
        $t418                 = $_POST['t418'];
        $t419                 = $_POST['t419'];
        $t420                 = $_POST['t420'];
        $t421                 = $_POST['t421'];
        $t422                 = $_POST['t422'];
        $t423                 = $_POST['t423'];
        $t424                 = $_POST['t424'];
        $diagnostico4        = $_POST['diagnostico4']; 



if (strlen($t411)> 0) {$rt411 = $e411.'<trong> | </trong>';}
if (strlen($t412)> 0) {$rt412 = $e412.'<trong> | </trong>';}
if (strlen($t413)> 0) {$rt413 = $e413.'<trong> | </trong>';}
if (strlen($t414)> 0) {$rt414 = $e414.'<trong> | </trong>';}
if (strlen($t415)> 0) {$rt415 = $e415.'<trong> | </trong>';}
if (strlen($t416)> 0) {$rt416 = $e416.'<trong> | </trong>';}
if (strlen($t417)> 0) {$rt417 = $e417.'<trong> | </trong>';}
if (strlen($t418)> 0) {$rt418 = $e418.'<trong> | </trong>';}
if (strlen($t419)> 0) {$rt419 = $e419.'<trong> | </trong>';}
if (strlen($t420)> 0) {$rt420 = $e420.'<trong> | </trong>';}
if (strlen($t421)> 0) {$rt421 = $e421.'<trong> | </trong>';}
if (strlen($t422)> 0) {$rt422 = $e422.'<trong> | </trong>';}
if (strlen($t423)> 0) {$rt423 = $e423.'<trong> | </trong>';}
if (strlen($t424)> 0) {$rt424 = $e424.'<trong> | </trong>';}
if (strlen($diagnostico4)> 0) {$rdiagnostico4 = $diagnostico4.'<trong> | </trong>';} 


$tratamiento4 = $rt411.$rt412.$rt413.$rt414.$rt415.$rt416.$rt417.$rt418.$rt419.$rt420.$rt421.$rt422.$rt423.$rdiagnostico4;





$tratamientoRegistro = $tratamiento1.$tratamiento2.$tratamiento3.$tratamiento4;



        $diagnostico5        = reem($_POST['diagnostico5']); 









        $peso                 = $_POST['peso'];        
        $altura               = $_POST['altura'];        
        $imc                  = $_POST['imc'];        
        $ComposicionCorporal  = $_POST['ComposicionCorporal']; 


        $procedimiento  = reem($_POST['procedimiento']); 
        $tratamiento    = reem($_POST['tratamiento']); 
        $planAtencion   = reem($_POST['planAtencion']); 
        $nota           = reem($_POST['nota']); 
        $pagoAbono      = $_POST['pagoAbono']; 

if ($pagoAbono == '') {
    $pagoAbono = 0;
}





 /*

if ($e11 <> '') {$ei11 = ' Buen estado general : '.sino($e11).'<trong> | </trong>';}

if ($e12 <> '') {$ei12 = ' Febril al tacto : '.sino($e12).'<trong> | </trong>';}

if ($e13 <> '') {$ei13 = ' Irritable  : '.sino($e13).'<trong> | </trong>';}

$estadoGeneral = $ei11.$ei12.$ei13;

*/
  
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




$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));

 

// *****************    TABLA  historiaClinica1 *****************************************
// *****************    TABLA  historiaClinica1 *********************************************************




mysqli_query($conn3,"INSERT INTO historiaClinica5 (cliente_id, usuario_id, Fecha, Hora, envejecimiento, cirugia, tratamiento, tratamientoResumen, procedimiento, planAtencion, notas, fotoAntes, fotoDurante, fotoDespues, pagoAbono, peso, altura, imc, ComposicionCorporal, diagnostico5, rSistema, motivoConsulta, CIE10) VALUE
    ('$clienteId', '$ID','$fechar', '$hora', '$envejecimiento', '$cirugia', '$tratamientoRegistro', '$tratamientoResumen', '$procedimiento', '$planAtencion', '$nota', '$fotoAntes', '$fotoDurante', '$fotoDespues', '$pagoAbono', '$peso', '$altura', '$imc', '$ComposicionCorporal', '$diagnostico5', '$rSistema', '$motivoConsulta', '$CIE10');");
 

 echo "INSERT INTO historiaClinica5 (cliente_id, usuario_id, Fecha, Hora, envejecimiento, cirugia, tratamiento, tratamientoResumen, procedimiento, planAtencion, notas, fotoAntes, fotoDurante, fotoDespues, pagoAbono, peso, altura, imc, ComposicionCorporal, diagnostico5, rSistema, motivoConsulta) VALUE
    ('$clienteId', '$ID','$fechar', '$hora', '$envejecimiento', '$cirugia', '$tratamientoRegistro', '$tratamientoResumen', '$procedimiento', '$planAtencion', '$nota', '$fotoAntes', '$fotoDurante', '$fotoDespues', '$pagoAbono', '$peso', '$altura', '$imc', '$ComposicionCorporal', '$diagnostico5', '$rSistema', '$motivoConsulta');";


/*
mysqli_query($conn3,"INSERT INTO historiaClinica1 (cliente_id, usuario_id, Fecha, Hora, motivoConsulta, diagnostico, tratamiento, notas, recipe, incapacidades, cie10, rSistema, enfermedadActual, acompananteFamiliar, telefono_acompanante, paraClinicos, remision, diagnosticoMsalud, comoTomarlo) VALUES 
  ('$clienteId', '$ID', '$fechar', '$hora', '$motivoConsulta', '$diagnostico', '$tratamiento', '$notas',  '$recipe', '$incapacidades', '$cie10', '$rSistema', '$enfermedadActual', '$acompananteFamiliar', '$telefono_acompanante', '$paraClinicos', '$remision', '$diagnosticoMsalud', '$comoTomarlo');");
// *****************    TABLA  historiaClinica1 *********************************************************
// *****************    TABLA  historiaClinica1 *********************************************************

 
/*


              $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as historiaClinica5 from historiaClinica1 where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $historiaClinica1=$rowhc['historiaClinica1'];
              }   



*/ 








$mensaje = ' Resultado de la consulta  con el Dr(a) *'.$NOMBRE_USUARIO.'*, *Procedimiento* '.$procedimiento.' *Tratamiento* '.$tratamiento.'. ***Si no desea recibir notificaciones puede darle de baja en cualquier momento respondiendo con la palabra NO. Atte DR ALBUJA CENTROS MEDICOS-MedicalSoft';
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
<td width="80%"><p>procedimiento</p>
<br />

<h3>  '.$motivoConsulta.'  </h3> 

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


  echo "<script language='Javascript'> window.location='pacientesMedicinaEstetica';</script>"; 

?>