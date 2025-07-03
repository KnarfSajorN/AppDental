<?php

// verificar tablas creadas
include '../header.php';
include '../menu.php';
$ID = $_SESSION['ID'];


// consulta ta tabla de correos para ver si esta configurado
$tabla = "fe_ecuador";
$queryConfig = "SELECT * from $tabla where usuario_id = '{$ID}';";
$resultConfig = mysqli_query($conn3, $queryConfig);
$rowConfig = mysqli_fetch_assoc($resultConfig);

?>

<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#">Contactos</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="copyPaste"></div>
        <div class="">
            <div class="col-xs-12">
                <h4 class="Titulo_Pagina">
                    Configuración de facturación electrónica - <strong>Ecuador</strong>
                </h4>
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-info">
                                    <div class="card-header">
                                        <div class="float-left">
                                            <h4>Resumen</h4>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <?php
                                            $cajitas = [
                                                ['Estado del servicio', ($rowConfig['estado'] == 1) ? 'Activo' : 'Inactivo', 'fa fa-toggle-on'],
                                                ['Documentos adquiridos', '0', 'fas fa-file-invoice'],
                                                ['Documentos generados', intval(funcionMaster('1', '1 and status_code = 200', 'count(id)', 'fe_registroelectronico_ec')) , 'fas fa-file-invoice-dollar'],
                                            ];
                                            ?>
                                            <?php for ($i = 0; $i < count($cajitas); $i++) : ?>
                                                <div class="col-lg-4 col-6">
                                                    <div class="small-box bg-gradient-light">
                                                        <div class="inner">
                                                            <h3><?= $cajitas[$i][1] ?></h3>
                                                            <p><?= $cajitas[$i][0] ?></p>
                                                        </div>
                                                        <div class="icon">
                                                            <i class="fa <?= $cajitas[$i][2] ?>"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endfor ?>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="card card-info">
                                    <div class="card-header">
                                        <div class="float-left">
                                            <h4>Parámetros <strong>API</strong></h4>
                                        </div>
                                    </div>
                                    <form id="facturaForm">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="">URL Base (Desarrollo)</label>
                                                <input type="text" class="form-control" id="" placeholder="https://apitest.com/v1" name="datos[fe_url_desarrollo]" value="<?= $rowConfig['fe_url_desarrollo'] ?>" autocomplete="new-password">
                                            </div>
                                            <div class="form-group">
                                                <label for="">URL Base (Producción)</label>
                                                <input type="text" class="form-control" id="" placeholder="https://apitest.com/v1" name="datos[fe_url_produccion]" value="<?= $rowConfig['fe_url_produccion'] ?>" autocomplete="new-password">
                                            </div>
                                            <div class="form-group">
                                                <label for=""><strong>Credenciales</strong>: Username</label>
                                                <input type="text" class="form-control" id="" placeholder="********" name="datos[fe_username]" value="<?= $rowConfig['fe_username'] ?>" autocomplete="new-password">
                                            </div>
                                            <div class="form-group">
                                                <label for=""><strong>Credenciales</strong>: Password</label>
                                                <input type="text" class="form-control" id="" placeholder="********" name="datos[fe_password]" value="<?= $rowConfig['fe_password'] ?>" autocomplete="new-password">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Estado del servicio</label>
                                                <select name="datos[estadoUrl]" class="form-control select2" id="">
                                                    <option value="0" <?= ($rowConfig['estadoUrl'] == 0 ? 'selected' : '') ?>>Desarrollo (Pruebas)</option>
                                                    <option value="1" <?= ($rowConfig['estadoUrl'] == 1 ? 'selected' : '') ?>>Producción</option>
                                                </select>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Ruc Empresa</label>
                                                        <input type="text" class="form-control" id="" placeholder="123456789" name="datos[rucEmpresa]" value="<?= $rowConfig['rucEmpresa'] ?>" autocomplete="new-password" accept="number" maxlength="13" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                                    </div>
                                                </div>                                                
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Dirección Establecimiento</label>
                                                        <input type="text" class="form-control" id="" placeholder="Dirección empresa" name="datos[direccionEstablecimiento]" value="<?= $rowConfig['direccionEstablecimiento'] ?>" autocomplete="new-password">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Código Establecimiento</label>
                                                        <input type="text" class="form-control" id="" placeholder="001" name="datos[codigoEstablecimiento]" value="<?= $rowConfig['codigoEstablecimiento'] ?>" autocomplete="new-password" accept="number" maxlength="3" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Punto de emisión</label>
                                                        <input type="text" class="form-control" id="" placeholder="001" name="datos[puntoEmision]" value="<?= $rowConfig['puntoEmision'] ?>" autocomplete="new-password" accept="number" maxlength="3" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <input type="hidden" name="datos[usuario_id]" value="<?= $ID ?>">
                                            <input type="hidden" name="datos[estado]" value="0">
                                            <input type="hidden" name="datos[fecha]" value="<?= date('y-m-d H:i:s') ?>">
                                            <button type="submit" class="btn btn-outline-info rounded-pill" onclick="$('#facturaForm').automaticForm({type:<?= ($rowConfig == null ? 1 : 2) ?>, table:'<?= $tabla ?>',idUpdate:'<?= ($rowConfig == null ? 0 : $rowConfig['id']) ?>',reload:'',page:'configFacturaElectronicaEC'});">
                                                <i class="fa fa-save mr-1"></i>
                                                Guardar
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
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
<!-- /.content-wrapper -->
<?php
include '../footer.php';
include 'compatibilidad.php';
?>