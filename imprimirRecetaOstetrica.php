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

            $queryList=mysqli_query($conn3,"SELECT * FROM  operacionRecetario where cliente_id = $historiaClinica1 and idReceta= '$idr' ");

          
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

 $queryList=mysqli_query($conn3,"SELECT * FROM  historiaObstetrica  where receta = '$idr' and cliente_id= '$historiaClinica1'");
                
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
                   $D1         =$rowMotorizado['diagnostico1'];
                  $D2       =$rowMotorizado['diagnostico2'];
                  $D3        =$rowMotorizado['diagnostico3'];
                 
                        
                }



           $queryList=mysqli_query($conn3,"SELECT * FROM  config where ID_Usuario = $usuario_id ");
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
 

            $queryList=mysqli_query($conn3,"SELECT * FROM  usuarios where ID = $usuario_id");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {

              $empresaNombre      =$rowMotorizado['empresaNombre'];
              $pais               =$rowMotorizado['pais'];

              $ciudad             =$rowMotorizado['ciudad'];
              $direccion          =$rowMotorizado['direccion'];
              $telefono           =$rowMotorizado['telefono'];
              $NOMBRE_USUARIO           =$rowMotorizado['NOMBRE_USUARIO'];
              $nit                =$rowMotorizado['nit'];
              $especialidad                =$rowMotorizado['especialidad'];

            }

    $queryList=mysqli_query($conn3,"SELECT * FROM  cliente where cliente_id = $cliente_id  ");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {

              $nombre_cliente             =$rowMotorizado['nombre_cliente'];
              $CODI_CLIENTE               =$rowMotorizado['CODI_CLIENTE'];
             
              $fechaNacimiento               =$rowMotorizado['fechaNacimiento'];
              $genero               =$rowMotorizado['genero'];
           
                
            }
//$Logoe = '<img src="https://medicalsoftplus.com/ec221/logos/encabezadoreceta.png" height="100" width="100%">'; 

 
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
       
      <div class="row">
        <div class="col-md-12">

          <div class="box box-solid">


            <!-- /.box-header -->
            <div class="box-body">



              
