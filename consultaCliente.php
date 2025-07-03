<?php 
   include 'header.php';
   include 'menu.php';?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Paciente
         
      </h1>
      <ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
        <li><a href="#">Paciente</a></li>
        

      </ol>
    </section>

    <!-- Main content -->
    <section class="content"> 
      <div class="row">
      
<?php
       
            $clienteId = $_GET['clienteId']; 
            $usuarioId = $_SESSION['ID']; 
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
            $antecedentes=$rowMotorizado['antecedentes'];
            $fechaNacimiento=$rowMotorizado['fechaNacimiento'];
            $esDonante=$rowMotorizado['esDonante'];
            $entidadSalud=$rowMotorizado['entidadSalud'];

              


            $peso                     = $rowMotorizado['peso']; 
            $altura                   = $rowMotorizado['altura']; 
            $imc                          = $rowMotorizado['imc']; 
            $ComposicionCorporal      = $rowMotorizado['ComposicionCorporal']; 
            $fotoperfil      = $rowMotorizado['fotoperfil']; 

 

           }

        ?>





 <div class="card-body">
                  <div class="box-body">
                     

          <?php echo datosPacientes($clienteId);?>


    






    <div class="form-group col-md-12" >




  </div>




             <div align="center">
  <a class="btn btn-primary" href="vercliente.php?clienteId=<?php echo $clienteId;?>" role="button"> <i class="fa fa-eye"></i>  Ver completo</a>
  <a class="btn btn-primary" href="historiaClinica.php?clienteId=<?php echo $clienteId;?>" role="button"> <i class="fa fa-heartbeat"></i>  Nueva consulta </a>
  <a class="btn btn-primary" href="historiaImagenes.php?clienteId=<?php echo $clienteId;?>" role="button"><i class="fa fa-folder-open-o"></i>  Agregar exámenes </a>
          <?php

include 'estadoFacturaPresupuestoCliente.php';

  ?> 
                               
     </div>
