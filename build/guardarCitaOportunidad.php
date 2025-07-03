<?php
date_default_timezone_set('America/Bogota');
include("conexiones/conexion.php");
include("funciones/funciones.php");


    $con=conectar();
        
 
        $doctor                 = $_POST['doctor'];  

           
        $fecha                  = $_POST['fecha'];                   
                       
        $Fecha                  = $_POST['Fecha'];                        
        $Hora                   = $_POST['Hora'];                          
      

        $usuario_id             = $_POST['usuario_id'];  

        $estado                 = 1;
        $registrado             = date("Y-m-d H:i:s");
        
        $P                   = $_POST['P'];    
        $idCitas             = $_POST['idCitas'];    
        $clienteid             = $_POST['clienteId']; 
         $motivoConsulta         = $_POST['motivo'];   
        




$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));

 
   $queryList1=mysqli_query($conn3,"SELECT * FROM  cliente where cliente_id=$clienteid");
  
            $nrowl=mysqli_num_rows($queryList1);
            while($row2=mysqli_fetch_array($queryList1))
            {

            $nombre    =$row2['nombre_cliente'];
                         
        $telefono               = $row2['whatsapp'];               
        $correo                 = $row2['correo_cliente'];        
       
          }

    
       



          $queryListu=mysqli_query($conn3,"SELECT * FROM  usuarios where ID= $doctor");
        $nrowlu=mysqli_num_rows($queryListu);
        while($rowMotorizadou=mysqli_fetch_array($queryListu))
        {


            $nombreD=$rowMotorizadou['NOMBRE_USUARIO'];
            $especialidad=$rowMotorizadou['especialidad'];

} 
      

 if ($clienteid == '') {
   $clienteid = 0;
 }


