<?php
include 'funciones/funciones.php';
include 'funciones/funcionesUtilidades.php';
include 'funciones/conn3.php';

// $Historia_id = $_GET['historiaClinica1'];
$Historia_id = decrypt($_GET['HC']);





$queryList = mysqli_query($conn3, "SELECT * FROM  Historia_Clinica where id = $Historia_id");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $id = $rowMotorizado['id'];
    $cliente_id = $rowMotorizado['cliente_id'];
    $usuario_id = $rowMotorizado['usuario_id'];
    $usuario_id1 = $rowMotorizado['usuario_id'];

    $InformacionAcudiente = $rowMotorizado['InformacionAcudiente'];
    $EnfermedadActual = $rowMotorizado['EnfermedadActual'];
    $Checks_Antecedentes = $rowMotorizado['Checks_Antecedentes'];
    $AntecentesGinecobstetricos = $rowMotorizado['AntecentesGinecobstetricos'];
    $AntecedentesFamiliares = $rowMotorizado['AntecedentesFamiliares'];
    $Checks_Revision = $rowMotorizado['Checks_Revision'];
    $SignosVitales = $rowMotorizado['SignosVitales'];
    $Paraclinicos = $rowMotorizado['Paraclinicos'];
    $Imagenologia_Examen = $rowMotorizado['Imagenologia_Examen'];
    $Laboratorio_Examenes = $rowMotorizado['Laboratorio_Examenes'];
    $ExamenFisico = $rowMotorizado['ExamenFisico'];
    $OrganoSentidos = $rowMotorizado['OrganoSentidos'];
    $SintomasGenerales = $rowMotorizado['SintomasGenerales'];
    $DiagnosticoAcupuntura = $rowMotorizado['DiagnosticoAcupuntura'];
    $DiagnosticoConsulta = $rowMotorizado['DiagnosticoConsulta'];
    $Impresion = $rowMotorizado['Impresion'];
    $PlanManejo = $rowMotorizado['PlanManejo'];
    $Incapacidades = $rowMotorizado['Incapacidades'];
    $Insumos = $rowMotorizado['Insumos'];
    $RecetaId = $rowMotorizado['RecetaId'];
    $imgEscalaTanner = $rowMotorizado['imgEscalaTanner'];
    $textEscalaTanner = $rowMotorizado['textEscalaTanner'];
}


if ($nrowl == '') {
    $queryList = mysqli_query($conn3, "SELECT * FROM  examenesaRealizar where historia_id= '$Historia_id'");


    $nrowl1 = mysqli_num_rows($queryList);
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        $Imagenologia_Examen = $rowMotorizado['ecografia'];
        $Laboratorio_Examenes = $rowMotorizado['laboratorio'];
        $cliente_id = $rowMotorizado['cliente_id'];
        $usuario_id = $rowMotorizado['usuario_id'];
    }
}







$queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id = $cliente_id ");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $nombre_cliente = $rowMotorizado['nombre_cliente'];
    $CODI_CLIENTE = $rowMotorizado['CODI_CLIENTE'];
    $fechaNacimiento = $rowMotorizado['fechaNacimiento'];
    $direccion_cliente = $rowMotorizado['direccion_cliente'];
    $entidadSalud = $rowMotorizado['entidadSalud'];
    $entidadSalud = funcionMaster($rowMotorizado['entidad_id'], 'id', 'Nombre', 'Rips_Entidades');
    $celular_cliente = $rowMotorizado['celular_cliente'];
    $genero = $rowMotorizado['genero'];

    if ($genero == "M") {
        $genero = "Masculino";
    } elseif ($genero == "F") {
        $genero = "Femenino";
    }
}

