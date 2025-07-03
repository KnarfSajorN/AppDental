<?php
date_default_timezone_set('America/Bogota');
//include("conexiones/conexion.php");
//include("funciones/conexiones.php");
include("funciones/funciones.php");
include 'funciones/conn3.php';

            $usuario_id = $_GET['usuario_id'];
            $cliente_id = $_GET['cliente_id'];
            $micropigmentacion = $_GET['micropigmentacion'];


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

                $LogoF               =$rowMotorizado['logoF'];

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
              $edad_cliente               =$rowMotorizado['edad_cliente'];
           
                
            }

 
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
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">

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
      <div class="row">
         
        <div class="col-xs-3">
          <h2 >
          <?php echo $Logo ?>  
            
          </h2>
        </div>
        <div class="col-xs-4">
          <h4>
            <?php echo 
            $empresaNombre.'<br>'.
            $nit.'<br>'.
            $direccion.'<br>'.
            $header  

            ?> 
            <?php
         //  echo "SELECT * FROM  cliente where cliente_id = $cliente_id";

            ?>
          </h4>
        </div>


                <div class="col-sm-5">
                  <br>
           Cliente
          <address>
              <strong>Nombre <?php echo $nombre_cliente ?> </strong><br>
              <strong>RUT <?php echo $CODI_CLIENTE ?> </strong><br>
              <strong>Edad <?php echo $edad_cliente ?> </strong><br>
            
 
          </address>
        </div>




        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
   
        <!-- /.col -->

 
      </div>
      
      <div class="row">
        <div class="col-xs-12">
 
 <div align="center" class="col-xs-12"> <strong> Consentimiento Informado  </strong>  </div>

 Usted como paciente debe saber : 
Antes de Iniciar el tratamiento se debe elaborar una historia del paciente , debe descartar cualquier trastorno que pueda contraindicar el tratamiento y por ultimo inpeccionar detalladamente la zona a tratar . 
<br>Los cosmeticos deben eliminarse completamente utilizando un limpiador neutro que no contenga alchol como bactolm, cetaphil ; un limpiador suave para la piel o cera facial o celeteque .
<br> Evite totalmente el uso de cosmeticos durante las 24 horas siguientes al tratamiento.
<br>Evite la exposición al sol despues de cada tratamiento 
<br>Informa debidamente al paciente sobre la posibilidad es escosor y sensación de calor durante el tratamiento 
<br>
<strong>  CONTRAINDICACIONES </strong>
<br>
1.- Dermatosis inflamatoria <br>
2.- Infecciones cutaneas <br>
3.- Defecto en el sistema Inmuneologico <br>
4.- Historia de formación de queloides <br>
5.- Trastornos Psicologicos <br>
6.- Embarazo <br>
7.- Cancer de piel <br>
8.- Trastorno Hemorragicos <br>
9.- Photodermatosis <br>
10.- Herpes simple <br>
11.- Consume farmacos que aumente la sensibilidad de la luz <br>
12.-Tratamiento de celulitis <br>
13.- Piel Curtida por el sol <br>
<p align="justify"> 
  Yo  <strong> <?php echo $nombre_cliente ?></strong> He sido  informada(o) que el procedimiento se realizara bajo mi  responsabilidad  , por lo tanto me comprometo a seguir todos los requisitos necesarios , dartestimonio verdadero de mi estado de salud sin importar que mi tratamiento nose pueda llevar a cabo , realizar el pago de las las sesiones oportunamente y cumpli con las citas en las fechas programadas para tener exito en la depilación . 
</p>
 
 
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

 

<div class="col-xs-12" align="center">
 <?php echo date("d-m-Y") ?>  <?php echo $ciudadPaisF?>
 <br><br> _______________________________________<br>
  <?php echo $nombre_cliente?><br>
  
  </div>


  

      <div class="col-xs-12" align="center">
      <?php echo $pieF?><br>
      <?php echo $licenciaF?><br>
      <?php echo 'Direccion '.$direccionF.', Correo'.$emailF?>
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
      
          <a href="imprimirConsentimiento2.php?usuario_id=<?php echo $usuario_id?>&cliente_id=<?php echo $cliente_id?>&micropigmentacion=<?php echo $micropigmentacion?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Imprimir</a>
          
        </div>
      </div>
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
  </div>






