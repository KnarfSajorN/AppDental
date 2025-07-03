<?php
date_default_timezone_set('America/Bogota');
include("funciones/funciones.php");
include("funciones/funcionesUtilidades.php");
include("funciones/conn3.php");

            $historiaClinica1 = $_GET['cliente'];
            $idr= $_GET['idr'];

             $fechaR         = date("Y-m-d");

            $queryList=mysqli_query($conn3,"SELECT * FROM  operacionRecetario where cliente_id = $historiaClinica1 and idReceta= '$idr'");
         // echo "SELECT * FROM  operacionRecetario where cliente_id = $historiaClinica1 and idReceta= '$idr'";

        //echo  "SELECT * FROM  operacionRecetario where cliente_id = $historiaClinica1 and idReceta= '$idr'";
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

 $queryList=mysqli_query($conn3,"SELECT * FROM  historiaClinica1 where receta = '$idr' and cliente_id= '$historiaClinica1'");
                
                $nrowl=mysqli_num_rows($queryList);
                while($rowMotorizado=mysqli_fetch_array($queryList))
                {

                 

                  $historiaClinica           =$rowMotorizado['ID'];
                  
               
                 
                        
                }



                 $queryList=mysqli_query($conn3,"SELECT * FROM  informacion_rips  where id_historia = $historiaClinica");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {

              $CUPS      =$rowMotorizado['CUPS'];
              $finalidad_consulta     =$rowMotorizado['finalidad_consulta'];
              $causa_externa          =$rowMotorizado['causa_externa'];

              $ambito_procedimiento           =$rowMotorizado['ambito_procedimiento'];
              $finalidad_procedimiento =$rowMotorizado['finalidad_procedimiento'];
              $realizacion_quirurgico  =$rowMotorizado['realizacion_quirurgico'];
              $cie10_complicacion     =$rowMotorizado['cie10_complicacion'];
            $cie10_1=$rowMotorizado['cie10_1']; 
            $cie10_2=$rowMotorizado['cie10_2']; 
            $cie10_3=$rowMotorizado['cie10_3']; 
            $cie10_4=$rowMotorizado['cie10_4']; 
            $cie10_5=$rowMotorizado['cie10_5'];
            $cie10_6=$rowMotorizado['cie10_6']; 
            $cie10_7=$rowMotorizado['cie10_7']; 
            $cie10_8=$rowMotorizado['cie10_8']; 
            $cie10_9=$rowMotorizado['cie10_9']; 
            $cie10_10=$rowMotorizado['cie10_10']; 




          }




           $queryList=mysqli_query($conn3,"SELECT * FROM  config where ID_Usuario = $id_usuario");

         //echo  "SELECT * FROM  config where ID_Usuario = $id_usuario";
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

             $empresaNombre      =$rowMotorizado['NOMBRE_USUARIO'];
              $especialidad     =$rowMotorizado['especialidad'];
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
//$Logoe = '<img src="https://medicalsoftplus.com/baseDev/logos/encabezadoreceta.png" height="100" width="100%">'; 

 
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
  <link rel="stylesheet" href="https://medicalsoftplus.com/baseDev/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="https://medicalsoftplus.com/baseDev/dist/css/AdminLTE.min.css">

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
<div class="col-xs-5">
<?php echo $Logo ?>
</div>
<div align="right" 

class="col-xs-6">
  <BR> <h4>
<?php echo $empresaNombre?><BR>
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
   
        <!-- /.col -->
        <div class="col-xs-8 ">
         <h4> Receta Medica</h4>
          <address>
              <strong>Nombres y Apellidos:  <?php echo $nombre_cliente.'&nbsp&nbsp'?> </strong><br>
             
              <strong>Edad :<?php echo calculaedad($fechaNacimiento).'&nbsp&nbsp&nbsp&nbsp'?>   # de identificacion: <?php echo $CODI_CLIENTE.'&nbsp&nbsp' ?>  </strong> <br><strong>Fecha: <?php echo $fechaRegistro.'&nbsp&nbsp'?> </strong> <br>

                      </address>
        </div>
        
 
 
      </div>
      
    <div class="row table-responsive" width="100%">
        

          <div class="col-xs-5">
              <th><h4 align="center"> <b>DESCRIPCIÓN DEL MEDICAMENTO</b></h4> </th> </div>
               <div class="col-xs-2"></div>
             <div class="col-xs-5">
              <th> <h4 align="center"><b>INDICACIONES</b></h4></th>
            </div>
             
              
             
            </div>
<?php


            $querydeta=mysqli_query($conn3,"SELECT * FROM  operacionRecetario  where  cliente_id = $historiaClinica1  and idReceta=$idr");
//ECHO "SELECT * FROM  operacionRecetario  where  cliente_id = $historiaClinica1  and idReceta=$idr";
            
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
        $nota2         =$rowDetalle['nota2']; 
             
               $numero++;

                  echo '   <div class="row table-responsive" width="100%"> 
                 
                 <div class="col-xs-5">'.$cantidad.'&nbsp'.$Producto.$producto1.'&nbsp&nbsp<b>Presentación:</b>'.$dosis .' '.$posologia .'</div>
               <div class="col-xs-2"> </div>

<div class="col-xs-5">'.$nota.'</div> 


</div>

'

       ;  



 }

  ?>

<br><br>

 <table width="100%">
          <tr>
            
            <td  style="font-weight: bold;">Diágnostico CIE10</td><td></td>
          </tr>
          <tr>
   
      <tr> <td> <?php  echo $cie10_1 ?></td> </tr>
      <tr> <td> <?php  echo $cie10_2 ?></td> </tr>
      <tr> <td> <?php  echo $cie10_3 ?></td> </tr>
      <tr> <td> <?php  echo $cie10_4 ?></td> </tr>
      <tr> <td> <?php  echo $cie10_5 ?></td> </tr>
      <tr> <td> <?php  echo $cie10_6 ?></td> </tr>
      <tr> <td> <?php  echo $cie10_7 ?></td> </tr>
      <tr> <td> <?php  echo $cie10_8 ?></td> </tr>
      <tr> <td> <?php  echo $cie10_9 ?></td> </tr>
      <tr> <td> <?php  echo $cie10_10 ?></td> </tr>



    </table>

<div class="row">
  <!--<div class="col-xs-12"><h4><b>Diagnóstico CIE 10:</b><br><?php
  echo  $CIE1 ;?> <br><?php
  echo  $CIE2 ;?><br><?php
  echo  $CIE3 ;?> </h4></div>-->
 <div class="col-xs-12"><h4><b>INDICACIONES GENERALES</b><br><?php
  echo  $nota2 ;?>  </h4></div>

</div>


 <div class="col-xs-4" align="center">
  <?php
  echo  $firmaImg;

  ?>
  <br>_______________________________________<br>
 <?php echo $nombreF?><br>
  <?php echo $telefonoF?>
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






