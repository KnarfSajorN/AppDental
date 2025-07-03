<?php
// historia audiometria -> id = 34 
function removeEmptyElements(&$element)
    {
        if (is_array($element)) {
            if ($key = key($element)) {
                $element[$key] = array_filter($element);
            }

            if (count($element) != count($element, COUNT_RECURSIVE)) {
                $element = array_filter(current($element), __FUNCTION__);
            }

            $element = array_filter($element);

            return $element;
        } else {
            return empty($element) ? false : $element;
        }
    }


//array_filter($_POST['InformacionAcudiente'], 'removeEmptyElements') -> esto se usa para  eliminar campos vacios en un array
$contador="0";
$LogoAudiometria.='<table class="tg"><thead><tr><th></th><th>Oído Derecho</th><th>Oído Izquierdo</th><th>Central</th></tr></thead><tbody><tr>';
foreach ($_POST['LogoAudiometria'] as $key => $value) {
  $LogoAudiometria .= "</tr>";
    //$LogoAudiometria .= $key.": ".$value.'<br>';
  $LogoAudiometria .= "<td>".$key."</td>";
    foreach ($value as $key1 => $value1) {
        $LogoAudiometria .= "<td>".$value1.'</td>';
        if($value1<>"")
        {
          $contador++;
        }
    }
  $LogoAudiometria .= "</tr>";
}
$LogoAudiometria .= "</tbody></table>";
if($contador=="0")
{
  $LogoAudiometria = '<div style="display:none;">'.$LogoAudiometria."</div>";
} 


$contador="0";
$TimpanogramaTabla='<div class="col-md-12"><h3> Impedanciometría </h3></div>';
$Campos_Timpanograma = ["","ml","daPa","ml","daPa"];
foreach ($_POST['Timpanograma'] as $key => $value) {
  $TimpanogramaTabla.='<table class="tg" style="width: 50%;float: left;"><thead><tr><th colspan="2"> Oído '.$key.'</th></tr></thead><tbody>';
  $k="0";
    foreach ($value as $key1 => $value1) {
        $TimpanogramaTabla .= '<tr><td>'.$key1.'</td>'.'<td>'.$value1.' '.$Campos_Timpanograma[$k].'</td>'.'</tr>';
        if($value1<>"")
        {
          $contador++;
        }
        $k++;
    }
  $TimpanogramaTabla .= '</tbody></table>';
}
if($contador=="0")
{
  $TimpanogramaTabla = '<div style="display:none;">'.$TimpanogramaTabla."</div>";
} 


$contador="0";
$EstapedialesTabla='<div class="col-md-12"><h3> Reflejos Estapediales </h3></div>';
$EstapedialesTabla.='<table class="tg" style="width: 50%;float: left;"><thead><tr><th>Frecuencia</th><th colspan="2">Reflejos Ipsilaterales</th></tr></thead><tbody><tr><td></td><td> Oído Derecho</td><td> Oído Izquierdo </td></tr>';
foreach ($_POST['Reflejos_Ipsilaterales'] as $key => $value) {
  $EstapedialesTabla.='<tr><td>'.$key.'Hz</td>';
    foreach ($value as $key1 => $value1) {
        $EstapedialesTabla .= '<td>'.$value1.'</td>';
        if($value1<>"dB")
        {
          $contador++;
        }
    }
  $EstapedialesTabla .= '</tr>';
  
}
$EstapedialesTabla .= '</tbody></table>';

$EstapedialesTabla.='<table class="tg" style="width: 50%;float: left;"><thead><tr><th>Frecuencia</th><th colspan="2">Reflejos Contralaterales</th></tr></thead><tbody><tr><td></td><td> Oído Derecho</td><td> Oído Izquierdo </td></tr>';
foreach ($_POST['Reflejos_Contralaterales'] as $key => $value) {
  $EstapedialesTabla.='<tr><td>'.$key.'Hz</td>';
    foreach ($value as $key1 => $value1) {
        $EstapedialesTabla .= '<td>'.$value1.'</td>';
        if($value1<>"dB")
        {
          $contador++;
        }
    }
  $EstapedialesTabla .= '</tr>';
  
}
$EstapedialesTabla .= '</tbody></table>';

if($contador=="0")
{
  $EstapedialesTabla = '<div style="display:none;">'.$EstapedialesTabla."</div>";
}


