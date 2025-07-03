<?php
require_once __DIR__. '/../funciones/funciones.php';
date_default_timezone_set('America/Bogota');

$cliente_id = $_GET['cliente_id'];

$Tabla = "OBT_Imagenes";
$cons = mysqli_query($conn3, "SELECT * from {$Tabla} where cliente_id = '$cliente_id' AND activo='1'");
$resc = mysqli_fetch_array($cons);

?>
<style>
/* Botón danger */
.css-button-sharp--green3 {
    min-width: 130px;
    height: 40px;
    color: #fff;
    padding: 5px 10px;
    font-weight: bold;
    cursor: pointer;
    transition: all 0.3s ease;
    position: relative;
    display: inline-block;
    outline: none;
    border: 2px solid #bd2130;
    background: #bd2130;
	border-radius: 30px;
	text-align: center;
}

.css-button-sharp--green3:hover {
    background: #fff;
    color: #bd2130
}
</style>
<?php
if ($cons) {
	$img_postura_corporal;
	$img_fotos_boca;
	$img_fotos_cara;
	$img_fotos_modelos;


	foreach ($cons as $index => $resc) {

		if (trim($resc['categoria']) == 'Postura corporal') {$ntipo = "Postura Corporal";
			$img_postura_corporal .= '<div class="col-md-12">
			<div class="card card-primary">
				<div class="card-header"><h6 style="text-align:center">'.$resc['sub_categoria'].'</h6></div>
				<div class="card-body" style="align-self: center;">
				<img src="'.$Base.'Odontologia_bo1329/OBT_Images/'.$cliente_id.'/'.$resc["img1"].'" class="card-img-top w-100" title="'.$resc["titulo1"].'" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-content="'.$resc["fechaRef"].' - '.$resc["descripcion1"].'" style="width: 100%; height: 10rem; border-radius: 0.5rem;">					
				</div>
				<div class="card-footer">	
				<a href="javascript:Eliminar('.$resc["id"].')" class="css-button-sharp--green3">Eliminar</a>
				</div>
			</div>	
		</div>';		
		}
		if (trim($resc['categoria']) == 'Fotos de cara') {$ntipo = "Cara";
			$img_fotos_cara .= '<div class="col-md-12">
			<div class="card card-primary">
				<div class="card-header"><h6 style="text-align:center">'.$resc['sub_categoria'].'</h6></div>
				<div class="card-body" style="align-self: center;">
				<img src="'.$Base.'Odontologia_bo1329/OBT_Images/'.$cliente_id.'/'.$resc["img1"].'" class="card-img-top w-100" title="'.$resc["titulo1"].'" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-content="'.$resc["fechaRef"].' - '.$resc["descripcion1"].'" style="width: 100%; height: 10rem; border-radius: 0.5rem;">					
				</div>
				<div class="card-footer">	
				<a href="javascript:Eliminar('.$resc["id"].')" class="css-button-sharp--green3">Eliminar</a>
				</div>
			</div>	
		</div>';		
		}

		if (trim($resc['categoria']) == 'Fotos de boca') {$ntipo = "Boca";
			$img_fotos_boca .= '<div class="col-md-12">
			<div class="card card-primary">
				<div class="card-header"><h6 style="text-align:center">'.$resc['sub_categoria'].'</h6></div>
				<div class="card-body" style="align-self: center;">
				<img src="'.$Base.'Odontologia_bo1329/OBT_Images/'.$cliente_id.'/'.$resc["img1"].'" class="card-img-top w-100" title="'.$resc["titulo1"].'" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-content="'.$resc["fechaRef"].' - '.$resc["descripcion1"].'" style="width: 100%; height: 10rem; border-radius: 0.5rem;">					
				</div>
				<div class="card-footer">	
				<a href="javascript:Eliminar('.$resc["id"].')" class="css-button-sharp--green3">Eliminar</a>
				</div>
			</div>	
		</div>';		
		}
		
		if (trim($resc['categoria']) == 'Fotos de modelos') {$ntipo = "Modelos";
			$img_fotos_modelos .= '<div class="col-md-12">
			<div class="card card-primary">
				<div class="card-header"><h6 style="text-align:center">'.$resc['sub_categoria'].'</h6></div>
				<div class="card-body" style="align-self: center;">
				<img src="'.$Base.'Odontologia_bo1329/OBT_Images/'.$cliente_id.'/'.$resc["img1"].'" class="card-img-top w-100" title="'.$resc["titulo1"].'" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-content="'.$resc["fechaRef"].' - '.$resc["descripcion1"].'" style="width: 100%; height: 10rem; border-radius: 0.5rem;">					
				</div>
				<div class="card-footer">	
				<a href="javascript:Eliminar('.$resc["id"].')" class="css-button-sharp--green3">Eliminar</a>
				</div>
			</div>	
		</div>';		
		}


	}
	echo 
	'<div class="col-md-12 row">
		<div class="col-md-3">
			<h4 style="text-center">Postura corporal</h4>
			'.$img_postura_corporal.'
		</div>
		<div class="col-md-3">
			<h4 style="text-center">Cara</h4>
			'.$img_fotos_cara.'
		</div>
		<div class="col-md-3">
			<h4 style="text-center">Boca</h4>
			'.$img_fotos_boca.'
		</div>
		<div class="col-md-3">
			<h4 style="text-center">Modelos</h4>
			'.$img_fotos_modelos.'
		</div>
	</div>' . $text_Debug;
} else {
	echo 
	'<div class="col-md-12">
		<div align="center">
			<h3>Sin Registro de imágenes</h3>
		</div>
	</div>';
}



?>