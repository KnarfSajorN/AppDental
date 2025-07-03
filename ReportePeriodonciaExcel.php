<?php

header('Content-Type: application/vnd.ms-excel;');
header('Content-Disposition: attachment; filename=ReportePeriodoncia_' . $desde . '_' . $hasta . '.xls');

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
$usuario_id = $_POST['ID'];

$tabla = "historia_1_historiadeperiodoncia66280610178";
$ColumnasInvisibles = ["id", "cliente_id", "usuario_id", "firma", "x93210633958", "x67065906013", "x20960949959", "x69018697815", "x9541429376", "x87274834837", "x3994912111", "x74100109478", "x68967688175", "x93985323494", "x87126183880", "x50906958621","x95477789035","x30389334898","x91694649175","x62703501521","x69060085977","x28310492567","x56242247899","x26420953444","x56198443908"];
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

        $QueryOdontologia = mysqli_query($conn3, "SELECT * FROM configTablaDetalle WHERE idTabla = '52' AND input_name = '{$Valor}' ");
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
from historia_1_historiadeperiodoncia66280610178 hc
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
