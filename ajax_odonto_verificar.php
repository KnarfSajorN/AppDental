<?php
date_default_timezone_set('America/Bogota');
include("funciones/funciones.php");


$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));




$cliente		= $_POST['cliente_id'];

$pieza = $_POST['pieza'];


    $queryList1=mysqli_query($conn3,"SELECT * FROM piezas_estado  where cliente=$cliente and pieza= '$pieza'");


  $nrowl=mysqli_num_rows($queryList1);
           
if  ($nrowl=='') {

ECHO '<div class="form-group col-md-2">
    
         Vestibular
         
                
           <select id="vestibular"   name="vestibular" class="form-control select2" style="width: 100%;" >

   <option value="" select> <?php echo $Vestibular?> </option> ';


 $queryListA=mysqli_query($conn3,"SELECT * FROM OdontogramaEstados");
                 

                  $nrowl=mysqli_num_rows($queryListA);

                  while($row_recordset32A=mysqli_fetch_array($queryListA))

                  {
                      $id= $row_recordset32A['id'];
                      $nombre= $row_recordset32A['nombre'];
                      $color= $row_recordset32A['color'];

              echo "<option value='$id'> $nombre </option>";
                      }

                   
   echo'</select>

          </div> 






<div class="form-group col-md-2">
    
         Mesial
         
                
           <select id="Mesial"   name="Mesial" class="form-control select2" style="width: 100%;" >

   <option value="" select> <?php echo $Mesial?> </option> ';


 $queryListA=mysqli_query($conn3,"SELECT * FROM OdontogramaEstados");
                 

                  $nrowl=mysqli_num_rows($queryListA);

                  while($row_recordset32A=mysqli_fetch_array($queryListA))

                  {
                      $id= $row_recordset32A['id'];
                      $nombre= $row_recordset32A['nombre'];
                      $color= $row_recordset32A['color'];

              echo "<option value='$id'> $nombre </option>";
}


                   
       echo'     </select>

          </div> 



<div class="form-group col-md-2">
    
         Lingual
         
                
           <select id="Lingual"   name="Lingual" class="form-control select2" style="width: 100%;" >

   <option value="" select> <?php echo $Lingual?> </option> ';

 $queryListA=mysqli_query($conn3,"SELECT * FROM OdontogramaEstados");
                 

                  $nrowl=mysqli_num_rows($queryListA);

                  while($row_recordset32A=mysqli_fetch_array($queryListA))

                  {
                      $id= $row_recordset32A['id'];
                      $nombre= $row_recordset32A['nombre'];
                      $color= $row_recordset32A['color'];

              echo "<option value='$id'> $nombre </option>";
}


                   
    echo '       </select>

          </div> 


<div class="form-group col-md-2">
    
         Distal
         
                
           <select id="Distal"   name="Distal" class="form-control select2" style="width: 100%;" >

   <option value="" select> <?php echo $Distal?> </option> ';


 $queryListA=mysqli_query($conn3,"SELECT * FROM OdontogramaEstados");
                 

                  $nrowl=mysqli_num_rows($queryListA);

                  while($row_recordset32A=mysqli_fetch_array($queryListA))

                  {
                      $id= $row_recordset32A['id'];
                      $nombre= $row_recordset32A['nombre'];
                      $color= $row_recordset32A['color'];

              echo "<option value='$id'> $nombre </option>";
}


                   
     echo '      </select>

          </div> 


<div class="form-group col-md-2">
    
         Oclusal
         
                
           <select id="Oclusal"   name="Oclusal" class="form-control select2" style="width: 100%;" >

   <option value=""  select> <?php echo $Oclusal?> </option> ';



 $queryListA=mysqli_query($conn3,"SELECT * FROM OdontogramaEstados");
                 

                  $nrowl=mysqli_num_rows($queryListA);

                  while($row_recordset32A=mysqli_fetch_array($queryListA))

                  {
                      $id= $row_recordset32A['id'];
                      $nombre= $row_recordset32A['nombre'];
                      $color= $row_recordset32A['color'];

              echo "<option value='$id'> $nombre </option>";
}


                   
   echo' </select>

          </div> ' ;


}

else { echo '<B> PIEZA YA VALORADA , PUEDE EDITAR </b>';}

?>