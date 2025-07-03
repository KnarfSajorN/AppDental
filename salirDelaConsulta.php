<?php
session_start();
include 'funciones/funciones.php';
$idCitas = $_GET['idCitas'];
 


        $query1=mysqli_query($conn3,"SELECT max(id) as idVideoP FROM  videos  where idCitas = 'paciente'");
                  $nrowl=mysqli_num_rows($query1);
                  while($row1=mysqli_fetch_array($query1))
                  {
                    $idVideoP      = $row1['idVideoP'];
                   
                  }    


        $query1=mysqli_query($conn3,"SELECT * from videos  where id = $idVideoP");
                  $nrowl=mysqli_num_rows($query1);
                  while($row1=mysqli_fetch_array($query1))
                  {
                    $nombreVp      = $row1['nombre'];
                   
                  }    


   $query2=mysqli_query($conn3,"SELECT max(id) as idVideoD FROM  videos  where idCitas = 'doctor'");
                  $nrowl=mysqli_num_rows($query2);
                  while($row2=mysqli_fetch_array($query2))
                  {
                    $idVideoD      = $row2['idVideoD'];
                  }    

        $query1=mysqli_query($conn3,"SELECT * from videos  where id = $idVideoD");
                  $nrowl=mysqli_num_rows($query1);
                  while($row1=mysqli_fetch_array($query1))
                  {
                    $nombreVd      = $row1['nombre'];
                   
                  }  

       $queryCita=mysqli_query($conn3,"SELECT * FROM  citas  where idCitas= $idCitas");
                  $nrowl=mysqli_num_rows($queryCita);
                  while($row_recordset32=mysqli_fetch_array($queryCita))
                  {
                      $clienteId= $row_recordset32['idCliente'];
                      $usuario_id= $row_recordset32['usuario_id'];
                  }

mysqli_query($conn3,"update citas set videoPaciente = '$nombreVp', videoDoctor = '$idVideoD', estadoVideo = 2 where idCitas= $idCitas");

mysqli_query($conn3,"update videos set idCLiente = '$clienteId'  where id = $idVideoP");
mysqli_query($conn3,"update videos set idUsuario = '$usuario_id'  where id = $idVideoD");



 echo "<script language='Javascript'> window.location='portada.php';</script>"; 



?>