<?php
include 'funciones/conn3.php';
include 'funciones/funciones.php';
include 'funciones/funcionesUtilidades.php';

$idOperacion = $_GET['idOperacion'];

$queryList = mysqli_query($conn3, "SELECT * FROM  sOperacionInv where idOperacion = $idOperacion");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $idOperacion      = $rowMotorizado['idOperacion'];
    //$numeroDoc      = $rowMotorizado['numeroDoc'];
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
    $pagado = '<div align="center"><img src="' . $Base . '/pagado.png" height="10%" width="15%"></div>';
}

function Edad_Paciente($fecha_nacimiento)
{
    $nacimiento = new DateTime($fecha_nacimiento);
    $ahora = new DateTime(date("Y-m-d"));
    $diferencia = $ahora->diff($nacimiento);
    return $diferencia->format("%y");
}

$FechaHora = funcionMaster($idOperacion, 'idOperacion', 'Fecha', 'LB_ExamenCargado');
$Fecha = explode(" ", $FechaHora);
$Datos_Personales = "<table class='table' style='width: 100%;margin-top: 3px;'>
                            <tr>
                                <td width='35%'>
                                    <b>Nombre:</b> {$nombre_cliente}
                                </td>
                                <td width='30%'>
                                    <b>Documento:</b> {$CODI_CLIENTE}
                                </td>

                                <td width='20%'>
                                    <b>F.Nacimiento:</b> {$fechaNacimiento}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>EPS:</b> {$entidadSalud}
                                </td>
                                <td>
                                    <b>Residencia:</b> {$direccion_cliente}
                                </td>
                                <td>
                                    <b>Edad:</b> " . Edad_Paciente($fechaNacimiento) . " Años
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Telefono:</b> {$celular_cliente}
                                </td>

                                <td>
                                    <b>Genero:</b> {$genero}
                                </td>

                                <td>
                                    <b>Fecha:</b> {$Fecha[0]} {$Fecha[1]}
                                </td>
                            </tr>
                        </table>";
$Subtitulo = "
            <div class='col-md-12'>
                <h2 style='text-align-last: center;margin: 0px;font-size: 1.5rem;padding-top: 12px;'> Orden de Laboratorio # {$idOperacion}</h2>
            </div>
            <div class='col-md-12'>
                <hr style='margin-top:0px;margin-bottom: 3px;'>
            </div>";

function MasDatos($rowMotorizado, $Columnas)
{
    if ($rowMotorizado["Metodo"] != "") {
        echo "<tr><td colspan='{$Columnas}'><b> Metodo : </b>" . $rowMotorizado["Metodo"] . "</td></tr>";
    }
    if ($rowMotorizado["Observaciones"] != "") {
        echo "<tr><td colspan='{$Columnas}'><b> Observaciones :</b> <br>" . $rowMotorizado["Observaciones"] . "</td></tr>";
    }
}

?>

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

        .table>:not(caption)>*>* {
            padding: .1rem .5rem;
        }

        .page-footer,
        .page-footer-space {
            height: 195px;
        }

        .page{
            font-size: 12px!important;
        }
    </style>
</head>

