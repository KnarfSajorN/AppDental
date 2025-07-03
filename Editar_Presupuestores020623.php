<?php
if ($_POST['key']) {
    include 'config.php';
    $conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));
    $idCliente = $_POST['idCliente'];
    $idOperacion = $_POST['idOperacion'];
    $idUsuario = $_POST['idUsuario'];
    if ($_POST['key'] == "cargarItems") {
        $queryResult = mysqli_query($conn3, "SELECT * FROM sDetalleOper where id_cliente = $idCliente and idOperacion = $idOperacion order by id") or die(var_dump(mysqli_error_list($conn3)));
        // $queryResult = mysqli_query($conn3, "SELECT * FROM sDetalleOper where id_usuario = $idUsuario and  id_cliente = $idCliente and idOperacion = $idOperacion order by id") or die(var_dump(mysqli_error_list($conn3)));
        $row = mysqli_num_rows($queryResult);
        $numero = 0;
        while ($resultArray = mysqli_fetch_array($queryResult)) {
            $newArray[$numero][0] = $numero + 1;
            $newArray[$numero][1] = base64_encode($resultArray['descripcion']);
            $newArray[$numero][2] = base64_encode(number_format($resultArray['cantidad'],2,'.',''));
            $newArray[$numero][3] = base64_encode(number_format($resultArray['base'],2,'.',''));
            $newArray[$numero][4] = base64_encode(number_format($resultArray['subTotal'],2,'.',''));
            $newArray[$numero][5] = base64_encode($resultArray['id']);
            $numero++;
        }
        $queryResultDescuento = mysqli_query($conn3, "SELECT * FROM sOperacionInv where idCliente = $idCliente and idOperacion = $idOperacion")->fetch_object();
        $newArray[count($newArray)][0] = $queryResultDescuento->descuentos;
    } else if ($_POST['key'] == "editarItem" || $_POST['key'] == "removeItem" || $_POST['key'] == "isertarItem" || $_POST['key'] == "editarDescuento") {
        $id = $_POST['id'];
        if ($_POST['key'] == "editarItem" || $_POST['key'] == "isertarItem" || $_POST['key'] == "editarDescuento") {
            if ($_POST['key'] == "editarDescuento") {
                $newDesc = ($_POST['newDesc'] == "" || $_POST['newDesc'] < 0 ? 0 : $_POST['newDesc']);
                $queryActualizarDescuento = mysqli_query($conn3, "UPDATE sOperacionInv SET descuentos = '$newDesc' where idEmpresa = $idUsuario and  idCliente = $idCliente and idOperacion = $idOperacion");
            } else {
                $cantidad = $_POST['cantidad'];
                $descripcion = $_POST['descripcion'];
                if (is_numeric($descripcion)) {
                    $queryList = mysqli_query($conn3, "SELECT * FROM sinvetrios WHERE ID = $descripcion");
                    $nrowl = mysqli_num_rows($queryList);
                    while ($row_recordset32 = mysqli_fetch_array($queryList)) {
                        $descripcion     = $row_recordset32['descripcion'];
                    }
                }
                $base = $_POST['base'];
                $subTotal = $_POST['subTotal'];
                if ($_POST['key'] == "isertarItem") {
                    $fechaRegistro = $_POST['fechaRegistro'];
                    $queryResultInsert = mysqli_query($conn3, "INSERT INTO sDetalleOper SET idOperacion = $idOperacion, fechaRegistro = '$fechaRegistro', idProducto = 0, cantidad = $cantidad, descripcion = '$descripcion', base = $base, impuesto = 0, totalbase = {$base}, subTotal = $subTotal, id_usuario = $idUsuario, id_cliente = $idCliente") or die(var_dump(mysqli_error_list($conn3)));
                } else {
                    $queryResultInsert = mysqli_query($conn3, "UPDATE sDetalleOper SET cantidad = $cantidad, descripcion = '$descripcion', totalbase = $base, base = $base, subTotal = $subTotal where id_usuario = $idUsuario AND id_cliente = $idCliente AND idOperacion = $idOperacion AND id = $id");
                }
            }
        } else if ($_POST['key'] == "removeItem") {
            $queryResultRemove = mysqli_query($conn3, "DELETE FROM sDetalleOper WHERE id_usuario = $idUsuario AND id_cliente = $idCliente AND idOperacion = $idOperacion AND id = $id");
        }
        if ($queryResultInsert || $queryResultRemove || $queryActualizarDescuento) {
            $queryResultActually = mysqli_query($conn3, "SELECT sum(cantidad) as catTotal, sum(subTotal) as precioTotal, sum(base) as totalBase FROM sDetalleOper where id_cliente = $idCliente and idOperacion = $idOperacion");
            // $queryResultActually = mysqli_query($conn3, "SELECT sum(cantidad) as catTotal, sum(base) as precioTotal, sum(subTotal) as totalBase FROM sDetalleOper where id_usuario = $idUsuario and  id_cliente = $idCliente and idOperacion = $idOperacion");
            $row = mysqli_num_rows($queryResultActually);
            while ($resultArray = mysqli_fetch_array($queryResultActually)) {
                $catTotal = $resultArray['catTotal'];
                $precioTotal = $resultArray['precioTotal'];
                $totalBase = $resultArray['totalBase'];
                $queryResultDescuento = mysqli_query($conn3, "SELECT * FROM sOperacionInv where idEmpresa = $idUsuario and idCliente = $idCliente and idOperacion = $idOperacion")->fetch_object();
                $totalBase = $totalBase - $queryResultDescuento->descuentos;
                $queryResultInsert = mysqli_query($conn3, "UPDATE sOperacionInv SET totalNeto = $precioTotal, totalBruto = $totalBase, cantidadProduc = $catTotal where idEmpresa = $idUsuario and  idCliente = $idCliente and idOperacion = $idOperacion")  or die(var_dump(mysqli_error_list($conn3)));
                $newArray = $queryResultInsert ? 1 : 0;
            }
        }
    } else if ($_POST['key'] == "cargarProducto") {
        $queryList = mysqli_query($conn3, "SELECT * FROM sinvetrios WHERE usuario_id = $idUsuario order by descripcion") or die(var_dump(mysqli_error_list($conn3)));
        $nrowl = mysqli_num_rows($queryList);
        while ($row_recordset32 = mysqli_fetch_array($queryList)) {
            $descripcion     = $row_recordset32['descripcion'];
            $existencia      = $row_recordset32['existencia'];
            $cliente_id      = $row_recordset32['cliente_id'];
            $referencia      = $row_recordset32['referencia'];
            $ID              = $row_recordset32['ID'];
            $newArray .= "<option value='$ID'" . ($_POST['nameCode'] == $descripcion ? 'selected' : '') . ">$referencia | $descripcion | $existencia</option>";
        }
    }
    header("Content-type: application/json; charset= utf-8");
    echo json_encode($newArray);
    exit();
}
include 'header.php';
include 'menu.php';

