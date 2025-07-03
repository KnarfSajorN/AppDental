<!DOCTYPE html>
<?php
include 'header.php';
include 'menu.php';

$OperacionPrincipal = $_GET['OperacionPrincipal'];
?>

<style>
.Titulo_Pagina {
    width: fit-content;
    background-color: #3c8dbc75;
    padding: 20px;
    border-radius: 20px 20px 0px 0px;
    display: table-cell;
}
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#"> Control de Devoluciones  </a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="content">
                <h4 class="Titulo_Pagina">Control de Devoluciones  </h4>
                <div class="box" id="corteX">
                    <div class="box-body">
                        
                        <div class="row">
                            
                        <table id="TablaCortesX" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Fecha</th>
                            <th>Cantidad <br> Productos</th>
                            <th>Total</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $queryList = mysqli_query($conn3, "SELECT * from sOperacionInvDevolucion WHERE idOperacion_Principal = '$OperacionPrincipal'");
                        $nrowl = mysqli_num_rows($queryList);
                        while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                            $Devolucion_id = $rowMotorizado['idOperacion'];
                            $numeroDoc = $rowMotorizado['numeroDoc'];
                            $fechaOperacion = $rowMotorizado['fechaOperacion'];
                            $cantidadProduc = $rowMotorizado['cantidadProduc'];
                            $totalNeto = $rowMotorizado['totalNeto'];

                            $ID_Empresa = $rowMotorizado['ID_Empresa'];
                            if($ID_Empresa=="0"){$Tipo="Factura";}else{$Tipo="Compra";}    
                            echo "<tr>";
                            echo "<td> $numeroDoc </td>
                            <td> $fechaOperacion </td>
                            <td> $cantidadProduc </td>
                            <td> $totalNeto </td>";

                                echo"<td> <a href='EN_PreliminarDevolucionEntidad?idOperacion=$Devolucion_id' class='btn btn-block btn-outline-info rounded-pill shadow m-1' style='width:100%' ><i class='icon-file-invoice-dollar'></i> Preliminar Devolución </a> </td>";
                           
                            
                            
                            echo"</tr>";
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Fecha</th>
                            <th>Cantidad <br> Productos</th>
                            <th>Total</th>
                            <th>Acciones</th>
                        </tr>
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


<?php
include 'footer.php';
?>
