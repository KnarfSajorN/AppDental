<?php
include 'funciones/conn3.php';
//mysqli_set_charset($conn3, "utf8");

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


$query = mysqli_query($conn3, "SELECT * FROM w_mensajes ORDER BY id DESC Limit 100");
$totalData = mysqli_num_rows($query);
$totalFilter = $totalData;

$col = ["id","mensaje","tipo","fechaHora","numeroCliente"];

$query = mysqli_query($conn3, "SELECT * FROM w_mensajes ORDER BY id DESC Limit 100");
$data = array();
while ($row = mysqli_fetch_array($query)) {
    $subdata = array();
    foreach ($col as $key => $value) {
        if ($value == "fechaHora") {
            list($Fecha, $Hora) = explode(" ", $row["fechaHora"]);

            $subdata["Fecha"] = $Fecha;
            $subdata["Hora"] = $Hora;
        }
        elseif ($value == "tipo") {
            switch ($row["$value"]) {
                case "0":
                    $subdata[$value] = "Envió";
                break;
                case "1":
                    $subdata[$value] = "Respuesta";
                break;
            }
        }
        elseif ($value == "mensaje") {
            $subdata[$value] = utf8_encode(wordwrap($row["$value"], 70, "\n", true));
            //ANTES => $subdata[$value] =wordwrap($row["$value"], 70, "\n", true); SE TUVO QUE COLOCAR UN UTF8 ENCODE PORQUE ESTABA ROMPIENDO EL JSON
        }
        elseif ($value == "numeroCliente") {
            $subdata[$value] = $row["$value"];

            $NombreDestinatario="Número No Registrado";
            $whatsapp = $row["$value"];
            $whatsappdesactivado = $row["$value"]."/*0*/";
            $querycliente = mysqli_query($conn3, "SELECT * FROM cliente where whatsapp = '$whatsapp' OR whatsapp = '$whatsappdesactivado'");
            while ($RowCliente = mysqli_fetch_array($querycliente)){
                $NombreDestinatario = $RowCliente['nombre_cliente'];
            }
            $subdata["Nombre_Destinatario"] = $NombreDestinatario;
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
