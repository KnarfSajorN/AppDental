<?php
if ($_POST['key']) {
    include 'funciones/conn3.php';

    if ($_POST['key'] == "cargaPermisos") {
        $jsonArray = [];
        $_POST['search'] = mysqli_real_escape_string($conn3, $_POST['search']);
        $search = ($_POST['search'] == "false" ? '' : "WHERE nombre LIKE '%" . str_replace(" ", "%", $_POST['search']) . "%'");
        $querySelect = mysqli_query($conn3, "SELECT * FROM camposRequiredOcupacional {$search} ORDER BY id");
        while ($row = mysqli_fetch_array($querySelect)) {
            $jsonArray[] = array(
                "id" => base64_encode($row['id']),
                "required" => base64_encode($row['required']),
                "nombre" => base64_encode($row['nombre'])
            );
        }
    } else if ($_POST['key'] == "updateOpciones") {
        $queryUpdate = mysqli_query($conn3, "UPDATE camposRequiredOcupacional SET required = 0");
        if ($queryUpdate) {
            foreach ($_POST['items'] as $key => $value) {
                $queryUpdate = mysqli_query($conn3, "UPDATE camposRequiredOcupacional SET required = 1 WHERE id = {$value}");
            }
            $jsonArray[0] = array(
                "status" => "success"
            );
        } else {
            $jsonArray[0] = array(
                "status" => "error: <pre>" . var_dump(mysqli_error_list($conn3)) . "</pre>"
            );
        }
    }
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($jsonArray);
    exit();
}

?>
<!-- PERSONALIZADO -->
<style type="text/css">
    .contetPermisos {
        position: relative;
        width: 100%;
        max-height: 70%;
        overflow: auto;
    }

    .contetPermisos .personalize {
        position: relative;
        width: 100%;
        min-height: 100px;
        max-height: 500px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-flow: column;
        overflow: auto;
    }

    .contetPermisos .personalize label {
        position: relative;
        display: flex;
        align-items: center;
        width: 100% !important;
        height: 40px;
        padding: 30px;
        margin: 0 0 5px 0;
        background-color: rgb(216 216 216);
        cursor: pointer;
    }

    .contetPermisos .personalize label:hover {
        background-color: rgb(0 0 0 / 27%);
        color: white;
        transition: 1s ease-in-ount;
    }

    .contetPermisos .personalize label:active {
        background-color: rgba(0, 0, 0, .4);
        transition: 1s ease-in-ount;
    }

    .contetPermisos .personalize label input {
        position: absolute;
        left: 30px;
        display: block;
        padding: 0;
        margin: 0;
        z-index: 100;
    }

    .contetPermisos .personalize label span {
        position: relative;
        display: flex;
        justify-content: flex-end;
        width: 100% !important;
        padding: 0;
        margin: 0;
        font-weight: bold;
        word-break: break-all;
        overflow: auto;
        font-size: 1.1em;
    }

    /* Editar boton cerrado de modal */
    .input-group-addon.close {
        float: unset;
    }

    /* boton personalizado flotante */
    .btn-personalize {
        position: fixed;
        display: flex;
        justify-content: center;
        align-items: center;
        bottom: 60px;
        right: 60px;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        padding: 0;
        border: none;
        box-shadow: 0 0 6px 1px #000;
    }

    .btn-personalize i {
        font-size: 1.8em;
    }

    .btn-personalize:hover>i {
        transition: 2s ease-in-out;
        animation: rotar 2s infinite linear;
    }

    @keyframes rotar {
        to {
            transform: rotate(360deg);
        }

        from {
            transform: rotate(0deg);
        }
    }
</style>
<button type="button" class="btn btn-primary btn-personalize float1" data-toggle="modal" data-target="#my-modal">
    <i class="my-float1 fa fa-cog" data-toggle="tooltip" data-original-title="Campos Requeridos"></i>
</button>

