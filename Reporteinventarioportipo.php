<?php
date_default_timezone_set('America/Bogota');
include("funciones/funciones.php");
include("funciones/conn3.php");

$tipo = $_POST['tipo'];
$ID = $_POST['ID'];


$EstadoN0 = 0;
$EstadoN1 = 0;
$EstadoN2 = 0;
$EstadoN3 = 0;


$queryList = mysqli_query($conn3, "SELECT * FROM config where (ID_Usuario = $ID or ID_Usuario = '{$_SESSION['ID_principal']}')");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {

    $empresaNombre = $rowMotorizado['nombreF'];
    $telefonoF = $rowMotorizado['telefonoF'];
    $direccionF = $rowMotorizado['direccionF'];

    $LogoF = $rowMotorizado['logoF'];

    if (strlen($LogoF) > 0) {
        $Logo = '<img src="' . $Base . '/logos/' . $LogoF . '" height="10%" width="10%">';
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
    <!-- <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"> -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">

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
            <a href='javascript:window.print(); void 0;' class="btn btn-default"><i class="fa fa-print"></i>
                Imprimir</a>
        </div>
    </div>
    <!-- title row -->
    <div class="row">
        <small class="pull-right"> Fecha: <?php echo date("d-m-y") ?></small>
        <div class="col-xs-12">
            <h2 class="page-header">
                <?php echo $Logo ?> <?php echo $empresaNombre ?>
                <small class="pull-right"> Fecha: <?php echo date("d-m-y") ?></small>
            </h2>
        </div>

        <div class="col-xs-12">
            <?php
            if ($tipo <> 0) {
                echo '<br>Tipo: ' . $Tipo;
            } elseif ($tipo == 0) {
                echo '<br>Tipo: Todos';
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

                        <th>Descripción</th>
                        <th>Referencia</th>
                        <th>Lote</th>
                        <th>Serial</th>
                        <th>Tipo</th>
                        <th>Existencia</th>
                        <th>Mínimo</th>
                        <th>Máximo</th>
                        <th>Costo</th>
                        <th>Precio</th>
                        <th>Nota</th>



                    </tr>
                </thead>
                <tbody>
                    <?php
                    // if ($tipo == 0) {
                    //     $queryList = mysqli_query($conn3, "SELECT * FROM  sinvetrios where (usuario_id =$ID or usuario_id ='{$_SESSION['ID_principal']}') order by descripcion asc ");
                    // } elseif ($tipo <> 0) {
                    //     $queryList = mysqli_query($conn3, "SELECT * FROM  sinvetrios where (usuario_id =$ID or usuario_id ='{$_SESSION['ID_principal']}') and tipo = '$tipo' order by descripcion asc ");
                    if ($tipo == 0) {
                        $queryList = mysqli_query($conn3, "SELECT 
    s.ID, 
    s.descripcion, 
    s.ID_principal,  
    COALESCE(sd.existencia, '') AS nuevaExis, 
    sca.tipo AS tiposca, 
    s.descripcion AS descrital,
    sd.id AS SinvdepId,
    sd.existencia AS existencia1,
    sd.fechaVencimiento AS fVencimiento, 
    sd.idDep AS deposito_id
FROM 
    sinvetrios AS s
LEFT JOIN 
    SinvDep AS sd ON s.ID = sd.idSinvetrios
INNER JOIN 
    scategoria sca ON s.tipo = sca.id
WHERE 
    s.ID_principal IS NOT NULL
    AND s.estado = 1
    AND (sd.idDep = '11' OR sca.tipo = 2)
    AND (s.$_SESSION['ID_principal'] = '37' OR s.$_SESSION['ID_principal'] = '37')
    AND (
        (sca.tipo = 6 AND sd.existencia = 0) OR 
        (sca.tipo <> 6 AND sd.existencia > 0)
    )
    AND (
        (sca.tipo = 5 AND sd.existencia = 0) OR 
        (sca.tipo <> 5 AND sd.existencia > 0)
    );
");
                    } elseif ($tipo <> 0) {
                        $queryList = mysqli_query($conn3, "SELECT 
                        s.ID, 
                        s.descripcion, 
                        s.ID_principal,  
                        COALESCE(sd.existencia, '') AS nuevaExis, 
                        sca.tipo AS tiposca, 
                        s.descripcion AS descrital,
                        sd.id AS SinvdepId,
                        sd.existencia AS existencia1,
                        sd.fechaVencimiento AS fVencimiento, 
                        sd.idDep AS deposito_id
                    FROM 
                        sinvetrios AS s
                    LEFT JOIN 
                        SinvDep AS sd ON s.ID = sd.idSinvetrios
                    INNER JOIN 
                        scategoria sca ON s.tipo = sca.id
                    WHERE 
                        s.ID_principal IS NOT NULL
                        AND s.estado = 1
                        AND (sd.idDep = '11' OR sca.tipo = 2)
                        AND (s.$_SESSION['ID_principal'] = '37' OR s.$_SESSION['ID_principal'] = '37')
                        AND (
                            (sca.tipo = 6 AND sd.existencia = 0) OR 
                            (sca.tipo <> 6 AND sd.existencia > 0)
                        )
                        AND (
                            (sca.tipo = 5 AND sd.existencia = 0) OR 
                            (sca.tipo <> 5 AND sd.existencia > 0)
                        );
                    ");
                    }


                    $nrowl = mysqli_num_rows($queryList);
                    while ($row_recordset32 = mysqli_fetch_array($queryList)) {
                        //$ID      = $row_recordset32['ID'];
                    
                        $descripcion = $row_recordset32['descripcion'];
                        $referencia = $row_recordset32['referencia'];
                        $tipo = $row_recordset32['tipo'];
                        $existencia = $row_recordset32['existencia1'];
                        $minimo = $row_recordset32['minimo'];
                        $maximo = $row_recordset32['maximo'];
                        $costo = $row_recordset32['costo'];
                        $precio = $row_recordset32['precio'];
                        $nota = $row_recordset32['nota'];
                        $lote = $row_recordset32['lote'];
                        $serial = $row_recordset32['serial'];


                        $querycat = mysqli_query($conn3, "SELECT * FROM  scategoria where (usuario_id =$ID or usuario_id ='{$_SESSION['ID_principal']}') and id = $tipo");
                        $nrowl = mysqli_num_rows($querycat);
                        while ($row_cat = mysqli_fetch_array($querycat)) {

                            $tipodescripcion = $row_cat['descripcion'];
                        }

                        echo '<tr>
                                     
                                      <td>' . $descripcion . ' </td>
                                      <td>' . $referencia . ' </td>
                                      <td>' . $lote . ' </td>
                                      <td>' . $serial . ' </td>
                                      <td>' . $tipodescripcion . ' </td>
                                      <td>' . $existencia . ' </td>
                                      <td>' . $minimo . ' </td>
                                      <td>' . $maximo . ' </td>
                                      <td>' . $costo . ' </td>
                                      <td>' . $precio . ' </td>
                                      <td>' . $nota . ' </td>
                                      </tr>';
                    }

                    ?>


                </tbody>
            </table>



        </div>
        <!-- /.col -->
    </div>

    </div>
    <!-- ./wrapper -->
</body>

</html>
<style>
    @media print {
        .no-print {
            display: none;
        }
    }
</style>