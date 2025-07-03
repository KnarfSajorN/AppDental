<?php
include 'header.php';
include 'menu.php';
$usuario_id = $_SESSION['ID'];
$ID_principal = $_SESSION['ID_principal'];
$idtarea = decrypt($_GET["idtarea"]);
if (isset($_POST['Actualizar_Tarea'])) {

    $estado     = trim($_POST['estado']);
    $comentarios     = trim($_POST['comentarios']);
    $tarea_id     = trim($_POST['tarea_id']);


    mysqli_query($conn3, "INSERT INTO TS_Tareas_Comentarios (id_tarea,comentario,estado) VALUES ('$tarea_id','$comentarios','$estado')");

    echo "<script language='Javascript'> window.location='calendarioTareasGestion?msg=Actualizar';</script>";
}
if (isset($_POST['Cerrar_Tarea'])) {
    $tarea_id     = trim($_POST['tarea_id_2']);

    mysqli_query($conn3, "UPDATE TS_Tareas SET estado='1' WHERE id='$tarea_id'");

    echo "<script language='Javascript'> window.location='calendarioTareasGestion?msg=Cerrado';</script>";
}
if (isset($_GET['remove'])) {
    echo $tarea_id    = trim($_GET['idTarea']);

    mysqli_query($conn3, "UPDATE TS_Tareas SET estado='2' WHERE id='$tarea_id'");

    echo "<script language='Javascript'> window.location='calendarioTareasGestion';</script>";
}

