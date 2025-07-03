<?php
date_default_timezone_set('America/Bogota');
//include("conexiones/conexion.php");
//include("funciones/conexiones.php");
include("funciones/funciones.php");
include("funciones/funcionesUtilidades.php");
include 'funciones/conn3.php';

            $historiaClinica1 = $_GET['historiaClinica1'];



            $queryList=mysqli_query($conn3,"SELECT * FROM  historiaClinica1 where ID = $historiaClinica1");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {

              $cliente_id      =$rowMotorizado['cliente_id'];
              $usuario_id      =$rowMotorizado['usuario_id'];
              $Fecha           =$rowMotorizado['Fecha'];

              $Hora            =$rowMotorizado['Hora'];
              $motivoConsulta  =$rowMotorizado['motivoConsulta'];
              $analisis  =$rowMotorizado['analisis'];
              $diagnostico     =$rowMotorizado['diagnostico'];
              $tratamiento     =$rowMotorizado['tratamiento'];
              $notas           =$rowMotorizado['notas'];
              $recipe          =$rowMotorizado['recipe'];
              $comoTomarlo     =$rowMotorizado['comoTomarlo'];
              $incapacidades   =$rowMotorizado['incapacidades'];
              $rSistema         =$rowMotorizado['rSistema'];
              $enfermedadActual  =$rowMotorizado['enfermedadActual'];
              $paraClinicos  =$rowMotorizado['paraClinicos'];
              $remision  =$rowMotorizado['remision'];
              $antecedentesPers  =$rowMotorizado['antecedentesPers'];
              $antecedentesFami =$rowMotorizado['antecedentesFami'];
              $fechaC =$rowMotorizado['fechaC'];
                  $cie10=$rowMotorizado['cie10'];

          }






            $queryList=mysqli_query($conn3,"SELECT * FROM  informacion_rips  where id_historia = $historiaClinica1");
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
              $telefono           =$rowMotorizado['whatsapp'];
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
              $entidadSalud                     =$rowMotorizado['entidadSalud'];
              $genero                     =$rowMotorizado['genero'];
              $direccion_cliente          =$rowMotorizado['direccion_cliente'];
              $etnia=$rowMotorizado['etnia'];
              $discapacidad=$rowMotorizado['tipodiscapacidad'];
          

                
            }
$cie1=mysqli_query($conn3,"SELECT * FROM historiaClinica9_Quirurgico_Cie10 as hc, cie10 as cie10 WHERE hc.usuario_id=$usuario_id and hc.historiaClinica9_id='$historiaClinica1' AND cie10.codigo=hc.codigo and hc.cliente_id=$cliente_id ");

//ECHO "SELECT * FROM historiaClinica9_Quirurgico_Cie10 as hc, cie10 as cie10 WHERE hc.usuario_id=$usuario_id and hc.historiaClinica9_id='$historiaClinica1' AND cie10.codigo=hc.codigo and hc.cliente_id=$cliente_id ";

 
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
 <!--<link rel="stylesheet" href="style.css">
   <!--<link rel="stylesheet" type="text/css" href="https://medicalsoftplus.com/co131/estilopiepagina.css">-->

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
          <div class="page-header" style="text-align: center">
  
  <div class="row">

                  <div class="col-md-12">
                
                  <table class="tg" style="undefined;table-layout: fixed; width: 100%">
                  <colgroup>
<col style="width:  100%">
<col style="width:  100%">
<col style="width:  100%">
<col style="width:  100%">
</colgroup>

  <tr>
    <th class="Logo" rowspan="4" align="center"><?php echo $Logo ?> </th>
    <th class="titulo" colspan="4" rowspan="4" ><div align="center"><?php echo $header  ?></div>
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
    <td  width="50%" class="nombrePaciente"><h6>Nombre del paciente: <?php echo $nombre_cliente ?> </h6></td>
    <td  width="15%" class="documento"><h6>Documento: <?php echo $CODI_CLIENTE ?> </h6></td>
    <td width="15%"  class="edad"><h6>Edad:  <?php echo  calculaedad($fechaNacimiento) ?> </h6> </td>
    <td  width="20%" class="f.nacimiento"><h6>F.Nacimiento: <?php echo  $fechaNacimiento ?> </h6></td>

  </tr>
                
  <tr>
    <td class="residencia"><h6>Residencia: <?php echo $direccion_cliente?></h6></td>
    <td class="seguro"><h6>EPS:<?php echo $entidadSalud  ?> </h6></td>
    <td class="genero"><h6>Genero: <?php echo $genero?></h6></td>
     <td class="telefono"><h6>Telefono: <?php echo $celular_cliente?></h6></td>
  </tr></table>
 
