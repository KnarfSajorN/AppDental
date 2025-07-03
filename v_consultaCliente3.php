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

        $queryList=mysqli_query($conn3,"SELECT * FROM  v_cliente where id = $clienteId");
 
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
            $entidadSalud=$rowMotorizado['entidadSalud'];


          $fechaNacimiento=$rowMotorizado['fechaNacimiento'];

   
           }
 
?>




 <div class="card-body">
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
                <label><?php echo  calculaedad($fechaNacimiento);?></label>
                
                 <br>

                  <label><strong>Genero:</strong></label>
                  <label><?php echo $genero;?></label>

              
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
             
              </div>  
<br>


              <div class="col-md-12">
<hr>  
</div>
 

 </div>

 

 <div align="center">
   <a class="btn btn-primary" href="historiaClinica3.php?clienteId=<?php echo $clienteId;?>" role="button"> <i class="fa fa-heartbeat"></i> Aplicar nueva vacuna</a> 
                                       
     </div>
<br>

               <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#Consultas" data-toggle="tab"> Por aplicar </a></li>
              <li><a href="#Examenes" data-toggle="tab">Aplicadas</a></li>

              <!-- 
              <li><a href="#Documentos" data-toggle="tab">Registros de exámenes</a></li>
                <a class="btn btn-primary" href="historiaExamenes.php?clienteId=<?php echo $clienteId;?>" role="button"><i class="fa fa-folder-open-o"></i>  Agregar exámenes</a>
              -->
            </ul>
            <div class="tab-content">
          <div class="active tab-pane" id="Consultas">
          
          
           




 






          <hr align="center" size="10" width="100%" color="#000000">
           <h3>
           Vacunas por aplicar
           </h3>




<?php
$cuantasVacunas = 0;


 
echo ' <table border="1"   style="undefined;table-layout: fixed; width: 100%">
<tr> <th>  <strong> Nombre </strong> </th><th>  <strong>Aplicada </strong></th><th>  <strong> Fecha </strong> </th> <th>  </th> </tr>';

 $queryinv2=mysqli_query($conn3,"SELECT * FROM  v_historiaClinica3 where cliente_id = '$clienteId' and aplicada  = 0 order by fecha ASC");

$nrowl2=mysqli_num_rows($queryinv2);
while($rowinv2=mysqli_fetch_array($queryinv2))
{

$cuantasVacunas++;

$id       =$rowinv2['id']; 
$vacuna_id       =$rowinv2['vacuna_id']; 
$aplicada        =$rowinv2['aplicada']; 
$fecha           =$rowinv2['fecha']; 


echo '<tr> <th><h3>'.v_servicios($vacuna_id).'</h3> </th><th><h3> '.aplicadas($aplicada).' </h3> </th><th><h3>'.$fecha .'</h3> </th>  <th>  
<a class="btn btn-primary" href="v_aplicaVacuna.php?id='.$id.'" role="button"><h4> <i class="fa fa-heartbeat"></i> Aplicar Vacuna</h4></a> 
       </th>  </tr>';


}
echo '</table> ';
if ($cuantasVacunas == 0) {
  echo '<strong> NO se le a aplicada ninguna vacuna </strong>';
}
else
{ 
  echo $cuantasVacunas;
}



?>
 
<h3>   </h3>


 

      </div>
              <!-- /.tab-pane -->
              
 
      
  <div class="tab-pane" id="Examenes">
  
          <hr align="center" size="10" width="100%" color="#000000">
           <h3>
           Vacunas aplicadas
           </h3>




<?php
$cuantasVacunas = 0;


 
echo ' <table border="1"   style="undefined;table-layout: fixed; width: 100%">
<tr> <th>  <strong> Nombre </strong> </th><th>  <strong>Aplicada </strong></th><th>  <strong> Fecha </strong> </th> <th>  </th> </tr>';

 $queryinv2=mysqli_query($conn3,"SELECT * FROM  v_historiaClinica3 where cliente_id = '$clienteId' and aplicada  = 1 order by fecha ASC");

$nrowl2=mysqli_num_rows($queryinv2);
while($rowinv2=mysqli_fetch_array($queryinv2))
{

$cuantasVacunas++;

$vacuna_id       =$rowinv2['vacuna_id']; 
$aplicada        =$rowinv2['aplicada']; 
$fecha           =$rowinv2['fecha']; 
$hora           =$rowinv2['hora']; 

$factura_id           =$rowinv2['factura_id']; 

if ($factura_id > 0) {
$facturado = 'FACTURADO';

}
else
{
  $facturado = 'NO FACTURADO';
}


echo '<tr> <th><h3>'.v_servicios($vacuna_id).'</h3> </th><th><h3> '.aplicadas($aplicada).' </h3> </th><th><h3>'.$fecha .' '.$hora.'</h3> </th><th> '.$facturado.' </th>  </tr>';




}
echo '</table> ';
if ($cuantasVacunas == 0) {
  echo '<strong> NO se le a aplicada ninguna vacuna </strong>';
}
else
{ 
  echo $cuantasVacunas;
}



?>
 

  
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