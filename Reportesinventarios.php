<!-- Left side column. contains the logo and sidebar -->
<?php
include 'header.php';
include 'menu.php';
$ID = $_SESSION['ID'];
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>

      Reportes inventarios
    </h1>
    <!-- <ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
        <li><a href="#"> Reportes inventarios </a></li>
      </ol> -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="">



      <br>




      <div class="box">

        <!-- /.box-header -->
        <div class="box-body">


          <div class="col-xs-12">
            Existencias por tipo
            <form action="Reporteinventarioportipo" method="POST" class="row">
              <input type="hidden" class="form-control input-lg" name="ID" value="<?php echo $ID ?>" required>

              <div class="col-md-6">
                <select class="form-control input-lg" name="tipo">
                  <option value="0">Todos</option>
                  <?php
                  $usuario_id = $_SESSION['ID'];

                  $querycat = mysqli_query($conn3, "SELECT * FROM  scategoria where (usuario_id =$usuario_id or usuario_id = '{$_SESSION['ID_principal']}') order by descripcion");
                  $nrowl = mysqli_num_rows($querycat);
                  while ($row_cat = mysqli_fetch_array($querycat)) {

                    $id = $row_cat['id'];
                    $tipodescripcion = $row_cat['descripcion'];
                    echo '<option value="' . $id . '" >' . $tipodescripcion . '</option>';
                  }

                  ?>



                </select>
              </div>
              <div class="col-md-6">
                <center><button type="submit" class="btn btn-block btn-primary btn-sm">
                    <h4> <strong> Generar </strong> </h4>
                  </button></center>
              </div>
            </form>


          </div>
        </div>
      </div>







      <br>






      <div align="center">
        <h6>
          <font color="red">Necesitas un reporte nuevo?, Solicítalo por <a href="<?php echo $Base; ?>/soporte"
              target="_blank"> <strong> <i class="fa fa fa-support"></i> soporte </strong></a> </font>
        </h6>
      </div>



      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include 'footer.php';

?>