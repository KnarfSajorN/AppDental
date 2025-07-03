<?php

date_default_timezone_set('America/Bogota');
include("funciones/funcionesUtilidades.php");
include("funciones/funciones.php");
include("funciones/conn3.php");


if($_POST['Revision_Tipo']=='Editar')
{
    $arreglo = reem($_POST['arreglo']);
    $id = $_POST['id'];

    $nuevo_Arreglo = explode(",", $arreglo);

    $arreglofinal = json_encode(array_filter($nuevo_Arreglo));


    $idusuario = $_POST['usuario_id'];
    $Ruta = $_POST['Ruta'];

    $nuevo_Arreglo = explode(",", $arreglo);

    $arreglofinal = json_encode(array_filter($nuevo_Arreglo));


  $query = "UPDATE ConfigRevisionSistemas SET Arreglo=$arreglofinal where id = $id";
  $enlace_actual = str_replace('.php', '', $Ruta);

  auditorMaster($idusuario, '1', $enlace_actual, $query);

    //echo "Se Actualizo".$arreglofinal;

	mysqli_query($conn3,"UPDATE ConfigRevisionSistemas SET Arreglo='$arreglofinal' where id = '$id'");

	$QueryAntecedentes=mysqli_query($conn3,"SELECT * FROM  ConfigAntecedentes");
  $nrow_antecedentes=mysqli_num_rows($QueryAntecedentes);
  while($rowAntecedentes=mysqli_fetch_array($QueryAntecedentes))
  {
      $nombre = $rowAntecedentes['Nombre'];
      $arreglo[$nombre]  = json_decode($rowAntecedentes['Arreglo']);
      
  }
  	$arreglo_antecedentes = json_encode($arreglo);

  	echo $arreglo_antecedentes;
}
elseif($_POST['Revision_Tipo']=='Crear')
{

  $Revision_Arreglo = reem($_POST['Revision_Arreglo']);
  $Revision_Principal = $_POST['Revision_Principal'];

  $nuevo_Arreglo = explode(",", $Revision_Arreglo);

  $arreglofinal = json_encode(array_filter($nuevo_Arreglo));

    $idusuario = $_POST['usuario_id'];
    $Ruta = $_POST['Ruta'];


  $query = "INSERT INTO ConfigRevisionSistemas (Nombre, Arreglo) VALUES ($Revision_Principal, $arreglofinal";
  $enlace_actual = str_replace('.php', '', $Ruta);

  auditorMaster($idusuario, '1', $enlace_actual, $query);

  //echo "Se Actualizo".$arreglofinal;

  mysqli_query($conn3,"INSERT INTO ConfigRevisionSistemas (Nombre, Arreglo) VALUES ('$Revision_Principal', '$arreglofinal')");
}
elseif($_POST['Revision_Tipo']=='Eliminar')
{

  $id = $_POST['id'];

  $idusuario = $_POST['usuario_id'];

   $Ruta = $_POST['Ruta'];

   $query = "UPDATE ConfigRevisionSistemas set activo = 0 where id = $id";
   $enlace_actual = str_replace('.php', '', $Ruta);

  auditorMaster($idusuario, '1', $enlace_actual, $query);


  //mysqli_query($conn3,"DELETE FROM ConfigRevisionSistemas WHERE id='$id' LIMIT 1");

  mysqli_query($conn3, "UPDATE ConfigRevisionSistemas set activo = 0 where id = '$id' limit 1");
  
}

?>