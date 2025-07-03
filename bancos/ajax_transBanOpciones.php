<?php
date_default_timezone_set('America/Bogota');
include("../funciones/funciones.php");

$banco = $_POST['banco'];
$usuario_id = $_POST['usuario_id'];

$queryList = mysqli_query($conn3, "SELECT * from Sbancos where id = $banco;");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
	$idBanco = $rowMotorizado['id'];
	$fechaRegBanco = $rowMotorizado['fechaReg'];
	$nCuentaBanco = $rowMotorizado['nCuenta'];
	$descripcionBanco = $rowMotorizado['descripcion'];
	$tipoBanco = $rowMotorizado['tipo'];
	$descripcionDetalleBanco = $rowMotorizado['descripcionDetalle'];
	$sucursalBanco = $rowMotorizado['sucursal'];
	$contactoBanco = $rowMotorizado['contacto'];
	$direccionBanco = $rowMotorizado['direccion'];
	$monedaBanco = $rowMotorizado['moneda'];
	$telefonoBanco = $rowMotorizado['telefono'];
	$faxBanco = $rowMotorizado['fax'];
	$emailBanco = $rowMotorizado['email'];

	$idCuentaContableBanco = $rowMotorizado['idCuentaContable'];
	$NombreCuentaContable = funcionMaster($idCuentaContableBanco, 'id', 'descripcion', 'CCuentas');
}


$OpcionesConceptos = "";
$queryList = mysqli_query($conn3, "SELECT * from ConceptosBanco WHERE Activo = 1");
if ($queryList) {
	while ($rowMotorizado = mysqli_fetch_array($queryList)) {
		$idC = $rowMotorizado['id'];
		$descripcionC = $rowMotorizado['Descripcion'];
		$OpcionesConceptos .= '<option value="' . $idC . '">' . $descripcionC . '</option>';
	}
}


$OpcionesCuentas = "";
$queryList = mysqli_query($conn3, "SELECT * from CCuentas WHERE Activo = 1");
if ($queryList) {
	while ($rowMotorizado = mysqli_fetch_array($queryList)) {
		$id = $rowMotorizado['id'];
		$descripcion = $rowMotorizado['descripcion'];
		$OpcionesCuentas .= '<option value="' . $id . '">' . $id . ' - ' . $descripcion . '</option>';
	}
}


$queryList = mysqli_query($conn3, "SELECT * FROM  Stransbanco_Conciliado where idBanco='$idBanco' ORDER BY id ASC");
if ($queryList) {
	while ($rowMotorizado = mysqli_fetch_array($queryList)) {
		$FechaUltimoConciliado = $rowMotorizado['Fecha'];
		$Saldo_Conciliar = $rowMotorizado['Saldo_Conciliar'];
	}
}

?>
<!-- MENU OPCIONES PRINCIPAL -->
<div align="center" class="dropdown">

	<a class="mb-2 mr-2 btn-pill btn btn-info rounded-pill text-white" href="./bancosConceptos">
		<i class="fa fa-file"></i>
		Nuevo Concepto
	</a>

	<a class="mb-2 mr-2 btn-pill btn btn-info rounded-pill text-white" href="#" data-toggle="modal" data-target="#Conciliar">
		<i class="fa fa-file"></i>
		Conciliar
	</a>

	<!-- <a class="mb-2 mr-2 btn-pill btn btn-info rounded-pill text-white" href="Sbancos">
		<i class="fa fa-usd"></i>
		Nuevo Banco
	</a>

	<a class="mb-2 mr-2 btn-pill btn btn-info rounded-pill text-white" href="Sconceptos">
		<i class="fa fa-file"></i>
		Nuevo Concepto
	</a>

	<a class="mb-2 mr-2 btn-pill btn btn-info rounded-pill text-white" href="Sterceros">
		<i class="fa fa-user"></i>
		Nuevo Beneficiario
	</a>

	<button type="button" class="mb-2 mr-2 btn-pill btn btn-primary" data-toggle="modal" data-target="#exampleModal1">
		<i class="fa fa-money"></i>
		Conciliar
	</button> -->
	<hr>

	<!-- <button type="button" class="mb-2 mr-2 btn-pill btn btn-primary" data-toggle="modal" data-target="#exampleModal1">
		<i class="fa fa-files-o"></i>
		Diferidos
	</button> -->

	<button class="mb-2 mr-2 btn-pill btn btn-info rounded-pill dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		<i class="fa fa-plus"></i>
		Nuevo
	</button>
	<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
		<a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalCH">Cheque</a>
		<a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalND">Nota de Débito</a>
		<a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalDP">Deposito</a>
		<a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalNC">Nota de Crédito</a>
		<a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalTFI">Transferencia de ingreso de fondos </a>
		<a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalTFE">Transferencia de egreso de fondos </a>
		<a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalTFB">Transferencia entre bancos</a>
	</div>
</div>















<?php



// modal cheque
echo '
<div class="modal fade" id="modalCH" tabindex="-1" role="dialog" aria-labelledby="modalCHLabel" aria-hidden="true">
<div class="modal-dialog modal-lg resizable" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="modalCHLabel">Nuevo Cheque</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<form action="./bancos/grabarOperacionBancaria.php" method="POST" enctype="multipart">
<div class="modal-body">
<div class="col-md-12">
<label>Banco: ' . $idBanco . ' - ' . $descripcionBanco . ' - ' . $nCuentaBanco . '</label>
<div class="card form-group text-success widget-chart2 text-left p-3 card-btm-border card-shadow-primary border-primary">
<div class="row">
<div class="col-md-2">
<label>N. cheque</label>
<input type="number" required name="nCheque" class="input-lg form-control">
</div>
<div class="col-md-4">
</div>
<div class="col-md-6">
<label>Monto</label>
<input type="number" step="0.01" required name="monto" onkeyup="numero_letra(this.value,1);" class="input-lg form-control">
</div>
<div class="col-md-12">
<label>Páguese a la orden de</label>
<select class="input-lg form-control" required name="beneficiario">
<option value="" selected>Seleccione</option>';

$queryList = mysqli_query($conn3, "SELECT * from cliente");
if ($queryList) {
	while ($rowMotorizado = mysqli_fetch_array($queryList)) {

		$cliente_id = $rowMotorizado['cliente_id'];
		$nombre_cliente = $rowMotorizado['nombre_cliente'];
		echo '<option value="' . $cliente_id . '">' . $nombre_cliente . '</option>';
	}
}

echo '      				
</select>
</div>
<div class="col-md-12">
<label>La Cantidad de</label>
<input type="text" required name="cantidadLetraCH" id="cantidadLetraCH" class="input-lg form-control" value="">
</div>
<div class="col-md-6">
<label>Fecha Cheque</label>
<input type="date" required name="fechaCheque" class="input-lg form-control" value="' . date("Y-m-d") . '">
</div>
<div class="col-md-6">
<label>Fecha Liberación</label>
<input type="date" required name="fechaChequeLibera" class="input-lg form-control" >
</div>
</div>
</div>
<div class="row">
<div class="col-md-12">
<label>Detalle Movimiento</label>
<input type="text" required name="detalleMovimiento" class="input-lg form-control" oninput="VerificarCaracteres(this)" >
<hr>
</div>';


echo '<div class="col-md-12">

	<table id="tabla_cheque-crear" class="table table-bordered">
	<thead class="thead-light">
	<tr>
		<th>Cuenta Contable</th>
		<th>Concepto</th>
		<th>Debe</th>
		<th>Haber</th>
		<th>Acciones</th>
	</tr>
	</thead>
	<tbody>
	<tr id="tr_chequeprincipal">
		<td style="width:35%">
		<select name="CuentaContable[]"  id="cuentacontable_principal-crear" class="form-control " required>
			<option value="' . $idCuentaContableBanco . '">' . $idCuentaContableBanco . " - " . $NombreCuentaContable . '</option>
		</select>
		<select  id="cuentacontable_principal_oculto-crear" class="form-control" style="display:none;">
			<option value="0">Seleccione</option>
			' . $OpcionesCuentas . '
		</select>
		</td>
		<td style="width:30%">
		<select name="concepto[]"  id="concepto_principal-crear" class="form-control " required>
			<option value="0">Banco</option>
		</select>
		<select id="concepto_principal_oculto-crear" class="form-control" style="display:none;">
			<option value="">Seleccione</option>
			' . $OpcionesConceptos . '
		</select>
		</td>
		<td style="width:15%">
		<input type="number" name="debe[]"  id="debe_principal-crear" step="0.01" pattern="[0-9]" value="0" class="form-control debe_cheque-crear blur">
		</td>
		<td style="width:15%">
		<input type="number" name="haber[]"  id="haber_principal-crear" step="0.01" pattern="[0-9]" value="0" class="form-control haber_cheque-crear blur">
		</td>
		<td>
		
		</td>
	</tr>
	</tbody>
	</table>
	<div class="row">
		<div class="col-md-6">
		Total DEBE: <input type="number" step="0.01" class="form-control blur" id="totalDebe-crear" value="0">
		</div>
		<div class="col-md-6">
		Total HABER: <input type="number" step="0.01" class="form-control blur" id="totalHaber-crear" value="0">
		</div>
		<div class="col-md-12">
		<hr>
		<button type="button" onclick="agregarFilaCrear()" class="btn btn-primary">Agregar fila</button>
		</div>
	</div>
	
	
	<!-- la info correspondiente se cargara en el archivo StransBan.php | las funciones están abajo de este archivo-->
