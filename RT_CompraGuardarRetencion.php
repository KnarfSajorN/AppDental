<?php

include 'funciones/funciones.php';

$tabla = mysqli_query($conn3, "SHOW TABLES LIKE 'DetalleRetenciones'");
$nrowtabla = mysqli_num_rows($tabla);
if ($nrowtabla == 0) {
    $query = "CREATE TABLE `DetalleRetenciones` ( 
        `id` INT(11) NOT NULL AUTO_INCREMENT , 
        `Fecha` DATETIME NULL DEFAULT CURRENT_TIMESTAMP , 
        `idOperacion` INT(11) NULL DEFAULT '0' , 
        `TipoRetencion` TEXT NULL DEFAULT '0' , 
        `Porcentaje` TEXT NULL DEFAULT '0' , 
        `MontoRetencion` TEXT NULL DEFAULT '0' ,
        `Tipo` INT(11) NULL DEFAULT '1' COMMENT '1-> retencion base | 2-> retencion iva ',
        `ID_Empresa` INT(11) NULL DEFAULT '0' , 
        `usuario_id` INT(11) NULL DEFAULT '0' , 
        `Activo` INT(11) NULL DEFAULT '1' ,

        PRIMARY KEY (`id`)) ENGINE = MyISAM;";

    $creaciontabla = mysqli_query($conn3, $query);
    if (!$creaciontabla) {
        echo "<script language='Javascript'> alert('error en la creacion de la tabla');
        window.location='portada';</script>";

        exit();
    }
}

$TipoRetencion = $_POST['TipoRetencion'];
$MontoRetencion = $_POST['MontoRetencion'];
$Porcentaje = funcionMaster($TipoRetencion,'id','Porcentaje','Retenciones');
$Tipo = funcionMaster($TipoRetencion,'id','Tipo','Retenciones');

$ID_Empresa = $_POST['ID_Empresa'];
$usuario_id = $_POST['usuario_id'];

$consulta = mysqli_query($conn3, "INSERT INTO DetalleRetenciones 
(TipoRetencion, Porcentaje, MontoRetencion, Tipo, ID_Empresa, usuario_id) 
  VALUES                     
('$TipoRetencion', '$Porcentaje','$MontoRetencion', '$Tipo', '$ID_Empresa', '$usuario_id');") or die(mysqli_error($conn3));

echo "<script language='Javascript'> 
    var rutaPaginaAnterior = document.referrer;
    window.location.href = rutaPaginaAnterior;
    </script>";


?>

