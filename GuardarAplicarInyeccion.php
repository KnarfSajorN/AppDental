<?php 
date_default_timezone_set('America/Bogota');
include("funciones/funcionesUtilidades.php");
include("funciones/funciones.php");


////////////////////////////////////////////////////////////////////?IMPORTATE SI AGREGAN CAMPOS EN LA TABLA DE VACUNACION/INYECTOLOGIA QUE PUEDA SER NULL YA QUE ESTAS TABLAS SE USARAN TANTO EN VACUNACION COMO INYECTOLOGIA ////////////////////////////////////////////
////////////////////////////////////////////////////////////////////?IMPORTATE SI AGREGAN CAMPOS EN LA TABLA DE VACUNACION/INYECTOLOGIA QUE PUEDA SER NULL YA QUE ESTAS TABLAS SE USARAN TANTO EN VACUNACION COMO INYECTOLOGIA ////////////////////////////////////////////
////////////////////////////////////////////////////////////////////?IMPORTATE SI AGREGAN CAMPOS EN LA TABLA DE VACUNACION/INYECTOLOGIA QUE PUEDA SER NULL YA QUE ESTAS TABLAS SE USARAN TANTO EN VACUNACION COMO INYECTOLOGIA ////////////////////////////////////////////
////////////////////////////////////////////////////////////////////?IMPORTATE SI AGREGAN CAMPOS EN LA TABLA DE VACUNACION/INYECTOLOGIA QUE PUEDA SER NULL YA QUE ESTAS TABLAS SE USARAN TANTO EN VACUNACION COMO INYECTOLOGIA ////////////////////////////////////////////
////////////////////////////////////////////////////////////////////?IMPORTATE SI AGREGAN CAMPOS EN LA TABLA DE VACUNACION/INYECTOLOGIA QUE PUEDA SER NULL YA QUE ESTAS TABLAS SE USARAN TANTO EN VACUNACION COMO INYECTOLOGIA ////////////////////////////////////////////
////////////////////////////////////////////////////////////////////?IMPORTATE SI AGREGAN CAMPOS EN LA TABLA DE VACUNACION/INYECTOLOGIA QUE PUEDA SER NULL YA QUE ESTAS TABLAS SE USARAN TANTO EN VACUNACION COMO INYECTOLOGIA ////////////////////////////////////////////
////////////////////////////////////////////////////////////////////?IMPORTATE SI AGREGAN CAMPOS EN LA TABLA DE VACUNACION/INYECTOLOGIA QUE PUEDA SER NULL YA QUE ESTAS TABLAS SE USARAN TANTO EN VACUNACION COMO INYECTOLOGIA ////////////////////////////////////////////
////////////////////////////////////////////////////////////////////?IMPORTATE SI AGREGAN CAMPOS EN LA TABLA DE VACUNACION/INYECTOLOGIA QUE PUEDA SER NULL YA QUE ESTAS TABLAS SE USARAN TANTO EN VACUNACION COMO INYECTOLOGIA ////////////////////////////////////////////
////////////////////////////////////////////////////////////////////?IMPORTATE SI AGREGAN CAMPOS EN LA TABLA DE VACUNACION/INYECTOLOGIA QUE PUEDA SER NULL YA QUE ESTAS TABLAS SE USARAN TANTO EN VACUNACION COMO INYECTOLOGIA ////////////////////////////////////////////
////////////////////////////////////////////////////////////////////?IMPORTATE SI AGREGAN CAMPOS EN LA TABLA DE VACUNACION/INYECTOLOGIA QUE PUEDA SER NULL YA QUE ESTAS TABLAS SE USARAN TANTO EN VACUNACION COMO INYECTOLOGIA ////////////////////////////////////////////
////////////////////////////////////////////////////////////////////?IMPORTATE SI AGREGAN CAMPOS EN LA TABLA DE VACUNACION/INYECTOLOGIA QUE PUEDA SER NULL YA QUE ESTAS TABLAS SE USARAN TANTO EN VACUNACION COMO INYECTOLOGIA ////////////////////////////////////////////
////////////////////////////////////////////////////////////////////?IMPORTATE SI AGREGAN CAMPOS EN LA TABLA DE VACUNACION/INYECTOLOGIA QUE PUEDA SER NULL YA QUE ESTAS TABLAS SE USARAN TANTO EN VACUNACION COMO INYECTOLOGIA ////////////////////////////////////////////


