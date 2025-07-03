<?php 
   include 'header.php';
   include 'menu.php';

   $clienteId = $_GET['clienteId']; 
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
        <li><a href="#">Historial Psiquiatría</a></li>
      </ol>
    </section>

    <link rel="stylesheet" type="text/css" href="css/tab_nav_demo79_1.css" media="screen"/>

    <!-- Main content -->
    <section class="content"> 
      <div class="row">
        <div class="card-body">
          <div class="box">
          <?php echo datosPacientes($clienteId);?>
            <div align="center">
            <a class="btn btn-outline-info btn-lg rounded-pill shadow m-1" href="PSQ_Historia_Controles_Psiquiatria?clienteId=<?php echo $clienteId;?>" role="button"> <i class="fa fa-heartbeat"></i>  Nueva Consulta </a>
            <a class="btn btn-outline-info btn-lg rounded-pill shadow m-1" href="anexosPaciente?cI=<?php echo encrypt($clienteId);?>" role="button"><i class="fa fa-folder-open-o"></i>  Agregar Exámenes </a>
            <?php
            include 'estadoFacturaPresupuestoCliente.php';

            $Cliente_id=$clienteId;//esta es la variable que se usa dentro del include
            include 'IncludeBotonesHistorialHistorias.php';
            ?>
            <br><br>
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
                        <li role="presentation" ><a href="#Section1" aria-controls="home" role="tab" data-toggle="tab" class="active"> <i class='fas fa-book-medical' style='font-size:26px'> </i> Historias de Psiquiatría</a></li>
                        <!--<li role="presentation"><a href="#Section2" aria-controls="profile" role="tab" data-toggle="tab"> <i class='fas fa-vials' style='font-size:26px'> </i> Controles</a></li>-->
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content tabs">
                        <!-- inicio seccion 1 -->
                        <div role="tabpanel" class="tab-pane fade in active show" id="Section1">
                          
                          <!--inicio accordion-->
                          <div class="col-md-12">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                              

                                <?php 

                                    $queryList=mysqli_query($conn3,"SELECT * FROM  historiaClinica_controlesPsiquiatria where cliente_id = $clienteId AND usuario_id = '$usuarioId'order by ID DESC");
                                    while($row_recordset32=mysqli_fetch_array($queryList))

                                    {
                                        $ID                 = $row_recordset32['id'];                
                                        $Fecha                 = $row_recordset32['Fecha'];                
                                        $Hora                  = $row_recordset32['Hora'];                

                                        $Detalle           = $row_recordset32['Detalle']; 
                                        $control           = $row_recordset32['control'];    

                                ?>
                                <div class="panel panel-default" style="background: #f1f1f1;">
                                  <div class="panel-heading" role="tab" id="heading" style="background-color: #bad8e687;">
                                    <h4 class="panel-title">
                                      <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#Historia<?php echo $ID?>" aria-expanded="false" aria-controls="Historia<?php echo $ID?>">
                                        Fecha <?php echo $Fecha .'-'.$Hora.' '.$control?>

                                        <button onclick="window.location.href='PSQ_Finalizado?historiaClinica1=<?php echo $ID;?>'" style="border: hidden;background-color: initial;font-size: 20px;"><i class="fa-regular fa-rectangle-list" style="top: 2px;position: relative;"></i></button>

                                        
                                      </a>
                                    </h4>
                                  </div>
                                  <div id="Historia<?php echo $ID?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading" style="padding-top: 20px;background-color: rgb(238, 238, 238);">
                                    <div class="panel-body">
                                    <?php ?>

                                        <hr align="center" size="10" width="100%" color="#000000">
                    
                                        <div align="right" >
                                        Fecha <?php echo $Fecha .'-'.$Hora?>
                                        </div>
                                        
                                    
                                        <?php if (strlen($control)>0): ?>
                                        <div>
                                        <label> Control: </label>
                                        <label>  <?php echo $control?></label>
                                            
                                        </div>
                                        <?php endif ?>
                            
                            
                                        
                                        <?php if (strlen($Detalle)>0): ?>
                                        <div>
                                        <label>Detalle: </label>
                                        <label>  <?php echo $Detalle?></label>
                                            
                                        </div>
                                        <?php endif 


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