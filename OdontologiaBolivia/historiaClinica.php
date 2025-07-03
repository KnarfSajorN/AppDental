<?php
require_once '../header.php';
require_once '../menu.php';

$clienteId = decrypt($_GET['cI']);

$QueryCliente = "SELECT * FROM cliente where cliente_id=$clienteId";
$ResultCliente = mysqli_query($conn3, $QueryCliente);
$RowCliente = mysqli_fetch_assoc($ResultCliente);
$RowCliente["edad"] = calculaedad($RowCliente["fechaNacimiento"]);

$nombre_cliente = $RowCliente['nombre_cliente'];
$celular_cliente = $RowCliente['celular_cliente'];
$fechaNacimiento = $RowCliente['fechaNacimiento'];

?>
<link rel="stylesheet" href="apiVoz.css">
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Historia de odontología, Paciente: <?php echo $nombre_cliente . ', Edad: ' . calculaedad($fechaNacimiento); ?></h1>
        <ol class="breadcrumb"></ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- Formulario principal -->
                <form id="form" action="OB_Guardar" method="POST" class="box">
                    <!-- Card para Datos de Paciente -->
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Datos de Paciente</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <?php
                                $fields = [
                                    //?Label = [elementType, inputName, col, typeInput]
                                    "Nombres" => ["input", "nombres", "3", "text"],
                                    "Apellido Paterno" => ["input", "apellido_paterno", "3", "text"],
                                    "Apellido Materno" => ["input", "apellido_materno", "3", "text"],
                                    "Edad" => ["input", "edad", "3", "text"],
                                    "Sexo" => ["input", "sexo", "3", "text"],
                                    "Lugar de nacimiento" => ["input", "lugar_nacimiento", "3", "text"],
                                    "Fecha de nacimiento" => ["input", "fecha_nacimiento", "3", "date"],
                                    "Ocupación" => ["input", "ocupacion", "3", "text"],
                                    "Teléfono" => ["input", "telefono", "3", "number"],
                                    "Grado de instrucción" => ["input", "grado_instruccion", "3", "text"],
                                    "Estado civil" => ["input", "estado_civil", "3", "text"],
                                    "Idioma o dialecto" => ["input", "idioma_dialecto", "3", "text"],
                                ];

                                foreach ($fields as $label => $dataInput) {
                                    $tipoElemento = $dataInput[0];
                                    $name         = $dataInput[1];
                                    $col          = $dataInput[2];
                                    $type         = $dataInput[3];
                                ?>
                                    <div class="col-md-<?= $col ?> mb-3">
                                        <label for="<?= $name ?>" class="form-label"><?= $label ?></label>
                                        <?php
                                        switch ($tipoElemento) {
                                            case 'input': ?>
                                                <input type="<?= $type ?>" name="<?= $name ?>" id="<?= $name ?>" class="form-control">
                                        <?php
                                                break;
                                            default:
                                                break;
                                        }
                                        ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- Card para Antecedentes -->
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Antecedentes</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <?php
                                $fields = [
                                    //?Label = [elementType, inputName, col, typeInput]
                                    "Antecedentes patológicos familiares" => ["textarea", "antecedentes_patologicos_familiares", "12", "text"],
                                ];

                                foreach ($fields as $label => $dataInput) {
                                    $tipoElemento = $dataInput[0];
                                    $name         = $dataInput[1];
                                    $col          = $dataInput[2];
                                    $type         = $dataInput[3];
                                ?>
                                    <div class="col-md-<?= $col ?> mb-3">
                                        <label for="<?= $name ?>" class="form-label"><?= $label ?></label>
                                        <?php
                                        switch ($tipoElemento) {
                                            case 'textarea': ?>
                                                <textarea name="<?= $name ?>" id="<?= $name ?>" class="form-control"></textarea>
                                        <?php
                                                break;
                                            default:
                                                break;
                                        }
                                        ?>
                                    </div>
                                <?php } ?>

                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Antecedentes patológicos personales</label>
                                    <div class="row">
                                        <?php
                                        $checksAntecedentesPPersonales = [
                                            "Anemia" => "Anemia",
                                            "Cardiopatías" => "Cardiopatias",
                                            "Enf. Gástricas" => "Enf_Gastricas",
                                            "Hepatitis" => "Hepatitis",
                                            "Tuberculosis" => "Tuberculosis",
                                            "Asma" => "Asma",
                                            "Diabetes" => "Diabetes",
                                            "Epilepsia" => "Epilepsia",
                                            "Hipertensión" => "Hipertension",
                                            "VIH" => "VIH",
                                            "Ninguno" => "Ninguno",
                                        ];
                                        foreach ($checksAntecedentesPPersonales as $label => $value) { ?>
                                            <div class="form-check col-md-3 col-xs-3">
                                                <input class="form-check-input" type="checkbox" id="checkbox_<?= $value ?>" name="<?= $value ?>">
                                                <label class="form-check-label" for="checkbox_<?= $value ?>"><?= $label ?></label>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>

                                <hr>

                                <div class="col-md-4 col-xs-12 mb-3">
                                    <label for="otro_antecedente" class="form-label">Otro</label>
                                    <input type="text" class="form-control" id="otro_antecedente" name="otro_antecedente">
                                </div>

                                <div class="col-md-4 col-xs-12 mb-3">
                                    <label class="form-label">Alergias</label>
                                    <div class="row">
                                        <div class="form-check col-md-6 col-xs-6">
                                            <input class="form-check-input" type="radio" checked value="Si" name="alergias" id="alergias_si">
                                            <label class="form-check-label" for="alergias_si">Si</label>
                                        </div>
                                        <div class="form-check col-md-6 col-xs-6">
                                            <input class="form-check-input" type="radio" value="No" name="alergias" id="alergias_no">
                                            <label class="form-check-label" for="alergias_no">No</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 col-xs-12 mb-3">
                                    <label class="form-label">Embarazo</label>
                                    <div class="row">
                                        <div class="form-check col-md-3 col-xs-3">
                                            <input class="form-check-input" type="radio" checked value="Si" name="embarazo" id="embarazo_si">
                                            <label class="form-check-label" for="embarazo_si">Si</label>
                                        </div>
                                        <div class="form-check col-md-3 col-xs-3">
                                            <input class="form-check-input" type="radio" value="No" name="embarazo" id="embarazo_no">
                                            <label class="form-check-label" for="embarazo_no">No</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-5 col-xs-6 mb-3 d-flex align-self-end">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="checkbox_hemorragia_despues" name="hemorragia_despues">
                                        <label class="form-check-label" for="checkbox_hemorragia_despues">Tuvo hemorragia después de una extracción dental:</label>
                                    </div>
                                </div>

                                <div class="col-md-4 col-xs-6 mb-3">
                                    <label for="hemorragia_especificar" class="form-label">Especifique</label>
                                    <select name="hemorragia_especificar" id="hemorragia_especificar" class="form-select select2" style="width: 100%;">
                                        <option value="No aplica">No aplica</option>
                                        <option value="Inmediata">Inmediata</option>
                                        <option value="Mediata">Mediata</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Examen Extra Oral</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <?php

                                $optionsRespirador = [
                                    "Nasal" => "Nasal",
                                    "Bucal" => "Bucal",
                                    "Buconasal" => "Buconasal",
                                ];

                                $fields = [
                                    //?Label = [elementType, inputName, col, typeInput]
                                    "ATM" => ["input", "ATM", "4", "text", []],
                                    "Labios" => ["input", "labios", "4", "text", []],
                                    "Ganglios linfáticos" => ["input", "ganglios_linfaticos", "4", "text", []],
                                    "Lengua" => ["input", "lengua", "4", "text", []],
                                    "Respirador" => ["select", "respirador", "4", "text", $optionsRespirador],
                                    "Paladar" => ["input", "paladar", "4", "text", []],
                                    "Otros" => ["input", "examen_extraoral_otros", "4", "text", []],
                                    "Piso de la boca" => ["input", "piso_boca", "4", "text", []],
                                ];

                                foreach ($fields as $label => $dataInput) {
                                    $tipoElemento = $dataInput[0];
                                    $name         = $dataInput[1];
                                    $col          = $dataInput[2];
                                    $type         = $dataInput[3];
                                    $options      = $dataInput[4];
                                ?>
                                    <div class="col-md-<?= $col ?> mb-3">
                                        <label for="<?= $name ?>" class="form-label"><?= $label ?></label>
                                        <?php
                                        switch ($tipoElemento) {
                                            case 'input': ?>
                                                <input type="<?= $type ?>" name="<?= $name ?>" id="<?= $name ?>" class="form-control">
                                            <?php
                                                break;

                                            case 'select': ?>
                                                <select style="width:100%" name="<?= $name ?>" id="<?= $name ?>" class="form-control select2">
                                                    <option value="">Seleccione...</option>
                                                    <?php foreach ($options as $key => $value) { ?>
                                                        <option value="<?= $key ?>"><?= $value ?></option>
                                                    <?php } ?>
                                                </select>
                                        <?php
                                                break;
                                            default:
                                                break;
                                        }
                                        ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Antecedentes bucodentales</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <?php

                                $fields = [
                                    //?Label = [elementType, inputName, col, typeInput]
                                    "Mucosa Yugal" => ["input", "mucosa_yugal", "4", "text", []],
                                    "Fecha de ultima visita al odontólogo" => ["input", "ultima_visita_odontolog", "4", "date", []],
                                    "Encías" => ["input", "encias", "4", "text", []],
                                    "Habitos" => ["input", "habitos", "4", "checkbox", ["Fuma" => "habito_fuma", "Bebe" => "habito_bebe"]],
                                    "Utiliza protesis dental" => ["input", "usa_protesis_dental", "4", "radio", ["Sí" => "Si", "No" => "No"]],
                                ];

                                foreach ($fields as $label => $dataInput) {
                                    $tipoElemento = $dataInput[0];
                                    $name         = $dataInput[1];
                                    $col          = $dataInput[2];
                                    $type         = $dataInput[3];
                                    $iterable     = $dataInput[4];
                                ?>
                                    <div class="col-md-<?= $col ?> mb-3">
                                        <label for="<?= $name ?>" class="form-label"><?= $label ?></label>
                                        <?php
                                        switch ($tipoElemento) {
                                            case 'input':
                                                if ($type == 'radio') { ?>
                                                    <div class="row">
                                                        <?php
                                                        foreach ($iterable as $key => $value) { ?>
                                                            <div class="form-check col-md-4 col-xs-6">
                                                                <input class="form-check-input" <?= $value == 'Si' ? 'checked' : '' ?> type="<?= $type ?>" value="<?= $value ?>" name="<?= $name ?>" id="<?= $value ?>">
                                                                <label class="form-check-label" for="<?= $name ?>"><?= $key ?></label>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                <?php } else if ($type == 'checkbox') { ?>
                                                    <div class="row">
                                                        <?php
                                                        foreach ($iterable as $key => $value) { ?>
                                                            <div class="form-check col-md-4 col-xs-6">
                                                                <input class="form-check-input" type="<?= $type ?>" value="<?= $value ?>" name="<?= $value ?>" id="<?= $value ?>">
                                                                <label class="form-check-label" for="<?= $name ?>"><?= $key ?></label>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                <?php } else { ?>
                                                    <input type="<?= $type ?>" name="<?= $name ?>" id="<?= $name ?>" class="form-control">
                                                <?php } ?>
                                            <?php
                                                break;

                                            case 'select': ?>
                                                <select style="width:100%" name="<?= $name ?>" id="<?= $name ?>" class="form-control select2">
                                                    <option value="">Seleccione...</option>
                                                    <?php foreach ($iterable as $key => $value) { ?>
                                                        <option value="<?= $key ?>"><?= $value ?></option>
                                                    <?php } ?>
                                                </select>
                                        <?php
                                                break;
                                            default:
                                                break;
                                        }
                                        ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Antecedentes de higiene oral</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <?php

                                $fields = [
                                    //?Label = [elementType, inputName, col, typeInput]
                                    "Utiliza cepillo dental" => ["input", "usa_cepillo", "4", "radio", ["Sí" => "Si", "No" => "No"]],
                                    "Utiliza hilo dental" => ["input", "usa_hilo", "4", "radio", ["Sí" => "Si", "No" => "No"]],
                                    "Utiliza enguaje bucal" => ["input", "usa_enguaje", "4", "radio", ["Sí" => "Si", "No" => "No"]],
                                    "Frecuencia del cepillado dental" => ["input", "frecuencia_cepillado", "6", "text", []],
                                    "Durante el cepillado le sangran las encías" => ["input", "sangrado_cepillado", "6", "radio", ["Sí" => "Si", "No" => "No"]],
                                    "Higiene bucal" => ["input", "higiene_bucal", "6", "radio", ["Buena" => "Buena", "Mala" => "Mala", "Regular" => "Regular"]],
                                ];

                                foreach ($fields as $label => $dataInput) {
                                    $tipoElemento = $dataInput[0];
                                    $name         = $dataInput[1];
                                    $col          = $dataInput[2];
                                    $type         = $dataInput[3];
                                    $iterable     = $dataInput[4];
                                ?>
                                    <div class="col-md-<?= $col ?> mb-3">
                                        <label for="<?= $name ?>" class="form-label"><?= $label ?></label>
                                        <?php
                                        switch ($tipoElemento) {
                                            case 'input':
                                                if ($type == 'radio' || $type == 'checkbox') { ?>
                                                    <div class="row">
                                                        <?php
                                                        foreach ($iterable as $key => $value) { ?>
                                                            <div class="form-check col-md-4 col-xs-6">
                                                                <input class="form-check-input" <?= $value == 'Si' || $value == 'Buena' ? 'checked' : '' ?> type="<?= $type ?>" value="<?= $value ?>" name="<?= $name ?>" id="<?= $name ?>">
                                                                <label class="form-check-label" for="<?= $name ?>"><?= $key ?></label>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                <?php } else { ?>
                                                    <input type="<?= $type ?>" name="<?= $name ?>" id="<?= $name ?>" class="form-control">
                                                <?php } ?>
                                            <?php
                                                break;

                                            case 'select': ?>
                                                <select style="width:100%" name="<?= $name ?>" id="<?= $name ?>" class="form-control select2">
                                                    <option value="">Seleccione...</option>
                                                    <?php foreach ($iterable as $key => $value) { ?>
                                                        <option value="<?= $key ?>"><?= $value ?></option>
                                                    <?php } ?>
                                                </select>
                                        <?php
                                                break;
                                            default:
                                                break;
                                        }
                                        ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Observaciones</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <textarea name="observaciones" id="observaciones" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- Botón de Guardar -->
                    <div class="row">
                        <div class="col-md-12 mb-3" align="left">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="terminado" required>
                                <label class="form-check-label" for="terminado">Ya terminé</label>
                            </div>
                        </div>
                        <input type="hidden" name="data_checks" id="data_checks" value="{}">
                        <input type="hidden" name="usuario_id" value="<?php echo $_SESSION['ID'] ?>">
                        <input type="hidden" name="cliente_id" value="<?= $clienteId ?>">
                        <div class="col-md-12">
                            <button class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" style="width:100%" onclick="submitear()" type="button">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

<?php
require_once "../footer.php";
require_once '../plantilla.php';
?>

<script src="apiVoz_3.2.js"></script>
<script>
    function submitear() {
        let data_checks = {};
        $("#form input").each(function() {
            const type = $(this).attr("type");
            const name = $(this).attr("name");

            if (!name ) {
                console.log("elemento " , $(this) , " name " , name );
                
            }


            if (type == 'checkbox' && name != 'terminado') {
                console.log("type", type);
                console.log("name", name);
                const isChecked = $(this).prop("checked"); // Usar .prop() en lugar de .attr() para obtener el estado de los checkboxes
                data_checks[name] = isChecked ? 'on' : 'off';
            }
        });

        $("#data_checks").val(JSON.stringify(data_checks))

        // console.log("submiteado");
        // console.log(data_checks);

        $("#form").submit();
    }



    // $("#form").on( "submit" , (e) => {
    //     console.log("Submiteado");
    //     e.preventDefault();

    //     $("#form input, #form textarea, #form select").each( () => {

    //     })

    //     $("#form").submit()
    // })
</script>


<script>
    // Evitar problemas con el carácter "'"
    $(document).on('input', 'input[type="text"], textarea', function() {
        $(this).val($(this).val().replace(/[']/g, ''));
    });
    
    $(document).ready(function() {
        const dataCliente = {
            nombres: '<?=$RowCliente['primer_nombre']?> <?=$RowCliente['segundo_nombre']?>',
            apellido_paterno: '<?=$RowCliente['primer_apellido']?>',
            apellido_materno: '<?=$RowCliente['segundo_apellido']?>',
            edad: '<?=$RowCliente['edad']?>',
            sexo: '<?=$RowCliente['genero']?>',
            lugar_nacimiento: '',
            fecha_nacimiento: '<?=$RowCliente['fechaNacimiento']?>',
            ocupacion: '<?=$RowCliente['ocupacion']?>',
            telefono: '<?=$RowCliente['telefono_cliente']?>',
            grado_instruccion: '<?=$RowCliente['nivel_educacion']?>',
            estado_civil: '<?=$RowCliente['estado']?>',
            idioma_dialecto: '',
        };

        const keysCliente = Object.keys(dataCliente);

        keysCliente.forEach((key) => {
            const value = dataCliente[key];
            if (value) {
                console.log(key, value);
                $("#form input[name='" + key + "']").val(value);
            }
        });

    });
</script>

<script src="plugins/LottieK/lottie.min.js"></script>