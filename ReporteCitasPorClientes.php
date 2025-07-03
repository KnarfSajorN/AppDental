<?php
date_default_timezone_set('America/Bogota');
include("conexiones/conexion.php");
include("funciones/conexiones.php");
include("funciones/funciones.php");
$con=conectar();
$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));





$desde  = $_POST['desde'];
$hasta  = $_POST['hasta'];
$tipo   = $_POST['tipo'];
$ID     = $_POST['ID'];


$EstadoN0 = 0;
$EstadoN1 = 0;
$EstadoN2 = 0;
$EstadoN3 = 0;


            

 


            $queryList=mysqli_query($conn3,"SELECT * FROM  config where ID_Usuario = $ID");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {

              $empresaNombre      =$rowMotorizado['nombreF'];
              $telefonoF      =$rowMotorizado['telefonoF'];
              $direccionF      =$rowMotorizado['direccionF'];
             
              $LogoF               =$rowMotorizado['logoF'];

              if (strlen($LogoF) > 0) 
              {
                $Logo = '<img src="'.$Base.'/logos/'.$LogoF.'" height="50%" width="50%">'; 
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
  <div class="row no-print">
        <div class="col-xs-12">  
          <a href="https://<?php echo $Base?>/controlCitas"   class="btn btn-default">  Regresar</a>
            <a href='javascript:window.print(); void 0;'   class="btn btn-default"><i class="fa fa-print"></i> Imprimir</a>
        </div>
      </div>
      <!-- title row -->
      <div class="row">
         <small class="pull-right"> Fecha: <?php echo date("d-m-y")?></small>
        <div class="col-xs-12">
          <h2 class="page-header">
<TABLE>
  <TR>
    <TD> <div align="center"><?php echo $Logo?></div>  </TD> <TD> <?php echo $empresaNombre?> <br> <?php echo  'Teléfono: '.$telefonoF?><br><?php echo 'Dirección: '.$direccionF?></TD>  
  </TR>
   
</TABLE>

             
           
 
           
          </h2>
        </div>

        <div class="col-xs-12">
          
              <?php echo 'Desde: '.$desde .'<br> Hasta:'.$hasta?>
              <?php
              if ($tipo <> 0) {
               echo '<br>Estado: '.$Tipo;
              }
              elseif ($tipo == 0) {
               echo '<br>Estado: Todos';
              }
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
              <th>#</th>
              <th> Doctor </th>
              <th> Fecha - Hora </th>
              <th> Paciente </th>
              <th> Telefono  </th>
              <th> Correo  </th>
              <th> Motivo  </th>
              <th> Estado  </th>

 

            </tr>
            </thead>
            <tbody>
<?php

                 if ($tipo == 0) {                           
                 $resultado=mysql_query("SELECT * FROM  citas  where usuario_id= $ID and  fecha BETWEEN '$desde' and '$hasta' and order by fecha asc ");
                 }
                 elseif ($tipo <> 0) {
                 $resultado=mysql_query("SELECT * FROM  citas  where usuario_id= $ID and estado = $tipo and (fecha BETWEEN '$desde' and '$hasta' ) order by fecha asc ");
                 }
                    

                     $check=mysql_num_rows($q);

                    while ($fila = mysql_fetch_array($resultado, MYSQL_NUM)) {
                  //  '.$fila[2].'                    <a href="" >  <i class="fa fa-pencil-square-o"></i>   </a>  
                  $Numero++;

 
$estadoD = $fila[8];

if ($estadoD==1) {
  $Estado = '<font color="#FF6600"> <strong>  Por Confirmar</strong> </font>';
  $EstadoN0++;
}
elseif ($estadoD==2) {
  $Estado = '<font color="#006600"><strong> Confirmado </strong></font>';
  $EstadoN1++;
}
elseif ($estadoD==3) {
  $Estado = '<font color="#0000FF"> <strong>Asistio </strong></font>';
  $EstadoN2++;
}
elseif ($estadoD==4) {
  $Estado = '<font color="#FF0000"> <strong>No Asistio </strong></font>';
  $EstadoN3++;
}
 
  


                  echo '     <tr>
                  <td  width="5%">'.$Numero.' </td>
                  <td width="20%">'.$fila[1].' </td>
                  <td width="20%">'.$fila[2].'-'.$fila[3].' </td>
                  <td width="20%">'.$fila[4].'  </td>
                  <td width="10%">'.$fila[5].'  </td>
                  <td width="20%">'.$fila[6].' </td>
                  <td width="30%">'.$fila[7].' </td>
                  <td width="20%">'.$Estado.' </td>
                 
                </tr>';

 }

 ?>


            </tbody>
          </table>

             <div>
        <!-- accepted payments column -->
        
<hr>
 
        <div class="col-xs-12">
         <h3> Resumen </h3> 
        </div>


        <div class="col-xs-3">
        <strong>    Por Confirmar : <?php echo $EstadoN0?>  </strong> 
        </div>
        <div class="col-xs-3">
          <strong> Confirmado: <?php echo $EstadoN1?></strong> 
        </div>
        <div class="col-xs-3">
         <strong> Asistio :<?php echo $EstadoN2?></strong> 
        </div>
        <div class="col-xs-3">
         <strong> No Asistio: <?php echo $EstadoN3?></strong> 
        </div>
         
      </div>

      
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
