<style>
    .card_paciente {
        width: 950px;
        height: 280px;
        background-color: #fff;
        background: linear-gradient(#f8f8f8, #fff);
        box-shadow: 0 8px 16px -8px rgb(0 0 0 / 40%);
        border-radius: 15px;
        overflow: hidden;
        position: relative;
        margin: 1.5rem;
    }

    .card_paciente h1 {
        text-align: center;
    }

    .center_paciente {
        position: absolute;
        top: 50%;
        left: 50%;
        -webkit-transform: translate(-50%, -50%);

    }


    .card_paciente .additional {
        position: absolute;
        width: 250px;
        height: 100%;
        /*background: linear-gradient(#3c8dbc, #4cbd4f);*/
        background: linear-gradient(#17a2b8, #f2f2f2);
        transition: width 0.4s;
        overflow: hidden;
        z-index: 2;
    }

    .card_paciente.green .additional {
        background: linear-gradient(#92bCa6, #A2CCB6);
    }

    #VerMas_Paciente {
        display: none;
    }


    #VerMas_Paciente:checked~.additional {
        width: 100% !important;
        border-radius: 0 5px 5px 0;
    }

    /*
    .card_paciente:hover .additional {
        width: 100%;
        border-radius: 0 5px 5px 0;
    }
    */

    .card_paciente .additional .user-card {
        width: 250px;
        height: 100%;
        position: relative;
        float: left;
    }

    .card_paciente .additional .user-card::after {
        content: "";
        display: block;
        position: absolute;
        top: 10%;
        right: -2px;
        height: 80%;
        border-left: 2px solid rgba(0, 0, 0, 0.025);

    }

    .card_paciente .additional .user-card .level,
    .card_paciente .additional .user-card .points {
        top: 15%;
        /*color: #fff;*/
        color:black;
        text-transform: uppercase;
        font-size: 0.75em;
        font-weight: bold;
        background: rgba(0, 0, 0, 0.15);
        padding: 0.125rem 0.75rem;
        border-radius: 100px;
        white-space: nowrap;
    }

    .card_paciente .additional .user-card .points {
        top: 85%;
    }

    .card_paciente .additional .user-card img {
        top: 50%;
        position: fixed;
        left: 15%;
        border-radius: 50%;
    }

    .card_paciente .additional .more-info {
        width: 700px;
        float: left;
        position: absolute;
        left: 250px;
        height: 100%;
    }

    .card_paciente .additional .more-info h1 {
        color: #fff;
        margin-bottom: 0;
    }

    .card_paciente.green .additional .more-info h1 {
        color: #224C36;
    }

    .card_paciente .additional .coords {
        margin: 0 1rem;
        color: #fff;
        font-size: 1.3rem;
    }

    .card_paciente.green .additional .coords {
        color: #325C46;
    }

    .card_paciente .additional .coords span+span {
        float: right;
    }

    .card_paciente .additional .stats {
        font-size: 2rem;
        display: flex;
        position: absolute;
        bottom: 1rem;
        left: 1rem;
        right: 1rem;
        top: auto;
        /*color: #fff;*/
        color:#00000099;
    }

    .card_paciente.green .additional .stats {
        color: #325C46;
    }

    .card_paciente .additional .stats>div {
        flex: 1;
        text-align: center;
    }

    .card_paciente .additional .stats i {
        display: block;
    }

    .card_paciente .additional .stats div.title {
        font-size: 1.1rem;
        font-weight: bold;
        /*text-transform: uppercase;*/
        text-transform: none;
    }

    .card_paciente .additional .stats div.value {
        font-size: 1.5rem;
        font-weight: bold;
        line-height: 1.5rem;
        padding-top: 5px;
    }

    .card_paciente .additional .stats div.value.infinity {
        font-size: 2.5rem;
    }

    .card_paciente .general {
        width: 700px;
        height: 100%;
        position: absolute;
        top: 0;
        right: 0;
        z-index: 1;
        box-sizing: border-box;
        padding: 1rem;
        padding-top: 0;
        overflow: auto;
    }

    .card_paciente .general .more {
        position: absolute;
        bottom: 1rem;
        right: 1rem;
        font-size: 0.9em;
    }

    .card_paciente .Datos_Paciente {
        padding: 10px;
        display: list-item;
        list-style: none;
        font-weight: 400;
    }

    .boton_vermas {
        position: fixed;
        display: flex;
        z-index: 10;
        bottom: 15px;
        left: 11.5%;
        color: #3e92b1;
        font-family: cursive;
    }

    @media screen and (max-width: 1240px) and (min-width: 1044px) {

        .card_paciente {
            zoom: 0.8;
            font-size: 16px;
        }

        .boton_vermas {
            bottom: 20px;
            left: 10.3%;
        }
    }

    @media screen and (max-width: 1043px) and (min-width: 940px) {

        .card_paciente {
            zoom: 0.7;
            font-size: 18px;
            height: 370px;
        }

        .boton_vermas {
            bottom: 20px;
            left: 10.3%;
        }
    }

    @media screen and (max-width: 939px) and (min-width: 768px) {

        .card_paciente {
            zoom: 0.56;
            font-size: 24px;
            height: 370px;
        }

        .boton_vermas {
            bottom: 20px;
            left: 10.3%;
        }

        .card_paciente .additional .stats div.value {
            font-size: 2rem;
        }

        .card_paciente .additional .stats div.title {
            font-size: 2rem;
        }
    }


    @media screen and (max-width: 767px) and (min-width: 600px) {
        .card_paciente {
            zoom: 60%;
            font-size: 24px;
            height: 370px;
        }

        .boton_vermas {
            bottom: 20px;
            left: 10.3%;
        }

        .card_paciente .additional .stats div.value {
            font-size: 2rem;
        }

        .card_paciente .additional .stats div.title {
            font-size: 2rem;
        }
    }

    @media screen and (max-width: 599px) and (min-width: 500px) {
        .card_paciente {
            zoom: 50%;
            font-size: 28px;
            height: 470px;

        }

        .boton_vermas {
            bottom: 15px;
            left: 10%;
        }

        .card_paciente .additional .stats div.value {
            font-size: 2rem;
        }

        .card_paciente .additional .stats div.title {
            font-size: 2rem;
        }
    }

    @media screen and (max-width: 499px) and (min-width: 400px) {
        .card_paciente {
            zoom: 40%;
            font-size: 32px;
            height: 470px;
        }

        .boton_vermas {
            bottom: 10px;
            left: 9%;
        }

        .card_paciente .additional .stats div.value {
            font-size: 2.5rem;
        }

        .card_paciente .additional .stats div.title {
            font-size: 2.5rem;
        }

        .card_paciente .additional .stats svg {
            width: 50px;
            height: 50px;
            padding-bottom: 10px;
        }
    }

    @media screen and (max-width: 399px) {
        .card_paciente {
            zoom: 35%;
            font-size: 38px;
            height: 670px;
        }

        .boton_vermas {
            bottom: 30px;
            left: 7%;
        }

        .card_paciente .additional .stats div.value {
            font-size: 2.5rem;
        }

        .card_paciente .additional .stats div.title {
            font-size: 2.5rem;
        }

        .card_paciente .additional .stats svg {
            width: 50px;
            height: 50px;
            padding-bottom: 10px;
        }
    }
</style>

<?php

function Datos_Personales($clienteId)
{
    include 'funciones/conn3.php';
    global $conn3;
    $queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id=$clienteId");
    
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {

        $nombre_cliente = $rowMotorizado['nombre_cliente'];
        $tipo_cliente = $rowMotorizado['tipo_cliente'];
        $CODI_CLIENTE = $rowMotorizado['CODI_CLIENTE'];
        $celular_cliente = $rowMotorizado['celular_cliente'];
        $correo_cliente = $rowMotorizado['correo_cliente'];

        $fechaNacimiento  = $rowMotorizado['fechaNacimiento'];
        $genero = $rowMotorizado['genero'];
        $ciudad_cliente = $rowMotorizado['codigo_ciudad'];
        $whatsapp       = $rowMotorizado['whatsapp'];


        $usuario_id = $rowMotorizado['usuario_id'];
        $tiposSangre      = $rowMotorizado['tiposSangre'];
        $fotoperfil       = $rowMotorizado['fotoperfil'];

        $Edad = calculaedad($fechaNacimiento);

        /*
        if (strlen($fotoperfil) > 0) {
            $fotoperfil_img = "https://medicalsoftplus.com/baseDev/pascientes/" . $fotoperfil;
        } else {
            $fotoperfil_img = 'https://image.flaticon.com/icons/png/512/1430/1430504.png';
        }
        */

        if($genero == 'F'){
            $genero= 'Femenino';
        }elseif($genero == 'M'){
            $genero= 'Masculino';
        }
        if (is_numeric($ciudad_cliente)) {
            $ciudad_cliente = funcionMaster($ciudad_cliente,'id','Nombre_Tildes','Ciudades');
        } else {
            $ciudad_cliente = $ciudad_cliente;;
        }


        if (strlen($fotoperfil) > 0) {
            $fotoperfil_img = $Base . 'pascientes/' . $fotoperfil . '';
        } else {
            if ($genero == "F") {
                $fotoperfil_img = $Base . 'css/Mujer.png';
            } else {
                $fotoperfil_img = $Base . 'css/Hombre.jfif';
            }
        }
    }

    $Modulo = "
    <div class='center_paciente'>

        <div class='card_paciente' >
            <input type='checkbox' id='VerMas_Paciente'/>
            <label for='VerMas_Paciente' class='boton_vermas'> Ver Mas </label>
            <div class='additional'>
                <div class='user-card'>
                    <div class='level center_paciente'>
                        Paciente
                    </div>
                    <div class='points center_paciente'>
                        {$Edad}
                    </div>
                    
                    <img width='150' height='150' class='center_paciente' src='{$fotoperfil_img}'>
                </div>
                <div class='more-info'>
                    <h1 style='text-align-last: center;'>{$nombre_cliente}</h1>
                    <div class='coords'>
                        <span>.</span>
                        <span>.</span>
                    </div>
                    <div class='coords'>
                        <span>.</span>
                        <span>.</span>
                    </div>
                    <div class='stats'>
                        <div>
                            <div class='title'>Tipo de Sangre</div>
                            <span class='iconify' data-icon='fontisto:blood-drop'></span>
                            <div class='value'>{$tiposSangre}</div>
                        </div>
                        <div>
                            <div class='title'>Género</div>
                            <span class='iconify' data-icon='icons8:gender'></span>
                            <div class='value'>{$genero}</div>
                        </div>
                        <div>
                            <div class='title'>Edad</div>
                            <span class='iconify' data-icon='si-glyph:birthday-cake'></span>
                            <div class='value'>{$Edad}</div>
                        </div>
                        <div>
                            <div class='title'>Dentalsoft</div>
                            <svg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' width='1em' height='1em'>
                            <image x='0px' y='0px' width='1em' height='1em' xlink:href='data:img/png;base64,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
                            uQtmoMmEt6lum1SXH4IQDpxhj3Wj/wWgBWoPZis470NuNBlsD3ARI4EH9Lc96p0lIjm7b/x4+3YP6HdkP+bPD2pUB6UuD5VR/1uZGgpOrJyTYLVRMGTs4Ad7aM54K6+OaOxWewA3YHaKjSbIiou18LkLa2oR+flZahtqhyR8vkkkmITyfxF9nYjkLEJ0/iG2YL4ruwf0O7bn+fMDDT1RRk0U9IE2asL39cSQmWhjb0NPNNREQx9uCrm1VYxQwfrZgb6lG2XDa9+GGYTRLUZSNISFCOaS3YUgQgRBYhZRdC4h5xLyXJCYRxSdS+L79+H0b2/3gL5F9qL4aaLB4GbdZDNh76wnxuiJ7SibaPCFwCpLTDTMxBhzbKCbBBfRCYHmAmJOJOZWpmYuIeZt+iQxBwBBYm5fN7d16HMC4dPefSb6fbJ7QH8A9lP+gkFtUerAeQ/Gu2f/D3yOwaP23YskAAAAAElFTkSuQmCC' />
                            </svg>
                            <div class='value infinity'>∞</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class='general row'>
                <div class='col-md-12'> <h1 style='text-align-last: center;'>{$nombre_cliente}</h1></div>
                <div class='col-md-6 col-xs-12' style='padding:0px;'>
                    <label class='Datos_Paciente'><i class='fa-solid fa-bookmark'></i>  Tipo de Documento: <b>{$tipo_cliente}</b> </label>
                    <label class='Datos_Paciente'><i class='fa-solid fa-id-card'></i>  Docuento : <b>{$CODI_CLIENTE}</b> </label>
                    <label class='Datos_Paciente'><i class='fa-solid fa-square-phone'></i>  Celular : <b>{$celular_cliente}</b> </label>
                    <label class='Datos_Paciente'><i class='fa-solid fa-envelopes-bulk'></i>  Correo : <b>{$correo_cliente}</b> </label>
                </div>
                <div class='col-md-6 col-xs-12' style='padding:0px;'>
                    <label class='Datos_Paciente'><i class='fa-regular fa-calendar-days'></i>  Fecha Nacimiento : <b>{$fechaNacimiento}</b> </label>
                    <label class='Datos_Paciente'><i class='fa-solid fa-venus-mars'></i>  Género : <b>{$genero}</b> </label>
                    <label class='Datos_Paciente'><i class='fa-solid fa-map'></i>  Ciudad : <b>{$ciudad_cliente}</b> </label>
                    <label class='Datos_Paciente'><i class='fa-solid fa-map'></i>  WhatsApp : <b>{$whatsapp}</b> </label>
                </div>
            </div>
        </div>

    </div>";

    return $Modulo;
}
?>