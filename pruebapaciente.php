<?php
include 'header.php';
include 'menu.php';

$Historia_id = $_GET["Historia"];
$queryList = mysqli_query($conn3, "SELECT * FROM  CH_Campos_Historia WHERE historia_id='$Historia_id' ORDER BY Posicion ASC limit 1");
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $Posicion = $rowMotorizado["Posicion"] + 1;
}
if ($Posicion == "") {
    $Posicion = 1;
}
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#"> Historia ** </a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="content">
                <h4 class="Titulo_Pagina">Historia **</h4>
                <div class="box">
                    <div class="box-body">
                        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">

                            <div class="container margin-top-30">
                                <div class="row component-container">

                                    <?php
                                    $queryList = mysqli_query($conn3, "SELECT * FROM  CH_Campos_Historia WHERE historia_id='{$Historia_id}' ");
                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                        $Columnas = $rowMotorizado["Columnas"];
                                        $Nombre_Campo = $rowMotorizado["Nombre_Campo"];
                                        echo "<div class='col-md-{$Columnas}' style='background-color:green;padding:20px;'>";
                                        echo "{$Nombre_Campo}";
                                        echo "</div>";
                                    }
                                    ?>
                                    

                                </div>
                            </div>

                    </div>
                    </form>
                </div>



                <div class="col-md-12">
                    <div style="bottom: 30px;position: fixed;z-index: 2;width: 87%;">
                        <button id='ocultar-mostrar'><a href="#" class="btn"><i class="fas fa-bars" style="color:black!important;"></i> </a> </button>
                    </div>
                    <div style="background-color: #9cc3db;padding: 20px;bottom: 30px;position: fixed;z-index: 1;width: 87%;" id="ContenedorCampos">
                        <form action="pruebapacienteguardar.php" method="POST">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Seleccione Tipo de Campo</label>
                                    <select name="NuevoCampo[Tipo_Campo]" class="form-control select2" onChange="CampoSelecionado(this.value);" style="width: 100%;">
                                        <option>Seleccione </option>
                                        <option value="text">Campo de texto simple</option>
                                        <option value="number">Campo Numérico </option>
                                        <option value="date">Campo Fecha </option>
                                        <option value="textarea">Campo de texto Grande </option>
                                        <option value="servicio10">Campo Imagen </option>
                                        <option value="servicio4">lista desplegable de si o no </option>
                                        <option value="servicio5">Lista Desplegable </option>
                                        <option value="servicio6">Selección Múltiple </option>
                                        <option value="servicio7">Separador o Titulo de sección </option>
                                        <option value="servicio8">Imagen Directa </option>
                                        <option value="servicio11">Inicio Modulo Plegable </option>
                                        <option value="servicio12">Fin del Modulo Plegable </option>

                                    </select>
                                </div>
                                <div class="col-md-12" id="RespuestaCampo">

                                </div>

                            </div>
                            <input type="hidden" name="NuevoCampo[historia_id]" value="<?php echo $Historia_id; ?>">
                            <input type="hidden" name="NuevoCampo[Posicion]" value="<?php echo $Posicion; ?>">
                            <input type="hidden" name="usuario_id" value="<?php echo $_SESSION["ID"]; ?>">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- /.content -->
</div>