$idOperacion = $_GET['idOperacion'];
$conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));

// echo $idOperacion;



$queryList = mysqli_query($conn3, "SELECT * FROM  sOperacionInv where idOperacion = $idOperacion");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $idOperacion      = $rowMotorizado['idOperacion'];
    $numeroDoc      = $rowMotorizado['numeroDoc'];
    $idCliente      = $rowMotorizado['idCliente'];
    $idEmpresa      = $rowMotorizado['idEmpresa'];
    $fechaOperacion      = $rowMotorizado['fechaOperacion'];
    $fechaOperacion = list($y, $m, $d) = explode("-", $fechaOperacion);
    $fechaOperacion = $d . "-" . $m . "-" . $y;
    $fechaVencimiento = $rowMotorizado['fechaVencimiento'];
    $fechaVencimiento = list($y, $m, $d) = explode("-", $fechaVencimiento);
    $fechaVencimiento = $d . "-" . $m . "-" . $y;
    $subTotal      = $rowMotorizado['subTotal'];
    $impuesto      = $rowMotorizado['impuesto'];
    $totalNeto      = $rowMotorizado['totalNeto'];
    $totalBruto      = $rowMotorizado['totalBruto'];
    $cantidadProduc      = $rowMotorizado['cantidadProduc'];
    $descuentos      = $rowMotorizado['descuentos'];
    $montoPagado      = $rowMotorizado['montoPagado'];
    $nota      = $rowMotorizado['nota'];
}


