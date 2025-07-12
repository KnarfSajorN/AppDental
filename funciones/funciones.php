<?php
$IDActivo = 0;
//include '../masterFunciones.php';
include __DIR__ . '/../masterFunciones.php';

include 'masterFunciones.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 28 10 2024
// cambio de obtencion de ip del cliente gracias a proxy cloudflare
function getClientIP()
{
	if (isset($_SERVER['HTTP_CF_CONNECTING_IP'])) {
		// IP del cliente proporcionada por Cloudflare
		return $_SERVER['HTTP_CF_CONNECTING_IP'];
	} else {
		// En caso de que ninguna opción anterior esté disponible
		return $_SERVER['REMOTE_ADDR'];
	}
}

$userIp = getClientIP();
// 20 06 2024
// configurar variable global para la ubicación del usuario
// $_SESSION['geoData'] = '';
if (!isset($_SESSION['geoData']) || $_SESSION['geoData'] == '' || $_SESSION['geoData'] == null) {
	// $userIp = $_SERVER['REMOTE_ADDR'];
	// $geoData = json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip={$userIp}"));
	// $ch = curl_init("http://www.geoplugin.net/json.gp?ip={$userIp}");
	$ch = curl_init("http://ip-api.com/php/{$userIp}");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_USERAGENT, 'PHP cURL');
	$response = curl_exec($ch);
	if (curl_errno($ch)) {
	} else {
		$geoData = (unserialize($response));
	}
	curl_close($ch);

	$_SESSION['geoData'] = $geoData;
}
//date_default_timezone_set($_SESSION['geoData']['timezone']);
if (isset($_SESSION['geoData']['timezone'])) {
    date_default_timezone_set($_SESSION['geoData']['timezone']);
} else {
    date_default_timezone_set('America/Lima'); // zona horaria por defecto
}
// if ($_GET['userIp']) {
// 	var_dump($_SESSION['geoData']['timezone']);
// }


$Base = 'http://localhost:81/app.dentalsoftplus.com/';
$sistema = 'Dentalsoft';

//$IDActivo = $_SESSION['ID'];
$IDActivo = $_SESSION['ID'] ?? 0; // o usa un valor por defecto o lanza error

if ($IDActivo = 0) {
	echo "<script language='Javascript'> window.location='index.php';</script>";
}


$NOMBRE_DB_GLOBAL = 'erpdental_dev_baseDental';

$host = 'localhost';
$userdb ='root'; //'erpdental_root';
$pass2 = '123456';//'0GUYR8d[0wF$0GUYR8d[0wF$';
$DB = 'erpdental_dev_baseDental';
$conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));
mysqli_set_charset($conn3, "utf8mb4");

// --------------------------------------
// Nuevas funciones para el sistema
// --------------------------------------

// Función para encriptado de datos
function salt()
{
	$caracteres = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$longitud = strlen($caracteres);
	$resultado = '';
	for ($i = 0; $i < 10; $i++) {
		$pos = rand(0, $longitud - 1);
		$resultado .= $caracteres[$pos];
	}
	return $resultado;
}

function decrypt($dato)
{
	// el dato tiene 10 caracteres de basura y luego la clave en base64
	return base64_decode(substr($dato, 10, strlen($dato)));
}

function encrypt($dato)
{
	return salt() . base64_encode($dato);
}

// Función para iniciar sesión
function loginUser($username, $password)
{
	global $conn3;
	global $connSieven;

	// Consulta SQL para buscar el usuario por el nombre de usuario
	$query = "SELECT * FROM usuarios WHERE USUARIO = '$username'";
	$result = mysqli_query($conn3, $query);

	// Verificar si la consulta tuvo éxito
	if ($result) {
		// Validar si se encontró al menos un usuario
		if (mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_assoc($result);
			// validar si el usuario esta activo
			if ($row['ACTIVO'] !== '1' and $row['ACTIVO'] !== '2' ) {
			//	if ($row['ACTIVO'] !== '1') {
				$return = ['error' => true, 'mensaje' => 'El usuario no se encuentra activo'];
				return json_encode($return);
			}
			if ($row['PASS'] !== $password) {
				$return = ['error' => true, 'mensaje' => 'La contraseña no coincide'];
				return json_encode($return);
			}
			session_start();
			$_SESSION['ACTIVO'] = $row['ACTIVO'];
			$_SESSION['loggedin'] = true;
			$_SESSION['username'] = $username;
			$_SESSION['NOMBRE_USUARIO'] = $row['NOMBRE_USUARIO'];
			$_SESSION['ID'] = $row['ID'];
			$_SESSION['ID_principal'] = ($row['ID_principal'] == '0' ? $row['ID'] : $row['ID_principal']);
			$_SESSION['TIPO'] = $row['TIPO'];
			$_SESSION['rol'] = $row['rol'];
			$_SESSION['telefono'] = $row['telefono'];
			$_SESSION['SalaNumero'] = 0;
			$_SESSION['idCitas'] = 0;
			$_SESSION['tema'] = $row['tema'];
			$_SESSION['sistema'] = '';
			$_SESSION['POS'] = '0';
			$_SESSION['vista'] = $row['vista'];
			$_SESSION['sucursal'] = ($row['sucursal'] == '' ? 0 : $row['sucursal']);
			$BNombre = $_SESSION['NOMBRE_USUARIO'];
			$_SESSION['start'] = time();
			$_SESSION['expire'] = $_SESSION['start'] + 10800;
			$_SESSION['fechaVenceLic'] = $row['fechaVenceLic'];
			$_SESSION['idBitacora'] = $row['idBitacora'];

			$idBitacora = $row['idBitacora'];

			$_SESSION['vencido'] = ($row['fechaVenceLic'] < date('Y-m-d') ? '1' : '0');

			$_SESSION['idOperacion']=0;

/*
if ($_SESSION['ACTIVO'] == 2)
{

	$querysOperacionInv = "SELECT * FROM sOperacionInv where bitacoraclienteId = '$idBitacora' and tipo = '2' ORDER BY idOperacion DESC LIMIT 1 ";
	$resultsOperacionInv = mysqli_query($connSieven, $query);

	// Verificar si la consulta tuvo éxito
	if ($resultsOperacionInv) 
	{
		// Validar si se encontró al menos una  operacion
		if (mysqli_num_rows($resultsOperacionInv) > 0) 
		{
			$rowsOperacionInv = mysqli_fetch_assoc($resultsOperacionInv);

			$_SESSION['idOperacion'] = $rowsOperacionInv['idOperacion'];

		}
	}
}*/


			 
			foreach ($row as $key => $value)
				$_SESSION["user"][$key] = $value;
			if ($_SESSION['ID_principal'] == 3) {
				$return = ['error' => false, 'mensaje' => 'Bienvenido ' . $row['NOMBRE_USUARIO'], 'location' => 'Calendario_C.php'];
			} else {
				$return = ['error' => false, 'mensaje' => 'Bienvenido ' . $row['NOMBRE_USUARIO'], 'location' => 'portada.php'];
			}
			// Usuarios que quiera calendario como pantalla principal

			return json_encode($return);
		} else {
			// Si no se encontró el usuario
			$return = ['error' => true, 'mensaje' => 'El usuario no existe'];
			return json_encode($return);
		}
	} else {
		// Si hubo un error en la consulta
		$return = ['error' => true, 'mensaje' => 'Error en la consulta'];
		return json_encode($return);
	}
}
// --------------------------------------






function tablaExiste($table)
{
	global $conn3;
	$table_exists_query = "SHOW TABLES LIKE '$table'";
	$table_exists_result = mysqli_query($conn3, $table_exists_query);
	if ($table_exists_result && mysqli_num_rows($table_exists_result) > 0) {
		return true;
	} else {
		return false;
	}
}


function step()
{
	// funcion para traducir los decimales de la configuración del sistema y aplicarlo a input de tipo number
	$decimales = $_SESSION['decimales'];
	$step = ($decimales > 1 ? '0.' : '');
	for ($i = 1; $i < $decimales; $i++) {
		$step .= '0';
	}
	$step .= '1';
	return $step;
}

function decimales()
{
	$decimales = $_SESSION['decimales'];
	return $decimales;
}

// -------------------------------------- ඞ

function funcionLotes($filtro, $campoFiltrar, $campoImprimir, $tabla)
{
	include 'conn3.php';
	$query = mysqli_query($conn3, "SELECT * FROM $tabla where $campoFiltrar = '$filtro' and activo = 1");
	//echo" SELECT * FROM $tabla where $campoFiltrar = '$filtro'";

	$nrowl = mysqli_num_rows($query);
	while ($row = mysqli_fetch_array($query)) {

		$text1 = $row[$campoImprimir];
		$text .= '<br>' . $text1;
	}

	return $text;
}


function SelectInterconsulta($idmedico)
{
	include 'conn3.php';

	$queryList = mysqli_query($conn3, "SELECT * FROM 	usuariosInterconsulta where tipo='$idmedico' and ACTIVO=1 ");
	$nrowl = mysqli_num_rows($queryList);
	while ($fila = mysqli_fetch_array($queryList)) {

		echo '<option value="' . $fila['ID'] . '">' . $fila['nombre'] . '</option>';
	}



	return trim($texto);
}


function funcionMaster($filtro, $campoFiltrar, $campoImprimir, $tabla, $config = null)
{
	// $config resive un arreglo con la configuracion que quieran usar
	// tu puedes poner lo que quieras hacer, la meta la pones tu :v
	if ($config && !empty($config)) { // valores para configurar
		$arrayAccept = [ // funciones a utilizar
			"like",  // deja filtrar valores con un like teniendo en cuenta que solo va a devolver un valor
			"order", // para indicar el orden de la consulta for example: order => "id asc"
			"returnConsult", // en el caso de que no se ejecute la consulta devuelve la consulta para validación
			"notResult" // para personalizar el mensaje en el caso de que este vacio
		];
		$arrayConfig = [];
		foreach ($config as $key => $value) {
			if (!in_array($key, $arrayAccept)) { // si no se envia un valor que no este configurado lo devuelve para que sepa que no esta configurado
				return "Invalid configuration parameter $key"; // en ingles pa que sepa que ta mal
			} else {
				$arrayConfig[$key] = $value;
			}
		}
		$order = ($arrayConfig["order"] && !empty($arrayConfig["order"]) ? $arrayConfig["order"] : "");
		$condicion = ($arrayConfig["like"] && ($arrayConfig["like"] == true) ? "$campoFiltrar like '%$filtro%'" : "$campoFiltrar = '$filtro'");
		$return = ($arrayConfig["returnConsult"] && ($arrayConfig["returnConsult"] == true) ? 1 : 0);
	} else { // valores por defecto
		$order = "";
		$condicion = "$campoFiltrar = '$filtro'";
		$return = 0;
	}

	include 'conn3.php';
	$query = mysqli_query($conn3, "SELECT $campoImprimir FROM $tabla where $condicion " . (!empty($order) ? "order by $order" : "") . " limit 1");
	if ($query) {
		$row = mysqli_fetch_array($query);
		if (!empty(mysqli_num_rows($query))) {
			return $row[$campoImprimir];
		} else {
			if (!empty($return)) {
				return "SELECT $campoImprimir FROM $tabla where $condicion " . (!empty($order) ? "order by $order" : "") . " limit 1";
			} else {
				// return ($arrayConfig["notResult"] ? $arrayConfig["notResult"] : "not result");
				return ($arrayConfig["notResult"] ? $arrayConfig["notResult"] : ""); // jaja sorry
			}
		}
	}
}
function cambiarFormatoFecha($fecha, $format)
{
	return date($format, strtotime($fecha));
}
// Esteban

function selectMaster($whereselect, $campoValue, $campoTexto, $tabla)
{
	$text = "";
	# Esteban
	try {
		include 'conn3.php';

		$arraytexto = explode(",", $campoTexto);
		$arrayvalue = explode(",", $campoValue);

		$query = mysqli_query($conn3, "SELECT * FROM $tabla " . $whereselect);
		// var_dump("SELECT * FROM $tabla " . $whereselect);
		$nrowl = mysqli_num_rows($query);
		//echo $query;
		$textoprint='';
		$valueprint='';
		while ($row = mysqli_fetch_array($query)) {
			for ($i = 0; $i < count($arraytexto); $i++) {
				$textoprint .= $row[$arraytexto[$i]] . ' - ';
			}
			$textoprint = trim($textoprint, ' - ');

			for ($k = 0; $k < count($arrayvalue); $k++) {
				$valueprint .= $row[$arrayvalue[$k]] . ' - ';
			}
			$valueprint = trim($valueprint, ' - ');


			$text .= "<option value='$valueprint'>$textoprint</option>";
			$textoprint = "";
			$valueprint = "";
		}
	} catch (Exception $th) {
		# Esto es meramente para saber un error
		//$text = "<option value=''>Error</option>";
		$text = "<option value=''>Error</option>".$th;
		//error_log("SELECT * FROM $tabla ");
		//$text = "<option value=''>".$th."</option>";
	} finally {
		return utf8_encode($text);
	}
}

function DatosIngresarMysqli($valor)
{
	include "funciones/conn3.php";
	foreach ($valor as $key => $value) {
		if (is_array($value)) {
			$Arreglo[$key] = DatosIngresarMysqli($value);
		} else {
			if (json_decode($value) === null) {
				$Arreglo[$key] = mysqli_real_escape_string($conn3, $value);
			} else {
				$Arreglo[$key] = $value;
			}
		}
	}
	return $Arreglo;
}


/////////////////////////////////////////////////////////////////////////////////
function ConsultarMasInformacion_Facturacion_Funcion($idProductoT, $SinvDep_id)
{
	include 'funciones/conn3.php';
	$QueryInventario = mysqli_query($conn3, "SELECT * FROM  sinvetrios where ID = $idProductoT");
	while ($RowInventario = mysqli_fetch_array($QueryInventario)) {
		$tipo = $RowInventario['tipo'];
	}
	$TipoInventario = funcionMaster($tipo, 'id', 'tipo', 'scategoria');

	/////////////////////////////////////////////////////////////////////////////
	$TextoInventario = "";
	if ($TipoInventario == "3") {

		$TextoInventarioCompuesto = "";
		$resultCompuestos = mysqli_query($conn3, "SELECT * from SinvComp where idCompuesto = '$idProductoT' and activo = 1");
		while ($rowCompuestos = mysqli_fetch_array($resultCompuestos)) {
			$TextoInventarioCompuesto .= funcionMaster($rowCompuestos['idSinvetrios'], 'id', 'descripcion', 'sinvetrios') . " x" . $rowCompuestos['cantidad'] . " | ";
		}
		$TextoInventarioCompuesto = trim($TextoInventarioCompuesto, ' | ');
		$TextoInventario = "[" . $TextoInventarioCompuesto . "]";
	} else if ($TipoInventario == "5") {

		$TextoInventarioLotesTallas = "";
		$resultCompuestos = mysqli_query($conn3, "SELECT * from SinvDep where id = '$SinvDep_id' ");
		while ($rowCompuestos = mysqli_fetch_array($resultCompuestos)) {
			if ($TipoInventario == "5") {
				$TextoInventarioLotesTallas = $rowCompuestos['lote'];
			}
		}
		$TextoInventario = "[" . $TextoInventarioLotesTallas . "]";
	}

	return "<br>" . $TextoInventario;
}
/////////////////////////////////////////////////////////////////////////////////











function datosPacientes_antiguo($clienteId)
{
	include 'conn3.php';
	$queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id=$clienteId");
	$nrowl = mysqli_num_rows($queryList);
	while ($rowMotorizado = mysqli_fetch_array($queryList)) {
		$usuario_id = $rowMotorizado['usuario_id'];
		$nombre_cliente = $rowMotorizado['nombre_cliente'];
		$celular_cliente = $rowMotorizado['celular_cliente'];
		$ciudad_cliente = $rowMotorizado['ciudad_cliente'];
		$correo_cliente = $rowMotorizado['correo_cliente'];
		$CODI_CLIENTE = $rowMotorizado['CODI_CLIENTE'];
		$id_uso_servicio = $rowMotorizado['id_uso_servicio'];
		$tipo_cliente = $rowMotorizado['tipo_cliente'];
		$fechar = $rowMotorizado['fechar'];
		$fecha_actualizado = $rowMotorizado['fecha_actualizado'];
		$activo = $rowMotorizado['activo'];
		$genero = $rowMotorizado['genero'];
		$direccion_cliente = $rowMotorizado['direccion_cliente'];
		$telefono_cliente = $rowMotorizado['telefono_cliente'];
		$edad_cliente = $rowMotorizado['edad_cliente'];
		$profesion_cliente = $rowMotorizado['profesion_cliente'];
		$acompananteFamiliar = $rowMotorizado['acompananteFamiliar'];
		$telefono_acompanante = $rowMotorizado['telefono_acompanante'];
		$antecedentes = $rowMotorizado['antecedentes'];
		$fotoperfil = $rowMotorizado['fotoperfil'];
		$tiposSangre = $rowMotorizado['tiposSangre'];
		$dis = $rowMotorizado['dis'];
		$tipodiscapacidad = $rowMotorizado['tipodiscapacidad'];
		$etnia = $rowMotorizado['etnia'];
		$esDonante = $rowMotorizado['esDonante'];
		$tomaMedicamento = $rowMotorizado['tomaMedicamento'];

		$fechaNacimiento = $rowMotorizado['fechaNacimiento'];

		$entidadSalud = $rowMotorizado['entidadSalud'];
		$seguro = $rowMotorizado['seguro'];

		$nota = $rowMotorizado['nota'];
		$enfermedadesPequeno = $rowMotorizado['enfermedadesPequeno'];
		$alergias = $rowMotorizado['alergias'];


		$peso = $rowMotorizado['peso'];
		$altura = $rowMotorizado['altura'];
		$imc = $rowMotorizado['imc'];
		$ComposicionCorporal = $rowMotorizado['ComposicionCorporal'];

		// -----------------------------------------------------------------------

		$ap1 = $rowMotorizado['ap1'];
		$ap2 = $rowMotorizado['ap2'];
		$ap3 = $rowMotorizado['ap3'];
		$ap4 = $rowMotorizado['ap4'];
		$ap5 = $rowMotorizado['ap5'];
		$ap6 = $rowMotorizado['ap6'];
		$ap7 = $rowMotorizado['ap7'];
		$ap8 = $rowMotorizado['ap8'];
		$ap9 = $rowMotorizado['ap9'];

		$cirugiasCuales = $rowMotorizado['cirugiasCuales'];
		$cirugiasOtros = $rowMotorizado['cirugiasOtros'];
		$whatsapp = $rowMotorizado['whatsapp'];
		$tipoUsuario = $rowMotorizado['tipoUsuario'];
		$estado = $rowMotorizado['estado'];
		$ocupacion = $rowMotorizado['ocupacion'];
	}




	if (strlen($fotoperfil) > 0) {
		$fotoperfil_img = '<img src="' . $Base . 'pascientes/' . $fotoperfil . '" width="90%" height="20%">';
	} else {
		$fotoperfil_img = '';
	}




	$text = '<div class="row">
													<div class="col-md-12">

														<div class="col-md-5">
															<label><strong>Correo:</strong></label>
															<label> ' . ($correo_cliente) . '  </label>

															<br>
															<label><strong>Nombre:</strong></label>
															<label>' . $nombre_cliente . ' </label>

															<br>
															<label><strong>Celular:</strong></label>
															<label>' . ($celular_cliente) . '</label>

															<br>
															<label><strong>Ciudad:</strong></label>
															<label>' . $ciudad_cliente . '</label>

															<br>
															<label><strong>Fecha registro:</strong></label>
															<label>' . $fechar . '</label>

															<br>
															<label><strong>Tipo:</strong></label>
															<label>' . $tipo_cliente . '</label>

															<br>
															<label><strong>Cedula o ID:</strong></label>
															<label>' . $CODI_CLIENTE . '</label>
<!--
															<br>
															<label><strong> Es donante:</strong></label>
															<label>' . $esDonante . '</label> -->

															<br>
															<label><strong>Entidad de salud :</strong></label>
															<label>' . $entidadSalud . '</label>


														</div>

														<div class="col-md-5">


															<label><strong> Fecha de nacimiento :</strong></label>
															<label>' . $fechaNacimiento . '</label>

															<br>
															<label><strong> Edad :</strong></label>
															<label>' . CalculoEdadPaciente($fechaNacimiento) . '</label>

															<br>
															<label><strong>Genero:</strong></label>
															<label>' . $genero . '</label>
<!--
															<br>
															<label><strong>Profesión :</strong></label>
															<label>' . $profesion_cliente . '</label>  -->

															<br>
															<label><strong>Tipo de sangre :</strong></label>
															<label>' . $tiposSangre . '</label>

															<br>
															<label><strong>  Dirección cliente:</strong></label>
															<label>' . $direccion_cliente . '</label>

															<br>
															<label><strong> Teléfono :</strong></label>
															<label>' . ($telefono_cliente) . '</label>

															<!--<br>
															<label><strong>Tiene alguna Discapacidad :</strong></label>
															<label>' . $dis . '</label>-->

															<!--<br>
															<label><strong>Discapacidad:</strong></label>
															<label>' . $tipodiscapacidad . '</label>-->

															<br>
															<label><strong>Ocupación :</strong></label>
															<label>' . $ocupacion . '</label>


														</div>

														<div class="col-md-2">

                                                            ' . $fotoperfil_img . '
														</div>
													</div>

													<div class="row">
														<div class="col-md-12">
															<hr>
														</div>
													</div>

													<div class="col-md-12"> ';

	if ($tomaMedicamento <> '') {
		echo '
														<div class="col-md-12">
														<label><strong>Toma algún medicamento:</strong></label>
														<label>' . $tomaMedicamento . '</label>
														</div>';
	}

	echo '
														<div class="form-group col-md-2" align="right">
															Alergias a las aines  ' . sino($ap1) . '
														</div>

														<div class="form-group col-md-2" align="right">
															Asma ' . sino($ap2) . '
														</div>

														<div class="form-group col-md-2" align="right">
															HTA ' . sino($ap3) . '
														</div>

														<div class="form-group col-md-2" align="right">
															Diabetes ' . sino($ap4) . '
														</div>

														<div class="form-group col-md-2" align="right">
															Hipotiroidismo ' . sino($ap5) . '
														</div>

														<div class="form-group col-md-2" align="right">
															Tabaquismo ' . sino($ap6) . '
														</div>

														<div class="form-group col-md-2" align="right">
															Licor ' . sino($ap7) . '
														</div>

														<div class="form-group col-md-2" align="right">
															Otras Alergias ' . sino($ap8) . '
														</div>

														<div class="form-group col-md-2" align="right">
															Cirugías ' . sino($ap9) . '
														</div>
													</div>
													<div class="col-md-12" >
														<label><strong>Antecedentes Familiares:</strong></label>
														<label>' . $enfermedadesPequeno . '</label>.
														<br>
														<label><strong>Alergias :</strong></label>
														<label>' . $alergias . '</label>
														<br>
														<label><strong>Notas adicionales :</strong></label>
														<label>' . $nota . '</label>.
													</div>
												</div>
												';








	return $text;
}

