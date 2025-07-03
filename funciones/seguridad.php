<?php
if ($_SESSION['expire'] == 0) {
	//echo "<script>alert('Sesión caducada Debe iniciar sesión nuevamente...'); window.location='index.php'</script>";
	/*
	foreach ($_SESSION as $key => $value) {
  	$prueba.= $key.':'.$value;
	}
	*/
	echo "<script>alert('Sesión caducada Debe iniciar sesión nuevamente...{$prueba}'); window.location='index.php'</script>";
}
  
?>