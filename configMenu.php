<?php


    $queryListhc=mysqli_query($conn3,"SELECT * from configTablas where activo = 1");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $menuNombre=$rowhc['menuNombre'];
                $id=$rowhc['id'];
                
              echo '<li>
                <a href="'.$Base.'configPacientes.php?id='.$id. '"><span class="icon-clinical-fe"></span><label>'.$menuNombre. '</label></a>
              </li>';






              }   
 




?>