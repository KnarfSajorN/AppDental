<?php
include '../header.php';
include '../menu.php';

$FAID = base64_decode($_GET['FAID']);
$queryConfig = "SELECT * from asistenteVirtualCommands where id = $FAID limit 1";
$resultConfig = mysqli_query($conn3, $queryConfig);
$rowConfig = mysqli_fetch_assoc($resultConfig);

// configData
$ID = $_SESSION['ID'];
$tabla = "asistenteVirtualCommandsUsers";
$page = 'asistente';

if (tablaExiste($tabla)) {
    $queryConfigData = "SELECT * from $tabla where commandId = $FAID and usuarioId = '$ID' limit 1";
    $resultConfigData = mysqli_query($conn3, $queryConfigData);
    $rowConfigData = mysqli_fetch_assoc($resultConfigData);

    $camposDisponibles = [];

    if ($rowConfig['id'] == 1) {
        // registro de paciente
        $camposDisponibles = [
            [
                'name' => 'tipo_cliente',
                'label' => 'Tipo de documento',
                'pregunta' => '¿Cuál es el tipo de documento del paciente?',
            ],
            [
                'name' => 'CODI_CLIENTE',
                'label' => 'Número de documento',
                'pregunta' => '¿Cuál es el número de documento del paciente?',
            ],
            [
                'name' => 'fechaNacimiento',
                'label' => 'Fecha de nacimiento',
                'pregunta' => '¿Cuál es la fecha de nacimiento del paciente en formato Año, Mes, Diá?',
            ],
            [
                'name' => 'nombre_cliente',
                'label' => 'Nombre completo',
                'pregunta' => '¿Cuál es el nombre completo del paciente?',
            ],
            [
                'name' => 'codigo_pais',
                'label' => 'País de residencia',
                'pregunta' => '¿Cuál es el país de residencia del paciente?',
            ],
            [
                'name' => 'codigo_ciudad',
                'label' => 'Ciudad de residencia',
                'pregunta' => '¿Cuál es la ciudad de residencia del paciente?',
            ],
            [
                'name' => 'direccion_cliente',
                'label' => 'Dirección',
                'pregunta' => '¿Cuál es la dirección del paciente?',
            ],
            [
                'name' => 'zona',
                'label' => 'Zona residencial',
                'pregunta' => 'Zona residencial urbana o rural',
            ],
            [
                'name' => 'estado',
                'label' => 'Estado civil',
                'pregunta' => '¿Cuál es el estado civil del paciente?',
            ],
            [
                'name' => 'genero',
                'label' => 'Genero',
                'pregunta' => '¿Cuál es el sexo del paciente?',
            ],
            [
                'name' => 'celular_cliente',
                'label' => 'Celular',
                'pregunta' => '¿Cuál es el celular del paciente?',
            ],
            [
                'name' => 'correo_cliente',
                'label' => 'Correo electrónico',
                'pregunta' => '¿Cuál es el correo electrónico del paciente?',
            ],
            [
                'name' => 'entidad_id',
                'label' => 'Entidad de salud [EPS]',
                'pregunta' => '¿Cuál es la E.P.S del paciente?',
            ],
        ];
    }

    if ($rowConfig['id'] == 2) {
        // registro de citas
        $camposDisponibles = [
            [
                'name' => 'fecha',
                'label' => 'Fecha de la cita',
                'pregunta' => 'Indique la fecha de la cita en formato Dia, Mes, Año',
                'checked' => true,
                'readonly' => true,
            ],
            [
                'name' => 'Hora',
                'label' => 'Hora de la cita',
                'pregunta' => 'Indique la hora de la cita',
                'checked' => true,
                'readonly' => true,
            ],
            [
                'name' => 'nombre',
                'label' => 'Nombre del paciente',
                'pregunta' => '¿Cuál es el nombre del paciente?',
                'checked' => true,
                'readonly' => true,
            ],
            [
                'name' => 'telefono',
                'label' => 'Teléfono del paciente',
                'pregunta' => '¿Cuál es el número de teléfono del paciente?',
                'checked' => true,
                'readonly' => true,
            ],
            [
                'name' => 'motivoConsulta',
                'label' => 'Motivo de la consulta',
                'pregunta' => '¿Cuál es el motivo de la consulta?',
                'checked' => true,
                'readonly' => true,
            ],
        ];
    }
}
?>


<div class="content-wrapper p-3">
    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="col-xs-12">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <h4 class="card-title">Configuración <strong><?= $rowConfig['nombre'] ?></strong></h4>
                            </div>
                            <form id="asistenteForm">
                                <div class="card-body row">
                                    <div class="form-group col-md-12">
                                        <label for="">Estado</label>
                                        <select name="datos[activo]" id="activo" class="form-control">
                                            <option value="1" <?= ($rowConfigData['activo'] == '1' ? 'selected' : '') ?>>Activo</option>
                                            <option value="0" <?= ($rowConfigData['activo'] == '0' ? 'selected' : '') ?>>Inactivo</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">Frase de activación</label>
                                        <input type="text" name="datos[comando]" id="comando" class="form-control" value="<?= $rowConfigData['comando'] ?>">
                                        <small class="text-muted">Palabra o frase que inicia una acción o tarea, Ej: registrar paciente / abre el correo electrónico, este comando debe utilizarse junto a la palabra de activación del asistente virtual, Ej: "medical registrar paciente"</small>
                                    </div>

                                    
                                    <?php if (count($camposDisponibles) > 0) : ?>
                                        <div class="col-md-12">
                                            <label for="">Opciones disponibles</label>
                                            <div class="row">
                                            <?php $preguntas = explode('|/|', $rowConfigData['preguntas']); ?>
                                            <?php foreach ($camposDisponibles as $key => $value) : ?>
                                                <?php 
                                                $estaPregunta = in_array($value['name'].'||'.$value['pregunta'], $preguntas);    
                                                ?>
                                                <div class="form-group col-md-6">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" name="datos[preguntas][<?= $value['id'] ?>]" id="" value="<?= $value['name'] ?>||<?= $value['pregunta'] ?>" <?= ($estaPregunta ? 'checked' : '') ?> <?= ($value['readonly'] ? 'onclick="return false;"' : '') ?> <?= ($value['checked'] ? 'checked' : '') ?> >
                                                            <?= $value['label'] ?>
                                                        </label>
                                                    </div>
                                                </div>
                                            <?php endforeach ?>
                                            </div>
                                        </div>                                        
                                    <?php endif ?>
                                    


                                </div>
                                <div class="card-footer">
                                    <input type="hidden" name="datos[random]" value="<?= rand(1, 999999) ?>">
                                    <input type="hidden" name="datos[usuarioId]" value="<?= $_SESSION['ID'] ?>">
                                    <input type="hidden" name="datos[commandId]" value="<?= $rowConfig['id'] ?>">
                                    <button type="submit" class="btn btn-outline-info rounded-pill" onclick="$('#asistenteForm').automaticForm({type:<?= ($rowConfigData == null ? 1 : 2) ?>, table:'<?= $tabla ?>',idUpdate:'<?= ($rowConfigData == null ? 0 : $rowConfigData['id']) ?>',reload:'',page:'<?= $page ?>?FAID='});">
                                        <i class="fa fa-save mr-1"></i>
                                        Guardar
                                    </button>
                                </div>
                            </form>
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
<?php
include '../footer.php';
?>