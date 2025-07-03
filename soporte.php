<!-- Left side column. contains the logo and sidebar -->
<?php
include 'header.php';
include 'menu.php';
$mensaje_soporte = $_GET['mensaje_soporte'];



?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Soporte

    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Soporte</a></li>


    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <?php
    if ($mensaje_soporte == 1) {

      echo '
  <div class="callout callout-info ">
          <h4>Enviado</h4>

          <p>Mensaje Enviado</p>
        </div>';
    }

    $Nombre = $_SESSION['NOMBRE_USUARIO'];
    $telefono = $_SESSION['telefono'];

    ?>


    <div class="row">
      <div class="col-xs-12">

        <?php

        $codigo = $_SERVER['REQUEST_URI'];
        $codigo0 = str_replace('/', '', $codigo);
        $codigo1 = str_replace('soporte', '', $codigo0);
        $codigo2 = $_SESSION['ID'];


        ?>

        <div class="box">

          <form class="form-horizontal" action="soporteGuardar.php" method="POST" enctype="multipart/form-data">
            <div class="box-body">
              <div class="form-group col-md-12 row">

                <div class="col-md-12">
                  <label> Nombre </label>
                  <input type="text" name="nombre" class="form-control input-lg" id="Subject" placeholder="Nombre" value="<?php echo $_SESSION['NOMBRE_USUARIO'] ?>" required>
                </div>
                <div class="col-md-12">
                  <label> Correo </label>
                  <input type="text" name="correo" class="form-control input-lg" id="Subject" placeholder="Correo" value="<?php echo $_SESSION['username'] ?>" required>
                </div>
                <div class="col-md-12">
                  <label> Teléfono </label>
                  <input type="text" name="telefono" class="form-control input-lg" id="Subject" placeholder="Teléfono" value="<?php echo $_SESSION['telefono'] ?>" required>
                </div>
                <div class="col-md-12">
                  <label> Tipo </label>

                  <select name="tipo" class="form-control select2" style="width: 100%;">
                    <option selected="selected" value="0">Soporte</option>
                    <option value="1">Recomendación</option>
                  </select>
                </div>
                <div class="col-md-12">
                  <label> Asunto </label>
                  <input type="text" name="asunto" class="form-control input-lg" id="Message" placeholder="asunto" required>


                </div>
                <div class="col-md-12">
                  <label> Mensaje </label>
                  <textarea class="editorJR" name="mensaje" rows="10" cols="80" style="width: 100%;"></textarea>

                  <input type="hidden" name="codi_cliente" class="form-control input-lg" id="Message" placeholder="Message" value="<?php echo $codigo1 ?>" required>

                  <input type="hidden" name="usuario_id" class="form-control input-lg" id="Message" placeholder="Message" value="<?php echo $codigo2 ?>" required>
                </div>
                <div class="col-md-12">


                  <br>

                  <hr>
                </div>

                <div class="col-md-6">
                  <input type="file" class="form-control input-lg" name="imagen1">

                </div>
                <div class="col-md-6">
                  <input type="file" class="form-control input-lg" name="imagen2">

                </div>
                <div class="col-md-6">
                  <input type="file" class="form-control input-lg" name="imagen3">

                </div>
                <div class="col-md-6">
                  <input type="file" class="form-control input-lg" name="imagen4">

                </div>

              </div>



            </div>

            <!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" class="btn btn-block btn-info btn-lg rounded-pill shadow" id="registro_soporte" name="registro_soporte">
                <h4> Enviar </h4>
              </button>

            </div>
            <!-- /.box-footer -->
          </form>



          <br>
          <div class="box-body">

            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>asunto</th>
                  <th>Fecha</th>
                  <th>Estado</th>
                  <th>Respuesta</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php

                //     ?ID_patients=8
                $usuario2 = $_SESSION['username'];
                $ID = $_SESSION['ID'];
                //$resultado=mysql_query("select * from support where tipo = 0 and usuario = $usuario order by id");

                $host2 = 'localhost';
                $userdb2 = 'sievenso_sistemaPrincipal';
                $pass22 = '5qA?o]t6d-h25qA?o]t6d-h2';
                $DB2 = 'sievenso_sistema';


                $conn32 = mysqli_connect($host2, $userdb2, $pass22, $DB2) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));


                $queryconfig = mysqli_query($conn32, "select * from support where  codi_cliente = '$codigo1' order by id");
                $nrowl = mysqli_num_rows($queryconfig);
                while ($rowconfig = mysqli_fetch_array($queryconfig)) {
                  $id = $rowconfig['id'];
                  $estado = $rowconfig['estado'];
                  $asunto  = $rowconfig['asunto'];
                  $fecha  = $rowconfig['fecha'];
                  $rta = $rowconfig['respuesta'];


                  switch ($estado) {
                    case '0':
                      $estado = '<small class="label pull-left bg-green">Enviado</small>';

                      break;
                    case '1':
                      $estado = '<small class="label pull-left bg-blue">Recibido</small>';

                      break;
                    case '2':
                      $estado = '<small class="label pull-left bg-blue">Procesando</small>';

                      break;
                    case '3':
                      $estado = '<small class="label pull-left bg-red">Cerrado</small>';

                      break;
                    case '4':
                      $estado = '<small class="label pull-left bg-red">Asignado</small>';

                      break;
                    case '5':
                      $estado = '<small class="label pull-left bg-blue">Verificar</small>';

                      break;
                    case '6':
                      $estado = '<small class="label pull-left bg-blue">Verificado Soporte</small>';

                      break;
                    case '7':
                      $estado = '<small class="label pull-left bg-blue">Confirmado por el cliente</small>';
                  }
                  //  '.$fila[2].'

                  echo '     <tr>
                      <td> 
                     

                      ' . $asunto . '</td>
                      <td>' . $fecha . '</td>
                      <td>' . $estado . '  &nbsp;                      </td>
                      <td>' . $rta . '</td>

                      <td> 
 <a href="https://sievensoft.com/sistema/requerimientoEstado?id=' . $id . '?"  target="_blank"> <i class="fa fa-search" title="Ver el historico"></i></a>  |
                      <a href="https://sievensoft.com/sistema/cerrarSoporte?id=' . $id . '?"  target="_blank"> <i class="fa fa-check-square" title="Cerrar Caso"></i></a>  &nbsp;                      </td>

                      </tr>';
                }
                //<a title="Borrar" href="supportDetalle.php?ID_state='.$fila[0].'""> <i class="fa fa-eye"></i> </a>  

                ?>


                <a href=""></a>
              </tbody>
              <tfoot>
                <tr>
                  <th>Asunto</th>
                  <th>Fecha</th>
                  <th>Estado</th>
                  <th>Respuesta</th>
                  <th></th>
                </tr>
              </tfoot>
            </table>
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
<!-- /.content-wrapper -->
<?php
include 'footer.php';
?>