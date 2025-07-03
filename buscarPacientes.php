<?php
if (isset($_POST['key'])) {
    include "./funciones/funciones.php";
    include './funciones/conn3.php';
    header("Content-type: application/json; charset=UTF-8");

    $array = [
        "status" => true,
        "data" => array(),
        "error" => array()
    ];

    if ($_POST['key'] == "buscarModulos") {
        $search = preparePost($_POST['search']);
        $modulos = mysqli_query($conn3, "SELECT * FROM modulos");
        if (!$modulos) {
            array_push($array['error'], "Error {$_POST['key']} " . mysqli_error($conn3));
            $array['status'] = false;
        }
        while ($row = mysqli_fetch_assoc($modulos)) {
            array_push($array['data'], $row);
        }
        echo json_encode($array);
        exit();
    }

    $array['status'] = false;
    echo json_encode($array);
    exit();
}
include 'header.php';
include 'menu.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <style type="text/css">
        .bg-light-primary {
            background-color: #f9fbff !important;
        }

        .pb-6,
        .py-6 {
            padding-bottom: 3.75rem !important;
        }

        .pt-6,
        .py-6 {
            padding-top: 3.75rem !important;
        }

        .hover-scale,
        .hover-scale:hover {
            transition: transform .2s ease-in;
        }

        .hover_personalizado:hover {
            background-color: #00000005;
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid rgba(0, 0, 0, .125);
            border-radius: .4rem;
            box-shadow: 0 20px 27px 0 rgb(0 0 0 / 5%);
        }

        .card-body {
            flex: 1 1 auto;
            min-height: 1px;
            padding: 1.25rem;
        }
    </style>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Pacientes
        </h1>
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#">Pacientes </a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <div class="col-md-12">
                            <div class="row">
                                <h4 class="text-bold text-center">BUSCAR PACIENTES</h4>
                            </div>
                            <div class="row">
                                <select name="buscarPaciente" id="buscarPaciente" class="form-control input-lg select2" onchange="searchModulos(this.value)"></select>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>

<div id="my-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="border-radius: 10px;">
            <div class="modal-header bg-primary" style="border-top-left-radius: 10px; border-top-right-radius: 10px;">
                <h4 class="modal-title text-center" id="my-modal-title">MODULOS
                    <button class="close text-danger" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-times text-danger btn btn-danger btn-sm" aria-hidden="true"></i>
                    </button>
                </h4>
            </div>
            <div class="modal-body">
                <div class="col-md-12" style="max-height: 400px; overflow: auto;">
                    <div class="row row-cols-lg-3 row-cols-md-2 row-cols-1 text-center justify-content-center px-xl-6 aos-init aos-animate" data-aos="fade-up" id="printModulos">
                        <!-- <div class="col mb-0 mt-3 mb-lg-3">
                                <div class="card border-hover-primary hover-scale">
                                    <div class="card-body">
                                        <div class="text-primary mb-5">
                                            <svg width="60" height="60" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                    <path d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z" fill="currentColor" opacity="0.3"></path>
                                                    <path d="M14.5,11 C15.0522847,11 15.5,11.4477153 15.5,12 L15.5,15 C15.5,15.5522847 15.0522847,16 14.5,16 L9.5,16 C8.94771525,16 8.5,15.5522847 8.5,15 L8.5,12 C8.5,11.4477153 8.94771525,11 9.5,11 L9.5,10.5 C9.5,9.11928813 10.6192881,8 12,8 C13.3807119,8 14.5,9.11928813 14.5,10.5 L14.5,11 Z M12,9 C11.1715729,9 10.5,9.67157288 10.5,10.5 L10.5,11 L13.5,11 L13.5,10.5 C13.5,9.67157288 12.8284271,9 12,9 Z" fill="currentColor"></path>
                                                </g>
                                            </svg>
                                        </div>
                                        <h6 class="font-weight-bold mb-3">Client Dashboards</h6>
                                        <p class="text-muted mb-0">Embed holistics charts directly to your application</p>
                                    </div>
                                </div>
                            </div> -->
                    </div>
                </div>
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>
<?php
include("footer.php");
include("ajaxCreadorSelect.php");
function Encriptar($valor)
{
    $Sc = base64_decode("keyMaster");
    $Texto = urlencode(openssl_encrypt($valor, "AES-256-CBC", $Sc));
    return $Texto;
}
// El primer campo, es el selector; ya sea id, clase o campo todo depdnde de como sea implementado Ejem: #campo .campo input etc
// selectFrom: con este objeto podran manipular los campos pasados en el SELECT * FROM, muy util cuando usan JOIN EJEMP:
// selectFrom: Encriptar("lb_c.id AS id, lb_c.Nombre AS Nombre") = SELECT lb_c.id AS id, lb_c.Nombre AS Nombre FROM
// name: nombre de la tabla al cual se hara la consulta SQL
// value: valor que contendra el option del select Ejem: <option value"dato"></option>. Podra contener mas de un campo, solo seprara de esta forma id || descripcion
// value se separara con | en el value del option
// text: texto que aparecera dentro de la etiqueta option Ejem: <option>dato</option. Podra contener mas de un campo, solo seprara de esta forma id || descripcion
// text se separara con • en el texto del option
// likeWhere: condicion a cumplir para el buscador, seran representado como Ejem: descripcion like "%dato%", no esta lkimitado a un solo campo, solo seprara de esta forma codigo || descripcion
// order: este sera el campo que te ayudara a filtrar y se representa en arrays Ejemplo ['group by' => 'empresa', 'order by' => 'cliente_id']
// clausula: este objeto contendra dos objetos, 
// data: se encargara de añadir condiciones a la consulta ejemplo: Encriptar("cliente_id = 1 AND cliente_id = 2") equivalente a AND cleinte_id = 1
// value: contendra valores en array, reemplazables en data: Ejempl: [1, 2, 3]
// ATENCION: data trabaja con una especie de remplazo de valores, ejempl: cliente_id = $0 ,  $0 es el quivalente a la posisicon 0 del array value
// carapter: si tenemos problemas al cargar una data porque los caracteres devueltos rompen el javascript mantenerlo en true de otra forma pueden tenerlo como false
// campoCreador: esta campo sera añadido siempre y cuando tengamos el creador de tags activo ya que se encargara de indicar con cual campo debe verificar si existe o no el mismo para saber si debe crearse, dejar vacio al no usarse
// El ultimo campo nos permitira activar o desactivar el creador de Tags, por defecto esta desactivado ya que no queremos crear/añadir nuevos datos a la tabla desde el select
?>

