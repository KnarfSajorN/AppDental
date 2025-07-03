
<?php
include 'header.php';
include 'menu.php';


#Cierre
if ($_GET["msg"] != "") {
    include "plugins/SweetAlert2K/AlertaCorrectaOperacion.php";
}
if ($_GET["error"] != "") {
    include "plugins/SweetAlert2K/AlertaErrorOperacion.php";
}

$usuario_id = $_SESSION['ID'];
$clienteId = $_GET['clienteId'];

$QueryCliente = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id = $clienteId");
$nrowl = mysqli_num_rows($QueryCliente);
while ($RowCliente = mysqli_fetch_array($QueryCliente)) {

    $nombre_cliente = $RowCliente['nombre_cliente'];
    $fechaNacimiento = $RowCliente['fechaNacimiento'];

    $genero = $RowCliente['genero'];
}

?>

<style>
.Titulo_Pagina {
    width: fit-content;
    background-color: #3c8dbc75;
    padding: 20px;
    border-radius: 20px 20px 0px 0px;
    display: table-cell;
}

.panel-default>.panel-heading {
    color: #333;
    background-color: #f5f5f5;
    border-color: #ddd;
    margin-bottom: 10px;
}

.panel-heading {
    padding: 10px 15px;
    border-bottom: 1px solid transparent;
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
}

