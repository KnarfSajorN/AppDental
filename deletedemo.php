<?php
                     
include 'funciones/conn3.php';

$ID = 6;

$conn3 = mysqli_connect($server,$user,$pass,$dbname)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));

 mysqli_query($conn3,"delete from citas where usuario_id= $ID");
 mysqli_query($conn3,"delete from cliente where usuario_id= $ID");
 mysqli_query($conn3,"delete from historiaClinica1 where usuario_id= $ID");
 mysqli_query($conn3,"delete from sCuentasCobrar where idUsuario= $ID");
 mysqli_query($conn3,"delete from sDetalleOper where id_usuario= $ID");
 mysqli_query($conn3,"delete from support where usuario_id= $ID");
  
         
?>
