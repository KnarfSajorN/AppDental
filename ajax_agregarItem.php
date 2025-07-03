<?php
date_default_timezone_set('America/Bogota');
include("conexiones/conexion.php");
include("funciones/conexiones.php");
include("funciones/funciones.php");
$valor = 0;
$conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));

$codigoProd 	= $_POST['codigoProd'];
$cantidad 		= $_POST['cantidad'];
$usuario_id 	= $_POST['usuario_id'];
$valor 	= $_POST['valor'];
$regalo 	= $_POST['regalo'];
$impuesto	= $_POST['impuesto'];


//echo "$codigoProd - $cantidad - $usuario_id";

$queryinv = mysqli_query($conn3, "SELECT * FROM  sinvetrios where usuario_id = '$usuario_id'  and ID = $codigoProd");

$nrowl = mysqli_num_rows($queryinv);
while ($rowinv = mysqli_fetch_array($queryinv)) {

	$tipo         = $rowinv['tipo'];
	$costo        = $rowinv['costo'];
	$precio       = $rowinv['precio'];
	$existencia   = $rowinv['existencia'];
}

if ($valor == 0) {
	$valor = $costo;
}

foreach (['porcentaje', 'regalo'] as $key => $value) {
	$validaCampo = mysqli_query($conn3, "SHOW COLUMNS FROM operacioninv WHERE Field = '{$value}';");
	if (mysqli_num_rows($validaCampo) == 0) {
		mysqli_query($conn3, "ALTER TABLE operacioninv ADD COLUMN {$value} TEXT NULL DEFAULT NULL");
	}
}

if (!empty($codigoProd)) { // EVITAMOS QUE INTENTE REGISTRAR EN CASO DE QUE SOLO QUERAMOS MOSTRAR LOS ITEMS PRECARGADOS AL RECARGAR

	mysqli_query($conn3, "INSERT INTO operacioninv (ususario_id, codigoProd, cantidad, tipo, fecha, estado, costo, precio,porcentaje, regalo) 
                    VALUES ('$usuario_id', '$codigoProd','$cantidad', '$tipo', current_timestamp(), '0', '$valor', '$precio','$impuesto', '$regalo');") or die(mysqli_error($conn3));
}


//mysqli_query($conn3,"update sinvetrios set costo = '$valor' where usuario_id = '$usuario_id'  and ID = $codigoProd");

/*echo "INSERT INTO operacioninv (ususario_id, codigoProd, cantidad, tipo, fecha, estado, costo, precio,porcentaje, regalo) 
                    VALUES ('$usuario_id', '$codigoProd','$cantidad', '$tipo', current_timestamp(), '0', '$valor', '$precio','$impuesto', '$regalo');";*/


echo '<h6><table border="1" style="undefined;table-layout: fixed; width: 100%">
<tr> <th>  Referencia  </th> <th>  Descripción   </th> <th> Costo </th> <th> Cantidad </th><th> Costo Total</th><th> Precio </th><th> Impuesto </th><th> Regalo </th>';

$queryList = mysqli_query($conn3, "SELECT * FROM  operacioninv where ususario_id = '$usuario_id'  and estado = 0");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
	$idOper     = $rowMotorizado['id'];
	$codigoProd = $rowMotorizado['codigoProd'];
	$cuantos    = $rowMotorizado['cuantos'];
	$cantidad   = $rowMotorizado['cantidad'];
	$costo      = $rowMotorizado['costo'];
	$precio     = $rowMotorizado['precio'];
	$porcentaje    = $rowMotorizado['porcentaje'];
	$regalo    = $rowMotorizado['regalo'];


	$queryinv = mysqli_query($conn3, "SELECT * FROM  sinvetrios where usuario_id = '$usuario_id'  and ID = $codigoProd");
	$nrowl = mysqli_num_rows($queryinv);
	while ($rowinv = mysqli_fetch_array($queryinv)) {
		$referencia1      = $rowinv['referencia'];
		$descripcion1     = $rowinv['descripcion'];
	}
	$costo_total = $costo * $cantidad;

	echo '<tr> <th> <input type="hidden"  value="' . $idOper . '" class="form-control input-lg" id="idOper" name="idOper" > <a href="#"  onclick="eliminarItem(' . $idOper . ');"> <font size="5"> <strong>  <i class="fa fa-trash"></i>   </strong>  </font> </a>  
	' . $referencia1 . '  </th> <th>  ' . $descripcion1 . '  </th> <th> ' . $costo . ' </th><th> ' . $cantidad . ' </th><th> ' . $costo_total . ' </th><th>  ' . $precio . '</th><th>  ' . $porcentaje . '</th><th>  ' . $regalo . '</th>  
	';

	$cantidadT = $cantidad + $cantidadT;
	$costoT = $costo + $costoT;
	$precioT = $precio + $precioT;
	$porcentajeT = $porcentaje + $porcentajeT;
	$costoTotalFinal = $costoTotalFinal + $costo_total;

	$Entro++;
}
echo '<tr> <th>   </th> <th> Totales </th> <th> ' . $costoT . ' </th> <th> ' . $cantidadT . ' </th> <th> ' . $costoTotalFinal . ' </th> <th>  ' . $precioT . ' </th><th>  ' . $porcentajeT . ' </th>';

echo '</table></h6>';

echo "<div class='row'>
		<div class='col-md-12'>
		<label>Costo Total</label>
		<input type='text' name='Proveedor[Total]' id='total_proveedor' value='{$costoTotalFinal}' class='form-control input-lg' step='any' style='border-block: none;background-color: unset;'  readonly >
		</div>
		<div class='col-md-12'>
		<label>Numero de Registros</label>
		<input type='number' name='cantidad_numerica' id='cantidad_numerica' value='{$Entro}' class='form-control input-lg blur' min='1'  style='border-block: none;background-color: unset;' data-readonly_P required >
		</div>
		<div class='col-md-4'> 
			<label>
				Numero de plazos
			</label>
			<select name='Proveedor[Plazos]' id='plazos' placeholder='Plazos' class='form-control input-lg'  onchange='Calcular_Pago_Plazo()'>
			<option value='1' selected>1</option>
			<option value='2'>2</option>
			<option value='3'>3</option>
			<option value='4'>4</option>
			<option value='5'>5</option>
			<option value='6'>6</option>
			<option value='7'>7</option>
			<option value='8'>8</option>
			<option value='9'>9</option>
			<option value='10'>10</option>
			<option value='11'>11</option>
			<option value='12'>12</option>
			</select>
		</div>
		<div class='col-md-4'> 
			<label>
				Valor a pagar por plazo
			</label>
			<input type='number' name='Proveedor[Pago_Plazo]' id='pago_plazos' value='{$costoTotalFinal}' placeholder='Plazo' class='form-control input-lg' step='any' readonly>
		</div>
		<div class='col-md-4'> 
			<label>
				Se paga primer plazo?
			</label>
			<select name='Proveedor[Primer_Plazo]' class='form-control input-lg' >
			<option value='Si' selected>Si</option>
			<option value='No'>No</option>
			</select>
		</div>
</div>";
