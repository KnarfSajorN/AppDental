<?php
include 'header.php';
include 'menu.php';

$clienteId = $_GET['clienteId'];
$usuarioId = $_GET['usuarioId'];

$ID = $_SESSION['ID'];


$conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));


$queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id=$clienteId");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $usuario_id = $rowMotorizado['usuario_id'];
    $nombre_cliente = $rowMotorizado['nombre_cliente'];
    $celular_cliente = $rowMotorizado['celular_cliente'];
    $ciudad_cliente = $rowMotorizado['ciudad_cliente'];
    $correo_cliente = $rowMotorizado['correo_cliente'];
    $CODI_CLIENTE = $rowMotorizado['CODI_CLIENTE'];
    $id_uso_servicio = $rowMotorizado['id_uso_servicio'];
    $tipo_cliente = $rowMotorizado['tipo_cliente'];
    $fechar = $rowMotorizado['fechar'];
    $fecha_actualizado = $rowMotorizado['fecha_actualizado'];
    $activo = $rowMotorizado['activo'];
    $genero = $rowMotorizado['genero'];
    $direccion_cliente = $rowMotorizado['direccion_cliente'];
    $telefono_cliente = $rowMotorizado['telefono_cliente'];
    $edad_cliente = $rowMotorizado['edad_cliente'];
    $profesion_cliente = $rowMotorizado['profesion_cliente'];
    $acompananteFamiliar = $rowMotorizado['acompananteFamiliar'];
    $telefono_acompanante = $rowMotorizado['telefono_acompanante'];
    $antecedentes     = $rowMotorizado['antecedentes'];
    $fotoperfil       = $rowMotorizado['fotoperfil'];
    $tiposSangre      = $rowMotorizado['tiposSangre'];
    $esDonante        = $rowMotorizado['esDonante'];
    $tomaMedicamento  = $rowMotorizado['tomaMedicamento'];

    $fechaNacimiento  = $rowMotorizado['fechaNacimiento'];

    $entidadSalud     = $rowMotorizado['entidadSalud'];
    $seguro           = $rowMotorizado['seguro'];

    $nota           = $rowMotorizado['nota'];
    $enfermedadesPequeno           = $rowMotorizado['enfermedadesPequeno'];
    $alergias           = $rowMotorizado['alergias'];


    $peso           = $rowMotorizado['peso'];
    $altura           = $rowMotorizado['altura'];
    $imc           = $rowMotorizado['imc'];
    $ComposicionCorporal           = $rowMotorizado['ComposicionCorporal'];
    // ----------------------------------------------------------------------------------------------------------------------------


    $ap1            = $rowMotorizado['ap1'];
    $ap2            = $rowMotorizado['ap2'];
    $ap3            = $rowMotorizado['ap3'];
    $ap4            = $rowMotorizado['ap4'];
    $ap5            = $rowMotorizado['ap5'];
    $ap6            = $rowMotorizado['ap6'];
    $ap7            = $rowMotorizado['ap7'];
    $ap8            = $rowMotorizado['ap8'];
    $ap9            = $rowMotorizado['ap9'];

    $cirugiasCuales = $rowMotorizado['cirugiasCuales'];
    $cirugiasOtros  = $rowMotorizado['cirugiasOtros'];
    $whatsapp       = $rowMotorizado['whatsapp'];
    $tipoUsuario    = $rowMotorizado['tipoUsuario'];
    $estado         = $rowMotorizado['estado'];
}


$queryconfig = mysqli_query($conn3, "SELECT * FROM  config where ID=$ID");
$nrowl = mysqli_num_rows($queryconfig);
while ($rowconfig = mysqli_fetch_array($queryconfig)) {
    $cie10 = $rowconfig['cie10'];
    $pro1  = $rowconfig['pro1'];
    $pro2  = $rowconfig['pro2'];
}



?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Consulta médica

        </h1>
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#"> Consulta médica </a></li>


        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">


                <div class="box">

                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="finalizarHistoriaClinica6_fisioterapia.php" method="POST">

                            <div class="col-md-12">









                                <div class="box box-solid">

                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <?php
                                        $queryList = mysqli_query($conn3, "SELECT secuencial_historia FROM historiaClinica6_fisioterapia WHERE cliente_id = '$clienteId' ORDER BY Fecha DESC, Hora DESC limit 1");
                                        $nrowl = mysqli_num_rows($queryList);
                                        while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                            $contador = $rowMotorizado['secuencial_historia'] + 1;
                                            echo '<label>#' . $contador . '</label>';
                                        }

                                        ?>
                                        <div class="box-group" id="accordion1">
                                            <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                                            <div class="panel box box-primary">
                                                <div class="box-header with-border">
                                                    <h4 class="box-title">
                                                        <a data-toggle="collapse" data-parent="#accordion1" href="#collapseOne">
                                                            Datos personales
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapseOne" class="panel-collapse collapse">
                                                    <div class="box-body">






                                                        <?php echo datosPacientes($clienteId); ?>


                                                    </div>
                                                </div>
                                            </div>








                                            <div class="panel box box-danger">

                                                <div class="box-header with-border">
                                                    <h4 class="box-title">
                                                        <a data-toggle="collapse" data-parent="#accordion1" href="#Entrevista">
                                                            I. Entrevista Inicial
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="Entrevista" class="panel-collapse collapse">
                                                    <div class="box-body">
                                                        <div class="form-group col-md-12">
                                                            <select name="tipoConsulta" class="form-control select2" style="width: 100%;">
                                                                <option selected="selected" value="">Seleccione tipo de consulta</option>
                                                                <option>Consulta externa</option>
                                                                <option>Domiciliaria</option>

                                                            </select>
                                                        </div>


                                                        <div class="form-group col-md-12">
                                                            <div align="left">Motivo consulta</div>


                                                            <textarea id="motivoConsulta" name="motivoConsulta" class="textarea" placeholder="Motivo Consulta" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                                        </div>


                                                        <div class="form-group col-md-12">
                                                            <div align="left"> Enfermedad actual</div>

                                                            <textarea id="enfermedadActual" name="enfermedadActual" class="textarea" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>




                                                            <!--iframe id="inlineFrameExample"
