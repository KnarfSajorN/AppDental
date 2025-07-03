<?php
include '../header.php';
include '../menu.php';
$ID = $_SESSION['ID'];
$tabla = "nominaEmpresasPersonalNovedades";


// cargar datos
$iP = base64_decode($_GET['iP']);
$queryConfig = "SELECT * from nominaEmpresasPersonal where id = $iP limit 1";
$resultConfig = mysqli_query($conn3, $queryConfig);
$rowConfig = mysqli_fetch_array($resultConfig);

$idEmpresa = $rowConfig['idEmpresa'];
$queryEmpresa = "SELECT * from nominaEmpresas where id = $idEmpresa limit 1";
$resultEmpresa = mysqli_query($conn3, $queryEmpresa);
$rowEmpresa = mysqli_fetch_array($resultEmpresa);

$cuantosTiene = intval(funcionMaster($rowConfig['id'],'idPersonal','count(id)','nominaEmpresasPersonalNovedades')) +1;


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
                                    <h4>Agregar Novedades a: <?= $rowConfig['nombre'] ?> | <?= $rowEmpresa['nombre'] ?></h4>
                                </div>
                            </div>
                            <form id="configForm">
                                <div class="card-body row">
                                    <div class="col-md-6 form-group">
                                        <label for="">Novedad</label>
                                        <input type="text" class="form-control" id="" name="datos[novedad]">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="">Número</label>
                                        <input type="numero" class="form-control" id="" name="datos[numero]" readonly value="<?= $cuantosTiene ?>">
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label for="">Motivo</label>
                                        <textarea class="form-control" name="datos[motivo]" id="" cols="30" rows="10"></textarea>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="">Fecha Inicio</label>
                                        <input type="date" class="form-control" id="" name="datos[fechaInicio]">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="">Fecha Final</label>
                                        <input type="date" class="form-control" id="" name="datos[fechaFin]">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="">Total días</label>
                                        <input type="number" class="form-control" id="" name="datos[totalDias]">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="">Dias vacaciones</label>
                                        <input type="number" class="form-control" id="" name="datos[diasVacaciones]">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="">Fecha</label>
                                        <input type="date" class="form-control" id="" name="datos[fecha]">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="">Año</label>
                                        <input type="number" class="form-control" id="" name="datos[ano]" min="1900" max="<?= date('Y') ?>">
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