</div>
'; ?>
<div class="col-md-12">
	<hr>
	<?php //echo verPlandeCuentas() 
	?>
	<hr>
	<?php echo verCentroCosto() ?>
	<hr>
</div>
<?php
echo '
</div>
</div>
</div>
<div class="modal-footer">
<input type="hidden" name="tipoOper" value="CH">
<!--<input type="hidden" name="balanceActual" value="' . $balance . '">-->
<input type="hidden" name="idBanco" value="' . $idBanco . '">
<input type="hidden" name="usuario_id" value="' . $usuario_id . '">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
<button type="submit" id="TotalizarCheque-crear" class="btn btn-primary">Totalizar</button>
</div>
</form>
</div>
</div>
</div>
';
// fin modal cheque









































// modal nota de debito
echo '
<div class="modal fade" id="modalND" tabindex="-1" role="dialog" aria-labelledby="modalCHLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="modalCHLabel">Nota de Débito</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<form action="./bancos/grabarOperacionBancaria.php" method="POST" enctype="multipart">
<div class="modal-body">
<div class="col-md-12">
<label>Banco: ' . $idBanco . ' - ' . $descripcionBanco . ' - ' . $nCuentaBanco . '</label>
<div class="card form-group text-success widget-chart2 text-left p-3 card-btm-border card-shadow-primary border-primary">
<div class="row">
<div class="col-md-3">
<label>Numero de Nota</label>
<input type="number" required name="nNota" class="input-lg form-control">
</div>
<div class="col-md-3">
</div>
<div class="col-md-6">
<label>Monto</label>
<input type="number" step="0.01" required name="monto" onkeyup="numero_letra(this.value,2)" class="input-lg form-control">
</div>


<div class="col-md-12">
<label>Beneficiario</label>
<select class="input-lg form-control" required name="beneficiario">
<option value="0" selected>Ninguno</option>';

$queryList = mysqli_query($conn3, "SELECT * from cliente");
if ($queryList) {
	while ($rowMotorizado = mysqli_fetch_array($queryList)) {

		$cliente_id = $rowMotorizado['cliente_id'];
		$nombre_cliente = $rowMotorizado['nombre_cliente'];
		echo '<option value="' . $cliente_id . '">' . $nombre_cliente . '</option>';
	}
}

echo '      				
</select>
</div>




<div class="col-md-12">
<label>La Cantidad de</label>
<input type="text" required name="cantidadLetraND" id="cantidadLetraND" class="input-lg form-control" value="">
</div>
<div class="col-md-6">
<label>Fecha Cheque</label>
<input type="date" required name="fechaCheque" class="input-lg form-control" value="' . date("Y-m-d") . '">
</div>
<div class="col-md-6">
<label>Fecha Liberación</label>
<input type="date" required name="fechaChequeLibera" class="input-lg form-control" value="' . date("Y-m-d") . '" >
</div>
</div>
</div>
<div class="row">
<div class="col-md-12">
<label>Detalle Movimiento</label>
<input type="text" required name="detalleMovimiento" class="input-lg form-control" oninput="VerificarCaracteres(this)" >
<hr>
</div>
';

echo '<div class="col-md-12" >

	<table id="tabla_cheque-notadebito" class="table table-bordered">
	<thead class="thead-light">
	<tr>
		<th>Cuenta Contable</th>
		<th>Concepto</th>
		<th>Debe</th>
		<th>Haber</th>
		<th>Acciones</th>
	</tr>
	</thead>
	<tbody>
	<tr id="tr_chequeprincipal" style="background-color: #80808070;pointer-events: none;">
		<td style="width:35%">
		<select name="CuentaContable[]"  id="cuentacontable_principal-notadebito" class="form-control " required>
			<option value="' . $idCuentaContableBanco . '">' . $idCuentaContableBanco . " - " . $NombreCuentaContable . '</option>
		</select>
		<select  id="cuentacontable_principal_oculto-notadebito" class="form-control" style="display:none;">
			<option value="0">Seleccione</option>
			' . $OpcionesCuentas . '
		</select>
		</td>
		<td style="width:30%">
		<select name="concepto[]"  id="concepto_principal-notadebito" class="form-control " required>
			<option value="0">Banco</option>
		</select>
		<select id="concepto_principal_oculto-notadebito" class="form-control" style="display:none;">
			<option value="">Seleccione</option>
			' . $OpcionesConceptos . '
		</select>
		</td>
		<td style="width:15%">
		<input type="number" name="debe[]"  id="debe_principal-notadebito" step="0.01" pattern="[0-9]" value="0" class="form-control debe_cheque-notadebito blur">
		</td>
		<td style="width:15%">
		<input type="number" name="haber[]"  id="haber_principal-notadebito" step="0.01" pattern="[0-9]" value="0" class="form-control haber_cheque-notadebito blur">
		</td>
		<td>
		
		</td>
	</tr>
	</tbody>
	</table>
	<div class="row">
		<div class="col-md-6">
		Total DEBE: <input type="number" step="0.01" class="form-control blur" id="totalDebe-notadebito" value="0">
		</div>
		<div class="col-md-6">
		Total HABER: <input type="number" step="0.01" class="form-control blur" id="totalHaber-notadebito" value="0">
		</div>
		<div class="col-md-12">
		<hr>
		<button type="button" onclick="agregarFilaNotaDebito()" class="btn btn-primary">Agregar fila</button>
		</div>
	</div>
	
	
	<!-- la info correspondiente se cargara en el archivo StransBan.php | las funciones estan abajo de este archivo-->
</div>';

?>
<div class="col-md-12">
	<hr>
	<?php //echo verPlandeCuentas() 
	?>
	<hr>
	<?php echo verCentroCosto() ?>
	<hr>
</div>
<?php
echo '
</div>
</div>
</div>
<div class="modal-footer">
<input type="hidden" name="tipoOper" value="ND">
<!--<input type="hidden" name="balanceActual" value="' . $balance . '">-->
<input type="hidden" name="idBanco" value="' . $idBanco . '">
<input type="hidden" name="usuario_id" value="' . $usuario_id . '">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
<button type="submit" class="btn btn-primary" id="TotalizarCheque-notadebito">Totalizar</button>
</div>
</form>
</div>
</div>
</div>
';
// fin modal nota de debito




















































// modal Deposito
echo '
<div class="modal fade" id="modalDP" tabindex="-1" role="dialog" aria-labelledby="modalCHLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="modalCHLabel">Nuevo Deposito</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<form action="./bancos/grabarOperacionBancaria.php" method="POST" enctype="multipart">
<div class="modal-body">
<div class="col-md-12">
<label>Banco: ' . $idBanco . ' - ' . $descripcionBanco . ' - ' . $nCuentaBanco . '</label>
<div class="card form-group text-success widget-chart2 text-left p-3 card-btm-border card-shadow-primary border-primary">
<div class="row">
<div class="col-md-3">
<label>Documento</label>
<input type="number" required name="nDeposito" class="input-lg form-control">
</div>
<div class="col-md-3">
</div>
<div class="col-md-6">
<label>Monto</label>
<input type="number" step="0.01" required name="monto" onkeyup="numero_letra(this.value,3)" class="input-lg form-control">
</div>

<div class="col-md-12">
<label>Quien Deposito</label>
<select class="input-lg form-control" required name="beneficiario">
<option value="0" selected>Ninguno[No aplica]</option>';

$queryList = mysqli_query($conn3, "SELECT * from cliente");
if ($queryList) {
	while ($rowMotorizado = mysqli_fetch_array($queryList)) {

		$cliente_id = $rowMotorizado['cliente_id'];
		$nombre_cliente = $rowMotorizado['nombre_cliente'];
		echo '<option value="' . $cliente_id . '">' . $nombre_cliente . '</option>';
	}
}

echo '      				
</select>
</div>



<div class="col-md-12">
<label>La Cantidad de</label>
<input type="text" required name="cantidadLetraDP" id="cantidadLetraDP" class="input-lg form-control" value="">
</div>
<div class="col-md-6">
<label>Fecha Deposito</label>
<input type="date" required name="fechaDeposito" class="input-lg form-control" value="' . date("Y-m-d") . '">
</div>

