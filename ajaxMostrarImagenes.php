<?php
include 'funciones/funciones.php';
date_default_timezone_set('America/Bogota');

$cliente_id = $_GET['cliente_id'];

$cons = mysqli_query($conn3, "SELECT * from archivos2 where cliente_id = '$cliente_id'");
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
	$antes;
	$despues;
	$Durante;
	foreach ($cons as $resc) {
		if ($resc['tipo'] == 0) {$ntipo = "Antes";
			$antes .= '<div class="col-md-12">
			<div><h4>'.$ntipo.'</h4></div>
			<div class="card card-primary">
				<div class="card-body" style="align-self: center;">
				<img src="img/historiaImg/'.$cliente_id.'/'.$resc["img1"].'" class="card-img-top w-100" title="'.$resc["titulo1"].'" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-content="'.$resc["fechaRef"].' - '.$resc["descripcion1"].'" style="width: 100%; height: 10rem; border-radius: 0.5rem;">					
				</div>
				<div class="card-footer">	
				<a href="javascript:Eliminar('.$resc["id"].')" class="css-button-sharp--green3">Eliminar</a>
				</div>
			</div>	
		</div>';		
		}
		if ($resc['tipo'] == 2) {$ntipo = "Durante";
			$Durante .= '<div class="col-md-12">
			<div><h4>'.$ntipo.'</h4></div>
			<div class="card card-primary">
				<div class="card-body" style="align-self: center;">
				<img src="img/historiaImg/'.$cliente_id.'/'.$resc["img1"].'" class="card-img-top w-100" title="'.$resc["titulo1"].'" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-content="'.$resc["fechaRef"].' - '.$resc["descripcion1"].'" style="width: 100%; height: 10rem; border-radius: 0.5rem;">					
				</div>
				<div class="card-footer">	
				<a href="javascript:Eliminar('.$resc["id"].')" class="css-button-sharp--green3">Eliminar</a>
				</div>
			</div>	
		</div>';		
		}

		if ($resc['tipo'] == 1) {$ntipo = "Después";
			$despues .= '<div class="col-md-12">
			<div><h4>'.$ntipo.'</h4></div>
			<div class="card card-primary">
				<div class="card-body" style="align-self: center;">
				<img src="img/historiaImg/'.$cliente_id.'/'.$resc["img1"].'" class="card-img-top w-100" title="'.$resc["titulo1"].'" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-content="'.$resc["fechaRef"].' - '.$resc["descripcion1"].'" style="width: 100%; height: 10rem; border-radius: 0.5rem;">					
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
		<div class="col-md-4">
			'.$antes.'
		</div>
		<div class="col-md-4">
			'.$Durante.'
		</div>
		<div class="col-md-4">
			'.$despues.'
		</div>
	</div>';
} else {
	echo 
	'<div class="col-md-12">
		<div align="center">
			<h3>Sin Registro de imágenes</h3>
		</div>
	</div>';
}



?>