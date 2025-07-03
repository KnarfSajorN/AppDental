<?php
date_default_timezone_set('America/Bogota');
include("conexiones/conexion.php");
include("funciones/conexiones.php");
include("funciones/funciones.php");

$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));


            ///datos del cliente y usuario
   
    
        $id              = $_GET['id'];
       
      $queryinv=mysqli_query($conn3,"SELECT * FROM  sDetalleOperPendites where   id = $id");

$nrowl=mysqli_num_rows($queryinv);
while($rowinv=mysqli_fetch_array($queryinv))
{

$id_cliente         =$rowinv['id_cliente'];
 

}


 
                //insetamos el usuario
                   $queryinv=mysqli_query($conn3,"delete from sDetalleOperPendites where   id = $id");
   
              
              
              
               
              
              
                                                                           
                   echo "<script language='Javascript'> window.location='SgenerarPresupuesto.php?clienteId=$id_cliente';</script>"; 
   //     }

?>