</div>
</div>
<div class="row">
<div class="col-md-12">
<label>Detalle Movimiento</label>
<input type="text" required name="detalleMovimiento" class="input-lg form-control" oninput="VerificarCaracteres(this)" >
<hr>
</div>';




echo '<div class="col-md-12" >

	<table id="tabla_cheque-deposito" class="table table-bordered">
	<thead class="thead-light">
	<tr>
		<th>Cuenta Contable</th>
		<th>Concepto</th>
		<th>Debe</th>
		<th>Haber</th>
		<th>Acciones</th>
	</tr>
	</thead>
	<tbody>
	<tr id="tr_chequeprincipal" style="background-color: #80808070;pointer-events: none;">
		<td style="width:35%">
		<select name="CuentaContable[]"  id="cuentacontable_principal-deposito" class="form-control " required>
			<option value="' . $idCuentaContableBanco . '">' . $idCuentaContableBanco . " - " . $NombreCuentaContable . '</option>
		</select>
		<select  id="cuentacontable_principal_oculto-deposito" class="form-control" style="display:none;">
			<option value="0">Seleccione</option>
			' . $OpcionesCuentas . '
		</select>
		</td>
		<td style="width:30%">
		<select name="concepto[]"  id="concepto_principal-deposito" class="form-control " required>
			<option value="0">Banco</option>
		</select>
		<select id="concepto_principal_oculto-deposito" class="form-control" style="display:none;">
			<option value="">Seleccione</option>
			' . $OpcionesConceptos . '
		</select>
		</td>
		<td style="width:15%">
		<input type="number" name="debe[]"  id="debe_principal-deposito" step="0.01" pattern="[0-9]" value="0" class="form-control debe_cheque-deposito blur">
		</td>
		<td style="width:15%">
		<input type="number" name="haber[]"  id="haber_principal-deposito" step="0.01" pattern="[0-9]" value="0" class="form-control haber_cheque-deposito blur">
		</td>
		<td>
		
		</td>
	</tr>
	</tbody>
	</table>
	<div class="row">
		<div class="col-md-6">
		Total DEBE: <input type="number" step="0.01" class="form-control blur" id="totalDebe-deposito" value="0">
		</div>
		<div class="col-md-6">
		Total HABER: <input type="number" step="0.01" class="form-control blur" id="totalHaber-deposito" value="0">
		</div>
		<div class="col-md-12">
		<hr>
		<button type="button" onclick="agregarFilaDeposito()" class="btn btn-primary">Agregar fila</button>
		</div>
	</div>
	
	
	<!-- la info correspondiente se cargara en el archivo StransBan.php | las funciones estan abajo de este archivo-->
</div>';

?>
<div class="col-md-12">
	<hr>
	<?php //echo verPlandeCuentas() 
	?>
	<hr>
	<?php echo verCentroCosto() ?>
	<hr>
</div>
<?php
echo '
</div>
</div>
</div>
<div class="modal-footer">
<input type="hidden" name="tipoOper" value="DP">
<!--<input type="hidden" name="balanceActual" value="' . $balance . '">-->
<input type="hidden" name="idBanco" value="' . $idBanco . '">
<input type="hidden" name="usuario_id" value="' . $usuario_id . '">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
<button type="submit" class="btn btn-primary" id="TotalizarCheque-deposito">Totalizar</button>
</div>
</form>
</div>
</div>
</div>
';
// fin modal Deposito



























// modal nota de crédito
echo '
<div class="modal fade" id="modalNC" tabindex="-1" role="dialog" aria-labelledby="modalCHLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="modalCHLabel">Nota de Crédito</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<form action="./bancos/grabarOperacionBancaria.php" method="POST" enctype="multipart">
<div class="modal-body">
<div class="col-md-12">
<label>Banco: ' . $idBanco . ' - ' . $descripcionBanco . ' - ' . $nCuentaBanco . '</label>
<div class="card form-group text-success widget-chart2 text-left p-3 card-btm-border card-shadow-primary border-primary">
<div class="row">
<div class="col-md-3">
<label>Numero de Nota</label>
<input type="number" required name="nNota" class="input-lg form-control">
</div>
<div class="col-md-3">
</div>
<div class="col-md-6">
<label>Monto</label>
<input type="number" step="0.01" required name="monto" onkeyup="numero_letra(this.value,4)" class="input-lg form-control">
</div>

<div class="col-md-12">
<label>Beneficiario</label>
<select class="input-lg form-control" required name="beneficiario">
<option value="0" selected>Ninguno</option>';

$queryList = mysqli_query($conn3, "SELECT * from cliente");
if ($queryList) {
	while ($rowMotorizado = mysqli_fetch_array($queryList)) {

		$cliente_id = $rowMotorizado['cliente_id'];
		$nombre_cliente = $rowMotorizado['nombre_cliente'];
		echo '<option value="' . $cliente_id . '">' . $nombre_cliente . '</option>';
	}
}

echo '      				
</select>
</div>


<div class="col-md-12">
<label>La Cantidad de</label>
<input type="text" required name="cantidadLetraNC" id="cantidadLetraNC" class="input-lg form-control" value="">
</div>
<div class="col-md-6">
<label>Fecha Cheque</label>
<input type="date" required name="fechaCheque" class="input-lg form-control" value="' . date("Y-m-d") . '">
</div>
<div class="col-md-6">
<label>Fecha Liberación</label>
<input type="date" required name="fechaChequeLibera" class="input-lg form-control" value="' . date("Y-m-d") . '" >
</div>
</div>
</div>
<div class="row">
<div class="col-md-12">
<label>Detalle Movimiento</label>
<input type="text" required name="detalleMovimiento" class="input-lg form-control" oninput="VerificarCaracteres(this)" >
<hr>
</div>';


echo '<div class="col-md-12" >

	<table id="tabla_cheque-notacredito" class="table table-bordered">
	<thead class="thead-light">
	<tr>
		<th>Cuenta Contable</th>
		<th>Concepto</th>
		<th>Debe</th>
		<th>Haber</th>
		<th>Acciones</th>
	</tr>
	</thead>
	<tbody>
	<tr id="tr_chequeprincipal" style="background-color: #80808070;pointer-events: none;">
		<td style="width:35%">
		<select name="CuentaContable[]"  id="cuentacontable_principal-notacredito" class="form-control " required>
			<option value="' . $idCuentaContableBanco . '">' . $idCuentaContableBanco . " - " . $NombreCuentaContable . '</option>
		</select>
		<select  id="cuentacontable_principal_oculto-notacredito" class="form-control" style="display:none;">
			<option value="0">Seleccione</option>
			' . $OpcionesCuentas . '
		</select>
		</td>
		<td style="width:30%">
		<select name="concepto[]"  id="concepto_principal-notacredito" class="form-control " required>
			<option value="0">Banco</option>
		</select>
		<select id="concepto_principal_oculto-notacredito" class="form-control" style="display:none;">
			<option value="">Seleccione</option>
			' . $OpcionesConceptos . '
		</select>
		</td>
		<td style="width:15%">
		<input type="number" name="debe[]"  id="debe_principal-notacredito" step="0.01" pattern="[0-9]" value="0" class="form-control debe_cheque-notacredito blur">
		</td>
		<td style="width:15%">
		<input type="number" name="haber[]"  id="haber_principal-notacredito" step="0.01" pattern="[0-9]" value="0" class="form-control haber_cheque-notacredito blur">
		</td>
		<td>
		
		</td>
	</tr>
	</tbody>
	</table>
	<div class="row">
		<div class="col-md-6">
		Total DEBE: <input type="number" step="0.01" class="form-control blur" id="totalDebe-notacredito" value="0">
		</div>
		<div class="col-md-6">
		Total HABER: <input type="number" step="0.01" class="form-control blur" id="totalHaber-notacredito" value="0">
		</div>
		<div class="col-md-12">
		<hr>
		<button type="button" onclick="agregarFilaNotaCredito()" class="btn btn-primary">Agregar fila</button>
		</div>
	</div>
	
	
	<!-- la info correspondiente se cargara en el archivo StransBan.php | las funciones estan abajo de este archivo-->
</div>';

?>
<div class="col-md-12">
	<hr>
	<?php //echo verPlandeCuentas() 
	?>
	<hr>
	<?php echo verCentroCosto() ?>
	<hr>
</div>
<?php
echo '
</div>
</div>
</div>
<div class="modal-footer">
<input type="hidden" name="tipoOper" value="NC">
<!--<input type="hidden" name="balanceActual" value="' . $balance . '">-->
<input type="hidden" name="idBanco" value="' . $idBanco . '">
<input type="hidden" name="usuario_id" value="' . $usuario_id . '">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
<button type="submit" class="btn btn-primary" id="TotalizarCheque-notacredito">Totalizar</button>
</div>
</form>
</div>
</div>
</div>
';
// fin modal nota de credito
































