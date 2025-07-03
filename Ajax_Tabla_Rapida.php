<?php
include 'funciones/conn3.php';
//mysqli_set_charset($conn3, "utf8");
$col = $_POST["columnas"];

$sql = $_POST["query"];

$query = mysqli_query($conn3, $sql);
$totalData = mysqli_num_rows($query);
$totalFilter = $totalData;

$query = mysqli_query($conn3, $sql);
$data = array();
while ($row = mysqli_fetch_array($query)) {
    $subdata = array();
    foreach ($col as $key => $value) {
        if ($value == "estado") {
            $cliente_id = $row["cliente_id"];
            $historial = mysqli_query($conn3, "SELECT * FROM historialIngreso WHERE cliente_id = '{$cliente_id}' ORDER BY id DESC LIMIT 1");
            $nrowO = mysqli_num_rows($historial);
            if ($historial) {
                if ($nrowO > 0) {
                    $historial = mysqli_fetch_assoc($historial);
                    $origen = mysqli_query($conn3, "SELECT * FROM estadosIngreso WHERE id = '{$historial['tipoIngreso']}'")->fetch_assoc();
                    $texto = $historial['nombreIngreso'];
                    if ($origen['campoActivo'] == 1 && $historial['descripcion'] != "") {
                        $texto .= (empty($historial['nombreCampo']) ? '' : "\n" . $historial['nombreCampo'] . ":") . "\n" . $historial['descripcion'];
                    }
                    $texto .= "\nFI: " . $historial['fechaInicio'];
                    $texto .= "\nFF: " . $historial['fechaFin'];
                    $row["$value"] = "<a href='#estado' align='center' title='{$texto}'><i class='fas fa-circle' style='color:{$origen['color']}'></i> </a>";
                } else {
                    $row["$value"] = "N/A";
                }
            }
        }
        $subdata[$value] = $row["$value"];
    }

    $data[] = $subdata;
}

$json_data = array(
    "draw"              =>  intval($request['draw']),
    "recordsTotal"      =>  intval($totalData),
    "recordsFiltered"   =>  intval($totalFilter),
    "data"              =>  $data
);

echo json_encode($json_data, JSON_UNESCAPED_UNICODE);
