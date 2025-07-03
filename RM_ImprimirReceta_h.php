<?php
include 'funciones/funciones.php';
include 'funciones/funcionesUtilidades.php';
include 'funciones/conn3.php';
include 'phpqrcode/qrlib.php'; // Incluye la biblioteca para QR

// Obtener datos de entrada
$nombre_historia = decrypt($_GET['NC']);
$historia_clinica_id = decrypt($_GET['HC']);

if ($historia_clinica_id <> "" && $nombre_historia <> "") {
    $queryList = mysqli_query($conn3, "SELECT * FROM {$nombre_historia} where id = $historia_clinica_id ");
    if ($queryList) {
        while ($rowMotorizado = mysqli_fetch_array($queryList)) {
            $receta_id = $rowMotorizado['receta_id'];
            $cliente_id = $rowMotorizado['cliente_id'];
            $usuario_id = $rowMotorizado['usuario_id'];
        }
    }
} else {
    $receta_id = $_GET['receta_id'];
    $cliente_id = $_GET['cliente_id'];
    $usuario_id = funcionMaster($receta_id . "' AND cliente_id='{$cliente_id}", 'receta_id', 'usuario_id', 'RM_Recetario');
}

$queryList = mysqli_query($conn3, "SELECT * FROM cliente where cliente_id = $cliente_id");
if ($queryList) {
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        $nombre_cliente = $rowMotorizado['nombre_cliente'];
        $CODI_CLIENTE = $rowMotorizado['CODI_CLIENTE'];
        $fechaNacimiento = $rowMotorizado['fechaNacimiento'];
        $direccion_cliente = $rowMotorizado['direccion_cliente'];
        $entidadSalud = funcionMaster($rowMotorizado['entidad_id'], 'id', 'Nombre', 'Rips_Entidades');
        $celular_cliente = $rowMotorizado['celular_cliente'];
        $genero = $rowMotorizado['genero'];
    }
}

// Datos para el QR
$qrData = "Nombre: $nombre_cliente\n";
$qrData .= "Documento: $CODI_CLIENTE\n";
$qrData .= "Fecha de Nacimiento: $fechaNacimiento\n";
$qrData .= "Residencia: $direccion_cliente\n";
$qrData .= "EPS: $entidadSalud\n";
$qrData .= "Teléfono: $celular_cliente\n";
$qrData .= "Género: $genero";

// Directorio donde se almacenará el QR
$tempDir = 'qr_temp/';
if (!file_exists($tempDir)) {
    mkdir($tempDir, 0755, true);
}

// Nombre del archivo QR
$qrFileName = $tempDir . "qr_cliente_{$cliente_id}.png";

// Generar el QR
QRcode::png($qrData, $qrFileName, QR_ECLEVEL_L, 10);

// Mostrar el QR en la página
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/Impresion/estructura_impresion.css">
    <link rel="stylesheet" href="css/Impresion/bootstrap_5.1.1.min.css">
    <link rel="stylesheet" href="css/Impresion/bootstrap-print.css" media="print">
</head>

<body>

    <div class="page-header row" style="text-align: center">
        <div class="col-5" align="left"><?php echo $Logo ?></div>
        <div class="col-7" style="font-size: 15px;text-align: right;"><?php echo nl2br($header) ?></div>
        <button type="button" onClick="window.print()">IMPRIMIR!</button>
    </div>

    <div class="col-12" style="text-align: center; padding-top: 20px;">
        <h3>Código QR del Cliente</h3>
        <img src="<?php echo $qrFileName ?>" alt="Código QR del Cliente" style="width: 200px; height: 200px;">
    </div>

    <table>
        <tr>
            <td><b>Nombre:</b> <?php echo $nombre_cliente ?></td>
            <td><b>Documento:</b> <?php echo $CODI_CLIENTE ?></td>
        </tr>
        <tr>
            <td><b>Fecha de Nacimiento:</b> <?php echo $fechaNacimiento ?></td>
            <td><b>Teléfono:</b> <?php echo $celular_cliente ?></td>
        </tr>
    </table>
</body>

</html>
