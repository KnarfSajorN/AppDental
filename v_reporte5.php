<?php
date_default_timezone_set('America/Bogota');
include("conexiones/conexion.php");
include("funciones/conexiones.php");
include("funciones/funciones.php");
$con=conectar();
$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));

$desde = $_POST['desde'];
$hasta = $_POST['hasta'];

$tipo = $_POST['tipo']; 
$ID = $_POST['ID']; 

$EstadoN0 = 0;
$EstadoN1 = 0;
$EstadoN2 = 0;
$EstadoN3 = 0;

$numero = 0;
$vacuna = 0;

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
      <div class="row no-print">
        <div class="col-xs-12">  
          <a href="<?php echo $Base;?>Reportesinventario"   class="btn btn-default">  Regresar</a>
          <a href='javascript:window.print(); void 0;'   class="btn btn-default"><i class="fa fa-print"></i> Imprimir</a>
        </div>
      </div>
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <?php echo $Logo?> <?php echo $empresaNombre?>
            <small class="pull-right"> Fecha: <?php echo date("d-m-y")?></small>
          </h2>
        </div>

        <div class="col-xs-12">
              <?php echo 'Desde: '.$desde .'<br> Hasta:'.$hasta?>
              <?php
              if ($tipo <> 0) 
              {
               echo '<br>Estado: '.$Tipo;
              }
              elseif ($tipo == 0) 
              {
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
        <th>Fac Nº</th>
        <th>Hora </th>
        <th>Carne </th>


        <?php

          $conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));
          
          $queryList1=mysqli_query($conn3,"SELECT * FROM  v_servicios where usuario_id = $ID order by id");
          $nrowl1=mysqli_num_rows($queryList1);
          while($rowMotorizado1=mysqli_fetch_array($queryList1))
          {
              $siglas             =$rowMotorizado1['siglas'];
              echo '<th> '.$siglas.' </th>';
          }
        ?>
     


        <th>Usuario</th>
        <th>Documento </th>
        <th>Telefono  </th>
        <th>Empresa  </th>
        <th>Dosis  </th>
        <th>Valor  </th>
        <th>Cartera  </th>
          
            </tr>
            </thead>
            <tbody>
<?php
 if ($tipo == 0) 
{
  $queryList2=mysqli_query($conn3,"SELECT * FROM  v_historiaClinica3 where usuario_id = $ID and factura_id > 0 and aplicada = 1 and fecha BETWEEN '$desde' and '$hasta' order by hora");
}
elseif ($tipo > 0) 
{
  $queryList2=mysqli_query($conn3,"SELECT * FROM  v_historiaClinica3 where usuario_id = $ID and clienteE_id = $tipo and factura_id > 0 and aplicada = 1 and fecha BETWEEN '$desde' and '$hasta' order by hora");
}                  




      $nrowl=mysqli_num_rows($queryList2);
      while($row2=mysqli_fetch_array($queryList2))
      {
      $numero++;
      $dosis = 0;
      $vacuna = 0;
      $cliente_id       = $row2['cliente_id'];
      $clienteE_id       = $row2['clienteE_id'];
      $fecha            = $row2['fecha'];
      $hora             = $row2['hora'];
      $vacuna_id        = $row2['vacuna_id'];
      $factura_id        = $row2['factura_id'];
      $precio        = $row2['precio'];



      $queryList3=mysqli_query($conn3,"SELECT * FROM  v_cliente where id = $cliente_id");
      $nrowl=mysqli_num_rows($queryList3);
      while($row3=mysqli_fetch_array($queryList3))
      {
    
        $nombre_cliente       = $row3['nombre_cliente'];
        $carne       = $row3['carne'];
        $CODI_CLIENTE       = $row3['CODI_CLIENTE'];
        $fn       = $row3['fn'];
        $tiposSangre       = $row3['tiposSangre'];
        $direccion_cliente       = $row3['direccion_cliente'];
        $telefono_cliente       = $row3['telefono_cliente'];
        $entidadSalud       = $row3['entidadSalud'];

      }
 
     

      $queryList3=mysqli_query($conn3,"SELECT * FROM  v_clienteE where id = $clienteE_id");
      $nrowl=mysqli_num_rows($queryList3);
      while($row3=mysqli_fetch_array($queryList3))
      {
    
        $nombreE       = $row3['nombre'];
       

      }
 
     








   
  echo "<tr>
        <td>$factura_id</td>
        <td>$hora</td>
        <td>$carne</td>";
 
       $queryList4=mysqli_query($conn3,"SELECT * FROM  v_servicios  where  usuario_id = $ID order by id");
        $nrowl4=mysqli_num_rows($queryList4);
        while($rowMotorizado4=mysqli_fetch_array($queryList4))
        {
            $id4             =$rowMotorizado4['id'];
           
          if ($id4 == $vacuna_id ) 
          {
          echo '<td> X </td>';
          $dosis++;
          }
          else 
          { 
          echo '<td>   </td>'; 
          } 
 

        }

        




  echo "<td>$nombre_cliente </td>
        <td>$CODI_CLIENTE </td>
        <td>$telefono_cliente </td>
        <td>$nombreE </td>
        <td>$dosis </td>
        <td>$precio </td>
        <td>0 </td>";

  
    echo "</tr>";

$total = $total+$precio;

 }

 ?>


            </tbody>
          </table>
Gastos 
      <table class="table table-striped" border="1">
            <thead>
            <tr style="background: #A4A4A4">
        <th>Descripcion </th>
        <th>Fecha</th>
        <th>Monto </th>
      </tr>
<?php


$queryList2=mysqli_query($conn3,"SELECT * FROM  v_gastos where usuario_id = $ID and fecha BETWEEN '$desde' and '$hasta' order by descripcion");
 
 
      $nrowl=mysqli_num_rows($queryList2);
      while($row2=mysqli_fetch_array($queryList2))
      {
 
   //   $tGastos = 0;
      $valor       = $row2['valor'];
      $descripcion       = $row2['descripcion'];
      $fecha       = $row2['fecha'];


     echo "<tr> 
     <td>$descripcion </td>
        <td>$fecha </td>
        <td>$valor </td> ";
echo "</tr>";
$tGastos = $tGastos + $valor;

}
?>
       
        </tbody>
      </table>
<br>
Total Ingresos : <?php echo number_format("$total")?><br>
Total Gastos : <?php echo number_format("$tGastos")?><br>

 

      
        </div>
        <!-- /.col -->
      </div>
     
</div>
<!-- ./wrapper -->
</body>
</html>
