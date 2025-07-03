<?php
  include 'funciones/funciones.php';
   include 'funciones/funcionesUtilidades.php';



        
 
        $nombre_prestador_servicios_ct               = $_POST['nombre_prestador_servicios_ct'];      
        $codigo_prestador_servicios_ct               = $_POST['codigo_prestador_servicios_ct'];    
        $tipo_id_principal        = $_POST['tipo_id_principal']; 
        $numeroId     = $_POST['numeroId'];
        $fecha_remision_ct     = $_POST['fecha_remision_ct'];
        $codigo_archivo_ct     = $_POST['codigo_archivo_ct'];
        $totalRegistros     = $_POST['totalRegistros'];

        $ID                    = $_POST['ID'];          
               
       
        $fechar                = date("Y-m-d");
        
        $hora                  = date("H:i:s");
      


 mysqli_query($conn3,"INSERT INTO informacion_rips2 (usuario_id, Fecha, nombrePrestador, codigoPrestador, TipoId, numeroId , fechaRemision , codArchivo , totalRegistros) VALUES 
 ('$ID', '$fechar','$nombre_prestador_servicios_ct', '$codigo_prestador_servicios_ct' ,'$tipo_id_principal' ,'$numeroId', '$fecha_remision_ct', '$codigo_archivo_ct', '$totalRegistros');");


echo "INSERT INTO informacion_rips2 (usuario_id, Fecha, nombrePrestador, codigoPrestador, TipoId, numeroId , fechaRemision , codArchivo , totalRegistros) VALUES 
 ('$ID', '$fechar','$nombre_prestador_servicios_ct', '$codigo_prestador_servicios_ct' ,'$tipo_id_principal' ,'$numeroId', '$fecha_remision_ct', '$codigo_archivo_ct', '$totalRegistros');";
              

  echo "<script language='Javascript'> window.location='portada.php';</script>"; 
     
  
                                                                     
   
?>