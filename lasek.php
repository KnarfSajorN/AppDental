   <?php 
   include 'header.php';
   include 'menu.php';?>

 
<?php
            $clienteId = $_GET['clienteId']; 
            $usuarioId = $_GET['usuarioId']; 




 $host='localhost';
$userdb='medicaso_rootBase';
$pass2='5qA?o]t6d-h25qA?o]t6d-h2';
$DB='sievenso_gafas';

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
          }
      ?>
     

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pacientes
         
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Pacientes</a></li>
        

      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
 

          <div class="box">
         
            <!-- /.box-header -->
            <div class="box-body">

        
        <div class="form-row">
      		    <div class="col-md-6">
      		    	
      		      <label for="nombre" class="col-form-label"><strong>Correo:</strong></label>
      		      <label for="nombre" class="col-form-label"> <?php echo $correo_cliente;?>  </label>
      		    </div>

      		    <div class="col-md-6">
      		      <label for="inputPassword4" class="col-form-label"><strong>Nombre:</strong></label>
      		       <label for="nombre" class="col-form-label"><?php echo $nombre_cliente;?> </label>
      		    </div>

      		    <div class="col-md-6">
      		    	<label for="inputAddress" class="col-form-label"><strong>Celular:</strong></label>
      		    	<label for="nombre" class="col-form-label"><?php echo $CODI_CLIENTE;?></label>
      		  	</div>
               <div class="col-md-6">
      		    	<label for="inputAddress" class="col-form-label"><strong>Ciudad:</strong></label>
      		    	<label for="nombre" class="col-form-label"><?php echo $ciudad_cliente;?></label>
      		  	</div>
               <div class="col-md-6">
      		    	<label for="inputAddress" class="col-form-label"><strong>Fecha Registro:</strong></label>
      		    	<label for="nombre" class="col-form-label"><?php echo $fechar;?></label>
      		  	</div>
               <div class="col-md-6">
      		    	<label for="inputAddress" class="col-form-label"><strong>Genero:</strong></label>
      		    	<label for="nombre" class="col-form-label"><?php echo $genero;?></label>
      		  	</div>
       
               <div class="col-md-6">
      		    	<label for="inputAddress" class="col-form-label"><strong>  Direccion Cliente:</strong></label>
      		    	<label for="nombre" class="col-form-label"><?php echo $direccion_cliente ;?></label>
      		  	</div>
               <div class="col-md-6">
      		    	<label for="inputAddress" class="col-form-label"><strong> Telefono :</strong></label>
      		    	<label for="nombre" class="col-form-label"><?php echo $telefono_cliente ;?></label>
      		  	</div>
               <div class="col-md-6">
      		    	<label for="inputAddress" class="col-form-label"><strong> Edad :</strong></label>
      		    	<label for="nombre" class="col-form-label"><?php echo $edad_cliente ;?></label>
      		  	</div>
               <div class="col-md-6">
      		    	<label for="inputAddress" class="col-form-label"><strong> Profesion :</strong></label>
      		    	<label for="nombre" class="col-form-label"><?php echo $profesion_cliente ;?></label>
      		  	</div>
              
               
      		  </div>
            
          <h4 class="card-title">Agregar Historia medica</h4>                                 
          <br>
      		 <form action="guardarlasek.php" method="POST" name="formularioActualizarcliente">
            <input type="hidden" id="clienteId" name="usuario_id" value="<?php echo $usuario_id;?>" >
                 <input type="hidden" id="CODI_CLIENTE" name="CODI_CLIENTE" value="<?php echo $CODI_CLIENTE;?>" >
                 <input type="hidden" id="clienteid" name="clienteid" value="<?php echo $clienteId;?>" >
                                                                                         
      		  <div class="form-row">


                <div class="form-group col-md-12">
      		      <input type="number" class="form-control" id="motivoConsulta" name="numaeroLasek" placeholder="Numaero Lasek" >
      		    </div>
              
     
              
               
               <div class="form-group col-md-12">
               
              
              <label><strong>  Descripcion  </strong></label>
              
<textarea  class="form-control" id="Descripcion" name="Descripcion" rows="4">
1.
2.
3.
</textarea>
              <label><strong>  Biomicroscopia  </strong></label>
              
<textarea  class="form-control" id="biomicroscopia" name="biomicroscopia" rows="4">
1.
2.
3.
</textarea>
              <label><strong> diagnostico  </strong></label>
              
<textarea  class="form-control" id="diagnostico" name="diagnostico" rows="4">
1.
2.
3.
</textarea>
              <label><strong> plan  </strong></label>
              
<textarea  class="form-control" id="plan" name="plan" rows="4">
1.
2.
3.
</textarea>
 
               
              
            </div> 
      		  <center><button type="submit" class="btn btn-outline-success">Guardar</button></center>
            
            <input type="hidden"  name="tipo_cliente"   valur="1">
            
      		</form>
        

     
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