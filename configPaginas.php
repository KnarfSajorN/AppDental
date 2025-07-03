<?php 
   include 'header.php';
   include 'menu.php';

    $clienteId = $_GET['clienteId']; 
    $usuarioId = $_GET['usuarioId']; 

 $ID = $_SESSION['ID'];

 



      ?>
     

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Paginas 
         
      </h1>
      <ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
        <li><a href="#"> Config Paginas </a></li>
        

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




          <div class="box box-solid">
             
            <!-- /.box-header -->
            <div class="box-body">
              <div class="box-group" id="accordion1">
               
 

 <form action="configGuardarPaginas.php" method="POST" name="formularioActualizarcliente">

 

                    <div class="box-body">
                      
            
                <div class="col-md-12"> <font size="1"> <h3 align="center">CONFIGURACIÓN DE PAGINAS - WEB</h3> </font></div>
               <div class="form-group col-md-9">
                  <div align="left">Título</div>
                  <input type="text" class="form-control input-lg" id="fimico" name="Titulo" placeholder="">
                </div>

                 <div class="form-group col-md-3">
                  <div align="left">Nombre</div>
                  <input type="text" class="form-control input-lg" id="fimico" name="Nombre" placeholder="">
                </div>


                  <!-- <input type="hidden" class="form-control input-lg"  name="accion" value="configProcesarFormulario.php" > -->
                 
<!-- 
                 <div class="form-group col-md-6">
                  <div align="left">Menú Nombre</div>
                  <input type="text" class="form-control input-lg" id="neuropaticos" name="menu" placeholder="">
                </div> 

                 <div class="form-group col-md-4">
                  <div align="left">Botón</div>
                  <input type="text" class="form-control input-lg" id="neuropaticos" name="boton" placeholder="">
                </div>  -->
 
 </div>
                </div>

   </div>


      
                    
                    <input  type="hidden" name="ID"  value="<?php echo $_SESSION['ID']?>">
                   
                    <input  type="hidden" name="NOMBRE_USUARIO"  value="<?php echo $_SESSION['NOMBRE_USUARIO']?>">
              
            

           
             <div class="col-sm-12">
             
            <center><button type="submit" class="btn btn-block btn-primary btn-sm"> <h2> <strong>  G u a r d a r  </strong> </h2> </button></center>
            
            </div>
           
              
            <input type="hidden"  name="tipo_cliente"   valur="1">
           </div>   
            
          </form>
 

<br>

  <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>

                    <th class="text-center">nombre </th>
                    <th class="text-center">   </th>
               
                </tr>
                </thead>
                <tbody>
                  <?php
                      
              $queryListhc=mysqli_query($conn3,"SELECT * from configPaginas");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $Pagina=$rowhc['id'];
                $nombre=$rowhc['nombre'];
                $action=$rowhc['action'];
                $method=$rowhc['method'];
                $name=$rowhc['name'];
                $boton=$rowhc['boton'];
                 
                      echo '      
                      <tr>
                      <td> '.$nombre.'</td>
                     
                      <td>

                      <form method>
                     
                      <font color="#04CC05"> <a href="configFormularioPagina.php?Nombre_Page='.base64_encode($nombre).'&Pagina='.base64_encode($Pagina).'"> <i class="fa fa-pencil" title="Editar" name="Virtual"></i>  </a></font>
                      </td>
                      </tr>';
                  } 
 ?>
 
                </tbody>
                <tfoot>
                <tr>
                   <th class="text-center">nombre </th>
                    <th class="text-center">   </th>
                
                </tr>
                </tfoot>
              </table>
            </div>







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