$Valoracion_Tinnitus='
    <table style="width:100%" class="table tg"> 
      <thead>
        <tr>
          <th></th>
          <th>Oído Derecho</th>
          <th>Oído Izquierdo</th>
          <th>Central</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Tipo</td>
          <td>'.$_POST["Tinnitus"]["Tipo"]["Derecho"].' </td>
          <td>'.$_POST["Tinnitus"]["Tipo"]["Izquierdo"].' </td>
          <td>'.$_POST["Tinnitus"]["Tipo"]["Central"].' </td>
        </tr>
        <tr>
          <td>Nivel de Intensidad</td>
          <td>'.$_POST["Tinnitus"]["Nivel de Intensidad"]["Derecho"].' </td>
          <td>'.$_POST["Tinnitus"]["Nivel de Intensidad"]["Izquierdo"].' </td>
          <td>'.$_POST["Tinnitus"]["Nivel de Intensidad"]["Central"].' </td>
        </tr>
        <tr>
          <td>Frecuencia</td>
          <td>'.$_POST["Tinnitus"]["Frecuencia"]["Derecho"].' </td>
          <td>'.$_POST["Tinnitus"]["Frecuencia"]["Izquierdo"].' </td>
          <td>'.$_POST["Tinnitus"]["Frecuencia"]["Central"].' </td>
        </tr>
        <tr>
          <td>Index</td>
          <td>'.$_POST["Tinnitus"]["Index"]["Derecho"].' </td>
          <td>'.$_POST["Tinnitus"]["Index"]["Izquierdo"].' </td>
          <td>'.$_POST["Tinnitus"]["Index"]["Central"].' </td>
        </tr>
      </tbody>
    </table>
    <table style="width:100%" class="table tg">
    <tr><td>Prueba de Inhibición de Tinnitus</td></tr>
    <tr><td>'.$_POST["Tinnitus"]["Prueba de Inhibición de Tinnitus"].'</td></tr>
    </table>
';
$Valoracion_Tinnitus = mysqli_real_escape_string($conn3,$Valoracion_Tinnitus);

$Logo_Francesa='
<table style="width:100%" class="table tg"> 
      <thead>
        <tr>
          <th></th>
          <th>Oído Derecho</th>
          <th>Oído Izquierdo</th>
          <th>Central</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>U. de Inteligibilidad</td>
          <td>'.$_POST["LogoFrancesa"]["U. de Inteligibilidad"]["Derecho"].' </td>
          <td>'.$_POST["LogoFrancesa"]["U. de Inteligibilidad"]["Izquierdo"].' </td>
          <td>'.$_POST["LogoFrancesa"]["U. de Inteligibilidad"]["Central"].' </td>
        </tr>
        <tr>
          <td>U. de Discriminación</td>
          <td>'.$_POST["LogoFrancesa"]["U. de Discriminación"]["Derecho"].' </td>
          <td>'.$_POST["LogoFrancesa"]["U. de Discriminación"]["Izquierdo"].' </td>
          <td>'.$_POST["LogoFrancesa"]["U. de Discriminación"]["Central"].' </td>
        </tr>
        <tr>
          <td>% Discriminación</td>
          <td>'.$_POST["LogoFrancesa"]["% Discriminación"]["Derecho"].' </td>
          <td>'.$_POST["LogoFrancesa"]["% Discriminación"]["Izquierdo"].' </td>
          <td>'.$_POST["LogoFrancesa"]["% Discriminación"]["Central"].' </td>
        </tr>
      </tbody>
    </table>
';
$Logo_Francesa = mysqli_real_escape_string($conn3,$Logo_Francesa);