?>
<link href="css/input.css" rel="stylesheet" type="text/css" media="all">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Gestion de Tareas

        </h1>
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#">Gestion de Tareas</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="col-xs-12">
                <?php
                $msg = $_GET['msg'];
                if ($msg == 'Tareas') {
                    echo '
        <div class="callout callout-info ">
        <h4> Creada!</h4>
        <p> La tarea fue creada correctamente</p>
      </div>';
                }
                if ($msg == 'Actualizar') {
                    echo '
        <div class="callout callout-info ">
        <h4> Actualizacion!</h4>
        <p> La tarea fue Actualizada correctamente</p>
      </div>';
                }
                if ($msg == 'Cerrado') {
                    echo '
        <div class="callout callout-danger ">
        <h4> Cerrada!</h4>
        <p> La tarea fue Cerrada correctamente</p>
      </div>';
                }

                ?>

                <div class="box">
                    <div class="box-header">
                        <a href="calendarioTareas">
                            <button class="btn btn-block btn-outline-info rounded-pill btn-sm mb-3">
                                <h4> <strong> <i class="fas fa-calendar-alt"></i> Ir al Calendario de Tareas </strong></h4>
                            </button>
                        </a>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">


                        <div class="box-body table-responsive">
                            <table id="example1" class="table table-bordered table-striped" style="font-size:18px">
                                <thead>
                                    <tr>
                                        <th width="7%">#</th>
                                        <th width="13%">Asignado</th>
                                        <th>Tarea</th>
                                        <th style="width: 120px"> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $ID = $_SESSION['ID'];

                                    if ($_SESSION['vista'] == 0) {
                                        $resultado = mysqli_query($conn3, "SELECT * FROM TS_Tareas where (usuario_id = '$usuario_id' or ID_principal = '$ID_principal') AND estado = '0' AND estado != 2 order by id");
                                    } elseif ($_SESSION['vista'] == 1) {
                                        $resultado = mysqli_query($conn3, "SELECT * FROM TS_Tareas where (usuario_id = '$usuario_id' or ID_principal = '$ID_principal') AND estado = '0' AND estado != 2 order by id");
                                    }
                                    $contador = 0;
                                    while ($fila = mysqli_fetch_array($resultado)) {
                                        $contador++;
                                        $arreglo["Ok"] = "#00800066;";
                                        $arreglo["Con Dificultades"] = "#ffff0066;";
                                        $arreglo["No Realizado"] = "#ff00005e;";
                                        $id_tarea = $fila["id"];
                                        $asignado = $fila["asignado"];
                                        $comentarios = '<p>Comentarios</p>';
                                        $queryList1 = mysqli_query($conn3, "SELECT * FROM  TS_Tareas_Comentarios where id_tarea = '$id_tarea' ORDER BY id");
                                        $nrowl = mysqli_num_rows($queryList1);
                                        while ($rowMotorizado1 = mysqli_fetch_array($queryList1)) {
                                            $estado = $rowMotorizado1['estado'];
                                            $comentarios .= '<p style="background-color:' . $arreglo[$estado] . '">' . $rowMotorizado1['comentario'] . '.<br> Estado : ' . $rowMotorizado1['estado'] . '.<br> Fecha : ' . $rowMotorizado1['fecha'] . '.</p>';
                                        }
                                        $queryRellenaArreglo = mysqli_query($conn3, "SELECT * FROM TS_Tareas_Auxiliares");
                                        while ($arrayArregloAuxiliar = mysqli_fetch_array($queryRellenaArreglo)) {
                                            $arregloTipo = $arrayArregloAuxiliar['tipoEstado'];
                                            $queryComprobarArreglo = mysqli_query($conn3, "SELECT asignado, nombreAuxiliar FROM TS_Tareas WHERE  (usuario_id = '$usuario_id' or ID_principal = '$ID_principal') AND asignado = '{$arregloTipo}' AND estado != 2");
                                            while ($arrayArregloCompruebas = mysqli_fetch_array($queryComprobarArreglo)) {
                                                if ($arrayArregloCompruebas['nombreAuxiliar'] != $arrayArregloAuxiliar['nombreAuxiliar'] && $arrayArregloCompruebas['nombreAuxiliar'] != '') {
                                                    $arregloauxiliares["Auxiliar Anterior" . $arrayArregloCompruebas['asignado']] = $arrayArregloCompruebas['nombreAuxiliar'];
                                                }
                                            }
                                            $arregloauxiliares["Auxiliar " . $arrayArregloAuxiliar['tipoEstado']] = $arrayArregloAuxiliar['nombreAuxiliar'];
                                        }
                                        echo '<tr>';
                                        echo '<td>' . $id_tarea . '</td>';
                                        $queryComprobarAuxiliar = mysqli_query($conn3, "SELECT * FROM TS_Tareas_Auxiliares where tipoEstado = '$asignado'")->fetch_object();
                                        if ($queryComprobarAuxiliar->nombreAuxiliar != $fila["nombreAuxiliar"] && $fila["nombreAuxiliar"] != '') {
                                            echo '<td>' . ($asignado == 0 ? '' : '' . $asignado . '<br><b>') . $fila["nombreAuxiliar"] . '</b></td>';
                                        } else {
                                            echo '<td>' . ($asignado == 0 ? '' : ' ' . $asignado . '<br><b>') . $queryComprobarAuxiliar->nombreAuxiliar . '</b></td>';
                                        }
                                        echo '<td>' . ($fila['fechaR'] ? '<br>Vigencia: ' . $fila['fechaR'] . '<br>' : '') . '<b>' . $fila['titulo'] . '</b><br>' . $fila['tarea'] . '<br><br>' . $comentarios . '</td>';
                                        echo '<td style="width: 120px;font-size:23px;text-align:center">';
                                        echo '<a data-toggle="modal" data-target="#modalForm" onclick="ActualizarTarea(' . $fila['id'] . ');" title="Actualizar Tarea" style="padding-right: 10px;"><i class="  fas fa-file-prescription"></i></i></a>';
                                        echo '<a data-toggle="modal" data-target="#modalFormEliminar" onclick="ActualizarTarea(' . $fila['id'] . ');" title="Cerrar Tarea" style="padding-right: 10px;"><i class="fas fa-unlock-alt"></i></i></a>';
                                        if ($_SESSION['ID'] <> '') {
                                            ?>
                                            <a title="Eliminar" onclick="automaticUpdate('2','estado','TS_Tareas','<?=$fila['id']?>','')" style="padding-right: 10px;"><i class="fa fa-trash"></i></i></a>
                                        <?php }
                                        echo '</td>
                                        </tr>';
                                    }
                                    $queryUsuarios = mysqli_query($conn3, "SELECT * FROM usuarios WHERE ID_principal = $usuario_id or ID_principal = $ID_principal");
                                    
                   
                                    foreach ($queryUsuarios as $key) {
                                        $optionauxiliar .= "<option value=\'{$key['ID']}\'>{$key['NOMBRE_USUARIO']}</option>";
                                    }
                                    $idtarea = decrypt($_GET["idtarea"]);
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th width="7%">#</th>
                                        <th width="13%">Asignado</th>
                                        <th>Tarea</th>
                                        <th style="width: 120px"> </th>
                                    </tr>
                                </tfoot>
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

