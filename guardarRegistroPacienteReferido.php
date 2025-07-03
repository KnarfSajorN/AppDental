<?php
session_start();
date_default_timezone_set('America/Bogota');

include("funciones/funcionesUtilidades.php");
include("funciones/funciones.php");

//Datos del paciente
  
  $fechar = date("Y-m-d H:i:s");
  $activo = 1;

  $tipo_cliente = $_POST['tipo'];
  $CODI_CLIENTE = $_POST['CODI_CLIENTE'];
  $fechaNacimiento = $_POST['fechaNacimiento'];
  $primer_nombre = $_POST['primer_nombre'];
  $segundo_nombre = $_POST['segundo_nombre'];
  $primer_apellido = $_POST['primer_apellido'];
  $segundo_apellido = $_POST['segundo_apellido'];
  $genero = $_POST['genero'];
  $correo_cliente = $_POST['correo_cliente'];
  $direccion_cliente = $_POST['direccion_cliente'];
  $ocupacion = $_POST['ocupacion'];
  $indicativo = $_POST['indicativo'];
  $whatsapp = $indicativo.$_POST['whatsapp'];

  $idcliente = $_POST['idcliente'];
  
  $NOMBRE =$primer_nombre.' '.$segundo_nombre;
  $apellido =$primer_apellido.' '.$segundo_apellido;
  $nombre_cliente = $NOMBRE.' '.$apellido;
  $nombre_cliente = $NOMBRE.' '.$apellido;


mysqli_query($conn3,"INSERT INTO cliente (usuario_id, nombre_cliente, celular_cliente, correo_cliente, CODI_CLIENTE, tipo_cliente, fechar, activo, genero, fechaNacimiento,whatsapp,sucursal,primer_nombre,segundo_nombre,primer_apellido,segundo_apellido,indicativo,habeasdata, direccion_cliente, ocupacion, Referido) VALUES
            ('1','$nombre_cliente','$whatsapp','$correo_cliente','$CODI_CLIENTE','$tipo_cliente','$fechar','$activo','$genero','$fechaNacimiento','$whatsapp','$sucursal_cliente','$primer_nombre','$segundo_nombre','$primer_apellido','$segundo_apellido','$indicativo','Si', '$direccion_cliente', '$ocupacion', '$idcliente')");

echo "INSERT INTO cliente (usuario_id, nombre_cliente, celular_cliente, correo_cliente, CODI_CLIENTE, tipo_cliente, fechar, activo, genero, fechaNacimiento,whatsapp,sucursal,primer_nombre,segundo_nombre,primer_apellido,segundo_apellido,indicativo,habeasdata, direccion_cliente, ocupacion, Referido) VALUES
            ('1','$nombre_cliente','$whatsapp','$correo_cliente','$CODI_CLIENTE','$tipo_cliente','$fechar','$activo','$genero','$fechaNacimiento','$whatsapp','$sucursal_cliente','$primer_nombre','$segundo_nombre','$primer_apellido','$segundo_apellido','$indicativo','Si', '$direccion_cliente', '$ocupacion', '$idcliente'";
 

$id_cliente = mysqli_insert_id($conn3);
$Usuario_Web = $primer_nombre . substr($CODI_CLIENTE, 0, 5).'_'.$id_cliente;
$Clave_Web = $CODI_CLIENTE.$id_cliente;

mysqli_query($conn3, "UPDATE cliente SET  Usuario_Web= '$Usuario_Web', Clave_Web='$Clave_Web'  WHERE cliente_id = '$id_cliente'");
// echo "UPDATE cliente SET  Usuario_Web= '$Usuario_Web', Clave_Web='$Clave_Web'  WHERE cliente_id = '$id_cliente'";

            
echo "<script language='Javascript'> window.location='{$Base}/web/calendario/agenda?idUsuario=1&valorconsulta=0';</script>"; 
                                                     
                

?>