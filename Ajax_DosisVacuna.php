<?php
date_default_timezone_set('America/Bogota');
include("funciones/conn3.php");
include("funciones/funciones.php");

$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));

    $id_listavacunas = $_POST['id_listavacunas'];
    $id_cliente = $_POST['id_cliente'];

    $dosis =  (int) funcionMaster($id_listavacunas,'id','Dosis','listado_vacunas');
    $dosis_letra = funcionMaster($id_listavacunas,'id','Dosis','listado_vacunas');
    $grupo = funcionMaster($id_listavacunas,'id','Id_Grupo','listado_vacunas');
    $vacuna = funcionMaster($id_listavacunas,'id','Id_Vacuna','listado_vacunas');








    if($dosis == "0" )
    {
    	   /*
    		$queryinv=mysqli_query($conn3,"SELECT * FROM  vacunas_aplicadas where  Id_Lista_Vacuna = '$id_listavacunas' AND Id_Cliente='$id_cliente' AND Dosis_Aplicada='$dosis_letra' limit 1");
    		$nrowl=mysqli_num_rows($queryinv);
    		while($RowLista=mysqli_fetch_array($queryinv))
    		{

    			$id=$RowLista['id'];
    			$nombre_vacuna=$RowLista['Nombre_Vacuna'];
    			$Nombre_Grupo=$RowLista['Nombre_Grupo'];
    			$Dosis_Aplicada=$RowLista['Dosis_Aplicada'];

    			//se pone el id que se genera en la vacuna
    			echo '<option value="'.$Dosis_Aplicada.'" disabled>'.$Dosis_Aplicada.' Dosis </option>' ;

    		}
    		if($nrowl=="0")
    		{
    		*/
    			echo '<option value="'.$dosis_letra.'">'.$dosis_letra.' Dosis </option>';
    		//}

    }




    else 
    {
    
    	for ($i = 1; $i <= $dosis; $i++) 
    	{


  


$queryList=mysqli_query($conn3,"SELECT * FROM  dosis where vacuna='$vacuna' and grupo = '$grupo' and dosis='$i'");
$nrowlD=mysqli_num_rows($queryList);



    if ($nrowlD == '') { $letras='Refuerzo';}

	$queryinv=mysqli_query($conn3,"SELECT * FROM  vacunas_aplicadas where  Id_Lista_Vacuna = '$id_listavacunas' AND Id_Cliente='$id_cliente' AND Dosis_Aplicada='$i' limit 1");
    		$nrowl=mysqli_num_rows($queryinv);
    		//echo '<option value="'.$i.'">'.$nrowl.'/'."SELECT * FROM  vacunas_aplicadas where  Id_Lista_Vacuna = $'id_listavacunas' AND Id_Cliente='$id_cliente' AND Dosis_Aplicada='$i' limit 1".' </option>';
    		while($RowLista=mysqli_fetch_array($queryinv))
    		{

    			$id=$RowLista['id'];
    			$nombre_vacuna=$RowLista['Nombre_Vacuna'];
    			$Nombre_Grupo=$RowLista['Nombre_Grupo'];

    			//se pone el id que se genera en la vacuna
    	  
    			echo '<option value="'.$i.'" disabled>'.$i.' Dosis </option>' ;

    		}

    		if($nrowl=="0")
    		{
    			echo '<option value="'.$i.'">'.$i.' '. $letras.' Dosis </option>';
    		}
    	}

    }
 
   
   
 
?>