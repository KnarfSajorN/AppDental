<?php

// verificar tablas creadas
include '../header.php';
include '../menu.php';
$ID = $_SESSION['ID'];

// -------------
// - Get POST 
// -------------

if ($_POST) {
    $tipo = $_POST['tipo']; // tipo de reporte para las gráficas

    switch ($tipo) {
        case 'Empresas Registradas':
            $fechaD = $_POST['fechaD'];
            $fechaH = $_POST['fechaH'];
            $estado = $_POST['estado'];

            $queryTable = "SELECT *, if (activo = 1, 'Activo', 'Inactivo') as estado  FROM nominaEmpresas
            where 1=1
            " . ($estado == '99' ? "" : " and estado = '" . $estado . "'") . "
            " . ($fechaD ? " and fechaRegistro >= '" . $fechaD . "'" : "") . "
            " . ($fechaH ? " and fechaRegistro <= '" . $fechaH . "'" : "") . "
            order by fechaRegistro asc
            ";

            $columnsShow = [
                'Código' => 'siglas',
                'Nombre' => 'nombre',
                'Documento' => ['tipoDocumento', 'documento'],
                'Dirección' => 'direccion',
                'Teléfono' => 'telefono',
                'Correo' => 'correo',
                'Fecha de Registro' => 'fechaRegistro',
                'Estado' => 'estado',
            ];

            $tablePrint = true;

            $queryChart = "SELECT substring(fechaRegistro,1,7) as x, count(id) as y FROM nominaEmpresas
            where 1=1
            " . ($estado == '99' ? "" : " and estado = '" . $estado . "'") . "
            " . ($fechaD ? " and fechaRegistro >= '" . $fechaD . "'" : "") . "
            " . ($fechaH ? " and fechaRegistro <= '" . $fechaH . "'" : "") . "
            group by substring(fechaRegistro,1,7)
            order by substring(fechaRegistro,1,7) asc
            ";            
            
            $chartPrint = true;
            break;

        case 'Empresas empleados [Totales]':
            $empresa = $_POST['empresa'];
            $estado = $_POST['estado'];
            $tipo_documento = $_POST['tipo_documento'];
            $estado_civil = $_POST['estado_civil'];
            $tipo_sangre = $_POST['tipo_sangre'];

            $queryTable = "SELECT count(id) as total, (select concat(nombre, ' - ', tipoDocumento, ' ', documento) from nominaEmpresas where nominaEmpresas.id = nominaEmpresasPersonal.idEmpresa) as empresa 
            from nominaEmpresasPersonal
            where 1=1
            " . ($estado == '99' ? "" : " and estado = '" . $estado . "'") . "
            " . ($empresa == '0' ? "" : " and idEmpresa = '" . $empresa . "'") . "
            " . ($tipo_documento == '0' ? "" : " and tipo_documento = '" . $tipo_documento . "'") . "
            " . ($estado_civil == '0' ? "" : " and estado_civil = '" . $estado_civil . "'") . "
            " . ($tipo_sangre == '0' ? "" : " and tipo_sangre = '" . $tipo_sangre . "'") . "
            group by idEmpresa
            ";

            $columnsShow = [
                'Empresa' => 'empresa',
                'Total de empleados' => 'total',
            ];

            $tablePrint = true;

            $queryChart = "SELECT count(id) as y, (select concat(nombre, ' - ', tipoDocumento, ' ', documento) from nominaEmpresas where nominaEmpresas.id = nominaEmpresasPersonal.idEmpresa) as x
            from nominaEmpresasPersonal
            where 1=1
            " . ($estado == '99' ? "" : " and estado = '" . $estado . "'") . "
            " . ($empresa == '0' ? "" : " and idEmpresa = '" . $empresa . "'") . "
            " . ($tipo_documento == '0' ? "" : " and tipo_documento = '" . $tipo_documento . "'") . "
            " . ($estado_civil == '0' ? "" : " and estado_civil = '" . $estado_civil . "'") . "
            " . ($tipo_sangre == '0' ? "" : " and tipo_sangre = '" . $tipo_sangre . "'") . "
            group by idEmpresa
            ";

            $chartPrint = true;
            break;

        case 'Empresas empleados [Detallado]':
            $empresa = $_POST['empresa'];
            $estado = $_POST['estado'];
            $tipo_documento = $_POST['tipo_documento'];
            $estado_civil = $_POST['estado_civil'];
            $tipo_sangre = $_POST['tipo_sangre'];

            $queryTable = "SELECT 
            (select nombre from nominaEmpresas where nominaEmpresas.id = nominaEmpresasPersonal.idEmpresa) as empresa 
            , nombre as nombre
            , concat(tipo_documento,' ',documento) as documento
            , fecha_nacimiento
            , estado_civil
            , hijos
            , tipo_sangre
            , direccion
            , concat(telefono, ' ', celular) as telefono
            from nominaEmpresasPersonal
            where 1=1
            " . ($estado == '99' ? "" : " and estado = '" . $estado . "'") . "
            " . ($empresa == '0' ? "" : " and idEmpresa = '" . $empresa . "'") . "
            " . ($tipo_documento == '0' ? "" : " and tipo_documento = '" . $tipo_documento . "'") . "
            " . ($estado_civil == '0' ? "" : " and estado_civil = '" . $estado_civil . "'") . "
            " . ($tipo_sangre == '0' ? "" : " and tipo_sangre = '" . $tipo_sangre . "'") . "
            ";

            $columnsShow = [
                'Empresa' => 'empresa',
                'Nombre ' => 'nombre',
                'Documento' => 'documento',
                'Fecha de Nacimiento' => 'fecha_nacimiento',
                'Estado Civil' => 'estado_civil',
                'Hijos' => 'hijos',
                'Tipo de Sangre' => 'tipo_sangre',
                'Dirección' => 'direccion',
                'Teléfono' => 'telefono',
            ];

            $tablePrint = true;

            $queryChart = "SELECT count(id) as y, (select concat(nombre, ' - ', tipoDocumento, ' ', documento) from nominaEmpresas where nominaEmpresas.id = nominaEmpresasPersonal.idEmpresa) as x
            from nominaEmpresasPersonal
            where 1=1
            " . ($estado == '99' ? "" : " and estado = '" . $estado . "'") . "
            " . ($empresa == '0' ? "" : " and idEmpresa = '" . $empresa . "'") . "
            " . ($tipo_documento == '0' ? "" : " and tipo_documento = '" . $tipo_documento . "'") . "
            " . ($estado_civil == '0' ? "" : " and estado_civil = '" . $estado_civil . "'") . "
            " . ($tipo_sangre == '0' ? "" : " and tipo_sangre = '" . $tipo_sangre . "'") . "
            group by idEmpresa
            ";

            $chartPrint = true;
            break;

        default:
            $tablePrint = false;
            $chartPrint = false;
            break;
    }
}


