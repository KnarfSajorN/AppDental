<?php

// verificar tablas creadas
include '../../whatsappPersonalizadoList.php';
include './ws_createTables.php';
include '../header.php';

include '../menu.php';
include 'loading.php';
$ID = $_SESSION['ID'];


// consulta ta tabla de correos para ver si esta configurado
$queryConfig = "SELECT * from ws_correo where usuario_id = '{$ID}';";
// var_dump($queryConfig);
$resultConfig = mysqli_query($conn3, $queryConfig);
$rowConfig = mysqli_fetch_assoc($resultConfig);
// var_dump($rowConfig);

// saber si tiene WhatsApp personalizado
// aquí hacemos una trampa

include 'buscarWhatsapp.php';

if ($tieneWhatsApp == true) {
    // se consulta 
    $denysPuerto = $link[$miSistema[1]][0]; // puerto de denysbot ej: 8080
    $denysServer = $link[$miSistema[1]][1]; // ip servidor ej:$denysServer. 

    // conexion a denysbot
    // $connDenys = mysqli_connect('localhost', 'denysbot', 'Nuebaklbdni', 'denysbot_sistema', '3306');
    // conexion denys nueva 16 10 2023
    $connDenys = mysqli_connect($denysServer.":3306", "denysbot", "BNe4nxQZDwHK8vi", "denysbot_sistema");

    $queryConsultaDenys = "SELECT * from denysbot_sistema.usuarios where id_denys = '{$denysPuerto}' limit 1";
    $resultConsultaDenys = mysqli_query($connDenys, $queryConsultaDenys);
    $rowConsultaDenys = mysqli_fetch_assoc($resultConsultaDenys);
    // si hay resultados armamos la conexión al cliente
    if (mysqli_num_rows($resultConsultaDenys) > 0) {
        // $connDenysCliente = mysqli_connect('localhost', 'denysbot', 'Nuebaklbdni', 'denysbot_' . $rowConsultaDenys['id'], '3306');
        $connDenysCliente = mysqli_connect($denysServer.":3306", "denysbot", "BNe4nxQZDwHK8vi", 'denysbot_' . $rowConsultaDenys['id']);
    }
} else {
    // echo '
    // <script>
    //     alert("No tienes WhatsApp personalizado Activo");
    //     window.location.href="portada";
    // </script>
    // ';
}

