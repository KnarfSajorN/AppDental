<?php

date_default_timezone_set('America/Bogota');
include("funciones/funcionesUtilidades.php");
include("funciones/conn3.php");

function funcionMaster($filtro, $campoFiltrar, $campoImprimir, $tabla)
{
    include 'funciones/conn3.php';
    $query = mysqli_query($conn3, "SELECT * FROM $tabla where $campoFiltrar = '$filtro'");
    $nrowl = mysqli_num_rows($query);
    while ($row = mysqli_fetch_array($query)) {

        $text = $row[$campoImprimir];
    }
    return  $text;
}


if($_POST['Revision_Tipo']=='Editar')
{
    $arreglo = reem($_POST['arreglo']);
    $id = $_POST['id'];

    $nuevo_Arreglo = explode(",", $arreglo);

    $arreglofinal = json_encode(array_filter($nuevo_Arreglo));

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

  //echo "Se Actualizo".$arreglofinal;

  mysqli_query($conn3,"INSERT INTO ConfigRevisionSistemas (Nombre, Arreglo) VALUES ('$Revision_Principal', '$arreglofinal')");
}
elseif($_POST['Revision_Tipo']=='Eliminar')
{

  $id = $_POST['id'];


  mysqli_query($conn3,"DELETE FROM ConfigRevisionSistemas WHERE id='$id' LIMIT 1");
  
}

?>