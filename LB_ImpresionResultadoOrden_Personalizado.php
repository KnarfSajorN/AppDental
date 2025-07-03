<?php
include 'funciones/conn3.php';
include 'funciones/funciones.php';
include 'funciones/funcionesUtilidades.php';

$idOperacion = $_GET['idOperacion'];

$queryList = mysqli_query($conn3, "SELECT * FROM  sOperacionInv where idOperacion = $idOperacion");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $idOperacion      = $rowMotorizado['idOperacion'];
    $numeroDoc      = $rowMotorizado['numeroDoc'];
    $idCliente      = $rowMotorizado['idCliente'];
    $idEmpresa      = $rowMotorizado['idEmpresa'];
    $fechaOperacion      = $rowMotorizado['fechaOperacion'];
    $fechaVencimiento      = $rowMotorizado['fechaVencimiento'];
    $subTotal      = $rowMotorizado['subTotal'];
    $impuesto      = $rowMotorizado['impuesto'];
    //$totalNeto      = $rowMotorizado['totalNeto'];
    $totalBruto      = $rowMotorizado['totalBruto'];
    $montoPagado      = $rowMotorizado['montoPagado'];
    $nota      = $rowMotorizado['nota'];

    $medico = funcionMaster($rowMotorizado['medico_asociado_id'], 'id', 'Nombre', 'LB_MedicosAsociados');
}


$queryList = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = $idEmpresa");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $moneda = $rowMotorizado['moneda'];
    $impuestoF = $rowMotorizado['impuestoF'];
    $nombreF = $rowMotorizado['nombreF'];
    $telefonoF = $rowMotorizado['telefonoF'];
    $direccionF = $rowMotorizado['direccionF'];
    $emailF = $rowMotorizado['emailF'];
    $ciudadPaisF = $rowMotorizado['ciudadPaisF'];
    $licenciaF = $rowMotorizado['licenciaF'];

    $pieF         = $rowMotorizado['pieF'];
    $header       = $rowMotorizado['header'];
    $LogoF        = $rowMotorizado['logoF'];

    if (strlen($LogoF) > 0) {
        $Logo = "<img src='{$Base}/logos/{$LogoF}' height='125' width='365'>";
    }
}



$queryList = mysqli_query($conn3, "SELECT * FROM  usuarios where ID = $idEmpresa");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {

    $empresaNombre      = $rowMotorizado['empresaNombre'];
    $pais               = $rowMotorizado['pais'];

    $ciudad             = $rowMotorizado['ciudad'];
    $direccion          = $rowMotorizado['direccion'];
    $telefono           = $rowMotorizado['telefono'];

    $nit                = $rowMotorizado['nit'];
}


$queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id = $idCliente ");
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

$saldo = $totalBruto - $montoPagado;

if ($saldo == 0) {
    $pagado = '<div align="center"><img src="' . $Base . '/pagado.png" height="10%" width="7%"></div>';
}

$FechaHora = funcionMaster($idOperacion, 'idOperacion', 'Fecha', 'LB_ExamenCargado');
$Fecha = explode(" ", $FechaHora);
$Datos_Personales = "<table class='table' style='width: 100%;margin-top: 5px;zoom: 0.85;font-size:20px'>
                            <tr style='font-weight:500;'>
                                <td width='35%'>
                                    <b>Nombre:</b> {$nombre_cliente}
                                </td>
                                <td width='30%'>
                                    <b>Documento:</b> {$CODI_CLIENTE}
                                </td>

                                <td width='20%'>
                                    <b>Fecha:</b> {$fechaOperacion}
                                    
                                </td>
                            </tr>
                            <tr style='font-weight:500;'>
                                <td>
                                    <b>Medico:</b> {$medico}
                                </td>
                                
                                <td>
                                    <b>Genero:</b> {$genero}
                                </td>

                                <td>
                                    <b>F.Nacimiento:</b> {$fechaNacimiento}
                                    
                                </td>

                            </tr>
                            <tr>
                                <td>
                                    <b>Telefono:</b> {$celular_cliente}
                                </td>

                                <td>
                                    <b>Fecha de Impresion:</b> {$Fecha[0]} {$Fecha[1]}
                                </td>

                                <td>
                                    <b>Edad: " . CalculoEdadPaciente($fechaNacimiento) . "</b>
                                </td>
                            </tr>
                        </table>";

/*$Datos_Mini = "<table class='table' style='width: 100%;margin-top: -15px;zoom: 0.85;font-size: 20px;'>
                            <tr>
                                <td style='width:41.2%'>
                                    <b>Telefono:</b> {$celular_cliente}
                                </td>

                                <td style='width:35.3%'>
                                    <b>Fecha de Impresion:</b> {$Fecha[0]} {$Fecha[1]}
                                </td>

                                <td>
                                    <b>Edad: " . CalculoEdadPaciente($fechaNacimiento) . "</b>
                                </td>
                            </tr>
                        </table>";
*/
$Subtitulo = "<div class='col-md-12'>
                <hr style='margin-top:10px;margin-bottom: 3px;'>
            </div>
            <div class='col-md-12'>
                <h2 style='text-align-last: center;margin: 0px;font-size: 1.5rem;padding-top: 12px;'> Orden de Laboratorio # {$idOperacion}</h2>
            </div>
            <div class='col-md-12'>
                <hr style='margin-top:0px;margin-bottom: 3px;'>
            </div>";

function Tabla($Filas, $Columnas)
{
    if ($Columnas == "2") {
        if ($Filas == "No") {
            echo "<table class='table table-striped' style='font-size:14px;vertical-align: middle;width:100%;'>
            <thead>
                <tr>
                    <th scope='col' width='35%' >Analisis</th>
                    <th scope='col' width='25%' >Resultado</th>
                    <!--<th scope='col' width='15%' >Unidades</th>
                    <th scope='col' width='25%' >Valor de Referencia</th>-->
                </tr>
            </thead>
        <tbody>";
        } else {
            echo "<table class='table table-striped' style='font-size:14px;vertical-align: middle;width:100%;'>
            <thead>
                <tr>
                    <th scope='col' width='30%' >Analisis</th>
                    <th scope='col' width='10%' >Resultado</th>
                    <!--<th scope='col' width='5%' >Unidades</th>
                    <th scope='col' width='15%' >Valor de Referencia</th>-->
                    <th scope='col' width='30%' >Analisis</th>
                    <th scope='col' width='10%' >Resultado</th>
                    <!--<th scope='col' width='5%' >Unidades</th>
                    <th scope='col' width='15%' >Valor de Referencia</th>-->
                </tr>
            </thead>
        <tbody>";
        }
    } else {
        if ($Filas == "No") {
            echo "<table class='table table-striped' style='font-size:14px;vertical-align: middle;width:100%;'>
            <thead>
                <tr>
                    <th scope='col' width='35%' >Analisis</th>
                    <th scope='col' width='25%' >Resultado</th>
                    <th scope='col' width='15%' >Unidades</th>
                    <th scope='col' width='25%' >Valor de Referencia</th>
                </tr>
            </thead>
        <tbody>";
        } else {
            echo "<table class='table table-striped' style='font-size:14px;vertical-align: middle;width:100%;'>
            <thead>
                <tr>
                    <th scope='col' width='30%' >Analisis</th>
                    <th scope='col' width='10%' >Resultado</th>
                    <th scope='col' width='5%' >Unidades</th>
                    <!--<th scope='col' width='15%' >Valor de Referencia</th>-->
                    <th scope='col' width='30%' >Analisis</th>
                    <th scope='col' width='10%' >Resultado</th>
                    <th scope='col' width='5%' >Unidades</th>
                    <!--<th scope='col' width='15%' >Valor de Referencia</th>-->
                </tr>
            </thead>
        <tbody>";
        }
    }
}

function MasDatos($rowExamenGeneral, $Columnas)
{
    if ($rowExamenGeneral["Metodo"] != "") {
        echo "<tr><td colspan='{$Columnas}'><b> Metodo : </b>" . $rowExamenGeneral["Metodo"] . "</td></tr>";
    }
    if ($rowExamenGeneral["Observaciones"] != "") {
        echo "<tr><td colspan='{$Columnas}'><b> Observaciones :</b> <br>" . $rowExamenGeneral["Observaciones"] . "</td></tr>";
    }
}

$ExamenesDosValores = ["144", "143", "199", "200", "198", "161", "163", "157","158", "160", "204", "205"];
?>


<html>

<head></head>


