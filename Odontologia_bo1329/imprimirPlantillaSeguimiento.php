<?php
date_default_timezone_set('America/Bogota');

require_once "../funciones/funciones.php";
require_once "../funciones/funcionesUtilidades.php";

$idHistoria = decrypt($_GET['id']);

$QueryHistoria = "SELECT * FROM OBT_Seguimiento WHERE id = '$idHistoria' ";
$ResultHistoria = mysqli_query($conn3, $QueryHistoria);
$RowHistoria = mysqli_fetch_assoc($ResultHistoria);

$QueryCliente = "SELECT * FROM cliente WHERE cliente_id = '{$RowHistoria["cliente_id"]}' ";
$ResultCliente = mysqli_query($conn3, $QueryCliente);
$RowCliente = mysqli_fetch_assoc($ResultCliente);

$CODI_CLIENTE = $RowCliente["CODI_CLIENTE"];


$valoresNoValidos = [0, "0", "", null, false];

?>
<!-- Enlace CDN para Font Awesome 6 -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<table class="border">
    <tr class="border">
        <th class="text-center border" colspan="3">Datos personales</th>
        <th class="text-left border">No. Sg.</th>
        <td class="text-left">#000<?= $idHistoria ?></td>
    </tr>
    <tr>
        <th class="text-center">Apellido Paterno</th>
        <th class="text-center">Apellido Materno</th>
        <th class="text-center">Nombres</th>
        <th class="text-center">Edad</th>
        <th class="text-center">Sexo</th>
    </tr>
    <tr>
        <td class="text-center"><?= $RowCliente["primer_apellido"] ?></td>
        <td class="text-center"><?= $RowCliente["segundo_apellido"] ?></td>
        <td class="text-center"><?= $RowCliente["primer_nombre"] . $RowCliente["segundo_nombre"]  ?></td>
        <td class="text-center"><?= CalculoEdadPaciente($RowCliente["fechaNacimiento"])  ?></td>
        <td class="text-center"><?= $RowCliente["genero"] ?></td>
    </tr>
    <tr>
        <th class="text-center" colspan="2">Lugar y Fecha de Nacimiento</th>
        <th class="text-center">Ocupacion</th>
        <th class="text-center">Direccion</th>
        <th class="text-center">Telefono-Celular</th>
    </tr>
    <tr>
        <td class="text-center" colspan="2"><?= $RowCliente["lugarNacimiento"] ?>, <?= $RowCliente["fechaNacimiento"] ?></td>
        <td class="text-center"><?= $RowCliente["ocupacion"] ?></td>
        <td class="text-center"><?= $RowCliente["direccion"] ?></td>
        <td class="text-center"><?= $RowCliente["telefono"] ?></td>
    </tr>
</table>



