<?php
include '../header.php';
include '../menu.php';
include '../../masterFunciones.php';


// recibir los datos
$ID = $_SESSION['ID'];
$Correo = $_GET['clienteId'];
$whatsapp = $_GET['telefono'];
$idCitas = $_GET['idCitas'];

// obtener el código del sistema
$esteSistema = $_SERVER['REQUEST_URI'];
$esteSistema = str_replace('/', ',', $esteSistema);
$esteSistema = explode(",", $esteSistema);

$serverVideoconsulta = 'localhost';
$userVideoconsulta = 'medicaso_rootBase';
$passVideoconsulta = '5qA?o]t6d-h25qA?o]t6d-h2';
$dbnameVideoconsulta = 'medicaso_videoConsulta';
$connVideoconsulta = mysqli_connect($serverVideoconsulta, $userVideoconsulta, $passVideoconsulta, $dbnameVideoconsulta) or die('Ha fallado la conexion MySQL: ' . mysqli_error($connVideoconsulta));

// var_dump($connVideoconsulta);

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#">Video consulta</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="col-md-12">
                <h4 class="Titulo_Pagina">Video consulta</h4>

                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <?php
                        $queryCita = mysqli_query($conn3, "SELECT * FROM  citas  where idCitas= $idCitas");
                        if($queryCita){
                            while ($row_recordset32 = mysqli_fetch_array($queryCita)) {
                                $idCitas      = $row_recordset32['idCitas'];
                                $Doctor = $row_recordset32['doctor'];
                                $fecha = $row_recordset32['fecha'];
                                $Hora = $row_recordset32['Hora'];
                                $nombre = $row_recordset32['nombre'];
                                $telefono = $row_recordset32['telefono'];
                                $correo = $row_recordset32['correo'];
                                $motivoConsulta = $row_recordset32['motivoConsulta'];
                                $activo = $row_recordset32['activo'];
                                $estado = $row_recordset32['estado'];
                                $idCliente = $row_recordset32['idCliente'];
                                $estadoVideo = $row_recordset32['estadoVideo'];
                            }
                        }
                        

                        mysqli_query($conn3, "UPDATE citas set estadoVideo = 1 where idCitas= $idCitas limit 1");

                        $queryList = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario=$ID");
                        if ($queryList) {
                            while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                $nombreF = $rowMotorizado['nombreF'];
                                $telefonoF = $rowMotorizado['telefonoF'];
                                $direccionF = $rowMotorizado['direccionF'];
                                $emailF = $rowMotorizado['emailF'];
                            }
                        }

                        

                        // si estadoVideo es 0 se crea un registro en la base de datos de las video consultas, del caso opuesto solo se consulta y se muestra los datos

                        if ($estadoVideo == 0) {
                            // se inserta
                            $sala = encrypt(date('Y-m-d H:i:s') . $idCitas);
                            $queryInsert = "INSERT INTO salas set  sistema = '{$esteSistema[1]}', sala = '{$sala}', idCitas = '{$idCitas}', db = '$NOMBRE_DB_GLOBAL';";
                            //echo "INSERT INTO salas set  sistema = '{$esteSistema[1]}', sala = '{$sala}', idCitas = '{$idCitas}', db = '$NOMBRE_DB_GLOBAL';";
                            mysqli_query($connVideoconsulta, $queryInsert);
                            $lastInsert = mysqli_insert_id($connVideoconsulta);

                            $queryConsulta = "SELECT * FROM salas where id = '{$lastInsert}'";
                            //echo "SELECT * FROM salas where id = '{$lastInsert}'";
                            $resultConsulta = mysqli_query($connVideoconsulta, $queryConsulta);

                            if ($resultConsulta) {
                                $rowConsulta = mysqli_fetch_array($resultConsulta);
                            }
                            
                        } else {
                            // se consulta
                            $queryConsulta = "SELECT * FROM salas where idCitas = '{$idCitas}' and sistema = '{$esteSistema[1]}'";
                            // echo "SELECT * FROM salas where idCitas = '{$idCitas}' and sistema = '{$esteSistema[1]}'";
                            $resultConsulta = mysqli_query($connVideoconsulta, $queryConsulta);

                            if ($resultConsulta) {
                                $rowConsulta = mysqli_fetch_array($resultConsulta);
                            }   
                        }

                        // var_dump($rowConsulta);
                        ?>

                        <h3>Información de la sala:</h3>
                        <p><strong>Código de sala:</strong> <?= $rowConsulta['sala']; ?></p>
                        <p><strong>Apertura:</strong> <?= $rowConsulta['fechaC']; ?></p>
                        <p><strong>Estado:</strong> <?= ($rowConsulta['estado'] == 1) ? 'Abierta' : 'Finalizada'; ?></p>
                        <?php if ($rowConsulta['estado'] == 1) : ?>
                            <p class="text-info">"Esta información junto con el enlace para ingresar a la sala fue enviada por correo electrónico a <strong><?= $Correo; ?></strong> y por WhatsApp a <strong><?= $whatsapp; ?></strong>"</p>
                            <div class="row">
                                <input type="hidden" id="enlaceInvitacion" value="https://videos.sievensoft.com/room.html?r=<?= $rowConsulta['sala']; ?>&s=<?= base64_encode($rowConsulta['sistema']); ?>">
                                <div class="col-md-6 p-3">
                                    <button class="btn btn-block bnt-lg btn-outline-info rounded-pill" onclick="window.open('https://videos.sievensoft.com/room.html?r=<?= $rowConsulta['sala']; ?>&s=<?= base64_encode($rowConsulta['sistema']); ?> ', '_blank')">
                                        <i class="fa fa-video"></i> Entrar
                                    </button>
                                </div>
                                <div class="col-md-6 p-3">
                                    <form id="finalizarForm">
                                        <input type="hidden" name="datos[estado]" value="0">
                                        <input type="hidden" name="datos[fechaF]" value="<?= date('Y-m-d H:i:s'); ?>">
                                        <button class="btn btn-block bnt-lg btn-outline-danger rounded-pill" onclick="$('#finalizarForm').automaticForm({type:2,idUpdate:'<?= $rowConsulta['id'] ?>',table:'salas',reload:'',page:'videoConsultasCrearSala?idCitas=<?= $idCitas ?>&clienteId=<?= $Correo ?>&telefono=<?= $whatsapp ?>&FAID',dbHost:'localhost',dbUser:'medicaso_rootBase',dbPass:'5qA?o]t6d-h25qA?o]t6d-h2',db:'erpdental_videoConsulta'});">
                                            <i class="fa fa-video-slash"></i> Finalizar
                                        </button>
                                    </form>
                                </div>
                                <div class="col-md-12 p-3">
                                    <button class="btn btn-block bnt-lg btn-outline-primary rounded-pill" onclick="copiarEnlaceInvitacion()">
                                        <i class="fa fa-copy"></i> Copiar enlace de invitación
                                    </button>
                                </div>
                            </div>

                            <?php
                            // enviar el correo yatusabe
                            // mensaje 
                            $mailCorreo = $Correo;
                            $mailSubject = 'Inicio de video consulta';
                            $mailTitulo = 'Ingresa a la sala de video consulta';
                            $mailMensaje = '
                            <h3>Información de la sala:</h3>
                            <p><strong>Código de sala:</strong> ' . $rowConsulta['sala'] . ' </p>
                            <p><strong>Apertura:</strong> ' . $rowConsulta['fechaC'] . ' </p>
                            <a href="https://videos.sievensoft.com/room.html?r=' . $rowConsulta['sala'] . '&s=' . base64_encode($rowConsulta['sistema']) . ' ">Entrar a la sala</a>
                            ';
                            $mailBanner = '';
                            // mensaje - fin

                            include 'correoPlantilla.php';
                            // ------------------------------------------

                            // enviar WhatsApp 


                            $mensajeW = '*Video Consulta Iniciada*

