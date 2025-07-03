<?php
header('Content-Type: application/vnd.ms-excel; charset=utf-8');
header('Content-Disposition: attachment; filename=RipsProcedimientos.xls');
include 'funciones/conn3.php';

$desde = $_POST['desde'];
$hasta = $_POST['hasta'];

   

 echo '<table border="1" cellpadding="2" cellspacing="0" width="100%">
   
    <tr>
        
        <td>Numero de factura</td>
        <td>Código del prestador de servicios de salud</td>
        <td>Tipo de Identificación del Usuario</td>
        <td>Número de identificación del usuario en el sistema</td>
        <td>Fecha del procedimiento</td>
        <td>Número de Autorización</td>
        <td>Código del procedimiento</td>
        <td>Ambito de realización del procedimiento</td>
        <td>Finalidad del procedimiento</td>
        <td>Personal que atiende</td>
        <td>Diagnóstico principal </td>
        <td>Código del diagnóstico de la Complicación</td>
        <td>Forma de realización del acto quirúrgico</td>
        <td>Valor del Procedimiento</td>

       
        
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
            $ambito_procedimiento=$rowLista['ambito_procedimiento'];
            $finalidad_procedimiento=$rowLista['finalidad_procedimiento'];
            $personal_atiende=$rowLista['personal_atiende'];
            $cie10_1=$rowLista['cie10_1'];
            $cie10_complicacion=$rowLista['cie10_complicacion'];
            $realizacion_quirurgico=$rowLista['realizacion_quirurgico'];
            $valor_procedimiento=$rowLista['valor_procedimiento'];


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
        <td>$cedula</td>
        <td>$fecha</td>
        <td>$numero_autorizacion</td>
        <td>$CUPS</td>
        <td>$ambito_procedimiento </td>
        <td>$finalidad_procedimiento </td>
        <td>$personal_atiende </td>
        <td>$cie10_1 </td>
        <td>$cie10_complicacion </td>
        <td>$realizacion_quirurgico </td>
        <td>$valor_procedimiento </td>


 
    </tr>";
         

}






echo "</table>";
 
?>