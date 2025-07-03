<!-- Left side column. contains the logo and sidebar -->
<?php
include 'header.php';
include 'menu.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>

      Odontograma Inicial

    </h1>
    <ol class="breadcrumb">
      <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
      <li><a href="#">Pacientes</a></li>
    </ol>
  </section>



  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <?php
        $msg = $_GET['msg'];
        if ($msg == '1') {
          echo '  <div class="callout callout-info ">
            <h4> Cliente ya Registrado!</h4>

            <p>   </p>
          </div>';
        }

        if ($msg == '2') {
          echo '
            <div class="callout callout-info ">
            <h4> Cliente Registrado!</h4>

            <p>   </p>
          </div>';
        }
        if ($msg == '3') {
          echo '
            <div class="callout callout-info ">
            <h4> Cliente Actualizado!</h4>

            <p>   </p>
          </div>';
        }
        ?>

        <div class="box">
          <div class="box-header">
            <a href="nuevoPaciente">
              <button class="btn btn-block btn-primary btn-sm">
                <h4> <strong> <i class="fa fa-glyphicon glyphicon-plus"></i> Registrar Pacientes </strong></h4>
              </button>
            </a>

          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Cedula</th>

                  <th>Entidad de Salud</th>
                  <th>Seguro</th>
                  <th> </th>

                </tr>
              </thead>
              <tbody>
                <?php

                $ID = $_SESSION['ID'];

                if ($_SESSION['vista'] == 0) {

                  $resultado = mysqli_query($conn3, "SELECT * FROM  cliente order by cliente_id");
                } elseif ($_SESSION['vista'] == 1) {
                  $resultado = mysqli_query($conn3, "SELECT * FROM  cliente where usuario_id =$ID  order by cliente_id");
                  echo "SELECT * FROM  cliente where usuario_id =$ID  order by cliente_id";
                }


                $nrowl = mysqli_num_rows($resultado);
                while ($rowPacientes = mysqli_fetch_array($resultado)) {
                  $cliente_id = $rowPacientes['cliente_id'];
                  $nombre_cliente = $rowPacientes['nombre_cliente'];
                  $CODI_CLIENTE = $rowPacientes['CODI_CLIENTE'];
                  $celular_cliente = $rowPacientes['celular_cliente'];
                  $correo_cliente = $rowPacientes['correo_cliente'];
                  $telefono_cliente = $rowPacientes['telefono_cliente'];
                  $entidadSalud = $rowPacientes['entidadSalud'];
                  $seguro = $rowPacientes['seguro'];


                  echo '     <tr>';



                  echo '<td><a href="odontograma.php?clienteId=' . $cliente_id . '" title="Odontograma">' . $nombre_cliente . ' </a></td>';







                  echo '
                  <td>' . $CODI_CLIENTE . '</td>
                  <td>' . $entidadSalud . '</td>
                  <td>' . $seguro . '</td>
                
                  <td>';

                  echo '<a href="odontograma.php?clienteId=' . $cliente_id . '" title="Odontograma"><i class="fa fa-th"></i> </a>';
                  
                  echo '<a href="odontogramaMaster.php?clienteId=' . $cliente_id . '" title="Odontograma"><i class="fa fa-th-large"></i> </a>';
                  echo '<a href="indiceOleary.php?clienteId=' . $cliente_id . '" title="Indice de O\'leary" class="text-success"><i class="fa fa-tooth"></i> </a>';
                  echo '<a href="consultaClientePlaca.php?clienteId=' . $cliente_id . '" title="Ver Observaciones"><i class="fa fa-search"></i> </a>';









                  echo '</td>
           
                </tr>';
                }


                ?>



              </tbody>
              <tfoot>
                <tr>
                  <th>Nombre</th>
                  <th>Cedula</th>

                  <th>Entidad de Salud</th>
                  <th>Seguro</th>
                  <th> </th>
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