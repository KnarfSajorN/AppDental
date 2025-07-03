<?php
include '../header.php';
include '../menu.php';

$ID = $_SESSION['ID'];
$tabla = "asistenteVirtualConfig";
$page = 'asistente';
?>
<!-- <script src="https://cdn.jsdelivr.net/npm/qrious@4.0.2/dist/qrious.min.js"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/qrious@4.0.2/dist/qrious.min.js"></script> -->
<link rel="stylesheet" href="<?= $Base ?>QR_RegistroPaciente/estilosSwitch.css">
<div class="content-wrapper p-3">
    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="col-xs-12">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <h4 class=""><i class="fa fa-qrcode"></i> &nbsp; QR para registro de pacientes </h4>
                            </div>
                            <div class="col-md-12" style="padding-top: 10px">
                                <table class="table" id="tablaUsers" style="width:100%; margin-top: 10px">
                                    <thead>
                                        <tr>
                                            <th style="width: 40%">Usuario</th>
                                            <th style="width: 20%">Registro básico</th>
                                            <th style="width: 20%">Dictado por voz</th>
                                            <th style="width: 20%">Activo/Inactivo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $query = "SELECT NOMBRE_USUARIO,ID FROM usuarios WHERE ACTIVO = 1 AND TIPO = 99 ";
                                            $result = mysqli_query($conn3,$query);
                                            foreach ($result as $key ) {
                                                $queryConfigAV = "SELECT id FROM asistenteVirtualConfig WHERE usuarioId = '{$key['ID']}' AND activo = 1 ";

                                                $boton = "";
                                                $botonIA = "";

                                                $enlaceBoton = funcionMaster($key['ID'], "ID_Usuario", "enlaceRegistroPaciente", "config");
                                                $enlaceBotonIA = funcionMaster($key['ID'], "ID_Usuario", "enlaceRegistroPaciente_IA", "config");
                                                $disponible = funcionMaster($key['ID'], "ID_Usuario", "enlaceActivo", "config");
                                                $disponibleIA = mysqli_num_rows(mysqli_query($conn3, $queryConfigAV));

                                                $boton = '<button class="btn btn-outline-'.(($enlaceBoton <> "") ? 'success' : 'primary').' rounded-pill" onclick="'.(($enlaceBoton <> "") ? 'verQr('.$key['ID'].')' : 'crearQr('.$key['ID'].')').'"><i class="'. (($enlaceBoton <> "") ? 'fas fa-qrcode' : 'fas fa-info').'"></i> &nbsp;'. (($enlaceBoton <> "") ? 'Ver codigo qr' : 'Crear codigo qr').'</button>';

                                                if ($disponibleIA == 1) {
                                                    $botonIA = '<button class="btn btn-outline-'.(($enlaceBotonIA <> "") ? 'success' : 'primary').' rounded-pill" onclick="'.(($enlaceBotonIA <> "") ? 'verQr_IA('.$key['ID'].')' : 'crearQr_IA('.$key['ID'].')').'"><i class="fas fa-microphone"></i> &nbsp;<i class="'. (($enlaceBotonIA <> "") ? 'fas fa-qrcode' : 'fas fa-info').'"></i> &nbsp;'. (($enlaceBotonIA <> "") ? 'Ver codigo qr' : 'Crear codigo qr').'</button>';
                                                }else{
                                                    $botonIA = '<button class="btn btn-outline-danger rounded-pill" onclick="mensaje()"><i class="fas fa-microphone"></i> &nbsp;<i class="fas fa-ban"></i> &nbsp;No disponible</button>';
                                                }
                                                
                                                

                                                $botonActivar = '<label class="switch">
                                                                    <input type="checkbox" onchange="activarQr('.$key['ID'].', this)" '.(($disponible == 1) ? 'checked' : '').'>
                                                                    <span class="slider"></span>
                                                                </label>';

                                                ?>
                                            <tr>
                                                <td style="width: 40%"><?= $key['NOMBRE_USUARIO'] ?></td>
                                                <td style="width: 20%">
                                                    <?= $boton ?>
                                                </td>
                                                <td style="width: 20%">
                                                    <?= $botonIA ?>
                                                </td>
                                                <td style="width: 20%">
                                                    <?= $botonActivar ?>
                                                </td>
                                            </tr>
                                        <?php } ?>

                                    </tbody>
                                </table>

                                <div class="card-footer">
                                    <input type="hidden" name="datos[activo]" value="1">
                                    <input type="hidden" name="datos[usuarioId]" value="<?= $ID ?>">
                                    <input type="hidden" name="datos[fecha]" value="<?= date('y-m-d H:i:s') ?>">
                                </div>
                            </div>
                        </div>
                    </div>

                    
            </div>
            <!-- /.row -->
    </section>
    <!-- /.content -->

