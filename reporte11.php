<?php
date_default_timezone_set('America/Bogota');

include("funciones/conn3.php");
include("funciones/funciones.php");

$desde  = $_POST['desde'];
$hasta  = $_POST['hasta'];
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
                $Logo = '<img src="'.$Base.'/logos/'.$LogoF.'" height="10%" width="10%">'; 
              }
            

            }




   ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> <?php echo $empresaNombre ?> </title>
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
<style>
.pull-right{
    margin-right: 20px;
}
</style>
<body>
    <!-- Main content -->
    <div class="row no-print">
        <div class="col-xs-12">
            <a href="<?php echo $Base?>PanelC_Encuestas.php" class="btn btn-default"> Regresar</a>
            <a href='javascript:window.print(); void 0;' class="btn btn-default"><i class="fa fa-print"></i>
                Imprimir</a>
        </div>
    </div>
    <!-- title row -->
    <div>
        <div class="col-xs-12">
            <h2 class="page-header">
            <?php echo $Logo?> <?php echo $empresaNombre?>
            <small class="pull-right"> Fecha: <?php echo date("d-m-y")?></small>
          </h2>
        </div>

        <div class="col-xs-12">

            <?php echo 'Desde: '.$desde .'<br> Hasta:'.$hasta?>



        </div>


        <!-- /.col -->
    </div>
    <!-- info row -->

    <!-- Table row -->
    <div>
        <div class="col-xs-12">
            <table class="table table-striped" border="1">
                <thead>
                    <tr style="background: #A4A4A4">
                        <th>#</th>
                        <th> Doctor </th>
                        <th> Fecha - Hora </th>
                        <th> Paciente </th>
                        <th> Teléfono </th>
                        <th> Correo </th>
                        <th width="20%"> Motivo </th>
                        <th> Calificación </th>
                        <th> Comentario </th>



                    </tr>
                </thead>
                <tbody>

                    <?php
$resultado = mysqli_query($conn3,"SELECT * FROM citas WHERE fecha BETWEEN '$desde' AND '$hasta' AND c_puntaje > '' ");

$Numero = 0;
$totalCitas = 0;

while ($fila = mysqli_fetch_array($resultado)) {
    $Numero++;
    $totalCitas++;

    echo '     <tr>
        <td  width="5%">'.$Numero.' </td>
        <td width="20%">'.funcionMaster($fila[1], 'ID', 'NOMBRE_USUARIO', 'usuarios').' </td>
        <td width="10%">'.$fila[2].'-'.$fila[3].' </td>
        <td width="20%">'.$fila[4].'  </td>
        <td width="10%">'.$fila[5].'  </td>
        <td width="20%">'.$fila[6].' </td>
        <td width="20%">'.$fila[7].' </td>
        <td width="20%">'.$fila[29].' </td>
        <td width="20%">'.$fila[28].' </td>
    </tr>';
}

// Obtener el promedio mensual de citas
$query = "SELECT MONTH(fecha) AS mes, COUNT(*) AS total_citas FROM citas WHERE fecha BETWEEN '$desde' AND '$hasta' AND c_puntaje > '' GROUP BY MONTH(fecha)";
$resultado_promedio = mysqli_query($conn3,$query);

$promedio_mensual = array();
while ($fila_promedio = mysqli_fetch_assoc($resultado_promedio)) {
    $promedio_mensual[$fila_promedio['mes']] = $fila_promedio['total_citas'];
}

// Obtener el promedio de puntuaciones en el rango de fechas dado
$query_promedio = "SELECT AVG(c_puntaje) AS promedio_puntuaciones FROM citas WHERE fecha BETWEEN '$desde' AND '$hasta'  AND c_puntaje >= 1 AND c_puntaje <= 5";
$resultado_promedio_puntuaciones = mysqli_query($conn3,$query_promedio);
$fila_promedio_puntuaciones = mysqli_fetch_assoc($resultado_promedio_puntuaciones);
$promedio_puntuaciones = $fila_promedio_puntuaciones['promedio_puntuaciones'];

// Imprimir los resultados
// echo "Total de citas: $totalCitas<br>";
// echo "Promedio mensual de citas:<br>";
// foreach ($promedio_mensual as $mes => $total_citas) {
//     echo "Mes $mes: $total_citas citas<br>";
// }

// echo "Promedio de puntuaciones: $promedio_puntuaciones";
?>





                </tbody>
            </table>

            <div>
                <!-- accepted payments column -->

                <hr>

                <div class="col-xs-12">
                    <h3> Resumen </h3>
                </div>

                <div class="col-md-3" style="font-size:17px">
                    <p><strong style="color=green"> Promedio:</strong>
                        <?php echo number_format($promedio_puntuaciones, 1); ?></p>
                </div>
                <div class="col-md-3" style="font-size:17px">
                    <p><strong> Cantidad de Pacientes Encuestados:</strong>
                        <?php echo $totalCitas; ?></p>
                </div>
            </div>


        </div>
        
    </div>
    
    </div>
 
</body>

</html>
<style>
@media print{
  .no-print{
    display:none;
  }
}
</style>