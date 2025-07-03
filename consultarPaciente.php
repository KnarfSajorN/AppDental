<?php
if ($_POST['key']) {
    include 'funciones/funciones.php';
    include 'funciones/funcionesUtilidades.php';
    include 'config.php';
    $conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));
    $clienteId = $_POST['idCliente'];
    $nitEmpresa = $_POST['nit'];
    if ($_POST['key'] == 'showHistorias') {
        // echo "SELECT cl.* FROM empresasAfiliadas AS e JOIN salaControl AS c ON e.id = c.idEmpresa JOIN historicoControl AS hc ON c.id = hc.idControl JOIN conceptolaboral AS cl ON cl.idHistoria = hc.idHistoria WHERE cl.cliente_id = {$clienteId} AND e.NIT = '{$nitEmpresa}' GROUP BY cl.id;";
        $queryList = mysqli_query($conn3, "SELECT cl.* FROM 
            empresasAfiliadas AS e 
            INNER JOIN salaControl AS c ON e.id = c.idEmpresa 
            INNER JOIN historicoControl AS hc ON c.id = hc.idControl 
            INNER JOIN conceptolaboral AS cl ON cl.idHistoria = hc.idHistoria 
            WHERE cl.proceso = 1 
            AND cl.idHistoria > 0 
            AND cl.cliente_id = '{$clienteId}' 
            AND e.NIT = '{$nitEmpresa}' 
            GROUP BY hc.idHistoria;
        ") or die(var_dump(mysqli_error_list($conn3)));
        // $queryList = mysqli_query($conn3, "SELECT cl.* FROM empresasAfiliadas AS e JOIN salaControl AS c ON e.id = c.idEmpresa JOIN historicoControl AS hc ON c.id = hc.idControl JOIN conceptolaboral AS cl ON cl.idHistoria = hc.idHistoria WHERE cl.cliente_id = {$clienteId} AND e.NIT = '{$nitEmpresa}' GROUP BY cl.id;");
        $nrowl = mysqli_num_rows($queryList);
        $contadorHistoria = 1;
        while ($row_recordset32 = mysqli_fetch_array($queryList)) {
            $ID      = $row_recordset32['id'];
            $cliente_id      = $row_recordset32['cliente_id'];
            $usuario_id      = $row_recordset32['usuario_id'];
            $Fecha      = $row_recordset32['Fecha'];
            list($y, $m, $d) = explode("-", $Fecha);
            $Hora = $row_recordset32['Hora'];
            $firma = $row_recordset32['firma'];
            $xtipodeexa690 = explode("|", $row_recordset32['xtipodeexa690']);
            $xaptitudoc588 = explode("|", $row_recordset32['xaptitudoc588']);
            $xaptitudoc267 = explode("|", $row_recordset32['xaptitudoc267']);
            $xaptitudoc161 = explode("|", $row_recordset32['xaptitudoc161']);
            $xinformaci281 = explode("|", $row_recordset32['xinformaci281']);
            $xexaacutem307 = explode("|", $row_recordset32['xexaacutem307']);
            $complementos = [];
            $n = 0;
            foreach ($xexaacutem307 as $key => $value) {
                if ($value != "") {
                    $complementos[$n] = $value;
                    $n++;
                }
            }
            $xrecomenda954 = explode("|", $row_recordset32['xrecomenda954']);
            $xelpresent728 = $row_recordset32['xelpresent728'];
            $xincluiren405 = $row_recordset32['xincluiren405'];
            $xtipodepro824 = explode("|", $row_recordset32['xtipodepro824']);
            $recomendacion_particular = $row_recordset32['recomendacion_particular'];
            $recomendacion_general = $row_recordset32['recomendacion_general'];
            $consentimiento = $row_recordset32['consentimiento'];

            $queryList2 = mysqli_query($conn3, "SELECT * FROM  usuarios where ID = $usuario_id")  or die(var_dump(mysqli_error_list($conn3)));
            $nrowl2 = mysqli_num_rows($queryList2);
            while ($rowMotorizado = mysqli_fetch_array($queryList2)) {
                $empresaNombre      = $rowMotorizado['empresaNombre'];
                $pais               = $rowMotorizado['pais'];
                $ciudadMedico             = $rowMotorizado['ciudad'];
                $direccion          = $rowMotorizado['direccion'];
                $telefono           = $rowMotorizado['telefono'];
                $especialidad        = $rowMotorizado['especialidad'];
                $nit                = $rowMotorizado['nit'];
            }
            $Logo = "";
            $firmaImg = "";
            $queryList3 = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = $usuario_id")  or die(var_dump(mysqli_error_list($conn3)));
            $nrowl3 = mysqli_num_rows($queryList3);
            while ($rowMotorizado = mysqli_fetch_array($queryList3)) {
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
                $LogoF        = $rowMotorizado['logoF'];
                $firma        = $rowMotorizado['firma'];
                 if (strlen($LogoF) > 0) {
    $Logo = "<img src='{$Base}/logos/{$LogoF}' style='height: 3.5cm;width: auto;'>";
  }


  if (strlen($firma) > 0) {
      $firmaImg = "<img src='{$Base}/FirmasReg/{$firma}' height='100' width='330'>";
  }

}

            $fotoperfil = "";
            $queryList4 = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id = $cliente_id") or die(var_dump(mysqli_error_list($conn3)));
            $nrowl4 = mysqli_num_rows($queryList4);
            while ($rowMotorizado = mysqli_fetch_array($queryList4)) {
                $nombre_cliente             = $rowMotorizado['nombre_cliente'];
                $tipo_cliente = $rowMotorizado['tipo_cliente'];
                $CODI_CLIENTE               = $rowMotorizado['CODI_CLIENTE'];
                $fechaNacimiento            = $rowMotorizado['fechaNacimiento'];
                $celular_cliente            = $rowMotorizado['celular_cliente'];
                $primer_apellido            = $rowMotorizado['primer_apellido'];
                $segundo_apellido            = $rowMotorizado['segundo_apellido'];
                $primer_nombre            = $rowMotorizado['primer_nombre'];
                $segundo_nombre            = $rowMotorizado['segundo_nombre'];
                $seguro                     = $rowMotorizado['seguro'];
                $direccion_cliente          = $rowMotorizado['direccion_cliente'];
                $profesion_cliente          = $rowMotorizado['profesion_cliente'];
                $fotoperfil          = $rowMotorizado['fotoperfil'];
                $genero = $rowMotorizado['genero'];
                $discapacidad = $rowMotorizado['tipodiscapacidad'];
                $expedicionDocumento = $rowMotorizado['expedicionDocumento'];
                $ciudad = funcionMaster($rowMotorizado['codigo_ciudad'], 'id', 'Nombre_Tildes', 'Ciudades');
                $departamento = funcionMaster($rowMotorizado['codigo_departamento'], 'codigo', 'nombre', 'departamentos');
                $nombreEmpresa = funcionMaster($rowMotorizado['idEmpresa'], 'id', 'nombreEmpresa', 'empresasAfiliadas');
                $nitEmpresa = funcionMaster($rowMotorizado['idEmpresa'], 'id', 'NIT', 'empresasAfiliadas');

                $cargoR = $rowMotorizado['ocupacion'];
                if($fotoperfil <> ""){
                    $fotoperfil = "pascientes/".$fotoperfil;
                }
            }
            $Firma = "";
            $queryList5 = mysqli_query($conn3, "SELECT * FROM firmas where historia_id = $ID and cliente_id = $cliente_id and historia_nombre=38") or die(var_dump(mysqli_error_list($conn3)));
            $nrowl5 = mysqli_num_rows($queryList5);
            while ($rowMotorizado = mysqli_fetch_array($queryList5)) {
                $Firma           = $rowMotorizado['firma'];
            }
?>
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="heading<?= $contadorHistoria ?>">
                    <h4 class="panel-title">
                        <a class="collapse-controle collapsed text-black text-bold" data-toggle="collapse" data-parent="#accordion" href="#collapse<?= $contadorHistoria ?>" aria-expanded="false" aria-controls="collapse<?= $contadorHistoria ?>">
                            <?= $contadorHistoria ?> - Historia del <?= $Fecha ?> | <?= $Hora ?>
                            <span class="text-black" title="Imprimir Historia" onclick="window.open('SO_Imprimir_Historia?historiaClinica1=<?= $ID ?>')" style="z-index: 100; cursor:pointer;margin-left: 10px;"><i class="fa fa-print"></i></span>
                            <!-- <span class="text-black" title="Imprimir Incapacidad" onclick="window.open('imprimirDiscapacidad.php?historiaClinica1=<?= $ID ?>')" style="z-index: 100; cursor:pointer;margin-left: 10px;"><i class="fa fa-crutch"></i></span>
                            <span class="text-black" title="Imprimir Inter-Consulta" onclick="window.open('imprimirInterconsulta.php?historiaClinica1=<?= $ID ?>')" style="z-index: 100; cursor:pointer;margin-left: 10px;"><i class="fa fa-notes-medical"></i></span>
                            <span class="text-black" title="Imprimir Examenes" onclick="window.open('imprimirExamenes.php?historiaClinica1=<?= $ID ?>&modoExamanes=todo')" style="z-index: 100; cursor:pointer;margin-left: 10px;"><i class="fa fa-hand-holding-medical"></i></span>
                            <span class="text-black" title="Imprimir Recetas" onclick="window.open('imprimirRecetaH.php?idr=<?= $receta ?>&cliente=<?= $clienteId ?>')" style="z-index: 100; cursor:pointer;margin-left: 10px;"><i class="fa fa-prescription-bottle"></i></span> -->
                            <span class="expand-icon-wrap"><i class="fa expand-icon"></i></span>
                        </a>
                    </h4>
                </div>
                <div id="collapse<?= $contadorHistoria ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?= $contadorHistoria ?>" aria-expanded="false">
                    <div class="panel-body">
                        <div class="panel-body-icon"><a href="SO_Imprimir_Historia?historiaClinica1=<?= $ID ?>" target="blank_"><i class="fa fa-print"></i></a></div>
                        <div align="right">
                            Fecha <?php echo $Fecha . '-' . $Hora ?>
                        </div>
                        <hr><br>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-xs-3 bordeCaja">
                                    <p class="padding">Fecha ▼</p>
                                </div>
                                <div class="col-xs-3 bordeCaja">
                                    <p class="padding">Tipo de Examen ►</p>
                                </div>
                                <div class="col-xs-6 bordeCaja" style="height: 22px;">
                                    <p class="padding">
                                        <?php
                                        foreach ($xtipodeexa690 as $key => $value) {
                                            if ($value != "") {
                                                echo $value . ($key < (count($xtipodeexa690) - 1) ? ', ' : '');
                                            }
                                        }
                                        ?>
                                    </p>
                                </div>
                            </div>
                            <!-- Unida -->
                            <div class="row">
                                <div class="col-xs-1 bordeCaja">
                                    <p class="padding">Día</p>
                                </div>
                                <div class="col-xs-1 bordeCaja">
                                    <p class="padding">Mes</p>
                                </div>
                                <div class="col-xs-1 bordeCaja">
                                    <p class="padding">Año</p>
                                </div>
                                <div class="col-xs-4 bordeCaja">
                                    <p class="flex">Ciudad ▼</p>
                                </div>
                                <div class="col-xs-5 bordeCaja">
                                    <p class="flex">Departamento ▼</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-1 bordeCaja" style="min-height: 22px;">
                                    <p class="padding"> <?= $d ?> </p>
                                </div>
                                <div class="col-xs-1 bordeCaja" style="min-height: 22px;">
                                    <p class="padding"> <?= $m ?> </p>
                                </div>
                                <div class="col-xs-1 bordeCaja" style="min-height: 22px;">
                                    <p class="padding"> <?= $y ?> </p>
                                </div>
                                <div class="col-xs-4 bordeCaja" style="min-height: 22px;">
                                    <p class="flex"> <?= $ciudad ?> </p>
                                </div>
                                <div class="col-xs-5 bordeCaja" style="min-height: 22px;">
                                    <p class="flex"> <?= $departamento ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-9">
                                    <div class="row">
                                        <div class="col-xs-3 bordeCaja">
                                            <p class="flex">1er Apellido ▼</p>
                                        </div>
                                        <div class="col-xs-3 bordeCaja">
                                            <p class="flex">2do Apellido ▼</p>
                                        </div>
                                        <div class="col-xs-3 bordeCaja">
                                            <p class="flex">1er Nombre ▼</p>
                                        </div>
                                        <div class="col-xs-3 bordeCaja">
                                            <p class="flex">2do Nombre ▼</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-3 bordeCaja" style="min-height: 22px;">
                                            <p class="flex"> <?= $primer_apellido ?> </p>
                                        </div>
                                        <div class="col-xs-3 bordeCaja" style="min-height: 22px;">
                                            <p class="flex"> <?= $segundo_apellido ?> </p>
                                        </div>
                                        <div class="col-xs-3 bordeCaja" style="min-height: 22px;">
                                            <p class="flex"> <?= $primer_nombre ?> </p>
                                        </div>
                                        <div class="col-xs-3 bordeCaja" style="min-height: 22px;">
                                            <p class="flex"> <?= $segundo_nombre ?> </p>
                                        </div>
                                    </div>
                                    <!-- SEPARADOR -->
                                    <div class="row">
                                        <div class="col-xs-2 bordeCaja">
                                            <p class="flex">Tipo D.I. ▼</p>
                                        </div>
                                        <div class="col-xs-3 bordeCaja">
                                            <p class="flex">No. Documento ▼</p>
                                        </div>
                                        <div class="col-xs-3 bordeCaja">
                                            <p class="flex">Expedido en ▼</p>
                                        </div>
                                        <div class="col-xs-2 bordeCaja">
                                            <p class="flex">Genero ▼</p>
                                        </div>
                                        <div class="col-xs-2 bordeCaja">
                                            <p class="flex">Edad ▼</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-2 bordeCaja" style="min-height: 22px;">
                                            <p class="flex"><?= $tipo_cliente ?></p>
                                        </div>
                                        <div class="col-xs-3 bordeCaja" style="min-height: 22px;">
                                            <p class="flex"> <?= $CODI_CLIENTE ?> </p>
                                        </div>
                                        <div class="col-xs-3 bordeCaja" style="min-height: 22px;">
                                            <p class="flex"> <?= $expedicionDocumento ?> </p>
                                        </div>
                                        <div class="col-xs-2 bordeCaja" style="min-height: 22px;">
                                            <p class="flex"> <?= $genero ?> </p>
                                        </div>
                                        <div class="col-xs-2 bordeCaja" style="min-height: 22px;">
                                            <p class="flex"> <?= (Funcion_Edad_Paciente($fechaNacimiento)['Años']) ?> </p>
                                        </div>
                                    </div>
                                    <!-- SEPARADOR -->
                                    <div class="row">
                                        <div class="col-xs-4 bordeCaja">
                                            <p class="flex">Ocupación ▼</p>
                                        </div>
                                        <div class="col-xs-4 bordeCaja">
                                            <p class="flex">Empresa ▼</p>
                                        </div>
                                        <div class="col-xs-4 bordeCaja">
                                            <p class="flex">N.I.T. ▼</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-4 bordeCaja" style="min-height: 22px;">
                                            <p class="flex"> <?= $cargoR ?></p>
                                        </div>
                                        <div class="col-xs-4 bordeCaja" style="min-height: 22px;">
                                            <p class="flex"> <?= $nombreEmpresa ?> </p>
                                        </div>
                                        <div class="col-xs-4 bordeCaja" style="min-height: 22px;">
                                            <p class="flex"> <?= $nitEmpresa ?> </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-3 imgFluid bordeCaja">
                                    <img src="{$Base}<?= ($fotoperfil != '' ? $fotoperfil : 'ImagenesHistoria/SaludOcupacional.jpg') ?>" alt="">
                                </div>
                            </div>
                            <!-- Unida -->
                            <div class="row">
                                <div class="col-xs-12 bordeCaja">
                                    <p class="padding">Información del Concepto Laboral ▼</p>
                                </div>
                                <?php
                                $contador = 2;
                                $xinformaci281 = array_filter($xinformaci281);
                                foreach ($xinformaci281 as $key => $value) {
                                    ($contador == 0 ? $contador = 2 : '');
                                ?>
                                    <div class="col-xs-6 bordeCaja" style="min-height: 22px;">
                                        <p class="flex"> <?= $value ?> </p>
                                    </div>
                                    <?php
                                    $contador--;
                                }
                                if ($contador > 0) {
                                    while ($contador > 0) {
                                    ?>
                                        <div class="col-xs-6 bordeCaja" style="min-height: 22px;">
                                            <p class="flex"> </p>
                                        </div>
                                <?php
                                        $contador--;
                                    }
                                }
                                ?>
                                <div class="col-xs-12 bordeCaja">
                                    <p style="padding: 0 5px 0 5px; text-align: justify; text-justify: inter-word;">Recomendaciones Particulares: <?= $recomendacion_particular ?></p>
                                </div>
                                <!-- SEPARADOR -->
                                <?php
                                $arrayConcepto = [
                                    "Ingreso" => "Aptitud Ocupacional de Ingreso ▼",
                                    "Periodico" => "Aptitud Ocupacional Periódico ▼",
                                    "Egreso" => "Aptitud Ocupacional de Retiro ▼"
                                ];
                                foreach ($arrayConcepto as $key => $value) {
                                    if (in_array($key, $xtipodeexa690)) {
                                ?>
                                        <div class="col-xs-12 bordeCaja">
                                            <p class="padding"><?= $value ?></p>
                                        </div>
                                        <?php
                                        foreach (($key == "Ingreso" ? array_filter($xaptitudoc588) : ($key == "Periodico" ? array_filter($xaptitudoc267) : ($key == "Egreso" ? array_filter($xaptitudoc161) : null))) as $key => $value) {
                                            ($contador == 0 ? $contador = 3 : '');
                                        ?>
                                            <div class="col-xs-12 bordeCaja" style="min-height: 22px;">
                                                <p class="flex"> <?= $value ?> </p>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                <?php
                                    }
                                }
                                ?>

                                <!-- SEPARADOR -->
                                <div class="col-xs-12 bordeCaja">
                                    <p class="padding">Exámenes Complementarios ▼</p>
                                </div>
                                <?php
                                $contador = 4;
                                foreach (array_filter($complementos) as $key => $value) {
                                    ($contador == 0 ? $contador = 4 : '');
                                ?>
                                    <div class="col-xs-3 bordeCaja" style="min-height: 22px;">
                                        <p class="flex"> <?= $value ?> </p>
                                    </div>
                                    <?php
                                    $contador--;
                                }
                                if ($contador > 0) {
                                    while ($contador > 0) {
                                    ?>
                                        <div class="col-xs-3 bordeCaja" style="min-height: 22px;">
                                            <p class="flex"> </p>
                                        </div>
                                <?php
                                        $contador--;
                                    }
                                }
                                ?>
                                <div class="col-xs-12 bordeCaja">
                                    <p class="padding">Recomendaciones ▼</p>
                                </div>
                                <?php
                                $contador = 4;
                                foreach (array_filter($xrecomenda954) as $key => $value) {
                                    ($contador == 0 ? $contador = 4 : '');
                                ?>
                                    <div class="col-xs-3 bordeCaja" style="min-height: 22px;">
                                        <p class="flex"> <?= $value ?> </p>
                                    </div>
                                    <?php
                                    $contador--;
                                }
                                if ($contador > 0) {
                                    while ($contador > 0) {
                                    ?>
                                        <div class="col-xs-3 bordeCaja" style="min-height: 22px;">
                                            <p class="flex"> </p>
                                        </div>
                                <?php
                                        $contador--;
                                    }
                                }
                                ?>
                                <!-- separador -->
                                <div class="col-xs-10 bordeCaja sizeFont" style="min-height: 22px;">
                                    <p class="flex" style="justify-content: flex-end; padding: 0 5px 0 0;">El Presente Concepto de Aptitud Laboral se Expide Según el Profesiograma o Perfil del Cargo Conocido por la IPS ►</p>
                                </div>
                                <div class="col-xs-1 bordeCaja" style="min-height: 22px; border:none !important;">
                                    <div class="col-xs-6 bordeCaja" style="min-height: 22px;">
                                        <p class="flex">Si</p>
                                    </div>
                                    <div class="col-xs-6 bordeCaja" style="min-height: 22px;">
                                        <p class="flex"> <?= (preg_match("/si/i", $xelpresent728) ? 'X' : '') ?> </p>
                                    </div>
                                </div>
                                <div class="col-xs-1 bordeCaja" style="min-height: 22px; border:none !important;">
                                    <div class="col-xs-6 bordeCaja" style="min-height: 22px;">
                                        <p class="flex">No</p>
                                    </div>
                                    <div class="col-xs-6 bordeCaja" style="min-height: 22px;">
                                        <p class="flex"> <?= (preg_match("/no/i", $xelpresent728) ? 'X' : '') ?> </p>
                                    </div>
                                </div>
                                <!-- separador -->
                                <div class="col-xs-10 bordeCaja sizeFont" style="min-height: 22px;">
                                    <p class="flex" style="justify-content: flex-end; padding: 0 5px 0 0;">Incluir en Programa de Vigilancia Epidemiologica ►</p>
                                </div>
                                <div class="col-xs-1 bordeCaja" style="min-height: 22px; border:none !important;">
                                    <div class="col-xs-6 bordeCaja" style="min-height: 22px;">
                                        <p class="flex">Si</p>
                                    </div>
                                    <div class="col-xs-6 bordeCaja" style="min-height: 22px;">
                                        <p class="flex"> <?= (preg_match("/si/i", $xincluiren405) ? 'X' : '') ?> </p>
                                    </div>
                                </div>
                                <div class="col-xs-1 bordeCaja" style="min-height: 22px; border:none !important;">
                                    <div class="col-xs-6 bordeCaja" style="min-height: 22px;">
                                        <p class="flex">No</p>
                                    </div>
                                    <div class="col-xs-6 bordeCaja" style="min-height: 22px;">
                                        <p class="flex"> <?= (preg_match("/no/i", $xincluiren405) ? 'X' : '') ?> </p>
                                    </div>
                                </div>
                                <!-- separador -->
                                <div class="col-xs-10 bordeCaja sizeFont" style="min-height: 22px;">
                                    <p class="flex" style="justify-content: flex-end; padding: 0 5px 0 0;">Tipo de Programa de Vigilancia Epidemiológica a Incluir ▼</p>
                                </div>
                                <div class="col-xs-2 bordeCaja" style="min-height: 22px;"></div>
                                <?php
                                $contador = 4;
                                foreach (array_filter($xtipodepro824) as $key => $value) {
                                    ($contador == 0 ? $contador = 4 : '');
                                ?>
                                    <div class="col-xs-3 bordeCaja" style="min-height: 22px;">
                                        <p class="flex"> <?= $value ?> </p>
                                    </div>
                                    <?php
                                    $contador--;
                                }
                                if ($contador > 0) {
                                    while ($contador > 0) {
                                    ?>
                                        <div class="col-xs-3 bordeCaja" style="min-height: 22px;">
                                            <p class="flex"> </p>
                                        </div>
                                <?php
                                        $contador--;
                                    }
                                }
                                ?>
                                <!-- separador -->
                                <div class="col-xs-12 bordeCaja sizeFont" style="min-height: 22px;">
                                    <p class="padding">Recomendaciones Generales ▼</p>
                                </div>
                                <div class="col-xs-12 bordeCaja sizeFont" style="min-height: 22px;">
                                    <p style="padding: 0 5px 0 5px; text-align: justify; text-justify: inter-word; text-transform: uppercase;">
                                        <?= $recomendacion_general ?>
                                    </p>
                                </div>
                                <!-- SEPARADOR -->
                                <div class="col-xs-12 bordeCaja sizeFont">
                                    <p class="padding">Consentimiento Informado del Aspirante o Trabajador ▼</p>
                                </div>
                                <div class="col-xs-12 bordeCaja sizeFont" style="border:none !important;">
                                    <p style="padding: 0 5px 0 5px; text-align: justify; text-justify: inter-word;">
                                        <?= $consentimiento ?>
                                    </p>
                                </div>
                                <!-- SEPARADOR -->
                                <div class="col-xs-12 bordeCaja">
                                    <p class="padding">Firmas ▼</p>
                                </div>
                                <div class="col-xs-6 bordeCaja sizeFont">
                                    <p class="padding">Médico Ocupacional ▼</p>
                                </div>
                                <div class="col-xs-6 bordeCaja sizeFont">
                                    <p class="padding">Aspirante a Trabajador ▼</p>
                                </div>
                                <div class="col-xs-6 bordeCaja sizeFont" style="min-height: 174.84px; padding: 5px;">
                                    <?php
                                    echo  $firmaImg;
                                    ?>
                                    _______________________________________<br>
                                    <?php echo $empresaNombre ?><br>
                                    <?php echo $especialidad ?><br>
                                    <?php echo $nit ?>L<br>
                                    Registro Médico<br>
                                </div>
                                <div class="col-xs-6 bordeCaja sizeFont" style="min-height: 174.84px; padding: 5px;">
                                    <?php if (strlen($Firma) > 10) {
                                        echo "<img src='$Firma'  style='height:70px; width:150px'>";
                                    }
                                    ?>
                                    _______________________________________<br>
                                    Nombre: <?php echo $nombre_cliente; ?> <br>
                                    C.C. <?php echo $CODI_CLIENTE; ?>
                                </div>
                                <!-- SEPARADOR -->
                                <div class="col-xs-12 bordeCaja" style="border:none !important;">
                                    <p style="text-align: justify; text-justify: inter-word;"> La Presente Certificación se Expide con Base en la Historia Clínica Ocupacional del Trabajador, la Cual Tiene un Carácter Confidencial, y Amparada con Base al Consentimiento Informado y con Destino a la Hoja de Vida del Trabajador.</p>
                                </div>
                                <div class="col-xs-12 bordeCaja sizeFont" align="center" style="border:none !important; margin-top:15px">
                                    <p class="flex" style="padding: 0 5px 0 5px; text-align: justify; text-justify: inter-word;"><?= $pieF ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
            $contadorHistoria++;
        }
    } else if ($_POST['key'] == 'showArchivos') {
        $queryImg = mysqli_query($conn3, "SELECT * FROM archivos  where cliente_id = '$clienteId'");
        $nrowlER = mysqli_num_rows($queryImg);
        while ($resulImg = mysqli_fetch_array($queryImg)) {
            $nombreArchivo2 = "";
            $nombreArchivo = $resulImg['codigo'];
            $extencion = explode(".", $nombreArchivo);
            $arrayFormato = ['pdf', 'txt', 'xlsx', 'xls', 'jpg', 'jpeg', 'png', 'rar', 'zip', 'docx'];
            $arrayIcon = ['file-pdf', 'file', 'file-excel', 'file-excel', 'file-image', 'file-image', 'file-image', 'file-archive', 'file-archive', 'file-word'];
            $pos = array_search($extencion[count($extencion) - 1], $arrayFormato);
            if ($pos === false) {
                $pos = 1;
            }
            if (strlen($nombreArchivo) > 31) {
                for ($i = 0; $i < 29; $i++) {
                    $nombreArchivo2 .= $nombreArchivo[$i];
                }
                $nombreArchivo = $nombreArchivo2 . "..." . $extencion[count($extencion) - 1];
                # code...
            }
            $sizeFile = number_format(((filesize("archivos/" . $resulImg['codigo']) / 8)), 2, ',', '');
            // 1 Byte = 8 Bit
            // 1 Kilobyte = 1.024 Bytes
            // 1 Megabyte = 1.048.576 Bytes
            // 1 Gigabyte = 1.073.741.824 Bytes
            // 1 Terabyte = 1.099.511.627.776 Bytes
            if ($sizeFile >= 1099511627776) {
                $sizeFile = number_format(($sizeFile / 1099511627776), 2, ',', '') . " TB";
            } else if ($sizeFile >= 1073741824) {
                $sizeFile = number_format(($sizeFile / 1073741824), 2, ',', '') . " GB";
            } else if ($sizeFile >= 1048576) {
                $sizeFile = number_format(($sizeFile / 1048576), 2, ',', '') . " MB";
            } else if ($sizeFile >= 1024) {
                $sizeFile = number_format(($sizeFile / 1024), 2, ',', '') . " KB";
            } else {
                $sizeFile .= " B";
            }

        ?>
            <div class="col-lg-3 col-md-4 col-sm-12">
                <div class="card">
                    <div class="file">
                        <a href="archivos/<?php echo $resulImg['codigo']; ?>" target="blank_">
                            <div class="hover">
                                <button type="button" class="btn btn-icon btn-danger" onclick="window.open('archivos/<?php echo $resulImg['codigo']; ?>')">
                                    <i class="fa fa-eye" style="margin-right: 5px"></i> |
                                    <i class="fa fa-download" style="margin-left: 5px"></i>
                                </button>
                            </div>
                            <div class="icon">
                                <i class="fa fa-<?= $arrayIcon[$pos] ?> text-info"></i>
                            </div>
                            <div class="file-name">
                                <p class="m-b-5 text-muted"><?= $nombreArchivo ?></p>
                                <small>Size: <?= $sizeFile ?> <span class="date text-muted"><?= $resulImg['fecha'] ?></span></small>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
<?php
        }
    }
    exit();
}
// server should keep session data for AT LEAST 1 hour
ini_set('session.gc_maxlifetime', 10800);
// each client should remember their session id for EXACTLY 1 hour
session_set_cookie_params(10800);
session_start(); // ready to go!

$enlace_actual = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

include 'funciones/funciones.php';
include 'funciones/funcionesUtilidades.php';
include 'config.php';
if (count($_SESSION) === 0 || (isset($_GET['id']) AND $_SESSION['email_fe'] != $_GET['id'])) {
    header("Location: salirPaciente.php");
}

include 'funciones/conn3.php';

$ID = $_GET['id'];
$ususario_id = $_SESSION['ID'];
$tipo = $_SESSION['tipo'];
// para el tema de los acentos con mysql
header("Content-Type: text/html;charset=utf-8");
// para el tema de los acentos con mysql

auditorMaster($ususario_id, '2', $enlace_actual, '-');

//echo "<pre>";
//print_r($_SESSION);
//echo "</pre>";

$usuario_id_relacionado = $_SESSION['usuario_id_relacionado'];

$queryList = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = '$usuario_id_relacionado'");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $LogoF               = $rowMotorizado['logoF'];

    if (strlen($LogoF) > 0) {
        $Logo = "<img src='{$Base}/logos/{$LogoF}' style='height: 3.5cm;width: auto;'>";
    }
}

