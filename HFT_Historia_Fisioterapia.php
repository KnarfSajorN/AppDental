<?php 
   include 'header.php';
   include 'menu.php';

    $clienteId = $_GET['clienteId']; 
    $usuarioId = $_GET['usuarioId']; 

 $ID = $_SESSION['ID'];










                  $queryList=mysqli_query($conn3,"SELECT * FROM  cliente where cliente_id=$clienteId");
                  $nrowl=mysqli_num_rows($queryList);
                  while($rowMotorizado=mysqli_fetch_array($queryList))
                  {
                    $usuario_id=$rowMotorizado['usuario_id'];
                    $nombre_cliente=$rowMotorizado['nombre_cliente'];
                    $celular_cliente=$rowMotorizado['celular_cliente'];
                    $ciudad_cliente=$rowMotorizado['ciudad_cliente'];
                    $correo_cliente=$rowMotorizado['correo_cliente'];
                    $CODI_CLIENTE=$rowMotorizado['CODI_CLIENTE'];
                    $id_uso_servicio=$rowMotorizado['id_uso_servicio'];
                    $tipo_cliente=$rowMotorizado['tipo_cliente'];
                    $fechar=$rowMotorizado['fechar'];
                    $fecha_actualizado=$rowMotorizado['fecha_actualizado'];
                    $activo=$rowMotorizado['activo'];
                    $genero=$rowMotorizado['genero'];
                    $direccion_cliente=$rowMotorizado['direccion_cliente'];
                    $telefono_cliente=$rowMotorizado['telefono_cliente'];
                    $edad_cliente=$rowMotorizado['edad_cliente'];
                    $profesion_cliente=$rowMotorizado['profesion_cliente'];
                    $acompananteFamiliar=$rowMotorizado['acompananteFamiliar'];
                    $telefono_acompanante=$rowMotorizado['telefono_acompanante'];
                    $antecedentes     =$rowMotorizado['antecedentes'];   
                    $fotoperfil       =$rowMotorizado['fotoperfil']; 
                    $tiposSangre      =$rowMotorizado['tiposSangre']; 
                    $esDonante        =$rowMotorizado['esDonante']; 
                    $tomaMedicamento  =$rowMotorizado['tomaMedicamento']; 
                    
                    $fechaNacimiento  =$rowMotorizado['fechaNacimiento']; 
                 
                    $entidadSalud     =$rowMotorizado['entidadSalud']; 
                    $seguro           =$rowMotorizado['seguro']; 
                    
                    $nota           =$rowMotorizado['nota']; 
                    $enfermedadesPequeno           =$rowMotorizado['enfermedadesPequeno']; 
                    $alergias           =$rowMotorizado['alergias']; 

 
          $peso           =$rowMotorizado['peso']; 
          $altura           =$rowMotorizado['altura']; 
          $imc           =$rowMotorizado['imc']; 
          $ComposicionCorporal           =$rowMotorizado['ComposicionCorporal']; 
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


                  $queryconfig=mysqli_query($conn3,"SELECT * FROM  config where ID=$ID");
                  $nrowl=mysqli_num_rows($queryconfig);
                  while($rowconfig=mysqli_fetch_array($queryconfig))
                  {
                    $cie10 = $rowconfig['cie10'];
                    $pro1  = $rowconfig['pro1'];
                    $pro2  = $rowconfig['pro2'];
                  }



      ?>
     

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Consulta Médica 
         
      </h1>
      <ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
        <li><a href="#"> Consulta Médica </a></li>
        

      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="">
        <div class="col-xs-12">
 

          <div class="box">
         
            <!-- /.box-header -->
            <div class="box-body">


  <div class="col-md-12">

          <div class=" box-solid">
             
            <!-- /.box-header -->
            <div class="box-body">
              <div class="box-group" id="accordion1">
                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                <div class="panel box box-primary" style="border-top: 0;">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion1" href="#collapseOne1">
                        Datos Personales 
                      </a>
                    </h4>
                  </div>
                  <div id="collapseOne1" class="panel-collapse collapse">
                    <div class="box-body">
            
                    <?php echo datosPacientes($clienteId); ?>

                    </div>
                  </div>
                </div>


            <form action="HFT_Guardar_Fisioterapia" method="POST" id="FormularioHistoriaClinica">
                <div class="col-md-12">
                    <div class="box-solid">
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="box-group" id="accordion">
                                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                                <div class="panel box box-primary">
                                    <div class="box-header with-border">
                                        <h4 class="box-title">
                                            <a data-toggle="collapse" data-parent="#accordion"
                                               href="#collapseOne">
                                                I. Anamnesis
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="control-label">Diabetes:</label>
                                                <div class="form-group ">
                                                    <input type="text" name="I[Diabetes]" class="form-control" placeholder="" r>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="control-label"> Hta:</label>
                                                <div class="form-group ">
                                                    <input type="text" name="I[Hta]" class="form-control" placeholder="" r>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="control-label">Cáncer:</label>
                                                <div class="form-group ">
                                                    <input type="text" name="I[Cáncer]" class="form-control" placeholder="" r>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="control-label">Enfermedades Reumáticas:</label>
                                                <div class="form-group">
                                                    <input type="text" name="I[Enfermedades Reumáticas]" class="form-control" placeholder="" r>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="control-label">Cardiopatías: </label>
                                                <div class="form-group ">
                                                    <input type="text" name="I[Cardiopatías]" class="form-control"  placeholder="" r>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="control-label">Cirugías:</label>
                                                <div class="form-group">
                                                    <input type="text" name="I[Cirugías]" class="form-control" placeholder="" r>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="control-label">Alergias:</label>
                                                <div class="form-group">
                                                    <input type="text" name="I[Alergias]" class="form-control" placeholder="" r>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="control-label">Transfusiones: </label>
                                                <div class="form-group">
                                                    <input type="text" name="I[Transfusiones]" class="form-control" placeholder="" r>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="control-label" >Accidentes: </label>
                                                <div class="form-group">
                                                    <input type="text" name="I[Accidentes]" class="form-control" placeholder="" r>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="control-label">Fracturas:</label>
                                                <div class="form-group">
                                                    <input type="text" name="I[Fracturas]" class="form-control" placeholder="" r>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="control-label">Signos Vitales:</label>
                                                <div class="form-group">
                                                    <input type="text" name="I[Signos Vitales]" class="form-control" placeholder="" r>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel box box-success">
                                    <div class="box-header with-border">
                                        <h4 class="box-title">
                                            <a data-toggle="collapse" data-parent="#accordion"
                                               href="#collapseTwo">
                                                II. Examen Físico Postural
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse collapse">
                                        <div class="box-body">
                                            <div class="row">
                                                <div class="col-sm-6 b-r">
                                                    <h3 class="m-t-none m-b">1. Actitud Postural</h3>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>Seleccione Actitud Postural</label>
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
                                                                <textarea class="textarea" name="II_detalles" placeholder="Por Favor Escriba los Detalles Aquí" style="width: 100%; height: 200px; font-size: 14px;
                                                                      line-height: 18px; border: 1px solid #dddddd;
                                                                      padding: 10px;"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <h3 class="m-t-none m-b">2. Evaluación de la Piel</h3>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Color</label>
                                                                <br>
                                                                <input name="II_color" value="Normal" type="radio" class="" r>
                                                                <span>
                                                                    Normal
                                                                </span>
                                                                <input name="II_color" value="Erimatosa" type="radio" class="" r>
                                                                <span>
                                                                    Erimatosa
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Estado</label>
                                                                <br>
                                                                <input name="II_estado" value="Normal" type="radio" class="" r>
                                                                <span>
                                                                    Normal
                                                                </span>
                                                                <input name="II_estado" value="Seca" type="radio" class="" r>
                                                                <span>
                                                                    Seca
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Edema</label>
                                                                <br>
                                                                <input name="II_edema" value="Ninguno" type="radio" class="" r>
                                                                <span>
                                                                    Ninguno
                                                                </span>
                                                                <input name="II_edema" value="Leve" type="radio" class="" r>
                                                                <span>
                                                                    Leve
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Tumefacción</label>
                                                                <br>
                                                                <input name="II_tumefaccion" value="Si" type="radio" class="" r>
                                                                <span>
                                                                    Si
                                                                </span>
                                                                <input name="II_tumefaccion" value="No" type="radio" class="" r>
                                                                <span>
                                                                    No
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Escaras</label>
                                                                <br>
                                                                <input name="II_escaras" value="Si" type="radio" class="" r>
                                                                <span>
                                                                    Si
                                                                </span>
                                                                <input name="II_escaras" value="No" type="radio" class="" r>
                                                                <span>
                                                                    No
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Heridas</label>
                                                                <br>
                                                                <input name="II_heridas" value="Si" type="radio" class="" r>
                                                                <span>
                                                                    Si
                                                                </span>
                                                                <input name="II_heridas" value="No" type="radio" class="" r>
                                                                <span>
                                                                    No
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-12">
                                                                    <label>Cicatriz</label>
                                                                    <br>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <input name="II_cicatriz" value="Ninguna" type="radio" class="" r>
                                                                    <span>
                                                                        Ninguna
                                                                    </span>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <input name="II_cicatriz" value="Buen Estado" type="radio" class="" r>
                                                                    <span>
                                                                        Buen Estado
                                                                    </span>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <input name="II_cicatriz" value="Adherida" type="radio" class="" r>
                                                                    <span>
                                                                        Adherida
                                                                    </span>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <input name="II_cicatriz" value="Queloide" type="radio" class="" r>
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
                                </div>
                                <div class="panel box box-success">
                                    <div class="box-header with-border">
                                        <h4 class="box-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                                III. Evaluación del Dolor
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
                                                        <small class="label pull-center bg-green"> Escala Visual Analógica: Eva</small>
                                                        



                                                        <div class="">
                                                            <!--<canvas width="85" height="85"></canvas>-->
                                                            <input type="text" name="III_intensidad" value="0" data-max="10" data-min="0" class="dial m-r" data-fgcolor="#ED5565" data-width="85" data-height="85" data-angleoffset="-125" data-anglearc="250" >
                                                        </div>




                                                        <small class="help-block m-b-none">Sin Dolor es 0, Pero Dolor Posible es 10.</small>
                                                        <br>
                                                    </div>
                                                    
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Presente en (Especificar)</label>
                                                            <br>
                                                            <input name="III_presente" value="Palpación" type="radio" class="">
                                                            <span>
                                                                Palpación
                                                            </span>
                                                            <input name="III_presente" value="Movilización" type="radio" class="">
                                                            <span>
                                                                Movilización
                                                            </span>
                                                            <input name="III_presente" value="Referido" type="radio" class="">
                                                            <span>
                                                                Referido
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Durante</label>
                                                            <br>
                                                            <input name="III_durante" value="Reposo" type="radio" class="">
                                                            <span>
                                                                Reposo
                                                            </span>
                                                            <input name="III_durante" value="Actividad" type="radio" class="">
                                                            <span>
                                                                Actividad
                                                            </span>
                                                            <input name="III_durante" value="Después de Actividad" type="radio" class="">
                                                            <span>
                                                                Después de Actividad
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group has-purple">
                                                        <label>Zona de Dolor</label>
                                                        <textarea class="textarea" name="III_zona_dolor" placeholder="Por Favor Describa la Zona de Dolor Aquí" style="width: 100%; height: 200px; font-size: 14px;
                                                        line-height: 18px; border: 1px solid #dddddd;
                                                        padding: 10px;"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel box box-success">
                                    <div class="box-header with-border">
                                        <h4 class="box-title">
                                            <a data-toggle="collapse" data-parent="#accordion"
                                               href="#collapse4">
                                                IV. Evaluación de la Sensibilidad
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse4" class="panel-collapse collapse">
                                        <div class="box-body row ">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Superficial</label>
                                                    <br>
                                                    <input name="IV_superficial" value="Conservada" type="radio" class="" r>
                                                    <span>
                                                        Conservada
                                                    </span>
                                                    <input name="IV_superficial" value="Alterada" type="radio" class="" r>
                                                    <span>
                                                        Alterada
                                                    </span>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Detalles</label>
                                                    <div class="form-group has-success">
                                                        <textarea class="textarea" name="IV_detalles_superficial" placeholder="Por Favor Describa los Detalles Aquí" style="width: 100%; height: 200px; font-size: 14px;
                                                              line-height: 18px; border: 1px solid #dddddd;
                                                              padding: 10px;" ></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Profunda</label>
                                                    <br>
                                                    <input name="IV_profunda" value="Conservada" type="radio" class="" r>
                                                    <span>
                                                        Conservada
                                                    </span>
                                                    <input name="IV_profunda" value="Alterada" type="radio" class="" r>
                                                    <span>
                                                        Alterada
                                                    </span>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Detalles</label>
                                                    <div class="form-group has-success">
                                                        <textarea class="textarea"  name="IV_detalles_profunda" placeholder="Por Favor Describa los Detalles Aquí" style="width: 100%; height: 200px; font-size: 14px;
                                                              line-height: 18px; border: 1px solid #dddddd;
                                                              padding: 10px;"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel box box-success">
                                    <div class="box-header with-border">
                                        <h4 class="box-title">
                                            <a data-toggle="collapse" data-parent="#accordion"
                                               href="#collapse5">
                                                V. Evaluación Osteoarticular
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse5" class="panel-collapse collapse">
                                        <div class="box-body row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Estado Articular</label>
                                                    <br>
                                                    <input name="V_estado_articular" value="Normal" type="radio" class="" r>
                                                    <span>
                                                        Normal
                                                    </span>
                                                    <input name="V_estado_articular" value="Rigidez" type="radio" class="" r>
                                                    <span>
                                                        Rigidez
                                                    </span>
                                                    <input name="V_estado_articular" value="Hipo Movilidad" type="radio" class="" r>
                                                    <span>
                                                        Hipo Movilidad
                                                    </span>
                                                    <input name="V_estado_articular" value="Hiper Movilidad" type="radio" class="" r>
                                                    <span>
                                                        Hiper Movilidad
                                                    </span>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Detalles</label>
                                                    <div class="form-group has-success">
                                                        <textarea class="textarea" name="V_detalles_estado_articular" placeholder="Por Favor Describa los Detalles Aquí" style="width: 100%; height: 200px; font-size: 14px;
                                                              line-height: 18px; border: 1px solid #dddddd;
                                                              padding: 10px;"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Amplitud Articular</label>
                                                    <br>
                                                    <input name="V_amplitud_articular" value="Normal" type="radio" class="" r>
                                                    <span>
                                                    Normal
                                                </span>
                                                    <input name="V_amplitud_articular" value="Alterada" type="radio" class="" r>
                                                    <span>
                                                    Alterada
                                                </span>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Detalles</label>
                                                    <div class="form-group has-success">
                                                    <textarea class="textarea" name="V_detalles_amplitud_articular" placeholder="Por Favor Describa los Detalles Aquí" style="width: 100%; height: 200px; font-size: 14px;
                                                          line-height: 18px; border: 1px solid #dddddd;
                                                          padding: 10px;"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel box box-success">
                                    <div class="box-header with-border">
                                        <h4 class="box-title">
                                            <a data-toggle="collapse" data-parent="#accordion"
                                               href="#collapse6">
                                                VI. Evaluación Neuromuscular
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse6" class="panel-collapse collapse">
                                        <div class="box-body row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Tono</label>
                                                    <br>
                                                    <input name="VI_tono" value="Hipotónico" type="radio" class="" r>
                                                    <span>
                                                        Hipotónico
                                                    </span>
                                                    <input name="VI_tono" value="Normal" type="radio" class="" r>
                                                    <span>
                                                        Normal
                                                    </span>
                                                    <input name="VI_tono" value="Hipertónico" type="radio" class="" r>
                                                    <span>
                                                        Hipertónico
                                                    </span>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Especificar</label>
                                                    <div class="form-group has-success">
                                                        <textarea class="textarea" name="VI_especificar_tono" placeholder="Por Favor Describa los Detalles Aquí" style="width: 100%; height: 200px; font-size: 14px;
                                                              line-height: 18px; border: 1px solid #dddddd;
                                                              padding: 10px;"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Trofismo</label>
                                                    <br>
                                                    <input name="VI_trofismo" value="Hipotrofia" type="radio" class="" r>
                                                    <span>
                                                        Hipotrofia
                                                    </span>
                                                    <input name="VI_trofismo" value="Normal" type="radio" class="" r>
                                                    <span>
                                                        Normal
                                                    </span>
                                                    <input name="VI_trofismo" value="Hipertrofia" type="radio" class="" r>
                                                    <span>
                                                        Hipertrofia
                                                    </span>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Especificar</label>
                                                    <div class="form-group has-success">
                                                        <textarea class="textarea" name="VI_especificar_trofismo" placeholder="Por Favor Describa los Detalles Aquí" style="width: 100%; height: 200px; font-size: 14px;
                                                              line-height: 18px; border: 1px solid #dddddd;
                                                              padding: 10px;"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Elasticidad</label>
                                                    <br>
                                                    <input name="VI_elasticidad" value="Normal" type="radio" class="" r>
                                                    <span>
                                                        Normal
                                                    </span>
                                                    <input name="VI_elasticidad" value="Contracturado" type="radio" class="" r>
                                                    <span>
                                                        Contracturado
                                                    </span>
                                                    <input name="VI_elasticidad" value="Acortado" type="radio" class="" r>
                                                    <span>
                                                        Acortado
                                                    </span>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Especificar</label>
                                                    <div class="form-group has-success">
                                                        <textarea class="textarea" name="VI_especificar_elastisidad" placeholder="Por Favor Describa los Detalles Aquí" style="width: 100%; height: 200px; font-size: 14px;
                                                              line-height: 18px; border: 1px solid #dddddd;
                                                              padding: 10px;"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Fuerza</label>
                                                    <br>
                                                    <input name="VI_fuerza" value="Normal" type="radio" class="" r>
                                                    <span>
                                                        Normal
                                                    </span>
                                                    <input name="VI_fuerza" value="Alterada" type="radio" class="" r>
                                                    <span>
                                                        Alterada
                                                    </span>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Especificar</label>
                                                    <div class="form-group has-success">
                                                        <textarea class="textarea" name="VI_especificar_fuerza" placeholder="Por Favor Describa los Detalles Aquí" style="width: 100%; height: 200px; font-size: 14px;
                                                              line-height: 18px; border: 1px solid #dddddd;
                                                              padding: 10px;"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="col-md-12">
                                                <h4>Evaluación Muscular</h4>


                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card collapsed-card">
                                                            <div class="card-header">
                                                                <h3 class="card-title">La Fuerza del Paciente Está Graduada en una Escala de 0-5.</h3>
                                                                <div class="card-tools">
                                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                                    <i class="fas fa-plus"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <div class="card-body" style="display: none;">
                                                            

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

                                                            <div class="card-footer" style="display: none;">
                                                            Footer
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>



                                            </div>


                                            
                                            <div class="col-md-12">
                                                <table width="100%">
                                                    <tr>
                                                        <td></td>
                                                        <td colspan="2" align="center" style="background-color: #374850;    padding: 10px!important;color: white;">
                                                            Evaluación 1 Fecha
                                                        </td>
                                                        <td></td>
                                                        <td colspan="2" align="center" style="background-color: #374850;    padding: 10px!important;color: white;">
                                                            Evaluación 2 Fecha
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
                                                            <input type="text" name="VI_em[M. Sup1]" value="0" data-max="5" data-min="0" class="dial m-r" data-fgcolor="#00a65a" data-width="85" data-height="85" data-angleoffset="-125" data-anglearc="250" r>
                                                        </td>
                                                        <td class="border-right">
                                                            <canvas width="85" height="85"></canvas>
                                                            <input type="text" name="VI_em[M. Sup2]" value="0" data-max="5" data-min="0" class="dial m-r" data-fgcolor="#00a65a" data-width="85" data-height="85" data-angleoffset="-125" data-anglearc="250" r>
                                                        </td>
                                                        <td align="center" style="width: 10px">
                                                            &nbsp;
                                                        </td>
                                                        <td class="border-right border-left">
                                                            <canvas width="85" height="85"></canvas>
                                                            <input type="text" name="VI_em[M. Sup3]" value="0" data-max="5" data-min="0" class="dial m-r" data-fgcolor="#00a65a" data-width="85" data-height="85" data-angleoffset="-125" data-anglearc="250" r>
                                                        </td>
                                                        <td class="border-right">
                                                            <canvas width="85" height="85"></canvas>
                                                            <input type="text" name="VI_em[M. Sup4]" value="0" data-max="5" data-min="0" class="dial m-r" data-fgcolor="#00a65a" data-width="85" data-height="85" data-angleoffset="-125" data-anglearc="250" r>
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
                                                            <input type="text" name="VI_em[M. Inf1]" value="0" data-max="5" data-min="0" class="dial m-r" data-fgcolor="#00a65a" data-width="85" data-height="85" data-angleoffset="-125" data-anglearc="250" r>
                                                        </td>
                                                        <td class="border-right">
                                                            <canvas width="85" height="85"></canvas>
                                                            <input type="text" name="VI_em[M. Inf2]" value="0" data-max="5" data-min="0" class="dial m-r" data-fgcolor="#00a65a" data-width="85" data-height="85" data-angleoffset="-125" data-anglearc="250" r>
                                                        </td>
                                                        <td align="center" style="width: 10px">
                                                            &nbsp;
                                                        </td>
                                                        <td class="border-right border-left">
                                                            <canvas width="85" height="85"></canvas>
                                                            <input type="text" name="VI_em[M. Inf3]" value="0" data-max="5" data-min="0" class="dial m-r" data-fgcolor="#00a65a" data-width="85" data-height="85" data-angleoffset="-125" data-anglearc="250" r>
                                                        </td>
                                                        <td class="border-right">
                                                            <canvas width="85" height="85"></canvas>
                                                            <input type="text" name="VI_em[M. Inf4]" value="0" data-max="5" data-min="0" class="dial m-r" data-fgcolor="#00a65a" data-width="85" data-height="85" data-angleoffset="-125" data-anglearc="250" r>
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
                                                            <input type="text" name="VI_em[Tronco1]" value="0" data-max="5" data-min="0" class="dial m-r" data-fgcolor="#00a65a" data-width="85" data-height="85" data-angleoffset="-125" data-anglearc="250" r>
                                                        </td>
                                                        <td class="border-right">
                                                            <canvas width="85" height="85"></canvas>
                                                            <input type="text" name="VI_em[Tronco2]" value="0" data-max="5" data-min="0" class="dial m-r" data-fgcolor="#00a65a" data-width="85" data-height="85" data-angleoffset="-125" data-anglearc="250" r>
                                                        </td>
                                                        <td align="center" style="width: 10px">
                                                            &nbsp;
                                                        </td>
                                                        <td class="border-right border-left">
                                                            <canvas width="85" height="85"></canvas>
                                                            <input type="text" name="VI_em[Tronco3]" value="0" data-max="5" data-min="0" class="dial m-r" data-fgcolor="#00a65a" data-width="85" data-height="85" data-angleoffset="-125" data-anglearc="250" r>
                                                        </td>
                                                        <td class="border-right">
                                                            <canvas width="85" height="85"></canvas>
                                                            <input type="text" name="VI_em[Tronco4]" value="0" data-max="5" data-min="0" class="dial m-r" data-fgcolor="#00a65a" data-width="85" data-height="85" data-angleoffset="-125" data-anglearc="250" r>
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
                                                            <input type="text" name="VI_em[Cuello1]" value="0" data-max="5" data-min="0" class="dial m-r" data-fgcolor="#00a65a" data-width="85" data-height="85" data-angleoffset="-125" data-anglearc="250" r>
                                                        </td>
                                                        <td class="border-right">
                                                            <canvas width="85" height="85"></canvas>
                                                            <input type="text" name="VI_em[Cuello2]" value="0" data-max="5" data-min="0" class="dial m-r" data-fgcolor="#00a65a" data-width="85" data-height="85" data-angleoffset="-125" data-anglearc="250" r>
                                                        </td>
                                                        <td align="center" style="width: 10px">
                                                            &nbsp;
                                                        </td>
                                                        <td class="border-right border-left">
                                                            <canvas width="85" height="85"></canvas>
                                                            <input type="text" name="VI_em[Cuello3]" value="0" data-max="5" data-min="0" class="dial m-r" data-fgcolor="#00a65a" data-width="85" data-height="85" data-angleoffset="-125" data-anglearc="250" r>
                                                        </td>
                                                        <td class="border-right">
                                                            <canvas width="85" height="85"></canvas>
                                                            <input type="text" name="VI_em[Cuello4]" value="0" data-max="5" data-min="0" class="dial m-r" data-fgcolor="#00a65a" data-width="85" data-height="85" data-angleoffset="-125" data-anglearc="250" r>
                                                        </td>
                                                        <td width="120" align="center" class="strong">
                                                            <strong>Cuello</strong>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <br>
                                            &nbsp;
                                            <div class=" col-md-12 row">
                                                <div class="col-md-12">
                                                    <h4> Goniometría Movimiento Articular </h4>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>
                                                            Apellidos y Nombres
                                                        </label>
                                                        <input type="text" name="VI_apellidos_nombres" class="form-control" placeholder="" r>
                                                        <label>
                                                            Diagnóstico
                                                        </label>
                                                        <textarea class="textarea" name="VI_diagnostico" placeholder="Por Favor Describa los Detalles Aquí"
                                                            style="width: 100%; height: 200px; font-size: 14px;
                                                            line-height: 18px; border: 1px solid #dddddd;
                                                            padding: 10px;" r></textarea>
                                                    </div>
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
                                            <div class="col-md-12">
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
                                                            <input type="text" name="VI_gma[0]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[1]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">Flexión 0°
                                                            - 180°
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[2]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[3]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td rowspan="6" width="120" align="center"
                                                            class="strong"><strong>Hombro</strong>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[4]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[5]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">Extensión
                                                            0° - 50°-60°
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[6]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[7]" class="form-control" placeholder="" r>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[8]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[9]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">Abducción
                                                            0° - 180°
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[10]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[11]" class="form-control" placeholder="" r>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[12]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[13]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">Add Horiz.
                                                            0° - 120°
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[14]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[15]" class="form-control" placeholder="" r>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[16]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[17]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">Rot Int.
                                                            0° - 70°
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[18]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[19]" class="form-control" placeholder="" r>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[20]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[21]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">Rot. Ext.
                                                            0° - 90°
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[22]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[23]" class="form-control" placeholder="" r>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td colspan="7" width="120" align="center" class="strong">
                                                        </td>
                                                    </tr>

                                                    <!-- Codo y antebrazo-->

                                                    <tr>
                                                        <td rowspan="4" width="120" align="center"
                                                            class="strong"><strong>Codo y
                                                            Antebrazo</strong></td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[24]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[25]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">Flexión 0°
                                                            - 145° 150°
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[26]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[27]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td rowspan="4" width="120" align="center"
                                                            class="strong"><strong>Codo y
                                                            Antebrazo</strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[28]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[29]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">Extensión
                                                            145° - 0°
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[30]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[31]" class="form-control" placeholder="" r>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[32]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[33]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">Pronación
                                                            0° - 90°
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[34]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[35]" class="form-control" placeholder="" r>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[36]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[37]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">Supinación
                                                            0° - 90°
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[38]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[39]" class="form-control" placeholder="" r>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td colspan="7" width="120" align="center" class="strong">
                                                        </td>
                                                    </tr>
                                                    <!-- Muñeca-->

                                                    <tr>
                                                        <td rowspan="4" width="120" align="center"
                                                            class="strong"><strong>Muñeca</strong>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[40]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[41]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">Flexión 0°
                                                            - 90°
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[42]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[43]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td rowspan="4" width="120" align="center"
                                                            class="strong"><strong>Muñeca</strong>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[44]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[45]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">Extensión.
                                                            0° - 70°
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[46]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[47]" class="form-control" placeholder="" r>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[48]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[49]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">Desv. Rad.
                                                            0° - 25° 30°
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[50]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[51]" class="form-control" placeholder="" r>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[52]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[53]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">Desv. Cub.
                                                            . 0° - 30°
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[54]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[55]" class="form-control" placeholder="" r>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td colspan="7" width="120" align="center" class="strong">
                                                        </td>
                                                    </tr>
                                                    <!-- 1 dedo de la mano-->

                                                    <tr>
                                                        <td rowspan="3" width="120" align="center"
                                                            class="strong"><strong>1 Dedo de la
                                                            Mano</strong></td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[56]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[57]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">Flex If 0°
                                                            - 80°
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[58]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[59]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td rowspan="3" width="120" align="center"
                                                            class="strong"><strong>1 Dedo de la
                                                            Mano</strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[60]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[61]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">Flex Mcf
                                                            0° - 50°
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[62]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[63]" class="form-control" placeholder="" r>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[64]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[65]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">Abd 0° -
                                                            60°
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[66]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[67]" class="form-control" placeholder="" r>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td colspan="7" width="120" align="center" class="strong">
                                                        </td>
                                                    </tr>

                                                    <!-- Cadera-->

                                                    <tr>
                                                        <td rowspan="7" width="120" align="center"
                                                            class="strong"><strong>Cadera</strong>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[68]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[69]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">Flex C/
                                                            Rodilla Flex 0° - 125°
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[70]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[71]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td rowspan="7" width="120" align="center"
                                                            class="strong"><strong>Cadera</strong>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[72]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[73]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">Ext con
                                                            Rodilla Ext 0° - 15º
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[74]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[75]" class="form-control" placeholder="" r>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[76]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[77]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">Ext con
                                                            Rodilla Flex 0° - 10º
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[78]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[79]" class="form-control" placeholder="" r>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[80]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[81]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">Abducción
                                                            0°-45°
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[82]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[83]" class="form-control" placeholder="" r>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[84]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[85]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">Adducción
                                                            0°-20°-30°
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[86]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[87]" class="form-control" placeholder="" r>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[88]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[89]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">Rot. Int.
                                                            0°-30°-45°
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[90]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[91]" class="form-control" placeholder="" r>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[92]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[93]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">Rot. Ext.
                                                            0°-30°-45°
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[94]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[95]" class="form-control" placeholder="" r>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="7" width="120" align="center" class="strong">
                                                        </td>
                                                    </tr>
                                                    <!-- Rodilla-->

                                                    <tr>
                                                        <td rowspan="2" width="120" align="center"
                                                            class="strong"><strong>Rodilla</strong>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[96]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[97]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">Flexión
                                                            0°-140°
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[98]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[99]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td rowspan="2" width="120" align="center"
                                                            class="strong"><strong>Rodilla</strong>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[100]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[101]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">Extensión
                                                            140°-0°
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[102]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[103]" class="form-control" placeholder="" r>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td colspan="7" width="120" align="center" class="strong">
                                                        </td>
                                                    </tr>
                                                    <!-- Tobillo y Pie-->

                                                    <tr>
                                                        <td rowspan="4" width="120" align="center"
                                                            class="strong"><strong>Tobillo y
                                                            Pie</strong></td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[104]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[105]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            Dorsiflexión 0°-20°
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[106]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[107]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td rowspan="4" width="120" align="center"
                                                            class="strong"><strong>Tobillo y
                                                            Pie</strong></td>
                                                    </tr>

                                                    <tr>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[108]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[109]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">Flex
                                                            Plantar 0°-45°
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[110]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[111]" class="form-control" placeholder="" r>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[112]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[113]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">Inversión
                                                            0°-30°
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[114]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[115]" class="form-control" placeholder="" r>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[116]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[117]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">Eversión
                                                            0°-25°
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[118]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[119]" class="form-control" placeholder="" r>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td colspan="7" width="120" align="center" class="strong">
                                                        </td>
                                                    </tr>
                                                    <!-- Columna Cervical-->

                                                    <tr>
                                                        <td rowspan="4" width="120" align="center"
                                                            class="strong"><strong>Columna
                                                            Cervical</strong></td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[120]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[121]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">Flexión
                                                            0°-45°
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[122]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[123]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td rowspan="4" width="120" align="center"
                                                            class="strong"><strong>Columna
                                                            Cervical</strong></td>
                                                    </tr>

                                                    <tr>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[124]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[125]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">Extensión
                                                            0°-45°
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[126]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[127]" class="form-control" placeholder="" r>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[128]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[129]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            Lateralización 0°-45-60°
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[130]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[131]" class="form-control" placeholder="" r>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[132]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[133]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">Rotación
                                                            0°-60-70°
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[134]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[135]" class="form-control" placeholder="" r>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td colspan="7" width="120" align="center" class="strong">
                                                        </td>
                                                    </tr>
                                                    <!-- Tronco-->

                                                    <tr>
                                                        <td rowspan="4" width="120" align="center"
                                                            class="strong"><strong>Tronco</strong>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[136]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[137]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">Flexión
                                                            0°-80°
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[138]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[139]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td rowspan="4" width="120" align="center"
                                                            class="strong"><strong>Tronco</strong>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[140]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[141]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">Extensión
                                                            0°-30°
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[142]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[143]" class="form-control" placeholder="" r>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[144]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[145]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            Lateralización 0°-20°
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[146]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[147]" class="form-control" placeholder="" r>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[148]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[149]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">Rotación
                                                            0°-45°
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[150]" class="form-control" placeholder="" r>
                                                        </td>
                                                        <td align="center" class="inputs">
                                                            <input type="text" name="VI_gma[151]" class="form-control" placeholder="" r>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel box box-success">
                                    <div class="box-header with-border">
                                        <h4 class="box-title">
                                            <a data-toggle="collapse" data-parent="#accordion"
                                               href="#collapse7">
                                                VII. Evaluación de la Marcha y Equilibrio
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse7" class="panel-collapse collapse">
                                        <div class="box-body">
                                            <h4> Realice las Observaciones Correspondientes Según la
                                                Escala de Valoración de Marcha y Equilibrio
                                                (Tinetti) 
                                            </h4>
                                            <div class="col-md-12">
                                                <div class="form-group has-purple">
                                                    <label>Observaciones</label>
                                                    <textarea class="textarea" name="VII_observaciones" placeholder="Por Favor Describa los Detalles Aquí" style="width: 100%; height: 200px; font-size: 14px;
                                                    line-height: 18px; border: 1px solid #dddddd;
                                                    padding: 10px;"  r></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel box box-success">
                                    <div class="box-header with-border">
                                        <h4 class="box-title">
                                            <a data-toggle="collapse" data-parent="#accordion"
                                               href="#collapse8">
                                                VIII. Actividad Motora Funcional
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse8" class="panel-collapse collapse">
                                        <div class="box-body row">
                                            <div class="col-md-12">
                                                <h4>Traslados (Neuromotricidad) </h4>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Dcs-Dcp</label>
                                                    <br>
                                                    <input name="VIII_dcs_dcp" value="Si" type="radio" class="">
                                                    <span>
                                                        Si
                                                    </span>
                                                    <input name="VIII_dcs_dcp" value="No" type="radio" class="">
                                                    <span>
                                                        No
                                                    </span>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Descripción</label>
                                                    <div class="form-group has-success">
                                                        <textarea class="textarea" name="VIII_descripcion_dcs_dcp" placeholder="Por Favor Describa los Detalles Aquí" style="width: 100%; height: 200px; font-size: 14px;
                                                                          line-height: 18px; border: 1px solid #dddddd;
                                                                          padding: 10px;"></textarea>
                                                    </div>
                                                </div>
                                            </div>                        
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>4ptos-Rod:</label>
                                                    <br>
                                                    <input name="VIII_4ptos_Rod" value="Si" type="radio" class="">
                                                    <span>
                                                        Si
                                                    </span>
                                                    <input name="VIII_4ptos_Rod" value="No" type="radio" class="">
                                                    <span>
                                                        No
                                                    </span>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Descripción</label>
                                                    <div class="form-group has-success">
                                                        <textarea class="textarea" name="VIII_descripcion_4ptos_Rod" placeholder="Por Favor Describa los Detalles Aquí" style="width: 100%; height: 200px; font-size: 14px;
                                                                          line-height: 18px; border: 1px solid #dddddd;
                                                                          padding: 10px;" ></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Dcp-Dcl:</label>
                                                    <br>
                                                    <input name="VIII_dcp_dcl" value="Si" type="radio" class="">
                                                    <span>
                                                        Si
                                                    </span>
                                                    <input name="VIII_dcp_dcl" value="No" type="radio" class="">
                                                    <span>
                                                        No
                                                    </span>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Descripción</label>
                                                    <div class="form-group has-success">
                                                        <textarea class="textarea" name="VIII_descripcion_dcp_dcl" placeholder="Por Favor Describa los Detalles Aquí" style="width: 100%; height: 200px; font-size: 14px;
                                                                          line-height: 18px; border: 1px solid #dddddd;
                                                                          padding: 10px;"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Rod-Marat:</label>
                                                    <br>
                                                    <input name="VIII_rod_marat" value="Si" type="radio" class="">
                                                    <span>
                                                        Si
                                                    </span>
                                                    <input name="VIII_rod_marat" value="No" type="radio" class="">
                                                    <span>
                                                        No
                                                    </span>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Descripción</label>
                                                    <div class="form-group has-success">
                                                        <textarea class="textarea" name="VIII_descripcion_rod_marat" placeholder="Por Favor Describa los Detalles Aquí" style="width: 100%; height: 200px; font-size: 14px;
                                                                          line-height: 18px; border: 1px solid #dddddd;
                                                                          padding: 10px;"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Dcs-Sdt:</label>
                                                    <br>
                                                    <input name="VIII_dcs_sdt" value="Si" type="radio" class="">
                                                    <span>
                                                        Si
                                                    </span>
                                                    <input name="VIII_dcs_sdt" value="No" type="radio" class="">
                                                    <span>
                                                        No
                                                    </span>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Descripción</label>
                                                    <div class="form-group has-success">
                                                        <textarea class="textarea" name="VIII_descripcion_dcs_sdt" placeholder="Por Favor Describa los Detalles Aquí" style="width: 100%; height: 200px; font-size: 14px;
                                                              line-height: 18px; border: 1px solid #dddddd;
                                                              padding: 10px;"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Marat-Bip:</label>
                                                    <br>
                                                    <input name="VIII_marat_bip" value="Si" type="radio" class="">
                                                    <span>
                                                        Si
                                                    </span>
                                                    <input name="VIII_marat_bip" value="No" type="radio" class="">
                                                    <span>
                                                        No
                                                    </span>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Descripción</label>
                                                    <div class="form-group has-success">
                                                        <textarea class="textarea" name="VIII_descripcion_marat_bip" placeholder="Por Favor Describa los Detalles Aquí" style="width: 100%; height: 200px; font-size: 14px;
                                                                          line-height: 18px; border: 1px solid #dddddd;
                                                                          padding: 10px;"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Dcp-4ptos:</label>
                                                    <br>
                                                    <input name="VIII_dcp_4ptos" value="Si" type="radio" class="">
                                                    <span>
                                                        Si
                                                    </span>
                                                    <input name="VIII_dcp_4ptos" value="No" type="radio" class="">
                                                    <span>
                                                        No
                                                    </span>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Descripción</label>
                                                    <div class="form-group has-success">
                                                        <textarea class="textarea" name="VIII_descripcion_dcp_4ptos" placeholder="Por Favor Describa los Detalles Aquí" style="width: 100%; height: 200px; font-size: 14px;
                                                                          line-height: 18px; border: 1px solid #dddddd;
                                                                          padding: 10px;"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Sdt-Bip:</label>
                                                    <br>
                                                    <input name="VIII_sdt_bip" value="Si" type="radio" class="">
                                                    <span>
                                                        Si
                                                    </span>
                                                    <input name="VIII_sdt_bip" value="No" type="radio" class="">
                                                    <span>
                                                        No
                                                    </span>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Descripción</label>
                                                    <div class="form-group has-success">
                                                        <textarea class="textarea" name="VIII_descripcion_sdt_bip" placeholder="Por Favor Describa los Detalles Aquí" style="width: 100%; height: 200px; font-size: 14px;
                                                                          line-height: 18px; border: 1px solid #dddddd;
                                                                          padding: 10px;"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>

                <div class="col-md-12">
                    <div class="box box-solid">
                        <div class="box-body">
                            


                        <label><input type="checkbox" name="cb-terminaste" required> Ya Terminé </label><br>


                    <input  type="hidden" name="email" value="<?php echo $correo_cliente;?>">
                    <input  type="hidden" name="nombre"  value="<?php echo $nombre_cliente;?>">
                    <input  type="hidden" name="telefono"  value="<?php echo $telefono_cliente ;?>">
                    <input  type="hidden" name="ID"  value="<?php echo $_SESSION['ID']?>">
                    <input  type="hidden" name="clienteId"  value="<?php echo $clienteId?>">
                    <input  type="hidden" name="NOMBRE_USUARIO"  value="<?php echo $_SESSION['NOMBRE_USUARIO']?>">
              
            


                            <div class="col-sm-12">
                                <br>
                                <br>
                                <center>
                                    <button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
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
          
          
          
     

<?php include("footer.php")?>
<script src="apiVoz_3.2.js"></script>
<?php include 'plantilla.php';?>
<script>
  // no quitar para evitar problemas de que guarde con este caracter " ' "
  $(document).on('input', 'input[type="text"], textarea', function() {
    $(this).val($(this).val().replace(/[']/g, ''));
  });
</script>
<script src="plugins/LottieK/lottie.min.js"></script>
<?php 
$usuariod_id_autoguardado = $_SESSION["ID"];
$cliente_id_autoguardado = $_GET['clienteId'];
$Nombre_Tabla_autoguardado = "Historia_Clinica_Fisioterapia";//nombre de la tabla de la base de datos de la historia
include 'AutoGuardado_Historia.php';// solo usarlo si la ruta de los get de la tabla no estan codificados y la ruta solo maneja el get clienteId sino es asi, manejar un autoguardado personalizado que estan en la carpeta AutoGuardados
?>





