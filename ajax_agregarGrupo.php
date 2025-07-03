<?php
date_default_timezone_set('America/Bogota');
include("funciones/funcionesUtilidades.php");
include("funciones/funciones.php");
include "funciones/conn3.php";




$grupo = $_POST['grupo'];






$queryUsuario2 = "INSERT INTO grupos_vacunacion (Nombre) 
                        VALUES ('$grupo')";

mysqli_query($conn3, $queryUsuario2);



// echo 'Guardado!!';
   

 //echo "<script language='Javascript'> window.location='RegistrarVacunasAGrupo.php?';</script>"; 
