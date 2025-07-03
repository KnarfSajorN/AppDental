   <?php 
   include 'header.php';
   include 'menu.php';

   $idcie10=0;
   $idcie10 = $_GET['idcie10'];

   $IDconfig = $_SESSION['ID'];
 


if ($clienteId>0) {

include 'funciones/conn3.php';


        $queryList=mysqli_query($conn3,"SELECT * FROM  cliente where cliente_id=$clienteId");

        $nrowl=mysqli_num_rows($queryList);

        while($rowMotorizado=mysqli_fetch_array($queryList))

        {
 
            $usuario_id=$rowMotorizado['usuario_id'];
            $nombre_cliente=$rowMotorizado['nombre_cliente'];
           

           }


//     $_SESSION['NOMBRE_USUARIO']

}


   $msg = $_GET['msg'];
if ($msg == 1) 
{
$respuesta = ' 
          <div class="callout callout-info">
          <h4>Registrado</h4>
           <p></p>
        </div>';

}
elseif ($msg == 2) 
{
  
  $respuesta = ' 
          <div class="callout callout-danger">
          <h4>Código duplicado</h4>
           <p></p>
        </div>';

}
elseif ($msg == 3) 
{
  
  $respuesta = ' 
          <div class="callout callout-info">
          <h4>Código borrado</h4>
           <p></p>
        </div>';

}
elseif ($msg == 4) 
{
  
  $respuesta = ' 
          <div class="callout callout-danger">
          <h4>Código usado no es posible borrarlo</h4>
           <p></p>
        </div>';

}
elseif ($msg == 5) 
{
  
  $respuesta = ' 
          <div class="callout callout-info">
          <h4>Código actualizado </h4>
           <p></p>
        </div>';

}




if(isset($_GET['editar_cie10']))
{

  

$codigo     = mysql_real_escape_string(htmlspecialchars(trim($_GET['editar_cie10'])));

$usuario_id = mysql_real_escape_string(htmlspecialchars(trim($_GET['usuario_id'])));
 
$cie10 = $usuario_id.'cie10';
  


      $queryList=mysqli_query($conn3,"SELECT * FROM  $cie10 where codigo = '$codigo'");

        $nrowl=mysqli_num_rows($queryList);

        while($rowMotorizado=mysqli_fetch_array($queryList))

        {
      
            $codigoE = $rowMotorizado['codigo'];
            $descripcionE = $rowMotorizado['descripcion'];
            $idE = $rowMotorizado['id'];
          
        }


}




    if (isset($_GET['id'])) 
    {
        $id=$_GET['id'];
        $queryList=mysqli_query($conn3,"SELECT * FROM  examenes_22 where id = '$id'");
        $resulGet=mysqli_fetch_assoc($queryList);
        $idGet=$resulGet['id'];
        $codigoGet=$resulGet['codigo'];
        $nombreGet=$resulGet['nombre'];
        $precioGet=$resulGet['precio'];
    }




          if (isset($_GET['eliminar'])) {
            $id=$_GET['eliminar'];
            $queryList=mysqli_query($conn3,"DELETE FROM examenes_22 where id = '$id'");
                echo "<script type='text/javascript'>
                        window.location='demostracion.php';
                     </script>";  

           
          }


























      ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    
      <ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio </a></li>
        <li><a href="config"><i class="fa fa-gears"></i> Perfil / Configuración  </a></li>
        <li><a href="#">Registro de exámenes de laboratorio</a></li>
        

      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
 
          <div class="card-body">
          <h4 class="card-title"><strong>Registro de Exámenes de Laboratorio</strong></h4>
       




           	<form action="guardardemo.php" method="POST">
	            <div class="form-row">
	            <h4 style="margin-left: 1%;">Examenes</h4>	 		
			        <div class="form-group col-md-4"> 
			           		<input type="text" class="form-control input-lg" name="nombre"  autocomplete="off" value="<?php if (isset($_GET['id'])) {	echo $nombreGet; } ?>"  placeholder="Nombre"     required>
			        </div>
				    <div class="form-group col-md-4">
				         	 <input type="number"  class="form-control input-lg" name="precio"  value="<?php if (isset($_GET['id'])) {	echo $precioGet; } ?>"   autocomplete="off" placeholder="Precio" required>
				    </div> 
				    <div class="form-group col-md-4">
				         	 <input type="text"  class="form-control input-lg" name="codigo"  value="<?php if (isset($_GET['id'])) {	echo $codigoGet; } ?>" autocomplete="off" placeholder="Codigo" required>
				    </div> 
            <?php if (isset($_GET['id'])){ ?>
                <input type="hidden" name="idDemo" value="<?php echo  $idGet; ?>">
            <?php } ?>
        
				</div>

          		<center>

          			<?php if (isset($_GET['id'])) { ?>
          				<form action="demostracion.php">
          				<button type="submit" name="editar" value="1"  class="btn btn-block btn-primary btn-sm" > 
			          	<h4> <strong> Editar   </strong> 	</h4> </form>
		          </button>
          			<?php }else {  ?>
		          <button type="submit" name="registrar" value="1" class="btn btn-block btn-primary btn-sm"> 
			          	<h4> <strong> Registrar   </strong> 	</h4> 
		          </button>
		      <?php } ?>
      			</center>
       		</form>


        </div>


