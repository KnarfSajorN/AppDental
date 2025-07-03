<?php
$desde = $_POST['desde'];
$hasta = $_POST['hasta'];
header('Content-Type: application/vnd.ms-excel;');
header('Content-Disposition: attachment; filename=ReporteOdontograma_' . $desde . '_' . $hasta . '.xls');

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


$usuario_id = $_POST['ID'];

$tabla = "historia_1_historiadeodontologia94374718321";
$ColumnasInvisibles = ["id", "cliente_id", "usuario_id", "firma", "x2169182603", "x32602966655", "x128035601", "x69018697815", "x78106806144", "x72738494503", "x96023073535"];
$queryTabla = mysqli_query($conn3, "SHOW COLUMNS FROM $tabla");
while ($RowTabla = mysqli_fetch_array($queryTabla)) {
    if (!in_array($RowTabla["Field"], $ColumnasInvisibles)) {
        $Columnas[] = $RowTabla["Field"];
    }
}


echo "<table border='1' cellpadding='2' cellspacing='0' width='100%'>";
echo "<tr>";
echo "<td>Nombre</td>";
foreach ($Columnas as $key => $value) {
    $Valor = $value;
    $Titulo = "";
    if ($Valor == "Fecha" or $Valor == "Hora") {
        $Titulo = $value;
    } else {

        $QueryOdontologia = mysqli_query($conn3, "SELECT * FROM configTablaDetalle WHERE idTabla = '51' AND input_name = '{$Valor}' ");
        while ($RowOdontologia = mysqli_fetch_array($QueryOdontologia)) {
            $Titulo = utf8_decode($RowOdontologia['div_nombre_campo']);
        }
    }

    echo "<td>$Titulo</td>";
}
echo "</tr>";


$QueryHistoria = mysqli_query($conn3, "select hc.*,
us.NOMBRE_USUARIO as doctor ,
cl.nombre_cliente as paciente ,
cl.CODI_CLIENTE as cedula 
from historia_1_historiadeodontologia94374718321 hc
left join usuarios us on hc.usuario_id = us.ID 
left join cliente cl on hc.cliente_id = cl.cliente_id 
where cl.ID_principal = '{$usuario_id}'
 AND (Fecha BETWEEN '{$desde}' AND '{$hasta}') ORDER BY id DESC");
while ($Rowhistoria = mysqli_fetch_array($QueryHistoria)) {

    echo "<tr>";
    echo "<td>
                " . funcionMaster($Rowhistoria["cliente_id"], "cliente_id", "nombre_cliente", "cliente") . "
                </td>";
    foreach ($Columnas as $key => $value) {
        echo "<td>
                " . $Rowhistoria[$value] . "
                </td>";
    }
    echo "</tr>";
}

echo "</table>";
