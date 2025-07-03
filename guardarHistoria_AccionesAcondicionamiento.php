<?php
  include 'funciones/funciones.php';
  include 'funciones/funcionesUtilidades.php';

        

        $ID                    = $_POST['ID'];          
        $clienteId            = $_POST['clienteId'];          
        
        // datos de fecha y hora
        $fechar                = date("Y-m-d");
        $Afechar               = date("Y-m-d H:i:s");
        $hora                  = date("H:i:s");


      
  
        $nume=reem($_POST['num']);
        $tema=reem($_POST['tema']);
        $objetivo=reem($_POST['objetivo']);
        $participacion=reem($_POST['participacion']);
        $desarrollo=reem($_POST['desarrollo']);
        $desempeno=reem($_POST['desempeño']);
        $reflexiones=reem($_POST['reflexiones']);


        $nume1=reem($_POST['num1']);
        $tema1=reem($_POST['tema1']);
        $objetivo1=reem($_POST['objetivo1']);
        $desarrollo1=reem($_POST['desarrollo1']);
        $reflexiones1=reem($_POST['reflexiones1']);

 
   


      mysqli_query($conn3,"INSERT INTO historiaacondicionamiento 
(cliente_id, usuario_id, Fecha,     Hora,    numero, tema, objetivo, participacion,  desarrollo, desempeno, reflexiones,numeduc,temaeduc,objetivoeduc,desarrolloeduc,reflexioneseduc) VALUES 
('$clienteId', '$ID',    '$fechar', '$hora',' $nume','$tema','$objetivo','$participacion','$desarrollo','$desempeno','$reflexiones',
  '$nume1', '$tema1','$objetivo1','$desarrollo1','$reflexiones1');");



 
echo "INSERT INTO historiaacondicionamiento 
(cliente_id, usuario_id, Fecha,     Hora,    numero, tema, objetivo, participacion,  desarrollo, desempeno, reflexiones,numeduc,temaeduc,objetivoeduc,desarrolloeduc,reflexioneseduc) VALUES 
('$clienteId', '$ID',    '$fechar', '$hora',' $nume','$tema','$objetivo','$participacion','$desarrollo','$desempeno','$reflexiones','$nume1'
,'$tema1','$objetivo1','$desarrollo1','$reflexiones1');";
 









              $queryListhc=mysqli_query($conn3,"SELECT MAX(id) as historia from historiaacondicionamiento ");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $historiaClinica1=$rowhc['historia'];
              }   
 





echo '<br> ----------------------- >>>>> '.$historiaClinica1;



echo "<script language='Javascript'> window.location='finalizar_AccionesAcondicionamiento.php?historiaClinica1=$historiaClinica1';</script>";  



?>