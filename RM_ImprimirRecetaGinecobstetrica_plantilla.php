<?php
include 'funciones/funciones.php';
include 'funciones/funcionesUtilidades.php';
include 'funciones/conn3.php';

$historia_clinica_id = decrypt($_GET['historia_clinica_id']);
$nombre_historia = $_GET['nombre_historia'];

if ($historia_clinica_id <> "" and $nombre_historia <> "") {

    $queryList = mysqli_query($conn3, "SELECT * FROM {$nombre_historia} where id = $historia_clinica_id ");
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {

        $receta_id = $rowMotorizado['receta_id'];
        $cliente_id = $rowMotorizado['cliente_id'];
        $usuario_id = $rowMotorizado['usuario_id'];
        $fecha = $rowMotorizado['fecha'];
        $cie10 = $rowMotorizado['CIE10_1'];
        $cie20 = $rowMotorizado['CIE10_2'];
        $cie30 = $rowMotorizado['CIE10_3'];
        $cie40 = $rowMotorizado['CIE10_4'];
        $cie101 = $rowMotorizado['CIE10_1_Otro'];
        $cie202 = $rowMotorizado['CIE10_2_Otro'];
        $cie303 = $rowMotorizado['CIE10_3_Otro'];
        $cie404 = $rowMotorizado['CIE10_4_Otro'];
    }
} else {
    $receta_id = $_GET['receta_id'];
    $cliente_id = $_GET['cliente_id'];
    $fecha = funcionMaster($receta_id, 'receta_id', 'Fecha_Registro', 'RM_Recetario');
    $usuario_id = funcionMaster($receta_id, 'receta_id', 'usuario_id', 'RM_Recetario');
}

if ($cie101 != "") {
    $cie10 = $cie101;
    $cie10N = '';
} else {
    $cie10 = $cie10;
    $cie10N = funcionMaster($cie10, 'codigo', 'descripcion', 'cie10');
}

if ($cie202 != "") {
    $cie20 = $cie202;
    $cie20N = '';
} else {
    $cie20 = $cie20;
    $cie20N = funcionMaster($cie20, 'codigo', 'descripcion', 'cie10');
}

if ($cie303 != "") {
    $cie30 = $cie303;
    $cie30N = '';
} else {
    $cie30 = $cie30;
    $cie30N = funcionMaster($cie30, 'codigo', 'descripcion', 'cie10');
}

if ($cie404 != "") {
    $cie40 = $cie404;
    $cie40N = '';
} else {
    $cie40 = $cie40;
    $cie40N = funcionMaster($cie40, 'codigo', 'descripcion', 'cie10');
}



$queryList = mysqli_query($conn3, "SELECT * FROM  usuarios where ID = $usuario_id ");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $nombre = $rowMotorizado['NOMBRE_USUARIO'];
    $nit = $rowMotorizado['NIT'];
}

$queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id = $cliente_id ");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $nombre_cliente = $rowMotorizado['nombre_cliente'];
    $CODI_CLIENTE = $rowMotorizado['CODI_CLIENTE'];
    $fechaNacimiento = $rowMotorizado['fechaNacimiento'];
    $direccion_cliente = $rowMotorizado['direccion_cliente'];
    $entidadSalud = $rowMotorizado['entidadSalud'];
    $celular_cliente = $rowMotorizado['celular_cliente'];
    $genero = $rowMotorizado['genero'];
}

$queryList = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = $usuario_id");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {

    $pieF         = $rowMotorizado['pieF'];
    $header       = $rowMotorizado['header'];
    $LogoF               = $rowMotorizado['logoF'];
    $firma               = $rowMotorizado['firma'];

    if (strlen($LogoF) > 0) {
        $Logo = "<img src='{$Base}/logos/{$LogoF}' style='height: 3.5cm;width: auto;'>";
    }

    if (strlen($firma) > 0) {
        $firmaImg = '<img src="' . $Base . 'FirmasReg/' . $firma . '" height="100" width="400">';
    }
}


//$logoheader = "<img src='{$Base}/logos/header.PNG' height='100%' width='105%'>";
//$pie = "<img src='{$Base}/logos/pie.PNG' height='100%' width='100%'>";

?>



<!-- <!DOCTYPE html>
<html>

<head> -->
    <!--<link rel="stylesheet" href="css/Impresion/estructura_impresion.css">
    <link rel="stylesheet" href="css/Impresion/bootstrap_5.1.1.min.css">
    <link rel="stylesheet" href="css/Impresion/bootstrap-print.css" media="print">-->
<!-- </head>

