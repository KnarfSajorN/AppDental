<?php
include '../funciones/funciones.php';
$idHistoria = $_GET['id'];
$tipoHistoria = $_GET['tipoHistoria'];

$tablas = [
    0 => "HT_OndasChoque",
    1 => "HT_OndasChoqueBilateral",
    2 => "sesionesAplicadas"
];
$tabla = $tablas[$tipoHistoria];

$validar = mysqli_query($conn3, "SELECT 1 FROM {$tabla} WHERE Firma");
if (!$validar) {
    $create = mysqli_query($conn3, "ALTER TABLE {$tabla} ADD COLUMN Firma LONGTEXT NULL DEFAULT NULL;") or die(mysqli_error($conn3));
}

$historia = mysqli_query($conn3, "SELECT * FROM {$tabla} WHERE id = '{$idHistoria}'");
if (!empty(mysqli_num_rows($historia))) {
    $historia = mysqli_fetch_assoc($historia);
    if (!empty($historia['Firma'])) {
        echo "<script>alert('Su firma ya ha sido Registrada');window.location='" . $Base . "FirmasPacientes/FirmaFinalizado.php'</script>";
    }
}

if (isset($_POST['Guardar_Firma'])) {
    $dataURL    = $_POST['tarea'];
    mysqli_query($conn3, "UPDATE {$tabla} SET Firma = '{$dataURL}' WHERE id = '{$idHistoria}'") or die(mysqli_error($conn3));
    echo "<script>alert('Su firma ya ha sido Registrada');window.location='" . $Base . "FirmasPacientes/FirmaFinalizado.php'</script>";
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Modulo de Firma</title>
    <meta name="description" content="Modulo de Firma">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="stylesheet" href="<?php echo $Base; ?>firma/css/signature-pad.css">
    <style type="text/css">
        .boton_personalizado {
            text-decoration: none;
            padding: 10px;
            font-weight: 600;
            font-size: 15px;
            color: #ffffff;
            background-color: #1883ba;
            border-radius: 6px;
            border: 2px solid #0016b0;
        }

        .boton_personalizado:hover {
            color: #1883ba;
            background-color: #ffffff;
        }



        .boton_personalizado2 {
            text-decoration: none;
            padding: 5px;
            font-weight: 600;
            font-size: 10px;
            color: #ffffff;
            background-color: #1883ba;
            border-radius: 6px;
            border: 2px solid #0016b0;
        }

        .boton_personalizado2:hover {
            color: #1883ba;
            background-color: #ffffff;
        }
    </style>
</head>

<body onselectstart="return false">
    <div id="signature-pad" class="signature-pad">
        <div align="center" class="signature-pad--actions">
            <div>
                <button type="button" class="boton_personalizado2" data-action="clear">Borrar</button>
                <button type="hidden" class="boton_personalizado2" data-action="change-color">Cambiar Color</button>
                <button type="button" class="boton_personalizado2" data-action="undo">Borrar ultimo traso</button>
            </div>
        </div>
        <div class="signature-pad--body">
            <canvas></canvas>
        </div>
        <div class="signature-pad--footer">
            <div align="center" class="description">Firmar</div>
            <div>
                <br>
                <button type="button" class="boton_personalizado" data-action="save-png">Paso 1 - Guardar Firma</button>
            </div>
        </div>
        <font size="1">
            <div id="div-mostrarFimra" align="center"></div>
        </font>

        <div align="center">
            <br>
            <hr><br>
            <form action="" method="POST">
                <input type="hidden" name="tarea" id="tarea" required>
                <button type="submit" class="boton_personalizado" name="Guardar_Firma">
                    <h4> Paso 2 - Guardar </h4>
                </button>
            </form>
        </div>
    </div>

    <script src="<?php echo $Base; ?>firma/js/signature_pad.umd.js"></script>
    <script src="<?php echo $Base; ?>firma/js/app.js"></script>
</body>

</html>