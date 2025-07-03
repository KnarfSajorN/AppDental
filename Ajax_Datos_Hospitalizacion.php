<?php
include 'funciones/conn3.php';

$idHospitalizacion = $_POST['idHospitalizacion'];
$queryH = mysqli_query($conn3, "SELECT * FROM hoIngresoHospitalizacion WHERE idHospitalizacion='$idHospitalizacion'");
//echo "SELECT * FROM hoIngresoHospitalizacion WHERE idHospitalizacion='$idHospitalizacion'";

$arrayDatosHospitalizacion = array();

foreach ($queryH as $key) {
$arrayDatosHospitalizacion['idHospitalizacion'] = $key['idHospitalizacion'];
 $arrayDatosHospitalizacion['fechaIngreso'] = $key['fechaIngreso'];
 $arrayDatosHospitalizacion['horaIngreso'] = $key['horaIngreso'];
 $arrayDatosHospitalizacion['fechaSalida'] = $key['fechaSalida'];
 $arrayDatosHospitalizacion['horaSalida'] = $key['horaSalida'];
 $arrayDatosHospitalizacion['motivoHospitalizacion'] = $key['motivoHospitalizacion'];
 $arrayDatosHospitalizacion['diagnosticoHospitalizacion'] = $key['diagnosticoHospitalizacion'];
 $arrayDatosHospitalizacion['diagnosticoCIE_10'] = $key['diagnosticoCIE_10'];
 $arrayDatosHospitalizacion['tratamiento'] = $key['tratamiento'];
 $arrayDatosHospitalizacion['procedimientos'] = $key['procedimientos'];
 $arrayDatosHospitalizacion['pisoSelect'] = $key['pisoSelect'];
 $arrayDatosHospitalizacion['habitacionSelect'] = $key['habitacionSelect'];
 $arrayDatosHospitalizacion['camillaSelect'] = $key['camillaSelect'];
 $arrayDatosHospitalizacion['hospitalizacionActiva'] = $key['hospitalizacionActiva'];
 $arrayDatosHospitalizacion['cliente_id'] = $key['cliente_id'];
 $arrayDatosHospitalizacion['usuarioId'] = $key['usuarioId'];


 $piso = $key['pisoSelect'];
 $habitacion = $key['habitacionSelect'];
 $camilla = $key['camillaSelect'];

$cliente = $key['cliente_id'];

$queryCliente = mysqli_query($conn3, "SELECT nombre_cliente FROM cliente WHERE cliente_id = '$cliente'");
foreach ($queryCliente as $tablaCliente) {
    $nombre_cliente = $tablaCliente['nombre_cliente'];
}

$queryPiso = mysqli_query($conn3, "SELECT despcripcion FROM ho_piso WHERE id = '$piso'");
foreach ($queryPiso as $tablaPiso) {
    $nombre_piso = $tablaPiso['despcripcion'];
}

$queryHab = mysqli_query($conn3, "SELECT descripcion FROM ho_habitaciones WHERE idHabitacion = '$habitacion'");
foreach ($queryHab as $tablaHab) {
    $nombre_hab = $tablaHab['descripcion'];
}

$queryCam = mysqli_query($conn3, "SELECT descripcion FROM ho_camilla WHERE idCamilla = '$camilla'");
foreach ($queryCam as $tablaHab) {
    $nombre_Cam = $tablaHab['descripcion'];
}




$arrayDatosHospitalizacion['nombre_cliente'] = $nombre_cliente;

$arrayDatosHospitalizacion['nombre_piso'] = $nombre_piso;
$arrayDatosHospitalizacion['nombre_hab'] = $nombre_hab;
$arrayDatosHospitalizacion['nombre_Cam'] = $nombre_Cam;

}


echo json_encode($arrayDatosHospitalizacion);
