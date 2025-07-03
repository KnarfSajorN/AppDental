<?php
require_once '../header.php';
require_once '../menu.php';


$clienteId = decrypt($_GET['cliente_id']);
$historia_id = $_GET['historia_id'];
$tabla = decrypt($_GET['tabla']);

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
        <h1>Seguimiento, Paciente: <?php echo $nombre_cliente . ', Edad: ' . calculaedad($fechaNacimiento); ?></h1>
        <ol class="breadcrumb"></ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- Formulario principal -->
                <form id="form" action="OBT_SeguimientoGuardar" method="POST" class="box">

                    <!-- Card para Antecedentes -->
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Seguimiento del caso</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <?php
                                $fields = [
                                    //?Label = [elementType, inputName, col, typeInput]
                                    "Fecha de Inicio del tratamiento" => ["input", "fecha_inicio_tratamiento", "6", "date"],
                                    "Conslusion" => ["input", "conclusion", "6", "text"],
                                    "Aparatologia" => ["textarea", "aparatologia", "12", "text"],
                                    "Monto total del tratamiento $" => ["input", "monto_total_usd", "6", "text"],
                                    "Monto total del tratamiento Bs" => ["input", "monto_total_bs", "6", "text"],
                                    "Cuota inicial" => ["input", "cuota_inicial", "6", "text"],
                                    "Cuota mensual" => ["input", "cuota_mensual", "6", "text"],
                                    "Observaciones" => ["textarea", "observaciones", "12", "text"],
                                ];

                                foreach ($fields as $label => $dataInput) {
                                    $tipoElemento = $dataInput[0];
                                    $name         = $dataInput[1];
                                    $col          = $dataInput[2];
                                    $type         = $dataInput[3];
                                ?>
                                    <div class="col-md-<?= $col ?> mb-1">
                                        <label for="<?= $name ?>" class="form-label"><?= $label ?></label>
                                        <?php
                                        switch ($tipoElemento) {
                                            case 'input': ?>
                                                <input type="<?= $type ?>" name="<?= $name ?>" id="<?= $name ?>" class="form-control">
                                            <?php
                                                break;
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

                                <small style="font-weight: bold;" class="text-info">Se enviará el listado de los procedimientos agregados para ser firmados</small>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Operación realizada</th>
                                            <th>Costo</th>
                                            <th>A/cuenta</th>
                                            <th>Saldo</th>
                                            <th>Fecha</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody id="detalle-seguimiento"></tbody>

                                </table>


                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->


                    <!-- Botón de Guardar -->
                    <div class="row">
                        <div class="col-md-12 mb-3" align="left">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" required>
                                <label class="form-check-label" for="terminado">Ya terminé</label>
                            </div>
                        </div>
                        <input type="hidden" name="datos_detalle" id="datos_detalle" value="{}">
                        <input type="hidden" name="usuario_id" value="<?php echo $_SESSION['ID'] ?>">
                        <input type="hidden" name="ID_principal" value="<?php echo $_SESSION['ID_principal'] ?>">
                        <input type="hidden" name="cliente_id" value="<?= $clienteId ?>">
                        <input type="hidden" name="historia_id" value="<?= $historia_id ?>">
                        <input type="hidden" name="tabla" value="<?= $tabla ?>">
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
    const fecha_actual = "<?= date('Y-m-d') ?>"
    let indiceRow = 0;

    function addRow() {
        const btnDelete = indiceRow != 0 ? `<i class='text-danger fas fa-minus' onclick='deleteRow(${indiceRow})'></i>` : '';
        const newRow = `<tr id="fila-detalle-${indiceRow}">
                            <td><input class='form-control' onchange="autoRow(${indiceRow})" type="text" name="detalle[${indiceRow}][operacion_realizada]"></td>
                            <td><input class='form-control' onchange="autoRow(${indiceRow})" type="number" name="detalle[${indiceRow}][costo]"></td>
                            <td><input class='form-control' onchange="autoRow(${indiceRow})" type="text" name="detalle[${indiceRow}][a_cuenta]"></td>
                            <td><input class='form-control' onchange="autoRow(${indiceRow})" type="number" name="detalle[${indiceRow}][saldo]"></td>
                            <td><input class='form-control' onchange="autoRow(${indiceRow})" type="date" name="detalle[${indiceRow}][fecha]"></td>
                            <td>${btnDelete}</td>
                        </tr>`;

        $("#detalle-seguimiento").append(newRow);
        indiceRow += 1;
    }

    function deleteRow(indice) {
        $(`#fila-detalle-${indice}`).remove();
    }

    function autoRow(indice) {
        const valueCostoNextRow = $(`input[name='detalle[${indice+1}][costo]']`).val();
        if (valueCostoNextRow === undefined) {
            addRow();
        }
    }

    function tieneValoresVacios(objeto) {
        return Object.values(objeto).some(valor => {
            // Verifica si el valor es null, undefined, cadena vacía, 0, false, objeto vacío o array vacío
            return (
                valor === null ||
                valor === undefined ||
                valor === "" ||
                valor === 0 ||
                valor === false ||
                (typeof valor === "object" && Object.keys(valor).length === 0)
            );
        });
    }



    function submitear() {
        let data_detail = [];
        let isValid = true;
        $("#detalle-seguimiento tr").each(function() {
            if (!isValid) return;

            const idFila = $(this).attr("id");
            const indice = idFila.replace("fila-detalle-", "");

            // Restringe la búsqueda a la fila actual usando .find()
            const operacion_realizada = $(this).find(`input[name="detalle[${indice}][operacion_realizada]"]`).val();
            const costo = $(this).find(`input[name="detalle[${indice}][costo]"]`).val();
            const a_cuenta = $(this).find(`input[name="detalle[${indice}][a_cuenta]"]`).val();
            const saldo = $(this).find(`input[name="detalle[${indice}][saldo]"]`).val();
            const fecha = $(this).find(`input[name="detalle[${indice}][fecha]"]`).val();

            console.log("operacion_realizada", operacion_realizada);
            console.log("costo", costo);
            console.log("a_cuenta", a_cuenta);
            console.log("saldo", saldo);
            console.log("fecha", fecha);

            if (operacion_realizada || costo || a_cuenta || saldo || fecha) {
                const data = {
                    operacion_realizada,
                    costo,
                    a_cuenta,
                    saldo,
                    fecha,
                };

                if (tieneValoresVacios(data)) {
                    isValid = false;
                    return;
                }

                data_detail.push(data);
            }
        });

        if (!isValid) {
            Swal.fire({
                icon: 'error',
                text: 'Por favor completa todos los campos de la tabla, si no desea ocupar una fila vacíe sus campos o elimine la fila',
                title: 'Error',
            })
            return;
        }

        // console.log("data_detail", data_detail);
        // return;

        $("#datos_detalle").val(JSON.stringify(data_detail))

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


    $(document).ready(function() {
        $(`input[name="fecha_inicio_tratamiento]"`).val(fecha_actual);
        addRow();
    });
</script>