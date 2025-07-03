<?php

header('Content-Type: application/vnd.ms-excel; charset=UTF-8');
header('Content-Disposition: attachment; filename=RipsAH.txt');
include 'funciones/conn3.php';

$desde = $_POST['desde'];
$hasta = $_POST['hasta'];


$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));
        $queryLista=mysqli_query($conn3,"SELECT * FROM    informacion_rips where fecha BETWEEN '$desde' and '$hasta' and tipo='3'");
        $nrow=mysqli_num_rows($queryLista);
        while($rowLista=mysqli_fetch_array($queryLista))
        {
            $id=$rowLista['id'];
            $id_cliente=$rowLista['id_cliente'];
            
            $via_ingreso_institucion=$rowLista['via_ingreso_institucion'];
            $fecha_ingreso_observacion=$rowLista['fecha_ingreso_observacion'];
            $hora_ingreso_observacion=$rowLista['hora_ingreso_observacion'];
            $numero_autorizacion=$rowLista['numero_autorizacion'];
            $causa_externa=$rowLista['causa_externa'];
            $cie10_1=$rowLista['cie10_1'];
            $cie10_1_egreso=$rowLista['cie10_1_egreso'];
            $cie10_2=$rowLista['cie10_2'];
            $cie10_3=$rowLista['cie10_3'];
            $cie10_4=$rowLista['cie10_4'];
            $cie10_complicacion=$rowLista['cie10_complicacion'];
            $estado_salida_urgencias=$rowLista['estado_salida_urgencias'];
            $diagnostico_muerte=$rowLista['diagnostico_muerte'];
            $fecha_salida_urgencias=$rowLista['fecha_salida_urgencias'];
            $hora_salida_urgencias=$rowLista['hora_salida_urgencias'];

         $queryLista_1=mysqli_query($conn3,"SELECT * FROM  cliente  where cliente_id= $id_cliente");
                
                    $nrow_l=mysqli_num_rows($queryLista_1);
                    while($rowLista_1=mysqli_fetch_array($queryLista_1))
                    {
                        $cedula = $rowLista_1['CODI_CLIENTE'];
                        $tipo_cliente = $rowLista_1['tipo_cliente'];
                        $cod_entidad=$rowLista_1['cod_entidad'];
                        $entidadSalud=$rowLista_1['entidadSalud'];
                    }      

        $conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));
                $queryListaf=mysqli_query($conn3,"SELECT * FROM sOperacionInv where id_historia= '$id' AND tipo_historia='3'");
                $nrow=mysqli_num_rows($queryListaf);
                while($rowListaf=mysqli_fetch_array($queryListaf))
                {
                    $numeroDoc=$rowListaf['numeroDoc'];
                    $fechaOperacion=$rowListaf['fechaOperacion'];


                }

         
     
echo "$numeroDoc;$cod_entidad;$tipo_cliente;$cedula;$via_ingreso_institucion;$fecha_ingreso_observacion;$hora_ingreso_observacion;$numero_autorizacion;$causa_externa;$cie10_1;$cie10_1_egreso;$cie10_2;$cie10_3;$cie10_4;$cie10_complicacion;$estado_salida_urgencias;$diagnostico_muerte;$fecha_salida_urgencias;$hora_salida_urgencias;"."\n";


}


 
?>