<?php
include 'header.php';
include 'menu.php';




$_POST = DatosIngresarMysqli($_POST);
$Nombre_Tabla = "Eventos_Recordatorio";
#Inicio
if (isset($_POST['Guardar_Informacion_Pagina'])) {

    $Arreglo = $_POST["Arreglo"];
    $tabla = mysqli_query($conn3, "SHOW TABLES LIKE '{$Nombre_Tabla}'");
    $nrowtabla = mysqli_num_rows($tabla);
    if ($nrowtabla == 0) {
        foreach ($Arreglo as $key => $value) {
            $Campos .= "`{$key}` text NULL,";
        }
        $Campos = trim($Campos, ',');

        $query = "CREATE TABLE `{$Nombre_Tabla}` (
        `id` int(11) NOT NULL,
        `Fecha_Registro` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
        `usuario_id_registro` int(11) NOT NULL,
        {$Campos},
        `Creacion_Dinamica` text ,
        `evento_padre` int(11) NULL DEFAULT '0',
        `Activo` varchar(5) DEFAULT '1'
        ) ENGINE=MyISAM DEFAULT CHARSET=latin1;";

        $creaciontabla = mysqli_query($conn3, $query);
        if (!$creaciontabla) {
            echo "<script language='Javascript'> alert('error en la creacion de la tabla');</script>";
        } else {
            mysqli_query($conn3, "ALTER TABLE `{$Nombre_Tabla}` ADD PRIMARY KEY (`id`);");
            mysqli_query($conn3, "ALTER TABLE `{$Nombre_Tabla}` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;");
        }
    } else {
        if ($nrowtabla == 1) {

            $Campo1 = mysqli_query($conn3, "show COLUMNS from {$Nombre_Tabla} WHERE Field = 'Creacion_Dinamica';");
            $nrowCampo1 = mysqli_num_rows($Campo1);
            if ($nrowCampo1 == "1") {
                foreach ($Arreglo as $key => $value) {
                    $Campo = mysqli_query($conn3, "show COLUMNS from {$Nombre_Tabla} WHERE Field = '{$key}';");
                    $nrowCampo = mysqli_num_rows($Campo);
                    if ($nrowCampo == 0) {
                        mysqli_query($conn3, "ALTER TABLE `{$Nombre_Tabla}` ADD `{$key}` TEXT NULL ;");
                    }
                }
            } else {
                echo "<script language='Javascript'> alert('Tabla No fue creada Dinamicamente');</script>";
                // si bota este mensaje es por que la tabla no esta creado el campo *Creacion_Dinamica* sirve para que no se use este modulo en tablas ya preexistentes
            }
        }
    }

    $Campos = "";
    $Valores = "";
    foreach ($_POST["Arreglo"] as $key => $value) {
        $Campos .= $key . ',';
        $Valores .= "'{$value}',";
    }
    $Campos = trim($Campos, ',');
    $Valores = trim($Valores, ',');




    $usuario_id = $_POST['usuario_id'];

    $queryList = mysqli_query($conn3, "INSERT INTO {$Nombre_Tabla} (usuario_id_registro,{$Campos}) VALUES ('$usuario_id',{$Valores});");
    $evento_id = mysqli_insert_id($conn3);

    $DuracionMeses = $_POST['Arreglo']['MesesRepeticion'];
    $Repetir = $_POST['Arreglo']['Repetir'];

    if ($DuracionMeses != "" and $Repetir == "1") {

        $CamposLoop = "";
        $ValoresLoop = "";
        foreach ($_POST["Arreglo"] as $key => $value) {
            if ($key == "Fecha" || $key == "Hora") {
            } else {
                $CamposLoop .= $key . ',';
                $ValoresLoop .= "'{$value}',";
            }
        }
        $CamposLoop = trim($CamposLoop, ',');
        $ValoresLoop = trim($ValoresLoop, ',');

        $FechaHora_Inicio = $_POST['Arreglo']['Fecha'] . " " . $_POST['Arreglo']['Hora'];

        for ($i = 1; $i <= $DuracionMeses; $i++) {

            $nuevaFechaTemporal = $FechaHora_Inicio;
            $nuevaFechaTemporal = strtotime('+' . $i . ' month', strtotime($FechaHora_Inicio));
            $nuevaFecha_Final = date('Y-m-d', $nuevaFechaTemporal);
            $nuevaHora_Final = date('H:i:s', $nuevaFechaTemporal);




            mysqli_query($conn3, "INSERT INTO {$Nombre_Tabla} (usuario_id_registro,Fecha,Hora,evento_padre,{$CamposLoop}) VALUES ('$usuario_id','$nuevaFecha_Final','$nuevaHora_Final','$evento_id',{$ValoresLoop});");
        }
    }
    $ruta = htmlentities($_SERVER['PHP_SELF']);
    $ruta = str_replace('.php', '', $ruta);
    if ($queryList != true) {
        echo "<script language='Javascript'> window.location='{$ruta}?error=Hubo un Error al Guardar el Evento/Recordatorio'</script>";
    } else {
        echo "<script language='Javascript'> window.location='{$ruta}?msg=Se Guardo el Evento/Recordatorio Correctamente'</script>";
    }
}


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

