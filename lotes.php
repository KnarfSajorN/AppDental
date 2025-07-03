<?php include 'header.php';
include 'menu.php';
$vacuna = decrypt($_GET['eD']);
$nombrevacuna = funcionMaster($vacuna, 'id', 'Nombre', 'vacunas');



////////////////////////////////////////////////////////////////////?IMPORTATE SI AGREGAN CAMPOS EN LA TABLA DE VACUNACION/INYECTOLOGIA QUE PUEDA SER NULL YA QUE ESTAS TABLAS SE USARAN TANTO EN VACUNACION COMO INYECTOLOGIA ////////////////////////////////////////////
////////////////////////////////////////////////////////////////////?IMPORTATE SI AGREGAN CAMPOS EN LA TABLA DE VACUNACION/INYECTOLOGIA QUE PUEDA SER NULL YA QUE ESTAS TABLAS SE USARAN TANTO EN VACUNACION COMO INYECTOLOGIA ////////////////////////////////////////////
////////////////////////////////////////////////////////////////////?IMPORTATE SI AGREGAN CAMPOS EN LA TABLA DE VACUNACION/INYECTOLOGIA QUE PUEDA SER NULL YA QUE ESTAS TABLAS SE USARAN TANTO EN VACUNACION COMO INYECTOLOGIA ////////////////////////////////////////////
////////////////////////////////////////////////////////////////////?IMPORTATE SI AGREGAN CAMPOS EN LA TABLA DE VACUNACION/INYECTOLOGIA QUE PUEDA SER NULL YA QUE ESTAS TABLAS SE USARAN TANTO EN VACUNACION COMO INYECTOLOGIA ////////////////////////////////////////////
////////////////////////////////////////////////////////////////////?IMPORTATE SI AGREGAN CAMPOS EN LA TABLA DE VACUNACION/INYECTOLOGIA QUE PUEDA SER NULL YA QUE ESTAS TABLAS SE USARAN TANTO EN VACUNACION COMO INYECTOLOGIA ////////////////////////////////////////////
////////////////////////////////////////////////////////////////////?IMPORTATE SI AGREGAN CAMPOS EN LA TABLA DE VACUNACION/INYECTOLOGIA QUE PUEDA SER NULL YA QUE ESTAS TABLAS SE USARAN TANTO EN VACUNACION COMO INYECTOLOGIA ////////////////////////////////////////////
////////////////////////////////////////////////////////////////////?IMPORTATE SI AGREGAN CAMPOS EN LA TABLA DE VACUNACION/INYECTOLOGIA QUE PUEDA SER NULL YA QUE ESTAS TABLAS SE USARAN TANTO EN VACUNACION COMO INYECTOLOGIA ////////////////////////////////////////////
////////////////////////////////////////////////////////////////////?IMPORTATE SI AGREGAN CAMPOS EN LA TABLA DE VACUNACION/INYECTOLOGIA QUE PUEDA SER NULL YA QUE ESTAS TABLAS SE USARAN TANTO EN VACUNACION COMO INYECTOLOGIA ////////////////////////////////////////////
////////////////////////////////////////////////////////////////////?IMPORTATE SI AGREGAN CAMPOS EN LA TABLA DE VACUNACION/INYECTOLOGIA QUE PUEDA SER NULL YA QUE ESTAS TABLAS SE USARAN TANTO EN VACUNACION COMO INYECTOLOGIA ////////////////////////////////////////////
////////////////////////////////////////////////////////////////////?IMPORTATE SI AGREGAN CAMPOS EN LA TABLA DE VACUNACION/INYECTOLOGIA QUE PUEDA SER NULL YA QUE ESTAS TABLAS SE USARAN TANTO EN VACUNACION COMO INYECTOLOGIA ////////////////////////////////////////////
////////////////////////////////////////////////////////////////////?IMPORTATE SI AGREGAN CAMPOS EN LA TABLA DE VACUNACION/INYECTOLOGIA QUE PUEDA SER NULL YA QUE ESTAS TABLAS SE USARAN TANTO EN VACUNACION COMO INYECTOLOGIA ////////////////////////////////////////////
////////////////////////////////////////////////////////////////////?IMPORTATE SI AGREGAN CAMPOS EN LA TABLA DE VACUNACION/INYECTOLOGIA QUE PUEDA SER NULL YA QUE ESTAS TABLAS SE USARAN TANTO EN VACUNACION COMO INYECTOLOGIA ////////////////////////////////////////////


