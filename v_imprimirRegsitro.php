<?php
date_default_timezone_set('America/Bogota');
include("funciones/funciones.php");
include("funciones/conn3.php");

            $historiaClinica3 = $_GET['historiaClinica3'];

            $queryList=mysqli_query($conn3,"SELECT * FROM  v_historiaClinica3 where id = $historiaClinica3");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {

              $cliente_id      =$rowMotorizado['cliente_id'];
              $usuario_id      =$rowMotorizado['usuario_id'];
              $fecha           =$rowMotorizado['fecha'];

              $hora            =$rowMotorizado['hora'];
              $vacuna_id       =$rowMotorizado['vacuna_id'];
              $diagnostico     =$rowMotorizado['diagnostico'];
              $tratamiento     =$rowMotorizado['tratamiento'];
              $notas           =$rowMotorizado['notas'];
             


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

                $LogoF               =$rowMotorizado['logoF'];

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
              $pais               =$rowMotorizado['pais'];

              $ciudad             =$rowMotorizado['ciudad'];
              $direccion          =$rowMotorizado['direccion'];
              $telefono           =$rowMotorizado['telefono'];

              $nit                =$rowMotorizado['nit'];

            }


            $queryList=mysqli_query($conn3,"SELECT * FROM  v_cliente where id = $cliente_id");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {

              $nombre_cliente             =$rowMotorizado['nombre_cliente'];
              $CODI_CLIENTE               =$rowMotorizado['CODI_CLIENTE'];
              $celular_cliente               =$rowMotorizado['celular_cliente'];
              $ciudad_cliente               =$rowMotorizado['ciudad_cliente'];
              $correo_cliente               =$rowMotorizado['correo_cliente'];
              $genero               =$rowMotorizado['genero'];
              $direccion_cliente               =$rowMotorizado['direccion_cliente'];
              $direccion_cliente               =$rowMotorizado['direccion_cliente'];
              $fechaNacimiento               =$rowMotorizado['fechaNacimiento'];
              $lugarNacimiento               =$rowMotorizado['lugarNacimiento'];
              $CODI_CLIENTE               =$rowMotorizado['CODI_CLIENTE'];
              $entidadSalud               =$rowMotorizado['entidadSalud'];
            
           
                
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
      <!-- 
      

      <div class="row">
         
        <div class="col-xs-3">
          <h2 >
          <?php echo $Logo ?>  
            
          </h2>
        </div>
        <div class="col-xs-9">
          <h4>
            <?php echo 
            $empresaNombre.'<br>'.
            $nit.'<br>'.
            $direccion.'<br>'.
            $header  
            ?> 
            
          </h4>
        </div>
        <!-- /.col 
      </div>
-->



      <!-- info row -->
      <div class="row invoice-info">
    <div class="col-sm-3">
    <?php echo $fecha ?>
	</div>
    <div class="col-sm-6" align="center">
     Registro de paciente
	</div>
    <div class="col-sm-3">
    <?php echo $id ?>
	</div>

	<div class="col-sm-12">
    <?php echo $nombre_cliente ?>
	</div>
	<div class="col-sm-4">
    Fecha Nacimiento<?php echo $fechaNacimiento ?>
	</div>
	<div class="col-sm-4">
   CC:  <?php echo $CODI_CLIENTE ?>
	</div>
    <div class="col-sm-4">
    RH: <?php echo $tiposSangre ?>
	</div>
   <div class="col-sm-8">
    Dirección: <?php echo $direccion_cliente ?>
	</div>
    <div class="col-sm-4">
    Sexo: <?php echo $genero ?>
	</div>

    <div class="col-sm-4">
    Teléfono: <?php echo $telefono_cliente ?>
	</div>
    <div class="col-sm-8">
    EPS: <?php echo $entidadSalud ?>
	</div>
    <div class="col-sm-8">
    Carne : <?php echo $carne ?>
	</div>

    <div class="col-sm-4">
    Hora : <?php echo $carne ?>
	</div>

	<div class="col-sm-12" align="center">
		Vacunas Solicitadas
      
	</div>

	<div class="col-sm-12">
		
     <?php echo v_servicios($vacuna_id)?>
	</div>

        <!-- /.col 
        <div class="col-sm-12 invoice-col">
           Cliente
          <address>
              <strong>Nombre <?php echo $nombre_cliente ?> </strong><br>
              <strong>RUT <?php echo $CODI_CLIENTE ?> </strong><br>
              <strong>Edad <?php echo $edad_cliente ?> </strong><br>
            
 
          </address>
        </div>
 -->
      </div>
<!--       
      <div class="row">
        <div class="col-xs-12">
       <hr>

<p>
  Recipe <br>
  <?php echo $recipe ?>
</p>

<hr>

<p>
  Como tomarlo <br>
  <?php echo $comoTomarlo ?>
</p>

<hr>
        </div>
        <!--  
      </div>
      

<div class="col-xs-6" align="center">
  <?php echo $Fecha ?> 
  </div>

<div class="col-xs-6" align="center">
  <?php echo $ciudadPaisF?>
  </div>


<div class="col-xs-6" align="center">
   
  </div>

<div class="col-xs-6" align="center">
 <br><br> _______________________________________<br>
  <?php echo $nombreF?><br>
  <?php echo $telefonoF?>
  </div>

-->


  

      <div class="col-xs-12" align="center">
      <?php echo $pieF?><br>
      
      <?php echo 'Direccion '.$direccionF.', Correo'.$emailF?>
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">  
          <a href="v_imprimirRegsitro.php?historiaClinica3=<?php echo $historiaClinica3?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Imprimir</a>
         
  

        </div>
      </div>
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
  </div>






