<?php
include "../header.php";
include "../menu.php";

$idProcedimiento = base64_decode($_GET['FAID']);

$queryUsuario1 = mysqli_query($conn3, "SELECT * FROM planesProcedimiento where id = $idProcedimiento ");
$rowConfig1 = mysqli_fetch_assoc($queryUsuario1);
$idCliente = $rowConfig1['idCliente'];
$idUsuario = $rowConfig1['idUsuario'];
$idPlan = $rowConfig1['idPlan'];

$tabla = 'planesProcedimientoDetalles';
$page = 'PT_procedimientosPlan';

if (isset($_POST['Enviar_Firma'])) {
    $idDetalle = $_POST['idDetalle'];
    $queryList = mysqli_query($conn3, "SELECT * FROM  planesProcedimiento where id = $idProcedimiento");
    // $nrowl = mysqli_num_rows($queryList);
    if ($queryList) {
        while ($rowMotorizado = mysqli_fetch_array($queryList)) {

            $cliente_id = $rowMotorizado['idCliente'];
            $usuario_id = $rowMotorizado['idUsuario'];
            // $receta     = $rowMotorizado['receta'];
        }
    }


    $whatsapp = funcionMaster($cliente_id, 'cliente_id', 'whatsapp', 'cliente');
    $nombre_cliente = funcionMaster($cliente_id, 'cliente_id', 'nombre_cliente', 'cliente');
    // $mensajeW= 'hola wapo';
    $mensajeW = 'Sr(a) *' . $nombre_cliente . '* Se le ha sugerido firmar el siguiente Procedimiento, para proceder abrir el siguiente link ' . $Base . 'firma/firmardocumento/' . $idDetalle . '/planesProcedimientoDetalles/' . $cliente_id;
    $accion = 0;

    whatsapp_sent_cliente($linkkey, $whatsapp, $mensajeW, $cliente_id, $usuario_id, $whatsapp, $accion);
}



