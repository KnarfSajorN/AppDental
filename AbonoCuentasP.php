<?php
include 'header.php';
include 'menu.php';

$idOperacion = $_GET['idOperacion'];

$queryList = mysqli_query($conn3, "SELECT * FROM  sOperacionInv where  idOperacion = '$idOperacion' limit 1");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $idOperacion      = $rowMotorizado['idOperacion'];
    $numeroDoc      = $rowMotorizado['numeroDoc'];
    $idCliente      = $rowMotorizado['idCliente'];
    $ID_Empresa      = $rowMotorizado['ID_Empresa'];

    $totalNeto      = $rowMotorizado['totalNeto'];
    $montoPagado      = $rowMotorizado['montoPagado'];
    $ID_Empresa      = $rowMotorizado['ID_Empresa'];

    $idCuentaContableCXP = $rowMotorizado['idCuentaContableCXP']; //Contabilidaad importante
    $saldo = ($rowMotorizado['totalNeto'] - $rowMotorizado['montoPagado']);
}

//$saldo = $totalNeto - $montoPagado;

////////////////////////////////////////////////////////////////////////devoluciones////////////////////////////////////////////////////////////////
$ValorProductoDevuelto = 0;
$MontoDevolucion=0;
$ResultDevolucion = mysqli_query($conn3,"SELECT * FROM sOperacionInvDevolucion where idOperacion_principal =$idOperacion");
while ($RowDevolucion = mysqli_fetch_array($ResultDevolucion)) {
    $ValorProductoDevuelto = round($ValorProductoDevuelto+$RowDevolucion['totalNeto'],2);
    $MontoDevolucion = round($MontoDevolucion+$RowDevolucion['MontoDevolucion'],2);
}

$saldodevolucion = ($ValorProductoDevuelto - $MontoDevolucion);
$saldo = round($saldo-$saldodevolucion,2);
////////////////////////////////////////////////////////////////////////devoluciones////////////////////////////////////////////////////////////////


$nombre_paciente = funcionMaster($ID_Empresa, 'id', 'nombre', 'sproveedores');
$rut_P = funcionMaster($ID_Empresa, 'id', 'rut', 'sproveedores');








?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Proveedor: <?php echo $nombre_paciente ?></b><br>
            <b>RUT: <?php echo $rut_P ?></b>

        </h1>
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#">Proveedores</a></li>
        </ol>
    </section>



    <!-- Main content -->
    <section class="content">
        <div>
            <div class="col-xs-6 col-md-offset-3">
                <?php
                ?>

                <div class="box">
                    <form action="AbonoRegistrarP.php" method="POST" name="formularioActualizarcliente" id="FormularioCuentaporPagar">
                        <div class="box-header" align="center">
                            <h2>Pago a Cuentas a Pagar #<?php echo $numeroDoc ?></h2>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="form-group col-md-12">
                                <div align="left">
                                    <h3>Deuda <br>
                                        <?php echo number_format($saldo,2) ?> $</h3>
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <div align="left">Fecha de pago</div>
                                <input type="date" class="form-control input-lg" id="fecha_abono" name="fecha_abono" value="<?php echo date('Y-m-d'); ?>">
                            </div>

                            <div class="form-group col-md-12">
                                <div align="left">Valor a Abonar</div>
                                <input type="number" class="form-control input-lg" id="valor_abonar" name="valor_abonar" step="0.01" min="0" max="<?php echo $saldo ?>" required>
                            </div>

                            <!--
                            <div class="form-group col-md-12">
                                <div align="left"> Método de pago </div>

                                <select id="pago" name="pago" class="form-control input-lg select" style="width: 100%;">
                                    <option value="Efectivo">Efectivo</option>
                                    <option value="Cheque">Cheque</option>
                                    <option value="Dep&oacutesito">Depósito</option>
                                    <option value="Tarjeta de cr&eacute;dito">Tarjeta de crédito</option>
                                    <option value="Transferencia">Transferencia</option>
                                    <option value="Otro">Otro</option>

                                </select>

                            </div>
                            -->

                            <div class="form-group col-md-12">
                                <div align="left"><label>Método de Pago</label></div>
                                <select id="metodo_pago" name="metodo_pago" class="form-control input-lg select" style="width: 100%;" required>
                                    <option value="">Seleccione...</option>
                                    <?php
                                    //aqui se admite el numero de pago con id = 5 para el apartado de puntos
                                    $QueryMedioPago = mysqli_query($conn3, "SELECT * FROM Medios_Pago WHERE  Activo = '1'");
                                    while ($RowMedioPago = mysqli_fetch_array($QueryMedioPago)) {

                                        $MedioPago_id = $RowMedioPago['id'];
                                        $Nombre_MedioPago = $RowMedioPago['Nombre'];

                                        echo "<option value='$MedioPago_id'>$Nombre_MedioPago</option>";

                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group col-md-12">
                                <div align="left"> Notas </div>


                                <textarea id="nota" name="nota" class="textarea" placeholder="Notas " style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            </div>


                            <input type="hidden" name="ID" value="<?php echo $_SESSION['ID'] ?>">
                            <input type="hidden" name="clienteId" value="0">
                            <input type="hidden" name="ID_Empresa" value="<?php echo $ID_Empresa ?>">
                            <input type="hidden" name="idOperacion" value="<?php echo $idOperacion ?>">
                            <center><button type="submit" class="btn btn-block btn-outline-info rounded-pill shadow m-1">
                                    <h2> <strong> Abonar </strong> </h2>
                                </button></center>
                        </div>
                    </form>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include 'footer.php';
?>



<?php
$QueryContabilidad = mysqli_query($conn3, "SELECT * FROM  Config_Contabilidad WHERE Activo = 1");
$NrowContabilidad = mysqli_num_rows($QueryContabilidad);
//if ($NrowContabilidad > 0 && $idCliente == '115') {
if ($NrowContabilidad > 0) {

    $IdOperacion_CuentaContablePrefeterminada = $idCuentaContableCXP;
    include 'Include_CXPContabilidad.php';
?>
<script>
    document.getElementById('FormularioCuentaporPagar').addEventListener('submit', function(event) {
        event.preventDefault(); 
    ModalModuloContabilidadCXP();
    });
</script>
<?php
} else {
    //echo "document.getElementById('totalizarFactura').submit();";
}
?>

