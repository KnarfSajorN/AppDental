<?php

ini_set('display_errors', 'off');
  include 'funciones/funciones.php';
  include 'funciones/funcionesUtilidades.php';



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
            $tomaMedicamento=reem($_POST['tomaMedicamento']);
            $ap1=reem($_POST['ap1']);
            $ap2=reem($_POST['ap2']);
            $ap3=reem($_POST['ap3']);
            $ap4=reem($_POST['ap4']);
            $ap5=reem($_POST['ap5']);
            $ap6=reem($_POST['ap6']);
            $ap7=reem($_POST['ap7']);
            $ap8=reem($_POST['ap8']);
            $ap9=reem($_POST['ap9']);
            $cirugiasCuales=reem($_POST['cirugiasCuales']);

            $nota=reem($_POST['nota']);
            $imagen=reem($_POST['imagen']);
            $tipo_cliente=reem($_POST['tipo_cliente']);

            $alergias=reem($_POST['alergias']);
            $tomaMedicamento1=reem($_POST['tomaMedicamento1']);
            $antecedentes=reem($_POST['antecedentes']);
            $enfermedadesPequeno=reem($_POST['enfermedadesPequeno']);
            $motivoConsulta=reem($_POST['motivoConsulta']);
            $d18=reem($_POST['d18']);
            $d17=reem($_POST['d17']);
            $d16=reem($_POST['d16']);
            $d15=reem($_POST['d15']);
            $d14=reem($_POST['d14']);
            $d13=reem($_POST['d13']);
            $d12=reem($_POST['d12']);
            $d11=reem($_POST['d11']);
            $d28=reem($_POST['d28']);
            $d27=reem($_POST['d27']);
            $d26=reem($_POST['d26']);
            $d25=reem($_POST['d25']);
            $d24=reem($_POST['d24']);
            $d23=reem($_POST['d23']);
            $d22=reem($_POST['d22']);
            $d21=reem($_POST['d21']);
            $d55=reem($_POST['d55']);
            $d54=reem($_POST['d54']);
            $d53=reem($_POST['d53']);
            $d52=reem($_POST['d52']);
            $d51=reem($_POST['d51']);
            $d65=reem($_POST['d65']);
            $d64=reem($_POST['d64']);
            $d63=reem($_POST['d63']);
            $d62=reem($_POST['d62']);
            $d61=reem($_POST['d61']);
            $d85=reem($_POST['d85']);
            $d84=reem($_POST['d84']);
            $d83=reem($_POST['d83']);
            $d82=reem($_POST['d82']);
            $d81=reem($_POST['d81']);
            $d75=reem($_POST['d75']);
            $d74=reem($_POST['d74']);
            $d73=reem($_POST['d73']);
            $d72=reem($_POST['d72']);
            $d71=reem($_POST['d71']);
            $d48=reem($_POST['d48']);
            $d47=reem($_POST['d47']);
            $d46=reem($_POST['d46']);
            $d45=reem($_POST['d45']);
            $d44=reem($_POST['d44']);
            $d43=reem($_POST['d43']);
            $d42=reem($_POST['d42']);
            $d41=reem($_POST['d41']);
            $d38=reem($_POST['d38']);
            $d37=reem($_POST['d37']);
            $d36=reem($_POST['d36']);
            $d35=reem($_POST['d35']);
            $d34=reem($_POST['d34']);
            $d33=reem($_POST['d33']);
            $d32=reem($_POST['d32']);
            $d31=reem($_POST['d31']);


            $n18=reem($_POST['n18']);
            $n17=reem($_POST['n17']);
            $n16=reem($_POST['n16']);
            $n15=reem($_POST['n15']);
            $n14=reem($_POST['n14']);
            $n13=reem($_POST['n13']);
            $n12=reem($_POST['n12']);
            $n11=reem($_POST['n11']);
            $n28=reem($_POST['n28']);
            $n27=reem($_POST['n27']);
            $n26=reem($_POST['n26']);
            $n25=reem($_POST['n25']);
            $n24=reem($_POST['n24']);
            $n23=reem($_POST['n23']);
            $n22=reem($_POST['n22']);
            $n21=reem($_POST['n21']);
            $n55=reem($_POST['n55']);
            $n54=reem($_POST['n54']);
            $n53=reem($_POST['n53']);
            $n52=reem($_POST['n52']);
            $n51=reem($_POST['n51']);
            $n65=reem($_POST['n65']);
            $n64=reem($_POST['n64']);
            $n63=reem($_POST['n63']);
            $n62=reem($_POST['n62']);
            $n61=reem($_POST['n61']);
            $n85=reem($_POST['n85']);
            $n84=reem($_POST['n84']);
            $n83=reem($_POST['n83']);
            $n82=reem($_POST['n82']);
            $n81=reem($_POST['n81']);
            $n75=reem($_POST['n75']);
            $n74=reem($_POST['n74']);
            $n73=reem($_POST['n73']);
            $n72=reem($_POST['n72']);
            $n71=reem($_POST['n71']);
            $n48=reem($_POST['n48']);
            $n47=reem($_POST['n47']);
            $n46=reem($_POST['n46']);
            $n45=reem($_POST['n45']);
            $n44=reem($_POST['n44']);
            $n43=reem($_POST['n43']);
            $n42=reem($_POST['n42']);
            $n41=reem($_POST['n41']);
            $n38=reem($_POST['n38']);
            $n37=reem($_POST['n37']);
            $n36=reem($_POST['n36']);
            $n35=reem($_POST['n35']);
            $n34=reem($_POST['n34']);
            $n33=reem($_POST['n33']);
            $n32=reem($_POST['n32']);
            $n31=reem($_POST['n31']);


