<?php

header('Content-Type: application/vnd.ms-excel; charset=UTF-8');
header('Content-Disposition: attachment; filename=RipsAF.xls');
include 'funciones/conn3.php';

$desde = $_POST['desde'];
$hasta = $_POST['hasta'];

//desde y hasta con el formato d/m/a


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
    //quitar espacios al final
    $NOMBRE_USUARIO = trim($NOMBRE_USUARIO, " ");
    $codigoPrestador = $rowListaU['codigoPrestador'];

    $nit=$rowListaU['nit'];
    $factura=$rowListaU['factura'];

}

$cod_entidad  = 'SDS001';
$entidadSalud ='PARTICULAR';

echo '<table border="1" cellpadding="2" cellspacing="0" width="100%">
    <tr>
        <td>Código del prestador de servicios de salud</td>
        <td>Razon social o apellidos y nombre del prestador de servicios de salud</td>
        <td>Tipo de identificacion del prestador de servicios de salud </td>
        <td>Numero de identificacion del prestador </td>
        <td>Numero de la factura</td>
        <td>Fecha de expedicion de la factura</td>
        <td>Fecha de inicio </td>
        <td>Fecha final </td>
        <td>Codigo entidad administradora</td>
        <td>Nombre entidad administradora</td>
        <td>Numero del contrato</td>
        <td>Plan de beneficios</td>
        <td>Numero de la poliza</td>
        <td>Valor total del pago compartido(copago)</td>
        <td>Valor de la comision</td>
        <td>Valor total de descuentos</td>
        <td>Valor neto a pagar por la entidad contratante</td>
    </tr>';
    /*
if($entidadSalud==0){
   $queryListaH = mysqli_query($conn3, "SELECT * FROM Rips_Informacion where fecha BETWEEN '$desde' and '$hasta'"); 
}
else {
    $queryListaH = mysqli_query($conn3, "SELECT * FROM Rips_Informacion where (fecha BETWEEN '$desde' and '$hasta') AND entidad_id=$entidadSalud"); 
}
*/

if ($doctor == 0) {
    $queryListaH = mysqli_query($conn3, "SELECT * FROM Rips_Informacion where fecha BETWEEN '$desde' and '$hasta'");
}
else {
    $queryListaH = mysqli_query($conn3, "SELECT * FROM Rips_Informacion where (fecha BETWEEN '$desde' and '$hasta') AND usuario_id=$doctor");
}

$desde = date("d/m/Y", strtotime($desde));
$hasta = date("d/m/Y", strtotime($hasta));
$fechaRemision1 = date("d/m/Y", strtotime($fechaRemision));

$nrow = mysqli_num_rows($queryListaH);
while ($rowListaH = mysqli_fetch_array($queryListaH)){
    $Numero_Factura = $rowListaH["Numero_Factura"];
    $Fecha_Expedicion_Factura = $rowListaH["Fecha_Expedicion_Factura"];


    $Codigo_Entidad_Administradora = $rowListaH["Codigo_Entidad_Administradora"];
    $Nombre_Entidad_Administradora = $rowListaH["Nombre_Entidad_Administradora"];
    $Numero_Contrato = $rowListaH["Numero_Contrato"];
    $Plan_Beneficios = $rowListaH["Plan_Beneficios"];
    $Numero_Poliza = $rowListaH["Numero_Poliza"];
    $Copago = $rowListaH["Copago"];
    $Valor_Comision = $rowListaH["Valor_Comision"];
    $Valor_Descuentos = $rowListaH["Valor_Descuentos"];
    $Valor_Pago_Entidad = $rowListaH["Valor_Pago_Entidad"];

    $cliente_id = $rowListaH["cliente_id"];
    $queryListaCliente = mysqli_query($conn3, "SELECT * FROM cliente where cliente_id = '$cliente_id'");
    while ($rowListaC = mysqli_fetch_array($queryListaCliente)){
        $tipoUsuarioSistema = $rowListaC["tipoUsuario"];
    }
    //solo reportar si es particular
    if($tipoUsuario==$tipoUsuarioSistema){
    echo "  <tr>
        <td>$codigoPrestador </td>
        <td>$NOMBRE_USUARIO </td>
        <td>CC</td>
        <td>$nit</td>
        <td>$factura</td>
        <td>$fechaRemision1</td>
        <td>$desde</td>
        <td>$hasta</td>
        <td>$cod_entidad </td>
        <td>$entidadSalud </td>
        <td></td>
        <td></td>
        <td></td>
        <td>0.00</td>
        <td>0.00</td>
        <td>0.00</td>
        <td>0.0000</td>
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
    codArchivo='AF' and
    codigoEntidad='$entidadSalud';");
while ($rowListaZ = mysqli_fetch_array($QueryRipControl)) {
    $existe = $rowListaZ['cuantos'];
    $id_rips = $rowListaZ['ID'];
}

if ($existe == 0) {
    mysqli_query($conn3, "INSERT into informacion_rips2 
        (usuario_id, Fecha, nombrePrestador, codigoPrestador, TipoId, numeroId, fechaRemision, codArchivo, totalRegistros, codigoEntidad)
        values
        ('$doctor','$fechaHoy','$NOMBRE_USUARIO','$codigoPrestador','CC','$nit','$fechaRemision','AF','$cantidadRegistros','$entidadSalud');");

} elseif ($existe > 0) {
    mysqli_query($conn3, "UPDATE  informacion_rips2 set
    usuario_id='$doctor' ,
    Fecha='$fechaHoy' ,
    nombrePrestador='$NOMBRE_USUARIO' ,
    codigoPrestador='$codigoPrestador' ,
    TipoId='CC' ,
    numeroId='$nit' ,
    fechaRemision='$fechaRemision' ,
    codArchivo='AF' ,
    totalRegistros='$cantidadRegistros' ,
    codigoEntidad='$entidadSalud'
    where ID='$id_rips';");
}
?>