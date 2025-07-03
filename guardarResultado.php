<?php 
date_default_timezone_set('America/Bogota');
include("conexiones/conexion.php");
    $con=conectar();
     



				$listaDetalle=$_POST['listaDetalle'];
				$resultado=$_POST['resultado'];
				$idExamen=$_POST['idExamen'];
				$idOrden=$_POST['idOrden'];

   
 //  print_r($_POST);

        

                  $queryUsuario = "INSERT INTO resultado_orden (id_examen, id_detalle, id_orden, resultado) 
                        VALUES ('$idExamen','$listaDetalle', '$idOrden','$resultado')";
              
                   
                    mysql_query($queryUsuario,$con) or die(mysql_error());


                                                                          
           echo "<script language='Javascript'> window.location='cargar_resultado.php';</script>"; 
   


          
              
              



 ?>