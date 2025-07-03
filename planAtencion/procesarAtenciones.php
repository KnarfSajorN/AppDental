<?php 
include '../funciones/conn3.php';
// var_dump($_POST);
// array(1) { ["datos"]=> array(6) { ["idCita"]=> string(1) "0" ["fechaVencimiento"]=> string(10) "2023-11-30" ["atenciones"]=> array(3) { [0]=> string(6) "Triaje" [1]=> string(16) "Consulta General" [2]=> string(13) "Examen Fisico" } ["idCliente"]=> string(3) "114" ["abierto"]=> string(1) "1" ["urlOrigen"]=> string(37) "/baseDev/SO_SalaControl?idCliente=114" } }

$where = '';
foreach ($_POST['datos'] as $key => $value) {
    // si es un arreglo
    if (is_array($value)){
        $where .= ' and '.$key.' = "';
        for ($i = 0; $i < count($value); $i ++){
            $where2 .= ''.$value[$i].'|/|';
        }
        $where .= substr($where2,0,-3).'" ';
    }else{
        $where .= ' and '.$key.' = "'.$value.'" ';
    }
}

$query = "SELECT * from planes_atencion 
where 1=1
$where
";
$result = mysqli_query($conn3, $query);
$rowResult = mysqli_fetch_assoc($result);
// var_dump($rowResult);

if ($rowResult != null){
    $idPlan = $rowResult['id'];
    $atenciones = explode('|/|', $rowResult['atenciones']);
    for ($i = 0; $i < count($atenciones); $i ++){
        $query = "INSERT into planes_atencion_detalle
        set
        idPlan = '{$idPlan}',
        atencion = '{$atenciones[$i]}'
        ";
        $result = mysqli_query($conn3, $query);
    }
}

// redireccionar a la pantalla que dice urlOrigen
header("Location: https://" . $_SERVER['SERVER_NAME'] . $_POST['datos']['urlOrigen']);
exit;



?>