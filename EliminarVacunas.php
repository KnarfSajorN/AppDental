<?php
date_default_timezone_set('America/Bogota');
include("funciones/funciones.php");
include("funciones/conn3.php");

   
    $vacuna 	= decrypt($_GET['idV']);
    
   $queryList=mysqli_query($conn3,"SELECT * FROM vacunas_aplicadas  where id = $vacuna");
                            $nrowl=mysqli_num_rows($queryList);
                            while($row_recordset32=mysqli_fetch_array($queryList))
                            {

                                    $idC     = $row_recordset32['Id_Cliente'];
                                   }


mysqli_query($conn3, "UPDATE vacunas_aplicadas set activo = 0 where id = '$vacuna'");


 

echo "<script language='Javascript'> window.location='vacunacionAplicar?cI=".encrypt($idC)."';</script>";

?>