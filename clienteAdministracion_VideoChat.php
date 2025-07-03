 <?php 
   include 'header.php';
   include 'menu.php';?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       
        Video consultas agendadas
         
      </h1>
      <ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio </a></li>
        <li><a href="#"> Video consultas agendadas
</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="">


         

        <div class="col-xs-12">

          <div class="box">
           
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                     <th class="text-center"></th>
                     <th class="text-center">Doctor</th>
                    <th class="text-center">Fecha-Hora</th>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Teléfono</th>
                    <th class="text-center">Correo</th>
                    <th class="text-center">Motivo Consulta</th>
                  
                  <th>  </th>
                  <th>  </th>
                  <th>  </th>
                  
                </tr>
                </thead>
                <tbody>
                  <?php
                  
                  //     ?ID_patients=8
                 


$ID = $_SESSION['ID'];
 

$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));


                  $queryList=mysqli_query($conn3,"SELECT * FROM  citas  where (estado  = 1 or estado  = 2) and tipo = 1 order by fecha, Hora asc ");
                  // $queryList=mysqli_query($conn3,"SELECT * FROM  citas  where (estado  = 1 or estado  = 2) and tipo = 1 and doctor = $ID order by fecha, Hora asc ");


                  

//echo "SELECT * FROM  citas  where (estado  = 1 or estado  = 2) and tipo = 1 and doctor = $ID order by fecha, Hora asc ";

                //  $queryList=mysqli_query($conn3,"SELECT * FROM  citas");

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
                      $cliente= $row_recordset32['idCliente'];






$queryListCl=mysqli_query($conn3,"SELECT * FROM   usuarios where ID = $Doctor  ");
//echo "SELECT * FROM   reporteimagenologia where cliente_id = $cliente and fecha= '$fecha' ";

            $nrowl=mysqli_num_rows($queryListCl);
            while($rowCl=mysqli_fetch_array($queryListCl))
            { $nombredoctor     =$rowCl['NOMBRE_USUARIO'];


         

}












                      
                      echo '     
                      <tr>
                    <td width="1%">  <a href="nuevoPaciente?cI='.encrypt($cliente).'" title="Editar Paciente"><i class="fa fa-pencil"></i> </a> </td> 
                      <td width="10%" class="text-center">'.$nombredoctor.'</td>    
                      <td width="5%" class="text-center"> '.$fecha.'-'.$Hora.'</td>
                      <td width="10%" class="text-center"> '.$nombre.'</td>
                      <td width="10%" class="text-center">'.$telefono.'</td>
                      <td width="10%" class="text-center">'.$correo.'</td>
                      <td width="20%" class="text-center">'.$motivoConsulta.'</td>';
                  ?>

                           <td width="10%" class="text-center">
                            <?php 
                          if($estado=='1'){
                            echo '<a href="Confirmarcita.php?idCitas='.$idCitas.'&tipo=1"><button type="button" class="btn btn-block btn-outline-success rounded-pill shadow">Confirmar</button></a>';
                            } 

                            if($estado=='2'){
                            echo '<a href="asistioCita.php?idCitas='.$idCitas.'&tipo=1"><button type="button" class="btn btn-block btn-outline-info rounded-pill shadow">Asistio</button></a>';
                            }      

                          ?>
                            
                          </td> 
                 
                          <?php

 echo '<td width="10%" class="text-center"><a href="NoAsistio.php?idCitas='.$idCitas.'"><button type="button" class="btn btn-block btn-outline-danger rounded-pill shadow">No Asistio</button></a> </td> ';
echo '<td>
    <a href="generarVideoConsulta.php?idCitas='.$idCitas.'&clienteId='.$correo.'&telefono='.$telefono.'"> <button type="button" class="btn btn-block btn-outline-info rounded-pill shadow">Iniciar Consulta</button>     </a>
    </td>';
                          }

                         
                          ?>

    </tr>
 
                </tbody>
                <tfoot>
                <tr>
                <th class="text-center"></th>
                   <th class="text-center">Doctor</th>
                    <th class="text-center">Fecha-Hora</th>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Teléfono</th>
                    <th class="text-center">Correo</th>
                    <th class="text-center">Motivo Consulta</th>
                  
                  <th>  </th>
                  <th>  </th>
                  <th>  </th>
                  
                   
                </tr>
                </tfoot>
              </table>

              <div class="col-md-12" align="center">
  
<!--<a class="btn btn-block btn-primary btn-sm" target="_blank" href="<?php echo $Base;?>ReporteVideoconsultas.php?cliente=<?php echo $clienteId;?>&idr=<?php echo $idr;?>"> 
  <i class="fa fa-print"></i> Reporte Video Consultas
</a>-->
<a class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" target="_blank" href="<?php echo $Base;?>ReporteVideoconsultas.php?"> 
  <i class="fa fa-print"></i> Reporte Video Consultas
</a>
 
 
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
  <!-- /.content-wrapper -->
   <?php
    include 'footer.php';

   ?>