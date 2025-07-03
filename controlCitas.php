<?php
include 'header.php';
include 'menu.php';

if (isset($_SESSION['cI']) && $_SESSION['cI'] <> '') {
    $queryCliente = " AND idCliente=" . $_SESSION['cI'];
} else {
    $queryCliente = "";
}

?>
<style type="text/css">
    .table-responsive {
        overflow-x: unset;
    }
</style>
<style>
    #MenuEstadoBotones {
        height: fit-content;
    }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>

            Control De Citas

        </h1>
        <!-- <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#"> Control De Citas </a></li>
        </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div>


            <div class="box">

                <!-- /.box-header -->
                <div class="box-body">


                    <div class="col-xs-12">
                        Reporte de Agenda
                        <form action="ReporteAsistencia" method="POST" class="row">
                            <div class="col-xs-12 col-md-3">


                                <label>Desde</label>
                                <input type="date" class="form-control input-lg" name="desde" required>
                                <?php
                                $ID = $_SESSION['ID'];
                                ?>

                                <input type="hidden" class="form-control input-lg" name="ID" value="<?php echo $ID ?>"
                                    required>

                            </div>
                            <div class="col-xs-12 col-md-3">
                                <label>Hasta</label>
                                <input type="date" class="form-control input-lg" name="hasta" required>
                            </div>
                            <div class="col-xs-12 col-md-3">
                                <label>Tipo</label>
                                <select class="form-control input-lg" name="tipo">
                                    <option value="0" select>Todos</option>
                                    <option value="1">Por Confirmar</option>
                                    <option value="2">Confirmado</option>
                                    <option value="3">Asistió</option>
                                    <option value="4">No Asistió</option>


                                </select>
                            </div>
                            <div class="col-xs-12 col-md-3">
                                <br>
                                <center><button type="submit"
                                        class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                                        <h4> <strong> Generar </strong> </h4>
                                    </button></center>
                            </div>
                        </form>


                    </div>
                </div>
            </div>

            <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="col-me-12">
                        <label for="estadoToggle">Alternar Estados</label>
                        <select name="estadoToggle" id="estadoToggle" class="form-control input-lg select2"
                            style="width: 100%"
                            onchange="window.location.href = (this.value == '' ? `controlCitas` : `controlCitas?estado=${this.value}`)">
                            <option value="">Todos</option>
                            <option value="1" <?= ($_GET['estado'] == 1 ? 'selected' : '') ?>>Reservada</option>
                            <option value="2" <?= ($_GET['estado'] == 2 ? 'selected' : '') ?>>Confirmada</option>
                            <option value="3" <?= ($_GET['estado'] == 3 ? 'selected' : '') ?>>Asistida</option>
                            <option value="4" <?= ($_GET['estado'] == 4 ? 'selected' : '') ?>>No pudo Asistir</option>
                            <option value="5" <?= ($_GET['estado'] == 5 ? 'selected' : '') ?>>Cita Cancelada</option>
                            <option value="6" <?= ($_GET['estado'] == 6 ? 'selected' : '') ?>>Pendiente</option>
                            <option value="7" <?= ($_GET['estado'] == 7 ? 'selected' : '') ?>>En Espera</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-xs-12">

                <div class="box">

                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">Fecha-Hora</th>
                                    <th class="text-center">Doctor</th>
                                    <th class="text-center">Nombre</th>
                                    <th class="text-center">Teléfono</th>
                                    <th class="text-center">Correo</th>
                                    <th class="text-center">Servicio</th>
                                    <th class="text-center">Calificación</th>
                                    <th class="text-center">Comentario</th>
                                    <!-- <th class="text-center">Motivo Consulta</th> -->
                                    <th class="text-center">Estado</th>
                                    <th class="text-center">Estado Presencial</th>

                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                //     ?ID_patients=8



                                $ID = $_SESSION['ID'];


                                $conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));
                                //   if ($_SESSION['TIPO'] == 1) {
                                //     $filtro = ((isset($_GET['estado']) && !empty($_GET['estado'])) ? "estado = '{$_GET['estado']}' " : '');
                                //     $queryList = mysqli_query($conn3, "SELECT * FROM  citas where {$filtro} order by fecha asc ") or die(mysqli_error($conn3));
                                //     // $queryList = mysqli_query($conn3, "SELECT * FROM  citas where {$filtro} estado <> 4 and estado <> 3 order by fecha asc ");
                                //   } else {
                                //     $filtro = ((isset($_GET['estado']) && !empty($_GET['estado'])) ? "estado = '{$_GET['estado']}' AND " : '');
                                //     $queryList = mysqli_query($conn3, "SELECT * FROM  citas where {$filtro} usuario_id = $ID order by fecha asc ") or die(mysqli_error($conn3));
                                //     // $queryList = mysqli_query($conn3, "SELECT * FROM  citas where {$filtro} estado <> 4 and estado <> 3 and usuario_id = $ID order by fecha asc ");
                                //   }
                                $filtro = ((isset($_GET['estado']) && !empty($_GET['estado'])) ? "estado = '{$_GET['estado']}' AND " : '');
                                $queryList = mysqli_query($conn3, "SELECT * FROM  citas where {$filtro} (usuario_id = '{$_SESSION['ID']}' or usuario_id = '{$_SESSION['ID_principal']}') $queryCliente order by fecha asc ") or die(mysqli_error($conn3));

                                $nrowl = mysqli_num_rows($queryList);

                                while ($row_recordset32 = mysqli_fetch_array($queryList)) {
                                    $idCitas = $row_recordset32['idCitas'];
                                    $Doctor = $row_recordset32['doctor'];
                                    $fecha = $row_recordset32['fecha'];
                                    $Hora = $row_recordset32['Hora'];
                                    $nombre = $row_recordset32['nombre'];
                                    $telefono = $row_recordset32['telefono'];
                                    $correo = $row_recordset32['correo'];
                                    $motivoConsulta = $row_recordset32['motivoConsulta'];
                                    $activo = $row_recordset32['activo'];
                                    $estado = $row_recordset32['estado'];
                                    $estadoPresencia = $row_recordset32['estadoPresencia'];
                                    $motivo = utf8_encode(funcionMaster($motivoConsulta, 'id', 'descripcion', 'Motivos_Consulta'));
                                    $stars = funcionMaster($idCitas, 'idOperacion', 'stars', 'comentarios_demo_sieven');
                                    $comentario = funcionMaster($idCitas, 'idOperacion', 'comentario', 'comentarios_demo_sieven');
                                    $clienteId = ($idCitas);
                                    if (empty($stars)) {
                                        $stars = '<button class="btn btn-outline-info btn-lg rounded-pill shadow" style="height: auto;font-size: 1rem;" onclick="enviarWhatsApp(\'' . $clienteId . '\', \'3\');">Enviar Encuesta</button>';
                                    }

                                    if (empty($comentario)) {
                                        $comentario = '<button class="btn btn-outline-info btn-lg rounded-pill shadow" style="height: auto;font-size: 1rem;" onclick="enviarWhatsApp(\'' . $clienteId . '\', \'3\');">Enviar Encuesta</button>';
                                    }



                                    if ($motivo == '') {
                                        $motivo = funcionMaster($row_recordset32["odprocedimiento_id"], 'id', 'Nombre', 'OD_Procedimiento');
                                        if ($motivo == '') {
                                            $motivo = funcionMaster($row_recordset32["sinvetrios_id"], 'ID', 'descripcion', 'sinvetrios');
                                        }
                                    }


                                    echo '
                      <tr>
                      <td style="width: calc(85%/7)" class="text-center">' . $fecha . '-' . $Hora . '</td>
                      <td style="width: calc(85%/7)" class="text-center">' . funcionMaster($Doctor, 'ID', 'NOMBRE_USUARIO', 'usuarios') . '</td>    
                      <td style="width: calc(85%/7)" class="text-center"> ' . $nombre . '</td>
                      <td style="width: calc(85%/7)" class="text-center">' . $telefono . '</td>
                      <td style="width: calc(85%/7)" class="text-center">' . $correo . '</td>
                      <td style="width: calc(85%/7)" class="text-center">' . $motivo . '</td>
                      <td style="width: calc(85%/7)" class="text-center">' . $stars . '</td>
                      <td style="width: calc(85%/7)" class="text-center">' . $comentario . '</td>
                      
                      ';
                                    ?>
                                    <td style="width: 5%;" class="text-center">
                                        <?php
                                        $botonesEstado = [
                                            "1" => "Reservada",
                                            "2" => "Confirmada",
                                            "3" => "Asistida",
                                            "4" => "No pudo Asistir",
                                            "5" => "Cita Cancelada",
                                            "6" => "Pendiente",
                                            "7" => "En Espera"
                                        ];
                                        $botones = [
                                            "1" => "<i class='fa fa-circle' style='color: rgb(119, 208, 250)'></i>",
                                            "2" => "<i class='fa fa-circle' style='color: rgb(236, 190, 81)'></i>",
                                            "3" => "<i class='fa fa-circle' style='color: rgb(250, 181, 251);'></i>",
                                            "4" => "<i class='fa fa-circle' style='color: rgb(251, 193, 179);'></i>",
                                            "5" => "<i class='fa fa-circle' style='color: rgb(40 40 40)'></i>",
                                            "6" => "<i class='fa fa-circle' style='color: rgb(253, 137, 145)'></i>",
                                            "7" => "<i class='fa fa-circle' style='color: rgb(182, 237, 128)'></i>"
                                        ];
                                        ?>
                                        <div class="dropdown dropup" style="position: relative;display: table;">
                                            <!-- class antigua -> btn btn-default dropdown-toggle del boton de abajo  -->
                                            <button class="btn btn-outline-info btn-lg rounded-pill shadow dropdown-toggle"
                                                type="button" data-toggle="dropdown" title="<?= $botonesEstado[$estado] ?>"
                                                id="btn<?= $idCitas ?>"> <?= $botones[$estado] ?> </button>
                                            <ul class="dropdown-menu"
                                                style="top: auto; bottom: 100%; position: absolute;height: fit-content;">
                                                <li><a style="cursor: pointer; padding: 10px;"
                                                        onclick="estadoDinamico(<?= $idCitas ?>, 1)"> <i
                                                            class="fa fa-circle" style="color: rgb(119, 208, 250)"></i>
                                                        Reservada</a></li>
                                                <li><a style="cursor: pointer; padding: 10px;"
                                                        onclick="estadoDinamico(<?= $idCitas ?>, 2)"> <i
                                                            class="fa fa-circle" style="color: rgb(236, 190, 81)"></i>
                                                        Confirmada</a></li>
                                                <li><a style="cursor: pointer; padding: 10px;"
                                                        onclick="estadoDinamico(<?= $idCitas ?>, 3)"> <i
                                                            class="fa fa-circle" style="color: rgb(250, 181, 251);"></i>
                                                        Asistida</a></li>
                                                <li><a style="cursor: pointer; padding: 10px;"
                                                        onclick="estadoDinamico(<?= $idCitas ?>, 4)"> <i
                                                            class="fa fa-circle" style="color: rgb(251, 193, 179);"></i> No
                                                        pudo Asistir</a></li>
                                                <li><a style="cursor: pointer; padding: 10px;"
                                                        onclick="estadoDinamico(<?= $idCitas ?>, 5)"> <i
                                                            class="fa fa-circle" style="color: rgb(40 40 40)"></i> Cita
                                                        Cancelada</a></li>
                                                <li><a style="cursor: pointer; padding: 10px;"
                                                        onclick="estadoDinamico(<?= $idCitas ?>, 6)"> <i
                                                            class="fa fa-circle" style="color: rgb(253, 137, 145)"></i>
                                                        Pendiente</a></li>
                                                <li><a style="cursor: pointer; padding: 10px;"
                                                        onclick="estadoDinamico(<?= $idCitas ?>, 7)"> <i
                                                            class="fa fa-circle" style="color: rgb(182, 237, 128)"></i> En
                                                        Espera</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                    <td style="width: 10%;" class="text-center">
                                        <?php
                                        $botonesPresencial = [
                                            "0" => "No ha Ingresado",
                                            "1" => "Ingresado",
                                            "2" => "Retirado"
                                        ];
                                        $botonesPresencialIconos = [
                                            "0" => "<i class='fa fa-clock'></i>",
                                            "1" => "<i class='fa fa-user'></i>",
                                            "2" => "<i class='fa fa-user'></i>"
                                        ];
                                        ?>
                                        <div class="dropdown dropup" style="position: relative">
                                            <!-- class antigua -> btn btn-default dropdown-toggle del boton de abajo  -->
                                            <button class="btn btn-outline-info btn-lg rounded-pill shadow dropdown-toggle"
                                                type="button" data-toggle="dropdown"
                                                title="<?= $botonesPresencial[$estadoPresencia] ?>"
                                                id="btn2<?= $idCitas ?>"> <?= $botonesPresencial[$estadoPresencia] ?>
                                            </button>
                                            <ul class="dropdown-menu" id="MenuEstadoBotones"
                                                style="top: auto; bottom: 100%; position: absolute;">
                                                <li style="margin-bottom: 5px;padding: 5px;"><a
                                                        style="cursor: pointer; padding: 10px;"
                                                        onclick="presenciaDinamico(<?= $idCitas ?>, 0)"><?= $botonesPresencialIconos[0] ?>
                                                        No ha Ingresado</a></li>
                                                <li style="margin-bottom: 5px;padding: 5px;"><a
                                                        style="cursor: pointer; padding: 10px;"
                                                        onclick="presenciaDinamico(<?= $idCitas ?>, 1)"><?= $botonesPresencialIconos[1] ?>
                                                        Ingresado</a></li>
                                                <li style="margin-bottom: 5px;padding: 5px;"><a
                                                        style="cursor: pointer; padding: 10px;"
                                                        onclick="presenciaDinamico(<?= $idCitas ?>, 2)"><?= $botonesPresencialIconos[2] ?>
                                                        Retirado</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                    <td style="width: calc(85%/7)" class="text-center"> <button type='button'
                                            class="btn btn-outline-info btn-lg rounded-pill shadow"
                                            style="height: auto;font-size: 1rem;"
                                            onclick='HistorialNotas(<?= $idCitas; ?>)'>Historial Notas</button> </td>



                                    <?php
                                }
                                ?>
                                <script>
                                    function enviarWhatsApp(idCitas, estado) {
                                        let data = {
                                            key: "updateEstadoCita",
                                            idCitas: idCitas,
                                            estado: 3
                                        };

                                        $.ajax({
                                            url: "ajax_enviarwhatsapp.php",
                                            data: data,
                                            type: "POST",
                                            dataType: "json",
                                            success: function (response) {
                                                console.log('Mensaje enviado por WhatsApp');
                                                Swal.fire('Mensaje enviado'); // Agregar la alerta aquí
                                                location
                                                // .reload(); // Recargar la página después de enviar el mensaje por WhatsApp
                                            },
                                            error: function (xhr, status, error) {
                                                console.log('Error al enviar el mensaje por WhatsApp: ' +
                                                    error);
                                            }
                                        });
                                    }
                                </script>
                                </tr>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="text-center">Fecha-Hora</th>
                                    <th class="text-center">Doctor</th>
                                    <th class="text-center">Nombre</th>
                                    <th class="text-center">Teléfono</th>
                                    <th class="text-center">Correo</th>
                                    <th class="text-center">Servicio</th>
                                    <th class="text-center">Calificación</th>
                                    <th class="text-center">Comentario</th>
                                    <!-- <th class="text-center">Motivo Consulta</th> -->
                                    <th class="text-center">Estado</th>
                                    <th class="text-center">Estado Presencial</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </tfoot>
                        </table>
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
<!-- <td width="10%" class="text-center">
    <?php
    if ($estado == '1') {
        // echo '<a href="Confirmarcita.php?idCitas=' . $idCitas . '"><button type="button" class="btn btn-block btn-success btn-sm">Confirmar</button></a>';
    }
    if ($estado == '2') {
        // echo '<a href="asistioCita.php?idCitas=' . $idCitas . '"><button type="button" class="btn btn-block btn-primary btn-sm">Asistio</button></a>';
    }
    ?>

  </td>
  <td width="10%" class="text-center">
    <?php
    if ($estado < 3) {
        // echo '<a href="pendienteCita.php?idCitas=' . $idCitas . '"><button type="button" class="btn btn-block btn-info btn-sm">Pendiente</button></a>';
    }
    ?>