</div>
<div id="ModalQR" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-info">
          <h4 class="modal-title" id="header-modal-qr"></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body" id="body-modal-qr">
        <h5 id="header-body-modal-qr"></h5>
        <div id="content-modal-qr-body" style="width: 100%; display: flex; justify-content: center"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>



<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.6/css/jquery.dataTables.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.6/js/jquery.dataTables.js"></script>
<script>
    function generarQr(enlace, div){
        // setTimeout(() => {
        //     var qr = new QRious({
        //         element: document.getElementById(div),
        //         value: enlace,
        //         size: 300 // Tamaño del código QR
        //     });
        //     console.log(qr);
        //     console.log("Se activo");
        // }, 1000);
        
        let tamano = 400;
        // let enlace = enlace;
        let qr = document.getElementById(div);
        //qr.innerHTML = '<img src=" https://api.qrserver.com/v1/create-qr-code/?size=' + tamano + 'x' + tamano + '&data=' + enlace + '">';
        qr.innerHTML = '<img src="https://chart.googleapis.com/chart?cht=qr&chs=' + tamano + 'x' + tamano + '&chl=' + enlace + '">';
    }
</script>
<script>
    $(document).ready(function() {
        $('#tablaUsers').DataTable();
    });

    function mensaje() {
        Swal.fire({
        title: 'Accion no válida',
        text: 'Este usuario aun no ha activado su asistente virual. Configure el asistente virtual e intente nuevamente',
        icon: 'warning',
        showClass: {
            popup: 'animate__animated animate__fadeInDown'
        },
        hideClass: {
            popup: 'animate__animated animate__fadeOutUp'
        }
        });
    }

    function crearQr(idUsuario) {
        $.ajax({
            url: 'QR_RegistroPaciente/Ajax_CodigoQr.php',
            type: 'POST',
            data: {
                idUsuario,
                tipo: "Crear_QR"
            }, 
            success: function(response) {
                var dataJson = JSON.parse(response);
                var cQR = atob(dataJson.link);

                if (dataJson.status == "success") {
                    $("#ModalQR").modal("show");
                    $("#header-modal-qr").html("Codigo QR - Registro de paciente - " + dataJson.nombreUsuario);
                    $("#header-body-modal-qr").html("Escanee este codigo para registrar un paciente del especialista - " + dataJson.nombreUsuario);
                    generarQr(cQR, 'content-modal-qr-body')
                }else{
                    console.log(dataJson.query);
                    Swal.fire({
                        title: 'Error',
                        text: 'Ocurrió un error al activar el QR',
                        icon: 'error',
                        showClass: {
                            popup: 'animate__animated animate__fadeInDown'
                        },
                        hideClass: {
                            popup: 'animate__animated animate__fadeOutUp'
                        }
                    });
                }

            },
            error: function(xhr, status, error) {
            console.log('Error en la petición AJAX: ' + error);
            }
        });
    }
    function verQr(idUsuario) {
        $.ajax({
            url: 'QR_RegistroPaciente/Ajax_CodigoQr.php',
            type: 'POST',
            data: {
                idUsuario,
                tipo: "Consultar_QR"
            }, 
            success: function(response) {
                var dataJson = JSON.parse(response);
                var cQR = atob(dataJson.link);

                console.log("El enlace es " + cQR);

                if (dataJson.status == "success") {
                    $("#ModalQR").modal("show");
                    $("#header-modal-qr").html("Codigo QR - Registro de paciente - " + dataJson.nombreUsuario);
                    $("#header-body-modal-qr").html("Escanee este codigo para registrar un paciente del especialista <b> " + dataJson.nombreUsuario + "</b>");
                    generarQr(cQR, 'content-modal-qr-body')
                }else{
                    console.log(dataJson.query);
                    Swal.fire({
                        title: 'Error',
                        text: 'Ocurrió un error al activar el QR',
                        icon: 'error',
                        showClass: {
                            popup: 'animate__animated animate__fadeInDown'
                        },
                        hideClass: {
                            popup: 'animate__animated animate__fadeOutUp'
                        }
                    });
                }

            },
            error: function(xhr, status, error) {
            console.log('Error en la petición AJAX: ' + error);
            }
        });
    }

    function activarQr(idUsuario, input) {
        if (input.checked == true) {
            estado = 1;
        }else{
            estado = 0;
        }

        $.ajax({
            url: 'QR_RegistroPaciente/Ajax_CodigoQr.php',
            type: 'POST',
            data: {
                estado,
                idUsuario,
                tipo: "Activar_Desactivar"
            },
            success: function(response) { 
            },
            error: function(xhr, status, error) { 
            console.log('Error en la petición AJAX: ' + error);
            }
        });

    }
    