function datosPacientes($clienteId)
{
	include 'conn3.php';
	//$queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id = $clienteId");
	$queryList = mysqli_query($conn3, "SELECT * FROM cliente WHERE cliente_id = $clienteId LIMIT 1");
	if ($queryList) {
		while ($rowMotorizado = mysqli_fetch_array($queryList)) {
			$nombre_cliente = $rowMotorizado['nombre_cliente'];
			$tipo_cliente = $rowMotorizado['tipo_cliente'];
			$CODI_CLIENTE = $rowMotorizado['CODI_CLIENTE'];
			$direccion_cliente = $rowMotorizado['direccion_cliente'];
			$whatsapp = $rowMotorizado['whatsapp'];
			$correo_cliente = $rowMotorizado['correo_cliente'];

			$fechaNacimiento = $rowMotorizado['fechaNacimiento'];
			$genero = $rowMotorizado['genero'];
			$tiposSangre = $rowMotorizado['tiposSangre'];
			$profesion_cliente = $rowMotorizado['profesion_cliente'];
			$entidadSalud = $rowMotorizado['cod_entidad'];
			$estado = $rowMotorizado['estado'];

			$fotoperfil = $rowMotorizado['fotoperfil'];

			$ap1 = sino($rowMotorizado['ap1']);
			$ap2 = sino($rowMotorizado['ap2']);
			$ap3 = sino($rowMotorizado['ap3']);
			$ap4 = sino($rowMotorizado['ap4']);
			$ap5 = sino($rowMotorizado['ap5']);
			$ap6 = sino($rowMotorizado['ap6']);
			$ap7 = sino($rowMotorizado['ap7']);
			$ap8 = sino($rowMotorizado['ap8']);
			$ap9 = sino($rowMotorizado['ap9']);

			$enfermedadesPequeno = $rowMotorizado['enfermedadesPequeno'];
			$alergias = $rowMotorizado['alergias'];
			$nota = $rowMotorizado['nota'];

			$cirugiasCuales = $rowMotorizado['cirugiasCuales'];
			$tomaMedicamento = $rowMotorizado['tomaMedicamento'];

			$ocupacion = $rowMotorizado['ocupacion'];

			$QueryEntidad = mysqli_query($conn3, "SELECT * FROM  Rips_Entidades where id='$rowMotorizado[entidad_id]'");
			if ($QueryEntidad) {
				while ($RowEntidad = mysqli_fetch_array($QueryEntidad)) {
					$entidadSalud = $RowEntidad['Nombre'];
				}
			}
		}
	}


	if (strlen($fotoperfil) > 0) {
		$fotoperfil_img = $Base . 'pascientes/' . $fotoperfil . '';
	} else {
		if ($genero == "F") {
			$fotoperfil_img = $Base . 'css/Mujer.png';
		} else {
			$fotoperfil_img = $Base . 'css/Hombre.jfif';
		}
	}

	echo "<style>
     .card_info {
         border: 1px solid #ddd;
         border-radius: 3px;
         margin: 20px 0;
         padding: 10px;
    }
     .card_info-wrapper {
         padding-top: 87px;
    }
     .profile-card_info {
         margin-top: 0;
         padding-top: 75px;
         text-align: center;
    }
     .profile-card_info .profile-photo {
         border: 6px solid white;
         margin-left: -78px;
         position: absolute;
         top: 0;
         width: 162px;
		 height: 162px;
         border-color: #3a8bb9;
    }
     .profile-card_info .profile-name {
         margin-top: 0;
    }
     .profile-card_info .profile-note {
         line-height: 1.75;
    }
     .profile-card_info .profile-note p {
         margin-bottom: 20px;
    }
     .profile-card_info .link-more {
         font-weight: bold;
         text-transform: uppercase;
    }
     .card_info-footer {
         background: #eee;
         margin: -10px;
         margin-top: 0;
         padding: 3px;
    }
     .card_info-footer .list-inline {
         margin-bottom: 0;
    }
     .list-social a {
         font-size: 1.75em;
         padding: 0 6px;
    }

        </style>";
	//cold-m-6 -> nombre_cliente, tipo_cliente, CODI_CLIENTE, direccion_cliente, whatsapp, correo_cliente col-md-6-> fechaNacimiento,edad, genero, tiposSangre, profesion_cliente, entidadSalud
	$edad = CalculoEdadPaciente($fechaNacimiento);
	echo "<div class='main-content' style='background: white;'>
                    <div class='row'>
                    <div class='col-sm-1'></div>

                    <div class='col-sm-10'>
                        <div class='card_info-wrapper'>
                        <div class='card_info profile-card_info'>
                            <h3 class='profile-name'>{$nombre_cliente}</h3>
                            <img class='profile-photo img-circle' src='{$fotoperfil_img}' />
                            <div class='profile-note row'>
                            <div class='col-md-4 col-sm-6'>
                            <hr style='margin: 0;'>
                            <label><strong>Nombre : </strong></label> $nombre_cliente
							<br>
                            <label><strong>Tipo Documento: </strong></label> $tipo_cliente
                            <br>
                            <label><strong>Número Documento : </strong></label> $CODI_CLIENTE
                            <br>
                            <label><strong>Dirección : </strong></label> $direccion_cliente
                            <br>
                            <label><strong>WhatsApp : </strong></label> $whatsapp
                            <br>
                            <label><strong>Correo : </strong></label> $correo_cliente
                            </div>
                            <div class='col-md-4 col-sm-6'>
                            <hr style='margin: 0;'>
                            <label><strong>Fecha de Nacimiento : </strong></label> $fechaNacimiento
                            <br>
                            <label><strong>Edad : </strong></label> $edad
                            <br>
                            <label><strong>Género : </strong></label> $genero
                            <br>
                            <label><strong>Tipo de Sangre : </strong></label> $tiposSangre
                            <br>
                            <label><strong>Ocupación : </strong></label> $ocupacion
                            <br>
                            <label><strong>Entidad de Salud : </strong></label> $entidadSalud
                            <br>
                            </div>
                            <div class='col-md-4 col-sm-12'>
                            <hr style='margin: 0;'>

                            <div class='row'>
                                <div class='col-md-6'>
                                    <label><strong>Alergias a las aines : </strong></label> $ap1
                                </div>
                                <div class='col-md-6'>
                                    <label><strong>Asma : </strong></label> $ap2
                                </div>
                                <div class='col-md-6'>
                                    <label><strong>HTA : </strong></label> $ap3
                                </div>
                                <div class='col-md-6'>
                                    <label><strong>Diabetes : </strong></label> $ap4
                                </div>
                                <div class='col-md-6'>
                                    <label><strong>Hipotiroidismo : </strong></label> $ap5
                                </div>
                                <div class='col-md-6'>
                                    <label><strong>Tabaquismo : </strong></label> $ap6
                                </div>
                                <div class='col-md-6'>
                                    <label><strong>Licor : </strong></label> $ap7
                                </div>
                                <div class='col-md-6'>
                                    <label><strong>Otras Alergias : </strong></label> $ap8
                                </div>
                                <div class='col-md-6'>
                                    <label><strong>Cirugías : </strong></label> $ap9
                                </div>
                            </div>
                            <br>
                            </div>
                            </div>
                            <!-- .note -->
                            <div class='card_info-footer' style='text-align: left;padding: 10px;'>
                            <ul class='list-social list-inline'>
                            <div class='row'>
								<div class='col-md-12'>
                                    <label><strong>Cuales Cirugías : </strong></label> $cirugiasCuales
                                </div>
								<div class='col-md-12'>
                                    <label><strong>Medicamentos : </strong></label> $tomaMedicamento
                                </div>
                                <div class='col-md-12'>
                                    <label><strong>Antecedentes Familiares : </strong></label> $enfermedadesPequeno
                                </div>
                                <div class='col-md-12'>
                                    <label><strong>Alergias : </strong></label> $alergias
                                </div>
                                <div class='col-md-12'>
                                    <label><strong>Nota Adicional : </strong></label> $nota
                                </div>

                            <!--
                                <li><a href='http://savanahsteigen.com' class='btn btn-link disabled'><i class='fa fa-globe' aria-hidden='true'></i><span class='sr-only'>Website</span></a></li>
                                <li><a href='https://twitter.com/savanahsteigen' class='btn btn-link'><i class='fa fa-twitter-square' aria-hidden='true'></i><span class='sr-only'>@savanahsteigen</span></a></li>
                                <li><a href='https://linkedin.com/in/savanahsteigen' class='btn btn-link'><i class='fa fa-linkedin-square' aria-hidden='true'></i><span class='sr-only'>LinkedIn</span></a></li>
                                <li><a href='https://facebook.com/savanahsteigen' class='btn btn-link'><i class='fa fa-facebook-square' aria-hidden='true'></i><span class='sr-only'>Facebook</span></a></li>
                                <li><a href='https://github.com/ssteigen' class='btn btn-link'><i class='fa fa-github' aria-hidden='true'></i><span class='sr-only'>GitHub</span></a></li>
                            -->
                            </ul>
                            </div>
                        </div>
                        </div>
                        <!-- .vcard_info -->
                    </div>
                    <!-- .col -->

                    <div class='col-sm-1'></div>
                    </div>

            </div>";
}


function datosPacientesReducido($clienteId)
{
	include 'conn3.php';
	$queryList = mysqli_query($conn3, "SELECT * FROM  cliente WHERE cliente_id = $clienteId LIMIT 1");
	while ($rowMotorizado = mysqli_fetch_array($queryList)) {
		$nombre_cliente = $rowMotorizado['nombre_cliente'];
		$tipo_cliente = $rowMotorizado['tipo_cliente'];
		$CODI_CLIENTE = $rowMotorizado['CODI_CLIENTE'];
		$direccion_cliente = $rowMotorizado['direccion_cliente'];
		$whatsapp = $rowMotorizado['whatsapp'];
		$correo_cliente = $rowMotorizado['correo_cliente'];

		$fechaNacimiento = $rowMotorizado['fechaNacimiento'];
		$genero = $rowMotorizado['genero'];
		$tiposSangre = $rowMotorizado['tiposSangre'];
		$profesion_cliente = $rowMotorizado['profesion_cliente'];
		$entidadSalud = $rowMotorizado['cod_entidad'];
		$estado = $rowMotorizado['estado'];

		$fotoperfil = $rowMotorizado['fotoperfil'];

		$ap1 = sino($rowMotorizado['ap1']);
		$ap2 = sino($rowMotorizado['ap2']);
		$ap3 = sino($rowMotorizado['ap3']);
		$ap4 = sino($rowMotorizado['ap4']);
		$ap5 = sino($rowMotorizado['ap5']);
		$ap6 = sino($rowMotorizado['ap6']);
		$ap7 = sino($rowMotorizado['ap7']);
		$ap8 = sino($rowMotorizado['ap8']);
		$ap9 = sino($rowMotorizado['ap9']);

		$enfermedadesPequeno = $rowMotorizado['enfermedadesPequeno'];
		$alergias = $rowMotorizado['alergias'];
		$nota = $rowMotorizado['nota'];

		$cirugiasCuales = $rowMotorizado['cirugiasCuales'];
		$tomaMedicamento = $rowMotorizado['tomaMedicamento'];

		$ocupacion = $rowMotorizado['ocupacion'];

		$QueryEntidad = mysqli_query($conn3, "SELECT * FROM  Rips_Entidades where id='$rowMotorizado[entidad_id]'");
		while ($RowEntidad = mysqli_fetch_array($QueryEntidad)) {
			$entidadSalud = $RowEntidad['Nombre'];
		}
	}

	if (strlen($fotoperfil) > 0) {
		$fotoperfil_img = $Base . 'pascientes/' . $fotoperfil . '';
	} else {
		if ($genero == "F") {
			$fotoperfil_img = $Base . 'css/Mujer.png';
		} else {
			$fotoperfil_img = $Base . 'css/Hombre.jfif';
		}
	}

	echo "<style>
     .card_info {
         border: 1px solid #ddd;
         border-radius: 3px;
         margin: 20px 0;
         padding: 10px;
    }
     .card_info-wrapper {
         padding-top: 87px;
    }
     .profile-card_info {
         margin-top: 0;
         padding-top: 40px;
         text-align: center;
    }
     .profile-card_info .profile-photo {
         border: 6px solid white;
         margin-left: -65px;
         position: absolute;
         top: 0;
         width: 127px;
		 height: 127px;
         border-color: #3a8bb9;
    }
     .profile-card_info .profile-name {
         margin-top: 0;
    }
     .profile-card_info .profile-note {
         line-height: 1.75;
    }
     .profile-card_info .profile-note p {
         margin-bottom: 20px;
    }
     .profile-card_info .link-more {
         font-weight: bold;
         text-transform: uppercase;
    }
     .card_info-footer {
         background: #eee;
         margin: -10px;
         margin-top: 0;
         padding: 3px;
    }
     .card_info-footer .list-inline {
         margin-bottom: 0;
    }
     .list-social a {
         font-size: 1.75em;
         padding: 0 6px;
    }

        </style>";
	//cold-m-6 -> nombre_cliente, tipo_cliente, CODI_CLIENTE, direccion_cliente, whatsapp, correo_cliente col-md-6-> fechaNacimiento,edad, genero, tiposSangre, profesion_cliente, entidadSalud
	$edad = CalculoEdadPaciente($fechaNacimiento);
	echo "<div class='main-content' style='background: white;'>
                    <div class='row'>
                    <div class='col-sm-1'></div>

                    <div class='col-sm-10'>
                        <div class='card_info-wrapper'>
							<div class='card_info profile-card_info'>
								<h3 class='profile-name'>{$nombre_cliente}</h3>
								<img class='profile-photo img-circle' src='{$fotoperfil_img}' />
								<div class='profile-note row'>
									<div class='col-md-6 col-sm-6'>
									<hr style='margin: 0;'>
									<label><strong>Nombre : </strong></label> $nombre_cliente
									<br>
									<label><strong>Tipo Documento: </strong></label> $tipo_cliente
									<br>
									<label><strong>Número Documento : </strong></label> $CODI_CLIENTE
									<br>
									<label><strong>Dirección : </strong></label> $direccion_cliente
									<br>
									<label><strong>WhatsApp : </strong></label> $whatsapp
									<br>
									<label><strong>Correo : </strong></label> $correo_cliente
									</div>
									<div class='col-md-6 col-sm-6'>
									<hr style='margin: 0;'>
									<label><strong>Fecha de Nacimiento : </strong></label> $fechaNacimiento
									<br>
									<label><strong>Edad : </strong></label> $edad
									<br>
									<label><strong>Género : </strong></label> $genero
									<br>
									<label><strong>Tipo de Sangre : </strong></label> $tiposSangre
									<br>
									<label><strong>Ocupación : </strong></label> $ocupacion
									<br>
									<label><strong>Entidad de Salud : </strong></label> $entidadSalud
									<br>
									</div>

								</div>

							</div>
                        </div>
                        <!-- .vcard_info -->
                    </div>
                    <!-- .col -->

                    <div class='col-sm-1'></div>
                    </div>

            </div>";
}

function datosPacienteClienteContado()
{
	include 'conn3.php';
	
	if (strlen($fotoperfil) > 0) {
		$fotoperfil_img = $Base . 'pascientes/' . $fotoperfil . '';
	} else {
		if ($genero == "F") {
			$fotoperfil_img = $Base . 'css/Mujer.png';
		} else {
			$fotoperfil_img = $Base . 'css/Hombre.jfif';
		}
	}

	echo "<style>
     .card_info {
         border: 1px solid #ddd;
         border-radius: 3px;
         margin: 20px 0;
         padding: 10px;
    }
     .card_info-wrapper {
         padding-top: 87px;
    }
     .profile-card_info {
         margin-top: 0;
         padding-top: 40px;
         text-align: center;
    }
     .profile-card_info .profile-photo {
         border: 6px solid white;
         margin-left: -65px;
         position: absolute;
         top: 0;
         width: 127px;
		 height: 127px;
         border-color: #3a8bb9;
    }
     .profile-card_info .profile-name {
         margin-top: 0;
    }
     .profile-card_info .profile-note {
         line-height: 1.75;
    }
     .profile-card_info .profile-note p {
         margin-bottom: 20px;
    }
     .profile-card_info .link-more {
         font-weight: bold;
         text-transform: uppercase;
    }
     .card_info-footer {
         background: #eee;
         margin: -10px;
         margin-top: 0;
         padding: 3px;
    }
     .card_info-footer .list-inline {
         margin-bottom: 0;
    }
     .list-social a {
         font-size: 1.75em;
         padding: 0 6px;
    }

        </style>";
	//cold-m-6 -> nombre_cliente, tipo_cliente, CODI_CLIENTE, direccion_cliente, whatsapp, correo_cliente col-md-6-> fechaNacimiento,edad, genero, tiposSangre, profesion_cliente, entidadSalud
	echo "<div class='main-content' style='background: white;'>
                    <div class='row'>
                    <div class='col-sm-1'></div>

                    <div class='col-sm-10'>
                        <div class='card_info-wrapper'>
							<div class='card_info profile-card_info'>
								<h3 class='profile-name'>Cliente Contado</h3>
								<img class='profile-photo img-circle' src='{$fotoperfil_img}' />
								<div class='profile-note row'>
									<div class='col-md-12 col-sm-12'>
									<hr style='margin: 0;'>
									<label><strong>Nombre : </strong></label> Cliente Contado
									<br>
									</div>

								</div>

							</div>
                        </div>
                        <!-- .vcard_info -->
                    </div>
                    <!-- .col -->

                    <div class='col-sm-1'></div>
                    </div>

            </div>";
}

