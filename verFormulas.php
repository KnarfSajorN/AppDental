<?php
date_default_timezone_set('America/Bogota');
include("funciones/funciones.php");
include("funciones/funcionesUtilidades.php");

                       
            $conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));

            $historiaClinica1 = $_GET['historiaClinica1'];
           
             $fechaR         = date("Y-m-d");

              $queryList=mysqli_query($conn3,"SELECT * FROM  historiaClinica1 where ID = $historiaClinica1");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {

              $cliente_id      =$rowMotorizado['cliente_id'];
              $usuario_id      =$rowMotorizado['usuario_id'];
              $Fecha           =$rowMotorizado['Fecha'];

              $Hora            =$rowMotorizado['Hora'];
              $motivoConsulta  =$rowMotorizado['motivoConsulta'];
              $diagnostico     =$rowMotorizado['diagnostico'];
              $tratamiento     =$rowMotorizado['tratamiento'];
              $notas           =$rowMotorizado['notas'];
              $recipe          =$rowMotorizado['recipe'];
              $comoTomarlo     =$rowMotorizado['comoTomarlo'];
              $incapacidades   =$rowMotorizado['incapacidades'];
              

            }

              $queryList=mysqli_query($conn3,"SELECT * FROM  examenesaRealizar where historia_id = $historiaClinica1");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {

              $laboratorio      =$rowMotorizado['laboratorio'];
              $ecografia      =$rowMotorizado['ecografia'];
              $otros           =$rowMotorizado['otros'];
              $recetas           =$rowMotorizado['recetas'];

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
                $firma               =$rowMotorizado['firma'];

              if (strlen($LogoF) > 0) 
              {
                $Logo = '<img src="https://medicalsoftplus.com/co259/logos/'.$LogoF.'" height="100" width="100%">'; 
              }
              

              if (strlen($firma) > 0)  
              {
                $firmaImg = '<img src="https://medicalsoftplus.com/co259/FirmasReg/'.$firma.'" height="100" width="150">'; 
              }





// Nuevos campos 


            }
 

            $queryList=mysqli_query($conn3,"SELECT * FROM  usuarios where ID = $usuario_id");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {

              $empresaNombre      =$rowMotorizado['empresaNombre'];
              $nombre    =$rowMotorizado['NOMBRE_USUARIO'];
              
              $pais               =$rowMotorizado['pais'];

              $ciudad             =$rowMotorizado['ciudad'];
              $direccion          =$rowMotorizado['direccion'];
              $telefono           =$rowMotorizado['telefono'];
              $especialidad        = $rowMotorizado['especialidad'];
              $nit                =$rowMotorizado['nit'];

            }

    $queryList=mysqli_query($conn3,"SELECT * FROM  cliente where cliente_id = $cliente_id");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {

              $nombre_cliente             =$rowMotorizado['nombre_cliente'];
              $CODI_CLIENTE               =$rowMotorizado['CODI_CLIENTE'];
              $fechaNacimiento            =$rowMotorizado['fechaNacimiento'];
              $celular_cliente            =$rowMotorizado['celular_cliente'];
              $seguro                     =$rowMotorizado['entidadSalud'];
              $direccion_cliente          =$rowMotorizado['direccion_cliente'];
                $genero              =$rowMotorizado['genero'];

           $direccion_cliente   =$rowMotorizado['direccion_cliente'];
          
             $telefono      = $rowMotorizado['whatsapp'];
  
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
  <link rel="stylesheet" href="https://medicalsoftplus.com/co259/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="https://medicalsoftplus.com/co259/dist/css/AdminLTE.min.css">

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
  <div class="row">

                <div class="col-md-12">
                
                  <table class="tg" style="undefined;table-layout: fixed; width: 100%">
                  <colgroup>
<col style="width:  100%">
<col style="width:  100%">
<col style="width:  100%">
<col style="width:  100%">
</colgroup>


 <tr align="center">
    <th class="Logo" rowspan="4" align="center"><?php echo $Logo ?> </th>
    <th class="titulo" colspan="4" rowspan="4" align="center"> 
      <div align="center"><?php echo $header  ?></div>

    <!--<h9 align="center"> <?php echo  $empresaNombre ?> <?php echo   $direccion?>  </h9></th>-->
  </tr>

  <tr>
    </tr>
  <tr>
    </tr>
  <tr>
    </tr> 
</table>
<br>
<table class="tg" border=1 style="undefined;table-layout: fixed; width: 100%">
  <tr>
    <td  width="30%" class="nombrePaciente">Nombre del paciente: <?php echo $nombre_cliente ?></td>
    <td  width="20%" class="documento">Documento: <?php echo $CODI_CLIENTE ?></td>
    <td  width="30%" class="f.nacimiento">F.Nacimiento: <?php echo  $fechaNacimiento ?></td>
    <td width="20%"  class="edad">Edad:  <?php echo  calculaedad($fechaNacimiento) ?></td>
  </tr>
                
  <tr>
    <td class="residencia">Residencia: <?php echo $direccion_cliente  ?></td>
    <td class="seguro">EPS:<?php echo $seguro  ?></td>
    <td class="telefono">Telefono: <?php echo $telefono?></td>
    <td class="genero">Genero: <?php echo $genero?></td>
  </tr></table>
 
</div>
</div>





        <div class="row">
        <h4 align="center"> FÓRMULA </h4>
                <div class="col-md-12">
          </div>
        </div>
   
      
      <div class="row">
        <div class="col-xs-12">
       <hr>
<p>
  Fecha : 
    <?php echo $Fecha ?>
 
  
</p>
<p> 


  <?php  echo  $recetas ?>

  </p>
 
  

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

<div class="col-xs-6" align="center">
  <?php //echo $Fecha ?> 
  </div>

<div class="col-xs-6" align="center">
  <?php echo $ciudadPaisF?>
  </div>


  <div class="col-xs-6" align="center">
  
  </div>

  <div class="col-xs-6" align="center">
  <?php
  echo  $firmaImg;

  ?>
  <br>_______________________________________<br>
  <?php echo $nombre?><br>
  <?php echo $especialidad?><br>
  <b>* Documento firmado digitalmente *</b>
  </div>


  

      <div class="col-xs-12" align="center">
    <footer  style="width:100%; margin-left: 0px;"  >


<div class="copyright" style="background-color: #0d47a1;">
    <div class="container-fluid" style="background-color: #0d47a1; color: #bbdefb;">
       <p> <?php echo $pieF?></p>

    </div>
</div>
      </footer> </div>

        </div>
      </div>-->
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
  </div>






