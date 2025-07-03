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
                                    <h4>Empresas Registradas</h4>
                                </div>
                            </div>
                            <form action="./nominaReportesVer" method="POST">
                                <div class="card-body row">
                                    <div class="form-group col-md-12">
                                        <div class="row m-0 p-0">
                                            <div class="col-md-4">
                                                <label for="">Fecha Desde</label>
                                                <input type="date" class="form-control" name="fechaD" required value="<?= date('Y-01-01') ?>">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">Fecha Hasta</label>
                                                <input type="date" class="form-control" name="fechaH" required value="<?= date('Y-m-d') ?>">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">Estado</label>
                                                <select name="estado" class="form-control">
                                                    <option value="99">Todos</option>
                                                    <option value="1">Activas</option>
                                                    <option value="0">Inactivas</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <input type="hidden" name="tipo" value="Empresas Registradas">
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
                                    <h4>Empresas empleados [Totales]</h4>
                                </div>
                            </div>
                            <form action="./nominaReportesVer" method="POST">
                                <div class="card-body row">
                                    <div class="form-group col-md-12">
                                        <div class="row m-0 p-0">
                                            <div class="col-md-6">
                                                <label for="">empresa</label>
                                                <select name="empresa" class="form-control select2">
                                                    <option value="0">Todas</option>
                                                    <?php
                                                    $query = "SELECT * from nominaEmpresas";
                                                    $result = mysqli_query($conn3, $query);
                                                    while ($row = mysqli_fetch_array($result)) {
                                                        echo '<option value="' . $row['id'] . '">' . $row['nombre'] . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">Estado del empleado</label>
                                                <select name="estado" class="form-control">
                                                    <option value="99">Todos</option>
                                                    <option value="1">Activos</option>
                                                    <option value="0">Inactivos</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <label for="">Tipo de documento</label>
                                                <select name="tipo_documento" class="form-control select2 w-100" style="width:100% !important;" id="">
                                                    <option value="0"> Todos </option>
                                                    <option value="CC"> CC - Cédula de ciudadanía</option>
                                                    <option value="CE"> CE - Cédula de extranjería</option>
                                                    <option value="TI"> TI - Tarjeta de identidad</option>
                                                    <option value="RC"> RC - Registro Civil</option>
                                                    <option value="CD"> CD - Cédula Digital</option>
                                                    <option value="CN"> CN - Comprobante del tramite del documento</option>
                                                    <option value="NU"> NU - Número Único de identificación</option>
                                                    <option value="NI"> NI - Carnet de identidad - Documento nacional de identidad </option>
                                                    <option value="PE"> PE - Permiso especial de permanencia</option>
                                                    <option value="PA"> PA - Pasaporte</option>
                                                    <option value="SC"> SC - Salvoconducto</option>
                                                    <option value="AS"> AS - Adulto sin identidad</option>
                                                    <option value="MS"> MS - Menor sin identificación</option>
                                                    <option value="PT"> PT - Permiso por Protección Temporal </option>
                                                </select>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <label for="">Estado civil</label>
                                                <select name="estado_civil" class="form-control select2 w-100" style="width:100% !important;" id="">
                                                    <option value="0"> Todos </option>
                                                    <option value="Casado(a)">Casado(a)</option>
                                                    <option value="Soltero(a)">Soltero(a)</option>
                                                    <option value="Viudo(a)">Viudo(a)</option>
                                                    <option value="Menor de edad">Menor de edad</option>
                                                    <option value="Separado(a)">Separado(a)</option>
                                                    <option value="Union Libre">Unión Libre</option>
                                                    <option value="Divorciada(o)">Divorciada(o)</option>
                                                    <option value="Otro(a)">Otro(a)</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <label for="">Tipo de sangre</label>
                                                <select name="tipo_sangre" class="form-control select2 w-100" style="width:100% !important;" id="">
                                                    <option value="0"> Todos </option>
                                                    <option value="O NEGATIVO">O NEGATIVO</option>
                                                    <option value="O POSITIVO">O POSITIVO</option>
                                                    <option value="A NEGATIVO">A NEGATIVO</option>
                                                    <option value="A POSITIVO">A POSITIVO</option>
                                                    <option value="B NEGATIVO">B NEGATIVO</option>
                                                    <option value="B POSITIVO">B POSITIVO</option>
                                                    <option value="AB NEGATIVO">AB NEGATIVO</option>
                                                    <option value="AB POSITIVO">AB POSITIVO</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <input type="hidden" name="tipo" value="Empresas empleados [Totales]">
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
                                    <h4>Empresas empleados [Detallado]</h4>
                                </div>
                            </div>
                            <form action="./nominaReportesVer" method="POST">
                                <div class="card-body row">
                                    <div class="form-group col-md-12">
                                        <div class="row m-0 p-0">
                                            <div class="col-md-6">
                                                <label for="">empresa</label>
                                                <select name="empresa" class="form-control select2">
                                                    <option value="0">Todas</option>
                                                    <?php
                                                    $query = "SELECT * from nominaEmpresas";
                                                    $result = mysqli_query($conn3, $query);
                                                    while ($row = mysqli_fetch_array($result)) {
                                                        echo '<option value="' . $row['id'] . '">' . $row['nombre'] . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">Estado del empleado</label>
                                                <select name="estado" class="form-control">
                                                    <option value="99">Todos</option>
                                                    <option value="1">Activos</option>
                                                    <option value="0">Inactivos</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <label for="">Tipo de documento</label>
                                                <select name="tipo_documento" class="form-control select2 w-100" style="width:100% !important;" id="">
                                                    <option value="0"> Todos </option>
                                                    <option value="CC"> CC - Cédula de ciudadanía</option>
                                                    <option value="CE"> CE - Cédula de extranjería</option>
                                                    <option value="TI"> TI - Tarjeta de identidad</option>
                                                    <option value="RC"> RC - Registro Civil</option>
                                                    <option value="CD"> CD - Cédula Digital</option>
                                                    <option value="CN"> CN - Comprobante del tramite del documento</option>
                                                    <option value="NU"> NU - Número Único de identificación</option>
                                                    <option value="NI"> NI - Carnet de identidad - Documento nacional de identidad </option>
                                                    <option value="PE"> PE - Permiso especial de permanencia</option>
                                                    <option value="PA"> PA - Pasaporte</option>
                                                    <option value="SC"> SC - Salvoconducto</option>
                                                    <option value="AS"> AS - Adulto sin identidad</option>
                                                    <option value="MS"> MS - Menor sin identificación</option>
                                                    <option value="PT"> PT - Permiso por Protección Temporal </option>
                                                </select>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <label for="">Estado civil</label>
                                                <select name="estado_civil" class="form-control select2 w-100" style="width:100% !important;" id="">
                                                    <option value="0"> Todos </option>
                                                    <option value="Casado(a)">Casado(a)</option>
                                                    <option value="Soltero(a)">Soltero(a)</option>
                                                    <option value="Viudo(a)">Viudo(a)</option>
                                                    <option value="Menor de edad">Menor de edad</option>
                                                    <option value="Separado(a)">Separado(a)</option>
                                                    <option value="Union Libre">Unión Libre</option>
                                                    <option value="Divorciada(o)">Divorciada(o)</option>
                                                    <option value="Otro(a)">Otro(a)</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <label for="">Tipo de sangre</label>
                                                <select name="tipo_sangre" class="form-control select2 w-100" style="width:100% !important;" id="">
                                                    <option value="0"> Todos </option>
                                                    <option value="O NEGATIVO">O NEGATIVO</option>
                                                    <option value="O POSITIVO">O POSITIVO</option>
                                                    <option value="A NEGATIVO">A NEGATIVO</option>
                                                    <option value="A POSITIVO">A POSITIVO</option>
                                                    <option value="B NEGATIVO">B NEGATIVO</option>
                                                    <option value="B POSITIVO">B POSITIVO</option>
                                                    <option value="AB NEGATIVO">AB NEGATIVO</option>
                                                    <option value="AB POSITIVO">AB POSITIVO</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <input type="hidden" name="tipo" value="Empresas empleados [Detallado]">
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