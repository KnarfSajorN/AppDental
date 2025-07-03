<?php
include 'header.php';
include 'menu.php'; ?>
<?php

$proveedor_id = $_GET['id'];


$usuario_id = $_SESSION['ID']
?>

<style>
.Titulo_Pagina {
    width: fit-content;
    background-color: #3c8dbc75;
    padding: 20px;
    border-radius: 20px 20px 0px 0px;
    display: table-cell;
}
</style>


<!-- Upload archivos -->
<link href="upload/css/uploadfile.css" rel="stylesheet">
<script src="upload/js/jquery.min.js"></script>
<script src="upload/js/jquery.uploadfile.min.js"></script>
<!-- Fin upload archivos -->
<!-- Upload fotos -->
<link type="text/css" rel="stylesheet" href="upload/css/jquery-ui.min.css" media="screen" />
<link type="text/css" rel="stylesheet" href="upload/plupload/js/jquery.ui.plupload/css/jquery.ui.plupload.css"
  media="screen" />
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
  <!-- Content Header (Page header) -->
  <!-- <section class="content-header">
       <ol class="breadcrumb">
         <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio </a></li>
         <li><a href="#">Historial exámenes </a></li>
       </ol>
     </section> -->

  <!-- Main content -->
  <section class="content">
      <div class="col-xs-12">
        <h4 class="Titulo_Pagina"></a>&nbsp;&nbsp;Historial Documentos Proveedor </h4>

        <div class="box">
          <!-- /.box-header -->
          <div class="box-body">
            <?php echo datosProveedorReducido($proveedor_id); ?>


            <div class="col-md-12 bg-white">
              <h4 class="card-title">Nombre de la Carpeta</h4>
              <form action="guardarImagenes_proveedor.php" method="POST" name="FormularioImagenes"
                enctype="multipart/form-data">

                <input type="hidden" id="usuario_id" name="usuario_id" value="<?php echo $usuario_id; ?>">
                <input type="hidden" id="proveedor_id" name="proveedor_id" value="<?php echo $proveedor_id; ?>">


                <div class="form-group col-md-12">
                  <input type="text" class="form-control" id="Descripcion" name="descripcion" placeholder="Carpeta"
                  autocomplete="off" required>
                </div>


                <div class="form-group">
                  <label class="col-sm-2 control-label">Archivos</label>

                  <input type="file" class="form-control" id="archivo[]" name="archivo[]" multiple="" autocomplete="off">
                </div>
                <center><input type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" value="Guardar"></center>
              </form>
              <link type="text/css" rel="stylesheet" href="css/tabs.css" />
            </div>
            <div class="page" style="background-color: aliceblue;padding: 20px;">
              <!--<h1>Pure CSS Tabs</h1>  -->
              <!-- tabs -->
              <div class="pcss3t pcss3t-effect-scale pcss3t-theme-1">
                <input type="radio" name="pcss3t" checked id="tab1" class="tab-content-first">
                <label for="tab1"><i class="icon-bolt"></i>Archivos</label>

                <input type="radio" name="pcss3t" id="tab2" class="tab-content-2">
                <label for="tab2"><i class="icon-picture"></i>Carpetas</label>

                <ul>
                  <li class="tab-content tab-content-first typography">
                    <h1 class="txt_rsp">Registro de Archivos</h1>

                    <table class="table w-100" style="width: 100% !important;">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Nombre Archivo</th>
                          <th scope="col">Carpeta</th>
                          <th scope="col">Fecha</th>
                          <th scope="col" style="text-align: center;font-size: 25px;"><i class="fa fa-download"
                              aria-hidden="true"></i></th>
                          <th scope="col" style="text-align: center;font-size: 25px;"><i class="fa fa-picture-o"
                              aria-hidden="true"></i></th>
                          <th scope="col" style="text-align: center;font-size: 25px;"><i class="fa fa-paper-plane-o"
                              aria-hidden="true"></i></th>
                          <th scope="col" style="text-align: center;font-size: 25px;"><i class="fa fa-trash"
                              aria-hidden="true"></i></th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php
                        $queryImg = mysqli_query($conn3, "SELECT * FROM archivos_proveedor where proveedor_id = '$proveedor_id' and estado = 1");
                        $nrowlER = mysqli_num_rows($queryImg);
                        while ($resulImg = mysqli_fetch_array($queryImg)) {
                          $contador++;
                          $Producto = $resulImg['id'];

                          ?>
                          <tr>
                            <td>
                              <?php echo $contador ?>
                            </td>
                            <td>
                              <?php echo $resulImg['NombreVisual']; ?>
                            </td>
                            <td>
                              <?php echo $resulImg['descripcion']; ?>
                            </td>
                            <td>
                              <?php echo $resulImg['fecha']; ?>
                            </td>
                            <td style="text-align: center;">
                              <a target="blank" href="<?php echo $Base; ?>archivos_proveedor/<?php echo $resulImg['codigo']; ?>">
                                <a href="<?php echo $Base; ?>archivos_proveedor/<?php echo $resulImg['codigo']; ?>"
                                  download="Archivo">Descargar Archivo
                                </a>
                              </a>
                            </td>
                            <td style="text-align: center;">
                              <a target="_blank" href="<?php echo $Base; ?>archivos_proveedor/<?php echo $resulImg['codigo']; ?>">
                                <a target="_blank" href="<?php echo $Base; ?>archivos_proveedor/<?php echo $resulImg['codigo']; ?>">Ver Archivo o
                                  Imagen <br>
                                </a>
                              </a>
                            </td>
                            <td style="text-align: center;">
                              <a target="_blank"
                                href="<?php echo $Base; ?>enviarArchivo_proveedor.php?cI=<?= encrypt($proveedor_id); ?>&iI=<?= encrypt($Producto); ?>">
                                Enviar Archivo <br>
                              </a>
                            </td>
                            <td style="text-align: center;">
                              <a
                                href="<?php echo $Base; ?>historiaImagenes_eliminar_proveedor.php?cI=<?= encrypt($proveedor_id); ?>&iI=<?= encrypt($Producto); ?>">
                                Eliminar Archivo <br>
                              </a>
                            </td>

                          </tr>
                        <?php } ?>
                      </tbody>
                    </table>

                  </li><!-- cierre del primer modulo archivos -->

                  <li class="tab-content tab-content-2 typography">
                    <h1 class="txt_rsp">Registro de Carpetas</h1>



                    <table class="table w-100" style="width: 100% !important;">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Carpeta</th>
                          <th scope="col">Fecha</th>
                          <th scope="col" style="text-align: center;font-size: 25px;"><i class="fa fa-paper-plane-o"
                              aria-hidden="true"></i></th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php
                        $queryarchivo = mysqli_query($conn3, "SELECT * FROM archivos_proveedor  where proveedor_id = '$proveedor_id' and estado = 1 group by descripcion");

                        $nrowlER = mysqli_num_rows($queryarchivo);
                        while ($resularchivo = mysqli_fetch_array($queryarchivo)) {
                          $descripcion = $resularchivo['descripcion'];

                          ?>





                          <tr>
                            <td>
                              <?php echo $contador ?>
                            </td>
                            <td>
                              <?php echo $descripcion; ?>
                            </td>
                            <td>
                              <?php echo $resularchivo['fecha']; ?>
                            </td>
                            <td style="text-align: center;">
                              <a target="_blank"
                                href="<?php echo $Base; ?>enviarArchivoPaquete_Proveedor.php?proveedor=<?php echo $proveedor_id; ?>&usuario_id=<?php echo $usuario_id; ?>&descripcion=<?php echo $descripcion; ?>">
                                Enviar Archivos <br>
                              </a>
                            </td>
                          </tr>

                        <?php } ?>
                      </tbody>
                    </table>



                  </li>


                </ul>
              </div>
              <!--/ tabs -->
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
<script type="text/javascript" src="upload/js/jquery-ui.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="upload/plupload/js/plupload.full.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="upload/plupload/js/jquery.ui.plupload/jquery.ui.plupload.min.js"
  charset="UTF-8"></script>