</script>

<!-- =========== FUNCIONES PARA DICTADO POR VOZ ===================== -->
<script>
    function crearQr_IA(idUsuario) {
        $.ajax({
            url: 'QR_RegistroPaciente/Ajax_CodigoQr.php',
            type: 'POST',
            data: {
                idUsuario,
                tipo: "Crear_QR_IA"
            }, 
            success: function(response) {
                var dataJson = JSON.parse(response);
                var cQR = atob(dataJson.link);

                if (dataJson.status == "success") {
                    $("#ModalQR").modal("show");
                    $("#header-modal-qr").html("Codigo QR - Registro de paciente - " + dataJson.nombreUsuario);
                    $("#header-body-modal-qr").html("Escanee este codigo para registrar un paciente por dictado de voz al especialista - " + dataJson.nombreUsuario);
                    generarQr(cQR, 'content-modal-qr-body')
                }else{
                    console.log(dataJson.query);
                    Swal.fire({
                        title: 'Error',
                        text: 'Ocurrió un error al activar el QR',
                        icon: 'error',
                        showClass: {
                            popup: 'animate__animated animate__fadeInDown'
                        },
                        hideClass: {
                            popup: 'animate__animated animate__fadeOutUp'
                        }
                    });
                }

            },
            error: function(xhr, status, error) {
            console.log('Error en la petición AJAX: ' + error);
            }
        });
    }

    
    
    function verQr_IA(idUsuario) {
        $.ajax({
            url: 'QR_RegistroPaciente/Ajax_CodigoQr.php',
            type: 'POST',
            data: {
                idUsuario,
                tipo: "Consultar_QR_IA"
            }, 
            success: function(response) {
                var dataJson = JSON.parse(response);
                var cQR = atob(dataJson.link);

                // console.log("El enlace es " + cQR);

                if (dataJson.status == "success") {
                    $("#ModalQR").modal("show");
                    $("#header-modal-qr").html("Codigo QR - Registro de paciente - " + dataJson.nombreUsuario);
                    $("#header-body-modal-qr").html("Escanee este codigo para registrar un paciente por dictado de voz al especialista <b> " + dataJson.nombreUsuario + "</b>");
                    generarQr(cQR, 'content-modal-qr-body')
                }else{
                    console.log(dataJson.query);
                    Swal.fire({
                        title: 'Error',
                        text: 'Ocurrió un error al activar el QR',
                        icon: 'error',
                        showClass: {
                            popup: 'animate__animated animate__fadeInDown'
                        },
                        hideClass: {
                            popup: 'animate__animated animate__fadeOutUp'
                        }
                    });
                }

            },
            error: function(xhr, status, error) {
            console.log('Error en la petición AJAX: ' + error);
            }
        });
    }

</script>
<!-- /.content-wrapper -->
<?php
include '../footer.php';?>