<?php
include '../header.php';
include '../menu.php';
$ID = $_SESSION['ID'];
$ID_principal = $_SESSION['ID_principal'];
$tabla = "MaestroRecordatorio";
$page = 'RecordatoriosForm';
// cargar datos
if ($_GET['FAID']) {
    $FAID = base64_decode($_GET['FAID']);
    $queryConfig = "SELECT * from $tabla where id = $FAID limit 1";
    $resultConfig = mysqli_query($conn3, $queryConfig);
    $rowConfig = mysqli_fetch_array($resultConfig);
}

$fechaActual =
    // query a usuarios tipo asesor
    $queryDoctor = "SELECT * from usuarios 
where   (ID = $ID or ID_principal = $ID_principal)
";
$resultDoctor = mysqli_query($conn3, $queryDoctor);


// echo '<pre>';
// print_r($rowAsesor);
// echo '</pre>';



?>
<link rel="stylesheet" href="<?= $Base ?>/css/emoji.css">
<div class="content-wrapper p-3">
    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="col-xs-12">
                <div class="col-md-12 row">

                    <div class="row">


                    </div>
                    <div class="col-md-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <div class="float-left">
                                    <h4><?= ($rowConfig != null ? 'Editar Alerta #' . $rowConfig['id'] : 'Agregar Alerta') ?> </h4>
                                </div>
                            </div>
                            <form id="correoForm">
                                <div class="card-body row">
                                    <div class="form-group col-md-6">
                                        <label class="col-md-12 " for="">Usuarios</label>

                                        <select class="form-control  w-100 select2" multiple id="arreglo_usuarios" name="datos[arreglo_usuarios][]" autocomplete="new-password" style="width:100% !important;">
                                            <option value="" disabled>Seleccione...</option>
                                            <?php foreach ($resultDoctor as $key) {
                                                echo '<option value="' . $key['ID'] . '" ' . ($rowConfig['arreglo_usuarios'] == $key['ID'] ? 'selected' : '') . '>' . $key['NOMBRE_USUARIO'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="" for=""> Seleccione el intervalo de horas previo a la alerta</label>
                                        <br>
                                        <Select class="form-control" name="datos[hora]" id="hora">
                                            <option value="" disabled>Seleccione...</option>
                                            <option value="48" <?= ($rowConfig['hora'] == 48 ? 'selected' : '') ?>>48 Horas</option>
                                            <option value="24" <?= ($rowConfig['hora'] == 24 ? 'selected' : '') ?>>24 Horas</option>
                                            <option value="12" <?= ($rowConfig['hora'] == 12 ? 'selected' : '') ?>>12 Horas</option>
                                            <option value="6" <?= ($rowConfig['hora'] == 6 ? 'selected' : '') ?>>6 Horas</option>
                                            <option value="3" <?= ($rowConfig['hora'] == 3 ? 'selected' : '') ?>>3 Horas</option>
                                            <option value="2" <?= ($rowConfig['hora'] == 2 ? 'selected' : '') ?>>2 Horas</option>
                                            <option value="1" <?= ($rowConfig['hora'] == 1 ? 'selected' : '') ?>>1 Hora</option>
                                        </Select>
                                        <input type="hidden" name="datos[hora]" id="horas" value="0" disabled>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Tipo de mensaje</label>
                                        <br>
                                        <input type="radio" class="" id="Recordatorio" name="datos[tipo]" value="Recordatorio" <?= ($rowConfig['tipo'] == "Recordatorio" ? 'checked' : '') ?> autocomplete="new-password">
                                        <label for="Recordatorio">Recordatorio</label>
                                        <br>
                                        <input type="radio" class="" id="tipoCumple" name="datos[tipo]" value="Cumpleanos" <?= ($rowConfig['tipo'] == "Cumpleanos" ? 'checked' : '') ?> autocomplete="new-password">
                                        <label for="tipoCumple">Cumpleaños</label>
                                        <br>
                                        <input type="radio" class="" id="Citas" name="datos[tipo]" value="Citas" <?= ($rowConfig['tipo'] == "Citas" ? 'checked' : '') ?> autocomplete="new-password">
                                        <label for="Citas">Mensaje Registro de Citas</label>
                                    </div>

                                    <div class="form-group row col-md-12">
                                        <div class="col-md-12">

                                            <label for=""> Variables </label>
                                        </div>
                                        <?php
                                        $Campos = [
                                            "[[FECHA_CITA]]",
                                            "[[HORA_CITA]]",
                                            "[[NOMBRE_PACIENTE]]",
                                            "[[NOMBRE_DOCTOR]]",
                                            "[[MOTIVO_CONSULTA]]",
                                            "[[FECHAACTUAL]]",
                                        ];
                                        foreach ($Campos as $key => $value) {
                                        ?>
                                            <div class="col-lg-3 py-2">
                                                <button class="btn btn-info btn-block" type="button" onclick="copiarAlPortapapeles('<?= $value ?>')">
                                                    <p id="<?= $key ?>" class="p-0 m-0 text-left">
                                                        <i class="fa fa-copy" title="Copiar" name="Copiar"></i>
                                                        <?= $value ?>
                                                    </p>
                                                </button>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="">Mensaje del Recordatorio</label>
                                        <textarea class="form-control emoji" id="Mensaje" rows="3" placeholder="Escriba un mensaje..." name="datos[Mensaje]" autocomplete="new-password"><?= $rowConfig['Mensaje'] ?></textarea>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <input type="hidden" name="datos[ID_principal]" value="<?= $ID_principal ?>">
                                    <input type="hidden" name="datos[activo]" value="0">
                                    <input type="hidden" name="datos[usuario_id]" value="<?= $ID ?>">
                                    <input type="hidden" name="datos[Zona_Horaria]" value="<?= $_SESSION['geoData']['timezone'] ?>">
                                    <input type="hidden" name="datos[fecha]" value="<?= date('y-m-d H:i:s') ?>">
                                    <button type="submit" class="btn btn-outline-info rounded-pill" onclick="$('#correoForm').automaticForm({type:<?= ($rowConfig == null ? 1 : 2) ?>, table:'<?= $tabla ?>',idUpdate:'<?= ($rowConfig == null ? 0 : $rowConfig['id']) ?>',reload:'',page:'<?= $page ?>?FAID='});">
                                        <i class="fa fa-save mr-1"></i>
                                        Guardar
                                    </button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <div class="float-left">
                                    <h4>Listado de Recordatorios</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped" id="Tabla_Rapida_AJAX">
                                    <?php
                                    $columnasTabla = [
                                        'Tipo',
                                        'fechaRegistro',
                                        'Intervalo de Horas',
                                        'Mensaje',
                                        '',
                                    ];
                                    ?>
                                    <thead>
                                        <tr>
                                            <?php for ($i = 0; $i < count($columnasTabla); $i++) : ?>
                                                <th><?= $columnasTabla[$i] ?></th>
                                            <?php endfor ?>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                            <div class="card-footer">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

</div>
<!-- /.content-wrapper -->
<?php include '../footer.php'; ?>

<script>
    titulo_tabla = 'MaestroRecordatorio';
    query_tabla_ajax = `<?= "SELECT * from $tabla where ID_principal = '{$ID_principal}' " ?>`;
    columnas = ['id', 'fechaRegistro', 'arreglo_usuarios', 'hora', 'tipo', 'Mensaje', 'activo', 'usuario_id', 'fecha', 'ID_principal', 'tipo'];
    columnastablas = [{
            "data": function(row, type, val, meta) {
                data = ``;
                data += `${row.tipo}`;
                return data;
            }
        },
        {
            "data": function(row, type, val, meta) {
                data = ``;
                data += `${row.fechaRegistro}`;
                return data;
            }
        },
        {
            "data": function(row, type, val, meta) {
                data = ``;
                data += `${row.hora}`;
                return data;
            }
        },
        {
            "data": function(row, type, val, meta) {
                data = ``;
                data += `${row.Mensaje}`;
                return data;
            }
        },
        {
            "data": function(row, type, val, meta) {
                data = ``;
                data += `<a href="./<?= $page ?>?FAID=${btoa(row.id)}" class="btn btn-outline-info rounded-pill btn-block" title="Editar">
                    <i class="fa fa-edit"></i>
                    Editar
                    </a>`;
                 if ( row.activo == 0) {
                    data += `<button onclick="verificarCitas(${(row.activo == 1 ? 0 : 1)},'activo','<?= $tabla ?>','${row.id}','<?= $page ?>','${row.tipo}');" class="btn btn-outline-${(row.activo == 1 ? 'danger' : 'success')} rounded-pill btn-block">
                    <i class="fa ${(row.activo == 1 ? 'fa-times' : 'fa-check')}"></i>
                    ${(row.activo == 1 ? 'Desactivar' : 'Activar')}</button>`;
                }else{
                    data += `<button onclick="automaticUpdate(${(row.activo == 1 ? 0 : 1)},'activo','<?= $tabla ?>','${row.id}','<?= $page ?>');" class="btn btn-outline-${(row.activo == 1 ? 'danger' : 'success')} rounded-pill btn-block">
                    <i class="fa ${(row.activo == 1 ? 'fa-times' : 'fa-check')}"></i>
                    ${(row.activo == 1 ? 'Desactivar' : 'Activar')}
                </button>`;
                }

                return data;
            }
        },
    ];
</script>
<script type="text/javascript" src="<?= $Base ?>/js/emoji.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // $("#example1").emojioneArea();
        document.querySelectorAll('.emoji').forEach(emoji => {
            $(emoji).emojioneArea();
        });
    });
</script>
<script>
    function copiarAlPortapapeles(texto) {

        let aux = document.createElement("input");
        aux.setAttribute("value", texto);
        document.body.appendChild(aux);
        aux.select();
        document.execCommand("copy");
        document.body.removeChild(aux);

    }
    $(document).ready(function() {
        $('input[type="radio"]').change(function() {
            let id = this.id;
            if (id == "Citas") {
                $('#horas').prop('disabled', false);
                $('#hora').prop('disabled', true);
                console.log("radio cambiado. ID:", id);

            } else {
                $('#horas').prop('disabled', true);
                $('#hora').prop('disabled', false);
            }


        });
    });

    function verificarCitas(activo, campo, tabla, id, page,tipo) {
        let ID_principal = '<?= $ID_principal ?>';
        $.ajax({
            url: "Ajax_Verificar_MsgCitasActivas.php",
            type: "POST",
            data: {
                ID_principal: ID_principal,
                tipo:tipo
            },
            dataType: "json",
            success: function(response) {
                if (response === true) {
                    swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: `No se puede Activar el recordatorio de ${tipo} ya que existe uno activado en este momento.`,
                        showConfirmButton: false,
                        timer : 3000
                    }).then(function() {
                        location.reload();
                    })
                } else if (response === false) {
                    automaticUpdate(activo, campo, tabla, id, page);
                } 
            }
        
        });
    }
</script>