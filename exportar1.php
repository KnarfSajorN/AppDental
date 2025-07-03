<?php
//Exportar datos de php a Excel
header("Content-Type: application/vnd.ms-excel"); 
header("Expires: 0"); 
header("Cache-Control: must-revalidate, post-check=0, pre-check=0"); 
header("content-disposition: attachment;filename=Reportes.xls"); 




//************************************* AUDITOR *************************************
session_Start();
require("../../config/conexion.php");
require("../../config/funciones.php");

$user = ($_SESSION['usuario']);

           $consulta_mysql3="select * from Reports.dbo.T_Usuarios  where U_Usuario = '$user'";
           $resultado_consulta_mysql3 = mssql_query($consulta_mysql3);
           while($fila3 = mssql_fetch_array($resultado_consulta_mysql3))
            {
            $U_Rowid             =  ($fila3['U_Rowid']);
            }


$Nombre_Equipo = gethostbyaddr($_SERVER['REMOTE_ADDR']);
$Nombre_Reporte = 'Rentabilidad POR MARCA Excel';
$fechaA=strftime( "%Y-%m-%d", time() );
$Hora=strftime( "%H", time() );
$Minuto=strftime( "%M", time() );

$ID_Consulta2 = mysqli_query($conn3, "SELECT * FROM  reportesimoniz.consultas where ID_Usuario = '$U_Rowid' and Estatus = 1 and Fecha_Inicia = '$fechaA'");
    while($filaID2 = mysqli_fetch_array($ID_Consulta2))
    {$Estatus        =  ($filaID2['Estatus']);
     $Tiempo         =  ($filaID2['Tiempo']);
    }
/*    if ($Estatus == 1 and $Tiempo == 0)
    {
        echo '<div align="center">
              <h2>
              <br>
              <br>
              <br>
              <br>
              <br>
               Tiene otra cosulta en curso, espera a que finalice 
              </h2>
              </div>';
    }
    
elseif ($Estatus <> 1 or $Tiempo <> 0) 
{    */
$time_start = microtime(true);
require('fpdf.php');
$Nombre_Equipo = gethostbyaddr($_SERVER['REMOTE_ADDR']);

$fechaA=strftime( "%Y-%m-%d", time() );
$Hora=strftime( "%H", time() );
$Minuto=strftime( "%M", time() );