function datosProveedorReducido($proveedor_id)
{
	include 'conn3.php';
	$queryList = mysqli_query($conn3, "SELECT * FROM  sproveedores where id = '$proveedor_id'");
	while ($rowMotorizado = mysqli_fetch_array($queryList)) {
		$nombre = $rowMotorizado['nombre'];
		$rut = $rowMotorizado['rut'];
		$correo = $rowMotorizado['correo'];

		$direccion = $rowMotorizado['direccion'];
		$telefono = $rowMotorizado['telefono'];
	}

	if (strlen($fotoperfil) > 0) {
		$fotoperfil_img = $Base . 'pascientes/' . $fotoperfil . '';
	} else {
		if ($genero == "F") {
			$fotoperfil_img = $Base . 'css/Mujer.png';
		} else {
			$fotoperfil_img = $Base . 'css/Hombre.jfif';
		}
	}

	echo "<style>
     .card_info {
         border: 1px solid #ddd;
         border-radius: 3px;
         margin: 20px 0;
         padding: 10px;
    }
     .card_info-wrapper {
         padding-top: 87px;
    }
     .profile-card_info {
         margin-top: 0;
         padding-top: 40px;
         text-align: center;
    }
     .profile-card_info .profile-photo {
         border: 6px solid white;
         margin-left: -65px;
         position: absolute;
         top: 0;
         width: 127px;
		 height: 127px;
         border-color: #3a8bb9;
    }
     .profile-card_info .profile-name {
         margin-top: 0;
    }
     .profile-card_info .profile-note {
         line-height: 1.75;
    }
     .profile-card_info .profile-note p {
         margin-bottom: 20px;
    }
     .profile-card_info .link-more {
         font-weight: bold;
         text-transform: uppercase;
    }
     .card_info-footer {
         background: #eee;
         margin: -10px;
         margin-top: 0;
         padding: 3px;
    }
     .card_info-footer .list-inline {
         margin-bottom: 0;
    }
     .list-social a {
         font-size: 1.75em;
         padding: 0 6px;
    }

        </style>";

	echo "<div class='main-content' style='background: white;'>
                    <div class='row'>
                    <div class='col-sm-1'></div>

                    <div class='col-sm-10'>
                        <div class='card_info-wrapper'>
							<div class='card_info profile-card_info'>
								<h3 class='profile-name'>{$nombre_cliente}</h3>
								<img class='profile-photo img-circle' src='{$fotoperfil_img}' />
								<div class='profile-note row'>
									<div class='col-md-12 col-sm-12'>
									<hr style='margin: 0;'>
									<label><strong>Nombre : </strong></label> $nombre
									<br>
                                    </div>
                                    <div class='col-md-6 col-sm-6'>
                                    <hr style='margin: 0;'>
									<label><strong>RUT : </strong></label> $rut
									<br>
									<label><strong>Dirección : </strong></label> $direccion
									<br>
									</div>
									<div class='col-md-6 col-sm-6'>
									<hr style='margin: 0;'>
									<label><strong>Teléfono : </strong></label> $telefono
									<br>
									<label><strong>Correo : </strong></label> $correo
									<br>
									</div>

								</div>

							</div>
                        </div>
                        <!-- .vcard_info -->
                    </div>
                    <!-- .col -->

                    <div class='col-sm-1'></div>
                    </div>

            </div>";
}


function auditorMaster($idUsuario, $tipo, $accion, $query)
{
	include 'conn3.php';

	date_default_timezone_set('America/Bogota');

	$ip = $_SERVER['REMOTE_ADDR'];

	$fecha = date("Y-m-d H:i:s");

	mysqli_query($conn3, "INSERT INTO auditor (idUsuario, ip, fecha, tipo, accion, query) VALUES ('$idUsuario', '$ip', '$fecha', '$tipo', '$accion', '$query');");
}



// function rgbToHex($rgb) {
// 	$hex = "#";
// 	$hex .= str_pad(dechex($rgb[0]), 2, "0", STR_PAD_LEFT);
// 	$hex .= str_pad(dechex($rgb[1]), 2, "0", STR_PAD_LEFT);
// 	$hex .= str_pad(dechex($rgb[2]), 2, "0", STR_PAD_LEFT);
// 	return $hex;
//   }






















function enviarCorreoPDFVertical($mailto, $mailfrom, $mailsubject, $content, $message)
{


	// LLmamos a la biblioteca para la creacion del PDF
	require_once('html2pdf/html2pdf.class.php');

	// Declaramos el formato del documento PDF
	$html2pdf = new HTML2PDF('P', 'A4', 'fr');

	$html2pdf->setDefaultFont('Arial');
	$html2pdf->writeHTML($content, isset($_GET['vuehtml']));

	$html2pdf = new HTML2PDF('P', 'A4', 'fr');
	$html2pdf->WriteHTML($content);


	$to = $mailto;
	$from = $mailfrom;
	$subject = $mailsubject;

	//$message = "<p>Consulte el archivo adjunto.</p>";
	$separator = md5(time());
	$eol = PHP_EOL;
	$filename = "pdf-documento.pdf";
	$pdfdoc = $html2pdf->Output('', 'S');
	$attachment = chunk_split(base64_encode($pdfdoc));




	$headers = "From: " . $from . $eol;
	$headers .= "MIME-Version: 1.0" . $eol;
	$headers .= "Content-Type: multipart/mixed; boundary=\"" . $separator . "\"" . $eol . $eol;

	$body = '';

	$body .= "Content-Transfer-Encoding: 7bit" . $eol;
	$body .= "This is a MIME encoded message." . $eol; //had one more .$eol


	$body .= "--" . $separator . $eol;
	$body .= "Content-Type: text/html; charset=\"iso-8859-1\"" . $eol;
	$body .= "Content-Transfer-Encoding: 8bit" . $eol . $eol;
	$body .= $message . $eol;


	$body .= "--" . $separator . $eol;
	$body .= "Content-Type: application/octet-stream; name=\"" . $filename . "\"" . $eol;
	$body .= "Content-Transfer-Encoding: base64" . $eol;
	$body .= "Content-Disposition: attachment" . $eol . $eol;
	$body .= $attachment . $eol;
	$body .= "--" . $separator . "--";

	if (mail($to, $subject, $body, $headers)) {
		echo 'Email enviado Correctamente';
	} else {

		echo 'Email no ha sido enviado';
	}
}










function enviarCorreoPDFHorizantal($mailto, $mailfrom, $mailsubject, $content, $message)
{


	// LLmamos a la biblioteca para la creacion del PDF
	require_once('html2pdf/html2pdf.class.php');

	// Declaramos el formato del documento PDF
	$html2pdf = new HTML2PDF('L', 'A4', 'fr');

	$html2pdf->setDefaultFont('Arial');
	$html2pdf->writeHTML($content, isset($_GET['vuehtml']));

	$html2pdf = new HTML2PDF('L', 'A4', 'fr');
	$html2pdf->WriteHTML($content);


	$to = $mailto;
	$from = $mailfrom;
	$subject = $mailsubject;

	//$message = "<p>Consulte el archivo adjunto.</p>";
	$separator = md5(time());
	$eol = PHP_EOL;
	$filename = "pdf-documento.pdf";
	$pdfdoc = $html2pdf->Output('', 'S');
	$attachment = chunk_split(base64_encode($pdfdoc));




	$headers = "From: " . $from . $eol;
	$headers .= "MIME-Version: 1.0" . $eol;
	$headers .= "Content-Type: multipart/mixed; boundary=\"" . $separator . "\"" . $eol . $eol;

	$body = '';

	$body .= "Content-Transfer-Encoding: 7bit" . $eol;
	$body .= "This is a MIME encoded message." . $eol; //had one more .$eol


	$body .= "--" . $separator . $eol;
	$body .= "Content-Type: text/html; charset=\"iso-8859-1\"" . $eol;
	$body .= "Content-Transfer-Encoding: 8bit" . $eol . $eol;
	$body .= $message . $eol;


	$body .= "--" . $separator . $eol;
	$body .= "Content-Type: application/octet-stream; name=\"" . $filename . "\"" . $eol;
	$body .= "Content-Transfer-Encoding: base64" . $eol;
	$body .= "Content-Disposition: attachment" . $eol . $eol;
	$body .= $attachment . $eol;
	$body .= "--" . $separator . "--";

	if (mail($to, $subject, $body, $headers)) {
		echo 'Email enviado Correctamente';
	} else {

		echo 'Email no ha sido enviado';
	}
}





















if (isset($_POST['recover_pas'])) {

	$email = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['email'])));
	$q = mysqli_query($conn3, "select * from usuarios where USUARIO='$email'");
	$check = mysqli_num_rows($q);
	if ($check != 0) {
		$mensaje_recover_pas = '
			<div class="callout callout-info">
			<h4>Enviado!</h4>

          <p>Su contraseña fue enviada al correo por favor verifique y acceda. <br>  <a href="index.php"> <strong> Iniciar sesion</strong></a> </p>
        </div>';
		$data = mysqli_fetch_array($q);
		//$string="Hey,".$data['NOMBRE_USUARIO'].", Tu clave es ".$data['PASS'];
		//mail($email, "Recuperacion de contraseña", $string);



		$para = "$email";

		// título
		$título = 'Bienvenido a Dentalsoft. Recuperación de contraseña';

		// mensaje
		$mensaje = '
				<html>
				<head>
				  <title>Recuperar contraseña</title>
				    <table width="100%" height="466" border="0">
				  <tr>
				    <td><table width="100%" height="75" border="0">

				    </table>
				      <table width="100%" height="143" border="0">
				        <tr>
				          <td height="139" bgcolor="#00A74B"><table width="100%" height="62" border="0">
				            <tr>
				              <td width="5%">&nbsp;</td>
				              <td width="72%" style="color:#FFF;"><h2><strong>La información de tu Cuenta : </strong></h2></td>

				              <td width="23%">&nbsp;</td>
				            </tr>
				          </table></td>
				        </tr>
				      </table>
				      <table width="100%" height="122" border="0">
				        <tr>
				          <td width="10%">&nbsp;</td>
				          <td width="80%"><p></p>
				            <p>  <br />
				               <h3 align="center">Usuario:  ' . $email . '  </h3>
				                <h3 align="center">Contraseña : ' . $data['PASS'] . ' </h3>
				               <h3 align="center">Nombre: ' . $data['NOMBRE_USUARIO'] . ' </h3>
				               <h3 align="center">Inicia Sesión  <a href="' . $Base . 'index.php" target="_blank">Aquí</a></h3>
				               <br></br>
				<p>Atentamente,<br />
				  DentalSoft</p>

				<br />



				          <td width="10%">&nbsp;</td>
				        </tr>
				    </table>
				      <table width="100%" border="0">
				        <tr>
				          <td height="21" bgcolor="#00A74B">&nbsp;</td>
				        </tr>
				      </table>
				      <table width="100%" height="64" border="0">
				        <tr>
				          <td height="60">Este correo electrónico no puede recibir respuestas. Para obtener más información, accede a
				          <a href="https://dentalsoftcolombia.com/soportemedicalsoft" target="_blank"> dentalsoftcolombia.com/soportemedicalsoft</a>
				          <br />
				         </td>
				        </tr>
				    </table></td>
				  </tr>
				</table>
				</head>
				<body>

				</body>
				</html>
				';

		// Para enviar un correo HTML, debe establecerse la cabecera Content-type
		$cabeceras = 'MIME-Version: 1.0' . "\r\n";
		$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

		// Cabeceras adicionales
		$cabeceras .= 'To: sievensoft <noreply@dentalsoftcolombia.com>' . "\r\n";
		$cabeceras .= 'From: Bienvenido a Dentalsoft. Recuperación de contraseña<noreply@dentalsoftcolombia.com>' . "\r\n";
		$cabeceras .= 'Cc: noreply@dentalsoftcolombia.com' . "\r\n";
		$cabeceras .= 'Bcc: noreply@dentalsoftcolombia.com' . "\r\n";

		// Enviarlo
		mail($para, $título, $mensaje, $cabeceras);
	} else {
		$mensaje_recover_pas = '
  <div class="callout callout-danger ">
          <h4>Error!</h4>

          <p>El correo electrónico que ingresaste no coincide con ninguna cuenta..</p>
        </div>';
	}
}



if (isset($_POST['registro_usuario'])) {


	//name email password confirmPassword
	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
		$ip = $_SERVER['HTTP_CLIENT_IP'];
	} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	} else {
		$ip = $_SERVER['REMOTE_ADDR'];
	}
	$url = "http://api.wipmania.com/" . $ip;
	$country = file_get_contents($url);
	//echo $country;

	$name = $_POST['nombre'];
	$email = $_POST['email'];
	$password = $_POST['clave'];
	$confirmPassword = $_POST['clave2'];
	$ciudad = $_POST['ciudad'];
	$pais = $_POST['pais'];
	// $especialidad2		= $_POST['especialidad'];
	$especialidad2 = utf8_encode($_POST['especialidad']);
	$telefono = $_POST['telefono'];
	$Nacimiento = $_POST['Nacimiento'];
	$aliado = $_POST['aliado'];
	$perfil = $_POST['perfil'];
	$vista = $_POST['vista'];
	$correo = $_POST['correo'];
	$fec_ingreso = date("Y-m-d h:m:s");
	$menu = $_POST['menu'];





	list($perfil2, $especialidad) = explode("/", $especialidad2);
	echo $perfil2;          // foo
	echo $especialidad;    // *


	//Verificamos que las claves sean iguales
	if ($password <> $confirmPassword) {
		$mensaje_registro_usuario = '
	  		<div class="callout callout-danger ">
	          <h4>Error!</h4>
	          <p>La contraseña no coincide   </p>
	        </div>';
	}

	$q = mysqli_query($conn3, "select * from usuarios where USUARIO='$email'");
	$check = mysqli_num_rows($q);

	//Verificamos si el correo no esta Registrado
	if ($check != 0) {
		$mensaje_registro_usuario = '
	  		<div class="callout callout-danger ">
	          <h4>Error!</h4>
	          <p>Correo regsitrado por favor acceder     </p>
	        </div>';
	} elseif ($password == $confirmPassword) {




		mysqli_query($conn3, "INSERT INTO usuarios (USUARIO, PASS,   NOMBRE_USUARIO,  fec_ingreso, especialidad, rol,  pais,  paisacceso, telefono, vista, correo, menu)
	 			   VALUES ('$email', '$password',   '$name',  '$fec_ingreso', '$especialidad2', '$perfil',  '$pais',  '$country', '$telefono', '$vista', '$correo', '$menu')");
		// echo "INSERT INTO usuarios (USUARIO, PASS,   NOMBRE_USUARIO,  fec_ingreso, especialidad, rol,  pais,  paisacceso, telefono, vista, correo, menu)
		// VALUES ('$email', '$password',   '$name',  '$fec_ingreso', '$especialidad2', '$perfil',  '$pais',  '$country', '$telefono', '$vista', '$correo', '$menu')";

		$queryList = mysqli_query($conn3, "SELECT max(ID) as idUsu FROM usuarios");
		$nrowl = mysqli_num_rows($queryList);
		while ($rowMotorizado = mysqli_fetch_array($queryList)) {
			$idUsu = $rowMotorizado['idUsu'];
		}


		$q = mysqli_query($conn3, "select * from usuarios where USUARIO='$email'");
		$check = mysqli_num_rows($q);
		$data = mysqli_fetch_array($q);
		$ID_Usuario = $data['ID'];



		mysqli_query($conn3, "INSERT INTO config (ID_Usuario) VALUES ('$ID_Usuario')");

		if ($perfil <> 1 or $perfil <> 2) {

			mysqli_query($conn3, "INSERT INTO c_catalogo (idUsuario) VALUES ('$ID_Usuario');");
		}


		/*
																					  $usuario_id = $ID_Usuario . 'pos';
																					  $ldp2 = $ID_Usuario . 'cups';
																					  $cie10 = $ID_Usuario . 'cie10';


																					  mysqli_query($conn3, "CREATE TABLE $usuario_id(
																			  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
																			  codigo varchar(15) NOT NULL,
																			  descripcion varchar(180) NOT NULL,
																			  pactivo varchar(120)  NULL,
																			  concentracion varchar(80)  NULL,
																			  formafarmaceutica varchar(180)  NULL,
																			  aclaracion 	text  NULL
																			  )");



																					  mysqli_query($conn3, "CREATE TABLE $cie10(
																			  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
																			  codigo  VARCHAR(8) NOT NULL,
																			  descripcion text NOT NULL
																			  )");

																					  $queryListldp = mysqli_query($conn3, "SELECT * FROM  pos");

																					  $nrowl = mysqli_num_rows($queryListldp);

																					  while ($rowldp = mysqli_fetch_array($queryListldp)) {

																						  $codigo = $rowldp['codigo'];
																						  $descripcion = $rowldp['descripcion'];
																						  $pactivo = $rowldp['pactivo'];
																						  $concentracion = $rowldp['concentracion'];
																						  $formafarmaceutica = $rowldp['formafarmaceutica'];
																						  $aclaracion = $rowldp['aclaracion'];
																						  mysqli_query($conn3, "INSERT INTO $usuario_id (codigo, descripcion, pactivo, concentracion, formafarmaceutica, aclaracion)
																						  VALUES ('$codigo', '$descripcion', '$pactivo', '$concentracion', '$formafarmaceutica', '$aclaracion');");
																					  }




																					  $queryListldpc1 = mysqli_query($conn3, "SELECT * FROM  cie10");

																					  $nrowl = mysqli_num_rows($queryListldpc1);

																					  while ($rowldpc1 = mysqli_fetch_array($queryListldpc1)) {

																						  $codigo = $rowldpc1['codigo'];
																						  $descripcion = $rowldpc1['descripcion'];

																						  mysqli_query($conn3, "INSERT INTO $cie10 (codigo, descripcion) VALUES ('$codigo', '$descripcion');");
																					  }
																			  */






		// $especialidad



		$mensaje_registro_usuario = '
  		<div class="callout callout-danger ">
          <h4>Enviado!</h4>

          <p>Bienvenido , Gracias por  Registrarse en Dentalsoft <br>  <a href="index.php"> <strong> Sign In</strong></a> </p>
        </div>';

		//$string="Hey,".$data['NOMBRE_USUARIO'].", Tu clave es ".$data['PASS'];
		//mail($email, "Recuperacion de contraseña", $string);

		$para = "$email";

		// título
		$titulo = 'Bienvenido , Gracias por  Registrarse en Dentalsoft';
		// mensaje
		$mensaje = '
				<html>
				<head>
				  <title>Registro de Cuenta</title>
				    <table width="100%" height="466" border="0">
				  <tr>
				    <td><table width="100%" height="75" border="0">

				    </table>
				      <table width="100%" height="143" border="0">
				        <tr>
				          <td height="139" bgcolor="#00A74B"><table width="100%" height="62" border="0">
				            <tr>
				              <td width="5%">&nbsp;</td>
				              <td width="72%" style="color:#FFF;"><h2><strong>Registro exitoso . Ya puedes usar la mejor Historia Clínica virtual de latinoamerica ...</strong></h2></td>
				              <td width="23%">&nbsp;</td>
				            </tr>
				          </table></td>
				        </tr>
				      </table>
				      <table width="100%" height="122" border="0">
				        <tr>
				          <td width="10%">&nbsp;</td>
				          <td width="80%"><p>Te recordamos tu usuario y contraseña para ingresar , este no cambiara si tienes alguna duda atravez de tu software tienes varias herramientas para comunicarte con nosotros whatsapp , correo , chat en vivo , skype  :

						</p>
				            <p>  <br />
				               <h3 align="center">Usuario:  ' . $email . '  </h3>
				               <h3 align="center">Contraseña : ' . $password . ' </h3>
				               <h3 align="center">Nombre: ' . $name . ' </h3>
				               <h3 align="center">Pais: ' . $pais . ' </h3>
				               <h3 align="center">Telefono: ' . $telefono . ' </h3>
				               <h3 align="center">Perfil: ' . $perfil . ' ' . $especialidad . ' </h3>

				               <h3 align="center"> <br> </h3>
				               <h3 align="center">Complementa tu registro con una demostración  <a href="https://demo.bigbluebutton.org/gl/med-v67-pty"> Entra

				               <br></br>
				<p>Atentamente,<br />
				  medicalsoft </p>

				<br />



				          <td width="10%">&nbsp;</td>
				        </tr>
				    </table>
				      <table width="100%" border="0">
				        <tr>
				          <td height="21" bgcolor="#00A74B">&nbsp;</td>
				        </tr>
				    </table>
				    <table width="100%" height="64" border="0">
				        <tr>
				          <td height="60">Este correo electrónico no puede recibir respuestas. Para obtener más información, accede a <a href="https://sievensoft.com/soportemedicalsoft" target="_blank"> sievensoft.com/soportemedicalsoft</a> <br/>
				         </td>
				        </tr>
				    </table></td>
				  </tr>
				</table>
				</head>
				<body>

				</body>
				</html>
				';
		// Para enviar un correo HTML, debe establecerse la cabecera Content-type
		$cabeceras = 'MIME-Version: 1.0' . "\r\n";
		$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		// Cabeceras adicionales
		$cabeceras .= 'To: sievensoft <noreply@dentalsoftcolombia.com>' . "\r\n";
		$cabeceras .= 'From: Bienvenido <noreply@dentalsoftcolombia.com>' . "\r\n";
		$cabeceras .= 'Cc: noreply@dentalsoftcolombia.com' . "\r\n";
		$cabeceras .= 'Bcc: noreply@dentalsoftcolombia.com' . "\r\n";
		// Enviarlo




		/*
																							  mail($para, $titulo, $mensaje, $cabeceras);
																							  mail('soporte@dentalsoftcolombia.com', $titulo, $mensaje, $cabeceras);
																							  //mail('info@sievensoft.com', $titulo, $mensaje, $cabeceras);
																							  mail('lordon02@gmail.com', $titulo, $mensaje, $cabeceras);
																			   */


		$mensaje_registro_usuario = '
		  		<div class="callout callout-info ">
		        <h4>Enviado!</h4>
					<p>Usuario Registrado<br>  </p>
		        </div>';

		// echo "<script language='Javascript'> window.location='activarregistro.php?email=$email';</script>";
		echo "<script language='Javascript'> window.location='usuarios';</script>";
	}
}








