<?php
date_default_timezone_set('America/Bogota');
include 'funciones/conn3.php';
      
        // datos del cliente y usuario
   
        $fechaRegistro           = date("Y-m-d H:i:s");
        $idOperacion             = 0;
        $idProducto              = 0;
        $impuesto                = 0;
        $totalbase               = 0;
        $cantidad                = $_POST['cantidad'];
        $base                    = $_POST['base'];
        $descripcion             = $_POST['descripcion'];
        $subTotal                = $_POST['subTotal'];
        $id_usuario              = $_POST['id_usuario'];
        $id_cliente              = $_POST['id_cliente'];
        $codigoProd              = $_POST['codigoProd'];
        $historia             = $_POST['historia'];
        $tipo_historia             = $_POST['tipo_historia'];
        $descuento             = $_POST['descuento'];
        $descuento2             = $_POST['descuento2'];
        $porcentaje             = $_POST['porcentaje'];
        
       

 
 
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

                   
                                    if ($porcentaje >0 and $descuento == 0 and $descuento2 == 0) {
                                      $des=$descuento;
                                      $des2=$descuento2;
                                      $percentaje=$porcentaje ;
                                      $imp= $percentaje/100; 
                                      $toimp =  $subTotal *$imp;
                                      $subTotal  =  $subTotal +$toimp ;
                                    }elseif ($porcentaje >0 and $descuento > 0 and $descuento2 == 0) {
                                      $percentaje=$porcentaje ;
                                      $des=$descuento ;
                                      $des2=$descuento2 ;
                                      $toimp =  $subTotal * $percentaje;
                                      $imp= $toimp/100;
                                      $impuestofinal=$subTotal + $imp;
                                      $todes =  $impuestofinal *$des; 
                                      $de= $todes/100; 
                                      $descuntofinal=$impuestofinal - $de;
                                      $subTotal  =  $descuntofinal;
                                    }elseif ($porcentaje >0 and $descuento == 0 and $descuento2 > 0) {
                                      $percentaje=$porcentaje ;
                                      $des=$descuento ;
                                      $des2=$descuento2 ;
                                      $toimp =  $subTotal * $percentaje;
                                      $imp= $toimp/100;
                                      $impuestofinal=$subTotal + $imp;
                                      // $todes =  $impuestofinal *$des; 
                                      // $de= $todes/100; 
                                      $descuntofinal=$impuestofinal - $des2;
                                      $subTotal  =  $descuntofinal;
                                    }
                                    elseif ($porcentaje ==0 and $descuento > 0 and $descuento2 == 0) {
                                      
                                      $des=$descuento;
                                      $des2=$descuento2;
                                      $de= $des/100; 
                                      $todes =  $subTotal *$de; 
                                      $subTotal  =  $subTotal  - $todes;
                                    }elseif ($porcentaje ==0 and $descuento == 0 and $descuento2 > 0) {
                                      
                                      $des2=$descuento2;
                                      // $de= $des/100; 
                                      // $todes =  $subTotal *$de; 
                                      $subTotal  =  $subTotal  - $des2;
                                    }
                                    elseif ($porcentaje ==0 and $descuento == 0 and $descuento2 == 0) {
                                      
                                      $subTotal =  $subTotal;
                                      $percentaje=$porcentaje ;
                                      $des=$descuento;
                                      $des2=$descuento2;
                                    }


                    mysqli_query($conn3, "INSERT INTO sDetalleOperPendites 
                    (idOperacion, fechaRegistro, idProducto, cantidad, descripcion, base, impuesto, totalbase, subTotal, id_usuario, id_cliente,porcentaje,
                    descuento,descuento2) 
                                          VALUES 
                    ('$idOperacion','$fechaRegistro', '$codigoProd','$cantidad','$descripcion','$base','$impuesto', '$totalbase', '$subTotal', '$id_usuario', 
                    '$id_cliente','$percentaje','$des','$des2');";
              
              
               
              
              
                    or die(mysqli_error($conn3));

                                                                          
                    echo "<script language='Javascript'> window.location='SgenerarPresupuesto.php?historiaClinica1=$historia&clienteId=$id_cliente&tipo_historia=$tipo_historia'</script>"; 
   //     }

?>

