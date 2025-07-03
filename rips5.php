<?php
header('Content-type: application/vnd.ms-excel;charset=iso-8859-15');
header('Content-Disposition: attachment; filename=RipsFacturacion.xls');
include 'funciones/conn3.php';

$desde = $_POST['desde'];
$hasta = $_POST['hasta'];

   

 echo '<table border="1" cellpadding="2" cellspacing="0" width="100%">
   
    <tr>
        <td>Nombre entidad administradora</td>
        <td>Número del Contrato </td>
        <td>Plan de Beneficios</td>
        <td>Número de la póliza</td>
        <td>Valor total del pago compartido COPAGO</td>
        <td>Valor de la comisión</td>
        <td>Valor total de Descuentos</td>
        <td>Valor Neto a Pagar por la entidad Contratante</td>
        
    </tr>';



$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));
        $queryLista=mysqli_query($conn3,"SELECT * FROM    informacion_rips where    fecha BETWEEN '$desde' and '$hasta'");
        $nrow=mysqli_num_rows($queryLista);
        while($rowLista=mysqli_fetch_array($queryLista))
        {
            $id_cliente=$rowLista['id_cliente'];

            $numero_contrato=$rowLista['numero_contrato'];
            $plan_beneficios=$rowLista['plan_beneficios'];
            $numero_poliza=$rowLista['numero_poliza'];
            $valor_total_copago=$rowLista['valor_total_copago'];
            $valor_comision=$rowLista['valor_comision'];
            $valor_total_descuento=$rowLista['valor_total_descuento'];
            $valor_entidad_contratante=$rowLista['valor_entidad_contratante'];

          

         
     
echo "<tr>
        <td> </td>
        <td>$numero_contrato</td>
        <td>$plan_beneficios</td>
        <td>$numero_poliza</td>
        <td>$valor_total_copago</td>
        <td>$valor_comision</td>
        <td>$valor_total_descuento</td>
        <td>$valor_entidad_contratante</td>

 
    </tr>";
         

}






echo "</table>";
 
?>