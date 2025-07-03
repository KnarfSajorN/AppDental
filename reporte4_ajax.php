<?php
// Este archivo se encargará de generar y devolver los datos en formato JSON
date_default_timezone_set('America/Bogota');
include("funciones/funciones.php");
include("funciones/conn3.php");

$desde = $_POST['desde'] . ' 00:00:00';
$hasta = $_POST['hasta'] . ' 23:59:59';

$tipo = $_POST['tipo'];
$ID = $_POST['ID'];

$data = [['ID Cliente', 'Nombre Cliente', 'Celular Cliente', 'País', 'Correo Cliente', 'Fecha', 'Género', 'Dirección Cliente', 'Teléfono Cliente', 'Ocupación']];

$conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));

if ($tipo == 0) {
    $queryList = mysqli_query($conn3, "SELECT * FROM  cliente where usuario_id=$ID and fechar BETWEEN '$desde' and '$hasta' ");
} elseif ($tipo <> 0) {
    $resultado = mysqli_query($conn3, "SELECT * FROM  cliente where  usuario_id=$ID and cliente_id=$tipo and fechar BETWEEN '$desde' and '$hasta' ");
}

while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $cliente_id             = $rowMotorizado['CODI_CLIENTE'];
    $nombre_cliente         = $rowMotorizado['nombre_cliente'];
    $celular_cliente        = $rowMotorizado['celular_cliente'];
    $ciudad_cliente         = $rowMotorizado['ciudad_cliente'];
    $correo_cliente         = $rowMotorizado['correo_cliente'];
    $fechar                 = $rowMotorizado['fechar'];
    $fecha_actualizado      = $rowMotorizado['fecha_actualizado'];
    $activo                 = $rowMotorizado['activo'];
    $genero                 = $rowMotorizado['genero'];
    $direccion_cliente      = $rowMotorizado['direccion_cliente'];
    $telefono_cliente       = $rowMotorizado['telefono_cliente'];
    $edad_cliente           = $rowMotorizado['edad_cliente'];
    $profesion_cliente      = $rowMotorizado['profesion_cliente'];
    $acompananteFamiliar    = $rowMotorizado['acompananteFamiliar'];
    $telefono_acompanante   = $rowMotorizado['telefono_acompanante'];
    $motivoConsulta         = $rowMotorizado['motivoConsulta'];
    $antecedentes           = $rowMotorizado['antecedentes'];
    $entidadSalud           = $rowMotorizado['entidadSalud'];
    $seguro                 = $rowMotorizado['seguro'];
    $nota                   = $rowMotorizado['nota'];
    $alergias               = $rowMotorizado['alergias'];
    $tiposSangre            = $rowMotorizado['tiposSangre'];
    $esDonante              = $rowMotorizado['esDonante'];
    $tomaMedicamento        = $rowMotorizado['tomaMedicamento'];
    $enfermedadesPequeno    = $rowMotorizado['enfermedadesPequeno'];
    $ocupacion              = $rowMotorizado['ocupacion'];
    $codigo_pais            = $rowMotorizado['codigo_pais'];
    $pais                   = funcionMaster($codigo_pais, 'Codigo', 'Pais', 'Paises');

    $rowData = [$cliente_id, $nombre_cliente, $celular_cliente, $pais, $correo_cliente, $fechar, $genero, $direccion_cliente, $telefono_cliente, $ocupacion];
    $data[] = $rowData;
}

// Retorna los datos en formato JSON
echo json_encode($data);