<br>

               <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#Consultas" data-toggle="tab">Consultas</a></li>
              <li><a href="#Examenes" data-toggle="tab">Registros de  Archivos Imágenes</a></li>
              <li><a href="#ExamenesEcografias" data-toggle="tab">Registros de Ecografias</a></li>

              <li><a href="#receta" data-toggle="tab">Recetas</a></li>

              <!-- 
              <li><a href="#Documentos" data-toggle="tab">Registros de exámenes</a></li>
                <a class="btn btn-primary" href="historiaExamenes.php?clienteId=<?php echo $clienteId;?>" role="button"><i class="fa fa-folder-open-o"></i>  Agregar exámenes</a>
              -->
            </ul>
            <div class="tab-content">
          <div class="active tab-pane" id="Consultas">
          
          
           





           <div class="col-md-12">
          <div class="box box-solid">
             
            <!-- /.box-header -->
            <div class="box-body">
              <div class="box-group" id="accordion">
                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                








          <hr align="center" size="10" width="100%" color="#000000">
           <h3>
           Consultas
           </h3>
    
                  <?php 
               
                  $queryList=mysqli_query($conn3,"SELECT * FROM  historiaClinica1 where cliente_id = $clienteId and usuario_id = $usuarioId order by ID DESC");

                  $nrowl=mysqli_num_rows($queryList);

                  while($row_recordset32=mysqli_fetch_array($queryList))

                  {
                      $ID                 = $row_recordset32['ID'];                
                      $Fecha                 = $row_recordset32['Fecha'];                
                      $Hora                  = $row_recordset32['Hora'];                
                      $motivoConsulta        = $row_recordset32['motivoConsulta'];      
                      $diagnostico           = $row_recordset32['diagnostico'];      
                      $tratamiento           = $row_recordset32['tratamiento']; 

                      $rSistema           = $row_recordset32['rSistema'];      
                      

                      $cie10           = $row_recordset32['cie10'];      
                      $enfermedadActual           = $row_recordset32['enfermedadActual'];      
                      $acompananteFamiliar           = $row_recordset32['acompananteFamiliar'];      
                      $telefono_acompanante           = $row_recordset32['telefono_acompanante'];      
                      $paraClinicos           = $row_recordset32['paraClinicos'];      
                      $remision           = $row_recordset32['remision'];      
                      $diagnosticoMsalud           = $row_recordset32['diagnosticoMsalud'];      
                      $comoTomarlo           = $row_recordset32['comoTomarlo'];  
                        $receta          = $row_recordset32['receta'];        
                      


                     



$queryListEF=mysqli_query($conn3,"SELECT * FROM  examenFisico where cliente_id = $clienteId and usuario_id = $usuarioId and historia_id = '$ID'");
                  $nrowlEF=mysqli_num_rows($queryListEF);
                  while($row_recordsetEF=mysqli_fetch_array($queryListEF))
                  {
                      $peso                 = $row_recordsetEF['peso']; 
                      $altura                 = $row_recordsetEF['altura']; 
                      $imc                 = $row_recordsetEF['imc']; 
                      $ComposicionCorporal                 = $row_recordsetEF['ComposicionCorporal']; 
                      $estadoGeneral                 = $row_recordsetEF['estadoGeneral']; 
                      $estadoConciencia                 = $row_recordsetEF['estadoConciencia']; 
                      $ojos                 = $row_recordsetEF['ojos']; 
                      $otoscopia                 = $row_recordsetEF['otoscopia']; 
                      $cavidadOral                 = $row_recordsetEF['cavidadOral']; 
                      $cuello                 = $row_recordsetEF['cuello']; 
                      $torax                 = $row_recordsetEF['torax']; 
                      $corazon                 = $row_recordsetEF['corazon']; 
                      $abdomen                 = $row_recordsetEF['abdomen']; 
                      $genitoUrinario                 = $row_recordsetEF['genitoUrinario']; 
                      $extremidades                 = $row_recordsetEF['extremidades']; 
                      $vacularPeriferico                 = $row_recordsetEF['vacularPeriferico']; 
                      $sistemaNervioso                 = $row_recordsetEF['sistemaNervioso']; 
                      $pielAnexos                 = $row_recordsetEF['pielAnexos']; 
                      $examenPartesdCuerpo                 = $row_recordsetEF['examenPartesdCuerpo']; 
                      $tart                 = $row_recordsetEF['tart']; 
                      $temperatura                 = $row_recordsetEF['temperatura']; 
                      $fcard                 = $row_recordsetEF['fcard']; 
                      $sat                 = $row_recordsetEF['sat']; 

                       $edadMeses           = $row_recordsetEF['edadMeses'];      
                       $edadAnos           = $row_recordsetEF['edadAnos'];      
                      
                  }


$queryListER=mysqli_query($conn3,"SELECT * FROM  examenesaRealizar where cliente_id = $clienteId and usuario_id = $usuarioId and historia_id = '$ID'");
                  $nrowlER=mysqli_num_rows($queryListER);
                  while($row_recordsetER=mysqli_fetch_array($queryListER))
                  {
                      $laboratorio                 = $row_recordsetER['laboratorio']; 
                      $ecografia                 = $row_recordsetER['ecografia']; 
                      $otros                 = $row_recordsetER['otros']; 
                      
                  } 

if ($peso>0) {
  
  $peso_descripcion =  'Peso: '.$peso.', Altura:'.$altura.', Edad: '.$edadAnos.' anos,'.$edadMeses.' Meses';
              
}

                     ?>
 


                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#<?php echo $ID?>">
                        Fecha <?php echo $Fecha .'-'.$Hora.' <strong>|</strong> '.$peso_descripcion?> <a href="finalizado.php?historiaClinica1=<?php echo $ID?>" title="Imprimir Consulta" target="_blank"><i class="fa fa-print"></i> </a>

                        <a href="imprimirRecetaH.php?idr=<?php echo $receta?>&cliente=<?php echo $clienteId?>" title="Imprimir Receta" target="_blank"><i class="fa fa-newspaper-o"></i> </a>
                      </a>
                      </a>
                    </h4>
                  </div>
                  <div id="<?php echo $ID?>" class="panel-collapse collapse">
                    <div class="box-body">
                   



               <hr align="center" size="10" width="100%" color="#000000">
                
               <div align="right" >
                Fecha <?php echo $Fecha .'-'.$Hora?>
               </div>
               
            
              
              <?php if (strlen($motivoConsulta)>0): ?>
              <div>
              <label>Motivo Consulta :</label>
              <label>  <?php echo $motivoConsulta?></label>
               
              </div>
              <?php endif ?>



              <?php if (strlen($diagnostico)>0): ?>
              <div>
                <strong> Diagnostico : </strong> 
              <label><?php echo $diagnostico?></label>
              </div>
              
              <?php endif ?>


              <?php if (strlen($tratamiento)>0): ?>
              <div>
               <label> Tratamiento:</label>
                <label><?php echo $tratamiento?></label>
              </div>              
              <?php endif ?>
              

              <?php if (strlen($comoTomarlo)>0): ?>
              <div>
               <label> Como Tomarlo:</label>
                <label><?php echo $comoTomarlo?></label>
              </div>
              <?php endif ?>              
               
              <?php if (strlen($rSistema)>0): ?>

              <div>
               <label> Revisión por sistema :</label>
                <label><?php echo $rSistema?></label>
              </div>

              
              <?php endif ?>
 
              <?php if (strlen($cie10)>0): ?>
              <div>
               <label> :</label>
                <label><?php echo $cie10?></label>
              </div>
              <?php endif ?>              
              
              <?php if (strlen($enfermedadActual)>0): ?>
              <div>
               <label> Enfermedad Actual:</label>
                <label><?php echo $enfermedadActual?></label>
              </div>
              <?php endif ?>              
              
              <?php if (strlen($acompananteFamiliar)>0): ?>
              <div>
               <label> Acompañante Familiar:</label>
                <label><?php echo $acompananteFamiliar.' Teléfono: '.$telefono_acompanante?></label>
              </div>
              <?php endif ?>              
              
              <?php if (strlen($paraClinicos)>0): ?>
              <div>
               <label> Para Clínicos:</label>
                <label><?php echo $paraClinicos?></label>
              </div>
              <?php endif ?>              
              
 
              <?php if (strlen($remision)>0): ?>
              <div>
               <label> Remisión:</label>
                <label><?php echo $remision?></label>
              </div>
              <?php endif ?>              
              
              <?php if (strlen($diagnosticoMsalud)>0): ?>
              <div>
               <label> Diagnostico Para Ministerio de salud:</label>
                <label><?php echo $diagnosticoMsalud?></label>
              </div>
              <?php endif ?>              
              
<hr>
<div align="center"> Exámenes Físicos   </div>

              <?php if ($peso>0): ?>
              <div>
               <label> IMC :</label>
                <label><?php echo 'Peso: '.$peso.' <br>Altura:'.$altura.'<br> IMC: '.$imc.' <br>Composición corporal'.$ComposicionCorporal?></label>
              </div>
              <?php endif ?>  


              <?php if (strlen($estadoGeneral)>0): ?>
              <div>
               <label> Estado General :</label>
                <label><?php echo $estadoGeneral?></label>
              </div>
              <?php endif ?> 

              <?php if (strlen($estadoConciencia)>0): ?>
              <div>
               <label> Estado de Conciencia :</label>
                <label><?php echo $estadoConciencia?></label>
              </div>
              <?php endif ?> 

              <?php if (strlen($ojos)>0): ?>
              <div>
               <label> ojos:</label>
                <label><?php echo $ojos?></label>
              </div>
              <?php endif ?> 

              <?php if (strlen($otoscopia)>0): ?>
              <div>
               <label> Otoscopia :</label>
                <label><?php echo $otoscopia?></label>
              </div>
              <?php endif ?> 

              <?php if (strlen($cavidadOral)>0): ?>
              <div>
               <label> Cavidad Oral :</label>
                <label><?php echo $cavidadOral?></label>
              </div>
              <?php endif ?> 
              <?php if (strlen($cuello)>0): ?>
              <div>
               <label> Cuello :</label>
                <label><?php echo $cuello?></label>
              </div>
              <?php endif ?> 

              <?php if (strlen($torax)>0): ?>
              <div>
               <label> torax :</label>
                <label><?php echo $torax?></label>
              </div>
              <?php endif ?> 

              <?php if (strlen($abdomen)>0): ?>
              <div>
               <label> abdomen :</label>
                <label><?php echo $abdomen?></label>
              </div>
              <?php endif ?> 

              <?php if (strlen($genitoUrinario)>0): ?>
              <div>
               <label> Genito Urinario :</label>
                <label><?php echo $genitoUrinario?></label>
              </div>
              <?php endif ?> 

              <?php if (strlen($extremidades)>0): ?>
              <div>
               <label> Extremidades :</label>
                <label><?php echo $extremidades?></label>
              </div>
              <?php endif ?> 

              <?php if (strlen($vacularPeriferico)>0): ?>
              <div>
               <label> Vacular Periférico :</label>
                <label><?php echo $vacularPeriferico?></label>
              </div>
              <?php endif ?> 

              <?php if (strlen($sistemaNervioso)>0): ?>
              <div>
               <label> Sistema Nervioso :</label>
                <label><?php echo $sistemaNervioso?></label>
              </div>
              <?php endif ?> 

              <?php if (strlen($pielAnexos)>0): ?>
              <div>
               <label> >Piel Anexos :</label>
                <label><?php echo $pielAnexos?></label>
              </div>
              <?php endif ?> 

              <?php if (strlen($examenPartesdCuerpo)>0): ?>
              <div>
               <label> Examen Partes dCuerpo:</label>
                <label><?php echo $examenPartesdCuerpo?></label>
              </div>
              <?php endif ?> 

              <?php if (strlen($tart)>0): ?>
              <div>
               <label> tart:</label>
                <label><?php echo $tart?></label>
              </div>
              <?php endif ?> 

              <?php if (strlen($temperatura)>0): ?>
              <div>
               <label>Temperatura:</label>
                <label><?php echo $temperatura?></label>
              </div>
              <?php endif ?> 

              <?php if (strlen($fcard)>0): ?>
              <div>
               <label>fcard:</label>
                <label><?php echo $fcard?></label>
              </div>
              <?php endif ?> 

              <?php if (strlen($sat)>0): ?>
              <div>
               <label>SAT:</label>
                <label><?php echo $sat?></label>
              </div>
              <?php endif ?> 

 
              
<?php if (strlen($laboratorio)>0 or strlen($laboratorio)>0 or strlen($laboratorio)>0 ): ?>
<hr>
<div align="center"> Exámenes a Realizar  </div>
 

              <?php if (strlen($laboratorio)>0): ?>
              <div>
               <label>laboratorio:</label>
                <label><?php echo $laboratorio?></label>
              </div>
              <?php endif ?> 

              <?php if (strlen($ecografia)>0): ?>
              <div>
               <label>ecografia:</label>
                <label><?php echo $ecografia?></label>
              </div>
              <?php endif ?> 

              <?php if (strlen($otros)>0): ?>
              <div>
               <label>otros:</label>
                <label><?php echo $otros?></label>
              </div>
              <?php endif ?>                             
      

 
<?php endif ?>  

                    </div>
                  </div>
                </div>
 
              
            <?php }  ?>



              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        








      </div>
              <!-- /.tab-pane -->
              
 
      
  <div class="tab-pane" id="Examenes">
  <hr align="center" size="10" width="100%" color="#000000">
           <h3> Registro de Archivos </h3>  
 
                 <table width="100%" border="1" >
  <tr>
    <th class="tg-c3ow">Resultados</th>
    <th class="tg-0pky"></th>
    <th class="tg-0lax"></th>
    <th class="tg-0lax"></th>
  </tr>

                      <?php  
 $queryImg=mysqli_query($conn3,"SELECT * FROM archivos  where cliente_id = '$clienteId'");
                  $nrowlER=mysqli_num_rows($queryImg);
                  while($resulImg=mysqli_fetch_array($queryImg))
                  {
                    ?>
  <tr>
    <th>

    <?php echo $resulImg['codigo']; ?>
      
    </th>
    <th>
    <?php echo $resulImg['fecha']; ?>
      

    </th>
    <th>
      
       <a target="blank" href="<?php echo $Base;?>/archivos/<?php echo $resulImg['codigo']; ?>">
                            <a href="<?php echo $Base;?>/archivos/'<?php echo $resulImg['codigo']; ?>'"download="Archivo">Descargar Archivo    
</a>  
                              </a>  

    </th>
    <th>
        <a target="_blank" href="<?php echo $Base;?>/archivos/<?php echo $resulImg['codigo']; ?>">
                                <a href="<?php echo $Base;?>/archivos/'<?php echo $resulImg['codigo']; ?>'" >Ver Archivo o Imagen     <br>
</a>  
                              </a> 

    </th>
  </tr>

                            

                              


                            <?php } ?>

                            </table>
       
  </div>

              
            







    <div class="tab-pane" id="ExamenesEcografias">
      <hr align="center" size="10" width="100%" color="#000000">
           <h3>
           Registros de Imagenes       </h3>  
 
     

         <?php 
               
                  $queryList=mysqli_query($conn3,"SELECT * FROM  historiaClinica_ecografias  where cliente_id = $clienteId  order by ID DESC");
                
                $nrowl=mysqli_num_rows($queryList);
                while($rowMotorizado=mysqli_fetch_array($queryList))
                {
                  
                 $ID      =$rowMotorizado['ID'];
                 $cliente_id      =$rowMotorizado['cliente_id'];
                  $usuario_id      =$rowMotorizado['usuario_id'];
                  $Fecha           =$rowMotorizado['Fecha'];

                  $Hora            =$rowMotorizado['Hora'];
                  $eco             =$rowMotorizado['ecografiaDetalle'];
                  $diagnostico     =$rowMotorizado['diagnostico'];
                  $nombreeco       =$rowMotorizado['nombreEcografia'];
                  

                     ?>



<div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#eco<?php echo $ID?>">
                        Fecha <?php echo $Fecha .'-'.$Hora?>  
                      </a>
                      <a href="imprimirEcografia.php?ecografia=<?php echo $ID?>" title="Imprimir Ecografia" target="_blank"><i class="fa fa-print"></i> </a>
                      
                    </h4>
                  </div>
                  <div id="eco<?php echo $ID?>" class="panel-collapse collapse">
                    <div class="box-body">
                   



               <hr align="center" size="10" width="100%" color="#000000">
                
               <div align="right" >
                Fecha <?php echo $Fecha .'-'.$Hora?>
               </div>
               
            
              
               
              <div>
             
              <table>
                 <?php echo $eco ?>
                 
                   </table> 

                   <table class="table table-bordered">
                    <tr>
                      <th colspan="4">Diagnóstico</th>
                    </tr>
                    <tr><td><?php echo $diagnostico ?></td></tr>
                  </table>
               
              </div>
             
 
     

                    </div>
                  </div>
                </div>
               

              
            <?php }  ?>

            
              
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
       
          <!-- /.nav-tabs-custom -->
       
       

        <!-- /.col -->


   




