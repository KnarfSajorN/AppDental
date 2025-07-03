<?php

header('Content-Type: application/vnd.ms-excel; charset=UTF-8');
header('Content-Disposition: attachment; filename=RipsCT.xls');
include 'funciones/conn3.php';

$desde = $_POST['desde'];
// $hasta = $_POST['hasta'];
$entidadSalud1 = $_POST['entidadSalud']; 
$entidadSalud1 = "PARTICULAR";
   

 echo '<table border="1" cellpadding="2" cellspacing="0" width="100%">
    <tr>
        <td>Código del prestador de servicios de salud</td>
        <td>Fecha de remision</td>
        <td>Codigo del archivo </td>
        <td>Total de registros </td>
    </tr>';


$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));
        // $queryLista=mysqli_query($conn3,"SELECT * FROM    informacion_rips2 where fechaRemision BETWEEN '$desde' and '$hasta' and codigoEntidad='$entidadSalud1' ")
$queryLista=mysqli_query($conn3,"SELECT * FROM    informacion_rips2 where fechaRemision like '$desde' and codigoEntidad='$entidadSalud1' ");
        $nrow=mysqli_num_rows($queryLista);
        while($rowLista=mysqli_fetch_array($queryLista))
        {
            $codigoPrestador=$rowLista['codigoPrestador'];

            $fechaRemision =$rowLista['fechaRemision'];
            $codArchivo =$rowLista['codArchivo'];
            $totalRegistros=$rowLista['totalRegistros'];
           
         
     
echo "  <tr>
        <td>$codigoPrestador </td>
        <td>$fechaRemision </td>
        <td>$codArchivo  </td>
        <td> $totalRegistros</td>
        </tr>";
         

}






echo "</table>";
 
?>