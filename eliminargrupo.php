
<?php 


  include 'header.php';
  include 'menu.php';




$grupo=$_GET['grupo'];
$resultado=mysql_query("DELETE  FROM gruposAtencion where ID =$grupo ");


          echo '<script language=javascript>
            alert("Registro Eliminado Correctamente");
            window.location="gruposAtencion.php";
             </script>';

  
  ?>
