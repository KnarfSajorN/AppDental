<?php

header('Content-Type: application/vnd.ms-excel; charset=utf-8');
header('Content-Disposition: attachment; filename=RipsConsultas.xls');
include 'funciones/conn3.php';

$desde = $_POST['desde'];
$hasta = $_POST['hasta'];

   

 echo '<table border="1" cellpadding="2" cellspacing="0" width="100%">
   
    <tr>
        
        <td>Numero de la factura</td>
        <td>Codigo del prestador de servicios de salud</td>
        <td>Tipo de Identificacion del Usuario</td>
        <td>Numero de identificacion del usuario en el sistema</td>
        <td>Fecha de la consulta</td>
        <td>Numero de autorizacion </td>
        <td>Codigo de procedimiento </td>
        <td>Finalidad del procedimiento </td>
        <td>Causa Externa </td>
        <td>Codigo diagnostico principal </td>
        <td>Codigo diagnostico Relacionado 1 </td>
        <td>Codigo diagnostico Relacionado 2 </td>
        <td>Codigo diagnostico Relacionado 3 </td>
        <td>Tipo de diagnostico principal</td>
        <td>Valor de la consulta</td>
        <td>Valor de la cuota moderadora</td>
        <td>Valor Neto a pagar</td>
        
    </tr>';

$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));
        $queryLista=mysqli_query($conn3,"SELECT * FROM    informacion_rips where fecha BETWEEN '$desde' and '$hasta'");
        $nrow=mysqli_num_rows($queryLista);
        while($rowLista=mysqli_fetch_array($queryLista))
        {
            $id_cliente=$rowLista['id_cliente'];

            $fecha=$rowLista['fecha'];
            $numero_autorizacion=$rowLista['numero_autorizacion'];
            $CUPS=$rowLista['CUPS'];
            $finalidad_consulta=$rowLista['finalidad_consulta'];
            $causa_externa=$rowLista['causa_externa'];
            $cie10_1=$rowLista['cie10_1'];
            $cie10_2=$rowLista['cie10_2'];
            $cie10_3=$rowLista['cie10_3'];
            $cie10_4=$rowLista['cie10_4'];
            $tipo_diagnostico_principal=$rowLista['tipo_diagnostico_principal'];
            $valor_consulta=$rowLista['valor_consulta'];
            $valor_cuota_moderadora=$rowLista['valor_cuota_moderadora'];
            $valor_neto_pagar=$rowLista['valor_neto_pagar'];

        $queryLista_1=mysqli_query($conn3,"SELECT * FROM  cliente  where cliente_id= $id_cliente");
        $nrow_l=mysqli_num_rows($queryLista_1);
        while($rowLista_1=mysqli_fetch_array($queryLista_1))
        {
            $cedula = $rowLista_1['CODI_CLIENTE'];
            $tipo_cliente = $rowLista_1['tipo_cliente'];;
        }      

         
     
echo "<tr>
        

        <td> </td>
        <td> </td>
        <td>$tipo_cliente</td>
        <td>$cedula </td>
        <td>$fecha</td>
        <td>$numero_autorizacion</td>
        <td>$CUPS</td>
        <td>$finalidad_consulta </td>
        <td>$causa_externa </td>
        <td>$cie10_1 </td>
        <td>$cie10_2 </td>
        <td>$cie10_3 </td>
        <td>$cie10_4 </td>
        <td>$tipo_diagnostico_principal </td>
        <td>$valor_consulta </td>
        <td>$valor_cuota_moderadora</td>
        <td>$valor_neto_pagar</td>

 
    </tr>";
         

}






echo "</table>";
 
?>