<?php
include '../header.php';
include '../menu.php';
$ID = $_SESSION['ID'];
$tabla = "nominaEmpresasPersonalContratos";


// cargar datos
$iP = base64_decode($_GET['iP']);
$queryConfig = "SELECT * from nominaEmpresasPersonal where id = $iP limit 1";
$resultConfig = mysqli_query($conn3, $queryConfig);
$rowConfig = mysqli_fetch_array($resultConfig);

$idEmpresa = $rowConfig['idEmpresa'];
$queryEmpresa = "SELECT * from nominaEmpresas where id = $idEmpresa limit 1";
$resultEmpresa = mysqli_query($conn3, $queryEmpresa);
$rowEmpresa = mysqli_fetch_array($resultEmpresa);

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
                                    <h4>Agregar Contrato a: <?= $rowConfig['nombre'] ?> | <?= $rowEmpresa['nombre'] ?></h4>
                                </div>
                            </div>
                            <form id="configForm">
                                <div class="card-body row">
                                    <div class="col-md-12 form-group">
                                        <label for="">Número</label>
                                        <input type="numero" class="form-control" id="" name="datos[numero]">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="">Fecha Inicia</label>
                                        <input type="date" class="form-control" id="" name="datos[fechaInicio]">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="">Fecha Termina</label>
                                        <input type="date" class="form-control" id="" name="datos[fechaFin]">
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label for="">Observación</label>
                                        <textarea class="form-control" name="datos[observacion]" id="" cols="30" rows="10"></textarea>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label for="">Estado</label>
                                        <input type="text" class="form-control" id="" name="datos[estado]">
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label for="">Tipo de contrato</label>
                                        <input type="text" class="form-control" id="" name="datos[tipoContrato]">
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label for="">Modo de terminación</label>
                                        <input type="text" class="form-control" id="" name="datos[modoTerminacion]">
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <input type="hidden" name="datos[idPersonal]" value="<?= $rowConfig['id'] ?>">
                                    <button type="submit" class="btn btn-outline-info rounded-pill" onclick="$('#configForm').automaticForm({type:1, table:'<?= $tabla ?>',idUpdate:'0',reload:'',page:'nominaPersonal?e=<?= base64_encode($idEmpresa) ?>&FAID=<?= base64_encode($rowConfig['id']) ?>'});">
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