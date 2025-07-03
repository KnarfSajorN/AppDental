<?php
   //include 'header.php';
   include 'funciones/funciones.php';
   include 'funciones/funcionesUtilidades.php';
 //  include 'menu.php'; 



    date_default_timezone_set('America/Bogota');
    include("conexiones/conexion.php");
    $con=conectar();



    $ID                    = $_POST['ID'];

       
        $fechar                = date("Y-m-d");
       
        $hora                  = date("H:i:s");
     $clienteId             = $_POST['clienteId'];


            $queryList=mysqli_query($conn3,"SELECT * FROM  cliente where cliente_id = $clienteId");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {

              $nombre_cliente             =$rowMotorizado['nombre_cliente'];
              $CODI_CLIENTE               =$rowMotorizado['CODI_CLIENTE'];
              $fechaNacimiento            =$rowMotorizado['fechaNacimiento'];
            
        $nombre_cliente1=$rowMotorizado['nombre_cliente1'];
        $apellido_mat=$rowMotorizado['apell_mat'];
        $apellido_pat=$rowMotorizado['apell_pat'];
        $celular_cliente=$rowMotorizado['celular_cliente'];
        $genero=$rowMotorizado['genero'];
        $tiposSangre      =$rowMotorizado['tiposSangre'];
       
                
            }

         $EDAD = calculaedad($fechaNacimiento);

        //eNCABEZADO
           $INSTITUCION       = reem($_POST['INSTITUCION']);
           $ORDEN  = reem($_POST['ORDEN']);
           $HISTORIA = reem($_POST['HISTORIA']);
           $PARROQUIA      = reem($_POST['PARROQUIA']);
           $CANTON  = reem($_POST['CANTON']);
           $PROVINCIA = reem($_POST['PROVINCIA']);
           $SERVICIO     = reem($_POST['SERVICIO']);
           $SALA  = reem($_POST['SALA']);
           $CAMA = reem($_POST['CAMA']);
           $PRIORIDAD = reem($_POST['PRIORIDAD']);
           $FTOMA  = reem($_POST['FTOMA']);



           
      /*       $V1= '<table class="table table-bordered" border="1" cellspacing="0"  width="100%"><tr><td><h6>INSTITUCION DEL SISTEMA<br>'.$INSTITUCION.'</h6></td>';
             $V2= '<td><h6>UNIDAD OPERATIVA'.$logo.'</h6></td>';
             $V3= '<td><h6>ORDEN<br>'.$ORDEN.'</h6></td>';
             $V4= '<td><h6>PARROQUIA<br>'.$PARROQUIA.'</h6></td><td><h6>CANTÓN<br>'.$CANTON.'</h6></td> <td><h6>PROVINCIA<br>'.$PROVINCIA.'</h6></td>';
             $V5= '<td><h6>HISTORIA CLINICA<BR>'.$HISTORIA.'</h6></td></tr></table>'; */

             $V6= '<table class="table table-bordered" border="1" cellspacing="0"  width="100%"><tr><td><h6>APELLIDO PATERNO<br>'.$apellido_pat.'</h6></td>';
             $V7= '<td><h6>APELLIDO MATERNO<BR>'.$apellido_mat.'</h6></td>';
             $V8= '<td><h6>PRIMER NOMBRE<br>'.$nombre_cliente.'</h6></td>';
             $V9= '<td><h6>SEGUNDO NOMBRE<br>'.$nombre_cliente1.'</h6></td>';
             $V10= '<td><h6>EDAD<BR>'.$EDAD.'</h6></td>';
             $V11= '<td><h6>CÈDULA DE IDENTIDAD<BR>'.$CODI_CLIENTE.'</h6></td></tr></table>';

          /*     $V12= '<table class="table table-bordered" border="1" cellspacing="0"  width="100%"><tr><td><h6>SERVICIO QUE SOLICITA<br>'.$SERVICIO.'</h6></td>';
             $V13= '<td><h6>SALA<br>'.$SALA.'</h6></td>';
             $V14= '<td><h6>CAMA<br>'.$CAMA.'</h6></td>';
             $V15= '<td><h6>PRIORIDAD<br>'.$PRIORIDAD.'</h6></td>';
             $V16= '<td><h6>FECHA DE TOMA<BR>'.$FTOMA.'</h6></td></tr></table>'; */