if ($_GET['eDl'] <> "") {
  include 'funciones/conn3.php';
  $idLote = decrypt($_GET["eDl"]);
  $queryListhc = mysqli_query($conn3, "SELECT * from lotes where ID='$idLote'");
  $nrowl = mysqli_num_rows($queryListhc);
  while ($Lista = mysqli_fetch_array($queryListhc)) {

    $cantidad = $Lista['cantidad'];
    $nombre = $Lista['descripcion'];
    $fecha_vencimiento = $Lista['fechaV'];
  }
}



?>


<style type="text/css">
  .select2-container .select2-selection--single {
    height: 43px !important;
    padding: 10px !important;
  }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
  <!-- Content Header (Page header) -->
  <section class="content-header">

    <ol class="breadcrumb">
      <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio </a></li>

      <li class="active"> Registrar Nuevo Lote </li>
    </ol>
  </section>

  <br>
  <section class="content">

    <div class="box box-info" align="center">
      <div class="card-body">
        <h4 class="card-title"> Registro lotes </h4>
        <br>
        <div class="content">
          <div class="">

            <form action="agregarLote.php" method="POST" name="formularioActualizarcliente" enctype="multipart/form-data" class="row">

              <div class="form-group col-md-4">
                <div align="left"> Lote</div>

                <input type="text" class="form-control input-lg" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo $nombre ?>" required>
              </div>
              <div class="form-group col-md-4">
                <div align="left">Cantidad</div>

                <input type="text" class="form-control input-lg" id="cantidad" name="cantidad" placeholder="Cantidad" value="<?php echo $cantidad ?>" required>
              </div>

              <div class="form-group col-md-4">
                <div align="left"> Fecha Caducidad </div>
                <input type="date" class="form-control input-lg" id="fecha_vencimiento" name="fecha_vencimiento" placeholder="Fecha Vencimiento" value="<?php echo $fecha_vencimiento ?>" required>
              </div>

              <input type="hidden" name="vacuna" value="<?php echo $vacuna ?>">

              <div class="form-group col-md-12">


                <?php
                if (decrypt($_GET['eDl']) == "") {
                ?>
                  <center><button type="submit" name="Guardar" class="btn btn-block btn-primary btn-sm">Guardar</button></center>
                <?php
                } else {
                ?>
                  <input type="hidden" name="idLote" value="<?php echo decrypt($_GET['eDl']) ?>">
                  <input type="hidden" name="vacuna" value="<?php echo $vacuna ?>">
                  <center><button type="submit" name="Actualizar" class="btn btn-block btn-primary btn-sm">Actualizar</button></center>
                <?php
                }
                ?>







              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="box">
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped" style="font-size: 15px;">
          <thead>
            <tr>

              <th>Lotes asociados a la vacuna <?php echo $nombrevacuna ?></th>
              <th>Cantidad disponible</th>
              <th>Fecha Caducidad</th>
              <th></th>


            </tr>
          </thead>
          <tbody>
            <?php

            $usuario_id = $_SESSION['ID'];
            $queryList = mysqli_query($conn3, "SELECT * FROM lotes where id_vacuna= $vacuna and activo=1");
            $nrowl = mysqli_num_rows($queryList);
            while ($Lista = mysqli_fetch_array($queryList)) {

              $idLote = $Lista['ID'];
              $Nombre = $Lista['descripcion'];
              $cant = $Lista['cantidad'];
              $fechaV = $Lista['fechaV'];
              if ($cant == 0) {
                $Color = 'style="background-color:#80e68070"';
              } else {
                $Color = 'style="background-color:#ffffff00"';
              }

              echo ' <tr ' . $Color . '>
                   
                    <td>' . $Nombre . ' </td>
                    <td>' . $cant . ' unidades  </td>
                    <td>' . $fechaV . ' </td>
                    ';
              if ($_SESSION['TIPO'] == 99) {
                echo '
                    <td><a class="eliminar" href="Eliminarlote.php?iL=' . encrypt($idLote) . '&v=' . encrypt($vacuna) . '" ><i class="fa fa-trash" style="color:RED" title = "Eliminar"></i>  </a> |
                     <a href="vacunacionLotes?eDl=' . encrypt($idLote) . '&eD=' . encrypt($vacuna) . '" title="Editar Lote"><i class="fa fa-pencil"></i> </a> | </td>
                   
                    </tr>';
              }
            }


            ?>


          </tbody>
        </table>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include 'footer.php' ?>

<script type="text/javascript">


</script>