<?php

ini_set('display_errors', 'off');
  include 'funciones/funciones.php';
  include 'funciones/funcionesUtilidades.php';

//print_r($_POST);

            $CODI_CLIENTE_odonto=reem($_POST['CODI_CLIENTE_odonto']);
            $nombre_cliente=reem($_POST['nombre_cliente']);
            $fechaNacimiento=reem($_POST['fechaNacimiento']);
            $genero=reem($_POST['genero']);
            $nacionalidad=reem($_POST['nacionalidad']);
            $direccion_cliente=reem($_POST['direccion_cliente']);
            $estado=reem($_POST['estado']);
            $tipoUsuario=reem($_POST['tipoUsuario']);
            $telefono_cliente_odonto=reem($_POST['telefono_cliente_odonto']);
            $celular_cliente_odonto=reem($_POST['celular_cliente_odonto']);
            $whatsapp=reem($_POST['whatsapp']);
            $correo_cliente_odonto=reem($_POST['correo_cliente_odonto']);
            $ciudad_cliente_odonto=reem($_POST['ciudad_cliente_odonto']);
            $profesion_cliente_odonto=reem($_POST['profesion_cliente_odonto']);
            $tiposSangre=reem($_POST['tiposSangre']);
            $entidadSalud=reem($_POST['entidadSalud']);
            $seguro=reem($_POST['seguro']);
            $acompananteFamiliar=reem($_POST['acompananteFamiliar']);
            $telefono_acompanante=reem($_POST['telefono_acompanante']);
            $parentesco_acompanante=reem($_POST['parentesco_acompanante']);
            $tipo_cliente=reem($_POST['tipo_cliente']);
            $clienteId=$_POST['clienteId'];



        $activo             = 1;
        $anno             = date("Y");
        $fechar             = date("Y-m-d H:i:s");
  
        $ID                 =$_POST['ID'];
        $edad=$anno-$fechaNacimiento;

      if ($sucursal == '') {$sucursal=0;}        


        $queryList=mysqli_query($conn3,"UPDATE cliente_odonto 
            SET
            usuario_id='$ID', 
            nombre_cliente_odonto='$nombre_cliente', 
            celular_cliente_odonto='$celular_cliente_odonto', 
            ciudad_cliente_odonto='$ciudad_cliente_odonto', 
            correo_cliente_odonto='$correo_cliente_odonto', 
            CODI_cliente_odonto='$CODI_CLIENTE_odonto', 
            fechar='$fechar', 
            activo='$activo', 
            genero='$genero', 
            direccion_cliente_odonto='$direccion_cliente', 
            telefono_cliente_odonto='$telefono_cliente_odonto', 
            profesion_cliente_odonto='$profesion_cliente_odonto', 
            acompananteFamiliar='$acompananteFamiliar', 
            telefono_acompanante='$telefono_acompanante', 
            parentesco_acompanante='$parentesco_acompanante', 
            entidadSalud='$entidadSalud', 
            seguro='$seguro', 
            tiposSangre='$tiposSangre', 
            fechaNacimiento='$fechaNacimiento', 
            whatsapp='$whatsapp',
            tipoUsuario='$tipoUsuario', 
            estado='$estado', 
            sucursal='$sucursal', 
            nacionalidad='$nacionalidad',
            tipo_cliente_odonto='$tipo_cliente',
            edad_cliente_odonto='$edad' 
            where 
                cliente_odonto_id='$clienteId'
            ");


                                    
       
               echo "<script type='text/javascript'>
                        window.location='pacientes_Odonto.php';
                     </script>";     

?>