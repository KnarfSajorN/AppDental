<!-- Left side column. contains the logo and sidebar -->
<?php
include 'header.php';
include 'menu.php';
$ID = $_SESSION['ID'];
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>

            Reportes pacientes
        </h1>
        <!-- <ol class="breadcrumb">
      <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
      <li><a href="#"> Reportes pacientes </a></li>
    </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div>
            <br>
            <div class="box">

                <!-- /.box-header -->
                <div class="box-body">

                    <div class="col-xs-12">
                        Pacientes registrados datos personales
                        <form action="ReporteClientes" method="POST" class="row">
                            <div class="col-xs-12 col-md-6">


                                Clientes registrados desde
                                <input type="date" class="form-control input-lg" name="desde" id="desdeDP" required>


                                <input type="hidden" class="form-control input-lg" name="ID" value="<?php echo $ID ?>"
                                    required>

                            </div>
                            <div class="col-xs-12 col-md-6">
                                Clientes registrados hasta
                                <input type="date" class="form-control input-lg" name="hasta" id="hastaDP" required>
                            </div>

                            <div class="row w-100 mt-4">
                                <div class="col-xs-12 col-md-6">
                                    <center><button type="submit" name="buttonSubmit" value="generar"
                                            class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                                            <h4> <strong> Generar </strong> </h4>
                                        </button></center>
                                </div>
                                <div class="col-xs-12 col-md-6">
                                    <center><button class="btn btn-block btn-outline-info btn-lg rounded-pill shadow"
                                            id="exportar" name="buttonSubmit" value="excel">
                                            <h4> <strong> Exportar Excel </strong> </h4>
                                        </button></center>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>


            <div class="box">

                <!-- /.box-header -->
                <div class="box-body">


                    <div class="col-xs-12">
                        Reporte de pacientes que realizaron historia clínica
                        <form action="ReporteClientesprimeraconsulta" method="POST" class="row">
                            <div class="col-xs-12 col-md-6">


                                Desde
                                <input type="date" class="form-control input-lg" name="desde" id="desdeCE" required>
                                <?php
                                $ID = $_SESSION['ID'];
                                ?>

                                <input type="hidden" class="form-control input-lg" name="ID" value="<?php echo $ID ?>"
                                    required>

                            </div>
                            <div class="col-xs-12 col-md-6">
                                Hasta
                                <input type="date" class="form-control input-lg" name="hasta" id="hastaCE" required>
                            </div>

                            <div class="row w-100 mt-4">
                                <div class="col-xs-12 col-md-6">
                                    <center><button type="submit" name="buttonSubmit" value="generar"
                                            class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                                            <h4> <strong> Generar </strong> </h4>
                                        </button></center>
                                </div>
                                <div class="col-xs-12 col-md-6">
                                    <center><button class="btn btn-block btn-outline-info btn-lg rounded-pill shadow"
                                            id="exportar" name="buttonSubmit" value="excel">
                                            <h4> <strong> Exportar Excel </strong> </h4>
                                        </button></center>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

            <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="col-xs-12">
                        Reporte historia clínica general por paciente
                        <form action="Reportehistoriaclinica" method="POST" class="row">
                            <input type="hidden" class="form-control input-lg" name="ID" value="<?php echo $ID ?>"
                                required>

                            <div class="col-xs-12 col-md-12">
                                <select class="form-control input-lg select2" name="tipo" id="tipoGeneralPaciente">
                                    <?php
                                    $usuario_id = $_SESSION['ID'];

                                    $querycat = mysqli_query($conn3, "SELECT * FROM  cliente where (usuario_id = '{$_SESSION['ID']}' or usuario_id = '{$_SESSION['ID_principal']}') order by nombre_cliente");
                                    $nrowl = mysqli_num_rows($querycat);
                                    while ($row_cat = mysqli_fetch_array($querycat)) {

                                        $cliente_id = $row_cat['cliente_id'];
                                        $nombre_cliente = $row_cat['nombre_cliente'];
                                        echo '<option value="' . $cliente_id . '" >' . $nombre_cliente . '</option>';
                                    }

                                    ?>



                                </select>
                            </div>
                            <div class="row w-100 mt-4">
                                <div class="col-xs-12 col-md-6">
                                    <center><button type="submit" name="buttonSubmit" value="generar"
                                            class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                                            <h4> <strong> Generar </strong> </h4>
                                        </button></center>
                                </div>
                                <div class="col-xs-12 col-md-6">
                                    <center><button class="btn btn-block btn-outline-info btn-lg rounded-pill shadow"
                                            id="exportar" name="buttonSubmit" value="excel">
                                            <h4> <strong> Exportar Excel </strong> </h4>
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
                        Reporte de Clientes
                        <form action="Reportereferido" method="POST" class="row">
                            <div class="col-xs-12 col-md-6">


                                Clientes registrados desde
                                <input type="date" class="form-control input-lg" name="desde" id="desdeRE" required>


                                <input type="hidden" class="form-control input-lg" name="ID" value="<?php echo $ID ?>"
                                    required>

                            </div>
                            <div class="col-xs-12 col-md-6">
                                Clientes registrados hasta
                                <input type="date" class="form-control input-lg" name="hasta" id="hastaRE" required>
                            </div>
                            <div class="row w-100 mt-4">
                                <div class="col-xs-12 col-md-6">
                                    <center><button type="submit" name="buttonSubmit" value="generar"
                                            class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                                            <h4> <strong> Generar </strong> </h4>
                                        </button></center>
                                </div>
                                <div class="col-xs-12 col-md-6">
                                    <center><button class="btn btn-block btn-outline-info btn-lg rounded-pill shadow"
                                            id="exportar" name="buttonSubmit" value="excel">
                                            <h4> <strong> Exportar Excel </strong> </h4>
                                        </button></center>
                                </div>
                            </div>
                        </form>


                    </div>

                </div>
            </div>
            <!--  -->

            <br>

            <div align="center">
                <h6>
                    <font color="red"> Necesitas un reporte nuevo?, Solicítalo por <a
                            href="<?php echo $Base; ?>/soporte" target="_blank"> <strong> <i
                                    class="fa fa fa-support"></i> soporte </strong></a> </font>
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
        $('#exportar').click(function() {
            var desde = $('#desdeDP').val();
            var hasta = $('#hastaDP').val();
            var id = <?php echo json_encode($ID); ?>;

            console.log(desde + ' ' + hasta);
            $.ajax({
                url: 'reporte4_ajax.php', // Nombre del archivo PHP que generará los datos
                type: 'POST',
                data: {
                    desde: desde,
                    hasta: hasta,
                    ID: id
                },
                success: function(data) {
                    // Crear una hoja de cálculo con los datos obtenidos
                    var ws = XLSX.utils.aoa_to_sheet(JSON.parse(data));
                    var wb = XLSX.utils.book_new();
                    XLSX.utils.book_append_sheet(wb, ws, 'Reporte');

                    // Descargar el archivo Excel
                    XLSX.writeFile(wb, 'reporte.xlsx');
                }
            });
        });
    });

    $(document).ready(function() {
        $('#exportarCE').click(function() {
            var desde = $('#desdeCE').val();
            var hasta = $('#hastaCE').val();
            var id = <?php echo json_encode($ID); ?>;

            $.ajax({
                url: 'reporte5_ajax.php',
                type: 'POST',
                data: {
                    desde: desde,
                    hasta: hasta,
                    ID: id
                },
                success: function(data) {
                    // Crear una hoja de cálculo con los datos obtenidos
                    var ws = XLSX.utils.aoa_to_sheet(JSON.parse(data));
                    var wb = XLSX.utils.book_new();
                    XLSX.utils.book_append_sheet(wb, ws, 'Reporte');

                    // Descargar el archivo Excel
                    XLSX.writeFile(wb, 'reporte.xlsx');
                }
            }, );
        });
    });
    $(document).ready(function() {
        $('#exportarRE').click(function() {
            var desde = $('#desdeRE').val();
            var hasta = $('#hastaRE').val();
            var id = <?php echo json_encode($ID); ?>;
            console.log(desde + ' ' + hasta);
            $.ajax({
                url: 'Reportereferido_ajax.php',
                type: 'POST',
                data: {
                    desde: desde,
                    hasta: hasta,
                    ID: id
                },
                success: function(data) {
                    // Crear una hoja de cálculo con los datos obtenidos
                    var ws = XLSX.utils.aoa_to_sheet(JSON.parse(data));
                    var wb = XLSX.utils.book_new();
                    XLSX.utils.book_append_sheet(wb, ws, 'Reporte');

                    // Descargar el archivo Excel
                    XLSX.writeFile(wb, 'reporte.xlsx');
                }
            }, );
        });
    });

    $(document).ready(function() {
        $('#exportarPuntos').click(function() {
            var desde = $('#desdePuntos').val();
            var hasta = $('#hastaPuntos').val();
            var id = <?php echo json_encode($ID); ?>;

            console.log(desde + ' ' + hasta);
            $.ajax({
                url: 'Reportepuntos_ajax.php', // Nombre del archivo PHP que generará los datos
                type: 'POST',
                data: {
                    desde: desde,
                    hasta: hasta,
                    ID: id
                },
                success: function(response) {

                    var ws = XLSX.utils.aoa_to_sheet(response);
                    var wb = XLSX.utils.book_new();
                    XLSX.utils.book_append_sheet(wb, ws, 'Reporte');

                    // Descargar el archivo Excel
                    XLSX.writeFile(wb, 'reporte.xlsx');
                }
            });
        });
    });
    $(document).ready(function() {
        $('#ReporteGeneralPaciente').click(function() {
            console.log('hola');
            var paciente = $('#tipoGeneralPaciente').val();
            var id = <?php echo json_encode($ID); ?>;
            $.ajax({
                url: 'reporteGeneralPaciente_ajax.php', // Nombre del archivo PHP que generará los datos
                type: 'POST',
                data: {
                    paciente: paciente,
                    ID: id
                },
                success: function(response) {

                    var ws = XLSX.utils.aoa_to_sheet(response);
                    var wb = XLSX.utils.book_new();
                    XLSX.utils.book_append_sheet(wb, ws, 'Reporte');
                    XLSX.writeFile(wb, 'reporte.xlsx');
                }
            });
        });
    });
</script> -->