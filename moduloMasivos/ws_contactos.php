<?php

// verificar tablas creadas
// include './ws_createTables.php';

include '../header.php';
include '../menu.php';
include '../loading.php';

// --------------------------------------------------

?>


<style type="text/css">
    .btn span.glyphicon {
        opacity: 0.5;
    }

    .btn.active span.glyphicon {
        opacity: 1;
    }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#">Contactos</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="col-xs-12">
                <h4 class="Titulo_Pagina">
                    Lista de contactos - WhatsApp / Correo electrónico
                </h4>
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        
                        <div class="center text-center">
                        <a href="./masivoFiltros" class="btn btn-outline-info rounded-pill">
                                <i class="fas fa-plus"></i>
                                Editar filtros personalizados
                            </a>
                        </div>
                        <hr>


                        <div class="box-body table-responsive">
                            <table id="Tabla_Rapida_AJAX" class="table table-bordered table-striped w-100" style="font-size:18px; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Numero</th>
                                        <th>Filtro</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
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
<?php
include("../footer.php");
?>

<?php
// select filtros 
$queryFiltros = "SELECT * from ws_filtro where activo = 1 and ID_principal = '{$_SESSION['ID_principal']}'";
$resultFiltros = mysqli_query($conn3, $queryFiltros);
$rowFiltros = [];
while ($row = mysqli_fetch_array($resultFiltros)) {
    $rowFiltros[] = $row;
}
// select indicativos
$queryIndicativos = "SELECT numero from indicativos";
$resultIndicativos = mysqli_query($conn3, $queryIndicativos);
$rowIndicativos = [];
while ($rowIndi = mysqli_fetch_array($resultIndicativos)) {
    $rowIndicativos[] = $rowIndi;
}
?>


<script>
    //version 2 tabla rapida id="Tabla_Rapida_AJAX"
    var titulo_tabla = "Contactos";
    query_tabla_ajax = "<?= "SELECT * from cliente where (ID_principal = '{$_SESSION['ID']}' OR ID_principal = '{$_SESSION['ID_principal']}')"; ?>";
    const filtros = <?= json_encode($rowFiltros) ?>;
    const indicativos = <?= json_encode($rowIndicativos) ?>;
    // console.log(query_tabla_ajax);    
    columnas = ['cliente_id', 'nombre_cliente', 'CODI_CLIENTE', 'direccion_cliente', 'telefono_cliente', 'whatsapp', 'correo_cliente', 'estado', 'filtro_ws', 'habeasdata', 'indicativo', 'celular_cliente'];

    columnastablas = [{
            "data": "nombre_cliente"
        },
        {
            "data": "whatsapp"
        },
        {
            "data": "filtro_ws"
        },
        {
            "data": function(row, type, set) {
                datos = ``;

                datos += `
                <button type="button" class="btn btn-outline-secondary rounded-pill" data-toggle="modal" data-target="#nuevoFiltro${row.cliente_id}" onclick="$('#nuevoFiltro${row.cliente_id} .select2').select2()" title="Editar ${row.nombre_cliente}">
                                            <li class="fas fa-cog"></li>
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="nuevoFiltro${row.cliente_id}" role="dialog" aria-labelledby="modelTitleId" style="overflow:auto;" aria-hidden="true">
                                            <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-info">
                                                        <h5 class="modal-title">Filtros - ${row.nombre_cliente} - ${row.whatsapp}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>                                                    
                                                    <form id="updateForm${row.cliente_id}">
                                                        <div class="modal-body">                                                        
                                                            <div class="col-md-12">
                                                                <div class="row">
                                                                    <div class="col-md-12 form-group">
                                                                        <label for="nombre">Nombre</label>
                                                                        <input type="text" class="form-control input-lg" name="datos[nombre_cliente]" id="nombre" value="${row.nombre_cliente}" style="width: 100%;" required>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12 form-group">
                                                                        <label for="correo_cliente">Email </label>
                                                                        <input type="email" class="form-control input-lg" name="datos[correo_cliente]" id="correo_cliente" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" value="${row.correo_cliente}" style="width: 100%;">
                                                                    </div>
                                                                </div>
                                                                                                                                
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <label for="">Indicativo</label>
                                                                        <select name="datos[indicativo]" id="indicativo${row.cliente_id}" class="form-control input-lg select2" style="width:100% ;" required>
                                                                            `;
                for (let i = 0; i < indicativos.length; i++) {
                    datos += `<option value="${indicativos[i].numero}" ${(row.indicativo == indicativos[i].numero ? "selected" : '')} >${indicativos[i].numero}</option>`;
                }
                datos += `
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <label for="">Número</label>
                                                                        <input type="number" class="form-control input-lg" style="width:100%;" name="datos[celular_cliente]" id="numero" value="${row.celular_cliente}" required oninput="document.getElementById('whatsapp${row.cliente_id}').value = document.getElementById('indicativo${row.cliente_id}').value + this.value">
                                                                        <input type="hidden" id="whatsapp${row.cliente_id}" name="datos[whatsapp]" value="${row.whatsapp}">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12 form-group">
                                                                        <label for="">Filtros Personalizados</label>
                                                                        <select name="datos[filtro_ws][]" id="filtro" class="form-control input-lg select2" style="width:100%;" multiple>
                                                                            `;
                let dato = [];
                if (row.filtro_ws != null) {
                    dato = row.filtro_ws.split('||');
                } else {
                    dato = [];
                }

                for (let i = 0; i < filtros.length; i++) {
                    if (dato.includes(filtros[i].filtro)) {
                        datos += `<option value="${filtros[i].filtro}" selected>${filtros[i].filtro}</option>`;
                    } else {
                        datos += `<option value="${filtros[i].filtro}">${filtros[i].filtro}</option>`;
                    }
                }
                datos += `
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>                                                            
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-outline-secondary rounded-pill" data-dismiss="modal">Cerrar</button>
                                                            <button type="submit" class="btn btn-outline-info rounded-pill" onclick="$('#updateForm${row.cliente_id}').automaticForm({type:2,idUpdate:'${row.cliente_id}',table:'cliente',reload:'',page:'masivoContactos'});" >Actualizar</button>                                                            
                                                        </div>                                                    
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                
                
                `;

                datos += `<a href="#" onclick="automaticUpdate('${(row.habeasdata == 'Si' ? 'No' : 'Si')}','habeasdata','cliente', ${row.cliente_id},'masivoContactos');" class="btn btn-outline-${(row.habeasdata == 'Si' ? 'success' : 'danger')} rounded-pill" title="${(row.habeasdata == 'Si' ? 'Desactivar' : 'Activar')} Contacto"><i class="fas fa-power-off"></i></a>`;

                return datos;
            }
        },
    ];
</script>