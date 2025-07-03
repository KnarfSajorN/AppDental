<?php
include("funciones/conn3.php");
/*
$ansi_2 = array("\u00c0","\u00c1","\u00c2","\u00c3","\u00c4","\u00c5","\u00c6","\u00c7","\u00c8","\u00c9","\u00ca","\u00cb","\u00cc","\u00cd","\u00ce","\u00cf","\u00d1","\u00d2","\u00d3","\u00d4","\u00d5","\u00d6","\u00d8","\u00d9","\u00da","\u00db","\u00dc","\u00dd","\u00df","\u00e0","\u00e1","\u00e2","\u00e3","\u00e4","\u00e5","\u00e6","\u00e7","\u00e8","\u00e9","\u00ea","\u00eb","\u00ec","\u00ed","\u00ee","\u00ef","\u00f0","\u00f1","\u00f2","\u00f3","\u00f4","\u00f5","\u00f6","\u00f8","\u00f9","\u00fa","\u00fb","\u00fc","\u00fd","\u00ff");

$utf8_2 = array("À","Á","Â","Ã","Ä","Å","Æ","Ç","È","É","Ê","Ë","Ì","Í","Î","Ï","Ñ","Ò","Ó","Ô","Õ","Ö","Ø","Ù","Ú","Û","Ü","Ý","ß","à","á","â","ã","ä","å","æ","ç","è","é","ê","ë","ì","í","î","ï","ð","ñ","ò","ó","ô","õ","ö","ø","ù","ú","û","ü","ý","ÿ");
*/
//$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));

if(!isset($_POST['searchTerm'])){ 
  $fetchData = mysqli_query($conn3, "select codigo,descripcion from cie10 where LENGTH(codigo)=4 order by codigo limit 1000");
}else{ 
  $search = $_POST['searchTerm'];   
  $fetchData = mysqli_query($conn3,"select codigo,descripcion from cie10 where (codigo like '%".$search."%' OR descripcion like '%".$search. "%') AND LENGTH(codigo)=4 limit 100");
} 

$data = array();
while ($row = mysqli_fetch_array($fetchData)) {    
  //$data[] = array("id"=>$row['codigo'], "text"=>$row['codigo'].' - '.str_replace($ansi_2, $utf8_2,utf8_encode($row['descripcion'])));
  $data[] = array("id"=>$row['codigo'], "text"=>$row['codigo'].' - '.utf8_encode($row['descripcion']));
}

echo json_encode($data,JSON_UNESCAPED_UNICODE);

?>