<?php
date_default_timezone_set('America/Bogota');
include("conexiones/conexion.php");
include("funciones/conexiones.php");
include("funciones/funciones.php");
$conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));
$usuario_id = isset($_POST['usuario_id']) ?? 0 ;
$cedula = $_POST['CODI_CLIENTE'];
$queryList = mysqli_query($conn3, "SELECT * from cliente");
$nrowl = mysqli_num_rows($queryList);
$idP='';
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
	$CODI_CLIENTE = $rowMotorizado['CODI_CLIENTE'];
	$idC    = $rowMotorizado['cliente_id'];
	if ($CODI_CLIENTE == "$cedula") {
		echo '....' . $cedula . "<font color = 'red'> El documento está repetido!('Pulse -ACEPTAR- para ver historial del Paciente')</font>";
		$idP = $idC;
	}
}
?>
<?php if (strlen($idP) > 0) : ?>
	<div class="col-md-12" align="center">
		<a class="btn btn-block btn-primary btn-sm" target="_blank" href="<?php echo $Base; ?>consultaCliente.php?clienteId=<?php echo $idP; ?>">
			<i class="fa fa-print"></i> Aceptar
		</a>
	</div>
<?php endif ?>