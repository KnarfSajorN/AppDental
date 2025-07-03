<?php
   include("funciones/conn3.php");
   include 'funciones/funciones.php';
   include 'funciones/funcionesUtilidades.php';
    date_default_timezone_set('America/Bogota');
 





        $registro             = $_POST['registro'];          
        $idUsuario            = $_POST['usuario_id']; 
        $idusuario            = $_POST['usuario_id'];          
        $idCliente            = $_POST['clienteId'];          
       
        $tratamiento          = reem($_POST['tratamiento']); 
        $descripcion          = reem($_POST['descripcion']); 

        $fechaHora            = date("Y-m-d H:i:s");

        $procedimiento        = reem($_POST['procedimiento']); 

        $planAtencion         = reem($_POST['planAtencion']);      
        $nota                 = reem($_POST['nota']); 

       
        $composicionCorporal  = reem($_POST['ComposicionCorporal']); 
        
        
        $operador  = $_POST['operador']; 

        $codigoProd  = $_POST['codigoProd'];

 
  

 $Afecha                = $_POST['fecha'];        
        $Ahora                 = $_POST['hora'];        

$P                     = $_POST['P'];  
        $doctor                     = $_POST['doctor'];  
        $motivo                = reem($_POST['motivo']);   


 $Afechar               = date("Y-m-d H:i:s");
 $email                 = $_POST['email'];        
        $nombre                = reem($_POST['nombre']);        
        $telefono              = $_POST['telefono'];   
        $MotivoConsultaD                 = $_POST['MotivoConsultaD'];        
        $TratamientoD                 = $_POST['TratamientoD'];        
        $ProductoD                 = $_POST['ProductoD'];        
        $CantidadD                 = $_POST['CantidadD'];        
        $NSesiones                 = $_POST['NSesiones'];             
        $img11                 = $_POST['img11'];        
        $img12                 = $_POST['img12'];        
        $SesionD                 = $_POST['SesionD']; 
        $SesionesD                 = $_POST['SesionesD'];        
        $NSesiones1                = $_POST['NSesiones1']; 
        $ImpresionD                = $_POST['ImpresionD']; 
            



  

        $queryList=mysqli_query($conn3,"SELECT * FROM  cliente where cliente_id=$clienteId");
        // $nrowl=mysqli_num_rows($queryList);
        if ($queryList) {
          while($rowMotorizado=mysqli_fetch_array($queryList))
          {
              $celular_cliente = $rowMotorizado['celular_cliente'];
              $email = $rowMotorizado['correo_cliente'];
          }
        }
        

$codigoProd=0;
$queryinv=mysqli_query($conn3,"SELECT * FROM  sDetalleOper where  id = $codigoProd");

// $nrowl=mysqli_num_rows($queryinv);
if ($queryinv){
  while($rowinv=mysqli_fetch_array($queryinv))
  {
  $numerosesiones   =$rowinv['numerosesiones']; 

  }  
}







        $tratamiento = 'Ficha Clinica';




      
        
          


$Tratamiento = $_POST["Tratamiento"];

$producto_id_paquete = $_POST["ProductoPaquete_DetalleFactura"];

$QueryInventarioPaquetes = mysqli_query($conn3, "SELECT * FROM sDetalleOper where id=$producto_id_paquete ");
if ($QueryInventarioPaquetes) {
  while ($RowInventarioPaquetes = mysqli_fetch_array($QueryInventarioPaquetes)) {
$producto_nombre = mysqli_real_escape_string($conn3,$RowInventarioPaquetes['descripcion']);
$idOperacion = $RowInventarioPaquetes['idOperacion'];
}
}


