<?php
date_default_timezone_set('America/Bogota');
include("conexiones/conexion.php");
include("funciones/conexiones.php");
include("funciones/funciones.php");
$cuantasVacunas = 0;
$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));
 

    $id_cliente              = $_GET['id_cliente'];
    $id_usuario              = $_GET['id_usuario'];




        $fechaRegistro           = date("Y-m-d H:i:s");


 $queryinv1=mysqli_query($conn3,"SELECT COUNT(id) as cuantas, vacuna_id, SUM(precio) as base FROM `v_historiaClinica3` WHERE factura_id = 0 and aplicada = 1 and clienteE_id = $id_cliente GROUP by vacuna_id");

 
$nrowl1=mysqli_num_rows($queryinv1);
while($rowinv1=mysqli_fetch_array($queryinv1))
{

 
$cuantas      = $rowinv1['cuantas']; 
$vacuna_id      = $rowinv1['vacuna_id']; 
$base      = $rowinv1['base']; 
 

 
                        $queryList=mysqli_query($conn3,"SELECT * FROM sinvetrios WHERE ID = $codigoProd");
                                      $nrowl=mysqli_num_rows($queryList);
                                      while($row_recordset32=mysqli_fetch_array($queryList))
                                      {
                                          $descripcion     = $row_recordset32['descripcion'];
                                          $existencia      = $row_recordset32['existencia'];
                                          $cliente_id      = $row_recordset32['cliente_id'];
                                          $referencia      = $row_recordset32['referencia'];
                                          $ID              = $row_recordset32['ID'];
                                         
                                       
                                      }

 

/*

                $queryinv=mysqli_query($conn3,"SELECT * FROM  v_servicios where usuario_id = '$id_usuario'  and id = $vacuna_id");

                $nrowl=mysqli_num_rows($queryinv);
                while($rowinv=mysqli_fetch_array($queryinv))
                {

                $nombre       = $rowinv['nombre'];
                $descripcion  = $rowinv['descripcion'];
                $siglas  = $rowinv['siglas'];
                
                $descripcionV = $siglas.' '.$nombre;

                }
*/
 
mysqli_query($conn3,"INSERT INTO v_sDetalleOper (idOperacion, fechaRegistro, idProducto, cantidad, descripcion, base, impuesto, totalbase, subTotal, id_usuario, id_cliente) VALUES ('0','$fechaRegistro', '$vacuna_id','$cuantas','$descripcion','$base','0', '$base', '$base', '$id_usuario', '$id_cliente');");
              

}

  
                                                                          
                 echo "<script language='Javascript'> window.location='v_SgenerarFactura.php?clienteId=$id_cliente';</script>"; 




   //     }

?>