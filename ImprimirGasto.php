<?php
date_default_timezone_set('America/Bogota');
include("funciones/conn3.php");
include("funciones/funciones.php");
include("funciones/funcionesUtilidades.php");

$Id = $_GET['Id'];

$queryList = mysqli_query($conn3, "SELECT * FROM  S_GE_nuevo where  id = '$Id' ");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {  
  $id_ = $rowMotorizado['id'];
  $fecha_ = $rowMotorizado['fecha'];
  $mes_ = $rowMotorizado['mes'];
  $descripcion_ = $rowMotorizado['descripcion'];
  $monto_ = $rowMotorizado['monto'];
  $tipo_ = $rowMotorizado['tipo'];
  if ($tipo_ == 1) {
    $tipo_ = "GASTO";
  } else {
    $tipo_ = "EGRESO";
  }
  $categoria_ = $rowMotorizado['categoria'];
  $usuario_id_ = $rowMotorizado['usuario_id'];
  $fecha_creacion_ = $rowMotorizado['fecha_creacion'];
  $hora_creacion_ = $rowMotorizado['hora_creacion'];
}


$queryList = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario =  $usuario_id_");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
  $moneda = $rowMotorizado['moneda'];
  $impuestoF = $rowMotorizado['impuestoF'];

  // Nuevos campos

  $nombreF      = $rowMotorizado['nombreF'];
  $header       = $rowMotorizado['header'];


  $LogoF               = $rowMotorizado['logoF'];
  $firma               = $rowMotorizado['firma'];

  if (strlen($LogoF) > 0) {
    $Logo = '<img id="logo" src="' . $Base . 'logos/' . $LogoF . '" height="50%" width="50%">';
  }


  if (strlen($firma) > 0) {
    $firmaImg = '<img src="' . $Base . 'FirmasReg/' . $firma . '" height="100" width="150">';
  }
}


$queryList = mysqli_query($conn3, "SELECT * FROM  usuarios where ID = $usuario_id_");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
  $empresaNombre      = $rowMotorizado['empresaNombre'];
  $direccion          = $rowMotorizado['direccion'];
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

</head>

<body onload="window.print();">
  <div class="wrapper">
    <div class="col-xs-1">
    </div>
    <div class="col-xs-10">

      <div class="box box-solid">

        <div class="row">

          <div class="col-xs-12">

            <table class="tg" style="undefined;table-layout: fixed; width: 100%">
              <colgroup>
                <col style="width:  100%">
                <col style="width:  100%">
                <col style="width:  100%">
                <col style="width:  100%">
              </colgroup>


              <tr align="center">
                <th class="Logo" rowspan="4" align="center"><?php echo $Logo ?> </th>
                <th class="titulo" colspan="4" rowspan="4" align="center">
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



          </div>
          <hr>
          <div class="row">
            <h4 align="center"><b> REGISTRO DE <?=$tipo_?> # <?=$id_?> </b></h4>
            <div class="col-xs-12">
            </div>
          </div>

          <div class="row">
            <!-- imprimir aqui todos los valores de S_GE_nuevo -->
            <div class="col-xs-6">
              <label for="">Fecha</label>
              <input type="text" class="form-control" value="<?php echo $fecha_ ?>" disabled>
            </div>
            <div class="col-xs-6">
              <label for="">Mes</label>
              <input type="text" class="form-control" value="<?php echo $mes_ ?>" disabled>
            </div>
            <div class="col-xs-12">
              <label for="">Descripción</label>
              <input type="text" class="form-control" value="<?php echo $descripcion_ ?>" disabled>
            </div>
            <div class="col-xs-12">
              <label for="">Monto</label>
              <input type="text" class="form-control" value="<?php echo $monto_ ?>" disabled>
            </div>
            <div class="col-xs-12">
              <label for="">Tipo</label>
              <input type="text" class="form-control" value="<?php echo $tipo_ ?>" disabled>
            </div>
            <div class="col-xs-12">
              <label for="">Categoría</label>
              <input type="text" class="form-control" value="<?php echo funcionMaster($categoria_,'id','descripcion','S_GE_categorias') ?>" disabled>
            </div>           

          </div>




        <!-- /.row -->

        <!-- this row will not appear when printing -->
        <div class="row no-print">
          <div class="col-xs-12">
            <!--<a href="imprimirRecipe.php?historiaClinica1=<?php echo $historiaClinica1 ?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Imprimir</a>-->



          </div>
        </div>
        </section>
        <!-- /.content -->
        <div class="clearfix"></div>
      </div>
      <style>
@media print {
  #logo{
    height:80%;
    width:80%;

  }
}

      </style>