<div class="modal fade" id="modalForm" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Cerrar</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Actualizar Tarea</h4>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                <form action="calendarioTareasGestion" method="POST" name="formularioEnvioExamen">
                    <div class="form-group">
                        <div class="form__group col-md-12">
                            <select class="form__field" name="estado" id="estado" onchange="color()" required>
                                <option value="">Seleccione un Estado</option>
                                <option style="background-color:#00800066;">Ok</option>
                                <option style="background-color:#ffff0066;">Con Dificultades</option>
                                <option style="background-color:#ff00005e;">No Realizado</option>
                            </select>

                            <label for="estado" class="form__label">Estado</label>
                        </div>

                        <div class="form__group col-md-12">
                            <textarea class="form__field" name="comentarios" id="comentarios" style="max-width:100%;"></textarea>
                            <label for="comentarios" class="form__label">Comentarios</label>
                        </div>

                        <input type="hidden" name="tarea_id" id="tarea_id">
                    </div>
                    <div style="padding-top: 20px;display: table;">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary submitBtn" name="Actualizar_Tarea">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalFormEliminar" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg">
                    Esta seguro que desea cerrar la Tarea?
                </p>
                <form action="calendarioTareasGestion" method="POST" name="formularioEnvioExamen">
                    <div class="form-group">
                        <input type="hidden" name="tarea_id_2" id="tarea_id_2">
                    </div>
                    <div style="padding-top: 20px;display: table;">
                        <button type="submit" class="btn btn-primary submitBtn" name="Cerrar_Tarea">Cerrar Tarea</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalFormRemover" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Cerrar</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Cerrar Tarea</h4>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                <form action="calendarioTareasGestion" method="POST" name="formularioEnvioExamen">
                    <div class="form-group">

                        <input type="hidden" name="idTarea" id="idTarea">
                    </div>
                    <div style="padding-top: 20px;display: table;">
                        <button type="button" class="btn btn-default" data-dismiss="modal"></button>
                        <button type="submit" class="btn btn-primary danger submitBtn" name="remove">Eliminar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- /.content-wrapper -->
<?php
include 'footer.php';

?>
<script type="text/javascript">
    function ActualizarTarea(id) {
        document.getElementById("tarea_id").value = id;
        document.getElementById("tarea_id_2").value = id;
    }
    function color() {
        var e = document.getElementById("estado");
        var strUser = e.options[e.selectedIndex].style.backgroundColor;
        e.style.backgroundColor = strUser;
    }
</script>

<script type="text/javascript">
    $(document).ready(function() {
        // Setup - add a text input to each footer cell
        $('#example1 thead tr').clone(true).addClass('filters').appendTo('#example1 thead');
        var table = $('#example1').DataTable({
            destroy: true,
            orderCellsTop: true,
            searching: true,
            "bPaginate": true,
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
            },
            processing: true,
            lengthMenu: [10, 20, 50, 100, 200, 500],
            initComplete: function() {
                var api = this.api();
                // For each column
                api
                    .columns()
                    .eq(0)
                    .each(function(colIdx) {
                        // Set the header cell to contain the input element
                        var cell = $('.filters th').eq(
                            $(api.column(colIdx).header()).index()
                        );
                        var title = $(cell).text();
                        if ($(cell).text() == 'Asignado') {
                            $(cell).html('<select name="text" class="input-lg form-group" style="width:100%"><option value="" selected>Seleccione</option><?php echo $optionauxiliar ?></select>');
                        } else if (title == '#') {
                            $(cell).html('<input type="text" id="codigo" class="input-lg form-group" style="width:100%" value="<?php echo $idtarea; ?>">');
                        } else if (title == 'Tarea') {
                            $(cell).html('<input type="text" id="fechaPalabra" class="input-lg form-group" placeholder="Buscar por Fecha o Palabra Clave" style="width:100%" value="">');
                        } else {
                            // $(cell).html('<input type="text" placeholder="' + title + '" />');
                        }
                        // On every keypress in this input
                        $('input', $('.filters th').eq($(api.column(colIdx).header()).index())).off('keyup change click').on('keyup change click', function(e) {
                            e.stopPropagation();
                            // Get the search value
                            $(this).attr('title', $(this).val());
                            var regexr = '({search})'; //$(this).parents('th').find('select').val();
                            var cursorPosition = this.selectionStart;
                            // Search the column for that value
                            api
                                .column(colIdx)
                                .search(
                                    this.value != '' ?
                                    regexr.replace('{search}', '(((' + this.value + ')))') :
                                    '',
                                    this.value != '',
                                    this.value == ''
                                )
                                .draw();
                            $(this)
                                .focus()[0]
                                .setSelectionRange(cursorPosition, cursorPosition);
                        });
                        // On every keypress in this input
                        $('select', $('.filters th').eq($(api.column(colIdx).header()).index())).off('keyup change').on('keyup change', function(e) {
                            e.stopPropagation();
                            // Get the search value
                            $(this).attr('title', $(this).val());
                            var regexr = '({search})'; //$(this).parents('th').find('select').val();
                            var cursorPosition = this.selectionStart;
                            // Search the column for that value
                            api
                                .column(colIdx)
                                .search(
                                    this.value != '' ?
                                    regexr.replace('{search}', '(((' + this.value + ')))') :
                                    '',
                                    this.value != '',
                                    this.value == ''
                                )
                                .draw();
                            $(this)
                                .focus()[0]
                                .setSelectionRange(cursorPosition, cursorPosition);
                        });
                        <?php if ($idtarea != "") : ?>
                            $("#codigo").click();
                        <?php endif; ?>
                    });
            },
        });
    });
</script>