$datos=$V1.$V2.$V3.$V4.$V5.$V6.$V7.$V8.$V9.$V10.$V11.$V12.$V13.$V14.$V15.$V16;


/////////////Estudio solicitado
        $anteCt1                 = $_POST['anteCt1'];
        $anteCt2                 = $_POST['anteCt2'];
        $anteCt3                 = $_POST['anteCt3'];
        $anteCt4                 = $_POST['anteCt4'];
        $anteCt5                 = $_POST['anteCt5'];
        $anteCt6                 = $_POST['anteCt6'];
        $estudio                 = $_POST['estudio'];
        $anteCt7                = $_POST['anteCt7'];
        $anteCt8                 = $_POST['anteCt8'];
        $anteCt9                = $_POST['anteCt9'];
        $anteCt10                 = $_POST['anteCt10'];
        $anteCt11                 = $_POST['anteCt11'];
        $motivosolicitud        = $_POST['motivosolicitud'];
        $resumenclinico    = $_POST['resumenclinico'];

        $diagnostico1     = $_POST['diagnostico1'];
        $cie10D1     = $_POST['cie10D1'];
        $pre1     = $_POST['pre1'];

        $diagnostico2     = $_POST['diagnostico2'];
        $cie10D2     = $_POST['cie10D2'];
        $pre2     = $_POST['pre2'];
 
         $diagnostico3     = $_POST['diagnostico3'];
        $cie10D3     = $_POST['cie10D3'];
        $pre3     = $_POST['pre3'];



 ////////////////UROANALISIS

 $T1= '<table class="table table-bordered" border="1" cellspacing="0"  width="100%"> <tr><td><h6>'.$diagnostico1.'</h6></td><td><h6>'. $cie10D1.'</h6></td><td><h6>'.$pre1.'</h6></td></tr></h6>
  <tr><td><h6>'.$diagnostico2.'</h6></td><td><h6>'.$cie10D2.'</h6></td><td><h6>'.$pre2.'</h6></td></tr></h6>
  <tr><td><h6>'.$diagnostico3.'</h6></td><td><h6>'.$cie10D3.'</h6></td><td><h6>'.$pre3.'</h6></td></tr></h6>
 </table>';





      $I1= '<table class="table table-bordered" border="1" cellspacing="0"  width="100%"  style="background: #A4A4A4"><tr><td><h5><b>1. ESTUDIO SOLICITADO</b> </h5></td> </tr></table>';
$I2= '<table class="table table-bordered" border="1" cellspacing="0"  width="100%"> <tr><td><h6>RX CONVENCIONAL'.$anteCt1.'</h6></td><td><h6>TOMOGRAFIA'. $anteCt2.'</h6></td><td><h6>RESONANCIA'.$anteCt3.'</h6></td><td><h6>ECOGRAFÍA'.$anteCt4.'</h6></td><td><h6>PROCEDIMIENTO'.$anteCt5.'</h6></td><td><h6>OTROS'.$anteCt6.'</h6></td></tr></h6></table>';
 $I3= '<table class="table table-bordered" border="1" cellspacing="0"  width="100%"> <tr><td><h5> DESCRIPCION </h5><br><h6>'.$estudio.' </h6></td> </tr></table>';
$I4= '<table class="table table-bordered" border="1" cellspacing="0"  width="100%"> <tr><td><h6>PUEDE MOVILIZARSE'.$anteCt7.'</h6></td><td><h6>PUEDE RETIRARSE VENDAS, APOSITOS O YESOS'.$anteCt8.'</h6></td><td><h6>EL MEDICO ESTARA PRESENTE EN EL EXAMEN'.$anteCt9.'</h6></td><td><h6>TOMA DE RADIOLOGIA EN LA CAMA'. $anteCt10.'</h6></td></tr></h6></table>';

      $I5= '<table class="table table-bordered" border="1" cellspacing="0"  width="100%"><tr><td  style="background: #A4A4A4"><h5><b>2 MOTIVO DE LA SOLICITUD</b> </h5></td> </tr><tr><td><h6>'.$motivosolicitud.'</h6></td></tr></table>';

