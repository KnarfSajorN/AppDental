<?php 
include 'funciones/funciones.php';
include 'funciones/conn3.php';

$planSeleccionado = $_POST['menu'];
$arrayMenus = [];
$queryList = mysqli_query($conn3, "SELECT * FROM grupos where id = $planSeleccionado");
$rowList = mysqli_fetch_assoc($queryList);
$arrayArreglo = $rowList['Arreglo_Grupos'];
$arrayArreglo = json_decode($arrayArreglo, true);
$arrayArreglo = array_map('intval', $arrayArreglo);



foreach ($arrayArreglo as $key => $value) {
    $rowMenu = funcionMaster($value, 'id', 'Nombre_Grupo', 'Grupos_Menu');
  
    $arrayMenus[$value] = $rowMenu;
}
echo json_encode($arrayMenus);

?>