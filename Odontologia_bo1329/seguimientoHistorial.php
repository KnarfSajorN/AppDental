<?php
require_once '../header.php';
require_once '../menu.php';

$clienteId = decrypt($_GET['cliente_id']);
$historia_id = decrypt($_GET['historia_id']);
$Tabla  = 'OBT_Seguimiento';

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
                                    <li role="presentation"><a href="#Consultas" aria-controls="home" role="tab" data-toggle="tab" class="active"> <i class='fas fa-book-medical' style='font-size:26px'> </i> Seguimientos</a></li>
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
                                                $QueryHistorias = "SELECT * FROM  $Tabla where cliente_id = $clienteId AND historia_id = '$historia_id' AND activo = '1' ";
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
                                                                    <button title="Ver Finalizado" onclick="window.open('OBT_FinalizadoSeguimiento?id=<?= encrypt($ID) ?>&iCr=<?= encrypt($idHistoria) ?>&cI=<?= encrypt($clienteId) ?>', '_blank')" style="border: hidden;background-color: initial;font-size: 20px;" t><i class="fa-regular fa-rectangle-list"></i>
                                                                    </button>
                                                                </a>

                                                            </h4>
                                                        </div>
                                                        <div id="Historia<?= $ID ?>a" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading" style="padding-top: 20px;background-color: rgb(238, 238, 238);">
                                                            <div class="panel-body">

                                                                <table class="table table-bordered">
                                                                    <thead>
                                                                        <tr>
                                                                            <th colspan="12" style="text-align:center">Seguimiento</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php
                                                                        $fields = [
                                                                            //? Label = [elementType, inputName, col, typeInput]
                                                                            "Fecha de Inicio del tratamiento" => ["input", "fecha_inicio_tratamiento", "6", "date"],
                                                                            "Conclusión" => ["input", "conclusion", "6", "text"],
                                                                            "Aparatología" => ["textarea", "aparatologia", "12", "text"],
                                                                            "Monto total del tratamiento $" => ["input", "monto_total_usd", "6", "text"],
                                                                            "Monto total del tratamiento Bs" => ["input", "monto_total_bs", "6", "text"],
                                                                            "Cuota inicial" => ["input", "cuota_inicial", "6", "text"],
                                                                            "Cuota mensual" => ["input", "cuota_mensual", "6", "text"],
                                                                            "Observaciones" => ["textarea", "observaciones", "12", "text"],
                                                                        ];

                                                                        $totalColumnas = 0; // Para llevar un registro de las columnas usadas en la fila actual

                                                                        foreach ($fields as $label => $dataInput) {
                                                                            $tipoElemento = $dataInput[0];
                                                                            $name = $dataInput[1];
                                                                            $col = (int)$dataInput[2]; // Convertir a entero
                                                                            $type = $dataInput[3];
                                                                            $valorDB = $RowHistoria[$name];

                                                                            // Si la suma de columnas supera 12, cerramos la fila actual y comenzamos una nueva
                                                                            if ($totalColumnas + $col > 12) {
                                                                                echo "</tr><tr>"; // Cierra la fila actual y abre una nueva
                                                                                $totalColumnas = 0; // Reinicia el contador de columnas
                                                                            }

                                                                            // Si es la primera celda de la fila, abrimos una nueva fila
                                                                            if ($totalColumnas === 0) {
                                                                                echo "<tr>";
                                                                            }

                                                                            // Imprimir la celda con el colspan correspondiente
                                                                            echo "<td colspan='$col'>";
                                                                            echo "<p><b>" . $label . ": </b> " . $valorDB . "</p>";

                                                                            echo "</td>";

                                                                            // Actualizar el contador de columnas
                                                                            $totalColumnas += $col;

                                                                            // Si la suma de columnas es 12, cerramos la fila actual
                                                                            if ($totalColumnas === 12) {
                                                                                echo "</tr>";
                                                                                $totalColumnas = 0; // Reinicia el contador de columnas
                                                                            }
                                                                        }

                                                                        // Si queda una fila abierta, la cerramos
                                                                        if ($totalColumnas > 0) {
                                                                            echo "</tr>";
                                                                        }
                                                                        ?>
                                                                    </tbody>
                                                                </table>

                                                                <table class="table table-bordered">
                                                                    <thead>
                                                                        <tr>
                                                                            <th colspan="6" style="text-align:center">Detalle</th>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Operación realizada</th>
                                                                            <th>Costo</th>
                                                                            <th>A/cuenta</th>
                                                                            <th>Saldo</th>
                                                                            <th>Fecha</th>
                                                                            <th>Firma</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody id="detalle-seguimiento">
                                                                        <?php
                                                                        $QueryDetalle = "SELECT * FROM OBT_SeguimientoDetalle WHERE seguimiento_id = '$ID' ";
                                                                        $ResultDetalle = mysqli_query($conn3, $QueryDetalle);
                                                                        if ($ResultDetalle) {
                                                                            foreach ($ResultDetalle as $RowDetalle) { ?>
                                                                                <tr>
                                                                                    <td><?= $RowDetalle["operacion_realizada"] ?></td>
                                                                                    <td><?= number_format($RowDetalle["costo"], 2) ?></td>
                                                                                    <td><?= $RowDetalle["a_cuenta"] ?></td>
                                                                                    <td><?= number_format($RowDetalle["saldo"], 2) ?></td>
                                                                                    <td><?= $RowDetalle["fecha"] ?></td>
                                                                                    <td></td>
                                                                                </tr>
                                                                        <?php }
                                                                        }

                                                                        ?>
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