$I6= '<table class="table table-bordered" border="1" cellspacing="0"  width="100%"><tr><td><h5   style="background: #A4A4A4"><b>3. RESUMEN CLINICO</b></h5> <br> <h6>'.$resumenclinico.'</h6></td><td><h5 style="background: #A4A4A4"><b>4. DIAGNOSTICO</b></h5><h6>'.$T1.'</h6></td></tr></table>'; 


$imagen=$I1.$I2.$I3.$I4.$I5.$I6;
     



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

 


       mysqli_query($conn3,"INSERT INTO imagenologia(cliente_id, usuario_id, Fecha, Hora,  datos, laboratorio) VALUES  ('$clienteId', '$ID', '$fechar', '$hora',  '$datos', '$imagen')");


echo "INSERT INTO imagenologia(cliente_id, usuario_id, Fecha, Hora,  datos, laboratorio) VALUES  ('$clienteId', '$ID', '$fechar', '$hora',  '$datos', '$imagen');";


       
              $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as historiaClinica1 from imagenologia where cliente_id= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $historiaClinica1=$rowhc['historiaClinica1'];
              }   

 
foreach ($codigo1 as $e) 
    {
/*
 for ($i=1; $i<$ foreach ($numeros as $e) 
    {; $i++) 
 { 
  */      //
     
     $codigocie10 = $e;   
    
        mysqli_query($conn3,"INSERT INTO historiaClinica9_Quirurgico_Cie10 (cliente_id,usuario_id,historiaClinica9_id,Fecha,Hora,codigo) VALUES ('$clienteId', '$ID', '$historiaClinica1','$fechar','$hora','$codigocie10')");   



    }

 echo "INSERT INTO historiaClinica9_Quirurgico_Cie10 (cliente_id,usuario_id,historiaClinica9_id,Fecha,Hora,codigo) VALUES ('$clienteId', '$ID', '$historiaClinica1','$fechar','$hora','$codigocie10')";   


   


/*

 for ($i=1; $i<$contador; $i++) 
 { 
        //
        mysqli_query($conn3,"INSERT INTO historiaClinica9_Quirurgico_Cie10 (cliente_id,usuario_id,historiaClinica9_id,Fecha,Hora,codigo) VALUES ('$clienteId', '$ID', '$historiaClinica1','$Fecha','$Hora','$codigo1[$i]')");   }

 echo "INSERT INTO historiaClinica9_Quirurgico_Cie10 (cliente_id,usuario_id,historiaClinica9_id,Fecha,Hora,codigo) VALUES ('$clienteId', '$ID', '$historiaClinica1','$Fecha','$Hora','$codigo1[$i]')";   
   */


            // *********************************************************    TABLA  examenFisico *********************************************************
            // *********************************************************    TABLA  examenFisico *********************************************************
        



