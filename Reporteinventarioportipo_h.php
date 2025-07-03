<?php
// Configuración de zona horaria
date_default_timezone_set('America/Bogota');

// Inclusión de funciones y conexión
include("funciones/funciones.php");
include("funciones/conn3.php");

// Variables iniciales
$tipo = $_POST['tipo'];
$ID = $_POST['ID'];

// Inicialización de estados
$EstadoN0 = $EstadoN1 = $EstadoN2 = $EstadoN3 = 0;

// Obtener configuración del usuario
$queryList = mysqli_query($conn3, "SELECT * FROM config WHERE (ID_Usuario = $ID OR ID_Usuario = '{$_SESSION['ID_principal']}')");
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $empresaNombre = $rowMotorizado['nombreF'];
    $telefonoF = $rowMotorizado['telefonoF'];
    $direccionF = $rowMotorizado['direccionF'];
    $LogoF = $rowMotorizado['logoF'];
    $Logo = (strlen($LogoF) > 0) ? '<img src="' . $Base . '/logos/' . $LogoF . '" height="10%" width="10%">' : '';
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $empresaNombre; ?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body>
    <!-- Botones de navegación -->
    <div class="row no-print">
        <div class="col-xs-12">
            <a href="<?php echo $Base; ?>Reportesinventario" class="btn btn-default">Regresar</a>
            <a href="javascript:window.print();" class="btn btn-default">
                <i class="fa fa-print"></i> Imprimir
            </a>
        </div>
    </div>

    <!-- Encabezado -->
    <div class="row">
        <small class="pull-right">Fecha: <?php echo date("d-m-y"); ?></small>
        <div class="col-xs-12">
            <h2 class="page-header">
                <?php echo $Logo . " " . $empresaNombre; ?>
                <small class="pull-right">Fecha: <?php echo date("d-m-y"); ?></small>
            </h2>
        </div>

        <div class="col-xs-12">
            <?php
            echo '<br>Tipo: ' . ($tipo == 0 ? 'Todos' : $tipo);
            ?>
        </div>
    </div>

    <!-- Tabla de inventario -->
    <div class="row">
        <div class="col-xs-12 table-responsive">
            <table class="table table-striped" border="1">
                <thead>
                    <tr style="background: #A4A4A4">
                        <th>Descripción</th>
                        <th>Referencia</th>
                        <th>Lote</th>
                        <th>Serial</th>
                        <th>Tipo</th>
                        <th>Existencia</th>
                        <th>Mínimo</th>
                        <th>Máximo</th>
                        <th>Costo</th>
                        <th>Precio</th>
                        <th>Nota</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = ($tipo == 0) 
                        ? "SELECT * FROM sinvetrios WHERE usuario_id = $ID OR usuario_id = '{$_SESSION['ID_principal']}' ORDER BY descripcion ASC" 
                        : "SELECT * FROM sinvetrios WHERE usuario_id = $ID OR usuario_id = '{$_SESSION['ID_principal']}' AND tipo = '$tipo' ORDER BY descripcion ASC";

                    $queryList = mysqli_query($conn3, $query);
                    while ($row = mysqli_fetch_array($queryList)) {
                        echo '<tr>
                            <td>' . $row['descripcion'] . '</td>
                            <td>' . $row['referencia'] . '</td>
                            <td>' . $row['lote'] . '</td>
                            <td>' . $row['serial'] . '</td>
                            <td>' . $row['tipo'] . '</td>
                            <td>' . $row['existencia'] . '</td>
                            <td>' . $row['minimo'] . '</td>
                            <td>' . $row['maximo'] . '</td>
                            <td>' . $row['costo'] . '</td>
                            <td>' . $row['precio'] . '</td>
                            <td>' . $row['nota'] . '</td>
                        </tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>

<!-- Estilos para impresión -->
<style>
    @media print {
        .no-print {
            display: none;
        }
    }
</style>