<div class="container margin-top-30">
    <div class="row component-container">

        <div class="col-md-9 col-sm-6 col-xs-12 component-section" data-width="col-md-9 col-sm-6 col-xs-12" data-wrapper="bannerwrapper" data-componentname="Banner" data-componenttype="Complex">
            <div class="panel panel-default banner-component">
                <div class="panel-heading">
                    <h3>Heading</h3>
                </div>
                <div class="panel-body">
                    <h1>Banner</h1>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12 component-section">
            <div class="panel panel-default important-links-component">
                <div class="panel-heading">
                    <h3>Heading</h3>
                </div>
                <div class="panel-body">
                    <h1>Important Links</h1>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-sm-6 col-xs-12 component-section" data-width="col-md-12 col-sm-6 col-xs-12" data-wrapper="trainingstatuswrapper" data-componentname="TrainingStatus" data-componenttype="Mediocre">
            <div class="panel panel-default training-status-component">
                <div class="panel-heading">
                    <h3>Heading</h3>
                </div>
                <div class="panel-body">
                    <h1>Training Status</h1>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-sm-6 col-xs-12 component-section" data-width="col-md-12 col-sm-6 col-xs-12" data-wrapper="learningactivitieswrapper" data-componentname="LearningActivities" data-componenttype="Simple">
            <div class="panel panel-default learning-activities-component">
                <div class="panel-heading">
                    <h3>Heading</h3>
                </div>
                <div class="panel-body">
                    <h1>Learning Activities</h1>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-6 col-xs-12 component-section" data-width="col-md-4 col-sm-6 col-xs-12" data-wrapper="popularcourseswrapper" data-componentname="PopularCourses" data-componenttype="Simple">
            <div class="panel panel-default popular-courses-component">
                <div class="panel-heading">
                    <h3>Heading</h3>
                </div>
                <div class="panel-body">
                    <h1>Popular Courses</h1>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-6 col-xs-12 component-section" data-width="col-md-4 col-sm-6 col-xs-12" data-wrapper="resourceswrapper" data-componentname="Resources" data-componenttype="Mediocre">
            <div class="panel panel-default resources-component">
                <div class="panel-heading">
                    <h3>Heading</h3>
                </div>
                <div class="panel-body">
                    <h1>Resources</h1>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-6 col-xs-12 component-section" data-width="col-md-4 col-sm-6 col-xs-12" data-wrapper="newsandupdateswrapper" data-componentname="NewsAndUpdates" data-componenttype="Simple">
            <div class="panel panel-default news-and-updates-component">
                <div class="panel-heading">
                    <h3>Heading</h3>
                </div>
                <div class="panel-body">
                    <h1>News And Updates</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .margin-top-30 {
        margin-top: 30px;
    }

    .banner-component,
    .important-links-component {
        height: 465px;
    }

    .training-status-component {
        height: 178px;
    }

    .learning-activities-component {
        height: 394px;
    }

    .popular-courses-component,
    .resources-component,
    .news-and-updates-component {
        height: 438px;
    }

    <?php
    $width = ["770", "840", "940", "1140", "1240", "1340", "1440", "1640", "1740", "1840", "1940", "2040"];
    $cal = ["73", "74", "75", "76", "77", "78", "79", "80", "81", "82", "83", "84"];
    foreach ($width as $key => $value) {
        echo "
            @media only screen and (min-device-width : {$value}px) and (max-device-width : {$width[$key + 1]}px){
            #ContenedorCampos {
                    width: {$cal[$key]}% !important;
                }
            }";
    }
    ?>
</style>



<script>
    let div = document.querySelector('#ContenedorCampos');
    div.style.visibility = 'visible';
    let boton = document.querySelector('#ocultar-mostrar');
    boton.addEventListener('click', function(e) {
        if (div.style.visibility === 'visible') {
            div.style.visibility = 'hidden';
        } else {
            div.style.visibility = 'visible';
        }
    }, false);


    function CampoSelecionado(value) {

        // aqui enviamos el mensaje por medio de un arreglo     
        $.ajax({
            type: "POST",
            url: "pruebapacienteajax.php",
            data: {
                valor: value,
            },
            success: function(response) {
                document.getElementById("RespuestaCampo").innerHTML = response;
                // aqui enviamos el mensaje por medio de un arreglo               
            }
        });
    };

    $(document).ready(function() {
        $('.component-container').sortable({
            cursor: 'move',
            placeholder: 'ui-state-highlight',
            start: function(e, ui) {
                ui.placeholder.width(ui.item.find('.panel').width());
                ui.placeholder.height(ui.item.find('.panel').height());
                ui.placeholder.addClass(ui.item.attr("class"));
            }
        });
    });
</script>