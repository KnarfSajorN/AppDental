<?php
date_default_timezone_set('America/Bogota');
 
include("funciones/funciones.php");

$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));

    $formula	= $_POST['codigoFor'];
    $id_usuario	= $_POST['id_usuario'];

 echo ' <textarea id="paquete" name="paquete"  class="textarea" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">';
                                            
                        $queryList=mysqli_query($conn3,"SELECT * FROM  formula_medicamentos where ID_formula =$formula ");
                     
                 
                                      $nrowl=mysqli_num_rows($queryList);
                                      while($row_recordset32=mysqli_fetch_array($queryList))
                                      {



                                          $ID_FM     = $row_recordset32['ID'];
                                          $indicacion     = $row_recordset32['indicacion'];
                                         
                                          $descripcion      = $row_recordset32['nombre'];

echo $descripcion.'<br>'.$indicacion.'<br>';

}


 $queryList=mysqli_query($conn3,"SELECT * FROM  nombre_formulas where ID =$formula ");
                                      $nrowl=mysqli_num_rows($queryList);
                                      while($row_recordset32=mysqli_fetch_array($queryList))
                                      {



                                         
                                          $descripcion      = $row_recordset32['indicacion'];
                                    
  
                  echo '<b><BR>INDICACIONES GENERALES</b> <BR>' .$descripcion;

 }






echo ' </textarea>';



                                                                  
                       







 echo "<script language='Javascript'> window.location='formulas.php?';</script>"; 



?>