<?php
date_default_timezone_set('America/Bogota');
//include("conexiones/conexion.php");
include("funciones/funciones.php");
include("funciones/funcionesUtilidades.php");
 ?>

 
<?php

 $historiaClinica1 = $_GET['historiaClinica1'];




                 $queryList=mysqli_query($conn3,"SELECT * FROM  imagenologia where ID =  $historiaClinica1");
                
                $nrowl=mysqli_num_rows($queryList);
                while($rowMotorizado=mysqli_fetch_array($queryList))
                {

                  $cliente_id      =$rowMotorizado['cliente_id'];
                  $usuario_id      =$rowMotorizado['usuario_id'];
                  $Fecha           =$rowMotorizado['Fecha'];

                  $Hora            =$rowMotorizado['Hora'];
                  $datos        =$rowMotorizado['datos'];
                  $laboratorio        =$rowMotorizado['laboratorio'];
                 
                        
                }


           $queryList=mysqli_query($conn3,"SELECT * FROM  config where ID_Usuario = $usuario_id");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {
                $moneda=$rowMotorizado['moneda'];
                $impuestoF=$rowMotorizado['impuestoF'];

                // Nuevos campos

                $nombreF      =$rowMotorizado['nombreF'];
                $telefonoF    =$rowMotorizado['telefonoF'];
                $direccionF   =$rowMotorizado['direccionF'];
                $emailF       = $rowMotorizado['emailF'];
                $ciudadPaisF  =$rowMotorizado['ciudadPaisF'];
                $licenciaF    =$rowMotorizado['licenciaF'];
                $pieF         =$rowMotorizado['pieF'];
                $header       = $rowMotorizado['header'];

                $LogoF           =$rowMotorizado['logoF'];
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
 

            $queryList=mysqli_query($conn3,"SELECT * FROM  usuarios where ID = $usuario_id");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {

              $empresaNombre      =$rowMotorizado['empresaNombre'];
              $Nombre      =$rowMotorizado['USUARIO_USUARIO'];
              $pais               =$rowMotorizado['pais'];

              $ciudad             =$rowMotorizado['ciudad'];
              $direccion          =$rowMotorizado['direccion'];
              $telefono           =$rowMotorizado['telefono'];

              $nit                =$rowMotorizado['nit'];

            }

    $queryList=mysqli_query($conn3,"SELECT * FROM  cliente where cliente_id = $cliente_id");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {

              $nombre_cliente             =$rowMotorizado['nombre_cliente'];
              $CODI_CLIENTE               =$rowMotorizado['CODI_CLIENTE'];
             $edad               =$rowMotorizado['edad_cliente'];
              $fechaNacimiento               =$rowMotorizado['fechaNacimiento'];
           $telefono                =$rowMotorizado['celular_cliente'];

           $email=$rowMotorizado['correo_cliente']; 
            $whatsapp =$rowMotorizado['celular_cliente']; 

                
            } 

 

$Logoe = '<img src="'.$Base.'/logos/encabezadoreceta.png" height="100" width="100%">'; 



   ?>




<body onload="window.print();">
    <div class="wrapper">
       
      <div class="row">
        <div class="col-md-12">

          <div class="box box-solid">


            <!-- /.box-header -->
            <div class="box-body">
<div class="row">
     <div class="col-xs-12" border="1">    
 
 <div class="col-xs-2" border="1">
  <h6 align="center">  INSTITUCIÓN DEL SISTEMA </h6>
         
     <h5 align="center">  ATENCIÓN <BR>TELEMEDICIA </h5>
          
        </div>

         <div class="col-xs-3">
  <h6 align="center"> UNIDAD OPERATIVA <?php echo $Logo ?>  </h6>
         
        </div>

        <div class="col-xs-6" align="center">
         
          <h6 align="center">  LOCALIZACIÓN <br>
           <div class="col-xs-3" align="left"><h6> PARROQUIA IÑAQUITO </h6> </div> <div class="col-xs-3" align="left"><h6> CANTÓN QUITO</h6> </div> <div class="col-xs-3" align="left"><h6>PROVINCIA PICHINCHA</h6> </div>
        </div>
         <div class="col-xs-1" align="left">
         
          <h6 align="left"> HISTORIA CLÍNICA </h6>
         <?php echo $CODI_CLIENTE?> 
           
        </div>
        
      </div>  </div> 
   
 

<?php

 $conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));




            $queryList=mysqli_query($conn3,"SELECT * FROM  cliente where cliente_id=$cliente_id");
           //echo  "SELECT * FROM  cliente where cliente_id=$cliente";
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {
           
            
            $email=$rowMotorizado['correo_cliente']; 
            $whatsapp =$rowMotorizado['whatsapp'];  

          }

echo '...whatsss....'.$whatsapp;

echo '...coreeo...'.$email;


$mensajeW = 'Sr(a) *'.$nombre_cliente.'* Se le ha generado una ORDEN DE IMAGENOLOGIA motivo de la consulta  con  *Asistente Medico VirtualMedic*; para ver orden ingresar por el siguiente link:  '.$Base.'/verImagenologia/'.$historiaClinica1.' ';


$accion = 0;
Whatsapp_sent_cliente($linkkey, $whatsapp, $mensajeW, $cliente_id, $usuario_id, $whatsapp, $accion);




$para ="$email";



                // título
                $titulo = 'Orden de Imagenologia resultado de consulta con Asistente Medico VirtualMedic';

                // mensaje
                $mensaje = '
                <html>
                <head>
                  <title>Orden de Imagenologia  resultado de consulta con Asistente Medico VirtualMedic</title>
                    <body> 
                    
                               Hola buen dia señor(a) '.$nombre_cliente.', Enviamos link para ver Orden de Imagenologia. :<br><br>

                
             <div>  Link para ver orden : '.$Base.'verImagenologia/'.$historiaClinica1.'
              
          </div>
        

 
                          <br></br>
                <p>Atentamente,<br />
                  ALTE-Asistente Medico VirtualMedic </p> 
                  
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
                $cabeceras .= 'From:  Orden de imagenologia del Asistente Medico VirtualMedic  <noreply@medicalsoftplus.com>' . "\r\n";
                $cabeceras .= 'Cc: noreply@medicalsoftplus.com' . "\r\n";
                $cabeceras .= 'Bcc: noreply@medicalsoftplus.com' . "\r\n";

                // Enviarlo
                mail($para, $titulo, $mensaje, $cabeceras); 
                mail($para1, $titulo, $mensaje, $cabeceras); 
               


             echo "<script language='Javascript'> window.location='pacientesHistoria.php';</script>"; 


              ?> 