<?php
include '../header.php';
include '../menu.php';

$idAtencion = base64_decode($_GET['iA']);
$link = base64_decode($_GET['l']);

// query 
$query = "SELECT * from planes_atencion_detalle where id = '{$idAtencion}'";
$result = mysqli_query($conn3, $query);
$row = mysqli_fetch_assoc($result);
?>
<div class="content-wrapper p-3">
    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="col-xs-12">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <div class="float-left">
                                    <h4>Finalizar Atención: <strong><?=$row['atencion']?></strong></h4>
                                </div>
                            </div>
                            <form id="planForm">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="">Notas</label>
                                        <textarea class="form-control" name="datos[notas]" id="notas" rows="2"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Firma</label>
                                        <div class="row">
                                            <?php
                                            $_GET['n'] = 1;
                                            $_GET['h'] = '200';
                                            $_GET['w'] = '400';
                                            $_GET['timer'] = '800';
                                            $_GET['disableTools'] = 1;
                                            $_GET['automaticForm'] = 1;
                                            include '../rayado.php';
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <input type="hidden" name="datos[estado]" value="1">
                                    <input type="hidden" name="datos[idUsuario]" value="<?= $_SESSION['ID'] ?>">
                                    <input type="hidden" name="datos[fechaAtencion]" value="<?= date('y-m-d H:i:s') ?>">
                                    <button type="submit" class="btn btn-outline-primary rounded-pill" onclick="$('#planForm').automaticForm({type:2, table:'planes_atencion_detalle',idUpdate:'<?=$idAtencion?>',reload:'',page:'https://<?= $link ?>&FAID='});">
                                        <i class="fa fa-save mr-1"></i>
                                        Guardar
                                    </button>
                                </div>
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
<!-- /.content-wrapper -->

<?php
include '../footer.php';
?>