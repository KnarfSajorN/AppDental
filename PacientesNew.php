<?php
include 'header.php';
include 'menu.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#">Pacientes</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <h4 class="Titulo_Pagina">Pacientes Historia Clinica</h4>
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
                            <button class="btn btn-block btn-primary btn-sm">
                                <h4> <strong> <i class="fas fa-id-card-alt"></i> Registrar Pacientes </strong></h4>
                            </button>
                        </a>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">


                        <div class="box-body table-responsive no-padding">
                            <table id="tablaNueva" class="table table-bordered table-striped" style="font-size:18px">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Cedula</th>
                                        <th>Direccion (Casa)</th>
                                        <th>Celular (Contacto)</th>
                                        <th>Celular (Whatsapp)</th>
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


<!-- <script>
    //version 2 tabla rapida id="Tabla_Rapida_AJAX"
    var titulo_tabla = "Pacientes";
    <?php if ($_SESSION['vista'] == 0) { ?>
        query_tabla_ajax = "<?php echo "SELECT * FROM  cliente "; ?>";
    <?php } elseif ($_SESSION['vista'] == 1) {  ?>
        query_tabla_ajax = "<?php echo "SELECT * FROM  cliente where usuario_id = $ID order by cliente_id"; ?>";
    <?php }  ?>

    columnas = ['cliente_id', 'nombre_cliente', 'CODI_CLIENTE', 'direccion_cliente', 'telefono_cliente', 'whatsapp', 'correo_cliente'];

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
            "data": function(row, type, set) {
                botones = "";
                botones += "<a href='Historia_Clinica.php?clienteId=" + row.cliente_id + "' title='Agregar Historia'><i class='fas fa-file-medical'></i> </a>";
                botones += "<a href='SignosVitales_Antropometricas.php?clienteId=" + row.cliente_id + "' title='Agregar Signos Vitales y Antropometria'><i class='fas fa-user-nurse' style='color:#29951ccf;'></i> </a>";
                botones += "<a href='Historial_Clinico.php?clienteId=" + row.cliente_id + "' title='Ver historial'><i class='fas fa-book-medical'></i> </a>";
                botones += "<a href='agregarCitas.php?clienteId=" + row.cliente_id + "' title='Agregar Cita'><i class='fa fa-calendar'></i> </a>";
                botones += "<a href='editarPaciente?clienteId=" + row.cliente_id + "' title='Editar Cliente'><i class='fa fa-pencil'></i> </a>";
                botones += "<a href='historiaImagenes.php?clienteId=" + row.cliente_id + "' title='Anexar Archivos'><i class='fa fa-folder-open'></i> </a>";
                return botones;
            }
        }

    ];
</script> -->


