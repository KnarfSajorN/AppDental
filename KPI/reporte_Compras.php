<?php
include '.././header.php';
include '.././menu.php';
$tipo_reporte = $_POST['tipo_reporte'];
$fecha = $_POST['fecha'];
$idCategoria = $_POST['idCategoria'];

error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<div class="container mt-5">
    <form action="reporteCompras" method="post">
        <div class="row">
            <div class="form-group col-md-3" id="fecha" name="fecha">
                <label for="fecha">Seleccione el dia:</label>
                <input type="date" class="form-control">
            </div>
            <div class="col-md-4">
                <label for="tipo_reporte">Seleccione el tipo de reporte:</label>
                <select class="form-control select2" name="tipo_reporte" id="tipo_reporte">
                    <option value="Control GE">Control de gastos egresos</option>
                    <option value="Gastos por dia">Gastos por dia</option>
                    <option value="Gastos por categoria">Gastos por categoria</option>
                </select>
                <div class="form-group col-md-6" id="idCategoria" name="idCategoria">
                <label for="idCliente">Seleccione la categoria:</label>
                <select class="form-control select2">
                    <!-- Opciones de clientes generadas desde PHP -->
                    <?php

                    $queryList = mysqli_query($conn3, 'SELECT * from S_GE_categorias;');
                    // Verifica si la consulta fue exitosa
                    if ($queryList) {
                        while ($fila = mysqli_fetch_assoc($queryList)) {
                            echo '<option value="' . $fila['id'] . '">' . $fila['descripcion'] . '</option>';
                        }
                        mysqli_free_result($queryList); // Liberar memoria del resultado
                    } else {
                        echo '<option value="">No se encontraron categorias</option>';
                    }
                    ?>
                </select>
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
                    $Cabezera["Control GE"] = ["FECHA", "MES", "DESCRIPCION", "MONTO", "TIPO", "CATEGORIA", "SUCURSAL"];
                    $Cabezera["Gastos por dia"] = ["FECHA", "MES", "DESCRIPCION", "MONTO", "TIPO", "CATEGORIA", "SUCURSAL"];
                    $Cabezera["Gastos por categoria"] = ["FECHA", "MES", "DESCRIPCION", "MONTO", "TIPO", "CATEGORIA", "SUCURSAL"];
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

    <?php
    include '.././footer.php'
    ?>

    <SCRIPT>
        var data_table = []; //datos que recibe la tabla
        var titulo_tabla = "<?php echo $tipo_reporte; ?>";
        var opcion = "<?php echo $tipo_reporte; ?>";
        switch (opcion) {
            case "Control GE":                
                <?php
                $queryList = mysqli_query($conn3, "SELECT * from S_GE_nuevo;");
                $nrowl = mysqli_num_rows($queryList);
                while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                    $fecha = $rowMotorizado["fecha"];
                    $mes = $rowMotorizado["mes"];
                    $descripcion = $rowMotorizado["descripcion"];
                    $monto = $rowMotorizado["monto"];
                    $tipo = $rowMotorizado["tipo"];
                    $categoria = $rowMotorizado["categoria"];
                    $sucursal = $rowMotorizado["sucursal"];
                    switch ($tipo) {
                        case '1':
                            $tipo = 'Gastos';
                            break;
                        case '2':
                            $tipo = 'Egresos';
                            break;
                        default:
                    }
                ?>
                    data_table.push(["<?php echo $fecha; ?>",
                        "<?php echo $mes; ?>",
                        "<?php echo $descripcion; ?>",
                        "<?php echo $monto; ?>",
                        "<?php echo $tipo; ?>",
                        "<?php echo $categoria; ?>",
                        "<?php echo $sucursal; ?>"
                    ]);
                <?php
                }
                ?>
                break;
            case "Gastos por dia":
                <?php
                $queryList = mysqli_query($conn3, "SELECT * FROM S_GE_nuevo where tipo = 2 and fecha = '$fecha'");
                $nrowl = mysqli_num_rows($queryList);
                while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                    $fecha = $rowMotorizado["fecha"];
                    $mes = $rowMotorizado["mes"];
                    $descripcion = $rowMotorizado["descripcion"];
                    $monto = $rowMotorizado["monto"];
                    $tipo = $rowMotorizado["tipo"];
                    $categoria = $rowMotorizado["categoria"];
                    $sucursal = $rowMotorizado["sucursal"];
                    switch ($tipo) {
                        case '1':
                            $tipo = 'Gastos';
                            break;
                        case '2':
                            $tipo = 'Egresos';
                            break;
                        default:
                    }
                ?>
                    data_table.push(["<?php echo $fecha; ?>",
                        "<?php echo $mes; ?>",
                        "<?php echo $descripcion; ?>",
                        "<?php echo $monto; ?>",
                        "<?php echo $tipo; ?>",
                        "<?php echo $categoria; ?>",
                        "<?php echo $sucursal; ?>"
                    ]);
                <?php
                }
                ?>
                break;
            case "Gastos por categoria":
                var idCategoria = "<?php echo $idCategoria; ?>";
                console.log(idCategoria);
                <?php
                $queryList = mysqli_query($conn3, "SELECT * from S_GE_categorias as sgc, S_GE_nuevo as sgn where  sgn.categoria = sgc.id and sgn.categoria = '$idCategoria'");
                $nrowl = mysqli_num_rows($queryList);
                while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                    $fecha = $rowMotorizado["fecha"];
                    $mes = $rowMotorizado["mes"];
                    $descripcion = $rowMotorizado["descripcion"];
                    $monto = $rowMotorizado["monto"];
                    $tipo = $rowMotorizado["tipo"];
                    $categoria = $rowMotorizado["categoria"];
                    $sucursal = $rowMotorizado["sucursal"];
                    switch ($tipo) {
                        case '1':
                            $tipo = 'Gastos';
                            break;
                        case '2':
                            $tipo = 'Egresos';
                            break;
                        default:
                    }
                ?>
                    data_table.push(["<?php echo $fecha; ?>",
                        "<?php echo $mes; ?>",
                        "<?php echo $descripcion; ?>",
                        "<?php echo $monto; ?>",
                        "<?php echo $tipo; ?>",
                        "<?php echo $categoria; ?>",
                        "<?php echo $sucursal; ?>"
                    ]);
                <?php
                }
                ?>
                break;
            default:
                break;
        }
    </SCRIPT>

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