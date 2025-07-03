<style>
    * {
        padding: 0;
        margin: 0;
    }

    .float {
        position: fixed;
        width: 50px;
        height: 50px;
        top: 140px;
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

    .float .my-float {
        margin-top: 17px;
    }
</style>
<style type="text/css">
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color: #3c8dbc;
    }

    :root {
        --size-font: 15px;
    }

    .form__group {
        position: relative;
        padding: 20px 0 0;
        margin-top: 10px;
        padding-right: 20px;
    }

    .form__field {
        font-family: inherit;
        width: 100%;
        border: 0;
        border-bottom: 2px solid #9b9b9b;
        outline: 0;
        font-size: var(--size-font);
        color: black;
        padding: 7px 0;
        background: transparent;
        transition: border-color 0.2s;
    }

    /* para select2*/
    .form__group>span {
        font-family: inherit;
        width: 100%;
        border: 0;
        border-bottom: 2px solid #9b9b9b;
        outline: 0;
        font-size: var(--size-font);
        color: black;
        padding: 4px 0;
        background: transparent;
        transition: border-color 0.2s;
        width: 100% !important;
    }

    .form__group>textarea {
        height: 300px;
        border: 2px solid #9b9b9b;
        padding: 20px;
        position: relative;
        top: 10px;
    }



    .form__group .select2-selection {
        border: none;
        padding-left: 0;
    }

    .form__group .select2-selection__arrow {
        top: 10px !important;
    }

    .form__field~.select2-container .select2-selection--single {
        height: 27px !important;
        padding: 5px !important;
    }

    /*
    .select2-container *:focus~.form__label {
        position: absolute;
        top: 0;
        display: block;
        transition: 0.2s;
        font-size: var(--size-font);
        color: #3c8dbc;
        font-weight: 700;
    }
    */

    /* cierre para select 2 */



    .form__field::placeholder {
        color: transparent;
    }

    .form__field:placeholder-shown~.form__label {
        font-size: var(--size-font);
        cursor: text;
        top: 20px;
    }

    .form__field[type=date] {
        font-size: calc(var(--size-font)*0.9);
    }

    .form__label {
        position: absolute;
        top: 0;
        display: block;
        transition: 0.2s;
        font-size: var(--size-font);
        color: #9b9b9b;
    }

    .form__field:focus {
        padding-bottom: 6px;
        font-weight: 700;
        border-width: 3px;
        border-image: linear-gradient(to right, #2881b3, #a3cadc);
        border-image-slice: 1;
    }

    .form__field:focus~.form__label {
        position: absolute;
        top: 0;
        display: block;
        transition: 0.2s;
        font-size: var(--size-font);
        color: #3c8dbc;
        font-weight: 700;
    }

    /* reset input */
    .form__field:required,
    .form__field:invalid {
        box-shadow: none;
    }



    .fill:hover,
    .fill:focus {
        box-shadow: inset 0 0 0 2em var(--hover);
    }

    .pulse:hover,
    .pulse:focus {
        animation: pulse 1s;
        box-shadow: 0 0 0 2em rgba(255, 255, 255, 0);
    }

    @keyframes pulse {
        0% {
            box-shadow: 0 0 0 0 var(--hover);
        }
    }

    .pulse {
        --color: #3c8dbc;
        --hover: #3c8dbc;
    }
</style>

<?php
$clienteId = $_GET["clienteId"];
?>

<a href="#" class="float" data-toggle="modal" data-target="#ModalOdontologiaHistorial" id="BotonModalOdontologiaHistorial">
    <i class="my-float fa-solid fa-book" style="font-size: 25px;bottom: 5px;right: -6px;position: relative;"><i class="fa-solid fa-tooth" style="left: -18px;position: relative;top: -5px;font-size: 18px;color: #4e61a7;"></i></i>
</a>

<div class="modal fade bd-example-modal-lg" id="ModalOdontologiaHistorial" role="dialog" aria-labelledby="ModalOdontologiaHistoria" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="statusMsg"></p>
                <h5 class="modal-title" id="exampleModalLabel">Historial Odontograma</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        
                        <div class="col-md-12" align="center">
                            <h2 style='width:100%;text-align:center;'> <b> <?=funcionMaster($cliente_id,'cliente_id','nombre_cliente','cliente');?> </b> </h2> <br> <hr>
                            <label style="font-size:20px;color:#3c8dbc;">Historial Odontograma</label>
                        </div>

                        <div class="col-md-12" align="center" id="HistorialOdontogramaPaciente">

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="text-align: center;">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script>
    $("#BotonModalOdontologiaHistorial").click(function(event) {
        CargarHistorial();
    });

    function CargarHistorial(){

    var usuario_id = document.getElementById("usuario_id").value;// esta info esta en el modulo de odontograma
    var cliente_id = document.getElementById("cliente_id").value;// esta info esta en el modulo de odontograma

    $.ajax({
        type: "POST",
        url: "OD_Ajax.php",
        data: {
            Tipo_Consulta: "Cargar Historial Paciente",
            cliente_id:cliente_id,
            usuario_id:usuario_id,
        },
        success: function(response) {
            document.getElementById("HistorialOdontogramaPaciente").innerHTML = response;
        }
    });

}

</script>
<script>
    function EliminarDetalleOdontograma(DetalleOdontograma_id){
        
        Swal.fire({
        title: 'Esta seguro que desea eliminar el procedimiento realizado?',
        showDenyButton: false,
        showCancelButton: true,
        confirmButtonText: 'Eliminar',
        //denyButtonText: `No Eliminar`,
        }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                url: "OD_Ajax.php",
                data: {
                    Tipo_Consulta: "Eliminar Detalle Odontograma",
                    Tipo_Consulta_Adicional: "Modal_Historial",
                    DetalleOdontograma_id:DetalleOdontograma_id,
                    
                }
            }).success(function(Respuesta) {
                var response = JSON.parse(Respuesta);
                if(response.Numero_Diente != ""){
                    Swal.fire(
                        'Eliminado!',
                    )
                    CargarHistorial();
                    CargarImagenDiente(response.Numero_Diente );
                    <?php if($LugarOdontograma=="Odontograma Completo"){?> CargarImagenPieza(response.Numero_Diente ); <?php } ?>
                }else{
                    Swal.fire(
                        'Error!',
                    )
                }

            });

        } 
        })

    }
    
</script>
<style>
    /*
    .boton-accion-od{
        display:none;
    }
    */
</style>