?>
<!-- emojis -->
<!-- jquery cdn -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.min.js"></script>
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#">WhatsApp Saludo</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="copyPaste"></div>
        <div class="">
            <div class="col-xs-12">
                <h4 class="Titulo_Pagina">
                    Saludo para Bot de WhatsApp
                </h4>

                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <nav class="nav nav-pills nav-fill">
                                    <a class="nav-item nav-link active" href="./masivoWASaludo">Saludo</a>
                                    <a class="nav-item nav-link" href="./masivoWAMensajes">Mensajes</a>
                                    <a class="nav-item nav-link" href="./masivoWAChatConfig">Usuarios de chat</a>
                                    <a class="nav-item nav-link" href="./masivoWAFormularios">Formularios</a>
                                </nav>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Editor de saludos:</h3>
                            </div>
                            <form id="form_saludo">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Descripción</label>
                                        <textarea id="texti" name="datos[descripcion]" class="form-control"></textarea>
                                        <script type="text/javascript">
                                            $("#texti").emojioneArea();
                                        </script>
                                    </div>
                                    <div class="form-group">
                                        <label>Recibe Respuestas</label>
                                        <select name="datos[reply]" id="reply" class="form-control">
                                            <option value="1">Si</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <input type="hidden" name="datos[activo]" value="0">
                                    <button type="<?= ($tieneWhatsApp == true ? 'submit' : 'button') ?>" <?= ($tieneWhatsApp == true ? '' : 'disabled') ?> class="btn btn-outline-info rounded-pill" onclick="$('#form_saludo').automaticForm({type:1,idUpdate:'',table:'chat_saludo',reload:'',page:'masivoWASaludo',dbHost:'<?=$denysServer?>:3306',dbUser:'denysbot',dbPass:'BNe4nxQZDwHK8vi',db:'denysbot_<?= $rowConsultaDenys['id'] ?>'});">
                                        <i class="fas fa-save mr-1"></i>
                                        Guardar
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Listado de saludos:</h3>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table w-100 table-striped table-bordered" style="width:100% !important">
                                    <?php
                                    $tableHeader = array(
                                        'Mensaje',
                                        'Recibe Respuesta',
                                        'Opciones'
                                    );
                                    ?>
                                    <thead>
                                        <tr>
                                            <?php
                                            for ($i = 0; $i < count($tableHeader); $i++) {
                                                echo "<th>$tableHeader[$i]</th>";
                                            }
                                            ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = "SELECT * from chat_saludo order by id ";
                                        $result = mysqli_query($connDenysCliente, $query);
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo '<tr>';
                                            echo '<td>' . $row['descripcion'] . '</td>';
                                            echo '<td>' . ($row['reply'] == 1 ? 'Si' : 'No') . '</td>';
                                            echo '<td class="row">';
                                        ?>
                                            <button type="button" class="btn btn-outline-secondary rounded-pill btn-sm m-1" data-toggle="modal" data-target="#editarMensajeModal<?= $row['id'] ?>" title="Editar <?= $row['titulo'] ?>">
                                                <li class="fas fa-cog"></li>
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="editarMensajeModal<?= $row['id'] ?>" role="dialog" aria-labelledby="modelTitleId" style="overflow:hidden;" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Editar mensaje <?= $row['titulo'] ?></h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form id="editarMensaje<?= $row['id'] ?>">
                                                            <div class="modal-body row" style="margin:0;">
                                                                <div class="col-md-12">
                                                                    <label for="">Mensaje</label>
                                                                    <textarea class="form-control" id="texti<?= $row['id'] ?>" rows="3" name="datos[descripcion]" required><?= $row['descripcion'] . ' ' ?></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <input type="hidden" name="datos[id]" value="<?= $row['id'] ?>">
                                                                <button type="button" class="btn btn-outline-secondary rounded-pill cerrarModal" data-dismiss="modal">Cerrar</button>
                                                                <button type="submit" class="btn btn-outline-success rounded-pill" onclick="$('#editarMensaje<?= $row['id'] ?>').automaticForm({type:2,idUpdate:'<?= $row['id'] ?>',table:'chat_saludo',reload:'',page:'masivoWASaludo',dbHost:'<?=$denysServer?>:3306',dbUser:'denysbot',dbPass:'BNe4nxQZDwHK8vi',db:'denysbot_<?= $rowConsultaDenys['id'] ?>'});$('.cerrarModal').click();">Actualizar</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <script type="text/javascript">
                                                $("#texti<?= $row['id'] ?>").emojioneArea();
                                            </script>
                                            <?php if ($row['activo'] == 1) { ?>
                                                <input type="hidden" name="datos[activo]" value="0">
                                                <input type="hidden" name="datos[id]" value="<?= $row['id'] ?>">
                                                <button onclick="activarMensaje('<?= $row['id'] ?>',0); $('.cerrarModal').click();" class="btn btn-sm btn-outline-success rounded-pill m-1" title="Desactivar "><i class="fas fa-power-off"></i></button>
                                            <?php } else { ?>
                                                <input type="hidden" name="datos[activo]" value="1">
                                                <input type="hidden" name="datos[id]" value="<?= $row['id'] ?>">
                                                <button onclick="activarMensaje('<?= $row['id'] ?>',1); $('.cerrarModal').click();" class="btn btn-sm btn-outline-danger rounded-pill m-1" title="Activar "><i class="fas fa-power-off"></i></button>
                                            <?php } ?>
                                            </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <?php
                                            for ($i = 0; $i < count($tableHeader); $i++) {
                                                echo "<th>$tableHeader[$i]</th>";
                                            }
                                            ?>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    infoTable();

                    function infoTable() {
                        $.ajax(`php/systemMsg.php?accion=sal`, {
                            dataType: `JSON`,
                            type: `POST`,
                            data: {
                                timezone: Intl.DateTimeFormat().resolvedOptions().timeZone
                            },
                            beforeSend: function() {
                                $(`[data-table="sal"]`).attr(`style`, `transition: all .5s; opacity: 0`);
                            },
                            success: function(response) {
                                let x;
                                $(`[data-table="sal"]`).DataTable().clear().draw();
                                $(`[data-table="sal"]`).dataTable().fnDestroy();
                                [...response.data_codi].forEach((sort, ident) => {
                                    color = response.data_tipo[ident] == 1 ? `success` : `danger`;
                                    x += `
                    <tr>
                        <td data-titu="${sort}">${response.data_titu[ident]}</td>
                        <td data-tipo="${sort}" class="d-flex">
                            <span onclick="cargarDatosFAID('chat_saludo', '@primary = ${sort}', '#form_saludo', '#form_saludo');" data-edit="false" class="btn text-secondary mr-1"><i class="fas fa-edit"></i></span>
                            <span onclick="change(this, '${sort}')" class="btn btn-${color} text-${color} border-radius ml-1" style="border-radius: 50%;width: 30px;height: 30px;display: flex;justify-content: center;align-items: center;user-select: none;cursor: pointer;">${response.data_tipo[ident]}</span>
                        </td>
                    </tr>
                    `;
                                })
                                $(`[data-table="sal"] tbody`).html(x);
                                $(`[data-table="sal"]`).DataTable();
                            },
                            complete: function() {
                                $(`[data-table="sal"]`).attr(`style`, `transition: all .5s; opacity: 1`);
                            }
                        });
                    }

                    function change(e, a) {
                        Swal.fire({
                            "title": "¿Desea cambiar mensaje?",
                            "icon": "warning",
                            "showCancelButton": true,
                            "confirmButtonText": "Si",
                            "cancelButtonText": "No"
                        }).then((result) => {
                            if (true === result.isConfirmed) {
                                $.ajax(`php/systemMsg.php?accion=sal_update`, {
                                    type: "POST",
                                    dataType: "JSON",
                                    data: {
                                        codi: a
                                    },
                                    success: function(response) {
                                        if (true === response.status) {
                                            Swal.fire("Se cambio de estado", "", "success");
                                            infoTable();
                                        } else {
                                            Swal.fire("ha ocurrido un error al actualizar los datos", "", "warning");
                                        }
                                    }
                                })
                            }
                        })
                    }
                </script>

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
include '../footer.php';

?>
<script type="text/javascript">
    $(document).ready(function() {
        $("#texti").emojioneArea();
    });
</script>
<script>
    function activarMensaje(id, estado) {
        $.ajax({
            type: "POST",
            url: "./moduloMasivos/ajax_activarMensaje.php",
            data: {
                id: id,
                estado: estado
            },
            success: function(response) {
                window.location.reload();
            }
        })
    }
</script>