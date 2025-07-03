<?php
date_default_timezone_set('America/Bogota');
include("conexiones/conexion.php");
    $con=conectar();
        // datos del cliente y usuario
   
 //  print_r($_POST);

        $id             = $_GET['id'];
        $valor             = 2;

                  $queryUsuario = "UPDATE soperacioninvexamen
                  SET
                  tipo = '$valor' 
                  WHERE 

                  idOperacion = '$id' ";
              
                   
                    mysql_query($queryUsuario,$con) or die(mysql_error());


                                                                          
           echo "<script language='Javascript'> window.location='cargar_resultado.php';</script>"; 
   


          
              
              
               
              
              
              

                                                                          
   //     }


?>