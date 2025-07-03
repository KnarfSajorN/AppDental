<?php
date_default_timezone_set('America/Bogota');
include("conexiones/conexion.php");
include("funciones/conexiones.php");
include("funciones/funciones.php");

$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));


            ///datos del cliente y usuario
   
    
        $id              = $_GET['id'];
        $cliente              = $_GET['cliente'];
     



 
                //insetamos el usuario
                   $queryinv=mysqli_query($conn3,"DELETE FROM sdetalleoperpenditesexamen WHERE   id = $id");
   
              
              
              
               
              
              
                                                                           
                   echo "<script language='Javascript'> window.location='ordenLaboratorio.php?clienteId=".$cliente."';</script>"; 
   //     }

?>