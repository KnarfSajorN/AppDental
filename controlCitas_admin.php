 <?php 
   include 'header.php';
   include 'menu.php';?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       
        Control De Citas
         
      </h1>
      <ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
        <li><a href="#"> Control De Citas </a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">


         <div class="box">
           
            <!-- /.box-header -->
            <div class="box-body">


        <div class="col-xs-12">
Reporte de Agenda
 

        </div>
        </div>
        </div>

        <div class="col-xs-12">

          <div class="box">
           
            <!-- /.box-header -->
            <div class="box-body">

              <div class="box-body table-responsive no-padding">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th class="text-center">Citas previas</th>
                    <th class="text-center">Fecha-Hora</th>
                    <th class="text-center">Doctor</th>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Telefonp</th>
                    <th class="text-center">Correo</th>
                    <th class="text-center">Motivo Consulta</th>
                    <th>  </th>
                    <th>  </th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  
                  //     ?ID_patients=8
                 


$ID = $_SESSION['ID'];
 

$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));

 
$query = "SELECT idCitas,
doctor,
fecha,
Hora,
nombre,
telefono,
correo,
motivoConsulta,
tipo , 
estado 
FROM  citas  where estado  = 0 order by fecha asc";
 


/*
$query = "SELECT idCitas,
doctor,
fecha,
Hora,
nombre,
telefono,
correo,
motivoConsulta,
tipo 
FROM  citas  where  estado  = 1  order by fecha asc";
 */

//execute the SQL query and return records
$result = mssql_query($query);

$numRows = mssql_num_rows($result);
/*
echo "<h1>" . $numRows . " Row" . ($numRows == 1 ? "" : "s") . " Returned </h1>";

//display the results
*/
while($row_recordset32 = mssql_fetch_array($result))
{

                  /*
                  $nrowl=mysqli_num_rows($queryListA);
                  while($row_recordset32A=mysqli_fetch_array($queryListA))
                  {

                    */
                      $idCitas= $row_recordset32A['idCitas'];
                      $doctor= $row_recordset32A['doctor'];
                      $fecha= $row_recordset32A['fecha'];
                      $Hora= $row_recordset32A['Hora'];
                      $nombre= $row_recordset32A['nombre'];
                      $telefono= $row_recordset32A['telefono'];
                      $correo= $row_recordset32A['correo'];
                      $motivoConsulta= $row_recordset32A['motivoConsulta'];
                      $tipo= $row_recordset32A['tipo'];
                      $estado= $row_recordset32A['estado'];
                      $activo= $row_recordset32A['activo']; 




/*

                  $queryList=mysqli_query($conn3,"SELECT * FROM  citas  where estado  = 0 order by fecha asc ");


                //  $queryList=mysqli_query($conn3,"SELECT * FROM  citas");

                  $nrowl=mysqli_num_rows($queryList);

                  while($row_recordset32=mysqli_fetch_array($queryList))

                  {
                      $idCitas      = $row_recordset32['idCitas'];
                      $idCliente     = $row_recordset32['idCliente'];
                      $Doctor= $row_recordset32['doctor'];
                      $fecha= $row_recordset32['fecha'];
                      $Hora= $row_recordset32['Hora'];
                      $nombre= $row_recordset32['nombre'];
                      $telefono= $row_recordset32['telefono'];
                      $correo= $row_recordset32['correo'];
                      $motivoConsulta= $row_recordset32['motivoConsulta'];
                      $activo= $row_recordset32['activo']; 
                      $estado= $row_recordset32['estado'];
*/
$queryLista=mysqli_query($conn3,"SELECT count(idCitas) as cont FROM citas WHERE idCliente='$idCliente'");
//echo  "SELECT count(idCitas) as cont FROM citas WHERE idCliente='$idCliente'";

                $nrowl=mysqli_num_rows($queryLista);

                  while($row_recordset=mysqli_fetch_array($queryLista))

                  {
                      $conta = $row_recordset['cont'];
                       $cont = $conta-1;

                     

                      
                      echo '     
                      <tr>
                       <td width="5%" class="text-center">'.$cont.'</td>
                       <td width="20%" class="text-center">'.$fecha.'-'.$Hora.'</td>
                      <td width="20%" class="text-center">
';
if ($_SESSION['TIPO'] == 99) {
  echo '
                      <a href="masterEliminar.php?filtro='.$idCitas.'&tabla=citas&Columna=idCitas&origen=controlCitas_admin&idUsuario='.$ID.'"> <font color = "red"> <i class="fa fa-trash" title="ELIMINAR" name="ELIMINAR"></i></font>  </a>';

}

  echo                    funcionMaster($Doctor, 'ID', 'NOMBRE_USUARIO', 'usuarios').'</td>    
                     
                      <td width="15%" class="text-center"> '.$nombre.'</td>
                      <td width="15%" class="text-center">'.$telefono.'</td>
                      <td width="15%" class="text-center">'.$correo.'</td>
                      <td width="30%" class="text-center">

<a href="masterEditor.php?filtro='.$idCitas.'&tabla=citas&Columna=idCitas&origen=controlCitas_admin&campoEditado='.$motivoConsulta.'&columnaEditado=motivoConsulta&idUsuario='.$ID.'"> <font color = "green"> <i class="fa fa-pencil" title="Editar Campo" name="Editar Campo"></i></font>  </a>

                      '.$motivoConsulta.'</td>';
                  ?>

                           <td><?php 
                        
                            echo '<a href="autorizarCita?idCitas='.$idCitas.'&ID='.$ID.'"><button type="button" class="btn btn-block btn-primary btn-sm">Autorizar Cita</button></a>';
                               
                          ?>
                            
                          </td> 
                 <td>
<?php

                            echo '<a href="NOautorizarCita?idCitas='.$idCitas.'&ID='.$ID.'"><button type="button" class="btn btn-block btn-danger btn-sm">Cancelar Cita</button></a>';
 
      }              
}

 ?>

    </tr>
 
                </tbody>
                <tfoot>
                <tr>
                  <th class="text-center">Citas previas</th>
                    <th class="text-center">Fecha-Hora</th>
                   <th class="text-center">Doctor</th>
                  
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Telefonp</th>
                    <th class="text-center">Correo</th>
                    <th class="text-center">Motivo Consulta</th>
                  
                  <th>  </th>
                  <th>  </th>
                </tr>
                </tfoot>
              </table>
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