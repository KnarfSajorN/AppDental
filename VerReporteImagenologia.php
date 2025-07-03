<?php
date_default_timezone_set('America/Bogota');
//include("conexiones/conexion.php");
//include("funciones/conexiones.php");
include("funciones/funciones.php");
include("funciones/funcionesUtilidades.php");
include("funciones/conn3.php");




$desde = $_POST['desde'];
$hasta = $_POST['hasta'];
$ID = $_POST['ID'];

 
  $clienteId = $_POST['clienteId']; 
            

  


            $queryList=mysqli_query($conn3,"SELECT * FROM  config where ID_Usuario = $ID");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {

              $empresaNombre      =$rowMotorizado['nombreF'];
              $LogoF               =$rowMotorizado['logoF'];

               if (strlen($LogoF) > 0) 
              {
                $Logo = '<img src="'.$Base.'logos/'.$LogoF.'" height="175" width="175">'; 
              }
              

            
   if (strlen($firma) > 0)  
              {
                $firmaImg = '<img src="'.$Base.'FirmasReg/'.$firma.'" height="80" width="200">'; 
              }

// Nuevos campos 
 
            }

  $queryList=mysqli_query($conn3,"SELECT * FROM  cliente where cliente_id = $clienteId");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {

              $nombre_cliente             =$rowMotorizado['nombre_cliente'];
              $CODI_CLIENTE               =$rowMotorizado['CODI_CLIENTE'];
             $edad               =$rowMotorizado['edad_cliente'];
              $fechaNacimiento               =$rowMotorizado['fechaNacimiento'];
           $telefono                =$rowMotorizado['celular_cliente'];
            $seguro                     =$rowMotorizado['seguro'];
              $direccion_cliente          =$rowMotorizado['direccion_cliente'];
              $genero                     =$rowMotorizado['genero'];
                
            } 

 



   ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> <?php echo $empresaNombre ?>   </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body>
   <!-- Main content -->
  <div class="row no-print">
        <div class="col-xs-12">  
          <a href="<?php echo $Base;?>reporteImagenologia.php"   class="btn btn-default">  Regresar</a>
            <a href='javascript:window.print(); void 0;'   class="btn btn-default"><i class="fa fa-print"></i> Imprimir</a>
        </div>
      </div>
      <!-- title row -->
           <div class="row">
         
        <div class="col-xs-3">
          <h2 >
          <?php echo $Logo ?>  
            
          </h2>
        </div>
        <div class="col-xs-9" align="center">
         <i> <h2>
            <?php echo 
            $empresaNombre
            ?>    </h2></i> 
       
         
          
            
        </div>
        <!-- /.col -->
      </div> 
      <!-- info row -->
      <div class="row ">
        <div class="col-md-12">
   
        <!-- /.col -->
        
      <!--    Datos del Paciente:<br>
         <table>
         <tr><td>     <strong>Nombre: <?php echo $nombre_cliente ?> &nbsp&nbsp&nbsp</strong> </td>
            <td>  <strong>Documento: <?php echo $CODI_CLIENTE ?>&nbsp&nbsp&nbsp </strong></td>
           <td>   <strong>Edad: <?php echo calculaedad($fechaNacimiento) ?> </strong></td></tr>

 </table> -->

 <table align="center"><tr><td><h3><b>REPORTE PEDIDOS IMAGENOLOGIA</b></h3> </td></tr>
  <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
         <thead>
            <tr>
              <th class="text-center">Fecha-Hora</th>
              <th class="text-center">Paciente</th>
              <th class="text-center">Cédula</th>
              <th class="text-center">Edad</th>
              <th class="text-center">Ciudad</th>
              <th class="text-center">Dirección</th>
              <th class="text-center">Celular</th>
              <th class="text-center">Médico</th>
              <th class="text-center">Especialidad</th>
                <th class="text-center">Estudio Solicitado</th>
                

             
               
            </tr> </thead> 

            
            <tbody>
             
<!--<td>
          <tr> Fecha</tr>
<tr> Peso</tr> <br>
<tr>Talla</tr> <br>
<tr>Talla</tr>   <br>  </td> --> <tr> 
<?php

$ID = $ID ;
 

$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));


                  $queryList=mysqli_query($conn3,"SELECT * FROM  reporteimagenologia l, cliente c, usuarios u where l.fecha BETWEEN '$desde' and '$hasta' and l.cliente_id=c.cliente_id and l.usuario_id=u.ID  order by l.fecha asc  ");

       //echo  "SELECT * FROM  laboratorios l, cliente c, usuarios u where l.fecha BETWEEN '$desde' and '$hasta' and l.cliente_id=c.cliente_id and l.usuario_id=u.ID  order by l.fecha asc  ";


                  $nrowl=mysqli_num_rows($queryList);

                  while($row_recordset32=mysqli_fetch_array($queryList))

                  {
                      $id     = $row_recordset32['ID'];
                      $cliente= $row_recordset32['cliente_id'];
                      $usuario= $row_recordset32['usuario_id'];
                      $fecha= $row_recordset32['fecha'];
                      $hora= $row_recordset32['hora'];
                      $examen= $row_recordset32['estudio'];
                      $paciente= $row_recordset32['nombre_cliente'];
                      $cedula= $row_recordset32['CODI_CLIENTE'];
                      $Ciudad= $row_recordset32['ciudad_cliente'];
                      $dir= $row_recordset32['direccion_cliente'];
                      $celular= $row_recordset32['telefono_cliente'];
                      $medico= $row_recordset32['NOMBRE_USUARIO'];
                      $especialidad= $row_recordset32['especialidad'];
                      $fechaNacimiento = $row_recordset32['fechaNacimiento'];

                      $EDAD = calculaedad($fechaNacimiento);
                      
                      echo '     
                      <tr>
                         
                      <td width="15%" class="text-center"> '.$fecha.'-'.$hora.'</td>
                      <td width="20%" class="text-center"> '.$paciente.'</td>
                      <td width="10%" class="text-center"> '.$cedula.'</td>
                      <td width="5%" class="text-center"> '.$EDAD.'</td>
                      <td width="10%" class="text-center"> '.$Ciudad.'</td>
                      <td width="10%" class="text-center"> '.$dir.'</td>
                      <td width="10%" class="text-center"> '.$celular.'</td>
                      <td width="10%" class="text-center"> '.$medico.'</td>
                      <td width="10%" class="text-center">'.$especialidad.'</td>
                      <td width="10%" class="text-center">'.$examen.'</td>';

                    }
                  ?>

                           
                         
                       
    </tr>
 
                </tbody>
                <tfoot>
                <tr>
                   <th class="text-center">Fecha-Hora</th>
              <th class="text-center">Paciente</th>
              <th class="text-center">Cédula</th>
              <th class="text-center">Edad</th>
              <th class="text-center">Ciudad</th>
              <th class="text-center">Dirección</th>
              <th class="text-center">Celular</th>
              <th class="text-center">Médico</th>
              <th class="text-center">Especialidad</th>
                <th class="text-center">Estudio Solicitado</th>
                

                  
                  <th>  </th>
                  <th>  </th>
                  <th>  </th>
                   
                </tr>
                </tfoot>
              </table>

        </div>


            

        
</div></div>
</div>






        <!-- /.col -->
      </div>
      <!-- info row -->
      
      <!-- Table row -->
     


      
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

   
      <!-- /.row -->

      <!-- this row will not appear when printing -->
     
    
    <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>