$queryList = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = $idEmpresa");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $moneda = $rowMotorizado['moneda'];
    $impuestoF = $rowMotorizado['impuestoF'];

    // Nuevos campos

    $nombreF = $rowMotorizado['nombreF'];
    $telefonoF = $rowMotorizado['telefonoF'];
    $direccionF = $rowMotorizado['direccionF'];
    $emailF = $rowMotorizado['emailF'];
    $ciudadPaisF = $rowMotorizado['ciudadPaisF'];
    $licenciaF = $rowMotorizado['licenciaF'];
    $pieF = $rowMotorizado['pieF'];

    $LogoF               = $rowMotorizado['logoF'];

    if (strlen($LogoF) > 0) {
        $Logo = '<img src="' . $Base . '/logos/' . $LogoF . '" height="10%" width="10%">';
    }



    // Nuevos campos 
}



$queryList = mysqli_query($conn3, "SELECT * FROM  usuarios where ID = $idEmpresa");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {

    $empresaNombre      = $rowMotorizado['empresaNombre'];
    $pais               = $rowMotorizado['pais'];

    $ciudad             = $rowMotorizado['ciudad'];
    $direccion          = $rowMotorizado['direccion'];
    $telefono           = $rowMotorizado['telefono'];
    $NOMBRE_USUARIO           = $rowMotorizado['NOMBRE_USUARIO'];

    $nit                = $rowMotorizado['nit'];
}


$queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id = $idCliente");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {

    $nombre_cliente             = $rowMotorizado['nombre_cliente'];
    $ciudad_cliente             = $rowMotorizado['ciudad_cliente'];

    $correo_cliente             = $rowMotorizado['correo_cliente'];
    $direccion_cliente          = $rowMotorizado['direccion_cliente'];
    $telefono_cliente           = $rowMotorizado['telefono_cliente'];
}


$saldo = $totalBruto - $montoPagado;


if ($saldo == 0) {
    $pagado = '<div align="center"><img src="https://' . $Base . '/pagado.png" height="10%" width="30%"></div>';
}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Nota de Venta
            <small># 0000<?php echo $numeroDoc ?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li class="active"> Nota de Venta</li>
        </ol>
    </section>


    <!-- Main content -->
    <section class="invoice">
        <!-- title row -->
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header">
                    <?php echo $Logo ?> <span style="font-size: 25px;"><?php echo $NOMBRE_USUARIO ?></span>
                    <small class="pull-right">Fecha: <?php echo date("d-m-y") ?></small>
                </h2>
            </div>
            <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
                Empresa
                <address>


                    <strong style="font-size: 20px;"> <?php echo $NOMBRE_USUARIO ?></strong><br>
                    NIT <?php echo $nit ?><br>
                    <?php echo $direccionF ?> - <?php echo $ciudadPaisF ?><br>
                    Teléfono: <?php echo $telefonoF ?><br>
                    Email: <?php echo $emailF ?>
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                Cliente
                <address>
                    <strong><?php echo $nombre_cliente ?> </strong><br>
                    <?php echo $direccion_cliente ?><br>
                    <?php echo $ciudad_cliente ?><br>
                    Telefono: <?php echo $telefono_cliente ?><br>
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                <b>Nota de Venta # 0000<?php echo $numeroDoc ?></b><br>
                <br>

                <b>Fecha Nota de Venta: </b><?php echo $fechaOperacion ?><br>
                <b>Fecha Vencimiento: </b> <?php echo $fechaVencimiento ?><br>
                <?php echo $pagado ?>

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Table row -->
        <div class="row">
            <div class="col-xs-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Descripción</th>
                            <th>
                                <div align="Right">Cantidad</div>
                            </th>
                            <th>
                                <div align="Right">Precio</div>
                            </th>
                            <th>
                                <div align="Right">Subtotal </div>
                            </th>
                            <th>
                                <div align="center">Opciones</div>
                            </th>
                        </tr>
                    </thead>
                    <tbody id="impFactura">
                        <?php

                        $resultado = mysql_query("SELECT * FROM  sDetalleOper where id_usuario = $idEmpresa and  id_cliente = $idCliente and idOperacion = $idOperacion order by id");
                        //$resultado=mysql_query("select * from patients where ID_Doctor = '$ID_DOSTOR'");
                        $check = mysql_num_rows($q);

                        while ($fila = mysql_fetch_array($resultado, MYSQL_NUM)) {
                            //  '.$fila[2].'                    <a href="" >  <i class="fa fa-pencil-square-o"></i>   </a>  
                            //         $Numero++;

                            //         echo '     <tr>
                            //   <td  width="5%">' . $Numero . ' </td>
                            //   <td width="50%">' . $fila[5] . ' </td>
                            //   <td width="5%"><div align="Right">' . $fila[4] . '</div></td>
                            //   <td width="20%"><div align="Right">' . number_format($fila[6], 2) . '</div></td>
                            //   <td width="20%"><div align="Right">' . number_format($fila[9], 2) . '</div></td>

                            // </tr>';

                            $totalCant += $fila[4];
                            $totalBase +=  $fila[6];
                            $total += $fila[9];
                        }

                        ?>


                    </tbody>
                </table>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
            <!-- accepted payments column -->
            <div class="col-xs-6">
                <p class="lead">Comentarios:</p>


                <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                    <?php echo $nota; ?>
                </p>
            </div>
            <!-- /.col -->
            <div class="col-xs-6">


                <div class="table-responsive">
                    <table class="table">
                        <!-- <tr>
              <th style="width:50%">Subtotal:</th>
              <td> <?php echo number_format($total, 2) ?> </td>
            </tr> -->

                        <?php
                        if ($impuestoF > 0) {
                            $impuestoF2 = $impuestoF / 100;
                            $total1 =  $total * $impuestoF2;
                            $total =  $total1 + $total;


                        ?>

                            <tr>
                                <th style="width:50%">Impuesto:</th>
                                <td> <?php echo $total1 ?> </td>
                            </tr>

                        <?php
                        } ?>
                        <!--
          <tr>
            <th>Tax (9.3%)</th>
            <td>$10.34</td>
          </tr>
