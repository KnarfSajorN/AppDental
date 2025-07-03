<?php

$desde = $_POST['desde'];
$hasta = $_POST['hasta'];
header('Content-Type: application/vnd.ms-excel;');
header('Content-Disposition: attachment; filename=ReporteEndodoncia_' . $desde . '_' . $hasta . '.xls');

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

$tabla = "historia_1_historiadeendodoncia87480223521";
$ColumnasInvisibles = ["id", "cliente_id", "usuario_id", "firma", "x89686163548", "x4240025076", "x26990921866", "x34507639290", "x38122551156", "x19435416348", "x95626374650", "x39442754247", "x89681595178", "x5386805611", "x96689154091", "x92947635406","x17612822001","x59156620125","x61365805823","x54221772260","x555224004","x89971235473","x94721922089","x79254360782","x26709151490","x84837714344","x64196608928","x32535114351","x59958064171","x8052564298","x55354595028","x98847072371","x26315027350","x89625622321","x70777126904","x197232413","x52996983067","x66895454944","x50676542671","x9483164172","x89336453148","x57665293906","x7053663387","x53159025622","x77646600047","x2161103017","x24175050855","x9529115803","x26960662799","x96527995335","x48737606784","x43157852467","x16401185968","x8264358825","x19296613227","x26155823325","x48891596268","x4041185665","x22942513007","x23778083242","x80133020758","x49349698158","x16042631958","x77596549216","x87485728644","x18295747130","x36782211640","x66176936084","x58649445725","x24345642407","x42955935645","x3090797630","x54573401116","x33526368969","x52194894132","x31531442765","x1106198757","x66920768041","x39585135067","x67342926340","x62658614396","x19388949142"];
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

        $QueryOdontologia = mysqli_query($conn3, "SELECT * FROM configTablaDetalle WHERE idTabla = '54' AND input_name = '{$Valor}' ");
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
from historia_1_historiadeendodoncia87480223521 hc
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
