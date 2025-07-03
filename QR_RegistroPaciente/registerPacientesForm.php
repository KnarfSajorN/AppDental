<?php 
// var_dump($_POST);

$tipo_cliente = $_POST['tipo_cliente'];
$CODI_CLIENTE = $_POST['CODI_CLIENTE'];
$fechaNacimiento = $_POST['fechaNacimiento'];
$primer_nombre = $_POST['primer_nombre'];
$segundo_nombre = $_POST['segundo_nombre'];
$primer_apellido = $_POST['primer_apellido'];
$segundo_apellido = $_POST['segundo_apellido'];
$genero = $_POST['genero'];
$idUsuario = $_POST['idUsuario'];
$correo_cliente = $_POST['correo_cliente'];
$whatsapp = $_POST['whatsapp'];
$id_paciente = $_POST['id_paciente'];
$nombreCompleto = $primer_nombre . ' ' . $segundo_nombre . ' ' . $primer_apellido . ' ' . $segundo_apellido;

include 'funciones/conn3.php';

$query = ($_POST['id_paciente'] == 0 ? 'INSERT INTO' : 'UPDATE'). " cliente
set 
usuario_id = '$idUsuario'
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
    <script>
        if (window.confirm("Registro Exitoso")) {
            window.location.href = "https://www.google.com";
        }else{
            window.location.href = "https://www.google.com";
        }
    </script>
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

?>

