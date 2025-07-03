<?php 
session_start(); 
date_default_timezone_set('America/Bogota');
include("../funciones/funciones.php");

$fecha=date("Y-m-d");
$hora=date("H:i:s");
$usuario_id=$_SESSION['ID'];

if ($_POST) {
	$codigo=$_POST['codigo'];
	$Tipo=$_POST['Tipo'];
	$Descripcion=$_POST['Descripcion'];
	$Detalle=$_POST['Detalle'];
	$c1=0+$_POST['c1'];
	$c2=0+$_POST['c2'];
	$c3=0+$_POST['c3'];
	$c4=0+$_POST['c4'];
	$c5=0+$_POST['c5'];
	$c6=0+$_POST['c6'];
	$tap=0+$_POST['tap'];
	$ppc=0+$_POST['ppc'];
	$SaldoInicial = $_POST['SaldoInicial'];


	$cuenta_id=$_POST['cuenta_id'];
	echo$cuenta_id;

	echo "Registro Cuentas Contables<br>";

	if ($cuenta_id<>'') {
	// update
	// echo"paso update";
		mysqli_query($conn3,"UPDATE CCuentas set
			descripcion='$Descripcion',
			detalle='$Detalle',
			fechaReg='$fecha',
			horaReg='$hora',
			tipo_actividad='$Tipo',
			c1='$c1',
			c2='$c2',
			c3='$c3',
			c4='$c4',
			c5='$c5',
			c6='$c6',
			tap='$tap',
			ppc='$ppc',
			saldo_inicial='$SaldoInicial'
			where id='$cuenta_id'");
		echo '<script>window.location="../ccPlandeCuentas";alert("Registro Actualizado")</script>';
	}else{
	//registro
	// echo"paso registro";
		mysqli_query($conn3,"INSERT into CCuentas
			(id, descripcion, detalle, fechaReg, horaReg, ajuste_fiscal, saldo_inicial, saldo_actual, ccosto_fijo, ccosto, tipo_actividad, c1, c2, c3, c4, c5, c6, tap, ppc)
			values 
			('$codigo','$Descripcion','$Detalle','$fecha','$hora','0','$SaldoInicial','0','0','0','$Tipo','$c1','$c2','$c3','$c4','$c5','$c6','$tap','$ppc')") or die(mysqli_error($conn3));
		echo '<script>window.location="../ccPlandeCuentas";alert("Registro Creado")</script>';
	}

}

if ($_GET) {
	$codigo=base64_decode($_GET['a']);
	$tipo=$_GET['t'];
	echo"UPDATE CCuentas set
			activo='$tipo'
			where id='$codigo'";
	mysqli_query($conn3,"UPDATE CCuentas set
			activo='$tipo'
			where id='$codigo'");
		 echo '<script>window.location="../ccPlandeCuentas";alert("Registro Actualizado")</script>';
}







?>