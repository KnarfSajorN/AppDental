<?php
require_once '../header.php';
require_once '../menu.php';

$clienteId = ($_GET['cI'] != '' ? decrypt($_GET['cI']) : $_GET['clienteId']);
$Tabla  = 'OB_Historia';

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

            mysqli_query($conn3, $QueryAddColumnHistoria) or die("Error al crear columnas dinamicas => " . ( mysqli_error($conn3) ) );

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
                                                $queryConsulta = mysqli_query($conn3, $QueryHistorias);
                                                
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
                                                                    <button title="Ver Finalizado" onclick="window.open('OB_Finalizado?id=<?= encrypt($ID) ?>', '_blank')" style="border: hidden;background-color: initial;font-size: 20px;" t><i class="fa-regular fa-rectangle-list"></i>
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

                                                            <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th colspan="4" class="text-center">Antecedentes</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th colspan="4">Antecedentes patológicos familiares</th>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        <p><?= $RowHistoria["antecedentes_patologicos_familiares"] ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <th colspan="4">Antecedentes patológicos personales</th>
                                </tr>
                                <tr>
                                    <td>
                                        <p><b>Anemia: </b> <?= $RowHistoria["Anemia"] == 'on' ? 'Si' : 'No' ?></p>
                                    </td>
                                    <td>
                                        <p><b>Cardiopatías: </b> <?= $RowHistoria["Cardiopatias"] == 'on' ? 'Si' : 'No' ?></p>
                                    </td>
                                    <td>
                                        <p><b>Enf. Gastricas: </b> <?= $RowHistoria["Enf_Gastricas"] == 'on' ? 'Si' : 'No' ?></p>
                                    </td>
                                    <td>
                                        <p><b>Hepatitis: </b> <?= $RowHistoria["Hepatitis"] == 'on' ? 'Si' : 'No' ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p><b>Tuberculosis: </b> <?= $RowHistoria["Tuberculosis"] == 'on' ? 'Si' : 'No' ?></p>
                                    </td>
                                    <td>
                                        <p><b>Asma: </b> <?= $RowHistoria["Asma"] == 'on' ? 'Si' : 'No' ?></p>
                                    </td>
                                    <td>
                                        <p><b>Diabetes: </b> <?= $RowHistoria["Diabetes"] == 'on' ? 'Si' : 'No' ?></p>
                                    </td>
                                    <td>
                                        <p><b>Epilepsia: </b> <?= $RowHistoria["Epilepsia"] == 'on' ? 'Si' : 'No' ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p><b>Hipertensión: </b> <?= $RowHistoria["Hipertension"] == 'on' ? 'Si' : 'No' ?></p>
                                    </td>
                                    <td>
                                        <p><b>VIH: </b> <?= $RowHistoria["VIH"] == 'on' ? 'Si' : 'No' ?></p>
                                    </td>
                                    <td>
                                        <p><b>Ninguno: </b> <?= $RowHistoria["Ninguno"] == 'on' ? 'Si' : 'No' ?></p>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>
                                        <p><b>Otro: </b> <?= $RowHistoria["otro_antecedente"] ?></p>
                                    </td>
                                    <td>
                                        <p><b>Alergias: </b> <?= $RowHistoria["alergias"] ?></p>
                                    </td>
                                    <td>
                                        <p><b>Embarazo: </b> <?= $RowHistoria["embarazo"] ?></p>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <p><b>Tuvo hemorragia después de una extracción dental:</b> <?= $RowHistoria["hemorragia_despues"] == 'on' ? 'Si' : 'No' ?></p>
                                    </td>
                                    <td colspan="2">
                                        <p><b>Especifique: </b> <?= $RowHistoria["hemorragia_especificar"] ?></p>
                                    </td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th colspan="3" class="text-center">Examen Extra Oral</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <p><b>ATM: </b> <?= $RowHistoria["ATM"] ?></p>
                                    </td>
                                    <td>
                                        <p><b>Labios: </b> <?= $RowHistoria["labios"] ?></p>
                                    </td>
                                    <td>
                                        <p><b>Ganglios linfáticos: </b> <?= $RowHistoria["ganglios_linfaticos"] ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p><b>Lengua: </b> <?= $RowHistoria["lengua"] ?></p>
                                    </td>
                                    <td>
                                        <p><b>Respirador: </b> <?= $RowHistoria["respirador"] ?></p>
                                    </td>
                                    <td>
                                        <p><b>Paladar: </b> <?= $RowHistoria["paladar"] ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p><b>Otros: </b> <?= $RowHistoria["examen_extraoral_otros"] ?></p>
                                    </td>
                                    <td>
                                        <p><b>Piso de la boca: </b> <?= $RowHistoria["piso_boca"] ?></p>
                                    </td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th colspan="3" class="text-center">Antecedentes bucodentales</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <p><b>Mucosa Yugal: </b> <?= $RowHistoria["mucosa_yugal"] ?></p>
                                    </td>
                                    <td>
                                        <p><b>Fecha de ultima visita al odontólogo: </b> <?= $RowHistoria["ultima_visita_odontolog"] ?></p>
                                    </td>
                                    <td>
                                        <p><b>Encías: </b> <?= $RowHistoria["encias"] ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p><b>Habitos</b> <br> <b>Fuma</b><?= $RowHistoria["habito_fuma"] == 'on' ? 'Si' : 'No' ?> <b>Bebe</b><?= $RowHistoria["habito_bebe"] == 'on' ? 'Si' : 'No' ?></p>
                                    </td>
                                    <td>
                                        <p><b>Utiliza protesis dental: </b> <?= $RowHistoria["usa_protesis_dental"] == 'on' ? 'Si' : 'No' ?></p>
                                    </td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th colspan="3" class="text-center">Antecedentes de higiene oral</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <p><b>Utiliza cepillo dental: </b> <?= $RowHistoria["usa_cepillo"] ?></p>
                                    </td>
                                    <td>
                                        <p><b>Utiliza hilo dental: </b> <?= $RowHistoria["usa_hilo"] ?></p>
                                    </td>
                                    <td>
                                        <p><b>Utiliza enguaje bucal: </b> <?= $RowHistoria["usa_enguaje"] ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <p><b>Frecuencia del cepillado dental</b> <?= $RowHistoria["frecuencia_cepillado"] ?></p>
                                    </td>
                                    <td>
                                        <p><b>Durante el cepillado le sangran las encías: </b> <?= $RowHistoria["sangrado_cepillado"] == 'on' ? 'Si' : 'No' ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <p><b>Higiene bucal: </b> <?= $RowHistoria["higiene_bucal"] ?></p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <thclass="text-center">Observaciones</thclass=>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <p><?= $RowHistoria["observaciones"] ?></p>
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