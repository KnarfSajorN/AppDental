<?php
include '../header.php';
include '../menu.php';

$ID = $_SESSION['ID'];
$tabla = "asistenteVirtualConfig";
$page = 'asistente';
// // cargar datos
// if ($_GET['FAID']) {
//     $FAID = base64_decode($_GET['FAID']);
//     $queryConfig = "SELECT * from $tabla where id = $FAID limit 1";
//     $resultConfig = mysqli_query($conn3, $queryConfig);
//     $rowConfig = mysqli_fetch_array($resultConfig);
// }

if (tablaExiste($tabla)) {
    $queryConfig = "SELECT * from $tabla where usuarioId = $ID limit 1";
    $resultConfig = mysqli_query($conn3, $queryConfig);
    $rowConfig = mysqli_fetch_assoc($resultConfig);
}

?>


<div class="content-wrapper p-3">
    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="col-xs-12">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <h4 class="card-title">Configuración Asistente Virtual</h4>
                                <div class="card-tools">
                                    <ul class="nav nav-pills ml-auto">
                                        <li class="nav-item">
                                            <button class="btn btn-default rounded-pill " onclick="location.href='<?= $Base ?>asistenteV'">
                                                <i class="fa fa-arrow-right"></i>
                                                Ir al asistente
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <form id="asistenteForm">
                                <div class="card-body row">
                                    <div class="form-group col-md-12">
                                        <label for="">Nombre</label>
                                        <input type="text" class="form-control" id="" name="datos[nombre]" value="<?= $rowConfig['nombre'] ?>">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">Idioma</label>
                                        <select name="datos[idioma]" id="idioma" class="form-control" value="<?= $rowConfig['idioma'] ?>">
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">Saludo</label>
                                        <input type="text" class="form-control" id="" name="datos[saludo]" value="<?= $rowConfig['saludo'] ?>">
                                    </div>
                                    <!-- <div class="col-md-12">
                                        <label for="">Modo de uso</label>
                                        <select name="datos[modoUso]" id="modoUso" class="form-control">
                                            <option value="true" <?= ($rowConfig['modoUso'] == 'true' ? 'selected' : '') ?>>Continuo [Siempre a la escucha]</option>
                                            <option value="false" <?= ($rowConfig['modoUso'] == 'false' ? 'selected' : '') ?>>On Demand [Solo cuando se requiera]</option>
                                        </select>
                                    </div> -->



                                </div>
                                <div class="card-footer">
                                    <input type="hidden" name="datos[activo]" value="1">
                                    <input type="hidden" name="datos[usuarioId]" value="<?= $ID ?>">
                                    <input type="hidden" name="datos[fecha]" value="<?= date('y-m-d H:i:s') ?>">
                                    <button type="submit" class="btn btn-outline-info rounded-pill" onclick="$('#asistenteForm').automaticForm({type:<?= ($rowConfig == null ? 1 : 2) ?>, table:'<?= $tabla ?>',idUpdate:'<?= ($rowConfig == null ? 0 : $rowConfig['id']) ?>',reload:'',page:'<?= $page ?>?FAID='});">
                                        <i class="fa fa-save mr-1"></i>
                                        Guardar
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <h4 class="card-title">Acciones del asistente</h4>
                            </div>
                            <div class="card-body">
                                <div class="center text-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary" title="todos" data-toggle="tooltip" onclick="filtrarOpcion(0)">
                                            <i class="fa fa-circle" style="color: white"></i>
                                        </button>
                                        <?php
                                        $arrayTipos = [
                                            [
                                                'id' => 1,
                                                'color' => 'info',
                                                'nombre' => 'Médicas'
                                            ],
                                            [
                                                'id' => 2,
                                                'color' => 'maroon',
                                                'nombre' => 'Comunicación'
                                            ],
                                            [
                                                'id' => 3,
                                                'color' => 'purple',
                                                'nombre' => 'Multimedia'
                                            ],
                                            [
                                                'id' => 4,
                                                'color' => 'olive',
                                                'nombre' => 'Otras'
                                            ],
                                        ];
                                        foreach ($arrayTipos as $rowTipos) { ?>
                                            <button type="button" class="btn btn-default" title="<?= $rowTipos['nombre'] ?>" data-toggle="tooltip" onclick="filtrarOpcion(<?= $rowTipos['id'] ?>)">
                                                <i class="fa fa-circle text-<?= $rowTipos['color'] ?>"></i>
                                            </button>
                                        <?php } ?>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <?php
                                    $queryCommands = "SELECT * from asistenteVirtualCommands where estado = 1 order by categoria";
                                    $resultCommands = mysqli_query($conn3, $queryCommands);
                                    while ($rowCommands = mysqli_fetch_array($resultCommands)) {
                                    ?>

                                        <div class="col-lg-3 col-6" data-categoria="<?= $rowCommands['categoria'] ?>">
                                            <div class="small-box bg-<?= $rowCommands['color'] ?>">
                                                <?php if (funcionMaster($rowCommands['id'], 'usuarioId = "' . $_SESSION['ID'] . '" and activo = 1 and  commandId', 'count(id)', 'asistenteVirtualCommandsUsers') == 1) { ?>
                                                    <div class="ribbon-wrapper">
                                                        <div class="ribbon bg-light">
                                                            Activo
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                                <div class="inner">
                                                    <h4><strong><?= $arrayTipos[$rowCommands['categoria'] - 1]['nombre'] ?></strong></h4>
                                                    <p><?= $rowCommands['nombre'] ?></p>
                                                </div>
                                                <div class="icon">
                                                    <i class="<?= $rowCommands['icon'] ?>"></i>
                                                </div>
                                                <a href="<?= $Base ?>asistenteConfig?FAID=<?= base64_encode($rowCommands['id']) ?>" class="small-box-footer">Configuración <i class="fas fa-arrow-circle-right"></i></a>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>

                            </div>
                        </div>
                    </div>



                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
    </section>
    <!-- /.content -->

</div>
<!-- /.content-wrapper -->
<?php
include '../footer.php';
include 'artyomConfig.php';
?>
<script>


    $(document).ready(function() {

        setTimeout(() => {
            // cargar idiomas
            var select = $('#idioma');
            // recorrer objeto AssistantIdiomasDetectados
            var voces = Object.keys(AssistantIdiomasDetectados);
            const vozActual = '<?= $rowConfig['idioma'] ?>';
            voces.forEach((element) => {
                select.append(`<option value="${AssistantIdiomasDetectados[element]['lang']}" ${vozActual == AssistantIdiomasDetectados[element]['lang'] ? 'selected' : ''} >${AssistantIdiomasDetectados[element]['name']} [${AssistantIdiomasDetectados[element]['lang']}]</option>`)
            })
        }, 1000);
    });
</script>