$fecha=date("Y-m-d");
$hora=date("H:i:s");

$esquema_vacunacion= $_POST['esquema_vacunacion'];
$vacuna= $_POST['vacuna'];

$vacunax= funcionMaster($vacuna,'id','Id_Vacuna','listado_vacunas');




$dosis= $_POST['dosis'];

////echo '-----------------------------------dodis--->>'.$dosis;
if($dosis==""){$dosis='0';}
$dosis2=$dosis+1;

$queryList=mysqli_query($conn3,"SELECT * FROM  listado_vacunas where id='$vacuna' and Id_Grupo = '$esquema_vacunacion'");
$nrowl=mysqli_num_rows($queryList);
while($rowMotorizado=mysqli_fetch_array($queryList))
{
      
    $TotalDosis    =$rowMotorizado['Dosis'];

 }




$queryList=mysqli_query($conn3,"SELECT * FROM  dosis  where dosis='$dosis' and grupo = '$esquema_vacunacion'  and vacuna ='$vacunax'");
// //echo "SELECT * FROM  dosis  where dosis='$dosis' and grupo = '$esquema_vacunacion'  and vacuna ='$vacunax'";

$nrowlD=mysqli_num_rows($queryList);
while($rowMotorizado=mysqli_fetch_array($queryList))
{
      
    $idOper1     =$rowMotorizado['id'];
    $dosis1 =$rowMotorizado['dosis'];
    $meses1   =$rowMotorizado['tiempoMeses'];
    $anos1 =$rowMotorizado['tiempoAnos'];
    $dias1 =$rowMotorizado['tiempoDias'];

// //echo '-----------------------dias----------'.$dias1;

    
}



$queryList=mysqli_query($conn3,"SELECT * FROM  dosis  where dosis='$dosis2' and grupo = '$esquema_vacunacion'  and vacuna ='$vacunax'");


$nrowl1=mysqli_num_rows($queryList);
while($rowMotorizado=mysqli_fetch_array($queryList))
{
      
    $idOper1     =$rowMotorizado['id'];
    $dosis2 =$rowMotorizado['dosis'];
    $meses2   =$rowMotorizado['tiempoMeses'];
    $anos2 =$rowMotorizado['tiempoAnos'];
    $dias2 =$rowMotorizado['tiempoDias'];


   

}

// //echo '-----------------------años1----------'.$anos1 ;
// //echo '-----------------------años2----------'.$anos2 ;


if ($nrowlD <>'' and $nrowl1=='') {
$queryList=mysqli_query($conn3,"SELECT * FROM  dosis  where dosis='Refuerzo' and grupo = '$esquema_vacunacion'  and vacuna ='$vacunax'");
$nrowl1=mysqli_num_rows($queryList);
while($rowMotorizado=mysqli_fetch_array($queryList))
{
      
    $idOper1     =$rowMotorizado['id'];
    $dosis2 =$rowMotorizado['dosis'];
    $meses2   =$rowMotorizado['tiempoMeses'];
    $anos2 =$rowMotorizado['tiempoAnos'];
    $dias2 =$rowMotorizado['tiempoDias'];
  

   

}


}

////echo '-----------------------años2----------'.$anos2 ;


$fecha_administracion= $_POST['fecha_administracion'];
$fecha_proxima_aplicacion= $_POST['fecha_proxima_aplicacion'];  
if($fecha_administracion==""){$fecha_administracion='0000-00-00';}