// modal tranferencia ingreso
echo '
<div class="modal fade" id="modalTFI" tabindex="-1" role="dialog" aria-labelledby="modalCHLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="modalCHLabel">Transferencia de ingreso de fondos</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<form action="./bancos/grabarOperacionBancaria.php" method="POST" enctype="multipart">
<div class="modal-body">
<div class="col-md-12">
<label>Banco: ' . $idBanco . ' - ' . $descripcionBanco . ' - ' . $nCuentaBanco . '</label>
<div class="card form-group text-success widget-chart2 text-left p-3 card-btm-border card-shadow-primary border-primary">
<div class="row">
<div class="col-md-2">
<label>Documento</label>
<input type="number" required name="nDoc" class="input-lg form-control">
</div>
<div class="col-md-4">
</div>
<div class="col-md-6">
<label>Monto</label>
<input type="number" step="0.01" required name="monto" onkeyup="numero_letra(this.value,5)" class="input-lg form-control">
</div>

<div class="col-md-12">
<label>Cliente/Tercero</label>
<select class="input-lg form-control" required name="beneficiario">
<option value="" selected>Seleccione</option>';

$queryList = mysqli_query($conn3, "SELECT * from cliente");
if ($queryList) {
	while ($rowMotorizado = mysqli_fetch_array($queryList)) {

		$cliente_id = $rowMotorizado['cliente_id'];
		$nombre_cliente = $rowMotorizado['nombre_cliente'];
		echo '<option value="' . $cliente_id . '">' . $nombre_cliente . '</option>';
	}
}

echo '      				
</select>
</div>

<div class="col-md-12">
<label>La Cantidad de</label>
<input type="text" required name="cantidadLetraTFI" id="cantidadLetraTFI" class="input-lg form-control" value="">
</div>

<div class="col-md-6">
<label>Fecha Cheque</label>
<input type="date" required name="fechaCheque" class="input-lg form-control" value="' . date("Y-m-d") . '">
</div>
<div class="col-md-6">
<label>Fecha Liberación</label>
<input type="date" required name="fechaChequeLibera" class="input-lg form-control" >
</div>

</div>
</div>
<div class="row">
<div class="col-md-12">
<label>Detalle Movimiento</label>
<input type="text" required name="detalleMovimiento" class="input-lg form-control" oninput="VerificarCaracteres(this)" >
<hr>
</div>';

echo '<div class="col-md-12" >

	<table id="tabla_cheque-tfi" class="table table-bordered">
	<thead class="thead-light">
	<tr>
		<th>Cuenta Contable</th>
		<th>Concepto</th>
		<th>Debe</th>
		<th>Haber</th>
		<th>Acciones</th>
	</tr>
	</thead>
	<tbody>
	<tr id="tr_chequeprincipal" style="background-color: #80808070;pointer-events: none;">
		<td style="width:35%">
		<select name="CuentaContable[]"  id="cuentacontable_principal-tfi" class="form-control " required>
			<option value="' . $idCuentaContableBanco . '">' . $idCuentaContableBanco . " - " . $NombreCuentaContable . '</option>
		</select>
		<select  id="cuentacontable_principal_oculto-tfi" class="form-control" style="display:none;">
			<option value="0">Seleccione</option>
			' . $OpcionesCuentas . '
		</select>
		</td>
		<td style="width:30%">
		<select name="concepto[]"  id="concepto_principal-tfi" class="form-control " required>
			<option value="0">Banco</option>
		</select>
		<select id="concepto_principal_oculto-tfi" class="form-control" style="display:none;">
			<option value="">Seleccione</option>
			' . $OpcionesConceptos . '
		</select>
		</td>
		<td style="width:15%">
		<input type="number" name="debe[]"  id="debe_principal-tfi" step="0.01" pattern="[0-9]" value="0" class="form-control debe_cheque-tfi blur">
		</td>
		<td style="width:15%">
		<input type="number" name="haber[]"  id="haber_principal-tfi" step="0.01" pattern="[0-9]" value="0" class="form-control haber_cheque-tfi blur">
		</td>
		<td>
		
		</td>
	</tr>
	</tbody>
	</table>
	<div class="row">
		<div class="col-md-6">
		Total DEBE: <input type="number" step="0.01" class="form-control blur" id="totalDebe-tfi" value="0">
		</div>
		<div class="col-md-6">
		Total HABER: <input type="number" step="0.01" class="form-control blur" id="totalHaber-tfi" value="0">
		</div>
		<div class="col-md-12">
		<hr>
		<button type="button" onclick="agregarFilaTFI()" class="btn btn-primary">Agregar fila</button>
		</div>
	</div>
	
	
	<!-- la info correspondiente se cargara en el archivo StransBan.php | las funciones estan abajo de este archivo-->
</div>';

?>
<div class="col-md-12">
	<hr>
	<?php //echo verPlandeCuentas() 
	?>
	<hr>
	<?php echo verCentroCosto() ?>
	<hr>
</div>
<?php
echo '
</div>
</div>
</div>
<div class="modal-footer">
<input type="hidden" name="tipoOper" value="TFI">
<!--<input type="hidden" name="balanceActual" value="' . $balance . '">-->
<input type="hidden" name="idBanco" value="' . $idBanco . '">
<input type="hidden" name="usuario_id" value="' . $usuario_id . '">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
<button type="submit" class="btn btn-primary" id="TotalizarCheque-tfi" >Totalizar</button>
</div>
</form>
</div>
</div>
</div>
';
// fin modal transferencia ingreso







// modal tranferencia egreso
echo '
<div class="modal fade" id="modalTFE" tabindex="-1" role="dialog" aria-labelledby="modalCHLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="modalCHLabel">Transferencia de egreso de fondos</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<form action="./bancos/grabarOperacionBancaria.php" method="POST" enctype="multipart">
<div class="modal-body">
<div class="col-md-12">
<label>Banco: ' . $idBanco . ' - ' . $descripcionBanco . ' - ' . $nCuentaBanco . '</label>
<div class="card form-group text-success widget-chart2 text-left p-3 card-btm-border card-shadow-primary border-primary">
<div class="row">
<div class="col-md-2">
<label>Documento</label>
<input type="number" required name="nDoc" class="input-lg form-control">
</div>
<div class="col-md-4">
</div>
<div class="col-md-6">
<label>Monto</label>
<input type="number" step="0.01" required name="monto" onkeyup="numero_letra(this.value,6)" class="input-lg form-control">
</div>

<div class="col-md-12">
<label>Proveedor</label>
<select class="input-lg form-control" required name="proveedor">
<option value="" selected>Seleccione</option>';

$queryList = mysqli_query($conn3, "SELECT * from sproveedores WHERE estado = 1");
if ($queryList) {
	while ($rowMotorizado = mysqli_fetch_array($queryList)) {

		$id = $rowMotorizado['id'];
		$nombre = $rowMotorizado['nombre'];
		echo '<option value="' . $id . '">' . $nombre . '</option>';
	}
}

echo '      				
</select>
</div>

<div class="col-md-12">
<label>La Cantidad de</label>
<input type="text" required name="cantidadLetraTFE" id="cantidadLetraTFE" class="input-lg form-control" value="">
</div>

<div class="col-md-6">
<label>Fecha Cheque</label>
<input type="date" required name="fechaCheque" class="input-lg form-control" value="' . date("Y-m-d") . '">
</div>
<div class="col-md-6">
<label>Fecha Liberación</label>
<input type="date" required name="fechaChequeLibera" class="input-lg form-control" >
</div>

</div>
</div>
<div class="row">
<div class="col-md-12">
<label>Detalle Movimiento</label>
<input type="text" required name="detalleMovimiento" class="input-lg form-control" oninput="VerificarCaracteres(this)" >
<hr>
</div>';

