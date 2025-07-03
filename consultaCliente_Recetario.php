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



            $queryList=mysqli_query($conn3,"SELECT max(idReceta) as idReceta FROM  operacionRecetario where cliente_id = $clienteId order by id ASC");
//echo "SELECT * FROM  DetalleReceta where id_cliente = $clienteId order by id DESC";
                  $nrowl=mysqli_num_rows($queryList);

                  while($row_recordset32=mysqli_fetch_array($queryList))

                  {

                $idReceta    = $row_recordset32['idReceta']; 
     
        
                   }

        if ($queryList =='') {
            $idR == 1; }
             else{
            $idR   = ($idReceta+1);}



        ?>





 <div class="card-body">
                
<?php echo datosPacientes($clienteId);?>


                    </div>



<div align="center">
 
  <a class="btn btn-primary" href="recetario.php?clienteId=<?php echo $clienteId;?>&idr=<?php echo $idR;?>" role="button"> <i class="fa fa-heartbeat"></i>  Nueva Receta</a>
 
                                       
     </div>







             
<br>

               <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#Consultas" data-toggle="tab">Recetas</a></li>
                 <li><a href="#Examenes" data-toggle="tab">Formúlas</a></li>
            
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
           Consulta de Recetas por Fecha
           </h3>
    
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
         $administracion              = $row_recordset32['frecuencia2'];
        $dosisdia           = $row_recordset32['dosisdia'];
       $via   = $row_recordset32['via'];
        $id_usuario              = $row_recordset32['id_usuario'];
        $id_cliente              = $row_recordset32['idcliente']; 
        $total             = $row_recordset32['total']; 
        $dias             = $row_recordset32['dias']; 
        $nota            = $row_recordset32['nota']; 
        $producto1          = $row_recordset32['producto1'];  
        $Fecha          = $row_recordset32['fecha'];  
        $idReceta         = $row_recordset32['idReceta'];  
                     
                   
                     ?>


                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#<?php echo $ID?>">
                        Fecha <?php echo $Fecha.'Receta Número:'.$IDR?> 

                        <a title="Imprimir" href="imprimirRecetaH.php?idr=<?php echo $IDR?>&cliente=<?php echo $clienteId?>" title="Imprimir Receta" target="_blank"><i class="fa fa-print"></i> </a>



                        <a   target="_blank" href="<?php echo $Base;?>pruebareceta.php?cliente=<?php echo $clienteId;?>&idr=<?php echo $IDR;?>"> 
 <i class="fa fa-send-o" title="Enviar Correo y whatsapp"></i> 
</a>




                      </a>



                    </h4>
                  </div>
                  <div id="<?php echo $ID?>" class="panel-collapse collapse">
                    <div class="box-body">



<?php


                  $queryReceta=mysqli_query($conn3,"SELECT * FROM  operacionRecetario  where cliente_id = $clienteId and idReceta = '$IDR'");
//echo "SELECT * FROM  DetalleReceta where id_cliente = $clienteId ";
                  $nrowl=mysqli_num_rows($queryReceta);

                  while($rowMedicamento=mysqli_fetch_array($queryReceta))

                  {
                      $ID                 = $rowMedicamento['id'];                
                      $IDR                 = $row_recordset32['idReceta'];                
                     $Producto              = $row_recordset32['codigoProd'];
        $uso             = $rowMedicamento['uso'];
         $prioridad       = $rowMedicamento['prioridad'];
       
        $dosis                 = $rowMedicamento['dosis'];
        $posologia                = $rowMedicamento['posologia'];
        $frecuencia                 = $rowMedicamento['frecuencia'];
         $administracion              = $rowMedicamento['frecuencia2'];
        $dosisdia           = $rowMedicamento['dosisdia'];
       $via   = $rowMedicamento['via'];
        $id_usuario              = $rowMedicamento['id_usuario'];
        $id_cliente              = $rowMedicamento['idcliente']; 
        $total             = $rowMedicamento['total']; 
        $dias             = $rowMedicamento['dias']; 
        $nota            = $rowMedicamento['nota']; 
        $producto1          = $rowMedicamento['producto1'];  
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
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        








      </div>
         
    <div class="tab-pane" id="Examenes">
      <hr align="center" size="10" width="100%" color="#000000">
           <h3>
          Formúlas     </h3>  
 
     

         <?php 
               
                  $queryList=mysqli_query($conn3,"SELECT * FROM  formulas  where cliente_id = $clienteId  order by ID DESC");
                
                $nrowl=mysqli_num_rows($queryList);
                while($rowMotorizado=mysqli_fetch_array($queryList))
                {
                  
                     $ID     =$rowMotorizado['ID'];
                     $paquete     =$rowMotorizado['paquete'];
              $fechaF     =$rowMotorizado['fecha'];
              $cliente         =$rowMotorizado['cliente_id'];
              $usuario         =$rowMotorizado['usuario_id'];
                  

                     ?>



<div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#eco<?php echo $ID?>">
                        Fecha <?php echo $fechaF ?>  
                      </a>
                      <a href="imprimirPaquete.php?IDformula=<?php echo $ID?>" title="Imprimir" target="_blank"><i class="fa fa-print"></i> </a>
                      
                    </h4>
                  </div>
                  <div id="eco<?php echo $ID?>" class="panel-collapse collapse">
                    <div class="box-body">
                   



               <hr align="center" size="10" width="100%" color="#000000">
                
               <div align="right" >
                Fecha <?php echo $fechaF .'-'.$Hora?>
               </div>
               
            
              
               
              <div>
             
             
                 <?php echo $paquete ?>
                 
                 

                
               
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