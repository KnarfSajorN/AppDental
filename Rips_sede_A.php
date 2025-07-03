<?php

header('Content-Type: application/vnd.ms-excel; charset=UTF-8');
header('Content-Disposition: attachment; filename=RipsAC.xls');
include 'funciones/conn3.php';

$desde = $_POST['desde'];
$hasta = $_POST['hasta'];

$entidadSalud1 = $_POST['entidadSalud'];
$fechaRemision = $_POST['fechaRemision'];

$cantidadRegistros=0;
$fechaHoy=date("Y-m-d");
// consulta para datos de usuario rips
$queryU=mysqli_query($conn3,"SELECT * FROM usuarios where ID=1");
$nrowU=mysqli_num_rows($queryU);
while($rowListaU=mysqli_fetch_array($queryU))
{
    $NOMBRE_USUARIO=$rowListaU['NOMBRE_USUARIO'];
    $codigoPrestador=$rowListaU['codigoPrestador'];
    $nit=$rowListaU['nit'];
}


   

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



//         $queryLista_1=mysqli_query($conn3,"SELECT * FROM  cliente  where cod_entidad= '$entidadSalud'");
     
  
//         $nrow_l=mysqli_num_rows($queryLista_1);
//         while($rowLista_1=mysqli_fetch_array($queryLista_1))
//         {
//             $cedula = $rowLista_1['CODI_CLIENTE'];
//             $tipo_cliente = $rowLista_1['tipo_cliente'];
//             $cod_entidad=$rowLista_1['cod_entidad'];
//             $entidadSalud=$rowLista_1['entidadSalud'];
//             $cliente=$rowLista_1['cliente_id'];
       


// $conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));
//         $queryListaH=mysqli_query($conn3,"SELECT * FROM    historiaClinica1 where fecha BETWEEN '$desde' and '$hasta' and cliente_id='$cliente'");


    
//         $nrow=mysqli_num_rows($queryListaH);
//         while($rowListaH=mysqli_fetch_array($queryListaH))
//         {

// $ID_HISTORIA=$rowListaH['ID'];
// $id_cliente=$rowListaH['cliente_id'];
// $fecha=$rowListaH['Fecha'];
// $codigoConsulta =$rowListaH['codigoConsulta'];

// }

// $conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));
//         $queryListaf=mysqli_query($conn3,"SELECT * FROM sOperacionInv where id_historia= '$ID_HISTORIA'");
//         $nrow=mysqli_num_rows($queryListaf);
//         while($rowListaf=mysqli_fetch_array($queryListaf))
//         {
//             $numeroDoc=$rowListaf['numeroDoc'];
//             $fechaOperacion=$rowListaf['fechaOperacion'];


//  }


// $conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));
//         $queryLista=mysqli_query($conn3,"SELECT * FROM    informacion_rips where id_historia = '$ID_HISTORIA' ");
//         $nrow=mysqli_num_rows($queryLista);
//         while($rowLista=mysqli_fetch_array($queryLista))
//         {
            
            
//             $numero_autorizacion=$rowLista['numero_autorizacion'];
//             $CUPS=$rowLista['CUPS'];
//             $finalidad_consulta=$rowLista['finalidad_consulta'];
//             $causa_externa=$rowLista['causa_externa'];
//             $cie10_1=$rowLista['cie10_1'];
//             $cie10_2=$rowLista['cie10_2'];
//             $cie10_3=$rowLista['cie10_3'];
//             $cie10_4=$rowLista['cie10_4'];
//             $tipo_diagnostico_principal=$rowLista['tipo_diagnostico_principal'];
//             $valor_consulta=$rowLista['valor_consulta'];
//             $valor_cuota_moderadora=$rowLista['valor_cuota_moderadora'];
//             $valor_neto_pagar=$rowLista['valor_neto_pagar'];
// }

    $queryLista_1=mysqli_query($conn3,"SELECT * FROM  cliente  where cod_entidad= '$entidadSalud1'");


