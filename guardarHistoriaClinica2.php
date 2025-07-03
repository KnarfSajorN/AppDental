<?php
   //include 'header.php';
   include 'funciones/funciones.php';
   include 'funciones/funcionesUtilidades.php';
 //  include 'menu.php'; 



    date_default_timezone_set('America/Bogota');
    include("conexiones/conexion.php");
    $con=conectar();
 


  $ID                    = $_POST['ID']; 





        $registro             = $_POST['registro'];          
        $idUsuario            = $_POST['usuario_id'];          
        $idCliente            = $_POST['clienteId'];          
       
        $tratamiento          = reem($_POST['tratamiento']); 
        $descripcion          = reem($_POST['descripcion']); 

        $fechaHora            = date("Y-m-d H:i:s");

        $procedimiento        = reem($_POST['procedimiento']); 

        $planAtencion         = reem($_POST['planAtencion']);      
        $nota                 = reem($_POST['nota']); 

        $peso                 = $_POST['peso'];        
        $altura               = $_POST['altura'];        
        $imc                  = $_POST['imc'];        
        $composicionCorporal  = reem($_POST['ComposicionCorporal']); 
        
        
        $operador  = $_POST['operador']; 

        $abono                 = $_POST['abono'];   
  

 $Afecha                = $_POST['fecha'];        
        $Ahora                 = $_POST['hora'];        

