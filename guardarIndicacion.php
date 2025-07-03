<?php
date_default_timezone_set('America/Bogota');
include("conexiones/conexion.php");
include("funciones/funciones.php");
 include 'funciones/funcionesUtilidades.php';


    $con=conectar();
        
 
        $indicacion                 = reem($_POST['indicaciones']); 
        $ID_formula           = reem($_POST['ID_formula']);   

                      
        

$queryEstado = "UPDATE nombre_formulas SET indicacion = '$indicacion' WHERE ID = '$ID_formula'";



    mysql_query($queryEstado,$con) or die(mysql_error());


//echo "UPDATE citas SET estado= '$tipo' WHERE idCitas = '$citas'";
 
  
echo "<script language='Javascript'> window.location='verFormula.php?ID=$ID_formula';</script>"; 


 
                
  
                                                                     
   
?>