<?php
date_default_timezone_set('America/Bogota');
include("funciones/funciones.php");
include("funciones/conn3.php");

        
 
      
        $tipo           = $_GET['tipo'];   
                      
        $empresa          = $_GET['empresa'];                        
      

mysqli_query($conn3,"UPDATE v_clienteE SET activa ='$tipo' WHERE id = '$empresa'");


//echo "UPDATE citas SET estado= '$tipo' WHERE idCitas = '$citas'";
 
  
echo "<script language='Javascript'> window.location='empresa';</script>"; 


 
                
  
                                                                     
   
?>