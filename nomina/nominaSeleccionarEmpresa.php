<?php
include '../header.php';
include '../menu.php';
$ID = $_SESSION['ID'];

$queryEmpresa = "SELECT * from nominaEmpresas where activo = activo";
$resultEmpresa = mysqli_query($conn3, $queryEmpresa);
$rowEmpresa = [];
while ($row = mysqli_fetch_array($resultEmpresa)) {
    $rowEmpresa[] = $row;
}
$p = base64_decode($_GET['p']);
$n = base64_decode($_GET['n']);

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
                                <div class="float-left">
                                    <h4>Seleccione una empresa para incluir <strong><?= $n ?></strong></h4>
                                </div>
                            </div>
                            <form method="get" action="<?= $p ?>">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="">Empresa</label>
                                        <select name="e" class="form-control select2">
                                            <?php if ($n <> 'Empleados') : ?>
                                                <option value="<?=base64_encode('0')?>">Todas [Global]</option>
                                            <?php endif ?>                                            
                                            <?php foreach ($rowEmpresa as $key => $value) : ?>
                                                <option value="<?= base64_encode($value['id']) ?>"><?= $value['nombre'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-outline-info rounded-pill">
                                            <i class="fas fa-chevron-right"></i>
                                            Ir a [<?= $n ?>]
                                        </button>
                                    </div>
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