/*if($dias2 =='') {$fecha_proxima_aplicacion='0000-00-00';   //echo 'fechadias2vacia'.$fecha_proxima_aplicacion; 
}*/ 
if($dias2 <> 100 and $dias2 <> '') { 
$diasF=$dias2-$dias1;
$var=$diasF;



  
$fecha_actual = $fecha_administracion;
//$fecha_proxima_aplicacion = date("y-m-d",strtotime($fecha_actual."+ $var days"));
// //echo 'fechadias2'.$fecha_proxima_aplicacion;
 }




//$fecha_proxima_aplicacion= $_POST['fecha_proxima_aplicacion'];
//if($meses2 =='') {$fecha_proxima_aplicacion='0000-00-00'; } 
if($meses2 <> 100 and $meses2 <>'') {
if ($dias1 <> 100 )  {

$mesesF=$meses2*30;


$var=$mesesF-$dias1;


$fecha_actual = $fecha_administracion;
//$fecha_proxima_aplicacion = date("y-m-d",strtotime($fecha_actual."+ $var days"));
// //echo 'fechameses1'.$fecha_proxima_aplicacion; 

} 

else {
$mesesF=$meses2-$meses1;
$var=$mesesF*30;
  
$fecha_actual = $fecha_administracion;
//$fecha_proxima_aplicacion = date("y-m-d",strtotime($fecha_actual."+ $var days"));
// //echo 'fechameses2'.$fecha_proxima_aplicacion; 
 }

}



//if($anos2=='') {$fecha_proxima_aplicacion='0000-00-00';  } 
if($anos2 <> 100 and $anos2 <> '') {

if ($meses1 <> 100 )  {

$anosF=$anos2*365;
$mesesF=$meses1*30;
$var=$anosF-$mesesF;

// //echo '//////diasx/'.$var; 

$fecha_actual = $fecha_administracion;
//$fecha_proxima_aplicacion = date("y-m-d",strtotime($fecha_actual."+ $var days"));
// //echo '<br>//////faños1x/'.$fecha_proxima_aplicacion; 

}

if ($dias1 <> 100 )  {

$anosF=$anos2*365;
$var=$anosF-$diasF;


$fecha_actual = $fecha_administracion;
//$fecha_proxima_aplicacion = date("y-m-d",strtotime($fecha_actual."+ $var days"));
//echo '//////////VAR2X///'.$var; 
//echo '//////////faños2X///'.$fecha_proxima_aplicacion; 

} if ($anos1 <> 100 )  {




$anosF=$anos2-$anos1;
//echo '/////////vaños/'.$anosF; 

$var=$anosF*365;
//echo '/////////variable/'.$var ; 

$fecha_actual = $fecha_administracion;
//echo '//////////fechaactual/'.$fecha_actual ; 
//$fecha_proxima_aplicacion = date("y-m-d",strtotime($fecha_actual."+ $var days")); 
//echo '//////faños3///'.$fecha_proxima_aplicacion; 

} 

}



//if($TotalDosis <= $dosis) {$fecha_proxima_aplicacion='0000-00-00';  }

if ($nrowlD=='') { $dosis='Refuerzo';}


$lote1= $_POST['lote'];

$doctor= $_POST['doctor'];
$persona_administra= $_POST['persona_administra'];


$lote= funcionMaster($lote1,'ID','descripcion','lotes');
$cantidad1= funcionMaster($lote1,'ID','cantidad','lotes');

$cantidadLote=$cantidad1-1;
$queryUsuariol = "UPDATE lotes SET cantidad='$cantidadLote' where ID='$lote1'";

mysqli_query($conn3,$queryUsuariol);


$sitio_anatomico= $_POST['sitio_anatomico'];
$via= $_POST['via'];
$observaciones= $_POST['observaciones'];
$efecto_adverso= $_POST['efecto_adverso'];

$id_cliente= $_POST['id_cliente'];

$fechaNacimiento=funcionMaster($id_cliente,'cliente_id','fechaNacimiento','cliente');

//$edad=calculaedad($fechaNacimiento);

$edad = calculaedad($fechaNacimiento);
    //                                 foreach ($edad as $key => $value) {
    //                                     $Mensaje .= "{$value} {$key}, ";
    //                                 }
    //                                 $Mensaje = trim($Mensaje, ', ');
    //                                 //echo $Mensaje.".";
    // $edad= $Mensaje;                       