?>
<div class="content-wrapper p-3">
    <section class="content">
        <div class="col-xs-12">
            <div class="row">
                <div class="col-md-12">
                    <form action="" id="formProcedimiento" method="POST">
                        <div class="card card-info">
                            <div class="card-header">
                                <div class="float-left">
                                    <label for="">Agregar Procedimiento</label>
                                </div>

                            </div>
                            <div class="card-body">
                                <div class="col-md-12 row">
                                    <div class="col-md-6">
                                        <label for="">PIEZA</label>
                                        <input type="text" class="form-control" name="datos[pieza]">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">TRATAMIENTO</label>
                                        <input type="text" class="form-control" name="datos[tratamiento]">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">COSTO</label>
                                        <input type="text" class="form-control" name="datos[costo]">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">FECHA</label>
                                        <input type="date" class="form-control" name="datos[fechaProc]">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">A/CUENTA</label>
                                        <input type="text" class="form-control" name="datos[acuenta]">
                                    </div>

                                </div>
                                <input type="hidden" name="datos[idPlan]" value="<?= $idPlan ?>">
                                <div class="col-md-12 mt-3">
                                    <center>
                                        <button type="submit" class="btn btn-outline-info rounded-pill" onclick="$('#formProcedimiento').automaticForm({type:<?= ($rowConfig == null ? 1 : 2) ?>, table:'<?= $tabla ?>',page:'<?= $page ?>?FAID=<?= base64_encode($idProcedimiento) ?>',reload:''});">
                                            <i class="fa fa-plus mr-1"></i>
                                            Agregar Procedimiento
                                        </button>
                                    </center>

                                </div>

                            </div>
                        </div>
                    </form>

                </div>
                <div class="col-md-12">
                    <div class="card card-info">
                            <div class="card-header">
                                <div class="float-left">
                                    <label for="">Observaciones</label>
                                </div>
                            </div>
                            <div class="card-body">
                                <label for="">Observaciones</label>
                                <textarea class="form-control" id="" rows="4" onchange="automaticUpdate(this.value, 'observaciones', 'planesProcedimiento', '<?= $idProcedimiento ?>')"><?= $rowConfig1['observaciones'] ?></textarea>
                            </div>
                    </div>
                </div>
                <div class="col-md-12">

                    <div class="card card-info">
                        <div class="card-header">
                            <div class="float-left">
                                <label for="">Historial de Procedimientos Realizados</label>
                            </div>

                        </div>
                        <div class="card-body">
                            <div class="card-body table-responsive">
                                <table class="table table-striped" id="tablaInventario" style="width:100%">

                                    <thead>
                                        <tr>
                                            <td>#</td>
                                            <td>PIEZA</td>
                                            <td>TRATAMIENTO</td>
                                            <td>COSTO</td>
                                            <td>A/CUENTA</td>
                                            <td>SALDO</td>
                                            <td>FECHA</td>
                                            <td>FIRMA</td>
                                            <td>ACCIONES</td>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $queryUsuario1 = mysqli_query($conn3, "SELECT * FROM planesProcedimientoDetalles where idPlan = $idPlan and estado = 1 ");
                                        $contador = 1;
                                        while ($row = mysqli_fetch_assoc($queryUsuario1)) {
                                            $idDetalle = $row['id'];
                                            $tratamiento = $row['tratamiento'];
                                            $costo = $row['costo'];
                                            $acuenta = $row['acuenta'];
                                            $pieza = $row['pieza'];
                                            $fechaProc = $row['fechaProc'];

                                            echo "<tr>";
                                            echo "<td>" . $contador . "</td>";
                                            echo "<td>" . $pieza . "</td>";
                                            echo "<td>" . $tratamiento . "</td>";
                                            echo "<td>" . number_format($costo, 2) . "$</td>";
                                            echo "<td>" . number_format($acuenta, 2) . "$</td>";
                                            echo "<td>" . number_format($saldo, 2) . "$</td>";
                                            echo "<td>" . $fechaProc . "</td>";
                                            echo "<td>";

                                            $queryList = mysqli_query($conn3, "SELECT firma FROM firmas WHERE historia_nombre='planesProcedimientoDetalles' AND historia_id = $idDetalle");
                                            if ($queryList) {
                                                $firma = '';
                                                while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                                    $firma = $rowMotorizado['firma'];
                                                }
                                            }

                                            if (strlen($firma) > 10) {
                                                echo "<img src='$firma' style='width: 55px; height: 35px;'>";
                                            } else {
                                                $ruta = htmlentities($_SERVER['REQUEST_URI']);
                                                echo '<form action="' . $ruta . '" method="POST" name="formularioEnvioExamen">';
                                                echo '<button type="submit" class="btn btn-outline-info  rounded-pill shadow" name="Enviar_Firma">';
                                                echo '<i class="fa fa-pencil-square-o"></i>Solicitar Firma</button>';
                                                echo '<input type="hidden" name="idDetalle" value="' . $idDetalle . '">';
                                                echo '</form>';
                                            }

                                            echo "</td>";
                                            echo "<td class='text-center'>";
                                            if (strlen($firma) > 10) {
                                                echo " ";
                                            } else {
                                            echo "<button onclick=\"automaticUpdate(" . ($row['estado'] == 1 ? 0 : 1) . ",'estado','$tabla','" . $row['id'] . "','$page?FAID=" . base64_encode($idProcedimiento) . "');\" class=\"btn btn-outline-" . ($row['estado'] == 1 ? 'danger' : 'success') . " rounded-pill btn-block\">
                                            <i class=\"fa " . ($row['estado'] == 1 ? 'fa-times' : 'fa-check') . "\"></i>
                                            " . ($row['estado'] == 1 ? 'Eliminar' : 'Activar') . "
                                            </button> ";
                                        }
                                            echo "</td>";
                                            echo "</tr>";
                                            $contador++;
                                        }
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>


                    </div>

                </div>
                    
            </div>
        </div>
</div>
</section>
</div>
<?php include "../footer.php"; ?>
<script>
    $(document).ready(function() {
        $('#tablaInventario').DataTable();
    });
</script>