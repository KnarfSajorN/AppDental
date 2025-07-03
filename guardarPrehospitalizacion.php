<?php  
include 'funciones/funciones.php';
// include 'funciones/funcionesUtilidades.php';
include 'funciones/conn3.php';

$horaRegistro = $_POST['horaRegistro'];
$motivoPrehospitalizacion = $_POST['motivoPrehospitalizacion'];
$validarPostHosp = $_POST['validarPostHosp'];
$fecha = date("Y-m-d");
$usuario_id = $_POST['usuario_id'];
$cliente_id = $_POST['cliente_id'];
$otrasAtenciones = $_POST['otrasAtenciones'];
$antecedentesRelevantes = $_POST['antecedentesRelevantes'];
$medicamentosActuales = $_POST['medicamentosActuales'];
$procedimientosPrevios = $_POST['procedimientosPrevios'];
$examenesRecientes = $_POST['examenesRecientes'];




$campoAtenciones = '';
$campoAtenciones .= $otrasAtenciones;

mysqli_query($conn3, "INSERT INTO ingresoPrehospitalizacion(fechaRegistro,horaRegistro,motivoPrehospitalizacion,atenciones,antecedentesRelevantes,medicamentosActuales,procedimientosPrevios,
examenesRecientes,usuario_id,cliente_id) VALUES('$fecha','$horaRegistro','$motivoPrehospitalizacion','$campoAtenciones','$antecedentesRelevantes','$medicamentosActuales','$procedimientosPrevios','$examenesRecientes' ,'$usuario_id','$cliente_id')");
$queryMaximaPre = mysqli_query($conn3, "SELECT MAX(idPreH) FROM ingresoPrehospitalizacion");
foreach ($queryMaximaPre as $tablePreHosp) {
	$maxIdPre = $tablePreHosp['MAX(idPreH)']; 
}

echo $validarPostHosp;

if ($validarPostHosp == "Si") {
	echo "<script>window.location.href='ingresoHospitalizacion.php?cI=". encrypt($cliente_id)."'</script>";
}else{
	echo "<script>window.location.href='imprimirPrehospitalizacion.php?idPre=".encrypt($maxIdPre)."'</script>";
}




?>