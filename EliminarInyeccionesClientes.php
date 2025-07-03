<?php
date_default_timezone_set('America/Bogota');
include("conexiones/conexion.php");
include("funciones/conexiones.php");
include("funciones/funciones.php");

$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));

   
    $vacuna 	= decrypt($_GET['idV']);
    
   $queryList=mysqli_query($conn3,"SELECT * FROM vacunas_aplicadas  where id = $vacuna");
                            $nrowl=mysqli_num_rows($queryList);
                            while($row_recordset32=mysqli_fetch_array($queryList))
                            {

                                    $idC     = $row_recordset32['Id_Cliente'];
                                   }


mysqli_query($conn3, "UPDATE vacunas_aplicadas set activo = 0 where id = '$vacuna'");


 

echo "<script language='Javascript'> window.location='AplicarInyeccion?cI=".encrypt($idC)."';</script>";

?>