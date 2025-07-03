<?php
include 'header.php';
include 'menu.php';

$id = $_GET["id"];
$usuario_id = $_SESSION['ID'];
?>

<!-- Se Cambia de Paquetes a Categoria -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#"> Historial Comisiones Facturadas </a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="content">
                <h4 class="Titulo_Pagina">Historial Comisiones Facturadas</h4>
                <div class="box">
                    <div class="box-body">

                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-body">
                                    <div class="col-md-12">
                                        <h2 style="text-align: center;font-weight: bold;"> Comisiones Facturadas </h2>
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Fecha</th>
                                                    <th scope="col"># Operaciones</th>
                                                    <th scope="col">Monto de la Comisión</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                $queryList = mysqli_query($conn3, "SELECT * FROM  LB_MedicosAsociados_Pagos WHERE medico_asociado_id='{$id}' ");
                                                while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                                    $contador++;
                                                    $id = $rowMotorizado['id'];
                                                    $Fecha_Registro = $rowMotorizado['Fecha_Registro'];
                                                    $idOperacion_Asociados = $rowMotorizado['idOperacion_Asociados'];
                                                    $Monto_Pagado = $rowMotorizado['Monto_Pagado'];

                                                    $ruta = htmlentities($_SERVER['PHP_SELF']);
                                                    echo "<tr width='2%'><th scope='row'>{$contador}</th>
                                                    <td width='20%' align='center'>{$Fecha_Registro}</td>
                                                    <td width='20%' align='center'>{$idOperacion_Asociados}</td>
                                                    <td width='20%' align='center'>{$Monto_Pagado}</td>";

                                                }

                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include 'footer.php';
?>