$Incapacidad_Tinnitus='
<table style="width:100%" class="table tg"> 
      <thead>
        <tr>
          <th colspan="2">Aspecto</th>
          <th>Respuesta</th>
        </tr>
      </thead>
      <tbody style="text-align:center">
        <tr>
          <td colspan="2">Actividades Afectadas</td>
          <td>'.$_POST["IncapacidadTinnitus"]["Actividades Afectadas"].' </td>
        </tr>
        <tr>
          <td rowspan="4">THI</td>
          <td> Severidad del Tinnitus </td>
          <td>'.$_POST["IncapacidadTinnitus"]["Severidad del Tinnitus"].' </td>
        </tr>
        <tr>
          <td> Sub Escala Funcional </td>
          <td>'.$_POST["IncapacidadTinnitus"]["Sub Escala Funcional"].' </td>
        </tr>
        <tr>
          <td> Sub Escala Emocional </td>
          <td>'.$_POST["IncapacidadTinnitus"]["Sub Escala Emocional"].' </td>
        </tr>
        <tr>
          <td> Sub Escala Catastrófica </td>
          <td>'.$_POST["IncapacidadTinnitus"]["Sub Escala Catastrófica"].' </td>
        </tr>
        <tr>
          <td rowspan="3">EVA</td>
          <td> Severidad </td>
          <td>'.$_POST["IncapacidadTinnitus"]["Severidad"].' </td>
        </tr>
        <tr>
          <td> Molestia </td>
          <td>'.$_POST["IncapacidadTinnitus"]["Molestia"].' </td>
        </tr>
        <tr>
          <td> Efectos en la Vida </td>
          <td>'.$_POST["IncapacidadTinnitus"]["Efectos en la Vida"].' </td>
        </tr>
        <tr>
          <td> TQR </td>
          <td>'.$_POST["IncapacidadTinnitus"]["TQR"].' </td>
          <td>'.$_POST["IncapacidadTinnitus"]["TQR 1"].' </td>
        </tr>
      </tbody>
    </table>
';
$Incapacidad_Tinnitus = mysqli_real_escape_string($conn3,$Incapacidad_Tinnitus);

//echo $Incapacidad_Tinnitus;


function TablasHTML($thead,$arreglo,$saltosfinales)
{
  
  $arreglo = DatosIngresarMysqli($arreglo);
  $contador="0";
  $TablaDinamica="<table class=\'tg\' style=\'width:100%\'><thead>{$thead}</thead><tbody>";
  foreach ($arreglo as $key => $value) {
  $TablaDinamica .= "<tr>";
    //$LogoAudiometria .= $key.": ".$value.'<br>';
  $TablaDinamica .= "<td>{$key}</td>";
    foreach ($value as $key1 => $value1) {
        $TablaDinamica .= "<td>{$value1}</td>";
        if($value1<>""){$contador++;}
    }
  $TablaDinamica .= "</tr>";
  }
  $TablaDinamica .= "</tbody></table>";

  if($contador=="0")
  {
  $Tabla = "<div style=\'display:none;\'>{$TablaDinamica}</div>";
  }
  else
  {
    $Tabla = $TablaDinamica;
  }

  return $Tabla.$saltosfinales;
}

function TablasHTMLV2($thead,$arreglo,$saltosfinales)
{
  
  $arreglo = DatosIngresarMysqli($arreglo);
  $contador="0";
  $TablaDinamica="<table class=\'tg\' style=\'width:100%\'><thead>{$thead}</thead><tbody>";
  foreach ($arreglo as $key => $value) {
  $TablaDinamica .= "<tr>";

  foreach ($arreglo as $key => $value) {
  $TablaDinamica .= "<td>{$key}</td>";
    foreach ($value as $key1 => $value1) 
    {
      foreach ($value1 as $key2 => $value2) 
      {
        $TablaDinamica .= "<td colspan=\'{$key2}\'>{$value2}</td>";
        if($value2<>""){$contador++;}
      }
    }
  $TablaDinamica .= "</tr>";
  }
  $TablaDinamica .= "</tbody></table>";

  if($contador=="0")
  {
  $Tabla = "<div style=\'display:none;\'>{$TablaDinamica}</div>";
  }
  else
  {
    $Tabla = $TablaDinamica;
  }

  return $Tabla.$saltosfinales;
  }
}


$Desarrollo_Conducta_Auditiva_1=TablasHTML("<tr><th></th><th>Instrumento</th><th>Respuesta</th></tr>",$_POST["ConductaAuditiva"],"<br>");

$Desarrollo_Conducta_Auditiva_2=TablasHTML("<tr><th></th><th>Respuesta</th></tr>",$_POST["ConductaAuditiva_1"],"<br>");

$Desarrollo_Conducta_Auditiva_3=TablasHTML("",$_POST["ConductaAuditiva_2"],"<br>");

$Desarrollo_Conducta_Auditiva_4=TablasHTML("",$_POST["ConductaAuditiva_3"],"<br>");

