<?php
include '../header.php';
include '../menu.php';

////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$queryList = mysqli_query($conn3, "SELECT max(id) as ultimo FROM CCompDiario where tipo_comprobante = 0");
while ($row_recordset32 = mysqli_fetch_array($queryList)) {
    $ultimo = $row_recordset32['ultimo'];
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$queryList = mysqli_query($conn3, "SELECT numero FROM CCompDiario where id = $ultimo");
while ($row_recordset32 = mysqli_fetch_array($queryList)) {
    $ComprobanteNumero = $row_recordset32['numero'];
}
$Comprobante_array = explode("-", $ComprobanteNumero);
$valornumerico = (int)$Comprobante_array[1];
$actual = $valornumerico + 1;
////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$indicativo = 'CD-';
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
                                    <h4>Comprobantes</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="./cuentasContables/totalizarComprobante.php" method="POST" enctype="multipart">

                                    <div class="row">
                                        <div class="col-md-8 row">

                                            <div class="col-md-6 ">
                                                <label>Número<strong class="text-danger">*</strong></label><br>
                                                <input type="text" required disabled class="form-control input-lg" value="<?php echo $indicativo;
                                                                                                                            printf('%06d', $actual) ?>" onkeyup="filtro()">
                                                <input type="hidden" required name="numero" id="numero" class="form-control input-lg" value="<?php echo $indicativo;
                                                                                                                                                printf('%06d', $actual) ?>" onkeyup="filtro()">
                                            </div>
                                            <div class="col-md-6 ">
                                                <label>Fecha <strong class="text-danger">*</strong></label><br>
                                                <input type="date" required name="fecha" id="fecha" class="form-control input-lg" value="<?php echo date("Y-m-d") ?>" onkeyup="filtro()">
                                            </div>
                                            <div class="col-md-6 ">
                                                <hr>
                                                <label>Descripción <strong class="text-danger">*</strong></label><br>
                                                <input type="text" required name="descripcion" id="descripcion" class="form-control input-lg" onkeyup="VerificarCaracteres(this);filtro()">
                                            </div>

                                            <div class="col-md-6">
                                                <hr>
                                                <?php echo verCentroCosto() ?>
                                            </div>

                                            <div class="col-md-6 ">
                                                <hr>
                                                <label>Tipo Tercero <strong class="text-danger">*</strong></label><br>
                                                <select id="TipoTercero" name="TipoTercero" class="form-control" style="width: 100%;" onChange="TipoTerceroBusqueda()" required>
                                                    <option value="" selected>Seleccione</option>
                                                    <option value="1">Clientes</option>
                                                    <option value="2">Proveedores</option>
                                                </select>

                                            </div>
                                            <div class="col-md-6 ">
                                                <hr>
                                                <label>Tercero <strong class="text-danger">*</strong></label><br>
                                                <select name="Tercero" id="Tercero" class="form-control" style="width: 100%;" required>
                                                    <!-- se llena por ajax -->
                                                </select>
                                            </div>

                                        </div>
                                        <div class="col-md-4 bg-light">
                                            <div id="div-results-detalle"></div>
                                        </div>

                                        <div class="col-md-12">
                                            <hr>
                                            <h3>Movimientos</h3>
                                        </div>
                                        <div class="col-md-12">
                                            <table class="table table-bordered table-striped" id="exaple1" style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th>Cuenta</th>
                                                        <th>Descripción Movimiento</th>
                                                        <th>Referencia</th>
                                                        <th>Debe</th>
                                                        <th>Haber</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <select class="input-lg form-control select2" name="cuenta" id="cuenta">
                                                                <option disabled selected>Seleccione una cuenta</option>
                                                                <?php
                                                                $queryList = mysqli_query($conn3, "SELECT * FROM CCuentas  order by id ASC");
                                                                $nrowl = mysqli_num_rows($queryList);
                                                                while ($row_recordset32 = mysqli_fetch_array($queryList)) {
                                                                    $idC = $row_recordset32['id'];
                                                                    $descripcionC = utf8_encode($row_recordset32['descripcion']);
                                                                    $detalleC = $row_recordset32['detalle'];
                                                                    echo "<option value='$idC'>$idC | $descripcionC  </option>";
                                                                }
                                                                ?>
                                                            </select>
                                                        </td>
                                                        <td><input type="text" class="input-lg form-control" name="descripcionM" id="descripcionM" onchange="VerificarCaracteres(this);validarEnvio();"></td>
                                                        <td><input type="text" class="input-lg form-control" name="referencia" id="referencia" onchange="VerificarCaracteres(this);validarEnvio();"></td>
                                                        <td><input type="text" onkeyup="<?php echo $soloNumero; ?>" class="input-lg form-control" name="debe" id="debe" onchange="validarEnvio()"></td>
                                                        <td><input type="text" onkeyup="<?php echo $soloNumero; ?>" class="input-lg form-control" name="haber" id="haber" onchange="validarEnvio()"></td>
                                                        <td><a class="btn btn-primary" style="display:none;" id="procesarMovimiento" onclick="procesarMovimiento()">
                                                                <li class="fa fa-check"></li>
                                                            </a></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div id="div-result-procesarMovimiento"></div>
                                            <div id="div-results-tabla"></div>
                                            <!-- <a class="btn btn-success btn-clock text-white" data-toggle="modal" data-target="#modalTotalizar"><li class="fa fa-check"></li>Totalizar!</a> -->

                                            <input type="hidden" name="usuario_id" value="<?php echo $_SESSION["ID"]; ?>">

                                            <button type="submit" class="btn btn-primary" id="totalizar" style="display:none;">
                                                <li class="fa fa-check"></li>Totalizar
                                            </button>

                                        </div>

                                    </div>


                                </form>

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

<?php
include '../footer.php';
?>


<script type="text/javascript">
    function blanquear() {
        // detalle del movimiento en el nuevo asiento contable
        // document.getElementById("cuenta").value='';
        //$("#cuenta").val($("#cuenta option:eq(1)").val());

        document.getElementById("descripcionM").value = '';
        document.getElementById("referencia").value = '';
        document.getElementById("debe").value = '';
        document.getElementById("haber").value = '';

        document.getElementById("procesarMovimiento").style.display = 'none';
    }


    function filtro() {
        var numero = $("#numero").val();
        var fecha = $("#fecha").val();
        var descripcion = $("#descripcion").val();

        $.ajax({
            type: "POST",
            url: "./cuentasContables/ajax_infoComprobantes.php",
            data: {
                numero: numero
            },
            success: function(response) {
                $('#div-results-tabla').html(response);
                valoresFinales();
            }
        });
        $.ajax({
            type: "POST",
            url: "./cuentasContables/ajax_detalleComprobantes.php",
            data: {
                numero: numero
            },
            success: function(response) {
                $('#div-results-detalle').html(response);
                valoresFinales();
            }
        });
    };

    function validarEnvio() {
        // valores del nuevo registro en movimientos
        var cuenta = $("#cuenta").val();
        var descripcionM = $("#descripcionM").val();
        var referencia = $("#referencia").val();
        var debe = $("#debe").val();
        var haber = $("#haber").val();

        if (cuenta.length > 0 & descripcionM.length > 0 & referencia.length > 0 & (debe.length > 0 || haber.length > 0)) {
            document.getElementById('procesarMovimiento').style.display = "block";
        } else {
            document.getElementById('procesarMovimiento').style.display = "none";
        }
    }

    function procesarMovimiento() {
        // datos del nuevo asiento contable
        var numero = $("#numero").val();
        var fecha = $("#fecha").val();
        var descripcion = $("#descripcion").val();

        // detalle del movimiento en el nuevo asiento contable
        var cuenta = $("#cuenta").val();
        var descripcionM = $("#descripcionM").val();
        var referencia = $("#referencia").val();
        var debe = $("#debe").val();
        var haber = $("#haber").val();

        $.ajax({
            type: "POST",
            url: "./cuentasContables/ajax_procesarMovimiento.php",
            data: {
                numero: numero,
                fecha: fecha,
                descripcionM: descripcionM,
                cuenta: cuenta,
                descripcion: descripcion,
                referencia: referencia,
                debe: debe,
                haber: haber
            },
            success: function(response) {
                $('#div-result-procesarMovimiento').html(response);
                filtro();
                blanquear();
                valoresFinales();

            }
        });
    }

    function removerMovimiento($idT) {
        // datos del nuevo asiento contable
        var idT = $idT;
        $.ajax({
            type: "POST",
            url: "./cuentasContables/ajax_procesarMovimiento.php",
            data: {
                idT: idT
            },
            success: function(response) {
                filtro();
                blanquear();
                valoresFinales();
            }
        });
    }

    function valoresFinales() {
        // valores de operación
        var sum_debe = $('#sum_debe').val();
        var sum_haber = $('#sum_haber').val();
        var saldo = $('#saldo').val();
        document.getElementById('debeModal').value = sum_debe;
        document.getElementById('haberModal').value = sum_haber;
        document.getElementById('saldoModal').value = saldo;

        // valores del comprobante
        var numero = $("#numero").val();
        var fecha = $("#fecha").val();
        var descripcion = $("#descripcion").val();
        document.getElementById('numeroModal').value = numero;
        document.getElementById('fechaModal').value = fecha;
        document.getElementById('descripcionModal').value = descripcion;
    }
</script>
<script>
    function VerificarCaracteres(input) {

        input.value = input.value.replace(/'/g, "");
        input.value = input.value.replace(/"/g, "");

    }

    function TipoTerceroBusqueda() {
        var valor = $("#TipoTercero").val();
        $.ajax({
            type: "POST",
            url: "./cuentasContables/RP_Ajax.php",
            data: {
                Valor: valor,
                TipoEspecial: "Búsqueda Tipo Tercero"
            },
            success: function(response) {
                $('#Tercero').html(response);
                $('#Tercero').select2();
            }
        });
    }
</script>

<script>
    $(document).ready(function() {
        setTimeout(() => {
            filtro();
        }, 100);
    });
</script>