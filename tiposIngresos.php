<?php
if (isset($_POST['key'])) {
    include './funciones/funciones.php';
    header("Content-Type: application/json; charset=UTF-8");

    $array = [
        'status' => true,
        'data' => array(),
        'error' => array()
    ];

    $cliente_id         = preparePost($_POST['cliente_id']);
    $usuario_id         = preparePost($_POST['usuario_id']);
    if ($_POST['key'] == 'cargarCard') { // CARGAR TARJETA PERSONAL
        $cliente = mysqli_query($conn3, "SELECT * FROM cliente WHERE cliente_id = '{$cliente_id}'");
        if ($cliente) {
            $cliente = mysqli_fetch_assoc($cliente);
            $estado = mysqli_query($conn3, "SELECT * FROM historialIngreso WHERE cliente_id = '{$cliente_id}' AND estado != 0 ORDER BY id DESC LIMIT 1");
            if ($estado) {
                $estado = mysqli_fetch_assoc($estado);
                $origen = mysqli_query($conn3, "SELECT * FROM estadosIngreso WHERE id = '{$estado['tipoIngreso']}'");
                list($fecha, $hora) = explode(" ", $estado['created_at']);
                if ($origen) {
                    $origen = mysqli_fetch_assoc($origen);
                    $array['data'][0] = "<div class='card' style='position: relative; width: 100%; padding: 10px; flex-flow: column; border: 2px solid " . (empty($origen['color']) ? 'transparent' : $origen['color']) . ";'>";
                    if (!empty($estado['id'])) :
                        $array['data'][0] .= "<a href='Estado_Historial.php?idCliente={$cliente_id}' style='position: absolute; top: 5px; right: 5px; z-index: 1 !important; font-size: 1.3em;' title='Historial' class='text-black'><i class='fa fa-address-book' aria-hidden='true'></i></a>";
                    endif;
                    $array['data'][0] .= "<div class='row'>";
                    $array['data'][0] .= "        <div class='card-body' style='width: 100%;'>";
                    $array['data'][0] .= "            <div class='col-md-12'>";
                    $array['data'][0] .= "                <div class='row'>";
                    $array['data'][0] .= "                    <div class='form-group'>";
                    $array['data'][0] .= "                        <div class='col-md-2'>";
                    $array['data'][0] .= "                            <img class='card-img-top img-fluid' align='center' style='width: 60px; height: 60px; image-rendering: auto; border-radius: 50%;' src='" . (empty($cliente['fotoperfil']) ? './logos/logoIngresoNoBorrar.jpg' : "./pascientes/{$cliente["fotoperfil"]}") . "' alt='Card image cap'>";
                    $array['data'][0] .= "                        </div>";
                    $array['data'][0] .= "                        <div class='col-md-10'>";
                    $array['data'][0] .= "                            <h3 class='card-title'>{$cliente['nombre_cliente']}</h3>";
                    $array['data'][0] .= "                        </div>";
                    $array['data'][0] .= "                    </div>";
                    $array['data'][0] .= "                </div>";
                    $array['data'][0] .= "                <div class='row'>";
                    $array['data'][0] .= "                    <div class='col-md-12'>";
                    $array['data'][0] .= "                        <div class='form-group'></div>";
                    $array['data'][0] .= "                    </div>";
                    $array['data'][0] .= "                </div>";
                    $array['data'][0] .= "                <div class='row'>";
                    $array['data'][0] .= "                    <div class='form-group'>";
                    $array['data'][0] .= "                        <div class='col-md-12'>";
                    $array['data'][0] .= "                            <p class='card-text' align='left'>Estado: " . (empty($estado['nombreIngreso']) ? 'Sin estado.' : $estado['nombreIngreso']) . " </p>";
                    if (!empty($estado['descripcion']) || !empty($estado['nombreCampo'])) :
                        $array['data'][0] .= "                       <p class='card-text' align='left'> " . (!empty($estado['nombreCampo']) ? $estado['nombreCampo'] : 'Tipo') . " : {$estado['descripcion']}</p>";
                    endif;
                    $array['data'][0] .= "                           <p class='card-text' align='left'>Fecha de Inicio: " . (empty($fecha) ? 'Sin datos' : $fecha) . " </p>";
                    $array['data'][0] .= "                           <p class='card-text' align='left'>Fecha de Finalización: " . (empty($estado['fechaFin']) ? (empty($fecha) ? 'Sin datos' : 'En Proceso') : $estado['fechaFin']) . " </p>";
                    if (!empty($estado['fechaFin'])) :
                        $array['data'][0] .= "                       <p class='card-text text-danger' align='left'> " . ($estado['estado'] == 2 ? 'Cerrado' : 'En Proceso') . " </p>";
                    endif;
                    $array['data'][0] .= "                        </div>";
                    $array['data'][0] .= "                    </div>";
                    $array['data'][0] .= "                </div>";
                    $array['data'][0] .= "            </div>";
                    $array['data'][0] .= "        </div>";
                    $array['data'][0] .= "    </div>";
                    $array['data'][0] .= "    <div class='row'>";
                    $array['data'][0] .= "        <div class='col-md-12'>";
                    $array['data'][0] .= "            <div class='panel panel-default' style='margin: 0px;'>";
                    $array['data'][0] .= "                <div class='panel-heading'>";
                    $array['data'][0] .= "                    <h4 class='panel-title text-center'>";
                    if ($estado['estado'] == 2 || empty($estado['estado'])) :
                        $array['data'][0] .= "                   <a data-toggle='collapse' href='#collapseIngreso' onclick='funcionDinamica2()'>Actualizar Estado</a>";
                    else :
                        $array['data'][0] .= "                   <a>Cerrar Estado Para Actualizar</a>";
                    endif;
                    if ($estado['estado'] == 1) :
                        $array['data'][0] .= "                   <a href='#estadoRemovido' class='btn btn-sm text-danger' title='Remover Estado' onclick='removerEstado({idEstado: {$estado['id']}, usuario_id: {$usuario_id}, cliente_id: \"" . base64_encode($cliente_id) . "\"})' style='position: absolute; left: 14px; top: 5px;'><i class='fa fa-trash' style='font-size: 1.5em'></i></a>";
                        $array['data'][0] .= "                   <a href='#estadoCerrado' class='btn btn-sm text-success' title='Cerrar Estado' onclick='cerrarEstado({idEstado: {$estado['id']}, usuario_id: {$usuario_id}, cliente_id: \"" . base64_encode($cliente_id) . "\"})' style='position: absolute; left: 54px;top: 5px;'><i class='fa fa-check' style='font-size: 1.6em'></i></a>";
                    endif;
                    $array['data'][0] .= "                    </h4>";
                    $array['data'][0] .= "                </div>";
                    $array['data'][0] .= "                <div id='collapseIngreso' class='panel-collapse collapse'>";
                    $array['data'][0] .= "                    <form action='consultarClienteIngresos.php' method='POST' id='form-ingresos' style='margin: 0px;'>";
                    $array['data'][0] .= "                        <div class='panel-body'>";
                    $array['data'][0] .= "                            <input type='hidden' name='cliente_id' value='" . base64_encode($cliente_id) . "'>";
                    $array['data'][0] .= "                            <input type='hidden' name='usuario_id' value='" . base64_encode($usuario_id) . "'>";
                    $array['data'][0] .= "                            <input type='hidden' name='insert' value='true'>";
                    $array['data'][0] .= "                            <div class='col-md-12'>";
                    $array['data'][0] .= "                                <div class='row'>";
                    $array['data'][0] .= "                                    <div class='col-md-12'>";
                    $array['data'][0] .= "                                        <div class='form-group'>";
                    $array['data'][0] .= "                                            <label for='tipoIngreso' align='left'>Tipo de Ingreso</label>";
                    $array['data'][0] .= "                                            <select class='form-control' id='tipoIngreso' name='tipoIngreso' onchange='verEstado({estadoIngreso: this.value})' style='width: 100%;' required></select>";
                    $array['data'][0] .= "                                        </div>";
                    $array['data'][0] .= "                                    </div>";
                    $array['data'][0] .= "                                </div>";
                    $array['data'][0] .= "                                <div class='row' id='div-campoAdicional'></div>";
                    $array['data'][0] .= "                            </div>";
                    $array['data'][0] .= "                        </div>";
                    $array['data'][0] .= "                        <div class='panel-footer'>";
                    $array['data'][0] .= "                            <div class='row'>";
                    $array['data'][0] .= "                                <div class='col-md-12'>";
                    $array['data'][0] .= "                                    <button type='submit' class='btn btn-primary btn-block btn-sm'>Guardar</button>";
                    $array['data'][0] .= "                                </div>";
                    $array['data'][0] .= "                            </div>";
                    $array['data'][0] .= "                        </div>";
                    $array['data'][0] .= "                    </form>";
                    $array['data'][0] .= "                </div>";
                    $array['data'][0] .= "            </div>";
                    $array['data'][0] .= "        </div>";
                    $array['data'][0] .= "    </div>";
                    $array['data'][0] .= "</div>";
                } else {
                    $array['status'] = false;
                    array_push($array['error'], "Error 3 {$_POST['key']}: " . mysqli_error($conn3));
                }
            } else {
                $array['status'] = false;
                array_push($array['error'], "Error 2 {$_POST['key']}: " . mysqli_error($conn3));
            }
        } else {
            $array['status'] = false;
            array_push($array['error'], "Error 1 {$_POST['key']}: " . mysqli_error($conn3));
        }
        echo json_encode($array);
        exit();
    }

    if ($_POST['key'] == 'cargarEstadoTipo') { // CERRAR EL TIPO DE ESTADO
        $estadoIngreso = preparePost($_POST['estadoIngreso']);
        $origen = mysqli_query($conn3, "SELECT * FROM estadosIngreso WHERE id = '{$estadoIngreso}'");
        if ($origen) {
            $origen = mysqli_fetch_assoc($origen);
            if ($origen['campoActivo'] == 1) {
                $array['data'][0] = "<div class='col-md-12'>";
                $array['data'][0] .= "    <div class='form-group'>";
                $array['data'][0] .= "        <label for='descripcion'>{$origen['nombreCampo']}</label>";
                $array['data'][0] .= "        <input type='text' name='descripcion' id='descripcion' class='form-control input-lg' required>";
                $array['data'][0] .= "    </div>";
                $array['data'][0] .= "</div>";
            }
        } else {
            $array['status'] = false;
            array_push($array['error'], "Error {$_POST['key']}: " . mysqli_error($conn3));
        }
        echo json_encode($array);
        exit();
    }

    if ($_POST['key'] == 'insertRegistro') { // INSERTAR REGISTROS
        $estadoIngreso = preparePost($_POST['tipoIngreso']);
        $origen = mysqli_query($conn3, "SELECT * FROM estadosIngreso WHERE id = '{$estadoIngreso}'");
        if ($origen) {
            $origen = mysqli_fetch_assoc($origen);
            $_POST['cliente_id'] = base64_decode($_POST['cliente_id']);
            $_POST['usuario_id'] = base64_decode($_POST['usuario_id']);
            $_POST['nombreIngreso'] = $origen['nombreEstado'];
            $_POST['nombreCampo'] = $origen['nombreCampo'];
            $prepare = preparePost($_POST, ['insert', 'key']);
            $queryInsert = mysqli_query($conn3, "INSERT INTO historialIngreso SET {$prepare}");
            if (!$queryInsert) {
                $array['status'] = false;
                array_push($array['error'], "Error {$_POST['key']}: " . mysqli_error($conn3));
            } else {
                array_push($array['data'], ['cliente_id' => base64_encode($_POST['cliente_id'])]);
            }
        }
        echo json_encode($array);
        exit();
    }

    if ($_POST['key'] == 'updateRegistro') { // ACTUALIZAR REGISTROS
        $prepare = preparePost($_POST, ['key', 'id']);
        $prepareWhere = preparePost(["id" => $_POST['id']]);
        $update = mysqli_query($conn3, "UPDATE cliente SET {$prepare} WHERE {$prepareWhere}");
        if (!$update) {
            $array['status'] = false;
            array_push($array['error'], "Error {$_POST['key']}: " . mysqli_error($conn3));
        }
        echo json_encode($array);
        exit();
    }

    if ($_POST['key'] == 'cerrarEstado') { // CERRAR ESTADOS
        $idEstado = preparePost($_POST['idEstado']);
        $queryUpdate = mysqli_query($conn3, "UPDATE historialIngreso SET idUsuEstCerrado = '{$usuario_id}', estado = 2, fechaFin = now() WHERE id = '{$idEstado}'");
        if (!$queryUpdate) {
            $array['status'] = false;
            array_push($array['error'], "Error {$_POST['key']}: " . mysqli_error($conn3));
        } else {
            array_push($array['data'], ['cliente_id' => $cliente_id]);
        }
        echo json_encode($array);
        exit();
    }

    if ($_POST['key'] == 'removerEstado') { // REMOVER REGISTROS
        $idEstado = preparePost($_POST['idEstado']);
        $queryUpdate = mysqli_query($conn3, "UPDATE historialIngreso SET idUsuEstCerrado = '{$usuario_id}', estado = 0, fechaFin = now() WHERE id = '{$idEstado}'");
        if (!$queryUpdate) {
            $array['status'] = false;
            array_push($array['error'], "Error {$_POST['key']}: " . mysqli_error($conn3));
        } else {
            array_push($array['data'], ['cliente_id' => $cliente_id]);
        }
        echo json_encode($array);
        exit();
    }

    echo json_encode($array);
    exit();
}
?>
<div id="my-modal-Estado-Ingreso" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="border-radius: 10px;background: transparent !important;">
            <div class="modal-header" style="margin: 0;padding: 0;border: none;"></div>
            <div class="modal-body" style="margin: 0;">
                <div class="col-md-12">
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-12" id="div-Ingresos">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="margin: 0;padding: 0;border: none;"></div>
        </div>
    </div>
