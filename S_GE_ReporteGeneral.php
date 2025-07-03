   <?php
    include 'header.php';
    include 'menu.php'; ?>

   <?php
   $idPrincipal=$_SESSION['ID_principal'];
    //$QueryWhereSucursal filtro para la sucursal
    // if($_SESSION['sucursal'] >= 0 AND $_SESSION['vista'] == 0) {$QueryWhereSucursal = " WHERE ".$QueryWhereSucursal; }
    // if($_SESSION['sucursal'] >= 0 AND $_SESSION['vista'] == 1) {$QueryWhereSucursal = " AND  ".$QueryWhereSucursal; }
    ?>

   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper p-3">
       <!-- Content Header (Page header) -->
       <section class="content-header">
           <ol class="breadcrumb">
               <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
               <li><a href="#">Registro Gastos / Egresos</a></li>
           </ol>
       </section>
       <!-- Main content -->
       <section class="content">
           <div>
               <div class="col-xs-12">
                   <h4 class="Titulo_Pagina">Generar Reporte de Gastos / Egresos</h4>


                    <div class="box">
                        <div class="box-header">
                            <a href="nuevoPaciente">
                                <!-- <button class="btn btn-block btn-primary btn-sm">
                    <h4> <strong> <i class="fas fa-id-card-alt"></i> Registrar Pacientes </strong></h4>
                    </button> -->
                            </a>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="box-body table-responsive no-padding">

                                <form action="S_GE_ReportesExcelGeneralPdf.php" method="POST">
                                    <div class="col-md-12">
                                        <h1>Generar Reporte</h1>
                                        <label for="" class=" col-md-4 m-auto" >Fecha Desde</label>
                                        <input type="date" required class="form-control  m-auto" id="fechainicial" name="fecha_inicial" value="">
                                        <label for="" class=" col-md-4 m-auto">Fecha Hasta</label>
                                        <input type="date" required class=" form-control  m-auto" id="fechaFinal" name="fecha_final" value="">
                                    </div>
                                    <div class="col-md-12">
                                        <!-- submit -->
                                        <hr>
                                        <button type="submit" class="btn btn-block btn-outline-info rounded-pill shadow m-1">
                                            <h4> <strong> <i class="fas fa-save"></i> Generar </strong></h4>
                                        </button>
                                        <input type="hidden" name="usuario_id" value="<?=$idPrincipal ?>">
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