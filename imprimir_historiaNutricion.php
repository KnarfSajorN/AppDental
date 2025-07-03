<?php
date_default_timezone_set('America/Bogota');
//include("conexiones/conexion.php");
//include("funciones/conexiones.php");
include("funciones/funciones.php");
include("funciones/funcionesUtilidades.php");
include 'funciones/conn3.php';

            $historiaClinica1 = $_GET['historiaClinica1'];



            $queryList=mysqli_query($conn3,"SELECT * FROM  nutricionAdulto where ID = $historiaClinica1");
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
              $rSistema         =$rowMotorizado['rSistema'];
              $enfermedadActual  =$rowMotorizado['enfermedadActual'];
              $antecedentesPers  =$rowMotorizado['antecedentesPers'];
              $antecedentesFami =$rowMotorizado['antecedentesFami'];
$nutricion =$rowMotorizado['antenutricion'];
$PARAMETROS=$rowMotorizado['parametros'];
$estilo = $rowMotorizado['estiloVida'];
$funcionalidadMuscular= $rowMotorizado['funcionalidadMuscular'];
$anamnesis= $rowMotorizado['anamnesis'];
$consumoH= $rowMotorizado['consumoH'];
$antropometria= $rowMotorizado['antropometria'];
$archivo= $rowMotorizado['archivo'];

  if (strlen($archivo) > 0) 
              {
               $archivo1= '<a href="'.$Base.'/logos/'.$archivo.'"download="Archivo">Descargar Archivo
</a>'; 

              }

 
          }

$queryList=mysqli_query($conn3,"SELECT * FROM  examenFisico where historia_id = $historiaClinica1");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {

              $peso     =$rowMotorizado['peso'];
              $altura    =$rowMotorizado['altura'];
              $imc         =$rowMotorizado['imc'];
               $ComposicionCorporal  = $rowMotorizado['ComposicionCorporal'];
             
              $eg          =$rowMotorizado['estadoGeneral'];
              $conciencia  =$rowMotorizado['estadoConciencia'];
              $ojos    =$rowMotorizado['ojos'];
              $ostocopia    =$rowMotorizado['otoscopia'];
              $cavidad           =$rowMotorizado['cavidadOral'];
              $cuello         =$rowMotorizado['cuello'];
              $torax   =$rowMotorizado['torax'];
              $corazo   =$rowMotorizado['corazon'];
             $abdomen        =$rowMotorizado['abdomen'];
             $urinario =$rowMotorizado['genitoUrinario'];
              $extremidades  =$rowMotorizado['extremidades'];
               $nervioso     =$rowMotorizado['sistemaNervioso'];
              $piel  =$rowMotorizado['pielAnexos'];
              $partes        =$rowMotorizado['examenPartesdCuerpo'];

              $tart         =$rowMotorizado['tart'];
              $tc  =$rowMotorizado['temperatura'];
              $card   =$rowMotorizado['fcard'];
              $sat  =$rowMotorizado['sat'];
             
 $vacularPeriferico    =$rowMotorizado['vacularPeriferico '];            } 

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
 $nombreF      =$rowMotorizado['NOMBRE_USUARIO'];
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
              $seguro                     =$rowMotorizado['seguro'];
              $direccion_cliente          =$rowMotorizado['direccion_cliente'];
                
            }

 
   ?>

	<!DOCTYPE html>
<html> 
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><?php echo $empresaNombre ?> </title>
 <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
<!--<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
 estilos css-->
<!--<link rel="stylesheet" href="https://sievensoftcolombia.com/css/bootstrap.css">
 estilos css-->
<!--<link href="https://sievensoftcolombia.com/css/bootstrap.min.css" rel="stylesheet">
<script src="https://sievensoftcolombia.com/js/jquery-3.2.1.slim.min.js" ></script>
<script src="https://sievensoftcolombia.com/js/popper.min.js" ></script>
<script src="https://sievensoftcolombia.com/js/bootstrap.js"></script>
<link href="https://sievensoftcolombia.com/font/icon.css"  rel="stylesheet">-->


</head>
<body onload="window.print();">
<div class="wrapper">
   <div class="col-md-12">
           
          <div class="box box-solid">
            <!-- /.box-header -->
           <div class="box-body">
            <div class="row">
            </div>
          </div>
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
       
         
          Telefono:  <?php echo 
            $telefonoF
            ?>  
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row ">
   
        <!-- /.col -->
        
          Datos del Paciente:<br>
         <table>
         <tr><td>     <strong>Nombre: <?php echo $nombre_cliente ?> &nbsp&nbsp&nbsp</strong> </td>
            <td>  <strong>Documento: <?php echo $CODI_CLIENTE ?>&nbsp&nbsp&nbsp </strong></td>
           <td>   <strong>Edad: <?php echo calculaedad($fechaNacimiento) ?> </strong></td></tr>
            
 </table>
        
 
 
      </div>
 
        <div class="row">
        <h4 align="center"> CONSULTA NUTRICIÓN ADULTO </h4>
                <div class="col-md-12">
          </div>
        </div>
   

<div>

  <h5> ENTREVISTA INICIAL  <br> <br>
  <?php  if ($motivoConsulta <> '') {$motivoConsulta1 = 'Motivo Consulta: '.$motivoConsulta.'<hr>';} ?>
  <?php  echo $motivoConsulta1  ?>

   <?php  if ($enfermedadActual<> '') {$enfermedadActual1 = 'Enfermedad Actual: '.$enfermedadActual.'<hr>' ;} ?>
  <?php  echo $enfermedadActual1  ?>
  