if ($P == 0) {
  $ConsultaTipo = 'Presencial';
}
elseif ($P == 1) {
  $ConsultaTipo = 'Virtual';
}


  $queryList=mysqli_query($conn3,"SELECT * FROM  config where ID_Usuario=$doctor");
        $nrowl=mysqli_num_rows($queryList);
        while($rowMotorizado=mysqli_fetch_array($queryList))
        {


            $nombreF=$rowMotorizado['nombreF'];
            $telefonoF=$rowMotorizado['telefonoF'];
            $direccionF=$rowMotorizado['direccionF'];
            $emailF=$rowMotorizado['emailF'];
            $lugar=$rowMotorizado['sucursal'];
            
            $whatsapp=$rowMotorizado['whatsapp'];
            $LogoF           =$rowMotorizado['logoF'];

            $emailF=$rowMotorizado['emailF'];
 


        $sul=$rowMotorizado['sul'];
        $sum=$rowMotorizado['sum'];
        $sue=$rowMotorizado['sue'];
        $suj=$rowMotorizado['suj'];
        $suv=$rowMotorizado['suv'];
        $sus=$rowMotorizado['sus'];
        $sud=$rowMotorizado['sud'];

  if (strlen($LogoF) > 0) 
              {
                $Logo = '<img src="https://medicalsoftplus.com/co297/logos/'.$LogoF.'" height="60" width="120">'; 
              }
              

           
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

if ($idCitas>0) {

  mysqli_query($conn3,"delete from citas where idCitas = $idCitas");
              
}



mysqli_query($conn3,"insert INTO citas (doctor, fecha, Hora, nombre, telefono, correo, motivoConsulta, estado, registrado, usuario_id, tipo, idCliente) 
VALUES ('$doctor' ,'$fecha' ,'$Hora' ,'$nombre' ,'$telefono' ,'$correo' ,'$motivoConsulta' ,'$estado' ,'$registrado', '$usuario_id', '1', '$clienteid')");
         

      


  $queryList=mysqli_query($conn3,"SELECT max(idCitas) as idCitas FROM  citas");
        $nrowl=mysqli_num_rows($queryList);
        while($rowMotorizado=mysqli_fetch_array($queryList))
        {
            $idCitas = $rowMotorizado['idCitas'];

        }





// insert INTO citas (idCitas, doctor, fecha, Hora, nombre, telefono, correo, motivoConsulta, estado, registrado, usuario_id, tipo, idCliente) VALUES ('936', '1' ,'2020-06-29' ,'10:15:00' ,'PRUEBA' ,'57' ,'3@2.com' ,'PRUEBA' ,'1' ,'2020-06-01 08:51:03', '1', '0', '0')


              

                   //echo '<script language="Javascript"> window.location="consultaCliente.php?clienteId='.echo $cliente_Id.';</script>';
     /*

     $mensajeW = 'Sr(a) *'.$nombre.'* usted a agendado un cita médica con Dr(a) *'.$doctor.'* el dia *'.$fecha.'* a las *'.$Hora.'* en *'.$sucursal.'*. Si no desea recibir notificaciones puede darle de baja en cualquier momento respondiendo con la palabra NO. Atte DR ALBUJA CENTROS MEDICOS';
Whatsapp_sent($telefono, $mensajeW);
             
 

 $mensaje2 = 'Dr(a) *'.$doctor.'*  se a agendado  una cita con la paciente *'.$nombre.'*,  *'.$fecha.'* a las *'.$Hora.'* en *'.$sucursal.'*. Motivo: *'.$motivoConsulta.'* Atte ALTE MedicalSoft';
Whatsapp_sent($whatsapp, $mensaje2);

*/


 
if ($P == 1) {
$mensajePago = 'por favor realizar el pago por el siguiente link '.$Base.'pagarcita/'.$idCitas.' ';

   
}



if ($idCitas > 0) {

$mensajeW = 'Registro de cita Medica.
Estimado paciente *'.$nombre.'* ,Se registró una cita Medica con el especialista Dr(a) '.$nombreD.'.
Fecha y Hora:  *'.$fecha.'* *'.$Hora.'* , en '.$lugar.'. Motivo de la consulta:'.$motivoConsulta.'.
Atte. *'.$nombreF.'* Teléfono '.$telefonoF.' Correo '.$emailF.'.';
$accion = 0;
Whatsapp_sent_cliente($linkkey, $telefono, $mensajeW, $cliente_id, $usuario_id, $whatsapp, $accion);

$mensaje2 = ' *'.funcionMaster($doctor, 'ID', 'NOMBRE_USUARIO', 'usuarios').'* la cita ha sido agendada con la paciente *'.$nombre.'*,  *'.$fecha.'* a las *'.$Hora.'* en *'.$sucursal.'*. Motivo: *'.$motivoConsulta.'* Atte ALTE MedicalSoft';

Whatsapp_sent($linkkey,$whatsapp, $mensaje2);

}
else 
{

$mensajeW = '* Registro de cita Medica.* 

Estimado paciente *'.$nombre.'*, Se registró una cita Medica con el especialista Dr(a) '.$nombreD.'.
Fecha y Hora: *'.$fecha.'*  *'.$Hora.'* , en '.$lugar.'.
Motivo de la consulta: '.$motivoConsulta.' *.
Atte. *'.$nombreF.'* Teléfono '.$telefonoF.' Correo '.$emailF.'. ';

$accion = 0;
Whatsapp_sent_cliente($linkkey, $telefono, $mensajeW, $cliente_id, $usuario_id, $whatsapp, $accion);






$mensaje2 = '*'.$doctor.'*  se ha agendado  una cita con la paciente *'.$nombre.'*,  *'.$fecha.'* a las *'.$Hora.'* en *'.$sucursal.'*. Motivo: *'.$motivoConsulta.'* Atte ALTE MedicalSoft';
Whatsapp_sent($linkkey,$whatsapp, $mensaje2);



}

  


$para ="$correo";

// título
$titulo = 'Cita médica agendada-'.$ConsultaTipo;

// mensaje
$mensaje .= '
<html>
<head>
  <title>

Registro de cita VirtualMedic <br> Doctor '.$doctor.' .;.</title>
    <table width="100%" height="466" border="0">
  <tr>
    <td><table width="100%" height="75" border="0">
      
    </table>
      <table width="100%" height="143" border="0">
        <tr>
          <td height="139" bgcolor="#00A74B"><table width="100%" height="62" border="0">
            <tr>
              <td width="5%">&nbsp;</td>
              <td width="72%" style="color:#FFF;"><h2><strong>
Registro de cita VirtualMedic <br>
 '.funcionMaster($doctor, 'ID', 'NOMBRE_USUARIO', 'usuarios').' </strong></h2></td>
              <td width="23%">&nbsp;</td>
            </tr>
          </table></td>
        </tr>
      </table>
      <table width="100%" height="122" border="0">
        <tr>
          <td width="10%">&nbsp;</td>
          <td width="80%"><p>Estimado paciente:</p>
            <p>Se registro una cita Medica '.$ConsultaTipo.'<br />
              ';
                $mensaje .=  "<h1 align='center'>Fecha y hora: $fecha - $Hora </h1>";
                $mensaje .=  "<h1 align='center'>Paciente: $nombre </h1>";
                $mensaje.=  "<h1 align='center'>Telefono: $telefono </h1>";
                $mensaje .=  "<h1 align='center'>Correo: $correo </h1>";
                $mensaje .=  "<h1 align='center'>Motivo consulta: $motivoConsulta </h1>"; 
                $mensaje .=  "<h1 align='center'>Su consulta es con $doctor</h1>"; 
                $mensaje .=  "<h5 align='center'>$nombreF <br> Telefono: $telefonoF <br>Dirección:  $direccionF </h5>";
                $mensaje .=  "<h5 align='center'> '$Logo' </h5>";


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
          <td height="60">Este correo electronico no puede recibir respuestas.<br />
         </td>
        </tr>
    </table>

    </td>
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

   
 

if ($P == 1) {
  
 echo "<script language='Javascript'> 
  window.location='consentimiento.php?clienteId=$clienteid';
  </script>"; 
}
else {
  
// echo "<script language='Javascript'> window.location='portada.php?';</script>"; 
}

 
                
  echo 'Agendado';
                                                                     
   
?>