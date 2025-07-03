<?php 


  include 'header.php';
  include 'menu.php';


$cliente_id=$_GET['cliente'];
$codigo=$_GET['IDm'];
$resultado=mysql_query("DELETE  FROM DetalleReceta  where id= $codigo");

echo'jhjkh'.$cliente_id;
          echo '<script language=javascript>
            alert("Registro Eliminado Correctamente");
            window.location="recetario.php?clienteId='.$cliente_id.'";
             </script>';

  
  ?>