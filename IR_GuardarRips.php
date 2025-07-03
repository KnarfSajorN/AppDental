<?php
if ($RIP_Nombre_Historia<>"" AND $RIP_historia_id <> "" AND $_POST["RIP"]<>"") {

    $arreglo = explode("&",$_POST["RIP"]);
    foreach ($arreglo as $key => $value) {
        $arreglo_final = explode("=", $value);
        $datos[urldecode($arreglo_final[0])]= urldecode($arreglo_final[1]);
    }

    if (is_numeric($datos["cliente_id"])) {
        
    } else {
        // La variable no es numérica, realiza alguna acción en caso de error
        $datos['cliente_id'] = $RIP_cliente_id;
    }

    foreach ($datos as $key => $value)
    {
        $Campos .= $key . ',';
        $Valores .= "'{$value}',";
    }


    
      
  $cliente_rips = $datos["cliente_id"];

 $queryListaW = mysqli_query($conn3, "SELECT * FROM cliente where cliente_id = '$cliente_rips'");

while ($rowListaW = mysqli_fetch_array($queryListaW)) {
        $fe_entidad_id= $rowListaW["entidad_id"];
        $fe_convenio_id= $rowListaW["convenio_id"];
}

/*
$queryE = mysqli_query($conn3, "SELECT * FROM FE_Entidades where id='$fe_entidad_id'");
$nrowE = mysqli_num_rows($queryE);
while ($rowListaE = mysqli_fetch_array($queryE)) {
    $entidadSalud = $rowListaE['codigo'];
    $entidadSaludN = $rowListaE['Nombre'];
    $copago = $rowListaE['fe_copago'];
    $consulta = $rowListaE['fe_consulta'];
    $neto = $rowListaE['fe_Neto'];
} */


$queryE = mysqli_query($conn3, "SELECT * FROM Rips_Tarifa where convenio_id='$fe_convenio_id'");
$nrowE = mysqli_num_rows($queryE);
while ($rowListaE = mysqli_fetch_array($queryE)) {
    $entidadSalud = $rowListaE['codigo'];
    $entidadSaludN = $rowListaE['Nombre'];
    $copago = $rowListaE['Copago'];
    $consulta = $rowListaE['Valor'];
    $neto = $rowListaE['Valor_Empresa'];
    $total = $rowListaE['fe_valor_convenio'];
}


    $Campos = $Campos."Valor_Consulta,Valor_Cuota_Moderadora,Valor_Neto, total_Convenio";
    $Valores = $Valores."'$consulta','$copago','$neto', '$total'";


    $Campos = trim($Campos, ',');
    $Valores = trim($Valores, ',');

    $tabla = mysqli_query($conn3, "SHOW TABLES LIKE 'Rips_Informacion'");
    $nrowtabla = mysqli_num_rows($tabla);
    
    if ($nrowtabla == 0) 
    {
        $query = "CREATE TABLE `Rips_Informacion`(
        `id` int(11) NOT NULL,
        `usuario_id` int(11) NOT NULL,
        `cliente_id` int(11) NOT NULL,
        `Fecha` datetime NOT NULL DEFAULT current_timestamp(),
        `Nombre_Historia` varchar(300) NOT NULL,
        `historia_id` varchar(10) NULL DEFAULT '',
        `Tipo_Consulta` varchar(100) NULL DEFAULT '' COMMENT 'Rip Consultas',
        `CIE10_1` TEXT NULL DEFAULT '' COMMENT 'Rip Consultas',
        `CIE10_2` TEXT NULL DEFAULT '' COMMENT 'Rip Consultas',
        `CIE10_3` TEXT NULL DEFAULT '' COMMENT 'Rip Consultas',
        `CIE10_4` TEXT NULL DEFAULT '' COMMENT 'Rip Consultas',
        `Finalidad_Consulta` varchar(100) NOT NULL COMMENT 'Rips Consulta',
        `Causa_Externa` varchar(100) NOT NULL COMMENT 'Rips Consulta'
        ) ENGINE=MyISAM DEFAULT CHARSET=latin1;";

        $creaciontabla = mysqli_query($conn3, $query);
        if (!$creaciontabla) {
            echo "<script language='Javascript'> alert('error en la creacion de la tabla rip');</script>";
        } else {
            mysqli_query($conn3, "ALTER TABLE `Rips_Informacion` ADD PRIMARY KEY (`id`);");
            mysqli_query($conn3, "ALTER TABLE `Rips_Informacion` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;");
        }
    }

    foreach ($datos as $key => $value) {
        $Campo = mysqli_query($conn3, "show COLUMNS from `Rips_Informacion` WHERE Field = '{$key}';");
        $nrowCampo = mysqli_num_rows($Campo);
        if ($nrowCampo == 0) {
            mysqli_query($conn3, "ALTER TABLE `Rips_Informacion` ADD `{$key}` TEXT NULL  DEFAULT '' COMMENT 'Rips';");
        }
    }
        

    //rips US
    $US = ["Tipo_Identificacion", "Numero_Identificacion", "Tipo_Usuario", "Primer_Nombre", "Segundo_Nombre", "Primer_Apellido", "Segundo_Apellido", "Edad", "Unidad_Edad", "Sexo", "Codigo_Departamento", "Codigo_Municipio", "Zona_Residencial"];
    foreach ($US as $key => $value) {
        $Campo = mysqli_query($conn3, "show COLUMNS from `Rips_Informacion` WHERE Field = '{$value}';");
        $nrowCampo = mysqli_num_rows($Campo);
        if ($nrowCampo == 0) {
            mysqli_query($conn3, "ALTER TABLE `Rips_Informacion` ADD `{$value}` TEXT NULL DEFAULT '' COMMENT 'Rip Usuarios'");
        }
    }

    //US
    $cliente_rips = $datos["cliente_id"];
    $queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id=$cliente_rips");
    $nrowl = mysqli_num_rows($queryList);
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        $Respuesta1 = $rowMotorizado["tipo_cliente"];
        $Respuesta2 = $rowMotorizado["CODI_CLIENTE"];
        $Respuesta3 = $rowMotorizado["tipoUsuario"];
        $Respuesta4 = $rowMotorizado["primer_nombre"];
        $Respuesta5 = $rowMotorizado["segundo_nombre"];
        $Respuesta6 = $rowMotorizado["primer_apellido"];
        $Respuesta7 = $rowMotorizado["segundo_apellido"];
        $Respuesta8 = $rowMotorizado["fechaNacimiento"];
        $Respuesta9 = "0";
        $Respuesta10 = $rowMotorizado["genero"];
        $Respuesta11 = $rowMotorizado["codigo_departamento"];
        $Respuesta12 = $rowMotorizado["codigo_ciudad"];
        $Respuesta13 = $rowMotorizado["zona"];
    }


    list($anyo, $mes, $dia) = explode("-", $Respuesta8);
    $anyo_dif  = date("Y") - $anyo;
    $mes_dif = date("m") - $mes;
    $dia_dif   = date("d") - $dia;

    if (($mes_dif < 1 and $mes_dif >= 0) and ($mes_dif < 1 and $mes_dif >= 0) and ($anyo_dif < 2 and $anyo_dif >= 0)) {
        $edad =  $dia_dif;
        $unidad = 3;
    }

    if ($anyo_dif < 1 and $mes_dif > 0) {
        $edad =  $mes_dif;
        $unidad = 2;
    }
    if ($anyo_dif > 0 and $anyo_dif < 2) {
        $mes_dif2 = $mes_dif + 12;
        $edad =  $mes_dif2;
        $unidad = 2;
    }
    if ($anyo_dif >= 2) {
        if ($mes_dif < 0) {
            $mes_dif = 12 - ($mes_dif * -1);
            $anyo_dif--;
        }
        $edad =  $anyo_dif;
        $unidad = 1;
    }

    $Respuesta8 = $edad;
    $Respuesta9 = $unidad;

    $USRespuesta = ["$Respuesta1", "$Respuesta2", "$Respuesta3", "$Respuesta4", "$Respuesta5", "$Respuesta6", "$Respuesta7", "$Respuesta8", "$Respuesta9", "$Respuesta10", "$Respuesta11", "$Respuesta12", "$Respuesta13"];
    foreach ($US as $key => $value) {
        $CamposUsuarios .= $value . ',';
        $ValoresUsuarios .= "'".mysqli_real_escape_string($conn3, $USRespuesta[$key])."',";
    }
    $CamposUsuarios = trim($CamposUsuarios, ',');
    $ValoresUsuarios = trim($ValoresUsuarios, ',');
    //US

    $queryList = mysqli_query($conn3, "INSERT INTO Rips_Informacion (Nombre_Historia,historia_id,{$Campos},{$CamposUsuarios}) VALUES ('$RIP_Nombre_Historia','$RIP_historia_id', {$Valores},{$ValoresUsuarios});");

    $Arreglo=["CIE10_1", "CIE10_2", "CIE10_3", "CIE10_4"];
    foreach ($Arreglo as $key => $value) 
    {
        $Campo = mysqli_query($conn3, "show COLUMNS from {$RIP_Nombre_Historia} WHERE Field = '{$value}';");
        $nrowCampo = mysqli_num_rows($Campo);
        if ($nrowCampo == 0) {
            mysqli_query($conn3, "ALTER TABLE `{$RIP_Nombre_Historia}` ADD `{$value}` TEXT NULL DEFAULT '' COMMENT 'CIE10, Creados Mediante El Modulo de Rips IR_GuardarRips';");
            
        }
        $ArregloHistoria[$value]=$datos[$value];
    }

    $Campos = "";
    foreach ($ArregloHistoria as $key => $value) 
    {
        $Campos .= "{$key} = '{$value}',";
    }

    $Campos = trim($Campos, ',');
    mysqli_query($conn3, "UPDATE {$RIP_Nombre_Historia} SET {$Campos} WHERE id = '{$RIP_historia_id}' limit 1;");

    
}
elseif($RIP_Nombre_Historia <> "" and $RIP_historia_id <> "" and $_POST["DiagnosticoConsultaMedica"] <> "")
{
    $Arreglo = ["CIE10_1", "CIE10_2", "CIE10_3", "CIE10_4"];
    foreach ($Arreglo as $key => $value) 
    {
        $Campo = mysqli_query($conn3, "show COLUMNS from {$RIP_Nombre_Historia} WHERE Field = '{$value}';");
        $nrowCampo = mysqli_num_rows($Campo);
        if ($nrowCampo == 0) {
            mysqli_query($conn3, "ALTER TABLE `{$RIP_Nombre_Historia}` ADD `{$value}` TEXT NULL DEFAULT '' COMMENT 'CIE10, Creados Mediante El Modulo de Rips IR_GuardarRips';");
        }
    }

    $Campos="";
    foreach ($_POST["DiagnosticoConsultaMedica"] as $key => $value) 
    { 
            $Campos .= "{$key} = '{$value}',";
    }
    $Campos = trim($Campos, ',');

    mysqli_query($conn3, "UPDATE {$RIP_Nombre_Historia} SET {$Campos} WHERE id = '{$RIP_historia_id}' limit 1;");

}
