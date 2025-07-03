<?php
ini_set("session.cookie_lifetime","17200");
ini_set("session.gc_maxlifetime","17200");
session_start();

date_default_timezone_set('America/Bogota');
include("conexiones/conexion.php");
include("funciones/conexiones.php");
include("funciones/funciones.php");

$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));

$historiaClinica1 = decrypt($_GET['iC']) ;

$queryList=mysqli_query($conn3,"SELECT * FROM historiaClinicaCirugiaPlastica where ID = $historiaClinica1");
$nrowl=mysqli_num_rows($queryList);
while($rowMotorizado=mysqli_fetch_array($queryList))
{

  $envejecimiento      =$rowMotorizado['envejecimiento'];
  $cirugia      =$rowMotorizado['cirugia'];
  $antecedentespf     =$rowMotorizado['antecedentespf'];
  $antecedentes     =$rowMotorizado['antecedentes'];


  $tratamiento           =$rowMotorizado['tratamiento'];

  $tratamientoResumen         =$rowMotorizado['tratamientoResumen'];
  $planAtencion  =$rowMotorizado['planAtencion'];

  $procedimiento     =$rowMotorizado['procedimiento'];
  $planAtencion     =$rowMotorizado['planAtencion'];
  $abono           =$rowMotorizado['pagoAbono'];
  $nota          =$rowMotorizado['notas'];
  $peso    =$rowMotorizado['peso'];
  $altura   =$rowMotorizado['altura'];
  $imc   =$rowMotorizado['imc'];

  $ComposicionCorpora         =$rowMotorizado['ComposicionCorporal'];
  $diagnostico5   =$rowMotorizado['diagnostico5'];
  $rSistema   =$rowMotorizado['rSistema'];
  $motivoConsulta =$rowMotorizado['motivoConsulta'];
  $usuario_id=$rowMotorizado['usuario_id'];
  $cliente_id=$rowMotorizado['cliente_id'];
  $cie=$rowMotorizado['CIE10'];

  $imagen=$rowMotorizado['imagen'];
  $notaImagen=$rowMotorizado['notaImagen'];
  $antP=$rowMotorizado['antP'];
  $antF=$rowMotorizado['antF'];
  $img11=$rowMotorizado['img11'];
  $img12=$rowMotorizado['img12'];
  $img13=$rowMotorizado['img13'];
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
    $Logo = '<img src="'.$Base.'/logos/'.$LogoF.'" height="150" width="150">'; 
  }


  if (strlen($firma) > 0)  
  {
    $firmaImg = '<img src="'.$Base.'/FirmasReg/'.$firma.'" height="100" width="200">'; 
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
        <div class="col-xs-9">
          <h4>
            <?php echo 
            $nombreF.'<br>'.
            $nit.'<br>'.
            $direccion.'<br>'.
            $header 

            ?> 
            <?php


         //  echo "SELECT * FROM  cliente where cliente_id = $cliente_id";

            ?>
          </h4>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">

        <!-- /.col -->
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

       <p>
        Tratamiento  <?php e_servicios($tratamiento) ?>
        <br>
        <?php echo $descripcion ?>
      </p>
      Copago:  <?php echo $abono ?>
      <hr>
      <?php if ($imagen<>''): ?>
        <div class="col-xs-12 center text-center">
          <h2><strong>Grafico</strong></h2>
          <img src="<?php echo$imagen ?>" style="width: 70%; height: auto;">
          <br>
          <strong> Notas Grafico: </strong>  
          <p> <?php echo $notaImagen?> </p> 
          <hr>
        </div>
      <?php endif ?>


      <?php if (strlen($cie)>0): ?>

        <strong> Diagnóstico CIE10: </strong>  
        <p> <?php echo $cie?> </p> 

      <?php endif ?>


      <?php if (strlen($envejecimiento)>0): ?>

        <strong> Tratamiento: </strong>  
        <p> <?php echo $envejecimiento?> </p> 

      <?php endif ?>


      <?php if (strlen($motivoConsulta)>0): ?>

        <strong> Motivo consulta: </strong>  
        <p> <?php echo $motivoConsulta?> </p> 

      <?php endif ?>


      <?php if (strlen($antecedentes)>0): ?>

        <strong>Antecedentes: </strong>  
        <p> <?php echo $antecedentes?> </p> 

      <?php endif ?>


      <?php if (strlen($antecedentespf)>0): ?> 

        <p> <?php echo $antecedentespf?> </p> 

      <?php endif ?>



      <?php if (strlen( $tratamiento )>0): ?>

        <strong>  $tratamiento  </strong>  
        <p> <?php echo  $tratamiento ?></p> 

      <?php endif ?>


      <?php if (strlen($ComposicionCorpora)>0): ?>

        <strong> Composicion Corporal: </strong>  <p>  Peso: <?php echo $peso?> Altura: <?php echo $altura?> , <?php echo $ComposicionCorpora?></p>

      <?php endif ?>

      <?php if (strlen($rSistema)>0): ?>

        <strong> Revisión por Sistema: </strong>   <p><?php echo $rSistema?> </p>

      <?php endif ?>


      <?php if (strlen($procedimiento)>0): ?>

        <strong> Procedimiento </strong>  
        <p> <?php echo $procedimiento?></p> 

      <?php endif ?>

      <?php if (strlen( $cirugia )>0): ?>

        <strong>  cirugia  </strong>  
        <p> <?php echo  $cirugia ?></p> 

      <?php endif ?>
      <?php if (strlen( $diagnostico5 )>0): ?>

        <strong>  Diagnostico </strong>  
        <p> <?php echo  $diagnostico5 ?></p> 

      <?php endif ?>

      <?php if (strlen($planAtencion)>0): ?>

        <strong> Plan de Atención: </strong> <p> <?php echo $planAtencion?> </p>

      <?php endif ?>

      <?php if (strlen($nota)>0): ?>

        <strong> Nota: </strong>   <p><?php echo $nota?> </p>

      <?php endif ?>

      <?php if ($img11<>''): ?>
        <div class="col-xs-4">
          <h3><strong><label>Antes:</label></strong></h3>
          <img src="historiaClinicaCirugiaPlastica/<?php echo $img11 ?>" style="width: 100%; height: auto;">
        </div>
      <?php endif ?>

      <?php if ($img11<>''): ?>
        <div class="col-xs-4">
          <h3><strong><label>Durante:</label></strong></h3>
          <img src="historiaClinicaCirugiaPlastica/<?php echo $img12 ?>" style="width: 100%; height: auto;">
        </div>
      <?php endif ?>

      <?php if ($img11<>''): ?>
        <div class="col-xs-4">
          <h3><strong><label>Despues:</label></strong></h3>
          <img src="historiaClinicaCirugiaPlastica/<?php echo $img13 ?>" style="width: 100%; height: auto;">
        </div>
      <?php endif ?>

      <div class="col-xs-12"><hr></div>






      <hr>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

  <div class="col-xs-6" align="center">
    <?php echo $Fecha ?> 
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
    <br> _______________________________________<br>
    <?php echo  $nombreF?><br>
    <?php echo $telefonoF?>
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
      <a href="imprimirTratamiento.php?historiaClinica1=<?php echo $historiaClinica1?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Imprimir</a>



    </div>
  </div>
</section>
<!-- /.content -->
<div class="clearfix"></div>
</div>
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





