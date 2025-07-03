<?php
date_default_timezone_set('America/Bogota');
include("funciones/funcionesUtilidades.php");
include("funciones/funciones.php");
include "funciones/conn3.php";




$dosis1 = $_POST['cantidadosis'];
$tiempo_dosis = $_POST['tiempo_dosis'];
$tiempo_dosis1 = $_POST['tiempo_dosis1'];
$tiempo_dosis2 = $_POST['tiempo_dosis2'];
$vacuna = $_POST['vacuna'];
$esquema_vacunacion = $_POST['esquema_vacunacion'];





$queryUsuario2 = "INSERT INTO dosis (dosis, tiempoMeses, tiempoAnos, grupo, vacuna, tiempoDias) 
                        VALUES ('$dosis1', '$tiempo_dosis', '$tiempo_dosis1','$esquema_vacunacion', '$vacuna', '$tiempo_dosis2')";



mysqli_query($conn3, $queryUsuario2);




echo '<h6><table border="1" style="undefined;table-layout: fixed; width: 100%">
<tr><th>  Dosis </th> <th> Tiempo de aplicación </th> ';
$cont = 0;
$queryList = mysqli_query($conn3, "SELECT * FROM  dosis  where grupo = '$esquema_vacunacion'  and vacuna ='$vacuna' and activo = 1");

//echo "SELECT * FROM  operacionRecetario  where usuario_id = '$usuario_id'  and cliente_id ='$idcliente' and idReceta= '$idR'";
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
	$cont++;
	$idOper1     = $rowMotorizado['id'];
	$dosis = $rowMotorizado['dosis'];
	$meses   = $rowMotorizado['tiempoMeses'];
	$anos = $rowMotorizado['tiempoAnos'];
	$dias = $rowMotorizado['tiempoDias'];

	if ($meses <> 100) {
		$var = 'Meses';
		$tiempo = $meses;
	}
	if ($anos <> 100) {
		$var = 'Años';
		$tiempo = $anos;
	}
	if ($dias <> 100) {
		$var = 'Dias';
		$tiempo = $dias;
	}

	if ($dosis < 10) {
		$noD = $dosis . ' Dosis';
	}
	//else if($dosis == 6 ) {$noD='Dosis única';} 
	//else if($dosis == 7 ) {$noD='Refuerzo';} 
	//else  {$noD='Dosis Anual';} 


	echo '<tr>     
<th> <input type="hidden"  value="' . $idOper1 . '" class="form-control input-lg" id="idOper' . $cont . '" name="idOper" >   <a href="#"  onclick="eliminarItem(' . $cont . ',' . $esquema_vacunacion . ',' . $vacuna . ');"> <font size="5"> <strong>  <i class="fa fa-trash"></i>   </strong>  </font> </a> ' . $noD . ' </th> <th>' . $tiempo . ' ' . $var . ' </th> 
	';
}


echo '</table></h6>';
