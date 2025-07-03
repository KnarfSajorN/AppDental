<?php
include 'header.php';
include 'menu.php';

$usuario_id = $_SESSION['ID'];
$cliente_id = $_GET["clienteId"];
?>

<style type="text/css">
    .select2-container .select2-selection--single {
        height: 46px !important;
        padding: 15px !important;
    }

    .select2-container .select2-selection--multiple {
        padding: 7px;
    }
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#"> Modulo Receta </a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="content">
                <h4 class="Titulo_Pagina">Modulo Receta</h4>
                <div class="box">
                    <div class="box-body">

                        <?php
                        $cliente_id = $cliente_id;
                        $usuario_id = $usuario_id;
                        include 'RM_Receta_1.php'
                        ?>

                        <div class="col-md-12">
                            <center id="Boton_Cerrar_Receta"><button type="button" onclick="CerrarRecetaMedica();" class="btn btn-block btn-primary btn-sm" style="background-color:#3cbc6d">Cerrar Receta Medica</button></center>
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
<script>
    function CerrarRecetaMedica() {
        //este campo biene de RM_Receta.php, cuando es guardado un medicamento se genera este input con este id
        var receta_id = $("#receta_id").val();

        var usuario_id = $("#usuario_id").val();
        var cliente_id = $("#cliente_id").val();

        $.ajax({
            type: "POST",
            url: "RM_Ajax.php",
            data: {
                usuario_id: usuario_id,
                cliente_id: cliente_id,
                receta_id: receta_id,
                Tipo: "Cerrar Receta"
            },
            success: function(response) {
                window.location.href = 'RM_ImprimirReceta.php?receta_id=' + receta_id + '&cliente_id=' + cliente_id;
            }
        });
    }
</script>