// registro_usuario
if (isset($_POST['registro_patients'])) {
	//name email password confirmPassword


	$ID_Doctor = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['ID_Doctor'])));
	$firtName = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['firtName'])));
	$lastName = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['lastName'])));
	$bithDate = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['bithDate'])));
	$officeDoctor = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['officeDoctor'])));
	$referenceNumber = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['referenceNumber'])));
	$email = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['email'])));
	$phoneNumber = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['phoneNumber'])));
	$sex = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['sex'])));


	$dateRegister = date("Y-m-d");
	mysqli_query($conn3, "INSERT INTO patients (ID_Doctor, firtName, lastName, bithDate, officeDoctor, referenceNumber, email, dateRegister, phoneNumber, sex)
		 VALUES ('$ID_Doctor', '$firtName', '$lastName', '$bithDate', '$officeDoctor', '$referenceNumber', '$email', '$dateRegister', '$phoneNumber', '$sex');");

	$q = mysqli_query($conn3, "select MAX(ID_patients) as ID_patients  from patients");
	$data = mysqli_fetch_array($q);
	$ID_patients = $data['ID_patients'];


	echo "<script language='Javascript'> window.location='regImg.php?ID_patients=$ID_patients';</script>";
	// para recibir el dato $ID_patients = $_GET['ID_patients'];


}





if (isset($_POST['delete_Img'])) {
	//name email password confirmPassword


	$ID_Img = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['ID_Img'])));
	$ID_Patients = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['ID_patients'])));

	$q = mysqli_query($conn3, "select * from imgPatients where ID_Img='$ID_Img'");
	$check = mysqli_num_rows($q);
	$data = mysqli_fetch_array($q);

	unlink('http://dentalsoftcolombia.com.co/system/upload/' . $data['imgNumber']);


	mysqli_query($conn3, "delete from imgPatients where ID_Img='$ID_Img'");
	echo "<script language='Javascript'> window.location='regImg.php?ID_patients=$ID_Patients';
		                </script>";
	//Verificamos si el correo no esta Registrado

}




if (isset($_POST['registro_grupo'])) {
	include 'funciones/funcionesUtilidades.php';

	$nombre = reem($_POST['nombre']);
	$des = reem($_POST['descripcion']);

	$fecha = date("Y-m-d");


	mysqli_query($conn3, "INSERT INTO gruposAtencion ( nombre, descripcion) VALUES ('$nombre', '$des');");
	echo "INSERT INTO gruposAtencion ( nombre, descripcion) VALUES ('$nombre', '$des');";



	echo "<script language='Javascript'> window.location='gruposAtencion.php?msg=1'; </script>";
}

if (isset($_POST['actualizar_grupo'])) {
	include 'funciones/funcionesUtilidades.php';


	$id = $_POST['idE'];
	$usuario_id = $_POST['usuario_id'];
	$nombre = reem($_POST['nombre']);
	$des = reem($_POST['descripcion']);




	mysqli_query($conn3, "update gruposAtencion  set
				nombre = '$nombre',
				descripcion = '$des'

				where ID = '$id'");
	echo "<script language='Javascript'> window.location='gruposAtencion.php?msg=5'; </script>";
}




if (isset($_POST['registro_Img'])) {


	$ID_Doctor = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['ID_Doctor'])));
	$ID_Patients = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['ID_patients'])));
	$nameImg = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['nameImg'])));


	$cod = rand();
	// Recibo los datos de la imagen
	$nombre_img = $_FILES['imagen']['name'];
	$tipo = $_FILES['imagen']['type'];
	$tamano = $_FILES['imagen']['size'];

	//Si existe imagen y tiene un tamaño correcto
	if (($nombre_img == !NULL) && ($_FILES['imagen']['size'] <= 10000000)) {

		$nombre_img = $ID_Doctor . $ID_Patients . $nombre_img;
		//indicamos los formatos que permitimos subir a nuestro servidor

		// Ruta donde se guardarán las imágenes que subamos
		$directorio = $_SERVER['DOCUMENT_ROOT'] . '/system/upload/';

		// Muevo la imagen desde el directorio temporal a nuestra ruta indicada anteriormente
		move_uploaded_file($_FILES['imagen']['tmp_name'], $directorio . $nombre_img);

		mysqli_query($conn3, "INSERT INTO imgPatients ( ID_Doctor, imgNumber, nameImg, ID_Patients)
					               VALUES ('$ID_Doctor', '$nombre_img', '$nameImg', '$ID_Patients');");


		echo $cliente_id;
		//echo '<script language="Javascript"> window.location="consultaCliente.php?clienteId='.echo $cliente_Id.';</script>';
		// echo "<script language='Javascript'> window.location='consultaCliente.php?clienteId=$cliente_id';</script>";
		$mensaje_regImg = '
	  		<div align="center"  class=" col-md-12">
	  		<strong>
		        <h4>good </h4>

		        <p>Unable to upload an image with that format</p>
		        </strong>
	        </div>';


		echo "<script language='Javascript'> window.location='regImg.php?ID_patients=$ID_Patients';
		                </script>";
	}
}

if (isset($_POST['registro_Img3D'])) {


	$ID_Order = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['ID_Order'])));
	$nameImg = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['nameImg'])));


	$cod = rand();
	// Recibo los datos de la imagen
	$nombre_img = $_FILES['imagen']['name'];
	$tipo = $_FILES['imagen']['type'];
	$tamano = $_FILES['imagen']['size'];

	//Si existe imagen y tiene un tamaño correcto
	if (($nombre_img == !NULL) && ($_FILES['imagen']['size'] <= 10000000)) {

		$nombre_img = $ID_Doctor . $ID_Patients . $nombre_img;
		//indicamos los formatos que permitimos subir a nuestro servidor

		// Ruta donde se guardarán las imágenes que subamos
		$directorio = $_SERVER['DOCUMENT_ROOT'] . '/system/upload/';

		// Muevo la imagen desde el directorio temporal a nuestra ruta indicada anteriormente
		move_uploaded_file($_FILES['imagen']['tmp_name'], $directorio . $nombre_img);

		mysqli_query($conn3, "INSERT INTO imgPatients (  imgNumber, nameImg, ID_Order)
					               VALUES ('$nombre_img', '$nameImg', '$ID_Order');");


		echo $cliente_id;
		//echo '<script language="Javascript"> window.location="consultaCliente.php?clienteId='.echo $cliente_Id.';</script>';
		// echo "<script language='Javascript'> window.location='consultaCliente.php?clienteId=$cliente_id';</script>";
		$mensaje_regImg = '
	  		<div align="center"  class=" col-md-12">
	  		<strong>
		        <h4>good </h4>

		        <p>Unable to upload an image with that format</p>
		        </strong>
	        </div>';


		echo "<script language='Javascript'> window.location='ordersSlopes.php?ID_patients=$ID_Patients';
		                </script>";
	}
}


if (isset($_POST['update_order'])) {



	echo "<script language='Javascript'> window.location='orders.php'; </script>";
}

if (isset($_POST['update_state_order'])) {
	$state = $_POST['state'];
	$ID_Order = $_POST['ID_Order'];

	mysqli_query($conn3, "update orders set state = '$state' where ID_Order = '$ID_Order'");

	echo "<script language='Javascript'> window.location='ordersSlopes.php'; </script>";
}

if (isset($_POST['informeFinal'])) {


	$ID_Order = $_POST['ID_Order'];
	$informe = $_POST['informe'];

	$nameImg = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['nameImg'])));


	$cod = rand();
	// Recibo los datos de la imagen
	$nombre_img = $_FILES['imagen']['name'];
	$tipo = $_FILES['imagen']['type'];
	$tamano = $_FILES['imagen']['size'];

	//Si existe imagen y tiene un tamaño correcto
	if (($nombre_img == !NULL) && ($_FILES['imagen']['size'] <= 10000000)) {

		// $nombre_img = $ID_Doctor.$ID_Patients.$nombre_img;
		//indicamos los formatos que permitimos subir a nuestro servidor

		// Ruta donde se guardarán las imágenes que subamos
		$directorio = $_SERVER['DOCUMENT_ROOT'] . '/system/upload/';

		// Muevo la imagen desde el directorio temporal a nuestra ruta indicada anteriormente
		move_uploaded_file($_FILES['imagen']['tmp_name'], $directorio . $nombre_img);

		mysqli_query($conn3, "INSERT INTO informeFinal (ID_Order, informe, adjuno) VALUES ('$ID_Order', '$informe', '$nombre_img');");



		//echo '<script language="Javascript"> window.location="consultaCliente.php?clienteId='.echo $cliente_Id.';</script>';
		// echo "<script language='Javascript'> window.location='consultaCliente.php?clienteId=$cliente_id';</script>";


		echo "<script language='Javascript'> window.location='ordersSlopes.php'; </script>";
	}
	$email = $_POST['emailDoctor'];


	$mensaje_recover_pas = '
  <div class="callout callout-info ">
          <h4>Send!</h4>

          <p>Your password was sent to the mail please verify and access. <br>  <a href="index.php"> <strong> Sign In</strong></a> </p>
        </div>';
	$data = mysqli_fetch_array($q);
	//$string="Hey,".$data['NOMBRE_USUARIO'].", Tu clave es ".$data['PASS'];
	//mail($email, "Recuperacion de contraseña", $string);

	$para = "$email";

	// título
	$título = 'Final Report Tripl3d Received';

	// mensaje
	$mensaje = '
				<html>
				<head>
				  <title>Final Report Tripl3d Received</title>
				    <table width="100%" height="466" border="0">
				  <tr>
				    <td><table width="100%" height="75" border="0">

				    </table>
				      <table width="100%" height="143" border="0">
				        <tr>
				          <td height="139" bgcolor="#00A74B"><table width="100%" height="62" border="0">
				            <tr>
				              <td width="5%">&nbsp;</td>
				              <td width="72%" style="color:#FFF;"><h2><strong>Final Report Tripl3d Received </strong></h2></td>
				              <td width="23%">&nbsp;</td>
				            </tr>
				          </table></td>
				        </tr>
				      </table>
				      <table width="100%" height="122" border="0">
				        <tr>
				          <td width="10%">&nbsp;</td>

				            <p>  <br />
				               <h3 align="center"> access the platform and review your information and budget</h3>

				               <br></br>
				<p>Atentamente,<br />
				  sievensoft</p>

				<br />



				          <td width="10%">&nbsp;</td>
				        </tr>
				    </table>
				      <table width="100%" border="0">
				        <tr>
				          <td height="21" bgcolor="#00A74B">&nbsp;</td>
				        </tr>
				      </table>
				      <table width="100%" height="64" border="0">
				        <tr>
				          <td height="60">Este correo electrónico no puede recibir respuestas. Para obtener más información, accede a dentalsoftcolombia.com<br />
				         </td>
				        </tr>
				    </table></td>
				  </tr>
				</table>
				</head>
				<body>

				</body>
				</html>
				';

	// Para enviar un correo HTML, debe establecerse la cabecera Content-type
	$cabeceras = 'MIME-Version: 1.0' . "\r\n";
	$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

	// Cabeceras adicionales
	$cabeceras .= 'To: sievensoft <noreply@dentalsoftcolombia.com>' . "\r\n";
	$cabeceras .= 'From: Final Report Tripl3d Received <noreply@dentalsoftcolombia.com>' . "\r\n";
	$cabeceras .= 'Cc: noreply@dentalsoftcolombia.com' . "\r\n";
	$cabeceras .= 'Bcc: noreply@dentalsoftcolombia.com' . "\r\n";

	// Enviarlo
	mail($para, $título, $mensaje, $cabeceras);
}





if (isset($_POST['informeFinalUpdate'])) {
	$ID_Order = $_POST['ID_Order'];
	$informe = $_POST['informe'];

	mysqli_query($conn3, "update informeFinal set informe = '$informe' where ID_Order= '$ID_Order';");
	echo "<script language='Javascript'> window.location='ordersSlopes.php'; </script>";
}




if (isset($_POST['update_state_orderF1'])) {
	$state = $_POST['state'];
	$ID_Order = $_POST['ID_Order'];

	mysqli_query($conn3, "update orders set state = '$state' where ID_Order = '$ID_Order'");

	echo "<script language='Javascript'> window.location='ordersSlopes.php'; </script>";
}

if (isset($_GET['update_estadoD_D'])) {
	$update_estadoD = $_GET['update_estadoD_D'];
	mysqli_query($conn3, "update usuarios set ACTIVO = 0 where ID = '$update_estadoD'");

	//echo  	"<script language='Javascript'> window.location='doctor.php'; </script>";
	echo "<script language='Javascript'> alert('Estado Ajustado'); </script>";
}

if (isset($_GET['update_estadoD_A'])) {
	$update_estadoD = $_GET['update_estadoD_A'];
	mysqli_query($conn3, "update usuarios set ACTIVO = 1 where ID = '$update_estadoD'");

	//echo  	"<script language='Javascript'> window.location='doctor.php'; </script>";
	echo "<script language='Javascript'> alert('Estado Ajustado'); </script>";
}



if (isset($_POST['registro_order'])) {


	$ID_Doctor = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['ID_Doctor'])));
	$ID_Patients = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['ID_patients'])));
	$services = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['services'])));
	$treatment = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['treatment'])));
	$arches = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['arches'])));
	$incisorsMidline = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['incisorsMidline'])));
	$incisorsOverbite = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['incisorsOverbite'])));
	$incisorsOverjet = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['incisorsOverjet'])));
	$posteriorSpacing = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['posteriorSpacing'])));
	$posteriorArchWidth = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['posteriorArchWidth'])));
	$posteriorCorssBite = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['posteriorCorssBite'])));

	$CrowdingPMaxilar = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['CrowdingPMaxilar'])));
	$CrowdingEMaxilar = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['CrowdingEMaxilar'])));
	$CrowdingPMandibular = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['CrowdingPMandibular'])));
	$CrowdingEMandibular = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['CrowdingEMandibular'])));
	$ClassD1 = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['ClassD1'])));
	$ClassD2 = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['ClassD2'])));
	$ClassD3 = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['ClassD3'])));
	$ClassD4 = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['ClassD4'])));
	$bondingDate = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['bondingDate'])));



	$iprInstructions = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['iprInstructions'])));
	$additionalInstructions = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['additionalInstructions'])));
	$dateUpdae = date("Y-m-d");
	$state = 0;
	$invoice = 0;

	$q = mysqli_query($conn3, "select Max(ID_Order) as ID_Order from orders");
	$data = mysqli_fetch_array($q);
	$ID_Order = $data['ID_Order'];
	$ID_Order++;

	$directorio = $_SERVER['DOCUMENT_ROOT'] . '/system/document/';


	mysqli_query($conn3, "INSERT INTO orders (ID_Doctor, ID_Patients, bondingDate, invoice, services, treatment, arches, incisorsMidline, incisorsOverbite, incisorsOverjet, posteriorSpacing, posteriorArchWidth, posteriorCorssBite, iprInstructions, state, dateUpdae, additionalInstructions ,CrowdingPMaxilar, CrowdingEMaxilar, CrowdingPMandibular, CrowdingEMandibular, ClassD1, ClassD2, ClassD3, ClassD4) VALUES ('$ID_Doctor', '$ID_Patients', '$bondingDate', '$invoice', '$services', '$treatment', '$arches', '$incisorsMidline', '$incisorsOverbite', '$incisorsOverjet', '$posteriorSpacing', '$posteriorArchWidth', '$posteriorCorssBite',  '$iprInstructions', '$state', '$dateUpdae', '$additionalInstructions' ,'$CrowdingPMaxilar', '$CrowdingEMaxilar', '$CrowdingPMandibular', '$CrowdingEMandibular', '$ClassD1', '$ClassD2', '$ClassD3', '$ClassD4');");


	echo "<script language='Javascript'> window.location='patientes.php'; </script>";
}















// *************************************************************** LISTAS ***************************************************************
// *************************************************************** LISTAS ***************************************************************

if (isset($_POST['registro_cie10'])) {

	$cuantoscie10 = 0;
	$codigo = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['codigo'])));
	$descripcion = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['descripcion'])));
	$usuario_id = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['usuario_id'])));

	$cie10 = $usuario_id . 'cie10';



	$queryList = mysqli_query($conn3, "SELECT count(id) as cuantos FROM  $cie10 where codigo = $codigo");

	$nrowl = mysqli_num_rows($queryList);

	while ($rowMotorizado = mysqli_fetch_array($queryList)) {

		$cuantoscie10 = $rowMotorizado['cuantos'];
	}


	if ($cuantoscie10 > 0) {
		echo "<script language='Javascript'> window.location='cie10?msg=2'; </script>";
	} else {

		mysqli_query($conn3, "INSERT INTO $cie10 (codigo, descripcion) VALUES ('$codigo', '$descripcion');");
		echo "<script language='Javascript'> window.location='cie10?msg=1'; </script>";
	}
}