<div class="tab-pane" id="receta">
      <hr align="center" size="10" width="100%" color="#000000">
           <h3>
           Registros de Recetas      </h3>  
 
     


                  <?php 
               
 
              $queryList=mysqli_query($conn3,"SELECT * FROM  operacionRecetario where cliente_id = $clienteId group by idReceta");
//echo "SELECT * FROM  DetalleReceta where id_cliente = $clienteId ";
                  $nrowl=mysqli_num_rows($queryList);

                  while($row_recordset32=mysqli_fetch_array($queryList))

                  {
                      $ID                 = $row_recordset32['id'];                
                      $IDR                 = $row_recordset32['idReceta'];                
                     $Producto              = $row_recordset32['codigoProd'];
       
       
        $dosis                 = $row_recordset32['dosis'];
        $posologia                = $row_recordset32['posologia'];
        $frecuencia                 = $row_recordset32['frecuencia'];
         $administracion              = $row_recordset32['administracion'];
        $dosisdia           = $row_recordset32['dosisdia'];
        
       $via   = $row_recordset32['via'];
        $id_usuario              = $row_recordset32['usuario_id'];
        $id_cliente              = $row_recordset32['cliente_id']; 
        $total             = $row_recordset32['total']; 
        $dias             = $row_recordset32['dias']; 
        $nota            = $row_recordset32['nota']; 
       //$producto1          = $row_recordset32['producto1'];  
        $Fecha          = $row_recordset32['fecha'];  
        $idReceta         = $row_recordset32['idReceta'];  
                     
                   
                     ?>


                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#<?php echo $ID?>">
                       Fecha: <?php echo $Fecha.'Receta Número:'.$IDR?> 

                        <a title="Imprimir" href="imprimirRecetaH.php?idr=<?php echo $IDR?>&cliente=<?php echo $clienteId?>" title="Imprimir Receta" target="_blank"><i class="fa fa-print"></i> </a>



                   <!--     <a   target="_blank" href="<?php echo $Base;?>enviarReceta.php?cliente=<?php echo $clienteId;?>&idr=<?php echo $IDR;?>"> 
  <i class="fa fa-send-o" title="Enviar Correo y whatsapp"></i> 
</a>  -->




                      </a>



                    </h4>
                  </div>
                  <div id="<?php echo $ID?>" class="panel-collapse collapse">
                    <div class="box-body">



<?php





                  $queryReceta=mysqli_query($conn3,"SELECT * FROM  operacionRecetario where cliente_id = $clienteId and idReceta = '$IDR'");
//echo "SELECT * FROM  DetalleReceta where id_cliente = $clienteId ";
                  $nrowl=mysqli_num_rows($queryReceta);

                  while($rowMedicamento=mysqli_fetch_array($queryReceta))

                  {
                       $ID                 = $rowMedicamento['id'];                
                      $IDR                 = $rowMedicamento['idReceta'];                
                     $Producto              = $rowMedicamento['codigoProd'];
       
       
        $dosis                 = $rowMedicamento['dosis'];
        $posologia                = $rowMedicamento['posologia'];
        $frecuencia                 = $rowMedicamento['frecuencia'];
         $administracion              = $rowMedicamento['administracion'];
        $dosisdia           = $rowMedicamento['dosisdia'];
        
       $via   = $rowMedicamento['via'];
        $id_usuario              = $rowMedicamento['usuario_id'];
        $id_cliente              = $rowMedicamento['cliente_id']; 
        $total             = $rowMedicamento['total']; 
        $dias             = $rowMedicamento['dias']; 
        $nota            = $rowMedicamento['nota']; 
       //$producto1          = $rowMedicamento['producto1'];  
        $Fecha          = $rowMedicamento['fecha'];  
        $idReceta         = $rowMedicamento['idReceta'];  
                   
                     ?>


















               <hr align="center" size="10" width="100%" color="#000000">
               <div align="right" >
                Fecha <?php echo $Fecha .'-'.$Hora?>
               </div>
               
              <?php if (strlen($Producto)>0 or strlen($producto1)>0) : ?>
              <div>
              Medicamento Suministrado: 
              <label> <strong> <?php echo $Producto?><?php echo $producto1?> </strong></label>
               
              </div>
              <?php endif ?>

               
              <?php if (strlen($dosis)>0): ?>
              <div>
               Dosis: 
              <label>  <?php echo $dosis?> <?php echo $posologia?></label>
               
              </div>
              <?php endif ?>

               <?php if (strlen($via)>0): ?>
              <div>
             Vía: 
              <label>  <?php echo $via?></label>
               
              </div>
              <?php endif ?>





            




               <?php }  ?>






 


                    </div>
                  </div>
                </div>

               <?php }  ?>

              </div>
            </div>



   
  
              </div>







              </div>
            
              
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>












































        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
   <?php
    include 'footer.php';

   ?>