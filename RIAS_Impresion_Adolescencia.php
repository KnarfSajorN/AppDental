<?php
include 'funciones/conn3.php';
include 'funciones/funciones.php';
include 'funciones/funcionesUtilidades.php';

$idHistoria = $_GET['id'];

$queryList = mysqli_query($conn3, "SELECT * FROM  RIAS_HistoriaAdolescencia where id = $idHistoria");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    
    $usuario_id = $rowMotorizado['usuario_id'];
    $cliente_id = $rowMotorizado['cliente_id'];

}


$queryList = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = $usuario_id");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {

    $pieF         = $rowMotorizado['pieF'];
    $header       = $rowMotorizado['header'];
    $LogoF        = $rowMotorizado['logoF'];

    if (strlen($LogoF) > 0) {
        $Logo = "<img src='{$Base}/logos/{$LogoF}' style='height: 3.5cm;width: auto;'>";
    }
}



$queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id = $cliente_id ");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $nombre_cliente = $rowMotorizado['nombre_cliente'];
    $CODI_CLIENTE = $rowMotorizado['CODI_CLIENTE'];
    $fechaNacimiento = $rowMotorizado['fechaNacimiento'];
    $direccion_cliente = $rowMotorizado['direccion_cliente'];
    $entidadSalud = $rowMotorizado['entidadSalud'];
    $entidadSalud = funcionMaster($rowMotorizado['entidad_id'], 'id', 'Nombre', 'Rips_Entidades');
    $celular_cliente = $rowMotorizado['celular_cliente'];
    $genero = $rowMotorizado['genero'];
}


function Edad_Paciente($fecha_nacimiento)
{
    $nacimiento = new DateTime($fecha_nacimiento);
    $ahora = new DateTime(date("Y-m-d"));
    $diferencia = $ahora->diff($nacimiento);
    return $diferencia->format("%y");
}

$FechaHora = funcionMaster($idOperacion, 'idOperacion', 'Fecha', 'LB_ExamenCargado');
$Fecha = explode(" ", $FechaHora);
$Datos_Personales = "<table class='table' style='width: 100%;margin-top: 3px;'>
                            <tr>
                                <td width='35%'>
                                    <b>Nombre:</b> {$nombre_cliente}
                                </td>
                                <td width='30%'>
                                    <b>Documento:</b> {$CODI_CLIENTE}
                                </td>

                                <td width='20%'>
                                    <b>F.Nacimiento:</b> {$fechaNacimiento}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>EPS:</b> {$entidadSalud}
                                </td>
                                <td>
                                    <b>Residencia:</b> {$direccion_cliente}
                                </td>
                                <td>
                                    <b>Edad:</b> " . Edad_Paciente($fechaNacimiento) . " Años
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Teléfono:</b> {$celular_cliente}
                                </td>

                                <td>
                                    <b>Género:</b> {$genero}
                                </td>

                                <td>
                                    <b>Fecha:</b> {$Fecha[0]} {$Fecha[1]}
                                </td>
                            </tr>
                        </table>";

$Subtitulo = "
            <div class='col-md-12'>
                <h2 style='text-align-last: center;margin: 0px;font-size: 1.5rem;padding-top: 18px;'> Orden de Laboratorio # {$idOperacion}</h2>
            </div>
            <div class='col-md-12'>
                <hr style='margin-top:0px;margin-bottom: 3px;'>
            </div>";

?>



<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/Impresion/estructura_impresion.css">
    <link rel="stylesheet" href="css/Impresion/bootstrap_5.1.1.min.css">
    <link rel="stylesheet" href="css/Impresion/bootstrap-print.css" media="print">

    <script type="text/javascript" src="plugins/QRK/qrcode.js"></script>
    <script type="text/javascript" src="plugins/QRK/sample.js"></script>

    <style>
        @media print {
            .QuitarBordes {
                border-left-style: hidden;
                border-right-style: hidden;
            }
        }

        p {
            margin: 0;
        }

        .table>:not(caption)>*>* {
            padding: .1rem .5rem;
        }

        .page-footer,
        .page-footer-space {
            height: 100px;
        }

        .page {
            font-size: 18px !important;
        }
    </style>
</head>

