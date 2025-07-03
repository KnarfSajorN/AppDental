<!-- Archivo para parametrizar las facturas acorde al cliente, by: JEFFER :D :D Todos los derechos reservados por copyright
Cualquier reproduccion total o parcial de lo aca expuesto infrige las normas de derechos de autor porque yo lo digo :V 
Multa: un machetazo 
-->
<!-- ************************************************** hpp digo, php :V ************************************************** -->


<?php
include 'header.php';
include 'menu.php';
// Recorrido de la tabla para obtener sus valores

$idUsuario = $_SESSION['ID'];
$queryList = mysqli_query($conn3, "SELECT * FROM serie_facturacion LIMIT 1"); // Limitar a una fila para obtener solo los nombres de las columnas
$rowMotorizado = mysqli_fetch_assoc($queryList);
$idSerieFacturacion = $rowMotorizado["idserie_facturacion"];
$queryValue = mysqli_query($conn3, "SELECT $columnName FROM serie_facturacion LIMIT 1");
$rowValue = mysqli_fetch_assoc($queryValue);
$columnValue = $rowValue[$columnName];
?>
<!-- ************************************************** FIN hpp digo, php :V ************************************************** -->

<!-- ************************************************** HTML ************************************************** -->

<div class="content-wrapper p-3">

    <section class="content">
        <div class="">
            <h3>Selecciona los items que deseas para el código de factura: </h3>

            <div class="row mt-5">
                <?php $first = true; ?>
                <?php foreach ($rowMotorizado as $columnName => $value) : ?>
                    <?php
                    // Realizar una consulta para obtener el valor de cada columna
                    $queryValue = mysqli_query($conn3, "SELECT $columnName FROM serie_facturacion LIMIT 1");
                    $rowValue = mysqli_fetch_assoc($queryValue);
                    $columnValue = $rowValue[$columnName]; // Obtener el valor de la base de datos
                    // Establecer el primer checkbox como marcado y deshabilitado
                    $checked = $first ? 'checked' : '';
                    $disabled = $first ? 'disabled' : '';
                    $first = false;
                    ?>
                    <div class="col-md-4">
                        <!-- Checkbox -->
                        <input type="checkbox" name="<?php echo $columnName; ?>" id="<?php echo $columnName; ?>" class="check-Box-Facturacion" onclick="mostrarSerialFactura(this)" data-value="<?php echo $columnValue; ?>" <?php echo $checked; ?> <?php echo $disabled; ?>>
                        <!-- Labels -->
                        <label for="<?php echo $columnName; ?>"><?php echo $columnName; ?></label>
                    </div>
                <?php endforeach; ?>
                <!-- Campo oculto para almacenar el valor de idserie_facturacion -->
                <input type="hidden" id="idserie_facturacion_hidden" name="idserie_facturacion" value="<?php echo $idSerieFacturacion; ?>">
            </div>
            <button name="btnGuardarConfiguracion" class="btn btn-primary" onclick="guardarDatos()">Guardar datos</button>



            <div class="factura">
                <div class="header">
                    <h1 id="numeroFactura">Factura</h1>
                    <p>Número de factura: </p>
                    <p>Fecha: 8 de diciembre de 2023</p>
                </div>
                <div class="detalle">
                    <table>
                        <thead>
                            <tr>
                                <th>Descripción</th>
                                <th>Cantidad</th>
                                <th>Precio unitario</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Producto 1</td>
                                <td>2</td>
                                <td>$10.00</td>
                                <td>$20.00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="total">
                    <p>Total a pagar: $20.00</p>
                </div>
            </div>
        </div>
    </section>
    <h5 class="clase-advertencia"> ** Si no se selecciona ningun valor, la factura sólo tendra el valor auto-incrementable. Ejemplo: Factura # 0000001 **</h5>
</div>

<!-- ************************************************** FIN HTML ************************************************** -->

<?php
include 'footer.php';
?>

<!-- ************************************************** JavaGodScripts ************************************************** -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        mostrarSerialFactura();
    });

    function guardarDatos() {
        var columnasSeleccionadas = mostrarColumnasSeleccionadas();
        var idSerieFacturacion = document.getElementById('idserie_facturacion_hidden').value;

        fetch('guardarConfiguracionFactura.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    columnasSeleccionadas: columnasSeleccionadas,
                    idUsuario: '<?php echo $idUsuario; ?>',
                    idSerieFacturacion: idSerieFacturacion // Enviar el valor del campo oculto
                }),
            })
            .then(function(response) {
                if (response.ok) {
                    console.log("Columnas seleccionadas: " + columnasSeleccionadas);
                } else {
                    console.error('Error al guardar los datos');
                }
            })
            .catch(function(error) {
                console.error('Error de red:', error);
            });
    }

    function mostrarColumnasSeleccionadas() {
        var columnasSeleccionadas = [];

        var checkboxes = document.querySelectorAll('.check-Box-Facturacion');

        checkboxes.forEach(function(checkbox) {
            if (checkbox.checked) {
                var columnName = checkbox.id;
                if (columnName !== 'idserie_facturacion') {
                    columnasSeleccionadas.push(columnName);
                }
            }
        });

        return columnasSeleccionadas;
    }

    function mostrarSerialFactura() {
        var codigoFactura = [];
        var tipoOperacionValue = '';

        var checkboxes = document.querySelectorAll('.check-Box-Facturacion');

        checkboxes.forEach(function(checkbox) {
            if (checkbox.checked) {
                var value = checkbox.getAttribute('data-value');
                var columnName = checkbox.id;

                if (columnName === 'tipoOperacion' && tipoOperacionValue === '') {
                    tipoOperacionValue = value;
                } else if (columnName !== 'idserie_facturacion') {
                    codigoFactura.push(value);
                }
            }
        });

        // Agregar el valor de tipoOperacion al principio
        if (tipoOperacionValue !== '') {
            codigoFactura.unshift(tipoOperacionValue);
        }

        // Obtener el valor de idserie_facturacion y agregarlo al final
        checkboxes.forEach(function(checkbox) {
            if (checkbox.id === 'idserie_facturacion' && checkbox.checked) {
                var value = checkbox.getAttribute('data-value');
                codigoFactura.push(value);
            }
        });

        var numeroFactura = document.getElementById('numeroFactura');
        if (numeroFactura) {
            var facturaText = 'Número de factura: ';
            if (codigoFactura.length > 0) {
                facturaText += codigoFactura.join('');
            }
            numeroFactura.textContent = facturaText; // Mostrar los valores con guiones según la lógica
        }
        console.log('Valores seleccionados: ', codigoFactura);
        return codigoFactura;
    }
</script>

<!-- ************************************************** FIN  JavaGodScripts ************************************************** -->


<!-- ************************************************** Estilos CSS ************************************************** -->

<style>
    .clase-advertencia {
        color: red;
    }

    .check-Box-Facturacion {
        width: 20px;
        height: 20px;
        margin: 30px;
        display: inline-block;
        vertical-align: middle;
        transform: scale(1.5);
    }

    .check-Box-Facturacion+label {
        font-size: 22px;
    }

    .factura {
        background-color: #fff;
        width: 80%;
        margin: 20px auto;
        border: 1px solid #ccc;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .header h1 {
        margin-top: 0;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    .table th,
    .table td {
        border: 1px solid #ccc;
        padding: 8px;
    }

    .total {
        text-align: right;
        font-weight: bold;
    }
</style>
<!-- ************************************************** FIN Estilos CSS ************************************************** -->