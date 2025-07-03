<?php
session_start();
date_default_timezone_set('America/Bogota');
//include("conexiones/conexion.php");
include("funciones/funcionesUtilidades.php");
include("funciones/funciones.php");


     $conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));
        
 $fecha                = date("Y-m-d");
    $idEmpresa = reem($_POST['empresa']);
    $Convenio= reem($_POST['convenio']);

   

$queryList=mysqli_query($conn3,"SELECT * FROM  convenio where ID ='$Convenio' ");


$nrowl=mysqli_num_rows($queryList);
while($rowMotorizado=mysqli_fetch_array($queryList))
{
$nombre    = $rowMotorizado['nombre'];
 
}

           mysqli_query($conn3,"INSERT INTO entidadconvenio ( fecha, idEmpresa,  idConvenio,  nombre_convenio) VALUES('$fecha','$idEmpresa', '$Convenio','$nombre')");
 //echo  "INSERT INTO entidadconvenio ( fecha, idEmpresa,  idConvenio,  nombre_convenio) VALUES('$fecha','$idEmpresa', '$Convenio','$nombre')";

   
       echo "<script language='Javascript'> window.location='convenios.php?empresa=$idEmpresa';</script>";          
                                                                        
      ?>

