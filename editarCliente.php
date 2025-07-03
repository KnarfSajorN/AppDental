<?php
date_default_timezone_set('America/Bogota');
include("conexiones/conexion.php");
    $con=conectar();
        

            ///datos del cliente y usuario

        $nombre_cliente     = $_POST['nombre_cliente'];
        $CODI_CLIENTE       = $_POST['CODI_CLIENTE'];
        $celular_cliente    = $_POST['celular_cliente'];
        $telefono_cliente   = $_POST['telefono_cliente']; 
        $ciudad_cliente     = $_POST['ciudad_cliente'];
        $correo_cliente     = $_POST['correo_cliente'];
        $tipo_cliente       =$_POST['tipo_cliente'];
        $genero             =$_POST['genero'];
        $edad_cliente       =$_POST['edad_cliente'];
        $profesion_cliente  =$_POST['profesion_cliente'];
        $acompananteFamiliar=$_POST['acompananteFamiliar'];
        $telefono_acompanante=$_POST['telefono_acompanante'];
        $motivoConsulta     =$_POST['motivoConsulta'];
        $antecedentes       =$_POST['antecedentes'];
        $direccion_cliente  =$_POST['direccion_cliente'];
        $ID                 =$_POST['ID'];
        $cliente_id                 =$_POST['cliente_id'];
 
 
        $entidadSalud                 =$_POST['entidadSalud'];
        $seguro                 =$_POST['seguro'];
         

        $activo             = 1;
        $fechar             = date("Y-m-d H:i:s");
         


        
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
                    $queryUsuario = "UPDATE cliente SET nombre_cliente='$nombre_cliente',celular_cliente='$celular_cliente',ciudad_cliente='$ciudad_cliente',correo_cliente='$correo_cliente',CODI_CLIENTE='$CODI_CLIENTE',tipo_cliente='$tipo_cliente', genero= '$genero',direccion_cliente='$direccion_cliente',telefono_cliente='$telefono_cliente',edad_cliente='$edad_cliente',profesion_cliente='$profesion_cliente',acompananteFamiliar='$acompananteFamiliar',telefono_acompanante='$telefono_acompanante',antecedentes='antecedentes',entidadSalud='$entidadSalud',seguro='seguro' WHERE cliente_id = $cliente_id";
              
            
               
              
              
                    mysql_query($queryUsuario,$con) or die(mysql_error());

                                                                          
                   echo "<script language='Javascript'> window.location='patientes.php?msg=3';</script>"; 
   //     }

?>