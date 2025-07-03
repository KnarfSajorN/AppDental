 <?php 

session_start();

 echo '<br> Impresión: '.$_SESSION['NOMBRE_USUARIO'].' fecha y hora: '.date("Y-m-d H:I:S").'Desde la IP:'.$ip = $_SERVER['REMOTE_ADDR']; 

 ?>