$Desarrollo_Conducta_Auditiva_5=TablasHTML("<tr><th>Frecuencia</th><th>250</th><th>500</th><th>2000</th><th>3000</th><th>4000</th><th>6000</th></tr>",$_POST["ConductaAuditiva_4"],"<br>");

$Desarrollo_Conducta_Auditiva_6=TablasHTML("",$_POST["ConductaAuditiva_5"],"<br>");

$Desarrollo_Conducta_Auditiva_7=TablasHTML("<tr><th></th><th>Nivel de Detección de Voz</th><th>Nivel de Recepción de la Palabra</th></tr>",$_POST["ConductaAuditiva_6"],"<br>");

$Desarrollo_Conducta_Auditiva_7.= TablasHTML("", $_POST["ConductaAuditiva_7"], "<br>");

$Antecedentes_Personales_Audiologicos=TablasHTMLV2("<tr><th>ANTECEDENTES PERSONALES</th><th>SI</th><th>NO</th><th>DESCRIPCION</th></tr>",$_POST["AntecedentesPersonalesAudiologicos"],"<br>");

$Antecedentes_Otologicos=TablasHTMLV2("<tr><th>ANTECEDENTES OTOLOGICOS</th><th>SI</th><th>NO</th><th>OD</th><th>OI</th><th>DESCRIPCION</th></tr>",$_POST["AntecedentesOtologicos"],"<br>");


$Caracteristicas_Subjetivas_Audicion=TablasHTMLV2("<tr><th>CARACTERISTICAS SUBJETIVAS DE LA AUDICIÓN</th><th>SI</th><th>NO</th><th>DESCRIPCION</th></tr>",$_POST["CaracteristicasSubjetivasAudicion"],"<br>");

$Antecedentes_Laborales_Audiologia=TablasHTMLV2("<tr><th>ANTECEDENTES LABORALES</th><th>SI</th><th>NO</th><th>DESCRIPCION</th></tr>",$_POST["AntecedentesLaboralesAudiologia"],"<br>");

$Habitos_Audiologia=TablasHTMLV2("<tr><th>HABITOS</th><th>SI</th><th>NO</th><th>DESCRIPCION</th></tr>",$_POST["HabitosAudiologia"],"<br>");

$Antecedentes_Extralaborales_Audiologia=TablasHTMLV2("<tr><th>ANTECEDENTES EXTRALABORALES</th><th>SI</th><th>NO</th><th>DESCRIPCION</th></tr>",$_POST["AntecedentesExtralaboralesAudiologia"],"<br>");

$Antecedentes_Extralaborales_Audiologia_2=TablasHTMLV2("<tr><th>OTOSCOPIA</th><th>OIDO DERECHO</th><th>OIDO IZQUIERDO</th></tr>",$_POST["AntecedentesExtralaboralesAudiologia_2"],"<br>");

function array_remove_null($array) {
    foreach ($array as $key => $value)
    {
      if(is_null($value))
        unset($array[$key]);
      if(is_string($value) && (empty($value) OR $value==" " OR $value==""))
        unset($array[$key]);
      if(is_array($value))
        $array[$key] = array_remove_null($value);
      //if(isset($array[$key]) && count($array[$key])==0)
      if (is_countable($array[$key])) {
        if(isset($array[$key]) && count($array[$key])==0)
        unset($array[$key]);
      }
      
    }
    return $array;
}

function InformacionArreglo($arreglo)
{
  $Texto="";$contador=0;
  foreach ($arreglo as $key => $value) 
  {
    if(is_array($value))
    {
      $Texto .= "<label>{$key}</label><br>";
      $Texto .= InformacionArreglo($value);
      
    }
    else 
    {
      //$Texto .= $key.":".$value."<br>";
      $Texto .= $key.":".$value."<br>";
    }

    if($value<>""){$contador++;}
    
  }
  if($contador=="0")
  {
  $Texto = "<div style=\'display:none;\'>{$Texto}</div>";
  }
  else
  {
  $Texto = "<div>{$Texto}</div>";
  }

  return $Texto;
}

$AnamnesisTinnitus=InformacionArreglo(array_remove_null(DatosIngresarMysqli($_POST["AnamnesisTinnitus"])));

$CuestionarioReaccionesTinnitus=InformacionArreglo(array_remove_null(DatosIngresarMysqli($_POST["CuestionarioReaccionesTinnitus"])));

