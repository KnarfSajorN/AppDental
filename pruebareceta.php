<?php
date_default_timezone_set('America/Bogota');
//include("conexiones/conexion.php");
include("funciones/funciones.php");
include("funciones/funcionesUtilidades.php");
 ?>

 
<?php

 $cliente = $_GET['cliente'];
            $idr= $_GET['idr'];
//$idr = $_GET['idOperacion'];




 $queryList=mysqli_query($conn3,"SELECT * FROM  operacionRecetario where cliente_id = $cliente and idReceta= '$idr'");

          
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {
                $fechaRegistro        =$rowMotorizado['fechaRegistro'];
                $Producto      =$rowMotorizado['idProducto'];
                $Indicaciones   =$rowMotorizado['Indicaciones'];
                $cada       = $rowMotorizado['cada'];
                $administracion       = $rowMotorizado['administracion'];
                $horario              = $rowMotorizado['horario'];         
                $periodo   =$rowMotorizado['periodo'];
                 $nota    =$rowMotorizado['licenciaF'];
                $id_usuario         =$rowMotorizado['usuario_id'];
                 $id_cliente      = $rowMotorizado['cliente_id'];
                
                

            }

 $queryList=mysqli_query($conn3,"SELECT * FROM  historiaClinicaN  where receta = '$idr' and cliente_id= '$historiaClinica1'");
                
                $nrowl=mysqli_num_rows($queryList);
                while($rowMotorizado=mysqli_fetch_array($queryList))
                {

                  $cliente_id      =$rowMotorizado['cliente_id'];
                  $usuario_id      =$rowMotorizado['usuario_id'];
                  $Fecha           =$rowMotorizado['Fecha'];

                  $Hora            =$rowMotorizado['Hora'];
                  
                  $CIE1         =$rowMotorizado['CIE1'];
                  $CIE2       =$rowMotorizado['CIE2'];
                  $CIE3        =$rowMotorizado['CIE3'];
                 
                        
                }



            $queryList=mysqli_query($conn3,"SELECT * FROM  config where ID_Usuario = $id_usuario ");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {
                $moneda=$rowMotorizado['moneda'];
                $impuestoF=$rowMotorizado['impuestoF'];

// Nuevos campos

                $nombreF=$rowMotorizado['nombreF'];
                $telefonoF=$rowMotorizado['telefonoF'];
                $direccionF=$rowMotorizado['direccionF'];
                $emailF=$rowMotorizado['emailF'];
                $ciudadPaisF=$rowMotorizado['ciudadPaisF'];
                $licenciaF=$rowMotorizado['licenciaF'];
                $pieF=$rowMotorizado['pieF'];

                 $LogoF               =$rowMotorizado['logoF'];
               $firma               =$rowMotorizado['firma'];


               if (strlen($LogoF) > 0) 
              {
                 $Logo = '<img src="'.$Base.'/logos/'.$LogoF.'" height="100" width="100%">';
              }
              

              if (strlen($firma) > 0)  
              {
                $firmaImg = '<img src="'.$Base.'/FirmasReg/'.$firma.'" height="150" width="150">'; 
              }


            }

 


            $queryList=mysqli_query($conn3,"SELECT * FROM  usuarios where ID = $id_usuario ");

          //echo "SELECT * FROM  usuarios where ID = $id_usuario ";


            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {

              $empresaNombre      =$rowMotorizado['empresaNombre'];
              $nombre     =$rowMotorizado['NOMBRE_USUARIO'];
              $pais               =$rowMotorizado['pais'];

              $ciudad             =$rowMotorizado['ciudad'];
              $direccion          =$rowMotorizado['direccion'];
              $telefono           =$rowMotorizado['telefono'];

              $nit                =$rowMotorizado['nit'];

            }


            $queryList=mysqli_query($conn3,"SELECT * FROM  cliente where cliente_id = $cliente");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {

              $nombre_cliente             =$rowMotorizado['nombre_cliente'];
              $ciudad_cliente             =$rowMotorizado['ciudad_cliente'];

              $correo_cliente             =$rowMotorizado['correo_cliente'];
              $direccion_cliente          =$rowMotorizado['direccion_cliente'];
              $telefono_cliente           =$rowMotorizado['telefono_cliente'];
             //$whatsapp           =$rowMotorizado['whatsapp'];
              $fechaNacimiento     =$rowMotorizado['fechaNacimiento'];
               $CODI_CLIENTE  =$rowMotorizado['CODI_CLIENTE'];
            $email=$rowMotorizado['correo_cliente']; 
            $whatsapp =$rowMotorizado['celular_cliente']; 


                
            }

//$Logoe = '<img src="https://medicalsoftplus.com/co435/logos/encabezadoreceta.png" height="100" width="100%">'; 



   ?>




<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Receta Médica
            </h1>
     
    </section>

 
   <body onload="window.print();">