////////////////////////////////////////////////////? actualizacion de numero de sesiones ////////////////////////////////////////////////////
$QuerySesiones = mysqli_query($conn3, "SELECT * FROM HFC_ProductosPaquetesHistorias where detalle_id=$producto_id_paquete AND idOperacion='$idOperacion' limit 1 ");
if ($QuerySesiones) {
while ($RowSesiones = mysqli_fetch_array($QuerySesiones)) {
$SesionesRestantes = $RowSesiones['SesionesRestantes'];
$id = $RowSesiones['id'];

$SesionesFinales = $SesionesRestantes-1;

$query = "UPDATE HFC_ProductosPaquetesHistorias 
    SET SesionesRestantes = $SesionesFinales
    WHERE idOperacion = $idOperacion 
    AND detalle_id = $producto_id_paquete AND id=$id);";
$enlace_actual = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$enlace_actual = str_replace('.php', '', $enlace_actual);

auditorMaster($idusuario, '1', $enlace_actual, $query);

$consulta = mysqli_query($conn3, "UPDATE HFC_ProductosPaquetesHistorias 
    SET SesionesRestantes = '$SesionesFinales'
    WHERE idOperacion = '$idOperacion' 
    AND detalle_id = '$producto_id_paquete' AND id='$id' ");



  if($SesionesFinales==0){

    $query = "UPDATE HFC_ProductosPaquetesHistorias 
      SET Estado = 1
      WHERE idOperacion = $idOperacion 
      AND detalle_id = $producto_id_paquete AND id=$id);";
$enlace_actual = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$enlace_actual = str_replace('.php', '', $enlace_actual);

auditorMaster($idusuario, '1', $enlace_actual, $query);

    $consulta = mysqli_query($conn3, "UPDATE HFC_ProductosPaquetesHistorias 
      SET Estado = '1'
      WHERE idOperacion = '$idOperacion' 
      AND detalle_id = '$producto_id_paquete' AND id='$id' ");
  }

}
}


////////////////////////////////////////////////////? actualizacion de numero de sesiones ////////////////////////////////////////////////////


$SesionesRestantes = $_POST['SesionesRestantes'];

//$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));


$Campo1 = mysqli_query($conn3, "show COLUMNS from e_tratamiento1 WHERE Field = 'Tratamiento';");
$nrowCampo1 = mysqli_num_rows($Campo1);
if ($nrowCampo1 == "0") {
    mysqli_query($conn3, "ALTER TABLE `e_tratamiento1` ADD `Tratamiento` TEXT NULL DEFAULT '' COMMENT ' *Creado desde modulo de guardar ficha clinica*'");
}

$Campo1 = mysqli_query($conn3, "show COLUMNS from e_tratamiento1 WHERE Field = 'producto_id_paquete';");
$nrowCampo1 = mysqli_num_rows($Campo1);
if ($nrowCampo1 == "0") {
    mysqli_query($conn3, "ALTER TABLE `e_tratamiento1` ADD `producto_id_paquete` INT(11) NULL DEFAULT '0' COMMENT ' *Creado desde modulo de guardar ficha clinica*'");
}

$Campo1 = mysqli_query($conn3, "show COLUMNS from e_tratamiento1 WHERE Field = 'producto_nombre';");
$nrowCampo1 = mysqli_num_rows($Campo1);
if ($nrowCampo1 == "0") {
    mysqli_query($conn3, "ALTER TABLE `e_tratamiento1` ADD `producto_nombre` TEXT NULL COMMENT ' *Creado desde modulo de guardar ficha clinica*'");
}


$Campo1 = mysqli_query($conn3, "show COLUMNS from e_tratamiento1 WHERE Field = 'SesionesRestantes';");
$nrowCampo1 = mysqli_num_rows($Campo1);
if ($nrowCampo1 == "0") {
    mysqli_query($conn3, "ALTER TABLE `e_tratamiento1` ADD `SesionesRestantes` TEXT NULL COMMENT ' *Creado desde modulo de guardar ficha clinica*'");
}

// *********************************************************    TABLA  historiaClinica1 *********************************************************
// *********************************************************    TABLA  historiaClinica1 *********************************************************
/*
mysqli_query($conn3,"INSERT INTO e_tratamiento1 
    (idUsuario, tratamiento,        operador,    descripcion,     fechaHora,    idCliente,    procedimiento,    planAtencion, nota, composicionCorporal,MotivoConsultaD,TratamientoD,ProductoD,CantidadD,NSesiones,img11,img12,SesionD,NSesiones1,ImpresionD,sesionesD, codigoProd) VALUES 
    ('$idUsuario', '$tratamiento', '$operador', '$descripcion', '$fechaHora', '$idCliente', '$procedimiento', '$planAtencion ', '$nota', '$composicionCorporal','$MotivoConsultaD','$TratamientoD','$ProductoD','$CantidadD','$numerosesiones','$img11','$img12','$SesionD','$NSesiones1','$ImpresionD','$SesionesD', '$codigoProd');");

echo "<pre>";      var_dump(mysqli_error_list($conn3));
echo "</pre>";
*/