$ResultadoReaccionesTinnitus=TablasHTMLV2("<tr><th></th><th>Puntaje</th></tr>",DatosIngresarMysqli($_POST["ResultadoReaccionesTinnitus"]),"<br>");

$TinnitusHandicapInventory=InformacionArreglo(array_remove_null(DatosIngresarMysqli($_POST["TinnitusHandicapInventory"])));

$SubEscalaTinnitus=TablasHTMLV2("<tr><th>Sub Escala</th><th>Si (x4)</th><th>A Veces (x2)</th><th>No (x4)</th><th>Total</th></tr>",DatosIngresarMysqli($_POST["SubEscalaTinnitus"]),"<br>");

$CalificacionTinnitus1='<table style="width:100%;" class="table"> 
      <thead>
        <tr>
          <th>Si</th>
          <th>A Veces</th>
          <th>No</th>
          <th>Puntaje</th>
        </tr>
      </thead>
      <tbody style="text-align:center">
        <tr>
          <td>(  X4)</td>
          <td>(  X2)</td>
          <td>(  X0)</td>
          <td> </td>
        </tr>
        <tr>
          <td> '.$_POST["CalificacionTinnitus"]["Si"].'</td>
          <td> '.$_POST["CalificacionTinnitus"]["A Veces"].'  </td>
          <td> '.$_POST["CalificacionTinnitus"]["No"].'  </td>
          <td > '.$_POST["CalificacionTinnitus"]["Puntaje"].'  </td>
        </tr>
        <tr>
          <td colspan="3">Grado de Discapacidad</td>
          <td> '.$_POST["CalificacionTinnitus"]["Grado de Discapacidad"].' </td>
        </tr>
      </tbody>
    </table>
';



$logoderecho= $_POST['logoderecho'];
$logoIzquierdo= $_POST['logoIzquierdo'];
$discriDe = $_POST['discriDer'];
$discriIz = $_POST['discriIz'];
$graficaaudiometria=$_POST['graficaAudiometriaTonalNueva'];
$graficalogometria=$_POST['grafica1'];

$graficatimpanograma1=$_POST['grafica_timpanograma_arreglo_1'];
$graficatimpanograma2=$_POST['grafica_timpanograma_arreglo_2'];
$graficaAltaFrecuencia=$_POST['graficaAltaFrecuencia'];
$graficaAltaFrecuencia_1=$_POST['graficaAltaFrecuencia_1'];

$graficaGananciaFuncional = $_POST['graficaGananciaFuncional'];
$GananciaInformacion = InformacionArreglo(array_remove_null(DatosIngresarMysqli($_POST['GananciaInformacion'])));

$ArregloCrearCampos=["logoDer","logoIZ","discriDe", "descriIz", "grafica_audiometria","grafica_logometria","campos_logometria","timpanograma_campos","reflejos_estapediales_campos",
"grafica_timpanograma_od","grafica_timpanograma_oi","Grafica_AltaFrecuencia","Grafica_AltaFrecuencia_1","Valoracion_Tinnitus","Logoaudiometria_Francesa","Incapacidad_Tinnitus","Desarrollo_Conducta_Auditiva_1","Desarrollo_Conducta_Auditiva_2",
"Desarrollo_Conducta_Auditiva_3","Desarrollo_Conducta_Auditiva_4","Desarrollo_Conducta_Auditiva_5","Desarrollo_Conducta_Auditiva_6","Desarrollo_Conducta_Auditiva_7","Antecedentes_Personales_Audiologicos","Antecedentes_Otologicos",
"Caracteristicas_Subjetivas_Audicion","Antecedentes_Laborales_Audiologia","Habitos_Audiologia","Antecedentes_Extralaborales_Audiologia","Antecedentes_Extralaborales_Audiologia_2","AnamnesisTinnitus","CuestionarioReaccionesTinnitus",
"ResultadoReaccionesTinnitus","CalificacionTinnitus","TinnitusHandicapInventory","SubEscalaTinnitus","GraficaGanancia","GananciaInformacion"];

foreach ($ArregloCrearCampos as $key => $value) {
    $Campo1 = mysqli_query($conn3, "show COLUMNS from {$nombreTabla} WHERE Field = '{$value}';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `{$nombreTabla}` ADD `{$value}` TEXT NULL  COMMENT '*Creado desde modulo de configDatosAdicionalesHistoriaAudiologia.php que se agrega en configProcesarFormulario*'");
    }
}