if (isset($_POST['actualizar_cie10'])) {


	$cuantoscie10 = 0;
	$codigo = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['codigo'])));
	$descripcion = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['descripcion'])));
	$usuario_id = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['usuario_id'])));
	$id = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['id'])));

	$cie10 = $usuario_id . 'cie10';


	mysqli_query($conn3, "update $cie10 set descripcion = '$descripcion' where codigo = '$codigo'");
	echo "<script language='Javascript'> window.location='cie10?msg=5'; </script>";
}


if (isset($_GET['borrar_cie10'])) {



	$codigo = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_GET['borrar_cie10'])));
	$usuario_id = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_GET['usuario_id'])));

	$cie10 = $usuario_id . 'cie10';



	$queryList = mysqli_query($conn3, "SELECT count(ID) as cuantos FROM  historiaClinica1 where cie10 = '$codigo' and usuario_id = $usuario_id");

	$nrowl = mysqli_num_rows($queryList);

	while ($rowMotorizado = mysqli_fetch_array($queryList)) {

		$cuantoscie10 = $rowMotorizado['cuantos'];
	}


	if ($cuantoscie10 > 0) {
		echo "<script language='Javascript'> window.location='cie10?msg=4'; </script>";
	} else {

		mysqli_query($conn3, "delete from  $cie10 where codigo  = '$codigo'");
		echo "<script language='Javascript'> window.location='cie10?msg=3'; </script>";
	}
}








// *************************************************************** LISTAS pos ***************************************************************
// *************************************************************** LISTAS pos ***************************************************************

if (isset($_POST['registro_odontogramaEstados'])) {

	$cuantoscie10 = 0;
	$nombre = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['nombre'])));
	$color = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['color'])));
	$usuario_id = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['usuario_id'])));



	mysqli_query($conn3, "INSERT INTO OdontogramaEstados(nombre, color) VALUES ('$nombre', '$color');");

	//echo	"INSERT INTO OdontogramaEstados(nombre, color) VALUES ('$nombre', '$color');";
	echo "<script language='Javascript'> window.location='odontogramaEstados.php?msg=1'; </script>";
}

if (isset($_POST['actualizar_odontogramaEstados'])) {


	$cuantoscie10 = 0;
	$nombre = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['nombre'])));
	$color = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['color'])));
	$usuario_id = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['usuario_id'])));
	$id = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['id'])));




	mysqli_query($conn3, "update OdontogramaEstados set nombre = '$nombre', color= '$color' where id='$id'  ");
	echo "<script language='Javascript'> window.location='odontogramaEstados.php?msg=5'; </script>";
}


if (isset($_GET['borrar_estado'])) {



	$codigo = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_GET['borrar_estado'])));
	$usuario_id = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_GET['usuario_id'])));







	mysqli_query($conn3, "delete from OdontogramaEstados where id = '$codigo'");
	echo "<script language='Javascript'> window.location='odontogramaEstados.php?msg=3'; </script>";
}








// *************************************************************** LISTAS pos ***************************************************************
// *************************************************************** LISTAS pos ***************************************************************










// *************************************************************** LISTAS ***************************************************************
// *************************************************************** LISTAS ***************************************************************

if (isset($_POST['registro_odontograma'])) {
	$fechaO = date("Y-m-d");
	$horaO = date("H:i:s");
	$cliente = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['cliente_id'])));
	$pieza = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['pieza'])));
	$vestibular = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['vestibular'])));
	$Mesial = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['Mesial'])));
	$Lingual = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['Lingual'])));
	$Distal = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['Distal'])));
	$Oclusal = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['Oclusal'])));
	$usuario_id = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['usuario_id'])));
	$id = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['id'])));


	$numero = 1;
	$cont = 52;
	while ($numero <= $cont) {
		$pieza = $_POST['pieza' . $numero];
		$vestibular = $_POST['vestibular' . $numero];
		$Mesial = $_POST['Mesial' . $numero];
		$Lingual = $_POST['Lingual' . $numero];
		$Distal = $_POST['Distal' . $numero];
		$Oclusal = $_POST['Oclusal' . $numero];

		$numero++;






		if ($vestibular == '') {
			$vestibular = 0;
		}
		if ($Mesial == '') {
			$Mesial = 0;
		}
		if ($Lingual == '') {
			$Lingual = 0;
		}
		if ($Distal == '') {
			$Distal = 0;
		}
		if ($Oclusal == '') {
			$Oclusal = 0;
		}


		if ($pieza >= 'o11' and $pieza <= 'o18') {
			$valores = '0,' . $vestibular . ',' . $Distal . ',' . $Oclusal . ',' . $Mesial . ',' . $Lingual;
		}
		if ($pieza >= 'o51' and $pieza <= 'o55') {
			$valores = '0,' . $vestibular . ',' . $Distal . ',' . $Oclusal . ',' . $Mesial . ',' . $Lingual;
		}


		if ($pieza >= 'o21' and $pieza <= 'o28') {
			$valores = '0,' . $vestibular . ',' . $Mesial . ',' . $Oclusal . ',' . $Distal . ',' . $Lingual;
		}
		if ($pieza >= 'o61' and $pieza <= 'o65') {
			$valores = '0,' . $vestibular . ',' . $Mesial . ',' . $Oclusal . ',' . $Distal . ',' . $Lingual;
		}



		if ($pieza >= 'o31' and $pieza <= 'o38') {
			$valores = '0,' . $Lingual . ',' . $Mesial . ',' . $Oclusal . ',' . $Distal . ',' . $vestibular;
		}
		if ($pieza >= 'o71' and $pieza <= 'o75') {
			$valores = '0,' . $Lingual . ',' . $Mesial . ',' . $Oclusal . ',' . $Distal . ',' . $vestibular;
		}



		if ($pieza >= 'o41' and $pieza <= 'o48') {
			$valores = '0,' . $Lingual . ',' . $Distal . ',' . $Oclusal . ',' . $Mesial . ',' . $vestibular;
		}
		if ($pieza >= 'o81' and $pieza <= 'o85') {
			$valores = '0,' . $Lingual . ',' . $Distal . ',' . $Oclusal . ',' . $Mesial . ',' . $vestibular;
		}


		mysqli_query($conn3, "INSERT INTO piezas_estado(pieza, vestibular, mesial, lingual, distal, oclusal , cliente ) VALUES ('$pieza', '$vestibular' ,'$Mesial', '$Lingual', '$Distal', '$Oclusal', '$cliente');");


		$queryList = mysqli_query($conn3, "SELECT * FROM odontogramaMasterHistoria WHERE  idCliente = $cliente");
		$nrowlc = mysqli_num_rows($queryList);


		if ($nrowlc == '') {


			mysqli_query($conn3, "INSERT INTO odontogramaMasterHistoria (fecha, hora , idCliente, idUsuario ) VALUES ('$fechaO', '$horaO' ,'$cliente', '$usuario_id' );");

			echo "INSERT INTO odontogramaMasterHistoria (fecha, hora , idCliente, idUsuario ) VALUES ('$fechaO', '$horaO' ,'$cliente', '$usuario_id' );";
		}

		mysqli_query($conn3, "UPDATE odontogramaMasterHistoria SET
    $pieza ='$valores'
     WHERE idCliente = '$cliente' ");
	}

	echo "<script language='Javascript'> window.location='odontograma.php?msg=1&clienteId=$cliente'; </script>";
}

if (isset($_POST['actualizar_odontograma'])) {


	$cliente = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['cliente_id'])));

	$pieza = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['pieza'])));
	$vestibular = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['vestibular'])));
	$Mesial = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['Mesial'])));
	$Lingual = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['Lingual'])));
	$Distal = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['Distal'])));
	$Oclusal = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['Oclusal'])));
	$usuario_id = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['usuario_id'])));
	$id = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['id'])));

	if ($vestibular == '') {
		$vestibular = 0;
	}
	if ($Mesial == '') {
		$Mesial = 0;
	}
	if ($Lingual == '') {
		$Lingual = 0;
	}
	if ($Distal == '') {
		$Distal = 0;
	}
	if ($Oclusal == '') {
		$Oclusal = 0;
	}


	if ($pieza >= 'o11' and $pieza <= 'o18') {
		$valores = '0,' . $vestibular . ',' . $Distal . ',' . $Oclusal . ',' . $Mesial . ',' . $Lingual;
	}
	if ($pieza >= 'o51' and $pieza <= 'o55') {
		$valores = '0,' . $vestibular . ',' . $Distal . ',' . $Oclusal . ',' . $Mesial . ',' . $Lingual;
	}


	if ($pieza >= 'o21' and $pieza <= 'o28') {
		$valores = '0,' . $vestibular . ',' . $Mesial . ',' . $Oclusal . ',' . $Distal . ',' . $Lingual;
	}
	if ($pieza >= 'o61' and $pieza <= 'o65') {
		$valores = '0,' . $vestibular . ',' . $Mesial . ',' . $Oclusal . ',' . $Distal . ',' . $Lingual;
	}



	if ($pieza >= 'o31' and $pieza <= 'o38') {
		$valores = '0,' . $Lingual . ',' . $Mesial . ',' . $Oclusal . ',' . $Distal . ',' . $vestibular;
	}
	if ($pieza >= 'o71' and $pieza <= 'o75') {
		$valores = '0,' . $Lingual . ',' . $Mesial . ',' . $Oclusal . ',' . $Distal . ',' . $vestibular;
	}



	if ($pieza >= 'o41' and $pieza <= 'o48') {
		$valores = '0,' . $Lingual . ',' . $Distal . ',' . $Oclusal . ',' . $Mesial . ',' . $vestibular;
	}
	if ($pieza >= 'o81' and $pieza <= 'o85') {
		$valores = '0,' . $Lingual . ',' . $Distal . ',' . $Oclusal . ',' . $Mesial . ',' . $vestibular;
	}


	mysqli_query($conn3, "update piezas_estado set pieza = '$pieza', vestibular= '$vestibular' , mesial= '$Mesial' , lingual= '$Lingual', distal= '$Distal',  oclusal= '$Oclusal' where id='$id'  ");

	mysqli_query($conn3, "UPDATE odontogramaMasterHistoria SET
    $pieza ='$valores'
     WHERE idCliente = '$cliente' ");

	echo "<script language='Javascript'> window.location='odontograma.php?msg=5&clienteId=$cliente'; </script>";
}

if (isset($_POST['registro_pos'])) {

	$cuantospos = 0;
	$codigo = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['codigo'])));
	$descripcion = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['descripcion'])));

	$pactivo = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['pactivo'])));
	$concentracion = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['concentracion'])));
	$formafarmaceutica = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['formafarmaceutica'])));
	$aclaracion = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['aclaracion'])));


	$usuario_id = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['usuario_id'])));


	$pos = $usuario_id . 'pos';




	mysqli_query($conn3, "INSERT INTO $pos (codigo, descripcion, pactivo, concentracion, formafarmaceutica, aclaracion) VALUES ('$codigo', '$descripcion', '$pactivo', '$concentracion', '$formafarmaceutica', '$aclaracion');");
	echo "<script language='Javascript'> window.location='lista1?msg=1'; </script>";
}

if (isset($_POST['actualizar_pos'])) {


	$cuantospos = 0;
	$codigo = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['codigo'])));
	$descripcion = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['descripcion'])));

	$pactivo = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['pactivo'])));
	$concentracion = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['concentracion'])));
	$formafarmaceutica = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['formafarmaceutica'])));
	$aclaracion = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['aclaracion'])));


	$usuario_id = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['usuario_id'])));
	$valor = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['valor'])));
	$id = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['id'])));

	$pos = $usuario_id . 'pos';


	mysqli_query($conn3, "update $pos set descripcion = '$descripcion', pactivo = '$pactivo', concentracion= '$concentracion', formafarmaceutica = '$formafarmaceutica', aclaracion= '$aclaracion'  where id = '$id'");

	echo "<script language='Javascript'> window.location='lista1?msg=5'; </script>";
}


if (isset($_GET['borrar_pos'])) {



	$codigo = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_GET['borrar_pos'])));
	$usuario_id = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_GET['usuario_id'])));

	$pos = $usuario_id . 'pos';



	$queryList = mysqli_query($conn3, "SELECT count(id) as cuantos FROM  historiaClinica1_pos where codigo = '$codigo' and usuario_id = $usuario_id");

	$nrowl = mysqli_num_rows($queryList);

	while ($rowMotorizado = mysqli_fetch_array($queryList)) {

		$cuantospos = $rowMotorizado['cuantos'];
	}


	if ($cuantospos > 0) {
		echo "<script language='Javascript'> window.location='lista1?msg=4'; </script>";
	} else {

		mysqli_query($conn3, "delete from  $pos where codigo  = '$codigo'");
		echo "<script language='Javascript'> window.location='lista1?msg=3'; </script>";
	}
}










// *************************************************************** LISTAS cups ***************************************************************
// *************************************************************** LISTAS cups ***************************************************************

if (isset($_POST['registro_cups'])) {

	$cuantoscups = 0;
	$codigo = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['codigo'])));
	$descripcion = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['descripcion'])));
	$nivel = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['nivel'])));

	$aclaracion = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['aclaracion'])));

	$usuario_id = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['usuario_id'])));

	$id = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['id'])));



	$cups = $usuario_id . 'cups';




	$queryList = mysqli_query($conn3, "SELECT count(id) as cuantos FROM  $cups where codigo = $codigo");

	$nrowl = mysqli_num_rows($queryList);

	while ($rowMotorizado = mysqli_fetch_array($queryList)) {

		$cuantoscups = $rowMotorizado['cuantos'];
	}


	if ($cuantoscups > 0) {
		echo "<script language='Javascript'> window.location='lista2?msg=2'; </script>";
	} else {

		mysqli_query($conn3, "INSERT INTO $cups (codigo, descripcion, nivel, aclaracion) VALUES ('$codigo', '$descripcion', '$nivel', '$aclaracion');");
		echo "<script language='Javascript'> window.location='lista2?msg=1'; </script>";
	}
}

if (isset($_POST['actualizar_cups'])) {


	$cuantoscups = 0;
	$codigo = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['codigo'])));
	$descripcion = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['descripcion'])));
	$usuario_id = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['usuario_id'])));

	$nivel = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['nivel'])));

	$aclaracion = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['aclaracion'])));
	$id = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['id'])));



	$cups = $usuario_id . 'cups';


	mysqli_query($conn3, "update $cups set
				descripcion = '$descripcion', nivel = '$nivel',
				aclaracion = '$aclaracion'

				where codigo = '$codigo'");
	echo "<script language='Javascript'> window.location='lista2?msg=5'; </script>";
}


if (isset($_GET['borrar_cups'])) {



	$codigo = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_GET['borrar_cups'])));
	$usuario_id = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_GET['usuario_id'])));

	$cups = $usuario_id . 'cups';



	$queryList = mysqli_query($conn3, "SELECT count(id) as cuantos FROM  historiaClinica1_cups where codigo = '$codigo' and usuario_id = $usuario_id");

	$nrowl = mysqli_num_rows($queryList);

	while ($rowMotorizado = mysqli_fetch_array($queryList)) {

		$cuantoscups = $rowMotorizado['cuantos'];
	}


	if ($cuantoscups > 0) {
		echo "<script language='Javascript'> window.location='lista2?msg=4'; </script>";
	} else {

		mysqli_query($conn3, "delete from  $cups where codigo  = '$codigo'");
		echo "<script language='Javascript'> window.location='lista2?msg=3'; </script>";
	}
}













// *************************************************************** proveedores ***************************************************************
// *************************************************************** proveedores ***************************************************************

if (isset($_POST['registro_proveedor'])) {

	$cuantosldp2 = 0;
	$rut = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['rut'])));
	$nombre = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['nombre'])));
	$usuario_id = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['usuario_id'])));

	$correo = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['correo'])));

	$telefono = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['telefono'])));
	$vendedor = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['vendedor'])));
	$direccion = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['direccion'])));
	$nota = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['nota'])));
	$fecha = date("Y-m-d");

	/////////////////////////////////////////////////////////////////////////////////////////////////

	$whatsapp = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['whatsapp'])));
	$correo_2 = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['correo_2'])));
	$contacto = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['contacto'])));
	$tipo_persona = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['tipo_persona'])));
	$descuento_pronto_pago = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['descuento_pronto_pago'])));


	$descuentos_cuantos_dias = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['descuentos_cuantos_dias'])));
	$tipo_proveedor_nacionalidad = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['tipo_proveedor_nacionalidad'])));
	$productos_distribuidos = $_POST['productos_distribuidos'];
	$sitio_web = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['sitio_web'])));
	$codigo_pais = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['Arreglo']['codigo_pais'])));
	$codigo_ciudad = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['Arreglo']['codigo_ciudad'])));
	$codigo_departamento = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['Arreglo']['codigo_departamento'])));

	$dias_credito = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['dias_credito'])));
	$limite_credito = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['limite_credito'])));
	$porcentaje_retencion_base = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['porcentaje_retencion_base'])));
	$porcentaje_retencion_iva = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['porcentaje_retencion_iva'])));
	$informacion_envio = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['informacion_envio'])));
	$formas_envio = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['formas_envio'])));
	$dias_entrega = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['dias_entrega'])));
	$whatsapp = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['ID_principal'])));
	$productos_distribuidos = json_encode($productos_distribuidos, JSON_UNESCAPED_UNICODE);

	$queryList = mysqli_query($conn3, "SELECT count(id) as cuantos FROM  sproveedores where rut = '$rut'");

	$nrowl = mysqli_num_rows($queryList);

	while ($rowMotorizado = mysqli_fetch_array($queryList)) {

		$cuantosldp2 = $rowMotorizado['cuantos'];
	}


	if ($cuantosldp2 > 0) {
		echo "<script language='Javascript'> window.location='proveedores?msg=2'; </script>";
	} else {

		mysqli_query($conn3, "INSERT INTO sproveedores (rut, nombre, usuario_id, correo, telefono, vendedor, direccion, nota, fecha,Activo
		,whatsapp,correo_2,contacto,tipo_persona,descuento_pronto_pago,descuentos_cuantos_dias,tipo_proveedor_nacionalidad,productos_distribuidos,sitio_web
		,codigo_pais,codigo_ciudad,codigo_departamento,dias_credito,limite_credito,porcentaje_retencion_base,porcentaje_retencion_iva,informacion_envio,formas_envio,dias_entrega,ID_principal) VALUES
													('$rut', '$nombre', '$usuario_id', '$correo', '$telefono', '$vendedor', '$direccion', '$nota', '$fecha', '1'
		,'$whatsapp','$correo_2','$contacto','$tipo_persona','$descuento_pronto_pago','$descuentos_cuantos_dias','$tipo_proveedor_nacionalidad','$productos_distribuidos','$sitio_web'
		,'$codigo_pais','$codigo_ciudad','$codigo_departamento','$dias_credito','$limite_credito','$porcentaje_retencion_base','$porcentaje_retencion_iva','$informacion_envio','$formas_envio','$dias_entrega','$ID_principal');");
		// echo "INSERT INTO sproveedores (rut, nombre, usuario_id, correo, telefono, vendedor, direccion, nota, fecha,Activo) VALUES
		// ('$rut', '$nombre', '$usuario_id', '$correo', '$telefono', '$vendedor', '$direccion', '$nota', '$fecha', '1');";
		echo "<script language='Javascript'> window.location='proveedores?msg=1'; </script>";
	}
}

