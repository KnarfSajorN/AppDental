<?php

// verificar tablas creadas
include '../header.php';
include '../menu.php';
$ID = $_SESSION['ID'];

// var_dump($_POST);
// post x numero
// array(4) { ["fechaD"]=> string(10) "2023-10-01" ["fechaH"]=> string(10) "2023-10-31" ["estado"]=> string(2) "99" ["tipo"]=> string(4) "odc" }


function estadosOrden($estado)
{
    if ($estado == 0) {
        $estadoSalida = '<p class="text-info">PENDIENTE</p>';
    } else if ($estado == 1) {
        $estadoSalida = '<p class="text-info">APROBADO</p>';
    } else if ($estado == 2) {
        $estadoSalida = '<p class="text-success">PROCESADA</p>';
    } else if ($estado == 3) {
        $estadoSalida = '<p class="text-danger">RECHAZADA</p>';
    }
    return $estadoSalida;
}

?>

<div class="content-wrapper p-3">
    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="col-xs-12">
                <div class="row">
                    <button class="btn btn-info rounded-pill col-auto m-2 d-print-none" onclick="window.location.href='./ordenesCompraReportes'">
                        <i class="fas fa-arrow-left mr-1"></i>
                        Regresar
                    </button>

                    <button class="btn btn-info rounded-pill col-auto m-2 d-print-none" onclick="window.print()">
                        <i class="fas fa-print mr-1"></i>
                        Imprimir todo
                    </button>

                    <?php if ($_POST['tipo'] == 'odc') :  ?>
                        <?php
                        // ordenes de compra x numero de orden (general)
                        // do you believe in magic?
                        // in a young girl's heart 
                        $queryHeader = "SELECT * from ordenesCompraHeader
                    where 1=1
                    " . ($_POST['fechaD'] != '' ? " and substring(fechaRegistro,1,10) >= '{$_POST['fechaD']}'" : "") . "
                    " . ($_POST['fechaH'] != '' ? " and substring(fechaRegistro,1,10) <= '{$_POST['fechaH']}'" : "") . "
                    " . ($_POST['estado'] != '99' ? " and estado = '{$_POST['estado']}'" : "") . "
                    order by id asc
                    ";
                        $resultHeader = mysqli_query($conn3, $queryHeader);
                        $rowHeader = [];
                        while ($row = mysqli_fetch_assoc($resultHeader)) {
                            $rowHeader[] = $row;
                        }
                        // var_dump($rowHeader);
                        ?>
                        <?php for ($i = 0; $i < (count($rowHeader) - 1); $i++) : ?>
                            <div class="col-md-12 printer" id="print-<?= $rowHeader[$i]['id'] ?>" style="break-inside: avoid;">
                                <div class="card card-light">
                                    <div class="card-header">
                                        <div class="float-left">
                                            <h4>Orden <strong>#<?= $rowHeader[$i]['id'] ?></strong> </h4>
                                        </div>
                                    </div>
                                    <div class="card-body row">
                                        <div class="form-group col-md-12 row bg-light rounded">
                                            <div class="col-md-6">
                                                <label for="">Fecha de Creación:</label>
                                                <p><?= $rowHeader[$i]['fecha'] ?></p>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">Usuario:</label>
                                                <p><?= funcionMaster($rowHeader[$i]['usuario_id'], 'ID', 'concat(USUARIO," | ",NOMBRE_USUARIO)', 'usuarios') ?></p>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">Cantidad de registros:</label>
                                                <p><?= $rowHeader[$i]['cantidadRegistros'] ?></p>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">Subtotal grabado:</label>
                                                <p><?= number_format($rowHeader[$i]['total']) ?></p>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">Estado actual:</label>
                                                <?= estadosOrden($rowHeader[$i]['estado']) ?>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">Notas:</label>
                                                <?= $rowHeader[$i]['notas'] ?>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <table class="table table-striped" id="Tabla_Rapida_AJAX">
                                                <?php
                                                $columnasTabla = [
                                                    'Deposito',
                                                    'Proveedor',
                                                    'Inventario',
                                                    'Costo',
                                                    'Cantidad',
                                                    'Subtotal',
                                                ];
                                                ?>
                                                <thead>
                                                    <tr>
                                                        <?php for ($f = 0; $f < count($columnasTabla); $f++) : ?>
                                                            <th><?= $columnasTabla[$f] ?></th>
                                                        <?php endfor ?>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $queryDetalle = "SELECT * from ordenesCompraPendiente where estado = 1 and nOrden = " . $rowHeader[$i]['id'] . " ";
                                                    // var_dump($queryDetalle);
                                                    $resultDetalle = mysqli_query($conn3, $queryDetalle);
                                                    $rowDetalles = [];
                                                    while ($row = mysqli_fetch_assoc($resultDetalle)) {
                                                        $rowDetalles[] = $row;
                                                    }
                                                    ?>
                                                    <?php for ($e = 0; $e < count($rowDetalles); $e++) : ?>
                                                        <tr>
                                                            <td><?= funcionMaster($rowDetalles[$e]['dep'], 'id', 'descripcion', 'dep') ?></td>
                                                            <td><?= funcionMaster($rowDetalles[$e]['tercero'], 'id', 'concat(rut," | ",nombre)', 'sproveedores') ?></td>
                                                            <td><?= funcionMaster($rowDetalles[$e]['codigoProd'], 'ID', 'descripcion', 'sinvetrios') ?></td>
                                                            <td><?= number_format($rowDetalles[$e]['costo']) ?></td>
                                                            <td><?= number_format($rowDetalles[$e]['cantidad']) ?></td>
                                                            <td><?= number_format($rowDetalles[$e]['subtotal']) ?></td>
                                                        </tr>
                                                    <?php endfor ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="card-footer d-print-none">
                                        <input type="hidden" name="tipo" value="odcp">
                                        <button class="btn btn-outline-info rounded-pill" onclick="printDiv('print-<?= $rowHeader[$i]['id'] ?>')">
                                            <i class="fa fa-print"></i>
                                            Imprimir
                                        </button>
                                    </div>
                                </div>
                            </div>
                        <?php endfor ?>
                    <?php endif  ?>

                    <?php if ($_POST['tipo'] == 'odcp') :  ?>
                        <?php
                        // ordenes de compra x proveedor (general)
                        // do you believe in magic?
                        // in a young girl's heart

                        $queryProveedores = "SELECT * from sproveedores where Activo = 1";
                        $resultProveedores = mysqli_query($conn3, $queryProveedores);
                        $rowProveedores = [];
                        while ($row = mysqli_fetch_assoc($resultProveedores)) {
                            $rowProveedores[] = $row;
                        }

                        $queryHeader = "SELECT * from ordenesCompraHeader
                    where 1=1
                    " . ($_POST['fechaD'] != '' ? " and substring(fechaRegistro,1,10) >= '{$_POST['fechaD']}'" : "") . "
                    " . ($_POST['fechaH'] != '' ? " and substring(fechaRegistro,1,10) <= '{$_POST['fechaH']}'" : "") . "
                    " . ($_POST['estado'] != '99' ? " and estado = '{$_POST['estado']}'" : "") . "
                    order by id asc
                    ";
                        $resultHeader = mysqli_query($conn3, $queryHeader);
                        $rowHeader = [];
                        while ($row = mysqli_fetch_assoc($resultHeader)) {
                            $rowHeader[] = $row;
                        }
                        // var_dump($rowHeader);
                        ?>
                        <?php for ($p = 0; $p < (count($rowProveedores) - 1); $p++) : ?>
                            <div class="col-md-12 d-print-none">
                                <div class="card card-info">
                                    <div class="card-header">
                                        <div class="float-left">
                                            <h4>Proveedor: <strong><?= $rowProveedores[$p]['rut'] ?> | <?= $rowProveedores[$p]['nombre'] ?></strong> </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php for ($i = 0; $i < (count($rowHeader) - 1); $i++) : ?>
                                <?php
                                $lotiene = 0 + funcionMaster('1', '1 and estado = 1 and nOrden = ' . $rowHeader[$i]['id'] . ' and tercero = ' . $rowProveedores[$p]['id'] . '', 'count(id)', 'ordenesCompraPendiente');
                                ?>
                                <?php if ($lotiene > 0) : ?>
                                    <div class="col-md-12 printer" id="print-<?= $rowHeader[$i]['id'] ?>-<?= $rowProveedores[$p]['id'] ?>" style="break-inside: avoid;">
                                        <div class="card card-light">
                                            <div class="card-header">
                                                <div class="float-left">
                                                    <h4>Orden <strong>#<?= $rowHeader[$i]['id'] ?></strong> </h4>
                                                </div>
                                            </div>
                                            <div class="card-body row">
                                                <div class="form-group col-md-12 row bg-light rounded">
                                                    <div class="col-md-6">
                                                        <label for="">Fecha de Creación:</label>
                                                        <p><?= $rowHeader[$i]['fecha'] ?></p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="">Usuario:</label>
                                                        <p><?= funcionMaster($rowHeader[$i]['usuario_id'], 'ID', 'concat(USUARIO," | ",NOMBRE_USUARIO)', 'usuarios') ?></p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="">Cantidad de registros:</label>
                                                        <p><?= $rowHeader[$i]['cantidadRegistros'] ?></p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="">Subtotal grabado:</label>
                                                        <p><?= number_format($rowHeader[$i]['total']) ?></p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="">Estado actual:</label>
                                                        <?= estadosOrden($rowHeader[$i]['estado']) ?>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="">Notas:</label>
                                                        <?= $rowHeader[$i]['notas'] ?>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <table class="table table-striped" id="Tabla_Rapida_AJAX">
                                                        <?php
                                                        $columnasTabla = [
                                                            'Deposito',
                                                            'Proveedor',
                                                            'Inventario',
                                                            'Costo',
                                                            'Cantidad',
                                                            'Subtotal',
                                                        ];
                                                        ?>
                                                        <thead>
                                                            <tr>
                                                                <?php for ($f = 0; $f < count($columnasTabla); $f++) : ?>
                                                                    <th><?= $columnasTabla[$f] ?></th>
                                                                <?php endfor ?>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $queryDetalle = "SELECT * from ordenesCompraPendiente where estado = 1 and nOrden = " . $rowHeader[$i]['id'] . " and tercero = " . $rowProveedores[$p]['id'] . " ";
                                                            // var_dump($queryDetalle);
                                                            $resultDetalle = mysqli_query($conn3, $queryDetalle);
                                                            $rowDetalles = [];
                                                            while ($row = mysqli_fetch_assoc($resultDetalle)) {
                                                                $rowDetalles[] = $row;
                                                            }
                                                            ?>
                                                            <?php for ($e = 0; $e < count($rowDetalles); $e++) : ?>
                                                                <tr>
                                                                    <td><?= funcionMaster($rowDetalles[$e]['dep'], 'id', 'descripcion', 'dep') ?></td>
                                                                    <td><?= funcionMaster($rowDetalles[$e]['tercero'], 'id', 'concat(rut," | ",nombre)', 'sproveedores') ?></td>
                                                                    <td><?= funcionMaster($rowDetalles[$e]['codigoProd'], 'ID', 'descripcion', 'sinvetrios') ?></td>
                                                                    <td><?= number_format($rowDetalles[$e]['costo']) ?></td>
                                                                    <td><?= number_format($rowDetalles[$e]['cantidad']) ?></td>
                                                                    <td><?= number_format($rowDetalles[$e]['subtotal']) ?></td>
                                                                </tr>
                                                            <?php endfor ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="card-footer d-print-none">
                                                <input type="hidden" name="tipo" value="odcp">
                                                <button class="btn btn-outline-info rounded-pill" onclick="printDiv('print-<?= $rowHeader[$i]['id'] ?>-<?= $rowProveedores[$p]['id'] ?>')">
                                                    <i class="fa fa-print"></i>
                                                    Imprimir
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif ?>
                            <?php endfor ?>
                        <?php endfor ?>

                    <?php endif  ?>
                </div>

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include '../footer.php';
?>

<script>
    function printDiv(divId) {
        var divs = document.querySelectorAll('.printer');
        for (var i = 0; i < divs.length; i++) {
            divs[i].style.display = 'none';
            // si el id del div es igual al id del div que se va a mostrar
            if (divs[i].id == divId) {
                divs[i].style.display = 'block';
            }
        }

        // Create a new window to open the print preview
        var printWindow = window.print();

        // Set the HTML contents of the new window to the div contents
        // printWindow.document.body.innerHTML = document.body.innerHTML;

        // Print the new window
        // printWindow.print();

        // Close the new window after printing is done
        // printWindow.close();

        for (var i = 0; i < divs.length; i++) {
            divs[i].style.display = 'block';
        }
    }
</script>