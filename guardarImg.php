<?php
include 'funciones/funciones.php';
date_default_timezone_set('America/Bogota');

if ($_GET['idEliminar']) {
	$idEliminar = $_GET['idEliminar'];
	$borrar = mysqli_query($conn3, "DELETE from archivos2 where id = '$idEliminar'");
	if ($borrar) {
		echo json_encode("0");
	} else {
		echo json_encode("1");
	}
} else {
	if (empty($_POST['tit1']) || !isset($_POST['tit1'])) {
		$tit1 = "Sin Titulo";
	} else {
		$tit1 = $_POST['tit1'];
	}
	if (empty($_POST['desc1']) || !isset($_POST['desc1'])) {
		$desc1 = "Sin observación";
	} else {
		$desc1 = $_POST['desc1'];
	}
	if (empty($_POST['cliente_id']) || !isset($_POST['cliente_id'])) {
		$cliente_id = "Error";
	} else {
		$cliente_id = $_POST['cliente_id'];
	}
	$img1Name = $_FILES['img1']['name'];
	$img1type = $_FILES['img1']['type'];
	$img1tmpn = $_FILES['img1']['tmp_name'];
	$anDes = $_POST['anDes'];

	$carpeta = "img/historiaImg/";

	if (!file_exists($carpeta.$cliente_id)) {
		mkdir($carpeta.$cliente_id, 0777, true);
	}

	$carpeta = $carpeta.$cliente_id."/";



	if ($img1type == "image/tif" || $img1type == "image/pjp" || $img1type == "image/xbm" || $img1type == "image/jxl" || $img1type == "image/svgz" || $img1type == "image/jpg" || $img1type == "image/jpeg" || $img1type == "image/ico" || $img1type == "image/tiff" || $img1type == "image/gif" || $img1type == "image/svg" || $img1type == "image/jfif" || $img1type == "image/webp" || $img1type == "image/png" || $img1type == "image/bmp" || $img1type == "image/pjpeg" || $img1type == "image/avif") {
		@move_uploaded_file($img1tmpn, $carpeta.$img1Name);
		$Insert = mysqli_query($conn3, "INSERT into archivos2 (titulo1, descripcion1, img1, tipo, cliente_id) values ('$tit1', '$desc1', '$img1Name', '$anDes', '$cliente_id')");
		if ($Insert) {
			echo json_encode("0");
		} else {
			echo json_encode("1");
		}
		//echo json_encode("INSERT into archivos2 (titulo1, descripcion1, img1, tipo, cliente_id) values ('$tit1', '$desc1', '$img1Name', '$anDes', '$cliente_id')");
	} else {
		echo json_encode("Formato Invalido");
	}
}


?>