if (isset($_POST['actualizar_proveedor'])) {


	$cuantosldp2 = 0;
	$rut = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['rut'])));
	$nombre = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['nombre'])));
	$usuario_id = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['usuario_id'])));

	$correo = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['correo'])));

	$telefono = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['telefono'])));
	$vendedor = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['vendedor'])));
	$direccion = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['direccion'])));
	$nota = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['nota'])));

	$id = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['id'])));


	////////////////////////////////////////////////////////////////////////////////////////////////
	$whatsapp = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['whatsapp'])));
	$correo_2 = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['correo_2'])));
	$contacto = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['contacto'])));
	$tipo_persona = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['tipo_persona'])));
	$descuento_pronto_pago = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['descuento_pronto_pago'])));


	$descuentos_cuantos_dias = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['descuentos_cuantos_dias'])));
	$tipo_proveedor_nacionalidad = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['tipo_proveedor_nacionalidad'])));
	$productos_distribuidos = $_POST['productos_distribuidos'];
	$sitio_web = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['sitio_web'])));
	$codigo_pais = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['Arreglo']['codigo_pais'])));
	$codigo_ciudad = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['Arreglo']['codigo_ciudad'])));
	$codigo_departamento = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['Arreglo']['codigo_departamento'])));

	$dias_credito = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['dias_credito'])));
	$limite_credito = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['limite_credito'])));
	$porcentaje_retencion_base = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['porcentaje_retencion_base'])));
	$porcentaje_retencion_iva = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['porcentaje_retencion_iva'])));
	$informacion_envio = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['informacion_envio'])));
	$formas_envio = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['formas_envio'])));
	$dias_entrega = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['dias_entrega'])));

	$productos_distribuidos = json_encode($productos_distribuidos, JSON_UNESCAPED_UNICODE);
	///////////////////////////////////////////////////////////////////////////////////////////////////



	$ldp2 = $usuario_id . 'ldp2';


	mysqli_query($conn3, "update sproveedores set
				rut = '$rut',
				nombre = '$nombre',
				correo = '$correo',
				telefono = '$telefono',
				vendedor = '$vendedor',
				direccion = '$direccion',
				nota = '$nota',

				whatsapp='$whatsapp',
				correo_2='$correo_2',
				contacto='$contacto',
				tipo_persona='$tipo_persona',
				descuento_pronto_pago='$descuento_pronto_pago',
				descuentos_cuantos_dias='$descuentos_cuantos_dias',
				tipo_proveedor_nacionalidad='$tipo_proveedor_nacionalidad',
				productos_distribuidos='$productos_distribuidos',
				sitio_web='$sitio_web',
				codigo_pais='$codigo_pais',
				codigo_ciudad='$codigo_ciudad',
				codigo_departamento='$codigo_departamento',
				dias_credito='$dias_credito',
				limite_credito='$limite_credito',
				porcentaje_retencion_base='$porcentaje_retencion_base',
				porcentaje_retencion_iva='$porcentaje_retencion_iva',
				informacion_envio='$informacion_envio',
				formas_envio='$formas_envio',
				dias_entrega='$dias_entrega'

				where id = '$id'");
	echo "<script language='Javascript'> window.location='proveedores?msg=5'; </script>";
}

if (isset($_GET['borrar_proveedor'])) {
	$id = mysqli_real_escape_string($conn3, trim($_GET['borrar_proveedor']));
	$usuario_id = mysqli_real_escape_string($conn3, trim($_GET['usuario_id']));
	$ldp2 = $usuario_id . 'ldp2';

	$queryList = mysqli_query($conn3, "SELECT count(id) as cuantos FROM opracioninvheader where idTercero = '$id' and usuario_id = $usuario_id");
	$nrowl = mysqli_num_rows($queryList);

	while ($rowMotorizado = mysqli_fetch_array($queryList)) {
		$cuantosldp2 = $rowMotorizado['cuantos'];
	}

	if ($cuantosldp2 > 0) {
		echo "<script language='Javascript'> window.location='proveedores?msg=4'; </script>";
	} else {
		mysqli_query($conn3, "UPDATE sproveedores SET Activo = '0' WHERE id = '$id'");
		echo "UPDATE sproveedores SET Activo = '0' WHERE id = $id";
		// mysqli_query($conn3, "DELETE FROM sproveedores WHERE id = '$id'");
		echo "<script language='Javascript'> window.location='proveedores?msg=3'; </script>";
	}
}

















// *************************************************************** clientes ***************************************************************
// *************************************************************** clientes  ***************************************************************

if (isset($_POST['registro_clientes'])) {

	$cuantosldp2 = 0;
	$rut = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['rut'])));
	$nombre = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['nombre'])));
	$usuario_id = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['usuario_id'])));

	$correo = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['correo'])));

	$telefono = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['telefono'])));
	$direccion = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['direccion'])));
	$nota = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['nota'])));
	$fecha = date("Y-m-d");



	$queryList = mysqli_query($conn3, "SELECT count(id) as cuantos FROM  sclientes where rut = '$rut'");

	$nrowl = mysqli_num_rows($queryList);

	while ($rowMotorizado = mysqli_fetch_array($queryList)) {

		$cuantosldp2 = $rowMotorizado['cuantos'];
	}


	if ($cuantosldp2 > 0) {
		echo "<script language='Javascript'> window.location='clientes?msg=2'; </script>";
	} else {

		mysqli_query($conn3, "INSERT INTO sclientes (rut, nombre, usuario_id, correo, telefono, direccion, nota, fecha) VALUES
				('$rut', '$nombre', '$usuario_id', '$correo', '$telefono', '$direccion', '$nota', '$fecha');");

		echo "INSERT INTO sclientes (rut, nombre, usuario_id, correo, telefono, direccion, nota, fecha) VALUES
				('$rut', '$nombre', '$usuario_id', '$correo', '$telefono', '$direccion', '$nota', '$fecha');";
		echo "<script language='Javascript'> window.location='clientes?msg=1'; </script>";
	}
}

if (isset($_POST['actualizar_clientes'])) {


	$cuantosldp2 = 0;
	$rut = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['rut'])));
	$nombre = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['nombre'])));
	$usuario_id = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['usuario_id'])));

	$correo = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['correo'])));

	$telefono = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['telefono'])));

	$direccion = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['direccion'])));
	$nota = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['nota'])));

	$id = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['id'])));



	$ldp2 = $usuario_id . 'ldp2';


	mysqli_query($conn3, "update sclientes set
				rut = '$rut',
				nombre = '$nombre',
				correo = '$correo',
				telefono = '$telefono',
				direccion = '$direccion',
				nota = '$nota'
				where id = '$id'");
	echo "<script language='Javascript'> window.location='clientes?msg=5'; </script>";
}


if (isset($_GET['borrar_clientes'])) {



	$id = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_GET['borrar_clientes'])));
	$usuario_id = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_GET['usuario_id'])));

	$ldp2 = $usuario_id . 'ldp2';



	$queryList = mysqli_query($conn3, "SELECT count(id) as cuantos FROM  opracioninvheader where idTercero = '$id' and usuario_id = $usuario_id");

	$nrowl = mysqli_num_rows($queryList);

	while ($rowMotorizado = mysqli_fetch_array($queryList)) {

		$cuantosldp2 = $rowMotorizado['cuantos'];
	}


	if ($cuantosldp2 > 0) {
		echo "<script language='Javascript'> window.location='clientes?msg=4'; </script>";
	} else {

		mysqli_query($conn3, "delete from  sclientes where id  = '$id'");
		echo "<script language='Javascript'> window.location='clientes?msg=3'; </script>";
	}
}


















// ************************************************************************ catalogo *********************************************************************************

function profesionSelect()
{


	$resultadoC = mysqli_query($conn3, "SELECT * FROM c_profesion order by descripcion");
	//$resultado=mysqli_query($conn3, "select * from ytc_oferta");
	while ($fila = mysqli_fetch_array($resultadoC, MYSQLI_NUM)) {
		echo '<option value="' . $fila[0] . '">' . $fila[1] . '</option>';
	}

	return trim($texto);
}

function profesion($id)
{


	$resultadojornadaLaboral = mysqli_query($conn3, "SELECT * FROM c_profesion where id = $id");
	//$resultado=mysqli_query($conn3, "select * from ytc_oferta");
	while ($filajornadaLaboral = mysqli_fetch_array($resultadojornadaLaboral, MYSQLI_NUM)) {
		$jornadaLaboral = $filajornadaLaboral[1];
	}
	return $jornadaLaboral;
}





function paisSelect()
{


	$resultadoC = mysqli_query($conn3, "SELECT * FROM c_pais order by descripcion");
	//$resultado=mysqli_query($conn3, "select * from ytc_oferta");
	while ($fila = mysqli_fetch_array($resultadoC, MYSQLI_NUM)) {
		echo '<option value="' . $fila[0] . '">' . $fila[1] . '</option>';
	}

	return trim($texto);
}

function pais($id)
{


	$resultadojornadaLaboral = mysqli_query($conn3, "SELECT * FROM c_pais where id = $id");
	//$resultado=mysqli_query($conn3, "select * from ytc_oferta");
	while ($filajornadaLaboral = mysqli_fetch_array($resultadojornadaLaboral, MYSQLI_NUM)) {
		$jornadaLaboral = $filajornadaLaboral[1];
	}
	return $jornadaLaboral;
}








function categoriaSelect()
{
	include 'conn3.php';

	// ******************************************************** ***********   categoria == especialidad medica
	// *********************************************** ********* ********   categoria == especialidad medica
	$resultadoC = mysqli_query($conn3, "SELECT * FROM c_categoria order by descripcion");
	//$resultado=mysqli_query($conn3, "select * from ytc_oferta");
	while ($fila = mysqli_fetch_array($resultadoC, MYSQLI_NUM)) {
		echo '<option value="' . $fila[0] . '">' . $fila[1] . '</option>';
	}

	return trim($texto);

	// ***********************************************************************************************   categoria == especialidad medica
	// ***********************************************************************************************   categoria == especialidad medica


}






function categoria($id)
{

	include 'conn3.php';
	//var_dump("SELECT * FROM c_categoria where id = $id");
	$resultadojornadaLaboral = mysqli_query($conn3, "SELECT * FROM c_categoria where id = $id");
	//$resultado=mysqli_query($conn3, "select * from ytc_oferta");
	if ($resultadojornadaLaboral) {
		while ($filajornadaLaboral = mysqli_fetch_array($resultadojornadaLaboral, MYSQLI_NUM)) {
			$jornadaLaboral = $filajornadaLaboral[1];
		}
	}



	return $jornadaLaboral;
}









// ************************************************************ ciudades ************************************************************
// ************************************************************ ciudades ************************************************************

function ciudadesSelect()
{

	include 'conn3.php';

	if ($conn3) {
		$resultadoC = mysqli_query($conn3, "SELECT * FROM c_ciudades order by descripcion");
		//$resultado=mysqli_query($conn3, "select * from ytc_oferta");
		if ($resultadoC) {
			while ($fila = mysqli_fetch_array($resultadoC, MYSQLI_NUM)) {
				echo '<option value="' . $fila[0] . '">' . $fila[1] . '</option>';
			}

			return trim($texto);
		}
	}
}

function ciudades($id)
{
	include 'conn3.php';

	if ($conn3) {
		$resultadojornadaLaboral = mysqli_query($conn3, "SELECT * FROM c_ciudades where id = $id");
		//$resultado=mysqli_query($conn3, "select * from ytc_oferta");
		if ($resultadojornadaLaboral) {
			while ($filajornadaLaboral = mysqli_fetch_array($resultadojornadaLaboral, MYSQLI_NUM)) {
				$ciudades = $filajornadaLaboral[1];
			}
			return $ciudades;
		}
	}
}

// ************************************************************ ciudades ************************************************************
// ************************************************************ ciudades ************************************************************



if (isset($_POST['registro_categoria'])) {



	$descripcion = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['descripcion'])));

	mysqli_query($conn3, "INSERT INTO c_categoria (descripcion) VALUES ('$descripcion');");
	echo "<script language='Javascript'> window.location='c_categorias.php?msg=1'; </script>";
}





if (isset($_POST['registro_profesion'])) {



	$descripcion = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['descripcion'])));

	mysqli_query($conn3, "INSERT INTO c_profesion (descripcion) VALUES ('$descripcion');");
	echo "<script language='Javascript'> window.location='c_profesion.php?msg=1'; </script>";
}



function Whatsapp_sent_cliente($linkkey, $numero, $mensaje, $cliente_id, $usuario_id, $whatsapp, $accion)
{
	//create a new cURL resource
	$ch = curl_init($linkkey);
	// enviar ws
	$arreglo = array(
		"phone"           => $numero,
		"body"          => $mensaje,
	);
	// echo "<br>*****************************************<br>";
	// print("<pre>" . print_r($arreglo, true) . "</pre>");
	// echo "<br>*****************************************<br>";
	$payload = json_encode($arreglo);
	// attach encoded JSON string to the POST fields
	curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
	// set the content type to application/json
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
	// return response instead of outputting
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	// execute the POST request
	$result = curl_exec($ch);
	// echo "<br>*****************************************<br>";
	// print("<pre>" . print_r($result, true) . "</pre>");
	// echo "<br>*****************************************<br>";
	//close cURL resource
	curl_close($ch);
	if ($result) {
		return true;
	}
}


function Whatsapp_sent($linkkey, $numero, $mensaje)
{

	//$linkkey = 'https://eu55.chat-api.com/instance55589/sendMessage?token=6gi9i4phizlbozd2';



	if ($numero > 1) {

		$data = [
			'phone' => $numero, // Receivers phone
			'body' => $mensaje, // Message
		];



		$json = json_encode($data);
		// Encode data to JSON
		// URL for request POST /message
		$url = $linkkey;
		// Make a POST request
		$options = stream_context_create([
			'http' => [
				'method' => 'POST',
				'header' => 'Content-type: application/json',
				'content' => $json
			]
		]);
		// Send a request
		$result = file_get_contents($url, false, $options);
		$w_fechaHora = date("Y-m-d h:m:s");

		mysqli_query($conn3, "INSERT INTO w_mensajes (mensaje, fechaHora, tipo, cliente_id, usuario_id, idMensaje, numeroCliente, numeroUsuario, estado, accion) VALUES ('$mensaje', '$w_fechaHora', '0', '0', '0', '0', '$numero', '$numero', '0', '0');");
	}
	/*
									   $mensaje,$enviado,$enviado,$id,$NumeroM,$idUsuario
									   */
}




// *************************************************************** sucursales ***************************************************************
// *************************************************************** sucursales ***************************************************************

if (isset($_POST['registro_sucursales'])) {

	$descripcion = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['descripcion'])));
	$idUsuario = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['idUsuario'])));
	$ID_principal = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['ID_principal'])));

	mysqli_query($conn3, "INSERT INTO sucursales (idUsuario, descripcion, ID_principal) VALUES ('$idUsuario', '$descripcion', '$ID_principal');");
	echo "<script language='Javascript'> window.location='sucursales?msg=1'; </script>";
}

if (isset($_POST['actualizar_sucursales'])) {


	$cuantoscie10 = 0;

	$id = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['id'])));
	$descripcion = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['descripcion'])));
	$idUsuario = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['idUsuario'])));
	$ID_principal = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['ID_principal'])));



	mysqli_query($conn3, "UPDATE sucursales set descripcion = '$descripcion', ID_principal = '$ID_principal' where idUsuario = '$idUsuario' and id = $id");
	echo "<script language='Javascript'> window.location='sucursales?msg=5'; </script>";
}



function sucursalesNombre($id)
{

	$resultadoC = mysqli_query($conn3, "SELECT * FROM sucursales where id = '$id' order by descripcion");
	//$resultado=mysqli_query($conn3, "select * from ytc_oferta");
	while ($fila = mysqli_fetch_array($resultadoC, MYSQLI_NUM)) {
		echo '<option value="' . $fila[0] . '">' . $fila[2] . '</option>';
	}

	return trim($texto);
}







function sucursalesSelect($idUsuario)
{
	include 'conn3.php';

	$resultadoC = mysqli_query($conn3, "SELECT * FROM sucursales where ID_principal = '$idUsuario' order by descripcion");
	//$resultado=mysqli_query($conn3, "select * from ytc_oferta");
	while ($fila = mysqli_fetch_array($resultadoC, MYSQLI_NUM)) {
		echo '<option value="' . $fila[0] . '">' . $fila[2] . '</option>';
	}

	return trim($texto);
}

function sucursal($id)
{

	$resultadojornadaLaboral = mysqli_query($conn3, "SELECT * FROM sucursales where id = $id");
	//$resultado=mysqli_query($conn3, "select * from ytc_oferta");
	while ($filajornadaLaboral = mysqli_fetch_array($resultadojornadaLaboral, MYSQLI_NUM)) {
		$sucursales = $filajornadaLaboral[2];
	}
	return $sucursales;
}


function cuantasSucursales($idUsuario)
{


	$cuantasSucursales = mysqli_query($conn3, "SELECT count(id) as cuantasSucursales FROM sucursales where idusuario = $idUsuario");
	//$resultado=mysqli_query($conn3, "select * from ytc_oferta");
	while ($cuantasSucursales = mysqli_fetch_array($cuantasSucursales, MYSQLI_NUM)) {
		$cuantas = $cuantasSucursales[0];
	}
	return $cuantas;
}














// *************************************************************** USUARIOS ***************************************************************
// *************************************************************** usuarios ***************************************************************

