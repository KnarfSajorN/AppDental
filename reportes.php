<!-- Left side column. contains the logo and sidebar -->
<?php
include 'header.php';
include 'menu.php';
//Tomar ID del usuario logueado
$ID = $_SESSION['ID'];
$IDP = $_SESSION['ID_principal'];
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Reportes Facturación
        </h1>
        <!-- <ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
        <li><a href="#"> Reportes facturación </a></li>
      </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box">
        <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="col-xs-12">
                        Reporte General de Facturas
                        <form action="ReporteFacturas" method="POST" class="row">
                            <div class="col-md-4 col-xs-12">
                                Desde
                                <input type="date" class="form-control input-lg" name="desde" id="desdeGeneral" required>
                                <?php
                                $ID = $_SESSION['ID'];
                                ?>

                                <input type="hidden" class="form-control input-lg" name="ID" value="<?php echo $ID ?>" required>

                            </div>
                            <div class="col-md-4 col-xs-12">
                                Hasta
                                <input type="date" class="form-control input-lg" name="hasta" id="hastaGeneral" required>
                            </div>
                            <div class="col-md-4 col-xs-12">
                                Clientes

                                <select id="tipo" name="tipo" class="form-control select2" id="clientePresupuesto" style="width: 100%;" required="required">
                                    <option value="0" select>Todos</option>
                                    <?php
                                    $queryList = mysqli_query($conn3, "SELECT * FROM cliente WHERE (ID_principal = '{$_SESSION['ID']}' or ID_principal = '{$_SESSION['ID_principal']}') order by nombre_cliente");
                                    $nrowl = mysqli_num_rows($queryList);
                                    while ($row_recordset32 = mysqli_fetch_array($queryList)) {
                                        $nombre_cliente      = $row_recordset32['nombre_cliente'];
                                        $cliente_id      = $row_recordset32['cliente_id'];
                                        echo "<option value='$cliente_id'> $nombre_cliente</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="row w-100 mt-2">
                                <div class="col-md-6 col-xs-12">

                                    <center><button type="submit" name="submitButton" class="btn btn-block btn-outline-info rounded-pill shadow" value="generar">
                                            <h4> <strong> Generar Reporte </strong> </h4>
                                        </button></center>
                                </div>
                                <div class="col-xs-12 col-md-6">

                                    <center><button class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" name="submitButton" value="excel" id="reporteGeneral">
                                            <h4> <strong> Exportar </strong> </h4>
                                        </button></center>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>

            <br>
            <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="col-xs-12">
                        Reporte General de Facturas por Doctor
                        <form action="reporte2ver1.php" method="POST" class="row">
                            <div class="col-md-4 col-xs-12">
                                Desde
                                <input type="date" class="form-control input-lg" name="desde" id="desdeGeneral"
                                    required>
                                <?php
                                $ID = $_SESSION['ID'];
                                ?>

                                <input type="hidden" class="form-control input-lg" name="ID" value="<?php echo $ID ?>"
                                    required>

                            </div>
                            <div class="col-md-4 col-xs-12">
                                Hasta
                                <input type="date" class="form-control input-lg" name="hasta" id="hastaGeneral"
                                    required>
                            </div>
                            <div class="col-md-4 col-xs-12">
                                Doctor

                                <select id="tipo" name="tipo" class="form-control select2" id="clientePresupuesto"
                                    style="width: 100%;" required="required">
                                    <option value="0" select>Todos</option>
                                    <?php
                                    $queryList = mysqli_query($conn3, "SELECT * FROM usuarios WHERE ID_principal = $IDP");
                                    $nrowl = mysqli_num_rows($queryList);
                                    while ($row_recordset32 = mysqli_fetch_assoc($queryList)) {
                                        $NOMBRE_USUARIO = $row_recordset32['NOMBRE_USUARIO'];
                                        $usuario_id = $row_recordset32['ID'];
                                        echo "<option value='$usuario_id'> $NOMBRE_USUARIO</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            
                            <div class="row w-100 mt-2">
                                <div class="col-md-6 col-xs-12">

                                    <center><button type="submit" name="submitButton"
                                            class="btn btn-block btn-outline-info rounded-pill shadow" value="generar">
                                            <h4> <strong> Generar Reporte </strong> </h4>
                                        </button></center>
                                </div>
                                <div class="col-xs-12 col-md-6">

                                    <center><button class="btn btn-block btn-outline-info btn-lg rounded-pill shadow"
                                            name="submitButton" value="excel" id="reporteGeneral">
                                            <h4> <strong> Exportar </strong> </h4>
                                        </button></center>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>

            <br>

            <div class="box">

                <!-- /.box-header -->
                <div class="box-body">


                    <div class="col-xs-12">
                        Reporte General de Presupuestos
                        <form action="reporte2presupuesto.php" method="POST" class="row">
                            <div class="col-md-4 col-xs-12">


                                Desde
                                <input type="date" class="form-control input-lg" name="desde" id="desdePresupuesto"
                                    required>
                                <?php
                                $ID = $_SESSION['ID'];
                                ?>

                                <input type="hidden" class="form-control input-lg" name="ID" value="<?php echo $ID ?>"
                                    required>

                            </div>
                            <div class="col-md-4 col-xs-12">
                                Hasta
                                <input type="date" class="form-control input-lg" name="hasta" id="hastaPresupuesto"
                                    required>
                            </div>
                            <div class="col-md-4 col-xs-12">
                                Clientes

                                <select id="tipoPresupuesto" name="tipo" class="form-control select2"
                                    style="width: 100%;" required="required">

                                    <option value="0" select>Todos</option>
                                    <?php
                                    $queryList = mysqli_query($conn3, "SELECT * FROM cliente WHERE (ID_principal = '{$_SESSION['ID']}' or ID_principal = '{$_SESSION['ID_principal']}') order by nombre_cliente");
                                    $nrowl = mysqli_num_rows($queryList);
                                    while ($row_recordset32 = mysqli_fetch_array($queryList)) {
                                        $nombre_cliente = $row_recordset32['nombre_cliente'];
                                        $cliente_id = $row_recordset32['cliente_id'];
                                        echo "<option value='$cliente_id'> $nombre_cliente</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="row w-100 mt-2">
                                <div class="col-md-6 col-xs-12">

                                    <center><button type="submit" name="submitButton" value="generar"
                                            class="btn btn-block btn-outline-info rounded-pill shadow">
                                            <h4> <strong> Generar Reporte</strong> </h4>
                                        </button></center>
                                </div>
                                <div class="col-xs-12 col-md-6">

                                    <center><button type="submit"
                                            class="btn btn-block btn-outline-info btn-lg rounded-pill shadow"
                                            name="submitButton" value="excel" id="reportePresupuesto">
                                            <h4> <strong> Exportar </strong> </h4>
                                        </button></center>
                                </div>
                            </div>

                        </form>



                    </div>
                </div>
            </div>

            <br>
            
            <div class="box">

                <!-- /.box-header -->
                <div class="box-body">


                    <div class="col-xs-12">
                        Reporte General de Presupuestos por Doctor
                        <form action="reporte2ver1presupuesto.php" method="POST" class="row">
                            <div class="col-md-4 col-xs-12">


                                Desde
                                <input type="date" class="form-control input-lg" name="desde" id="desdePresupuesto"
                                    required>
                                <?php
                                $ID = $_SESSION['ID'];
                                ?>

                                <input type="hidden" class="form-control input-lg" name="ID" value="<?php echo $ID ?>"
                                    required>

                            </div>
                            <div class="col-md-4 col-xs-12">
                                Hasta
                                <input type="date" class="form-control input-lg" name="hasta" id="hastaPresupuesto"
                                    required>
                            </div>
                            <div class="col-md-4 col-xs-12">
                                Doctor

                                <select id="tipoPresupuesto" name="tipo" class="form-control select2" id="clientePresupuesto"
                                    style="width: 100%;" required="required">
                                    <option value="0" select>Todos</option>
                                    <?php
                                    $queryList = mysqli_query($conn3, "SELECT * FROM usuarios WHERE ID_principal = $IDP");
                                    $nrowl = mysqli_num_rows($queryList);
                                    while ($row_recordset32 = mysqli_fetch_assoc($queryList)) {
                                        $NOMBRE_USUARIO = $row_recordset32['NOMBRE_USUARIO'];
                                        $usuario_id = $row_recordset32['ID'];
                                        echo "<option value='$usuario_id'> $NOMBRE_USUARIO</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="row w-100 mt-2">
                                <div class="col-md-6 col-xs-12">

                                    <center><button type="submit" name="submitButton" value="generar"
                                            class="btn btn-block btn-outline-info rounded-pill shadow">
                                            <h4> <strong> Generar Reporte</strong> </h4>
                                        </button></center>
                                </div>
                                <div class="col-xs-12 col-md-6">

                                    <center><button type="submit"
                                            class="btn btn-block btn-outline-info btn-lg rounded-pill shadow"
                                            name="submitButton" value="excel" id="reportePresupuesto">
                                            <h4> <strong> Exportar </strong> </h4>
                                        </button></center>
                                </div>
                            </div>

                        </form>



                    </div>
                </div>
            </div>

            <br>


            <div class="box">

                <!-- /.box-header -->
                <div class="box-body">


                    <div class="col-xs-12">
                        Reporte Cuentas a Cobrar
                        <form action="ReporteCuentasaCobrar" method="POST" class="row">
                            <div class="col-md-4 col-xs-12">


                                Desde
                                <input type="date" class="form-control input-lg" name="desde" id="desdeCxC" required>
                                <?php
                                $ID = $_SESSION['ID'];
                                ?>

                                <input type="hidden" class="form-control input-lg" name="ID" id="idCxC"
                                    value="<?php echo $ID ?>" required>

                            </div>
                            <div class="col-md-4 col-xs-12">
                                Hasta
                                <input type="date" class="form-control input-lg" name="hasta" id="hastaCxC" required>
                            </div>
                            <div class="col-md-4 col-xs-12">
                                Clientes
                                <select id="clienteCxC" name="tipo" class="form-control select2" style="width: 100%;"
                                    required="required">
                                    <option value="0" select>Todos</option>
                                    <?php
                                    $queryList = mysqli_query($conn3, "SELECT * FROM cliente WHERE (ID_principal = '{$_SESSION['ID']}' or ID_principal = '{$_SESSION['ID_principal']}') order by nombre_cliente");
                                    $nrowl = mysqli_num_rows($queryList);
                                    while ($row_recordset32 = mysqli_fetch_array($queryList)) {
                                        $nombre_cliente = $row_recordset32['nombre_cliente'];
                                        $cliente_id = $row_recordset32['cliente_id'];


                                        echo "<option value='$cliente_id'> $nombre_cliente</option>";
                                    }

                                    ?>


                                </select>
                            </div>
                            <div class="row w-100 mt-2">
                                <div class="col-md-6 col-xs-12">

                                    <center><button type="submit" name="submitButton" value="generar"
                                            class="btn btn-block btn-outline-info rounded-pill shadow">
                                            <h4> <strong> Generar Reporte</strong> </h4>
                                        </button></center>
                                </div>
                                <div class="col-xs-12 col-md-6">

                                    <center><button class="btn btn-block btn-outline-info btn-lg rounded-pill shadow"
                                            name="submitButton" value="excel" id="reporteCxC">
                                            <h4> <strong> Exportar </strong> </h4>
                                        </button></center>
                                </div>
                            </div>

                        </form>




                    </div>
                </div>
            </div>

            <br>

            <!-- /.box-header -->


            <div class="box">

                <!-- /.box-header -->
                <div class="box-body">


                    <div class="col-xs-12 d-none">
                        Reporte de ventas [Comisión Usuario]
                        <!-- <p>
                    <a class="btn btn-info" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" style="width:100%">
                        Modulos Relacionados Con Este Reporte
                    </a>
                    </p>
                    <div class="collapse" id="collapseExample">
                    <div class="card card-body" style="    display: table-row-group;">
                        <img src="../pe732/img/pe732_config.png" style="width:100%"><hr>
                        <img src="../pe732/img/pe732_fac.png" style="width:50%">
                        <img src="../pe732/img/pe732_modulocomision.png" style="width:50%">
                        <hr>
                        <hr>
                    </div>
                    </div> -->

                        <form action="ReporteVentas" method="POST" class="row">
                            <div class="col-md-2 col-xs-12">
                                Desde
                                <input type="date" class="form-control input-lg" name="desde" required>
                            </div>
                            <div class="col-md-2 col-xs-12">
                                Hasta
                                <input type="date" class="form-control input-lg" name="hasta" required>
                            </div>

                            <div class="col-md-3 col-xs-12">
                                Usuario

                                <select id="usuario" name="usuario" class="form-control select2" style="width: 100%;"
                                    required="required">

                                    <option value="0" select>Todos</option>
                                    <?php
                                    $queryList = mysqli_query($conn3, "SELECT * FROM usuarios where (ID = '{$_SESSION['ID']}' or ID = '{$_SESSION['ID_principal']}')");
                                    $nrowl = mysqli_num_rows($queryList);
                                    while ($row_recordset32 = mysqli_fetch_array($queryList)) {
                                        $NOMBRE_USUARIO = $row_recordset32['NOMBRE_USUARIO'];
                                        $ID = $row_recordset32['ID'];
                                        echo "<option value='$ID'> $NOMBRE_USUARIO</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-3 col-xs-12">
                                Sucursales
                                <select id="sucursal" name="sucursal" class="form-control select2" style="width: 100%;"
                                    data-placeholder="Seleccione Sucursal" required>
                                    <?php
                                    $usuario_id = $_SESSION["ID"];

                                    $queryList = mysqli_query($conn3, "SELECT * FROM sucursales");
                                    while ($RowSucursales = mysqli_fetch_array($queryList)) {
                                        $id = $RowSucursales['id'];
                                        $descripcion = $RowSucursales['descripcion'];

                                        if ($id != $_SESSION["sucursal"]) {
                                            echo "<option value='$id'> $descripcion </option>";
                                        } else {
                                            echo "<option value='$id' selected='selected'> $descripcion </option>";
                                        }
                                    }

                                    ?>
                                    <option value="0">Todas</option>
                                </select>
                            </div>
                            <div class="col-md-2 col-xs-12">
                                Agregar Salario
                                <select id="salario" name="salario" class="form-control select2" style="width: 100%;"
                                    data-placeholder="Seleccione Sucursal" required>
                                    <option value="0">No</option>
                                    <option value="1">Si</option>
                                </select>
                            </div>
                            <div class="row w-100 mt-3">
                                <div class="col-md-6 col-xs-12">

                                    <center><button type="submit"
                                            class="btn btn-block btn-outline-info rounded-pill shadow">
                                            <h4> <strong> Generar </strong> </h4>
                                        </button></center>
                                </div>
                                <div class="col-md-6 col-xs-12">

                                    <center><button type="submit"
                                            class="btn btn-block btn-outline-info rounded-pill shadow">
                                            <h4> <strong> Exportar </strong> </h4>
                                        </button></center>
                                </div>
                            </div>

                    </div>

                    </form>



                </div>
            </div>
        </div>





        <div align="center">
            <h6>
                <font color="red"> Necesitas un reporte nuevo?, Solicítalo por <a href="<?php echo $Base; ?>/soporte"
                        target="_blank"> <strong> <i class="fa fa fa-support"></i> soporte </strong></a> </font>
            </h6>
        </div>



        <!-- /.col -->
</div>
<!-- /.row -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include 'footer.php';

?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.5/xlsx.full.min.js"></script>
<!-- <script>
$(document).ready(function() {
    $('#reportePresupuesto').click(function() {
        console.log("ME tocaste D:");
        var desde = $('#desdePresupuesto').val();
        var hasta = $('#hastaPresupuesto').val();
        var idCLiente = $('#tipoPresupuesto').val();
        var id = <?php echo json_encode($ID); ?>;

        console.log(idCLiente);
        $.ajax({
            url: 'reportePresupuestos_ajax.php',
            type: 'POST',
            data: {
                desde: desde,
                hasta: hasta,
                ID: id,
                idCLiente: idCLiente
            },
            success: function(resultados) {

                // Crear una hoja de cálculo con los datos obtenidos
                var ws = XLSX.utils.json_to_sheet(resultados);
                var wb = XLSX.utils.book_new();
                XLSX.utils.book_append_sheet(wb, ws, 'Reporte');

                // Descargar el archivo Excel


                // Descargar el archivo Excel   
                XLSX.writeFile(wb, 'reporte.xlsx');
            }
        }, );
    });
});

$(document).ready(function() {
    $('#reporteGeneral').click(function() {

        var desde = $('#desdeGeneral').val();
        var hasta = $('#hastaGeneral').val();
        var idCLiente = $('#tipoPresupuesto').val();
        var id = <?php echo json_encode($ID); ?>;
        console.log("Reporte general");
        $.ajax({
            url: 'reporte2_ajax.php',
            type: 'POST',
            data: {
                desde: desde,
                hasta: hasta,
                ID: id,
                idCLiente: idCLiente
            },
            success: function(response) {
                var ws = XLSX.utils.json_to_sheet(response);
                var wb = XLSX.utils.book_new();
                XLSX.utils.book_append_sheet(wb, ws, 'Reporte');
                // Descargar el archivo Excel


                // Descargar el archivo Excel
                XLSX.writeFile(wb, 'reporte.xlsx');
            }
        }, );
    });
});

$(document).ready(function() {
    $('#reporteCxC').click(function() {
        var desde = $('#desdeCxC').val();
        var hasta = $('#hastaCxC').val();
        var idCLiente = $('#clienteCxC').val();
        var id = $('#idCxC').val();
        console.log(id);
        $.ajax({
            url: 'reporteCxC_ajax.php',
            type: 'POST',
            data: {
                desde: desde,
                hasta: hasta,
                id: id,
                idCLiente: idCLiente
            },
            success: function(response) {

                console.log(response);

                // Crear una hoja de cálculo con los datos obt enidos
                var ws = XLSX.utils.json_to_sheet(response);
                var wb = XLSX.utils.book_new();
                XLSX.utils.book_append_sheet(wb, ws, 'Reporte');

                // Descargar el archivo Excel


                // Descargar el archivo Excel
                XLSX.writeFile(wb, 'reporteCuentasxcobrar.xlsx');
            }
        }, );
    });
});
</script> -->