<br>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>

                    <th class="text-center">Fecha | Hora</th>
                    <th class="text-center">Código</th>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Precio</th>
                    <th class="text-center"></th>
               
                </tr>
                </thead>
                <tbody>
                  <?php  $busclis=mysqli_query($conn3,"SELECT * FROM  examenes_22");
                 while ($exa22=mysqli_fetch_assoc($busclis)) { 
                  $id    = $exa22['id'];
                  $fecha    = $exa22['fecha'];
                  $hora     = $exa22['hora'];
                  $codigo   = $exa22['codigo'];
                  $nombre   = $exa22['nombre'];
                  $precio   = $exa22['precio'];


                  ?>
                	<tr align="center">
                    <td><?php echo $fecha.' | '.$hora; ?></td>
                		<td><?php echo $codigo; ?></td>
                		<td><?php echo $nombre; ?></td>
                		<td><?php echo number_format($precio); ?></td>
                		<td>
                			<a href="demostracion.php?id=<?php echo $id; ?>" title="Editar"><i class="fa fa-fw fa-edit"></i></a> &nbsp;&nbsp;|&nbsp;&nbsp; 
                      <a href="" title="Agregar Detalle" data-toggle="modal" data-target="#myModal<?php echo $id ;  ?>"><i class="fa fa-fw fa-file-text-o"></i></a> &nbsp;&nbsp;|&nbsp;&nbsp; 

                			<a href="demostracion.php?eliminar=<?php echo $id; ?>" title="Eliminar"><i class="fa fa-fw fa-close"></i></a>
                		</td>
                	</tr>
              

                <?php } ?>
              
            
           
                </tbody>
        
              </table>
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
  <!-- /.content-wrapper -->
   <?php
    include 'footer.php';

   ?>
<!-- Modal -->








