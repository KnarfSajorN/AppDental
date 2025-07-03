<?php
require_once __DIR__. '/../funciones/funciones.php';
date_default_timezone_set('America/Bogota');

$Tabla = "OBT_Imagenes";
$QueryTable = "CREATE TABLE IF NOT EXISTS $Tabla (
	id int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
	titulo1 TEXT NULL, 
	descripcion1 TEXT NULL, 
	img1 TEXT NULL,
	categoria TEXT NULL,
	sub_categoria TEXT NULL,
	cliente_id INT (11) NOT NULL,
	activo INT (1) NOT NULL DEFAULT 1
)";

mysqli_query($conn3, $QueryTable) or die("Error al crear tabla " . mysqli_error($conn3)); 

if ($_GET['idEliminar']) {
	$idEliminar = $_GET['idEliminar'];
	$borrar = mysqli_query($conn3, "UPDATE {$Tabla} SET activo='0' WHERE id = '$idEliminar' LIMIT 1");
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




	// Verificar si se han enviado archivos
	if (!empty($_FILES['img1']['name'][0])) {
		$carpeta = "OBT_Images/";

		// Crear la carpeta si no existe
		if (!file_exists($carpeta . $cliente_id)) {
			mkdir($carpeta . $cliente_id, 0777, true);
		}

		$carpeta = $carpeta . $cliente_id . "/";

		// Iterar sobre cada archivo
		foreach ($_FILES['img1']['name'] as $key => $name) {
			$img1Name = date("Ymd_His") ."_" . $_FILES['img1']['name'][$key];
			$img1type = $_FILES['img1']['type'][$key];
			$img1tmpn = $_FILES['img1']['tmp_name'][$key];
			$categoria = $_POST["categoria"];
			$subcategoria = $_POST["subcategoria"];

			// $anDes = $_POST['anDes'];

			// Lista de tipos de archivos permitidos
			$allowedTypes = ["image/tif","image/pjp","image/xbm","image/jxl","image/svgz","image/jpg","image/jpeg","image/ico","image/tiff","image/gif","image/svg","image/jfif","image/webp","image/png","image/bmp","image/pjpeg","image/avif"
			];

			// Verificar si el tipo de archivo es permitido
			if (in_array($img1type, $allowedTypes)) {
				// Mover el archivo a la carpeta de destino
				if (@move_uploaded_file($img1tmpn, $carpeta . $img1Name)) {
					
					
					
					// Insertar la información del archivo en la base de datos
					$Insert = mysqli_query($conn3, "INSERT INTO {$Tabla} SET 
													titulo1 = '$tit1',
													descripcion1 = '$desc1',
													img1 = '$img1Name',
													categoria = '$categoria',
													sub_categoria = '$subcategoria',
													cliente_id = '$cliente_id' 
											");
					if ($Insert) {
						echo "0"; // Éxito
					} else {
						echo "1"; // Error en la inserción
					}
				} else {
					echo "Error al mover el archivo";
				}
			} else {
				echo "Formato Inválido";
			}
		}
	} else {
		echo "No se han subido archivos";
	}
}
