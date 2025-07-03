<?php
date_default_timezone_set('America/Bogota');
 
include("funciones/funciones.php");

$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));

    $formula  = $_POST['formula'];
    $id_usuario = $_POST['id_usuario'];
    $ID_formula = $_POST['ID_formula'];
    $indicacion = $_POST['indicacion'];
  
 
 
 mysqli_query($conn3, "INSERT INTO formula_medicamentos(usuario_id, nombre, ID_formula, indicacion) 
                    VALUES ('$id_usuario','$formula','$ID_formula','$indicacion');");



echo ' <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                 
                  <th>Medicamentos</th>
                  <th>Indicaciones</th>
                 
                 
               
                </tr>
                </thead>
                <tbody>';
                
                                                                  
                        $queryList=mysqli_query($conn3,"SELECT * FROM  formula_medicamentos where ID_formula =$ID_formula ");
                                      $nrowl=mysqli_num_rows($queryList);
                                      while($row_recordset32=mysqli_fetch_array($queryList))
                                      {



                                          $indicacion     = $row_recordset32['indicacion'];
                                         
                                          $descripcion      = $row_recordset32['nombre'];
                                    
  
                  echo '     <tr>
                  <td>'.$descripcion.' </td>
                  <td>'.$indicacion.' </td>
                 
                 
           
                </tr>';

 }




 
   echo  '         </tbody>
                <tfoot>
                <tr>
               
                  <th></th>
                  <th></th>
                 
                
                </tr>
                </tfoot>
              </table>';
              
echo "<script language='Javascript'> window.location='verFormula.php?ID=$ID_formula';</script>"; 



?>