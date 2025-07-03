<?php
date_default_timezone_set('America/Bogota');
include("funciones/funciones.php");
include("funciones/funcionesUtilidades.php");


$historiaClinica = $_GET['historiaClinica'];
$idHistoria = $_GET['idHistoria'];
$clienteId = $_GET['clienteId'];

$queryListhc = mysqli_query($conn3, "SELECT * from configTablas where id = $idHistoria ");
$nrowl = mysqli_num_rows($queryListhc);
while ($rowhc = mysqli_fetch_array($queryListhc)) {
  $Tabla = $rowhc['name'];
  $nombre = $rowhc['nombre'];
}


$queryList = mysqli_query($conn3, "SELECT * FROM  $Tabla where id = $historiaClinica");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {

  $cliente_id      = $rowMotorizado['cliente_id'];
  $usuario_id      = $rowMotorizado['usuario_id'];
  $Fecha      = $rowMotorizado['Fecha'];
  $Hora = $rowMotorizado['Hora'];
}

$queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id=$cliente_id");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {

  $usuario_id = $rowMotorizado['usuario_id'];
  $nombre_cliente = $rowMotorizado['nombre_cliente'];
  $celular_cliente = $rowMotorizado['celular_cliente'];
  $ciudad_cliente = $rowMotorizado['ciudad_cliente'];
  $correo_cliente = $rowMotorizado['correo_cliente'];
  $CODI_CLIENTE = $rowMotorizado['CODI_CLIENTE'];
  $id_uso_servicio = $rowMotorizado['id_uso_servicio'];
  $tipo_cliente = $rowMotorizado['tipo_cliente'];
  $fechar = $rowMotorizado['fechar'];
  $fecha_actualizado = $rowMotorizado['fecha_actualizado'];
  $activo = $rowMotorizado['activo'];
  $genero = $rowMotorizado['genero'];
  $direccion_cliente = $rowMotorizado['direccion_cliente'];
  $telefono_cliente = $rowMotorizado['telefono_cliente'];
  $edad_cliente = $rowMotorizado['edad_cliente'];
  $profesion_cliente = $rowMotorizado['profesion_cliente'];
  $acompananteFamiliar = $rowMotorizado['acompananteFamiliar'];
  $telefono_acompanante = $rowMotorizado['telefono_acompanante'];
  $antecedentes = $rowMotorizado['antecedentes'];
}

$nombreF      = $rowMotorizado['nombreF'];
$telefonoF    = $rowMotorizado['telefonoF'];
$direccionF   = $rowMotorizado['direccionF'];
$emailF       = $rowMotorizado['emailF'];
$ciudadPaisF  = $rowMotorizado['ciudadPaisF'];
$licenciaF    = $rowMotorizado['licenciaF'];
$pieF         = $rowMotorizado['pieF'];
$header       = $rowMotorizado['header'];



$queryList = mysqli_query($conn3, "SELECT * FROM  usuarios where ID = $usuario_id");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {

  $empresaNombre      = $rowMotorizado['empresaNombre'];
  $pais               = $rowMotorizado['pais'];

  $ciudad             = $rowMotorizado['ciudad'];
  $direccion          = $rowMotorizado['direccion'];
  $telefono           = $rowMotorizado['telefono'];
  $especialidad        = $rowMotorizado['especialidad'];
  $nit                = $rowMotorizado['nit'];

  $LogoF               = $rowMotorizado['logoF'];
  $firma               = $rowMotorizado['firma'];

  if (strlen($LogoF) > 0) {
    $Logo = '<img src="' . $Base . '/logos/' . $LogoF . '" height="100" width="100%">';
  }


  if (strlen($firma) > 0) {
    $firmaImg = '<img src="' . $Base . '/FirmasReg/' . $firma . '" height="150" width="150">';
  }
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
    $Logo = '<img src="' . $Base . '/logos/' . $LogoF . '" height="100" width="100%">';
  }


  if (strlen($firma) > 0) {
    $firmaImg = '<img src="' . $Base . '/FirmasReg/' . $firma . '" height="150" width="150">';
  }
}




$queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id = $cliente_id");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {

  $nombre_cliente             = $rowMotorizado['nombre_cliente'];
  $CODI_CLIENTE               = $rowMotorizado['CODI_CLIENTE'];
  $fechaNacimiento            = $rowMotorizado['fechaNacimiento'];
  $celular_cliente            = $rowMotorizado['celular_cliente'];
  $seguro                     = $rowMotorizado['seguro'];
  $direccion_cliente          = $rowMotorizado['direccion_cliente'];
  $etnia = $rowMotorizado['etnia'];
  $discapacidad = $rowMotorizado['tipodiscapacidad'];
}


?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $empresaNombre ?> </title>





  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

  <!-- estilos css-->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
  <!-- estilos css-->
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://sievensoftcolombia.com/js/jquery-3.2.1.slim.min.js"></script>
  <script src="https://sievensoftcolombia.com/js/popper.min.js"></script>
  <script src="https://sievensoftcolombia.com/js/bootstrap.js"></script>
  <link href="https://sievensoftcolombia.com/font/icon.css" rel="stylesheet">
  <!--<link rel="stylesheet" type="text/css" href="'.$Base.'/estilopiepagina.css">-->

</head>





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
                <th class="titulo" colspan="4" rowspan="4">
                  <div align="center"><?php echo $header  ?></div>
                  <!--<h9 align="center"> <?php echo  $empresaNombre ?> <?php echo   $direccion ?>  </h9></th>-->
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
                <td width="30%" class="nombrePaciente">Nombre del paciente: <?php echo $nombre_cliente ?></td>
                <td width="20%" class="documento">Documento: <?php echo $CODI_CLIENTE ?></td>
                <td width="30%" class="f.nacimiento">F.Nacimiento: <?php echo  $fechaNacimiento ?></td>
                <td width="20%" class="edad">Edad: <?php echo  calculaedad($fechaNacimiento) ?></td>
              </tr>

              <tr>
                <td class="residencia">Residencia: <?php echo $direccion_cliente  ?></td>
                <!-- <td class="seguro">EPS:<?php echo $seguro  ?></td> -->
                <td class="telefono">Telefono: <?php echo $celular_cliente  ?></td>
                <td class="genero">Genero: <?php echo $genero ?></td>
              </tr>
            </table>
            <table class="tg" border=1 style="undefined;table-layout: fixed; width: 100%">

              <!-- <tr>
                <td width="30%" class="etnia">Etnia: <?php echo $etnia ?></td>
                <td width="70%" class="discapacidad">Discapacidad:<?php echo $discapacidad ?></td>

              </tr> -->
            </table>
          </div>
        </div>
        <div class="row">
          <h4 align="center"> Historia Clinica </h4>
          <div class="col-md-12">
          </div>
        </div>



        <div class="card" style="width: 100%; margin-left: auto; margin-right: auto;">




        </div>

        <div id="accordion" role="tablist" aria-multiselectable="true">
          <div class="card">
            <div class="card-header" role="tab" id="headingOne">
              <h5 class="mb-0">
                <!--<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Historia  Clinica   
        </a>-->
              </h5>
            </div>

            <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
              <div class="card-block">



                <div class="form-row">





                  <?php















                  $queryDetalle = mysqli_query($conn3, "SELECT * FROM  configTablaDetalle where idTabla = $idHistoria order by id asc");
                  $nrowl = mysqli_num_rows($queryDetalle);
                  while ($rowDetalle = mysqli_fetch_array($queryDetalle)) {

                    $idCampo  = $rowDetalle['id'];
                    $div_class  = $rowDetalle['div_class'];
                    $div_align  = $rowDetalle['div_align'];
                    $div_nombre_campo  = $rowDetalle['div_nombre_campo'];
                    $input_type  = $rowDetalle['input_type'];
                    $input_calss  = $rowDetalle['input_calss'];
                    $input_name  = $rowDetalle['input_name'];
                    $input_placeholder  = $rowDetalle['input_placeholder'];
                    $input_id  = $rowDetalle['input_id'];
                    $input_required  = $rowDetalle['input_required'];
                    $input_pattern = $rowDetalle['input_pattern'];
                    $input_onChange  = $rowDetalle['input_onChange'];
                    $select_table  = $rowDetalle['select_table'];
                    $style  = $rowDetalle['style'];
                    $tipoCampo  = $rowDetalle['tipoCampo'];
                    $input_maxlength  = $rowDetalle['input_maxlength'];
                    $input_oninput  = $rowDetalle['input_oninput'];
                    $div_nombre_valor  = $rowDetalle['div_nombre_valor'];
                    $input_value  = $rowDetalle['input_value'];


                    if ($tipoCampo == 'text') {
                      $valor = 0;


                      $queryList = mysqli_query($conn3, "SELECT $input_name FROM  $Tabla where id = $historiaClinica");
                      $nrowl = mysqli_num_rows($queryList);
                      while ($rowMotorizado = mysqli_fetch_array($queryList)) {

                        $valor      = $rowMotorizado[$input_name];
                      }

                      if (strlen($valor) > 1) {

                        echo '<p>' . $div_nombre_campo . ':' . $valor . '<p>';
                      }
                    }

                    if ($tipoCampo == 'number') {




                      $valor = 0;
                      $queryList = mysqli_query($conn3, "SELECT $input_name FROM  $Tabla where id = $historiaClinica");
                      $nrowl = mysqli_num_rows($queryList);
                      while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                        $valor      = $rowMotorizado[$input_name];
                      }

                      if (strlen($valor) > 1) {


                        echo '<p>' . $div_nombre_campo . ': ' . $valor . ' <p>';
                      }
                    }

                    if ($tipoCampo == 'textarea') {

                      $valor = 0;

                      $queryList = mysqli_query($conn3, "SELECT $input_name FROM  $Tabla where id = $historiaClinica");
                      $nrowl = mysqli_num_rows($queryList);
                      while ($rowMotorizado = mysqli_fetch_array($queryList)) {

                        $valor      = $rowMotorizado[$input_name];
                      }

                      if (strlen($valor) > 1) {



                        echo '<p>' . $div_nombre_campo . ' :' . $valor . '<p>';
                      }
                    }







                    if ($tipoCampo == 'select_si_no') {

                      $valor = 0;

                      $queryList = mysqli_query($conn3, "SELECT $input_name FROM  $Tabla where id = $historiaClinica");
                      $nrowl = mysqli_num_rows($queryList);
                      while ($rowMotorizado = mysqli_fetch_array($queryList)) {

                        $valor      = $rowMotorizado[$input_name];
                      }

                      if (strlen($valor) > 1) {

                        echo '<p>' . $div_nombre_campo . ': ' . $valor . '<p>';
                      }
                    }






                    if ($tipoCampo == 'select') {


                      $valor = 0;

                      $queryList = mysqli_query($conn3, "SELECT $input_name FROM  $Tabla where id = $historiaClinica");
                      $nrowl = mysqli_num_rows($queryList);
                      while ($rowMotorizado = mysqli_fetch_array($queryList)) {

                        $valor      = $rowMotorizado[$input_name];
                      }

                      if (strlen($valor) > 1) {



                        echo '<p>' . $div_nombre_campo . ': ' . $valor . '<p>';
                      }
                    }







                    if ($tipoCampo == 'separador') {
                      $div = 'separador' . rand(1, 999);


                      echo '<p align= "center"> <strong> ' . $div_nombre_campo . '</strong><p>';
                    }
                  }
















                  ?>
                  <div align="center">
                    <?php
                    echo  $firmaImg;

                    ?>
                    <br>_______________________________________<br>
                    <?php echo  $NUSUARIO ?><br>
                    <?php echo $especialidad ?><br>
                    <b>* Documento firmado digitalmente *</b>
                  </div>








                  <hr>
                </div>
              </div>
              <div class="col-xs-12" align="center">
                <footer style="width:100%; margin-left: 0px;">


                  <div class="copyright" style="background-color: #0d47a1;">
                    <div class="container-fluid" style="background-color: #0d47a1; color: #bbdefb;">
                      <p> <?php echo $pieF ?></p>

                    </div>
                  </div>
                </footer>
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