<?php  $buscanModal=mysqli_query($conn3,"SELECT * FROM  examenes_22"); 
       while ($busModal=mysqli_fetch_assoc($buscanModal)) { 
                    $id    = $busModal['id'];
                  $fecha    = $busModal['fecha'];
                  $hora     = $busModal['hora'];
                  $codigo   = $busModal['codigo'];
                  $nombre   = $busModal['nombre'];
                  $precio   = $busModal['precio'];




                $contando=mysqli_query($conn3,"SELECT COUNT(id) as contando from  detalleExamenes_22 where idExamen= $id");
                $contand=mysqli_fetch_assoc($contando);
                $ce=$contand['contando'];?>


<form action="guardardemo.php" method="POST" name="Modal">
<div class="modal fade" id="myModal<?php echo $id;  ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="margin-left: -14%; width: 140%;box-shadow: 0px 0px 15px 3px rgb(60, 141, 188);">
      <div class="modal-header">
          <ul class="nav nav-tabs">
              <li class="active" ><a href="#tab_2" data-toggle="tab">Registrar</a></li>
              <li ><a href="#tab_3" data-toggle="tab">Detalle</a></li>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
            </ul>
      </div>
      <div class="modal-body">

            <div class="tab-content">
          
              <div class="tab-pane active" id="tab_2">
                  <input type="hidden" name="idExmane" value="<?php echo $id; ?>">
                  <div class="row" >
                      <h4 style="margin-left: 3%;margin-top: -1%;">Caracteristicas del Examen</h4>
                      <div class="form-group col-md-3" style="margin-left: 2%;">
                        <input type="text"  class="form-control input-lg" name="densidad" autocomplete="off" placeholder="Densidad" required>
                      </div>
                      <div class="form-group col-md-4" >
                        <input type="text"  class="form-control input-lg" name="valor1"  autocomplete="off" placeholder="Valor Referencia" required>
                      </div>
                      <div class="form-group col-md-4" >
                        <input type="text"  class="form-control input-lg" name="valor2"  autocomplete="off" placeholder="Valor Referencia" >
                      </div>
                  </div>
              </div>

              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3"> 



                <?php $buscandDetalle=mysqli_query($conn3,"SELECT * FROM  detalleExamenes_22 where idExamen= $id");
              
                  

                  ?>
                <table width="90%;" style="margin-left: 5%;">
                  <tr>
                    <th style="margin-left: 8%!important;"> </th>
                    <th>N°</th>
                    <th>Dendidad</th>
                    <th>Referencia 1 </th>
                    <th>Referencia 2 </th>
                  </tr>
                  <tr>
                    <td colspan="5" style="border-bottom: 1px solid #3c8dbc;border-top: 1px solid #3c8dbc;padding-left: 1%;color: #3c8dbc;">
                      <strong> <?php echo  ucwords($nombre); ?></strong>
                    </td>
                  </tr>

                  <?php 

                 $contador=1; 
                 while ($detaE=mysqli_fetch_assoc($buscandDetalle)) 
                 { 
                  $dfecha   = $detaE['fecha'];
                  $dhora   = $detaE['hora'];
                  $didExamen   = $detaE['idExamen'];
                  $ddensidad   = $detaE['densidad'];
                  $dvalorReferencia1   = $detaE['valorReferencia1'];
                  $dvalorReferencia2   = $detaE['valorReferencia2'];
                    ?>



                  <tr style="border-bottom: 1px solid #E7E7E7;padding-bottom: 1%;">
                    <td > </td>
                    <td><?php echo $contador ?></td>
                    <td><?php echo $ddensidad ?></td>
                    <td><?php echo $dvalorReferencia1 ?></td>
                    <td><?php echo $dvalorReferencia2 ?></td>
                  </tr>

                   <?php $contador = $contador+1; }  ?>

                    </table>
              </div>
              <!-- /.tab-pane -->
            </div>







      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary" name="detalle" value="1">Guardar Detalles</button>
      </div>
    </div>
  </div>
</div>
</form>
<?php  } ?>





























 <!-- Funciona para consultar disponibilidad -->

<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script type="text/javascript">


      function validar(){
// estas son las variables que enviamos

        var codigo = $("#codigo").val();
        var usuario_id = $("#usuario_id").val();
       

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "ajax_cie10_verificar.php",
            data: {codigo:codigo, usuario_id:usuario_id},
            success: function(response) {
                $('#div-results').html(response);
                 
            }
        });
    };

      function verHora(){
// estas son las variables que enviamos

        var fecha = $("#fecha").val();
        var Hora = $("#Hora").val();
        var usuario_id = $("#usuario_id").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "disponibilidadHora.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id},
            success: function(response) {
                $('#div-resultsHora').html(response);
                 
            }
        });
    };



 
</script>


		