</div>
<?php
include("ajaxCreadorSelect2.php");
function Encriptar2($valor)
{
    $Sc = base64_decode("keyMaster");
    $Texto = urlencode(openssl_encrypt($valor, "AES-256-CBC", $Sc));
    return $Texto;
}
// El primer campo, es el selector; ya sea id, clase o campo todo depdnde de como sea implementado Ejem: #campo .campo input etc
// selectFrom: con este objeto podran manipular los campos pasados en el SELECT * FROM, muy util cuando usan JOIN EJEMP:
// selectFrom: Encriptar2("lb_c.id AS id, lb_c.Nombre AS Nombre") = SELECT lb_c.id AS id, lb_c.Nombre AS Nombre FROM
// name: nombre de la tabla al cual se hara la consulta SQL
// value: valor que contendra el option del select Ejem: <option value"dato"></option>. Podra contener mas de un campo, solo seprara de esta forma id || descripcion
// value se separara con | en el value del option
// text: texto que aparecera dentro de la etiqueta option Ejem: <option>dato</option. Podra contener mas de un campo, solo seprara de esta forma id || descripcion
// text se separara con • en el texto del option
// likeWhere: condicion a cumplir para el buscador, seran representado como Ejem: descripcion like "%dato%", no esta lkimitado a un solo campo, solo seprara de esta forma codigo || descripcion
// order: este sera el campo que te ayudara a filtrar y se representa en arrays Ejemplo ['group by' => 'empresa', 'order by' => 'cliente_id']
// clausula: este objeto contendra dos objetos, 
// data: se encargara de añadir condiciones a la consulta ejemplo: Encriptar2("cliente_id = 1 AND cliente_id = 2") equivalente a AND cleinte_id = 1
// value: contendra valores en array, reemplazables en data: Ejempl: [1, 2, 3]
// ATENCION: data trabaja con una especie de remplazo de valores, ejempl: cliente_id = $0 ,  $0 es el quivalente a la posisicon 0 del array value
// carapter: si tenemos problemas al cargar una data porque los caracteres devueltos rompen el javascript mantenerlo en true de otra forma pueden tenerlo como false
// campoCreador: esta campo sera añadido siempre y cuando tengamos el creador de tags activo ya que se encargara de indicar con cual campo debe verificar si existe o no el mismo para saber si debe crearse, dejar vacio al no usarse
// El ultimo campo nos permitira activar o desactivar el creador de Tags, por defecto esta desactivado ya que no queremos crear/añadir nuevos datos a la tabla desde el select
?>
<script type="text/javascript">
    window.addEventListener("load", function() {
        <?php if (isset($clienteExtraido)) : ?>
            verIngresos({
                cliente_id: <?= $clienteExtraido ?>,
                usuario_id: <?= $_SESSION['ID'] ?>
            })
            // $("#my-modal-Estado-Ingreso").modal("show");
        <?php endif; ?>
    });

    function funcionDinamica2() {
        Select2Dinamico2(
            "#tipoIngreso", {
                selectFrom: "<?= Encriptar2("*") ?>",
                name: "<?= Encriptar2("estadosIngreso") ?>",
                value: "<?= Encriptar2("id") ?>",
                text: "<?= Encriptar2("nombreEstado") ?>",
                likeWhere: "<?= Encriptar2("nombreEstado") ?>",
                order: "<?= Encriptar2(json_encode(['group by' => 'id'])) ?>",
                clausula: {
                    data: "<?= Encriptar2("estado = 1") ?>",
                    value: [''],
                },
                carapter: "true",
                campoCreador: btoa(JSON.stringify({
                    nombreCreador: false,
                    conditionInsert: false,
                    conditionSelect: false,
                })),
            }, false, false
        );
    }

    function verIngresos(data) {
        data.key = "cargarCard";
        $.ajax({
            type: "POST",
            url: "tiposIngresos.php",
            data: data,
            success: function(response) {
                // console.log(response);
                if (response.status) {
                    $('#div-Ingresos').html(response.data[0]);
                    $("#form-ingresos").submit(function(e) {
                        e.preventDefault();
                        var data = new FormData(this);
                        data.append("key", "insertRegistro");
                        addEstado(data);
                    });
                }
            }
        });
    };

    function addEstado(data) {
        $.ajax({
            type: "POST",
            url: "tiposIngresos.php",
            processData: false,
            contentType: false,
            data: data,
            success: function(response) {
                // console.log(response);
                if (response.status) {
                    verIngresos({
                        cliente_id: atob(response.data[0].cliente_id),
                        usuario_id: <?= $_SESSION['ID'] ?>
                    });
                }
            }
        });
    }

    function verEstado(data) {
        data.key = "cargarEstadoTipo";
        $.ajax({
            type: "POST",
            url: "tiposIngresos.php",
            data: data,
            success: function(response) {
                // console.log(response);
                if (response.status) {
                    $('#div-campoAdicional').html(response.data[0]);
                }
            }
        });
    };

    function cerrarEstado(data) {
        data.key = "cerrarEstado";
        $.ajax({
            type: "POST",
            url: "tiposIngresos.php",
            data: data,
            success: function(response) {
                // console.log(response);
                if (response.status) {
                    verIngresos({
                        cliente_id: atob(response.data[0].cliente_id),
                        usuario_id: <?= $_SESSION['ID'] ?>
                    });
                }
            }
        });
    };

    function removerEstado(data) {
        data.key = "removerEstado";
        $.ajax({
            type: "POST",
            url: "tiposIngresos.php",
            data: data,
            success: function(response) {
                // console.log(response);
                if (response.status) {
                    verIngresos({
                        cliente_id: atob(response.data[0].cliente_id),
                        usuario_id: <?= $_SESSION['ID'] ?>
                    });
                }
            }
        });
    };
</script>