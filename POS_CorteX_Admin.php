<!DOCTYPE html>
<?php
include 'header.php';
include 'menu.php';

///////////////////////////////////////////////////////////////////////////

if ($_GET["msg"] != "") {
    include "plugins/SweetAlert2K/AlertaCorrectaOperacion.php";
}
if ($_GET["error"] != "") {
    include "plugins/SweetAlert2K/AlertaErrorOperacion.php";
}

$usuario_id = $_SESSION['ID'];
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
            <li><a href="#"> Corte X Admin </a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="content">
                <h4 class="Titulo_Pagina">Corte X Admin </h4>
                <div class="box" id="corteX">
                    <div class="box-body">


                    <div class="col-md-12">
                        <label for="sucursales">Usuario</label>
                        <select name="usuariofiltro" id="usuariofiltro" class="form-control input-lg select2" style="width: 100%;">
                            <option value="">Todos</option>
                            <?php
                            $queryList = mysqli_query($conn3, "SELECT * FROM usuarios WHERE ACTIVO = 1");
                            while ($row_recordset32 = mysqli_fetch_array($queryList)) {
                            ?>
                                <option value="<?php echo $row_recordset32['NOMBRE_USUARIO']; ?>"><?php echo $row_recordset32['NOMBRE_USUARIO']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                        <br><br>
                    </div>

                    <table id="TablaCortesX" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Fecha</th>
                            <th>Turno</th>
                            <th>Usuario</th>
                            <th>Caja</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $queryList = mysqli_query($conn3, "SELECT * from Cortes");
                        $nrowl = mysqli_num_rows($queryList);
                        while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                            $Cid = $rowMotorizado['id'];
                            $Cfecha = $rowMotorizado['Fecha'];
                            $Chora = $rowMotorizado['Hora'];
                            $Cturno = $rowMotorizado['Turno'];
                            $CidUsuario = $rowMotorizado['usuario_id'];
                            $nombreCajero = funcionMaster($rowMotorizado['usuario_id'], 'ID', 'NOMBRE_USUARIO', 'usuarios');

                            $CimpuestoBase = $rowMotorizado['impuestoBase'];
                            $CtotalNeto = $rowMotorizado['totalNeto'];
                            $CtotalBruto = $rowMotorizado['totalBruto'];
                            $Cpos = $rowMotorizado['Pos'];
                            $Cfirma = $rowMotorizado['Firma'];
                            $Cconfirmado = $rowMotorizado['confirmado'];
                            $Cnotas = $rowMotorizado['Notas'];
                            $pagos = json_decode($rowMotorizado['MediosPago'], true);
                        ?>
                        <tr>
                            <td><?=$Cid?></td>
                            <td><?=$Cfecha?> - <?=$Chora?></td>
                            <td><?=$Cturno?></td>
                            <td><?=funcionMaster($CidUsuario, 'ID', 'NOMBRE_USUARIO', 'usuarios')?></td>
                            <td><?="[".funcionMaster($Cpos,'id','Nombre','PuntoPOS')."]";?></td>
                            <td><button class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" data-toggle="modal" data-target="#exampleModal<?=$Cid?>">Ver
                                    Detalle <?=$Cid?></button><br>
                                <a href="POS_ImprimirCorte?cortex=<?=$Cid?>" class="btn btn-outline-success btn-lg rounded-pill shadow" style="width:100%">Imprimir</a>
                            </td>
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal<?=$Cid?>" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog " role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Detalle Corte de Caja - <?=$Cid?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="modal-body">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Usuario de Caja</label>
                                                    <input type="text" class="form-control input-lg" value="<?=$nombreCajero?>"
                                                        disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="control-label">Turno</label>
                                                <input class="form-control input-lg" type="text" disabled value="<?=$Cturno?>"
                                                    disabled>
                                            </div>
                                        </div>
                                        <!-- UNROW -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label class="control-label">Notas</label>
                                                <input type="text" disabled value="<?=$Cnotas?>" name="nota"
                                                    class="form-control input-lg">
                                            </div>
                                        </div>
                                        <!-- UNROW -->
                                        <div class="col-md-12">
                                            <hr>
                                        </div>
                                        <!-- UNROW -->
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Medio de Pago</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label"> Total en Caja </label>

                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Total Registrado </label>
                                                </div>
                                            </div>
                                        </div>
                                        <?php

                                            //$ArregloMediosPago="";
                                            $ArregloMediosPago=[];
                                            $TotalFinalCaja=0;
                                            $TotalFinalCorteRegistrado=0;
                                            $QueryMedioPago = mysqli_query($conn3, "SELECT * FROM Medios_Pago WHERE  Activo = '1'");
                                            while ($RowMedioPago = mysqli_fetch_array($QueryMedioPago)) {

                                                $MedioPago_id = $RowMedioPago['id'];
                                                $Nombre_MedioPago = $RowMedioPago['Nombre'];

                                                $ArregloMediosPago[$MedioPago_id]["Nombre"]=$Nombre_MedioPago;
                                                $ArregloMediosPago[$MedioPago_id]["Valor"]="0";

                                            }

                                            
                                            $QueryOperacion = mysqli_query($conn3, "SELECT * FROM sOperacionInv WHERE Corte = '$Cid' ");
                                            while ($RowOperacion = mysqli_fetch_assoc($QueryOperacion)) {
                                                $idOperacion = $RowOperacion['idOperacion'];

                                                $QueryPagos = mysqli_query($conn3, "SELECT * FROM sDetalleMetodosPagos WHERE idOperacion = '$idOperacion' ");
                                                while ($RowPagos = mysqli_fetch_assoc($QueryPagos)) {
                                                    $metodo_pago = $RowPagos['metodo_pago'];
                                                    $ArregloMediosPago[$metodo_pago]["Valor"]+= $RowPagos['nota_pago'];
                                                }

                                            }
                                                foreach ($ArregloMediosPago as $key => $value) {
                                                    
                                                    echo "<div class='row'>
                                                    <div class='col-md-4'>
                                                        <div class='form-group card-btm-border border-success'>
                                                            <label class='control-label'>".$value['Nombre']."</label>
                                                        </div>
                                                    </div>
                                                    <div class='col-md-4'>
                                                        <div class='form-group card-btm-border border-success'>
                                                            <label
                                                                class='control-label'>".number_format($value['Valor'], 0, ',', '.')."</label>
                                                        </div>
                                                    </div>
                                                    <div class='col-md-4'>
                                                        <div class='form-group'>
                                                            <input type='number' value='".$pagos[$key]."' name='tipoPago1' id='tipoPago1'
                                                                class='form-control' placeholder='Efectivo' disabled>
                                                        </div>
                                                    </div>
                                                </div>";

                                                $TotalFinalCaja += $value['Valor'];
                                                $TotalFinalCorteRegistrado += $pagos[$key];
                                                }
                                            

                                        ?>
                                        <!-- UNROW -->
                                        <div class="col-md-12">
                                            <hr>
                                        </div>
                                        <!-- UNROW -->
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group card-btm-border border-success">
                                                    <label class="control-label"><strong>Total</strong></label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group card-btm-border border-success">
                                                    <label
                                                        class="control-label"><strong><?=number_format($TotalFinalCaja, 0, ',', '.')?></strong></label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="number" step="0.01" disabled value="<?=$TotalFinalCorteRegistrado?>" required name=""
                                                        disabled="" id="totalPago1" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-danger btn-lg rounded-pill shadow" data-dismiss="modal">Cerrar</button>
                                        <a href="POS_ImprimirCorte?cortex=<?=$Cid?>" class="btn btn-outline-info btn-lg rounded-pill shadow">Imprimir</a>
                                    </div>
                                    <!-- </form> -->
                                </div>
                            </div>
                        </div>
                        <?php
                }
                ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Fecha</th>
                            <th>Turno</th>
                            <th>Usuario</th>
                            <th>Caja</th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>





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

<script>


$(document).ready(function() {
    var table = new DataTable('#TablaCortesX', {
        responsive: true,
        responsivePriority: 1
    });


   // Event listener para el elemento select
   $('#usuariofiltro').on('change', function() {
        var filtro = $(this).val();

        // Si el valor seleccionado es vacío, muestra todos los datos
        if (filtro === '') {
            table.column(3).search('').draw();
        } else {
            // Aplica el filtro a la columna 4 (índice 3) con el valor seleccionado
            table.column(3).search(filtro).draw();
        }
    });
});
</script>


