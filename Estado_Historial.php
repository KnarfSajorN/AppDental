<?php
if ($_POST) {
    include 'funciones/funciones.php';
    function Desencriptar($valor)
    {
        $Sc = base64_decode("keyMaster");
        $Texto = openssl_decrypt(urldecode($valor), "AES-256-CBC", $Sc);
        return $Texto;
    }
    $search = preparePost($_POST['search']);
    $min = preparePost($_POST['min']);
    $prepare = "";
    if (!empty($search)) {
        $search = str_replace(' ', '%', $search);
        $prepare = "(CONCAT_WS(' ',hi.nombreIngreso,hi.nombreCampo,hi.descripcion,hi.created_at) LIKE '%{$search}%') AND";
    }
    $cliente_id = preparePost(Desencriptar($_POST['cliente_id']));
    $querySelect = mysqli_query($conn3, "SELECT hi.*, ei.color FROM 
        historialIngreso AS hi INNER JOIN 
        estadosIngreso AS ei ON 
        hi.tipoIngreso = ei.id WHERE {$prepare} cliente_id = '{$cliente_id}' AND hi.estado != 0
        ORDER BY hi.id DESC LIMIT {$min}, 20;
    ");
    $queryCuenta = mysqli_query($conn3, "SELECT hi.*, ei.color FROM 
        historialIngreso AS hi INNER JOIN 
        estadosIngreso AS ei ON 
        hi.tipoIngreso = ei.id WHERE {$prepare} cliente_id = '{$cliente_id}' AND hi.estado != 0
        ORDER BY hi.id DESC;
    ");
    $result = mysqli_num_rows($querySelect);
    $cuenta = mysqli_num_rows($queryCuenta);
    $array = [
        'status' => false,
        'min' => ($min + 20),
        'max' => $cuenta,
        'data' => array()
    ];
    if ($result > 0) {
        while ($row = mysqli_fetch_assoc($querySelect)) {
            list($fecha, $hora) = explode(" ", $row['created_at']);
            $fechaFin = (empty($row['fechaFin']) ? Date("Y-m-d") : $row['fechaFin']);
            $diasEspañol = array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");
            setlocale(LC_ALL, "es_ES@euro", "es_ES", "esp");
            $diaTexto = Date("w", strtotime($fecha));
            $diaTexto2 = Date("w", strtotime($row['fechaFin']));
            $row['fechaTextoInicio'] = strftime("{$diasEspañol[$diaTexto]}, %d de %B de %Y", strtotime($fecha));
            $row['fechaTextoFin'] = (empty($row['fechaFin']) ? 'En Proceso' : strftime("{$diasEspañol[$diaTexto2]}, %d de %B de %Y", strtotime($row['fechaFin'])));
            $array['status'] = true;
            $queryHC = mysqli_query($conn3, "SELECT count(*) AS cuenta FROM Historia_Clinica WHERE substr(fecha,1,10) BETWEEN '{$fecha}' AND '{$fechaFin}' AND cliente_id = '{$cliente_id}';");
            $queryNF = mysqli_query($conn3, "SELECT count(*) AS cuenta FROM NotaEnfermeria WHERE estado = 1 AND substr(created_at,1,10) BETWEEN '{$fecha}' AND '{$fechaFin}' AND idCliente = '{$cliente_id}';");
            $queryRMR = mysqli_query($conn3, "SELECT count(*) AS cuenta FROM RM_Recetario WHERE Fecha_Registro BETWEEN '{$fecha}' AND '{$fechaFin}' AND cliente_id = '{$cliente_id}';");
            $row['procedimientos'] = [
                'Historias Clinicas' => $queryHC->fetch_assoc()['cuenta'],
                'Notas de Enfermeria' => $queryNF->fetch_assoc()['cuenta'],
                'Recetas Medicas' => $queryRMR->fetch_assoc()['cuenta']
            ];
            array_push($array['data'], base64_encode(json_encode($row)));
        }
    }
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($array);
    exit();
}
include 'header.php';
include 'menu.php';
function Encriptar($valor)
{
    $Sc = base64_decode("keyMaster");
    $Texto = urlencode(openssl_encrypt($valor, "AES-256-CBC", $Sc));
    return $Texto;
}
$cliente_id = preparePost($_GET['idCliente']);
$cliente = mysqli_query($conn3, "SELECT * FROM cliente WHERE cliente_id = '{$cliente_id}' LIMIT 1;");
$estadoSelect = mysqli_query($conn3, "SELECT hi.*, ei.color FROM 
    historialIngreso AS hi INNER JOIN 
    estadosIngreso AS ei ON 
    hi.tipoIngreso = ei.id WHERE cliente_id = '{$cliente_id}' AND hi.estado != 0 
    ORDER BY hi.id DESC LIMIT 1;
");
$cuentaSelect = mysqli_query($conn3, "SELECT count(*) AS cuenta FROM 
    historialIngreso AS hi INNER JOIN 
    estadosIngreso AS ei ON 
    hi.tipoIngreso = ei.id WHERE cliente_id = '{$cliente_id}' AND hi.estado != 0 
    ORDER BY hi.id;
");
$queryCuenta = mysqli_num_rows($cliente);
if ($queryCuenta > 0) {
    $queryCuenta = mysqli_num_rows($estadoSelect);
    $cliente = $cliente->fetch_assoc();
    if ($queryCuenta > 0) {
        while ($row = mysqli_fetch_assoc($estadoSelect)) {
            foreach ($row as $key => $val) {
                $estado[$key] = $val;
            }
        }
        while ($row = mysqli_fetch_assoc($cuentaSelect)) {
            foreach ($row as $key => $val) {
                $cuenta[$key] = $val;
            }
        }
    }
}
?>

<script type="text/javascript">
    let min = 0;
    let max = 0;
</script>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#"> Historial Estados de Ingreso </a></li>
        </ol>
    </section>
    <style type="text/css">
        .content-client {
            box-shadow: 0px 0px 5px -1px <?= (empty($estado['color']) ? '#000' : $estado['color']) ?>;
            border-radius: 5px;
        }

        .img-client {
            position: realtive;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100px;
            overflow: hidden;
        }

        .content-estados {
            display: flex;
            flex-flow: row wrap;
            max-height: 696px;
            overflow: auto;
            padding: 0;
        }

        .content-estados .content-cards {
            width: 300px;
            margin: 10px;
            display: flex;
            flex-flow: column;
            padding: 0;
            /* margin: 5px */
        }

        .content-estados .content-cards .card {
            flex-flow: column;
            padding: 5px;
        }

        .content-estados .content-cards .card .card-footer .content-count {
            display: flex;
            flex-flow: row;
            justify-content: space-evenly;
            align-items: center;
        }
    </style>
    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="content">
                <h4 class="Titulo_Pagina">Historial Estados de Ingreso</h4>
                <div class="box">
                    <div class="box-body">
                        <div class="container-fluid row">
                            <div class="col-md-2 content-client row">
                                <div class="col-md-12 img-client">
                                    <img src="<?= (empty($cliente['fotoperfil']) ? './css/Hombre.jfif' : './pacientes/' . $cliente['fotoperfil']) ?>" alt="img-not" class="img-fluid bg-danger" style="width: 80px; height: 80px; display: block; border-radius: 50%;">
                                </div>
                                <div class="col-md-12">
                                    <h4 class="text-center text-bold"><?= $cliente['nombre_cliente']; ?></h4>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="form-group">
                                            <p><span class="text-bold">Estado Actual: </span><br> <?= (empty($estado['nombreIngreso']) ? 'Sin Estados' : $estado['nombreIngreso']) ?></p>
                                        </div>
                                    </div>
                                    <?php if (!empty($estado['nombreCampo'])) : ?>
                                        <div class="row">
                                            <div class="form-group">
                                                <p><span class="text-bold"><?= $estado['nombreCampo'] ?>:</span><br> <?= (empty($estado['descripcion']) ? 'Sin Datos' : $estado['descripcion']) ?></p>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <?php if (!empty($estado['fechaFin'])) : ?>
                                        <div class="row">
                                            <div class="form-group">
                                                <p class="card-text text-danger text-bold" align="left"><?= $estado['estado'] == 2 ? 'Cerrado' : 'En Proceso' ?></p>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <div class="row">
                                        <div class="form-group">
                                            <p><span class="text-bold">Estados: </span><br> <?= ($cuenta['cuenta'] != "" ? $cuenta['cuenta'] : 0) ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="col-md-12" style="margin: 10px 0 0 0;">
                                    <div class="col-12 col-md-9"></div>
                                    <div class="col-12 col-md-3">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="input-group">
                                                    <input type="text" class="form-control input-lg" name="searchEstados" id="searchEstados" required placeholder="Buscador..." >
                                                    <label for="searchEstados" class="input-group-addon" style="left: -30px;top: 8px;position: relative;"><i class="fa fa-search"></i></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 content-estados" id="printEstados">
                                    <!-- <div class="col-12 col-md-3 content-cards">
                                        <div class="card" style="width: 100%; height: 100%; margin:0; box-shadow: 0px 0px 3px 0px #055090; display: flex; flex-flow: column; justify-content: space-between;">
                                            <div class="card-body" style="width: 100%; word-break: break-all;">
                                                <p class="card-text">Estado: Prueba</p>
                                                <p class="card-text">Prueba: Prueba</p>
                                                <p class="card-text">Fecha de Inicio: 25 de Junio de 2022</p>
                                                <p class="card-text">Fecha de finalizacion: 25 de Junio de 2022</p>
                                            </div>
                                            <div class="card-footer">
                                                <small class="text-muted">
                                                    <div class="col-md-12">
                                                        <div class="col-xs-2 content-count">
                                                            <a href="#" data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="100"><i class="fa fa-sticky-note text-black fa-2x"></i></a>
                                                        </div>
                                                        <div class="col-xs-2 content-count">
                                                            <a href="#" data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="100"><i class="fa fa-book text-black fa-2x"></i></a>
                                                        </div>
                                                        <div class="col-xs-2 content-count">
                                                            <a href="#" data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="100"><i class="fa fa-user text-black fa-2x"></i></a>
                                                        </div>
                                                        <div class="col-xs-2 content-count">
                                                            <a href="#" data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="100"><i class="fa fa-address-book text-black fa-2x"></i></a>
                                                        </div>
                                                        <div class="col-xs-2 content-count">
                                                            <a href="#" data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="100"><i class="fa fa-archive text-black fa-2x"></i></a>
                                                        </div>
                                                        <div class="col-xs-2 content-count">
                                                            <a href="#" data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="100"><i class="fa fa-eye text-black fa-2x"></i></a>
                                                        </div>
                                                    </div>
                                                </small>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include 'footer.php';
?>
<script type="text/javascript">
    $(document).ready(function() {
        $("#printEstados").on('scroll', function() {
            GetScrollerEndPoint('#printEstados');
        });
        $("#searchEstados").on('keyup', function() {
            $("#printEstados").html('');
            getEstados({
                cliente_id: '<?= Encriptar($cliente_id) ?>',
                search: this.value,
                min: 0
            });
        });
    });
    const GetScrollerEndPoint = (input) => {
        let scrollHeight = $(input).prop('scrollHeight');
        let divHeight = $(input).height();
        let scrollerEndPoint = scrollHeight - divHeight;
        let divScrollerTop = $(input).scrollTop();
        if (Math.round(divScrollerTop, 1) === scrollerEndPoint || (scrollerEndPoint - (Math.round(divScrollerTop))) <= 1) {
            // console.log("prueba3");
            if (min < max) {
                // console.log("prueba1");
                getEstados({
                    search: $("#searchEstados").val(),
                    cliente_id: '<?= Encriptar($cliente_id) ?>',
                    min: min
                });
            }
        } else if (Math.round(divScrollerTop) <= (scrollerEndPoint - scrollerEndPoint)) {
            // console.log("prueba2");
        }
    };
    const getEstados = (data) => {
        $.ajax({
            url: "./Estado_Historial.php",
            data: data,
            type: "POST",
            dataType: "json",
            success: function(response) {
                if (response.status) {
                    min = response.min;
                    max = response.max;
                    printEstados(response.data);
                }
            }
        });
    };
    const printEstados = (data) => {
        let print = "<div class='col-md-12 text-center text-bold'>SIN ESTADOS</div>";
        data.forEach(element => {
            element = JSON.parse(atob(element));
            print = `
                <div class="col-12 col-md-3 content-cards">
                    <div class="card" style="width: 100%; height: 100%; margin:0; box-shadow: 0px 0px 5px 0px ${element.color}; display: flex; flex-flow: column; justify-content: space-between;">
                        <div class="card-body" style="width: 100%; word-break: break-all;">
                            <p class="card-text">Estado: ${element.nombreIngreso}</p>`;
            if (element.nombreCampo != "") {
                print += `  <p class="card-text">${element.nombreCampo}: ${element.descripcion}</p>`;
            }
            print += `      <p class="card-text">Fecha Inicio: ${element.fechaTextoInicio}</p>
                            <p class="card-text">Fecha Fin: ${(element.fechaTextoFin != '' ? element.fechaTextoFin : 'En Proceso')}</p>
                            <p class="card-text text-danger text-bold">${(element.estado == 2 ? 'Cerrado' : '')}</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">
                                <div class="col-md-12 row">`;
            let Object = element.procedimientos;
            console.log(Object)
            for (const key in Object) {
                if (Object[key] > 0) {
                    print += `      <div class="col-xs-2 content-count">
                                        <a href="#" data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="${key}: ${Object[key]}"><i class="fa fa-folder-open text-black fa-2x"></i></a>
                                    </div>`;
                }
            }
            print += `          </div>
                            </small>
                        </div>
                    </div>
                </div>
            `;
            $("#printEstados").append(print);
        });
    }
    window.addEventListener('load', () => {
        getEstados({
            cliente_id: '<?= Encriptar($cliente_id) ?>',
            min: min
        });
    });
</script>