</style>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#"> Historia Odontopediatría </a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="content">
                <h4 class="Titulo_Pagina"> Historia Odontopediatría </b></u> del Paciente <?=$nombre_cliente;?> </h4>
                <div class="box">
                    <div class="box-body">
                        <form action="ODP_GuardarHistoria.php" method="POST" id="Formulario_Historia_RIAS">







                            <!-- Collapse Exterior -->
                            <div class="panel box box-primary" style="border-top: 3px solid #78a1f3;">



                                <!-- Accordion 0-->
                                <div class="box-header with-border" style="padding: 15px;">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#Collapse_Principal_0" style="color:#3c8dbc;">
                                            Datos Personales
                                        </a>
                                    </h4>
                                </div>
                                <div id="Collapse_Principal_0" class="panel-collapse collapse">
                                    <div class="panel-body">

                                        <?php echo datosPacientesReducido($clienteId); ?>

                                    </div>
                                </div>
                                <!-- Accordion 0 [FIN]-->



                                <!-- Accordion 1-->
                                <div class="box-header with-border" style="padding: 15px;border-top: 3px solid #78a1f3;">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#Collapse_Principal_1" style="color:#3c8dbc;">
                                            1. Información General
                                        </a>
                                    </h4>
                                </div>
                                <div id="Collapse_Principal_1" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="row">
                                            <?php

                                                function GenerarFormulario($ArregloDatosFormulario, $NombreCampo, $NombreGeneral) {
                                                    foreach ($ArregloDatosFormulario as $key => $value) {
                                                        $Titulo = $value["name"];
                                                        $Identificacion = $key;
                                                        $size = isset($value["size"]) ? $value["size"] : "col-md-6";
                                                        
                                                        // Especial para el select que tenga opción de otros
                                                        $hasOtros = false;
                                                        
                                                        // Verificar si el campo "Opciones" está lleno
                                                        if ($value["Tipo"] == "select") {
                                                            // Si hay opciones, usar select
                                                            $Opciones = "";
                                                            
                                                            // Iterar sobre las opciones y agregarlas al select
                                                            foreach ($value["Opciones"] as $opcion) {
                                                                $Opciones .= "<option value='$opcion'>$opcion</option>";
                                                                if ($opcion == 'Otro' || $opcion == 'Otros') {
                                                                    $hasOtros = true;
                                                                }
                                                            }
                                                            
                                                            // Generar el HTML para el select y el campo de texto "Otro"
                                                            if ($hasOtros) {
                                                                echo "<div class='form-group $size'>
                                                                        <label>$Titulo</label><br>
                                                                        <select name='{$NombreGeneral}[$NombreCampo][$key][$Titulo][]' id='{$NombreGeneral}_{$NombreCampo}_$Identificacion' class='form-control input-lg select2' style='width:100%' onchange='mostrarOtros(this)'>
                                                                            <option value='' selected> Seleccione </option>
                                                                            $Opciones
                                                                        </select>
                                                                    </div>";
                                                                
                                                                echo "<div class='form-group $size' id='{$NombreGeneral}_{$NombreCampo}_{$Identificacion}_Otros' style='display:none'>
                                                                        <label>Otro [$Titulo]</label><br>
                                                                        <input type='text' class='form-control' name='{$NombreGeneral}[$NombreCampo][$key][$Titulo][]'>
                                                                    </div>";
                                                            } else {
                                                                echo "<div class='form-group $size'>
                                                                        <label>$Titulo</label><br>
                                                                        <select name='{$NombreGeneral}[$NombreCampo][$key][$Titulo][]' class='form-control input-lg select2' style='width:100%' >
                                                                            <option value='' selected> Seleccione </option>
                                                                            $Opciones
                                                                        </select>
                                                                    </div>";
                                                            }
                                                        } elseif ($value["Tipo"] == "text") {
                                                            // Si no hay opciones, usar input text
                                                            echo "<div class='form-group $size'>
                                                                    <label>$Titulo</label><br>
                                                                    <input type='text' class='form-control' name='{$NombreGeneral}[$NombreCampo][$key][$Titulo][]'>
                                                                </div>";
                                                        } elseif ($value["Tipo"] == "textarea") {
                                                            // Si no hay opciones, usar textarea
                                                            echo "<div class='form-group $size'>
                                                                    <label>$Titulo</label><br>
                                                                    <textarea class='form-control' name='{$NombreGeneral}[$NombreCampo][$key][$Titulo][]'></textarea>
                                                                </div>";
                                                        }
                                                    }
                                                }

                                            //Manetener la estructura con los numeros para identificar ya sea en una impresion o una vista
                                            $ArregloDatosFormulario = [
                                                "1" => [
                                                    "name" => "Motivo principal de la consulta", 
                                                    "Opciones" => ["Dolor", "Revisión", "Prevención", "Caries", "Extracción", "Maloclusión", "Traumatismo", "Otro"],
                                                    "Tipo"=>"select"
                                                ],
                                                "2" => [
                                                    "name" => "¿Es la primera visita al dentista?", 
                                                    "Opciones" => ["Si", "No"],
                                                    "Tipo"=>"select",
                                                    "size"=>"col-md-12"
                                                ],
                                                "3" => [
                                                    "name" => "Si hubo una experiencia anterior, ¿cómo fue?", 
                                                    "Opciones" => ["Indiferente", "Agradable", "Desagradable"],
                                                    "Tipo"=>"select"
                                                ],
                                                "4" => [
                                                    "name" => "Descríbala",
                                                    "Opciones" => [],
                                                    "Tipo"=>"text"
                                                ],  
                                                "5" => [
                                                    "name" => "Remitido por",
                                                    "Opciones" => [],
                                                    "Tipo"=>"text"
                                                ],
                                                "6" => [
                                                    "name" => "Teléfono",
                                                    "Opciones" => [],
                                                    "Tipo"=>"text"
                                                ],

                                            ];
                                            
                                            GenerarFormulario($ArregloDatosFormulario,"General","InformacionGeneral");
                                            
                                            ?>
                                        </div>

                                    </div>
                                </div>
                                <!-- Accordion 1 [FIN]-->




                                <!-- Accordion 2-->
                                <div class="box-header with-border" style="padding: 15px;border-top: 3px solid #78a1f3;">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#Collapse_Principal_2" style="color:#3c8dbc;">
                                            2. Interrogatorio por Aparatos y Sistemas
                                        </a>
                                    </h4>
                                </div>
                                <div id="Collapse_Principal_2" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="row">
                                            <?php

                                                $ArregloDatosFormulario="";
                                                $ArregloDatosFormulario = [
                                                    "1" => [
                                                        "name" => "El embarazo fue",
                                                        
                                                        "Tipo" => "select",
                                                        "Opciones" => ["Normal", "Alto Riesgo", "Otros"],
                                                        
                                                    ],
                                                    "2" => [
                                                        "name" => "¿Tomó algún medicamento?",
                                                        
                                                        "Tipo" => "select",
                                                        "Opciones" => ["Si", "No"],
                                                        "size"=>"col-md-12"
                                                    ],
                                                    "3" => [
                                                        "name" => "¿Cuál?",
                                                        
                                                        "Tipo" => "text",
                                                        "Opciones" => []
                                                    ],
                                                    "4" => [
                                                        "name" => "Motivo",
                                                        
                                                        "Tipo" => "text",
                                                        "Opciones" => []
                                                    ],
                                                    
                                                ];

                                                echo "<div class='col-md-12' style='text-align:center;font-size:27px;'> Gestación </div>";
                                                GenerarFormulario($ArregloDatosFormulario,"Gestacion","Interrogatorio");

                                                $ArregloDatosFormulario="";
                                                $ArregloDatosFormulario = [
                                                "1" => [
                                                    "name" => "Nacimiento",
                                                    
                                                    "Tipo" => "select",
                                                    "Opciones" => ["Parto eutócico", "Parto distócico", "Por cesárea"],
                                                    "size" => "col-md-12"
                                                ],
                                                ];

                                                echo "<div class='col-md-12' style='text-align:center;font-size:27px;'> Parto </div>";
                                                GenerarFormulario($ArregloDatosFormulario,"Parto","Interrogatorio");

                                                $ArregloDatosFormulario="";
                                                $ArregloDatosFormulario = [

                                                "1" => [
                                                    "name" => "Etapa",
                                                    
                                                    "Tipo" => "select",
                                                    "Opciones" => ["Prematuro término", "Término", "Post-término"],
                                                    "size" => "col-md-12"
                                                ],
                                                "2" => [
                                                    "name" => "Peso al nacer",
                                                    "Tipo" => "text",
                                                    "Opciones" => []
                                                ],
                                                "3" => [
                                                    "name" => "Talla",
                                                    "Tipo" => "text",
                                                    "Opciones" => []
                                                ],
                                                
                                                "4" => [
                                                    "name" => "Presentó",
                                                    "Tipo" => "select",
                                                    "Opciones" => ["Hipoxia", "Dificultad de succion", "Ninguna","Otro"]
                                                ],
                                                "5" => [
                                                    "name" => "Anomalías congénitas",
                                                    "Tipo" => "select",
                                                    "Opciones" => ["Si", "No"],
                                                    "size"=>"col-md-12"
                                                ],
                                                "6" => [
                                                    "name" => "¿Cuales?",
                                                    "Tipo" => "text",
                                                    "Opciones" => [],
                                                    "size"=>"col-md-12"
                                                ]
                                                ];

                                                echo "<div class='col-md-12' style='text-align:center;font-size:27px;'> Etapa neonatal</div>";
                                                GenerarFormulario($ArregloDatosFormulario,"EtapaNeonatal","Interrogatorio");

                                                echo "<div class='col-md-12'><hr></div>";

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
                                                
                                                echo "<div class='col-md-12' style='text-align:center;font-size:27px;'> Infancia y Adolescencia </div>";

                                                echo"<table class='table table-bordered'>
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
                                                        <td><input type='radio' name='TablaInterrogatorio[$campo][Tipo]' class='form-control' value='Si'></td>
                                                        <td><input type='radio' name='TablaInterrogatorio[$campo][Tipo]' class='form-control' value='No'></td>
                                                        <td><input type='text' name='TablaInterrogatorio[$campo][Edad]' class='form-control' ></td>
                                                    </tr>";
                                                    //poner campo otros
                                                endforeach;
                                                echo "<tr>
                                                        <td>Otros</td>
                                                        <td colspan='3'><input type='text' name='TablaInterrogatorio[Otros][Otros]' class='form-control' ></td>
                                                    </tr>";
                                                echo "</tbody>
                                                </table>";

                                                $ArregloDatosFormulario="";
                                                $ArregloDatosFormulario = [
                                                    "1" => [
                                                        "name" => "¿Su hijo tiene diagnóstico de asma?",
                                                        "Tipo" => "select",
                                                        "Opciones" => ["Si", "No"],
                                                        "size" => "col-md-12"
                                                    ],
                                                    "2" => [
                                                        "name" => "¿Actualmente está bajo tratamiento médico por alguna enfermedad?",
                                                        "Tipo" => "select",
                                                        "Opciones" => ["Si", "No"]
                                                    ],
                                                    "3" => [
                                                        "name" => "Motivo",
                                                        
                                                        "Tipo" => "text",
                                                        "Opciones" => []
                                                    ],
                                                    "4" => [
                                                        "name" => "Si está bajo tratamiento médico, ¿qué medicamentos toma regularmente?",
                                                        "Tipo" => "text",
                                                        "Opciones" => [],
                                                        "size" => "col-md-12"
                                                    ],
                                                    "5" => [
                                                        "name" => "¿Es alérgico a algún alimento o medicamento?",
                                                        "Tipo" => "select",
                                                        "Opciones" => ["Si", "No"]
                                                    ],
                                                    "6" => [
                                                        "name" => "¿Cuál?",
                                                        
                                                        "Tipo" => "text",
                                                        "Opciones" => []
                                                    ],
                                                    "7" => [
                                                        "name" => "¿Tiene su esquema de vacunas completo?",
                                                        "Tipo" => "select",
                                                        "Opciones" => ["Si", "No"],
                                                        "size" => "col-md-12"
                                                    ],
                                                    "8" => [
                                                        "name" => "¿Tiene problemas de aprendizaje?",
                                                        "Tipo" => "select",
                                                        "Opciones" => ["Si", "No"]
                                                    ],
                                                    "9" => [
                                                        "name" => "¿Cuáles?",
                                                        "Tipo" => "text",
                                                        "Opciones" => []
                                                    ],
                                                    "10" => [
                                                        "name" => "¿Presenta o ha presentado alguna discapacidad?",
                                                        "Tipo" => "select",
                                                        "Opciones" => ["Si", "No", "Física", "Sensorial", "Neurológica", "Psicológica"],
                                                        "size" => "col-md-12"
                                                    ],
                                                    "11" => [
                                                        "name" => "Intervenciones quirúrgicas:",
                                                        "Tipo" => "select",
                                                        "Opciones" => ["Si", "No"]
                                                    ],
                                                    "12" => [
                                                        "name" => "¿Cuáles y a qué edad?",
                                                        
                                                        "Tipo" => "text",
                                                        "Opciones" => []
                                                    ],
                                                    "13" => [
                                                        "name" => "¿Ha recibido una transfusión?",
                                                        "Tipo" => "select",
                                                        "Opciones" => ["Si", "No", "Sangre", "Plaquetas", "Plasma"],
                                                        "size" => "col-md-12"
                                                    ],
                                                    "14" => [
                                                        "name" => "Adolescentes:",
                                                        "Tipo" => "textarea",
                                                        "Opciones" => [],
                                                        "size" => "col-md-12"
                                                    ]
                                                ];


                                                GenerarFormulario($ArregloDatosFormulario,"InfanciaAdolescencia","Interrogatorio");
                                            
                                            

                                            ?>
                                        </div>

                                    </div>
                                </div>
                                <!-- Accordion 2 [FIN]-->



            




                                <!-- Accordion 3-->
                                <div class="box-header with-border" style="padding: 15px;border-top: 3px solid #78a1f3;">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#Collapse_Principal_3" style="color:#3c8dbc;">
                                            3. Antecedentes Heredofamiliares
                                        </a>
                                    </h4>
                                </div>
                                <div id="Collapse_Principal_3" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="row">

                                            <div class="form-group col-md-12">
                                                <label>Padre</label><br>
                                                <textarea class="form-control" name="Heredofamiliares[General][0][Padre]"></textarea>
                                            </div>
                                            
                                            <div class="form-group col-md-12">
                                                <label>Madre</label><br>
                                                <textarea class="form-control" name="Heredofamiliares[General][1][Madre]"></textarea>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- Accordion 3 [FIN]-->








                                <!-- Accordion 4-->
                                <div class="box-header with-border" style="padding: 15px;border-top: 3px solid #78a1f3;">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#Collapse_Principal_4" style="color:#3c8dbc;">
                                            4. Antecedentes Personales
                                        </a>
                                    </h4>
                                </div>
                                <div id="Collapse_Principal_4" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="row">

                                            <?php
                                            
                                            $ArregloDatosFormulario="";
                                            $ArregloDatosFormulario = [
                                                "1" => [
                                                    "name" => "¿Se alimenta o alimentó?",
                                                    "Tipo" => "select",
                                                    "Opciones" => ["Por seno materno", "Por biberón", "Ambos", "Otros"]
                                                ],
                                                "2" => [
                                                    "name" => "¿Hasta qué edad?",
                                                    "Tipo" => "text",
                                                    "Opciones" => [],
                                                    "size" => "col-md-12"
                                                ],
                                                "3" => [
                                                    "name" => "¿Cuantas veces al día?",
                                                    "Tipo" => "text",
                                                    "Opciones" => []
                                                ],
                                                "4" => [
                                                    "name" => "¿Endulza o endulzó su leche?",
                                                    "Tipo" => "select",
                                                    "Opciones" => ["Si", "No"],
                                                ],
                                                "5" => [
                                                    "name" => "¿Con qué?",
                                                    "Tipo" => "select",
                                                    "Opciones" => ["Azúcar", "Miel", "Otros"]
                                                ],
                                                "6" => [
                                                    "name" => "¿Tiene o tuvo alimentación nocturna?",
                                                    "Tipo" => "select",
                                                    "Opciones" => ["Si", "No", "Una vez", "Dos veces", "Tres veces", "Cuatro o más"],
                                                    "size" => "col-md-12"
                                                ],
                                                "7" => [
                                                    "name" => "¿Hasta qué edad?",
                                                    "Tipo" => "text",
                                                    "Opciones" => [],
                                                    "size" => "col-md-12"
                                                ],
                                            ];

                                            echo "<div class='col-md-12' style='text-align:center;font-size:27px;'>Alimentación</div>";
                                            GenerarFormulario($ArregloDatosFormulario,"Alimentacion","AntecedentesPersonales");

                                            $ArregloDatosFormulario="";
                                            $ArregloDatosFormulario = [
                                                "1" => [
                                                    "name" => "¿Lleva a cabo algún procedimiento de higiene bucal en el paciente?",
                                                    "Tipo" => "select",
                                                    "Opciones" => ["Si", "No"],
                                                    "size" => "col-md-12"
                                                ],
                                                "2" => [
                                                    "name" => "¿Quién lo realiza?",
                                                    "Tipo" => "select",
                                                    "Opciones" => ["Padres", "Paciente", "Ambos", "Otros"]
                                                ],
                                                "3" => [
                                                    "name" => "¿Con qué frecuencia?",
                                                    "Tipo" => "select",
                                                    "Opciones" => ["Una vez al día", "Dos veces al día", "Tres veces al día"],
                                                    "size" => "col-md-12"
                                                ],
                                                "4" => [
                                                    "name" => "¿Con qué?",
                                                    "Tipo" => "select",
                                                    "Opciones" => ["Cepillo", "Gasa", "Otros"],
                                                ],
                                                
                                                "5" => [
                                                    "name" => "¿Desde cuándo?",
                                                    "Tipo" => "select",
                                                    "Opciones" => ["Antes de la erupción de los dientes", "A la erupción de los primarios", "A la erupción de los secundarios"],
                                                    "size" => "col-md-12"
                                                ],
                                                "6" => [
                                                    "name" => "¿Utiliza pasta dental?",
                                                    "Tipo" => "select",
                                                    "Opciones" => ["Si", "No"]
                                                ],
                                                "7" => [
                                                    "name" => "¿Utiliza hilo dental?",
                                                    "Tipo" => "select",
                                                    "Opciones" => ["Si", "No"]
                                                ],
                                                "8" => [
                                                    "name" => "Frecuencia",
                                                    "Tipo" => "select",
                                                    "Opciones" => ["Diario", "Ocasionalmente"]
                                                ],
                                                "9" => [
                                                    "name" => "¿Se cepilla los dientes antes de dormir?",
                                                    "Tipo" => "select",
                                                    "Opciones" => ["Si", "No"]
                                                ],
                                                "10" => [
                                                    "name" => "¿Se le ha administrado fluoruro?",
                                                    "Tipo" => "select",
                                                    "Opciones" => ["Si", "No", "Colutorio", "Barniz", "Gel", "Tabletas", "Gotas"]
                                                ],
                                                "11" => [
                                                    "name" => "¿Desde cuándo?",
                                                    "Tipo" => "select",
                                                    "Opciones" => ["Antes de la erupción de los dientes", "Al erupcionar los primarios", "Al erupcionar los secundarios"]
                                                ],
                                                "12" => [
                                                    "name" => "¿Dónde?",
                                                    "Tipo" => "select",
                                                    "Opciones" => ["Casa", "Escuela", "Consultorio", "Sector Salud", "Facultad de Odontología"]
                                                ]
                                            ];

                                            echo "<div class='col-md-12' style='text-align:center;font-size:27px;'>Higiene</div>";
                                            GenerarFormulario($ArregloDatosFormulario,"Higiene","AntecedentesPersonales");

                                            ?>

                                        </div>
                                    </div>
                                </div>
                                <!-- Accordion 4 [FIN]-->










                                <!-- Accordion 5-->
                                <div class="box-header with-border" style="padding: 15px;border-top: 3px solid #78a1f3;">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#Collapse_Principal_5" style="color:#3c8dbc;">
                                            5. Inspección Corporal y Bucal
                                        </a>
                                    </h4>
                                </div>
                                <div id="Collapse_Principal_5" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="row">

                                            <?php

                                                $ArregloDatosFormulario="";
                                                $ArregloDatosFormulario = [
                                                    "1" => [
                                                        "name" => "Peso actual",
                                                        "Tipo" => "text",
                                                        "Opciones" => []
                                                    ],
                                                    "2" => [
                                                        "name" => "Talla actual",
                                                        "Tipo" => "text",
                                                        "Opciones" => []
                                                    ],
                                                    "3" => [
                                                        "name" => "Temperatura",
                                                        "Tipo" => "text",
                                                        "Opciones" => []
                                                    ],
                                                    "4" => [
                                                        "name" => "Observaciones",
                                                        "Tipo" => "textarea",
                                                        "Opciones" => [],
                                                        "size" => "col-md-12"
                                                    ],
                                                    
                                                ];

                                                echo "<div class='col-md-12' style='text-align:center;font-size:27px;'>General</div>";
                                                GenerarFormulario($ArregloDatosFormulario,"General","InspeccionCyB");


                                                $ArregloDatosFormulario="";
                                                $ArregloDatosFormulario = [
                                                    "1" => [
                                                        "name" => "Articulación temporomandibular en apertura y cierre",
                                                        "Tipo" => "select",
                                                        "Opciones" => ["Derecha", "Izquierda","Normal", "Desviación", "Crepitación"]
                                                    ],
                                                    "2" => [
                                                        "name" => "Cuello: Presencia de ganglios inflamados",
                                                        "Tipo" => "select",
                                                        "Opciones" => ["Si", "No", "Cadena Submentoniana", "Cadena Submandibular", "Cadena Retroauricular"]
                                                    ],
                                                ];

                                                echo "<div class='col-md-12' style='text-align:center;font-size:27px;'>Exploración de cabeza y cuello</div>";
                                                GenerarFormulario($ArregloDatosFormulario,"ExploracionCB","InspeccionCyB");
                                                


                                                $ArregloDatosFormulario="";
                                                $ArregloDatosFormulario = [
                                                    "1" => [
                                                        "name" => "Labios: Superficie externa",
                                                        "Tipo" => "select",
                                                        "Opciones" => ["Labio superior", "Labio inferior", "Sin alteración", "Reseco", "Queilitis", "Fovéola", "Úlcera herpética secundaria", "Úlcera aftosa", "Otros"],
                                                        "size" => "col-md-12"
                                                    ],
                                                    "2" => [
                                                        "name" => "Labios: Superficie interna",
                                                        "Tipo" => "select",
                                                        "Opciones" => ["Labio superior", "Labio inferior", "Sin alteración", "Úlceras", "Mucocele", "Otros"],
                                                        "size" => "col-md-12"
                                                    ],
                                                    "3" => [
                                                        "name" => "Labios: Frenillo labial",
                                                        "Tipo" => "select",
                                                        "Opciones" => ["Superior", "Inferior", "Inserción normal", "Alta", "Media", "Baja", "Doble", "Otros"],
                                                        "size" => "col-md-12"
                                                    ],
                                                    "4" => [
                                                        "name" => "Mucosa yugal y fondo de saco",
                                                        "Tipo" => "select",
                                                        "Opciones" => ["Derecho", "Izquierdo", "Sin alteración", "Úlceras", "Candidiasis", "Gránulos de Fordyce", "Otros"],
                                                        "size" => "col-md-12"
                                                    ],
                                                    "5" => [
                                                        "name" => "Frenillo bucal",
                                                        "Tipo" => "select",
                                                        "Opciones" => ["Derecho", "Izquierdo", "Múltiple", "Inserción", "Alta", "Media", "Baja", "Otros"],
                                                        "size" => "col-md-12"
                                                    ],
                                                    "6" => [
                                                        "name" => "Lengua",
                                                        "Tipo" => "select",
                                                        "Opciones" => ["Sin alteración", "Saburral", "Fisurada", "Pilosa", "Glositis Migratoria Benigna", "Glositis Romboidea Media", "Úlcera de Riga-Fede", "Candidiasis", "Otros"],
                                                        "size" => "col-md-12"
                                                    ],
                                                    "7" => [
                                                        "name" => "Frenillo lingual",
                                                        "Tipo" => "select",
                                                        "Opciones" => ["Sin alteración", "Corto", "Otros"],
                                                        "size" => "col-md-12"
                                                    ],
                                                    "8" => [
                                                        "name" => "Piso de la boca",
                                                        "Tipo" => "select",
                                                        "Opciones" => ["Sin alteración", "Ránula", "Otros"],
                                                        "size" => "col-md-12"
                                                    ],
                                                    "9" => [
                                                        "name" => "Mucosa alveolar y encía",
                                                        "Tipo" => "select",
                                                        "Opciones" => ["Sin alteración", "Úlceras", "Abscesos", "Fístulas", "Fenestración", "Dehiscencia", "Gingivitis", "Periodontitis", "Nódulos de Bohn", "Quistes de erupción", "Quistes de lámina dental", "Hematoma de la erupción", "Pericoronitis", "Otros"],
                                                        "size" => "col-md-12"
                                                    ],
                                                    "10" => [
                                                        "name" => "Paladar duro",
                                                        "Tipo" => "select",
                                                        "Opciones" => ["Sin alteración", "Cicatrices", "Hendiduras", "Perlas de Epstein", "Úlceras", "Otros"],
                                                        "size" => "col-md-12"
                                                    ],
                                                    "11" => [
                                                        "name" => "Paladar blando",
                                                        "Tipo" => "select",
                                                        "Opciones" => ["Sin alteración", "Cicatrices", "Hendiduras", "Úlceras", "Otros"],
                                                        "size" => "col-md-12"
                                                    ],
                                                    "12" => [
                                                        "name" => "Faringe: Amígdalas palatinas",
                                                        "Tipo" => "select",
                                                        "Opciones" => ["Sin alteración", "Hipertróficas", "Úlceradas", "Hiperémicas", "Ausentes", "Otros"],
                                                        "size" => "col-md-12"
                                                    ],
                                                    "13" => [
                                                        "name" => "Faringe: Úvula",
                                                        "Tipo" => "select",
                                                        "Opciones" => ["Sin alteración", "Bífida", "Inflamada", "Ulceradas", "Otros"],
                                                        "size" => "col-md-12"
                                                    ]
                                                ];  

                                                echo "<div class='col-md-12' style='text-align:center;font-size:27px;'>Exploración bucal de tejidos blandos</div>";
                                                GenerarFormulario($ArregloDatosFormulario,"TejidosBlandos","InspeccionCyB");


                                                $ArregloDatosFormulario="";
                                                $ArregloDatosFormulario = [
                                                    "1" => [
                                                        "name" => "Dentición",
                                                        "Tipo" => "select",
                                                        "Opciones" => ["Primaria", "Secundaria", "Ambas"]
                                                    ],
                                                    "2" => [
                                                        "name" => "¿Cuándo ocurrió?",
                                                        "Tipo" => "text",
                                                        "Opciones" => []
                                                    ],
                                                    "3" => [
                                                        "name" => "¿Dónde ocurrió?",
                                                        "Tipo" => "select",
                                                        "Opciones" => ["Casa", "Parque", "Escuela", "Transporte", "Otros"]
                                                    ],
                                                    "4" => [
                                                        "name" => "¿Cómo ocurrió?",
                                                        "Tipo" => "text",
                                                        "Opciones" => [],
                                                        "size" => "col-md-12"
                                                    ],
                                                    "5" => [
                                                        "name" => "Perdida de conciencia",
                                                        "Tipo" => "select",
                                                        "Opciones" => ["Si", "No"]
                                                    ],
                                                    "6" => [
                                                        "name" => "Vómito",
                                                        "Tipo" => "select",
                                                        "Opciones" => ["Si", "No"]
                                                    ],
                                                    "7" => [
                                                        "name" => "Hemorragia",
                                                        "Tipo" => "select",
                                                        "Opciones" => ["Si", "No"]
                                                    ],
                                                    "8" => [
                                                        "name" => "Diagnóstico",
                                                        "Tipo" => "select",
                                                        "Opciones" => ["Concusión", "Subluxación","Luxación lateral","Luxación instrusiva","Luxación estrusiva","Avulsión","Fractura"]
                                                    ],
                                                    "9" => [
                                                        "name" => "Observaciones",
                                                        "Tipo" => "textarea",
                                                        "Opciones" => [],
                                                        "size" => "col-md-12"
                                                    ]
                                                ];

                                                echo "<div class='col-md-12' style='text-align:center;font-size:27px;'>Exploración bucal de traumatismos </div>";
                                                GenerarFormulario($ArregloDatosFormulario,"Traumatismos","InspeccionCyB");

                                            ?>

                                        </div>
                                    </div>
                                </div>
                                <!-- Accordion 5 [FIN]-->






                                








                                 <!-- Accordion 6-->
                                 <div class="box-header with-border" style="padding: 15px;border-top: 3px solid #78a1f3;">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#Collapse_Principal_6" style="color:#3c8dbc;">
                                            6. Oclusión y Alineamiento
                                        </a>
                                    </h4>
                                </div>
                                <div id="Collapse_Principal_6" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="row">

                                            <?php
                                            
                                            $ArregloDatosFormulario="";
                                            $ArregloDatosFormulario = [
                                                "1" => [
                                                    "name" => "Línea media",
                                                    "Tipo" => "select",
                                                    "Opciones" => ["Superior", "Inferior", "Normal", "Desviada der.", "Desviada izq."]
                                                ],
                                                "2" => [
                                                    "name" => "Planos terminales",
                                                    "Tipo" => "select",
                                                    "Opciones" => ["Derecho", "Izquierdo", "Vertical o recto", "Mesial", "Distal", "Mesial exagerado", "No registrable"]
                                                ],
                                                "3" => [
                                                    "name" => "Espacios primates",
                                                    "Tipo" => "select",
                                                    "Opciones" => ["Si", "No", "Superior", "Inferior"]
                                                ],
                                                "4" => [
                                                    "name" => "Baume",
                                                    "Tipo" => "select",
                                                    "Opciones" => ["Tipo 1", "Tipo 2", "No registrable"]
                                                ],
                                                "5" => [
                                                    "name" => "Clase de Angle",
                                                    "Tipo" => "select",
                                                    "Opciones" => ["Derecho", "Izquierdo", "Clase I", "Clase II división 1", "Clase II división 2", "Clase III", "No registrable"]
                                                ],
                                                "6" => [
                                                    "name" => "Desgaste fisiológico de dientes primarios",
                                                    "Tipo" => "select",
                                                    "Opciones" => ["Si", "No"]
                                                ],
                                                "7" => [
                                                    "name" => "Diastema",
                                                    "Tipo" => "select",
                                                    "Opciones" => ["Si", "No"]
                                                ],
                                                "8" => [
                                                    "name" => "Borde a borde",
                                                    "Tipo" => "select",
                                                    "Opciones" => ["Si", "No"]
                                                ],
                                                "9" => [
                                                    "name" => "Mordida cruzada",
                                                    "Tipo" => "select",
                                                    "Opciones" => ["Si", "No", "Anterior", "Posterior", "Derecha", "Izquierda", "Bilateral"],
                                                    "size" => "col-md-12"
                                                ],
                                                "10" => [
                                                    "name" => "Sobremordida",
                                                    "Tipo" => "select",
                                                    "Opciones" => ["Si Medida en mm", "No", "No registrable"]
                                                ],
                                                "11" => [
                                                    "name" => "mm",
                                                    "Tipo" => "text",
                                                    "Opciones" => []
                                                ],
                                                "12" => [
                                                    "name" => "Traslape horizontal",
                                                    "Tipo" => "select",
                                                    "Opciones" => ["Si Medida en mm", "No", "No registrable"]
                                                ],
                                                "13" => [
                                                    "name" => "mm",
                                                    "Tipo" => "text",
                                                    "Opciones" => []
                                                ],
                                                "14" => [
                                                    "name" => "Mordida abierta",
                                                    "Tipo" => "select",
                                                    "Opciones" => ["Si Medida en mm", "No", "No registrable"]
                                                ],
                                                "15" => [
                                                    "name" => "mm",
                                                    "Tipo" => "text",
                                                    "Opciones" => []
                                                ]
                                                
                                            ];


                                            echo "<div class='col-md-12' style='text-align:center;font-size:27px;'> </div>";
                                            GenerarFormulario($ArregloDatosFormulario,"General","OclusionAlineacion"); 

                                            

                                            $ArregloDatosFormulario="";
                                            $ArregloDatosFormulario = [
                                                "1" => [
                                                    "name" => "Succión de dedo",
                                                    "Tipo" => "select",
                                                    "Opciones" => ["Si", "No"]
                                                ],
                                                "2" => [
                                                    "name" => "Frecuencia",
                                                    "Tipo" => "select",
                                                    "Opciones" => ["Todo el día", "Al dormir", "Ocasionalmente"]
                                                ],
                                                "3" => [
                                                    "name" => "Chupón",
                                                    "Tipo" => "select",
                                                    "Opciones" => ["Si", "No"]
                                                ],
                                                "4" => [
                                                    "name" => "Frecuencia",
                                                    "Tipo" => "select",
                                                    "Opciones" => ["Todo el día", "Al dormir", "Ocasionalmente"]
                                                ],
                                                "5" => [
                                                    "name" => "Labio",
                                                    "Tipo" => "select",
                                                    "Opciones" => ["Si", "No"]
                                                ],
                                                "6" => [
                                                    "name" => "Frecuencia",
                                                    "Tipo" => "select",
                                                    "Opciones" => ["Todo el día", "Al dormir", "Ocasionalmente"]
                                                ],
                                                "7" => [
                                                    "name" => "Mordedura de labio",
                                                    "Tipo" => "select",
                                                    "Opciones" => ["Si", "No", "Superior", "Inferior", "Ambos"]
                                                ],
                                                "8" => [
                                                    "name" => "Onicofagia",
                                                    "Tipo" => "select",
                                                    "Opciones" => ["Si", "No"]
                                                ],
                                                "9" => [
                                                    "name" => "Bruxismo",
                                                    "Tipo" => "select",
                                                    "Opciones" => ["Si", "No"]
                                                ],
                                                "10" => [
                                                    "name" => "Deglución atípica",
                                                    "Tipo" => "select",
                                                    "Opciones" => ["Si", "No", "Con proyección lingual"]
                                                ],
                                                "11" => [
                                                    "name" => "Respiración bucal",
                                                    "Tipo" => "select",
                                                    "Opciones" => ["Si", "No"]
                                                ],
                                                "12" => [
                                                    "name" => "Otros",
                                                    "Tipo" => "textarea",
                                                    "Opciones" => [],
                                                    "size" => "col-md-12"
                                                ]
                                            ];


                                            echo "<div class='col-md-12' style='text-align:center;font-size:27px;'> Hábitos nocivos  </div>";
                                            GenerarFormulario($ArregloDatosFormulario,"HabitosNocivos","OclusionAlineacion");
                                            ?>

                                        </div>
                                    </div>
                                </div>
                                <!-- Accordion 6 [FIN]-->






                                <!-- Accordion 7-->
                                <div class="box-header with-border" style="padding: 15px;border-top: 3px solid #78a1f3;">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#Collapse_Principal_7" style="color:#3c8dbc;">
                                            7. Conducta y Actitud
                                        </a>
                                    </h4>
                                </div>
                                <div id="Collapse_Principal_7" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="row">

                                            <?php
                                            
                                            $ArregloDatosFormulario="";
                                            $ArregloDatosFormulario = [
                                                "1" => [
                                                    "name" => "Respuesta conductual inicial del niño",
                                                    "Tipo" => "select",
                                                    "Opciones" => ["Grado 0", "Grado 1", "Grado 2", "Grado 3"]
                                                ],
                                                "2" => [
                                                    "name" => "Actitud de los padres",
                                                    "Tipo" => "select",
                                                    "Opciones" => ["No cooperador", "Potencialmente cooperador", "Cooperador"]
                                                ],
                                                
                                            ];


                                            echo "<div class='col-md-12' style='text-align:center;font-size:27px;'> </div>";
                                            GenerarFormulario($ArregloDatosFormulario,"General","ConductaActitud"); 

                                            ?>

                                        </div>
                                    </div>
                                </div>
                                <!-- Accordion 7 [FIN]-->







                                <!-- Accordion 8-->
                                <div class="box-header with-border" style="padding: 15px;border-top: 3px solid #78a1f3;">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#Collapse_Principal_8" style="color:#3c8dbc;">
                                            8. Examen Dental
                                        </a>
                                    </h4>
                                </div>
                                <div id="Collapse_Principal_8" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="row">

                                            <div class="form-group col-md-12">
                                                <label>Hallazgos radiográficos significativos:</label><br>
                                                <textarea class="form-control" name="ExamenDental[General][0][Hallazgos radiográficos significativos]"></textarea>
                                            </div>
                                            
                                            <div class="form-group col-md-12">
                                                <label>Posible Tratamiento</label><br>
                                                <textarea class="form-control" name="ExamenDental[General][1][Posible Tratamiento]"></textarea>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- Accordion 8 [FIN]-->







                                <!-- Accordion 9-->
                                <div class="box-header with-border" style="padding: 15px;border-top: 3px solid #78a1f3;">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#Collapse_Principal_9" style="color:#3c8dbc;">
                                            9. Riesgo a Caries
                                        </a>
                                    </h4>
                                </div>
                                <div id="Collapse_Principal_9" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="row">

                                            <?php
                                            
                                            echo "<table class='table table-bordered'>
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
                                                        <td><input type='radio' name='TablaRiesgoCaries[$campo][Tipo]' class='form-control' value='Si'></td>
                                                        <td><input type='radio' name='TablaRiesgoCaries[$campo][Tipo]' class='form-control' value='No'></td>
                                                    </tr>";
                                            endforeach;

                                            echo "</tbody>
                                                </table>";


                                            
                                            ?>

                                        </div>
                                    </div>
                                </div>
                                <!-- Accordion 9 [FIN]-->






                                <!-- Accordion 10-->
                                <div class="box-header with-border" style="padding: 15px;border-top: 3px solid #78a1f3;">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#Collapse_Principal_10" style="color:#3c8dbc;">
                                            10. Diagnóstico
                                        </a>
                                    </h4>
                                </div>
                                <div id="Collapse_Principal_10" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="row">

                                            <?php
                                            
                                            $ArregloDatosFormulario="";
                                            $ArregloDatosFormulario = [
                                                "1" => [
                                                    "name" => "Sano",
                                                    "Tipo" => "select",
                                                    "Opciones" => ["Si", "No"]
                                                ],
                                                "2" => [
                                                    "name" => "Riesgo",
                                                    "Tipo" => "select",
                                                    "Opciones" => ["Alto", "Medio", "Bajo"]
                                                ],
                                                "3" => [
                                                    "name" => "Observaciones",
                                                    "Tipo" => "textarea",
                                                    "Opciones" => [],
                                                    "size" => "col-md-12"
                                                ]
                                            ];


                                            echo "<div class='col-md-12' style='text-align:center;font-size:27px;'>  </div>";
                                            GenerarFormulario($ArregloDatosFormulario,"General","Diagnostico");

                                            ?>

                                        </div>
                                    </div>
                                </div>
                                <!-- Accordion 10 [FIN]-->




                            </div>
                            <!-- Fin del Collapse Exterior -->


                        
                            <input type="hidden" name="cliente_id" value="<?php echo $_GET['clienteId'];; ?>">
                            <input type="hidden" name="usuario_id" value="<?php echo $_SESSION['ID']; ?>">

                            
                                <div class="col-sm-12">
                                    <center><button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" name="Guardar_Informacion_Pagina">
                                            <h2> <strong> G u a r d a r </strong> </h2>
                                        </button></center>
                                </div>
                            

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include 'footer.php';
?>
<script>
    function mostrarOtros(select) {
        var identificacion = select.id; // Extraer la identificación del ID del select
        var otrosDiv = document.getElementById(identificacion + '_Otros');

        // Mostrar u ocultar el campo de texto "Otros" según la opción seleccionada
        otrosDiv.style.display = (select.value === 'Otro' || select.value === 'Otros') ? 'block' : 'none';
    }
</script>

<script>
  // no quitar para evitar problemas de que guarde con este caracter ""
  $(document).on('input', 'input[type="text"], textarea', function() {
    $(this).val($(this).val().replace(/[']/g, ''));
  });
</script>
<script src="apiVoz_3.2.js"></script>
<?php include 'plantilla.php';?>
<script src="plugins/LottieK/lottie.min.js"></script>
