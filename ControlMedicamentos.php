<?php
include 'header.php';
include 'menu.php';

$queryList = mysqli_query($conn3, "SELECT * FROM  config where (ID_Usuario = '{$_SESSION['ID']}' or ID_Usuario = '{$_SESSION['ID_principal']}')");
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $moneda = $rowMotorizado['moneda'];
}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <br>

    <section class="content">

        <div class="box box-info" align="center">

            <div class="card-body">

                <div class="card-header-title font-size-lg text-capitalize font-weight-normal row">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-6">
                        <h2>Control de Productos Vencidos</h2>
                    </div>
                    <div class="col-md-3">
                    </div>
                </div>

                <div class="tab-content">

                    <div class="tab-pane active" id="tab-eg-1" role="tabpanel">
                        <!-- lista -->
                        <div class="row">
                            <div class="col-md-12">
                                <table id="TablaMedicamentosVencidos" class="table table-striped table-bordered">
                                    <?php
                                    $tableColumna = [
                                        'Fecha Vencimiento',
                                        'Descripción',
                                        'Referencia',
                                        'Lote',
                                        'Deposito',
                                        'Existencias'
                                    ]
                                    ?>
                                    <thead>
                                        <tr>
                                            <?php
                                            foreach ($tableColumna as $columna) {
                                                echo "<th>$columna</th>";
                                            }
                                            ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $querysinvetrios = "SELECT * from sinvetrios where (usuario_id = '{$_SESSION['ID']}' or usuario_id = '{$_SESSION['ID_principal']}') and estado = 1";

                                        $resultsinvetrios = mysqli_query($conn3, $querysinvetrios);
                                        while ($rowsinvetrios = mysqli_fetch_assoc($resultsinvetrios)) {

                                            $inventario_id = $rowsinvetrios['ID'];
                                            $totalExistencia = "0";

                                            $TipoInventarioCodigo = funcionMaster($rowsinvetrios['tipo'], 'id', 'tipo', 'scategoria');
                                            if ($TipoInventarioCodigo == "5") {

                                                $QueryInvDep = mysqli_query($conn3, "SELECT * FROM  SinvDep where idSinvetrios = '$inventario_id'");
                                                while ($RowInvDep = mysqli_fetch_assoc($QueryInvDep)) {

                                                    $FechaVencimiento = $RowInvDep['fechaVencimiento'];
                                                    // Obtenemos la fecha actual en el mismo formato
                                                    $fechaHoy = date("Y-m-d");

                                                    // Comparamos las fechas
                                                    if ($FechaVencimiento < $fechaHoy and $FechaVencimiento != "") {

                                                        $Referencia = $rowsinvetrios['referencia'];
                                                        $Descripcion = $rowsinvetrios['descripcion'];
                                                        $Lote = $RowInvDep['lote'];
                                                        $Deposito = funcionMaster($RowInvDep['idDep'], 'id', 'descripcion', 'dep');
                                                        $Existencias = $RowInvDep['existencia'];

                                                        echo "<tr class='center text-center'>
                                                        <td>$FechaVencimiento</td>
                                                        <td>$Descripcion</td>
                                                        <td>$Referencia</td>
                                                        <td>$Lote</td>
                                                        <td>$Deposito</td>
                                                        <td>$Existencias</td>
                                                    </tr>
                                                ";
                                                    }
                                                }
                                            }
                                        }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <?php
                                            foreach ($tableColumna as $columna) {
                                                echo "<th style='text-align: center;'>$columna</th>";
                                            }
                                            ?>
                                    </tfoot>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>


            </div>




    </section>

    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?php include 'footer.php' ?>

<script>
    $(document).ready(function() {

        new DataTable('#TablaMedicamentosVencidos', {
            responsive: true,
            responsivePriority: 1,
            initComplete: function() {
                this.api()
                    .columns()
                    .every(function() {
                        let column = this;
                        let title = column.footer().textContent;

                        // Create input element
                        let input = document.createElement('input');
                        input.style.textAlign = 'center';
                        input.placeholder = title;
                        input.className = "form-control"
                        column.footer().replaceChildren(input);

                        // Event listener for user input
                        input.addEventListener('keyup', () => {
                            if (column.search() !== this.value) {
                                column.search(input.value).draw();
                            }
                        });
                    });
            }
        });
    });
</script>