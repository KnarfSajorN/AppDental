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
$grupo= $_POST['grupo'];
$vacuna= $_POST['vacuna'];
$cantidad_dosis= $_POST['cantidad_dosis'];

$protege_contra= $_POST['protege_contra'];
$edad= $_POST['edad'];
$id_Usuario= $_POST['id_usuario'];

$id_lista_vacuna= $_POST['id_lista_vacuna'];

$nombre_vacuna= funcionMaster($vacuna,'id','Nombre','vacunas');
$nombre_grupo= funcionMaster($esquema_vacunacion,'id','Nombre','grupos_vacunacion');

if (isset($_POST['Guardar']))
{
  $queryUsuario = "INSERT INTO listado_vacunas (Fecha, Id_Vacuna, Id_Grupo, Id_Usuario, Nombre_Grupo,  	Nombre_Vacuna, Protege_Contra, 	Edad, Dosis) 
  VALUES ('$fecha','$vacuna', '$esquema_vacunacion','$id_Usuario', '$nombre_grupo', '$nombre_vacuna' ,'$protege_contra', '$edad' ,'$cantidad_dosis')";


 echo  "INSERT INTO listado_vacunas (Fecha, Id_Vacuna, Id_Grupo, Id_Usuario, Nombre_Grupo,  	Nombre_Vacuna, Protege_Contra, 	Edad, Dosis) 
  VALUES ('$fecha','$vacuna', '$esquema_vacunacion','$id_Usuario', '$nombre_grupo', '$nombre_vacuna' ,'$protege_contra', '$edad' ,'$cantidad_dosis')";

  mysqli_query($conn3,$queryUsuario);

echo "<script language='Javascript'> window.location='RegistrarInyeccionesAGrupo';</script>";
}


elseif(isset($_POST['Actualizar']))
{
  $queryUsuario = "UPDATE listado_vacunas SET Fecha='$fecha' ,Id_Vacuna='$vacuna' ,Id_Grupo='$esquema_vacunacion' ,Id_Usuario='$id_Usuario' ,Nombre_Grupo='$nombre_grupo' ,Nombre_Vacuna='$nombre_vacuna' ,Protege_Contra='$protege_contra' ,Edad='$edad', Dosis='$cantidad_dosis' where id='$id_lista_vacuna' limit 1";                                                                       
  mysqli_query($conn3,$queryUsuario);

echo "<script language='Javascript'> window.location='vacunacionInyeccionGrupos?eD=$grupo';</script>";  
//echo "<script language='Javascript'> window.location='RegistrarVacunasAGrupo.php?msg=1';</script>";

}


?>