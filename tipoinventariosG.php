<?php
   include 'header.php';
   include 'menu.php';


    date_default_timezone_set('America/Bogota');
    include("conexiones/conexion.php");
    $con=conectar();
 
        $descripcion              = $_POST['descripcion'];          
        $ID                    = $_POST['ID'];          
        $nota             = $_POST['nota'];          
        
        
        $fechar               = date("Y-m-d H:i:s");
        


$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));


mysqli_query($conn3,"INSERT INTO scategoria (descripcion, usuario_id, Fecha, nota) VALUES 
                                           ('$descripcion', '$ID', '$fechar', '$nota');");

 

echo "<script language='Javascript'> window.location='listaTipoinventario.php?msg=1';</script>"; 

?>