<body> -->
                        <table class="table" style="width: 100%;margin-top: 3px;">
                            <tr>
                                <td width="35%">
                                    <b>Paciente:</b> <?php echo $nombre_cliente ?>
                                </td>
                                <td width="30%">
                                    <b>Documento:</b> <?php echo $CODI_CLIENTE ?>
                                </td>
                            </tr>
                            <tr>

                                <td width="15%">
                                    <b>Edad:</b> <?php echo  CalculoEdadPaciente($fechaNacimiento); ?>
                                </td>
                                <td width="15%">
                                    <b>Fecha:</b> <?php echo  $fecha; ?>
                                </td>
                            </tr>

                            <!--  <tr>
                                <td>
                                    <b>Residencia:</b> <?php echo $direccion_cliente  ?>
                                </td>
                                <td>
                                    <b>EPS:</b> <?php echo $entidadSalud  ?>
                                </td>
                            </tr>
                            <tr style="border-bottom-width: 1px;">
                                <td>
                                    <b>Telefono:</b> <?php echo $celular_cliente ?>
                                </td>
                                <td>
                                    <b>Genero:</b> <?php echo $genero ?>
                                </td>
                            </tr> -->
                        </table>

                        <hr style="border-top: 1px solid black;opacity: 1;">


                        <!-- comienzo de la impresion de la informacion-->
                        <?php
                        /*  echo "<div class='col-12' style='padding-bottom: 10px;' align='center'> <h2> Receta Medica </h2> </div>"; */
                        // echo "<div class='col-12' style='padding-bottom: 10px;' align='left'> <B> Diagnóstico Principal: </B> $cie10 -$cie10N <br> <B> Diagnóstico 1: </B> $cie20 -$cie20N <br> <B> Diagnóstico 2: </B> $cie30 -$cie30N <br> <B> Diagnóstico 3: </B> $cie40 -$cie30N </div>";
                        echo "<div class='col-12' style='padding-bottom: 10px;' align='left'> <B> Diagnóstico Principal: </B> $cie10 -$cie10N <br> </div>";
                        echo "<div class='row' style='padding-bottom: 10px;'>";

                        $queryList = mysqli_query($conn3, "SELECT * FROM  RM_Recetario where receta_id = '$receta_id' AND cliente_id = '$cliente_id' ");
                        while ($RowRecetario = mysqli_fetch_array($queryList)) {

                            $id = $RowRecetario['id'];
                            $Nombre_Medicamento = $RowRecetario['Nombre_Medicamento'];
                            $codigoProd1 = $RowRecetario['codigoProd1'];
                            $Cantidad = $RowRecetario['Cantidad'];
                            $Presentacion = $RowRecetario['Presentacion'];
                            $Via_Administracion = $RowRecetario['Via_Administracion'];
                            $Composicion = $RowRecetario['Composicion'];
                            $Dosis = $RowRecetario['Dosis'];

                            $Indicaciones = $RowRecetario['Indicaciones'];
                            $Indicaciones_Generales = $RowRecetario['Indicaciones_Generales'];

                            echo "<div class='col-6'>";
                            echo "<div class='col-12'><b>Medicamento: </B> {$Nombre_Medicamento} {$codigoProd1} </div>";
                            echo "<div class='col-12'><b>Presentación: </B> {$Presentacion} </div>";
                            echo "<div class='col-12'><b>Vía de Administración: </B>  {$Via_Administracion} </div>";

                            echo "<div class='col-6'><b>Cantidad: </B>  {$Cantidad},  <b>Dosis: </b> {$Dosis} </div>";

                            echo "<div class='col-12'><br></div>";
                            echo "</div>";

                            echo "<div class='col-6'>";
                            echo "<div class='col-12'><b>Indicaciones: </B> <br> {$Indicaciones} </div>";
                            echo "<div class='col-12'>Recomendaciones Generales:<br> {$Indicaciones_Generales}</div>";
                            echo "<div class='col-12'><br></div>";
                            echo "</div>";
                        }

                        echo "</div>";
                        ?>

                <div class="col-md-12">
                            <div class="row">

                                <div class="col-md-6" align="center">
                                    <?php
                                    echo  $firmaPaciente;

                                    ?>
                                </div>

                                <div class="col-md-6" align="center">
                                    <?php
                                    echo  $firmaImg;

                                    ?>
                                    <br>_______________________________________<br>
                                    <?php echo $nombreF ?><br>
                                    <b>* Documento firmado digitalmente *</b>
                                </div>
                            </div>
                        </div>



        <!-- division -->

        <!-- <table>
            <thead>
                <tr>
                    <td> -->
                        <!--place holder for the fixed-position header-->
                        <!-- <div class="page-header-space"></div>
                    </td>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td> -->
                        <!--*** CONTENT GOES HERE ***-->


















                        


        <!-- </div> -->
        <!-- cierre del page-->
        <!-- </td>
        </tr>
        </tbody>

        <tfoot>
            <tr>
                <td> -->
                    <!--place holder for the fixed-position footer-->
                    <!-- <div class="page-footer-space"></div>
                </td>
            </tr>
        </tfoot>

        </table>

</body>

</html> -->