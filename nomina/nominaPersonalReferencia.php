<?php
include '../header.php';
include '../menu.php';
$ID = $_SESSION['ID'];
$tabla = "nominaEmpresasPersonalReferencias";


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
                                    <h4>Agregar Referencia a: <?= $rowConfig['nombre'] ?> | <?= $rowEmpresa['nombre'] ?></h4>
                                </div>
                            </div>
                            <form id="configForm">
                                <div class="card-body row">
                                    <div class="col-md-6 form-group">
                                        <label for="">Tipo Referencia</label>
                                        <input type="text" class="form-control" id="" name="datos[tipoRef]">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="">Nombre</label>
                                        <input type="text" class="form-control" id="" name="datos[nombre]">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="">Dirección</label>
                                        <input type="text" class="form-control" id="" name="datos[direccion]">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="">Teléfono</label>
                                        <input type="text" class="form-control" id="" name="datos[telefono]">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="">Ciudad</label>
                                        <input type="text" class="form-control" id="" name="datos[ciudad]">
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