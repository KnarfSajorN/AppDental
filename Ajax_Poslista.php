<?php
include("funciones/conn3.php");

$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));

if(!isset($_POST['searchTerm'])){ 
  $fetchData = mysqli_query($conn3,"select id,descripcion,formafarmaceutica  from pos order by codigo limit 1000");
}else{ 
  $search = $_POST['searchTerm'];   
  $fetchData = mysqli_query($conn3,"select id,descripcion,formafarmaceutica from pos where id like '%".$search."%' OR descripcion like '%".$search."%' limit 100  ");
} 

$data = array();
while ($row = mysqli_fetch_array($fetchData)) {    

  $data[] = array("id"=>$row['id'], "text"=>$row['id'].' - '.utf8_encode($row['descripcion']));
}

echo json_encode($data,JSON_UNESCAPED_UNICODE);

?>