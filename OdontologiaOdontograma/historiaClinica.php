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
                <form id="form" action="OBO_Guardar" method="POST" class="box">

                    <!-- Card -->
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Odontograma</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <!-- <div class="row"> -->
                            <?php
                            require_once './OD_Odontograma_Bolivia.php';
                            ?>
                            <!-- </div> -->
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Historia</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <td class="tg-0pky" style="width:20%">
                                                <label for="">Fecha</label>
                                                <input value="<?=date("Y-m-d")?>" type="date" name="fecha" id="" class="form-control">
                                            </td>
                                            <td class="tg-0pky" style="width:80%">
                                                <label for="">Subjetivo: </label>
                                                <textarea style="height: 100px" name="subjetivo" id="" class="form-control"></textarea>
                                            </td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="tg-0pky">
                                                <label for="">Hora</label>
                                                <input type="time" value="<?=date("H:i")?>" name="hora" id="" class="form-control">
                                            </td>
                                            <td class="tg-0pky" rowspan="2">
                                                <label for="">Objetivo: </label>
                                                <textarea style="height: 100px" name="objetivo" id="" class="form-control"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="tg-0pky">
                                                <label for="">Edad</label>
                                                <input type="number" value="0" name="edad" id="" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="tg-0pky">
                                                <label for="">P.A</label>
                                                <input type="number" value="0" name="pa" id="" class="form-control">
                                            </td>
                                            <td class="tg-0pky" rowspan="2">
                                                <label for="">Analisis: </label>
                                                <textarea style="height: 100px" name="analisis" id="" class="form-control"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="tg-0pky">
                                                <label for="">F.C</label>
                                                <input type="number" value="0" name="fc" id="" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="tg-0pky">
                                                <label for="">F.R</label>
                                                <input type="number" value="0" name="FR" id="" class="form-control">
                                            </td>
                                            <td class="tg-0pky" rowspan="4">
                                                <label for="">Plan de acción: </label>
                                                <textarea style="height: 200px" name="plan_accion" id="" class="form-control"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="tg-0pky">
                                                <label for="">Temp.</label>
                                                <input type="text" value="0" name="temp" id="" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="tg-0pky">
                                                <label for="">Peso</label>
                                                <input type="number" value="0" name="peso" id="" class="form-control">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td colspan="2">
                                        <label for="">Interconsulta</label>
                                        <input type="text" name="interconsulta" id="" class="form-control">
                                    </td>
                                    <td colspan="2">
                                        <label for="">Motivo</label>
                                        <input type="text" name="motivo_1" id="" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 15%">
                                        <label for="">Referencia</label>
                                        <input type="text" name="referencia" id="" class="form-control">
                                    </td>
                                    <td style="width: 55%">
                                        <label for="">Motivo</label>
                                        <input type="text" name="motivo_2" id="" class="form-control">
                                    </td>
                                    <td style="width: 15%">
                                        <label for="">Fecha</label>
                                        <input value="<?=date("Y-m-d")?>" type="date" name="fecha_1" id="" class="form-control">
                                    </td>
                                    <td style="width: 15%">
                                        <label for="">Hora</label>
                                        <input type="time" value="<?=date("H:i")?>" name="hora_1" id="" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 15%">
                                        <label for="">Contrareferencia</label>
                                        <input type="text" name="contrareferencia" id="" class="form-control">
                                    </td>
                                    <td style="width: 55%">
                                        <label for="">Motivo</label>
                                        <input type="text" name="motivo_3" id="" class="form-control">
                                    </td>
                                    <td style="width: 15%">
                                        <label for="">Fecha</label>
                                        <input value="<?=date("Y-m-d")?>" type="date" name="fecha_2" id="" class="form-control">
                                    </td>
                                    <td style="width: 15%">
                                        <label for="">Hora</label>
                                        <input type="time" value="<?=date("H:i")?>" name="hora_2" id="" class="form-control">
                                    </td>
                                </tr>
                            </tbody>
                        </table>


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
                        <input type="hidden" name="ID_principal" value="<?php echo $_SESSION['ID_principal'] ?>">
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

            if (!name) {
                console.log("elemento ", $(this), " name ", name);

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

    // $(document).ready(function() {
    //     const dataCliente = {
    //         nombres: '<?= $RowCliente['primer_nombre'] ?> <?= $RowCliente['segundo_nombre'] ?>',
    //         apellido_paterno: '<?= $RowCliente['primer_apellido'] ?>',
    //         apellido_materno: '<?= $RowCliente['segundo_apellido'] ?>',
    //         edad: '<?= $RowCliente['edad'] ?>',
    //         sexo: '<?= $RowCliente['genero'] ?>',
    //         lugar_nacimiento: '',
    //         fecha_nacimiento: '<?= $RowCliente['fechaNacimiento'] ?>',
    //         ocupacion: '<?= $RowCliente['ocupacion'] ?>',
    //         telefono: '<?= $RowCliente['telefono_cliente'] ?>',
    //         grado_instruccion: '<?= $RowCliente['nivel_educacion'] ?>',
    //         estado_civil: '<?= $RowCliente['estado'] ?>',
    //         idioma_dialecto: '',
    //     };

    //     const keysCliente = Object.keys(dataCliente);

    //     keysCliente.forEach((key) => {
    //         const value = dataCliente[key];
    //         if (value) {
    //             console.log(key, value);
    //             $("#form input[name='" + key + "']").val(value);
    //         }
    //     });

    // });
</script>

<script src="plugins/LottieK/lottie.min.js"></script>
<style type="text/css">
    .tg {
        border-collapse: collapse;
        border-spacing: 0;
    }

    .tg td {
        border-color: black;
        border-style: solid;
        border-width: 1px;
        font-family: Arial, sans-serif;
        font-size: 14px;
        overflow: hidden;
        padding: 10px 5px;
        word-break: normal;
    }

    .tg th {
        border-color: black;
        border-style: solid;
        border-width: 1px;
        font-family: Arial, sans-serif;
        font-size: 14px;
        font-weight: normal;
        overflow: hidden;
        padding: 10px 5px;
        word-break: normal;
    }

    .tg .tg-0pky {
        border-color: inherit;
        text-align: left;
        vertical-align: top
    }
</style>