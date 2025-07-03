<?php
require_once __DIR__ . "/../funciones/conn3.php";
require_once __DIR__ . "/../funciones/funciones.php";


$id  = decrypt($_GET["id"]);

$QueryP = "SELECT * FROM  OP_Presupuesto WHERE id = $id";
$ResultadoP = mysqli_query($conn3, $QueryP);
$RowsPresupuesto = mysqli_fetch_assoc($ResultadoP);

$QueryC = "SELECT * FROM  config WHERE ID_Usuario = {$RowsPresupuesto["ID_principal"]}";
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
    <title>Autorizar/Firmar presupuesto odontologia</title>
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
                text: 'Presupuiesto no válido',
            });
        </script>
    <?php die();
    } ?>
    
    <?php if (!empty($RowsPresupuesto["firma"])) { ?>
        <script>
            Swal.fire({
                icon: 'info',
                title: 'Atencion',
                text: 'Este presupuesto ya fue firmado',
            });
        </script>
    <?php die();
    } ?>

    <?php if ($RowsPresupuesto["estado_presupuesto"] == '2') { ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Atencion',
                text: 'Presupuesto descartado',
            });
        </script>
    <?php die();
    } ?>

    <div class="container mt-5 card ">
        <div class="card-header">
            <h4 class="text-0"> <i class="fas fa-file-contract"></i> Módulo de Firma Digital</h4>
        </div>
        <div class="card-body row justify-content-center">

            <div class="col-md-5 col-xs-11 my-3 row">
                <div class="animate__animated animate__backInRight <?= $urlLogoConfig != '' ? 'col-md-6' : 'col-md-12' ?> text-center">
                    <img src="<?= $urlLogo ?>" style="max-height:90px;" alt="Logo dentalsoft">
                </div>
                <?php if ($urlLogoConfig != '') { ?>
                    <div class="animate__animated animate__backInRight <?= $urlLogoConfig != '' ? 'col-md-6' : 'col-md-12' ?>">
                        <img src="https://app.dentalsoftplus.com/logos/<?= $urlLogoConfig ?>" style="max-height:90px;" alt="Logo dentalsoft">
                    </div>

                <?php } ?>
            </div>

            <div class="justify-content-center col-md-10 col-xs-12 animate__animated animate__fadeInDown">
                <center><canvas id="signatureCanvas" class="signature-pad"></canvas></center>
                <div class="mt-3 d-flex justify-content-center">
                    <button class="btn btn-secondary mx-1" onclick="verDetalle(`<?= base64_encode($id) ?>`)">Ver presupuesto</button>
                    <button class="btn btn-primary mx-1" id="saveBtn">Guardar Firma y  autorizar</button>
                    <button class="btn btn-danger mx-1" onclick="descartarPresupuesto(<?=$id?>)">Descartar</button>
                    <button class="btn btn-danger mx-1 btn-clear" id="clearBtn">Limpiar</button>
                </div>
                <input type="hidden" id="signatureData">
            </div>
        </div>
    </div>

    <div id="modalPresupuesto" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"> <i class="fas fa-file-invoice"></i> Detalle de Presupuesto</h4>
                    <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                </div>
                <div class="modal-body" id="modal-detalle-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="fas fa-xmark"></i> Cerrar</button>
                </div>
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
                url: "<?= $Base ?>OdontoPresupuesto/ajax/OP_Ajax.php",
                method: 'POST',
                data: {
                    id: '<?=$id?>',
                    firma: dataURL,
                    Tipo_Consulta: 'Guardar_Firma'
                },
                success: function(result) {

                    const response = JSON.parse(result);
                    const { error, status, message } = response;

                    Swal.fire({
                        icon:  status ? 'success' :'error',
                        title: status ? 'Correcto' : 'Error',
                        text: message
                    });

                    if (status) setTimeout(() => { location.reload() }, 1000); 

                    console.log("error => " , error);

                }
            });

        });
    </script>

    <script>
        function verDetalle(idEncrypted) {
            const id = atob(idEncrypted);
            $.ajax({
                url: "<?= $Base ?>OdontoPresupuesto/ajax/OP_Ajax.php",
                method: 'POST',
                data: {
                    id,
                    Tipo_Consulta: 'Consultar'
                },
                success: function(result) {

                    const response = JSON.parse(result);
                    const { error, status, message, data } = response;

                    const html = dataToHtml(data);



                    if (!status) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: message
                        });
                        return;
                    }

                $("#modal-detalle-body").html(html)
                $("#modalPresupuesto").modal("show")

                }
            });
        }

        function descartarPresupuesto(id) {
            Swal.fire({
                icon: 'question',
                title: 'Esta seguro de descartar el presupuesto?',
                text: 'Esta accion no se puede deshacer',
                showDenyButton: true,
                confirmButtonText: 'Si',
                denyButtonText: 'No'
            }).then((result) => {

                if (!result.isConfirmed) return;

                $.ajax({
                    url: "<?= $Base ?>OdontoPresupuesto/ajax/OP_Ajax.php",
                    method: 'POST',
                    data: {
                        id,
                        Tipo_Consulta: 'Descartar'
                    },
                    success: function(result) {

                        const response = JSON.parse(result);
                        const { error, status, message } = response;

                        Swal.fire({
                            icon:  status ? 'success' :'error',
                            title: status ? 'Correcto' : 'Error',
                            text: message
                        });

                        if (status) setTimeout(() => { location.reload() }, 1000); 

                        console.log("error => " , error);
                        
                    }
                });
            })
        }


        function dataToHtml(data) {
            const { fecha_registro, fecha_vencimiento } = data;
            const { nombre_usuario, nombre_cliente, detalle } = data;

            let html = `<table class="table">
                            <thead>
                            <tr>
                                <th>Fecha Registro</th>
                                <th>Fecha de vencimiento</th>
                            </tr>
                            <tr>
                                <td>${fecha_registro}</td>
                                <td>${fecha_vencimiento}</td>
                            </tr>
                            <tr>
                                <th>Realizado por</th>
                                <th>Realizado a </th>
                            </tr>
                            <tr>
                                <td>${nombre_usuario}</td>
                                <td>${nombre_cliente}</td>
                            </tr>
                            </thead>
                        </table>`;

            html += `<table class="table">
                        <thead>
                        <tr>
                            <th colspan="5" class="text-center">Detalle</th>
                        </tr>
                        <tr>
                            <th></th>
                            <th>Pieza</th>
                            <th>Cara</th>
                            <th>Procedimiento</th>
                            <th>Valor</th>
                        </tr>
                        </thead>
                        <tbody>`;

            detalle.forEach(det => {
                console.log("det => ", det);

                const { pieza_id, cara, descripcion, procedimiento, precio_total_base, procedimientoIcon } = det;
                html += ` <tr>
                        <td><img style="max-width:20px" src="<?= $Base ?>OD_ImagenOdontograma/${pieza_id}.png"></td>
                        <td>${descripcion}</td>
                        <td>${cara}</td>
                        <td>${procedimientoIcon} ${procedimiento}</td>
                        <td>$ ${precio_total_base}</td>
                        </tr>`;
            });

            html += `</tbody></table>`;
            return html;
        }
    </script>

</body>

</html>