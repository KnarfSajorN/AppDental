<?php

include "funciones/conn3.php";
include "funciones/funciones.php";

// $paticas_id			= 	$_POST['paticas_id'];
$sesionusuario			= 	$_POST['ID'];
$paciente			= 	$_POST['clienteId'];
$fechar                = date("Y-m-d");
$hora                  = date("H:i:s");

$form1	= $_POST['servicio'];
$form2	= $_POST['ingreso'];
$form3	= $_POST['fecHAI'];
$form4	= $_POST['horai'];

$form6	= $_POST['egreso'];
$form7	= $_POST['fechaE'];
$form8	= $_POST['horaE'];
$form9	= $_POST['peso'];
$form10	= $_POST['talla'];
$form11	= $_POST['fc'];
$form12	= $_POST['fr'];
$form13	= $_POST['ta'];
$form14	= $_POST['profe'];
$form15	= $_POST['consultam'];
$form16	= $_POST['enferactual'];
$form17	= $_POST['antec'];
$form18	= $_POST['psico'];
$form19	= $_POST['diagno'];
$form20	= $_POST['conducta"'];
$form21	= $_POST['cambios'];
$form22	= $_POST['diagEgreso'];
$form23	= $_POST['otroD'];
$form24	= $_POST['SALIDAP'];
$form25	= $_POST['recomenda'];
$form26 = $_POST['nomP'];
$form27	= $_POST['FIRMAp'];

if($form8 == ""){
	$form8 = "00:00:00";
}