<body style="margin: 0px;">
    <link rel="stylesheet" href="css/Impresion/bootstrap_5.1.1.min.css">
    <link rel="stylesheet" href="css/Impresion/bootstrap-print.css" media="print">
    <style>
        @media all {
            div.saltopagina {
                display: none;
            }
        }

        @media print {
            div.saltopagina {
                display: block;
                page-break-before: always;
            }

            button {
                display: none;
            }

            .float-button-container {
                display: none;
            }
        }

        .table>:not(caption)>*>* {
            padding: 0;
            padding-top: 5px;
            padding-left: 10px;
        }

        /* para que no ocupe mucho espacio los valores de referencia*/
        p {
            margin-top: 0;
            margin-bottom: 0;
        }

        .table>tbody>tr {
            font-weight: 500;
        }
    </style>
    <table class="kinzi-print-table" style="width:100%;" cellpadding="0" cellspacing="0">
        <thead class="kinzi-print-header" style="display: table-header-group !important;">
            <tr>
                <th>
                    <!-- height: 380px; es la altura maxima que admite el header para que funcione correctamente -->
                    <div class="page-header" style="text-align: center;background-image: url('ImagenesFondoLaboratorio/headerlaaboratorio.jpg') !important;border-bottom: 0;background-color:white; background-repeat:no-repeat;background-size:100% 100%;height: 200px;">
                    </div>

                    <?php //echo $Datos_Personales; 
                    echo "<br><label style='width: 100%;text-align: center;font-size:20px;'>Orden # " . $numeroDoc . " De Laboratorio </label>";
                    ?>
                </th>
            </tr>
        </thead>
        <tfoot class="kinzi-print-footer" style="display: table-footer-group !important;">
            <tr>
                <th>
                    <!-- height: 630px; es la altura maxima que admite el footer para que funcione correctamente -->
                    <?php if (isset($_GET["error"])) {
                        echo "<br><br>";
                    } ?>
                    <?php
                    $direccion = urlencode("http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
                    //echo $direccion;
                    echo '<img src="https://chart.googleapis.com/chart?chs=130x130&cht=qr&chl=' . $direccion . '&choe=UTF-8" title="Link to Google.com" />';
                    ?>
                    <div class="page-footer" style="height: 70px;text-align: left;background-image: url('ImagenesFondoLaboratorio/footerlaboratorio.jpg') !important;border-top: 0;background-color:white; background-repeat:no-repeat;background-size:100% 100%;">
                    </div>
                    <span style=" font-size: 0 !important; line-height: 0 !important;">&nbsp;</span>
                </th>
            </tr>
        </tfoot>
        <tbody class="kinzi-print-body" style="display: table-row-group !important;">
            <tr>
                <td>
                    <?php echo $Datos_Personales; ?>
                    <?php if (!isset($_GET["examenes"]) AND !isset($_GET["examenescategoria"])) : ?>
                        <!-- comienzo de la impresion de la informacion-->
                        <!--<img src="ImagenesFondoLaboratorio/fondolaboratorio.jpg" style="width:100%;height:90%;z-index: -1;position: fixed;">-->

                        <div class="box">
                            <div class="col-md-12">
                                <div class="box-body">

                                    <?php
                                    $TipoTabla = "";
                                    $queryExamenGeneral = mysqli_query($conn3, "SELECT * FROM  LB_ExamenCargado WHERE idOperacion='$idOperacion' AND CaracteristicaExamen='No' GROUP BY examen_id ORDER BY id ASC");
                                    while ($rowExamenGeneral = mysqli_fetch_array($queryExamenGeneral)) {

                                        $examen_id = $rowExamenGeneral["examen_id"];
                                        $ValidacionExamenesDosValores = "";
                                        foreach ($ExamenesDosValores as $key => $value) {
                                            if ($value == $examen_id) {
                                                $ValidacionExamenesDosValores = "Si";
                                            }
                                        }

                                        $queryExamenCaracteristicas = mysqli_query($conn3, "SELECT * FROM  LB_ExamenCargado WHERE examen_id='$examen_id' AND idOperacion='$idOperacion' ORDER BY id ASC");
                                        $NrowExamenCaracteristicas = mysqli_num_rows($queryExamenCaracteristicas);

                                        if ($NrowExamenCaracteristicas == 1) {
                                            $rowExamenCaracteristicas = mysqli_fetch_array($queryExamenCaracteristicas);

                                            if ($TipoTabla == "" or $TipoTabla != "Total") {

                                                if ($ValidacionExamenesDosValores == "Si") {
                                                    echo Tabla("No", "2");
                                                    $TipoTabla = "Total";
                                                } else {
                                                    echo Tabla("No", "4");
                                                    $TipoTabla = "Total";
                                                }
                                            }

                                            if ($ValidacionExamenesDosValores == "Si") {
                                                echo "<tr>
                                                    <td width='35%'>" . $rowExamenCaracteristicas["Nombre"] . "</td>
                                                    <td width='25%'>" . str_replace(",", "<br>", $rowExamenCaracteristicas["Resultado"]) . "</td>
                                                </tr>";

                                                echo MasDatos($rowExamenGeneral, "2");
                                            } else {
                                                echo "<tr>
                                                    <td width='35%'>" . $rowExamenCaracteristicas["Nombre"] . "</td>
                                                    <td width='25%'>" . str_replace(",", "<br>", $rowExamenCaracteristicas["Resultado"]) . "</td>
                                                    <td width='15%'>" . $rowExamenCaracteristicas["Unidades_Referencia"] . "</td>
                                                    <td class='valoresreferencia' width='25%'>" . $rowExamenCaracteristicas["Valores_Referencia"] . "</td>
                                                </tr>";

                                                echo MasDatos($rowExamenGeneral, "4");
                                            }
                                        } else {
                                            $contador = "0";
                                            $arregloTabla = [];
                                            while ($rowExamenCaracteristicas = mysqli_fetch_array($queryExamenCaracteristicas)) {
                                                $contador++;
                                                if ($contador == 1) {
                                                    if ($TipoTabla == "Total") {
                                                        echo "</tbody></table>";
                                                        //echo "<div style='display:block;page-break-before:always;'></div>";
                                                        $TipoTabla = "";
                                                    }
                                                    echo "<label style='display: block;text-align-last: center;color: blue;font-weight: 750;'>" . $rowExamenCaracteristicas["Nombre"] . "</label>";


                                                    if ($ValidacionExamenesDosValores == "Si") {
                                                        echo Tabla($rowExamenCaracteristicas["En_Dos_Tablas"], "2");
                                                    } else {
                                                        echo Tabla($rowExamenCaracteristicas["En_Dos_Tablas"], "4");
                                                    }
                                                } else {
                                                    $arregloTabla[$contador - 1]["Nombre"] = $rowExamenCaracteristicas["Nombre"];
                                                    $arregloTabla[$contador - 1]["Resultado"] = str_replace(",", "<br>", $rowExamenCaracteristicas["Resultado"]);
                                                    $arregloTabla[$contador - 1]["Unidades_Referencia"] = $rowExamenCaracteristicas["Unidades_Referencia"];
                                                    $arregloTabla[$contador - 1]["Valores_Referencia"] = $rowExamenCaracteristicas["Valores_Referencia"];
                                                }
                                            }
                                            //print_r($arregloTabla);
                                            $cantidad = count($arregloTabla);
                                            if ($rowExamenGeneral["En_Dos_Tablas"] == "Si") {
                                                $CantidadDetalles = round(($cantidad / 2), 0, PHP_ROUND_HALF_DOWN);
                                                for ($i = 1; $i <= $CantidadDetalles + 1; $i++) {

                                                    if(strrpos($arregloTabla[$i]["Nombre"], ":")!=""){$arregloTabla[$i]["Nombre"]="<b>". $arregloTabla[$i]["Nombre"]."</b>";}
                                                    if(strrpos($arregloTabla[$i + $CantidadDetalles]["Nombre"], ":")!=""){$arregloTabla[$i + $CantidadDetalles]["Nombre"]="<b>". $arregloTabla[$i + $CantidadDetalles]["Nombre"]."</b>";}

                                                    if ($ValidacionExamenesDosValores == "Si") {

                                                        echo "<tr>
                                                        <td width='20%'>" . $arregloTabla[$i]["Nombre"] . "</td>
                                                        <td width='10%'>" . $arregloTabla[$i]["Resultado"] . "</td>
                                                        <!--<td width='5%'>" . $arregloTabla[$i]["Unidades_Referencia"] . "</td>
                                                        <td class='valoresreferencia' width='15%'>" . $arregloTabla[$i]["Valores_Referencia"] . "</td>-->
                                                        <td width='20%'>" . $arregloTabla[$i + $CantidadDetalles]["Nombre"] . "</td>
                                                        <td width='10%'>" . $arregloTabla[$i + $CantidadDetalles]["Resultado"] . "</td>
                                                        <!--<td width='5%'>" . $arregloTabla[$i + $CantidadDetalles]["Unidades_Referencia"] . "</td>
                                                        <td class='valoresreferencia' width='15%'>" . $arregloTabla[$i + $CantidadDetalles]["Valores_Referencia"] . "</td>-->
                                                        </tr>";

                                                    } else {

                                                        echo "<tr>
                                                        <td width='20%'>" . $arregloTabla[$i]["Nombre"] . "</td>
                                                        <td width='10%'>" . $arregloTabla[$i]["Resultado"] . "</td>
                                                        <td width='5%'>" . $arregloTabla[$i]["Unidades_Referencia"] . "</td>
                                                        <!--<td class='valoresreferencia' width='15%'>" . $arregloTabla[$i]["Valores_Referencia"] . "</td>-->
                                                        <td width='20%'>" . $arregloTabla[$i + $CantidadDetalles]["Nombre"] . "</td>
                                                        <td width='10%'>" . $arregloTabla[$i + $CantidadDetalles]["Resultado"] . "</td>
                                                        <td width='5%'>" . $arregloTabla[$i + $CantidadDetalles]["Unidades_Referencia"] . "</td>
                                                        <!--<td class='valoresreferencia' width='15%'>" . $arregloTabla[$i + $CantidadDetalles]["Valores_Referencia"] . "</td>-->
                                                        </tr>";
                                                    }

                                                    foreach ($arregloTabla[$i] as $key => $value) {$arregloTabla[$i][$key] = "";}
                                                    foreach ($arregloTabla[$i + $CantidadDetalles] as $key => $value) {$arregloTabla[$i + $CantidadDetalles][$key] = "";}
                                                }

                                                if ($ValidacionExamenesDosValores == "Si") {
                                                    echo MasDatos($rowExamenGeneral, "4");
                                                } else {
                                                    echo MasDatos($rowExamenGeneral, "6");
                                                }
                                            } else {
                                                for ($i = 1; $i <= $cantidad; $i++) {

                                                    if ($ValidacionExamenesDosValores == "Si") {
                                                        echo "<tr>
                                                        <td width='35%'>" . $arregloTabla[$i]["Nombre"] . "</td>
                                                        <td width='25%'>" . $arregloTabla[$i]["Resultado"] . "</td>
                                                        <!--<td width='15%'>" . $arregloTabla[$i]["Unidades_Referencia"] . "</td>
                                                        <td class='valoresreferencia' width='25%'>" . $arregloTabla[$i]["Valores_Referencia"] . "</td>-->
                                                    </tr>";
                                                    } else {
                                                        echo "<tr>
                                                        <td width='35%'>" . $arregloTabla[$i]["Nombre"] . "</td>
                                                        <td width='25%'>" . $arregloTabla[$i]["Resultado"] . "</td>
                                                        <td width='15%'>" . $arregloTabla[$i]["Unidades_Referencia"] . "</td>
                                                        <td class='valoresreferencia' width='25%'>" . $arregloTabla[$i]["Valores_Referencia"] . "</td>
                                                    </tr>";
                                                    }
                                                }
                                                if ($ValidacionExamenesDosValores == "Si") {
                                                    echo MasDatos($rowExamenGeneral, "2");
                                                } else {
                                                    echo MasDatos($rowExamenGeneral, "4");
                                                }
                                            }

                                            echo "</tbody></table>";
                                        }
                                    }
                                    if ($TipoTabla != "") {
                                        echo "</tbody></table>";
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class='row col-md-12' style="padding-bottom:10px;">
                                <?php
                                $FirmaIngreso = funcionMaster($rowExamenCaracteristicas["Usuario_Resultados_Ingreso"], 'ID_Usuario', 'firma', 'config');
                                $DatosIngreso = funcionMaster($rowExamenCaracteristicas["Usuario_Resultados_Ingreso"], 'ID', 'NOMBRE_USUARIO', 'usuarios');
                                if ($rowExamenCaracteristicas["Usuario_Resultados_Ingreso"] != 0) {

                                    echo "<div class='col-6' align='center' style='font-size: 13px;'>
                                            <img src='{$Base}/FirmasReg/{$FirmaIngreso}' height='100' width='200'>
                                            <br>_______________________________
                                            <br><label style='position: relative;top: -22px;display: grid;'>$DatosIngreso<br>
                                            <b>*Responsable de la emision de los resultados de la prueba*</b></label> 
                                            </div>";
                                }
                                ?>

                                <?php
                                $FirmaValidador = funcionMaster($rowExamenCaracteristicas["Usuario_Valida_Resultados"], 'ID_Usuario', 'firma', 'config');
                                $DatosValidador = funcionMaster($rowExamenCaracteristicas["Usuario_Valida_Resultados"], 'ID', 'NOMBRE_USUARIO', 'usuarios');
                                if ($rowExamenCaracteristicas["Usuario_Valida_Resultados"] != 0) {

                                    echo "<div class='col-6' align='center' style='font-size: 13px;'>
                                            <img src='{$Base}/FirmasReg/{$FirmaValidador}' height='100' width='200'>
                                            <br>_______________________________
                                            <br><label style='position: relative;top: -22px;display: grid;'>$DatosValidador<br>
                                            <b>*Responsable de la validacion de los resultados de la prueba*</b></label>  
                                            </div>";
                                }
                                ?>
                            </div>
                            <!-- importante para que la ultima hoja quede bien el footer -->
                            <div style='display:block;page-break-before:always;'></div>
                        </div>

                    <?php endif; ?>


                    <?php if (isset($_GET["examenes"]) and $_GET["examenes"] != "categoria") : ?>
                        <!-- comienzo de la impresion de la informacion-->
                        <!--<img src="ImagenesFondoLaboratorio/fondolaboratorio.jpg" style="width:100%;height:90%;z-index: -1;position: fixed;">-->

                        <div class="box">
                            <div class="col-md-12">
                                <div class="box-body">

                                    <?php
                                    $TipoTabla = "";

                                    $examenes = $_GET["examenes"];
                                    if ($_GET["examenes"] == "examenes") {
                                        $examenes = "";
                                        $queryList = mysqli_query($conn3, "SELECT id FROM  LB_ExamenCargado WHERE idOperacion='$idOperacion' AND CaracteristicaExamen='No' GROUP BY examen_id ORDER BY id ASC");
                                        while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                            $examenes .= $rowMotorizado["id"] . ',';
                                        }
                                        $examenes = trim($examenes, ',');
                                    }
                                    $examenes = explode(",", $examenes);
                                    foreach ($examenes as $key => $value) {
                                        $examen = funcionMaster($value, 'id', 'examen_id', 'LB_ExamenCargado');

                                        $queryExamenGeneral = mysqli_query($conn3, "SELECT * FROM  LB_ExamenCargado WHERE idOperacion='$idOperacion' AND CaracteristicaExamen='No' and examen_id='$examen' ORDER BY id ASC");
                                        while ($rowExamenGeneral = mysqli_fetch_array($queryExamenGeneral)) {
                                            $examen_id = $rowExamenGeneral["examen_id"];

                                            $ValidacionExamenesDosValores = "";
                                            foreach ($ExamenesDosValores as $key => $value) {
                                                if ($value == $examen_id) {
                                                    $ValidacionExamenesDosValores = "Si";
                                                }
                                            }
                                            $queryExamenCaracteristicas = mysqli_query($conn3, "SELECT * FROM  LB_ExamenCargado WHERE examen_id='$examen_id' AND idOperacion='$idOperacion' ORDER BY id ASC");
                                            $NrowExamenCaracteristicas = mysqli_num_rows($queryExamenCaracteristicas);

                                            if ($NrowExamenCaracteristicas == 1) {
                                                $rowExamenCaracteristicas = mysqli_fetch_array($queryExamenCaracteristicas);

                                                if ($TipoTabla == "" or $TipoTabla != "Total") {

                                                    if ($ValidacionExamenesDosValores == "Si") {
                                                        echo Tabla("No", "2");
                                                        $TipoTabla = "Total";
                                                    } else {
                                                        echo Tabla("No", "4");
                                                        $TipoTabla = "Total";
                                                    }
                                                }

                                                if ($ValidacionExamenesDosValores == "Si") {
                                                    echo "<tr>
                                                    <td width='35%'>" . $rowExamenCaracteristicas["Nombre"] . "</td>
                                                    <td width='25%'>" . str_replace(",", "<br>", $rowExamenCaracteristicas["Resultado"]) . "</td>
                                                    </tr>";

                                                    echo MasDatos($rowExamenGeneral, "2");
                                                } else {
                                                    echo "<tr>
                                                    <td width='35%'>" . $rowExamenCaracteristicas["Nombre"] . "</td>
                                                    <td width='25%'>" . str_replace(",", "<br>", $rowExamenCaracteristicas["Resultado"]) . "</td>
                                                    <td width='15%'>" . $rowExamenCaracteristicas["Unidades_Referencia"] . "</td>
                                                    <td class='valoresreferencia' width='25%'>" . $rowExamenCaracteristicas["Valores_Referencia"] . "</td>
                                                    </tr>";

                                                    echo MasDatos($rowExamenGeneral, "4");
                                                }
                                            } else {
                                                $contador = "0";
                                                $arregloTabla = [];
                                                while ($rowExamenCaracteristicas = mysqli_fetch_array($queryExamenCaracteristicas)) {
                                                    $contador++;
                                                    if ($contador == 1) {
                                                        if ($TipoTabla == "Total") {
                                                            echo "</tbody></table>";
                                                            if ($_GET["examenes"] == "examenes") {
                                                                echo "<div style='display:block;page-break-before:always;'></div>";
                                                            }

                                                            $TipoTabla = "";
                                                        }
                                                        echo "<label style='display: block;text-align-last: center;color: blue;font-weight: 750;'>" . $rowExamenCaracteristicas["Nombre"] . "</label>";

                                                        if ($ValidacionExamenesDosValores == "Si") {
                                                            echo Tabla($rowExamenCaracteristicas["En_Dos_Tablas"], "2");
                                                        } else {
                                                            echo Tabla($rowExamenCaracteristicas["En_Dos_Tablas"], "4");
                                                        }
                                                    } else {
                                                        $arregloTabla[$contador - 1]["Nombre"] = $rowExamenCaracteristicas["Nombre"];
                                                        $arregloTabla[$contador - 1]["Resultado"] = str_replace(",", "<br>", $rowExamenCaracteristicas["Resultado"]);
                                                        $arregloTabla[$contador - 1]["Unidades_Referencia"] = $rowExamenCaracteristicas["Unidades_Referencia"];
                                                        $arregloTabla[$contador - 1]["Valores_Referencia"] = $rowExamenCaracteristicas["Valores_Referencia"];
                                                    }
                                                }
                                                //print_r($arregloTabla);
                                                $cantidad = count($arregloTabla);
                                                if ($rowExamenGeneral["En_Dos_Tablas"] == "Si") {
                                                    $CantidadDetalles = round(($cantidad / 2), 0, PHP_ROUND_HALF_DOWN);
                                                    for ($i = 1; $i <= $CantidadDetalles + 1; $i++) {

                                                        if(strrpos($arregloTabla[$i]["Nombre"], ":")!=""){$arregloTabla[$i]["Nombre"]="<b>". $arregloTabla[$i]["Nombre"]."</b>";}
                                                        if(strrpos($arregloTabla[$i + $CantidadDetalles]["Nombre"], ":")!=""){$arregloTabla[$i + $CantidadDetalles]["Nombre"]="<b>". $arregloTabla[$i + $CantidadDetalles]["Nombre"]."</b>";}

                                                        if ($ValidacionExamenesDosValores == "Si") {
                                                            echo "<tr>
                                                        <td width='20%'>" . $arregloTabla[$i]["Nombre"] . "</td>
                                                        <td width='10%'>" . $arregloTabla[$i]["Resultado"] . "</td>
                                                        <!--<td width='5%'>" . $arregloTabla[$i]["Unidades_Referencia"] . "</td>
                                                        <td class='valoresreferencia' width='15%'>" . $arregloTabla[$i]["Valores_Referencia"] . "</td>-->
                                                        <td width='20%'>" . $arregloTabla[$i + $CantidadDetalles]["Nombre"] . "</td>
                                                        <td width='10%'>" . $arregloTabla[$i + $CantidadDetalles]["Resultado"] . "</td>
                                                        <!--<td width='5%'>" . $arregloTabla[$i + $CantidadDetalles]["Unidades_Referencia"] . "</td>
                                                        <td class='valoresreferencia' width='15%'>" . $arregloTabla[$i + $CantidadDetalles]["Valores_Referencia"] . "</td>-->
                                                        </tr>";
                                                        } else {
                                                            echo "<tr>
                                                        <td width='20%'>" . $arregloTabla[$i]["Nombre"] . "</td>
                                                        <td width='10%'>" . $arregloTabla[$i]["Resultado"] . "</td>
                                                        <td width='5%'>" . $arregloTabla[$i]["Unidades_Referencia"] . "</td>
                                                        <!--<td class='valoresreferencia' width='15%'>" . $arregloTabla[$i]["Valores_Referencia"] . "</td>-->
                                                        <td width='20%'>" . $arregloTabla[$i + $CantidadDetalles]["Nombre"] . "</td>
                                                        <td width='10%'>" . $arregloTabla[$i + $CantidadDetalles]["Resultado"] . "</td>
                                                        <td width='5%'>" . $arregloTabla[$i + $CantidadDetalles]["Unidades_Referencia"] . "</td>
                                                        <!--<td class='valoresreferencia' width='15%'>" . $arregloTabla[$i + $CantidadDetalles]["Valores_Referencia"] . "</td>-->
                                                        </tr>";
                                                        }

                                                        foreach ($arregloTabla[$i] as $key => $value) {$arregloTabla[$i][$key] = "";}
                                                        foreach ($arregloTabla[$i + $CantidadDetalles] as $key => $value) {$arregloTabla[$i + $CantidadDetalles][$key] = "";}
                                                    }

                                                    if ($ValidacionExamenesDosValores == "Si") {
                                                        echo MasDatos($rowExamenGeneral, "4");
                                                    } else {
                                                        echo MasDatos($rowExamenGeneral, "6");
                                                    }
                                                } else {
                                                    for ($i = 1; $i <= $cantidad; $i++) {

                                                        if ($ValidacionExamenesDosValores == "Si") {
                                                            echo "<tr>
                                                                    <td width='35%'>" . $arregloTabla[$i]["Nombre"] . "</td>
                                                                    <td width='25%'>" . $arregloTabla[$i]["Resultado"] . "</td>
                                                                    <!--<td width='15%'>" . $arregloTabla[$i]["Unidades_Referencia"] . "</td>
                                                                    <td class='valoresreferencia' width='25%'>" . $arregloTabla[$i]["Valores_Referencia"] . "</td>-->
                                                                </tr>";
                                                        } else {
                                                            echo "<tr>
                                                                    <td width='35%'>" . $arregloTabla[$i]["Nombre"] . "</td>
                                                                    <td width='25%'>" . $arregloTabla[$i]["Resultado"] . "</td>
                                                                    <td width='15%'>" . $arregloTabla[$i]["Unidades_Referencia"] . "</td>
                                                                    <td class='valoresreferencia' width='25%'>" . $arregloTabla[$i]["Valores_Referencia"] . "</td>
                                                                </tr>";
                                                        }
                                                    }
                                                    if ($ValidacionExamenesDosValores == "Si") {
                                                        echo MasDatos($rowExamenGeneral, "2");
                                                    } else {
                                                        echo MasDatos($rowExamenGeneral, "4");
                                                    }
                                                }
                                                echo "</tbody></table>";
                                                if ($_GET["examenes"] == "examenes") {
                                                    echo "<div style='display:block;page-break-before:always;'></div>";
                                                }
                                            }
                                        }
                                    }
                                    if ($TipoTabla != "") {
                                        echo "</tbody></table>";
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class='row col-md-12' style="padding-bottom:10px;">
                                <?php
                                $FirmaIngreso = funcionMaster($rowExamenCaracteristicas["Usuario_Resultados_Ingreso"], 'ID_Usuario', 'firma', 'config');
                                $DatosIngreso = funcionMaster($rowExamenCaracteristicas["Usuario_Resultados_Ingreso"], 'ID', 'NOMBRE_USUARIO', 'usuarios');
                                if ($rowExamenCaracteristicas["Usuario_Resultados_Ingreso"] != 0) {

                                    echo "<div class='col-6' align='center' style='font-size: 13px;'>
                                            <img src='{$Base}/FirmasReg/{$FirmaIngreso}' height='100' width='200'>
                                            <br>_______________________________
                                            <br><label style='position: relative;top: -22px;display: grid;'>$DatosIngreso<br>
                                            <b>*Responsable de la emision de los resultados de la prueba*</b></label> 
                                            </div>";
                                }
                                ?>

                                <?php
                                $FirmaValidador = funcionMaster($rowExamenCaracteristicas["Usuario_Valida_Resultados"], 'ID_Usuario', 'firma', 'config');
                                $DatosValidador = funcionMaster($rowExamenCaracteristicas["Usuario_Valida_Resultados"], 'ID', 'NOMBRE_USUARIO', 'usuarios');
                                if ($rowExamenCaracteristicas["Usuario_Valida_Resultados"] != 0) {

                                    echo "<div class='col-6' align='center' style='font-size: 13px;'>
                                            <img src='{$Base}/FirmasReg/{$FirmaValidador}' height='100' width='200'>
                                            <br>_______________________________
                                            <br><label style='position: relative;top: -22px;display: grid;'>$DatosValidador<br>
                                            <b>*Responsable de la validacion de los resultados de la prueba*</b></label>  
                                            </div>";
                                }
                                ?>
                            </div>
                            <!-- importante para que la ultima hoja quede bien el footer -->
                            <div style='display:block;page-break-before:always;'></div>
                        </div>

                    <?php endif; ?>

                    <?php if (isset($_GET["examenes"]) and $_GET["examenes"] == "categoria") : ?>

                        <!-- comienzo de la impresion de la informacion-->
                        <!--<img src="ImagenesFondoLaboratorio/fondolaboratorio.jpg" style="width:100%;height:90%;z-index: -1;position: fixed;">-->

                        <div class="box">
                            <div class="col-md-12">
                                <div class="box-body">

                                    <?php
                                    $TipoTabla = "";

                                    $queryList = mysqli_query($conn3, "SELECT examen_id,id FROM  LB_ExamenCargado WHERE idOperacion='$idOperacion' AND CaracteristicaExamen='No' GROUP BY examen_id ORDER BY id ASC");

                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                        $categoriasarreglo[funcionMaster($rowMotorizado["examen_id"], 'id', 'categoria_id', 'LB_Examen')] = $categoriasarreglo[funcionMaster($rowMotorizado["examen_id"], 'id', 'categoria_id', 'LB_Examen')] . ',' . $rowMotorizado["id"];
                                    }

                                    foreach ($categoriasarreglo as $key1 => $valueInicial) {

                                        echo "<label align='center' style='font-size:19px;width: 100%;font-weight: 750;'>" . funcionMaster($key1, 'id', 'Nombre', 'LB_Categoria') . "</label><br>";
                                        $TipoTabla = "";
                                        $ContadorExamenes = "0";
                                        $valueInicial = trim($valueInicial, ',');
                                        $arregloExamen = explode(",", $valueInicial);
                                        foreach ($arregloExamen as $key => $value) {
                                            $ContadorExamenes++;
                                            $examen = funcionMaster($value, 'id', 'examen_id', 'LB_ExamenCargado');

                                            $queryExamenGeneral = mysqli_query($conn3, "SELECT * FROM  LB_ExamenCargado WHERE idOperacion='$idOperacion' AND CaracteristicaExamen='No' and examen_id='$examen' ORDER BY id ASC");
                                            while ($rowExamenGeneral = mysqli_fetch_array($queryExamenGeneral)) {
                                                $examen_id = $rowExamenGeneral["examen_id"];

                                                $ValidacionExamenesDosValores = "";
                                                foreach ($ExamenesDosValores as $key => $value) {
                                                    if ($value == $examen_id) {
                                                        $ValidacionExamenesDosValores = "Si";
                                                    }
                                                }

                                                $queryExamenCaracteristicas = mysqli_query($conn3, "SELECT * FROM  LB_ExamenCargado WHERE examen_id='$examen_id' AND idOperacion='$idOperacion' ORDER BY id ASC");
                                                $NrowExamenCaracteristicas = mysqli_num_rows($queryExamenCaracteristicas);

                                                if ($NrowExamenCaracteristicas == 1) {
                                                    $rowExamenCaracteristicas = mysqli_fetch_array($queryExamenCaracteristicas);

                                                    if ($TipoTabla == "" or $TipoTabla != "Total") {

                                                        if ($ValidacionExamenesDosValores == "Si") {
                                                            echo Tabla("No", "2");
                                                            $TipoTabla = "Total";
                                                        } else {
                                                            echo Tabla("No", "4");
                                                            $TipoTabla = "Total";
                                                        }
                                                    }

                                                    if ($ValidacionExamenesDosValores == "Si") {
                                                        echo "<tr>
                                                            <td width='35%'>" . $rowExamenCaracteristicas["Nombre"] . "</td>
                                                            <td width='25%'>" . str_replace(",", "<br>", $rowExamenCaracteristicas["Resultado"]) . "</td>
                                                            </tr>";

                                                        echo MasDatos($rowExamenGeneral, "2");
                                                    } else {
                                                        echo "<tr>
                                                            <td width='35%'>" . $rowExamenCaracteristicas["Nombre"] . "</td>
                                                            <td width='25%'>" . str_replace(",", "<br>", $rowExamenCaracteristicas["Resultado"]) . "</td>
                                                            <td width='15%'>" . $rowExamenCaracteristicas["Unidades_Referencia"] . "</td>
                                                            <td class='valoresreferencia' width='25%'>" . $rowExamenCaracteristicas["Valores_Referencia"] . "</td>
                                                            </tr>";

                                                        echo MasDatos($rowExamenGeneral, "4");
                                                    }
                                                } else {
                                                    $contador = "0";
                                                    $arregloTabla = [];
                                                    while ($rowExamenCaracteristicas = mysqli_fetch_array($queryExamenCaracteristicas)) {
                                                        $contador++;
                                                        if ($contador == 1) {
                                                            if ($TipoTabla == "Total") {
                                                                echo "</tbody></table>";
                                                                //echo "<div style='display:block;page-break-before:always;'></div>";
                                                                $TipoTabla = "";
                                                            }
                                                            echo "<label style='display: block;text-align-last: center;color: blue;font-weight: 750;'>" . $rowExamenCaracteristicas["Nombre"] . "</label>";

                                                            if ($ValidacionExamenesDosValores == "Si") {
                                                                echo Tabla($rowExamenCaracteristicas["En_Dos_Tablas"], "2");
                                                            } else {
                                                                echo Tabla($rowExamenCaracteristicas["En_Dos_Tablas"], "4");
                                                            }
                                                        } else {
                                                            
                                                            if (strrpos($rowExamenCaracteristicas["Nombre"], ":") != "") {
                                                                $arregloTabla[$contador - 1]["Nombre"] = "<b>" . $rowExamenCaracteristicas["Nombre"] . "</b>";
                                                            } else {
                                                                $arregloTabla[$contador - 1]["Nombre"] = $rowExamenCaracteristicas["Nombre"];
                                                            }
                                                            $arregloTabla[$contador - 1]["Resultado"] = str_replace(",", "<br>", $rowExamenCaracteristicas["Resultado"]);
                                                            $arregloTabla[$contador - 1]["Unidades_Referencia"] = $rowExamenCaracteristicas["Unidades_Referencia"];
                                                            $arregloTabla[$contador - 1]["Valores_Referencia"] = $rowExamenCaracteristicas["Valores_Referencia"];
                                                        }
                                                    }
                                                    //print_r($arregloTabla);
                                                    $cantidad = count($arregloTabla);
                                                    if ($rowExamenGeneral["En_Dos_Tablas"] == "Si") {
                                                        $CantidadDetalles = round(($cantidad / 2), 0, PHP_ROUND_HALF_DOWN);
                                                        for ($i = 1; $i <= $CantidadDetalles + 1; $i++) {

                                                            if ($ValidacionExamenesDosValores == "Si") {
                                                                echo "<tr>
                                                                <td width='20%'>" . $arregloTabla[$i]["Nombre"] . "</td>
                                                                <td width='10%'>" . $arregloTabla[$i]["Resultado"] . "</td>
                                                                <!--<td width='5%'>" . $arregloTabla[$i]["Unidades_Referencia"] . "</td>
                                                                <td class='valoresreferencia' width='15%'>" . $arregloTabla[$i]["Valores_Referencia"] . "</td>-->
                                                                <td width='20%'>" . $arregloTabla[$i + $CantidadDetalles]["Nombre"] . "</td>
                                                                <td width='10%'>" . $arregloTabla[$i + $CantidadDetalles]["Resultado"] . "</td>
                                                                <!--<td width='5%'>" . $arregloTabla[$i + $CantidadDetalles]["Unidades_Referencia"] . "</td>
                                                                <td class='valoresreferencia' width='15%'>" . $arregloTabla[$i + $CantidadDetalles]["Valores_Referencia"] . "</td>-->
                                                                </tr>";
                                                            } else {

                                                                if (($cantidad % 2) == 0) {
                                                                    echo "<tr>
                                                                            <td width='20%'>" . $arregloTabla[$i]["Nombre"] . "</td>
                                                                            <td width='10%'>" . $arregloTabla[$i]["Resultado"] . "</td>
                                                                            <td width='5%'>" . $arregloTabla[$i]["Unidades_Referencia"] . "</td>
                                                                            <!--<td class='valoresreferencia' width='15%'>" . $arregloTabla[$i]["Valores_Referencia"] . "</td>-->
                                                                            <td width='20%'>" . $arregloTabla[$i + $CantidadDetalles]["Nombre"] . "</td>
                                                                            <td width='10%'>" . $arregloTabla[$i + $CantidadDetalles]["Resultado"] . "</td>
                                                                            <td width='5%'>" . $arregloTabla[$i + $CantidadDetalles]["Unidades_Referencia"] . "</td>
                                                                            <!--<td class='valoresreferencia' width='15%'>" . $arregloTabla[$i + $CantidadDetalles]["Valores_Referencia"] . "</td>-->
                                                                        </tr>";

                                                                    foreach ($arregloTabla[$i] as $key => $value) {$arregloTabla[$i][$key] = "";}
                                                                    foreach ($arregloTabla[$i + $CantidadDetalles] as $key => $value) {$arregloTabla[$i + $CantidadDetalles][$key] = "";}
                                                                }
                                                                else{
                                                                    echo "<tr>
                                                                            <td width='20%'>" . $arregloTabla[$i]["Nombre"] . "</td>
                                                                            <td width='10%'>" . $arregloTabla[$i]["Resultado"] . "</td>
                                                                            <td width='5%'>" . $arregloTabla[$i]["Unidades_Referencia"] . "</td>
                                                                            <!--<td class='valoresreferencia' width='15%'>" . $arregloTabla[$i]["Valores_Referencia"] . "</td>-->
                                                                            <td width='20%'>" . $arregloTabla[$i + $CantidadDetalles + 1]["Nombre"] . "</td>
                                                                            <td width='10%'>" . $arregloTabla[$i + $CantidadDetalles + 1]["Resultado"] . "</td>
                                                                            <td width='5%'>" . $arregloTabla[$i + $CantidadDetalles + 1]["Unidades_Referencia"] . "</td>
                                                                            <!--<td class='valoresreferencia' width='15%'>" . $arregloTabla[$i + $CantidadDetalles + 1]["Valores_Referencia"] . "</td>-->
                                                                        </tr>";

                                                                    foreach ($arregloTabla[$i] as $key => $value) {$arregloTabla[$i][$key] = "";}
                                                                    foreach ($arregloTabla[$i + $CantidadDetalles + 1] as $key => $value) {$arregloTabla[$i + $CantidadDetalles + 1][$key] = "";}
                                                                }
                                                                
                                                            }

                                                        }

                                                        if ($ValidacionExamenesDosValores == "Si") {
                                                            echo MasDatos($rowExamenGeneral, "4");
                                                        } else {
                                                            echo MasDatos($rowExamenGeneral, "6");
                                                        }
                                                    } else {
                                                        for ($i = 1; $i <= $cantidad; $i++) {

                                                            if ($ValidacionExamenesDosValores == "Si") {
                                                                echo "<tr>
                                                                    <td width='35%'>" . $arregloTabla[$i]["Nombre"] . "</td>
                                                                    <td width='25%'>" . $arregloTabla[$i]["Resultado"] . "</td>
                                                                    <!--<td width='15%'>" . $arregloTabla[$i]["Unidades_Referencia"] . "</td>
                                                                    <td class='valoresreferencia' width='25%'>" . $arregloTabla[$i]["Valores_Referencia"] . "</td>-->
                                                                </tr>";
                                                            } else {
                                                                echo "<tr>
                                                                    <td width='35%'>" . $arregloTabla[$i]["Nombre"] . "</td>
                                                                    <td width='25%'>" . $arregloTabla[$i]["Resultado"] . "</td>
                                                                    <td width='15%'>" . $arregloTabla[$i]["Unidades_Referencia"] . "</td>
                                                                    <td class='valoresreferencia' width='25%'>" . $arregloTabla[$i]["Valores_Referencia"] . "</td>
                                                                </tr>";
                                                            }
                                                        }
                                                        if ($ValidacionExamenesDosValores == "Si") {
                                                            echo MasDatos($rowExamenGeneral, "2");
                                                        } else {
                                                            echo MasDatos($rowExamenGeneral, "4");
                                                        }
                                                    }
                                                    echo "</tbody></table>";
                                                    //echo "<div style='display:block;page-break-before:always;'></div>";
                                                }
                                            }

                                            if (count($arregloExamen) == $ContadorExamenes) {
                                                if ($TipoTabla != "") {
                                                    echo "</tbody></table>";
                                                    $TipoTabla = "";
                                                }
                                            }
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class='' style="padding-bottom:10px;">
                                <?php
                                $FirmaIngreso = funcionMaster($rowExamenCaracteristicas["Usuario_Resultados_Ingreso"], 'ID_Usuario', 'firma', 'config');
                                $DatosIngreso = funcionMaster($rowExamenCaracteristicas["Usuario_Resultados_Ingreso"], 'ID', 'NOMBRE_USUARIO', 'usuarios');
                                if ($rowExamenCaracteristicas["Usuario_Resultados_Ingreso"] != 0) {

                                    echo "<div class='col-6' align='center' style='font-size: 13px;'>
                                            <img src='{$Base}/FirmasReg/{$FirmaIngreso}' height='100' width='200'>
                                            <br>_______________________________
                                            <br><label style='position: relative;top: -22px;display: grid;'>$DatosIngreso<br>
                                            <b>*Responsable de la emision de los resultados de la prueba*</b></label> 
                                            </div>";
                                }
                                ?>

                                <?php
                                $FirmaValidador = funcionMaster($rowExamenCaracteristicas["Usuario_Valida_Resultados"], 'ID_Usuario', 'firma', 'config');
                                $DatosValidador = funcionMaster($rowExamenCaracteristicas["Usuario_Valida_Resultados"], 'ID', 'NOMBRE_USUARIO', 'usuarios');
                                if ($rowExamenCaracteristicas["Usuario_Valida_Resultados"] != 0) {

                                    echo "<div class='col-6' align='center' style='font-size: 13px;'>
                                            <img src='{$Base}/FirmasReg/{$FirmaValidador}' height='100' width='200'>
                                            <br>_______________________________
                                            <br><label style='position: relative;top: -22px;display: grid;'>$DatosValidador<br>
                                            <b>*Responsable de la validacion de los resultados de la prueba*</b></label>  
                                            </div>";
                                }
                                ?>
                            </div>
                            <!-- importante para que la ultima hoja quede bien el footer -->
                            <div style='display:block;page-break-before:always;'></div>
                        </div>

                    <?php endif; ?>

                    <?php if (isset($_GET["examenescategoria"])) : ?>

                        <!-- comienzo de la impresion de la informacion-->
                        <!--<img src="ImagenesFondoLaboratorio/fondolaboratorio.jpg" style="width:100%;height:90%;z-index: -1;position: fixed;">-->

                        <div class="box">
                            <div class="col-md-12">
                                <div class="box-body">

                                    <?php
                                    $TipoTabla = "";
                                    $ExamenesCategoria = explode(",",$_GET["examenescategoria"]);

                                    foreach ($ExamenesCategoria as $keyCategoria => $valueCategoria) {
                                        $queryList = mysqli_query($conn3, "SELECT examen_id,id FROM  LB_ExamenCargado WHERE idOperacion='$idOperacion' AND CaracteristicaExamen='No' AND id='{$valueCategoria}' GROUP BY examen_id ORDER BY id ASC");

                                        while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                            $categoriasarreglo[funcionMaster($rowMotorizado["examen_id"], 'id', 'categoria_id', 'LB_Examen')] = $categoriasarreglo[funcionMaster($rowMotorizado["examen_id"], 'id', 'categoria_id', 'LB_Examen')] . ',' . $rowMotorizado["id"];
                                        }
                                    }

                                    foreach ($categoriasarreglo as $key1 => $valueInicial) {

                                        echo "<label align='center' style='font-size:19px;width: 100%;font-weight: 750;'>" . funcionMaster($key1, 'id', 'Nombre', 'LB_Categoria') . "</label><br>";
                                        
                                        $TipoTabla = "";
                                        $ContadorExamenes = "0";
                                        $valueInicial = trim($valueInicial, ',');
                                        $arregloExamen = explode(",", $valueInicial);
                                        foreach ($arregloExamen as $key => $value) {

                                                $ContadorExamenes++;
                                                $examen = funcionMaster($value, 'id', 'examen_id', 'LB_ExamenCargado');

                                                $queryExamenGeneral = mysqli_query($conn3, "SELECT * FROM  LB_ExamenCargado WHERE idOperacion='$idOperacion' AND CaracteristicaExamen='No' and examen_id='$examen' ORDER BY id ASC");
                                                while ($rowExamenGeneral = mysqli_fetch_array($queryExamenGeneral)) {
                                                    $examen_id = $rowExamenGeneral["examen_id"];

                                                    $ValidacionExamenesDosValores = "";
                                                    foreach ($ExamenesDosValores as $key => $value) {
                                                        if ($value == $examen_id) {
                                                            $ValidacionExamenesDosValores = "Si";
                                                        }
                                                    }

                                                    $queryExamenCaracteristicas = mysqli_query($conn3, "SELECT * FROM  LB_ExamenCargado WHERE examen_id='$examen_id' AND idOperacion='$idOperacion' ORDER BY id ASC");
                                                    $NrowExamenCaracteristicas = mysqli_num_rows($queryExamenCaracteristicas);

                                                    if ($NrowExamenCaracteristicas == 1) {
                                                        $rowExamenCaracteristicas = mysqli_fetch_array($queryExamenCaracteristicas);

                                                        if ($TipoTabla == "" or $TipoTabla != "Total") {

                                                            if ($ValidacionExamenesDosValores == "Si") {
                                                                echo Tabla("No", "2");
                                                                $TipoTabla = "Total";
                                                            } else {
                                                                echo Tabla("No", "4");
                                                                $TipoTabla = "Total";
                                                            }
                                                        }

                                                        if ($ValidacionExamenesDosValores == "Si") {
                                                            echo "<tr>
                                                                <td width='35%'>" . $rowExamenCaracteristicas["Nombre"] . "</td>
                                                                <td width='25%'>" . str_replace(",", "<br>", $rowExamenCaracteristicas["Resultado"]) . "</td>
                                                                </tr>";

                                                            echo MasDatos($rowExamenGeneral, "2");
                                                        } else {
                                                            echo "<tr>
                                                                <td width='35%'>" . $rowExamenCaracteristicas["Nombre"] . "</td>
                                                                <td width='25%'>" . str_replace(",", "<br>", $rowExamenCaracteristicas["Resultado"]) . "</td>
                                                                <td width='15%'>" . $rowExamenCaracteristicas["Unidades_Referencia"] . "</td>
                                                                <td class='valoresreferencia' width='25%'>" . $rowExamenCaracteristicas["Valores_Referencia"] . "</td>
                                                                </tr>";

                                                            echo MasDatos($rowExamenGeneral, "4");
                                                        }
                                                    } else {
                                                        $contador = "0";
                                                        $arregloTabla = [];
                                                        while ($rowExamenCaracteristicas = mysqli_fetch_array($queryExamenCaracteristicas)) {
                                                            $contador++;
                                                            if ($contador == 1) {
                                                                if ($TipoTabla == "Total") {
                                                                    echo "</tbody></table>";
                                                                    //echo "<div style='display:block;page-break-before:always;'></div>";
                                                                    $TipoTabla = "";
                                                                }
                                                                echo "<label style='display: block;text-align-last: center;color: blue;font-weight: 750;'>" . $rowExamenCaracteristicas["Nombre"] . "</label>";

                                                                if ($ValidacionExamenesDosValores == "Si") {
                                                                    echo Tabla($rowExamenCaracteristicas["En_Dos_Tablas"], "2");
                                                                } else {
                                                                    echo Tabla($rowExamenCaracteristicas["En_Dos_Tablas"], "4");
                                                                }
                                                            } else {
                                                                $arregloTabla[$contador - 1]["Nombre"] = $rowExamenCaracteristicas["Nombre"];
                                                                $arregloTabla[$contador - 1]["Resultado"] = str_replace(",", "<br>", $rowExamenCaracteristicas["Resultado"]);
                                                                $arregloTabla[$contador - 1]["Unidades_Referencia"] = $rowExamenCaracteristicas["Unidades_Referencia"];
                                                                $arregloTabla[$contador - 1]["Valores_Referencia"] = $rowExamenCaracteristicas["Valores_Referencia"];
                                                            }
                                                        }
                                                        //print_r($arregloTabla);
                                                        $cantidad = count($arregloTabla);
                                                        if ($rowExamenGeneral["En_Dos_Tablas"] == "Si") {
                                                            $CantidadDetalles = round(($cantidad / 2), 0, PHP_ROUND_HALF_DOWN);
                                                            for ($i = 1; $i <= $CantidadDetalles + 1; $i++) {

                                                                if(strrpos($arregloTabla[$i]["Nombre"], ":")!=""){$arregloTabla[$i]["Nombre"]="<b>". $arregloTabla[$i]["Nombre"]."</b>";}
                                                                if(strrpos($arregloTabla[$i + $CantidadDetalles]["Nombre"], ":")!=""){$arregloTabla[$i + $CantidadDetalles]["Nombre"]="<b>". $arregloTabla[$i + $CantidadDetalles]["Nombre"]."</b>";}

                                                                if ($ValidacionExamenesDosValores == "Si") {
                                                                    echo "<tr>
                                                                    <td width='20%'>" . $arregloTabla[$i]["Nombre"] . "</td>
                                                                    <td width='10%'>" . $arregloTabla[$i]["Resultado"] . "</td>
                                                                    <!--<td width='5%'>" . $arregloTabla[$i]["Unidades_Referencia"] . "</td>
                                                                    <td class='valoresreferencia' width='15%'>" . $arregloTabla[$i]["Valores_Referencia"] . "</td>-->
                                                                    <td width='20%'>" . $arregloTabla[$i + $CantidadDetalles]["Nombre"] . "</td>
                                                                    <td width='10%'>" . $arregloTabla[$i + $CantidadDetalles]["Resultado"] . "</td>
                                                                    <!--<td width='5%'>" . $arregloTabla[$i + $CantidadDetalles]["Unidades_Referencia"] . "</td>
                                                                    <td class='valoresreferencia' width='15%'>" . $arregloTabla[$i + $CantidadDetalles]["Valores_Referencia"] . "</td>-->
                                                                    </tr>";
                                                                } else {

                                                                    if (($cantidad % 2) == 0) {
                                                                        echo "<tr>
                                                                                <td width='20%'>" . $arregloTabla[$i]["Nombre"] . "</td>
                                                                                <td width='10%'>" . $arregloTabla[$i]["Resultado"] . "</td>
                                                                                <td width='5%'>" . $arregloTabla[$i]["Unidades_Referencia"] . "</td>
                                                                                <!--<td class='valoresreferencia' width='15%'>" . $arregloTabla[$i]["Valores_Referencia"] . "</td>-->
                                                                                <td width='20%'>" . $arregloTabla[$i + $CantidadDetalles]["Nombre"] . "</td>
                                                                                <td width='10%'>" . $arregloTabla[$i + $CantidadDetalles]["Resultado"] . "</td>
                                                                                <td width='5%'>" . $arregloTabla[$i + $CantidadDetalles]["Unidades_Referencia"] . "</td>
                                                                                <!--<td class='valoresreferencia' width='15%'>" . $arregloTabla[$i + $CantidadDetalles]["Valores_Referencia"] . "</td>-->
                                                                            </tr>";

                                                                        foreach ($arregloTabla[$i] as $key => $value) {
                                                                            $arregloTabla[$i][$key] = "";
                                                                        }
                                                                        foreach ($arregloTabla[$i + $CantidadDetalles] as $key => $value) {
                                                                            $arregloTabla[$i + $CantidadDetalles][$key] = "";
                                                                        }
                                                                    } else {
                                                                        echo "<tr>
                                                                                <td width='20%'>" . $arregloTabla[$i]["Nombre"] . "</td>
                                                                                <td width='10%'>" . $arregloTabla[$i]["Resultado"] . "</td>
                                                                                <td width='5%'>" . $arregloTabla[$i]["Unidades_Referencia"] . "</td>
                                                                                <!--<td class='valoresreferencia' width='15%'>" . $arregloTabla[$i]["Valores_Referencia"] . "</td>-->
                                                                                <td width='20%'>" . $arregloTabla[$i + $CantidadDetalles + 1]["Nombre"] . "</td>
                                                                                <td width='10%'>" . $arregloTabla[$i + $CantidadDetalles + 1]["Resultado"] . "</td>
                                                                                <td width='5%'>" . $arregloTabla[$i + $CantidadDetalles + 1]["Unidades_Referencia"] . "</td>
                                                                                <!--<td class='valoresreferencia' width='15%'>" . $arregloTabla[$i + $CantidadDetalles + 1]["Valores_Referencia"] . "</td>-->
                                                                            </tr>";

                                                                        foreach ($arregloTabla[$i] as $key => $value) {
                                                                            $arregloTabla[$i][$key] = "";
                                                                        }
                                                                        foreach ($arregloTabla[$i + $CantidadDetalles + 1] as $key => $value) {
                                                                            $arregloTabla[$i + $CantidadDetalles + 1][$key] = "";
                                                                        }
                                                                    }
                                                                }

                                                            }

                                                            if ($ValidacionExamenesDosValores == "Si") {
                                                                echo MasDatos($rowExamenGeneral, "4");
                                                            } else {
                                                                echo MasDatos($rowExamenGeneral, "6");
                                                            }
                                                        } else {
                                                            for ($i = 1; $i <= $cantidad; $i++) {

                                                                if ($ValidacionExamenesDosValores == "Si") {
                                                                    echo "<tr>
                                                                        <td width='35%'>" . $arregloTabla[$i]["Nombre"] . "</td>
                                                                        <td width='25%'>" . $arregloTabla[$i]["Resultado"] . "</td>
                                                                        <!--<td width='15%'>" . $arregloTabla[$i]["Unidades_Referencia"] . "</td>
                                                                        <td class='valoresreferencia' width='25%'>" . $arregloTabla[$i]["Valores_Referencia"] . "</td>-->
                                                                    </tr>";
                                                                } else {
                                                                    echo "<tr>
                                                                        <td width='35%'>" . $arregloTabla[$i]["Nombre"] . "</td>
                                                                        <td width='25%'>" . $arregloTabla[$i]["Resultado"] . "</td>
                                                                        <td width='15%'>" . $arregloTabla[$i]["Unidades_Referencia"] . "</td>
                                                                        <td class='valoresreferencia' width='25%'>" . $arregloTabla[$i]["Valores_Referencia"] . "</td>
                                                                    </tr>";
                                                                }
                                                            }
                                                            if ($ValidacionExamenesDosValores == "Si") {
                                                                echo MasDatos($rowExamenGeneral, "2");
                                                            } else {
                                                                echo MasDatos($rowExamenGeneral, "4");
                                                            }
                                                        }
                                                        echo "</tbody></table>";
                                                        //echo "<div style='display:block;page-break-before:always;'></div>";
                                                    }
                                                }
                                            

                                            if (count($arregloExamen) == $ContadorExamenes) {
                                                if ($TipoTabla != "") {
                                                    echo "</tbody></table>";
                                                    $TipoTabla = "";
                                                }
                                            }
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class='' style="padding-bottom:10px;">
                                <?php
                                $FirmaIngreso = funcionMaster($rowExamenCaracteristicas["Usuario_Resultados_Ingreso"], 'ID_Usuario', 'firma', 'config');
                                $DatosIngreso = funcionMaster($rowExamenCaracteristicas["Usuario_Resultados_Ingreso"], 'ID', 'NOMBRE_USUARIO', 'usuarios');
                                if ($rowExamenCaracteristicas["Usuario_Resultados_Ingreso"] != 0) {

                                    echo "<div class='col-6' align='center' style='font-size: 13px;'>
                                            <img src='{$Base}/FirmasReg/{$FirmaIngreso}' height='100' width='200'>
                                            <br>_______________________________
                                            <br><label style='position: relative;top: -22px;display: grid;'>$DatosIngreso<br>
                                            <b>*Responsable de la emision de los resultados de la prueba*</b></label> 
                                            </div>";
                                }
                                ?>

                                <?php
                                $FirmaValidador = funcionMaster($rowExamenCaracteristicas["Usuario_Valida_Resultados"], 'ID_Usuario', 'firma', 'config');
                                $DatosValidador = funcionMaster($rowExamenCaracteristicas["Usuario_Valida_Resultados"], 'ID', 'NOMBRE_USUARIO', 'usuarios');
                                if ($rowExamenCaracteristicas["Usuario_Valida_Resultados"] != 0) {

                                    echo "<div class='col-6' align='center' style='font-size: 13px;'>
                                            <img src='{$Base}/FirmasReg/{$FirmaValidador}' height='100' width='200'>
                                            <br>_______________________________
                                            <br><label style='position: relative;top: -22px;display: grid;'>$DatosValidador<br>
                                            <b>*Responsable de la validacion de los resultados de la prueba*</b></label>  
                                            </div>";
                                }
                                ?>
                            </div>
                            <!-- importante para que la ultima hoja quede bien el footer -->
                            <div style='display:block;page-break-before:always;'></div>
                        </div>

                    <?php endif; ?>

                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>

<style>
    .float-button-container {
        position: fixed;
        right: 20px;
        bottom: 20px;
        height: 100px;
        width: 100px;
        cursor: pointer;
    }

    .open-button {
        position: absolute;
        background: #0fa;
        height: 100px;
        width: 100px;
        bottom: 0;
        transform: scale(0.8, 0.8);
        border-radius: 100px;
        z-index: 999;
        transition: all 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    }

    .open-button:before,
    .item01:before,
    .item02:before,
    .item03:before,
    .item04:before {
        position: absolute;
        font-family: "Font Awesome 6 Free";
        font-size: 2rem;
        top: 50%;
        left: 50%;
        color: black;
        transform: translate(-50%, -50%);
    }

    .item01,
    .item02,
    .item03,
    .item04 {
        position: absolute;
        background: #fff;
        height: 100px;
        width: 100px;
        border-radius: 100px;
        bottom: 0;
        transform: scale(0.4, 0.4);
        transition: all 0.3s cubic-bezier(0.68, -0.15, 0.265, 1.15);
    }

    .item01:hover,
    .item02:hover,
    .item03:hover,
    .item04:hover {
        background: #0fa;
    }

    .float-button-container:hover {
        height: 100%;
    }

    .float-button-container:hover .open-button {
        transform: scale(1, 1);
    }

    .float-button-container:hover .item01,
    .float-button-container:hover .item02,
    .float-button-container:hover .item03,
    .float-button-container:hover .item04 {
        transform: scale(0.6, 0.6);
    }

    .float-button-container:hover .item01 {
        bottom: 90px;
    }

    .float-button-container:hover .item02 {
        bottom: 160px;
    }

    .float-button-container:hover .item03 {
        bottom: 230px;
    }

    .float-button-container:hover .item04 {
        bottom: 300px;
    }
</style>
<link rel="stylesheet" href="plugins/FontAwesomeK Free 6.0/css/all.css">
<div class="float-button-container">
    <div class="open-button fas fa-question">
    </div>
    <a href="#" alt="Imprimir" title="Imprimir">
        <div class="item01 fas fa-print" onclick="window.print()"></div>
    </a>
    <?php $direccion = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . "&error=br"; ?>
    <a href="<?= $direccion; ?>" alt="Si Presenta error Oprima aqui" title="Si Presenta error Oprima aqui">

        <div class="item02 fas fa-exclamation"></div>
    </a>
</div>
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

<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>

<script type="text/javascript">
    /*
    var impSeparador = 0;
    var imprimir = "";

    function escalar(prueba) {
        let height = document.querySelectorAll(".ContenidoImpresion");
        console.log(prueba);
        let maxHight = (prueba == 1 ? 420 : 500);
        console.log(maxHight);
        console.log("------------------");
        // let maxHight = 440;
        if (height[height.length - 1].offsetHeight >= maxHight) {
            console.log(height[height.length - 1].offsetHeight);
            imprimir = '';
            imprimir += '                 </div>';
            imprimir += '                 <div class="saltopagina"></div>';
            imprimir += '               <div class="ContenidoImpresion">';
            impSeparador = 1;
        }
        // console.log(document.getElementById("comprobar" + prueba).clientHeight);
    }

    escalar(1);


    let elem = document.querySelectorAll('.lead');
    elem.forEach(elem1 => {
        var rect = elem1.getBoundingClientRect();
        console.log("x: " + rect.x);
        console.log("y: " + rect.y);
    });*/
</script>



<?php
/*
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/Impresion/estructura_impresion.css">
    <link rel="stylesheet" href="css/Impresion/bootstrap_5.1.1.min.css">
    <link rel="stylesheet" href="css/Impresion/bootstrap-print.css" media="print">

    <script type="text/javascript" src="plugins/QRK/qrcode.js"></script>
    <script type="text/javascript" src="plugins/QRK/sample.js"></script>

    <style>
        @media print {
            .QuitarBordes {
                border-left-style: hidden;
                border-right-style: hidden;
            }
        }

        p {
            margin: 0;
        }

        .page-header,
        .page-header-space {
            height: 380px;
        }

        .page-footer,
        .page-footer-space {
            height: 280px;
        }


        @media print {
            .bg-danger {
                background-color: #f2dede !important;
            }

            .table td {
                background-color: transparent !important;
            }
        }
    </style>
</head>

<body>



    <div class="page-header ">
        <!-- height: 380px; es la altura maxima que admite el header para que funcione correctamente -->
        <div  style="text-align: center;background-image: url('ImagenesFondoLaboratorio/headerlaaboratorio.jpg') !important;border-bottom: 0;background-color:white; background-repeat:no-repeat;background-size:100% 100%;height: 250px;">
        </div>

        <?php echo $Datos_Personales; ?>

        <button type="button" onClick="window.print()" style='height: 50px;position: absolute;background: rgb(250,235,215);background: -moz-radial-gradient(circle, rgba(250,235,215,1) 0%, rgba(60,141,176,1) 100%);background: -webkit-radial-gradient(circle, rgba(250,235,215,1) 0%, rgba(60,141,176,1) 100%);background: radial-gradient(circle, rgba(250,235,215,1) 0%, rgba(60,141,176,1) 100%);filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=" #faebd7",endColorstr="#3c8db0" ,GradientType=1);'>
            IMPRIMIR!
        </button>
    </div>

    <div class="page-footer">
        <!-- height: 630px; es la altura maxima que admite el footer para que funcione correctamente -->
        <?php
        $direccion = urlencode("http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
        //echo $direccion;
        echo '<img src="https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=' . $direccion . '&choe=UTF-8" title="Link to Google.com" />';
        ?>
        <div style="height: 170px;text-align: left;background-image: url('ImagenesFondoLaboratorio/footerlaboratorio.jpg') !important;border-top: 0;background-color:white; background-repeat:no-repeat;background-size:100% 100%;">
        </div>
    </div>

    <table style="width:100%">

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
                <td style="font-weight: 500;font-size: 20px;">

                    <div class="page">
                        <?php if (!isset($_GET["examenes"])) : ?>
                            <!-- comienzo de la impresion de la informacion-->


                            <!--<img src="ImagenesFondoLaboratorio/fondolaboratorio.jpg" style="width:100%;height:90%;z-index: -1;position: fixed;">-->

                            <div class="box">
                                <div class="col-md-12">
                                    <div class="box-body">
                                        <?php
                                        $TipoTabla = "";
                                        $queryExamenGeneral = mysqli_query($conn3, "SELECT * FROM  LB_ExamenCargado WHERE idOperacion='$idOperacion' AND CaracteristicaExamen='No' GROUP BY examen_id ORDER BY id ASC");
                                        while ($rowExamenGeneral = mysqli_fetch_array($queryExamenGeneral)) {
                                            $examen_id = $rowExamenGeneral["examen_id"];

                                            $queryExamenCaracteristicas = mysqli_query($conn3, "SELECT * FROM  LB_ExamenCargado WHERE examen_id='$examen_id' AND idOperacion='$idOperacion' ORDER BY id ASC");
                                            $NrowExamenCaracteristicas = mysqli_num_rows($queryExamenCaracteristicas);

                                            if ($NrowExamenCaracteristicas == 1) {
                                                $rowExamenCaracteristicas = mysqli_fetch_array($queryExamenCaracteristicas);

                                                if ($TipoTabla == "" or $TipoTabla != "Total") {

                                                    echo "<table id='1' class='table table-striped' style='font-size:17px;vertical-align: middle;width:100%;height:100%'>
                                                <thead>
                                                    <tr>
                                                        <th scope='col' width='5%'>Analisis</th>
                                                        <th scope='col' width='1%'>Resultado</th>
                                                        <th scope='col' width='1%'>Unidades de Referencia</th>
                                                        <th scope='col' width='3%'>Valor de Referencia</th>
                                                    </tr>
                                                </thead>
                                                <tbody>";
                                                    $TipoTabla = "Total";
                                                }

                                                echo "<tr>
                                                <td>" . $rowExamenCaracteristicas["Nombre"] . "</td>
                                                <td>" . $rowExamenCaracteristicas["Resultado"] . "</td>
                                                <td>" . $rowExamenCaracteristicas["Unidades_Referencia"] . "</td>
                                                <td class='valoresreferencia'>" . $rowExamenCaracteristicas["Valores_Referencia"] . "</td>
                                            </tr>";
                                            } else {
                                                $contador = "0";
                                                echo "<div style='display:block;page-break-before:always;'></div>";
                                                while ($rowExamenCaracteristicas = mysqli_fetch_array($queryExamenCaracteristicas)) {
                                                    $contador++;
                                                    if ($contador == 1) {
                                                        if ($TipoTabla == "Total") {
                                                            echo "</tbody></table>";
                                                        }
                                                        echo "<label style='display: block;text-align-last: center;color: blue;font-weight: 750;'>" . $rowExamenCaracteristicas["Nombre"] . " - {$NrowExamenCaracteristicas} </label>";

                                                        echo "<table id='2' class='table table-striped' style='font-size:17px;vertical-align: middle;width:100%;height:100%'>
                                                                <thead>
                                                                    <tr>
                                                                        <th scope='col' width='5%'>Analisis</th>
                                                                        <th scope='col' width='1%'>Resultado</th>
                                                                        <th scope='col' width='1%'>Unidades de Referencia</th>
                                                                        <th scope='col' width='3%'>Valor de Referencia</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>";
                                                        $TipoTabla = "";
                                                    }

                                                    echo "<tr>
                                                        <td>" . $rowExamenCaracteristicas["Nombre"] . "</td>
                                                        <td>" . $rowExamenCaracteristicas["Resultado"] . "</td>
                                                        <td>" . $rowExamenCaracteristicas["Unidades_Referencia"] . "</td>
                                                        <td class='valoresreferencia'>" . $rowExamenCaracteristicas["Valores_Referencia"] . "</td>
                                                    </tr>";
                                                }
                                                echo "</tbody></table>";
                                            }
                                        }

                                        ?>
                                    </div>
                                </div>
                            </div>

                        <?php endif; ?>
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
*/ ?>