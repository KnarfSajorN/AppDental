<?php
// echo "Antes de importar las funciones";
date_default_timezone_set('America/Bogota');
include("funciones/funciones.php");
include("funciones/funcionesUtilidades.php");
// echo "Despues de importar las funciones";


$idHistoria = decrypt($_GET['id']);
// echo "<br>Despues de desencriptar el id de historia";

$tipoHistoria = $_GET['tipoHistoria'];
$tablas = [
    0 => "HT_OndasChoque",
    1 => "HT_OndasChoqueBilateral",
    2 => "sesionesAplicadas",
    3 => "evolucionesTratamiento"
];

$tabla = $tablas[$tipoHistoria];

$historiaQuery = mysqli_query($conn3, "SELECT * FROM {$tabla} WHERE id = '{$idHistoria}'") or die(mysqli_error($conn3));
if (!empty(mysqli_num_rows($historiaQuery)) && $historiaQuery===true && mysqli_num_rows($historiaQuery)>0 ) {
    $historia = mysqli_fetch_assoc($historiaQuery);
}

$cliente = mysqli_query($conn3, "SELECT * from cliente where cliente_id = '{$historia['cliente_id']}';");
if (!empty(mysqli_num_rows($cliente)) && $cliente===true && mysqli_num_rows($cliente)>0 ) {
    $cliente = mysqli_fetch_assoc($cliente);
}

$queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id = '{$historia['cliente_id']}' ");
if ($queryList) {
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        $nombre_cliente = $rowMotorizado['nombre_cliente'];
        $CODI_CLIENTE = $rowMotorizado['CODI_CLIENTE'];
        $fechaNacimiento = $rowMotorizado['fechaNacimiento'];
        $direccion_cliente = $rowMotorizado['direccion_cliente'];
        $entidadSalud = $rowMotorizado['entidadSalud'];
        $entidadSalud = funcionMaster($rowMotorizado['entidad_id'],'id','Nombre','Rips_Entidades');
        $celular_cliente = $rowMotorizado['celular_cliente'];
        $genero = $rowMotorizado['genero'];

        if ($genero == "M") {
            $genero = "Masculino";
        } elseif ($genero == "F") {
            $genero = "Femenino";
        }
    }
}


$queryList = mysqli_query($conn3, "SELECT * FROM config where ID_Usuario = '{$historia['usuario_id']}'");
if ($queryList) {
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        $moneda = $rowMotorizado['moneda'];
        $impuestoF = $rowMotorizado['impuestoF'];
        $nombreF      = $rowMotorizado['nombreF'];
        $telefonoF    = $rowMotorizado['telefonoF'];
        $direccionF   = $rowMotorizado['direccionF'];
        $emailF       = $rowMotorizado['emailF'];
        $ciudadPaisF  = $rowMotorizado['ciudadPaisF'];
        $licenciaF    = $rowMotorizado['licenciaF'];
        $pieF         = $rowMotorizado['pieF'];
        $header       = $rowMotorizado['header'];
        $LogoF           = $rowMotorizado['logoF'];
        $firma               = $rowMotorizado['firma'];

        if (strlen($LogoF) > 0) {
            $Logo = "<img src='{$Base}/logos/{$LogoF}' style='height: 3.5cm;width: auto;'>";
        }
        if (strlen($firma) > 0) {
            $firmaImg = '<img src="'.$Base.'FirmasReg/' . $firma . '" height="150" width="150">';
        }
    }
}

$queryList = mysqli_query($conn3, "SELECT * FROM usuarios where ID = '{$historia['usuario_id']}'");
if ($queryList) {
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        $empresaNombre      = $rowMotorizado['NOMBRE_USUARIO'];
        $pais               = $rowMotorizado['pais'];
        $ciudad             = $rowMotorizado['ciudad'];
        $direccion          = $rowMotorizado['direccion'];
        $telefono           = $rowMotorizado['telefono'];
        $nit                = $rowMotorizado['nit'];
    }
}


$nombreHistoria = [
    0 => 'Historia de Ondas de Choque',
    1 => 'Historia de Ondas de Choque Bilateral',
    2 => 'Sesion Aplicada'
];


?>

<!-- 
<!DOCTYPE html>
<html>

<head> -->
    <!--<link rel="stylesheet" href="css/Impresion/estructura_impresion.css">
    <link rel="stylesheet" href="css/Impresion/bootstrap_5.1.1.min.css">
    <link rel="stylesheet" href="css/Impresion/bootstrap-print.css" media="print">-->