frameBorder="0"
width="100%"
height="300"
src="https://medicalsoftplus.com/co118/test3/speechRecognition.php">
</iframe-->




                                                            <!--

                <textarea id="enfermedadActual" name="enfermedadActual"  class="textarea" placeholder="Enfermedad Actual" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>





  <input type="text" name="enfermedadActual"  class="form-control input-lg" id="enfermedadActual"  maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"> -->

                                                        </div>




                                                    </div>
                                                </div>
                                            </div>

                                            <!--         <div class="col-md-12">
                    <div class="box box-solid">
                        
                        <div class="box-body">
                            <div class="box-group" id="accordion">
                               
                                <div class="panel box box-primary">
                                    <div class="box-header with-border">
                                        <h4 class="box-title">
                                            <a data-toggle="collapse" data-parent="#accordion"
                                               href="#collapseO">
                                                I. Antecedentes
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseO" class="panel-collapse collapse in">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="control-label">Diabetes:</label>
                                                <div class="form-group ">
                                                    <input type="text" name="I[]" class="form-control" placeholder="" >
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="control-label"> Hta:</label>
                                                <div class="form-group ">
                                                    <input type="text" name="I[]" class="form-control" placeholder="" >
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="control-label">Cáncer:</label>
                                                <div class="form-group ">
                                                    <input type="text" name="I[]" class="form-control" placeholder="" >
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="control-label">Enf. Reumat:</label>
                                                <div class="form-group">
                                                    <input type="text" name="I[]" class="form-control" placeholder="" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="control-label">Cardiopatías: </label>
                                                <div class="form-group ">
                                                    <input type="text" name="I[]" class="form-control"  placeholder="" >
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="control-label">Cirugías:</label>
                                                <div class="form-group">
                                                    <input type="text" name="I[]" class="form-control" placeholder="" >
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="control-label">Alergias:</label>
                                                <div class="form-group">
                                                    <input type="text" name="I[]" class="form-control" placeholder="" >
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="control-label">Transfusiones: </label>
                                                <div class="form-group">
                                                    <input type="text" name="I[]" class="form-control" placeholder="" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="control-label" >Accidentes: </label>
                                                <div class="form-group">
                                                    <input type="text" name="I[]" class="form-control" placeholder="" >
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="control-label">Fracturas:</label>
                                                <div class="form-group">
                                                    <input type="text" name="I[]" class="form-control" placeholder="" >
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="control-label">Signos Vitales:</label>
                                                <div class="form-group">
                                                    <input type="text" name="I[]" class="form-control" placeholder="" >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                            <div class="panel box box-success">
                                                <div class="box-header with-border">
                                                    <h4 class="box-title">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                                            II. Examen Fisico Postural
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapseTwo" class="panel-collapse collapse">
                                                    <div class="box-body">
                                                        <div class="row">
                                                            <div class="col-sm-6 b-r">
                                                                <h3 class="m-t-none m-b">1. Actitud postural</h3>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>Seleccione actitud postural</label>
                                                                            <select class="form-control select2" style="width: 100%;" name="II_actitud_postural">
                                                                                <option value="Normal">Normal</option>
                                                                                <option value="Alterada">Alterada</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>Detalles</label>

                                                                            <textarea class="textarea" id="II_detalles" name="II_detalles" placeholder="Por favor escriba los detalles aquí" style="width: 100%; height: 200px; font-size: 14px;
                                                                      line-height: 18px; border: 1px solid #dddddd;
                                                                      padding: 10px;">
                                                                </textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <h3 class="m-t-none m-b">2. Evaluación de la piel</h3>
                                                                <div class="row">
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label>Color</label>
                                                                            <br>
                                                                            <input name="II_color" value="Normal" type="radio" class="flat-red">
                                                                            <span>
                                                                                Normal
                                                                            </span>
                                                                            <input name="II_color" value="Erimatosa" type="radio" class="flat-red">
                                                                            <span>
                                                                                Erimatosa
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label>Estado</label>
                                                                            <br>
                                                                            <input name="II_estado" value="Normal" type="radio" class="flat-red">
                                                                            <span>
                                                                                Normal
                                                                            </span>
                                                                            <input name="II_estado" value="Seca" type="radio" class="flat-red">
                                                                            <span>
                                                                                Seca
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label>Edema</label>
                                                                            <br>
                                                                            <input name="II_edema" value="Ninguno" type="radio" class="flat-red">
                                                                            <span>
                                                                                Ninguno
                                                                            </span>
                                                                            <input name="II_edema" value="Leve" type="radio" class="flat-red">
                                                                            <span>
                                                                                Leve
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label>Tumefacción</label>
                                                                            <br>
                                                                            <input name="II_tumefaccion" value="Si" type="radio" class="flat-red">
                                                                            <span>
                                                                                Si
                                                                            </span>
                                                                            <input name="II_tumefaccion" value="No" type="radio" class="flat-red">
                                                                            <span>
                                                                                No
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label>Escaras</label>
                                                                            <br>
                                                                            <input name="II_escaras" value="Si" type="radio" class="flat-red">
                                                                            <span>
                                                                                Si
                                                                            </span>
                                                                            <input name="II_escaras" value="No" type="radio" class="flat-red">
                                                                            <span>
                                                                                No
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label>Heridas</label>
                                                                            <br>
                                                                            <input name="II_heridas" value="Si" type="radio" class="flat-red">
                                                                            <span>
                                                                                Si
                                                                            </span>
                                                                            <input name="II_heridas" value="No" type="radio" class="flat-red">
                                                                            <span>
                                                                                No
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Cicatriz</label>
                                                                            <br>
                                                                            <input name="II_cicatriz" value="Ninguna" type="radio" class="flat-red">
                                                                            <span>
                                                                                Ninguna
                                                                            </span>
                                                                            <input name="II_cicatriz" value="Buen estado" type="radio" class="flat-red">
                                                                            <span>
                                                                                Buen estado
                                                                            </span>
                                                                            <input name="II_cicatriz" value="Adherida" type="radio" class="flat-red">
                                                                            <span>
                                                                                Adherida
                                                                            </span>
                                                                            <input name="II_cicatriz" value="Queloide" type="radio" class="flat-red">
                                                                            <span>
                                                                                Queloide
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel box box-success">
                                                <div class="box-header with-border">
                                                    <h4 class="box-title">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                                            III. Evaluación Del Dolor
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapseThree" class="panel-collapse collapse">
                                                    <div class="box-body">
                                                        <br>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Intensidad</label>
                                                                    <small class="label pull-center bg-green"> Escala visual analógica: Eva</small>




                                                                    <div class="text-center">
                                                                        <canvas width="85" height="85"></canvas>
                                                                        <input type="text" name="III_intensidad" value="0" data-max="10" data-min="0" class="dial m-r" data-fgcolor="#ED5565" data-width="85" data-height="85" data-angleoffset="-125" data-anglearc="250">
                                                                    </div>




                                                                    <small class="help-block m-b-none">Sin dolor es 0, pero dolor posible es 10.</small>
                                                                </div>
                                                                <div class="form-group has-purple">
                                                                    <label>Zona de dolor</label>

                                                                    <textarea class="textarea" id="III_zona_dolor" name="III_zona_dolor" placeholder="Por favor describa la zona de dolor aquí" style="width: 100%; height: 200px; font-size: 14px;
                                                        line-height: 18px; border: 1px solid #dddddd;
                                                        padding: 10px;">
                                                        </textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Presente en (Específicar)</label>
                                                                        <br>
                                                                        <input name="III_presente" value="Palpación" type="radio" class="flat-red">
                                                                        <span>
                                                                            Palpación
                                                                        </span>
                                                                        <input name="III_presente" value="Movilización" type="radio" class="flat-red">
                                                                        <span>
                                                                            Movilización
                                                                        </span>
                                                                        <input name="III_presente" value="Referido" type="radio" class="flat-red">
                                                                        <span>
                                                                            Referido
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Durante</label>
                                                                        <br>
                                                                        <input name="III_durante" value="Reposo" type="radio" class="flat-red">
                                                                        <span>
                                                                            Reposo
                                                                        </span>
                                                                        <input name="III_durante" value="Actividad" type="radio" class="flat-red">
                                                                        <span>
                                                                            Actividad
                                                                        </span>
                                                                        <input name="III_durante" value="Después de actividad" type="radio" class="flat-red">
                                                                        <span>
                                                                            Después de actividad
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel box box-success">
                                                <div class="box-header with-border">
                                                    <h4 class="box-title">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
                                                            IV. Evaluación De La Sensibilidad
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapse4" class="panel-collapse collapse">
                                                    <div class="box-body">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Superficial</label>
                                                                <br>
                                                                <input name="IV_superficial" value="Conservada" type="radio" class="flat-red">
                                                                <span>
                                                                    Conservada
                                                                </span>
                                                                <input name="IV_superficial" value="Alterada" type="radio" class="flat-red">
                                                                <span>
                                                                    Alterada
                                                                </span>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Detalles</label>

                                                                <div class="form-group has-success">
                                                                    <textarea class="textarea" id="IV_detalles_superficial" name="IV_detalles_superficial" placeholder="Por favor describa los detalles aquí" style="width: 100%; height: 200px; font-size: 14px;
                                                              line-height: 18px; border: 1px solid #dddddd;
                                                              padding: 10px;">
                                                        </textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Profunda</label>
                                                                <br>
                                                                <input name="IV_profunda" value="Conservada" type="radio" class="flat-red">
                                                                <span>
                                                                    Conservada
                                                                </span>
                                                                <input name="IV_profunda" value="Alterada" type="radio" class="flat-red">
                                                                <span>
                                                                    Alterada
                                                                </span>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Detalles</label>

                                                                <div class="form-group has-success">
                                                                    <textarea class="textarea" id="IV_detalles_profunda" name="IV_detalles_profunda" placeholder="Por favor describa los detalles aquí" style="width: 100%; height: 200px; font-size: 14px;
                                                              line-height: 18px; border: 1px solid #dddddd;
                                                              padding: 10px;">
                                                        </textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--      <div class="panel box box-success">
                                    <div class="box-header with-border">
                                        <h4 class="box-title">
                                            <a data-toggle="collapse" data-parent="#accordion"
                                               href="#collapse5">
                                                V. Evaluación Osteoarticular
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse5" class="panel-collapse collapse">
                                        <div class="box-body">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Estado articular</label>
                                                    <br>
                                                    <input name="V_estado_articular" value="Normal" type="radio" class="flat-red" >
                                                    <span>
                                                        Normal
                                                    </span>
                                                    <input name="V_estado_articular" value="Rigidez" type="radio" class="flat-red" >
                                                    <span>
                                                        Rigidez
                                                    </span>
                                                    <input name="V_estado_articular" value="Hipo movilidad" type="radio" class="flat-red" >
                                                    <span>
                                                        Hipo movilidad
                                                    </span>
                                                    <input name="V_estado_articular" value="Hipermovilidad" type="radio" class="flat-red" >
                                                    <span>
                                                        Hipermovilidad
                                                    </span>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Detalles</label>
                                                    <div class="form-group has-success">
                                                        <textarea class="textarea" name="V_detalles_estado_articular" placeholder="Por favor describa el detalle aquí" style="width: 100%; height: 200px; font-size: 14px;
                                                              line-height: 18px; border: 1px solid #dddddd;
                                                              padding: 10px;">
                                                        </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Amplitud articular</label>
                                                    <br>
                                                    <input name="V_amplitud_articular" value="Normal" type="radio" class="flat-red" >
                                                    <span>
                                                    Normal
                                                </span>
                                                    <input name="V_amplitud_articular" value="Alterada" type="radio" class="flat-red" >
                                                    <span>
                                                    Alterada
                                                </span>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Detalles</label>
                                                    <div class="form-group has-success">
                                                    <textarea class="textarea" name="V_detalles_amplitud_articular" placeholder="Por favor describa el detalle aquí" style="width: 100%; height: 200px; font-size: 14px;
                                                          line-height: 18px; border: 1px solid #dddddd;
                                                          padding: 10px;">
                                                    </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                            <div class="panel box box-success">
                                                <div class="box-header with-border">
                                                    <h4 class="box-title">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse6">
                                                            V. Evaluación Neuromuscular
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapse6" class="panel-collapse collapse">
                                                    <div class="box-body">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Tono</label>
                                                                <br>
                                                                <input name="VI_tono" value="Hipotónico" type="radio" class="flat-red">
                                                                <span>
                                                                    Hipotónico
                                                                </span>
                                                                <input name="VI_tono" value="Normal" type="radio" class="flat-red">
                                                                <span>
                                                                    Normal
                                                                </span>
                                                                <input name="VI_tono" value="Hipertónico" type="radio" class="flat-red">
                                                                <span>
                                                                    Hipertónico
                                                                </span>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Especificar</label>

                                                                <div class="form-group has-success">
                                                                    <textarea class="textarea" id="VI_especificar_tono" name="VI_especificar_tono" placeholder="Por favor especifique aquí" style="width: 100%; height: 200px; font-size: 14px;
                                                              line-height: 18px; border: 1px solid #dddddd;
                                                              padding: 10px;">
                                                        </textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Trofismo</label>
                                                                <br>
                                                                <input name="VI_trofismo" value="Hipotrofia" type="radio" class="flat-red">
                                                                <span>
                                                                    Hipotrofia
                                                                </span>
                                                                <input name="VI_trofismo" value="Normal" type="radio" class="flat-red">
                                                                <span>
                                                                    Normal
                                                                </span>
                                                                <input name="VI_trofismo" value="Hipertrofia" type="radio" class="flat-red">
                                                                <span>
                                                                    Hipertrofia
                                                                </span>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Especificar</label>
                                                                <div class="form-group has-success">
                                                                    <textarea class="textarea" id="VI_especificar_trofismo" name="VI_especificar_trofismo" placeholder="Por favor especifique aquí" style="width: 100%; height: 200px; font-size: 14px;
                                                              line-height: 18px; border: 1px solid #dddddd;
                                                              padding: 10px;">
                                                        </textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Elasticidad</label>
                                                                <br>
                                                                <input name="VI_elasticidad" value="Normal" type="radio" class="flat-red">
                                                                <span>
                                                                    Normal
                                                                </span>
                                                                <input name="VI_elasticidad" value="Contacturado" type="radio" class="flat-red">
                                                                <span>
                                                                    Contacturado
                                                                </span>
                                                                <input name="VI_elasticidad" value="Acortado" type="radio" class="flat-red">
                                                                <span>
                                                                    Acortado
                                                                </span>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Especificar</label>
                                                                <div class="form-group has-success">

                                                                    <textarea class="textarea" id="VI_especificar_elastisidad" name="VI_especificar_elastisidad" placeholder="Por favor especifique aquí" style="width: 100%; height: 200px; font-size: 14px;
                                                              line-height: 18px; border: 1px solid #dddddd;
                                                              padding: 10px;">
                                                        </textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Fuerza</label>
                                                                <br>
                                                                <input name="VI_fuerza" value="Normal" type="radio" class="flat-red">
                                                                <span>
                                                                    Normal
                                                                </span>
                                                                <input name="VI_fuerza" value="Alterada" type="radio" class="flat-red">
                                                                <span>
                                                                    Alterada
                                                                </span>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Especificar</label>

                                                                <div class="form-group has-success">
                                                                    <textarea class="textarea" id="VI_especificar_fuerza" name="VI_especificar_fuerza" placeholder="Por favor especifique aquí" style="width: 100%; height: 200px; font-size: 14px;
                                                              line-height: 18px; border: 1px solid #dddddd;
                                                              padding: 10px;">
                                                        </textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <!--        <div class="col-md-12">
                                                <h4>Evaluación muscular</h4>
                                                <div class="box box-default box-solid collapsed-box">
                                                    <div class="box-header with-border">
                                                        <p class="box-title">La fuerza del paciente está graduada en una escala
                                                            de 0-5.</p>
                                                        <div class="box-tools pull-right">
                                                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="box-body" style="display: none;">
                                                        <div class="col-md-12">
                                                            <label>
                                                                <p> Grado 5:&nbsp; Fuerza muscular normal contra
                                                                    resistencia completa.</p>
                                                            </label>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label>
                                                                <p> Grado 4:&nbsp; La fuerza muscular está
                                                                    reducida pero la contracción muscular puede
                                                                    realizar un movimiento articular contra
                                                                    resistencia. </p>
                                                            </label>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label>
                                                                <p> Grado 3:&nbsp; La fuerza muscular está
                                                                    reducida tanto que el movimiento articular
                                                                    solo puede realizarse contra la gravedad,
                                                                    sin la resistencia del examinador. Por
                                                                    ejemplo, la articulación del codo puede
                                                                    moverse desde extensión completa hasta
                                                                    flexión completa, comenzando con el brazo
                                                                    suspendido al lado del cuerpo. </p>
                                                            </label>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label>
                                                                <p> Grado 2:&nbsp; Movimiento activo que no
                                                                    puede vencer la fuerza de gravedad. Por
                                                                    ejemplo, el codo puede flexionarse
                                                                    completamente solo cuando el brazo es
                                                                    mantenido en un plano horizontal. </p>
                                                            </label>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label>
                                                                <p> Grado 1:&nbsp; Esbozo de contracción
                                                                    muscular. </p>
                                                            </label>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label>
                                                                <p> Grado 0:&nbsp; Ausencia de contracción
                                                                    muscular. </p>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>  -->


                                                        <?php /*?>
                                            <div class="col-md-12">
                                                <table width="100%">
                                                    <tr>
                                                        <td></td>
                                                        <td colspan="2" align="center" style="background-color: #374850;    padding: 10px!important;color: white;">
                                                            Evaluación 1 fecha
                                                        </td>
                                                        <td></td>
                                                        <td colspan="2" align="center" style="background-color: #374850;    padding: 10px!important;color: white;">
                                                            Evaluación 2 fecha
                                                        </td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td align="center" style="background-color: #3c8dbc;    padding: 10px!important;color: white;">
                                                            Izquierda
                                                        </td>
                                                        <td align="center" style="background-color: #3c8dbc;    padding: 10px!important;color: white;">
                                                            Derecha
                                                        </td>
                                                        <td></td>
                                                        <td align="center" style="background-color: #3c8dbc;    padding: 10px!important;color: white;">
                                                            Izquierda
                                                        </td>
                                                        <td align="center" style="background-color: #3c8dbc;    padding: 10px!important;color: white;">
                                                            Derecha
                                                        </td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="120" align="center" class="strong">
                                                            <strong>M. Sup</strong>
                                                        </td>
                                                        <td class="border-right">
                                                            <canvas width="85" height="85"></canvas>
                                                            <input type="text" name="VI_em[]" value="0" data-max="5" data-min="0" class="dial m-r" data-fgcolor="#00a65a" data-width="85" data-height="85" data-angleoffset="-125" data-anglearc="250" >
                                                        </td>
                                                        <td class="border-right">
                                                            <canvas width="85" height="85"></canvas>
                                                            <input type="text" name="VI_em[]" value="0" data-max="5" data-min="0" class="dial m-r" data-fgcolor="#00a65a" data-width="85" data-height="85" data-angleoffset="-125" data-anglearc="250" >
                                                        </td>
                                                        <td align="center" style="width: 10px">
                                                            &nbsp;
                                                        </td>
                                                        <td class="border-right border-left">
                                                            <canvas width="85" height="85"></canvas>
                                                            <input type="text" name="VI_em[]" value="0" data-max="5" data-min="0" class="dial m-r" data-fgcolor="#00a65a" data-width="85" data-height="85" data-angleoffset="-125" data-anglearc="250" >
                                                        </td>
                                                        <td class="border-right">
                                                            <canvas width="85" height="85"></canvas>
                                                            <input type="text" name="VI_em[]" value="0" data-max="5" data-min="0" class="dial m-r" data-fgcolor="#00a65a" data-width="85" data-height="85" data-angleoffset="-125" data-anglearc="250" >
                                                        </td>
                                                        <td width="120" align="center" class="strong">
                                                            <strong>M. Sup</strong>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="120" align="center" class="strong">
                                                            <strong>M. Inf</strong>
                                                        </td>
                                                        <td class="border-right">
                                                            <canvas width="85" height="85"></canvas>
                                                            <input type="text" name="VI_em[]" value="0" data-max="5" data-min="0" class="dial m-r" data-fgcolor="#00a65a" data-width="85" data-height="85" data-angleoffset="-125" data-anglearc="250" >
                                                        </td>
                                                        <td class="border-right">
                                                            <canvas width="85" height="85"></canvas>
                                                            <input type="text" name="VI_em[]" value="0" data-max="5" data-min="0" class="dial m-r" data-fgcolor="#00a65a" data-width="85" data-height="85" data-angleoffset="-125" data-anglearc="250" >
                                                        </td>
                                                        <td align="center" style="width: 10px">
                                                            &nbsp;
                                                        </td>
                                                        <td class="border-right border-left">
                                                            <canvas width="85" height="85"></canvas>
                                                            <input type="text" name="VI_em[]" value="0" data-max="5" data-min="0" class="dial m-r" data-fgcolor="#00a65a" data-width="85" data-height="85" data-angleoffset="-125" data-anglearc="250" >
                                                        </td>
                                                        <td class="border-right">
                                                            <canvas width="85" height="85"></canvas>
                                                            <input type="text" name="VI_em[]" value="0" data-max="5" data-min="0" class="dial m-r" data-fgcolor="#00a65a" data-width="85" data-height="85" data-angleoffset="-125" data-anglearc="250" >
                                                        </td>
                                                        <td width="120" align="center" class="strong">
                                                            <strong>M. Inf</strong>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="120" align="center" class="strong">
                                                            <strong>Tronco</strong>
                                                        </td>
                                                        <td class="border-right">
                                                            <canvas width="85" height="85"></canvas>
                                                            <input type="text" name="VI_em[]" value="0" data-max="5" data-min="0" class="dial m-r" data-fgcolor="#00a65a" data-width="85" data-height="85" data-angleoffset="-125" data-anglearc="250" >
                                                        </td>
                                                        <td class="border-right">
                                                            <canvas width="85" height="85"></canvas>
                                                            <input type="text" name="VI_em[]" value="0" data-max="5" data-min="0" class="dial m-r" data-fgcolor="#00a65a" data-width="85" data-height="85" data-angleoffset="-125" data-anglearc="250" >
                                                        </td>
                                                        <td align="center" style="width: 10px">
                                                            &nbsp;
                                                        </td>
                                                        <td class="border-right border-left">
                                                            <canvas width="85" height="85"></canvas>
                                                            <input type="text" name="VI_em[]" value="0" data-max="5" data-min="0" class="dial m-r" data-fgcolor="#00a65a" data-width="85" data-height="85" data-angleoffset="-125" data-anglearc="250" >
                                                        </td>
                                                        <td class="border-right">
                                                            <canvas width="85" height="85"></canvas>
                                                            <input type="text" name="VI_em[]" value="0" data-max="5" data-min="0" class="dial m-r" data-fgcolor="#00a65a" data-width="85" data-height="85" data-angleoffset="-125" data-anglearc="250" >
                                                        </td>
                                                        <td width="120" align="center" class="strong">
                                                            <strong>Tronco</strong>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="120" align="center" class="strong">
                                                            <strong>Cuello</strong>
                                                        </td>
                                                        <td class="border-right">
                                                            <canvas width="85" height="85"></canvas>
                                                            <input type="text" name="VI_em[]" value="0" data-max="5" data-min="0" class="dial m-r" data-fgcolor="#00a65a" data-width="85" data-height="85" data-angleoffset="-125" data-anglearc="250" >
                                                        </td>
                                                        <td class="border-right">
                                                            <canvas width="85" height="85"></canvas>
                                                            <input type="text" name="VI_em[]" value="0" data-max="5" data-min="0" class="dial m-r" data-fgcolor="#00a65a" data-width="85" data-height="85" data-angleoffset="-125" data-anglearc="250" >
                                                        </td>
                                                        <td align="center" style="width: 10px">
                                                            &nbsp;
                                                        </td>
                                                        <td class="border-right border-left">
                                                            <canvas width="85" height="85"></canvas>
                                                            <input type="text" name="VI_em[]" value="0" data-max="5" data-min="0" class="dial m-r" data-fgcolor="#00a65a" data-width="85" data-height="85" data-angleoffset="-125" data-anglearc="250" >
                                                        </td>
                                                        <td class="border-right">
                                                            <canvas width="85" height="85"></canvas>
                                                            <input type="text" name="VI_em[]" value="0" data-max="5" data-min="0" class="dial m-r" data-fgcolor="#00a65a" data-width="85" data-height="85" data-angleoffset="-125" data-anglearc="250" >
                                                        </td>
                                                        <td width="120" align="center" class="strong">
                                                            <strong>Cuello</strong>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <?php */ ?>


                                                        <br>
                                                        &nbsp;
                                                        <h4> Goniometría Movimiento Articular </h4>
                                                        <div class="col-md-12">

                                                            <div class="form-group">

                                                                <label>

                                                                </label>
                                                                <textarea class="textarea" id="VI_diagnostico" name="VI_diagnostico" placeholder="Por favor escriba el comentario aquí" style="width: 100%; height: 200px; font-size: 14px;
                                                          line-height: 18px; border: 1px solid #dddddd;
                                                          padding: 10px;">
                                                    </textarea>
                                                            </div>
                                                        </div>
                                                        <hr class="col-md-12" style="opacity: 0;">
                                                        <style type="text/css">
                                                            .strong {
                                                                color: #ffffff;
                                                                background-color: #3c8dbc;
                                                                padding: 10px;
                                                                font-size: 14px;
                                                            }

                                                            .inputs {
                                                                padding: 5px;
                                                                background-color: #dcf9f6;

                                                            }
                                                        </style>
                                                        <!--<div class="col-md-12">
                                                <table width="100%">
                                                    <tr>
                                                        <td></td>
                                                        <td colspan="2" align="center" style="background-color: #374850; padding: 10px!important;color: white;">
                                                            Derecho
                                                        </td>
                                                        <td></td>
                                                        <td colspan="2" align="center" style="background-color: #374850;    padding: 10px!important;color: white;">
                                                            Izquierdo
                                                        </td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td align="center" style="background-color: #3c8dbc;    padding: 10px!important;color: white;">
                                                            Fecha 1
                                                        </td>
                                                        <td align="center" style="background-color: #3c8dbc;    padding: 10px!important;color: white;">
                                                            Fecha 2
                                                        </td>
                                                        <td></td>
                                                        <td align="center" style="background-color: #3c8dbc;    padding: 10px!important;color: white;">
                                                            Fecha 1
                                                        </td>
                                                        <td align="center" style="background-color: #3c8dbc;    padding: 10px!important;color: white;">
                                                            Fecha 2
                                                        </td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td rowspan="6" width="120" align="center"
                                                            class="strong"><strong>Hombro</strong>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">FLEXION 0°
                                                            - 180°
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td rowspan="6" width="120" align="center"
                                                            class="strong"><strong>Hombro</strong>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">EXTENSION
                                                            0° - 50°-60°
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">ABDUCCION
                                                            0° - 180°
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">ADD HORIZ.
                                                            0° - 120°
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">ROT INT.
                                                            0° - 70°
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">ROT. EXT.
                                                            0° - 90°
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td colspan="7" width="120" align="center" class="strong">
                                                        </td>
                                                    </tr>

                                                    <!-- Codo y antebrazo-->

                                                        <!--<tr>
                                                        <td rowspan="4" width="120" align="center"
                                                            class="strong"><strong>Codo y
                                                            Antebrazo</strong></td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">FLEXIÓN 0°
                                                            - 145° 150°
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td rowspan="4" width="120" align="center"
                                                            class="strong"><strong>Codo y
                                                            Antebrazo</strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">EXTENSIÓN
                                                            145° - 0°
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">PRONACIÓN
                                                            0° - 90°
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">SUPINACIÓN
                                                            0° - 90°
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td colspan="7" width="120" align="center" class="strong">
                                                        </td>
                                                    </tr>
                                                    <!-- Muñeca-->

                                                        <!--<tr>
                                                        <td rowspan="4" width="120" align="center"
                                                            class="strong"><strong>Muñeca</strong>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">FLEXIÓN 0°
                                                            - 90°
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td rowspan="4" width="120" align="center"
                                                            class="strong"><strong>Muñeca</strong>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">EXTENSIÓN.
                                                            0° - 70°
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">DESV. RAD
                                                            0° - 25° 30°
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">DESV. CUB.
                                                            . 0° - 30°
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td colspan="7" width="120" align="center" class="strong">
                                                        </td>
                                                    </tr>
                                                    <!-- 1 dedo de la mano-->

                                                        <!-- <tr>
                                                        <td rowspan="3" width="120" align="center"
                                                            class="strong"><strong>1 Dedo de la
                                                            Mano</strong></td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">FLEX IF 0°
                                                            - 80°
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td rowspan="3" width="120" align="center"
                                                            class="strong"><strong>1 Dedo de la
                                                            Mano</strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">FLEX MCF
                                                            0° - 50°
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">ABD 0° -
                                                            60°
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td colspan="7" width="120" align="center" class="strong">
                                                        </td>
                                                    </tr>

                                                    <!-- Cadera-->

                                                        <!-- <tr>
                                                        <td rowspan="7" width="120" align="center"
                                                            class="strong"><strong>Cadera</strong>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">FLEX C/
                                                            RODILLA FLEX 0° - 125°
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td rowspan="7" width="120" align="center"
                                                            class="strong"><strong>Cadera</strong>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">EXT CON
                                                            RODILLA EXT 0° - 15º
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">EXT CON
                                                            RODILLA FLEX 0° - 10º
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">ABDUCCIÓN
                                                            0°-45°
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">ADDUCIÓN
                                                            0°-20°-30°
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">ROT. INT.
                                                            0°-30°-45°
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">ROT .EXT.
                                                            0°-30°-45°
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="7" width="120" align="center" class="strong">
                                                        </td>
                                                    </tr>
                                                    <!-- Rodilla-->

                                                        <!--<tr>
                                                        <td rowspan="2" width="120" align="center"
                                                            class="strong"><strong>Rodilla</strong>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">FLEXIÓN
                                                            0°-140°
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td rowspan="2" width="120" align="center"
                                                            class="strong"><strong>Rodilla</strong>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">EXTENSIÓN
                                                            140°-0°
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td colspan="7" width="120" align="center" class="strong">
                                                        </td>
                                                    </tr>
                                                    <!-- Tobillo y Pie-->

                                                        <!--<tr>
                                                        <td rowspan="4" width="120" align="center"
                                                            class="strong"><strong>Tobillo y
                                                            Pie</strong></td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            DORSIFLEXIÓN 0°-20°
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td rowspan="4" width="120" align="center"
                                                            class="strong"><strong>Tobillo y
                                                            Pie</strong></td>
                                                    </tr>

                                                    <tr>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">FLEX
                                                            PLANTAR 0°-45°
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">INVERSIÓN
                                                            0°-30°
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">EVERSIÓN
                                                            0°-25°
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td colspan="7" width="120" align="center" class="strong">
                                                        </td>
                                                    </tr>
                                                    <!-- Columna Cervical-->

                                                        <!-- <tr>
                                                        <td rowspan="4" width="120" align="center"
                                                            class="strong"><strong>Columna
                                                            Cervical</strong></td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">FLEXIÓN
                                                            0°-45°
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td rowspan="4" width="120" align="center"
                                                            class="strong"><strong>Columna
                                                            Cervical</strong></td>
                                                    </tr>

                                                    <tr>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">EXTENSIÓN
                                                            0°-45°
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            LATERALIZACIÓN 0°-45-60°
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">ROTACIÓN
                                                            0°-60-70°
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td colspan="7" width="120" align="center" class="strong">
                                                        </td>
                                                    </tr>
                                                    <!-- Tronco-->

                                                        <!--<tr>
                                                        <td rowspan="4" width="120" align="center"
                                                            class="strong"><strong>Tronco</strong>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">FLEXIÓN
                                                            0°-80°
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td rowspan="4" width="120" align="center"
                                                            class="strong"><strong>Tronco</strong>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">EXTENSIÓN
                                                            0°-30°
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            LATERALIZACIÓN 0°-20°
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">ROTACIÓN
                                                            0°-45°
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[]" class="form-control" placeholder="" >
                                                        </td>
                                                    </tr>
                                                </table>-->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <?php /*?>
                                <div class="panel box box-success">
                                    <div class="box-header with-border">
                                        <h4 class="box-title">
                                            <a data-toggle="collapse" data-parent="#accordion"
                                               href="#collapse7">
                                                VII. Evaluación de la marcha y equilibrio
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse7" class="panel-collapse collapse">
                                        <div class="box-body">
                                            <h4> Realice las Observaciones correspondientes según la
                                                escala de valoración de marcha y equilibrio
                                                (Tinetti) 
                                            </h4>
                                            <div class="col-md-12">
                                                <div class="form-group has-purple">
                                                    <label>Observaciones</label>
                                                    <textarea class="textarea" name="VII_Observaciones" placeholder="Por favor describa las observaciones aquí" style="width: 100%; height: 200px; font-size: 14px;
                                                    line-height: 18px; border: 1px solid #dddddd;
                                                    padding: 10px;"  >
                                                    </textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php */ ?>


                                        <?php /*?>
                                <div class="panel box box-success">
                                    <div class="box-header with-border">
                                        <h4 class="box-title">
                                            <a data-toggle="collapse" data-parent="#accordion"
                                               href="#collapse8">
                                                VII. Actividad Motora Funcional
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse8" class="panel-collapse collapse">
                                        <div class="box-body">

                                            <div class="form-group col-md-12">
                              


                             <!-- <div align="right">
                              <a onclick="procesar()" id="procesar"><i title='Iniciar Grabación' style='font-size: 18px;' class='fa fa-fw fa-microphone'></i></a>
                              </div>-->


                              <textarea  id="actividad_motora" name="actividad_motora"  class="textarea" placeholder="Actividad Motora Funcional" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>
                            </div>
                                            <!--<h4>Traslados (Neuromotricidad) </h4>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Dcs-Dcp</label>
                                                    <br>
                                                    <input name="VIII_dcs_dcp" value="Si" type="radio" class="flat-red">
                                                    <span>
                                                        Si
                                                    </span>
                                                    <input name="VIII_dcs_dcp" value="No" type="radio" class="flat-red">
                                                    <span>
                                                        No
                                                    </span>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Descripción</label>
                                                    <div class="form-group has-success">
                                                        <textarea class="textarea" name="VIII_descripcion_dcs_dcp" placeholder="Por favor escriba el comentario aquí" style="width: 100%; height: 200px; font-size: 14px;
                                                                          line-height: 18px; border: 1px solid #dddddd;
                                                                          padding: 10px;">
                                                        </textarea>
                                                    </div>
                                                </div>
                                            </div>                        
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>4ptos-Rod:</label>
                                                    <br>
                                                    <input name="VIII_4ptos_Rod" value="Si" type="radio" class="flat-red">
                                                    <span>
                                                        Si
                                                    </span>
                                                    <input name="VIII_4ptos_Rod" value="No" type="radio" class="flat-red">
                                                    <span>
                                                        No
                                                    </span>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Descripción</label>
                                                    <div class="form-group has-success">
                                                        <textarea class="textarea" name="VIII_descripcion_4ptos_Rod" placeholder="Por favor escriba el comentario aquí" style="width: 100%; height: 200px; font-size: 14px;
                                                                          line-height: 18px; border: 1px solid #dddddd;
                                                                          padding: 10px;" >
                                                        </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Dcp-Dcl:</label>
                                                    <br>
                                                    <input name="VIII_dcp_dcl" value="Si" type="radio" class="flat-red">
                                                    <span>
                                                        Si
                                                    </span>
                                                    <input name="VIII_dcp_dcl" value="No" type="radio" class="flat-red">
                                                    <span>
                                                        No
                                                    </span>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Descripción</label>
                                                    <div class="form-group has-success">
                                                        <textarea class="textarea" name="VIII_descripcion_dcp_dcl" placeholder="Por favor escriba el comentario aquí" style="width: 100%; height: 200px; font-size: 14px;
                                                                          line-height: 18px; border: 1px solid #dddddd;
                                                                          padding: 10px;">
                                                        </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Rod-Marat:</label>
                                                    <br>
                                                    <input name="VIII_rod_marat" value="Si" type="radio" class="flat-red">
                                                    <span>
                                                        Si
                                                    </span>
                                                    <input name="VIII_rod_marat" value="No" type="radio" class="flat-red">
                                                    <span>
                                                        No
                                                    </span>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Descripción</label>
                                                    <div class="form-group has-success">
                                                        <textarea class="textarea" name="VIII_descripcion_rod_marat" placeholder="Por favor escriba el comentario aquí" style="width: 100%; height: 200px; font-size: 14px;
                                                                          line-height: 18px; border: 1px solid #dddddd;
                                                                          padding: 10px;">
                                                        </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Dcs-Sdt:</label>
                                                    <br>
                                                    <input name="VIII_dcs_sdt" value="Si" type="radio" class="flat-red">
                                                    <span>
                                                        Si
                                                    </span>
                                                    <input name="VIII_dcs_sdt" value="No" type="radio" class="flat-red">
                                                    <span>
                                                        No
                                                    </span>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Descripción</label>
                                                    <div class="form-group has-success">
                                                        <textarea class="textarea" name="VIII_descripcion_dcs_sdt" placeholder="Por favor escriba el comentario aquí" style="width: 100%; height: 200px; font-size: 14px;
                                                              line-height: 18px; border: 1px solid #dddddd;
                                                              padding: 10px;">
                                                        </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Marat-Bip:</label>
                                                    <br>
                                                    <input name="VIII_marat_bip" value="Si" type="radio" class="flat-red">
                                                    <span>
                                                        Si
                                                    </span>
                                                    <input name="VIII_marat_bip" value="No" type="radio" class="flat-red">
                                                    <span>
                                                        No
                                                    </span>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Descripción</label>
                                                    <div class="form-group has-success">
                                                        <textarea class="textarea" name="VIII_descripcion_marat_bip" placeholder="Por favor escriba el comentario aquí" style="width: 100%; height: 200px; font-size: 14px;
                                                                          line-height: 18px; border: 1px solid #dddddd;
                                                                          padding: 10px;">
                                                        </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Dcp-4ptos:</label>
                                                    <br>
                                                    <input name="VIII_dcp_4ptos" value="Si" type="radio" class="flat-red">
                                                    <span>
                                                        Si
                                                    </span>
                                                    <input name="VIII_dcp_4ptos" value="No" type="radio" class="flat-red">
                                                    <span>
                                                        No
                                                    </span>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Descripción</label>
                                                    <div class="form-group has-success">
                                                        <textarea class="textarea" name="VIII_descripcion_dcp_4ptos" placeholder="Por favor escriba el comentario aquí" style="width: 100%; height: 200px; font-size: 14px;
                                                                          line-height: 18px; border: 1px solid #dddddd;
                                                                          padding: 10px;">
                                                        </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Sdt-Bip:</label>
                                                    <br>
                                                    <input name="VIII_sdt_bip" value="Si" type="radio" class="flat-red">
                                                    <span>
                                                        Si
                                                    </span>
                                                    <input name="VIII_sdt_bip" value="No" type="radio" class="flat-red">
                                                    <span>
                                                        No
                                                    </span>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Descripción</label>
                                                    <div class="form-group has-success">
                                                        <textarea class="textarea" name="VIII_descripcion_sdt_bip" placeholder="Por favor escriba el comentario aquí" style="width: 100%; height: 200px; font-size: 14px;
                                                                          line-height: 18px; border: 1px solid #dddddd;
                                                                          padding: 10px;">
                                                        </textarea>
                                                    </div>
                                                </div>
                                            </div>-->
                                        </div>
                                    </div>
                                </div>
                                <?php */ ?>



                                        <div class="panel box box-success">
                                            <div class="box-header with-border">
                                                <h4 class="box-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse7">
                                                        VI. Analisis y plan de tratamiento
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapse7" class="panel-collapse collapse">
                                                <div class="box-body">
                                                    <div class="form-group col-md-12">


                                                        <!-- <div align="right">
                              <a onclick="procesar()" id="procesar"><i title='Iniciar Grabación' style='font-size: 18px;' class='fa fa-fw fa-microphone'></i></a>
                              </div>-->


                                                        <textarea id="analisis_tratamiento" name="analisis_tratamiento" class="textarea" placeholder="Análisis y plan de tratamiento" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>




                                        <div class="panel box box-success">
                                            <div class="box-header with-border">
                                                <h4 class="box-title">
                                                    <a data-toggle="collapse" data-parent="#accordion1" href="#collapse8">
                                                        VII.Diágnostico (CIE10)
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapse8" class="panel-collapse collapse">
                                                <div class="box-body">

                                                    <!--
                                                        
                                                        <div class="box-body pad">
                                                          <textarea id="tratamiento" name="diagnosticoMsalud" class="textarea" placeholder="Diagnostico ministerio de Salud" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                                        </div>

                                                      -->


                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Finalidad de la consulta</label>
                                                            <select class="form-control Finalidad" name="Finalidad" id="Finalidad">
                                                                <option value=" "> Seleccione...</option>
                                                                <option value="01 = Atención del parto  (puerperio)">01 = Atención del parto (puerperio)</option>
                                                                <option value="02 = Atención del recién nacido">02 = Atención del recién nacido</option>
                                                                <option value="03 = Atención en planificación  familiar ">03 = Atención en planificación familiar </option>
                                                                <option value="04 = Detección de alteraciones  De crecimiento y desarrollo  Del menor de diez años">04 = Detección de alteraciones De crecimiento y desarrollo Del menor de diez años</option>
                                                                <option value="05 = Detección de alteración del  desarrollo joven">05 = Detección de alteración del desarrollo joven</option>
                                                                <option value="06 = Detección de alteraciones del embarazo">06 = Detección de alteraciones del embarazo</option>
                                                                <option value="07 = Detección de alteraciones del adulto">07 = Detección de alteraciones del adulto</option>
                                                                <option value=" 08 =  Detección de alteraciones de  agudeza visual"> 08 = Detección de alteraciones de agudeza visual</option>
                                                                <option value="09 = Detección de enfermedad Profesional">09 = Detección de enfermedad Profesional</option>
                                                                <option value="10 = No aplica">10 = No aplica</option>


                                                            </select>
                                                        </div>
                                                    </div>






                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Causa Externa</label>
                                                            <select class="form-control Externa" name="Externa" id="Externa">

                                                                <option value=" "> Seleccione...</option>
                                                                <option value="01 = Accidente de trabajo"> 01 = Accidente de trabajo </option>
                                                                <option value="02 = Accidente de tránsito"> 02 = Accidente de tránsito </option>
                                                                <option value="03 = Accidente rábico"> 03 = Accidente rábico </option>
                                                                <option value="04 = Accidente ofídico"> 04 = Accidente ofídico </option>
                                                                <option value="05 = Otro tipo de accidente"> 05 = Otro tipo de accidente </option>
                                                                <option value="06 = Evento catastrófico"> 06 = Evento catastrófico </option>
                                                                <option value="07 = Lesión por agresión"> 07 = Lesión por agresión </option>
                                                                <option value="08 = Lesión auto infligida"> 08 = Lesión auto infligida </option>
                                                                <option value="09 = Sospecha de maltrato físico"> 09 = Sospecha de maltrato físico </option>
                                                                <option value="10 = Sospecha de abuso sexual"> 10 = Sospecha de abuso sexual </option>
                                                                <option value="11 = Sospecha de violencia sexual"> 11 = Sospecha de violencia sexual </option>
                                                                <option value="12 = Sospecha de maltrato emocional"> 12 = Sospecha de maltrato emocional </option>
                                                                <option value="13 = Enfermedad general"> 13 = Enfermedad general </option>
                                                                <option value="14 = Enfermedad profesional"> 14 = Enfermedad profesional </option>
                                                                <option value="15 = Otra"> 15 = Otra </option>



                                                            </select>
                                                        </div>
                                                    </div>





                                                    <div class="col-md-12">
                                                        <div class="form-group has-#00a65a">
                                                            <label>Diagnóstico Cie10</label>
                                                        </div>
                                                    </div>





                                                    <!-- Funcionando CIE10 -->
                                                    <div class="form-group col-md-12">
                                                        CIE-10 (Introduzca una palabra clave para busqueda rápido del diagnóstico)



                                                        <div class="col-md-12" align="left">
                                                            <div class="col-md-12" align="center">
                                                                CIE-10 DEL DIÁGNOSTICO PRINCIPAL
                                                                <br>
                                                            </div>

                                                            <div class="col-md-3">
                                                                <br>
                                                                <input type="text" id="clienteId" onChange="verlista();" placeholder="Buscar CIE10">

                                                                <input type="hidden" id="name1" value="select1">

                                                            </div>
                                                            <div id="div-results1" class="col-md-9">

                                                            </div>
                                                        </div>

                                                        <br>


                                                        <div class="col-md-12" align="left">
                                                            <div class="col-md-12" align="center">

                                                                CÓDIGO DEL DIÁGNOSTICO RELACIONADO 1
                                                                <br>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <br>
                                                                <input type="text" id="clienteId2" onChange="verlista2();" placeholder="Buscar CIE10">

                                                                <input type="hidden" id="name2" value="select2">

                                                            </div>
                                                            <div id="div-results2" class="col-md-9">



                                                            </div>
                                                        </div>




                                                        <div class="col-md-12" align="left">
                                                            <div class="col-md-12" align="center">

                                                                CÓDIGO DEL DIÁGNOSTICO RELACIONADO 2
                                                                <br>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <br>
                                                                <input type="text" id="clienteId3" onChange="verlista3();" placeholder="Buscar CIE10">

                                                                <input type="hidden" id="name3" value="select3">

                                                            </div>
                                                            <div id="div-results3" class="col-md-9">
                                                            </div>
                                                        </div>




                                                        <div class="col-md-12" align="left">
                                                            <div class="col-md-12" align="center">

                                                                CÓDIGO DEL DIÁGNOSTICO RELACIONADO 3
                                                                <br>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <br>
                                                                <input type="text" id="clienteId4" onChange="verlista4();" placeholder="Buscar CIE10">

                                                                <input type="hidden" id="name4" value="select4">

                                                            </div>
                                                            <div id="div-results4" class="col-md-9">
                                                            </div>
                                                        </div>


                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <br>
                                                                <br>
                                                                <label>Tipo de Diágnostico principal</label>
                                                                <select class="form-control tipodia" name="tipodia" id="tipodia">
                                                                    <option value=" "> </option>

                                                                    <option value="Impresi&oacuten Di&aacutegnostica">Impresión Diágnostica</option>
                                                                    <option value="Confirmado Nuevo">Confirmado Nuevo</option>
                                                                    <option value="Confirmado Repetido">Confirmado Repetido</option>


                                                                </select>
                                                            </div>
                                                        </div>



                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="panel box box-success">
                                            <div class="box-header with-border">
                                                <h4 class="box-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse9">
                                                        VIII. Solicitud Procedimiento
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapse9" class="panel-collapse collapse">
                                                <div class="box-body">
                                                    <div class="form-group has-purple">
                                                        <label>Solicitud Procedimiento</label>

                                                        <textarea class="textarea" id="IX_SolicitudProcedimiento" name="IX_SolicitudProcedimiento" placeholder="Por favor describa las observaciones aquí" style="width: 100%; height: 200px; font-size: 14px;
                                                           line-height: 18px; border: 1px solid #dddddd;
                                                           padding: 10px;">
                                                           </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="panel box box-success">
                                            <div class="box-header with-border">
                                                <h4 class="box-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse10">
                                                        IX. Orden Medica
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapse10" class="panel-collapse collapse">
                                                <div class="box-body">
                                                    <div class="form-group has-purple">
                                                        <label>Orden Medica</label>

                                                        <textarea class="textarea" id="X_OrdenMedica" name="X_OrdenMedica" placeholder="Por favor describa las observaciones aquí" style="width: 100%; height: 200px; font-size: 14px;
                                                           line-height: 18px; border: 1px solid #dddddd;
                                                           padding: 10px;">
                                                           </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>








                                        <?php /*?>
                <div class="panel box box-success">
                                    <div class="box-header with-border">
                                        <h4 class="box-title">
                                            <a data-toggle="collapse" data-parent="#accordion"
                                               href="#collapse9">
                                                IX. Análisis y plan de tratamiento
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse9" class="panel-collapse collapse">
                                        <div class="box-body">

                                            <div class="form-group col-md-12">
                              


                             <!-- <div align="right">
                              <a onclick="procesar()" id="procesar"><i title='Iniciar Grabación' style='font-size: 18px;' class='fa fa-fw fa-microphone'></i></a>
                              </div>-->


                              <textarea  id="analisis_tratamiento" name="analisis_tratamiento"  class="textarea" placeholder="Análisis y plan de tratamiento" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>
                            </div>
                                            <!--<h4>Traslados (Neuromotricidad) </h4>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Dcs-Dcp</label>
                                                    <br>
                                                    <input name="VIII_dcs_dcp" value="Si" type="radio" class="flat-red">
                                                    <span>
                                                        Si
                                                    </span>
                                                    <input name="VIII_dcs_dcp" value="No" type="radio" class="flat-red">
                                                    <span>
                                                        No
                                                    </span>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Descripción</label>
                                                    <div class="form-group has-success">
                                                        <textarea class="textarea" name="VIII_descripcion_dcs_dcp" placeholder="Por favor escriba el comentario aquí" style="width: 100%; height: 200px; font-size: 14px;
                                                                          line-height: 18px; border: 1px solid #dddddd;
                                                                          padding: 10px;">
                                                        </textarea>
                                                    </div>
                                                </div>
                                            </div>                        
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>4ptos-Rod:</label>
                                                    <br>
                                                    <input name="VIII_4ptos_Rod" value="Si" type="radio" class="flat-red">
                                                    <span>
                                                        Si
                                                    </span>
                                                    <input name="VIII_4ptos_Rod" value="No" type="radio" class="flat-red">
                                                    <span>
                                                        No
                                                    </span>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Descripción</label>
                                                    <div class="form-group has-success">
                                                        <textarea class="textarea" name="VIII_descripcion_4ptos_Rod" placeholder="Por favor escriba el comentario aquí" style="width: 100%; height: 200px; font-size: 14px;
                                                                          line-height: 18px; border: 1px solid #dddddd;
                                                                          padding: 10px;" >
                                                        </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Dcp-Dcl:</label>
                                                    <br>
                                                    <input name="VIII_dcp_dcl" value="Si" type="radio" class="flat-red">
                                                    <span>
                                                        Si
                                                    </span>
                                                    <input name="VIII_dcp_dcl" value="No" type="radio" class="flat-red">
                                                    <span>
                                                        No
                                                    </span>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Descripción</label>
                                                    <div class="form-group has-success">
                                                        <textarea class="textarea" name="VIII_descripcion_dcp_dcl" placeholder="Por favor escriba el comentario aquí" style="width: 100%; height: 200px; font-size: 14px;
                                                                          line-height: 18px; border: 1px solid #dddddd;
                                                                          padding: 10px;">
                                                        </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Rod-Marat:</label>
                                                    <br>
                                                    <input name="VIII_rod_marat" value="Si" type="radio" class="flat-red">
                                                    <span>
                                                        Si
                                                    </span>
                                                    <input name="VIII_rod_marat" value="No" type="radio" class="flat-red">
                                                    <span>
                                                        No
                                                    </span>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Descripción</label>
                                                    <div class="form-group has-success">
                                                        <textarea class="textarea" name="VIII_descripcion_rod_marat" placeholder="Por favor escriba el comentario aquí" style="width: 100%; height: 200px; font-size: 14px;
                                                                          line-height: 18px; border: 1px solid #dddddd;
                                                                          padding: 10px;">
                                                        </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Dcs-Sdt:</label>
                                                    <br>
                                                    <input name="VIII_dcs_sdt" value="Si" type="radio" class="flat-red">
                                                    <span>
                                                        Si
                                                    </span>
                                                    <input name="VIII_dcs_sdt" value="No" type="radio" class="flat-red">
                                                    <span>
                                                        No
                                                    </span>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Descripción</label>
                                                    <div class="form-group has-success">
                                                        <textarea class="textarea" name="VIII_descripcion_dcs_sdt" placeholder="Por favor escriba el comentario aquí" style="width: 100%; height: 200px; font-size: 14px;
                                                              line-height: 18px; border: 1px solid #dddddd;
                                                              padding: 10px;">
                                                        </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Marat-Bip:</label>
                                                    <br>
                                                    <input name="VIII_marat_bip" value="Si" type="radio" class="flat-red">
                                                    <span>
                                                        Si
                                                    </span>
                                                    <input name="VIII_marat_bip" value="No" type="radio" class="flat-red">
                                                    <span>
                                                        No
                                                    </span>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Descripción</label>
                                                    <div class="form-group has-success">
                                                        <textarea class="textarea" name="VIII_descripcion_marat_bip" placeholder="Por favor escriba el comentario aquí" style="width: 100%; height: 200px; font-size: 14px;
                                                                          line-height: 18px; border: 1px solid #dddddd;
                                                                          padding: 10px;">
                                                        </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Dcp-4ptos:</label>
                                                    <br>
                                                    <input name="VIII_dcp_4ptos" value="Si" type="radio" class="flat-red">
                                                    <span>
                                                        Si
                                                    </span>
                                                    <input name="VIII_dcp_4ptos" value="No" type="radio" class="flat-red">
                                                    <span>
                                                        No
                                                    </span>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Descripción</label>
                                                    <div class="form-group has-success">
                                                        <textarea class="textarea" name="VIII_descripcion_dcp_4ptos" placeholder="Por favor escriba el comentario aquí" style="width: 100%; height: 200px; font-size: 14px;
                                                                          line-height: 18px; border: 1px solid #dddddd;
                                                                          padding: 10px;">
                                                        </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Sdt-Bip:</label>
                                                    <br>
                                                    <input name="VIII_sdt_bip" value="Si" type="radio" class="flat-red">
                                                    <span>
                                                        Si
                                                    </span>
                                                    <input name="VIII_sdt_bip" value="No" type="radio" class="flat-red">
                                                    <span>
                                                        No
                                                    </span>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Descripción</label>
                                                    <div class="form-group has-success">
                                                        <textarea class="textarea" name="VIII_descripcion_sdt_bip" placeholder="Por favor escriba el comentario aquí" style="width: 100%; height: 200px; font-size: 14px;
                                                                          line-height: 18px; border: 1px solid #dddddd;
                                                                          padding: 10px;">
                                                        </textarea>
                                                    </div>
                                                </div>
                                            </div>-->
                                        </div>
                                    </div>
                                </div>
                                <?php */ ?>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                    </div>

                    <!--<div class="col-md-12">
                    <div class="box box-solid">
                        <div class="box-body">
                            <div class="col-sm-12">
                                <div class="text-center">
                                    <label>
                                        <strong>Próxima consulta o cita (Solo si aplica)</strong>
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label>Fecha </label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" name="prox_cita_fecha" class="form-control pull-right" value="<?php echo date('Y-m-d'); ?>" id="datepicker">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label>Hora </label>
                                <div class="input-group clockpicker" data-autoclose="true">
                                    <input type="text" name="prox_cita_hora" class="form-control" value="<?php echo date('H:i'); ?>" >
                                    <span class="input-group-addon">
                                        <span class="fa fa-clock-o"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label>Motivo consulta</label>
                                <textarea class="textarea" name="motivo_consulta" placeholder="Por favor escriba el motivo de la consulta aquí" style="width: 100%; height: 200px; font-size: 14px;
                                          line-height: 18px; border: 1px solid #dddddd;
                                          padding: 10px;">
                                </textarea>
                            </div>
                            <div class="col-sm-6">
                                <label>Especialista </label>
                                <select id="doctor" name="doctor" class="form-control select2" style="width: 100%;">
                                    <option value="Marcos Perez" selected="selected"></option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    &
                                    <br>
                                    <br>
                                    <input name="prox_cita_asistencia" value="presencial" type="radio" class="flat-red">
                                    <span>
                                        <i class="fa fa-user"></i> Presencial
                                    </span>
                                    <input name="prox_cita_asistencia" value="virtual" type="radio" class="flat-red">
                                    <span>
                                        <i class="fa fa-video-camera"></i> Virtual
                                    </span>
                                </div>
                            </div>-->






                    <input type="hidden" name="email" value="<?php echo $correo_cliente; ?>">
                    <input type="hidden" name="nombre" value="<?php echo $nombre_cliente; ?>">
                    <input type="hidden" name="telefono" value="<?php echo $telefono_cliente; ?>">
                    <input type="hidden" name="ID" value="<?php echo $_SESSION['ID'] ?>">
                    <input type="hidden" name="clienteId" value="<?php echo $clienteId ?>">
                    <input type="hidden" name="NOMBRE_USUARIO" value="<?php echo $_SESSION['NOMBRE_USUARIO'] ?>">




                    <div class="col-sm-12">
                        <br>
                        <br>
                        <center>
                            <button type="submit" class="btn btn-block btn-primary btn-sm">
                                <h2>
                                    <strong> G u a r d a r </strong>
                                </h2>
                            </button>
                        </center>

                    </div>
                    <input type="hidden" name="tipo_cliente" value="1">
                </div>
            </div>
        </div>
        &nbsp;
        <br>
        <br>
        </form>















