<?php
date_default_timezone_set('America/Bogota');
include("funciones/conn3.php");


// $conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));

 $id_listavacuna 	= $_POST['id_listavacuna'];

 echo '<option value=""> Seleccione... </option>';
 
 $queryinv=mysqli_query($conn3,"SELECT * FROM  listado_vacunas where  Id_Grupo = $id_listavacuna");
 $nrowl=mysqli_num_rows($queryinv);
 while($RowLista=mysqli_fetch_array($queryinv))
 {

 $id=$RowLista['id'];
 $nombre_vacuna=$RowLista['Nombre_Vacuna'];
 $Nombre_Grupo=$RowLista['Nombre_Grupo'];
 $lote='lote';
 //se pone el id que se genera en la vacuna
 echo '<option value="'.$id.'">'.$nombre_vacuna.'</option>';

 }
   
   
 
?>