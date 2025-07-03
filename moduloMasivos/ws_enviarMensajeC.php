<?php
include '../header.php';
include '../menu.php';
// include 'loading.php';
// echo $_GET['send'];
if ($_GET['send']) {
    include '../funciones/conn3.php';
    $queryActivo = "SELECT * from cliente where enviado = 1";
    $result = mysqli_query($conn3, $queryActivo);
    while ($row = mysqli_fetch_array($result)) {
        mysqli_query($conn3, "UPDATE cliente SET enviado = 0 where cliente_id = $row[cliente_id] ");
    }
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#">Contactos</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="col-xs-12">
                <h4 class="Titulo_Pagina">
                    Envío de Mensajes - Correo
                </h4>
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">

                        <div class="box-body table-responsive no-padding">
                            <?php if ($_GET['send']) { ?>
                                <div class="container">
                                    <h2>Enviados: <b id="count2"></b> / Faltantes: <b id="count1"></b></h2>
                                    <!-- <h2>Faltantes: <b id="count1"></b> / De: <b id="count2"></b></h2> -->
                                    <p>Enviando el siguiente mensaje en: <b id="count3">0</b></p>
                                </div>
                            <?php } ?>
                            <table class="table table-bordered table-striped" style="font-size:18px;display: flex; flex-flow: column;">
                                <thead style="display: flex; flex-flow: column;">
                                    <tr style="display: flex; flex-flow: row;">
                                        <th style="width: calc(100%/4); word-break: break-all; overflow: hidden;">Nombre</th>
                                        <th style="width: calc(100%/4); word-break: break-all; overflow: hidden;">Correo</th>
                                        <th style="width: calc(100%/4); word-break: break-all; overflow: hidden;">Filtro</th>
                                        <th style="width: calc(100%/4); word-break: break-all; overflow: hidden;">Estado</th>
                                    </tr>
                                </thead>
                                <tbody id="resSend" style="display: flex; flex-flow: column; max-height: 700px; overflow: auto;">
                                    <?php $queryws_contactos = mysqli_query($conn3, "SELECT * from ws_contactos where activo <> 0 and enviado <> 0") ?>
                                    <?php foreach ($queryws_contactos as $datws_contactos) { ?>
                                        <?php $☺ = explode("/", ($datws_contactos['enviado'] == 1 ? "Enviado/text-success" : "No enviado/text-danger")) ?>
                                        <tr style="display: flex; flex-flow: row;">
                                            <td style="width: calc(100%/4); word-break: break-all; overflow: hidden;"><?= $datws_contactos['nombre'] ?></td>
                                            <td style="width: calc(100%/4); word-break: break-all; overflow: hidden;"><?= $datws_contactos['numero'] ?></td>
                                            <td style="width: calc(100%/4); word-break: break-all; overflow: hidden;"><?= $datws_contactos['filtro'] ?></td>
                                            <th style="width: calc(100%/4); word-break: break-all; overflow: hidden;" class="<?= $☺[1] ?>"> <?= $☺[0] ?></th>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
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
<?php include '../footer.php' ?>
<?php if ($_GET['send']) { ?>
    <script>
        function enviarMensajes() {
            $.ajax("./moduloMasivos/ajax_enviarMensajesC.php?accion=1", {
                type: "POST",
                data: {
                    idM: "<?= base64_encode(decrypt($_GET['A'])) ?>",
                    usuario_id: "<?= $_SESSION['ID'] ?>"
                },
                success: function(response) {
                    validar = response.replace(/\s+/g, "").split("<!--Response-->");
                    // console.log(validar[1]);
                    if (validar[1] == "true") {
                        $("#resSend").html(response);
                    } else if (validar[1] == "false") {
                        alert('Todos los Correos han sido enviados');
                        window.location.href = "masivoMensajesC";
                        // window.location.href = "masivoEnviarWhatsApp";
                        // window.location.replace("masivoEnviarWhatsApp");
                    }
                }
            })
        }
        // $(document).ready(function() {
        //     enviarMensajes();
        //     setTimeout(() => {
        //         if ($("#count2").html == '0') {
        //             alert("Todos los contactos han sido enviados");   
        //         }else{
        //             // window.location.reload();
        //         }                
        //     }, 40000);
        // })

        setInterval(() => {
            enviarMensajes();
        }, 40000);

        function contador() {
            let segundos = 40;
            $('#count3').html(segundos);
            setInterval(() => {
                if (segundos == 0) {
                    segundos = 40;
                }
                // do {
                    segundos -= 1;
                    $('#count3').html(segundos);
                // } while (segundos > 0);
            }, 1000);


        }

        $(document).ready(function() {
            contador();
        })

        // setInterval(, 40000); // Cada medio minuto
    </script>

<?php } ?>