<div class="row">

         <div class="col-xs-2">
          <h2 >
          <?php echo $Logo ?>  
            
          </h2>
        </div>
        <div class="col-xs-4" align="center">
         <i> <h4>
           Dr. <?php echo 
            $NOMBRE_USUARIO
            ?>    </h4></i> 
       <!-- <h4>   Consultorio Medico de la Mujer<br> -->
           <?php echo 
            $especialidad
            ?> <br><br><br>
            <?php echo $fechaRegistro?>   
         <br>
        </div>
         
        <div class="col-xs-2">
          <h2 >
          <?php echo $Logo ?>  
            
          </h2>
        </div>
        <div class="col-xs-4" align="center">
         <i> <h4>
            <?php echo 
            $NOMBRE_USUARIO
            ?>    </h4></i> 
       <!-- <h4>   Consultorio Medico de la Mujer<br> -->
           <?php echo 
            $especialidad
            ?> <br><br><br>
            <?php echo $fechaRegistro?>   
         <br>
        </div>
        <!-- /.col -->
      </div>

      <div class="row invoice-info">
   
        <!-- /.col -->
        <!--<div class="col-xs-8 ">
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
 
 
      </div>-->

      <style type="text/css">
 hr {
  height: 5px;
  background-color: black;
}  </style>
        

        <div class="col-xs-5">
         
          <address>
              <h6>  <strong>Paciente: <?php echo $nombre_cliente.'&nbsp&nbsp'?> </strong><br>
              <strong>Documento <?php echo $CODI_CLIENTE.'&nbsp&nbsp' ?> </strong><br>
              <strong>Edad <?php echo calculaedad($fechaNacimiento) ?> </strong><br>
               <strong>Genero <?php echo $genero.'&nbsp&nbsp' ?> </strong><br>
              <strong>Dg:<?php echo $CIE1?> </strong><br>
              
            
 
          </address>

        </div>
 



   <div class="col-xs-1">
    <br><br><br><br><br>     
          

        </div>


    <div class="col-xs-6">
         
          <address>
              <h6>  <strong>Paciente: <?php echo $nombre_cliente.'&nbsp&nbsp'?> </strong><br>
              <strong>Documento <?php echo $CODI_CLIENTE.'&nbsp&nbsp' ?> </strong><br>
              <strong>Edad <?php echo calculaedad($fechaNacimiento) ?> </strong><br>
               <strong>Genero <?php echo $genero.'&nbsp&nbsp' ?> </strong><br>
            <strong>Dg: <?php echo $CIE1?></strong><br>
              
            
 
          </address>


        </div>
 
      </div>

   
  <br>
      
    <div class="row invoice-info">
    <div class="col-xs-6">
      <label>RP.</label>
       <?php
                                                              //  $querydeta=mysqli_query($conn3,"SELECT * FROM  operacionRecetario  where  cliente_id = $cliente_id  and idReceta=$idr");
                                                              $queryList = mysqli_query($conn3, "SELECT * FROM  operacionRecetario where cliente_id = $cliente_id and idReceta=$idr ");
                                                              $nrowl = mysqli_num_rows($queryList);
                                                              while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        $Producto              = $rowMotorizado['codigoProd'];

        $dosis                 =$rowMotorizado['dosis'];
        $posologia                =$rowMotorizado['posologia'];
        $frecuencia                 =$rowMotorizado['frecuencia'];
        $administracion              =$rowMotorizado['administracion'];
        $dosisdia           =$rowMotorizado['dosisdia'];
        $via   =$rowMotorizado['via'];
        $id_usuario              =$rowMotorizado['id_usuario'];
        $id_cliente              =$rowMotorizado['idcliente']; 
        $total             =$rowMotorizado['total']; 
        $dias             =$rowMotorizado['dias']; 
        $nota_indicacion            =$rowMotorizado['nota']; 
        $producto1          =$rowMotorizado['producto1']; 
        $cantidad          = $rowMotorizado['cantidad']; 
        $nota2         = $rowMotorizado['nota2']; 
        
        $numero++;

        //$receta_nombre = funcionMaster($Producto,'id','descripcion','pos');
        $concentracion = funcionMaster($Producto,'id','concentracion','pos');

        echo '
        <div class="col-xs-12">
        '. $Producto.' '.$producto1.'
        <br>Cantidad : '.$cantidad.'
        <br>Indicación : '.$nota_indicacion.'<br>
        </div><div class="col-xs-12"></div>
        ';  

        '
        <div class="col-xs-12"><br>
        '.$nota_indicacion.'<br>
        </div><div class="col-xs-12"></div>';


      }

      ?>
    </div>
    <div class="col-xs-6">
      <label>INDICACIONES GENERALES: </label><BR>
      <?php echo $nota2; ?>
    </div>
  </div>
  <br>
  <br>
  <br>
 <div class="col-xs-6" align="left">
   <?php
  //echo  $firmaImg;

  ?>
  <br>_______________________________________<br>
  <?php echo $NOMBRE_USUARIO?><br> 
  <?php echo $especialidad?> <br>
  
  </div>

  <div class="col-xs-6" align="left">
   <?php
  //echo  $firmaImg;

  ?>
  <br>_______________________________________<br>
  <?php echo $NOMBRE_USUARIO?><br>  
  <?php echo $especialidad?> <br>
  
  </div>


<!--<div class="row">
  <div class="col-xs-12"><h4><b>Diagnóstico CIE 10:</b><br><?php
  echo  $CIE1 ;?> <br><?php
  echo  $CIE2 ;?><br><?php
  echo  $CIE3 ;?> <br><?php
  echo  $D1 ;?> <br><?php
  echo  $D2 ;?><br><?php
  echo  $D3;?> </h4>



</div>



  <div class="col-xs-12"><h4><b>INDICACIONES GENERALES</b><br><?php
  echo  $nota2 ;?>  </h4></div>

</div>-->




<!-- <div class="col-xs-6" align="center">
  
  </div> -->

 

        <!-- /.col -->
      </div>
      <!-- /.row -->

<footer>
      <div class="col-xs-6" align="center">
        <label>
          <?php echo $pieF ?> <br>
        </label>
      </div>
      </footer>

      <footer>
      <div class="col-xs-6" align="center">
        <label>
         <?php echo $pieF?> <br>
        </label>
      </div>
      </footer>



  </div>

 </div>

            </div>
          </div>
        </div>
      </div>
     
    </div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Select2 -->
<script src="plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- bootstrap color picker -->
<script src="plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
 
<!-- iCheck 1.0.1 -->
<script src="plugins/iCheck/icheck.min.js"></script>
 
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="plugins/morris/morris.min.js"></script>
 
<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
</body>
</html>
