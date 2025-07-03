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
      <h1>Consulta Médica Urológica</h1>
      <ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
        <li><a href="#"> Consulta Médica Urológica</a></li>
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
                            <div class="row">
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
                              
                              <div class="col-md-12">
                                <hr>
                              </div>

                              <div class="col-md-12">
                                <div class="col-md-12">
                                  <label><strong>Toma algún medicamento:</strong></label>
                                  <label><?php echo $tomaMedicamento ;?></label>   
                                </div>

                                <div class="col-md-2">
                                  <div class="form-group" align="right">
                                    Alergias a las aines  <?php echo sino($ap1)?>
                                  </div>
                                </div>  
                                 
                                <div class="col-md-2">
                                  <div class="form-group" align="right">
                                    Asma <?php echo sino($ap2)?>
                                  </div>
                                </div>

                                <div class="col-md-2">
                                  <div class="form-group" align="right">
                                    HTA <?php echo sino($ap3)?>
                                  </div>
                                 </div> 

                                <div class="col-md-2">
                                  <div class="form-group" align="right">
                                    Diabetes <?php echo sino($ap4)?>
                                  </div>
                                </div>

                                <div class="col-md-2">
                                  <div class="form-group" align="right">
                                    Hipotiroidismo <?php echo sino($ap5)?>
                                  </div>
                                </div>

                                <div class="col-md-2">
                                  <div class="form-group" align="right">
                                    Tabaquismo <?php echo sino($ap6)?>
                                  </div>
                                </div>

                                <div class="col-md-2">
                                  <div class="form-group" align="right">
                                    Licor <?php echo sino($ap7)?>
                                  </div>
                                </div>

                                <div class="col-md-2">
                                  <div class="form-group" align="right">
                                    Otras Alergias <?php echo sino($ap8)?>
                                  </div>
                                </div>

                                <div class="col-md-2">
                                  <div class="form-group" align="right">
                                    Cirugías <?php echo sino($ap9)?>
                                  </div>
                                </div>
                              </div>

                              <div class="col-md-12" >
                                <div class="form-group">
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
                        </div>
                      </div>

                    <br> 
           <form action="guadarClinica18_urologia.php" method="POST" name="formularioActualizarcliente">
            
                        <div class="panel box box-success">
                          <div class="box-header with-border">
                            <h4 class="box-title">
                              <a data-toggle="collapse" data-parent="#accordion1" href="#collapseTwo">Dolor Urológico</a>
                            </h4>
                          </div>
                          <div id="collapseTwo" class="panel-collapse collapse">
                            <div class="box-body">
                              <div class="row">
                                <div class="col-md-12">
                                  <table class="table table-bordered">
                                    <tr>
                                      <th>Seleccione la Afección</th>
                                      <th>Notas de la Afección</th>
                                    </tr>
                                    <tr>
                                      <td><label>Dolor Renal <input type="radio" name="dolorRenal" value="Dolor Renal" class="minimal"> </label></td>
                                      <td><input type="text" class="form-control" name="notaRenal"  placeholder=""></td>
                                    </tr>
                                    <tr>
                                      <td><label>Dolor Ureteral <input type="radio" name="dolorUreteral" value="Dolor Ureteral" class="minimal"> </label></td>
                                      <td><input type="text" class="form-control" name="notaUreteral"  placeholder=""></td>
                                    </tr>
                                    <tr>
                                      <td><label>Dolor Vesical <input type="radio" name="dolorVesical" value="Dolor Vesical" class="minimal"> </label></td>
                                      <td><input type="text" class="form-control" name="notaVesical"  placeholder=""></td>
                                    </tr>
                                    <tr>
                                      <td><label>Dolor Prostático <input type="radio" name="dolorProstatico" value="Dolor Prostático" class="minimal"> </label></td>
                                      <td><input type="text" class="form-control" name="notaProstatica"  placeholder=""></td>
                                    </tr>
                                    <tr>
                                      <td><label>Dolor Uretral <input type="radio" name="dolorUretral" value="Dolor Uretral" class="minimal"> </label></td>
                                      <td><input type="text" class="form-control" name="notaUretral"  placeholder=""></td>
                                    </tr>
                                    <tr>
                                      <td><label>Dolor Escrotal <input type="radio" name="dolorEscrotal" value="Dolor Escrotal" class="minimal"> </label></td>
                                      <td><input type="text" class="form-control" name="notaEscrotal"  placeholder=""></td>
                                    </tr>
                                  </table>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="panel box box-success">
                          <div class="box-header with-border">
                            <h4 class="box-title">
                              <a data-toggle="collapse" data-parent="#accordion1" href="#collapseThree">Alteraciones de la Micción y de la Excresión de Orina</a>
                            </h4>
                          </div>
                          <div id="collapseThree" class="panel-collapse collapse">
                            <div class="box-body">
                              <div class="row">
                                <div class="col-md-12">
                                  <table class="table table-bordered">
                                    <tr>
                                      <th>Seleccione la Afección</th>
                                      <th>Notas de la Afección</th>
                                    </tr>
                                    <tr>
                                      <td>Polaquiuria <input type="radio" name="Polaquiuria" value="Polaquiuria" class="minimal"></td>
                                      <td><input type="text" class="form-control" name="notaPolaquiuria"  placeholder=""></td>
                                    </tr>
                                    <tr>
                                      <td>Poliuria <input type="radio" name="Poliuria" value="Poliuria" class="minimal"></td>
                                      <td><input type="text" class="form-control" name="notaPoliuria"  placeholder=""></td>
                                    </tr>
                                    <tr>
                                      <td>Oliguria y Anuria <input type="radio" name="OliguriaAnuria" value="Oliguria y anuria" class="minimal"></td>
                                      <td><input type="text" class="form-control" name="notaOliguriaAnuria"  placeholder=""></td>
                                    </tr>
                                    <tr>
                                      <td>Nicturia <input type="radio" name="nicturia" value="Nicturia" class="minimal"></td>
                                      <td><input type="text" class="form-control" name="notaNicturia"  placeholder=""></td>
                                    </tr>
                                    <tr>
                                      <td>Disuria <input type="radio" name="sisuria" value="Disuria" class="minimal"></td>
                                      <td><input type="text" class="form-control" name="notaDisuria"  placeholder=""></td>
                                    </tr>
                                    <tr>
                                      <td>Incontinencia <input type="radio" name="incontinencia" value="Incontinencia" class="minimal"></td>
                                      <td><input type="text" class="form-control" name="notaIncontinencia"  placeholder=""></td>
                                    </tr>
                                    <tr>
                                      <td>Enuresis <input type="radio" name="enuresis" value="Enuresis" class="minimal"></td>
                                      <td><input type="text" class="form-control" name="notaEnuresis"  placeholder=""></td>
                                    </tr>
                                    <tr>
                                      <td>Neumaturia <input type="radio" name="neumaturia" value="Neumaturia" class="minimal"></td>
                                      <td><input type="text" class="form-control" name="notaNeumaturia"  placeholder=""></td>
                                    </tr>
                                    <tr>
                                      <td>Fecaluria <input type="radio" name="fecaluria" value="Fecaluria" class="minimal"></td>
                                      <td><input type="text" class="form-control" name="notaFecaluria"  placeholder=""></td>
                                    </tr>
                                    <tr>
                                      <td>Quiluria <input type="radio" name="quiluria" value="Quiluria" class="minimal"></td>
                                      <td><input type="text" class="form-control" name="notaQuiluria"  placeholder=""></td>
                                    </tr>
                                    <tr>
                                      <td>Menouria <input type="radio" name="menouria" value="Menouria" class="minimal"></td>
                                      <td><input type="text" class="form-control" name="notaMenouria"  placeholder=""></td>
                                    </tr>
                                    <tr>
                                      <td>Orina turbia <input type="radio" name="orinaTurbia" value="Orina Turbia" class="minimal"></td>
                                      <td><input type="text" class="form-control" name="notaOrinaturbia"  placeholder=""></td>
                                    </tr>
                                    <tr>
                                      <td>Supuración Uretral  <input type="radio" name="supuraciónUretral " value="Supuracion Uretral " class="minimal"></td>
                                      <td><input type="text" class="form-control" name="notaSupuracionUretral "  placeholder=""></td>
                                    </tr>
                                    <tr>
                                      <td>Impotencia <input type="radio" name="impotencia" value="Impotencia" class="minimal"></td>
                                      <td><input type="text" class="form-control" name="notaImpotencia"  placeholder=""></td>
                                    </tr>
                                  </table>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>                        

                        <div class="panel box box-success">
                          <div class="box-header with-border">
                            <h4 class="box-title">
                              <a data-toggle="collapse" data-parent="#accordion1" href="#collapseFour">Exploración General Completa</a>
                            </h4>
                          </div>
                          <div id="collapseFour" class="panel-collapse collapse">
                            <div class="box-body">
                              <div class="row">
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <label class="control-label" for="inputSuccess">Exploración Urológica</label>
                                    <textarea class="form-control"  name="exploracionUrologica" placeholder="" rows="3" ></textarea>
                                  </div>
                                </div>
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <label class="control-label" for="inputSuccess">Exploración Renal</label>
                                    <textarea class="form-control"  name="exploracionRenal" placeholder="" rows="3" ></textarea>
                                  </div>
                                </div>
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <label class="control-label" for="inputSuccess">Exploración Vesical</label>
                                    <textarea class="form-control"  name="exploracionVesical" placeholder="" rows="3" ></textarea>
                                  </div>
                                </div>
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <label class="control-label" for="inputSuccess">Exploración de los Generales Externos Masculinos</label>
                                    <textarea class="form-control"  name="exploracionGeneralExternosMasculinos" placeholder="" rows="3" >Pene:
                                    Escroto y Contenido:</textarea>
                                  </div>
                                </div>
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <label class="control-label" for="inputSuccess">Tacto Rectal</label>
                                    <textarea class="form-control"  name="tactoRectal" placeholder="" rows="3" ></textarea>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="panel box box-success">
                          <div class="box-header with-border">
                            <h4 class="box-title">
                              <a data-toggle="collapse" data-parent="#accordion1" href="#collapseFive">Exploraciones Complementarias en Urología</a>
                            </h4>
                          </div>
                          <div id="collapseFive" class="panel-collapse collapse">
                            <div class="box-body">
                              <div class="row">
                                <div class="col-md-12"><h4 class="box-title">Analisis de Sangre</h4></div>
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <label class="control-label" for="inputSuccess">Funcion Renal</label>
                                    <textarea class="form-control"  name="FuncionRenalA" placeholder="" rows="3" ></textarea>
                                  </div>
                                </div>
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <label class="control-label" for="inputSuccess">Estado General del Organismo</label>
                                    <textarea class="form-control"  name="EstadoGeneralOrganismo" placeholder="" rows="3" ></textarea>
                                  </div>
                                </div>
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <label class="control-label" for="inputSuccess">Antígenos Específicos</label>
                                    <textarea class="form-control"  name="AntigenosEspecificos" placeholder="" rows="3" ></textarea>
                                  </div>
                                </div>
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <label class="control-label" for="inputSuccess">Serología</label>
                                    <textarea class="form-control"  name="Serologia" placeholder="" rows="3" ></textarea>
                                  </div>
                                </div>
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <label class="control-label" for="inputSuccess">Otras</label>
                                    <textarea class="form-control"  name="Otras" placeholder="" rows="3" ></textarea>
                                  </div>
                                </div>
                                <div class="col-md-12"><h4 class="box-title">Analisis de Orina</h4></div>
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <label class="control-label" for="inputSuccess">Estudios físico-químicos</label>
                                    <textarea class="form-control"  name="EstudiosFisicoQuimicos" placeholder="" rows="3" ></textarea>
                                  </div>
                                </div>
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <label class="control-label" for="inputSuccess">Examen del Sedimento Urinario</label>
                                    <textarea class="form-control"  name="ExamenSedimentoUrinario" placeholder="" rows="3" ></textarea>
                                  </div>
                                </div>
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <label class="control-label" for="inputSuccess">Examen Bacteriológico</label>
                                    <textarea class="form-control"  name="ExamenBacteriologico" placeholder="" rows="3" ></textarea>
                                  </div>
                                </div>
                                <div class="col-md-12"><h4 class="box-title">Estudiado del Exudado Uretral</h4></div>
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <label class="control-label" for="inputSuccess">Exploraciónes Complementarias por Métodos de Imagen</label>
                                    <textarea class="form-control"  name="ExploracionesComplementariasdeImagen" placeholder="" rows="3" ></textarea>
                                  </div>
                                </div>
                                <div class="col-md-12"><h4 class="box-title">Imagenologías</h4></div>
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <label class="control-label" for="inputSuccess">RX Simple de Abdomen</label>
                                    <textarea class="form-control"  name="RXsimpleAbdomen" placeholder="" rows="3" ></textarea>
                                  </div>
                                </div>
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <label class="control-label" for="inputSuccess">Urografía Intravenosa (UIV)</label>
                                    <textarea class="form-control"  name="urografiaIntravenosa" placeholder="" rows="3" ></textarea>
                                  </div>
                                </div>
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <label class="control-label" for="inputSuccess">Urografía Retrógrada</label>
                                    <textarea class="form-control"  name="urografiaRetrograda" placeholder="" rows="3" ></textarea>
                                  </div>
                                </div>
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <label class="control-label" for="inputSuccess">TAC y RMN</label>
                                    <textarea class="form-control"  name="TacRmn" placeholder="" rows="3" ></textarea>
                                  </div>
                                </div>
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <label class="control-label" for="inputSuccess">Métodos Endoscópicos</label>
                                    <textarea class="form-control"  name="MetodosEndoscopicos" placeholder="" rows="3" ></textarea>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-12 text-center">
                            <label><strong> Próxima consulta o cita (Solo si aplica)</strong></label>
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
                        </div>
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