$id_Usuario= $_POST['id_usuario'];

$nombre_vacuna= funcionMaster($vacuna,'id','Nombre','vacunas');
$nombre_grupo= funcionMaster($esquema_vacunacion,'id','Nombre','grupos_vacunacion');



$queryUsuario = "INSERT INTO vacunas_aplicadas (Fecha, Hora, Id_Lista_Vacuna, 	Fecha_Administracion, Fecha_Proxima_Aplicacion, Lote, Sitio_Anatomico, Observacion, Id_Cliente, Id_Usuario, Dosis_Aplicada, Medico_Indica, Persona_Aplica, Efecto_Adverso, via, edad) VALUES ('$fecha','$hora', '$vacuna', '$fecha_administracion', '$fecha_proxima_aplicacion', '$lote' ,'$sitio_anatomico', '$observaciones', '$id_cliente', '$id_Usuario','$dosis','$doctor','$persona_administra','$efecto_adverso','$via','$edad')";  

//echo "INSERT INTO vacunas_aplicadas (Fecha, Hora, Id_Lista_Vacuna,   Fecha_Administracion, Fecha_Proxima_Aplicacion, Lote, Sitio_Anatomico, Observacion, Id_Cliente, Id_Usuario, Dosis_Aplicada, Medico_Indica, Persona_Aplica, Efecto_Adverso, via, edad) VALUES ('$fecha','$hora', '$vacuna', '$fecha_administracion', '$fecha_proxima_aplicacion', '$lote' ,'$sitio_anatomico', '$observaciones', '$id_cliente', '$id_Usuario','$dosis','$doctor','$persona_administra','$efecto_adverso','$via','$edad')";   

mysqli_query($conn3,$queryUsuario);
$id_vacuna_aplicada = mysqli_insert_id($conn3);
$archivos_vacunas="";

 foreach($_FILES["archivo"]['tmp_name'] as $key => $tmp_name)
    {
        //Validamos que el archivo exista
        if($_FILES["archivo"]["name"][$key]) {
            $filename = "Vacuna".rand(9999,99999)."_cliente_".$id_cliente."_id_".$id_vacuna_aplicada."-".$_FILES["archivo"]["name"][$key]; //Obtenemos el nombre original del archivo
            $source = $_FILES["archivo"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo
        	
        	$directorio = 'archivos/'; //Declaramos un  variable con la ruta donde guardaremos los archivos
            
            //Validamos si la ruta de destino existe, en caso de no existir la creamos
            if(!file_exists($directorio)){
                mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");    
            }
            
            $dir=opendir($directorio); //Abrimos el directorio de destino
            $target_path = $directorio.'/'.$filename; //Indicamos la ruta de destino, así como el nombre del archivo
            
            //Movemos y validamos que el archivo se haya cargado correctamente
            //El primer campo es el origen y el segundo el destino
            if(move_uploaded_file($source, $target_path)) { 
                //echo "El archivo $filename se ha almacenado en forma exitosa.<br>";
                } else {    
                //echo "Ha ocurrido un error, por favor inténtelo de nuevo.<br>";
            }
            closedir($dir); //Cerramos el directorio de destino	

            mysqli_query($conn3,"INSERT INTO archivos (cliente_id,usuario_id,historia_id,codigo,fecha, descripcion) VALUES ('$id_cliente', '$id_Usuario','0','$filename','$fecha', 'Archivo de Vacuna')");

            $archivos_vacunas .= mysqli_insert_id($conn3)."@";

        }
    }
    $archivos_vacunas = trim($archivos_vacunas, '@');

$queryUsuario = "UPDATE vacunas_aplicadas SET Archivos='$archivos_vacunas' where id='$id_vacuna_aplicada' limit 1";

mysqli_query($conn3,$queryUsuario);

echo "<script language='Javascript'> window.location='AplicarInyeccion?cI=".encrypt($id_cliente)."';</script>";
