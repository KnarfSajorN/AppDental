   <?php 
   include 'header.php';
   include 'menu.php';

   $clienteId = $_GET['clienteId'];

   $msg = $_GET['msg'];

if(isset($_POST['guardar_plantilla']))
{

  $titulo     = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['titulo'])));
  $contenido     = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['contenido'])));
  $usuario_id     = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['usuario_id'])));
 
  mysqli_query($conn3,"INSERT INTO Plantilla_Textarea (usuario_id, titulo, plantilla) 
     VALUES ('$usuario_id','$titulo', '$contenido');");  

  echo "<script language='Javascript'> window.location='ConfigGenerarPlantilla.php?msg=1';</script>";
} 


if(isset($_POST['actualizar_plantilla']))
{

  $titulo     = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['titulo'])));
  $contenido     = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['contenido'])));
  $usuario_id     = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['usuario_id'])));
  $id_plantilla     = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['id_plantilla'])));
 
  mysqli_query($conn3,"update Plantilla_Textarea set usuario_id = '$usuario_id' , titulo = '$titulo' , plantilla = '$contenido' where id='$id_plantilla' limit 1 ");
   
  echo "<script language='Javascript'> window.location='ConfigGenerarPlantilla.php?msg=2';</script>";
}

if(isset($_GET['editar']))
{
  $id_plantilla = $_GET['editar'];
  $queryPlantilla=mysqli_query($conn3,"SELECT * FROM  Plantilla_Textarea where id = '$id_plantilla' limit 1");
  $nrowl=mysqli_num_rows($queryPlantilla);
  while($Row_Actualizar=mysqli_fetch_array($queryPlantilla))
  {
    $id= $Row_Actualizar['id'];
    $titulo  = $Row_Actualizar['titulo'];
    $plantilla  = $Row_Actualizar['plantilla'];
  }
}

if(isset($_GET['borrar']))
{
$id = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_GET['borrar'])));
 
mysqli_query($conn3,"DELETE FROM Plantilla_Textarea WHERE id = '$id' limit 1;");

echo    "<script language='Javascript'> window.location='ConfigGenerarPlantilla.php?msg=3';</script>";
}


      ?>

    <style type="text/css">
    .select2-container .select2-selection--single 
    {
      height: 47px!important;
      padding: 15px!important;
    }
  </style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <!-- <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio </a></li>
        <li><a href="config"><i class="fa fa-gears"></i> Perfil </a></li>
        <li><a href="#"> Comision </a></li>
      </ol>
      <br>
    </section> -->

    <!-- Main content -->
    <section class="content">
      <?php
      if($msg == "1") 
          {
            echo  '<div class="callout callout-info">
                    <h4> Guardar </h4>
                     <p> Se ha guardado la plantilla correctamente </p>
                  </div>';
          }
          elseif($msg == "2") 
          {
            echo  '<div class="callout callout-info">
                    <h4> Actualizacion </h4>
                     <p> Se ha actualizado correctamente la plantilla</p>
                  </div>';
          }
          elseif($msg == "3") 
          {
            echo  '<div class="callout callout-danger">
                    <h4> Eliminacion </h4>
                     <p> Se ha eliminado correctamente la plantilla</p>
                  </div>';
          }
      ?>

      <div class="box">
        <div class="box-body">

          <div class="form-group col-md-12" align="center">
            <h2>Agregar Plantilla</b></h2>
          </div>

          <form action="ConfigGenerarPlantilla.php" method="POST">
            <div class="col-md-12">
              <label>Titulo de la Plantilla</label>
              <input type="text" name="titulo"  class="form-control input-lg"  placeholder="Titulo"  maxlength="100" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"  value="<?php echo $titulo; ?>">

              <label>Contenido de la Plantilla</label>
              <textarea name="contenido"  class="form-control input-lg"  placeholder="Contenido"  style="max-width: 100%; height: 400px;"><?php echo $plantilla; ?></textarea> 

              <input  type="hidden" name="usuario_id"  value="<?php echo $_SESSION['ID'];?>">
              <?php
              if(isset($_GET['editar']))
              {
                echo '<div class="col-md-12">
                      <input  type="hidden" name="id_plantilla"  value="'.$id.'">
                      <br>
                      <br>
                      <center><button type="submit" name="actualizar_plantilla" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow"> <h2> <strong>  A C T U A L I Z A R  </strong> </h2> </button></center>
                    </div>';
              }
              else
              {
                echo '<div class="col-md-12">
                      <br>
                      <br>
                      <center><button type="submit" name="guardar_plantilla" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow"> <h2> <strong>  G U A R D A R  </strong> </h2> </button></center>
                    </div>';
              }
              ?>
            </div>
          </form>
          <div class="col-md-12 box-body" align="center">
            <h2>Plantillas</h2>
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Nombre</th>
                  <th>Descripción</th>
                  <th>  </th>
                </tr>
              </thead>
              <tbody>
                <?php
                $queryListA=mysqli_query($conn3,"SELECT * FROM  Plantilla_Textarea where usuario_id = '{$_SESSION['ID']}';");
                $nrowl=mysqli_num_rows($queryListA);
                while($Row_Plantilla=mysqli_fetch_array($queryListA))
                {
                  $id= $Row_Plantilla['id'];
                  $titulo  = $Row_Plantilla['titulo'];
                  $plantilla  = $Row_Plantilla['plantilla'];

                  echo '      
                  <tr>
                  <td> '.$id.'</td>
                  <td> '.$titulo.'</td>
                  <td> '.$plantilla.'</td>
                  <td>
                  <font color="#04CC05"> <a href="ConfigGenerarPlantilla.php?editar='.$id.'"> <i class="fa fa-pencil" title="Editar Examen"></i>  </a></font>|
                  <font color="#04CC05"> <a href="ConfigGenerarPlantilla.php?borrar='.$id.'"> <i class="fa fa-trash" title="Borrar Examen"></i>  </a></font
                  </td>
                  </tr>';

                }
                ?>

              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
   <?php
    include 'footer.php';

   ?>

<script>
 $('#example3').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      language: {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Entradas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
    }}});


</script>
