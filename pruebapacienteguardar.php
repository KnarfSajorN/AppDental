<?php

include 'funciones/funciones.php';
$Nombre_Tabla="CH_Campos_Historia";

$tabla = mysqli_query($conn3, "SHOW TABLES LIKE '{$Nombre_Tabla}'");
$nrowtabla = mysqli_num_rows($tabla);
if ($nrowtabla == 0) {

    $query = "CREATE TABLE `{$Nombre_Tabla}` (
        `id` int(11) NOT NULL,
        `Fecha_Registro` datetime DEFAULT current_timestamp(),
        `Fecha_Actualizacion` datetime DEFAULT current_timestamp(),
        `usuario_id` int(11) NOT NULL,
        `historia_id` int(11) NOT NULL,
        `Posicion` int(11) NOT NULL,
        `Tipo_Campo` TEXT DEFAULT '' ,
        `Columnas` TEXT DEFAULT '' ,
        `Nombre_Campo` TEXT DEFAULT '' ,
        `Maximo_Caracteres` TEXT DEFAULT '' ,
        `Campo_Obligatorio` TEXT DEFAULT '' 
        ) ENGINE=MyISAM DEFAULT CHARSET=latin1;";

    $creaciontabla = mysqli_query($conn3, $query);
    if (!$creaciontabla) {
        echo "<script language='Javascript'> alert('error en la creacion de la tabla');</script>";
    } else {
        mysqli_query($conn3, "ALTER TABLE `{$Nombre_Tabla}` ADD PRIMARY KEY (`id`);");
        mysqli_query($conn3, "ALTER TABLE `{$Nombre_Tabla}` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;");
    }
}

foreach ($_POST["NuevoCampo"] as $key => $value) {
    $Campos .= $key . ',';
    $Valores .= "'{$value}',";
}
$Campos = trim($Campos, ',');
$Valores = trim($Valores, ',');

$usuario_id = $_POST['usuario_id'];
$queryList = mysqli_query($conn3, "INSERT INTO {$Nombre_Tabla} (usuario_id,{$Campos}) VALUES ('$usuario_id', {$Valores});");

$Historia_id=$_POST["NuevoCampo"]["historia_id"];
$ruta = "pruebapaciente.php";
if ($queryList != true) {
    //echo "<script language='Javascript'> window.location='{$ruta}?Historia={$Historia_id}&error=Hubo Un Error Al Guardar Los Datos'</script>";
    echo "INSERT INTO {$Nombre_Tabla} (usuario_id,{$Campos}) VALUES ('$usuario_id', {$Valores});";
} 
else {
    echo "<script language='Javascript'> window.location='{$ruta}?Historia={$Historia_id}&msg=Se Guardo El Campo Correctamente'</script>";
}

?>