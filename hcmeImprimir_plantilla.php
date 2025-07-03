<?php

date_default_timezone_set('America/Bogota');
include("funciones/conn3.php");
include("funciones/funciones.php");
include("funciones/funcionesUtilidades.php");

$conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));

$historiaClinica1 = ($_GET['hC'] != '' ? decrypt($_GET['hC']) : $_GET['historiaClinica1']);

$queryList = mysqli_query($conn3, "SELECT * FROM   historiaClinica5 where ID = $historiaClinica1");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {

  $envejecimiento      = $rowMotorizado['envejecimiento'];
  $cirugia      = $rowMotorizado['cirugia'];
  $antecedentespf     = $rowMotorizado['antecedentespf'];
  $antecedentes     = $rowMotorizado['antecedentes'];


  $tratamiento           = $rowMotorizado['tratamiento'];

  $tratamientoResumen         = $rowMotorizado['tratamientoResumen'];
  $planAtencion  = $rowMotorizado['planAtencion'];

  $procedimiento     = $rowMotorizado['procedimiento'];
  $planAtencion     = $rowMotorizado['planAtencion'];
  $abono           = $rowMotorizado['pagoAbono'];
  $nota          = $rowMotorizado['notas'];
  $peso    = $rowMotorizado['peso'];
  $altura   = $rowMotorizado['altura'];
  $imc   = $rowMotorizado['imc'];

  $ComposicionCorpora         = $rowMotorizado['ComposicionCorporal'];
  $diagnostico5   = $rowMotorizado['diagnostico5'];
  $rSistema   = $rowMotorizado['rSistema'];
  $motivoConsulta = $rowMotorizado['motivoConsulta'];
  $usuario_id = $rowMotorizado['usuario_id'];
  $cliente_id = $rowMotorizado['cliente_id'];
  $cie = $rowMotorizado['CIE10'];

  $imagen = $rowMotorizado['imagen'];
  $notaImagen = $rowMotorizado['notaImagen'];
  $antP = $rowMotorizado['antP'];
  $antF = $rowMotorizado['antF'];
  $img11 = $rowMotorizado['img11'];
  $img12 = $rowMotorizado['img12'];
  $img13 = $rowMotorizado['img13'];
}

$queryList = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = $usuario_id");
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

  $LogoF               = $rowMotorizado['logoF'];
  $firma               = $rowMotorizado['firma'];

  if (strlen($LogoF) > 0) {
    $Logo = "<img src='{$Base}/logos/{$LogoF}' style='height: 3.5cm;width: auto;'>";
  }


  if (strlen($firma) > 0) {
    $firmaImg = '<img src="'.$Base.'FirmasReg/' . $firma . '" height="100" width="200">';
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
  $edad_cliente               = $rowMotorizado['edad_cliente'];
  $fechaNacimiento            = $rowMotorizado['fechaNacimiento'];

  $direccion_cliente = $rowMotorizado['direccion_cliente'];
    $entidadSalud = funcionMaster($rowMotorizado['entidad_id'],'id','Nombre','Rips_Entidades');
    $celular_cliente = $rowMotorizado['celular_cliente'];
    $genero = $rowMotorizado['genero'];

    if ($genero == "M") {
        $genero = "Masculino";
    } elseif ($genero == "F") {
        $genero = "Femenino";
    }
}


?>
<!-- 

<!DOCTYPE html>
<html>

<head> -->
    <!--<link rel="stylesheet" href="css/Impresion/estructura_impresion.css">
    <link rel="stylesheet" href="css/Impresion/bootstrap_5.1.1.min.css">
    <link rel="stylesheet" href="css/Impresion/bootstrap-print.css" media="print">-->
<!-- </head>

