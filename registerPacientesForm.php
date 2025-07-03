<?php 
session_start();


$tipo_cliente = $_POST['tipo_cliente'];
$idUsuario = $_POST['idUsuario'];
$CODI_CLIENTE = $_POST['CODI_CLIENTE'];
$fechaNacimiento = $_POST['fechaNacimiento'];
$primer_nombre = $_POST['primer_nombre'];
$segundo_nombre = $_POST['segundo_nombre'];
$primer_apellido = $_POST['primer_apellido'];
$segundo_apellido = $_POST['segundo_apellido'];
$genero = $_POST['genero'];
$correo_cliente = $_POST['correo_cliente'];
$whatsapp = $_POST['whatsapp'];
$id_paciente = $_POST['id_paciente'];
$nombreCompleto = $primer_nombre . ' ' . $segundo_nombre . ' ' . $primer_apellido . ' ' . $segundo_apellido;

$_SESSION['ID_principal'] = $idUsuario;
// var_dump($_POST);
include("funciones/funciones.php");
include("funciones/funcionesUtilidades.php");
include 'funciones/conn3.php';

$query = ($_POST['id_paciente'] == 0 ? 'INSERT INTO' : 'UPDATE'). " cliente
set 
usuario_id = '$idUsuario'
, ID_principal = '$idUsuario'
, nombre_cliente = '$nombreCompleto'
, primer_nombre = '$primer_nombre'
, segundo_nombre = '$segundo_nombre'
, primer_apellido = '$primer_apellido'
, segundo_apellido = '$segundo_apellido'
, genero = '$genero'
, fechaNacimiento = '$fechaNacimiento'
, correo_cliente = '$correo_cliente'
, whatsapp = '$whatsapp'
, celular_cliente = '$whatsapp'
, CODI_CLIENTE = '$CODI_CLIENTE'
, tipo_cliente = '$tipo_cliente'
". ($_POST['id_paciente'] == 0 ? '' : 'WHERE cliente_id = ' . $_POST['id_paciente']);
// var_dump($query);
$queryList = mysqli_query($conn3, $query);

if ($id_paciente == 0) {
    ?>
    <!-- <script>
        if (window.confirm("Registro Exitoso")) {
            window.location.href = "https://www.google.com";
        }else{
            window.location.href = "https://www.google.com";
        }
    </script> -->
    <?php 
}else{
    ?>
    <script>
        if (window.confirm("Actualización Exitosa")) {
            window.location.href = "https://www.google.com";
        }else{
            window.location.href = "https://www.google.com";
        }
    </script>
    <?php 
}


$queryList3 = mysqli_query($conn3, "SELECT * FROM config where ID_Usuario = $idUsuario");

$nrowl = mysqli_num_rows($queryList3);

while ($rowMotorizado = mysqli_fetch_array($queryList3)) {



  $CitasGoogleCalendar = $rowMotorizado['CitasGoogleCalendar'];

  $nombreF = $rowMotorizado['nombreF'];

  $telefonoF = $rowMotorizado['telefonoF'];

  $direccionF = $rowMotorizado['direccionF'];

  $emailF = $rowMotorizado['emailF'];



  $whatsappF = $rowMotorizado['whatsapp'];

  $LogoF           = $rowMotorizado['logoF'];



  $emailF = $rowMotorizado['emailF'];







  $sul = $rowMotorizado['sul'];

  $sum = $rowMotorizado['sum'];

  $sue = $rowMotorizado['sue'];

  $suj = $rowMotorizado['suj'];

  $suv = $rowMotorizado['suv'];

  $sus = $rowMotorizado['sus'];

  $sud = $rowMotorizado['sud'];



  if (strlen($LogoF) > 0) {

    $Logo = '<img src="'.$Base.'logos/' . $LogoF . '" height="60" width="120">';
  }

  
}

$mensajeW = 'Registro de Paciente.

Estimado Doctor *' . $nombreD . '* ,Se registró un paciente nuevo.
  
  
Paciente Registrado: *' . $nombreCompleto . '*.  
  

Atte. '.$nombreF.' Teléfono ' . $telefonoF . ' Correo ' . $emailF . '';
$accion = 0;
$cliente = 0;

Whatsapp_sent_cliente($linkkey, $telefonoF, $mensajeW, $cliente, $idUsuario, $whatsappF, $accion);

echo 
    "<script>window.location.href='https://www.google.com';</script>";

?>

