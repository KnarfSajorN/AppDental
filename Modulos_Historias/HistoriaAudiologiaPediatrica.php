<?php

    foreach ($Modulos_Dinamicos as $key => $Modulo) 
    {
        if($Modulo=="Funciones")
        {
            /////////////////////////////////////////////////////////////////// F U N C I O N - T A B L A   H T M L /////////////////////////////////////////////////////////////////////////

            /*
            $header_tabla=["SubEscala","Si (x4)","A Veces (x2)","No (x4)","Total"];
            $header_tabla_estilos=["width:40%;","width:15%;","width:15%;","width:15%;","width:15%;"];
            
            $columnas_tabla=["FUNCIONAL","EMOCIONAL","CATASTROFICA"];
            $columnas_tabla_span["Otros"]=["1","0","0","0","0","5"];
            $nombre_arreglo="SubEscalaTinnitus";
            */

            //echo Tabla_Historia_Dinamico($nombre_arreglo,$header_tabla,$header_tabla_estilos,$columnas_tabla,"span personalizado","style para el div principal mayormente usado para ocultarlo");

            function Tabla_Historia_Dinamico($nombre_arreglo,$header_tabla,$header_tabla_estilos,$columnas_tabla,$columnas_tabla_span,$estilo_div)
            {
                $Texto="<div class='form-group col-md-12' style='padding-left: 40px;padding-right: 40px;{$estilo_div}'> <table style='width:100%;' class='table'>";

                $Texto.="<thead><tr>";
                foreach ($header_tabla as $key => $value) {
                $Texto.= "<th style='{$header_tabla_estilos[$key]}'>{$value}</th>";
                }
                $Texto.="</tr></thead>";
                $Texto.="<tbody>";

                foreach ($columnas_tabla as $key => $value) {
                $span=$columnas_tabla_span[$value][0];
                $Texto.="<tr><td colspan='{$span}'>{$value}</td>";
                    for ($i = 1,$Tamano = count($header_tabla); $i <$Tamano; $i++) {
                    $span=$columnas_tabla_span[$value][$i];if($span==""){$span=1;}

                    if($span<>"0")
                    {
                        $Texto.="<td colspan='{$span}'><input type='text' name='{$nombre_arreglo}[{$value}][{$header_tabla[$i]}][$span]'  class='form-control input-lg'></td>";
                    }
                    
                    }
                }
            $Texto.="</tbody></table></div>";

            return $Texto;
            }

            /////////////////////////////////////////////////////////////////// F U N C I O N - C A M P O S  D I N A M I C O S /////////////////////////////////////////////////////////////////////////
            
            $filtro[0]="class='form-control input-lg' maxlength='120' oninput='if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'";//input
            $filtro[1]="class='form-control select2' style='width: 100%;'";//select
            $filtro[2]="class='form-control input-lg' style='width: 100%; min-height: 60px;height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;max-width: 100%;'";//textarea 

            //echo Tabla_Campos_Dinamico($Inputs1,"<div class='form-group col-md-12' style='padding-left: 40px;padding-right: 40px;'>");

            function Tabla_Campos_Dinamico($arreglo,$div_titulo)
            {
            $Texto=$div_titulo;
            foreach ($arreglo as $key => $value) {
                
                $Nombre_Campo = $value["Nombre"];
                $Valor = $value["Valor"];
                $Tipo_Campo = $value["Tipo"];
                $Filtro = $value["Filtro"];
                $Tamano = $value["Tamano"];
                
                if($Tipo_Campo!="titulo" AND $Tipo_Campo !="subtitulo"){
                $Texto.= "<div class='form-group col-md-{$Tamano}'><label>{$key}</label>";
                }
                switch ($Tipo_Campo) 
                {
                    case "text":
                    case "number":
                    case "date":
                    case "email":
                    $Texto.= "<input name=\"{$Nombre_Campo}\" type=\"{$Tipo_Campo}\" placeholder=\"{$key}\" {$Filtro}>";
                    break;
                    case "select":
                    $Valor1 = explode("|", $Valor);$options="";
                    foreach($Valor1 as $key1 => $value1) {
                    $options .= "<option>{$value1}</option>";
                    }
                    $Texto.= "<select name=\"{$Nombre_Campo}\" {$Filtro}>
                            <option value=\"\" selected=\"selected\">Seleccione</option>{$options}
                            </select>";
                    break;
                    case "textarea": $Texto.= "<textarea name=\"{$Nombre_Campo}\" {$Filtro}>{$Valor}</textarea> ";
                    break;
                    case "titulo": $Texto.= "<div class='form-group col-md-{$Tamano}'><h4 align='center'><b>{$key}</b></h4>";
                    break;
                    case "subtitulo": $Texto.= "<div class='form-group col-md-{$Tamano}'><h5 align='left'><b>{$key}</b></h5>";
                    break;
                    default:
                    $Texto.= "<p style=\"color:red;\"> el tipo de dato esta incorrecto revisar el arreglo </p>";
                }
                $Texto.= "</div>";
            }
            $Texto.= "</div>";
            return $Texto;

            }

            ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        }

        if($Modulo=="Historia Pediatria")
        {

            echo "<center><strong><b> Antecedentes </b></strong></center>";
            $n_arr="AntecedentesPediatricos";
            $Inputs1 = array(	
            "Prenatales" => array(
                    "Nombre" => "{$n_arr}[Prenatales]",
                    "Tipo"  => "text","Valor" => "","Filtro"=> "{$filtro[0]} ","Tamano"=> "12"
                ),
            "Perinatales" => array(
                    "Nombre" => "{$n_arr}[Perinatales]",
                    "Tipo"  => "text","Valor" => "","Filtro"=> "{$filtro[0]} ","Tamano"=> "12"
                ),
            "Posnatales" => array(
                    "Nombre" => "{$n_arr}[Posnatales]",
                    "Tipo"  => "text","Valor" => "","Filtro"=> "{$filtro[0]} ","Tamano"=> "12"
                ),
            "Familiares" => array(
                    "Nombre" => "{$n_arr}[Familiares]",
                    "Tipo"  => "text","Valor" => "","Filtro"=> "{$filtro[0]} ","Tamano"=> "12"
                ),
            
            );

            echo Tabla_Campos_Dinamico($Inputs1,"<div class='form-group col-md-12' style='padding-left: 40px;padding-right: 40px;'>");

            $header_tabla=["Antecedentes Otológicos","Si","No","Oído Derecho", "Oído Izquierdo","Descripción"];
            $header_tabla_estilos=["width:30%;","width:10%;","width:10%;","width:10%;","width:10%;","width:30%"];
    
            $columnas_tabla=["Otalgia","Otorrea/Otorragia","Tinnitus","Plenitud Aural","Sensación de Oído Tapado","Vértigo","Cirugía de Oído","Traumas","Otros"];
            $columnas_tabla_span["Otros"]=["1","0","0","0","0","5"];
            $nombre_arreglo="AntecedentesOtologicosPediatria";

            echo Tabla_Historia_Dinamico($nombre_arreglo,$header_tabla,$header_tabla_estilos,$columnas_tabla,"","");

            $n_arr="AntecedentesOtologicosPediatria_1";
            $Inputs1 = array(	
            "Historia Escolar" => array(
                    "Nombre" => "{$n_arr}[Historia Escolar]",
                    "Tipo"  => "text","Valor" => "","Filtro"=> "{$filtro[0]} ","Tamano"=> "12"
                ),
            "Actividades Extracurriculares" => array(
                    "Nombre" => "{$n_arr}[Actividades Extracurriculares]",
                    "Tipo"  => "text","Valor" => "","Filtro"=> "{$filtro[0]} ","Tamano"=> "12"
                )
            
            );

            echo Tabla_Campos_Dinamico($Inputs1,"<div class='form-group col-md-12' style='padding-left: 40px;padding-right: 40px;'>");

            $header_tabla=["Características Subjetivas de la Audición","Si","No","Descripción"];
            $header_tabla_estilos=["width:40%;","width:10%;","width:10%;","width:40%;"];
    
            $columnas_tabla=["¿Oye mejor por un oído?","¿Cree que oye bien?","¿Le molestan los ruidos fuertes?"];
            //$columnas_tabla_span["Otros"]=["1","0","0","0","0","5"];
            $nombre_arreglo="CaracteristicasSubjetivasAudicionPediatria";

            echo Tabla_Historia_Dinamico($nombre_arreglo,$header_tabla,$header_tabla_estilos,$columnas_tabla,"","");

            /////////////////////////////////////////////////////////////////////////////////////////

            $header_tabla=["Hábitos","Si","No","Descripción"];
            $header_tabla_estilos=["width:40%;","width:10%;","width:10%;","width:40%;"];
    
            $columnas_tabla=["Uso Frecuente de Reproductores de Sonido","Practica Instrumento Sonoro"];
            //$columnas_tabla_span["Otros"]=["1","0","0","0","0","5"];
            $nombre_arreglo="HabitosPediatria";

            echo Tabla_Historia_Dinamico($nombre_arreglo,$header_tabla,$header_tabla_estilos,$columnas_tabla,"","");

            /////////////////////////////////////////////////////////////////////////////////////////

            $header_tabla=["Uso de Prótesis Auditiva","Si","No","Descripción"];
            $header_tabla_estilos=["width:40%;","width:10%;","width:10%;","width:40%;"];
    
            $columnas_tabla=["Oído Derecho","Oído Izquierdo","Observaciones"];
            $columnas_tabla_span["Observaciones"]=["1","0","0","5"];
            $nombre_arreglo="UsoProtesisPediatria";

            echo Tabla_Historia_Dinamico($nombre_arreglo,$header_tabla,$header_tabla_estilos,$columnas_tabla,$columnas_tabla_span,"");

            /////////////////////////////////////////////////////////////////////////////////////////

            $header_tabla=["Configuración Pabellón Auricular","Oído Derecho", "Oído Izquierdo"];
            $header_tabla_estilos=["width:40%;","width:30%;","width:30%;"];
    
            $columnas_tabla=["Normal","Agenesia","Atresia"];
            /*$columnas_tabla_span["Configuración Pabellón Auricular"]=["0","0","0"];
            $columnas_tabla_span["Configuración Conducto Auditivo Externo"]=["0","0","0"];
            $columnas_tabla_span["Membrana Timpánica"]=["5","0","0"];*/

            $nombre_arreglo="OtoscopiaPediatria_1";

            echo Tabla_Historia_Dinamico($nombre_arreglo,$header_tabla,$header_tabla_estilos,$columnas_tabla,$columnas_tabla_span,"");

            /////////////////////////////////////////////////////////////////////////////////////////

            $header_tabla=["Configuración Conducto Auditivo Externo","Oído Derecho", "Oído Izquierdo"];
            $header_tabla_estilos=["width:40%;","width:30%;","width:30%;"];
    
            $columnas_tabla=["Normal ","Vascularizado","Resequedad","Atresia ","Cuerpo Extraño","Tapón Cerumen","Total","Parcial"];

            $nombre_arreglo="OtoscopiaPediatria_2";

            echo Tabla_Historia_Dinamico($nombre_arreglo,$header_tabla,$header_tabla_estilos,$columnas_tabla,$columnas_tabla_span,"");

            /////////////////////////////////////////////////////////////////////////////////////////

            $header_tabla=["Membrana Timpánica","Oído Derecho", "Oído Izquierdo"];
            $header_tabla_estilos=["width:40%;","width:30%;","width:30%;"];
    
            $columnas_tabla=["Normal","Perforada","Edematizada","Cicatrizada","Observaciones"];
            $columnas_tabla_span["Observaciones"]=["1","0","5"];
            $nombre_arreglo="OtoscopiaPediatria_3";

            echo Tabla_Historia_Dinamico($nombre_arreglo,$header_tabla,$header_tabla_estilos,$columnas_tabla,$columnas_tabla_span,"");

        }

    }
?>