<?php
 
include 'funciones/conn3.php';
 



$longtext = $_POST['longtext'];


echo $longtext;



mysqli_query($conn3,"INSERT INTO longtext  
            (longtext) VALUES 
            ('$longtext')");


echo "INSERT INTO longtext  
            (longtext) VALUES 
            ('$longtext')";




  $queryList2=mysqli_query($conn3,"SELECT * from  longtext ");
              $nrowl=mysqli_num_rows($queryList2);
              while($row_recordset322=mysqli_fetch_array($queryList2))
              {
              $longtext2      = $row_recordset322['longtext'];
              echo '-----------';
              echo $longtext2;
              }   


?>

 