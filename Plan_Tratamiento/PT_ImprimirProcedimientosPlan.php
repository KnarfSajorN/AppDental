<?php
include '../funciones/funciones.php';
include '../funciones/conn3.php';

$idProcedimiento = base64_decode($_GET['FAID']);

$queryUsuario1 = mysqli_query($conn3, "SELECT * FROM planesProcedimiento where id = $idProcedimiento ");
$rowConfig = mysqli_fetch_assoc($queryUsuario1);
$idCliente = $rowConfig['idCliente'];
$idUsuario = $rowConfig['idUsuario'];
$idPlan = $rowConfig['idPlan'];
$observaciones = $rowConfig['observaciones'];
$moneda = funcionMaster($idUsuario, 'ID_Usuario', 'moneda', 'config');

$nombreCliente = funcionMaster($idCliente, 'cliente_id', 'nombre_cliente', 'cliente');
$cedulaCliente = funcionMaster($idCliente, 'cliente_id', 'CODI_CLIENTE', 'cliente');
$nombreUsuario = funcionMaster($idUsuario, 'ID', 'NOMBRE_USUARIO', 'usuarios');

?>
<style>
    .inline{
        display: inline;
    }
    table {
        border: 2px solid black;
        border-collapse: collapse;
        width: 100%;
        font-size: 13px;
    }

    th,
    td {
        border: 2px solid black;
        padding: 3px;
        text-align: center;

    }

    th {
        background-color: #f0f0f0;
    }

    .container {
        text-align: justify;
        /* Justifica el contenido para simular space-between */
        width: 100%;
        /* Asegúrate de que el contenedor ocupe todo el ancho */
        padding: 0px;
        /* Espacio en los lados */
    }

    .box {
        display: inline-block;
        /* Alineación horizontal */

        padding: 0px;
        margin: 0;
        /* Sin margen para un ajuste más preciso */
        width: 150px;
        /* Ancho fijo para cada div */
        text-align: center;
    }

    /* Agregar un espacio extra para que el texto de justificación funcione */
    .container::after {
        content: '';
        /* Pseudo-elemento para hacer que el contenedor tenga espacio */
        display: inline-block;
        width: 100%;
        /* Asegura que el contenido ocupe el espacio */
    }

    .sm-letra {
        font-size: 10px;
    }

    .letra-bold {
        font-weight: bold;
    }

    .borde-text {
        border: 2px solid black;
    }
</style>

<div class="content-wrapper p-3">
    <section class="content">
        <div class="col-xs-12">
            <div class="row">
                <div class="col-md-12">
                    <form action="" id="formLogo" method="POST">
                        <div class="card card-info">
    
                            <div class="card-body table-responsive">
                            
                                
                                   
                               <br>

                                <table style="border:0;">
                                    <tr style="border:0;">
                                        <td style="border:0;">
                                            <h2 style="font-size: 20px !important;">PLAN DE TRATAMIENTO</h2>
                                        </td>

                                    </tr>
                                    <tr style="border:0;">
                                        <td style="border:0;">
                                            <p>
                                                <span style="float: left;">Nombre del Paciente: <?= $nombreCliente ?></span>
                                                <span style="float: right;">C.I: <?= $cedulaCliente ?></span>
                                            </p>
                                        </td>
                                    </tr>
                                </table>
                                <br>
                                    
                                <table class="table table-striped" id="tablaInventario" style="width:100%">
                                
                                    <thead>
                                        
                                        <tr>
                                           
                                            <th>PIEZA</th>
                                            <th>TRATAMIENTO</th>
                                            <th>COSTO</th>
                                            <th>A/CUENTA</th>
                                            <th>SALDO</th>
                                            <th>FECHA</th>
                                            <th>FIRMA</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $totalCosto = 0;
                                    $totalacuenta = 0;
                                    $totalsaldo=0;
                                        $queryUsuario1 = mysqli_query($conn3, "SELECT * FROM planesProcedimientoDetalles where idPlan = $idPlan and estado = 1 ");
                                        while ($row = mysqli_fetch_assoc($queryUsuario1)) {
                                            $idDetalle = $row['id'];
                                            $tratamiento = $row['tratamiento'];
                                            $costo = $row['costo'];
                                            $acuenta = $row['acuenta'];
                                            $pieza = $row['pieza'];
                                            $fechaProc = $row['fechaProc'];
                                            $saldo = $costo - $acuenta;

                                            echo "<tr>";
                                            echo "<td>" . $pieza . "</td>";
                                            echo "<td>" . $tratamiento . "</td>";
                                            echo "<td>" . number_format($costo, 2) . $moneda. "</td>";
                                            echo "<td>" . number_format($acuenta, 2) . $moneda. "</td>";
                                            echo "<td>" . number_format($saldo, 2) . $moneda ."</td>";
                                            echo "<td>" . $fechaProc . "</td>";
                                            echo "<td>";
                                            $totalCosto += $costo;
                                            $totalacuenta += $acuenta;
                                            $totalsaldo += $saldo;
                                            $queryList = mysqli_query($conn3, "SELECT firma FROM firmas WHERE historia_nombre='planesProcedimientoDetalles' AND historia_id = $idDetalle");
                                            if ($queryList) {
                                                $firma = '';
                                                while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                                    $firma = $rowMotorizado['firma'];
                                                }
                                            }

                                            if (strlen($firma) > 10) {
                                                echo "<img src='$firma' style='width: 55px; height: 35px;'>";
                                            } else {
                                                echo ' ';
                                            }
                                            echo "</td>";
                                           
                                            echo "</tr>";
                                            
                                        }
                                        ?>
                                        <tr style='background-color:rgb(185, 183, 183);'>
                                            <td >TOTAL</td>
                                            <td></td>
                                            <td><?= number_format($totalCosto, 2) . $moneda?></td>
                                            <td><?= number_format($totalacuenta, 2). $moneda?></td>
                                            <td><?= number_format($totalsaldo, 2). $moneda ?></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                                <div class="col-md-12">
                                            <div class="col-md-12">
                                                
                                                <p>Observaciones : <?= $rowConfig['observaciones'] ?></p>
                                            </div>     
                                            <div class="col-md-12">
                                                <label for="">Elaborado por : <?= $nombreUsuario ?></label>
                                            </div>

                                </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>