</div>
</div>
<!-- /.box-body -->
</div>
<!-- /.box -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</section>
<!-- /.content -->
</div>





<?php
include("footer.php") ?>
<script src="apiVoz_2.1.js"></script>
<script>
    function verlista() {

        var clienteId = $("#clienteId").val();
        var name = $("#name1").val();



        // aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "cie10lista10.php",
            data: {
                clienteId: clienteId,
                name: name
            },
            success: function(response) {
                $('#div-results1').html(response);

            }
        });
    };


    function verlista2() {

        var clienteId = $("#clienteId2").val();
        var name = $("#name2").val();



        // aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "cie10lista10.php",
            data: {
                clienteId: clienteId,
                name: name
            },
            success: function(response) {
                $('#div-results2').html(response);

            }
        });
    };



    function verlista3() {

        var clienteId = $("#clienteId3").val();
        var name = $("#name3").val();



        // aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "cie10lista10.php",
            data: {
                clienteId: clienteId,
                name: name
            },
            success: function(response) {
                $('#div-results3').html(response);

            }
        });
    };



    function verlista4() {

        var clienteId = $("#clienteId4").val();
        var name = $("#name4").val();



        // aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "cie10lista10.php",
            data: {
                clienteId: clienteId,
                name: name
            },
            success: function(response) {
                $('#div-results4').html(response);

            }
        });
    };
</script>