<!-- </head>

<body>  -->
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
                        
            <br><br>
            <?php if ($tipoHistoria <= 1) : ?>
                <div class="col-md-12">
                    <br>
                    <h4 class="center text text-center"><?= $nombreHistoria[$tipoHistoria] ?></h4>
                    <table class="table table-responsive table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">N° Sesiones</th>
                                <th class="text-center">Fecha Inicio</th>
                                <th class="text-center">Fecha Finalizado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center"><?= $historia['numeroSesiones'] ?></td>
                                <td class="text-center"><?= $historia['fechaInicio'] ?></td>
                                <td class="text-center"><?= $historia['fechaFinalizacion'] ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
            <div class="col-md-12">

                <?php if (!empty($historia['diagnosticoTratar'])) : ?>
                    <div class="form-group">
                        <div class="row">
                        <br>
                    <!--<h4 class="center text text-center"><?= $nombreHistoria[$tipoHistoria] ?></h4>-->
                            <div class="col-md-12">
                                <label for="diagnosticoTratar"><b>Diagnóstico a Tratar</b></label> <br>
                                <?= $historia['diagnosticoTratar'] ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if (!empty($historia['localizacion1']) || !empty($historia['localizacion2']) || !empty($historia['intensidad1']) || !empty($historia['intensidad2']) || !empty($historia['frecuencia1']) || !empty($historia['frecuencia2']) || !empty($historia['nDisparos1']) || !empty($historia['nDisparos2'])) : ?>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12" style="text-align:center;">
                                <h4>Información de las Ondas</h4>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Tratamiento 1</h4>
                            </div>
                            <div class="col-md-6">
                                <h4>Tratamiento 2</h4>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="localizacion1"><b>Localización</b></label><br>
                                <?= $historia['localizacion1'] ?>
                            </div>
                            <div class="col-md-6">
                                <label for="localizacion2"><b>Localización</b></label><br>
                                <?= $historia['localizacion2'] ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="intensidad1"><b>Intensidad</b></label><br>
                                <?= $historia['intensidad1'] ?>
                            </div>
                            <div class="col-md-6">
                                <label for="intensidad2"><b>Intensidad</b></label><br>
                                <?= $historia['intensidad2'] ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="frecuencia1"><b>Frecuencia</b></label><br>
                                <?= $historia['frecuencia1'] ?>
                            </div>
                            <div class="col-md-6">
                                <label for="frecuencia2"><b>Frecuencia</b></label><br>
                                <?= $historia['frecuencia2'] ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="nDisparos1"><b>No. Disparos</b></label><br>
                                <?= $historia['nDisparos1'] ?>
                            </div>
                            <div class="col-md-6">
                                <label for="nDisparos2"><b>No. Disparos</b></label><br>
                                <?= $historia['nDisparos2'] ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if (!empty($historia['opcion1']) || !empty($historia['opcion2']) || !empty($historia['opcion3']) || !empty($historia['opcion4']) || !empty($historia['opcion5']) || !empty($historia['opcion6']) || !empty($historia['opcion7'])) : ?>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12" style="text-align:center;">
                                <h4>Recomendaciones</h4>
                            </div>
                        </div>
                    </div>
                    <?php
                    foreach ([
                        "opcion1",
                        "opcion2",
                        "opcion3",
                        "opcion4",
                        "opcion5",
                        "opcion6",
                        "opcion7",
                    ] as $key => $value) {
                        if (!empty($historia[$value])) {
                    ?>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="<?= $value ?>">- <?= $historia[$value] ?></label>
                                    </div>
                                </div>
                            </div>
                <?php
                        }
                    }
                endif;
                ?>

                <?php if (!empty($historia['idCitas'])) : ?>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Próxima Aplicación</h4>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <?php
                            $citaAgendadaVisual = mysqli_query($conn3, "SELECT fecha, Hora, doctor FROM citas WHERE idCitas = '{$historia['idCitas']}'");
                            if (mysqli_num_rows($citaAgendadaVisual) > 0) {
                                $citaAgendadaVisual = mysqli_fetch_array($citaAgendadaVisual);
                            }
                            echo "<div class='col-md-12'>";
                            ?>
                            <label for="doctor_visual">Doctor</label><br>
                            <?= funcionMaster($citaAgendadaVisual['doctor'], 'ID', 'NOMBRE_USUARIO', 'usuarios') ?>
                            <?php
                            echo "</div>";
                            echo "<div class='col-md-6'>";
                            ?>
                            <label for="fecha_visual">Fecha</label><br>
                            <?= $citaAgendadaVisual['fecha'] ?>
                            <?php
                            echo "</div>";
                            echo "<div class='col-md-6'>";
                            ?>
                            <label for="hora_visual">Hora</label><br>
                            <?= $citaAgendadaVisual['Hora'] ?>
                            <?php
                            echo "</div>";

                            ?>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- INICIO DE VERIFICACION SI LA CONSULTA ES CONTABLE -->
                <?php if(is_countable($historia) && count($historia) > 0 && is_array($historia)) { ?>
                <?php if (count($historia['finalidad']) > 0 || count($historia['finalidad']) > 0 || count($historia['personaAtiende']) > 0 || count($historia['realizacionActoQuirurgico']) > 0) : ?>
                    <div class="form-group" style="padding: 0; margin: 0;">
                        <div class="row">
                            <div class="col-md-12" style="text-align:center;">
                                <h4>Diagnósticos Médicos de Procedimientos</h4>
                            </div>
                            <div class="col-md-12">
                                <?php
                                    $historia['ambitoRealizacion'] = json_decode($historia['ambitoRealizacion']);
                                    if (count($historia['finalidad']) > 0) {
                                ?>
                                        <label for="ambitoRealizacion"><b>Ámbito de Realización</b></label><br>
                                        <?php
                                        foreach ($historia['ambitoRealizacion'] as $key => $value) {
                                        ?>
                                            <div class="form-group" style="padding: 0; margin: 0;">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label>- <?= $value ?></label>
                                                    </div>
                                                </div>
                                            </div>
                                <?php
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group" style="padding: 0; margin: 0;">
                        <div class="row">
                            <div class="col-md-12">
                                <?php
                                $historia['finalidad'] = json_decode($historia['finalidad']);
                                if (count($historia['finalidad']) > 0) {
                                ?>
                                    <label for="finalidad"><b>Finalidad</b></label><br>
                                    <?php
                                    foreach ($historia['finalidad'] as $key => $value) {
                                    ?>
                                        <div class="form-group" style="padding: 0; margin: 0;">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label>- <?= $value ?></label>
                                                </div>
                                            </div>
                                        </div>
                                <?php
                                    }
                                }

                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group" style="padding: 0; margin: 0;">
                        <div class="row">
                            <div class="col-md-12">
                                <?php
                                $historia['personaAtiende'] = json_decode($historia['personaAtiende']);
                                if (count($historia['personaAtiende']) > 0) {
                                ?>
                                    <label for="personaAtiende"><b>Persona que Atiende</b></label><br>
                                    <?php
                                    foreach ($historia['personaAtiende'] as $key => $value) {
                                    ?>
                                        <div class="form-group" style="padding: 0; margin: 0;">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label>- <?= $value ?></label>
                                                </div>
                                            </div>
                                        </div>
                                <?php
                                    }
                                }

                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <?php
                                $historia['realizacionActoQuirurgico'] = json_decode($historia['realizacionActoQuirurgico']);
                                if (count($historia['realizacionActoQuirurgico']) > 0) {
                                ?>
                                    <label for="realizacionActoQuirurgico"><b>Realización del Acto Quirúrgico</b></label><br>
                                    <?php
                                    foreach ($historia['realizacionActoQuirurgico'] as $key => $value) {
                                    ?>
                                        <div class="form-group" style="padding: 0; margin: 0;">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label>- <?= $value ?></label>
                                                </div>
                                            </div>
                                        </div>
                                <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <?php } ?>
                <!-- CIERRE DE VERIFICACION SI LA CONSULTA ES CONTABLE -->
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="diagnosticosPrincipales"><b>Diagnósticos Principales</b></label><br>
                            <?= $historia['diagnosticosPrincipales'] ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="diagnosticosRelacionados"><b>Diagnósticos Relacionados</b></label><br>
                            <?= $historia['diagnosticosRelacionados'] ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="complicacion"><b>Complicación</b></label><br>
                            <?= $historia['complicacion'] ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12" style="text-align:center;">
                            <h4>Órdenes Médicas</h4>
                        </div>
                        <div class="col-md-12">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th scope="col" colspan="2">Orden de Imagenología </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $contador = 0;
                                    $Examen_Paciente = array_filter(explode(",", $historia['Imagenologia_Examen']));
                                    foreach ($Examen_Paciente as $value) {
                                        $contador++;
                                        if (funcionMaster($value, 'id', 'Nombre', 'examenes_historia') <> "") :
                                            echo '<tr><td>' . $contador . '</td><td>' . funcionMaster($value, 'id', 'Nombre', 'examenes_historia') . '</td></tr>';
                                        endif;
                                    }
                                    ?>
                                </tbody>
                                </table>
                                <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th scope="col" colspan="2">Orden de Laboratorio</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $contador = 0;
                                    $Laboratorio_Paciente = array_filter(explode(",", $historia['Laboratorio_Examenes']));
                                    foreach ($Laboratorio_Paciente as $value) {
                                        $contador++;
                                        if (funcionMaster($value, 'id', 'Nombre', 'examenes_historia') <> "") :
                                            echo '<tr><td>' . $contador . '</td><td>' . funcionMaster($value, 'id', 'Nombre', 'examenes_historia') . '</td></tr>';
                                        endif;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">

                            <?php if ($historia['Intercosnulta']) : ?>
                                <p><b>Interconsultas</b></p>
                                <?= $historia['Intercosnulta'] ?><br>
                            <?php endif; ?>

                        </div>

                        <div class="col-md-12">

                            <?php if ($historia['Formulacion']) : ?>
                                <p><b>Formulación</b></p>
                                <?= $historia['Formulacion'] ?><br>
                            <?php endif; ?>

                        </div>


                        <div class="col-md-12">

                            <?php if ($historia['Paraclinico']) : ?>
                                <p><b>Paraclínicos</b></p>
                                <?= $historia['Paraclinico'] ?><br>
                            <?php endif; ?>

                        </div>

                        <div class="col-md-12">

                            <?php if ($historia['Estudiosimagen']) : ?>
                                <p><b>Estudios de Imagen</b></p>
                                <?= $historia['Estudiosimagen'] ?><br>
                            <?php endif; ?>

                        </div>

                    </div>
                </div>


                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">

                            <?php if ($historia['incapacidades']) : ?>
                                <p><b>Incapacidades</b></p>
                                <?php 
                                    $reemplazos = array(
                                        "Area" => "Área",
                                    );  
                                    $Incapacidades = str_replace(array_keys($reemplazos), array_values($reemplazos),$historia['incapacidades']);


                                    echo $Incapacidades;
                                 ?><br>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <br><br><br><br>
            <div class="col-md-12">
                <table class="table table-responsive table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">Fecha</th>
                            <th class="text-center">N° Sesión</th>
                            <th class="text-center">Paciente</th>
                            <th class="text-center">Firma</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($tipoHistoria == 2) {
                            $sesiones = mysqli_query($conn3, "SELECT * FROM sesionesAplicadas WHERE id = '{$_GET['id']}' ORDER BY sesion");
                        } else {
                            $sesiones = mysqli_query($conn3, "SELECT * FROM sesionesAplicadas WHERE historia_id = '{$idHistoria}' AND historia_tipo = '{$tipoHistoria}' ORDER BY sesion");
                        }
                        $contador = 0;
                        if ($sesiones) {
                            while ($row = mysqli_fetch_assoc($sesiones)) {
                            $contador++;
                            if (!empty($row['Firma'])) {
                                $Firma = "<img src='{$row['Firma']}' height='100' width='200'>";
                            } else {
                                $Firma = "No Firmado";
                            }
                        ?>
                                <tr>
                                    <td class="text-center"><?= $row['fechaAsistida'] ?></td>
                                    <td class="text-center"><?= $row['sesion'] ?></td>
                                    <td class="text-center"><?= $cliente['nombre_cliente'] ?></td>
                                    <td class="text-center"><?= $Firma ?></td>
                                </tr>
                            <?php
                            }
                        }
                        ?>
                        
                        
                    </tbody>
                </table>
            </div>
            <div class="col-md-12">
                <label for=""><b>Total de Sesiones Realizadas</b></label>
                <P><?php echo $contador ?></P>
            </div>
            <div class="col-md-12" align="center">
                <label for="">Firma del Doctor</label>
                <P><?php echo $firmaImg . "<br>" . utf8_encode($empresaNombre) ?></P>
            </div>


             <!-- division -->

        <!-- <table>
            <thead>
                <tr>
                    <td> -->
                        <!--place holder for the fixed-position header-->
                        <!-- div class="page-header-space"></div>
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

