<?php
include("funciones/conn3.php");

$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));

$NombreTablas=$_POST["NombreTablas"];
$idTabla=$_POST["idTabla"];
$Texto=$_POST["Texto"];
$Campos = explode(",", $Texto);

if(!isset($_POST['searchTerm'])){
  $Query="select {$idTabla},{$Texto}  from {$NombreTablas} order by codigo limit 1000";
  $fetchData = mysqli_query($conn3,$Query);
}else{ 
  $search = $_POST['searchTerm'];
  foreach ($Campos as $key => $value) {
      $Filtro.= "OR {$value} like '%".$search."%' ";
  }  
  $Query="select {$idTabla},{$Texto} from {$NombreTablas} where {$idTabla} like '%".$search."%' {$Filtro} limit 100 ";
  $fetchData = mysqli_query($conn3,$Query);
} 

$data = array();
while ($row = mysqli_fetch_array($fetchData)) {
  $Texto="";  
  foreach ($Campos as $key => $value) {
      $Texto.= " - ".$row["{$value}"];
  } 
  $Texto=trim($Texto,' - ');
  $data[] = array("id"=>$row["{$idTabla}"], "text"=>$Texto);
}

echo json_encode($data,JSON_UNESCAPED_UNICODE);

?>