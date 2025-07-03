<?php
include 'funciones/conn3.php';
include 'funciones/funciones.php';
include 'funciones/funcionesUtilidades.php';

$idHistoria = $_GET['id'];

$queryList = mysqli_query($conn3, "SELECT * FROM  RIAS_HistoriaInfancia where id = $idHistoria");
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

                        


                    $queryList = mysqli_query($conn3, "SELECT * FROM  RIAS_HistoriaInfancia where id = $idHistoria LIMIT 1");
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
                        $ConsumoHabitos = $rowMotorizado['ConsumoHabitos'];
                        //////////////////////////////////////////////////////////////////? 1.2 //////////////////////////////////////////////////////////////


                        //////////////////////////////////////////////////////////////////? 1.3 //////////////////////////////////////////////////////////////
                        $HabitosSaludables = $rowMotorizado['HabitosSaludables'];
                        //////////////////////////////////////////////////////////////////? 1.3 //////////////////////////////////////////////////////////////


                        //////////////////////////////////////////////////////////////////? 1.4 //////////////////////////////////////////////////////////////
                        $DesarolloAprendizaje = $rowMotorizado['DesarolloAprendizaje'];
                        //////////////////////////////////////////////////////////////////? 1.4 //////////////////////////////////////////////////////////////

                        
                        //////////////////////////////////////////////////////////////////? 1.5 //////////////////////////////////////////////////////////////

                        $PracticasCrianzaCuidado_FormasComunicacion = $rowMotorizado['PracticasCrianzaCuidado_FormasComunicacion'];
                        $PracticasCrianzaCuidado_Actividades = $rowMotorizado['PracticasCrianzaCuidado_Actividades'];
                        //$PracticasCrianzaCuidado_Remision = $rowMotorizado['PracticasCrianzaCuidado_Remision'];
                        //////////////////////////////////////////////////////////////////? 1.5 //////////////////////////////////////////////////////////////



                        //////////////////////////////////////////////////////////////////? 1.6 //////////////////////////////////////////////////////////////
                        $DinamicaFamiliar_CapacidadRecursosFamiliares = $rowMotorizado['DinamicaFamiliar_CapacidadRecursosFamiliares'];
                        
                        $DinamicaFamiliar_APGAR = $rowMotorizado['DinamicaFamiliar_APGAR'];
                        $DinamicaFamiliar_Interpretacion_APGAR = $rowMotorizado['DinamicaFamiliar_Interpretacion_APGAR'];
                        $DinamicaFamiliar_Puntaje_APGAR = $rowMotorizado['DinamicaFamiliar_Puntaje_APGAR'];

                        $DinamicaFamiliar_ProcesoDesarolloIntegral = $rowMotorizado['DinamicaFamiliar_ProcesoDesarolloIntegral'];
                        $DinamicaFamiliar_RiesgoSaludNinoFamilia = $rowMotorizado['DinamicaFamiliar_RiesgoSaludNinoFamilia'];

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

                        $RendimientoEscolar_ComportamientoAprendizaje = $rowMotorizado['RendimientoEscolar_ComportamientoAprendizaje'];
                        $RendimientoEscolar_GOODENOUGHT = $rowMotorizado['RendimientoEscolar_GOODENOUGHT'];
                        $RendimientoEscolar_DatosTestGoodenough = $rowMotorizado['RendimientoEscolar_DatosTestGoodenough'];


                        ///////////////////////////////////////
                        $ValoracionDesarollo_MotricidadGruesa = $rowMotorizado['ValoracionDesarollo_MotricidadGruesa'];
                        $ValoracionDesarollo_MotricidadFinoAdaptativa = $rowMotorizado['ValoracionDesarollo_MotricidadFinoAdaptativa'];
                        $ValoracionDesarollo_AudicionLenguaje = $rowMotorizado['ValoracionDesarollo_AudicionLenguaje'];
                        $ValoracionDesarollo_PersonalSocial = $rowMotorizado['ValoracionDesarollo_PersonalSocial'];


                        $ValoracionDesarollo_Interpretacion = $rowMotorizado['ValoracionDesarollo_Interpretacion'];
                        $ValoracionDesarrollo_EscalaAbreviadaTablaPuntuacionHTML = $rowMotorizado['ValoracionDesarrollo_EscalaAbreviadaTablaPuntuacionHTML'];

                        //////////////////////////////////////////////////////////////////? 2.2 //////////////////////////////////////////////////////////////

                        
                        //////////////////////////////////////////////////////////////////? 2.3 //////////////////////////////////////////////////////////////
                        $ValoracionEstadoNutricional_ParametrosAntropometricos = $rowMotorizado['ValoracionEstadoNutricional_ParametrosAntropometricos'];
                        //$ValoracionEstadoNutricional_Remision = $rowMotorizado['ValoracionEstadoNutricional_Remision'];
                        //////////////////////////////////////////////////////////////////? 2.3 //////////////////////////////////////////////////////////////


                        //////////////////////////////////////////////////////////////////? 2.4 //////////////////////////////////////////////////////////////

                        $SaludSexual_Signos = $rowMotorizado['SaludSexual_Signos'];
                        $SaludSexual_Ninas = $rowMotorizado['SaludSexual_Ninas'];
                        $SaludSexual_Ninos = $rowMotorizado['SaludSexual_Ninos'];
                        $SaludSexual_Intersexuales = $rowMotorizado['SaludSexual_Intersexuales'];
                        $SaludSexual_Otros = $rowMotorizado['SaludSexual_Otros'];
                        $SaludSexual_EscalaTanner = $rowMotorizado['SaludSexual_EscalaTanner'];

                        //////////////////////////////////////////////////////////////////? 2.4 //////////////////////////////////////////////////////////////


                        //////////////////////////////////////////////////////////////////? 2.5 //////////////////////////////////////////////////////////////
                        $SaludVisual_Valoracion = $rowMotorizado['SaludVisual_Valoracion'];
                        //$SaludVisual_Remision = $rowMotorizado['SaludVisual_Remision'];
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
                        //$SaludAuditiva_Remision = $rowMotorizado['SaludAuditiva_Remision'];
                        //////////////////////////////////////////////////////////////////? 2.6 //////////////////////////////////////////////////////////////


                        //////////////////////////////////////////////////////////////////? 2.7 /////////////////////////////////////////////////////////////
                        $SaludBucal_Valoracion = $rowMotorizado['SaludBucal_Valoracion'];
                        //$SaludBucal_Remision = $rowMotorizado['SaludBucal_Remision'];
                        $SaludBucal_ValoracionEstructuras = $rowMotorizado['SaludBucal_ValoracionEstructuras'];
                        //////////////////////////////////////////////////////////////////? 2.7 /////////////////////////////////////////////////////////////

                        //////////////////////////////////////////////////////////////////? 2.8 /////////////////////////////////////////////////////////////
                        $SaludMental_Valoracion = $rowMotorizado['SaludMental_Valoracion'];

                        $SaludMental_RQC = $rowMotorizado['SaludMental_RQC'];
                        $SaludMental_RQCInterpretacion = $rowMotorizado['SaludMental_RQCInterpretacion'];
                        $SaludMental_RQCPuntaje = $rowMotorizado['SaludMental_RQCPuntaje'];

                        //$SaludMental_Remision = $rowMotorizado['SaludMental_Remision'];
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

                        if (!empty($Antedentes_Personales_T) || !empty($Antecedentes_Medicos_T) || !empty($Antecedentes_Familiares_T) || !empty($Antecedentes_MasAntecedentes_T)) {
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

                        $Print_ConsumoHabitos = MostrarDatos_3(json_decode($ConsumoHabitos,true));

                        if (!empty($Print_ConsumoHabitos)) {
                            echo "<div class='col-md-12'><br><h2 style='text-align-last: center;'>1.2 Consumos y hábitos alimentarios </h2><br></div>";
                            echo "<div class='form-group col-md-12'>".$Print_ConsumoHabitos."</div>";
                        }
                        //////////////////////////////////////////////////////////////////? 1.2 //////////////////////////////////////////////////////////////


                        //////////////////////////////////////////////////////////////////? 1.3 //////////////////////////////////////////////////////////////

                        $Print_HabitosSaludables = MostrarDatos_3(json_decode($HabitosSaludables,true));

                        if (!empty($Print_HabitosSaludables)) {
                            echo "<div class='col-md-12'><br><h2 style='text-align-last: center;'>1.3 Prácticas y hábitos saludables</h2><br></div>";
                            echo "<div class='form-group col-md-12'>".$Print_HabitosSaludables."</div>";
                        }
                        //////////////////////////////////////////////////////////////////? 1.3 //////////////////////////////////////////////////////////////


                        //////////////////////////////////////////////////////////////////? 1.4 //////////////////////////////////////////////////////////////

                        $Print_DesarolloAprendizaje = MostrarDatos_3(json_decode($DesarolloAprendizaje,true));

                        if (!empty($Print_DesarolloAprendizaje) ) {
                            
                            echo "<div class='col-md-12'><br><h2 style='text-align-last: center;'>1.4 Desarrollo y aprendizaje </h2><br></div>";
                            if (!empty($Print_DesarolloAprendizaje)) {
                                echo "<div class='form-group col-md-12'>".$Print_DesarolloAprendizaje."</div>";
                            }
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
                                echo "<div class='form-group col-md-12' > <br> Actividades para estimular el juego, qué se relaciona con
                                su familia y con otros adultos y años, establecimiento de
                                límites y disciplina para corregir  <br><br> ".$Print_PracticasCrianzaCuidado_Actividades."</div>";
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

                        $DinamicaFamiliar_ProcesoDesarolloIntegral_T = MostrarDatos_3(json_decode($DinamicaFamiliar_ProcesoDesarolloIntegral,true));
                        $DinamicaFamiliar_RiesgoSaludNinoFamilia_T = MostrarDatos_3(json_decode($DinamicaFamiliar_RiesgoSaludNinoFamilia,true));

                        $DinamicaFamiliar_Familiograma = $Familiograma_Archivo;
                        
                        if(!empty($DinamicaFamiliar_CapacidadRecursosFamiliares_T) || !empty($DinamicaFamiliar_APGAR_T) || !empty($DinamicaFamiliar_ProcesoDesarolloIntegral_T) || !empty($DinamicaFamiliar_RiesgoSaludNinoFamilia_T || !empty($DinamicaFamiliar_Familiograma))){
                            
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

                            if(!empty($DinamicaFamiliar_ProcesoDesarolloIntegral_T)){
                                echo "<div class='form-group col-md-12' ><h4> Proceso de desarrollo integral </h4> ".$DinamicaFamiliar_ProcesoDesarolloIntegral_T."</div>";
                            }

                            if(!empty($DinamicaFamiliar_RiesgoSaludNinoFamilia_T)){
                                echo "<div class='form-group col-md-12' ><h4> Riesgos para salud del niño o de su familia </h4> ".$DinamicaFamiliar_RiesgoSaludNinoFamilia_T."</div>";
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
                        
                        if(!empty($SeguimientoCompromisoEducacion) ){
                            
                            echo "<div class='col-md-12'><br><h2 style='text-align-last: center;'>1.8 Valoración o actualización de las condiciones de vida, del contexto social y las redes de apoyo social y comunitarias de la familia, pertenencia social y cultural que considere pertenencia étnica</h2><br></div>";

                            echo "<div class='form-group col-md-12' > ".MostrarDatos_3(json_decode($SeguimientoCompromisoEducacion,true))."</div>";

                        }

                        //////////////////////////////////////////////////////////////////? 1.8 //////////////////////////////////////////////////////////////

                        


















                        //////////////////////////////////////////////////////////////////? 2.1 //////////////////////////////////////////////////////////////
                        $Json_SignosVitales = $rowMotorizado['Json_SignosVitales'];

                        $Json_SignosVitales_T = MostrarDatos_3(json_decode($Json_SignosVitales,true));

                        if(!empty($Json_SignosVitales_T)){

                            echo "<div class='col-md-12'><br><h2 style='text-align-last: center;'>2.1 Signos Vitales</h2><br></div>";
                            echo "<div class='form-group col-md-12' >".$Json_SignosVitales_T."</div>";

                            //$GeneroTablaPresionArterial = $genero;
                            //include 'ModulosRIAS/Infancia/Include_TensionArterial_Impresion.php';
                        }
                        //////////////////////////////////////////////////////////////////? 2.1 //////////////////////////////////////////////////////////////


                        //////////////////////////////////////////////////////////////////? 2.2 //////////////////////////////////////////////////////////////

                        $Print_RendimientoEscolar_ComportamientoAprendizaje = MostrarDatos_3(json_decode($rowMotorizado['RendimientoEscolar_ComportamientoAprendizaje'],true));
                        $Print_RendimientoEscolar_GOODENOUGHT = MostrarDatos_3PositivoNegativo(json_decode($rowMotorizado['RendimientoEscolar_GOODENOUGHT'],true));
                        $Print_RendimientoEscolar_DatosTestGoodenough = MostrarDatos_3(json_decode($rowMotorizado['RendimientoEscolar_DatosTestGoodenough'],true));




                        
                        /////////////////////////////////////////
                        

                        $ArregloTitulo_1 = array();

                        $ArregloTitulo_1["question1"] = "Realiza reflejo de búsqueda y reflejo de succión";
                        $ArregloTitulo_1["question2"] = "El reflejo de moro está presente y es simétrico";
                        $ArregloTitulo_1["question3"] = "Mueve sus extremidades";
                        $ArregloTitulo_1["question4"] = "Sostiene la cabeza al levantarlo de los brazos";
                        $ArregloTitulo_1["question5"] = "Levanta la cabeza y pecho en prono";
                        $ArregloTitulo_1["question6"] = "Gira la cabeza desde la línea media";
                        $ArregloTitulo_1["question7"] = "Control de cabeza sentado con apoyo";
                        $ArregloTitulo_1["question8"] = "Se voltea";
                        $ArregloTitulo_1["question9"] = "Se mantiene sentado momentáneamente";
                        $ArregloTitulo_1["question10"] = "Se mantiene sentado sin apoyo";
                        $ArregloTitulo_1["question11"] = "Adopta la posición de sentado";
                        $ArregloTitulo_1["question12"] = "Se arrastra en posición prono";
                        $ArregloTitulo_1["question13"] = "Gatea con desplazamiento cruzado (alternando rodillas y manos)";
                        $ArregloTitulo_1["question14"] = "Adopta posición bípeda y se sostiene de pie con apoyo";
                        $ArregloTitulo_1["question15"] = "Se sostiene de pie sin apoyo";
                        $ArregloTitulo_1["question16"] = "Se pone de pie sin ayuda";
                        $ArregloTitulo_1["question17"] = "Da pasos solo(a)";
                        $ArregloTitulo_1["question18"] = "Camina con desplazamiento cruzado sin ayuda (alternando brazos y pies)";
                        $ArregloTitulo_1["question19"] = "Corre";
                        $ArregloTitulo_1["question20"] = "Lanza la pelota";
                        $ArregloTitulo_1["question21"] = "Patea la pelota";
                        $ArregloTitulo_1["question22"] = "Salta con los pies juntos";
                        $ArregloTitulo_1["question23"] = "Se empina en ambos pies";
                        $ArregloTitulo_1["question24"] = "Sube dos escalones sin apoyo";
                        $ArregloTitulo_1["question25"] = "Camina en puntas de pies";
                        $ArregloTitulo_1["question26"] = "Se para en un solo pie";
                        $ArregloTitulo_1["question27"] = "Baja dos escalones con apoyo mínimo, alternando los pies";
                        $ArregloTitulo_1["question28"] = "Camina sobre una línea recta sin apoyo visual";
                        $ArregloTitulo_1["question29"] = "Salta en tres o más ocasiones en un pie";
                        $ArregloTitulo_1["question30"] = "Hace rebotar y agarra la pelota";
                        $ArregloTitulo_1["question31"] = "Hace “caballitos” (alternando los pies)";
                        $ArregloTitulo_1["question32"] = "Salta de lado a lado de una línea con los pies juntos";
                        $ArregloTitulo_1["question33"] = "Salta desplazándose con ambos pies";
                        $ArregloTitulo_1["question34"] = "Mantiene el equilibrio en la punta de los pies con los ojos cerrados";
                        $ArregloTitulo_1["question35"] = "Realiza saltos alternados en secuencia";
                        $ArregloTitulo_1["question36"] = "Realiza alguna actividad de integración motora";

                        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

                        $ArregloTitulo_2 = array();

                        $ArregloTitulo_2["question1"] = "Reflejo de prensión palmar";
                        $ArregloTitulo_2["question2"] = "Reacciona ante luz y sonidos";
                        $ArregloTitulo_2["question3"] = "Sigue movimiento horizontal";
                        $ArregloTitulo_2["question4"] = "Abre y mira sus manos";
                        $ArregloTitulo_2["question5"] = "Sostiene objeto en la mano";
                        $ArregloTitulo_2["question6"] = "Se lleva un objeto a la boca";
                        $ArregloTitulo_2["question7"] = "Agarra objetos voluntariamente";
                        $ArregloTitulo_2["question8"] = "Retiene un objeto cuando se lo intentan quitar";
                        $ArregloTitulo_2["question9"] = "Pasa objeto de una mano a otra";
                        $ArregloTitulo_2["question10"] = "Sostiene un objeto en cada mano";
                        $ArregloTitulo_2["question11"] = "Deja caer los objetos intencionalmente";
                        $ArregloTitulo_2["question12"] = "Agarra con pulgar e índice (pinza)";
                        $ArregloTitulo_2["question13"] = "Agarra tercer objeto sin soltar otros";
                        $ArregloTitulo_2["question14"] = "Saca objetos del contenedor";
                        $ArregloTitulo_2["question15"] = "Busca objetos escondidos";
                        $ArregloTitulo_2["question16"] = "Hace torre de tres cubos";
                        $ArregloTitulo_2["question17"] = "Pasa hojas de un libro";
                        $ArregloTitulo_2["question18"] = "Agarra una cuchara y se la lleva a la boca";
                        $ArregloTitulo_2["question19"] = "Garabatea espontáneamente";
                        $ArregloTitulo_2["question20"] = "Quita la tapa del contenedor o frasco de muestra de orina";
                        $ArregloTitulo_2["question21"] = "Hace torre de cinco cubos";
                        $ArregloTitulo_2["question22"] = "Ensarta cuentas perforadas con pinza";
                        $ArregloTitulo_2["question23"] = "Rasga papel con pinza de ambas manos";
                        $ArregloTitulo_2["question24"] = "Copia línea horizontal y vertical";
                        $ArregloTitulo_2["question25"] = "Hace una bola de papel con sus dedos";
                        $ArregloTitulo_2["question26"] = "Copia círculo";
                        $ArregloTitulo_2["question27"] = "Figura humana rudimentaria";
                        $ArregloTitulo_2["question28"] = "Imita el dibujo de una escalera";
                        $ArregloTitulo_2["question29"] = "Corta papel con las tijeras";
                        $ArregloTitulo_2["question30"] = "Figura humana 2";
                        $ArregloTitulo_2["question31"] = "Dibuja el lugar en el que vive";
                        $ArregloTitulo_2["question32"] = "Modelo de cubos *escalera*";
                        $ArregloTitulo_2["question33"] = "Copia un triángulo";
                        $ArregloTitulo_2["question34"] = "Copia una figura de puntos";
                        $ArregloTitulo_2["question35"] = "Puede hacer una figura plegada";
                        $ArregloTitulo_2["question36"] = "Ensarta cordón cruzado (como amarrarse los zapatos)";


                        /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


                        $ArregloTitulo_3 = array();

                        $ArregloTitulo_3["question1"] = "Se sobresalta con un ruido.";
                        $ArregloTitulo_3["question2"] = "Contempla momentáneamente a una persona.";
                        $ArregloTitulo_3["question3"] = "Llora para expresar necesidades.";
                        $ArregloTitulo_3["question4"] = "Se tranquiliza con la voz humana.";
                        $ArregloTitulo_3["question5"] = "Produce sonidos guturales indiferenciados.";
                        $ArregloTitulo_3["question6"] = "Busca el sonido con la mirada.";
                        $ArregloTitulo_3["question7"] = "Busca diferentes sonidos con la mirada.";
                        $ArregloTitulo_3["question8"] = "Pone atención a la conversación.";
                        $ArregloTitulo_3["question9"] = "Produce cuatro o más sonidos diferentes.";
                        $ArregloTitulo_3["question10"] = "Pronuncia tres o más sílabas.";
                        $ArregloTitulo_3["question11"] = "Reacciona cuando se le llama por su nombre.";
                        $ArregloTitulo_3["question12"] = "Reacciona a tres palabras familiares.";
                        $ArregloTitulo_3["question13"] = "Reacciona a la palabra no.";
                        $ArregloTitulo_3["question14"] = "Llama al cuidador.";
                        $ArregloTitulo_3["question15"] = "Responde a una instrucción sencilla.";
                        $ArregloTitulo_3["question16"] = "Aproximación a una palabra con intención comunicativa.";
                        $ArregloTitulo_3["question17"] = "Reconoce al menos 6 objetos o imágenes.";
                        $ArregloTitulo_3["question18"] = "Sigue instrucciones de dos pasos.";
                        $ArregloTitulo_3["question19"] = "Nombre cinco objetos de una imagen.";
                        $ArregloTitulo_3["question20"] = "Utiliza más de 20 palabras.";
                        $ArregloTitulo_3["question21"] = "Usa frases de dos palabras.";
                        $ArregloTitulo_3["question22"] = "Dice su nombre completo.";
                        $ArregloTitulo_3["question23"] = "Dice frases de 3 palabras.";
                        $ArregloTitulo_3["question24"] = "Reconoce cualidades de los objetos.";
                        $ArregloTitulo_3["question25"] = "Define por su uso cinco objetos.";
                        $ArregloTitulo_3["question26"] = "Hace comparativos.";
                        $ArregloTitulo_3["question27"] = "Describe el dibujo.";
                        $ArregloTitulo_3["question28"] = "Reconoce 5 colores.";
                        $ArregloTitulo_3["question29"] = "Responde tres preguntas sobre un relato.";
                        $ArregloTitulo_3["question30"] = "Elabora un relato a partir de una imagen.";
                        $ArregloTitulo_3["question31"] = "Expresa opiniones.";
                        $ArregloTitulo_3["question32"] = "Repite palabras con pronunciación correcta.";
                        $ArregloTitulo_3["question33"] = "Absurdos visuales.";
                        $ArregloTitulo_3["question34"] = "Identifica palabras que inician con sonidos parecidos.";
                        $ArregloTitulo_3["question35"] = "Conoce: ayer, hoy y mañana.";
                        $ArregloTitulo_3["question36"] = "Ordena una historia y la relata.";

                        /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

                        $ArregloTitulo_4 = array();

                        $ArregloTitulo_4["question1"] = "Se tranquiliza cuando se toma entre los brazos";
                        $ArregloTitulo_4["question2"] = "Responde a las caricias";
                        $ArregloTitulo_4["question3"] = "El bebé ya está registrado(a)";
                        $ArregloTitulo_4["question4"] = "Reconoce la voz del cuidador principal";
                        $ArregloTitulo_4["question5"] = "Sonrisa social";
                        $ArregloTitulo_4["question6"] = "Responde a una conversación";
                        $ArregloTitulo_4["question7"] = "Coge las manos del examinador";
                        $ArregloTitulo_4["question8"] = "Ríe a carcajadas";
                        $ArregloTitulo_4["question9"] = "Busca la continuación del juego";
                        $ArregloTitulo_4["question10"] = "Reacciona con desconfianza ante el extraño";
                        $ArregloTitulo_4["question11"] = "Busca apoyo del cuidador";
                        $ArregloTitulo_4["question12"] = "Reacciona a su imagen en el espejo";
                        $ArregloTitulo_4["question13"] = "Participa en juegos";
                        $ArregloTitulo_4["question14"] = "Muestra interés o intención en alimentarse solo";
                        $ArregloTitulo_4["question15"] = "Explora el entorno";
                        $ArregloTitulo_4["question16"] = "Seguimiento de rutinas";
                        $ArregloTitulo_4["question17"] = "Ayuda a desvestirse";
                        $ArregloTitulo_4["question18"] = "Señala 5 partes de su cuerpo";
                        $ArregloTitulo_4["question19"] = "Acepta y tolera el contacto de su piel con diferentes texturas";
                        $ArregloTitulo_4["question20"] = "Expresa su satisfacción cuando logra o consigue algo";
                        $ArregloTitulo_4["question21"] = "Identifica emociones básicas en una imagen";
                        $ArregloTitulo_4["question22"] = "Identifica qué es de él y qué es de otros";
                        $ArregloTitulo_4["question23"] = "Dice nombres de las personas con quien vive o comparte";
                        $ArregloTitulo_4["question24"] = "Expresa verbalmente emociones básicas (tristeza, alegría, miedo, rabia)";
                        $ArregloTitulo_4["question25"] = "Rechaza la ayuda del cuidador cuando desea, intenta o hace algo por sí mismo";
                        $ArregloTitulo_4["question26"] = "Comparte juego con otros(as) niños(as)";
                        $ArregloTitulo_4["question27"] = "Reconoce las emociones básicas de los otros(as)";
                        $ArregloTitulo_4["question28"] = "Puede vestirse y desvestirse solo(a)";
                        $ArregloTitulo_4["question29"] = "Propone juegos";
                        $ArregloTitulo_4["question30"] = "Sabe cuántos años tiene";
                        $ArregloTitulo_4["question31"] = "Participa en juegos respetando reglas y turnos";
                        $ArregloTitulo_4["question32"] = "Comenta vida familiar";
                        $ArregloTitulo_4["question33"] = "Colabora por iniciativa propia con actividades cotidianas";
                        $ArregloTitulo_4["question34"] = "Manifiesta emoción ante acontecimientos importantes de su grupo social";
                        $ArregloTitulo_4["question35"] = "Reconocimiento de normas o prohibiciones";
                        $ArregloTitulo_4["question36"] = "Reconoce emociones complejas (culpa, pena, frustración, etc)";

                        /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

                        function VisualizarTablasDatos($ArregloValue, $ArregloTitulos,$Tipo)
                        {
                            $respuesta = "";
                            if($ArregloValue!=null){

                                foreach ($ArregloTitulos as $clave => $titulo) {
                                    $valor = $ArregloValue[$clave];
                                    //$valorTexto = ($valor == 1) ? 'Sí' : 'No';
                                    if($Tipo=="1"){
                                        $valorTexto = ($valor == 1) ? 'Sí' : 'No';
                                    }else{
                                        $valorTexto = $valor;
                                    }
                                    
                                    $respuesta .= "<div class='form-group col-md-12'> $titulo : $valorTexto </div>";
                                }

                            }
                            return $respuesta;
                        }

                        
                        $Print_ValoracionDesarollo_MotricidadGruesa = VisualizarTablasDatos(json_decode($ValoracionDesarollo_MotricidadGruesa, true), $ArregloTitulo_1,0);
                        $Print_ValoracionDesarollo_MotricidadFinoAdaptativa = VisualizarTablasDatos(json_decode($ValoracionDesarollo_MotricidadFinoAdaptativa, true), $ArregloTitulo_2,0);
                        $Print_ValoracionDesarollo_AudicionLenguaje = VisualizarTablasDatos(json_decode($ValoracionDesarollo_AudicionLenguaje, true), $ArregloTitulo_3,0);
                        $Print_ValoracionDesarollo_PersonalSocial = VisualizarTablasDatos(json_decode($ValoracionDesarollo_PersonalSocial, true), $ArregloTitulo_4,0);
                        
                        function imprimirInformacion($numero, $datos,$TituloTabla) {
                            if (isset($datos[$numero])) {
                                $info = $datos[$numero];
                                echo "<div class='form-group col-md-12'>
                                <br>
                                <table border='1' class='table'>";
                                foreach ($info as $key => $value) {
                                    switch ($key) {
                                        case 'totalAcumInicio':
                                            echo "<tr><td>Total Acumulado al inicio</td><td>$value</td></tr>";
                                            break;
                                        case 'numeroItems':
                                            echo "<tr><td>Número de ítems correctos</td><td>$value</td></tr>";
                                            break;
                                        case 'totalPorcenDirecto':
                                            echo "<tr><td>Total (Puntaje Directo)</td><td>$value</td></tr>";
                                            break;
                                        default:
                                            // No hacemos nada aquí, dejamos que el foreach termine
                                            break;
                                    }
                                }
                                // Tabla de conversiones, solo al final del foreach
                                echo "<tr><td colspan='2' style='text-align-last: center;font-weight: bold'>{$TituloTabla}</td></tr>";
                                echo "<tr><td style='text-align-last: center;'>Puntuacion Directa</td><td style='text-align-last: center;'>{$info['TextoRangoEdad']}</td></tr>";
                                echo "<tr><td style='text-align-last: center;'>{$info['totalPorcenDirecto']}</td><td style='text-align-last: center;'>{$info['RangoEdad']}</td></tr>";
                                echo "</table></div>";
                            } else {
                                echo "El elemento $numero no existe en el arreglo.";
                            }
                        }

                        ////////////////////////////////////////

                        if(!empty($Print_RendimientoEscolar_ComportamientoAprendizaje) ||!empty($Print_RendimientoEscolar_GOODENOUGHT) || !empty($Print_RendimientoEscolar_DatosTestGoodenough) 
                        ||  !empty($Print_ValoracionDesarollo_MotricidadGruesa) || !empty($Print_ValoracionDesarollo_MotricidadFinoAdaptativa) || !empty($Print_ValoracionDesarollo_AudicionLenguaje) || !empty($Print_ValoracionDesarollo_PersonalSocial)  ){
                            
                            echo "<div class='col-md-12'><br><h2 style='text-align-last: center;'>2.2 Valoración del desarrollo y rendimiento escolar</h2><br></div>";

                            if(!empty($Print_RendimientoEscolar_ComportamientoAprendizaje)){
                                echo "<div class='form-group col-md-12' > ".$Print_RendimientoEscolar_ComportamientoAprendizaje."</div>";
                            }

                            if(!empty($Print_ValoracionDesarollo_MotricidadGruesa) || !empty($Print_ValoracionDesarollo_MotricidadFinoAdaptativa) || !empty($Print_ValoracionDesarollo_AudicionLenguaje) || !empty($Print_ValoracionDesarollo_PersonalSocial)){
                                
                            

                                if(!empty($Print_ValoracionDesarollo_MotricidadGruesa)){
                                    echo "<div class='form-group col-md-12' ><br> <h4> Motricidad Gruesa:</h4> <br> ".$Print_ValoracionDesarollo_MotricidadGruesa."</div>";

                                    imprimirInformacion(1, json_decode($ValoracionDesarollo_Interpretacion,true),'Tabla de conversiones de PD a PT motricidad gruesa');
                                }

                                if(!empty($Print_ValoracionDesarollo_MotricidadFinoAdaptativa)){
                                    echo "<div class='form-group col-md-12' ><br> <h4> Motricidad Fino Adaptativa:</h4> <br>".$Print_ValoracionDesarollo_MotricidadFinoAdaptativa."</div>";

                                    imprimirInformacion(2, json_decode($ValoracionDesarollo_Interpretacion,true),'Tabla de conversiones de PD a PT motricidad fino adaptativa');
                                }

                                if(!empty($Print_ValoracionDesarollo_AudicionLenguaje)){
                                    echo "<div class='form-group col-md-12' ><br> <h4> Audición y Lenguaje:</h4> <br>".$Print_ValoracionDesarollo_AudicionLenguaje."</div>";

                                    imprimirInformacion(3, json_decode($ValoracionDesarollo_Interpretacion,true),'Tabla de conversiones de PD a PT audición y lenguaje');
                                }

                                if(!empty($Print_ValoracionDesarollo_PersonalSocial)){
                                    echo "<div class='form-group col-md-12' ><br> <h4> Personal Social:</h4> <br>".$Print_ValoracionDesarollo_PersonalSocial."</div>";

                                    imprimirInformacion(4, json_decode($ValoracionDesarollo_Interpretacion,true),'Tabla de conversiones de PD a PT personal social');
                                }


                                if(!empty($Print_ValoracionDesarollo_MotricidadGruesa) || !empty($Print_ValoracionDesarollo_MotricidadFinoAdaptativa) || !empty($Print_ValoracionDesarollo_AudicionLenguaje) || !empty($Print_ValoracionDesarollo_PersonalSocial)){
                                    echo "<div class='form-group col-md-12' ><br> <h4> Puntuacion:</h4> <br> ".str_replace('&quot;', '"',$ValoracionDesarrollo_EscalaAbreviadaTablaPuntuacionHTML)."</div>";  
                                }

                            }


                            if(!empty($Print_RendimientoEscolar_GOODENOUGHT)){
                                echo "<div class='form-group col-md-12' ><br> <h4> Test Goodenough Harris </h4> <br> ".$Print_RendimientoEscolar_GOODENOUGHT."</div>";
                                /*
                                echo "<div class='form-group col-md-12' style='text-align-last: center;' ><br> <h5>  Conversión de Puntaje en Edad Mental según Goodenough  </h5> <br> <table class='table table-bordered'>
                                <thead>
                                <tr>
                                    <td class='tg-0lax' colspan='2'>Años</td>
                                    <td class='tg-fgwq'>3</td>
                                    <td class='tg-bn54'>4</td>
                                    <td class='tg-0pky'>5</td>
                                    <td class='tg-0pky'>6</td>
                                    <td class='tg-0pky'>7</td>
                                    <td class='tg-0pky'>8</td>
                                    <td class='tg-0pky'>9</td>
                                    <td class='tg-0pky'>10</td>
                                    <td class='tg-0pky'>11</td>
                                    <td class='tg-0pky'>12</td>
                                    <td class='tg-0pky'>13</td>
                                    <td class='tg-0pky'></td>
                                </tr>
                                <tr>
                                    <td class='tg-0lax' rowspan='4' style='vertical-align: middle; text-align: center;'>Meses</td>
                                    <td class='tg-0pky'>0</td>
                                    <td class='tg-0pky'>-</td>
                                    <td class='tg-0pky'>4</td>
                                    <td class='tg-0pky'>8</td>
                                    <td class='tg-0pky'>12</td>
                                    <td class='tg-0pky'>16</td>
                                    <td class='tg-0pky'>20</td>
                                    <td class='tg-0pky'>24</td>
                                    <td class='tg-0pky'>28</td>
                                    <td class='tg-0pky'>32</td>
                                    <td class='tg-0pky'>36</td>
                                    <td class='tg-0pky'>40</td>
                                    <td class='tg-0pky' rowspan='4' style='vertical-align: middle; text-align: center;'>Puntaje</td>
                                </tr>
                                <tr>
                                    <td class='tg-0pky'>3</td>
                                    <td class='tg-0pky'>-</td>
                                    <td class='tg-0pky'>5</td>
                                    <td class='tg-0pky'>9</td>
                                    <td class='tg-0pky'>13</td>
                                    <td class='tg-0pky'>17</td>
                                    <td class='tg-0pky'>21</td>
                                    <td class='tg-0pky'>25</td>
                                    <td class='tg-0pky'>29</td>
                                    <td class='tg-0pky'>33</td>
                                    <td class='tg-0pky'>37</td>
                                    <td class='tg-0pky'>41</td>
                                </tr>
                                <tr>
                                    <td class='tg-0pky'>6</td>
                                    <td class='tg-0pky'>2</td>
                                    <td class='tg-0pky'>6</td>
                                    <td class='tg-0pky'>10</td>
                                    <td class='tg-0pky'>14</td>
                                    <td class='tg-0pky'>18</td>
                                    <td class='tg-0pky'>22</td>
                                    <td class='tg-0pky'>26</td>
                                    <td class='tg-0pky'>30</td>
                                    <td class='tg-0pky'>34</td>
                                    <td class='tg-0pky'>38</td>
                                    <td class='tg-0pky'>42</td>
                                </tr>
                                <tr>
                                    <td class='tg-0pky'>9</td>
                                    <td class='tg-0pky'>3</td>
                                    <td class='tg-0pky'>7</td>
                                    <td class='tg-0pky'>11</td>
                                    <td class='tg-0pky'>15</td>
                                    <td class='tg-0pky'>19</td>
                                    <td class='tg-0pky'>23</td>
                                    <td class='tg-0pky'>27</td>
                                    <td class='tg-0pky'>31</td>
                                    <td class='tg-0pky'>35</td>
                                    <td class='tg-0pky'>39</td>
                                    <td class='tg-0pky'>-</td>
                                </tr>
                                </thead>
                                </table></div>";
                                */
                            }

                            if(!empty($Print_RendimientoEscolar_DatosTestGoodenough)){
                                echo "<div class='form-group col-md-12' >".$Print_RendimientoEscolar_DatosTestGoodenough."</div>";

                                /*
                                echo "<div class='form-group col-md-12' style='text-align-last: center;' ><br> <h5> Valoracion Coeficiente Intelectual </h5> <br> <table class='table table-bordered'>
                                <thead>
                                <tr>
                                    <th class='tg-0pky'>C.I</th>
                                    <th class='tg-0pky'>Diagnósticos</th>
                                    <th class='tg-0pky'>C.I</th>
                                    <th class='tg-0pky'>Diagnósticos</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class='tg-0pky'>150</td>
                                    <td class='tg-0pky'>Genialidad</td>
                                    <td class='tg-0pky'>70 – 79</td>
                                    <td class='tg-0pky'>Debilidad mental, leve torpeza</td>
                                </tr>
                                <tr>
                                    <td class='tg-0pky'>140 – 149</td>
                                    <td class='tg-0pky'>Casi genialidad</td>
                                    <td class='tg-0pky'>50 – 69</td>
                                    <td class='tg-0pky'>Debilidad mental, bien definida</td>
                                </tr>
                                <tr>
                                    <td class='tg-0pky'>120 – 139</td>
                                    <td class='tg-0pky'>Inteligencia muy superior</td>
                                    <td class='tg-0pky'>20 – 49</td>
                                    <td class='tg-0pky'>Imbecilidad</td>
                                </tr>
                                <tr>
                                    <td class='tg-0pky'>110 – 119</td>
                                    <td class='tg-0pky'>Inteligencia superior</td>
                                    <td class='tg-0pky'>0 – 19</td>
                                    <td class='tg-0pky'>Idiotez</td>
                                </tr>
                                <tr>
                                    <td class='tg-0pky'>90 – 109</td>
                                    <td class='tg-0pky'>Inteligencia normal o mediana</td>
                                    <td class='tg-0pky'></td>
                                    <td class='tg-0pky'></td>
                                </tr>
                                <tr>
                                    <td class='tg-0pky'>80 – 89</td>
                                    <td class='tg-0pky'>Inteligencia lenta</td>
                                    <td class='tg-0pky'></td>
                                    <td class='tg-0pky'></td>
                                </tr>
                                </tbody>
                                </table></div>";

                             */   
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

                        $Print_SaludSexual_Signos = MostrarDatos_1(json_decode($SaludSexual_Signos,true));
                        $Print_SaludSexual_Ninas= MostrarDatos_1(json_decode($SaludSexual_Ninas,true));
                        $Print_SaludSexual_Ninos= MostrarDatos_1(json_decode($SaludSexual_Ninos,true));
                        $Print_SaludSexual_Intersexuales= MostrarDatos_3(json_decode($SaludSexual_Intersexuales,true));
                        $Print_SaludSexual_Otros = MostrarDatos_3(json_decode($SaludSexual_Otros,true));
                        $Print_SaludSexual_EscalaTanner = MostrarDatos_3(json_decode($SaludSexual_EscalaTanner,true));

                        
                        


                        if(!empty($Print_SaludSexual_Signos) || !empty($Print_SaludSexual_Ninas) || !empty($Print_SaludSexual_Ninos) || !empty($Print_SaludSexual_Intersexuales) || !empty($Print_SaludSexual_Otros) || !empty($Print_SaludSexual_EscalaTanner) ){
                            
                            echo "<div class='col-md-12'><br><h2 style='text-align-last: center;'>2.4 Valoración de la salud sexual</h2><br></div>";

                            if(!empty($Print_SaludSexual_Signos)){
                                echo "<div class='form-group col-md-12' > ".$Print_SaludSexual_Signos."</div>";
                            }

                            if(!empty($Print_SaludSexual_EscalaTanner)){
                                //echo "<div class='form-group col-md-12' > <h4> Tanner: </h4> ".$SaludSexual_EscalaTanner."</div>";

                                

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


                                $Arreglo["G1"]["Estadio G1"] = "HombreG_1.png";
                                $Arreglo["G2"]["Estadio G2"] = "HombreG_2.png";
                                $Arreglo["G3"]["Estadio G3"] = "HombreG_3.png";
                                $Arreglo["G4"]["Estadio G4"] = "HombreG_4.png";
                                $Arreglo["G5"]["Estadio G5"] = "HombreG_5.png";
                                
                                $Arreglo["P1"]["Estadio P1"] = "HombreP_1.png";
                                $Arreglo["P2"]["Estadio P2"] = "HombreP_2.png";
                                $Arreglo["P3"]["Estadio P3"] = "HombreP_3.png";
                                $Arreglo["P4"]["Estadio P4"] = "HombreP_4.png";
                                $Arreglo["P5"]["Estadio P5"] = "HombreP_5.png";

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

                            if(!empty($Print_SaludSexual_Ninas)){
                                echo "<div class='form-group col-md-12' > <h4> En niñas: </h4> ".$Print_SaludSexual_Ninas."</div>";
                            }

                            if(!empty($Print_SaludSexual_Ninos)){
                                echo "<div class='form-group col-md-12' > <h4> En niños: </h4> ".$Print_SaludSexual_Ninos."</div>";
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
                        
                        if(!empty($Print_SaludVisual_Valoracion)){
                            
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


                        if(!empty($Print_SaludBucal_Valoracion) || !empty($Print_SaludBucal_ValoracionEstructuras)){
                            
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

                        $Print_SaludMental_Valoracion = MostrarDatos_1(json_decode($SaludMental_Valoracion,true));
                        $Print_SaludMental_RQC = MostrarDatos_3SiNo(json_decode($SaludMental_RQC,true));
                        
                        if(!empty($Print_SaludMental_Valoracion) || !empty($Print_SaludMental_RQC)  ){
                            
                            echo "<div class='col-md-12'><br><h2 style='text-align-last: center;'>2.8 Valoración de la salud mental</h2><br></div>";

                            if(!empty($Print_SaludMental_Valoracion)){
                                echo "<div class='form-group col-md-12' > <br> ".$Print_SaludMental_Valoracion."</div>";
                            }

                            if(!empty($Print_SaludMental_RQC)){
                                echo "<div class='form-group col-md-12' > <br> <h4> RQC </h4> <br> ".$Print_SaludMental_RQC."</div>";

                                echo "<div class='form-group col-md-12' > <br> Puntaje [Items positivos]: ".$SaludMental_RQCPuntaje."</div>";
                                echo "<div class='form-group col-md-12' >Interpretación: ".$SaludMental_RQCInterpretacion."</div>";
                                
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

                        if(!empty($Remision_General) || !empty($FinalidadConsulta) || (!empty($ExamenesCUPSCIE10) AND $ExamenesCUPSCIE10!="[]") || !empty($VacunacionCovid) || !empty($InformacionAdicional_1)){
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

