<?php 
   include 'header.php';
   include 'menu.php';?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         Se genero video consulta 
         
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Se genero video consulta </a></li>
        

      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box">
        <div class="col-md-12" style="text-align-last: center;">
   
                  <?php

        $ID = $_SESSION['ID'];

        $Correo = $_GET['clienteId'];

        $whatsapp = $_GET['telefono']; 

        $idCitas = $_GET['idCitas']; 
        
       $queryCita=mysqli_query($conn3,"SELECT * FROM  citas  where idCitas= $idCitas");
                //  $queryList=mysqli_query($conn3,"SELECT * FROM  citas");

                  $nrowl=mysqli_num_rows($queryCita);

                  while($row_recordset32=mysqli_fetch_array($queryCita))

                  {
                      $idCitas      = $row_recordset32['idCitas'];
                      $Doctor= $row_recordset32['doctor'];
                      $fecha= $row_recordset32['fecha'];
                      $Hora= $row_recordset32['Hora'];
                      $nombre= $row_recordset32['nombre'];
                      $telefono= $row_recordset32['telefono'];
                      $correo= $row_recordset32['correo'];
                      $motivoConsulta= $row_recordset32['motivoConsulta'];
                      $activo= $row_recordset32['activo']; 
                      $estado= $row_recordset32['estado'];
                      $idCliente= $row_recordset32['idCliente'];


                  }


mysqli_query($conn3,"update citas set estadoVideo = 1 where idCitas= $idCitas");
 


  $queryList=mysqli_query($conn3,"SELECT * FROM  config where ID_Usuario=$ID");
        $nrowl=mysqli_num_rows($queryList);
        while($rowMotorizado=mysqli_fetch_array($queryList))
        {

            $nombreF=$rowMotorizado['nombreF'];
            $telefonoF=$rowMotorizado['telefonoF'];
            $direccionF=$rowMotorizado['direccionF'];
            $emailF=$rowMotorizado['emailF'];


           
        }

 

        $NOMBRE_USUARIO = $_SESSION['NOMBRE_USUARIO'];

            
        $SalaNumero = rand();
        
        $para ="$Correo";

        // título
        $título = 'Video Consulta';

        // mensaje
        $mensaje = '
        <html>
        <head>
          <title>Video Consulta</title>
            <table width="100%" height="466" border="0">
          <tr>
            <td><table width="100%" height="75" border="0">
              
            </table>
              <table width="100%" height="143" border="0">
                <tr>
                  <td height="139" bgcolor="#00A74B"><table width="100%" height="62" border="0">
                    <tr>
                      <td width="5%">&nbsp;</td>
                      <td width="72%" style="color:#FFF;"><h2><strong>Video Consulta con  Dr(a) '.$NOMBRE_USUARIO.'</strong></h2></td>
                      <td width="23%">&nbsp;</td>
                    </tr>
                  </table></td>
                </tr>
              </table>
              <table width="100%" height="122" border="0">
                <tr>
                  <td width="10%">&nbsp;</td>
                  <td width="80%"> 
                    <p>  <br />
                       <h3 align="center"><a href="'.$Base.'/verConsultaP.php?SalaNumero='.$SalaNumero.'&idCitas='.$idCitas.'">Clic Aqui para entrar a la consulta</a>   </h3>

                        <h3 align="center"> Si el enlace no funcina por favor copia y pega esto en el navegador: </h3> 
                       <h6 align="center">'.$Base.'/verConsultaP.php?SalaNumero='.$SalaNumero.'&idCitas='.$idCitas.' </h6> 
                       <br></br>
        <p>Atentamente,<br />
         '.$NOMBRE_USUARIO.'</p> 
          
        <br /> 
                  <td width="10%">&nbsp;</td>
                </tr>
            </table>
              <h5 align="center">'.$nombreF .' <br> Teléfono '.$telefonoF .'  <br>Dirección '. $direccionF  .' </h5>";
              <table width="100%" border="0">
                <tr>
                  <td height="21" bgcolor="#00A74B">&nbsp;</td>
                </tr>
              </table>
              <table width="100%" height="64" border="0">
                <tr>
                  <td height="60">Este correo electrónico no puede recibir respuestas. Para obtener más información, accede a medicalsoftcolombia.com<br />
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
        $cabeceras .= 'To: Oftasoft <noreply@medicalsoftcolombia.com>' . "\r\n";
        $cabeceras .= 'From: Video Consulta<noreply@medicalsoftcolombia.com>' . "\r\n";
        $cabeceras .= 'Cc: noreply@medicalsoftcolombia.com' . "\r\n";
        $cabeceras .= 'Bcc: noreply@medicalsoftcolombia.com' . "\r\n";

        mail($Correo, $título, $mensaje, $cabeceras);



$mensajeW = 'Video Consulta Iniciada
Video Consulta con Dr(a) '.$NOMBRE_USUARIO.'
'.$Base.'/verConsultaP.php?SalaNumero='.$SalaNumero.'&idCitas='.$idCitas.'
 Atentamente:
 
'.$nombreF.'.
Teléfono '.$telefonoF .'
Dirección '. $direccionF  .'
Att: Asistente Medico VirtualMedic.

* Recuerde que para poder iniciar la consulta debe usar el navegador GOOGLE CHROME*

 ';


$accion = 0;
$cliente_id = 0;
$usuario_id = 0;
 
Whatsapp_sent_cliente($linkkey, $whatsapp, $mensajeW, $cliente_id, $usuario_id, $whatsapp, $accion);

 

 
                echo        '<h3> Sala creada numero: '.$SalaNumero.', se a enviado un correo al '.$Correo.' y al telefono '.$whatsapp.'</h3>
                <h3 align="center"><a href="'.$Base.'/verConsulta.php?SalaNumero='.$SalaNumero.'&idCitas='.$idCitas.'">

                Clic Aqui para entrar a la consulta


                </a>  <br> </h3>';
 //echo 'https:// /videoConsulta.php?'.$SalaNumero;
 ?>
 

 





  
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
   <?php
    include 'footer.php';

   ?>