<div class="wrapper">
 
    <section class="invoice">
  
<div class="row">
<div class="col-xs-12">
<?php echo $Logoe ?>
</div>
</div>

      <div class="row invoice-info">
   
        <!-- /.col -->
        <div class="col-xs-12 ">
          <h4> ATENCIÓN TELEMEDICINA</h4>
          <address>
              <strong>NOMBRES Y APELLIDOS:  <?php echo $nombre_cliente.''?> </strong><br>
             
              <strong>EDAD: <?php echo calculaedad($fechaNacimiento) ?>    FECHA:  <?php echo $fechaRegistro.''?> </strong>
               <strong>HCI/CI: <?php echo $CODI_CLIENTE.'' ?>   </strong> <br>
              <strong>correo: <?php echo $email.'' ?>   </strong> <br>

                      </address>
        </div>
 
 
      </div>
   
 

<?php

 $conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));




            $queryList=mysqli_query($conn3,"SELECT * FROM  cliente where cliente_id=$cliente");
           //echo  "SELECT * FROM  cliente where cliente_id=$cliente";
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {
           
            
            $email=$rowMotorizado['correo_cliente']; 
            $whatsapp =$rowMotorizado['whatsapp']; 

          }




$mensajeW = 'Sr(a) *'.$nombre_cliente.'* Se le ha generado una receta motivo de la consulta con el Doctor '.$nombre.' ; para ver receta ingresar por el siguiente link:  https://medicalsoftplus.com/baseDev/imprimirRecetaH.php?idr='.$idr.'&cliente='.$cliente.' ';


$accion = 0;
Whatsapp_sent_cliente($linkkey, $whatsapp, $mensajeW, $cliente_id, $usuario_id, $whatsapp, $accion);




$para ="$email";

                // título
                $titulo = 'Receta de la consulta con el Doctor '.$nombre.' ';

                // mensaje
                $mensaje = '
                <html>
                <head>
                  <title>Receta de la consulta con el Doctor '.$nombre.' </title>
                    <body> 
                    
                               Hola buen dia señor(a) '.$nombre_cliente.', como resultado de la consulta con el Doctor '.$nombre.', se le ha generado una receta medica. :<br><br>


      
';



            $querydeta=mysqli_query($conn3,"SELECT * FROM  operacionRecetario  where  cliente_id = $cliente  and idReceta=$idr");
         // echo  "SELECT * FROM  operacionRecetario  where  cliente_id = $cliente  and idReceta=$idr";

          // echo  "SELECT * FROM  DetalleReceta where   id_cliente = $cliente and fechaRegistro ='$fechaR' and idReceta=$idr ";
            
            $nrowl=mysqli_num_rows($querydeta);
            while($rowDetalle=mysqli_fetch_array($querydeta))
            {
               $Producto              =$rowDetalle['codigoProd'];
      
        $dosis                 =$rowDetalle['dosis'];
        $posologia                =$rowDetalle['posologia'];
        $frecuencia                 =$rowDetalle['frecuencia'];
         $administracion              =$rowDetalle['administracion'];
        $dosisdia           =$rowDetalle['dosisdia'];
       $via   =$rowDetalle['via'];
        $id_usuario              =$rowDetalle['id_usuario'];
        $id_cliente              =$rowDetalle['idcliente']; 
        $total             =$rowDetalle['total']; 
        $dias             =$rowDetalle['dias']; 
        $nota            =$rowDetalle['nota']; 
        $producto1          =$rowDetalle['producto1']; 
        $cantidad          =$rowDetalle['cantidad']; 
             
               $numero++;

       

       ;  



 }




  ?>

     <?php                 
                $mensaje .='     


                
             <div>  Link para ver receta: https://medicalsoftplus.com/baseDev/imprimirRecetaH.php?idr='.$idr.'&cliente='.$cliente.'
              
          </div>
        

 
                          <br></br>
                <p>Atentamente,<br />
                 Doctor '.$nombre.' </p> 
                  
                <br/>
                 
                  
 
                <body>

                </body>
                </html>
                ';

                // Para enviar un correo HTML, debe establecerse la cabecera Content-type
                $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
                $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                // Cabeceras adicionales
                $cabeceras .= 'To: sievensoft <noreply@medicalsoftplus.com>' . "\r\n";
                $cabeceras .= 'From:  Receta Medica <noreply@medicalsoftplus.com>' . "\r\n";
                $cabeceras .= 'Cc: noreply@medicalsoftplus.com' . "\r\n";
                $cabeceras .= 'Bcc: noreply@medicalsoftplus.com' . "\r\n";

                // Enviarlo
                mail($para,$titulo, $mensaje, $cabeceras); 
               mail($para1, $titulo, $mensaje, $cabeceras); 


           echo "<script language='Javascript'> window.location='pacientesHistoria.php';</script>"; 

              ?> 