<?php
date_default_timezone_set('America/Bogota');
//include("conexiones/conexion.php");
//include("funciones/conexiones.php");
include("funciones/funciones.php");
include("funciones/funcionesUtilidades.php");
include 'funciones/conn3.php';

            $historiaClinica1 = $_GET['cliente'];
            $idr= $_GET['idr'];

             $fechaR         = date("Y-m-d");

            $queryList=mysqli_query($conn3,"SELECT * FROM  DetalleReceta where id_cliente= $historiaClinica1");

          
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
                $id_usuario         =$rowMotorizado['id_usuario'];
                 $id_cliente      = $rowMotorizado['id_cliente'];
              
              

            }

           $queryList=mysqli_query($conn3,"SELECT * FROM  config where ID_Usuario = $id_usuario");
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
 

            $queryList=mysqli_query($conn3,"SELECT * FROM  usuarios where ID = $id_usuario");
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

    $queryList=mysqli_query($conn3,"SELECT * FROM  cliente where cliente_id = $historiaClinica1 ");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {

              $nombre_cliente             =$rowMotorizado['nombre_cliente'];
              $CODI_CLIENTE               =$rowMotorizado['CODI_CLIENTE'];
             
              $fechaNacimiento               =$rowMotorizado['fechaNacimiento'];
           
                
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
        <div class="col-xs-9" align="center">
         <i> <h2>
            <?php echo 
            $empresaNombre
            ?>    </h2></i> 
       <!-- <h4>   Consultorio Medico de la Mujer<br> -->
           <?php echo 
            $direccion
            ?>    
         <br>
          Telefono: 305 302 0324 / 320 621 1266 </h4>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
   
        <!-- /.col -->
        <div class="col-xs-12 ">
          <h4> Información del Paciente</h4>
          <address>
              <strong>Nombre <?php echo $nombre_cliente.'&nbsp&nbsp'?> </strong>
              <strong>Documento <?php echo $CODI_CLIENTE.'&nbsp&nbsp' ?> </strong>
              <strong>Edad <?php echo calculaedad($fechaNacimiento) ?> </strong><br>
            
 
          </address>
        </div>
 
 
      </div>
      
    <div class="row table-responsive">
        <div class="col-xs-2 ">
          <th> <b><h4># </b></h4></th> </div>

          <div class="col-xs-6">
              <th><h4> <b>Descripción del Medicamento</b></h4> </th> </div>
             <div class="col-xs-4">
              <th> <h4><b>Concentración</b></h4></th>
            </div>
             
              
             
            </div>
<?php


            $querydeta=mysqli_query($conn3,"SELECT * FROM  DetalleReceta where   id_cliente = $historiaClinica1  and idReceta=$idr");

          // echo  "SELECT * FROM  DetalleReceta where   id_cliente = $historiaClinica1 and fechaRegistro ='$fechaR' and idReceta=$idr ";
            
            $nrowl=mysqli_num_rows($querydeta);
            while($rowDetalle=mysqli_fetch_array($querydeta))
            {
               $Producto              =$rowDetalle['Producto'];
        $uso             =$rowDetalle['uso'];
         $prioridad       =$rowDetalle['prioridad'];
       
        $dosis                 =$rowDetalle['dosis'];
        $posologia                =$rowDetalle['posologia'];
        $frecuencia                 =$rowDetalle['frecuencia'];
         $administracion              =$rowDetalle['frecuencia2'];
        $dosisdia           =$rowDetalle['dosisdia'];
       $via   =$rowDetalle['via'];
        $id_usuario              =$rowDetalle['id_usuario'];
        $id_cliente              =$rowDetalle['idcliente']; 
        $total             =$rowDetalle['total']; 
        $dias             =$rowDetalle['dias']; 
        $nota            =$rowDetalle['nota']; 
        $producto1          =$rowDetalle['producto1']; 
             
               $numero++;

                  echo '  <div class="row">   
                  <div class="col-xs-2">' .$numero. '</div>
                  <div class="col-xs-6">'.$Producto.$producto1.' </div>
                  
                  <div class="col-xs-4">'.$dosis.'&nbsp&nbsp'.$posologia.' </div>
                   
</div>
               <div class="row">
               <div class="col-xs-3">
               <b>Dosis:</b>'.$dosis .' '.$posologia .'</div> <div class="col-xs-2"> <b>Cada:</b>'.$frecuencia.'&nbsp&nbsp'.$administracion.' </div>  <div class="col-xs-2"><b>Durante:</b>'.$dias.' Dias </div> <div class="col-xs-2"><b>Vía:</b>'.$via.'</div><div class="col-xs-3"> <b>Cant. Total:</b> '.$total.'</div> </div> 

<div class="row">
<div class="col-xs-12"><h4><i><b>Comentario:</b>'.$nota.'</i></h4></div></div>


<hr>
'

       ;  



 }

  ?>

<br><br>
 <div class="col-xs-6" align="center">
  
  </div>

  <div class="col-xs-6" align="center">
  <?php
  echo  $firmaImg;

  ?>
  <br>_______________________________________<br>
 <?php echo $nombreF?><br>
  <?php echo $telefonoF?>
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






