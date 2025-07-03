<?php
include 'funciones/funciones.php';
include 'funciones/funcionesUtilidades.php';   
include 'configFunciones.php';

$clienteId = $_GET['clienteId'];
$idHistoria = $_GET['idHistoria'];
$Nombre_table = $_GET['Nombre_table'];
$table = $_GET['Tabla'];
$id = $_GET['id'];
$file = $_GET['file'];


$queryListhc=mysqli_query($conn3,"SELECT $Nombre_table FROM $table where id = $id");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $field=$rowhc[$Nombre_table];
              }

                $result = explode("|", $field);

if (file_exists($result[$file])) {
    unlink($result[$file]);
    echo 'OK';
  } else {
    echo 'Err';
  }
				
                unset($result[$file]);

                $new = '';
				foreach($result AS $key=>$data){
				  if($data != ''){
				    $new .= '|'.$data;
				  }
				}

  mysqli_query($conn3,"UPDATE $table SET $Nombre_table = '$new' WHERE id =$id");
          
echo "<script language='Javascript'> window.location='configHistoriaClinica.php?clienteId=$clienteId&idHistoria=$idHistoria&id=$id';</script>"; 
?>