<?php

header('Content-Type: application/vnd.ms-excel; charset=UTF-8');
header('Content-Disposition: attachment; filename=RipsAC.txt');
include 'funciones/conn3.php';


$desde = $_POST['desde'];
$hasta = $_POST['hasta'];

 /*echo 'Número de la factura;Codigo del prestador de servicios de salud;Tipo de identificacion del usuario;Numero de identificacion del usuario en el sistema;Fecha de la consulta;Numero de autorizacion;Codigo de la consulta;Finalidad de la consulta;Causa externa;Codigo del diagnostico principal;Codigo del diagnostico relacionado No. 1;Codigo del diagnostico relacionado No. 2;Codigo del diagnostico relacionado No. 3;Tipo de diagnostico principal;Valor de la consulta;Valor de la cuota moderadora;Valor neto a pagar'; */
         
  

 


$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));
        $queryListaH=mysqli_query($conn3,"SELECT * FROM    historiaClinica1 where fecha BETWEEN '$desde' and '$hasta'");
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

/*
$file = fopen("RipsAC.txt", "w");
      

echo fwrite($file,"$numeroDoc;$cod_entidad;$tipo_cliente;$cedula;$fecha;$numero_autorizacion;$codigoConsulta;$finalidad_consulta;$causa_externa;$cie10_1;$cie10_2;$cie10_3;$cie10_4;$tipo_diagnostico_principal;$valor_consulta;$valor_cuota_moderadora;$valor_neto_pagar". PHP_EOL);

fclose($file); */

echo "$numeroDoc;$cod_entidad;$tipo_cliente;$cedula;$fecha;$numero_autorizacion;$codigoConsulta;$finalidad_consulta;$causa_externa;$cie10_1;$cie10_2;$cie10_3;$cie10_4;$tipo_diagnostico_principal;$valor_consulta;$valor_cuota_moderadora;$valor_neto_pagar"."\n";


}





 
?>