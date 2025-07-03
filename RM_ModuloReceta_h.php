<?php
include 'header.php';
include 'menu.php';

$usuario_id = $_SESSION['ID'];
$cliente_id = $_GET["clienteId"];
$enlace_actual = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
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
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <!-- <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#"> Modulo Receta </a></li>
        </ol>
    </section> -->

    <!-- Main content -->
    <section class="content">
        <div>
            <div class="content">
                <!-- <h4 class="Titulo_Pagina">Modulo Receta</h4> -->
                <div class="box">
                    <div class="box-body">

                        <?php include 'RM_Receta.php' ?>

                        <div class="col-md-12">
                            <center id="Boton_Cerrar_Receta"><button type="button" onclick="CerrarRecetaMedica();"
                                    class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">Cerrar Receta
                                    Médica</button></center>
                        </div>
                        <br>
                        <div class="col-md-12">
                            <!-- <button class="" onclick="window.location.href='RecetaEnviar.php?receta_id=<?php echo $receta_id; ?>&cliente_id=<?php echo $cliente_id; ?>'">Enviar Receta Médica</button> -->
                            <button class="btn btn-block btn-outline-info btn-lg rounded-pill shadow"
                                onclick="enviarReceta();">Enviar Receta Médica</button>

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
                Ruta: "<?php echo $enlace_actual ?>",
                Tipo: "Cerrar Receta"
            },
            success: function (response) {
                window.location.href = 'ImprimirReceta?receta_id=' + receta_id + '&cliente_id=' + cliente_id;
            }
        });
    }
    // function enviarReceta() {
    //     console.log("Me tocaste sin mi consentimiento D: ");
    //     //este campo biene de RM_Receta.php, cuando es guardado un medicamento se genera este input con este id
    //     var receta_id = $("#receta_id").val();
    //     var usuario_id = $("#usuario_id").val();
    //     var cliente_id = $("#cliente_id").val();
    //     console.log("receta_id: " + receta_id);
    //     if (receta_id === "") {
    //         // Si receta_id está vacío, mostrar un mensaje con SweetAlert
    //         swal("Error", "Debe agregar mínimo 1 medicamento para enviar la receta", "error");

    //     } else {
    //         // Si receta_id no está vacío, redirigir a RecetaEnviar.php
    //         window.location.href = 'RecetaEnviar.php?receta_id=' + receta_id + '&cliente_id=' + cliente_id + '&usuario_id=' + usuario_id;
    //     }

    // }
    function enviarReceta() {
    console.log("Me tocaste sin mi consentimiento D: ");
    var receta_id = $("#receta_id").val();
    var usuario_id = $("#usuario_id").val();
    var cliente_id = $("#cliente_id").val();

    console.log("receta_id: " + receta_id);
    
    if (receta_id === "") {
        // Si receta_id está vacío, mostrar un mensaje con SweetAlert
        swal("Error", "Debe agregar mínimo 1 medicamento para enviar la receta", "error");
    } else {
        // Mostrar una alerta antes de redirigir
        alert("La receta médica ha sido enviada correctamente.");
        
        // Continuar con la redirección
        //window.location.href = 'RM_ImprimirReceta.php?receta_id=' + receta_id + '&cliente_id=' + cliente_id;
        window.location.href = 'RecetaEnviar.php?receta_id=' + receta_id + '&cliente_id=' + cliente_id + '&usuario_id=' + usuario_id;

    }
}

</script>

<script src="apiVoz_3.2.js"></script>
<?php include 'plantilla.php'; ?>