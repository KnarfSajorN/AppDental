<?php 
include '../funciones/funciones.php';
if(isset($_GET['id'])) {
    $idU = decrypt($_GET['id']);
    
}else{
    echo 
    "<script>window.location.href='https://www.google.com';</script>";
}

    // $enlaceActivo = funcionMaster($idU, "ID_Usuario", "enlaceActivo", "config");
?>

<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Registro de paciente</title>

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <!-- bootstrap js -->
    <script src="https://getbootstrap.com/docs/4.0/dist/js/bootstrap.bundle.min.js"></script>

</head>

<style>
    body {
        background-image: url('https://dentalsoftplus.com/img/carousel-2.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;

        /* background: radial-gradient(ellipse at center, rgba(255, 254, 234, 1) 0%, rgba(255, 254, 234, 1) 35%, #b7e8eb 100%); */
    }
</style>

<style>
    .waves {
        position: relative;
        width: 100%;
        height: 16vh;
        margin-bottom: -7px;
        /*Fix for safari gap*/
        min-height: 10rem;
        max-height: 10rem;
    }

    .waves.waves-sm {
        height: 1rem;
        min-height: 1rem;
    }

    .waves.no-animation .moving-waves>use {
        animation: none;
    }

    .wave-rotate {
        transform: rotate(180deg);
    }

    /* Animation for the waves */
    .moving-waves>use {
        animation: move-forever 40s cubic-bezier(0.55, 0.5, 0.45, 0.5) infinite;
    }

    .moving-waves>use:nth-child(1) {
        animation-delay: -2s;
        animation-duration: 11s;
    }

    .moving-waves>use:nth-child(2) {
        animation-delay: -4s;
        animation-duration: 13s;
    }

    .moving-waves>use:nth-child(3) {
        animation-delay: -3s;
        animation-duration: 15s;
    }

    .moving-waves>use:nth-child(4) {
        animation-delay: -4s;
        animation-duration: 20s;
    }

    .moving-waves>use:nth-child(5) {
        animation-delay: -4s;
        animation-duration: 25s;
    }

    .moving-waves>use:nth-child(6) {
        animation-delay: -3s;
        animation-duration: 30s;
    }

    @keyframes move-forever {
        0% {
            transform: translate3d(-90px, 0, 0);
        }

        100% {
            transform: translate3d(85px, 0, 0);
        }
    }
</style>

<div class="position-absolute w-100 z-index-1 bottom-0" style="bottom: 0; position:fixed !important;">
    <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 40" preserveAspectRatio="none" shape-rendering="auto">
        <defs>
            <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
        </defs>
        <!-- las olitas bonitas :3 -->
        <g class="moving-waves">
            <use xlink:href="#gentle-wave" x="48" y="8" fill="rgba(1,88,133,0.5)" />
            <use xlink:href="#gentle-wave" x="48" y="13" fill="rgba(1,88,133,0.5)" />
        </g>
        <!-- fin de las olitas bonitas :3 -->
    </svg>
</div>

<body class="text-center">
    <center>
    <div class="card col-md-10">
        <div class="card-body">
            <form method="post" action="registerPacientesForm.php">
                <img id="Animado" src="https://sievensoft.com/logosMarcas/dentalsoft/isologo.png" style="width:5em; height:auto;" class="mb-3">
                <h1 class="h3 mb-3 font-weight-normal">Registro de paciente</h1>

                <div class="form-group" >
                    <label for="Documento">Documento</label>
                    <div class="input-group">
                        <select class="form-select col-4" id="tipoDoc" name="tipo_cliente">
                            <option disabled selected>Tipo Documento</option>
                            <option value="CC"> CC - Cédula de ciudadanía</option>
                            <option value="CE"> CE - Cédula de extranjería</option>
                            <option value="TI"> TI - Tarjeta de identidad</option>
                            <option value="RC"> RC - Registro Civil</option>
                            <option value="CD"> CD - Cédula Digital</option>
                            <option value="CN"> CN - Comprobante del tramite del documento</option>
                            <option value="NU"> NU - Número Único de identificación</option>
                            <option value="NI"> NI - Carnet de identidad - Documento nacional de identidad </option>
                            <option value="PE"> PE - Permiso especial de permanencia</option>
                            <option value="PA"> PA - Pasaporte</option>
                            <option value="SC"> SC - Salvoconducto</option>
                            <option value="AS"> AS - Adulto sin identidad</option>
                            <option value="MS"> MS - Menor sin identificación</option>
                            <option value="PT"> PT - Permiso por Protección Temporal </option>
                            <option value="CI"> CI - Carnet de Identidad </option>
                        </select>
                        <input type="text" class="form-control" id="Documento" placeholder="Documento" name="CODI_CLIENTE">
                    </div>
                </div>

                <div id="div-formulario"></div>



                <a class="btn btn-primary btn-block" onclick="buscarPaciente();" id="btnBuscar">Buscar/Registrar</a>

                <p class="mt-5 mb-3 text-muted">© <?= date('Y') ?></p>
            </form>
        </div>
    </div>
    </center>

</body>

</html>

<script>
    function buscarPaciente() {
        var tipoDoc = $("#tipoDoc").val();
        var documento = $("#Documento").val();
        if (tipoDoc == "" || documento == "") {
            alert("Todos los campos son obligatorios");
            return false;
            preventDefault();
        } else {
            $.ajax({
                url: 'QR_RegistroPaciente/ajax_buscarPaciente.php',
                type: 'POST',
                data: {
                    tipoDoc: tipoDoc,
                    documento: documento,
                    ID_principal: '<?= $idU ?>',
                },
                success: function(data) {
                    data = JSON.parse(data);

                    let formulario = `
                    <div class="form-group">
                    <div align="left"> Fecha de nacimiento </div>
                    <input type="date" class="form-control input-lg" id="fechaNacimiento" name="fechaNacimiento" placeholder="Edad" required value="${(data != null ? data.fechaNacimiento : '')}">
                </div>


                <div class="form-group">
                    <div align="left">Primer Nombre</div>
                    <input type="text" class="form-control input-lg" id="primer_nombre" name="primer_nombre" placeholder="Nombre" required value="${(data != null ? data.primer_nombre : '')}">
                </div>
                <div class="form-group">
                    <div align="left"> Segundo Nombre </div>
                    <input type="text" class="form-control input-lg" id="segundo_nombre" name="segundo_nombre" placeholder="Segundo Nombre" value="${(data != null ? data.segundo_nombre : '')}">
                </div>

                <div class="form-group">
                    <div align="left">Primer Apellido</div>
                    <input type="text" class="form-control input-lg" id="primer_apellido" name="primer_apellido" placeholder="Apellido" required value="${(data != null ? data.primer_apellido : '')}">
                </div>


                <div class="form-group">
                    <div align="left"> Segundo Apellido </div>
                    <input type="text" class="form-control input-lg" id="segundo_apellido" name="segundo_apellido" placeholder="Segundo Apellido" value="${(data != null ? data.segundo_apellido : '')}">
                </div>

                <div class="form-group">
                    <div align="left"> Género </div>
                    <select id="genero" name="genero" class="form-control input-lg select" style="width: 100%;" required>

                        <option value="${(data != null ? data.genero : '')}" selected> ${(data != null ? data.genero : '')} </option>
                        <option value="M">Masculino</option>
                        <option value="F">Femenino</option>
                        <option value="I">Indeterminado</option>
                        <option value="O">Otro</option>
                    </select>
                </div>

                <div class="form-group">
                    <div align="left"> Correo electrónico </div>
                    <input type="email" class="form-control input-lg" id="correo_cliente" name="correo_cliente" placeholder="Correo" value="${(data != null ? data.correo_cliente : '')}">
                </div>

                <div class="form-group" style="margin-bottom: auto;">
                    <div align="left"> Celular </div>
                    <input type="number" class="form-control input-lg" id="Whatsapp" name="whatsapp" placeholder="" value="${(data != null ? data.whatsapp : '')}">
                </div>

                <input type="hidden" name="idUsuario" value="<?= $idU ?>">
                <div class="form-group" style="margin-bottom: auto;">
                <input type="hidden" id="id_paciente" name="id_paciente" value="${(data != null ? data.cliente_id : 0)}">
                    <button class="btn btn-primary btn-block mt-2" type="submit" >Registrar / Actualizar</button>
                </div>
                    `;
                    $("#div-formulario").html(formulario);
                    // ocultar
                    $("#btnBuscar").hide();
                    // disabled
                    $('#tipoDoc').prop('readonly', true);
                    $('#Documento').attr('readonly', true);
                }
            })
        }
    }
</script>