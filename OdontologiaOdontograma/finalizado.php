<?php

require_once '../header.php';
require_once '../menu.php';

$idHistoria = decrypt($_GET['id']);
$Tabla = "OBO_Historia";
$Query = "SELECT * FROM {$Tabla} WHERE id = '$idHistoria' ";
$ResultQuery = mysqli_query($conn3, $Query);
$RowH = mysqli_fetch_array($ResultQuery);

$cliente_id = $RowH["cliente_id"];

?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->

    <section class="content box p-4">

        <br>
        <br>
        <div align="center">

            <a class="btn btn-outline-info btn-lg rounded-pill shadow"
                href="<?php echo $Base; ?>OBO_Pacientes">
                <i class="fa fa-heartbeat"></i> Nueva Consulta
            </a>

            <a class="btn btn-outline-info btn-lg rounded-pill shadow"
                href="<?php echo $Base; ?>agregarCitas?cI=<?= encrypt($cliente_id); ?>">
                <i class="fa fa-calendar-check-o"></i> Agregar Cita
            </a>

            <a class="btn btn-outline-info btn-lg rounded-pill shadow"
                href="<?php echo $Base; ?>SclienteAdministracion_facturas">
                <i class="fa fa-plus"></i> Facturas
            </a>


        </div>



        <hr>

        <?php
                $rutaPlantilla = $Base . 'OBO_ImprimirPlantilla?id=' . $_GET['id'];
                $botonesImprimir = [
                    ['Historia', base64_encode($rutaPlantilla)],
                ];
                $_GET['botones'] = base64_encode(json_encode($botonesImprimir));
                require_once '../creadorImpresiones/seleccionarMetodoImpresion.php';
        ?>

        <div align="center" id="HistoriaPrincipal">
            <a class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank"
                href="<?php echo $Base; ?>OBO_Imprimir?id=<?=$_GET['id']?>">
                <i class="fa fa-print"></i> Imprimir Consulta
            </a>
        </div>

        

        <div align="center">
            <hr>
        </div>



    </section>


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
<div class="modal fade" id="modalEnvio" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                <form action="<?php echo ($ruta) ?>" method="POST" name="formularioEnvioExamen">
                    <div class="form-group">
                        <label for="inputEmail">Whatsapp</label>
                        <input type="number" class="form-control" name="numero_whatsapp" value="<?= $whatsapp ?>" />
                        <label for="inputEmail">Correo</label>
                        <input type="text" class="form-control" name="correo" value="<?= $correo_cliente ?>" />
                        <input type="hidden" name="cliente_id" id="cliente_id">
                        <input type="hidden" name="id" id="id">
                        <input type="hidden" name="NombreTablaInformacion" id="NombreTablaInformacion">
                    </div>

                    <button type="button" class="btn btn-outline-secondary rounded-pill" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-outline-info rounded-pill submitBtn" id="Boton_Enviar">Enviar</button>
                    <!-- <button type="submit" class="btn btn-outline-success rounded-pill submitBtn" id="Boton_Firmar_Ahora">Firmar ahora</button> -->

                    <div id="Div_Boton_Firmar_Ahora" style="float:right;"></div>

                </form>
            </div>
        </div>
    </div>
</div>

<?php require_once "../footer.php" ?>
