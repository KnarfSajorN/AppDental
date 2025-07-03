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

        .page {
            font-size: 12px !important;
        }
    </style>
</head>

<body>

    <div class="page-header row" style="text-align: center">
        <div class="col-3" align="left"><?php echo $Logo ?></div>
        <div class="col-6">
            <?php echo nl2br($header) ?>
        </div>
        <div class="col-3" style="font-size: 15px;text-align: right;">
            <table style="width:100%;zoom:0.8;">
                <tr>
                    <td style="width:50%;text-align-last: center;width:33%;">
                        <div id="qr_examen<?php echo $key; ?>"></div>
                        <label style="font-size:13px"> <?php echo $Base; ?>Plataforma</label><br>
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
                    <?php

                    $queryList = mysqli_query($conn3, "SELECT * FROM  LB_ExamenCargado WHERE idOperacion='$idOperacion' ORDER BY id ASC");
                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                        $ArregloExamenDetalle="";
                    
                        $ArregloExamenDetalle['id']=$rowMotorizado['id'];
                        $ArregloExamenDetalle['Nombre']=$rowMotorizado['Nombre'];
                        $ArregloExamenDetalle['Metodo']=$rowMotorizado['Metodo'];
                        $ArregloExamenDetalle['Observaciones']=$rowMotorizado['Observaciones'];
                        $ArregloExamenDetalle['Unidades_Referencia']=$rowMotorizado['Unidades_Referencia'];
                        $ArregloExamenDetalle['Valores_Referencia']=$rowMotorizado['Valores_Referencia'];
                        $ArregloExamenDetalle['CaracteristicaExamen']=$rowMotorizado['CaracteristicaExamen'];
                        $ArregloExamenDetalle['Resultado']=$rowMotorizado['Resultado'];
                        $ArregloExamenDetalle['Valores_Referencia_Filtrado']=$rowMotorizado['Valores_Referencia_Filtrado'];
                        $ArregloExamenDetalle['Arreglo_Mas_Informacion']=$rowMotorizado['Arreglo_Mas_Informacion'];

                        $ArregloExamenDetalle['Tipo_Campo']=json_decode($rowMotorizado['Arreglo_Mas_Informacion'], true)["Campo_Resultado"];

                        $queryList1 = mysqli_query($conn3, "SELECT examen_id, COUNT(*) as Cantidad FROM LB_ExamenCargado where examen_id='{$rowMotorizado['examen_id']}' and idOperacion = '$idOperacion' GROUP BY examen_id limit 1");
                        $rowMotorizado1 = mysqli_fetch_array($queryList1);

                        $ArregloExamenDetalle['Cantidad_Detalles']=$rowMotorizado1["Cantidad"];

                        $ArregloExamenes[$rowMotorizado['examen_id']][] = $ArregloExamenDetalle;
                    }
                    echo "<pre>";
                    print_r($ArregloExamenes);
                    echo "</pre>";

                    foreach ($ArregloExamenes as $key => $value) {
                        echo "<table class='table table-bordered table-striped' style='font-size:12px;vertical-align: middle;'>
                        <thead>
                            <tr>
                                <th scope='col' width='20%'>Analisis</th>
                                <th scope='col' width='7%'>Resultado</th>

                                <th scope='col' width='7%'>Unidades de Referencia</th>
                                <th scope='col' width='16%'>Valor de Referencia</th>
                            </tr>
                        </thead>
                        <tbody>";

                        foreach ($value as $Numero => $Detalle) {

                            if ($Detalle["Resultado"] == "No Aplica Resultado" OR $Detalle["Tipo_Campo"] == "Subtitulo") {

                                echo "<tr><td colspan='4' align='center'><b style='font-size: 22px;'>{$Detalle['Nombre']}</b></td></tr>";
                            }
                            else{
                            echo "<tr>
                                <td>{$Detalle['Nombre']}</td>
                                <td>{$Detalle['Resultado']}</td>
                                <td>{$Detalle['Unidades_Referencia']}</td>
                                <td class='valoresreferencia'>{$Detalle['Valores_Referencia']}</td>
                                </tr>";
                            }

                        }
                        echo "</tbody>
                        </table>";

                    }
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