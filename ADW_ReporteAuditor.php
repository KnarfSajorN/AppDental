<style type="text/css">
    <!--
    .xl65 {
        mso-style-parent: style0;
        mso-number-format: "\@";
    }
    -->
</style>
<?php

header('Content-Type: application/vnd.ms-excel; charset=UTF-8');
header('Content-Disposition: attachment; filename=ReporteAuditorMensajesWhatsApp.xls');
include 'funciones/conn3.php';

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


$NumeroCliente = $_POST['NumeroCliente'];
$Accion = $_POST['Accion'];
$Usuario = $_POST['Usuario'];

$fechaHoy = date("Y-m-d");


echo '<table border="1" cellpadding="2" cellspacing="0" width="100%">
    <tr>
        <th>#</th>
        <th>Mensaje</th>
        <th>Tipo</th>
        <th>Fecha</th>
        <th>Hora</th>
        <th>Numero Cliente</th>
        <th>Nombre Destinatario</th>
    </tr>';

$Querys = "";

if ($NumeroCliente != "") {
    $Querys .= " AND NumeroCliente = '$NumeroCliente' ";
}

if ($Accion != "Todas") {
    $Querys .= " AND tipo='$Accion' ";
}


//echo "<tr><td>SELECT * FROM auditor WHERE (fecha BETWEEN '$desde 00:00:00' and '$hasta 23:59:59') $Querys  ORDER BY ID</td></tr>";
$queryListaH = mysqli_query($conn3, "SELECT * FROM w_mensajes WHERE (fechaHora BETWEEN '$desde 00:00:00' and '$hasta 23:59:59') $Querys  ORDER BY ID DESC");
while ($RowAuditor = mysqli_fetch_array($queryListaH)) {

    $id = $RowAuditor['id'];
    $Mensaje = utf8_decode(wordwrap($RowAuditor["mensaje"], 70, "\n", true));
    $Tipo = "";
    switch ($RowAuditor["tipo"]) {
        case "0":
            $Tipo = utf8_decode("Envió");
            break;
        case "1":
            $Tipo = utf8_decode("Respuesta");
            break;
    }


    list($Fecha, $Hora) = explode(" ", $RowAuditor["fechaHora"]);

    $numeroCliente = " " . $RowAuditor["numeroCliente"];

    $NombreDestinatario = "Número No Registrado";
    $whatsapp = $RowAuditor["numeroCliente"];
    $whatsappdesactivado = $RowAuditor["numeroCliente"] . "/*0*/";
    $querycliente = mysqli_query($conn3, "SELECT * FROM cliente where whatsapp = '$whatsapp' OR whatsapp = '$whatsappdesactivado'");
    while ($RowCliente = mysqli_fetch_array($querycliente)) {
        $NombreDestinatario = $RowCliente['nombre_cliente'];
    }
    $Nombre_DestinatarioFinal = utf8_decode($NombreDestinatario);


    echo "<tr>
        <td>$id</td>
        <td>$Mensaje </td>
        <td>$Tipo</td>
        <td>$Fecha</td>
        <td>$Hora</td>
        <td class='xl65' >$numeroCliente</td>
        <td>$Nombre_DestinatarioFinal</td>
        </tr>";
}


echo "</table>";

?>

<?php include 'PiedePaginasReportes.php'; ?>