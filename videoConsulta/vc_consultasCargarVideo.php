<?php
include '../header.php';
include '../menu.php';
$idCitas = base64_decode($_GET['iDc']);

// consulta a citas
$queryCitas  = "SELECT * from citas where idCitas = {$idCitas}";
$resultCitas = $conn3->query($queryCitas);
$rowCitas    = $resultCitas->fetch_assoc();
// var_dump($rowCitas);
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="col-md-12">
                <h4 class="Titulo_Pagina">Grabación al sistema</h4>

                <div class="card">
                    <form id="VideoForm">
                        <div class="card-header bg-info">
                            <h3 class="card-title">Cargar grabación al sistema</h3>
                        </div>
                        <div class="card-footer">
                            <p class="m-0"><strong>Cita:</strong> <?= $rowCitas['idCitas'] ?></p>
                            <p class="m-0"><strong>Fecha:</strong> <?= $rowCitas['fecha'] ?></p>
                            <p class="m-0"><strong>Hora:</strong> <?= $rowCitas['Hora'] ?></p>
                            <p class="m-0"><strong>Paciente:</strong> <?= $rowCitas['nombre'] ?></p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="archivos[nombre|videos/]" accept="video/*">
                                            <label class="custom-file-label" for="exampleInputFile">Seleccionar archivo</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <input type="hidden" name="datos[fecha]" value="<?= date('Y-m-d') ?>">
                            <input type="hidden" name="datos[hora]" value="<?= date('H:i:s') ?>">
                            <input type="hidden" name="datos[idUsuario]" value="<?= $_SESSION['ID'] ?>">
                            <input type="hidden" name="datos[idCliente]" value="<?= $rowCitas['idCliente'] ?>">
                            <input type="hidden" name="datos[idCitas]" value="<?= $rowCitas['idCitas'] ?>">

                            <button type="submit" class="btn btn-outline-info rounded-pill" onclick="$('#VideoForm').automaticForm({type:1,idUpdate:0,table:'videos',reload:'',page:'videoConsultas'});">
                                <i class="fas fa-upload"></i>
                                Cargar
                            </button>

                        </div>
                    </form>
                </div>

                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive no-padding">
                            <table id="Tabla_Rapida_AJAX" class="table table-bordered table-striped" style="font-size:18px">
                                <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Nombre</th>
                                        <th></th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<script>
    //version 2 tabla rapida id="Tabla_Rapida_AJAX"
    var titulo_tabla = "Citas";
    query_tabla_ajax = "<?php echo "SELECT * from videos where idCitas = {$idCitas}"; ?>";

    // console.log(query_tabla_ajax);
    columnas = ['id','nombre','fecha','hora','idUsuario','idCliente','idCitas'];

    columnastablas = [{
            "data": function(row, type, set) {
                datos = ``;
                datos = `${row.fecha} - ${row.hora}`;
                return datos;
            }
        },
        {
            "data": function(row, type, set) {
                datos = ``;
                datos = `${row.nombre}`;
                return datos;
            }
        },
        {
            "data": function(row, type, set) {
                datos = ``;
                datos += `<a href="videos/${row.nombre}" target="_blank">
                <button type="button" class="m-2 btn btn-block btn-outline-info rounded-pill shadow">
                    <i class="fas fa-play mr-2"></i>
                    ver video
                </button></a>`;
                return datos;
            }
        },
    ];
</script>


<?php
include "../footer.php";
?>