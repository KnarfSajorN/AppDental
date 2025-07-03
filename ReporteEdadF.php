<?php
date_default_timezone_set('America/Bogota');
include("funciones/funciones.php");





$desde = $_POST['desde'];
$hasta = $_POST['hasta'];
// $tipo = $_POST['tipo'];
$ID = $_POST['ID'];







$queryList = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = $ID");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {

    $empresaNombre      = $rowMotorizado['nombreF'];
    $LogoF               = $rowMotorizado['logoF'];

    if (strlen($LogoF) > 0) {
        $Logo = '<img src="' . $Base . '/logos/' . $LogoF . '" height="10%" width="10%">';
    }
}


            function Funcion_Edad_Paciente($fecha_nacimiento)
            {
                date_default_timezone_set('America/Bogota');
                $nacimiento = new DateTime($fecha_nacimiento);
                $ahora = new DateTime(date("Y-m-d"));
                $diferencia = $ahora->diff($nacimiento);

                $Respuesta = [];

                if ($nacimiento <= $ahora) {

                    $Respuesta = [];
                    if ($diferencia->format("%y") > 7) {
                        $Respuesta["Años"] = $diferencia->format("%y");
                    } elseif ($diferencia->format("%y") <= 7 and $diferencia->format("%y") >= 1) {
                        $Respuesta["Años"] = $diferencia->format("%y");
                        $Respuesta["Meses"] = $diferencia->format("%m");
                    } elseif ($diferencia->format("%y") < 1) {
                        $Respuesta["Meses"] = $diferencia->format("%m");
                        $Respuesta["Dias"] = $diferencia->format("%d");
                        if ($Respuesta["Meses"] == "0" and $Respuesta["Dias"] == "0") {
                            $Respuesta["Respuesta"] = "Dia Actual de Nacimiento";
                        }
                    }

                    foreach ($Respuesta as $key => $value) {
                        if ($value == "0") {
                            unset($Respuesta[$key]);
                        }
                    }
                } else {
                    $Respuesta["Respuesta"] = "La Fecha de Nacimiento es Mayor a la Actual";
                }
                return $Respuesta;
            }

            function CalculoEdadPaciente($fechanacimiento)
            {
                $Edad = Funcion_Edad_Paciente("{$fechanacimiento}");
                $Mensaje = "";
                foreach ($Edad as $key => $value) {
                    $Mensaje .= "{$value} {$key}, ";
                }
                $Mensaje = trim($Mensaje, ', ');
                return $Mensaje . ".";
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

<body>
    <!-- Main content -->
    <div class="row no-print">
        <div class="col-xs-12">
            <a href="<?php echo $Base; ?>Reportesinventario" class="btn btn-default"> Regresar</a>
            <a href='javascript:window.print(); void 0;' class="btn btn-default"><i class="fa fa-print"></i> Imprimir</a>
        </div>
    </div>
    <!-- title row -->
    <div class="row">
        <div class="col-xs-12">
            <h2 class="page-header">
                <?php echo $Logo ?> <?php echo $empresaNombre ?>
                <small class="pull-right"> Fecha: <?php echo date("d-m-y") ?></small>
            </h2>
        </div>

        <div class="col-xs-12">

            <?php echo 'Desde: ' . $desde . '<br> Hasta:' . $hasta ?>
            <?php
            $tipo = $_POST['sexo'];

            if ($_POST['tipo'] <> 0) {
                echo '<br>Cliente: ' . $tipo;
            } elseif ($_POST['tipo'] == 0) {
                echo '<br> Todos';
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

                        <th> Numero del Paciente</th>
                        <th> Documento de Identidad </th>
                        <th> Sexo </th>
                        <th> Edad </th>




                    </tr>
                </thead>
                <tbody>
                    <?php

                    $tipo = $_POST['sexo'];
                    if ($tipo == 1) {
                        $andtipo = " and genero = 'M' ";
                    } elseif ($tipo == 2) {
                        $andtipo = " and genero = 'F' ";
                    } else {
                        $andtipo = "";
                    }

                    // $categoria = $_POST['categoria'];
                    // if ($categoria > 0) {
                    //     $andCategoria = " and categoria = $categoria ";
                    // } else {
                    //     $andCategoria = "";
                    // }

                    // $queryListC = mysqli_query($conn3, "SELECT * from cliente where fecha BETWEEN '$desde' and '$hasta' $andtipo  ");
                    //                 $queryList1 = mysqli_query($conn3, "SELECT cliente_id,nombre_cliente,genero,fechaNacimiento, 
                    //                 (
                    // 	TIMESTAMPDIFF(YEAR, fechaNacimiento, CURDATE()) < 20
                    // ) AS nacimiento1,
                    // (
                    // 	TIMESTAMPDIFF(YEAR, fechaNacimiento, CURDATE()) BETWEEN 21 AND 30
                    // ) AS nacimiento2,
                    // (
                    // 	TIMESTAMPDIFF(YEAR, fechaNacimiento, CURDATE()) BETWEEN 31 AND 40
                    // ) AS nacimiento3,
                    // (
                    // 	TIMESTAMPDIFF(YEAR, fechaNacimiento, CURDATE()) BETWEEN 41 AND 50
                    // ) AS nacimiento4,

                    // (
                    // 	TIMESTAMPDIFF(YEAR, fechaNacimiento, CURDATE()) > 50
                    // ) AS nacimiento5
                    // FROM cliente WHERE (
                    // 	TIMESTAMPDIFF(YEAR, fechaNacimiento, CURDATE()) <20
                    // ) = 1  AND
                    // (
                    // 	TIMESTAMPDIFF(YEAR, fechaNacimiento, CURDATE()) BETWEEN 21 AND 30
                    // ) = 1
                    // (
                    // 	TIMESTAMPDIFF(YEAR, fechaNacimiento, CURDATE()) BETWEEN 31 AND 40
                    // ) = 1
                    // (
                    // 	TIMESTAMPDIFF(YEAR, fechaNacimiento, CURDATE()) BETWEEN 41 AND 50
                    // ) = 1
                    // (
                    // 	TIMESTAMPDIFF(YEAR, fechaNacimiento, CURDATE()) > 50
                    // ) = 1
                    // AND DATE(Fechar) BETWEEN CAST('$desde' AS DATE) AND CAST('$hasta' AS DATE)");
                    $queryListC = mysqli_query($conn3, "SELECT * FROM cliente WHERE  DATE(Fechar) BETWEEN CAST('$desde' AS DATE) AND CAST('$hasta' AS DATE) GROUP BY fechaNacimiento ORDER BY cliente_id ASC");
                    $nrowl = mysqli_num_rows($queryListC);
                    while ($rowC = mysqli_fetch_array($queryListC)) {
                        $cliente_id = $rowC['cliente_id'];

                        $nombre_cliente = funcionMaster($cliente_id, 'cliente_id', 'nombre_cliente', 'cliente');
                        $CODI_CLIENTE = funcionMaster($cliente_id, 'cliente_id', 'CODI_CLIENTE', 'cliente');
                        $genero = funcionMaster($cliente_id, 'cliente_id', 'genero', 'cliente');
                        $fechaNacimiento = funcionMaster($cliente_id, 'cliente_id', 'fechaNacimiento', 'cliente');
                        if ($genero == 'M') {
                            $genero = "Masculino";
                        }
                        if ($genero == 'F') {
                            $genero = "Femenino";
                        }


                        echo ' <tr>
                        <td width="25%">' . $nombre_cliente . ' </td>
                        <td width="25%">' . $CODI_CLIENTE  . ' </td>
                        <td width="25%">' . $genero  . ' </td>
                        <td width="25%">' . CalculoEdadPaciente($fechaNacimiento) . '</td>
                      
                    </tr>';
                    }

                    ?>


                </tbody>
            </table>




        </div>
        <!-- /.col -->
    </div>
    <div class="col-md-12" align="center">
        <div id="chart"></div>
    </div>
    <!-- /.row -->


    <!-- /.row -->

    <!-- this row will not appear when printing -->


    <!-- /.content -->
    </div>
    <!-- ./wrapper -->
</body>
<?php
// $array = array();

// $queryList = mysqli_query($conn3, "SELECT genero, COUNT(*) AS total FROM cliente GROUP BY genero");
// $nrowl = mysqli_num_rows($queryList);
// while ($row_recordset32A = mysqli_fetch_assoc($queryList)) {
//     array_push($array, $row_recordset32A);
// }

// $array1 = array();

// $queryList1 = mysqli_query($conn3, "SELECT  COUNT(*) AS total1 FROM cliente ");
// $nrowl = mysqli_num_rows($queryList1);
// while ($row_recordset32A1 = mysqli_fetch_assoc($queryList1)) {
//     array_push($array1, $row_recordset32A1);
// }

$queryList1 = mysqli_query($conn3, "SELECT 
                     
	 	(TIMESTAMPDIFF(YEAR, fechaNacimiento, CURDATE()) < 20
     ) AS nacimiento, COUNT(DISTINCT(cliente_id))  AS total
    FROM cliente WHERE (
		TIMESTAMPDIFF(YEAR, fechaNacimiento, CURDATE()) < 20
     ) = 1  AND DATE(Fechar) BETWEEN CAST('$desde' AS DATE) AND CAST('$hasta' AS DATE)");

$queryList2 = mysqli_query($conn3, "SELECT 
    (
		TIMESTAMPDIFF(YEAR, fechaNacimiento, CURDATE()) BETWEEN 21 AND 30
    ) AS nacimiento, COUNT(DISTINCT(cliente_id)) AS total
	FROM cliente WHERE (
		TIMESTAMPDIFF(YEAR, fechaNacimiento, CURDATE()) BETWEEN 21 AND 30
    ) = 1  AND DATE(Fechar) BETWEEN CAST('$desde' AS DATE) AND CAST('$hasta' AS DATE) ");

$queryList3 = mysqli_query($conn3, "SELECT 
           
	 	(
		TIMESTAMPDIFF(YEAR, fechaNacimiento, CURDATE()) BETWEEN 31 AND 40
    ) AS nacimiento, COUNT(DISTINCT(cliente_id)) AS total
	FROM cliente WHERE (
		TIMESTAMPDIFF(YEAR, fechaNacimiento, CURDATE()) BETWEEN 31 AND 40
    ) = 1  AND DATE(Fechar) BETWEEN CAST('$desde' AS DATE) AND CAST('$hasta' AS DATE)");

$queryList4 = mysqli_query($conn3, "SELECT 
                  
	 	(
		TIMESTAMPDIFF(YEAR, fechaNacimiento, CURDATE()) BETWEEN 41 AND 50
    ) AS nacimiento, COUNT(DISTINCT(cliente_id)) AS total
	FROM cliente WHERE (
		TIMESTAMPDIFF(YEAR, fechaNacimiento, CURDATE()) BETWEEN 41 AND 50
    ) = 1  AND DATE(Fechar) BETWEEN CAST('$desde' AS DATE) AND CAST('$hasta' AS DATE)");

$queryList5 = mysqli_query($conn3, "SELECT 
                     
	 	(
		TIMESTAMPDIFF(YEAR, fechaNacimiento, CURDATE()) > 50
    ) AS nacimiento, COUNT(DISTINCT(cliente_id)) AS total
	FROM cliente WHERE (
		TIMESTAMPDIFF(YEAR, fechaNacimiento, CURDATE()) > 50
    ) = 1  AND DATE(Fechar) BETWEEN CAST('$desde' AS DATE) AND CAST('$hasta' AS DATE)");


?>

</html>
<!-- <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script type="text/javascript">
    // pie - donut 
    let data = JSON.parse('<?= utf8_decode(json_encode($array)) ?>');
    let data1 = JSON.parse('<?= utf8_decode(json_encode($array1)) ?>');
    let date = [];
    console.log(data);
    data.forEach(function(element) {

        date.push({
            genero: element.genero,
            total: element.total,
        })
    });
    console.log(date[0].total);


    var options = {
        series: [date[0].total, date[1].total,'100%'],



        chart: {
            width: 880,
            type: 'donut',
        },
        // labels: ['Femenino', 'Masculino'],
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 200
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };

    var chart = new ApexCharts(document.querySelector("#chart"), options);
    chart.render();
</script> -->

<script src="https://www.gstatic.com/charts/loader.js">
</script>
<script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Rango', 'total'],
            <?php

            while ($row1 = mysqli_fetch_array($queryList1)) {
$count1+=$row1["total"];
                // echo "['" . $genero . "', " . $row["total"] . "],";
                echo "['< 20 = ".$count1."', " . $row1["total"] . "],";
            }
            while ($row2 = mysqli_fetch_array($queryList2)) {
                $count2 += $row2["total"];
                // echo "['" . $genero . "', " . $row["total"] . "],";
                echo "['21 - 30 = " . $count2 . "', " . $row2["total"] . "],";
            }

            while ($row3 = mysqli_fetch_array($queryList3)) {
                $count3 += $row3["total"];
                // echo "['" . $genero . "', " . $row["total"] . "],";
                echo "['31 - 40 = " . $count3 . "', " . $row3["total"] . "],";
            }
            while ($row4 = mysqli_fetch_array($queryList4)) {
                $count4 += $row4["total"];
                // echo "['" . $genero . "', " . $row["total"] . "],";
                echo "['41 - 50 = " . $count4 . "', " . $row4["total"] . "],";
            }
            while ($row5 = mysqli_fetch_array($queryList5)) {
                $count5 += $row5["total"];
                // echo "['" . $genero . "', " . $row["total"] . "],";
                echo "['> 50 = " . $count5 . "', " . $row5["total"] . "],";
            }

            ?>


        ]);
        var options = {
            legend: {
                position: 'right',
                alignment: 'center'
            },
            width: 1000,
            height: 1000,
            title: 'DISTRIBUCION POR EDAD',
            // colors: ['#efa94a', '#779ECB'],
            is3D: true,
            pieHole: 0.4
        };
        var chart = new google.visualization.PieChart(document.getElementById('chart'));
        // var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.draw(data, options);
    }
</script>