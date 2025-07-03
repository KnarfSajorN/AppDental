<?php

include 'funciones/conn3.php';

if($_POST["Tipo_Consulta"]=="Consultar Apertura Caja"){

    $usuario_id = $_POST["usuario_id"];
    $POS = $_POST["pos"];

    $QueryAperturaCaja = mysqli_query($conn3, "SELECT * FROM AperturaCaja WHERE usuario_id='$usuario_id' AND Pos='$POS' AND Activo = 1");
    $NrowApertura=mysqli_num_rows($QueryAperturaCaja);

    if($NrowApertura>0){
        $Arreglo["Estado"]= "Activo"; 
    }else{
        $Arreglo["Estado"]= "Inactivo"; 
    }

    echo json_encode($Arreglo);
    
}

if($_POST["Tipo_Consulta"]=="Agregar Apertura Caja"){

    //Aquí creamos la tabla del Apertura
    $tabla = mysqli_query($conn3, "SHOW TABLES LIKE 'AperturaCaja'");
    $nrowtabla = mysqli_num_rows($tabla);
    if ($nrowtabla == 0) {
        $query = "CREATE TABLE `AperturaCaja` (
            `id` INT(11) NOT NULL AUTO_INCREMENT ,
            `Fecha` DATE NULL DEFAULT CURRENT_TIMESTAMP ,
            `Hora` TIME NULL DEFAULT CURRENT_TIMESTAMP ,
            `usuario_id` INT(11) NULL DEFAULT '0' ,
            `MontoApertura` TEXT NULL  ,
            `Ip_Local` TEXT NULL,
            `Ip_Publica` TEXT NULL,
            `Pos` INT(11) NULL DEFAULT '0' ,
            `CierreCaja_id` INT(11) NULL DEFAULT '0' ,
            `Activo` INT(11) NULL DEFAULT '1' COMMENT '1-> Activo 0-> Inactivo 2->Cerrado',
            PRIMARY KEY (`id`)) ENGINE = MyISAM;";

        $creaciontabla = mysqli_query($conn3, $query);
        if (!$creaciontabla) {
            echo "error en la creacion de la tabla";
            exit();
        }
    }

    $usuario_id = $_POST["usuario_id"];
    $POS = $_POST["pos"];
    $Precio = $_POST["Precio"];

    $publicIP = file_get_contents('https://ipinfo.io/ip');

    $localIP = $_SERVER['REMOTE_ADDR'];

    $fecha = date("Y-m-d");
    $hora = date("h:i:s");

    $queryList = mysqli_query($conn3, "INSERT INTO AperturaCaja (Fecha, Hora, usuario_id, MontoApertura, Ip_Local, Ip_Publica, Pos)
                                VALUES ('$fecha', '$hora', '$usuario_id', '$Precio', '$localIP', '$publicIP',  '$POS');");

    if ($queryList != true) {
        $Arreglo["Estado"]= "Error"; 
    } else {
        $Arreglo["Estado"]= "Creado"; 
    }

    echo json_encode($Arreglo);
    
}


?>