<body>

    <div class="page-header row" style="text-align: center">
        <div class="col-4" align="left"><?php echo $Logo ?></div>
        <div class="col-8" style="font-size: 18px;text-align: right;"><?php echo nl2br($header) ?></div>

        <button type="button" onClick="window.print()" style='background: rgb(250,235,215);background: -moz-radial-gradient(circle, rgba(250,235,215,1) 0%, rgba(60,141,176,1) 100%);background: -webkit-radial-gradient(circle, rgba(250,235,215,1) 0%, rgba(60,141,176,1) 100%);background: radial-gradient(circle, rgba(250,235,215,1) 0%, rgba(60,141,176,1) 100%);filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=" #faebd7",endColorstr="#3c8db0" ,GradientType=1);'>
            IMPRIMIR!
        </button>
    </div>

    <div class="page-footer">
        <div class='row' style="zoom: 0.8;place-content: center;position: relative;">
            <?php echo nl2br($pieF); ?>
        </div>
    </div>

    <table style="width:100%">

        <thead>
            <tr>
                <td>
                    <!--place holder for the fixed-position header-->
                    <div class="page-header-space"></div>
                </td>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>

                    <div class="row col-md-12">
                    
                    <table class="table" style="width: 100%;margin-top: 3px;">
                            <tr>
                                <td width="35%">
                                    <b>Nombre:</b> <?php echo $nombre_cliente ?>
                                </td>
                                <td width="30%">
                                    <b>Documento:</b> <?php echo $CODI_CLIENTE ?>
                                </td>
                            </tr>
                            <tr>
                                <td width="20%">
                                    <b>F.Nacimiento:</b> <?php echo  $fechaNacimiento ?>
                                </td>
                                <td width="15%">
                                    <b>Edad:</b> <?php echo  CalculoEdadPaciente($fechaNacimiento); ?>
                                </td>
                            </tr>
                        </table>
                        
                    <?php

                        //Arreglos que tienen varios campos en una misma subtitulo ejemplo Personales > Si/No | Antecendetes | Observaciones
                        function MostrarDatos_1($antecedentes) {
                            $html = '';

                            foreach ($antecedentes as $key => $value) {
                                foreach ($value as $key_1 => $value_1) {
                                    $html .= "<div class='form-group col-md-12'>";
                                    $html .= "<label style='font-size:18px;'>$key_1</label>";

                                    foreach ($value_1 as $key_2 => $value_2) {
                                        
                                            

                                            if (is_array($value_2)) {
                                                
                                                foreach ($value_2 as $key_3 => $value_3) {
                                                    
                                                    if (is_array($value_3)) {
                                                        $html .= "<p>$key_3:</p>";
                                                        foreach ($value_3 as $key_4 => $value_4) {
                                                            $html .= "<p>$value_4</p>";
                                                        }
                                                    } else {
                                                        $html .= "<p>$key_3: $value_3</p>";
                                                    }

                                                }
                                            } else {
                                                $html .= "<p>$key_2: $value_2</p>";
                                            }
                                        
                                    }

                                    $html .= "<br>";
                                    $html .= "</div>";
                                }
                            }

                            return $html;
                        }


                        //Para los Datos de antecedentes familiares
                        function MostrarDatos_2($antecedentes) {
                            $html = '';
                        
                            foreach ($antecedentes as $i => $familiar) {
                                $html .= "<div class='familiar-title'><h4 style='font-weight: lighter;'>Familiar #$i</h4></div>";
                        
                                foreach ($familiar as $key => $value) {
                                    $html .= "<div class='form-group col-md-12'>";
                                    
                        
                                    foreach ($value as $innerKey => $innerValue) {
                                        if (is_array($innerValue)) {
                                            $html .= "<p>$innerKey:</p>";
                        
                                            foreach ($innerValue as $subKey => $subValue) {
                                                $html .= "<p>$subKey: $subValue</p>";
                                            }
                                        } else {
                                            $html .= "<p>$innerKey: $innerValue</p>";
                                        }
                                    }
                        
                                    $html .= "<br>";
                                    $html .= "</div>";
                                }
                            }
                        
                            return $html;
                        }

                        //Para arreglos simples osea solo tienen un campo como Hitos Desarollo  / Ejemplo -> Adaptacion e integración al entorno de educación inicial->Textarea
                        function MostrarDatos_3($antecedentes) {
                            $html = '';
                        
                            foreach ($antecedentes as $key => $value) {
                                
                                foreach ($value as $key_1 => $value_1) {
                                    
                                    $html .= "<p>$key_1: $value_1</p>";

                                }

                            }
                        
                            return $html;
                        }

                        function MostrarDatos_3PositivoNegativo($antecedentes) {
                            $html = '';
                        
                            foreach ($antecedentes as $key => $value) {
                                
                                foreach ($value as $key_1 => $value_1) {
                                    $valorTexto = ($value_1 == 1) ? 'Positivo' : 'Negativo';
                                    $html .= "<p>$key_1: $valorTexto</p>";

                                }

                            }
                        
                            return $html;
                        }

                        function MostrarDatos_3SiNo($antecedentes) {
                            $html = '';
                        
                            foreach ($antecedentes as $key => $value) {
                                
                                foreach ($value as $key_1 => $value_1) {
                                    $valorTexto = ($value_1 == 1) ? 'Si' : 'No';
                                    $html .= "<p>$key_1: $valorTexto</p>";

                                }

                            }
                        
                            return $html;
                        }
                        
                        function MostrarDatos_4($valoresGraficas) {
                            $html = '';
                        
                            foreach ($valoresGraficas as $key => $value) {
                                
                                foreach ($value as $key_1 => $value_1) {
                                    
                                    foreach ($value_1 as $key_2 => $value_2) {
                                    
                                        $html .= "<p>$key_2: $value_2</p>";
    
                                    }

                                }

                            }
                        
                            return $html;
                        }

                        function MostrarAPGAR($anamnesisArray) {
                            
                            $html = '';
                            if($anamnesisArray!=null){
                            $html = '<style>
                            .custom-disabled {
                                pointer-events: none; /* Deshabilita los eventos del mouse en el input */
                                opacity: 0.5; /* Cambia la opacidad para indicar que está deshabilitado */
                                /* Otros estilos personalizados según tus preferencias */
                            }
                            </style>
                            <div class="col-md-12">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Función</th>
                                                    <th>Nunca</th>
                                                    <th>Casi Nunca</th>
                                                    <th>Algunas Veces</th>
                                                    <th>Casi Siempre</th>
                                                    <th>Siempre</th>
                                                </tr>
                                            </thead>
                                            <tbody>';

                            foreach ($anamnesisArray as $key => $value) {
                                $html .= "<tr>";
                                $html .= "<td>$key</td>";

                                for ($i = 0; $i <= 4; $i++) {
                                    $html .= "<td>";
                                    $html .= "<input type='radio'  style='width: 25px;height: 25px;'";

                                    if ("$i" == "$value") {
                                        $html .= " checked";
                                    }

                                    $html .= " class='custom-disabled'	>";
                                    $html .= "</td>";
                                }

                                $html .= "</tr>";
                            }

                            $html .= '</tbody></table></div>';
                            }
                            return $html;

                        }

                        


                    $queryList = mysqli_query($conn3, "SELECT * FROM  RIAS_HistoriaAdolescencia where id = $idHistoria LIMIT 1");
                    $nrowl = mysqli_num_rows($queryList);
                    $rowMotorizado = mysqli_fetch_array($queryList);
                        
                    //var_dump($rowMotorizado);
                    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


                        ///////////////////////////////////////////////////////////////////General Anamnesis /////////////////////////////////////////////////
                        $Anamnesis_General = $rowMotorizado['Anamnesis_General'];
                        ///////////////////////////////////////////////////////////////////General Anamnesis /////////////////////////////////////////////////


                        //////////////////////////////////////////////////////////////////? 1.1 //////////////////////////////////////////////////////////////
                        $Antecedentes_Personales = $rowMotorizado['Antecedentes_Personales'];
                        $Antecedentes_Medicos = $rowMotorizado['Antecedentes_Medicos'];
                        $Antecedentes_Familiares = $rowMotorizado['Antecedentes_Familiares'];
                        $Antecedentes_MasAntecedentes = $rowMotorizado['Antecedentes_MasAntecedentes'];
                        $Antecedentes_Ginecologicos = $rowMotorizado['Antecedentes_Ginecologicos'];
                        //////////////////////////////////////////////////////////////////? 1.1 //////////////////////////////////////////////////////////////


                        //////////////////////////////////////////////////////////////////? 1.2 //////////////////////////////////////////////////////////////
                        $DerechosSexuales = $rowMotorizado['DerechosSexuales'];
                        //////////////////////////////////////////////////////////////////? 1.2 //////////////////////////////////////////////////////////////


                        //////////////////////////////////////////////////////////////////? 1.2.1 //////////////////////////////////////////////////////////////
                        $ValoracionDerechosSexuales = $rowMotorizado['ValoracionDerechosSexuales'];
                        //////////////////////////////////////////////////////////////////? 1.2.1 //////////////////////////////////////////////////////////////


                         //////////////////////////////////////////////////////////////////? 1.3 //////////////////////////////////////////////////////////////
                         $ConsumoHabitos = $rowMotorizado['ConsumoHabitos'];
                         //////////////////////////////////////////////////////////////////? 1.3 //////////////////////////////////////////////////////////////


                        //////////////////////////////////////////////////////////////////? 1.4 //////////////////////////////////////////////////////////////
                        $HabitosSaludables = $rowMotorizado['HabitosSaludables'];
                        //////////////////////////////////////////////////////////////////? 1.4 //////////////////////////////////////////////////////////////


                        
                        //////////////////////////////////////////////////////////////////? 1.5 //////////////////////////////////////////////////////////////

                        $PracticasCrianzaCuidado_FormasComunicacion = $rowMotorizado['PracticasCrianzaCuidado_FormasComunicacion'];
                        $PracticasCrianzaCuidado_Actividades = $rowMotorizado['PracticasCrianzaCuidado_Actividades'];
                        $PracticasCrianzaCuidado_Remision = $rowMotorizado['PracticasCrianzaCuidado_Remision'];
                        //////////////////////////////////////////////////////////////////? 1.5 //////////////////////////////////////////////////////////////


                        //////////////////////////////////////////////////////////////////? 1.6 //////////////////////////////////////////////////////////////
                        $DinamicaFamiliar_CapacidadRecursosFamiliares = $rowMotorizado['DinamicaFamiliar_CapacidadRecursosFamiliares'];

                        $DinamicaFamiliar_APGAR = $rowMotorizado['DinamicaFamiliar_APGAR'];
                        $DinamicaFamiliar_Interpretacion_APGAR = $rowMotorizado['DinamicaFamiliar_Interpretacion_APGAR'];
                        $DinamicaFamiliar_Puntaje_APGAR = $rowMotorizado['DinamicaFamiliar_Puntaje_APGAR'];

                        $DinamicaFamiliar_CapacidadesRelacion = $rowMotorizado['DinamicaFamiliar_CapacidadesRelacion'];

                        $Familiograma_Archivo = $rowMotorizado['Familiograma_Archivo'];
                        //////////////////////////////////////////////////////////////////? 1.6 //////////////////////////////////////////////////////////////

                        //////////////////////////////////////////////////////////////////? 1.7 //////////////////////////////////////////////////////////////
                        $Ecomapa_Archivo = $rowMotorizado['Ecomapa_Archivo'];
                        //////////////////////////////////////////////////////////////////? 1.7 //////////////////////////////////////////////////////////////


                        //////////////////////////////////////////////////////////////////? 1.8 //////////////////////////////////////////////////////////////
                        $SeguimientoCompromisoEducacion = $rowMotorizado['SeguimientoCompromisoEducacion'];
                        //////////////////////////////////////////////////////////////////? 1.8 //////////////////////////////////////////////////////////////



















                        //////////////////////////////////////////////////////////////////? 2.1 //////////////////////////////////////////////////////////////
                        $Json_SignosVitales = $rowMotorizado['Json_SignosVitales'];
                        //////////////////////////////////////////////////////////////////? 2.1 //////////////////////////////////////////////////////////////

                        //////////////////////////////////////////////////////////////////? 2.2 //////////////////////////////////////////////////////////////

                        $ValoracionDesarrollo_FuncionesCognitivas = $rowMotorizado['ValoracionDesarrollo_FuncionesCognitivas'];
                        $ValoracionDesarrollo_Identidad_Anexo14 = $rowMotorizado['ValoracionDesarrollo_Identidad_Anexo14'];
                        $ValoracionDesarrollo_Autonomia = $rowMotorizado['ValoracionDesarrollo_Autonomia'];
                        $ValoracionDesarrollo_Autonomia_Anexo15 = $rowMotorizado['ValoracionDesarrollo_Autonomia_Anexo15'];

                        //////////////////////////////////////////////////////////////////? 2.2 //////////////////////////////////////////////////////////////

                        
                        //////////////////////////////////////////////////////////////////? 2.3 //////////////////////////////////////////////////////////////
                        $ValoracionEstadoNutricional_ParametrosAntropometricos = $rowMotorizado['ValoracionEstadoNutricional_ParametrosAntropometricos'];
                        $ValoracionEstadoNutricional_Remision = $rowMotorizado['ValoracionEstadoNutricional_Remision'];
                        //////////////////////////////////////////////////////////////////? 2.3 //////////////////////////////////////////////////////////////


                        //////////////////////////////////////////////////////////////////? 2.4 //////////////////////////////////////////////////////////////

                        $SaludSexual_Signos = $rowMotorizado['SaludSexual_Signos'];
                        $SaludSexual_MaduracionSexualCrecimiento = $rowMotorizado['SaludSexual_MaduracionSexualCrecimiento'];
                        $SaludSexual_AspectosMaduracion = $rowMotorizado['SaludSexual_AspectosMaduracion'];
                        $SaludSexual_Mujeres = $rowMotorizado['SaludSexual_Mujeres'];
                        $SaludSexual_Varones = $rowMotorizado['SaludSexual_Varones'];
                        $SaludSexual_Intersexuales = $rowMotorizado['SaludSexual_Intersexuales'];
                        $SaludSexual_Otros = $rowMotorizado['SaludSexual_Otros'];
                        $SaludSexual_EscalaTanner = $rowMotorizado['SaludSexual_EscalaTanner'];

                        //////////////////////////////////////////////////////////////////? 2.4 //////////////////////////////////////////////////////////////


                        //////////////////////////////////////////////////////////////////? 2.5 //////////////////////////////////////////////////////////////
                        $SaludVisual_Valoracion = $rowMotorizado['SaludVisual_Valoracion'];
                        $SaludVisual_Remision = $rowMotorizado['SaludVisual_Remision'];
                        //////////////////////////////////////////////////////////////////? 2.5 //////////////////////////////////////////////////////////////


                        //////////////////////////////////////////////////////////////////? 2.6 //////////////////////////////////////////////////////////////
                        $SaludAuditiva_Valoracion = $rowMotorizado['SaludAuditiva_Valoracion'];
                        $SaludAuditiva_Anexo4 = $rowMotorizado['SaludAuditiva_Anexo4'];
                        $SaludAuditiva_VALE = $rowMotorizado['SaludAuditiva_VALE'];
                        $SaludAuditiva_VALE_2 = $rowMotorizado['SaludAuditiva_VALE_2'];
                        $SaludAuditiva_VALE_3 = $rowMotorizado['SaludAuditiva_VALE_3'];
                        $SaludAuditiva_VALE_4 = $rowMotorizado['SaludAuditiva_VALE_4'];
                        $SaludAuditiva_VALE_5 = $rowMotorizado['SaludAuditiva_VALE_5'];
                        $SaludAuditiva_VALE_Interpretacion = $rowMotorizado['SaludAuditiva_VALE_Interpretacion'];
                        $SaludAuditiva_Remision = $rowMotorizado['SaludAuditiva_Remision'];
                        //////////////////////////////////////////////////////////////////? 2.6 //////////////////////////////////////////////////////////////


                        //////////////////////////////////////////////////////////////////? 2.7 /////////////////////////////////////////////////////////////
                        $SaludBucal_Valoracion = $rowMotorizado['SaludBucal_Valoracion'];
                        $SaludBucal_Remision = $rowMotorizado['SaludBucal_Remision'];
                        $SaludBucal_ValoracionEstructuras = $rowMotorizado['SaludBucal_ValoracionEstructuras'];
                        //////////////////////////////////////////////////////////////////? 2.7 /////////////////////////////////////////////////////////////

                        //////////////////////////////////////////////////////////////////? 2.8 /////////////////////////////////////////////////////////////
                        $SaludMental_Valoracion = $rowMotorizado['SaludMental_Valoracion'];

                        $SaludMental_RQC = $rowMotorizado['SaludMental_RQC'];
                        $SaludMental_RQCInterpretacion = $rowMotorizado['SaludMental_RQCInterpretacion'];
                        $SaludMental_RQCPuntaje = $rowMotorizado['SaludMental_RQCPuntaje'];

                        $SaludMental_SRQ = $rowMotorizado['SaludMental_SRQ'];
                        $SaludMental_SRQInterpretacion = $rowMotorizado['SaludMental_SRQInterpretacion'];

                        $SaludMental_ASISST = $rowMotorizado['SaludMental_ASISST'];
                        $SaludMental_ASISSTPuntaje = $rowMotorizado['SaludMental_ASISSTPuntaje'];
                        $SaludMental_ASISSTInterpretacion = $rowMotorizado['SaludMental_ASISSTInterpretacion'];

                        $SaludMental_AUDIT = $rowMotorizado['SaludMental_AUDIT'];

                        $SaludMental_Remision = $rowMotorizado['SaludMental_Remision'];
                        //////////////////////////////////////////////////////////////////? 2.8 /////////////////////////////////////////////////////////////

                        //////////////////////////////////////////////////////////////////? 2.9 /////////////////////////////////////////////////////////////
                        $OtrosAspectos_Valoracion = $rowMotorizado['OtrosAspectos_Valoracion'];
                        //////////////////////////////////////////////////////////////////? 2.9 /////////////////////////////////////////////////////////////







                        

                        //////////////////////////////////////////////////////////////////? 3.0 ////////////////////////////////////////////////////////////
                        $Educacion_Datos = $rowMotorizado['Educacion_Datos'];
                        //////////////////////////////////////////////////////////////////? 3.0 ////////////////////////////////////////////////////////////











                        //////////////////////////////////////////////////////////////////? 4.0 ////////////////////////////////////////////////////////////
                        $PlanCuidados_Datos = $rowMotorizado['PlanCuidados_Datos'];
                        $PlanCuidados_Vacunacion = $rowMotorizado['PlanCuidados_Vacunacion'];
                        //////////////////////////////////////////////////////////////////? 4.0 ////////////////////////////////////////////////////////////





                        //////////////////////////////////////////////////////////////////? 5.0 ////////////////////////////////////////////////////////////

                        $DiagnosticosGenerales = $rowMotorizado['DiagnosticosGenerales'];
                        
                        //////////////////////////////////////////////////////////////////? 5.0 ////////////////////////////////////////////////////////////



                        //////////////////////////////////////////////////////////////////? 6.0 ////////////////////////////////////////////////////////////
                        $Remision_General = $rowMotorizado['Remision'];

                        $InformacionAdicional_1 = $rowMotorizado['InformacionAdicional_1'];

                        $ExamenesCUPSCIE10 = $rowMotorizado['ExamenesCUPSCIE10'];

                        $FinalidadConsulta = $rowMotorizado['FinalidadConsulta'];

                        $VacunacionCovid = $rowMotorizado['VacunacionCovid'];

                        //////////////////////////////////////////////////////////////////? 6.0 ////////////////////////////////////////////////////////////







                        

                    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////










                        //////////////////////////////////////////////////////////////////? Anamnesis General //////////////////////////////////////////////////////////////

                        $Anamnesis_General_T = MostrarDatos_3(json_decode($Anamnesis_General,true));

                        if (!empty($Anamnesis_General_T)) {
                            echo "<div class='col-md-12'><br><h2 style='text-align-last: center;'>Anamnesis General</h2><br></div>";
                            echo "<div class='form-group col-md-12'>".$Anamnesis_General_T."</div>";
                        }
                        //////////////////////////////////////////////////////////////////? Anamnesis General //////////////////////////////////////////////////////////////




                        //////////////////////////////////////////////////////////////////? 1.1 //////////////////////////////////////////////////////////////
                          
                        $Antedentes_Personales_T = MostrarDatos_1(json_decode($Antecedentes_Personales,true));
                        $Antecedentes_Medicos_T = MostrarDatos_1(json_decode($Antecedentes_Medicos,true));
                        $Antecedentes_Familiares_T = MostrarDatos_2(json_decode($Antecedentes_Familiares,true));
                        $Antecedentes_MasAntecedentes_T = MostrarDatos_1(json_decode($Antecedentes_MasAntecedentes,true));
                        $Print_Antecedentes_Ginecologicos = MostrarDatos_1(json_decode($Antecedentes_Ginecologicos,true));

                        if (!empty($Antedentes_Personales_T) || !empty($Antecedentes_Medicos_T) || !empty($Antecedentes_Familiares_T) || !empty($Antecedentes_MasAntecedentes_T) || !empty($Print_Antecedentes_Ginecologicos)) {
                            echo "<div class='col-md-12'><br><h2 style='text-align-last: center;'>1.1 Antecedentes</h2><br></div>";
                        
                            // Display the variables only if they are not empty
                            if (!empty($Antedentes_Personales_T)) {
                                echo "<div class='form-group col-md-12'> <h4> Personales: </h4> ".$Antedentes_Personales_T."</div>";
                            }
                        
                            if (!empty($Antecedentes_Medicos_T)) {
                                echo "<div class='form-group col-md-12'> <h4> Medicos: </h4>".$Antecedentes_Medicos_T."</div>";
                            }
                        
                            if (!empty($Antecedentes_Familiares_T)) {
                                echo "<div class='form-group col-md-12'> <h4> Familiares: </h4>".$Antecedentes_Familiares_T."</div>";
                            }
                        
                            if (!empty($Antecedentes_MasAntecedentes_T)) {
                                echo "<div class='form-group col-md-12'> <h4> Mas Antecedentes: </h4> ".$Antecedentes_MasAntecedentes_T."</div>";
                            }

                            if (!empty($Print_Antecedentes_Ginecologicos)) {
                                echo "<div class='form-group col-md-12'> <h4> Ginecologicos: </h4> ".$Print_Antecedentes_Ginecologicos."</div>";
                            }
                        }
                        //////////////////////////////////////////////////////////////////? 1.1 //////////////////////////////////////////////////////////////


                        //////////////////////////////////////////////////////////////////? 1.2 //////////////////////////////////////////////////////////////

                        $Print_DerechosSexuales = MostrarDatos_3(json_decode($DerechosSexuales,true));

                        if (!empty($Print_DerechosSexuales)) {
                            echo "<div class='col-md-12'><br><h2 style='text-align-last: center;'>1.2 Derechos sexuales y reproductivos </h2><br></div>";
                            echo "<div class='form-group col-md-12'>".$Print_DerechosSexuales."</div>";
                        }
                        //////////////////////////////////////////////////////////////////? 1.2 //////////////////////////////////////////////////////////////


                        //////////////////////////////////////////////////////////////////? 1.2.1 //////////////////////////////////////////////////////////////

                        $Print_ValoracionDerechosSexuales = MostrarDatos_4(json_decode($ValoracionDerechosSexuales,true));

                        if (!empty($Print_ValoracionDerechosSexuales)) {
                            echo "<div class='col-md-12'><br><h2 style='text-align-last: center;'>1.2.1 Valoración de los derechos sexuales y reproductivos </h2><br></div>";

                            /*
                            echo "<div class='col-md-12'><br><table class='table table-bordered'>
                            <thead>
                                <tr>
                                    <th colspan='3' style='text-align-last: center;'>Ámbito de Exploración</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Ejercicio de Derechos</td>

                                    <td>Información, educación y acceso a servicios</td>

                                    <td>Condiciones particulares que pueden afectar el ejercicio de los derechos</td>
                                </tr>

                                <tr>
                                    <td>
                                        Toma decisiones alrededor de la 
                                        sexualidad (autonomía)

                                        Identidad de género (sexismo, 
                                        homofobia, y transfobia)

                                        Violencia contra la mujer y/o violencia 
                                        de género. (incluye explotación 
                                        sexual comercial de niños, niñas y 
                                        adolescentes ESCNNA, abuso sexual 
                                        en menores de 14 años de edad, 
                                        violencia en el noviazgo)

                                        Maternidad y paternidad planeada, 
                                        uso de anticonceptivos.

                                        Cuidado del cuerpo y uso de 
                                        protección contra ITS /VIH
                                    </td>

                                    <td>
                                    Conocimiento de fisiología y anatomía de la 
                                    sexualidad y la reproducción. 

                                    Conocimientos sobre ITS/VIH y formas de 
                                    protección.

                                    Conocimientos, creencias y actitudes sobre 
                                    el uso de anticoncepción y preservativos.

                                    Creencias y actitudes sobre el inicio de 
                                    relaciones sexuales.

                                    Creencias y actitudes sobre las relaciones 
                                    de pareja.

                                    Conocimientos sobre derechos en salud 
                                    (anticoncepción e IVE).

                                    Conocimiento sobre la ESCNNA-), uso de 
                                    redes sociales
                                    </td>

                                    <td>
                                        Transgénero que no han accedido a 
                                        acompañamiento en salud de su 
                                        tránsito en el género.

                                        Homosexuales víctimas de violencia 
                                        de pares y social.

                                        Heterosexuales hijos de víctimas de 
                                        violencia de pareja.

                                        Adolescentes en contexto de alto 
                                        riesgo de ESCNNA

                                        Víctimas de violencia sexual
                                    </td>
                                </tr>
                            </tbody>
                        </table></div>";
                        */

                            echo "<div class='form-group col-md-12'>".$Print_ValoracionDerechosSexuales."</div>";
                        }
                        //////////////////////////////////////////////////////////////////? 1.2.1 //////////////////////////////////////////////////////////////


                         //////////////////////////////////////////////////////////////////? 1.3 //////////////////////////////////////////////////////////////

                         $Print_ConsumoHabitos = MostrarDatos_3(json_decode($ConsumoHabitos,true));

                         if (!empty($Print_ConsumoHabitos) ) {
                             
                             echo "<div class='col-md-12'><br><h2 style='text-align-last: center;'>1.3 Consumos y hábitos alimentarios </h2><br></div>";
                             if (!empty($Print_ConsumoHabitos)) {
                                 echo "<div class='form-group col-md-12'>".$Print_ConsumoHabitos."</div>";
                             }
                         }
                         //////////////////////////////////////////////////////////////////? 1.3 //////////////////////////////////////////////////////////////

                        
                        //////////////////////////////////////////////////////////////////? 1.4 //////////////////////////////////////////////////////////////

                        $Print_HabitosSaludables = MostrarDatos_3(json_decode($HabitosSaludables,true));

                        if (!empty($Print_HabitosSaludables)) {
                            echo "<div class='col-md-12'><br><h2 style='text-align-last: center;'>1.4 Prácticas y hábitos saludables</h2><br></div>";
                            echo "<div class='form-group col-md-12'>".$Print_HabitosSaludables."</div>";
                        }
                        //////////////////////////////////////////////////////////////////? 1.4 //////////////////////////////////////////////////////////////


                       




                        //////////////////////////////////////////////////////////////////? 1.5 //////////////////////////////////////////////////////////////

                        $Print_PracticasCrianzaCuidado_FormasComunicacion = MostrarDatos_3(json_decode($PracticasCrianzaCuidado_FormasComunicacion,true));
                        $Print_PracticasCrianzaCuidado_Actividades = MostrarDatos_3(json_decode($PracticasCrianzaCuidado_Actividades,true));
                        

                        if (!empty($Print_PracticasCrianzaCuidado_FormasComunicacion)||!empty($Print_PracticasCrianzaCuidado_Actividades)) {
                            
                            echo "<div class='col-md-12'><br><h2 style='text-align-last: center;'>1.5 Practicas de crianza y cuidado </h2><br></div>";
                            
                            if (!empty($Print_PracticasCrianzaCuidado_FormasComunicacion)) {
                                echo "<div class='form-group col-md-12' >".$Print_PracticasCrianzaCuidado_FormasComunicacion."</div>";
                            }
                            if(!empty($Print_PracticasCrianzaCuidado_Actividades)){
                                echo "<div class='form-group col-md-12' > <br> ".$Print_PracticasCrianzaCuidado_Actividades."</div>";
                            }


                        }
                        
                        //////////////////////////////////////////////////////////////////? 1.5 //////////////////////////////////////////////////////////////





                        //////////////////////////////////////////////////////////////////? 1.6 //////////////////////////////////////////////////////////////

                        $DinamicaFamiliar_CapacidadRecursosFamiliares_T = $DinamicaFamiliar_CapacidadRecursosFamiliares;

                        ////////////////////////////////////? APGAR ///////////////////////////////////////////////////////////////////////////////////////////

                        function updateBaseApgarValues($ArregloBaseApgar, $ArregloApgar) {
                            foreach ($ArregloApgar as $key => $value) {
                                $label = key($value); // Get the label from the nested array
                                if (array_key_exists($label, $ArregloBaseApgar)) {
                                    $ArregloBaseApgar[$label] = $value[$label];
                                }
                            }
                        
                            return $ArregloBaseApgar;
                        }
                        $ArregloBaseApgar['Me satisface la ayuda que recibo de mi familia cuando tengo algún problema o necesidad']="";
                        $ArregloBaseApgar['Me satisface la participacion que mi familia brinda y permite']="";
                        $ArregloBaseApgar['Me satisface como mi familia acepta y apoya mis deseos de emprender nuevas actividades']="";
                        $ArregloBaseApgar['Me satisface como mi familia expresa afecto y responde a mis emociones como rabia, tristeza y amor']="";
                        $ArregloBaseApgar['Me satisface como compartimos en familia: El tiempo para estar juntos Los espacios en la casa El dinero']="";

                        $ArregloApgar = json_decode($DinamicaFamiliar_APGAR,true);
                        if($DinamicaFamiliar_APGAR!=null){
                        $ArregloBaseApgar = updateBaseApgarValues($ArregloBaseApgar, $ArregloApgar);
                        $DinamicaFamiliar_APGAR_T = MostrarAPGAR($ArregloBaseApgar);
                        }
                        
                        ////////////////////////////////////? APGAR ///////////////////////////////////////////////////////////////////////////////////////////

                        $Print_DinamicaFamiliar_CapacidadesRelacion = MostrarDatos_3(json_decode($DinamicaFamiliar_CapacidadesRelacion,true));

                        $DinamicaFamiliar_Familiograma = $Familiograma_Archivo;
                        
                        if(!empty($DinamicaFamiliar_CapacidadRecursosFamiliares_T) || !empty($DinamicaFamiliar_APGAR_T) || !empty($Print_DinamicaFamiliar_CapacidadesRelacion) || !empty($DinamicaFamiliar_Familiograma)){
                            
                            echo "<div class='col-md-12'><br><h2 style='text-align-last: center;'>1.6 Conformación y dinámica de la familia</h2><br></div>";

                            if(!empty($DinamicaFamiliar_Familiograma)){
                                echo "<div class='form-group col-md-12' ><img src='$DinamicaFamiliar_Familiograma' width='500px'></div>";
                            }

                            if(!empty($DinamicaFamiliar_CapacidadRecursosFamiliares_T)){
                                echo "<div class='form-group col-md-12' >Capacidad y Recursos Familiares: ".$DinamicaFamiliar_CapacidadRecursosFamiliares_T."</div>";
                            }

                            if(!empty($DinamicaFamiliar_APGAR_T)){
                                echo "<div class='form-group col-md-12' ><h4 style='text-align-last: center;'> APGAR: </h4> ".$DinamicaFamiliar_APGAR_T."</div>";

                                echo "<div class='form-group col-md-12' >Interpretación: ".$DinamicaFamiliar_Interpretacion_APGAR."</div>";
                                echo "<div class='form-group col-md-12' >Puntaje: ".$DinamicaFamiliar_Puntaje_APGAR."</div>";
                            }

                            if(!empty($Print_DinamicaFamiliar_CapacidadesRelacion)){
                                echo "<div class='form-group col-md-12' ><h4> Capacidades en relación con el cuidado de la salud </h4> ".$Print_DinamicaFamiliar_CapacidadesRelacion."</div>";
                            }

                        }

                        //////////////////////////////////////////////////////////////////? 1.6 //////////////////////////////////////////////////////////////


                        //////////////////////////////////////////////////////////////////? 1.7 //////////////////////////////////////////////////////////////

                        $DinamicaFamiliar_Ecomapa = $Ecomapa_Archivo;
                        
                        if(!empty($DinamicaFamiliar_Ecomapa) ){
                            
                            echo "<div class='col-md-12'><br><h2 style='text-align-last: center;'>1.7 Valoración o actualización de las condiciones de vida, del contexto social y las redes de apoyo social y comunitarias de la familia, pertenencia social y cultural que considere pertenencia étnica</h2><br></div>";

                            if(!empty($DinamicaFamiliar_Ecomapa)){
                                echo "<div class='form-group col-md-12' ><img src='$DinamicaFamiliar_Ecomapa' width='500px'></div>";
                            }

                        }

                        //////////////////////////////////////////////////////////////////? 1.7 //////////////////////////////////////////////////////////////

                        


                        //////////////////////////////////////////////////////////////////? 1.8 //////////////////////////////////////////////////////////////

                        $Print_SeguimientoCompromisoEducacion = MostrarDatos_3(json_decode($SeguimientoCompromisoEducacion,true));

                        if (!empty($Print_SeguimientoCompromisoEducacion)) {
                            echo "<div class='col-md-12'><br><h2 style='text-align-last: center;'>1.8 Seguimiento a compromisos acordados en sesiones de educación individual previas</h2><br></div>";
                            echo "<div class='form-group col-md-12'>".$Print_SeguimientoCompromisoEducacion."</div>";
                        }
                        //////////////////////////////////////////////////////////////////? 1.8 //////////////////////////////////////////////////////////////
















                        //////////////////////////////////////////////////////////////////? 2.1 //////////////////////////////////////////////////////////////
                        $Json_SignosVitales = $rowMotorizado['Json_SignosVitales'];

                        $Json_SignosVitales_T = MostrarDatos_3(json_decode($Json_SignosVitales,true));

                        if(!empty($Json_SignosVitales_T)){

                            echo "<div class='col-md-12'><br><h2 style='text-align-last: center;'>2.1 Signos Vitales</h2><br></div>";
                            echo "<div class='form-group col-md-12' >".$Json_SignosVitales_T."</div>";

                            //$GeneroTablaPresionArterial = $genero;
                            //include 'ModulosRIAS/Adolescencia/Include_TensionArterial_Impresion.php';
                        }
                        //////////////////////////////////////////////////////////////////? 2.1 //////////////////////////////////////////////////////////////


                        //////////////////////////////////////////////////////////////////? 2.2 //////////////////////////////////////////////////////////////

                        $Print_ValoracionDesarrollo_FuncionesCognitivas = MostrarDatos_3(json_decode($ValoracionDesarrollo_FuncionesCognitivas,true));
                        $Print_ValoracionDesarrollo_Identidad_Anexo14 = MostrarDatos_3(json_decode($ValoracionDesarrollo_Identidad_Anexo14,true));
                        $Print_ValoracionDesarrollo_Autonomia = MostrarDatos_3(json_decode($ValoracionDesarrollo_Autonomia,true));
                        $Print_ValoracionDesarrollo_Autonomia_Anexo15 = MostrarDatos_3(json_decode($ValoracionDesarrollo_Autonomia_Anexo15,true));

                        if(!empty($Print_ValoracionDesarrollo_FuncionesCognitivas) ||!empty($Print_ValoracionDesarrollo_Identidad_Anexo14) || !empty($Print_ValoracionDesarrollo_Autonomia) || !empty($Print_ValoracionDesarrollo_Autonomia_Anexo15)){
                            
                            echo "<div class='col-md-12'><br><h2 style='text-align-last: center;'>2.2 Valoración del desarrollo </h2><br></div>";

                            if(!empty($Print_ValoracionDesarrollo_FuncionesCognitivas)){
                                echo "<div class='form-group col-md-12' > <h4> Funciones Cognitivas </h4> <br".$Print_ValoracionDesarrollo_FuncionesCognitivas."</div>";
                            }

                            if(!empty($Print_ValoracionDesarrollo_Identidad_Anexo14)){
                                echo "<div class='form-group col-md-12' ><br> <h4 style='text-align-last: center'> Valoracion de identidad </h4> <br>";

                                /*
                                echo '<table class="table table-bordered" style="zoom: 0.7;">
                                <thead>
                                  <tr>
                                    <th class="tg-0lax" colspan="2">Ambito de exploracion</th>
                                    <th class="tg-0lax">Forma de exploracion</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td class="tg-0lax" rowspan="7">1. Exploración y construcción de compromisos en los diferentes dominios de la identidad. Teniendo en cuenta que las construcciones o compromisos que se establecen en la mayoría de los dominios de la identidad marcan trayectorias de vida, tienen implicaciones en salud y resultan en marcadores del desarrollo.</td>
                                    <td class="tg-0lax">Relacional</td>
                                    <td class="tg-0lax"> ¿Cuántas horas a la semana dedica a tomar lecciones de música, teatro u otra disciplina artística?, ¿Cuántas horas dedica a practicar algún deporte? ¿Realiza actividades recreativas?, ¿Cuál es la que más le gusta? </td>
                                  </tr>
                                  <tr>
                                    <td class="tg-0lax">Relacional: Genero</td>
                                    <td class="tg-0lax">¿Ha pensado sobre el rol que ejercen los hombres y las mujeres? (familia, comunidad, medios de comunicación). ¿Ha pensado/definido que es lo que funcionaría más para usted?</td>
                                  </tr>
                                  <tr>
                                    <td class="tg-0lax">Relacional: Amigos/pareja</td>
                                    <td class="tg-0lax">¿Ha tenido diversas clases de amigos?, ¿Tiene un/a amigo/a cercano/a?, ¿Qué busca en un amigo o amiga?, ¿no está seguro aún?, ¿Elije a sus amigos sobre algunos valores o condiciones particulares?, ¿ha tenido alguna pareja?, ¿Tiene interés de iniciar relaciones de noviazgo?, ¿Ha probado deferentes tipos de relaciones de pareja?, ¿Tiene idea sobre lo que no le gustaría o le gustaría encontrar en una pareja?, ¿Sus ideas al respecto aún se están desarrollando?, ¿Ha decidido lo que sería mejor para usted?</td>
                                  </tr>
                                  <tr>
                                    <td class="tg-0lax">Global</td>
                                    <td class="tg-0lax">¿Tiene idea de los que quiere para su vida?, ¿Ha conversado con amigos/as, madre, padre, profesores/as sobre esto?</td>
                                  </tr>
                                  <tr>
                                    <td class="tg-0lax">Vocacional</td>
                                    <td class="tg-0lax">¿Se ha preguntado sobre lo que quiere estudiar?, o ¿En qué quiere trabajar?, ¿Ha conversado con sus amigos/madre/ padre, sobre esto?, ¿Cree que lo mejor es lo que sus padres ya establecieron para usted?</td>
                                  </tr>
                                  <tr>
                                    <td class="tg-0lax">Ideológica (religión, política y moral)</td>
                                    <td class="tg-0lax">¿Participa en algo en su comunidad o en organizaciones de la escuela o municipio?, ¿Asiste a la Iglesia?, ¿Participa en algún otro grupo juvenil (pandillas o barras)?, ¿Ha pensado en sus creencias políticas/ religiosas?, ¿En este momento está de acuerdo con sus padres?, ¿Sabe y entiende que es lo correcto para usted?, ¿Es importante para usted ayudar a los demás?, ¿Dedica algún tiempo a ayudar a los demás o a su comunidad?, ¿Participa en alguna causa social?, ¿Es importante para usted buscar cualquier oportunidad para divertirse?, ¿Generalmente actúa de acuerdo a lo que piensa así no le guste a sus amigos?, ¿Para usted es importante ser sincero con los demás?, ¿ Culpa a otros por sus errores? Algunos/as jyYenes participan« (En actividades sexuales a cambio de dinero o regalos«. en actiYidades que implican dañar a otras personas, bienes públicos o de otras personas, robar, traficar drogas« en consumir drogas); ¿Conoce personas que participen en este tipo de actividades?</td>
                                  </tr>
                                  <tr>
                                    <td class="tg-0lax">Consigo mismo: Autodefinición positiva de símismo relativamente independientemente de lo externo, conciencia del yo adaptada a las expectativas sociales, sentido decontinuidad ( que incluye significados positivos del propio pasado) ysingularidad que le permite diferenciarse y funcionarautónomamente</td>
                                    <td class="tg-0lax">¿En general se siente satisfecho/a y orgulloso/a consigo mismo/a?, ¿Alguna vez ha sentido que no sirve para nada?, ¿Se considera (indígena, afro, room, mestizo) (homosexual, bisexual, Transgénero, heterosexual) ¿Ha sido desplazado o víctima de violencia?</td>
                                  </tr>
                                  <tr>
                                    <td class="tg-0lax" rowspan="2">2. Se valoran las condiciones que facilitan su desarrollo</td>
                                    <td class="tg-0lax">Factores contextuales: Creencias y expectativas culturales, opciones disponibles, modelos y oportunidades que tienen las/os adolescentes en los diferentes dominios. Pares y entornos escolares quedan idea al joven de las expectativas y opciones disponibles.La familia, facilita el apoyo y estimulación para la exploración, estilos familiares que permiten a los adolescentes expresar su propia individualidad en un clima de conexión emocional y de apoyo</td>
                                    <td class="tg-0lax">(Pares) ¿Puede hablar con sus amigos de sus problemas y dificultades?, ¿Se siente solo/a o aislado/a?, ¿Se siente avergonzado de contarles sus problemas a sus amigos/as? (Familia) ¿Sabe que espera su padre, madre o cuidador de usted?, ¿Le animan a que les cuente sus problemas, preocupaciones o sus opiniones?, ¿Cuenta con la ayuda de su familia cuando tiene algún problema?¿ Le ponen límites a la hora de su llegada a casa?, ¿Le animan a tomar tus propias decisiones?, ¿Le hacen sentir culpable cuando usted no hace lo que ellos quieren o le tratan de forma distante y fría?, ¿Habla con su madre/padre/cuidador(a) sobre lo que le pasa cuando sale en su tiempo libre, con sus amigos/as, novio/a o cuando no está en casa?</td>
                                  </tr>
                                  <tr>
                                    <td class="tg-0lax">Factores intrapersonales: disposición o apertura de nuevas experiencias, en equilibrio con el mantenimiento de ciertos compromisos. Conciencia</td>
                                    <td class="tg-0lax">¿Hay alguna situación difícil por la que haya pasado o esté pasando?... ¿La pudo resolver?, ¿Cómo la resolvió?, ¿Cómo la piensa solucionar?, ¿Qué aprendió de esta situación? ¿Cuándo se le presenta algún problema difícil generalmente confía en que puedes resolverlo?</td>
                                  </tr>
                                </tbody>
                                </table>';
                                */
                                echo "<br> ".$Print_ValoracionDesarrollo_Identidad_Anexo14."</div>";
                            }

                            if(!empty($Print_ValoracionDesarrollo_Autonomia)){
                                echo "<div class='form-group col-md-12' ><br> <h4 style='text-align-last: center' > Autonomia </h4> <br>";
                                
                                

                                echo "<br> ".$Print_ValoracionDesarrollo_Autonomia."</div>";
                            }

                            if(!empty($Print_ValoracionDesarrollo_Autonomia_Anexo15)){

                                echo "<div class='form-group col-md-12' ><br> <h4 style='text-align-last: center'> Valoracion de autonomia </h4> </div>";

                                /*
                                echo '<div class="form-group col-md-12" > <br> <table class="table table-bordered" style="zoom: 0.7;">
                                        <thead>
                                            <tr>
                                                <th class="tg-0lax" colspan="2">Ambito de exploracion</th>
                                                <th class="tg-0lax">Forma de exploracion</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="tg-0lax">1. Funcionamiento psicosocial del adolescente fuera del hogar</td>
                                                <td class="tg-0lax">Valoración la implicación del/la adolescente en problemas de comportamiento. Valora el
                                                    nivel de competencia con sus pares</td>
                                                <td class="tg-0lax">En la exploración con la familia del adolescente interrogar sobre participación en
                                                    actividades como destruir bienes ajenos, vincularse a peleas, agredir a otras personas, quejas de
                                                    comportamiento del colegio, uso de SPA, conducción temeraria.</td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0lax" rowspan="3">2. Componentes de la autonomía (actitudinal, emocional, funcional)</td>
                                                <td class="tg-0lax">Componente actitudinal: hace referencia a la capacidad de elegir metas (capacidad de
                                                    identificar varias opciones y tomar una decisión)</td>
                                                <td class="tg-0lax" rowspan="3">Se recomienda valorar en relación con algún asunto particular en el que se
                                                    quiera profundizar y aun se esté valorando este: (Por ejemplo: inicio de relaciones sexuales, drogas,
                                                    maternidad/ paternidad. Violencia de pareja, reclutamiento«.) ¿Ha pensado sobre« (Y.g. la maternidad en
                                                    este momento)?. ¿Tiene alguna decisión al respecto?, ¿Porque tomo esa decisión? En general en la
                                                    adolescencia las y los jóvenes pueden sentirse presionados por sus amigos/as, pareja a« Algunos
                                                    argumentos que suelen utilizarse son« ¿Qué opina sobre esto? ¿Qué haría si se encontrara en una
                                                    situación similar? ¿Qué opciones tiene para eYitar«.?</td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0lax">Componente emocional: tiene que ver con el proceso afectivo de sentirse con confianza en
                                                    las opciones y objetivos propios. (independencia emocional)</td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0lax">Componente funcional: Son los procedimientos de regulación necesarios para el desarrollo
                                                    de estrategias y selección de alguna potencialmente eficaz de acuerdo a su objetivo</td>
                                            </tr>
                                            <tr>
                                                <td class="tg-0lax">3. Factores asociados a su buen desempeño</td>
                                                <td class="tg-0lax">Factores que facilitan su buen desarrollo: Comunicación familiar Equilibrio entre la
                                                    concesión de la autonomía con cantidades apropiadas de control y aceptación. Espacios familiares que
                                                    facilitan aprender de los errores</td>
                                                <td class="tg-0lax">¿En su familia suelen explicar y discutir las razones de los desacuerdos? ¿Sabe que
                                                    espera su madre, padre o cuidador(a) de usted?, ¿Lo animan a que les cuente sus problemas,
                                                    preocupaciones u opiniones?, ¿En caso de tener problemas puede contar con su ayuda?, ¿Le ponen límites a
                                                    la hora en que usted debe volver a casa?, ¿considera que las reglas en su familia son muy estrictas?,
                                                    ¿Le animan tomar sus propias decisiones?, ¿Lo hacen sentir culpable cuando usted no hace lo que ellos
                                                    quieren o le tratan de forma distante?.</td>
                                            </tr>
                                        </tbody>
                                    </table></div>';
                                */
                                echo "<div class='form-group col-md-12' > <br> ".$Print_ValoracionDesarrollo_Autonomia_Anexo15."</div>";
                            }

                        }
                        //////////////////////////////////////////////////////////////////? 2.2 //////////////////////////////////////////////////////////////






                        //////////////////////////////////////////////////////////////////? 2.3 //////////////////////////////////////////////////////////////

                        $Print_ValoracionEstadoNutricional_ParametrosAntropometricos = MostrarDatos_4(json_decode($ValoracionEstadoNutricional_ParametrosAntropometricos,true));
                        

                        if(!empty($Print_ValoracionEstadoNutricional_ParametrosAntropometricos)  ){
                            
                            echo "<div class='col-md-12'><br><h2 style='text-align-last: center;'>2.3 Valoración del estado nutricional y seguimiento a parámetros antropométricos</h2><br></div>";

                            if(!empty($Print_ValoracionEstadoNutricional_ParametrosAntropometricos)){
                                echo "<div class='form-group col-md-12' > ".$Print_ValoracionEstadoNutricional_ParametrosAntropometricos."</div>";
                            }


                        }
                        //////////////////////////////////////////////////////////////////? 2.3 //////////////////////////////////////////////////////////////

                       



                        //////////////////////////////////////////////////////////////////? 2.4 //////////////////////////////////////////////////////////////

                        $Print_SaludSexual_Signos = MostrarDatos_3(json_decode($SaludSexual_Signos,true));

                        $Print_SaludSexual_MaduracionSexualCrecimiento = MostrarDatos_3(json_decode($SaludSexual_MaduracionSexualCrecimiento,true));
                        $Print_SaludSexual_AspectosMaduracion = MostrarDatos_3(json_decode($SaludSexual_AspectosMaduracion,true));
                        $Print_SaludSexual_Mujeres = MostrarDatos_1(json_decode($SaludSexual_Mujeres,true));
                        $Print_SaludSexual_Varones = MostrarDatos_1(json_decode($SaludSexual_Varones,true));

                        $Print_SaludSexual_Intersexuales= MostrarDatos_3(json_decode($SaludSexual_Intersexuales,true));
                        $Print_SaludSexual_Otros = MostrarDatos_3(json_decode($SaludSexual_Otros,true));
                        $Print_SaludSexual_EscalaTanner = MostrarDatos_3(json_decode($SaludSexual_EscalaTanner,true));


                        


                        if(!empty($Print_SaludSexual_Signos) || !empty($Print_SaludSexual_MaduracionSexualCrecimiento) || !empty($Print_SaludSexual_AspectosMaduracion) || !empty($Print_SaludSexual_Mujeres) || !empty($Print_SaludSexual_Varones) || !empty($Print_SaludSexual_Intersexuales) || !empty($Print_SaludSexual_Otros) || !empty($Print_SaludSexual_EscalaTanner) ){
                            
                            echo "<div class='col-md-12'><br><h2 style='text-align-last: center;'>2.4 Valoración de la salud sexual</h2><br></div>";

                            if(!empty($Print_SaludSexual_Signos)){
                                echo "<div class='form-group col-md-12' > ".$Print_SaludSexual_Signos."</div>";
                            }

                            if(!empty($Print_SaludSexual_MaduracionSexualCrecimiento)){
                                echo "<div class='form-group col-md-12' > <h4> Maduración sexual y crecimiento físico </h4> <br> ".$Print_SaludSexual_MaduracionSexualCrecimiento."</div>";
                            }

                            if(!empty($Print_SaludSexual_AspectosMaduracion)){
                                echo "<div class='form-group col-md-12' > <h4> Aspectos que interfieren en maduración sexual </h4> <br> ".$Print_SaludSexual_AspectosMaduracion."</div>";
                            }


                            if(!empty($Print_SaludSexual_EscalaTanner)){
                                //echo "<div class='form-group col-md-12' > <h4> Tanner: </h4> ".$Print_SaludSexual_EscalaTanner."</div>";

                                
                                $Arreglo["F1"]["Estadio I"] = "MujerMama_1.png";
                                $Arreglo["F1"]["Estadio II"] = "MujerMama_2.png";
                                $Arreglo["F1"]["Estadio III"] = "MujerMama_3.png";
                                $Arreglo["F1"]["Estadio IV"] = "MujerMama_4.png";
                                $Arreglo["F1"]["Estadio V"] = "MujerMama_5.png";


                                $Arreglo["F2"]["Estadio I"] = "MujerPubis_1.png";
                                $Arreglo["F2"]["Estadio II"] = "MujerPubis_2.png";
                                $Arreglo["F2"]["Estadio III"] = "MujerPubis_3.png";
                                $Arreglo["F2"]["Estadio IV"] = "MujerPubis_4.png";
                                $Arreglo["F2"]["Estadio V"] = "MujerPubis_5.png";


                                $Arreglo["M1"]["Estadio G1"] = "HombreG_1.png";
                                $Arreglo["M1"]["Estadio G2"] = "HombreG_2.png";
                                $Arreglo["M1"]["Estadio G3"] = "HombreG_3.png";
                                $Arreglo["M1"]["Estadio G4"] = "HombreG_4.png";
                                $Arreglo["M1"]["Estadio G5"] = "HombreG_5.png";
                                
                                $Arreglo["M2"]["Estadio P1"] = "HombreP_1.png";
                                $Arreglo["M2"]["Estadio P2"] = "HombreP_2.png";
                                $Arreglo["M2"]["Estadio P3"] = "HombreP_3.png";
                                $Arreglo["M2"]["Estadio P4"] = "HombreP_4.png";
                                $Arreglo["M2"]["Estadio P5"] = "HombreP_5.png";

                                echo "<div class='form-group col-md-12' > <h4> Tanner: </h4> <br>";
                                // Iterar sobre el arreglo original
                                foreach (json_decode($SaludSexual_EscalaTanner,true) as $key => $value) {
                                    foreach ($value as $subKey => $subValue) {
                                        // Verificar si existe la clave y el valor en el arreglo de valores correspondientes
                                        if (isset($Arreglo[$subKey][$subValue])) {
                                            // Imprimir la segunda clave y el valor correspondiente como una imagen
                                            echo $subValue . ": <img src='ModulosRIAS/ImagenesTanner/" . $Arreglo[$subKey][$subValue] . "' alt='" . $subValue . "' style='width: 150px;'><br>";
                                        }
                                    }
                                }
                                echo "</div>";

                            }

                            if(!empty($Print_SaludSexual_Mujeres)){
                                echo "<div class='form-group col-md-12' > <h4> En Mujeres: </h4> ".$Print_SaludSexual_Mujeres."</div>";
                            }

                            if(!empty($Print_SaludSexual_Varones)){
                                echo "<div class='form-group col-md-12' > <h4> En Varones: </h4> ".$Print_SaludSexual_Varones."</div>";
                            }

                            if(!empty($Print_SaludSexual_Intersexuales)){
                                echo "<div class='form-group col-md-12' > <h4> Intersexuales: </h4> ".$Print_SaludSexual_Intersexuales."</div>";
                            }

                            if(!empty($Print_SaludSexual_Otros)){
                                echo "<div class='form-group col-md-12' > <h4> Otros: </h4> ".$Print_SaludSexual_Otros."</div>";
                            }


                        }
                        //////////////////////////////////////////////////////////////////? 2.4 //////////////////////////////////////////////////////////////



                        
                        //////////////////////////////////////////////////////////////////? 2.5 //////////////////////////////////////////////////////////////

                        $Print_SaludVisual_Valoracion= MostrarDatos_3(json_decode($SaludVisual_Valoracion,true));
                        
                        if(!empty($Print_SaludVisual_Valoracion) ){
                            
                            echo "<div class='col-md-12'><br><h2 style='text-align-last: center;'>2.5 Valoración de salud visual</h2><br></div>";

                            if(!empty($Print_SaludVisual_Valoracion)){
                                echo "<div class='form-group col-md-12' >".$Print_SaludVisual_Valoracion."</div>";
                            }


                        }

                        //////////////////////////////////////////////////////////////////? 2.5 //////////////////////////////////////////////////////////////


                        //////////////////////////////////////////////////////////////////? 2.6 //////////////////////////////////////////////////////////////

                        function MostrarDatos_VALE($ArregloDatos, $ArregloTitulo) {
                            $html = '';
                            $tituloTemporal = ''; // Variable temporal para almacenar el título
                        
                            foreach ($ArregloDatos as $key => $value) {
                                // Obtener el título correspondiente
                                $titulo = $ArregloTitulo[$key];
                        
                                // Verificar si el título ha cambiado
                                if ($titulo != $tituloTemporal) {
                                    // Guardar el nuevo título en la variable temporal
                                    $tituloTemporal = $titulo;
                                    // Agregar el título al HTML
                                    $html .= "<p style='font-weight: bold;'	>$titulo</p>";
                                }
                        
                                foreach ($value as $key_1 => $value_1) {

                                    $valorTexto = ($value_1 == 1) ? 'Sí' : 'No';

                                    $html .= "<p>$key_1 : $valorTexto</p>";
                                }
                            }
                        
                            return $html;
                        }

                        function MostrarDatos_VALE_1($ArregloDatos) {
                            $html = '';

                            foreach ($ArregloDatos as $key => $value) {
                                foreach ($value as $key_1 => $value_1) {
                                    $html .= "<div class='form-group col-md-12'>";
                                    $html .= "<label style='font-size:18px;'>$key_1</label>";

                                    foreach ($value_1 as $key_2 => $value_2) {
                                        
                                            

                                            if (is_array($value_2)) {
                                                
                                                foreach ($value_2 as $key_3 => $value_3) {
                                                    
                                                    if (is_array($value_3)) {
                                                        $html .= "<p>$key_3:</p>";
                                                        foreach ($value_3 as $key_4 => $value_4) {
                                                            $html .= "<p>$value_4</p>";
                                                        }
                                                    } else {
                                                        $html .= "<p>$key_3: $value_3</p>";
                                                    }

                                                }
                                            } else {
                                                $valorTexto = ($value_2 == 1) ? 'Sí' : 'No';

                                                $html .= "<p>$key_2: $valorTexto</p>";
                                            }
                                        
                                    }

                                    $html .= "<br>";
                                    $html .= "</div>";
                                }
                            }

                            return $html;
                        }

                        

                        $ArregloTitulo0 = array(
                            "1" => "Del nacimiento a 5 meses de edad",
                            "2" => "Del nacimiento a 5 meses de edad",
                            "3" => "Del nacimiento a 5 meses de edad",
                            "4" => "Del nacimiento a 5 meses de edad",
                            "5" => "Del nacimiento a 5 meses de edad",
                            "6" => "6-11 Meses",
                            "7" => "6-11 Meses",
                            "8" => "6-11 Meses",
                            "9" => "6-11 Meses",
                            "10" => "12-17 Meses",
                            "11" => "12-17 Meses",
                            "12" => "12-17 Meses",
                            "13" => "12-17 Meses",
                            "14" => "12-17 Meses",
                            "15" => "12-17 Meses",
                            "16" => "18-23 Meses",
                            "17" => "18-23 Meses",
                            "18" => "18-23 Meses",
                            "19" => "18-23 Meses",
                            "20" => "18-23 Meses",
                            "21" => "18-23 Meses",
                            "22" => "18-23 Meses",
                            "23" => "18-23 Meses",
                            "24" => "18-23 Meses",
                            "25" => "18-23 Meses",
                            "26" => "2-3 Años",
                            "27" => "2-3 Años",
                            "28" => "2-3 Años",
                            "29" => "2-3 Años",
                            "30" => "2-3 Años",
                            "31" => "2-3 Años",
                            "32" => "2-3 Años",
                            "33" => "2-3 Años",
                            "34" => "2-3 Años",
                            "35" => "2-3 Años",
                            "36" => "2-3 Años",
                            "37" => "3-4 Años",
                            "38" => "3-4 Años",
                            "39" => "3-4 Años",
                            "40" => "3-4 Años",
                            "41" => "3-4 Años",
                            "42" => "3-4 Años",
                            "43" => "3-4 Años",
                            "44" => "3-4 Años",
                            "45" => "3-4 Años",
                            "46" => "3-4 Años",
                            "47" => "3-4 Años",
                            "48" => "4-5 Años",
                            "49" => "4-5 Años",
                            "50" => "4-5 Años",
                            
                            "51" => "4-5 Años",
                            "52" => "4-5 Años",
                            "53" => "4-5 Años",
                            "54" => "4-5 Años",
                            "55" => "4-5 Años",
                            "56" => "4-5 Años",
                            "57" => "5 Años",
                            "58" => "5 Años",
                            "59" => "5 Años",
                            "60" => "5 Años",
                            "61" => "5 Años",
                            "62" => "5 Años",
                            "63" => "5 Años",
                            "64" => "5 Años",
                            "65" => "5 Años",
                        );

                        $ArregloTitulo1 = array(
                            "1" => "Menores de 2 años",
                            "2" => "Menores de 2 años",
                            "3" => "Menores de 2 años",
                            "4" => "Todas las edades",
                            "5" => "Todas las edades",
                            "6" => "Todas las edades",
                            "7" => "Todas las edades"
                        );

                        $ArregloTitulo2 = array(
                            "1" => "0 a 3 meses",
                            "2" => "0 a 3 meses",
                            "3" => "0 a 3 meses",
                            "4" => "0 a 3 meses",
                            "5" => "4 a 6 meses",
                            "6" => "4 a 6 meses",
                            "7" => "4 a 6 meses",
                            "8" => "7 a 9 meses",
                            "9" => "7 a 9 meses",
                            "10" => "7 a 9 meses",
                            "11" => "10 a 12 meses",
                            "12" => "10 a 12 meses",
                            "13" => "10 a 12 meses",
                            "14" => "10 a 12 meses",
                            "15" => "13 a 15 meses",
                            "16" => "13 a 15 meses",
                            "17" => "13 a 15 meses",
                            "18" => "16 a 18 meses",
                            "19" => "16 a 18 meses",
                            "20" => "16 a 18 meses",
                            "21" => "19 a 24 meses",
                            "22" => "19 a 24 meses",
                            "23" => "19 a 24 meses",
                            "24" => "25 a 36 meses",
                            "25" => "25 a 36 meses",
                            "26" => "25 a 36 meses",
                            "27" => "25 a 36 meses",
                            "28" => "3 Años 1 Mes a 4 Años",
                            "29" => "3 Años 1 Mes a 4 Años",
                            "30" => "3 Años 1 Mes a 4 Años",
                            "31" => "4 Años 1 Mes a 5 Años",
                            "32" => "4 Años 1 Mes a 5 Años",
                            "33" => "4 Años 1 Mes a 5 Años",
                            "34" => "5 Años 1 Mes a 9 Años",
                            "35" => "5 Años 1 Mes a 9 Años",
                            "36" => "5 Años 1 Mes a 9 Años",
                            "37" => "9 Años 1 Mes a 12 Años 11 Meses",
                            "38" => "9 Años 1 Mes a 12 Años 11 Meses",
                            "39" => "9 Años 1 Mes a 12 Años 11 Meses"
                        );

                        $ArregloTitulo3 = array(
                            "1" => "3 Años a 5 Años",
                            "2" => "3 Años a 5 Años",
                            "3" => "5 Años 1 Mes a 12 Años 11 Mes",
                            "4" => "5 Años 1 Mes a 12 Años 11 Mes",
                            "5" => "5 Años 1 Mes a 12 Años 11 Mes",
                            "6" => "5 Años 1 Mes a 12 Años 11 Mes"
                        );
                        


                        $Print_SaludAuditiva_Valoracion= MostrarDatos_3(json_decode($SaludAuditiva_Valoracion,true));
                        $Print_SaludAuditiva_Anexo4= MostrarDatos_VALE(json_decode($SaludAuditiva_Anexo4,true),$ArregloTitulo0);
                        $Print_SaludAuditiva_VALE= MostrarDatos_VALE(json_decode($SaludAuditiva_VALE,true),$ArregloTitulo1);
                        $Print_SaludAuditiva_VALE_2= MostrarDatos_VALE_1(json_decode($SaludAuditiva_VALE_2,true));
                        $Print_SaludAuditiva_VALE_3= MostrarDatos_VALE(json_decode($SaludAuditiva_VALE_3,true),$ArregloTitulo2);
                        $Print_SaludAuditiva_VALE_4= MostrarDatos_VALE(json_decode($SaludAuditiva_VALE_4,true),$ArregloTitulo3);
                        $Print_SaludAuditiva_VALE_5= MostrarDatos_3(json_decode($SaludAuditiva_VALE_5,true));


                        if(!empty($Print_SaludAuditiva_Valoracion) || !empty($Print_SaludAuditiva_Anexo4) || !empty($Print_SaludAuditiva_VALE)
                        || !empty($Print_SaludAuditiva_VALE_2) || !empty($Print_SaludAuditiva_VALE_3) || !empty($Print_SaludAuditiva_VALE_4)
                        || !empty($Print_SaludAuditiva_VALE_5) ){
                            
                            echo "<div class='col-md-12'><br><h2 style='text-align-last: center;'>2.6 Valoración de la salud auditiva y comunicativa</h2><br></div>";

                            if(!empty($Print_SaludAuditiva_Valoracion)){
                                echo "<div class='form-group col-md-12' > <br> ".$Print_SaludAuditiva_Valoracion."</div>";
                            }

                            if(!empty($Print_SaludAuditiva_Anexo4)){
                                echo "<div class='form-group col-md-12' > <br> <h4> Lista factores de riesgo enfermedades del oído </h4> <br>".$Print_SaludAuditiva_Anexo4."</div>";
                            }

                            if(!empty($Print_SaludAuditiva_VALE)
                            || !empty($Print_SaludAuditiva_VALE_2) || !empty($Print_SaludAuditiva_VALE_3) || !empty($Print_SaludAuditiva_VALE_4)
                            || !empty($Print_SaludAuditiva_VALE_5) ){
                                echo "<div class='form-group col-md-12' style='text-align-last: center'> <br> <h4> VALE </h4> <br></div>";
                            }

                            if(!empty($Print_SaludAuditiva_VALE)){
                                echo "<div class='form-group col-md-12' > <br> <h4> Riesgos generales </h4> <br>".$Print_SaludAuditiva_VALE."</div>";
                            }

                            if(!empty($Print_SaludAuditiva_VALE_2)){
                                echo "<div class='form-group col-md-12' > <br> <h4> Condiciones estructurales </h4> <br>".$Print_SaludAuditiva_VALE_2."</div>";
                            }

                            if(!empty($Print_SaludAuditiva_VALE_3)){
                                echo "<div class='form-group col-md-12' > <br> <h4> Item de valoracion </h4> <br>".$Print_SaludAuditiva_VALE_3."</div>";
                            }

                            if(!empty($Print_SaludAuditiva_VALE_4)){
                                echo "<div class='form-group col-md-12' > <br> <h4> Item de valoracion vestibular </h4> <br>".$Print_SaludAuditiva_VALE_4."</div>";
                            }

                            if(!empty($Print_SaludAuditiva_VALE_5)){
                                echo "<div class='form-group col-md-12' > <br> <h4> Calificacion </h4> <br>".$Print_SaludAuditiva_VALE_5."</div>";
                                echo "<div class='form-group col-md-12' > <br> Interpretacion: ".$SaludAuditiva_VALE_Interpretacion."</div>";
                            }


                        }

                        //////////////////////////////////////////////////////////////////? 2.6 //////////////////////////////////////////////////////////////



                        //////////////////////////////////////////////////////////////////? 2.7 /////////////////////////////////////////////////////////////

                        $Print_SaludBucal_Valoracion = MostrarDatos_1(json_decode($SaludBucal_Valoracion,true));
                        $Print_SaludBucal_ValoracionEstructuras = MostrarDatos_3(json_decode($SaludBucal_ValoracionEstructuras,true));
                        
                        if(!empty($Print_SaludBucal_Valoracion) || !empty($Print_SaludBucal_ValoracionEstructuras) ){
                            
                            echo "<div class='col-md-12'><br><h2 style='text-align-last: center;'>2.7 Valoración de la salud bucal</h2><br></div>";

                            if(!empty($Print_SaludBucal_ValoracionEstructuras)){

                                echo "<div class='form-group col-md-12' > <br> ".$Print_SaludBucal_ValoracionEstructuras."</div>";
                            }
                            if(!empty($Print_SaludBucal_Valoracion)){

                                echo "<div class='form-group col-md-12' > <br> ".$Print_SaludBucal_Valoracion."</div>";
                            }



                        }

                        //////////////////////////////////////////////////////////////////? 2.7 /////////////////////////////////////////////////////////////



                        //////////////////////////////////////////////////////////////////? 2.8 /////////////////////////////////////////////////////////////

                        function MostrarDatos_ASSIST($ArregloDatos,$ArregloTitulo){
                            
                            $html = '';
                            $tituloTemporal = ''; // Variable temporal para almacenar el título
                        
                            foreach ($ArregloDatos as $key => $value) {
                                // Obtener el título correspondiente
                                $titulo = $ArregloTitulo[$key];
                        
                                // Verificar si el título ha cambiado
                                if ($titulo != $tituloTemporal) {
                                    // Guardar el nuevo título en la variable temporal
                                    $tituloTemporal = $titulo;
                                    // Agregar el título al HTML
                                    $html .= "<p style='font-weight: bold;'	>$titulo</p>";
                                }
                        
                                foreach ($value as $key_1 => $value_1) {

                                    $valorTexto = $value_1;

                                    //$html .= "<p>$key_1 : $valorTexto</p>";
                                    foreach ($value_1 as $key_2 => $value_2) {

                                        $valorTexto = $value_2;


                                                                        $ArregloRespuesta['Pregunta_2']['0']='Nunca';
                                                                        $ArregloRespuesta['Pregunta_2']['2']='Una o dos veces';
                                                                        $ArregloRespuesta['Pregunta_2']['3']='Mensualmente';
                                                                        $ArregloRespuesta['Pregunta_2']['4']='Semanalmente';
                                                                        $ArregloRespuesta['Pregunta_2']['6']='Diariamente o casi diariamente';
                                
                                                                        $ArregloRespuesta['Pregunta_3']['0']='Nunca';
                                                                        $ArregloRespuesta['Pregunta_3']['3']='Una o dos veces';
                                                                        $ArregloRespuesta['Pregunta_3']['4']='Mensualmente';
                                                                        $ArregloRespuesta['Pregunta_3']['5']='Semanalmente';
                                                                        $ArregloRespuesta['Pregunta_3']['6']='Diariamente o casi diariamente';
                                
                                                                        $ArregloRespuesta['Pregunta_4']['0']='Nunca';
                                                                        $ArregloRespuesta['Pregunta_4']['4']='Una o dos veces';
                                                                        $ArregloRespuesta['Pregunta_4']['5']='Mensualmente';
                                                                        $ArregloRespuesta['Pregunta_4']['6']='Semanalmente';
                                                                        $ArregloRespuesta['Pregunta_4']['7']='Diariamente o casi diariamente';
                                
                                                                        $ArregloRespuesta['Pregunta_5']['0']='Nunca';
                                                                        $ArregloRespuesta['Pregunta_5']['5']='Una o dos veces';
                                                                        $ArregloRespuesta['Pregunta_5']['6']='Mensualmente';
                                                                        $ArregloRespuesta['Pregunta_5']['7']='Semanalmente';
                                                                        $ArregloRespuesta['Pregunta_5']['8']='Diariamente o casi diariamente';
                                
                                                                        $ArregloRespuesta['Pregunta_6']['0']='No, nunca';
                                                                        $ArregloRespuesta['Pregunta_6']['6']='Si, en los ultimos 3 meses';
                                                                        $ArregloRespuesta['Pregunta_6']['3']='Si, pero no en los ultimos 3 meses';
                                
                                                                        $ArregloRespuesta['Pregunta_7']['0']='No, nunca';
                                                                        $ArregloRespuesta['Pregunta_7']['6']='Si, en los ultimos 3 meses';
                                                                        $ArregloRespuesta['Pregunta_7']['3']='Si, pero no en los ultimos 3 meses';
                                
                                                                        $ArregloRespuesta['Pregunta_8']['0']='No, nunca';
                                                                        $ArregloRespuesta['Pregunta_8']['6']='Si, en los ultimos 3 meses';
                                                                        $ArregloRespuesta['Pregunta_8']['3']='Si, pero no en los ultimos 3 meses';

                                        
                                        if($key_1 == "11" AND $key != "Pregunta_8"){
                                            $html .= "<p>$key_2 : <u>".$valorTexto."</u></p>";
                                        }else{

                                            switch ($key) {
                                                case 'Pregunta_1':
                                                    $html .= "<p>$key_2 : <u>".$valorTexto."</u></p>";
                                                    break;
                                                case 'Pregunta_2': 
                                                    $html .= "<p>$key_2 : <u>$valorTexto - ".$ArregloRespuesta[$key][$valorTexto]."</u></p>";
                                                    break;
                                                case 'Pregunta_3': 
                                                    $html .= "<p>$key_2 : <u>$valorTexto - ".$ArregloRespuesta[$key][$valorTexto]."</u></p>";
                                                    break;
                                                case 'Pregunta_4': 
                                                    $html .= "<p>$key_2 : <u>$valorTexto - ".$ArregloRespuesta[$key][$valorTexto]."</u></p>";
                                                    break;
                                                case 'Pregunta_5': 
                                                    $html .= "<p>$key_2 : <u>$valorTexto - ".$ArregloRespuesta[$key][$valorTexto]."</u></p>";
                                                    break;
                                                case 'Pregunta_6': 
                                                    $html .= "<p>$key_2 :<u> $valorTexto - ".$ArregloRespuesta[$key][$valorTexto]."</u></p>";
                                                    break;
                                                case 'Pregunta_7': 
                                                    $html .= "<p>$key_2 : <u>$valorTexto - ".$ArregloRespuesta[$key][$valorTexto]."</u></p>";
                                                    break;
                                                case 'Pregunta_8': 
                                                    $html .= "<p>$key_2 : <u>$valorTexto - ".$ArregloRespuesta[$key][$valorTexto]."</u></p>";
                                                    break;
                                            }

                                        }
                                        
                                        
                                    }

                                }

                                
                                switch ($key) {
                                    case 'Pregunta_2': 
                                        $html .= "<br><u>Valores Numericos: 0=>Nunca, 2=>Uno o dos veces, 3=>Mensualmente, 4=>Semanalmente, 6=>A diario o casi a diario </u> <br>";
                                        break;
                                    case 'Pregunta_3': 
                                        $html .= "<br><u>Valores Numericos: 0=>Nunca, 3=>Uno o dos veces, 4=>Mensualmente, 5=>Semanalmente, 6=>A diario o casi a diario </u> <br>";
                                        break;
                                    case 'Pregunta_4': 
                                        $html .= "<br><u>Valores Numericos: 0=>Nunca, 4=>Uno o dos veces, 5=>Mensualmente, 6=>Semanalmente, 7=>A diario o casi a diario </u> <br>";
                                        break;
                                    case 'Pregunta_5': 
                                        $html .= "<br><u>Valores Numericos: 0=>Nunca, 5=>Uno o dos veces, 6=>Mensualmente, 7=>Semanalmente, 8=>A diario o casi a diario </u> <br>";
                                        break;
                                    case 'Pregunta_6': 
                                        $html .= "<br><u>Valores Numericos: 0=>Nunca,  6=>Si, en los ultimos 3 meses, 3=>Si, pero no en los  ultimos 3 meses </u> <br>";
                                        break;
                                    case 'Pregunta_7': 
                                        $html .= "<br><u>Valores Numericos: 0=>Nunca,  6=>Si, en los ultimos 3 meses, 3=>Si, pero no en los  ultimos 3 meses </u> <br>";
                                        break;
                                    case 'Pregunta_8': 
                                        $html .= "<br><u>Valores Numericos: 0=>Nunca,  6=>Si, en los ultimos 3 meses, 3=>Si, pero no en los  ultimos 3 meses </u> <br>";
                                        break;
                                }
                                
                            }
                        
                            return $html;

                        }

                        function MostrarDatos_AUDIT($ArregloDatos){
                            $html = '';
                        
                            $ArregloSelectOptions = [
                                "1" => [
                                    0 => "Nunca",
                                    1 => "Una o menos veces al mes",
                                    2 => "De 2 a 4 veces al mes",
                                    3 => "De 2 a 3 mas veces a la semana",
                                    4 => "4 o más veces a la semana"
                                ],
                                "2" => [
                                    0 => "1 o 2",
                                    1 => "3 o 4",
                                    2 => "5 o 6",
                                    3 => "7, 8, o 9",
                                    4 => "10 o más"
                                ],
                                "3" => [
                                    0 => "Nunca",
                                    1 => "Menos de una vez al mes",
                                    2 => "Mensualmente",
                                    3 => "Semanalmente",
                                    4 => "A diario o casi a diario"
                                ],
                                "4" => [
                                    0 => "Nunca",
                                    1 => "Menos de una vez al mes",
                                    2 => "Mensualmente",
                                    3 => "Semanalmente",
                                    4 => "A diario o casi a diario"
                                ],
                                "5" => [
                                    0 => "Nunca",
                                    1 => "Menos de una vez al mes",
                                    2 => "Mensualmente",
                                    3 => "Semanalmente",
                                    4 => "A diario o casi a diario"
                                ],
                                "6" => [
                                    0 => "Nunca",
                                    1 => "Menos de una vez al mes",
                                    2 => "Mensualmente",
                                    3 => "Semanalmente",
                                    4 => "A diario o casi a diario"
                                ],
                                "7" => [
                                    0 => "Nunca",
                                    1 => "Menos de una vez al mes",
                                    2 => "Mensualmente",
                                    3 => "Semanalmente",
                                    4 => "A diario o casi a diario"
                                ],
                                "8" => [
                                    0 => "Nunca",
                                    1 => "Menos de una vez al mes",
                                    2 => "Mensualmente",
                                    3 => "Semanalmente",
                                    4 => "A diario o casi a diario"
                                ],
                                "9" => [
                                    0 => "No",
                                    2 => "Sí, pero no en el curso del último año",
                                    4 => "Sí, el último año"
                                ],
                                "10" => [
                                    0 => "No",
                                    2 => "Sí, pero no en el curso del último año",
                                    4 => "Sí, el último año"
                                ]
                            ];

                            foreach ($ArregloDatos as $key => $value) {
                                
                                
                                                        
                                                        foreach ($value as $key1 => $value_1) {
                                                            $html .= "<label style='font-weight: bold;'>Pregunta #$key</label>";
                                                        
                                                            if (isset($ArregloSelectOptions[$key][$value_1])) {
                                                                $html .= "<p>$key1: $value_1 - ".$ArregloSelectOptions[$key][$value_1]."</p>";
                                                            } else {
                                                                $html .= "<p>$key1: $value_1</p>";
                                                            }

                                                        }

                            }
                        
                            return $html;
                        }

                         /*
                            "1" => "A lo largo de la vida, ¿cuál de las siguientes sustancias ha consumido alguna vez? (solo las que consumió sin receta médica)",
                            "2" => "A lo largo de la vida, ¿cuál de las siguientes sustancias ha consumido alguna vez? (solo las que consumió sin receta médica)",
                            "3" => "A lo largo de la vida, ¿cuál de las siguientes sustancias ha consumido alguna vez? (solo las que consumió sin receta médica)",
                            "4" => "A lo largo de la vida, ¿cuál de las siguientes sustancias ha consumido alguna vez? (solo las que consumió sin receta médica)",
                            "5" => "A lo largo de la vida, ¿cuál de las siguientes sustancias ha consumido alguna vez? (solo las que consumió sin receta médica)",
                            "6" => "A lo largo de la vida, ¿cuál de las siguientes sustancias ha consumido alguna vez? (solo las que consumió sin receta médica)",
                            "7" => "A lo largo de la vida, ¿cuál de las siguientes sustancias ha consumido alguna vez? (solo las que consumió sin receta médica)",
                            "8" => "A lo largo de la vida, ¿cuál de las siguientes sustancias ha consumido alguna vez? (solo las que consumió sin receta médica)",
                            "9" => "A lo largo de la vida, ¿cuál de las siguientes sustancias ha consumido alguna vez? (solo las que consumió sin receta médica)",
                            "10" => "A lo largo de la vida, ¿cuál de las siguientes sustancias ha consumido alguna vez? (solo las que consumió sin receta médica)",
                            "11" => "A lo largo de la vida, ¿cuál de las siguientes sustancias ha consumido alguna vez? (solo las que consumió sin receta médica)",

                            "12" => "En los últimos tres meses, ¿con qué frecuencia ha consumido las sustancias que mencionó (primera droga, segunda droga, etc.)?",
                            "14" => "En los primeros tres meses, ¿con qué frecuencia ha consumido las sustancia que mencionó (primera droga, segunda droga, etc.)?",
                            "15" => "En los primeros tres meses, ¿con qué frecuencia ha consumido las sustancia que mencionó (primera droga, segunda droga, etc.)?",
                            "16" => "En los primeros tres meses, ¿con qué frecuencia ha consumido las sustancia que mencionó (primera droga, segunda droga, etc.)?",
                            "17" => "En los primeros tres meses, ¿con qué frecuencia ha consumido las sustancia que mencionó (primera droga, segunda droga, etc.)?",
                            "18" => "En los primeros tres meses, ¿con qué frecuencia ha consumido las sustancia que mencionó (primera droga, segunda droga, etc.)?",
                            "19" => "En los primeros tres meses, ¿con qué frecuencia ha consumido las sustancia que mencionó (primera droga, segunda droga, etc.)?",
                            "20" => "En los primeros tres meses, ¿con qué frecuencia ha consumido las sustancia que mencionó (primera droga, segunda droga, etc.)?",
                            "21" => "En los primeros tres meses, ¿con qué frecuencia ha consumido las sustancia que mencionó (primera droga, segunda droga, etc.)?",
                            "22" => "En los primeros tres meses, ¿con qué frecuencia ha consumido las sustancia que mencionó (primera droga, segunda droga, etc.)?",

                            "23" => "En los últimos tres meses, ¿con qué frecuencia ha sentido un fuerte deseo o ansias de consumir (primera droga, segunda droga, etc.)?",
                            "24" => "En los últimos tres meses, ¿con qué frecuencia ha sentido un fuerte deseo o ansias de consumir (primera droga, segunda droga, etc.)?",
                            "25" => "En los últimos tres meses, ¿con qué frecuencia ha sentido un fuerte deseo o ansias de consumir (primera droga, segunda droga, etc.)?",
                            "26" => "En los últimos tres meses, ¿con qué frecuencia ha sentido un fuerte deseo o ansias de consumir (primera droga, segunda droga, etc.)?",
                            "27" => "En los últimos tres meses, ¿con qué frecuencia ha sentido un fuerte deseo o ansias de consumir (primera droga, segunda droga, etc.)?",
                            "28" => "En los últimos tres meses, ¿con qué frecuencia ha sentido un fuerte deseo o ansias de consumir (primera droga, segunda droga, etc.)?",
                            "29" => "En los últimos tres meses, ¿con qué frecuencia ha sentido un fuerte deseo o ansias de consumir (primera droga, segunda droga, etc.)?",
                            "30" => "En los últimos tres meses, ¿con qué frecuencia ha sentido un fuerte deseo o ansias de consumir (primera droga, segunda droga, etc.)?",
                            "31" => "En los últimos tres meses, ¿con qué frecuencia ha sentido un fuerte deseo o ansias de consumir (primera droga, segunda droga, etc.)?",
                            "32" => "En los últimos tres meses, ¿con qué frecuencia ha sentido un fuerte deseo o ansias de consumir (primera droga, segunda droga, etc.)?",
                            "33" => "En los últimos tres meses, ¿con qué frecuencia ha sentido un fuerte deseo o ansias de consumir (primera droga, segunda droga, etc.)?",


                            "34" => "En los últimos tres meses, ¿con qué frecuencia el consumo de (primera droga, segunda droga, etc.) le ha causado problemas de salud, sociales, legales o económicos?",
                            "35" => "En los últimos tres meses, ¿con qué frecuencia el consumo de (primera droga, segunda droga, etc.) le ha causado problemas de salud, sociales, legales o económicos?",
                            "36" => "En los últimos tres meses, ¿con qué frecuencia el consumo de (primera droga, segunda droga, etc.) le ha causado problemas de salud, sociales, legales o económicos?",
                            "37" => "En los últimos tres meses, ¿con qué frecuencia el consumo de (primera droga, segunda droga, etc.) le ha causado problemas de salud, sociales, legales o económicos?",
                            "38" => "En los últimos tres meses, ¿con qué frecuencia el consumo de (primera droga, segunda droga, etc.) le ha causado problemas de salud, sociales, legales o económicos?",
                            "39" => "En los últimos tres meses, ¿con qué frecuencia el consumo de (primera droga, segunda droga, etc.) le ha causado problemas de salud, sociales, legales o económicos?",
                            "40" => "En los últimos tres meses, ¿con qué frecuencia el consumo de (primera droga, segunda droga, etc.) le ha causado problemas de salud, sociales, legales o económicos?",
                            "41" => "En los últimos tres meses, ¿con qué frecuencia el consumo de (primera droga, segunda droga, etc.) le ha causado problemas de salud, sociales, legales o económicos?",
                            "42" => "En los últimos tres meses, ¿con qué frecuencia el consumo de (primera droga, segunda droga, etc.) le ha causado problemas de salud, sociales, legales o económicos?",
                            "43" => "En los últimos tres meses, ¿con qué frecuencia el consumo de (primera droga, segunda droga, etc.) le ha causado problemas de salud, sociales, legales o económicos?",
                            "44" => "En los últimos tres meses, ¿con qué frecuencia el consumo de (primera droga, segunda droga, etc.) le ha causado problemas de salud, sociales, legales o económicos?",

                            

                            "45" => "En los últimos tres meses, ¿con qué frecuencia dejó de hacer lo que habitualmente se esperaba de usted por el consumo de (primera droga, segunda droga, etc.)?",
                            "46" => "En los últimos tres meses, ¿con qué frecuencia dejó de hacer lo que habitualmente se esperaba de usted por el consumo de (primera droga, segunda droga, etc.)?",
                            "47" => "En los últimos tres meses, ¿con qué frecuencia dejó de hacer lo que habitualmente se esperaba de usted por el consumo de (primera droga, segunda droga, etc.)?",
                            "48" => "En los últimos tres meses, ¿con qué frecuencia dejó de hacer lo que habitualmente se esperaba de usted por el consumo de (primera droga, segunda droga, etc.)?",
                            "49" => "En los últimos tres meses, ¿con qué frecuencia dejó de hacer lo que habitualmente se esperaba de usted por el consumo de (primera droga, segunda droga, etc.)?",
                            "50" => "En los últimos tres meses, ¿con qué frecuencia dejó de hacer lo que habitualmente se esperaba de usted por el consumo de (primera droga, segunda droga, etc.)?",
                            "51" => "En los últimos tres meses, ¿con qué frecuencia dejó de hacer lo que habitualmente se esperaba de usted por el consumo de (primera droga, segunda droga, etc.)?",
                            "52" => "En los últimos tres meses, ¿con qué frecuencia dejó de hacer lo que habitualmente se esperaba de usted por el consumo de (primera droga, segunda droga, etc.)?",
                            "53" => "En los últimos tres meses, ¿con qué frecuencia dejó de hacer lo que habitualmente se esperaba de usted por el consumo de (primera droga, segunda droga, etc.)?",
                            "54" => "En los últimos tres meses, ¿con qué frecuencia dejó de hacer lo que habitualmente se esperaba de usted por el consumo de (primera droga, segunda droga, etc.)?",
                            "55" => "En los últimos tres meses, ¿con qué frecuencia dejó de hacer lo que habitualmente se esperaba de usted por el consumo de (primera droga, segunda droga, etc.)?",



                            "56" => "¿Un amigo, un familiar o alguien más alguna vez ha mostrado preocupación por sus hábitos de consumo de (primera droga, segunda droga, etc.)?",
                            "57" => "¿Un amigo, un familiar o alguien más alguna vez ha mostrado preocupación por sus hábitos de consumo de (primera droga, segunda droga, etc.)?",
                            "58" => "¿Un amigo, un familiar o alguien más alguna vez ha mostrado preocupación por sus hábitos de consumo de (primera droga, segunda droga, etc.)?",
                            "59" => "¿Un amigo, un familiar o alguien más alguna vez ha mostrado preocupación por sus hábitos de consumo de (primera droga, segunda droga, etc.)?",
                            "60" => "¿Un amigo, un familiar o alguien más alguna vez ha mostrado preocupación por sus hábitos de consumo de (primera droga, segunda droga, etc.)?",
                            "61" => "¿Un amigo, un familiar o alguien más alguna vez ha mostrado preocupación por sus hábitos de consumo de (primera droga, segunda droga, etc.)?",
                            "62" => "¿Un amigo, un familiar o alguien más alguna vez ha mostrado preocupación por sus hábitos de consumo de (primera droga, segunda droga, etc.)?",
                            "63" => "¿Un amigo, un familiar o alguien más alguna vez ha mostrado preocupación por sus hábitos de consumo de (primera droga, segunda droga, etc.)?",
                            "64" => "¿Un amigo, un familiar o alguien más alguna vez ha mostrado preocupación por sus hábitos de consumo de (primera droga, segunda droga, etc.)?",
                            "65" => "¿Un amigo, un familiar o alguien más alguna vez ha mostrado preocupación por sus hábitos de consumo de (primera droga, segunda droga, etc.)?",
                            "66" => "¿Un amigo, un familiar o alguien más alguna vez ha mostrado preocupación por sus hábitos de consumo de (primera droga, segunda droga, etc.)?",



                            "67" => "¿Ha intentado alguna vez reducir o eliminar el consumo de (primera droga, segunda droga) y no lo ha logrado?",
                            "68" => "¿Ha intentado alguna vez reducir o eliminar el consumo de (primera droga, segunda droga) y no lo ha logrado?",
                            "69" => "¿Ha intentado alguna vez reducir o eliminar el consumo de (primera droga, segunda droga) y no lo ha logrado?",
                            "70" => "¿Ha intentado alguna vez reducir o eliminar el consumo de (primera droga, segunda droga) y no lo ha logrado?",
                            "71" => "¿Ha intentado alguna vez reducir o eliminar el consumo de (primera droga, segunda droga) y no lo ha logrado?",
                            "72" => "¿Ha intentado alguna vez reducir o eliminar el consumo de (primera droga, segunda droga) y no lo ha logrado?",
                            "73" => "¿Ha intentado alguna vez reducir o eliminar el consumo de (primera droga, segunda droga) y no lo ha logrado?",
                            "74" => "¿Ha intentado alguna vez reducir o eliminar el consumo de (primera droga, segunda droga) y no lo ha logrado?",
                            "75" => "¿Ha intentado alguna vez reducir o eliminar el consumo de (primera droga, segunda droga) y no lo ha logrado?",
                            "76" => "¿Ha intentado alguna vez reducir o eliminar el consumo de (primera droga, segunda droga) y no lo ha logrado?",
                            "77" => "¿Ha intentado alguna vez reducir o eliminar el consumo de (primera droga, segunda droga) y no lo ha logrado?",
                            */

                        $ArregloDatos0Assist = array(
                           

                            "Pregunta_1" => "A lo largo de la vida, ¿cuál de las siguientes sustancias ha consumido alguna vez? (solo las que consumió sin receta médica)",
                            "Pregunta_2" => "En los últimos tres meses, ¿con qué frecuencia ha consumido las sustancias que mencionó (primera droga, segunda droga, etc.)?",
                            "Pregunta_3" => "En los últimos tres meses, ¿con qué frecuencia ha sentido un fuerte deseo o ansias de consumir (primera droga, segunda droga, etc.)?",
                            "Pregunta_4" => "En los últimos tres meses, ¿con qué frecuencia el consumo de (primera droga, segunda droga, etc.) le ha causado problemas de salud, sociales, legales o económicos?",
                            "Pregunta_5" => "En los últimos tres meses, ¿con qué frecuencia dejó de hacer lo que habitualmente se esperaba de usted por el consumo de (primera droga, segunda droga, etc.)?",
                            "Pregunta_6" => "¿Un amigo, un familiar o alguien más alguna vez ha mostrado preocupación por sus hábitos de consumo de (primera droga, segunda droga, etc.)?",
                            "Pregunta_7" => "¿Ha intentado alguna vez reducir o eliminar el consumo de (primera droga, segunda droga) y no lo ha logrado?",
                            "Pregunta_8" =>"¿Alguna vez ha consumido alguna droga por vía inyectada? (solo las que consumió sin receta médica)",


                        );



                        $Print_SaludMental_Valoracion = MostrarDatos_1(json_decode($SaludMental_Valoracion,true));
                        $Print_SaludMental_RQC = MostrarDatos_3SiNo(json_decode($SaludMental_RQC,true));

                        /*
                        echo "<pre>";
                        print_r(json_decode($SaludMental_AUDIT,true));
                        echo "</pre>";
                        */

                        $Print_SaludMental_SRQ = MostrarDatos_3SiNo(json_decode($SaludMental_SRQ,true));
                        $Print_SaludMental_ASISST = MostrarDatos_ASSIST(json_decode($SaludMental_ASISST,true),$ArregloDatos0Assist);
                        $Print_SaludMental_AUDIT = MostrarDatos_AUDIT(json_decode($SaludMental_AUDIT,true));


                        if(!empty($Print_SaludMental_Valoracion) || !empty($Print_SaludMental_RQC) || !empty($Print_SaludMental_SRQ) || !empty($Print_SaludMental_ASISST) || !empty($Print_SaludMental_AUDIT)){
                            
                            echo "<div class='col-md-12'><br><h2 style='text-align-last: center;'>2.8 Valoración de la salud mental</h2><br></div>";

                            if(!empty($Print_SaludMental_Valoracion)){
                                echo "<div class='form-group col-md-12' > <br> ".$Print_SaludMental_Valoracion."</div>";
                            }

                            if(!empty($Print_SaludMental_RQC)){
                                echo "<div class='form-group col-md-12' > <br> <h4> RQC </h4> <br> ".$Print_SaludMental_RQC."</div>";

                                echo "<div class='form-group col-md-12' > <br> Puntaje [Items positivos]: ".$SaludMental_RQCPuntaje."</div>";
                                echo "<div class='form-group col-md-12' >Interpretación: ".$SaludMental_RQCInterpretacion."</div>";

                            }

                            if(!empty($Print_SaludMental_SRQ)){
                                echo "<div class='form-group col-md-12' > <br> <h4> SRQ </h4> <br> ".$Print_SaludMental_SRQ."</div>";
                                /*
                                SaludMental_SRQInterpretacion
                                */
                                echo "<div class='form-group col-md-12' > <br> Interpretacion: ".$SaludMental_SRQInterpretacion."</div>";
                            }

                            if(!empty($Print_SaludMental_ASISST)){
                                echo "<div class='form-group col-md-12' > <br> <h4> ASISST </h4> <br> ".$Print_SaludMental_ASISST."</div>";

                                $SaludMental_ASISSTPuntajeArreglo = json_decode($SaludMental_ASISSTPuntaje,true);
                                $SaludMental_ASISSTInterpretacionArreglo = json_decode($SaludMental_ASISSTInterpretacion,true);

                                // Mapeo de sustancias con sus índices
                                $sustancias = array(
                                    "1"=>"Tabaco",
                                    "2"=>"Alcohol",
                                    "3"=>"Cannabis",
                                    "4"=>"Cocaína",
                                    "5"=>"Anfetaminas",
                                    "6"=>"Inhalantes",
                                    "7"=>"Sedantes",
                                    "8"=>"Alucinógenos",
                                    "9"=>"Opiáceos",
                                    "10"=>"Otras drogas"
                                );

                                echo "<div class='form-group col-md-12' > <br> <b>Interpretacion:</b></div>";

                                foreach ($sustancias as $indice => $sustancia) {
                                    $puntaje = $SaludMental_ASISSTPuntajeArreglo[$indice];
                                    $interpretacion = $SaludMental_ASISSTInterpretacionArreglo[$indice];

                                    if($puntaje !=""){
                                    echo "<div class='form-group col-md-12' > <br> Sustancia: $sustancia <br> Puntaje: $puntaje <br> Interpretacion: $interpretacion <br> </div>";
                                    }
                                }


                            }

                            if(!empty($Print_SaludMental_AUDIT)){
                                echo "<div class='form-group col-md-12' > <br> <h4> AUDIT </h4> <br> ".$Print_SaludMental_AUDIT."</div>";
                                /*
                                echo "<div class='form-group col-md-12' > <br> Valores Preguntas 
                                    <br>
                                    <u>Pregunta #1: 0=> Nunca | 1=> Una o menos veces al mes | 2=> De 2 a 4 veces al mes | 3=> De 2 a 3 veces a la semana | 4=> 4 o más veces a la semana</u> <br>
                                
                                    <u>Pregunta #2: 0=> 1 o 2 | 1=> 3 o 4 | 2=> 5 o 6 | 3=> 7 o 9 4=> 10 o mas</u> <br>

                                    <u>Pregunta #3 a la #8: 0=> Nunca | 1=> Menos de una vez al mes | 2=> Mensualmente | 3=> Semanalmente | 4=> A diario o casi a diario</u> <br>

                                    <u>Pregunta #9 a la #10: 0=> No | 2=> Si, pero no en el curso del ultimo año | 4=> Si, el ultimo año</u> <br>
                                    <br>
                                </div>";
                                */
                            }



                        }

                        //////////////////////////////////////////////////////////////////? 2.8 /////////////////////////////////////////////////////////////



                        //////////////////////////////////////////////////////////////////? 2.9 /////////////////////////////////////////////////////////////

                        $Print_OtrosAspectos_Valoracion = MostrarDatos_1(json_decode($OtrosAspectos_Valoracion,true));
                        if(!empty($Print_OtrosAspectos_Valoracion)){
                            
                            echo "<div class='col-md-12'><br><h2 style='text-align-last: center;'>2.9 Otros aspectos</h2><br></div>";

                            if(!empty($Print_OtrosAspectos_Valoracion)){
                                echo "<div class='form-group col-md-12' > <br> ".$Print_OtrosAspectos_Valoracion."</div>";
                            }

                        }

                        //////////////////////////////////////////////////////////////////? 2.9 /////////////////////////////////////////////////////////////
                    
                    
                    
                        



                        //////////////////////////////////////////////////////////////////? 3.0 /////////////////////////////////////////////////////////////

                        $Print_Educacion_Datos = MostrarDatos_3(json_decode($Educacion_Datos,true));
                        if(!empty($Print_Educacion_Datos)){
                            
                            echo "<div class='col-md-12'><br><h2 style='text-align-last: center;'>3. Educación</h2><br></div>";

                            if(!empty($Print_Educacion_Datos)){
                                echo "<div class='form-group col-md-12' > <br> ".$Print_Educacion_Datos."</div>";
                            }

                        }

                        //////////////////////////////////////////////////////////////////? 3.0 /////////////////////////////////////////////////////////////










                        //////////////////////////////////////////////////////////////////? 4.0 /////////////////////////////////////////////////////////////

                        $Print_PlanCuidados_Datos = MostrarDatos_3(json_decode($PlanCuidados_Datos,true));
                        if(!empty($Print_PlanCuidados_Datos)){
                            
                            echo "<div class='col-md-12'><br><h2 style='text-align-last: center;'>4. Plan de Cuidados</h2><br></div>";

                            if(!empty($Print_PlanCuidados_Datos)){
                                echo "<div class='form-group col-md-12' > <br> ".$Print_PlanCuidados_Datos."</div>";
                            }

                        }

                        if($PlanCuidados_Vacunacion!=null){

                            include 'ModulosRIAS/Impresiones/Include_Vacunacion.php';
                    
                        }
                        //////////////////////////////////////////////////////////////////? 4.0 /////////////////////////////////////////////////////////////





                        //////////////////////////////////////////////////////////////////? 5.0 ////////////////////////////////////////////////////////////

                        if(!empty($DiagnosticosGenerales)){

                            echo "<div class='col-md-12'><br><h2 style='text-align-last: center;'>5. Diagnosticos</h2><br></div>";

                            $Arreglo_DiagnosticosGenerales = json_decode($DiagnosticosGenerales, true);
                            echo "<table class='table table-bordered'>
                            <tr>
                                <th>Diagnostico</th>
                                <th>Tipo Diagnostico</th>
                                <th>Comentario</th>
                            </tr>";
                            
                            // Iterar sobre los elementos del arreglo
                            for ($i = 0; $i < count($Arreglo_DiagnosticosGenerales['CIE10']); $i++) {
                                echo "<tr>";
                                echo "<td>" . $Arreglo_DiagnosticosGenerales['CIE10'][$i] ." -".funcionMaster($Arreglo_DiagnosticosGenerales['CIE10'][$i],'codigo','descripcion','cie10')."</td>";
                                echo "<td>" . $Arreglo_DiagnosticosGenerales['TipoDiagnostico'][$i] . "</td>";
                                echo "<td>" . $Arreglo_DiagnosticosGenerales['Comentario'][$i] . "</td>";
                                echo "</tr>";
                            }

                        echo"</table>";
                        }
                        
                        //////////////////////////////////////////////////////////////////? 5.0 ////////////////////////////////////////////////////////////




                        //////////////////////////////////////////////////////////////////? 6.0 /////////////////////////////////////////////////////////////

                        if(!empty($Remision_General) || !empty($FinalidadConsulta) || (!empty($ExamenesCUPSCIE10) AND $ExamenesCUPSCIE10!="[]" || !empty($VacunacionCovid)) || !empty($InformacionAdicional_1)){
                            echo "<div class='col-md-12'><br><h2 style='text-align-last: center;'>6. Mas Informacion</h2><br></div>";

                            if(!empty($Remision_General)){
                                $NombreRemision = funcionMaster($Remision_General,'id','Nombre','RIAS_Remision');
                                echo "<div class='form-group col-md-12' > Remision: ".$NombreRemision."</div>";
                            }


                            if(!empty($FinalidadConsulta)){
                                $NombreFinalidad = funcionMaster($FinalidadConsulta,'id','Nombre','RIAS_FinalidadConsulta');
                                echo "<div class='form-group col-md-12' > Finalidad de la consulta: ".$NombreFinalidad."</div>";
                            }

                            if(!empty($InformacionAdicional_1)){
                                $InformacionAdicional_1_T = MostrarDatos_3(json_decode($InformacionAdicional_1,true));
                                echo "<div class='form-group col-md-12' > ".$InformacionAdicional_1_T."</div>";
                            }

                            if(!empty($ExamenesCUPSCIE10) AND $ExamenesCUPSCIE10!="[]" ){
                        
                                echo "<div class='col-md-12'><br><h2 style='text-align-last: center;'>Examenes / Ordenes Medicas</h2><br></div>";
    
                                echo "<table class='table table-bordered'>";
                                echo "<tr><td style='text-align:center'> Codigo Cups </td>";
                                echo "<td style='text-align:center'> CIE-10 </td></tr>";

                                $ExamenesCUPSCIE10Arreglo = json_decode($ExamenesCUPSCIE10, true);

                                foreach ($ExamenesCUPSCIE10Arreglo as $item) {
                                    // Imprimir los valores en los divs correspondientes
                                    $Cups = $item["CUP"];
                                    $CIE10 = $item["CIE10"];
                                    $NombreCups = "";
                                    $CodigoCups = "";

                                    $conn4 = $conn3;
                                    mysqli_set_charset($conn4, "utf8");
                                    $QueryCups = mysqli_query($conn4, "SELECT * FROM  Cups where id = $Cups LIMIT 1");
                                    while ($RowCups = mysqli_fetch_array($QueryCups)) {
                                        $NombreCups = $RowCups["Nombre"];
                                        $CodigoCups = $RowCups["Codigo"];
                                    }

                                    if ($Cups != "" || $CIE10 != "") {
                                        echo '<tr><td style="text-align:center">' . $CodigoCups . " - " . $NombreCups . '</td>';
                                        echo '<td style="text-align:center">' . $CIE10 . '</td></tr>';
                                    }
                                }

                                echo "</table>";
                            }


                            if(!empty($VacunacionCovid)){
                                
                                include 'ModulosRIAS/Impresiones/Include_VacunacionCovid.php';
                            
                            }



                    }


                        //////////////////////////////////////////////////////////////////? 6.0 /////////////////////////////////////////////////////////////

                    ?>
                    </div>

                </td>
            </tr>
        </tbody>

        <tfoot>
            <tr>
                <td>
                    <!--place holder for the fixed-position footer-->
                    <div class="page-footer-space"></div>
                </td>
            </tr>
        </tfoot>

    </table>

</body>

</html>

<script type="text/javascript">
    printHTML();

    function printHTML() {
        if (window.print) {
            window.print();
        }
    }
</script>



