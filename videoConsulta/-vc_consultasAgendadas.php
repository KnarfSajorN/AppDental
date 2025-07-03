<?php
include '../header.php';
include '../menu.php';

if (isset($_SESSION['cI']) && $_SESSION['cI']<> '') {
    $queryClienteC = " AND idCliente=" . $_SESSION['cI'];
}else{
    $queryClienteC = "";
}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#">Pacientes</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="col-md-12">
                <h4 class="Titulo_Pagina">Pacientes Historias Clínicas</h4>

                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">

                        <div class="col-md-12 mb-3">
                            <a class="btn btn-block btn-outline-info rounded-pill btn-lg" href="videoConsultasReporte">
                                <i class="fa fa-file-video-o"></i>
                                Reporte de video consultas
                            </a>
                        </div>


                        <div class="table-responsive no-padding">
                            <table id="Tabla_Rapida_AJAX" class="table table-bordered table-striped" style="font-size:18px">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Doctor</th>
                                        <th>Fecha</th>
                                        <th>Paciente</th>
                                        <th>Teléfono</th>
                                        <th>Correo</th>
                                        <th>Motivo</th>
                                        <th></th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
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
    var titulo_tabla = "Citas";
    <?php if (($_SESSION['vista'] == 0 || $_SESSION['vista'] == 1) and $_SESSION['sucursal'] != 0) {
        $filtro = (($_SESSION['vista'] == 1) ? "doctor = '{$_SESSION['ID']}' AND " : ''); ?>
        query_tabla_ajax = "<?php echo "SELECT *, estado as noEstado FROM  citas WHERE {$filtro} tipo = 1 $queryClienteC order by fecha, Hora asc"; ?>";
    <?php } else if (($_SESSION['vista'] == 0 || $_SESSION['vista'] == 1)) {
        $filtro = (($_SESSION['vista'] == 1) ? "doctor = '{$_SESSION['ID']}' and " : ''); ?>
        query_tabla_ajax = "<?php echo "SELECT *, estado as noEstado FROM  citas where  {$filtro} tipo = 1 $queryClienteC order by fecha, Hora asc"; ?>";
    <?php } ?>

    // console.log(query_tabla_ajax);
    columnas = ['idCitas', 'doctor', 'fecha', 'Hora', 'nombre', 'telefono', 'correo', 'motivoConsulta', 'noEstado', 'idCliente','estadoVideo'];

    columnastablas = [{
            "data": function(row, type, set) {
                datos = ``;
                datos = `<a href="nuevoPaciente?cI=<?= salt() ?>${btoa(row.idCliente)}" title="Editar Paciente"><i class="btn btn-outline-info rounded-pill fa fa-pencil"></i> </a>`;
                return datos;
            }
        },
        {
            "data": function(row, type, set) {
                datos = ``;
                datos = `<p id="${row.idCitas}1">Cargando...</p>`;
                funcionMaster(row.doctor, 'ID', 'USUARIO', 'usuarios', '#' + row.idCitas + '1');
                return datos;
            }
        },
        {
            "data": function(row, type, set) {
                datos = ``;
                datos = `${row.fecha} - ${row.Hora}`;
                return datos;
            }
        },
        {
            "data": "nombre"
        },
        {
            "data": "telefono"
        },
        {
            "data": "correo"
        },
        {
            "data": function(row, type, set) {
                datos = ``;
                datos = `<p id="${row.idCitas}2">Cargando...</p>`;
                funcionMaster(row.motivoConsulta, 'id', 'descripcion', 'Motivos_Consulta', '#' + row.idCitas + '2');
                return datos;
            }
        },
        {
            "data": function(row, type, set) {
                datos = ``;
                if (row.noEstado == 1) {
                    datos += `<a href="Confirmarcita.php?idCitas=${row.idCitas}&tipo=1"><button type="button" class="m-2 btn btn-block btn-outline-success rounded-pill shadow"><i class="fas fa-calendar-check"></i> Confirmar</button></a>`;
                }
                if (row.noEstado == 2) {
                    datos += `<a href="asistioCita.php?idCitas=${row.idCitas}&tipo=1"><button type="button" class="m-2 btn btn-block btn-outline-info rounded-pill shadow"><i class="fas fa-user-check"></i> Asistió</button></a>`;
                }

                datos += `<a href="NoAsistio.php?idCitas=${row.idCitas}"><button type="button" class="m-2 btn btn-block btn-outline-danger rounded-pill shadow"><i class="fas fa-user-xmark"></i> No Asistió</button></a>`;

                if (row.estadoVideo == 0){
                    datos += `<a href="videoConsultasCrearSala?idCitas=${row.idCitas}&clienteId=${row.correo}&telefono=${row.telefono}"> <button type="button" class="m-2 btn btn-block btn-outline-info rounded-pill shadow"><i class="fas fa-play"></i> Iniciar Consulta</button></a>`;
                }

                datos += `<a href="videoConsultasCargarVideo?iDc=${btoa(row.idCitas)}"> <button type="button" class="m-2 btn btn-block btn-outline-info rounded-pill shadow"><i class="fas fa-video"></i> Ver / Subir grabación</button></a>`;

                
                return datos;
            }
        },
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
include "../footer.php";
include "../ajaxCreadorSelect.php";
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