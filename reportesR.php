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

            Reportes Referidos
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
                        Reporte Referidos
                        <form action="Reportereferido2.php" method="POST" class="row">
                            <div class="col-xs-12 col-md-6">
                                Clientes registrados desde
                                <input type="date" class="form-control input-lg" name="desde" id="desdeRE2" required>
                                <input type="hidden" class="form-control input-lg" name="ID" value="<?php echo $ID ?>" required>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                Clientes registrados hasta
                                <input type="date" class="form-control input-lg" name="hasta" id="hastaRE2" required>
                            </div>

                            <div class="row w-100 mt-2">
                                <div class="col-xs-12 col-md-6">
                                    
                                <center><button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" name = "submitButton" value= "generar" id="exportarRE2">
                                            <h4> <strong> Generar Reporte </strong> </h4>
                                        </button></center>
                                </div>
                                <div class="col-xs-12 col-md-6">
                                    
                                    <center><button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" name = "submitButton" value = "excel" id="exportarRE2">
                                            <h4> <strong> Generar Excel </strong> </h4>
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
    Puntos Activos
    <form action="Reportepuntos.php" method="POST" class="row">
      <div class="col-xs-12 col-md-6">


        Clientes registrados desde
        <input type="date" class="form-control input-lg" name="desde" required>
        <input type="hidden" class="form-control input-lg" name="ID" value="<?php echo $ID ?>" required>
      </div>
      <div class="col-xs-12 col-md-6">
        Clientes registrados hasta
        <input type="date" class="form-control input-lg" name="hasta" required>
      </div>

    <div class="row w-100 mt-4">
    <div class="col-xs-12 col-md-6">
        
        <center><button type="submit" name = "submitButton" value = "generar" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
            <h4> <strong> Generar </strong> </h4>
          </button></center>
      </div>
      <div class="col-xs-12 col-md-6">
      
        <center><button type="submit" name = "submitButton" value = "excel" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
            <h4> <strong> Generar </strong> </h4>
          </button></center>
      </div>
    </div>

      
    </form>


  </div>
</div>
</div>

<br>
            <div align="center">
                <h6>
                    <font color="red"> Necesitas un reporte nuevo?, Solicítalo por <a href="<?php echo $Base; ?>/soporte" target="_blank"> <strong> <i class="fa fa fa-support"></i> soporte </strong></a> </font>
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


