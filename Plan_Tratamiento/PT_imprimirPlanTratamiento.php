<?php
include '../funciones/funciones.php';
include '../funciones/conn3.php';
// recibir el id del paciente
$idCliente = $_GET['idCliente'];
$ID_principal = $_GET['idP'];
$moneda = funcionMaster($ID_principal, 'ID', 'moneda', 'config');
$fechaACtual = date('Y-m-d');
$queryCliente = mysqli_query($conn3, "SELECT * from cliente where cliente_id = $idCliente");
$rowCliente = mysqli_fetch_assoc($queryCliente);

// arreglo con los detalles del plan
$arrayPiezas = [
    ['img' => '' . $Base . 'Plan_Tratamiento/img/image1.png', 'nombrePieza' => '18'],
    ['img' => '' . $Base . 'Plan_Tratamiento/img/image1.png', 'nombrePieza' => '17'],
    ['img' => '' . $Base . 'Plan_Tratamiento/img/image1.png', 'nombrePieza' => '16'],
    ['img' => '' . $Base . 'Plan_Tratamiento/img/image1.png', 'nombrePieza' => '15-55'],
    ['img' => '' . $Base . 'Plan_Tratamiento/img/image1.png', 'nombrePieza' => '14-54'],
    ['img' => '' . $Base . 'Plan_Tratamiento/img/image2.png', 'nombrePieza' => '13-53'],
    ['img' => '' . $Base . 'Plan_Tratamiento/img/image2.png', 'nombrePieza' => '12-52'],
    ['img' => '' . $Base . 'Plan_Tratamiento/img/image2.png', 'nombrePieza' => '11-51'],
    ['img' => '' . $Base . 'Plan_Tratamiento/img/image2.png', 'nombrePieza' => '21-61'],
    ['img' => '' . $Base . 'Plan_Tratamiento/img/image2.png', 'nombrePieza' => '22-62'],
    ['img' => '' . $Base . 'Plan_Tratamiento/img/image2.png', 'nombrePieza' => '23-63'],
    ['img' => '' . $Base . 'Plan_Tratamiento/img/image1.png', 'nombrePieza' => '24-64'],
    ['img' => '' . $Base . 'Plan_Tratamiento/img/image1.png', 'nombrePieza' => '25-65'],
    ['img' => '' . $Base . 'Plan_Tratamiento/img/image1.png', 'nombrePieza' => '26'],
    ['img' => '' . $Base . 'Plan_Tratamiento/img/image1.png', 'nombrePieza' => '27'],
    ['img' => '' . $Base . 'Plan_Tratamiento/img/image1.png', 'nombrePieza' => '28'],
    ['img' => '' . $Base . 'Plan_Tratamiento/img/image1.png', 'nombrePieza' => '38'],
    ['img' => '' . $Base . 'Plan_Tratamiento/img/image1.png', 'nombrePieza' => '37'],
    ['img' => '' . $Base . 'Plan_Tratamiento/img/image1.png', 'nombrePieza' => '36'],
    ['img' => '' . $Base . 'Plan_Tratamiento/img/image1.png', 'nombrePieza' => '35-75'],
    ['img' => '' . $Base . 'Plan_Tratamiento/img/image1.png', 'nombrePieza' => '34-74'],
    ['img' => '' . $Base . 'Plan_Tratamiento/img/image2.png', 'nombrePieza' => '33-73'],
    ['img' => '' . $Base . 'Plan_Tratamiento/img/image2.png', 'nombrePieza' => '32-72'],
    ['img' => '' . $Base . 'Plan_Tratamiento/img/image2.png', 'nombrePieza' => '31-71'],
    ['img' => '' . $Base . 'Plan_Tratamiento/img/image2.png', 'nombrePieza' => '41-81'],
    ['img' => '' . $Base . 'Plan_Tratamiento/img/image2.png', 'nombrePieza' => '42-82'],
    ['img' => '' . $Base . 'Plan_Tratamiento/img/image2.png', 'nombrePieza' => '43-83'],
    ['img' => '' . $Base . 'Plan_Tratamiento/img/image1.png', 'nombrePieza' => '44-84'],
    ['img' => '' . $Base . 'Plan_Tratamiento/img/image1.png', 'nombrePieza' => '45-85'],
    ['img' => '' . $Base . 'Plan_Tratamiento/img/image1.png', 'nombrePieza' => '46'],
    ['img' => '' . $Base . 'Plan_Tratamiento/img/image1.png', 'nombrePieza' => '47'],
    ['img' => '' . $Base . 'Plan_Tratamiento/img/image1.png', 'nombrePieza' => '48'],


];