<link rel="stylesheet" href="plugins/FullCalendarK/Fullcalendar.min.css" />

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
        <div class="row">

            <!-- /.col -->
            <div class="col-md-12">
                <br>
            </div>
            <div class="col-md-12">
                <h4 class="Titulo_Pagina">Calendario Recordatorio/Eventos</h4>
                <div class="box box-primary">
                    <div class="box-body no-padding row">
                        <div class="col-md-6">
                            <button type="button" class="btn btn-block btn-outline-info rounded-pill shadow m-1" data-toggle="modal" data-target="#ModalAgregarEvento">
                                Agregar Evento/Recordatorio
                            </button>
                        </div>
                        <div class="col-md-6">
                            <button type="button" class="btn btn-block btn-outline-info rounded-pill shadow m-1" onclick="MostrarDivUsuarios();">
                                Filtrar Por Usuario
                            </button>
                        </div>

                        <div class="col-md-12" id="Div_FiltroUsuarios" style="display:none;">
                            <div align="left">Filtro Por Usuario:</div>
                            <select id="usuario_calendario" class="form-control select2" style="width:100%;color:black" onchange="FiltrarEventosCalendario()">
                                <option value="0">Todos</option>
                                <?php
                                $QueryUsuario = mysqli_query($conn3, "SELECT * FROM  usuarios WHERE (ID = '{$_SESSION['ID']}' or ID = '{$_SESSION['ID_principal']}') and ACTIVO='1' ");
                                while ($RowUsuario = mysqli_fetch_array($QueryUsuario)) {
                                    $ID = $RowUsuario['ID'];
                                    $NOMBRE_USUARIO = $RowUsuario['NOMBRE_USUARIO'];

                                    echo "<option value='$ID'> $NOMBRE_USUARIO </option>";
                                }
                                ?>
                            </select>

                        </div>

                        <div class="col-md-12">
                            <div id="calendar"></div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /. box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>




<!-- Modal -->
<div class="modal fade" id="ModalAgregarEvento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Evento/Recordatorio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
                <div class="modal-body row">

                    <div class="form-group col-md-12">
                        <label>Usuario</label>
                        <select name="Arreglo[usuario_id]" class="form-control select2" style="width: 100%;" required>
                            <option value="" selected="selected">Seleccione Usuario</option>
                            <?php
                            $QueryUsuario = mysqli_query($conn3, "SELECT * FROM usuarios WHERE (ID = '{$_SESSION['ID']}' or ID = '{$_SESSION['ID_principal']}') and ACTIVO='1' ");
                            while ($RowUsuario = mysqli_fetch_array($QueryUsuario)) {
                                $ID = $RowUsuario['ID'];
                                $NOMBRE_USUARIO = $RowUsuario['NOMBRE_USUARIO'];

                                echo "<option value='$ID'> $NOMBRE_USUARIO </option>";
                            }
                            ?>

                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label>Fecha</label>
                        <input type="date" class="form-control" name="Arreglo[Fecha]" required>
                    </div>

                    <div class="form-group col-md-4">
                        <label>Hora</label>
                        <input type="time" class="form-control" name="Arreglo[Hora]" required>
                    </div>

                    <div class="form-group col-md-4">
                        <label>Duración</label>
                        <input type="number" class="form-control" name="Arreglo[Duracion]" required step="1" value="60" min="0">
                    </div>

                    <div class="form-group col-md-12">
                        <label>Repetir Cada Mes</label><br>
                        <input type="checkbox" class="form-control" name="Arreglo[Repetir]" style="width: 50px;" value="1" onclick="manejarCheckbox()">
                    </div>

                    <div class="form-group col-md-12" id="ModuloRepetir">

                    </div>

                    <div class="form-group col-md-12">
                        <label>Titulo</label>
                        <input type="text" class="form-control" name="Arreglo[Titulo]" required>
                    </div>

                    <div class="form-group col-md-12">
                        <label>Detalles</label>
                        <textarea name="Arreglo[Detalles]" class="editorJR" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                    </div>

                    <input type="hidden" name="usuario_id" value="<?php echo $usuario_id; ?>">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger rounded-pill shadow m-1" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-outline-info rounded-pill shadow m-1" name="Guardar_Informacion_Pagina">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>




