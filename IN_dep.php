<?php
include 'header.php';
include 'menu.php';
// -----------------------------------------------------
// impoltante tener estas dos variables para el formulario auotomatico
$tabla = "dep";
$idUpdate = base64_decode($_GET['C']);
// -----------------------------------------------------
?>
<!--
<div class="app-inner-layout__wrapper">
  <div class="app-inner-layout__content">
    <div class="tab-content">
      <div class="container-fluid">
        <div class="mb-3 card">

          <div class="no-gutters row">
            <div class="col-md-12">-->


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <br>

    <section class="content">

        <div class="box box-info" align="center">

            <div class="card-body">

                <div class="card-header-title font-size-lg text-capitalize font-weight-normal row">
                    <div class="col-md-3">
                        <?php if ($idUpdate) : ?>
                            <a href="IN_dep" class="btn btn-block btn-outline-success btn-lg rounded-pill shadow">Nuevo</a>
                        <?php endif ?>
                    </div>
                    <div class="col-md-6">
                        <h2>Almacenes (Depósitos)</h2>
                    </div>
                    <div class="col-md-3">
                        <ul class="nav nav-justified">
                            <li class="nav-item col-md-12" style="display: contents;"><a data-toggle="tab" style="margin-bottom: 10px;" href="#tab-eg-0" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow active"><?= ($idUpdate) ? 'Editar ' . funcionMaster($idUpdate, 'id', 'descripcion', $tabla) : 'Nuevo' ?></a>
                            </li>
                            <li class="nav-item col-md-12" style="display: contents;"><a data-toggle="tab" style="margin-bottom: 10px;" href="#tab-eg-1" class="btn btn-block btn-outline-secondary btn-lg rounded-pill shadow">Ver Todos</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <hr>


                <div class="tab-content">
                    <div class="tab-pane show active" id="tab-eg-0" role="tabpanel">
                        <!-- nuevo -->
                        <form id="dep-form">
                            <div class="form-row">

                                <div class="form-group col-md-12">
                                    <div align="left"> Nombre </div>
                                    <input type="text" class="form-control input-lg" id="descripcion" name="datos[descripcion]" placeholder="Descripcion" required>
                                </div>
                                <br>
                                <div class="form-group col-md-12">
                                    <div align="left"> Sucursal </div>
                                    <select name="datos[idSucursal]" class="form-control input-lg">
                                        <option value="">Seleccione</option>
                                        <?php
                                        $sql = "SELECT * FROM sucursales where (ID_principal = '{$_SESSION['ID']}' or ID_principal = '{$_SESSION['ID_principal']}')";
                                        $result = mysqli_query($conn3, $sql);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                            <option value="<?= $row['id'] ?>"><?= $row['descripcion'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-12">
                                    <div align="left">Notas</div>
                                    <textarea id="nota" name="datos[nota]" class="textarea" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                </div>

                                <input type="hidden" name="datos[usuario_id]" value="<?php echo $_SESSION['ID'] ?>">
                                <input type="hidden" name="datos[ID_principal]" value="<?=$_SESSION['ID_principal']?>">

                            </div>
                            <button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">Guardar</button>



                        </form>
                    </div>


                    <div class="tab-pane" id="tab-eg-1" role="tabpanel">
                        <!-- lista -->
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-striped table-bordered" id="tablaN">
                                    <?php
                                    $tableColumna = [
                                        'Descripción',
                                        'Notas',
                                        'Sucursal',
                                        'Opciones'
                                    ];
                                    ?>
                                    <thead>
                                        <tr>
                                            <?php
                                            foreach ($tableColumna as $columna) {
                                                echo "<th>$columna</th>";
                                            }
                                            ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $querydep = "SELECT * from dep where (ID_principal = '{$_SESSION['ID']}' or ID_principal = '{$_SESSION['ID_principal']}') and activo = 1";
                                        $resultdep = mysqli_query($conn3, $querydep);
                                        while ($rowdep = mysqli_fetch_assoc($resultdep)) {
                                        ?>
                                            <tr class="center text-center">
                                                <td><?= $rowdep['descripcion'] ?></td>
                                                <td><?= $rowdep['nota'] ?></td>
                                                <td><?= funcionMaster($rowdep['idSucursal'], 'id', 'descripcion', 'sucursales') ?>
                                                </td>
                                                <td>
                                                    <a href="IN_dep?C=<?= base64_encode($rowdep['id']) ?>" class="btn btn-light" title="editar">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <button class="btn btn-danger" title="eliminar" onclick="alerts({
    title: 'Seguro que desea eliminar este registro?',
    text: '',
    icon: 'info',
    update: '0|/|activo|/|<?= $tabla ?>|/|<?= $rowdep['id'] ?>|/|IN_dep'
});">
                                                        <i class="fas fa-close"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <?php
                                            foreach ($tableColumna as $columna) {
                                                echo "<th>$columna</th>";
                                            }
                                            ?>
                                    </tfoot>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>

                <input type="hidden" name="ID_Doctor" class="form-control input-lg input-lg" value="<?php echo $_SESSION['ID'] ?>">


            </div>




    </section>

    <?php echo $mensaje_registro_patients; ?>

    <!-- /.content -->
</div>
<!-- /.content-wrapper -->



<!--</div>
          </div>
        </div>
      </div>
    </div>
  </div>-->


<?php include 'footer.php' ?>




<script>
    $(document).ready(function() {
        $('#tablaN').DataTable({
            paging: true, // Enable pagination
            searching: true, // Enable search bar
            ordering: true // Enable sorting
        });
    });

    // formulario automatico

    $(document).ready(function() {
        timezone = Intl.DateTimeFormat().resolvedOptions().timeZone.split("/");
        $('#dep-form').creatorForm({
            automaticForm: {
                type: <?= $idUpdate ? 2 : 1 ?>,
                idUpdate: <?= $idUpdate ? $idUpdate : "'sadasd'" ?>
            },
            sweetalert2: false,
            btnReferences: '#configForm',
            contentReferences: '#dep-form',
            table: '<?= $tabla ?>',
            reload: '',
            page: 'IN_dep'
        });
    });
</script>