<?php
include 'footer.php';
include 'dataTablePaginacion.php';
function Encriptar($valor)
{
    $Sc = base64_decode("keyMaster");
    $Texto = urlencode(openssl_encrypt($valor, "AES-256-CBC", $Sc));
    return $Texto;
}
?>
<script type="text/javascript">
    $(document).ready(function() {
        // $('#tablaNueva thead tr').clone(true).addClass('filters').appendTo('#tablaNueva thead');
        // //Creamos una fila en el head de la tabla y lo clonamos para cada columna
        // $('#tablaNueva thead tr:eq(0) th').each(function(i) {
        //     var title = $(this).text(); //es el nombre de la columna
        //     console.log(title);
        //     switch (title) {
        //         case 'doctor':
        //             $(this).html('<select name="text" id="codigo" class="input-lg form-group" style="width:100%"><option value="" selected>Seleccione</option><option>Esta Firmado</option><option selected>No Firmado</option></select>');
        //             break;
        //         case 'Nombres':
        //             $(this).html('<input type="text"  class="input-lg form-group" style="width:100%" value="">');
        //             break;
        //         case 'Paciente':
        //             $(this).html('<input type="text"  class="input-lg form-group" style="width:100%" value="">');
        //             break;
        //         case 'FechaR':
        //             $(this).html('<input type="text"  class="input-lg form-group" id="buscadores" style="width:100%" value="">');
        //             break;
        //         case ' ':

        //             break;
        //         default:
        //             $(this).html('<input type="text" class="form-control input-lg" placeholder="' + title + '" />');
        //             break;
        //     }

        //     $('input', this).on('keyup change', function(e) {
        //         e.stopPropagation();
        //         // Get the search value
        //         $(this).attr('title', $(this).val());
        //         var regexr = '({search})'; //$(this).parents('th').find('select').val();
        //         var cursorPosition = this.selectionStart;
        //         // Search the column for that value
        //         tablaOne
        //             .column(i)
        //             .search(
        //                 this.value != '' ?
        //                 regexr.replace('{search}', '(((' + this.value + ')))') :
        //                 '',
        //                 this.value != '',
        //                 this.value == ''
        //             )
        //             .draw();
        //         $(this)
        //             .focus()[0]
        //             .setSelectionRange(cursorPosition, cursorPosition);
        //     });

        //     $('select', this).off('keyup change').on('keyup change', function(e) {
        //         e.stopPropagation();
        //         // Get the search value
        //         $(this).attr('title', $(this).val());
        //         var regexr = '({search})'; //$(this).parents('th').find('select').val();
        //         var cursorPosition = this.selectionStart;
        //         // Search the column for that value
        //         tablaOne
        //             .column(i)
        //             .search(
        //                 this.value != '' ?
        //                 regexr.replace('{search}', '(((' + this.value + ')))') :
        //                 '',
        //                 this.value != '',
        //                 this.value == ''
        //             )
        //             .draw();
        //         $(this)
        //             .focus()[0]
        //             .setSelectionRange(cursorPosition, cursorPosition);
        //     });
        // });
        let tablaOne = tablaDinamica({
            input: "#tablaNueva", // id del tabla
            selectFrom: "<?= Encriptar("*") ?>", // SELECT la colausa entre estos dos  FROM
            name: "<?= Encriptar("cliente") ?>", // Nombre de la tabla o en su defecto si se realiza joins y de mas
            camposValue: "<?= Encriptar(json_encode(['nombre_cliente', 'CODI_CLIENTE', 'direccion_cliente', 'telefono_cliente', 'whatsapp', 'correo_cliente'])) ?>", // Campos que se mostraran en la tabla
            clausula: {
                data: "<?= Encriptar("") ?>", // Clausula de la consulta
                value: [''], // Valores de la clausula
            },
            likeWhere: "<?= Encriptar('nombre_cliente || CODI_CLIENTE || direccion_cliente || celular_cliente || whatsapp || correo_cliente') ?>", // campos que se usaran en el buscador (CAMPO LIKE %CAMPO%)
            order: "<?= Encriptar(json_encode(['order by' => '$0'])) ?>", // Orden de la consulta, AQUI SE PUEDE PONER EL ORDER BY, GROUP BY
            btns: btoa(JSON.stringify({ // Botones que se mostraran en la tabla
                btn1: btoa(JSON.stringify({ // Boton 1 PARA CREAR MAS BOTONES ES IMPORTANTE MANTENER LA NUMERACION EJEMPL BTN1, BTN2 ETC
                    class: "<?= Encriptar("fas fa-file-medical text-primary") ?>", // Clase del boton
                    id: "<?= Encriptar("") ?>", // id del boton
                    href: "<?= Encriptar("Historia_Clinica.php?clienteId=$0") ?>", // href del boton
                    title: "<?= Encriptar("Agregar Historia") ?>", // title del boton
                    event: "<?= Encriptar("") ?>", // evento del boton
                    target: "<?= Encriptar("blank_") ?>", // target del boton
                    value: "<?= Encriptar("cliente_id || nombre_cliente") ?>" // valor del boton
                })),
                btn2: btoa(JSON.stringify({
                    class: "<?= Encriptar("fas fa-user-nurse text-success") ?>",
                    id: "<?= Encriptar("") ?>",
                    href: "<?= Encriptar("SignosVitales_Antropometricas.php?clienteId=$0") ?>",
                    title: "<?= Encriptar("Agregar Signos Vitales y Antropometria") ?>",
                    event: "<?= Encriptar("") ?>",
                    target: "<?= Encriptar("blank_") ?>",
                    value: "<?= Encriptar("cliente_id") ?>"
                })),
                btn3: btoa(JSON.stringify({
                    class: "<?= Encriptar("fas fa-book-medical text-primary") ?>",
                    id: "<?= Encriptar("") ?>",
                    href: "<?= Encriptar("Historial_Clinico.php?clienteId=$0") ?>",
                    title: "<?= Encriptar("Ver historial") ?>",
                    event: "<?= Encriptar("") ?>",
                    target: "<?= Encriptar("blank_") ?>",
                    value: "<?= Encriptar("cliente_id") ?>"
                })),
                btn4: btoa(JSON.stringify({
                    class: "<?= Encriptar("fa fa-calendar text-primary") ?>",
                    id: "<?= Encriptar("") ?>",
                    href: "<?= Encriptar("agregarCitas.php?clienteId=$0") ?>",
                    title: "<?= Encriptar("Agregar Cita") ?>",
                    event: "<?= Encriptar("") ?>",
                    target: "<?= Encriptar("blank_") ?>",
                    value: "<?= Encriptar("cliente_id") ?>"
                })),
                btn5: btoa(JSON.stringify({
                    class: "<?= Encriptar("fa fa-pencil text-primary") ?>",
                    id: "<?= Encriptar("") ?>",
                    href: "<?= Encriptar("editarPaciente?clienteId=$0") ?>",
                    title: "<?= Encriptar("Editar Cliente") ?>",
                    event: "<?= Encriptar("") ?>",
                    target: "<?= Encriptar("blank_") ?>",
                    value: "<?= Encriptar("cliente_id") ?>"
                })),
                btn6: btoa(JSON.stringify({
                    class: "<?= Encriptar("fa fa-folder-open text-primary") ?>",
                    id: "<?= Encriptar("") ?>",
                    href: "<?= Encriptar("historiaImagenes.php?clienteId=$0") ?>",
                    title: "<?= Encriptar("Anexar Archivos") ?>",
                    event: "<?= Encriptar("") ?>",
                    target: "<?= Encriptar("blank_") ?>",
                    value: "<?= Encriptar("cliente_id") ?>"
                })),
            })),
            carapter: "true", // ACTIVAR O DESACTUVAR UTF8_DECODE
            tbody: true, // ACTIVAR O DESACTIVAR LA ANIMACION DE CARGA
        });
    });
</script>