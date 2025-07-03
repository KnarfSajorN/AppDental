<?php
include 'header.php';
?>

<div class="wrap">
    <div class="icon icon-gradient"></div>
    <div class="icon icon-cat"></div>
    <div class="icon icon-animation"></div>
    <br />
    <div class="icon icon-red"></div>
    <div class="icon icon-orange"></div>
    <div class="icon icon-yellow"></div>
    <div class="icon icon-green"></div>
    <div class="icon icon-blue"></div>
    <div class="icon icon-indigo"></div>
    <div class="icon icon-violet"></div>
</div>

<style>
    HTML CSSResult Skip Results Iframe EDIT ON .icon {
        width: 48px;
        height: 48px;
        display: inline-block;

        -webkit-mask: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/18515/heart.svg) no-repeat 50% 50%;
        mask: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/18515/heart.svg) no-repeat 50% 50%;
        -webkit-mask-size: cover;
        mask-size: cover;
    }

    .icon-red {
        background-color: red;
    }

    .icon-orange {
        background-color: orange;
    }

    .icon-yellow {
        background-color: yellow;
    }

    .icon-green {
        background-color: green;
    }

    .icon-blue {
        background-color: blue;
    }

    .icon-indigo {
        background-color: indigo;
    }

    .icon-violet {
        background-color: violet;
    }

    .icon-gradient {
        background: -webkit-repeating-radial-gradient(black, black 2px, white 2px, white 4px);
        background: repeating-radial-gradient(black, black 2px, white 2px, white 4px);
    }

    .icon-cat {
        background: url(https://i.giphy.com/media/sIIhZliB2McAo/200.gif);
        width: 100px;
        height: 100px;
        background-size: 100%;
        background-position: 40% 40%;
    }

    .icon-animation {
        background: red;
        -webkit-animation: ❤ 3s infinite linear;
        animation: ❤ 3s infinite linear;
    }

    @-webkit-keyframes ❤ {
        0% {
            background-color: white;
        }

        5% {
            background-color: #e5e5e5;
        }

        15% {
            background-color: #ccc;
        }

        20% {
            background-color: #b2b2b2;
        }

        25% {
            background-color: #999;
        }

        30% {
            background-color: #7f7f7f;
        }

        35% {
            background-color: #666;
        }

        40% {
            background-color: #4c4c4c;
        }

        45% {
            background-color: #333;
        }

        50% {
            background-color: #191919;
        }

        55% {
            background-color: black;
        }

        100% {
            background-color: #e5e5e5;
        }

        95% {
            background-color: #ccc;
        }

        90% {
            background-color: #b2b2b2;
        }

        85% {
            background-color: #999;
        }

        80% {
            background-color: #7f7f7f;
        }

        75% {
            background-color: #666;
        }

        70% {
            background-color: #4c4c4c;
        }

        65% {
            background-color: #333;
        }

        60% {
            background-color: #191919;
        }
    }

    @keyframes ❤ {
        0% {
            background-color: white;
        }

        5% {
            background-color: #e5e5e5;
        }

        15% {
            background-color: #ccc;
        }

        20% {
            background-color: #b2b2b2;
        }

        25% {
            background-color: #999;
        }

        30% {
            background-color: #7f7f7f;
        }

        35% {
            background-color: #666;
        }

        40% {
            background-color: #4c4c4c;
        }

        45% {
            background-color: #333;
        }

        50% {
            background-color: #191919;
        }

        55% {
            background-color: black;
        }

        100% {
            background-color: #e5e5e5;
        }

        95% {
            background-color: #ccc;
        }

        90% {
            background-color: #b2b2b2;
        }

        85% {
            background-color: #999;
        }

        80% {
            background-color: #7f7f7f;
        }

        75% {
            background-color: #666;
        }

        70% {
            background-color: #4c4c4c;
        }

        65% {
            background-color: #333;
        }

        60% {
            background-color: #191919;
        }
    }
</style>