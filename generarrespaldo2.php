<?php
header('Content-type: application/vnd.ms-excel;charset=iso-8859-15');
header('Content-Disposition: attachment; filename=basededatoshistorias.xls');
include 'funciones/conn3.php';

$usuarioId = $_POST['usuarioId'];
   

 echo '<table border="1" cellpadding="2" cellspacing="0" width="100%">
    <caption>base de datos de clientes</caption>
    <tr>
        
        <td>Paciente id</td>
        <td>Nombre paciente</td>
        <td>Fecha</td>
        <td>Hora </td>
        <td>Motivo consulta </td>
        <td>Diagnostico </td>
        <td>Tratamiento </td>
        <td>Notas </td>
        
    </tr>';

 // and fechaAprobado BETWEEN '$desde' AND '$hasta'
        $queryList=mysqli_query($conn3,"SELECT * FROM  historiaClinica1 where usuario_id=$usuarioId");
        $nrowl=mysqli_num_rows($queryList);
        while($rowMotorizado=mysqli_fetch_array($queryList))
        {
            $cliente_id=$rowMotorizado['cliente_id'];
            $Fecha=$rowMotorizado['Fecha'];
            $Hora=$rowMotorizado['Hora'];
            $motivoConsulta=$rowMotorizado['motivoConsulta'];
            $diagnostico=$rowMotorizado['diagnostico'];
            $tratamiento=$rowMotorizado['tratamiento'];
            $notas=$rowMotorizado['notas'];
             
            

        $queryListc=mysqli_query($conn3,"SELECT * FROM  cliente where cliente_id=$cliente_id");
        $nrowl=mysqli_num_rows($queryListc);
        while($rowc=mysqli_fetch_array($queryListc))
        {
            $nombre_cliente     =$rowc['nombre_cliente'];
            $CODI_CLIENTE       =$rowc['CODI_CLIENTE'];

        }     
            




         
     
echo "<tr>
         
        <td>$CODI_CLIENTE</td>
        <td>$nombre_cliente</td>
        <td>$Fecha</td>
        <td>$Hora </td>
        <td>$motivoConsulta </td>
        <td>$diagnostico </td>
        <td>$tratamiento </td>
        <td>$notas </td>
        
    </tr>";
         

     

}

echo "</table>";
 
?>