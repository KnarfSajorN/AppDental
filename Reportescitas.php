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
            Reportes citas
        </h1>
        <!-- <ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
        <li><a href="#"> Reportes citas </a></li>
      </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="">
            <br>
            <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="col-xs-12">
                        Reporte de Agenda
                        <form action="ReporteAsistencia" method="POST" class="row">
                            <div class="col-xs-12 col-md-4">
                                Desde
                                <input type="date" class="form-control input-lg" name="desde" id="desdeAS" required>
                                <?php
                                $ID = $_SESSION['ID'];
                                ?>

                                <input type="hidden" class="form-control input-lg" name="ID" value="<?php echo $ID ?>"
                                    required>

                            </div>
                            <div class="col-xs-12 col-md-4">
                                Hasta
                                <input type="date" class="form-control input-lg" name="hasta" id="hastaAS" required>
                            </div>
                            <div class="col-xs-12 col-md-4">
                                Tipo
                                <select class="form-control input-lg" name="tipo" id="tipoAS">
                                    <option value="0" select>Todos</option>
                                    <option value="1">Por Confirmar</option>
                                    <option value="2">Confirmado</option>
                                    <option value="3">Asistio</option>
                                    <option value="4">No Asistio</option>
                                </select>
                            </div>

                            <div class="row w-100 mt-4">
                                <div class="col-xs-12 col-md-6">

                                    <center><button type="submit"
                                            class="btn btn-block btn-outline-info rounded-pill shadow"
                                            name="submitButton" value="generar" id="reporteAS">
                                            <h4> <strong> Generar </strong> </h4>
                                        </button></center>
                                </div>
                                <div class="col-xs-12 col-md-6">
                                    <center><button type="submit"
                                            class="btn btn-block btn-outline-info rounded-pill shadow"
                                            name="submitButton" value="excel" id="exportarAS">
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
                        Reporte de citas por estado
                        <form action="ReporteEstadoCita" method="POST" class="row">
                            <div class="col-xs-12 col-md-6">


                                <label>Desde</label>
                                <input type="date" class="form-control input-lg" name="desde" id="desdeRE" required>
                                <?php
                                $ID = $_SESSION['ID'];
                                ?>

                                <input type="hidden" class="form-control input-lg" name="ID" value="<?php echo $ID ?>"
                                    required>

                            </div>
                            <div class="col-xs-12 col-md-6">
                                <label>Hasta</label>
                                <input type="date" class="form-control input-lg" name="hasta" id="hastaRE" required>
                            </div>
                            <div class="col-xs-12 col-md-3" style="display: none;">

                                <select style="display: none;" class="form-control input-lg" name="tipo">
                                    <option value="0" select>Todos</option>
                                    <!-- <option value="1">Por Confirmar</option>
                  <option value="2">Confirmado</option>
                  <option value="3">Asistio</option>
                  <option value="4">No Asistio</option> -->


                                </select>
                            </div>
                            <div class="row w-100 mt-4">
                                <div class="col-xs-12 col-md-6">

                                    <center><button type="submit"
                                            class="btn btn-block btn-outline-info rounded-pill shadow"
                                            name="submitButton" value="generar" id="reporteAS">
                                            <h4> <strong> Generar </strong> </h4>
                                        </button></center>
                                </div>
                                <div class="col-xs-12 col-md-6">
                                    <center><button type="submit"
                                            class="btn btn-block btn-outline-info rounded-pill shadow"
                                            name="submitButton" value="excel" id="exportarAS">
                                            <h4> <strong> Exportar </strong> </h4>
                                        </button></center>
                                </div>
                            </div>

                        </form>



                    </div>
                </div>
            </div>

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
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.5/xlsx.full.min.js"></script>
<script>
    $(document).ready(function() {
        $('#citasRE').click(function() {
            var desde = $('#desdeRE').val();
            var hasta = $('#hastaRE').val();

            var id = <?php echo json_encode($ID); ?>;
            $.ajax({
                url: 'ReporteEstadoCita_ajax.php',
                type: 'POST',
                data: {
                    desde: desde,
                    hasta: hasta,
                    ID: id
                },
                success: function(data) {
                    var jsonData = JSON.parse(data);

                    // Crear una hoja de cálculo con los datos obtenidos
                    var ws = XLSX.utils.json_to_sheet(jsonData);
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
        $('#exportarAS').click(function() {
            var desde = $('#desdeAS').val();
            var hasta = $('#hastaAS').val();

            var id = <?php echo json_encode($ID); ?>;
            $.ajax({
                url: 'ReporteAsistencia_ajax.php',
                type: 'POST',
                data: {
                    desde: desde,
                    hasta: hasta,
                    ID: id
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
</script> -->