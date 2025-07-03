<?php
  include 'funciones/funciones.php';
  include 'funciones/funcionesUtilidades.php';
  


   
        

        $id                    = $_GET['id'];          
        
         
              $queryListhc=mysqli_query($conn3,"SELECT * from configDocumentos where id =   $id");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $id=$rowhc['id'];
                $nombre=$rowhc['nombre'];
               
                $consentimiento=$rowhc['consentimiento'];
                
               }

echo $consentimiento;

?>