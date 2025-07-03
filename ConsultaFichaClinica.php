<?php
include 'header.php';
include 'menu.php';

$clienteId = decrypt($_GET['cI']);
$cliente_id_modulo = $clienteId;//Evoluciones
//$clienteId = $_GET['clienteId'];
$usuarioId = $_SESSION['ID'];
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Paciente
    </h1>
    <ol class="breadcrumb">
      <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
      <li><a href="#">Historial Ficha Clínica </a></li>
    </ol>
  </section>

  <link rel="stylesheet" type="text/css" href="css/tab_nav_demo79_1.css" media="screen" />

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="card-body">
        <div class="box">
          <?php echo datosPacientes($clienteId); ?>
          <div align="center">
            <a class="btn btn-outline-info btn-lg rounded-pill shadow" href="HC_HistoriaFichaClinica?cI=<?php echo encrypt($clienteId); ?>" role="button" target="_tank"> <i class="fa fa-heartbeat"></i> Nueva Ficha Clínica  </a>
            <a class="btn btn-outline-info btn-lg rounded-pill shadow" href="anexosPaciente?cI=<?php echo encrypt($clienteId); ?>" role="button" target="_tank"><i class="fa fa-folder-open-o"></i> Agregar Exámenes </a>

            <?php
            include 'estadoFacturaPresupuestoCliente.php';

            $Cliente_id=$clienteId;//esta es la variable que se usa dentro del include
            include 'IncludeBotonesHistorialHistorias.php';
            ?>
            <br>
          </div>
        </div>
      </div>
    </div>
  </section>

  <br>

  <div class="box-body">
    <div class="row">
      <div class="col-md-12">
        <div class="tab" role="tabpanel">
          <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" ><a href="#Section1" aria-controls="home" role="tab" data-toggle="tab" class="active" > <i class='fas fa-book-medical' style='font-size:26px'> </i> Historias de Fichas Clínicas  </a></li>
            <li role="presentation" ><a href="#Section2" aria-controls="home" role="tab" data-toggle="tab"> <i class='fas fa-book-medical' style='font-size:26px'> </i> Registros de Exámenes  </a></li>
          </ul>
          <!-- Tab panes -->
          <div class="tab-content tabs">
            <!-- inicio seccion 1 -->
            <div role="tabpanel" class="tab-pane fade in active show" id="Section1">

              <!--inicio accordion-->
              <div class="col-md-12">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                  

                        <?php 

                          $queryList = mysqli_query($conn3, "SELECT * FROM  e_tratamiento1 where idCliente = $clienteId and idUsuario = $usuarioId order by ID DESC");
                          while ($row_recordset32 = mysqli_fetch_array($queryList)) {
                            $id_ficha_clinica                 = $row_recordset32['id'];
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
                            
                            $Producto_Nombre = $row_recordset32['producto_nombre'];
                            $SesionesRestantes = $row_recordset32['SesionesRestantes'];
                            
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
                                  
                                  if (strlen($Producto_Nombre) > 0){
                                    
                                    $TextoAcumulativo.= "<div>
                                                          <strong> Producto de Paquete de Procedimientos: </strong> {$Producto_Nombre}
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

                                  if (strlen($SesionesRestantes) > 0){
                                    
                                    $TextoAcumulativo.= "<div>
                                                          <strong> Sesiones Restantes: </strong> {$SesionesRestantes}
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
                                                          <strong> Notas: </strong> {$SesionD}
                                                        </div>";
                                  }

                                  $TextoAcumulativo .= "<strong> Doctor:{$operador}</strong>"; 

                                  $TablaHistoria="e_tratamiento1";
                        ?>
                        <div class="panel panel-default" style="background: #f1f1f1;">
                            <div class="panel-heading" role="tab" id="heading" style="background-color: #bad8e687;">
                                <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#FichaClinica<?php echo $id_ficha_clinica?>" aria-expanded="false" aria-controls="FichaClinica<?php echo $id_ficha_clinica?>">
                                    Fecha <?php echo $fechaHora .' | '.e_servicios($tratamiento); ?>
                                    <button onclick="window.open('HC_FinalizadoFichaClinica?iHC=<?php echo encrypt($id_ficha_clinica); ?>', '_blank')" style="border: hidden;background-color: initial;font-size: 20px;"><i class="fa-regular fa-rectangle-list" ></i></button>
                                
                                    <button onclick="window.open('EV_EvolucionHistorias.php?cliente_id=<?php echo encrypt($cliente_id_modulo); ?>&historia_id=<?php echo encrypt($id_ficha_clinica); ?>&tabla=<?php echo encrypt($TablaHistoria); ?>', '_blank', 'noopener')" style="border: hidden;background-color: initial;font-size: 20px;"><i class="fa fa-file"></i></button>

                                    <button onclick="window.open('EV_EvolucionHistorial.php?cliente_id=<?php echo encrypt($cliente_id_modulo); ?>&historia_id=<?php echo encrypt($id_ficha_clinica); ?>&tabla=<?php echo encrypt($TablaHistoria); ?>', '_blank', 'noopener')" style="border: hidden;background-color: initial;font-size: 20px;"><i class="fa fa-eye"></i></button>
                                  </a>
                                </h4>
                            </div>
                            <div id="FichaClinica<?php echo $id_ficha_clinica?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading" style="padding-top: 20px;background-color: rgb(238, 238, 238);">
                                <div class="panel-body">
                                <?php 

                                  echo $TextoAcumulativo;

                                ?>       
                                </div>
                            </div>
                        </div>
                        <?php 
                        }
                        ?>


                </div>
              </div>
              <!--final accordion-->   
            </div>
            <!-- cierre seccion 1-->








            <!-- inicio seccion 2 -->
            <div role="tabpanel" class="tab-pane fade" id="Section2">

              <!--inicio accordion-->
              <div class="col-md-12">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                  



                <hr align="center" size="10" width="100%" color="#000000">
                  <link type="text/css" rel="stylesheet" href="css/tabs.css" />

                  <div class="page" style="background-color: aliceblue;padding: 20px;">
                    <!--<h1>Pure CSS Tabs</h1>  -->
                    <!-- tabs -->
                    <div class="pcss3t pcss3t-effect-scale pcss3t-theme-1">
                      <input type="radio" name="pcss3t" checked id="tab1" class="tab-content-first">
                      <label for="tab1"><i class="icon-bolt"></i>Archivos</label>

                      <input type="radio" name="pcss3t" id="tab2" class="tab-content-2">
                      <label for="tab2"><i class="icon-picture"></i>Carpetas</label>

                      <ul>
                        <li class="tab-content tab-content-first typography">
                          <h1 class="txt_rsp">Registro de Archivos</h1>

                          <table class="table table-responsive" style="display:inline-table!important;">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre Archivo</th>
                                <th scope="col">Carpeta</th>
                                <th scope="col">Fecha</th>
                                <th scope="col" style="text-align: center;font-size: 25px;"><i class="fa fa-download" aria-hidden="true"></i></th>
                                <th scope="col" style="text-align: center;font-size: 25px;"><i class="fa fa-picture-o" aria-hidden="true"></i></th>
                                <th scope="col" style="text-align: center;font-size: 25px;"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></th>
                              </tr>
                            </thead>
                            <tbody>

                              <?php
                              $queryImg = mysqli_query($conn3, "SELECT * FROM archivos  where cliente_id = '$clienteId'");
                              $nrowlER = mysqli_num_rows($queryImg);
                              while ($resulImg = mysqli_fetch_array($queryImg)) {
                                $contador++;
                                $Producto = $resulImg['id'];

                              ?>
                                <tr>
                                  <td>
                                    <?php echo $contador ?>
                                  </td>
                                  <td>
                                    <?php echo $resulImg['NombreVisual']; ?>
                                  </td>
                                  <td>
                                    <?php echo $resulImg['descripcion']; ?>
                                  </td>
                                  <td>
                                    <?php echo $resulImg['fecha']; ?>
                                  </td>
                                  <td style="text-align: center;">
                                    <a target="blank" href="<?php echo $Base; ?>archivos/<?php echo $resulImg['codigo']; ?>">
                                      <a href="<?php echo $Base; ?>archivos/<?php echo $resulImg['codigo']; ?>" download="Archivo">Descargar Archivo
                                      </a>
                                    </a>
                                  </td>
                                  <td style="text-align: center;">
                                    <a target="_blank" href="<?php echo $Base; ?>archivos/<?php echo $resulImg['codigo']; ?>">
                                      <a href="<?php echo $Base; ?>archivos/<?php echo $resulImg['codigo']; ?>">Ver Archivo o Imagen <br>
                                      </a>
                                    </a>
                                  </td>
                                  <td style="text-align: center;">
                                    <a target="_blank" href="<?php echo $Base; ?>enviarArchivo.php?cliente=<?php echo $clienteId; ?>&id=<?php echo $Producto; ?>">
                                      Enviar Archivo <br>
                                    </a>
                                  </td>

                                </tr>
                              <?php } ?>
                            </tbody>
                          </table>

                        </li><!-- cierre del primer modulo archivos -->

                        <li class="tab-content tab-content-2 typography">
                          <h1 class="txt_rsp">Registro de Carpetas</h1>



                          <table class="table table-responsive" style="display:inline-table!important;">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Carpeta</th>
                                <th scope="col">Fecha</th>
                                <th scope="col" style="text-align: center;font-size: 25px;"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></th>
                              </tr>
                            </thead>
                            <tbody>

                              <?php
                              $queryarchivo = mysqli_query($conn3, "SELECT * FROM archivos  where cliente_id = '$clienteId' group by descripcion");

                              $nrowlER = mysqli_num_rows($queryarchivo);
                              while ($resularchivo = mysqli_fetch_array($queryarchivo)) {
                                $descripcion             = $resularchivo['descripcion'];

                              ?>





                                <tr>
                                  <td>
                                    <?php echo $contador ?>
                                  </td>
                                  <td>
                                    <?php echo $descripcion; ?>
                                  </td>
                                  <td>
                                    <?php echo $resularchivo['fecha']; ?>
                                  </td>
                                  <!--   <th>
      
       <a target="blank" href="<?php echo $Base; ?>/archivos/<?php echo $resulImg['codigo']; ?>">
                            <a href="<?php echo $Base; ?>/archivos/'<?php echo $resulImg['codigo']; ?>'"download="Archivo">Descargar Archivo    
</a>  
                              </a>  

    </th>
    <th>
        <a target="_blank" href="<?php echo $Base; ?>/archivos/<?php echo $resulImg['codigo']; ?>">
                                <a href="<?php echo $Base; ?>/archivos/'<?php echo $resulImg['codigo']; ?>'" >Ver Archivo o Imagen     <br>
</a>  
                              </a> 

                            </th> -->
                                  <td style="text-align: center;">
                                    <a target="_blank" href="<?php echo $Base; ?>enviarArchivoPaquete.php?cliente=<?php echo $clienteId; ?>&descripcion=<?php echo $descripcion; ?>">
                                      Enviar Archivos <br>
                                    </a>
                                  </td>
                                </tr>

                              <?php } ?>
                            </tbody>
                          </table>



                        </li>


                      </ul>
                    </div>
                    <!--/ tabs -->







                  </div>
                  <!-- cerra class=page -->




                </div>
              </div>
              <!--final accordion-->   
            </div>
            <!-- cierre seccion 2-->


          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
</div>


<?php
include 'footer.php';
?>
