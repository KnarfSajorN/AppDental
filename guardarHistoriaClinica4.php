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
        $Descripcion                   = $_POST['Descripcion'];                  
        $motivoConsulta                = $_POST['motivoConsulta'];               
        $antecedentesPesonales         = $_POST['antecedentesPesonales'];        
        $antecedentesFamililares       = $_POST['antecedentesFamililares'];      
        $biomicroscopia                = $_POST['biomicroscopia'];               
        $impresionDiagnostica          = $_POST['impresionDiagnostica'];                   
        $planDeManejo                  = $_POST['planDeManejo'];                  
                                  
        $activo                = 1;
        $fechar                = date("Y-m-d H:i:s");
         
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
                    $queryUsuario = "INSERT INTO historiaClinica4 (cliente_id, usuario_id, CODI_CLIENTE, Fecha, Hora, Descripcion, motivoConsulta, biomicroscopia, impresionDiagnostica, planDeManejo ) VALUES ('$cliente_id' ,'$usuario_id' ,'$CODI_CLIENTE' ,'$Fecha' ,'$Hora' ,'$Descripcion' ,'$motivoConsulta' ,'$biomicroscopia' ,'$impresionDiagnostica' ,'$planDeManejo ')";
              
              
                     echo $cliente_id;    
                   //echo '<script language="Javascript"> window.location="consultaCliente.php?clienteId='.echo $cliente_Id.';</script>';
                   echo "<script language='Javascript'> window.location='consultaCliente.php?clienteId=$cliente_id';</script>"; 
                
              
                    mysql_query($queryUsuario,$con) or die(mysql_error());

                                                                     
                  // echo "<script language='Javascript'> window.location='clientesAdministracion.php?msg=2';</script>"; 
   //     }

?>