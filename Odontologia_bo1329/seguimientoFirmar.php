<?php
require_once __DIR__ . "/../funciones/conn3.php";
require_once __DIR__ . "/../funciones/funciones.php";


$id  = decrypt($_GET["id"]);

$QueryAlterTable = "ALTER TABLE OBT_Seguimiento ADD COLUMN IF NOT EXISTS firma LONGTEXT DEFAULT'' COMMENT 'Firma de seguimiento' ";
$ResultadoAT = mysqli_query($conn3, $QueryAlterTable);
$error_ct = false;
if (!$ResultadoAT) {
    $error_ct = true;
}



$QueryP = "SELECT * FROM  OBT_Seguimiento WHERE id = $id";
$ResultadoP = mysqli_query($conn3, $QueryP);
$RowsSeguimiento = mysqli_fetch_assoc($ResultadoP);

$QueryC = "SELECT * FROM  config WHERE ID_Usuario = {$RowsSeguimiento["ID_principal"]}";
$ResultadoC = mysqli_query($conn3, $QueryC);
$RowsConfig = mysqli_fetch_assoc($ResultadoC);
$urlLogoConfig = $RowsConfig["logoF"];


$urlLogo = 'https://sievensoft.com/logosMarcas/dentalsoft/isologo.png';

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Firmar seguimiento</title>
    <link href="<?= $urlLogo ?>" rel="icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKB4Imkb9N5CptuD1FQ6F1D1R5tZk5Qc5z4QIdE7pBqXc9ip0G7UgRk2Kx1k2T1/Qf1elxvg==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-dN6d6AXJXw5mjSU0IAt8yIQSfx8J9tNp5SxBcQqc2ltzX7GdUJ+q3x6UJtc9g7D1oBsH3/a/7Lr1F1o7xCgf3A==" crossorigin="anonymous" referrerpolicy="no-referrer" />



    <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <style>
        .signature-pad {
            border: 2px dashed #ccc;
            border-radius: 10px;
            width: 60%;
            height: 250px;
            touch-action: none;
        }

        /* .btn-clear {
            margin-left: 10px;
        } */
    </style>
</head>

