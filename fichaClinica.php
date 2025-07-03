<?php
include 'header.php';
include 'menu.php'; ?>


<script type="text/javascript">
  function mostrar(id) {
    if (id == "servicio1") {
      $("#servicio1").show();
    }


  }
</script>


<?php
$clienteId = decrypt($_GET['cI']);

//$clienteId = $_GET['clienteId']; 
$usuarioId = $_GET['usuarioId'];


$conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));

$queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id=$clienteId");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
  $usuario_id = $rowMotorizado['usuario_id'];
  $nombre_cliente = $rowMotorizado['nombre_cliente'];
  $celular = $rowMotorizado['celular_cliente'];
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


?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Procedimiento

    </h1>
    <!-- <ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio </a></li>
        <li><a href="#">Procedimiento</a></li>

      </ol> -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="">
      <div class="col-xs-12">


        <div class="box">

          <!-- /.box-header -->
          <div class="box-body">



            <!--   <div class="col-md-5">
                
              <label><strong>Correo:</strong></label>
                <label> <?php echo $correo_cliente; ?>  </label>
              

              <br>
                <label><strong>Nombre:</strong></label>
                 <label><?php echo $nombre_cliente; ?> </label>
              

               <br>
                <label><strong>Celular:</strong></label>
                <label><?php echo $celular; ?></label>
            
                <br> 
                <label><strong>Ciudad:</strong></label>
                <label><?php echo $ciudad_cliente; ?></label>
             
                <br>
                <label><strong>Fecha registro:</strong></label>
                <label><?php echo $fechar; ?></label>
                
               <br>
                <label><strong>Cedula o ID:</strong></label>
                <label><?php echo $CODI_CLIENTE; ?></label>
               
               <br>
                <label><strong> Es donante:</strong></label>
                <label><?php echo $esDonante; ?></label>
               
               <br>
                <label><strong>Entidad de salud :</strong></label>
                <label><?php echo $entidadSalud; ?></label>
               
              

            </div>
       
               <div class="col-md-5">
                <label><strong>  Dirección cliente:</strong></label>
                <label><?php echo $direccion_cliente; ?></label>
             <br>
                <label><strong> Teléfono :</strong></label>
                <label><?php echo $telefono_cliente; ?></label>
                <br>
                
                <label><strong> Fecha de nacimiento :</strong></label>
                <label><?php echo $fechaNacimiento; ?></label>
                
                   <br>


                <label><strong> Edad :</strong></label>
                <label><?php echo calculaedad($fechaNacimiento); ?></label>
                
                 <br>

                  <label><strong>Genero:</strong></label>
                  <label><?php echo $genero; ?></label>

               <br>
                  <label><strong>Profesión :</strong></label>
                  <label><?php echo $profesion_cliente; ?></label>

                <br>
                  <label><strong>Tipo de sangre :</strong></label>
                  <label><?php echo $tiposSangre; ?></label>   

                <br>

               <br>
                <label><strong>Seguro :</strong></label>
                <label><?php echo $seguro; ?></label>
               
                 

              </div>-->

            <div class="box-body">
              <div class="box-group" id="accordion1">
                <!-- we are adding the .card class so bootstrap.js collapse plugin detects it -->
                <div class="card box box-primary border-primary">
                  <div class="box-header with-border">
                    <h4 class="card-title">
                      <a data-toggle="collapse" data-parent="#accordion1" href="#ConsultarEstetica">
                        Ver Tratamiento Paciente
                      </a>
                    </h4>
                  </div>
                  <div id="ConsultarEstetica" class="card-collapse collapse">

                    <!--<iframe src="HC_ConsultaFicha?cI=<?php echo encrypt($clienteId) ?>&vista_previa=1234" width="100%" height="580" style="border:none;"></iframe>-->

                    <?php
                          $usuario_id = $_SESSION['ID'];
                          $queryList = mysqli_query($conn3, "SELECT * FROM  e_tratamiento1 where idCliente = $clienteId and idUsuario = $usuario_id order by ID DESC");

                          $nrowl = mysqli_num_rows($queryList);

                          while ($row_recordset32 = mysqli_fetch_array($queryList)) {
                            $ID                 = $row_recordset32['id'];
                            $fechaHora                 = $row_recordset32['fechaHora'];
                            $tratamiento                  = $row_recordset32['tratamiento'];
                            $procedimiento        = $row_recordset32['procedimiento'];
                            $planAtencion           = $row_recordset32['planAtencion'];
                            $abono           = $row_recordset32['abono'];

                            $nota           = $row_recordset32['nota'];

                            $descripcion           = $row_recordset32['descripcion'];

                            $peso           = $row_recordset32['peso'];
                            $altura           = $row_recordset32['altura'];
                            $imc           = $row_recordset32['imc'];
                            $composicionCorporal           = $row_recordset32['composicionCorporal'];

                            $operador           = $row_recordset32['operador'];
                            $MotivoConsultaD                 = $row_recordset32['MotivoConsultaD'];
                            $TratamientoD                 = $row_recordset32['TratamientoD'];
                            $ProductoD                 = $row_recordset32['ProductoD'];
                            $CantidadD                 = $row_recordset32['CantidadD'];
                            $NSesiones                 = $row_recordset32['NSesiones'];
                            $img11                 = $row_recordset32['img11'];
                            $img12                 = $row_recordset32['img12'];
                            $SesionD                 = $row_recordset32['SesionD'];
                            $NSesiones1                = $row_recordset32['NSesiones1'];
                            $ImpresionD                = $row_recordset32['ImpresionD'];

                            $SesionesD = $row_recordset32['sesionesD'];
                            
                                  $TextoAcumulativo="";
                                  if (strlen($MotivoConsultaD) > 0){
                                    $TextoAcumulativo.= "<div>
                                                          <strong> Motivo de Consulta </strong> {$MotivoConsultaD}
                                                        </div>";
                                  }
                                  
                                  if (strlen($ImpresionD) > 0){
                                    
                                    $TextoAcumulativo.= "<div>
                                                          <strong>Impresión Diagnostica</strong> {$ImpresionD}
                                                        </div>";
                                  }
                                  
                                  if (strlen($TratamientoD) > 0){
                                    
                                    $TextoAcumulativo.= "<div>
                                                          <strong> Tratamiento: </strong> {$TratamientoD}
                                                        </div>";
                                  }
                                  
                                  if (strlen($ProductoD) > 0){
                                    
                                    $TextoAcumulativo.= "<div>
                                                          <strong> Producto: </strong> {$ProductoD}
                                                        </div>";
                                  }
                                  
                                  if (strlen($CantidadD) > 0){
                                    
                                    $TextoAcumulativo.= "<div>
                                                          <strong> Cantidad de Producto: </strong> {$CantidadD}
                                                        </div>";
                                  }
                                  
                                  if (strlen($SesionesD) > 0){
                                    
                                    $TextoAcumulativo.= "<div>
                                                          <strong> Sesiones: </strong> {$SesionesD}
                                                        </div>";
                                  }

                                  if (strlen($NSesiones) > 0){
                                    
                                    $TextoAcumulativo.= "<div>
                                                          <strong> Número de Sesiones: </strong> {$NSesiones}
                                                        </div>";
                                  }

                                  if (strlen($NSesiones1) > 0){
                                    
                                    $TextoAcumulativo.= "<div>
                                                          <strong> Sesión Número: </strong> {$NSesiones1}
                                                        </div>";
                                  }

                                  if (strlen($SesionD) > 0){
                                    
                                    $TextoAcumulativo.= "<div>
                                                          <strong> Sesión: </strong> {$SesionD}
                                                        </div>";
                                  }

                                  $TextoAcumulativo .= "<strong> Doctor:{$operador}</strong>";


                            echo "
                            <div class='row'>
                              <div class='col-12'>

                                <div class='card collapsed-card'>
                                  <div class='card-header'>
                                    <h3 class='card-title' style='width:100%'> <button type='button' class='btn btn-block btn-outline-info' data-card-widget='collapse' title='Collapse' type='button' style='width: 100%;display: initial;'><i class='fas fa-plus'></i>
                                    Fecha {$fechaHora} </strong> </button>
                                    </h3>
                                  </div>
                                  <div class='card-body' style='display: none;'>

                                    <hr align='center' size='10' width='100%' color='#000000'>
                                  
                                    {$TextoAcumulativo}


                                  </div>

                                  <div class='card-footer' style='display: none;'>
                                  Footer
                                  </div>

                                </div>

                              </div>
                            </div>";

                          }
                          ?>

                  </div>
                </div>
              </div>
            </div>
            <div class="card box box-primary">
              <div class="box-header with-border border-primary">
                <h4 class="card-title">
                  <a data-toggle="collapse" data-parent="#accordion1" href="#collapseOne">
                    Datos personales
                  </a>
                </h4>
              </div>
              <div id="collapseOne" class="card-collapse collapse">
                <?php echo datosPacientes($clienteId); ?>
              </div>
            </div>

            <!-- <div class="col-md-2">

                <?php
                // echo strlen($logoF);
                // if (strlen($fotoperfil) > 0) { 
                //echo '<img src="'.$Base.'/pascientes/'.$fotoperfil.'" width="90%" height="20%">';
                //}
                //else
                //{

                // echo '';
                //}


                /*

                   <input type="button" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" value="Historial consultas" 
              onclick="javascript:window.open('consultaHistoriaMedica.php?tipo=<?php echo $clienteId?>&ID=<?php echo $ID?>','','width=600,height=400,left=50,top=50,toolbar=yes');" />

                */
                ?>


             
 
              </div>  -->

            <div class="col-md-12">

              <div class="col-md-6">
                <h4 class="card-title">Agregar tratamiento</h4>
              </div>

              <div class="col-md-6" align="right">
                <h4 class="card-title"> <?php echo date("d-m-Y h:m") ?> </h4>
              </div>


              <br>

              <form action="index.php" method="post">
                <label>Selección tipo de tratamiento </label>
                <select id="status" name="status" class="form-control select2" onChange="mostrar(this.value);" style="width: 40%;">
                  <option>Seleccione </option>
                  <option value="servicio1">Ficha Clínica</option>




                </select>
              </form>
            </div>




            <div id="servicio1" class="element" style="display: none;">
              <div class="col-md-12">

                <div align="center">
                  <h2>Ficha Clínica </h2>
                </div>


                <form class="form-horizontal row" action="fichaClinica_Guardar.php" method="POST" enctype="multipart/form-data" id="FormularioHistoriaClinica" >

                  <div class="form-group col-md-12">
                    <font size="4"> Motivo de la Consulta </font>
                  </div>

                  <div class="box-body pad col-md-12">

                    <textarea id="MotivoConsultaD" name="MotivoConsultaD" class="textarea" placeholder="Motivo de la Consulta" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

                  </div>

                  <div class="form-group col-md-12">
                    <font size="4"> Impresión Diagnostica </font>
                  </div>

                  <div class="box-body pad col-md-12">

                    <textarea id="ImpresionD" name="ImpresionD" class="textarea" placeholder="Impresión Diagnostica" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

                  </div>


                  <div class="form-group col-md-12">
                    <hr style="border-color:blue;">
                  </div>




                  <!--<div class="form-group col-md-12">
          <div align="left">Tratamiento </div>
        </div>

        
        <div class="box-body pad col-md-12">
        
          <textarea id="TratamientoD" name="TratamientoD" class="textarea" placeholder="Tratamiento" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
       
        </div>-->

                  <div class="form-group col-md-12">
                    <div align="left">Producto de Paquete de Procedimientos</div>
                    <select id="ProductoPaquete_DetalleFactura" name="ProductoPaquete_DetalleFactura" class="form-control select2" style="width: 100%;" required onChange="CargarCantidadSesiones(this);">
                    <option value="" selected="selected">Seleccione Producto</option>
                    <?php

                    $usuario_id = $_SESSION['ID'];
                    $QueryInventarioPaquetes = mysqli_query($conn3, "SELECT * FROM sDetalleOper where id_cliente=$clienteId and id_usuario = $usuario_id AND Tipo_Producto ='Inventario_Paquete' AND PaqueteProcedimiento_id !='0' order by id DESC");
                    $nrowl = mysqli_num_rows($queryList);
                    while ($RowInventarioPaquetes = mysqli_fetch_array($QueryInventarioPaquetes)) {
                      $descripcion     = $RowInventarioPaquetes['descripcion'];
                      $id_detalle              = $RowInventarioPaquetes['id'];
                      $cantidad = $RowInventarioPaquetes['cantidad'];

                      $idOperacion_select = $RowInventarioPaquetes['idOperacion'];

                      $Procedimiento_Realizado="0";
                      $QueryProcesadoProducto = mysqli_query($conn3, "SELECT * FROM  HFC_ProductosPaquetesHistorias where detalle_id = $id_detalle and  idOperacion = $idOperacion_select AND Estado='1' ");
                      while ($RowProcesado = mysqli_fetch_array($QueryProcesadoProducto)) {
                          $Procedimiento_Realizado = $RowProcesado['id'];
                      }

                      $SesionesRestantes=$cantidad-1;
                      $QuerySesiones = mysqli_query($conn3, "SELECT * FROM  HFC_ProductosPaquetesHistorias where detalle_id = $id_detalle and  idOperacion = $idOperacion_select ");
                      while ($RowSesiones = mysqli_fetch_array($QuerySesiones)) {
                        $SesionesRestantes = $RowSesiones['SesionesRestantes']-1;
                      }

                      $SesionesActuales = $cantidad-$SesionesRestantes;

                      if($Procedimiento_Realizado=="0"){
                      echo "<option value='$id_detalle' data-cantidadproducto='$cantidad' data-sesionesrestantes='$SesionesRestantes' data-sesionesactuales='$SesionesActuales' >$descripcion</option>";
                      }

                    }

                    ?>
 
                    </select>
                  </div>


                  <div class="form-group col-md-4">
                    <div align="left">Sesiones</div>
                    <input type="text" class="form-control input-lg" id="SesionesD" name="SesionesD" readonly>
                  </div>

                  <div class="form-group col-md-4">
                    <div align="left">Sesiones Restantes</div>
                    <input type="text" class="form-control input-lg" id="SesionesRestantes" name="SesionesRestantes" readonly>
                  </div>

                  <div class="form-group col-md-4">
                    <div align="left">Número de Sesiones</div>
                    <input type="text" class="form-control input-lg" id="NSesiones" name="NSesiones" readonly>
                  </div>



                  <div class="form-group col-md-12">
                    <div align="left">Tratamiento</div>
                    <input type="text" class="form-control input-lg" id="Tratamiento" name="Tratamiento">
                  </div>



                  <div class="form-group col-md-12">
                    <div align="left">Producto </div>
                  </div>
                  <div class="box-body pad col-md-12">

                    <textarea id="ProductoD" name="ProductoD" class="textarea" placeholder="Producto" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

                  </div>



                  <div class="form-group col-md-12">
                    <div align="left">Cantidad de Producto </div>
                  </div>
                  <div class="box-body pad col-md-12">

                    <textarea id="CantidadD" name="CantidadD" class="textarea" placeholder="Cantidad de Producto" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

                  </div>





                  

                  <div class="col-sm-12">
                    <div align="center">


                      <label> <strong> Ficha Evidencia

                        </strong> </label>
                    </div>




                  </div>

                  <div class="form-group col-md-4">
                    <div align="left">Sesión:</div>
                  </div>

                  <div class="form-group col-md-8">
                    <div align="left">Número</div>
                    <input type="text" class="form-control input-lg" id="NSesiones1" name="NSesiones1">
                  </div>
                  <div class="box-body pad col-md-12">
                  <div align="left">Notas</div>
                    <textarea id="SesionD" name="SesionD" class="textarea" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

                  </div>

                  <div class="form-group col-md-6">
                    <div align="left">Foto Antes</div>




                    <input type="file" class="form-control input-lg" name="img11">

                  </div>
                  <div class="form-group col-md-6">
                    <div align="left">Foto Después</div>




                    <input type="file" class="form-control input-lg" name="img12">

                  </div>

                  <div class="col-sm-12">
                    <div align="center">


                      <label> <strong> Nota: Permiso de uso de imágenes para evidencias del tratamiento
                          <br>
                          ° Para Uso del Profesional médico <br> ° Uso del laboratorio Mesoestetic(Netamente Interno)<br>°Se debe Salvaguardar la identidad del paciente.

                        </strong> </label>
                    </div>




                  </div>


                  <div class="col-sm-12">
                    <div align="center">
                    </div>





                  </div>
                  
                  <!--

                  <div class="col-sm-12">
                    <div align="center">


                      <label> <strong> Próxima consulta o cita (Solo si aplica)</strong> </label>
                    </div>

                  </div>

                  <div class="col-sm-6">
                    <div align="left">
                      <label>Fecha </label>
                    </div>
                    <input type="date" name="fecha" class="form-control input-lg" id="fecha" min="<?php echo date('Y-m-d') ?>" onChange="verDia();">

                    <input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo $_SESSION['ID'] ?>">

                    <div id="div-results"></div>
                  </div>


                  <div class="col-sm-6">
                    <div align="left">
                      <label>Hora </label>
                    </div>
                    <input type="time" name="hora" class="form-control input-lg" placeholder="hora" id="Hora" onChange="verHora();">
                    <div id="div-resultsHora"></div>

                  </div>

                  <div class="col-sm-6">

                    <div align="left">
                      <label>Motivo consulta</label>
                    </div>
                    <input type="text" name="motivo" class="form-control input-lg" placeholder="Motivo Consulta">

                  </div>

                  <div class="col-sm-6">
                    <label>Especialista </label>
                    <select id="doctor" name="doctor" class="form-control select2" style="width: 100%;" required="required">
                      <option value="<?php echo $_SESSION['username'] ?>" selected="selected"><?php echo $_SESSION['username'] ?> </option>
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
                      <i class="fa fa-user"></i> Presencial

                      <input type="radio" name="P" value="1" class="flat-red">
                      <i class="fa fa-video-camera"></i> Virtual
                    </label>
                  </div>
                  -->


                  <input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo $_SESSION['ID'] ?>">
                  <input type="hidden" name="email" value="<?php echo $correo_cliente; ?>">
                  <input type="hidden" name="nombre" value="<?php echo $nombre_cliente; ?>">
                  <input type="hidden" name="telefono" value="<?php echo $telefono_cliente; ?>">
                  <input type="hidden" name="ID" value="<?php echo $_SESSION['ID'] ?>">
                  <input type="hidden" name="clienteId" value="<?php echo $clienteId ?>">
                  <input type="hidden" name="operador" value="<?php echo $_SESSION['username'] ?>">



                  <!-- <div align="center">
                    <br>
                    <br>
                    <br>
                    <div class="col-sm-12">
                      <br>
                      <br>
                      <center><button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                          <h2> <strong> G u a r d a r </strong> </h2>
                        </button></center>

                    </div>
                  </div> -->
                  <div class="col-md-12">
                        <button class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" type="submit">Guardar</button>
                      </div>






                  <input type="hidden" name="tipo_cliente" valur="1">


                </form>

              </div>
            </div>


            <!-- /.row -->
  </section>
  <!-- /.content -->
