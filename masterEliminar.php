<?php
date_default_timezone_set('America/Bogota');
$enlace_actual = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
include("funciones/funciones.php");
 
        $filtro = $_GET['filtro'];
        $tabla = $_GET['tabla'];
        
        $Columna = $_GET['Columna'];
        $origen = $_GET['origen'];
        $idUsuario = $_GET['idUsuario'];

        $autorizaFecha = date("Y-m-d");
        $autorizaHora = date("H:i:s");
            
 $query = "delete from  $tabla  WHERE $Columna = $filtro";
       mysqli_query($conn3, $query);
       mssql_query($query);
   //echo $query;

              

 
auditorMaster($idUsuario, '3', $enlace_actual, $query);

 
 	 echo "<script language='Javascript'> window.location='$origen';</script>";

		     
    
?>


 