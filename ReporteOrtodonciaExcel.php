<?php
$desde = $_POST['desde'];
$hasta = $_POST['hasta'];
header('Content-Type: application/vnd.ms-excel;');
header('Content-Disposition: attachment; filename=ReporteOrtodoncia_' . $desde . '_' . $hasta . '.xls');

include 'funciones/conn3.php';

function funcionMaster($filtro, $campoFiltrar, $campoImprimir, $tabla)
{
    include 'funciones/conn3.php';
    $query = mysqli_query($conn3, "SELECT * FROM $tabla where $campoFiltrar = '$filtro'");
    $nrowl = mysqli_num_rows($query);
    while ($row = mysqli_fetch_array($query)) {

        $text = $row[$campoImprimir];
    }
    return $text;
}


$usuario_id = $_POST['ID'];
	
$tabla = "Historia_Ortodoncia";
$ColumnasInvisibles = ["id", "cliente_id", "usuario_id", "firma", "EnfermedadActual", "Checks_Antecedentes", "AntecentesGinecobstetricos", "AntecedentesFamiliares", "SignosVitales", "Paraclinicos","InformacionAcudiente", "Imagenologia_Examen","Checks_Revision","Laboratorio_Examenes","SintomasGenerales","DiagnosticoAcupuntura","Impresion","PlanManejo","Incapacidades","Insumos","RecetaId","id_historia","tipoConsulta","codigoConsulta","CIE10_1","CIE10_2","CIE10_3","CIE10_4","receta_id","AP1","SI1","BL1","SP1","BLM1","IDis1","ICD1","BLM2","SI2","PO1","img1","LM","LM1","AP2","LM2","LM3","LM4","LM5","LM6","LM7","sucursal","Modal_Presupuesto","id_tablaOrtodoncia"];
$queryTabla = mysqli_query($conn3, "SHOW COLUMNS FROM $tabla");
while ($RowTabla = mysqli_fetch_array($queryTabla)) {
    if (!in_array($RowTabla["Field"], $ColumnasInvisibles)) {
        $Columnas[] = $RowTabla["Field"];
    }
}


echo "<table border='1' cellpadding='2' cellspacing='0' width='100%'>";
echo "<tr>";
echo "<td>Nombre</td>";
foreach ($Columnas as $key => $value) {
    $Valor = $value;
    $Titulo = $Valor;
    if ($Valor == "Fecha" or $Valor == "Hora") {
        $Titulo = $value;
    } 

    echo "<td>$Titulo</td>";
}
echo "</tr>";


$QueryHistoria = mysqli_query($conn3, "select hc.*,
us.NOMBRE_USUARIO as doctor ,
cl.nombre_cliente as paciente ,
cl.CODI_CLIENTE as cedula 
from Historia_Ortodoncia hc
left join usuarios us on hc.usuario_id = us.ID 
left join cliente cl on hc.cliente_id = cl.cliente_id 
where cl.ID_principal = '{$usuario_id}'
 AND (Fecha BETWEEN '{$desde}' AND '{$hasta}') ORDER BY id DESC");
while ($Rowhistoria = mysqli_fetch_array($QueryHistoria)) {

    echo "<tr>";
    echo "<td>
                " . funcionMaster($Rowhistoria["cliente_id"], "cliente_id", "nombre_cliente", "cliente") . "
                </td>";
    foreach ($Columnas as $key => $value) {
        echo "<td>
                " . $Rowhistoria[$value] . "
                </td>";
    }
    echo "</tr>";
}

echo "</table>";