</div>
</div></div>



  
        <div class="row">
        <h4 align="center"> CONSULTA GENERAL </h4>
                <div class="col-md-12">
          </div>
        </div>
   

<div>
  
 <table width="100%">
          <tr>
            
            <td  style="font-weight: bold;">Diágnostico CIE10</td><td></td>
          </tr>
          <tr>
   
      <tr> <td> <?php  echo $cie10_1 ?></td> </tr>
      <tr> <td> <?php  echo $cie10_2 ?></td> </tr>
      <tr> <td> <?php  echo $cie10_3 ?></td> </tr>
      <tr> <td> <?php  echo $cie10_4 ?></td> </tr>
    </table>
      
    
  <h5> ENTREVISTA INICIAL  <br> <br>
   
  <?php  if ($motivoConsulta <> '') {$motivoConsulta1 = 'Motivo Consulta: '.$motivoConsulta.'<hr>';} ?>
  <?php  echo $motivoConsulta1  ?>

   <?php  if ($enfermedadActual<> '') {$enfermedadActual1 = 'Enfermedad Actual: '.$enfermedadActual.'<hr>' ;} ?>
  <?php  echo $enfermedadActual1  ?>
  </div>


<h5>REVISION POR SISTEMA  <br><div align="justify">
  <p>  <?php  if ($rSistema<> '') {$rSistema1 = 'Revisión por Sistema'.$rSistema;} ?>
  <?php  echo  $rSistema1?>
</p>
 </p>

  <h5>ANTECENDENTES  <br> <div align="justify">
    <p>
    <?php  if ( $antecedentesPers<> '') { $antecedentesPers1 = 'Antecedentes Personales'. $antecedentesPers;} ?>
  <?php  echo  $antecedentesPers1 ?>

</p>
<br>
<p>
    <?php  if ( $antecedentesFami<> '') { $antecedentesFami1 = 'Antecedentes Familiares'. $antecedentesFami;} ?>
  <?php  echo  $antecedentesFami1 ?>
</div>
</p>

  <h5>EXAMEN FISICO  <br> 
<p>
 
 
  <?php  if ($peso <> '') {$peso1 = 'Peso :'.$peso.'&nbsp';} ?>
  <?php  echo  $peso1?> 
  <?php  if ($altura <> '') {$altura1 = 'Altura :'.$altura.'&nbsp';} ?>
  <?php  echo  $altura1?> 
  <?php  if ($imc <> '') {$imc1 = 'Imc :'.$imc;} ?>
  <?php  echo  $imc1?> <br>
   <?php  if ($tart <> '') {$tart1 = 'Otros:'.$tart.'&nbsp';} ?>
  <?php  echo  $tart1?> <br>
  <?php  if ($conciencia <> '') {$conciencia1 = 'Estado conciencia'.$conciencia .'<br>' ;} ?>
  <?php  echo  $conciencia1?>    
  <?php  if ($eg<> '') {$eg1 = 'Estado General :'.$eg.'<br>' ;} ?>
  <?php  echo  $eg1?> 
  <?php  if ($ojos<> '') {$ojos1 ='Examen Ojos: '.$ojos.'<br>' ;} ?>
  <?php  echo  $ojos1?> 
  <?php  if ($ostocopia <> '') {$ostocopia1 ='Ostocopia  '.$ostocopia  .'<br>' ;} ?>
  <?php  echo  $ostocopia1?> 
  <?php  if ($cavidad<> '') {$cavidad1 ='Cavidad Oral: '.$cavidad .'<br>' ;} ?>
  <?php  echo  $cavidad1?> 
  <?php  if ($cuello <> '') {$cuello1 ='Cuello: '.$cuello.'<br>' ;} ?>
  <?php  echo  $cuello1?> 
  <?php  if ($torax <> '') {$torax1 ='Torax: '.$torax.'<br>' ;} ?>
  <?php  echo  $torax1?> 
  <?php  if ($corazo  <> '') {$corazo1 ='Corazón:'.$corazo .'<br>' ;} ?>
  <?php  echo  $corazo1?>
  <?php  if ( $abdomen <> '') { $abdomen1 ='Abdomen: '. $abdomen.'<br>' ;} ?>
  <?php  echo $abdomen1?> 

  <?php  if ( $urinario <> '') { $urinario1 ='Sistema Urinario: '.$urinario.'<br>' ;} ?>
  <?php  echo $urinario1?> 
  <?php  if ( $extremidades <> '') {$extremidades1 ='Extremidades: '.$extremidades.'<br>' ;} ?>
  <?php  echo $extremidades1?> 
  <?php  if ( $nervioso<> '') {$nervioso1 ='Sistema Nervioso: '.$nervioso.'<br>' ;} ?>
  <?php  echo $nervioso1?> 
   <?php  if ($piel<> '') {$piel1 ='Piel y Anexos: '.$piel.'<br>' ;} ?>
  <?php  echo $piel1?> 
        
        
