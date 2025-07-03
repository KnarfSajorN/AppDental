<?php
try {

    require_once './header.php';
    require_once './menu.php';

    $fecha = date("Y-m-d");

    $id = decrypt($_GET['id']);
    $ID_principal = $_SESSION['ID_principal'];
    $QueryUsers = "SELECT ID, NOMBRE_USUARIO FROM usuarios WHERE ID_principal = '$ID_principal'";
    $ResultUsers = mysqli_query($conn3, $QueryUsers);
    $OptionsUsers = "";
    foreach ($ResultUsers as $RowUser) {
        $OptionsUsers .= "<option value='" . $RowUser['ID'] . "'>" . $RowUser['NOMBRE_USUARIO'] . "</option>";
    }

    $cliente_id         = funcionMaster($id, 'idOperacion', 'idCliente', 'sOperacionInv ');
    $nombre_cliente     = funcionMaster($cliente_id, 'cliente_id', 'nombre_cliente', 'cliente ');
    $documente_cliente  = funcionMaster($cliente_id, 'cliente_id', 'CODI_CLIENTE', 'cliente ');
    $correo_cliente     = funcionMaster($cliente_id, 'cliente_id', 'correo_cliente', 'cliente ');
    $whatsapp_cliente   = funcionMaster($cliente_id, 'cliente_id', 'whatsapp', 'cliente ');

    $QueryCitas = "SELECT soperacioninv_id FROM citas WHERE soperacioninv_id = '$id'";
    $ResultCitas = mysqli_query($conn3, $QueryCitas);
    if (!$ResultCitas) {
        throw new Exception("Ocurrio un error", 1);
    }


    $crearCitas = true;
    if (mysqli_num_rows($ResultCitas) > 0) {
        $crearCitas = false;
        // echo "bad";
        // echo "<script>
        //         Swal.fire({
        //             icon: 'error',
        //             title: 'Error',
        //             text: 'Todas las citas de este presupuesto ya fueron agendadas',
        //         });

        //         history.back();
        //     </script>";
        // die();
    }



?>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>

    <link rel="stylesheet" href="<?= $Base ?>/css/emoji.css">
    <div class="content-wrapper p-3">
        <!-- Main content -->
        <section class="content">
            <div class="">
                <div class="col-xs-12">
                    <div class="col-md-12 row">

                        <div class="row">


                        </div>
                        <div class="col-md-12">
                            <div class="card card-info">
                                <div class="card-header">
                                    <div class="float-left">
                                        <h4> Plan de atencion - Presupuesto de odontograma N° <?= $id ?></h4>
                                        <h6> <b>Cliente: </b> <?= $nombre_cliente ?> - <b>Documento: </b> <?= $documente_cliente ?></h6>
                                    </div>
                                </div>
                                <form>
                                    <input type="hidden" id="sdetalle_oper_id" value="<?= $id ?>">

                                    <div class="card-body row">

                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 30%;">Producto/Servicio</th>
                                                        <th style="width: 30%;">Doctor</th>
                                                        <th style="width: 13%;">Fecha</th>
                                                        <th style="width: 13%;">Hora</th>
                                                        <th style="width: 13%;">Tipo</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="citasList">
                                                    <?php


                                                        $QueryDetalle = "SELECT * FROM sDetalleOper WHERE idOperacion = '$id' ";
                                                        $ResultDetalle = mysqli_query($conn3, $QueryDetalle);
                                                        foreach ($ResultDetalle as $indexRow => $RowDetalle) {
                                                            
                                                            $idProducto = $RowDetalle["idProducto"];
                                                            $descripcion = $RowDetalle["descripcion"];

                                                            $QueryCitas = "SELECT * FROM citas WHERE sdetalleoper_id = '{$RowDetalle["id"]}'  ";
                                                            $ResultCitas = mysqli_query($conn3, $QueryCitas);
                                                            $citas = 0;
                                                            if ($ResultCitas) {
                                                                $citas = mysqli_num_rows($ResultCitas);
                                                            }

                                                            if ($citas > 0) {
                                                                continue;
                                                            }
                                                    ?>
                                                            <tr id="filaCitaList<?= $indexRow ?>">
                                                                <td style="width: 30%;">
                                                                    <input type="hidden" name="datos[<?= $indexRow ?>][sdetalleoper_id]" value="<?=$RowDetalle["id"]?>">
                                                                    <input type="hidden" name="datos[<?= $indexRow ?>][descripcion]" value="<?=$descripcion?>">

                                                                    <select class="select2" name="datos[<?= $indexRow ?>][idProducto]" style="width:100%">
                                                                        <option value="<?= $idProducto ?>"><?= $descripcion ?></option>
                                                                    </select>
                                                                </td>
                                                                <td style="width: 30%;">
                                                                    <select class="select2" style="width:100%" onchange="validarHorarios(<?= $indexRow ?>)" name="datos[<?= $indexRow ?>][doctor]">
                                                                        <option value="">Seleccione</option>
                                                                        <?= $OptionsUsers ?>
                                                                    </select>
                                                                </td>
                                                                <td style="width: 13%;">
                                                                    <input type="date" min="<?= date('Y-m-d') ?>" onchange="validarHorarios(<?= $indexRow ?>)" name="datos[<?= $indexRow ?>][fecha]" value="<?= date("Y-m-d") ?>" class="form-control">
                                                                </td>
                                                                <td style="width: 13%;">
                                                                    <input type="time" onchange="validarHorarios(<?= $indexRow ?>)" name="datos[<?= $indexRow ?>][hora]" value="" class="form-control">
                                                                </td>
                                                                <td style="width: 13%;">
                                                                    <select class="select2" style="width:100%" name="datos[<?= $indexRow ?>][tipo]">
                                                                        <option value="0">Presencial</option>
                                                                        <option value="1">Virtual</option>
                                                                    </select>
                                                                </td>
                                                            </tr>

                                                    <?php  } ?>
                                                    <tr>
                                                        <th colspan="5" class="text-center">Citas agendadas</th>
                                                    </tr>
                                                    <tr>
                                                        <th style="width: 30%;">Producto/Servicio</th>
                                                        <th style="width: 30%;">Doctor</th>
                                                        <th style="width: 13%;">Fecha</th>
                                                        <th style="width: 13%;">Hora</th>
                                                        <th style="width: 13%;">Tipo</th>
                                                    </tr>
                                                    <?php 
                                                        $QueryCitas = "SELECT * FROM citas WHERE soperacioninv_id = '$id'  ";
                                                        $ResultCitas = mysqli_query($conn3, $QueryCitas);

                                                        foreach ($ResultCitas as $RowCitas) { 
                                                            $presupuesto_odontograma_detalle_id = $RowCitas["oddetalleoper_id"]; 

                                                            $QueryDetalleOdontograma = "SELECT * FROM OP_PresupuestoDetalle WHERE id = '$presupuesto_odontograma_detalle_id'";
                                                            $ResultDetalleOdontograma = mysqli_query($conn3, $QueryDetalleOdontograma);
                                                            $RowDetalleOdontograma = mysqli_fetch_assoc($ResultDetalleOdontograma);



                                                        ?>
                                                        <tr>
                                                                <td style="width: 15%;">
                                                                    <?= funcionMaster($RowCitas["sinvetrios_id"], "ID", "descripcion", "sinvetrios")  ?>
                                                                </td>
                                                                <td style="width: 15%;">
                                                                    <?= funcionMaster($RowCitas["doctor"], "ID", "NOMBRE_USUARIO", "usuarios") ?>
                                                                </td>
                                                                <td style="width: 10%;">
                                                                    <?=$RowCitas["fecha"]?>
                                                                </td>
                                                                <td style="width: 10%;">
                                                                    <?=$RowCitas["Hora"]?>
                                                                </td>
                                                                <td style="width: 10%;">
                                                                    <?=$RowCitas["tipo"] == '0' ? 'Presencial' : 'Virtual'?>
                                                                </td>
                                                            </tr>
                                                        
                                                        <?php 
                                                        } 
                                                    ?>

                                                </tbody>
                                                <tfoot>
                                                        <tr>
                                                            <td colspan="2">
                                                                <label for="">Email</label>
                                                                <input class="form-control" type="email" id="correo_cliente" value="<?= $correo_cliente ?>">
                                                            </td>
                                                            <td colspan="3">
                                                                <label for="">Whatsapp</label>
                                                                <input class="form-control" type="text" id="whatsapp_cliente" value="<?= $whatsapp_cliente ?>">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="5" class="text-end">
                                                                <button class="btn btn-md rounded-pill btn-outline-info" id="btnSubmit" type="button" onclick="guardarCitas()">
                                                                    <i class="fas fa-plus"></i>&nbsp;Guardar
                                                                </button>
                                                            </td>
                                                        </tr>

                                                </tfoot>
                                            </table>

                                        </div>

                                    </div>
                                    <div class="card-footer"> </div>
                                </form>
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

    <?php require_once './footer.php'; ?>

    <script type="text/javascript">
        const AjaxPath = '<?= $Base ?>Ajax_AgendaPresupuesto.php';
        const BasePATH = '<?=$Base?>';
        const sucursal = '<?= $_SESSION["sucursal"] ?>';
        const ID_principal = '<?= $_SESSION["ID_principal"] ?>';
        const usuario_id = '<?= $_SESSION["ID"] ?>';
        const cliente_id = '<?= $cliente_id ?>';
        const idOperacion = '<?= $id ?>';

        const obtenerDatosTabla = () => {
            const detalle = [];
            const filasCitasList = $("#citasList tr");
            filasCitasList.each( function() {

                const idFila = $(this).attr("id");
                if (idFila) {
                    const indice = idFila.replace("filaCitaList", "");
                    
    
    
                    const descripcion      = $(`input[name='datos[${indice}][descripcion]']`).val();
                    const sdetalleoper_id  = $(`input[name='datos[${indice}][sdetalleoper_id]']`).val();
                    const idProducto       = $(`select[name='datos[${indice}][idProducto]']`).val();
                    const fecha            = $(`input[name='datos[${indice}][fecha]']`).val();
                    const hora             = $(`input[name='datos[${indice}][hora]']`).val();
                    const doctor           = $(`select[name='datos[${indice}][doctor]']`).val();
                    const tipo             = $(`select[name='datos[${indice}][tipo]']`).val();
    
                    const dataDetalle = {
                        descripcion,
                        doctor,
                        fecha,
                        hora,
                        idProducto,
                        sdetalleoper_id,
                        tipo,
                    };
    
    
    
                    const tieneVacio = Object.values(dataDetalle).some(value => !value);
    
                    console.log("validando...", dataDetalle);
                    
                    if (!tieneVacio) {
                        console.log("Incluido");
                        
                        detalle.push(dataDetalle);
                    }else{
                        console.log("No Incluido");
    
                    } 
                    
                }
                

            });


            return detalle;

        }

        const guardarCitas = () => {
            const id                = $("#sdetalle_oper_id").val(); 
            const correo_cliente    = $("#correo_cliente").val(); 
            const whatsapp_cliente  = $("#whatsapp_cliente").val(); 
            const datosTabla        = obtenerDatosTabla();

            console.log("datosTabla", datosTabla);

            const procedimientoListItems = datosTabla.map(item => {
                const { descripcion } = item;
                return `<li class="list-group-item">${descripcion}</li>`;
            }).join("");
            
            if(datosTabla.length == 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'No hay citas para agendar',
                });

                return;
            };

            Swal.fire({
                title: '¿Estás seguro? Solamente se crearan citas para los siguientes procedimientos',
                html: `<ul class="list-group">${procedimientoListItems}</ul>`,
                icon: 'info',
                showCancelButton: true,
                confirmButtonText: 'Sí',
                cancelButtonText: 'No',
            }).then((result) => {
                const data = {
                    detalle: JSON.stringify(datosTabla),
                    id,
                    ID_principal,
                    sucursal,
                    usuario_id,
                    cliente_id,
                    correo_cliente,
                    whatsapp_cliente,
                    type: 'guardar',
                }
    
    
                console.log("data" , data);
                // return;

                if (result.isConfirmed) {

                    // return;
        
                    $.ajax({
                        url: AjaxPath,
                        method: 'POST',
                        data,
                        success: function(result) {
        
                            const response = JSON.parse(result);
                            const { error, status, message, data } = response;
        
                                Swal.fire({
                                    icon:  status ? "success" : 'error',
                                    title: status ? "Correcto" :  'Error',
                                    text: message
                                });
        
                            if(error) console.log("error =>" , error);
                            if(status) { setTimeout(() => { window.location.href = BasePATH + "SclienteAdministracion_ControlPresupuesto";}, 1000) };
                            // if(status) { setTimeout(() => { history.back(); }, 1000) };
                            
        
                        }
                    });
                }
            });



        }


        const validarHorarios = (indice) => {
            const fecha = $(`input[name='datos[${indice}][fecha]']`);
            const hora  = $(`input[name='datos[${indice}][hora]']`);
            const doctor= $(`select[name='datos[${indice}][doctor]']`);


            const data = {
                doctor: doctor.val(),
                fecha: fecha.val(),
                hora: hora.val(),
                type: 'consultar_horarios',
            };

            // console.log("data", data);
            

            const tieneVacio = Object.values(data).some(value => !value);
            if (tieneVacio) return;     

            $.ajax({
                url: AjaxPath,
                method: 'POST',
                data,
                success: function(result) {
                    console.log("result", result);
                    

                    const response = JSON.parse(result);
                    const { error, status, message } = response;

                    if (!status) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            html: message
                        });

                        fecha.val("");
                        hora.val("");

                        return;
                    }

                    console.log("error " , error);
                    

                }
            });

        };




    </script>


    <style>
        #table {
            overflow-y: scroll;
        }

        /* Estiliza la barra de desplazamiento en general */
        #table::-webkit-scrollbar {
            width: 10px;
            /* Ancho de la barra vertical */
            height: 10px;
            /* Altura de la barra horizontal */
        }

        /* Estiliza el riel de la barra (fondo) */
        #table::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 5px;
        }

        /* Estiliza el pulgar (la parte que se mueve) */
        #table::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 5px;
        }

        /* Cambia el color al pasar el mouse */
        #table::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
    </style>

<?php
} catch (\Throwable $th) {
    echo "<script>alert(`" . $th->getMessage() . " Linea: " . $th->getLine() . "`);</script>";
}

?>