// echo '<td width="10%" class="text-center"><a href="NoAsistio.php?idCitas=' . $idCitas . '"><button type="button" class="btn btn-block btn-danger btn-sm">No Asistio</button></a> </td> ';
                    </td> -->

<?php
include 'footer.php';

?>
<script type="text/javascript">
    $(document).ready(function () {
        var table = $('#example1').DataTable();
        table.on('draw.dt', function () {
            $('.select2').select2(); // Ejecutar Select2 en cada elemento con la clase "select2"
        });
    });

    const estadoDinamico = (id, estado) => {
        let data = {
            key: "updateEstadoCita",
            idCitas: id,
            estado: estado
        };
        $.ajax({
            url: "./ajax_calendar.php",
            data: data,
            type: "POST",
            dataType: "json",
            success: function (response) {
                let botonesEstado = JSON.parse(`<?= json_encode($botonesEstado) ?>`);
                let botones = JSON.parse(`<?= json_encode($botones) ?>`);
                if (response.status) {
                    $(`#btn${id}`).attr('title', botonesEstado[estado]).html(botones[estado]);
                }
            }
        });
    };

    const presenciaDinamico = (id, estado) => {
        let data = {
            key: "updateEstadoPresencialCita",
            idCitas: id,
            estadoPresencia: estado
        };
        $.ajax({
            url: "./ajax_calendar.php",
            data: data,
            type: "POST",
            dataType: "json",
            success: function (response) {
                let botonesPresencial = JSON.parse(`<?= json_encode($botonesPresencial) ?>`);
                if (response.status) {
                    $(`#btn2${id}`).attr('title', botonesPresencial[estado]).html(botonesPresencial[
                        estado]);
                }
            }
        });
    };