<body>
    <?php if (!is_numeric($id)) { ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Seguimiento no válido',
            });
        </script>
    <?php die();
    } ?>

    <?php if ($error_ct) { ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Ocurrio un error inesperado',
            });
        </script>
    <?php die();
    } ?>

    <?php if (!empty($RowsSeguimiento["firma"])) { ?>
        <script>
            Swal.fire({
                icon: 'info',
                title: 'Atencion',
                text: 'Este seguimiento ya fue firmado',
            });
        </script>
    <?php die();
    } ?>


    <div class="container mt-5 card ">
        <div class="card-header">
            <h4 class="text-0"> <i class="fas fa-file-contract"></i> Firma Digital de Seguimiento</h4>
        </div>
        <div class="card-body row justify-content-center">

            <div class="co-md-12 col-xs-12">
                <center>
                <div class="col-md-11 col-xs-11 my-3 row">
                    <div class="animate__animated animate__backInRight <?= $urlLogoConfig != '' ? 'col-md-6' : 'col-md-12' ?> text-center">
                        <img src="<?= $urlLogo ?>" style="max-height:90px;" alt="Logo dentalsoft">
                    </div>
                    <?php if ($urlLogoConfig != '') { ?>
                        <div class="animate__animated animate__backInRight <?= $urlLogoConfig != '' ? 'col-md-6' : 'col-md-12' ?>">
                            <img src="https://app.dentalsoftplus.com/logos/<?= $urlLogoConfig ?>" style="max-height:90px;" alt="Logo dentalsoft">
                        </div>
                    <?php } ?>
                </div>
                </center>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th colspan="12" style="text-align:center">Seguimiento</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $fields = [
                            //? Label = [elementType, inputName, col, typeInput]
                            "Fecha de Inicio del tratamiento" => ["input", "fecha_inicio_tratamiento", "6", "date"],
                            "Conclusión" => ["input", "conclusion", "6", "text"],
                            "Aparatología" => ["textarea", "aparatologia", "12", "text"],
                            "Monto total del tratamiento $" => ["input", "monto_total_usd", "6", "text"],
                            "Monto total del tratamiento Bs" => ["input", "monto_total_bs", "6", "text"],
                            "Cuota inicial" => ["input", "cuota_inicial", "6", "text"],
                            "Cuota mensual" => ["input", "cuota_mensual", "6", "text"],
                            "Observaciones" => ["textarea", "observaciones", "12", "text"],
                        ];

                        $totalColumnas = 0; // Para llevar un registro de las columnas usadas en la fila actual

                        foreach ($fields as $label => $dataInput) {
                            $tipoElemento = $dataInput[0];
                            $name = $dataInput[1];
                            $col = (int)$dataInput[2]; // Convertir a entero
                            $type = $dataInput[3];
                            $valorDB = $RowsSeguimiento[$name];

                            // Si la suma de columnas supera 12, cerramos la fila actual y comenzamos una nueva
                            if ($totalColumnas + $col > 12) {
                                echo "</tr><tr>"; // Cierra la fila actual y abre una nueva
                                $totalColumnas = 0; // Reinicia el contador de columnas
                            }

                            // Si es la primera celda de la fila, abrimos una nueva fila
                            if ($totalColumnas === 0) {
                                echo "<tr>";
                            }

                            // Imprimir la celda con el colspan correspondiente
                            echo "<td colspan='$col'>";
                            echo "<p><b>" . $label . ": </b> " . $valorDB . "</p>";

                            echo "</td>";

                            // Actualizar el contador de columnas
                            $totalColumnas += $col;

                            // Si la suma de columnas es 12, cerramos la fila actual
                            if ($totalColumnas === 12) {
                                echo "</tr>";
                                $totalColumnas = 0; // Reinicia el contador de columnas
                            }
                        }

                        // Si queda una fila abierta, la cerramos
                        if ($totalColumnas > 0) {
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th colspan="6" style="text-align:center">Detalle</th>
                        </tr>
                        <tr>
                            <th>Operación realizada</th>
                            <th>Costo</th>
                            <th>A/cuenta</th>
                            <th>Saldo</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody id="detalle-seguimiento">
                        <?php
                        $QueryDetalle = "SELECT * FROM OBT_SeguimientoDetalle WHERE seguimiento_id = '$id' ";
                        $ResultDetalle = mysqli_query($conn3, $QueryDetalle);
                        if ($ResultDetalle) {
                            foreach ($ResultDetalle as $RowDetalle) { ?>
                                <tr>
                                    <td><?= $RowDetalle["operacion_realizada"] ?></td>
                                    <td><?= number_format($RowDetalle["costo"], 2) ?></td>
                                    <td><?= $RowDetalle["a_cuenta"] ?></td>
                                    <td><?= number_format($RowDetalle["saldo"], 2) ?></td>
                                    <td><?= $RowDetalle["fecha"] ?></td>
                                </tr>
                        <?php }
                        }

                        ?>
                    </tbody>

                </table>
            </div>

            <div class="justify-content-center col-md-10 col-xs-12 animate__animated animate__fadeInDown">
                <center><canvas id="signatureCanvas" class="signature-pad"></canvas></center>
                <div class="mt-3 d-flex justify-content-center">
                    <button class="btn btn-primary mx-1" id="saveBtn">Guardar Firma y autorizar</button>
                    <button class="btn btn-danger mx-1 btn-clear" id="clearBtn">Limpiar</button>
                </div>
                <input type="hidden" id="signatureData">
            </div>
        </div>
    </div>




    <script>
        const canvas = document.getElementById('signatureCanvas');
        const ctx = canvas.getContext('2d');
        const saveBtn = document.getElementById('saveBtn');
        const clearBtn = document.getElementById('clearBtn');
        const signatureData = document.getElementById('signatureData');

        let drawing = false;

        function resizeCanvas() {
            canvas.width = canvas.offsetWidth;
            canvas.height = canvas.offsetHeight;
        }

        window.addEventListener('resize', resizeCanvas);
        resizeCanvas();

        canvas.addEventListener('mousedown', (e) => {
            drawing = true;
            ctx.beginPath();
            ctx.moveTo(e.offsetX, e.offsetY);
        });

        canvas.addEventListener('mousemove', (e) => {
            if (drawing) {
                ctx.lineTo(e.offsetX, e.offsetY);
                ctx.stroke();
            }
        });

        canvas.addEventListener('mouseup', () => {
            drawing = false;
        });

        canvas.addEventListener('mouseleave', () => {
            drawing = false;
        });

        clearBtn.addEventListener('click', () => {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            signatureData.value = '';
        });

        saveBtn.addEventListener('click', () => {
            const dataURL = canvas.toDataURL('image/png');
            signatureData.value = dataURL;

            if (dataURL == '') {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Firma no ha sido diligenciada'
                });

                return;

            }

            $.ajax({
                url: "<?= $Base ?>Odontologia_bo1329/ODT_Ajax.php",
                method: 'POST',
                data: {
                    id: '<?= $id ?>',
                    firma: dataURL,
                    Tipo_Consulta: 'Guardar_Firma'
                },
                success: function(result) {

                    const response = JSON.parse(result);
                    const { error, status, message } = response;

                    Swal.fire({
                        icon: status ? 'success' : 'error',
                        title: status ? 'Correcto' : 'Error',
                        text: message
                    });

                    if (status) setTimeout(() => {
                        location.reload()
                    }, 1000);

                    console.log("error => ", error);

                }
            });

        });
    </script>

    

</body>

</html>