$P                     = $_POST['P'];  
        $doctor                     = $_POST['doctor'];  
        $motivo                = reem($_POST['motivo']);   


 $Afechar               = date("Y-m-d H:i:s");
 $email                 = $_POST['email'];        
        $nombre                = reem($_POST['nombre']);        
        $telefono              = $_POST['telefono'];        





        $queryList=mysqli_query($conn3,"SELECT * FROM  cliente where cliente_id=$clienteId");
        $nrowl=mysqli_num_rows($queryList);
        while($rowMotorizado=mysqli_fetch_array($queryList))
        {
            $celular_cliente = $rowMotorizado['celular_cliente'];
            $email = $rowMotorizado['correo_cliente'];
        }










     if ($tratamiento == 1) 
     {
        $to1                 = $_POST['to1'];        
        $to2                 = $_POST['to2'];        
        $to3                 = $_POST['to3'];        
        $to4                 = $_POST['to4'];        
        $to5                 = $_POST['to5'];        
        $to6                 = $_POST['to6'];        
        $to7                 = $_POST['to7'];        
        $to8                 = $_POST['to8'];        
        $to9                 = $_POST['to9'];        
        $to10                = $_POST['to10'];        
        $to11                = $_POST['to11'];        
  
        if ($to1 <> '') {$s1 = ''.$to1.'<br>';}
        if ($to2 <> '') {$s2 = ' Busto: '.$to2.'<br>';}
        if ($to3 <> '') {$s3 = ' Abdomen Alto: '.$to3.'<br>';}
        if ($to4 <> '') {$s4 = ' Cintura: '.$to4.'<br>';}
        if ($to5 <> '') {$s5 = ' Cadera : '.$to5.'<br>';}
        if ($to6 <> '') {$s6 = ' Pierna Derecha : '.$to6.'<br>';}
        if ($to7 <> '') {$s7 = ' Pierna Izquierda: '.$to7.'<br>';}
        if ($to8 <> '') {$s8 = ' Brazo Derecho: '.$to8.'<br>';}
        if ($to9 <> '') {$s9 = ' Brazo Izquierdo: '.$to9.'<br>';}
        if ($to10 <> '') {$s10 = ' Peso: '.$to10.'<br>';}
        if ($to11 <> '') {$s11 = ' Record de sesiones FACIAL : : '.$to11;}
     
        $descripcion = $s1.$s2.$s3.$s4.$s5.$s6.$s7.$s8.$s9.$s10.$s11;  
      }


  

     if ($tratamiento == 2) 
     {
        $to1                 = $_POST['to1'];        
        $to2                 = $_POST['to2'];        
        $to3                 = $_POST['to3'];        
        $to4                 = $_POST['to4'];        
        $to5                 = $_POST['to5'];        
        $to6                 = $_POST['to6'];        
        $to7                 = $_POST['to7'];        
        $to8                 = $_POST['to8'];        
        $to9                 = $_POST['to9'];        
        $to10                = $_POST['to10'];        
        $to11                = $_POST['to11'];        
        $to12                = $_POST['to12'];        
        $to13                = $_POST['to13'];        
        $to14                = $_POST['to14'];        
        $to15                = $_POST['to15'];        
        $to16                = $_POST['to16'];        
        $to17                = $_POST['to17'];        
        $to18                = $_POST['to18'];        
        $to19                = $_POST['to19'];        
        $to20                = $_POST['to20'];        
        $to21                = $_POST['to21'];        
        $to22                = $_POST['to22'];        
        $to23                = $_POST['to23'];        
        $to24                = $_POST['to24'];        
        $to25                = $_POST['to25'];        
        $to26                = $_POST['to26'];        
        $to27                = $_POST['to27'];        
        $to28                = $_POST['to28'];        
        $to29                = $_POST['to29'];        
        $to30                = $_POST['to30'];        
        $to31                = $_POST['to31'];        
        $to32                = $_POST['to32'];        
        $to33                = $_POST['to33'];        
        $to34                = $_POST['to34'];        
        $to35                = $_POST['to35'];        
        $to36                = $_POST['to36'];        
        $to37                = $_POST['to37'];        
        $to38                = $_POST['to38'];        
        $to39                = $_POST['to39'];        
        $to40                = $_POST['to40'];        
        $to41                = $_POST['to41'];        
        $to42                = $_POST['to42'];        
        $to43                = $_POST['to43'];        
  
        if ($to1 <> '') {$s1 = 'Delineado parpado superior   |';}
        if ($to2 <> '') {$s2 = 'Delineado parpado inferior |';}
        if ($to3 <> '') {$s3 = 'Cejas   | ';}
        if ($to4 <> '') {$s4 = 'Delineado de labios  | ';}
        if ($to5 <> '') {$s5 = 'Rellono de labios | ';}
        if ($to6 <> '') {$s6 = 'Camuflaje de cicatriz | ';}
        if ($to7 <> '') {$s7 = ' Retoque | ';}
        if ($to8 <> '') {$s8 = 'Corrección | ';}
        if ($to9 <> '') {$s9 = 'Larga  | ';}
        if ($to10 <> '') {$s10 = 'Redonda | ';}
        if ($to11 <> '') {$s11 = 'Cuadrada |';}
        if ($to12 <> '') {$s12 = 'Ovalada | ';}
        if ($to13 <> '') {$s13 = 'Diamante | ';}
        if ($to14 <> '') {$s14 = 'rasgados | ';}
        if ($to15 <> '') {$s15 = 'Grandes | ';}
        if ($to16 <> '') {$s16 = 'Redondos | ';}
        if ($to17 <> '') {$s17 = 'Normales | ';}
        if ($to18 <> '') {$s18 = ' Ovales  | ';}
        if ($to19 <> '') {$s19 = '  Caidos | ';}
        if ($to2 <> '') {$s20 = ' Gruesos  | ';}
        if ($to2 <> '') {$s21 = ' Pequeños  | ';}
        if ($to2 <> '') {$s22 = ' Puntiagudos  | ';}
        if ($to2 <> '') {$s23 = ' Normales  | ';}
        if ($to2 <> '') {$s24 = 'Cicatriz Queloide | ';}
        if ($to2 <> '') {$s25 = 'Diabetes   | ';}
        if ($to2 <> '') {$s26 = ' Hepilepsia  | ';}
        if ($to2 <> '') {$s27 = ' Herpes  | ';}
        if ($to2 <> '') {$s28 = ' Cancer  | ';}
        if ($to2 <> '') {$s29 = ' Enfermedades Cardiacas   | ';}
        if ($to3 <> '') {$s30 = ' Alergias  | ';}
        if ($to3 <> '') {$s31 = ' Usa Esteroides   | ';}
        if ($to3 <> '') {$s32 = ' Anticuagulantes  | ';}
        if ($to3 <> '') {$s33 = ' Embarazo  | ';}
        if ($to3 <> '') {$s34 = '  Usa Lentes | ';}
        if ($to3 <> '') {$s35 = 'Usa Acutane   | ';}
        if ($to3 <> '') {$s36 = ' Usa Retina   | ';}
        if ($to3 <> '') {$s37 = ' Enfermedades Atoinmune   | ';}
        if ($to3 <> '') {$s38 = 'Esta en algun Tratamiento    | ';}
        if ($to3 <> '') {$s39 = 'Cual ? '.$to3.' | ';}
        if ($to4 <> '') {$s40 = ' T/A  | ';}
        if ($to4 <> '') {$s41 = ' F/C  | ';}
        if ($to4 <> '') {$s42 = ' F/R  | ';}
        if ($to4 <> '') {$s43 = ' T    ';}
    
$descripcion = 'MOTIVO DE LA CONSULTA: '.$s1.$s2.$s3.$s4.$s5.$s6.$s7.$s8.'<br> ANALISIS FACIAL : <br>Forma de la cara '.$s9.$s10.$s11.$s12.$s13.'<br>Forma de los Ojos <br>'.$s14.$s15.$s16.$s17.'<br>Forma de Labios '.$s18.$s19.$s20.$s21.$s22.$s23.'<br>ANTECEDENTES: '.$s24.$s25.$s26.$s27.$s28.$s29.$s30.$s31.$s32.$s33.$s34.$s35.$s36.$s37.$s38.$s39.'EXAMEN FISICO '.$s40.$s41.$s42.$s43;  
      }
 
