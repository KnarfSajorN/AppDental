<?php
include 'header.php';
include 'menu.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#">STL</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="col-md-12">
                <h4 class="Titulo_Pagina">Pacientes STL</h4>
                <?php
                $msg = $_GET['msg'];
                if ($msg == '1') {
                    echo '  <div class="callout callout-info ">
        <h4> Cliente ya Registrado!</h4>

        <p>   </p>
      </div>';
                }

                if ($msg == '2') {
                    echo '
        <div class="callout callout-info ">
        <h4> Cliente Registrado!</h4>

        <p>   </p>
      </div>';
                }
                if ($msg == '3') {
                    echo '
        <div class="callout callout-info ">
        <h4> Cliente Actualizado!</h4>

        <p>   </p>
      </div>';
                }

                ?>

                <div class="box">
                    <div class="box-header">
                        <a href="nuevoPaciente">
                            <button class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                                <h4> <strong> <i class="fas fa-id-card-alt"></i> Registrar Pacientes </strong></h4>
                            </button>
                        </a>
                        <hr>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">


                        <div class="box-body table-responsive no-padding">
                            <table id="Tabla_Rapida_AJAX" class="table table-bordered table-striped"
                                style="font-size:18px">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Cédula</th>
                                        <th>Dirección (Casa)</th>
                                        <th>Celular (Contacto)</th>
                                        <th>Celular (WhatsApp)</th>
                                        <th>Correo</th>
                                        <th> </th>
                                    </tr>
                                </thead>
                            </table>
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
<!-- /.content-wrapper -->


<script>
    //version 2 tabla rapida id="Tabla_Rapida_AJAX"
    var titulo_tabla = "Pacientes";
    <?php if (($_SESSION['vista'] == 0 || $_SESSION['vista'] == 1) and $_SESSION['sucursal'] != 0) {
        $filtro = (($_SESSION['vista'] == 1) ? "(usuario_id = '{$_SESSION['ID']}' OR usuario_id = '{$_SESSION['ID_principal']}') AND " : ''); ?>
            query_tabla_ajax = "<?php echo "SELECT * FROM  cliente WHERE (usuario_id = '{$_SESSION['ID']}' OR usuario_id = '{$_SESSION['ID_principal']}')  $queryCliente  and sucursal = '{$_SESSION['sucursal']}' ORDER BY cliente_id"; ?>";
            <?php } else if (($_SESSION['vista'] == 0 || $_SESSION['vista'] == 1)) {
        $filtro = (($_SESSION['vista'] == 1) ? " AND (usuario_id = '{$_SESSION['ID']}' OR usuario_id = '{$_SESSION['ID_principal']}')" : ''); ?>
            query_tabla_ajax = "<?php echo "SELECT * FROM  cliente WHERE  (usuario_id = '{$_SESSION['ID']}' OR usuario_id = '{$_SESSION['ID_principal']}') $queryCliente ORDER BY cliente_id"; ?>";
    <?php } ?>
    columnas = ['cliente_id', 'nombre_cliente', 'CODI_CLIENTE', 'direccion_cliente', 'telefono_cliente', 'whatsapp', 'correo_cliente', 'estado'];

    columnastablas = [{
        "data": "nombre_cliente"
    },
    {
        "data": "CODI_CLIENTE"
    },
    {
        "data": "direccion_cliente"
    },
    {
        "data": "telefono_cliente"
    },
    {
        "data": "whatsapp"
    },
    {
        "data": "correo_cliente"
    },
    {
        "data": function (row, type, set) {
            botones = "";
            botones += "<a href='STL_CA?cI=<?= salt() ?>" + btoa(row.cliente_id) + "' title='Agregar Historia'><i class='fas fa-file-medical'></i> </a>";
            return botones;
        }
    }
    ];
</script>

<div id="my-modal-Estado-Ingreso" class="modal fade" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="border-radius: 10px;background: transparent !important;">
            <div class="modal-header" style="margin: 0;padding: 0;border: none;"></div>
            <div class="modal-body" style="margin: 0;">
                <div class="col-md-12">
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-12 text-center" id="div-Ingresos">
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
include ("footer.php");
include ("ajaxCreadorSelect.php");
function Encriptar($valor)
{
    $Sc = base64_decode("keyMaster");
    $Texto = urlencode(openssl_encrypt($valor, "AES-256-CBC", $Sc));
    return $Texto;
}
// include("ajaxCreadorSelect.php");
// function Encriptar($valor)
// {
//   $Sc = base64_decode("keyMaster");
//   $Texto = urlencode(openssl_encrypt($valor, "AES-256-CBC", $Sc));
//   return $Texto;
// }
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
    function funcionDinamica() {
        Select2Dinamico(
            "#tipoIngreso", {
            selectFrom: "<?= Encriptar("*") ?>",
            name: "<?= Encriptar("estadosIngreso") ?>",
            value: "<?= Encriptar("id") ?>",
            text: "<?= Encriptar("nombreEstado") ?>",
            likeWhere: "<?= Encriptar("nombreEstado") ?>",
            order: "<?= Encriptar(json_encode(['group by' => 'id'])) ?>",
            clausula: {
                data: "<?= Encriptar("estado = 1") ?>",
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
        console.log('entro');
        //console.log(data);
        data.cargarCard = "cargarCard";
        $.ajax({
            type: "POST",
            url: "consultarClienteIngresos.php",
            data: data,
            success: function (response) {
                $('#div-Ingresos').html(response);
                console.log("entro");
                $("#form-ingresos").submit(function (e) {
                    e.preventDefault();
                    var data = new FormData(this);
                    addEstado(data);
                });
            }
        });
    };

    function addEstado(data) {
        $.ajax({
            type: "POST",
            url: "consultarClienteIngresos.php",
            processData: false,
            contentType: false,
            data: data,
            success: function (response) {
                // console.log(response);
                let datos = JSON.parse(response);
                if (datos.status == 1) {
                    verIngresos({
                        cliente_id: atob(datos.cliente_id),
                        usuario_id: <?= $_SESSION['ID'] ?>
                    })
                } else {
                    alert("El estado no fue agregado");
                }
            }
        });
    }

    function verEstado(data) {
        data.cargarEstadoTipo = "cargarEstadoTipo";
        $.ajax({
            type: "POST",
            url: "consultarClienteIngresos.php",
            data: data,
            success: function (response) {
                $('#div-campoAdicional').html(response);
            }
        });
    };

    function cerrarEstado(data) {
        data.cerrarEstado = "cerrarEstado";
        $.ajax({
            type: "POST",
            url: "consultarClienteIngresos.php",
            data: data,
            success: function (response) {
                let datos = JSON.parse(response);
                if (datos.status) {
                    verIngresos({
                        cliente_id: atob(datos.cliente_id),
                        usuario_id: <?= $_SESSION['ID'] ?>
                    });
                } else {
                    console.log(response);
                    alert("El estado no se ha Cerrado");
                }
            }
        });
    };

    function removerEstado(data) {
        data.removerEstado = "removerEstado";
        $.ajax({
            type: "POST",
            url: "consultarClienteIngresos.php",
            data: data,
            success: function (response) {
                let datos = JSON.parse(response);
                if (datos.status) {
                    verIngresos({
                        cliente_id: atob(datos.cliente_id),
                        usuario_id: <?= $_SESSION['ID'] ?>
                    });
                } else {
                    console.log(response);
                    alert("El estado no se ha Removido");
                }
            }
        });
    };
</script>
<script>
    $('#tipoIngreso').select2({
        dropdownParent: $('#my-modal-Estado-Ingreso')
    });
</script>