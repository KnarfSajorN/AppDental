<?php
include '.././header.php';
include '.././menu.php';
$ID = $_SESSION['ID'];
$desde = $_POST['fechaDesde'];
$hasta = $_POST['fechaHasta'];
$tipo_reporte = $_POST['tipo_reporte'];
$ID_cliente = $_POST['cliente_id'];
$rango1 = $_POST['rango1'];
$rango2 = $_POST['rango2'];
$idProducto = $_POST['ID'];
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
?>

<!-- Reporte ventas tabla -->

<div class="container mt-5">
    <form action="reportVentaPorDia" method="post">
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="tipo_reporte">Seleccione el tipo de reporte:</label>
                <select class="form-control" name="tipo_reporte" id="tipo_reporte">
                    <option value="Ventas por rango dia">Ventas por rango dia</option>
                    <option value="Ventas por cliente">Ventas por cliente</option>
                    <option value="Ventas por departamento">Ventas por departamento</option>
                    <option value="Ventas por rango de valor pagado">Ventas por rango de valor pagado</option>
                    <option value="Ventas por frecuencia por cliente">Ventas por frecuencia por cliente</option>
                    <option value="Ventas por por localidad">Ventas por por localidad</option>
                    <option value="Ventas - Margen de la utilidad bruta">Ventas - Margen de la utilidad bruta</option>
                    <option value="Ventas - Utilidad">Ventas - Utilidad</option>
                    <!-- Otras opciones -->
                </select>
            </div>

            <div class="form-group col-md-3" id="fechaDesde" name="fechaDesde">
                <label for="fechaDesde">Desde:</label>
                <input type="date" class="form-control">
            </div>
            <div class="form-group col-md-3" id="fechaHasta" name="fechaHasta">
                <label for="fechaHasta">Hasta:</label>
                <input type="date" class="form-control">
            </div>
            <div class="form-group col-md-3" id="rango1" name="rango1">
                <label for="rango1">Dijite el primer valor: </label>
                <input type="number" class="form-control">
            </div>
            <div class="form-group col-md-3" id="rango2" name="rango2">
                <label for="rango2">Dijite el segundo valor: </label>
                <input type="number" class="form-control">
            </div>
            <div class="form-group col-md-3" id="clienteSelect" name="clienteSelect">
                <label for="idCliente">Seleccione el cliente:</label>
                <select class="form-control select2">
                    <!-- Opciones de clientes generadas desde PHP -->
                    <?php

                    $queryList = mysqli_query($conn3, 'SELECT cliente_id, nombre_cliente FROM cliente ORDER BY nombre_cliente ASC;');
                    // Verifica si la consulta fue exitosa
                    if ($queryList) {
                        while ($fila = mysqli_fetch_assoc($queryList)) {
                            echo '<option value="' . $fila['cliente_id'] . '">' . $fila['nombre_cliente'] . '</option>';
                        }
                        mysqli_free_result($queryList); // Liberar memoria del resultado
                    } else {
                        echo '<option value="">No se encontraron clientes</option>';
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Aceptar">
        </div>
    </form>
    <div class="table-responsive mt-5">
        <table id="Tabla_Inteligente" class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <?php
                    $Cabezera["Ventas por rango dia"] = ["TIPO DOCUMENTO", "NUMERO DOC", "FECHA", "RUC", "NOMBRE", "VTA.BTA", "% DESCUENTO", "VTA.NET", "VENTA BASE 0%", "VENTA BASE 12%", "I.V.A.", "TOTAL"];
                    $Cabezera["Ventas por cliente"] = ["TIPO DOCUMENTO", "NUMERO DOC", "FECHA", "RUC", "NOMBRE", "VTA.BTA", "% DESCUENTO", "VTA.NET", "VENTA BASE 0%", "VENTA BASE 12%", "I.V.A.", "TOTAL"];
                    $Cabezera["Ventas por departamento"] = ["TIPO DOCUMENTO", "NUMERO DOC", "FECHA", "RUC", "NOMBRE", "VTA.BTA", "% DESCUENTO", "VTA.NET", "VENTA BASE 0%", "VENTA BASE 12%", "I.V.A.", "TOTAL"];
                    $Cabezera["Ventas por frecuencia por cliente"] = ["TIPO DOCUMENTO", "NUMERO DOC", "FECHA", "RUC", "NOMBRE", "VTA.BTA", "% DESCUENTO", "VTA.NET", "VENTA BASE 0%", "VENTA BASE 12%", "I.V.A.", "TOTAL"];
                    $Cabezera["Ventas por rango de valor pagado"] = ["TIPO DOCUMENTO", "NUMERO DOC", "FECHA", "RUC", "NOMBRE", "VTA.BTA", "% DESCUENTO", "VTA.NET", "VENTA BASE 0%", "VENTA BASE 12%", "I.V.A.", "TOTAL"];
                    $Cabezera["Ventas por localidad"] = ["CODIGO LOCALIDAD", "NOMBRE LOCALIDAD", "CANTIDAD VENTAS", "FECHA VENTA", "VTA.NET", "VENTA BASE 0%", "VENTA BASE 12%", "I.V.A.", "TOTAL"];
                    $Cabezera["Ventas - Margen de la utilidad bruta"] = ["PRODUCTO", "CANTIDAD DE PRODUCTO", "TOTAL NETO", "MONTO PAGADO", "COSTO", "PRECIO", "MARGEN DE UTILIDAD BRUTA"];
                    $Cabezera["Ventas - UTILIDAD"] = ["PRODUCTO", "LOTE", "FECHA VENCIMIENTO", "VALOR PRODUCTO"];

                    foreach ($Cabezera[$tipo_reporte] as $key => $value) {
                        echo "<td>{$value}</td>";
                    }
                    ?>
                </tr>
            </thead>
        </table>
    </div>
    <div class="mt-5">
        <?php
        $totalVentasEfectivo = 0;
        $totalVentasCredito = 0;

        $resultado = mysqli_query($conn3, "SELECT COUNT(*) as cantidad, metodo_Pago FROM sDetalleMetodosPagos WHERE metodo_Pago = 'Crédito' OR metodo_Pago = 'Efectivo' GROUP BY metodo_Pago");

        while ($fila = mysqli_fetch_array($resultado)) {
            if ($fila['metodo_Pago'] === 'Efectivo') {
                $totalVentasEfectivo = $fila['cantidad'];
            } elseif ($fila['metodo_Pago'] === 'Crédito') {
                $totalVentasCredito = $fila['cantidad'];
            }
        }
        // Crear datos para la gráfica
        $arrayDatos = [
            ['Efectivo', $totalVentasEfectivo],
            ['Crédito', $totalVentasCredito]
        ];
        $datosJson = json_encode($arrayDatos);
        $_GET['n'] = 6;
        $_GET['nombre'] = 'Grafica Ventas';
        $_GET['Tiempo'] = '1000';
        $_GET['datos'] = $datosJson;
        ?>
        <?php include '../generarGrafica.php' ?>
    </div>
    <div class="mt-5">
        <?php
        $totalVentasIva = 0;
        $totalComprasIva = 0;
        $arrayIvaVvsCom = []; //array Iva de ventas vs Iva de compras

        $queryList = mysqli_query($conn3, "SELECT * 
    FROM sDetalleOper
    JOIN sOperacionInv ON sOperacionInv.idOperacion = sDetalleOper.idOperacion
    WHERE sOperacionInv.tipo = 3 OR sOperacionInv.tipo = 1;");

        //Recorremos el resultado y sumamos los valores
        //tipo 3 para compras
        //tipo 1 para ventas
        while ($row = mysqli_fetch_array($queryList)) {
            if ($row['tipo'] === '3') {
                $totalComprasIva += $row['Impuesto_Numerico'];
            } elseif ($row['tipo'] === '1') {
                $totalVentasIva += intval($row['Impuesto_Numerico']);
            }
        }

        $arrayIvaVvsCom = [
            ['Iva Ventas', $totalVentasIva],
            ['Iva Compras', $totalComprasIva]
        ];
        $datosJson = json_encode($arrayIvaVvsCom);

        $_GET['n'] = 1;
        $_GET['nombre'] = 'Grafica Ventas';
        $_GET['Tiempo'] = '1000';
        $_GET['datos'] = $datosJson;
        ?>

        <?php include '../generarGrafica.php' ?>
    </div>
    <div class="mt-5">
        <div class="form-group col-md-3">
            <label for="idCliente">Seleccione el Producto:</label>
            <select class="form-control select2" name="cliente_id">
                <!-- Opciones de clientes generadas desde PHP -->
                <?php
                $queryList = mysqli_query($conn3, 'SELECT ID, descripcion FROM sinvetrios;');
                // Verifica si la consulta fue exitosa
                if ($queryList) {
                    while ($fila = mysqli_fetch_assoc($queryList)) {
                        echo '<option value="' . $fila['ID'] . '">' . $fila['descripcion'] . '</option>';
                    }
                    mysqli_free_result($queryList); // Liberar memoria del resultado
                } else {
                    echo '<option value="">No se encontraron clientes</option>';
                }
                ?>
            </select>
        </div>
        <?php

        //---------------------------------------------------------COMPRAS---------------------------------------------------------//
        $resultadosCompra = mysqli_query($conn3, "SELECT sDetalleOper.fechaRegistro, sOperacionInv.fechaOperacion, sinvetrios.descripcion, sOperacionInv.tipo, sinvetrios.ID, sinvetrios.existencia
        FROM sOperacionInv
        INNER JOIN sDetalleOper ON sOperacionInv.idOperacion = sDetalleOper.idOperacion
        INNER JOIN sinvetrios ON sDetalleOper.idProducto = sinvetrios.ID
        WHERE sOperacionInv.tipo = 3 
          AND sinvetrios.ID = $idProducto");
        //---------------------------------------------------------VENTAS---------------------------------------------------------//
        $resultadosVenta = mysqli_query($conn3, "SELECT sDetalleOper.fechaRegistro, sOperacionInv.fechaOperacion, sinvetrios.descripcion, sOperacionInv.tipo, sinvetrios.ID, sinvetrios.existencia
        FROM sOperacionInv
        INNER JOIN sDetalleOper ON sOperacionInv.idOperacion = sDetalleOper.idOperacion
        INNER JOIN sinvetrios ON sDetalleOper.idProducto = sinvetrios.ID
        WHERE sOperacionInv.tipo = 1
          AND sinvetrios.ID = $idProducto");
        // Arrays para almacenar las fechas de compra y venta respectivamente
        $fechasCompra = [];
        $fechasVenta = [];

        // Recorrer resultados de la compra y almacenar fechas en $fechasCompra
        foreach ($resultadosCompra as $row) {
            $fechasCompra[] = strtotime($row['fechaRegistro']);
        }
        // Recorrer resultados de la venta y almacenar fechas en $fechasVenta
        foreach ($resultadosVenta as $row) {
            $fechasVenta[] = strtotime($row['fechaRegistro']);
        }
        // Calcular el tiempo transcurrido entre compra y venta
        $tiemposEntreCompraVenta = [];

        foreach ($fechasCompra as $fechaCompra) {
            foreach ($fechasVenta as $fechaVenta) {
                // Calcular el tiempo transcurrido en segundos
                $tiempoTranscurrido = $fechaVenta - $fechaCompra;
                // Convertir segundos a días
                $diasTranscurridos = $tiempoTranscurrido / (60 * 60 * 24);
                // Agregar a un array los tiempos transcurridos entre compra y venta
                $tiemposEntreCompraVenta[] = $diasTranscurridos;
            }
        }

        // Calcular el tiempo promedio entre compra y venta
        if (count($tiemposEntreCompraVenta) > 0) {
            $tiempoPromedio = array_sum($tiemposEntreCompraVenta) / count($tiemposEntreCompraVenta);
            echo "El tiempo promedio entre compra y venta es de aproximadamente: " . round($tiempoPromedio, 2) . " días.";
        } else {
            echo "No hay suficientes datos para calcular el tiempo promedio entre compra y venta.";
        }


        $_GET['n'] = 2;
        $_GET['nombre'] = 'Grafica Ventas';
        $_GET['Tiempo'] = '1000';
        $_GET['datos'] = $datosJson;
        ?>


        <?php include '../generarGrafica.php' ?>
    </div>
</div>

<?php
include '.././footer.php'
?>
<script>
var data_table = []; //datos que recibe la tabla
var titulo_tabla = "<?php echo $tipo_reporte; ?>";
var opcion = "<?php echo $tipo_reporte; ?>";
switch (opcion) {
    case 'Ventas por rango dia':
        console.log('Entro al case 1');

        break;
    case 'Ventas por cliente':
        <?php
            $queryList = mysqli_query($conn3, "SELECT * FROM  sOperacionInv  where  idCliente = $cliente_id");
            $nrowl = mysqli_num_rows($queryList);
            while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                $cliente_id = $rowMotorizado['cliente_id'];
                $numeroDoc = $rowMotorizado['numeroDoc'];
                $fechaOperacion = $rowMotorizado['fechaOperacion'];
                $descuento = $rowMotorizado['descuento'];
                $subTotal = $rowMotorizado['subTotal'];
                $impuesto = $rowMotorizado['impuesto'];
                $nombreCliente = funcionMaster($rowMotorizado['idCliente'], 'cliente_id', 'nombre_cliente', 'cliente');
                $rucCliente = funcionMaster($rowMotorizado['idCliente'], 'cliente_id', 'CODI_CLIENTE', 'cliente');
                if ($impuesto <> "0") {
                    $v12 = $subTotal;
                    $v0 = "0";
                } else {
                    $v0 = $subTotal;
                    $v12 = "0";
                }
                $totalBruto = $rowMotorizado['totalBruto'];
                $totalNeto = $rowMotorizado['totalNeto'];
            ?>
        //accion para guardar la informacion en el arreglo para que en el footer la funcion del datatables tome esta variable y carge la informacion
        data_table.push(["<?php echo 'Ventas'; ?>",
            "<?php echo $numeroDoc; ?>",
            "<?php echo $fechaOperacion; ?>",
            "<?php echo $rucCliente; ?>",
            "<?php echo $nombreCliente; ?>",
            "<?php echo $totalBruto; ?>",
            "<?php echo $descuento; ?>",
            "<?php echo $totalNeto; ?>",
            "<?php echo $v0; ?>",
            "<?php echo $v12; ?>",
            "<?php echo $impuesto; ?>",
            "<?php echo $totalNeto; ?>"
        ]);
        <?php
            }
            ?>
        break;
    case 'Ventas por departamento':
        break;
    case 'Ventas por rango de valor pagado':
        <?php
            $queryList = mysqli_query($conn3, "SELECT * from sOperacionInv where montoPagado between $rango1 and $rango2");
            $nrowl = mysqli_num_rows($queryList);
            while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                $cliente_id = $rowMotorizado['cliente_id'];
                $numeroDoc = $rowMotorizado['numeroDoc'];
                $fechaOperacion = $rowMotorizado['fechaOperacion'];
                $descuento = $rowMotorizado['descuento'];
                $subTotal = $rowMotorizado['subTotal'];
                $impuesto = $rowMotorizado['impuesto'];
                $nombreCliente = funcionMaster($rowMotorizado['idCliente'], 'cliente_id', 'nombre_cliente', 'cliente');
                $rucCliente = funcionMaster($rowMotorizado['idCliente'], 'cliente_id', 'CODI_CLIENTE', 'cliente');
                if ($impuesto <> "0") {
                    $v12 = $subTotal;
                    $v0 = "0";
                } else {
                    $v0 = $subTotal;
                    $v12 = "0";
                }
                $totalBruto = $rowMotorizado['totalBruto'];
                $totalNeto = $rowMotorizado['totalNeto'];
            ?>
        data_table.push(["<?php echo 'Ventas'; ?>",
            "<?php echo $numeroDoc; ?>",
            "<?php echo $fechaOperacion; ?>",
            "<?php echo $rucCliente; ?>",
            "<?php echo $nombreCliente; ?>",
            "<?php echo $totalBruto; ?>",
            "<?php echo $descuento; ?>",
            "<?php echo $totalNeto; ?>",
            "<?php echo $v0; ?>",
            "<?php echo $v12; ?>",
            "<?php echo $impuesto; ?>",
            "<?php echo $totalNeto; ?>"
        ]);
        <?php
            }
            ?>
        break;
    case 'Ventas por frecuencia por cliente':
        break;
    case 'Ventas por por localidad':
        break;
    case 'Ventas - Margen de la utilidad bruta':
        // ["PRODUCTO","CANTIDAD DE PRODUCTO","TOTAL NETO","MONTO PAGADO","COSTO","PRECIO","MARGEN DE UTILIDAD BRUTA"];
        <?php
            $queryList = mysqli_query($conn3, "SELECT sOperacionInv.totalBruto, sOperacionInv.cantidadProduc, sOperacionInv.totalNeto, sOperacionInv.montoPagado, sinvetrios.descripcion, sinvetrios.costo, sinvetrios.precio
                                                   FROM sDetalleOper, sinvetrios, sOperacionInv
                                                   WHERE sOperacionInv.idOperacion = sDetalleOper.idOperacion 
                                                   AND sDetalleOper.idProducto = sinvetrios.ID;");
            $nrowl = mysqli_num_rows($queryList);
            while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                $producto = $rowMotorizado['descripcion'];
                $cantidadProducto = $rowMotorizado['cantidadProduc'];
                $totalNeto = $rowMotorizado['totalNeto'];
                $montoPagado = $rowMotorizado['montoPagado'];
                $costo = $rowMotorizado['costo'];
                $precio = $rowMotorizado['precio'];
                $totalNeto = $rowMotorizado['totalNeto'];
                $totalCosto = $rowMotorizado['costo'];
                $margenUtilidadBruta = $totalNeto - $totalCosto;
            ?>
        data_table.push(["<?php echo $producto; ?>",
            "<?php echo $cantidadProducto; ?>",
            "<?php echo $totalNeto; ?>",
            "<?php echo $montoPagado; ?>",
            "<?php echo $costo; ?>",
            "<?php echo $precio; ?>",
            "<?php echo $margenUtilidadBruta; ?>"
        ]);
        <?php
            }
            ?>
        break;
    case 'Ventas - Utilidad':
        break;
    default:
        console.log('Entro al default');
        break;
}
</script>


<script type="text/javascript">
$(function() {
    // esto va en el footer
    //tabla inteligente
    if (typeof data_table !== 'undefined') {
        var Tabla_Inteligente = $('#Tabla_Inteligente').DataTable({

            data: data_table,
            deferRender: true,
            scrollY: 1200,
            scrollCollapse: true,
            scroller: true,
            processing: true,
            lengthMenu: [10, 20, 50, 100, 200, 500],
            language: {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Entradas",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                },
                buttons: {
                    pageLength: {
                        _: "Mostrando %d <br> Elementos",
                        '-1': "Ver Todo"
                    }
                }
            },

            dom: 'Bfrtip',
            buttons: [{
                extend: 'collection',
                text: '<i class="fa fa-cog" aria-hidden="true"></i>',
                className: 'btn btn-primary1',
                buttons: [{
                        extend: 'print',
                        text: 'Imprimir',
                        title: titulo_tabla,
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'copy',
                        text: 'Copiar',
                        title: titulo_tabla,
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'excel',
                        text: 'Excel',
                        title: titulo_tabla,
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'csv',
                        text: 'CSV',
                        title: titulo_tabla,
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'pdf',
                        text: 'PDF',
                        title: titulo_tabla,
                        orientation: 'landscape',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },

                    {
                        extend: 'pageLength'
                    },
                    {
                        extend: 'colvis',
                        text: 'Modificar Columnas'
                    }
                ]
            }],

        });
    }
});
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Obtener referencia al select
    var selectTipoReporte = document.getElementById('tipo_reporte');

    // Obtener referencias a los elementos a mostrar u ocultar
    var fechaDesde = document.getElementById('fechaDesde');
    var fechaHasta = document.getElementById('fechaHasta');
    var rango1 = document.getElementById('rango1');
    var rango2 = document.getElementById('rango2');
    var cliente = document.getElementById('clienteSelect');

    // Función para mostrar u ocultar elementos
    function mostrarOcultarElementos() {
        var valorSeleccionado = selectTipoReporte.value;
        // Mostrar u ocultar elementos según la selección
        fechaDesde.style.display = valorSeleccionado === 'Ventas por rango dia' ? 'block' : 'none';
        fechaHasta.style.display = valorSeleccionado === 'Ventas por rango dia' ? 'block' : 'none';
        rango1.style.display = valorSeleccionado === 'Ventas por rango de valor pagado' ? 'block' : 'none';
        rango2.style.display = valorSeleccionado === 'Ventas por rango de valor pagado' ? 'block' : 'none';
        cliente.style.display = valorSeleccionado === 'Ventas por cliente' ? 'block' : 'none';
        // Puedes continuar con otros elementos según tu necesidad
    }

    // Escuchar cambios en el select y llamar a la función para mostrar u ocultar elementos
    selectTipoReporte.addEventListener('change', mostrarOcultarElementos);

    // Mostrar u ocultar elementos al cargar la página
    mostrarOcultarElementos();
});
</script>