if ($tratamiento == 3) 
     {
        $to1                 = $_POST['to1'];        
        $to2                 = $_POST['to2'];        
        $to3                 = $_POST['to3'];        
        $to4                 = $_POST['to4'];        
        $to5                 = $_POST['to5'];        
        $to6                 = $_POST['to6'];        
        $to7                 = $_POST['to7'];        
        $to8                 = $_POST['to8'];        
        $to9                 = $_POST['to9'];        
        $to10                = $_POST['to10'];        
        $to11                = $_POST['to11']; 
        $to12                = $_POST['to12']; 
        $to13                = $_POST['to13']; 
        $to14                = $_POST['to14']; 
        $to15                = $_POST['to15']; 
        $to16                = $_POST['to16']; 
        $to17                = $_POST['to17']; 
        $to18                = $_POST['to18']; 
        $to19                = $_POST['to19']; 
        $to20                = $_POST['to20']; 
        $to21                 = $_POST['to21'];        
        $to22                 = $_POST['to22'];        
         
  
        if ($to1 <> '') {$s1 = 'Completa |';}
        if ($to2 <> '') {$s2 = ' Bikini |';}
        if ($to3 <> '') {$s3 = ' Axilas | ';}
        if ($to4 <> '') {$s4 = 'P/C | ';}
        if ($to5 <> '') {$s5 = 'M/P |';}
        if ($to6 <> '') {$s6 = 'Rejuvenecimiento de la piel |';}
        if ($to7 <> '') {$s7 = 'Pigmentación |';}
        if ($to8 <> '') {$s8 = 'Terapia de Acne |';}
        if ($to9 <> '') {$s9 = 'Terapia Vacular | ';}
        if ($to14 <> '') {$s14 = 'Esta Tomando antibioticos '.sino($to14).' | ';}
        if ($to15 <> '') {$s15 = 'Toma vitaminas A-B  '.sino($to15).' | ';}
        if ($to16 <> '') {$s16 = 'Toma Robacutam '.sino($to16).' | ';}
        if ($to17 <> '') {$s17 = 'Toma Aminoglucosos '.sino($to17).' | ';}
        if ($to18 <> '') {$s18 = 'Fuma  '.sino($to18).' | ';}
        if ($to19 <> '') {$s19 = 'Tiene piel bronceada '.sino($to19).' | ';}
        if ($to20 <> '') {$s20 = 'Cera | ';}
        if ($to21 <> '') {$s21 = 'Cuchilla | ';}
        if ($to22 <> '') {$s22 = 'Cremas | ';}
     
        $descripcion = 'Depilacion: '.$s1.$s2.$s3.$s4.$s5.$s6.$s7.$s8.$s9.' <br> Tipo de Piel  '.$to10.'<br> Tipo de Vello '.$to11.' Densidad  '.$to12.' Color: '.$to12. 'INFORMACIÓN  PERSONAL '.$s14.$s15.$s16.$s17.$s18.$s19.' Clase de Depilación '.$s20.$s21.$s22;  
      }


  if ($peso == '') {$peso = 0;}
  if ($altura == '') {$altura = 0;}
  if ($imc == '') {$imc = 0;}
  if ($abono == '') {$abono = 0;}
 



