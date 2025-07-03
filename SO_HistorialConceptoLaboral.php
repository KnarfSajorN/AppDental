<?php 
   include 'header.php';
   include 'menu.php';

   $clienteId = $_GET['clienteId']; 
   $usuarioId = $_SESSION['ID'];

   $cliente_id_modulo = $clienteId;//Evoluciones


   $queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id = $clienteId");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {

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
    $genero = $rowMotorizado['genero'];
    $fotoperfil          = $rowMotorizado['fotoperfil'];
    $discapacidad = $rowMotorizado['tipodiscapacidad'];
    $expedicionDocumento = $rowMotorizado['expedicionDocumento'];
    $idEmpresa = $rowMotorizado['idEmpresa'];
    $cargoR = $rowMotorizado['ocupacion'];
    $ciudad = funcionMaster($rowMotorizado['codigo_ciudad'], 'id', 'Nombre_Tildes', 'Ciudades');
    $departamento = funcionMaster($rowMotorizado['codigo_departamento'], 'codigo', 'nombre', 'departamentos');
    $nombreEmpresa = funcionMaster($rowMotorizado['idEmpresa'], 'id', 'nombreEmpresa', 'empresasAfiliadas');
    $nitEmpresa = funcionMaster($rowMotorizado['idEmpresa'], 'id', 'NIT', 'empresasAfiliadas');

    if($fotoperfil <> ""){
        $fotoperfil = "pascientes/".$fotoperfil;
    }

}

   ?>

