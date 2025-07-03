<?php
include '../header.php';
include '../menu.php';
$ID = $_SESSION['ID'];
$tabla = "nominaEmpresasPersonalExperiencia";


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
                                    <h4>Agregar Experiencia Laboral a: <?= $rowConfig['nombre'] ?> | <?= $rowEmpresa['nombre'] ?></h4>
                                </div>
                            </div>
                            <form id="configForm">
                                <div class="card-body row">
                                    <div class="col-md-12 form-group">
                                        <label for="">Empresa</label>
                                        <input type="text" class="form-control" id="" name="datos[empresa]">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="">Fecha ingreso</label>
                                        <input type="date" class="form-control" id="" name="datos[fechaIngreso]">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="">Fecha egreso</label>
                                        <input type="date" class="form-control" id="" name="datos[fechaEgreso]">
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label for="">tiempo Laborado [Años]</label>
                                        <input type="number" class="form-control" id="" name="datos[tiempoLab]">
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label for="">Jefe inmediato</label>
                                        <input type="text" class="form-control" id="" name="datos[jefeInmediato]">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="">Cargo</label>
                                        <input type="text" class="form-control" id="" name="datos[cargo]">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="">Sueldo básico</label>
                                        <input type="number" step="0.01" class="form-control" id="" name="datos[sueldo]">
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