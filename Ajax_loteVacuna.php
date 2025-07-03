<?php
date_default_timezone_set('America/Bogota');
include("funciones/conn3.php");
include("funciones/funciones.php");

$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));

    $id_listavacunas = $_POST['id_listavacunas'];


		$queryinv=mysqli_query($conn3,"SELECT * FROM  listado_vacunas where  id= '$id_listavacunas' ");
		$nrowl=mysqli_num_rows($queryinv);
		
		while($RowLista=mysqli_fetch_array($queryinv))
		{

		
		$id_vac=$RowLista['Id_Vacuna']; }

    
 echo '<option value=""> Seleccione... </option>';



		$queryinv=mysqli_query($conn3,"SELECT * FROM  lotes where  id_vacuna = '$id_vac' and cantidad > 0");
		$nrowl=mysqli_num_rows($queryinv);
		
		while($RowLista=mysqli_fetch_array($queryinv))
		{

		
		$idlote=$RowLista['ID'];
		$lote=$RowLista['descripcion'];
		$cant=$RowLista['cantidad'];
		
		echo '<option value="'.$idlote.'">'.$lote.' | '.$cant.' </option>';

		}

		
 
   
   
 
?>