<script type="text/javascript">
$(function() {
    // esto va en el footer
    //tabla inteligente
    if (typeof data_table !== 'undefined') {
        var Tabla_Inteligente = $('#Tabla_Inteligente').DataTable({

            data: data_table,
            deferRender: true,
            scrollY: 1200,
            scrollCollapse: true,
            scroller: true,
            processing: true,
            lengthMenu: [10, 20, 50, 100, 200, 500],
            language: {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Entradas",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                },
                buttons: {
                    pageLength: {
                        _: "Mostrando %d <br> Elementos",
                        '-1': "Ver Todo"
                    }
                }
            },

            dom: 'Bfrtip',
            buttons: [{
                extend: 'collection',
                text: '<i class="fa fa-cog" aria-hidden="true"></i>',
                className: 'btn btn-primary1',
                buttons: [{
                        extend: 'print',
                        text: 'Imprimir',
                        title: titulo_tabla,
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'copy',
                        text: 'Copiar',
                        title: titulo_tabla,
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'excel',
                        text: 'Excel',
                        title: titulo_tabla,
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'csv',
                        text: 'CSV',
                        title: titulo_tabla,
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'pdf',
                        text: 'PDF',
                        title: titulo_tabla,
                        orientation: 'landscape',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },

                    {
                        extend: 'pageLength'
                    },
                    {
                        extend: 'colvis',
                        text: 'Modificar Columnas'
                    }
                ]
            }],

        });
    }
});
</script>