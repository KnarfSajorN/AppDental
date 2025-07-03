<?php
date_default_timezone_set('America/Bogota');
include("funciones/funcionesUtilidades.php");
include("funciones/funciones.php");
$conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error_list($conn3));
$cod = preparePost($_POST['cod']);
$existe = mysqli_query($conn3, "SELECT * FROM cliente where cod_validacion = '{$cod}'");
$Nrow = mysqli_num_rows($existe);
if ($Nrow === 1) {
    $_POST['celular_cliente'] = $_POST['whatsapp'];
    $_POST['whatsapp'] = $_POST['indicativo'] . $_POST['whatsapp'];
    $_POST['nombre_cliente'] = $_POST['primer_nombre'] . ' ' . $_POST['primer_apellido'];
    $_POST['cod_validacion'] = '';
    $_POST['activo'] = 1;
    $_POST['fechar'] = date("Y-m-d H:i:s");
    $prepare = preparePost($_POST, ['cod']);
    $queryUsuario = mysqli_query($conn3, "UPDATE cliente SET {$prepare} WHERE cod_validacion='$cod'");
    if ($queryUsuario) {
        echo "<script language='Javascript'> window.location='registroPaciente?status=ok';</script>";
    } else {
        echo "<script language='Javascript'> window.location='registroPaciente?status=error';</script>";
    }
} else {
    echo "<script language='Javascript'> window.location='registroPaciente';</script>";
}