$nrow_l=mysqli_num_rows($queryLista_1);
while($rowLista_1=mysqli_fetch_array($queryLista_1))
{
    $cedula = $rowLista_1['CODI_CLIENTE'];
    $tipo_cliente = $rowLista_1['tipo_cliente'];
    $cod_entidad=$rowLista_1['cod_entidad'];
    $entidadSalud=$rowLista_1['entidadSalud'];
    $cliente=$rowLista_1['cliente_id'];


    $queryListaH=mysqli_query($conn3,"SELECT hc1.ID,hc1.cliente_id,hc1.Fecha,hc1.codigoConsulta,
        irips.numero_autorizacion,irips.CUPS,irips.finalidad_consulta,irips.causa_externa,irips.cie10_1,irips.cie10_2,irips.cie10_3,
        irips.cie10_4,irips.tipo_diagnostico_principal,irips.valor_consulta,irips.valor_cuota_moderadora,irips.valor_neto_pagar,
        soi.numeroDoc,soi.fechaOperacion
        FROM historiaClinica1 hc1 
        left join sOperacionInv soi on hc1.ID=soi.id_historia
        left join informacion_rips irips on hc1.ID=irips.id_historia
        where hc1.fecha BETWEEN '$desde' and '$hasta' 
        and hc1.cliente_id='$cliente'
        ;");
    
    $nrow=mysqli_num_rows($queryListaH);
    while($rowListaH=mysqli_fetch_array($queryListaH))
    {
        $ID=$rowListaH['ID'];
        $cliente_id=$rowListaH['cliente_id'];
        $Fecha=$rowListaH['Fecha'];
        $codigoConsulta=$rowListaH['codigoConsulta'];
        $numero_autorizacion=$rowListaH['numero_autorizacion'];
        $CUPS=$rowListaH['CUPS'];
        $finalidad_consulta=$rowListaH['finalidad_consulta'];
        $causa_externa=$rowListaH['causa_externa'];
        $cie10_1=$rowListaH['cie10_1'];
        $cie10_2=$rowListaH['cie10_2'];
        $cie10_3=$rowListaH['cie10_3'];
        $cie10_4=$rowListaH['cie10_4'];
        $tipo_diagnostico_principal=$rowListaH['tipo_diagnostico_principal'];
        $valor_consulta=$rowListaH['valor_consulta'];
        $valor_cuota_moderadora=$rowListaH['valor_cuota_moderadora'];
        $valor_neto_pagar=$rowListaH['valor_neto_pagar'];
        $numeroDoc=$rowListaH['numeroDoc'];
        $fechaOperacion=$rowListaH['fechaOperacion'];
        
        $cantidadRegistros=$cantidadRegistros+1;
        

         
     
echo "  <tr>
        <td>$numeroDoc </td>
        <td>$cod_entidad </td>
        <td>$tipo_cliente </td>
        <td>$cedula </td>
        <td>$fecha </td>
        <td>$numero_autorizacion </td>
        <td> $codigoConsulta</td>
        <td>$finalidad_consulta </td>
        <td>$causa_externa </td>
        <td>$cie10_1 </td>
        <td>$cie10_2 </td>
        <td>$cie10_3</td>
        <td>$cie10_4</td>
        <td>$tipo_diagnostico_principal</td>
        <td> $valor_consulta</td>
        <td>$valor_cuota_moderadora </td>
        <td>$valor_neto_pagar </td>
        </tr>";
        }
         

      






}






echo "</table>";


// como el php se ejecita dos veces insertamos u verificamos nuevamente
$existe=0;

$queryZ=mysqli_query($conn3,"SELECT count(ID) as cuantos,ID FROM  informacion_rips2 where 
    usuario_id='1' and
    Fecha='$fechaHoy' and
    nombrePrestador='$NOMBRE_USUARIO' and
    codigoPrestador='$codigoPrestador' and
    TipoId='CC' and
    numeroId='$nit' and
    fechaRemision='$fechaRemision' and
    codArchivo='AC' and
    codigoEntidad='$entidadSalud1';");
$nrowZ=mysqli_num_rows($queryZ);
while($rowListaZ=mysqli_fetch_array($queryZ))
{
    $existe=$rowListaZ['cuantos'];
    $id_rips=$rowListaZ['ID'];
}
if ($existe==0) {
    mysqli_query($conn3,"INSERT into informacion_rips2 
        (usuario_id, Fecha, nombrePrestador, codigoPrestador, TipoId, numeroId, fechaRemision, codArchivo, totalRegistros, codigoEntidad)
        values
        ('1','$fechaHoy','$NOMBRE_USUARIO','$codigoPrestador','CC','$nit','$fechaRemision','AC','$cantidadRegistros','$entidadSalud1');");   
}elseif ($existe>0) {
    mysqli_query($conn3,"UPDATE  informacion_rips2 set
    usuario_id='1' ,
    Fecha='$fechaHoy' ,
    nombrePrestador='$NOMBRE_USUARIO' ,
    codigoPrestador='$codigoPrestador' ,
    TipoId='CC' ,
    numeroId='$nit' ,
    fechaRemision='$fechaRemision' ,
    codArchivo='AC' ,
    totalRegistros='$cantidadRegistros' ,
    codigoEntidad='$entidadSalud1'
    where ID='$id_rips';");
}
 
?>