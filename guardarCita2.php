<?php
date_default_timezone_set('America/Bogota');
include("funciones/conn3.php");
include("funciones/funciones.php");
        
 
        $doctor                 = $_POST['doctor'];          
           
        $fecha                  = $_POST['fecha'];                   
        $CODI_CLIENTE           = $_POST['CODI_CLIENTE'];                 
        $Fecha                  = $_POST['Fecha'];                        
        $Hora                   = $_POST['Hora'];                         
        //$nombre                 = $_POST['nombre'];                  
        $telefono               = $_POST['telefono'];               
        $correo                 = $_POST['correo'];        
        $motivoConsulta         = $_POST['motivoConsulta'];      
        $usuario_id             = $_POST['usuario_id'];    
        $estado                 = 1;
        $registrado             = date("Y-m-d H:i:s");

        $clienteId = $_POST['clienteId'];

        $nombre = funcionMaster($clienteId,'cliente_id','nombre_cliente','cliente');

        $P             = $_POST['P'];
        $duracion             = $_POST['duracion'];
        $Nuevahora = date('H:i:s',(strtotime ( '+ '.$duracion.' minute' , strtotime ($Hora) )) );

        echo $duracion;
       
if ($P == 0) {
  $ConsultaTipo = 'Presencial';
}
elseif ($P == 1) {
  $ConsultaTipo = 'Virtual';
}



  $queryList=mysqli_query($conn3,"SELECT * FROM  config where ID_Usuario=$usuario_id");
        $nrowl=mysqli_num_rows($queryList);
        while($rowMotorizado=mysqli_fetch_array($queryList))
        {


        $nombreF=$rowMotorizado['nombreF'];
        $telefonoF=$rowMotorizado['telefonoF'];
        $direccionF=$rowMotorizado['direccionF'];
        $emailF=$rowMotorizado['emailF'];

        $emailF=$rowMotorizado['emailF'];

        $whatsapp = $rowMotorizado['whatsapp'];

        $sul=$rowMotorizado['sul'];
        $sum=$rowMotorizado['sum'];
        $sue=$rowMotorizado['sue'];
        $suj=$rowMotorizado['suj'];
        $suv=$rowMotorizado['suv'];
        $sus=$rowMotorizado['sus'];
        $sud=$rowMotorizado['sud'];

           
        }


$dias = array('', 'Lunes','Martes','Miercoles','Jueves','Viernes','Sabado', 'Domingo');
$DiaSemana = $dias[date('N', strtotime($fecha))];


    if ($DiaSemana == 'Lunes') {$sucursal = $sul;}
elseif ($DiaSemana == 'Martes') {$sucursal = $sum;}
elseif ($DiaSemana == 'Miercoles') {$sucursal = $sue;}
elseif ($DiaSemana == 'Jueves') {$sucursal = $suj;}
elseif ($DiaSemana == 'Viernes') {$sucursal = $suv;}
elseif ($DiaSemana == 'Sabado') {$sucursal = $sus;}
elseif ($DiaSemana == 'Domingo') {$sucursal = $sud;}
 


         
  //      echo "2";
/*
        $chekUsuario = "SELECT * from envioEmbarcador where correo = '$correoCliente'";
        $resultChekusuario = mysql_query ($chekUsuario, $con) or die ( mysql_error());
     
        $usuarioExiste = mysql_num_rows($resultChekusuario);
         echo "3  ";
        if($usuarioExiste>0){
          echo "4  ";
            echo "<script language='Javascript'> window.location='agregarClientes.php?msg=1';
                </script>"; 
        }
        else{
 */           
      //  echo "4  ";
                

                //insetamos el usuario
                      $queryUsuario =  "insert INTO citas (doctor, fecha, Hora, nombre, telefono, correo, motivoConsulta, estado, registrado, usuario_id, tipo,idCliente,duracion,HoraF) 
                           VALUES ('$doctor' ,'$fecha' ,'$Hora' ,'$nombre' ,'$telefono' ,'$correo' ,'$motivoConsulta' ,'$estado' ,'$registrado', '$usuario_id', '$P','$clienteId','$duracion','$Nuevahora')";

