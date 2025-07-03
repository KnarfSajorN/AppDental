<?php
date_default_timezone_set('America/Bogota');
include("funciones/funciones.php");
include("funciones/funcionesUtilidades.php");
include("funciones/conn3.php");

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
              $paraClinicos  =$rowMotorizado['paraClinicos'];
              $remision  =$rowMotorizado['remision'];
              $enfermedadActual  =$rowMotorizado['enfermedadActual'];
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
              $cie10_5=$rowMotorizado['cie10_5'];
            $cie10_6=$rowMotorizado['cie10_6']; 
            $cie10_7=$rowMotorizado['cie10_7']; 
            $cie10_8=$rowMotorizado['cie10_8']; 
            $cie10_9=$rowMotorizado['cie10_9']; 
            $cie10_10=$rowMotorizado['cie10_10']; 

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

                $LogoF           =$rowMotorizado['logoF'];
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
 

            $queryList=mysqli_query($conn3,"SELECT * FROM  usuarios where ID = $usuario_id");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {

              $empresaNombre      =$rowMotorizado['empresaNombre'];
              $Nombre      =$rowMotorizado['NOMBRE_USUARIO'];
              $pais               =$rowMotorizado['pais'];

              $ciudad             =$rowMotorizado['ciudad'];
              $direccion          =$rowMotorizado['direccion'];
              $telefono           =$rowMotorizado['telefono'];
              $especialidad               =$rowMotorizado['especialidad'];
              

              $nit                =$rowMotorizado['nit'];

            }

    $queryList=mysqli_query($conn3,"SELECT * FROM  cliente where cliente_id = $cliente_id");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {

              $nombre_cliente             =$rowMotorizado['nombre_cliente'];
              $CODI_CLIENTE               =$rowMotorizado['CODI_CLIENTE'];
             $edad               =$rowMotorizado['edad_cliente'];
              $fechaNacimiento               =$rowMotorizado['fechaNacimiento'];
           $telefono                =$rowMotorizado['celular_cliente'];
                
            } 

 
$Logoe = '<img src="'.$Base.'logos/encabezadoreceta.png" height="100" width="100%">'; 
 

   $cie1=mysqli_query($conn3,"SELECT * FROM historiaClinica9_Quirurgico_Cie10 as hc, cie10 as cie10 WHERE hc.usuario_id=$usuario_id and hc.historiaClinica9_id='$historiaClinica1' AND cie10.codigo=hc.codigo and hc.cliente_id=$cliente_id ");

 
   ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> <?php echo $empresaNombre ?>   </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?= $Base ?>bootstrap/css/bootstrap.min.css">
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
    

<div class="row table-responsive" width="100%">
  <div class="row">
<div class="col-xs-5">
<?php echo $Logo ?>
</div>
<div align="right" 

class="col-xs-6">
  <BR> <h4>
 Dr. Nombre<BR>
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
   <div class="col-md-12">
        <!-- /.col -->
        <div class="col-xs-8 ">
         <h4> Historia Clinica</h4>
          <address>
              <strong>Nombres y Apellidos:  <?php echo $nombre_cliente.'&nbsp&nbsp'?> </strong><br>
             
              <strong>Edad :<?php echo calculaedad($fechaNacimiento).'&nbsp&nbsp&nbsp&nbsp'?>   # de identificacion: <?php echo $CODI_CLIENTE.'&nbsp&nbsp' ?>  </strong> <br><strong>Fecha: <?php echo $fechaRegistro.'&nbsp&nbsp'?> </strong> <br>

                      </address>
        </div>
        
 
 
      </div>   </div>


 <div class="col-md-12">

              <div class="row table-responsive" width="100%">

                <div class="col-md-12">
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
          
  <h5> ENTREVISTA INICIAL  <br> <br>
   
  <?php  if ($motivoConsulta <> '') {$motivoConsulta1 = 'Motivo Consulta: '.$motivoConsulta.'<hr>';} ?>
  <?php  echo $motivoConsulta1  ?>

   <?php  if ($enfermedadActual<> '') {$enfermedadActual1 = 'Enfermedad Actual: '.$enfermedadActual.'<hr>' ;} ?>
  <?php  echo $enfermedadActual1  ?>


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
<h5>TRATAMIENTO (PLAN DE ATENCION) <br>
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


</div>
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

                 
                  


              </div>
              </div>

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