/*

function calculaedad($fechaNacimiento){
  list($ano,$mes,$dia) = explode("-",$fechaNacimiento);
  $ano_diferencia  = date("Y") - $ano;
  $mes_diferencia = date("m") - $mes;
  $dia_diferencia   = date("d") - $dia;
  if ($dia_diferencia < 0 || $mes_diferencia < 0)
    $ano_diferencia--;
  return $ano_diferencia;
}

function edad($fechaNacimiento){
  list($anyo,$mes,$dia) = explode("-",$fechaNacimiento);
  $anyo_dif  = date("Y") - $anyo;
  $mes_dif = date("m") - $mes;
  $dia_dif   = date("d") - $dia;
  if ($dia_dif < 0 || $mes_dif < 0) $anyo_dif--;
  return $anyo_dif;

}*/
        $activo             = 1;
        $anno             = date("Y");
        $fechar             = date("Y-m-d H:i:s");
  
        $ID                 =$_POST['ID'];
        $edad=$anno-$fechaNacimiento;

      if ($sucursal == '') {$sucursal=0;}        


        $queryList=mysqli_query($conn3,"INSERT INTO cliente_odonto 
(usuario_id, nombre_cliente_odonto, celular_cliente_odonto, ciudad_cliente_odonto, correo_cliente_odonto, CODI_cliente_odonto, fechar, activo, genero,  direccion_cliente_odonto, telefono_cliente_odonto, profesion_cliente_odonto, acompananteFamiliar, telefono_acompanante, parentesco_acompanante, antecedentes, entidadSalud, seguro, alergias, tiposSangre, fechaNacimiento, whatsapp, tipoUsuario, estado, sucursal, nacionalidad, d11, d12, d13, d14, d15, d16, d17, d18, d21, d22, d23, d24, d25, d26, d27, d28, d31, d32, d33, d34, d35, d36, d37, d38, d41, d42, d43, d44, d45, d46, d47, d48, d51, d52, d53, d54, d55, d61, d62, d63, d64, d65, d71, d72, d73, d74, d75, d81, d82, d83, d84, d85, n11, n12, n13, n14, n15, n16, n17, n18, n21, n22, n23, n24, n25, n26, n27, n28, n31, n32, n33, n34, n35, n36, n37, n38, n41, n42, n43, n44, n45, n46, n47, n48, n51, n52, n53, n54, n55, n61, n62, n63, n64, n65, n71, n72, n73, n74, n75, n81, n82, n83, n84, n85,tipo_cliente_odonto, tomamedicamento1, tomamedicamento,  cirujiascuales, enfermedades_pequeno, motivo_consulta, nota, fotoperfil, edad_cliente_odonto) VALUES

('$ID','$nombre_cliente','$celular_cliente_odonto','$ciudad_cliente_odonto','$correo_cliente_odonto','$CODI_CLIENTE_odonto','$fechar','$activo','$genero','$direccion_cliente','$telefono_cliente_odonto','$profesion_cliente_odonto','$acompananteFamiliar','$telefono_acompanante','$parentesco_acompanante','$antecedentes','$entidadSalud','$seguro','$alergias','$tiposSangre','$fechaNacimiento','$whatsapp','$tipoUsuario','$estado','$sucursal','$nacionalidad', '$d11', '$d12', '$d13', '$d14', '$d15', '$d16', '$d17', '$d18', '$d21', '$d22', '$d23', '$d24', '$d25', '$d26', '$d27', '$d28', '$d31', '$d32', '$d33', '$d34', '$d35', '$d36', '$d37', '$d38', '$d41', '$d42', '$d43', '$d44', '$d45', '$d46', '$d47', '$d48', '$d51', '$d52', '$d53', '$d54', '$d55', '$d61', '$d62', '$d63', '$d64', '$d65', '$d71', '$d72', '$d73', '$d74', '$d75', '$d81', '$d82', '$d83', '$d84', '$d85', '$n11', '$n12', '$n13', '$n14', '$n15', '$n16', '$n17', '$n18', '$n21', '$n22', '$n23', '$n24', '$n25', '$n26', '$n27', '$n28', '$n31', '$n32', '$n33', '$n34', '$n35', '$n36', '$n37', '$n38', '$n41', '$n42', '$n43', '$n44', '$n45', '$n46', '$n47', '$n48', '$n51', '$n52', '$n53', '$n54', '$n55', '$n61', '$n62', '$n63', '$n64', '$n65', '$n71', '$n72', '$n73', '$n74', '$n75', '$n81', '$n82', '$n83', '$n84', '$n85', '$tipo_cliente', '$tomaMedicamento1', '$tomaMedicamento', '$cirugiasCuales', '$enfermedadesPequeno', '$motivoConsulta', '$nota', '$imagen', '$edad' )");


                                    
          $buscando=mysqli_query($conn3,"SELECT MAX(cliente_odonto_id) as max from cliente_odonto");
              $nrowl=mysqli_fetch_assoc($buscando);
              $id_cliente=$nrowl['max'];  
               echo "<script type='text/javascript'>
                        window.location='consultaCliente_odonto.php?clienteId=$id_cliente';
                     </script>";     

?>