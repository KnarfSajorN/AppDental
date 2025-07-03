<?php
require_once '../header.php';
require_once '../menu.php';

$clienteId = ($_GET['cI'] != '' ? decrypt($_GET['cI']) : $_GET['clienteId']);
$Tabla  = 'OBO_Historia';

?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Historial del Paciente
        </h1>
        <!-- <ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
        <li><a href="#">Paciente</a></li>
        

      </ol> -->
    </section>
    <style>
        /* Boton sucess */
        .css-button-sharp--green {
            min-width: 130px;
            height: 40px;
            color: #fff;
            padding: 5px 10px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            display: inline-block;
            outline: none;
            border: 2px solid #117a8b;
            background: #117a8b;
            border-radius: 30px;
        }

        .css-button-sharp--green:hover {
            background: #fff;
            color: #117a8b
        }
    </style>
    <!-- Main content -->
    <section class="content">
        <div class="">

            <?php

            $idHistoria = ($_GET['iCr'] != '' ? decrypt($_GET['iCr']) : $_GET['idHistoria']);
            $usuarioId = $_SESSION['ID'];

            $QueryAddColumnHistoria = " ALTER  TABLE {$Tabla} 
                                        ADD COLUMN IF NOT EXISTS activo INT(1) NULL DEFAULT 1 
                                        COMMENT 'Visible o no visible'";

            mysqli_query($conn3, $QueryAddColumnHistoria) or die("Error al crear columnas dinamicas => " . (mysqli_error($conn3)));

            ?>





            <div class="card-body">
                <div class="box box-body">


                    <?php echo datosPacientes($clienteId); ?>


                    <div align="center">
                        <!-- <a class="css-button-sharp--green" href="configConsultarTodo.php?clienteId=<?php echo $clienteId; ?>&idHistoria=<?php echo $idHistoria ?>" role="button"> <i class="fa fa-eye"></i>  Ver completo</a> -->
                        <?php
                        echo '<a class="btn btn-outline-info btn-lg rounded-pill shadow" href="cHistoria?cI=' . encrypt($clienteId) . '&iCr=' . encrypt($idHistoria) . '" title="Agregar Consulta para ' . $nombreH . '" role="button"> <i class="fa fa-heartbeat"></i>  Nueva Consulta </a>';
                        ?>
                        <a class="btn btn-outline-info btn-lg rounded-pill shadow" href="anexosPaciente?cI=<?= encrypt($clienteId); ?>" role="button"><i class="fa fa-folder-open-o"></i>
                            Agregar Exámeness </a>
                        <?php
                        // ECHO   "SELECT * FROM  $Tabla where cliente_id = $clienteId order by id asc";
                        include 'estadoFacturaPresupuestoCliente.php';

                        $Cliente_id = $clienteId; //esta es la variable que se usa dentro del include
                        if ($idHistoria == "51" || $idHistoria == "52" || $idHistoria == "54") {
                            $FacturacionTipo = "OD_GenerarFactura?clienteId={$Cliente_id}"; //Facturacion Odontologia, con esto cambia la ruta del boton
                        }
                        include 'IncludeBotonesHistorialHistorias.php';
                        ?>

                    </div>

                </div>






                <br>






                <link rel="stylesheet" type="text/css" href="css/tab_nav_demo79_1.css" media="screen" />

                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="tab" role="tabpanel">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation"><a href="#Consultas" aria-controls="home" role="tab" data-toggle="tab" class="active"> <i class='fas fa-book-medical' style='font-size:26px'> </i> Historias de Odontologia</a></li>
                                    <li role="presentation"><a href="#Examenes" aria-controls="home" role="tab" data-toggle="tab"> <i class='fas fa-book-medical' style='font-size:26px'>
                                            </i> Registros de Exámenes </a></li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content tabs">


                                    <!-- inicio seccion 1 -->
                                    <div role="tabpanel" class="tab-pane fade in active show" id="Consultas">

                                        <!--inicio accordion-->
                                        <div class="col-md-12">
                                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                                                <!-- <h3>
                  Consultas
                  </h3> -->

                                                <?php
                                                $QueryHistorias = "SELECT * FROM  $Tabla where cliente_id = $clienteId AND activo = '1' ";
                                                $queryList = mysqli_query($conn3, $QueryHistorias);
                                                $nrowl = mysqli_num_rows($queryList);
                                                while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                                    $grafica_audiometria1 = $rowMotorizado['grafica_audiometria'];
                                                }

                                                $grafica_audiometria = json_decode($grafica_audiometria1, true);
                                                $queryConsulta = mysqli_query($conn3, "SELECT * FROM  $Tabla where cliente_id = $clienteId AND activo = '1' order by id asc");

                                                $nrowl = mysqli_num_rows($queryConsulta);
                                                while ($RowHistoria = mysqli_fetch_array($queryConsulta)) {

                                                    $ID = $RowHistoria['id'];
                                                    $Fecha = $RowHistoria['fecha_registro'];
                                                    $idHistoria = 445;

                                                ?>

                                                    <div class="panel panel-default" style="background: #f1f1f1;">
                                                        <div class="panel-heading" role="tab" id="heading" style="background-color: #bad8e687;">
                                                            <h4 class="panel-title">
                                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#Historia<?= $ID ?>a" aria-expanded="false" aria-controls="Historia<?= $ID ?>a">
                                                                    Fecha <?php echo $Fecha ?>
                                                                    <button title="Ver Finalizado" onclick="window.open('OBO_Finalizado?id=<?=encrypt($ID)?>')" style="border: hidden;background-color: initial;font-size: 20px;"><i class="fas fa-bars"></i>
                                                                    </button>
                                                                    <!-- <button title="Editar" onclick="window.open('cEditar?iC=<?= encrypt($ID) ?>&iCr=<?= encrypt($idHistoria) ?>&cI=<?= encrypt($clienteId) ?>', '_blank')" style="border: hidden;background-color: initial;font-size: 20px;" t><i class="fas fa-marker"></i>
                                                                    </button> -->
                                                                    |
                                                                    <button onclick="window.open('EV_EvolucionHistorias.php?cliente_id=<?php echo encrypt($clienteId); ?>&historia_id=<?php echo encrypt($ID); ?>&tabla=<?php echo encrypt($Tabla); ?>', '_blank', 'noopener')" style="border: hidden;background-color: initial;font-size: 20px;" title="Nota de Evolución"><i class="fa fa-file"></i></button>

                                                                    <button onclick="window.open('EV_EvolucionHistorial.php?cliente_id=<?php echo encrypt($clienteId); ?>&historia_id=<?php echo encrypt($ID); ?>&tabla=<?php echo encrypt($Tabla); ?>', '_blank', 'noopener')" style="border: hidden;background-color: initial;font-size: 20px;" title="Ver Nota de Evolución"><i class="fa fa-eye"></i></button>
                                                                </a>

                                                            </h4>
                                                        </div>
                                                        <div id="Historia<?= $ID ?>a" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading" style="padding-top: 20px;background-color: rgb(238, 238, 238);">
                                                            <div class="panel-body">

                                                                <?php 
                                                                require './Include_Odontograma_Vista_Historial.php';
                                                                
                                                                ?>



                                                                <table class="table table-bordered">
                                                                    <thead>
                                                                        <tr>
                                                                            <td class="tg-0pky" style="width:20%">
                                                                                <p>Fecha: <?= $RowHistoria["fecha_registro"] ?></p>
                                                                            </td>
                                                                            <td class="tg-0pky" style="width:80%">
                                                                                <p>Subjetivo: <?= $RowHistoria["subjetivo"] ?></p>
                                                                            </td>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="tg-0pky">
                                                                                <!-- <p>Hora: <?= $RowHistoria[""] ?></p> -->
                                                                            </td>
                                                                            <td class="tg-0pky" rowspan="2">
                                                                                <p>Objetivo: <?= $RowHistoria["objetivo"] ?></p>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="tg-0pky">
                                                                                <p>Edad: <?= $RowHistoria["edad"] ?></p>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="tg-0pky">
                                                                                <p>P.A: <?= $RowHistoria["pa"] ?></p>
                                                                            </td>
                                                                            <td class="tg-0pky" rowspan="2">
                                                                                <p>Analisis: <?= $RowHistoria["analisis"] ?></p>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="tg-0pky">
                                                                                <p>F.C<?= $RowHistoria["fc"] ?></p>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="tg-0pky">
                                                                                <p>F.R<?= $RowHistoria["FR"] ?></p>
                                                                            </td>
                                                                            <td class="tg-0pky" rowspan="4">
                                                                                <p>Plan de acción: <?= $RowHistoria["plan_accion"] ?></p>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="tg-0pky">
                                                                                <p>Temp: <?= $RowHistoria["temp"] ?></p>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="tg-0pky">
                                                                                <p>Peso: <?= $RowHistoria["peso"] . "kg" ?></p>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>

                                                                <table class="table table-bordered">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td colspan="2">
                                                                                <p>Interconsulta: <?= $RowHistoria["interconsulta"] ?></p>
                                                                            </td>
                                                                            <td colspan="2">
                                                                                <p>Motivo: <?= $RowHistoria["motivo_1"] ?></p>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="width: 15%">
                                                                                <p>Referencia: <?= $RowHistoria["referencia"] ?></p>
                                                                            </td>
                                                                            <td style="width: 55%">
                                                                                <p>Motivo: <?= $RowHistoria["motivo_2"] ?></p>
                                                                            </td>
                                                                            <td style="width: 15%">
                                                                                <p>Fecha: <?= $RowHistoria["fecha_1"] ?></p>
                                                                            </td>
                                                                            <td style="width: 15%">
                                                                                <p>Hora: <?= $RowHistoria["hora_1"] ?></p>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="width: 15%">
                                                                                <p>Contrareferencia: <?= $RowHistoria["contrareferencia"] ?></p>
                                                                            </td>
                                                                            <td style="width: 55%">
                                                                                <p>Motivo: <?= $RowHistoria["motivo_3"] ?></p>
                                                                            </td>
                                                                            <td style="width: 15%">
                                                                                <p>Fecha: <?= $RowHistoria["fecha_2"] ?></p>
                                                                            </td>
                                                                            <td style="width: 15%">
                                                                                <p>Hora: <?= $RowHistoria["hora_2"] ?></p>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>



                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } ?>

                                            </div>
                                        </div>
                                        <!--final accordion-->
                                    </div>
                                    <!-- cierre seccion 1-->

                                    <?php
                                    /*
                                    <!-- inicio seccion 2 -->
                                    <!-- cierre seccion 2-->
                                    */
                                    ?>

                                    <!-- inicio seccion 2 -->




                                    <div role="tabpanel" class="tab-pane fade" id="Examenes">

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
                                                            <li class="tab-content tab-content-first">
                                                                <h1>Registro de Exámenes</h1>

                                                                <table class="table table-responsive" style="display:inline-table!important;">
                                                                    <thead>
                                                                        <tr>
                                                                            <th scope="col">#</th>
                                                                            <th scope="col">Nombre Archivo</th>
                                                                            <th scope="col">Carpeta</th>
                                                                            <th scope="col">Fecha</th>
                                                                            <th scope="col" style="text-align: center;font-size: 25px;">
                                                                                <i class="fa fa-download" aria-hidden="true"></i>
                                                                            </th>
                                                                            <th scope="col" style="text-align: center;font-size: 25px;">
                                                                                <i class="fa fa-picture-o" aria-hidden="true"></i>
                                                                            </th>
                                                                            <th scope="col" style="text-align: center;font-size: 25px;">
                                                                                <i class="fa fa-paper-plane-o" aria-hidden="true"></i>
                                                                            </th>
                                                                            <th scope="col" style="text-align: center;font-size: 25px;">
                                                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                                                            </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>

                                                                        <?php
                                                                        $queryImg = mysqli_query($conn3, "SELECT * FROM archivos  where cliente_id = '$clienteId' and estado = 1 ");
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
                                                                                        <a href="<?php echo $Base; ?>archivos/<?php echo $resulImg['codigo']; ?>" download="Archivo">Descargar
                                                                                            Archivo
                                                                                        </a>
                                                                                    </a>
                                                                                </td>
                                                                                <td style="text-align: center;">
                                                                                    <a target="_blank" href="<?php echo $Base; ?>archivos/<?php echo $resulImg['codigo']; ?>">
                                                                                        <a href="<?php echo $Base; ?>archivos/<?php echo $resulImg['codigo']; ?>">Ver
                                                                                            Archivo o Imagen <br>
                                                                                        </a>
                                                                                    </a>
                                                                                </td>
                                                                                <td style="text-align: center;">
                                                                                    <a target="_blank" href="<?php echo $Base; ?>enviarArchivo.php?cliente=<?php echo $clienteId; ?>&id=<?php echo $Producto; ?>">
                                                                                        Enviar Archivo <br>
                                                                                    </a>
                                                                                </td>
                                                                                <td style="text-align: center;">
                                                                                    <a href="<?php echo $Base; ?>historiaImagenes_eliminar.php?cI=<?= encrypt($clienteId); ?>&iI=<?= encrypt($Producto); ?>">
                                                                                        Eliminar Archivo <br>
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
                                                                            <th scope="col" style="text-align: center;font-size: 25px;">
                                                                                <i class="fa fa-paper-plane-o" aria-hidden="true"></i>
                                                                            </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>

                                                                        <?php
                                                                        $queryarchivo = mysqli_query($conn3, "SELECT * FROM archivos  where cliente_id = '$clienteId' and estado = 1 group by descripcion");

                                                                        $nrowlER = mysqli_num_rows($queryarchivo);
                                                                        while ($resularchivo = mysqli_fetch_array($queryarchivo)) {
                                                                            $descripcion = $resularchivo['descripcion'];

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













                                    <!-- inicio seccion 3 -->
                                    <div role="tabpanel" class="tab-pane fade" id="ExamenesEcografias">

                                        <!--inicio accordion-->
                                        <div class="col-md-12">
                                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                                                <hr align="center" size="10" width="100%" color="#000000">
                                                <h3>
                                                    Registros de Imágenes </h3>

                                            </div>
                                        </div>
                                        <!--final accordion-->
                                    </div>
                                    <!-- cierre seccion 3-->



                                    <!-- inicio seccion 4 -->
                                    <div role="tabpanel" class="tab-pane fade" id="receta">

                                        <!--inicio accordion-->
                                        <div class="col-md-12">
                                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                                                <hr align="center" size="10" width="100%" color="#000000">
                                                <h3>
                                                    Registros de Recetas </h3>




                                                <?php

                                                $queryList = mysqli_query($conn3, "SELECT * FROM  operacionRecetario where cliente_id = $clienteId group by idReceta");
                                                $nrowl = mysqli_num_rows($queryList);

                                                while ($row_recordset32 = mysqli_fetch_array($queryList)) {
                                                    $ID = $row_recordset32['id'];
                                                    $IDR = $row_recordset32['idReceta'];
                                                    $Producto = $row_recordset32['codigoProd'];


                                                    $dosis = $row_recordset32['dosis'];
                                                    $posologia = $row_recordset32['posologia'];
                                                    $frecuencia = $row_recordset32['frecuencia'];
                                                    $administracion = $row_recordset32['administracion'];
                                                    $dosisdia = $row_recordset32['dosisdia'];

                                                    $via = $row_recordset32['via'];
                                                    $id_usuario = $row_recordset32['usuario_id'];
                                                    $id_cliente = $row_recordset32['cliente_id'];
                                                    $total = $row_recordset32['total'];
                                                    $dias = $row_recordset32['dias'];
                                                    $nota = $row_recordset32['nota'];
                                                    //$producto1          = $row_recordset32['producto1'];
                                                    $Fecha = $row_recordset32['fecha'];
                                                    $idReceta = $row_recordset32['idReceta'];


                                                ?>


                                                    <div class="panel box box-primary">
                                                        <div class="box-header with-border">
                                                            <h4 class="box-title">
                                                                <a data-toggle="collapse" data-parent="#accordion" href="#<?php echo $ID ?>">
                                                                    Fecha: <?php echo $Fecha . 'Receta Número:' . $IDR ?>

                                                                    <a title="Imprimir" href="imprimirRecetaH.php?idr=<?php echo $IDR ?>&cliente=<?php echo $clienteId ?>" title="Imprimir Receta" target="_blank"><i class="fa fa-print"></i> </a>
                                                                </a>
                                                            </h4>
                                                        </div>
                                                        <div id="<?php echo $ID ?>" class="panel-collapse collapse">
                                                            <div class="box-body">
                                                                <?php
                                                                $queryReceta = mysqli_query($conn3, "SELECT * FROM  operacionRecetario where cliente_id = $clienteId and idReceta = '$IDR'");
                                                                //echo "SELECT * FROM  DetalleReceta where id_cliente = $clienteId ";
                                                                $nrowl = mysqli_num_rows($queryReceta);

                                                                while ($rowMedicamento = mysqli_fetch_array($queryReceta)) {
                                                                    $ID = $rowMedicamento['id'];
                                                                    $IDR = $rowMedicamento['idReceta'];
                                                                    $Producto = $rowMedicamento['codigoProd'];


                                                                    $dosis = $rowMedicamento['dosis'];
                                                                    $posologia = $rowMedicamento['posologia'];
                                                                    $frecuencia = $rowMedicamento['frecuencia'];
                                                                    $administracion = $rowMedicamento['administracion'];
                                                                    $dosisdia = $rowMedicamento['dosisdia'];

                                                                    $via = $rowMedicamento['via'];
                                                                    $id_usuario = $rowMedicamento['usuario_id'];
                                                                    $id_cliente = $rowMedicamento['cliente_id'];
                                                                    $total = $rowMedicamento['total'];
                                                                    $dias = $rowMedicamento['dias'];
                                                                    $nota = $rowMedicamento['nota'];
                                                                    //$producto1          = $rowMedicamento['producto1'];
                                                                    $Fecha = $rowMedicamento['fecha'];
                                                                    $idReceta = $rowMedicamento['idReceta'];

                                                                ?>


                                                                    <hr align="center" size="10" width="100%" color="#000000">
                                                                    <div align="right">
                                                                        Fecha <?php echo $Fecha . '-' . $Hora ?>
                                                                    </div>

                                                                    <?php if (strlen($Producto) > 0 or strlen($producto1) > 0) : ?>
                                                                        <div>
                                                                            Medicamento Suministrado:
                                                                            <label> <strong>
                                                                                    <?php echo $Producto ?> <?php echo $producto1 ?>
                                                                                </strong></label>

                                                                        </div>
                                                                    <?php endif ?>


                                                                    <?php if (strlen($dosis) > 0) : ?>
                                                                        <div>
                                                                            Dosis:
                                                                            <label> <?php echo $dosis ?>
                                                                                <?php echo $posologia ?></label>

                                                                        </div>
                                                                    <?php endif ?>

                                                                    <?php if (strlen($via) > 0) : ?>
                                                                        <div>
                                                                            Vía:
                                                                            <label> <?php echo $via ?></label>

                                                                        </div>
                                                                    <?php endif ?>



                                                                <?php } ?>



                                                            </div>
                                                        </div>
                                                    </div>

                                                <?php } ?>

                                            </div>
                                        </div>
                                        <!--final accordion-->
                                    </div>
                                    <!-- cierre seccion 4 -->







                                </div>



                            </div>

                        </div>
                    </div>

                </div>

                <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
require_once '../footer.php';

?>

<style type="text/css">
    /* este estilo es para que cuando es menor a esa resolucion haga como si fuera col-6*/
    @media (max-width: 569px) {
        .col-perso {
            width: 50%;
        }
    }

    @media (max-width: 359px) {
        .col-perso {
            width: 100%;
        }
    }

    /* fin */



    /* este estilo va reemplazar a un col-md-2 ya que se usara ese espacio para aumentar el espacio de los recuadros */
    @media (max-width: 991px) {
        .col-xs-0 {
            display: none;
        }
    }

    /* fin */

    /* este estilo es para mover los recuadros y el diente al lado derecho para que no se monten */
    @media(max-width:991px) AND (min-width:425px) {
        .des_1 {
            left: 10px;
        }

        .des_2 {
            left: 20px;
        }

        .des_3 {
            left: 30px;
        }

        .des_4 {
            left: 40px;
        }

        .des_5 {
            left: 50px;
        }
    }


    @media(min-width:992px) {

        .G_2,
        .G_5,
        .G_7,
        .G_10 {
            border-right: 1px solid;
        }

        .G_5,
        .G_6 {
            border-bottom: 1px solid;
        }
    }


    .G3 {}

    /*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/

    .cuadro {
        background-color: #FFFFFF;
        border: 1px solid #7F7F7F;
        position: relative;
        width: 35px;
        height: 35px;
    }

    /* .cuadro:hover {
        background: rgba(117, 198, 243, 0.4);
        cursor: pointer;
    } */

    .arriba {
        -webkit-border-radius: 80px 80px 0px 15px;
        -moz-border-radius: 80px 80px 0px 15px;
        border-radius: 80px 80px 0px 15px;
    }

    .izquierdo {
        top: -1px !important;
        left: -33px !important;
        -webkit-border-radius: 80px 0px 0px 80px;
        -moz-border-radius: 80px 0px 0px 80px;
        border-radius: 80px 0px 0px 80px;
    }

    .debajo {
        top: -2px !important;
        -webkit-border-radius: 0px 0px 80px 80px;
        -moz-border-radius: 0px 0px 80px 80px;
        border-radius: 0px 0px 80px 80px;
        z-index: 1;
    }

    .derecha {
        top: -71px !important;
        left: 34px !important;
        -webkit-border-radius: 0px 80px 80px 0px;
        -moz-border-radius: 0px 80px 80px 0px;
        border-radius: 0px 80px 80px 0px;
    }

    .centro {
        background: #F3F3F3;
        border: 1px solid #7F7F7F;
        top: -106px;
        width: 35px;
        height: 35px;
        position: relative;
    }

    /* este estilo es para que haga un zoom mas peque;o y no se monte los recuadros en esas resoluciones */


    @media(max-width:1895px) AND (min-width:1495px) {
        .recuadros {
            zoom: 0.75
        }
    }

    @media(max-width:1494px) AND (min-width:1137px) {
        .recuadros {
            zoom: 0.6;
        }
    }

    @media(max-width:1136px) AND (min-width:992px) {
        .recuadros {
            zoom: 0.55;
        }
    }


    @media(max-width:1494px) AND (min-width:992px) {
        .recuadroperso {
            zoom: 0.66;
        }
    }

    .click_odontograma {
        text-align-last: center;
    }

    .diente_img>svg {
        position: absolute;
        width: 35px;
        top: 69px;
        left: 21px;
    }

    .diente_img1>svg {
        position: absolute;
        width: 35px;
        top: 81px;
        left: 27px;
        zoom: 0.84;
    }

    .diente_img2>svg {
        position: absolute;
        width: 35px;
        top: 79px;
        left: 27px;
        zoom: 0.84;
    }

    .diente_img3>svg {
        position: absolute;
        width: 35px;
        top: 52px;
        left: 20px;
    }

    /* .rotate_icon>svg {
        transform: rotate(180deg);
    } */

    .click_odontograma>svg {
        top: 3px;
        position: relative;
    }
</style>

<style>
    .check_seleccionMultiple {
        width: 60px;
        height: 60px;
        position: absolute;
        top: 0;
        left: 125px;
        margin: auto;
        zoom: 0.4;

        display: none;
    }

    .check_seleccionMultiple input {
        display: none;
    }

    .check_seleccionMultiple input:checked+.box {
        background-color: #b3ffb7;
    }

    .check_seleccionMultiple input:checked+.box:after {
        top: 0;
    }

    .check_seleccionMultiple .box {
        width: 100%;
        height: 100%;
        transition: all 1.1s cubic-bezier(.19, 1, .22, 1);
        border: 2px solid black;
        background-color: white;
        position: relative;
        overflow: hidden;
        cursor: pointer;
        box-shadow: 5px 5px 5px 5px rgba(0, 0, 0, 0.2);
    }

    .check_seleccionMultiple .box:after {
        width: 65%;
        height: 30%;
        content: '';
        position: absolute;
        border-left: 7.5px solid;
        border-bottom: 7.5px solid;
        border-color: #40c540;
        transform: rotate(-45deg) translate3d(0, 0, 0);
        transform-origin: center center;
        transition: all 1.1s cubic-bezier(.19, 1, .22, 1);
        left: 0;
        right: 0;
        top: 200%;
        bottom: 5%;
        margin: auto;
    }

    .separadoinferior {
        bottom: 86px;
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
        height: 44px !important;
        background-color: #d7d7d7bf;
        border-top: 0px;
    }

    .separadosuperior {
        top: 14px;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        height: 44px !important;
        background-color: #d7d7d7bf;
        border-bottom: 0px;
    }

    .separadoinferior>svg {
        top: 15px;
    }

    .separadosuperior>svg {
        top: 2px;
    }

    .G_3,
    .G_4,
    .G_6,
    .G_8,
    .G_11,
    .G_12 {
        left: 10px;
    }
</style>
