<?php
session_start();
include 'funciones/conn3.php';
//mysqli_set_charset($conn3, "utf8");
$usuarioId = $_SESSION['ID'];
$idPrincipal = $_SESSION['ID_principal'];
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

$query = mysqli_query($conn3, "SELECT * FROM auditor WHERE idUsuario = '$idPrincipal' ORDER BY ID DESC Limit 100");
$totalData = mysqli_num_rows($query);
$totalFilter = $totalData;

$col = ["idUsuario","tipo","ip", "fechahora","accion"];

$query = mysqli_query($conn3, "SELECT * FROM auditor WHERE idUsuario = '$idPrincipal'  ORDER BY ID DESC Limit 100");
$data = array();
while ($row = mysqli_fetch_array($query)) {
    $subdata = array();
    foreach ($col as $key => $value) {
        if ($value == "fechahora") {
            list($Fecha, $Hora) = explode(" ", $row["fecha"]);

            $subdata["Fecha"] = $Fecha;
            $subdata["Hora"] = $Hora;
        }elseif ($value == "idUsuario") {
            $subdata[$value] = funcionMaster($row["$value"],'ID','NOMBRE_USUARIO','usuarios');
        }
        elseif ($value == "tipo") {
            switch ($row["$value"]) {
                case "2":
                    $subdata[$value] = "Ruta";
                break;
                case "1":
                    $subdata[$value] = "Querys[Inserciones/Actualizaciones]";
                break;
            }
        }
        else{
            $subdata[$value] = $row["$value"];
        }
        
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