<style type="text/css">
        @page {
            /* size: A4; */
            margin: 1mm;
        }

        @media print {

            html,
            body {
                -webkit-print-color-adjust: exact !important;
            }

            @-moz-document url-prefix() {}

            .visible-xs {
                display: none !important;
            }

            .hidden-xs {
                display: block !important;
            }

            table.hidden-xs {
                display: table;
            }

            tr.hidden-xs {
                display: table-row !important;
            }

            th.hidden-xs,
            td.hidden-xs {
                display: table-cell !important;
            }

            .hidden-xs.hidden-print {
                display: none !important;
            }

            .hidden-sm {
                display: none !important;
            }

            .visible-sm {
                display: block !important;
            }

            table.visible-sm {
                display: table;
            }

            tr.visible-sm {
                display: table-row !important;
            }

            th.visible-sm,
            td.visible-sm {
                display: table-cell !important;
            }

            /* TABLA */
            .table>caption+thead>tr:first-child>td,
            .table>caption+thead>tr:first-child>th,
            .table>colgroup+thead>tr:first-child>td,
            .table>colgroup+thead>tr:first-child>th,
            .table>thead:first-child>tr:first-child>td,
            .table>thead:first-child>tr:first-child>th {
                margin: 0;
                padding: 0;
                border: 1px solid black;
            }

            .table-bordered>tbody>tr>td,
            .table-bordered>tbody>tr>th,
            .table-bordered>tfoot>tr>td,
            .table-bordered>tfoot>tr>th,
            .table-bordered>thead>tr>td,
            .table-bordered>thead>tr>th {
                margin: 0;
                padding: 0;
                border: 1px solid black;
            }
        }

        * {
            -webkit-print-color-adjust: exact !important;
        }

        .invoice .header {
            height: 100px;
            /* border: 2px solid black; */
            display: flex;
            align-items: center;
        }

        .invoice .header .row {
            display: flex;
            align-items: center;
        }

        /* TABLA */
        .table>caption+thead>tr:first-child>td,
        .table>caption+thead>tr:first-child>th,
        .table>colgroup+thead>tr:first-child>td,
        .table>colgroup+thead>tr:first-child>th,
        .table>thead:first-child>tr:first-child>td,
        .table>thead:first-child>tr:first-child>th {
            margin: 0;
            padding: 0;
            border: 1px solid black;
        }

        .table-bordered>tbody>tr>td,
        .table-bordered>tbody>tr>th,
        .table-bordered>tfoot>tr>td,
        .table-bordered>tfoot>tr>th,
        .table-bordered>thead>tr>td,
        .table-bordered>thead>tr>th {
            margin: 0;
            padding: 0;
            border: 1px solid black;
        }

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
    </style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Historial del Paciente
      </h1>
      <ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
        <li><a href="#">Historial Concepto Laboral</a></li>
      </ol>
    </section>

    <link rel="stylesheet" type="text/css" href="css/tab_nav_demo79_1.css" media="screen"/>

    <!-- Main content -->
    <section class="content"> 
      <div class="row">
        <div class="card-body">
          <div class="box">
          <?php echo datosPacientes($clienteId);?>
            <div align="center">
            <a class="btn btn-outline-info btn-lg rounded-pill shadow m-1" href="anexosPaciente?cI=<?php echo encrypt($clienteId);?>" role="button"><i class="fa fa-folder-open-o"></i>  Agregar Exámenes </a>
            <?php
            include 'estadoFacturaPresupuestoCliente.php';

            $Cliente_id=$clienteId;//esta es la variable que se usa dentro del include
            include 'IncludeBotonesHistorialHistorias.php';
            ?>
            <br><br>
            </div>
          </div>
        </div>
      </div>
    </section>

    <br>

    <div class="box-body">
        <div class="row">
            <div class="col-md-12">
                <div class="tab" role="tabpanel">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" ><a href="#Section1" aria-controls="home" role="tab" data-toggle="tab" class="active"> <i class='fas fa-book-medical' style='font-size:26px'> </i> Historias de Concepto Laboral</a></li>
                        <li role="presentation" ><a href="#Section2" aria-controls="home" role="tab" data-toggle="tab"> <i class='fas fa-book-medical' style='font-size:26px'> </i> Registros de Exámenes </a></li>
                        <!--<li role="presentation"><a href="#Section2" aria-controls="profile" role="tab" data-toggle="tab"> <i class='fas fa-vials' style='font-size:26px'> </i> Controles</a></li>-->
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content tabs">
                        <!-- inicio seccion 1 -->
                        <div role="tabpanel" class="tab-pane fade in active show" id="Section1">
                          
                          <!--inicio accordion-->
                          <div class="col-md-12">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                              

                                <?php 
                                    
                                $queryList=mysqli_query($conn3,"SELECT * FROM  conceptolaboral where cliente_id = $clienteId AND usuario_id = '$usuarioId' order by id DESC ");
                                $nrowl=mysqli_num_rows($queryList);
                                while($rowMotorizado=mysqli_fetch_array($queryList))
                                {
                                        $id = $rowMotorizado['id'];

                                        $cliente_id      = $rowMotorizado['cliente_id'];
                                        $usuario_id      = $rowMotorizado['usuario_id'];
                                        $Fecha      = $rowMotorizado['Fecha'];
                                        list($y, $m, $d) = explode("-", $Fecha);
                                        $Hora = $rowMotorizado['Hora'];
                                        $firma = $rowMotorizado['firma'];
                                        // Tipo Examen
                                        $xtipodeexa690 = explode("|", $rowMotorizado['xtipodeexa690']);
                                        $xaptitudoc588 = explode("|", $rowMotorizado['xaptitudoc588']);
                                        $xaptitudoc267 = explode("|", $rowMotorizado['xaptitudoc267']);
                                        $xaptitudoc161 = explode("|", $rowMotorizado['xaptitudoc161']);
                                        $xinformaci281 = explode("|", $rowMotorizado['xinformaci281']);
                                        $xexaacutem307 = explode("|", $rowMotorizado['xexaacutem307']);
                                        $complementos = [];
                                        $n = 0;
                                        foreach ($xexaacutem307 as $key => $value) {
                                            if ($value != "") {
                                                $complementos[$n] = $value;
                                                $n++;
                                            }
                                        }
                                        $xrecomenda954 = explode("|", $rowMotorizado['xrecomenda954']);
                                        $xelpresent728 = $rowMotorizado['xelpresent728'];
                                        $xincluiren405 = $rowMotorizado['xincluiren405'];
                                        $xtipodepro824 = explode("|", $rowMotorizado['xtipodepro824']);
                                        $recomendacion_particular = $rowMotorizado['recomendacion_particular'];
                                        $recomendacion_general = $rowMotorizado['recomendacion_general'];
                                        $consentimiento = $rowMotorizado['consentimiento'];


                                    $TablaHistoria="conceptolaboral";
                                ?>
                                <div class="panel panel-default" style="background: #f1f1f1;">
                                  <div class="panel-heading" role="tab" id="heading" style="background-color: #bad8e687;">
                                    <h4 class="panel-title">
                                      <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#HistoriaConcepto<?php echo $id?>" aria-expanded="false" aria-controls="HistoriaConcepto<?php echo $id?>">
                                        Fecha <?php echo $Fecha .'  ';?>

                                        <button onclick="window.location.href='SO_Finalizado?historiaClinica1=<?php echo $id;?>'" style="border: hidden;background-color: initial;font-size: 20px;"><i class="fa-regular fa-rectangle-list" style="top: 2px;position: relative;"></i></button>

                                        <button onclick="window.open('EV_EvolucionHistorias.php?cliente_id=<?php echo encrypt($cliente_id_modulo); ?>&historia_id=<?php echo encrypt($id); ?>&tabla=<?php echo encrypt($TablaHistoria); ?>', '_blank', 'noopener')" title="Agregar Evolución" style="border: hidden;background-color: initial;font-size: 20px;"><i class="fa fa-file"></i></button>

                                        <button onclick="window.open('EV_EvolucionHistorial.php?cliente_id=<?php echo encrypt($cliente_id_modulo); ?>&historia_id=<?php echo encrypt($id); ?>&tabla=<?php echo encrypt($TablaHistoria); ?>', '_blank', 'noopener')" title="Ver Historial de Evolución" style="border: hidden;background-color: initial;font-size: 20px;"><i class="fa fa-eye"></i></button>

                                        <button onclick="window.location.href ='SO_EnviarGeneral.php?historiaClinica=<?php echo $id ?>&modo=certificadoOcupacionalEmpresa'" title="Enviar Certificado a la Empresa del Paciente" style="border: hidden;background-color: initial;font-size: 20px;"><i class="fa fa-send"></i></button>

                                        <button onclick="window.location.href ='SO_EnviarGeneral.php?historiaClinica=<?php echo $id ?>&modo=certificadoOcupacionalPaciente'" title="Enviar Certificado a Paciente" style="border: hidden;background-color: initial;font-size: 20px;"><i class="fa fa-send text-danger"></i></button>

                                      </a>
                                    </h4>
                                  </div>
                                  <div id="HistoriaConcepto<?php echo $id?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading" style="padding-top: 20px;background-color: rgb(238, 238, 238);">
                                    <div class="panel-body">
                                    <?php ?>

                                        <hr align="center" size="10" width="100%" color="#000000">




                                        
                                        <section class="invoice">
                                            <div class="col-md-12 header">

                                            </div>
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-3 bordeCaja">
                                                        <p class="padding">Fecha ▼</p>
                                                    </div>
                                                    <div class="col-md-3 bordeCaja">
                                                        <p class="padding">Tipo de Examen ►</p>
                                                    </div>
                                                    <div class="col-md-6 bordeCaja" style="height: 22px;">
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
                                                    <div class="col-md-1 bordeCaja">
                                                        <p class="padding">Día</p>
                                                    </div>
                                                    <div class="col-md-1 bordeCaja">
                                                        <p class="padding">Mes</p>
                                                    </div>
                                                    <div class="col-md-1 bordeCaja">
                                                        <p class="padding">Año</p>
                                                    </div>
                                                    <div class="col-md-4 bordeCaja">
                                                        <p class="flex">Ciudad ▼</p>
                                                    </div>
                                                    <div class="col-md-5 bordeCaja">
                                                        <p class="flex">Departamento ▼</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-1 bordeCaja" style="min-height: 22px;">
                                                        <p class="padding"> <?= $d ?> </p>
                                                    </div>
                                                    <div class="col-md-1 bordeCaja" style="min-height: 22px;">
                                                        <p class="padding"> <?= $m ?> </p>
                                                    </div>
                                                    <div class="col-md-1 bordeCaja" style="min-height: 22px;">
                                                        <p class="padding"> <?= $y ?> </p>
                                                    </div>
                                                    <div class="col-md-4 bordeCaja" style="min-height: 22px;">
                                                        <p class="flex"> <?= $ciudad ?> </p>
                                                    </div>
                                                    <div class="col-md-5 bordeCaja" style="min-height: 22px;">
                                                        <p class="flex"> <?= $departamento ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <div class="row">
                                                            <div class="col-md-3 bordeCaja">
                                                                <p class="flex">1er Apellido ▼</p>
                                                            </div>
                                                            <div class="col-md-3 bordeCaja">
                                                                <p class="flex">2do Apellido ▼</p>
                                                            </div>
                                                            <div class="col-md-3 bordeCaja">
                                                                <p class="flex">1er Nombre ▼</p>
                                                            </div>
                                                            <div class="col-md-3 bordeCaja">
                                                                <p class="flex">2do Nombre ▼</p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-3 bordeCaja" style="min-height: 22px;">
                                                                <p class="flex"> <?= $primer_apellido ?> </p>
                                                            </div>
                                                            <div class="col-md-3 bordeCaja" style="min-height: 22px;">
                                                                <p class="flex"> <?= $segundo_apellido ?> </p>
                                                            </div>
                                                            <div class="col-md-3 bordeCaja" style="min-height: 22px;">
                                                                <p class="flex"> <?= $primer_nombre ?> </p>
                                                            </div>
                                                            <div class="col-md-3 bordeCaja" style="min-height: 22px;">
                                                                <p class="flex"> <?= $segundo_nombre ?> </p>
                                                            </div>
                                                        </div>
                                                        <!-- SEPARADOR -->
                                                        <div class="row">
                                                            <div class="col-md-2 bordeCaja">
                                                                <p class="flex">Tipo D.I. ▼</p>
                                                            </div>
                                                            <div class="col-md-3 bordeCaja">
                                                                <p class="flex">No. Documento ▼</p>
                                                            </div>
                                                            <div class="col-md-3 bordeCaja">
                                                                <p class="flex">Expedido en ▼</p>
                                                            </div>
                                                            <div class="col-md-2 bordeCaja">
                                                                <p class="flex">Genero ▼</p>
                                                            </div>
                                                            <div class="col-md-2 bordeCaja">
                                                                <p class="flex">Edad ▼</p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-2 bordeCaja" style="min-height: 22px;">
                                                                <p class="flex"><?= $tipo_cliente ?></p>
                                                            </div>
                                                            <div class="col-md-3 bordeCaja" style="min-height: 22px;">
                                                                <p class="flex"> <?= $CODI_CLIENTE ?> </p>
                                                            </div>
                                                            <div class="col-md-3 bordeCaja" style="min-height: 22px;">
                                                                <p class="flex"> <?= $expedicionDocumento ?> </p>
                                                            </div>
                                                            <div class="col-md-2 bordeCaja" style="min-height: 22px;">
                                                                <p class="flex"> <?= $genero ?> </p>
                                                            </div>
                                                            <div class="col-md-2 bordeCaja" style="min-height: 22px;">
                                                                <p class="flex"> <?php echo (Funcion_Edad_Paciente($fechaNacimiento)['Años']); ?> </p>
                                                            </div>
                                                        </div>
                                                        <!-- SEPARADOR -->
                                                        <div class="row">
                                                        <div class="col-md-4 bordeCaja">
                                                                <p class="flex">Ocupación ▼</p>
                                                            </div>
                                                            <div class="col-md-4 bordeCaja">
                                                                <p class="flex">Empresa ▼</p>
                                                            </div>
                                                            <div class="col-md-4 bordeCaja">
                                                                <p class="flex">N.I.T. ▼</p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                        <div class="col-md-4 bordeCaja" style="min-height: 22px;">
                                                                <p class="flex"> <?= $cargoR ?></p>
                                                            </div>
                                                            <div class="col-md-4 bordeCaja" style="min-height: 22px;">
                                                                <p class="flex"> <?= ($idEmpresa == 0 ? 'Particular' : $nombreEmpresa) ?> </p>
                                                            </div>
                                                            <div class="col-md-4 bordeCaja" style="min-height: 22px;">
                                                                <p class="flex"> <?= $nitEmpresa ?> </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 imgFluid bordeCaja">
                                                        <img src="<?=$Base;?><?= ($fotoperfil != '' ? $fotoperfil : 'ImagenesHistoria/SaludOcupacional.jpg') ?>" alt="">
                                                    </div>
                                                </div>
                                                <!-- Unida -->
                                                <div class="row">
                                                    <div class="col-md-12 bordeCaja">
                                                        <p class="padding">Información del Concepto Laboral ▼</p>
                                                    </div>
                                                    <?php
                                                    $contador = 2;
                                                    $xinformaci281 = array_filter($xinformaci281);
                                                    foreach ($xinformaci281 as $key => $value) {
                                                        ($contador == 0 ? $contador = 2 : '');
                                                    ?>
                                                        <div class="col-md-6 bordeCaja" style="min-height: 22px;">
                                                            <p class="flex"> <?= $value ?> </p>
                                                        </div>
                                                        <?php
                                                        $contador--;
                                                    }
                                                    if ($contador > 0) {
                                                        while ($contador > 0) {
                                                        ?>
                                                            <div class="col-md-6 bordeCaja" style="min-height: 22px;">
                                                                <p class="flex"> </p>
                                                            </div>
                                                    <?php
                                                            $contador--;
                                                        }
                                                    }
                                                    ?>
                                                    <div class="col-md-12 bordeCaja">
                                                        <p style="padding: 0 5px 0 5px; text-align: justify; text-justify: inter-word;">Recomendaciones Particulares: <?= $recomendacion_particular ?></p>
                                                    </div>
                                                    <!-- <div class="col-md-12 bordeCaja">
                                                        <p class="flex">APTITUD OCUPACIONAL __________: ▼</p>
                                                    </div>  -->
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
                                                            <div class="col-md-12 bordeCaja">
                                                                <p class="padding"><?= $value ?></p>
                                                            </div>
                                                            <?php
                                                            foreach (($key == "Ingreso" ? array_filter($xaptitudoc588) : ($key == "Periodico" ? array_filter($xaptitudoc267) : ($key == "Egreso" ? array_filter($xaptitudoc161) : null))) as $key => $value) {
                                                                ($contador == 0 ? $contador = 3 : '');
                                                            ?>
                                                                <div class="col-md-12 bordeCaja" style="min-height: 22px;">
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
                                                    <div class="col-md-12 bordeCaja">
                                                        <p class="padding">Exámenes Complementarios ▼</p>
                                                    </div>
                                                    <?php
                                                    $contador = 4;
                                                    foreach (array_filter($complementos) as $key => $value) {
                                                        ($contador == 0 ? $contador = 4 : '');
                                                    ?>
                                                        <div class="col-md-3 bordeCaja" style="min-height: 22px;">
                                                            <p class="flex"> <?= $value ?> </p>
                                                        </div>
                                                        <?php
                                                        $contador--;
                                                    }
                                                    if ($contador > 0) {
                                                        while ($contador > 0) {
                                                        ?>
                                                            <div class="col-md-3 bordeCaja" style="min-height: 22px;">
                                                                <p class="flex"> </p>
                                                            </div>
                                                    <?php
                                                            $contador--;
                                                        }
                                                    }
                                                    ?>
                                                    <div class="col-md-12 bordeCaja">
                                                        <p class="padding">Recomendaciones ▼</p>
                                                    </div>
                                                    <?php
                                                    $contador = 4;
                                                    foreach (array_filter($xrecomenda954) as $key => $value) {
                                                        ($contador == 0 ? $contador = 4 : '');
                                                    ?>
                                                        <div class="col-md-3 bordeCaja" style="min-height: 22px;">
                                                            <p class="flex"> <?= $value ?> </p>
                                                        </div>
                                                        <?php
                                                        $contador--;
                                                    }
                                                    if ($contador > 0) {
                                                        while ($contador > 0) {
                                                        ?>
                                                            <div class="col-md-3 bordeCaja" style="min-height: 22px;">
                                                                <p class="flex"> </p>
                                                            </div>
                                                    <?php
                                                            $contador--;
                                                        }
                                                    }
                                                    ?>
                                                    <!-- separador -->
                                                    <div class="col-md-10 bordeCaja sizeFont" style="min-height: 22px;">
                                                        <p class="flex" style="justify-content: flex-end; padding: 0 5px 0 0;">El Presente Concepto de Aptitud Laboral se Expide Según el Profesiograma o Perfil del Cargo Conocido por la IPS ►</p>
                                                    </div>
                                                    <div class="col-md-1 bordeCaja row" style="min-height: 22px; border:none !important;">
                                                        <div class="col-md-6 bordeCaja" style="min-height: 22px;">
                                                            <p class="flex">Si</p>
                                                        </div>
                                                        <div class="col-md-6 bordeCaja" style="min-height: 22px;">
                                                            <p class="flex"> <?= (preg_match("/si/i", $xelpresent728) ? 'X' : '') ?> </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1 bordeCaja row" style="min-height: 22px; border:none !important;">
                                                        <div class="col-md-6 bordeCaja" style="min-height: 22px;">
                                                            <p class="flex">No</p>
                                                        </div>
                                                        <div class="col-md-6 bordeCaja" style="min-height: 22px;">
                                                            <p class="flex"> <?= (preg_match("/no/i", $xelpresent728) ? 'X' : '') ?> </p>
                                                        </div>
                                                    </div>
                                                    <!-- separador -->
                                                    <div class="col-md-10 bordeCaja sizeFont" style="min-height: 22px;">
                                                        <p class="flex" style="justify-content: flex-end; padding: 0 5px 0 0;">Incluir en Programa de Vigilancia Epidemiológica ►</p>
                                                    </div>
                                                    <div class="col-md-1 bordeCaja row" style="min-height: 22px; border:none !important;">
                                                        <div class="col-md-6 bordeCaja" style="min-height: 22px;">
                                                            <p class="flex">Si</p>
                                                        </div>
                                                        <div class="col-md-6 bordeCaja" style="min-height: 22px;">
                                                            <p class="flex"> <?= (preg_match("/si/i", $xincluiren405) ? 'X' : '') ?> </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1 bordeCaja row" style="min-height: 22px; border:none !important;">
                                                        <div class="col-md-6 bordeCaja" style="min-height: 22px;">
                                                            <p class="flex">No</p>
                                                        </div>
                                                        <div class="col-md-6 bordeCaja" style="min-height: 22px;">
                                                            <p class="flex"> <?= (preg_match("/no/i", $xincluiren405) ? 'X' : '') ?> </p>
                                                        </div>
                                                    </div>
                                                    <!-- separador -->
                                                    <div class="col-md-10 bordeCaja sizeFont" style="min-height: 22px;">
                                                        <p class="flex" style="justify-content: flex-end; padding: 0 5px 0 0;">Tipo de Programa de Vigilancia Epidemiológica a Incluir ▼</p>
                                                    </div>
                                                    <div class="col-md-2 bordeCaja" style="min-height: 22px;"></div>
                                                    <?php
                                                    $contador = 4;
                                                    foreach (array_filter($xtipodepro824) as $key => $value) {
                                                        ($contador == 0 ? $contador = 4 : '');
                                                    ?>
                                                        <div class="col-md-3 bordeCaja" style="min-height: 22px;">
                                                            <p class="flex"> <?= $value ?> </p>
                                                        </div>
                                                        <?php
                                                        $contador--;
                                                    }
                                                    if ($contador > 0) {
                                                        while ($contador > 0) {
                                                        ?>
                                                            <div class="col-md-3 bordeCaja" style="min-height: 22px;">
                                                                <p class="flex"> </p>
                                                            </div>
                                                    <?php
                                                            $contador--;
                                                        }
                                                    }
                                                    ?>
                                                    <!-- separador -->
                                                    <div class="col-md-12 bordeCaja sizeFont" style="min-height: 22px;">
                                                        <p class="padding">Recomendaciones Generales ▼</p>
                                                    </div>
                                                    <div class="col-md-12 bordeCaja sizeFont" style="min-height: 22px;">
                                                        <p style="padding: 0 5px 0 5px; text-align: justify; text-justify: inter-word;">
                                                            <?= $recomendacion_general ?>
                                                        </p>
                                                    </div>
                                                    <!-- SEPARADOR -->
                                                    <div class="col-md-12 bordeCaja sizeFont">
                                                        <p class="padding">Consentimiento Informado del Aspirante o Trabajador ▼</p>
                                                    </div>
                                                    <div class="col-md-12 bordeCaja sizeFont" style="min-height: 22px;">
                                                        <p style="padding: 0 5px 0 5px; text-align: justify; text-justify: inter-word;">
                                                            <?= $consentimiento ?>
                                                        </p>
                                                    </div>
                                                    <!-- SEPARADOR -->
                                                    <div class="col-md-12 bordeCaja">
                                                        <p class="padding">Firmas ▼</p>
                                                    </div>
                                                    <div class="col-md-6 bordeCaja sizeFont">
                                                        <p class="padding">Médico Ocupacional ▼</p>
                                                    </div>
                                                    <div class="col-md-6 bordeCaja sizeFont">
                                                        <p class="padding">Aspirante a Trabajador ▼</p>
                                                    </div>
                                                    <div class="col-md-6 bordeCaja sizeFont" style="min-height: 174.84px; padding: 5px;">
                                                        <?php
                                                        echo  $firmaImg;
                                                        ?>
                                                        _______________________________________<br>
                                                        <?php echo $empresaNombre ?><br>
                                                        <?php echo $especialidad ?><br>
                                                        <?php echo $nit ?>L<br>
                                                        Registro Médico<br>
                                                    </div>
                                                    <div class="col-md-6 bordeCaja sizeFont" style="min-height: 174.84px; padding: 5px;">
                                                        <?php if (strlen($Firma) > 10) {
                                                            echo "<img src='$Firma'  style='height:70px; width:150px'>";
                                                        }
                                                        ?>
                                                        _______________________________________<br>
                                                        Nombre: <?php echo $nombre_cliente; ?> <br>
                                                        C.C. <?php echo $CODI_CLIENTE; ?>
                                                    </div>
                                                    <!-- SEPARADOR -->
                                                    <div class="col-md-12 bordeCaja" style="border:none !important;">
                                                        <p style="text-align: justify; text-justify: inter-word;"> La Presente Certificación se Expide con Base en la Historia Clínica Ocupacional del Trabajador, la Cual Tiene un Carácter Confidencial, y Amparada con Base al Consentimiento Informado y con Destino a la Hoja de Vida del Trabajador. </p>
                                                    </div>
                                                    <div class="col-md-12 bordeCaja sizeFont" align="center" style="border:none !important; margin-top:15px">
                                                        <p class="flex" style="padding: 0 5px 0 5px; text-align: justify; text-justify: inter-word;"><?= $pieF ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>





                                    </div>
                                  </div>
                                </div>
                                <?php 
                                }
                                ?>
                            </div>
                          </div>
                          <!--final accordion-->   




                        </div>
                        <!-- cierre seccion 1-->



                        
                        <!-- inicio seccion 2 -->
                        <div role="tabpanel" class="tab-pane fade" id="Section2">

                        <!--inicio accordion-->
                        <div class="col-md-12">
                          <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">


                          <hr align="center" size="10" width="100%" color="#000000">
                            <link type="text/css" rel="stylesheet" href="css/tabs.css" />

                            <div class="page" style="background-color: aliceblue;padding: 20px;">
                              <!--<h1>Pure CSS Tabs</h1>  -->
                              <!-- tabs -->
                              <div class="pcss3t pcss3t-effect-scale pcss3t-theme-1">
                                <input type="radio" name="pcss3t" checked id="tab1" class="tab-content-first">
                                <label for="tab1"><i class="icon-bolt"></i>Archivos</label>

                                <input type="radio" name="pcss3t" id="tab2" class="tab-content-2">
                                <label for="tab2"><i class="icon-picture"></i>Carpetas</label>

                                <ul>
                                  <li class="tab-content tab-content-first typography">
                                    <h1 class="txt_rsp">Registro de Archivos</h1>

                                    <table class="table table-responsive" style="display:inline-table!important;">
                                      <thead>
                                        <tr>
                                          <th scope="col">#</th>
                                          <th scope="col">Nombre Archivo</th>
                                          <th scope="col">Carpeta</th>
                                          <th scope="col">Fecha</th>
                                          <th scope="col" style="text-align: center;font-size: 25px;"><i class="fa fa-download" aria-hidden="true"></i></th>
                                          <th scope="col" style="text-align: center;font-size: 25px;"><i class="fa fa-picture-o" aria-hidden="true"></i></th>
                                          <th scope="col" style="text-align: center;font-size: 25px;"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></th>
                                        </tr>
                                      </thead>
                                      <tbody>

                                        <?php
                                        $queryImg = mysqli_query($conn3, "SELECT * FROM archivos  where cliente_id = '$clienteId'");
                                        $nrowlER = mysqli_num_rows($queryImg);
                                        while ($resulImg = mysqli_fetch_array($queryImg)) {
                                          $contador++;
                                          $Producto = $resulImg['id'];

                                        ?>
                                          <tr>
                                            <td>
                                              <?php echo $contador ?>
                                            </td>
                                            <td>
                                              <?php echo $resulImg['NombreVisual']; ?>
                                            </td>
                                            <td>
                                              <?php echo $resulImg['descripcion']; ?>
                                            </td>
                                            <td>
                                              <?php echo $resulImg['fecha']; ?>
                                            </td>
                                            <td style="text-align: center;">
                                              <a target="blank" href="<?php echo $Base; ?>archivos/<?php echo $resulImg['codigo']; ?>">
                                                <a href="<?php echo $Base; ?>archivos/<?php echo $resulImg['codigo']; ?>" download="Archivo">Descargar Archivo
                                                </a>
                                              </a>
                                            </td>
                                            <td style="text-align: center;">
                                              <a target="_blank" href="<?php echo $Base; ?>archivos/<?php echo $resulImg['codigo']; ?>">
                                                <a href="<?php echo $Base; ?>archivos/<?php echo $resulImg['codigo']; ?>">Ver Archivo o Imagen <br>
                                                </a>
                                              </a>
                                            </td>
                                            <td style="text-align: center;">
                                              <a target="_blank" href="<?php echo $Base; ?>enviarArchivo.php?cliente=<?php echo $clienteId; ?>&id=<?php echo $Producto; ?>">
                                                Enviar Archivo <br>
                                              </a>
                                            </td>

                                          </tr>
                                        <?php } ?>
                                      </tbody>
                                    </table>

                                  </li><!-- cierre del primer modulo archivos -->

                                  <li class="tab-content tab-content-2 typography">
                                    <h1 class="txt_rsp">Registro de Carpetas</h1>



                                    <table class="table table-responsive" style="display:inline-table!important;">
                                      <thead>
                                        <tr>
                                          <th scope="col">#</th>
                                          <th scope="col">Carpeta</th>
                                          <th scope="col">Fecha</th>
                                          <th scope="col" style="text-align: center;font-size: 25px;"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></th>
                                        </tr>
                                      </thead>
                                      <tbody>

                                        <?php
                                        $queryarchivo = mysqli_query($conn3, "SELECT * FROM archivos  where cliente_id = '$clienteId' group by descripcion");

                                        $nrowlER = mysqli_num_rows($queryarchivo);
                                        while ($resularchivo = mysqli_fetch_array($queryarchivo)) {
                                          $descripcion             = $resularchivo['descripcion'];

                                        ?>





                                          <tr>
                                            <td>
                                              <?php echo $contador ?>
                                            </td>
                                            <td>
                                              <?php echo $descripcion; ?>
                                            </td>
                                            <td>
                                              <?php echo $resularchivo['fecha']; ?>
                                            </td>

                                            <td style="text-align: center;">
                                              <a target="_blank" href="<?php echo $Base; ?>enviarArchivoPaquete.php?cliente=<?php echo $clienteId; ?>&descripcion=<?php echo $descripcion; ?>">
                                                Enviar Archivos <br>
                                              </a>
                                            </td>
                                          </tr>

                                        <?php } ?>
                                      </tbody>
                                    </table>



                                  </li>


                                </ul>
                              </div>
                              <!--/ tabs -->







                            </div>
                            <!-- cerra class=page -->




                          </div>
                        </div>
                        <!--final accordion-->   
                        </div>
                        <!-- cierre seccion 2-->




                        




                    </div>
                </div>
            </div>
        </div>
    </div>

        















      </div>
    </section>
  </div>
           

   <?php
    include 'footer.php';

   ?>