mysqli_query($conn3,$queryUsuario);






   $mensajeW = 'Sr(a) *'.$nombre.'* usted ha agendado un cita con *'.$doctor.'* el día *'.$fecha.'* a las *'.$Hora.'* en'.$nombreF.' Teléfono '.$telefonoF.' Correo '.$emailF.', para confirmar esta cita solo debe de responder *SI*. Si no desea recibir notificaciones puede darle de baja en cualquier momento respondiendo con la palabra NO. Atte '.$nombreF.'. ';
$accion = 0;
Whatsapp_sent_cliente($linkkey, $telefono, $mensajeW, $cliente_id, $usuario_id, $whatsapp, $accion);             
 

 $mensaje2 = '*'.$doctor.'*  se ha agendado  una cita con la paciente *'.$nombre.'*,  *'.$fecha.'* a las *'.$Hora.'* en *'.$nombreF.'*. Motivo: *'.$motivoConsulta.'* Atte '.$nombreF.'.';
Whatsapp_sent($whatsapp, $mensaje2);




$para ="$correo, sievensoft@gmail.com";

// título
$título = 'Cita Agendada';

// mensaje
$mensaje .= '
<html>
<head>
  <title>Cita médica agendada</title>
    <table width="100%" height="466" border="0">
  <tr>
    <td><table width="100%" height="75" border="0">
      
    </table>
      <table width="100%" height="143" border="0">
        <tr>
          <td height="139" bgcolor="#00A74B"><table width="100%" height="62" border="0">
            <tr>
              <td width="5%">&nbsp;</td>
              <td width="72%" style="color:#FFF;"><h2><strong>Registro de cita con el doctor '.$doctor.'</strong></h2></td>
              <td width="23%">&nbsp;</td>
            </tr>
          </table></td>
        </tr>
      </table>
      <table width="100%" height="122" border="0">
        <tr>
          <td width="10%">&nbsp;</td>
          <td width="80%"><p>Estimado paciente:</p>
            <p>Se registro una cita médica-'.$ConsultaTipo.'<br />
              ';
                $mensaje .=  "<h1 align='center'>Fecha y hora: $fecha - $Hora </h1>";
                $mensaje .=  "<h1 align='center'>Nombre: $nombre </h1>";
                $mensaje .=  "<h1 align='center'>Teléfono: $telefono </h1>";
                $mensaje .=  "<h1 align='center'>Correo: $correo </h1>";
                $mensaje .=  "<h1 align='center'>Motivo consulta: $motivoConsulta </h1>"; 
                $mensaje .=  "<h1 align='center'>Su consulta es en:  $sucursal </h1>"; 
                $mensaje .=  "<h5 align='center'>$nombreF <br> Teléfono $telefonoF <br>Dirección  $direccionF </h5>";

                $mensaje .=  '<br></br>
          
          <td width="10%">&nbsp;</td>
        </tr>
    </table>
      <table width="100%" border="0">
        <tr>
          <td height="21" bgcolor="#00A74B">&nbsp;</td>
        </tr>
      </table>
      <table width="100%" height="64" border="0">
        <tr>
          <td height="60">Este correo electrónico no puede recibir respuestas. Para obtener más información '.$nombreF.' Teléfono '.$telefonoF.' Correo '.$emailF.'<br />
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
$cabeceras .= 'To: MedicalSoft <noreply@medicalsoftcolombia.com>' . "\r\n";
$cabeceras .= 'From: Cita médica agendada -'.$ConsultaTipo.' <noreply@medicalsoftcolombia.com>' . "\r\n";
$cabeceras .= 'Cc: noreply@medicalsoftcolombia.com' . "\r\n";
$cabeceras .= 'Bcc: noreply@medicalsoftcolombia.com' . "\r\n";

// Enviarlo
mail($para, $titulo, $mensaje, $cabeceras);








  echo "<script language='Javascript'> window.location='calendario.php';</script>"; 
                

              
                    

                                                                     
                  // echo "<script language='Javascript'> window.location='clientesAdministracion.php?msg=2';</script>"; 
   //     }

?>