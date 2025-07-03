<?php

// verificar tablas creadas
include '../../whatsappPersonalizadoList.php';
// include './ws_createTables.php';
include '../header.php';
include '../menu.php';
include 'loading.php';
$ID = $_SESSION['ID'];


// consulta ta tabla de correos para ver si esta configurado
$queryConfig = "SELECT * from ws_correo where usuario_id = '{$ID}';";
// var_dump($queryConfig);
$resultConfig = mysqli_query($conn3, $queryConfig);
$rowConfig = mysqli_fetch_assoc($resultConfig);
// var_dump($rowConfig);

// saber si tiene WhatsApp personalizado
// aquí hacemos una trampa

include 'buscarWhatsapp.php';

if ($tieneWhatsApp == true) {
    // se consulta 
    $denysPuerto = $link[$miSistema[1]][0]; // puerto de denysbot ej: 8080
    $denysServer = $link[$miSistema[1]][1]; // ip servidor ej: 205.209.96.94

    // conexion a denysbot
    // $connDenys = mysqli_connect('localhost', 'denysbot', 'Nuebaklbdni', 'denysbot_sistema', '3306');
    // conexion denys nueva 16 10 2023
    $connDenys = mysqli_connect("205.209.96.94:3306", "denysbot", "BNe4nxQZDwHK8vi", "denysbot_sistema");

    $queryConsultaDenys = "SELECT * from denysbot_sistema.usuarios where id_denys = '{$denysPuerto}' limit 1";
    $resultConsultaDenys = mysqli_query($connDenys, $queryConsultaDenys);
    $rowConsultaDenys = mysqli_fetch_assoc($resultConsultaDenys);
    // si hay resultados armamos la conexión al cliente
    if (mysqli_num_rows($resultConsultaDenys) > 0) {
        // $connDenysCliente = mysqli_connect('localhost', 'denysbot', 'Nuebaklbdni', 'denysbot_' . $rowConsultaDenys['id'], '3306');
        $connDenysCliente = mysqli_connect("205.209.96.94:3306", "denysbot", "BNe4nxQZDwHK8vi", 'denysbot_' . $rowConsultaDenys['id']);
    }
} else {
    echo '
    <script>
        alert("No tienes WhatsApp personalizado Activo");
        window.location.href="portada";
    </script>
    ';
}

?>

<!-- jquery cdn -->

