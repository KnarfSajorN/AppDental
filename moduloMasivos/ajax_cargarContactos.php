<?php
include '../funciones/conn3.php';
// cargar todos los contactos de la tabla ws_contactos
$losqueNo = $_POST['losqueNo'];
$query = "SELECT * from ws_contactos 
where 
1=1
and activo = 1 
and numero <> 0
and id not in ($losqueNo)
";
// var_dump($query);
$result = mysqli_query($conn3, $query);
while ($row = mysqli_fetch_assoc($result)) {
    $array[] = $row;
}


echo json_encode($array);