echo '<div class="col-md-12" >

	<table id="tabla_cheque-tfe" class="table table-bordered">
	<thead class="thead-light">
	<tr>
		<th>Cuenta Contable</th>
		<th>Concepto</th>
		<th>Debe</th>
		<th>Haber</th>
		<th>Acciones</th>
	</tr>
	</thead>
	<tbody>
	<tr id="tr_chequeprincipal" style="background-color: #80808070;pointer-events: none;">
		<td style="width:35%">
		<select name="CuentaContable[]"  id="cuentacontable_principal-tfe" class="form-control " required>
			<option value="' . $idCuentaContableBanco . '">' . $idCuentaContableBanco . " - " . $NombreCuentaContable . '</option>
		</select>
		<select  id="cuentacontable_principal_oculto-tfe" class="form-control" style="display:none;">
			<option value="0">Seleccione</option>
			' . $OpcionesCuentas . '
		</select>
		</td>
		<td style="width:30%">
		<select name="concepto[]"  id="concepto_principal-tfe" class="form-control " required>
			<option value="0">Banco</option>
		</select>
		<select id="concepto_principal_oculto-tfe" class="form-control" style="display:none;">
			<option value="">Seleccione</option>
			' . $OpcionesConceptos . '
		</select>
		</td>
		<td style="width:15%">
		<input type="number" name="debe[]"  id="debe_principal-tfe" step="0.01" pattern="[0-9]" value="0" class="form-control debe_cheque-tfe blur">
		</td>
		<td style="width:15%">
		<input type="number" name="haber[]"  id="haber_principal-tfe" step="0.01" pattern="[0-9]" value="0" class="form-control haber_cheque-tfe blur">
		</td>
		<td>
		
		</td>
	</tr>
	</tbody>
	</table>
	<div class="row">
		<div class="col-md-6">
		Total DEBE: <input type="number" step="0.01" class="form-control blur" id="totalDebe-tfe" value="0">
		</div>
		<div class="col-md-6">
		Total HABER: <input type="number" step="0.01" class="form-control blur" id="totalHaber-tfe" value="0">
		</div>
		<div class="col-md-12">
		<hr>
		<button type="button" onclick="agregarFilaTFE()" class="btn btn-primary">Agregar fila</button>
		</div>
	</div>
	
	
	<!-- la info correspondiente se cargara en el archivo StransBan.php | las funciones estan abajo de este archivo-->
</div>';

?>
<div class="col-md-12">
	<hr>
	<?php //echo verPlandeCuentas() 
	?>
	<hr>
	<?php echo verCentroCosto() ?>
	<hr>
</div>
<?php
echo '
</div>
</div>
</div>
<div class="modal-footer">
<input type="hidden" name="tipoOper" value="TFE">
<!--<input type="hidden" name="balanceActual" value="' . $balance . '">-->
<input type="hidden" name="idBanco" value="' . $idBanco . '">
<input type="hidden" name="usuario_id" value="' . $usuario_id . '">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
<button type="submit" class="btn btn-primary" id="TotalizarCheque-tfe" >Totalizar</button>
</div>
</form>
</div>
</div>
</div>
';
// fin modal transferencia egreso













// modal tranferencia bancos
echo '
<div class="modal fade" id="modalTFB" tabindex="-1" role="dialog" aria-labelledby="modalCHLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="modalCHLabel">Transferencia de bancos</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<form action="./bancos/grabarOperacionBancaria.php" method="POST" enctype="multipart">
<div class="modal-body">
<div class="col-md-12">
<label>Banco: ' . $idBanco . ' - ' . $descripcionBanco . ' - ' . $nCuentaBanco . '</label>
<div class="card form-group text-success widget-chart2 text-left p-3 card-btm-border card-shadow-primary border-primary">
<div class="row">
<div class="col-md-2">
<label>Documento</label>
<input type="number" required name="nDoc" class="input-lg form-control">
</div>
<div class="col-md-4">
</div>
<div class="col-md-6">
<label>Monto</label>
<input type="number" step="0.01" required name="monto" onkeyup="numero_letra(this.value,7)" class="input-lg form-control">
</div>

<div class="col-md-12">
<label>Tercero/Cliente</label>
<select class="input-lg form-control" required name="beneficiario">
<option value="0" selected>Ninguno</option>';

$queryList = mysqli_query($conn3, "SELECT * from cliente");
if ($queryList) {
	while ($rowMotorizado = mysqli_fetch_array($queryList)) {

		$cliente_id = $rowMotorizado['cliente_id'];
		$nombre_cliente = $rowMotorizado['nombre_cliente'];
		echo '<option value="' . $cliente_id . '">' . $nombre_cliente . '</option>';
	}
}

echo '      				
</select>
</div>

<div class="col-md-12">
<label>La Cantidad de</label>
<input type="text" required name="cantidadLetraTFB" id="cantidadLetraTFB" class="input-lg form-control" value="">
</div>

<div class="col-md-6">
<label>Fecha Cheque</label>
<input type="date" required name="fechaCheque" class="input-lg form-control" value="' . date("Y-m-d") . '">
</div>
<div class="col-md-6">
<label>Fecha Liberación</label>
<input type="date" required name="fechaChequeLibera" class="input-lg form-control" >
</div>

</div>
</div>
<div class="row">

<div class="col-md-12">
	<label>Banco</label>
	<select name="BancoActual_id" class="form-control " required>
		<option value="' . $idBanco . '">' . $nCuentaBanco . " - " . $descripcionBanco . '</option>
	</select>
	<label>Cuenta Contable del banco: ' . $idCuentaContableBanco . '</label>
</div>

<div class="col-md-12">
	<label>Cuenta Contable *Debe*</label>
	<select name="CuentaContableBanco_debe" class="form-control " required>
		<option value="0">Seleccione</option>
		' . $OpcionesCuentas . '
	</select>
</div>


<div class="col-md-12">
<label>Detalle Movimiento</label>
<input type="text" required name="detalleMovimientoBancoDebito" class="input-lg form-control" oninput="VerificarCaracteres(this)">
<hr>
</div>

<div class="col-md-12">
	<label>Banco a transferir</label>
	<select name="BancoTransferir_id" class="form-control " required onchange="CuentaContableBancoTransferir(this)">
		<option value="" selected>Seleccione</option>
	';

$queryList = mysqli_query($conn3, "SELECT * from Sbancos where id!='$idBanco' ");
if ($queryList) {
	while ($rowMotorizado = mysqli_fetch_array($queryList)) {
		$idBancoTransferir = $rowMotorizado['id'];
		$nCuentaBancoTransferir = $rowMotorizado['nCuenta'];
		$descripcionBancoTransferir = $rowMotorizado['descripcion'];

		echo "<option value='$idBancoTransferir'> $nCuentaBancoTransferir - $descripcionBancoTransferir</option>";
	}
}


echo '</select>
	<label>Cuenta Contable del banco: <label id="cuentabancostransferir"></label> </label>
</div>

<div class="col-md-12">
	<label>Cuenta Contable *Haber*</label>
	<select name="CuentaContableBancoTransferir_haber" class="form-control" required>
		<option value="0">Seleccione</option>
		' . $OpcionesCuentas . '
	</select>
</div>


<div class="col-md-12">
<label>Detalle Movimiento</label>
<input type="text" required name="detalleMovimientoBancoCredito" class="input-lg form-control" oninput="VerificarCaracteres(this)">
</div>';


?>
<div class="col-md-12">

	<?php //echo verPlandeCuentas() 
	?>
	<hr>
	<?php echo verCentroCosto() ?>
	<hr>
</div>
<?php
echo '
</div>
</div>
</div>
<div class="modal-footer">
<input type="hidden" name="tipoOper" value="TFB">
<!--<input type="hidden" name="balanceActual" value="' . $balance . '">-->
<input type="hidden" name="idBanco" value="' . $idBanco . '">
<input type="hidden" name="usuario_id" value="' . $usuario_id . '">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
<button type="submit" class="btn btn-primary" id="TotalizarCheque-tfe" >Totalizar</button>
</div>
</form>
</div>
</div>
</div>
';
// fin modal transferencia bancos





























echo '<!-- Modal 1 -->
<div class="modal fade" id="Conciliar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog  modal-lg" role="document">
<div class="modal-content">
<div class="modal-header">
<h2 class="modal-title" id="exampleModalLabel">Transacciones a Conciliar: - ' . $idBanco . ' - ' . $nCuentaBanco . ' - ' . $descripcionBanco . ' </h2>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<div class="">
<div class="col-md-12 row">';

echo '<div class="col-md-12"> <label><b>Fecha Ultima Conciliacion:</b> ' . $FechaUltimoConciliado . '</label> <br> <label><b>Saldo Ultima Conciliacion:</b> ' . $Saldo_Conciliar . '</label> <br>';

echo '<label><b>Marque las Transacciones a conciliar</b> </label> <br></div>
<div class="col-md-12">
<hr>
<label>Saldo del Banco</label>
<input type="number" step="0.01" required name="SaldoBanco"  class="input-lg form-control" onchange="CargarSaldo(this)">
<hr>
</div>
';

echo '<form action="./bancos/GuardarConciliacion.php" method="POST" enctype="multipart" style="width:100%">';

echo '<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
<th>Fecha</th>
<th>Documento</th>
<th>Tipo</th>
<th>Tipo Nombre</th>
<th>Debitos/Cargos</th>
<th>Creditos/Depositos</th>
<th>Accion</th>
</tr>
</thead>
<tbody>';

