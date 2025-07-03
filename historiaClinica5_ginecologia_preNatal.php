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
      <h1>Consulta médica </h1>
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
                              <input type="button" class="btn btn-block btn-primary btn-sm" value="Historial consultas"  onclick="javascript:window.open('consultaHistoriaMedica.php?tipo=<?php echo $clienteId?>&ID=<?php echo $ID?>','','width=600,height=400,left=50,top=50,toolbar=yes');" />
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
                      <form action="guardarHistoriaClinica5_ginecologia.php" method="POST" name="formularioActualizarcliente">
                        <div class="panel box box-warning ">                 
                          <div class="box-header with-border">
                            <h4 class="box-title"><a data-toggle="collapse" data-parent="#accordion1" href="#collapsefour1">Atenciones Prenatales</a></h4>
                          </div>

                          <div id="collapsefour1" class="panel-collapse collapse">
                            <div class="box-body">
                              <div class="form-group col-md-12">
                                <div align="left">Tipo de Atencion </div>
                                <select name="atencion "  class="form-control" style="width: 100%;">
                                  <option value="Atencion 1">Atención 1</option>
                                  <option value="Atencion 2">Atención 2</option>
                                  <option value="Atencion 3">Atención 3</option>
                                  <option value="Atencion 4">Atención 4</option>
                                  <option value="Atencion 5">Atención 5</option>
                                  <option value="Atencion 6">Atención 6</option>
                                  <option value="Atencion 7">Atención 7</option>
                                  <option value="Atencion 8">Atención 8</option>
                                  <option value="Atencion 9">Atención 9</option>
                                </select>
                              </div>  

                              <div class="form-group col-md-3">
                                <div align="left">Edad gestacional</div>
                                <input type="text" class="form-control input-lg" id="pn01" name="pn01" placeholder="Edad gestacional">
                              </div>

                              <div class="form-group col-md-3">
                                <div align="left">Peso madre</div>
                                <input type="text" class="form-control input-lg" id="pn02" name="pn02" placeholder="Peso madre">
                              </div>
                              
                              <div class="form-group col-md-3">
                                <div align="left">Temperatura</div>
                                <input type="text" class="form-control input-lg" id="pn02" name="pn002" placeholder="Temperatura">
                              </div>
                               
                              <div class="form-group col-md-3">
                                <div align="left">Presión Arterial </div>
                                <input type="text" class="form-control input-lg" id="pn03" name="pn03" placeholder="Presión Arterial">
                              </div>

                              <div class="form-group col-md-3">
                                <div align="left">Pulso Materno</div>
                                  <input type="text" class="form-control input-lg" id="pn04" name="pn04" placeholder="Pulso materno">
                              </div>

                              <div class="form-group col-md-3">
                                <div align="left">Altura urinaria</div>
                                <input type="text" class="form-control input-lg" id="pn05" name="pn05" placeholder="Altura urinaria">
                              </div>

                              <div class="form-group col-md-3">
                                <div align="left">Situación L/T/NA </div>
                                  <input type="text" class="form-control input-lg" id="pn06" name="pn06" placeholder="Situación L/T/NA">
                                 
                              </div>

                              <div class="form-group col-md-3">
                                <div align="left">Presentación</div>
                                  <input type="text" class="form-control input-lg" id="pn07" name="pn07" placeholder="Presentación">
                                 
                              </div>

                              <div class="form-group col-md-3">
                                <div align="left">Posición</div>
                                  <input type="text" class="form-control input-lg" id="pn08" name="pn08" placeholder="Posición">
                                  
                              </div>

                              <div class="form-group col-md-3">
                                <div align="left">F.C.F</div>
                                  <input type="text" class="form-control input-lg" id="pn09" name="pn09" placeholder="F.C.F">
                                       </div>

                              <div class="form-group col-md-3">
                                <div align="left">Mov Fetal</div>
                                  <input type="text" class="form-control input-lg" id="pn10" name="pn10" placeholder="Mov fetal">
                                  
                              </div>

                              <div class="form-group col-md-3">
                                <div align="left">Proteinuria cualitativa</div>
                                  <input type="text" class="form-control input-lg" id="pn11" name="pn11" placeholder="Proteinuria cualitativa">
                                 
                              </div>

                              <div class="form-group col-md-3">
                                <div align="left">Edema</div>
                                  <input type="text" class="form-control input-lg" id="pn12" name="pn12" placeholder="Edema">
                                 
                              </div>

                              <div class="form-group col-md-3">
                                <div align="left">Reflejo Osteontendinoso</div>
                                  <input type="text" class="form-control input-lg" id="pn13" name="pn13" placeholder="Reflejo Osteontendinoso">
                                             </div>

                              <div class="form-group col-md-3">
                                <div align="left">Examen de pezon</div>
                                  <input type="text" class="form-control input-lg" id="pn14" name="pn14" placeholder="Examen de pezon">
                                  
                              </div>

                              <div class="form-group col-md-3">
                                <div align="left">Indic. hiero/ Acido folico</div>
                                  <input type="text" class="form-control input-lg" id="pn15" name="pn15" placeholder="hierro /Acido folico">
                                  
                              </div>
                              <div class="form-group col-md-3">
                                <div align="left">Indic. calcio </div>
                                  <input type="text" class="form-control input-lg" id="pn16" name="pn16" placeholder="Indi. calcio">
                                
                              </div>
                               <div class="form-group col-md-3">
                                <div align="left">Indic. Acido Folico </div>
                                  <input type="text" class="form-control input-lg" id="pn17" name="pn17" placeholder="Acido folico">
                                 
                              </div>
                              <div class="form-group col-md-3">
                                <div align="left">Orient. Concej </div>
                                  <input type="text" class="form-control input-lg" id="pn18" name="pn18" placeholder="Orient. Concej">
                                 
                              </div>
                              <div class="form-group col-md-3">
                                <div align="left">EG de Eco. Control</div>
                                  <input type="text" class="form-control input-lg" id="pn19" name="pn19" placeholder="EG de Eco. Control">
                                 
                              </div>
                              <div class="form-group col-md-3">
                                <div align="left">Perfil Biofisico</div>
                                  <input type="text" class="form-control input-lg" id="pn20" name="pn20" placeholder="Perfil Biofisico">
                              </div>

                              <div class="form-group col-md-3">
                                <div align="left">Cita</div>
                                  <input type="text" class="form-control input-lg" id="pn21" name="pn21" placeholder="Cita">
                              </div>
                              <div class="form-group col-md-3">
                                <div align="left">Visita Domicial</div>
                                  <input type="text" class="form-control input-lg" id="pn22" name="pn22" placeholder="Visita Domicilial">
                              </div>

                              <div class="form-group col-md-3">
                                <div align="left">Plan de parto</div>
                                  <input type="text" class="form-control input-lg" id="pn23" name="pn23" placeholder="Plan de parto">
                              </div>

                               <div class="form-group col-md-3"> <div align="left">Numero Formato SIS</div>
                                  <input type="text" class="form-control input-lg" id="pn24" name="pn24" placeholder="Nro. formato SIS">
                                   </div>

                              <div class="form-group col-md-6"> <div align="left"> Estab. de la Atención </div>
                                  <input type="text" class="form-control input-lg" id="pn25" name="pn25" placeholder="Estab. de la atención">
                              </div>

                              <div class="form-group col-md-6"> <div align="left">Responsable  Atención </div>
                                  <input type="text" class="form-control input-lg" id="pn26" name="pn26" placeholder="Responsable atención">
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-sm-12">
                          <div align="center"> 
                            <label> <strong> Próxima consulta o cita (Solo si aplica)</strong>  </label>
                          </div>
                        </div>

                        <div class="col-sm-6">
                          <div align="left"> 
                            <label>Fecha </label>
                          </div>
                          <input type="date" name="fecha"  class="form-control input-lg" id="fecha" min="<?php echo date('Y-m-d')?>"   onChange="verDia();">

                          <input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo $_SESSION['ID']?>">
                          
                          <div id="div-results"></div>
                        </div>

                        <div class="col-sm-6">
                          <div align="left"> <label>Hora </label></div>
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

                        <div align="center"> 
                          <br><br><br>
                          <div class="col-sm-12">
                            <br><br>
                            <center><button type="submit" class="btn btn-block btn-primary btn-sm"> <h2> <strong>  G u a r d a r  </strong> </h2> </button></center>
                          </div>
                        </div>

                        <input type="hidden"  name="tipo_cliente"   valur="1">
                      </form>
                    </div>
                  </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
              </div>
            </div>   
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>  
          
          
          
     

<?php include("footer.php")?>

