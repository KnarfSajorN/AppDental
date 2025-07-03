<?php
function VerificarArchivo($Valor,$Ruta)
{
	if (file_exists($Ruta.$Valor)) {
	    $Valor= rand(999, 9999)."_".$Valor;
	    $Valor= VerificarArchivo($Valor,$Ruta);
	}

	return $Valor;
}

if(isset($_FILES['upload']['name']))
{
	$file=VerificarArchivo($_FILES['upload']['name'],'ArchivosPlantillas/'.$_GET["medico"].'/');

	$filetmp=$_FILES['upload']['tmp_name'];

	move_uploaded_file($filetmp,'ArchivosPlantillas/'.$_GET["medico"].'/'.$file);
	$function_number=$_GET['CKEditorFuncNum'];
	$url='ArchivosPlantillas/'.$_GET["medico"].'/'.$file;
	$message='';
	echo "<script>window.parent.CKEDITOR.tools.callFunction('".$function_number."','".$url."','".$message."');</script>";     
}
?>