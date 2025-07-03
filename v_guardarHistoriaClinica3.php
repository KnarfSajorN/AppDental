<?php
   //include 'header.php';
   include 'funciones/funciones.php';
   include 'funciones/funcionesUtilidades.php';
   //  include 'menu.php'; 

    date_default_timezone_set('America/Bogota');
    include("conexiones/conexion.php");
    $con=conectar();
 

  $ID                    = $_POST['ID']; 




  
        $usuario_id            = $_POST['usuario_id'];          
        $cliente_id            = $_POST['clienteId'];          
        $vacuna               = $_POST['vacuna'];          
        
                
        $programar            = $_POST['programar'];          
       
       
        $fechaHora            = date("Y-m-d H:i:s");

       
        $nota                 = reem($_POST['nota']); 

       
   $Afechar               = date("Y-m-d H:i:s");

 $email                 = $_POST['email'];        
        $nombre                = reem($_POST['nombre']);        
        $telefono              = $_POST['telefono'];        




        $queryList=mysqli_query($conn3,"SELECT * FROM  v_cliente where id = $cliente_id");
        $nrowl=mysqli_num_rows($queryList);
        while($rowMotorizado=mysqli_fetch_array($queryList))
        {
            $nombre_cliente = $rowMotorizado['nombre_cliente'];
            $correo_cliente = $rowMotorizado['correo_cliente'];
            $empresa = $rowMotorizado['empresa'];
            $whatsapp = $rowMotorizado['whatsapp'];
        }

        if ($empresa > 0) {
            

                $queryList2=mysqli_query($conn3,"SELECT * FROM  v_clienteE where id = $empresa");
                $nrowl=mysqli_num_rows($queryList2);
                while($row2 =mysqli_fetch_array($queryList2))
                {
                    $nombreEmpresa = $row2['nombre'];
                    $precio = $row2['precio'];
                    $correoEmpresa = $row2['correo'];
                    
                }
         

        }
    
        $queryList=mysqli_query($conn3,"SELECT * FROM  v_cliente where id = $cliente_id");
        $nrowl=mysqli_num_rows($queryList);
        while($rowMotorizado=mysqli_fetch_array($queryList))
        {
            $nombre_cliente = $rowMotorizado['nombre_cliente'];
            $correo_cliente = $rowMotorizado['correo_cliente'];
            $empresa = $rowMotorizado['empresa'];
            $whatsapp = $rowMotorizado['whatsapp'];
            
        }
  


        $queryinv=mysqli_query($conn3,"SELECT * FROM  v_servicios where usuario_id = '$usuario_id'  and id = $vacuna");

        $nrowl=mysqli_num_rows($queryinv);
        while($rowinv=mysqli_fetch_array($queryinv))
        {

        $nombre       = $rowinv['nombre'];
        $descripcion  = $rowinv['descripcion'];
        $periodo      = $rowinv['periodo']; 
        $edadMinima   = $rowinv['edadMinima']; 
        $edadMaximo   = $rowinv['edadMaximo']; 
        $cuantas      = $rowinv['cuantas']; 
        $siglas       = $rowinv['siglas']; 
        $p1       = $rowinv['p1']; 
        $p2       = $rowinv['p2']; 
        $p3       = $rowinv['p3']; 
        $p4       = $rowinv['p4']; 
        $p5       = $rowinv['p5']; 
        $p6       = $rowinv['p6']; 

        }

switch ($precio) {
    case '1':
        $precioAsignado = $p1;
        break;
    case '2':
        $precioAsignado = $p2;
        break;
    case '3':
        $precioAsignado = $p3;
        break;
    case '4':
        $precioAsignado = $p4;
        break;
    case '5':
        $precioAsignado = $p5;
        break;
    case '6':
        $precioAsignado = $p6;
        break;
    
    default:
        $precioAsignado = 0;
        break;
}



$fecha = date("Y-m-d");
$hora  = date("h:m:s");


$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));

// *********************************************************    TABLA  historiaClinica1 *********************************************************
// *********************************************************    TABLA  historiaClinica1 *********************************************************
mysqli_query($conn3,"INSERT INTO v_historiaClinica3 (usuario_id, cliente_id, fecha, hora, vacuna_id, aplicada, factura_id, clienteE_id, nota, precio) VALUES 
                                               ('$usuario_id', '$cliente_id', '$fecha', '$hora', '$vacuna', '1', '0', '$empresa', '$nota', '$precioAsignado');");



        $queryListhc=mysqli_query($conn3,"SELECT MAX(id) as historiaClinica3 from v_historiaClinica3 where cliente_id= $cliente_id");
        $nrowl=mysqli_num_rows($queryListhc);
        while($rowhc=mysqli_fetch_array($queryListhc))
        {
            $historiaClinica3=$rowhc['historiaClinica3'];
        }




if ($programar == 1) {

    $motivo = 'Aplicacion de '.$nombre.' '.$siglas;

    
    for ($i=0; $i < $cuantas ; $i++) 
    { 
$periodo = $periodo*$cuantas;

$fechaAplicacion = date("Y-m-d", strtotime($fechaDemo."+ $periodo days"));


 
mysqli_query($conn3,"INSERT INTO v_historiaClinica3 (usuario_id, cliente_id, fecha, hora, vacuna_id, aplicada, factura_id, clienteE_id, nota, precio) VALUES 
                                               ('$usuario_id', '$cliente_id', '$fechaAplicacion', '$hora', '$vacuna', '0', '0', '$empresa', '$nota', '$precioAsignado');");
mysqli_query($conn3,"INSERT INTO citas (doctor, fecha, Hora, nombre, telefono, correo, motivoConsulta, estado, registrado, usuario_id , tipo) 
                VALUES ('$usuario_id', '$fechaAplicacion', '$hora', '$nombre_cliente', '$whatsapp', '$correo_cliente', '$motivo', '1', '$fecha', '$usuario_id', '0')");
    
    
    }

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


$mensaje2 = ' Dr(a) *'.$doctor.'*  se a agendado  una cita con la paciente *'.$nombre.'*,  *'.$fecha.'* a las *'.$Hora.'* en *'.$sucursal.'*. Motivo: *'.$motivoConsulta.'* Atte DR ALBUJA CENTROS MEDICOS MedicalSoft';
Whatsapp_sent($whatsapp, $mensaje2);








    mysqli_query($conn3,"INSERT INTO citas (doctor, fecha, Hora, nombre, telefono, correo, motivoConsulta, estado, registrado, usuario_id , tipo) 
                VALUES ('$doctor', '$Afecha', '$Ahora', '$nombre', '$telefono', '$email', '$motivo', '1', '$Afechar', '$ID', '0')");
                 





 
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


    echo "<script language='Javascript'> window.location='v_finalizadoTratamiento3.php?historiaClinica3=$historiaClinica3';</script>"; 

?>