<div id="my-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="col-md-12">
                    <div class="input-group">
                        <label for="buscador" class="input-group-addon"><i class="fa fa-search"></i></label>
                        <input type="text" onkeyup="cargaPermisos(this.value)" class="form-control input-lg" name="buscador" id="buscador" required placeholder="Buscar Campos Requeridos...">
                        <label for="buscador" class="input-group-addon close" data-dismiss="modal" aria-label="Close" id="showAnimacion"><i class="fa fa-times" aria-hidden="true"></i></label>
                    </div>
                </div>
            </div>
            <form action="" method="post">
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-xs-12 contetPermisos">
                                <div class="personalize"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="margin-top: 10px;">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <button type="button" onclick="updateOpciones()" class="btn btn-success btn-block" id="btnSubmit" name="btnGuardarCampos">Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- FIN PERSONALIZADO -->
<script type="text/javascript">
    window.addEventListener('load', function() {
        cargaPermisos();
    });
    var dataCache = [];
    var unLock = true;

    function cargaPermisos(search = false) {
        if (search == false) {
            $('#btnSubmit').show();
        } else {
            $('#btnSubmit').hide();
        }
        let data = {
            search: search,
            key: "cargaPermisos"
        };
        $.ajax({
            url: "./modalOpciones.php",
            data: data,
            type: "POST",
            dataType: "JSON",
            success: function(response) {
                console.log(response);
                printOpciones(response);
            }
        });
    }

    function updateOpciones(response) {
        let data = {
            key: "updateOpciones",
            items: dataCache
        };
        $.ajax({
            url: "./modalOpciones.php",
            data: data,
            type: "POST",
            dataType: "JSON",
            beforeSend: function(response) {
                $("#showAnimacion").html('<i class="fa fa-refresh fa-spin text-info" aria-hidden="true"></i>');
            },
            success: function(response) {
                if (response[0].status == "success") {
                    $("#showAnimacion").html('<i class="fa fa-check text-success" aria-hidden="true"></i>');
                    setTimeout(function() {
                        $("#showAnimacion").html('<i class="fa fa-times" aria-hidden="true"></i>');
                    }, 1500);
                } else {
                    $("#showAnimacion").html('<i class="fa fa-times text-danger" aria-hidden="true"></i>');
                    setTimeout(function() {
                        $("#showAnimacion").html('<i class="fa fa-times" aria-hidden="true"></i>');
                    }, 1500);
                }
            }
        });
    }

    function printOpciones(data) {
        let html = "";
        unLock = (dataCache.length == 0 ? (unLock == false ? '' : true) : false);
        var permiso = "";
        data.forEach(element => {
            if (unLock && atob(element.required) > 0) {
                saveCachePermisos(atob(element.id));
                permiso = ((atob(element.required) > 0) ? 'checked' : '');
            } else {
                permiso = ((dataCache.includes(atob(element.id))) ? 'checked' : '');
            }
            html += `
            <label for="opcion${atob(element.id)}">
                <input type="checkbox" onclick="saveCachePermisos('${atob(element.id)}')" name="contentRequired['${atob(element.id)}']" id="opcion${atob(element.id)}" value="1" ${permiso}>
                <span>${atob(element.nombre)}</span>
            </label>
            `;
        });
        $(".personalize").html(html);
    }

    function saveCachePermisos(permiso) {
        var posicion = dataCache.indexOf(permiso);
        if (posicion > -1) {
            dataCache.splice(posicion, 1);
        } else {
            dataCache.push(permiso);
        }
        console.log(dataCache);
    }
</script>
<style>

        .float1 {
            position: fixed;
            width: 50px;
            height: 50px;
            top: 195px;
            right: 0px;
            background-color: #3c8dbc;
            color: #FFF;
            text-align: center;
            box-shadow: 2px 2px 3px #999;
            border-radius: 10px 0px 0px 10px;

            background: rgb(250, 235, 215);
            background: -moz-radial-gradient(circle, rgb(80 98 171) 30%, rgba(60, 141, 176, 1) 100%);
            background: -webkit-radial-gradient(circle, rgb(80 98 171) 30%, rgba(60, 141, 176, 1) 100%);
            background: radial-gradient(circle, rgb(80 98 171) 30%, rgba(60, 141, 176, 1) 100%);
        }

        .float1 .my-float1 {
            margin-top: 4px;
        }
    </style>