<div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" style="top: 100px;">
        <div class="modal-content" id="modalfacturascontenido">
            <div class="modal-header">
                <h5 class="modal-title" id="tituloEvento"> </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#" method="POST">
                <div class="modal-body ">
                    <div id="descripcionEvento" class="col-md-12 row">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-block btn-outline-info rounded-pill shadow m-1" data-dismiss="modal">Salir</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>


<style>
    .fc-nonbusiness {
        background-color: #ffc4c4 !important;
    }

    .fc-content,
    i {
        padding-right: 5px;
    }

    /* .fc-content>.fa-circle-check {
        color: #83ed83;
    } */

    .fc-time-grid-event.fc-v-event.fc-event.fc-start.fc-end.fc-short {
        height: 16px;
    }

    .fc-license-message {
        display: none;
    }

    .fade.in {
        opacity: 1;
        background-color: #47474769;
    }


    .modal {
        background: rgba(0, 0, 0, 0.3);
    }
</style>

<script>
    $(function() {
        //Initialize Select2 Elements
        $(".select2").select2();
    });
</script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="plugins/FullCalendarK/Moment.min.js"></script>
<script src='plugins/FullCalendarK/Fullcalendar.min.js'></script>
<script src='plugins/FullCalendarK/Locale_es-us.js'></script>
<script src='plugins/FullCalendarK/es.js'></script>
<!-- <script src="dist/js/app.min.js"></script> -->
<!--
<link href='https://cdn.jsdelivr.net/npm/fullcalendar@3.10.2/dist/fullcalendar.min.css' rel='stylesheet' />
<link href='https://cdn.jsdelivr.net/npm/fullcalendar@3.10.2/dist/fullcalendar.print.css' rel='stylesheet' media='print' />-->

<!--<script src='https://cdn.jsdelivr.net/npm/moment@2.24.0/min/moment.min.js'></script>

<script src='https://cdn.jsdelivr.net/npm/fullcalendar@3.10.2/dist/fullcalendar.min.js'></script>-->

