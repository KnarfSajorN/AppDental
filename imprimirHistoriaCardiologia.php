<?php
date_default_timezone_set('America/Bogota');
//include("conexiones/conexion.php");
//include("funciones/conexiones.php");
include("funciones/funciones.php");
include 'funciones/conn3.php';

$valor             =$_GET['historiaClinica1'];
$historiaClinica1=$_GET['historiaClinica1'];



            $queryList=mysqli_query($conn3,"SELECT * FROM  historiaClinica14_cardiologia where id = $historiaClinica1");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {
              $cliente_id      =$rowMotorizado['cliente_id'];
              $usuario_id      =$rowMotorizado['usuario_id'];
              $Fecha           =$rowMotorizado['Fecha'];

              $Hora                  =$rowMotorizado['Hora'];
              $nopatologicos_cardio        =$rowMotorizado['nopatologicos_cardio'];
              $patologicos_cardio    =$rowMotorizado['patologicos_cardio'];
              $antecedentes_cardio    =$rowMotorizado['antecedentes_cardio'];
              $v1  =$rowMotorizado['procedimiento']; 
              $v2   =$rowMotorizado['interroga']; 
              $v3  =$rowMotorizado['estado']; 
              $v4  =$rowMotorizado['pronostico']; 
              $v5   =$rowMotorizado['diagnostico']; 
             

            }



            $queryList=mysqli_query($conn3,"SELECT * FROM  examenFisicoCardiologia  where historiaClinicacardiologia_id= $valor");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {

              $ComposicionCorporal      =$rowMotorizado['ComposicionCorporal'];
              $estadoGeneral           =$rowMotorizado['estadoGeneral'];
              $estadoConciencia            =$rowMotorizado['estadoConciencia'];
              $ojos         =$rowMotorizado['ojos'];
              $otoscopia         =$rowMotorizado['otoscopia'];
              $cavidadOral              =$rowMotorizado['cavidadOral'];
              $pesa  =$rowMotorizado['peso'];
              $altura    =$rowMotorizado['altura'];
              $imc    =$rowMotorizado['imc'];
              $composicion         =$rowMotorizado['composicion'];

              $cuello      =$rowMotorizado['cuello'];
              $torax           =$rowMotorizado['torax'];
              $corazon           =$rowMotorizado['corazon'];
              $abdomen       =$rowMotorizado['abdomen'];
              $genitoUrinario         =$rowMotorizado['genitoUrinario'];
              $extremidades            =$rowMotorizado['extremidades'];
              $vacularPeriferico =$rowMotorizado['vacularPeriferico'];
              $sistemaNervioso    =$rowMotorizado['sistemaNervioso'];
              $pielAnexos  =$rowMotorizado['pielAnexos'];
              $examenPartesdCuerpo        =$rowMotorizado['examenPartesdCuerpo'];


              $tart     =$rowMotorizado['tart'];
              $temperatura          =$rowMotorizado['temperatura'];
              $fcard           =$rowMotorizado['fcard'];
              $sat      =$rowMotorizado['sat'];
              $fechaHora        =$rowMotorizado['fechaHora'];
              $historia_id           =$rowMotorizado['historia_id'];
              $procedimiento_cardio =$rowMotorizado['procedimiento_cardio'];
              $interrogatorios_cardio  =$rowMotorizado['interrogatorios_cardio'];
              $estado_salud_cardio =$rowMotorizado['estado_salud_cardio'];
              $pronostico_cardio       =$rowMotorizado['pronostico_cardio'];
              $diagnostico_cardio     =$rowMotorizado['diagnostico_cardio'];
  }



           $queryList=mysqli_query($conn3,"SELECT * FROM  config where ID_Usuario = $usuario_id");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {
                
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
  <title> Informe Historia Cardiologica </title>
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
            $empresaNombre.'<br>'.
            $nit.'<br>'.
            $direccion.'<br>'.
            $header;
            ?> 
            
          </h4>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
   
        <!-- /.col -->
        <div class="col-sm-12 invoice-col">
          Datos del  Cliente
          <address>
              <strong>Nombre <?php echo $nombre_cliente ?> </strong><br>
              <strong>RUT <?php echo $CODI_CLIENTE ?> </strong><br>
              <strong>Edad <?php echo $edad_cliente ?> </strong><br>
            
 
          </address>
        </div>
 
      </div>
      
<div class="row">
  <div class="col-md-12">
    <table width="100%" >
      <tr style="font-weight: bold;padding: 4px;margin-top: 20px;margin-bottom: 20px;font-size: 16px">
        <td colspan="6" align="center" height="20">Historia Cardiologica</td>
      </tr>
      <tr>
       <td style="font-weight: bold;">Fecha:</td>
        <td><?php echo $Fecha;?></td>
        <td style="font-weight: bold;">Hora:</td>
        <td><?php echo $Hora;?></td>
        <br>
      </tr>
 

      <tr>
       <tr> <td style="font-weight: bold;">Antecedentes Heredo-Familiares :</td></tr>
        <tr><td ><?php echo  $antecedentes_cardio;?></td></tr>
       
        <tr><td width="100" style="font-weight: bold;">Antecedentes Personales:</td></tr>
        
        <tr><td> Antecedentes Patologicos: <?php echo  $patologicos_cardio;?></td></tr>
        <tr><td >Antecedentes no Patologicos: <?php echo  $nopatologicos_cardio;?></td></tr>
       
      </tr>


      <tr>
          <tr><td style="font-weight: bold;">Examen Fisico:</td></tr>
      <tr>  <td colspan="2"> Peso:<?php echo  $pesa;?></td>
        
        <td colspan="2"> Altura: <?php echo $altura ?></td>
        <td colspan="2"> IMC:<?php echo  $imc;?></td>
         <td colspan="2"> Composicion Corporal:<?php echo  $composicion?></td></tr>
       <tr> <td colspan="2"> TART (mmhg):<?php echo  $tart?></td>
            <td colspan="2"> Temperatura ºC:<?php echo $temperatura ?></td>
            <td colspan="2"> F Card (LPM):<?php echo $fcard?></td>
           <td colspan="2"> SAT02:<?php echo  $sat?></td></tr>
      </tr>

  <tr>
        <td style="font-weight: bold;">Estado General:</td></tr>
      <tr>  <td colspan="2"> <?php echo  $estadoGeneral;?></td></tr>
            <tr><td colspan="2"> Estado de Conciencia: <?php echo $estadoConciencia ?></td></tr>
        <tr><td colspan="2"> Ojos:<?php echo  $ojos ;?></td></tr>
         <tr><td colspan="2"> Otoscopia:<?php echo  $otoscopia?></td></tr>
       <tr> <td colspan="2"> CavidadOral:<?php echo  $cavidadOral?></td></tr>
            <tr><td colspan="2"> Cuello:<?php echo $cuello?></td></tr>
            <tr><td colspan="2"> Torax :<?php echo $torax ?></td></tr>
           <tr><td colspan="2">  Corazon:<?php echo   $corazon?></td></tr>

            <tr>  <td colspan="2"> Abdomen: <?php echo  $abdomen;?></td><tr>
            <tr><td colspan="2"> Genito Urinario: <?php echo $genitoUrinario ?></td></tr>
        <tr><td colspan="2"> Extremidades :<?php echo $extremidades ;?></td></tr>
         <tr><td colspan="2"> vacular Periferico:<?php echo  $vacularPeriferico?></td></tr>
       <tr> <td colspan="2"> Sistema Nervioso :<?php echo  $sistemaNervioso ?></td></tr>
            <tr><td colspan="2"> Piel Anexos :<?php echo $pielAnexos ?></td></tr>
           <tr> <td colspan="2"> Examen Partes Cuerpo:<?php echo $examenPartesdCuerpo?></td></tr>
          </tr>

      </tr>
<tr>
       
      <tr>  <td colspan="2"> <?php echo  $v1;?></td></tr>
      <tr>  <td colspan="2"> <?php echo  $v2;?></td></tr>
      <tr>  <td colspan="2"> <?php echo  $v3;?></td></tr>
      <tr>  <td colspan="2"> <?php echo  $v4;?></td></tr>
      <tr>  <td colspan="2"> <?php echo  $v5;?></td></tr>
            
</tr>

    </table><br>


  </div>
</div>









  <div class="col-xs-6" align="center">
 
  </div>

  <div class="col-xs-6" align="center">
    <?php
  echo  $firmaImg;

  ?>
  <br><br> _______________________________________<br>
  <?php echo $nombreF?><br>
  <?php echo $telefonoF?>
  </div>


  

      <div class="col-xs-12" align="center">
      <?php echo $pieF?><br>
      <?php echo $licenciaF?><br>
      <?php echo 'Direccion '.$direccionF.', Correo'.$emailF;?>
      </div>
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