mysqli_query($conn3, "INSERT INTO historiaClinicaEpic
SET 
	  cliente_id = '$paciente',
    fecha = '$fechar',
    hora = '$hora',
	usuario_id = $sesionusuario,
    servicio = '$form1',
    ingreso = '$form2',
    fecHAI = '$form3',
    horai = '$form4',
    egreso = '$form6',
    fechaE = '$form7',
    horaE = '$form8',
    peso = '$form9',
    talla = '$form10',
    fc = '$form11',
    fr = '$form12',
    ta = '$form13',
    profe = '$form14',
    consultam = '$form15',
    enferactual = '$form16',
    antec = '$form17',
    psico = '$form18',
    diagno = '$form19',
    conducta = '$form20',
    cambios = '$form21',
    diagEgreso = '$form22',
    otroD = '$form23',
    SALIDAP = '$form24',
    recomenda = '$form25',
    nomP = '$form26',
    FIRMAp = '$form27';
") or die(mysqli_error($conn3));


$idHist = mysqli_insert_id($conn3);


/////////////////////////////////////////





if (strlen($form1) > 1) {
	$f1 = '<tr><td> Servicio:' . $form1 . '</td></tr>';
}
if (strlen($form2) > 1) {
	$f2 = '<tr><td> Servicio de Ingreso:' . $form2 . '</td>';
}
if (strlen($form3) > 1) {
	$f3 = '<td> Fecha de ingreso:' . $form3 . '</td>';
}
if (strlen($form4) > 1) {
	$f4 = '<td> Hora de Ingreso:' . $form4 . '</td></tr>';
}
if (strlen($form6) > 1) {
	$f6 = '<tr><td> Servicio de Egreso:' . $form6 . '</td>';
}
if (strlen($form7) > 1) {
	$f7 = '<td>Fecha de Egreso: ' . $form7 . '</td>';
}
if (strlen($form8) > 1) {
	$f8 = '<td>Hora de Egreso: ' . $form8 .  '</td></tr><tr><th colspan="4" class="text-center"> DEL INGRESO</th></tr>';
} else {
	$form8 = '<td>     </td></tr><tr><th colspan="4" class="text-center"> DEL INGRESO</th></tr>';
}

if (strlen($form9) > 1) {
	$f9 = '<tr><td> Peso:' . $form9 . '</td>';
}
if (strlen($form10) > 1) {
	$f10 = '<td> Talla: ' . $form10 . '</td>';
}
if (strlen($form11) > 1) {
	$f11 = '<td> FC:' . $form11 . '</td>';
}
if (strlen($form12) > 1) {
	$f12 = '<td> FR:' . $form12 . '</td>';
}
if (strlen($form13) > 1) {
	$f13 = '<td> TA:' . $form13 . '</td>';
}
if (strlen($form14) > 1) {
	$f14 = '<td>Profesional: ' . $form14 . '</td></tr><tr><th colspan="4" class="text-center"> DEL INGRESO</th></tr>';
} else {
	$form14 = '<td>     </td></tr><tr><th colspan="4" class="text-center"> DEL INGRESO</th></tr>';
}

if (strlen($form15) > 1) {
	$f15 = '<tr><td>Motivo de la consulta: ' . $form15 . '</td></tr>';
}
if (strlen($form16) > 1) {
	$f16 = '<tr><td>Enfermedad Actual: ' . $form16 . '</td>';
}
if (strlen($form17) > 1) {
	$f17 = '<td>Antecedentes Personales: ' . $form17 . '</td></tr>';
}
if (strlen($form18) > 1) {
	$f18 = '<tr><td> Examen Psicológico:' . $form18 . '</td>';
}
if (strlen($form19) > 1) {
	$f19 = '<td>Diagnostico: ' . $form19 . '</td>';
}
if (strlen($form20) > 1) {
	$f20 = '<td> Conducta:' . $form20 . '</td></tr><tr><th colspan="4" class="text-center"> DE LA EVOLUCIÓN</th></tr>';
} else {
	$form20 = '<td>     </td></tr><tr><th colspan="4" class="text-center">DE LA EVOLUCIÓN</th></tr>';
}
if (strlen($form21) > 1) {
	$f21 = '<td>     </td></tr><tr><th colspan="4" class="text-center">DE LA EVOLUCIÓN</th></tr><tr><td>Cambios del estado del paciente (Complicaciones, accidentes o eventos adversos): ' . $form21 . '</td></tr>';;
} else {
	$form21 = '<td>     </td></tr><tr><th colspan="4" class="text-center"> DEL EGRESO</th></tr>';
}
if (strlen($form22) > 1) {
	$f22 = '<tr><td>DIAGNÓSTICO PRINCIPAL:' . $form22 . '</td></tr>';
}
if (strlen($form23) > 1) {
	$f23 = '<tr><td>OTROS DIAGNÓSTICOS: ' . $form23 . '</td></tr>';
}
if (strlen($form24) > 1) {
	$f24 = '<tr><td>CONDICIONES DE LA SALIDA DEL PACIENTE: ' . $form24 . '</td></tr>';
}
if (strlen($form25) > 1) {
	$f25 = '<tr><td> RECOMENDACIONES:' . $form25 . '</td></tr><tr><th colspan="4" class="text-center"></th></tr>';
} else {
	$form21 = '<td>     </td></tr><tr><th colspan="4" class="text-center"></th></tr>';
}

if (strlen($form26) > 1) {
	$f26 = '<tr><td> Nombre y Apellido:' . $form26 . '</td></tr>';
}
if (strlen($form27) > 1) {
	$f27 = '<tr><td> Firma y Número de Registro:' . $form27 . '</td>';
}


$controle7 = '<table class="table table-bordered"><tr>' . $f1 . $f2 . $f3 . $f4 . $f5 . $f6 . $f7 . $f8 . $f9 . $f10 . $f11 . $f12 . $f13 . $f14 . $f15 . $f16 . $f17 . $f18 . $f19 . $f20 . $f21 . $f22 . $f23 . $f24 . $f25 . $f26 . $f27 . '</tr></table>';


mysqli_query($conn3, "UPDATE historiaClinicaEpic 
SET    
    tipo_control = '$tipo_control',
    detalle = '$controle7'
WHERE
	ID = '$idHist'") or die(mysqli_error($conn3));
$idHistoria = mysqli_insert_id($conn3);
echo "<script language='JavaScript'> window.location='configFinalizadoEpic.php?iC=" . $idHist . "';</script>";