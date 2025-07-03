<?php

header('Content-Type: application/vnd.ms-excel; charset=UTF-8');
header('Content-Disposition: attachment; filename=RipsAC.xls');
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
    //$factura= $factura1+1;
    $mes=$rowListaU['mes'];
}
//sacar el mes de la fecha hasta
$mesHasta=explode("-",$hasta);
$mesactual=$mesHasta[1];

if($mesactual==$mes){$factura=$factura;} else {$factura=$factura+1;}

echo '<table border="1" cellpadding="2" cellspacing="0" width="100%">
    <tr>
        <td>Numero de la factura</td>
        <td>Codigo del prestador de servicios de salud</td>
        <td>Tipo de identificacion del usuario</td>
        <td>Numero de identificacion del usuario en el sistema</td>
        <td>Fecha de la consulta</td>
        <td>Numero de autorizacion</td>
        <td>Codigo de la consulta</td>
        <td>Finalidad de la consulta</td>
        <td>Causa externa</td>
        <td>Codigo del diagnostico principal</td>
        <td>Codigo del diagnostico relacionado No. 1</td>
        <td>Codigo del diagnostico relacionado No. 2</td>
        <td>Codigo del diagnostico relacionado No. 3</td>
        <td>Tipo de diagnostico principal</td>
        <td>Valor de la consulta</td>
        <td>Valor de la cuota moderadora</td>
        <td>Valor neto a pagar</td>
    </tr>';
/*
if ($entidadSalud == 0) {
    $queryListaH = mysqli_query($conn3, "SELECT * FROM Rips_Informacion where fecha BETWEEN '$desde' and '$hasta'  and Nombre_Historia ='Historia_Clinica'");
}
*/


if ($doctor == 0) {
    $queryListaH = mysqli_query($conn3, "SELECT * FROM Rips_Informacion where fecha BETWEEN '$desde' and '$hasta'");
}
else {
    $queryListaH = mysqli_query($conn3, "SELECT * FROM Rips_Informacion where (fecha BETWEEN '$desde' and '$hasta') AND usuario_id=$doctor");
}

$entidadSalud="PARTICULAR";
/* else {
    $queryListaH = mysqli_query($conn3, "SELECT * FROM Rips_Informacion where (fecha BETWEEN '$desde' and '$hasta') AND entidad_id=$entidadSalud");
}*/

$nrow = mysqli_num_rows($queryListaH);
while ($rowListaH = mysqli_fetch_array($queryListaH)) {
    $Numero_Factura = $rowListaH["Numero_Factura"];
    
    $Tipo_Identificacion = $rowListaH["Tipo_Identificacion"];
    $Numero_Identificacion = $rowListaH["Numero_Identificacion"];

    $Fecha = $rowListaH["Fecha"];
    $FechaX = explode(" ", $Fecha);
    $Fecha = $FechaX[0];
    $Numero_Autorizacion = $rowListaH["Numero_Autorizacion"];
    $Tipo_Consulta = $rowListaH["Tipo_Consulta"];
    //quitarle los puntos a $Tipo_Consulta
    $Tipo_Consulta = str_replace(".", "", $Tipo_Consulta);
    $Finalidad_Consulta = $rowListaH["Finalidad_Consulta"];
    $Causa_Externa = $rowListaH["Causa_Externa"];
    $CIE10_1 = $rowListaH["CIE10_1"];
    $CIE10_2 = $rowListaH["CIE10_2"];
    $CIE10_3 = $rowListaH["CIE10_3"];
    $CIE10_4 = $rowListaH["CIE10_4"];
    $Tipo_Diagnostico = $rowListaH["Tipo_Diagnostico"];
    ////// campos cuando facturan rips
    $Valor_Consulta = $rowListaH["Valor_Consulta"];
    $Valor_Cuota_Moderadora = $rowListaH["Valor_Cuota_Moderadora"];
    $Valor_Neto = $rowListaH["Valor_Neto"];

    $cliente_id = $rowListaH["cliente_id"];
    $queryListaCliente = mysqli_query($conn3, "SELECT * FROM cliente where cliente_id = '$cliente_id'");
    while ($rowListaC = mysqli_fetch_array($queryListaCliente)){
        $tipoUsuarioSistema = $rowListaC["tipoUsuario"];
    }
    
    if($tipoUsuario==$tipoUsuarioSistema){

    echo "  <tr>
        <td>$factura </td>
        <td>$codigoPrestador </td>
        <td>$Tipo_Identificacion</td>
        <td>$Numero_Identificacion </td>
        <td>$Fecha </td>
        <td>$Numero_Autorizacion</td>
        <td>$Tipo_Consulta</td>
        <td>$Finalidad_Consulta </td>
        <td>$Causa_Externa </td>
        <td>$CIE10_1 </td>
        <td>$CIE10_2 </td>
        <td>$CIE10_3 </td>
        <td>$CIE10_4 </td>
        <td>$Tipo_Diagnostico </td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        </tr>";

    $cantidadRegistros = $cantidadRegistros + 1;
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
    codArchivo='AC' and
    codigoEntidad='$entidadSalud';");
while ($rowListaZ = mysqli_fetch_array($QueryRipControl)) {
    $existe = $rowListaZ['cuantos'];
    $id_rips = $rowListaZ['ID'];
}

if ($existe == 0) {
    mysqli_query($conn3, "INSERT into informacion_rips2 
        (usuario_id, Fecha, nombrePrestador, codigoPrestador, TipoId, numeroId, fechaRemision, codArchivo, totalRegistros, codigoEntidad)
        values
        ('$doctor','$fechaHoy','$NOMBRE_USUARIO','$codigoPrestador','CC','$nit','$fechaRemision','AC','$cantidadRegistros','$entidadSalud');");

mysqli_query($conn3, "UPDATE  usuarios set
factura='$factura', mes ='$mesactual'  where  ID='$doctor'  ");

} elseif ($existe > 0) {
    mysqli_query($conn3, "UPDATE  informacion_rips2 set
    usuario_id='$doctor' ,
    Fecha='$fechaHoy' ,
    nombrePrestador='$NOMBRE_USUARIO' ,
    codigoPrestador='$codigoPrestador' ,
    TipoId='CC' ,
    numeroId='$nit' ,
    fechaRemision='$fechaRemision' ,
    codArchivo='AC' ,
    totalRegistros='$cantidadRegistros' ,
    codigoEntidad='$entidadSalud'
    where ID='$id_rips';");
}
?>