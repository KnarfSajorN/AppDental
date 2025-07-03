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
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Consulta médica</h1>
      <ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
        <li><a href="#"> Consulta médica </a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-solid">
         
            <!-- /.box-header -->
            <div class="box-body">
              <div class="box box-solid">
           
                <!-- /.box-header -->
                <div class="box-body">
                     <div class="box-group" id="accordion">
                  <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                  

                  <!-- Copiar desde aca -->
                  <!-- Datos Generales del paciente que se encuentra Registrado -->
                  <div class="panel box box-primary">
                    <div class="box-header with-border">
                      <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#accordion1" href="#collapseOne">Datos personales </a>
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
                            {

                            echo '';
                            }
                            ?>
                            <input type="button" class="btn btn-block btn-primary btn-sm" value="Historial consultas" 
                            onclick="javascript:window.open('consultaHistoriaMedica.php?tipo=<?php echo $clienteId?>&ID=<?php echo $ID?>','','width=600,height=400,left=50,top=50,toolbar=yes');" />
                          </div>

                        </div>

                        <div class="row"><div class="col-md-12"><hr></div></div>

                        <div class="row">
                          <div class="col-md-12">
                            <label><strong>Toma algún medicamento:</strong></label>
                            <label><?php echo $tomaMedicamento ;?></label>   
                          </div>
                        </div>

                        <div class="row">
                          <div class="form-group col-md-2" align="right">
                            Alergias a las aines:  <?php echo sino($ap1)?>
                          </div>  
                           
                          <div class="form-group col-md-2" align="right">
                            Asma: <?php echo sino($ap2)?>
                          </div>

                          <div class="form-group col-md-2" align="right">
                            HTA: <?php echo sino($ap3)?>
                           </div> 

                          <div class="form-group col-md-2" align="right">
                            Diabetes: <?php echo sino($ap4)?>
                          </div>

                          <div class="form-group col-md-2" align="right">
                            Hipotiroidismo: <?php echo sino($ap5)?>
                          </div>

                          <div class="form-group col-md-2" align="right">
                            Tabaquismo: <?php echo sino($ap6)?>
                          </div>
                        </div>

                        <div class="row">
                          <div class="form-group col-md-2" align="right">
                            Licor: <?php echo sino($ap7)?>
                          </div>

                          <div class="form-group col-md-2" align="right">
                            Otras Alergias: <?php echo sino($ap8)?>
                          </div>

                          <div class="form-group col-md-2" align="right">
                            Cirugías: <?php echo sino($ap9)?>
                          </div>
                        </div>

                        <div class="row">
                          <div class="form-group col-md-12" >
                            <label><strong>Antecedentes Familiares:</strong></label>
                            <label><?php echo $antecedentes;?></label>.
                          </div>
                          <div class="form-group col-md-12">
                            <label><strong>Alergias :</strong></label>
                            <label><?php echo $alergias;?></label>
                          </div>
                          <div class="form-group col-md-12">
                            <label><strong>Notas adicionales :</strong></label>
                            <label><?php echo $nota;?></label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="panel box box-danger">
                    <div class="box-header with-border">
                      <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                           <ins>Consulta</ins>
                        </a>
                      </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse">
                      <div class="row">
                        <div class="col-md-12"><h4 class="box-title">a) <ins>Tipo de Pie</ins></h4></div>
                      </div>
                      <div class="row justify-content-md-center" >
                        <div class="col-md-2">
                          <img src="egipcio.png">
                         Egipcio <input type="radio"class="flat-green" checked>
                        </div>
                        <div class="col-md-2">
                          <img src="romano.png">
                          Romano <input type="radio" class="flat-green">
                        </div>
                        <div class="col-md-2">
                          <img src="griego.png">
                          Griego <input type="radio" class="flat-green">
                        </div>
                        <div class="col-md-2">
                          <img src="germanico.png">
                          Germanico <input type="radio" class="flat-green">
                        </div>
                        <div class="col-md-2">
                          <img src="celta.png">
                          Celta <input type="radio" class="flat-green">
                        </div>
                      </div>
                      <br>

                      <div class="row">
                        <div class="col-md-12"><h4 class="box-title">b) <ins> Tipo de Planta de Pie</ins></h4></div>
                      </div>

                      <div class="row text-center" >
                        <div class="col-md-4">
                          <img src="plano.png">
                          Plano <input type="radio" name="" value="" class="flat-green">
                        </div>
                        <div class="col-md-4">
                          <img src="normal.png">
                          Normal <input type="radio" name="" value="" class="flat-green">
                        </div>
                        <div class="col-md-4">
                          <img src="cavo.png">
                          Cavo <input type="radio" name="" value="" class="flat-green">
                        </div>
                      </div>

                      <br>
                      <div class="row">
                        <div class="col-md-12"><h4 class="box-title">c) <ins> Patología del Sudor</ins></h4></div>
                      </div>

                      <table class="table table-bordered" >
                        <tr>
                          <th style="width: 300px">Trastornos</th>
                          <th style="width: 40px">Si</th>
                          <th style="width: 40px">No</th>
                          <th >Observaciones</th>
                        </tr>

                        <tr>
                          <td>Bromhidrosis</td>
                          <td><input type="radio" name="" class="flat-green"></td>
                          <td><input type="radio" name="" class="flat-green"></td>
                          <td>
                            <input type="text" class="form-control" id="inputSuccess" placeholder="Observaciones" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                          </td>
                        </tr>
                        <tr>
                          <td>Hiperhidrosis</td>
                          <td><input type="radio" name="" class="flat-green"></td>
                          <td><input type="radio" name="" class="flat-green"></td>
                          <td>
                            <input type="text" class="form-control" id="inputSuccess" placeholder="Observaciones" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                          </td>
                        </tr>
                        <tr>
                          <td>Anhidrosis</td>
                          <td><input type="radio" name="" class="flat-green"></td>
                          <td><input type="radio" name="" class="flat-green"></td>
                          <td>
                            <input type="text" class="form-control" id="inputSuccess" placeholder="Observaciones" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                          </td>
                        </tr>
                      </table>
                      <br>
                      <div class="row">
                        <div class="col-md-12"><h4 class="box-title">d) <ins> Valoración del Pie y Pierna</ins></h4></div>
                      </div>

                      <table class="table table-bordered" >
                        <tr>
                          <th style="width: 100px">Tipo</th>
                          <th style="width: 110px">Pie Izquierdo</th>
                          <th style="width: 110px">Pie Derecho</th>
                          <th >Observaciones</th>
                        </tr>

                        <tr>
                          <td>Edema</td>
                          <td>
                            <select class="form-control">
                              <option>Si</option>
                              <option>No</option>
                            </select>
                          </td>
                          <td>
                            <select class="form-control">
                              <option>Si</option>
                              <option>No</option>
                            </select>
                          </td>
                          <td>
                            <input type="text" class="form-control" id="inputSuccess" placeholder="Observaciones" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                          </td>
                        </tr>

                        <tr>
                          <td>Requesedad</td>
                          <td>
                            <select class="form-control">
                              <option>Si</option>
                              <option>No</option>
                            </select>
                          </td>
                          <td>
                            <select class="form-control">
                              <option>Si</option>
                              <option>No</option>
                            </select>
                          </td>
                          <td>
                            <input type="text" class="form-control" id="inputSuccess" placeholder="Observaciones" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                          </td>
                        </tr>

                        <tr>
                          <td>Varices</td>
                          <td>
                            <select class="form-control">
                              <option>Si</option>
                              <option>No</option>
                            </select>
                          </td>
                          <td>
                            <select class="form-control">
                              <option>Si</option>
                              <option>No</option>
                            </select>
                          </td>
                          <td>
                            <input type="text" class="form-control" id="inputSuccess" placeholder="Observaciones" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                          </td>
                        </tr>

                        <tr>
                          <td>Dermatomicosis</td>
                          <td>
                            <select class="form-control">
                              <option>Si</option>
                              <option>No</option>
                            </select>
                          </td>
                          <td>
                            <select class="form-control">
                              <option>Si</option>
                              <option>No</option>
                            </select>
                          </td>
                          <td>
                            <input type="text" class="form-control" id="inputSuccess" placeholder="Observaciones" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                          </td>
                        </tr>
                      </table>

                      <br>

                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="control-label" for="inputSuccess">Otros</label>
                            <textarea class="form-control" rows="3" placeholder=""></textarea>
                          </div>
                        </div>
                      </div>

                      <br>

                      <div class="row">
                        <div class="col-md-12"><h4 class="box-title">e) <ins> Hiperqueratosis</ins></h4></div>
                      </div>

                      <table class="table table-bordered" >
                        <tr>
                          <th style="width: 100px">Helomas</th>
                          <th style="width: 110px">Valoración</th>
                          <th style="width: 110px">Pie Derecho</th>
                          <th style="width: 110px">Pie Izquierdo</th>
                        </tr>

                        <tr>
                          <td>Interfalangico dorsal </td>
                          <td>
                            <select class="form-control">
                              <option>Si</option>
                              <option>No</option>
                            </select>
                          </td>
                          <td>
                            <select class="form-control">
                              <option>1</option>
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
                            </select>
                          </td>
                          <td>
                            <select class="form-control">
                              <option>1</option>
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
                            </select>
                          </td>
                        </tr>

                        <tr>
                          <td>Interdigitales</td>
                          <td>
                            <select class="form-control">
                              <option>Si</option>
                              <option>No</option>
                            </select>
                          </td>
                          <td>
                            <select class="form-control">
                              <option>1 y 2</option>
                              <option>2 y 3</option>
                              <option>3 y 4</option>
                              <option>4 y 5</option>
                            </select>
                          </td>
                          <td>
                            <select class="form-control">
                              <option>1 y 2</option>
                              <option>2 y 3</option>
                              <option>3 y 4</option>
                              <option>4 y 5</option>
                            </select>
                          </td>
                        </tr>

                        <tr>
                          <td>Dorsal del 5º dedo</td>
                          <td>
                            <select class="form-control">
                              <option>Si</option>
                              <option>No</option>
                            </select>
                          </td>
                          <td>
                            <select class="form-control">
                              <option>1</option>
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
                            </select>
                          </td>
                          <td>
                            <select class="form-control">
                              <option>1</option>
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
                            </select>
                          </td>
                        </tr>
                      </table>

                      <br>

                      <div class="row">
                        <div class="col-md-12"><h4 class="box-title">f) <ins>Alteraciones Digitales</ins></h4></div>
                      </div>

                      <div class="row">
                        <div class="col-md-12"><h4 class="box-title"><ins>Hallux Valgus</ins></h4></div>
                        <div class="col-md-2">
                          <label class="control-label">Valoración</label>
                          <select class="form-control">
                            <option>Si</option>
                            <option>No</option>
                          </select>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <label class="control-label" for="inputSuccess">Dedos Derecho</label>
                            <input type="text" class="form-control"  placeholder="">
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <label class="control-label" for="inputSuccess">Dedos Izquierdo</label>
                            <input type="text" class="form-control"  placeholder="">
                          </div>
                        </div>

                        <div class="col-md-2">
                          <div class="form-group">
                            <label class="control-label" for="inputSuccess">Dedos Derecho</label>
                            <select class="form-control">
                            <option>Si</option>
                            <option>No</option>
                          </select>
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <label class="control-label" for="inputSuccess">Dedos Izquierdo</label>
                            <select class="form-control">
                            <option>Si</option>
                            <option>No</option>
                          </select>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-12"><h4 class="box-title"><ins>Quinto de varo</ins></h4></div>
                        <div class="col-md-2">
                          <label class="control-label">Valoración</label>
                          <select class="form-control">
                            <option>Si</option>
                            <option>No</option>
                          </select>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <label class="control-label" for="inputSuccess">Dedos Derecho</label>
                            <input type="text" class="form-control"  placeholder="">
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <label class="control-label" for="inputSuccess">Dedos Izquierdo</label>
                            <input type="text" class="form-control"  placeholder="">
                          </div>
                        </div>

                        <div class="col-md-2">
                          <div class="form-group">
                            <label class="control-label" for="inputSuccess">Dedos Derecho</label>
                            <select class="form-control">
                            <option>Si</option>
                            <option>No</option>
                          </select>
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <label class="control-label" for="inputSuccess">Dedos Izquierdo</label>
                            <select class="form-control">
                            <option>Si</option>
                            <option>No</option>
                          </select>
                          </div>
                        </div>
                      </div>
                      
                      <div class="row">
                        <div class="col-md-12"><h4 class="box-title"><ins>Quinto de varo</ins></h4></div>
                        <div class="col-md-2">
                          <label class="control-label">Valoración</label>
                          <select class="form-control">
                            <option>Si</option>
                            <option>No</option>
                          </select>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <label class="control-label" for="inputSuccess">Dedos Derecho</label>
                            <select class="form-control">
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <label class="control-label" for="inputSuccess">Dedos Izquierdo</label>
                            <select class="form-control">
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
                            </select>
                          </div>
                        </div>

                        <div class="col-md-2">
                          <div class="form-group">
                            <label class="control-label" for="inputSuccess">Dedos Derecho</label>
                            <select class="form-control">
                            <option>Si</option>
                            <option>No</option>
                          </select>
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <label class="control-label" for="inputSuccess">Dedos Izquierdo</label>
                            <select class="form-control">
                            <option>Si</option>
                            <option>No</option>
                          </select>
                          </div>
                        </div>
                      </div>
                      <br>

                      <div class="row">
                        <div class="col-md-12"><h4 class="box-title">g) <ins>Onicopatías</ins></h4></div>
                      </div>

                      <table class="table table-bordered" >
                        <tr>
                          <th style="width: 100px">Onicopatías</th>
                          <th style="width: 110px">Valoración</th>
                          <th style="width: 50px">Pie Derecho</th>
                          <th style="width: 50px">Pie Izquierdo</th>
                        </tr>
                        <tr>
                          <td>Anoniquia</td>
                          <td>
                            <select class="form-control">
                              <option>Si</option>
                              <option>No</option>
                            </select>
                          </td>
                          <td>
                            <select class="form-control">
                              <option>1</option>
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
                              <option>5</option>
                            </select>
                          </td>
                          <td>
                            <select class="form-control">
                              <option>1</option>
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
                              <option>5</option>
                            </select>
                          </td>
                        </tr>
                        <tr>
                          <td>Microniquia</td>
                          <td>
                            <select class="form-control">
                              <option>Si</option>
                              <option>No</option>
                            </select>
                          </td>
                          <td>
                            <select class="form-control">
                              <option>1</option>
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
                              <option>5</option>
                            </select>
                          </td>
                          <td>
                            <select class="form-control">
                              <option>1</option>
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
                              <option>5</option>
                            </select>
                          </td>
                        </tr>
                        <tr>
                          <td>Onicolisis</td>
                          <td>
                            <select class="form-control">
                              <option>Si</option>
                              <option>No</option>
                            </select>
                          </td>
                          <td>
                            <select class="form-control">
                              <option>1</option>
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
                              <option>5</option>
                            </select>
                          </td>
                          <td>
                            <select class="form-control">
                              <option>1</option>
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
                              <option>5</option>
                            </select>
                          </td>
                        </tr>
                        <tr>
                          <td>Onicauxis</td>
                          <td>
                            <select class="form-control">
                              <option>Si</option>
                              <option>No</option>
                            </select>
                          </td>
                          <td>
                            <select class="form-control">
                              <option>1</option>
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
                              <option>5</option>
                            </select>
                          </td>
                          <td>
                            <select class="form-control">
                              <option>1</option>
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
                              <option>5</option>
                            </select>
                          </td>
                        </tr>
                        <tr>
                          <td>Onicocriptosis</td>
                          <td>
                            <select class="form-control">
                              <option>Si</option>
                              <option>No</option>
                            </select>
                          </td>
                          <td>
                            <select class="form-control">
                              <option>1</option>
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
                              <option>5</option>
                            </select>
                          </td>
                          <td>
                            <select class="form-control">
                              <option>1</option>
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
                              <option>5</option>
                            </select>
                          </td>
                        </tr>
                        <tr>
                          <td>Onicogriptosis</td>
                          <td>
                            <select class="form-control">
                              <option>Si</option>
                              <option>No</option>
                            </select>
                          </td>
                          <td>
                            <select class="form-control">
                              <option>1</option>
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
                              <option>5</option>
                            </select>
                          </td>
                          <td>
                            <select class="form-control">
                              <option>1</option>
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
                              <option>5</option>
                            </select>
                          </td>
                        </tr>
                        <tr>
                          <td>Onicofosis</td>
                          <td>
                            <select class="form-control">
                              <option>Si</option>
                              <option>No</option>
                            </select>
                          </td>
                          <td>
                            <select class="form-control">
                              <option>1</option>
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
                              <option>5</option>
                            </select>
                          </td>
                          <td>
                            <select class="form-control">
                              <option>1</option>
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
                              <option>5</option>
                            </select>
                          </td>
                        </tr>
                        <tr>
                          <td>Paquioniquia</td>
                          <td>
                            <select class="form-control">
                              <option>Si</option>
                              <option>No</option>
                            </select>
                          </td>
                          <td>
                            <select class="form-control">
                              <option>1</option>
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
                              <option>5</option>
                            </select>
                          </td>
                          <td>
                            <select class="form-control">
                              <option>1</option>
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
                              <option>5</option>
                            </select>
                          </td>
                        </tr>
                        <tr>
                          <td>Onicomicosis</td>
                          <td>
                            <select class="form-control">
                              <option>Si</option>
                              <option>No</option>
                            </select>
                          </td>
                          <td>
                            <select class="form-control">
                              <option>1</option>
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
                              <option>5</option>
                            </select>
                          </td>
                          <td>
                            <select class="form-control">
                              <option>1</option>
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
                              <option>5</option>
                            </select>
                          </td>
                        </tr>
                      </table>
                    </div>
                  </div>

                  <br>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="control-label" for="inputSuccess">Diagnóstico</label>
                        <textarea class="form-control" rows="3" placeholder=""></textarea>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="control-label" for="inputSuccess">Tratamiento</label>
                        <textarea class="form-control" rows="3" placeholder=""></textarea>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="control-label" for="inputSuccess">Indicaciones</label>
                        <textarea class="form-control" rows="3" placeholder=""></textarea>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="control-label" for="inputSuccess">Podólogo</label>
                        <textarea class="form-control" rows="3" placeholder=""></textarea>
                      </div>
                    </div>
                  </div>

                  <br>

                  <div class="row">
                    <div class="col-sm-12">
                      <div align="center"> 
                        <label> <strong> Próxima consulta o cita (Solo si aplica)</strong>  </label>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div align="left"><label>Fecha </label></div>
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
                        <?php usuariosAselect($ID);?>
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
                      <br><br><br>
                      <div class="col-sm-12">
                        <br><br>
                        <center><button type="submit" class="btn btn-block btn-primary btn-sm"> <h2> <strong>  G u a r d a r  </strong> </h2> </button></center>
                      </div>
                    </div>

                    <input type="hidden"  name="tipo_cliente"   valur="1">
                  </div>
                </div> 
                </div>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>  
          
          
          
     

<?php include("footer.php")?>