<script>
    function ActualizarEstadoEvento(id, estado) {
        // Prevenir la redirección predeterminada
        event.preventDefault();
        //si estado = 1, poner texto de completar, si estado = 2 poner texto de cancelar y si estado = 3 poner texto de ocultar
        if (estado == 1) {
            var estadoTexto = 'Esta Accion Completara el Evento. ¿Estás Seguro de Continuar?';
        }
        if (estado == 2) {
            var estadoTexto = 'Esta Accion Cancelara el Evento. ¿Estás Seguro de Continuar?';
        }
        if (estado == 3) {
            var estadoTexto = 'Esta Accion Ocultara el Evento. ¿Estás Seguro de Continuar?';
        }
        // Mostrar el SweetAlert de confirmación
        Swal.fire({
            title: '¿Estás Seguro?',
            text: estadoTexto,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#28a745',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Sí',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    type: "POST",
                    url: "CL_AjaxRecordatorio.php",
                    data: {
                        estado: estado,
                        evento_id: id,
                        Tipo_Consulta: "Estado Evento"
                    },
                    success: function(response) {
                        //console.log(response);
                        var Respuesta = JSON.parse(response);

                        if (Respuesta.Estado == true) {
                            Swal.fire(
                                'Completado!',
                                'Se Ejecuto Correctamente!',
                                'success'
                            );

                            setTimeout(function() {
                                window.location = 'CL_Recordatorio';
                            }, 2000);
                        } else {
                            Swal.fire(
                                'Error!',
                                'Error al Ejecutar, ' + Respuesta.Mensaje,
                                'danger'
                            );

                            setTimeout(function() {
                                window.location = 'CL_Recordatorio';
                            }, 3000);
                        }
                    }
                });

            }
        });
    }

    function manejarCheckbox() {
        // Obtener el checkbox
        var checkbox = document.querySelector('input[name="Arreglo[Repetir]"]');

        // Obtener el div
        var moduloRepetirDiv = document.getElementById('ModuloRepetir');

        if (checkbox.checked) {
            // Crear un label y un input
            var label = document.createElement('label');
            label.textContent = 'Duración en Meses';

            //agregar un br
            var br = document.createElement('br');

            var input = document.createElement('input');
            input.type = 'number';
            input.min = 1;
            input.className = 'form-control';
            input.name = 'Arreglo[MesesRepeticion]';
            input.required = true;

            // Agregar los elementos al div
            moduloRepetirDiv.innerHTML = '';
            moduloRepetirDiv.appendChild(label);
            moduloRepetirDiv.appendChild(br);
            moduloRepetirDiv.appendChild(input);
        } else {
            // Limpiar el contenido del div
            moduloRepetirDiv.innerHTML = '';
        }
    }

    function MostrarDivUsuarios() {
        var div = document.getElementById("Div_FiltroUsuarios");
        if (div.style.display === "none") {
            div.style.display = "block";
        } else {
            div.style.display = "none";
        }
    }
</script>
<script>
    function FiltrarEventosCalendario() {
        $('#calendar').fullCalendar('destroy');
        //ruta 
        // si existe document.getElementById("calendario_usuario") 
        var usuario_calendario = document.getElementById("usuario_calendario").value;
        MostrarCalendario(usuario_calendario);
    }
</script>




<script>
    function MostrarCalendario(usuario) {



        var calendar = $('#calendar').fullCalendar({
            lang: 'es',
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            buttonText: {
                today: 'Dia Actual',
                month: 'Mes',
                week: 'Semana',
                day: 'Dia'
            },
            slotDuration: '00:15:00',
            editable: false,
            selectable: true,
            eventSources: [{
                url: 'CL_AjaxRecordatorio.php',
                method: 'POST',
                data: {
                    usuario_id: usuario,
                    Tipo_Consulta: 'Eventos_Calendario'
                },
                failure: function() {
                    alert('there was an error while fetching events!');
                },
            }],
            eventRender: function(event, element, view) {
                var i = document.createElement('i');
                // Add all your other classes here that are common, for demo just 'fa'
                i.className = 'fa'; /*'ace-icon fa yellow bigger-250 '*/
                i.classList.add(event.icon);
                // If you want it inline with title
                element.find('div.fc-content').prepend(i);
                // If you want it on a line before
                // element.prepend(i);
                // Or the next line after title
                //element.append(i)
                if (event.icon1 != "") {
                    var i1 = document.createElement('i');
                    i1.className = 'fa';
                    i1.classList.add(event.icon1);
                    element.find('div.fc-content').prepend(i1);
                }

            },
            eventClick: function(calEvent, jsEvent, view) {

                //console.log('322132121');

                $('#tituloEvento').html(calEvent.title);
                $('#descripcionEvento').html(calEvent.descripcion);
                $('#modalfacturascontenido').removeClass();
                $('#modalfacturascontenido').addClass("modal-content");
                $('#modalfacturascontenido').addClass(calEvent.backgroundColorModal);
                $('#exampleModal').modal();

            },
            //header and other values

        });


    }
    $(document).ready(function() {
        MostrarCalendario('0');
    });
</script>

<!-- scripts para el menu normal de agendamiento -->