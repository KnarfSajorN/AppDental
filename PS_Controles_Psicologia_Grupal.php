<?php 
  include 'header.php';
  include 'menu.php';
?>

<script type="text/javascript">
  function mostrar(id) 
  {
    if (id == "servicio1") 
    {
      $("#servicio1").show();
      $("#servicio2").hide();
      $("#servicio3").hide();
      $("#servicio4").hide();
      $("#servicio5").hide();
      $("#servicio6").hide();
    }
  
    if (id == "servicio2") 
    {
      $("#servicio1").hide();
      $("#servicio2").show();
      $("#servicio3").hide();
      $("#servicio4").hide();
      $("#servicio5").hide();
      $("#servicio6").hide();
      
    }
  
    if (id == "servicio3") {
      $("#servicio1").hide();
      $("#servicio2").hide();
      $("#servicio3").show();
      $("#servicio4").hide();
      $("#servicio5").hide();
      $("#servicio6").hide();
     
    }

    if (id == "servicio4") 
    {
      $("#servicio1").hide();
      $("#servicio2").hide();
      $("#servicio3").hide();
      $("#servicio4").show();
      $("#servicio5").hide();
      $("#servicio6").hide();
       
    }

    if (id == "servicio5") 
    { 
      $("#servicio1").hide();
      $("#servicio2").hide();
      $("#servicio3").hide();
      $("#servicio4").hide();
      $("#servicio5").show();
      $("#servicio6").hide();
     
    }

    if (id == "servicio6") 
    {
      $("#servicio1").hide();
      $("#servicio2").hide();
      $("#servicio3").hide();
      $("#servicio4").hide();
      $("#servicio5").hide();
      $("#servicio6").show();
      
    }
  }
</script>

<?php

  $clienteId = $_GET['clienteId'];
  $usuarioId = $_GET['usuarioId'];

  $conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));

  $queryList=mysqli_query($conn3,"SELECT * FROM  cliente where cliente_id=$clienteId");
  // $nrowl=mysqli_num_rows($queryList);

  if ($queryList) {
    while($rowMotorizado=mysqli_fetch_array($queryList))
    {
      $usuario_id=$rowMotorizado['usuario_id'];
      $nombre_cliente=$rowMotorizado['nombre_cliente'];
    }
  }
  
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Procedimiento</h1>
    <ol class="breadcrumb">
      <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio </a></li>
      <li><a href="#">Procedimiento</a></li>
    </ol>
  </section>

  <section class="content">
    <div class="">
      <div class="col-xs-12">
        <div class="box">
          <!-- /.box-header -->
          <div class="box-body">

            <div class="panel box box-primary">
              <div class="box-header with-border">
                <h4 class="box-title">
Seleccionar
                </h4>
              </div>
                  
              <div class="box-body">
 <form action="PS_Guardar_Controles_Psicologia_Grupal" method="POST" enctype="multipart/form-data">

          
                <div class="row">
                  <div class="col-md-12">




                 <select  id="prestaciones" name="prestaciones1[]" class="form-control select2" multiple="multiple" style="width: 100%;" >

                                                            <?php


                                                              $queryList=mysqli_query($conn3,"SELECT * FROM  cliente");
  // $nrowl=mysqli_num_rows($queryList);
  if ($queryList) {
  while($rowMotorizado=mysqli_fetch_array($queryList))
  {
    $usuario_id=$rowMotorizado['cliente_id'];
    $nombre_cliente=$rowMotorizado['nombre_cliente'];
   

                                                                echo "<option value='$usuario_id'>$nombre_cliente  </option>";
                                                            }
                                                          }
                                                            ?>
                            </select>







                  </div>
                </div>

            

                    <div class="box-header with-border text-center">
                      <h2 class="box-title">Psicoterapia de grupo por Psicología</h2>
                    </div>
                    <br>

                      

                    <input  type="hidden" name="tipo_trabajo"  value="Psicoterapia de grupo por Psicología">

 <input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo $_SESSION['ID']?>">

 <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Etapa</label>
                          <input type="text" name="etapa" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Objetivo</label>
                          <input type="text" name="objetivo2" class="form-control">
                        </div>
                      </div>

                      
                    </div>

 <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Desarrollo de la Sesión:</label>
                          <textarea class="form-control" id="desaSesion" name="desaSesion" placeholder="" rows="3" ></textarea>
                        </div>
                      </div>
                    </div>
 <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Participación:</label>
                          <textarea class="form-control" id="particip" name="particip" placeholder="" rows="3" ></textarea>
                        </div>
                      </div>
                    </div>
 <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Reflexiones  y compromisos  del participante:</label>
                          <textarea class="form-control" id="refCompr" name="refCompr" placeholder="" rows="3" ></textarea>
                        </div>
                      </div>
                    </div>

 <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Conclusion profesional  y recomendaciones: </label>
                          <textarea class="form-control" id="procedimiento" name="conclu" placeholder="" rows="3" ></textarea>
                        </div>
                      </div>
                    </div>
 <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Profesional Responsable y TP:</label>
                          <textarea class="form-control" id="procedimiento" name="profRespo" placeholder="" rows="3" ></textarea>
                        </div>
                      </div>
                    </div>


                 <div class="form-group col-md-12"><hr style="border-color:blue;"></div>
                    <br>
                    <br>

                    <div class="row">
                      <!--
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
                      </div>-->

                      <input  type="hidden" name="email" value="<?php echo $correo_cliente;?>">
                      <input  type="hidden" name="nombre"  value="<?php echo $nombre_cliente;?>">
                      <input  type="hidden" name="telefono"  value="<?php echo $telefono_cliente ;?>">
                      <input  type="hidden" name="ID"  value="<?php echo $_SESSION['ID']?>">
<!--
                      <input  type="hidden" name="clienteId"  value="<?php echo $clienteId?>">
-->
                      <input  type="hidden" name="NOMBRE_USUARIO"  value="<?php echo $_SESSION['NOMBRE_USUARIO']?>">
                      
                      <div align="center" class="col-md-12"> 
                        <br><br><br>
                        <div class="col-md-12">
                          <br><br>
                          <center><button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow"> <h2> <strong>  G u a r d a r  </strong> </h2> </button></center>
                        </div>
                      </div>

                      <input type="hidden"  name="tipo_cliente"   valur="1">
                    </div>
                  </form>
                </div>

             


          
      </div>
    </div>
  </section>
</div>




<?php include("footer.php")?>
<script>
  // no quitar para evitar problemas de que guarde con este caracter " ' "
  $(document).on('input', 'input[type="text"], textarea', function() {
    $(this).val($(this).val().replace(/[']/g, ''));
  });
</script>

<script src="apiVoz_3.2.js"></script>
<?php include 'plantilla.php';

 