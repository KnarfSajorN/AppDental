<?php

header('Content-Type: application/vnd.ms-excel; charset=UTF-8');
header('Content-Disposition: attachment; filename=RipsAU.xls');
include 'funciones/conn3.php';

$desde = $_POST['desde'];
$hasta = $_POST['hasta'];

   

 echo '<table border="1" cellpadding="2" cellspacing="0" width="100%">
    <tr>
        <td>Numero de la factura</td>
        <td>Codigo del prestador de servicios de salud</td>
        <td>Tipo de identificacion del usuario</td>
        <td>Numero de identificacion del usuario en el sistema</td>
        <td>Fecha de ingreso del usuario a observacion</td>
        <td>Hora de ingreso del usuario a observacion</td>
        <td>Numero de autorizacion</td>
        <td>Causa externa</td>
        <td>Diagnostico a la salida</td>
        <td>Diagnostico relacionado Nro. 1 a la salida</td>
        <td>Diagnostico relacionado Nro. 2 a la salida</td>
        <td>Diagnostico relacionado Nro. 3 a la salida</td>
        <td>Destino del usuario a la salida de observacion</td>
        <td>Estado a la salida</td>
        <td>Causa basica de muerte en urgencias</td>
        <td>Fecha de la salida del usuario en observacion</td>
        <td>Hora de la salida del usuario en observacion</td>

    </tr>';



$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));
        $queryListaH=mysqli_query($conn3,"SELECT * FROM    historiaClinica1 where fecha BETWEEN '$desde' and '$hasta'´AND tipoConsulta ='3'");
        $nrow=mysqli_num_rows($queryListaH);
        while($rowListaH=mysqli_fetch_array($queryListaH))
        {

            $ID_HISTORIA=$rowListaH['ID'];
            $id_cliente=$rowListaH['cliente_id'];
            $fecha=$rowListaH['Fecha'];
            $codigoConsulta =$rowListaH['codigoConsulta'];



            $conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));
                    $queryListaf=mysqli_query($conn3,"SELECT * FROM sOperacionInv where id_historia= '$ID_HISTORIA'");
                    $nrow=mysqli_num_rows($queryListaf);
                    while($rowListaf=mysqli_fetch_array($queryListaf))
                    {
                        $numeroDoc=$rowListaf['numeroDoc'];
                        $fechaOperacion=$rowListaf['fechaOperacion'];


                    }


            $conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));
                    $queryLista=mysqli_query($conn3,"SELECT * FROM    informacion_rips where id_historia = '$ID_HISTORIA' ");
                    $nrow=mysqli_num_rows($queryLista);
                    while($rowLista=mysqli_fetch_array($queryLista))
                    {
                        $fecha_ingreso_observacion = $rowLista['fecha_ingreso_observacion'];
                        $hora_ingreso_observacion = $rowLista['hora_ingreso_observacion'];
                        $destino_usuario_urgencias = $rowLista['destino_usuario_urgencias'];
                        $estado_salida_urgencias = $rowLista['estado_salida_urgencias'];
                        $causa_basica_urgencias = $rowLista['causa_basica_urgencias'];
                        $fecha_salida_urgencias = $rowLista['fecha_salida_urgencias'];
                        $hora_salida_urgencias = $rowLista['hora_salida_urgencias'];
                        
                        $numero_autorizacion=$rowLista['numero_autorizacion'];
                        $CUPS=$rowLista['CUPS'];
                        $finalidad_consulta=$rowLista['finalidad_consulta'];
                        $causa_externa=$rowLista['causa_externa'];
                        $cie10_1=$rowLista['cie10_1'];
                        $cie10_2=$rowLista['cie10_2'];
                        $cie10_3=$rowLista['cie10_3'];
                        $cie10_4=$rowLista['cie10_4'];
                        $tipo_diagnostico_principal=$rowLista['tipo_diagnostico_principal'];
                        $valor_consulta=$rowLista['valor_consulta'];
                        $valor_cuota_moderadora=$rowLista['valor_cuota_moderadora'];
                        $valor_neto_pagar=$rowLista['valor_neto_pagar'];
                     }
                    $queryLista_1=mysqli_query($conn3,"SELECT * FROM  cliente  where cliente_id= $id_cliente");
                
                    $nrow_l=mysqli_num_rows($queryLista_1);
                    while($rowLista_1=mysqli_fetch_array($queryLista_1))
                    {
                        $cedula = $rowLista_1['CODI_CLIENTE'];
                        $tipo_cliente = $rowLista_1['tipo_cliente'];
                        $cod_entidad=$rowLista_1['cod_entidad'];
                        $entidadSalud=$rowLista_1['entidadSalud'];
                    }            

         
     
echo "  <tr>
        <td>$numeroDoc</td>
        <td>$cod_entidad</td>
        <td>$tipo_cliente</td>
        <td>$cedula</td>
        <td>$fecha_ingreso_observacion</td>
        <td>$hora_ingreso_observacion</td>
        <td>$numero_autorizacion</td>
        <td>$causa_externa</td>
        <td>$cie10_1 </td>
        <td>$cie10_2 </td>
        <td>$cie10_3</td>
        <td>$cie10_4</td>
        <td>$destino_usuario_urgencias</td>
        <td>$estado_salida_urgencias</td>
        <td>$causa_basica_urgencias</td>
        <td>$fecha_salida_urgencias</td>
        <td>$hora_salida_urgencias</td>
        </tr>";
         

}






echo "</table>";
 
?>