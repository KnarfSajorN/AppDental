<?php
date_default_timezone_set('America/Bogota');
include("funciones/funciones.php");
include("funciones/funcionesUtilidades.php");
include("funciones/conn3.php");

             $historiaClinica1 = $_GET['historiaClinica1'];




                $queryList=mysqli_query($conn3,"SELECT * FROM  Ordenlaboratorio where ID =  $historiaClinica1");
                
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
                $Logo = '<img src="'.$Base.'logos/'.$LogoF.'" height="175" width="175">'; 
              }
              

            
   if (strlen($firma) > 0)  
              {
                $firmaImg = '<img src="'.$Base.'FirmasReg/'.$firma.'" height="80" width="200">'; 
              }

// Nuevos campos 
 
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
                
            } 

 
$Logoe = '<img src="'.$Base.'logos/encabezadoreceta.png" height="100" width="100%">'; 

 
   ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> <?php echo $empresaNombre ?>   </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?= $Base ?>bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= $Base ?>dist/css/AdminLTE.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body onload="window.print();">
<div class="wrapper">
  <!-- Main content -->

    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
     <!--    <div class="row">
         
     <div class="col-xs-3">
          <h2 >
          <?php echo $Logo ?>  
            
          </h2>
        </div>
        <div class="col-xs-9" align="center">
         <i> <h2>
            <?php echo 
            $empresaNombre
            ?>    </h2></i> 
       <!-- <h4>   Consultorio Medico de la Mujer<br> -->
     <!--     <?php echo 
            $direccion
            ?>    
         <br>
          Telefono: 305 302 0324 / 320 621 1266 </h4>
        </div>
      
      </div>
      <!-- info row -->

<div class="row table-responsive" width="100%">
  <div class="row">
<div class="col-xs-5">
<?php echo $Logo ?>
</div>
<div align="right" 

class="col-xs-6">
  <BR> <h4>
 Dr. Jose Luis Ramirez Osorio- Piel vital<BR>
  <?php echo $especialidad?><BR>
 Nit. <?php echo $nit ?> </h4>
</div>

<div align="right" 

class="col-xs-1">
  <BR> <h4>
<?php echo $pp?> </h4>
</div>
</div>

      <div class="row invoice-info">
   <div class="col-md-12">
        <!-- /.col -->
        <div class="col-xs-8 ">
         <h4>Orden de Laboratorio</h4>
          <address>
              <strong>Nombres y Apellidos:  <?php echo $nombre_cliente.'&nbsp&nbsp'?> </strong><br>
             
              <strong>Edad :<?php echo calculaedad($fechaNacimiento).'&nbsp&nbsp&nbsp&nbsp'?>   # de identificacion: <?php echo $CODI_CLIENTE.'&nbsp&nbsp' ?>  </strong> <br><strong>Fecha: <?php echo $fechaRegistro.'&nbsp&nbsp'?> </strong> <br>

                      </address>
        </div>
        
 
 
      </div>   </div>


<div class="row table-responsive" width="100%">
  <div class="row">
<div class="col-xs-5">
<?php echo $Logo ?>
</div>
<div align="right" 

class="col-xs-6">
  <BR> <h4>
 Dr. Jose Luis Ramirez Osorio- Piel vital<BR>
  <?php echo $especialidad?><BR>
 Nit. <?php echo $nit ?> </h4>
</div>

<div align="right" 

class="col-xs-1">
  <BR> <h4>
<?php echo $pp?> </h4>
</div>
</div>

      <div class="row invoice-info">
   <div class="col-md-12">
        <!-- /.col -->
        <div class="col-xs-8 ">
         <h4>Orden de Examenes</h4>
          <address>
              <strong>Nombres y Apellidos:  <?php echo $nombre_cliente.'&nbsp&nbsp'?> </strong><br>
             
              <strong>Edad :<?php echo calculaedad($fechaNacimiento).'&nbsp&nbsp&nbsp&nbsp'?>   # de identificacion: <?php echo $CODI_CLIENTE.'&nbsp&nbsp' ?>  </strong> <br><strong>Fecha: <?php echo $fechaRegistro.'&nbsp&nbsp'?> </strong> <br>

                      </address>
        </div>
        
 
 
      </div>   </div>






              <div class="row table-responsive" width="100%">

                <div class="col-md-12">

         

                   <table>
                  <?php echo $establecimiento?>
                  <?php echo $datos?>
                  <?php echo $laboratorio?>
                  
                   </table> 

                 
                  


              </div>
              </div>
<div class="row">
              <div class="col-xs-4">   <h6 align="justify">FECHA:<?php echo $Fecha?>  </h6> </div>
               <div class="col-xs-8">   <h6 align="justify">PROFESIONAL<?php echo $Nombre?>  </h6> 

 <?php
  echo  $firmaImg;

  ?>
               </div>
               
        </div>

        <div class="row">
              <div class="col-xs-8">  <h6 ></h6> </div>
               <div class="col-xs-4">   <h6 > LABORATORIO CLINICO - SOLICITUD</h6> </div>
               
        </div>
 
</div>

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <!--<div class="row no-print">
        <div class="col-xs-12">  
          <a href="imprimirRecipe.php?historiaClinica1=<?php echo $historiaClinica1?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Imprimir</a>
         
  

        </div>
      </div>-->
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
  </div>






