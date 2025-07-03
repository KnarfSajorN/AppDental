<?php

// bucle de 10000 registros para guardarlo en un arreglo


for ($i=0; $i < 10000; $i++) { 
    $data[] = $i;
}

//mostrar el arreglo
echo "<pre>";
echo print_r($data);
echo "</pre>";


include 'funciones/conn3.php';
//mysqli_set_charset($conn3, "utf8");
$col = ['id','Nombre'];

$sql = "SELECT * FROM RM_Medicamentos ";

$query = mysqli_query($conn3, $sql);
$totalData = mysqli_num_rows($query);
$totalFilter = $totalData;

$query = mysqli_query($conn3, $sql);
$data = array();
while ($row = mysqli_fetch_array($query)) {
    $subdata = array();
    foreach ($col as $key => $value) {
        //$subdata[$value]=utf8_encode($row["$value"]);
        $subdata[$value] = $row["$value"];
        //echo $row["$value"] .'<br>';
    }

    $data[] = $subdata;
}

$json_data = array(
    "draw"              =>  intval($request['draw']),
    "recordsTotal"      =>  intval($totalData),
    "recordsFiltered"   =>  intval($totalFilter),
    "data"              =>  $data
);

echo "<pre>";
print_r($json_data) ;
echo "</pre>";

?>
