<?php
date_default_timezone_set('America/Bogota');
include("../conexiones/conexionP.php");
    $con=conectar();
      //  echo "1";

            ///datos del cliente y usuario

        $cliente_id            = $_POST['clienteid'];          
           
        $usuario_id                    = $_POST['usuario_id'];                   
        $CODI_CLIENTE                  = $_POST['CODI_CLIENTE'];                 
        $Fecha                         = $_POST['Fecha'];                        
        $Hora                          = $_POST['Hora'];                         
        $numaeroLasik                   = $_POST['numaeroLasik'];                  
        $Descripcion                = $_POST['Descripcion'];               
        $biomicroscopia         = $_POST['biomicroscopia'];        
        $motivoDeConsulta       = $_POST['motivoDeConsulta'];      
        $agudezaVisual                = $_POST['agudezaVisual'];               
        $biomicroscopia                = $_POST['biomicroscopia'];               
        $plan                = $_POST['plan'];               
        $impresionDiagnostica  = $_POST['impresionDiagnostica'];                     
                                  
        $activo                = 1;
        $fecha                 = date("Y-m-d H:i:s");
         
  //      echo "2";
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
      //  echo "4  ";
                

                //insetamos el usuario
                    $queryUsuario =  "INSERT INTO historiaLasik (cliente_id, usuario_id, CODI_CLIENTE, Fecha, Hora, numaeroLasik, Descripcion,  motivoDeConsulta,agudezaVisual,biomicroscopia, impresionDiagnostica, plan) VALUES 
                    ('$cliente_id' ,'$usuario_id' ,'$CODI_CLIENTE' ,'$fecha' 
                      ,'$Hora' ,'$numaeroLasik' ,'$Descripcion' ,'$motivoDeConsulta','$agudezaVisual','$biomicroscopia','$impresionDiagnostica' ,'$plan')";
              
              
                     echo $cliente_id;    
                   //echo '<script language="Javascript"> window.location="consultaCliente.php?clienteId='.echo $cliente_Id.';</script>';
                    echo "<script language='Javascript'> window.location='consultaCliente.php?clienteId=$cliente_id';</script>"; 
                
              
                    mysql_query($queryUsuario,$con) or die(mysql_error());

                                                                     
                  // echo "<script language='Javascript'> window.location='clientesAdministracion.php?msg=2';</script>"; 
   //     }

?>