<?php
include 'header.php';
include 'menu.php';

$ID_Usuario  =  $_SESSION['ID'];
$ID_UsuarioP =  $_SESSION['ID_principal'];

$idOperacion = $_GET['idOperacion'];

$queryList = mysqli_query($conn3, "SELECT * FROM  sOperacionInv where  idOperacion = '$idOperacion' ");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $idOperacion = $rowMotorizado['idOperacion'];
    $numeroDoc = $rowMotorizado['numeroDoc'];
    $idCliente = $rowMotorizado['idCliente'];
    $idUsuario = $rowMotorizado['idEmpresa'];

    $totalNeto = $rowMotorizado['totalNeto'];
    $montoPagado = $rowMotorizado['montoPagado'];

    $idCuentaContableCXC = $rowMotorizado['idCuentaContableCXC']; //Contabilidaad iompiortante
    $saldo = ($rowMotorizado['totalNeto'] - $rowMotorizado['montoPagado']);

    $convenio_id = $rowMotorizado['convenio_id'];
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


$nombre_paciente = funcionMaster($idCliente, 'cliente_id', 'nombre_cliente', 'cliente');

$queryList = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = $idUsuario");
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $moneda = $rowMotorizado['moneda'];
}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Cliente: <?php echo $nombre_paciente ?></b>

        </h1>
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#">Pacientes</a></li>
        </ol>
    </section>



    <!-- Main content -->
    <section class="content">
        <div>
            <div class="col-xs-6 col-md-offset-3">


                <div class="box">
                    <form action="AbonoRegistrarC" method="POST" name="formularioActualizarcliente" id="FormularioCuentaporCobrar">
                        <div class="box-header" align="center">
                            <h2>Pago a Cuentas a Cobrar #<?php echo $numeroDoc ?></h2>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="form-group col-md-12">
                                <div align="left">
                                    <h3>Deuda <br>
                                        <?php echo number_format($saldo, 2) . " " . $moneda ?> </h3>
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
                            <div class="row">
                <?php
                $queryUser = "SELECT * FROM Medios_Pago WHERE (usuario_id = $ID_Usuario or usuario_id = $ID_UsuarioP ) AND Activo = '1' ";
                $QueryMedioPago = mysqli_query($conn3, $queryUser);
                $usersRow = null;
                while ($RowMedioPago = mysqli_fetch_assoc($QueryMedioPago)) {
                  $usersRow[] = $RowMedioPago;
                }
                ?>
                            <div class="form-group col-md-12">
                                <div align="left"><label>Método de Pago</label></div>
                                <select id="metodo_pago" name="metodo_pago" class="form-control input-lg select" style="width: 100%;" required>
                        <option value="">Seleccione...</option>
                        <?php
                        foreach ($usersRow as $user) {
                          echo '<option value="' . $user['id'] . '">' . $user['Nombre'] . '</option>';
                        }
                        ?>
                      </select>
                            </div>
                            
                            <script>
                        document.getElementById('metodo_pago').addEventListener('change', mostrarQr);

                        function mostrarQr() {
                          let selectValue = this.value;
                          console.log(`este es el  valor del select: ` + selectValue);
                          let medioPago = [];
                          medioPago = '<?= json_encode($usersRow); ?>';
                          let arreglo = JSON.parse(medioPago);
                          console.log(arreglo);

                          for (let index = 0; index < arreglo.length; index++) {
                            if (arreglo[index].id == selectValue) {
                              let imagenQr = arreglo[index].imagenQr;
                              if (imagenQr != '' && imagenQr != null) {
                                window.open('<?= $Base ?>uploads/'+arreglo[index].usuario_id+'/metodosdepagos/'+imagenQr, 'ventan1', 'width=300,height=300');
                              } else {
                                break;
                              } 
                            }
                          }
                        };
                      </script>


                            <div class="form-group col-md-12">
                                <div align="left"> Notas </div>


                                <textarea id="nota" name="nota" class="textarea" placeholder="Notas " style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            </div>


                            <input type="hidden" name="ID" value="<?php echo $_SESSION['ID'] ?>">
                            <input type="hidden" name="clienteId" value="<?php echo $idCliente ?>">
                            <input type="hidden" name="convenio_id" value="<?php echo $convenio_id ?>">
                            
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

    $IdOperacion_CuentaContablePrefeterminada = $idCuentaContableCXC;
    include 'Include_CXCContabilidad.php';
?>
<script>
    document.getElementById('FormularioCuentaporCobrar').addEventListener('submit', function(event) {
        event.preventDefault(); 
    ModalModuloContabilidadCXC();
    });
</script>
<?php
} else {
    //echo "document.getElementById('totalizarFactura').submit();";
}
?>
