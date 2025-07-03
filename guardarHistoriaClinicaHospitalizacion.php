<?php
   include 'funciones/funciones.php';
   include 'funciones/funcionesUtilidades.php'; 



    date_default_timezone_set('America/Bogota');

  $conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));


        $ID                     = $_POST['ID'];
        $fechar                = date("Y-m-d");;
        $clienteId             = $_POST['clienteId'];



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


        // *****************************   Variables Informacion RIPS Y (CUPS) *********************************

        
        $via_ingreso_institucion = $_POST['via_ingreso_institucion'];
        $fecha_ingreso_observacion = $_POST['fecha_ingreso_observacion'];
        if($fecha_ingreso_observacion==''){$fecha_ingreso_observacion="0000-00-00";}
        $hora_ingreso_observacion = $_POST['hora_ingreso_observacion'];
        if($hora_ingreso_observacion==''){$hora_ingreso_observacion="00:00:00";}
        $numero_autorizacion = $_POST['numero_autorizacion'];
        $causa_externa = $_POST['causa_externa'];
        $cie10_1 = $_POST['select1'];
        $cie10_2 = $_POST['select2'];
        $cie10_3 = $_POST['select3'];
        $cie10_4 = $_POST['select4'];
        $cie10_5 = $_POST['select5'];
        $cie10_6 = $_POST['select6'];

        $estado_salida_urgencias = $_POST['estado_salida_urgencias'];
        $diagnostico_muerte = $_POST['select7'];
        $fecha_salida_urgencias = $_POST['fecha_salida_urgencias'];
        if($fecha_salida_urgencias==''){$fecha_salida_urgencias="0000-00-00";}
        $hora_salida_urgencias = $_POST['hora_salida_urgencias'];
        if($hora_salida_urgencias==''){$hora_salida_urgencias="00:00:00";}


        
        $tipo_historia='3';
        


        // *****************************************    Modulo Consultas Medicas Por Urgencias**************************************** 


                                                    // tabla informacion rips//
               mysqli_query($conn3,"INSERT INTO informacion_rips (id_historia,id_cliente,id_usuario,fecha, tipo, numero_autorizacion,via_ingreso_institucion,fecha_ingreso_observacion,hora_ingreso_observacion,causa_externa,cie10_1,cie10_1_egreso,cie10_2,cie10_3,cie10_4,cie10_complicacion,estado_salida_urgencias,diagnostico_muerte,fecha_salida_urgencias,hora_salida_urgencias) 
                VALUES  
                ('0','$clienteId','$ID','$fechar',$tipo_historia,'$numero_autorizacion','$via_ingreso_institucion','$fecha_ingreso_observacion','$hora_ingreso_observacion','$causa_externa','$cie10_1','$cie10_2','$cie10_3','$cie10_4','$cie10_5','$cie10_6','$estado_salida_urgencias','$diagnostico_muerte','$fecha_salida_urgencias','$hora_salida_urgencias');");

               echo "INSERT INTO informacion_rips (id_historia,id_cliente,id_usuario,fecha, tipo, numero_autorizacion,via_ingreso_institucion,fecha_ingreso_observacion,hora_ingreso_observacion,causa_externa,cie10_1,cie10_1_egreso,cie10_2,cie10_3,cie10_4,cie10_complicacion,estado_salida_urgencias,diagnostico_muerte,fecha_salida_urgencias,hora_salida_urgencias) 
                VALUES  
                ('0','$clienteId','$ID','$fechar',$tipo_historia,'$numero_autorizacion','$via_ingreso_institucion','$fecha_ingreso_observacion','$hora_ingreso_observacion','$causa_externa','$cie10_1','$cie10_2','$cie10_3','$cie10_4','$cie10_5','$cie10_6','$estado_salida_urgencias','$diagnostico_muerte','$fecha_salida_urgencias','$hora_salida_urgencias');";

         
        // *********************************************************    *********************************************************
        // *********************************************************    *********************************************************

        $queryListhc=mysqli_query($conn3,"SELECT MAX(id) as historiaRip from informacion_rips where id_cliente= $clienteId");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $historiaRip=$rowhc['historiaRip'];
              } 


/*
$mensaje = ' Resultado de la consulta  con el Dr(a) *'.$NOMBRE_USUARIO.'*, *Diagnostico* '.$diagnostico.' *Tratamiento* '.$tratamiento.'. ***Si no desea recibir notificaciones puede darle de baja en cualquier momento respondiendo con la palabra NO. Atte DR '.$nombre.'-MedicalSoft';
Whatsapp_sent($celular_cliente, $mensaje);
*/


/*

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
 
*/


echo "<script language='Javascript'> window.location='finalizado_hospitalizacion.php?historiaRip=$historiaRip';</script>"; 

?>