-->
                        <tr>
                            <th>Total:</th>
                            <td id="totalP"></td>
                            <!-- <?php echo number_format($montoPagado, 2) . " $" ?> -->
                        </tr>
                        <!-- <tr>
              <th>Saldo:</th>
              <td><?php echo number_format($saldo, 2) ?></td>
            </tr> -->
                        <tr id="descuento">

                        </tr>
                        <tr>
                            <th>Total Nota de Venta:</th>
                            <td id="totalNV"></td>
                            <!-- <?php echo number_format($totalBruto, 2) . " $" ?> -->
                        </tr>
                    </table>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <div class="col-xs-12" align="center">
            <?php echo $pieF ?>
        </div>


        <!-- /.row -->

        <!-- this row will not appear when printing -->
        <div class="row no-print">
            <div class="col-xs-12">
                <a href="imprimirFactura.php?idOperacion=<?php echo $idOperacion ?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Imprimir</a>

                <!--
      <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
      </button>
      <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
        <i class="fa fa-download"></i> Generate PDF
      </button>
-->

            </div>
        </div>
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
</div>

<script type="text/javascript">
    let cacheIndice = "";
    let cacheCargaProducto;

    function cargarCosto(indice) {
        var codigoProd = (indice != 0 ? $("#producto" + indice).val() : $("#codigoProd").val());

        $.ajax({
            type: "POST",
            url: "ajax_cargarPrecio.php",
            data: {
                codigoProd: codigoProd,
                usuario_id: <?= $idEmpresa ?>,
                key: "editFactura"
            },
            success: function(resp) {
                // console.log(resp);
                if (resp) {
                    if (indice != 0) {
                        $("#precio" + indice).val(parseInt(resp));
                        calcularSubTotal(indice);
                    } else {
                        $("#base").val(parseInt(resp));
                        calcularSubTotal();
                    }
                }
            }
        });
    };

    // Funcion que adapta number_format de PHP para javascript = formato de miles y decimales.
    function number_format(number, decimals, decPoint, thousandsSep) { // eslint-disable-line camelcase
        number = (number + '').replace(/[^0-9+\-Ee.]/g, '')
        const n = !isFinite(+number) ? 0 : +number
        const prec = !isFinite(+decimals) ? 0 : Math.abs(decimals)
        const sep = (typeof thousandsSep === 'undefined') ? ',' : thousandsSep
        const dec = (typeof decPoint === 'undefined') ? '.' : decPoint
        let s = ''
        const toFixedFix = function(n, prec) {
            if (('' + n).indexOf('e') === -1) {
                return +(Math.round(n + 'e+' + prec) + 'e-' + prec)
            } else {
                const arr = ('' + n).split('e')
                let sig = ''
                if (+arr[1] + prec > 0) {
                    sig = '+'
                }
                return (+(Math.round(+arr[0] + 'e' + sig + (+arr[1] + prec)) + 'e-' + prec)).toFixed(prec)
            }
        }
        // @todo: for IE parseFloat(0.55).toFixed(0) = 0;
        s = (prec ? toFixedFix(n, prec).toString() : '' + Math.round(n)).split('.')
        if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep)
        }
        if ((s[1] || '').length < prec) {
            s[1] = s[1] || ''
            s[1] += new Array(prec - s[1].length + 1).join('0')
        }
        return s.join(dec)
    }

    function cargarProductos(indice) {
        if (indice != cacheCargaProducto) {
            let date;
            if (indice != 0) {
                date = {
                    idUsuario: <?= $idEmpresa ?>,
                    nameCode: $("#nameCod" + indice).val(),
                    key: "cargarProducto"
                };
            } else {
                date = {
                    idUsuario: <?= $idEmpresa ?>,
                    key: "cargarProducto"
                };
            }
            // console.log(date);
            cacheCargaProducto = indice;
            // console.log(cacheCargaProducto);
            $.ajax({
                url: "Editar_Presupuesto.php",
                data: date,
                method: "POST",
                dataType: "JSON",
                success: function(resp) {
                    // console.log(resp);
                    if (resp) {
                        if (indice != 0) {
                            // console.log("entre1");
                            $("#producto" + indice).html(resp);
                        } else {
                            // console.log("entre2");
                            $("#codigoProd").html(resp);
                        }
                    }
                },
            });
        }
    }

    function calcularSubTotal(indice) {
        if (!indice) {
            $("#subtotal").val(number_format(($("#cantidad").val() * $("#base").val()), 2, '.', ''));
        } else {
            $("#subtotal" + indice).val(number_format(($("#cantidad" + indice).val() * $("#precio" + indice).val()), 2, '.', ''));
        }
    }

    function operacionRemovEditInsert(indice, id, modo) {
        let date = "";
        if (modo == 0) { // editar
            date = {
                idCliente: <?= $idCliente ?>,
                idOperacion: <?= $idOperacion ?>,
                idUsuario: <?= $idEmpresa ?>,
                id: id,
                descripcion: $("#producto" + indice).val(),
                cantidad: $("#cantidad" + indice).val(),
                base: $("#precio" + indice).val(),
                subTotal: $("#subtotal" + indice).val(),
                key: "editarItem"
            };
        } else if (modo == 1) { // remover
            date = {
                idCliente: <?= $idCliente ?>,
                idOperacion: <?= $idOperacion ?>,
                idUsuario: <?= $idEmpresa ?>,
                id: id,
                key: "removeItem"
            };
        } else if (modo == 2) { // insertar
            let fecha = new Date();
            let year = fecha.toLocaleDateString().split("/");
            fecha = year[2] + "-" + year[1] + "-" + year[0] + " " + fecha.toLocaleTimeString();
            date = {
                idCliente: <?= $idCliente ?>,
                idOperacion: <?= $idOperacion ?>,
                idUsuario: <?= $idEmpresa ?>,
                descripcion: $("#codigoProd").val(),
                cantidad: $("#cantidad").val(),
                base: $("#base").val(),
                subTotal: $("#subtotal").val(),
                fechaRegistro: fecha,
                key: "isertarItem"
            };
        }
        // console.log(date);
        $.ajax({
            url: "Editar_Presupuesto.php",
            data: date,
            method: "POST",
            dataType: "JSON",
            success: function(resp) {
                // console.log(resp);
                // console.log("first3")
                if (resp) {
                    // console.log("first2")
                    cargarItems();
                    cargarProductos(-1);
                }
            },
        });
    }

    function activarEdit(indice) {
        if (cacheIndice != "") {
            $("#producto" + cacheIndice).attr("disabled", true);
            $("#cantidad" + cacheIndice).attr("disabled", true);
            $("#precio" + cacheIndice).attr("disabled", true);
            $("#precio" + cacheIndice).val(number_format($("#precio" + cacheIndice).val(), 2));
            $("#subtotal" + cacheIndice).attr("disabled", true);
            $("#subtotal" + cacheIndice).val(number_format($("#subtotal" + cacheIndice).val(), 2));
            $("#trash" + cacheIndice).hide();
            $("#edit" + cacheIndice).show();
        }

        if (indice != false) {
            cacheIndice = indice;
            $("#producto" + indice).attr("disabled", false);
            $("#cantidad" + indice).attr("disabled", false);
            $("#precio" + indice).attr("disabled", false);
            $("#precio" + indice).val(number_format($("#precio" + indice).val(), 2, '.', ''));
            $("#subtotal" + indice).attr("disabled", false);
            $("#subtotal" + indice).val(number_format($("#subtotal" + indice).val(), 2, '.', ''));
            $("#trash" + indice).show();
            $("#edit" + indice).hide();
        }
    }

    function cargarItems() {
        let date = {
            idCliente: <?= $idCliente ?>,
            idOperacion: <?= $idOperacion ?>,
            idUsuario: <?= $idEmpresa ?>,
            key: "cargarItems"
        };
        // console.log(date);
        // console.log("items");
        $.ajax({
            url: "Editar_Presupuesto.php",
            data: date,
            method: "POST",
            dataType: "JSON",
            success: function(resp) {
                // console.log(resp);
                if (resp) {
                    let imprimir = "";
                    let total = 0;
                    for (let num = 0; num < (resp.length - 1); num++) {
                        console.log(resp[num]);
                        imprimir +=
                            '<tr>' +
                            '<td width="5%">' + resp[num][0] + '</td>' +
                            '<td width="30%">' +
                            '<input type="hidden" name="nameCod' + resp[num][0] + '" id="nameCod' + resp[num][0] + '" value="' + atob(resp[num][1]) + '">' +
                            '<select name="producto' + resp[num][0] + '" id="producto' + resp[num][0] + '" class="form-control select2 input-lg" style="width: 100%;" onclick="cargarProductos(' + resp[num][0] + ')" onChange="cargarCosto(' + resp[num][0] + ');" onmouseover="this.focus();" disabled>' +
                            '<option selected>' + atob(resp[num][1]) + '</option>' +
                            '</select>' +
                            '</td>' +
                            '<td width="10%"><div align="Right"><input type="number" step="0.01" onkeyup="calcularSubTotal(' + resp[num][0] + ')" name="cantidad' + resp[num][0] + '" id="cantidad' + resp[num][0] + '" class="form-control input-lg" value="' + number_format(atob(resp[num][2]), 2,'.','') + '" disabled></div></td>' +
                            '<td width="20%"><div align="Right"><input type="number" step="0.01" onkeyup="calcularSubTotal(' + resp[num][0] + ')" name="precio' + resp[num][0] + '" id="precio' + resp[num][0] + '" class="form-control input-lg" value="' + number_format(atob(resp[num][3]), 2,'.','') + '" disabled></div></td>' +
                            '<td width="20%"><div align="Right"><input type="number" step="0.01" name="subtotal' + resp[num][0] + '" id="subtotal' + resp[num][0] + '" class="form-control input-lg" value="' + number_format(atob(resp[num][4]), 2,'.','') + '" disabled></div></td>' +
                            '<td width="10%" style="font-size: 22px; width: 96%; height: 45px; margin:7px; display:flex; justify-content: space-evenly; align-items: center;"> <i class="fa fa-refresh text-black" onclick="operacionRemovEditInsert(' + resp[num][0] + ',' + atob(resp[num][5]) + ',0)" style="display:none; cursor:pointer;" id="trash' + resp[num][0] + '"></i> <i class="fa fa-edit text-primary" style="cursor:pointer;" id="edit' + resp[num][0] + '" onclick="activarEdit(' + resp[num][0] + ')"></i> <i class="fa fa-trash text-danger" onclick="operacionRemovEditInsert(' + resp[num][0] + ',' + atob(resp[num][5]) + ',1)" style="cursor:pointer;" id="trash' + resp[num][0] + '"></i> </td>' +
                            '</tr>';
                        total = total + parseFloat(number_format(atob(resp[num][4]), 2,'.',''));
                    }
                    imprimir +=
                        '<tr>' +
                        '<td width="5%">' + (resp.length + 1) + '</td>' +
                        '<td width="30%">' +
                        '<select id="codigoProd" name="producto" class="form-control select2 input-lg" style="width: 100%;" required="required" onclick="cargarProductos(0)" onChange="cargarCosto(0);" onmouseover="this.focus();">' +
                        '</select>' +
                        '</td>' +
                        '<td width="10%"><div align="Right"><input type="number" step="0.01" name="cantidad" id="cantidad" onkeyup="calcularSubTotal()" class="form-control input-lg" value="1"></div></td>' +
                        '<td width="20%"><div align="Right"><input type="number" step="0.01" name="precio" id="base" onkeyup="calcularSubTotal()" class="form-control input-lg" value=""></div></td>' +
                        '<td width="20%"><div align="Right"><input type="number" step="0.01" name="subtotal" id="subtotal" class="form-control input-lg" value=""></div></td>' +
                        '<td width="10%" style="font-size: 22px; width: 96%; height: 46px; margin:7px; display:flex; justify-content: center; align-items: center;"> <a class="text-primary" style="font-size: 36px; cursor:pointer;" onclick="operacionRemovEditInsert(0,0,2);"><i class="fa fa-plus-circle"></i></a> </td>' +
                        // '<td width="10%" style="font-size: 22px; width: 96%; height: 46px; margin:7px; display:flex; justify-content: center; align-items: center;"> <div class="btn btn-primary" style="font-size: 20px; width:37px; height:36px; display:flex; justify-content: center; align-items: center; border-radius:100%" onclick="operacionRemovEditInsert(0,0,2)"><i class="fa fa-plus-circle"></i></div> </td>' +
                        '</tr>';
                    $("#impFactura").html(imprimir);
                    // if (resp[resp.length - 1] >= 0) {
                    //     let impDescuento = '<th>Descuento: </th>' +
                    //         '<td style="display: flex;">' +
                    //         '  <div><input type="number" step="0.01" name="desct" id="desct" class="form-control input-lg" value="' + resp[resp.length - 1] + '" disabled style="height: 40px;"></div></div>' +
                    //         '  <div style="display: flex; justify-content:center; align-items: center;">' +
                    //         '  <a href="#dc" onclick="editActualizarDescuento(1,<?= $idOperacion ?>)" id="editDescuento"><i class="fa fa-edit" style="font-size: 25px; margin-left: 15px;"></i></a>' +
                    //         '  <a href="#dc" onclick="editActualizarDescuento(0,<?= $idOperacion ?>)" id="actualizarDescuento" style="font-size: 25px; margin-left: 15px; display:none;"><i class="fa fa-refresh"></i></a></div>' +
                    //         '</td>';
                    //     $("#descuento").html(impDescuento || 0);
                    // }
                    $("#totalP").html(number_format(total, 2) + " $");
                    $("#totalNV").html(number_format((total - resp[resp.length - 1]), 2) + " $");
                }
            },
        });
    }

    function editActualizarDescuento(modo, idOperacion) {
        console.log($("#desct").val());
        $("#" + (modo == 1 ? 'actualizarDescuento' : 'editDescuento')).show();
        $("#" + (modo == 1 ? 'desct' : 'desct')).attr('disabled', (modo == 1 ? false : true));
        $("#" + (modo == 0 ? 'actualizarDescuento' : 'editDescuento')).hide();
        if (modo == 0) {
            let date = {
                idCliente: <?= $idCliente ?>,
                idOperacion: <?= $idOperacion ?>,
                idUsuario: <?= $idEmpresa ?>,
                newDesc: $("#desct").val(),
                key: "editarDescuento"
            };
            $.ajax({
                url: "Editar_Presupuesto.php",
                data: date,
                method: "POST",
                dataType: "JSON",
                success: function(resp) {
                    // console.log(resp);
                    if (resp) {
                        cargarItems();
                    }
                },
            });
        }
    }

    window.addEventListener('load', () => {
        // console.log("entre");
        cargarItems();
    });
</script>

<?php include("footer.php") ?>