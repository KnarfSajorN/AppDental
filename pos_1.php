<?php
include 'header.php';
include 'menu.php';


$queryList = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = '{$_SESSION['ID']}'");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $moneda = $rowMotorizado['moneda'];
    $impuestoF = $rowMotorizado['impuestoF'];
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header bg-info">
                    <h3 class="card-title">
                        Caja POS - <?= $_SESSION['NOMBRE_USUARIO'] ?>
                    </h3>
                    <div class="card-tools">
                        <ul class="nav nav-pills ml-auto">
                            <li class="nav-item">
                                <a style="border-top-left-radius:50rem; border-bottom-left-radius:50rem;" class="btn btn-lg btn-light active" href="#sales" data-toggle="tab">
                                    Facturar
                                    <i class="fas fa-dollar-sign ml-1"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a style="border-top-right-radius:50rem; border-bottom-right-radius:50rem;" class="btn btn-lg btn-light" href="#clients" data-toggle="tab">
                                    <i class="fas fa-users mr-1"></i>
                                    Clientes
                                </a>
                            </li>
                        </ul>
                    </div>

                </div>
                <div class="card-body">
                    <div class="tab-content">

                        <div class="active tab-pane" id="sales">
                            <div class="row">
                                <div class="col-md-6 p-4">

                                    <form action="agregarDetalle_pos.php" method="POST">
                                        <div class="form-row bg-light rounded p-2">


                                            <div class="form-group col-md-12">
                                                <div align="left">
                                                    <label>Producto o Servicio</label>
                                                </div>

                                                <input type="hidden" class="form-control input-lg" id="usuario_id" name="usuario_id" placeholder="ususario_id" value="<?php echo  $ususario_id ?>" required>
                                                <select id="codigoProd" name="codigoProd" class="form-control select2" style="width: 100%;" required="required" onChange="cargarcosto();">
                                                    <option value="" selected="selected">Seleccione producto</option>
                                                    <?php

                                                    $queryList = mysqli_query($conn3, "SELECT * FROM sinvetrios order by descripcion");
                                                    $nrowl = mysqli_num_rows($queryList);
                                                    while ($row_recordset32 = mysqli_fetch_array($queryList)) {
                                                        $descripcion     = $row_recordset32['descripcion'];
                                                        $existencia      = $row_recordset32['existencia'];
                                                        $cliente_id      = $row_recordset32['cliente_id'];
                                                        $referencia      = $row_recordset32['referencia'];
                                                        $ID              = $row_recordset32['ID'];

                                                        echo "<option value='$ID'>$referencia || $descripcion || $existencia</option>";
                                                    }

                                                    ?>

                                                </select>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label>Precio</label>
                                                <div id="div-results-costo"></div>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label>Cantidad</label>
                                                <input type="number" class="form-control input-lg" id="1" name="cantidad" placeholder="cantidad" onChange="multiplicar();" required>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label>Descuento</label>
                                                <input type="text" class="form-control input-lg" id="descuento" value="0" name="descuento" placeholder="descuento" pattern="[0-9.%]+" step="any" oninput="ValidarInput(this)" required>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label>Subtotal</label>
                                                <input type="number" class="form-control input-lg blur" id="3" name="subTotal" placeholder="subTotal" min="0" step="0.01" data-readonly_P required>
                                            </div>




                                            <div class="form-group col-md-12" align="center">
                                                <br>
                                                <button type="submit" class="btn btn-lg btn-block btn-outline-info rounded-pill" name="GuardarDetalleOrden">
                                                    <i class="fa fa-plus"></i>
                                                    Agregar
                                                </button>
                                            </div>




                                            <div class="form-group col-md-12" align="center">
                                                <label style="color:#3a8bb9;">[si desea el descuento en % deberá colocar al final del numero el símbolo %, si es valor numérico solo colocar números]</label>
                                            </div>


                                            <input type="hidden" name="usuario_id" value="<?php echo $_SESSION['ID'] ?>">
                                            <input type="hidden" name="cliente_id" value="0">
                                            <input type="hidden" name="historia" value="">
                                            <input type="hidden" name="tipo_historia" value="">

                                        </div>


                                    </form>
                                </div>
                                <div class="col-md-6 p-4">
                                    <?php
                                    $proximaFactura = funcionMaster($_SESSION['ID'], 'ID', 'numeroFactura', 'usuarios') + 1;
                                    ?>
                                    <h4 class="center text-center text-success">Próxima Factura <?= $proximaFactura ?></h4>
                                    <div class="table-responsive my-4">
                                        <table class="table table-bordered rounded" id="table-factura">
                                            <?php
                                            $theads = [
                                                '#',
                                                'Desc.',
                                                'Precio',
                                                'Cant.',
                                                'Desc.',
                                                'Total',
                                                ''
                                            ];
                                            ?>
                                            <thead>
                                                <tr>
                                                    <?php
                                                    foreach ($theads as $th) {
                                                        echo "<th>{$th}</th>";
                                                    }
                                                    ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                $ID = $_SESSION['ID'];

                                                $resultado = mysqli_query($conn3, "SELECT * FROM  sDetalleOperPendites where estado = 1 and  id_usuario =$ID and  id_cliente = 0 order by id");
                                                //$resultado=mysql_query("select * from patients where ID_Doctor = '$ID_DOSTOR'");
                                                $check = mysqli_num_rows($q);

                                                while ($fila = mysqli_fetch_array($resultado)) {
                                                    //  '.$fila[2].'                    <a href="" >  <i class="fa fa-pencil-square-o"></i>   </a>  
                                                    $Numero++;
                                                    $ruta = htmlentities($_SERVER['PHP_SELF']);

                                                    $totalbase = $fila['totalbase'];
                                                    $subTotal = $fila['subTotal'];

                                                    $descuentoValor = $totalbase - $subTotal;

                                                    echo '     <tr>
<td  width="5%">' . $Numero . ' </td>
<td width="20%">' . $fila[5] . ' </td>
<td width="15%"><div align="Right">' . number_format($fila[6], 2) . '' . $moneda . '</div></td>
<td width="5%"><div align="Right">' . $fila[4] . '</div></td>
<td width="15%"><div align="center">' . number_format($descuentoValor, 2) . '' . $moneda . '</div></td>
<td width="15%"><div align="Right">' . number_format($fila[9], 2) . '' . $moneda . '</div></td>';

                                                    echo "<td width='1%'><a href=agregarDetalle_pos.php?clienteId={$clienteId}&tipo_historia{$tipo_historia}=&historiaClinica1={$historiaClinica1}&borrar={$fila['id']}><i class='fa fa-trash' style='color:red'></i> </a></td>";

                                                    echo '</tr>';

                                                    $totalCant += $fila[4];
                                                    $totalBase +=  $fila[6];
                                                    $total += $fila[9];

                                                    $totaldesc += $descuentoValor;

                                                    $totalFinal = $total;
                                                }


                                                ?>
                                            </tbody>
                                            <thead>
                                                <tr>

                                                    <th> </th>
                                                    <th> <strong>
                                                            <div align="Right"> Totales </div>
                                                        </strong>
                                                    </th>
                                                    <th>
                                                        <div align="Right"><?php echo number_format($totalBase, 2) . ' ' . $moneda; ?> </div>
                                                    </th>
                                                    <th>
                                                        <div align="Right"><?php echo $totalCant ?></div>
                                                    </th>

                                                    <th>
                                                        <div align="center"><?php echo number_format($totaldesc, 2) . ' ' . $moneda; ?> </div>
                                                    </th>
                                                    <th>
                                                        <div align="Right"><?php echo number_format($total, 2) . ' ' . $moneda; ?> </div>
                                                    </th>
                                                    <th> </th>

                                                </tr>

                                                <?php
                                                if ($impuestoF > 0) {
                                                    $impuestoF2 = $impuestoF / 100;
                                                    $total1 =  $total * $impuestoF2;
                                                    $total =  $total1 + $total;


                                                ?>

                                                    <tr>
                                                        <th> </th>
                                                        <th> <strong>
                                                                <div align="Right"> Total con impuesto <?php echo $impuestoF ?>% </div>
                                                            </strong> </th>
                                                        <th>
                                                            <div align="Right"> </div>
                                                        </th>
                                                        <th>
                                                            <div align="Right"> </div>
                                                        </th>
                                                        <th>
                                                            <div align="Right"> </div>
                                                        </th>
                                                        <th>
                                                            <div align="Right"><?php echo number_format($total) . ' ' . $moneda; ?> </div>
                                                        </th>
                                                        <th> </th>

                                                    </tr>

                                                <?php
                                                } ?>


                                            </thead>
                                        </table>
                                    </div>


                                    <div class="card collapsed-card">
                                        <div class="card-header bg-info rounded" data-card-widget="collapse">
                                            <h3 class="card-title">Cliente</h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-lg btn-tool" data-card-widget="collapse">
                                                    <i class="fas fa-plus text-white"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body" style="display: none;">
                                            <div class="form-group">
                                                <select id="id_cliente" name="id_cliente" class="form-control select2" style="width: 100%;" required="required" onchange="idCliente(this.value);">
                                                    <?php
                                                    echo "<option value='-1'>Contado</option>";
                                                    $queryList = mysqli_query($conn3, "SELECT * FROM cliente ");
                                                    $nrowl = mysqli_num_rows($queryList);
                                                    while ($row_recordset32 = mysqli_fetch_array($queryList)) {
                                                        $cliente_id     = $row_recordset32['cliente_id'];
                                                        $nombre_cliente      = $row_recordset32['nombre_cliente'];
                                                        $CODI_CLIENTE      = $row_recordset32['CODI_CLIENTE'];
                                                        $whatsapp      = $row_recordset32['whatsapp'];
                                                        echo "<option value='$cliente_id'>Nombre: " . $nombre_cliente . " || Documento: " . $CODI_CLIENTE . " || Teléfono: " . $whatsapp . "</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card collapsed-card">
                                        <div class="card-header bg-info rounded" data-card-widget="collapse">
                                            <h3 class="card-title">Notas</h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-lg btn-tool" data-card-widget="collapse">
                                                    <i class="fas fa-plus text-white"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body" style="display: none;">
                                            <div class="form-group">
                                                <textarea name="nota" id="nota" rows="3" class="form-control" onchange="idNota(this.value);"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card collapsed-card">
                                        <?php
                                        $ID = $_SESSION['ID'];
                                        //tipo 1 -> facturas
                                        $resultado = mysqli_query($conn3, "SELECT * FROM sDetalleMetodosPagos WHERE id_usuario = $ID AND idOperacion = 0 AND tipo = '1' ");
                                        $MontoPagadoDetalle = 0;
                                        while ($fila = mysqli_fetch_array($resultado)) {
                                            $MontoPagadoDetalle = $MontoPagadoDetalle + $fila['nota_pago'];
                                        }

                                        $MontoDebe = round($total - $MontoPagadoDetalle, 2);
                                        // echo "El total es: " . $totalMet;
                                        ?>
                                        <div class="card-header bg-info rounded" data-card-widget="collapse">
                                            <h3 class="card-title">Métodos de pago</h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-lg btn-tool" data-card-widget="collapse">
                                                    <i class="fas fa-plus text-white"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body" style="display: none;">
                                            <div class="form-group">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>
                                                                <div>Método de Pago</div>
                                                            </th>
                                                            <th>
                                                                <div align="Right">Monto</div>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $ID = $_SESSION['ID'];
                                                        //tipo 1 -> facturas
                                                        $resultado = mysqli_query($conn3, "SELECT * FROM sDetalleMetodosPagos WHERE id_usuario = $ID  AND idOperacion = 0 AND tipo = '1'");
                                                        $check = mysqli_num_rows($resultado);
                                                        $totalMet = 0;

                                                        while ($fila = mysqli_fetch_array($resultado)) {
                                                            $Numero++;
                                                            $ruta = htmlentities($_SERVER['PHP_SELF']);

                                                            echo '<tr>
                            <td>' . $Numero . '</td>
                            <td>' . $fila[5] . '</td>
                            <td><div align="Right">' . number_format($fila[6], 2)  . '' . $moneda . '</div></td>
                        </tr>';

                                                            $totalMet += $fila['nota_pago'];
                                                        }


                                                        // echo "El total es: " . $totalMet;
                                                        ?>
                                                    </tbody>
                                                    <thead>
                                                        <tr>
                                                            <th></th>
                                                            <th> <strong>
                                                                    <div align="Right"> Total </div>
                                                                </strong>
                                                            </th>
                                                            <th>
                                                                <div align="Right"><?php echo number_format($totalMet, 2) . ' ' . $moneda; ?> </div>
                                                            </th>



                                                        </tr>
                                                        <tr>
                                                            <th></th>
                                                            <th> <strong>
                                                                    <div align="Right">
                                                                        <h3> Cambio</h3>
                                                                    </div>
                                                                </strong>
                                                            </th>
                                                            <th>
                                                                <div align="Right">
                                                                    <h3><?php echo  number_format(round($totalMet - $total, 2), 2)    ?></h3>
                                                                </div>
                                                            </th>



                                                        </tr>
                                                    </thead>

                                                </table>
                                            </div>
                                            <div class="form-group">
                                                <form action="guardarDetalleMetodo.php" method="POST" name="formularioActualizarcliente" style="width:100%">


                                                    <input type="hidden" class="form-control input-lg" id="id_usuario" name="id_usuario" placeholder="id_usuario" value="<?php echo  $id_usuario ?>">
                                                    <select id="metodo_pago" name="metodo_pago" class="form-control input-lg select" style="width: 100%;" required>
                                                        <option value="">Seleccione...</option>
                                                        <option value="Efectivo">Efectivo</option>
                                                        <option value="Crédito">Crédito</option>
                                                        <option value="Cheque">Cheque</option>
                                                        <option value="Transferencia Bancaria">Transferencia Bancaria</option>
                                                    </select>

                                                    <label>Monto</label>
                                                    <input type="number" id="nota_pago" name="nota_pago" placeholder="Monto" class="form-control input-lg" step="0.01" max="<?= round($MontoDebe, 2); ?>"><br>
                                                    <button type="submit" class="btn btn-lg btn-block btn-outline-primary rounded-pill">
                                                        <i class="fas fa-coins mr-1"></i>
                                                        Pagar
                                                    </button>

                                                    <input type="hidden" name="id_usuario" value="<?php echo $_SESSION['ID'] ?>">
                                                    <input type="hidden" name="id_cliente" value="">
                                                    <input type="hidden" name="id_historia" value="">
                                                    <input type="hidden" name="tipo_historia" value="">


                                                    <input type="hidden" name="tipo_cliente" valur="1">
                                                    <input type="hidden" name="tipo" value="1">

                                                </form>
                                            </div>


                                        </div>
                                    </div>

                                    <form action="totalizarFacturaPOS.php" method="POST">

                                        <label> Monto Pendiente </label>

                                        <?php

                                        $pendiente = round($total - $totalMet, 2);
                                        if ($pendiente < 0) {
                                            $pendiente = 0;
                                        }
                                        ?>

                                        <input type="number" name="montoPendiente" placeholder="Monto Pagado" class="form-control input-lg" step="0.01" value="<?= $pendiente; ?>" readonly> <br>

                                        <label> Fecha de vencimiento</label>
                                        <input type="date" name="fechaVencimiento" placeholder="fecha Vencimiento" class="form-control input-lg" value="<?= date('Y-m-d'); ?>" required>
                                        <br>

                                        <button type="submit" class="btn btn-lg btn-block btn-outline-danger rounded-pill">
                                            <i class="fas fa-dollar-sign mr-1"></i>
                                            Totalizar Factura
                                        </button>






                                        <input type="hidden" name="id_usuario" value="<?php echo $_SESSION['ID'] ?>">
                                        <input type="hidden" name="historia" value="">
                                        <input type="hidden" name="tipo_historia" value="">
                                        <input type="hidden" name="tipo_cliente" valur="1">
                                        <input type="hidden" name="tipo" value="1">
                                        <input type="hidden" name="nota" value="">
                                        <input type="hidden" name="id_cliente" value="">

                                    </form>

                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="clients">
                            <form id="nuevoClienteForm" class="row">
                                <div class="form-group col-md-6">
                                    <label for="">Nombre Completo</label>
                                    <input type="text" name="datos[nombre_cliente]" class="form-control input-lg" required placeholder="Nombre Completo">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Documento</label>
                                    <input type="number" name="datos[CODI_CLIENTE]" class="form-control input-lg" required placeholder="Documento">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Teléfono</label>
                                    <input type="number" name="datos[whatsapp]" class="form-control input-lg" required placeholder="Teléfono">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Correo</label>
                                    <input type="mail" name="datos[correo_cliente]" class="form-control input-lg" required placeholder="Correo">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="">Dirección</label>
                                    <input type="text" name="datos[direccion_cliente]" class="form-control input-lg" required placeholder="Dirección">
                                </div>
                                <div class="form-group col-md-12 center text-center">
                                    <button class="btn btn-lg btn-outline-info rounded-pill btn-lg" type="submit" onclick="$('#nuevoClienteForm').automaticForm({type:1,idUpdate:0,table:'cliente',db:'medicaso_ps_bo1080',reload:'',page:'pos'})">
                                        <i class="fas fa-plus mr-1"></i>
                                        Guardar Cliente
                                    </button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
                <div class="card-footer">

                </div>
            </div>
        </div>

        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include 'footer.php';

?>

<script>
    function cargarcosto() {
        var codigoProd = $("#codigoProd").val();
        var usuario_id = $("#usuario_id").val();

        $.ajax({
            type: "POST",
            url: "Ajax_PrecioProductoFactura.php",
            data: {
                codigoProd: codigoProd,
                usuario_id: usuario_id
            },
            success: function(response) {
                $('#div-results-costo').html(response);
            }
        });
    };
</script>

<script>
    function multiplicar() {

        var descuentos = $("#descuento").val();

        m1 = document.getElementById("1").value;
        m2 = document.getElementById("2").value;
        r = m1 * m2;

        //console.log(descuentos);

        descuentos_final = 0;
        if (descuentos != null) {
            var existe = 0;
            var valor = descuentos.match(/%/g);
            if (valor) {
                existe = valor.length;
            }
            //console.log("existe "+existe+" estado "+valor);

            if (existe > 0) {
                descuentos = descuentos.replace('%', ' ');

                descuentos = parseFloat(descuentos);

                descuentos = (descuentos / 100);
                descuentos_final = r * descuentos;

            } else {
                descuentos_final = descuentos;
            }
        }


        r = (r - descuentos_final).toFixed(2);
        //console.log(r);

        document.getElementById("3").value = r;
    }
</script>

<script>
    function ValidarInput(campo) {
        if (!campo.checkValidity()) {
            campo.value = campo.value.slice(0, -1);
        }
        var existe = 0;
        var valor = campo.value.match(/\x2E/g);
        if (valor) {
            existe = valor.length;
        }

        var existe1 = 0;
        var valor = campo.value.match(/%/g);
        if (valor) {
            existe1 = valor.length;
        }

        if (existe > 1 || existe1.length > 1) {
            campo.value = campo.value.slice(0, -1);
        }

        if (campo.value.charAt(campo.value.length - 2) == '%') {
            campo.value = campo.value.slice(0, -1);
        }
        //console.log(existe+" "+existe1);
        //console.log(campo.value);

        multiplicar();
    }
</script>

<script>
    function idCliente(val) {
        document.querySelectorAll('[name="id_cliente"]').forEach(element => {
            element.value = val;
        })
        window.location.href = "pos?cI=<?= salt() ?>" + btoa(val);
    }
    $(document).ready(function() {
        let idCliente = '<?= decrypt($_GET['cI']) ?>';
        if (idCliente != null && idCliente != '') {
            document.querySelectorAll('[name="id_cliente"]').forEach(element => {
                element.value = idCliente;
            })
        }

    })
</script>
<script>
    function idNota(val) {
        document.querySelectorAll('[name="nota"]').forEach(element => {
            element.value = val;
        })
    }
    $(document).ready(function() {
        idNota(document.getElementById('nota').value);
    })
</script>