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

  $id_usuario = $_POST['ID'];

   $primer_nombre=$_POST['primer_nombre'];
        $segundo_nombre=$_POST['segundo_nombre'];
        $primer_apellido=$_POST['primer_apellido'];
        $segundo_apellido=$_POST['segundo_apellido'];


        $departamento               =$_POST['departamento'];
        $zona              =$_POST['zona'];

        $tipoUsuario = $_POST['tipoUsuario'];
        $estado = $_POST['estado'];
         $entidadSalud       = reem($_POST['entidadSalud']);

        



        $Codigo_Pais = $_POST['pais'];
        $Codigo_Departamento = $_POST['departamento'];
        $Codigo_Ciudad = $_POST['ciudad'];

         $queryList=mysqli_query($conn3,"SELECT * FROM administradora where codigo='$entidadSalud'");


        $nrowl=mysqli_num_rows($queryList);
        while($row_recordset32A=mysqli_fetch_array($queryList))
        {

          $nombreEntidad= $row_recordset32A['nombre'];




         }

  
  $NOMBRE =$primer_nombre;
  $apellido =$primer_apellido;
  $nombre_cliente = $NOMBRE.' '.$apellido;

                //insetamos el usuario

/*
mysqli_query($conn3,"INSERT INTO cliente (usuario_id, nombre_cliente, celular_cliente, correo_cliente, CODI_CLIENTE, tipo_cliente, fechar, activo, genero, fechaNacimiento,whatsapp,sucursal,primer_nombre,primer_apellido,indicativo) VALUES
            ('$id_usuario','$nombre_cliente','$whatsapp','$correo_cliente','$CODI_CLIENTE','$tipo_cliente','$fechar','$activo','$genero','$fechaNacimiento','$whatsapp','$sucursal_cliente','$primer_nombre','$primer_apellido','$indicativo')"); */




mysqli_query($conn3, "INSERT INTO cliente 
                    (usuario_id, nombre_cliente, celular_cliente, ciudad_cliente, correo_cliente, CODI_CLIENTE, tipo_cliente, fechar, activo, genero, direccion_cliente, telefono_cliente, edad_cliente, profesion_cliente, acompananteFamiliar, telefono_acompanante,parentesco_acompanante, antecedentes, entidadSalud, seguro, nota, alergias, tiposSangre, esDonante, tomaMedicamento, enfermedadesPequeno, motivoConsulta, fechaNacimiento,  whatsapp, tipoUsuario, estado, sucursal,ocupacion,nacionalidad,cod_entidad, nombre,apellido,zona, asignar,primer_nombre,segundo_nombre,primer_apellido,segundo_apellido,genero_asignado,nivel_educacion,prepagada,indicativo,codigo_pais,codigo_departamento,codigo_ciudad,habeasdata) VALUES
                    ('$id_usuario','$nombre_cliente','$celular_cliente','$nombreMun','$correo_cliente','$CODI_CLIENTE','$tipo_cliente','$fechar','$activo','$genero','$direccion_cliente','$telefono_cliente','$edad_cliente','$profesion_cliente','$acompananteFamiliar','$telefono_acompanante','$parentesco_acompanante','$antecedentes', '$nombreEntidad', '$seguro', '$nota', '$alergias', '$tiposSangre', '$esDonante', '$tomaMedicamento', '$enfermedadesPequeno', '$motivoConsulta', '$fechaNacimiento','$whatsapp','$tipoUsuario', '$estado', '$sucursal1','$ocupacion','$nacionalidad','$entidadSalud', '$NOMBRE','$apellido','$zona', '$asignar','$primer_nombre','$segundo_nombre','$primer_apellido','$segundo_apellido','$genero_asignado','$nivel_educacion','$prepagada','$indicativo','$Codigo_Pais','$Codigo_Departamento','$Codigo_Ciudad','$habeasdata')");
          
echo "INSERT INTO cliente 
                    (usuario_id, nombre_cliente, celular_cliente, ciudad_cliente, correo_cliente, CODI_CLIENTE, tipo_cliente, fechar, activo, genero, direccion_cliente, telefono_cliente, edad_cliente, profesion_cliente, acompananteFamiliar, telefono_acompanante,parentesco_acompanante, antecedentes, entidadSalud, seguro, nota, alergias, tiposSangre, esDonante, tomaMedicamento, enfermedadesPequeno, motivoConsulta, fechaNacimiento, whatsapp, tipoUsuario, estado, sucursal,ocupacion,nacionalidad,cod_entidad, nombre,apellido,zona, asignar,primer_nombre,segundo_nombre,primer_apellido,segundo_apellido,genero_asignado,nivel_educacion,prepagada,indicativo,codigo_pais,codigo_departamento,codigo_ciudad,habeasdata) VALUES
                    ('$id_usuario','$nombre_cliente','$celular_cliente','$nombreMun','$correo_cliente','$CODI_CLIENTE','$tipo_cliente','$fechar','$activo','$genero','$direccion_cliente','$telefono_cliente','$edad_cliente','$profesion_cliente','$acompananteFamiliar','$telefono_acompanante','$parentesco_acompanante','$antecedentes', '$nombreEntidad', '$seguro', '$nota', '$alergias', '$tiposSangre', '$esDonante', '$tomaMedicamento', '$enfermedadesPequeno', '$motivoConsulta', '$fechaNacimiento','$whatsapp', '$tipoUsuario', '$estado', '$sucursal1','$ocupacion','$nacionalidad','$entidadSalud', '$NOMBRE','$apellido','$zona', '$asignar','$primer_nombre','$segundo_nombre','$primer_apellido','$segundo_apellido','$genero_asignado','$nivel_educacion','$prepagada','$indicativo','$Codigo_Pais','$Codigo_Departamento','$Codigo_Ciudad','$habeasdata')";


 

$id_cliente = mysqli_insert_id($conn3);
 

            
               echo "<script language='Javascript'> window.location='agregarCitas.php?clienteId=$id_cliente';</script>"; 
                                                     
                

?>