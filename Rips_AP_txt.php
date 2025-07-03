<?php

header('Content-Type: application/vnd.ms-excel; charset=UTF-8');
header('Content-Disposition: attachment; filename=RipsAP.txt');
include 'funciones/conn3.php';

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
    
    $factura=$rowListaU['factura'];
}

/*
if ($entidadSalud == 0) {
    $queryListaH = mysqli_query($conn3, "SELECT * FROM Rips_Informacion where fecha BETWEEN '$desde' and '$hasta' and Nombre_Historia='historiaClinica_Quirurgica'");
}
*/


if ($doctor == 0) {
    $queryListaH = mysqli_query($conn3, "SELECT * FROM Rips_Informacion where fecha BETWEEN '$desde' and '$hasta'");
}
else {
    $queryListaH = mysqli_query($conn3, "SELECT * FROM Rips_Informacion where (fecha BETWEEN '$desde' and '$hasta') AND usuario_id=$doctor ");
}

$entidadSalud="PARTICULAR";

/* else {
    $queryListaH = mysqli_query($conn3, "SELECT * FROM Rips_Informacion where (fecha BETWEEN '$desde' and '$hasta') AND entidad_id=$entidadSalud");
}
*/

$nrow = mysqli_num_rows($queryListaH);
while ($rowListaH = mysqli_fetch_array($queryListaH)) {
    $Numero_Factura = $rowListaH["Numero_Factura"];

    $Tipo_Identificacion = $rowListaH["Tipo_Identificacion"];
    $Numero_Identificacion = $rowListaH["Numero_Identificacion"];

    $Fecha = $rowListaH["Fecha"];
    $FechaX = explode(" ", $Fecha);
    $Fecha = $FechaX[0];
    //Fecha ponerlo d/m/Y
    $Fecha = date("d/m/Y", strtotime($Fecha));

    $Numero_Autorizacion = $rowListaH["Numero_Autorizacion"];
    $CUP = $rowListaH["CUP"];
    $Ambito_Realizacion = $rowListaH["Ambito_Realizacion"];
    $Finalidad_Procedimiento = $rowListaH["Finalidad_Procedimiento"];
    $Personal_Atiende = $rowListaH["Personal_Atiende"];
    $CIE10_1 = $rowListaH["CIE10_1_Procedimiento"];
    $CIE10_2 = $rowListaH["CIE10_2_Procedimiento"];
    $Complicacion = $rowListaH["Complicacion"];
    $Acto_Quirurgico = $rowListaH["Acto_Quirurgico"];
    $Valor_Procedimiento = $rowListaH["Valor_Procedimiento"];

    $cliente_id = $rowListaH["cliente_id"];
    $queryListaCliente = mysqli_query($conn3, "SELECT * FROM cliente where cliente_id = '$cliente_id'");
    while ($rowListaC = mysqli_fetch_array($queryListaCliente)){
        $tipoUsuarioSistema = $rowListaC["tipoUsuario"];
    }
    
    if($tipoUsuario==$tipoUsuarioSistema){

    echo "$factura;$codigoPrestador;$Tipo_Identificacion;$Numero_Identificacion;$Fecha;$Numero_Autorizacion;$CUP;$Ambito_Realizacion;$Finalidad_Procedimiento;$Personal_Atiende;$CIE10_1;$CIE10_2;$Complicacion;$Acto_Quirurgico;$Valor_Procedimiento" . "\n";

    $cantidadRegistros = $cantidadRegistros + 1;
    }
}

$fechaHoy = date("Y-m-d");

$QueryRipControl = mysqli_query($conn3, "SELECT count(ID) as cuantos,ID FROM  informacion_rips2 where 
    usuario_id='$doctor' and
    Fecha='$fechaHoy' and
    nombrePrestador='$NOMBRE_USUARIO' and
    codigoPrestador='$codigoPrestador' and
    TipoId='CC' and
    numeroId='$nit' and
    fechaRemision='$fechaRemision' and
    codArchivo='AP' and
    codigoEntidad='$entidadSalud';");
while ($rowListaZ = mysqli_fetch_array($QueryRipControl)) {
    $existe = $rowListaZ['cuantos'];
    $id_rips = $rowListaZ['ID'];
}

if ($existe == 0) {
    mysqli_query($conn3, "INSERT into informacion_rips2 
        (usuario_id, Fecha, nombrePrestador, codigoPrestador, TipoId, numeroId, fechaRemision, codArchivo, totalRegistros, codigoEntidad)
        values
        ('$doctor','$fechaHoy','$NOMBRE_USUARIO','$codigoPrestador','CC','$nit','$fechaRemision','AP','$cantidadRegistros','$entidadSalud');");
} elseif ($existe > 0) {
    mysqli_query($conn3, "UPDATE  informacion_rips2 set
    usuario_id='$doctor' ,
    Fecha='$fechaHoy' ,
    nombrePrestador='$NOMBRE_USUARIO' ,
    codigoPrestador='$codigoPrestador' ,
    TipoId='CC' ,
    numeroId='$nit' ,
    fechaRemision='$fechaRemision' ,
    codArchivo='AP' ,
    totalRegistros='$cantidadRegistros' ,
    codigoEntidad='$entidadSalud'
    where ID='$id_rips';");
}
?>