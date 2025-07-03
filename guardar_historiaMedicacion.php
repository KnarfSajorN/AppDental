<?php
   //include 'header.php';
   include 'funciones/funciones.php';
   include 'funciones/funcionesUtilidades.php';
 //  include 'menu.php'; 



    date_default_timezone_set('America/Bogota');
    include("conexiones/conexion.php");
    $con=conectar();
  
        $ID                    = $_POST['ID'];          
        $cliente_id            = $_POST['cliente_id'];          
    
        $fechar                = date("Y-m-d");
        $Afechar               = date("Y-m-d H:i:s");
        $hora                  = date("H:i:s");
 
        $dia=reem($_POST['dia']);
        $medicina=reem($_POST['medicina']);
        $dosis=reem($_POST['dosis']);
        $via=reem($_POST['via']);
        $responsable=reem($_POST['responsable']);
       
 
$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));





            mysqli_query($conn3,"INSERT INTO historiaMedicacion (cliente_id, usuario_id, Fecha, Hora, dia, medicina, dosis, via, responsable) VALUES 
                ('$cliente_id', '$ID', '$fechar', '$hora', '$dia', '$medicina', '$dosis', '$via', '$responsable');");


 echo "INSERT INTO historiaMedicacion (cliente_id, usuario_id, Fecha, Hora, dia, medicina, dosis, via, responsable) VALUES 
                ('$cliente_id', '$ID', '$fechar', '$hora', '$dia', '$medicina', '$dosis', '$via', '$responsable');";
 


 echo "<script language='Javascript'> window.location='consultaCliente_RegistroplantasMedicinales.php?clienteId=$cliente_id';</script>"; 



?>