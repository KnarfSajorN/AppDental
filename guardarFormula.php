<?php
date_default_timezone_set('America/Bogota');
 
include("funciones/funciones.php");

$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));

   
    $id_usuario = $_POST['id_usuario'];
    $clienteId = $_POST['idcliente'];
   
    $paquete = $_POST['paquete'];
     $fechar                = date("Y-m-d");
        $Afechar               = date("Y-m-d H:i:s");
  
 
  mysqli_query($conn3,"INSERT INTO formulas
              (usuario_id, cliente_id,   historia_id, fecha, paquete) VALUES 
            ('$id_usuario',  '$clienteId','0',  '$fechar', '$paquete');");

 

 $queryExamen=mysqli_query($conn3,"SELECT MAX(id) as idexamenesaRealizar from formulas");
              $nrowl=mysqli_num_rows($queryExamen);
              while($rowExamen=mysqli_fetch_array($queryExamen))
              {
                $idexamenesaRealizar=$rowExamen['idexamenesaRealizar'];
              }   


              
echo "<script language='Javascript'> window.location='imprimirPaquete.php?IDformula=$idexamenesaRealizar';</script>"; 



?>