$queryList = mysqli_query($conn3, "SELECT sb.id as idBan, st.id as idTrans, st.fechaTrans, st.Documento, st.tipo, st.Concepto, st.debito, st.credito, st.balance
	from Sbancos sb
	right join Stransbanco st on sb.id=st.idBanco
	where sb.id=$idBanco and st.Conciliado='0' order by sb.id asc;");
$nrowl = mysqli_num_rows($queryList);
if ($queryList) {
		while ($rowMotorizado = mysqli_fetch_array($queryList)) {

		$idBan = $rowMotorizado['idBan'];
		$idTrans = $rowMotorizado['idTrans'];
		$fechaTrans = $rowMotorizado['fechaTrans'];
		$Documento = $rowMotorizado['Documento'];
		$tipo = $rowMotorizado['tipo'];
		$Concepto = $rowMotorizado['Concepto'];
		$debito = $rowMotorizado['debito'];
		$credito = $rowMotorizado['credito'];
		$balance = $rowMotorizado['balance'];

		$totaldebito += $debito;
		$totalcredito += $credito;

		$Saldoinput = 0;
		if ($debito != "0") {
			$Saldoinput = $debito * -1;
		} elseif ($credito != "0") {
			$Saldoinput = $credito;
		}


		//switch $tipo AP=> Apertura, ND=> Nota de Debito, NC=> Nota de Credito, DP=> Deposito, CH => Cheque, TFI=> Transferencia de ingreso, TFE=> Transferencia de egreso, TFB=> Transferencia de banco

		switch ($tipo) {
			case 'AP':
				$tipoNombre = 'Apertura';
				break;
			case 'ND':
				$tipoNombre = 'Nota de Debito';
				break;
			case 'NC':
				$tipoNombre = 'Nota de Credito';
				break;
			case 'DP':
				$tipoNombre = 'Deposito';
				break;
			case 'CH':
				$tipoNombre = 'Cheque';
				break;
			case 'TFI':
				$tipoNombre = 'Transferencia de ingreso';
				break;
			case 'TFE':
				$tipoNombre = 'Transferencia de egreso';
				break;
			case 'TFB':
				$tipoNombre = 'Transferencia de banco';
				break;
		}
		echo '
		<tr>
		<td>' . $fechaTrans . '</td>
		<td>' . $Documento . '</td>
		<td>' . $tipo . '</td>
		<td>' . $tipoNombre . '</td>
		<td>' . $debito . '</td>
		<td>' . $credito . '</td>
		<td>
		<input type="checkbox" name="DetallesConciliar[' . $idTrans . ']" value="' . $Saldoinput . '" class="ConciliarDetalles" onchange="AgregarSaldoAConciliar(this)"></td>
		</tr>';
	}
}

echo '</tbody>
<tfoot>
<tr>
<th>Fecha</th>
<th>Documento</th>
<th>Tipo Nombre</th>
<th>Concepto</th>
<th>Debitos Totales: ' . $totaldebito . '</th>
<th>Creditos Totales: ' . $totalcredito . '</th>
<th>Accion</th>
</tr>
</tfoot>
</table>';

/*
echo'
<div class="col-md-6">
<p>Total Debitos '.$totaldebito.'</p>
<p>Total Creditos '.$totalcredito.'</p>
</div>
<div class="col-md-6">

</div>
';
*/

echo '<div class="row col-md-12">
	<div class="col-md-6">
	Saldo Banco: <input type="number" step="0.01" class="form-control blur" name="saldobanco" id="saldobanco" value="0">
	</div>
	<div class="col-md-6">
	Saldo final a conciliar: <input type="number" step="0.01" class="form-control blur" name="saldoconciliar" id="saldoconciliar" value="0">
	</div>

	<div class="col-md-12">
	<hr>
	<input type="hidden" name="idBanco" value="' . $idBanco . '">
	<input type="hidden" name="usuario_id" value="' . $usuario_id . '">
	<button type="submit" class="btn btn-primary" id="TotalizarConciliacion" disabled>Totalizar</button>
	</div>
</div>';

echo '</form>';

echo '
</div>
</div>  
</div> 
</div> 
</div> 
</div> 
';
?>

<style type="text/css">
	#tr_chequeprincipal * {
		pointer-events: none;
	}

	#tr_chequeprincipal>td>input[type="number"] {
		background-color: #e9ecef;
	}

	#tr_chequeprincipal>td>select {
		background-color: #e9ecef;
	}

	/* Chrome, Safari, Edge, Opera */
	input::-webkit-outer-spin-button,
	input::-webkit-inner-spin-button {
		-webkit-appearance: none;
		margin: 0;
	}

	/* Firefox */
	input[type=number] {
		-moz-appearance: textfield;
	}
</style>
<script>
	function CargarSaldo(input) {
		var valor = input.value;
		document.getElementById("saldobanco").value = valor;
		AgregarSaldoAConciliar();
	}

	function AgregarSaldoAConciliar() {
		var total = 0;
		const detalles = document.querySelectorAll('.ConciliarDetalles:checked');

		// sumar los valores de cada elemento
		detalles.forEach(detalle => {
			total += parseFloat(detalle.value);
		});

		$('#saldoconciliar').val(Number.isInteger(total) ? total : total.toFixed(2));

		var saldoBanco = $('#saldobanco').val();
		var saldoConciliar = $('#saldoconciliar').val();
		console.log(saldoBanco + " - " + saldoConciliar);

		if (saldoBanco > 0) {
			if (saldoBanco === saldoConciliar) {
				$('#TotalizarConciliacion').prop('disabled', false);
				$('#TotalizarConciliacion').attr('title', '');
			} else {
				$('#TotalizarConciliacion').prop('disabled', true);
				$('#TotalizarConciliacion').attr('title', 'El saldo banco y saldo a conciliar no son iguales');
			}
		}
		document.getElementById("saldoconciliar").value = total;
	}
</script>
<script>
	$(document).on('focus', ".blur", function() {
		$(this).blur();
	});
</script>
<script type="text/javascript">
	function numero_letra($valor, tipo) {
		var valor = $valor;

		$.ajax({
			type: "POST",
			url: "./bancos/ajax_numeroAletra.php",
			data: {
				valor: valor
			},
			success: function(response) {
				/*
				document.getElementById("cantidadLetraCH").value=response;
				document.getElementById("cantidadLetraND").value=response;
				document.getElementById("cantidadLetraDP").value=response;
				document.getElementById("cantidadLetraNC").value=response;
				document.getElementById("cantidadLetraTF").value=response;
				*/

				if (tipo == 1) {
					document.getElementById('haber_principal-crear').value = valor;
					$('#haber_principal-crear').trigger("change");
					document.getElementById("cantidadLetraCH").value = response;
				} else if (tipo == 2) {
					document.getElementById('haber_principal-notadebito').value = valor;
					$('#haber_principal-notadebito').trigger("change");
					document.getElementById("cantidadLetraND").value = response;
				} else if (tipo == 3) {
					document.getElementById('debe_principal-deposito').value = valor;
					$('#debe_principal-deposito').trigger("change");
					document.getElementById("cantidadLetraDP").value = response;
				} else if (tipo == 4) {
					document.getElementById('debe_principal-notacredito').value = valor;
					$('#debe_principal-notacredito').trigger("change");
					document.getElementById("cantidadLetraNC").value = response;
				} else if (tipo == 5) {
					document.getElementById('debe_principal-tfi').value = valor;
					$('#debe_principal-tfi').trigger("change");
					document.getElementById("cantidadLetraTFI").value = response;
				} else if (tipo == 6) {
					document.getElementById('haber_principal-tfe').value = valor;
					$('#haber_principal-tfe').trigger("change");
					document.getElementById("cantidadLetraTFE").value = response;
				} else if (tipo == 7) {
					document.getElementById("cantidadLetraTFB").value = response;
				}

			}
		});



	};
