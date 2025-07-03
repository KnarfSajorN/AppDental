
<?php
include("funciones/conn3.php");
include("funciones/funcionesUtilidades.php");

function funcionMaster($filtro, $campoFiltrar, $campoImprimir, $tabla)
{
    include 'funciones/conn3.php';
    $query = mysqli_query($conn3, "SELECT * FROM $tabla where $campoFiltrar = '$filtro'");
    $nrowl = mysqli_num_rows($query);
    while ($row = mysqli_fetch_array($query)) {

        $text = $row[$campoImprimir];
    }
    return  $text;
}

/*
    $queryList = mysqli_query($conn3, " SELECT * FROM  ExamenDeAfuera GROUP BY CodigoExamen");
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        $Interpretacion="";$Valores_Referencia="";$Campo_Resultado_Datos="";$OpcionesLista="";

        $Nombre_Examen = $rowMotorizado['Nombre_Examen'];
        $Sexo = $rowMotorizado['Sexo'];
        $CodigoExamen = $rowMotorizado['CodigoExamen'];

        $Interpretacion1 = $rowMotorizado['Interpretacion'];
        if (stristr($Interpretacion1, 'INTERPRETACION') !== false) {
            $Interpretacion = $rowMotorizado['Interpretacion'];
        } else {
            $Valores_Referencia = $rowMotorizado['Interpretacion'];
        }

        if($rowMotorizado['Codigo_Tipo_Dato']=="0" OR $rowMotorizado['Codigo_Tipo_Dato'] == "1"){
            $Campo_Resultado="Texto";
        }
        else if($rowMotorizado['Codigo_Tipo_Dato']=="2"){
            $Campo_Resultado="Numerico";
        }
        else {
            $Campo_Resultado = "Lista";
            $codigotipodato = $rowMotorizado['Codigo_Tipo_Dato'];
            $QueryTipoDatos = mysqli_query($conn3, "SELECT * FROM  TipoDatosDeAfura where Codigo='$codigotipodato'");
            
            while ($rowTipoDatos = mysqli_fetch_array($QueryTipoDatos)) {
            $OpcionesLista.= '"'.$rowTipoDatos["OpcionTipoDato"].'",';
            }
            $OpcionesLista = trim($OpcionesLista, ',');
            $Campo_Resultado_Datos = "[".$OpcionesLista."]";
        }

        $Categoria_Examen = $rowMotorizado['Categoria_Examen'];

        switch ($Categoria_Examen) {
            case 'Citologia':
                $Categoria_Examen = '2';
                break;

            case 'Hematologia':
                $Categoria_Examen = '3';
                break;

            case 'Hormonas':
                $Categoria_Examen = '4';
                break;

            case 'Inmunologia':
                $Categoria_Examen = '5';
                break;

            case 'Microbiologia':
                $Categoria_Examen = '6';
                break;

            case 'Microscopia':
                $Categoria_Examen = '7';
                break;

            case 'Parasitologia':
                $Categoria_Examen = '8';
                break;

            case 'Quimica':
                $Categoria_Examen = '9';
                break;

            case 'Otro Laboratorio':
                $Categoria_Examen = '10';
                break;
        }

        $Valor_Minimo = $rowMotorizado['Valor_Minimo'];
        $Valor_Maximo = $rowMotorizado['Valor_Maximo'];
        if($Campo_Resultado=="Lista"){$Campo_Resultado_filtro_examen="Texto";}{$Campo_Resultado_filtro_examen= $Campo_Resultado;}

        $Valores_Referencia_Filtrado = '[{"id_Filtro":0,"Nombre":"","Tipo_Filtro":"'. $Campo_Resultado_filtro_examen.'","Valor_Referencia_Minima":"'. $Valor_Minimo.'","Valor_Referencia_Maxima":"'. $Valor_Maximo. '","Color_Correcto":"#27ff3375"}]';

        $queryList_res = mysqli_query($conn3, "INSERT INTO `LB_Examen` ( `usuario_id`, `Nombre`, `Precio`, `Valores_Referencia`, `Interpretacion`, `Campo_Resultado`, `Valor_Campo_Resultado`, `categoria_id`, `Valores_Referencia_Filtrado`) 
                    VALUES ('1', '$Nombre_Examen', '0', '$Valores_Referencia', '$Interpretacion', '$Campo_Resultado', '$Campo_Resultado_Datos', '$Categoria_Examen', '$Valores_Referencia_Filtrado')");

        if (!$queryList_res )
			{
				echo " error al insertar , ". "INSERT INTO `LB_Examen` ( `usuario_id`, `Nombre`, `Precio`, `Valores_Referencia`, `Interpretacion`, `Campo_Resultado`, `Valor_Campo_Resultado`, `categoria_id`, `Valores_Referencia_Filtrado`) 
                    VALUES ('1', '$Nombre_Examen', '0', '$Valores_Referencia', '$Interpretacion', '$Campo_Resultado', '$Campo_Resultado_Datos', '$Categoria_Examen', '$Valores_Referencia_Filtrado')" . "<br>" . mysqli_error($conn3) . "<br>";
			}

        $examen_raiz = mysqli_insert_id($conn3);

        
        if($Sexo=="A")
        {
            $contador=0;
            $queryList1 = mysqli_query($conn3, "SELECT * FROM  ExamenDeAfuera where CodigoExamen='$CodigoExamen'");
            $nrowl = mysqli_num_rows($queryList1);
            if($nrowl>1)
            {   $Caracteristicas="";
                while ($rowMotorizado1 = mysqli_fetch_array($queryList1)) {
                    $contador++;
                    $Valores_Referencia_Filtrado="";$Campo_Resultado_Datos="";$OpcionesLista="";
                    $id = $rowMotorizado1['id'];
                    
                    $Items_Examen = $rowMotorizado1['Items_Examen'];
                    
                    if ($rowMotorizado1['Codigo_Tipo_Dato'] == "0" or $rowMotorizado1['Codigo_Tipo_Dato'] == "1") {
                    $Campo_Resultado = "Texto";
                    } else if ($rowMotorizado1['Codigo_Tipo_Dato'] == "2") {
                        $Campo_Resultado = "Numerico";
                    } else {
                        $Campo_Resultado = "Lista";
                        $codigotipodato = $rowMotorizado1['Codigo_Tipo_Dato'];
                        
                        $QueryTipoDatos = mysqli_query($conn3, "SELECT * FROM  TipoDatosDeAfura where Codigo='$codigotipodato'");
                        while ($rowTipoDatos = mysqli_fetch_array($QueryTipoDatos)) {
                            $OpcionesLista .= '"' . $rowTipoDatos["OpcionTipoDato"] . '",';
                        }
                        $OpcionesLista = trim($OpcionesLista, ',');
                        $Campo_Resultado_Datos = "[" . $OpcionesLista . "]";
                    }

                    $Interpretacion = $rowMotorizado1['Interpretacion'];

                    $Valor_Minimo = $rowMotorizado1['Valor_Minimo'];
                    $Valor_Maximo = $rowMotorizado1['Valor_Maximo'];

                    if($Campo_Resultado=="Lista"){$Campo_Resultado_filtro_examen="Texto";}{$Campo_Resultado_filtro_examen= $Campo_Resultado;}

                    if($Valor_Minimo!="0" OR $Valor_Maximo!="0"){
                        $Valores_Referencia_Filtrado = QuitarComillasyOtrosCaracteres('[{"id_Filtro":0,"Nombre":"","Tipo_Filtro":"' . $Campo_Resultado_filtro_examen . '","Valor_Referencia_Minima":"' . $Valor_Minimo . '","Valor_Referencia_Maxima":"' . $Valor_Maximo . '","Color_Correcto":"#27ff3375"}]');
                    }

                    $Caracteristicas .= '{"id":' . $contador . ',"Nombre_Caracteristica":"'. QuitarComillasyOtrosCaracteres($Items_Examen).'","Campo_Resultado":"'. QuitarComillasyOtrosCaracteres($Campo_Resultado).'","Valores_Campo_Resultado":"'. QuitarComillasyOtrosCaracteres($Campo_Resultado_Datos).'","Unidades_Referencia":"","Filtro_Personalizado":"'. $Valores_Referencia_Filtrado.'","Valores_Referencia_Caracteristica":"'. QuitarComillasyOtrosCaracteres($Interpretacion).'"},';
                    
                    //echo "<script> console.log('$Caracteristicas');</script>";
                }

                $Caracteristicas = trim($Caracteristicas, ',');
                $Total="[". $Caracteristicas."]";

                $queryList_res = mysqli_query($conn3,"UPDATE LB_Examen SET Caracteristicas='$Total' WHERE id = '{$examen_raiz}' limit 1;");

                if (!$queryList_res) {
                    echo " error al insertar , " . "UPDATE LB_Examen SET Caracteristicas='$Total' WHERE id = '{$examen_raiz}' limit 1;" . "<br>";
                }
            }
            
        }
        else {

                

            $queryexamenesfm = mysqli_query($conn3, "SELECT * FROM  ExamenDeAfuera where CodigoExamen='$CodigoExamen'");
            $nrowlfm = mysqli_num_rows($queryexamenesfm);
            if($nrowlfm>1){

                $Caracteristicas = "";
                while ($rowMotorizado1 = mysqli_fetch_array($queryexamenesfm)) {
                    $contador++;
                    $Valores_Referencia_Filtrado = "";
                    $Campo_Resultado_Datos = "";
                    $OpcionesLista = "";
                    $id = $rowMotorizado1['id'];

                    $Items_Examen = $rowMotorizado1['Items_Examen'];

                    if ($rowMotorizado1['Codigo_Tipo_Dato'] == "0" or $rowMotorizado1['Codigo_Tipo_Dato'] == "1") {
                        $Campo_Resultado = "Texto";
                    } else if ($rowMotorizado1['Codigo_Tipo_Dato'] == "2") {
                        $Campo_Resultado = "Numerico";
                    } else {
                        $Campo_Resultado = "Lista";
                        $codigotipodato = $rowMotorizado1['Codigo_Tipo_Dato'];

                        $QueryTipoDatos = mysqli_query($conn3, "SELECT * FROM  TipoDatosDeAfura where Codigo='$codigotipodato'");
                        while ($rowTipoDatos = mysqli_fetch_array($QueryTipoDatos)) {
                            $OpcionesLista .= '"' . $rowTipoDatos["OpcionTipoDato"] . '",';
                        }
                        $OpcionesLista = trim($OpcionesLista, ',');
                        $Campo_Resultado_Datos = "[" . $OpcionesLista . "]";
                    }

                    $Interpretacion = $rowMotorizado1['Interpretacion'];

                    $Valor_Minimo = $rowMotorizado1['Valor_Minimo'];
                    $Valor_Maximo = $rowMotorizado1['Valor_Maximo'];

                    if ($Campo_Resultado == "Lista") {
                        $Campo_Resultado_filtro_examen = "Texto";
                    } {
                        $Campo_Resultado_filtro_examen = $Campo_Resultado;
                    }

                    if ($Valor_Minimo != "0" or $Valor_Maximo != "0") {
                        $Valores_Referencia_Filtrado = QuitarComillasyOtrosCaracteres('[{"id_Filtro":0,"Nombre":"","Tipo_Filtro":"' . $Campo_Resultado_filtro_examen . '","Valor_Referencia_Minima":"' . $Valor_Minimo . '","Valor_Referencia_Maxima":"' . $Valor_Maximo . '","Color_Correcto":"#27ff3375"}]');
                    }

                    $Caracteristicas .= '{"id":' . $contador . ',"Nombre_Caracteristica":"' . QuitarComillasyOtrosCaracteres($Items_Examen) . '","Campo_Resultado":"' . QuitarComillasyOtrosCaracteres($Campo_Resultado) . '","Valores_Campo_Resultado":"' . QuitarComillasyOtrosCaracteres($Campo_Resultado_Datos) . '","Unidades_Referencia":"","Filtro_Personalizado":"' . $Valores_Referencia_Filtrado . '","Valores_Referencia_Caracteristica":"' . QuitarComillasyOtrosCaracteres($Interpretacion) . '"},';

                    //echo "<script> console.log('$Caracteristicas');</script>";
                }

                $Caracteristicas = trim($Caracteristicas, ',');
                $Total = "[" . $Caracteristicas . "]";

                $queryList_res = mysqli_query($conn3, "UPDATE LB_Examen SET Caracteristicas='$Total' WHERE id = '{$examen_raiz}' limit 1;");

                if (!$queryList_res) {
                    echo " error al insertar , " . "UPDATE LB_Examen SET Caracteristicas='$Total' WHERE id = '{$examen_raiz}' limit 1;" . "<br>";
                }

            }
            else {

                while ($rowExamenesfm = mysqli_fetch_array($queryexamenesfm)) {
                    $Campo_Resultado_Datos = "";
                    $OpcionesLista = "";

                    $Nombre_Examen = $rowExamenesfm['Nombre_Examen'];
                    $CodigoExamen = $rowExamenesfm['CodigoExamen'];

                    $Interpretacion1 = $rowExamenesfm['Interpretacion'];
                    if (stristr($Interpretacion1, 'INTERPRETACION') !== false) {
                        $Interpretacion = $rowExamenesfm['Interpretacion'];
                    } else {
                        $Valores_Referencia = $rowExamenesfm['Interpretacion'];
                    }

                    if ($rowExamenesfm['Codigo_Tipo_Dato'] == "0" or $rowExamenesfm['Codigo_Tipo_Dato'] == "1") {
                        $Campo_Resultado = "Texto";
                    } else if ($rowExamenesfm['Codigo_Tipo_Dato'] == "2") {
                        $Campo_Resultado = "Numerico";
                    } else {
                        $Campo_Resultado = "Lista";
                        $codigotipodato = $rowExamenesfm['Codigo_Tipo_Dato'];

                        $QueryTipoDatos = mysqli_query($conn3, "SELECT * FROM  TipoDatosDeAfura where Codigo='$codigotipodato'");
                        while ($rowTipoDatos = mysqli_fetch_array($QueryTipoDatos)) {
                            $OpcionesLista .= '"' . $rowTipoDatos["OpcionTipoDato"] . '",';
                        }
                        $OpcionesLista = trim($OpcionesLista, ',');
                        $Campo_Resultado_Datos = "[" . $OpcionesLista . "]";
                    }

                    $Categoria_Examen = $rowExamenesfm['Categoria_Examen'];

                    switch ($Categoria_Examen) {
                        case 'Citologia':
                            $Categoria_Examen = '2';
                            break;

                        case 'Hematologia':
                            $Categoria_Examen = '3';
                            break;

                        case 'Hormonas':
                            $Categoria_Examen = '4';
                            break;

                        case 'Inmunologia':
                            $Categoria_Examen = '5';
                            break;

                        case 'Microbiologia':
                            $Categoria_Examen = '6';
                            break;

                        case 'Microscopia':
                            $Categoria_Examen = '7';
                            break;

                        case 'Parasitologia':
                            $Categoria_Examen = '8';
                            break;

                        case 'Quimica':
                            $Categoria_Examen = '9';
                            break;

                        case 'Otro Laboratorio':
                            $Categoria_Examen = '10';
                            break;
                    }
                    $Valor_Minimo = $rowExamenesfm['Valor_Minimo'];
                    $Valor_Maximo = $rowExamenesfm['Valor_Maximo'];

                    $Sexo1 = $rowExamenesfm['Sexo'];
                    switch ($Sexo1) {
                        case 'F':
                            $Filtro_Sexo = "Femenino";
                            break;

                        case 'M':
                            $Filtro_Sexo = "Masculino";
                            break;
                    }

                    if ($Campo_Resultado == "Lista") {
                        $Campo_Resultado_filtro_examen = "Texto";
                    } {
                        $Campo_Resultado_filtro_examen = $Campo_Resultado;
                    }

                    $Valores_Referencia_Filtrado = '[{"id_Filtro":0,"Nombre":"","Tipo_Filtro":"' . $Campo_Resultado_filtro_examen . '","Valor_Referencia_Minima":"' . $Valor_Minimo . '","Valor_Referencia_Maxima":"' . $Valor_Maximo . '","Color_Correcto":"#27ff3375"}]';

                    $queryList_res = mysqli_query($conn3, "INSERT INTO `LB_Examen` ( `usuario_id`, `Nombre`, `Precio`, `Valores_Referencia`, `Interpretacion`, `Campo_Resultado`, `Valor_Campo_Resultado`, `categoria_id`, `Valores_Referencia_Filtrado`, `Filtro_Sexo`, `examen_relacionado_id`, `Nombre_Filtro`) 
                            VALUES ('1', '$Nombre_Examen', '0', '$Valores_Referencia', '$Interpretacion', '$Campo_Resultado', '$Campo_Resultado_Datos', '$Categoria_Examen', '$Valores_Referencia_Filtrado', '$Filtro_Sexo','$examen_raiz', '$Filtro_Sexo')");

                    $examen_raiz_interno = mysqli_insert_id($conn3);

                    if (!$queryList_res) {
                        echo " error al insertar , " . "INSERT INTO `LB_Examen` ( `usuario_id`, `Nombre`, `Precio`, `Valores_Referencia`, `Interpretacion`, `Campo_Resultado`, `Valor_Campo_Resultado`, `categoria_id`, `Valores_Referencia_Filtrado`, `Filtro_Sexo`, `examen_relacionado_id`, `Nombre_Filtro`) 
                            VALUES ('1', '$Nombre_Examen', '0', '$Valores_Referencia', '$Interpretacion', '$Campo_Resultado', '$Campo_Resultado_Datos', '$Categoria_Examen', '$Valores_Referencia_Filtrado', '$Filtro_Sexo','$examen_raiz', '$Filtro_Sexo')" . "<br>" . mysqli_error($conn3) . "<br>";
                    }

                }
            
            }

        }
        

    }
  
*/