<script type="text/javascript">
    window.addEventListener('load', () => {
        Select2Dinamico(
            "#buscarPaciente", {
                selectFrom: "<?= Encriptar("*") ?>",
                name: "<?= Encriptar("cliente") ?>",
                value: "<?= Encriptar("cliente_id") ?>",
                text: "<?= Encriptar("nombre_cliente || CODI_CLIENTE") ?>",
                likeWhere: "<?= Encriptar("nombre_cliente || CODI_CLIENTE") ?>",
                order: "<?= Encriptar(json_encode(['order by' => 'cliente_id'])) ?>",
                clausula: {
                    data: "<?= Encriptar("") ?>",
                    value: [''],
                },
                carapter: "true",
                campoCreador: btoa(JSON.stringify({ // Botones que se mostraran en la tabla
                    nombreCreador: false,
                    conditionInsert: false,
                    conditionSelect: false,
                })),
            }, false, false
        );
    });
    const searchModulos = (id) => {
        let data = {
            key: "buscarModulos"
        };
        $.ajax({
            url: "./buscarPacientes.php",
            type: "POST",
            data: data,
            dataType: "json",
            success: function(response) {
                if (response.status) {
                    let print = "";
                    response.data.forEach(element => {
                        if (element.name_modulo == "Notas de Enfermeria") {
                            element.ruta_modulo = element.ruta_modulo.replace("[CODI_CLIENTE]", btoa(id));
                        } else {
                            element.ruta_modulo = element.ruta_modulo.replace("[CODI_CLIENTE]", id);
                        }
                        print += `
                            <a href='${element.ruta_modulo}' target="blank_" title="${element.name_modulo}">
                                <div class="col mb-0 mt-3 mb-lg-3">
                                    <div class="card border-hover-primary hover-scale">
                                        <div class="card-body btn btn-block hover_personalizado">
                                            <div class="text-primary mb-5">
                                                <i class="fa fa-book fa-4x"></i>
                                            </div>
                                            <h4 class="font-weight-bold mb-3">${element.name_modulo}</h4>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        `;
                    });
                    $("#printModulos").html(print);
                    $("#my-modal").modal("show");
                }
            }
        });
    };
</script>