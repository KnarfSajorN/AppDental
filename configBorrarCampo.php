<?php
include 'funciones/funciones.php';
include 'funciones/funcionesUtilidades.php';   
include 'configFunciones.php';

$Nombre_table = $_GET['Nombre_table'];
$Nombre_campo = $_GET['campo'];
$idTablas = $_GET['Tabla'];

 $queryDetalle=mysqli_query($conn3,"DELETE FROM configTablaDetalle where idTabla = $idTablas AND input_name = '$Nombre_campo'");


              $queryListhc=mysqli_query($conn3,"SELECT name FROM configTablas where id = $idTablas");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $name=$rowhc['name'];
              }   


 mysqli_query($conn3,"ALTER TABLE $name DROP COLUMN $Nombre_campo");


echo "<script language='Javascript'> window.location='configFormulario.php?Nombre_table=$Nombre_table&Tabla=$idTablas';</script>"; 
?>