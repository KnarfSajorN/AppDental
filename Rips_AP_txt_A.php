<?php

header('Content-Type: application/vnd.ms-excel; charset=UTF-8');
header('Content-Disposition: attachment; filename=RipsAP.txt');
include 'funciones/conn3.php';

$desde = $_POST['desde'];
$hasta = $_POST['hasta'];

   



$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));
        $queryLista=mysqli_query($conn3,"SELECT * FROM    procedimientos  where fecha BETWEEN '$desde' and '$hasta'");
        $nrow=mysqli_num_rows($queryLista);
        while($rowLista=mysqli_fetch_array($queryLista))
        {
            $id_cliente=$rowLista['id_cliente'];

            $ID_HISTORIA=$rowLista['id'];
            $fecha=$rowLista['fecha'];
            $numero_autorizacion=$rowLista['numero_autorizacion'];
            $CUPS=$rowLista['CUPS'];
            $ambito_procedimiento =$rowLista['ambito_procedimiento'];
            $finalidad_procedimiento =$rowLista['ambito_procedimiento'];
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
            $personal_atiende=$rowLista['personal_atiende'];
          
            $cie10_complicacion=$rowLista['cie10_complicacion'];
            $realizacion_quirurgico=$rowLista['realizacion_quirurgico'];
            $valor_procedimiento=$rowLista['valor_procedimiento'];


$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));
        $queryListaf=mysqli_query($conn3,"SELECT * FROM sOperacionInv where id_historia= '$ID_HISTORIA' and tipo_historia= '1' ");
        $nrow=mysqli_num_rows($queryListaf);
        while($rowListaf=mysqli_fetch_array($queryListaf))
        {
            $numeroDoc=$rowListaf['numeroDoc'];
            $fechaOperacion=$rowListaf['fechaOperacion'];

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

         
     



  echo "$numeroDoc;$cod_entidad;$tipo_cliente;$cedula;$fecha;$numero_autorizacion;$CUPS;$ambito_procedimiento;$finalidad_procedimiento;$personal_atiende;$cie10_1;$cie10_2;$cie10_complicacion;$realizacion_quirurgico;$valor_procedimiento"."\n";
       

}





 
?>