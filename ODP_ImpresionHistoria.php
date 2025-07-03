<?php
include 'funciones/conn3.php';
include 'funciones/funciones.php';
include 'funciones/funcionesUtilidades.php';

$idHistoria = $_GET['id'];

$queryList = mysqli_query($conn3, "SELECT * FROM  Historia_Odontopediatria where id = $idHistoria");
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

        .EspaciadoP{
            padding-top: 5px;
            font-weight: bold;
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
                <td style="padding:20px;">

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
                        
                        function LeerArreglo($arreglo) {
                            $Texto="";
                            foreach ($arreglo as $clave => $valor) {
                                //echo "<b>$clave</b>:<br>";
                                if (is_array($valor)) {
                                    foreach ($valor as $subclave => $subvalor) {
                                        $Texto .= "<p class='EspaciadoP'>";
                                        $Texto .= "<k style='font-weight: normal;'>$subclave:</k> ";
                                        if (is_array($subvalor)) {
                                            foreach ($subvalor as $indice => $item) {
                                                $Texto .= "$item";
                                                if ($indice < count($subvalor) - 1) {
                                                    $Texto .= ", ";
                                                }
                                            }
                                        } else {
                                            $Texto .= "$subvalor";
                                        }
                                        $Texto .= "</p>";
                                    }
                                } else {
                                    $Texto .= "Dato Error";
                                }
                                //echo "<br>";
                            }

                            return $Texto;
                        }

 
                    $queryList = mysqli_query($conn3, "SELECT * FROM  Historia_Odontopediatria where id = $idHistoria LIMIT 1");
                    $nrowl = mysqli_num_rows($queryList);
                    $rowMotorizado = mysqli_fetch_array($queryList);

                    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

                        /////////////////////////////////////////////////////////////////// InformacionGeneral /////////////////////////////////////////////////
                        $InformacionGeneral_General = $rowMotorizado['InformacionGeneral_General'];

                        $InformacionGeneral_General_Final = LeerArreglo(json_decode($InformacionGeneral_General,true));

                        
                        if (!empty($InformacionGeneral_General_Final)) {
                            echo "<div class='col-md-12'><br><h2 style='text-align-last: center;'> 1. Información General</h2><br></div>";
                            echo "<div class='form-group col-md-12'>".$InformacionGeneral_General_Final."</div>";
                        }
                        
                        //////////////////////////////////////////////////////////////////? InformacionGeneral /////////////////////////////////////////////////             



                        /////////////////////////////////////////////////////////////////// Interrogatorio por aparatos y sistemas /////////////////////////////////////////////////

                        //ponerme estos campos $ArregloCamposAdicionales=["Interrogatorio_Gestacion","Interrogatorio_Parto","Interrogatorio_EtapaNeonatal","Interrogatorio_InfanciaAdolescencia"]; con la eestructura de arriba



                        //Tabla Formulario
                        $TablaInterrogatorio_Final = $rowMotorizado['TablaInterrogatorio'];


                        $Interrogatorio_Gestacion = $rowMotorizado['Interrogatorio_Gestacion'];
                        $Interrogatorio_Parto = $rowMotorizado['Interrogatorio_Parto'];
                        $Interrogatorio_EtapaNeonatal = $rowMotorizado['Interrogatorio_EtapaNeonatal'];
                        $Interrogatorio_InfanciaAdolescencia = $rowMotorizado['Interrogatorio_InfanciaAdolescencia'];


                        $Interrogatorio_Gestacion_Final = LeerArreglo(json_decode($Interrogatorio_Gestacion,true));
                        $Interrogatorio_Parto_Final = LeerArreglo(json_decode($Interrogatorio_Parto,true));
                        $Interrogatorio_EtapaNeonatal_Final = LeerArreglo(json_decode($Interrogatorio_EtapaNeonatal,true));
                        $Interrogatorio_InfanciaAdolescencia_Final = LeerArreglo(json_decode($Interrogatorio_InfanciaAdolescencia,true));


                        if (!empty($Interrogatorio_Gestacion_Final) || !empty($Interrogatorio_Parto_Final) || !empty($Interrogatorio_EtapaNeonatal_Final) || !empty($Interrogatorio_InfanciaAdolescencia_Final) || !empty($TablaInterrogatorio_Final)) {
                            echo "<div class='col-md-12'><br><h2 style='text-align-last: center;'> 2. Interrogatorio por Aparatos y Sistemas</h2><br></div>";

                            if(!empty($Interrogatorio_Gestacion_Final)){
                                echo "<div class='col-md-12'><br><h3 style='text-align-last: center;'>Gestación</h3><br></div>";
                                echo "<div class='form-group col-md-12'> ".$Interrogatorio_Gestacion_Final."</div>";
                            }

                            if(!empty($Interrogatorio_Parto_Final)){
                                echo "<div class='col-md-12'><br><h3 style='text-align-last: center;'>Parto</h3><br></div>";
                                echo "<div class='form-group col-md-12'> ".$Interrogatorio_Parto_Final."</div>";
                            }

                            if(!empty($Interrogatorio_EtapaNeonatal_Final)){
                                echo "<div class='col-md-12'><br><h3 style='text-align-last: center;'>Etapa Neonatal</h3><br></div>";
                                echo "<div class='form-group col-md-12'> ".$Interrogatorio_EtapaNeonatal_Final."</div>";
                            }

                            if(($TablaInterrogatorio_Final)!="[]" && ($TablaInterrogatorio_Final)!=""){
                                echo "<div class='col-md-12'><br><h3 style='text-align-last: center;'>Infancia y Adolescencia</h3><br></div>";
                                
                                $JsonInterrogatorio_Final = json_decode($TablaInterrogatorio_Final,true);
                               
                                $CamposTabla = array(
                                    "Reflujo",
                                    "Padecimientos renales",
                                    "Cianosis al esfuerzo",
                                    "Fiebre reumática",
                                    "Hemorragias espontáneas",
                                    "Diabetes",
                                    "Trastornos del lenguaje",
                                    "Epilepsia",
                                    "Parotiditis",
                                    "Difteria",
                                    "Hepatitis",
                                    "VIH",
                                    "Fiebres eruptivas",
                                    "Exantema súbito",
                                    "Escarlatina",
                                    "Varicela",
                                    "Sarampión",
                                    "Rubéola",
                                    "Mononucleosis infecciosa"
                                );
        
                                echo"<table class='table table-bordered' id='Tabla1Odontopediatria'>
                                <thead>
                                    <tr>
                                        <th>Presenta o ha presentado:</th>
                                        <th>Si</th>
                                        <th>No</th>
                                        <th>Edad</th>
                                    </tr>
                                </thead>
                                <tbody>";
        
        
                                foreach ($CamposTabla as $campo):
                                    echo"<tr>
                                        <td>$campo</td>
                                        <td><input type='radio' name='TablaInterrogatorio[$campo][Tipo]' value='Si' ".($JsonInterrogatorio_Final[$campo]['Tipo'] == 'Si' ? 'checked' : '')."></td>
                                        <td><input type='radio' name='TablaInterrogatorio[$campo][Tipo]' value='No' ".($JsonInterrogatorio_Final[$campo]['Tipo'] == 'No' ? 'checked' : '')."></td>
                                        <td><input type='text' name='TablaInterrogatorio[$campo][Edad]' disabled class='form-control'value='".($JsonInterrogatorio_Final[$campo]['Edad'])."' ></td>
                                    </tr>";
                                    //poner campo otros
                                endforeach;
                                echo "<tr>
                                        <td>Otros</td>
                                        <td colspan='3'><input type='text' name='TablaInterrogatorio[Otros]' disabled class='form-control' value='".($JsonInterrogatorio_Final["Otros"]["Otros"])."'></td>
                                    </tr>";
                                echo "</tbody>
                                </table>";

                                echo "<script>
                                var container = document.getElementById('Tabla1Odontopediatria');
                                var checkboxes = container.getElementsByTagName('input');
        
                                for (var i = 0; i < checkboxes.length; i++) {
                                    checkboxes[i].addEventListener('click', function(event) {
                                        event.preventDefault();
                                        event.stopPropagation();
                                        return false;
                                    });
                                }
                                </script>";
                                
                            }

                            if(!empty($Interrogatorio_InfanciaAdolescencia_Final)){
                                echo "<div class='col-md-12'><br><h3 style='text-align-last: center;'>Infancia y Adolescencia</h3><br></div>";
                                echo "<div class='form-group col-md-12'> ".$Interrogatorio_InfanciaAdolescencia_Final."</div>";
                            }

                        }
                        
                        
                        //////////////////////////////////////////////////////////////////? Interrogatorio por aparatos y sistemas ///////////////////////////////////////////////// 







                        /////////////////////////////////////////////////////////////////// Heredofamiliares /////////////////////////////////////////////////

                        //ponerme estos campos $ArregloCamposAdicionales=["Heredofamiliares_General"]; con la eestructura de arriba

                        $Heredofamiliares_General = $rowMotorizado['Heredofamiliares_General'];

                        $Heredofamiliares_General_Final = LeerArreglo(json_decode($Heredofamiliares_General,true));


                        if (!empty($Heredofamiliares_General_Final)) {
                            echo "<div class='col-md-12'><br><h2 style='text-align-last: center;'>3. Antecedentes Heredofamiliares</h2><br></div>";
                            echo "<div class='form-group col-md-12'> ".$Heredofamiliares_General_Final."</div>";
                        }
                        
                        
                        //////////////////////////////////////////////////////////////////? Heredofamiliares ///////////////////////////////////////////////// 


                        





                        
                        /////////////////////////////////////////////////////////////////// Personales /////////////////////////////////////////////////

                        //ponerme estos campos $ArregloCamposAdicionales=["AntecedentesPersonales_Alimentacion","AntecedentesPersonales_Higiene"]; con la eestructura de arriba


                        $AntecedentesPersonales_Alimentacion = $rowMotorizado['AntecedentesPersonales_Alimentacion'];
                        $AntecedentesPersonales_Higiene = $rowMotorizado['AntecedentesPersonales_Higiene'];


                        $AntecedentesPersonales_Alimentacion_Final = LeerArreglo(json_decode($AntecedentesPersonales_Alimentacion,true));
                        $AntecedentesPersonales_Higiene_Final = LeerArreglo(json_decode($AntecedentesPersonales_Higiene,true));


                        if (!empty($AntecedentesPersonales_Alimentacion_Final) || !empty($AntecedentesPersonales_Higiene_Final)) {
                            echo "<div class='col-md-12'><br><h2 style='text-align-last: center;'>4. Antecedentes Personales</h2><br></div>";
                            if(!empty($AntecedentesPersonales_Alimentacion_Final)){
                                echo "<div class='col-md-12'><br><h3 style='text-align-last: center;'>Alimentación</h3><br></div>";
                                echo "<div class='form-group col-md-12'> ".$AntecedentesPersonales_Alimentacion_Final."</div>";
                            }
                            if(!empty($AntecedentesPersonales_Higiene_Final)){
                                echo "<div class='col-md-12'><br><h3 style='text-align-last: center;'>Higiene</h3><br></div>";
                                echo "<div class='form-group col-md-12'> ".$AntecedentesPersonales_Higiene_Final."</div>";
                            }
                        }
                        
                        //////////////////////////////////////////////////////////////////? Personales ///////////////////////////////////////////////// 











                        
                        /////////////////////////////////////////////////////////////////// InspeccionCyB /////////////////////////////////////////////////

                        //ponerme estos campos $ArregloCamposAdicionales=["InspeccionCyB_General","InspeccionCyB_ExploracionCB","InspeccionCyB_TejidosBlandos","InspeccionCyB_Traumatismos"]; con la eestructura de arriba


                        $InspeccionCyB_General = $rowMotorizado['InspeccionCyB_General'];
                        $InspeccionCyB_ExploracionCB = $rowMotorizado['InspeccionCyB_ExploracionCB'];
                        $InspeccionCyB_TejidosBlandos = $rowMotorizado['InspeccionCyB_TejidosBlandos'];
                        $InspeccionCyB_Traumatismos = $rowMotorizado['InspeccionCyB_Traumatismos'];


                        $InspeccionCyB_General_Final = LeerArreglo(json_decode($InspeccionCyB_General,true));
                        $InspeccionCyB_ExploracionCB_Final = LeerArreglo(json_decode($InspeccionCyB_ExploracionCB,true));
                        $InspeccionCyB_TejidosBlandos_Final = LeerArreglo(json_decode($InspeccionCyB_TejidosBlandos,true));
                        $InspeccionCyB_Traumatismos_Final = LeerArreglo(json_decode($InspeccionCyB_Traumatismos,true));

                        if(!empty($InspeccionCyB_General_Final) || !empty($InspeccionCyB_ExploracionCB_Final) || !empty($InspeccionCyB_TejidosBlandos_Final) || !empty($InspeccionCyB_Traumatismos_Final)){
                            echo "<div class='col-md-12'><br><h2 style='text-align-last: center;'>5. Inspección Corporal y Bucal </h2><br></div>";
                            if(!empty($InspeccionCyB_General_Final)){  
                                echo "<div class='col-md-12'><br><h3 style='text-align-last: center;'>General</h3><br></div>"; 
                                echo "<div class='form-group col-md-12'> ".$InspeccionCyB_General_Final."</div>";
                            }
                            if(!empty($InspeccionCyB_ExploracionCB_Final)){
                                echo "<div class='col-md-12'><br><h3 style='text-align-last: center;'>Exploración de Cabeza y Cuello</h3><br></div>";
                                echo "<div class='form-group col-md-12'> ".$InspeccionCyB_ExploracionCB_Final."</div>";
                            }
                            if(!empty($InspeccionCyB_TejidosBlandos_Final)){
                                echo "<div class='col-md-12'><br><h3 style='text-align-last: center;'>Exploración Bucal de Tejidos Blandos</h3><br></div>";
                                echo "<div class='form-group col-md-12'> ".$InspeccionCyB_TejidosBlandos_Final."</div>";
                            }
                            if(!empty($InspeccionCyB_Traumatismos_Final)){
                                echo "<div class='col-md-12'><br><h3 style='text-align-last: center;'>Traumatismos</h3><br></div>";
                                echo "<div class='form-group col-md-12'> ".$InspeccionCyB_Traumatismos_Final."</div>";
                            }
                        }
                        
                        //////////////////////////////////////////////////////////////////? InspeccionCyB ///////////////////////////////////////////////// 
















                        /////////////////////////////////////////////////////////////////// Oclusion y alineamiento /////////////////////////////////////////////////

                        //ponerme estos campos $ArregloCamposAdicionales=["OclusionAlineacion_General","OclusionAlineacion_HabitosNocivos"]; con la eestructura de arriba

                        $OclusionAlineacion_General = $rowMotorizado['OclusionAlineacion_General'];
                        $OclusionAlineacion_HabitosNocivos = $rowMotorizado['OclusionAlineacion_HabitosNocivos'];

                        $OclusionAlineacion_General_Final = LeerArreglo(json_decode($OclusionAlineacion_General,true));
                        $OclusionAlineacion_HabitosNocivos_Final = LeerArreglo(json_decode($OclusionAlineacion_HabitosNocivos,true));

                        if(!empty($OclusionAlineacion_General_Final) || !empty($OclusionAlineacion_HabitosNocivos_Final)){
                            echo "<div class='col-md-12'><br><h2 style='text-align-last: center;'>6. Oclusión y Alineamiento </h2><br></div>";
                            if(!empty($OclusionAlineacion_General_Final)){  
                                echo "<div class='col-md-12'><br><h3 style='text-align-last: center;'>General</h3><br></div>"; 
                                echo "<div class='form-group col-md-12' > ".$OclusionAlineacion_General_Final."</div>";
                            }
                            if(!empty($OclusionAlineacion_HabitosNocivos_Final)){
                                echo "<div class='col-md-12'><br><h3 style='text-align-last: center;'>Habitos Nocivos</h3><br></div>";
                                echo "<div class='form-group col-md-12' > ".$OclusionAlineacion_HabitosNocivos_Final."</div>";
                            }
                        }
                        
                        //////////////////////////////////////////////////////////////////? Oclusion y alineamiento ///////////////////////////////////////////////// 

                        






                        /////////////////////////////////////////////////////////////////// Conducta y Actitud /////////////////////////////////////////////////

                        //ponerme estos campos $ArregloCamposAdicionales=["ConductaActitud_General"]; con la eestructura de arriba

                        $ConductaActitud_General = $rowMotorizado['ConductaActitud_General'];

                        $ConductaActitud_General_Final = LeerArreglo(json_decode($ConductaActitud_General,true));

                        if(!empty($ConductaActitud_General_Final)){
                            echo "<div class='col-md-12'><br><h2 style='text-align-last: center;'>7. Conducta y Actitud </h2><br></div>";
                            if(!empty($ConductaActitud_General_Final)){  
                                echo "<div class='form-group col-md-12'> ".$ConductaActitud_General_Final."</div>";
                            }
                        }

                        //////////////////////////////////////////////////////////////////? Conducta y Actitud ///////////////////////////////////////////////// 













                        /////////////////////////////////////////////////////////////////// Examen dental  /////////////////////////////////////////////////

                        //ponerme estos campos $ArregloCamposAdicionales=["ExamenDental_General"]; con la eestructura de arriba

                        $ExamenDental_General = $rowMotorizado['ExamenDental_General'];

                        $ExamenDental_General_Final = LeerArreglo(json_decode($ExamenDental_General,true));

                        if(!empty($ExamenDental_General_Final)){
                            echo "<div class='col-md-12'><br><h2 style='text-align-last: center;'>8. Examen Dental </h2><br></div>";
                            if(!empty($ExamenDental_General_Final)){  
                                echo "<div class='form-group col-md-12'> ".$ExamenDental_General_Final."</div>";
                            }
                        }

                        //////////////////////////////////////////////////////////////////? Examen dental  ///////////////////////////////////////////////// 












                        /////////////////////////////////////////////////////////////////// Riesgo Caries  /////////////////////////////////////////////////

                        $TablaRiesgoCaries_Final = $rowMotorizado['TablaRiesgoCaries'];

                        if(!empty($TablaRiesgoCaries_Final)){
                            echo "<div class='col-md-12'><br><h2 style='text-align-last: center;'> 9. Riesgo a Caries </h2><br></div>";
                            
                            $JsonTablaRiesgoCaries_Final = json_decode($TablaRiesgoCaries_Final,true);

                            echo "<table class='table table-bordered' id='Tabla2Odontopediatria'>
                                                    <thead>
                                                        <tr>
                                                            <th style='width: 30%;'>Criterio</th>
                                                            <th style='width: 30%;'>Riesgo</th>
                                                            <th style='width: 5%;'>Si</th>
                                                            <th style='width: 5%;'>No</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>";

                                            $CamposTabla = array(
                                                "Cepillado dental con pasta fluorurada (número de veces al día)"=>"Menos de dos veces al día",
                                                "Placa bacteriana ( % de superficies dentarias pigmentadas)"=>"índice de O'Leary > 20%",
                                                "Frecuencia de ingestión de azúcares o de carbohidratos refinados (Nota: en niños pequeños, tomar en cuenta sus prácticas de alimentación, tales como dieta nocturna o amamantamiento y lactancia artificial prolongados)"=>"Más de dos veces al día",
                                                "Lesiones cariosas"=>"Presentes y activas",
                                                "Fosetas y fisuras profundas"=>"Presentes",
                                                "Enfermedad gingival o periodontal"=>"Presentes",
                                                "Alteraciones del esmalte (opacidades, hipoplasia, defectos, fluorosis)"=>"Presentes",
                                                "Aparatología ortodóncica o mantenedores de espacio"=>"Utiliza",
                                                "Obturaciones defectuosas"=>"Presentes",
                                                "Caries en padres o hermanos"=>"Presentes"
                                            );

                                            foreach ($CamposTabla as $campo => $camporiesgo):
                                                echo "<tr>
                                                        <td>$campo</td>
                                                        <td>$camporiesgo</td>
                                                        <td><input type='radio' name='TablaRiesgoCaries[$campo][Tipo]' value='Si' ".($JsonTablaRiesgoCaries_Final[$campo]['Tipo'] == 'Si' ? 'checked' : '')." ></td>
                                                        <td><input type='radio' name='TablaRiesgoCaries[$campo][Tipo]' value='No' ".($JsonTablaRiesgoCaries_Final[$campo]['Tipo'] == 'No' ? 'checked' : '')." ></td>
                                                    </tr>";
                                            endforeach;

                                            echo "</tbody>
                                                </table>";

                                                echo "<script>
                                                var container = document.getElementById('Tabla2Odontopediatria');
                                                var checkboxes = container.getElementsByTagName('input');
                        
                                                for (var i = 0; i < checkboxes.length; i++) {
                                                    checkboxes[i].addEventListener('click', function(event) {
                                                        event.preventDefault();
                                                        event.stopPropagation();
                                                        return false;
                                                    });
                                                }
                                                </script>";


                        }
                        /////////////////////////////////////////////////////////////////// Riesgo Caries  /////////////////////////////////////////////////


                        /////////////////////////////////////////////////////////////////// Diagnostico  /////////////////////////////////////////////////

                        //ponerme estos campos $ArregloCamposAdicionales=["Diagnostico_General"]; con la eestructura de arriba

                        $Diagnostico_General = $rowMotorizado['Diagnostico_General'];

                        $Diagnostico_General_Final = LeerArreglo(json_decode($Diagnostico_General,true));

                        if(!empty($Diagnostico_General_Final)){
                            echo "<div class='col-md-12'><br><h2 style='text-align-last: center;'>10. Diagnóstico </h2><br></div>";
                            if(!empty($Diagnostico_General_Final)){  
                                echo "<div class='form-group col-md-12'> ".$Diagnostico_General_Final."</div>";
                            }
                        }


                        //////////////////////////////////////////////////////////////////? Diagnostico ///////////////////////////////////////////////// 
                        

                    ?>
                    </div>
                    

                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6" align="center">
                            <?php

                                $queryList = mysqli_query($conn3, "SELECT firma FROM  firmas where historia_id = $idHistoria and historia_nombre = 'Historia_Odontopediatria' limit 1");
                                while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                    $firmaP = $rowMotorizado['firma'];

                                    if (strlen($firmaP) > 10) {
                                    $firmaPaciente = "<img src='$firmaP' height='125' width='250'> <br>__________________________________ <br>$nombre_cliente<br>$CODI_CLIENTE";
                                    } 

                                }

                                echo  $firmaPaciente;
                            ?>
                        </div>


                        <div class="col-md-6" align="center">
                            <?php

                                $queryList = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = $usuario_id");
                                while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                    $nombreF       = $rowMotorizado['nombreF'];
                                    $licenciaF       = $rowMotorizado['licenciaF'];
                                    $firma               = $rowMotorizado['firma'];

                                    if (strlen($firma) > 0) {
                                        $firmaImg = "<img src='{$Base}/FirmasReg/{$firma}' height='125' width='150'>";
                                    }
                                }

                            if($firmaImg !=""){
                                echo  $firmaImg;
                                echo  "<br>__________________________________ <br>$nombreF<br>$licenciaF";
                                echo "<b>* Documento firmado digitalmente *</b>";
                            }
                            
                            ?>

                        </div>
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