$mensaje = ' Resultado de la consulta  con el Dr(a) *'.$NOMBRE_USUARIO.'*, *Diagnostico* '.$diagnostico.' *Tratamiento* '.$tratamiento.'. ***Si no desea recibir notificaciones puede darle de baja en cualquier momento respondiendo con la palabra NO. Atte DR ALBUJA CENTROS MEDICOS-MedicalSoft';
Whatsapp_sent($celular_cliente, $mensaje);


 

 
    for ($i=0;$i<count($prestaciones1);$i++) 
        { 
     echo ' | '.$i;     
          $ldp1 = $ID.'pos';
          $codigo1 = $prestaciones1[$i];

                 $queryListhc=mysqli_query($conn3,"SELECT * from  $ldp1  where codigo = $codigo1");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $denominacion=$rowhc['denominacion'];
                $valor=$rowhc['valor'];
              }   


          mysqli_query($conn3,"INSERT INTO historiaClinica1_pos 
            (cliente_id, usuario_id, historiaClinica1_id, Fecha, Hora, codigo) VALUES 
            ('$clienteId', '$ID', '$historiaClinica1', '$fechar', '$hora', '$codigo1');");
    
 echo "<br>FIN DE 1<br>"; 

        } 


         for ($i2=0;$i2<count($prestaciones2);$i2++) 
        { 

echo '<br><br><br><br><br><br>'.$i2;
          
          $ldp2 = $ID.'cups';
          $codigo2 = $prestaciones2[$i];



  $queryList2=mysqli_query($conn3,"SELECT * from  $ldp2  where codigo = $codigo2");
              $nrowl=mysqli_num_rows($queryList2);
              while($row_recordset322=mysqli_fetch_array($queryList2))
              {
              $codigo      = $row_recordset322['codigo'];
              $descripcion      = $row_recordset322['descripcion'];
              }   


          mysqli_query($conn3,"INSERT INTO historiaClinica1_cups  
            (cliente_id, usuario_id, historiaClinica1_id, Fecha, Hora, codigo) VALUES 
            ('$clienteId', '$ID', '$historiaClinica1', '$fechar', '$hora', '$codigo2');");



 /*   
 echo "<br>INSERT INTO historiaClinica1_ldp2 
            (cliente_id, usuario_id, historiaClinica1_id, Fecha, Hora, codigo, pab, denominacion, hpc, hsc, htc, hcc, han) VALUES 
            ('$clienteId', '$ID', '$historiaClinica1', '$fechar', '$hora', '$codigo2', '$pab', '$denominacion', '$hpc', '$hsc', '$htc', '$hcc', '$han');<br>";
            */
        } 
 
 



/*


echo "<h1>  ----->>>>>>> SELECT MAX(ID) as historiaClinica1 from historiaClinica1 where usuario_id= $clienteId  $historiaClinica1 <<<<<<<<<<<<<<<<<<<<<<<<<<<<<< </h1>";
                  $nrowl=mysqli_num_rows($queryList);
                  while($rowMotorizado=mysqli_fetch_array($queryList))
                  {
                    $usuario_id=$rowMotorizado['usuario_id'];
mysqli_query($conn3,"SELECT * FROM  cliente where cliente_id=$clienteId");
    $queryUsuario = "INSERT INTO historiaClinica1 (cliente_id, usuario_id, Fecha, Hora, motivoConsulta, diagnostico, tratamiento, notas, recipe, incapacidades) VALUES ('$clienteId', '$ID', '$fechar', '$hora', '$motivoConsulta', '$diagnostico', '$tratamiento', '$notas',  '$recipe', '$incapacidades');";
    mysql_query($queryUsuario,$con) or die(mysql_error());
 
*/

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
                $cabeceras .= 'To: '.$NOMBRE_USUARIO.' <noreply@'.$_SERVER["HTTP_HOST"].'>' . "\r\n";
                $cabeceras .= 'From: Resultado de la consulta <noreply@'.$_SERVER["HTTP_HOST"].'>' . "\r\n";
                $cabeceras .= 'Cc: noreply@'.$_SERVER["HTTP_HOST"].'' . "\r\n";
                $cabeceras .= 'Bcc: noreply@'.$_SERVER["HTTP_HOST"].'' . "\r\n";

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
                $cabeceras .= 'To: '.$NOMBRE_USUARIO.' <noreply@'.$_SERVER["HTTP_HOST"].'>' . "\r\n";
                $cabeceras .= 'From: Resultado de su Cita <noreply@'.$_SERVER["HTTP_HOST"].'>' . "\r\n";
                $cabeceras .= 'Cc: noreply@'.$_SERVER["HTTP_HOST"].'' . "\r\n";
                $cabeceras .= 'Bcc: noreply@'.$_SERVER["HTTP_HOST"].'' . "\r\n";

                // Enviarlo
                mail($para, $título, $mensaje, $cabeceras);

}


echo "<script language='Javascript'> window.location='imprimirImagenologia.php?historiaClinica1=$historiaClinica1';</script>"; 

?>