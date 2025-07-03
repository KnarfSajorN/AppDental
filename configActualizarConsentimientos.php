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
        $idConsentimiento=$_POST['idConsentimiento'];
       
       

  
      mysqli_query($conn3,"update configConsentimientos set consentimiento = '$consentimiento', nombre = '$nombre', firma= '$firma' where id = $idConsentimiento;");
 
 //echo "INSERT INTO configConsentimientos (fecha, hora, usuario, consentimiento, nombre, firma) VALUES         ('$fecha', '$hora', '$usuario', '$consentimiento', '$nombre', '$firma');"; 

 echo "<script language='Javascript'> window.location='configConsentimientos.php?men=2';</script>";  



?>