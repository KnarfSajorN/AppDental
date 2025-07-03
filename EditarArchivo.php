<?php include 'header.php';
include 'menu.php';


$Producto = $_GET['id'];
$cliente = $_GET['cliente'];

$QueryArchivos = mysqli_query($conn3, "SELECT * FROM archivos  where id = '$Producto' AND cliente_id = '$cliente'");
while ($RowArchivos = mysqli_fetch_array($QueryArchivos)) {
  $nombre = $RowArchivos['NombreVisual'];
}






if (isset($_POST['btn-save'])) {
  $nombre = $_POST['nombre'];
  $usuario_id = $_POST['usuario_id'];
  $cliente_id = $_POST['cliente_id'];
  $id = $_POST['id']; 
  mysqli_query($conn3, "UPDATE archivos SET NombreVisual='$nombre' WHERE cliente_id = $cliente_id and id = $id");
  echo "<script language='Javascript'> window.location='historiaImagenes.php?clienteId=$cliente_id';</script>";
}


?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">

    <ol class="breadcrumb">
      <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio </a></li>

      <li class="active"> Editar Nombre de Archivo </li>
    </ol>
  </section>

  <br>

  <section class="content">

    <div class="box box-info" align="center">
      <br>
      <br>
      <div class="card-body">
        <h4 class="card-title"> Editar Archivo </h4>
        <br>
        <form action="EditarArchivo.php" method="POST" name="EditarArchivo" enctype="multipart/form-data">
          <div class="form-row">


            <div class="form-group col-md-12">
              <div align="left"> Nombre </div>

              <input type="text" class="form-control input-lg" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo $nombre ?>">
            </div>




          </div>



          <input type="hidden" name="usuario_id" value="<?php echo $_SESSION['ID'] ?>">
          <input type="hidden" name="cliente_id" value="<?php echo $_GET['cliente'] ?>">
          <input type="hidden" name="id" value="<?php echo $Producto ?>">








          <center><button type="submit" name="btn-save" id="btn-save" class="btn btn-block btn-primary btn-sm">Actualizar</button></center>

          <input type="hidden" name="tipo_cliente" valur="1">

        </form>
      </div>



      <input type="hidden" name="usuario_id" class="form-control input-lg input-lg" value="<?php echo $_SESSION['ID'] ?>">


    </div>




  </section>

  <?php echo $mensaje_registro_patients; ?>

  <!-- /.content -->
</div>
<!-- /.content-wrapper -->



<?php include 'footer.php' ?>