<body>

    <div class="page-header row" style="text-align: center">
        <div class="col-4" align="left"><?php echo $Logo ?></div>
        <div class="col-4">
            <table style="width:100%;zoom:0.8;">
                <tr>
                    <td style="width:50%;text-align-last: center;width:33%;">
                        <div id="qr_examen<?php echo $key; ?>"></div>
                        <label style="font-size:13px"> https://medicalsoftplus.com/ec583/verLaboratorios</label><br>
                    </td>
                    <td style="width:50%;text-align-last: center;width:33%;">
                        <div id="qr_codigofuncionamiento<?php echo $key; ?>"></div>
                        <label style="font-size:13px"> Codigo de Funcionamiento </label>
                    </td>
                </tr>
            </table>
            <?php $direccion = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>
            <script>
                document.getElementById('qr_examen<?php echo $key; ?>').innerHTML = create_qrcode("<?php echo $direccion; ?>", "10", "L", "Byte", "default");
                document.getElementById('qr_codigofuncionamiento<?php echo $key; ?>').innerHTML = create_qrcode("CodigoFuncionamiento", "10", "L", "Byte", "default");
            </script>
        </div>
        <div class="col-4" style="font-size: 15px;text-align: right;"><?php echo nl2br($header) ?></div>

        <button type="button" onClick="window.print()" style='background: rgb(250,235,215);background: -moz-radial-gradient(circle, rgba(250,235,215,1) 0%, rgba(60,141,176,1) 100%);background: -webkit-radial-gradient(circle, rgba(250,235,215,1) 0%, rgba(60,141,176,1) 100%);background: radial-gradient(circle, rgba(250,235,215,1) 0%, rgba(60,141,176,1) 100%);filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=" #faebd7",endColorstr="#3c8db0" ,GradientType=1);'>
            IMPRIMIR!
        </button>
    </div>

    <div class="page-footer">

        <div class='row' style="zoom:0.85">
            <?php

            $Usuario_Resultados_Ingreso = funcionMaster($idOperacion, 'idOperacion', 'Usuario_Resultados_Ingreso', 'LB_ExamenCargado');
            $Usuario_Valida_Resultados = funcionMaster($idOperacion, 'idOperacion', 'Usuario_Valida_Resultados', 'LB_ExamenCargado');

            $FirmaIngreso = funcionMaster($Usuario_Resultados_Ingreso, 'ID_Usuario', 'firma', 'config');
            $DatosIngreso = funcionMaster($Usuario_Resultados_Ingreso, 'ID', 'NOMBRE_USUARIO', 'usuarios');
            $especialidadIngreso = funcionMaster($Usuario_Resultados_Ingreso, 'ID', 'especialidad', 'usuarios');
            $CodigoEspecialidadIngreso = funcionMaster($Usuario_Resultados_Ingreso, 'ID', 'CodigoEspecialidad', 'usuarios');
            if ($Usuario_Resultados_Ingreso != 0) {

                echo "<div class='col-6' align='center' style='font-size: 13px;'>
                <img src='{$Base}/FirmasReg/{$FirmaIngreso}' style='width:200px;height:100px;margin-top: 10px;'>
                <br>_______________________________<br>
                <br><label style='position: relative;top: -22px;display: grid;'>$DatosIngreso<br>
                <br><label style='position: relative;top: -22px;display: grid;'>$especialidadIngreso<br>
                <br><label style='position: relative;top: -22px;display: grid;'>$CodigoEspecialidadIngreso<br>
                
                
                <b>*Responsable de la validacion de los resultados de la prueba*</b></label>  
                </div>";
            }
            /*if ($Usuario_Resultados_Ingreso == "2") {

                echo "<div class='col-6' align='center' style='font-size: 13px;'>
                                                <img src='{$Base}/FirmasReg/{$FirmaIngreso}' style='width:200px;height:100px;margin-top: 10px;'>
                                                <br>_______________________________<br>
                                                <br><label style='position: relative;top: -22px;display: grid;'>$DatosIngreso<br>
                                                <br><label style='position: relative;top: -22px;display: grid;'>Biologa<br>
                                                <br><label style='position: relative;top: -22px;display: grid;'>C.B.P 9131<br>
                                                <b>*Responsable de la validacion de los resultados de la prueba*</b></label>  
                                                </div>";
            } else {
                echo "<div class='col-6' align='center' style='font-size: 13px;'>
                                                <img src='{$Base}/FirmasReg/{$FirmaIngreso}' style='width:200px;height:100px;margin-top: 10px;'>
                                                <br>_______________________________<br>
                                                <br><label style='position: relative;top: -22px;display: grid;'>$DatosIngreso<br>
                                                <br><label style='position: relative;top: -22px;display: grid;'>$especialidadIngreso<br>
                                                <br><label style='position: relative;top: -22px;display: grid;'>C.B.P $nitIngreso<br>
                                                
                                                
                                                <b>*Responsable de la validacion de los resultados de la prueba*</b></label>  
                                                </div>";
            }*/

            $FirmaValidador = funcionMaster($Usuario_Valida_Resultados, 'ID_Usuario', 'firma', 'config');
            $DatosValidador = funcionMaster($Usuario_Valida_Resultados, 'ID', 'NOMBRE_USUARIO', 'usuarios');
            $especialidadValidador = funcionMaster($Usuario_Valida_Resultados, 'ID', 'especialidad', 'usuarios');
            $CodigoEspecialidadValidador = funcionMaster($Usuario_Valida_Resultados, 'ID', 'CodigoEspecialidad', 'usuarios');
            if ($Usuario_Valida_Resultados != 0) {

                echo "<div class='col-6' align='center' style='font-size: 13px;'>
                                                <img src='{$Base}/FirmasReg/{$FirmaValidador}' style='width:200px;height:100px;margin-top: 10px;'>
                                                <br>_______________________________<br>
                                                <br><label style='position: relative;top: -22px;display: grid;'>$DatosValidador<br>
                                                <br><label style='position: relative;top: -22px;display: grid;'>$especialidadValidador<br>
                                                <br><label style='position: relative;top: -22px;display: grid;'>$CodigoEspecialidadValidador<br>
                                                
                                                
                                                <b>*Responsable de la validacion de los resultados de la prueba*</b></label>  
                                                </div>";
            }
           /* if ($Usuario_Valida_Resultados == "2") {

                echo "<div class='col-6' align='center' style='font-size: 13px;'>
                                                <img src='{$Base}/FirmasReg/{$FirmaValidador}' style='width:200px;height:100px;margin-top: 10px;'>
                                                <br>_______________________________<br>
                                                <br><label style='position: relative;top: -22px;display: grid;'>$DatosValidador<br>
                                                <br><label style='position: relative;top: -22px;display: grid;'>Biologa<br>
                                                <br><label style='position: relative;top: -22px;display: grid;'>C.B.P 9131<br>
                                                <b>*Responsable de la validacion de los resultados de la prueba*</b></label>  
                                                </div>";
            } else {
                echo "<div class='col-6' align='center' style='font-size: 13px;'>
                                                <img src='{$Base}/FirmasReg/{$FirmaValidador}' style='width:200px;height:100px;margin-top: 10px;'>
                                                <br>_______________________________<br>
                                                <br><label style='position: relative;top: -22px;display: grid;'>$DatosValidador<br>
                                                <br><label style='position: relative;top: -22px;display: grid;'>$especialidadValidador<br>
                                                <br><label style='position: relative;top: -22px;display: grid;'>$nitValidador<br>
                                                
                                                
                                                <b>*Responsable de la validacion de los resultados de la prueba*</b></label>  
                                                </div>";
            }*/
            ?>
        </div>
        <div class='row' style="zoom: 0.8;top: -70px;place-content: center;position: relative;">
            <?php echo nl2br($pieF); ?>
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
                <td>

                    <?php if (!isset($_GET["examenes"])) : ?>
                        <!-- comienzo de la impresion de la informacion-->
                        <div class="page">

                            <?php echo $Subtitulo; ?>

                            <?php echo $Datos_Personales; ?>

                            <div class="box">
                                <div class="col-md-12">

                                    <div class="box-body">

                                        <?php
                                        $queryList = mysqli_query($conn3, "SELECT id FROM  LB_ExamenCargado WHERE idOperacion='$idOperacion' AND CaracteristicaExamen='No' GROUP BY examen_id ORDER BY id ASC");
                                        while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                            $examenes .= $rowMotorizado["id"] . ',';
                                        }
                                        $examenes = trim($examenes, ',');

                                        $examenes = explode(",", $examenes);
                                        $Tabla = "No";
                                        foreach ($examenes as $key => $value) {
                                            $TipoTabla = funcionMaster($value, 'id', 'En_Dos_Tablas', 'LB_ExamenCargado');
                                            $examen = funcionMaster($value, 'id', 'examen_id', 'LB_ExamenCargado');

                                            if ($TipoTabla == "Si") {
                                                $Filtro = "width:50%;float:left;";
                                                $queryList = mysqli_query($conn3, "SELECT examen_id,count(*) as CantidadDetalles FROM LB_ExamenCargado WHERE idOperacion='$idOperacion' AND examen_id='$examen' GROUP BY examen_id ORDER BY id ASC");
                                                while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                                    $CantidadDetalles = round(($rowMotorizado["CantidadDetalles"] / 2), 0, PHP_ROUND_HALF_UP);
                                                }
                                                $Tabla = "No";
                                            } else {
                                                $Filtro = "width:100%;";
                                            }
                                        ?>
                                            <?php
                                            if ($Tabla == $TipoTabla) :
                                                $Tabla = "Si";
                                            ?>
                                                <table id="Tabla_Examenes" class="table table-bordered table-striped" style="font-size:12px;vertical-align: middle;<?php echo $Filtro; ?>">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col" width="20%">Analisis</th>
                                                            <th scope="col" width="7%">Resultado</th>

                                                            <th scope="col" width="7%">Unidades de Referencia</th>
                                                            <th scope="col" width="16%">Valor de Referencia</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                endif;
                                                    ?>
                                                    <?php

                                                    $queryList = mysqli_query($conn3, "SELECT * FROM  LB_ExamenCargado WHERE idOperacion='$idOperacion' AND examen_id='$examen' ORDER BY id ASC");
                                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                                        $contador++;

                                                        $id = $rowMotorizado['id'];
                                                        $Resultado = $rowMotorizado['Resultado'];
                                                        $Nombre = $rowMotorizado['Nombre'];
                                                        $Metodo = $rowMotorizado['Metodo'];
                                                        $Observaciones = $rowMotorizado['Observaciones'];
                                                        $Unidades_Referencia = $rowMotorizado['Unidades_Referencia'];
                                                        $Valores_Referencia = PonerComillasyOtrosCaracteres($rowMotorizado['Valores_Referencia']);
                                                        $CaracteristicaExamen = $rowMotorizado['CaracteristicaExamen'];
                                                        $Resultado = $rowMotorizado['Resultado'];
                                                        $Observaciones = $rowMotorizado['Observaciones'];

                                                        //////////////////////////////////////////////
                                                        /*
                                                        $Valores_Referencia_Filtrado = $rowMotorizado['Valores_Referencia_Filtrado'];
                                                        if ($Valores_Referencia_Filtrado != "") {
                                                            $Valores_Referencia = "";
                                                            $listado = json_decode($Valores_Referencia_Filtrado, true);
                                                            foreach ($listado as $key => $value) {

                                                                if ($value["Valor_Referencia_Minima_Historia"] != "" and $value["Valor_Referencia_Maxima_Historia"] != "") {
                                                                    $Valores_Referencia .= $value['Nombre'] . ": [ " . $value["Valor_Referencia_Minima_Historia"] . " - " . $value["Valor_Referencia_Maxima_Historia"] . " ] <br>";
                                                                }
                                                            }
                                                        }*/
                                                        $Valores_Referencia_Filtrado_Visual = $rowMotorizado['Valores_Referencia_Filtrado_Visual'];
                                                        if ($Valores_Referencia_Filtrado_Visual != "") {
                                                            $Valores_Referencia = $Valores_Referencia_Filtrado_Visual;
                                                        } else {
                                                            $Valores_Referencia = PonerComillasyOtrosCaracteres($rowMotorizado['Valores_Referencia']);
                                                        }

                                                        $Arreglo_Mas_Informacion = json_decode($rowMotorizado['Arreglo_Mas_Informacion'], true);
                                                        foreach ($Arreglo_Mas_Informacion as $key => $value) {
                                                            if ($key == "Campo_Resultado" and $value == "Subtitulo") {
                                                                $Resultado = "No Aplica Resultado";
                                                            }
                                                        }
                                                        ///////////////////////////////////////////////

                                                        $examen_id = $rowMotorizado['examen_id'];
                                                        $idOperacion = $rowMotorizado['idOperacion'];

                                                        $queryList1 = mysqli_query($conn3, "SELECT examen_id, COUNT(*) as Cantidad FROM LB_ExamenCargado where examen_id='$examen_id' and idOperacion = '$idOperacion' GROUP BY examen_id");
                                                        while ($rowMotorizado1 = mysqli_fetch_array($queryList1)) {
                                                            $CantidadCaracteristicas = $rowMotorizado1["Cantidad"];
                                                        }

                                                        $categoria_id = funcionMaster($examen_id, 'id', 'categoria_id', 'LB_Examen');
                                                        if ($categoria_id == '6') {
                                                            $CodigoBarrasCovid = "Si";
                                                        }

                                                        if ($Resultado == "No Aplica Resultado") {
                                                            $Titulo = $Nombre;

                                                            if ($Metodo != "") {
                                                                $MetodoParaExamenConCaractersiticas = $Metodo;
                                                            }
                                                            if ($Observaciones != "") {
                                                                $ObservacionesParaExamenConCaractersiticas = $Observaciones;
                                                            }

                                                            echo "<tr><td colspan='5' align='center'><b style='font-size: 22px;'>$Titulo</b></td></tr>";
                                                        } else if ($CaracteristicaExamen == "No" and $Resultado != "") {
                                                            //echo "<tr><td colspan='5' align='center'><b style='font-size: 22px;'>$Nombre</b></td></tr>";
                                                            echo "<tr>
                                                            <td>$Nombre</td>
                                                            <td>$Resultado</td>
                                                            <td>$Unidades_Referencia</td>
                                                            <td class='valoresreferencia'>$Valores_Referencia</td>
                                                            </tr>";
                                                            // <td>$Observaciones</td>
                                                        } else {

                                                            if ($Resultado != "") {
                                                                echo "<tr>
                                                                <td>$Nombre</td>
                                                                <td>$Resultado</td>
                                                                <td>$Unidades_Referencia</td>
                                                                <td class='valoresreferencia'>$Valores_Referencia</td>
                                                                </tr>";
                                                            }

                                                            // <td>$Observaciones</td>
                                                        }

                                                        if (($CantidadCaracteristicas == $contador) and ($tabladoble == 1)) {
                                                            if ($MetodoParaExamenConCaractersiticas != "") {
                                                                $Metodo = $MetodoParaExamenConCaractersiticas;
                                                                $MetodoParaExamenConCaractersiticas = "";
                                                            }
                                                            if ($ObservacionesParaExamenConCaractersiticas != "") {
                                                                $Observaciones = $ObservacionesParaExamenConCaractersiticas;
                                                                $ObservacionesParaExamenConCaractersiticas = "";
                                                            }

                                                            echo "</tbody>
                                                                </table>
                                                                <table id='Tabla_Examenes' class='table table-bordered table-striped' style='width:100%;font-size:12px;vertical-align: middle;position: relative;top: -17px;'>";
                                                            if ($Metodo != "" and $Resultado != "") {
                                                                echo "<tr><td colspan='4'><b style='font-size: 12px;'> Metodo : </b>$Metodo</td></tr>";
                                                            }
                                                            if ($Observaciones != "" and $Resultado != "") {
                                                                echo "<tr><td colspan='4'><b style='font-size: 12px;'> Observaciones : </b>$Observaciones</td></tr>";
                                                            }
                                                            $tabladoble = "0";
                                                            $contador = "0";
                                                        } elseif ($CantidadCaracteristicas == $contador) {
                                                            if ($MetodoParaExamenConCaractersiticas != "") {
                                                                $Metodo = $MetodoParaExamenConCaractersiticas;
                                                                $MetodoParaExamenConCaractersiticas = "";
                                                            }
                                                            if ($ObservacionesParaExamenConCaractersiticas != "") {
                                                                $Observaciones = $ObservacionesParaExamenConCaractersiticas;
                                                                $ObservacionesParaExamenConCaractersiticas = "";
                                                            }

                                                            if ($Metodo != "" and $Resultado != "") {
                                                                echo "<tr><td colspan='4'><b style='font-size: 12px;'> Metodo :</b>$Metodo</td></tr>";
                                                            }
                                                            if ($Observaciones != "" and $Resultado != "") {
                                                                echo "<tr><td colspan='4'><b style='font-size: 12px;'> Observaciones : </b>$Observaciones</td></tr>";
                                                            }
                                                            $contador = "0";
                                                        }

                                                        if ($CantidadDetalles == $contador) {
                                                            echo "</tbody>
                                                                    </table>
                                                                    <table id='Tabla_Examenes' class='table table-bordered table-striped' style='width:50%;font-size:12px;vertical-align: middle;'>
                                                                    <thead>
                                                                        <tr>
                                                                            <th scope='col' width='20%'>Analisis</th>
                                                                            <th scope='col' width='5%'>Resultado</th>
                                                                            <th scope='col' width='5%'>Unidades de Referencia</th>
                                                                            <th scope='col' width='15%'>Valor de Referencia</th>

                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>";
                                                            echo "<tr><td colspan='5' align='center'><b style='font-size: 22px;'>$Titulo</b></td></tr>";
                                                            $tabladoble = "1";
                                                        }

                                                        $Usuario_Resultados_Ingreso = $rowMotorizado['Usuario_Resultados_Ingreso'];
                                                        $Usuario_Valida_Resultados = $rowMotorizado['Usuario_Valida_Resultados'];
                                                    }
                                                    ?>


                                                <?php
                                            }
                                                ?>
                                                    </tbody>
                                                </table>

                                                <div class='col-12' align='left' style="padding: 2px 20px 2px 20px;display: flex;">
                                                    (*) Valores fuera de rango<br>
                                                    (.) Corresponde a separador de decimales<br>
                                                    <br>
                                                    NOTA:Este informe de laboratorio contiene datos de análisis clínicos. Si no cuenta con los conocimientos adecuados, su interpretación puede conducir a error. CONSULTE A SU MÉDICO.
                                                </div>

                                                <link rel="stylesheet" href="plugins/DataEditor/ckeditor.css"><!-- para que se vean las tablas del ckeditor-->
                                    </div>
                                </div>

                                <div class='row' style="padding-bottom:10px;">
                                    <?php
                                    /*
                                    $FirmaIngreso = funcionMaster($Usuario_Resultados_Ingreso, 'ID_Usuario', 'firma', 'config');
                                    $DatosIngreso = funcionMaster($Usuario_Resultados_Ingreso, 'ID', 'NOMBRE_USUARIO', 'usuarios');
                                    if ($Usuario_Valida_Resultados == 2) {

                                        echo "<div class='col-6' align='center' style='font-size: 13px;'>
                                            <img src='{$Base}/FirmasReg/{$FirmaIngreso}' height='100' width='200'>
                                            <br>_______________________________<br>
                                            <br><label style='position: relative;top: -22px;display: grid;'>$DatosIngreso<br>
                                            <br><label style='position: relative;top: -22px;display: grid;'>Biologa<br>
                                            <br><label style='position: relative;top: -22px;display: grid;'>C.B.P 9131<br>
                                            <b>*Responsable de la validacion de los resultados de la prueba*</b></label>  
                                            </div>";
                                    }else{
                                        echo "<div class='col-6' align='center' style='font-size: 13px;'>
                                            <img src='{$Base}/FirmasReg/{$FirmaIngreso}' height='100' width='200'>
                                            <br>_______________________________<br>
                                            <br><label style='position: relative;top: -22px;display: grid;'>$DatosIngreso<br>
                                            
                                            
                                            <b>*Responsable de la validacion de los resultados de la prueba*</b></label>  
                                            </div>";

                                    }
                                    */
                                    ?>

                                    <?php
                                    /*
                                    $FirmaValidador = funcionMaster($Usuario_Valida_Resultados, 'ID_Usuario', 'firma', 'config');
                                    $DatosValidador = funcionMaster($Usuario_Valida_Resultados, 'ID', 'NOMBRE_USUARIO', 'usuarios');
                                    $EspecialidadValidador = funcionMaster($Usuario_Valida_Resultados, 'ID', 'especialidad', 'usuarios');
                                    
                                    if ($Usuario_Valida_Resultados == 2) {

                                        echo "<div class='col-6' align='center' style='font-size: 13px;'>
                                            <img src='{$Base}/FirmasReg/{$FirmaValidador}' height='100' width='200'>
                                            <br>_______________________________<br>
                                            <br><label style='position: relative;top: -22px;display: grid;'>$DatosValidador<br>
                                            <br><label style='position: relative;top: -22px;display: grid;'>Biologa<br>
                                            <br><label style='position: relative;top: -22px;display: grid;'>C.B.P 9131<br>
                                            <b>*Responsable de la validacion de los resultados de la prueba*</b></label>  
                                            </div>";
                                    }else{
                                        echo "<div class='col-6' align='center' style='font-size: 13px;'>
                                            <img src='{$Base}/FirmasReg/{$FirmaValidador}' height='100' width='200'>
                                            <br>_______________________________<br>
                                            <br><label style='position: relative;top: -22px;display: grid;'>$DatosValidador<br>
                                            
                                            
                                            <b>*Responsable de la validacion de los resultados de la prueba*</b></label>  
                                            </div>";

                                    }
                                    */
                                    ?>
                                </div>
                                <!--
                                <table style="width:100%">
                                    <tr>
                                        <td style="text-align-last: center;width:33%;">
                                            <div id="qr_examen<?php echo $key; ?>"></div>
                                            <label style="font-size:13px"> https://medicalsoftplus.com/pe652/verLaboratorios</label><br>
                                            <label style="font-size:13px">Usuario: <?php echo $CODI_CLIENTE ?></label>
                                            <label style="font-size:13px">Clave: <?php echo $clave ?></label><br>
                                        </td>
                                        <td style='text-align-last: center;width:33%;'>
                                            <?php
                                            if ($CodigoBarrasCovid == "Si") {
                                                echo "
                                                    <div id='qr_codigocovid{$key}'></div>
                                                    <label style='font-size:13px'> Codigo Covid </label>
                                                    
                                                    
                                                    <script>
                                                        document.getElementById('qr_codigocovid{$key}').innerHTML = create_qrcode('{$direccion}', '10', 'L', 'Byte', 'default');
                                                    </script>
                                                    ";
                                            }
                                            ?>
                                        </td>
                                        <td style="text-align-last: center;width:33%;">
                                            <div id="qr_codigofuncionamiento<?php echo $key; ?>"></div>
                                            <label style="font-size:13px"> Codigo de Funcionamiento </label>
                                        </td>
                                    </tr>
                                </table>
                                <?php $direccion = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>
                                <script>
                                    document.getElementById('qr_examen<?php echo $key; ?>').innerHTML = create_qrcode("<?php echo $direccion; ?>", "10", "L", "Byte", "default");
                                    document.getElementById('qr_codigofuncionamiento<?php echo $key; ?>').innerHTML = create_qrcode("CodigoFuncionamiento", "10", "L", "Byte", "default");
                                </script>
                                -->
                            </div>
                        </div>
                        <!-- cierre del page-->
                    <?php endif; ?>









                    <?php if (isset($_GET["examenes"]) and $_GET["examenes"] != "categoria") :

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
                        $Tabla = "No";
                        foreach ($examenes as $key => $value) {
                            $TipoTabla = funcionMaster($value, 'id', 'En_Dos_Tablas', 'LB_ExamenCargado');
                            $examen = funcionMaster($value, 'id', 'examen_id', 'LB_ExamenCargado');

                            if ($TipoTabla == "Si") {
                                $Filtro = "width:50%;float:left;";
                                $queryList = mysqli_query($conn3, "SELECT examen_id,count(*) as CantidadDetalles FROM LB_ExamenCargado WHERE idOperacion='$idOperacion' AND examen_id='$examen' GROUP BY examen_id ORDER BY id ASC");
                                while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                    $CantidadDetalles = round(($rowMotorizado["CantidadDetalles"] / 2), 0, PHP_ROUND_HALF_UP);
                                }
                                $Tabla = "No";
                            } else {
                                $Filtro = "width:100%;";
                            }
                    ?>
                            <!-- comienzo de la impresion de la informacion-->
                            <div class="page" style="width:100vw;">

                                <?php echo $Subtitulo; ?>

                                <?php if ($key == 0) {
                                    echo $Datos_Personales;
                                } ?>

                                <div class="box">
                                    <div class="col-md-12">


                                        <div class="box-body">

                                            <?php
                                            if ($Tabla == $TipoTabla) :
                                                $Tabla = "Si";
                                            ?>
                                                <table id="Tabla_Examenes" class="table table-bordered table-striped" style="font-size:12px;vertical-align: middle;<?php echo $Filtro; ?>">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col" width="20%">Analisis</th>
                                                            <th scope="col" width="7%">Resultado</th>

                                                            <th scope="col" width="7%">Unidades de Referencia</th>
                                                            <th scope="col" width="16%">Valor de Referencia</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                endif;
                                                    ?>

                                                    <?php
                                                    $CodigoBarrasCovid = "";
                                                    $queryList = mysqli_query($conn3, "SELECT * FROM  LB_ExamenCargado WHERE idOperacion='$idOperacion' AND examen_id='$examen' ORDER BY id ASC");
                                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                                        $contador++;

                                                        $id = $rowMotorizado['id'];
                                                        $Resultado = $rowMotorizado['Resultado'];
                                                        $Nombre = $rowMotorizado['Nombre'];
                                                        $Metodo = $rowMotorizado['Metodo'];
                                                        $Observaciones = $rowMotorizado['Observaciones'];
                                                        $Unidades_Referencia = $rowMotorizado['Unidades_Referencia'];
                                                        $Valores_Referencia = PonerComillasyOtrosCaracteres($rowMotorizado['Valores_Referencia']);
                                                        $CaracteristicaExamen = $rowMotorizado['CaracteristicaExamen'];
                                                        $Resultado = $rowMotorizado['Resultado'];
                                                        $Observaciones = $rowMotorizado['Observaciones'];

                                                        //////////////////////////////////////////////
                                                        /*
                                                        $Valores_Referencia_Filtrado = $rowMotorizado['Valores_Referencia_Filtrado'];
                                                        if ($Valores_Referencia_Filtrado != "") {
                                                            $Valores_Referencia = "";
                                                            $listado = json_decode($Valores_Referencia_Filtrado, true);
                                                            foreach ($listado as $key => $value) {

                                                                if ($value["Valor_Referencia_Minima_Historia"] != "" and $value["Valor_Referencia_Maxima_Historia"] != "") {
                                                                    $Valores_Referencia .= $value['Nombre'] . ": [ " . $value["Valor_Referencia_Minima_Historia"] . " - " . $value["Valor_Referencia_Maxima_Historia"] . " ] <br>";
                                                                }
                                                            }
                                                        }*/
                                                        $Valores_Referencia_Filtrado_Visual = $rowMotorizado['Valores_Referencia_Filtrado_Visual'];
                                                        if ($Valores_Referencia_Filtrado_Visual != "") {
                                                            $Valores_Referencia = $Valores_Referencia_Filtrado_Visual;
                                                        } else {
                                                            $Valores_Referencia = PonerComillasyOtrosCaracteres($rowMotorizado['Valores_Referencia']);
                                                        }

                                                        $Arreglo_Mas_Informacion = json_decode($rowMotorizado['Arreglo_Mas_Informacion'], true);
                                                        foreach ($Arreglo_Mas_Informacion as $key => $value) {
                                                            if ($key == "Campo_Resultado" and $value == "Subtitulo") {
                                                                $Resultado = "No Aplica Resultado";
                                                            }
                                                        }
                                                        ///////////////////////////////////////////////

                                                        $examen_id = $rowMotorizado['examen_id'];
                                                        $idOperacion = $rowMotorizado['idOperacion'];

                                                        $queryList1 = mysqli_query($conn3, "SELECT examen_id, COUNT(*) as Cantidad FROM LB_ExamenCargado where examen_id='$examen_id' and idOperacion = '$idOperacion' GROUP BY examen_id");
                                                        while ($rowMotorizado1 = mysqli_fetch_array($queryList1)) {
                                                            $CantidadCaracteristicas = $rowMotorizado1["Cantidad"];
                                                        }

                                                        $categoria_id = funcionMaster($examen_id, 'id', 'categoria_id', 'LB_Examen');
                                                        if ($categoria_id == '6') {
                                                            $CodigoBarrasCovid = "Si";
                                                        }

                                                        if ($Resultado == "No Aplica Resultado") {
                                                            $Titulo = $Nombre;

                                                            if ($Metodo != "") {
                                                                $MetodoParaExamenConCaractersiticas = $Metodo;
                                                            }
                                                            if ($Observaciones != "") {
                                                                $ObservacionesParaExamenConCaractersiticas = $Observaciones;
                                                            }

                                                            echo "<tr><td colspan='5' align='center'><b style='font-size: 22px;'>$Titulo</b></td></tr>";
                                                        } else if ($CaracteristicaExamen == "No" and $Resultado != "") {
                                                            //echo "<tr><td colspan='5' align='center'><b style='font-size: 22px;'>$Nombre</b></td></tr>";
                                                            echo "<tr>
                                                            <td>$Nombre</td>
                                                            <td>$Resultado</td>
                                                            <td>$Unidades_Referencia</td>
                                                            <td class='valoresreferencia'>$Valores_Referencia</td>
                                                            </tr>";
                                                            // <td>$Observaciones</td>
                                                        } else {

                                                            if ($Resultado != "") {
                                                                echo "<tr>
                                                                <td>$Nombre</td>
                                                                <td>$Resultado</td>
                                                                <td>$Unidades_Referencia</td>
                                                                <td class='valoresreferencia'>$Valores_Referencia</td>
                                                                </tr>";
                                                            }

                                                            // <td>$Observaciones</td>
                                                        }

                                                        if (($CantidadCaracteristicas == $contador) and ($tabladoble == 1)) {
                                                            if ($MetodoParaExamenConCaractersiticas != "") {
                                                                $Metodo = $MetodoParaExamenConCaractersiticas;
                                                                $MetodoParaExamenConCaractersiticas = "";
                                                            }
                                                            if ($ObservacionesParaExamenConCaractersiticas != "") {
                                                                $Observaciones = $ObservacionesParaExamenConCaractersiticas;
                                                                $ObservacionesParaExamenConCaractersiticas = "";
                                                            }

                                                            echo "</tbody>
                                                                </table>
                                                                <table id='Tabla_Examenes' class='table table-bordered table-striped' style='width:100%;font-size:12px;vertical-align: middle;position: relative;top: -17px;'>";
                                                            if ($Metodo != "" and $Resultado != "") {
                                                                echo "<tr><td colspan='4'><b style='font-size: 12px;'> Metodo : </b>$Metodo</td></tr>";
                                                            }
                                                            if ($Observaciones != "" and $Resultado != "") {
                                                                echo "<tr><td colspan='4'><b style='font-size: 12px;'> Observaciones : </b>$Observaciones</td></tr>";
                                                            }
                                                            $tabladoble = "0";
                                                            $contador = "0";
                                                        } elseif ($CantidadCaracteristicas == $contador) {
                                                            if ($MetodoParaExamenConCaractersiticas != "") {
                                                                $Metodo = $MetodoParaExamenConCaractersiticas;
                                                                $MetodoParaExamenConCaractersiticas = "";
                                                            }
                                                            if ($ObservacionesParaExamenConCaractersiticas != "") {
                                                                $Observaciones = $ObservacionesParaExamenConCaractersiticas;
                                                                $ObservacionesParaExamenConCaractersiticas = "";
                                                            }

                                                            if ($Metodo != "" and $Resultado != "") {
                                                                echo "<tr><td colspan='4'><b style='font-size: 12px;'> Metodo :</b>$Metodo</td></tr>";
                                                            }
                                                            if ($Observaciones != "" and $Resultado != "") {
                                                                echo "<tr><td colspan='4'><b style='font-size: 12px;'> Observaciones : </b>$Observaciones</td></tr>";
                                                            }
                                                            $contador = "0";
                                                        }

                                                        if ($CantidadDetalles == $contador) {
                                                            echo "</tbody>
                                                                    </table>
                                                                    <table id='Tabla_Examenes' class='table table-bordered table-striped' style='width:50%;font-size:12px;vertical-align: middle;'>
                                                                    <thead>
                                                                        <tr>
                                                                            <th scope='col' width='20%'>Analisis</th>
                                                                            <th scope='col' width='5%'>Resultado</th>
                                                                            <th scope='col' width='5%'>Unidades de Referencia</th>
                                                                            <th scope='col' width='15%'>Valor de Referencia</th>

                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>";
                                                            echo "<tr><td colspan='5' align='center'><b style='font-size: 22px;'>$Titulo</b></td></tr>";
                                                            $tabladoble = "1";
                                                        }

                                                        $Usuario_Resultados_Ingreso = $rowMotorizado['Usuario_Resultados_Ingreso'];
                                                        $Usuario_Valida_Resultados = $rowMotorizado['Usuario_Valida_Resultados'];
                                                    }
                                                    ?>
                                                    </tbody>
                                                </table>

                                                <div class='col-12' align='left' style="padding: 2px 20px 2px 20px;display: flex;">
                                                    (*) Valores fuera de rango<br>
                                                    (.) Corresponde a separador de decimales<br>
                                                    <br>
                                                    NOTA:Este informe de laboratorio contiene datos de análisis clínicos. Si no cuenta con los conocimientos adecuados, su interpretación puede conducir a error. CONSULTE A SU MÉDICO.
                                                </div>

                                                <link rel="stylesheet" href="plugins/DataEditor/ckeditor.css"><!-- para que se vean las tablas del ckeditor-->
                                        </div>
                                    </div>

                                    <div class='row' style="padding-bottom:10px;">
                                        <?php
                                        /*
                                        $FirmaIngreso = funcionMaster($Usuario_Resultados_Ingreso, 'ID_Usuario', 'firma', 'config');
                                        $DatosIngreso = funcionMaster($Usuario_Resultados_Ingreso, 'ID', 'NOMBRE_USUARIO', 'usuarios');
                                        if ($Usuario_Valida_Resultados == 2) {

                                            echo "<div class='col-6' align='center' style='font-size: 13px;'>
                                                <img src='{$Base}/FirmasReg/{$FirmaIngreso}' height='100' width='200'>
                                                <br>_______________________________<br>
                                                <br><label style='position: relative;top: -22px;display: grid;'>$DatosIngreso<br>
                                                <br><label style='position: relative;top: -22px;display: grid;'>Biologa<br>
                                                <br><label style='position: relative;top: -22px;display: grid;'>C.B.P 9131<br>
                                                <b>*Responsable de la validacion de los resultados de la prueba*</b></label>  
                                                </div>";
                                        }else{
                                            echo "<div class='col-6' align='center' style='font-size: 13px;'>
                                                <img src='{$Base}/FirmasReg/{$FirmaIngreso}' height='100' width='200'>
                                                <br>_______________________________<br>
                                                <br><label style='position: relative;top: -22px;display: grid;'>$DatosIngreso<br>
                                                
                                                
                                                <b>*Responsable de la validacion de los resultados de la prueba*</b></label>  
                                                </div>";
    
                                        }
                                        */
                                        ?>

                                        <?php
                                        /*
                                        $FirmaValidador = funcionMaster($Usuario_Valida_Resultados, 'ID_Usuario', 'firma', 'config');
                                        $DatosValidador = funcionMaster($Usuario_Valida_Resultados, 'ID', 'NOMBRE_USUARIO', 'usuarios');
                                        if ($Usuario_Valida_Resultados == 2) {

                                            echo "<div class='col-6' align='center' style='font-size: 13px;'>
                                                <img src='{$Base}/FirmasReg/{$FirmaValidador}' height='100' width='200'>
                                                <br>_______________________________<br>
                                                <br><label style='position: relative;top: -22px;display: grid;'>$DatosValidador<br>
                                                <br><label style='position: relative;top: -22px;display: grid;'>Biologa<br>
                                                <br><label style='position: relative;top: -22px;display: grid;'>C.B.P 9131<br>
                                                <b>*Responsable de la validacion de los resultados de la prueba*</b></label>  
                                                </div>";
                                        }else{
                                            echo "<div class='col-6' align='center' style='font-size: 13px;'>
                                                <img src='{$Base}/FirmasReg/{$FirmaValidador}' height='100' width='200'>
                                                <br>_______________________________<br>
                                                <br><label style='position: relative;top: -22px;display: grid;'>$DatosValidador<br>
                                                
                                                
                                                <b>*Responsable de la validacion de los resultados de la prueba*</b></label>  
                                                </div>";
    
                                        }
                                        */
                                        ?>
                                    </div>
                                    <!--
                                    <table style="width:100%">
                                        <tr>
                                            <td style="width:50%;text-align-last: center;width:33%;">
                                                <div id="qr_examen<?php echo $key; ?>"></div>
                                                <label style="font-size:13px"> https://medicalsoftplus.com/ec583/ verLaboratorios</label><br>
                                                <label style="font-size:13px">Usuario: <?php echo $CODI_CLIENTE ?></label>
                                                <label style="font-size:13px">Clave: <?php echo $clave ?></label><br>
                                            </td>
                                            <td style='text-align-last: center;width:33%;'>
                                                <?php
                                                if ($CodigoBarrasCovid == "Si") {
                                                    echo "
                                                    <div id='qr_codigocovid{$key}'></div>
                                                    <label style='font-size:13px'> Codigo Covid </label>
                                                    
                                                    
                                                    <script>
                                                        document.getElementById('qr_codigocovid{$key}').innerHTML = create_qrcode('{$direccion}', '10', 'L', 'Byte', 'default');
                                                    </script>
                                                    ";
                                                }
                                                ?>
                                            </td>
                                            <td style="width:50%;text-align-last: center;width:33%;">
                                                <div id="qr_codigofuncionamiento<?php echo $key; ?>"></div>
                                                <label style="font-size:13px"> Codigo de Funcionamiento </label>
                                            </td>
                                        </tr>
                                    </table>
                                    <?php $direccion = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>
                                    <script>
                                        document.getElementById('qr_examen<?php echo $key; ?>').innerHTML = create_qrcode("<?php echo $direccion; ?>", "10", "L", "Byte", "default");
                                        document.getElementById('qr_codigofuncionamiento<?php echo $key; ?>').innerHTML = create_qrcode("CodigoFuncionamiento", "10", "L", "Byte", "default");
                                    </script>
                                    -->
                                </div>
                            </div>
                            <!-- cierre del page-->
                    <?php
                        }
                    endif;
                    ?>










                    <?php if (isset($_GET["examenes"]) and $_GET["examenes"] == "categoria") :

                        $examenes = $_GET["examenes"];
                        $queryList = mysqli_query($conn3, "SELECT examen_id,id FROM  LB_ExamenCargado WHERE idOperacion='$idOperacion' AND CaracteristicaExamen='No' GROUP BY examen_id ORDER BY id ASC");

                        while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                            $categoriasarreglo[funcionMaster($rowMotorizado["examen_id"], 'id', 'categoria_id', 'LB_Examen')] = $categoriasarreglo[funcionMaster($rowMotorizado["examen_id"], 'id', 'categoria_id', 'LB_Examen')] . ',' . $rowMotorizado["id"];
                        }
                        foreach ($categoriasarreglo as $key => $value) {

                    ?>
                            <!-- comienzo de la impresion de la informacion-->
                            <div class="page">

                                <?php echo $Subtitulo; ?>

                                <?php
                                echo $Datos_Personales;
                                ?>


                                <div class="box">
                                    <div>


                                        <div>

                                            <h2 align="center" style="font-size:22px;"><?php echo funcionMaster($key, 'id', 'Nombre', 'LB_Categoria'); ?></h2>

                                            <?php

                                            $value = trim($value, ',');

                                            $arregloExamen = explode(",", $value);
                                            $Tabla = "No";
                                            foreach ($arregloExamen as $key1 => $value1) {
                                                $TipoTabla = funcionMaster($value1, 'id', 'En_Dos_Tablas', 'LB_ExamenCargado');
                                                $examen = funcionMaster($value1, 'id', 'examen_id', 'LB_ExamenCargado');

                                                if ($TipoTabla == "Si") {
                                                    $Filtro = "width:50%;float:left;";
                                                    $queryList = mysqli_query($conn3, "SELECT examen_id,count(*) as CantidadDetalles FROM LB_ExamenCargado WHERE idOperacion='$idOperacion' AND examen_id='$examen' GROUP BY examen_id ORDER BY id ASC");
                                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                                        $CantidadDetalles = round(($rowMotorizado["CantidadDetalles"] / 2), 0, PHP_ROUND_HALF_UP);
                                                    }
                                                    $Tabla = "No";
                                                } else {
                                                    $Filtro = "width:100%;";
                                                }

                                            ?>
                                                <?php
                                            if ($Tabla == $TipoTabla) :
                                                $Tabla = "Si";
                                            ?>
                                                <table id="Tabla_Examenes" class="table table-bordered table-striped" style="font-size:12px;vertical-align: middle;<?php echo $Filtro; ?>">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col" width="20%">Analisis</th>
                                                            <th scope="col" width="7%">Resultado</th>

                                                            <th scope="col" width="7%">Unidades de Referencia</th>
                                                            <th scope="col" width="16%">Valor de Referencia</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                endif;
                                                    ?>
                                                <?php
                                                $CodigoBarrasCovid = "";
                                                $queryList = mysqli_query($conn3, "SELECT * FROM  LB_ExamenCargado WHERE idOperacion='$idOperacion' AND examen_id='$examen' ORDER BY id ASC");
                                                while ($rowMotorizado = mysqli_fetch_array($queryList)) {

                                                    $contador++;

                                                    $id = $rowMotorizado['id'];
                                                    $Resultado = $rowMotorizado['Resultado'];
                                                    $Nombre = $rowMotorizado['Nombre'];
                                                    $Metodo = $rowMotorizado['Metodo'];
                                                    $Observaciones = $rowMotorizado['Observaciones'];
                                                    $Unidades_Referencia = $rowMotorizado['Unidades_Referencia'];
                                                    $Valores_Referencia = PonerComillasyOtrosCaracteres($rowMotorizado['Valores_Referencia']);
                                                    $CaracteristicaExamen = $rowMotorizado['CaracteristicaExamen'];
                                                    $Resultado = $rowMotorizado['Resultado'];
                                                    $Observaciones = $rowMotorizado['Observaciones'];

                                                    //////////////////////////////////////////////
                                                    /*
                                                        $Valores_Referencia_Filtrado = $rowMotorizado['Valores_Referencia_Filtrado'];
                                                        if ($Valores_Referencia_Filtrado != "") {
                                                            $Valores_Referencia = "";
                                                            $listado = json_decode($Valores_Referencia_Filtrado, true);
                                                            foreach ($listado as $key => $value) {

                                                                if ($value["Valor_Referencia_Minima_Historia"] != "" and $value["Valor_Referencia_Maxima_Historia"] != "") {
                                                                    $Valores_Referencia .= $value['Nombre'] . ": [ " . $value["Valor_Referencia_Minima_Historia"] . " - " . $value["Valor_Referencia_Maxima_Historia"] . " ] <br>";
                                                                }
                                                            }
                                                        }*/
                                                    $Valores_Referencia_Filtrado_Visual = $rowMotorizado['Valores_Referencia_Filtrado_Visual'];
                                                    if ($Valores_Referencia_Filtrado_Visual != "") {
                                                        $Valores_Referencia = $Valores_Referencia_Filtrado_Visual;
                                                    } else {
                                                        $Valores_Referencia = PonerComillasyOtrosCaracteres($rowMotorizado['Valores_Referencia']);
                                                    }

                                                    $Arreglo_Mas_Informacion = json_decode($rowMotorizado['Arreglo_Mas_Informacion'], true);
                                                    foreach ($Arreglo_Mas_Informacion as $key => $value) {
                                                        if ($key == "Campo_Resultado" and $value == "Subtitulo") {
                                                            $Resultado = "No Aplica Resultado";
                                                        }
                                                    }
                                                    ///////////////////////////////////////////////

                                                    $examen_id = $rowMotorizado['examen_id'];
                                                    $idOperacion = $rowMotorizado['idOperacion'];

                                                    $queryList1 = mysqli_query($conn3, "SELECT examen_id, COUNT(*) as Cantidad FROM LB_ExamenCargado where examen_id='$examen_id' and idOperacion = '$idOperacion' GROUP BY examen_id");
                                                    while ($rowMotorizado1 = mysqli_fetch_array($queryList1)) {
                                                        $CantidadCaracteristicas = $rowMotorizado1["Cantidad"];
                                                    }

                                                    $categoria_id = funcionMaster($examen_id, 'id', 'categoria_id', 'LB_Examen');
                                                    if ($categoria_id == '6') {
                                                        $CodigoBarrasCovid = "Si";
                                                    }

                                                    if ($Resultado == "No Aplica Resultado") {
                                                        $Titulo = $Nombre;

                                                        if ($Metodo != "") {
                                                            $MetodoParaExamenConCaractersiticas = $Metodo;
                                                        }
                                                        if ($Observaciones != "") {
                                                            $ObservacionesParaExamenConCaractersiticas = $Observaciones;
                                                        }

                                                        echo "<tr><td colspan='5' align='center'><b style='font-size: 22px;'>$Titulo</b></td></tr>";
                                                    } else if ($CaracteristicaExamen == "No" and $Resultado != "") {
                                                        //echo "<tr><td colspan='5' align='center'><b style='font-size: 22px;'>$Nombre</b></td></tr>";
                                                        echo "<tr>
                                                            <td>$Nombre</td>
                                                            <td>$Resultado</td>
                                                            <td>$Unidades_Referencia</td>
                                                            <td class='valoresreferencia'>$Valores_Referencia</td>
                                                            </tr>";
                                                        // <td>$Observaciones</td>
                                                    } else {

                                                        if ($Resultado != "") {
                                                            echo "<tr>
                                                                <td>$Nombre</td>
                                                                <td>$Resultado</td>
                                                                <td>$Unidades_Referencia</td>
                                                                <td class='valoresreferencia'>$Valores_Referencia</td>
                                                                </tr>";
                                                        }

                                                        // <td>$Observaciones</td>
                                                    }

                                                    if (($CantidadCaracteristicas == $contador) and ($tabladoble == 1)) {
                                                        if ($MetodoParaExamenConCaractersiticas != "") {
                                                            $Metodo = $MetodoParaExamenConCaractersiticas;
                                                            $MetodoParaExamenConCaractersiticas = "";
                                                        }
                                                        if ($ObservacionesParaExamenConCaractersiticas != "") {
                                                            $Observaciones = $ObservacionesParaExamenConCaractersiticas;
                                                            $ObservacionesParaExamenConCaractersiticas = "";
                                                        }

                                                        echo "</tbody>
                                                                </table>
                                                                <table id='Tabla_Examenes' class='table table-bordered table-striped' style='width:100%;font-size:12px;vertical-align: middle;position: relative;top: -17px;'>";
                                                        if ($Metodo != "" and $Resultado != "") {
                                                            echo "<tr><td colspan='4'><b style='font-size: 12px;'> Metodo : </b>$Metodo</td></tr>";
                                                        }
                                                        if ($Observaciones != "" and $Resultado != "") {
                                                            echo "<tr><td colspan='4'><b style='font-size: 12px;'> Observaciones : </b>$Observaciones</td></tr>";
                                                        }
                                                        $tabladoble = "0";
                                                        $contador = "0";
                                                    } elseif ($CantidadCaracteristicas == $contador) {
                                                        if ($MetodoParaExamenConCaractersiticas != "") {
                                                            $Metodo = $MetodoParaExamenConCaractersiticas;
                                                            $MetodoParaExamenConCaractersiticas = "";
                                                        }
                                                        if ($ObservacionesParaExamenConCaractersiticas != "") {
                                                            $Observaciones = $ObservacionesParaExamenConCaractersiticas;
                                                            $ObservacionesParaExamenConCaractersiticas = "";
                                                        }

                                                        if ($Metodo != "" and $Resultado != "") {
                                                            echo "<tr><td colspan='4'><b style='font-size: 12px;'> Metodo :</b>$Metodo</td></tr>";
                                                        }
                                                        if ($Observaciones != "" and $Resultado != "") {
                                                            echo "<tr><td colspan='4'><b style='font-size: 12px;'> Observaciones : </b>$Observaciones</td></tr>";
                                                        }
                                                        $contador = "0";
                                                    }

                                                    if ($CantidadDetalles == $contador) {
                                                        echo "</tbody>
                                                                    </table>
                                                                    <table id='Tabla_Examenes' class='table table-bordered table-striped' style='width:50%;font-size:12px;vertical-align: middle;'>
                                                                    <thead>
                                                                        <tr>
                                                                            <th scope='col' width='20%'>Analisis</th>
                                                                            <th scope='col' width='5%'>Resultado</th>
                                                                            <th scope='col' width='5%'>Unidades de Referencia</th>
                                                                            <th scope='col' width='15%'>Valor de Referencia</th>

                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>";
                                                        echo "<tr><td colspan='5' align='center'><b style='font-size: 22px;'>$Titulo</b></td></tr>";
                                                        $tabladoble = "1";
                                                    }

                                                    $Usuario_Resultados_Ingreso = $rowMotorizado['Usuario_Resultados_Ingreso'];
                                                    $Usuario_Valida_Resultados = $rowMotorizado['Usuario_Valida_Resultados'];
                                                }

                                                ?>
                                                <!--</tbody>
                                                    </table>-->
                                            <?php
                                            }
                                            ?>
        </tbody>
    </table>
    <link rel="stylesheet" href="plugins/DataEditor/ckeditor.css"><!-- para que se vean las tablas del ckeditor-->
    </div>
    </div>

    <div class='' style="">
        <?php
                            /*
                                        $FirmaIngreso = funcionMaster($Usuario_Resultados_Ingreso, 'ID_Usuario', 'firma', 'config');
                                        $DatosIngreso = funcionMaster($Usuario_Resultados_Ingreso, 'ID', 'NOMBRE_USUARIO', 'usuarios');
                                        if ($Usuario_Valida_Resultados == 2) {

                                            echo "<div class='col-6' align='center' style='font-size: 13px;'>
                                                <img src='{$Base}/FirmasReg/{$FirmaIngreso}' height='100' width='200'>
                                                <br>_______________________________<br>
                                                <br><label style='position: relative;top: -22px;display: grid;'>$DatosIngreso<br>
                                                <br><label style='position: relative;top: -22px;display: grid;'>Biologa<br>
                                                <br><label style='position: relative;top: -22px;display: grid;'>C.B.P 9131<br>
                                                <b>*Responsable de la validacion de los resultados de la prueba*</b></label>  
                                                </div>";
                                        }else{
                                            echo "<div class='col-6' align='center' style='font-size: 13px;'>
                                                <img src='{$Base}/FirmasReg/{$FirmaIngreso}' height='100' width='200'>
                                                <br>_______________________________<br>
                                                <br><label style='position: relative;top: -22px;display: grid;'>$DatosIngreso<br>
                                                
                                                
                                                <b>*Responsable de la validacion de los resultados de la prueba*</b></label>  
                                                </div>";
    
                                        }
                                        */
        ?>

        <?php
                            /*
                                        $FirmaValidador = funcionMaster($Usuario_Valida_Resultados, 'ID_Usuario', 'firma', 'config');
                                        $DatosValidador = funcionMaster($Usuario_Valida_Resultados, 'ID', 'NOMBRE_USUARIO', 'usuarios');
                                        if ($Usuario_Valida_Resultados == 2) {

                                            echo "<div class='col-6' align='center' style='font-size: 13px;'>
                                                <img src='{$Base}/FirmasReg/{$FirmaValidador}' height='100' width='200'>
                                                <br>_______________________________<br>
                                                <br><label style='position: relative;top: -22px;display: grid;'>$DatosValidador<br>
                                                <br><label style='position: relative;top: -22px;display: grid;'>Biologa<br>
                                                <br><label style='position: relative;top: -22px;display: grid;'>C.B.P 9131<br>
                                                <b>*Responsable de la validacion de los resultados de la prueba*</b></label>  
                                                </div>";
                                        }else{
                                            echo "<div class='col-6' align='center' style='font-size: 13px;'>
                                                <img src='{$Base}/FirmasReg/{$FirmaValidador}' height='100' width='200'>
                                                <br>_______________________________<br>
                                                <br><label style='position: relative;top: -22px;display: grid;'>$DatosValidador<br>
                                                
                                                
                                                <b>*Responsable de la validacion de los resultados de la prueba*</b></label>  
                                                </div>";
    
                                        }
                                        */
        ?>
    </div>

    <!--
                                    <table style="width:100%">
                                        <tr>
                                            <td style="width:50%;text-align-last: center;width:33%;">
                                                <div id="qr_examen<?php echo $key; ?>"></div>
                                                <label style="font-size:13px"> https://medicalsoftplus.com/ec583/ verLaboratorios</label><br>
                                                <label style="font-size:13px">Usuario: <?php echo $CODI_CLIENTE ?></label>
                                                <label style="font-size:13px">Clave: <?php echo $clave ?></label><br>
                                            </td>
                                            <td style='text-align-last: center;width:33%;'>
                                                <?php
                                                if ($CodigoBarrasCovid == "Si") {
                                                    echo "
                                                    <div id='qr_codigocovid{$key}'></div>
                                                    <label style='font-size:13px'> Codigo Covid </label>
                                                    
                                                    
                                                    <script>
                                                        document.getElementById('qr_codigocovid{$key}').innerHTML = create_qrcode('{$direccion}', '10', 'L', 'Byte', 'default');
                                                    </script>
                                                    ";
                                                }
                                                ?>
                                            </td>
                                            <td style="width:50%;text-align-last: center;width:33%;">
                                                <div id="qr_codigofuncionamiento<?php echo $key; ?>"></div>
                                                <label style="font-size:13px"> Codigo de Funcionamiento </label>
                                            </td>
                                        </tr>
                                    </table>
                                    <?php $direccion = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>
                                    <script>
                                        document.getElementById('qr_examen<?php echo $key; ?>').innerHTML = create_qrcode("<?php echo $direccion; ?>", "10", "L", "Byte", "default");
                                        document.getElementById('qr_codigofuncionamiento<?php echo $key; ?>').innerHTML = create_qrcode("CodigoFuncionamiento", "10", "L", "Byte", "default");
                                    </script>
                                    -->
    </div>
    </div>
    <!-- cierre del page-->
<?php
                        }
                    endif;
?>



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