<h5>REVISION POR SISTEMA  <br>
  <p>  <?php  if ($rSistema<> '') {$rSistema1 = 'Revisión por Sistema'.$rSistema;} ?>
  <?php  echo  $rSistema1?>

 </p>

  <h5><b>ANTECENDENTES </b> <br> 
    <p>
    <?php  if ( $antecedentesPers<> '') { $antecedentesPers1 = 'Antecedentes Personales'. $antecedentesPers;} ?>
     <?php  if ( $antecedentesFami<> '') { $antecedentesFami1 = 'Antecedentes Familiares'. $antecedentesFami;} ?>
  <?php  echo  $antecedentesFami1 ?>
  <?php  echo  $antecedentesPers1 ?>
  <?php  echo  $nutricion ?>

</p>
<br>
<Table> <tr> <td><h5><b>PARAMETROS BIOQUÍMICOS</b></h5> </td> </tr>
  
<tr> <td>   <?php  echo  $PARAMETROS ?> </td> </tr> <br>
 <tr> <td>  <?php  echo  $archivo1.$archivo ?> </td> </tr>
 </table>


<br>
   
<h5><b>ESTILO DE VIDA</b></h5> 
  
  <?php  echo  $estilo?>
<br>


<h5><b>FUNCIONALIDAD MUSCULAR</b></h5> 
  
  <?php  echo $funcionalidadMuscular?>
<br>

<h5><b>ANAMNESIS</b></h5> 
  
  <?php  echo $anamnesis?>
<br>
<Table> <tr> <td><h5><b>  CONSUMO HABITUAL</b></h5> </td> </tr>
  
 <tr> <td> <?php  echo $consumoH?> </td> </tr>
   </table>
<br>

<h5 align="center"><b>ANTROPOMETRÍA COMPLETA</b></h5> 
  
  <?php  echo $antropometria?>
<br>

  <h5>EXAMEN FISICO  <br> 
<p>
 
  <?php echo 
          $peso.'&nbsp'.$altura.'&nbsp '.$imc;?>
  <?php  if ($conciencia <> '') {$conciencia1 = 'Estado conciencia'.$conciencia .'<br>' ;} ?>
  <?php  echo  $conciencia1?>    
  <?php  if ($eg<> '') {$eg1 = 'Estado GENERAL :'.$$eg .'<br>' ;} ?>
  <?php  echo  $eg1?> 
  <?php  if ($ojos<> '') {$ojos1 ='Examen Ojos: '.$ojos .'<br>' ;} ?>
  <?php  echo  $ojos1?> 
  <?php  if ($ostocopia <> '') {$ostocopia1 ='Ostocopia  '.$ostocopia  .'<br>' ;} ?>
  <?php  echo  $ostocopia1?> 
  <?php  if ($cavidad<> '') {$cavidad1 ='Cavidad Oral: '.$cavidad .'<br>' ;} ?>
  <?php  echo  $cavidad1?> 
  <?php  if ($cuello <> '') {$cuello1 ='Cuello: '.$cuello .'<br>' ;} ?>
  <?php  echo  $cuello1?> 
  <?php  if ($torax <> '') {$torax1 ='Torax: '.$torax.'<br>' ;} ?>
  <?php  echo  $torax1?> 
  <?php  if ($corazo  <> '') {$corazo1 ='Corazón:'.$corazo .'<br>' ;} ?>
  <?php  echo  $corazo1?> 
  <?php  if ( $abdomen <> '') { $abdomen1 ='Abdomen: '. $abdomen.'<br>' ;} ?>
  <?php  echo $abdomen1?> 
        
</p>

<h5>DIAGNOSTICO MINISTERIO DE SALUD <br> 
<p>     <?php  if ($diagnostico<> '') {$diagnostico1 = 'Diagnostico: '.$diagnostico ;} ?>
  <?php  echo  $diagnostico1?>

  </p>

<hr>  

<h5>TRATAMIENTO (PLAN DE ATENCION) <br>
<p>  <?php  if ($tratamiento<> '') {$tratamiento1 = 'Tratamiento:'.$tratamiento;} ?>
  <?php  echo  $tratamiento1?>
  
</p>


<!--<h5>INCAPACIDADES  <br>
<p> <?php  if ($incapacidades<> '') {$incapacidades1 = 'Incapacidad:'.$incapacidades ;} ?>
  <?php  echo  $incapacidades1?>
  
  
</p>

<h5>NOTAS O COMENTARIOS <br> 
<p>   <?php  if ($notas<> '') {$notas1 = 'Notas:'.$notas ;} ?>
  <?php  echo  $notas1?> 
  

</p>

<h5>RECETA MEDICA  <br> 
<p>  <?php  if ($recipe <> '') {$recipe1 = 'Receta Medica:'.$recipe  ;} ?>
  <?php  echo $recipe1?>
  
</p>-->



<!--<p><?php  if ($comoTomarlo <> '') {$comoTomarlo1 = 'Indicaciones sobre la receta:'.$comoTomarlo;} ?>
  <?php  echo $comoTomarlo1?>

</p>-->

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

<div class="col-xs-12" >
  <?php echo $Fecha ?> 
  </div>
  <br><br>

<div class="col-xs-6" align="center">
  <?php echo $ciudadPaisF?>
  </div>


  <div class="col-xs-6" align="center">
  <?php
  //echo  $firmaImg;

  ?>
  </div>

  <div class="col-xs-12" align="center">

  <?php
  echo  $firmaImg;
  ?>
  <br>
   _______________________________________<br>
  <?php echo $nombreF?><br>
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
          <a href="imprimirRecipe.php?historiaClinica1=<?php echo $historiaClinica1?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Imprimir</a>
      </div>
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
   </body>
   </html>      
  