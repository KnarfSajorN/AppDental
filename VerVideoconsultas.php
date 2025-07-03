<?php
date_default_timezone_set('America/Bogota');
include("funciones/funciones.php");

include("funciones/funcionesUtilidades.php");
include("funciones/conn3.php");





$desde = $_POST['desde'];
$hasta = $_POST['hasta'];
$ID = $_POST['ID'];


$clienteId = $_POST['clienteId'];





$queryList = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = $ID");
// $nrowl = mysqli_num_rows($queryList);
if ($queryList) {
  while ($rowMotorizado = mysqli_fetch_array($queryList)) {

    $empresaNombre      = $rowMotorizado['nombreF'];
    $LogoF               = $rowMotorizado['logoF'];

    if (strlen($LogoF) > 0) {
      $Logo = '<img src="'.$Base.'logos/' . $LogoF . '" style="height:3cm; width:auto;">';
    }


    if (strlen($firma) > 0) {
      $firmaImg = '<img src="'.$Base.'FirmasReg/' . $firma . '" height="150" width="150">';
    }
  }
}


$queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id = $clienteId");
// $nrowl = mysqli_num_rows($queryList);
if ($queryList) {
  while ($rowMotorizado = mysqli_fetch_array($queryList)) {

  $nombre_cliente             = $rowMotorizado['nombre_cliente'];
  $CODI_CLIENTE               = $rowMotorizado['CODI_CLIENTE'];
  $edad               = $rowMotorizado['edad_cliente'];
  $fechaNacimiento               = $rowMotorizado['fechaNacimiento'];
  $telefono                = $rowMotorizado['celular_cliente'];
  $seguro                     = $rowMotorizado['seguro'];
  $direccion_cliente          = $rowMotorizado['direccion_cliente'];
  $genero                     = $rowMotorizado['genero'];
  }
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

<body>
  <!-- Main content -->
  <div class="row no-print">
    <div class="col-xs-12">
      <a onclick="window.history.back();"  class="btn btn-default"> Regresar</a>
      <a onclick="window.print();" class="btn btn-default"><i class="fa fa-print"></i> Imprimir</a>
    </div>
  </div>
  <!-- title row -->
  <div class="row">

    <div class="col-xs-3">
      <h2>
        <?php echo $Logo ?>

      </h2>
    </div>
    <div class="col-xs-9" align="center">
      <i>
        <h2>
          <?php echo
          $empresaNombre
          ?> </h2>
      </i>




    </div>
    <!-- /.col -->
  </div>
  <!-- info row -->
  <div class="row ">
    <div class="col-md-12">


      <table align="center">
        <tr>
          <td>
            <h3><b> REPORTE DE VIDEO CONSULTAS</b></h3>
          </td>
        </tr>
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped w-100" style="width: 100%;">
            <thead>
              <tr>
                <th class="text-center">Fecha-Hora</th>
                <th class="text-center">Paciente</th>
                <th class="text-center">Motivo Consulta</th>


              </tr>
            </thead>


            <tbody>

              <!--<td>
          <tr> Fecha</tr>
<tr> Peso</tr> <br>
<tr>Talla</tr> <br>
<tr>Talla</tr>   <br>  </td> -->
              <tr>
                <?php

                $ID = $ID;


                $conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));


                $queryList = mysqli_query($conn3, "SELECT * FROM  citas  where  tipo = 1 and doctor = $ID AND fecha BETWEEN '$desde' and '$hasta'   order by fecha asc  ");

                //ECHO   "SELECT * FROM  citas  where  tipo = 1 and doctor= $ID AND fecha BETWEEN '$desde' and '$hasta'   order by fecha asc  ";

                // $nrowl = mysqli_num_rows($queryList);

                if ($queryList) {
                  while ($row_recordset32 = mysqli_fetch_array($queryList)) {
                  $idCitas      = $row_recordset32['idCitas'];
                  $Doctor = $row_recordset32['doctor'];
                  $fecha = $row_recordset32['fecha'];
                  $Hora = $row_recordset32['Hora'];
                  $nombre = $row_recordset32['nombre'];
                  $telefono = $row_recordset32['telefono'];
                  $correo = $row_recordset32['correo'];
                  $motivoConsulta = $row_recordset32['motivoConsulta'];
                  $activo = $row_recordset32['activo'];
                  $estado = $row_recordset32['estado'];

                  echo '     
                      <tr>
                         
                      <td width="20%" class="text-center"> ' . $fecha . '-' . $Hora . '</td>
                      <td width="20%" class="text-center"> ' . $nombre . '</td>
                     
                      <td width="30%" class="text-center">' . (funcionMaster($motivoConsulta,'id','descripcion','Motivos_Consulta') == '' ? '-' : funcionMaster($motivoConsulta,'id','descripcion','Motivos_Consulta')) . '</td></tr>';
                  }
                }
                
                ?>




              

            </tbody>
            <tfoot>
              <tr>
                <th class="text-center">Fecha-Hora</th>
                <th class="text-center">Paciente</th>
                <th class="text-center">Motivo Consulta</th>
              </tr>
            </tfoot>
          </table>

        </div>





    </div>
  </div>
  </div>






  <!-- /.col -->
  </div>
  <!-- info row -->

  <!-- Table row -->




  </div>
  <!-- /.col -->
  </div>
  <!-- /.row -->


  <!-- /.row -->

  <!-- this row will not appear when printing -->


  <!-- /.content -->
  </div>
  <!-- ./wrapper -->
</body>

</html>