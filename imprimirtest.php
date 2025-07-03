<?php
date_default_timezone_set('America/Bogota');
//include("conexiones/conexion.php");
//include("funciones/conexiones.php");
include("funciones/funciones.php");
include("funciones/funcionesUtilidades.php");
include 'funciones/conn3.php';

$historiaClinica1 = $_GET['historiaClinica1'];




$queryList = mysqli_query($conn3, "SELECT * FROM test where ID =  $historiaClinica1");

$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {

  $cliente_id      = $rowMotorizado['cliente_id'];
  $usuario_id      = $rowMotorizado['usuario_id'];
  $Fecha           = $rowMotorizado['Fecha'];

  $Hora            = $rowMotorizado['Hora'];

  $test        = $rowMotorizado['test'];
}

$queryList = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario= 1");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
  $moneda = $rowMotorizado['moneda'];
  $impuestoF = $rowMotorizado['impuestoF'];

  // Nuevos campos

  $nombreF      = $rowMotorizado['nombreF'];
  $telefonoF    = $rowMotorizado['telefonoF'];
  $direccionF   = $rowMotorizado['direccionF'];
  $emailF       = $rowMotorizado['emailF'];
  $ciudadPaisF  = $rowMotorizado['ciudadPaisF'];
  $licenciaF    = $rowMotorizado['licenciaF'];
  $pieF         = $rowMotorizado['pieF'];
  $header       = $rowMotorizado['header'];

  $LogoF           = $rowMotorizado['logoF'];
  $firma               = $rowMotorizado['firma'];

  if (strlen($LogoF) > 0) 
              {
                 $Logo = '<img src="'.$Base.'/logos/'.$LogoF.'" height="100" width="100%">';
              }
              

              if (strlen($firma) > 0)  
              {
                $firmaImg = '<img src="'.$Base.'/FirmasReg/'.$firma.'" height="150" width="150">'; 
              }


            }


$queryList = mysqli_query($conn3, "SELECT * FROM  usuarios where ID = $usuario_id");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {

  $empresaNombre      = $rowMotorizado['empresaNombre'];
  $pais               = $rowMotorizado['pais'];

  $ciudad             = $rowMotorizado['ciudad'];
  $direccion          = $rowMotorizado['direccion'];
  $telefono           = $rowMotorizado['telefono'];

  $nit                = $rowMotorizado['nit'];
}

$queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id = $cliente_id");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {

  $nombre_cliente             = $rowMotorizado['nombre_cliente'];
  $CODI_CLIENTE               = $rowMotorizado['CODI_CLIENTE'];
  $edad               = $rowMotorizado['edad_cliente'];
  $fechaNacimiento               = $rowMotorizado['fechaNacimiento'];
  $celular_cliente                = $rowMotorizado['celular_cliente'];
  $ciudad_cliente              = $rowMotorizado['ciudad_cliente'];
}



?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> <?php echo $empresaNombre ?> </title>
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
            <!--<div class="row">
         
 <h4 align="center">  PRE OCUPACIONAL </h4>
 <div class="col-xs-3">
         
          <?php echo $Logo ?>  
            
          
        </div>

        <div class="col-xs-9" align="center">
         
           <h2> <?php echo
                $empresaNombre ?></h2> <br>
          <?php echo
          $direccion
          ?>   
         
          
        </div>
        
      </div> -->
            <div class="col-xs-9" align="left">

              <?php echo $Logo ?>


            </div>

            <div class="row">

              <div class="col-md-12">

                <table class="table table-bordered">
                  <tr>
                    <td>Fecha: <?php echo $Fecha ?></td>
                    <td>Hora: <?php echo $Hora ?></td>
                    <td>Celular: <?php echo $celular_cliente  ?></td>


                  </tr>
                  <tr>
                    <td>Nombre del Paciente: <?php echo $nombre_cliente ?></td>
                    <td>Edad: <?php echo  calculaedad($fechaNacimiento) ?></td>
                    <td>Ciudad: <?php echo $ciudad_cliente ?></td>

                  </tr>
                </table>

                <table>

                  <?php echo $test ?>


                </table>




              </div>
            </div>



          </div>

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->





      <div class="col-xs-6" align="center">



      </div>

      <div class="col-xs-6" align="center">
        DATOS DEL PROFESIONAL DE SALUD <BR>
        <?php
        echo  $firmaImg;

        ?>
        <br>_______________________________________<br>
        <?php echo $nombreF ?><br>
        <?php echo $especialidad ?><br>
        <b>* Documento firmado digitalmente *</b>
      </div>

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