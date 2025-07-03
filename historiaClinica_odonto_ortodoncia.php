<?php
   include 'header.php';
   include 'menu.php';

$cliente_odonto_id = $_GET['cliente_odonto_id'];
$pzs = $_GET['pzs'];

echo $cliente_odonto_id;
echo $pzs;

 

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


  <div class="col-md-12">




        <select name="tipoConsulta" class="form-control select2" style="width: 100%;">
          <option selected="selected" value="">Seleccione tipo de consulta</option>
          <option>Consulta externa</option>
          <option>Urgencia</option>
          <option>Ambulatorio </option>
        </select>





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
                {

                echo '';
                }
                ?>
              <input type="button" class="btn btn-block btn-primary btn-sm" value="Historial consultas" 
              onclick="javascript:window.open('consultaHistoriaMedica.php?tipo=<?php echo $clienteId?>&ID=<?php echo $ID?>','','width=600,height=400,left=50,top=50,toolbar=yes');" />
 
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

 <form action="finalizar.php" method="POST" name="formularioActualizarcliente">




































<!--  *******************************  QUIRURGICO  **************************** -->  
<!--  *******************************  QUIRURGICO  **************************** -->  
<!--  *******************************  QUIRURGICO  **************************** -->  
<!--  *******************************  QUIRURGICO  **************************** -->  
<!--  *******************************  QUIRURGICO  **************************** -->  
<!--  *******************************  QUIRURGICO  **************************** -->  
<!--  *******************************  QUIRURGICO  **************************** -->  
<!--  *******************************  QUIRURGICO  **************************** -->  
<!--  *******************************  QUIRURGICO  **************************** -->   




                  <div class="panel box box-danger">
                    <div class="box-header with-border">
                      <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                          I.  História Clinica y Odontológica</ins>
                        </a>
                      </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse">
                      <div class="box-body">
                        <h4 class="box-title"><ins>Antecedentes Médicos</ins></h4>
                        <table class="table table-bordered" >
                          <tr>
                            <th style="width: 500px">Tipos de Antecedentes Médicos</th>
                            <th style="width: 40px">Si</th>
                            <th style="width: 40px">No</th>
                            <th >Específique</th>
                          </tr>

                          <tr>
                            <td>Trastornos endocrinos</td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td>
                              <input type="text" class="form-control" id="inputSuccess" placeholder="Específique" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                            </td>
                          </tr>

                          <tr>
                            <td>Intervenciones quirúrgicas</td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td>
                              <input type="text" class="form-control" id="inputSuccess" placeholder="Específique" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                            </td>
                          </tr>

                          <tr>
                            <td>Transfusiones de sangre</td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td>
                              <input type="text" class="form-control" id="inputSuccess" placeholder="Específique" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                            </td>
                          </tr>

                          <tr>
                            <td>Enfermedades infecciosas</td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td>
                              <input type="text" class="form-control" id="inputSuccess" placeholder="Específique" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                            </td>
                          </tr>

                          <tr>
                            <td>Tratamiento farmacológico actual</td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td>
                              <input type="text" class="form-control" id="inputSuccess" placeholder="Específique" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                            </td>
                          </tr>

                          <tr>
                            <td>Fiebre reumática, enfermedades cardiacas (profilaxis para bandas)</td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td>
                              <input type="text" class="form-control" id="inputSuccess" placeholder="Específique" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                            </td>
                          </tr>

                          <tr>
                            <td>Traumatismos dentales y maxilares</td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td>
                              <input type="text" class="form-control" id="inputSuccess" placeholder="Específique" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                            </td>
                          </tr>

                          <tr>
                            <td>Enfermedades respiratorias</td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td>
                              <input type="text" class="form-control" id="inputSuccess" placeholder="Específique" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                            </td>
                          </tr>

                          <tr>
                            <td>Alergias (látex, níquel)</td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td>
                              <input type="text" class="form-control" id="inputSuccess" placeholder="Específique" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                            </td>
                          </tr>
                        </table>
                        <br>

                        <h4 class="box-title" ><ins>Antecedentes Odontológicos</ins></h4>
                        <table class="table table-bordered">
                          <tr>
                            <th style="width: 500px">Tipos de Antecedentes Médicos</th>
                            <th style="width: 40px">Si</th>
                            <th style="width: 40px">No</th>
                            <th >Específique</th>
                          </tr>

                          <tr>
                            <td>Dolor bucal o de la ATM</td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td>
                              <input type="text" class="form-control" id="inputSuccess" placeholder="Específique" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                            </td>
                          </tr>

                          <tr>
                            <td>Patología dental o gingival</td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td>
                              <input type="text" class="form-control" id="inputSuccess" placeholder="Específique" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                            </td>
                          </tr>

                          <tr>
                            <td>Hábitos dietéticos e higiénicos</td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td>
                              <input type="text" class="form-control" id="inputSuccess" placeholder="Específique" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                            </td>
                          </tr>
                        </table>

                        <br>
                        <h4 class="box-title" ><ins>Antecedentes Familiares</ins></h4>
                        <table class="table table-bordered">
                          <tr>
                            <th style="width: 500px">Tipos de Antecedentes Médicos</th>
                            <th style="width: 40px">Si</th>
                            <th style="width: 40px">No</th>
                            <th >Específique</th>
                          </tr>

                          <tr>
                            <td>Los padres han recibido tratamiento ortodontico</td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td>
                              <input type="text" class="form-control" id="inputSuccess" placeholder="Específique" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                            </td>
                          </tr>
                        </table>

                        <br>
                        <h4 class="box-title" ><ins>Antecedentes Ortodonticos</ins></h4>
                        <table class="table table-bordered">
                          <tr>
                            <th style="width: 500px">Tipos de Antecedentes Médicos</th>
                            <th style="width: 40px">Si</th>
                            <th style="width: 40px">No</th>
                            <th >Específique</th>
                          </tr>

                          <tr>
                            <td>Historia previa de tratamiento ortodontico</td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td>
                              <input type="text" class="form-control" id="inputSuccess" placeholder="Específique" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                            </td>
                          </tr>

                          <tr>
                            <td>Maloclusión de tipo hereditario</td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td>
                              <input type="text" class="form-control" id="inputSuccess" placeholder="Específique" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                            </td>
                          </tr>

                          <tr>
                            <td>Cronología de erupción</td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td>
                              <input type="text" class="form-control" id="inputSuccess" placeholder="Específique" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                            </td>
                          </tr>

                          <tr>
                            <td>Presencia de para funciones</td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td>
                              <input type="text" class="form-control" id="inputSuccess" placeholder="Específique" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                            </td>
                          </tr>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="panel box box-success">
                    <div class="box-header with-border">
                      <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                          II. Examen Clínico 
                        </a>
                      </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse">
                      <div class="box-body">
                        <h4 class="box-title"><ins>Tejidos Blandos y Duros Intrabucales</ins></h4>

                        <div class="row">
                          <div class="col-md-3">
                            <div class="form-group">
                              <label class="control-label" for="inputSuccess">Labios y comisura labial</label>
                              <input type="text" class="form-control" id="inputSuccess" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                            </div>
                          </div>

                          <div class="col-md-3">
                            <div class="form-group">
                              <label class="control-label" for="inputSuccess">Mucosa bucal</label>
                              <input type="text" class="form-control" id="inputSuccess" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                            </div>
                          </div>

                          <div class="col-md-3">
                            <div class="form-group">
                              <label class="control-label" for="inputSuccess">Carrillos</label>
                              <input type="text" class="form-control" id="inputSuccess" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                            </div>
                          </div>

                          <div class="col-md-3">
                            <div class="form-group">
                              <label class="control-label" for="inputSuccess">Piso de boca</label>
                              <input type="text" class="form-control" id="inputSuccess" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-3">
                            <div class="form-group">
                              <label class="control-label" for="inputSuccess">Paladar duro y blando </label>
                              <input type="text" class="form-control" id="inputSuccess" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                            </div>
                          </div>

                          <div class="col-md-3">
                            <div class="form-group">
                              <label class="control-label" for="inputSuccess">Pared posterior bucal</label>
                              <input type="text" class="form-control" id="inputSuccess" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                            </div>
                          </div>

                          <div class="col-md-3">
                            <div class="form-group">
                              <label class="control-label" for="inputSuccess">Lengua</label>
                              <input type="text" class="form-control" id="inputSuccess" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                            </div>
                          </div>

                          <div class="col-md-3">
                            <div class="form-group">
                              <label class="control-label" for="inputSuccess">Frenillos</label>
                              <input type="text" class="form-control" id="inputSuccess" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                            </div>
                          </div>
                        </div>

                        <h4 class="box-title"><ins>Examen de Dentición</ins></h4>

                        <div class="row">
                          <div class="col-md-3">
                            <div class="form-group">
                              <label class="control-label" for="inputSuccess">Número de piezas dentarias</label>
                              <input type="text" class="form-control" id="inputSuccess" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                            </div>
                          </div>

                          <div class="col-md-3">
                            <div class="form-group">
                              <label class="control-label" for="inputSuccess">Tamaño y forma</label>
                              <input type="text" class="form-control" id="inputSuccess" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                            </div>
                          </div>

                          <div class="col-md-3">
                            <div class="form-group">
                              <label class="control-label" for="inputSuccess">Posiciones</label>
                              <input type="text" class="form-control" id="inputSuccess" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                            </div>
                          </div>

                          <div class="col-md-3">
                            <div class="form-group">
                              <label class="control-label" for="inputSuccess">Relación interoclusales </label>
                              <input type="text" class="form-control" id="inputSuccess" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-3">
                            <div class="form-group">
                              <label class="control-label" for="inputSuccess">Caries e hipoplasias dentarias</label>
                              <input type="text" class="form-control" id="inputSuccess" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                            </div>
                          </div>

                          <div class="col-md-3">
                            <div class="form-group">
                              <label class="control-label" for="inputSuccess">Malformaciones coronarias</label>
                              <input type="text" class="form-control" id="inputSuccess" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                            </div>
                          </div>

                          <div class="col-md-3">
                            <div class="form-group">
                              <label class="control-label" for="inputSuccess">Facetas de desgaste</label>
                              <input type="text" class="form-control" id="inputSuccess" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                            </div>
                          </div>

                          <div class="col-md-3">
                            <div class="form-group">
                              <label class="control-label" for="inputSuccess">Movilidad de dientes primarios</label>
                              <input type="text" class="form-control" id="inputSuccess" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                            </div>
                          </div>
                        </div>

                        <h4 class="box-title"><ins>Analísis Funcional</ins></h4>

                        <div class="row">
                          <div class="col-md-3">
                            <div class="form-group">
                              <label class="control-label" for="inputSuccess">Tipo de respiración</label>
                              <input type="text" class="form-control" id="inputSuccess" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                            </div>
                          </div>

                          <div class="col-md-3">
                            <div class="form-group">
                              <label class="control-label" for="inputSuccess">Deglución</label>
                              <input type="text" class="form-control" id="inputSuccess" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                            </div>
                          </div>

                          <div class="col-md-3">
                            <div class="form-group">
                              <label class="control-label" for="inputSuccess">Fonación</label>
                              <input type="text" class="form-control" id="inputSuccess" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                            </div>
                          </div>

                          <div class="col-md-3">
                            <div class="form-group">
                              <label class="control-label" for="inputSuccess">Presencia/ ausencia de hábitos </label>
                              <input type="text" class="form-control" id="inputSuccess" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label" for="inputSuccess">Presencia/ausencia de contactos prematuros en oclusión</label>
                              <input type="text" class="form-control" id="inputSuccess" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label" for="inputSuccess">Presencia/ausencia de desviaciones en los movimientos de apertura y cierre</label>
                              <input type="text" class="form-control" id="inputSuccess" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label class="control-label" for="inputSuccess">Tono muscular del paciente</label>
                              <input type="text" class="form-control" id="inputSuccess" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                            </div>
                          </div>

                          <div class="col-md-5">
                            <div class="form-group">
                              <label class="control-label" for="inputSuccess">Ruidos articulares en los movimientos de apertura y cierre</label>
                              <input type="text" class="form-control" id="inputSuccess" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                            </div>
                          </div>
                        </div>

                        <h4 class="box-title"><ins>Examen Visual de Proporciones Faciales</ins></h4>

                        <h4 class="box-title">a) <ins>Frente</ins></h4>

                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label class="control-label" for="inputSuccess">Craneo</label>
                              <select class="form-control">
                                <option>Seleccione</option>
                                <option>Dolicocefálico</option>
                                <option>Mesocefálico</option>
                                <option>Braquicefálico</option>
                              </select>
                            </div>
                          </div>

                          <div class="col-md-4">
                            <div class="form-group">
                              <label class="control-label" for="inputSuccess">Cara</label>
                              <select class="form-control">
                                <option>Seleccione</option>
                                <option>Leptoprosopo</option>
                                <option>Mesoprosopo</option>
                                <option>Europrosopo</option>
                              </select>
                            </div>
                          </div>

                          <div class="col-md-4">
                            <div class="form-group">
                              <label class="control-label" for="inputSuccess">Simetría</label>
                              <select class="form-control">
                                <option>Seleccione</option>
                                <option>Simétrico</option>
                                <option>Asimétrico</option>
                              </select>
                            </div>
                          </div>
                        </div>

                        <h4 class="box-title">b) <ins>Perfil</ins></h4>

                        <div class="row">
                          <div class="col-md-3">
                            <div class="form-group">
                              <label class="control-label" for="inputSuccess">Tipo de Perfil</label>
                              <select class="form-control">
                                <option>Seleccione</option>
                                <option>Cóncavo</option>
                                <option>Recto</option>
                                <option>Converzio</option>
                              </select>
                            </div>
                          </div>

                          <div class="col-md-3">
                            <div class="form-group">
                              <label class="control-label" for="inputSuccess">Armonía Labial</label>
                              <select class="form-control">
                                <option>Seleccione</option>
                                <option>Transversal</option>
                                <option>Vertical</option>
                              </select>
                            </div>
                          </div>

                          <div class="col-md-3">
                            <div class="form-group">
                              <div class="form-group">
                                <label class="control-label" for="inputSuccess">Plano Estético de Ricketts</label>
                                <input type="text" class="form-control" id="inputSuccess" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                              </div>
                            </div>
                          </div>

                          <div class="col-md-3">
                            <div class="form-group">
                              <div class="form-group">
                                <label class="control-label" for="inputSuccess">Tipo de Sonrisa</label>
                                <input type="text" class="form-control" id="inputSuccess" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                              </div>
                            </div>
                          </div>
                        </div>

                        <h4 class="box-title"><ins>Análisis de Registros Diagnósticos</ins></h4>

                        <h4 class="box-title">1.- <ins>Modelo de Estudio</ins></h4>
                        <table class="table table-bordered">
                          <tr>
                            <th style="width: 200px">Simetría del arco superior</th>
                            <th style="width: 40px"><label> Si <input type="radio" name="r3" class="flat-green"></label></th>
                            <th style="width: 40px"><label> No <input type="radio" name="r3" class="flat-green"></label></th>
                            <th style="width: 200px">Simetría del arco inferior:</th>
                            <th style="width: 40px"><label> Si <input type="radio" name="r3" class="flat-green"></label></th>
                            <th style="width: 40px"><label> No <input type="radio" name="r3" class="flat-green"></label></th>
                          </tr>
                        </table>

                        <br>

                        <div class="row">
                          <div class="col-md-3">
                            <div class="form-group">
                              <label class="control-label" for="inputSuccess">Forma del arco superior</label>
                              <select class="form-control">
                                <option>Seleccione</option>
                                <option>Ovalado</option>
                                <option>Cuadrado</option>
                                <option>Triangular</option>
                              </select>
                            </div>
                          </div>

                          <div class="col-md-3">
                            <div class="form-group">
                              <label class="control-label" for="inputSuccess">Forma del arco inferior</label>
                              <select class="form-control">
                                <option>Seleccione</option>
                                <option>Ovalado</option>
                                <option>Cuadrado</option>
                                <option>Triangular</option>
                              </select>
                            </div>
                          </div>

                          <div class="col-md-3">
                              <div class="form-group">
                                <label class="control-label" for="inputSuccess">Ancho Intermolar Superior</label>
                                <input type="text" class="form-control"  placeholder=".mm">
                              </div>
                          </div>

                          <div class="col-md-3">
                              <div class="form-group">
                                <label class="control-label" for="inputSuccess">Ancho Intermolar Inferior</label>
                                <input type="text" class="form-control"  placeholder=".mm">
                              </div>
                          </div>                    

                        </div>

                        <div class="row">
                          <div class="col-md-3">
                              <div class="form-group">
                                <label class="control-label" for="inputSuccess">Ancho Intermolar Inferior</label>
                                <input type="text" class="form-control"  placeholder=".mm">
                              </div>
                          </div>

                          <div class="col-md-3">
                              <div class="form-group">
                                <label class="control-label" for="inputSuccess">Ancho Intercanino Inferior</label>
                                <input type="text" class="form-control"  placeholder=".mm">
                              </div>
                          </div>
                        </div>

                        <h4 class="box-title">2.- <ins>Análisis de espacio de la Dentición Permanente </ins></h4>

                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label" for="inputSuccess">Dientes - Superiores - Lado Derecho: </label>
                              1 <input type="radio" name="r3" class="flat-green">
                              2 <input type="radio" name="r3" class="flat-green">
                              3 <input type="radio" name="r3" class="flat-green">
                              4 <input type="radio" name="r3" class="flat-green">
                              5 <input type="radio" name="r3" class="flat-green">
                              6 <input type="radio" name="r3" class="flat-green">
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label" for="inputSuccess">Dientes - Superiores - Lado Izquierdo: </label>
                              1 <input type="radio" name="r3" class="flat-green">
                              2 <input type="radio" name="r3" class="flat-green">
                              3 <input type="radio" name="r3" class="flat-green">
                              4 <input type="radio" name="r3" class="flat-green">
                              5 <input type="radio" name="r3" class="flat-green">
                              6 <input type="radio" name="r3" class="flat-green">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label" for="inputSuccess">Dientes - Inferiores - Lado Derecho: </label>
                              1 <input type="radio" name="r3" class="flat-green">
                              2 <input type="radio" name="r3" class="flat-green">
                              3 <input type="radio" name="r3" class="flat-green">
                              4 <input type="radio" name="r3" class="flat-green">
                              5 <input type="radio" name="r3" class="flat-green">
                              6 <input type="radio" name="r3" class="flat-green">
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label" for="inputSuccess">Dientes - Inferiores - Lado Izquierdo: </label>
                              1 <input type="radio" name="r3" class="flat-green">
                              2 <input type="radio" name="r3" class="flat-green">
                              3 <input type="radio" name="r3" class="flat-green">
                              4 <input type="radio" name="r3" class="flat-green">
                              5 <input type="radio" name="r3" class="flat-green">
                              6 <input type="radio" name="r3" class="flat-green">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div class="row">
                          <div class="col-md-4">
                              <div class="form-group">
                                <label class="control-label" for="inputSuccess">Espacio Disponible Superior</label>
                                <input type="text" class="form-control"  placeholder=".mm">
                              </div>
                          </div>

                          <div class="col-md-4">
                              <div class="form-group">
                                <label class="control-label" for="inputSuccess">Espacio Requerido Superior</label>
                                <input type="text" class="form-control"  placeholder=".mm">
                              </div>
                          </div>

                          <div class="col-md-4">
                              <div class="form-group">
                                <label class="control-label" for="inputSuccess">Discrepancia Superior</label>
                                <input type="text" class="form-control"  placeholder=".mm">
                              </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-4">
                              <div class="form-group">
                                <label class="control-label" for="inputSuccess">Espacio Disponible Inferior</label>
                                <input type="text" class="form-control"  placeholder=".mm">
                              </div>
                          </div>

                          <div class="col-md-4">
                              <div class="form-group">
                                <label class="control-label" for="inputSuccess">Espacio Requerido Inferior</label>
                                <input type="text" class="form-control"  placeholder=".mm">
                              </div>
                          </div>

                          <div class="col-md-4">
                              <div class="form-group">
                                <label class="control-label" for="inputSuccess">Discrepancia Inferior</label>
                                <input type="text" class="form-control"  placeholder=".mm">
                              </div>
                          </div>
                        </div>
                        <br>
                        
                        <h4 class="box-title">3.- <ins>Análisis Radiógrafico </ins></h4>

                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label class="control-label" for="inputSuccess">Ortopantomografía</label>
                              <textarea class="form-control" rows="3" placeholder=""></textarea>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label class="control-label" for="inputSuccess">Carpal</label>
                              <textarea class="form-control" rows="3" placeholder=""></textarea>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label class="control-label" for="inputSuccess">Lateral del Craneo</label>
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
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                          III. Lista de Problemas y Objetivos del tratamiento 
                        </a>
                      </h4>
                    </div>
                    <div id="collapseFour" class="panel-collapse collapse">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="control-label" for="inputSuccess">Diagnóstico Ortopedico-Ortodoncico</label>
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
                    </div>
                  </div>

                  <div class="panel box box-info">
                    <div class="box-header with-border">
                      <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive">
                          IV.  Plan de Tratamiento y Descripción 
                        </a>
                      </h4>
                    </div>
                    <div id="collapseFive" class="panel-collapse collapse">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <textarea class="form-control" rows="3" placeholder=""></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->

































































<hr>  
 
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
                <select id="doctor" name="doctor" class="form-control select2" style="width: 100%;" required="required">
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
                  <input type="radio" name="P" value="0" class="flat-red" >
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
            <center><button type="submit" class="btn btn-block btn-primary btn-sm"> <h2> <strong>  G u a r d a r  </strong> </h2> </button></center>
            
            </div>
            </div>
             
                 



           
            <input type="hidden"  name="tipo_cliente"   valur="1">
           </div>   
            
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


<script type="text/javascript">

 
</script>