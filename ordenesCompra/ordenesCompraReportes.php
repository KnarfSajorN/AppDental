<?php

// verificar tablas creadas
include '../header.php';
include '../menu.php';
$ID = $_SESSION['ID'];

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
                                    <h4>Ordenes de Compra x numero de Orden</h4>
                                </div>
                            </div>
                            <form action="./ordenesCompraReportesVer" method="POST">
                                <div class="card-body row">
                                    <div class="form-group col-md-12">
                                        <div class="row m-0 p-0">
                                            <div class="col-md-4">
                                                <label for="">Fecha Desde</label>
                                                <input type="date" class="form-control" name="fechaD" required value="<?= date('Y-m-01') ?>">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">Fecha Hasta</label>
                                                <input type="date" class="form-control" name="fechaH" required value="<?= date('Y-m-d') ?>">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">Estado</label>
                                                <select name="estado" class="form-control">
                                                    <option value="99">Todos</option>
                                                    <option value="0">PENDIENTE</option>
                                                    <option value="1">APROBADA</option>
                                                    <option value="2">PROCESADO</option>
                                                    <option value="3">RECHAZADA</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <input type="hidden" name="tipo" value="odc">
                                    <button class="btn btn-outline-info rounded-pill" type="submit">
                                        <i class="fa fa-print"></i>
                                        Generar Reporte
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <div class="float-left">
                                    <h4>Ordenes de Compra x Proveedor</h4>
                                </div>
                            </div>
                            <form action="./ordenesCompraReportesVer" method="POST">
                                <div class="card-body row">
                                    <div class="form-group col-md-12">
                                        <div class="row m-0 p-0">
                                            <div class="col-md-4">
                                                <label for="">Fecha Desde</label>
                                                <input type="date" class="form-control" name="fechaD" required value="<?= date('Y-m-01') ?>">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">Fecha Hasta</label>
                                                <input type="date" class="form-control" name="fechaH" required value="<?= date('Y-m-d') ?>">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">Estado</label>
                                                <select name="estado" class="form-control">
                                                    <option value="99">Todos</option>
                                                    <option value="0">PENDIENTE</option>
                                                    <option value="1">APROBADA</option>
                                                    <option value="2">PROCESADO</option>
                                                    <option value="3">RECHAZADA</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">Proveedor</label>
                                                <select name="proveedor" class="form-control">
                                                    <option value="0">Todos</option>
                                                    <?php
                                                    $query = "SELECT * from sproveedores where Activo = 1;";
                                                    $result = mysqli_query($conn3, $query);
                                                    while ($row = mysqli_fetch_array($result)) {
                                                        echo '<option value="' . $row['id'] . '">' . $row['rut'] . ' | ' . $row['nombre'] . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <input type="hidden" name="tipo" value="odcp">
                                    <button class="btn btn-outline-info rounded-pill" type="submit">
                                        <i class="fa fa-print"></i>
                                        Generar Reporte
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