</p>

<p>     <?php  if ($partes<> '') {$partes1 = 'Examénes de las partes del cuerpo: '.$partes;} ?>
  <?php  echo  $partes1?>

  </p>

<p>     <?php  if ($analisis<> '') {$ana = 'Análisis: '.$analisis ;} ?>
  <?php  echo  $ana?>

  </p>


<p>     <?php  if ($diagnostico<> '') {$diagnostico1 = 'Impresiones Diágnosticas: '.$diagnostico ;} ?>
  <?php  echo  $diagnostico1?>

  </p>

  <p>     <?php  if ($diagnosticoMsalud<> '') {$diagnosticoMsalud1 = 'Diagnóstico del ministerio de Salud: '.$diagnosticoMsalud;} ?>
  <?php  echo  $diagnosticoMsalud1?>

  </p>



<p><?php  if ($finalidad_consulta<> '') {$finalidad_consulta1 = 'Finalidad de la Consulta:'.$finalidad_consulta;} ?>
  <?php  echo $finalidad_consulta1?>

</p>

<p><?php  if ($causa_externa<> '') {$causa_externa1 = 'Causa Externa:'.$causa_externa;} ?>
  <?php  echo $causa_externa1?>

</p>
<h5>PROCEDIMIENTOS</h5>  <br>
<p><?php  if ($CUPS<> '') {$CUPS1 = 'Código del procedimiento:'.$CUPS;} ?>
  <?php  echo $CUPS1?>

</p>

<p><?php  if ($ambito_procedimiento<> '') {$ambito_procedimiento1 = 'Ámbito del procedimiento:'.$ambito_procedimiento;} ?>
  <?php  echo $ambito_procedimiento1?>

</p>

<p><?php  if ($finalidad_procedimiento<> '') {$finalidad_procedimiento1 = 'Finalidad del procedimiento:'.$finalidad_procedimiento;} ?>
  <?php  echo $finalidad_procedimiento1?>

</p>

  <p><?php  if ($realizacion_quirurgico<> '') {$realizacion_quirurgico1 = 'Forma de realización del acto quirúrgico:'.$realizacion_quirurgico;} ?>
  <?php  echo $realizacion_quirurgico1?>

</p>

<p><?php  if ($cie10_complicacion<> '') {$cie10_complicacion1 = 'Código del Diagnóstico de la Complicacion:'.$cie10_complicacion;} ?>
  <?php  echo $cie10_complicacion1?>

</p>
           
             

<hr>  
<div align="justify">
<h5>TRATAMIENTO (PLAN DE ATENCION) Y REMISIÓN<br>
<p>  <?php  if ($tratamiento<> '') {$tratamiento1 = 'Tratamiento:'.$tratamiento;} ?>
  <?php  echo  $tratamiento1?>
  
</p>
<p>  <?php  if ($paraClinicos<> '') {$paraClinicos1 = ''.$paraClinicos;} ?>
  <?php  echo  $paraClinicos1?>
  
</p>

<p>  <?php  if ($remision<> '') {$remision1 = ''.$remision;} ?>
  <?php  echo  $remision1?>
  
</p>

<h5>INCAPACIDADES  <br>
<p> <?php  if ($incapacidades<> '') {$incapacidades1 = 'Incapacidad:'.$incapacidades ;} ?>
  <?php  echo  $incapacidades1?>
  
  
</p>

<h5>NOTAS O COMENTARIOS <br> 
<p>   <?php  if ($notas<> '') {$notas1 = 'Notas:'.$notas ;} ?>
  <?php  echo  $notas1?> 
  

</p>

<!--<h5>RECETA MEDICA  <br> -->
<p>  <?php  if ($recipe <> '') {$recipe1 = 'Receta Medica:'.$recipe  ;} ?>
  <?php  echo $recipe1?>
  
</p>



<p><?php  if ($comoTomarlo <> '') {$comoTomarlo1 = 'Indicaciones sobre la receta:'.$comoTomarlo;} ?>
  <?php  echo $comoTomarlo1?>

</p>











</div>

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
  <?php
 // echo  $firmaImg;

  ?>
  </div>

               <div class="col-xs-6" align="center">
  <?php
  echo  $firmaImg;

  ?>
  <br>_______________________________________<br>
  <?php echo $nombreF?><br>
  <?php echo $especialidad?><br>
  <b>* Documento firmado digitalmente *</b>
  </div>

  </div>


 </div>

  
     
   </div>
          </div>
        </div>
      </div>
     
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
  