if ($ID_Tabla == '34') { mysqli_query($conn3,"UPDATE $nombreTabla SET logoDer ='$logoderecho',  logoIz ='$logoIzquierdo',  discriDe='$discriDe', discriIz ='$discriIz',grafica_audiometria='$graficaaudiometria',grafica_logometria='$graficalogometria',campos_logometria='$LogoAudiometria',timpanograma_campos='$TimpanogramaTabla',reflejos_estapediales_campos='$EstapedialesTabla', grafica_timpanograma_od='$graficatimpanograma1',grafica_timpanograma_oi='$graficatimpanograma2', Grafica_AltaFrecuencia='$graficaAltaFrecuencia', Grafica_AltaFrecuencia_1='$graficaAltaFrecuencia_1' WHERE id ='$historiaClinica1'");}

if ($ID_Tabla == '34') { mysqli_query($conn3,"UPDATE $nombreTabla SET Valoracion_Tinnitus = '$Valoracion_Tinnitus', 	Logoaudiometria_Francesa ='$Logo_Francesa',  Incapacidad_Tinnitus ='$Incapacidad_Tinnitus'  WHERE id ='$historiaClinica1'");}

if ($ID_Tabla == '34') { mysqli_query($conn3,"UPDATE $nombreTabla SET Desarrollo_Conducta_Auditiva_1 = '$Desarrollo_Conducta_Auditiva_1', 	Desarrollo_Conducta_Auditiva_2 ='$Desarrollo_Conducta_Auditiva_2',  Desarrollo_Conducta_Auditiva_3 ='$Desarrollo_Conducta_Auditiva_3',  Desarrollo_Conducta_Auditiva_4 ='$Desarrollo_Conducta_Auditiva_4',  Desarrollo_Conducta_Auditiva_5 ='$Desarrollo_Conducta_Auditiva_5',  Desarrollo_Conducta_Auditiva_6 ='$Desarrollo_Conducta_Auditiva_6',  Desarrollo_Conducta_Auditiva_7 ='$Desarrollo_Conducta_Auditiva_7'  WHERE id ='$historiaClinica1'");}

if ($ID_Tabla == '34') { mysqli_query($conn3,"UPDATE $nombreTabla SET Antecedentes_Personales_Audiologicos = '$Antecedentes_Personales_Audiologicos', 	Antecedentes_Otologicos ='$Antecedentes_Otologicos', Caracteristicas_Subjetivas_Audicion='$Caracteristicas_Subjetivas_Audicion', Antecedentes_Laborales_Audiologia='$Antecedentes_Laborales_Audiologia', Habitos_Audiologia='$Habitos_Audiologia', Antecedentes_Extralaborales_Audiologia='$Antecedentes_Extralaborales_Audiologia', Antecedentes_Extralaborales_Audiologia_2='$Antecedentes_Extralaborales_Audiologia_2' WHERE id ='$historiaClinica1'");}

if ($ID_Tabla == '34') { mysqli_query($conn3,"UPDATE $nombreTabla SET AnamnesisTinnitus = '$AnamnesisTinnitus', CuestionarioReaccionesTinnitus='$CuestionarioReaccionesTinnitus', ResultadoReaccionesTinnitus='$ResultadoReaccionesTinnitus', CalificacionTinnitus='$CalificacionTinnitus1', TinnitusHandicapInventory='$TinnitusHandicapInventory', SubEscalaTinnitus='$SubEscalaTinnitus'  WHERE id ='$historiaClinica1'");}

if ($ID_Tabla == '34') { mysqli_query($conn3,"UPDATE $nombreTabla SET GraficaGanancia = '$graficaGananciaFuncional', 	GananciaInformacion ='$GananciaInformacion' WHERE id ='$historiaClinica1'");}


//echo "UPDATE $nombreTabla SET AnamnesisTinnitus = '$AnamnesisTinnitus', CuestionarioReaccionesTinnitus='$CuestionarioReaccionesTinnitus', ResultadoReaccionesTinnitus='$ResultadoReaccionesTinnitus', CalificacionTinnitus='$CalificacionTinnitus1', TinnitusHandicapInventory='$TinnitusHandicapInventory', SubEscalaTinnitus='$SubEscalaTinnitus'  WHERE id ='$historiaClinica1'";



// cierre de historia de audiometria -> 34


?>