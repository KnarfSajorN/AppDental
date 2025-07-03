<style>
    @import url(https://fonts.googleapis.com/css?family=Oswald:300,400,700);

    body {
        overflow: hidden;
    }

    .Triangulo {
        position: absolute;
        right: 50vw;
        bottom: 0;
        width: 0;
        height: 0;
        transform: translateX(0);
        border-style: solid;
        border-width: 0 100vw 120vw 100vw;
        border-color: transparent transparent #53e85e transparent;
    }

    .Base {
        position: absolute;
        bottom: 0;
        width: 100%;
        height: 9vw;
        min-height: 8rem;
        background: #3c8dbc;
    }

    .Sistema {
        position: absolute;
        bottom: 0;
        left: 82vw;
        transform: translateX(-100%);
    }

    .Circulo {
        position: relative;
        border-radius: 50%;
        background: #53e85e;
    }

    .Circulo.primary {
        position: absolute;
        top: 15vw;
        left: 5vw;
        width: 1rem;
        height: 1rem;
    }

    .Circulo.secondary {
        position: absolute;
        top: 5vw;
        left: 11vw;
        width: 16vw;
        max-width: 6rem;
        height: 16vw;
        max-height: 6rem;
    }

    .Circulo.ternary {
        right: 0;
        transform: translateX(10.8rem);
        width: 80vw;
        max-width: 800px;
        height: 80vw;
        max-height: 800px;
    }

    .TicTacs {
        position: absolute;
        width: 50px;
        height: 200px;
        right: 35vw;
        top: -120px;
        perspective: 400px;
    }

    .TicTac {
        position: absolute;
        width: 50px;
        height: 200px;
        right: 44%;
        top: 0;
        left: 50%;
        transform: translateZ(-300px) translateX(-50%);
    }

    .TicTac.shadow {
        top: 263%;
        left: -65%;
        bottom: 0;
        transform-origin: 50% 0;
        transform: translateX(-50%) scaleY(-1) scaleZ(2) rotateY(-30deg) rotateX(-75deg) translateZ(300px);
    }

    .TicTac .bar {
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        bottom: 0;
        display: block;
        width: 20px;
        height: 200px;
        background: #333;
    }

    .TicTac .string {
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        width: 2px;
        height: 150px;
        background: #333;
    }

    .TicTac .weight {
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        bottom: 10px;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: #333;
    }

    .TicTac .motion {
        position: absolute;
        height: 200px;
        width: 50px;
        transform-origin: 50% 10px;
        animation: swing 1600ms infinite ease-in-out;
    }

    .TicTac.shadow .bar,
    .TicTac.shadow .string,
    .TicTac.shadow .weight {
        background: #3d3a34;
    }

    .text {
        position: absolute;
        width: auto;
        right: 16vw;
        bottom: calc(38vh);
        transform: translateY(50%);
        font-size: 2.6rem;
    }

    .title {
        text-align: center;
        font-size: 1em;
        font-family: 'Oswald';
        font-weight: 300;
        text-transform: uppercase;
        line-height: 1.3em;
        margin: 0;
        color: #222;
    }

    .title strong {
        display: block;
        font-weight: 700;
        font-size: 2em;
        line-height: 1em;
    }

    .title em {
        font-style: normal;
        font-weight: 400;
        font-size: 1.899em;
        line-height: 1em;
        letter-spacing: 0.29em;
        margin-left: 0.25em;
    }

    p {
        position: absolute;
        left: 50%;
        transform: translateX(3.2em);
        font-family: 'Oswald';
        font-size: 0.6em;
        color: #222;
        margin: 0 17px;
        padding: 0;
        text-align: right;
    }

    @keyframes swing {
        0% {
            transform: rotate(-45deg);
        }

        50% {
            transform: rotate(45deg);
        }

        100% {
            transform: rotate(-45deg);
        }
    }

    @media only screen and (orientation: portrait) {
        .text {
            font-size: 4vw;
        }

        .title {
            font-size: 0.8em;
        }
    }

    <?php
    
    $width=["400","500","600","800","1200","1400"];
    $cal=["13", "15", "15", "17", "18", "19"];
    foreach ($width as $key => $value) {
        echo "
        @media only screen and (min-device-width : {$value}px) and (max-device-width : {$width[$key+1]}px) {
        .text {
            right: 13vw;
            bottom: calc({$cal[$key]}vh);
            transform: none;
        }
        }";

    }

    ?>

    @media only screen and (max-device-width : 400px) {
        .text {
            right: 13vw;
            bottom: calc(10vh);
            transform: none;
        }
    }

    * {
        box-sizing: border-box;
    }

    body {
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        font-family: Raleway;
        background-color: #ecf0f1;
    }

    .copyright {
        position: absolute;
        bottom: 0;
    }

    .copyright a {
        text-decoration: none;
        color: #16a085;
    }

    .copyright a:hover {
        text-decoration: underline;
    }

    .button {
        position: relative;
        padding: 1em 1.5em;
        border: none;
        background-color: transparent;
        cursor: pointer;
        outline: none;
        font-size: 18px;
        margin: 1em 0.8em;
    }

    .button.type3 {
        color: #435a6b;
    }

    .button.type3.type3::after,
    .button.type3.type3::before {
        content: '';
        display: block;
        position: absolute;
        width: 20%;
        height: 20%;
        border: 2px solid;
        transition: all 0.6s ease;
        border-radius: 2px;
    }

    .button.type3.type3::after {
        bottom: 0;
        right: 0;
        border-top-color: transparent;
        border-left-color: transparent;
        border-bottom-color: #435a6b;
        border-right-color: #435a6b;
    }

    .button.type3.type3::before {
        top: 0;
        left: 0;
        border-bottom-color: transparent;
        border-right-color: transparent;
        border-top-color: #435a6b;
        border-left-color: #435a6b;
    }

    .button.type3.type3:hover:after,
    .button.type3.type3:hover:before {
        border-bottom-color: #435a6b;
        border-right-color: #435a6b;
        border-top-color: #435a6b;
        border-left-color: #435a6b;
        width: 100%;
        height: 100%;
    }

</style>


<div class="Sistema">
    <div class="Circulo primary"></div>
    <div class="Circulo secondary"></div>
    <div class="Circulo ternary"></div>
</div>
<div class="Base">
    <div class="TicTacs">
        <div class="TicTac">
            <div class="bar"></div>
            <div class="motion">
                <div class="string"></div>
                <div class="weight"></div>
            </div>
        </div>
        <div class="TicTac shadow">
            <div class="bar"></div>
            <div class="motion">
                <div class="string"></div>
                <div class="weight"></div>
            </div>
        </div>
    </div>
</div>
<div class="Triangulo"></div>
<div class="text">
    <h1 class="title">Su Licencia Esta
        <strong>Vencida</strong>
        <br>Contactar a su asesor
        <br> al whatsapp +1 (786) 329-5472
    </h1>
    <br>
    <p>Dentalsoft</p>

    <button class="button type3" style="bottom: 35px;">
        Realizar Pago
    </button>

    <h1 style="margin: initial;"><strong style="font-size: 20px;color:white;">Te Extrañamos, Queremos que sigas trabajando con nosotros</strong></h1>
</div>

<?php
//echo $width = "<script>alert(screen.width);</script>";
//echo $height = "<script>alert(screen.height);</script>";
?>