$queryInventario = mysqli_query($conn3, "SELECT *, s.ID as idvalue, s.descripcion as nombreProducto from sinvetrios s
left join scategoria sca on s.tipo = sca.id 
where s.ID_principal = $ID_principal and estado = 1
and sca.tipo = 2");
while ($row = mysqli_fetch_assoc($queryInventario)) {
    $inventario[] = $row;
}

$FAID = base64_decode($_GET['FAID']);



// tenemos un plan y vamos a consultar
// consulta a la cabecera
$queryHeader = mysqli_query($conn3, "SELECT * from planesTratamiento where id = $FAID");
$resultheader = mysqli_fetch_assoc($queryHeader);


// // consulta al detalle
$queryDetail = "SELECT * from planesTratamientoDetalles where idPlan = $FAID order by id";
$rowDetalles = mysqli_query($conn3, $queryDetail);
$detalles = [];
while ($row = mysqli_fetch_assoc($rowDetalles)) {
    $detalles[] = $row;
}
// var_dump($detalles);
// var_dump($resultheader);
// echo "SELECT * from planesTratamiento where id = $FAID";
// echo "SELECT * from planesTratamientoDetalles where idPlan = $FAID";
?>
<style>
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

    *,
    body {
        font-size: 11px !important;
    }
</style>
<table style="border:0;">
    <tr style="border:0;">
        <td style="border:0;">
            <h2 style="font-size: 20px !important;">PLAN DE TRATAMIENTO</h2>
        </td>
    </tr>
</table>
<div class="content-wrapper p-3">
    <section class="content">
        <div class="col-xs-12">
            <div class="row">
                <div class="col-md-12">
                    <form action="" id="formLogo" method="POST">
                        <div class="card card-info">


                            <div class="card-body">
                                <div class="row table-responsive">
                                    <table class="table  table-bordered table-striped" id="tablaInventario" style="width:100%">

                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>PIEZA</th>
                                                <th>DIAGNOSTICO</th>
                                                <th>TRATAMIENTO</th>
                                                <th>COSTO</th>
                                                <th>FIRMA PCT.</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $costoTotal = 0;
                                            foreach ($detalles as $pieza) {
                                                $piezaId = $pieza['id'];
                                                $img = $arrayPiezas[array_search($pieza['nombrePieza'], array_column($arrayPiezas, 'nombrePieza'))]['img'];
                                                $nombrePieza = $pieza['nombrePieza'];
                                                echo "<tr>";
                                                echo "<td><img src='$img' width='30px' height='15px'></td>";
                                                echo "<td class='letra-bold'>$nombrePieza</td>";
                                                echo "<td class='letra-bold'>" . $pieza['diagnostico'] . "</td>";

                                                echo "<td class='letra-bold'>" . $pieza['tratamiento']  . "</td>";
                                                echo "<td class='letra-bold'>" . (($pieza['costo'] != '' && $pieza['costo'] != null) ? number_format($pieza['costo'], 2)  : number_format(0, 2)) . "</td>";
                                                echo "<td>";

                                                $queryList = mysqli_query($conn3, "SELECT firma FROM firmas WHERE historia_nombre='planesTratamientoDetalles' AND historia_id = $piezaId");
                                                if ($queryList) {
                                                    $firma = '';
                                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                                        $firma = $rowMotorizado['firma'];
                                                    }
                                                }

                                                if (strlen($firma) > 10) {
                                                    echo "<img src='$firma' style='width: 85px; height: 15px;'>";
                                                } else {
                                                    echo " ";
                                                }

                                                echo "</td>";
                                                echo "</tr>";
                                                $costoTotal += $pieza['costo'];
                                            }


                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="4" style="text-align:right">COSTO TOTAL</th>
                                                <th id="" class="text-align:center"><?= number_format($costoTotal, 2) ?></th>
                                                <th></th>


                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>

                            <div class="col-md-12 form-group"><br>
                                <p class="sm-letra letra-bold">EN CASO DE EXISTIR TRABAJOS ESPECIALES, ADICIONALES, EXPLICACIONES GRAFICAS U OTROS Y/O A REALIZAR, ANOTAR AQUÍ:</p>
                                <textarea name="" class="borde-text" id="" onchange="automaticUpdate(this.value, 'notas', 'planesTratamiento', <?= $FAID ?>)" class="form-control" rows="4" readonly> <?= $resultheader['notas'] ?></textarea>

                            </div>
                            <div class="col-md-12 form-group p-3">
                                <p class="sm-letra letra-bold">ESTE PLAN DE TRATAMIENTO Y EL COSTO QUE INCLUYE DESCUENTOS Y DEMÁS OFERTAS TIENE UN TIEMPO LÍMITE DE: <?= $resultheader['fVencimiento'] ?> DIAS A PARTIR DE LA FECHA.
                                    ACEPTACIÓN DEL PLAN DE TRATAMIENTO:</p>

                                <p class=" letra-bold">Nombre del paciente: <?= $rowCliente['nombre_cliente'] ?></p>
                                <div class="container">

                                    <p style="margin:0; padding:0;">C.I.<?= $rowCliente['CODI_CLIENTE'] ?></p>
                                    <p style="margin:0; padding:0;">Fecha:<?= $fechaACtual ?></p>
                                    <p style="margin:0; padding:0;">Firma: <br>
                                        <?php $firma = funcionMaster($FAID, " historia_nombre='planesTratamiento' and historia_id", 'firma', 'firmas'); ?>
                                        <?php if ($firma != null && $firma != "" && $firma != "null") { ?>
                                            <img src="<?= $firma ?>" style="height: 2cm; width: auto;">
                                        <?php } ?>
                                    </p>
                                </div>


                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
</div>