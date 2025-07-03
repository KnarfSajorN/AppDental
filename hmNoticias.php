<!DOCTYPE html>
<?php
include 'header.php';
include 'menu.php';

$clienteId = $_GET['clienteId'];
$usuarioId = $_GET['usuarioId'];

$ID = $_SESSION['ID'];


// conexion a base de datos global - datos publicos
include 'funciones/conn3.php';
// utf8
mysqli_set_charset($conn3, "utf8");




$idNoticia = $_GET['idNoticia'];


if ($_GET['idNoticia']) {

  $queryList = mysqli_query($conn3, "SELECT * FROM  noticias where id=$idNoticia");
  $nrowl = mysqli_num_rows($queryList);
  $rowNoticia = mysqli_fetch_array($queryList);
}



?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Noticias Medical

    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">


        <div class="box">

          <!-- /.box-header -->
          <div class="box-body">


            <div class="col-md-12">


              <div class="box box-solid">

                <!-- /.box-header -->
                <div class="box-body">
                  <div class="box-group" id="accordion1">
                    <?php if ($_GET['idNoticia']) : ?>

                      <form action="configActualizarhmNoticias.php" method="POST" enctype="multipart/form-data">

                        <div class="box-body">

                          <div class="col-md-12">
                            <font size="1">
                              <h3 align="center">Editar </h3>
                            </font>
                          </div>
                          <div class="form-group col-md-12">
                            <div align="left">Editor</div>
                            <input type="text" class="form-control input-lg" name="editor" value="<?php echo $rowNoticia['editor'] ?>">
                          </div>
                          <div class="form-group col-md-12">
                            <div align="left">Titulo</div>
                            <input type="text" class="form-control input-lg" name="titulo" value="<?php echo $rowNoticia['titulo'] ?>">
                          </div>
                          <div class="form-group col-md-12">
                            <div align="left">Slug de titulo (lo-mas-relevante-en-medicina-2023) </div>
                            <input type="text" class="form-control input-lg" name="slug" value="<?= $rowNoticia['slug'] ?>" onchange="slugTitulo(this.value)">
                            <small id="mensajeSlug"></small>
                          </div>
                          <div class="form-group col-md-12">
                            <div align="left">Descripción</div>
                            <input type="text" class="form-control input-lg" name="descripcion" value="<?php echo $rowNoticia['descripcion'] ?>">
                          </div>
                          <div class="form-group col-md-12">
                            <div align="left">Imagen miniatura</div>
                            <img src="<?= $rowNoticia['img'] ?>" style="width:200px; height:auto;">
                            <input type="file" class="form-control input-lg" name="img">
                          </div>
                          <div class="form-group col-md-12">
                            <textarea id="" class="editorJR" name="blog"><?php echo $rowNoticia['blog'] ?></textarea>
                          </div>
                        </div>
                  </div>




                  <input type="hidden" name="usuario" value="<?php echo $_SESSION['ID'] ?>">
                  <input type="hidden" name="idNoticia" value="<?php echo $idNoticia ?>">

                  <div class="col-sm-12">

                    <center><button type="submit" class="btn btn-block btn-primary btn-sm">
                        <h2> <strong> A C T U A L I Z A R </strong> </h2>
                      </button></center>

                  </div>


                  <input type="hidden" name="tipo_cliente" valur="1">
                </div>

                </form>

              <?php endif ?>











              <!-- *********************************************  ********************************************* -->
              <!-- *********************************************  ********************************************* -->
              <!-- *********************************************  ********************************************* -->
              <!-- ************************* Formulario para Registrar Nuevo   ******************************** -->
              <!-- *********************************************  ********************************************* -->
              <!-- *********************************************  ********************************************* -->
              <!-- *********************************************  ********************************************* -->
              <?php if ($idNoticia == '') : ?>

                <form action="configGuardarhmNoticias.php" method="POST" enctype="multipart/form-data">


                  <div class="box-body">


                    <div class="col-md-12">
                      <font size="1">
                        <h3 align="center">Agregar Nueva Noticia </h3>
                      </font>
                    </div>
                    <div class="form-group col-md-12">
                      <div align="left">Editor</div>
                      <input type="text" class="form-control input-lg" name="editor" value="HelloMedical">
                    </div>
                    <div class="form-group col-md-12">
                      <div align="left">Titulo</div>
                      <input type="text" class="form-control input-lg" name="titulo" value="">
                    </div>
                    <div class="form-group col-md-12">
                      <div align="left">Slug de titulo (lo-mas-relevante-en-medicina-2023) </div>
                      <input type="text" class="form-control input-lg" name="slug" value="" onchange="slugTitulo(this.value)">
                      <small id="mensajeSlug"></small>
                    </div>
                    <div class="form-group col-md-12">
                      <div align="left">Descripción</div>
                      <input type="text" class="form-control input-lg" name="descripcion" value="">
                    </div>
                    <div class="form-group col-md-12">
                      <div align="left">Imagen miniatura</div>
                      <img src="<?= $rowNoticia['img'] ?>" style="width:200px; height:auto;">
                      <input type="file" class="form-control input-lg" name="img">
                    </div>
                    <div class="form-group col-md-12">
                      <textarea id="" class="editorJR" name="blog"><?php echo $blog ?></textarea>
                    </div>


                  </div>
              </div>

            </div>




            <input type="hidden" name="usuario" value="<?php echo $_SESSION['ID'] ?>">

            <div class="col-sm-12">

              <center><button type="submit" class="btn btn-block btn-primary btn-sm">
                  <h2> <strong> G u a r d a r </strong> </h2>
                </button></center>

            </div>


              <input type="hidden" name="tipo_cliente" valur="1">
            </div>

                  </form>

                <?php endif ?>


                <br>

                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>

                        <th class="text-center">Titulo </th>
                        <th class="text-center">Fecha </th>
                        <th class="text-center"> </th>

                      </tr>
                    </thead>
                    <tbody>
              <?php

              $queryListhc = mysqli_query($conn3, "SELECT * from noticias where activo = 1");
              $nrowl = mysqli_num_rows($queryListhc);
              while ($rowhc = mysqli_fetch_array($queryListhc)) {

                echo '      
                      <tr>
                      <td> ' . $rowhc['titulo'] . ' - ' . $rowhc['descripcion'] . '</td>
                      <td> ' . $rowhc['fecha'] . '</td>
                     
                      <td>

                      <form method>
                     
                      <font color="#04CC05"> <a href="hmNoticias.php?idNoticia=' . $rowhc[id] . '"> <i class="fa fa-pencil" title="Editar" name="Virtual"></i>  </a></font>

                      </td>
                      </tr>';
              }
              ?>

            </tbody>
            <tfoot>
              <tr>
                <th class="text-center">nombre </th>
                <th class="text-center">tabla </th>
                <th class="text-center"> </th>

              </tr>
            </tfoot>
          </table>
        </div>







        </div>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</section>
<!-- /.content -->
</div>

<?php include("footer.php") ?>
<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
<script type="text/javascript">
  function slugTitulo(value) {
    console.log(value);
    $.ajax({
      url: "ajax_slug.php",
      type: "POST",
      data: {
        value: value
      },
      success: function(data) {
        console.log(data);
        if (data == 0) {
          // disponible
          $('[type="submit"]').prop('disabled', false);
          $('#mensajeSlug').html('Disponible');
        } else {
          // no disponible
          $('[type="submit"]').prop('disabled', true);
          $('#mensajeSlug').html('No disponible');
        }
      }
    })
  }
</script>

<script src="editorNuevo.js"></script>