</div>





<?php include("footer.php") ?>

<script>
  // no quitar para evitar problemas de que guarde con este caracter " ' "
  $(document).on('input', 'input[type="text"], textarea', function() {
    $(this).val($(this).val().replace(/[']/g, ''));
  });
</script>

<script type="text/javascript">
  function verDia() {
    // estas son las variables que enviamos

    var fecha = $("#fecha").val();
    var Hora = $("#Hora").val();
    var usuario_id = $("#usuario_id").val();

    // aqui enviamos el mensaje por medio de un arreglo     

    $.ajax({
      type: "POST",
      url: "disponibilidad.php",
      data: {
        fecha: fecha,
        Hora: Hora,
        usuario_id: usuario_id
      },
      success: function(response) {
        $('#div-results').html(response);

      }
    });
  };

  function cargarsesion() {
    var codigoProd = $("#codigoProd").val();
    var usuario_id = $("#usuario_id").val();

    $.ajax({
      type: "POST",
      url: "ajax_cargarsesion.php",
      data: {
        codigoProd: codigoProd,
        usuario_id: usuario_id
      },
      success: function(response) {
        $('#div-results-sesion').html(response);
      }
    });
  };

  function verHora() {
    // estas son las variables que enviamos

    var fecha = $("#fecha").val();
    var Hora = $("#Hora").val();
    var usuario_id = $("#usuario_id").val();

    // aqui enviamos el mensaje por medio de un arreglo     

    $.ajax({
      type: "POST",
      url: "disponibilidadHora.php",
      data: {
        fecha: fecha,
        Hora: Hora,
        usuario_id: usuario_id
      },
      success: function(response) {
        $('#div-resultsHora').html(response);

      }
    });
  };
</script>

<script>
  function CargarCantidadSesiones() {
  var selectElement = document.getElementById('ProductoPaquete_DetalleFactura'); 

  var selectedOption = selectElement.options[selectElement.selectedIndex];

  var cantidadProducto = selectedOption.getAttribute('data-cantidadproducto');
  
  var sesionesRestantes = selectedOption.getAttribute('data-sesionesrestantes');

  //data-sesionesactuales
  var sesionesActuales = selectedOption.getAttribute('data-sesionesactuales');


  var campoFinal = document.getElementById('SesionesD');
  campoFinal.value = cantidadProducto;

  var campoSesionesRestantes = document.getElementById('SesionesRestantes');
  campoSesionesRestantes.value = sesionesRestantes;

  //sesionesactuales
  var campoSesionesActuales = document.getElementById('NSesiones');
  campoSesionesActuales.value = sesionesActuales;

}
</script>
<?php
$Cliente_FichaClinica= decrypt($_GET['cI']);
$Usuario_FichaClinica= $_SESSION['ID'];
include 'HFC_ProductosPaqueteFacturadoModal.php';
?>
<script src="apiVoz_3.2.js"></script>
<?php include 'plantilla.php';?>

<script src="plugins/LottieK/lottie.min.js"></script>
<?php   
$usuariod_id_autoguardado = $_SESSION["ID"];
$cliente_id_autoguardado = decrypt($_GET['cI']);
$Nombre_Tabla_autoguardado = "e_tratamiento1";//nombre de la tabla de la base de datos de la historia

$RutaFinal_Encryptado = $_SERVER['SCRIPT_URI']."?cl={$cliente_id_autoguardado}";


include 'AutoGuardados/HistoriaEncryptada/AutoGuardado_Historia_Encryptado.php';//usar esta si es historia encryptada sin modificar el autoguardado

?>