if (isset($_POST['registro_usuariosSegundarios'])) {

	$cuantoscie10 = 0;

	$usu = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['email'])));
	$nombre = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['nombre'])));
	$correo = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['correo'])));
	$telefono = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['telefono'])));
	$clave = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['clave'])));
	$clave2 = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['clave2'])));
	$pais = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['pais'])));
	$especialidad = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['especialidad'])));
	$perfil = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['perfil'])));

	$idUsuario = $_POST['IDconfig'];
	$rol = $_POST['rol'];




	$m1 = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['m1'])));
	$m2 = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['m2'])));
	$m3 = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['m3'])));
	$m4 = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['m4'])));
	$m5 = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['m5'])));
	$m6 = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['m6'])));
	$m7 = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['m7'])));
	$m8 = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['m8'])));

	if ($m1 == 'on') {
		$m1 = 1;
	} else {
		$m1 = 0;
	}
	if ($m2 == 'on') {
		$m2 = 1;
	} else {
		$m2 = 0;
	}
	if ($m3 == 'on') {
		$m3 = 1;
	} else {
		$m3 = 0;
	}
	if ($m4 == 'on') {
		$m4 = 1;
	} else {
		$m4 = 0;
	}
	if ($m5 == 'on') {
		$m5 = 1;
	} else {
		$m5 = 0;
	}
	if ($m6 == 'on') {
		$m6 = 1;
	} else {
		$m6 = 0;
	}
	if ($m7 == 'on') {
		$m7 = 1;
	} else {
		$m7 = 0;
	}
	if ($m8 == 'on') {
		$m8 = 1;
	} else {
		$m8 = 0;
	}


	/*if ($clave <> $clave2)
											   {
												   $mensaje_registro_usuario = '
													 <div class="callout callout-danger ">
													 <h4>Error!</h4>

													 <p>La contraseña no coincide   </p>
												   </div>';
											   }
									   */


	$fechaRegistro = date("Y-m-d h:m:s");
	$queryList = mysqli_query($conn3, "SELECT count(ID) as cuantos FROM  usuarios where USUARIO = $usu");

	$nrowl = mysqli_num_rows($queryList);

	while ($rowMotorizado = mysqli_fetch_array($queryList)) {

		$cuantoscie10 = $rowMotorizado['cuantos'];
	}


	if ($cuantoscie10 > 0) {
		echo "<script language='Javascript'> window.location='usuarios?msg=2'; </script>";
	} else {

		mysqli_query($conn3, "INSERT INTO usuarios (USUARIO, PASS, NOMBRE_USUARIO, fec_ingreso,telefono,pais,especialidad,TIPO,correo) VALUES ('$usu', '$clave', '$nombre', '$fechaRegistro','$telefono','$pais','$especialidad','$perfil','$correo');");




		$queryList = mysqli_query($conn3, "SELECT max(ID) as idUSU FROM  usuarios");
		$nrowl = mysqli_num_rows($queryList);
		while ($rowMotorizado = mysqli_fetch_array($queryList)) {
			$idCusu = $rowMotorizado['idUSU'];
		}



		//ECHO "INSERT INTO usuarios (USUARIO, PASS, NOMBRE_USUARIO, fec_ingreso,telefono,pais,especialidad,TIPO,correo) VALUES ('$usu', '$clave', '$nombre', '$fechaRegistro','$telefono','$pais','$especialidad','$perfil','$correo');";

		$para = "$email";

		// título
		$titulo = 'Bienvenido , Gracias por  Registrarse en Dentalsoft';
		// mensaje
		$mensaje = '
				<html>
				<head>
				  <title>Registro de Usuarios</title>
				    <table width="100%" height="466" border="0">
				  <tr>
				    <td><table width="100%" height="75" border="0">

				    </table>
				      <table width="100%" height="143" border="0">
				        <tr>
				          <td height="139" bgcolor="#00A74B"><table width="100%" height="62" border="0">
				            <tr>
				              <td width="5%">&nbsp;</td>
				              <td width="72%" style="color:#FFF;"><h2><strong>Registro exitoso . Ya puedes usar la mejor Historia Clínica virtual de latinoamerica ...</strong></h2></td>
				              <td width="23%">&nbsp;</td>
				            </tr>
				          </table></td>
				        </tr>
				      </table>
				      <table width="100%" height="122" border="0">
				        <tr>
				          <td width="10%">&nbsp;</td>
				          <td width="80%"><p>Te recordamos tu usuario y contraseña para ingresar , este no cambiara si tienes alguna duda atravez de tu software tienes varias herramientas para comunicarte con nosotros whatsapp , correo , chat en vivo , skype  :

						</p>
				            <p>  <br />
				               <h3 align="center">Usuario:  ' . $email . '  </h3>
				                <h3 align="center">Contraseña : ' . $clave . ' </h3>
				               <h3 align="center">Nombre: ' . $nombre . ' </h3>
				               <h3 align="center">LINK DE INGRESO: <a href="' . $Base . 'acceso">Ingresar</a> </h3>


				               <br></br>
				<p>Atentamente,<br />
				  medicalsoft </p>

				<br />



				          <td width="10%">&nbsp;</td>
				        </tr>
				    </table>
				      <table width="100%" border="0">
				        <tr>
				          <td height="21" bgcolor="#00A74B">&nbsp;</td>
				        </tr>
				    </table>
				    <table width="100%" height="64" border="0">
				        <tr>
				          <td height="60">Este correo electrónico no puede recibir respuestas. Para obtener más información, accede a <a href="https://dentalsoftcolombia.com/soportemedicalsoft" target="_blank"> dentalsoftcolombia.com/soportemedicalsoft</a> <br/>
				         </td>
				        </tr>
				    </table></td>
				  </tr>
				</table>
				</head>
				<body>

				</body>
				</html>
				';
		// Para enviar un correo HTML, debe establecerse la cabecera Content-type
		$cabeceras = 'MIME-Version: 1.0' . "\r\n";
		$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		// Cabeceras adicionales
		$cabeceras .= 'To: sievensoft <noreply@dentalsoftcolombia.com>' . "\r\n";
		$cabeceras .= 'From: Bienvenido <noreply@dentalsoftcolombia.com>' . "\r\n";
		$cabeceras .= 'Cc: noreply@dentalsoftcolombia.com' . "\r\n";
		$cabeceras .= 'Bcc: noreply@dentalsoftcolombia.com' . "\r\n";
		// Enviarlo





		mail($para, $titulo, $mensaje, $cabeceras);













		echo "<script language='Javascript'> window.location='usuarios?msg=1'; </script>";
	}
}

if (isset($_POST['actualizar_usuariosSegundarios'])) {


	$cuantoscie10 = 0;


	$usu = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['email'])));
	$nombre = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['nombre'])));
	$correo = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['correo'])));
	$telefono = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['telefono'])));
	$clave = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['clave'])));
	$pais = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['pais'])));
	$especialidad = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['especialidad'])));
	$perfil = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['perfil'])));

	$idUsuario = $_POST['IDconfig'];

	$usuario_id = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['usuario_id'])));
	$id = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['id'])));


	$m1 = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['m1'])));
	$m2 = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['m2'])));
	$m3 = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['m3'])));
	$m4 = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['m4'])));
	$m5 = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['m5'])));
	$m6 = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['m6'])));
	$m7 = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['m7'])));
	$m8 = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['m8'])));




	$idUsuario = $_POST['IDconfig'];
	$rol = $_POST['rol'];

	$menu = $_POST['menu'];


	if ($m1 == 'on') {
		$m1 = 1;
	} else {
		$m1 = 0;
	}
	if ($m2 == 'on') {
		$m2 = 1;
	} else {
		$m2 = 0;
	}
	if ($m3 == 'on') {
		$m3 = 1;
	} else {
		$m3 = 0;
	}
	if ($m4 == 'on') {
		$m4 = 1;
	} else {
		$m4 = 0;
	}
	if ($m5 == 'on') {
		$m5 = 1;
	} else {
		$m5 = 0;
	}
	if ($m6 == 'on') {
		$m6 = 1;
	} else {
		$m6 = 0;
	}
	if ($m7 == 'on') {
		$m7 = 1;
	} else {
		$m7 = 0;
	}
	if ($m8 == 'on') {
		$m8 = 1;
	} else {
		$m8 = 0;
	}


	mysqli_query($conn3, "update usuarios set USUARIO = '$usu', PASS = '$clave', USUARIO= '$usu', PASS='$clave', NOMBRE_USUARIO='$nombre', telefono ='$telefono',pais = '$pais', especialidad ='$especialidad', correo='$correo', TIPO='$perfil', menu='$menu'

			 where ID = '$id' ");




	/*echo  "update usuarios set USUARIO = '$usu', PASS = '$clave', USUARIO= '$usu', PASS='$clave', NOMBRE_USUARIO='$nombre', telefono ='$telefono',pais = '$pais', especialidad ='$especialidad', correo='$correo', TIPO='$perfil'

													where ID = '$id' "; */

	echo "<script language='Javascript'> window.location='usuarios?msg=5'; </script>";
}


function e_serviciosselect($idUsuario)
{

	$resultadoC = mysqli_query($conn3, "SELECT * FROM e_servicios where idUsuario = '$idUsuario' order by nombre");
	//$resultado=mysqli_query($conn3, "select * from ytc_oferta");
	while ($fila = mysqli_fetch_array($resultadoC, MYSQLI_NUM)) {
		echo '<option value="' . $fila[0] . '">' . $fila[1] . '</option>';
	}

	return trim($texto);
}




function e_servicios($id)
{

	include 'conn3.php';
	$resultadojornadaLaboral = mysqli_query($conn3, "SELECT * FROM e_servicios where id = $id");
	if ($resultadojornadaLaboral) {
		while ($filajornadaLaboral = mysqli_fetch_array($resultadojornadaLaboral, MYSQLI_NUM)) {
			$respuesta = $filajornadaLaboral[1];
		}
	}
	//$resultado=mysqli_query($conn3, "select * from ytc_oferta");
	return $respuesta;
}


if (isset($_POST['registro_servicios'])) {
	include 'funciones/funcionesUtilidades.php';

	$nombre = reem($_POST['nombre']);
	$usuario_id = $_POST['usuario_id'];

	mysqli_query($conn3, "INSERT INTO e_servicios  (nombre, idUsuario) VALUES ('$nombre', '$usuario_id');");
	echo "<script language='Javascript'> window.location='serviciosVacunar?msg=1'; </script>";
}











// *************************************************************** LISTAS empresa ***************************************************************
// *************************************************************** LISTAS empresa ***************************************************************

if (isset($_POST['registro_empresa'])) {
	include 'funciones/funcionesUtilidades.php';

	$usuario_id = $_POST['usuario_id'];
	$nombre = reem($_POST['nombre']);
	$nit = reem($_POST['nit']);
	$precio = $_POST['precio'];
	$direccion = reem($_POST['direccion']);
	$telefono = reem($_POST['telefono']);
	$correo = reem($_POST['correo']);
	$responsable = reem($_POST['responsable']);
	$celularResponsable = reem($_POST['celularResponsable']);
	$ciudad = reem($_POST['ciudad']);

	$fac_identificacion = $_POST['fac_identificacion'];
	$fac_tipodeempresa = $_POST['fac_tipodeempresa'];
	$fac_tipodepersona = $_POST['fac_tipodepersona'];
	$apl2 = $_POST['apl2'];
	$apl1 = $_POST['apl1'];
	$comentarios = $_POST['comentarios'];
	$dv = $_POST['dv'];
	$nit = $_POST['nit'];
	$nom1 = $_POST['nom1'];
	$nom2 = $_POST['nom2'];
	$obligacionfiscal = $_POST['obligacionfiscal'];
	$identificacion = $_POST['identificacion'];
	$razonsocial = $_POST['razonsocial'];
	$tributoreceptor = $_POST['tributoreceptor'];
	$email_fe = $_POST['email_fe'];
	$dpato = $_POST['dpato'];
	$municipio = $_POST['municipio'];
	$regimen = $_POST['regimen'];


	//**************************** FE **********************************
	//**************************** FE **********************************
	//**************************** FE **********************************

	if ($dv == '') {
		$dv = 0;
	}


	$fecha = date("Y-m-d");


	mysqli_query($conn3, "INSERT INTO v_clienteE (usuario_id, nombre, precio, direccion, telefono, ciudad, responsable, celularResponsable, fecha, fac_identificacion, fac_tipodeempresa, fac_tipodepersona, apl2, apl1, comentarios, dv, nit, nom1, nom2, obligacionfiscal, identificacion, razonsocial, tributoreceptor, email_fe, departamento, municipio, regimen) VALUES ('$usuario_id', '$nombre', '$precio', '$direccion', '$telefono', '$ciudad',  '$responsable', '$celularResponsable', '$fecha', '$fac_identificacion', '$fac_tipodeempresa', '$fac_tipodepersona', '$apl2', '$apl1', '$comentarios', '$dv', '$nit', '$nom1', '$nom2', '$obligacionfiscal', '$identificacion', '$razonsocial', '$tributoreceptor', '$email_fe', '$dpato', '$municipio', '$regimen');");


	echo "INSERT INTO v_clienteE (usuario_id, nombre, precio, direccion, telefono, ciudad, responsable, celularResponsable, fecha, fac_identificacion, fac_tipodeempresa, fac_tipodepersona, apl2, apl1, comentarios, dv, nit, nom1, nom2, obligacionfiscal, identificacion, razonsocial, tributoreceptor, email_fe, departamento, municipio, regimen) VALUES ('$usuario_id', '$nombre', '$precio', '$direccion', '$telefono', '$ciudad',  '$responsable', '$celularResponsable', '$fecha', '$fac_identificacion', '$fac_tipodeempresa', '$fac_tipodepersona', '$apl2', '$apl1', '$comentarios', '$dv', '$nit', '$nom1', '$nom2', '$obligacionfiscal', '$identificacion', '$razonsocial', '$tributoreceptor', '$email_fe', '$dpato', '$municipio', '$regimen');";

	echo "<script language='Javascript'> window.location='empresa?msg=1'; </script>";
}

