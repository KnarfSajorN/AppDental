  <?php 
   include 'header.php';
   include 'menu.php';

$clienteId  = $_GET['clienteId'];  
$usuario = $_SESSION['ID']; 


$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));

 
   $queryList1=mysqli_query($conn3,"SELECT * FROM  cliente where cliente_id=$clienteId ");
  
            $nrowl=mysqli_num_rows($queryList1);
            while($row2=mysqli_fetch_array($queryList1))
            {

            $cliente    =$row2['nombre_cliente'];
           

          }


 $date            = date("Y-m-d");
   ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       
        Registro De Citas
         
      </h1>
      <ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
        <li><a href="#"> Registro De Citas </a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">



        <div class="col-xs-12" align="center">
<h4><b > HISTORIAL DE CITAS DEL PACIENTE <?php echo $cliente?> </b></h4>
          <div class="box">
           
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th class="text-center">Fecha-Hora</th>
                    <th class="text-center">Doctor</th>
                    <th class="text-center">Motivo Consulta</th>
                    <th class="text-center">Estado</th>
                   
                   
                </tr>
                </thead>
                <tbody>
                  <?php
                  
                  //     ?ID_patients=8
                 


$ID = $_SESSION['ID'];
 

$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));


  $queryList=mysqli_query($conn3,"SELECT * FROM  citas where  idCliente='$clienteId' order by fecha asc ");
 
 
           $nrowl=mysqli_num_rows($queryList);

                  while($row_recordset32=mysqli_fetch_array($queryList))

                  {
                      $idCitas      = $row_recordset32['idCitas'];
                      $Doctor= $row_recordset32['doctor'];
                      $fecha= $row_recordset32['fecha'];
                      $Hora= $row_recordset32['Hora'];
                      $nombre= $row_recordset32['nombre'];
                      $telefono= $row_recordset32['telefono'];
                      $correo= $row_recordset32['correo'];
                      $motivoConsulta= $row_recordset32['motivoConsulta'];
                      $activo= $row_recordset32['activo']; 
                      $estado= $row_recordset32['estado'];


                      if ($estado == 1) {$estado1='Por confirmar';}
                      if ($estado == 2) {$estado1='Confirmada';}
                      if ($estado == 3) {$estado1='Asistida';}
                      if ($estado == 4) {$estado1='No asistida';}
                      if ($estado == 99) {$estado1='Cancelada';}

 $queryListU=mysqli_query($conn3,"SELECT * FROM  usuarios where ID=$Doctor ");

                  $nrowlU=mysqli_num_rows($queryListU);

                  while($row_recordset=mysqli_fetch_array($queryListU))

                  {
                      $NDoctor     = $row_recordset['NOMBRE_USUARIO']; }

                     
                      echo '     
                      <tr>
                       <td width="20%" class="text-center">'.$fecha.'-'.$Hora.'</td>
                      <td width="20%" class="text-center">'.$NDoctor.'</td>    
                     
                     
                      <td width="30%" class="text-center">'.$motivoConsulta.'</td>
                      <td width="30%" class="text-center">'.$estado1.'</td>';

                    }


 ?>

    </tr>
 
                </tbody>
                <tfoot>
                <tr>
                    <th class="text-center">Fecha-Hora</th>
                   <th class="text-center">Doctor</th>
                  
                   
                    <th class="text-center">Motivo Consulta</th>
                    <th class="text-center">Estado</th>
                  
                
                </tr>
                </tfoot>
              </table>
            </div>


 


      <div class="col-md-12" align="center">
  
<a class="btn btn-block btn-primary btn-sm" target="_blank" href="vista.php?clienteId=<?php echo $clienteId?>&usuario=<?php echo $usuario?>">
 <h3> Agendar </h3> 
</a>

 
 
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
<script type="text/javascript">

   function cargarFecha(){
        // estas son las variables que enviamos
       

        var idcliente = $("#clienteId").val();
        var fechaE= $("#fecha").val();
      
          
        $.ajax({
            type: "POST",
            url: "OportunidadCitas.php",
            data: {fechaE:fechaE, idcliente:idcliente},
            success: function(response) {
                $('#div-results').html(response);
        // aqui enviamos el mensaje por medio de un arreglo               
            }
        });
      document.getElementById("detalleRecetario").reset();
    };

  </script>