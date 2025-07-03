<?php
   include 'header.php';

date_default_timezone_set('America/Bogota');
include("conexiones/conexion.php");
    $con=conectar();
      
        // datos del cliente y usuario
   $fechaRegistro           = date("Y-m-d");
       
        $Producto              = reem($_POST['codigoProd']);
        $Producto1              =  reem($_POST['codigoProd1']);
        $uso             =  reem($_POST['uso']);
         $prioridad       =  reem($_POST['prioridad']);
       
        $dosis                 =  reem($_POST['dosis']);
        $posologia                =  reem($_POST['posologia']);
        $frecuencia                 =  reem($_POST['frecuencia']);
         $administracion              =  reem($_POST['administracion']);
        $dosisdia           =  reem($_POST['dosisdia']);
       $via   =  reem($_POST['via']);
        $id_usuario              =  reem($_POST['id_usuario']);
        $id_cliente              =  reem($_POST['idcliente']); 
        $total             =  reem($_POST['total']); 
        $dias            =  reem($_POST['dias']); 
        $nota           =  reem($_POST['nota']); 
        $IDR          =  reem($_POST['idReceta']); 

           
        
 

                //insetamos el usuario
                    $queryUsuario ="INSERT INTO DetalleReceta (id_cliente,id_usuario,fechaRegistro, Producto, uso, prioridad,dosis,posologia,frecuencia, frecuencia2, dosisdia, via, total,dias,nota,producto1,idReceta ) 
                                          VALUES ('$id_cliente','$id_usuario', '$fechaRegistro','$Producto', '$uso' ,'$prioridad ','$dosis', '$posologia','$frecuencia','$administracion','$dosisdia', '$via','$total','$dias','$nota','$Producto1','$IDR');";
              
              
              
              
                    mysql_query($queryUsuario,$con) or die(mysql_error());

                                                                          
                   echo "<script language='Javascript'> window.location='recetario.php?clienteId=$id_cliente&idr=$IDR';</script>"; 
   //     }

?>