$queryList = mysqli_query($conn3, "SELECT * FROM empresasAfiliadas where id = '{$_SESSION['id']}'");

$nrowl = mysqli_num_rows($queryList);
while ($row_recordset32 = mysqli_fetch_array($queryList)) {
    $id = $row_recordset32['id'];
    $idDoctor = $row_recordset32['idDoctor'];
    $nombreEmpresa = $row_recordset32['nombreEmpresa'];
    $RUTCC = $row_recordset32['RUTCC'];
    $NIT = $row_recordset32['NIT'];
    $razonSocial = $row_recordset32['razonSocial'];
    $direccionEmpresa = $row_recordset32['direccionEmpresa'];
    $ciudadEmpresa = $row_recordset32['ciudadEmpresa'];
    $telefonoEmpresa = $row_recordset32['telefonoEmpresa'];
    $nombreContactoEmpresa = $row_recordset32['nombreContactoEmpresa'];
    $telefonoContactoEmpresa = $row_recordset32['telefonoContactoEmpresa'];
    $correoContactoEmpresa = $row_recordset32['correoContactoEmpresa'];
    $conoceProfesiograma = $row_recordset32['conoceProfesiograma'];
    $clave = $row_recordset32['clave'];
    $estado = $row_recordset32['estado'];
    $created_at = $row_recordset32['created_at'];
    $updated_at = $row_recordset32['updated_at'];
}

