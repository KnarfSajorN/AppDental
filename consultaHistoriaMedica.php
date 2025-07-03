<?php
date_default_timezone_set('America/Bogota');
include("conexiones/conexion.php");
include("funciones/conexiones.php");
include("funciones/funciones.php");
$con=conectar();
$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));
 
$tipo = $_GET['tipo'];
$ID = $_GET['ID'];

$EstadoN0 = 0;
$EstadoN1 = 0;
$EstadoN2 = 0;
$EstadoN3 = 0;

            $queryList=mysqli_query($conn3,"SELECT * FROM  config where ID_Usuario = $ID");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {

              $empresaNombre      =$rowMotorizado['nombreF'];
              $LogoF               =$rowMotorizado['logoF'];

              if (strlen($LogoF) > 0) 
              {
                $Logo = '<img src="'.$Base.'/logos/'.$LogoF.'" height="10%" width="10%">'; 
              }
            

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
 
      <!-- title row -->
      <div class="row">
       

        <div class="col-xs-12">
          
              <?php 
        $queryListc=mysqli_query($conn3,"SELECT * FROM  cliente where cliente_id=$tipo");
        $nrowl=mysqli_num_rows($queryListc);
        while($rowc=mysqli_fetch_array($queryListc))
        {
            $nombre_cliente     =$rowc['nombre_cliente'];
            $CODI_CLIENTE       =$rowc['CODI_CLIENTE'];

        }     
            

 
               echo '<br>Paciente: '.$nombre_cliente;
             
               ?> 

           
        </div>


        <!-- /.col -->
      </div>
      <!-- info row -->
      
      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped" border="1">
            <thead>
            <tr style="background: #A4A4A4">
              <th>Fecha</th>
              <th>Hora</th>
              <th>Motivo consulta </th>
              <th>Diagnostico </th>
              <th>Tratamiento </th>
              <th>Notas </th>
             
            </tr>
            </thead>
            <tbody>
<?php
$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));
        $queryList=mysqli_query($conn3,"SELECT * FROM  historiaClinica1 where usuario_id=$ID and cliente_id = $tipo");
        $nrowl=mysqli_num_rows($queryList);
        while($rowMotorizado=mysqli_fetch_array($queryList))
        {
            $cliente_id=$rowMotorizado['cliente_id'];
            $Fecha=$rowMotorizado['Fecha'];
            $Hora=$rowMotorizado['Hora'];
            $motivoConsulta=$rowMotorizado['motivoConsulta'];
            $diagnostico=$rowMotorizado['diagnostico'];
            $tratamiento=$rowMotorizado['tratamiento'];
            $notas=$rowMotorizado['notas'];
            $Fecha=$rowMotorizado['Fecha'];
             
     
   
     
echo "<tr>
         
       
        <td>$Fecha</td>
        <td>$Hora </td>
        <td>$motivoConsulta </td>
        <td>$diagnostico </td>
        <td>$tratamiento </td>
        <td>$notas </td>
        
    </tr>";
         

 }

 ?>


            </tbody>
          </table>

            

      
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