Video Consulta con Dr(a) ' . $NOMBRE_USUARIO . '
https://videos.sievensoft.com/room.html?r=' . $rowConsulta['sala'] . '&s=' . base64_encode($rowConsulta['sistema']) . ' 
Atentamente:
 
' . $nombreF . '.
Teléfono ' . $telefonoF . '
Dirección ' . $direccionF  . '

Recuerde que para poder iniciar la consulta debe usar el navegador *Google Chrome*';


                            $accion = 0;
                            $cliente_id = 0;
                            $usuario_id = 0;
                            Whatsapp_sent_cliente($linkkey, $whatsapp, $mensajeW, $cliente_id, $usuario_id, $whatsapp, $accion);


                            ?>


                        <?php else : ?>
                            <p><strong>Cerrado:</strong> <?= $rowConsulta['fechaF']; ?></p>
                            <div class="row">
                                <div class="col-md-12 p-3">
                                    <button class="btn btn-block bnt-lg btn-outline-info rounded-pill" onclick="window.location.href='videoConsultas'">
                                        <i class="fas fa-arrow-left"></i> Regresar a mis consultas
                                    </button>
                                </div>
                            </div>
                        <?php endif; ?>



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


<?php
include "../footer.php";
?>

<script>
    function copiarEnlaceInvitacion() {
        navigator.clipboard.writeText(document.getElementById('enlaceInvitacion').value);
        alert('Enlace de invitación copiado');
    }
</script>
