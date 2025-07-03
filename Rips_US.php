<?php

header('Content-Type: application/vnd.ms-excel; charset=UTF-8');
header('Content-Disposition: attachment; filename=RipsUS.xls');
include 'funciones/conn3.php';
include 'funciones/funciones.php';

$desde = $_POST['desde'];
$hasta = $_POST['hasta'];

$entidadSalud = $_POST['entidadSalud'];
$fechaRemision = $_POST['fechaRemision'];

$tipoUsuario = $_POST['tipoUsuario'];

$cantidadRegistros = 0;
$fechaHoy = date("Y-m-d");
// consulta para datos de usuario rips

$doctor = $_POST['doctor'];

$queryU = mysqli_query($conn3, "SELECT * FROM usuarios where ID='$doctor'");
$nrowU = mysqli_num_rows($queryU);
while ($rowListaU = mysqli_fetch_array($queryU)) {
    $NOMBRE_USUARIO = $rowListaU['NOMBRE_USUARIO'];
    $codigoPrestador = $rowListaU['codigoPrestador'];
    $nit = $rowListaU['nit'];
}

echo '<table border="1" cellpadding="2" cellspacing="0" width="100%">
    <tr>
        <td>Tipo de identificacion del usuario</td>
        <td>Numero de identificacion del usuario del sistema</td>
        <td>Codigo entidad administradora</td>
        <td>Tipo de usuario</td>
        <td>Primer apellido del usuario</td>
        <td>Segundo apellido del usuario</td>
        <td>Primer nombre del usuario</td>
        <td>Segundo nombre del usuario</td>
        <td>Edad</td>
        <td>Unidad de medida de la edad</td>
        <td>Sexo</td>
        <td>Codigo del departamento de residencia habitual</td>
        <td>Codigo del municipio de residencia habitual</td>
        <td>Zona de residencia habitual</td>
    </tr>';

//$doctor = $_POST['doctor'];
if ($doctor == 0) {
    $queryListaH = mysqli_query($conn3, "SELECT * FROM Rips_Informacion where fecha BETWEEN '$desde' and '$hasta'");
}
else {
    $queryListaH = mysqli_query($conn3, "SELECT * FROM Rips_Informacion where (fecha BETWEEN '$desde' and '$hasta') AND usuario_id=$doctor");
}

$entidadSalud="PARTICULAR";

$nrow = mysqli_num_rows($queryListaH);
/*
while ($rowListaH = mysqli_fetch_array($queryListaH)) {
    $cliente_id = $rowListaH["cliente_id"];

    $queryListaC = mysqli_query($conn3, "SELECT * FROM cliente where cliente_id=$cliente_id limit 1");
    $nrowC = mysqli_num_rows($queryListaC);
    while ($rowListaC = mysqli_fetch_array($queryListaC)) {

    $Tipo_Identificacion = $rowListaC["tipo_cliente"];
    $Numero_Identificacion = $rowListaC["CODI_CLIENTE"];

    $Codigo_Entidad_Administradora = $rowListaC["entidadSalud"];
    $Tipo_Usuario = $rowListaC["tipoUsuario"];
    $Primer_Nombre = $rowListaC["primer_nombre"];
    $Segundo_Nombre = $rowListaC["segundo_nombre"];
    $Primer_Apellido = $rowListaC["primer_apellido"];
    $Segundo_Apellido = $rowListaC["segundo_apellido"];
    $fechaNacimiento = $rowListaC["fechaNacimiento"];

    list($anyo, $mes, $dia) = explode("-", $fechaNacimiento);
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

    $Edad = $edad;
    $Unidad_Edad = $unidad;

    $Sexo = $rowListaC["genero"];
    $Codigo_Departamento = $rowListaC["codigo_departamento"];
    $Codigo_Municipio = $rowListaC["codigo_ciudad"];
    $Zona_Residencial = $rowListaC["zona"];
    //si zona es Urbana remplazar con la letra U y si es Rural remplazar con la letra R
    if ($Zona_Residencial == "Urbana") {
        $Zona_Residencial = "U";
    }
    if ($Zona_Residencial == "Rural") {
        $Zona_Residencial = "R";
    }
    

    echo "  <tr>
        <td>$Tipo_Identificacion </td>
        <td>$Numero_Identificacion </td>
        <td>$Codigo_Entidad_Administradora</td>
        <td>$Tipo_Usuario </td>
        <td>$Primer_Nombre </td>
        <td>$Segundo_Nombre</td>
        <td>$Primer_Apellido </td>
        <td>$Segundo_Apellido </td>
        <td>$Edad </td>
        <td>$Unidad_Edad </td>
        <td>$Sexo </td>
        <td>$Codigo_Departamento </td>
        <td>$Codigo_Municipio </td>
        <td>$Zona_Residencial </td>
        </tr>";

    $cantidadRegistros = $cantidadRegistros + 1;
    
}
*/
while ($rowListaH = mysqli_fetch_array($queryListaH)) {
    
    $arregloCliente[$rowListaH["cliente_id"]] = $arregloCliente[$rowListaH["cliente_id"]]+1;
}

