<?php
include 'header.php';
include 'menu.php';
$ID = $_SESSION["ID"];
//fecha de hoy yyyy-mm-dd
$fecha_actual = date("Y-m-d");
//aumentar dia a la fecha de hoy
$fecha_actual_mas_dias = date("Y-m-d", strtotime("+1 day", strtotime($fecha_actual)));
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#"> Reportes Odontograma </a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="col-xs-12">
                <h4 class="Titulo_Pagina"> Reportes Odontograma </h4>


                <div class="box">
                    <div class="box-header">
                        <center> <h4> <strong> <i class="fas fa-id-card-alt"></i> Reportes </strong></h4> </center>
                        <hr>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <div class="col-xs-12">
                            <hr>
                        </div>

                        <div class="col-xs-12">
                            <i class="fas fa-id-card-alt"></i> Procedimientos Realizados Por Paciente
                            <form action="OD_ReportesExcel.php" method="POST" enctype="multipart/form-data">
                                <div class="col-xs-3">
                                    <label style='padding-top: 15px;'> Paciente</label>
                                    <select name="Cliente"  class="form-control select2 select input-lg"  style="width: 100%;" required>
                                        <option value="" selected="selected">Seleccione</option>
                                            <?php
                                            $queryList=mysqli_query($conn3,"SELECT * FROM cliente WHERE activo=1 $queryCliente and usuario_id = $ID");
                                            while($rowEntidad=mysqli_fetch_array($queryList))
                                            {
                                            $cliente_id = $rowEntidad['cliente_id'];
                                            $Nombre = $rowEntidad['nombre_cliente'];

                                            echo "<option value='$cliente_id'> $Nombre </option>";
                                            }
                                            ?>
                                        </select> 
                                </div>

                                <div class="col-xs-3">
                                    <label style='padding-top: 15px;'> Fecha Desde</label>
                                    <input type="date" class="form-control input-lg" name="desde" value="<?= $fecha_actual; ?>" >
                                    <input type="hidden" class="form-control input-lg" name="usuario_id" value="<?php echo $_SESSION["ID"] ?>" required>
                                </div>
                                <div class="col-xs-3">
                                    <label style='padding-top: 15px;'> Fecha Hasta</label>
                                    <input type="date" class="form-control input-lg" name="hasta" value="<?= $fecha_actual_mas_dias; ?>" >
                                </div>

                                <div class="col-xs-3">
                                    <center style='padding-top: 35px;'><button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                                            <h4> <strong> Generar </strong> </h4>
                                        </button></center>
                                </div>
                            </form>
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
include 'footer.php';
?>

  <?php include 'PiedePaginasReportes.php'; ?>