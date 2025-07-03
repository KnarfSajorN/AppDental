<?php
date_default_timezone_set('America/Bogota');
 
            ///datos del cliente y usuario

        $idOperacion     = $_GET['idOperacion'];
      
        $activo             = 1;
        $fechar             = date("Y-m-d H:i:s");
        
 
include 'funciones/conn3.php'; 
 
            $queryList=mysqli_query($conn3,"SELECT * FROM  v_sOperacionInv where idOperacion = $idOperacion");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {
              $numeroDoc      =$rowMotorizado['numeroDoc'];
              $idCliente      =$rowMotorizado['idCliente'];
              $idEmpresa      =$rowMotorizado['idEmpresa'];
              $fechaOperacion      =$rowMotorizado['fechaOperacion'];
              $fechaVencimiento      =$rowMotorizado['fechaVencimiento'];
              $subTotal      =$rowMotorizado['subTotal'];
              $impuesto      =$rowMotorizado['impuesto'];
              $totalNeto      =$rowMotorizado['totalNeto'];
              $totalBruto      =$rowMotorizado['totalBruto'];
              $cantidadProduc      =$rowMotorizado['cantidadProduc'];
              $descuentos      =$rowMotorizado['descuentos'];
              $montoPagado      =$rowMotorizado['montoPagado'];


            }


 
                //insetamos el usuario
          mysqli_query($conn3,"update v_sOperacionInv set montoPagado = '$totalBruto' where idOperacion = $idOperacion"); 
                                                    
                   echo "<script language='Javascript'> window.location='v_SclienteAdministracion_cuentasAcobrar.php';</script>"; 
   //     }

?>