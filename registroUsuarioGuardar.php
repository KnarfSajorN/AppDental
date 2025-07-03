<?php 
include 'funciones/funciones.php';
include 'funciones/conn3.php';

// recibir post

$NOMBRE_USUARIO = $_POST['NOMBRE_USUARIO'];
$telefono = $_POST['telefono'];
$nombre_cliente = $_POST['nombre_cliente'];
$PASS = $_POST['PASS'];
$direccion = $_POST['direccion'];
$ciudad = $_POST['ciudad'];
$especialidad1 = $_POST['especialidad1'];
$especialidadText = funcionMaster($especialidad1,'id','descripcion','c_categoria');
$menu = $_POST['menu'];

// insertar en tabla usuarios
$queryInsertUser = "INSERT INTO usuarios
set
USUARIO = '{$nombre_cliente}'
,PASS = '{$PASS}'
,TIPO = 99
,rol = 0
,USER_ROL = 'Cliente'
,NOMBRE_USUARIO = '{$NOMBRE_USUARIO}'
,fec_ingreso = NOW()
,fecha_actualizado = NOW()
,ACTIVO = 1
,telefono = '{$telefono}'
,direccion = '{$direccion}'
,ciudad = '{$ciudad}'
,pais = ''
,numeroFactura = 0
,nit = ''
,especialidad = '{$especialidadText}'
,Nacimiento = '0000-00-00'
,aliado = '0'
,paisacceso = ''
,tipoLic = 0
,especialidad1 = '{$especialidad1}'
,especialidad2 = '{$especialidad1}'
,numeroPresupuesto = 0
,correo = ''
,vista = 0
,Indicativo = '57'
,factura = ''
,mes = ''
,codigoPrestador = ''
,Grafica_OMS = 1
,Grafica_CDC = 1
,Grafica_SD = 1
,sucursal = ''
,numeroOrden = 0
,menu = '{$menu}'
,tema = 'info'
,usuario_id = 0
,estadoDenys = 0
,numeroDevolucion = 0
,NumeroDocumentoSoporte = 0
,NumeroCargaActivos = 0
,NumeroDescargaActivos = 0
,permisosHospitalizacion = 0
";
$insertUser = mysqli_query($conn3, $queryInsertUser);
$lastId = mysqli_insert_id($conn3);

// insertar el config por defecto
$queryInsertConfig = "INSERT INTO config set ID_Usuario = '{$lastId}'";
$insertConfig = mysqli_query($conn3, $queryInsertConfig);

// redirect to login
header("Location: index.php");

?>