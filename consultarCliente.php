<?php
date_default_timezone_set('America/Bogota');
include("conexiones/conexion.php");
include("funciones/conexiones.php");
include("funciones/funciones.php");
$con=conectar();
$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));

 
$clienteId 		= $_POST['clienteId']; 
 

/*
	echo '<h6><table border="1"   style="undefined;table-layout: fixed; width: 100%">
  		<tr> <th> <font size="1"> Hora</font> </th><th><font size="1">Nombre</font></th><th><font size="1">Motivo</font></th> </tr>';
*/ 
		$queryList=mysqli_query($conn3,"SELECT MAX(Fecha) as Fecha from historiaClinica1 where  cliente_id = '$clienteId'");
	    $nrowl=mysqli_num_rows($queryList);
	    while($rowMotorizado=mysqli_fetch_array($queryList))
	    {
		  $Fecha      =$rowMotorizado['Fecha'];
		  /*
		  echo '<tr> <th><font size="1">'.$Hora .' </font></th><th><font size="1">'.$nombre .'</font></th><th><font size="1">'.$motivoConsulta .'</font></th> </tr>';

		  */
	    }
    
if ($Fecha > '01-01-1900') 
{
	echo 'La ultima consulta fue en la fecha: '.$Fecha;
}
else
{
	echo 'El paciente no tiene registrado ninguna consulta';
}
	
 
 ?>