<?php
if ($_POST['Tipo'] == "Ajax Cargar Detalles") {
    include '../funciones/conn3.php';
    $conciliacion_id = $_POST['conciliacion_id'];
    $DatosTabla = "";
    $queryList = mysqli_query($conn3, "SELECT * FROM Stransbanco WHERE conciliacion_id = '$conciliacion_id'; ");
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        $contador++;
        $DatosTabla .= "<tr>";
        $DatosTabla .= "<td>" . $contador . "</td>";
        $DatosTabla .= "<td>" . $rowMotorizado['fechaTrans'] . "</td>";
        $DatosTabla .= "<td>" . $rowMotorizado['Documento'] . "</td>";
        $DatosTabla .= "<td>" . $rowMotorizado['tipo'] . "</td>";
        $DatosTabla .= "<td>" . $rowMotorizado['DetalleMovimiento'] . "</td>";
        $DatosTabla .= "<td>" . $rowMotorizado['debito'] . "</td>";
        $DatosTabla .= "<td>" . $rowMotorizado['credito'] . "</td>";
        $DatosTabla .= "</tr>";
    }

    $queryList = mysqli_query($conn3, "SELECT * FROM Stransbanco_Conciliado WHERE id = '$conciliacion_id'; ");
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        $Saldo_Banco = $rowMotorizado['Saldo_Banco'];
        $Saldo_Conciliar = $rowMotorizado['Saldo_Conciliar'];

        $Totales = "<tr><td></td><td colspan='3'><b>Saldo Banco:</b> $Saldo_Banco</td> <td colspan='3'><b>Saldo Conciliado:</b> $Saldo_Conciliar</td></tr>";
    }

    echo $DatosTabla . $Totales;
    exit();
}

include '../header.php';
include '../menu.php';

?>

<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="copyPaste"></div>
        <div class="">
            <div class="col-xs-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <div class="float-left">
                                    <h4>Historial de Conciliaciones</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped w-100" id="example1">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Banco</th>
                                            <th scope="col">Fecha/Hora</th>
                                            <th scope="col">Saldo Banco</th>
                                            <th scope="col">Saldo Conciliado</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $queryList = mysqli_query($conn3, "SELECT * FROM  Stransbanco_Conciliado ORDER BY id ASC");
                                        while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                            $contador++;
                                            $id = $rowMotorizado['id'];
                                            $Banco = funcionMaster($rowMotorizado['idBanco'], 'id', 'descripcion', 'Sbancos');
                                            $Fecha = $rowMotorizado['Fecha'];
                                            $idBanco = $rowMotorizado['idBanco'];
                                            $Saldo_Banco = $rowMotorizado['Saldo_Banco'];
                                            $Saldo_Conciliar = $rowMotorizado['Saldo_Conciliar'];

                                            $ruta = htmlentities($_SERVER['PHP_SELF']);
                                            echo "<tr ><th scope='row' width='2%'>{$contador}</th>
                                                                                        <td width='20%' align='center'>{$Banco}</td>
                                                                                        <td width='20%' align='center'>{$Fecha}</td>
                                                                                        <td width='20%' align='center'>{$Saldo_Banco}</td>
                                                                                        <td width='20%' align='center'>{$Saldo_Conciliar}</td>";

                                            echo "<td width='20%' align='center'> <button   class='btn btn-block btn-outline-info rounded-pill' data-toggle='modal' data-target='#ModalDetallesConciliacion' onclick='CargarDetalles($id)'>
                                                                                    Ver Detalles    </button> </td></tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<div class="modal fade" id="ModalDetallesConciliacion">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detalles de la conciliacion</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Fecha Operación</th>
                            <th scope="col">Documento</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Detalle</th>
                            <th scope="col">Débitos</th>
                            <th scope="col">Créditos</th>
                        </tr>
                    </thead>
                    <tbody id="tbody-detallesconciliacion">
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<?php
include '../footer.php';
?>

<script>
    function CargarDetalles(conciliacion_id) {
        $.ajax({
            url: './bancos/bancosConciliaciones.php',
            type: 'POST',
            data: {
                conciliacion_id: conciliacion_id,
                Tipo: 'Ajax Cargar Detalles'
            },
            success: function(response) {
                console.log(response);
                $('#tbody-detallesconciliacion').html(response);
            }

        })
    }
</script>