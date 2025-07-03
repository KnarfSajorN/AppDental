<?php



include 'funciones/conn3.php';

$ID = $_SESSION['ID'];
 




                  $queryList=mysqli_query($conn3,"SELECT * FROM  citas  where (estado  = 1 or estado  = 2)   order by fecha asc ");
                //  $queryList=mysqli_query($conn3,"SELECT * FROM  citas");

                  $nrowl=mysqli_num_rows($queryList);

                  while($row_recordset32=mysqli_fetch_array($queryList))

                  { 
                       
                      $fecha= $row_recordset32['fecha'];
                      $Hora= $row_recordset32['Hora'];
                      $nombre= $row_recordset32['nombre'];
            
                      $motivoConsulta= $row_recordset32['motivoConsulta'];
                     
                      
                      echo '     
                      <tr>
                      <td width="20%" class="text-center"> |'.substr($fecha, 0,4).' </td>
                      <td width="20%" class="text-center"> |'.substr($fecha, 5,2).' </td>
                      <td width="20%" class="text-center"> |'.substr($fecha, 8,2).' </td>
                      <td width="20%" class="text-center"> |'.$fecha.' </td>
                      <td width="20%" class="text-center"> |'.substr($Hora, 0,2).'</td>
                      <td width="20%" class="text-center"> |'.substr($Hora, 3,2).'</td>
                      <td width="20%" class="text-center"> |'.$Hora.'</td>
                      <td width="15%" class="text-center"> |'.$nombre.'</td>
        
                      <td width="30%" class="text-center">'.$motivoConsulta.'</td> <br><br><br><br>';
                 }  

?>