</script>
<script>
	function VerificarCaracteres(input) {
		input.value = input.value.replace(/'/g, "");
		input.value = input.value.replace(/"/g, "");
	}
</script>



<script>
	////////////////////////////////////////////////////////////////? FUNCIONES DEL CREAR CHEQUE ///////////////////////////////////////////////

	function agregarFilaCrear() {
		var tabla = document.getElementById("tabla_cheque-crear");
		var fila = tabla.insertRow(-1);
		var celda1 = fila.insertCell(0);
		var celda2 = fila.insertCell(1);
		var celda3 = fila.insertCell(2);
		var celda4 = fila.insertCell(3);
		var celda5 = fila.insertCell(4);

		celda1.innerHTML = `
    <select name="CuentaContable[]" class="form-control" required>
      ${document.getElementById("cuentacontable_principal_oculto-crear").innerHTML}
    </select>
  `;
		celda1.style.width = '35%';

		celda2.innerHTML = `
    <select name="concepto[]" class="form-control" required>
      ${document.getElementById("concepto_principal_oculto-crear").innerHTML}
    </select>
  `;
		celda2.style.width = '35%';

		celda3.innerHTML = `
    <input type="number" name="debe[]" class="form-control debe_cheque-crear" step="0.01" value="0" pattern="[0-9]" required>
  `;
		celda3.style.width = '15%';

		celda4.innerHTML = `
    <input type="number" name="haber[]" class="form-control haber_cheque-crear blur" step="0.01" value="0" pattern="[0-9]" readonly>
  `;
		celda4.style.width = '15%';

		celda5.innerHTML = `
    <button type="button" class="btn btn-danger" onclick="eliminarFilaCrear(this)">Eliminar</button>
  `;
		celda5.style.width = '5%';
	}

	function eliminarFilaCrear(boton) {
		var fila = boton.parentNode.parentNode;
		fila.parentNode.removeChild(fila);
		$('#debe_principal-crear').trigger("change");
	}

	$(document).on('change', '.debe_cheque-crear, .haber_cheque-crear', function() {
		var debeTotal = 0;
		var haberTotal = 0;

		$('.debe_cheque-crear').each(function() {
			debeTotal += parseFloat($(this).val()) || 0;
		});

		$('.haber_cheque-crear').each(function() {
			haberTotal += parseFloat($(this).val()) || 0;
		});

		$('#totalDebe-crear').val(Number.isInteger(debeTotal) ? debeTotal : debeTotal.toFixed(2));
		$('#totalHaber-crear').val(Number.isInteger(haberTotal) ? haberTotal : haberTotal.toFixed(2));

		if (debeTotal === haberTotal) {
			$('#TotalizarCheque-crear').prop('disabled', false);
			$('#TotalizarCheque-crear').attr('title', '');
		} else {
			$('#TotalizarCheque-crear').prop('disabled', true);
			$('#TotalizarCheque-crear').attr('title', 'El total de "debe" y "haber" no es igual');
		}

	});

	////////////////////////////////////////////////////////////////? FIN FUNCIONES DEL CREAR CHEQUE ///////////////////////////////////////////////




	////////////////////////////////////////////////////////////////? FUNCIONES DEL NOTA DEBITO CHEQUE ///////////////////////////////////////////////

	function agregarFilaNotaDebito() {
		var tabla = document.getElementById("tabla_cheque-notadebito");
		var fila = tabla.insertRow(-1);
		var celda1 = fila.insertCell(0);
		var celda2 = fila.insertCell(1);
		var celda3 = fila.insertCell(2);
		var celda4 = fila.insertCell(3);
		var celda5 = fila.insertCell(4);

		celda1.innerHTML = `
    <select name="CuentaContable[]" class="form-control" required>
      ${document.getElementById("cuentacontable_principal_oculto-notadebito").innerHTML}
    </select>
  `;
		celda1.style.width = '35%';

		celda2.innerHTML = `
    <select name="concepto[]" class="form-control" required>
      ${document.getElementById("concepto_principal_oculto-notadebito").innerHTML}
    </select>
  `;
		celda2.style.width = '35%';

		celda3.innerHTML = `
    <input type="number" name="debe[]" class="form-control debe_cheque-notadebito" step="0.01" value="0" pattern="[0-9]" required>
  `;
		celda3.style.width = '15%';

		celda4.innerHTML = `
    <input type="number" name="haber[]" class="form-control haber_cheque-notadebito blur" step="0.01" value="0" pattern="[0-9]" readonly>
  `;
		celda4.style.width = '15%';

		celda5.innerHTML = `
    <button type="button" class="btn btn-danger" onclick="eliminarFilaNotaDebito(this)">Eliminar</button>
  `;
		celda5.style.width = '5%';
	}

	function eliminarFilaNotaDebito(boton) {
		var fila = boton.parentNode.parentNode;
		fila.parentNode.removeChild(fila);
		$('#debe_principal-notadebito').trigger("change");
	}

	$(document).on('change', '.debe_cheque-notadebito, .haber_cheque-notadebito', function() {
		var debeTotal = 0;
		var haberTotal = 0;

		$('.debe_cheque-notadebito').each(function() {
			debeTotal += parseFloat($(this).val()) || 0;
		});

		$('.haber_cheque-notadebito').each(function() {
			haberTotal += parseFloat($(this).val()) || 0;
		});

		$('#totalDebe-notadebito').val(Number.isInteger(debeTotal) ? debeTotal : debeTotal.toFixed(2));
		$('#totalHaber-notadebito').val(Number.isInteger(haberTotal) ? haberTotal : haberTotal.toFixed(2));

		if (debeTotal === haberTotal) {
			$('#TotalizarCheque-notadebito').prop('disabled', false);
			$('#TotalizarCheque-notadebito').attr('title', '');
		} else {
			$('#TotalizarCheque-notadebito').prop('disabled', true);
			$('#TotalizarCheque-notadebito').attr('title', 'El total de "debe" y "haber" no es igual');
		}

	});

	////////////////////////////////////////////////////////////////? FIN FUNCIONES DE NOTA DEBITO CHEQUE ///////////////////////////////////////////////









	////////////////////////////////////////////////////////////////? FUNCIONES DEL DEPOSITO CHEQUE ///////////////////////////////////////////////

	function agregarFilaDeposito() {
		var tabla = document.getElementById("tabla_cheque-deposito");
		var fila = tabla.insertRow(-1);
		var celda1 = fila.insertCell(0);
		var celda2 = fila.insertCell(1);
		var celda3 = fila.insertCell(2);
		var celda4 = fila.insertCell(3);
		var celda5 = fila.insertCell(4);

		celda1.innerHTML = `
    <select name="CuentaContable[]" class="form-control" required>
      ${document.getElementById("cuentacontable_principal_oculto-deposito").innerHTML}
    </select>
  `;
		celda1.style.width = '35%';

		celda2.innerHTML = `
    <select name="concepto[]" class="form-control" required>
      ${document.getElementById("concepto_principal_oculto-deposito").innerHTML}
    </select>
  `;
		celda2.style.width = '35%';

		celda3.innerHTML = `
    <input type="number" name="debe[]" class="form-control debe_cheque-deposito blur" step="0.01" value="0" pattern="[0-9]" readonly>
  `;
		celda3.style.width = '15%';

		celda4.innerHTML = `
    <input type="number" name="haber[]" class="form-control haber_cheque-deposito" step="0.01" value="0" pattern="[0-9]" required>
  `;
		celda4.style.width = '15%';

		celda5.innerHTML = `
    <button type="button" class="btn btn-danger" onclick="eliminarFilaDeposito(this)">Eliminar</button>
  `;
		celda5.style.width = '5%';
	}

	function eliminarFilaDeposito(boton) {
		var fila = boton.parentNode.parentNode;
		fila.parentNode.removeChild(fila);
		$('#debe_principal-deposito').trigger("change");
	}

	$(document).on('change', '.debe_cheque-deposito, .haber_cheque-deposito', function() {
		var debeTotal = 0;
		var haberTotal = 0;

		$('.debe_cheque-deposito').each(function() {
			debeTotal += parseFloat($(this).val()) || 0;
		});

		$('.haber_cheque-deposito').each(function() {
			haberTotal += parseFloat($(this).val()) || 0;
		});

		$('#totalDebe-deposito').val(Number.isInteger(debeTotal) ? debeTotal : debeTotal.toFixed(2));
		$('#totalHaber-deposito').val(Number.isInteger(haberTotal) ? haberTotal : haberTotal.toFixed(2));

		if (debeTotal === haberTotal) {
			$('#TotalizarCheque-deposito').prop('disabled', false);
			$('#TotalizarCheque-deposito').attr('title', '');
		} else {
			$('#TotalizarCheque-deposito').prop('disabled', true);
			$('#TotalizarCheque-deposito').attr('title', 'El total de "debe" y "haber" no es igual');
		}

	});

	////////////////////////////////////////////////////////////////? FIN FUNCIONES DEL DEPOSITO CHEQUE ///////////////////////////////////////////////






	////////////////////////////////////////////////////////////////? FUNCIONES DE NOTA CREDITO CHEQUE ///////////////////////////////////////////////

	function agregarFilaNotaCredito() {
		var tabla = document.getElementById("tabla_cheque-notacredito");
		var fila = tabla.insertRow(-1);
		var celda1 = fila.insertCell(0);
		var celda2 = fila.insertCell(1);
		var celda3 = fila.insertCell(2);
		var celda4 = fila.insertCell(3);
		var celda5 = fila.insertCell(4);

		celda1.innerHTML = `
    <select name="CuentaContable[]" class="form-control" required>
      ${document.getElementById("cuentacontable_principal_oculto-notacredito").innerHTML}
    </select>
  `;
		celda1.style.width = '35%';

		celda2.innerHTML = `
    <select name="concepto[]" class="form-control" required>
      ${document.getElementById("concepto_principal_oculto-notacredito").innerHTML}
    </select>
  `;
		celda2.style.width = '35%';

		celda3.innerHTML = `
    <input type="number" name="debe[]" class="form-control debe_cheque-notacredito blur" step="0.01" value="0" pattern="[0-9]" readonly>
  `;
		celda3.style.width = '15%';

		celda4.innerHTML = `
    <input type="number" name="haber[]" class="form-control haber_cheque-notacredito" step="0.01" value="0" pattern="[0-9]" required>
  `;
		celda4.style.width = '15%';

		celda5.innerHTML = `
    <button type="button" class="btn btn-danger" onclick="eliminarFilaNotaCredito(this)">Eliminar</button>
  `;
		celda5.style.width = '5%';
	}

	function eliminarFilaNotaCredito(boton) {
		var fila = boton.parentNode.parentNode;
		fila.parentNode.removeChild(fila);
		$('#debe_principal-notacredito').trigger("change");
	}

	$(document).on('change', '.debe_cheque-notacredito, .haber_cheque-notacredito', function() {
		var debeTotal = 0;
		var haberTotal = 0;

		$('.debe_cheque-notacredito').each(function() {
			debeTotal += parseFloat($(this).val()) || 0;
		});

		$('.haber_cheque-notacredito').each(function() {
			haberTotal += parseFloat($(this).val()) || 0;
		});

		$('#totalDebe-notacredito').val(Number.isInteger(debeTotal) ? debeTotal : debeTotal.toFixed(2));
		$('#totalHaber-notacredito').val(Number.isInteger(haberTotal) ? haberTotal : haberTotal.toFixed(2));

		if (debeTotal === haberTotal) {
			$('#TotalizarCheque-notacredito').prop('disabled', false);
			$('#TotalizarCheque-notacredito').attr('title', '');
		} else {
			$('#TotalizarCheque-notacredito').prop('disabled', true);
			$('#TotalizarCheque-notacredito').attr('title', 'El total de "debe" y "haber" no es igual');
		}

	});

	////////////////////////////////////////////////////////////////? FIN FUNCIONES DE NOTA CREDITO CHEQUE ///////////////////////////////////////////////



	////////////////////////////////////////////////////////////////? FUNCIONES DE TRANSFERENCIA DE INGRESO DE FONDOS CHEQUE ///////////////////////////////////////////////

	function agregarFilaTFI() {
		var tabla = document.getElementById("tabla_cheque-tfi");
		var fila = tabla.insertRow(-1);
		var celda1 = fila.insertCell(0);
		var celda2 = fila.insertCell(1);
		var celda3 = fila.insertCell(2);
		var celda4 = fila.insertCell(3);
		var celda5 = fila.insertCell(4);

		celda1.innerHTML = `
    <select name="CuentaContable[]" class="form-control" required>
      ${document.getElementById("cuentacontable_principal_oculto-tfi").innerHTML}
    </select>
  `;
		celda1.style.width = '35%';

		celda2.innerHTML = `
    <select name="concepto[]" class="form-control" required>
      ${document.getElementById("concepto_principal_oculto-tfi").innerHTML}
    </select>
  `;
		celda2.style.width = '35%';

		celda3.innerHTML = `
    <input type="number" name="debe[]" class="form-control debe_cheque-tfi blur" step="0.01" value="0" pattern="[0-9]" readonly>
  `;
		celda3.style.width = '15%';

		celda4.innerHTML = `
    <input type="number" name="haber[]" class="form-control haber_cheque-tfi" step="0.01" value="0" pattern="[0-9]" required>
  `;
		celda4.style.width = '15%';

		celda5.innerHTML = `
    <button type="button" class="btn btn-danger" onclick="eliminarFilaTFI(this)">Eliminar</button>
  `;
		celda5.style.width = '5%';
	}

	function eliminarFilaTFI(boton) {
		var fila = boton.parentNode.parentNode;
		fila.parentNode.removeChild(fila);
		$('#debe_principal-tfi').trigger("change");
	}

	$(document).on('change', '.debe_cheque-tfi, .haber_cheque-tfi', function() {
		var debeTotal = 0;
		var haberTotal = 0;

		$('.debe_cheque-tfi').each(function() {
			debeTotal += parseFloat($(this).val()) || 0;
		});

		$('.haber_cheque-tfi').each(function() {
			haberTotal += parseFloat($(this).val()) || 0;
		});

		$('#totalDebe-tfi').val(Number.isInteger(debeTotal) ? debeTotal : debeTotal.toFixed(2));
		$('#totalHaber-tfi').val(Number.isInteger(haberTotal) ? haberTotal : haberTotal.toFixed(2));

		if (debeTotal === haberTotal) {
			$('#TotalizarCheque-tfi').prop('disabled', false);
			$('#TotalizarCheque-tfi').attr('title', '');
		} else {
			$('#TotalizarCheque-tfi').prop('disabled', true);
			$('#TotalizarCheque-tfi').attr('title', 'El total de "debe" y "haber" no es igual');
		}

	});

	////////////////////////////////////////////////////////////////? FIN FUNCIONES DE TRANSFERENCIA DE INGRESO DE FONDOS CHEQUE ///////////////////////////////////////////////





	////////////////////////////////////////////////////////////////? FUNCIONES DE TRANSFERENCIA DE EGRESO DE FONDOS CHEQUE ///////////////////////////////////////////////

	function agregarFilaTFE() {
		var tabla = document.getElementById("tabla_cheque-tfe");
		var fila = tabla.insertRow(-1);
		var celda1 = fila.insertCell(0);
		var celda2 = fila.insertCell(1);
		var celda3 = fila.insertCell(2);
		var celda4 = fila.insertCell(3);
		var celda5 = fila.insertCell(4);

		celda1.innerHTML = `
    <select name="CuentaContable[]" class="form-control" required>
      ${document.getElementById("cuentacontable_principal_oculto-tfe").innerHTML}
    </select>
  `;
		celda1.style.width = '35%';

		celda2.innerHTML = `
    <select name="concepto[]" class="form-control" required>
      ${document.getElementById("concepto_principal_oculto-tfe").innerHTML}
    </select>
  `;
		celda2.style.width = '35%';

		celda3.innerHTML = `
    <input type="number" name="debe[]" class="form-control debe_cheque-tfe" step="0.01" value="0" pattern="[0-9]" required>
  `;
		celda3.style.width = '15%';

		celda4.innerHTML = `
    <input type="number" name="haber[]" class="form-control haber_cheque-tfe blur" step="0.01" value="0" pattern="[0-9]" readonly>
  `;
		celda4.style.width = '15%';

		celda5.innerHTML = `
    <button type="button" class="btn btn-danger" onclick="eliminarFilaTFE(this)">Eliminar</button>
  `;
		celda5.style.width = '5%';
	}

	function eliminarFilaTFE(boton) {
		var fila = boton.parentNode.parentNode;
		fila.parentNode.removeChild(fila);
		$('#debe_principal-tfe').trigger("change");
	}

	$(document).on('change', '.debe_cheque-tfe, .haber_cheque-tfe', function() {
		var debeTotal = 0;
		var haberTotal = 0;

		$('.debe_cheque-tfe').each(function() {
			debeTotal += parseFloat($(this).val()) || 0;
		});

		$('.haber_cheque-tfe').each(function() {
			haberTotal += parseFloat($(this).val()) || 0;
		});

		$('#totalDebe-tfe').val(Number.isInteger(debeTotal) ? debeTotal : debeTotal.toFixed(2));
		$('#totalHaber-tfe').val(Number.isInteger(haberTotal) ? haberTotal : haberTotal.toFixed(2));

		if (debeTotal === haberTotal) {
			$('#TotalizarCheque-tfe').prop('disabled', false);
			$('#TotalizarCheque-tfe').attr('title', '');
		} else {
			$('#TotalizarCheque-tfe').prop('disabled', true);
			$('#TotalizarCheque-tfe').attr('title', 'El total de "debe" y "haber" no es igual');
		}

	});

	////////////////////////////////////////////////////////////////? FIN FUNCIONES DE TRANSFERENCIA DE EGRESO DE FONDOS CHEQUE ///////////////////////////////////////////////



	////////////////////////////////////////////////////////////////? FUNCIONES DE TRANSFERENCIA DE BANCOS CHEQUE ///////////////////////////////////////////////

	function CuentaContableBancoTransferir(input) {

		var banco_id = input.value;
		$.ajax({
			type: "POST",
			url: "Ajax_SBancos.php",
			data: {
				banco_id: banco_id
			},
			success: function(response) {
				$('#cuentabancostransferir').html(response);
			}
		});

	}

	////////////////////////////////////////////////////////////////? FIN FUNCIONES DE TRANSFERENCIA DE BANCOS CHEQUE ///////////////////////////////////////////////
</script>