<?php session_start();
include 'funciones/conn3.php';

function funcionMaster($filtro, $campoFiltrar, $campoImprimir, $tabla)
{
    include 'funciones/conn3.php';
    $query = mysqli_query($conn3, "SELECT * FROM $tabla where $campoFiltrar = '$filtro'");
    $nrowl = mysqli_num_rows($query);
    while ($row = mysqli_fetch_array($query)) {

        $text = $row[$campoImprimir];
    }
    return $text;
}

$desde = $_POST['desde'];
$hasta = $_POST['hasta'];
$usuario_id = $_POST['usuario_id'];

header('Content-Type: application/vnd.ms-excel; charset=UTF-8');
header('Content-Disposition: attachment; filename=ReporteOdontograma_' . $desde . '_' . $hasta . '.xls');

$Cliente = $_POST['Cliente'];

echo "<table border='1' cellpadding='2' cellspacing='0' width='100%'>";
echo "<tr>";
echo "<td>Fecha</td>
        <td>Hora</td>
        <td>Usuario</td>
        <td>Procedimiento</td>
        <td>Diente</td>
        <td>Detalles</td>";
echo "</tr>";


// $QueryOdontogramaMaster = mysqli_query($conn3, "SELECT * FROM OD_OdontogramaMasterDetalle WHERE cliente_id = '$Cliente' AND usuario_id = '$usuario_id' AND (Fecha BETWEEN '{$desde}' AND '{$hasta}') ORDER BY id DESC");
$QueryOdontogramaMaster = mysqli_query($conn3, "SELECT * FROM OD_OdontogramaMasterDetalle WHERE cliente_id = '$Cliente' AND (usuario_id = '{$_SESSION['ID']}' or usuario_id = '{$_SESSION['ID_principal']}') AND (Fecha BETWEEN '{$desde}' AND '{$hasta}') ORDER BY id DESC");
while ($RowOdontogramaMaster = mysqli_fetch_array($QueryOdontogramaMaster)) {

    $SVG = funcionMaster(funcionMaster($RowOdontogramaMaster["Procedimiento"], 'id', 'Icono', 'OD_Procedimiento'), 'id', 'SVG', 'OD_Iconos_SVG');
    $Color = funcionMaster($RowOdontogramaMaster["Procedimiento"], 'id', 'Color', 'OD_Procedimiento');
    $SVG = str_replace('fill="currentColor"', 'fill="' . $Color . '"', $SVG);

    echo "<tr>
                    <td>
                        " . $RowOdontogramaMaster["Fecha"] . "
                    </td>
                    <td>
                        " . $RowOdontogramaMaster["Hora"] . "
                    </td>
                    <td>
                    " . funcionMaster($RowOdontogramaMaster["usuario_id"], 'ID', 'NOMBRE_USUARIO', 'usuarios') . "
                    </td>
                    <td>
                        " . funcionMaster($RowOdontogramaMaster["Procedimiento"], 'id', 'Nombre', 'OD_Procedimiento') . "
                    </td>
                    <td>
                        " . $RowOdontogramaMaster["Numero_Diente"] . "
                    </td>
                    <td>
                        " . $RowOdontogramaMaster["Detalle"] . "
                    </td>
                </tr>";
}

echo "</table>";


?>

<?php include 'PiedePaginasReportes.php'; ?>