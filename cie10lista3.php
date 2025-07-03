<?php

date_default_timezone_set('America/Bogota');

 

include("funciones/funciones.php");

 

$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));



 

$clienteId 		= $_POST['clienteId']; 

$name 		= $_POST['name']; 



 





  echo '<div class="col-md-9"><select id="clienteId" name="diagnostico3" class="form-control select2" style="width: 100%;"  >';

                    



		$queryList=mysqli_query($conn3,"SELECT * FROM cie10 WHERE descripcion LIKE '%$clienteId%' or codigo LIKE '%$clienteId%'");

	    $nrowl=mysqli_num_rows($queryList);

	    while($rowMotorizado=mysqli_fetch_array($queryList))

	    {

		  $codigo      =$rowMotorizado['codigo'];

		  $descripcion      =$rowMotorizado['descripcion'];

		  

          echo "<option value='$codigo - $descripcion'>  $codigo - $descripcion</option>";





	    }

    echo '</select></div>';



 

	

 

 ?>