<body>   -->
                    <table class="table" style="width: 100%;margin-top: 3px;">
                            <tr>
                                <td width="35%">
                                    <b>Nombre:</b> <?php echo $nombre_cliente ?> 
                                </td>
                                <td width="30%">
                                    <b>Documento:</b> <?php echo $CODI_CLIENTE ?>
                                </td>
                            </tr>
                            <tr>
                                <td width="20%">
                                    <b>F.Nacimiento:</b> <?php echo  $fechaNacimiento ?>
                                </td>
                                <td width="15%">
                                    <b>Edad:</b> <?php echo  CalculoEdadPaciente($fechaNacimiento); ?>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <b>Residencia:</b> <?php echo $direccion_cliente  ?>
                                </td>
                                <td>
                                    <b>EPS:</b> <?php echo $entidadSalud  ?>
                                </td>
                            </tr>
                            <tr style="border-bottom-width: 1px;">
                                <td>
                                    <b>Teléfono:</b> <?php echo $celular_cliente ?>
                                </td>
                                <td>
                                    <b>Género:</b> <?php echo $genero ?>
                                </td>
                            </tr>
                        </table>

                        <hr style="border-top: 1px solid black;opacity: 1;">


      <div class="row">
        <div class="col-xs-12">
          <hr>

          <p>
            <!-- Tratamiento <?php e_servicios($tratamiento) ?> -->
            <br>
            <?php echo $descripcion ?>
          </p>
          <!-- Copago: <?php echo $abono ?> -->
          <hr>
          <?php if ($imagen <> '') : ?>
            <div class="col-xs-12 center text-center">
              <h2><strong>Gráfico</strong></h2>
              <img src="<?php echo $imagen ?>" style="width: 70%; height: auto;">
              <br>
              <strong> Notas Gráfico: </strong>
              <p> <?php echo $notaImagen ?> </p>
              <hr>
            </div>
          <?php endif ?>


          <?php if (strlen($cie) > 0) : ?>

            <strong> Diagnóstico CIE10: </strong>
            <p> <?php echo $cie ?> </p>

          <?php endif ?>


          <?php if (strlen($envejecimiento) > 0) : ?>

            <strong> Tratamiento: </strong>
            <p> <?php echo $envejecimiento ?> </p>

          <?php endif ?>


          <?php if (strlen($motivoConsulta) > 0) : ?>

            <strong> Motivo consulta: </strong>
            <p> <?php echo $motivoConsulta ?> </p>

          <?php endif ?>


          <?php if (strlen($antecedentes) > 0) : ?>

            <strong>Antecedentes: </strong>
            <p> <?php echo $antecedentes ?> </p>

          <?php endif ?>


          <?php if (strlen($antecedentespf) > 0) : ?>

            <p> <?php echo $antecedentespf ?> </p>

          <?php endif ?>



          <?php if (strlen($tratamiento) > 0) : ?>

            <strong> $tratamiento </strong>
            <p> <?php echo  $tratamiento ?></p>

          <?php endif ?>


          <?php if (strlen($ComposicionCorpora) > 0) : ?>

            <strong> Composición Corporal: </strong>
            <p> Peso: <?php echo $peso ?>, Altura: <?php echo $altura ?> , IMC: <?php echo $imc ?>, <?php echo $ComposicionCorpora ?></p>

          <?php endif ?>

          <?php if (strlen($rSistema) > 0) : ?>

            <strong> Revisión por Sistema: </strong>
            <p><?php echo $rSistema ?> </p>

          <?php endif ?>


          <?php if (strlen($procedimiento) > 0) : ?>

            <strong> Procedimiento </strong>
            <p> <?php echo $procedimiento ?></p>

          <?php endif ?>

          <?php if (strlen($cirugia) > 0) : ?>

            <strong> Cirugía </strong>
            <p> <?php echo  $cirugia ?></p>

          <?php endif ?>
          <?php if (strlen($diagnostico5) > 0) : ?>

            <strong> Diagnóstico </strong>
            <p> <?php echo  $diagnostico5 ?></p>

          <?php endif ?>

          <?php if (strlen($planAtencion) > 0) : ?>

            <strong> Plan de Atención: </strong>
            <p> <?php echo $planAtencion ?> </p>

          <?php endif ?>

          <?php if (strlen($nota) > 0) : ?>

            <strong> Nota: </strong>
            <p><?php echo $nota ?> </p>

          <?php endif ?>

          <?php if ($img11 <> '') : ?>
            <div class="col-xs-4">
              <h3><strong><label>Antes:</label></strong></h3>
              <img src="historiaClinica5/<?php echo $img11 ?>" style="width: 100%; height: auto;">
            </div>
          <?php endif ?>

          <?php if ($img11 <> '') : ?>
            <div class="col-xs-4">
              <h3><strong><label>Durante:</label></strong></h3>
              <img src="historiaClinica5/<?php echo $img12 ?>" style="width: 100%; height: auto;">
            </div>
          <?php endif ?>

          <?php if ($img11 <> '') : ?>
            <div class="col-xs-4">
              <h3><strong><label>Después:</label></strong></h3>
              <img src="historiaClinica5/<?php echo $img13 ?>" style="width: 100%; height: auto;">
            </div>
          <?php endif ?>

          <div class="col-xs-12">
            <hr>
          </div>






          <hr>
        </div>
        <!-- /.col -->

      <div class="col-xs-6" align="center">
        <?php echo $Fecha ?>
      </div>

      <div class="col-xs-6" align="center">
        <?php echo $ciudadPaisF ?>
      </div>

      <div class="col-xs-6" align="center">

      </div>

      <div class="col-xs-6" align="center">

        <?php
        echo  $firmaImg;

        ?>
        <br> _______________________________________<br>
        <?php echo  $nombreF ?><br>
        <?php echo $telefonoF ?>
      </div>

<!-- division -->
<!-- 
        <table>
            <thead>
                <tr>
                    <td> -->
                        <!--place holder for the fixed-position header-->
                        <!-- <div class="page-header-space"></div>
                    </td>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td> -->
                        <!--*** CONTENT GOES HERE ***-->


















                        


        <!-- </div> -->
        <!-- cierre del page-->
        <!-- </td>
        </tr>
        </tbody>

        <tfoot>
            <tr>
                <td> -->
                    <!--place holder for the fixed-position footer-->
                    <!-- <div class="page-footer-space"></div>
                </td>
            </tr>
        </tfoot>

        </table>

</body>

</html> -->