<?php
include '.././header.php';
include '.././menu.php';
$tipo_reporte = $_POST['tipo_reporte'];
$Id_Deposito = $_POST['id_deposito'];
$existencias = $_POST['existencias'];
?>

<div class="container mt-5">
    <form action="reporteInventario" method="post">
        <div class="form-row">
            <div class="col-md-4">
                <label for="tipo_reporte">Seleccione el tipo de reporte:</label>
                <select class="form-control select2" name="tipo_reporte" id="tipo_reporte">
                    <option value="Inventario">Inventario</option>
                    <option value="Inventario por lotes">Inventario por lotes</option>
                    <option value="Inventario por depositos">Inventario por depositos</option>
                    <option value="Inventario por provedores">Inventario por provedores</option>
                    <option value="Movimientos de inventarios">Movimientos de inventarios</option>
                    <option value="Existencia depositos">Existencia depositos</option> <!-- Otras opciones -->
                </select>
            </div>
            <div class="col-md-4" id="id_deposito">
                <label for="id_deposito">Seleccione el depósito:</label>
                <select class="form-control select2" name="id_deposito">
                    <?php
                    $queryList = mysqli_query($conn3, 'SELECT * FROM dep;');
                    // Verifica si la consulta fue exitosa
                    if ($queryList) {
                        while ($fila = mysqli_fetch_assoc($queryList)) {
                            echo '<option value="' . $fila['id'] . '">' . $fila['descripcion'] . '</option>';
                        }
                        mysqli_free_result($queryList); // Liberar memoria del resultado
                    } else {
                        echo '<option value="">No se encontraron clientes</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="col-md-4" id="existenciasDiv">
                <label for="existencias">Selecciona la cantidad de existencias que deseas buscar:</label>
                <input type="number" id="existencias" name="existencias" min="0" max="100" step="1" class="form-control">
            </div>
        </div>
        <div class="mt-3">
            <input type="submit" class="btn btn-primary" value="Aceptar">
        </div>
    </form>
    <div class="table-responsive mt-5">
        <table id="Tabla_Inteligente" class="table table-bordered table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <?php
                    $Cabezera["Inventario"] = ["DESCRIPCION", "EXISTENCIA", "MINIMO", "MAXIMO", "COSTO", "PRECIO", "FECHA DE VENCIMIENTO"];
                    $Cabezera["Inventario por lotes"] = ["DESCRIPCION", "EXISTENCIA", "MINIMO", "MAXIMO", "COSTO", "PRECIO", "FECHA DE VENCIMIENTO", "LOTE"];
                    $Cabezera["Inventario por depositos"] = ["DESCRIPCION", "EXISTENCIA", "MINIMO", "MAXIMO", "COSTO", "PRECIO", "FECHA DE VENCIMIENTO"];
                    $Cabezera["Inventario por provedores"] = ["DESCRIPCION", "EXISTENCIA", "MINIMO", "MAXIMO", "COSTO", "PRECIO", "FECHA DE VENCIMIENTO"];
                    $Cabezera["Movimientos de inventarios"] = ["DESCRIPCION", "FECHA OPERACION", "CANTIDAD PRODUCTO", "FACTURADO DESDE", "TIPO MOVIMIENTO"];
                    $Cabezera["Existencia depositos"] = ["DESCRIPCION", "EXISTENCIA", "MINIMO", "MAXIMO", "COSTO", "PRECIO", "FECHA DE VENCIMIENTO"];
                    foreach ($Cabezera[$tipo_reporte] as $key => $value) {
                        echo "<td>{$value}</td>";
                    }
                    ?>
                </tr>
            </thead>
            <tbody>
                <!-- Datos de la tabla -->
            </tbody>
        </table>
    </div>

    <div class="mt-5">
        <canvas id="graficoVentasPorMes" width="400" height="400"></canvas>
    </div>


    <?php
    include '.././footer.php'
    ?>

    <script>
        var data_table = []; //datos que recibe la tabla
        var titulo_tabla = "<?php echo $tipo_reporte; ?>";
        var opcion = "<?php echo $tipo_reporte; ?>";
        switch (opcion) {
            case "Inventario":

                <?php
                $queryList = mysqli_query($conn3, "SELECT * FROM sinvetrios");
                $nrowl = mysqli_num_rows($queryList);
                while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                    $descripcion = $rowMotorizado["descripcion"];
                    $existencia = $rowMotorizado["existencia"];
                    $minimo = $rowMotorizado["minimo"];
                    $maximo = $rowMotorizado["maximo"];
                    $costo = $rowMotorizado["costo"];
                    $precio = $rowMotorizado["precio"];
                    $fechaVencimiento = $rowMotorizado["fecha_vencimiento"];

                ?>
                    data_table.push(["<?php echo $descripcion; ?>",
                        "<?php echo $existencia; ?>",
                        "<?php echo $minimo; ?>",
                        "<?php echo $maximo; ?>",
                        "<?php echo $costo; ?>",
                        "<?php echo $precio; ?>",
                        "<?php echo $fechaVencimiento; ?>"

                    ]);
                <?php
                }
                ?>
                break;
            case "Inventario por lotes":
                <?php
                $queryList = mysqli_query($conn3, "SELECT sinvetrios.*, SinvDep.lote FROM sinvetrios, SinvDep, dep WHERE sinvetrios.ID = SinvDep.idSinvetrios AND SinvDep.lote IS NOT NULL");
                $nrowl = mysqli_num_rows($queryList);
                while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                    $descripcion = $rowMotorizado["descripcion"];
                    $existencia = $rowMotorizado["existencia"];
                    $minimo = $rowMotorizado["minimo"];
                    $maximo = $rowMotorizado["maximo"];
                    $costo = $rowMotorizado["costo"];
                    $precio = $rowMotorizado["precio"];
                    $fechaVencimiento = $rowMotorizado["fecha_vencimiento"];
                    $lote = $rowMotorizado["lote"];

                ?>
                    data_table.push(["<?php echo $descripcion; ?>",
                        "<?php echo $existencia; ?>",
                        "<?php echo $minimo; ?>",
                        "<?php echo $maximo; ?>",
                        "<?php echo $costo; ?>",
                        "<?php echo $precio; ?>",
                        "<?php echo $fechaVencimiento; ?>",
                        "<?php echo $lote; ?>"
                    ]);
                <?php
                }
                ?>
                break;
            case "Inventario por depositos":
                <?php
                $queryList = mysqli_query($conn3, "SELECT sinvetrios.*, dep.descripcion AS nombre_deposito FROM sinvetrios, SinvDep, dep WHERE sinvetrios.ID = SinvDep.idSinvetrios AND SinvDep.idDep = dep.id AND dep.id = $Id_Deposito;");
                $nrowl = mysqli_num_rows($queryList);
                while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                    $descripcion = $rowMotorizado["descripcion"];
                    $existencia = $rowMotorizado["existencia"];
                    $minimo = $rowMotorizado["minimo"];
                    $maximo = $rowMotorizado["maximo"];
                    $costo = $rowMotorizado["costo"];
                    $precio = $rowMotorizado["precio"];
                    $fechaVencimiento = $rowMotorizado["fecha_vencimiento"];

                ?>
                    data_table.push(["<?php echo $descripcion; ?>",
                        "<?php echo $existencia; ?>",
                        "<?php echo $minimo; ?>",
                        "<?php echo $maximo; ?>",
                        "<?php echo $costo; ?>",
                        "<?php echo $precio; ?>",
                        "<?php echo $fechaVencimiento; ?>"

                    ]);
                <?php
                }
                ?>
                break;
            case "Inventario por provedores":
                break;
            case "Movimientos de inventarios":
                // $Cabezera["Movimientos de inventarios"] = ["DESCRIPCION", "FECHA OPERACION", "FACTURADO DESDE", "TIPO MOVIMIENTO"];
                <?php
                $queryList = mysqli_query($conn3, "SELECT * from sOperacionInv, sDetalleOper where sOperacionInv.idOperacion =  sDetalleOper.idOperacion and sOperacionInv.tipo = 1 or sOperacionInv.tipo =3");
                $nrowl = mysqli_num_rows($queryList);
                while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                    $descripcion = $rowMotorizado["descripcion"];
                    $fechaOperacion = $rowMotorizado["fechaOperacion"];
                    $cantidadProduc = $rowMotorizado["cantidadProduc"];
                    $facturadoDesde = $rowMotorizado["Facturado_Desde"];
                    if ($rowMotorizado["tipo"] == 3) {
                        $tipoMovimiento = 'COMPRA';
                    } elseif ($rowMotorizado["tipo"] == 1) {
                        $tipoMovimiento = 'VENTA';
                    }

                ?>
                    data_table.push(["<?php echo $descripcion; ?>",
                        "<?php echo $fechaOperacion; ?>",
                        "<?php echo $cantidadProduc; ?>",
                        "<?php echo $facturadoDesde; ?>",
                        "<?php echo $tipoMovimiento; ?>",


                    ]);
                <?php
                }
                ?>
                break;
            case "Existencia depositos":
                <?php
                $queryList = mysqli_query($conn3, "SELECT sinvetrios.*, dep.descripcion AS nombre_deposito
                FROM sinvetrios, SinvDep, dep
                WHERE sinvetrios.ID = SinvDep.idSinvetrios
                AND SinvDep.idDep = dep.id
                AND dep.id = $Id_Deposito
                AND sinvetrios.existencia >= $existencias
                ORDER BY sinvetrios.descripcion ASC;");
                $nrowl = mysqli_num_rows($queryList);
                while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                    $descripcion = $rowMotorizado["descripcion"];
                    $existencia = $rowMotorizado["existencia"];
                    $minimo = $rowMotorizado["minimo"];
                    $maximo = $rowMotorizado["maximo"];
                    $costo = $rowMotorizado["costo"];
                    $precio = $rowMotorizado["precio"];
                    $fechaVencimiento = $rowMotorizado["fecha_vencimiento"];

                ?>
                    data_table.push(["<?php echo $descripcion; ?>",
                        "<?php echo $existencia; ?>",
                        "<?php echo $minimo; ?>",
                        "<?php echo $maximo; ?>",
                        "<?php echo $costo; ?>",
                        "<?php echo $precio; ?>",
                        "<?php echo $fechaVencimiento; ?>"

                    ]);
                <?php
                }
                ?>
                break;
            default:
                console.log('entro al default');
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
        function mostrarOcultarElementos() {
            var valorSeleccionado = selectorTipoReporte.value;
            console.log("El valor seleccionado es:", valorSeleccionado);
            idDepositoDiv.style.display = valorSeleccionado === 'Inventario por depositos' ? 'block' : 'none';
            existenciasDiv.style.display = valorSeleccionado === 'Existencia depositos' ? 'block' : 'none';
            var selectorTipoReporte = document.getElementById('tipo_reporte');
            var idDepositoDiv = document.getElementById('id_deposito');
            var existenciasDiv = document.getElementById('existenciasDiv');
            console.log(selectorTipoReporte);
        }
    </script>