?>

<div class="content-wrapper p-3">
    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="col-xs-12">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <div class="float-left">
                                    <h4>Reporte [<?= $tipo ?>]</h4>
                                </div>
                            </div>
                            <div class="card-body row">
                                <div class="form-group col-md-12">

                                    <div class="col-md-12">
                                        <?php if ($tablePrint) : ?>
                                            <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <?php foreach ($columnsShow as $key => $value) : ?>
                                                            <th><?= $key ?></th>
                                                        <?php endforeach ?>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $result = mysqli_query($conn3, $queryTable);
                                                    while ($row = mysqli_fetch_array($result)) {
                                                    ?>
                                                        <tr>
                                                            <?php foreach ($columnsShow as $key => $value) : ?>
                                                                <?php
                                                                $print = '';
                                                                if (is_array($value)) {
                                                                    for ($a = 0; $a < count($value); $a++) {
                                                                        $print .= $row[$value[$a]] . ' ';
                                                                    }
                                                                } else {
                                                                    $print = $row[$value];
                                                                }
                                                                ?>
                                                                <td><?= $print ?></td>
                                                            <?php endforeach ?>
                                                        </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        <?php endif ?>
                                    </div>

                                    <div class="col-md-12">
                                        <?php if ($chartPrint) : ?>
                                            <?php
                                            $resultChart = mysqli_query($conn3, $queryChart);

                                            $arrayData = [];
                                            while ($rowChart = mysqli_fetch_array($resultChart)) {
                                                $arrayData[] = [$rowChart['x'], $rowChart['y']];
                                            }

                                            $_GET['n'] = rand(1, 1000);
                                            $_GET['nombre'] = $tipo;
                                            $_GET['Tiempo'] = rand(1, 1000);
                                            $_GET['datos'] = json_encode($arrayData);
                                            include '../generarGrafica.php'
                                            ?>
                                        <?php endif ?>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include '../footer.php';
?>