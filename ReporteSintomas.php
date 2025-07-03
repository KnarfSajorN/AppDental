<?php
date_default_timezone_set('America/Bogota');
include("funciones/funciones.php");





$desde = $_POST['desde'];
$hasta = $_POST['hasta'];
// $tipo = $_POST['tipo'];
$ID = $_POST['ID'];







$queryList = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = $ID");
// $nrowl = mysqli_num_rows($queryList);
if ($queryList) {
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {

        $empresaNombre      = $rowMotorizado['nombreF'];
        $LogoF               = $rowMotorizado['logoF'];

        if (strlen($LogoF) > 0) {
            $Logo = '<img src="' . $Base . '/logos/' . $LogoF . '" height="10%" width="10%">';
        }
    }
}





function funcionMaster1($filtro, $campoFiltrar, $campoImprimir, $tabla)
{
    include 'funciones/conn3.php';

    $query_master = mysqli_query($conn3, "SELECT * FROM $tabla where $campoFiltrar = '$filtro'");

    // $nrowl = mysqli_num_rows($query_master);
    if ($query_master) {
        while ($row_master = mysqli_fetch_array($query_master)) {

            $text = $row_master[$campoImprimir];
        }
    }
    

    return  $text;
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

                        <th> Sintomas</th>
                        <th> Número de trabajadores</th>
                        <!-- <th> Documento de Identidad </th>
                        <th> Sexo </th> -->






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
                    $queryListC = mysqli_query($conn3, "SELECT COUNT(cliente_id) AS total,SintomaId,cliente_id FROM Reporte_Sintomas WHERE DATE(Fecha_Registro) BETWEEN CAST('$desde' AS DATE) AND CAST('$hasta' AS DATE) GROUP BY SintomaId ");
                    // $queryListC = mysqli_query($conn3, "SELECT * FROM  cliente WHERE DATE(fechar) BETWEEN CAST('$desde' AS DATE) AND CAST('$hasta' AS DATE) $andtipo ");
                    // $nrowl = mysqli_num_rows($queryListC);
                    if ($queryListC) {
                    while ($rowC = mysqli_fetch_array($queryListC)) {
                        $cliente_id = $rowC['cliente_id'];
                        $sintomas = $rowC['SintomaId'];
                        $total = $rowC['total'];


                        // $nombre_cliente = funcionMaster($cliente_id, 'cliente_id', 'nombre_cliente', 'cliente');
                        // $CODI_CLIENTE = funcionMaster($cliente_id, 'cliente_id', 'CODI_CLIENTE', 'cliente');
                        // $genero = funcionMaster($cliente_id, 'cliente_id', 'genero', 'cliente');

                        // $contador = 0;
                        // $sintomas  = explode(",", $sintomas);
                        // foreach ($sintomas  as $value) {
                        //     $contador++;
                        //     if ($sintomas != '' ) :
                        //         echo '<tr><td>' . funcionMaster1($value, 'id', 'Nombre', 'antecedentes_PF') . '</td><td>' . $total . '</td></tr>';
                        //     endif;
                        // }

                        echo ' <tr>
                        <td width="25%">' . funcionMaster1($sintomas, 'id', 'Nombre', 'antecedentes_PF') . ' </td>
                        <td width="25%">' . $total . ' </td>';





                        echo '    
                    </tr>';
                    }}

                    ?>


                </tbody>
            </table>




        </div>
        <!-- /.col -->
    </div>
    <!-- <div class="col-md-12" align="center">
        <div id="chart"></div>
    </div> -->
    <!-- /.row -->


    <!-- /.row -->

    <!-- this row will not appear when printing -->


    <!-- /.content -->
    </div>
    <!-- ./wrapper -->
</body>
<?php
// $queryList1 = mysqli_query($conn3, "SELECT COUNT(entidad_id) AS total,entidad_id AS Eps FROM cliente WHERE  entidad_id=1");
$queryList1 = mysqli_query($conn3, "SELECT COUNT(AntPId) AS total,AntPId AS AntPId FROM Reporte_AntecedentesP WHERE DATE(Fecha_Registro) BETWEEN CAST('$desde' AS DATE) AND CAST('$hasta' AS DATE) group by AntPId");
// $queryList2 = mysqli_query($conn3, "SELECT COUNT(entidad_id) AS total,entidad_id AS Eps FROM cliente WHERE  entidad_id=2");
// $queryList3 = mysqli_query($conn3, "SELECT COUNT(entidad_id) AS total,entidad_id AS Eps FROM cliente WHERE  entidad_id=3");
// $queryList4 = mysqli_query($conn3, "SELECT COUNT(entidad_id) AS total,entidad_id AS Eps FROM cliente WHERE  entidad_id=4");
// $queryList5 = mysqli_query($conn3, "SELECT COUNT(entidad_id) AS total,entidad_id AS Eps FROM cliente WHERE  entidad_id=5");
// $queryList6 = mysqli_query($conn3, "SELECT COUNT(entidad_id) AS total,entidad_id AS Eps FROM cliente WHERE  entidad_id=6");
// $queryList7 = mysqli_query($conn3, "SELECT COUNT(entidad_id) AS total,entidad_id AS Eps FROM cliente WHERE  entidad_id=7");

// $queryList2 = mysqli_query($conn3, "SELECT FROM cliente WHERE  DATE(fechar) BETWEEN CAST('$desde' AS DATE) AND CAST('$hasta' AS DATE)");

// $queryList3 = mysqli_query($conn3, "SELECT FROM cliente WHERE  DATE(fechar) BETWEEN CAST('$desde' AS DATE) AND CAST('$hasta' AS DATE)");

// $queryList4 = mysqli_query($conn3, "SELECT FROM cliente WHERE  DATE(fechar) BETWEEN CAST('$desde' AS DATE) AND CAST('$hasta' AS DATE)");

// $queryList5 = mysqli_query($conn3, "SELECT FROM cliente WHERE DATE(fechar) BETWEEN CAST('$desde' AS DATE) AND CAST('$hasta' AS DATE)");
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
<!-- <script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['genero', 'total'],
            <?php
            if ($queryList) {
                while ($row = mysqli_fetch_array($queryList)) {
                    $genero = $row["genero"];
                    if ($genero == "M") {
                        $genero = "Masculino";
                    }
                    if ($genero == "F") {
                        $genero = "Femenino";
                    }
                    // echo "['" . $genero . "', " . $row["total"] . "],";
                    echo "['" . $genero . "', " . $row["total"] . "],";
                }
            }
            
            // while ($row = mysqli_fetch_array($queryList1)) {
            //     $genero = $row["genero"];
            //     if ($genero == "M") {
            //         $genero = "Masculino";
            //     }
            //     if ($genero == "F") {
            //         $genero = "Femenino";
            //     }
            //     // echo "['" . $genero . "', " . $row["total"] . "],";
            //     echo "['" . $genero . "', " . $row["total"] . "],";
            // }

            ?>


        ]);
        var options = {
            legend: {
                position: 'bottom',

            },
            width: 1000,
            height: 1000,
            title: 'DISTRIBUCION POR SEXO',
            colors: ['#efa94a', '#779ECB'],
            is3D: true,
            pieHole: 0.4
        };
        var chart = new google.visualization.PieChart(document.getElementById('chart'));
        // var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.draw(data, options);
    }
