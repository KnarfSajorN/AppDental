<?php
if ($Recetario_Nombre_Historia<>"" AND $Recetario_historia_id <> "" AND $_POST["receta_id"]<>"") {

    $Nombre_Campo_Receta="receta_id";
    $receta_id = $_POST["receta_id"];

    // estos datos vienen de la historia
    $Recetario_cliente_id = $Recetario_cliente_id;
    $Recetario_usuario_id = $Recetario_usuario_id;

    //$Recetario_Nombre_Historia
    //$Recetario_historia_id

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $Campo1 = mysqli_query($conn3, "show COLUMNS from RM_Recetario WHERE Field = 'Historia_id';");
	$nrowCampo1 = mysqli_num_rows($Campo1);
	if ($nrowCampo1 == "0") {
		mysqli_query($conn3, "ALTER TABLE `RM_Recetario` ADD `Historia_id` TEXT NULL DEFAULT '0' COMMENT 'id de la tabla Historia_Clinica*Creado desde GuardarRecetaHistoria*'");
	}

    
    $Campo1 = mysqli_query($conn3, "show COLUMNS from RM_Recetario WHERE Field = 'Tipo_Historia';");
	$nrowCampo1 = mysqli_num_rows($Campo1);
	if ($nrowCampo1 == "0") {
		mysqli_query($conn3, "ALTER TABLE `RM_Recetario` ADD `Tipo_Historia` TEXT NULL DEFAULT '' COMMENT 'nombre tabla relacionar receta *Creado desde GuardarRecetaHistoria*'");
	}
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



    
    $Campo = mysqli_query($conn3, "show COLUMNS from {$Recetario_Nombre_Historia} WHERE Field = '{$Nombre_Campo_Receta}';");
    $nrowCampo = mysqli_num_rows($Campo);
    if ($nrowCampo == 0) {
        mysqli_query($conn3, "ALTER TABLE `{$Recetario_Nombre_Historia}` ADD `{$Nombre_Campo_Receta}` int(10) NULL DEFAULT '0' COMMENT 'Recetario id, Creado Mediante El Modulo de Recetario RM_GuardarRecetaHistoria';");
    }
    
    mysqli_query($conn3, "UPDATE {$Recetario_Nombre_Historia} SET {$Nombre_Campo_Receta}='{$receta_id}' WHERE id = '{$Recetario_historia_id}' limit 1;");

    mysqli_query($conn3, "UPDATE RM_Recetario SET Estado = 'Cerrado' WHERE receta_id = '$receta_id' AND cliente_id = '$Recetario_cliente_id' AND usuario_id ='$Recetario_usuario_id' ");

    mysqli_query($conn3, "UPDATE RM_Recetario SET Historia_id = '$Recetario_historia_id', Tipo_Historia='$Recetario_Nombre_Historia' WHERE receta_id = '$receta_id' AND cliente_id = '$Recetario_cliente_id' AND usuario_id ='$Recetario_usuario_id' ");
}
?>