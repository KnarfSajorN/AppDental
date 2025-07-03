<?php
include 'funciones/funciones.php';
include 'funciones/funcionesUtilidades.php';
include 'funciones/conn3.php';

$Historia_id = $_GET['historiaClinica1'];

$queryList = mysqli_query($conn3, "SELECT * FROM  historiaEmergencia where id = $Historia_id");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $id = $rowMotorizado['id'];
    $cliente_id = $rowMotorizado['idCliente'];
    $usuario_id = $rowMotorizado['idDoctor'];
    $motivoConsulta = $rowMotorizado['motivoConsulta'];
    $signosVitales = $rowMotorizado['signosVitales'];
    $tratamiento = $rowMotorizado['tratamiento'];
    $Imagenologia_Examen = $rowMotorizado['Imagenologia_Examen'];
    $Laboratorio_Examenes = $rowMotorizado['Laboratorio_Examenes'];
    $interconsulta = $rowMotorizado['interconsulta'];
    $RecetaId = $rowMotorizado['RecetaId'];
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

    if ($genero == "M") {
        $genero = "Masculino";
    } elseif ($genero == "F") {
        $genero = "Femenino";
    }
}

$queryList = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = $usuario_id");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {

    $pieF         = $rowMotorizado['pieF'];
    $header       = $rowMotorizado['header'];

    $nombreF       = $rowMotorizado['nombreF'];

    $LogoF               = $rowMotorizado['logoF'];
    $firma               = $rowMotorizado['firma'];

    if (strlen($LogoF) > 0) {
        $Logo = "<img src='{$Base}/logos/{$LogoF}' height='125' width='125'>";
    }


    if (strlen($firma) > 0) {
        $firmaImg = "<img src='{$Base}/FirmasReg/{$firma}' height='80' width='150'>";
    }
}

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

        <button type="button" onClick="window.print()" style='background: rgb(250,235,215);background: -moz-radial-gradient(circle, rgba(250,235,215,1) 0%, rgba(60,141,176,1) 100%);background: -webkit-radial-gradient(circle, rgba(250,235,215,1) 0%, rgba(60,141,176,1) 100%);background: radial-gradient(circle, rgba(250,235,215,1) 0%, rgba(60,141,176,1) 100%);filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=" #faebd7",endColorstr="#3c8db0" ,GradientType=1);'>
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
                    <div class="page" style="width:100vw;">
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
                                    <b>F.Nacimiento:</b> <?php echo  $fechaNacimiento ?>
                                </td>
                                <td width="15%">
                                    <b>Edad:</b> <?php echo  calculaedad($fechaNacimiento) ?>
                                </td>
                            </tr>

                            <tr>
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
                            </tr>
                        </table>

                        <hr style="border-top: 1px solid black;opacity: 1;">

                        <!-- comienzo de la impresion de la informacion-->
                        <?php $tabla[3] = "<div class=\"col-3\" style=\"padding-bottom: 10px;\">";
                        $tabla[6] = "<div class=\"col-6\" style=\"padding-bottom: 10px;\">";
                        $tabla[12] = "<div class=\"col-12\" style=\"padding-bottom: 10px;\">"; ?>

                        <?php
                        if ($_GET['tipo'] == 'consulta') :
                        ?>
                            <h3 align="center">Historia Emergencia</h3>
                            <?php
                            $Historia_Nombre = "historiaEmergencia";
                            $Historia_id = $Historia_id;
                            include 'IR_Imprimir.php';

                            if (strlen($motivoConsulta) > "0") {
                                echo $tabla[12] . '<b>Motivo Consulta: </b><br><br>' . $motivoConsulta . '</div>';
                            }
                            if (strlen($signosVitales) > "0") {
                                echo $tabla[12] . '<b>Signos Vitales: </b><br><br>' . $signosVitales . '</div>';
                            }
                            if (strlen($tratamiento) > "0") {
                                echo $tabla[12] . '<b>Tratamiento </b><br><br>' . $tratamiento . '</div>';
                            }

                            if (strlen($Imagenologia_Examen) > "0" or strlen($Laboratorio_Examenes) > "0") {
                                echo $tabla[12] . '<b>Examenes</b><br><br>';
                            ?>

                                <table class="table table-responsive">
                                    <thead>
                                        <tr>
                                            <th scope="col" colspan="2">Solicitud de Laboratorios y Exámenes Complementarios</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $contador = 0;
                                        $Examen_Paciente = explode(",", $Imagenologia_Examen);
                                        foreach ($Examen_Paciente as $value) {
                                            $contador++;
                                            if (funcionMaster($value, 'id', 'Nombre', 'examenes_historia') <> "") :
                                                echo '<tr><td>' . $contador . '</td><td>' . funcionMaster($value, 'id', 'Nombre', 'examenes_historia') . '</td></tr>';
                                            endif;
                                        }
                                        ?>
                                    </tbody>
                                    <thead>
                                        <tr>
                                            <th scope="col" colspan="2">Laboratorios</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $contador = 0;
                                        $Laboratorio_Paciente = explode(",", $Laboratorio_Examenes);
                                        foreach ($Laboratorio_Paciente as $value) {
                                            $contador++;
                                            if (funcionMaster($value, 'id', 'Nombre', 'examenes_historia') <> "") :
                                                echo '<tr><td>' . $contador . '</td><td>' . funcionMaster($value, 'id', 'Nombre', 'examenes_historia') . '</td></tr>';
                                            endif;
                                        }
                                        ?>
                                    </tbody>
                                </table>

                            <?php
                                echo "</div>";
                            }
                            if (strlen($interconsulta) > "0") {
                                echo $tabla[12] . '<b> Interconsulta  </b><br><br>' . $interconsulta . '</div>';
                            }
                            ?>

                        <?php
                        endif;
                        ?>

                        <?php
                        if ($_GET['tipo'] == 'incapacidad') :

                            $Historia_Nombre = "Historia_Clinica";
                            $Historia_id = $Historia_id;
                            include 'IR_Imprimir.php';

                            if (strlen($Incapacidades) > "0") {
                                echo $tabla[12] . '<b>Incapacidades</b> <br><br>' . $Incapacidades . '</div>';
                            }


                        endif;
                        ?>
                        <?php
                        if ($_GET['tipo'] == 'examenes') :

                            $Historia_Nombre = "Historia_Clinica";
                            $Historia_id = $Historia_id;
                            include 'IR_Imprimir.php';
                            echo $tabla[12];
                        ?>
                            <h3 align="center">Examenes</h3>
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th scope="col" colspan="2">Examenes</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $contador = 0;
                                    $Examen_Paciente = explode(",", $Imagenologia_Examen);
                                    foreach ($Examen_Paciente as $value) {
                                        $contador++;
                                        if (funcionMaster($value, 'id', 'Nombre', 'examenes_historia') <> "") :
                                            echo '<tr><td>' . $contador . '</td><td>' . funcionMaster($value, 'id', 'Nombre', 'examenes_historia') . '</td></tr>';
                                        endif;
                                    }
                                    ?>
                                </tbody>
                                <thead>
                                    <tr>
                                        <th scope="col" colspan="2">Laboratorios</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $contador = 0;
                                    $Laboratorio_Paciente = explode(",", $Laboratorio_Examenes);
                                    foreach ($Laboratorio_Paciente as $value) {
                                        $contador++;
                                        if (funcionMaster($value, 'id', 'Nombre', 'examenes_historia') <> "") :
                                            echo '<tr><td>' . $contador . '</td><td>' . funcionMaster($value, 'id', 'Nombre', 'examenes_historia') . '</td></tr>';
                                        endif;
                                    }
                                    ?>
                                </tbody>
                            </table>

                        <?php
                            echo "</div>";
                        endif;
                        ?>

                        <?php
                        if ($_GET['tipo'] == 'receta') :
                            $Historia_Nombre = "Historia_Clinica";
                            $Historia_id = $Historia_id;
                            include 'IR_Imprimir.php';
                            echo $tabla[12];
                        ?>

                            <div class="row">
                                <h4 align="center"> Receta </h4>
                                <div class="col-md-12">


                                    <?php


                                    $querydeta = mysqli_query($conn3, "SELECT * FROM  operacionRecetario  where  cliente_id = $cliente_id  and idReceta=$RecetaId");

                                    $nrowl = mysqli_num_rows($querydeta);
                                    while ($rowDetalle = mysqli_fetch_array($querydeta)) {
                                        $Producto = funcionMaster($rowDetalle['codigoProd'], 'id', 'descripcion', 'pos');
                                        $posologia                = $rowDetalle['posologia'];
                                        $cantidad          = $rowDetalle['cantidad'];
                                        $duracion          = $rowDetalle['duracion'];
                                        $metodo          = $rowDetalle['metodo'];
                                        $nota            = $rowDetalle['nota'];
                                        $nota2         = $rowDetalle['nota2'];
                                        $administracion_posologia  = $rowDetalle['administracion_posologia'];
                                        $duracion_tratamiento         = $rowDetalle['duracion_tratamiento'];

                                        $dosis                 = $rowDetalle['dosis'];

                                        $frecuencia                 = $rowDetalle['frecuencia'];
                                        $administracion              = $rowDetalle['administracion'];
                                        $dosisdia           = $rowDetalle['dosisdia'];
                                        $via   = $rowDetalle['via'];
                                        $id_usuario              = $rowDetalle['id_usuario'];
                                        $id_cliente              = $rowDetalle['idcliente'];
                                        $total             = $rowDetalle['total'];
                                        $dias             = $rowDetalle['dias'];

                                        $producto1          = $rowDetalle['producto1'];



                                        $numero++;

                                    ?>

                                        <table id="example1" class="table table-bordered table-striped" style="zoom:0.7">
                                            <tr>
                                                <th style="width:20%">
                                                    <h6 align="center"> MEDICAMENTO</h6>
                                                </th>
                                                <th style="width:20%">
                                                    <h6 align="center"> FRECUENCIA DE ADMINISTRACIÓN</h6>
                                                </th>
                                                <th style="width:10%">
                                                    <h6 align="center"> DOSIS</h6>
                                                </th>
                                                <th style="width:20%">
                                                    <h6 align="center"> DURACIÓN DE PRESCRIPCIÓN</h6>
                                                </th>
                                                <th style="width:20%">
                                                    <h6 align="center"> METODO DE ADMINISTRACIÓN</h6>
                                                </th>
                                                <th style="width:10%">
                                                    <h6 align="center"> CANTIDAD TOTAL DE DESPACHO</h6>
                                                </th>
                                                <th style="width:10%">
                                                    <h6 align="center"> INDICACIONES DE ADMINISTRACIÓN</h6>
                                                </th>
                                                <th style="width:10%">
                                                    <h6 align="center"> OBSERVACIONES</h6>
                                                </th>
                                            </tr>
                                            <tr>
                                                <td style="width:20%">
                                                    <h5> <?php echo $Producto; ?></h5>
                                                </td>
                                                <td style="width:20%">
                                                    <h5><?php echo $frecuencia ?> </h5>
                                                </td>
                                                <td style="width:10%">
                                                    <h5><?php echo $dosis ?></h5>
                                                </td>
                                                <td style="width:20%">
                                                    <h5><?php echo $duracion ?></h5>
                                                </td>
                                                <td style="width:20%">
                                                    <h5><?php echo $metodo ?></h5>
                                                </td>
                                                <td style="width:10%">
                                                    <h5><?php echo $cantidad . $posologia ?></h5>
                                                </td>
                                                <td style="width:10%">
                                                    <h5><?php echo wordwrap($nota, 30, "\n", true) ?></h5>
                                                </td>
                                                <td style="width:10%">
                                                    <h5><?php echo wordwrap($nota2, 30, "\n", true) ?></h5>
                                                </td>
                                            </tr>
                                        </table>
                                    <?php

                                    }

                                    ?>

                                </div>
                            </div>
                        <?php
                            echo "</div>";
                        endif;
                        ?>

                        <div class="col-xs-6" align="center">
                            <?php
                            // echo  $firmaImg;

                            ?>
                        </div>

                        <div class="col-xs-6" align="center">
                            <?php
                            echo  $firmaImg;

                            ?>
                            <br>_______________________________________<br>
                            <?php echo $nombreF ?><br>
                            <b>* Documento firmado digitalmente *</b>
                        </div>
                    </div>
                    <!-- cierre del page-->
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