$queryList = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = $usuario_id1");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {

    $pieF         = $rowMotorizado['pieF'];
    $header       = $rowMotorizado['header'];

    $nombreF       = $rowMotorizado['nombreF'];

    $LogoF               = $rowMotorizado['logoF'];
    $firma               = $rowMotorizado['firma'];

    if (strlen($LogoF) > 0) {
        $Logo = "<img src='{$Base}/logos/{$LogoF}' style='height: 3.5cm;width: auto;'>";
    }

    //echo "$usuario_id1 usuario";

    if (strlen($firma) > 0) {
        $firmaImg = "<img src='{$Base}/FirmasReg/{$firma}' height='80' width='150'>";
    }
}





$queryList = mysqli_query($conn3, "SELECT firma FROM  firmas where historia_id = $Historia_id and historia_nombre = 'Historia_Clinica'");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $firmaP = $rowMotorizado['firma'];
}

if (strlen($firmaP) > 10) {
    $firmaPaciente = "<img src='$firmaP' height='125' width='125'> <br>__________________________________ <br>$nombre_cliente<br>$CODI_CLIENTE";
}





$imgEscalaTanner1 = "<img src='img/EscalaTanner/nino1.jpg' height='auto' width='300'>";
$imgEscalaTanner2 = "<img src='img/EscalaTanner/nino2.jpg' height='auto' width='300'>";
$imgEscalaTanner3 = "<img src='img/EscalaTanner/nino3.jpg' height='auto' width='300'>";
$imgEscalaTanner4 = "<img src='img/EscalaTanner/nino4.jpg' height='auto' width='300'>";
$imgEscalaTanner5 = "<img src='img/EscalaTanner/nino5.jpg' height='auto' width='300'>";
$imgEscalaTanner6 = "<img src='img/EscalaTanner/nina1.jpg' height='auto' width='300'>";
$imgEscalaTanner7 = "<img src='img/EscalaTanner/nina2.jpg' height='auto' width='300'>";
$imgEscalaTanner8 = "<img src='img/EscalaTanner/nina3.jpg' height='auto' width='300'>";
$imgEscalaTanner9 = "<img src='img/EscalaTanner/nina4.jpg' height='auto' width='300'>";
$imgEscalaTanner10 = "<img src='img/EscalaTanner/nina5.jpg' height='auto' width='300'>";








?>


<!-- <!DOCTYPE html>
<html>

<head> -->
    <!-- <link rel="stylesheet" href="css/Impresion/estructura_impresion.css">
    <link rel="stylesheet" href="css/Impresion/bootstrap_5.1.1.min.css"> -->
    <!-- <link rel="stylesheet" href="css/Impresion/bootstrap-print.css" media="print"> -->
<!-- </head>