mysqli_query($conn3, "INSERT INTO  reportesimoniz.consultas (`ID` ,`Reporte` ,`Usuario`,`ID_Usuario` ,`Fecha_Finalizado` ,`Tiempo` ,`Estatus` ,`NompreEquipo`,`Fecha_Inicia`,`Hora_Ini`,`Minuto_Ini`)
VALUES 
('' ,  '$Nombre_Reporte',  '$user', '$U_Rowid', '',  '0',  '1',  '$Nombre_Equipo','$fechaA','$Hora','$Minuto');");

$ID_Consulta = mysqli_query($conn3, "SELECT MAX(ID) as ID FROM  reportesimoniz.consultas");
    while($filaID = mysqli_fetch_array($ID_Consulta))
    {$ID        =  ($filaID['ID']);}

mysqli_close($conn3);

//************************************* AUDITOR *************************************

?>

<HTML LANG="es">
<TITLE>::. Exportacion de Datos .::</TITLE>


</head>
<body>
<?php
    $Fecha1       = $_POST ['Fecha1'];
    $Fecha2       = $_POST ['Fecha2'];
    $FechaM1 = str_replace("-","",$Fecha1);
    $FechaM2 = str_replace("-","",$Fecha2); 
include '../../config/conexion.php';

$sql = "
select   
f461_id_cia
,I_CRI_UNIDAD_NEGOCIO as UN
,I_CRI_MARCA as MARCA
,sum(case when f350_id_tipo_docto='FVE' then (case when f470_vlr_bruto_alt=0 or f470_vlr_bruto_alt is null  then  f470_vlr_bruto else f470_vlr_bruto_alt end ) else 0 end) as VLR_BRUTO_FAC
,sum(case when f350_id_tipo_docto='NDV' then (case when f470_vlr_bruto_alt=0 or f470_vlr_bruto_alt is null  then  f470_vlr_bruto else f470_vlr_bruto_alt end ) else 0 end) as VLR_BRUTO_DEV
,((sum(case when f350_id_tipo_docto='FVE' then (case when f470_vlr_bruto_alt=0 or f470_vlr_bruto_alt is null  then  f470_vlr_bruto else f470_vlr_bruto_alt end ) else 0 end))-(sum(case when f350_id_tipo_docto='NDV' then (case when f470_vlr_bruto_alt=0 or f470_vlr_bruto_alt is null  then  f470_vlr_bruto else f470_vlr_bruto_alt end ) else 0 end))) as VENT_BRUTA_REAL
,sum(case when f350_id_tipo_docto='FVE' then (isnull(f470_costo_prom_tot, 0) ) else 0 end) as COST_PROM_FAC
,sum(case when f350_id_tipo_docto='NDV' then (isnull(f470_costo_prom_tot, 0) ) else 0 end) as COST_PROM_DEV
,((sum(case when f350_id_tipo_docto='FVE' then (isnull(f470_costo_prom_tot, 0) ) else 0 end))-(sum(case when f350_id_tipo_docto='NDV' then (isnull(f470_costo_prom_tot, 0) ) else 0 end))) as COSTO_REAL
,(((sum(case when f350_id_tipo_docto='FVE' then (case when f470_vlr_bruto_alt=0 or f470_vlr_bruto_alt is null  then  f470_vlr_bruto else f470_vlr_bruto_alt end ) else 0 end))-(sum(case when f350_id_tipo_docto='NDV' then (case when f470_vlr_bruto_alt=0 or f470_vlr_bruto_alt is null  then  f470_vlr_bruto else f470_vlr_bruto_alt end ) else 0 end)))-((sum(case when f350_id_tipo_docto='FVE' then (isnull(f470_costo_prom_tot, 0) ) else 0 end))-(sum(case when f350_id_tipo_docto='NDV' then (isnull(f470_costo_prom_tot, 0) ) else 0 end)))) as UTIL_BRUTA
,((((sum(case when f350_id_tipo_docto='FVE' then (case when f470_vlr_bruto_alt=0 or f470_vlr_bruto_alt is null  then  f470_vlr_bruto else f470_vlr_bruto_alt end ) else 0 end))-(sum(case when f350_id_tipo_docto='NDV' then (case when f470_vlr_bruto_alt=0 or f470_vlr_bruto_alt is null  then  f470_vlr_bruto else f470_vlr_bruto_alt end ) else 0 end)))-((sum(case when f350_id_tipo_docto='FVE' then (isnull(f470_costo_prom_tot, 0) ) else 0 end))-(sum(case when f350_id_tipo_docto='NDV' then (isnull(f470_costo_prom_tot, 0) ) else 0 end))))         /         case when ((sum(case when f350_id_tipo_docto='FVE' then (case when f470_vlr_bruto_alt=0 or f470_vlr_bruto_alt is null  then  f470_vlr_bruto else f470_vlr_bruto_alt end ) else 0 end))-(sum(case when f350_id_tipo_docto='NDV' then (case when f470_vlr_bruto_alt=0 or f470_vlr_bruto_alt is null  then  f470_vlr_bruto else f470_vlr_bruto_alt end ) else 0 end)))=0 then 0.001 else ((sum(case when f350_id_tipo_docto='FVE' then (case when f470_vlr_bruto_alt=0 or f470_vlr_bruto_alt is null  then  f470_vlr_bruto else f470_vlr_bruto_alt end ) else 0 end))-(sum(case when f350_id_tipo_docto='NDV' then (case when f470_vlr_bruto_alt=0 or f470_vlr_bruto_alt is null  then  f470_vlr_bruto else f470_vlr_bruto_alt end ) else 0 end))) end)  as PORC_UTIL
,sum(case when f350_id_tipo_docto='FVE' then (isnull(f470_vlr_dscto_linea, 0) ) else 0 end) as VLR_DESC_FAC
,sum(case when f350_id_tipo_docto='NDV' then (isnull(f470_vlr_dscto_linea, 0) ) else 0 end) as VLR_DESC_DEV
,((sum(case when f350_id_tipo_docto='FVE' then (isnull(f470_vlr_dscto_linea, 0) ) else 0 end))-(sum(case when f350_id_tipo_docto='NDV' then (isnull(f470_vlr_dscto_linea, 0) ) else 0 end))) as TOTAL_VLR_DESC
,((((sum(case when f350_id_tipo_docto='FVE' then (isnull(f470_vlr_dscto_linea, 0) ) else 0 end))-(sum(case when f350_id_tipo_docto='NDV' then (isnull(f470_vlr_dscto_linea, 0) ) else 0 end))))       /           case when (((sum(case when f350_id_tipo_docto='FVE' then (case when f470_vlr_bruto_alt=0 or f470_vlr_bruto_alt is null  then  f470_vlr_bruto else f470_vlr_bruto_alt end ) else 0 end))-(sum(case when f350_id_tipo_docto='NDV' then (case when f470_vlr_bruto_alt=0 or f470_vlr_bruto_alt is null  then  f470_vlr_bruto else f470_vlr_bruto_alt end ) else 0 end))))=0 then 0.001 else (((sum(case when f350_id_tipo_docto='FVE' then (case when f470_vlr_bruto_alt=0 or f470_vlr_bruto_alt is null  then  f470_vlr_bruto else f470_vlr_bruto_alt end ) else 0 end))-(sum(case when f350_id_tipo_docto='NDV' then (case when f470_vlr_bruto_alt=0 or f470_vlr_bruto_alt is null  then  f470_vlr_bruto else f470_vlr_bruto_alt end ) else 0 end)))) end) as DESCUENTOS
,(((((sum(case when f350_id_tipo_docto='FVE' then (case when f470_vlr_bruto_alt=0 or f470_vlr_bruto_alt is null  then  f470_vlr_bruto else f470_vlr_bruto_alt end ) else 0 end))-(sum(case when f350_id_tipo_docto='NDV' then (case when f470_vlr_bruto_alt=0 or f470_vlr_bruto_alt is null  then  f470_vlr_bruto else f470_vlr_bruto_alt end ) else 0 end)))-((sum(case when f350_id_tipo_docto='FVE' then (isnull(f470_costo_prom_tot, 0) ) else 0 end))-(sum(case when f350_id_tipo_docto='NDV' then (isnull(f470_costo_prom_tot, 0) ) else 0 end)))))-(((sum(case when f350_id_tipo_docto='FVE' then (isnull(f470_vlr_dscto_linea, 0) ) else 0 end))-(sum(case when f350_id_tipo_docto='NDV' then (isnull(f470_vlr_dscto_linea, 0) ) else 0 end))))) as UTIL_NETA
,(((((((sum(case when f350_id_tipo_docto='FVE' then (case when f470_vlr_bruto_alt=0 or f470_vlr_bruto_alt is null  then  f470_vlr_bruto else f470_vlr_bruto_alt end ) else 0 end))-(sum(case when f350_id_tipo_docto='NDV' then (case when f470_vlr_bruto_alt=0 or f470_vlr_bruto_alt is null  then  f470_vlr_bruto else f470_vlr_bruto_alt end ) else 0 end)))-((sum(case when f350_id_tipo_docto='FVE' then (isnull(f470_costo_prom_tot, 0) ) else 0 end))-(sum(case when f350_id_tipo_docto='NDV' then (isnull(f470_costo_prom_tot, 0) ) else 0 end)))))-(((sum(case when f350_id_tipo_docto='FVE' then (isnull(f470_vlr_dscto_linea, 0) ) else 0 end))-(sum(case when f350_id_tipo_docto='NDV' then (isnull(f470_vlr_dscto_linea, 0) ) else 0 end))))))      /      case when (((sum(case when f350_id_tipo_docto='FVE' then (case when f470_vlr_bruto_alt=0 or f470_vlr_bruto_alt is null  then  f470_vlr_bruto else f470_vlr_bruto_alt end ) else 0 end))-(sum(case when f350_id_tipo_docto='NDV' then (case when f470_vlr_bruto_alt=0 or f470_vlr_bruto_alt is null  then  f470_vlr_bruto else f470_vlr_bruto_alt end ) else 0 end))))=0 then 0.001 else (((sum(case when f350_id_tipo_docto='FVE' then (case when f470_vlr_bruto_alt=0 or f470_vlr_bruto_alt is null  then  f470_vlr_bruto else f470_vlr_bruto_alt end ) else 0 end))-(sum(case when f350_id_tipo_docto='NDV' then (case when f470_vlr_bruto_alt=0 or f470_vlr_bruto_alt is null  then  f470_vlr_bruto else f470_vlr_bruto_alt end ) else 0 end)))) end) as PORC_UTIL_NETA
from UnoEE1.dbo.t461_cm_docto_factura_venta 
INNER JOIN UnoEE1.dbo.t350_co_docto_contable t350_fact WITH (NOLOCK) ON t350_fact.f350_rowid = f461_rowid_docto and f350_id_tipo_docto in ('FVE','NDV') and f350_ind_estado=1
INNER JOIN UnoEE1.dbo.t028_mm_clases_documento WITH (NOLOCK) ON f028_id = f461_id_clase_docto 
INNER JOIN [UnoEE1].[dbo].[t034_mm_grupos_clases_docto] WITH (NOLOCK) ON [f028_id_grupo_clase_docto]=[f034_id]
INNER JOIN [UnoEE1].[dbo].[t054_mm_estados] WITH (NOLOCK) ON f054_id_grupo_clase_docto=f034_id AND f350_ind_estado=[f054_id]
INNER JOIN UnoEE1.dbo.t470_cm_movto_invent WITH (NOLOCK) ON f470_rowid_docto_fact = t350_fact.f350_rowid 		
INNER JOIN [UnoEE1].[dbo].t146_mc_motivos as t146 WITH (NOLOCK) ON f470_id_cia=t146.f146_id_cia and f470_id_motivo=t146.f146_id  and f146_id_concepto=f470_id_concepto
INNER JOIN [Reports].[dbo].[T_Items] as t120 WITH (NOLOCK) ON f470_id_cia=I_CIA and f470_rowid_item_ext=I_ROWID_ITEM
INNER JOIN UnoEE1.dbo.t200_mm_terceros as t200 WITH (NOLOCK) ON f461_rowid_tercero_vendedor=f200_rowid
where f461_id_cia = 2 and 
convert(nvarchar,f350_fecha,112) between Convert(nvarchar,'$FechaM1',112) and convert(nvarchar,'$FechaM2',112)
AND I_CRI_UNIDAD_NEGOCIO <> 'ADMINISTRACION' 
group by f461_id_cia,I_CRI_UNIDAD_NEGOCIO,I_CRI_MARCA
order by 2,3
";

/*
$consulta01 = mssql_query ("
select distinct f025_id, f025_descripcion 
from UnoEE1.dbo.t025_mm_medios_pago
where f025_id_cia=2 and f025_descripcion between '$pagodesde' and '$pagohasta'  order by 2
        ");
*/
$result=mssql_query($sql);

?>

<TABLE BORDER=1 align="center" CELLPADDING=1 CELLSPACING=1>
<TR>
<TD>UN</TD>
<TD>MARCA</TD>
<TD>Valor Venta Bruta</TD>
<TD>Valor Devoluciones</TD>
<TD>Venta Bruta Real </TD>
<TD>Costo De Ventas </TD>
<TD>Costo Devoluciones </TD>
<TD>Costo Real </TD>
<TD>Utilidad Bruta </TD>
<TD>% Utilidad Bruta </TD>
<TD>Descuentos en Factura </TD>
<TD>Descuentos en Devoluciones </TD>
<TD>Total Descuentos </TD>
<TD>% Descuento total </TD>
<TD>Utilidad Neta </TD>
<TD>%Utilidad Neta </TD>
<TD>valor Inventario a la fecha </TD>
</TR>
<?php
$cont = 0;
while($row = mssql_fetch_array($result)) 
{
    $VLR_BRUTO_FAC      = $row["VLR_BRUTO_FAC"];
$VLR_BRUTO_DEV      = $row["VLR_BRUTO_DEV"];
$VENT_BRUTA_REAL    = $row["VENT_BRUTA_REAL"];
$COST_PROM_FAC      = $row["COST_PROM_FAC"];
$COST_PROM_DEV      = $row["COST_PROM_DEV"];
$COSTO_REAL         = $row["COSTO_REAL"];
$UTIL_BRUTA         = $row["UTIL_BRUTA"];
$PORC_UTIL          = $row["PORC_UTIL"];
$VLR_DESC_FAC       = $row["VLR_DESC_FAC"];
$VLR_DESC_DEV       = $row["VLR_DESC_DEV"];

$TOTAL_VLR_DESC     = $row["TOTAL_VLR_DESC"];
$DESCUENTOS         = $row["DESCUENTOS"];
$UTIL_NETA          = $row["UTIL_NETA"];
$PORC_UTIL_NETA     = $row["PORC_UTIL_NETA"];

$PORC_UTIL = $PORC_UTIL * 100;
$DESCUENTOS  = $DESCUENTOS  * 100;
$PORC_UTIL_NETA  = $PORC_UTIL_NETA * 100;



$VLR_BRUTO_FAC_Total    =   $VLR_BRUTO_FAC  + $VLR_BRUTO_FAC_Total;
$VLR_BRUTO_DEV_Total    =   $VLR_BRUTO_DEV  + $VLR_BRUTO_DEV_Total;
$VENT_BRUTA_REAL_Total  =   $VENT_BRUTA_REAL + $VENT_BRUTA_REAL_Total;
$COST_PROM_FAC_Total    =   $COST_PROM_FAC  + $COST_PROM_FAC_Total;
$COST_PROM_DEV_Total    =   $COST_PROM_DEV  + $COST_PROM_DEV_Total;
$COSTO_REAL_Total       =   $COSTO_REAL     + $COSTO_REAL_Total;
$UTIL_BRUTA_Total       =   $UTIL_BRUTA     + $UTIL_BRUTA_Total;
$PORC_UTIL_Total        =   $PORC_UTIL      + $PORC_UTIL_Total;
$VLR_DESC_FAC_Total     =   $VLR_DESC_FAC   + $VLR_DESC_FAC_Total;
$VLR_DESC_DEV_Total     =   $VLR_DESC_DEV   + $VLR_DESC_DEV_Total;
$TOTAL_VLR_DESC_Total     =   $TOTAL_VLR_DESC   + $TOTAL_VLR_DESC_Total;
$DESCUENTOS_Total     =   $DESCUENTOS   + $DESCUENTOS_Total;
$UTIL_NETA_Total     =   $UTIL_NETA   + $UTIL_NETA_Total;
$PORC_UTIL_NETA_Total     =   $PORC_UTIL_NETA   + $PORC_UTIL_NETA_Total;


   
$UN         = $row ['UN'];    
$MARCA      = $row ['MARCA'];    
$sql2 = "
SELECT SUM(distinct f400_costo_prom_tot) as SumCosto
from UnoEE1.dbo.t400_cm_existencia as t400 
INNER JOIN [Reports].[dbo].[T_Items] as t120 WITH (NOLOCK) ON f400_id_cia=I_CIA and f400_rowid_item_ext=I_ROWID_ITEM
Where I_CIA=2 and I_CRI_UNIDAD_NEGOCIO='$UN' and I_CRI_MARCA='$MARCA'

";
$result2=mssql_query($sql2);
while($row2 = mssql_fetch_array($result2)) 
{    
$SumCosto = $row2["SumCosto"];
}
$SumCosto_Total     =   $SumCosto   + $SumCosto_Total;

printf("<tr>
<td>%s</td> 
<td>%s</td>
<td>%s</td>
<td>%s</td>
<td>%s</td>
<td>%s</td>
<td>%s</td>
<td>&nbsp;%s</td>
<td>%s</td> 
<td>%s</td>
<td>%s</td>
<td>%s</td>
<td>%s</td>
<td>%s</td>
<td>%s</td>
<td>%s</td>
<td>%s</td> 


</tr>",
$UN,
$MARCA,
number_format(($VLR_BRUTO_FAC)  ,2,".",","),        
number_format(($VLR_BRUTO_DEV)  ,2,".",","),        
number_format(($VENT_BRUTA_REAL),2,".",","),        
number_format(($COST_PROM_FAC)  ,2,".",","),        
number_format(($COST_PROM_DEV)  ,2,".",","),        
number_format(($COSTO_REAL)     ,2,".",","),        
number_format(($UTIL_BRUTA)     ,2,".",","),        
number_format(($PORC_UTIL)      ,2,".",","),        
number_format(($VLR_DESC_FAC)   ,2,".",","),        
number_format(($VLR_DESC_DEV)   ,2,".",","),        
number_format(($TOTAL_VLR_DESC) ,2,".",","),        
number_format(($DESCUENTOS)     ,2,".",",").'%',        
number_format(($UTIL_NETA)      ,2,".",","),        
number_format(($PORC_UTIL_NETA) ,2,".",",").'%',        
number_format(($SumCosto)       ,2,".",",")        
//$SumCosto
      
);  
$cont = $cont +1 ;
}
mssql_free_result($result);


echo '<TR>
<TD></TD>
<TD><strong>TOTALES :</strong></TD>
<TD><strong>'.number_format(($VLR_BRUTO_FAC_Total),2,".",",").'</strong></TD>
<TD><strong>'.number_format(($VLR_BRUTO_DEV_Total),2,".",",").'</strong></TD>
<TD><strong>'.number_format(($VENT_BRUTA_REAL_Total),2,".",",").'</strong></TD>
<TD><strong>'.number_format(($COST_PROM_FAC_Total),2,".",",").'</strong></TD>
<TD><strong>'.number_format(($COST_PROM_DEV_Total),2,".",",").'</strong></TD>
<TD><strong>'.number_format(($COSTO_REAL_Total),2,".",",").'</strong></TD>
<TD><strong>'.number_format(($UTIL_BRUTA_Total),2,".",",").'</strong></TD>
<TD><strong>'.number_format(($PORC_UTIL_Total),2,".",",").'</strong></TD>
<TD><strong>'.number_format(($VLR_DESC_FAC_Total),2,".",",").'</strong></TD>
<TD><strong>'.number_format(($VLR_DESC_DEV_Total),2,".",",").'</strong></TD>
<TD><strong>'.number_format(($TOTAL_VLR_DESC_Total),2,".",",").'</strong></TD>
<TD><strong>'.number_format(($DESCUENTOS_Total),2,".",",").'%</strong></TD>
<TD><strong>'.number_format(($UTIL_NETA_Total),2,".",",").'</strong></TD>
<TD><strong>'.number_format(($PORC_UTIL_NETA_Total),2,".",",").'%</strong></TD>
<TD><strong>'.number_format(($SumCosto_Total),2,".",",").'</strong></TD>


</TR>';



//************************************* AUDITOR *************************************
$time_end = microtime(true);
$time_total = $time_end - $time_start;

include '../../config/conexion.php';
$time_totalm = $time_total/60;
mysqli_query($conn3, "UPDATE  reportesimoniz.consultas SET  Tiempo =  '$time_totalm',Estatus= '2' WHERE  consultas.ID ='$ID';");
//************************************* AUDITOR *************************************






?>
</table>
</body>
</html>
