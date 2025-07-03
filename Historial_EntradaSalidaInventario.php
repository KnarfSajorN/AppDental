<!DOCTYPE html>
<?php
include 'header.php';
include 'menu.php';

$usuario_id = $_SESSION['ID'];
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#"> Historial Entrada/Salida Inventario </a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="content">
                <h4 class="Titulo_Pagina">Historial Entrada/Salida Inventario </h4>
                <div class="box">
                    <div class="box-body">


                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-body">
                                    <div class="col-md-12">
                                        <h2 style="text-align: center;font-weight: bold;"> Entrada/Salida </h2>
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Tipo</th>
                                                    <th scope="col">Fecha</th>
                                                    <th scope="col">Cantidad Productos</th>
                                                    <th scope="col">Costo</th>
                                                    <th scope="col">Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                $queryList = mysqli_query($conn3, "SELECT * FROM  opracioninvheader WHERE usuario_id='$usuario_id' ");

                                                while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                                    //$contador++;
                                                    $id = $rowMotorizado['id'];
                                                    $tipoDoc = $rowMotorizado['tipoDoc'];
                                                    switch ($tipoDoc){
                                                        case '1':
                                                            $Tipo="Entrada de Inventario";
                                                            break;
                                                        case '2':
                                                            $Tipo = "Salida de Inventario";
                                                            break;
                                                    }
                                                    $fechaReg= $rowMotorizado['fechaReg'];
                                                    $cantidadReg= $rowMotorizado['cantidadReg'];
                                                    $totalCosto= $rowMotorizado['Total'];

                                                    $ruta = htmlentities($_SERVER['PHP_SELF']);
                                                    echo "<tr><th scope='row' width='2%'>{$id}</th>
                                                    <td width='20%' align='center'>{$Tipo}</td>
                                                     <td width='20%' align='center'>{$fechaReg}</td>
                                                     <td width='20%' align='center'>{$cantidadReg}</td>
                                                     <td width='20%' align='center'>{$totalCosto}</td>"
                                                    ;

                                                    echo "<td width='20%' align='center'><font color='#04CC05'> <a href='Historial_ImprimirEntradaSalidaInventario.php?id={$id}' class='btn btn-block btn-outline-info btn-lg rounded-pill shadow' style='width: 100%;'><i class='fa fa-print' title='Imprimir'> Imprimir</i></a></font><br>
                                                    </td></tr>";
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