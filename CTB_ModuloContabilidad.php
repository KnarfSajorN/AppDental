
<?php
include 'header.php';
include 'menu.php';

if ($_GET["msg"] != "") {
    include "plugins/SweetAlert2K/AlertaCorrectaOperacion.php";
}
if ($_GET["error"] != "") {
    include "plugins/SweetAlert2K/AlertaErrorOperacion.php";
}

$usuario_id = $_SESSION['ID'];
?>

<style>
.Titulo_Pagina {
    width: fit-content;
    background-color: #3c8dbc75;
    padding: 20px;
    border-radius: 20px 20px 0px 0px;
    display: table-cell;
}
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#"> Modulo Contabilidad </a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="content">
                <h4 class="Titulo_Pagina">Modulo Contabilidad </h4>
                <div class="box">
                    <div class="box-body row">

                    <div class="col-md-12">
                        <a href="CTB_CentroCostos" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                        <h4> Centro de Costos </h4>
                        </a>
                    </div>

                    <div class="col-md-12">
                        <hr>
                    </div>


                    <div class="col-md-12">
                        <a href="CTB_InventarioCuentaC" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                        <h4> Cuenta Contable Inventarios </h4>
                        </a>
                    </div>

                    <div class="col-md-12">
                        <hr>
                    </div>

                    <div class="col-md-12">
                        <a href="CTB_IvaCuentaC" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                        <h4> Cuenta Contable Iva</h4>
                        </a>
                    </div>

                    <div class="col-md-12">
                        <hr>
                    </div>

                    <div class="col-md-12">
                        <a href="CTB_MedioPagoCuentaC" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                        <h4> Cuenta Contable Medio de Pago</h4>
                        </a>
                    </div>

                    <div class="col-md-12">
                        <hr>
                    </div>
                    
                    <div class="col-md-12">
                        <a href="CTB_CuentaCostoVenta" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                        <h4> Cuenta Contable Costo y Venta</h4>
                        </a>
                    </div>


                    <div class="col-md-12">
                        <hr>
                    </div>
                    
                    <div class="col-md-12">
                        <a href="CTB_Retenciones" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                        <h4> Retenciones</h4>
                        </a>
                    </div>


                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include 'footer.php';
?>