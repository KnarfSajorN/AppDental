<?php
date_default_timezone_set('America/Bogota');
//include("conexiones/conexion.php");
//include("funciones/conexiones.php");
include("funciones/funciones.php");
include("funciones/funcionesUtilidades.php");
include 'funciones/conn3.php';

            $historiaClinica1 = $_GET['historiaClinica1'];
            $IDformula= $_GET['IDformula'];

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



if($IDformula > 0) { $queryList=mysqli_query($conn3,"SELECT * FROM formulas where ID =$IDformula");

  }
else 
             {$queryList=mysqli_query($conn3,"SELECT * FROM formulas where historia_id = $historiaClinica1"); 
   }
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {

              $paquete     =$rowMotorizado['paquete'];
              $fechaF     =$rowMotorizado['fecha'];
              $cliente         =$rowMotorizado['cliente_id'];
              $usuario         =$rowMotorizado['usuario_id'];

           

            }  



           $queryList=mysqli_query($conn3,"SELECT * FROM  config where ID_Usuario = '$usuario' OR ID_Usuario = '$usuario_id' ");
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
                 $Logo = '<img src="'.$Base.'/logos/'.$LogoF.'" height="100" width="100%">';
              }
              

              if (strlen($firma) > 0)  
              {
                $firmaImg = '<img src="'.$Base.'/FirmasReg/'.$firma.'" height="150" width="150">'; 
              }


            }
 

            $queryList=mysqli_query($conn3,"SELECT * FROM  usuarios where ID = '$usuario' or ID = '$usuario_id'");
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

    $queryList=mysqli_query($conn3,"SELECT * FROM  cliente where cliente_id = '$cliente_id' or cliente_id = '$cliente' ");

   
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
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
   <!--<link rel="stylesheet" type="text/css" href="https://medicalsoftplus.com/baseDev/estilopiepagina.css">-->
  

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<!--<body onload="window.print();">
<div class="wrapper">
  

    
    <section class="invoice">
     
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
         /.col 
      </div>

      <div class="row invoice-info">
   
      
        <div class="col-sm-12 invoice-col">
           Cliente
          <address>
              <strong>Nombre: <?php echo $nombre_cliente ?> </strong><br>
              <strong>Documento: <?php echo $CODI_CLIENTE ?> </strong><br>
              <strong>Fecha de Nacimiento: <?php echo ($fechaNacimiento) ?> </strong><br>
              <strong>Edad: <?php echo calculaedad($fechaNacimiento) ?> </strong><br>
              <strong>Celular: <?php echo $celular_cliente ?> </strong><br>
              <strong>Direccion: <?php echo $direccion_cliente ?> </strong><br>
              <strong>Seguro: <?php echo $seguro ?> </strong><br>
            
 
          </address>
        </div>
 
 
      </div>-->

      <!--ENCABEZADO  -->
      <body onload="window.print();">
<div class="wrapper">
   <div class="col-md-12">
           
          <div class="box box-solid">
            <!-- /.box-header -->
           <div class="box-body">
            <div class="row">
            </div>
          </div>
  <!-- Main content -->

    <!-- Main content -->
   <!-- <section class="invoice">
  title row 
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
      <!-- info row 
      <div class="row invoice-info">
   
        <!-- /.col 
        <div class="col-sm-12 invoice-col">
           Cliente
          <address>
              <strong>Nombre <?php echo $nombre_cliente ?> </strong><br>
              <strong>RUT <?php echo $CODI_CLIENTE ?> </strong><br>
              <strong>Edad <?php echo $edad_cliente ?> </strong><br>
            
 
          </address>
        </div>
 
      </div>
      
      <div class="row">
        <div class="col-xs-12">
       <hr>

<p>-->

  <!--ENCABEZADO -->



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
    <?php echo $fechaF ?>
 
  
</p>
<p> 


  <?php  echo  $paquete ?>

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
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">  
          <a href="imprimirRecipe.php?historiaClinica1=<?php echo $historiaClinica1?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Imprimir</a>
         
  

        </div>
      </div>
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
  </div>






