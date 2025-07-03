<?php
  include 'funciones/funciones.php';
  include 'funciones/funcionesUtilidades.php';
  


  include 'configFunciones.php';
 
        

        $usuario                    = $_POST['usuario'];          
       
        $fecha                = date("Y-m-d");
        
        $hora                  = date("H:i:s");


      
  
        $consentimiento=reem($_POST['consentimiento']);
        $nombre=reem($_POST['titulo']);
        $firma=$_POST['firma'];
       
       

  
      mysqli_query($conn3,"INSERT INTO configDocumentos(fecha, hora, usuario, consentimiento, nombre, firma) VALUES 
        ('$fecha', '$hora', '$usuario', '$consentimiento', '$nombre', '$firma');");
 
 //echo "INSERT INTO configDocumentos(fecha, hora, usuario, consentimiento, nombre, firma) VALUES         ('$fecha', '$hora', '$usuario', '$consentimiento', '$nombre', '$firma');"; 

 echo "<script language='Javascript'> window.location='configDocumentos.php?men=1';</script>";  



?>