<body> -->

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
                <b>Edad:</b> <?php echo  CalculoEdadPaciente($fechaNacimiento); ?>
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
                <b>Teléfono:</b> <?php echo $celular_cliente ?>
            </td>
            <td>
                <b>Género:</b> <?php echo $genero ?>
            </td>
        </tr>
    </table>

    <hr style="border-top: 1px solid black;opacity: 1;">

    <!-- comienzo de la impresion de la informacion-->
    <?php $tabla[3] = "<div class=\"col-3\" style=\"padding-bottom: 10px;\">";
    $tabla[6] = "<div class=\"col-6\" style=\"padding-bottom: 10px;\">";
    $tabla[12] = "<div class=\"col-12\" style=\"padding-bottom: 10px;\">"; ?>

    <?php
    // if ($_GET['tipo'] == 'consulta') :
    if (decrypt($_GET['tipo']) == 'consulta') :
    ?>

        <h3 align="center">Historia Clínica</h3>
        <?php
        $Historia_Nombre = "Historia_Clinica";
        $Historia_id = $Historia_id;
        include 'IR_Imprimir.php';

        if (strlen($InformacionAcudiente) > "0") {
            echo $tabla[12] . '<b>Información del Acudiente </b><br><br>' . $InformacionAcudiente . '</div>';
        }
        if (strlen($EnfermedadActual) > "0") {
            echo $tabla[12] . '<b>Enfermedad Actual </b><br><br>' . $EnfermedadActual . '</div>';
        }
        if (strlen($Checks_Antecedentes) > "0") {
            echo $tabla[12] . '<b>Antecedentes </b> <br><br>' . $Checks_Antecedentes . '</div>';
        }
        if (strlen($AntecentesGinecobstetricos) > "0") {
            echo $tabla[12] . '<b>Antecedentes Ginecobstetricos </b><br><br>' . $AntecentesGinecobstetricos . '</div>';
        }
        if (strlen($AntecedentesFamiliares) > "0") {

            //reemplazar tildes para evitar inconvenientes con el autoguardado
            $reemplazos = array(
                "Diagnostico" => "Diagnóstico",
            );
            $AntecedentesFamiliares = str_replace(array_keys($reemplazos), array_values($reemplazos), $AntecedentesFamiliares);

            echo $tabla[12] . '<b>Antecedentes Familiares </b><br><br>' . $AntecedentesFamiliares . '</div>';
        }
        if (strlen($Checks_Revision) > "0") {
            echo $tabla[12] . '<b>Revisión por Sistemas </b><br><br>' . $Checks_Revision . '</div>';
        }
        if (strlen($SignosVitales) > "0") {

            //reemplazar tildes para evitar inconvenientes con el guardar historia que toma el nombre para algunas insercciones
            $reemplazos = array(
                "Cefalico" => "Cefálico",
                "Presion" => "Presión",
                "Sistolica" => "Sistólica",
                "Diastolica" => "Diastólica",
                "Saturacion" => "Saturación",
                "Tension" => "Tensión",
                "Oxigeno" => "Oxígeno",
            );
            $SignosVitales = str_replace(array_keys($reemplazos), array_values($reemplazos), $SignosVitales);

            echo $tabla[12] . '<b>Signos vitales y medidas antropométricas </b><br><br>' . $SignosVitales . '</div>';
        }
        if (strlen($Paraclinicos) > "0") {

            //reemplazar tildes para evitar inconvenientes con el autoguardado
            $reemplazos = array(
                "Clasificacion" => "Clasificación",
                "Paraclinico" => "Paraclínico",
            );
            $Paraclinicos = str_replace(array_keys($reemplazos), array_values($reemplazos), $Paraclinicos);
            echo $tabla[12] . '<b>Paraclínicos </b><br><br>' . $Paraclinicos . '</div>';
        }

        if (strlen($Imagenologia_Examen) > "0" or strlen($Laboratorio_Examenes) > "0") {
            echo $tabla[12] . '<b>Exámenes</b><br><br>';



        ?>

            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th scope="col" colspan="2">Orden de Imagenología </th>
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
                        <th scope="col" colspan="2">Orden de Laboratorio</th>
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
        if (strlen($ExamenFisico) > "0") {
            echo $tabla[12] . '<b> Examen  </b><br><br>' . $ExamenFisico . '</div>';
        }
        if (strlen($OrganoSentidos) > "0") {
            echo $tabla[12] . '<b> Órganos de los Sentidos </b><br><br>' . $OrganoSentidos . '</div>';
        }
        if (strlen($SintomasGenerales) > "0") {
            echo $tabla[12] . '<b> Síntomas Generales </b><br><br>' . $SintomasGenerales . '</div>';
        }
        if (strlen($DiagnosticoAcupuntura) > "0") {
            echo $tabla[12] . '<b> Diagnostico de Acupuntura </b><br><br>' . $DiagnosticoAcupuntura . '</div>';
        }

        if (strlen($Impresion) > "0") {
            echo $tabla[12] . '<b>Impresión</b> <br><br>' . $Impresion . '</div>';
        }
        if (strlen($PlanManejo) > "0") {
            echo $tabla[12] . '<b>Plan de manejo</b> <br><br>' . $PlanManejo . '</div>';
        }
        if (strlen($Incapacidades) > "0") {
            //reemplazar tildes para evitar inconvenientes con el autoguardado
            $reemplazos = array(
                "Area" => "Área",
            );
            $Incapacidades = str_replace(array_keys($reemplazos), array_values($reemplazos), $Incapacidades);

            echo $tabla[12] . '<b>Incapacidades</b> <br><br>' . $Incapacidades . '</div>';
        }
        if (strlen($Insumos) > "0") {
            echo $tabla[12] . '<b>Insumos</b> <br><br>' . $Insumos . '</div>';
        }
        if (strlen($textEscalaTanner) > "0") {
            echo $tabla[12] . '<b>Escala de Tanner</b><br><br>' . $textEscalaTanner;
        }

        if ($genero == "Masculino") {
            if ($imgEscalaTanner == "1") {
                echo '<br><br>' . $imgEscalaTanner1;
            }
        }

        if ($genero == "Femenino") {
            if ($imgEscalaTanner == "1") {
                echo '<br><br>' . $imgEscalaTanner6;
            }
        }

        if ($genero == "Masculino") {
            if ($imgEscalaTanner == "2") {
                echo '<br><br>' . $imgEscalaTanner2;
            }
        }

        if ($genero == "Femenino") {
            if ($imgEscalaTanner == "2") {
                echo '<br><br>' . $imgEscalaTanner7;
            }
        }
        if ($genero == "Masculino") {
            if ($imgEscalaTanner == "3") {
                echo '<br><br>' . $imgEscalaTanner3;
            }
        }

        if ($genero == "Femenino") {
            if ($imgEscalaTanner == "3") {
                echo '<br><br>' . $imgEscalaTanner8;
            }
        }
        if ($genero == "Masculino") {
            if ($imgEscalaTanner == "4") {
                echo '<br><br>' . $imgEscalaTanner4;
            }
        }

        if ($genero == "Femenino") {
            if ($imgEscalaTanner == "4") {
                echo '<br><br>' . $imgEscalaTanner9;
            }
        }
        if ($genero == "Masculino") {
            if ($imgEscalaTanner == "5") {
                echo '<br><br>' . $imgEscalaTanner5;
            }
        }

        if ($genero == "Femenino") {
            if ($imgEscalaTanner == "5") {
                echo '<br><br>' . $imgEscalaTanner10;
            }
        }

        ?>

    <?php
    endif;
    ?>

    <?php
    // if ($_GET['tipo'] == 'incapacidad') :
    if (decrypt($_GET['tipo']) == 'incapacidad') :


        $Historia_Nombre = "Historia_Clinica";
        $Historia_id = $Historia_id;
        include 'IR_Imprimir.php';

        if (strlen($Incapacidades) > "0") {
            echo $tabla[12] . '<b>Incapacidades</b> <br><br>' . $Incapacidades . '</div>';
        }


    endif;
    ?>
    <?php
    if (decrypt($_GET['tipo']) == 'examenes') :
        $Historia_Nombre = "Historia_Clinica";
        $Historia_id = $Historia_id;
        include 'IR_Imprimir.php';
        echo $tabla[12];
    ?>

        <h3 align="center">Exámenes</h3>
        <table class="table table-responsive">
            <thead> <?php if ($Imagenologia_Examen <> '') {
                        echo '
                                    <tr>
                                        <th scope="col" colspan="2">Orden de Imagenología</th>
                                    </tr>';
                    } ?>
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

                <?php if ($Laboratorio_Examenes <> '') {
                    echo '
                                    <tr>
                                        <th scope="col" colspan="2">Orden de Laboratorio</th>
                                    </tr>';
                } ?>

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
    // if ($_GET['tipo'] == 'receta') :
    if (decrypt($_GET['tipo']) == 'receta') :
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
        <?php
        echo "</div>";
    endif;
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
            <tr> -->
                <!-- <td> -->
                    <!--place holder for the fixed-position footer-->
                    <!-- <div class="page-footer-space"></div>
                </td>
            </tr>
        </tfoot>

        </table>

</body>

</html> -->