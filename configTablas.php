<?php
include 'header.php';
include 'menu.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <!-- <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#">Mis Historias Creadas</a></li>
        </ol>
    </section> -->
    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="col-xs-12">
                <h4 class="Titulo_Pagina">Mis Historias Creadas</h4>
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">

                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Nueva historia <?= $NOMBRE_DB_GLOBAL?></h3>
                            </div>

                            <form id="registroHistoria">
                                <div class="card-body">
                                    <input type="hidden" id="idUsuario" name="datos[idUsuario]" value="<?= $_SESSION['ID'] ?>">
                                    <input type="hidden" id="fecha" name="datos[fecha]" value="<?= date('Y-m-d') ?>">
                                    <input type="hidden" id="hora" name="datos[hora]" value="<?= date('H:i:s') ?>">
                                    <input type="hidden" id="HPnombre" name="datos[nombre]" value="">
                                    <input type="hidden" id="action" name="datos[action]" value="configProcesarFormulario.php">
                                    <input type="hidden" id="method" name="datos[method]" value="POST">
                                    <input type="hidden" id="id_Form" name="datos[id_Form]" value="">
                                    <input type="hidden" id="HPname" name="datos[name]" value="">
                                    <input type="hidden" id="enctype" name="datos[enctype]" value="multipart/form-data">
                                    <input type="hidden" id="boton" name="datos[boton]" value="Guardar">
                                    <input type="hidden" id="HPmenuNombre" name="datos[menuNombre]" value="">
                                    <input type="hidden" id="typeBoton" name="datos[typeBoton]" value="submit">
                                    <input type="hidden" id="classBoton" name="datos[classBoton]" value="btn btn-block btn-outline-info btn-sm">
                                    <input type="hidden" id="activo" name="datos[activo]" value="1">

                                    <div class="form-group">
                                        <label for="titulo">Nombre</label>
                                        <input required minlength="5" type="text" class="form-control" id="titulo" name="datos[titulo]" placeholder="Cual es el nombre de la historia?" oninput="
                                  $('#HPnombre').val(this.value);
                                  $('#HPname').val('historia_<?= $_SESSION['ID'] ?>_'+this.value.toLowerCase().normalize('NFD').replace(/[\u0300-\u036f]/g, '').replace(/\s+/g, '')+Math.floor(Math.random() * 99999999999));
                                  $('#HPmenuNombre').val(this.value);
                                  "></div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-outline-info rounded-pill" onclick="$('#registroHistoria').automaticForm({type:1,idUpdate:'',table:'configTablas',reload:'',page:'misHistorias',db: '<?= $NOMBRE_DB_GLOBAL ?>',sweetalert2:false});">
                                        <i class="fas fa-save mr-2"></i> Guardar
                                    </button>
                                </div>
                            </form>

                        </div>


                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Mis Historias</h3>
                            </div>
                            <div class="card-body">
                                <table id="Tabla_Rapida_AJAX" class="table table-bordered table-striped" style="font-size:18px">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Activo</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                </table>
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
<!-- /.content-wrapper -->


<script>
    //version 2 tabla rapida id="Tabla_Rapida_AJAX"
    var titulo_tabla = "Pacientes";

    query_tabla_ajax = "<?= "SELECT * from configTablas where activo = 1"; ?>";
    columnas = ['id', 'fecha', 'hora', 'titulo', 'nombre', 'action', 'method', 'id_Form', 'name', 'enctype', 'boton', 'menuNombre', 'typeBoton', 'classBoton', 'activo'];

    columnastablas = [{
            "data": "titulo"
        },
        {
            "data": function(row, type, set) {
                let activo = "";
                if (row.activo == 1) {
                    // desactivar
                    activo += "Activo";
                } else {
                    // activar
                    activo += "Inactivo";
                }
                return activo;
            }
        },

        {
            "data": function(row, type, set) {
                botones = "";
                botones += "<a class='btn btn-info rounded-pill m-1' href='creadorHistorias.php?ih=" + btoa(row.id) + "' title='Editar Historia'><i class='fas fa-edit'></i> Editar </a>";
                if (row.activo == 1){
                    botones += `| <button class='btn btn-danger rounded-pill m-1' title='Desactivar' onclick="automaticUpdate(0, 'activo', 'configTablas', ${row.id}, 'misHistorias')" ><i class='fas fa-times'></i> Desactivar </button>`;
                }else{
                    // botones += "<button class='btn btn-info' href='creadorHistorias.php?ih=" + btoa(row.id) + "' title='Editar Historia'><i class='fas fa-edit'></i> Editar </button>";
                }                
                return botones;
            }
        }
    ];
</script>

<?php include("footer.php"); ?>