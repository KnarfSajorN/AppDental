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
  $primer_apellido = $_POST['primer_apellido'];
  $genero = $_POST['genero'];
  $sucursal_cliente = $_POST['sucursal_cliente'];
  $correo_cliente = $_POST['correo_cliente'];
  $indicativo = $_POST['indicativo'];
  $whatsapp = $indicativo.$_POST['whatsapp'];

  $ID_principal = $_POST['ID_principal'];

  $id_usuario = $_POST['ID'];
  
  $NOMBRE =$primer_nombre;
  $apellido =$primer_apellido;
  $nombre_cliente = $NOMBRE.' '.$apellido;

//insetamos el usuario
$entidad_id = $_POST['entidad_id'];
if ($entidad_id == '') {
  $entidad_id = '0';
}
$convenio_id = $_POST['convenio'];
if ($convenio_id == '') {
  $convenio_id = '0';
}

$Fecha_Ultimo_Parto = $_POST['Arreglo']['Fecha_Ultimo_Parto'];
$Fecha_Ultima_Mestruacion = $_POST['Arreglo']['Fecha_Ultima_Mestruacion'];
$Numero_Embarazos = $_POST['Arreglo']['Numero_Embarazos'];

mysqli_query($conn3,"INSERT INTO cliente (usuario_id, nombre_cliente, celular_cliente, correo_cliente, CODI_CLIENTE, tipo_cliente, fechar, activo, genero, fechaNacimiento,whatsapp,sucursal,primer_nombre,primer_apellido,indicativo,habeasdata,entidad_id,convenio_id,Fecha_Ultimo_Parto,Fecha_Ultima_Mestruacion,Numero_Embarazos, ID_principal) VALUES
            ('$id_usuario','$nombre_cliente','$whatsapp','$correo_cliente','$CODI_CLIENTE','$tipo_cliente','$fechar','$activo','$genero','$fechaNacimiento','$whatsapp','$sucursal_cliente','$primer_nombre','$primer_apellido','$indicativo','Si','$entidad_id','$convenio_id','$Fecha_Ultimo_Parto','$Fecha_Ultima_Mestruacion','$Numero_Embarazos','$ID_principal')");

$query = "INSERT INTO cliente (usuario_id, nombre_cliente, celular_cliente, correo_cliente, CODI_CLIENTE, tipo_cliente, fechar, activo, genero, fechaNacimiento,whatsapp,sucursal,primer_nombre,primer_apellido,indicativo,habeasdata,entidad_id,convenio_id,Fecha_Ultimo_Parto,Fecha_Ultima_Mestruacion,Numero_Embarazos, ID_principal) VALUES
            ($id_usuario,$nombre_cliente,$whatsapp,$correo_cliente,$CODI_CLIENTE,$tipo_cliente,$fechar,$activo,$genero,$fechaNacimiento,$whatsapp,$sucursal_cliente,$primer_nombre,$primer_apellido,$indicativo,Si,$entidad_id,$convenio_id,$Fecha_Ultimo_Parto,$Fecha_Ultima_Mestruacion,$Numero_Embarazos,$ID_principal)";




$enlace_actual = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

auditorMaster($id_usuario, 2, $enlace_actual, $query);




 

$id_cliente = mysqli_insert_id($conn3);
$Usuario_Web = $primer_nombre . substr($CODI_CLIENTE, 0, 5).'_'.$id_cliente;
$Clave_Web = $CODI_CLIENTE.$id_cliente;

mysqli_query($conn3, "UPDATE cliente SET  Usuario_Web= '$Usuario_Web', Clave_Web='$Clave_Web'  WHERE cliente_id = '$id_cliente'");
// echo "UPDATE cliente SET  Usuario_Web= '$Usuario_Web', Clave_Web='$Clave_Web'  WHERE cliente_id = '$id_cliente'";

            
                    echo "<script language='Javascript'> window.location='agregarCitas.php?clienteId=$id_cliente';</script>"; 
                                                     
                

?>