<?php
date_default_timezone_set('America/Bogota');
//include("conexiones/conexion.php");
//include("funciones/conexiones.php");
include("funciones/funciones.php");
include("funciones/funcionesUtilidades.php");
include("funciones/conn3.php");

            $historiaClinica1 = $_GET['cliente'];
            $idr= $_GET['idr'];

             $fechaR         = date("Y-m-d");

            $queryList=mysqli_query($conn3,"SELECT * FROM  operacionRecetario where cliente_id = $historiaClinica1 and idReceta= '$idr'");

          
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {
                $fechaRegistro        =$rowMotorizado['fecha'];
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
                $Logo = '<img src="'.$Base.'logos/'.$LogoF.'" height="175" width="175">'; 
              }
              

            
   if (strlen($firma) > 0)  
              {
                $firmaImg = '<img src="'.$Base.'FirmasReg/'.$firma.'" height="80" width="200">'; 
              }

// Nuevos campos 
 
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
<div class="col-xs-12">
<?php echo $Logoe ?>
</div>
</div>

      <div class="row invoice-info">
   
        <!-- /.col -->
        <div class="col-xs-8 ">
          <h4> ATENCIÓN TELEMEDICINA</h4>
          <address>
              <strong>NOMBRES Y APELLIDOS:  <?php echo $nombre_cliente.'&nbsp&nbsp'?> </strong><br>
             
              <strong>EDAD: <?php echo calculaedad($fechaNacimiento) ?><strong>   FECHA:  <?php echo $fechaRegistro.'&nbsp&nbsp'?> </strong> <strong>HCI/CI: <?php echo $CODI_CLIENTE.'&nbsp&nbsp' ?> </strong> <br>

                      </address>
        </div>
            <div class="col-xs-4" align="center">
  <?php
  echo  $firmaImg;

  ?>
  <br>_______________________________________<br>
 <?php echo $nombreF?><br>
  <?php echo $telefonoF?>
  </div>
 
 
      </div>

   
  <br>
      
    <div class="row table-responsive">
        <div class="col-xs-2 ">
          <th> <b><h4></b></h4></th> </div>

          <div class="col-xs-5">
              <th><h4> <b>DESCRIPCIÓN DEL MEDICAMENTO</b></h4> </th> </div>
             <div class="col-xs-5">
              <th> <h4 align="center"><b>INDICACIONES</b></h4></th>
            </div>
             
              
             
            </div>
<?php


            $querydeta=mysqli_query($conn3,"SELECT * FROM  operacionRecetario  where  cliente_id = $historiaClinica1  and idReceta=$idr");

          // echo  "SELECT * FROM  DetalleReceta where   id_cliente = $historiaClinica1 and fechaRegistro ='$fechaR' and idReceta=$idr ";
            
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

                  echo '  <div class="row">   
                 
               <div class="col-xs-5">'.$cantidad.'&nbsp'.$Producto.$producto1.'&nbsp&nbsp<b>Dosis:</b>'.$dosis .' '.$posologia .'</div>
               <div class="col-xs-2"> </div>

<div class="col-xs-5">'.$cantidad.'&nbsp'.$Producto.$producto1.'&nbsp&nbsp<b>Dosis:</b>'.$dosis .' '.$posologia .'</div> 


</div>



<div class="row">  
                <div class="col-xs-5"> <b>Cada:</b>'.$frecuencia.'&nbsp&nbsp'.$administracion.'&nbsp&nbsp <b>Durante:</b>'.$dias.'Dias  via: '.$via.'</div> 
                
<div class="col-xs-2"> </div>
            
               <div class="col-xs-5"> <b>Cada:</b>'.$frecuencia.'&nbsp&nbsp'.$administracion.'&nbsp&nbsp <b>Durante:</b>'.$dias.'Dias  via: '.$via.'</div> </div>

               <div class="row">  
               <div class="col-xs-5"><i><b>Comentario:</b>'.$nota.' </i></div>


                <div class="col-xs-2"> </div>
<div class="col-xs-5"><i><b>Comentario:</b>'.$nota.' </i></div>


               </div>


<hr>
'

       ;  



 }

  ?>

<br><br>

<div class="row">
  <div class="col-xs-12"><h4><b>Diagnóstico CIE 10:</b><br><?php
  echo  $CIE1 ;?> <br><?php
  echo  $CIE2 ;?><br><?php
  echo  $CIE3 ;?> </h4></div></div>

</div>

<!-- <div class="col-xs-6" align="center">
  
  </div> -->

 

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






