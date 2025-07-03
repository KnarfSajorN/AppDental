<?php
include 'funciones/funciones.php';
include 'funciones/conn3.php';

$ID_principal = $_POST['ID_principal'];
$tipo = $_POST['tipo'];

$queryList = "SELECT * FROM MaestroRecordatorio 
where 1=1
and activo = 1
and tipo = '$tipo'
and ID_principal = $ID_principal
";

$resultList = mysqli_query($conn3, $queryList);
if($resultList){
    if(mysqli_num_rows($resultList) > 0){
    //quiero devolver true como boleano en el ajax 
       echo json_encode( true);
    }else{
        echo json_encode(false);
    }
}

?>