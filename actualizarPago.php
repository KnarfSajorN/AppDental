<?php
date_default_timezone_set('America/Bogota');
include 'funciones/conn3.php';
 
            ///datos del cliente y usuario

        $idOperacion     = $_GET['idOperacion'];
      
        $activo             = 1;
        $fechar             = date("Y-m-d H:i:s");
        


 
            $queryList=mysqli_query($conn3,"SELECT * FROM  sOperacionInv where idOperacion = $idOperacion");
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









        
/*
        $chekUsuario = "SELECT * from envioEmbarcador where correo = '$correoCliente'";
        $resultChekusuario = mysql_query ($chekUsuario, $con) or die ( mysql_error());
     
        $usuarioExiste = mysql_num_rows($resultChekusuario);
         echo "3  ";
        if($usuarioExiste>0){
          echo "4  ";
            echo "<script language='Javascript'> window.location='agregarClientes.php?msg=1';
                </script>"; 
        }
        else{
 */           
        

                //insetamos el usuario
          mysqli_query($conn3,"update sOperacionInv set montoPagado = '$totalBruto' where idOperacion = $idOperacion"); 
                                                    
                   echo "<script language='Javascript'> window.location='SclienteAdministracion_cuentasAcobrar.php';</script>"; 
   //     }

?>