$query = "INSERT INTO e_tratamiento1 
    (idUsuario, tratamiento,        operador,    descripcion,     fechaHora,    idCliente,    procedimiento,    planAtencion, nota, composicionCorporal,MotivoConsultaD,TratamientoD,ProductoD,CantidadD,NSesiones,img11,img12,SesionD,NSesiones1,ImpresionD,sesionesD, codigoProd,producto_id_paquete,producto_nombre,SesionesRestantes) VALUES 
    ($idUsuario, $tratamiento, $operador, $descripcion, $fechaHora, $idCliente, $procedimiento, $planAtencion, $nota, $composicionCorporal,$MotivoConsultaD,$Tratamiento,$ProductoD,$CantidadD,$NSesiones,$img11,$img12,$SesionD,$NSesiones1,$ImpresionD,$SesionesD,$codigoProd,$producto_id_paquete,$producto_nombre,$SesionesRestantes);";
$enlace_actual = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$enlace_actual = str_replace('.php', '', $enlace_actual);

auditorMaster($idusuario, '1', $enlace_actual, $query);

mysqli_query($conn3,"INSERT INTO e_tratamiento1 
    (idUsuario, tratamiento,        operador,    descripcion,     fechaHora,    idCliente,    procedimiento,    planAtencion, nota, composicionCorporal,MotivoConsultaD,TratamientoD,ProductoD,CantidadD,NSesiones,img11,img12,SesionD,NSesiones1,ImpresionD,sesionesD, codigoProd,producto_id_paquete,producto_nombre,SesionesRestantes) VALUES 
    ('$idUsuario', '$tratamiento', '$operador', '$descripcion', '$fechaHora', '$idCliente', '$procedimiento', '$planAtencion ', '$nota', '$composicionCorporal','$MotivoConsultaD','$Tratamiento','$ProductoD','$CantidadD','$NSesiones','$img11','$img12','$SesionD','$NSesiones1','$ImpresionD','$SesionesD', '$codigoProd','$producto_id_paquete','$producto_nombre','$SesionesRestantes');");


$historiaClinica1 = mysqli_insert_id($conn3);


$QueryProcesadoProducto = mysqli_query($conn3, "SELECT * FROM  HFC_ProductosPaquetesHistorias where cliente_id = $idCliente and  usuario_id = $idUsuario AND historia_id='0' AND Estado = '1' ");
if ($QueryProcesadoProducto) {
  while ($RowProcesado = mysqli_fetch_array($QueryProcesadoProducto)) {
    $id_procesado = $RowProcesado['id'];

      mysqli_query($conn3, "UPDATE HFC_ProductosPaquetesHistorias SET historia_id = '$historiaClinica1' where id = $id_procesado ");

  }
}



//////////////////AUTOGUARDADO///////////////////////////////////////////////////////////////
if($_POST['Ruta_Historia_AutoGuardado']!=""){
	$Ruta_Historia_AutoGuardado = $_POST['Ruta_Historia_AutoGuardado'];

	$query = "UPDATE AutoGuardado SET Estado='0' WHERE cliente_id = '$idCliente' and usuario_id = '$idUsuario' and Ruta = '$Ruta_Historia_AutoGuardado' AND Estado = '1' ";
	mysqli_query($conn3, $query);
}


/*
              $queryListhc=mysqli_query($conn3,"SELECT MAX(ID) as historiaClinica1 from e_tratamiento1 where idCliente= $idCliente");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $historiaClinica1=$rowhc['historiaClinica1'];
              }   
*/
// subir las imagenes de examen

//Validamos que el archivo exista
if ($_FILES["img11"]) {
	$filename = $_FILES["img11"]["name"]; //Obtenemos el nombre original del archivo
	$source = $_FILES["img11"]["tmp_name"]; //Obtenemos un nombre temporal del archivo
	$directorio = 'archivos/e_tratamiento/'; //Declaramos un  variable con la ruta donde guardaremos los archivos
	//Validamos si la ruta de destino existe, en caso de no existir la creamos
	if (!file_exists($directorio)) {
		mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");
	}
	$dir = opendir($directorio); //Abrimos el directorio de destino
	$target_path = $directorio . '/' . $filename; //Indicamos la ruta de destino, así como el nombre del archivo
	//Movemos y validamos que el archivo se haya cargado correctamente
	//El primer campo es el origen y el segundo el destino
	if (move_uploaded_file($source, $target_path)) {
		//echo "El archivo $filename se ha almacenado en forma exitosa.<br>";
	} else {
		//echo "Ha ocurrido un error, por favor inténtelo de nuevo.<br>";
	}
	closedir($dir); //Cerramos el directorio de destino
	// la carpeta sera el nombre de la historia y el id
	$descripcion = 'Orden Imagenologia HC: ' . $id_historia;
	$Fecha = date('Y-m-d');
	mysqli_query($conn3, "INSERT INTO archivos (cliente_id,usuario_id,historia_id,codigo,fecha, NombreVisual,Realizado_Desde) VALUES   ('$idCliente', '$idUsuario','0','$filename','$Fecha', '$descripcion','e_tratamiento1')") or die(mysqli_error($conn3));

  // actuaqlizar tratamiento con la ruta del archivo 
  mysqli_query($conn3,"UPDATE e_tratamiento1 SET img11 = '$filename' where ID = $historiaClinica1 ");
	
}


//Validamos que el archivo exista
if ($_FILES["img12"]) {
	$filename = $_FILES["img12"]["name"]; //Obtenemos el nombre original del archivo
	$source = $_FILES["img12"]["tmp_name"]; //Obtenemos un nombre temporal del archivo
	$directorio = 'archivos/e_tratamiento/'; //Declaramos un  variable con la ruta donde guardaremos los archivos
	//Validamos si la ruta de destino existe, en caso de no existir la creamos
	if (!file_exists($directorio)) {
		mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");
	}
	$dir = opendir($directorio); //Abrimos el directorio de destino
	$target_path = $directorio . '/' . $filename; //Indicamos la ruta de destino, así como el nombre del archivo
	//Movemos y validamos que el archivo se haya cargado correctamente
	//El primer campo es el origen y el segundo el destino
	if (move_uploaded_file($source, $target_path)) {
		//echo "El archivo $filename se ha almacenado en forma exitosa.<br>";
	} else {
		//echo "Ha ocurrido un error, por favor inténtelo de nuevo.<br>";
	}
	closedir($dir); //Cerramos el directorio de destino
	// la carpeta sera el nombre de la historia y el id
	$descripcion = 'Orden Laboratorio HC: ' . $id_historia;
	$Fecha = date('Y-m-d');
	mysqli_query($conn3, "INSERT INTO archivos (cliente_id,usuario_id,historia_id,codigo,fecha, NombreVisual,Realizado_Desde) VALUES   ('$idCliente', '$idUsuario','0','$filename','$Fecha', '$descripcion','e_tratamiento1')") or die(mysqli_error($conn3));

  mysqli_query($conn3, "UPDATE e_tratamiento1 SET img12 = '$filename' where ID = $historiaClinica1 ");
	
}









// *********************************************************    TABLA  historiaClinica1 *********************************************************
// *********************************************************    TABLA  historiaClinica1 *********************************************************
 





                $para ="$email";

                // título
                $título = 'Resultado de la consulta';

                // mensaje
$mensaje = '
<html>
<head>
  <title>Resultado de la consulta</title>
    <table width="100%" height="466" border="0">
  <tr>
    <td><table width="100%" height="75" border="0">
      
    </table>
      <table width="100%" height="143" border="0">
        <tr>
          <td height="139" bgcolor="#00A74B"><table width="100%" height="62" border="0">
            <tr>
              <td width="5%">&nbsp;</td>
              <td width="72%" style="color:#FFF;"><h1><strong>Resultado de la consulta </strong></h1></td>
              <td width="23%">&nbsp;</td>
            </tr>
          </table></td>
        </tr>
      </table>
      <table width="100%" height="122" border="0">
<tr>
<td width="10%">&nbsp;</td>
<td width="80%"><p>Tratamiento </p>
<br />

<h3>  '.$descripcion.'  </h3> 

<br> 

</td>
<br />

  

<td width="10%">&nbsp;</td>
</tr>
</table>

<p>Atentamente,<br />
'.$NOMBRE_USUARIO.'</p> 

                      <table width="100%" border="0">
                        <tr>
                          <td height="21" bgcolor="#00A74B">&nbsp;</td>
                        </tr>
                      </table>
                      <table width="100%" height="64" border="0">
                        <tr>
                          <td height="60">Este correo electrónico no puede recibir respuestas. Para obtener más información, Contactart a '.$NOMBRE_USUARIO.'<br />
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
                $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
                $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

                // Cabeceras adicionales
                $cabeceras .= 'To: '.$NOMBRE_USUARIO.' <noreply@medicalsoftcolombia.com>' . "\r\n";
                $cabeceras .= 'From: Resultado de la consulta <noreply@medicalsoftcolombia.com>' . "\r\n";
                $cabeceras .= 'Cc: noreply@medicalsoftcolombia.com' . "\r\n";
                $cabeceras .= 'Bcc: noreply@medicalsoftcolombia.com' . "\r\n";

                // Enviarlo
                mail($para, $título, $mensaje, $cabeceras);
 

$verficar = date("Y-m-d");
 

if ($Afecha>$verficar) 
{

echo '<br> CALENDARIO  1 1'.$verficar.' <br>';

$mensaje = ' Sr(a) *'.$nombre.'* usted a agendado un cita  con *'.$doctor.'* el dia *'.$fecha.'* a las *'.$Hora.'* en *'.$sucursal.'*. Si no desea recibir notificaciones puede darle de baja en cualquier momento respondiendo con la palabra NO. Atte DR ALBUJA CENTROS MEDICOS-MedicalSoft';
Whatsapp_sent($telefono, $mensaje);


$mensaje2 = ' *'.$doctor.'*  se a agendado  una cita con la paciente *'.$nombre.'*,  *'.$fecha.'* a las *'.$Hora.'* en *'.$sucursal.'*. Motivo: *'.$motivoConsulta.'* Atte DR ALBUJA CENTROS MEDICOS MedicalSoft';
Whatsapp_sent($whatsapp, $mensaje2);








    mysqli_query($conn3,"INSERT INTO citas (doctor, fecha, Hora, nombre, telefono, correo, motivoConsulta, estado, registrado, usuario_id , tipo) 
                VALUES ('$doctor', '$Afecha', '$Ahora', '$nombre', '$telefono', '$email', '$motivo', '1', '$Afechar', '$ID', '0')");
                 


echo "INSERT INTO citas (doctor, fecha, Hora, nombre, telefono, correo, motivoConsulta, estado, registrado, usuario_id , tipo) 
                VALUES ('$doctor', '$Afecha', '$Ahora', '$nombre', '$telefono', '$email', '$motivo', '1', '$Afechar', '$ID', '0')";

 
                $para ="$email";

                // título
                $título = 'Cita Agendada';

                // mensaje
                $mensaje = '
                <html>
                <head>
                  <title>Cita Agendada</title>
                    <table width="100%" height="466" border="0">
                  <tr>
                    <td><table width="100%" height="75" border="0">
                      
                    </table>
                      <table width="100%" height="143" border="0">
                        <tr>
                          <td height="139" bgcolor="#00A74B"><table width="100%" height="62" border="0">
                            <tr>
                              <td width="5%">&nbsp;</td>
                              <td width="72%" style="color:#FFF;"><h1><strong>Cita Agendada</strong></h1></td>
                              <td width="23%">&nbsp;</td>
                            </tr>
                          </table></td>
                        </tr>
                      </table>
                      <table width="100%" height="122" border="0">
<tr>
<td width="10%">&nbsp;</td>
<td width="80%"><p>Cita Agendada por el doctor(a) '.$NOMBRE_USUARIO.'</p>
<br />

<h3>  Se a  agendado un cita para ustes el dia <strong>  '.$Afecha.' </strong> a las  <strong>   '.$Ahora.'  </strong>  , Motivo:  <strong>  '.$motivo.' </strong>   </h3> 

<br> 

</td>
<br />



<td width="10%">&nbsp;</td>
</tr>

</table>

<p>Atentamente,<br />
'.$NOMBRE_USUARIO.'</p> 

                <table width="100%" border="0">
                        <tr>
                          <td height="21" bgcolor="#00A74B">&nbsp;</td>
                        </tr>
                      </table>
                      <table width="100%" height="64" border="0">
                        <tr>
                          <td height="60">Este correo electrónico no puede recibir respuestas. Para obtener más información, Contactart a '.$NOMBRE_USUARIO.'<br />
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
                $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
                $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

                // Cabeceras adicionales
                $cabeceras .= 'To: '.$NOMBRE_USUARIO.' <noreply@medicalsoftcolombia.com>' . "\r\n";
                $cabeceras .= 'From: Resultado de su Cita <noreply@medicalsoftcolombia.com>' . "\r\n";
                $cabeceras .= 'Cc: noreply@medicalsoftcolombia.com' . "\r\n";
                $cabeceras .= 'Bcc: noreply@medicalsoftcolombia.com' . "\r\n";

                // Enviarlo
                mail($para, $título, $mensaje, $cabeceras);

}



   //echo "<script language='Javascript'> window.location='FinalizadoFichaClinica.php?historiaClinica1=$historiaClinica1';</script>"; 
   echo "<script language='Javascript'> window.location='HC_FinalizadoFichaClinica?iHC=".encrypt($historiaClinica1)."';</script>"; 
?>
