<?php
date_default_timezone_set('America/Bogota');
 
include("funciones/funciones.php");
 
$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));

$clienteId 		= $_POST['clientepos']; 
$name 		= $_POST['codigoProd']; 

 


  echo '<div class="col-md-12"> <select  name="codigoProd" id="codigoProd"  class="form-control input-lg select2" style="width: 100%;"  >';
                    

		$queryList=mysqli_query($conn3,"SELECT * FROM pos WHERE descripcion LIKE '%$clienteId%' or codigo LIKE '%$clienteId%'");

	//echo	"SELECT * FROM pos WHERE descripcion LIKE '%$clienteId%' or codigo LIKE '%$clienteId%'";
	    $nrowl=mysqli_num_rows($queryList);
	    while($rowMotorizado=mysqli_fetch_array($queryList))
	    {
		  $codigo      =$rowMotorizado['codigo'];
		  $descripcion      =$rowMotorizado['descripcion'];
		  $concentra     =$rowMotorizado['formafarmaceutica'];
		  
          echo "<option value='$descripcion - $concentra'> $descripcion  /  $concentra</option>";


	    }
    echo '</select></div>';

 
	
 
 ?>