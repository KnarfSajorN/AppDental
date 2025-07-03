<?php
date_default_timezone_set('America/Bogota');
include 'funciones/conn3.php';
        // datos del cliente y usuario
   


        $idOperacion             = 0;
        $idProducto              = $_POST['codigoProd'];
        $impuesto                = 0;
        $totalbase               = 0;
        $cantidad                = $_POST['cantidad'];
        $base                    = $_POST['base'];
        $descripcion             = $_POST['descripcion'];
        $subTotal                = $_POST['subTotal'];
        $id_usuario              = $_POST['id_usuario'];
        $id_cliente              = $_POST['id_cliente'];
        $fechaRegistro           = date("Y-m-d H:i:s");
        $descripcion             = $_POST['descripcion'];
        $tipo_cliente              = $_POST['tipo_cliente'];
        

                  mysqli_query($conn3, "INSERT INTO sdetalleoperpenditesexamen (idOperacion, fechaRegistro, idProducto, cantidad, descripcion, base, impuesto, totalbase, subTotal, id_usuario, id_cliente) 
                        VALUES ('$idOperacion','$fechaRegistro', '$idProducto','$cantidad','$descripcion','$base','$impuesto', '$totalbase', '$subTotal', '$id_usuario', '$id_cliente')";
              
                   
                   or die(mysqli_error($conn3));


                                                                          
           echo "<script language='Javascript'> window.location='ordenLaboratorio.php?clienteId=$id_cliente';</script>"; 

          
              
              
               
              
              
              

                                                                          
   //     }


?>