<div class="row">
    <table>
        <thead>
            <tr>
                <th colspan="12" style="text-align:center">Seguimiento</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $fields = [
                //? Label = [elementType, inputName, col, typeInput]
                "Fecha de Inicio del tratamiento" => ["input", "fecha_inicio_tratamiento", "6", "date"],
                "Conclusión" => ["input", "conclusion", "6", "text"],
                "Aparatología" => ["textarea", "aparatologia", "12", "text"],
                "Monto total del tratamiento $" => ["input", "monto_total_usd", "6", "text"],
                "Monto total del tratamiento Bs" => ["input", "monto_total_bs", "6", "text"],
                "Cuota inicial" => ["input", "cuota_inicial", "6", "text"],
                "Cuota mensual" => ["input", "cuota_mensual", "6", "text"],
                "Observaciones" => ["textarea", "observaciones", "12", "text"],
            ];

            $totalColumnas = 0; // Para llevar un registro de las columnas usadas en la fila actual

            foreach ($fields as $label => $dataInput) {
                $tipoElemento = $dataInput[0];
                $name = $dataInput[1];
                $col = (int)$dataInput[2]; // Convertir a entero
                $type = $dataInput[3];
                $valorDB = $RowHistoria[$name];

                // Si la suma de columnas supera 12, cerramos la fila actual y comenzamos una nueva
                if ($totalColumnas + $col > 12) {
                    echo "</tr><tr>"; // Cierra la fila actual y abre una nueva
                    $totalColumnas = 0; // Reinicia el contador de columnas
                }

                // Si es la primera celda de la fila, abrimos una nueva fila
                if ($totalColumnas === 0) {
                    echo "<tr>";
                }

                // Imprimir la celda con el colspan correspondiente
                echo "<td colspan='$col'>";
                echo "<p><b>". $label .": </b> ".$valorDB ."</p>";

                echo "</td>";

                // Actualizar el contador de columnas
                $totalColumnas += $col;

                // Si la suma de columnas es 12, cerramos la fila actual
                if ($totalColumnas === 12) {
                    echo "</tr>";
                    $totalColumnas = 0; // Reinicia el contador de columnas
                }
            }

            // Si queda una fila abierta, la cerramos
            if ($totalColumnas > 0) {
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <table>
        <thead>
            <tr>
                <th colspan="6" style="text-align:center">Detalle</th>
            </tr>
            <tr>
                <th>Operación realizada</th>
                <th>Costo</th>
                <th>A/cuenta</th>
                <th>Saldo</th>
                <th>Fecha</th>
                <th>Firma</th>
            </tr>
        </thead>
        <tbody id="detalle-seguimiento">
            <?php 
            $QueryDetalle = "SELECT * FROM OBT_SeguimientoDetalle WHERE seguimiento_id = '$idHistoria' ";
            $ResultDetalle = mysqli_query($conn3, $QueryDetalle);
            if ($ResultDetalle) {
                foreach ($ResultDetalle as $RowDetalle) { ?>
                <tr>
                    <td><?=$RowDetalle["operacion_realizada"]?></td>
                    <td><?=number_format($RowDetalle["costo"], 2)?></td>
                    <td><?=$RowDetalle["a_cuenta"]?></td>
                    <td><?=number_format($RowDetalle["saldo"], 2)?></td>
                    <td><?=$RowDetalle["fecha"]?></td>
                    <td></td>
                </tr>
                <?php }
            }

            ?>
        </tbody>

    </table>

    <?php  if ($RowHistoria["firma"] <> "") { ?>
        <table>
            <thead>
                <tr>
                    <th style="text-align: center;">Firma</th>
                </tr>
            </thead>
            <tbody>
                <tr style="margin:0 !important; padding:0 !important">
                    <td style="text-align:center; margin:0 !important; padding:0 !important">
                        <img src="<?=$RowHistoria["firma"]?>" style="margin:0 !important; padding:0 !important; max-height:100px" alt="Firma">
                        <p style="border-top: 1px solid black;text-align:center; margin:0 !important; padding:0 !important"><?=$RowCliente["primer_nombre"]?></p>
                    </td>
                </tr>
            </tbody>
        </table>
    <?php } ?> 


</div>

<style>
    table {
        border-collapse: collapse;
        border: 1px solid black !important;
        width: 98% !important;
        margin-bottom: 5px !important;
        margin-top: 5px !important;
        padding: 0 !important;
    }

    table tr {
        border-bottom: 1px solid black !important;
        border-right: 1px solid black !important;
        padding: 0 !important;
        padding-left: 5px !important;
        padding-right: 5px !important;
        margin: 0 !important;
    }

    table th {
        border-bottom: 1px solid black !important;
        border-right: 1px solid black !important;
        padding: 0 !important;
        padding-left: 5px !important;
        padding-right: 5px !important;
        margin: 0 !important;
    }

    table td {
        border-bottom: 1px solid black !important;
        border-right: 1px solid black !important;
        padding: 0 !important;
        padding-left: 5px !important;
        padding-right: 5px !important;
        margin: 0 !important;
    }

    p {
        margin: 0;
    }

    .text-center {
        text-align: center !important;
    }

    .text-left {
        text-align: left !important;
    }
</style>