</script>
<script>
    function HistorialNotas(idCitas) {
        // Realizar solicitud AJAX al servidor para obtener los datos
        //obtener el valor de data-idCitas
        var idCitas = idCitas;

        Swal.fire({
            title: 'Historial de Notas',
            //html: '<div class="accordion" id="CitasAccordion"></div>',
            html: '<div class="container" id="contenedor_swal" style="width: 100%;">' +
                '<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">' +
                '<div>' +
                '<div class="s"></div>' +
                '<div class="text-titulo">' +
                '<span class="and">Historial de Notas</span>' +
                '</div>' +
                '<div class="s"></div>' +
                '</div>' +
                '<div id="CitasAccordion"><br></div>' +
                '</div>' +
                '</div>',
            showCloseButton: true,
            showConfirmButton: false,
            width: '40%',
            didOpen: function () {
                var accordion = $('#CitasAccordion');
                $.ajax({
                    url: 'CL_Ajax_Calendario.php',
                    type: 'POST',
                    data: {
                        Tipo_Consulta: "Historial Notas Adicionales",
                        idCitas: idCitas,
                    },
                    success: function (data) {
                        var data = JSON.parse(data);
                        var contador = 0;
                        $.each(data, function (i, cita) {
                            var fecha = cita.Fecha;
                            var hora = cita.Hora;
                            var Nota = cita.Nota;
                            Nota = Nota.replace(/\n/g, "<br>");
                            var detalleId = 'detalle' + i;
                            html = `
                                            <div class="panel panel-default" id="collapse_` + detalleId +
                                `">
                                                <div class="panel-heading" role="tab" id="headingTwo">
                                                    <h4 class="panel-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#` +
                                detalleId +
                                `" aria-expanded="false" aria-controls="` + detalleId + `">
                                                        <div class="row">
                                                        <i id="icono-panel" class="fa-regular fa-note-sticky fa-rotate-180" style='float:left;'></i>
                                                        <label id="label-panel"> Fecha: ` + fecha + ` Hora: ` + hora + `</label>
                                                        <i id="icono-panel" class="fa fa-chevron-down" style='float:right;'></i>
                                                        </div>
                                                    </a>
                                                    </h4>
                                                </div>
                                                <div id="` + detalleId +
                                `" class="panel-collapse collapse" role="tabpanel" aria-labelledby="` +
                                detalleId + `" aria-expanded="false" style="height: 0px;">
                                                    <div class="panel-body" style="text-align: initial;">
                                                        <div class="col-md-12">
                                                            ` + Nota + `
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>`;
                            accordion.append(html);
                            contador++;
                        });
                        if (contador == 0) {
                            $('#contenedor_swal').html('<label>No se encontraron notas</label>');
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }
        });
    }
</script>
<link rel="stylesheet" href="css/AccordionNuevo.css">