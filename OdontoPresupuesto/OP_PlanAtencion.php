<?php
try {

    require_once '../header.php';
    require_once '../menu.php';

    $fecha = date("Y-m-d");

    $id = decrypt($_GET['id']);
    $ID_principal = $_SESSION['ID_principal'];
    $QueryUsers = "SELECT ID, NOMBRE_USUARIO FROM usuarios WHERE ID_principal = '$ID_principal'";
    $ResultUsers = mysqli_query($conn3, $QueryUsers);
    $OptionsUsers = "";
    foreach ($ResultUsers as $RowUser) {
        $OptionsUsers .= "<option value='" . $RowUser['ID'] . "'>" . $RowUser['NOMBRE_USUARIO'] . "</option>";
    }

    $cliente_id = funcionMaster($id, 'idOperacion', 'idCliente', 'sOperacionInv ');
    $nombre_cliente = funcionMaster($cliente_id, 'cliente_id', 'nombre_cliente', 'cliente ');
    $documente_cliente = funcionMaster($cliente_id, 'cliente_id', 'CODI_CLIENTE', 'cliente ');
    $correo_cliente = funcionMaster($cliente_id, 'cliente_id', 'correo_cliente', 'cliente ');
    $whatsapp_cliente = funcionMaster($cliente_id, 'cliente_id', 'whatsapp', 'cliente ');

    $QueryCitas = "SELECT soperacioninv_id FROM citas WHERE soperacioninv_id = '$id'";
    $ResultCitas = mysqli_query($conn3, $QueryCitas);
    if (!$ResultCitas) {
        throw new Exception("Ocurrio un error", 1);
    }


    $crearCitas = true;
    if (mysqli_num_rows($ResultCitas) > 0) {
        $crearCitas = false;
        // echo "bad";
        // echo "<script>
        //         Swal.fire({
        //             icon: 'error',
        //             title: 'Error',
        //             text: 'Todas las citas de este presupuesto ya fueron agendadas',
        //         });

        //         history.back();
        //     </script>";
        // die();
    }



?>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>

    <link rel="stylesheet" href="<?= $Base ?>/css/emoji.css">
    <div class="content-wrapper p-3">
        <!-- Main content -->
        <section class="content">
            <div class="">
                <div class="col-xs-12">
                    <div class="col-md-12 row">

                        <div class="row">


                        </div>
                        <div class="col-md-12">
                            <div class="card card-info">
                                <div class="card-header">
                                    <div class="float-left">
                                        <h4> Plan de atencion - Presupuesto de odontograma N° <?= $id ?></h4>
                                        <h6> <b>Cliente: </b> <?= $nombre_cliente ?> - <b>Documento: </b> <?= $documente_cliente ?></h6>
                                    </div>
                                </div>
                                <form>
                                    <input type="hidden" id="sdetalle_oper_id" value="<?= $id ?>">

                                    <div class="card-body row">

                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <?php  if (!$crearCitas) { ?>
                                                    <tr>
                                                        <th colspan="8" class="text-center">Citas agendadas</th>
                                                    </tr>
                                                    <?php } ?>
                                                    <tr>
                                                        <th style="width: 10%;"></th>
                                                        <th style="width: 10%;">Pieza</th>
                                                        <th style="width: 10%;">Cara</th>
                                                        <th style="width: 15%;">Procedimiento</th>
                                                        <th style="width: 15%;">Doctor</th>
                                                        <th style="width: 10%;">Fecha</th>
                                                        <th style="width: 10%;">Hora</th>
                                                        <th style="width: 10%;">Tipo</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="citasList">
                                                    <?php
                                                    if ($crearCitas) {


                                                        $QueryDetalle = "SELECT * FROM sDetalleOper WHERE idOperacion = '$id' ";
                                                        $ResultDetalle = mysqli_query($conn3, $QueryDetalle);
                                                        foreach ($ResultDetalle as $indexRow => $RowDetalle) {
                                                            $od_presupuesto_detalle_id = $RowDetalle['od_presupuesto_detalle_id'];
                                                            $QueryDetalleOdontograma = "SELECT * FROM OP_PresupuestoDetalle WHERE id = '$od_presupuesto_detalle_id' ";
                                                            $ResultDetalleOdontograma = mysqli_query($conn3, $QueryDetalleOdontograma);
                                                            $RowDetalleOdontograma = mysqli_fetch_assoc($ResultDetalleOdontograma);


                                                    ?>
                                                            <tr id="filaCitaList<?= $indexRow ?>">
                                                                <td style="width: 10%; display: flex; align-items:center; justify-content:center" class="text-center">
                                                                    <input type="hidden" name="datos[<?= $indexRow ?>][od_presupuesto_detalle_id]" value="<?= $od_presupuesto_detalle_id ?>">
                                                                    <input type="hidden" name="datos[<?= $indexRow ?>][presupuesto_detalle_id]" value="<?= $RowDetalle["id"] ?>">
                                                                    <input type="hidden" name="datos[<?= $indexRow ?>][soperacioninv_detalle_id]" value="<?= $id ?>">

                                                                    <img style="max-height:40px" src="<?= $Base . 'OD_ImagenOdontograma/' . $RowDetalleOdontograma["pieza_id"] . ".png" ?>" alt="">
                                                                </td>
                                                                <td style="width: 10%;">
                                                                    <input type="hidden" name="datos[<?= $indexRow ?>][pieza_id]" value="<?= $RowDetalleOdontograma["pieza_id"] ?>"><?= $RowDetalleOdontograma["pieza_id"] ?>
                                                                </td>
                                                                <td style="width: 10%;">
                                                                    <input type="hidden" name="datos[<?= $indexRow ?>][cara]" value="<?= $RowDetalleOdontograma["cara"] ?>"><?= $RowDetalleOdontograma["cara"] ?>
                                                                </td>
                                                                <td style="width: 15%;">
                                                                    <select class="select2" name="datos[<?= $indexRow ?>][procedimiento]" style="width:100%">
                                                                        <option value="<?= $RowDetalleOdontograma["procedimiento_id"] ?>"><?= $RowDetalle["nombre_procedimiento_odontograma"] ?></option>
                                                                    </select>
                                                                </td>
                                                                <td style="width: 15%;">
                                                                    <select class="select2" style="width:100%" onchange="validarHorarios(<?= $indexRow ?>)" name="datos[<?= $indexRow ?>][doctor]">
                                                                        <option value="">Seleccione</option>
                                                                        <?= $OptionsUsers ?>
                                                                    </select>
                                                                </td>
                                                                <td style="width: 10%;">
                                                                    <input type="date" min="<?= date('Y-m-d') ?>" onchange="validarHorarios(<?= $indexRow ?>)" name="datos[<?= $indexRow ?>][fecha]" value="<?= date("Y-m-d") ?>" class="form-control">
                                                                </td>
                                                                <td style="width: 10%;">
                                                                    <input type="time" onchange="validarHorarios(<?= $indexRow ?>)" name="datos[<?= $indexRow ?>][hora]" value="" class="form-control">
                                                                </td>
                                                                <td style="width: 10%;">
                                                                    <select class="select2" style="width:100%" name="datos[<?= $indexRow ?>][tipo]">
                                                                        <option value="0">Presencial</option>
                                                                        <option value="1">Virtual</option>
                                                                    </select>
                                                                </td>
                                                            </tr>

                                                    <?php }
                                                    }else{

                                                        $QueryCitas = "SELECT * FROM citas WHERE soperacioninv_id = '$id'  ";
                                                        $ResultCitas = mysqli_query($conn3, $QueryCitas);

                                                        foreach ($ResultCitas as $RowCitas) { 
                                                            $presupuesto_odontograma_detalle_id = $RowCitas["oddetalleoper_id"]; 

                                                            $QueryDetalleOdontograma = "SELECT * FROM OP_PresupuestoDetalle WHERE id = '$presupuesto_odontograma_detalle_id'";
                                                            $ResultDetalleOdontograma = mysqli_query($conn3, $QueryDetalleOdontograma);
                                                            $RowDetalleOdontograma = mysqli_fetch_assoc($ResultDetalleOdontograma);



                                                        ?>
                                                        <tr>
                                                                <td style="width: 10%; display: flex; align-items:center; justify-content:center" class="text-center">
                                                                    <img style="max-height:40px" src="<?= $Base . 'OD_ImagenOdontograma/' . $RowDetalleOdontograma["pieza_id"] . ".png" ?>" alt="">
                                                                </td>
                                                                <td style="width: 10%;">
                                                                    <input type="hidden" name="datos[<?= $indexRow ?>][pieza_id]" value="<?= $RowDetalleOdontograma["pieza_id"] ?>"><?= $RowDetalleOdontograma["pieza_id"] ?>
                                                                </td>
                                                                <td style="width: 10%;">
                                                                    <input type="hidden" name="datos[<?= $indexRow ?>][cara]" value="<?= $RowDetalleOdontograma["cara"] ?>"><?= $RowDetalleOdontograma["cara"] ?>
                                                                </td>
                                                                <td style="width: 15%;">
                                                                    <?= funcionMaster($RowCitas["odprocedimiento_id"], "id", "Nombre", "OD_Procedimiento")  ?>
                                                                </td>
                                                                <td style="width: 15%;">
                                                                    <?= funcionMaster($RowCitas["doctor"], "ID", "NOMBRE_USUARIO", "usuarios") ?>
                                                                </td>
                                                                <td style="width: 10%;">
                                                                    <?=$RowCitas["fecha"]?>
                                                                </td>
                                                                <td style="width: 10%;">
                                                                    <?=$RowCitas["Hora"]?>
                                                                </td>
                                                                <td style="width: 10%;">
                                                                    <?=$RowCitas["tipo"] == '0' ? 'Presencial' : 'Virtual'?>
                                                                </td>
                                                            </tr>
                                                        
                                                        <?php }

                                                    } ?>

                                                </tbody>
                                                <tfoot>
                                                    <?php if ($crearCitas) { ?>
                                                        <tr>
                                                            <td colspan="4">
                                                                <label for="">Email</label>
                                                                <input class="form-control" type="email" id="correo_cliente" value="<?= $correo_cliente ?>">
                                                            </td>
                                                            <td colspan="4">
                                                                <label for="">Whatsapp</label>
                                                                <input class="form-control" type="text" id="whatsapp_cliente" value="<?= $whatsapp_cliente ?>">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="8" class="text-end">
                                                                <button class="btn btn-md rounded-pill btn-outline-info" id="btnSubmit" type="button" onclick="guardarCitas()">
                                                                    <i class="fas fa-plus"></i>&nbsp;Guardar
                                                                </button>
                                                            </td>
                                                        </tr>

                                                    <?php } ?>
                                                </tfoot>
                                            </table>

                                        </div>

                                    </div>
                                    <div class="card-footer"> </div>
                                </form>
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

    <?php require_once '../footer.php'; ?>

    <script type="text/javascript">
        const AjaxPath = '<?= $Base ?>OdontoPresupuesto/ajax/OP_PlanAtencion_Ajax.php';
        const BasePATH = '<?=$Base?>';
        const sucursal = '<?= $_SESSION["sucursal"] ?>';
        const ID_principal = '<?= $_SESSION["ID_principal"] ?>';
        const usuario_id = '<?= $_SESSION["ID"] ?>';
        const cliente_id = '<?= $cliente_id ?>';
    </script>

    <script src="<?= $Base ?>OdontoPresupuesto/js/functionsPlanAtencion.js"></script>

    <style>
        #table {
            overflow-y: scroll;
        }

        /* Estiliza la barra de desplazamiento en general */
        #table::-webkit-scrollbar {
            width: 10px;
            /* Ancho de la barra vertical */
            height: 10px;
            /* Altura de la barra horizontal */
        }

        /* Estiliza el riel de la barra (fondo) */
        #table::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 5px;
        }

        /* Estiliza el pulgar (la parte que se mueve) */
        #table::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 5px;
        }

        /* Cambia el color al pasar el mouse */
        #table::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
    </style>

<?php
} catch (\Throwable $th) {
    echo "<script>alert(`" . $th->getMessage() . " Linea: " . $th->getLine() . "`);</script>";
}

?>