if (isset($_POST['actualizar_empresa'])) {
	include 'funciones/funcionesUtilidades.php';


	$id = $_POST['idE'];
	$usuario_id = $_POST['usuario_id'];
	$nombre = reem($_POST['nombre']);
	$nit = reem($_POST['nit']);
	$precio = $_POST['precio'];
	$direccion = reem($_POST['direccion']);
	$telefono = reem($_POST['telefono']);
	$correo = reem($_POST['email_fe']);
	$responsable = reem($_POST['responsable']);
	$celularResponsable = reem($_POST['celularResponsable']);
	$ciudad = reem($_POST['ciudad']);
	$departamento = $_POST['departamento'];
	$municipio = $_POST['municipio'];
	$regimen = $_POST['regimen'];

	$fac_identificacion = $_POST['fac_identificacion'];
	$fac_tipodeempresa = $_POST['fac_tipodeempresa'];
	$fac_tipodepersona = $_POST['fac_tipodepersona'];
	$apl2 = $_POST['apl2'];
	$apl1 = $_POST['apl1'];
	$comentarios = $_POST['comentarios'];
	$dv = $_POST['dv'];
	$nom1 = $_POST['nom1'];
	$nom2 = $_POST['nom2'];
	$obligacionfiscal = $_POST['obligacionfiscal'];
	$razonsocial = $_POST['razonsocial'];
	$tributoreceptor = $_POST['tributoreceptor'];
	$identificacion = $_POST['identificacion'];




	mysqli_query($conn3, "update v_clienteE set
				nombre = '$nombre',
				nit = '$nit',
				precio = '$precio',
				direccion = '$direccion',
				telefono = '$telefono',
				email_fe = '$correo',
				responsable = '$responsable',
				celularResponsable = '$celularResponsable',
				departamento = '$departamento',
 municipio = '$municipio',
 regimen = '$regimen',
 fac_identificacion = '$fac_identificacion',
 fac_tipodeempresa = '$fac_tipodeempresa',
 fac_tipodepersona = '$fac_tipodepersona',
 apl2 = '$apl2',
 apl1 = '$apl1',
 comentarios ='$comentarios',
  dv = '$dv',
  nom1 = '$nom1',
 nom2 = '$nom2',
  obligacionfiscal = '$obligacionfiscal',
  razonsocial = '$razonsocial',
  tributoreceptor = '$tributoreceptor',
  identificacion = '$identificacion',
				ciudad = '$ciudad'
				where id = '$id'");




	echo "update v_clienteE set
				nombre = '$nombre',
				nit = '$nit',
				precio = '$precio',
				direccion = '$direccion',
				telefono = '$telefono',
				email_fe = '$correo',
				responsable = '$responsable',
				celularResponsable = '$celularResponsable',
				departamento = '$departamento',
 municipio = '$municipio',
 regimen = '$regimen',
 fac_identificacion = '$fac_identificacion',
 fac_tipodeempresa = '$fac_tipodeempresa',
 fac_tipodepersona = '$fac_tipodepersona',
 apl2 = '$apl2',
 apl1 = '$apl1',
 comentarios ='$comentarios',
  dv = '$dv',
  nom1 = '$nom1',
 nom2 = '$nom2',
  obligacionfiscal = '$obligacionfiscal',
  razonsocial = '$razonsocial',
  tributoreceptor = '$tributoreceptor',
  identificacion = '$identificacion',
				ciudad = '$ciudad'
				where id = '$id'";
	echo "<script language='Javascript'> window.location='empresa?msg=5'; </script>";
}

function v_empresaselect($idUsuario)
{

	$resultadoC = mysqli_query($conn3, "SELECT * FROM v_clienteE where usuario_id = '$idUsuario' order by nombre");
	//$resultado=mysqli_query($conn3, "select * from ytc_oferta");
	while ($fila = mysqli_fetch_array($resultadoC, MYSQLI_NUM)) {
		echo '<option value="' . $fila[0] . '">' . $fila[2] . '</option>';
	}

	return trim($texto);
}




function v_empresa($id)
{

	$resultadojornadaLaboral = mysqli_query($conn3, "SELECT * FROM v_clienteE where id = $id");
	//$resultado=mysqli_query($conn3, "select * from ytc_oferta");
	while ($filajornadaLaboral = mysqli_fetch_array($resultadojornadaLaboral, MYSQLI_NUM)) {
		$respuesta = $filajornadaLaboral[1];
	}
	return $respuesta;
}


































// *********************************************************** LISTAS v_servicios  *******************************************************
// *********************************************************** LISTAS v_servicios  ***************************************************************

if (isset($_POST['registro_v_servicios'])) {
	include 'funciones/funcionesUtilidades.php';

	$usuario_id = $_POST['usuario_id'];



	$nombre = reem($_POST['nombre']);
	$descripcion = reem($_POST['descripcion']);
	$periodo = $_POST['periodo'];
	$siglas = $_POST['siglas'];
	$p1 = $_POST['p1'];
	$p2 = $_POST['p2'];
	$p3 = $_POST['p3'];
	$p4 = $_POST['p4'];
	$p5 = $_POST['p5'];
	$p6 = $_POST['p6'];

	$edadMinima = $_POST['edadMinima'];
	$edadMaximo = $_POST['edadMaximo'];
	$cuantas = $_POST['cuantas'];




	mysqli_query($conn3, "INSERT INTO v_servicios (usuario_id, descripcion, nombre, periodo, p1, p2, p3, p4, p5, p6, edadMinima, edadMaximo, cuantas, siglas) VALUES ('$usuario_id', '$descripcion', '$nombre', '$periodo', '$p1', '$p2', '$p3', '$p4', '$p5', '$p6', '$edadMinima', '$edadMaximo', '$cuantas', '$siglas');");



	echo "<script language='Javascript'> window.location='serviciosVacunar?msg=1'; </script>";
}

if (isset($_POST['actualizar_v_servicios'])) {
	include 'funciones/funcionesUtilidades.php';


	$id = $_POST['idE'];
	$nombre = reem($_POST['nombre']);
	$descripcion = reem($_POST['descripcion']);
	$periodo = $_POST['periodo'];

	$p1 = $_POST['p1'];
	$p2 = $_POST['p2'];
	$p3 = $_POST['p3'];
	$p4 = $_POST['p4'];
	$p5 = $_POST['p5'];
	$p6 = $_POST['p6'];

	$edadMinima = $_POST['edadMinima'];
	$edadMaximo = $_POST['edadMaximo'];
	$cuantas = $_POST['cuantas'];

	mysqli_query($conn3, "update v_servicios set
				nombre = '$nombre',
				descripcion = '$descripcion',
				periodo = '$periodo',
				siglas = '$siglas',
				p1 = '$p1',
				p2 = '$p2',
				p3 = '$p3',
				p4 = '$p4',
				p5 = '$p5',
				p6 = '$p6',
				edadMinima = '$edadMinima',
				edadMaximo = '$edadMaximo' ,
				cuantas = '$cuantas'
				where id = '$id'");

	echo "<script language='Javascript'> window.location='serviciosVacunar?msg=5'; </script>";
}


function v_serviciosselect($idUsuario, $edad)
{

	$resultadoC = mysqli_query($conn3, "SELECT * FROM v_servicios where usuario_id = '$idUsuario' and ($edad >= edadMinima and $edad <= edadMaximo) order by nombre");
	//$resultado=mysqli_query($conn3, "select * from ytc_oferta");
	while ($fila = mysqli_fetch_array($resultadoC, MYSQLI_NUM)) {
		echo '<option value="' . $fila[0] . '">' . $fila[14] . '-' . $fila[3] . '</option>';
	}

	return trim($texto);
}




function v_servicios($id)
{

	$resultadojornadaLaboral = mysqli_query($conn3, "SELECT * FROM v_servicios where id = $id");
	//$resultado=mysqli_query($conn3, "select * from ytc_oferta");
	while ($filajornadaLaboral = mysqli_fetch_array($resultadojornadaLaboral, MYSQLI_NUM)) {
		$respuesta = $filajornadaLaboral[3];
	}
	return $respuesta;
}





function aplicadas($id)
{
	if ($id == 0) {
		$respuesta = '<font color="red"> No aplicada </font> ';
	} elseif ($id == 1) {
		$respuesta = '<font color="blue">Aplicada </font> ';
	}

	return $respuesta;
}






// *********************************************************** LISTAS v_servicios  *******************************************************
// *********************************************************** LISTAS v_servicios  ***************************************************************

if (isset($_POST['registro_v_gastos'])) {
	include 'funciones/funcionesUtilidades.php';

	$usuario_id = $_POST['usuario_id'];




	$descripcion = reem($_POST['descripcion']);
	$fecha = $_POST['fecha'];
	$valor = $_POST['valor'];

	$fechaReg = date("Y-m-d h:m:s");




	mysqli_query($conn3, "INSERT INTO v_gastos (descripcion, valor, usuario_id, fecha, fechaReg) VALUES
	('$descripcion', '$valor', '$usuario_id', '$fecha', '$fechaReg');");


	echo "<script language='Javascript'> window.location='registrosGastos?msg=1'; </script>";
}
















// *************************  Usuarios auxiliares  *******************************************************
// ************************* Usuarios auxiliares ***************************************************************






function usuariosAselect($idUsuario)
{
	include 'conn3.php';

	$resultadoC = mysqli_query($conn3, "SELECT * FROM usuarios where ACTIVO = 1 ");


	if ($resultadoC) {
		while ($fila = mysqli_fetch_array($resultadoC, MYSQLI_NUM)) {
			echo '<option value="' . $fila[6] . '">' . $fila[6] . '</option>';
		}
	}


	return trim($texto);
}


function usuariosEspecialistasSelect($selected = null)
{
	# Esteban: esto puede fallar si no tiene una session
	include 'conn3.php';

	$queryList = mysqli_query($conn3, "SELECT * FROM usuarios where (ID_principal = '{$_SESSION['ID']}' or ID_principal = '{$_SESSION['ID_principal']}') and ACTIVO = 1 and TIPO <> 1");
	$nrowl = mysqli_num_rows($queryList);
	$isSelected = fn($val1, $val2) => $val1 == $val2 ? "selected" : "";
	while ($fila = mysqli_fetch_array($queryList)) {
		// echo '<option value="' . $fila['ID'] . '">' . $fila['NOMBRE_USUARIO'] . '-' . $fila['especialidad'] . '</option>';
		echo <<<HTML
		<option value="{$fila['ID']}" {$isSelected($fila['ID'],$selected)}>
			{$fila['NOMBRE_USUARIO']} 
		</option>
		HTML;
	}

	return trim($texto);
}




function usuariosA($email)
{

	$resultadojornadaLaboral = mysqli_query($conn3, "SELECT * FROM usuariosSegundarios where email = $email");
	//$resultado=mysqli_query($conn3, "select * from ytc_oferta");
	while ($filajornadaLaboral = mysqli_fetch_array($resultadojornadaLaboral, MYSQLI_NUM)) {
		$respuesta1 = $filajornadaLaboral[3];
		/* $respuesta2 = $filajornadaLaboral[2];

																				   $respuesta = $respuesta1.'|'.$respuesta2;
																				   */
	}
	return $respuesta1;
}


































// ************************* Servicio odonto  *******************************************************
// ************************* Servicio odonto ***************************************************************






function serviciosOdontoSelect($idUsuario)
{

	$resultadoC = mysqli_query($conn3, "SELECT * FROM 	servicios_odonto   order by descripcion");
	//$resultado=mysqli_query($conn3, "select * from ytc_oferta");
	while ($fila = mysqli_fetch_array($resultadoC, MYSQLI_NUM)) {
		echo '<option value="' . $fila[0] . '">' . $fila[1] . '</option>';
	}
	return trim($texto);
}




function serviciosOdonto($id)
{

	$resultadojornadaLaboral = mysqli_query($conn3, "SELECT * FROM servicios_odonto where id = $id");
	//$resultado=mysqli_query($conn3, "select * from ytc_oferta");
	while ($filajornadaLaboral = mysqli_fetch_array($resultadojornadaLaboral, MYSQLI_NUM)) {
		$respuesta1 = $filajornadaLaboral[1];
		/* $respuesta2 = $filajornadaLaboral[2];

																				   $respuesta = $respuesta1.'|'.$respuesta2;
																				   */
	}
	return $respuesta1;
}





// *********************************** CONG CONSENTIMIENTOS ***********************************
// *********************************** CONG CONSENTIMIENTOS ***********************************
// *********************************** CONG CONSENTIMIENTOS ***********************************
function cambiarVariables($texto1, $idCliente, $idUsuario)
{
	include 'conn3.php';
	$queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id=$idCliente");
	$nrowl = mysqli_num_rows($queryList);
	while ($rowMotorizado = mysqli_fetch_array($queryList)) {
		$nombre = $rowMotorizado['nombre_cliente'];
		$documento = $rowMotorizado['CODI_CLIENTE'];
		$fechaNacimiento = $rowMotorizado['fechaNacimiento'];
		$celular_cliente = $rowMotorizado['celular_cliente'];
		$correo_cliente = $rowMotorizado['correo_cliente'];
	}
	$query_usuario = mysqli_query($conn3, "SELECT * FROM usuarios where ID='{$idUsuario}'");
	$nrowl = mysqli_num_rows($query_usuario);
	while ($rowMotorizado = mysqli_fetch_array($query_usuario)) {
		$NOMBRE_USUARIO = $rowMotorizado['NOMBRE_USUARIO'];
	}
	$edad = date("Y") - date("Y", strtotime($fechaNacimiento));
	$fechaActual = date("d-m-Y");

	$find = array('[[NOMBRE_PACIENTE]]', '[[DOCUMENTO]]', '[[NOMBRE_DOCTOR]]', '[[EDAD]]', '[[FECHANACIMIENTO]]', '[[TELEFONO]]', '[[FECHAACTUAL]]', '[[CORREOELECTORNICO]]');
	$repl = array($nombre, $documento, $NOMBRE_USUARIO, $edad, $fechaNacimiento, $celular_cliente, $fechaActual, $correo_cliente);
	$texto1 = str_replace($find, $repl, $texto1);

	return $texto1;
}
// *********************************** CONG CONSENTIMIENTOS ***********************************
// *********************************** CONG CONSENTIMIENTOS ***********************************
// *********************************** CONG CONSENTIMIENTOS ***********************************

function cambiarVariablesCita($texto1, $idCliente, $idUsuario,$idCitas)
{
	include 'conn3.php';
	$queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id=$idCliente");
	while ($rowMotorizado = mysqli_fetch_array($queryList)) {
		$nombre = $rowMotorizado['nombre_cliente'];
		$documento = $rowMotorizado['CODI_CLIENTE'];
		$fechaNacimiento = $rowMotorizado['fechaNacimiento'];
		$celular_cliente = $rowMotorizado['celular_cliente'];
		$correo_cliente = $rowMotorizado['correo_cliente'];
	}
	$query_usuario = mysqli_query($conn3, "SELECT * FROM usuarios where ID='{$idUsuario}'");
	while ($rowMotorizado = mysqli_fetch_array($query_usuario)) {
		$NOMBRE_USUARIO = $rowMotorizado['NOMBRE_USUARIO'];
	}
	$edad = date("Y") - date("Y", strtotime($fechaNacimiento));
	$fechaActual = date("d-m-Y");

	$query_cita = mysqli_query($conn3, "SELECT * FROM citas where idCitas='{$idCitas}'");
	while ($rowMotorizado = mysqli_fetch_array($query_cita)) {
		$FECHA_CITA = $rowMotorizado['fecha'];
		$HORA_CITA = $rowMotorizado['Hora'];
		$MOTIVO_CONSULTA = funcionMaster($rowMotorizado['motivoConsulta'],'','','');
	}

	$find = array('[[NOMBRE_PACIENTE]]', '[[DOCUMENTO]]', '[[NOMBRE_DOCTOR]]', '[[EDAD]]', '[[FECHANACIMIENTO]]', '[[TELEFONO]]', '[[FECHAACTUAL]]', '[[CORREOELECTORNICO]]','[[FECHA_CITA]]','[[HORA_CITA]]','[[MOTIVO_CONSULTA]]');
	$repl = array($nombre, $documento, $NOMBRE_USUARIO, $edad, $fechaNacimiento, $celular_cliente, $fechaActual, $correo_cliente, $FECHA_CITA, $HORA_CITA, $MOTIVO_CONSULTA);
	$texto1 = str_replace($find, $repl, $texto1);

	return $texto1;
}

// *********************************** PREPARE POST OR VARIABLE ***********************************
function clearInput($value)
{
	include './funciones/conn3.php';
	$replace = array(
		'@<script[^>]*?>.*?</script>@si', // Elimina javascript
		/*'@<[\ /\!]*?[^<>]*?>@si', // Elimina las etiquetas HTML
																				  '@<style[^>]*?>.*?</style>@siU', // Elimina las etiquetas de estilo*/
		'@
        <![\s\S]*?--[ \t\n\r]*>@',        // Elimina los comentarios multi-línea
		'@SELECT.*?FROM@si',
		'@FROM.*?WHERE@si',
		'@UPDATE.*?SET@si',
		'@INSERT INTO.*?SET@si',
		'@DELETE@si',
		'@SELECT@si',
		'@FROM@si',
		'@UPDATE@si',
		'@INSERT@si',
		'@DROP@si',
		'@TRUNCATE@si',
		'@ALTER@si',
		'@TABLE@si',
		'@CREATE@si'
	);
	if (is_array($value)) { // si es un array
		return array_map('clearInput', $value); // retornamos la auto llamada por cada valor hasta ramificar cada uno de los datos y por ultimo devolveria un array
	} else {
		return preg_replace($replace, '', mysqli_real_escape_string($conn3, $value)); // en este caso por cada llamada pasara por este apartado para ser limpiado de inyecciones de codigo y limpiar soltos de lineas y demas
	}
}
function preparePost($post = array(), $Parse_Ignore = array())
// $post: array|any, $Parse_Ignore: array|boolean
{
	$notString = [
		'now()', // devuelve la fecha y hora actual
		'null' // tipo de dato null
	];
	$data = ""; // con esto almacenamos lo que retornaremos
	$indice = 0; // con esto controlaremos la posicion de la coma al culminar
	if (!is_array($post)) { // si el valor recibido no es array; solo limpiaremos el dato
		$data = clearInput($post);
	} else { // si es un array lo setearemos
		foreach ($post as $key => $value) { // recorremos el array
			if (!in_array($key, $Parse_Ignore) || (gettype($Parse_Ignore) === "boolean" && $Parse_Ignore === true)) { // nos aseguramos; si es un array o boleano, para ignorar valores o que pueda pasar por esta condicion
				$value = clearInput($value); // limpiamos valores de inyeccion de codigo; saltos de linea y demas, y pasamos los valores a caracteres compatibles con la conexion de la db
				if (gettype($Parse_Ignore) != "boolean") { // validamos si no es un valor boleano; entonces preparamos el array para su posterior INSERT || UPDATE u otros
					$value = (is_array($value) ? json_encode($value) : $value); // (OPCIONAL) este caso convertira los arrays internos en json para evitar errores al insertar en tabla
					$data .= (in_array($value, $notString) ? "{$key} = {$value}" : "{$key} = '{$value}'") . ($indice == (count($post) - 1) ? "" : ", "); // preparamos los valores dividiendo con un espacio y una coma
					// $data .= "{$key} = '{$value}'" . ($indice == (count($post) - 1) ? "" : ", "); // preparamos los valores dividiendo con un espacio y una coma
				} else { // de ser un valor boleano; solo preparamos los valores para su poesterior vuelta como un array nuevamente
					$post[$key] = $value;
				}
			}
			$indice++;
		}
	}
	// retornamos el valor correcto segun los valores pasados; ya sea array; o un valor unico; y segun el parametro de parseo.
	return $data = ((gettype($Parse_Ignore) === "boolean" && $Parse_Ignore === true) ? $post : preg_replace("/, $/", '', $data));
}
// $_POST[ 'name' => 'value1', 'cedula' => 'value2']
// $prepare =  preparePost($_POST); EJEMPLO DE USO: name = 'value1', cedula = 'value2'
// $prepare =  preparePost($_POST, ['name']); EJEMPLO DE COMO IGNORAR VALORES  EJEMPLO DE USO: cedula = 'value1'
// $variable = "PruebaINSERT INTO SER";
// $variableLimpia =  preparePost($variable); LIMPIAR VARIABLES EJEMPLO DE USO: Prueba
// $_POST[ 'name' => 'value1', 'cedula' => 'value2']
// $_POST =  preparePost($_POST, true); LIMPIAR ARRAY Y DEVOLVERA EL MISMO ARRAY EJEMPLO DE USO: // [ 'name' => 'value1', 'cedula' => 'value2']
// *********************************** PREPARE POST OR VARIABLE ***********************************



// CENTROS DE COSTO
function verCentroCosto()
{
	include 'conn3.php';
	echo '<label>Centro de Costos</label><br>';
	echo '<select class="form-control input-lg select" name="idCentroCosto">';
	echo '<option value="0" selected="">Seleccione</option>';
	$queryListCentro = mysqli_query($conn3, "SELECT * from CcentroCostos");
	$nrowl = mysqli_num_rows($queryListCentro);
	while ($rowCentro = mysqli_fetch_array($queryListCentro)) {

		$idCentro = $rowCentro['id'];
		$codigoCentro = $rowCentro['codigo'];
		$descripcionCentro = $rowCentro['descripcion'];
		$fechaRegCentro = $rowCentro['fechaReg'];
		$horaRegCentro = $rowCentro['horaReg'];
		$preCentro = $rowCentro['pre'];
		$movCentro = $rowCentro['mov'];
		$actCentro = $rowCentro['act'];
		$grupoCentro = $rowCentro['grupo'];
		$subgrupoCentro = $rowCentro['subgrupo'];
		$estadoCentro = $rowCentro['estado'];
		$subCentroCentro = $rowCentro['subCentro'];
		$centroPrincipal_idCentro = $rowCentro['centroPrincipal_id'];

		echo '<option value="' . $idCentro . '">' . $codigoCentro . '-' . $descripcionCentro . '</option>';
	}
	echo '</select>';
	return trim($texto);
}
// CENTROS DE COSTO array
function verCentroCostoArray()
{
	include 'conn3.php';
	echo '<label>Centro de Costos</label><br>';
	echo '<select class="form-control input-lg select" name="idCentroCosto[]">';
	echo '<option value="0" selected="">Seleccione</option>';
	$queryListCentro = mysqli_query($conn3, "SELECT * from CcentroCostos");
	$nrowl = mysqli_num_rows($queryListCentro);
	while ($rowCentro = mysqli_fetch_array($queryListCentro)) {

		$idCentro = $rowCentro['id'];
		$codigoCentro = $rowCentro['codigo'];
		$descripcionCentro = $rowCentro['descripcion'];
		$fechaRegCentro = $rowCentro['fechaReg'];
		$horaRegCentro = $rowCentro['horaReg'];
		$preCentro = $rowCentro['pre'];
		$movCentro = $rowCentro['mov'];
		$actCentro = $rowCentro['act'];
		$grupoCentro = $rowCentro['grupo'];
		$subgrupoCentro = $rowCentro['subgrupo'];
		$estadoCentro = $rowCentro['estado'];
		$subCentroCentro = $rowCentro['subCentro'];
		$centroPrincipal_idCentro = $rowCentro['centroPrincipal_id'];

		echo '<option value="' . $idCentro . '">' . $codigoCentro . '-' . $descripcionCentro . '</option>';
	}
	echo '</select>';
	return trim($texto);
}

function diferenciaHorasEnMinutos($hora1, $hora2)
{
	// Convertir las horas a objetos DateTime para facilitar el cálculo
	$horaInicio = new DateTime($hora1);
	$horaFin = new DateTime($hora2);

	// Calcular la diferencia entre las dos horas
	$diferencia = $horaInicio->diff($horaFin);

	// Convertir la diferencia a minutos
	$minutos = ($diferencia->h * 60) + $diferencia->i;

	return $minutos;
}

function generarColorHex() {
    return sprintf("#%06X", mt_rand(0, 0xFFFFFF));
}

function validarHorarios($fecha, $hora, $doctor){
	global $conn3;

	$nombreDoctor = funcionMaster( $doctor, "ID", "NOMBRE_USUARIO", "usuarios");
	$diaSemana = date("l", strtotime($fecha));
	
	$arrayDaysSpanish = [
		"Monday" => "Lunes",
		"Tuesday" => "Martes",
		"Wednesday" => "Miercoles",
		"Thursday" => "Jueves",
		"Friday" => "Viernes",
		"Saturday" => "Sabado",
		"Sunday" => "Domingo",
	];
	
	$arrayCols = [
		"Monday" => ["lt","ld","lh","ldp","lhp"],
		"Tuesday" => ["mt","md","mh","mdp","mhp"],
		"Wednesday" => ["et","ed","eh","edp","ehp"],
		"Thursday" => ["jt","jd","jh","jdp","jhp"],
		"Friday" => ["vt","vd","vh","vdp","vhp"],
		"Saturday" => ["st","sd","sh","sdp","shp"],
		"Sunday" => ["dt","dd","dh","ddp","dhp"],
	];

	$columnas = $arrayCols[$diaSemana];
	
	$colDiaActivo = $columnas[0];
	$colDiaInicioManana = $columnas[1];
	$colDiaFinManana = $columnas[2];
	$colDiaInicioTarde = $columnas[3];
	$colDiaFinTarde = $columnas[4];

	$cols = "$colDiaActivo , $colDiaInicioManana , $colDiaFinManana , $colDiaInicioTarde , $colDiaFinTarde";
	$QueryConfigHorario = "SELECT $cols FROM config WHERE ID_Usuario = '$doctor'";
	$ResultConfigHorario = mysqli_query($conn3, $QueryConfigHorario);
	if (!$ResultConfigHorario) {
		return [
			"avaliable" => false,
			"messsage" => "Usuario {$nombreDoctor} no cuenta con configuracion de horario " ,
		];
		
	}

	$RowsConfiguracionHorario = mysqli_fetch_assoc($ResultConfigHorario);
	$diaActivo = $RowsConfiguracionHorario[$colDiaActivo];
	$diaInicioManana = $RowsConfiguracionHorario[$colDiaInicioManana];
	$diaFinManana = $RowsConfiguracionHorario[$colDiaFinManana];
	$diaInicioTarde = $RowsConfiguracionHorario[$colDiaInicioTarde];
	$diaFinTarde = $RowsConfiguracionHorario[$colDiaFinTarde];

	if ($diaActivo == '0') {
		return [
			"avaliable" => false,
			"messsage" => "El dia ". $arrayDaysSpanish[$diaSemana] ." no esta activo para usuario {$nombreDoctor}",
		];
	}
	
	
	$dt_hora            = new DateTime($hora);
	$dt_diaInicioManana = new DateTime($diaInicioManana);
	$dt_diaFinManana    = new DateTime($diaFinManana);
	$dt_diaInicioTarde  = new DateTime($diaInicioTarde);
	$dt_diaFinTarde     = new DateTime($diaFinTarde);
	
	$validarManana = $dt_hora >= $dt_diaInicioManana && $dt_hora <= $dt_diaFinManana;
	$validarTarde  = $dt_hora >= $dt_diaInicioTarde  && $dt_hora <= $dt_diaFinTarde;
	
	if (!$validarManana && !$validarTarde) {
		return [
			"avaliable" => false,
			"messsage" => "Hora ". $hora ." no esta activa para usuario {$nombreDoctor} el dia ". $arrayDaysSpanish[$diaSemana],
		];
	}
	
	
	return [
		"avaliable" => true,
		"messsage" => "Espacio disponible",
	];


}

function sendApiGoogleCalendar($citaId){
	global $Base;
	$url = $Base . "ApiGoogleCalendar.php?cita_id=$citaId&ruta=0";

	$response = file_get_contents($url);
}

function reem_array($array){
	require_once __DIR__ . '/funcionesUtilidades.php';
	$nuevo_array = [];
	foreach ($array as $key => $value) {
		if( is_array($value) ){ 
			$nuevo_array[$key] = $value;
			continue;
		}
		$value = trim($value);
		$value = reem($value);
		$nuevo_array[$key] = $value;
	}

	return $nuevo_array;
}