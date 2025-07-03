<?php
  include 'funciones/funciones.php';
  include 'funciones/funcionesUtilidades.php';
  


  include 'configFunciones.php';
 
        

        $ID                    = $_POST['ID'];          
        $clienteId            = $_POST['clienteId'];          
        
        // datos de fecha y hora
        $fechar                = date("Y-m-d");
        $Afechar               = date("Y-m-d H:i:s");
        $hora                  = date("H:i:s");


      
  
        $accion=reem($_POST['accion']);
        $metodo=reem($_POST['metodo']);
        $formu=reem($_POST['formu']);
        $menu=reem($_POST['menu']);
        $boton=reem($_POST['boton']);
        $tipoB=reem($_POST['tipoB']);
        $claseB=reem($_POST['claseB']);
        $Titulo=reem($_POST['Titulo']);
        $Nombre=reem($_POST['Nombre']);
        $method=reem($_POST['method']);
        $name=reem($_POST['name']);

       

$Nombre_name = reemConfig($name);
$Nombre_name = strtolower($Nombre_name);


      mysqli_query($conn3,"INSERT INTO configPaginas 
( fecha,     hora,   titulo,    nombre,       name)
 VALUES 
('$fechar', '$hora','$Titulo', '$Nombre', 'POST');");





              $queryListhc=mysqli_query($conn3,"SELECT MAX(id) as Paginas from configPaginas ");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $Tablas=$rowhc['configTablas'];
              }   
 





echo '<br> ----------------------- >>>>> '.$historiaClinica1;



//echo "<script language='Javascript'> window.location='finalizar_AccionesAcondicionamiento.php?historiaClinica1=$historiaClinica1';</script>";  



?>