</script> -->

<!-- <script type="text/javascript">
    google.charts.load("current", {
        packages: ["corechart"]
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ["Antecedentes Personales", "Total"],
            // ['2014', 1000],
            <?php

            if ($queryList1) {
                while ($row1 = mysqli_fetch_array($queryList1)) {
                    // $count1 += $row1["total"];
                    // echo "['" . $genero . "', " . $row["total"] . "],";
                    if ($row1['AntPId'] != '' && $row1['AntPId'] > 0) {
                        echo "[' " . funcionMaster1($row1["AntPId"], 'id', 'Nombre', 'antecedentes_PF') . "', " . $row1["total"] . "],";
                    }
                }
            }
            


            ?>
        ]);

        var formatPercent = new google.visualization.NumberFormat({
            pattern: '#,##0.0%'
        });

        function getValueAt(column, dataTable, row) {
            return dataTable.getFormattedValue(row, column);
        }

        var view = new google.visualization.DataView(data);
        view.setColumns([0, 1,
            {
                calc: getValueAt.bind(undefined, 1),
                sourceColumn: 1,
                type: "string",
                role: "annotation"
            },

        ]);





        var options = {
            title: "ANTECEDENTES PATOLOGICOS",
            width: 1000,
            height: 1000,

            series: {
                0: {
                    type: 'bars',
                    color: 'blue',
                    dataOpacity: 0.6
                },
                1: {
                    type: 'scatter',
                    color: 'blue',
                    dataOpacity: 0.6
                }
            },
            legend: {
                position: "none"
            },
            bars: 'horizontal',
            bar: {
                groupWidth: "50%"
            },

        };
        var chart = new google.visualization.BarChart(document.getElementById("chart"));
        chart.draw(view, options);
    }
</script> -->