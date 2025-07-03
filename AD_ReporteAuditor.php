<?php

header('Content-Type: application/vnd.ms-excel; charset=UTF-8');
header('Content-Disposition: attachment; filename=ReporteAuditor.xls');
include 'funciones/conn3.php';
$IdUsuarioP = $_SESSION['ID_principal'];
function funcionMaster($filtro, $campoFiltrar, $campoImprimir, $tabla)
{
    include 'funciones/conn3.php';
    $query = mysqli_query($conn3, "SELECT * FROM $tabla where $campoFiltrar = '$filtro'");
    $nrowl = mysqli_num_rows($query);
    while ($row = mysqli_fetch_array($query)) {

        $text = $row[$campoImprimir];
    }
    return  $text;
}

$desde = $_POST['desde'];
$hasta = $_POST['hasta'];

//desde y hasta con el formato d/m/a


$Ip = $_POST['Ip'];
$Accion = $_POST['Accion'];
$Usuario = $_POST['Usuario'];

$fechaHoy = date("Y-m-d");


echo '<table border="1" cellpadding="2" cellspacing="0" width="100%">
    <tr>
        <th>Usuario</th>
        <th>Tipo</th>
        <th>Ip</th>
        <th>Fecha</th>
        <th>Hora</th>
        <th>Url</th>
        <th>Query</th>
    </tr>';

$Querys = "";

if ($Ip != "") {
    $Querys .= " AND ip = '$Ip' ";
}

if ($Accion != "Todas") {
    $Querys .= " AND tipo='$Accion' ";
}

if ($Usuario != "Todos") {
    $Querys .= " AND idUsuario = '$Usuario' ";
}

//echo "<tr><td>SELECT * FROM auditor WHERE (fecha BETWEEN '$desde 00:00:00' and '$hasta 23:59:59') $Querys  ORDER BY ID</td></tr>";
$queryListaH = mysqli_query($conn3, "SELECT * FROM auditor WHERE  (fecha BETWEEN '$desde 00:00:00' and '$hasta 23:59:59') $Querys  ORDER BY ID DESC");
while ($RowAuditor = mysqli_fetch_array($queryListaH)) {

    $Usuario = funcionMaster($RowAuditor["idUsuario"], 'ID', 'NOMBRE_USUARIO', 'usuarios');
    $Tipo = "";
    switch ($RowAuditor["tipo"]) {
        case "2":
            $Tipo = "Ruta";
            break;
        case "1":
            $Tipo = "Querys[Inserciones/Actualizaciones]";
            break;
    }
    $Ip = $RowAuditor["ip"];

    list($Fecha, $Hora) = explode(" ", $RowAuditor["fecha"]);

    $Accion = $RowAuditor["accion"];
    $query = $RowAuditor["query"];
    echo "  <tr>
        <td>$Usuario </td>
        <td>$Tipo </td>
        <td>$Ip</td>
        <td>$Fecha</td>
        <td>$Hora</td>
        <td>$Accion</td>
        <td>$query</td>
        </tr>";
}


echo "</table>";

?>
  <?php include 'PiedePaginasReportes.php'; ?>