$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));

// *********************************************************    TABLA  historiaClinica1 *********************************************************
// *********************************************************    TABLA  historiaClinica1 *********************************************************
mysqli_query($conn3,"INSERT INTO e_tratamiento (idUsuario, tratamiento, operador, descripcion, fechaHora, idCliente, procedimiento, planAtencion, abono, nota, peso, altura, imc, composicionCorporal) VALUES ('$idUsuario', '$tratamiento', '$operador', '$descripcion', '$fechaHora', '$idCliente', '$procedimiento', '$planAtencion ', '$abono', '$nota', '$peso', '$altura', '$imc', '$composicionCorporal');");


echo "INSERT INTO e_tratamiento (idUsuario, tratamiento, operador, descripcion, fechaHora, idCliente, procedimiento, planAtencion, abono, nota, peso, altura, imc, composicionCorporal) VALUES ('$idUsuario', '$tratamiento', '$operador', '$descripcion', '$fechaHora', '$idCliente', '$procedimiento', '$planAtencion ', '$abono', '$nota', '$peso', '$altura', '$imc', '$composicionCorporal');";




              $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as historiaClinica1 from e_tratamiento where idCliente= $idCliente");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $historiaClinica1=$rowhc['historiaClinica1'];
              }   











// *********************************************************    TABLA  historiaClinica1 *********************************************************
// *********************************************************    TABLA  historiaClinica1 *********************************************************

//      $abono
 





                $para ="$email";

                // título
                $título = 'Resultado de la consulta';

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
<td width="80%"><p>Tratamiento </p>
<br />

<h3>  '.$descripcion.'  </h3> 

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
                $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
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

$mensaje = ' Sr(a) *'.$nombre.'* usted a agendado un cita  con *'.$doctor.'* el dia *'.$fecha.'* a las *'.$Hora.'* en *'.$sucursal.'*. Si no desea recibir notificaciones puede darle de baja en cualquier momento respondiendo con la palabra NO. Atte DR ALBUJA CENTROS MEDICOS-MedicalSoft';
Whatsapp_sent($telefono, $mensaje);


$mensaje2 = ' *'.$doctor.'*  se a agendado  una cita con la paciente *'.$nombre.'*,  *'.$fecha.'* a las *'.$Hora.'* en *'.$sucursal.'*. Motivo: *'.$motivoConsulta.'* Atte DR ALBUJA CENTROS MEDICOS MedicalSoft';
Whatsapp_sent($whatsapp, $mensaje2);








    mysqli_query($conn3,"INSERT INTO citas (doctor, fecha, Hora, nombre, telefono, correo, motivoConsulta, estado, registrado, usuario_id , tipo) 
                VALUES ('$doctor', '$Afecha', '$Ahora', '$nombre', '$telefono', '$email', '$motivo', '1', '$Afechar', '$ID', '0')");
                 


echo "INSERT INTO citas (doctor, fecha, Hora, nombre, telefono, correo, motivoConsulta, estado, registrado, usuario_id , tipo) 
                VALUES ('$doctor', '$Afecha', '$Ahora', '$nombre', '$telefono', '$email', '$motivo', '1', '$Afechar', '$ID', '0')";

 
                $para ="$email";

                // título
                $título = 'Cita Agendada';

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
                $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
                $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

                // Cabeceras adicionales
                $cabeceras .= 'To: '.$NOMBRE_USUARIO.' <noreply@medicalsoftcolombia.com>' . "\r\n";
                $cabeceras .= 'From: Resultado de su Cita <noreply@medicalsoftcolombia.com>' . "\r\n";
                $cabeceras .= 'Cc: noreply@medicalsoftcolombia.com' . "\r\n";
                $cabeceras .= 'Bcc: noreply@medicalsoftcolombia.com' . "\r\n";

                // Enviarlo
                mail($para, $título, $mensaje, $cabeceras);

}



    echo "<script language='Javascript'> window.location='finalizadoTratamiento.php?historiaClinica1=$historiaClinica1';</script>"; 

?>