foreach ($arregloCliente as $key => $value) {
    
    $queryListaW = mysqli_query($conn3, "SELECT * FROM cliente where cliente_id = '$key'");
    while ($rowListaW = mysqli_fetch_array($queryListaW)) {
    $Tipo_Identificacion = $rowListaW["tipo_cliente"];
    $Numero_Identificacion = $rowListaW["CODI_CLIENTE"];

    $Codigo_Entidad_Administradora = "SDS001";
    $Tipo_Usuario = $rowListaW["tipoUsuario"];
    // tipo usuario cambiar a 1 = Contributivo , 2 = Subsidiado ,3 = Vinculado , 4 = Particular , 5 = Otro
    if ($Tipo_Usuario == "Contributivo") {
        $Tipo_Usuario = 1;
    } elseif ($Tipo_Usuario == "Subsidiado") {
        $Tipo_Usuario = 2;
    } elseif ($Tipo_Usuario == "Vinculado") {
        $Tipo_Usuario = 3;
    } elseif ($Tipo_Usuario == "Particular") {
        $Tipo_Usuario = 4;
    } elseif ($Tipo_Usuario == "Otro") {
        $Tipo_Usuario = 5;
    }

    $Primer_Nombre = $rowListaW["primer_nombre"];
    $Segundo_Nombre = $rowListaW["segundo_nombre"];
    $Primer_Apellido = $rowListaW["primer_apellido"];
    $Segundo_Apellido = $rowListaW["segundo_apellido"];
    $fechaNacimiento = $rowListaW["fechaNacimiento"];
    list($anyo, $mes, $dia) = explode("-", $fechaNacimiento);
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

    $Edad = $edad;
    $Unidad_Edad = $unidad;

    //$Edad = $rowListaW["Edad"];
    //$Unidad_Edad = $rowListaW["Unidad_Edad"];
    $Sexo = $rowListaW["genero"];
    $Codigo_Departamento = $rowListaW["codigo_departamento"];
    $Codigo_Departamento = funcionMaster($Codigo_Departamento,'ID','codigo','departamentos');
    // si $Codigo_Departamento tiene un solo digito agregar un cero a la izquierda
    if (strlen($Codigo_Departamento) == 1) {
        $Codigo_Departamento = "0".$Codigo_Departamento;
    }

    $Codigo_Municipio = $rowListaW["codigo_ciudad"];
    $Codigo_Municipio = funcionMaster($Codigo_Municipio,'id','Codigo_Ciudad','Ciudades');
    $Zona_Residencial = $rowListaW["zona"];

    if ($Zona_Residencial == "Urbana") {
        $Zona_Residencial = "U";
    }
    if ($Zona_Residencial == "Rural") {
        $Zona_Residencial = "R";
    }

    $cliente_id = $rowListaW["cliente_id"];
        $queryListaCliente = mysqli_query($conn3, "SELECT * FROM cliente where cliente_id = '$cliente_id'");
        while ($rowListaC = mysqli_fetch_array($queryListaCliente)){
            $tipoUsuarioSistema = $rowListaC["tipoUsuario"];
        }
        
        if($tipoUsuario==$tipoUsuarioSistema){

        echo "  <tr>
            <td>$Tipo_Identificacion </td>
            <td>$Numero_Identificacion </td>
            <td>$Codigo_Entidad_Administradora</td>
            <td>$Tipo_Usuario </td>
            <td>$Primer_Nombre </td>
            <td>$Segundo_Nombre</td>
            <td>$Primer_Apellido </td>
            <td>$Segundo_Apellido </td>
            <td>$Edad </td>
            <td>$Unidad_Edad </td>
            <td>$Sexo </td>
            <td>$Codigo_Departamento </td>
            <td>$Codigo_Municipio </td>
            <td>$Zona_Residencial </td>
            </tr>";

        $cantidadRegistros = $cantidadRegistros + 1;
        
        }
    
    }

}
echo "</table>";
$fechaHoy = date("Y-m-d");

$QueryRipControl = mysqli_query($conn3, "SELECT count(ID) as cuantos,ID FROM  informacion_rips2 where 
    usuario_id='$doctor' and
    Fecha='$fechaHoy' and
    nombrePrestador='$NOMBRE_USUARIO' and
    codigoPrestador='$codigoPrestador' and
    TipoId='CC' and
    numeroId='$nit' and
    fechaRemision='$fechaRemision' and
    codArchivo='US' and
    codigoEntidad='$entidadSalud';");
while ($rowListaZ = mysqli_fetch_array($QueryRipControl)) {
    $existe = $rowListaZ['cuantos'];
    $id_rips = $rowListaZ['ID'];
}

if ($existe == 0) {
    mysqli_query($conn3, "INSERT into informacion_rips2 
        (usuario_id, Fecha, nombrePrestador, codigoPrestador, TipoId, numeroId, fechaRemision, codArchivo, totalRegistros, codigoEntidad)
        values
        ('$doctor','$fechaHoy','$NOMBRE_USUARIO','$codigoPrestador','CC','$nit','$fechaRemision','US','$cantidadRegistros','$entidadSalud');");
} elseif ($existe > 0) {
    mysqli_query($conn3, "UPDATE  informacion_rips2 set
    usuario_id='$doctor' ,
    Fecha='$fechaHoy' ,
    nombrePrestador='$NOMBRE_USUARIO' ,
    codigoPrestador='$codigoPrestador' ,
    TipoId='CC' ,
    numeroId='$nit' ,
    fechaRemision='$fechaRemision' ,
    codArchivo='US' ,
    totalRegistros='$cantidadRegistros' ,
    codigoEntidad='$entidadSalud'
    where ID='$id_rips';");
}
?>