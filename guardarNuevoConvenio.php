<?php
session_start();
date_default_timezone_set('America/Bogota');
//include("conexiones/conexion.php");
include("funciones/funcionesUtilidades.php");
include("funciones/funciones.php");


     $conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));
        
 $fecha                = date("Y-m-d");
    $convenio= reem($_POST['nombreConvenio']);
    $idEmpresa= reem($_POST['empresa']);
   

   


           mysqli_query($conn3,"INSERT INTO convenio (nombre) VALUES('$convenio')");
 //echo  "INSERT INTO entidadconvenio ( fecha, idEmpresa,  idConvenio,  nombre_convenio) VALUES('$fecha','$idEmpresa', '$Convenio','$nombre')";

   
       echo "<script language='Javascript'> window.location='convenios.php?empresa=$idEmpresa';</script>";          
                                                                        
      ?>

