<?php 
   include 'header.php';
   include 'menu.php';

    $clienteId = $_GET['clienteId']; 
    $usuarioId = $_GET['usuarioId']; 

    $ID = $_SESSION['ID'];


    $conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));


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
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Consulta Implantologia </h1>
      <ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
        <li><a href="#"> Consulta Implantologia</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">         
            <!-- /.box-header -->
            <div class="box-body">
              <div class="col-md-12">
                <div class="box box-solid">
                  <!-- /.box-header -->
                  <div class="box-body">
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

                            <div class="col-md-5">
                              <label><strong>Correo:</strong></label>
                              <label> <?php echo $correo_cliente;?>  </label>
                              <br>
                              <label><strong>Nombre:</strong></label>
                              <label><?php echo $nombre_cliente;?> </label>
                              <br>
                              <label><strong>Celular:</strong></label>
                              <label><?php echo $celular;?></label>
                          
                              <br> 
                              <label><strong>Ciudad:</strong></label>
                              <label><?php echo $ciudad_cliente;?></label>
                           
                              <br>
                              <label><strong>Fecha registro:</strong></label>
                              <label><?php echo $fechar;?></label>
                                
                              <br>
                              <label><strong>Cedula o ID:</strong></label>
                              <label><?php echo $CODI_CLIENTE;?></label>
                             
                              <br>
                              <label><strong> Es donante:</strong></label>
                              <label><?php echo $esDonante;?></label>
                             
                              <br>
                              <label><strong>Entidad de salud :</strong></label>
                              <label><?php echo $entidadSalud;?></label>
                            </div>
         
                            <div class="col-md-5">
                              <label><strong>  Dirección cliente:</strong></label>
                              <label><?php echo $direccion_cliente ;?></label>
                              <br>
                              <label><strong> Teléfono :</strong></label>
                              <label><?php echo $telefono_cliente ;?></label>
                              <br>
                              
                              <label><strong> Fecha de nacimiento :</strong></label>
                              <label><?php echo $fechaNacimiento;?></label>
                  
                              <br>
                              <label><strong> Edad :</strong></label>
                              <label><?php calculaedad($fechaNacimiento);?></label>
                  
                              <br>

                              <label><strong>Genero:</strong></label>
                              <label><?php echo $genero;?></label>

                              <br>
                              <label><strong>Profesión :</strong></label>
                              <label><?php echo $profesion_cliente ;?></label>

                              <br>
                                <label><strong>Tipo de sangre :</strong></label>
                                <label><?php echo $tiposSangre ;?></label>   
                              <br>
                              <br>
                              <label><strong>Seguro :</strong></label>
                              <label><?php echo $seguro;?></label>
                            </div>

                            <div class="col-md-2">

                              <?php
                                // echo strlen($logoF);
                                if (strlen($fotoperfil) > 0) { 
                                  echo '<img src="'.$Base.'/pascientes/'.$fotoperfil.'" width="90%" height="20%">';
                                }
                                else
                                {echo '';}
                              ?>
                              <input type="button" class="btn btn-block btn-primary btn-sm" value="Historial consultas" onclick="javascript:window.open('consultaHistoriaMedica.php?tipo=<?php echo $clienteId?>&ID=<?php echo $ID?>','','width=600,height=400,left=50,top=50,toolbar=yes');" />
   
                            </div>  
                            <br>
                        
                            <div class="col-md-12"><hr></div>
                            <div class="col-md-12">

                              <div class="col-md-12">

                                <label><strong>Toma algún medicamento:</strong></label>
                                <label><?php echo $tomaMedicamento ;?></label>   
                              </div>

                              <div class="form-group col-md-2" align="right">
                                Alergias a las aines  <?php echo sino($ap1)?>
                              </div>  
                               
                              <div class="form-group col-md-2" align="right">
                                Asma <?php echo sino($ap2)?>
                                
                              </div>

                              <div class="form-group col-md-2" align="right">
                                HTA <?php echo sino($ap3)?>
                               </div> 

                              <div class="form-group col-md-2" align="right">
                                Diabetes <?php echo sino($ap4)?>
                              </div>

                              <div class="form-group col-md-2" align="right">
                                Hipotiroidismo <?php echo sino($ap5)?>
                              </div>

                              <div class="form-group col-md-2" align="right">
                                Tabaquismo <?php echo sino($ap6)?>

                              </div>

                              <div class="form-group col-md-2" align="right">
                                Licor <?php echo sino($ap7)?>

                              </div>

                              <div class="form-group col-md-2" align="right">
                                Otras Alergias <?php echo sino($ap8)?>
                           
                              </div>

                              <div class="form-group col-md-2" align="right">
                                Cirugías <?php echo sino($ap9)?>
                            
                              </div>
                            </div>

                            <div class="form-group col-md-12" >

                              <label><strong>Antecedentes Familiares:</strong></label>
                              <label><?php echo $antecedentes;?></label>.
                              <br>
                              <label><strong>Alergias :</strong></label>
                              <label><?php echo $alergias;?></label>

                              <br>
                             
                              <label><strong>Notas adicionales :</strong></label>
                              <label><?php echo $nota;?></label>.

                            </div>

                          </div>
                        </div>
                      </div>

                      <div class="panel box box-secundary">
                        <div class="box-header with-border">
                          <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion1" href="#collapseTwo">
                              Exploración del Aparato Estomatognático
                            </a>
                          </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse">
                          <div class="box-header with-border">
                            <h2 class="box-title">Articulación Temporomandibular</h2>
                          </div>
                          <div class="box-body">

                            <div class="row">
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label">Ruido</label>
                                  <select class="form-control" name="">
                                    <option>Seleccione..</option>
                                    <option value="">Si</option>
                                    <option value="">No</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label">En que parte</label>
                                  <select class="form-control" name="">
                                    <option>Seleccione..</option>
                                    <option value="">Lateralidad</option>
                                    <option value="">Abertura</option>
                                  </select>
                                </div>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-12">
                                <table class="table table-bordered">
                                  <tr>
                                    <td>Chasquidos</td>
                                    <td>Si <input type="radio" name="" class="minimal"></td>
                                    <td>No <input type="radio" name="" class="minimal"></td>
                                  </tr>
                                  <tr>
                                    <td>Crepitación</td>
                                    <td>Si <input type="radio" name="" class="minimal"></td>
                                    <td>No <input type="radio" name="" class="minimal"></td>
                                  </tr>
                                  <tr>
                                    <td>Dificultad para abrir la boca</td>
                                    <td>Si <input type="radio" name="" class="minimal"></td>
                                    <td>No <input type="radio" name="" class="minimal"></td>
                                  </tr>
                                  <tr>
                                    <td>Dolor a la abertura o movimientos de lateralidad</td>
                                    <td>Si <input type="radio" name="" class="minimal"></td>
                                    <td>No <input type="radio" name="" class="minimal"></td>
                                  </tr>
                                  <tr>
                                    <td>Fatiga o dolor muscular</td>
                                    <td>Si <input type="radio" name="" class="minimal"></td>
                                    <td>No <input type="radio" name="" class="minimal"></td>
                                  </tr>
                                  <tr>
                                    <td>Disminución de la abertura</td>
                                    <td>Si <input type="radio" name="" class="minimal"></td>
                                    <td>No <input type="radio" name="" class="minimal"></td>
                                  </tr>
                                  <tr>
                                    <td>Desviación a la abertura o cierre</td>
                                    <td>Si <input type="radio" name="" class="minimal"></td>
                                    <td>No <input type="radio" name="" class="minimal"></td>
                                  </tr>
                                </table>
                              </div>
                            </div>

                            <div class="box-header with-border">
                              <h2 class="box-title">Tejidos Blandos</h2>
                            </div>
                            <br>
                            <div class="row">
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label">Ganglios</label>
                                  <input type="text" class="form-control" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label">Glandulas Salivales</label>
                                  <input type="text" class="form-control" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label">Labio Externo</label>
                                  <input type="text" class="form-control" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label">Borde Bermellón</label>
                                  <input type="text" class="form-control" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label">Labio Interno</label>
                                  <input type="text" class="form-control" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label">Comisuras</label>
                                  <input type="text" class="form-control" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label">Carrillos</label>
                                  <input type="text" class="form-control" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label">Fondo de Saco</label>
                                  <input type="text" class="form-control" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label">Lengua Tercio Medio</label>
                                  <input type="text" class="form-control" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label">Frenillos</label>
                                  <input type="text" class="form-control" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label">Paladar Duro</label>
                                  <input type="text" class="form-control" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label">Paladar Blando</label>
                                  <input type="text" class="form-control" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label">Itsmo Bucofaringe</label>
                                  <input type="text" class="form-control" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label">Lengua Dorso</label>
                                  <input type="text" class="form-control" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label">Lengua Bordes</label>
                                  <input type="text" class="form-control" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label">Lengua Ventral</label>
                                  <input type="text" class="form-control" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label">Piso de la Boca</label>
                                  <input type="text" class="form-control" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label">Dientes</label>
                                  <input type="text" class="form-control" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label">Mucosa del Borde Alveolar</label>
                                  <input type="text" class="form-control" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label">Encía</label>
                                  <input type="text" class="form-control" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>
                              </div>
                            </div>

                            <div class="box-header with-border">
                              <h2 class="box-title">Lesiones</h2>
                            </div>
                            <br>

                            <div class="row">
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label">Lesión Elemental</label>
                                  <input type="text" class="form-control" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label">Numero de Lesiones</label>
                                  <input type="text" class="form-control" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label">Forma</label>
                                  <input type="text" class="form-control" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label">Tamaño</label>
                                  <input type="text" class="form-control" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label">Color</label>
                                  <input type="text" class="form-control" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label">Superficie</label>
                                  <input type="text" class="form-control" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label">Base</label>
                                  <input type="text" class="form-control" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label">Consistencia</label>
                                  <input type="text" class="form-control" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">Sintomatología</label>
                                  <textarea class="form-control" rows="3" placeholder=""></textarea>
                                </div>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">Etiología</label>
                                  <textarea class="form-control" rows="3" placeholder=""></textarea>
                                </div>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">Evolución</label>
                                  <textarea class="form-control" rows="3" placeholder=""></textarea>
                                </div>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">Tratamiento Recibido</label>
                                  <textarea class="form-control" rows="3" placeholder=""></textarea>
                                </div>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">Cuadrante de Ubicación</label>
                                  <textarea class="form-control" rows="3" placeholder=""></textarea>
                                </div>
                              </div>
                            </div>

                            <div class="box-header with-border">
                              <h2 class="box-title">Análisis de la Oclusión</h2>
                            </div>
                            <br>

                            <div class="row">
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label">Plano Terminal</label>
                                  <select class="form-control">
                                    <option>Seleccione</option>
                                    <option>Mesial</option>
                                    <option>Mesial Exagerado</option>
                                    <option>Distal</option>
                                    <option>Recto</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label">Clase de Oclusión</label>
                                  <select class="form-control">
                                    <option>Seleccione</option>
                                    <option>I</option>
                                    <option>II</option>
                                    <option>III</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label">Linea Media</label>
                                  <select class="form-control">
                                    <option>Seleccione</option>
                                    <option>Normal</option>
                                    <option>Desviada Izquierda</option>
                                    <option>Desviada Derecha</option>
                                  </select>
                                </div>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label">Sobremordida Vertical</label>
                                  <select class="form-control">
                                    <option>Seleccione</option>
                                    <option>Normal</option>
                                    <option>Abierta</option>
                                    <option>Profunda</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label">Sobremordida Horizontal</label>
                                  <select class="form-control">
                                    <option>Seleccione</option>
                                    <option>Normal</option>
                                    <option>Borde a Borde</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label">Clase II</label>
                                  <input type="text" class="form-control" placeholder="" value="  mm" >
                                </div>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label">Clase III</label>
                                  <input type="text" class="form-control" placeholder="" value="  mm" >
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label">Mordida Cruzada</label>
                                  <select class="form-control">
                                    <option>Seleccione</option>
                                    <option>Anterior</option>
                                    <option>Posterior</option>
                                    <option>Unilateral</option>
                                    <option>Bilateral</option>
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
                            <a data-toggle="collapse" data-parent="#accordion1" href="#collapseTree">
                              Odontograma Diagnóstico
                            </a>
                          </h4>
                        </div>
                        <div id="collapseTree" class="panel-collapse collapse">
                          <div class="box-body">
                            <div class="row">
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">17</label>
                                  <select class="form-control">
                                    <option>Seleccione</option>
                                    <option>A/0 Sano</option>
                                    <option>B/1 Con Caries</option>
                                    <option>C/2 Obturado Con Caries</option>
                                    <option>D/3 Obturado Sin Caries</option>
                                    <option>E/4 Perdido como resultado por caries</option>
                                    <option>-/5 Perdido por cualquier otro motivo</option>
                                    <option>F/6 Fisura Obtura</option>
                                    <option>G/7 Soporte de puentes, corona, funda o implante</option>
                                    <option>-/8 Diente sin erupcionar</option>
                                    <option>T/T Traumatismo (fractura)</option>
                                    <option>-/9 No registrado</option>
                                    <option>11 Recesión Gingival</option>
                                    <option>12 Tratamiento de conductos</option>
                                    <option>13 Instrumento separado en un conducto</option>
                                    <option>14 Bolsas periodontales</option>
                                    <option>15 Fluorosis</option>
                                    <option>16 Alteraciones de forma, número, tamaño y textura</option>
                                    <option>17 Lesión Endoperiodontal</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">16</label>
                                  <select class="form-control">
                                    <option>Seleccione</option>
                                    <option>A/0 Sano</option>
                                    <option>B/1 Con Caries</option>
                                    <option>C/2 Obturado Con Caries</option>
                                    <option>D/3 Obturado Sin Caries</option>
                                    <option>E/4 Perdido como resultado por caries</option>
                                    <option>-/5 Perdido por cualquier otro motivo</option>
                                    <option>F/6 Fisura Obtura</option>
                                    <option>G/7 Soporte de puentes, corona, funda o implante</option>
                                    <option>-/8 Diente sin erupcionar</option>
                                    <option>T/T Traumatismo (fractura)</option>
                                    <option>-/9 No registrado</option>
                                    <option>11 Recesión Gingival</option>
                                    <option>12 Tratamiento de conductos</option>
                                    <option>13 Instrumento separado en un conducto</option>
                                    <option>14 Bolsas periodontales</option>
                                    <option>15 Fluorosis</option>
                                    <option>16 Alteraciones de forma, número, tamaño y textura</option>
                                    <option>17 Lesión Endoperiodontal</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">15</label>
                                  <select class="form-control">
                                    <option>Seleccione</option>
                                    <option>A/0 Sano</option>
                                    <option>B/1 Con Caries</option>
                                    <option>C/2 Obturado Con Caries</option>
                                    <option>D/3 Obturado Sin Caries</option>
                                    <option>E/4 Perdido como resultado por caries</option>
                                    <option>-/5 Perdido por cualquier otro motivo</option>
                                    <option>F/6 Fisura Obtura</option>
                                    <option>G/7 Soporte de puentes, corona, funda o implante</option>
                                    <option>-/8 Diente sin erupcionar</option>
                                    <option>T/T Traumatismo (fractura)</option>
                                    <option>-/9 No registrado</option>
                                    <option>11 Recesión Gingival</option>
                                    <option>12 Tratamiento de conductos</option>
                                    <option>13 Instrumento separado en un conducto</option>
                                    <option>14 Bolsas periodontales</option>
                                    <option>15 Fluorosis</option>
                                    <option>16 Alteraciones de forma, número, tamaño y textura</option>
                                    <option>17 Lesión Endoperiodontal</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">14</label>
                                  <select class="form-control">
                                    <option>Seleccione</option>
                                    <option>A/0 Sano</option>
                                    <option>B/1 Con Caries</option>
                                    <option>C/2 Obturado Con Caries</option>
                                    <option>D/3 Obturado Sin Caries</option>
                                    <option>E/4 Perdido como resultado por caries</option>
                                    <option>-/5 Perdido por cualquier otro motivo</option>
                                    <option>F/6 Fisura Obtura</option>
                                    <option>G/7 Soporte de puentes, corona, funda o implante</option>
                                    <option>-/8 Diente sin erupcionar</option>
                                    <option>T/T Traumatismo (fractura)</option>
                                    <option>-/9 No registrado</option>
                                    <option>11 Recesión Gingival</option>
                                    <option>12 Tratamiento de conductos</option>
                                    <option>13 Instrumento separado en un conducto</option>
                                    <option>14 Bolsas periodontales</option>
                                    <option>15 Fluorosis</option>
                                    <option>16 Alteraciones de forma, número, tamaño y textura</option>
                                    <option>17 Lesión Endoperiodontal</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">13</label>
                                  <select class="form-control">
                                    <option>Seleccione</option>
                                    <option>A/0 Sano</option>
                                    <option>B/1 Con Caries</option>
                                    <option>C/2 Obturado Con Caries</option>
                                    <option>D/3 Obturado Sin Caries</option>
                                    <option>E/4 Perdido como resultado por caries</option>
                                    <option>-/5 Perdido por cualquier otro motivo</option>
                                    <option>F/6 Fisura Obtura</option>
                                    <option>G/7 Soporte de puentes, corona, funda o implante</option>
                                    <option>-/8 Diente sin erupcionar</option>
                                    <option>T/T Traumatismo (fractura)</option>
                                    <option>-/9 No registrado</option>
                                    <option>11 Recesión Gingival</option>
                                    <option>12 Tratamiento de conductos</option>
                                    <option>13 Instrumento separado en un conducto</option>
                                    <option>14 Bolsas periodontales</option>
                                    <option>15 Fluorosis</option>
                                    <option>16 Alteraciones de forma, número, tamaño y textura</option>
                                    <option>17 Lesión Endoperiodontal</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">12</label>
                                  <select class="form-control">
                                    <option>Seleccione</option>
                                    <option>A/0 Sano</option>
                                    <option>B/1 Con Caries</option>
                                    <option>C/2 Obturado Con Caries</option>
                                    <option>D/3 Obturado Sin Caries</option>
                                    <option>E/4 Perdido como resultado por caries</option>
                                    <option>-/5 Perdido por cualquier otro motivo</option>
                                    <option>F/6 Fisura Obtura</option>
                                    <option>G/7 Soporte de puentes, corona, funda o implante</option>
                                    <option>-/8 Diente sin erupcionar</option>
                                    <option>T/T Traumatismo (fractura)</option>
                                    <option>-/9 No registrado</option>
                                    <option>11 Recesión Gingival</option>
                                    <option>12 Tratamiento de conductos</option>
                                    <option>13 Instrumento separado en un conducto</option>
                                    <option>14 Bolsas periodontales</option>
                                    <option>15 Fluorosis</option>
                                    <option>16 Alteraciones de forma, número, tamaño y textura</option>
                                    <option>17 Lesión Endoperiodontal</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">11</label>
                                  <select class="form-control">
                                    <option>Seleccione</option>
                                    <option>A/0 Sano</option>
                                    <option>B/1 Con Caries</option>
                                    <option>C/2 Obturado Con Caries</option>
                                    <option>D/3 Obturado Sin Caries</option>
                                    <option>E/4 Perdido como resultado por caries</option>
                                    <option>-/5 Perdido por cualquier otro motivo</option>
                                    <option>F/6 Fisura Obtura</option>
                                    <option>G/7 Soporte de puentes, corona, funda o implante</option>
                                    <option>-/8 Diente sin erupcionar</option>
                                    <option>T/T Traumatismo (fractura)</option>
                                    <option>-/9 No registrado</option>
                                    <option>11 Recesión Gingival</option>
                                    <option>12 Tratamiento de conductos</option>
                                    <option>13 Instrumento separado en un conducto</option>
                                    <option>14 Bolsas periodontales</option>
                                    <option>15 Fluorosis</option>
                                    <option>16 Alteraciones de forma, número, tamaño y textura</option>
                                    <option>17 Lesión Endoperiodontal</option>
                                  </select>
                                </div>
                              </div>
                            </div>

                            <br>

                            <div class="row">
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">27</label>
                                  <select class="form-control">
                                    <option>Seleccione</option>
                                    <option>A/0 Sano</option>
                                    <option>B/1 Con Caries</option>
                                    <option>C/2 Obturado Con Caries</option>
                                    <option>D/3 Obturado Sin Caries</option>
                                    <option>E/4 Perdido como resultado por caries</option>
                                    <option>-/5 Perdido por cualquier otro motivo</option>
                                    <option>F/6 Fisura Obtura</option>
                                    <option>G/7 Soporte de puentes, corona, funda o implante</option>
                                    <option>-/8 Diente sin erupcionar</option>
                                    <option>T/T Traumatismo (fractura)</option>
                                    <option>-/9 No registrado</option>
                                    <option>11 Recesión Gingival</option>
                                    <option>12 Tratamiento de conductos</option>
                                    <option>13 Instrumento separado en un conducto</option>
                                    <option>14 Bolsas periodontales</option>
                                    <option>15 Fluorosis</option>
                                    <option>16 Alteraciones de forma, número, tamaño y textura</option>
                                    <option>17 Lesión Endoperiodontal</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">26</label>
                                  <select class="form-control">
                                    <option>Seleccione</option>
                                    <option>A/0 Sano</option>
                                    <option>B/1 Con Caries</option>
                                    <option>C/2 Obturado Con Caries</option>
                                    <option>D/3 Obturado Sin Caries</option>
                                    <option>E/4 Perdido como resultado por caries</option>
                                    <option>-/5 Perdido por cualquier otro motivo</option>
                                    <option>F/6 Fisura Obtura</option>
                                    <option>G/7 Soporte de puentes, corona, funda o implante</option>
                                    <option>-/8 Diente sin erupcionar</option>
                                    <option>T/T Traumatismo (fractura)</option>
                                    <option>-/9 No registrado</option>
                                    <option>11 Recesión Gingival</option>
                                    <option>12 Tratamiento de conductos</option>
                                    <option>13 Instrumento separado en un conducto</option>
                                    <option>14 Bolsas periodontales</option>
                                    <option>15 Fluorosis</option>
                                    <option>16 Alteraciones de forma, número, tamaño y textura</option>
                                    <option>17 Lesión Endoperiodontal</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">25</label>
                                  <select class="form-control">
                                    <option>Seleccione</option>
                                    <option>A/0 Sano</option>
                                    <option>B/1 Con Caries</option>
                                    <option>C/2 Obturado Con Caries</option>
                                    <option>D/3 Obturado Sin Caries</option>
                                    <option>E/4 Perdido como resultado por caries</option>
                                    <option>-/5 Perdido por cualquier otro motivo</option>
                                    <option>F/6 Fisura Obtura</option>
                                    <option>G/7 Soporte de puentes, corona, funda o implante</option>
                                    <option>-/8 Diente sin erupcionar</option>
                                    <option>T/T Traumatismo (fractura)</option>
                                    <option>-/9 No registrado</option>
                                    <option>11 Recesión Gingival</option>
                                    <option>12 Tratamiento de conductos</option>
                                    <option>13 Instrumento separado en un conducto</option>
                                    <option>14 Bolsas periodontales</option>
                                    <option>15 Fluorosis</option>
                                    <option>16 Alteraciones de forma, número, tamaño y textura</option>
                                    <option>17 Lesión Endoperiodontal</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">24</label>
                                  <select class="form-control">
                                    <option>Seleccione</option>
                                    <option>A/0 Sano</option>
                                    <option>B/1 Con Caries</option>
                                    <option>C/2 Obturado Con Caries</option>
                                    <option>D/3 Obturado Sin Caries</option>
                                    <option>E/4 Perdido como resultado por caries</option>
                                    <option>-/5 Perdido por cualquier otro motivo</option>
                                    <option>F/6 Fisura Obtura</option>
                                    <option>G/7 Soporte de puentes, corona, funda o implante</option>
                                    <option>-/8 Diente sin erupcionar</option>
                                    <option>T/T Traumatismo (fractura)</option>
                                    <option>-/9 No registrado</option>
                                    <option>11 Recesión Gingival</option>
                                    <option>12 Tratamiento de conductos</option>
                                    <option>13 Instrumento separado en un conducto</option>
                                    <option>14 Bolsas periodontales</option>
                                    <option>15 Fluorosis</option>
                                    <option>16 Alteraciones de forma, número, tamaño y textura</option>
                                    <option>17 Lesión Endoperiodontal</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">23</label>
                                  <select class="form-control">
                                    <option>Seleccione</option>
                                    <option>A/0 Sano</option>
                                    <option>B/1 Con Caries</option>
                                    <option>C/2 Obturado Con Caries</option>
                                    <option>D/3 Obturado Sin Caries</option>
                                    <option>E/4 Perdido como resultado por caries</option>
                                    <option>-/5 Perdido por cualquier otro motivo</option>
                                    <option>F/6 Fisura Obtura</option>
                                    <option>G/7 Soporte de puentes, corona, funda o implante</option>
                                    <option>-/8 Diente sin erupcionar</option>
                                    <option>T/T Traumatismo (fractura)</option>
                                    <option>-/9 No registrado</option>
                                    <option>11 Recesión Gingival</option>
                                    <option>12 Tratamiento de conductos</option>
                                    <option>13 Instrumento separado en un conducto</option>
                                    <option>14 Bolsas periodontales</option>
                                    <option>15 Fluorosis</option>
                                    <option>16 Alteraciones de forma, número, tamaño y textura</option>
                                    <option>17 Lesión Endoperiodontal</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">22</label>
                                  <select class="form-control">
                                    <option>Seleccione</option>
                                    <option>A/0 Sano</option>
                                    <option>B/1 Con Caries</option>
                                    <option>C/2 Obturado Con Caries</option>
                                    <option>D/3 Obturado Sin Caries</option>
                                    <option>E/4 Perdido como resultado por caries</option>
                                    <option>-/5 Perdido por cualquier otro motivo</option>
                                    <option>F/6 Fisura Obtura</option>
                                    <option>G/7 Soporte de puentes, corona, funda o implante</option>
                                    <option>-/8 Diente sin erupcionar</option>
                                    <option>T/T Traumatismo (fractura)</option>
                                    <option>-/9 No registrado</option>
                                    <option>11 Recesión Gingival</option>
                                    <option>12 Tratamiento de conductos</option>
                                    <option>13 Instrumento separado en un conducto</option>
                                    <option>14 Bolsas periodontales</option>
                                    <option>15 Fluorosis</option>
                                    <option>16 Alteraciones de forma, número, tamaño y textura</option>
                                    <option>17 Lesión Endoperiodontal</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">21</label>
                                  <select class="form-control">
                                    <option>Seleccione</option>
                                    <option>A/0 Sano</option>
                                    <option>B/1 Con Caries</option>
                                    <option>C/2 Obturado Con Caries</option>
                                    <option>D/3 Obturado Sin Caries</option>
                                    <option>E/4 Perdido como resultado por caries</option>
                                    <option>-/5 Perdido por cualquier otro motivo</option>
                                    <option>F/6 Fisura Obtura</option>
                                    <option>G/7 Soporte de puentes, corona, funda o implante</option>
                                    <option>-/8 Diente sin erupcionar</option>
                                    <option>T/T Traumatismo (fractura)</option>
                                    <option>-/9 No registrado</option>
                                    <option>11 Recesión Gingival</option>
                                    <option>12 Tratamiento de conductos</option>
                                    <option>13 Instrumento separado en un conducto</option>
                                    <option>14 Bolsas periodontales</option>
                                    <option>15 Fluorosis</option>
                                    <option>16 Alteraciones de forma, número, tamaño y textura</option>
                                    <option>17 Lesión Endoperiodontal</option>
                                  </select>
                                </div>
                              </div>
                            </div>

                            <br>

                            <div class="row">
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">55</label>
                                  <select class="form-control">
                                    <option>Seleccione</option>
                                    <option>A/0 Sano</option>
                                    <option>B/1 Con Caries</option>
                                    <option>C/2 Obturado Con Caries</option>
                                    <option>D/3 Obturado Sin Caries</option>
                                    <option>E/4 Perdido como resultado por caries</option>
                                    <option>-/5 Perdido por cualquier otro motivo</option>
                                    <option>F/6 Fisura Obtura</option>
                                    <option>G/7 Soporte de puentes, corona, funda o implante</option>
                                    <option>-/8 Diente sin erupcionar</option>
                                    <option>T/T Traumatismo (fractura)</option>
                                    <option>-/9 No registrado</option>
                                    <option>11 Recesión Gingival</option>
                                    <option>12 Tratamiento de conductos</option>
                                    <option>13 Instrumento separado en un conducto</option>
                                    <option>14 Bolsas periodontales</option>
                                    <option>15 Fluorosis</option>
                                    <option>16 Alteraciones de forma, número, tamaño y textura</option>
                                    <option>17 Lesión Endoperiodontal</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">54</label>
                                  <select class="form-control">
                                    <option>Seleccione</option>
                                    <option>A/0 Sano</option>
                                    <option>B/1 Con Caries</option>
                                    <option>C/2 Obturado Con Caries</option>
                                    <option>D/3 Obturado Sin Caries</option>
                                    <option>E/4 Perdido como resultado por caries</option>
                                    <option>-/5 Perdido por cualquier otro motivo</option>
                                    <option>F/6 Fisura Obtura</option>
                                    <option>G/7 Soporte de puentes, corona, funda o implante</option>
                                    <option>-/8 Diente sin erupcionar</option>
                                    <option>T/T Traumatismo (fractura)</option>
                                    <option>-/9 No registrado</option>
                                    <option>11 Recesión Gingival</option>
                                    <option>12 Tratamiento de conductos</option>
                                    <option>13 Instrumento separado en un conducto</option>
                                    <option>14 Bolsas periodontales</option>
                                    <option>15 Fluorosis</option>
                                    <option>16 Alteraciones de forma, número, tamaño y textura</option>
                                    <option>17 Lesión Endoperiodontal</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">53</label>
                                  <select class="form-control">
                                    <option>Seleccione</option>
                                    <option>A/0 Sano</option>
                                    <option>B/1 Con Caries</option>
                                    <option>C/2 Obturado Con Caries</option>
                                    <option>D/3 Obturado Sin Caries</option>
                                    <option>E/4 Perdido como resultado por caries</option>
                                    <option>-/5 Perdido por cualquier otro motivo</option>
                                    <option>F/6 Fisura Obtura</option>
                                    <option>G/7 Soporte de puentes, corona, funda o implante</option>
                                    <option>-/8 Diente sin erupcionar</option>
                                    <option>T/T Traumatismo (fractura)</option>
                                    <option>-/9 No registrado</option>
                                    <option>11 Recesión Gingival</option>
                                    <option>12 Tratamiento de conductos</option>
                                    <option>13 Instrumento separado en un conducto</option>
                                    <option>14 Bolsas periodontales</option>
                                    <option>15 Fluorosis</option>
                                    <option>16 Alteraciones de forma, número, tamaño y textura</option>
                                    <option>17 Lesión Endoperiodontal</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">52</label>
                                  <select class="form-control">
                                    <option>Seleccione</option>
                                    <option>A/0 Sano</option>
                                    <option>B/1 Con Caries</option>
                                    <option>C/2 Obturado Con Caries</option>
                                    <option>D/3 Obturado Sin Caries</option>
                                    <option>E/4 Perdido como resultado por caries</option>
                                    <option>-/5 Perdido por cualquier otro motivo</option>
                                    <option>F/6 Fisura Obtura</option>
                                    <option>G/7 Soporte de puentes, corona, funda o implante</option>
                                    <option>-/8 Diente sin erupcionar</option>
                                    <option>T/T Traumatismo (fractura)</option>
                                    <option>-/9 No registrado</option>
                                    <option>11 Recesión Gingival</option>
                                    <option>12 Tratamiento de conductos</option>
                                    <option>13 Instrumento separado en un conducto</option>
                                    <option>14 Bolsas periodontales</option>
                                    <option>15 Fluorosis</option>
                                    <option>16 Alteraciones de forma, número, tamaño y textura</option>
                                    <option>17 Lesión Endoperiodontal</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">51</label>
                                  <select class="form-control">
                                    <option>Seleccione</option>
                                    <option>A/0 Sano</option>
                                    <option>B/1 Con Caries</option>
                                    <option>C/2 Obturado Con Caries</option>
                                    <option>D/3 Obturado Sin Caries</option>
                                    <option>E/4 Perdido como resultado por caries</option>
                                    <option>-/5 Perdido por cualquier otro motivo</option>
                                    <option>F/6 Fisura Obtura</option>
                                    <option>G/7 Soporte de puentes, corona, funda o implante</option>
                                    <option>-/8 Diente sin erupcionar</option>
                                    <option>T/T Traumatismo (fractura)</option>
                                    <option>-/9 No registrado</option>
                                    <option>11 Recesión Gingival</option>
                                    <option>12 Tratamiento de conductos</option>
                                    <option>13 Instrumento separado en un conducto</option>
                                    <option>14 Bolsas periodontales</option>
                                    <option>15 Fluorosis</option>
                                    <option>16 Alteraciones de forma, número, tamaño y textura</option>
                                    <option>17 Lesión Endoperiodontal</option>
                                  </select>
                                </div>
                              </div>
                            </div>

                            <br>

                            <div class="row">
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">65</label>
                                  <select class="form-control">
                                    <option>Seleccione</option>
                                    <option>A/0 Sano</option>
                                    <option>B/1 Con Caries</option>
                                    <option>C/2 Obturado Con Caries</option>
                                    <option>D/3 Obturado Sin Caries</option>
                                    <option>E/4 Perdido como resultado por caries</option>
                                    <option>-/5 Perdido por cualquier otro motivo</option>
                                    <option>F/6 Fisura Obtura</option>
                                    <option>G/7 Soporte de puentes, corona, funda o implante</option>
                                    <option>-/8 Diente sin erupcionar</option>
                                    <option>T/T Traumatismo (fractura)</option>
                                    <option>-/9 No registrado</option>
                                    <option>11 Recesión Gingival</option>
                                    <option>12 Tratamiento de conductos</option>
                                    <option>13 Instrumento separado en un conducto</option>
                                    <option>14 Bolsas periodontales</option>
                                    <option>15 Fluorosis</option>
                                    <option>16 Alteraciones de forma, número, tamaño y textura</option>
                                    <option>17 Lesión Endoperiodontal</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">64</label>
                                  <select class="form-control">
                                    <option>Seleccione</option>
                                    <option>A/0 Sano</option>
                                    <option>B/1 Con Caries</option>
                                    <option>C/2 Obturado Con Caries</option>
                                    <option>D/3 Obturado Sin Caries</option>
                                    <option>E/4 Perdido como resultado por caries</option>
                                    <option>-/5 Perdido por cualquier otro motivo</option>
                                    <option>F/6 Fisura Obtura</option>
                                    <option>G/7 Soporte de puentes, corona, funda o implante</option>
                                    <option>-/8 Diente sin erupcionar</option>
                                    <option>T/T Traumatismo (fractura)</option>
                                    <option>-/9 No registrado</option>
                                    <option>11 Recesión Gingival</option>
                                    <option>12 Tratamiento de conductos</option>
                                    <option>13 Instrumento separado en un conducto</option>
                                    <option>14 Bolsas periodontales</option>
                                    <option>15 Fluorosis</option>
                                    <option>16 Alteraciones de forma, número, tamaño y textura</option>
                                    <option>17 Lesión Endoperiodontal</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">63</label>
                                  <select class="form-control">
                                    <option>Seleccione</option>
                                    <option>A/0 Sano</option>
                                    <option>B/1 Con Caries</option>
                                    <option>C/2 Obturado Con Caries</option>
                                    <option>D/3 Obturado Sin Caries</option>
                                    <option>E/4 Perdido como resultado por caries</option>
                                    <option>-/5 Perdido por cualquier otro motivo</option>
                                    <option>F/6 Fisura Obtura</option>
                                    <option>G/7 Soporte de puentes, corona, funda o implante</option>
                                    <option>-/8 Diente sin erupcionar</option>
                                    <option>T/T Traumatismo (fractura)</option>
                                    <option>-/9 No registrado</option>
                                    <option>11 Recesión Gingival</option>
                                    <option>12 Tratamiento de conductos</option>
                                    <option>13 Instrumento separado en un conducto</option>
                                    <option>14 Bolsas periodontales</option>
                                    <option>15 Fluorosis</option>
                                    <option>16 Alteraciones de forma, número, tamaño y textura</option>
                                    <option>17 Lesión Endoperiodontal</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">62</label>
                                  <select class="form-control">
                                    <option>Seleccione</option>
                                    <option>A/0 Sano</option>
                                    <option>B/1 Con Caries</option>
                                    <option>C/2 Obturado Con Caries</option>
                                    <option>D/3 Obturado Sin Caries</option>
                                    <option>E/4 Perdido como resultado por caries</option>
                                    <option>-/5 Perdido por cualquier otro motivo</option>
                                    <option>F/6 Fisura Obtura</option>
                                    <option>G/7 Soporte de puentes, corona, funda o implante</option>
                                    <option>-/8 Diente sin erupcionar</option>
                                    <option>T/T Traumatismo (fractura)</option>
                                    <option>-/9 No registrado</option>
                                    <option>11 Recesión Gingival</option>
                                    <option>12 Tratamiento de conductos</option>
                                    <option>13 Instrumento separado en un conducto</option>
                                    <option>14 Bolsas periodontales</option>
                                    <option>15 Fluorosis</option>
                                    <option>16 Alteraciones de forma, número, tamaño y textura</option>
                                    <option>17 Lesión Endoperiodontal</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">61</label>
                                  <select class="form-control">
                                    <option>Seleccione</option>
                                    <option>A/0 Sano</option>
                                    <option>B/1 Con Caries</option>
                                    <option>C/2 Obturado Con Caries</option>
                                    <option>D/3 Obturado Sin Caries</option>
                                    <option>E/4 Perdido como resultado por caries</option>
                                    <option>-/5 Perdido por cualquier otro motivo</option>
                                    <option>F/6 Fisura Obtura</option>
                                    <option>G/7 Soporte de puentes, corona, funda o implante</option>
                                    <option>-/8 Diente sin erupcionar</option>
                                    <option>T/T Traumatismo (fractura)</option>
                                    <option>-/9 No registrado</option>
                                    <option>11 Recesión Gingival</option>
                                    <option>12 Tratamiento de conductos</option>
                                    <option>13 Instrumento separado en un conducto</option>
                                    <option>14 Bolsas periodontales</option>
                                    <option>15 Fluorosis</option>
                                    <option>16 Alteraciones de forma, número, tamaño y textura</option>
                                    <option>17 Lesión Endoperiodontal</option>
                                  </select>
                                </div>
                              </div>
                            </div>

                            <br>

                            <div class="row">
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">85</label>
                                  <select class="form-control">
                                    <option>Seleccione</option>
                                    <option>A/0 Sano</option>
                                    <option>B/1 Con Caries</option>
                                    <option>C/2 Obturado Con Caries</option>
                                    <option>D/3 Obturado Sin Caries</option>
                                    <option>E/4 Perdido como resultado por caries</option>
                                    <option>-/5 Perdido por cualquier otro motivo</option>
                                    <option>F/6 Fisura Obtura</option>
                                    <option>G/7 Soporte de puentes, corona, funda o implante</option>
                                    <option>-/8 Diente sin erupcionar</option>
                                    <option>T/T Traumatismo (fractura)</option>
                                    <option>-/9 No registrado</option>
                                    <option>11 Recesión Gingival</option>
                                    <option>12 Tratamiento de conductos</option>
                                    <option>13 Instrumento separado en un conducto</option>
                                    <option>14 Bolsas periodontales</option>
                                    <option>15 Fluorosis</option>
                                    <option>16 Alteraciones de forma, número, tamaño y textura</option>
                                    <option>17 Lesión Endoperiodontal</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">84</label>
                                  <select class="form-control">
                                    <option>Seleccione</option>
                                    <option>A/0 Sano</option>
                                    <option>B/1 Con Caries</option>
                                    <option>C/2 Obturado Con Caries</option>
                                    <option>D/3 Obturado Sin Caries</option>
                                    <option>E/4 Perdido como resultado por caries</option>
                                    <option>-/5 Perdido por cualquier otro motivo</option>
                                    <option>F/6 Fisura Obtura</option>
                                    <option>G/7 Soporte de puentes, corona, funda o implante</option>
                                    <option>-/8 Diente sin erupcionar</option>
                                    <option>T/T Traumatismo (fractura)</option>
                                    <option>-/9 No registrado</option>
                                    <option>11 Recesión Gingival</option>
                                    <option>12 Tratamiento de conductos</option>
                                    <option>13 Instrumento separado en un conducto</option>
                                    <option>14 Bolsas periodontales</option>
                                    <option>15 Fluorosis</option>
                                    <option>16 Alteraciones de forma, número, tamaño y textura</option>
                                    <option>17 Lesión Endoperiodontal</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">83</label>
                                  <select class="form-control">
                                    <option>Seleccione</option>
                                    <option>A/0 Sano</option>
                                    <option>B/1 Con Caries</option>
                                    <option>C/2 Obturado Con Caries</option>
                                    <option>D/3 Obturado Sin Caries</option>
                                    <option>E/4 Perdido como resultado por caries</option>
                                    <option>-/5 Perdido por cualquier otro motivo</option>
                                    <option>F/6 Fisura Obtura</option>
                                    <option>G/7 Soporte de puentes, corona, funda o implante</option>
                                    <option>-/8 Diente sin erupcionar</option>
                                    <option>T/T Traumatismo (fractura)</option>
                                    <option>-/9 No registrado</option>
                                    <option>11 Recesión Gingival</option>
                                    <option>12 Tratamiento de conductos</option>
                                    <option>13 Instrumento separado en un conducto</option>
                                    <option>14 Bolsas periodontales</option>
                                    <option>15 Fluorosis</option>
                                    <option>16 Alteraciones de forma, número, tamaño y textura</option>
                                    <option>17 Lesión Endoperiodontal</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">82</label>
                                  <select class="form-control">
                                    <option>Seleccione</option>
                                    <option>A/0 Sano</option>
                                    <option>B/1 Con Caries</option>
                                    <option>C/2 Obturado Con Caries</option>
                                    <option>D/3 Obturado Sin Caries</option>
                                    <option>E/4 Perdido como resultado por caries</option>
                                    <option>-/5 Perdido por cualquier otro motivo</option>
                                    <option>F/6 Fisura Obtura</option>
                                    <option>G/7 Soporte de puentes, corona, funda o implante</option>
                                    <option>-/8 Diente sin erupcionar</option>
                                    <option>T/T Traumatismo (fractura)</option>
                                    <option>-/9 No registrado</option>
                                    <option>11 Recesión Gingival</option>
                                    <option>12 Tratamiento de conductos</option>
                                    <option>13 Instrumento separado en un conducto</option>
                                    <option>14 Bolsas periodontales</option>
                                    <option>15 Fluorosis</option>
                                    <option>16 Alteraciones de forma, número, tamaño y textura</option>
                                    <option>17 Lesión Endoperiodontal</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">81</label>
                                  <select class="form-control">
                                    <option>Seleccione</option>
                                    <option>A/0 Sano</option>
                                    <option>B/1 Con Caries</option>
                                    <option>C/2 Obturado Con Caries</option>
                                    <option>D/3 Obturado Sin Caries</option>
                                    <option>E/4 Perdido como resultado por caries</option>
                                    <option>-/5 Perdido por cualquier otro motivo</option>
                                    <option>F/6 Fisura Obtura</option>
                                    <option>G/7 Soporte de puentes, corona, funda o implante</option>
                                    <option>-/8 Diente sin erupcionar</option>
                                    <option>T/T Traumatismo (fractura)</option>
                                    <option>-/9 No registrado</option>
                                    <option>11 Recesión Gingival</option>
                                    <option>12 Tratamiento de conductos</option>
                                    <option>13 Instrumento separado en un conducto</option>
                                    <option>14 Bolsas periodontales</option>
                                    <option>15 Fluorosis</option>
                                    <option>16 Alteraciones de forma, número, tamaño y textura</option>
                                    <option>17 Lesión Endoperiodontal</option>
                                  </select>
                                </div>
                              </div>
                            </div>

                            <br>

                            <div class="row">
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">75</label>
                                  <select class="form-control">
                                    <option>Seleccione</option>
                                    <option>A/0 Sano</option>
                                    <option>B/1 Con Caries</option>
                                    <option>C/2 Obturado Con Caries</option>
                                    <option>D/3 Obturado Sin Caries</option>
                                    <option>E/4 Perdido como resultado por caries</option>
                                    <option>-/5 Perdido por cualquier otro motivo</option>
                                    <option>F/6 Fisura Obtura</option>
                                    <option>G/7 Soporte de puentes, corona, funda o implante</option>
                                    <option>-/8 Diente sin erupcionar</option>
                                    <option>T/T Traumatismo (fractura)</option>
                                    <option>-/9 No registrado</option>
                                    <option>11 Recesión Gingival</option>
                                    <option>12 Tratamiento de conductos</option>
                                    <option>13 Instrumento separado en un conducto</option>
                                    <option>14 Bolsas periodontales</option>
                                    <option>15 Fluorosis</option>
                                    <option>16 Alteraciones de forma, número, tamaño y textura</option>
                                    <option>17 Lesión Endoperiodontal</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">74</label>
                                  <select class="form-control">
                                    <option>Seleccione</option>
                                    <option>A/0 Sano</option>
                                    <option>B/1 Con Caries</option>
                                    <option>C/2 Obturado Con Caries</option>
                                    <option>D/3 Obturado Sin Caries</option>
                                    <option>E/4 Perdido como resultado por caries</option>
                                    <option>-/5 Perdido por cualquier otro motivo</option>
                                    <option>F/6 Fisura Obtura</option>
                                    <option>G/7 Soporte de puentes, corona, funda o implante</option>
                                    <option>-/8 Diente sin erupcionar</option>
                                    <option>T/T Traumatismo (fractura)</option>
                                    <option>-/9 No registrado</option>
                                    <option>11 Recesión Gingival</option>
                                    <option>12 Tratamiento de conductos</option>
                                    <option>13 Instrumento separado en un conducto</option>
                                    <option>14 Bolsas periodontales</option>
                                    <option>15 Fluorosis</option>
                                    <option>16 Alteraciones de forma, número, tamaño y textura</option>
                                    <option>17 Lesión Endoperiodontal</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">73</label>
                                  <select class="form-control">
                                    <option>Seleccione</option>
                                    <option>A/0 Sano</option>
                                    <option>B/1 Con Caries</option>
                                    <option>C/2 Obturado Con Caries</option>
                                    <option>D/3 Obturado Sin Caries</option>
                                    <option>E/4 Perdido como resultado por caries</option>
                                    <option>-/5 Perdido por cualquier otro motivo</option>
                                    <option>F/6 Fisura Obtura</option>
                                    <option>G/7 Soporte de puentes, corona, funda o implante</option>
                                    <option>-/8 Diente sin erupcionar</option>
                                    <option>T/T Traumatismo (fractura)</option>
                                    <option>-/9 No registrado</option>
                                    <option>11 Recesión Gingival</option>
                                    <option>12 Tratamiento de conductos</option>
                                    <option>13 Instrumento separado en un conducto</option>
                                    <option>14 Bolsas periodontales</option>
                                    <option>15 Fluorosis</option>
                                    <option>16 Alteraciones de forma, número, tamaño y textura</option>
                                    <option>17 Lesión Endoperiodontal</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">72</label>
                                  <select class="form-control">
                                    <option>Seleccione</option>
                                    <option>A/0 Sano</option>
                                    <option>B/1 Con Caries</option>
                                    <option>C/2 Obturado Con Caries</option>
                                    <option>D/3 Obturado Sin Caries</option>
                                    <option>E/4 Perdido como resultado por caries</option>
                                    <option>-/5 Perdido por cualquier otro motivo</option>
                                    <option>F/6 Fisura Obtura</option>
                                    <option>G/7 Soporte de puentes, corona, funda o implante</option>
                                    <option>-/8 Diente sin erupcionar</option>
                                    <option>T/T Traumatismo (fractura)</option>
                                    <option>-/9 No registrado</option>
                                    <option>11 Recesión Gingival</option>
                                    <option>12 Tratamiento de conductos</option>
                                    <option>13 Instrumento separado en un conducto</option>
                                    <option>14 Bolsas periodontales</option>
                                    <option>15 Fluorosis</option>
                                    <option>16 Alteraciones de forma, número, tamaño y textura</option>
                                    <option>17 Lesión Endoperiodontal</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">71</label>
                                  <select class="form-control">
                                    <option>Seleccione</option>
                                    <option>A/0 Sano</option>
                                    <option>B/1 Con Caries</option>
                                    <option>C/2 Obturado Con Caries</option>
                                    <option>D/3 Obturado Sin Caries</option>
                                    <option>E/4 Perdido como resultado por caries</option>
                                    <option>-/5 Perdido por cualquier otro motivo</option>
                                    <option>F/6 Fisura Obtura</option>
                                    <option>G/7 Soporte de puentes, corona, funda o implante</option>
                                    <option>-/8 Diente sin erupcionar</option>
                                    <option>T/T Traumatismo (fractura)</option>
                                    <option>-/9 No registrado</option>
                                    <option>11 Recesión Gingival</option>
                                    <option>12 Tratamiento de conductos</option>
                                    <option>13 Instrumento separado en un conducto</option>
                                    <option>14 Bolsas periodontales</option>
                                    <option>15 Fluorosis</option>
                                    <option>16 Alteraciones de forma, número, tamaño y textura</option>
                                    <option>17 Lesión Endoperiodontal</option>
                                  </select>
                                </div>
                              </div>
                            </div>

                            <br>

                            <div class="row">
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">47</label>
                                  <select class="form-control">
                                    <option>Seleccione</option>
                                    <option>A/0 Sano</option>
                                    <option>B/1 Con Caries</option>
                                    <option>C/2 Obturado Con Caries</option>
                                    <option>D/3 Obturado Sin Caries</option>
                                    <option>E/4 Perdido como resultado por caries</option>
                                    <option>-/5 Perdido por cualquier otro motivo</option>
                                    <option>F/6 Fisura Obtura</option>
                                    <option>G/7 Soporte de puentes, corona, funda o implante</option>
                                    <option>-/8 Diente sin erupcionar</option>
                                    <option>T/T Traumatismo (fractura)</option>
                                    <option>-/9 No registrado</option>
                                    <option>11 Recesión Gingival</option>
                                    <option>12 Tratamiento de conductos</option>
                                    <option>13 Instrumento separado en un conducto</option>
                                    <option>14 Bolsas periodontales</option>
                                    <option>15 Fluorosis</option>
                                    <option>16 Alteraciones de forma, número, tamaño y textura</option>
                                    <option>17 Lesión Endoperiodontal</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">46</label>
                                  <select class="form-control">
                                    <option>Seleccione</option>
                                    <option>A/0 Sano</option>
                                    <option>B/1 Con Caries</option>
                                    <option>C/2 Obturado Con Caries</option>
                                    <option>D/3 Obturado Sin Caries</option>
                                    <option>E/4 Perdido como resultado por caries</option>
                                    <option>-/5 Perdido por cualquier otro motivo</option>
                                    <option>F/6 Fisura Obtura</option>
                                    <option>G/7 Soporte de puentes, corona, funda o implante</option>
                                    <option>-/8 Diente sin erupcionar</option>
                                    <option>T/T Traumatismo (fractura)</option>
                                    <option>-/9 No registrado</option>
                                    <option>11 Recesión Gingival</option>
                                    <option>12 Tratamiento de conductos</option>
                                    <option>13 Instrumento separado en un conducto</option>
                                    <option>14 Bolsas periodontales</option>
                                    <option>15 Fluorosis</option>
                                    <option>16 Alteraciones de forma, número, tamaño y textura</option>
                                    <option>17 Lesión Endoperiodontal</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">45</label>
                                  <select class="form-control">
                                    <option>Seleccione</option>
                                    <option>A/0 Sano</option>
                                    <option>B/1 Con Caries</option>
                                    <option>C/2 Obturado Con Caries</option>
                                    <option>D/3 Obturado Sin Caries</option>
                                    <option>E/4 Perdido como resultado por caries</option>
                                    <option>-/5 Perdido por cualquier otro motivo</option>
                                    <option>F/6 Fisura Obtura</option>
                                    <option>G/7 Soporte de puentes, corona, funda o implante</option>
                                    <option>-/8 Diente sin erupcionar</option>
                                    <option>T/T Traumatismo (fractura)</option>
                                    <option>-/9 No registrado</option>
                                    <option>11 Recesión Gingival</option>
                                    <option>12 Tratamiento de conductos</option>
                                    <option>13 Instrumento separado en un conducto</option>
                                    <option>14 Bolsas periodontales</option>
                                    <option>15 Fluorosis</option>
                                    <option>16 Alteraciones de forma, número, tamaño y textura</option>
                                    <option>17 Lesión Endoperiodontal</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">44</label>
                                  <select class="form-control">
                                    <option>Seleccione</option>
                                    <option>A/0 Sano</option>
                                    <option>B/1 Con Caries</option>
                                    <option>C/2 Obturado Con Caries</option>
                                    <option>D/3 Obturado Sin Caries</option>
                                    <option>E/4 Perdido como resultado por caries</option>
                                    <option>-/5 Perdido por cualquier otro motivo</option>
                                    <option>F/6 Fisura Obtura</option>
                                    <option>G/7 Soporte de puentes, corona, funda o implante</option>
                                    <option>-/8 Diente sin erupcionar</option>
                                    <option>T/T Traumatismo (fractura)</option>
                                    <option>-/9 No registrado</option>
                                    <option>11 Recesión Gingival</option>
                                    <option>12 Tratamiento de conductos</option>
                                    <option>13 Instrumento separado en un conducto</option>
                                    <option>14 Bolsas periodontales</option>
                                    <option>15 Fluorosis</option>
                                    <option>16 Alteraciones de forma, número, tamaño y textura</option>
                                    <option>17 Lesión Endoperiodontal</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">43</label>
                                  <select class="form-control">
                                    <option>Seleccione</option>
                                    <option>A/0 Sano</option>
                                    <option>B/1 Con Caries</option>
                                    <option>C/2 Obturado Con Caries</option>
                                    <option>D/3 Obturado Sin Caries</option>
                                    <option>E/4 Perdido como resultado por caries</option>
                                    <option>-/5 Perdido por cualquier otro motivo</option>
                                    <option>F/6 Fisura Obtura</option>
                                    <option>G/7 Soporte de puentes, corona, funda o implante</option>
                                    <option>-/8 Diente sin erupcionar</option>
                                    <option>T/T Traumatismo (fractura)</option>
                                    <option>-/9 No registrado</option>
                                    <option>11 Recesión Gingival</option>
                                    <option>12 Tratamiento de conductos</option>
                                    <option>13 Instrumento separado en un conducto</option>
                                    <option>14 Bolsas periodontales</option>
                                    <option>15 Fluorosis</option>
                                    <option>16 Alteraciones de forma, número, tamaño y textura</option>
                                    <option>17 Lesión Endoperiodontal</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">42</label>
                                  <select class="form-control">
                                    <option>Seleccione</option>
                                    <option>A/0 Sano</option>
                                    <option>B/1 Con Caries</option>
                                    <option>C/2 Obturado Con Caries</option>
                                    <option>D/3 Obturado Sin Caries</option>
                                    <option>E/4 Perdido como resultado por caries</option>
                                    <option>-/5 Perdido por cualquier otro motivo</option>
                                    <option>F/6 Fisura Obtura</option>
                                    <option>G/7 Soporte de puentes, corona, funda o implante</option>
                                    <option>-/8 Diente sin erupcionar</option>
                                    <option>T/T Traumatismo (fractura)</option>
                                    <option>-/9 No registrado</option>
                                    <option>11 Recesión Gingival</option>
                                    <option>12 Tratamiento de conductos</option>
                                    <option>13 Instrumento separado en un conducto</option>
                                    <option>14 Bolsas periodontales</option>
                                    <option>15 Fluorosis</option>
                                    <option>16 Alteraciones de forma, número, tamaño y textura</option>
                                    <option>17 Lesión Endoperiodontal</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">41</label>
                                  <select class="form-control">
                                    <option>Seleccione</option>
                                    <option>A/0 Sano</option>
                                    <option>B/1 Con Caries</option>
                                    <option>C/2 Obturado Con Caries</option>
                                    <option>D/3 Obturado Sin Caries</option>
                                    <option>E/4 Perdido como resultado por caries</option>
                                    <option>-/5 Perdido por cualquier otro motivo</option>
                                    <option>F/6 Fisura Obtura</option>
                                    <option>G/7 Soporte de puentes, corona, funda o implante</option>
                                    <option>-/8 Diente sin erupcionar</option>
                                    <option>T/T Traumatismo (fractura)</option>
                                    <option>-/9 No registrado</option>
                                    <option>11 Recesión Gingival</option>
                                    <option>12 Tratamiento de conductos</option>
                                    <option>13 Instrumento separado en un conducto</option>
                                    <option>14 Bolsas periodontales</option>
                                    <option>15 Fluorosis</option>
                                    <option>16 Alteraciones de forma, número, tamaño y textura</option>
                                    <option>17 Lesión Endoperiodontal</option>
                                  </select>
                                </div>
                              </div>
                            </div>

                            <br>

                            <div class="row">
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">37</label>
                                  <select class="form-control">
                                    <option>Seleccione</option>
                                    <option>A/0 Sano</option>
                                    <option>B/1 Con Caries</option>
                                    <option>C/2 Obturado Con Caries</option>
                                    <option>D/3 Obturado Sin Caries</option>
                                    <option>E/4 Perdido como resultado por caries</option>
                                    <option>-/5 Perdido por cualquier otro motivo</option>
                                    <option>F/6 Fisura Obtura</option>
                                    <option>G/7 Soporte de puentes, corona, funda o implante</option>
                                    <option>-/8 Diente sin erupcionar</option>
                                    <option>T/T Traumatismo (fractura)</option>
                                    <option>-/9 No registrado</option>
                                    <option>11 Recesión Gingival</option>
                                    <option>12 Tratamiento de conductos</option>
                                    <option>13 Instrumento separado en un conducto</option>
                                    <option>14 Bolsas periodontales</option>
                                    <option>15 Fluorosis</option>
                                    <option>16 Alteraciones de forma, número, tamaño y textura</option>
                                    <option>17 Lesión Endoperiodontal</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">36</label>
                                  <select class="form-control">
                                    <option>Seleccione</option>
                                    <option>A/0 Sano</option>
                                    <option>B/1 Con Caries</option>
                                    <option>C/2 Obturado Con Caries</option>
                                    <option>D/3 Obturado Sin Caries</option>
                                    <option>E/4 Perdido como resultado por caries</option>
                                    <option>-/5 Perdido por cualquier otro motivo</option>
                                    <option>F/6 Fisura Obtura</option>
                                    <option>G/7 Soporte de puentes, corona, funda o implante</option>
                                    <option>-/8 Diente sin erupcionar</option>
                                    <option>T/T Traumatismo (fractura)</option>
                                    <option>-/9 No registrado</option>
                                    <option>11 Recesión Gingival</option>
                                    <option>12 Tratamiento de conductos</option>
                                    <option>13 Instrumento separado en un conducto</option>
                                    <option>14 Bolsas periodontales</option>
                                    <option>15 Fluorosis</option>
                                    <option>16 Alteraciones de forma, número, tamaño y textura</option>
                                    <option>17 Lesión Endoperiodontal</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">35</label>
                                  <select class="form-control">
                                    <option>Seleccione</option>
                                    <option>A/0 Sano</option>
                                    <option>B/1 Con Caries</option>
                                    <option>C/2 Obturado Con Caries</option>
                                    <option>D/3 Obturado Sin Caries</option>
                                    <option>E/4 Perdido como resultado por caries</option>
                                    <option>-/5 Perdido por cualquier otro motivo</option>
                                    <option>F/6 Fisura Obtura</option>
                                    <option>G/7 Soporte de puentes, corona, funda o implante</option>
                                    <option>-/8 Diente sin erupcionar</option>
                                    <option>T/T Traumatismo (fractura)</option>
                                    <option>-/9 No registrado</option>
                                    <option>11 Recesión Gingival</option>
                                    <option>12 Tratamiento de conductos</option>
                                    <option>13 Instrumento separado en un conducto</option>
                                    <option>14 Bolsas periodontales</option>
                                    <option>15 Fluorosis</option>
                                    <option>16 Alteraciones de forma, número, tamaño y textura</option>
                                    <option>17 Lesión Endoperiodontal</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">34</label>
                                  <select class="form-control">
                                    <option>Seleccione</option>
                                    <option>A/0 Sano</option>
                                    <option>B/1 Con Caries</option>
                                    <option>C/2 Obturado Con Caries</option>
                                    <option>D/3 Obturado Sin Caries</option>
                                    <option>E/4 Perdido como resultado por caries</option>
                                    <option>-/5 Perdido por cualquier otro motivo</option>
                                    <option>F/6 Fisura Obtura</option>
                                    <option>G/7 Soporte de puentes, corona, funda o implante</option>
                                    <option>-/8 Diente sin erupcionar</option>
                                    <option>T/T Traumatismo (fractura)</option>
                                    <option>-/9 No registrado</option>
                                    <option>11 Recesión Gingival</option>
                                    <option>12 Tratamiento de conductos</option>
                                    <option>13 Instrumento separado en un conducto</option>
                                    <option>14 Bolsas periodontales</option>
                                    <option>15 Fluorosis</option>
                                    <option>16 Alteraciones de forma, número, tamaño y textura</option>
                                    <option>17 Lesión Endoperiodontal</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">33</label>
                                  <select class="form-control">
                                    <option>Seleccione</option>
                                    <option>A/0 Sano</option>
                                    <option>B/1 Con Caries</option>
                                    <option>C/2 Obturado Con Caries</option>
                                    <option>D/3 Obturado Sin Caries</option>
                                    <option>E/4 Perdido como resultado por caries</option>
                                    <option>-/5 Perdido por cualquier otro motivo</option>
                                    <option>F/6 Fisura Obtura</option>
                                    <option>G/7 Soporte de puentes, corona, funda o implante</option>
                                    <option>-/8 Diente sin erupcionar</option>
                                    <option>T/T Traumatismo (fractura)</option>
                                    <option>-/9 No registrado</option>
                                    <option>11 Recesión Gingival</option>
                                    <option>12 Tratamiento de conductos</option>
                                    <option>13 Instrumento separado en un conducto</option>
                                    <option>14 Bolsas periodontales</option>
                                    <option>15 Fluorosis</option>
                                    <option>16 Alteraciones de forma, número, tamaño y textura</option>
                                    <option>17 Lesión Endoperiodontal</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">32</label>
                                  <select class="form-control">
                                    <option>Seleccione</option>
                                    <option>A/0 Sano</option>
                                    <option>B/1 Con Caries</option>
                                    <option>C/2 Obturado Con Caries</option>
                                    <option>D/3 Obturado Sin Caries</option>
                                    <option>E/4 Perdido como resultado por caries</option>
                                    <option>-/5 Perdido por cualquier otro motivo</option>
                                    <option>F/6 Fisura Obtura</option>
                                    <option>G/7 Soporte de puentes, corona, funda o implante</option>
                                    <option>-/8 Diente sin erupcionar</option>
                                    <option>T/T Traumatismo (fractura)</option>
                                    <option>-/9 No registrado</option>
                                    <option>11 Recesión Gingival</option>
                                    <option>12 Tratamiento de conductos</option>
                                    <option>13 Instrumento separado en un conducto</option>
                                    <option>14 Bolsas periodontales</option>
                                    <option>15 Fluorosis</option>
                                    <option>16 Alteraciones de forma, número, tamaño y textura</option>
                                    <option>17 Lesión Endoperiodontal</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">31</label>
                                  <select class="form-control">
                                    <option>Seleccione</option>
                                    <option>A/0 Sano</option>
                                    <option>B/1 Con Caries</option>
                                    <option>C/2 Obturado Con Caries</option>
                                    <option>D/3 Obturado Sin Caries</option>
                                    <option>E/4 Perdido como resultado por caries</option>
                                    <option>-/5 Perdido por cualquier otro motivo</option>
                                    <option>F/6 Fisura Obtura</option>
                                    <option>G/7 Soporte de puentes, corona, funda o implante</option>
                                    <option>-/8 Diente sin erupcionar</option>
                                    <option>T/T Traumatismo (fractura)</option>
                                    <option>-/9 No registrado</option>
                                    <option>11 Recesión Gingival</option>
                                    <option>12 Tratamiento de conductos</option>
                                    <option>13 Instrumento separado en un conducto</option>
                                    <option>14 Bolsas periodontales</option>
                                    <option>15 Fluorosis</option>
                                    <option>16 Alteraciones de forma, número, tamaño y textura</option>
                                    <option>17 Lesión Endoperiodontal</option>
                                  </select>
                                </div>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">Diagnóstico(s)</label>
                                  <textarea class="form-control" rows="3" placeholder=""></textarea>
                                </div>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">Operatoria</label>
                                  <textarea class="form-control" rows="3" placeholder=""></textarea>
                                </div>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">Cirugía</label>
                                  <textarea class="form-control" rows="3" placeholder=""></textarea>
                                </div>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">Ortodoncia Prepótesica</label>
                                  <textarea class="form-control" rows="3" placeholder=""></textarea>
                                </div>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">Guardas</label>
                                  <textarea class="form-control" rows="3" placeholder=""></textarea>
                                </div>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">Ortodoncia Correctiva</label>
                                  <textarea class="form-control" rows="3" placeholder=""></textarea>
                                </div>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">Tratamientos Pulpares</label>
                                  <textarea class="form-control" rows="3" placeholder=""></textarea>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="panel box box-warning">
                        <div class="box-header with-border">
                          <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion1" href="#collapseFour">
                              Odontograma de Evolución
                            </a>
                          </h4>
                        </div>
                        <div id="collapseFour" class="panel-collapse collapse">
                          <div class="box-body">
                            <div class="row">
                              <div class="col-md-12" align="center">
                                <img src="dientes.png" width="650" alt="">
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">17</label>
                                  <input type="text" class="form-control"  placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">16</label>
                                  <input type="text" class="form-control"  placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">15</label>
                                  <input type="text" class="form-control"  placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">14</label>
                                  <input type="text" class="form-control"  placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">13</label>
                                  <input type="text" class="form-control"  placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">12</label>
                                  <input type="text" class="form-control"  placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">11</label>
                                  <input type="text" class="form-control"  placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>
                              </div>
                            </div>

                            <br>

                            <div class="row">
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">27</label>
                                  <input type="text" class="form-control"  placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">26</label>
                                  <input type="text" class="form-control"  placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">25</label>
                                  <input type="text" class="form-control"  placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">24</label>
                                  <input type="text" class="form-control"  placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">23</label>
                                  <input type="text" class="form-control"  placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">22</label>
                                  <input type="text" class="form-control"  placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">21</label>
                                  <input type="text" class="form-control"  placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>
                              </div>
                            </div>

                            <br>

                            <div class="row">
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">55</label>
                                  <input type="text" class="form-control"  placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">54</label>
                                  <input type="text" class="form-control"  placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">53</label>
                                  <input type="text" class="form-control"  placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">52</label>
                                  <input type="text" class="form-control"  placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">51</label>
                                  <input type="text" class="form-control"  placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>
                              </div>
                            </div>

                            <br>

                            <div class="row">
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">65</label>
                                  <input type="text" class="form-control"  placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">64</label>
                                  <input type="text" class="form-control"  placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">63</label>
                                  <input type="text" class="form-control"  placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">62</label>
                                  <input type="text" class="form-control"  placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">61</label>
                                  <input type="text" class="form-control"  placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>
                              </div>
                            </div>

                            <br>

                            <div class="row">
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">85</label>
                                  <input type="text" class="form-control"  placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">84</label>
                                  <input type="text" class="form-control"  placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">83</label>
                                  <input type="text" class="form-control"  placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">82</label>
                                  <input type="text" class="form-control"  placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">81</label>
                                  <input type="text" class="form-control"  placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>
                              </div>
                            </div>

                            <br>

                            <div class="row">
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">75</label>
                                  <input type="text" class="form-control"  placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">74</label>
                                  <input type="text" class="form-control"  placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">73</label>
                                  <input type="text" class="form-control"  placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">72</label>
                                  <input type="text" class="form-control"  placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">71</label>
                                  <input type="text" class="form-control"  placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>
                              </div>
                            </div>

                            <br>

                            <div class="row">
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">47</label>
                                  <input type="text" class="form-control"  placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">46</label>
                                  <input type="text" class="form-control"  placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">45</label>
                                  <input type="text" class="form-control"  placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">44</label>
                                  <input type="text" class="form-control"  placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">43</label>
                                  <input type="text" class="form-control"  placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">42</label>
                                  <input type="text" class="form-control"  placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">41</label>
                                  <input type="text" class="form-control"  placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>
                              </div>
                            </div>

                            <br>

                            <div class="row">
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">37</label>
                                  <input type="text" class="form-control"  placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">36</label>
                                  <input type="text" class="form-control"  placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">35</label>
                                  <input type="text" class="form-control"  placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">34</label>
                                  <input type="text" class="form-control"  placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">33</label>
                                  <input type="text" class="form-control"  placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">32</label>
                                  <input type="text" class="form-control"  placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">31</label>
                                  <input type="text" class="form-control"  placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>
                              </div>
                            </div>

                            <br>

                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">Interpretación Radiográfica</label>
                                  <textarea class="form-control" rows="3" placeholder=""></textarea>
                                </div>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">Estudios de Laboratorio y Gabinete</label>
                                  <textarea class="form-control" rows="3" placeholder=""></textarea>
                                </div>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">Interpretación de los Estudios de Laboratorio y Gabinete</label>
                                  <textarea class="form-control" rows="3" placeholder=""></textarea>
                                </div>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-7">
                                <div class="form-group">
                                  <label class="control-label">Estudio Radiógrafico de Articulación Temporomandibular</label>
                                  <select class="form-control" name="">
                                    <option>Seleccione..</option>
                                    <option value="">Si</option>
                                    <option value="">No</option>
                                  </select>
                                </div>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">Interpretación </label>
                                  <textarea class="form-control" rows="3" placeholder=""></textarea>
                                </div>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group">
                                  <label class="control-label" for="inputSuccess">Radiografía Lateral de Craneo - Específique </label>
                                  <textarea class="form-control" rows="3" placeholder=""></textarea>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="control-label" for="inputSuccess">Pronóstico del Tratamiento</label>
                            <textarea class="form-control" rows="3" placeholder=""></textarea>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="control-label" for="inputSuccess">Diagnóstico Final - Interpretación</label>
                            <textarea class="form-control" rows="3" placeholder=""></textarea>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="control-label" for="inputSuccess">Objetivos del Tratamiento</label>
                            <textarea class="form-control" rows="3" placeholder=""></textarea>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="control-label" for="inputSuccess">Plan del Tratamiento</label>
                            <textarea class="form-control" rows="3" placeholder=""></textarea>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="control-label" for="inputSuccess">Observaciones</label>
                            <textarea class="form-control" rows="3" placeholder=""></textarea>
                          </div>
                        </div>
                      </div>

                        <div class="col-sm-12">
                          <div align="center"> 
                            <label> <strong> Próxima consulta o cita (Solo si aplica)</strong>  </label>
                          </div>
                        </div>
 
                        <div class="col-sm-6">
                          <div align="left"> <label>Fecha </label></div>
                          <input type="date" name="fecha"  class="form-control input-lg" id="fecha" min="<?php echo date('Y-m-d')?>"   onChange="verDia();">
                          <input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo $_SESSION['ID']?>">
                          
                          <div id="div-results"></div>
                        </div>
                        <div class="col-sm-6">
                          <div align="left"> 
                            <label>Hora </label>
                          </div>
                          <input  type="time" name="hora" class="form-control input-lg"  placeholder="hora" id="Hora"  onChange="verHora();" >
                          <div id="div-resultsHora"></div>

                        </div>
                  
                        <div class="col-sm-6">
                          <div align="left"> 
                            <label>Motivo consulta</label>
                          </div>
                          <input  type="text" name="motivo" class="form-control input-lg"  placeholder="Motivo Consulta">
                        </div>

                        <div class="col-sm-6">
                          <label>Especialista </label>
                          <select id="doctor" name="doctor" class="form-control select2" style="width: 100%;" >
                          <option value="<?php echo $_SESSION['username']?>" selected="selected"><?php echo $_SESSION['username']?> </option>
                          <?php
                          usuariosAselect($ID);
                          ?>
                          </select>
                        </div>
 
                        <div class="col-sm-6">
                          <br>
                          <br>
                         <label>
                            <input type="radio" name="P" value="0" class="flat-red" checked>
                           <i class="fa fa-user"></i>  Presencial  
                          
                            <input type="radio" name="P" value="1"  class="flat-red"  >
                           <i class="fa fa-video-camera"></i>   Virtual
                          </label>
                        </div>

                          <input  type="hidden" name="email" value="<?php echo $correo_cliente;?>">
                          <input  type="hidden" name="nombre"  value="<?php echo $nombre_cliente;?>">
                          <input  type="hidden" name="telefono"  value="<?php echo $telefono_cliente ;?>">
                          <input  type="hidden" name="ID"  value="<?php echo $_SESSION['ID']?>">
                          <input  type="hidden" name="clienteId"  value="<?php echo $clienteId?>">
                          <input  type="hidden" name="NOMBRE_USUARIO"  value="<?php echo $_SESSION['NOMBRE_USUARIO']?>">

                        <div align="center"> 
                          <br>
                          <br>
                          <br>
                          <div class="col-sm-12">
                            <br>
                            <br>
                            <center>
                              <button type="submit" class="btn btn-block btn-primary btn-sm"> 
                                <h2> <strong>  G u a r d a r  </strong> </h2> 
                              </button>
                            </center>
                          </div>
                        </div>
                        <input type="hidden"  name="tipo_cliente"   valur="1">
                      </form>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

<?php include("footer.php")?>


<script type="text/javascript">

      function verDia(){
        // estas son las variables que enviamos

        var fecha = $("#fecha").val();
        var Hora = $("#Hora").val();
        var usuario_id = $("#usuario_id").val();

        // aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "disponibilidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id},
            success: function(response) {
                $('#div-results').html(response);
                 
            }
        });
    };

      function verHora(){
        // estas son las variables que enviamos

        var fecha = $("#fecha").val();
        var Hora = $("#Hora").val();
        var usuario_id = $("#usuario_id").val();

        // aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "disponibilidadHora.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id},
            success: function(response) {
                $('#div-resultsHora').html(response);
                 
            }
        });
    };

</script>