<?php
include 'funciones/funciones.php';
include 'funciones/funcionesUtilidades.php';
include 'funciones/conn3.php';

$qrUrl = "https://app.dentalsoftplus.com/RM_ImprimirReceta.php?receta_id=" . $receta_id . "&cliente_id=" . $cliente_id;

// $historia_clinica_id = $_GET['historia_clinica_id'];
// $nombre_historia = $_GET['nombre_historia'];
$nombre_historia = decrypt($_GET['NC']);
$historia_clinica_id = decrypt($_GET['HC']);

if ($historia_clinica_id <> "" and $nombre_historia <> "") {

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

$queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id = $cliente_id ");
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


$queryList = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = $usuario_id");
if ($queryList) {
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {

        $pieF = $rowMotorizado['pieF'];
        $header = $rowMotorizado['header'];
        $LogoF = $rowMotorizado['logoF'];
        $firma = $rowMotorizado['firma'];

        if (strlen($LogoF) > 0) {
            $Logo = "<img src='{$Base}/logos/{$LogoF}' height='125' width='125'>";
        }

        if (strlen($firma) > 0) {
            $firmaImg = '<img src="' . $Base . 'FirmasReg/' . $firma . '" height="80" width="180">';
        }

    }

}



?>

<?php
$_GET['validar'] = $CODI_CLIENTE;
$_GET['mensaje'] = "Ingrese su Cédula para Visualizar el Contenido de la Impresión";
include 'preventView.php';
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

        <button type="button" onClick="window.print()"
            style='background: rgb(250,235,215);background: -moz-radial-gradient(circle, rgba(250,235,215,1) 0%, rgba(60,141,176,1) 100%);background: -webkit-radial-gradient(circle, rgba(250,235,215,1) 0%, rgba(60,141,176,1) 100%);background: radial-gradient(circle, rgba(250,235,215,1) 0%, rgba(60,141,176,1) 100%);filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=" #faebd7",endColorstr="#3c8db0" ,GradientType=1);'>
            IMPRIMIR!
        </button>
    </div>

    <div class="page-footer">
        <?php echo nl2br($pieF); ?>
    </div>

    <table>

        <thead>
            <tr>
                <td>
                    <!--place holder for the fixed-position header-->
                    <div class="page-header-space"></div>
                </td>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>
                    <!--*** CONTENT GOES HERE ***-->
                    <div class="page" style="width:100vw; page-break-after:initial; page-break-before: always;"  >
                        <table class="table" style="width: 100%;margin-top: 3px;">
                            <tr>
                                <td width="35%">
                                    <b>Nombre:</b> <?php echo $nombre_cliente ?>
                                </td>
                                <td width="30%">
                                    <b>Documento:</b> <?php echo $CODI_CLIENTE ?>
                                </td>
                            </tr>
                            <tr>
                                <td width="20%">
                                    <b>F.Nacimiento:</b> <?php echo $fechaNacimiento ?>
                                </td>
                                <td width="15%">
                                    <b>Edad:</b> <?php echo CalculoEdadPaciente($fechaNacimiento); ?>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <b>Residencia:</b> <?php echo $direccion_cliente ?>
                                </td>
                                <td>
                                    <b>EPS:</b> <?php echo $entidadSalud ?>
                                </td>
                            </tr>
                            <tr style="border-bottom-width: 1px;">
                                <td>
                                    <b>Teléfono:</b> <?php echo $celular_cliente ?>
                                </td>
                                <td>
                                    <b>Género:</b> <?php echo $genero ?>
                                </td>
                            </tr>
                        </table>

                        <hr style="border-top: 1px solid black;opacity: 1;">


                        <!-- comienzo de la impresion de la informacion-->
                        <?php
                        echo "<div class='col-12' style='padding-bottom: 10px;' align='center'> <h2> Receta Médica </h2> </div>";

                        echo "<div class='row' style='padding-bottom: 10px;'>";

                        $queryList = mysqli_query($conn3, "SELECT * FROM  RM_Recetario where receta_id = '$receta_id' AND cliente_id = '$cliente_id' and activo = 1");
                        if ($queryList) {
                            while ($RowRecetario = mysqli_fetch_array($queryList)) {

                                $id = $RowRecetario['id'];
                                $Nombre_Medicamento = $RowRecetario['Nombre_Medicamento'];
                                $Cantidad = $RowRecetario['Cantidad'];
                                $Presentacion = $RowRecetario['Presentacion'];
                                $Via_Administracion = $RowRecetario['Via_Administracion'];
                                $Composicion = $RowRecetario['Composicion'];
                                $Dosis = $RowRecetario['Dosis'];

                                $Indicaciones = $RowRecetario['Indicaciones'];
                                $Indicaciones_Generales = $RowRecetario['Indicaciones_Generales'];

                                echo "<div class='col-6'>";
                                echo "<div class='col-12'>Nombre: {$Nombre_Medicamento} </div>";
                                echo "<div class='col-12'>Presentación: {$Presentacion} </div>";
                                echo "<div class='col-12'>Vía de Administración: {$Via_Administracion} </div>";
                                echo "<div class='col-12'>Composición: {$Composicion} </div>";
                                echo "<div class='col-12'>Cantidad: {$Cantidad} </div>";
                                echo "<div class='col-12'>Dosis: {$Dosis}</div>";
                                echo "<div class='col-12'><br></div>";
                                echo "</div>";

                                echo "<div class='col-6'>";
                                echo "<div class='col-12'>Indicaciones:<br> {$Indicaciones} </div>";
                                echo "<div class='col-12'>Indicaciones Generales:<br> {$Indicaciones_Generales}</div>";
                                echo "<div class='col-12'><br></div>";
                                echo "</div>";

                            }
                        }


                        echo "</div>";
                        ?>

                    </div>
                    <!-- cierre del page-->
                    <!-- Aquí se genera el código QR -->
                    <div class="col-12" style="text-align: center;">
                        <h3>Codigo QR</h3>
                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=<?php echo urlencode($qrUrl); ?>"
                            alt="QR Code">
                    </div>

                </td>
            </tr>
        </tbody>

        <tfoot>
            <tr>
                <td>
                    <!--place holder for the fixed-position footer-->
                    <div class="page-footer-space"></div>
                </td>
            </tr>
        </tfoot>

    </table>
    <div class="col-xs-4" align="center">
        <?php
        echo $firmaImg;

        ?>
        <br>_______________________________________<br>
        <?php echo $empresaNombre ?><br>
        CC. <?php echo $nit ?> <br>
        <?php echo $especialidad ?>
    </div>

    </div>
    </td>
    </tr>
    </tbody>

</body>

</html>

<script type="text/javascript">
    printHTML();

    function printHTML() {
        if (window.print) {
            window.print();
        }
    }
</script>