<!-- emojis -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.css">
<!-- emojis -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.css">
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#">WhatsApp Chat</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">

        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <nav class="nav nav-pills nav-fill">
                            <a class="nav-item nav-link" href="./masivoWASaludo">Saludo</a>
                            <a class="nav-item nav-link" href="./masivoWAMensajes">Mensajes</a>
                            <a class="nav-item nav-link active" href="./masivoWAChatConfig">Usuarios de chat</a>
                            <a class="nav-item nav-link" href="./masivoWAFormularios">Formularios</a>
                        </nav>
                    </div>
                </div>
            </div>


            <div class="col-md-12">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Configuración de salas de chat</h3>
                    </div>
                    <form id="palabrasClaveForm">
                        <?php
                        $queryConfig = "SELECT * from config limit 1";
                        $resultConfig = mysqli_query($connDenysCliente, $queryConfig);
                        $rowConfig = mysqli_fetch_array($resultConfig);
                        if ($rowConfig) {
                            $type = 2;
                            $idUpdate = $rowConfig['id'];
                        } else {
                            $type = 1;
                            $idUpdate = '';
                        }
                        ?>
                        <div class="card-body">
                            <div class="form-group col-6">
                                <label for="">Estado del servicio de chat</label>
                                <select name="datos[estadoChat]" class="form-control" id="estadoChat">
                                    <option value="1" <?= $rowConfig['estadoChat'] == 1 ? 'selected' : '' ?>>Activo</option>
                                    <option value="0" <?= $rowConfig['estadoChat'] == 0 ? 'selected' : '' ?>>Inactivo</option>
                                </select>
                            </div>
                        </div>
                        <div class="card-footer">
                            <input type="hidden" name="datos[idDenys]" value="<?= $rowConsultaDenys['id'] ?>">
                            <input type="hidden" name="datos[usuarioId]" value="<?= $rowConsultaDenys['id'] ?>">
                            <button type="submit" class="btn btn-outline-info rounded-pill" onclick="$('#palabrasClaveForm').automaticForm({type:<?= $type ?>,idUpdate:'<?= $idUpdate ?>',table:'config',reload:'',page:'masivoWAChatConfig',dbHost:'205.209.96.94:3306',dbUser:'denysbot',dbPass:'BNe4nxQZDwHK8vi',db:'denysbot_<?= $rowConsultaDenys['id'] ?>'});">
                                <i class="fa fa-save mr-1"></i>
                                Guardar</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Usuarios para chat</h3>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table w-100 table-striped table-bordered" style="width: 100% !important;">
                            <?php
                            $tableHeader = array(
                                'Opciones', 'Usuario',
                            );
                            ?>
                            <thead>
                                <tr>
                                    <?php
                                    for ($i = 0; $i < count($tableHeader); $i++) {
                                        echo "<th>$tableHeader[$i]</th>";
                                    }
                                    ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * from usuarios where activo = 1 and ID_principal = '{$_SESSION['ID_principal']}' ";
                                $result = mysqli_query($conn3, $query);
                                while ($row = mysqli_fetch_array($result)) {
                                ?>
                                    <tr>
                                        <td>
                                            <!-- <div class="row"> -->

                                            <!-- <div class="col-md-4">
                                                    <form id="estadoDenys<?= $row['ID'] ?>">
                                                        <div class="form-group">
                                                            <select class="form-control" <?= $row['estadoDenys'] == 1 ? 'disabled' : '' ?> name="datos[estado]" onchange="automaticUpdate(this.value, 'estadoDenys', 'usuarios', <?= $row['ID'] ?>, 'masivoWAChat')">
                                                                <option value="1" <?= $row['estadoDenys'] == 1 ? 'selected' : '' ?>>Activo</option>
                                                                <option value="0" <?= $row['estadoDenys'] == 0 ? 'selected' : '' ?>>Inactivo</option>
                                                            </select>
                                                        </div>
                                                    </form>
                                                </div> -->
                                            <!-- <div class="col-md-4 center text-center"> -->

                                            <?php
                                            // consulta a denysbot sobre el usuario
                                            $queryChatUsuarios = "SELECT * from chat_usuarios where idMedical = '{$row['ID']}' limit 1";
                                            $resultChatUsuarios = mysqli_query($connDenysCliente, $queryChatUsuarios);
                                            $rowChatUsuarios = mysqli_fetch_assoc($resultChatUsuarios);
                                            // existe la vaina?

                                            ?>


                                            <!-- Button trigger modal  -->
                                            <button type="button" class="btn <?= ($rowChatUsuarios['estadoDenys'] == 0 ? 'btn-warning' : 'btn-info') ?> rounded-pill" data-toggle="modal" data-target="#modelId<?= $row['ID'] ?>" data-backdrop="static" data-keyboard="false">
                                                <i class="fa fa-cog"></i>
                                                <?= ($rowChatUsuarios['estadoDenys'] == 0 ? 'Activar' : 'Configurar Chat') ?>
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="modelId<?= $row['ID'] ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Configurar chat - <?= $row['NOMBRE_USUARIO'] ?></h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form id="chatDenysForm<?= $row['ID'] ?>">
                                                            <input type="hidden" name="datos[idMedical]" value="<?= $row['ID'] ?>">
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <label for="">Nombre del especialista</label>
                                                                            <input type="text" name="datos[nombre]" value="<?= $rowChatUsuarios['nombre'] ?>" class="form-control">
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <label for="">Especialidad</label>
                                                                            <input type="text" name="datos[especialidad]" value="<?= $rowChatUsuarios['especialidad'] ?>" class="form-control">
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <label for="">Estado del chat</label>
                                                                            <select name="datos[estadoDenys]" class="form-control" id="">
                                                                                <option value="1" <?= $rowChatUsuarios['estadoDenys'] == 1 ? 'selected' : '' ?>>Activo</option>
                                                                                <option value="0" <?= $rowChatUsuarios['estadoDenys'] == 0 ? 'selected' : '' ?>>Inactivo</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row mt-3">
                                                                        <div class="col-md-12">
                                                                            <label for="">Horario de atención del chat</label>
                                                                            <table class="table table-striped w-100">
                                                                                <thead class="thead-light">
                                                                                    <tr>
                                                                                        <th scope="col" style='text-align:center;'>Día</th>
                                                                                        <th scope="col" style='text-align:center;'>Desde</th>
                                                                                        <th scope="col" style='text-align:center;'>Hasta</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <?php
                                                                                    $NombreDia = ["Lunes", "Martes",  "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo"];
                                                                                    $Laboral = ["lt", "mt", "et", "jt", "vt", "st", "dt"];
                                                                                    $InputsD1 = ["ld", "md", "ed", "jd", "vd", "sd", "dd"];
                                                                                    $InputsH1 = ["lh", "mh", "eh", "jh", "vh", "sh", "dh"];

                                                                                    foreach ($NombreDia as $key => $value) {
                                                                                        $contador++;
                                                                                    ?>
                                                                                        <tr>
                                                                                            <th scope='row'>
                                                                                                <?= $NombreDia[$key] ?>
                                                                                                <div class='toggle-radio'>
                                                                                                    <input type='radio' name='datos[<?= $Laboral[$key] ?>]' id='Si_<?= $NombreDia[$key] ?><?= $row['ID'] ?>' data='Si' value='1' <?= ($rowChatUsuarios[$Laboral[$key]] == 1 ? 'checked' : '') ?>>
                                                                                                    <input type='radio' name='datos[<?= $Laboral[$key] ?>]' id='No_<?= $NombreDia[$key] ?><?= $row['ID'] ?>' data='No' value='0' <?= ($rowChatUsuarios[$Laboral[$key]] == 0 ? 'checked' : '') ?>>
                                                                                                    <div class='switch'>
                                                                                                        <label for='Si_<?= $NombreDia[$key] ?><?= $row['ID'] ?>' data='Si'>Si</label>
                                                                                                        <label for='No_<?= $NombreDia[$key] ?><?= $row['ID'] ?>' data='No'>No</label>
                                                                                                        <span></span>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </th>
                                                                                            <td><input type='time' class='form-control input-lg' name='datos[<?= $InputsD1[$key] ?>]' value="<?= ($rowChatUsuarios[$InputsD1[$key]] <> '' ? $rowChatUsuarios[$InputsD1[$key]] : '00:00') ?>"></td>
                                                                                            <td><input type='time' class='form-control input-lg' name='datos[<?= $InputsH1[$key] ?>]' value="<?= ($rowChatUsuarios[$InputsH1[$key]] <> '' ? $rowChatUsuarios[$InputsH1[$key]] : '00:00') ?>"></td>
                                                                                        </tr>
                                                                                    <?php
                                                                                    }
                                                                                    ?>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>



                                                                    <label for="">Palabra de Activación</label>
                                                                    <input type="text" class="form-control" id="hashDenys" name="datos[hashDenys]" placeholder="ej: medico general" value="<?= $rowChatUsuarios['hashDenys'] ?>" onchange="match(this);">
                                                                    <small>Los usuarios deberán escribir la palabra de activación en el chat para empezar el chat con el especialista</small>
                                                                    <br>
                                                                    <small class="">Ej: <span class="text-success"><?= $rowConfig['palabraChat'] ?></span> <span class="text-info">medicina general</span></small>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-outline-secondary rounded-pill" data-dismiss="modal">Cerrar</button>
                                                                <button type="submit" class="btn btn-outline-info rounded-pill" onclick="$('#chatDenysForm<?= $row['ID'] ?>').automaticForm({type:<?= ($rowChatUsuarios['id'] == null ? 1 : 2) ?>,idUpdate:<?= ($rowChatUsuarios['id'] == null ? 0 : $rowChatUsuarios['id'])  ?>,table:'chat_usuarios',reload:'',page:'masivoWAChatConfig',dbHost:'205.209.96.94:3306',dbUser:'denysbot',dbPass:'BNe4nxQZDwHK8vi',db:'denysbot_<?= $rowConsultaDenys['id'] ?>'});">Guardar</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- </div> -->
                                            <!-- </div> -->
                                        </td>
                                        <td>
                                            <!-- <div class="col-md-4"> -->
                                            <?= $row['NOMBRE_USUARIO'] ?>
                                            <!-- </div> -->
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <?php
                                    for ($i = 0; $i < count($tableHeader); $i++) {
                                        echo "<th>$tableHeader[$i]</th>";
                                    }
                                    ?>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.min.js"></script>
<script>
    function match(usuario) {
        // usuario.value = usuario.value.replace(" ", "");
        // if (usuario.value[0] !== "#") {
        //     usuario.value = "#" + usuario.value
        // }
        botones(usuario);
    }

    function botones(usuario) {
        // ajax para botones y saludo
        $.ajax({
            url: "./moduloMasivos/ajax_consultarHash.php",
            type: "POST",
            data: {
                palabra: usuario.value
            },
            success: function(data) {
                if (data) {
                    if (data == true) {
                        window.alert("Hashtag ya utilizado");
                        usuario.value = "";
                    }
                }
            }
        })
    }

    function quienFue(tipo) {
        if (tipo == 1) {
            // quitar atributo readonly en id hashtag
            document.getElementById("elhashtag").style.display = "block";
            document.getElementById("eltitulo").style.display = "block";
            document.getElementById("elmensaje").style.display = "none";
        } else if (tipo == 2) {
            // se oculta div de titulo
            document.getElementById("elhashtag").style.display = "none";
            document.getElementById("eltitulo").style.display = "none";
            document.getElementById("elmensaje").style.display = "block";

        }
    }

    let message, activarMenu;
    message = "Hola";

    let palabras = ['#Principal', 'Hola', 'Buenos días', 'Buenas tardes'];
    for (let i = 0; i < palabras.length; i++) {
        if (palabras[i] == message) {
            activarMenu = message;
        }
    }
    console.log(activarMenu);
</script>
<script type="text/javascript">
    $(document).ready(function() {
        setTimeout(() => {
            $("#texti").emojioneArea();    
        }, 500);        
    });
</script>
<!-- <script src="javascript/systemMsg.js"></script> -->
<?php
include '../footer.php';

?>

<style>
    .switch {
        position: relative;
        width: 150px;
        height: 50px;
        text-align: center;
        background: #3c8dbc;
        transition: all 0.2s ease;
        border-radius: 25px;
    }

    .switch span {
        position: absolute;
        width: 20px;
        height: 4px;
        top: 50%;
        left: 50%;
        margin: -2px 0px 0px -4px;
        background: #fff;
        display: block;
        transform: rotate(-45deg);
        transition: all 0.2s ease;
    }

    .switch span:after {
        content: "";
        display: block;
        position: absolute;
        width: 4px;
        height: 12px;
        margin-top: -8px;
        background: #fff;
        transition: all 0.2s ease;
    }

    .toggle-radio {
        text-align: -webkit-center;
    }

    .toggle-radio>input[type=radio] {
        display: none;
    }

    .toggle-radio>.switch label {
        cursor: pointer;
        color: rgba(0, 0, 0, 0.2);
        width: 60px;
        line-height: 50px;
        transition: all 0.2s ease;
    }

    .toggle-radio>label[for~=Si] {
        position: absolute;
        left: 0px;
        height: 20px;
    }

    .toggle-radio>label[for~=No] {
        position: absolute;
        right: 0px;
    }

    .toggle-radio>input[data="No"]:checked~.switch {
        background: #eb4f37;
    }

    .toggle-radio>input[data="No"]:checked~.switch label[data=No] {
        color: white;
    }

    .toggle-radio>input[data="Si"]:checked~.switch label[data=Si] {
        color: #50df54c2;
    }


    .toggle-radio>input[data="No"]:checked~.switch span {
        background: #fff;
        margin-left: -8px;
    }

    .toggle-radio>input[data="No"]:checked~.switch span:after {
        background: #fff;
        height: 20px;
        margin-top: -8px;
        margin-left: 8px;
    }
</style>