if (isset($_GET['key']) && is_numeric($_GET['key'])) {
    $contadorHistory = mysqli_query($conn3, "SELECT cl.* FROM 
        empresasAfiliadas AS e 
        INNER JOIN salaControl AS c ON e.id = c.idEmpresa 
        INNER JOIN historicoControl AS hc ON c.id = hc.idControl 
        INNER JOIN conceptolaboral AS cl ON cl.idHistoria = hc.idHistoria 
        WHERE cl.proceso = 1 
        AND cl.idHistoria > 0 
        AND cl.cliente_id = '{$_GET['key']}' 
        AND e.id = '{$id}'
        GROUP BY hc.idHistoria;
    ");
} else {
    $contadorHistory = mysqli_query($conn3, "SELECT cl.* FROM empresasAfiliadas AS e JOIN salaControl AS c ON e.id = c.idEmpresa JOIN historicoControl AS hc ON c.id = hc.idControl JOIN conceptolaboral AS cl ON cl.idHistoria = hc.idHistoria WHERE e.id = {$id} GROUP BY cl.id");
}
$numHistoryCertificado = mysqli_num_rows($contadorHistory);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> <?php echo $sistema ?> </title>
    <!-- Tell the browser to be responsive to screen width -->

    <!-- para el tema de los acentos con mysql -->

    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />

    <!-- para el tema de los acentos con mysql -->


    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="./css/stylePanel.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <style type="text/css">
        .bordeCaja {
            padding: 0;
            border: 1px solid black;
        }

        .bordeCaja p {
            padding: 0;
            margin: 0;
            display: flex;
            align-items: center;
        }

        .bordeCaja img {
            width: 100%;
            height: 130px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .bordeCaja .flex {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .bordeCaja .padding {
            padding: 0 0 0 5px;
        }

        .sizeFont {
            font-size: 12px;
        }

        .padingBox.center {
            padding: 5px;
            text-align: center;
        }

        .dataTables_length {
            display: none;
        }
    </style>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="plugins/iCheck/all.css">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="plugins/colorpicker/bootstrap-colorpicker.min.css">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="plugins/select2/select2.min.css">
    <!-- Theme style -->

    <link rel="stylesheet" href="plugins/morris/morris.css">

    <!-- <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">   -->
    <link rel="shortcut icon" type="image/x-icon" href="./icono.ico">

    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load.
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">  -->

    <link rel="stylesheet" type="text/css" href="plugins/DataTablesK2/datatables.css" />

    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <link rel="stylesheet" href="plugins/fullcalendar/fullcalendar.min.css">
    <link rel="stylesheet" href="plugins/fullcalendar/fullcalendar.print.css" media="print">
    <!-- Theme style -->

    <!--End of Zendesk Chat Script-->


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <!--Start of Zendesk Chat Script-->
    <!-- <script type="text/javascript">
        window.$zopim || (function(d, s) {
            var z = $zopim = function(c) {
                    z._.push(c)
                },
                $ = z.s =
                d.createElement(s),
                e = d.getElementsByTagName(s)[0];
            z.set = function(o) {
                z.set.
                _.push(o)
            };
            z._ = [];
            z.set._ = [];
            $.async = !0;
            $.setAttribute("charset", "utf-8");
            $.src = "https://v2.zopim.com/?65r3mACnIFh8hYjJwvyl5pg2FZqM7yDU";
            z.t = +new Date;
            $.
            type = "text/javascript";
            e.parentNode.insertBefore($, e)
        })(document, "script");
    </script> -->



</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <div class="text-center card-box" style="margin-top: 70px;">
                    <div class="member-card">
                        <div class="thumb-xl member-thumb m-b-10 center-block">
                            <div class="imgPrueba" style="width:200px; height: 180px; margin: auto; box-shadow: 0px 1px 6px #000;">
                                <a href="consultarPaciente?id=<?= $_SESSION['email_fe'] ?>"><img src="<?php echo $Logo ?>" id="imgCliente" class="img-fluid img-thumbnail" alt="profile-image" style="width:100%; height: 100%;"></a>
                            </div>
                            <!-- <img src="https://medicalsoftplus.com/co573/pascientes/<?= ($fotoperfil == "" ? 'Test.jpg' : $fotoperfil) ?>" id="imgCliente" class="img-fluid img-circle img-thumbnail" alt="profile-image" style="width:200px; height: 200px;"> -->
                            <!-- <img src="https://medicalsoftplus.com/co573/pascientes/107__2021-12-09_15-09-03__Test.jpg" id="imgCliente" class="img-circle img-thumbnail img-fluid" alt="profile-image" style="max-height: 400px; max-width:300px;"> -->
                            <!-- <img src="https://bootdey.com/img/Content/avatar/avatar6.png" id="imgCliente" class="img-circle img-thumbnail" alt="profile-image" style="max-width:100%;"> -->
                        </div>

                        <div class="">
                            <hr>
                            <!-- <h4 class="m-b-5" id="nombre"><?= $nombreEmpresa ?></h4> -->
                            <!-- <p class="text-muted">@johndoe</p> -->
                        </div>

                        <div class="text-left m-t-40">
                            <p class="text-muted font-13"><strong>Nombre Empresa :</strong> <br> <span class="m-l-15" id="nombreEmpresa"><?= $nombreEmpresa ?></span></p>
                            <p class="text-muted font-13"><strong>Correo Empresa :</strong> <br> <span class="m-l-15" id="correoEmpresa"><?= $correoContactoEmpresa ?></span></p>
                            <p class="text-muted font-13"><strong>Telefono :</strong> <br> <span class="m-l-15" id="telefonoEmpresa"><?= ($telefonoEmpresa ? $telefonoEmpresa : $telefonoContactoEmpresa) ?></span></p>
                        </div>

                        <ul class="social-links list-inline m-t-30">
                            <li>
                                <a title="Contador de Historias" style="width: 150%; border-radius: 40%" class="text-success" href="#"><i class="fa fa-book-medical"></i> <span style="margin-left: 5px;"> <?= ($numHistoryCertificado >= 100 ? "99+" : $numHistoryCertificado) ?> </span></a>
                            </li>
                        </ul>
                    </div>
                </div> <!-- end card-box -->

                <div class="card-box">
                    <h4 class="header-title" align="center" style="font-size: 30px;">Bienvenido</h4>
                    <hr>
                    <!-- <div class="p-b-2" style="display: flex; align-items: center; justify-content:center">
                        <a href="#" class="bg-primary" align="center">
                            <span class="logo-lg"> <img src="logos/<?php echo $LogoF ?>" style="width: 100%;height: 28vh"> </span>
                        </a>
                    </div> -->
                    <div class="p-b-2" style="display: flex; align-items: center;">
                        <a href="salirPaciente.php?usuario=<?=$_SESSION['usuario_id_relacionado']?>" class="btn btn-danger btn-block text-bold">CERRAR SESION</a>
                    </div>
                </div>
            </div> <!-- end col -->


            <div class="col-md-8 col-lg-9" style="height: 100%;border-left: 1px solid #c3c3c3;">
                <div class="">
                    <div class="">
                        <ul class="nav nav-tabs navtab-custom">
                            <?php if (!isset($_GET['key'])) : ?>
                                <li class="active">
                                    <a href="#trabajadores" onclick="($('#cambiaCarpeta').hasClass('fa-folder') ? '' : ($('#cambiaCarpeta').removeClass('fa-folder-open').addClass('fa-folder')))" data-toggle="tab" aria-expanded="true">
                                        <span class="visible-xs"><i class="fa fa-folder" id="cambiaCarpeta"></i></span>
                                        <span class="hidden-xs">Trabajadores</span>
                                    </a>
                                </li>
                            <?php else : ?>
                                <li class="active">
                                    <a href="#historias" onclick="($('#cambiaCarpeta').hasClass('fa-folder') ? '' : ($('#cambiaCarpeta').removeClass('fa-folder-open').addClass('fa-folder')))" data-toggle="tab" aria-expanded="false">
                                        <span class="visible-xs"><i class="fa fa-book"></i></span>
                                        <span class="hidden-xs">Historias</span>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <!-- <li class="">
                                <a href="#archivos" onclick="($('#cambiaCarpeta').hasClass('fa-folder') ? ($('#cambiaCarpeta').removeClass('fa-folder').addClass('fa-folder-open')) : '')" data-toggle="tab" aria-expanded="true">
                                    <span class="visible-xs"><i class="fa fa-folder" id="cambiaCarpeta"></i></span>
                                    <span class="hidden-xs">ARCHIVOS</span>
                                </a>
                            </li> -->
                            <!-- <li class="">
                                <a href="#settings" data-toggle="tab" aria-expanded="false">
                                    <span class="visible-xs"><i class="fa fa-cog"></i></span>
                                    <span class="hidden-xs">SETTINGS</span>
                                </a>
                            </li> -->
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane <?= (isset($_GET['key']) ? 'active' : '') ?>" id="historias">
                                <div class="div">
                                    <div class="col-sm-12">
                                        <div class="panel-group drop-accordion" id="accordion" role="tablist" aria-multiselectable="true">
                                            <!-- <div class="panel panel-default">
                                                <div class="panel-heading" role="tab" id="headingOne">
                                                    <h4 class="panel-title">
                                                        <a class="collapse-controle collapsed text-black text-bold" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                            Aun no posee Historias
                                                            <span class="expand-icon-wrap"><i class="fa expand-icon"></i></span>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false">
                                                    <div class="panel-body">
                                                        <div class="panel-body-icon"><i class="fa fa-book"></i></div>
                                                        Tenga un buen dia.
                                                    </div>
                                                </div>
                                            </div> -->
                                        </div>
                                        <!-- /#accordion -->
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="archivos">
                                <div id="main-content" class="file_manager">
                                    <div class="container">
                                        <div class="row clearfix" id="impArchivos">
                                            <div class="col-lg-3 col-md-4 col-sm-12">
                                                <div class="card">
                                                    <div class="file">
                                                        <a href="javascript:void(0);">
                                                            <div class="hover">
                                                                <button type="button" class="btn btn-icon btn-danger">
                                                                    <i class="fa fa-trash"></i>
                                                                </button>
                                                            </div>
                                                            <div class="icon">
                                                                <i class="fa fa-file text-info"></i>
                                                            </div>
                                                            <div class="file-name">
                                                                <p class="m-b-5 text-muted">Document_2017.doc</p>
                                                                <small>Size: 42KB <span class="date text-muted">Nov 02, 2017</span></small>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane <?= (!isset($_GET['key']) ? 'active' : '') ?>" id="trabajadores">
                                <div class="container-fluid">
                                    <div class="col-md-12">
                                        <table class="table" id="tablaTrabajadores" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <td>Nombre</td>
                                                    <td>CI</td>
                                                    <td>Telefono</td>
                                                    <td>Correo</td>
                                                    <td>Acciones</td>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="tab-pane" id="settings">
                                <form role="form">
                                    <div class="form-group">
                                        <label for="FullName">Full Name</label>
                                        <input type="text" value="John Doe" id="FullName" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="Email">Email</label>
                                        <input type="email" value="first.last@example.com" id="Email" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="Username">Username</label>
                                        <input type="text" value="john" id="Username" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="Password">Password</label>
                                        <input type="password" placeholder="6 - 15 Characters" id="Password" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="RePassword">Re-Password</label>
                                        <input type="password" placeholder="6 - 15 Characters" id="RePassword" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="AboutMe">About Me</label>
                                        <textarea style="height: 125px" id="AboutMe" class="form-control">Loren gypsum dolor sit mate, consecrate disciplining lit, tied diam nonunion nib modernism tincidunt it Loretta dolor manga Amalia erst volute. Ur wise denim ad minim venial, quid nostrum exercise ration perambulator suspicious cortisol nil it applique ex ea commodore consequent.</textarea>
                                    </div>
                                    <button class="btn btn-primary waves-effect waves-light w-md" type="submit">Save</button>
                                </form>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
        <!-- end row -->
</body>

<?php
include("footer1.php");
include 'dataTablePaginacion.php';
function Encriptar($valor)
{
    $Sc = base64_decode("keyMaster");
    $Texto = urlencode(openssl_encrypt($valor, "AES-256-CBC", $Sc));
    return $Texto;
}
?>
<script type="text/javascript">
    // $(document).ready(function() {

    // });
</script>


<script type="text/javascript">
    const showInfo = (rutaTipo) => {
        let date = {
            idCliente: <?= (isset($_GET['key']) ? $_GET['key'] : "false") ?>,
            nit: '<?= (isset($_SESSION['nit']) ? $_SESSION['nit'] : "false") ?>',
            // ATENCION: "rutaTipo" indicara que necesitamos imprimir.
            // Ya sea historias, archivos, entre otros...
            key: rutaTipo,
        };
        $.ajax({
            url: "consultarPaciente.php",
            data: date,
            type: 'POST',
            success: function(resp) {
                // Con esta condicion realizaremos la impresion en las distintas areas
                console.log(resp);
                if (resp && rutaTipo == "showHistorias") {
                    $("#accordion").html(resp);
                    $('.panel-heading').click(function(e) {
                        $('.panel-heading').removeClass('tab-collapsed');
                        var collapsCrnt = $(this).find('.collapse-controle').attr('aria-expanded');
                        // console.log(collapsCrnt);
                        if (collapsCrnt != 'true') {
                            $(this).addClass('tab-collapsed');
                        }
                    });
                } else if (resp && rutaTipo == "showArchivos") {
                    // console.log(resp);
                    $("#impArchivos").html(resp);
                    // $('.panel-heading').click(function(e) {
                    //     $('.panel-heading').removeClass('tab-collapsed');
                    //     var collapsCrnt = $(this).find('.collapse-controle').attr('aria-expanded');
                    //     // console.log(collapsCrnt);
                    //     if (collapsCrnt != 'true') {
                    //         $(this).addClass('tab-collapsed');
                    //     }
                    // });
                }
            },
        });
    }
    window.addEventListener('load', () => {
        <?php if (isset($_GET['key'])) : ?>
            showInfo("showHistorias");
        <?php endif; ?>
        
        let tablaOne;
        // "empresasAfiliadas AS e JOIN salaControl AS c ON e.id = c.idEmpresa JOIN historicoControl AS hc ON c.id = hc.idControl JOIN conceptolaboral AS cl ON cl.idHistoria = hc.idHistoria JOIN cliente AS ct ON cl.cliente_id = ct.cliente_id"
        tablaOne = tablaDinamica({
            input: "#tablaTrabajadores",
            selectFrom: "<?= Encriptar("ct.*") ?>",
            name: `<?= Encriptar("
                empresasAfiliadas AS e 
                INNER JOIN salaControl AS c ON e.id = c.idEmpresa 
                INNER JOIN cliente AS ct ON c.idCliente = ct.cliente_id
            ") ?>`,
            camposValue: "<?= Encriptar(json_encode(['nombre_cliente', 'CODI_CLIENTE', 'whatsapp', 'correo_cliente'])) ?>",
            clausula: {
                data: "<?= Encriptar("e.NIT = '" . $_SESSION['nit'] . "'") ?>",
                value: [''],
            },
            likeWhere: "<?= Encriptar('ct.nombre_cliente || ct.CODI_CLIENTE || ct.whatsapp || ct.correo_cliente') ?>",
            order: "<?= Encriptar(json_encode(['GROUP BY' => 'c.idCliente', 'ORDER BY' => 'ct.$0'])) ?>",
            btns: btoa(JSON.stringify({
                btn1: btoa(JSON.stringify({
                    style: false,
                    class: "<?= Encriptar("fa fa-id-card-alt text-primary fa-2x") ?>",
                    id: false,
                    href: "<?= Encriptar("consultarPaciente?key=$0") ?>",
                    title: "<?= Encriptar("Certificados") ?>",
                    event: "<?= Encriptar("") ?>",
                    target: "<?= Encriptar("blank_") ?>",
                    dataPlacement: false,
                    dataToggle: false,
                    dataOriginalTitle: false,
                    value: "<?= Encriptar("cliente_id") ?>"
                })),
            })),
            carapter: "true",
            tbody: true,
        });
        // remove filter de entradas
        tablaOne.dataTable({
            paging: false,
            ordering: false,
            info: false
        }).draw().ajax.reload();
        // showInfo("showArchivos");
    });
</script>

